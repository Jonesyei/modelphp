<?php /* Smarty version Smarty-3.1.18, created on 2014-08-15 12:35:26
         compiled from "D:\AppServ\www\jaln\templates\MAIL_shopp.html" */ ?>
<?php /*%%SmartyHeaderCode:1857853c8bd420210f2-51097002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdda99987a20386e023ebf140ae2ac16d7665a0d' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\templates\\MAIL_shopp.html',
      1 => 1406858942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1857853c8bd420210f2-51097002',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53c8bd421817e2_54098595',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c8bd421817e2_54098595')) {function content_53c8bd421817e2_54098595($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr style="background:#eeeeee;" height="50">
	<td align="center"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</td>
	</tr>
	</table>
	
	
	<hr style=" float:left;width:100%;" />
    <BR>
	訂單編號:<?php echo $_smarty_tpl->tpl_vars['data']->value['order']['order_no'];?>

	<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#666666">
	<tr>
    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['t'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['t']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['name'] = 't';
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['pro_title']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['t']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['t']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['t']['total']);
?>
		<td height="20" bgcolor="#747474" class=" wd_font12 yellow"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro_title'][$_smarty_tpl->getVariable('smarty')->value['section']['t']['index']];?>
</td>
        <?php endfor; endif; ?>
	</tr>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['name'] = 'ideex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['pro']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ideex']['total']);
?>
	<tr style="background:#cccccc;">
	  <td width="60" class="number">ID<?php echo $_smarty_tpl->tpl_vars['data']->value['pro'][$_smarty_tpl->getVariable('smarty')->value['section']['ideex']['index']]['shopping_car_list_id'];?>
</td>
      <td class="number"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro'][$_smarty_tpl->getVariable('smarty')->value['section']['ideex']['index']]['name'];?>
</td>
	  <!--<td width="100"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro'][$_smarty_tpl->getVariable('smarty')->value['section']['ideex']['index']]['img_html'];?>
</td>-->
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro'][$_smarty_tpl->getVariable('smarty')->value['section']['ideex']['index']]['count'];?>
</td>
	  <td class="number"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro'][$_smarty_tpl->getVariable('smarty')->value['section']['ideex']['index']]['price2'];?>
</td>
	</tr>
	<?php endfor; endif; ?>
    </table>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#666666">
    <?php if ($_smarty_tpl->tpl_vars['data']->value['order']['total']!=null) {?>
    <tr>
    <td width="85%" align="right">商品總額:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['total'];?>
</td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['order']['post_fee']!=null) {?>
    <tr>
    <td align="right">運費:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['post_fee'];?>
</td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['order']['addpoint']!=null) {?>
    <tr>
    <td align="right">可增加的紅利:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['addpoint'];?>
</td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['order']['deshpoint']!=null) {?>
    <tr>
    <td align="right">扣除紅利:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['deshpoint'];?>
</td>
    </tr>
    <?php }?>
    <tr>
    <td align="right">訂單總額:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['total']+$_smarty_tpl->tpl_vars['data']->value['order']['post_fee']-$_smarty_tpl->tpl_vars['data']->value['order']['deshpoint'];?>
</td>
    </tr>
    <tr>
	</table>
    <br><br>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#666666">
    <tr>
    <td width="15%" align="right">收件人:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['recive_name'];?>
</td>
    </tr>
    <tr>
    <td align="right">收件人email:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['recive_email'];?>
</td>
    </tr>
    <tr>
    <td align="right">收件人地址:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['recive_address'];?>
</td>
    </tr>
    <tr>
    <td align="right">收件人電話:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['order']['phone'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['order']['cellphone'];?>
</td>
    </tr>
    </table>
    <br><br>
    <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'];?>
	
</body>
</html><?php }} ?>
