<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

$record["type"] = Now_file();


$cpos["pagecount"] = 30; //每頁顯示筆數
//$cpos["tablelistwhere"] = "WHERE type='banner'";//列表顯示資料的條件
$cpos["table"] = PREFIX."member";
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["listorderby"] = 'create_date desc';//列表頁排序方式
$cpos["search"] = array('name'=>'keyword','account'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass');
$_SESSION["admin_info"]["file_url"] = $cpos["file_url"] = "../upload/member/";





$close["add"]	= 1;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 1;


if ($_POST["password"]=="" || $_POST["password"]==NULL)
	unset($_POST["password"]);
else
	$_POST["password"] = md5($_POST["password"]);


//--判斷EMAIL資料是否重複
if ($_POST["email"]){
	$sql = "select * from ".$cpos["table"]." where email='".$_POST["email"]."'";
	if ($id=='0') {$testmun = 0;}else{$testmun = 1;}
	if (count($conn->GetArray($sql))>$testmun){
		alert('email 資料輸入重複!!',-1);
		exit;
	}
}

include_once("centerpoes.php");


//--會員分類
$member_typelist = $conn->GetArray('select * from '.PREFIX."data_list where type='memberdesh' and status=1");
if ($member_typelist){
	foreach ($member_typelist as $k=>$v){
		$array_typem[$v['new_type']] = $v['name'];
	}
}
$type_output = str_replace('"',"'",json_encode(array('type'=>$array_typem)));
$sex_output = str_replace('"',"'",json_encode(array('sex'=>array('0'=>'女','1'=>'男'))));

//--匯出資料
$data["output_title"] = array('編號','帳戶','姓名','帳戶類型','性別','email','身分證字號','生日','電話','地址');
$data["output_row"] = array('id','account','name',$type_output,$sex_output,'email','id_num','birthday','phone','address');
$data["cpos"] = $cpos;
//---------

if($id || $id=='0')
{
	$data["one"]["sex_html"] = create_input("sex",$_SETUP["sex"],$type="radio",$data["one"]["sex"]);
	
	$data["one"]["type_html"] = Make_radio($array_typem,$data["one"]["type"],'type');


}
else
{
	$member_typelist = $conn->GetArray('select * from '.PREFIX."data_list where type='memberdesh' and status=1");
	if ($member_typelist)
		foreach ($member_typelist as $k=>$v){
			$array_typem[$v['new_type']] = $v['name'];
		}

	foreach($data["list"] as $k=>$v){
		$data["list"][$k]["mode_html"] = $array_typem[$v["type"]];
		$data["list"][$k]["sex_html"] = $_SETUP["sex"][$v["sex"]];
	}
	
}


$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);

include_once("index.php");//assign 所有資料、共用頁面



$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>