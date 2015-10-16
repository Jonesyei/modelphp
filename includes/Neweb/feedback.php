<?php 
$temp_nowurl = explode('includes',__file__);
include_once($temp_nowurl[0]."includes/main_inc.php");
include_once($temp_nowurl[0]."member_class.php");


	ob_start(); 	//打開快取
	//--金流回傳資料
    function getParameter($pname){
    	return isset($_POST[$pname])?$_POST[$pname]:"";
    }
	$MerchantNumber = getParameter('MerchantNumber');
	$OrderNumber = getParameter('OrderNumber');
	$PRC = getParameter('PRC');
	$SRC = getParameter('SRC');
	$Amount = getParameter('Amount');
	$CheckSum = getParameter('CheckSum');
	$ApprovalCode = getParameter('ApprovalCode');
	$BankResponseCode = getParameter('BankResponseCode');
	$BatchNumber = getParameter('BatchNumber');
	
	$Code = "abcd1234";

     $chkstr = $MerchantNumber.$OrderNumber.$PRC.$SRC.$Code.$Amount;
     $chkstr = md5($chkstr);

	//--購物車
	$shopping_car = new order($conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");


		 
	//判斷交易狀態
     if($PRC=="0" && $SRC=="0"){
          //-- 回傳成功，但結果有可能遭竄改，因此需和編碼內容比較
          if(strtolower($chkstr)==strtolower($CheckSum)){
			  
			   $shopping_car->paycheck($OrderNumber);
				//alert('付款成功!!','../member.php?act=order');
			   
               	echo '<br>'.$chkstr ;
                echo '<br>'.$CheckSum ;
                //echo '<br>交易成功';
                echo '<br>訂單編號　： '.$OrderNumber; 
               	echo ' <br>交易金額　： '.$Amount ;
              	echo ' <br>授權碼　　： '.$ApprovalCode;
               	echo ' <br>銀行回傳碼： '.$BankResponseCode ;
                echo '<br>批次號碼  ：'.$BatchNumber ;
               
          }else{
			  
               //-- 資料遭竄改
               echo '交易結果有誤，請與我們聯絡!';
               
          }
     }else if($PRC=="34" && $SRC=="171"){
		 
           	echo '<br>交易失敗(金融失敗)';
           	echo '<br>訂單編號　：'.$OrderNumber;
			echo '<br>交易金額　：'. $Amount;
			echo '<br>銀行回傳碼：'.$BankResponseCode;

     }else if($PRC=="8" && $SRC=="204"){
		 
          echo '<br>訂單編號重複!';
          
     }else if($PRC=="52" && $SRC=="554"){
		 
          echo '<br>使用者帳號密碼錯誤!';
		  
     }else{

          echo '<br>交易失敗(系統錯誤)';
          echo '<br>訂單編號　：'.$OrderNumber ;
          echo '<br>交易金額　：'.$Amount ;

     }
 	$cache_string = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
	
	//--寫入紀錄暫存
	$str = json_encode($_POST).$cache_string;
	$file = fopen("LOGS.txt","a+"); //開啟檔案
	fwrite($file,$str);
	fclose($file);
?>