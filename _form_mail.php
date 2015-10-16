<?php
include_once("includes/main_inc.php");
$form = array(
''=>'',
'name'=>'姓名',
'phone'=>'電話',
'conpay'=>'公司',
'email'=>'聯絡EMAIL',
'msg'=>'留言',
'address'=>'地址',
'sex'=>'性別',
'fax'=>'傳真'
);


if($_POST)
{

		
	if(md5((strtoupper($_POST["code"])))!=($_SESSION["__validate_code"]))
	{
		alert("驗證碼錯誤",-1);
	}
	
	
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
		}else{
			$post_contact[] = array('value'=>$v,'title'=>$$k);
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
	$tpl->display(ROOT_PATH.'templates/MAIL_contact.html');
	$cache_string = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
	

	$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
	$mail->AddAddress($web_set["receive_email"]);
	$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
	$mail->Subject = $web_set["default_email_title"];    // 設定郵件標題        
	$mail->Body = $cache_string;
	
	//判斷有上傳檔案 加到附加檔案中
	if (count($_FILES)>0){
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






/*

function SendMail($from,$mailto,$subject,$msg,$filename=''){ // 傳送 mail 
$subject = '=?utf-8?B?'.base64_encode("$subject").'?='; // 標題加密(防亂碼) 
$boundary = uniqid( ""); // 產生分隔字串 
// 設定MAIL HEADER 
$headers = ''; 
$headers .= 'MIME-Version: 1.0'."\r\n"; 
$headers .= 'Content-type: multipart/mixed; boundary="'.$boundary.'"; charset="UTF-8"'."\r\n"; //宣告分隔字串 
$headers .= 'From:'.$from."\r\n"; // 設定寄件者 
$headers .= 'X-Mailer: PHP/' . phpversion()."\r\n"; 
// 信件內容開始 
$body .= '--'.$boundary."\r\n"; 
$body .= 'Content-type: text/plain; charset="UTF-8"'."\r\n";// 信件本文header 
$body .= 'Content-Transfer-Encoding: 8bit'."\r\n";// 信件本文header 
$body .= $msg."\r\n"; // 本文內容 
	//附加檔案處理 
	if($filename){ 
		$mimeType = mime_content_type($filename); // 判斷檔案類型 ，php.ini要開啟php_mime_magic.dll
		if(!$mimeType) $mimeType ="application/unknown"; // 若判斷不出則設為未知 
		$fp = fopen($filename, "r"); // 開啟檔案 
		$read = fread($fp, filesize($filename)); // 取得檔案內容 
		fclose($fp); // 關閉檔案 
		$read = base64_encode($read);//使用base64編碼 
		$read = chunk_split($read); //把檔案所轉成的長字串切開成多個小字串 
		$file = basename($filename); //傳回不包含路徑的檔案名稱(mail中會顯示的檔名)
		
		// 附檔處理開始 
		$body .= '--'.$boundary ."n"; 
		// 設定附加檔案HEADER 
		$body .= 'Content-type: '.$mimeType.'; name='.$file."\r\n"; 
		$body .= 'Content-transfer-encoding: base64'."\r\n"; 
		$body .= 'Content-disposition: attachment; filename='.$file."\r\n"; 
		// 加入附加檔案內容 
		$body .= $read ."\r\n"; 
	}//處理附加檔案完畢 
$body .= "--$boundary--";//郵件結尾

mail($mailto, $subject, $body, $headers); // 寄出信件

}
*/


?>