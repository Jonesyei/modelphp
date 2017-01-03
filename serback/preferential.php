<?php
include_once("../includes/main_back_inc.php");

function data_mail_insert($order,$data){
	$mailbody = $data;
	$mailbody = str_replace('[訂單編號]',$order["order_no"],$mailbody);
	$mailbody = str_replace('[出貨狀態]',$_SETUP["shipped"][$order['cargo_status']],$mailbody);
	$mailbody = str_replace('[付款狀態]',$_SETUP["payment_status"][$order["pay_status"]],$mailbody);
	$mailbody = str_replace('[建立時間]',$order["create_date"],$mailbody);
	$mailbody = str_replace('[出貨時間]',date("Y-m-d H:i:s"),$mailbody);
	$mailbody = str_replace('[購物總額]',($order["total"]*1+$order["post_fee"]*1),$mailbody);
	$mailbody = str_replace('[收件人]',$order["recive_name"],$mailbody);
	$mailbody = str_replace('[收件人地址]',$order["recive_address"],$mailbody);
	$mailbody = str_replace('[收件人信箱]',$order["recive_email"],$mailbody);
	$mailbody = str_replace('[收件人電話]',$order["phone"],$mailbody);
	$mailbody = str_replace('[備註訊息]',$order["memo"],$mailbody);
	return $mailbody;
}



$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$_SESSION["admin_info"]["file_url"] = "../upload/".$_GET["class"]."/";


//--smarty 功能是否 1關閉 0開啟
$close["add"]	= 1;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 1;

switch ($_GET["class"])
{
	
}
$cpos["pagecount"] = 30;//每頁顯示筆數
$cpos["table"] = PREFIX."shopping_car";
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["tablelistwhere"] = 'where step!=1 and status>=0';

$cpos["listorderby"] = 'update_date desc,id desc';//列表頁排序方式
$cpos["tablesearch"] = 'order_no';//文字搜尋關聯欄位
$cpos["searchdate"] = 'create_date';
$cpos["search"] = array('name'=>'keyword','order_no'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass');

//--經銷商登入
if ($_SESSION["admin_info"]["control"]=='3'){
	$cpos["tablelistwhere"] .= " and company='".$_SESSION["admin_info"]["id"]."'";
	$page_name .='_readonly';
}


//---更新前抓舊資料
if ($_GET["id"]){
	$sql = "select * from ".$cpos["table"]." WHERE id='".$_GET["id"]."'";
	$befo_data = $conn->GetRow($sql);
}

//--出貨狀態更換時 送出 紅利點數
if ($_POST["cargo_status"]!=$befo_data["cargo_status"] && $_POST["cargo_status"]=='1' && $befo_data["cargo_status"]!='1'){
	$conn->Execute("UPDATE ".PREFIX."member SET point=point+".$befo_data["addpoint"]." WHERE id ='".$befo_data["member_id"]."'");
	$member_data = $conn->GetRow("select * from ".PREFIX."member where id='".$befo_data["member_id"]."'");
	$member_type = $conn->GetArray("select * from ".PREFIX."data_list where type='memberdesh' and status=1");
	foreach ($member_type as $k=>$v){
		$v["memo"] = explode('|__|',dequotes($v["memo"]));
		if ($member_data["point"]*1>=$v["memo"][0]*1 && $member_data["point"]*1<=$v["memo"][1]*1){
			$conn->Execute("UPDATE ".PREFIX."member SET type='".$v["new_type"]."' WHERE id ='".$befo_data["member_id"]."'");
		}
	}
	
	//-更改出貨日期
	$conn->Execute("UPDATE ".$cpos["table"]." SET cargo_date='".date('Y-m-d H:i:s')."' WHERE id ='".$befo_data["id"]."'");
	

	/*出貨信件內容*/	
	$mail_data = $conn->GetRow("select * from ".PREFIX."data_list where type='cargomail' and status=1 and new_type='".$befo_data["paycardmode"]."'");
	if ($mail_data){
		$mailbody = dequotes($mail_data["detail"],-1);
		$mailbody = data_mail_insert($befo_data,$mailbody);
		$subject = data_mail_insert($befo_data,$mail_data["name"]);
	}else{
		$mailbody = $befo_data['recive_name'].' 您好，訂單編號['.$befo_data['order_no'].'] 已被管理者異動為已出貨，特此通知';
		$subject = $web_set["title"].' 訂單狀態異動信件';
	}
	
	//網站設定 $web_set
	$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
	$tmp = $conn->GetArray($sql);
	
	$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
	$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
	$web_set["receive_email"] = $tmp["2"]["detail"];
	$web_set["default_email_title"] = $tmp["3"]["detail"];
	$web_set["send_email"] = $tmp["4"]["detail"];
	$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];
	
	$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
	$mail->AddAddress($befo_data["recive_email"]);
	$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
	$mail->Subject = $subject;    // 設定郵件標題        
	$mail->Body = $mailbody;
	$mail->Send();
}

//--刪除時一併移除訂單商品資料
if ($_GET["del_id"]!='' && $_GET["del_id"]!=NULL){
	$temp_array = $conn->Execute("DELETE FROM ".PREFIX."shopping_car_list WHERE shopping_car_id in (".$_GET["del_id"].")");
}

if ($_GET["company"]){
	$temp = $conn->GetRow("select * from ".PREFIX."admin where account like '%".$_GET["company"]."%'");
	$cpos["tablelistwhere"] .= " and (company ='".$temp["id"]."' or company='".$_GET["company"]."')";
}

include_once("centerpoes.php");

$data["csv_sql"] = str_replace('*','id,order_no,cargo_status,pay_status,total,post_fee,recive_name,recive_email,recive_address,create_date',$centerpossql);



unset($_SETUP["car_status"]['1']); //--移除購物車狀態


//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["carlist"] = $conn->GetArray("select * from ".PREFIX."shopping_car_list where shopping_car_id='".$data["one"]["id"]."'");
	$data["one"]["pay_html"] = $_SETUP["paytype"][$data["one"]["paycardmode"]];
	$data["member"] = $conn->GetRow("select * from ".PREFIX."member where id='".$data["one"]["member_id"]."'");
	
	if ($data["one"]["company"]!='' && $data["one"]["company"]!=NULL){
		$temp = $conn->GetRow("select * from ".PREFIX."admin where id='".$data["one"]["company"]."'");
		$data["one"]["company"] = '<a href="admin.php?id='.$temp["id"].'">'.$temp["name"].'('.$temp["account"].')</a>';
	}
	
	//**取得活動資料
	$data["active_group"] = $conn->GetArray("select * from ".PREFIX."shopping_car_groups where shopping_car_id='".$data["one"]["id"]."'");
}
else//列表頁
{
	//-- 再次處理列表資料
	if ($data["list"])
	foreach ($data["list"] as $k=>$v){
		$data["list"][$k]["paymode_statushtml"] = $_SETUP["payment_status"][$v["paymode_status"]]; //--金流狀態
		$data["list"][$k]["paymode_html"] = $_SETUP["paytype"][$v["paycardmode"]];
	}	

}

$temp = array('0'=>'未出貨','1'=>'已出貨');
$_SESSION["admin_info"]["search"]["status"] = '<select name="s_cargo_status"><option value="">選擇出貨狀態</option>'.Make_list($temp,$_GET["s_cargo_status"]).'</select>';
$temp = array('0'=>'未付款','1'=>'已付款');
$_SESSION["admin_info"]["search"]["status"] .= '<select name="s_pay_status"><option value="">選擇付款狀態</option>'.Make_list($temp,$_GET["s_pay_status"]).'</select>';
$_SESSION["admin_info"]["search"]["status"] .= '<select name="s_paycardmode"><option value="">選擇付款方式</option>'.Make_list($_SETUP["paytype"],$_GET["s_paycardmode"]).'</select>';
$temp = array('0'=>'未付款','1'=>'已付款');
$_SESSION["admin_info"]["search"]["status"] .= '<select name="s_paymode_status"><option value="">選擇金流狀態</option>'.Make_list($temp,$_GET["s_paymode_status"]).'</select>';

include_once("index.php");//assign 所有資料、共用頁面



$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





