<?php
//所有頁面開頭先include此頁
include_once("includes/main_inc.php");



//----網站狀態判斷
$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' and type ='website_url'";
$temp = $conn->GetRow($sql);
$web_uri = explode('/',$_SERVER['REQUEST_URI']);
if ($_SERVER["HTTP_HOST"]!="localhost:81"){
	if (($web_uri[1]==""||$web_uri[1]==NULL)&&$temp["detail"]!=NULL&&$temp["detail"]!="") Linkto($temp["detail"]);
}else{
	if (($web_uri[count($web_uri)-1]==""||$web_uri[count($web_uri)-1]==NULL)&&$temp["detail"]!=NULL&&$temp["detail"]!="") Linkto($temp["detail"]);
}


?>