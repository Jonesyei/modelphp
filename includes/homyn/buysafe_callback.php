<?php
include_once("../../includes/main_inc.php");


$member_key = 'Aa10270601'; //--商家密碼
/*
$_POST["Td"] = '140368101519';
$_POST["web"] = 'S1405270206';
$_POST["buysafeno"] = 'abcd1234';
$_POST["MN"] = 1500;
$_POST["errcode"] = 00;
$_POST["ChkValue"] = strtoupper(sha1($_POST["web"].$member_key.$_POST["buysafeno"].$_POST["MN"].$_POST["errcode"]));
*/
if ($_POST){
	/**資料記憶*/
	$data["data"] = 'ok==>'.json_encode($_POST);
	$data["create_date"] = date("Y-m-d H:i:s");
	$avalue = $conn->AutoExecute(PREFIX.'temp',$data,"INSERT");
	
	//--購物車
	$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
	
	if ($_POST["errcode"]*1==0){
		if ($_POST["ChkValue"]==strtoupper(sha1($_POST["web"].$member_key.$_POST["buysafeno"].$_POST["MN"].$_POST["errcode"]))){
			$shopping_car->paycheck($_POST["Td"]);
			alert('付款成功!!','../member.php?act=order');
		}
	}
}
?>