<?php
include_once("head.php");

$include = true;

$templates_page = "templates.html";

///▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇引用與設定Start▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇
//## 會員
$member = new member($conn,PREFIX."member");
$member->work();

//## 購物車
$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
$shopping_car->work();

//--運費設定
$post_fee = $conn->GetRow("select * from ".PREFIX."setting WHERE type='post_fee' and lang = '".quotes($lang)."'");//--運費
$no_post_fee = $conn->GetRow("select * from ".PREFIX."setting WHERE type='no_post_fee' and lang = '".quotes($lang)."'");//--免運費金額
$post_fee2 = $conn->GetRow("select * from ".PREFIX."setting WHERE type='post_fee2' and lang = '".quotes($lang)."'");//--到達金額運費
$shopping_car->post_fee($post_fee["detail"],$no_post_fee["detail"],$post_fee2["detail"]);

///-活動折扣設定
$shopping_car->active_group_count = 1; //-活動最大數量
$shopping_car->active_any_other = 1;//-不可加入其他商品
$active = $conn->GetArray("select * from ".PREFIX."data_list where type='shop_active_any' and status=1 order by sort");
if ($active) {
	foreach ($active as $k=>$v){
		$active_any_array[] = array($v["name"],str_replace('|__|',',',$v["detail"]),$v["memo"]*1,$v["memo_1"]);
	}
	$shopping_car->active_any_array = $active_any_array;
}

//--現折設定
$now_desh = $conn->GetArray("select * from ".PREFIX."data_list where type='active_desh' and status=1 and active_on_date<='".date('Y-m-d')."' and active_off_date>='".date("Y-m-d")."'");
if ($now_desh)
	foreach ($now_desh as $k=>$v){
		$dtemp = explode('|__|',$v['detail']);
		$shopping_car->active_now_desh_array[] = array($v['name'],str_replace('|__|',',',$v['add_pro']),$dtemp[0],$dtemp[1],false); // array(活動名稱,涵蓋商品編號(X,X),滿額多少,折抵金額,是否疊加(預設是));
	}


//--通知信件資料
$mail_data = $conn->GetArray("select * from ".PREFIX."data_list where type='paymail' and status=1");
if ($mail_data)
	foreach ($mail_data as $k=>$v){
		$shopping_car->order_mail_msg_top[$v['new_type']] = dequotes($v["detail"],-1);//-上板
		$shopping_car->order_mail_msg_foot[$v['new_type']] = dequotes($v["memo"],-1);//-下版
		$shopping_car->order_mail_title[$v['new_type']] = dequotes($v["name"],-1);//-下版
	}
	
///▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇▇	



//--會員判斷是否登入
if (!$member->status() && 0){
	//---沒登入暫存到session 購物車
	if ($_GET["addpro"]){
		if (!$_GET["count"]) $_GET["count"] = 1;
		$_SESSION["temp_shopping_car"][] = $_GET["addpro"].'|__|'.$_GET["count"].'|__|'.$_GET["size"];
		if ($_GET["ajax"]){
			echo 'ok';
			exit;
		}else{
			alert('您未登入已將您購買的商品暫存，登入後才會正式加入購物車',-1);
			exit;
		}
	}
	
	//--其他類的產品暫存
	if ($_REQUEST["addoth"]){
		$_SESSION["temp_other_shopping_car"]["name"] = $_REQUEST["name"];
		$_SESSION["temp_other_shopping_car"]["detail"] = $_REQUEST["detail"];
		$_SESSION["temp_other_shopping_car"]["value"] = $_REQUEST["value"];
		$_SESSION["temp_other_shopping_car"]["count"] = $_REQUEST["count"];
	}
	
	
	if ($_GET["ajax"]) {
		if ($_GET["addoth"]) {
			$_SESSION["login_page"] = $_SERVER['PHP_SELF'].'?'.str_replace('&ajax=1','',$_SERVER['QUERY_STRING']); //--色豆片選購頁面暫存購買
			$_SESSION["addoth_login_tmp"] = '1'; //-判斷是否有其他產品類的暫存 則不使用記憶路徑功能
		}
		echo 'login_erro';
		exit;
	}elseif (!$_SESSION["addoth_login_tmp"]){
		$_SESSION["login_page"] = str_replace('.php','.jsx',strtolower($_SERVER['PHP_SELF'])).'?'.$_SERVER['QUERY_STRING'];
	}
	linkto("member.jsx?act=login");
	exit;
}else{ 
	//--為登入狀態時檢查是否有暫存購物清單
	if ($_SESSION["temp_shopping_car"])
	foreach ($_SESSION["temp_shopping_car"] as $k=>$v){
		$temp = explode('|__|',$v);
		if ($temp[2]!=NULL && $temp[2]!=''){
			$shopping_car->addpro($temp[0],$temp[1],false,$temp[2]);
		}else{
			$shopping_car->addpro($temp[0],$temp[1]);
		}
	}
	unset($_SESSION["temp_shopping_car"]);
	unset($_SESSION["addoth_login_tmp"]);//-記憶路徑判斷
	
	
	//--其他類的產品暫存加入
	//unset($_SESSION["temp_other_shopping_car"]);//-刪除暫存記憶
}



//---針對會員型別進行折扣輸入設定
if ($member->getinfo()){
	$temp_memeber_type = $conn->GetRow("select * from ".PREFIX."data_list where type='memberdesh' and new_type='".$member->getinfo("type")."'");
	if ($temp_memeber_type){
		$shopping_car->deshprice(dequotes($temp_memeber_type["detail"],-1));
	}
}


//--紅利設定 (多少換1)
//$shopping_car->set_point(1);




//-結帳資料
if ($_POST && $_REQUEST['submit']){
	
	//--自訂訂單編號
	$shopping_car->order_auto_set('JSP');
	
	$pay_bill = $shopping_car->paybill($_POST);
	if (!$pay_bill){
		alert('付款結帳失敗!!'.$shopping_car->erromsg,'?list=1');
		exit;
	}else{
		$temp = $shopping_car->esun_pay_send($pay_bill,'回傳路徑');
	}
	linkto('index.jsx');
}else{
	$pay_bill = $shopping_car->update($_POST);
}


//--新增商品
if ($_GET["addpro"]){
	$temp_addpro = explode(',',$_GET["addpro"]);
	$temp_size = explode(',',$_GET["size"]);
	$temp_price = explode(',',$_GET["price"]);
	
	if (!$_GET["count"]) $_GET["count"] = 1;
	
	//---會員分類折扣
	$member_dp = $conn->GetRow("select * from ".PREFIX."data_list where type='memberdesh' and new_type='".$member->getinfo('type')."' and status=1");
	$shopping_car->deshprice($member_dp['detail'],false);
	
	foreach ($temp_addpro as $k=>$v){
		
		//--取得分類折扣
		$pro_data = $conn->GetRow("select * from ".PREFIX."products where id='".$v."'");
		$cat_desh = $conn->GetRow("select * from ".PREFIX."category where id in(".str_replace('|__|',',',$pro_data["class"]).") order by desh desc");
		if ($cat_desh && $cat_desh['desh']!=NULL && $cat_desh['desh']!='') {
			$shopping_car->deshprice($cat_desh['desh'],false);
		}
		
		if (!$_GET["size"]){
			$shopping_car->addpro($v,$_GET["count"]);
		}else{
			if ($_GET["price"])
				$shopping_car->addpro($v,$_GET["count"],false,$temp_size[$k],$temp_price[$k]);
			else
				$shopping_car->addpro($v,$_GET["count"],false,$temp_size[$k]);
		}
	}
		
	if ($shopping_car->erromsg==NULL){
		if ($_GET["ajax"]) {
			echo 'ok';
			exit; ///ajax 加入完就結束
		}
		linkto('?list=1');
	}else{
		alert($shopping_car->erromsg,-1);
	}
}

//--新增其他類商品
if ($_SESSION["temp_other_shopping_car"]){
		$sort = microtime(date("Y-m-d H:i:s"));
		$o_name = explode(',',$_SESSION["temp_other_shopping_car"]["name"]);
		$o_detail = explode(',',$_SESSION["temp_other_shopping_car"]["detail"]);
		$o_value = explode(',',$_SESSION["temp_other_shopping_car"]["value"]);
		$o_count = explode(',',$_SESSION["temp_other_shopping_car"]["count"]);
		foreach ($o_name as $k=>$v){
				$shopping_car->addother($o_name[$k],$o_detail[$k],$o_value[$k],$o_count[$k],false,$$sort);
		}
		unset($_SESSION["temp_other_shopping_car"]);//-刪除暫存記憶
		linkto('?list=1');
		//print_r($_SESSION["temp_other_shopping_car"]);
}
if ($_REQUEST["addoth"]){
	$sort = microtime(date("Y-m-d H:i:s"));
	$o_name = explode(',',$_REQUEST["name"]);
	$o_detail = explode(',',$_REQUEST["detail"]);
	$o_value = explode(',',$_REQUEST["value"]);
	$o_count = explode(',',$_REQUEST["count"]);
	foreach ($o_name as $k=>$v){
			$shopping_car->addother($o_name[$k],$o_detail[$k],$o_value[$k],$o_count[$k],false,$sort);
	}
	if ($_REQUEST["ajax"]){
		echo $_REQUEST["name"].'已加入購物車!!';
		exit;
	}
	linkto('?list=1&oadd=1');
}


//--修改購買數量
if ($_GET["editpro"]){
	$temp = $shopping_car->car_change($_GET["editpro"],$_GET["count"]);
	if ($temp){
		if ($_GET["ajax"]) {
			echo '數量更新成功!!';
			exit;
		}
		alert('數量更新成功!!','?list=1');
	}else{
		if ($_GET["ajax"]) {
			echo $shopping_car->erromsg;
			exit;
		}
		alert('數量更新失敗!!','?list=1');
	}
}


//--顯示購物車清單
if ($_GET["list"]){
	$shopping_car->reload();
	$car = $shopping_car->car_list(NULL,'sort,name');
	if ($car){
		foreach ($car as $k=>$v){
			$pro_aray[] = $v["id"];
		}
		$temp = $conn->GetRow("select * from ".PREFIX."products where id in(".implode(',',$pro_aray).") and close_ezship=1");
		if ($temp) $data["close_ezship"] = 1;
	}

	$order = $shopping_car->car();
	$active = $shopping_car->active_list();


	//--會員自動判斷是否升級
	$check_total = 0;
	if ($member->getinfo('type')!='vip' || strtotime($member->getinfo('mode_time'))<=strtotime(date('Y-m-d H:i:s'))){ //--判斷不是VIP或者時間已到
		$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
		$order_list = $shopping_car->order_list("pay_status=1 and status=1 and create_date>='".$member->getinfo('mode_time')."'");
		if ($order_list)
			foreach ($order_list as $k=>$v){
				$check_total += $v['total']*1;
			}

		//--
		$vip_m = $conn->GetRow("select * from ".PREFIX."data_list where type='memberdesh' and new_type='vip' and status=1");
		if ($vip_m){
			if ($check_total>=$vip_m['memo']*1 && $vip_m['memo']*1>0){
				$indata["type"] = $vip_m['new_type'];
				$indata["mode_time"] = date('Y-m-d H:i:s',strtotime('+1 year'));
			}else{
				$indata['type'] = 'member';
			}
			$member->update($indata);
		}
	}

}
//--刪除
if ($_GET["del"] && $_GET["del"]!=''){
	if ($shopping_car->car_remove($_GET["del"])){
		linkto('?list=1');
	}
}
//--付款
if ($_GET["payorder"]){
	$pay_bill = $shopping_car->getorder(" where id='".$_GET["payorder"]."'");
	if ($pay_bill["pay_status"]!='1'){
		$temp = $shopping_car->esun_pay_send($pay_bill,'回傳路由');
	}else{
		alert('此筆交易已經成功付款了，無需再次付款!!',-1);
		exit;
	}
}

//--商品退貨
if ($_GET["back_item"]){
	if ($shopping_car->back_item($_GET["back_item"])){
		$temp_str = '商品退貨申請成功!!';
	}else{
		$temp_str = $shopping_car->erromsg;
	}
	
	if ($_GET["ajax"]){
		echo $temp_str;
	}else{
		alert($temp_str,'?list=1');
	}
}


$data["member_info"] = $member->getinfo();//--擷取帳戶資料
$data["member_info"]["sex_html"] = $_SETUP["sex"][$data["member_info"]["sex"]];


$data["car"] = $car;
$data["order"] = $order;
$data['active'] = $active;



//--產品加購選單
$data["addpro"] = $conn->GetArray("select * from ".PREFIX."category where root_id='2' and depth=1 and status=1 order by sort");
if ($data["addpro"])
	foreach ($data["addpro"] as $k=>$v){
		$data["addpro"][$k]["product"] = $conn->GetArray("select * from ".PREFIX."products where class like '%".$v["id"]."%' and type='products2' and status=1 order by sort");
		if ($data["addpro"][$k]["product"])
			foreach ($data["addpro"][$k]["product"] as $n1=>$n2){
				$data["addpro"][$k]["product"][$n1]["pic"] = explode('|__|',$n2["pic"]);
			}
	}



$tploutput = $design->load("shopping");
include_once("index.php");

?>