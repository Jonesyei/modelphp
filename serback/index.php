<?php
include_once("../includes/main_back_inc.php");

//print_r(error_get_last());


//func.php 組成menu html樣式

//判斷權限
$menu_list_data = array('_sysmenu_set','system_temp','index');

if(Auth_check($conn)==false && !in_array(Now_file(),$menu_list_data))
{
	alert("無權限進入頁面!!","index.php");
	exit;
}
//左側選單
$menu_html = Make_menu($conn);

if (!$_SESSION["admin_info"]["tmp"]) $_SESSION["admin_info"]["tmp"] = array();

if($_SESSION["admin_info"]["open_menu"]) $menu_html .= "<script>Open_menu('".$_SESSION["admin_info"]["open_menu"]."')</script>";



//網站設定
//$id = $_SETUP["setting_id"][ $record["lang"] ];
$sql = " select * from ".PREFIX."setting WHERE lang='".quotes($record["lang"])."'";
$set = $conn->GetArray($sql);

/*計算使用容量*/
$disk_array = array('0'=>'Bytes','1'=>'KBytes','2'=>'MBytes','3'=>'GBytes','4'=>'TBytes');
$now_file_disk = disk_data($ini_webset["web_set"]["now_file"]);
$now_file_disk = number_format($now_file_disk['data'],2).$disk_array[$now_file_disk['depth']];
$max_file_disk = disk_data($ini_webset["web_set"]["upload_max_size"]);
$max_file_disk = number_format($max_file_disk['data'],2).$disk_array[$max_file_disk['depth']];
$_SESSION["admin_info"]["file_size_total"] = $now_file_disk.' / '.$max_file_disk;
$_SESSION["admin_info"]["size_bar_width"] = ( ($ini_webset["web_set"]["now_file"]) / ($ini_webset["web_set"]["upload_max_size"]) )*100;
$_SESSION["admin_info"]["file_size_bar"] = $ini_webset["web_set"]["upload_check_status"];

//--即時對話聊天
$_SESSION["admin_info"]["chat"] = $ini_webset["web_set"]["chat"];
$_SESSION["admin_info"]["chat_resh_time"] = $ini_webset["web_set"]["chat_resh_time"];

/*資料庫使用空間*/
$db_total_disk = 0;
$db_disk = $conn->GetArray("SHOW TABLE STATUS");
if ($db_disk)
	foreach ($db_disk as $k=>$v){
		$db_total_disk += $v["Data_length"]*1+$v["Index_length"]*1;
	}
$db_now_total_disk = $db_total_disk;
$db_total_disk = disk_data($db_total_disk);
$db_total_disk = number_format($db_total_disk['data'],2).$disk_array[$db_total_disk['depth']];
$db_max_disk = disk_data($ini_webset["web_set"]["db_max_size"]);
$db_max_disk = number_format($db_max_disk['data'],2).$disk_array[$db_max_disk['depth']];
$_SESSION["admin_info"]["db_size_total"] = $db_total_disk.' / '.$db_max_disk;
$_SESSION["admin_info"]["db_bar_width"] = ( $db_now_total_disk / ($ini_webset["web_set"]["db_max_size"]) )*100;




//---登入閒置時間驗證
foreach ($set as $k=>$v){
	if($v["type"]=='delay_time')
	if($_SESSION["admin_info"]["delay_time"]!=NULL&&$_SESSION["admin_info"]["delay_time"]!=''&&$_SESSION["admin_info"]["delay_time"]*1+$v["detail"]*1 <=strtotime(date("Y-m-d H:i:s")))
	{
		session_unset();
		alert('登入閒置過久，因安全因素請您重新登入!!','login.php');
		exit;
	}else{
		$_SESSION["admin_info"]["delay_time"] = strtotime(date("Y-m-d H:i:s"));
	}
}


//將$_REQUEST的條件的空白全部刪除
foreach($_REQUEST as $k => $v)
{
	if(!is_array($v) && count( $tmp = explode(" ",$v))>1)
	{
		foreach($tmp as $k_2 => $v_2)
			$tmp_2 .= $v_2;	
		$_REQUEST[$k] = $tmp_2;
	}
}


//--寫入登入資料跟判斷在線使用者
$serback_login_delay = 300; //-登入時間5分鐘
$conn->Execute("DELETE FROM ".PREFIX."cache where from_id='".$_SESSION["admin_info"]["id"]."' and type='serback_login'");
$conn->Execute("INSERT INTO `".PREFIX."cache` (`id`, `type`, `from_id`, `to_id`, `data`, `create_date`) VALUES (NULL, 'serback_login', '".$_SESSION["admin_info"]["id"]."', NULL, '', '".date("Y-m-d H:i:s")."');");
$_SESSION["admin_info"]["online"] = $conn->GetArray("select * from ".PREFIX."cache as c,".PREFIX."admin as a where c.from_id=a.id and c.type='serback_login' and c.create_date>='".date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s")-$serback_login_delay,date("m"),date("d"),date("Y")))."'");


//現在使用table記錄
$_SESSION["admin_info"]["table"] = $table;//SORT_SET用

//--判斷是否加載 centerpoes.php  檔案
foreach (get_included_files() as $k=>$v){
	if (strpos($v,'centerpoes') > 0) {
		$data["pageget"] = $_GET;
		$data["pagename"] = $page_name;
		//--還原操作按鈕路徑
		if ($_SESSION["admin_info"]["data_temp"]!=''&&$_SESSION["admin_info"]["data_temp"]!=NULL){
			$data["data_temp"] = $_SERVER['REQUEST_URI'];
			if ($_SERVER['QUERY_STRING']!=''){
				$data["data_temp"] .= "&re_data_temp=1";
			}else{
				$data["data_temp"] .= "?re_data_temp=1";
			}
		}
	}
}




if (!$_SESSION["admin_info"]["search"]["search_other"]) $_SESSION["admin_info"]["search"]["search_other"]='';

$tpl->assign("admin_info",$_SESSION["admin_info"]);//admin_info所有設定
$tpl->assign("setup", $_SETUP);//config設定檔
$tpl->assign("menu", $menu_html); //menu
$tpl->assign("data",$data); //別的頁面傳送來的data
$tpl->assign("close",$close); //關閉功能
$tpl->assign("set",$set); //網站設定
$tpl->assign('ini_webset',$ini_webset);///--ini設定黨

$tpl->assign("search_form",ROOT_PATH.$admin_path."templates/_search_form.html");//搜尋form
$tpl->assign("page_table_html",ROOT_PATH.$admin_path."templates/page_table.html");//頁碼table


if($include != true)
{
	//--首頁開發訊息自動接收更新
	$aa = curl($ini_webset["web_set"]["info_page"]);
	if ($aa["code"]=='200'){
		safefilerewrite(ROOT_PATH.$admin_path."templates/info.html",$aa["data"]);
	}
	$info["version"] = '後台系統 PHP 7.1.1 版 (sv2.2) [建置環境如採用5.6亦可運行]';
	$tpl->assign("info",$info);
	$tpl->assign("content",ROOT_PATH.$admin_path."templates/info.html");
	$tpl->display(ROOT_PATH.$admin_path."templates/index.html");
}

?>




