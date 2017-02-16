<?php

include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$cpos["pagecount"] = 30; //每頁顯示筆數
if ($_GET["type"]) 
	$cpos["tablelistwhere"] = "WHERE type='".$_GET["type"]."' and lang='".$_SESSION["admin_info"]["lang"]."'";//列表顯示資料的條件
else
	$cpos["tablelistwhere"] = "WHERE type='main' and lang='".$_SESSION["admin_info"]["lang"]."'";//列表顯示資料的條件
$cpos["listorderby"] = "sort";
$cpos["table"] = PREFIX."design";
if (is_numeric($_GET["id"])){
	$cpos["tablewhere"] = 'id='.$_GET["id"].' and lang=\''.$_SESSION["admin_info"]["lang"].'\'';
}else{
	$cpos["tablewhere"] = ' b_name=\''.$_GET["id"].'\' and lang=\''.$_SESSION["admin_info"]["lang"].'\'';
}
$cpos["search"] = array('name'=>'keyword','detail'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass');
$_SESSION["admin_info"]["file_url"] = $cpos["file_url"] = "../upload/member/";


//--判斷別名是否使用重複
if ($_POST && $_POST["b_name"]!='' && $_GET["id"]!=$_POST["b_name"]){
	$check_data = $conn->GetRow("select * from ".$cpos["table"]." where b_name='".$_POST["b_name"]."' and type='".$_GET["type"]."' and lang='".$_SESSION["admin_info"]["lang"]."'");
	if ($check_data && $check_data["id"]!=$_GET["id"]) alert('此別名已重複使用',-1);
}




$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 0;
$close["sort"]  = 0;

if (!$_GET["type"]) $_GET["type"] = "main";



if ($_POST && !$_POST["lang"])
	$_POST["lang"] = $_SESSION["admin_info"]["lang"];
	
if ($_POST && $_GET["type"])
	$_POST["type"] = $_GET["type"];




/*
if ($_POST["detail"]){
	$file_name = date("YmdHis").".html";
	$file = fopen("../templates/".$file_name,"w+"); //開啟檔案
	fwrite($file,$_POST["detail"]);
	fclose($file);
	$_POST["temp_file"] = $file_name;
}
*/

if ($_POST["detail"]) $_POST["detail"] = quotes($_POST["detail"],-1);

include_once("centerpoes.php");


if ($_GET["ajax"]){
	echo dequotes($data["one"]["detail"],-1);
	exit;
}




if($_SESSION["admin_info"]["view"]=="detail")
{


	//主板塊路徑
	$data["one"]["main_url"] = '../index.php?ban='.$data["one"]["id"];
		
}
else
{
	if ($data["list"])
	foreach($data["list"] as $k=>$v){
		$data["list"][$k]["mode_html"] = $_SETUP["member_mode"][$v["mode"]];
		$data["list"][$k]["sex_html"] = $_SETUP["sex"][$v["sex"]];
	}
	
}

$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);

include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("design",$design);
$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>