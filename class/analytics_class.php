<?php
/*
來源分析模組 (analytics)
create by Jones

宣告使用
new analytics($conn,table);

紀錄
$obj->save('分類','描述');
*/
class analytics
{
		var $check_mail = 0; //--認證信件
		var $conn;
		var $table;
		var $lang;
		
		var $view_delay = 2000; //-訪問頁面瀏覽者瀏覽延遲時間(超過則判斷為新請求)
		function __construct($conn,$table,$lang)
		{
			global $_SESSION;
			$this->conn = $conn;
			$this->table = $table;
			$this->lang = $lang;
			
			//相關判斷參數
		}
		
		function save($type,$name=NULL){
			global $_SESSION;
			global $_SERVER;
			if (!$_SERVER['HTTP_REFERER']) return false;
			$check_csrf = explode('//',$_SERVER['HTTP_REFERER']);
			$check_csrf = explode('/',$check_csrf[1]);
			$indata['lang'] = $this->lang;
			$indata['fromhost'] = $check_csrf[0];
			$indata['formrequest'] = implode('/',$check_csrf);
			$indata['method'] = $_SERVER['REQUEST_METHOD'];
			$indata['ip'] = $this->IP();
			$indata['dirver'] = $_SERVER['HTTP_USER_AGENT'];
			$indata['ondate'] = date('Y-m-d');
			$indata['ontime'] = date('H:i:s');
			$indata['type'] = $type;
			$indata['name'] = $name;
			$indata['request'] = $_SERVER['REQUEST_URI'];
			$indata['onweek'] = date('w');
			return $this->conn->AutoExecute($this->table,$indata,"INSERT");
		}
		function IP()
		{
			global $_SERVER;
			if (!empty($_SERVER['HTTP_CLIENT_IP']))
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			else
				$ip=$_SERVER['REMOTE_ADDR'];
			return $ip;
		}
		//--訪問人數
		function Visitors($filter){
			$where = ' where 1';
			if ($filter)
				foreach ($filter as $k=>$v){
					if (is_array($v)){
						
					}else{
						
					}
				}
		}
}


?>