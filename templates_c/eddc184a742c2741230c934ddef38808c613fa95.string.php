<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 09:39:39
         compiled from "eddc184a742c2741230c934ddef38808c613fa95" */ ?>
<?php /*%%SmartyHeaderCode:130855360545b746377-44595473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eddc184a742c2741230c934ddef38808c613fa95' => 
    array (
      0 => 'eddc184a742c2741230c934ddef38808c613fa95',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '130855360545b746377-44595473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5360545b7ee864_81702792',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5360545b7ee864_81702792')) {function content_5360545b7ee864_81702792($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $_smarty_tpl->tpl_vars['web_set']->value['keyword'];?>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>
<link rel="stylesheet" href="style/nivo-slider.css" type="text/css" media="screen">
<script src="css/jquery.min.js" type="text/javascript"></script>
<script src="css/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="includes/js/jquery.corner.js" type="text/javascript"></script>
<link rel="stylesheet" href="style/default.css" type="text/css" media="screen">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="style/style-p.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="header">
  <div class="logo"><a href="index.html"><img src="images/logo.png" alt="馬基數位印刷有限公司" width="359" height="28" border="0"></a></div>
  <div class="menu">
    <ul>
      <li><a href="index2.php?ban=1" class="home"><span class="displaynone">首頁</span></a></li>
      <li><a href="index2.php?ban=8" class="about"><span class="displaynone">關於馬基</span></a></li>
      <li><a href="index2.php?ban=9" class="service"><span class="displaynone">服務項目</span></a></li>
      <li><a href="index2.php?ban=10" class="product"><span class="displaynone">產品介紹</span></a></li>
      <li><a href="case.html" class="case"><span class="displaynone">歷史案件</span></a></li>
      <li><a href="faq.html" class="faq"><span class="displaynone">製作Q&A</span></a></li>
    </ul>
  </div>
</div>


<div class="edm">

<div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['name'] = 'EDM';
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['EDM'][1]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['EDM']['total']);
?>
<a><?php echo $_smarty_tpl->tpl_vars['data']->value['EDM'][1][$_smarty_tpl->getVariable('smarty')->value['section']['EDM']['index']]['pic'];?>
</a>
<?php endfor; endif; ?>
    </div>
</div>

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider( {
        effect: 'random' // Specify sets like: 'fold,fade,sliceDown'
	});
});
</script>
</div>

<div class="wrapper">
  <div class="inews">
    <div class="inews-title"><a href="index.php?class=news"><img src="images/inews-title.png" alt="資訊快遞 NEWS" width="720" height="18" border="0"></a></div>
    <div class="inews-list">
      <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['news'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['news']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['name'] = 'news';
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['news'][1]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['news']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['news']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['news']['total']);
?>
        <li><a href="news-detail.html"><img src="images/icon-message.png" alt="特價" width="52" height="16" vspace="7" border="0" align="absmiddle">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['news'][1][$_smarty_tpl->getVariable('smarty')->value['section']['news']['index']]['name'];?>
</a></li>
<?php endfor; endif; ?>
      </ul>
    </div>
  </div>
  <div class="upload"><a href=""><img src="images/upload.png" alt="UPLOAD 檔案上傳" width="225" height="119"></a></div>
</div>
<script>
$(document).ready(function(){
	  window.setTimeout("edm_bug()",100);
});
function edm_bug(){
	$('.nivo-controlNav').attr('style','position:absolute;right:65px;bottom:5px;z-index:9999;text-align: center;padding:0;margin:0;');
}
</script>

<div style="clear:both;"></div>
<div class="footer"><span class="f-contact"><a href="contact.html">
<img src="images/f-contact-bn.png" alt="連絡我們" width="108" height="30" border="0"></a>
</span><span class="siteinfo">馬基數位印刷有限公司    新北市中和區建康路166號<br>
  TEL:(02)8228-6969  FAX : (02)2223-8515</span> <span class="copyright">Copyrights © 2013 All Rights Reserved.</span> </div>

</body>
</html>
<?php }} ?>
