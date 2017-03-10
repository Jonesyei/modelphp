<?php
/*
	Create by Jones MVC核心框架
	@2016/11/1
	
	new word_console(當前語系別名,所有語系陣列array()) 呼叫環境框架
	debug_erro([1 or 0]) //debug 程式碼開關
	setlang(語系別名)  //設定當前語系
	tags('標籤字串','取得的字串中做文字取代 $1=>$str[0]') ex: $console->tags('test $1 , $2 ok?',array('project','are you')); 則結果:test project , are you ok?
	controller(控制器名稱)  ///呼叫控制器 (基本上不需設定此參數)
	load->module(模組名稱即classname) //讀取模組
	module->模組名稱() //呼叫已載入的模組 進行物件操作
	
	config //--環境參數設定 參考以下設定值
	
	//--csrf 表單安全性驗證
	$this->config['csrf_verifty'] = true; //-預設開啟
	$this->config['csrf_verifty_setting']['token'] = true; //--POST操作須加上input name=token 回應 (value 需從 function get_token獲取)
	$this->config['csrf_verifty_setting']['time'] = 3600; //請求回應時間(秒)
	$this->config['csrf_verifty_setting']['maxcount'] = 30; //最高紀錄多少授權(超過該授權則舊的授權會優先移除)
	$this->config['csrf_verifty_setting']["method"] = array('GET','POST','REQUEST'); //SQL注碼攻擊防範資料來源，預設全部請求來源
	$this->config['csrf_verifty_setting']['type'] = 'md5';  //--加密模式(採用金鑰混和加密) md5 sha1 sha256
	$this->config['csrf_verifty_setting']['key'] = 'WD';	//--加密密鑰
*/


/*
	讀取模塊
*/
namespace load_plugin{
	//--讀取類別庫
	class load_class{
		//--載入模塊
		var $_j_web_set;
		function module($value,$rename=NULL){
			if (is_file(APP_PATH.$this->_j_web_set['module_path'].$value.'.php')) {
				include_once(APP_PATH.$this->_j_web_set['module_path'].$value.'.php');
			}else{
				echo APP_PATH.$this->_j_web_set['module_path'].$value.'.php'.'讀取模組失敗!!';exit;
			}
		}
	}
	//---裝載類別庫
	class module_autoinstall{
		//--自動引入
		function __call($function_name,$args=NULL){
			$_temp = new $function_name($args);
			$this->$function_name = $_temp;
		}
	}
}




/*
	MVC環境模塊
*/
namespace console{
	use load_plugin\load_class as loadplugin;			//讀取模組
	use load_plugin\module_autoinstall as installplugin;//裝載模組
	
	class word_console
	{
		var $design;
		var $conn;
		var $mail;
		var $web_set;
		var $path;
		var $get;
		var $_j_web_set;
		var $load;
		var $tpl;
		var $lang;
		var $tag;
		
		var $config; //--參數設置
		var $use_memory; //已使用記憶體 (檢測用)
		function __construct($lang,$lang_list=array())
		{
			global $_GET;
			global $_SERVER;
			global $_j_web_set;
			global $_SESSION;
			
			$this->get = $_GET;
			$this->_j_web_set = $_j_web_set;
			
			//--debug訊息
			$this->debug_erro();
			
			//--路由轉換
			if (!$_SERVER['PATH_INFO']){
				if ($_SERVER['REDIRECT_URL']){
					$this->path = explode('//',str_replace($_SERVER['HTTP_HOST'],'',str_replace($this->_j_web_set['main_path'],'',$_SERVER['REDIRECT_URL'])));
					$this->path = explode('/',($this->path[1] ? $this->path[1]:$this->path[0]));
				}else{
					$this->path = explode('index.php',$_SERVER['PHP_SELF']);
					$this->path = explode('/',$this->path[1]);
				}
			}else{
				$this->path = explode('/',$_SERVER['PATH_INFO']);
			}
			$this->path = array_values(array_filter($this->path));
			
			//--第二參數多語系判斷
			if ($this->path[0] && $lang_list && in_array($this->path[0],$lang_list)) {
				if (array_search($this->path[0],$lang_list)!==0) $this->config['setlang'] = $this->path[0];
				$lang = $this->path[0];
				unset($this->path[0]);
			}
			$this->path = array_values(array_filter($this->path));
			//--設定語系
			$this->setlang($lang);
			
			//--環境預設值設立
			$this->work();
			
			$this->check_path_url();
			
			//--資安資訊防護SQL injection XSS CSRF
			if (!$this->check_nincould()){
			$this->config['csrf_verifty'] = true; //-預設開啟
			$this->config['csrf_verifty_setting']['token'] = true; //--POST操作須加上input name=token 回應 (value 需從 function get_token獲取)
			$this->config['csrf_verifty_setting']['time'] = 3600; //請求回應時間(秒)
			$this->config['csrf_verifty_setting']['maxcount'] = 30; //最高紀錄多少授權(超過該授權則舊的授權會優先移除)
			$this->csrf_verifty();
			$this->token_resh();
			}
			//PRINT_r(hash_algos());EXIT;
			//--讀取模組宣告
			$this->load = new loadplugin;
			$this->load->_j_web_set = $this->_j_web_set;
			//--裝載模組宣告
			$this->module = new installplugin;
			
			//--自動裝載模塊
			if ($this->_j_web_set["module_autoload"])
				foreach ($this->_j_web_set["module_autoload"] as $k=>$v)
					$this->load->module($v);
		}
		
		function debug_erro($value=0){
			ini_set('log_errors',$value);
			ini_set('log_errors_max_len','1024');
			if ($value)
				error_reporting(E_ALL);
			else
				error_reporting(0);
		}
		
		function work(){
			global $_SESSION;
			global $_POST;
			global $_SERVER;
			//--原頁面含有post 資料處理
			if (isset($_SESSION['_J_MVC_POST_SESSION_'])){
				$_POST = $_SESSION['_J_MVC_POST_SESSION_'];
				$_SESSION['_J_MVC_POST_SESSION_'] = NULL;
				unset($_SESSION['_J_MVC_POST_SESSION_']);
			}
		}
		
		function setlang($lang){
			$this->lang = $lang;
			//--語言標籤裝載
			$lang_ini_file = APP_PATH."includes/config/tags/".$this->lang.".ini";
			if (is_file($lang_ini_file)){
				$temp = parse_ini_file($lang_ini_file,true);
				$this->tag = $temp[$this->lang];
			}
		}
		
		//--標籤資料返回
		function tags($value,$setting=array()){
			$value = $this->tag[$value];
			//--參數轉換
			if (is_array($setting) && count($setting)>0){
				sort($setting);
				foreach ($setting as $k=>$v)
					$value = str_replace('$'.($k+1),$v,$value);
			}
			return $value;
		}
		
		
		//--控制器
		function controller($value){
			global $$value;
			if (!$this->path) $this->path[0] = $this->_j_web_set['default_controller'];
			if (is_file(APP_PATH.$this->_j_web_set['controller_path'].$this->path[0].'.php')){
				include_once(APP_PATH.$this->_j_web_set['controller_path'].$this->path[0].'.php');
				$this->use_memory = memory_get_usage();
			}else{
				echo $this->tags('THE_CONTROLLER_LOADING_ERROR',array($this->_j_web_set['controller_path'].$this->path[0]));exit;
			}
		}
		//--判斷是否包含項目
		function check_nincould(){
			global $_SERVER;
			$path = $this->path;
	
			if (!$path) return true;
			if ($path)
				foreach ($path as $k=>$v){
					if (in_array($v,$this->_j_web_set['controller_ninclude'])){
						return true;
					}else
						break;
				}
			return false;
		}
		//--確認路由中是否包含已設定的目錄
		function check_path_url(){
			global $_SERVER;
			$path = $this->path;
			
			if ($path)
				foreach ($path as $k=>$v){
					if (!in_array($v,$this->_j_web_set['controller_ninclude'])){
						$path[$k] = NULL;
						unset($path[$k]);
					}else
						break;
				}
			if ($path){
				$path = array_values($path);
				$path = implode('/',$path);
				if (in_array($this->path[0],$this->_j_web_set['controller_ninclude'])){echo $this->tags('THE_CONTROLLER_NOT_INCLUDE_PARA');exit;}
				$this->movePage(200,'//'.$this->_j_web_set['host'].$this->_j_web_set['main_path'].($this->config['setlang'] ? '/views/'.$this->config['setlang']:'').'/'.$path.($_SERVER['QUERY_STRING']!='' ? '?'.$_SERVER['QUERY_STRING']:''));
			}
		}
		
		//直接引導轉跳
		function movePage($num,$url){
		   global $_SESSION;
		   global $_POST;
		   global $_SERVER;
		   if ($_SERVER['REQUEST_METHOD']=='POST'){
			   $rand_token = md5(rand(11111111,99999999));
			   $_SESSION['_J_MVC_POST_SESSION_'] = $_POST;
			   header('token:'.$rand_token);
		   }
		   static $http = array (
			   100 => "HTTP/1.1 100 Continue",
			   101 => "HTTP/1.1 101 Switching Protocols",
			   200 => "HTTP/1.1 200 OK",
			   201 => "HTTP/1.1 201 Created",
			   202 => "HTTP/1.1 202 Accepted",
			   203 => "HTTP/1.1 203 Non-Authoritative Information",
			   204 => "HTTP/1.1 204 No Content",
			   205 => "HTTP/1.1 205 Reset Content",
			   206 => "HTTP/1.1 206 Partial Content",
			   300 => "HTTP/1.1 300 Multiple Choices",
			   301 => "HTTP/1.1 301 Moved Permanently",
			   302 => "HTTP/1.1 302 Found",
			   303 => "HTTP/1.1 303 See Other",
			   304 => "HTTP/1.1 304 Not Modified",
			   305 => "HTTP/1.1 305 Use Proxy",
			   307 => "HTTP/1.1 307 Temporary Redirect",
			   400 => "HTTP/1.1 400 Bad Request",
			   401 => "HTTP/1.1 401 Unauthorized",
			   402 => "HTTP/1.1 402 Payment Required",
			   403 => "HTTP/1.1 403 Forbidden",
			   404 => "HTTP/1.1 404 Not Found",
			   405 => "HTTP/1.1 405 Method Not Allowed",
			   406 => "HTTP/1.1 406 Not Acceptable",
			   407 => "HTTP/1.1 407 Proxy Authentication Required",
			   408 => "HTTP/1.1 408 Request Time-out",
			   409 => "HTTP/1.1 409 Conflict",
			   410 => "HTTP/1.1 410 Gone",
			   411 => "HTTP/1.1 411 Length Required",
			   412 => "HTTP/1.1 412 Precondition Failed",
			   413 => "HTTP/1.1 413 Request Entity Too Large",
			   414 => "HTTP/1.1 414 Request-URI Too Large",
			   415 => "HTTP/1.1 415 Unsupported Media Type",
			   416 => "HTTP/1.1 416 Requested range not satisfiable",
			   417 => "HTTP/1.1 417 Expectation Failed",
			   500 => "HTTP/1.1 500 Internal Server Error",
			   501 => "HTTP/1.1 501 Not Implemented",
			   502 => "HTTP/1.1 502 Bad Gateway",
			   503 => "HTTP/1.1 503 Service Unavailable",
			   504 => "HTTP/1.1 504 Gateway Time-out"
		   );
		   header($http[$num]);
		   header("Location: $url");
		   exit;
		}
		/*
			$this->config['csrf_verifty_setting']["method"] = array('GET','POST','REQUEST'); //驗證請求模式
		*/
		function csrf_verifty(){
			global $_GET;
			global $_POST;
			global $_REQUEST;
			global $_SERVER;
			global $_SESSION;
			//--接收資料處理
			if ($this->config['csrf_verifty']){
				if (!$this->config['csrf_verifty_setting']["method"])
					$this->config['csrf_verifty_setting']["method"] = array('GET','POST','REQUEST');
				else
					foreach ($this->config['csrf_verifty_setting']["method"] as $k=>$v){
						$this->config['csrf_verifty_setting']["method"][$k] = strtoupper($v);
					}
				if ($_GET && in_array('GET',$this->config['csrf_verifty_setting']["method"]));
				foreach ($_GET as $k=>$v){
					$_GET[$k] =  $this->csrf_press($v);
				}
				if ($_POST && in_array('POST',$this->config['csrf_verifty_setting']["method"]))
				foreach ($_POST as $k=>$v){
					$_POST[$k] = $this->csrf_press($v);
				}
				if ($_REQUEST && in_array('REQUEST',$this->config['csrf_verifty_setting']["method"]))
				foreach ($_REQUEST as $k=>$v){
					$_REQUEST[$k] = $this->csrf_press($v);
				}
			}
			//--XSRF判斷
			if ($this->config['csrf_verifty'] && $_SERVER['HTTP_REFERER'] && strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
				$check_csrf = explode('//',$_SERVER['HTTP_REFERER']);
				$check_csrf = explode('/',$check_csrf[1]);
				if ($_SERVER['HTTP_HOST']!=$check_csrf[0]) {header("Content-Type:text/html; charset=utf-8");echo $this->tags('XSRF_REFFRER_NOT_TRUE');exit;}
			}
			
			//--token 確認參數是否於資料中包含資訊
			if ($this->config['csrf_verifty_setting']['token'] && strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
				$this->check_token();
			}
		}
		function csrf_press($str){
			if (is_array($str)){
				foreach ($str as $k=>$v){
					$str[$k] = $this->csrf_press($v);
				}
			}else{
				return addslashes(htmlspecialchars(strip_tags($str)));
			}
			return $str;
		}
		function check_token($token=''){
			global $_REQUEST;
			global $_POST;
			global $_SESSION;
			global $_SERVER;
			if ($token=='') $token = ($_REQUEST["token"] ? $_REQUEST["token"]:$_POST["token"]);
			$keytime = array_search($token,$_SESSION['_J_MVC_CSRF_TOKEN_']);
			if ($keytime!=false){
				$time = ($this->config['csrf_verifty_setting']['time'] ? $this->config['csrf_verifty_setting']['time']:3600);
				if ($keytime>=strtotime(date("Y-m-d H:i:s"))-$time){
					unset($_SESSION['_J_MVC_CSRF_TOKEN_'][$keytime]);
				}else{
					header("Content-Type:text/html; charset=utf-8");
					alert($this->tags('CSRF_TOKEN_TIMEOUT',array($time)),-1);
					exit;						
				}
			}else{
				header("Content-Type:text/html; charset=utf-8");
				alert($_SERVER['REQUEST_URI'].' '.$this->tags('CSRF_TOKEN_ERROR'),"-1");
				exit;
			}
		}
		function get_token($config=array()){
			global $_SESSION;
			$now_time = strtotime(date("Y-m-d H:i:s"));
			$type = ($this->config['csrf_verifty_setting']['type'] ? $this->config['csrf_verifty_setting']['type']:'md5'); //--加密模式
			$key = ($this->config['csrf_verifty_setting']['key'] ? $this->config['csrf_verifty_setting']['key']:'WD');	//--加密密鑰
			$_SESSION['_J_MVC_CSRF_TOKEN_'][$now_time] = hash_hmac($type,rand(10000000,99999999),$key);
			switch ($config['format']){
				case "text":
					return $_SESSION['_J_MVC_CSRF_TOKEN_'][$now_time];
				break;
				default:
					return '<input type="hidden" name="token" value="'.$_SESSION['_J_MVC_CSRF_TOKEN_'][$now_time].'">';
				break;
			}
		}
		//--超時授權移除
		function token_resh(){
			global $_SESSION;
			
			$time = ($this->config['csrf_verifty_setting']['time'] ? $this->config['csrf_verifty_setting']['time']:3600);

			if ($_SESSION["_J_MVC_CSRF_TOKEN_"]){
				foreach ($_SESSION["_J_MVC_CSRF_TOKEN_"] as $k=>$v){
					if ($k+$time<strtotime(date("Y-m-d H:i:s")) || !is_numeric($k) || count($_SESSION["_J_MVC_CSRF_TOKEN_"])>$this->config['csrf_verifty_setting']['maxcount'])
						unset($_SESSION["_J_MVC_CSRF_TOKEN_"][$k]);
					else
						break;
				}
			}
		}
	
	}///-end class world_console
}
?>