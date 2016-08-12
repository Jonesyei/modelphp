<?php
include_once("includes/main_inc.php");

/*
	必須發送的POST資訊
	type = 命名別名
	code = 驗證碼
*/



if($_POST)
{
	
	if(md5((strtoupper($_POST["code"])))!=($_SESSION["__validate_code"]))
	{
		alert("驗證碼錯誤",-1);
	}else{
		unset($_POST["code"]);
	}
	
	//--表單欄位資料
	$class_data = $conn->GetRow("select * from ".PREFIX."data_list where type='form_set' and b_name='".quotes($_REQUEST["type"])."' and status=1");
	if ($class_data){
		$class_data["detail"] = explode('|__|',$class_data["detail"]);
		$class_data["memo"] = explode('|__|',$class_data["memo"]);
		if ($class_data["detail"])
			foreach ($class_data["detail"] as $k=>$v){
				$form[$v] = $class_data["memo"][$k];
			}
			
		///--自動記憶新增資料表功能
		$table_set = PREFIX.'form';
		if ($table_set!=''){
			$table_check = $conn->GetRow("SHOW TABLES WHERE Tables_in_".$dbData." = '".$table_set."'");
			//--沒資料建立資料表
			if (!$table_check) {
				$conn->Execute("
				CREATE TABLE  `".$table_set."` (
				 `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				 `type` TEXT NOT NULL ,
				 `status` int(11) NOT NULL default '1',
				 `create_date` DATETIME NULL ,
				 `update_date` DATETIME NULL ,
				 `create_name` TEXT NULL ,
				 `update_name` TEXT NULL
				) ENGINE = INNODB;
				");
			}
			//--資料表檢查
			$row_check = $conn->GetArray("desc ".$table_set);
			if ($row_check)
				foreach ($row_check as $k=>$v){
					$row_array[] = $v["Field"];
				}
				
			if ($row_array)
			foreach ($form as $a=>$b) {
					if (!in_array($a,$row_array) && isset($_POST[$a])) $conn->Execute("ALTER TABLE ".$table_set." ADD ".quotes($a)." TEXT NULL COMMENT '".quotes($b)."'");
			}
		}
		
		
		
		//判斷有上傳檔案 加到附加檔案中	
		if (count($_FILES)>0){
			$file_url = 'upload/'.$_REQUEST["type"].'/';
			if (!is_dir($file_url)){
				mkdir($file_url,0777,true);
			}
			foreach ($_FILES as $k=>$v){
				if (is_array($_FILES[$k]['tmp_name'])){
					foreach ($_FILES[$k]['tmp_name'] as $a=>$b){
						if ($b!=NULL && $b!=''){
							$temp_file_name = explode('.',$_FILES[$k]["name"][$a]);
							$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
							$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
							move_uploaded_file($_FILES[$k]["tmp_name"][$a],$file_url.$temp_file_name);
							$_POST[$k][]='<a href="../'.$file_url.$temp_file_name.'" target="_blank">'.$_FILES[$k]['name'][$a].'</a>';
							$mail->AddAttachment($file_url.$temp_file_name, $_FILES[$k]['name'][$a]);
						}
					}
					$_POST[$k] = implode('|__|',$_POST[$k]);
				}else{
					if ($v["tmp_name"]!=NULL && $v["tmp_name"]!=''){
						$temp_file_name = explode('.',$_FILES[$k]["name"]);
						$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
						$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
						move_uploaded_file($_FILES[$k]["tmp_name"],$file_url.$temp_file_name);
						$_POST[$k]='<a href="../'.$file_url.$temp_file_name.'" target="_blank">'.$v['name'].'</a>';
						$mail->AddAttachment($file_url.$temp_file_name, $v['name']);
					}
				}
			}
		}
		
		
		//---資料寫入
		if ($table_set){
			$indata = $_POST;
			foreach ($indata as $k=>$v){
				if (is_array($v)) $indata[$k] = implode(',',$v);
			}
			unset($_POST["type"]);
			$indata["type"] = $_REQUEST["type"];
			$indata["create_date"] = $indata["update_date"] = date("Y-m-d H:i:s");
			$avalue = $conn->AutoExecute($table_set,$indata,"INSERT");
		}
	}//--endif class_data
	
	
	
	
	
	//網站設定 $web_set
	$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."' order by id";
	$tmp = $conn->GetArray($sql);
	
	$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
	$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
	$web_set["receive_email"] = $tmp["2"]["detail"];
	$web_set["default_email_title"] = $tmp["3"]["detail"];
	$web_set["send_email"] = $tmp["4"]["detail"];
	$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];

	if($_POST["form_set"]!=NULL) $_SETUP["form"]["contact"] = $_SETUP["form"][ $_POST["form_set"] ];//設定setup form row
	
	$web_set["title_add"] = ' 客戶留言信件';//信件附標題
	
	
	
	
	foreach ($_POST as $k=>$v){
		if ($v!='' && $form[$k]!='' && $form[$k]!=NULL) { //空值或者非在陣列裡的資料不顯示
			if (is_array($v)){
				$post_contact[] = array('value'=>implode(" ",$v),'title'=>$form[$k]);
			}else{
				$post_contact[] = array('value'=>$v,'title'=>$form[$k]);
			}
		}else if ($v!=''){
			$post_contact[] = array('value'=>$v,'title'=>$k);
		}
	}
	//--額外追加特殊多填欄位
	if (($_POST["person"]!=NULL&&$_POST["person"]!='')||($_POST["child"]!=NULL&&$_POST["child"]!='')) 
		$post_contact[] = array('value'=>$_POST["person"].'大人'.$_POST["child"].'小孩','title'=>'家庭成員');
	if (($_POST["room"]!=NULL&&$_POST["room"]!='')||($_POST["ten"]!=NULL&&$_POST["ten"]!='')) 
		$post_contact[] = array('value'=>$_POST["room"].'房'.$_POST["ten"].'廳'.$_POST["tolite"].'衛','title'=>'裝潢格局');
	
	
	
	ob_start(); 	//打開快取
	$tpl->assign("data",$post_contact);
	$tpl->assign("inquiry",$inquiry);
	$tpl->assign("web_set",$web_set);
	$tpl->assign("setup",$_SETUP);
	$tpl->display('string:'.$design->load('mail_contact'));
	$cache_string = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
	

	$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
	$mailto = explode_array(array(',',';'),$web_set["receive_email"]);
	foreach ($mailto as $k=>$v){
		$mail->AddAddress($v);	
	}
	$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
	$mail->Subject = $web_set["default_email_title"];    // 設定郵件標題        
	$mail->Body = $cache_string;
	
	//判斷有上傳檔案 加到附加檔案中
	if ($class_data && count($_FILES)>0){
		foreach ($_FILES as $k=>$v){
			$mail->AddAttachment($v['tmp_name'], $v['name']);
		}
	}
	
	if($mail->Send()){
		alert("送出 ".$web_set["title_add"]." 成功!!",-1);
	}else{
		print_r($smtp_set["detail"]);
		exit;
	}
	
}


LinkTo("./");

?>