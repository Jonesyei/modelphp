<?php /* Smarty version Smarty-3.1.18, created on 2015-07-08 07:40:33
         compiled from "D:\AppServ\www\modelphp\serback\templates\system_temp.html" */ ?>
<?php /*%%SmartyHeaderCode:9820559c6371a8b944-08770844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0fdb8c86b5d0cb0d1bdc65024fd29a4fd36c4d9' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\system_temp.html',
      1 => 1425624800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9820559c6371a8b944-08770844',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559c6371bf90e9_87896855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559c6371bf90e9_87896855')) {function content_559c6371bf90e9_87896855($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
<script>
$(document).ready(function(){
	$('[name="keyword"]').val( decodeURIComponent(Get("keyword")) );
	$('[name="daterange"]').val( Get("daterange") );

	$('#SearchBtn').click(function(){
		if( $('[name="daterange"]').val().split("-")[1]!=null)
		{
			var daterange = $.trim( $('[name="daterange"]').val().split("-")[0] ) + "-" + $.trim( $('[name="daterange"]').val().split("-")[1] );
			
			$('[name="daterange"]').val( daterange );
		}
		
		$('#search_form').submit();
	});

});
</script>

<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">

         <h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
         <div class="page-tool">
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?><!-- 模組新增修改刪除列 -->
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
        <a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a>
        <a href="javascript:check_delall();"><img src="images/icon13.png" width="32" height="32" alt="">重記</a>
         </div>
    <script>
	function check_delall(){
		if (confirm("這樣會清除所有 後台異動記錄 \r\n 您確定要清除嘛?"))
		window.location.href='?deleteall=1';
	}
	</script>
  <!--div id="title"-->


<!--SEARCH-->
<div class="search-tool" id="search"><!-- 搜尋模組 -->
<form action="" method="get" id="search_form" name="search_form">



關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>


<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>





  
  
  <img src="images/icon-search.png" width="18" height="18" id="SearchBtn" onclick="search_form.submit();"/>

 </form>
</div>
<!--SEARCH-->


<div id="content_inside">

<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<th align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></th>
		
  		
  		<th width="10%">編號</th>
		

		<th>後台帳戶</th>
		
        <th>異動模式</th>
		
		<th>異動目錄</th>
		
        <th>操作路徑</th>
        
		<th>時間</th>
  	</tr>
	
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
   <tr >
      <td align="right" ><input type="checkbox" id="choose_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" name="choose_id" /></td>
	  
	  
	 
	  <td ><a href="system_temp.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
</a></td>
	  
	  

	  <td><a href="system_temp.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['account'];?>
</a></td>

	  
	   <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['act_html'];?>
</td>
	  
	  <td ><a href="system_temp.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['FILE_URL'][0];?>
</a></td>
      
      <td ><a href="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['FILE_URL'][1];?>
';"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['FILE_URL'][1];?>
</a></td>
      
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>

    </tr>
    <?php endfor; endif; ?>
	
  </table>
  <br />
  <input name="act" type="hidden" value="all" />
</form>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><!--div id="content_inside"-->




</div><!--div id="content_bg"-->
</div>
</div>

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->



<?php }?>






<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">
	<h2 class="funtion-title">後台帳號明細<!-- 頁面標題 -->         </h2>
    <div class="page-tool">
    <a onclick="javascript:window.history.back(-1);"><img src="images/icon14.png" width="32" height="32" alt="返回"/>返回</a>

     <a  onClick="$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a>
     </div>
     
  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">

<style>
.table_shopping_car td{background-color:#FFFFFF;}
</style>


<form action="" method="post" id="form" name="form" enctype="multipart/form-data">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
    
	<tr>
		<td align="left" colspan="2">編號：&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>

	</tr>
    
    <tr >
      <td align="right" width="100">異動目錄：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['FILE_URL'][0];?>

	 </td>
    </tr>
    
	<tr >
      <td align="right" width="100">檔案路徑：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['FILE_URL'][1];?>

	 </td>
    </tr>


	<tr >
      <td align="right" width="100">操作模式：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['act_html'];?>

	 </td>
    </tr>  
    
    <tr>
      <td colspan="2">異動資料：</td>
    </tr>
    
    
  <tr>
      <td colspan="2">
    <table width="100%">
     <tr >
      <td align="center" width="100">欄位名稱</td>
      <td align="center">資料內容</td>
     </tr>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['da'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['da']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['name'] = 'da';
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['one']['POST_DATA']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total']);
?>
	 <tr >
      <td align="right" width="100"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['POST_DATA'][$_smarty_tpl->getVariable('smarty')->value['section']['da']['index']][0];?>
：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['POST_DATA'][$_smarty_tpl->getVariable('smarty')->value['section']['da']['index']][1];?>

	 </td>
    </tr>
	<?php endfor; endif; ?>
    </table>
      </td>
  </tr>



<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['act']=='UPDATE') {?>
    <tr>
      <td colspan="2">原始資料：</td>
    </tr>
    
    
  <tr>
      <td colspan="2">
    <table width="100%">
     <tr >
      <td align="center" width="100">欄位名稱</td>
      <td align="center">資料內容</td>
     </tr>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['da'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['da']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['name'] = 'da';
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['one']['BACK_DATA']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['da']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['da']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['da']['total']);
?>
	 <tr >
      <td align="right" width="100"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['BACK_DATA'][$_smarty_tpl->getVariable('smarty')->value['section']['da']['index']][0];?>
：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['BACK_DATA'][$_smarty_tpl->getVariable('smarty')->value['section']['da']['index']][1];?>

	 </td>
    </tr>
	<?php endfor; endif; ?>
    </table>
      </td>
  </tr>
<?php }?>

	
	<tr >
      <td align="right" >異動時間：</td>
      <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['account'];?>
&nbsp;於&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['create_date'];?>
 異動
	  </td>
    </tr>
	
	

	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['shopping_car']['id'];?>
" />
	

  </table>

 
  <br />
</form>

</div>


</div><!--div id="content_inside"-->


</div><!--div id="content_bg"-->
</div>
</div>


<script>
page_initial('table_content');//tr交互顯示顏色
//$('#tabs').tabs();

</script>

<?php }?><?php }} ?>
