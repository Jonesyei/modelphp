<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 10:00:15
         compiled from "D:\AppServ\www\margi\serback\templates\preferential.html" */ ?>
<?php /*%%SmartyHeaderCode:273315360592fa93485-92857955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57e895363163fb79eaf2787d98d2fe61b5b25d8f' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\preferential.html',
      1 => 1398822774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273315360592fa93485-92857955',
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
  'unifunc' => 'content_5360592fcd35e5_01753512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5360592fcd35e5_01753512')) {function content_5360592fcd35e5_01753512($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>

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


<!--SEARCH-->

<form action="" method="get" id="search_form" name="search_form">
<div id="search">


關鍵字查詢<input type="text" name="keyword" />


建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>




<select name="s_status" >
	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>

</select>

  
  
  <img src="images/search_btn.jpg" width="50" height="20" id="SearchBtn"/>
 </div>
 </form>

<!--SEARCH-->


<div id="content_inside">
<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<td align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></td>
		<td width="5%">編號</td>
  		<td>優惠卷認證碼</td>
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><td>排序</td><?php }?>
		<td>持有人</td>
		<td>建立時間</td>
		<td>使用時間</td>
		

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
   <tr>
      <td align="right" ><input type="checkbox" id="choose_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" name="choose_id" /></td>
	  
      <td> <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
 </td>
	  
	  <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['checknum'];?>
</a></td>
	  
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
	
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
</td>
	  
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['createdate'];?>
</td>
	  
	  <td ><?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['uploaddate']==null) {?>
              <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']==1) {?>
              未使用(管理者設定無法使用)
              <?php } else { ?>
              未使用
              <?php }?>
      <?php } else { ?>
      <?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['uploaddate'];?>

      <?php }?></td>
	  
	  

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
							<li class="back"><a  onClick="window.history.back();">返回</a></li>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a  onClick="$('#form').submit();">儲存</a></li><?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><li class="add"><a onClick="$('#form').submit();">新增</a></li><?php }?>

    </ul>
  </div>
  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form" enctype="multipart/form-data">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
    
	<tr>
	<td width="110" align="right" >編號：</td>
		  <td >
		  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>

		   </td>
	</tr>

	<tr >
	  <td  align="right" >優惠卷虛擬碼：</td>
	  <td > 
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['checknum'];?>

	  </td>
	</tr>

	 <tr >
      <td align="right" >優惠卷擁有人：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>

	 </td>
    </tr>

	 <tr >
      <td align="right" >分享視頻名稱：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['vname'];?>

	 </td>
    </tr>
    
	 <tr >
      <td align="right" >視頻商戶：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['mfromname'];?>

	 </td>
    </tr>
    <!--
    <tr >
      <td align="right" >QRCODE：</td>
      <td >
	<iframe src="../qrcode/test.php?qrcode=<?php echo $_smarty_tpl->tpl_vars['data']->value['qrcode'];?>
" frameborder="0" scrolling="no" height="275">
    </iframe>
	 </td>
    </tr>
    -->
	 <tr >
      <td align="right" >狀態：</td>
      <td >
	 <select name="status">
      <option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['status']==0) {?>selected<?php }?>>啟用</option>
      <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['status']!=0) {?>selected<?php }?>>關閉</option>
    </select>
	 </td>
    </tr>


	<tr >
      <td align="right" >建立時間：</td>
      <td >
	  於 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['createdate'];?>
 建立
	 </td>
    </tr>


	<tr >
      <td align="right" >使用時間：</td>
      <td >
      <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['status']==0) {?>未使用<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['uploaddate'];?>
<?php }?>
	 </td>
    </tr>
	
	

	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
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

<?php }?>




<?php }} ?>
