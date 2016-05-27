<?php
/*
	操作函數庫
	@2015 create and edit by Jones
	
	IP() 用戶端IP
	Order_No() 依時間(毫秒) 產生訂單或特殊序號
	Now_file() 抓取現在頁面檔名 例 xxx.php (php 去除)

	Auto_id($conn,$table) table的即將create的id值 Auto_increment
	
	quotes($content) //魔術引號
	
	deQuotes($content,$mode=1) 解魔術引號  $mode:1預設移除html標籤避免破壞版面
	
	Userunicode($id) //檢查身份證字號
	
	n_to_w($strs, $types = '0') 字體半形轉全形
	
	sock_post($url, $data='') 模擬POST
*/

//目前使用者 IP
function IP()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ip=$_SERVER['REMOTE_ADDR'];
		
	return $ip;
}


// 依時間(毫秒) 產生訂單或特殊序號
function Order_No()
{
	$tmp = explode(" ",microtime());
	$no  = $tmp["1"];
	$tmp = explode(".",$tmp["0"]);
	$no .= substr($tmp["1"],0,2);
	
	return $no;
}

// 依時間(毫秒) 產生訂單或特殊序號 一天為限
function Order_No_Day()
{
	$no = date("H")*60*60 + date("i")*60 + date("s");
	return $no;
}








function SearchSql($db,$table,$get,$keyword_ary = array(),$table_as = "")
{
	$sql = "";
	$table_rows = array();
	

	if( $ary = $db->GetArray("DESC ".PREFIX.$table) )
		foreach($ary as $k=>$v) $table_rows[] = $v["Field"];
	else
		return $sql;//無此資料庫 系統出錯

	
	if( is_array($get) )
	{
		foreach($get as $k=>$v)
		{
			$row = explode("_",$k);
			if($row["0"]=="s" && in_array($row["1"],$table_rows) && $v!=NULL) $sql .= " and ".$table_as.$row["1"]."='".quotes(trim($v))."'";
			if($row["0"]=="l" && in_array($row["1"],$table_rows) && $v!=NULL) $sql .= " and ".$table_as.$row["1"]." like '%".quotes(trim($v))."%'";
		}

				
		if($get["daterange"]!=NULL && in_array("create_date",$table_rows))
		{		
			$tmp = explode("-",$get["daterange"]);
			foreach($tmp as $k => $v)
				$tmp[$k] = str_replace(".","-",$v);
			
			$sql .= " and ".$table_as."create_date >= '".quotes($tmp[0])." 00:00:00' and ".$table_as."create_date <= '".quotes($tmp[1])." 23:59:59' ";
		}
		
		if($get["keyword"]!=NULL)
		{
			$keyword_search = " (1=0 ";
			
			foreach($keyword_ary as $k=>$v)
			{
				if( in_array($v,$table_rows) )
				{
					$keyword_search .= " or ".$table_as.$v." like '%".quotes($get["keyword"])."%' ";
				}
			}
			
			$sql .= " and ".$keyword_search.")";
		}
		
		
	}

	return $sql;
}



//加密 解密 str 加密資料 key 金鑰 mode 加= encode 解= decode
/*
function Code($string,$key,$operation = "encode")
{
	$expiry = 0;

	// 動態密匙長度，相同的明文會生成不同密文就是依靠動態密匙
    $ckey_length = 4;
    
    // 密匙
    $key = md5($key ? $key : KEY);
    
    // 密匙a會參與加解密
    $keya = md5(substr($key, 0, 16));
    // 密匙b會用來做資料完整性驗證
    $keyb = md5(substr($key, 16, 16));
    // 密匙c用於變化生成的密文
    $keyc = $ckey_length ? ($operation == 'decode' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
    // 參與運算的密匙
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    // 明文，前10位用來保存時間戳，解密時驗證資料有效性，10到26位用來保存$keyb(密匙b)，解密時會通過這個密匙驗證資料完整性
    // 如果是解碼的話，會從第$ckey_length位開始，因為密文前$ckey_length位元保存 動態密匙，以保證解密正確
    $string = $operation == 'decode' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    // 產生密匙簿
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    // 用固定的演算法，打亂密匙簿，增加隨機性，好像很複雜，實際上對並不會增加密文的強度
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    // 核心加解密部分
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        // 從密匙簿得出密匙進行異或，再轉成字元
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if($operation == 'decode') {
        // substr($result, 0, 10) == 0 驗證資料有效性
        // substr($result, 0, 10) - time() > 0 驗證資料有效性
        // substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 驗證資料完整性
        // 驗證資料有效性，請看未加密明文的格式
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        // 把動態密匙保存在密文裏，這也是為什麼同樣的明文，生產不同密文後能解密的原因
        // 因為加密後的密文可能是一些特殊字元，複製過程可能會丟失，所以用base64編碼
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}
*/



//將資料庫撈出來之資料 id 指為 索引值 重組陣列
function Id_Array($array)
{
	if( is_array( $array ) )
	foreach($array as $k=>$v)
	{
		if( isset($v["id"]) ) $new_array[ $v["id"] ] = $v;
	}
	
	return $new_array;
}



//抓取現在頁面檔名 例 xxx.php (php 去除)
function Now_file()
{
	//$ary = array('file-studio');



	$now_file = explode("/",$_SERVER['PHP_SELF']);
	
	$now_file = $now_file[count($now_file)-1];
	$now_file = explode("?",$now_file);
	$now_file = explode(".",$now_file["0"]);
	
	$now_file = $now_file["0"];
	
	/*
	$ary = array(
	'reg'=>'regist'
	
				 );


	if( isset($ary[ $now_file ]) ) $now_file = $ary[ $now_file ];
	*/

	return $now_file;
}

//抓取table的即將create的id值 Auto_increment
function Auto_id($conn,$table)
{
	$sql = "SHOW TABLE STATUS WHERE NAME='".$table."'";
    $tmp = $conn->GetRow($sql);
	return $tmp["Auto_increment"];
}


//組成 select 的html
function Make_list($list,$value)
{	
	$list_html = "";
	if( is_array($list) )
	foreach($list as $k => $v)
	{
		if($value == $k && $value != NULL)
			$list_html .='<option value="'.$k.'" selected="selected">'.$v.'</option>';
		else
			$list_html .='<option value="'.$k.'">'.$v.'</option>';
	}
	return $list_html;
}

//組成 select 的html 撈出SQL用
function Make_sql_list($list,$value=NULL)
{
	$html = "";
	if( is_array($list) )
	foreach($list as $k => $v)
	{
		if (isset($list[$k]["token_control"]) && $v["id"]!=$value) {
			$disable = 'disabled';
			
		}else{
			$disable = '';
			
		}
		if($list[$k]["id"] == $value && $value != NULL) {
			@$html .= '<option value="'.$list[$k]["id"].'" selected="selected" '.$disable.'>'.$list[$k]["name"].'</option>';
		}else{
			@$html .= '<option value="'.$list[$k]["id"].'" '.$disable.'>'.$list[$k]["name"].'</option>';
		}
	}
	return $html;
}

//組成 check 的html
function Make_check($list,$value,$name,$disabled=NULL)
{
	foreach($list as $k => $v)
	{
		$dis = "";
		if($disabled!=NULL && $k == $disabled) $dis = 'disabled="disabled"';
		
		if(is_array($k) && in_array($k,$value) )
			@$html .= '<input name="'.$name.'" type="checkbox" value="'.$k.'" '.$dis.' checked="checked" >'.$v;
		else
			@$html .= '<input name="'.$name.'" type="checkbox" value="'.$k.'" '.$dis.' >'.$v;
	}
	return @$html;
}



//組成 radio 的html
function Make_radio($list,$value,$name,$disabled=NULL)
{
	if($value==NULL) $value = "1";//預設為1
	
	$return_word = "";
	foreach($list as $k => $v)
	{
		$dis = "";
		if($disabled!=NULL && $k == $disabled) $dis = 'disabled="disabled"';
		
		if($k == $value)
			@$return_word .= '<input name="'.$name.'" type="radio" value="'.$k.'" '.$dis.' checked="checked" >'.$v;
		else
			@$return_word .= '<input name="'.$name.'" type="radio" value="'.$k.'" '.$dis.' >'.$v;
	}
	return @$return_word;
}



//編輯器 名稱,寬,高,值
function Fck($name,$width,$height,$path,$value = NULL,$style = NULL)
{
	//html編輯器
/*	$oFCKeditor = new FCKeditor($name);
	$oFCKeditor->BasePath = $path;
	$oFCKeditor->Width = $width;
	$oFCKeditor->Height = $height;	
	$oFCKeditor->Config['DefaultLanguage'] = 'zh';
	if($style!=NULL)$oFCKeditor->Config['EditorAreaCSS'] = $style;
	
	$oFCKeditor->Value = deQuotes($value,-1);*/



//$style = substr($style,3,strlen($style));//FCK  CK 所在資料夾不同

return Ckedit($name,$value,$style);



//return $oFCKeditor->CreateHtml();

}





//編輯器 名稱,資料內容,編輯器預設類型,框架預設class
function Ckedit($name,$value,$style='normal',$bodyclass='')
{
	$tmp = '<textarea id="'.$name.'" name="'.$name.'" editor="'.$style.'" cols="1" rows="1" bodyclass="'.$bodyclass.'">'.deQuotes($value,-1).'</textarea>';
	$tmp .= "
	<script>
	CKEDITOR.replace( '".$name."',
	{
		filebrowserBrowseUrl : '../ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	</script>";
	
	
	return $tmp;
}


function datepicker($name,$value,$attr='',$format=array()){
	$tmp = '<input type="text" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$attr.' />';
	$tmp .= "
	<script>
	if (typeof($.fn.datepicker)=='function') {
		jQuery('#".$name."').datepicker(JSON.parse('".json_encode($format)."'));
	}else{
		document.getElementById('".$name."').setAttribute('type','date');
	}
	</script>
	";
	return $tmp;
}

//-- 字串陣列查詢語句返回
function array_sql_search($row,$data){
	return " and (".$row." like '%|".quotes($data)."|%' or ".$row." like '%|".quotes($data)."' or ".$row." like '".quotes($data)."|%' or ".$row."='".quotes($data)."')";
}

//提示
function alert($messages,$url=NULL)
{
	print "<meta http-equiv=Content-Type content=text/html; charset=utf-8>";
	
	if( trim($url)=="-1" )
	{
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");javascript:history.back(-1);</script>";
		exit;
	}
	elseif( trim($url)==NULL || trim($url)=="")
	{
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");location.reload();</script>";
	}
	else
	{
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");location.href='$url';</script>";
		exit;
	}
		
	/*
	if (trim($url) == "-1")
		$msg= "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");javascript:history.back(-1);</script>";
	else if (trim($url) == "submit")
		$msg= "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");document.vipform.submit();</script>";
	else if (trim($url) == "")
		$msg= "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");</script>";
	else
		$msg= "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");location.href='$url';</script>";
	echo $msg;
	*/
}




//跳到指定頁面 同header
function LinkTo($url)
{	
	if($url=='-1')
		echo "<script>javascript:history.back(-1);</script>";
	else
		echo "<script>location='".$url."'</script>";
	exit;
}


//魔術引號
function quotes($content)
{
	if (!get_magic_quotes_gpc()) {

		if (is_array($content)) 
		{
			foreach ($content as $key=>$value) 
			{
				$content[$key] = addslashes(trim($value));
			}
		}
		 else 
		{
			$content=addslashes(trim($content));
		}
	} 
	else 
	{
		if (is_array($content)) 
		{
			foreach ($content as $key=>$value) 
			{
				$content[$key] = trim($value);
			}
		}
		 else 
		{
			$content=trim($content);
		}
	}
	return $content;
}
//解魔術引號  $mode:1預設移除html標籤避免破壞版面
function deQuotes($content,$mode=1)
{
	//不管get_magic_quotes_gpc 開啟只會幫你加/，不會幫解。故不管開啟與否都要加 stripslashes 自解

	if (is_array($content)) 
	{
		foreach ($content as $key=>$value) 
		{
			$content[$key] = stripslashes($value);
		}
	}
	 else 
	{
		$content=stripslashes($content);
	}
	
	if($mode==1)
	{
		if (is_array($content)) 
		{
			foreach ($content as $key=>$value) 
			{
				//濾掉所有標籤 防止xss攻擊
				$content[$key] = strip_tags($value);
			}
		}
		else 
		{
			//濾掉所有標籤 防止xss攻擊
			$content=strip_tags($content);
		}
	}
	
	return $content;
}

//檢查帳號格式
function check_account($account)
{
	$token = "[^a-zA-Z0-9]+";
	$is_pass=true;
	
	if ( eregi($token,$account) )
	{
		$is_pass=false;
	}
	
	return $is_pass;
}


//檢查帳號格式 是否英數混合
function check_alpha_digit($value)
{
	$is_pass=false;
	
	if(ctype_alpha($value)==false && ctype_digit($value)==false)
	{
		$is_pass=true;
	}
	
	return $is_pass;
}


//判斷數值 小數點 負數也為true
function isNumber($get_value)
{
	$is_pass=false;
		
	if (is_numeric($get_value)) $is_pass=true;
	
	return  $is_pass;
}
//判斷日期格式
function isDate($get_value)
{
	$is_pass=true;
	
	if (strtotime($get_value)==false) $is_pass=false;
	
	return  $is_pass;
}

//判斷電話格式
function isTel($get_value)
{
	$is_pass=false;
	$reg="^[0-9\-\(\)\ ]+$";
	if(ereg($reg,$get_value)) $is_pass=true;
	return  $is_pass;
}

//檢查email格式
function check_email($str)
{
	$pattern="/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is";
	if (!preg_match($pattern,$str)) return false;
	else return true; 

}


//檢查身份證字號
function Userunicode($id){

	$id = strtoupper($id);

	//建立字母分數陣列

	$headPoint = array(

		'A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,

		'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,

		'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,

		'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,

		'Y'=>12,'Z'=>30

	);

	//建立加權基數陣列

	$multiply = array(8,7,6,5,4,3,2,1);

	//檢查身份字格式是否正確

	if (ereg("^[a-zA-Z][1-2][0-9]+$",$id) AND strlen($id) == 10){

		//切開字串

		$len = strlen($id);

		for($i=0; $i<$len; $i++){

			$stringArray[$i] = substr($id,$i,1);

		}

		//取得字母分數

		$total = $headPoint[array_shift($stringArray)];

		//取得比對碼

		$point = array_pop($stringArray);

		//取得數字分數

		$len = count($stringArray);

		for($j=0; $j<$len; $j++){

			$total += $stringArray[$j]*$multiply[$j];

		}

		//計算餘數碼並比對

		$last = (($total%10) == 0 )?0:(10-($total%10));

		if ($last != $point) {

			return false;

		} else {

			return true;

		}

	}  else {

	   return false;

	}

}

//字體半形轉全形
function n_to_w($strs, $types = '0'){  // narrow to wide , or wide to narrow
    $nt = array(
        "(", ")", "[", "]", "{", "}", ".", ",", ";", ":",
        "-", "?", "!", "@", "#", "$", "%", "&", "|", "\\",
        "/", "+", "=", "*", "~", "`", "'", "\"", "<", ">",
        "^", "_",
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j",
        "k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
        "u", "v", "w", "x", "y", "z",
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J",
        "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T",
        "U", "V", "W", "X", "Y", "Z",
        " "
    );
    $wt = array(
        "（", "）", "〔", "〕", "｛", "｝", "﹒", "，", "；", "：",
        "－", "？", "！", "＠", "＃", "＄", "％", "＆", "｜", "＼",
        "／", "＋", "＝", "＊", "～", "、", "、", "＂", "＜", "＞",
        "︿", "＿",
        "０", "１", "２", "３", "４", "５", "６", "７", "８", "９",
        "ａ", "ｂ", "ｃ", "ｄ", "ｅ", "ｆ", "ｇ", "ｈ", "ｉ", "ｊ",
        "ｋ", "ｌ", "ｍ", "ｎ", "ｏ", "ｐ", "ｑ", "ｒ", "ｓ", "ｔ",
        "ｕ", "ｖ", "ｗ", "ｘ", "ｙ", "ｚ",
        "Ａ", "Ｂ", "Ｃ", "Ｄ", "Ｅ", "Ｆ", "Ｇ", "Ｈ", "Ｉ", "Ｊ",
        "Ｋ", "Ｌ", "Ｍ", "Ｎ", "Ｏ", "Ｐ", "Ｑ", "Ｒ", "Ｓ", "Ｔ",
        "Ｕ", "Ｖ", "Ｗ", "Ｘ", "Ｙ", "Ｚ",
        "　"
    );
 
    if ($types == '0'){
        // narrow to wide
        $strtmp = str_replace($nt, $wt, $strs);
    }else{
        // wide to narrow
        $strtmp = str_replace($wt, $nt, $strs);
    }
    return $strtmp;
}

//模擬POST
function sock_post($url, $data='') {
	$url = parse_url($url);
	$url['scheme'] || $url['scheme'] = 'http';
	$url['host'] || $url['host'] = $_SERVER['HTTP_HOST'];
	$url['path'][0] != '/' && $url['path'] = '/'.$url['path'];
	$query = $data;
	if(is_array($data)) $query = http_build_query($data);
	$fp = @fsockopen($url['host'], $url['port'] ? $url['port'] : 80);
	if (!$fp) return "Failed to open socket to $url[host]";
	fputs($fp, sprintf("POST %s%s%s HTTP/1.0\n", $url['path'], $url['query'] ? "?" : "", $url['query']));
	fputs($fp, "Host: $url[host]\n");
	fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
	fputs($fp, "Content-length: " . strlen($query) . "\n");
	fputs($fp, "Connection: close\n\n");
	fputs($fp, "$query\n");
	$line = fgets($fp,1024);
	if (!eregi("^HTTP/1\.. 200", $line)) return;
	$results = ""; $inheader = 1;
	while(!feof($fp)) {
		$line = fgets($fp,1024);
		if ($inheader && ($line == "\n" || $line == "\r\n")) {
			$inheader = 0;
		}elseif (!$inheader) {
			$results .= $line;
		}
	}
	fclose($fp);
	return $results;
}





//撈取 現在頁面 url 刪除不需要的關鍵字 key (array)
function Get_Url($key = array())
{
	//取得最後目錄下的網頁檔
	$url = explode("/",$_SERVER['REQUEST_URI']);
	$url = $url[ count($url)-1 ];
	
	//拆開 GET 值
	$url = explode("?",$url);
	
	//如果有 GET 值時 && 有設定key值時
	if(@$url["1"] && is_array($key) )
	{
		foreach( $url_get = explode("&",$url["1"]) as $k=>$v)
		{
			//拆開 get 值 中的 "="
			$tmp = explode("=",$v);
			
			//如果 get 值 與 關鍵字相同 便unset
			if( in_array($tmp["0"],$key) )
			{
				unset($url_get[$k]);
			}
		}
		
		//組回網址 start
		
		//組成get
		$get = "";
		foreach($url_get as $k=>$v) @$get .= $v."&";
		$get = substr(@$get,0,-1);
		
		//get 值 還在時 加 "?"
		if($get!="")
			$url = $url["0"]."?".$get;
		else
			$url = $url["0"];
	}
	else
	{
		$url = $url["0"];
	}
	
	if($url=="") $url = "/";
	
	return $url;
}





//亂數字母數字產生機 預設字母出現機率為三分之二
// num=1 str=1 全部數字  num=2 str=2 全部字母
function Rand_data($number,$num=NULL,$str=NULL)
{
	$str_a=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$num_a=array('0','1','2','3','4','5','6','7','8','9');
	
	for($i = 0 ; $i<$number ;$i++)
	{
		if($num==NULL || $str==NULL)
		{
			if(rand(1,3) == 1)
				$temp = $num_a[rand(0,9)];
			else
				$temp = $str_a[rand(0,25)];
		}	
		else
		{
			if(rand($num,$str) == 1)
				$temp = $num_a[rand(0,9)];
			else
				$temp = $str_a[rand(0,25)];
			
		}	
		$data .= $temp;
	}
	return $data;
}



/*
	所在路徑 重新導向
	一般刪除模式
	$value = array('page','id') or $value= 'page,id';
	取代模式
	$value = array('page'=>'1','id'=>123) or $value= 'page:1,id:123';
	$act = 是否為取代模式
*/
function now_url($value='page',$act=false){
	$url_str = explode('?',$_SERVER['REQUEST_URI']);
	
	//--不是陣列的話就變陣列
	if (!is_array($value)){
		$value = explode(',',$value);
	}
	
	// ? 後參數處理
	$check_temp = explode('&',$url_str[1]);
	foreach ($check_temp as $k=>$v){
		$temp = explode('=',$v);
		//--判斷是否為取代模式
		if ($act){
			foreach ($value as $n1=>$n2){
				$temp2 = explode(':',$n2);
				if (count($temp2)>1){
					if ($temp[0]==$temp2[0]){
						$temp_array[$temp2[0]]=$temp2[1];
					}
				}else{
					if ($n2==$temp[0]){
						$temp_array[$n1]=$n2;
					}
				}
			}
			
		}
		if (!in_array($temp[0],$value) && $temp[0]!='' && $temp[0]!=NULL && empty($temp_array[$temp[0]]) ){
				$temp_array[$temp[0]]=$temp[1];
		}
	}
	
	
	$temp_output = '';
	if ($temp_array)
	foreach ($temp_array as $k=>$v){
		if ($temp_output!='') $temp_output .= '&';
		$temp_output .= $k.'='.$v;
	}
	
	return $url_str[0].'?'.$temp_output;
}



/*
	頁面資訊擷取
	return
	data => 頁面HTML資訊
	code => 代碼
*/
function curl($long_url,$type='GET',$data=NULL) {
	switch (strtoupper($type)){
		case "GET":
		$curlObj = curl_init();
			$options = array(
				CURLOPT_URL => $long_url,
				CURLOPT_RETURNTRANSFER => TRUE, //接收服?端范?的html代?而不是直接??器?出
				CURLOPT_TIMEOUT => 4
			);
		break;
		case "POST":
			$curlObj = curl_init();
			$options = array(
				CURLOPT_URL => $long_url,
				CURLOPT_POST => TRUE, //使用post提交
				CURLOPT_RETURNTRANSFER => TRUE, //接收服?端范?的html代?而不是直接??器?出
				CURLOPT_TIMEOUT => 4,
				CURLOPT_POSTFIELDS => http_build_query($data), //post的?据
			);
		break;
	}
    curl_setopt_array($curlObj, $options);
    $response = curl_exec($curlObj);
	$httpcode = curl_getinfo($curlObj, CURLINFO_HTTP_CODE);
    curl_close($curlObj);
    return array('data'=>$response,'code'=>$httpcode);
}




/*
	Hex 轉 rgb
	return array('r','g','b');
*/
function hextorgb($value){
		$value = explode('#',$value);
		if (count($value)<=1){
			$value = strtoupper($value[0]);
		}else{
			$value = strtoupper($value[1]);
		}
		
		//--色彩轉換hex 轉 rgb
		if (strlen($value)>3){
        	list( $r, $g, $b ) = array( $value[0] . $value[1], $value[2] . $value[3], $value[4] . $value[5] );
		}else{
			list( $r, $g, $b ) = array( $value[0] . $value[0], $value[1] . $value[1], $value[2] . $value[2] );
		}
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        $v["R"] = $r;
        $v["G"] = $g;
        $v["B"] = $b;
		return $v;
}

/** INI file 處理*/
function write_php_ini($array, $file)
{
    $res = array();
    foreach($array as $key => $val)
    {
        if(is_array($val))
        {
            $res[] = "[$key]";
            foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
        }
        else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
    }
    safefilerewrite($file, implode("\r\n", $res));
}
function safefilerewrite($fileName, $dataToSave)
{    if ($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime(TRUE);
        do
        {            $canWrite = flock($fp, LOCK_EX);
           // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
           if(!$canWrite) usleep(round(rand(0, 100)*1000));
        } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));

        //file was locked so now we can store information
        if ($canWrite)
        {            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}


/*
	頁碼檔案加載文件前先設置 
	$mount = 15; //--頁碼檔案必要變數 頁面筆數
	$cousql = 'select count(*) from '.$tablesql.$joinsql.$leftjoin.$wheresql.$orderby;//--總數資料 頁碼檔案必要變數
*/
	//筆數
function page_show($cousql,$mount,$page_button_count=10,$page_row_count=false){
	global $conn;
	global $_GET;
	unset($tc);
	unset($data["row_count"]);
	unset($data["allpage"]);
	$page_button_count = 10;
	if (!$page_row_count){
		if (is_array($cousql)){ //--如果是陣列 表示來源為物件
			$tc[0] = count($cousql);
			if ($tc[0]>1 || ($cousql[0]!=''&&$cousql[0]!=NULL))
			$pageall = ceil($tc[0]/$mount);
			else
			$pageall = 0;
		}else{
			$tc = $conn->GetRow($cousql); $pageall = ceil($tc[0]/$mount);
		}
	}else{
		$tc[0] = $page_row_count;
		$pageall = ceil($page_row_count/$mount);
	}
	$data["row_count"] = $tc[0];
	$data["allpage"] = $pageall;
	$n = $_GET["page"]*1+1; if ($n > $pageall) $n = $pageall;
	$b = $_GET["page"]*1-1; if ($b < 1) $b = 1;
	
	
	
	//-----------重組參數
	$url_and_split = explode('&',$_SERVER['QUERY_STRING']);
	$headurl = '';
	foreach ($url_and_split as $k => $v){
		$dnm = explode('=',$v);
		if ($dnm[0] != "page"){
			if ($headurl == NULL ||$headurl == ''){
				$headurl = $dnm[0]."=".$dnm[1];
			}else{
				$headurl .= "&".$dnm[0]."=".$dnm[1];
			}
		}
	}
	
	$hrefhead =  $_SERVER['PHP_SELF'].'?'.$headurl;
	
	
	//---一站通特殊處理
	/*
	$a = split('/',$_SERVER['QUERY_STRING']);
	$a = split('&',$a[count($a)-1]);
	foreach ($a as $k => $v)
	{
		$bc = split('=',$v);
		$c[$bc[0]] = $bc[1];
	}
	
	$hrefhead .= $c["orther"].'_'.$c["addr1"].'_'.$c["addr2"];
	//---------------
	
	$data["page"] = '<a r="lock" href="'.$hrefhead.'_1" class="page-btn">第一頁</a><a r="lock" href="'.$hrefhead.'_'.$b.'" class="page-btn">上一頁</a>'; //前一頁 跟 最前一頁
	for($i=0;$i<$pageall;$i++) {$data["page"] .= '<a r="lock" href="'.$hrefhead.'_'.($i+1).'">'.($i+1).'</a>';}
	$data["page"] .= '<a r="lock" href="'.$hrefhead.'_'.$n.'" class="page-btn">下一頁</a><a r="lock" href="'.$hrefhead.'_'.$pageall.'" class="page-btn"> 最後頁</a>'; //後一頁 跟 最後一頁
	//----	*/
	
	$data["page_first"] = '<a r="lock" href="'.$hrefhead.'" class="page-btn">第一頁</a>';
	
	$data["page1"] = '<a r="lock" href="'.$hrefhead.'&page='.$b.'" class="page-btn">上一頁</a>'; //前一頁 跟 最前一頁
	
	
	//----後一頁
	$data["page3"] .= '<a r="lock" href="'.$hrefhead.'&page='.$n.'" class="page-btn">下一頁</a>'; //後一頁
	
	$data["page_after"] ='<a r="lock" href="'.$hrefhead.'&page='.$pageall.'" class="page-btn">最後頁</a>'; // 最後一頁
	
	$data["page"] = $data["page1"].$data["page2"].$data["page3"];
	
	
	
	$data["select_page"] = '前往第 <select id="page" onchange="page_change(this.value);">';
	for($i=1;$i<=$pageall;$i++) {
		//目前頁碼小於分割頁碼一半 表示未達跳換顯示
		if (($_GET["page"]*1<=ceil($page_button_count/2) && $i<=$page_button_count) ||
			($i>$_GET["page"]-ceil($page_button_count/2) && $i<=$_GET["page"]+ceil($page_button_count/2)) ||
			($_GET["page"]*1+ceil($page_button_count/2)>=$pageall && $i>=$pageall-$page_button_count) ){
		//if ( ($i>$_GET["page"]-$page_button_count/2 && $i<=$_GET["page"]+$page_button_count/2) || ($i>=$_GET["page"] && $i<=$page_button_count-$_GET["page"])){
			if ($data["page2"]!=NULL) $data["page2"] .= '.';
			
			if ($_GET["page"]*1==$i){ $main_i = '<font color="red">'.$i.'</font>'; }else{ $main_i = $i; }
			
			$data["page2"] .= '<a r="lock" href="'.$hrefhead.'&page='.($i).'">'.($main_i).'</a>';
		}
		if ($_GET["page"]*1==$i){
			$page_checked = ' selected';
		}else{
			$page_checked = '';
		}
		
		$data["select_page"] .='<option value="'.($i).'"'.$page_checked.'>'.($i).'</option>';
	}
	$data["select_page"] .= '</select> 頁';
	$data["select_page"] .='<script>
	function page_change(value){
	var temp_str = window.location.href.split(\'?\');
	var cpl =\'\';
	if (temp_str.length>1){
		var temp_posarray = temp_str[1].split(\'&\');
		for (var aa=0;aa<temp_posarray.length;aa++){
			var check_temp = temp_posarray[aa].split(\'=\');
			if (check_temp[0]!=\'page\'){
				if (cpl!=\'\') cpl += \'&\';
				cpl += temp_posarray[aa];
			}
		}
		if (cpl!=\'\') cpl += \'&\';
		cpl += \'page=\'+value;
	}else{
		cpl += \'page=\'+value;
	}
	cpl = temp_str[0]+\'?\'+cpl;
	window.location.href = cpl;
	}</script>';
	
	
	
	$data["wd_page"] = '全部共 '.$data["row_count"].' 筆(每頁 '.$mount.' 筆)　　'.$data["page1"].'　'.$data["page2"].'　'.$data["page3"].'　　'.$data["select_page"];
	$data["wd_rwd_page"] = '全部共 '.$data["row_count"].' 筆(每頁 '.$mount.' 筆)　<br>　'.($_GET["page"]>1 ? $data["page1"]:"").'　'.($_GET["page"]<$data["allpage"] ? $data["page3"]:"").'　<br>　'.$data["select_page"];
	return $data;
}
?>
