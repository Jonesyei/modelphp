<?php
$console->load->module('analytics');
$console->load->module('foor');
$console->module->analytics($console->conn);


$mount = 10; //設立預設每頁資料筆數
$sql = "select * from ".PREFIX."data_list where type='".quotes($_GET["j_set_patten"])."' and status='1' order by sort"; //--gk4uxu4
$data["list"] = $console->conn->GetArray($sql." limit ".($_GET["page"]-1)*$mount.",".$mount); //-畫面比數擷取 $_GET["page"] 預設為1
if ($data["list"])
foreach ($data["list"] as $k=>$v)
	$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
	
//--分頁內容
/* $return = page_show($cousql,$mount);
	常用分頁結果變數如下
	$return["wd_page"]; //-含頁碼設計師常用已切完版檔案
	$return["wd_rwd_page"]; //-不含頁碼設計師常用RWD已切完版檔案
	
*/
$cousql = str_replace('*','count(*)',$sql); //--計算總筆數的SQL語句
$data["page"] = page_show($cousql,$mount);	//--產生分頁結果變數

if ($_GET["id"]==NULL) {//--沒資料預設
	$data["one"] = $data["list"][0];
}else{
	$data["one"] = $console->conn->GetRow("select * from ".PREFIX."data_list where type='".quotes($_GET["j_set_patten"])."' and id='".quotes($_GET["id"])."'");
	$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
}

$console->module->foor();
?>