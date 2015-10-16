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
		case "album": 
			$mount = 8; //頁碼檔案
			$temp = $conn->GetArray("select * from ".PREFIX."data_list where status='1' and type='album_list'".$lang.' order by sort limit '.($_GET["page"]-1)*$mount.','.$mount);
			$data["album"] = $temp;
			
			$cousql = "select count(*) from ".PREFIX."data_list where type='album_list'".$lang;
			include("includes/mallpage/page.php");
			
		break;
		
		case "service":
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='service' and status='1' order by sort");
			if ($data["list"])
			foreach ($data["list"] as $k=>$v)
				$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
				
			if ($_GET["id"]==NULL) {//--沒資料預設
				$data["one"]["detail"] = $data["list"][0]["detail"];$data["one"]["name"]=$data["list"][0]["name"];
			}else{
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='service' and id='".$_GET["id"]."'");
				$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
			}
		break;

		case "about":
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='about' and status='1' order by sort");
			if ($data["list"])
			foreach ($data["list"] as $k=>$v)
				$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
				
			if ($_GET["id"]==NULL) {//--沒資料預設
				$data["one"]["detail"] = $data["list"][0]["detail"];$data["one"]["name"]=$data["list"][0]["name"];
			}else{
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='about' and id='".$_GET["id"]."'");
				$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
			}
		break;

		case "product":
			$data["mount"] = $mount = 20;
			//---左側列表
			$data["list"] = $conn->GetArray("select * from ".PREFIX."category where root_id='1' and depth='1' and status='1' order by sort");
			foreach ($data["list"] as $k=>$v){
				$temp = $conn->GetArray("select * from ".PREFIX."category where root_id='1' and depth='2' and parent_id='".$v["id"]."' and status='1' order by sort");
				if ($temp) $data["list"][$k]["menu_list"]=$temp;
			}
			
			if (!$_GET["cate"]) {
				$sql = "select * from ".PREFIX."products where type='products' and status='1'".$lang;
				if ($_GET["seach_word"]) $sql .= " and name like '%".$_GET["seach_word"]."%'";
				
			}else{
				$sql = "select * from ".PREFIX."products where type='products' and class like '%".$_GET["cate"]."%' and status='1'".$lang;
			}
			$cousql = str_replace('*','count(*)',$sql);
			include_once("includes/page.php");
			$data["page"] = page_show($cousql,$mount);
			
			$data["product"] = $conn->GetArray($sql.' order by sort limit '.($_GET["page"]*1-1)*$mount.','.$mount);
			foreach ($data["product"] as $k=>$v){
				$data["product"][$k]["detail"] = dequotes($v["detail"],-1);
				$data["product"][$k]["memo_1"] = preg_replace('/\n/','<br>',dequotes($v["memo_1"],-1));
			}
			
			//--內容頁內容
			if ($_GET["id"]){
				$data["one"] = $conn->GetRow("select * from ".PREFIX."products where id='".$_GET["id"]."'");
				$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
				$data["one"]["memo"] = preg_replace('/\n/','<br>',dequotes($data["one"]["memo"],-1));
			}
		break;
		
		case "color_pro":
			//---左側列表
			$data["list"] = $conn->GetArray("select * from ".PREFIX."category where root_id='1' and depth='1' and status='1' order by sort");
			foreach ($data["list"] as $k=>$v){
				$temp = $conn->GetArray("select * from ".PREFIX."category where root_id='1' and depth='2' and parent_id='".$v["id"]."' and status='1'");
				if ($temp) $data["list"][$k]["menu_list"]=$temp;
			}
			
			//--固定商品價格取出
			$data["pro"] = $conn->GetRow("select * from ".PREFIX."data_list where type='one_product'");
			$data["pro"]["detail"] = explode('|__|',$data["pro"]["detail"]);
		break;
		
		case "history_case":
				$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='history_case' and status='1' order by sort");
				if ($_GET["id"]==NULL||$_GET["id"]=='') $_GET["id"] = $data["list"][0]["id"];//預設顯示值第一個
				//擷取項目名稱
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='history_case' and id='".$_GET["id"]."' and status='1'");
				if ($data["one"]) $data["one"]["name"] = '歷史案件';
				if ($_GET["id"]!=NULL&&$_GET["id"]!=''){
					$data["pro"] = $conn->GetRow("select * from ".PREFIX."data_list where type='history_case' and id='".$_GET["id"]."'");
					$data["pro"]["pic"] = explode('|__|',$data["pro"]["pic"]);
					$data["pro"]["detail"] = explode('|__|',$data["pro"]["detail"]);
					$data["pro"]["b_name"] = explode('|__|',$data["pro"]["b_name"]);
					
					$mount = 9;
					$cousql = $data["pro"]["pic"];
					$data["pro"]["status"] = array();
					include_once("includes/mallpage/page.php");
					foreach ($data["pro"]["pic"] as $k=>$v){
						$_now = ($_GET["page"]-1)*$mount;
						if ($k >= $_now*1 && $k <=$_now*1+$mount-1){
							$data["pro"]["status"][$k] = '1';
						}else{
							$data["pro"]["status"][$k] = '0';
						}
					}
				}
		break;
		
		case "contact":
			$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='contact'");
			$data["one"]["detail"] = preg_replace('/\n/','<br>',dequotes($data["one"]["detail"],-1));
			$data["one"]["memo"] = dequotes($data["one"]["memo"],-1);

		break;
		
		case "qa":
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='qa' and status='1' order by sort");
			
			if ($_GET["id"]!=NULL&&$_GET["id"]!=''){
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='qa' and id='".$_GET["id"]."'");
			}else{
				$data["one"] = $data["list"][0];
			}
			if ($_GET["id"]=='files_main'){
				$data["files"] = $conn->GetArray("select * from ".PREFIX."data_list where type='files_main' and status='1' and (floor='' or floor is null) order by sort");
				$data["floor"] = $conn->GetRow("select * from ".PREFIX."data_list where type='files_main' and status='1' and floor='1' order by sort");
			}
		break;
		
		
		case "news":
			$data["mount"] = $mount = 10;
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='news' and status='1' order by sort limit ".($_GET["page"]-1)*$mount.",".$mount);
			$cousql = "select count(*) from ".PREFIX."data_list where type='news' and status='1'";
			include_once("includes/mallpage/page.php");
			
			if ($_GET["id"]!=NULL&&$_GET["id"]!=''){
				$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='news' and status='1' and id='".$_GET["id"]."' order by sort");
				$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
			}
		break;
		
		case "ac":
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='ac' and status='1'".$lang." order by sort");
			foreach ($data["list"] as $k=>$v){
				$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
			}
		break;
		
		case "Customization":
			$data["one"] = $conn->GetRow("select * from ".PREFIX."data_list where type='Customization' and status='1'".$lang."");
			$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
			$data["list"] = $conn->GetArray("select * from ".PREFIX."data_list where type='Customization' and status='1'".$lang."");
			foreach ($data["list"] as $k=>$v){
				$data["list"][$k]["detail"] = dequotes($data["list"][$k]["detail"],-1);
			}
		break;
		
		case "work":
				$data["pro"] = $conn->GetRow("select * from ".PREFIX."data_list where type='work'".$lang);
				$data["pro"]["pic"] = explode('|__|',$data["pro"]["pic"]);
				$data["pro"]["name"] = explode('|__|',$data["pro"]["name"]);
				$data["mount"] = $mount = 16;
				$cousql = $data["pro"]["pic"];
				$data["pro"]["status"] = array();
				include_once("includes/mallpage/page.php");
				foreach ($data["pro"]["pic"] as $k=>$v){
					$_now = ($_GET["page"]-1)*$mount;
					if ($k >= $_now*1 && $k <=$_now*1+$mount-1){
						$data["pro"]["status"][$k] = '1';
					}else{
						$data["pro"]["status"][$k] = '0';
					}
				}
				$data["pro"]["now_count"] = ($_GET["page"]-1)*$mount;
		break;
		
		default: //前導頁
			$temp = $conn->GetArray("select * from ".PREFIX."data_list where type='news'".$lang." order by sort");
			$data["list"] = $temp;
			//edm			
			$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='EDM'".$lang);
			$data["EDM"] = explode('|__|',dequotes($temp["pic"],-1));
			
			//--banner
			//### left
			$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='bannerleft'".$lang);
			$data["left_banner"]["pic"] = explode('|__|',dequotes($temp["pic"],-1));
			$data["left_banner"]["href"] = explode('|__|',dequotes($temp["href"],-1));
			//### right
			$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='bannerright'".$lang);
			$data["right_banner"]["pic"] = explode('|__|',dequotes($temp["pic"],-1));
			$data["right_banner"]["href"] = explode('|__|',dequotes($temp["href"],-1));
			
			//----拼點子特色
			$data["gp"] = $conn->GetArray("select * from ".PREFIX."data_list where type='gp' and status='1'".$lang.' order by sort');
			foreach ($data["gp"] as $k=>$v){
				$data["gp"][$k]["detail"] = dequotes($v["detail"],-1);
			}
			
			//--經典圖款
			$data["classic"] = $conn->GetRow("select * from ".PREFIX."data_list where type='classic'".$lang);
			$data["classic"]["pic"] = explode('|__|',dequotes($data["classic"]["pic"],-1));
			$data["classic"]["href"] = explode('|__|',dequotes($data["classic"]["href"],-1));
			$data["classic"]["name"] = explode('|__|',dequotes($data["classic"]["name"],-1));
			
			//--拼個好點子
			$data["gpic"] = $conn->GetRow("select * from ".PREFIX."data_list where type='gpic'".$lang);
			$data["gpic"]["pic"] = explode('|__|',dequotes($data["gpic"]["pic"],-1));
			$data["gpic"]["href"] = explode('|__|',dequotes($data["gpic"]["href"],-1));
			$data["gpic"]["name"] = explode('|__|',dequotes($data["gpic"]["name"],-1));
			
			$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' and type='button'";
			$data["button"] = $conn->GetArray($sql);
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