<?php /* Smarty version Smarty-3.1.18, created on 2016-01-07 11:46:32
         compiled from "D:\AppServ\www\modelphp\serback\templates\catemode.html" */ ?>
<?php /*%%SmartyHeaderCode:30496561f5770cde374-10677977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e583e6532877d5c9605992c68d6967a75862be4' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\catemode.html',
      1 => 1452138389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30496561f5770cde374-10677977',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_561f5770e2c682_27438447',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561f5770e2c682_27438447')) {function content_561f5770e2c682_27438447($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
	  <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a href="#" onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a href="?id=0"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a href="#" onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['del']!=1) {?><a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a><?php }?>
  </div>
  <!--div id="title"-->


<!--SEARCH-->
         <div class="search-tool" id="search"><!-- 搜尋模組 -->
<form action="" method="get" id="search_form" name="search_form">



關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>
  
  
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
  		<th>大分類名稱</th>
        <th>狀態</th>
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
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
</a></td>
	  
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status_html'];?>
</td>
      
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

         <h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
         <div class="page-tool">
        <a onclick="javascript:window.history.back(-1);"><img src="images/icon14.png" width="32" height="32" alt="返回"/>返回</a>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['id']!=null) {?>
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
	<td width="110" align="right" >分類名稱：</td>
		  <td >
		  <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
">
		   </td>
	</tr>

	<tr>
	<td width="110" align="right" >最大層數設定：</td>
		  <td >
		  <input type="text" name="max_count" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['max_count']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['max_count'];?>
<?php } else { ?>1<?php }?>" size="2" onkeyup="this.value=this.value.replace(/\D/g,'');">
		   </td>
	</tr>

	 <tr >
      <td align="right" >訂單狀態：</td>
      <td >
		<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['status_html'];?>

	 </td>
    </tr>

	<tr >
      <td align="right" >建立時間：</td>
      <td >
	  於 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['create_date'];?>
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
