<?php /* Smarty version Smarty-3.1.18, created on 2014-05-15 18:11:53
         compiled from "D:\AppServ\www\jaln\serback\templates\_search_form.html" */ ?>
<?php /*%%SmartyHeaderCode:26931537492e904a199-98749026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c0744dc94b65fde7e4259e2a73de2d1f12148d' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\_search_form.html',
      1 => 1395648949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26931537492e904a199-98749026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537492e90db5a7_32809881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537492e90db5a7_32809881')) {function content_537492e90db5a7_32809881($_smarty_tpl) {?><form action="" method="get" id="search_form" name="search_form">
<div id="search" style="display:none;">


關鍵字查詢<input type="text" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['get']['keyword'];?>
" />

<!--姓名<input type="text" name="searchlike[men_name]" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['post']['searchlike']['men_name'];?>
" />

手機<input type="text" name="searchlike[men_cellphone]" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['post']['searchlike']['men_cellphone'];?>
" />

居住地電話<input type="text" name="searchlike[men_phone]" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['post']['searchlike']['men_phone'];?>
" />-->



建立日期<input type="text" name="daterange" id="daterange" readonly size="25" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['get']['daterange'];?>
">
<script>Datepick("#daterange","range");</script>


<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>



<select name="s_status" id="status" >
	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['status'];?>

</select>

<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_hidden'];?>

  
  
  <img src="images/search_btn.jpg" width="50" height="20" onclick="search_form.submit();"/>
 </div>
 </form><?php }} ?>
