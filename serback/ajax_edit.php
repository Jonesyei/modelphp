<?php
include_once("../includes/main_back_inc.php");

if ( $_SESSION["admin_info"]["account"]=="" )
{
	LinkTo("index.html");
}

//緩衝
usleep(1000000 * .5);
//-------接收參數---------//
$value		= quotes($_POST['value']);		//更新的值
$element_id	= $_POST['element_id'];			//選取的元素id
$id			= quotes($_GET['id']);			//要更新的id
$table		= quotes($_GET['table']);		//表名稱
$field 		= quotes($_GET['field']);		//更新欄位名
$type 		= $_GET['type'];				//更新欄位名

//----------設定初值----------
$update	= date("Y-m-d H:i:s");

//-------資料處理--------//
$record = array(); 
$record[ $field ] 		= $value;
$record["update_date"] 	= $update;
$rs=&$conn->AutoExecute($table,$record,'UPDATE',"id='".$id."'");
if(!$rs)
{
	echo "ajax錯誤!!";
	$db->Close();
	exit;
}

if($type==1) $text=$_SETUP['groupStatus'][$value];
else if($type==2)	$text=$_SETUP['hot'][$value];
else if($type==3) 	$text=$_SETUP['replyStatus'][$value];
else $text=$value;

//判斷修改的狀態table
if($table==PREFIX."admin_group")
{
	//更新所屬帳號狀態
	$sql="Update ".PREFIX."admin set status='".$value."' where group_id ='".$id."'";
	$db->Execute($sql);
	if(!$rs) Error($db);	
}

echo $text;
?>