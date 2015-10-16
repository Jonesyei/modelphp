<?php /* Smarty version Smarty-3.1.18, created on 2014-05-09 16:46:01
         compiled from "D:\AppServ\www\margi\templates\templates.html" */ ?>
<?php /*%%SmartyHeaderCode:21224536067cde727c3-15753311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '335a4655acc53b8a883585c69a39f839d677e884' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\templates\\templates.html',
      1 => 1399625150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21224536067cde727c3-15753311',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536067cdf40ee5_98398528',
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536067cdf40ee5_98398528')) {function content_536067cdf40ee5_98398528($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>
<script type="text/javascript" src="includes/js/data.js"></script>
<?php if ($_smarty_tpl->tpl_vars['data']->value['pagename']=='index'&&$_smarty_tpl->tpl_vars['data']->value['pageget']['class']==null) {?>
<link rel="stylesheet" href="style/nivo-slider.css" type="text/css" media="screen" />
<script src="css/jquery.min.js" type="text/javascript"></script>
<script src="css/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="includes/js/jquery.corner.js" type="text/javascript"></script>
<link rel="stylesheet" href="style/default.css" type="text/css" media="screen" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<?php } else { ?>
<link href="style/style-p.css" rel="stylesheet" type="text/css">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='history_case') {?>
<script src="style/lightbox.js"></script>
<link href="style/lightbox.css" rel="stylesheet">
<?php }?>
<style>
/************** pages 頁碼 ********************/

.page { font-size: 15px; line-height: 1.5em; text-align:center; clear:both;}
.page a, .page a { background:#999; color:#FFF; padding: 1px 10px; margin-right: 5px;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; text-shadow: -1px -1px 0px #6A6A6A; text-decoration:none;}
.page a:hover { background: #669; color:#FFF; }

.pages-data-top { font-size: 1em; text-align:right; color:#666; line-height:2em; }
.pages-data { font-size: 0.9em; text-align:right; color:#666; line-height:3em; }
.pages-data input.pages-numb { width: 30px; height:1.3em; border: 1px #999 solid; margin: 0 5px;}
.pages-data input.pages-go { color:#066; border: 1px #999 solid; margin: 0 5px;}
</style>
</head>
<body>
<div class="header">
  <div class="logo"><a href="index.php"><img src="images/logo.png" alt="馬基數位印刷有限公司" width="359" height="28" border="0"></a></div>
  <div class="menu">
    <ul>
      <li><a href="index.php" class="home"><span class="displaynone">首頁</span></a></li>
      <li><a href="index.php?class=about" class="about"><span class="displaynone">關於馬基</span></a></li>
      <li><a href="index.php?class=service" class="service"><span class="displaynone">服務項目</span></a></li>
      <li><a href="index.php?class=product" class="product"><span class="displaynone">產品介紹</span></a></li>
      <li><a href="index.php?class=history_case" class="case"><span class="displaynone">歷史案件</span></a></li>
      <li><a href="index.php?class=qa" class="faq"><span class="displaynone">製作Q&amp;A</span></a></li>
    </ul>
  </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='contant') {?>
<div class="wrapper">
<img src="images/title-contact.png" alt="連絡我們 Contacts" width="1000" height="124" border="0">
  <div class="maincontent">
    <div class="sidebar"><img src="images/sb-contact-pic.jpg" alt="" width="220" height="550" border="0"> </div>
    <div class="main">
      <div class="title">如有任何需求與建議請聯繫我們</div>
      <form action="_form_mail.php" method="post">
      <table border="0" cellspacing="0" cellpadding="0" class="contact-table">
                                <tr>
                                  <th height="50">&nbsp;</th>
                                  <td>&nbsp;</td>
                                  </tr>
                                <tr>
                                  <th>姓名：</th>
                                  <td><input name="name" type="text" id="textfield" class="wd_input_01" alt="姓名"></td>
        </tr>
                                <tr>
                                  <th>電話：</th>
                                  <td><input name="phone" type="text" id="textfield2" class="wd_input_01" alt="電話"></td>
                                  </tr>
                                <tr>
                                  <th>E-mail：</th>
                                  <td><input name="email" type="text" id="textfield3" class="wd_input_01" alt="email"></td>
                                  </tr>
                                <tr>
                                  <th>留言：</th>
                                  <td><textarea name="msg" id="textarea" cols="45" rows="5" class="wd_input_02" alt="留言"></textarea></td>
                                  </tr>
                                <tr>
                                  <th>驗證碼：</th>
                                  <td><input name="code" type="text" id="textfield5" size="10" class="wd_input_03" alt="驗證碼">
                                  <img src="verifycode.php" width="86" height="25" align="absmiddle"></td>
                                  </tr>
                                <tr>
                                  <th>&nbsp;</th>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <th>&nbsp;</th>
                                  <td><input type="button" id="button" onclick="checkform()" value="送　　出" class="wd_input_bn">
                                  <input type="reset" id="button2" onclick="window.location.reload();" value="重新填寫" class="wd_input_bn"></td>
                                </tr>
                                </table>
                                </form>
    </div>
    <div style="clear:both;"></div>
  </div>

</div>
<script>
var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
var check_array = ['form .wd_input_01','form .wd_textarea_01','form .wd_input_02','form .wd_input_03']; //--要檢查空值得陣列物件
var erro_msg;
var check_star = 0;
function checkform(){
	erro_msg='';
	for(aa in check_array){
		$(check_array[aa]).each(function(idx,data){
			$(data).parent().find('[vail="vail"]').remove();//--先移除後方的*字號
			if ($(data).attr('alt')!=null&&($(data).val()==''||$(data).val()==null)) {
				if (check_star) $(data).parent().append('<font vail="vail" color="red">*</font>');
				erro_msg += $(data).attr('alt')+' 欄位不可為空值!!\n';
			}else if ($(data).attr('name')=='email' && !reg.test($(data).val())) {
				if (check_star) $(data).parent().append('<font vail="vail" color="red">*格式錯誤</font>');
				erro_msg += $(data).attr('alt') + '格式不正確!!\n';
			}
		 });
	}
	if (erro_msg=='')
		$('form').submit();
	else
		alert(erro_msg);
	
}
</script>

<?php } else { ?>

	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
<?php }?>

  <div style="clear:both;"></div>

<div class="footer">
<?php echo $_smarty_tpl->tpl_vars['data']->value['foor'];?>

</div>

</body>
<script>
$(document).ready(function(){
	//$('div:eq(3)').css('background','rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box');
	$("#slider").corner("20px");
});
</script>
</html>
<?php }} ?>
