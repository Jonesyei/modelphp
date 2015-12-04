<?php
/*
	[網動廣告科技] (C)2007- 104portal Well Done! Inc.
	統一編號：28484688  電話：02-2707-3122  傳真：02-2701-3122
  台北市大安區復興南路二段88號9樓之1(近大安捷運站，大安高工旁)

	[ Well Done and its suppliers. All rights reserved. ]
*/

header("Content-type:image/png");
header("Content-Disposition:filename=image_code.png");

if (!isset($_SESSION)) { session_start(); }

unset($_SESSION['serback__validate_code']);
unset($_SESSION['vlcode']);

//session_register('__validate_code');
//if(array_key_exists('__validate_code', $_SESSION)){
//	$_SESSION['__validate_code'] = "";
//}
$_SESSION['serback__validate_code'] = "";


mt_srand((double)microtime()*1000000);


$verification__session = '';


$str = 'ABCDEFGHJKMNPQRSTUVWXY23456789';

$len = strlen($str); 


for($i=0; $i<4; $i++){
   $num=rand(0,$len-1);
   $verification__session.= $str[$num];
}
$_SESSION["vlcode"] = $verification__session;
$_SESSION["serback__validate_code"] = md5($verification__session);

$imageWidth = 122; 
$imageHeight = 32;

$im = @imagecreatetruecolor($imageWidth, $imageHeight)
or die("無法建立圖片！");



$bgColor = imagecolorallocate($im, 255,255,255);


$Color = imagecolorallocate($im, 49,0,206);

$gray1 = imagecolorallocate($im, 156,154,156);

$gray2 = imagecolorallocate($im, 0,250,200);


imagefill($im,0,0,$bgColor);
//add by peter
//參數

//--edit by Jones 多字形選擇
$jfont_array = array ('mywanderingheart.ttf','Comic Sandchez.ttf','ShellMuseum.ttf');

$multi_text_color = "#969696"; //#0a68dd,#f65c47,#8d32fd,#EE3B3B,#E066FF,#B452CD,#FF9900,
$use_transparent_text = true;
$text_transparency_percentage = 0;
$text_color = "#ff0000";
$text_x_start = 8;
$image_height = 32;
$font_size = 18;
$text_angle_minimum = 0;
$text_angle_maximum = 0;
$text_maximum_distance = 28;
$text_minimum_distance = 26;
//$ttf_file = "../elephant.ttf";
$ttf_file = "../font/".$jfont_array[rand(0,count($jfont_array)-1)];
$use_multi_text = true;



//--畫線
for($i=0; $i<rand(1,10); $i++){
   imageline($im,rand(0,$imageWidth),rand(0,$imageHeight),
   rand($imageHeight,$imageWidth),rand(0,$imageHeight),$gray1);
}
//$font = "1.ttf"; 

//add by peter
//code Generate
if($use_transparent_text == true) {
	$alpha = intval($text_transparency_percentage / 100 * 127);
	$font_color = imagecolorallocatealpha($im, hexdec(substr($text_color, 1, 2)), hexdec(substr($text_color, 3, 2)), hexdec(substr($text_color, 5, 2)), $alpha);
  } else { //no transparency
	$font_color = imagecolorallocate($im, hexdec(substr($text_color, 1, 2)), hexdec(substr($text_color, 3, 2)), hexdec(substr($text_color, 5, 2)));
  }
  $x = $text_x_start;
  $strlen = strlen($verification__session);
  $y_min = ($image_height / 2) + ($font_size / 2) - 2;
  $y_max = ($image_height / 2) + ($font_size / 2) + 2;
  $colors = explode(',', $multi_text_color);

  for($i = 0; $i < $strlen; ++$i) {
	$angle = rand($text_angle_minimum, $text_angle_maximum);
	$y = rand($y_min, $y_max);
	if ($use_multi_text == true) {
	  $idx = rand(0, sizeof($colors) - 1);
	  $r = substr($colors[$idx], 1, 2);
	  $g = substr($colors[$idx], 3, 2);
	  $b = substr($colors[$idx], 5, 2);
	  if($use_transparent_text == true) {
		$font_color = imagecolorallocatealpha($im, "0x$r", "0x$g", "0x$b", $alpha);
	  } else {
		$font_color = imagecolorallocate($im, "0x$r", "0x$g", "0x$b");
	  }
	}
	$font_color = imagecolorallocate($im, rand(0,150), rand(0,150), rand(0,150)); //--隨機色彩
	@imagettftext($im, $font_size, $angle, $x, $y, $font_color, $ttf_file, $verification__session[$i]);

	$x += rand($text_minimum_distance, $text_maximum_distance);
  } //for loop
/*imagettftext($im, 28, 0, 29, 28, $Color,$font,$verification__session);*/
//邊框
$borderColor=imagecolorallocate($im,"0x99","0x99","0x99");
$borderColor=imagecolorallocate($im,'129','186','213');
imagerectangle($im,0,0,$imageWidth-1,$imageHeight-1,$borderColor);

//for($i=0;$i<250;$i++){
//	$idx = rand(0, sizeof($colors) - 1);
//	$r = substr($colors[$idx], 1, 2);
//	$g = substr($colors[$idx], 3, 2);
//	$b = substr($colors[$idx], 5, 2);
//	$gray2 = imagecolorallocate($im, "0x$r", "0x$g", "0x$b");
//	imagesetpixel($im, rand(1, $imageWidth) ,	rand(1,$imageHeight) , $gray2);
//}

imagepng($im);
imagedestroy($im);

?>
