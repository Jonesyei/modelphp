<?php
//-環境狀態
define("USE_SANDBOX", true);
//特店代號
$member_id = '2000132'; ///2000132
//HashKey
$hash_key = "5294y06JbISpM5x9";
//HashIV
$hash_iv = "v77hoKGq4kWxNNIS";



//特店代號
$member_id = '1130859'; ///2000132
//HashKey
$hash_key = "d6l2sx8saTP23kzn";
//HashIV
$hash_iv = "i1nOXXYfY4gjZgyF";

class paypel
{
		var $sale_url;
		var $sale_acc;
		var $sale_key;
		function __construct($acc,$key,$iv,$mode=FALSE)
		{
			//--設定環境url
			if ($mode == true){	//live 正式付款
				$this->sale_url = 'https://payment.allpay.com.tw/Cashier/AioCheckOut';
			}else{	//sandbox 測試付款
				$this->sale_url = 'https://payment-stage.allpay.com.tw/Cashier/AioCheckOut';
			}
			$this->sale_acc = $acc;
			$this->sale_key = $key;
			$this->sale_iv =  $iv;
		}
		
		//資料送出
		function data_send($data){
			$data['MerchantID'] = $this->sale_acc;
			$data['MerchantTradeDate'] = date("Y/m/d H:i:s");
			$data['PaymentType'] = "aio";
			$data['NeedExtraPaidInfo'] = "Y";
			
			//調整ksort排序規則--依自然排序法(大小寫不敏感)
     		ksort($data, SORT_NATURAL |SORT_FLAG_CASE);
			
			//取得 Mac Value
			$data['CheckMacValue'] = $this->_getMacValue($this->sale_key, $this->sale_iv, $data);
									
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			
			$temp_str = '<meta http-equiv=Content-Type content=text/html; charset=utf-8><form id="form1" method="post" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo $temp_str;
			
		}
		
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
			$encode_str = $this->_replaceChar($encode_str);
	
			return md5($encode_str);
		}		
}

if ($_POST){
	$sale = new paypel($member_id,$hash_key,$hash_iv,USE_SANDBOX);
	$sale->data_send($_POST);
	exit;
}

?>