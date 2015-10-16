<?php
/*
	後台數據引導使用
	@2015 create and edit by Jones
*/

//$record["create_date"] = date("Y-m-d H:i:s");



//資料table,$_POST資料,分類排序之欄位名稱,分類排序之欄位之值   <新增資料>
function Sql_add($conn,$table,$post,$type = NULL,$type_value = NULL)
{		
	$record= array();
	foreach($post as $k => $v)
		$record[$k]=($v);
			
	$record["sort"] = 1 ;
	
	$sql = "UPDATE ".$table." SET sort = sort + 1 where 1 = 1 and ";
	
	
	
	if($type!=NULL) //插入 WHERE 的條件
	{
		$type = explode(",",$type);
		$type_value = explode(",",$type_value);
		
		if(count($type)>1)
		{	
			foreach($type as $k => $v)
				$sql .= $v ." = '".($type_value[$k])."' and ";
		}
		else
		{
			$sql .= $type[0] ." = '".($type_value[0])."' and ";
		}
	}
	$sql .= " 1 = 1 ";
	
	
	$conn->Execute($sql);//更新排序
	
	$conn->AutoExecute($table,$record,"INSERT");
}

//選擇資料之id,資料table,更新之post  <更新資料>
function Sql_upd($conn,$id,$table,$post)
{	
	$record= array();
	foreach($post as $k => $v)
		$record[$k]=($v);

	unset($record["sort"]);//暫時不開放明細頁SORT(排序)設定
	
	if(count(explode(",",$id))>1)
		$where = " id in (".($id).")";
	else
		$where = " id =".($id);

	$conn->AutoExecute($table,$record,"UPDATE",$where);
}

//選擇資料之id,資料table,分類排序之欄位名稱,分類排序之欄位之值  <刪除資料>
function Sql_del($conn,$id,$table,$type = NULL,$type_value = NULL)
{	
	$id_str = explode(",",$id);
	foreach($id_str as $k => $v)
	{
		$sql="select * from ".$table." WHERE id = ".($v);
		$sort = $conn->GetRow($sql);

		$sql = "UPDATE ".$table." SET sort = sort-1 WHERE sort > ".($sort['sort'])." and "; //更新其餘資料的sort

		if($type!=NULL) //插入 WHERE 的條件
		{
			$type_temp = explode(",",$type);
			//$type_value_temp = explode(",",$type_value);
			
			if(count($type_temp)>1)
			{	
				foreach($type_temp as $k => $v)
					$sql .= $v ." = '". $sort[$v]."' and ";
			}
			else
			{
				$sql .= $type_temp[0] ." = '". $sort[ $type_temp[0] ] ."' and ";
			}
		}
	
		$sql .= " 1 = 1 ";
		
		
		$conn->Execute($sql);

		$sql="delete from ".$table." where id =".($sort['id']); //刪除資料

		$conn->Execute($sql);	
	}
}

?>