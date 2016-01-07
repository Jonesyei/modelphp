<?php
ini_set('date.timezone','Asia/Shanghai');
session_start();

define('APP_PATH', str_replace('\\', '/', substr(dirname(__FILE__),0,strlen(dirname(__FILE__))-8 )));
define('ROOT_PATH', str_replace('includes/main_back_inc.php', '', str_replace('\\', '/', __FILE__)));

include_once(APP_PATH.'includes/adodb5/adodb.inc.php');
include_once(APP_PATH."includes/smarty/Smarty.class.php");


require_once(APP_PATH."includes/function/JSON.php");	//php 4不支援 json轉換，利用別人寫的class

include_once(APP_PATH."includes/phpmailer/class.phpmailer.php");
include_once(APP_PATH."includes/function/seback_func.php");
include_once(APP_PATH."includes/function/func.php");
include_once(APP_PATH."includes/config/conn.php");
include_once(APP_PATH."includes/config/config.php");

//---Jones 函數
include_once(APP_PATH."includes/project/function.php");


//--ini設定檔案讀取
$ini_webset = parse_ini_file(APP_PATH."includes/config/web_set.ini",true);
if (count($ini_webset)>0) {
	$ini_webset["web_set"]["now_file"] = CalcDirectorySize('../upload/'); //-bytes  取得客戶已上傳的所有檔案資料大小
	if ($ini_webset["iniloadcheck"]!=NULL && trim($ini_webset["upload_max_size"])!=='') write_php_ini($ini_webset,APP_PATH."includes/config/web_set.ini"); //寫入大小現值
}


$tpl = new Smarty();
$tpl->left_delimiter = '({';
$tpl->right_delimiter = '})';
$tpl->template_dir = APP_PATH . "templates/";
$tpl->compile_dir = APP_PATH . "templates_c/";
$tpl->config_dir = APP_PATH . "configs/";
$tpl->cache_dir = APP_PATH . "cache/";



$_SESSION["admin_info"]["tmp"] = "";


$no_check_array = array('login','ajax','ajx');
//func.php 檢查是否登入
if(Check_Admin($conn,$_POST["account"],$_POST["password"],strtoupper($_POST["code"]),$_POST["lang"]) == false && !in_array(Now_file(),$no_check_array))
{
	if ($_SESSION["re_url"]==NULL) $_SESSION["re_url"] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	LinkTo("login.php");
	exit;
}elseif (Now_file()=='index'||Now_file()=='login'){//-判斷在登入的時候是否有傳送語系參數

//--傳語系才判定語系
	if ($_POST["lang"]!=NULL) {
		$_SESSION["admin_info"]["lang"] = $_POST["lang"];//有參數
		$temp = $conn->GetRow("select * from ".PREFIX."language where detail='".$lang."'");
		$_SESSION["admin_info"]["lang_title"] = $temp["name"];
	}elseif ($_POST || !$_SESSION["admin_info"]["lang"]){
		$_SESSION["admin_info"]["lang"] = 'ch';//無參數給予預設值
		$_SESSION["admin_info"]["lang_title"] = '中文';
	}
}

$record["lang"] = $post["lang"] = $lang = $_SESSION["admin_info"]["lang"];


if ($_SESSION["re_url"]!=NULL && $_SESSION["admin_info"]["account"]!=NULL){//-判斷是否經由內頁連入 登入後導回內頁
	$url_s = $_SESSION["re_url"];
	unset($_SESSION["re_url"]);
	LinkTo($url_s);
}


//--後台編輯器載入前台式樣檔
$css_temp = $conn->GetRow("select * from ".PREFIX."setting where type='web_css'");
$tpl->assign("web_css", '<script> website_css="'.$css_temp["detail"].'";</script>');//config設定檔

$page_name = Now_file();


define('LANG',$lang);



$_SESSION["admin_info"]["page"] = Page_get_url('');





?>