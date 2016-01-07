<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:18:34
         compiled from "D:\AppServ\www\modelphp\serback\templates\products2.html" */ ?>
<?php /*%%SmartyHeaderCode:6778559b5c0eb4d232-35376623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c8fd871491f6adf14b296160d9ea719dc9d2b39' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\products2.html',
      1 => 1450167637,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6778559b5c0eb4d232-35376623',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5c0ee82b33_03182283',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'data_table' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5c0ee82b33_03182283')) {function content_559b5c0ee82b33_03182283($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
    
    <a  onClick="javescript:$('#csv_div2').dialog('open');"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>匯入</a>
    <a  onClick="javescript:$('#csv_div').dialog('open');"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>匯出</a>
    
        <?php if ($_smarty_tpl->tpl_vars['close']->value['insert']!=1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=0"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?><!-- 模組新增修改刪除列 -->
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
         <a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a>
         </div>
         

<div id="csv_div" title="匯出資料進階設定">
<form action="csv.php" method="post" id="csv" style="display:none;">
	<input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_title'];?>
">
    <input type="text" name="sql" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_sql'];?>
">
</form>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['output'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['output']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['name'] = 'output';
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['output_title']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['output']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['output']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['output']['total']);
?>
    <div style="background-color:#EEE;">
    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['output_row'][$_smarty_tpl->getVariable('smarty')->value['section']['output']['index']];?>
" class="outrow" checked="checked" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['output_title'][$_smarty_tpl->getVariable('smarty')->value['section']['output']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['output_title'][$_smarty_tpl->getVariable('smarty')->value['section']['output']['index']];?>

    </div>
    <?php endfor; endif; ?>
    <font color="red">(項目可拖曳變換匯出順序)</font>
</div>
<script>
	//---匯出
    $( "#csv_div" ).dialog( {
	  height:300,
      modal: true,
      buttons: {
        '取消': function() {$( this ).dialog( "close" );}
		,'匯出': function() {
			output_title = ''; output_sql = '';
			$('.outrow').each(function (idx,obj){
				if ($(obj).attr('checked')!=''&&$(obj).attr('checked')!=null){
					if (output_title!='') output_title +=',';
					if (output_sql!='') output_sql +=',';
					output_title += $(obj).attr('alt');
					output_sql += $(obj).val();
				}
			})
			$('#csv [name="title"]').val(output_title);
			$('#csv [name="sql"]').val('select ' + output_sql + ' from <?php echo $_smarty_tpl->tpl_vars['data']->value['cpos']['table'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cpos']['tablejoin'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cpos']['tablelistwhere'];?>
 <?php echo str_replace("'","\\'",$_smarty_tpl->tpl_vars['data']->value['cpos']['search_output']);?>
');
			$('#csv').submit();
			$( this ).dialog( "close" );
		}
      }
    });
	$( "#csv_div" ).dialog("close");
	$('#csv_div').parent().css('position','absolute');
	
    $('#csv_div').sortable( {items: 'div'} );
    $('#csv_div').disableSelection();
</script>
<div id="csv_div2" title="匯入資料進階設定">
<form action="csv.php" method="post" id="csv2" style="" enctype="multipart/form-data">
	<input type="hidden" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_sql'];?>
">
    <input type="hidden" name="defrow" value="lang:<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['lang'];?>
,type:products">
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="data_table" value="<?php echo $_smarty_tpl->tpl_vars['data_table']->value;?>
">
    <font color="blue">步驟一:</font>選擇檔案 <input type="file" name="file">
</form>
<br>
	<font color="blue">步驟二:</font>請對應你的檔案內容排序位置<font color="red">(可拖曳)</font>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['input'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['input']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['name'] = 'input';
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['input_title']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['input']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['input']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['input']['total']);
?>
    <div style="background-color:#EEE;">
    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['input_row'][$_smarty_tpl->getVariable('smarty')->value['section']['input']['index']];?>
" class="outrow2" checked="checked" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['input_title'][$_smarty_tpl->getVariable('smarty')->value['section']['input']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['input_title'][$_smarty_tpl->getVariable('smarty')->value['section']['input']['index']];?>

    </div>
    <?php endfor; endif; ?>
</div>
<script>
	//----匯入
    $( "#csv_div2" ).dialog( {
	  height:300,
      modal: true,
      buttons: {
        '取消': function() {$( this ).dialog( "close" );}
		,'匯入': function() {
			output_title = ''; output_sql = '';
			$('.outrow2').each(function (idx,obj){
				if ($(obj).attr('checked')!=''&&$(obj).attr('checked')!=null){
					if (output_title!='') output_title +=',';
					output_title += $(obj).val();
				}
			})
			$('#csv2 [name="title"]').val(output_title);
			$('#csv2').submit();
			$( this ).dialog( "close" );
		}
      }
    });
	$( "#csv_div2" ).dialog("close");
	$('#csv_div2').parent().css('position','absolute');
	
    $('#csv_div2').sortable( {items: 'div'} );
    $('#csv_div2').disableSelection();
</script>




<!--SEARCH-->


<div class="search-tool" id="search"><!-- 搜尋模組 -->
<form action="" method="get" id="search_form" name="search_form">



關鍵字查詢<input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['keyword'];?>
" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>



	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>


    <select name="s_status" >
        <?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>

    </select>

  
  
   <img src="images/icon-search.png" width="18" height="18" id="SearchBtn">

 </form>
</div>
<!--SEARCH-->





<div id="content_inside" style="clear:both;">
<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-style01">
  	<tr>
  		<th align="center" width="60">刪除 <input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></th>

  		<th width="10%">名稱</th>
		<th width="10%">商品分類</th>
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><th>排序</th><?php }?>
		<th>狀態</td>
		<th width="20%">建立時間</th>
		<th width="20%">維護時間</th>
		

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
   <tr class="tr_sort" title="可拖曳進行排序">
      <td align="center" ><input type="checkbox" id="choose_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" name="choose_id" /></td>
	  
	   <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name']);?>
</a></td>

	   <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['class_html'];?>
</td>
       
<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?>  
	<td align="center">
		  <input type="text" name="sort_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" id="sort_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" size="2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
" 
		  onmouseup="sort_act=2" onmousedown="sort_act=2"/> <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['up'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['down'];?>

		  </td>
<?php }?>
	
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status_html'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
</td>
	  
	  

  </tr>
    <?php endfor; endif; ?>
	
  </table>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <input name="act" type="hidden" value="all" />
  </form>
</div>





<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->
</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<script src="../includes/js/load-image.all.min.js"></script><!--onchange load-->
<script src='../includes/js/color/spectrum.js'></script>
<link rel='stylesheet' href='../includes/js/color/spectrum.css' />


<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">

         <h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
         <div class="page-tool">
        <a onclick="javascript:window.history.back(-1);"><img src="images/icon14.png" width="32" height="32" alt="返回"/>返回</a>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['id']!=null) {?>
          <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a  onClick="submitpose();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['close']->value['copy']!=1) {?><a  onClick="Copy_data();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>複製</a><?php }?>
         <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a onClick="submitpose();"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
        <?php }?>
         </div>

  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form" enctype="multipart/form-data">
<div id="tabs">
<ul>
	<li><a href="#tabs-1">基本資料</a></li>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][2]=='1') {?><li><a href="#tabs-2">尺寸顏色</a></li><?php }?>
    <li><a href="#tabs-3">售價設定</a></li>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][5]=='1') {?><li><a href="#tabs-4">加購設定</a></li><?php }?>
</ul>

<div id="tabs-1">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">

	<tr>
	<td width="120" align="right" >商品名稱：</td>
	  <td >
	  <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
" size="40" />
	  </td>
	</tr>
	<tr>
	<td width="120" align="right" >商品貨號(別名)：</td>
	  <td >
	  <input type="text" name="alies" id="alies" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['alies'];?>
" size="40" />
	  </td>
	</tr>
	<tr>
	<td align="right" >產品分類：</td>
	  <td id="class_list" >
      <input type="button" value=" 增加一個分類別 " onclick="add_class();"><br><br>
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['one']['cate_menu']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['cate_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']];?>

      <?php endfor; endif; ?>
      <script>
	  function del_class(id){
		if (confirm('確定刪除此分類?')){
			$('div#class_'+id).remove();
		}
	  }
	  function add_class(){
		  var s_time = new Date().getTime();
		$('#class_list').append('<div id="class_'+s_time+'">'+$('#hide_class').html()+' <input type="button" value=" 刪除 " onclick="del_class('+s_time+')"></div>');
	  }
	  </script>
	   </td>
	</tr>
<!--
    <tr>
	<td align="right" >品牌分類：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['probrand_menu'];?>

	   </td>
	</tr>
    -->

	<tr>
	<td align="right" >是否為新品：</td>
	  <td >
      <input type="radio" name="isnew" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['isnew']==1) {?>checked<?php }?>>是
      <input type="radio" name="isnew" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['isnew']==0) {?>checked<?php }?>>否
	   </td>
	</tr>


<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][3]=='1') {?>
<tr>
	<td align="right" >圖片：</td>
	  <td >

	 
	 
<link href="../includes/Uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/Uploadify/swfobject.js"></script>
<script type="text/javascript" src="../includes/Uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
var Pic;
var max_count = '<?php echo $_smarty_tpl->tpl_vars['data']->value['uploadfilemax'];?>
';
$(document).ready(
	function()
	{
		Pic = '<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'];?>
';
		$(Pic.split("|__|")).each(function(idx,data){
			if(data=="") return true;
			UPLAppend('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['file_url'];?>
'+data);
		});
	
		 $("#uploadify").uploadify
		 (
			 {
				'uploader'		: '../includes/Uploadify/uploadify.swf', 
				'script'		: '../includes/Uploadify/uploadify.php', 
				'cancelImg'		: '../includes/Uploadify/cancel.png', 
				'folder'		: '<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
', 
				'queueID'		: 'fileQueue_list',
				'queueSizeLimit': <?php if ($_smarty_tpl->tpl_vars['data']->value['uploadfilemax']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['uploadfilemax'];?>
<?php } else { ?>0<?php }?>,
				'auto'			: false,
				'multi'			: true,
				'onSelectOnce'	:function(event,data)
				{
					//--全部選擇完之後
					if (data.fileCount+$('#piclist div img').length>max_count*1 && max_count*1!=0){
						alert("圖片選擇超出 "+max_count+" 數量");
						setTimeout("$('#uploadify').uploadifyClearQueue()",1);
						this.uploadifyCancel(ID);
					}else if (max_count=='1'){
						setTimeout("$('#uploadify').uploadifyUpload()",1);
					}
				},
				'onAllComplete'	:function(event,data) 
				{
					//$('form').submit();
				},
				'onComplete'  : function(event, ID, fileObj, response, data)
				{	
					upload_one(response);
				},
				'onSelect'    : function(event,ID,fileObj)
				{
					var type = fileObj.type.toLowerCase();
					if(type!=".jpg" && type!=".jpeg" && type!=".gif" && type!=".png")
					{					
						alert("圖片格式不符\n只允許jpg,jpeg,gif,png");
						setTimeout("$('#uploadify').uploadifyCancel('"+ID+"')",1);
						this.uploadifyCancel(ID);

					}
				}
			}
			
		)// $("#uploadify").uploadify
		
	}//function()
);
function valcheck(obj){
	if ($(obj).val().indexOf('在此輸入')>-1) $(obj).val('');
}
function upload_one(response){
					var filename = response.split('/');
					if (filename.length<=1) return alert(response);
					
					filename = filename[filename.length-1];div_file = filename.split('.')[0];
					$('#piclist').append('<div class="ui-state-default" id="picspan_'+div_file+'"></div>');//--增加一個選項
					var max_idxtopic = $('#piclist>div.ui-state-default').length;
					$('#picspan_'+div_file).append('<div style="float:right;"><font color="red">(未存檔)</font> 排序到<input type="text" id="pic_sort_'+(max_idxtopic-1)+'" value="'+max_idxtopic+'" size="2" style="text-align:center;"> <input type="button" value="移動" onclick="pic_sort('+(max_idxtopic-1)+',$(\'#pic_sort_'+(max_idxtopic-1)+'\').val());"> <input type="button" value=" 刪除 " onclick="if (confirm(\'確定要移除這張圖片嘛?\')) picdel('+(max_idxtopic-1)+');"></div>');
					$('#picspan_'+div_file).append('<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
'+filename+'" height="150px"><br>');
				 	$('#picspan_'+div_file).append('<input type="hidden" name="pic[]" value="'+filename+'">');
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['other']!=null) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['other'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['other']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['name'] = 'other';
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['button']['other']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total']);
?>
						$('#picspan_'+div_file).append('<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['other']['index']]['other_name'];?>
:<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['other']['index']]['other_obj'];?>
[]" placeholder="在此輸入<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['other']['index']]['other_name'];?>
)" onclick="valcheck(this)"><br>');
						<?php endfor; endif; ?>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?>$('#picspan_'+div_file).append('<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['name'];?>
:<input type="text" name="name[]" placeholder="在此輸入<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['name'];?>
" onclick="valcheck(this)">');<?php }?>
				 	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>$('#picspan_'+div_file).append('連結:<input type="text" name="href[]" placeholder="在此輸入連結"  onclick="valcheck(this)">');<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['change_detail']!=null) {?>$('#picspan_'+div_file).append('<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['change_detail'];?>
:<input type="text" name="detail[]" placeholder="在此輸入<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['change_detail'];?>
"  onclick="valcheck(this)">');<?php }?>
					$('#picspan_'+div_file).append('<input type="button" onclick="picdel('+div_file+')" value="刪除'+filename+'圖片"><br><br>');
					$('[name="pic"]').remove();
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?>$('[name="name"]').remove();<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>$('[name="href"]').remove();<?php }?>
					
					//--定義最後一個賦予排序					
					$('#piclist div[class="ui-state-default"][id]:last').on("mouseup",function(event){
						if (event.srcElement.className!='')	window.setTimeout("re_sort()",50);
					})
					
}
</script>
<script>

  $(function() {
    $( "#piclist" ).sortable( {items: 'div[id]'} );
    //$( "#piclist" ).disableSelection(); 讓可拖曳物件的無法編輯以及選取
  });


function picdel(d){
	$('#picspan_'+d).remove();
	re_sort();
	if ($('#piclist').find("div").html()==null) {
 	$('#fileQueue_list').append('<input type="hidden" name="pic" value="">');
	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?>$('#fileQueue_list').append('<input type="hidden" name="name" value="">');<?php }?>
 	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>$('#fileQueue_list').append('<input type="hidden" name="href" value="">');<?php }?>
	}
}
//-指定排序 於多少後面
function pic_sort(obj_id,moveto){
	if (moveto*1==1){
		if ($('#piclist div[id] div input[type="text"][id]:eq(0)')[0]==$('#picspan_'+obj_id).find('div input[type="text"][id]')[0])
		return alert('目前已位於最上方');
	}
	if ($('#picspan_'+obj_id)[0]==$('#piclist div[id]:eq('+(moveto-1)+')')[0]) return alert('無法移動跟目前一樣的位置');
	$('#picspan_'+obj_id).insertBefore($('#piclist div[id]:eq('+(moveto-1)+')'));
	re_sort();
}
function re_sort(){
	$('#piclist div[id]').each(function (idx,obj){
		$(obj).find('div input[type="text"][id]').val(idx+1);
	})
}
</script>

<div id="piclist">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['name'] = 'picidx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['one']['pic']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['picidx']['total']);
?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']]!=null||$_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']]!='') {?>
<div class="ui-state-default" id="picspan_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
">
<div style="float:right;">
排序到<input type="text" id="pic_sort_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']+1;?>
" size="2" style="text-align:center;">
<input type="button" value="移動" onclick="pic_sort('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
',$('#pic_sort_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
').val());">
<input type="button" value=" 刪除 " onclick="if (confirm('確定要移除這張圖片嘛?')) picdel(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
);">
</div>
<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" height="150px">
<input type="hidden" name="pic[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
"><br>

<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['other']!=null) {?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['lo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['name'] = 'lo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['button']['other']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['lo']['total']);
?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['lo']['index']]['other_name'];?>
:<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['lo']['index']]['other_obj'];?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['other'][$_smarty_tpl->getVariable('smarty')->value['section']['lo']['index']]['other_data'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" style="width:300px;"><br>
<?php endfor; endif; ?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['button']['name'];?>
:<input type="text" name="name[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" style="width:300px;"><br><?php }?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['change_detail']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['button']['change_detail'];?>
:<input type="text" name="detail[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" style="width:300px;"><br><?php }?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>連結:<input type="text" name="href[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['href'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" style="width:300px;"><br><?php }?>
<input type="button" onclick="picdel(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index'];?>
)" value="刪除<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
圖片"><br><br>
</div>
<?php }?>
<?php endfor; endif; ?>
</div>

<font color="red">(上列圖片可拖曳排序位置)</font>


    <div id="dropDIV" class="dropDIV" dragenter="dropHandler(event)" draggable="dropHandler(event)" ondragover="$(this).css('border','dashed 2px red');dragoverHandler(event);" ondrop="dropHandler(event)" onMouseOut="$(this).css('border','dashed 2px gray');" style="text-align: center;margin: auto; border: dashed 2px gray;" onclick="if ($(event.target)[0]==$(this)[0]) aes('ff');">
    拖曳圖片到此處上傳 <BR>( IE瀏覽器不支援 請使用上傳套件上傳 )
    <div id="up_progress" ></div> 
    
    <div style="text-align:left;">
    <div id="fileQueue_list"></div>
    <?php echo $_smarty_tpl->tpl_vars['data']->value['edmpic'];?>
 <BR>
<input type="file" name="uploadify" id="uploadify"/>
	<BR />
	<?php if ($_smarty_tpl->tpl_vars['data']->value['uploadfilemax']>1) {?><a href="javascript:ajxupload();$('#uploadify').uploadifyUpload();" onclick="">批次上傳圖片</a>&nbsp;|&nbsp;<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['uploadfilemax']>1) {?><a href="javascript:$('#uploadify').uploadifyClearQueue()">取消</a>&nbsp;|&nbsp;<?php }?>建議比例:<?php echo $_smarty_tpl->tpl_vars['data']->value['pic_size_title'];?>
<BR />
    </div>
    
    </div>
    <script>var file_upload = '?upload=<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
';var drag_count = <?php echo $_smarty_tpl->tpl_vars['data']->value['uploadfilemax'];?>
;</script>
    <script src="../includes/project/js/drag_file.js"></script>
    <script src="../includes/project/js/ajaxfileupload.js"></script><!--動態上傳-->
    <script>
	function ajxupload(){
		if ($('#ff')[0].files.length>0)
		 $.ajaxFileUpload
            (
                {
                    url: '../includes/project/js/Jones_upload.php'+file_upload,
                    secureuri: false, //加密
                    fileElementId: 'ff', //objid
                    dataType: 'json', 
                    success: function (data, status)  
                    {
						$('#ff').val(null);
                        for (ee in data)
							upload_one(data[ee]);
                    }
                }
            );
	}
	function aes (dname){
		$('[name="'+dname+'[]"]').click();
	}
	</script>
    <input type="file" id="ff" name="ff[]" style="display:none;" multiple />
	</td>
	</tr>
    
<?php }?>

	<tr>
	<td align="right" >列表文字：</td>
	  <td >
      <textarea name="memo_1" rows="2" cols="50">
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['memo_1'];?>

      </textarea>
	   </td>
	</tr>

	<tr>
	<td align="right" >商品內容：</td>
	  <td >
      <textarea name="memo" rows="10" cols="50">
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['memo'];?>

      </textarea>
	   </td>
	</tr>


	<tr>
	<td align="right" >商品內容：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail_fck'];?>

	   </td>
	</tr>

</table>
</div>



<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][1]=='1') {?>
<div id="tabs-2">
<style>
#size_td div.zlist{
	 border:1px solid #AAA;
	 margin-top:2px;
}
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
 <tr>
	<td align="right" width="120">尺寸分類：</td>
	  <td id="size_td">尺寸模組
      <select id="pro_size" style="width:200px" onblur="change_size_menu();">
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pro_size'];?>

      </select><input type="button" value="匯入尺寸模組" style="width:100px;" onclick="change_size_menu('nosing');">
      新增尺寸分類 <input type="text" id="size_add_box">
      <input type="button" value=" 新增 " onclick="addtolist();"/>
      <br><br>
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['size'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['size']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['name'] = 'size';
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['one']['size']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['size']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['size']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['size']['total']);
?>
  		<div class="zlist">規格: <input type="text" name="size[]" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['size'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]==null) {?>基本<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['size'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
<?php }?>"> 
        顏色:<input type="text" class="color_list" name="color[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['color'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
">
        圖片:<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['stock_pic'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
" style="width:50px;"><input type="file" style="width:80px;"><input type="hidden" name="stock_pic[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['stock_pic'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
">
        現貨:<input type="text" name="stock[]" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
<?php } else { ?>0<?php }?>" onkeyup="this.value=this.value.replace(/\D/g,\'\');">
        貨號:<input type="text" name="stock_no[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['stock_no'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
" />
        顯示:<input type="radio" name="stock_status[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['stock_status'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]!=='0') {?>checked<?php }?>>開啟
        <input type="radio" name="stock_status[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['size']['index'];?>
]" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['stock_status'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]==='0') {?>checked<?php }?>>關閉
        <input type="button" value=" 刪除 " onclick="$(this).parent().remove();" /></div>
      <?php endfor; endif; ?>
	   </td>
	</tr>
    <script>
	$(document).ready(function (){
		create_color_select('.color_list');
		$('#size_td').sortable( {items: 'div.zlist'} );
	})
	function addtolist(){
		var temp_time = new Date().getTime();
		$('#size_td').append('<div class="zlist">規格: <input type="text" name="size[]" value="'+$('#size_add_box').val()+'"> 顏色:<input type="text" id="c'+temp_time+'" name="color[]" value="">  圖片:<img src="" style="width:50px;"><input type="file" style="width:80px;"><input type="hidden" name="stock_pic[]">現貨:<input type="text" name="stock[]" value="1" onkeyup="this.value=this.value.replace(/\D/g,\'\');"> 貨號:<input type="text" name="stock_no[]" value=""> <input type="button" value=" 刪除 " onclick="$(this).parent().remove();"><font color="red">(未存檔)</font></div>');
		$('.zlist:last input[type="file"]')[0].onchange = fileuploadstockpic;
		create_color_select('#c'+temp_time);
	}
	function dellist(){
		if (confirm('確認您要刪除 '+$('#size option:selected').html()+' 尺寸資訊?')){
			$('#size option:selected()').remove();
		}
	}
	function change_size_menu(d){
		if (d=='nosing'){
		}else{
			if (!confirm('你要將目前商品尺寸資訊改換為 [ '+$('#pro_size option:selected').html()+' ] 尺寸模組嗎?')) return;
		}
			//$('#size_td div').remove();//原先全部清空
			am = $('#pro_size option:selected').val().split('|__|');
			for(aa in am) {
				var temp_time = new Date().getTime();
			$('#size_td').append('<div class="zlist">規格: <input type="text" name="size[]" value="'+am[aa]+'"> 顏色:<input type="text" id="c'+temp_time+'" name="color[]" value=""> 現貨:<input type="text" name="stock[]" value="1" onkeyup="this.value=this.value.replace(/\D/g,\'\');">  貨號:<input type="text" name="stock_no[]" value=""> <input type="button" value=" 刪除 " onclick="$(this).parent().remove();"></div>');
				create_color_select('#c'+temp_time);
			}
	}
	function create_color_select(obj){
	   	$(obj).spectrum( {
			preferredFormat: "hex",
		    showInput: true,
			allowEmpty:true,
			showInitial: true,
			chooseText: "確定",
			cancelText: "取消"
		});
   }
   
   //-檔案儲存
	$(document).ready(function (){
		$('.zlist input[type="file"]').each(function (idx,obj){
			$(obj)[0].onchange = fileuploadstockpic;
		})
	});
	fileuploadstockpic = function (e){
				_stock_obj = e.target;
				loadImage(
					e.target.files[0],
					function (img) {
						$('body').append(img.toDataURL());
						$.ajax( {
							url: "ajx.php",
							data: {data_img:img.toDataURL(),file_url:'<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
'},
							type:"post",
							dataType:'text',
							async: false,
							success: function(msg){
								$(_stock_obj).parent().find('[name="stock_pic[]"]').val(msg);
								$(_stock_obj).parent().find('img:eq(0)')[0].src = '<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
'+msg;
							}
						});
					},
					{
						canvas: true
					} // Options
				);
				this.value = null;
			}
	</script>
    
</table>
</div>
<?php }?>





<div id="tabs-3">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
 	<tr >
      <td  align="right" width="120">商品售價：</td>
      <td > 
	  <input type="text" name="price1" id="price1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['price1'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][2]=='1') {?>
    <tr >
      <td  align="right" >商品折扣：</td>
      <td > 
	  - <input type="text" name="price_desh" id="price_desh" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['price_desh']==null) {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['price_desh'];?>
<?php }?>" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');" maxlength="2"> % (此值為 <font color="red">負</font> 值，如設定 20% 即 8 折的意思)
	  </td>
    </tr>
    
	<tr >
      <td  align="right" >商品折扣後價格：</td>
      <td > 
	  <input type="text" id="price2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['price2'];?>
" disabled="disabled" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][0]=='1') {?>
	<tr >
      <td  align="right" >所獲得紅利：</td>
      <td > 
	  <input type="text" name="point" id="point" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['point'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
    <?php }?>
<!--
	<tr >
      <td  align="right" >可折抵購物金：</td>
      <td > 
	  <input type="text" name="depoint" id="depoint" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['depoint'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
-->
</table>
</div>







<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']==null||$_smarty_tpl->tpl_vars['data']->value['check_button'][5]=='1') {?>
<div id="tabs-4">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
 	<tr>
	<td align="right" width="120">加價購：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['prolist'];?>

      <select id="adtolist" onchange="cpic();">
      <option>請選擇加價購商品</option>
      </select>
      <img id="pez" src="">
      <input type="button" value="增加到加價購" onclick="todiv()">
      <div id="addlist">
      </div>
	   </td>
	</tr>	
	<script>
	//--先寫入頁面
	var objid=0;//---頁面加價購筆數暫存
	var reponse = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['add_all'];?>
');
	 	for(ee in reponse)
			todiv(ee);
	$('#prolist').on("change",function (){
            $.ajax( {
                url: "ajx.php",
                data: {pidlist:$('#prolist').val()},
                type:"GET",
                dataType:'JSON',
                success: function(_return){
					$('#adtolist').html('<option>請選擇加價購商品</option>');
					for (apro in _return){
					 $('#adtolist').append('<option value="'+apro+'">'+_return[apro]["name"]+'</option>')
					}
					reponse = _return;
                },
                 error:function(xhr, ajaxOptions, thrownError){ 
                    //alert(xhr.status); 
                    //alert(thrownError); 
                 }
            });
	});
	function cpic(){ //-----選擇加價購商品動作 (顯示商品圖片)
		var avl = $('#adtolist').val();
		$('#pez').attr("width","80");
		$('#pez').attr("src","../upload/products/"+reponse[avl]["pic"]);
	}
	function todiv(d){ //----按鈕加入加價購商品動作
		if (d!=null)
		var avl = d;
		else
		var avl = $('#adtolist').val();
		objid ++;
		$('#addlist').append('<div id="adclass_'+objid+'"><div>');
		$('#adclass_'+objid).append('<img id="img_'+objid+'" src="../upload/products/'+reponse[avl]["pic"]+'" width="150"><br>');
		$('#adclass_'+objid).append('<input type="hidden" name="add_pic['+objid+']" value="'+reponse[avl]["pic"]+'">');
		$('#adclass_'+objid).append('<input type="hidden" name="add_pro['+objid+']" value="'+reponse[avl]["id"]+'">');
		if (reponse[avl]["price"]!=null) ad_price = reponse[avl]["price"]; else ad_price = '9999';
		if (reponse[avl]["count"]!=null) ad_count = reponse[avl]["count"]; else ad_count = '1';
		$('#adclass_'+objid).append('加購價:<input type="text" name="add_price['+objid+']" value="'+ad_price+'"><br>');
		$('#adclass_'+objid).append('限購數量:<input type="text" name="add_count['+objid+']" value="'+ad_count+'"><br>');
		$('#adclass_'+objid).append('<input type="button" id="btn_'+objid+'" value="  刪除商品  " onclick="removeaddpro('+objid+')"><br><br>');
	}
	function removeaddpro(d){
		$('[name="add_pic['+d+']"]').remove();
		$('[name="add_pro['+d+']"]').remove();
		$('[name="add_price['+d+']"]').remove();
		$('[name="add_count['+d+']"]').remove();
		$('#img_'+d).remove();
		$('#btn_'+d).remove();
		if ($('#addlist').find('img').html() == null){
					$('#addlist').append('<input type="hidden" name="add_pic" value="">');
					$('#addlist').append('<input type="hidden" name="add_pro" value="">');
					$('#addlist').append('加購價:<input type="hidden" name="add_price" value=""><br>');
					$('#addlist').append('限購數量:<input type="hidden" name="add_count" value="">');
					$('form').submit();
		}
	}
	</script>
</table>
</div>
<?php }?>

 
</div>
 <br />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" >
	<tr>
      <td width="120" align="right" >狀態：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['status_html'];?>

	 </td>
    </tr>

	<tr >
      <td align="right" >建立時間：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['create_date'];?>
 建立
	 </td>
    </tr>

	<tr >
      <td align="right" >最後維護時間：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['update_date'];?>
 維護
	 </td>
    </tr>


	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
" />
  </table>

</form>




</div><!--div id="content_inside"-->


</div><!--div id="content_bg"-->
</div>
</div>

<div id="hide_class" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['def_cate_menu'];?>
</div><!--預設的分類-->
<script>
page_initial('table_content');//tr交互顯示顏色
$('#tabs').tabs();


function Copy_data()
{
	javascript:document.getElementById("form").action = '<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page_get_url']['id'];?>
&id=0';
	$('#form').submit();	
}


function submitpose(){
	var errostr = '';
	
	$('form [name="class[]"]').each(function (idx,obj){
		if ($(obj).val()!=null && $(obj).val()!=''){
		$.ajax( {
			url: "ajx.php",
			data: {pro_class:$(obj).val()},
			type:"GET",
			dataType:'text',
			async: false,
			success: function(msg){
				if (msg=='false'){
					errostr ='分類必須選擇非目錄之下\n';
				}
			}
		});
		}else{
			return errostr = '分類不可為跟目錄';
		}
	});
	if (errostr!=''){
		return alert(errostr);
	}else{
		$('form').submit();
	}
}
</script>

<?php }?><?php }} ?>
