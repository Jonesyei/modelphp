<?php /* Smarty version Smarty-3.1.18, created on 2015-09-01 16:29:31
         compiled from "D:\AppServ\www\modelphp\serback\templates\preferential.html" */ ?>
<?php /*%%SmartyHeaderCode:7270559b933dca98e8-82893654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01dd69ad9604bd0af2a38cb42f2cb972073b793a' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\preferential.html',
      1 => 1441092101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7270559b933dca98e8-82893654',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b933e02a616_52532402',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b933e02a616_52532402')) {function content_559b933e02a616_52532402($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
         <a onClick="javescript:$('#csv').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>匯出</a>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=0"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?><!-- 模組新增修改刪除列 -->
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['del']!=1) {?><a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a><?php }?>
         </div>

  <!--div id="title"-->


<!--SEARCH-->
<form action="csv.php" id="csv" method="post">
<input type="hidden" name="title" value="資料編號,訂單編號,出貨狀態,付款狀態,訂單金額,運費,收件人,收件人email,收件地址,建立日期">
<input type="hidden" name="sql" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_sql'];?>
">
</form>
         <div class="search-tool" id="search"><!-- 搜尋模組 -->
<form action="" method="get" id="search_form" name="search_form">



關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>





	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>


經銷商帳號 <input type="text" name="company" />
  
  
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
		<!--<td width="5%">編號</td>-->
  		<th>訂單編號</th>
        <th>訂單狀態</th>
        <th>金流狀態</th>
        <th>付款方式</th>
        <th>訂單總額</th>
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><th>排序</th><?php }?>
		<th>出貨狀態</th>
        <th>付款狀態</th>
        <th>更新時間</th>
		<th>建立時間</th>
		

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
	  
      <!--<td> <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
 </td>-->
	  
	  <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['order_no'];?>
</a></td>
	  
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status_html'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['oid_html'];?>
</td>
      
      <td><?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['paycardmode']=='1'||$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['paycardmode']=='2') {?><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['paymode_statushtml'];?>
<?php } else { ?>--<?php }?></td>
      
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['paymode_html'];?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['ATMcode']!=null) {?> 回填:<font color="green"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['ATMcode'];?>
</font><?php }?></td>
      
      <td>$ <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['total']+$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['post_fee'];?>
</td>
      
<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?>  
	<td >
		  <input type="text" name="sort_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" id="sort_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" size="2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
" 
		  onblur="Sort_set('<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['table'];?>
','<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
','ajx_sort.php','lang,type','<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['lang'];?>
,<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['type'];?>
','<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['post'];?>
')" /> <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['up'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['down'];?>

		  </td>
<?php }?>
	
	  
	  <td ><?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['cargo_status']==0) {?><font color="#FF0000">未出貨<?php } else { ?><font color="#0000FF">已出貨<?php }?></font></td>
	  
      <td ><?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['pay_status']==0) {?><font color="#FF0000">未付款<?php } else { ?><font color="#0000FF">已付款<?php }?></font></td>
      
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  

    </tr>
    <?php endfor; endif; ?>
	
  </table>
  <br />
  <input name="act" type="hidden" value="all" />
</form>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><!--div id="content_inside"-->






<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->


</div><!--div id="content_bg"-->
</div>
</div>

<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">
	<h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
    <div class="page-tool">
    <a onclick="javascript:window.history.back(-1);"><img src="images/icon14.png" width="32" height="32" alt="返回"/>返回</a>

    <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['id']) {?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a  onClick="$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
     <?php } else { ?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a onClick="$('#form').submit();"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
    <?php }?>
     </div>
     
  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form" enctype="multipart/form-data">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
    
	<tr>
	<td width="110" align="right" >訂單編號：</td>
		  <td >
		  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['order_no'];?>

		   </td>
	</tr>

	<tr>
	<td width="110" align="right" >購買會員：</td>
		  <td >
		  <a href="member.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['member']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['member']['name'];?>
</a>
		   </td>
	</tr>


	<tr >
	 <td colspan="2">商品清單</td>
	</tr>
    
    <tr>
    <td colspan="2" style="padding:20px;">
    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['active_group']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
        	<font color="red"><?php echo $_smarty_tpl->tpl_vars['data']->value['active_group'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['active_name'];?>
</font><br>
        <?php endfor; endif; ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
        <tr><td>編號</td><td>商品名稱</td><!--<td>商品圖片</td>--><td>商品數量</td><td>尺寸顏色</td><!--<td width="30%">商品詳細資料</td>--><td>商品單項售價</td><td>小計</td></tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['name'] = 'cl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['carlist']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total']);
?>
        <tr>
	        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['id'];?>
</td>
             <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['name'];?>
</td>
             <!--<td align="center" width="20%"><?php if ($_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['pic']) {?><img src="../upload/products/<?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['pic'];?>
" height="80"/><?php } else { ?>無產品圖片!!<?php }?></td>-->
              <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['count'];?>
</td>
               <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['size'];?>
</td>
               <!--<td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['detail'];?>
</td>-->
               <td><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['price2'],0,".",",");?>
</td>
               <td><?php echo $_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['price2']*number_format($_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['count'],0,".",",");?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['carlist'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['status']=='2') {?><font color="red">(退貨)</font><?php }?></td>
        </tr>
        <?php endfor; endif; ?>
        </table>
    </td>
    </tr>
    
<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['step']!='2') {?>    
	 <tr >
      <td align="right" >退貨總金額：</td>
      <td >
	<font color="red">$ <?php echo number_format($_smarty_tpl->tpl_vars['data']->value['one']['back_total'],0,".",",");?>
</font>
	 </td>
    </tr>
    
  	 <tr >
      <td align="right" >已退貨金額：</td>
      <td >
	<input type="text" size"8" name="back_money" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['back_money'];?>
" onkeyup="this.value=this.value.replace(/\D/g,'');">
	 </td>
    </tr>
<?php }?>
	 <tr >
      <td align="right" >訂單金額：</td>
      <td >$ 
	<?php echo number_format($_smarty_tpl->tpl_vars['data']->value['one']['total'],0,".",",");?>

	 </td>
    </tr>

	 <tr >
      <td align="right" >訂單運費：</td>
      <td >$ 
	<?php echo number_format($_smarty_tpl->tpl_vars['data']->value['one']['post_fee'],0,".",",");?>

	 </td>
    </tr>
    <!--
	 <tr >
      <td align="right" >購物金折抵金額：</td>
      <td><font color="#FF0000">- $ <?php echo number_format($_smarty_tpl->tpl_vars['data']->value['one']['deshpoint'],0,".",",");?>
</font>
	 </td>
    </tr>
	-->
	<tr >
      <td align="right" >訂單實際金額：</td>
      <td >
	  <font color="#008000">$ <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['total']+$_smarty_tpl->tpl_vars['data']->value['one']['post_fee']-number_format($_smarty_tpl->tpl_vars['data']->value['one']['deshpoint'],0,".",",");?>
</font>
	 </td>
    </tr>
<!--
	<tr >
      <td align="right" >可獲得紅利：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['addpoint'];?>

	 </td>
    </tr>
-->

	 <tr >
      <td align="right" >訂單狀態：</td>
      <td >
		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['status_html'];?>

	 </td>
    </tr>

	 <tr >
      <td align="right" >付款狀態：</td>
      <td >
	 <select name="pay_status">
      <option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['pay_status']==0) {?>selected<?php }?>>未付款</option>
      <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['pay_status']==1) {?>selected<?php }?>>已付款</option>
    </select>
	 </td>
    </tr>
    
	 <tr >
      <td align="right" >出貨狀態：</td>
      <td >
	 <select name="cargo_status">
      <option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['cargo_status']==0) {?>selected<?php }?>>未出貨</option>
      <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['cargo_status']==1) {?>selected<?php }?>>已出貨</option>
    </select>
	 </td>
    </tr>
<!--
	 <tr >
      <td align="right" >配送時間：</td>
      <td >
      		<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['contact_time']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['contact_time'];?>
<?php } else { ?>不指定<?php }?>
	 </td>
    </tr>
-->
	 <tr >
      <td align="right" >付款方式：</td>
      <td >
      		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pay_html'];?>

	 </td>
    </tr>
    
	 <tr >
      <td align="right" >收件人：</td>
      <td >
      		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['recive_name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['sex_html'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['recive_address'];?>

	 </td>
    </tr>
    
    <tr >
      <td align="right" >收件者電話：</td>
      <td >
      		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['phone'];?>

	 </td>
    </tr>
    
   <tr >
      <td align="right" >收件者mail：</td>
      <td >
      		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['recive_email'];?>

	 </td>
    </tr>


   <tr >
      <td align="right" >備註：</td>
      <td >
      		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['memo'];?>

	 </td>
    </tr>

	<tr >
      <td align="right" >建立時間：</td>
      <td >
	  於 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['create_name'];?>
 建立
	 </td>
    </tr>



	
	

	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
"  />
	

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

<?php }?>




<?php }} ?>
