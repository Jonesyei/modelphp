<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數


$table = PREFIX."admin";
$group_table = PREFIX."admin_group";

$id = quotes(strtolower($_GET["id"])=="lang" ? $_SESSION["admin_info"]["id"]:$_GET["id"]);
$act = $_POST["act"];
$del_id = quotes($_GET["del_id"]);

foreach($_POST as $k => $v)
	$record[$k] = quotes($v);
	
if ($record["email"]!=NULL) $record["email"] = strtolower($record["email"]);

//批次修改全部
if($act=='all')
	include("update_all.php");
	

$joinsql = ' left join (select id as gid,control from '.$group_table.($_SESSION["admin_info"]["lang_auth"] ? ' where lang_auth=\''.$_SESSION["admin_info"]["lang_auth"].'\'':'').') as bb On gid=group_id';
$sql = " select * from ".$table.$joinsql." WHERE 1=1 and ";


if (isset($_POST["email"]) && $_POST["email"]!=''){
	if ($id!=0){
		$check_email_sql = 'select * from '.$table." where email='".$_POST["email"]."' and id !='".$id."'";
	}else{
		$check_email_sql = 'select * from '.$table." where email='".$_POST["email"]."'";
	}
	if ($conn->GetRow($check_email_sql)){alert('信箱已被重複使用!! 請使用另外一個信箱',-1);exit;}
}


if($act=='submit')
{
	if($record["password"]!=NULL)
		$record["password"] = md5($record["password"]);	
	else
		unset($record["password"]);

	if($id!=0)
	{
		$record["update_date"] = date("Y-m-d H:i:s");
		$record["update_name"] = $_SESSION["admin_info"]["account"];
		
		$where = "id=".$id;
		$conn->AutoExecute($table,$record,"UPDATE",$where);
		alert("修改完成",Page_get_url(''));
		exit;
	}
	else
	{
		if ($record['group_id']<=0) alert("權限必須選擇",-1);
		
		$sql = "select * from ".PREFIX."admin WHERE account='".quotes($_POST["account"])."'";
		$tmp = $conn->GetOne($sql);
		if($tmp)
		{
			alert("此帳號重覆",Page_get_url(''));
			exit;
		}
	
		$record["update_date"] = $record["create_date"] = date("Y-m-d H:i:s");
		$record["update_name"] = $record["create_name"] = $_SESSION["admin_info"]["account"];
		
		$conn->AutoExecute($table,$record,"INSERT");
		alert("新增完成",Page_get_url('id'));
		exit;
	}
}


if($del_id)
{
	$sql = " delete from ".$table." where id in (".$del_id.")"; //刪除資料
	$conn->Execute($sql);
	alert("刪除完成",Page_get_url('del_id'));
	exit;
}


//---列表頁下拉資料來源
$sql_2 = " select * from ".PREFIX."admin_group WHERE status='1' and control>=".$_SESSION["admin_info"]["control"].($_SESSION["admin_info"]["lang_auth"] ? " and lang_auth='".$_SESSION["admin_info"]["lang_auth"]."'":"");
$group = $conn->GetArray($sql_2);

if ($_SESSION["admin_info"]["control"]>0){
	foreach ($group as $k=>$v){
		if ($v["control"]==$_SESSION["admin_info"]["control"])
		$group[$k]['token_control'] = $_SESSION["admin_info"]["control"];
	}
}



if($id || $id=='0')
{
	if ($id=='lang') $id = $_SESSION["admin_info"]["id"];
	$sql .= " id=".$id;
	$data = $conn->GetRow($sql);
	$data["status_html"] = Make_radio($_SETUP["status"],$data["status"],"status");

	$data["group_html"] = Make_sql_list($group,$data["group_id"]);
	
	$_SESSION["admin_info"]["view"] = "detail";
	//-推廣路徑
	$temp = explode('//',str_replace('/serback/','//',$_SERVER['HTTP_REFERER']));
	$data["url"] = $temp[0].'//'.$temp[1].'/about.php?company='.urlencode(base64_encode($data["id"]));
	//$data["url"] = 'http://'.$_SERVER['HTTP_HOST'].'/about.php?company='.urlencode(base64_encode($data["id"]));
}
else
{
	include("search_data.php");
	//$sql .= " 1=1 order by create_date desc";
	
	$sql .= " 1=1 and ( control>".$_SESSION["admin_info"]["control"]." OR (control=".$_SESSION["admin_info"]["control"]." AND id=".$_SESSION["admin_info"]["id"].")) order by create_date desc";

	$data = $conn->PageExecute(($sql),$per_page_qty,$page);

	if ($data){
	foreach($data as $k => $v)
	{
		foreach($v as $k_2 => $v_2)
			$data_temp[$k][$k_2] = $v_2;//存入新陣列 給與 smarty section 使用
		
		//$data_temp[$k]["status"] = $_SETUP["status"][$data_temp[$k]["status"]];
		
		/*foreach($group as $k_2 => $v_2)
		if($data_temp[$k]["group_id"] == $v_2["id"])
			 $data_temp[$k]["group_html"] = $v_2["name"];
		*/
		
		$data_temp[$k]["group_html"] = 
		'<select name="group_id_'.$data_temp[$k]["id"].'">'.Make_sql_list($group,$data_temp[$k]["group_id"]).'</select>';
		
		$data_temp[$k]["status_html"] = 
		Make_radio($_SETUP["status"],$data_temp[$k]["status"],"status_".$data_temp[$k]["id"]);
	}

	
	$tpl->assign("page_table",Page_table($data,$per_page_qty));
	$data = $data_temp;
	}
	
	$_SESSION["admin_info"]["view"] = "list";
}



include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("content",ROOT_PATH.$admin_path."templates/admin.html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>




