<?php
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");
include_once($temp_nowurl[0]."member_class.php");

if ($_GET['sn_id']!=='00000000'){

	if (strlen($_GET['sn_id'])>8) { //-判斷是否取貨付款
		$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
		$shopping_car->paycheck($_GET['order_id']);
		
		alert('訂單 '.$_GET['order_id'].' 已完成取貨付款申請!!','');
	}else{
		//--超商取貨
		$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
		$order = $shopping_car->getorder(" where order_no='".$_GET['order_id']."'");
		$indata['MerchantNumber'] = '1';
		$shopping_car->update($indata,$order['id']);
		
		//$shopping_car->paycheck($_GET['order_id']);
		alert('訂單'.$_GET['order_id'].'已完成超商取貨申請!!\\r\\n 到店編號 [ '.$_GET['sn_id'].' ]','/');
		
	}
}
?>
