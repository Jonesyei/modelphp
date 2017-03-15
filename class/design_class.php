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
				echo $data.'樣板獲取失敗，請確認後台是否有設定相關版面!!';exit;
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

/*
seo 優化
*/

class seo{
	var $documetn = '';
	var $body='';
	var $title = '';//--頁面標題參數
	var $description = '';//內文
	var $keywords = '';//關鍵字
	
	//第三方分享屬性
	var $share_tags = array('og:type'=>'website');
	function __construct(){
		
	}
	
	function work($html=''){
		global $_SERVER;
		header('Last-Modified: '.gmdate('D, d M Y').' 00:00:00'.' GMT', true, 200); //--最後頁面編輯時間
		header('Date: '.gmdate('D, d M Y H:i:s').' GMT', true, 200);
		header('Expires: '.gmdate('D, d M Y H:i:s',mktime(0,0,0,1,1,1998)).' GMT', true, 200); //--快取時間
		
		$this->body = $this->html2txt($html);
		if (!DOMDocument) return false;

		$document =  new DOMDocument;
		$document->loadHTML($this->body);
		$head = $document->getElementsByTagName('head');$head = $head[0];
		$body = $document->getElementsByTagName('body');$body = $body[0];
		$title = $document->getElementsByTagName('title');$title = ($title ? $title[0]:NULL);
				
		//--第三方分享
		$og_array = array('og:site_name'=>$this->DOMinnerHTML($title),'og:url'=>'//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'');
		foreach ($this->share_tags as $k=>$v){
			$og_array[$k] = $v;
		}
		//--標題標籤
		if ($title){
			if ($this->title!='') $title->nodeValue = $og_array['og:title'] = $this->title.' - '.$this->DOMinnerHTML($title);
		}else{
			$title = $document->createElement('title',$this->title);
			$head->appendChild($title);
		}
		//--地區標籤、一般關鍵字標籤
		$meta_list = $document->getElementsByTagName('meta');
		if ($meta_list)
			foreach ($meta_list as $obj){
				if ($obj->hasAttribute('http-equiv') && strtolower($obj->getAttribute('http-equiv'))=='content-language' && $obj->hasAttribute('content')){
					$obj->setAttribute('content','zh-tw');
					$isaddlocation = 1;
				}
				if ($obj->hasAttribute('name') && strtolower($obj->hasAttribute('name'))=='keywords' && $this->keywords) $obj->setAttribute('content',$this->keywords);
				if ($obj->hasAttribute('name') && strtolower($obj->hasAttribute('name'))=='description' && $this->description) $obj->setAttribute('content',$this->description);
			}
		if (!$isaddlocation) {
			$meta_lang = $document->createElement('meta');
			$meta_lang->setAttribute('http-equiv','Content-Language');
			$meta_lang->setAttribute('content','zh-tw');
			$head->appendChild($meta_lang);
		}
		
		//--第三方分享標籤添加
		foreach ($og_array as $k=>$v){
			if (!is_numeric($k)){
				$meta = $document->createElement('meta');
				$meta->setAttribute('property',$k);
				$meta->setAttribute('content',$v);
				$head->appendChild($meta);
			}
		}
		
		//--圖像優化
		$img_list = $document->getElementsByTagName("img");
		if ($img_list)
			foreach ($img_list as $obj){
				if ($obj->hasAttribute('data-seo')){
					$obj->setAttribute('alt','關鍵字內容');
				}
			}
		$this->body = $document->saveHTML();
	}
	
	//--取得內容
	function DOMinnerHTML($element) 
	{ 
		$innerHTML = ""; 
		$children  = $element->childNodes;
		foreach ($children as $child) 
		{ 
			$innerHTML .= $element->ownerDocument->saveHTML($child);
		}
		return $innerHTML; 
	} 
	
	function html2txt($document){ 
		$search = array(
						'/<!--(.*)-->/Uis',	//--html註解標籤清除
						'/\/\*(.*)\*\//',	// /* XXX */ 標籤清除
						'/\n/',		//  //XXXXXXX(\n換行) 註解方式清除
						'/\r/'
		); 
		$text = preg_replace($search, '', $document); 
		return $text; 
	}
	function output(){
		if(extension_loaded('zlib'))
		ob_start('ob_gzhandler');
		echo $this->body;
		ob_end_flush();
	}
}

?>