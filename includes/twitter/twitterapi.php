<?php
/**

twitter oauth create by Jones
�Щ�APP �����]�w�^�ձ��f(Callback URL) �� ����

�i�a�J�Ѽ� 

callback �^�Ǹ�ƭ���
act ���O�ާ@�Ҧ� �w�]��login

 */

/* Load required lib files. */
define('CONSUMER_KEY', 'TQBtcVApGDiaFWcc2Is3lBxCd');
define('CONSUMER_SECRET', 'CYAlgj7zINZ9SEhDN2l37AkVo7TNCIAZO3BdZx3oznc3ifGFjO');
define('OAUTH_CALLBACK', 'http://vipbooking.com.tw/includes/twitter/twitterapi.php');
session_start();
require_once('twitteroauth/twitteroauth.php');


//�P�_�O�_�b�������
if (!$_REQUEST['oauth_verifier']){
	
	if ($_GET["callback"]) $_SESSION["oauth_twitter_callback"] = $_GET["callback"]; //�]�w�����^�ձ��f
	
	if (!$_GET["act"]) $_GET["act"] = 'login';
	$_SESSION["oauth_twitter_act"] = $_GET["act"];
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	//���o����
	
	$_SESSION["twitter"] = $temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK);
	
	//�ϥΨ��o���{�ɾ�������ƾ� ����URL
	$redirect_url = $connection->getAuthorizeURL($temporary_credentials);
	echo '<script>window.location.href="'.$redirect_url.'";</script>';
	
}else{
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["twitter"]['oauth_token'],$_SESSION["twitter"]['oauth_token_secret']);
	
	$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $token_credentials['oauth_token'],$token_credentials['oauth_token_secret']);
	
	$account = $connection->get('account/verify_credentials');//�������

	//$status = $connection->post('statuses/update', array('status' => 'Text of status here', 'in_reply_to_status_id' => 123456));
	//$status = $connection->delete('statuses/destroy/12345');

	//�إߪ�� �ðe�X�n�J���
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
		echo '���]�w����ؿ�';
	}
}