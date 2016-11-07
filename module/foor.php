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
			$this->data['pageget'] = $_GET;
			foreach ($this->_para_list as $k=>$v)
				$console->tpl->assign($v,$this->$v); //別的頁面傳送來的data
			
			$console->design->load(($this->tplurl==NULL||$this->tplurl[0]==NULL ? $console->path[0]:$this->tplurl[0]));
		}

}

?>