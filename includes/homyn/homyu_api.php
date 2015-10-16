<?php
//include_once("../includes/main_inc.php");


class homyu
{
		var $sale_url;
		var $sale_id;
		var $sale_key;
		function __construct($id,$key,$mode=FALSE)
		{
			//--設定環境url
			if ($mode){
				$this->sale_url = 'https://www.esafe.com.tw/Service/Etopm.aspx';
			}else{
				$this->sale_url = 'https://test.esafe.com.tw/Service/Etopm.aspx';
			}
			$this->sale_id = $id;
			$this->sale_key = $key;
		}
		
		//資料送出
		function data_send($data){
			//$data["ChkValue"] = hash_hmac("sha1", $payload, "thisisarandomkey", true);
			$data["ChkValue"] = strtoupper(sha1($this->sale_id.$this->sale_key.$data["MN"]));
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			$temp_str = '<form id="form1" method="post" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo $temp_str;
			echo $this->sale_id.$this->sale_key.$data["MN"];
		}
		
}


$member_key = 'Aa10270601'; //--商家密碼

if ($_POST){
	$sale = new homyu($_POST["web"],$member_key,1);
	$sale->data_send($_POST);
	exit;
}

?>