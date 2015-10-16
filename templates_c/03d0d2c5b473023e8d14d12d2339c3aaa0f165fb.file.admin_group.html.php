<?php /* Smarty version Smarty-3.1.18, created on 2014-06-11 10:56:10
         compiled from "D:\AppServ\www\jaln\serback\templates\admin_group.html" */ ?>
<?php /*%%SmartyHeaderCode:149165397c54aa54b36-15664809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03d0d2c5b473023e8d14d12d2339c3aaa0f165fb' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\admin_group.html',
      1 => 1398822665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149165397c54aa54b36-15664809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_info' => 0,
    'search_form' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5397c54ac4c8b5_95446444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5397c54ac4c8b5_95446444')) {function content_5397c54ac4c8b5_95446444($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
<div id="content_bg">

  <div class="title"><span>後台帳號群組清單</span>
    <ul>
	  <li class="search"><a onClick="if ($('#search').css('display')=='none') $('#search').stop().slideDown(); else $('#search').stop().slideUp();">搜尋</a></li>
	  <li class="save"><a href="#" onClick="javescript:$('#form').submit();">儲存</a></li>
	  <li class="add"><a href="?id=0">新增</a></li>
      <li class="edit"><a href="#" onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')">編輯</a></li>
      <li class="delete"><a href="#" onclick="Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=')">刪除</a></li>
    </ul>
  </div>
  <!--div id="title"-->


<!--SEARCH-->

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['search_form']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--SEARCH-->


<div id="content_inside">
<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<td align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></td>
  		<td>名稱</td>
		<td>狀態</td>
		<td>建立時間</td>
		<td>維護時間</td>

  	</tr>
	
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idex']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['name'] = 'idex';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idex']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
      <td align="right" ><input type="checkbox" id="choose_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" name="choose_id"  /></td>
      <td ><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
</a></td>
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status_html'];?>
</td>
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
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

  <div class="title"><span>後台帳號群組明細</span>
    <ul>
	<li class="back"><a href="javascript:window.history.back(-1);">返回</a></li>
	
     <?php if ($_smarty_tpl->tpl_vars['data']->value['id']) {?>
      <li class="save"><a href="#" onClick="javescript:$('#form').submit();">儲存</a></li>
	 <?php } else { ?>
	  <li class="add"><a href="#" onClick="javescript:$('#form').submit();">新增</a></li>
	<?php }?>
    </ul>
  </div>
  <!--div id="title"-->


<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
    <tr >
      <td width="90" align="right" >名稱：</td>
      <td >
	  <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"  />
        </td>
    </tr>
	
	<tr>
      <td width="90" align="right" >權限等級：</td>
      <td >
	  <input type="text" name="control" id="control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['control'];?>
" maxlength="3" size="3"/>(數值越小權力越大)
      </td>
    </tr>
    
	 <tr >
      <td align="right" >權限：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['auth_html'];?>

	
	<script>
	function Check(lv)
	{
		if( $('#auth_'+lv).attr("checked")=="checked" || $('#auth_'+lv).attr("checked")==true )
		{
			$('.auth_'+lv).attr("checked","checked");
		}
		else
		{
			$('.auth_'+lv).removeAttr("checked");
		}
	
		//if($('#'+parents).attr("checked")==true)
		//alert(lv);
		/*
		$.ajax( {
			//傳遞目標頁面檔案
			url: "ajx.php?lv="+lv+"&call=admin_group",
			type: 'GET',
			data: {
				//傳遞 變數名稱:值
			},
			error: function(xhr) {
				alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				//回傳物件名稱
				//alert(response);
				for(i=0;i<response.split(",").length;i++)
				{	
					if($('#auth_'+lv).attr("checked")==true)
						$('#auth_'+response.split(",")[i]).attr("checked",true);
					else
						$('#auth_'+response.split(",")[i]).attr("checked",false);
				
					
					//if($('#auth_'+response.split(",")[i]).attr("checked")==true)
					//	$('#auth_'+response.split(",")[i]).attr("checked",false)
					//else
					//	$('#auth_'+response.split(",")[i]).attr("checked",true)
					
				}
					
			}
			
			} );*/
	}
	</script>
	 </td>
    </tr>
	
	
	
	 <tr >
      <td align="right" >狀態：</td>
      <td >
	<?php echo $_smarty_tpl->tpl_vars['data']->value['status_html'];?>

	 </td>
    </tr>
	
	<tr >
      <td align="right" >建立時間：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['create_date'];?>
 建立
	 </td>
    </tr>
	
	<tr >
      <td align="right" >最後維護時間：</td>
      <td >
	 <?php echo $_smarty_tpl->tpl_vars['data']->value['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['update_date'];?>
 維護
	 </td>
    </tr>

	<input name="act" type="hidden" value="submit" />


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


	<?php if ($_smarty_tpl->tpl_vars['data']->value['account']==null) {?> 
	<script>
	var sumbit=false;
		$(document).ready(function() {
		
			var validator=$('#form').validate( {  
				event: "keyup",
				debug:  false,   
				rules:{
					name:{required:true},
					password:{required:true},
					password_2:{equalTo:'#password',minlength: 4,maxlength: 12},
				},
				messages:{
					name:{required:"* 不可空白"},	
					password:{required:"* 不可空白"},
					password_2:{equalTo:"* 密碼確認不符",minlength:"密碼不可少於4位",maxlength:"密碼不可超過12位"},
				},        
				submitHandler:function(form){	//送出前的自訂處理
					if(sumbit==false)
					{	
						form.submit();
						sumbit=true;
					}
				}
			} );	
		} );
		
	
		
	</script>
	<?php }?>




<?php }?><?php }} ?>
