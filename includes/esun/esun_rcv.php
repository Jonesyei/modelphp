<?php
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");

$member_id = '8089009467';//特店代號
$member_key = 'EOVVASTMGPBIWUFQEKOREYEHSUJRN1EB';


$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
echo 'test';

if ($_GET['RC']==='00'){
	//--購物車
	

	$data = $_GET;
	$temp_key_str = $data['RC'].'&'.$data['MID'].'&'.$data['ONO'].'&'.$data['LTD'].'&'.$data['LTT'].'&'.$data['RRN'].'&'.$data['AIR'].'&'.$data['AN'].'&'.$member_key;
	if (strtolower(md5($temp_key_str))===$data['M']){
		
		$shopping_car->paycheck($data["ONO"]);
		alert('付款成功!!','../../member.php?act=order');
	}else{
		echo '驗證比對失敗!!';
	}
}else{
	switch ($_GET["RC"]){
		case "G6":
			alert('金流已交易失敗，請重新建立訂單交易!!','../../member.php?act=order');
		break;
		case "G0":
			alert('金流方系統維護中!!','../../member.php?act=order');
		break;
		default:
			alert('交易失敗!!','../../member.php?act=order');
		break;
	}

}
?>