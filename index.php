<?php
include_once("head.php");

$act = @$_REQUEST["act"];



//首頁執行區
if(@$include!=true)
{
	$templates_page = "templates.html";
}




//templates 樣版html檔案 設定
if(!$content)
{
	if($page_name=="") 
	{
		$page_name = "index";
	}
	$content = @$page_name.@$page_name_add.".html";
}


//------語系
if ($_GET["lang"]!=NULL && $_GET["lang"]!=''){
	$_SESSION["mode_lang"] = $_GET["lang"];
}
//--預設語系
if (($_SESSION["mode_lang"]==NULL||$_SESSION["mode_lang"]=='')&&($_GET["lang"]==NULL||$_GET["lang"]=='')){
	$_SESSION["mode_lang"] = 'ch';
}





//-------內容頁面讀取
if ($page_name == "index"){
	$lang = ' and lang="'.$_SESSION["mode_lang"].'"';
	$data["title_img"] = $_SETUP["title_img"][$_GET["class"]];
	switch ($_GET["class"]){

		//--一般畫面資料參數建立
		case "news";
		case "about":
			$mount = 10; //設立預設每頁資料筆數
			$sql = "select * from ".PREFIX."data_list where type='".quotes($_GET["class"])."' and status='1' order by sort"; //--gk4uxu4
			$data["list"] = $conn->GetArray($sql." limit ".($_GET["page"]-1)*$mount.",".$mount); //-畫面比數擷取 $_GET["page"] 預設為1
			if ($data["list"])
			foreach ($data["list"] as $k=>$v)
				$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
				
			//--分頁內容
			/* $return = page_show($cousql,$mount);
				常用分頁結果變數如下
				$return["wd_page"]; //-含頁碼設計師常用已切完版檔案
				$return["wd_rwd_page"]; //-不含頁碼設計師常用RWD已切完版檔案
				
			*/
			$cousql = str_replace('*','count(*)',$sql); //--計算總筆數的SQL語句
			$data["page"] = page_show($cousql,$mount);	//--產生分頁結果變數
			
			if ($_GET["id"]==NULL) {//--沒資料預設
				$data["one"] = $data["list"][0];
			}else{
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='about' and id='".$_GET["id"]."'");
				$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
			}
		break;

		
		
		//---建構中
		case "demo":
			$temp = $conn->GetRow("select * from ".PREFIX."setting where type='demo_show'".$lang);
			if ($temp)
				echo dequotes($temp["detail"],-1);
			exit;
		break;
		
		//---index 無class參數 首頁預設
		default:
			//--首頁最新消息
			$temp = $conn->GetArray("select * from ".PREFIX."data_list where type='news'".$lang." order by sort");
			$data["news"] = $temp;
			
			//edm			
			$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='EDM'".$lang);
			$data["EDM"] = explode('|__|',dequotes($temp["pic"],-1));
		break;
	}

	
}



//--會員狀態
if (!$member){
	include_once("member_class.php");
	$member = new member($conn,PREFIX."member");
}
if($member->status()){//--判斷為登入的話
	$data["login_html"] = '<a href="member.php?act=detail">會員專區</a><a href="member.php?act=logout">會員登出</a>';
}else{
	$data["login_html"] = '<a href="member.php?act=join">加入會員</a><a href="member.php?act=login">會員登入</a>';
}


//---下版資訊-----
			$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='foor'".$lang);
			$data["foor"] = dequotes($temp["detail"],-1);
//---------------
//---按鈕資訊-----
			$temp = $conn->GetArray("select * from ".PREFIX."setting where type='button'".$lang);
			$data["button"] = $temp;
//---------------


$data["pageget"] = $_GET;
$data["pagename"] = $page_name;
$tpl->assign("data",$data); //別的頁面傳送來的data
$tpl->assign("member_info",@$_SESSION["member_info"]);
$tpl->assign("cookie",@$_COOKIE["cookie"]);
$tpl->assign("setup", $_SETUP);//config設定檔
$tpl->assign("content",@$content);
$tpl->assign("web_set",@$web_set);
$tpl->assign("lang",@$_SESSION["mode_lang"]);


//--進行輸出註解去除處理
ob_start();
$tpl->display(ROOT_PATH.'templates/'.$templates_page);
$smarty_output = ob_get_contents(); //接收快取頁面
ob_end_clean();


//--seo處理
header('Last-Modified: '.gmdate('D, d M Y').' 00:00:00'.' GMT', true, 200); //--最後頁面編輯時間
header('Date: '.gmdate('D, d M Y H:i:s').' GMT', true, 200);
header('Expires: '.gmdate('D, d M Y H:i:s',mktime(0,0,0,1,1,1998)).' GMT', true, 200); //--快取時間
echo html2txt($smarty_output);
$conn->close();



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