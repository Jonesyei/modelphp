<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數


$table = PREFIX."admin_group";
$id = quotes($_GET["id"]);
$act = $_POST["act"];
$del_id = quotes($_GET["del_id"]);

foreach($_POST as $k => $v)
	$record[$k] = quotes($v);


//批次修改全部
if($act=='all')
	include("update_all.php");


$sql = " select * from ".$table." WHERE 1=1 and control>=".$_SESSION["admin_info"]["control"]." and ";


if($act=='submit')
{
	//---修改權限判斷 create by Jones
	if ($record["control"]!=NULL&&$record["control"]!=''){
		if ($_SESSION["admin_info"]["control"]*1>=$record["control"]&&$_SESSION["admin_info"]["control"]!='0'){
			alert('你所輸入的權限值超出你能給予的 '.($_SESSION["admin_info"]["control"]*1+1).' 值',-1);
			exit;
		}
	}else{
		alert('權限值必須輸入!!',-1);
		exit;
	}

	//--取得所有欄位資料表 自動生成沒有的AUTH
	foreach ($conn->GetArray("desc ".$table) as $k=>$v) {$row_colum_key[] = $v[0];$row_colum_type[] = $v[1];}//--擷取資料表所有欄位
	if (!in_array('auth_'.$lang,$row_colum_key)){
		$conn->Execute("ALTER TABLE ".quotes($table)." ADD ".quotes('auth_'.$lang)." TEXT NULL COMMENT '程式生成欄位'");
	}


	
	foreach($record as $k => $v)
	{
		$temp = explode("_",$k);
		if($temp[0]=="auth")
			$auth .= $v.",";
	}
	$record["auth_".$lang] = substr($auth,0,-1);

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
		$record["create_date"] = date("Y-m-d H:i:s");
		$record["create_name"] = $_SESSION["admin_info"]["account"];
		$conn->AutoExecute($table,$record,"INSERT");
		alert("新增完成",Get_Url(array()));
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



$session_auth = explode(",",$_SESSION["admin_info"]["auth"]);


if($id || $id=='0')
{
	$sql .= " id=".$id;
	$data = $conn->GetRow($sql);
	$data["status_html"] = Make_radio($_SETUP["status"],$data["status"],"status");

	$lang_sql = " and lang ='".$lang."'";//---只抓取該語系資料
	
	$sql = " select * from ".PREFIX."sysmenu WHERE ifview=1 and parents='0'".$lang_sql." order by lang,sort";
	$menu = $conn->GetArray($sql);
	$sql = " select * from ".PREFIX."sysmenu WHERE ifview=1 and parents!='0'".$lang_sql." order by sort";
	$menu_2 = $conn->GetArray($sql);


	//---語系資料表截取
	$temp_lang = $conn->GetArray("select * from ".PREFIX."language where status>0");//取出所有語系資料
	foreach($temp_lang as $k=>$v){
		$temp_lang_list[$v["detail"]] = $v["name"];
	}
	//---------------
	//&nbsp;   checked
	
	$auth = explode(",",$data["auth_".$lang]);

	foreach($menu as $k => $v)
	{
		$str = "";
		foreach($auth as $k_2 => $v_2)
		{
			if($v_2==$v["lv"])
				$str = "checked";
		}
		
		
		if (in_array($v["lv"],$session_auth) || $_SESSION["admin_info"]["control"]=='0') //--非系統管理員進行權限判斷
		$html .= '<p><input name="auth_'.$v["lv"].'" onclick="Check(\''.$v["lv"].'\')" id="auth_'.$v["lv"].'"
		type="checkbox" value="'.$v["lv"].'" '.$str.' />'.$v["name"].'<p>';

		foreach($menu_2 as $k_2 => $v_2)
		{
			$str = "";
			foreach($auth as $k_3 => $v_3)
			{
				if($v_3==$v_2["lv"])
					$str = "checked";
			}

			if($v["lv"] == $v_2["parents"])
				if (in_array($v_2["lv"],$session_auth) || $_SESSION["admin_info"]["control"]=='0') //--非系統管理員進行權限判斷
				$html .= 
				'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="auth_'.$v_2["lv"].'"  class="auth_'.$v["lv"].'" 
				type="checkbox" value="'.$v_2["lv"].'" '.$str.' />'.$v_2["name"].'('.$temp_lang_list[$v_2["lang"]].')';
		}
	}
	$data["auth_html"] = $html;
	
	
	$_SESSION["admin_info"]["view"] = "detail";
}
else
{
	include("search_data.php");
	$sql .= " 1=1 order by create_date desc";//改為擷取語系使用者
	
	$data = $conn->PageExecute(($sql),$per_page_qty,$page);

	foreach($data as $k => $v)
	{
		foreach($v as $k_2 => $v_2)
			$data_temp[$k][$k_2] = $v_2;//存入新陣列 給與 smarty section 使用
		
		//$data_temp[$k]["status"] = $_SETUP["status"][$data_temp[$k]["status"]];
		$data_temp[$k]["status_html"] = 
		Make_radio($_SETUP["status"],$data_temp[$k]["status"],"status_".$data_temp[$k]["id"]);
	}
	
	
	
	$tpl->assign("page_table",Page_table($data,$per_page_qty));
	$data = $data_temp;
	$_SESSION["admin_info"]["view"] = "list";
}




include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("content",ROOT_PATH.$admin_path."templates/admin_group.html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>




