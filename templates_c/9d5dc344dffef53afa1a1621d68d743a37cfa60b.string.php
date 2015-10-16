<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 09:38:30
         compiled from "9d5dc344dffef53afa1a1621d68d743a37cfa60b" */ ?>
<?php /*%%SmartyHeaderCode:10439536054167ed5f0-90179457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d5dc344dffef53afa1a1621d68d743a37cfa60b' => 
    array (
      0 => '9d5dc344dffef53afa1a1621d68d743a37cfa60b',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '10439536054167ed5f0-90179457',
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
  'unifunc' => 'content_53605416890ad7_88386316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53605416890ad7_88386316')) {function content_53605416890ad7_88386316($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div class="wrapper">
<img src="images/title-about.png" width="1000" height="124" border="0">
  <div class="maincontent">
    
    <div class="sidebar">
      <ul>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['about'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['about']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['name'] = 'about';
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['about'][1]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['about']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['about']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['about']['total']);
?>
        <li><a href="index2.php?ban=8&bid=<?php echo $_smarty_tpl->tpl_vars['data']->value['about'][1][$_smarty_tpl->getVariable('smarty')->value['section']['about']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['about'][1][$_smarty_tpl->getVariable('smarty')->value['section']['about']['index']]['name'];?>
</a></li>
        <?php endfor; endif; ?>
      </ul>
    </div>


    <script>
		function openmenu(bj){
			if ($(bj).css('display')=='block'){
				$(bj).css('display','none');
				$(bj).parent().find('a:eq(0)').css('background','url(images/icon.png) no-repeat 7px 15px');//-- 選到的改變class
			}else{
				$(bj).css('display','block');
				$(bj).parent().find('a:eq(0)').css('background','url(images/icon-active.png) no-repeat 7px 15px');
			}
		}
	</script>
    
         <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['about']['name'];?>
</div>
		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['about']['detail'];?>
    
    </div>
    <div style="clear:both;"></div>
  </div>
</div>

<div style="clear:both;"></div>
<div class="footer"><span class="f-contact"><a href="contact.html">
<img src="images/f-contact-bn.png" alt="連絡我們" width="108" height="30" border="0"></a>
</span><span class="siteinfo">馬基數位印刷有限公司    新北市中和區建康路166號<br>
  TEL:(02)8228-6969  FAX : (02)2223-8515</span> <span class="copyright">Copyrights © 2013 All Rights Reserved.</span> </div>

</body>
</html>
<?php }} ?>
