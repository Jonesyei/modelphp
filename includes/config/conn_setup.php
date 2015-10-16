<?php
	
define('PREFIX',"%dname%_");
$dbHost = "%localhost%";
$dbUser = "%root%";
$dbPass = "%passwrod%";
$dbData = "%database%";


//連線到資料庫	
$conn = ADONewConnection('mysql');
$conn->debug=false;
$conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);
$connect_check = $conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);
if (!$connect_check) {
	echo '<script>if (confirm("db connect of error . Do you setting , now?")) window.location.href="./setup.php";</script>';
}


//設定utf8編碼
$conn->Execute("SET NAMES utf8;");
$conn->Execute("SET CHARACTER_SET_CLIENT=utf8;");
$conn->Execute("SET CHARACTER_SET_RESULTS=utf8;");





?>