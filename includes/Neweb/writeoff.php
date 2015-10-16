<?php 
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");
include_once($temp_nowurl[0]."member_class.php");

//ob_start(); //打開緩衝區

echo 'POST LIST';
echo "<pre>"; 
print_r($_POST); 
echo "</pre>";

	//--購物車
	$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
	
     function getParameter($pname){
          return isset($_POST[$pname])?$_POST[$pname]:"";
     }

     $code = "abcd1234";
     $data['status'] = 0;	//銷帳狀態 0 未銷 , 1 已銷
     $data['merchantnumber']   = getParameter('merchantnumber');
     $data['ordernumber']      = getParameter('ordernumber');
     $data['amount']           = getParameter('amount');
     $data['paymenttype']      = getParameter('paymenttype');
     $data['serialnumber']     = getParameter('serialnumber');
     $data['writeoffnumber']   = getParameter('writeoffnumber');
     $data['timepaid']         = getParameter('timepaid');
     $data['tel']              = getParameter('tel');
	 $data['hash']  		   = getParameter('hash');
	 
	 
     $verify = md5("merchantnumber=".$data['merchantnumber'].
                   "&ordernumber=".$data['ordernumber'].
                   "&serialnumber=".$data['serialnumber'].
                   "&writeoffnumber=".$data['writeoffnumber'].
                   "&timepaid=".$data['timepaid'].
                   "&paymenttype=".$data['paymenttype'].
                   "&amount=".$data['amount'].
                   "&tel=".$data['tel'].
                   $code);
	      
	echo "hosh=".getParameter('hash');
    echo "<br>verify=".$verify;
	
	if(strtolower($data['hash'])!=strtolower($verify)){
		//-- 驗證碼錯誤，資料可能遭到竄改，或是資料不是由ezPay簡單付發送
		echo "<br><br>驗證碼錯誤"."<br>hash=".$data['hash']."<br>";
		echo 'DATA';
		echo "<pre>"; 
		print_r($data); 
		echo "</pre>";
	}else{
		//-- 驗證正確，請更新資料庫訂單狀態 
		echo "<br><br>驗證碼正確";		
		echo 'DATA';
		echo "<pre>"; 
		print_r($data); 
		echo "</pre>";
					
		//新增銷帳資料
		$temp = $conn->AutoExecute(PREFIX."writeoff",$data,"INSERT");
		
		//-- 檢查 shopping_car ，比對銷帳資料
		$writeoff_lst = $conn->GetArray("SELECT * FROM ".PREFIX."writeoff WHERE status='0'"); //金流回傳銷帳資料
		
		foreach($writeoff_lst AS $k=>$v){			
			//消費清單
			$car_list = $conn->GetRow("SELECT * FROM ".PREFIX."shopping_car WHERE order_no='".$v['ordernumber']."'");
			
			if($car_list){
				$carlist["pay_status"] = 1; //--付款狀態
				$carlist["paymode_status"] = 1;//--金流付款狀態
				if( $conn->AutoExecute(PREFIX."shopping_car",$carlist,"UPDATE","order_no='".$v['ordernumber']."'") ){				
					$conn->Execute("UPDATE ".PREFIX."writeoff SET status='1' WHERE ordernumber=".$v['ordernumber']); 	
				}
			}
		}
	}
	
//$info=ob_get_contents(); //得到緩衝區的內容並且賦值給$info
//$file=fopen('output.html','w'); //打開文件info.txt
//fwrite($file,$info); //寫入信息到info.txt
//fclose($file); //關閉文件info.txt 
?>
