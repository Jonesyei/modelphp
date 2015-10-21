<?php /* Smarty version Smarty-3.1.18, created on 2015-10-20 16:01:16
         compiled from "D:\AppServ\www\modelphp\serback\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:10876559b5be9455e41-29983648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af2c16827e9e72c339120fceb14605d5434fc1c8' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\login.html',
      1 => 1445328074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10876559b5be9455e41-29983648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5be94d1032_82077653',
  'variables' => 
  array (
    'data' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5be94d1032_82077653')) {function content_559b5be94d1032_82077653($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<link href="css/main.css" rel="stylesheet" type="text/css" />



</head>

<body class="login" onload="$('#account').focus();"><!--清除$_SESSION admin_info-->



<div class="index-warper"> 
   <div class="login-title">VIPCASE<br />
   SYSTEM</div>
   <div class="login-power-by"><a href="http://www.vipcase.net" target="_blank">Power by vipcase</a></div>
  <div class="login-box">
  
  
  
  
     <div style="position:relative;">
         <form name="form" id="form" method="post" action="index.php" enctype="multipart/form-data" >
     <ul>
     <li><img src="images/login-id.png" width="15" height="15" /> <input name="account" id="account" type="text" class="login-id" placeholder="後台管理帳號" style="width:180px" /></li>
     <li><img src="images/login-key.png" width="15" height="15" /> <input name="password" id="password" type="password" class="login-id" placeholder="後台管理密碼" style="width:180px" /></li>
     <li><img src="images/login-code.png" width="15" height="15" /> 
     <img src="verifycode.php" onclick="$(this).attr('src',$(this).attr('src'));"> <input name="code" type="text" class="login-id" placeholder="CODE" style="width:60px;" /></li>
     <li class="fotget" style="padding-left:20px;">
         <input type="checkbox" name="checkbox" id="checkbox" />
     記住登入訊息
     <img src="images/login-forget.png" width="15" height="15"/><a href="javascript:forgotpw();" class="fotget"> 忘記密碼</a></li>
     </ul>
    <script>
	function forgotpw(){
		$('#dialog-confirm').dialog('open');
	}
	</script>
     <input type="image" src="images/login-btn.png"  width="50" height="50" class="login-btn" class="login-btn login" />
     
     
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
     
	    </form>
     </div>
   </div>
</div>



<?php echo $_smarty_tpl->tpl_vars['link']->value;?>



<div id="dialog-confirm" title="忘記密碼">
  請輸入您的管理者Email<br><br>
  <input type="text" id="forgot" size="40">
  <br><font color="#FF0000">填寫完畢後，將重置你的密碼，並郵件於你的信箱中</font>
</div>
<script>
$(function() {
$( "#dialog-confirm" ).dialog({
  resizable: false,
  height:200,
  width:350,
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

//--表單記憶功能
$(window).bind('load',function (){
	$('#form').bind('submit',function (){
		if ($('#checkbox:checked').length>0){
			localStorage.setItem('serback_account',$('[name="account"]').val());
			localStorage.setItem('serback_password',$('[name="password"]').val());
			localStorage.setItem('serback_lang',$('[name="lang"]').val());
			localStorage.setItem('serback_saveaccount','checked');
		}else{
			localStorage.removeItem("serback_account");
			localStorage.removeItem("serback_password");
			localStorage.removeItem("serback_lang");
			localStorage.removeItem("serback_saveaccount")
		}
	});
	$('[name="account"]').val(localStorage.getItem('serback_account'));
	$('[name="password"]').val(localStorage.getItem('serback_password'));
	$('[name="lang"]').val(localStorage.getItem('serback_lang'));
	if (localStorage.getItem('serback_saveaccount')!=null){
		$('#checkbox')[0].checked=true;
	}
});
</script>

</html>
<?php }} ?>
