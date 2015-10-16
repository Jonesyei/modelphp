<?php
$localhost_ary = array('127.0.0.1:81','192.168.1.108:81','localhost:81');

//VIPCASE 本機 or 線上 判斷 MYSQL 連線

if( in_array($_SERVER["HTTP_HOST"],$localhost_ary) )
{
	$localhost = $_SERVER["SCRIPT_NAME"];
	$localhost = explode("/",$localhost);
	$localhost = $localhost["1"];
	
	define('PREFIX',$localhost."_");


	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "000000";
	$dbData = $localhost;
}
else
{	
	define('PREFIX','shenguyu_');
	
	$dbHost = "203.69.42.12";
	$dbUser = "L89959405";
	$dbPass = "29049452";
	$dbData = "DBL02891";
	
	
}


//連線到資料庫	
$conn = ADONewConnection('mysql');
$conn->debug=false;
$conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);


//設定utf8編碼
$conn->Execute("SET NAMES utf8;");
$conn->Execute("SET CHARACTER_SET_CLIENT=utf8;");
$conn->Execute("SET CHARACTER_SET_RESULTS=utf8;");






?>