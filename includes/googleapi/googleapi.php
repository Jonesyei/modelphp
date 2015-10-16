<?php
session_start();
include_once("Google_Client.php");


$client = new Google_Client();
$client->setClientId('859428323435-dv1n7gb5pl182vtfla8j12h1k1g6kmhs.apps.googleusercontent.com');
$client->setClientSecret('84suiJTDo02q-Jr77wK403jS');
$client->setRedirectUri('http://www.originalbase.com.tw/includes/googleapi/googleapi.php');
$client->setDeveloperKey('AIzaSyChpaolzXFa8wlWx8eCCnU_1iQcSOz-EpU');
$client->setScopes(array('profile','email','plus'));
$client->setApplicationName('original');





if($_GET["code"]=="")
{
	if ($_GET["callback"]) {
		$_SESSION["oauth_twitter_callback"] = $_GET["callback"]; //設定網站回調接口
	}else{
		echo '<script>alert("未接收到回傳參數!");window.history.back(-1);</script>';
	}
	
	if (!$_GET["act"]) $_GET["act"] = 'login';
	$_SESSION["oauth_twitter_act"] = $_GET["act"];
	
	//$_SESSION["member_info"]["google_auth_url"] = $client->createAuthUrl();
	echo '<script>window.location.href="'.$client->createAuthUrl().'"</script>';
	exit;
}
else
{
	$client->authenticate();
	
	
	$json = json_decode($client->getAccessToken());

	
	$ch = curl_init();
	$options = array(CURLOPT_URL => 'https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$json->access_token,
	CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $options);
	$output = curl_exec($ch);
	curl_close($ch);
	
	$userinfo = json_decode($output);

		
	//$_SESSION["member_info"]["api_login"] = array('id'=>$userinfo->id,'name'=>$userinfo->name,'account_type'=>"google");//array('id','type');

	//資料取得
	$temp_str = '<form id="form" action="'.$_SESSION["oauth_twitter_callback"].'" method="post">';
	$temp_str .= '<input type="hidden" name="account" value="'.$userinfo->id.'">';
	$temp_str .= '<input type="hidden" name="name" value="'.$userinfo->name.'">';
	$temp_str .= '<input type="hidden" name="netclass" value="google">';
	$temp_str .= '<input type="hidden" name="act" value="'.$_SESSION["oauth_twitter_act"].'">';
	$temp_str .= '</form><script>document.getElementById(\'form\').submit();</script>';
	echo $temp_str;
	exit;
}

exit;

?>