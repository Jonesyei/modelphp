<?php
session_start();

define('APP_PATH', str_replace('\\', '/', substr(dirname(__FILE__),0,strlen(dirname(__FILE__))-8 )));
define('ROOT_PATH', str_replace('includes/main_inc.php', '', str_replace('\\', '/', __FILE__)));

include_once(APP_PATH.'includes/adodb5/adodb.inc.php');
include_once(APP_PATH."includes/smarty/Smarty.class.php");

include_once(APP_PATH."includes/function/func.php");
include_once(APP_PATH."includes/config/conn.php");
include_once(APP_PATH."includes/config/config.php");

//---Jones 函數
include_once(APP_PATH."includes/project/function.php");
//---qrcode
include_once(APP_PATH."includes/phpqrcode/qrlib.php");

include_once(APP_PATH."includes/phpmailer/class.phpmailer.php");

$tpl = new Smarty();
$tpl->left_delimiter = '({';
$tpl->right_delimiter = '})';
$tpl->template_dir = APP_PATH . "templates/";
$tpl->compile_dir = APP_PATH . "templates_c/";
$tpl->config_dir = APP_PATH . "configs/";
$tpl->cache_dir = APP_PATH . "cache/";



$_SESSION["member_info"]["tmp"] = "";


$_SESSION["member_info"]["lang"] = "ch";//無分語系

$record["lang"] = $post["lang"] = $lang = $_SESSION["member_info"]["lang"];
 

	
$page_name = Now_file();


define('LANG',$lang);





$mail = new PHPMailer();                        // 建立新物件 
$mail->IsHTML(true);                         // 設定郵件內容為HTML
$mail->CharSet = "utf-8";                       // 設定郵件編碼   
$mail->Encoding = "base64";
$mail->WordWrap = 50;                           // 每50個字元自動斷行



//網站設定 $web_set
$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
if ($connect_check)
$tmp = $conn->GetArray($sql);
$web_set["all"] = $tmp;
$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
$web_set["receive_email"] = $tmp["2"]["detail"];
$web_set["default_email_title"] = $tmp["3"]["detail"];
$web_set["send_email"] = $tmp["4"]["detail"];
$web_set["selfurl"] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //本頁面URL



if ($connect_check)
$smtp_set = $conn->GetRow("select * from ".PREFIX."data_list where type='smtp_mail' and status=1");
//--啟用 SMTP模式
if ($smtp_set){
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
include_once(APP_PATH."class/class.php");
$design = new design($conn,PREFIX."design",$lang);

//MVC架框設定
if ($_SETUP['MVC']){
	$console = new console\word_console();
	$console->conn = $conn;
	$console->mail = $mail;
	$console->design = $design;
	$console->web_set = $web_set;
	$console->tpl = $tpl;
}
?>