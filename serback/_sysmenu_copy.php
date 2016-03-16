<?php
/*
	結構樹 資料拷貝 多語系
	create by Jones 2015/07/08
*/
$jcopy["table"] = PREFIX."sysmenu";
$jcopy["auth_table"] = PREFIX."admin_group";

//--取得權限資料表欄位
unset($row_colum_key);
unset($row_colum_type);
foreach ($conn->GetArray("desc ".$jcopy["auth_table"]) as $a=>$b) {$row_colum_key[] = $b[0];$row_colum_type[] = $b[1];}//--擷取資料表所有欄位

$workdata = explode(',',$_GET["copy"]);
if ($workdata)
	foreach ($workdata as $k=>$v){
		//--刪除所有
		if ($conn->GetRow("select * from ".$jcopy["table"]." where lang ='".$v."'")){
			$conn->Execute("DELETE FROM ".$jcopy["table"]." WHERE lang ='".$v."'");
		}
	}
if ($workdata)
foreach ($workdata as $k=>$v){
	
	//--先拉出語系中所有資料內容
	$jdata = j_take_tree('',$_SESSION["admin_info"]["lang"]);
	
	//--最大樹編號
	$jmaxlv = $conn->GetRow("select Max(lv) as lv from ".$jcopy["table"]);
	$jmaxlv = $jmaxlv["lv"]*1;
	

	//--建立資料結構
	$lv_data = j_create_tree($jdata,$v);
	

	//--處理相同權限問題
	//--取得所有欄位資料表 自動生成沒有的AUTH
	if (!in_array('auth_'.$v,$row_colum_key)){
		$conn->Execute("ALTER TABLE ".quotes($jcopy["auth_table"])." ADD `".quotes('auth_'.$v)."` TEXT NULL COMMENT '程式生成欄位'"); //-沒欄位則新增
	}
		//--取得所有群組
		$admin_group = $conn->GetArray("select * from ".quotes($jcopy["auth_table"])."");
		if ($admin_group)
			foreach ($admin_group as $a=>$b){
				unset($insert_lv_data);
				$lv_have_data = explode(',',$b["auth_".$_SESSION["admin_info"]["lang"]]);
				foreach ($lv_have_data as $x=>$y){
					$insert_lv_data[] = $lv_data[$y];
				}
				$conn->Execute("UPDATE ".quotes($jcopy["auth_table"])." SET `auth_".$v."`='".implode(',',$insert_lv_data)."' where id='".$b["id"]."'");	//--權限結構複製
			}


}
alert('已複製結構樹資料!!','./');
exit;









//*擷取樹狀結構*/
function j_take_tree($id,$lang) {
	global $conn;
	global $_SESSION;
	global $jcopy;
	
	$where = " where lang='".$lang."' ";
	
	if ($id!='' && $id!=NULL)
		$where .= " and parents='".$id."'";
	else
		$where .= " and parents='0'";
	
	$temp = $conn->GetArray("select * from ".$jcopy["table"].$where);
	if ($temp) {
		foreach ($temp as $k=>$v){
			$temp[$k]['child'] = j_take_tree($v['lv'],$lang);
		}
	}
	return $temp;
}


//*建立結構樹*/
function j_create_tree($data,$lang,$parents=0){
	global $conn;
	global $_SESSION;
	global $jcopy;
	global $jmaxlv;
	
	$lv_data = array(); //--存放個個資料交換LV的結果
	
	if ($data)
		foreach ($data as $k=>$v){
			$jmaxlv++;
			$upd = $v;
			$lv_data[$v['lv']] =$jmaxlv;
			unset($upd["child"]);
			unset($upd["id"]);
			$upd['lv'] = $jmaxlv;
			$upd['parents'] = $parents;
			$upd['lang'] = $lang;
			$upd["create_date"] = $upd["update_date"] = date("Y-m-d H:i:s");
			$upd["create_name"] = $upd["update_name"] = $_SESSION["admin_info"]["account"];
			$avalue = $conn->AutoExecute($jcopy["table"],$upd,"INSERT");
			//-有子資料
			if ($v["child"]!=NULL && is_array($v["child"]) && count($v["child"])>0){
				$child_lv_data = j_create_tree($v["child"],$lang,$jmaxlv);
				$lv_data = $lv_data+$child_lv_data;
			}
		}
	return $lv_data;
}

?>




