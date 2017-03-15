<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('APP_PATH', str_replace('\\', '/', substr(dirname(__FILE__),0,strlen(dirname(__FILE__))-8 )));
define('ROOT_PATH', str_replace('includes/main_back_inc.php', '', str_replace('\\', '/', __FILE__)));

include(APP_PATH.'includes/adodb5/adodb.inc.php');
include(APP_PATH."includes/smarty/Smarty.class.php");

include(APP_PATH."includes/phpmailer/PHPMailerAutoload.php");
include(APP_PATH."includes/function/seback_func.php");
include(APP_PATH."includes/function/func.php");

include(APP_PATH."includes/config/conn.php");
include(APP_PATH."includes/config/config.php");

//---Jones 函數
include(APP_PATH."includes/project/function.php");
//---qrcode
include(APP_PATH."includes/phpqrcode/qrlib.php");

//--ini設定檔案讀取
if (!@$_SESSION["web_ini_data"] || $_POST || ($_SESSION["web_ini_time"]*1+600 < strtotime(date("Y-m-d H:i:s")) )){
	$ini_webset = $_SESSION["web_ini_data"] = parse_ini_file(APP_PATH."includes/config/web_set.ini",true);
	$_SESSION["web_ini_time"] = strtotime(date("Y-m-d H:i:s"));
	if (count($ini_webset)>0 && $ini_webset["web_set"]["upload_check_status"]=='1') {
		$ini_webset["web_set"]["now_file"] = CalcDirectorySize('../upload/'); //-bytes  取得客戶已上傳的所有檔案資料大小
		if ($ini_webset["web_set"]["iniloadcheck"]!=NULL && trim($ini_webset["web_set"]["upload_max_size"])!=='') write_php_ini($ini_webset,APP_PATH."includes/config/web_set.ini"); //寫入大小現值
	}
}else{
	$ini_webset = $_SESSION["web_ini_data"];
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
if(!@$_GET['_center_token'] && Check_Admin($conn,@$_POST["account"],@$_POST["password"],(@$_POST["g-recaptcha-response"] ? @$_POST["g-recaptcha-response"]:strtoupper(@$_POST["code"])),@$_POST["lang"]) == false && !in_array(Now_file(),$no_check_array))
{
	if (@$_SESSION["re_url"]==NULL) $_SESSION["re_url"] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	LinkTo("login.php");
	exit;
}elseif (Now_file()=='index'||Now_file()=='login'){//-判斷在登入的時候是否有傳送語系參數

//--傳語系才判定語系
	if (@$_POST["lang"]!=NULL) {
		$_SESSION["admin_info"]["lang"] = $_POST["lang"];//有參數
		$temp = $conn->GetRow("select * from ".PREFIX."language where detail='".$lang."'");
		$_SESSION["admin_info"]["lang_title"] = $temp["name"];
	}elseif ($_POST || !@$_SESSION["admin_info"]["lang"]){
		$_SESSION["admin_info"]["lang"] = 'ch';//無參數給予預設值
		$_SESSION["admin_info"]["lang_title"] = '中文';
	}
}

$record["lang"] = $post["lang"] = $lang = @$_SESSION["admin_info"]["lang"];


if (@$_SESSION["re_url"]!=NULL && @$_SESSION["admin_info"]["account"]!=NULL){//-判斷是否經由內頁連入 登入後導回內頁
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




$mail = new PHPMailer();                        // 建立新物件 
$mail->IsHTML(true);                         // 設定郵件內容為HTML
$mail->CharSet = "utf-8";                       // 設定郵件編碼   
$mail->Encoding = "base64";
$mail->WordWrap = 50;                           // 每50個字元自動斷行

$smtp_set = $conn->GetRow("select * from ".PREFIX."data_list where type='smtp_mail' and status=1");
//--啟用 SMTP模式
if ($smtp_set){
	//--網站設定	
	$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
	$tmp = $conn->GetArray($sql);	
	$web_set["all"] = $tmp;
	$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
	$web_set["send_email"] = $tmp["4"]["detail"];
	
	$smtp_set["detail"] = explode('|__|',$smtp_set["detail"]);
    $mail->IsSMTP();                                // 設定使用SMTP方式寄信        
    $mail->SMTPAuth = true;                         // 設定SMTP需要驗證
	
    if ($smtp_set["detail"][0]) $mail->SMTPSecure = $smtp_set["detail"][0];     // Gmail的SMTP主機需要使用SSL連線   
    $mail->Host = $smtp_set["detail"][1];	        // Gmail的SMTP主機        
    $mail->Port = $smtp_set["detail"][2]*1;                              // Gmail的SMTP主機的port為465      
          
    $mail->Username = $smtp_set["detail"][3];     // 設定驗證帳號        
    $mail->Password = $smtp_set["detail"][4];              // 設定驗證密碼          
}

//各類別庫
include(APP_PATH."class/class.php");
?>