<?php /* Smarty version Smarty-3.1.18, created on 2014-08-28 10:06:32
         compiled from "50edec0af84a7b6fdaa6503933d9379007fef0ed" */ ?>
<?php /*%%SmartyHeaderCode:2448453fe8ea8249d87-00851390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50edec0af84a7b6fdaa6503933d9379007fef0ed' => 
    array (
      0 => '50edec0af84a7b6fdaa6503933d9379007fef0ed',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2448453fe8ea8249d87-00851390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
    'article' => 0,
    'product_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fe8ea83d4df5_92225820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fe8ea83d4df5_92225820')) {function content_53fe8ea83d4df5_92225820($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['web_set']->value['keyword'];?>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>

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
          <li><a href="index2.php">home</a>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="index2.php?ban=8">About</a>
             <ul class="sub"><!-- 第一層次級 -->
             	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['article']->value['about']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
			   <li><a href="index2.php?ban=8<?php echo $_smarty_tpl->tpl_vars['article']->value['about'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['main_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['about'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['name'];?>
</a></li>
               	<?php endfor; endif; ?>
             </ul>
          </li>
          <li><a href="index2.php?ban=9">news</a></li>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="index2.php?ban=16">product</a>
          
          <ul class="sub"><!-- 第一層次級 -->
          		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['product_menu']->value['products']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
			   <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover"><?php echo $_smarty_tpl->tpl_vars['product_menu']->value['products'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['name'];?>
</span>
                      <ul class="sub"><!-- 第二層次級 -->
                      		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['product_menu']->value['products'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['child']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
                          <li><a href="index2.php?ban=16<?php echo $_smarty_tpl->tpl_vars['product_menu']->value['products'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['child'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['cate_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['product_menu']->value['products'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['child'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['name'];?>
</a></li>
                          	<?php endfor; endif; ?>
                      </ul>
               </li>
               <?php endfor; endif; ?>
           </ul><!-- 第一層次級 結束 -->
          </li>
          
          <li><a href="service.html">service</a></li>
          <li><a href="contact.html">contact</a></li>
    </ul>
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
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['category']['name'];?>
</div>
      <div class="prodlist">
        <ul>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product57'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['name'] = 'product57';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['product'][1]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product57']['total']);
?>
          <li><a href="index2.php?ban=11<?php echo $_smarty_tpl->tpl_vars['data']->value['product'][1][$_smarty_tpl->getVariable('smarty')->value['section']['product57']['index']]['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['product'][1][$_smarty_tpl->getVariable('smarty')->value['section']['product57']['index']]['pic'];?>
" width="220" height="165"><br>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['product'][1][$_smarty_tpl->getVariable('smarty')->value['section']['product57']['index']]['name'];?>
</a></li>
<?php endfor; endif; ?>
         
        </ul>
      </div>
    <div style="clear:both;"></div>

        <div class="page">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product80'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['name'] = 'product80';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['loop'] = is_array($_loop=1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product80']['total']);
?>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['product'][1][$_smarty_tpl->getVariable('smarty')->value['section']['product80']['index']]['page'];?>

        <?php endfor; endif; ?>
        </div>
      
    </div>
    <div style="clear:both;"></div>
  </div>
</div>

  <div class="footer"><!-- 底部 -->
       Copyright © 2014 Web pwoer ALL RIGHTS RESERVED.
  </div>
  <div class="wp-copyright">
     <a href="www.vipase.net" target="_blank">網頁設計 BY 網動廣告科技</a>
  </div>
<script>
$(document).ready(function (){
	$('script').remove();
});
</script>
</body>
</html>
<?php }} ?>
