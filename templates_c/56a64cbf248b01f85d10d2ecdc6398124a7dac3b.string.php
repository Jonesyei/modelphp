<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 10:01:04
         compiled from "56a64cbf248b01f85d10d2ecdc6398124a7dac3b" */ ?>
<?php /*%%SmartyHeaderCode:1939353605960c13701-72918026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56a64cbf248b01f85d10d2ecdc6398124a7dac3b' => 
    array (
      0 => '56a64cbf248b01f85d10d2ecdc6398124a7dac3b',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1939353605960c13701-72918026',
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
  'unifunc' => 'content_53605960d17a22_30963440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53605960d17a22_30963440')) {function content_53605960d17a22_30963440($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<img src="images/title-product.png" alt="產品介紹 Works" width="1000" height="124" border="0">
  <div class="maincontent">
    <div class="sidebar">
      <ul>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['category17'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['name'] = 'category17';
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['category'][1]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['category17']['total']);
?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['depth']=='1') {?>
<li><a href="#" class="active"><?php echo $_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['name'];?>
</a>
<ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['category46'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['name'] = 'category46';
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['childitem']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['category46']['total']);
?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['childitem'][$_smarty_tpl->getVariable('smarty')->value['section']['category46']['index']]['depth']==2) {?>
<li><a href="index2.php?ban=10&class=<?php echo $_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['childitem'][$_smarty_tpl->getVariable('smarty')->value['section']['category46']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['category'][1][$_smarty_tpl->getVariable('smarty')->value['section']['category17']['index']]['childitem'][$_smarty_tpl->getVariable('smarty')->value['section']['category46']['index']]['name'];?>
</a></li>
<?php }?>
<?php endfor; endif; ?>
</ul></li>
<?php }?>
<?php endfor; endif; ?>
      </ul>
    </div>


      <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['class_name'];?>
</div>
      <div class="proddetail">
        <div class="prod-brief"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['product']['pic'];?>
" width="330" border="0" align="left" class="imgLarge">
          <div class="prod-name"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['product']['name'];?>
</div>
          <div class="prod-brief-desc">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['product']['detail'];?>

          </div>
          <div style="clear:both; border-bottom:dotted 1px #999; height:20px; margin-bottom:20px;"></div>
          <div>
           <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['product']['detail'];?>

          </div>
        </div>
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
