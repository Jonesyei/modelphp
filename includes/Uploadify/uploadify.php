<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
$dirtemp_name =  explode('include',dirname(__FILE__));
$dirtemp_name = $dirtemp_name[0];
define('APP_PATH',$dirtemp_name);
$ini_webset = parse_ini_file(APP_PATH."includes/config/web_set.ini",true);

session_start();

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	//$targetFile =  str_replace('//','/',$targetPath) . $_FILES["Filedata"]["name"];
	
	//-判斷是否超過限制空間大小
	if ($ini_webset["web_set"]["upload_max_size"]*1<$ini_webset["web_set"]["now_file"]*1+$_FILES["Filedata"]["size"]*1){
		echo $ini_webset["web_set"]["upload_full_msg"];
		exit;
	}
	
	//------判斷是否有這個資料夾 沒有就創建一個
	if (!is_dir($targetPath)){
		mkdir($targetPath,0777,true);
	}
	$microtime = microtime();
	$microtime = substr($microtime,2,8);
	$file_name = explode(".",$_FILES["Filedata"]["name"]);
	$file_name = $microtime.".".$file_name[count($file_name)-1];
	if ($ini_webset["web_set"]["uploadfile_rename"]==='0') $file_name = $_FILES["Filedata"]["name"];
	$targetFile =  str_replace('//','/',$targetPath) . $file_name;
	

	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		//$_SESSION["serbackpicupload"] = 

		move_uploaded_file($tempFile,(strtoupper(substr(PHP_OS, 0, 3)) == 'WIN' ? iconv("UTF-8", "big5",$targetFile):$targetFile));
		
		
		/*
		$width="1000";
		$height="1000";
		ImageResize($targetFile,$targetFile,$width,$height);
		*/
		/*
		if ($_GET["watermark"]){
			if (!$_GET["act"]) $_GET["act"] = true;
			//print_r(array($targetFile,str_replace('//','/',$targetPath).$_GET["watermark"],NULL,$_GET["act"]));
			watermark($targetFile,str_replace('//','/',$targetPath).$_GET["watermark"],NULL,$_GET["act"]);
		}
		*/
		
		//--記憶暫存資料 add by Jones 20150707
		$file_temp_dpie = explode('/',$targetFile);
		$file_temp_dpie = $file_temp_dpie[count($file_temp_dpie)-1];
		$_SESSION["upload_temp"][] = $file_temp_dpie;
		
		
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
	// } else {
	// 	echo 'Invalid file type.';
	// }
}




//縮圖function
function ImageResize($from_filename, $save_filename, $in_width=400, $in_height=300, $quality=100)
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

    if (!in_array($sub_name, $allow_format)) {
        return false;
    }

    // 取得縮在此範圍內的比例
    $percent = getResizePercent($width, $height, $in_width, $in_height);
    $new_width  = $width * $percent;
    $new_height = $height * $percent;

    // Resample
    $image_new = imagecreatetruecolor($new_width, $new_height);
    // $function_name: set function name
    //   => imagecreatefromjpeg, imagecreatefrompng, imagecreatefromgif
    /*
    // $sub_name = jpeg, png, gif
    $function_name = 'imagecreatefrom'.$sub_name;
    $image = $function_name($filename); //$image = imagecreatefromjpeg($filename);
    */
	if($sub_name=="png")
	{
    	$image = imagecreatefrompng($from_filename);
		imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		return imagepng($image_new, $save_filename, $quality);
	}
	else if($sub_name=="gif")
	{
		$image = imagecreatefromgif($from_filename);
		imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		return imagegif($image_new, $save_filename, $quality);
	}
	else
	{
		$image = imagecreatefromjpeg($from_filename);
		imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		imageinterlace($image, 1); //--將圖片轉換為漸進式模
	  	return imagejpeg($image_new, $save_filename, $quality);
	}
}

function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}
//縮圖function end





//---水印function
/*
exsample:
原圖,mark,輸出,圖片類型是否為透明圖
 watermark(‘source.jpg’, ‘watermark.png’, ‘s-and-w.jpg’);
*/
function watermark($from_filename, $watermark_filename, $save_filename=NULL,$act=true)
{
    $allow_format = array('jpeg', 'png', 'gif');
    $sub_name = $t = '';

	//--判斷目標圖片空值則取代原圖
	if ($save_filename==NULL) $save_filename = $from_filename;
	
	
    // 原圖
    $img_info = getimagesize($from_filename);
    $width    = $img_info['0'];
    $height   = $img_info['1'];
    $mime     = $img_info['mime'];

    list($t, $sub_name) = explode('/', $mime);
    if ($sub_name == 'jpg')
        $sub_name = 'jpeg';

    if (!in_array($sub_name, $allow_format))
        return false;

    $function_name = 'imagecreatefrom' . $sub_name;
    $image     = $function_name($from_filename);

    // 浮水印
    $img_info = getimagesize($watermark_filename);
    $w_width  = $img_info['0'];
    $w_height = $img_info['1'];
    $w_mime   = $img_info['mime'];

    list($t, $sub_name) = explode('/', $w_mime);
    if (!in_array($sub_name, $allow_format))
        return false;

    $function_name = 'imagecreatefrom' . $sub_name;
    $watermark = $function_name($watermark_filename);

    $watermark_pos_x = abs($width  - $w_width);
    $watermark_pos_y = abs($height - $w_height);

	if (!$act){
		//--非透明背景圖
	    imagecopymerge($image, $watermark, $watermark_pos_x, $watermark_pos_y, 0, 0, $w_width, $w_height, 100);
	}else{
		// 浮水印的圖若是透明背景、透明底圖, 需要用下述兩行
		imagesetbrush($image, $watermark);
		imageline($image, $watermark_pos_x, $watermark_pos_y, $watermark_pos_x, $watermark_pos_y, IMG_COLOR_BRUSHED);
	}
	
	imageinterlace($image, 1); //--將圖片轉換為漸進式模
    return imagejpeg($image, $save_filename);
}


?>