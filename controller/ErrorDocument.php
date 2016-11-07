<?php
//--錯誤訊息返回
$erro_array = array(400=>'用戶端請求訊息不正確',401=>'請求的訊息未被授權',403=>'禁止使用此資源',404=>'找不到資源',500=>'Server 內部發生錯誤',502=>'路由不正確，或目前主機負荷量過重');
echo $console->path[1];
switch ($console->path[1]){
	case "400":
	case "401":
	case "403":
	case "404":
	case "500":
		alert('主機錯誤訊息 '.$console->path[1]."\\n ".$erro_array[$console->path[1]],$console->_j_web_set['host_path']);
	break;
}
?>