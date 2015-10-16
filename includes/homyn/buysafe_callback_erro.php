<?php
include_once("../includes/main_inc.php");

if ($_POST){
	$data["data"] = 'erro==>'.json_encode($_POST);
	$data["create_date"] = date("Y-m-d H:i:s");
	$avalue = $conn->AutoExecute(PREFIX.'temp',$data,"INSERT");
	alert('еI┤┌ев▒╤!!','../member.php?act=order');
}
?>