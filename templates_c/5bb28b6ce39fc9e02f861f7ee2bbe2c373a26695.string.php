<?php /* Smarty version Smarty-3.1.18, created on 2014-08-13 10:32:18
         compiled from "5bb28b6ce39fc9e02f861f7ee2bbe2c373a26695" */ ?>
<?php /*%%SmartyHeaderCode:1674753eace32c5d5a0-82126226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bb28b6ce39fc9e02f861f7ee2bbe2c373a26695' => 
    array (
      0 => '5bb28b6ce39fc9e02f861f7ee2bbe2c373a26695',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1674753eace32c5d5a0-82126226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_set' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53eace32cd4341_32030218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eace32cd4341_32030218')) {function content_53eace32cd4341_32030218($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['web_set']->value['title'];?>
</title>
<?php echo $_smarty_tpl->tpl_vars['web_set']->value['keyword'];?>

<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>
<script type="text/javascript" src="includes/js/script.js"></script>

<link href="css.php?style=<?php echo $_smarty_tpl->tpl_vars['data']->value['style'];?>
" rel="stylesheet" type="text/css">
</head>

<body>

<div>

  <div class="header"><!-- 頭部 -->
      <div class="logo"><a href="index.html"><img src="images/logo.png" width="85" height="85" /></a></div>
      
      <div class="top-tool">
        歡迎 <span class="member-id">Terry</span> 登入 ~ 
        <a href="login.html">會員登入</a> |
        <a href="#">登出</a> |
        <a href="regist.html">加入會員</a> |
        <a href="shopping-car.html">購物車</a>
      </div>
  </div>
  
<div class="menu"><!-- 選單 -->
    
    <ul>
          <li><a href="index2.php">home</a>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="about.html">About</a>
             <ul class="sub"><!-- 第一層次級 -->
			   <li><a href="#">about - 01</a></li>
               <li><a href="#">about - 02</a></li>
               <li><a href="#">about - 03</a></li>
             </ul>
          </li>
          <li><a href="news.html">news</a></li>
          <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'"><a href="product.html">product</a>
          
          <ul class="sub"><!-- 第一層次級 -->
          
			   <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 01</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                          <li><a href="#">產品二級06</a></li>
                      </ul>
               </li>
               
               <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 02</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                      </ul>
               </li>
               
               <li class="parent" onmouseover="this.className='parentOn'" onmouseout="this.className='parent'">
                  <span class="on-hover">產品分類 03</span>
                      <ul class="sub"><!-- 第二層次級 -->
                          <li><a href="#">產品二級01</a></li>
                          <li><a href="#">產品二級02</a></li>
                          <li><a href="#">產品二級03</a></li>
                          <li><a href="#">產品二級04</a></li>
                          <li><a href="#">產品二級05</a></li>
                      </ul>
               </li>
            </ul><!-- 第一層次級 結束 -->
          </li>
          
          <li><a href="service.html">service</a></li>
          <li><a href="contact.html">contact</a></li>
    </ul>
  </div>

  <div class="edm"><!-- 首頁 大BANNER -->
     
  </div>
  
  <div class="main clearfix"><!-- 主要區塊 -->
   <!-- InstanceBeginEditable name="EditRegion3" -->
      <div>
           <ul>
               <li>最新消息</li>
               <li>最新消息</li>
               <li>最新消息</li>
           </ul>
      </div>
   
   <!-- InstanceEndEditable -->   
  </div>
  
  <div class="footer"><!-- 底部 -->
       Copyright © 2014 Web pwoer ALL RIGHTS RESERVED.
  </div>
  <div class="wp-copyright">
     <a href="www.vipase.net" target="_blank">網頁設計 BY 網動廣告科技</a>
  </div>

</div>
<script>
$(document).ready(function (){
	$('script').remove();
});
</script>
</body>
</html>
<?php }} ?>
