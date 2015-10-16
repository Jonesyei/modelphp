<?php /* Smarty version Smarty-3.1.18, created on 2014-08-13 10:26:10
         compiled from "bbdcd5b0f721ee3cef3e3c8b1d678abd3d2a2695" */ ?>
<?php /*%%SmartyHeaderCode:596253eaccc257e700-52379282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbdcd5b0f721ee3cef3e3c8b1d678abd3d2a2695' => 
    array (
      0 => 'bbdcd5b0f721ee3cef3e3c8b1d678abd3d2a2695',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '596253eaccc257e700-52379282',
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
  'unifunc' => 'content_53eaccc264ae52_24923953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eaccc264ae52_24923953')) {function content_53eaccc264ae52_24923953($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>
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
<link href="css.php?style=<?php echo $_smarty_tpl->tpl_vars['data']->value['style'];?>
" rel="stylesheet" type="text/css">
</head>

<body>


  <div class="header"><!-- 頭部 -->
      <div class="logo"><a href="index.html"><img src="images/logo.png" width="85" height="85" /></a></div>
      
      <div class="top-tool">
        歡迎 <span class="member-id">Terry</span> 登入 ~ 
        <a href="login.html">會員登入</a> |
        <a href="#">登出</a> |
        <a href="regist.html">加入會員</a> |
        <a href="shopping-car.html">購物車</a>
      </div>
  </div>
  
<div class="menu"><!-- 選單 -->
    
    <ul>
          <li><a href="index.html">home</a>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="about.html">About</a>
             <ul class="sub"><!-- 第一層次級 -->
			   <li><a href="#">about - 01</a></li>
               <li><a href="#">about - 02</a></li>
               <li><a href="#">about - 03</a></li>
             </ul>
          </li>
          <li><a href="news.html">news</a></li>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="product.html">product</a>
          
          <ul class="sub"><!-- 第一層次級 -->
          
			   <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 01</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                          <li><a href="#">產品二級06</a></li>
                      </ul>
               </li>
               
               <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 02</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                      </ul>
               </li>
               
               <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 03</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                      </ul>
               </li>
            </ul><!-- 第一層次級 結束 -->
          </li>
          
          <li><a href="service.html">service</a></li>
          <li><a href="contact.html">contact</a></li>
    </ul>
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
<script>
$(document).ready(function (){
	$('script').remove();
});
</script>
</body>
</html>
<?php }} ?>
