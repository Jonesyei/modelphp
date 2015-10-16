<?php

// Set to 0 once you're ready to go live
define("USE_SANDBOX", 1);

class paypel
{
		var $sale_url;
		var $sale_acc;
		function __construct($mode=FALSE)
		{
			//--設定環境url
			if ($mode == FALSE){	//live 正式付款
				$this->sale_url = 'https://www.paypal.com/cgi-bin/webscr';
				$this->sale_acc = 'jellery@ms24.hinet.net'; //paypal收款帳號
			}else{	//sandbox 測試付款
				$this->sale_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
				$this->sale_acc = 'jellery-facilitator-1@ms24.hinet.net';//paypal測試收款帳號
			}
		}
		
		//資料送出
		function data_send($data){
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			$temp_str .='<input type="hidden" name="business" value="'.$this->sale_acc.'">'; 
			$temp_str = '<form id="form1" method="post" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo $temp_str;
		}
		
}

if ($_POST){
	$sale = new paypel(USE_SANDBOX);
	$sale->data_send($_POST);
	exit;
}

?>