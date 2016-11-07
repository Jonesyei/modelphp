<?php
/*
	共用區塊下版
*/
class foor
{
		function __construct($tplurl=NULL)
		{
			global $_GET;
			global $console;
			$data["pageget"] = $_GET;
			$console->tpl->assign("data",$data); //別的頁面傳送來的data
			$console->tpl->assign("member_info",@$_SESSION["member_info"]);
			$console->tpl->assign("cookie",@$_COOKIE["cookie"]);
			$console->tpl->assign("setup", $_SETUP);//config設定檔
			$console->tpl->assign("content",@$content);
			$console->tpl->assign("web_set",@$web_set);
			$console->tpl->assign("lang",@$_SESSION["mode_lang"]);
			$console->design->load(($tplurl==NULL ? $console->path[0]:$tplurl[0]));
		}
}

?>