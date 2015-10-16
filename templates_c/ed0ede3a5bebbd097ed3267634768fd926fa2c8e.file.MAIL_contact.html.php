<?php /* Smarty version Smarty-3.1.18, created on 2014-05-02 18:40:38
         compiled from "D:\AppServ\www\margi\templates\MAIL_contact.html" */ ?>
<?php /*%%SmartyHeaderCode:3316536376265d9882-72733434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed0ede3a5bebbd097ed3267634768fd926fa2c8e' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\templates\\MAIL_contact.html',
      1 => 1390531830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3316536376265d9882-72733434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'inquiry' => 0,
    'setup' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53637626839123_01751944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53637626839123_01751944')) {function content_53637626839123_01751944($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="X-UA-Compatible" content="IE=9"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>

<body>

<style>
* { font:16px "微軟正黑體",Arial, Helvetica, sans-serif; color:#444; font-weight:600;}
.yellow { #f6ffcc;}
.wd_font12, .wd_font12 a { font:12px "微軟正黑體",Verdana;}
</style>



	<table width="60%" border="0" cellpadding="0" cellspacing="0">
	<tr style="background:#eeeeee;" height="50">
	<td align="center"><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
<?php echo $_smarty_tpl->tpl_vars['web_set']->value['title_add'];?>
</td>
	</tr>
	</table>
	
	
	<?php if ($_smarty_tpl->tpl_vars['web_set']->value['form_set']=='inquiry') {?>
	<hr style=" float:left;width:60%;" />
	
	<table width="60%" border="0" cellspacing="1" cellpadding="5" bgcolor="#666666">
	<tr>
		<td width="60" height="20" bgcolor="#747474" class=" wd_font12 yellow">零件號碼</td>
		<td width="100" bgcolor="#747474" class=" wd_font12 yellow">圖片</td>
		<td width="80" bgcolor="#747474" class=" wd_font12 yellow">車系</td>
		<td width="80" bgcolor="#747474" class=" wd_font12 yellow">車款</td>
		<td width="80" bgcolor="#747474" class=" wd_font12 yellow">大分類</td>
		<td width="80" bgcolor="#747474" class=" wd_font12 yellow">次分類</td>
		<td width="100" bgcolor="#747474" class=" wd_font12 yellow">數量</td>
	</tr>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['inquiry']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total']);
?>
	<tr style="<?php if ($_smarty_tpl->tpl_vars['setup']->value['smarty_count'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]%2==0) {?>background:#dddddd;<?php } else { ?>background:#cccccc;<?php }?>">
	  <td width="60" class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['no'];?>
</td>
	  <td width="100" ><img src="<?php echo $_smarty_tpl->tpl_vars['web_set']->value['favorite_url'];?>
/upload/products/<?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['pic'][0][0];?>
" width="100" height="75" /></td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['carseries'];?>
</td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['carseries2'];?>
</td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['class'];?>
</td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['class2'];?>
</td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['inquiry']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['count'];?>
</td>
	</tr>
	<?php endfor; endif; ?>
	</table>
	
	<?php }?>
	
	
	<hr style=" float:left;width:60%;" />
	
	<table width="60%" border="0" cellspacing="1" cellpadding="1" class="contact_table">
	
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['total']);
?>
      <tr style="<?php if ($_smarty_tpl->tpl_vars['setup']->value['smarty_count'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]%2==0) {?>background:#dddddd;<?php } else { ?>background:#cccccc;<?php }?>" height="30">
        <td width="25%"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['title'];?>
</td>
        <td><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['value']);?>
</td>
      </tr>
	  <?php endfor; endif; ?>
	  
    </table>
	
</body>
</html><?php }} ?>
