<?php
$console->load->module('foor');

if ($console->path[3] && $console->path[3]!='detail') $_GET["page"] = $console->path[3];
if ($console->path[3]!='detail') $console->path[3] = $_GET["page"];

$data["cate"] = $console->conn->GetArray("select * from ".PREFIX."category where root_id='1' and depth>0 and status=1 order by sort");

if ($console->path[1]!=NULL && $console->path[1]!='all'){
	$cid = explode('_',$console->path[1]);
	$cid = $cid[0];
	$data["cate_one"] = $console->conn->GetRow("select * from ".PREFIX."category where id='".$cid."'");
}


$mount = 10; //設立預設每頁資料筆數
if ($cid=='search')
	$sql = "select * from ".PREFIX."products where status='1' and (name like '%".quotes($_GET["keyword"])."%' or p_no like '%".quotes($_GET["keyword"])."%') order by sort"; //--gk4uxu4
else
	$sql = "select * from ".PREFIX."products where status='1' ".array_sql_search('class',$cid)." order by sort"; //--gk4uxu4

$data["list"] = $console->conn->GetArray($sql." limit ".($_GET["page"]-1)*$mount.",".$mount); //-畫面比數擷取 $_GET["page"] 預設為1
if ($data["list"])
foreach ($data["list"] as $k=>$v){
	$data["list"][$k]["pic"] = explode('|__|',$v["pic"]);
	$data["list"][$k]["detail"] = dequotes($v["detail"],-1);
	$data["list"][$k]["memo"] = dequotes($v["memo"],-1);
}
	
//--分頁內容
/* $return = page_show($cousql,$mount);
	常用分頁結果變數如下
	$return["wd_page"]; //-含頁碼設計師常用已切完版檔案
	$return["wd_rwd_page"]; //-不含頁碼設計師常用RWD已切完版檔案
	
*/
$cousql = str_replace('*','count(*)',$sql); //--計算總筆數的SQL語句
$data["page"] = page_show($cousql,$mount);	//--產生分頁結果變數

if ($console->path[2]!='detail') {//--沒資料預設
	$data["one"] = $data["list"][0];
}else{
	$data["one"] = $console->conn->GetRow("select * from ".PREFIX."products where id='".quotes($console->path[3])."'");
	$data["one"]["pic"] = explode('|__|',$data["one"]["pic"]);
	$data["one"]["detail"] = dequotes($data["one"]["detail"],-1);
	$data["one"]["memo"] = dequotes($data["one"]["memo"],-1);
}
if ($cid=='search'){
	$cid = explode('|__|',$data["one"]["class"]);
	$cid = $cid[0];
}


$data["rand"] = $console->conn->GetArray("select * from ".PREFIX."products where status='1' and id !='".$data["one"]["id"]."' ".array_sql_search('class',$cid)." order by rand() limit 8");
if ($data["rand"])
	foreach ($data["rand"] as $k=>$v){
		$data["rand"][$k]["pic"] = explode('|__|',$v["pic"]);
	}



$console->module->foor();
$console->module->foor->set(array(
	'data'=>$data,
	'member_info'=>@$_SESSION["member_info"],
	'cookie'=>@$_COOKIE["cookie"],
	'setup'=>$_SETUP,
	'content'=>@$content,
	'web_set'=>@$web_set,
	'lang'=>@$_SESSION["mode_lang"]
));
$console->module->foor->work();
?>