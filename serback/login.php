<?php
include_once("../includes/main_back_inc.php");

unset($_SESSION["admin_info"]);


//--驗證套件
$data["recaptcha"] = $conn->GetRow("select * from ".PREFIX."setting where type='recaptcha'");
if ($data['recaptcha'])
	$data['recaptcha'] = explode(',',$data['recaptcha']['detail']);

$data["list"] = $conn->GetArray("select * from ".PREFIX."language where status>0");//取出所有語系資料
if ($_GET["forgot"]){
	$forgot_data = $conn->GetRow("select * from ".PREFIX."admin where account='".quotes($_GET["forgot"])."' or email like '%".quotes(strtolower($_GET["forgot"]))."%'");//取出所有語系資料

	if ($forgot_data){
		$temp_str = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		for ($i=0;$i<8;$i++){
			$temp_password .= $temp_str[rand(0,strlen($temp_str)-1)];
		}
		$conn->Execute("update ".PREFIX."admin SET password='".md5($temp_password)."' where id=".$forgot_data["id"]);
		
		//----密碼修改信
		if ($lang==NULL) $lang='ch';
		$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
		$tmp = $conn->GetArray($sql);
		$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
		$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
		$web_set["receive_email"] = $tmp["2"]["detail"];
		$web_set["default_email_title"] = $tmp["3"]["detail"];
		$web_set["send_email"] = $tmp["4"]["detail"];
		$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];
		
		$mailTo = $forgot_data["email"];
		$subject = $web_set["title"].' 後台帳號密碼修改信件';
		$from_mail = $web_set["send_email"];
		
		$message = '管理者您好，您的帳號 [ '.$forgot_data["account"].' ]密碼已被修正為 '.$temp_password.' ，請牢記後盡快於後台修改此密碼。';
		$subject = $subject;
		$headers = 'Content-type: text/html; charset="utf-8"' . "\r\n";
		$headers .= "From: ".$from_mail . "\r\n"; // 請自行替換寄件地址

		mail($mailTo, $subject, $message, $headers);
		alert('已送出密碼修改信件',-1);
		exit;
	}else{
		alert('無此相關資訊帳戶',-1);
		exit;
	}
}

if ($_GET["checkpwd"]){

}


//--連線測試
if (!(@ $link=mysql_connect($dbHost, $dbUser, $dbPass))){
	$link = '<div class="fOoT" style="background-color: #ffAAAA;">[資料庫連線失敗] POWER BY WEB POWER ADVERTISING TECHNOLOGY CO.,LTD.</div>';
}else{
	$link = '<div class="fOoT" style="background-color: #AAffAA;">POWER BY WEB POWER ADVERTISING TECHNOLOGY CO.,LTD.</div>';
}

//網站設定
$sql = " select * from ".PREFIX."setting WHERE lang='".quotes($record["lang"])."'";
$set = $conn->GetArray($sql);


$tpl->assign("link",$link);
$tpl->assign("admin_info",@$_SESSION["admin_info"]);//admin_info所有設定
$tpl->assign("setup", $_SETUP);//config設定檔
$tpl->assign("data",@$data); //別的頁面傳送來的data
$tpl->assign("set",$set); //網站設定


$tpl->display(ROOT_PATH.$admin_path."templates/login.html");


?>




