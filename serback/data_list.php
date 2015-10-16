<?php
include_once("../includes/main_back_inc.php");


$table = PREFIX."data_list";
$id = quotes(@$_REQUEST["id"]);
$act = @$_POST["act"];
$del_id = quotes(@$_GET["del_id"]);


if($include_set["table"]!="") $table = $include_set["table"];




if($_POST)
{
	foreach($_POST as $k => $v)
	{
		if(is_array($v))
		{
			$tmp = "";
			foreach($v as $k2=>$v2)
				$tmp[] = quotes($v2);
				
			$record[$k] = implode("|__|",$tmp);
		}
		else
		{
			$record[$k] = quotes($v);
		}
	}
	
	
	if($act!='all')
	{
		$sql = "DESC ".$table;
		foreach($conn->GetArray($sql) as $k=>$v) $table_rows[$k] = $v["0"];
		
		$continue_a = array('act','search','searchlike','daterange','date_rang','mode','del_pic');
		foreach($_POST as $k=>$v)
		{
			
			if( in_array($k,$continue_a) ) continue;
			
			//檢查是否有欄位 沒有便新增
			if( !in_array($k,$table_rows) )
			{
				if( strlen($v)>100 )//長度過長 則 新增 text
					$sql = "ALTER TABLE ".quotes($table)." ADD ".quotes($k)." TEXT NULL COMMENT '程式自動生成'";
				else
					$sql = "ALTER TABLE ".quotes($table)." ADD ".quotes($k)." VARCHAR( 100 ) NULL COMMENT '程式自動生成'";
				
				$conn->Execute($sql);
			}
			else
			{
				if( !is_array($v) )
				if( strlen($v)>100 )//長度過長 則 改為 text
				{
					$sql = "ALTER TABLE ".quotes($table)." CHANGE ".quotes($k)." ".quotes($k)." TEXT NULL COMMENT '程式自動生成'";
					$conn->Execute($sql);
				}
			}
			
		}
	}

}


//批次修改全部
if($act=='all')
	include("update_all.php");




//按鈕修改排序
if(isset($_GET["sort_id"]) && isset($_GET["sort_set"]) )
{	
	$sort_id = $_GET["sort_id"];
	$sort_set = $_GET["sort_set"];
	
	$sql = "select * from ".$table." WHERE id=".quotes($sort_id);
	$record = $conn->GetRow($sql);
	
	if($include_set["sort"]!="")
	{		
		$where = "";
		foreach($include_set["sort"] as $k=>$v)
		{
			if($record[$v]!=NULL)
				$where .= $v."='".quotes($record[$v])."' and ";
			else
				$where .= $v."='".quotes($_GET[ $v ])."' and ";
		}
	}
	else
	{
		$where = 
		"type='".quotes($record["type"])."' and 
		class='".quotes($_GET["class"])."' and 
		lang='".quotes($record["lang"])."'"; //撈出所有分類
	}
	$all = $conn->GetArray("select id,sort from ".$table." WHERE ".$where." 1=1 ");
	$max_sort = count($all);
	if( $sort_set > $max_sort) $sort_set = $max_sort;



	//撈出欲移動之資料
	$self = NULL;
	foreach($all as $k=>$v)
	if($v["id"] == $sort_id) $self = $v;
	
	
	
	if($self==NULL) LinkTo("index.php");//ERROR 直接導回後台首頁
	

	//先把 移動的該資料 拉出 這個群組 排序全部上移
	$sql = "UPDATE ".$table." SET sort = sort - 1 WHERE ".$where." sort>=".quotes($self["sort"]);
	$conn->Execute($sql);
	
	//再把 該資料要移動到的 排序 以下 的資料 全部往下移
	$sql = "UPDATE ".$table." SET sort = sort + 1 WHERE ".$where." sort>=".quotes($sort_set);
	$conn->Execute($sql);
	
	
	//將被移動的該資料 放進 移動的sort目標
	$sql = "UPDATE ".$table." SET sort=".quotes($sort_set)." WHERE id=".quotes($sort_id);
	$conn->Execute($sql);
	
	
	
	
	$url = "";
	if(@$_GET)
	foreach($_GET as $k2=>$v2)
	{
		if( in_array($k2, array("sort_id","sort_set") ) ) continue;
		
		if($url=="") 
			$url .= "?".$k2."=".$v2;
		else
			$url .= "&".$k2."=".$v2;
	}
	
	LinkTo($url);
	exit;
}





//刪除檔案 del=第幾個檔案 row=資料庫欄位 id=資料id
if(@$_GET["del"]!=NULL && @$_GET["row"]!=NULL && $id!=NULL)
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



if($del_id)
{
	if($close["del"]==1)
	{
		alert("不開放刪除功能",Page_get_url('del_id'));
		exit;
	}

	if($include_set["sort"]!="")
	{		
		$tmp = "";
		foreach($include_set["sort"] as $k=>$v)
		{
			$tmp["name"][] = $v;
		}
		Sql_del($conn,$del_id,$table,implode(",",$tmp["name"]),$include_set["fake_del"]);
	}
	else
	{
		Sql_del($conn,$del_id,$table,'lang,type,class',$include_set["fake_del"]);
	}
	
	$del_id = explode(",",$del_id);
	
	if($include_set==NULL)
	if($_SESSION["admin_info"]["file_url"])
	{
		$dir = opendir($_SESSION["admin_info"]["file_url"]);
		while (($file = readdir($dir)) !== false)
		{
			$dir_pic = explode(".",$file);
			$dir_pic = explode("_",$dir_pic["0"]);
			
			foreach($del_id as $k=>$v)
			if($v==$dir_pic["1"])
				@unlink($_SESSION["admin_info"]["file_url"].$file);
		}
		closedir($dir);
	}
	
	alert("刪除完成",Page_get_url('del_id'));
	exit;
}





if($act=='submit')
{
	//先檢查全部檔案
	foreach($_FILES as $pic_k => $pic_v)
	{	
		//副檔名 確認格式
		if($pic_v["name"])
		foreach($pic_v["name"] as $k=>$v)
		if($pic_v["size"][$k]>0)
		{
			if( !is_dir($_SESSION["admin_info"]["file_url"]) )
			{
				alert("無此上傳資料夾",-1);
				exit;
			}
		
			$tmp = explode(".",$v);
			
			if(count($tmp)>2)
			{
				alert('上傳檔案檔名不可有\".\"特殊符號',-1);
				exit;
			}
			
			if(@$include_set["upload"]!="")
			{
				//上傳檔案 MODE 非圖片
				if($include_set["upload"]["type"]=='file')
				{
					$upload_type = $_SETUP["file_type"];
				}
				else
				{
					$upload_type = $_SETUP["pic_type"];
				}
			}
			else
			{
				$upload_type = $_SETUP["pic_type"];
			}
			
			
			
			$pass = 0;
			foreach($upload_type as $k2=>$v2)
			{
				if(strtolower($tmp[ count($tmp)-1 ])==$v2)
					$pass = 1;
			}			
			
			if($pass==0)
			{
				alert("上傳格式不符",Page_get_url(''));
				exit;
			}
			
		}
	}



	//檔案上傳 start
	foreach($_FILES as $pic_k => $pic_v)
	{	
		
		$tmp = "";
		if($pic_v["name"])
		foreach($pic_v["name"] as $k=>$v)
		if($pic_v["size"][$k]>0)
		{
			$tmp = explode(".",$pic_v["name"][$k]);
			
			if($id!=0)
			{
				$tmp[0] = $pic_k."_".$id."_".$k;
								
				//在目錄中尋找 檔名為 $pic_k."_".$id 的檔案 (無視副檔名)
				$dir = opendir($_SESSION["admin_info"]["file_url"]);
				while (($file = readdir($dir)) !== false)
				{
					$dir_pic = explode(".",$file);
					if($dir_pic["0"]===$tmp[0]) $pic_name = $file;
					//if($dir_pic["0"]===$tmp[0]."_big") $pic_name_big = $file;
				}
				closedir($dir);
				//@unlink($_SESSION["admin_info"]["file_url"].$pic_name);
				//@unlink($_SESSION["admin_info"]["file_url"].$pic_name_big);
			}
			else
			{
				$tmp[0] = $pic_k."_".Auto_id($conn,$table)."_".$k;
			}
			
			/*		
			if($upload_set!="")
				$img_info = array('0'=>$upload_set["0"]["width"],'1'=>$upload_set["0"]["height"]);
			else
				$img_info = getimagesize($pic_v['tmp_name'][$k]);//img info 0=>width 1=>height
			*/
			
			
			
			if(@$include_set["upload"]!="")
			{
				//上傳檔案 MODE 非圖片
				if($include_set["upload"]["type"]=='file')
				{
					@copy($pic_v['tmp_name'][$k],$_SESSION["admin_info"]["file_url"].$tmp[0].".".$tmp[1]);					
					
					$record[$pic_k] .= $tmp[0].".".$tmp[1]."|__|";
					$record[$pic_k."_name"] .= $pic_v['name'][$k]."|__|";
				}
				else
				{
					$img_info = getimagesize($pic_v['tmp_name'][$k]);//img info 0=>width 1=>height
					
					//ImageResize($pic_v['tmp_name'][$k],$_SESSION["admin_info"]["file_url"] .$tmp[0].".".$tmp[1]);
					$img = new WaxImage($pic_v['tmp_name'][$k]); 
					//$img->resizeToWidth($set_v["width"]);
					//$img->resizeToHeight($set_v["height"]);
					//$img->saveAs($_SESSION["admin_info"]["file_url"].$tmp[0].".".$tmp[1],90);
					@copy($pic_v['tmp_name'][$k],$_SESSION["admin_info"]["file_url"].$tmp[0].$set_v["name"].".".$tmp[1]);
					$record[$pic_k][] = $tmp[0].".".$tmp[1].",".$img_info["0"].",".$img_info["1"]."|__|";
				}
			}
			else
			{
				$img_info = getimagesize($pic_v['tmp_name'][$k]);//img info 0=>width 1=>height
				
				//ImageResize($pic_v['tmp_name'][$k],$_SESSION["admin_info"]["file_url"] .$tmp[0].".".$tmp[1]);
				$img = new WaxImage($pic_v['tmp_name'][$k]); 
				//$img->resizeToWidth($set_v["width"]);
				//$img->resizeToHeight($set_v["height"]);
				//$img->saveAs($_SESSION["admin_info"]["file_url"].$tmp[0].$set_v["name"].".".$tmp[1],90);
				@copy($pic_v['tmp_name'][$k],$_SESSION["admin_info"]["file_url"].$tmp[0].$set_v["name"].".".$tmp[1]);
				
				$record[$pic_k][] = $tmp[0].".".$tmp[1].",".$img_info["0"].",".$img_info["1"];
			}
			
		}
		else// size < 0 
		{
			if($id!=0)
			{	
				$sql = "select * from ".$table." WHERE id=".quotes($id);
				$tmp_2["self"] = $conn->GetRow($sql);
				$tmp_2["old_pic"] = explode("|__|",$tmp_2["self"][$pic_k]);
				
				if($tmp_2["old_pic"][$k]!="")
					$record[$pic_k][] = $tmp_2["old_pic"][$k];
			}
			else
			{
				//$record[$pic_k][] = "";
			}
		}
		

		if(@$record[$pic_k]) @$record[$pic_k] = implode('|__|',$record[$pic_k]);
		
	}
	
	
	//檔案上傳 end
	$tmp = "";
	$tmp_2 = "";


	//刪除 uploadify 套件 之上傳圖片
	if( @$record["del_pic"]!="" )
	{
		$record["del_pic"] = explode("|__|",$record["del_pic"]);
		
		foreach($record["del_pic"] as $k=>$v)
		{
			@unlink($_SESSION["admin_info"]["file_url"].$v);
		}
		unset($record["del_pic"]);
	}
	
	



	if($id!=0)
	{
		$class = "class";
			
		$sql = "select * from ".$table." WHERE id=".$id;
		$tmp = $conn->GetRow($sql);
		$tmp_sort = $tmp["sort"];
		$tmp_class = $tmp[$class];
		
		
		if($include_set["sort"]!="")//分類 設定
		{
			$type_list = $type_list_move = " 1=1 ";
			$x = 0;
			foreach($include_set["sort"] as $k=>$v)
			{
				if($record[$v]!=$tmp[$v]) 
				{
					$x = 1;
					$type_list .= " and ".$v."='".$tmp[$v]."'  ";
					$type_list_move .= " and ".$v."='".$record[$v]."'  ";
				}
				else
				{
					$type_list .= " and ".$v."='".$tmp[$v]."'  ";
					$type_list_move .= " and ".$v."='".$record[$v]."'  ";
				}
			}
			
			if($x==1)//有切換分類
			{
				$tmp = "";
				$sql = "select * from ".$table." WHERE ".$type_list;
				$tmp = $conn->GetArray($sql);
				
				if($tmp_sort!=count($tmp))
				{
					$sql = "UPDATE ".$table." SET sort = sort - 1 
					WHERE ".$type_list." and sort > ".$tmp_sort;
					$conn->Execute($sql);//更新排序
				}
				
			
				$tmp = "";
				$sql = "select * from ".$table." WHERE ".$type_list_move;
				
				$tmp = $conn->GetArray($sql);
				
				$record["sort"] = count($tmp)+1;
				
				$tmp = "";
			}
		}
		
		
		
		if($include_set["sort"]=="")
		if($record[$class]!=$tmp[$class])
		{
			$tmp = "";
			$sql = "select * from ".$table." WHERE type='".quotes($record["type"])."' and ".$class."=".$tmp_class;
			$tmp = $conn->GetArray($sql);
			if($tmp_sort!=count($tmp))
			{
				$sql = "UPDATE ".$table." SET sort = sort - 1 
				WHERE type='".quotes($record["type"])."' and ".$class."=".quotes($tmp_class)." and sort > ".$tmp_sort;
				$conn->Execute($sql);//更新排序
			}
		
			$tmp = "";
			$sql = "select * from ".$table." WHERE type='".quotes($record["type"])."' and ".$class."=".$record[$class];
			$tmp = $conn->GetArray($sql);
			
			$record["sort"] = count($tmp)+1;
			
			$tmp = "";
		}
	
		$record["update_date"] = date("Y-m-d H:i:s");
		$record["update_name"] = $_SESSION["admin_info"]["account"];
				
		$where = "id=".$id;
		

		$conn->AutoExecute($table,$record,"UPDATE",$where);
		alert("修改完成",Page_get_url(''));
		exit;
	}
	else
	{
		if($close["add"]==1)
		{
			alert("不開放新增功能",Page_get_url('id'));
			exit;
		}
		
		$record["create_date"] = date("Y-m-d H:i:s");
		$record["create_name"] = $_SESSION["admin_info"]["account"];
				
		if($include_set["sort"]!="")
		{
			$tmp = "";
			foreach($include_set["sort"] as $k=>$v)
			{
				@$tmp["name"] .= $v.",";
				@$tmp["value"] .= $record[$v].",";
			}
			Sql_add($conn,$table,$record,substr($tmp["name"],0,-1),substr($tmp["value"],0,-1));
		}
		else
		{
			Sql_add($conn,$table,$record,'lang,type,class',$record["lang"].",".$record["type"].",".$record["class"]);
		}

		//$conn->AutoExecute($table,$record,"INSERT");
		alert("新增完成",Page_get_url('id'));
		exit;
	}
}





$sql = "select * from ".$table;
$sql .= " WHERE 1=1 and 
lang='".quotes($record["lang"])."' and 
type='".quotes($record["type"])."' and ";


$sql_count = "select COUNT(*) from ".$table;
$sql_count .= " WHERE 1=1 and 
lang='".quotes($record["lang"])."' and 
type='".quotes($record["type"])."' and ";



if(@$include_set["where"]!="")
{
	foreach($include_set["where"] as $k=>$v)
	{
		$sql .= $v." and ";
		$sql_count .= $v." and ";
	}
}



if($id || $id=='0')
{
	if($id=="lang")//不同語系 強制 選擇 明細頁
	{
		$sql .= " 1=1 ";
	}
	else
	{
		$sql .= " id=".$id;
	}	
	$data = $conn->GetRow($sql);
	
	foreach($data as $k=>$v)
		$data[$k] = deQuotes($v,-1);
	
	
	$style = @$include_set["style"];
	if(!$style) $style = "style_fck";
	
	foreach($data as $k=>$v) $data[$k] = deQuotes($v,-1);
	
	
	
	if( is_array($include_set["fck_set"]) )
	{
		foreach($include_set["fck_set"] as $k=>$v)
		{
			$data[$v."_fck"] = 
			Fck($v,'90%','450','../fckeditor/',deQuotes($data[$v],-1),"../../style/".$style.".css");
		}
	}
	else
	{
		$data["detail_fck"] = Fck("detail",'90%','450','../fckeditor/',deQuotes(@$data["detail"],-1),"../../style/".$style.".css");
	}
	
	
	
	
	$data["status_html"] = Make_radio($_SETUP["status"],@$data["status"],"status");
	
	//$data["pic"] = explode("|__|",$data["pic"]);
	
	$data["pic_list"] = Data_List_Pic(@$data["pic"]);
	$data["picmore_list"] = Data_List_Pic(@$data["picmore"]);

	
	/*
	foreach($data["pic"] as $k=>$v)
	{
		$data["pic_info"][$k] = explode(",",$v);
		$data["pic"][$k] = $data["pic_info"][$k]["0"];
		$data["pic_info"][$k]["width"] = $data["pic_info"][$k]["1"];
		$data["pic_info"][$k]["height"] = $data["pic_info"][$k]["2"];
	}
	if($include_set["pic_resize"]!="")
		$data["pic_resize"] = $include_set["pic_resize"];//縮圖比例調整
	else
		$data["pic_resize"] = 1;//縮圖比例調整
	*/
	
	$data["one"] = $data;
	
	$_SESSION["admin_info"]["view"] = "detail";
	
}
else
{
	$start_limit = ($page-1) * $per_page_qty;
	$end_limit = $per_page_qty; 
	$all_data = $conn->GetArray($sql." 1=1 ");
	include("search_data.php");
	
	
	if($include_set["order_by"]!="")
	{
		$sql .= " 1=1 ".$include_set["listtype"]." order by ";
		foreach($include_set["order_by"] as $k=>$v)
			@$sql .= $v." ".$include_set["desc"][$k].",";
			
		$sql = substr($sql,0,-1);
		
		$sql .= " limit ".$start_limit.",".$end_limit;
	}
	else
	{
		$sql .= " 1=1 order by sort limit ".$start_limit.",".$end_limit;
	}
	

	$sql_count .= " 1=1 ";
	
	$data = $conn->GetArray($sql);


	foreach($data as $k=>$v)
	foreach($v as $k2=>$v2)
		$data[$k][$k2] = deQuotes($v2,-1);
	
	
	if($include_set["detail"]==1) {LinkTo(Page_get_url('')."&id=".$data[0]["id"]);exit;}//跳到顯示明細頁 只顯示一筆資料
	
	$page_count = count($data);
	$all = $conn->GetRow($sql_count);
	$all = $all["0"];
	

	foreach($data as $k => $v)
	{
		foreach($v as $k_2 => $v_2)
		{
			$data[$k][$k_2] = $v_2;//存入新陣列 給與 smarty section 使用
			$data[$k]["status_html"] = Make_radio($_SETUP["status"],$v["status"],"status_".$v["id"]);
		}

		
		$data[$k]["pic_list"] = Data_List_Pic($v["pic"]);
		
		/* 用 Data_List_Pic 取代 
		$tmp = "";
		$tmp = explode("|__|",$v["pic"]);
		foreach($tmp as $pic_k=>$pic_v)
		{
			$data[$k]["pic_info"][$pic_k] = explode(",",$pic_v);
			$data[$k]["pic"] = "";
			$data[$k]["pic"][$pic_k] = $data[$k]["pic_info"][$pic_k]["0"];
			$data[$k]["pic_info"][$pic_k]["width"] = $data[$k]["pic_info"][$pic_k]["1"];
			$data[$k]["pic_info"][$pic_k]["height"] = $data[$k]["pic_info"][$pic_k]["2"];
		}
		if($include_set["pic_resize"]!="")
			$data[$k]["pic_resize"] = $include_set["pic_resize"];//縮圖比例調整
		else
			$data[$k]["pic_resize"] = 1;//縮圖比例調整
		*/
		
		
		//計算同分類class數量 排序按鈕用
		if($include_set["sort"]!="")
		{
			$x=0;
			foreach($all_data as $k2=>$v2)
			{
				$y=1;
				foreach($include_set["sort"] as $k_sort=>$v_sort)
				{
					if($v2[$v_sort]!=$data[$k][$v_sort]) $y = 0;
				}
				if($y==1) $x++;
			}
		}
		else
		{
			$x=0;
			foreach($all_data as $k2=>$v2)
			if($v2["class"]==$data[$k]["class"]) $x++;
		}
		
		
		if( count( explode("?",Get_Url( array() )) )>1 ) {$link = "&";}else{$link = "?";}

		if($include_set["sort"]!="")
		{
			/*$location = Get_Url(array()).$link.'&sort_id='.$v["id"];
			foreach($include_set["sort"] as $k_sort=>$v_sort)
				$location .= "&".$v_sort."=".quotes($data[$k][$v_sort]);*/
				
			$location = "?";
			if(@$_GET)
			foreach($_GET as $k2=>$v2) $location .= $k2."=".$v2."&";
			$location .= "sort_id=".$v["id"]."&";
			
		}
		else
		{
			//$location = Get_Url(array()).$link.'&sort_id='.$v["id"].'&class='.$v["class"];
			
			$location = "?";
			if(@$_GET)
			foreach($_GET as $k2=>$v2) $location .= $k2."=".$v2."&";
			$location .= "sort_id=".$v["id"]."&";
		}
		
		if($v["sort"]!=$x)
		{
			$data[$k]["down"] = 
			'<img style="cursor:pointer;" onclick="location=\''.$location.'sort_set='.($v["sort"]+1).'\'" src="images/down_btn.jpg" />';
			 
			if($v["sort"]==1) 
			$data[$k]["up"] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		if($v["sort"]!=1) 
		{
			$data[$k]["up"] = 
			'<img style="cursor:pointer;" onclick="location=\''.$location.'sort_set='.($v["sort"]-1).'\'" src="images/up_btn.jpg" />';
		}
		
		
		$sort_idx = array();
		$sort_val = array();
		
		$sort_idx = implode(",",$include_set["sort"]);
		if( is_array($include_set["sort"]) )
		{
			foreach($include_set["sort"] as $s_k=>$s_v) $sort_val[] = $v[ $s_v ];
			$sort_val = implode(",",$sort_val);
		}
		else
		{
			$sort_val[] = $v["class"];
			$sort_val = implode(",",$sort_val);
		}
		
		
		//$sort_val = "'".$v["id"]."','".$_SESSION["admin_info"]["table"]."','".$_SESSION["admin_info"]["page"]."','ajx_sort.php','".$sort_idx."','".$sort_val."','".$_SESSION["admin_info"]["search"]["post"]."'";
		$sort_val = $v["id"];
		
		
		$data[$k]["sort_input"] = 
		'
		<input type="text" name="sort_'.$v["id"].'" id="sort_'.$v["id"].'" size="2" value="'.$v["sort"].'"
		onblur="Sort_set(\''.$sort_val.'\',this.value);">
		';
		
		
		
	}
	$tmp = "";
	
	
	
	//$tpl->assign("page_table",Page_table($data,$per_page_qty));
	//$tpl->assign("page_table",Page_table_class($data,$page,$per_page_qty));
	$tpl->assign("page_table",Page_table_limit($all,$page_count,$page,$per_page_qty));

	
	$data["list"] = $data;
	
	$_SESSION["admin_info"]["view"] = "list";
	
}

?>