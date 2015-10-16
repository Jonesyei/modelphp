<?php
//include_once("../includes/main_inc.php");


class neweb
{
		var $sale_url;
		var $sale_id;
		function __construct($id,$paymode,$mode=FALSE)
		{
			
			if ($paymode){ //-- 非信用卡
					if ($mode){ //-正式
						$this->sale_url = 'https://testmaple2.neweb.com.tw/CashSystemFrontEnd/Payment';
					}else{	//非正式
						$this->sale_url = 'https://testmaple2.neweb.com.tw/CashSystemFrontEnd/Payment';
					}
			}else{//--信用卡
					if ($mode){ //-正式
						$this->sale_url = 'https://testmaple2.neweb.com.tw/NewebmPP/cdcard.jsp';
					}else{	//非正式
						$this->sale_url = 'https://testmaple2.neweb.com.tw/NewebmPP/cdcard.jsp';
					}
			}

			$this->sale_id = $id;
		}
		
		//資料送出
		function data_send($data){
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			$temp_str = '<form id="form1" method="post" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo $temp_str;
		}
		
}



if ($_POST){
	$sale = new neweb($_POST["web"],$_POST["paymenttype"]);
	$sale->data_send($_POST);
	exit;
}

?>