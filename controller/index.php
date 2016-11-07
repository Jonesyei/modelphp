<?php
$console->load->module('foor');
//--首頁最新消息
$lang = ' and lang="'.$_SESSION["mode_lang"].'"';
$data["title_img"] = $_SETUP["title_img"][$_GET["j_set_patten"]];
$temp = $console->conn->GetArray("select * from ".PREFIX."data_list where type='news'".$lang." order by sort");
$data["news"] = $temp;

//edm			
$temp = $console->conn->GetRow("select * from ".PREFIX."data_list where type='EDM'".$lang);
$data["EDM"] = explode('|__|',dequotes($temp["pic"],-1));

//QRCODE DEMO
QRcode::png('14111','upload/demo.png', QR_ECLEVEL_L); 
//echo '<img src="upload/demo.png" />'; 
$console->module->foor();
?>