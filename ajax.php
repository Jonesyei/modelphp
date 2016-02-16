<?php
include_once("head.php");

//---驗證碼確認
if ($_GET["vcode"]){
	if(md5($_GET["vcode"])!=$_SESSION["__validate_code"])
	{
		echo '驗證碼錯誤!!';
	}else{
		$temp = $conn->GetRow("select * from ".PREFIX."member where account='".$_GET["account"]."' or email='".$_GET["email"]."'");
		if ($temp){
			echo '帳號或者email資料重複!!';
		}else{
			echo 'ok';
		}
	}
}

if ($_GET["type"]){
	switch ($_GET["type"]){
		case "serback_editor":
			//--取得當前語系選單編輯
			$data = $conn->GetArray("select * from ".PREFIX."sysmenu where floor>0 and selector is not null and selector !='' and ifview='1'");
			echo json_encode($data);
		break;
	}
	exit;
}


?>