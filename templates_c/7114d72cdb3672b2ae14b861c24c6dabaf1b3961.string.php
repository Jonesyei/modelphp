<?php /* Smarty version Smarty-3.1.18, created on 2014-08-15 16:29:00
         compiled from "7114d72cdb3672b2ae14b861c24c6dabaf1b3961" */ ?>
<?php /*%%SmartyHeaderCode:2387053edc4cce0d5e8-07640597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7114d72cdb3672b2ae14b861c24c6dabaf1b3961' => 
    array (
      0 => '7114d72cdb3672b2ae14b861c24c6dabaf1b3961',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2387053edc4cce0d5e8-07640597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
    'article' => 0,
    'article_parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53edc4ccee9805_40870525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53edc4ccee9805_40870525')) {function content_53edc4ccee9805_40870525($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div>

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
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="about.html">About</a>
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

  <div class="edm"><!-- 首頁 大BANNER -->
     
  </div>
  
<div class="main clearfix"><!-- 主要區塊 -->
   <!-- InstanceBeginEditable name="EditRegion3" -->
       <div class="col-01"><!-- 第一欄 -->
     <div class="left-menu"><!-- 左邊選單 -->
     <h3>News</h3>
        <ul>
        	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['article']->value['news']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
          <li><a href="index2.php?ban=9<?php echo $_smarty_tpl->tpl_vars['article']->value['news'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['parent_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['news'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['name'];?>
</a></li>
          	<?php endfor; endif; ?>
       </ul>
     </div>
  </div>
  
  
  <div class="col-02"><!-- 第二欄 -->
     <div class="page-main">
        <h3 class="page-title">最新消息</h3>
     </div>
     <div class="index-news"><!-- 最新消息 -->
     <div class="index-news-th"><span class="news-date">日期</span> <span class="news-title">標題</span></div>
        <ul>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['article_parent']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
          <li class="clearfix"><span class="list-news-date">2014-04-23</span>
          <span class="list-news"><a href="XX<?php echo $_smarty_tpl->tpl_vars['article_parent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['main_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article_parent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['name'];?>
</a></span></li>
        <?php endfor; endif; ?>
       </ul>
     </div>
     
     
     <!-- 頁次模組 -->
     <div class="page">全部共 25  筆(每頁 10 筆)　　<a href="#">[上一頁]</a>　　<a href="#">[下一頁]</a>　　前往第 
    <form name="form" id="form" style="display:inline-block;">
    <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
      <option value="#">1</option>
      <option value="#">2</option>
      <option value="#">3</option>
    </select>
  </form>
    頁
  </div>
  </div>
   
   <!-- InstanceEndEditable -->   
  </div>
  
  <div class="footer"><!-- 底部 -->
       Copyright © 2014 Web pwoer ALL RIGHTS RESERVED.
  </div>
  <div class="wp-copyright">
     <a href="www.vipase.net" target="_blank">網頁設計 BY 網動廣告科技</a>
  </div>

</div>
<script>
$(document).ready(function (){
	$('script').remove();
});
</script>
</body>
</html>
<?php }} ?>
