<?php /* Smarty version Smarty-3.1.18, created on 2015-10-15 15:41:58
         compiled from "D:\AppServ\www\modelphp\serback\templates\category.html" */ ?>
<?php /*%%SmartyHeaderCode:10748559b5c0ceeacc9-86442669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff7e788a133a9dd84adb49eb39298cda6d34cf8b' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\category.html',
      1 => 1444894917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10748559b5c0ceeacc9-86442669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5c0d2a0568_12542822',
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
    'page_table_html' => 0,
    'page' => 0,
    'jdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5c0d2a0568_12542822')) {function content_559b5c0d2a0568_12542822($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['act']->value=="list"||$_smarty_tpl->tpl_vars['act']->value=='') {?>
<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">
	<h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
  <div class="page-tool">
  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><a href="?act=detail&mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
&s_query=<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
"><img src="images/icon06.png" width="32" height="32" alt="新增"/><?php echo $_smarty_tpl->tpl_vars['setup']->value['AddBtn'];?>
</a><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a href="#" onclick="return checkAction('','U')"><img src="images/icon14.png" width="32" height="32" alt=""/><?php echo $_smarty_tpl->tpl_vars['setup']->value['EditBtn'];?>
</a><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['close']->value['del']!=1) {?><a href="#" onclick="return checkAction('','D')"><img src="images/icon13.png" width="32" height="32" alt=""><?php echo $_smarty_tpl->tpl_vars['setup']->value['DelBtn'];?>
</a><?php }?>
  <!--div id="title"-->
	</div>

<!--SEARCH-->
         
<form action="" method="post" id="form" name="form">
<div class="search-tool" id="search"><!-- 搜尋模組 -->


名稱<input name="search_keyword" type="text"  id="search_keyword" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search_value']['keyword'];?>
" size="30" />

            
類別：<?php echo $_smarty_tpl->tpl_vars['html']->value['type_menu'];?>

            
狀態：<?php echo $_smarty_tpl->tpl_vars['html']->value['status_menu'];?>


<img src="images/icon-search.png" width="18" height="18" onclick="document.getElementById('isSearch').click();"/>


  <input name="isSearch" type="image" id="isSearch" src="images/search_btn.jpg"  value="查詢" style="display:none;"/> 
</div>

<!--SEARCH-->


<div id="content_inside">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<th align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></th>
  		<th>名稱</th>
		

		
		<th>排序</th>

		
		<th>狀態</th>
		<th>建立時間</th>
		<th>維護時間</th>
		
		

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
	  
	  
	  <td align="left" ><A href="#" onclick="checkAction('<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
','U');"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['show_text'];?>
</A></td>
	  
	  
 	  <td align="left">
	  <input type="text" name="sort<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" id="sort<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['id'];?>
" size="2" 
	  value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['sort'];?>
" >&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['up_icon'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['down_icon'];?>

	  </td>
	 
	  
	  <td align="center">
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
	  
	  <td align="center"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['create_date'];?>
</td>
	  
	  <td align="center"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_name'];?>
 於 <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['update_date'];?>
</td>
	  
	  

    </tr>
    <?php endfor; endif; ?>
	
  </table>

<br>
<!--page列 start-->
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
</div>
</div>

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->

	


<?php } elseif ($_smarty_tpl->tpl_vars['act']->value=="add"||$_smarty_tpl->tpl_vars['act']->value=="edit") {?>
<div class="col-02"><!-- 右邊內容區塊 -->
       <div class="right-main">
       
<div class="content-box" id="content_bg">
	<h2 class="funtion-title"><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
<!-- 頁面標題 -->         </h2>
    <div class="page-tool">
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
&s_query=<?php echo $_smarty_tpl->tpl_vars['s_query']->value;?>
"><img src="images/icon14.png" width="32" height="32" alt="返回"/><?php echo $_smarty_tpl->tpl_vars['setup']->value['BackBtn'];?>
</a>
    <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a href="Javascript:$('#form').submit();" ><img src="images/icon05.png" width="32" height="32" alt="儲存"/><?php echo $_smarty_tpl->tpl_vars['setup']->value['SaveBtn'];?>
</a><?php }?>
     </div>
       <!--div id="title"-->
     
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
		 
		 
		 
<!--
          <tr>
            <td align="right" class="table_content_left">品牌介紹：</td>
            <td align="left" class="table_content_left">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['detail_fck'];?>

			</td>
          </tr>
-->
		 
		 
		 

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



<?php if ($_smarty_tpl->tpl_vars['data']->value['depth']==$_smarty_tpl->tpl_vars['jdata']->value['pic_depth']) {?>
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
						alert("圖片選擇超出數量");
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
					$('#piclist').append('<div class="ui-state-default" id="picspan_'+div_file+'"><div style="float:right;">此圖片尚未存檔</div></div>');//--增加一個選項
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
					$('input[type="hidden"][name="pic"],input[type="hidden"][name="name"],input[type="hidden"][name="href"]').remove();
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


    <div id="dropDIV" class="dropDIV" dragenter="dropHandler(event)" draggable="dropHandler(event)" ondragover="$(this).css('border','dashed 2px red');dragoverHandler(event);" ondrop="dropHandler(event)" onMouseOut="$(this).css('border','dashed 2px gray');" style="text-align: center;margin: auto; border: dashed 2px gray;">
    拖曳圖片到此處上傳 <BR>( IE瀏覽器不支援 請使用上傳套件上傳 )
    <div id="up_progress" ></div> <script></script>
    
    <div style="text-align:left;">
    <div id="fileQueue_list"></div>
    <?php echo $_smarty_tpl->tpl_vars['data']->value['edmpic'];?>
 <BR>
<input type="file" name="uploadify" id="uploadify"/>
	<BR />
	<?php if ($_smarty_tpl->tpl_vars['data']->value['uploadfilemax']>1) {?><a href="javascript:$('#uploadify').uploadifyUpload()">批次上傳圖片</a>&nbsp;|&nbsp;<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['uploadfilemax']>1) {?><a href="javascript:$('#uploadify').uploadifyClearQueue()">取消</a>&nbsp;|&nbsp;<?php }?>建議比例:<?php echo $_smarty_tpl->tpl_vars['data']->value['pic_size_title'];?>
<BR />
    </div>
    
    </div>
    <script>var file_upload = '?upload=<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
';var drag_count = <?php echo $_smarty_tpl->tpl_vars['data']->value['uploadfilemax'];?>
;</script>
    <script src="../includes/project/js/drag_file.js"></script>
    
	</td>
	</tr>
    
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
</div>
</div>


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
