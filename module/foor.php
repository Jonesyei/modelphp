<?php
/*
	共用區塊下版
*/
class foor
{
		var $tplurl = NULL;
		var $_para_list;
		function __construct($tplurl=NULL)
		{
			$this->tplurl = $tplurl;
		}
		function set($para,$objdata=NULL){
			if (is_array($para)){
				if ($para)
					foreach ($para as $k=>$v){
						$this->$k = $v;
						$this->_para_list[] = $k;
					}
			}else{
				$this->$para = $objdata;
				$this->_para_list[] = $para;
			}
			return $this;
		}
		function work(){
			global $_GET;
			global $console;
			global $web_set;
			$this->data['pageget'] = $_GET;
			$this->data['main_path'] = $console->_j_web_set['main_path'];
			$this->data['path'] = $console->path;
			
			$this->web_set = $web_set;
			$this->_para_list[] = 'web_set';
			
			//--下版內容
			$this->data["foor"] = $console->conn->GetRow("select * from ".PREFIX."data_list where type='foor' and status=1 and lang='".$_SESSION["mode_lang"]."'");
			$this->data["foor"]['detail'] = dequotes($this->data["foor"]['detail'],-1);
			
			foreach ($this->_para_list as $k=>$v)
				$console->tpl->assign($v,$this->$v); //別的頁面傳送來的data
			
			$console->design->load(($this->tplurl==NULL||$this->tplurl[0]==NULL ? $console->path[0]:$this->tplurl[0]));
		}

}

?>