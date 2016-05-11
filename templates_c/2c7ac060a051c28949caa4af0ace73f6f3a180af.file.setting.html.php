<?php /* Smarty version Smarty-3.1.18, created on 2015-12-02 15:08:31
         compiled from "D:\AppServ\www\modelphp\serback\templates\setting.html" */ ?>
<?php /*%%SmartyHeaderCode:18142559b9ac95eb616-77649322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c7ac060a051c28949caa4af0ace73f6f3a180af' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\setting.html',
      1 => 1449040109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18142559b9ac95eb616-77649322',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b9ac987ef45_51980394',
  'variables' => 
  array (
    'admin_info' => 0,
    'ini_webset' => 0,
    'data' => 0,
    'setup' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b9ac987ef45_51980394')) {function content_559b9ac987ef45_51980394($_smarty_tpl) {?><div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">

         <h2 class="funtion-title">網站設定<!-- 頁面標題 -->         </h2>
         <div class="page-tool">
          <a  onClick="$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a>
         </div>


  <!--div id="title"-->


<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">

<form action="" method="post" id="form" name="form">
<div id="tabs">
<ul>
	<li><a href="#tabs-1">網站設定</a></li>
    <!--<li><a href="#tabs-2">按鈕設定</a></li>-->
    <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']<=1&&$_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['design_button']=='1') {?><li><a href="#tabs-4">設計師設定</a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']=='0'&&$_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['system_button']=='1') {?><li><a href="#tabs-3">系統管理者設定</a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']=='0') {?><li><a href="#tabs-6">網站參數設定</a></li><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['post_fee_button']=='1') {?><li><a href="#tabs-5">運費設定</a></li><?php }?>
<!--	<li><a href="#tabs-2">購物設定</a></li>-->
</ul>

<div id="tabs-1">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">

	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['no']<'6'&&$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']<4) {?>
		<tr>
		<td width="120" align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
：</td>
		  <td >
		  <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='2') {?>
			  <textarea name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" cols="50" rows="8"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
</textarea>
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='1') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="45"  />
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='3') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="10" maxlength="10"
			  onkeyup="this.value=this.value.replace(/\D/g,'');"/>
		  <?php }?>
		   </td>
		</tr>
	<?php }?>
	<?php endfor; endif; ?>
	
  </table>

</div>
<!--
<div id="tabs-2">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<td width="120" align="center" >按鈕</td><td>連結路徑</td>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='button') {?>
		<tr>
		<td width="200" align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
：</td>
		  <td >
		  <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='2') {?>
			  <textarea name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" cols="50" rows="8"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
</textarea>
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='1'||$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='4') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="45"  />
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='3') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="10" maxlength="6"
			  onkeyup="this.value=this.value.replace(/\D/g,'');"/>
		  <?php }?>
		   </td>
		</tr>
	<?php }?>
	<?php endfor; endif; ?>
	
  </table>

</div>
-->
<?php if ($_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['post_fee_button']=='1') {?>
<div id="tabs-5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='post_fee'||$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='no_post_fee'||$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='post_fee2') {?>
    	<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name']!='達到金額運費') {?>
		<tr>
		<td width="200" align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
：</td>
		  <td >
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="10" maxlength="6"
			  onkeyup="this.value=this.value.replace(/\D/g,'');"/>
		   </td>
		</tr>
        <?php }?>
	<?php }?>
	<?php endfor; endif; ?>
	
  </table>

</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']<=1&&$_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['design_button']=='1') {?>
<div id="tabs-4">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='design') {?>
		<tr>
		<td width="200" align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
：</td>
		  <td >
		  <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='2') {?>
			  <textarea name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" cols="50" rows="8"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
</textarea>
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='1'||$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='4') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="45"  />
		  <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']=='3') {?>
			  <input type="text" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
"  size="10" maxlength="6"
			  onkeyup="this.value=this.value.replace(/\D/g,'');"/>
		  <?php }?>
		   </td>
		</tr>
	<?php }?>
	<?php endfor; endif; ?>
	
  </table>

</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']=='0'&&$_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['system_button']=='1') {?>
<div id="tabs-3">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<?php if (in_array($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type'],$_smarty_tpl->tpl_vars['setup']->value['setting_type'])) {?>
		<tr>
		<td width="200" align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
：</td>
		  <td >
          <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']==1) {?>
			   <input name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
" size="40">
               <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='backup') {?>
               <a href="../includes/DataBase_backup.php"> 備份資料庫 </a><br>已備份檔案:<br>
               <table>
               <tr><td align="center">時間點</td><td colspan="2" align="center">操作</td></tr>
             <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['file'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['file']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['name'] = 'file';
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['file']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['file']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['file']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['file']['total']);
?>
 	           <tr>
    	      <td><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['file'][$_smarty_tpl->getVariable('smarty')->value['section']['file']['index']];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['file'][$_smarty_tpl->getVariable('smarty')->value['section']['file']['index']];?>
</a></td><td><a href="?del_file=<?php echo $_smarty_tpl->tpl_vars['data']->value['file'][$_smarty_tpl->getVariable('smarty')->value['section']['file']['index']];?>
">[刪除檔案]</a></td>
              <td><a href="javascript:re_pk('<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['file'][$_smarty_tpl->getVariable('smarty')->value['section']['file']['index']];?>
')" target="_blank">[還原到這個時間點]</a></td>
               </tr>
	          <?php endfor; endif; ?>
              </table>
              <script>
			  function re_pk(url){
				  alert('請注意還原內容可能對網站造成嚴重傷害\n請評估後再確認');
				  if(confirm('請確認是否還原到這個時間點的資料內容?')){
					  var person = prompt("一旦操作後，將會現在資料庫內容完全被取代 你確定嘛 ( 是 | 否 )", "否");
					  	if (person=="是")
					  window.location.href='../includes/DataBase_backup.php?type='+url;
				  }
			  }
			  </script>
              <?php }?>
          <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']==2) {?>
          <input type="radio" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail']==1) {?>checked<?php }?>>開
          <input type="radio" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail']==0) {?>checked<?php }?>>關
          <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']==3) {?>
          		<textarea rows="10" cols="50" name="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" id="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"></textarea>
                <div style="display:none;" cp="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['detail'];?>
</div>
                <script>$('textarea#detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
').val($('div[cp="detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"]').html());</script>
              <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type']=='demo_show') {?>
              	<script>
					CKEDITOR.replace( 'detail_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
',
					{
						filebrowserBrowseUrl : '../ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
						filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
						filebrowserUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
				</script>
              <?php }?>
              
          <?php }?>
		   </td>
		</tr>
	<?php }?>
	<?php endfor; endif; ?>
    	<tr>
		<td width="120" align="right" >舊資料時間修正：</td>
		  <td >
	          	<input type="text" id="update" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['today'];?>
">
				<script>Datepick('#update',"","yyyy-mm-dd");</script> 
                <a href="javascript:redate($('#update').val());">開始修正</a>
                <script>
				function redate(ud_data){
		            $.ajax( {
						url: "setting.php",
						data: {ud:ud_data},
						type:"GET",
						dataType:'json',
		
						success: function(msg){
							alert(msg.msg);
						},
		
						 error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError); 
						 }
		            });
				}
				</script>
		   </td>
		</tr>
  </table>

</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['control']=='0') {?>
<div id="tabs-6">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  		<tr><th colspan="2" style="text-align:center;">網站參數管理</th></tr>
		<tr>
		<td width="120" align="right" >容量顯示開關：</td>
		  <td >
			  <?php echo $_smarty_tpl->tpl_vars['data']->value['web_set']['upload_check_status'];?>

		   </td>
		</tr>
		<tr>
		<td width="120" align="right" >網站最大容量(bytes)：</td>
		  <td >
			  <input type="text" name="upload_max_size" value="<?php echo $_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['upload_max_size'];?>
" /> bytes <br>( 1024bytes = 1MB , 1024MB = 1GB , 1024GB = 1TB)
		   </td>
		</tr>
		<tr>
		<td width="120" align="right" >網站容量<br>已滿顯示詞：</td>
		  <td >
			  <input type="text" name="upload_full_msg" value="<?php echo $_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['upload_full_msg'];?>
" />
		   </td>
		</tr>
        <tr>
		<td width="120" align="right" >資料庫最大容量(bytes)：</td>
		  <td >
			  <input type="text" name="db_max_size" value="<?php echo $_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['db_max_size'];?>
" /> bytes <br>( 1024bytes = 1MB , 1024MB = 1GB , 1024GB = 1TB)
		   </td>
		</tr>
		<tr>
		<td width="120" align="right" >資料庫容量<br>已滿顯示詞：</td>
		  <td >
			  <input type="text" name="db_full_msg" value="<?php echo $_smarty_tpl->tpl_vars['ini_webset']->value['web_set']['db_full_msg'];?>
" />
		   </td>
		</tr>
        <tr><th colspan="2" style="text-align:center;">網站參數管理</th></tr>
		<tr>
		<td width="120" align="right" >運費設定顯示：</td>
		  <td >
			  <?php echo $_smarty_tpl->tpl_vars['data']->value['web_set']['post_fee_button_html'];?>

		   </td>
		</tr>
		<tr>
		<td width="120" align="right" >設計師設定顯示：</td>
		  <td >
			  <?php echo $_smarty_tpl->tpl_vars['data']->value['web_set']['design_button'];?>

		   </td>
		</tr>
		<tr>
		<td width="120" align="right" >系統設定顯示：</td>
		  <td >
			  <?php echo $_smarty_tpl->tpl_vars['data']->value['web_set']['system_button'];?>

		   </td>
		</tr>
  </table>

</div>
<?php }?>


</div>
<div  style="padding:1em 1.4em;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" >
	<tr>
      <td width="120" align="right" >最後維護時間：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][0]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][0]['update_date'];?>
 維護
	 </td>
    </tr>

	<input name="act" type="hidden" value="submit" />
  </table>
</div>
</form>

</div>


</div><!--div id="content_inside"-->


</div><!--div id="content_bg"-->
</div>
</div>


<script>
$('#tabs').tabs();
page_initial('table_content');//tr交互顯示顏色
</script>

<?php }} ?>
