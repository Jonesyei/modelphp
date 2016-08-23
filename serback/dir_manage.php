<?php
include_once("../includes/main_back_inc.php");
include_once(APP_PATH."includes/project/pclzip.lib.php");

$include = true;//不讓 index.php display的參數


//--拖曳動態上傳處理
if ($_GET["ajax"]){
	foreach ($_FILES as $k=>$v){
		if (is_array($_FILES[$k]["name"])){ //---判斷為陣列名稱相同物件上傳
			foreach ($_FILES[$k]["name"] as $n1=>$n2){
				if ($n2!=''||$n2!=NULL)	move_uploaded_file($_FILES[$k]["tmp_name"][$n1],$_GET["dir"].$n2);
			}	
		}else{
			if ($_FILES[$k]["name"]!=''||$_FILES[$k]["name"]!=NULL)	move_uploaded_file($_FILES[$k]["tmp_name"],$_GET["dir"].$_FILES[$k]["name"]);
		}
	}
	exit;
}



//--網站目錄結構
 	$DirectoryPath = '../';
	if ($_GET["dir"]) $DirectoryPath = $_GET["dir"];
	
    $Dir = opendir($DirectoryPath);
    if (!$Dir) alert('目錄路徑有問題!!','./');
 
	$disk_array = array('0'=>'Bytes','1'=>'KBytes','2'=>'MBytes','3'=>'GBytes','4'=>'TBytes');
	$data["check_file"] = $check_array = array('ckeditor','ckfinder','class','font','includes','serback','templates','templates_c','upload','_notes','.htaccess','ajax.php','count.txt','css.php','data_load.php','head.php',
	'index.php','mathcode.php','member.php','resize.php','setup.php','shopping.php','verifycode.php','_form_mail.php','back.zip','phpinfo.php','fileauth.php','barcode.php'
	);
	
	//--建立目錄
	if ($_GET["create_dir"]) {
		if (is_dir($DirectoryPath.$_GET["create_dir"].'/'))
			alert('此目錄已存在!!',-1);
		else
			mkdir($DirectoryPath.$_GET["create_dir"].'/',0777,true);
		alert('已建立'.$_GET["create_dir"].'目錄',-1);
	}

    while (($File = readdir($Dir)) !== false) {
		unset($temp_file);
        if ($File[0] == '.') continue;

		//--判斷是否為系統檔案
		if ($DirectoryPath=='../' && in_array($File,$check_array)) continue;
		
		$temp_file['name'] = $File;

        if (is_dir($DirectoryPath . $File)) {
			$temp_file['isdir'] = '1';
		}else{
			$temp_file_data = disk_data(filesize($DirectoryPath . $File));
			$temp_file['size'] = number_format($temp_file_data['data'],2).$disk_array[$temp_file_data['depth']];
			$temp_file['isdir'] = '0';
		}
		$data["list"][] = $temp_file;
    }
    closedir($Dir);
 

	$data["dir"] = $DirectoryPath;




//--加入壓縮檔
if ($data["list"] && $_GET["addzip"]){
	unlink(APP_PATH.'back.zip');
	$archive = new PclZip(APP_PATH.'back.zip');
	$file_temp[] = '../upload/';
	foreach ($data["list"] as $k=>$v){
		if ($v["isdir"]=='1'){
			//加到壓縮檔
			$file_temp[] = '../'.$v["name"].'/';
		}else{
			$file_temp[] = '../'.$v["name"];
		}
	}
	$archive->create(implode(',',$file_temp),PCLZIP_OPT_ADD_PATH, "add_dir");
}


//--解壓縮檔案
if ($_FILES["zip"]){
	//include_once(APP_PATH."includes/project/pclzip.lib.php");
	// 檔案完整路徑
	$temp_file_name = explode('.',$_FILES["zip"]["name"]);
	if (strtolower($temp_file_name[count($temp_file_name)-1])=='zip'){
		$full_target_path = $_FILES["zip"]["tmp_name"];
		$archive = new PclZip($full_target_path);
		//$file_list = $archive->extract(PCLZIP_OPT_PATH, $data["dir"], PCLZIP_OPT_REMOVE_ALL_PATH);
		$file_list = $archive->extract(PCLZIP_OPT_PATH, $data["dir"]);
		alert('已上傳解壓縮檔案',-1);
	}else{
		move_uploaded_file($_FILES["zip"]["tmp_name"],$data["dir"].implode('.',$temp_file_name));
		alert('已上傳檔案',-1);
	}
	exit;
}



if ($_POST["del"]){
	if (!is_array($_POST["del"])) $_POST["del"] = explode(',',$_POST["del"]);
	if ($_POST["del"])
		foreach ($_POST["del"] as $k=>$v){
			deleteDir($data["dir"].$v);
		}
	alert('操作已完成',-1);
}



$data["dir_exp"] = array_diff(explode('/',$data["dir"]),array('',NULL));



$data["pageget"] = $_GET;
include_once("index.php");//assign 所有資料、共用頁面
$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





