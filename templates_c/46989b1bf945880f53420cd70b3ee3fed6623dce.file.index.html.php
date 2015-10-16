<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 16:28:59
         compiled from "D:\AppServ\www\shenguyu\serback\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3141354b385cb577752-35491201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46989b1bf945880f53420cd70b3ee3fed6623dce' => 
    array (
      0 => 'D:\\AppServ\\www\\shenguyu\\serback\\templates\\index.html',
      1 => 1417663551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3141354b385cb577752-35491201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'admin_info' => 0,
    'set' => 0,
    'setup' => 0,
    'content' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b385cb62db92_93039607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b385cb62db92_93039607')) {function content_54b385cb62db92_93039607($_smarty_tpl) {?><!DOCTYPE html>
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
<?php if ($_smarty_tpl->tpl_vars['data']->value['data_temp']!=null) {?>
<div style=" position: fixed;  top: 0;  left: 1px;  height: 20px;  background-color: #353b48;  width: 25px;  padding: 5px;  padding-left: 10px;  padding-right: 10px;  z-index: 10;  overflow:hidden;  box-shadow:0px 0px 2px 2px #555555;  border-radius: 5px;" class="clearfix corner-all sh10_5_1" onmouseover="$(this).css('opacity','0.6');" onmouseout="$(this).css('opacity','1');">
    <a href="javascript:if (confirm('是否還原先前資料異動的動作?')) {window.location.href='<?php echo $_smarty_tpl->tpl_vars['data']->value['data_temp'];?>
';};" title="可以進行操作還原" style="color: #fff;">還原</a>
</div>
<?php }?>
<div id="userinfo" class="clearfix corner-all sh10_5_1">
	<a href="admin.php">歡迎 <?php echo $_smarty_tpl->tpl_vars['admin_info']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['account'];?>
) 登入 </a><span> | </span>
	<a target="_blank" href="../">預覽</a><span> | </span>
	<a href="javascript: if (confirm('確認是否要登出後台管理系統?')) window.location.href='login.php';">登出</a><span> | </span>
    <a href="javascript:topinfoban();" id="userinfo_button">縮放</a>
    <br>
    <span>登入時間 <?php echo $_smarty_tpl->tpl_vars['admin_info']->value['login_date'];?>
  <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['lang_title']!=null) {?>[管理語系:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['lang_title'];?>
]<?php }?> [權限:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['control'];?>
]</span>	
    <script>
	$(document).ready(function (){
		if (typeof(sessionStorage.userinfoheight)!='undefined'){
			$('#userinfo').height(sessionStorage.userinfoheight);
		}
	})
	function topinfoban(){
		if ($('#userinfo').height()>20){
			$('#userinfo').animate( {height:'20px'} );
			$('#userinfo_button').html('顯示');
			sessionStorage.userinfoheight = '20px';
		}else{
			$('#userinfo').animate( {height:'40px'} );
			$('#userinfo_button').html('隱藏');
			sessionStorage.userinfoheight = '40px';
		}
	}
	</script>
</div>

<div id="wrapper">


<!--TITLE-->
<div id="logo_img">


<a class="logo" href="/"><?php echo $_smarty_tpl->tpl_vars['set']->value[0]['detail'];?>
<!--[ <?php echo $_smarty_tpl->tpl_vars['setup']->value['lang'][$_smarty_tpl->tpl_vars['admin_info']->value['lang']];?>
 ]--></a> 

<!--
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
-->

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
