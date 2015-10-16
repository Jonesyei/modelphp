<?php
include_once("../includes/main_back_inc.php");

//搜尋 全部以GET 判斷





//撈出 目錄 預設網址
$sql_ = "SELECT url from ".PREFIX."sysmenu WHERE ifview=1";
$sysmenu = $conn->GetArray($sql_);

$get_list = array();
foreach($sysmenu as $k=>$v)
{
	$url = explode("?",$v["url"]);
	$url_get = explode("&",$url["1"]);
	
	if( count($url)>1  )//&& !in_array("id=lang",$url_get)
	{
		foreach($url_get as $k2=>$v2)
		{	
			$get_name = explode("=",$v2);
			if( !in_array($get_name["0"],$get_list) ) $get_list[] = $get_name["0"];
		}
	}
}

if(@$_GET)
foreach($_GET as $k=>$v)
{
	if( in_array($k,$get_list) )
		@$_SESSION["admin_info"]["tmp"]["search_hidden"] .= '<input type="hidden" name="'.$k.'" value="'.$v.'">';
}



if($default_option=="") $default_option = '<option value="">選擇狀態</option>';
$_SESSION["admin_info"]["tmp"]["status"] = $default_option . Make_list($_SETUP["status"],$_GET["status"]);


if(@$_GET["status"]!=NULL)
{
	$sql .= " status=".quotes($_GET["status"])." and ";
	$sql_count .= " status=".quotes($_GET["status"])." and ";
}

if(@$_GET["keyword"]!=NULL)
{
	$tmp = "";
	$sql_desc = "DESC ".$table;
	$tmp = $conn->GetArray($sql_desc);
	foreach($tmp as $k=>$v)
		$desc_table[$k] = $v["0"];//目前資料庫欄位資料 (用來判斷是否需要新增或刪
	
	foreach($_SETUP["keyword"] as $k => $v)
	if(array_search($v,$desc_table)==NULL)
	{
		unset($_SETUP["keyword"][$k]);
	}


	$sql .= "(";
	$sql_count .= "(";
	foreach($_SETUP["keyword"] as $k => $v)
	{
		$sql .= $v." like '%".quotes($_GET["keyword"])."%' or ";
		$sql_count .= $v." like '%".quotes($_GET["keyword"])."%' or ";
	}
	$sql .= " 0) and ";
	$sql_count .= "0) and ";
	
	

}


if(@$_GET["daterange"]!=NULL)
{
	$row = "create_date";
	if($include_set["date_range_search"]!=NULL) $row = $include_set["date_range_search"];

	$tmp = explode("-",$_GET["daterange"]);
	foreach($tmp as $k => $v)
		$tmp[$k] = str_replace(",","-",$v);
	$sql .= " ".$row." >= '".quotes($tmp[0])." 00:00:00' and ".$row." <= '".quotes($tmp[1])." 23:59:59' and ";	
	$sql_count .= " ".$row." >= '".quotes($tmp[0])." 00:00:00' and ".$row." <= '".quotes($tmp[1])." 23:59:59' and ";
}



if(@$_GET)
foreach(@$_GET as $k=>$v)
{
	$tmp = explode("-",$k);
	if($tmp["0"]=="s" && $v!=NULL)
	{
		$sql .= $tmp["1"]."='".quotes($v)."' and ";
		$sql_count .= $tmp["1"]."='".quotes($v)."' and ";
	}
	
}






?>