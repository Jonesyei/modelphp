<?php
include_once("head.php");

//------語系
if ($_GET["lang"]!=NULL && $_GET["lang"]!=''){
	$_SESSION["mode_lang"] = $_GET["lang"];
}
//--預設語系
if (($_SESSION["mode_lang"]==NULL||$_SESSION["mode_lang"]=='')&&($_GET["lang"]==NULL||$_GET["lang"]=='')){
	$_SESSION["mode_lang"] = 'ch';
}


//--判斷使用MVC框架
if ($_SETUP['MVC']){
	//--控制器操作
	$console->controller('console');
	//--輸出樣板
	$tploutput = $console->design->views;
}else{
	if($page_name=="") $page_name='index';
	if ($page_name=='index'){
		switch ($_GET["class"]){
			default:
				//--首頁最新消息
				$lang = ' and lang="'.$_SESSION["mode_lang"].'"';
				$data["title_img"] = $_SETUP["title_img"][$_GET["j_set_patten"]];
				$temp = $conn->GetArray("select * from ".PREFIX."data_list where type='news'".$lang." order by sort");
				$data["news"] = $temp;
				//edm			
				$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='EDM'".$lang);
				$data["EDM"] = explode('|__|',dequotes($temp["pic"],-1));
				$design->load('index');
			break;
		}
		$tploutput = $design->views;
	}
}



//--進行輸出註解去除處理
ob_start();
if ($_SETUP['MVC'])
	$console->tpl->display("string:".$tploutput);
else
	$tpl->display("string:".$tploutput);
$smarty_output = ob_get_contents(); //接收快取頁面
ob_end_clean();

//--檔案授權參數
$_SESSION['file_auth']['jones_demo'] = '1';
$_SESSION["fileauth_array"]['jones_demo']=array();
$_SESSION["fileauth_time_array"]['jones_demo']=array();


//--seo處理
if(extension_loaded('zlib'))
ob_start('ob_gzhandler');
header('Last-Modified: '.gmdate('D, d M Y').' 00:00:00'.' GMT', true, 200); //--最後頁面編輯時間
header('Date: '.gmdate('D, d M Y H:i:s').' GMT', true, 200);
header('Expires: '.gmdate('D, d M Y H:i:s',mktime(0,0,0,1,1,1998)).' GMT', true, 200); //--快取時間
echo html2txt($smarty_output);
ob_end_flush();
$conn->close();
unset($design);
unset($mail);
unset($tpl);
unset($conn);

function html2txt($document){ 
$search = array(
				'/<!--(.*)-->/Uis',	//--html註解標籤清除
				'/\/\*(.*)\*\//',	// /* XXX */ 標籤清除
				//'/\/\/(.*)\n/'		//  //XXXXXXX(\n換行) 註解方式清除
); 
$text = preg_replace($search, '', $document); 
return $text; 
} 
?>