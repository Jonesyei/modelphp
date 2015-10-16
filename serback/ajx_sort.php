<?php
include_once("../includes/main_back_inc.php");


$table = quotes($_GET["table"]);
$id = quotes($_GET["id"]);
$sort = quotes($_GET["sort"]);


$type = quotes($_GET["type"]);
$type_value = quotes($_GET["type_value"]);


$type_array = explode(",",$type);//轉成Array
$type_value_array = explode(",",$type_value);//轉成Array


$reset = 0;
foreach($type_array as $k => $type_name)
{
	$sql_add .= " and ".$type_name." = '".$type_value_array[$k]."' ";
	
	//為了sysmenu_set add
	if($type_name=="floor" && $type_value_array[$k]=="0")
		$reset = 1;
}
if($reset=="1")
	$sql_add = " and floor='0' ";



$sql="select count(*) from ".$table." where 1 = 1 ";  if($type!=NULL) $sql .= $sql_add;
$sort_max = $conn->Execute($sql)->fields;
//print_r( $sort_max[0] ); // sort最大值=資料筆數


$sql="select * from ".$table." where id = '".quotes($id)."'";
$sort_now = $conn->Execute($sql)->fields;

$sort_now = $sort_now["sort"];//現在的sort
$sort_bef = $sort;//變更後的sort


//if($sort_now == $sort_bef) exit; //沒變更sort 直接exit;


if($sort_bef > $sort_max[0]) $sort_bef = $sort_max[0];
if($sort_bef < 1) $sort_bef = 1;

//$update = date("Y-m-d H:i:s");
//$upname = $_SESSION['admin_info']['account'];

if($sort_bef > $sort_now)//如果修改後sort比修改前sort大的話 = 順位往下移
{
	$sql="UPDATE ".$table." SET 
	sort = sort-1 
	WHERE sort > ".quotes($sort_now)." and sort <= ".quotes($sort_bef); if($type!=NULL) $sql .= $sql_add;
}
else
{
	$sql="UPDATE ".$table." SET 
	sort = sort + 1 
	WHERE sort < ".$sort_now." and sort >= ".$sort_bef; if($type!=NULL) $sql .= $sql_add;
}

$conn->Execute($sql);


$sql="UPDATE ".$table." SET 
	sort='".$sort_bef."' WHERE id = '".quotes($id)."' ";
$conn->Execute($sql);

//更新欲移動資料分類底下的所有資料的class_sort
$sql = "UPDATE ".$table." SET class_sort=".quotes($sort_bef)." WHERE class = ".quotes($id);
$conn->Execute($sql);



//$sql = " UPDATE ".$table." SET sort = '".$sort_max[0]."' WHERE sort > ".$sort_max[0]; if($type!=NULL) $sql .= $sql_add;
//$conn->Execute($sql);

?>