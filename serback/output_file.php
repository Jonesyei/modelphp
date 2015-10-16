<?php
/*
產品檔案匯出下載功能 create by Jones
create_date : 2015/01/21

VER 1.0
*/
class Zipper extends ZipArchive {  //--繼承原有ZipArchive
    
public function addDir($path,$onlystatus=false) { 
    //print 'adding ' . $path . '<br>'; 
    $this->addEmptyDir($path); 
    $nodes = glob($path . '/*');
    foreach ($nodes as $node) { 
        //print $node . '<br>'; 
        if (is_dir($node)) { 
            if (!$onlystatus){
				$this->addDir($node); 
			}
        } else if (is_file($node))  { 
            $this->addFile($node); 
        } 
    } 
} 
    
}

/********************************************************************************/
include_once("../includes/main_back_inc.php");


$zip = new Zipper;


$ourFileName = "testFile.zip";
if ($zip->open($ourFileName, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE)) {
	$zip->addDir('../upload/products'); 
	$zip->addDir('../upload',true); 
    $zip->close();
} else {
	alert('匯出檔案資料失敗!!','/');
	exit;
}

$filename=date("YmdHis");
header("Content-type: application/zip, application/octet-stream");
header("Content-Disposition: attachment; filename={$filename}.zip");
readfile($ourFileName);
unlink($ourFileName);
?>