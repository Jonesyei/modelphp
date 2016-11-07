<?php
$console->load->module('foor');

//edm			
$temp = $console->conn->GetRow("select * from ".PREFIX."data_list where type='EDM'".$lang);
$data["EDM"] = json_encode(explode('|__|',dequotes($temp["pic"],-1)));
$data["href"] = json_encode(explode('|__|',dequotes($temp["href"],-1)));

$console->module->foor();
$console->module->foor
->set('data',$data)
->set('member_info',@$_SESSION["member_info"])
->set('cookie',@$_COOKIE["cookie"])
->set("setup", $_SETUP)//config設定檔
->set("content",@$content)
->set("web_set",@$web_set)
->set("lang",@$_SESSION["mode_lang"]);
$console->module->foor->work();
?>