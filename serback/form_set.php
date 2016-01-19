<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$cpos["pagecount"] = 10; //每頁顯示筆數
$cpos["table"] = PREFIX."data_list";
$cpos["tablelistwhere"] = "WHERE type='".quotes($_GET["class"])."'";//列表顯示資料的條件
$cpos["tablewhere"] = 'id="'.$_GET["id"].'"';
$cpos["listorderby"] = "create_date desc";

$cpos["file_check"] = array('pic','file');

$close["insert"] =0;
$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 0;
$close["sort"]  = 1;



include_once("centerpoes.php");




//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["one"]["detail"] = explode('|__|',dequotes($data["one"]["detail"],-1));
	$data["one"]["memo"] = explode('|__|',dequotes($data["one"]["memo"],-1));
	$data["one"]["b_value"] = explode('|__|',$data["one"]["b_value"]);
}
else//列表頁
{
	
	
}





$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);


$data["file_url"] = $cpos["file_url"];
include_once("index.php");//assign 所有資料、共用頁面

$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





