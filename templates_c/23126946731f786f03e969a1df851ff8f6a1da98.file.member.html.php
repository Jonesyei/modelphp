<?php /* Smarty version Smarty-3.1.18, created on 2015-12-23 11:57:48
         compiled from "D:\AppServ\www\modelphp\serback\templates\member.html" */ ?>
<?php /*%%SmartyHeaderCode:25673559b5c100a0eb5-92581229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23126946731f786f03e969a1df851ff8f6a1da98' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\member.html',
      1 => 1449643847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25673559b5c100a0eb5-92581229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5c1031b2f4_18442583',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5c1031b2f4_18442583')) {function content_559b5c1031b2f4_18442583($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
         <a onClick="javescript:$('#csv_div').dialog('open');"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>匯出</a>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=0"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?><!-- 模組新增修改刪除列 -->
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
        <a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a>
         </div>
  <!--div id="title"-->
  


<form action="csv.php" method="post" id="csv" style="display:none;">
	<input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_title'];?>
">
    <input type="text" name="sql" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['csv_sql'];?>
">
    <input type="text" name="rows" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['output_row_str'];?>
">
</form>

<div id="csv_div" title="匯出資料進階設定">
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
$( "#csv_div" ).dialog( {
	  height:300,
      modal: true,
      buttons: {
        '取消': function() {$( this ).dialog( "close" );}
		,'匯出': function() {
			output_title = ''; output_sql = ''; output_row = '';
			$('.outrow').each(function (idx,obj){
				if ($(obj).attr('checked')!=''&&$(obj).attr('checked')!=null){
					if (output_title!='') output_title +=',';
					if (output_sql!='') output_sql +=',';
					if (output_row!='') output_row +='|__|';
					output_title += $(obj).attr('alt');
					output_sql += $(obj).val();
					output_row += $(obj).val();
				}
			})
			$('#csv [name="title"]').val(output_title);
			$('#csv [name="rows"]').val(output_row);
			$('#csv [name="sql"]').val('select ' + output_sql + ' from <?php echo $_smarty_tpl->tpl_vars['data']->value['cpos']['table'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['cpos']['tablelistwhere'];?>
 <?php echo str_replace("'","\\'",$_smarty_tpl->tpl_vars['data']->value['cpos']['search_output']);?>
');
			$('#csv').append($('#csv_div .outrow:checked').clone());
			$('#csv').submit();
			$('#csv .outrow').remove();
			$( this ).dialog( "close" );
		}
      }
    });
	$( "#csv_div" ).dialog("close");
	$('#csv_div').parent().css('position','absolute');
	
    $('#csv_div').sortable( {items: 'div'} );
    $('#csv_div').disableSelection();
</script>


<!--SEARCH-->
<div class="search-tool" id="search"><!-- 搜尋模組 -->
<form action="" method="get" id="search_form" name="search_form">



關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>


<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>



<select name="s_status" >
	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>

</select>

  
  
   <img src="images/icon-search.png" width="18" height="18" id="SearchBtn" onclick="search_form.submit();"/>

 </form>
</div>
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
  		<th align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></th>
  		<th width="10%">帳戶</th>
		<th width="10%">姓名</th>
		<th width="10%">帳戶類型</th>
        <th>紅利點數</th>
        <th>性別</th>
		<th width="20%">E-mail</th>
		
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><th width="10%">排序</th><?php }?>
		<th>狀態</th>
		<th width="15%">建立時間</th>
		<th width="15%">維護時間</th>
		

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
"><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['account']);?>
</a></td>
      
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name']);?>
</a></td>
      
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['mode_html'];?>
</a></td>
      
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['point'];?>
</a></td>
      
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sex_html'];?>
</a></td>
      
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['email'];?>
</a></td>
	  
	  
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
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
</td>
	  
	  

    </tr>
    <?php endfor; endif; ?>
	
  </table>
  <br />
  <input name="act" type="hidden" value="all" />
</form>
</div><!--div id="content_inside"-->






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

</div><!--div id="content_bg"-->
</div>
</div>

<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<!--google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
function initialize() {
	var geocoder = new google.maps.Geocoder();  //定義一個Geocoder物件   
		geocoder.geocode(   
			{ address: $('input[name="address"]').val() },    //設定地址的字串   
			function(results, status) {    //callback function   
				if (status == google.maps.GeocoderStatus.OK) {    //判斷狀態   
					  var fenway = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
					  var mapOptions = {
						center: fenway,
						zoom: 14
					  };
					  var map = new google.maps.Map(
						  document.getElementById('map-canvas'), mapOptions);
					  var panoramaOptions = {
						position: fenway,
						pov: {
						  heading: 34,
						  pitch: 10
						}
					  };
					  var panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);
					  map.setStreetView(panorama);
				} else {   
					$('#map-canvas').html('該地址不正確，無法提供地圖以及街景服務!!');
				}   
		  }   
	 );
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
	<li><a href="#tabs-2">紅利點數</a></li>
    <!--
    <li><a href="#tabs-3">售價設定</a></li>
    <li><a href="#tabs-4">加購設定</a></li>
    -->
</ul>

<div id="tabs-1">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">

	<tr>
	<td align="right" >會員帳戶：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['account'];?>

	   </td>
	</tr>
    
	<tr>
	<td width="120" align="right" >會員名稱：</td>
	  <td >
	  <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
"/>
	  </td>
	</tr>

    <tr>
	<td align="right" >會員密碼：</td>
	  <td >
      <input type="password" name="password" id="p1" value="">(不修改請保持空白)
	   </td>
	</tr>
    
    <tr>
	<td align="right" >確認密碼：</td>
	  <td >
      <input type="password" id="p2" value="">
	   </td>
	</tr>

	<tr>
	<td align="right" >會員類型：</td>
	  <td >
      	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['type_html'];?>

	   </td>
	</tr>

	<tr>
	<td align="right" >性別：</td>
	  <td >
      	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['sex_html'];?>

	   </td>
	</tr>
    <!--
	<tr>
	<td align="right" >身分證字號：</td>
	  <td >
      	<input type="text" name="id_num" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id_num'];?>
">
	   </td>
	</tr>
    -->
	<tr>
	<td align="right" >生日：</td>
	  <td >
      	<input type="text" name="birthday" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['birthday'];?>
">
        <script>Datepick('[name="birthday"]',"","yyyy-mm-dd");</script>
	   </td>
	</tr>
    

	<tr>
	<td align="right" >電話：</td>
	  <td >
      	<input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['phone'];?>
">
	   </td>
	</tr>

	<tr>
	<td align="right" >email：</td>
	  <td >
      	<input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['email'];?>
"  style="width:300px;">
	   </td>
	</tr>
    
    <tr>
	<td align="right" >地址：</td>
	  <td >
      	<input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['address'];?>
" style="width:300px;"><a href="javascript:change_map_show();"> [開啟/關閉 google地圖以及街景服務]</a><br>
        <div id="google_map" style="height:0px; overflow:hidden;">
            <div id="map-canvas" style=" position:relative;float:left;width: 400px; height: 300px"></div>
            <div id="pano" style="width: 400px; height: 300px;"></div>
        </div>
	   </td>
	</tr>
	<script>
	function change_map_show(){
		if ($('#google_map').height()==0){
			$('#google_map').height('auto');
		}else{
			$('#google_map').slideToggle();
		}
	}
	</script>
    <tr>
	<td align="right" >照片：</td>
	  <td >
      	<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['pic']!=null) {?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['file_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'];?>
" height="100px"><br>
        <a href="javascript:;" onclick="$(this).parent().append('<input type=file name=pic>');$(this).parent().append('<input type=hidden name=pic>');$(this).parent().find('img,a,br').remove();">刪除照片</a>
        <?php } else { ?>
      	<input type="file" name="pic" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id_num'];?>
" onchange="$('input[type=hidden][name=pic]').remove();">
        <?php }?>
	   </td>
	</tr>
</table>
</div>




<div id="tabs-2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<tr>
	<td align="right" >紅利點數：</td>
	  <td >
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['point'];?>
  <input type="text" name="point" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['point'];?>
" size="6" readonly="readonly">
      <select id="point_act">
      <option value="1">+</option>
      <option value="-1">-</option>
      </select>
      <input type="text" id="ad_point" value="0"  size="6">
      <input type="button" value=" 更動 " onclick="$('[name=point]').val($('[name=point]').val()*1+$('#ad_point').val()*$('#point_act').val())">
	   </td>
	</tr>
</table>
</div>





<!--
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
					$('#addlist').append('<input type="hidden" name="add_pic[]" value="">');
					$('#addlist').append('<input type="hidden" name="add_pro[]" value="">');
					$('#addlist').append('加購價:<input type="hidden" name="add_price[]" value=""><br>');
					$('#addlist').append('限購數量:<input type="hidden" name="add_count[]" value="">');
					$('form').submit();
		}
	}
	</script>
</table>
</div>
-->
 
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
	if ($('#p2').val()!=$('#p1').val()) return alert('兩次所輸入的密碼不相符!!');
	$('#form').submit();
}
</script>

<script>
Check_submit();
</script>
<?php }?><?php }} ?>
