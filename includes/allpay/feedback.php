<?php 
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");
include_once($temp_nowurl[0]."member_class.php");

//--購物車
$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");

//特殊字元置換
function _replaceChar($value)
{
	$search_list = array('%2d', '%5f', '%2e', '%21', '%2a', '%28', '%29');
	$replace_list = array('-', '_', '.', '!', '*', '(', ')');
	$value = str_replace($search_list, $replace_list ,$value);
	
	return $value;
}

//產生檢查碼
function _getMacValue($hash_key, $hash_iv, $form_array)
{
	$encode_str = "HashKey=" . $hash_key;
	foreach ($form_array as $key => $value)
	{
		$encode_str .= "&" . $key . "=" . $value;
	}
	$encode_str .= "&HashIV=" . $hash_iv;
	$encode_str = strtolower(urlencode($encode_str));
	$encode_str = _replaceChar($encode_str);

	return md5($encode_str);
}	

//HashKey
$hash_key = "5294y06JbISpM5x9";
//HashIV
$hash_iv = "v77hoKGq4kWxNNIS";

$data = $_POST;
unset($data['CheckMacValue']);

/*
ob_start(); 	//打開快取

echo "data<br>";
print_r($data);
echo 'POST LIST';
echo "<pre>"; 
print_r($_POST); 
echo "</pre>";
*/


	//判斷交易狀態 -- 回傳成功，但結果有可能遭竄改，因此需和編碼內
	if($_POST['RtnCode']=="1" && $_POST['CheckMacValue']){
		//調整ksort排序規則--依自然排序法(大小寫不敏感)
		ksort($data, SORT_NATURAL |SORT_FLAG_CASE);
		
		//取得 Mac Value
		echo 'CHKCODE=';
		echo $chkstr = _getMacValue($hash_key, $hash_iv, $data);
		echo '<br>';
		
		//比較安全碼
		if(strtoupper($chkstr)==$_POST['CheckMacValue']){			  			  
		   $shopping_car->paycheck($_POST['MerchantTradeNo']);
		   echo '1|OK';			   
		}else{
		   echo '0|ErrorMessage';
		}
	}else{
		echo '0|ErrorMessage';
	}
	 
	 
/*
$info=ob_get_contents(); //得到緩衝區的內容並且賦值給$info
$file=fopen('output.html','w'); //打開文件info.txt
fwrite($file,$info); //寫入信息到info.txt
fclose($file); //關閉文件info.txt 
*/
?>