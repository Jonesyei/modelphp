<?php
$table	= $cpos["table"];
$id		= quotes($_GET["id"]);	//-本資料
$mode	= quotes($_GET["mode"]); //-母樹
$max	= 0;
//明細
if($id!="")
{
	//--母類資料
	$main_data = $conn->GetRow("select * from ".$table." where id='".$mode."'");
	$max = $main_data["max_count"];
	
	//--分類樹資料
	$tree_data_type=display_tree($mode,$conn,$table,0,0," and lang='".LANG."'");	//-分類資料
	if ($tree_data_type)
		foreach ($tree_data_type as $k=>$v){
			if ($id!=$v["id"]&&$v["depth"]*1<$max){
				$spce = '';
				for($i=0;$i<=$v["depth"];$i++) $spce .= '&nbsp;&nbsp;&nbsp;';
				$tree_array[$v['id']] = $spce.$v['name'];
			}
		}
	
	//-資料送出處理
	if ($_POST){
		//--更動資料時依照排序寫入
		$cpos["listorderby"] = "sort";
		
		if ($_POST["parent_id"]==NULL || $_POST["parent_id"]=='') $_POST["parent_id"]=$mode;
		//-取得詳細分支資訊 
		$temp = $conn->GetRow("select * from ".$table." where id='".$_POST["parent_id"]."'");
		$_POST["root_id"] = $temp["root_id"];
		$_POST["depth"] = ($temp["depth"]*1+1);
	}
	
		
}
else//列表頁
{
	if ($_POST){
		//--更動資料時依照排序寫入
		$cpos["listorderby"] = "sort";
	}
}


	

//--重新排序
function cate_mode_reload($parent_id,$step=0,$conn,$table,$depth=1){
	$temp = $conn->GetArray("select * from ".$table." where parent_id='".$parent_id."' order by sort");
	if ($temp){
		foreach ($temp as $k=>$v){
			$step += 1;
			$avalue = $conn->Execute("UPDATE ".$table." SET lft=".$step.",depth='".$depth."' where id='".$v["id"]."'");
			$step = cate_mode_reload($v["id"],$step,$conn,$table,$depth+1);
			$step += 1;
			$avalue = $conn->Execute("UPDATE ".$table." SET rgt=".$step." where id='".$v["id"]."'");
		}
	}
	
	$avalue = $conn->Execute("UPDATE ".$table." SET rgt=".($step+1)." where id='".$parent_id."'");
	return $step;
}
?>





