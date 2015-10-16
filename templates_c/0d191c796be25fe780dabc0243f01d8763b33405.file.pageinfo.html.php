<?php /* Smarty version Smarty-3.1.18, created on 2014-05-21 18:18:58
         compiled from "D:\AppServ\www\jaln\serback\templates\pageinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:14916537c7d92afbd91-30950933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d191c796be25fe780dabc0243f01d8763b33405' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\pageinfo.html',
      1 => 1398822758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14916537c7d92afbd91-30950933',
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
  'unifunc' => 'content_537c7d93309293_70011166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537c7d93309293_70011166')) {function content_537c7d93309293_70011166($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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

<table height="19px">
<tr>
<td>關鍵字查詢</td>
<td width="200">
<input type="text" name="keyword" />
<script>
var key_word = '<?php echo $_smarty_tpl->tpl_vars['data']->value['autocomplete'];?>
';
$("[name=keyword]").autocomplete( {
	source:key_word.split(','),
	fillin:true
});
</script>
</td>
<td>
建立日期<input type="text" name="daterange"  readonly size="25" >
<script>Datepick('[name="daterange"]',"range","yyyy.mm.dd");</script>




<select name="s_status" >
	<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['search']['status'];?>

</select>

  
  <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']!=null) {?><input type="hidden" name="class" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['class'];?>
"><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['mode']!=null) {?><input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['mode'];?>
"><?php }?>
  <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['type']!=null) {?><input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['type'];?>
"><?php }?>
  <img src="images/search_btn.jpg" width="50" height="20" id="SearchBtn"/>
  </td></tr></table>
</div>
 </form>

<!--SEARCH-->


<div id="content_inside">
<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
  	<tr bgcolor="#EEEEEE">
  		<td align="right" width="2%"><input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></td>

  		<td>標題</td>
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><td>排序</td><?php }?>
		<td>狀態</td>
		<td>建立時間</td>
		<td>維護時間</td>
		

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
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
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
  $(function() {
    $( ".table_content" ).sortable();
    $( ".table_content" ).disableSelection();
  });
</script>



</div><!--div id="content_bg"-->

<script>
page_initial('table_content');
</script>


<!--頁數呈現table-->

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<script language="javascript" src="../includes/js/jquery-ui.js"></script>
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
	  <li class="back"><a href="javascript:window.history.back(-1);">返回</a></li>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['id']!=null) {?>
      <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><li class="save"><a  onClick="$('#form').submit();">儲存</a></li><?php }?>
	 <?php } else { ?>
	  <?php if ($_smarty_tpl->tpl_vars['close']->value['add']!=1) {?><li class="add"><a onClick="$('#form').submit();">新增</a></li><?php }?>
	<?php }?>
    </ul>
  </div>
  <!--div id="title"-->




<!--SEARCH-->
<!--SEARCH-->



<div id="content_inside">



<form action="" method="post" id="form" name="form" enctype="multipart/form-data">


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['id']!='lang') {?>
	<tr>
	<td width="110" align="right" >標題：</td>
		  <td >
		  <input type="text" name="name"  value="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['name']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['name_default'];?>
<?php }?>" size="48" />
          
        
		   </td>
	</tr>
<?php }?>
	
<?php if ($_smarty_tpl->tpl_vars['data']->value['close']['pic']==null) {?>
<tr>
	<td align="right" >圖片：</td>
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
				'onAllComplete'	:function(event,data) 
				{
					$('form').submit();
				},
				'onComplete'  : function(event, ID, fileObj, response, data)
				{
					var filename = response.split('/');
					filename = filename[filename.length-1];
				 	$('#fileQueue_list').append('<input type="hidden" name="pic[]" value="'+filename+'">');
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?>$('#fileQueue_list').append('<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['name'];?>
:<input type="text" name="name[]" value="在此輸入<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['name'];?>
">');<?php }?>
				 	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>$('#fileQueue_list').append('連結:<input type="text" name="href[]" value="在此輸入連結">');<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['change_detail']!=null) {?>$('#fileQueue_list').append('<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['change_detail'];?>
:<input type="text" name="detail[]" value="在此輸入<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['change_detail'];?>
">');<?php }?>
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
<script>

  $(function() {
    $( "#piclist" ).sortable();
    $( "#piclist" ).disableSelection();
  });


function picdel(d){
	$('#picspan_'+d).remove();
	if ($('#piclist').find("div").html()==null) {
 	$('#fileQueue_list').append('<input type="hidden" name="pic[]" value="">');
	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['name']!=null) {?>$('#fileQueue_list').append('<input type="hidden" name="name[]" value="">');<?php }?>
 	<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['href']=='1') {?>$('#fileQueue_list').append('<input type="hidden" name="href[]" value="">');<?php }?>
	}
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
<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file_url'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
" height="150px">
<input type="hidden" name="pic[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['picidx']['index']];?>
"><br>
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

<div id="fileQueue_list"></div>
<?php echo $_smarty_tpl->tpl_vars['data']->value['edmpic'];?>
 <BR>
<input type="file" name="uploadify" id="uploadify"/>
<BR />
<a href="javascript:$('#uploadify').uploadifyUpload()">批次上傳圖片</a>&nbsp;|&nbsp;<a href="javascript:$('#uploadify').uploadifyClearQueue()">取消</a>&nbsp;|&nbsp;建議比例:1000 x 390<BR />
	</td>
	</tr>
<?php }?>
    <!--
	<tr>
	<td width="110" align="right" >EDM：</td>
		  <td >
          <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['file']!=null) {?><img src="../upload/EDM/<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file'];?>
"><br><?php }?>
		  <input type="file" name="file" />
		   </td>
	</tr>
    <tr>
	<td width="110" align="right" >左下文字區塊：</td>
		  <td >
          	<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail_fck'];?>

		   </td>
	</tr>
    -->
    
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='live'||$_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='b_ds') {?>
    <tr>
	<td width="110" align="right" >相簿首圖：</td>
		  <td >
          <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['file']!=null) {?><img src="../upload/<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['class'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file'];?>
" height="200px"><br><?php }?>
		  <input type="file" name="file" />
		   </td>
	</tr>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['data']->value['button']['detail']=='1') {?>
	<tr >
	  <td  align="right" >內容：</td>
	  <td > 
      <?php if ($_smarty_tpl->tpl_vars['data']->value['button']['fck']=='1') {?>
      <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail_fck'];?>

      <?php } else { ?>
		<textarea rows="5" name="detail" style="width:300px;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'];?>
</textarea>
	  <?php }?>
	  </td>
	</tr>
	<?php }?>
    
    
    <?php echo $_smarty_tpl->tpl_vars['data']->value['order_html'];?>

    
    
	 <tr >
      <td align="right" >狀態：</td>
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
	
	
	<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']!=null) {?><input name="type" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['class'];?>
" /><?php }?>
	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
" />
	<?php echo $_smarty_tpl->tpl_vars['data']->value['tages'];?>


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
