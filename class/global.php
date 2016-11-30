<?php
/*
	Create by Jones MVC核心框架
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
		function __construct()
		{
			global $_GET;
			global $_SERVER;
			global $_j_web_set;
			$this->get = $_GET;
			$this->_j_web_set = $_j_web_set;
			
			//--環境預設值設立
			$this->work();
			
			//--路由轉換
			if (!$_SERVER['PATH_INFO']){
				if ($_SERVER['REDIRECT_URL']){
					$this->path = explode('/',str_replace($this->_j_web_set['main_path'],'',$_SERVER['REDIRECT_URL']));
				}else{
					$this->path = explode('index.php',$_SERVER['PHP_SELF']);
					$this->path = explode('/',$this->path[1]);
				}
			}else{
				$this->path = explode('/',$_SERVER['PATH_INFO']);
			}
			$this->path = array_values(array_filter($this->path));
			$this->check_path_url();
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
		
		function work(){
			global $_SESSION;
			global $_POST;
			global $_SERVER;
			//--原頁面含有post 資料處理
			if (isset($_SESSION['_J_MVC_POST_SESSION_'])){
				$_POST = $_SESSION['_J_MVC_POST_SESSION_'];
				unset($_SESSION['_J_MVC_POST_SESSION_']);
			}
		}
	
		//--控制器
		function controller($value){
			global $$value;
			if (!$this->path) $this->path[0] = $this->_j_web_set['default_controller'];
			if (is_file(APP_PATH.$this->_j_web_set['controller_path'].$this->path[0].'.php')){
				include_once(APP_PATH.$this->_j_web_set['controller_path'].$this->path[0].'.php');			
			}else{
				echo '控制器讀取錯誤!! 無此檔案請檢查'.$this->_j_web_set['controller_path'].$this->path[0].'.php 是否存在';exit;
			}
		}
	
		//--確認路由中是否包含已設定的目錄
		function check_path_url(){
			global $_SERVER;
			$path = $this->path;
			if ($path)
				foreach ($path as $k=>$v){
					if (!in_array($v,$this->_j_web_set['controller_ninclude'])){
						unset($path[$k]);
					}else
						break;
				}
			if ($path){
				$path = array_values($path);
				$path = implode('/',$path);
				if (in_array($this->path[0],$this->_j_web_set['controller_ninclude'])){echo '控制器設定名稱不可予保留參數 confing/_j_web_set[controller_ninclude] 重複!!';exit;}
				$this->movePage(200,'//'.$this->_j_web_set['host'].$this->_j_web_set['main_path'].'/'.$path.($_SERVER['QUERY_STRING']!='' ? '?'.$_SERVER['QUERY_STRING']:''));
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
	
	}///-end class world_console
}
?>