<?php /* Smarty version Smarty-3.1.18, created on 2015-07-07 12:56:21
         compiled from "D:\AppServ\www\modelphp\serback\templates\_search_form.html" */ ?>
<?php /*%%SmartyHeaderCode:16811559b5bf5559381-97220359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '526d7efa09cc6c0c0715f2b3285a40476f61d630' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\_search_form.html',
      1 => 1425623571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16811559b5bf5559381-97220359',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5bf558c217_92682704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5bf558c217_92682704')) {function content_559b5bf558c217_92682704($_smarty_tpl) {?><form action="" method="get" id="search_form" name="search_form">


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

  
  
  <img src="images/icon-search.png" width="18" height="18" id="SearchBtn" onclick="search_form.submit();"/>

 </form>
 
 
 <?php }} ?>
