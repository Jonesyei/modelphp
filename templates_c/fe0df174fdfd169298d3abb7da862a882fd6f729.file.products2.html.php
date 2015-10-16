<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 10:00:06
         compiled from "D:\AppServ\www\margi\serback\templates\products2.html" */ ?>
<?php /*%%SmartyHeaderCode:22578536059269fa541-02892077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe0df174fdfd169298d3abb7da862a882fd6f729' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\products2.html',
      1 => 1398822794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22578536059269fa541-02892077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'data_table' => 0,
    'page_table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53605926da52d9_70397922',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53605926da52d9_70397922')) {function content_53605926da52d9_70397922($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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

<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
    <li class="search"><a onClick="if ($('#search_form').css('display')=='none') $('#search_form').stop().slideDown(); else $('#search_form').stop().slideUp();">搜尋</a></li>
    <li class="save"><a  onClick="javescript:$('#csv_div2').dialog('open');">匯入</a></li>
    <li class="save"><a  onClick="javescript:$('#csv_div').dialog('open');">匯出</a></li>
<?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a  onClick="javescript:$('#form').submit();">儲存</a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><li class="add"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=0">新增</a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="edit"><a  onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')">編輯</a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['close']->value['del']!=1) {?><li class="delete"><a  onclick="Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=')">刪除</a></li><?php }?>
    </ul>
  </div>
  <!--div id="title"-->


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

<form action="" method="get" id="search_form" name="search_form" style="display:none;">
<div id="search">


關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>


<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>



<select name="s_status" >
	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>

</select>

  
  
  <img src="images/search_btn.jpg" width="50" height="20" id="SearchBtn"/>
 </div>
 </form>

<!--SEARCH-->


<div id="content_inside">

<!--
<form method="post" id="excel_form" action="" style="margin:0 0 10px 4px; padding:6px; width:5%; border:#999999 1px solid; " target="_blank">

<a style="cursor:pointer;" onclick="$('#excel_form').submit(); ">匯出商品庫存</a>

<input type="hidden" value="excel" name="act" />
</form>
-->


<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<td align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></td>
  		<td width="10%">名稱</td>
		

		<td width="10%">商品分類</td>

		
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><td width="10%">排序</td><?php }?>
		<td>狀態</td>
		<td width="20%">建立時間</td>
		<td width="20%">維護時間</td>
		

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
	  
	  
	  <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name']);?>
</a></td>
	  
	  

	  <!--<td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['classname'];?>
</td>-->
	  <td><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['class_html'];?>
</td>
	  


	  
	<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?>  
	<td >
		<input name="sort_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" type="text" size="2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
" onblur="$('#form').submit();">
		<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['up'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['down'];?>

	</td>
	<?php }?>
	
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status_html'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <BR /><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <BR /><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
</td>
	  
	  

    </tr>
    <?php endfor; endif; ?>
	
  </table>
  <br />
  <input name="act" type="hidden" value="all" />
</form>
</div><!--div id="content_inside"-->




</div><!--div id="content_bg"-->

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->

<!--以下為page_table-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

      <tr><td>

	  	<!--page列 start-->

	    <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/tb_bk03.jpg">

      <tr>

        <td width="13"><img src="images/tb_bk01.jpg" width="13" height="36" /></td>

        <td>

		<table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="51%" class="wd_num_01" align="left">
			顯示 <?php echo $_smarty_tpl->tpl_vars['page_table']->value['start_date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['page_table']->value['end_date'];?>
 筆，共 <?php echo $_smarty_tpl->tpl_vars['page_table']->value['page_date_count'];?>
 筆
			</td>

            <td width="39%" align="right"><table border="0" cellspacing="0" cellpadding="3" >

              <tr>

                <td>
			
				<img src="images/up.jpg" width="52" height="20" style="cursor:pointer; vertical-align:middle;" 
				onclick="location='<?php echo $_smarty_tpl->tpl_vars['page_table']->value['up_url'];?>
'" />
			
				</td>

                <td class="wd_num_02"><?php echo $_smarty_tpl->tpl_vars['page_table']->value['now_page'];?>
 / <?php echo $_smarty_tpl->tpl_vars['page_table']->value['all_page'];?>
 </td>

                <td>
				
				<img src="images/down.jpg" width="52" height="20" style="cursor:pointer; vertical-align:middle;" 
				onclick="location='<?php echo $_smarty_tpl->tpl_vars['page_table']->value['down_url'];?>
'" />
			
				</td>

              </tr>

            </table></td>

            <td width="5%" align="right">
			<select name="jump_page"  id="jump_page"  style="vertical-align:middle;width:50px;" onchange="jump( '<?php echo $_smarty_tpl->tpl_vars['page_table']->value['jump_page_url'];?>
',this.value)">
			<?php echo $_smarty_tpl->tpl_vars['page_table']->value['jump_page_html'];?>

			</select>
			<script>//清單快速換頁用
				function jump(url,page)
				{
					location= url + "&page="+ page ;
				}
			</script>
			</td>

          </tr>

        </table></td>

        <td width="13"><img src="images/tb_bk02.jpg" width="13" height="36" /></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="5"></td>

  </tr>

</table>



		<!--page列 end-->

	  </td>

      </tr>

    </table>
<!--以上為page_table-->


<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
    <li class="back"><a  onClick="window.history.back(-1);">返回</a></li>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['id']) {?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a  onClick="submitpose();">儲存</a></li><?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['close']->value['copy']!=1) {?><li class="add"><a  onClick="Copy_data();">複製</a></li><?php }?>
	 <?php } else { ?>
	  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><li class="add"><a  onClick="submitpose();">新增</a></li><?php }?>
	<?php }?>
    </ul>
  </div>
  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form" enctype="multipart/form-data">
<div id="tabs">
<ul>
	<li><a href="#tabs-1">基本資料</a></li>
	<li><a href="#tabs-2">尺寸顏色</a></li>
    <li><a href="#tabs-3">售價設定</a></li>
    <li><a href="#tabs-4">加購設定</a></li>
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
	<td align="right" >產品分類：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['cate_menu'];?>

	   </td>
	</tr>

    <tr>
	<td align="right" >品牌分類：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['probrand_menu'];?>

	   </td>
	</tr>

	<tr>
	<td align="right" >是否為特價商品：</td>
	  <td >
      <input type="radio" name="cook" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['cook']==1) {?>checked<?php }?>>是
      <input type="radio" name="cook" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['cook']==0) {?>checked<?php }?>>否
	   </td>
	</tr>


	
	<tr>
	<td align="right" >商品圖片：</td>
	  <td >

	 
<link href="../includes/Uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/Uploadify/swfobject.js"></script>
<script type="text/javascript" src="../includes/Uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
var Pic
$(document).ready(
	function()
	{
		Pic = '<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'];?>
';
		$(Pic.split("|__|")).each(function(idx,data){
			if(data==null || data=='') return;
			UPLAppend('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['file_url'];?>
'+data);
		});
	
		 $("#uploadify").uploadify
		 (
			 {
				'uploader'		: '../includes/Uploadify/uploadify.swf', 
				'script'		: '../includes/Uploadify/uploadify.php', 
				'cancelImg'		: '../includes/Uploadify/cancel.png', 
				'folder'		: '<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['file_url'];?>
', 
				'queueID'		: 'fileQueue_list',
				'queueSizeLimit': 10,
				'auto'			: false,
				'multi'			: true,
				'onAllComplete'	:function(event,data) 
				{
					
				},
				'onComplete'  : function(event, ID, fileObj, response, data)
				{
					UPLAppend(response);//func_back_js.js
					
				  //alert('There are ' + (data.fileCount+1) + ' files remaining in the queue.');
				  
				  
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

</script>

<style>
.UploadPicList img {cursor:pointer;}
</style>
<ul class="UploadPicList">
</ul>
<div id="fileQueue_list"></div>
<input type="file" name="uploadify" id="uploadify"/>
<BR /><a href="javascript:$('#uploadify').uploadifyUpload()">批次上傳圖片</a>&nbsp;|&nbsp;<a href="javascript:$('#uploadify').uploadifyClearQueue()">取消</a>&nbsp;|&nbsp;建議比例:XXX*XXX
<BR />
	 
	  </td>
	</tr>
	


    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['det'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['det']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['name'] = 'det';
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['loop'] = is_array($_loop=6) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['det']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['det']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['det']['total']);
?>
	<tr >
      <td  align="right" ><?php echo $_smarty_tpl->tpl_vars['data']->value['detailtittle'][$_smarty_tpl->getVariable('smarty')->value['section']['det']['index']];?>
：</td>
      <td > 
      <?php if ($_smarty_tpl->tpl_vars['data']->value['detail'][$_smarty_tpl->getVariable('smarty')->value['section']['det']['index']]!=null) {?>
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['detail'][$_smarty_tpl->getVariable('smarty')->value['section']['det']['index']];?>

      <?php } else { ?>
      <?php echo $_smarty_tpl->tpl_vars['data']->value['detailnull'];?>

      <?php }?>
	  </td>
    </tr>
    <?php endfor; endif; ?>

	
</table>
</div>




<div id="tabs-2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
 <tr>
	<td align="right" width="120">尺寸分類：</td>
	  <td id="size_td">尺寸模組
      <select id="pro_size" style="width:200px" onblur="change_size_menu();">
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pro_size'];?>

      </select><input type="button" value="匯入尺寸模組" style="width:100px;" onclick="change_size_menu('nosing');">
      新增尺寸分類 <input type="text" id="size_add_box">
      <input type="button" value=" 新增 " onclick="addtolist();"/>
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
  		<div>規格: <input type="text" name="size[]" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['size'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]==null) {?>基本<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['size'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
<?php }?>"> 
        現貨:<input type="text" name="stock[]" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']]!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['size']['index']];?>
<?php } else { ?>0<?php }?>" onkeyup="this.value=this.value.replace(/\D/g,\'\');">
        <input type="button" value=" 刪除 " onclick="$(this).parent().remove();" /></div>
      <?php endfor; endif; ?>
	   </td>
	</tr>
    <script>
	function addtolist(){
		$('#size_td').append('<div>規格: <input type="text" name="size[]" value="'+$('#size_add_box').val()+'"> 現貨:<input type="text" name="stock[]" value="1" onkeyup="this.value=this.value.replace(/\D/g,\'\');"> <input type="button" value=" 刪除 " onclick="$(this).parent().remove();"></div>');
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
			$('#size_td div').remove();//原先全部清空
			am = $('#pro_size option:selected').val().split('|__|');
			for(aa in am)
			$('#size_td').append('<div>規格: <input type="text" name="size[]" value="'+am[aa]+'"> 現貨:<input type="text" name="stock[]" value="1" onkeyup="this.value=this.value.replace(/\D/g,\'\');"> <input type="button" value=" 刪除 " onclick="$(this).parent().remove();"></div>');
	}
	</script>
</table>
</div>






<div id="tabs-3">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
 	<tr >
      <td  align="right" width="120">商品售價：</td>
      <td > 
	  <input type="text" name="price1" id="price1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['price1'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
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

	<tr >
      <td  align="right" >所獲得紅利：</td>
      <td > 
	  <input type="text" name="point" id="point" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['point'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>

	<tr >
      <td  align="right" >可折抵購物金：</td>
      <td > 
	  <input type="text" name="depoint" id="depoint" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['depoint'];?>
" size="10" onkeyup="this.value=this.value.replace(/\D/g,'');">
	  </td>
    </tr>
</table>
</div>








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
	$('#form').submit();
}
</script>

<?php }?><?php }} ?>
