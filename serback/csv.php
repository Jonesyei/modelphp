<?php
include_once("../includes/main_back_inc.php");

function br_replace($str){
	$search = array(
				'/\r/',
				'/\n/'
	); 	
	$str = str_replace('"','""',dequotes($str,-1)); 
	
	return preg_replace($search, '', $str); 
}

/**
  * fgetcsv
  *
  * 修正原生fgetcsv讀取中文函式
  *
  * @param CSV文件檔案
  * @param length 每一行所讀取的最大資料長度
  * @param d 資料分隔符號(預設為逗號)
  * @param e 字串包含符號(預設為雙引號)
  * @return $_csv_data
   PHP 5 使用 str_getcsv
  */
if (!function_exists('str_getcsv')) {
function str_getcsv($handle, $length = NULL, $d = ",", $e = '"') {
	 $d = preg_quote($d);
	 $e = preg_quote($e);
	 $_line = "";
	 $eof=false;
	 while ($eof != true) {
		  $_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));
		  $itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);
		  if ($itemcnt % 2 == 0){
		   $eof = true;
		  }
	 }
	
	 $_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));
	
	 $_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';
	 preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
	 $_csv_data = $_csv_matches[1];
	
	 for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
		  $_csv_data[$_csv_i] = preg_replace("/^" . $e . "(.*)" . $e . "$/s", "$1", $_csv_data[$_csv_i]);
		  $_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);
	 }
	
	 return empty ($_line) ? false : $_csv_data;
}
}
if ($_POST["act"]=="insert"){

/*
	csv 輸入
	
	pos => $_POST["title"]	//-標題
			$_POST["data_table"]	//--資料表
		 	$_POST["defrow"]	//--預設欄位
			$_POST["keyrow"]	//--預設唯一值 (用以判斷新增或是修改)
			
	$csv["title"] = 欄位名稱 EX: 'aaa,bbb,ccc' 字串格式 自動轉換陣列 要對應下方擷取語法的欄位值
	$csv["data_table"] = 來源資料表
	
*/	
$cpos["file_url"] = "../upload/temp/";
if ($cpos["file_url"] && !is_dir($cpos["file_url"])){
	mkdir($cpos["file_url"],0777,true);
}
if ($_FILES["file"]["name"]!=''||$_FILES["file"]["name"]!=NULL){
	$temp_file_name = explode('.',$_FILES["file"]["name"]);
	$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
	$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
	move_uploaded_file($_FILES["file"]["tmp_name"],$cpos["file_url"].$temp_file_name);
}





$dbname=$cpos["file_url"].$temp_file_name;
if ( !$fp = fopen($dbname,"r") ) {
	alert("匯入檔案失敗 來源可能遺失或損毀",-1);
	exit;
}else{
	//--取得資料表所有欄位資訊
	$all_row = $conn->GetArray("desc ".$_POST["data_table"]);
	
	if (!$_POST["keyrow"]) $_POST["keyrow"] = 'id';
	//資料表內所有id
	$tmp_id = $conn->GetArray("SELECT ".$_POST["keyrow"]." FROM ".$_POST["data_table"]);
	$all_id = array();
	foreach($tmp_id AS $k=>$v){
		$all_id[$k] = $v[$_POST["keyrow"]];
	}
	
	// 過濾反斜線 \ 
	$current = file_get_contents($file_path);       
	file_put_contents($file_path, addcslashes($current,'\\'));
	$size = filesize($dbname)+1;
	$row=0; //---筆數計算
	
	//--預設欄位資料
	$default_row = explode(',',$_POST["defrow"]);
	if ($default_row)
		foreach ($default_row as $k=>$v){
			$temp = explode(':',$v);
			$defrow_array[$temp[0]] = $temp[1];
		}
	
	while($temp=fgetcsv($fp,$size,",")){
		//--移除空白陣列
		if(count(array_filter($temp)) > 0){			
			if ($row>0){
				$title=explode(",",$_POST["title"]);
								
				foreach ($title as $k=>$v){ //--寫入資料欄位
					$upd[$v] = iconv('big5','utf-8',$temp[$k*1]);					
					$upd[$v] = str_replace('""','"',$upd[$v]);
					$upd[$v] = preg_replace(array('/\r/','/\n/'),'|__|', $upd[$v]);
				}
				
				//有重複id時更新資料
				if(in_array($upd[$_POST["keyrow"]],$all_id)){
					$avalue = $conn->AutoExecute($_POST["data_table"],$upd,"UPDATE",$_POST["keyrow"]."='".$upd[$_POST["keyrow"]]."'");
				}else{	
					foreach ($all_row as $k=>$v){ 
						if ($defrow_array[$v[0]]==NULL || $defrow_array[$v[0]]==''){//--判斷是否有預設資料欄位 	
							if (strtolower($v["Null"])!="yes" && !in_array(strtolower($v[0]),$title)){//--判斷該資料表非NULL欄位是否都已填入資料
								$ttt_row=explode("(",$v["Type"]);
									switch (strtolower($ttt_row[0])){
										case "int":
											$upd[$v[0]] = 0;
										break;
										case "datetime":
											$upd[$v[0]] = date("Y-m-d H:i:s");
										break;
										case "tinyint":
											$upd[$v[0]] = 0;
										break;
										default:
											$upd[$v[0]] = '';
										break;
									}
							}
						}else{
							$upd[$v[0]] = $defrow_array[$v[0]];
						}
					}
					unset($upd["id"]);
					$avalue = $conn->AutoExecute($_POST["data_table"],$upd,"INSERT");
				}
			}
			$row=$row+1;
		}
	}
	fclose($fp);
	
	unlink($dbname);//--刪除檔案
	alert("已完成匯入 共計匯入筆數 ".($row-1)." 筆",-1);
} 

	
	
	
}else{
	
/*
	csv 輸出
	
	pos => $_POST["title"]
			$_POST["sql"]
	
	$csv["title"] = 標題 EX: 'aaa,bbb,ccc' 字串格式 自動轉換陣列 要對應下方擷取語法的欄位值
	$csv["sql"] = sql 擷取語法
	
*/
if ($_POST){
	$newrow = array();
	$csv["title"] = explode(',',$_POST["title"]);
	$csv["sql"] = $_POST["sql"];
	if ($_POST['rows']) {
		$_POST['rows'] = explode('|__|',$_POST['rows']);
		foreach ($_POST['rows'] as $k=>$v){
			if (!get_magic_quotes_gpc()) {
				$temp_data = json_decode(str_replace("'",'"',$v),true);
			}else{
				$temp_data = json_decode(str_replace("'",'"',dequotes($v,-1)),true);
			}
			if (gettype($temp_data)!="NULL" && gettype($temp_data)!='string'){
				foreach ($temp_data as $a=>$b){
					$nrowi[$a] = (array) $b;
					$newrow[] = $a;
				}
			}else{
				$newrow[] = $v;
			}
		}
		$csv['sql'] = explode('from',strtolower($csv['sql']));
		$csv["sql"] = 'select '.implode(',',$newrow).' from '.$csv['sql'][1];
	}
}else{
	if (!is_array($csv["title"]) && $csv["title"]!=NULL) $csv["title"] = explode(',',$csv["title"]);
}

//--標題
$main = '';
if (is_array($csv["title"]))
foreach ($csv["title"] as $k=>$v){
	$v = iconv('utf-8','big5',$v);
	if ($main=='') {$main='"'.$v.'"';}else{$main.=',"'.$v.'"';}
}
$main.="\n";

//-內容
$csv_list = $conn->GetArray(dequotes($csv["sql"],-1));

if ($csv_list)
foreach ($csv_list as $k=>$v) { //---row
	$row_main='';
	foreach ($v as $n=>$nn){
			if (!is_numeric($n)){ //--判斷key是否為數值
				if (isset($nrowi) && count($nrowi)>0 && isset($nrowi[$n])){
					$nn = str_replace(',',' ',$nrowi[$n][$nn]); //內容逗點換空白 避免多劃一格
					$nn = iconv('utf-8','big5',br_replace($nn)); //--編碼轉換
					$nn = str_replace("|__|","\n",$nn);
				}else{
					$nn = str_replace(',',' ',$nn); //內容逗點換空白 避免多劃一格
					$nn = iconv('utf-8','big5',br_replace($nn)); //--編碼轉換
					$nn = str_replace("|__|","\n",$nn);
				}
				if ($row_main=='') {$row_main='"'.$nn.'"';}else{$row_main.=',"'.$nn.'"';}
			}
	}
	$main .= $row_main."\n";
}

$filename=date("YmdHis");

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename={$filename}.csv");
//$temp = file_get_contents($filename.'.csv');
//$temp = iconv('utf-8','big5',$temp);
//file_put_contents($filename.".csv",$temp);
echo $main;
//echo $i;
}
?>