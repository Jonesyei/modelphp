<?php /* Smarty version Smarty-3.1.18, created on 2014-07-28 09:23:23
         compiled from "D:\AppServ\www\jaln\templates\templates3.html" */ ?>
<?php /*%%SmartyHeaderCode:1980453d5a54aa71945-14005776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17099a75cc0fa8e7cf6c462936c939acce926562' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\templates\\templates3.html',
      1 => 1406510555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980453d5a54aa71945-14005776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53d5a54ab663d6_68269362',
  'variables' => 
  array (
    'head' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d5a54ab663d6_68269362')) {function content_53d5a54ab663d6_68269362($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>({$web_set.title})</title>
({$web_set.keyword})
<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>
<?php echo $_smarty_tpl->tpl_vars['head']->value;?>

<link href="css.php?style=({$data.style})" rel="stylesheet" type="text/css">
</head>

<body>

<?php echo $_smarty_tpl->tpl_vars['data']->value;?>

<script>
$(document).ready(function (){
	$('script').remove();
});
</script>
</body>
</html>
<?php }} ?>
