<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$table = PREFIX."admin";
$id = quotes($_SESSION["admin_info"]["id"]);
$act = $_POST["act"];

foreach($_POST as $k => $v)
	$record[$k] = quotes($v);


$sql = " select * from ".$table." WHERE 1=1 and ";


if($act=='submit')
{
	if($record["password"]!=NULL)
		$record["password"] = md5($record["password"]);	
	else
		unset($record["password"]);

	$record["update_date"] = date("Y-m-d H:i:s");
	$record["update_name"] = $_SESSION["admin_info"]["account"];
	
	$where = "id=".$id;
	
	$conn->AutoExecute($table,$record,"UPDATE",$where);
	alert("修改完成",Page_get_url(''));
	exit;
}




$sql_2 = " select * from ".PREFIX."admin_group ";
$group = $conn->GetArray($sql_2);

if($id)
{
	$sql .= " id=".$id;
	$data = $conn->GetRow($sql);
	$data["status_html"] = Make_radio($_SETUP["status"],$data["status"],"status");
	
	$temp = $conn->GetArray("select * from ".PREFIX."admin_group where control>=".$_SESSION["admin_info"]["control"]);
	foreach ($temp as $k=>$v){
		$temp_array[$v["id"]] = $v["name"];
	}
	$data["group_html"] = Make_list($temp_array,$data["group_id"]);
	
	$_SESSION["admin_info"]["view"] = "detail";
}




include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("content",ROOT_PATH.$admin_path."templates/admin.html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>