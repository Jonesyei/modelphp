<?php
/**

twitter oauth create by Jones
請於APP 頁面設定回調接口(Callback URL) 為 本頁

可帶入參數 

callback 回傳資料頁面
act 註記操作模式 預設為login

 */

/* Load required lib files. */
define('CONSUMER_KEY', 'TQBtcVApGDiaFWcc2Is3lBxCd');
define('CONSUMER_SECRET', 'CYAlgj7zINZ9SEhDN2l37AkVo7TNCIAZO3BdZx3oznc3ifGFjO');
define('OAUTH_CALLBACK', 'http://vipbooking.com.tw/includes/twitter/twitterapi.php');
session_start();
require_once('twitteroauth/twitteroauth.php');


//判斷是否在接收資料
if (!$_REQUEST['oauth_verifier']){
	
	if ($_GET["callback"]) $_SESSION["oauth_twitter_callback"] = $_GET["callback"]; //設定網站回調接口
	
	if (!$_GET["act"]) $_GET["act"] = 'login';
	$_SESSION["oauth_twitter_act"] = $_GET["act"];
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	//取得憑證
	
	$_SESSION["twitter"] = $temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK);
	
	//使用取得的臨時憑證獲取數據 產生URL
	$redirect_url = $connection->getAuthorizeURL($temporary_credentials);
	echo '<script>window.location.href="'.$redirect_url.'";</script>';
	
}else{
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["twitter"]['oauth_token'],$_SESSION["twitter"]['oauth_token_secret']);
	
	$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $token_credentials['oauth_token'],$token_credentials['oauth_token_secret']);
	
	$account = $connection->get('account/verify_credentials');//身分資料

	//$status = $connection->post('statuses/update', array('status' => 'Text of status here', 'in_reply_to_status_id' => 123456));
	//$status = $connection->delete('statuses/destroy/12345');

	//建立表單 並送出登入資料
	$temp_str = '<form id="form" action="'.$_SESSION["oauth_twitter_callback"].'" method="post">';
	$temp_str .= '<input type="hidden" name="account" value="'.$account->id_str.'">';
	$temp_str .= '<input type="hidden" name="name" value="'.$account->name.'">';
	$temp_str .= '<input type="hidden" name="netclass" value="twitter">';
	$temp_str .= '<input type="hidden" name="act" value="'.$_SESSION["oauth_twitter_act"].'">';
	$temp_str .= '</form><script>document.getElementById(\'form\').submit();</script>';
	if ($_SESSION["oauth_twitter_callback"]!=NULL && $_SESSION["oauth_twitter_callback"]!=''){
		unset($_SESSION["oauth_twitter_callback"]);
		unset($_SESSION["oauth_twitter_act"]);
		echo $temp_str;
	}else{
		echo '未設定跳轉目錄';
	}
}