<?php
//-環境狀態
define("USE_SANDBOX", false);
$member_id = '8089009467';//特店代號
$member_key = 'EOVVASTMGPBIWUFQEKOREYEHSUJRN1EB';
class paypel
{
		var $sale_url;
		var $sale_acc;
		var $sale_key;
		function __construct($acc,$key,$mode=FALSE)
		{
			//--設定環境url
			if ($mode == FALSE){	//live 正式付款
				$this->sale_url = 'https://acqtest.esunbank.com.tw/acq_online/online/sale42.htm';
			}else{	//sandbox 測試付款
				$this->sale_url = 'https://acq.esunbank.com.tw/acq_online/online/sale42.htm';
			}
			$this->sale_acc = $acc;
			$this->sale_key = $key;
		}
		
		//資料送出
		function data_send($data){
			
			if (!isset($data['CID'])){
				$data['CID'] = '';
			}
			
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			$temp_key_str = $this->sale_acc.'&'.$data['CID'].'&'.$data['TID'].'&'.$data['ONO'].'&'.$data['TA'].'&'.$data['U'].'&'.$this->sale_key;

			$temp_str .='<input type="hidden" name="MID" value="'.$this->sale_acc.'">'; 
			$temp_str .='<input type="hidden" name="M" value="'.strtolower(md5($temp_key_str)).'">'; 
			$temp_str = '<form id="form1" method="post" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo $temp_str;
		}
		
}

if ($_POST){
	$sale = new paypel($member_id,$member_key,USE_SANDBOX);
	$sale->data_send($_POST);
	exit;
}

?>