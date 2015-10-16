<?php /* Smarty version Smarty-3.1.18, created on 2014-05-13 12:53:15
         compiled from "D:\AppServ\www\margi\serback\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:23870536362cb26ad05-03887551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c654b00b3b5c61c215c54884cbffc32f32fc9f0' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\login.html',
      1 => 1399950990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23870536362cb26ad05-03887551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536362cbabf0e8_69925986',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536362cbabf0e8_69925986')) {function content_536362cbabf0e8_69925986($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網動廣告科技</title>

<script type="text/javascript" src="../includes/js/jquery.js"></script>
<script type="text/javascript" src="../includes/js/jquery-ui.js"></script>

<script type="text/javascript" src="../includes/js/jquery.validate.js" ></script><!--JQ驗證用套件-->
<script type="text/javascript" src="../includes/js/cmxforms.js" ></script><!--JQ驗證用套件-->

<script type="text/javascript" src="../includes/js/datepick/jquery.datepick.js"></script><!--datepick-->
<script type="text/javascript" src="../includes/js/datepick/jquery.datepick-zh-TW.js"></script><!--datepick-->
<script type="text/javascript" src="../includes/js/ui/ui.core.js"></script><!--tabs分頁用-->
<script type="text/javascript" src="../includes/js/func_back_js.js" ></script><!--自定後台js-->


<link href="style/ui.all.css" rel="stylesheet" type="text/css" /><!--tabs分頁用-->
<link href="../includes/js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css"><!--datepick-->
<link href="style/login_style.css" rel="stylesheet" type="text/css" /><!--登入頁用ccs-->




</head>

<body onload="$('#account').focus();"><!--清除$_SESSION admin_info-->



<div class="login_body">

  <div class="login_table">
    <p class="logo"><img src="images/logo.jpg" width="327" height="67" /></p>
	
    <form name="form" id="form" method="post" action="index.php" enctype="multipart/form-data">
	
    <p class="ps_id"><img src="images/id.jpg" width="55" height="21" /> 
      <input name="account" id="account" type="text"/></p>
	  
    <p class="ps_id"><img src="images/ps.jpg" width="55" height="21" /> 
      <input name="password" id="password" type="password" /></p>
	  
	<p class="ps_id"><span style="padding-left:4px; padding-right:4px;">驗證號碼</span>
    <input name="code" value="" size="4" style="width:50px;">
    <img src="verifycode.php" onclick="$(this).attr('src',$(this).attr('src'));" style="height:20px;">
    <a href="javascript:$('#dialog-confirm').dialog('open');">忘了密碼?</a>
	</p>




<?php if (count($_smarty_tpl->tpl_vars['data']->value['list'])>1) {?>
<p class="ps_id"><span style="padding-left:4px; padding-right:4px;">語系選擇</span>
      <select name="lang" id="lang">
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['l'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['l']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['name'] = 'l';
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total']);
?>
	  <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['detail'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['name'];?>
</option>
      <?php endfor; endif; ?>
	  </select>
</p>
<?php }?>




	
	

	<!--<img src="images/login_btn.jpg" style="cursor:pointer;" onclick="form.submit();"  />-->
		  
    <input type="image" src="images/login_btn.jpg" class="login" />
	
	
    </form>
	
  </div>
  <div class="login_copyright">POWER BY  WEB POWER ADVERTISING TECHNOLOGY CO.,LTD.</div>
</div>

<div id="dialog-confirm" title="忘記密碼">
  請輸入您的管理者Email<br><br>
  <input type="text" id="forgot" size="40">
  <br><font color="#FF0000">填寫完畢後，將重置你的密碼，並郵件於你的信箱中</font>
</div>
<script>
$(function() {
$( "#dialog-confirm" ).dialog({
  resizable: false,
  height:175,
  modal: true,
  buttons: {
	'取消': function() {
	  $( this ).dialog( "close" );
	},
	"送出": function() {
	  window.location.href='login.php?forgot='+$('#forgot').val();
	}
  }
});
$( "#dialog-confirm" ).dialog( "close" );
});
</script>

</body>

<script>
window.name = "serback"; //---幫視窗取名字來判斷是否當個登入頁面

</script>

</html>
<?php }} ?>
