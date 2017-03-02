<?php


//-- 字串陣列查詢語句返回
function array_sql_search($row,$data){
	if ($data)
		return " and (".$row." like '%|".quotes($data)."|%' or ".$row." like '%|".quotes($data)."' or ".$row." like '".quotes($data)."|%' or ".$row."='".quotes($data)."')";
	else
		return '';
}

/*
	依分類條件排序顯示
	ex:
	$sql = "select * from table"; //--只能做單個資料表操作
	orderbysort($sql語句,array('class'=>$_GET["class"],'第二個KEY'=>'第二個值'),鍵值)
*/
function orderbysort($sql,$patten,$rowkey='id'){
	global $_SESSION;
	global $conn;
	$temp_patten='';
	foreach ($patten as $k=>$v){
		$temp_patten.=$k.$v;
	}
	
	//--查詢語句處理
	$sql = explode('order by',strtolower($sql));
	$data_sql = $sql = $sql[0];
	$sql = str_replace('*',$rowkey,$sql);
	
	//--先查詢所有資料id
	$item_list = $conn->GetArray($sql);
	if ($item_list)
		foreach ($item_list as $k=>$v)
			$item_array[] = $v[$rowkey];
	
	//--處理將輸出的sql
	$false_sql = $data_sql;
	$data_sql = explode('where',$data_sql);
	$data_sql = $data_sql[0];

	//--判斷是否含有設定排序資料確認
	if (!$item_array) { 
		echo $sql.'<BR>sql 語句中，未取得任何資料項目';
		return $false_sql.' ORDER BY sort';
	}else
		$cpos_sort_check = $conn->GetArray('select data_id from '.PREFIX.'centerpoes_sort where data_id in ('.implode(',',$item_array).') and keyset="'.$temp_patten.'" and lang="'.$_SESSION["admin_info"]["lang"].'" order by sort');
		
	if ($cpos_sort_check){
		foreach ($cpos_sort_check as $k=>$v){
			$feild[] = $v["data_id"];
		}
		return $data_sql.' WHERE '.$rowkey.' IN ('.implode(',',$item_array).') ORDER BY FIELD(`'.$rowkey.'`,'.implode(',',$feild).')';
	}else{
		return $false_sql.' ORDER BY sort';
	}
}
?>