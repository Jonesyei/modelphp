<?php
include_once("../../main_inc.php");
include_once("../function.php");
/*
if ($_FILES){
	$uploads_dir = 'upload';//存放上傳檔案資料夾
	foreach ($_FILES["ff"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["ff"]["tmp_name"][$key];
			$name = explode('.',$_FILES["ff"]["name"][$key]);
			$name = date('YmdHis').'.'.$name[count($name)-1];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$name_array[] = $name;
		}
	}
	echo json_encode($name);
}
*/
$dirtemp_name =  explode('include',dirname(__FILE__));
$dirtemp_name = $dirtemp_name[0];
define('APP_PATH',$dirtemp_name);
$ini_webset = parse_ini_file(APP_PATH."includes/config/web_set.ini",true);

if ($_FILES){
	//-判斷是否超過限制空間大小
	if ($ini_webset["web_set"]["upload_max_size"]*1<$ini_webset["web_set"]["now_file"]*1+$_FILES["Filedata"]["size"]*1){
		echo json_encode(array($ini_webset["web_set"]["upload_full_msg"]));
		exit;
	}
	
	$cpos["file_url"] = '../../../upload/';//存放上傳檔案資料夾
	if ($_GET["upload"]!=NULL) $cpos["file_url"] = '../../'.$_GET["upload"];
	$image_array = array('bmp','jpg','jpeg','png','gif');
	foreach ($_FILES as $k=>$v){
		if (is_array($_FILES[$k]["name"])){ //---判斷為陣列名稱相同物件上傳
			foreach ($_FILES[$k]["name"] as $n1=>$n2){
				if ($n2!=''||$n2!=NULL){
				$temp_file_name = explode('.',$n2);
				$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
				/*
				if (in_array($after_name,$image_array)){//上傳的檔案圖片就縮圖處理
					ImageResize($_FILES[$k]["tmp_name"][$n1], $cpos["file_url"].$temp_file_name);
				}else{
				*/
					move_uploaded_file($_FILES[$k]["tmp_name"][$n1],$cpos["file_url"].$temp_file_name);
				//}
				$name_array[$k][] = $cpos["file_url"].$temp_file_name;
				}
			}	
		}else{
			if ($_FILES[$k]["name"]!=''||$_FILES[$k]["name"]!=NULL){
				$temp_file_name = explode('.',$_FILES[$k]["name"]);
				$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
				/*
				if (in_array($after_name,$image_array)) {//上傳的檔案圖片就縮圖處理
					ImageResize($_FILES[$k]["tmp_name"], $cpos["file_url"].$temp_file_name);
				}else{
				*/	
					move_uploaded_file($_FILES[$k]["tmp_name"],$cpos["file_url"].$temp_file_name);
				//}
				$name_array[$k] = $cpos["file_url"].$temp_file_name;
			}
		}
	}
	
	//--記憶暫存資料 edit by Jones 20150707
	foreach ($name_array["ff"] as $k=>$v){
		$v = explode('/',$v);
		$v = $v[count($v)-1];
		$_SESSION["upload_temp"][] = $v;
	}
	
	echo json_encode($name_array["ff"]);
}
?>