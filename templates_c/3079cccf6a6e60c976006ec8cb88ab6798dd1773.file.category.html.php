<?php /* Smarty version Smarty-3.1.18, created on 2014-07-09 10:24:29
         compiled from "D:\AppServ\www\jaln\serback\templates\category.html" */ ?>
<?php /*%%SmartyHeaderCode:568653749302e9acd2-55544127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3079cccf6a6e60c976006ec8cb88ab6798dd1773' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\category.html',
      1 => 1404870909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '568653749302e9acd2-55544127',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537493031bf662_36047354',
  'variables' => 
  array (
    'act' => 0,
    'admin_info' => 0,
    'close' => 0,
    'mode' => 0,
    's_query' => 0,
    'setup' => 0,
    'html' => 0,
    'data' => 0,
    'page' => 0,
    'cate_file_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537493031bf662_36047354')) {function content_537493031bf662_36047354($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['act']->value=="list"||$_smarty_tpl->tpl_vars['act']->value=='') {?>
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
    <li class="search"><a onClick="if ($('#search').css('display')=='none') $('#search').stop().slideDown(); else $('#search').stop().slideUp();">搜尋</a></li>
  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><li class="add"><a href="?act=detail&mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
&s_query=<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['setup']->value['AddBtn'];?>
</a></li><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="edit"><a href="#" onclick="return checkAction('','U')"><?php echo $_smarty_tpl->tpl_vars['setup']->value['EditBtn'];?>
</a></li><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['close']->value['del']!=1) {?><li class="delete"><a href="#" onclick="return checkAction('','D')"><?php echo $_smarty_tpl->tpl_vars['setup']->value['DelBtn'];?>
</a></li><?php }?>
    </ul>
  </div>
  <!--div id="title"-->


<!--SEARCH-->
<form action="" method="post" id="form" name="form">
<div id="search" style="display:none;">
   類別：<?php echo $_smarty_tpl->tpl_vars['html']->value['type_menu'];?>

    ｜狀態：<?php echo $_smarty_tpl->tpl_vars['html']->value['status_menu'];?>

    ｜名稱：<input name="search_keyword" type="text"  id="search_keyword" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search_value']['keyword'];?>
" size="30" />
    ｜  <input name="isSearch" type="image" id="isSearch" src="images/search_btn.jpg"  value="查詢"/> 
 </div>

<!--SEARCH-->


<div id="content_inside">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<td align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></td>
  		<td>名稱</td>
		

		
		<td>排序</td>

		
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
" name="choose_id" /></td>
	  
	  
	  <td ><A href="#" onclick="checkAction('<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
','U');"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['show_text'];?>
</A></td>
	  
	  
 	  <td >
	  <input type="text" name="sort<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" id="sort<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" size="2" 
	  value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
" >&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['up_icon'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['down_icon'];?>

	  </td>
	 
	  
	  <td >
	  <div id="edit_status<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" class="ajax_edit"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']['text'];?>
</div>
	  <script>
		//狀態
		ajax_change_status( 'edit_status<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
' ,'<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['status']['option'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['table'];?>
','status', <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
,1);
		//排序
		$("#sort"+<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
).blur(function() {
			if($(this).val()!=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
)
			{
				location="?val="+$(this).val()+"&val_before="+<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
+"&act=sort&id="+<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
+"&pid="+<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['parent_id'];?>
+"&mode="+<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
;
			}
		});				
		</script>
	  
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


<!--page列 start-->
<?php echo $_smarty_tpl->tpl_vars['html']->value['page_bar'];?>

<!--page列 end-->


</div><!--div id="content_inside"-->


<input name="act" type="hidden" id="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
  <input name="id" type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
  <input type="hidden" name="mode" id="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
"/>
  <input type="hidden" name="del_id" id="del_id" value="" />
  <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
  <input type="hidden" name="repeat" id="repeat" value="0" />
  <input type="hidden" name="s_query" id="s_query" value="<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
" />
  
  
  <input name="isSearch" type="hidden" id="isSearch" value="1" />

</form>




</div><!--div id="content_bg"-->

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->

	


<?php } elseif ($_smarty_tpl->tpl_vars['act']->value=="add"||$_smarty_tpl->tpl_vars['act']->value=="edit") {?>
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
	<li class="back"><a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
&s_query=<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['setup']->value['BackBtn'];?>
</a></li>
  	<?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a href="Javascript:$('#form').submit();" ><?php echo $_smarty_tpl->tpl_vars['setup']->value['SaveBtn'];?>
</a></li><?php }?>
    </ul>
  </div>
  <!--div id="title"-->

<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">
		<div class="container">
			<div class="validate">請在必填欄位，填入正確格式：</div>
			<ol></ol>
		</div>


<form action="" method="post" id="form" name="form" enctype="multipart/form-data">


  <table width="100%" border="0" cellpadding="5" cellspacing="0" class="table_content" >
          <tr>
            <td align="right" class="table_content_left" width="10%">目錄：</td>
            <td width="711" align="left" class="table_content_left">
			<?php echo $_smarty_tpl->tpl_vars['html']->value['cate_menu'];?>
			</td>
          </tr>
          <tr>
            <td align="right" class="table_content_left">名稱：</td>
            <td align="left" class="table_content_left"><input name="edit_name" type="text" id="edit_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" size="20" /></td>
          </tr>
		 
		 
		 
		 <?php if ($_smarty_tpl->tpl_vars['admin_info']->value['tmp']['get']['mode']=='3') {?>
          <tr>
            <td align="right" class="table_content_left">品牌介紹：</td>
            <td align="left" class="table_content_left">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['detail_fck'];?>

			</td>
          </tr>
		 <?php }?>
		 
		 
		 

          <!--
		  <tr>
            <td align="right" class="table_content_left">
			上傳圖檔：<br />
			<?php echo $_smarty_tpl->tpl_vars['html']->value['size_memo'];?>

			</td>
            <td align="left"  class="table_content_left"><?php echo $_smarty_tpl->tpl_vars['html']->value['file_menu'];?>
</td>
          </tr>
		  -->
		  
		  
			
			
		<!---	
		 <?php if ($_smarty_tpl->tpl_vars['mode']->value==2) {?>		 
          <tr>
            <td align="right" class="table_content_left">事件代表顏色：</td>
            <td align="left" class="table_content_left">
			<script src="../includes/js/iColorPicker.js" type="text/javascript"></script>
			<input id="edit_memo" name="edit_memo" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['memo'];?>
" class="iColorPicker" />
			</td>
		 <?php } else { ?>
          <tr>
            <td align="right" class="table_content_left">備註：</td>
            <td align="left" class="table_content_left"><textarea name="edit_memo" cols="40" rows="2" id="edit_memo" ><?php echo $_smarty_tpl->tpl_vars['data']->value['memo'];?>
</textarea></td>		 
		 <?php }?>
          </tr>
          --->
          
          <?php if ($_smarty_tpl->tpl_vars['data']->value['depth']==1) {?>
          <!--
          <tr>
            <td align="right" class="table_content_left">圖片：</td>
            <td align="left" class="table_content_left">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['pic']!=null) {?><img src="<?php echo $_smarty_tpl->tpl_vars['cate_file_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['pic'];?>
" ><br><?php }?>
            <input type="file" name="edit_pic">
            </td>
          </tr>
          -->	  
          <?php }?>
                    
          <?php if (0) {?>
          <tr>
            <td align="right" class="table_content_left">內容：</td>
            <td align="left" class="table_content_left"><?php echo $_smarty_tpl->tpl_vars['data']->value['detail_fck'];?>
</td>
          </tr>	  
          <?php }?>
          
          <tr>
            <td align="right" class="table_content_left">狀態：</td>
            <td align="left" class="table_content_left"><?php echo $_smarty_tpl->tpl_vars['html']->value['status_menu'];?>
</td>
          </tr>	  
          <?php if ($_smarty_tpl->tpl_vars['data']->value['id']!='') {?>		  
          <tr>
            <td align="right" class="table_content_left">排序：</td>
            <td align="left" class="table_content_left">
			<input name="edit_sort" type="text" id="edit_sort" maxlength="10" style="text-align:right; width:30px" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sort'];?>
"/>			</td>
          </tr>	          
		  <tr>
            <td align="right" class="table_content_left">維護：</td>
            <td align="left" class="table_content_left"><?php echo $_smarty_tpl->tpl_vars['data']->value['update_user'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value['update_date'];?>
 維護</td>
          </tr>
		  <?php }?>
        </table>
		<input name="edit_pre_sort" type="hidden" id="edit_pre_sort" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sort'];?>
">

 
  <br />
  
  <input name="act" type="hidden" id="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
  <input name="id" type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
  <input type="hidden" name="mode" id="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
"/>
  <input type="hidden" name="del_id" id="del_id" value="" />
  <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
  <input type="hidden" name="repeat" id="repeat" value="0" />
  <input type="hidden" name="s_query" id="s_query" value="<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
" />
  
  
  <input name="isSearch" type="hidden" id="isSearch" value="1" />
  
</form>

</div>


</div><!--div id="content_inside"-->


</div><!--div id="content_bg"-->


<script>
page_initial('table_content');//tr交互顯示顏色
//$('#tabs').tabs();

//防重複送出表單
var sumbit=false;
$(document).ready(function(){
	//表單驗證
	var container = $('div.container');	
	var validator=$('#form').validate( {
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',    
		event: "keyup",
		debug:  false,              
		rules:{
			edit_name:{required:true}, 
			file:{accept:true}, 
			edit_status:{required:true},
			edit_sort:{required:true,digits:true}		
		},
		messages:{
			edit_name:{required:"名稱 : 尚未填寫!"},	
			file:{accept:"上傳圖檔 : 接受格式 jpg、png、gif"}, 	
			edit_status:{required:"狀態 : 請選擇!"},
			edit_sort:{required:"排序 : 請輸入!",digits:"排序 : 請輸入整數值"}			
		},
		submitHandler:function(form){	//送出前的自訂處理
			if(sumbit==false)
			{
				form.submit();
				$("#save_text").html("傳送中...");
				sumbit=true;
			}
			
		}
	});	
});



</script>

<?php }?>



  <?php }} ?>
