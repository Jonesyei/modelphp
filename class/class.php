<?php
/*
	網站裝載類別庫 設置
*/

//--mailer 信件套件
include_once(APP_PATH."includes/phpmailer/class.phpmailer.php");

//-環境引用模組
include_once(APP_PATH."class/global.php");

//-設計版面模組
include_once(APP_PATH."class/design_class.php");

//-會員套件
include_once(APP_PATH."class/member_class.php");

//-購物車訂單套件
include_once(APP_PATH."class/order_class.php");
//-金流延展庫
include_once(APP_PATH."class/paymode_class.php");
?>