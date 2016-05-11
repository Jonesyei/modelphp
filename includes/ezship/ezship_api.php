<?php
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");


// Set to 0 once you're ready to go live
define("account", 'jsp@ktunival.com.tw');
//header("Content-Type:text/html; charset=Big5");
//$post_url_add = '/kuen';

class ezship
{
		var $account;
		var $sale_url;
		var $shop_url_setp1;
		var $shop_url_setp2;
		var $act = 'shop';
		function __construct($account='')
		{
			$this->account = $account;
			//$this->sale_url = 'https://www.ezship.com.tw/emap/rv_request_web.jsp'; //--
			$this->sale_url = 'https://www.ezship.com.tw/emap/ezship_request_order_api.jsp';
			
			$this->shop_url_setp1 = 'http://map.ezship.com.tw/ezship_map_web.jsp';
			$this->shop_url_setp2 = 'https://www.ezship.com.tw/emap/ezship_request_order_api.jsp';
		}	
		//--超商取貨
		function isshop(){
			$this->act = 'shop';
		}
		//--取貨付款
		function istake(){
			$this->act = 'ontake';
		}
		
		//資料送出
		function data_send($data){
			if ($this->act=='shop'){
				$this->shop($data);
			}else{
				$this->ontake($data);
			}
		}
		
		//--超商取貨處理
		function shop($data){
			global $_SESSION;
			global $_GET;
			global $_REQUEST;
			global $_POST;
			global $post_url_add;
			//--收到店號表示 以傳輸第一步資料
			if ($_REQUEST["stCode"]){

				$temp_str .='<input type="hidden" name="su_id" value="'.$this->account.'">';
				$temp_str .='<input type="hidden" name="order_id" value="'.$_SESSION['ezship_pay']["order_no"].'">';
				$temp_str .='<input type="hidden" name="order_status" value="A02">';
				$temp_str .='<input type="hidden" name="order_type" value="1">';
				$temp_str .='<input type="hidden" name="order_amount" value="'.($_SESSION['ezship_pay']["total"]*1+$_SESSION['ezship_pay']["post_fee"]*1).'">';
				$temp_str .='<input type="hidden" name="rv_name" value="'.$_SESSION['ezship_pay']["recive_name"].'">';
				$temp_str .='<input type="hidden" name="rv_email" value="'.$_SESSION['ezship_pay']["recive_email"].'">';
				$temp_str .='<input type="hidden" name="rv_mobile" value="'.$_SESSION['ezship_pay']["phone"].'">';
				$temp_str .='<input type="hidden" name="rv_addr" value="'.$_SESSION['ezship_pay']["recive_address"].'">';
				$temp_str .='<input type="hidden" name="st_code" value="'.$_REQUEST['stCate'].$_REQUEST["stCode"].'">';
				$temp_str .='<input type="hidden" name="rtn_url" value="'.'http://'.$_SERVER['HTTP_HOST'].$post_url_add."/includes/ezship/ezship_ipn.php".'">';

/*				
				$alink .= $this->shop_url_setp2."?suID=".$this->account.'&order_id='.$_SESSION['ezship_pay']["order_no"].'&order_status=A02&order_type=1&order_amount='.($_SESSION['ezship_pay']["total"]*1+$_SESSION['ezship_pay']["post_fee"]*1).'&rv_name='.$_SESSION['ezship_pay']["recive_name"].'&rv_email='.$_SESSION['ezship_pay']["recive_email"].'&rv_mobile='.$_SESSION['ezship_pay']["phone"].'&rv_addr='.$_SESSION['ezship_pay']["recive_address"].'&st_code='.$_REQUEST['stCate'].$_REQUEST["stCode"].'&rtn_url='.'http://'.$_SERVER['HTTP_HOST'].$post_url_add."/includes/ezship/ezship_ipn.php";
				
				echo iconv("UTF-8", "Big5",$alink);
*/			
				$temp_str = '<form id="form1" method="get" action="'.$this->shop_url_setp2.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
				
			}else{ //-- 第一步
				$temp_str .='<input type="hidden" name="suID" value="'.$this->account.'">';
				$temp_str .='<input type="hidden" name="processID" value="'.$_SESSION['ezship_pay']["order_no"].'">';

				$temp_str .='<input type="hidden" name="rtURL" value="'.'http://'.$_SERVER['HTTP_HOST'].$post_url_add."/includes/ezship/ezship_api.php".'">';
				$temp_str = '<form id="form1" method="get" action="'.$this->shop_url_setp1.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			}
//			if ($_SESSION['ezship_pay'])
			echo iconv("UTF-8", "Big5",$temp_str);
		}
		
		///---取貨付款處理
		function ontake($data){
			foreach ($data as $k=>$v){
				$temp_str .='<input type="hidden" name="'.$k.'" value="'.$v.'">';
			}
			/*
			A01 超商取貨新訂單，不需在ezShip上確認訂單，可直接印單 (回覆sn_id)
			A02 超商取貨新訂單，需在ezShip上確認訂單，確認後才可進行印單 (預設值, 回覆
			sn_id)
			A03 超商取貨新訂單，使用 輕鬆袋或迷你袋 (不回覆sn_id，不需在ezShip上確認訂單
			，需登錄編號)
			A04 超商取貨新訂單，使用 輕鬆袋或迷你袋 (不回覆sn_id，需在ezShip上確認訂單，
			需登錄編號)
			A05 宅配新訂單，不需在ezShip上確認訂單，可直接印單 (回覆sn_id，10碼數字)
			*/
			$temp_str .='<input type="hidden" name="order_status" value="A05">';//1 取貨付款 3 取貨不付款
			$temp_str .='<input type="hidden" name="order_type" value="1">';//1 取貨付款 3 取貨不付款
			$temp_str .='<input type="hidden" name="su_id" value="'.$this->account.'">';
			$temp_str = '<form id="form1" method="get" action="'.$this->sale_url.'">'.$temp_str.'</form><script>document.forms.form1.submit();</script>';
			echo iconv("UTF-8", "Big5",$temp_str);
		}
		
}

$sale = new ezship(account);
$sale->isshop();
//$sale->istake();

if ($_REQUEST["stCode"]){
	//--紀錄商店資訊
	$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
	$order = $shopping_car->getorder(" where order_no='".$_REQUEST['processID']."'");
	$indata['memo'] = '店面資訊:'.$_REQUEST['stCate'].' '.$_REQUEST['stCode'].' '.$_REQUEST['stName'].' '.$_REQUEST['stTel'].' '.$_REQUEST['stAddr'].' ';
	$shopping_car->update($indata,$order['id']);
	
	$sale->data_send($_REQUEST);
	exit;
}
if ($_POST){
	$sale->data_send($_POST);
	exit;
}
?>