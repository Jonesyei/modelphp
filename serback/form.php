<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$cpos["pagecount"] = 10; //每頁顯示筆數
$cpos["table"] = PREFIX."form";
$cpos["tablelistwhere"] = "WHERE type='".quotes($_GET["class"])."'";//列表顯示資料的條件
$cpos["tablewhere"] = 'id="'.$_GET["id"].'"';
$cpos["listorderby"] = "create_date desc";
$cpos["search"] = array('create_date'=>'daterange','status'=>'s_status');

$cpos["file_check"] = array('pic','file');

$close["insert"] =1;
$close["add"]	= 1;
$close["del"]	= 1;
$close["edit"]	= 0;
$close["copy"]	= 0;
$close["sort"]  = 1;

//--取得相關資料
$class_data = $conn->GetRow("select * from ".PREFIX."data_list where type='form_set' and b_name='".quotes($_GET["class"])."'");
if ($class_data){
	$class_data["detail"] = explode('|__|',$class_data["detail"]);
	$class_data["memo"] = explode('|__|',$class_data["memo"]);
	$class_data["b_value"] = explode('|__|',$class_data["b_value"]);
	if ($class_data["detail"])
		foreach ($class_data["detail"] as $k=>$v){
			$form[$v] = $class_data["memo"][$k];
			$showstatus[$v] = $class_data["b_value"][$k];
			if ($class_data["b_value"][$k]=='1') $cpos["search"][$v] = 'keyword';
		}
}



$data["show"]["form"] = $form;
$data["show"]["status"] = $showstatus;

include_once("centerpoes.php");




//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	if ($data["one"])
		foreach ($data["one"] as $k=>$v){
			if (!is_numeric($k)) $data["one"][$k] = (is_array($v) ? implode('<br>',$v):str_replace('|__|','<br>',$v));
			if (!is_numeric($k) && ereg("[a-zA-Z0-9\._\+]+@([a-zA-Z0-9\.-]\.)*[a-zA-Z0-9\.-]+", $v)){
				$data["one"]["_default_email"] = $v;
			}
		}
	if ($data["one"]["email"]) $data["one"]["_default_email"] = $data["one"]["email"];
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





