<?php /* Smarty version Smarty-3.1.18, created on 2014-08-19 12:06:59
         compiled from "D:\AppServ\www\jaln\serback\templates\system_temp.html" */ ?>
<?php /*%%SmartyHeaderCode:96115398ffe11f6654-81064082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243e40a8ac852855fdba9bb48fcbcff0dcac027f' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\system_temp.html',
      1 => 1408421219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96115398ffe11f6654-81064082',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5398ffe14c9793_41240032',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5398ffe14c9793_41240032')) {function content_5398ffe14c9793_41240032($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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

  <div class="title"><span>後台異動記錄</span>
    <ul>
    <li class="search"><a onClick="if ($('#search_form').css('display')=='none') $('#search_form').stop().slideDown(); else $('#search_form').stop().slideUp();">搜尋</a></li>
<?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a  onClick="javescript:$('#form').submit();">儲存</a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="edit"><a  onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')">編輯</a></li><?php }?>
<li class="delete"><a  onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')">刪除</a></li>
<li class="delete"><a  href="javascript:check_delall();">重記</a></li>
    </ul>
    <script>
	function check_delall(){
		if (confirm("這樣會清除所有 後台異動記錄 \r\n 您確定要清除嘛?"))
		window.location.href='?deleteall=1';
	}
	</script>
  </div>
  <!--div id="title"-->


<!--SEARCH-->

<form action="" method="get" id="search_form" name="search_form" style="overflow:hidden;display:none;">
<div id="search">


關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>


<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['tmp']['search_other'];?>





  
  
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
		
  		
  		<td width="10%">編號</td>
		

		<td>後台帳戶</td>
		
        <td>異動模式</td>
		
		<td>異動目錄</td>
		
        <td>操作路徑</td>
        
		<td>時間</td>
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
</div><!--div id="content_inside"-->




</div><!--div id="content_bg"-->

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php }?>






<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
	  <li class="back"><a onClick="window.history.back(-1)">返回</a></li>
      <li class="save"><a onClick="$('#form').submit();">儲存</a></li>

    </ul>
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


<script>
page_initial('table_content');//tr交互顯示顏色
//$('#tabs').tabs();

</script>

<?php }?><?php }} ?>
