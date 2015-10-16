<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;

$per_page_qty = 30; // 頁面筆數
$upload_file_url = '../upload/category/'; //檔案上傳路徑
$admin_info		= $_SESSION["admin_info"];
//-----------固定接收參數------------
$act 			= $_REQUEST["act"];  			//判斷頁面呈現 detail-新增修改，list-列表 add-新增 reset-修改 del-刪除
$id 			= quotes($_REQUEST["id"]);		//判斷當前要編輯的資料列
$mode 			= quotes($_REQUEST["mode"]);	//判斷當前要編輯的資料種類
$del_id			= quotes($_POST["del_id"]);		//判斷當前要刪除的資料列
$page			= quotes($_REQUEST['page']);	//判斷目前瀏覽頁數
$s_query		= quotes($_REQUEST['s_query']);	//搜尋字
$DelPic			=  quotes($_POST["DelPic"]);		//判斷有無要刪除圖片

if (!isNumber($page)) $page = 1; 			//頁數防呆
if (!$mode) $mode = 1;//root_id=3 			//沒資料預設1


//----------排序參數-----------------
$val 		= quotes($_GET['val']);				//現在值
$val_before = quotes($_GET['val_before']);		//修改前值
$parent_id 	= quotes($_GET['pid']);				//父節點id

//-----------搜尋參數---------------
$isSearch	=$_POST["isSearch"];

//----------設定初值----------
$update	= date("Y-m-d H:i:s");
$table=PREFIX."category";
$link_page	= "category.html";

//$upload_path = "../upload/category/";
$_SESSION["admin_info"]["file_url"] = "../upload/category/";

//先判斷該root是否存在，不存在停止一切動作
$sql="SELECT * FROM ".$table." WHERE id='".$mode."'";
$root_data=$conn->GetRow($sql);
if($root_data["id"]=="")
{
	$conn->Close();
	alert(NO_DATA,"index.php");
	exit;
}
else
{
	//更新走訪必用(root的左邊值)
	$left_node_num=$root_data["lft"];
	//$subtitle = $root_data["name"];
	$subtitle = $_SESSION["admin_info"]["title"];
}

/*
switch($mode)
{
	case 3:
		$MAX=1;		//限制能建立的深度目錄
		$html["size_memo"] = "(715 X 175 px )";
		break;							
	default :
		$auth="0";									
}
*/


$MAX = 1;
//--針對欄位設定最大組數
$max_count_data = $conn->GetRow("select * from ".$table." where id='".$mode."'");
if ($max_count_data)
$MAX = $max_count_data["max_count"]*1;



//-圖片重組
if ($_POST) {
	if (is_array($_POST["pic"])){
		$_POST["edit_pic"] = implode('|__|',$_POST["pic"]);
	}else{
		$_POST["edit_pic"] = '';
	}
}
	





//terry add 刪除圖片
//刪除檔案 del=第幾個檔案 row=資料庫欄位 id=資料id
if($_GET["del"]!=NULL && $_GET["row"]!=NULL && $id!=NULL)
{

	$sql = "select * from ".$table." WHERE id=".quotes($id);
	$self = $conn->GetRow($sql);
	$file = explode("|__|",$self[ $_GET["row"] ]);
	$file_name = explode(",",$file[ $_GET["del"] ]);//切割檔名後所有值
	
	//判斷檔案格式
	//$type_info = explode(".",$pic["0"]);
	//$_SETUP["pic_type"]
    //$_SETUP["file_type"]
	
	@unlink($_SESSION["admin_info"]["file_url"].$file_name["0"]);
			
	unset($file[ $_GET["del"] ]);
		
	$i = 0;
	foreach($file as $k=>$v)
	{
		$tmp = explode(",",$v);//pic_id_idx.jpg,800,600
		$tmp_2 = explode(".",$tmp["0"]);//pic_id_idx.jpg
		$tmp_3 = explode("_",$tmp_2["0"]);
		
		$tmp_3["1"] = $id;
		$tmp_3["2"] = $i;
		
		$upd[] = implode("_",$tmp_3).".".$tmp_2["1"].",".$tmp["1"].",".$tmp["2"];
			
		$i++;
	}	
	
	$upd[ $_GET["row"] ] = implode("|__|",$upd);
	
	
	
	$where = "id=".$id;
	$conn->AutoExecute($table,$upd,"UPDATE",$where);

	

	$dir = opendir($_SESSION["admin_info"]["file_url"]);
	while (($file = readdir($dir)) !== false)
	{
		$tmp = explode(",",$file);//pic_id_idx.jpg,800,600
		$tmp_2 = explode(".",$tmp["0"]);//pic_id_idx.jpg
		$tmp_3 = explode("_",$tmp_2["0"]);
		
		if($tmp_3["1"]!=$id) continue;//不是本id資料的檔案不處理
		if($tmp_3["2"]<$_GET["del"]) continue;//
		
		
		$tmp_3["1"] = $id;
		$tmp_3["2"] = $tmp_3["2"]-1;//只刪一個檔案 往前移一個idx

		$file_name = implode("_",$tmp_3).".".$tmp_2["1"];
		
		
		@rename($_SESSION["admin_info"]["file_url"].$file,$_SESSION["admin_info"]["file_url"].$file_name);//檔案命名重新排序
		
	}
	closedir($dir);
	
	
	
	LinkTo( Get_Url( array('del','row') ) );
	exit;
}








//新增、修改前制動作
if($act=="add" || $act=="edit")
{
	//-----create file upload by Jones check dir
	if (!is_dir($upload_file_url)){
		mkdir($upload_file_url,0777,true);
	}
	//---------檔案上傳 直接一起寫入post
	foreach ($_FILES as $k=>$v){
		if (is_array($_FILES[$k]["name"])){ //---判斷為陣列名稱相同物件上傳
			foreach ($_FILES[$k]["name"] as $n1=>$n2){
				if ($n2!=''||$n2!=NULL){
					$temp_file_name = explode('.',$n2);
					$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$temp_file_name[count($temp_file_name)-1];
					move_uploaded_file($_FILES[$k]["tmp_name"][$n1],$upload_file_url.$temp_file_name);
					$_POST[$k][] = $temp_file_name;		
				}
			}	
		}else{
			if ($_FILES[$k]["name"]!=''||$_FILES[$k]["name"]!=NULL){
				$temp_file_name = explode('.',$_FILES[$k]["name"]);
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$temp_file_name[count($temp_file_name)-1];
				move_uploaded_file($_FILES[$k]["tmp_name"],$upload_file_url.$temp_file_name);
				$_POST[$k] = $temp_file_name;
			}
		}
	}
	
	//接收頁面內容參數
	$record = array();
	$record=getFormData($_POST);
	
	$record["lang"] = $lang;
	
	
	//---------防呆--------------
	if(empty($record["name"]) || ($record["status"]!=0 && $record["status"]!=1) )
	{
		$conn->Close();
		alert(EDIT_ERROR,-1);
		exit;
	}
	
	//解析參數(0: parent_id 1:depth)
	$cate=explode("|",$record["cate"]);
	//如果parent_id 、 depth 值不存在，表建立在跟目錄底下
	if($cate[0]=="" || $cate[1]=="")
	{
		$cate[0]=$mode;
		$cate[1]=0;
	}
	unset($record["cate"]);	
	

}

//---------處理資料-----------
if($act=="sort")
{
	sort_num($conn,$table,$id,$val,$val_before," parent_id='".$parent_id."' ");
	//更新樹走訪
	rebuild_tree($mode,$left_node_num,$conn,$table);		
	$act="list";

}
else if($act=="add")
{	
	$record["root_id"]		= $mode;		
	$record["parent_id"]	= $cate[0];		
	$record["depth"]		= $cate[1]+1;	//新增類別深度為父深度+1
	$record["file"] 		= check_upload_file($record["file"],$upload_path);
	$record["update_date"]	= $update;
	$record["create_date"] 	= $update;
	$record["update_user"] 	= $admin_info["account"];
	$record["create_user"] 	= $admin_info["account"];
	
	
	if (!add_node($record,$conn,$table)){
		alert('erro',-1);
		exit;
	}
	
	//更新樹走訪
	rebuild_tree($mode,$left_node_num,$conn,$table);	
	
	//--新增ID導入
	$insert_id = $conn->Insert_ID();
	$conn->Close();	
	alert($subtitle.ADD_MSG,"?mode=$mode&s_query=$s_query&id=".$insert_id);
	exit;
}
else if($act=="edit")
{

		
	//搜尋自己原本的parent_id,depth
	$sql="SELECT parent_id,depth,sort,file FROM ".$table." WHERE id='".$id."'";
	$rs=$conn->Execute($sql);
	if(!$rs) Error($conn);
	$parent_id=$rs->fields["parent_id"];	
	$depth=$rs->fields["depth"];
	$sort=$rs->fields["sort"];


	
	$record["file"] 		= check_upload_file($record["file"],$upload_path);		
	$record["parent_id"]	= $cate[0];		
	$record["depth"]		= $cate[1]+1;	//新增類別深度為父深度+1
	$record["update_date"]	= $update;
	$record["update_user"] 	= $admin_info["account"];
	
	$rs=$conn->AutoExecute($table,$record,'UPDATE',"id='".$id."'");
	if(!$rs) Error($conn);
	
		
	//目錄沒變
	if($parent_id==$record["parent_id"])
	{
		//更新排序
		sort_num($conn,$table,$id,$record["sort"] ,$record["pre_sort"]," parent_id='".$parent_id."' ");			
	}
	else	//目錄變了
	{
		$parent_data=array(-1);
		$parent_str="";
		//找出要移動目錄底下所有父節點id
		$data=display_tree($id,$conn,$table,0,0,"and 1=1 ");
		for($i=0;$i<count($data);$i++)
		{
			$isHave=false;
			for($j=0;$j<count($parent_data);$j++)
			{
				if($data[$i]["parent_id"]==$parent_data[$j])
				{
					$isHave=true;
					break;
				}
			}
			if($isHave==false)
			{
				array_push ($parent_data,$data[$i]["parent_id"]);
			}
		}
		//print_r($parent_data);
		//組合sql
		for($i=0;$i<count($parent_data);$i++)
		{
			$parent_str .= $parent_data[$i];
			if($i != (count($parent_data)-1) ) $parent_str .=",";		
		}
		//更新所有跟節點底下的深度
		if($parent_str !="")
		{
			$sql="UPDATE ".$table." SET depth=depth-".($depth-$record["depth"])." WHERE parent_id in (".$parent_str.")";

			$rs=$conn->Execute($sql);
			if(!$rs) Error($conn);
		}
		//移動原目錄的排序(元素移動變更)
		$sql="UPDATE  ".$table." SET sort=sort-1 WHERE sort > ".$sort." AND parent_id='".$parent_id."'";
		$rs = $conn->Execute($sql);
		if(!$rs) Error($conn);
		
		//原節點插入新位置排序(目錄變更預設放到最後)
		$sql="SELECT count(*) as max_sort FROM ".$table." WHERE parent_id='".$record["parent_id"]."'";
		$rs = $conn->Execute($sql);
		if(!$rs) Error($conn);
		$max=$rs->fields["max_sort"];
		$sql="UPDATE  ".$table." SET sort='".$max."' WHERE id='".$id."'";
		$rs = $conn->Execute($sql);
		if(!$rs) Error($conn);		
	}	



	//更新樹走訪
	rebuild_tree($mode,$left_node_num,$conn,$table);
	$conn->Close();		
	//alert($subtitle.EDIT_MSG,"?mode=$mode&page=$page&s_query=$s_query");
	alert($subtitle.EDIT_MSG,"?mode=$mode&act=detail&id=".$id);
	exit;
	
}
else if($act == "del")
{
	//解析刪除id
	$piece=explode(",",$del_id);
	if (count($piece)>0)
	foreach ($piece as $k=>$v){
		$del_id = $v;
		del_node($del_id,$mode,$conn,$table);	
	}
	$conn->Close();	
	alert($subtitle.DEL_MSG,"?mode=$mode&page=$page");
	exit;
}

//--------頁面呈現-----------




if ($act == 'detail')	//新增修改
{
	if(!empty($id))	//id有資料
	{
		$act	= "edit";	//修改
		$subtitle	.= EDIT_TITLE;

		$sql="select * from  ".$table." where id = '".$id."'";
		$data=$conn->GetRow($sql);	
						
		if ($data["id"]=="") //無資料
		{
			$conn->Close();
			alert(NO_DATA,"-1");
			exit;
		}
		else
		{
			foreach($data as $key => $item) $data[$key]=deQuotes($item,-1);
			
			$data["table"]=$table;
			$select_val=$data["parent_id"]."|".($data["depth"]-1);
			$lock="";	//目錄上鎖
			//die($select_val);
		}
	}
	else
	{
		$act	= "add";		//新增
		$data["status"]=1;		//預設開啟
		$data["table"]=$table;	//預設table名稱
		$subtitle .= ADD_TITLE;
	}	
	
	//terry add

	$data["detail_fck"] = 
	Fck("edit_detail",'90%','450','../fckeditor/',deQuotes($data["detail"],-1),"../../style/style_set.css");
	
	//terry add 
	$data["pic_list"] = Data_List_Pic($data["pic"]);
	
	//抓取資料
	$tree_data=display_tree($mode,$conn,$table);	
	
	foreach($tree_data as $item)
	{
		//資料放入array
		//踢除例外，目錄本身不能為自己
		if($item['id']!=$data["id"] && $item['depth']<=$MAX )
			$menu_data[$item['id']."|".$item['depth']] = $item['show_text'];	
	}
 	//狀態選單
	$html["status_menu"]=create_input("edit_status",$_SETUP['groupStatus'],"radio",$data["status"]);
	//目錄選單
	$html["cate_menu"]=create_select("edit_cate",$menu_data,$select_val,$mode,"根目錄");		
	//上傳檔案
	$html["file_menu"]=create_upload_file("file",$data["file"],"category","../");	
	
	
}
else	//列表
{
	$subtitle	.= LIST_TITLE;

	//------------判斷搜尋條件----------//
	$search_sql=" and ";
	if($isSearch)
	{
		//清空搜尋字串重新開始
		$s_query="";
		$page=1;
		
		$search = getFormData($_POST,"^search");
		
		foreach($search as $key => $value)
		{
			$s_query .= $key . "," .$value. "|" ; 
		}
		$s_query = substr($s_query,0,-1);
	}
	else
	{
		$s_query=base64_decode($s_query);

	}
	
	//解析搜尋字串
	$search = array();

	$piece = explode("|",$s_query);
	
	foreach($piece as $key => $item)
	{
		$each = explode(",",$item);
		
		if($each[1]!="")
		{
			if($each[0] == "keyword")
				$search_sql .= "( name like '%".$each[1]."%' or  memo like '%".$each[1]."%' ) and ";				
			else
				$search_sql .= $each[0]."= '".$each[1]."' and ";
		}			
		$search[$each[0]]=$each[1];
		
		$admin_info["search_value"][$each[0]]=$each[1];
	}
	
	if($search["root_id"]=="")
		$search_sql.=" root_id= ".$mode;
	else
		$search_sql.=" 1=1 ";
	
	$s_query=base64_encode($s_query);
			
	// -------建立搜尋資料欄位--------//
 	//狀態選單
	$html["status_menu"]=create_select("search_status",$_SETUP['groupStatus'],$search["status"]);
	
	//類別種類選單
	$cate_data=display_tree($mode,$conn,$table);
	foreach($cate_data as $item)
	{
		if($item['depth']<=$MAX)
			$type_data[$item["id"]]=$item["show_text"];
	}
	$html["type_menu"]=create_select("search_parent_id",$type_data,$search["parent_id"],"","根目錄"); //選項資料,選到值,選單id	
	
	
	$start=$per_page_qty*($page-1);
	//如果不指定搜尋父節點，已系統預設父節點為根
	$search_root="";
	if(empty($search["root_id"])) $search_root=$mode;
	else $search_root=$search["root_id"];
		
	//------抓取資料------//
	//抓出所有類別同層總數資料
	$sql="select count(*) AS total,parent_id from ".$table." WHERE root_id='".$mode."' GROUP BY parent_id";
	$rs = $conn->Execute($sql);
	if(!$rs) Error($conn);
	while($arr=$rs->FetchRow())
	{
		$total_data[]=array(
			"parent_id"	=> $arr["parent_id"],
			"total"		=> $arr["total"]
		);
		//抓出總筆數
		$total_data_num += $arr["total"];
	}

	$data=display_tree($search_root,$conn,$table,$start,$per_page_qty,$search_sql,$total_data);

		
	//抓出總筆數		
	$url="?s_query=$s_query&mode=$mode";
	$total_data_num=($total_data_num==0)?0: $total_data_num;
	if($total_data_num>0)
	{
		$total_page=ceil( $total_data_num/$per_page_qty);
		if( $page > $total_page ) $page=$total_page;
		else if( $page <= 0 ) $page=1;
			
		//輸出分頁
		$page_data=array(
			"total"=>$data[0]["all_total"],
			'perpage'=>$per_page_qty,
			'now_page'=>$page,
			"url"=>$url);		
		$html["page_bar"]=cache_html("page",$page_data);
	}
	
			
	//顯示頁面在處理
	foreach($data as $key => $item)
	{
		
		
		$data[$key]["status"]=array(
			"value" => $item["status"],
			"option"=> json_option($_SETUP['groupStatus'],$item["status"]),
			"text"	=> $_SETUP['status'][$item["status"]]
		);
		
		
		
		$data[$key]["up_icon"]=($item["sort"]==1)?$_SETUP["icon"]["no"]:create_img($_SETUP["icon"]["up"],$item["id"],"?val=".($item["sort"]-1)."&val_before=".$item["sort"]."&act=sort&id=".$item["id"]."&pid=".$item["parent_id"]."&mode=".$mode."&page=".$page);
		$data[$key]["down_icon"]=($item["total"]==$item["sort"])?NULL:create_img($_SETUP["icon"]["down"],$item["id"],"?val=".($item["sort"]+1)."&val_before=".$item["sort"]."&act=sort&id=".$item["id"]."&pid=".$item["parent_id"]."&mode=".$mode."&page=".$page);
		
		
		$data[$key]["table"]=$table;

	}	
	//print_r($data);
	//exit;
}


//共用
$tpl->assign("act", $act);
$tpl->assign("page", $page);
$tpl->assign("html",$html);
$tpl->assign("search",$search);
$tpl->assign("mode",$mode);
$tpl->assign("s_query",$s_query);
$tpl->assign("page_table",$jpage);


$data["one"]["pic"] = explode('|__|',$data["pic"]);	



//-相關設定 add by Jones
switch ($mode){
	case "1":
		$jdata["pic_depth"] = 1; //--圖片功能作用層級
		$data["uploadfilemax"] = 1;
		$data["pic_size_title"] = '200*200';
		$data["file_url"] = '../upload/category/';
	break;
}


//--add by Jones
if ($act!="add" && $act!="edit" && $act!="detail"){
	unset($data["one"]);
	unset($data["button"]);
	unset($data["uploadfilemax"]);
	unset($data["pic_size_title"]);
	unset($data["file_url"]);
}


//-- add by Jones (相關設定)
$tpl->assign("jdata",$jdata);







include_once("index.php");//assign 所有資料、共用頁面







//後臺固定用參數
$tpl->assign("admin_info", $admin_info);
$tpl->assign("subtitle", $subtitle);

//----導出頁面判斷變數
$tpl->assign("cate_file_url",$upload_file_url);

$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





