<?php
include_once("head.php");


if ($_GET["check_password"]){
	echo '密碼強度: '.password_security($_GET["check_password"]).' / 10(最高)';
	exit;
}

//---驗證碼確認
if ($_GET["vcode"]){
	if(md5($_GET["vcode"])!=$_SESSION["__validate_code"])
	{
		echo '驗證碼錯誤!!';
	}else{
		$temp = $conn->GetRow($conn->Prepare("select * from ".PREFIX."member where account=? or email=?"),array($_GET["account"],$_GET["email"]));
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