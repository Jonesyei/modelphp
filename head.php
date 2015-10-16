<?php
//所有頁面開頭先include此頁
include_once("includes/main_inc.php");







//網站設定 $web_set
$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
$tmp = $conn->GetArray($sql);

$web_set["all"] = $tmp;

$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
$web_set["receive_email"] = $tmp["2"]["detail"];
$web_set["default_email_title"] = $tmp["3"]["detail"];
$web_set["send_email"] = $tmp["4"]["detail"];

//-----登入使用https
/*
$no_https = array('login_data','ajax');
if (!in_array($page_name,$no_https)) {
	if ((strpos(strtolower($page_name),"ogin")>0 || strtolower($page_name)=="regist") && $_SERVER["HTTP_HOST"] != 'localhost:81' && $_SERVER["HTTP_HOST"] != '192.168.1.104:81') {
		$web_set["favorite_url"] = "https://".$_SERVER["HTTP_HOST"].'/';
		if ($_SERVER['HTTPS']!="on")echo '<script>window.location.href="https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"</script>';
	}else{
		$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"].'/';
		if ($_SERVER['HTTPS']=="on")echo '<script>window.location.href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"</script>';
	}
}
*/


//----網站狀態判斷
$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' and type ='website_url'";
$temp = $conn->GetRow($sql);
$web_uri = explode('/',$_SERVER['REQUEST_URI']);
if ($_SERVER["HTTP_HOST"]!="localhost:81"){
	if (($web_uri[1]==""||$web_uri[1]==NULL)&&$temp["detail"]!=NULL&&$temp["detail"]!="") Linkto($temp["detail"]);
}else{
	if (($web_uri[count($web_uri)-1]==""||$web_uri[count($web_uri)-1]==NULL)&&$temp["detail"]!=NULL&&$temp["detail"]!="") Linkto($temp["detail"]);
}

if (strtolower($web_uri[count($web_uri)-1])=='diy') {
	linkto('index.php?class=Customization');
	exit;
}

//----本頁面URL
$web_set["selfurl"] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


if($_SERVER["HTTP_HOST"]=="localhost:81") $web_set["favorite_url"] .= "hansc/";

?>