<?php /* Smarty version Smarty-3.1.18, created on 2015-10-15 16:47:21
         compiled from "D:\AppServ\www\modelphp\templates\member.html" */ ?>
<?php /*%%SmartyHeaderCode:4864561f6819291a48-62897441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddc3bf8feb21b3469bb5c02d88ee43451ae065a9' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\templates\\member.html',
      1 => 1416964388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4864561f6819291a48-62897441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'member_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_561f681944b0c8_32362262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561f681944b0c8_32362262')) {function content_561f681944b0c8_32362262($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='login') {?>
<div class="main clearfix">

<div class="col-01">
  <div class="mem-col">
    
  </div>
</div>
   
     <div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">會員登入</h2>
      

     <div class="main-box">
     <div class="login-box">
       <h3 class="login-title"><img src="images/login-title.png" width="49" height="13"></h3>
       <div class="cart-forms">
       	<form action method="post">
         <ul>
            <li><span class="td-login-left">* 會員帳號 : </span><span class="td-login-right"><input name="account" type="text" class="input-style01"></span></li>
            <li><span class="td-login-left">* 會員密碼 : </span><span class="td-login-right"><input name="password" type="password" class="input-style01"></span></li>
          </ul>
          <div class="logn-btn"> <a href="javascript:document.forms.item(0).submit();"><img src="images/btn_login.png" width="127" height="46" class="login"></a>
             <a href="member.php?act=fotgot" class="forget"><img src="images/icon-forget.png" width="21" height="21"> 忘記密碼</a> <a href="member.php?act=join" class="regist"><img src="images/icon-add.png" width="21" height="21"> 加入會員
          </a></div>
         </form>   
       </div>
       
     </div>
       
       
     </div>
</div>
   
</div>
<script>
$('form').on("keyup",function(){
	if (event.keyCode==13){
		$('form').submit();
	}
})
</script>



<?php } else { ?>




<div class="main clearfix">

<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']!='join'&&$_smarty_tpl->tpl_vars['data']->value['pageget']['act']!='fotgot') {?>
<div class="col-01">

  <div class="left-menu">

    <ul>
      <li><span class="nav-catal"><a href="member.php?act=detail">會員資料</a></span></li>
      <li><span class="nav-catal"><a href="member.php?act=cpw">修改密碼</a></span></li>
      <li><span class="nav-catal"><a href="member.php?act=order">歷史訂單</a></span></li>
      <li><span class="nav-catal"><a href="javascript:if (confirm('是否登出會員?')) window.location.href='member.php?act=logout';">會員登出</a></span></li>
    </ul>
  </div>
</div>
<?php } else { ?>
<div class="col-01">

  <div class="mem-col">

  </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='detail') {?>
<script type="text/javascript" src="includes/js/datepick/jquery.datepick.js"></script>
<script type="text/javascript" src="includes/js/datepick/jquery.datepick-zh-TW.js"></script>
<link href="includes/js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css">
<script>
$(document).ready(function (){
		$('[name="birthday"]').datepick( { 
			dateFormat: 'yyyy-mm-dd',
			showTrigger: '<img src="images/icon_date.png" width="22" height="22">'
		}); 
});
</script>   
<div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">會員資料維護</h2>
     <div class="main-box">
     <div>
       <h3 class="from-title">
        <img src="images/icon_arrow.png" width="16" height="15"> 基本資料 <span class="Comment">*號為必填項目</span>
       </h3>
       <div class="cart-forms">
       		<form action method="post">
           <ul>
               <li><span class="td-left">* 會員帳號 : </span><span class="td-right"><input type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['account'];?>
"></span></li>
               
               <li><span class="td-left">* 您的姓名 : </span><span class="td-right"><input name="name" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['name'];?>
"></span></li>
               <li><span class="td-left">* EMAIL : </span><span class="td-right"><input name="email" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['email'];?>
"></span></li>
               <li><span class="td-left">* 聯絡地址 : </span><span class="td-right"><input name="address" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['address'];?>
"></span></li>
				<li><span class="td-left"> 會員級別 : </span><span class="td-right"><?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['type_html'];?>
</span></li>
               <li><span class="td-left">* 電話號碼 : </span><span class="td-right"><input name="phone" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['phone'];?>
"></span></li>
               <li><span class="td-left">* 性別：</span><span class="td-right">
               <input name="radio" type="radio" id="radio" value="radio" <?php if ($_smarty_tpl->tpl_vars['member_info']->value['member']['sex']=='1') {?>checked="checked"<?php }?>>
                 男
                 <input type="radio" name="radio" id="radio2" value="radio" <?php if ($_smarty_tpl->tpl_vars['member_info']->value['member']['sex']!='1') {?>checked="checked"<?php }?>>
               女</span></li>
               <li><span class="td-left">出生日期 : </span><span class="td-right"><input type="text" name="birthday" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['birthday'];?>
" size="20"> 				<li><span class="td-left"> 紅利點數 : </span><span class="td-right">已經累積 <?php echo $_smarty_tpl->tpl_vars['member_info']->value['member']['point'];?>
 點數</span></li>
                 </span></li>
            </ul>
            </form>
       </div>
     </div>

       <div style="padding:10px 0 10px 150px; height:50px; clear:both;"><span style="padding:10px 0 10px 150px; height:50px; clear:both; text-align:">
        <a href="javascript:document.forms.item(0).submit();" class="btn-style01">資料送出</a></span><a href="javascript:window.location.reload();" class="btn-style02">重新填寫</a>
       </div>
    
     </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='cpw') {?>
<div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">修改密碼</h2>
     <div class="main-box">
     <div>
       <h3 class="from-title">
        <img src="images/icon_arrow.png" width="16" height="15"> 修改密碼<span class="Comment">*號為必填項目</span>
       </h3>
       
       <div class="cart-forms">
       		<form action method="post">
           <ul>
               <li><span class="td-left">* 原來密碼 : </span><span class="td-right">
                 <input name="password" type="password" class="input-style01"></span></li>
               
               <li><span class="td-left">* 新的密碼 : </span><span class="td-right">
                 <input name="new_password" type="password" class="input-style01"> 需8位數以上</span></li>
               <li><span class="td-left">* 確認密碼 : </span><span class="td-right">
                 <input id="new_password" type="password" class="input-style01"> 需8位數以上</span></li>
           </ul>
           </form>
       </div>
     </div>
       <div style="padding:10px 0 10px 150px; height:50px; clear:both;"><span style="padding:10px 0 10px 150px; height:50px; clear:both; text-align:">
        <a href="javascript:checkform();" class="btn-style01">資料送出</a></span><a href="javascript:window.location.reload();" class="btn-style02">重新填寫</a>
       </div>
     </div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='fotgot') {?>
<div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">忘記密碼</h2>
     <div class="main-box">

     <div>
       <h3 class="from-title">
        <img src="images/icon_arrow.png" width="16" height="15"> 請輸入資訊 - <span class="td-right">我們將把密碼寄到您的信箱</span><span class="Comment">*號為必填項目</span>
       </h3>
       
       <div class="cart-forms">
       	<form action method="post">
           <ul>
           		<!--
               <li><span class="td-left">* 會員帳號 :</span><span class="td-right"><input name="account" type="text" class="input-style01">
               </span></li>
               -->
               <li><span class="td-left">* 會員email :</span><span class="td-right"><input name="email" type="text" class="input-style01"></span></li>
            </ul>
         </form>
       </div>
     </div>

       <div style="padding:10px 0 10px 150px; height:50px; clear:both;"><span style="padding:10px 0 10px 150px; height:50px; clear:both; text-align:">
        <a href="javascript:history.back()" class="btn-style01">回上一頁</a></span><a href="javascript:checkform();" class="btn-style02">確認送出</a>
       </div>
      
     </div>
</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='join') {?>
<script type="text/javascript" src="includes/js/datepick/jquery.datepick.js"></script>
<script type="text/javascript" src="includes/js/datepick/jquery.datepick-zh-TW.js"></script>
<link href="includes/js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css">
<script>
$(document).ready(function (){
		$('[name="birthday"]').datepick( { 
			dateFormat: 'yyyy-mm-dd',
			showTrigger: '<img src="images/icon_date.png" width="22" height="22">'
		}); 
});
reset_code = function (){
	$('[src="verifycode.php"]')[0].src = $('[src="verifycode.php"]').attr("src");
}
</script>
<div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">會員註冊</h2>

     <div class="main-box">

     <div>
       <h3 class="from-title">
        <img src="images/icon_arrow.png" width="16" height="15"> 基本資料 <span class="Comment">*號為必填項目</span>
       </h3>
       
       <div class="cart-forms">
       <form id="login_from" action method="post">
           <ul>
               <li><span class="td-left">* 會員帳號 : </span><span class="td-right"><input name="account" type="text" class="input-style01" alt="會員帳號"></span></li>
               <li><span class="td-left">* 會員密碼 :</span><span class="td-right"><input name="password" type="password" class="input-style01" alt="會員密碼"> 需8位數以上</span></li>
               <li><span class="td-left">* 確認密碼 :</span><span class="td-right"><input id="password" type="password" class="input-style01" alt="確認密碼"> 需8位數以上</span></li>
               <li><span class="td-left">* 您的姓名 :</span><span class="td-right"><input name="name" type="text" class="input-style01" alt="您的姓名"></span></li>
               <li><span class="td-left">* 聯絡地址 :</span><span class="td-right"><input name="address" type="text" class="input-style01" size="50" alt="聯絡地址"></span></li>
               <li><span class="td-left">* E-mail :</span><span class="td-right"><input name="email" type="text" class="input-style01" size="50" alt="E-mail"></span></li>
               <li><span class="td-left">* 電話號碼 :</span><span class="td-right"><input name="phone" type="text" class="input-style01" alt="電話號碼"></span></li>
               <li><span class="td-left">* 性別：</span><span class="td-right"><input name="sex" type="radio" id="radio" value="radio" checked="1">
                 男
                 <input type="radio" name="sex" id="radio2" value="2">
               女</span></li>
               
               <li><span class="td-left">出生日期 : </span><span class="td-right"><input name="birthday" type="text" class="input-style01" size="10"> 
                 </span></li>
                 
                <li><span class="td-left">驗 證 碼 : </span><span class="td-right"><input name="code" type="text" class="input-style01" size="10" alt="驗證碼"> 
                 <img src="verifycode.php" width="52" height="22"> <a href="javascript:reset_code();" class="reset">刷新驗證碼</a> (請輸入圖片中的數字或字母)</span></li>
            </ul>
       </form>
       </div>
     </div>

       <!-- 收件人資料 -->
       <div style="padding:10px 0 10px 150px; height:50px; clear:both;"><span style="padding:10px 0 10px 150px; height:50px; clear:both; text-align:">
        <a href="javascript:join_checkform();" class="btn-style01">資料送出</a></span><a href="javascript:window.length.reload();" class="btn-style02">重新填寫</a>
       </div>

     </div>
</div>
<script>
var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
var check_array = ['form#login_from input.input-style01']; //--要檢查空值得陣列物件
var erro_msg;
var check_star = 0;
function join_checkform(){
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
	
	$.ajax( {
		url: "ajax.php",
		data: {vcode:$('[name="code"]').val(),account:$('[name="account"]').val(),email:$('[name="email"]').val()},
		type:"GET",
		dataType:'text',
		async: false,
		success: function(msg){
			_re =msg;
			if (msg!='ok') erro_msg +=msg;
		},
		 error:function(xhr, ajaxOptions, thrownError){ 
		 }
	});
	
	if ($('[name="password"]').val().length<8) erro_msg +='密碼長度必須大於8\n';
	if ($('[name="password"]').val()!=$('#password').val()) erro_msg +='兩次密碼必須相符';
	if (erro_msg=='')
		$('form').submit();
	else
		alert(erro_msg);
	
}
</script>
<?php }?>




<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['act']=='order') {?>
<div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">歷史訂單</h2>
          
     <!-- 訂單列表 -->
     <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['id']==null) {?>
     <div class="main-box">
     <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cart-format">
       <tbody><tr>
         <th width="200">訂單編號</th>
         <th>訂單日期</th>
         <th width="200">訂單狀態</th>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ors'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['name'] = 'ors';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['orderlist']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ors']['total']);
?>
       <tr>
         <td><a href="?act=order&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['orderlist'][$_smarty_tpl->getVariable('smarty')->value['section']['ors']['index']]['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['page'];?>
"><img src="images/icon_order.png" width="16" height="16"> <?php echo $_smarty_tpl->tpl_vars['data']->value['orderlist'][$_smarty_tpl->getVariable('smarty')->value['section']['ors']['index']]['order_no'];?>
</a></td>
         <td><?php echo $_smarty_tpl->tpl_vars['data']->value['orderlist'][$_smarty_tpl->getVariable('smarty')->value['section']['ors']['index']]['update_date'];?>
</td>
         <td><span class="status01"><?php echo $_smarty_tpl->tpl_vars['data']->value['orderlist'][$_smarty_tpl->getVariable('smarty')->value['section']['ors']['index']]['status_html'];?>
</span></td>
        </tr>
        <?php endfor; endif; ?>
     </tbody></table>
     <!-- 收件人資料 -->
       <div class="page">全部共 <?php echo $_smarty_tpl->tpl_vars['data']->value['row_count'];?>
 筆 (每頁 <?php echo $_smarty_tpl->tpl_vars['data']->value['mount'];?>
 筆)　　
       <?php echo $_smarty_tpl->tpl_vars['data']->value['page1'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['page3'];?>
　　前往第
         <form name="form" id="form" style="display:inline-block;">
           <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['page_option'];?>

           </select>
         </form>
         頁</div>
     </div>
     
     
     <?php } else { ?>
     <!-- 點擊列表編號後出現 訂單明細 -->
     
     <div class="main-box">
       <div class="order-numb"><img src="images/icon_order.png" width="16" height="16"> 訂單編號 : <?php echo $_smarty_tpl->tpl_vars['data']->value['order']['order_no'];?>
</div>
       <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cart-format">
         <tbody><tr>
           <th width="120">&nbsp;</th>
           <th>產品名稱 </th>
           <th width="70">數量</th>
           <th width="70">單價 </th>
           <th width="70">小計 </th>
         </tr>
         <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['name'] = 'cr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['carlist']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cr']['total']);
?>
         <tr>
           <td><?php if ($_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['pic'][0]!=''&&$_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['pic'][0]!=null) {?><img src="upload/products/<?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['pic'][0];?>
" class="pro-photo"><?php }?></td>
           <td><a href="index.php?class=product&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['name'];?>
</a></td>
           <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['count'];?>
</td>
           <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['price2'];?>
</td>
           <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['price2']*$_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cr']['index']]['count'];?>
</td>
         </tr>
         <?php endfor; endif; ?>
       </tbody></table>
       <!-- 小計 -->
       <div class="Subtotal"> <img src="images/car.png" width="32" height="20" style="vertical-align:middle;"> 運費  : <?php echo $_smarty_tpl->tpl_vars['data']->value['order']['post_fee'];?>
 <span class="price">合計 : $<?php echo $_smarty_tpl->tpl_vars['data']->value['order']['total']+$_smarty_tpl->tpl_vars['data']->value['order']['post_fee'];?>
 </span> </div>
       <div class="back"><a href="javascript:window.history.back(-1);"><img src="images/btn_back.png" width="78" height="29"></a></div>
     </div>
     <?php }?>
</div>

<?php }?>



</div>







<?php }?>

<script>
function checkform(){
	if ($('[name="password"]').length>0)
	if ($('[name="password"]').val()=='' || $('[name="password"]').val()==null){
		return alert('需填入原始密碼');
	}
	if ($('[name="new_password"]').val()!=$('#new_password').val()){
		return alert('兩次密碼需相符!!');
	}
	return $('form').submit();
}
</script>
<?php }} ?>
