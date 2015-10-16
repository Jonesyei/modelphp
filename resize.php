<?php
header('Content-type: image/jpeg');

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
function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}

//開啟圖片
function open_image ($file){	
    $size = getimagesize($file);
    switch($size["mime"]){
    	case "image/jpeg":
            $im = imagecreatefromjpeg($file); //jpeg file
        break;
        case "image/gif":
            $im = imagecreatefromgif($file); //gif file
      	break;
     	case "image/png":
          	$im = imagecreatefrompng($file); //png file
      	break;
    	default: 
        	$im=false;
    	break;
    }
    return $im;
}

$url = $_GET['url'];						//檔案位置
$new_w = ($_GET['w'])? $_GET['w'] : 1000;	//縮圖預定寬度
$new_h = ($_GET['h'])? $_GET['h'] : 1000;	//縮圖預定高度
$check_img = 0;								//檢查是否有縮圖 0無 1有


//存檔位置，沒有的話建立資料夾
$gdir = (!$_GET["dir"]) ? 'resize':$_GET["dir"];
$save_filename = 'upload/'.$gdir.'/';

if ($save_filename && !is_dir($save_filename)){
	mkdir($save_filename,0777,true);
}else{	
	$file = strtolower(basename($url));
	if (is_file($save_filename.$file)!=NULL && (filemtime($save_filename.$file) >= strtotime("-3 days")) ){
		$check_img = 1;
		$image = open_image($save_filename.$file);
		imagejpeg($image);
	}
}

//資料夾無縮圖時，建立縮圖
if($check_img != 1){
	//開啟圖片
	$image = open_image($url);
	if($image === false)  die ('Unable to open image'); 
	
	//原始圖片 size
	$w = imagesx($image);
	$h = imagesy($image);
	
	//縮圖比例
	$percent = getResizePercent($w, $h, $new_w, $new_h);
	
	//比預設縮圖小就不用縮
	if($percent==1){
		imagejpeg($image,$save_filename.strtolower(basename($url)));
		imagejpeg($image);
	}else{
		$new_w  = $w * $percent;
		$new_h  = $h * $percent;
		
		//建立縮圖圖片
		$im2 = ImageCreateTrueColor($new_w, $new_h);
		imagecopyResampled($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
		imagejpeg($im2, $save_filename.strtolower(basename($url)));
		imagejpeg($im2);
		imagedestroy($im2);
	}
}

imagedestroy($image);



?>