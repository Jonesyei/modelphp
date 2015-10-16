<?php /* Smarty version Smarty-3.1.18, created on 2014-05-13 11:25:24
         compiled from "D:\AppServ\www\margi\serback\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:12069536054d75cefc4-09096750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5d12ee96ec45dcde271fa737c2e620478400f77' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\index.html',
      1 => 1399951521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12069536054d75cefc4-09096750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536054d77cc650_47568886',
  'variables' => 
  array (
    'set' => 0,
    'admin_info' => 0,
    'setup' => 0,
    'data' => 0,
    'content' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536054d77cc650_47568886')) {function content_536054d77cc650_47568886($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"/>
<title>網動廣告</title>


<script type="text/javascript" src="../includes/js/jquery.js"></script>
<script type="text/javascript" src="../includes/js/jquery-ui.js"></script>
<script type="text/javascript" src="../includes/js/jquery.validate.js" ></script><!--JQ驗證用套件-->
<script type="text/javascript" src="../includes/js/cmxforms.js" ></script><!--JQ驗證用套件-->

<script type="text/javascript" src="../includes/js/datepick/jquery.datepick.js"></script><!--datepick-->
<script type="text/javascript" src="../includes/js/datepick/jquery.datepick-zh-TW.js"></script><!--datepick-->
<script type="text/javascript" src="../includes/js/datepick/jquery.timePicker.js"></script><!--timePicker-->

<script type="text/javascript" src="../includes/js/func_back_js.js" ></script><!--自定後台js-->


<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>

<script type="text/javascript" src="../includes/js/edit_in_place/jquery.jeditable.js"></script>


<script type="text/javascript" src="../includes/js/autocomplete/jquery.autocomplete.js"></script><!--搜索欄位自動校正-->
<link href="../includes/js/autocomplete/autocomplete.css" rel="stylesheet" type="text/css" />


<link href="style/ui.all.css" rel="stylesheet" type="text/css" /><!--tabs分頁用-->
<link href="style/style.css" rel="stylesheet" type="text/css" media="all" /><!--ccs呈現效果-->
<link href="../includes/js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css"><!--datepick-->
<link href="../includes/js/datepick/timePicker.css" rel="stylesheet" type="text/css"><!--timePicker-->



</head>

<body>
<div id="wrapper">


<!--TITLE-->
<div id="logo_img">


<a class="logo" href="/"><?php echo $_smarty_tpl->tpl_vars['set']->value[0]['detail'];?>
<!--[ <?php echo $_smarty_tpl->tpl_vars['setup']->value['lang'][$_smarty_tpl->tpl_vars['admin_info']->value['lang']];?>
 ]--></a> 


<div>
<a href="login.php" class="login"><img src="images/singout.jpg"></a>
</div>


<div style="padding:32px 10px 0 0;">
<div style="background:#979BD8;border-width:2px; font-size:12px; border-color:#446B96;border-style:solid; padding:0; height:20px; width:58px; padding:4px 0 0 8px;">
<a href="../" target="_blank" >前台預覽</a>
</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['data']->value['data_temp']!=null) {?>
<div style="padding:32px 10px 0 0;">
<div style="background:#979BD8;border-width:2px; font-size:12px; border-color:#446B96;border-style:solid; padding:0; height:20px; width:58px; padding:4px 0 0 8px;">
<a href="javascript:if (confirm('是否還原先前修改動作?')) {window.location.href='<?php echo $_smarty_tpl->tpl_vars['data']->value['data_temp'];?>
';};" >還原動作</a>
</div>
</div>
<?php }?>


<div style="padding:28px 10px 0 0;">
歡迎&nbsp;<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['account'];?>
)&nbsp;登入~    <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['lang_title']!=null) {?>[管理語系:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['lang_title'];?>
]<?php }?><BR />
登入時間&nbsp;:&nbsp;<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['login_date'];?>
<br>
</div>


</div>
<!--TITLE-->

<div id="content" >



<!--content_bg-->

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--content_bg-->





<hr class="foot">
<div id="footer">

  <p>網動廣告科技製作 版權所有© 2011  All RIGHT RESERVED.</p>
</div>


<!--MENU-->
<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

<script>

function menu_search(){
	if ($('#menu_search').val()!=null&&$('#menu_search').val()!="")
	$('#left_nav').children("ul").each(function(idx,obj){
			$('#menu_search').val($('#menu_search').val().toUpperCase());
			$(obj).find("ul:contains('"+$('#menu_search').val()+"')").fadeIn();
			$(obj).find("ul:not(:contains('"+$('#menu_search').val()+"'))").fadeOut();
	});
}
</script>
<!--MENU-->


</div><!--div id="content"-->
</div><!--div id="wrapper"-->

<div id="dialog-overlay"></div> 
<div id="dialog-box"> 
  <div class="dialog-content"> 
    <div id="dialog-message"></div> 
  </div> 
</div>


<script>
///---針對chrom 記憶頁面的修正
if (window.name!="serback") window.location.reload();
window.onbeforeunload = function (event){
if (window.name!="serback")
	    $.ajax( {
                url: "ajx.php",
                data: {logout:"1"},
                type:"GET",
                dataType:'JSON',
				async:false,
                success: function(msg){
                },

                 error:function(xhr, ajaxOptions, thrownError){
                 }
            });
}
</script>

</body>
</html>
<?php }} ?>
