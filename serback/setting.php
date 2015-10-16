<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數


$table = PREFIX."setting";
$act = $_POST["act"];


foreach($_POST as $k => $v)
	$record[$k] = quotes($v);


$sql = " select * from ".$table." WHERE lang='".quotes($record["lang"])."' and ";

//--組合參數按鈕
$data["web_set"]["upload_check_status"] = Make_radio($_SETUP["status"],$ini_webset["web_set"]["upload_check_status"],'upload_check_status');//--容量顯示開關
$data["web_set"]["post_fee_button_html"] = Make_radio($_SETUP["status"],$ini_webset["web_set"]["post_fee_button"],'post_fee_button');//--運費
$data["web_set"]["design_button"] = Make_radio($_SETUP["status"],$ini_webset["web_set"]["design_button"],'design_button');//--設計師
$data["web_set"]["system_button"] = Make_radio($_SETUP["status"],$ini_webset["web_set"]["system_button"],'system_button');//--系統

if($act=='submit')
{
	$record["update_date"] = date("Y-m-d H:i:s");
	$record["update_name"] = $_SESSION["admin_info"]["account"];
	
	foreach($record as $k => $v)
	{
		
		$id_tmp = explode("_",$k);
		if( count($id_tmp)==2 && is_numeric($id_tmp[1]))
		{
			$id = $id_tmp["1"];
			
			$record[ $id_tmp["0"] ] = $v;
			//$record["status"] = "1";
			
			$where = "id=".$id;
			$conn->AutoExecute($table,$record,"UPDATE",$where);
		}else{
			//--webini 資料
			$ini_webset["web_set"][implode('_',$id_tmp)] = $v;
		}
	}
	//--webini寫入
	write_php_ini($ini_webset,APP_PATH."includes/config/web_set.ini"); //寫入大小現
	alert("修改完成",Page_get_url(''));
	exit;
}

$sql .= " 1=1 ";
$data["list"] = $conn->GetArray($sql);

foreach($data["list"] as $k=>$v)
foreach($v as $k2=>$v2)
{	
	$data["list"][$k][$k2] = deQuotes($v2,-1);
	$data["list"][$k]["no"] = $k+1;
}


//------------資料庫備份與還原
$file_url = $conn->GetRow("select * from ".PREFIX."setting WHERE lang='".quotes($record["lang"])."' and type='backup'");
$data["file_url"] = $file_url["detail"];
//---目錄檔案讀取
if(is_dir($data["file_url"])){//檢查是否是目錄
 if($dh=opendir($data["file_url"])){//打開目錄
  while(($file=readdir($dh))!==false){
   //$file = 檔名+副檔名
   //第一個跟第二個檔名是 .. 及 . 
   if($file!='..' && $file!='.'){
       $file=iconv("BIG5", "UTF-8",$file); //必要,否則中文會亂碼
       $data["file"][]=$file;
   }
  }
 }
}
clearstatcache();//清除檔案狀態快取
//-------------
//---刪除檔案
if ($_GET["del_file"]!=NULL) {unlink($data["file_url"].$_GET["del_file"]);alert('備份資料 '.$_GET["del_file"].' 已刪除',-1);}
//----------
$_SESSION["admin_info"]["today"] = date("Y-m-d");




//-----ajax
if ($_GET["ud"]){
	$temp_table = $conn->GetArray("show tables");
	if ($temp_table)
	foreach ($temp_table as $k=>$v){
		$conn->Execute("UPDATE ".$v[0]." SET create_date='".$_GET["ud"]." 00:00:00',update_date='".$_GET["ud"]." 00:00:00'");
	}
	$temp["msg"] = '資料庫所有資料已更新為此指定日期';
	echo json_encode($temp);
	exit;
}





include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("content",ROOT_PATH.$admin_path."templates/setting.html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>