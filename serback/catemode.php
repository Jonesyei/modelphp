<?php
include_once("../includes/main_back_inc.php");


$include = true;//不讓 index.php display的參數

$_SESSION["admin_info"]["file_url"] = "../upload/".$_GET["class"]."/";

//--smarty 功能是否 1關閉 0開啟
$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;


$cpos["pagecount"] = 30;//每頁顯示筆數
$cpos["table"] = PREFIX."category";
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["tablelistwhere"] = "where parent_id=0 and lang='".$lang."'";

$cpos["listorderby"] = 'id';//列表頁排序方式
$cpos["search"] = array('name'=>'keyword','order_no'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass');

if ($_POST && $_GET["id"]=='0'){
	$_POST["parent_id"] = '0';
	$_POST["sort"] = '0';
	$_POST["depth"] = '0';
	$_POST["lft"] = '0';
	$_POST["rgt"] = '1';
	$_POST["sys"] = '1';
	$_POST["root_id"] = Auto_id($conn,$cpos["table"]);
	$_POST["update_date"] = date("Y-m-d H:i:s");
	if ($_GET["id"]=='0' || $_GET["id"]==NULL){
		$_POST["create_date"] = date("Y-m-d H:i:s");
	}
}

if ($_GET["del_id"]!=NULL){
		$avalue = $conn->Execute("DELETE FROM ".$cpos["table"]." WHERE root_id in (".$_GET["del_id"].")");
		if ($avalue) alert('刪除分類成功!!',-1);
		exit;
}

include_once("centerpoes.php");



//明細
if($_SESSION["admin_info"]["view"]=="detail")
{

	
}
else//列表頁
{

}
/*
$temp = array('0'=>'未出貨','1'=>'已出貨');
$_SESSION["admin_info"]["search"]["status"] = '<select name="s_cargo_status"><option value="">選擇出貨狀態</option>'.Make_list($temp,$_GET["s_cargo_status"]).'</select>';
*/
include_once("index.php");//assign 所有資料、共用頁面



$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





