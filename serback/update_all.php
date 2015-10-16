<?php
	
	//抓出mysql全部舊資料
	/*
	$sql_all = "select * from ".$table;
	$all_tmp = $conn->GetArray($sql_all);
	*/
	$data_id = $all_data_id = $class_list = $all_tmp = $class_count = $class_count_old = "";
	
		
	$type = $record["type"];
	
	unset($record["type"]);
	unset($record["act"]);
	unset($record["lang"]);
	
	//將POST之資料組成array
	foreach($record as $k=>$v)
	{
		$data_id = explode("_",$k);
		
		$now_id = $data_id[count($data_id)-1];
		
		$data_idx = "";
		unset($data_id[count($data_id)-1]);
		$data_idx = implode("_",$data_id);
		
		
		$data[ $now_id ][ $data_idx ] = $v;
	}
	
	
	//有更改的資料開始一筆一筆進行update
	if($data)
	foreach($data as $k=>$v)
	{
		$v["update_date"] = date("Y-m-d H:i:s");
		$v["update_name"] = $_SESSION["admin_info"]["account"];
		$where = "id=".$k;
		
		$conn->AutoExecute($table,$v,"UPDATE",$where);
	}
	
	alert("修改完成",Page_get_url(''));
	exit;

?>