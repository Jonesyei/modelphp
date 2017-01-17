<?php
/*
版面載入模組 (design)
create by Jones

宣告使用
new design($conn,table);

$
*/
class design
{
		var $check_mail = 0; //--認證信件
		var $conn;
		var $table;
		var $lang;
		var $views='';	//--暫存樣板
		
		function __construct($conn,$table,$lang='ch')
		{
			global $_SESSION;
			$this->conn = $conn;
			$this->table = $table;
			$this->lang = $lang;
		}
		
		//--版面呼叫
		function load($data){
			if (is_numeric($data))
				$temp = $this->conn->GetRow($this->conn->Prepare("select * from ".$this->table." where type='main' and id=? and lang=?"),array($data,$this->lang));
			else
				$temp = $this->conn->GetRow($this->conn->Prepare("select * from ".$this->table." where type='main' and b_name=? and lang=?"),array($data,$this->lang));
			
			$this->views .= dequotes($this->ban_load($temp),-1);
			
			if (trim($this->views)==''){
				echo '樣板獲取失敗，請確認後台是否有設定相關版面!!';exit;
			}else
				return $this->views;
		}
		
		//--板塊多載
		function ban_load($design){
			$am = -1;
			while((string)$am!=""){
				if (strlen($design["detail"])>(int)$am+1){
					$am = strpos($design["detail"],'<%file=',(int)$am+1);
					$bm = strpos($design["detail"],'%>',(int)$am+1);
					$ban_id = (is_numeric(substr($design["detail"],$am+7,$bm-$am-7)) ? " and id=".substr($design["detail"],$am+7,$bm-$am-7):" and b_name='".substr($design["detail"],$am+7,$bm-$am-7)."'");
					
					if ((string)$am !="" && (string)$bm !=""){
						$temp = $this->conn->GetRow($this->conn->Prepare("select * from ".$this->table." where 1 ".$ban_id." and lang=? and type='ban' and status=1"),array($this->lang));		
						if ($temp){
							$design["detail"] = str_replace(substr($design["detail"],$am,$bm+2-$am),($this->ban_load($temp)),$design["detail"]);
						}
					}
				}else{
					$am="";
				}
			}
			return $design["detail"];
		}
}


?>