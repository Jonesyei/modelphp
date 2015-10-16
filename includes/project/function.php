<?php
/*
函式庫
shorturl($url); //短網址自動申請 t.cn
reurl_stroe(array $a); //取出目前網址不包含$a參數位置
reurl_hidden(array $s_array); //製作 目前網址參數 不包含陣列參數 隱藏物件
explode_array(array('s','['),$str); //切割字串 依據陣列切割 回傳 排序數組
ImageResize('ram/xxx.jpg', 'ram/ooo.jpg'); //縮圖函數
*/
//--導回函數 去參數值
if (!function_exists('page_relaod')) {
function page_relaod($fick) {
	$aurl = explode('&',$_SERVER['QUERY_STRING']);
	foreach ($aurl as $k => $v){
		$burl = explode('=',$aurl[$k]);
		if ($fick != $burl[0]) $curl[] = $burl;
	}
	$newurl = '?';
	if (count($curl) != 0) {
		foreach ($curl as $m => $la){
			if ($newurl != '?') $newurl .= '&';
			$newurl .= $la[0].'='.$la[1];
		}
	}
	echo '<body onload="window.location.href=\''.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$newurl.'\';">';
}
}

//---加入收藏
if (!function_exists('joinfriend')) {
function joinfriend($fid) {
global $conn;
$sql = 'select * FROM '.PREFIX.'member WHERE id='.$fid.'';
$dm2 = $conn->GetArray($sql);

if (!$dm2) return alert('错误的商户资料',-1);
$friend = explode(',',$_SESSION["member_info"]["loginaccount"]["friendlist"]);
$friend = array_diff($friend,array(),array(NULL,''));//去除空陣列元
$friend = array_unique($friend);//去除重複值
	foreach ($friend as $f) // 重新組合尋找條件
	{
		if ($f == $fid) 
		{
			return alert('已经列入收藏名单',-1);
		}else{
			if ($sp == '') {$sp = $f;}else{$sp .= ','.$f;}
		}
	}
	if ($sp != NULL || $sp != "") {$sp .= ','.$fid;} else {$sp = $fid;}
	$are["friendlist"] = $sp;
	global $conn; //取出外部物件
	$a = $conn->AutoExecute("mallwed_member", $are, "UPDATE","id='".$_SESSION["member_info"]["loginaccount"]["id"]."'");
	include("reloadmember.php");//重新讀取個人資料
	return alert('成功加入收藏',-1);
}
}


//--刪除收藏合作夥伴
if (!function_exists('delfriend')) {
function delfriend($fid){
global $conn;
	$are["friendlist"] ="";
		if ($_SESSION["member_info"]["loginaccount"]["friendlist"] == NULL || $_SESSION["member_info"]["loginaccount"]["friendlist"] == ""){//沒有任何合作夥伴
			return alert('无任何资料可删除',-1);
		}else{
				$atte = explode(",",$_SESSION["member_info"]["loginaccount"]["friendlist"]);
				for ($deli=0;$deli<count($atte);$deli++){			
					if ($atte[$deli] != $fid) {
						if ($deli==0) {$are["friendlist"]=$atte[$deli];}else{$are["friendlist"].=",".$atte[$deli];}
					}
				}
		$_SESSION["member_info"]["loginaccount"]["friendlist"] = $are["friendlist"];
		$conn->AutoExecute("mallwed_member", $are, "UPDATE","id='".$_SESSION["member_info"]["loginaccount"]["id"]."'");
		return alert("删除成功",-1);
		}
}
}


if (!function_exists('strcutbyte')) {
function strcutbyte($str,$value){
		$a1 = mb_strlen($str)-mb_strwidth($str,'utf8');//總共中文字元數
		$a2 = mb_strwidth($str,'utf8')-($a1*2); //英文字數
		
		$str = mb_strcut($str,0,42,'utf8');
}
}



//----短網址申請 curl傳導頁面資料
if (!function_exists('shorturl')) {
function shorturl($long_url) {
    $url = 'http://www.waqiang.com/index.php/url/shorten';
    $data = array(
        'url' => $long_url,
        'submit' => 'Submit'
    );
    $curlObj = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => TRUE, //使用post提交
        CURLOPT_RETURNTRANSFER => TRUE, //接收服?端范?的html代?而不是直接??器?出
        CURLOPT_TIMEOUT => 4,
        CURLOPT_POSTFIELDS => http_build_query($data), //post的?据
    );
    curl_setopt_array($curlObj, $options);
    $response = curl_exec($curlObj);
    curl_close($curlObj);
    return $response;
}
}


//----重新重組目前所在URL 剃除 函數參數中的參數
if (!function_exists('reurl_stroe')) {
function reurl_stroe($s_array){
	$self_file = explode('/',$_SERVER['PHP_SELF']);
	$url_and_split = explode('&',$_SERVER['QUERY_STRING']);
	$headurl = '';
	foreach ($url_and_split as $k => $v){
		$dnm = explode('=',$v);
		if (!in_array($dnm[0],$s_array)){ //--不在參數陣列中
			if ($headurl == NULL ||$headurl == ''){
				$headurl = $dnm[0]."=".$dnm[1];
			}else{
				$headurl .= "&".$dnm[0]."=".$dnm[1];
			}
		}
	}
	return $self_file[count($self_file)-1].'?'.$headurl;
}
}



//---製作出除了參數陣列值 之外的參數 隱藏物件
if (!function_exists('reurl_hidden')) {
function reurl_hidden($s_array){
	$self_file = explode('/',$_SERVER['PHP_SELF']);
	$url_and_split = explode('&',$_SERVER['QUERY_STRING']);
	$headurl = '';
	foreach ($url_and_split as $k => $v){
		$dnm = explode('=',$v);
		if (!in_array($dnm[0],$s_array)){ //--不在參數陣列中
				$headurl .= '<input type="hidden" name="'.$dnm[0].'" value="'.$dnm[1].'">';
		}
	}
	return $headurl;
}
}

//----將字串依照陣列值 切割資料
if (!function_exists('explode_array')) {
function explode_array($s_array,$str){
	foreach ($s_array as $k=>$v){
		if ($ps1==NULL){ //--第一次未切割時
			$ps1 = explode($v,$str);
		}else{
			$ps3=NULL;
			foreach ($ps1 as $n=>$nn){ //---- 根據已有的陣列判斷
				$am = explode($v,$nn);
				if (count($am)>1){ //數組大於一  進行 切割字元的分割
					foreach ($am as $r=>$rr){
						$ps3[] = $rr;
					}
				}else{
					$ps3[] = $nn;
				}
			}
			$ps1 = $ps3;
		}
	}
	return $ps1;
}
}


/* 縮圖程式
 * $in_width : 縮圖預定寬度
 * $in_height: 縮圖預定高度
 * $quality  : 縮圖品質(1~100)
 * ImageResize('ram/xxx.jpg', 'ram/ooo.jpg');
*/
if (!function_exists('ImageResize')) {
function ImageResize($from_filename, $save_filename, $in_width=1024, $in_height=1024, $quality=100)
{
    $allow_format = array('jpeg', 'png', 'gif');
    $sub_name = $t = '';

    // Get new dimensions
    $img_info = getimagesize($from_filename);
    $width    = $img_info['0'];
    $height   = $img_info['1'];
    $imgtype  = $img_info['2'];
    $imgtag   = $img_info['3'];
    $bits     = $img_info['bits'];
    $channels = $img_info['channels'];
    $mime     = $img_info['mime'];

    list($t, $sub_name) = split('/', $mime);
    if ($sub_name == 'jpg') {
        $sub_name = 'jpeg';
    }
	/*
    if (!in_array($sub_name, $allow_format)) {
        return false;
    }
	*/
    // 取得縮在此範圍內的比例
    $percent = getResizePercent($width, $height, $in_width, $in_height);
	if ($percent==1)
		return move_uploaded_file($from_filename,$save_filename);
    $new_width  = $width * $percent;
    $new_height = $height * $percent;

    // Resample
    $image_new = imagecreatetruecolor($new_width, $new_height);

    // $function_name: set function name
    //   => imagecreatefromjpeg, imagecreatefrompng, imagecreatefromgif
    /*
    // $sub_name = jpeg, png, gif
    $function_name = 'imagecreatefrom' . $sub_name;

    if ($sub_name=='png')
        return $function_name($image_new, $save_filename, intval($quality / 10 - 1));

    $image = $function_name($from_filename); //$image = imagecreatefromjpeg($from_filename);
    */
    $image = imagecreatefromjpeg($from_filename);

    imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    imageinterlace($image_new, 1); //--將圖片轉換為漸進式模式
    
	
    return imagejpeg($image_new, $save_filename, $quality);imagedestroy($im);
}
}
/**
 * 抓取要縮圖的比例
 * $source_w : 來源圖片寬度
 * $source_h : 來源圖片高度
 * $inside_w : 縮圖預定寬度
 * $inside_h : 縮圖預定高度
 *
 * Test:
 *   $v = (getResizePercent(1024, 768, 400, 300));
 *   echo 1024 * $v . "\n";
 *   echo  768 * $v . "\n";
 */
if (!function_exists('getResizePercent')) {
function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}
}



//---空值判斷
if (!function_exists('getResizePercent')) {
function check_NULL($dnr=NULL)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}
}




/*
	使用函數
	$string	=>	欲處理文字
	$start	=>	保留文字開始的位置
	$length	=>	取多少保留字元
*/
if (!function_exists('str_hide')) {
function str_hide($string,$start=0,$length=0){
	$temp = '';
	//-判斷是否參數字元數大於 設定的開始直
	if (strlen($string) >= $start+$length){
		$temp = substr($string,0,$start+$length);
		for ($i=1;$i<=strlen($string)-$start-$length;$i++){
			$temp .='*';
		}
	}else{//-否者依照設定文字個數輸出
		for ($i=1;$i<=strlen($string);$i++){
			$temp .= '*';
		}
	}
	return $temp;
}
}

?>
