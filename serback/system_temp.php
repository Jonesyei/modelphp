<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$cpos["pagecount"] = 30; //每頁顯示筆數
$cpos["table"] = PREFIX."system_temp";
$cpos["listorderby"] = 'create_date desc';//列表頁排序方式
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["search"] = array('account'=>'keyword','FILE_URL'=>'keyword','create_date'=>'daterange');//搜尋關聯欄位
$_SESSION["admin_info"]["file_url"] = $cpos["file_url"] = "../upload/products/";






$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 1;
//if(@$_POST["act"]=="excel") include_once("excel_products.php");


if ($_GET["deleteall"]){
	$am = $conn->Execute("delete from ".$cpos["table"]);
	//$am = $conn->Execute("drop table ".$cpos["table"]);
	if ($am) alert('已重新記錄表單!! ',-1);
	exit;
}



include_once("centerpoes.php");





if($_GET["id"])
{
	$data["one"]["FILE_URL"] = explode('|__|',$data["one"]["FILE_URL"]);
	$data["one"]["POST_DATA"] = explode('~****~',$data["one"]["POST_DATA"]);
	foreach ($data["one"]["POST_DATA"] as $k=>$v){
		$data["one"]["POST_DATA"][$k] = explode('@F@',$v);
		$data["one"]["POST_DATA"][$k][1] = str_replace('|__|','<br>',$data["one"]["POST_DATA"][$k][1]);
	}
	$data["one"]["BACK_DATA"] = explode('~****~',$data["one"]["BACK_DATA"]);
	foreach ($data["one"]["BACK_DATA"] as $k=>$v){
		$data["one"]["BACK_DATA"][$k] = explode('@F@',$v);
		$data["one"]["BACK_DATA"][$k][1] = str_replace('|__|','<br>',$data["one"]["BACK_DATA"][$k][1]);
	}
	
	$data["one"]["act_html"] = $_SETUP['dbact'][$data["one"]["act"]];
}
else
{
	if ($data["list"])
	foreach ($data["list"] as $k=>$v){
		$data["list"][$k]["FILE_URL"] = explode('|__|',$v["FILE_URL"]);
		$data["list"][$k]["act_html"] = $_SETUP['dbact'][$v["act"]];
	}
}


$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["shopping_car_status"],$_GET["s_status"]);







include_once("index.php");//assign 所有資料、共用頁面



$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>