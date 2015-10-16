<?php
include_once("../main_inc.php");
/*
$member["id"] = X; //--會員資料 參數
$member["other_account"] = 'x'; //其他榜定欄位 名稱
$member["other_type"] = 'x'; //其他榜定帳戶類型 欄位名稱
$member["data"] = $_SESSION["member_info"]["login"]; //登入資料源
$member["file_url"] = 'upload/'; //檔案上傳目錄
*/
$member["data"] = $_SESSION["member_info"]["login"];


if ($member["table"]==NULL) $member["table"] = PREFIX.'member';
if ($member["id"]==NULL) $member["id"] = $_GET["id"];
if ($member["file_url"]==NULL) $member["file_url"] = 'upload/';

if ($_GET && !$_POST){
	///----使用id拉資料
	if ($_GET["id"]!=NULL){
		if ($member["data"]["id"]!=NULL && $member["data"]["id"]==$_GET["id"]){
			$sql = "select * from ".$member["table"]." where id=".$member["id"];
			$data["one"] = $conn->GetRow($sql);
		}else{
			//--本身沒有ID資料卻拉ID資料 表示來源不合法
			linkto(-1);
		}
	}
	
	//---使用帳戶登入
	if ($_GET["account"]!=NULL){
		$sql = "select * from ".$member["table"]." where account='".strtolower(quotes($_GET["account"]))."' and password='".md5($_GET["password"])."'";
		$data["one"] = $conn->GetRow($sql);
	}
	
	//---使用綁定登入方式
	if ($_GET["other_account"]!=NULL){
		$sql = "select * from ".$member["table"]." where ".$member["other_account"]."='".quotes($_GET["other_account"])."' and ".$member["other_type"]."='".$_GET["other_type"]."'";
		$data["one"] = $conn->GetRow($sql);
	}
	
	//---使用email登入方式
	if ($_GET["email"]!=NULL){
		$sql = "select * from ".$member["table"]." where email='".quotes($_GET["email"])."' and password='".md5($_GET["password"])."'";
		$data["one"] = $conn->GetRow($sql);
	}
	
	if ($data["one"]){
		$member_data = $data["one"];
		$_SESSION["member_info"]["login"] = $data["one"];
		if ($_GET["ajax"]!=NULL){
			echo json_encode($data["one"]);
			exit;
		}else{
			linkto(-1); //反回;
		}
	}else{
		//---無資料處理方式
		linkto(-1); //反回;
	}
}

if ($_POST){
	
	//---------檔案上傳 直接一起寫入post
	foreach ($_FILES as $k=>$v){
		if (is_array($_FILES[$k]["name"])){ //---判斷為陣列名稱相同物件上傳
			foreach ($_FILES[$k]["name"] as $n1=>$n2){
				$temp_file_name = explode('.',$n2);
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).$k.rand(10,99).'.'.$temp_file_name[count($temp_file_name)-1];
				move_uploaded_file($_FILES[$k]["tmp_name"][$n1],$member["file_url"].$temp_file_name);
				$_POST[$k][] = $temp_file_name;		
			}	
		}else{
			$temp_file_name = explode('.',$_FILES[$k]["name"]);
			$temp_file_name = strtotime(date('Y-m-d H:i:s')).$k.rand(10,99).'.'.$temp_file_name[count($temp_file_name)-1];
			move_uploaded_file($_FILES[$k]["tmp_name"],$member["file_url"].$temp_file_name);
			$_POST[$k] = $temp_file_name;
		}
	}
	//----判斷陣列資料組合字串
	foreach ($_POST as $k=>$v){
		if (is_array($_POST[$k])){
			$_POST[$k] = implode("|__|",$_POST[$k]);
		}
	}
	
	//---判斷有否 account 值，否者表示更新，有者表示帳戶註冊
	if ($_POST["account"]==NULL || $_POST["account"]==''){
		if ($member["data"]["id"]!=NULL){
			$are = $_POST;
			if ($_POST["password"]==''||$_POST["password"]==NULL) unset($are["password"]); else $are["password"] = md5($_POST["password"]);
			$ar = $conn->AutoExecute($member["table"], $are, "UPDATE","id=".$member["data"]["id"]);
		}else{
			alert('請確認您是否為登入狀態',-1);
		}
	}else{
		$sql = "select * from ".$member["table"]." where account='".quotes(strtolower($_POST["account"]))."' or email='".quotes($_POST["email"])."'";
		$member_create = $conn->GetRow($sql);
		if ($member_create){
			if ($member_create["account"] == quotes(strtolower($_POST["account"]))){
				alert('該帳戶已申請過了',-1);
			}else{
				alert('信箱資料重複',-1);
			}
		}else{
			$are = $_POST;
			$are["account"] = strtolower($_POST["account"]);
			$are["password"] = md5($_POST["password"]);
			$ar = $conn->AutoExecute($member["table"], $are, "INSERT");
		}
	}
}

?>