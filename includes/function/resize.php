<?php

/**
 The MIT License
 *
 * 抓取要縮圖的比例, 下述只處理 jpeg
 * $from_filename : 來源路徑, 檔名, ex: /tmp/xxx.jpg
 * $save_filename : 縮圖完要存的路徑, 檔名, ex: /tmp/ooo.jpg
 * $in_width : 縮圖預定寬度
 * $in_height: 縮圖預定高度
 * $quality  : 縮圖品質(1~100)
 *
 * Usage:
 *   ImageResize('ram/xxx.jpg', 'ram/ooo.jpg');
 */
function ImageResize($from_filename, $save_filename, $in_width=9999, $in_height=9999, $quality=100)
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
	
	
	if($width>1500 || $height>1500)//terry add  size over
	{
		return false;
		exit;
	}
	

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
	  	return imagejpeg($image_new, $save_filename, $quality);
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
function getResizePercent($source_w, $source_h, $inside_w, $inside_h)
{
    if ($source_w < $inside_w && $source_h < $inside_h) {
        return 1; // Percent = 1, 如果都比預計縮圖的小就不用縮
    }

    $w_percent = $inside_w / $source_w;
    $h_percent = $inside_h / $source_h;

    return ($w_percent > $h_percent) ? $h_percent : $w_percent;
}








class WaxImage 
{
    private $image;
    private $image_type;

    /**
     * 載入影像檔
     * @param $filename      Path to the image file.
     */
    function __construct($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
        else {
            throw new Exception("Not support this image type.");
        }
        if(!$this->image)
            throw new Exception("Failed to load image file.");
    }
    
    /**
     * 另存新檔
     * @param $filename     The path to save the file to. If not set 
     *        or NULL, the raw image stream will be outputted directly.
     * @param $compression  $compression is optional, and ranges from  
     *        0 (worst quality, smaller file) to 100 (best quality,  
     *        biggest file). The default is the default IJG quality  
     *        value (about 75). 
     */
    function saveAs($filename, $compression=75) 
    {
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $ret = imagejpeg($this->image, $filename, $compression);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $ret = imagegif($this->image, $filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $ret = imagepng($this->image, $filename);
        }
        if(empty($ret))
            throw new Exception("Faild to save file.");
    }
    
    /**
     * 取得影像寛度
     * @return Return the width of the image or FALSE on errors.
     */
    function getWidth() 
    {
        return imagesx($this->image);
    }

    /**
     * 取得影像高度
     * @return Return the height of the image or FALSE on errors.
     */
    function getHeight()
    {
        return imagesy($this->image);
    }

    /**
     * 縮放影像的高度，並依比例縮放影像的寛度
     * @param $height    The new height to
     */
    function resizeToHeight($height) 
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }
    
    /**
     * 縮放影像的寛度，並依比例縮放影像的高度
     * @param $width    The new width to
     */
    function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    /**
     * 依設定的比例縮放影像的大小
     * @param $scale    The resize percentage
     */
    function resizeToScale($scale)
    {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100; 
        $this->resize($width, $height);
    }
    
    /**
     * 依據設定的新大小縮放影像
     * @param $width    The new image width
     * @param $height   The new image height
     */
    function resize($width, $height) 
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 
            0, 0, 0, 0, 
            $width, $height, $this->getWidth(), $this->getHeight());
        imagedestroy($this->image);
        $this->image = &$new_image;   
    }
    
    /**
     * 縮放影像的大小為正方形的圖片
     * @param $size      Specify new square size
     * @param $expand    Expand or cut to square
     * @param $bg_r      Background(red)
     * @param $bg_b      Background(blue)
     * @param $bg_g      Background(green)
     */
    function resizeToSquare(
        $size, 
        $expand=false, 
        $bg_r=255, $bg_b=255, $bg_g=255)
    {
        $width =  $this->getWidth();
        $height = $this->getheight();
        $new_size = $expand ? min($width, $height) : max($width, $height);
        $new_img = imagecreatetruecolor($new_size, $new_size);

        if(!$expand) {
            $dest_x = $dest_y = 0;
            if($width > $height)
                $dest_y = ceil(($new_size - $height) / 2);
            else
                $dest_x = ceil(($new_size - $width) / 2);
            $bg = imagecolorallocate($new_img, $bg_r, $bg_b, $bg_g);
            imagefill($new_img, 0, 0, $bg);
            imagecopy($new_img, $this->image, 
                $dest_x, $dest_y, 0, 0, 
                $width, $height);
        }
        else {
            $src_x = $src_y = 0;
            if($width > $height)
                $src_x = ceil(($width - $new_size) / 2);
            else
                $src_y = ceil(($height - $new_size) / 2);
            imagecopy($new_img, $this->image, 
                0, 0, $src_x, $src_y, 
                $new_size, $new_size);
        }

        $resize_image = imagecreatetruecolor($size, $size);
        imagecopyresampled($resize_image, $new_img, 
            0, 0, 0, 0, 
            $size, $size, $new_size, $new_size);
        imagedestroy($new_img);
        imagedestroy($this->image);
        $this->image = &$resize_image;   
    }

    /**
     *  Release resource 
     */
    public function __destruct()
    {
        imagedestroy($this->image);
    }
}


?>