<?php
/*
	檔案重新讀載 含授權功能
	create by Jones
	
	參數
	$_GET["namespace"]	= 'jones_demo'; //模組別名
	$_GET["file"]		= '檔案路徑名稱'; //檔案路徑
	
	
	STEP 01
	請將下列語法加入載入檔案前的PHP檔案中:
	$_SESSION['file_auth']['jones_demo'] = '1';
	$_SESSION["fileauth_array"]['jones_demo']=array();
	$_SESSION["fileauth_time_array"]['jones_demo']=array();
	//#以上 jones_demo 請更換為 自己想要的模組別名
	
	STEP 02
	請將前端路徑、連結加入本檔案位置:
	fileauth.php?namespace={模組別名}&file={含路徑檔案名稱}
*/

$time_set = 1; //--授權秒數
$file_namespace = ($_GET["namespace"] ? $_GET["namespace"]:'jones_demo');
$file_url = ($_GET["file"] ? $_GET["file"]:'upload/test.mp4');

session_start();
if ($_SESSION['file_auth'][$file_namespace]!='1') {echo '授權失敗!!';exit;}

if (is_file($file_url)){
	if (
	is_array($_SESSION["fileauth_array"][$file_namespace])
	&& in_array(base64_encode($file_url),$_SESSION["fileauth_array"][$file_namespace])
	&& strtotime(date("Y-m-d H:i:s"))>=$_SESSION["fileauth_time_array"][$file_namespace][array_search(base64_encode($file_url),$_SESSION["fileauth_array"][$file_namespace])]*1+$time_set
	) {
		echo '已超過授權時限!!';exit;
	}
	header("Content-type: ".get_mime_type($file_url));
	header("Pragma:no-cache"); 
	header("Expires:0");
	if (isset($_SERVER['HTTP_RANGE'])){ // 支援各種裝置 僅不支援IPHONE
		rangeDownload($file_url);
	} else {
		header("Content-length: " . filesize($file_url));
		readfile($file_url);
	} 
	$_SESSION["fileauth_array"][$file_namespace][]=base64_encode($file_url);
	$_SESSION["fileauth_time_array"][$file_namespace][]=strtotime(date("Y-m-d H:i:s"));
} 







function rangeDownload($file){
	global $_SESSION;
	$fp = @fopen($file, 'rb');

	$size   = filesize($file); // 文件大小
	$length = $size;           // 內容長度
	$start  = 0;               // 起始字節
	$end    = $size - 1;       // 結束字節
	// http://www.w3.org/Protocols/rfc2616/rfc2616-sec19.html#sec19.2.3
	
	header("Accept-Ranges: 0-$length");
	
	if (isset($_SERVER['HTTP_RANGE'])){
		$c_start = $start;
		$c_end   = $end;

		// 取得範圍中字段
		list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
		if (strpos($range, ',') !== false){
			header('HTTP/1.1 416 Requested Range Not Satisfiable');
			header("Content-Range: bytes $start-$end/$size");
			exit;
		}
		
		if ($range{0} == '-'){
			$c_start = $size - substr($range, 1);
		} else {
			$range  = explode('-', $range);
			$c_start = $range[0];
			$c_end   = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
		} 
		$c_end = ($c_end > $end) ? $end : $c_end;

		if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size){
			header('HTTP/1.1 416 Requested Range Not Satisfiable');
			header("Content-Range: bytes $start-$end/$size");
			exit;
		}

		$start  = $c_start;
		$end    = $c_end;
		$length = $end - $start + 1; // 計算新內容長度
		fseek($fp, $start);
		header('HTTP/1.1 206 Partial Content');
	} 

	header("Content-Range: bytes $start-$end/$size");
	header("Content-Length: $length");
	
	// 啟動緩衝下載
	$buffer = 1024 * 8;
	while(!feof($fp) && ($p = ftell($fp)) <= $end){
		if ($p + $buffer > $end){
			// In case we're only outputtin a chunk, make sure we don't
			// read past the length
			$buffer = $end - $p + 1;
		} 

		set_time_limit(0); // Reset time limit for big files
		echo fread($fp, $buffer);
		flush(); // Free up memory. Otherwise large files will trigger PHP's memory limit.
	} 

	fclose($fp);
} 

function get_mime_type($file)
{

        // our list of mime types
        $mime_types = array(
                "pdf"=>"application/pdf"
                ,"exe"=>"application/octet-stream"
                ,"zip"=>"application/zip"
                ,"docx"=>"application/msword"
                ,"doc"=>"application/msword"
                ,"xls"=>"application/vnd.ms-excel"
                ,"ppt"=>"application/vnd.ms-powerpoint"
                ,"gif"=>"image/gif"
                ,"png"=>"image/png"
                ,"jpeg"=>"image/jpg"
                ,"jpg"=>"image/jpg"
                ,"mp3"=>"audio/mpeg"
                ,"wav"=>"audio/x-wav"
                ,"mpeg"=>"video/mpeg"
                ,"mpg"=>"video/mpeg"
                ,"mpe"=>"video/mpeg"
				,"mp4"=>"video/mp4"
                ,"mov"=>"video/quicktime"
                ,"avi"=>"video/x-msvideo"
                ,"3gp"=>"video/3gpp"
                ,"css"=>"text/css"
                ,"jsc"=>"application/javascript"
                ,"js"=>"application/javascript"
                ,"php"=>"text/html"
                ,"htm"=>"text/html"
                ,"html"=>"text/html"
        );

        $extension = strtolower(end(explode('.',$file)));

        return $mime_types[$extension];
}
?>