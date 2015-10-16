<?
define('APP_PATH', str_replace('\\', '/', substr(dirname(__FILE__),0,strlen(dirname(__FILE__)) )));

/* openid set*/
define('OAUTH_CONSUMER_KEY', 'dj0yJmk9SlpJRER3ZTV6Z2YxJmQ9WVdrOU1tTkJSVU4yTm1jbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1lMg--');
define('OAUTH_CONSUMER_SECRET', '08d5d220c95b64014f5dfe2bd523c1baf43bab25');
define('OAUTH_DOMAIN', 'server.net.tw');
define('OAUTH_APP_ID', '2cAECv6g');
//define('OAUTH_BACKURL', 'http://server.net.tw/includes/yahooapi/yahooapi.php');



require 'openid.php';
session_start();
try
{
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID($_SERVER['HTTP_HOST']);

    //Not already logged in
    if(!$openid->mode)
    {

		if ($_GET["callback"]) $_SESSION["oauth_twitter_callback"] = $_GET["callback"]; //設定網站回調接口
		
		if (!$_GET["act"]) $_GET["act"] = 'login';
		$_SESSION["oauth_twitter_act"] = $_GET["act"];

		//The google openid url
		$openid->identity = 'https://me.yahoo.com/';

		//Get additional google account information about the user , name , email , country
		$openid->required = array('person/guid','contact/email' , 'namePerson/first' , 'namePerson/last' , 'pref/language' , 'contact/country/home');

		//start discovery
		header('Location: ' . $openid->authUrl());
		exit;

    }

    else if($openid->mode == 'cancel')
    {
        echo 'User has canceled authentication!';
        //redirect back to login page ??
    }

    //Echo login information by default
    else
    {
        if($openid->validate())
        {
            //User logged in
            $d = $openid->getAttributes();

            $first_name = $d['namePerson/first'];
            $last_name = $d['namePerson/last'];
            $email = $d['contact/email'];
            $language_code = $d['pref/language'];
            $country_code = $d['contact/country/home'];

            $data = array(
                'first_name' => $first_name ,
                'last_name' => $last_name ,
                'email' => $email ,
            );
			if ($first_name.$last_name=='') 
				$name = 'none';
			else
				$name = $first_name.$last_name;
            //now signup/login the user.
           // print_r($data);
			//建立表單 並送出登入資料
			$temp_str = '<form id="form" action="'.$_SESSION["oauth_twitter_callback"].'" method="post">';
			$temp_str .= '<input type="hidden" name="account" value="'.$data["email"].'">';
			$temp_str .= '<input type="hidden" name="name" value="'.$name.'">';
			$temp_str .= '<input type="hidden" name="netclass" value="yahoo">';
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
        else
        {
            //user is not logged in
        }
    }
}

catch(ErrorException $e)
{
    echo $e->getMessage();
}



?>