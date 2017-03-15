<?php
$admin_path = "serback/";

define('ADMIN_PATH',$admin_path);
define('DATE',date("Y-m-d H:i:s"));


//---------MVC前台參數設定
$_j_web_set['host']					=	$_SERVER['HTTP_HOST'];	//--域名
$_j_web_set['main_path']			=	'/modelphp';			//--主目錄路徑 (根目錄下請設定空值'')
$_j_web_set['host_path']			=	'//'.$_j_web_set['host'].$_j_web_set['main_path'].'/';	//--完整域
$_j_web_set['module_path']			=	'module/';				//--模組路徑
$_j_web_set['controller_path']		=	'controller/';			//--控制器路徑
$_j_web_set['controller_ninclude']	=	array('favicon.ico','serback','includes','css','js','font','ckeditor','ckfinder','images','upload','ajax.php',
											'fileauth.php','mathcode.php','resize.php','verifycode.php','_form_mail.php');//---原始路徑保留參數
$_j_web_set['module_autoload']		=	array('foor');				//--自動載入模塊
$_j_web_set['default_controller']	=	'index';				//--預設控制器

///--------一般環境參數設定
if(!isset($_GET["page"]) || !isNumber($_GET["page"])) {$page = $_GET["page"] = 1;}else{$page = $_GET["page"];}
$per_page_qty = 10;
$_SETUP["status"] = array ( '1' => '開啟','0' => '關閉');
$_SETUP["member_status"] = array ( '1' => '開啟','0' => '關閉','2' => '未認證');
$_SETUP["sex"] = array ( '1' => '男','2' => '女');
$_SETUP["member_mode"] = array('normal'=>'一般會員','fb'=>'FB串接帳戶');
$_SETUP["member_type"] = array('member'=>'一般會員','wkmember'=>'白金會員','gkmember'=>'黃金會員');
$_SETUP["date"] = date("Y-m-d H:i:s");

//-------------購物車
$_SETUP["shopping_car_status"] = array('1'=>'購物中','2'=>'購物完成','3'=>'付款完成','4'=>'失效定單');
$_SETUP["shipped"] = array('0'=>'未出貨','1'=>'已出貨');
$_SETUP["payment_status"] = array('0'=>'未付款','1'=>'已付款','2'=>'回傳資料有誤','9'=>'失效');
//--------------金流設定
$_SETUP["paytype"] = array('1'=>'線上刷卡','2'=>'超商付款','3'=>'ATM轉帳','4'=>'貨到付款','5'=>'WEBATM');


$_SETUP["json"] = " var SETUP = ".json_encode($_SETUP).";";//json

//--後台設定頁面
$_SETUP["setting_type"] = array('backup','website_status','website_url','delay_time','demo_show','web_css','recaptcha');


?>