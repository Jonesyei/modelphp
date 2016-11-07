<?php
$console->load->module('foor');
/*
	建構中畫面
	當後台網站設定 系統管理者設定中 設定網域導向頁面
*/
$lang = ' and lang="'.$_SESSION["mode_lang"].'"';
$data["title_img"] = $_SETUP["title_img"][$_GET["j_set_patten"]];
$temp = $console->conn->GetRow("select * from ".PREFIX."setting where type='demo_show'".$lang);
if ($temp)
	echo dequotes($temp["detail"],-1);
	echo dequotes('<mn id=\"dtn\"></mn> 秒後進入首頁 <script>
		var _aaaa = 5;
		function togohome(){
		_aaaa--;
		document.getElementById(\'dtn\').innerHTML = _aaaa;
		if (_aaaa==0) window.location.href=\''.$console->_j_web_set['main_path'].'/index/\';
		}
		togohome();
		window.setInterval(\"togohome()\",1000);
		</script>',-1);
exit;

$console->module->foor();
?>