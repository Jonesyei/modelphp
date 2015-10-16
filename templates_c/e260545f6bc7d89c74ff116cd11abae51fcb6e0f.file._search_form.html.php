<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 09:47:44
         compiled from "D:\AppServ\www\margi\serback\templates\_search_form.html" */ ?>
<?php /*%%SmartyHeaderCode:11217536056404a8de3-45427151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e260545f6bc7d89c74ff116cd11abae51fcb6e0f' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\_search_form.html',
      1 => 1395648949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11217536056404a8de3-45427151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5360564052cad7_28037627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5360564052cad7_28037627')) {function content_5360564052cad7_28037627($_smarty_tpl) {?><form action="" method="get" id="search_form" name="search_form">
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
