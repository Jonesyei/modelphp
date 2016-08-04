<?php
include_once("../includes/main_back_inc.php");
/*
$data["button"]["href"]='1'; //--上傳圖片後連結網址開關
*/
$include = true;//不讓 index.php display的參數

$cpos["pagecount"] = 50; //每頁顯示筆數
$cpos["table"] = PREFIX."category";
$cpos["tablelistwhere"] = "WHERE lang='".$_SESSION["admin_info"]["lang"]."' and root_id='".quotes($_GET["mode"])."' and sys!=1";//列表顯示資料的條件
$cpos["tablewhere"] = 'id='.$_GET["id"]; //內容頁檢視條件
$cpos["file_url"] = "../upload/category/";
$cpos["fck_set"] = array('detail');
$cpos["listorderby"] = "lft";
$cpos["sort_class"] = "parent_id"; //--列表頁有多個不同類別 依照此欄位配排序
//$cpos["re_img_w"] = '680'; //縮圖處理 寬 值  設定兩項才會執行縮圖處理
//$cpos["re_img_h"] = '440'; //縮圖處理 高 值


$cpos["tablesearch"] = 'name';//搜尋關聯欄位
$cpos["searchstatus"] = 'status';//搜尋狀態參照欄位

$close["insert"] =0;
$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 0;

//$cpos["access_data"] = array('status','2','1','outputdata');///資料設定
//$cpos["access_data_token"] = true;


if ($_POST)
if (($_POST["pic"][0]==''||$_POST["pic"][0]==NULL) && count($_POST["pic"])<=1) {
	$_POST["pic"]='';
}elseif (($_POST["pic"][0]==''||$_POST["pic"][0]==NULL) && count($_POST["pic"])>1){
	unset($_POST["pic"][0]);
}




include_once("category_class.php"); //-分類樹核心 create by Jones
$cpos["list_update_func"] = "cate_mode_reload(".$mode.",0,\$conn,'".$cpos["table"]."');";
include_once("centerpoes.php");

cate_mode_reload($mode,0,$conn,$cpos["table"]);
if ($_POST) linkto($_SERVER['REQUEST_URI']);


//--尋找分類數層級
if (isset($_GET["parent_id"])){
	$depth_data = $conn->GetRow("select * from ".$cpos["table"]." where id='".quotes($_GET["parent_id"])."'");
	$depth = ($depth_data["depth"]*1+1);
	$data["one"]["parent_id"] = $depth_data["id"];
}elseif ($data["one"]["depth"]){
	$depth = $data["one"]["depth"];
}else{
	$depth = '1';
}
//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["pic_size_title"] = "任意比例";
	$data["uploadfilemax"] = 50;//圖檔上傳上限	
	$data["one"]["pic"] = (is_array($data["one"]["pic"]) ? $data["one"]["pic"]:explode('|__|',$data["one"]["pic"]));
	//計算圖片總數並判斷第一個是否為空值  空值等於 目前有的數量為0
	$temp_pic_count = 0;
	foreach ($data["one"]["pic"] as $k=>$v){
		if ($v!=NULL && $v!=''){
			$temp_pic_count +=1;
		}
	}
	
	$data["one"]["parent_id_html"] = $data["one"]["prolist"]=create_select("parent_id",$tree_array,($data["one"]["parent_id"]!=NULL ? $data["one"]["parent_id"]:$_GET["parent_id"]),$mode,"根目錄");//--加價購選單
	//--分類樹判斷
	switch($mode){
		case "1":
			//--層級判斷
			switch ($depth){
				case "1":
				$data["order_html"] .= '<tr><td align="right">分類折扣:</td><td><input type="text" name="desh" value="'.$data["one"]["desh"].'" maxlength="7"></td></tr>';
				break;
			}
		break;
	}
	
}
else//列表頁
{
	if ($data["list"])
		foreach ($data["list"] as $k=>$v){
			$spce = '';
			for($i=1;$i<$v["depth"];$i++) $spce .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$data["list"][$k]["name"] = $spce.$v["name"];
		}
}






$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);


$data["file_url"] = $cpos["file_url"];
include_once("index.php");//assign 所有資料、共用頁面

$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





