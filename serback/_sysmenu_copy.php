<?php
/*
	結構樹 資料拷貝 多語系
	create by Jones 2015/07/08
*/
$jcopy["table"] = PREFIX."sysmenu";

//--先拉出語系中所有資料內容
$jdata = j_take_tree('',$_SESSION["admin_info"]["lang"]);

//--最大樹編號
$jmaxlv = $conn->GetRow("select Max(lv) as lv from ".$jcopy["table"]);
$jmaxlv = $jmaxlv["lv"]*1;

//--建立資料結構
j_create_tree($jdata,$_GET["copy"]);

alert('已複製結構樹資料!!',now_url('copy'));
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
	
	if ($data)
		foreach ($data as $k=>$v){
			$jmaxlv++;
			$upd = $v;
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
				j_create_tree($v["child"],$lang,$jmaxlv);
			}
		}
}

?>




