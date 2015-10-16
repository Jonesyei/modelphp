<?php
include_once("../includes/main_back_inc.php");

$include = true;//不讓 index.php display的參數

//--重新擷取目錄判斷  避免有/demo /test下的錯誤
$temp_r_array = explode('serback',__file__);



$file_url = $temp_r_array[0].".htaccess";


if ($_POST["detail"]){
	file_put_contents($file_url,$_POST["detail"]);
	alert('已更改跳轉設定!!','url_rewrite.php');
	eixt;
}else{
	if (is_file($file_url)){
		$file = fopen($file_url, "r");
		
		while (!feof($file)) {
			$value = fgets($file);
			$data["one"]["detail"] .= $value;
		}
	}
}


include_once("index.php");//assign 所有資料、共用頁面


$tpl->assign("design",$design);
$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>