<?php /* Smarty version Smarty-3.1.18, created on 2014-07-21 10:31:24
         compiled from "shopping.php" */ ?>
<?php /*%%SmartyHeaderCode:2554753cc72a1aab0f1-94085075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0afa154230196eac232a19b03e9e6a91543c2db5' => 
    array (
      0 => 'shopping.php',
      1 => 1405909294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2554753cc72a1aab0f1-94085075',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53cc72a1bec7a5_23713489',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cc72a1bec7a5_23713489')) {function content_53cc72a1bec7a5_23713489($_smarty_tpl) {?><<?php ?>?php
include_once("head.php");
include_once("member_class.php");

$include = true;

$templates_page = "templates.html";

//--引用與設定
//## 會員
$member = new member($conn,PREFIX."member");
//## 購物車
$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");

//--會員判斷是否登入
if (!$member->status()){
	//---沒登入暫存到session 購物車
	if ($_GET["addpro"]){
		if (!$_GET["count"]) $_GET["count"] = 1;
		$_SESSION["temp_shopping_car"][] = $_GET["addpro"].'|__|'.$_GET["count"];
		if ($_GET["ajax"]){
			echo 'ok';
			exit;
		}else{
			alert('您未登入已將您購買的商品暫存，登入後才會正式加入購物車',-1);
			exit;
		}
	}
	
	if ($_GET["ajax"]) {
		echo 'login_erro';
		exit;
	}else{
		$_SESSION["login_page"] = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	}
	linkto("member.php?act=login");
	exit;
}else{ //--為登入狀態時檢查是否有暫存購物清單
	if ($_SESSION["temp_shopping_car"])
	foreach ($_SESSION["temp_shopping_car"] as $k=>$v){
		$temp = explode('|__|',$v);
		$shopping_car->addpro($temp[0],$temp[1]);
	}
	unset($_SESSION["temp_shopping_car"]);
}

//---針對會員型別進行折扣輸入設定
if ($member->getinfo()){
	$temp_memeber_type = $conn->GetRow("select * from ".PREFIX."data_list where type='memberdesh' and new_type='".$member->getinfo("type")."'");
	if ($temp_memeber_type){
		$shopping_car->deshprice(dequotes($temp_memeber_type["detail"],-1));
	}
}


//--運費設定
$post_fee = $conn->GetRow("select * from ".PREFIX."setting WHERE type='post_fee' and lang = '".quotes($lang)."'");//--運費
$no_post_fee = $conn->GetRow("select * from ".PREFIX."setting WHERE type='no_post_fee' and lang = '".quotes($lang)."'");//--免運費金額
$post_fee2 = $conn->GetRow("select * from ".PREFIX."setting WHERE type='post_fee2' and lang = '".quotes($lang)."'");//--到達金額運費
$shopping_car->post_fee($post_fee["detail"],$no_post_fee["detail"],$post_fee2["detail"]);

//--紅利設定 (多少換1)
$shopping_car->set_point(1);




//--新增商品
if ($_GET["addpro"]){
	$temp_addpro = explode(',',$_GET["addpro"]);
	
	if (!$_GET["count"]) $_GET["count"] = 1;
	
	foreach ($temp_addpro as $k=>$v){
		if (!$_GET["size"]){
			$shopping_car->addpro($v,$_GET["count"]);
		}else{
			$shopping_car->addpro($v,$_GET["count"],false,$_GET["size"]);
		}
	}
		
	if ($shopping_car->erromsg==NULL){
		if ($_GET["ajax"]) {
			echo 'ok';
			exit; ///ajax 加入完就結束
		}
		linkto($_SERVER['PHP_SELF'].'?list=1');
	}else{
		echo $shopping_car->erromsg;
	}
}

//--新增其他類商品
if ($_GET["addoth"]){
	$o_name = explode(',',$_GET["name"]);
	$o_detail = explode(',',$_GET["detail"]);
	$o_value = explode(',',$_GET["value"]);
	$o_count = explode(',',$_GET["count"]);
	foreach ($o_name as $k=>$v){
		$shopping_car->addother($o_name[$k],$o_detail[$k],$o_value[$k],$o_count[$k]);
	}
	linkto($_SERVER['PHP_SELF'].'?list=1&oadd=1');
}


//--修改購買數量
if ($_GET["editpro"]){
	$temp = $shopping_car->car_change($_GET["editpro"],$_GET["count"]);
	if ($temp){
		if ($_GET["ajax"]) {
			echo '數量更新成功!!';
			exit;
		}
		alert('數量更新成功!!',$_SERVER['PHP_SELF'].'?list=1');
	}else{
		if ($_GET["ajax"]) {
			echo $shopping_car->erromsg;
			exit;
		}
		alert('數量更新失敗!!',$_SERVER['PHP_SELF'].'?list=1');
	}
}


//--顯示購物車清單
if ($_GET["list"]){
	$car = $shopping_car->car_list();
	$order = $shopping_car->car();
}
//--刪除
if ($_GET["del"] && $_GET["del"]!=''){
	if ($shopping_car->car_remove($_GET["del"])){
		linkto($_SERVER['PHP_SELF'].'?list=1');
	}
}
//--付款
if ($_GET["payorder"]){
	$pay_bill = $shopping_car->getorder(" where id='".$_GET["payorder"]."'");
	if ($pay_bill["pay_status"]!='1'){
		$temp = $shopping_car->homyn_pay_send($pay_bill);
		if ($temp){
			alert($temp,-1);
		}
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
		alert($temp_str,$_SERVER['PHP_SELF'].'?list=1');
	}
}

//-結帳資料
if ($_POST){
	$pay_bill = $shopping_car->paybill($_POST);
	if (!$pay_bill){
		alert('付款結帳失敗!!'.$shopping_car->erromsg,$_SERVER['PHP_SELF'].'?list=1');
		exit;
	}else{
		$temp = $shopping_car->homyn_pay_send($pay_bill);
		if ($temp){
			alert($temp,-1);
		}
	}
	linkto('index.php');
}

$data["member_info"] = $member->getinfo();//--擷取帳戶資料
$data["member_info"]["sex_html"] = $_SETUP["sex"][$data["member_info"]["sex"]];


$data["car"] = $car;
$data["order"] = $order;




//--產品加購選單
$data["addpro"] = $conn->GetArray("select * from ".PREFIX."category where root_id='2' and depth=1 and status=1 order by sort");
if ($data["addpro"])
	foreach ($data["addpro"] as $k=>$v){
		$data["addpro"][$k]["product"] = $conn->GetArray("select * from ".PREFIX."products where  type='products2' and status=1 order by sort");
		if ($data["addpro"][$k]["product"])
			foreach ($data["addpro"][$k]["product"] as $n1=>$n2){
				$data["addpro"][$k]["product"][$n1]["pic"] = explode('|__|',$n2["pic"]);
			}
	}

include_once("index.php");

/*
function pay_send($pay_bill){
		//--串接金流
		switch ($pay_bill["paycardmode"]){
			case "1":
				$pay_bill["web"] = 'S1405270149';
				order_mail_send($pay_bill);
			break;
			case "2":
				$pay_bill["web"] = 'S1405270206';
				order_mail_send($pay_bill);
			break;
			case "3":
				order_mail_send($pay_bill,1);
				exit;
			break;
		}
		echo '
		<form id="form1" action="homyn/homyu_api.php" method="POST">
		<input type="hidden" name="web" value="'.$pay_bill["web"].'" />
		<input type="hidden" name="MN" value="'.($pay_bill["total"]+$pay_bill["post_fee"]).'" />
		<input type="hidden" name="OrderInfo" value="產品" />
		<input type="hidden" name="Td" value="'.$pay_bill["order_no"].'" />
		<input type="hidden" name="sna" value="'.$pay_bill["member_id"].'" />
		<input type="hidden" name="DueDate" value="'.date("Ymd").'" />
		<input type="hidden" name="Card_Type" value="0" /> <!--10.交易類別-->
		<input type="submit" name="button" id="button" value="送出" />
		</form><script>document.forms.form1.submit();</script>';
		exit;
}

function order_mail_send($pay_bill,$callback=NULL){
	global $mail;
	global $smtp_set;
	global $web_set;
	global $tpl;
	global $conn;
	global $shopping_car;
	global $lang;
	//網站設定 $web_set
	$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
	$tmp = $conn->GetArray($sql);
	$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
	$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
	$web_set["receive_email"] = $tmp["2"]["detail"];
	$web_set["send_email"] = $tmp["4"]["detail"];
	$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];
	
	//--資料載入
	$data["order"] = $pay_bill;
	$data["pro_title"] = array('購物編號','商品名稱','商品圖片','數量','單價');
	$data["pro"] = $shopping_car->car_list($pay_bill["id"]);
	foreach ($data["pro"] as $k=>$v){
		$v["pic"] = explode('|__|',$v["pic"]);
		$data["pro"][$k]["img_html"] = '<img src="'.$_SERVER['HTTP_HOST'].'/upload/product/'.$v["pic"][0].'" width="100" height="75" />';
	}
	$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='ATM' and status='1'");
	$data["one"]["detail"] = dequotes($data["one"]["detail"]);
	
	ob_start(); 	//打開快取
	$tpl->assign("data",$data);
	$tpl->display(ROOT_PATH.'templates/MAIL_shopp.html');
	$cache_string = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
		
		
		if (!$smtp_set){
	
			$mailTo = $pay_bill["recive_email"].','.$web_set["send_email"];
			$subject = $web_set["title"].' 訂單確認信件';
			$from_mail = $web_set["send_email"];
			
			$message = $cache_string;
			$subject = $subject;
			$headers = 'Content-type: text/html; charset="utf-8"' . "\r\n";
			$headers .= "From: ".$from_mail . "\r\n"; // 請自行替換寄件地址
			mail($mailTo, $subject, $message, $headers);
			if ($callback!=NULL) alert("已寄送訂單內容至郵件中!!",-1);
		}else{
			$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
			$mail->AddAddress($pay_bill["recive_email"],$web_set["send_email"]);
			$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
			$mail->Subject = $web_set["title"].' 訂單確認信件';    // 設定郵件標題        
			$mail->Body = $cache_string;
			if($mail->Send()){
				if ($callback!=NULL) alert("已寄送訂單內容至郵件中!!",-1);
			}else{
				print_r($smtp_set["detail"]);
				exit;
			}
	
		}
}
*/
?<?php ?>><?php }} ?>
