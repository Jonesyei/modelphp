<?php /* Smarty version Smarty-3.1.18, created on 2014-07-28 09:20:10
         compiled from "9b3849540471066727d78fb8cb890e9d90175bfe" */ ?>
<?php /*%%SmartyHeaderCode:1034153d5a54abcd2d3-13689584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b3849540471066727d78fb8cb890e9d90175bfe' => 
    array (
      0 => '9b3849540471066727d78fb8cb890e9d90175bfe',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1034153d5a54abcd2d3-13689584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53d5a54adb3726_36510045',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d5a54adb3726_36510045')) {function content_53d5a54adb3726_36510045($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<!--
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>
<script type="text/javascript" src="includes/js/data.js"></script>
-->
<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='product'&&$_smarty_tpl->tpl_vars['data']->value['pageget']['id']!=null) {?>
<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
"/>
<meta property="og:url" content="index.php?class=product&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['id'];?>
"/>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'];?>
"/>
<meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
"/>
<meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['memo'];?>
"/>
<?php }?>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']==null&&$_smarty_tpl->tpl_vars['data']->value['pagename']=='index') {?>index<?php } else { ?>inside<?php }?>">
<div class="header">

<a href="index.php"><img src="images/logo.png" width="258" height="76" class="logo" /></a>
<div class="top-tool">
	搜尋<input type="text" id="seach_word" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['seach_word'];?>
"  placeholder="請輸入產品關鍵字詞"><input type="button" value="搜索" onclick="search_pro();">
  <?php echo $_smarty_tpl->tpl_vars['data']->value['login_html'];?>

  <a href="shopping.php?list=1">購 物 車</a>
  <script>
  function search_pro(){
	  window.location.href= 'index.php?class=product&seach_word=' + $('#seach_word').val();
  }
  </script>
</div>
	<div class="menu">
    <ul>
      <li><a href="index.php?class=news" class="menu01"></a></li>
      <li><a href="index.php?class=ac" class="menu02"></a></li>
      <li><a href="index.php?class=product" class="menu03"></a></li>
      <li><a href="index.php?class=Customization" class="menu04"></a></li>
      <li><a href="index.php?class=work" class="menu05"></a></li>
      <li><a href="index.php?class=contact" class="menu06"></a></li>
    </ul>
  </div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    


<div class="footer">
 <div class="foot-box">
       <div><img src="images/footer-rd-bg.jpg" width="1000" height="50" class="copygight"></div>
   </div>
</div>

<script>
function MM_jumpMenu(text,obj,act){
	
}
</script>
</body>
</html>
<?php }} ?>
