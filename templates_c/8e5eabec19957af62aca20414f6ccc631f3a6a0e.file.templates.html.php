<?php /* Smarty version Smarty-3.1.18, created on 2015-10-15 18:07:21
         compiled from "D:\AppServ\www\modelphp\templates\templates.html" */ ?>
<?php /*%%SmartyHeaderCode:11106559b5be50ff9a1-88248745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e5eabec19957af62aca20414f6ccc631f3a6a0e' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\templates\\templates.html',
      1 => 1444903637,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11106559b5be50ff9a1-88248745',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5be51a8ce3_50357184',
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5be51a8ce3_50357184')) {function content_559b5be51a8ce3_50357184($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['web_set']->value['keyword'];?>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<!--
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>
<script type="text/javascript" src="includes/js/data.js"></script>
-->
<script type="text/javascript" src="includes/js/script.js"></script>
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
  <select name="select" id="langobj" onchange="change_lang()">
        <option>--Language--</option>
        <option value="ch">繁體中文</option>
        <option value="cn">簡体中文</option>
        <option value="jp">日本語</option>
        <option value="en">English</option>
  </select>
  <script>
  function change_lang(){
	  switch (document.getElementById('langobj').value){
		  case "ch":
		  		window.location.href = '/';
		  break;
		  case "cn":
		  		window.location.href = 'lang/simplified.html';
		  break;
		  case "jp":
		  		window.location.href = 'lang/jp.html';
		  break;
		  case "en":
		  		window.location.href = 'lang/en.html';
		  break;
	  }
  }
  </script>
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
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M67VGH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push( {'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M67VGH');</script>
<!-- End Google Tag Manager -->
<script>
function MM_jumpMenu(text,obj,act){
	
}
</script>
</body>
</html>
<?php }} ?>
