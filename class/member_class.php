<?php
include_once(APP_PATH."includes/phpmailer/class.phpmailer.php");
/*
會員類別庫 (Memeber)
create by Jones

宣告使用
new member($conn,table);

登入
$obj->login("account",md5(password))

獲取登入資訊 $vale 指定欄位 不填獲取所有
$obj->getinfo($value);

忘記密碼
$obj->fotgot("XX@com.tw","email")  value , row_name

欄位更新
$obj->row_data_chagnge($data,row,act) value , row_nam , +/*- (EX:點數更新操作[數值型別])

登入狀態
$obj->status();

登出
$obj->logout();

會員郵件審核啟用
$obj->check_mail = 1;

註冊 陣列資料 點數
$obj->newjoin($data,$point=0){

郵件設定 (開啟 會員郵件審核 需設定此功能)
$obj->set_mail('網站名稱','信件發送者email')

郵件審核驗證接收
$obj->recive_check_mail($_GET)

運行
$obj->work();
*/
class member
{
		var $check_mail = 0; //--認證信件
		var $smtp_set;		//-判斷是否為SMTP
		var $smtp_set_option; //判斷開關
		var $member;
		var $conn;
		var $session;
		var $table;
		var $table_rows;
		var $web_name;
		var $from_mail;
		var $erromsg;
		
		var $namespace = 'member'; //--會員命名空間
		var $namespace_sql = '';	//--
		var $iswork = false;
		/**
			建構類別庫
			parameter:
			$conn		=>	ADODB物件
			$table		=>	設定會員資料表
		*/
		function __construct($conn,$table)
		{
			global $_SESSION;
			$this->conn = $conn;
			$this->table = $table;
			
			//--取得資料表內所有欄位 比對傳入的資料
			foreach ($conn->GetArray("desc ".$table) as $k=>$v){ //--取得資料表欄位資料進行判斷
				$this->table_rows[] = $v[0];
			}
			
			//--郵件設定
			$mail = new PHPMailer();                        // 建立新物件        
			$mail->IsHTML(true);                         // 設定郵件內容為HTML
			$mail->CharSet = "utf-8";                       // 設定郵件編碼   
			$mail->Encoding = "base64";
			$mail->WordWrap = 50;                           // 每50個字元自動斷行 
			$this->smtp_set = $mail;
		}
		
		/**
			運行
			設置完參數後 運行此
		*/
		function work(){
			if ($this->iswork) {
				echo '錯誤:已經建立過此物件!! 勿重複宣告work()';
				exit;
			}
			//-判斷是否!=預設值
			if ($this->namespace != 'member') $this->namespace_sql = " and namespace='".$this->namespace."'";
			
			if ($_SESSION["login_info"][$this->namespace]){
				$this->session = $this->conn->GetRow("select * from ".$this->table." WHERE id='".$_SESSION["login_info"][$this->namespace]["id"]."' ".$this->namespace_sql);
			}
			$this->iswork = true;
		}
		
		/*
			拷貝資料
		*/
		function clone_of($obj,$name=''){
			if (!$obj->iswork){
				echo '拷貝對象 必須是已經work的物件 參數(物件變數,命名空間)';
				exit;
			}
			foreach ($obj as $k=>$v){
				$this->$k = $v;
			}

			if ($name!='') {
				$this->namespace = $name;
				$this->namespace_sql = ''; //-不判斷命名空間登入方式
				$_SESSION["login_info"][$this->namespace] = $this->session;
			}else{
				 echo '必須宣告 不同於 ['.$obj->namespace.'] 的命名空間';
				 exit;
			}
		}
		
		
		/**
			依照條件返回使用者資料
			parameter:
			$where		=>	mysql 條件語法
		*/
		function getmember($where=NULL) //--獲取
		{
			$temp = $this->conn->GetRow("select * from ".$this->table." ".$where);
			return $temp;
		}
		
		/**
			登入帳戶
			parameter:
			$where		=>	mysql 條件語法
		*/
		function login($account,$password) //--登入帳戶
		{
			global $_SESSION;
			if ($account==NULL || $account=='' || $password==NULL || $password=='') return false;
			$temp = $this->conn->GetRow("select * from ".$this->table." WHERE account='".quotes($account)."' and password='".md5($password)."' and status=1 ".$this->namespace_sql);
			if ($temp) {
				$this->session = $temp;
				$_SESSION["login_info"][$this->namespace] = $temp;
				return true;
			}else{
				return false;
			}
		}
		function net_login($row,$data) //社群登入 資料表對應欄位,資料為一值
		{
			global $_SESSION;
			
			$temp = $this->conn->GetRow("select * from ".$this->table." WHERE ".$row."='".$data["account"]."' and status=1 ".$this->namespace_sql);
			if ($temp) {
				$this->session = $temp;
				$_SESSION["login_info"][$this->namespace] = $temp;
				return true;
			}else{
				//-沒資料
				$data[$row] = $data["account"];
				$this->newjoin($data,0,true);
				return true;
			}
		}
		function status(){ //-登入狀態
			if ($this->session){
				return true;
			}else{
				return false;
			}
		}
		function fotgot($row,$value,$pagefile=NULL){ //--忘記密碼
			$temp = $this->conn->GetRow("select * from ".$this->table." WHERE ".$row."='".$value."' ".$this->namespace_sql);
			if ($temp){
				$rndstring = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
				for($i=0;$i<9;$i++){
					$new_pwd .= $rndstring[rand(0,24)];
				}
				$this->conn->Execute("UPDATE ".$this->table." SET password='".md5($new_pwd)."' WHERE id=".$temp["id"]); 
				$temp["new_password"] = $new_pwd;
				$temp["new_password"] = md5($temp["new_password"]);
				
				//--進行 mail處理
				if ($pagefile==NULL) {
					$pagefile = explode('/',$_SERVER['SERVER_PROTOCOL']);
					$pagefile = $pagefile[0].'://'.$_SERVER['HTTP_HOST'].'/member.php?act=fotgot';
				}
				if (strpos($pagefile,'?')=='') {
					$pagefile .= '?';
				}else{
					$pagefile .= '&';
				}
				$mtime =explode(' ',microtime());
				$mtime =$mtime[1];
				$href = $pagefile.'cid='.$temp["id"].'&auth='.urlencode(base64_encode($temp["new_password"])).'&dkt='.$mtime.'&checkcode='.urlencode(base64_encode(base64_encode($temp["new_password"]).'|_br_|'.$mtime.'|_br_|'.$temp["id"]));
				
				$message = '您好此為 '.$this->web_name.'密碼修改信件<br><br>
							帳號: '.$this->str_hide($temp["account"],0,2).'
							<br><br><font color="red">如果您未申請密碼更換</font>，請立即上線修改密碼以避免遭到盜用<br>
							請點 <a href="'.$href.'">這裡</a> 進行密碼修改登入!!';
				return $this->mail_send('會員忘記密碼重新設定郵件',$message,$temp["email"]); //-信件送出
			}
			return false;
		}
		function update($data){//--修改會員資料
				global $_SESSION;
				foreach ($data as $k=>$v){
					if (in_array($k,$this->table_rows)){
						$ipd[$k] = $v;
					}
				}
				if ($ipd["password"]) $ipd["password"] = md5($ipd["password"]);
				
				$ipd["update_date"] = date("Y-m-d H:i:s");
				$ipd["update_name"] = $this->getinfo("name");
				$am = $this->conn->AutoExecute($this->table,$ipd,"UPDATE","id=".$this->session["id"]);
				$_SESSION["login_info"][$this->namespace] = $this->session = $this->conn->GetRow("select * from ".$this->table." WHERE id=".$this->session["id"]);
				return $am;
		}
		function getinfo($value=NULL){ //---取得登入會員資料
			if ($this->session){
				if ($value!=NULL){
					return $this->session[$value];
				}else{
					return $this->session;
				}
			}else{
				return false;
			}
		}
		function row_data_chagnge($row,$data,$act=NULL){ //--欄位資料更新運算
			switch (strtolower($act)){
				case NULL:
					$am = $this->conn->Execute("UPDATE ".$this->table." SET ".$row."='".$data."' WHERE id=".$this->session["id"]);
					return $am;
				break;
				default:
					if (in_array($act,array("+","-","*","/"))){
						$am = $this->conn->Execute("UPDATE ".$this->table." SET ".$row."=".$row."+(".$data.") WHERE id=".$this->session["id"]);
						return $am;
					}else{
						return false;
					}
				break;
			}
		}
		function logout(){ //---登出
			global $_SESSION;
			unset($_SESSION["login_info"][$this->namespace]);
			$this->session = NULL;
			return true;
		}
		
		//-註冊
		function newjoin($data,$point=0,$net_link=false){
		

			//判斷是否社群登入
			if ($net_link){
				if ($data["email"]=='' || $data["email"]==NULL) $data["email"] = $data["account"].'@'.$data['netclass'];
				$check = $this->conn->GetRow("select * from ".$this->table." WHERE account='".$data["account"]."' ".$this->namespace_sql);
			}else{
				$check = $this->conn->GetRow("select * from ".$this->table." WHERE (account='".$data["account"]."' or email='".$data["email"]."') ".$this->namespace_sql);
				if ($check){
					return '帳號 或者 email 資料已重複!!';
				}
			}
			
			$data["namespace"] = $this->namespace;
			$data["password"] = md5($data["password"]);
			$data["status"] = '1';
			$data["type"] = 'member';
			$data["lang"] = 'ch';
			$data["point"] = $point;
			$data["create_date"] = $data["update_date"] = date("Y-m-d H:i:s");
			$this->row_have_check($data); //-欄位資料判斷是否建立
			

			//--判斷是否需要寄出認證信函
			if ($this->check_mail!=0){
				if ($this->send_check_mail($data)){
					$am = $this->conn->AutoExecute($this->table,$data,"INSERT");
					return '已寄出帳號確認信件!!';
				}else{
					return '發送驗證信時發生錯誤!!,請確認郵件資訊是否正確';
				}
			}else{
				$am = $this->conn->AutoExecute($this->table,$data,"INSERT");
				$_SESSION["login_info"][$this->namespace] = $this->session = $this->conn->GetRow("select * from ".$this->table." WHERE account='".$data["account"]."'");
				return $this->session;
			}
		}
		//--自動建立欄位資料
		function row_have_check($data){
			//---判斷是否有欄位資料 沒有的話自動建立欄位
			foreach ($this->conn->GetArray("desc ".$this->table) as $k=>$v){ //--取得資料表欄位資料進行判斷
				$row_colum[] = $v[0];
			}

			foreach ($data as $k=>$v){//比對資料
				if (!in_array($k,$row_colum)) {
						$this->conn->Execute("ALTER TABLE ".$this->table." ADD ".quotes($k)." TEXT NULL COMMENT '註冊資料(程式生成)'");
				}
			}
		}
		//信箱設定
		function set_mail($web_name,$from_mail){
			$this->web_name = $web_name;
			$this->from_mail = $from_mail;
		}
		
		//--寄出信件
		function mail_send($header,$body,$mailto){
			//--沒設定收件者 跳出
			if ($mailto==NULL) return false;
			
			
			$this->smtp_set->From = $this->from_mail;         // 設定寄件者信箱        
			//-參數不為陣列的話 改換成陣列模式
			if (!is_array($mailto)){
				$mailto = explode(',',$mailto);
			}
			foreach ($mailto as $k=>$v){
				$this->smtp_set->AddAddress($v);
			}
			$this->smtp_set->FromName = $this->web_name;                 // 設定寄件者姓名              
			$this->smtp_set->Subject = $this->web_name.' '.$header;    // 設定郵件標題        
			$this->smtp_set->Body = $body;
			return $this->smtp_set->Send();
		}
		
		//--SMTP 設定
		function smtp_setting($host,$account=NULL,$password=NULL,$port=NULL,$type='tls'){
			$mail = new PHPMailer();                        // 建立新物件        
			$mail->IsSMTP();                                // 設定使用SMTP方式寄信 
			
			if ($account!=NULL){
				$mail->SMTPAuth = true;                       // 設定SMTP需要驗證
				$mail->Username = $account;				      // 設定驗證帳號        
				$mail->Password = $password;				  // 設定驗證密碼        
			}
			
			//---關閉錯誤訊息
			$mail->SMTPDebug = false;
			$mail->do_debug = 0;
			
			$mail->SMTPSecure = $type;     // Gmail的SMTP主機需要使用SSL連線   
			$mail->Host = $host;	        // Gmail的SMTP主機        
			$mail->Port = $port;                              // Gmail的SMTP主機的port為465      
			$mail->CharSet = "utf-8";                       // 設定郵件編碼   
			$mail->Encoding = "base64";
			$mail->WordWrap = 50;                           // 每50個字元自動斷行
				  
			$mail->IsHTML(true);                            // 設定郵件內容為HTML
			$this->smtp_set = $mail;
			$this->smtp_set_option = 1;
		}
		
		//--認證信函
		function send_check_mail($data,$pagefile = NULL){
				
				if ($pagefile==NULL) {
					$pagefile = explode('/',$_SERVER['SERVER_PROTOCOL']);
					$pagefile = $pagefile[0].'://'.$_SERVER['HTTP_HOST'].'/member.php?act=open';
				}
				if (strpos($pagefile,'?')=='') {
					$pagefile .= '?';
				}else{
					$pagefile .= '&';
				}
			
				//--先封鎖登入
				$ipd["status"] = '0';
				$am = $this->conn->AutoExecute($this->table,$ipd,"UPDATE","id=".$data["id"]);
				
				//--密碼驗證信件
				$mtime =explode(' ',microtime());
				$mtime =$mtime[1];
				$href = $pagefile.'cid='.$data["id"].'&auth='.urlencode(base64_encode($data["password"])).'&dkt='.$mtime.'&checkcode='.urlencode(base64_encode(base64_encode($data["password"]).'|_br_|'.$mtime.'|_br_|'.$data["id"]));
				
				
				$message = '您好此為 '.$this->web_name.' 會員開通信件<br><br>
							您所申請的帳號為 '.$this->str_hide($data["account"],0,2).'<br>
							<br><br>如果您未申辦此帳號請無需理會，如果這是您的帳號 請點 <a href="'.$href.'">這裡</a> 進行信箱認證!!';
				return $this->mail_send('會員帳戶啟用郵件',$message,$data["email"]); //-信件送出
		}
		
		//--檢查收到的資料認證
		function recive_check_mail($data){
			global $_SESSION;
			$temp = base64_decode($data["checkcode"]);
			$temp = explode('|_br_|',$temp);
			//--參數解密後判斷
			if (count($temp)!=3) {
				$this->erromsg = '參數錯誤!!';
				return false;
			}else if ($data["auth"]!=$temp[0] || $data["dkt"]!=$temp[1]){
				$this->erromsg = '檢查碼不符!!';
				return false ;
			}
			
			//判斷與資料是否一致
			$temp_data = $this->conn->GetRow("select * from ".$this->table." where id='".$temp[2]."' and password='".base64_decode($temp[0])."'");
			if ($temp_data){
				//--解鎖
				$ipd["status"] = '1';
				$am = $this->conn->AutoExecute($this->table,$ipd,"UPDATE","id=".$temp[2]);
				$this->session = $_SESSION["login_info"][$this->namespace] = $this->conn->GetRow("select * from ".$this->table." where id='".$temp[2]."' and status='1'");
				if ($this->session){
					return $this->session;
				}else{
					$this->erromsg = '異常無法登入!!';
					return false;
				}
			}else{
				$this->erromsg = '無資料對應!!';
				return false;
			}
		}
		
		//--字元隱藏
		function str_hide($string,$start=0,$length=0){
			$temp = '';
			//-判斷是否參數字元數大於 設定的開始直
			if (strlen($string) >= $start+$length){
				$temp = substr($string,0,$start+$length);
				for ($i=1;$i<=strlen($string)-$start-$length;$i++){
					$temp .='*';
				}
			}else{//-否者依照設定文字個數輸出
				for ($i=1;$i<=strlen($string);$i++){
					$temp .= '*';
				}
			}
			return $temp;
		}
}


?>