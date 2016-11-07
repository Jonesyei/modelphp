<?php
	
define('PREFIX',"buysystem2_");
$dbHost = "localhost";
$dbUser = "wdnet";
$dbPass = "2d4a^V[A~,vA";
$dbData = "wdnet_champmask";


//連線到資料庫	
$conn = ADONewConnection('mysql');
$conn->debug=false;
$conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);
$connect_check = $conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);
if (!$connect_check) {
	$check_file = explode('/',$_SERVER["PHP_SELF"]);
	
	$no_scn_array = array('serback');
	
	if ($check_file[count($check_file)-1]!='setup.php'){
		unset($check_file[count($check_file)-1]); //移除最後檔案名稱字段
		if (count($check_file)>0)
			foreach ($check_file as $k=>$v){
				if (in_array($v,$no_scn_array)) unset($check_file[$k]);
			}
		echo '<script>if (confirm("db connect of error . Do you setting , now?")) window.location.href="'.implode('/',$check_file).'/setup.php";</script>';
	}
}


//設定utf8編碼
$conn->Execute("SET NAMES utf8;");
$conn->Execute("SET CHARACTER_SET_CLIENT=utf8;");
$conn->Execute("SET CHARACTER_SET_RESULTS=utf8;");





?>