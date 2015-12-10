<?php /* Smarty version Smarty-3.1.18, created on 2015-12-09 14:06:57
         compiled from "D:\AppServ\www\modelphp\serback\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3214559b5bf1cf8466-57938604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f806576792ed8b26e20c6a9e0f15e0f5c84ca38b' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\index.html',
      1 => 1449640647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3214559b5bf1cf8466-57938604',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5bf1d909b6_26608696',
  'variables' => 
  array (
    'set' => 0,
    'web_css' => 0,
    'data' => 0,
    'admin_info' => 0,
    'menu' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5bf1d909b6_26608696')) {function content_559b5bf1d909b6_26608696($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"/>
<title><?php echo $_smarty_tpl->tpl_vars['set']->value[0]['detail'];?>
::後台管理系統</title>
<?php echo $_smarty_tpl->tpl_vars['web_css']->value;?>

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


<link href="style/ui.all.css" rel="stylesheet" type="text/css" /><!--tabs分頁用-->
<link href="style/style.css" rel="stylesheet" type="text/css" media="all" /><!--ccs呈現效果-->
<link href="style/J_autoview.css" rel="stylesheet" type="text/css" media="screen and (max-width:750px)">
<link href="../includes/js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css"><!--datepick-->
<link href="../includes/js/datepick/timePicker.css" rel="stylesheet" type="text/css"><!--timePicker-->



</head>

<body>

<div id="warper">

<div class="header"><!-- head -->

   <div style=" position:relative;">
        <div class="logo"><a href="index.php" style="color:#CDB964;"><?php echo $_smarty_tpl->tpl_vars['set']->value[0]['detail'];?>
</a></div>
        <div class="logo-slogan">網站後台管理系統</div>
        <div class="login-person clearfix">
             <a href="login.php" class="logout">登　　出</a>
             <a href="../" target="_blank" class="outlay">前端預覽</a>
             <?php if ($_smarty_tpl->tpl_vars['data']->value['data_temp']!=null) {?>
             <a href="javascript:;" class="outlay" onClick="if (confirm('是否還原先前修改動作?\r\n請注意已刪除的圖片並無法回復!!')) {window.location.href='<?php echo $_smarty_tpl->tpl_vars['data']->value['data_temp'];?>
';}" style="width:30px;">還原</a>
             <?php }?>
             <div class="person-info">使用者: <span class="person"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['account'];?>
)</span> 登入時間 <?php echo $_smarty_tpl->tpl_vars['admin_info']->value['login_date'];?>

              <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['lang_title']!=null) {?>[管理語系:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['lang_title'];?>
]<?php }?> [權限:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['control'];?>
]
             </div>
             <div class="use-space" <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['file_size_bar']!='1') {?>style="display:none;"<?php }?>>
                網站使用空間 : <span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['file_size_total'];?>
</span>
                <div class="use-percent-box" title="已使用:<?php echo number_format($_smarty_tpl->tpl_vars['admin_info']->value['size_bar_width'],1);?>
%">
                  <div class="use-percent-load" style="width:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['size_bar_width'];?>
%;"></div><!-- 空間%數 -->
                </div>
                
                資料庫空間 : <span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['db_size_total'];?>
</span>
                <div class="use-percent-box" title="已使用:<?php echo number_format($_smarty_tpl->tpl_vars['admin_info']->value['db_bar_width'],1);?>
%">
                  <div class="use-percent-load" style="width:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['db_bar_width'];?>
%;"></div><!-- 空間%數 -->
                </div>
             </div>

        </div>
   </div>
   </div>



<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>



<!--content_bg-->

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--content_bg-->



<!--MENU-->


<!--MENU-->


</div><!--div id="content"-->
</div><!--div id="wrapper"-->

<div class="footer"> <!-- footer -->
      © 2014 POWER BY  <a href="vipcase.net.tw" target="_blank">WEB POWER ADVERTISING TECHNOLOGY CO.,LTD. </a>
  </div>

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
<script>
var _menu_tg_px = 240;
$(document).ready(function (){
	$('.col-02').prepend('<img src="images/br_prev_icon.png" onclick="tgmenu(this);" style="border:1px #562424 solid; position:absolute;top:80px;">');
});
tgmenu = function (obj){
	if ($('.col-01:visible').length>0){
		$('.col-02').animate( {left:'0px'} );
		$('.col-01').animate( {left:(_menu_tg_px*-1)+'px' },function (){$(this).hide();});
		$(obj)[0].src = "images/br_next_icon.png";
	}else{
		$('.col-02').animate( {left:_menu_tg_px+'px'} );
		$('.col-01').show().animate( {left:'0px' });
		$(obj)[0].src = "images/br_prev_icon.png";
	}
}
</script>
</body>
</html>
<?php }} ?>
