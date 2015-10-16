<?php
/*
include_once("Google_Client.php");


$client = new Google_Client();
$client->setClientId('346229320795-p2bbhg3t5qb7u2ek15jpsvtt2uuprj17.apps.googleusercontent.com');
$client->setClientSecret('j6aZGoFbtp1t4UBJnUzVfuhv');
$client->setRedirectUri('http://www.85885.com.tw/google_api/src/api.php');
$client->setDeveloperKey('AIzaSyBKvH-tukr7mxRP-fS0w_eCnsBrdAEz52c');
$client->setScopes('openid');
$client->setApplicationName('85885');


if($_GET["code"]=="")
{
	echo $client->createAuthUrl();
}
else
{
	$client->authenticate();
	
	$json = json_decode($client->getAccessToken());
	
	echo "https://www.googleapis.com/oauth2/v1/userinfo?access_token=".$json->access_token;
	echo "<BR>";
	
	
	$ch = curl_init();
	$options = array(CURLOPT_URL => 'https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$json->access_token,
	CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $options);
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;
}
*/
?>