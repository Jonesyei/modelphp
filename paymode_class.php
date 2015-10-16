<?php
/*
	金流各項串接 create by Jones
*/
class order extends order_center{
	//---------金流區域
		//--紅陽
		function homyn_pay_send($pay_bill){
			$other_row = '';
			//--串接金流
			switch ($pay_bill["paycardmode"]){
				case "1": //-信用卡
					$send_array["web"] = $pay_bill["web"] = 'S1405270149';
					$this->order_mail_send($pay_bill);
				break;
				case "2": //-超商代碼
					$send_array["web"] = $pay_bill["web"] = 'S1405270206';
					$this->order_mail_send($pay_bill);
					$send_array["email"] = $pay_bill["recive_email"];
					$send_array["DueDate"] = date("Ymd", (strtotime(date("Y-m-d H:i:s"))+604800) );//繳款期限 +7天
				break;
				case "5":
					$this->ezship_pay_send($pay_bill);
					exit;
				break;
				default: //-ATM
					$this->order_mail_send($pay_bill,1);
					exit;
				break;
			}
			
			//訂單商品取得做字串
			$car_str = '';
			$obj_list = $this->car_list($pay_bill["id"]);
			if ($obj_list)
			foreach ($obj_list as $k=>$v){
				if ($car_str!='') $car_str .= ',';
				$car_str .= $v["name"].'X'.$v["count"];			
			}
			
			$send_array["MN"] = ($pay_bill["total"]+$pay_bill["post_fee"]);
			$send_array["OrderInfo"] = $car_str;
			$send_array["Td"] = $pay_bill["order_no"];
			$send_array["sna"] = $_SESSION["login_info"]["name"];
			$send_array["DueDate"] = date("Ymd");
			$send_array["Card_Type"] = "0";
			$this->form_submit($send_array,'includes/homyn/homyu_api.php');
		}
		
		//---------金流區域
		//--EZSHIP
		function ezship_pay_send($pay_bill){
			global $_SESSION;
			$_SESSION['ezship_pay'] = $pay_bill;
			$this->order_mail_send($pay_bill,1);
			
			$LINTYPE = explode('/',$_SERVER['SERVER_PROTOCOL']);
			//--取貨付款使用
			$send_array["order_id"] = $pay_bill["order_no"];
			$send_array["rtn_url"] = $LINTYPE[0].'://'.$_SERVER['HTTP_HOST'].'/includes/ezship/ezship_ipn.php';
			$send_array["rv_name"] = $pay_bill["recive_name"];
			$send_array["rv_email"] = $pay_bill["recive_email"];
			$send_array["rv_mobile"] = $pay_bill["phone"];
			$send_array["order_amount"] = ($pay_bill["total"]*1+$pay_bill["post_fee"]*1);
			$send_array["web_para"] = md5($pay_bill["id"]);
			$send_array["rv_addr"] = $pay_bill["recive_address"];
			$send_array["rv_zip"] = $pay_bill["recive_zip"];
			
			$this->form_submit($send_array,'includes/ezship/ezship_api.php');
		}
		
		//---------金流區域
		//--玉山銀行
		function esun_pay_send($pay_bill){
			$other_row = '';
			//--串接金流
			switch ($pay_bill["paycardmode"]){
				case "1": //-信用卡
					$this->order_mail_send($pay_bill);
				break;
				case "5":
					$this->ezship_pay_send($pay_bill);
					exit;
				break;
				default: //-ATM、貨到付款
					$this->order_mail_send($pay_bill,1);
					exit;
				break;
			}
			
			$send_array['TID'] = 'EC000001'; //EC000001 刷卡 EC000002 分期
			$send_array['ONO'] = $pay_bill["order_no"]; //-訂單編號
			$send_array['TA'] = ($pay_bill["total"]+$pay_bill["post_fee"]); //-金額
			$send_array['U'] = 'http://'.$_SERVER['HTTP_HOST']."/includes/esun/esun_rcv.php"; //接收通知的接口
			
			$this->form_submit($send_array,'includes/esun/esun_api.php');
		}
		
		//---------金流區域
		//--Paypal
		//--資料,幣別
		function paypal_pay_send($pay_bill,$callback='/member.php?act=order&paybill=1',$dor='TWD'){			
			$other_row = '';
			//--串接金流
			switch ($pay_bill["paycardmode"]){
				case "1": //-paypel
					$this->order_mail_send($pay_bill);					
					
					//$site_url = "http://jelle.wd.net.tw/";	//wdnet
					$site_url = "http://waobi.com/";
					
					$send_array['cmd'] 			= "_xclick"; // "_xclick" 立即購買
					$send_array['currency_code'] 	= strtoupper($dor); //定義幣種以標示貨幣變量
					$send_array['notify_url'] 	= 'http://'.$_SERVER['HTTP_HOST']."/includes/Paypal/paypal_ipn.php"; //接收通知的接口
					$send_array['cancel_return'] 	= 'http://'.$_SERVER['HTTP_HOST']."/"; //取消支付後跳轉網址
					$send_array['return'] 		= 'http://'.$_SERVER['HTTP_HOST'].$callback; //支付成功後跳轉網址
					
					//訂單商品取得做字串
					$car_str = '';
					$obj_list = $this->car_list($pay_bill["id"]);
					if ($obj_list)
					foreach ($obj_list as $k=>$v){
						if ($car_str!='') $car_str .= ',';
						$temp = explode(',', $v["size"]);
						$car_str .= $v["name"].':'.$temp[0].' x '.$v["count"];			
					}
					
					$send_array['item_name'] = 	$car_str;
					$send_array['item_number'] = $pay_bill["order_no"];
					$send_array['amount'] = ($pay_bill["total"]+$pay_bill["post_fee"]);
				break;
				
				default : 
				
				break;
			}
			
			$this->form_submit($send_array,'includes/Paypal/paypal_api.php');
		}
		
		//---------金流區域
		//--藍新
		//付款資料,返回頁面,語系
		function neweb_pay_send($pay_bill,$callback='/member.php?act=order&paybill=1',$lang='ch'){
			global $_SERVER;
			//--串接金流
			switch ($pay_bill["paycardmode"]){
				case "1": //-信用卡
					$send_array["MerchantNumber"] = $pay_bill["MerchantNumber"] = '760656';	//商家編號
					$pay_bill["Code"] = 'abcd1234';	//加密code
					$send_array["OrderNumber"] = $carlist["OrgOrderNumber"] = $pay_bill["order_no"];
					$send_array["Amount"] = ($pay_bill["total"]+$pay_bill["post_fee"]);
					$send_array["OrgOrderNumber"] = $pay_bill["order_no"];
					$send_array["iphonepage"] = '0';
					$send_array["OrderURL"] = 'http://'.$_SERVER['HTTP_HOST'].'/includes/Neweb/feedback.php';
					$send_array["ReturnURL"] = 'http://'.$_SERVER['HTTP_HOST'].$callback;
					$send_array["checksum"] = md5($pay_bill["MerchantNumber"].$carlist["OrgOrderNumber"].$pay_bill["Code"].($pay_bill["total"]+$pay_bill["post_fee"]));
					$send_array["op"] = "AcceptPayment";
					$this->order_mail_send($pay_bill);
					
					if ($lang=='ch')
						$send_array["Englishmode"] = '0';
					else
						$send_array["Englishmode"] = '1';

				break;
				
				default : //-非信用卡
					
					if($pay_bill["paycardmode"] == 2) $paytype = "ATM";
					if($pay_bill["paycardmode"] == 3) $paytype = "WEBATM";
					if($pay_bill["paycardmode"] == 4) $paytype = "CS";
					if($pay_bill["paycardmode"] == 5) $paytype = "MMK";
				
					$send_array["MerchantNumber"] = $pay_bill["MerchantNumber"] = '460233';
					$pay_bill["Code"] = 'abcd1234';
					$send_array["ordernumber"] = $pay_bill["order_no"];
					$send_array["amount"] = ($pay_bill["total"]+$pay_bill["post_fee"]);
					$send_array["paymenttype"] = $paytype;
					$send_array["bankid"] = "007";
					
					//訂單商品取得做字串
					$car_str = '';
					$obj_list = $this->car_list($pay_bill["id"]);
					if ($obj_list)
					foreach ($obj_list as $k=>$v){
						if ($car_str!='') $car_str .= ',';
						$temp = explode(',', $v["size"]);
						$car_str .= $v["name"].':'.$temp[0].' x '.$v["count"];			
					}
								
					$send_array["paytitle"] = $car_str;
					$send_array["payname"] = $pay_bill["purchas_name"];
					$send_array["payphone"] = $pay_bill["purchas_phone"];
					$send_array["duedate"] = date("Ymd", (strtotime(date("Y-m-d H:i:s"))+604800) );//繳款期限 +7天
					$send_array["returnvalue"] = "0";
					$send_array["hash"] = md5($pay_bill["MerchantNumber"].$pay_bill["Code"].($pay_bill["total"]+$pay_bill["post_fee"]).$pay_bill["order_no"]);
					$send_array["nexturl"] = 'http://'.$_SERVER['HTTP_HOST'].$callback;
					$this->order_mail_send($pay_bill);
				break;
			}
			
			$this->form_submit($send_array,'includes/Neweb/neweb_api.php');
		}
		//*** 表單送出 (金流)
		//**  $data  form 參數
		function form_submit($data=array(),$url=NULL,$medthod="POST"){
			$temp_out = '
			<form id="form1" action="'.$url.'" method="'.$medthod.'">';
			if ($data)
			foreach ($data as $k=>$v){
				$temp_out .= '<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			$temp_out .= '</form><script>document.forms.form1.submit();</script>';	
			echo $temp_out;
			exit;
		}
}
?>