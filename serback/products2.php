<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$cpos["pagecount"] = 30; //每頁顯示筆數
$cpos["table"] = $data["pageget"]["data_table"] = PREFIX."products";
//$cpos["tablejoin"] = ' LEFT JOIN (select id as cid,name as classname from '.PREFIX.'category) AS cc ON cc.cid=class';
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["search"] = array('name'=>'keyword','detail'=>'keyword','create_date'=>'daterange','status'=>'s_status');
$cpos['search_left']  = array('class','name');//針對欄位字串陣列or比對
$_SESSION["admin_info"]["file_url"] = $data["file_url"] = $cpos["file_url"] = "../upload/products/"; //--存檔路徑
$cpos["file_check"] = "pic,stock_pic"; //-檔案檢核欄位
$cpos["tablelistwhere"] = 'WHERE type="products" and lang="'.$_SESSION["admin_info"]["lang"].'"';//列表顯示資料的條件
$cpos["cate_root"] = '1';	///--分類樹根
$cpos["sort_set"] = array('class'=>$_GET["s_class"]);


$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 0;



//----使用折扣方法直接給予 特價值
if ($_POST["price1"]!=NULL){
	$_POST["price2"] = $_POST["price1"]*(100-$_POST["price_desh"])*0.01;
	
	//實際價錢0元啟動金額保護
	if ($_POST["price2"]==0 && $_POST["price1"]*1==0) {
		alert('警告，您所設定的商品價格設定為 0 將可能被大量訂購產品造成虧損，如設定錯誤請回商品 ['.$_POST["name"].'] 內頁中重新設定',-1);
	}
}

if ($_POST){
	//--類別分類 寫入
	if ($_GET["mode"]){
		$_POST["type"] = $_GET["mode"];
	}else{
		$_POST["type"] = 'products';
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
$data["output_title"] = array('編號','商品別名','商品分類','商品名稱','商品售價','商品特價','可獲得紅利','可折抵購物金','規格','顏色','尺寸圖片','現貨','貨號','尺寸是否顯示狀態','尺寸金額','商品內容');
$data["output_row"] = array('id','alies','class','name','price1','price2','point','depoint','size','color','stock_pic','stock','stock_no','stock_status','stock_price','detail');
$data["input_title"] = array('編號','商品別名','商品分類','商品名稱','商品售價','商品特價','可獲得紅利','可折抵購物金','規格','顏色','尺寸圖片','現貨','貨號','尺寸是否顯示狀態','尺寸金額','商品內容');
$data["input_row"] = array('id','alies','class','name','price1','price2','point','depoint','size','color','stock_pic','stock','stock_no','stock_status','stock_price','detail');
$data["cpos"] = $cpos;
//---------


//display_tree($root,$db,$table,$start=0,$count=0,$where_sql="",$total_data="")	
//$tree_data_pro=display_tree('1',$conn,PREFIX.'category');	//-品牌資料
$tree_data_type=display_tree($cpos["cate_root"],$conn,PREFIX.'category');	//-分類資料


//-圖片上傳最大數
$data["uploadfilemax"] = 20;

if($_GET["id"] || $_GET["id"]=='0')
{
	$_SESSION["admin_info"]["view"] = "detail";

	$data["one"]["class_html"] = Make_List($_SETUP["pro_class"],$data["one"]["class"]);
	
	//----商品資訊單筆
	//$data["one"]["detail_fck"] = Fck("detail",'90%','450','../fckeditor/',deQuotes(@$data["one"]["detail"],-1));

	$data["one"]["pic"] = (is_array($data["one"]["pic"]) ? $data["one"]["pic"]:explode('|__|',$data["one"]["pic"]));
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
		if ($v!='') $data["one"]["cate_menu"][$k]='<div id="class_'.$k.'">'.create_select("class[]",$aa,$v,'1',"根目錄").' <input type="button" value=" 刪除 " onclick="del_class('.$k.')"></div>';
	}
	if (!$data["one"]["cate_menu"]){
		$check_rootid = $conn->GetArray("select * from ".PREFIX."category where root_id='".$cpos["cate_root"]."'");
		if (!$check_rootid)
			$data["one"]["cate_menu"][] = '<a href="catemode.php" style="color:red;">[目前尚未建立主要分類，點此前往建立一項主要分類]</a>';
		elseif (count($check_rootid)<=1)
			$data["one"]["cate_menu"][] = '<a href="category.php?mode='.$cpos["cate_root"].'" style="color:#d87704;">[分類項目未有任何項目，點此前往建立分類項目]</a>';
	}
	
	//-預設分類資料 (新增用)
	$data["one"]["def_cate_menu"] = create_select("class[]",$aa,NULL,'1',"根目錄");
	$data["one"]["prolist"]=create_select("prolist",$aa,NULL,'1',"根目錄");//--加價購選單
	
	
	//----取出品牌資料
	unset($aa);
	if ($tree_data_pro)
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