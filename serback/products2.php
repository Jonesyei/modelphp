<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$cpos["pagecount"] = 30; //每頁顯示筆數
$cpos["table"] = $data["pageget"]["data_table"] = PREFIX."products";
$cpos["tablejoin"] = ' LEFT JOIN (select id as cid,name as classname from '.PREFIX.'category) AS cc ON cc.cid=class';
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["tablesearch"] = 'name,detail';//搜尋關聯欄位
//$cpos["searchdate"] = 'cdt';//搜尋時間參照欄位 不設定預設為 created
$cpos["searchstatus"] = 'status';//搜尋狀態參照欄位
$cpos["listorderby"] = 'sort';//列表頁排序方式
$cpos["searchclass"] = 'class';//收尋分類對照欄位
$_SESSION["admin_info"]["file_url"] = $data["file_url"] = $cpos["file_url"] = "../upload/products/";
//$cpos["sort_class"] = "class"; //--列表不同類別排序方式 依照此欄位配排序
$cpos["file_check"] = "pic,stock_pic";
if (!$_GET["type"]) $_GET["type"]=1;
if ($_GET["type"]*1>1){
	$cpos["tablelistwhere"] = 'WHERE type="products'.$_GET["type"].'"';//列表顯示資料的條件
}else{
	$cpos["tablelistwhere"] = 'WHERE type="products"';//列表顯示資料的條件
}




$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 0;
//if(@$_POST["act"]=="excel") include_once("excel_products.php");


//----使用折扣方法直接給予 特價值
if ($_POST["price1"]!=NULL){
	$_POST["price2"] = $_POST["price1"]*(100-$_POST["price_desh"])*0.01;
	
	//實際價錢0元啟動金額保護
	if ($_POST["price2"]==0 && $_POST["price1"]*1==0) {
		//$_POST["price_1"] = $_POST["price_2"] = '9999999';
		alert('警告，您所設定的商品價格設定為 0 將可能被大量訂購產品造成虧損，如設定錯誤請回商品 ['.$_POST["name"].'] 內頁中重新設定',-1);
	}
}
/*
if ($_GET["id"]!=NULL && $_POST && ($_POST["size"][0]==NULL||$_POST["size"][0]==''||$_POST["stock"][0]==NULL||$_POST["stock"][0]=='') ){
	alert('必須先建立一個尺寸規格',-1);
}
*/
if ($_POST){
	//--類別分類 寫入
	if ($_GET["mode"]){
		$_POST["type"] = $_GET["mode"];
	}else{
		if ($_GET["type"]*1>1){
			$_POST["type"] = 'products'.$_GET["type"];
		}else{
			$_POST["type"] = 'products';
		}
	}
	//--判斷是否選擇到母項目
	if ($_POST["class"]){
		foreach ($_POST["class"] as $k=>$v){
			$temp = $conn->GetArray("select * from ".PREFIX."category where parent_id='".$v."'");
			if ($temp) {
				alert('必須選擇子項目!!',-1);
			}
		}
	}

	//--尺寸貨號必填
	if (isset($_POST["stock_no"]) && implode('',$_POST["stock_no"])==''){
		alert('必須輸入尺寸貨號!!',-1);
	}
}





$act = @$_POST["act"];
$del_id = quotes(@$_GET["del_id"]);



include_once("centerpoes.php");


//--匯出/入資料
$data["output_title"] = array('編號','商品分類','商品名稱','品牌分類','特價品','商品售價','商品特價','可獲得紅利','可折抵購物金');
$data["output_row"] = array('id','classname','name','probrand','cook','price1','price2','point','depoint');
$data["input_title"] = array('編號','商品分類','商品名稱','品牌分類','特價品','商品售價','商品特價','可獲得紅利','可折抵購物金');
$data["input_row"] = array('id','type','name','probrand','cook','price1','price2','point','depoint');
$data["cpos"] = $cpos;
//---------


//display_tree($root,$db,$table,$start=0,$count=0,$where_sql="",$total_data="")	
//$tree_data_type=display_tree($_GET["type"],$conn,PREFIX.'category');	//-分類資料
$tree_data_pro=display_tree('1',$conn,PREFIX.'category');	//-品牌資料

//--類組開關判斷
if ($_GET["mode"]){
	$check_data = $conn->GetRow("select * from ".PREFIX."data_list where type='set_pro' and b_name='".$_GET["mode"]."'");
	$check_data["detail"] = explode('|__|',$check_data["detail"]);
	$data["check_button"] = $check_data["detail"];
	$tree_data_type=display_tree($check_data["detail"][6],$conn,PREFIX.'category');	//-分類資料
}else{
	$data["check_button"][4] = '1';//專案時 使用的圖片最大限制數
	$tree_data_type=display_tree($_GET["type"],$conn,PREFIX.'category');	//-分類資料
}


//-圖片上傳最大數
$data["uploadfilemax"] = 20;

if($_GET["id"] || $_GET["id"]=='0')
{
	$_SESSION["admin_info"]["view"] = "detail";

	$data["one"]["class_html"] = Make_List($_SETUP["pro_class"],$data["one"]["class"]);
	


	//----商品資訊單筆
	//$data["one"]["detail_fck"] = Fck("detail",'90%','450','../fckeditor/',deQuotes(@$data["one"]["detail"],-1));

	$data["one"]["pic"] = explode('|__|',$data["one"]["pic"]);
	$data["one"]["small_pic"] = explode('|__|',$data["one"]["small_pic"]);
	
	//----加價購
	if ($data["one"]["add_pic"]!=NULL&&$data["one"]["add_pic"]!='') $add_pic = explode('|__|',$data["one"]["add_pic"]);
	if ($data["one"]["add_pro"]!=NULL&&$data["one"]["add_pro"]!='')	$add_pro = explode('|__|',$data["one"]["add_pro"]);
	if ($data["one"]["add_price"]!=NULL&&$data["one"]["add_price"]!='') $add_price = explode('|__|',$data["one"]["add_price"]);
	if ($data["one"]["add_count"]!=NULL&&$data["one"]["add_count"]!='') $add_count = explode('|__|',$data["one"]["add_count"]);
	if (is_array($add_pro))
	foreach ($add_pro as $k=>$v){
		$data["one"]["add_all"][$k]["pic"] = $add_pic[$k];
		$data["one"]["add_all"][$k]["id"] = $add_pro[$k];
		$data["one"]["add_all"][$k]["count"] = $add_count[$k];
		$data["one"]["add_all"][$k]["price"] = $add_price[$k];
	}
	$data["one"]["add_all"] = json_encode($data["one"]["add_all"]);

	
	//---取出分類資料----
	foreach($tree_data_type as $item)
	{
			$aa[$item['id']] = $item['show_text'];
			//echo $item['id'].' '.$item['depth'].' '.$item['show_text'];
	}
	//--商品多分類
	$data["one"]["class"] = explode('|__|',$data["one"]["class"]);
	foreach ($data["one"]["class"] as $k=>$v){
		$data["one"]["cate_menu"][$k]='<div id="class_'.$k.'">'.create_select("class[]",$aa,$v,'1',"根目錄").' <input type="button" value=" 刪除 " onclick="del_class('.$k.')"></div>';
	}
	//-預設分類資料 (新增用)
	$data["one"]["def_cate_menu"] = create_select("class[]",$aa,NULL,'1',"根目錄");
	$data["one"]["prolist"]=create_select("prolist",$aa,NULL,'1',"根目錄");//--加價購選單
	
	
	//----取出品牌資料
	unset($aa);
	foreach($tree_data_pro as $item)
	{
			$aa[$item['id']] = $item['show_text'];
	}
	$data["one"]["probrand_menu"]=create_select("probrand",$aa,$data["one"]["probrand"],'1',"根目錄");
	
	
	
	//--尺寸模組
	$sql = "select * from ".PREFIX."data_list WHERE type='size'";
	$pro_size = $conn->GetArray($sql);
	foreach ($pro_size as $k=>$v){
		$prosize[dequotes($v["size"],-1)] = $v["name"];
	}
		$data["one"]["pro_size"] = Make_list($prosize,NULL);
	//--尺寸資訊抓出顯示
	$data["one"]["size"] = $size_array = explode('|__|',$data["one"]["size"]);
	$data["one"]["color"] = $size_array = explode('|__|',$data["one"]["color"]);
	$data["one"]["stock"] = $size_array = explode('|__|',$data["one"]["stock"]);
	$data["one"]["stock_pic"] = $size_array = explode('|__|',$data["one"]["stock_pic"]);
	$data["one"]["stock_no"] = $size_array = explode('|__|',$data["one"]["stock_no"]);
	$data["one"]["stock_status"] = explode('|__|',$data["one"]["stock_status"]);
	$data["one"]["stock_price"] = explode('|__|',$data["one"]["stock_price"]);
	$data["one"]["memo"] = dequotes($data["one"]["memo"],-1);
	$data["one"]["memo_1"] = dequotes($data["one"]["memo_1"],-1);
	

}
else
{
	foreach($tree_data_type as $item) $type_list[$item["id"]] = $aa[$item['id']]= $item["show_text"]; //--組合分類陣列
	if ($data["list"])
	foreach ($data["list"] as $k=>$v){
		$temp_class_list = explode('|__|',$v["class"]);
		if ($temp_class_list)
		foreach ($temp_class_list as $a=>$b){
			$temp_class_list[$a] = $type_list[$b];
		}
		$data["list"][$k]["class_html"] = implode('<br>',$temp_class_list);
		//$data["list"][$k]["class_html"] = create_select("class_".$v["id"],$type_list,$v["class"],'1',"根目錄");
	}
}





$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);

$_SESSION["admin_info"]["tmp"]["search_other"] .= create_select("s_class",$aa,$_GET["s_class"],'1',"根目錄");






include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("data_table",$cpos["table"]);
$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>