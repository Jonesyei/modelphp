<?php /* Smarty version Smarty-3.1.18, created on 2015-11-25 15:52:00
         compiled from "D:\AppServ\www\modelphp\serback\templates\about.html" */ ?>
<?php /*%%SmartyHeaderCode:16614559b5c1240a491-63214556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9371fd394b3f9686efed6267ee47df3b6cd79c65' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\serback\\templates\\about.html',
      1 => 1447988114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16614559b5c1240a491-63214556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_559b5c127c13f5_94703056',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559b5c127c13f5_94703056')) {function content_559b5c127c13f5_94703056($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
        <?php if ($_smarty_tpl->tpl_vars['close']->value['insert']!=1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=0"><img src="images/icon06.png" width="32" height="32" alt="新增"/>新增</a><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onclick="Edit('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&id=')"><img src="images/icon14.png" width="32" height="32" alt=""/>編輯</a><?php }?><!-- 模組新增修改刪除列 -->
        <?php if ($_smarty_tpl->tpl_vars['close']->value['edit']!=1) {?><a onClick="javescript:$('#form').submit();"><img src="images/icon05.png" width="32" height="32" alt="儲存"/>儲存</a><?php }?>
        <a href="javascript:Del('<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['page'];?>
&del_id=');"><img src="images/icon13.png" width="32" height="32" alt="">刪除</a>
         </div>
         


<!--SEARCH-->
         <div class="search-tool" id="search"><!-- 搜尋模組 -->
         <form action="" method="get" id="search_form" name="search_form">

            <table height="19px">
            <tr>
            <td>關鍵字查詢</td>
            <td width="200">
            <input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['keyword'];?>
" />
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
              <img src="images/icon-search.png" width="18" height="18" id="SearchBtn"/>
              </td></tr></table>
         </form>
         </div>
<!--SEARCH-->


<div id="content_inside" style="clear:both;">
<form action="" method="post" id="form" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-style01">
  	<tr>
  		<th align="center" width="60">刪除 <input type="checkbox" id="allbox" name="allbox" 
		onclick="CheckAll('allbox','choose_id')"/></th>

  		<th>標題</th>
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><th>排序</th><?php }?>
		<th>狀態</th>
		<th>建立時間</th>
		<th>維護時間</th>
		

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
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['idex']['index']]['name'];?>
</a></td>
	  
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
  <br>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['page_table_html']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="page-tool-note">排序規則：數字由小字大順序排序1.2.3.4.5 &nbsp;<br>
         更新排序：拖曳該欄位進行排序，或者在排序輸入框中填入位置後存檔</div>
  <input name="act" type="hidden" value="all" />
  </form>
</div><!--div id="content_inside"-->



<script>
var sortnow = '<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][0]['sort'];?>
'*1;//--本頁排序起始值
var sortcount = '<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['idex']['index'];?>
'*1;//--項目數量
var sortmain = ".table-style01"; //-列表主體
var sortrow = ".tr_sort:not(.ui-sortable-placeholder)"; //--可以移動的項目
var sort_act = 0;
  $(function() {
    $( sortmain ).sortable( {items: sortrow} );
    //$( sortmain ).disableSelection();
  });
  
  $(sortmain+' '+sortrow).each(function(idx,obj){
	  $(obj).on("mouseup",function (){
		if (sort_act!=2){
			window.setTimeout("cps()",50);
		}
		sort_act=0;
	  });
	  $(obj).on("mousedown",function (){
		if (sort_act!=2) {sort_act=1;}
	  });
	  $(obj).on("mouseover",function (){ //--滑鼠移入加入顯示黑色方框式樣
			_td_style = "border-bottom:1px solid #000000;border-top:1px solid #000000;";
	 		$(obj).find('td').attr("style",_td_style);
			$(obj).find('td:first').attr("style",_td_style+"border-left:1px solid #000000;");
			$(obj).find('td:last').attr("style",_td_style+"border-right:1px solid #000000;");
	  });
	  $(obj).on("mouseout",function (){ //--滑鼠移出移除所有式樣
			$(obj).find('td').removeAttr("style");
	  });
  });
  function cps(){
  $(sortmain+' '+sortrow).each(function(idx,obj){
	$(obj).find('input[type="text"]').val(sortnow+idx);
  });
  }
</script>



</div><!--div id="content_bg"-->
</div>
</div>
<script>
page_initial('table-style01');
</script>


<!--頁數呈現table-->



</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='detail') {?>
<script language="javascript" src="../includes/js/jquery-ui.js"></script>
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



<form action="" method="post" id="form" name="form" enctype="multipart/form-data" onsubmit="checkform();">
<div id="tabs">
<ul>
	<li><a href="#tabs-1">詳細內容</a></li>
    <!--<li><a href="#tabs-2">按鈕設定</a></li>-->
</ul>

<div id="tabs-1">
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


<?php if ($_smarty_tpl->tpl_vars['data']->value['button']['file']==1) {?>
	<tr>
	<td width="110" align="right" >夾帶檔案：</td>
		  <td id="file">
          <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['file']!=null) {?>已含有檔案 <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file'];?>
 檔案<br> <a href="javascript:del_file();">刪除請點此</a><br><?php }?>
		  <input type="file" name="file" onchange="file_change()" />(上傳建議大小 為 <font color="#FF0000">8</font> MB 以下)
		   </td>
	</tr>
    <script>
	function del_file(){
		if (!confirm('確定刪除檔案')) return;
		$('#file').append('<input type="hidden" name="file" value="">');
		$('form').submit();
	}
	function file_change(){
		$('#file input[type="hidden"]').remove();
	}
	</script>
<?php }?>
    
    <?php echo $_smarty_tpl->tpl_vars['data']->value['order_html'];?>

   
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
    
    
    
    
    <?php if ($_smarty_tpl->tpl_vars['data']->value['button']['size']!=null) {?>
    <tr >
      <td align="right" ><?php if ($_smarty_tpl->tpl_vars['data']->value['button']['title']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['button']['title'];?>
<?php } else { ?>尺寸規格設定<?php }?>：</td>
      <td ><input type="button" value=" 新增 " onclick="size_div_add()">
		<div id="size_div">
        
        </div>
	 </td>
    </tr>
    <script>
	var obj_name_data = '<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['size_name'];?>
';//--資料來源
	var obj_value_data = '<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['size_value'];?>
';//--資料來源
	var obj_name = '<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['size']['name'];?>
';//--物件名稱
	var obj_value = '<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['size']['value'];?>
';//--物件名稱
	var pro_obj = '#size_div';//--容器
	
	$(function() {
    $(pro_obj).sortable();
    $(pro_obj).disableSelection();
	});
	
	
	$(document).ready(function(){
		obj_name_data = obj_name_data.split('|__|');
		obj_value_data = obj_value_data.split('|__|');
		for (aa in obj_name_data)
			if (obj_name_data[aa]!=''&&obj_name_data[aa]!=null)
			$(pro_obj).append('<div id="class_'+aa+'"><input type="text" name="'+obj_name+'[]" value="'+obj_name_data[aa]+'"<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['width'];?>
> : <input type="text" name="'+obj_value+'[]" value="'+obj_value_data[aa]+'"<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['width'];?>
><input type="button" value="刪除" onclick="$(this).parent().remove();"></div>')
	});
	
	function size_div_add(){
		obj_rang = Math.ceil(Math.random()*9999+1); //--1~9999
		for (obji = 0 ;obji<9999;obji++)
			if ($('#size_div #class_'+obj_rang).length<=0) { //--判斷物件是否存在
				$(pro_obj).append('<div id="class_'+obj_rang+'"><input type="text" name="'+obj_name+'[]"<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['width'];?>
> : <input type="text" name="'+obj_value+'[]"<?php echo $_smarty_tpl->tpl_vars['data']->value['button']['width'];?>
><input type="button" value="刪除" onclick="$(this).parent().remove();"></div>');
				break;
			}
	}
	</script>
    <?php }?>
    
    
    
  </table>
	</div><!-- tabs-1 -->
</div>

<br>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-style01">
	 <tr >
      <td align="right" width="150">狀態：</td>
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
<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['design'];?>
" /><?php }?>
	<input name="act" type="hidden" value="submit" />
	<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
" />
    <input name="member_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['admin_info']->value['member']['id'];?>
">
	<?php echo $_smarty_tpl->tpl_vars['data']->value['tages'];?>

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
$('#tabs').tabs();

function checkform(){
	//--絕對路徑連結
	if ($('[name="href[]"]').length>0){
		$('[name="href[]"]').each(function (idx,obj){
			if ($(obj).val()!=null && $(obj).val()!=''){
				if ($(obj).val().split('//').length != 2){
					$(obj).val('//'+$(obj).val());
				}
			}
		});
	}
	if ($('[name="href"]').length>0 && $('[name="href"]').val()!=null && $('[name="href"]').val()!=''){
		if ($('[name="href"]').val().split('//').length != 2){
			$('[name="href"]').val('//'+$('[name="href"]').val());
		}
	}

}

$('#piclist div[class="ui-state-default"][id]').on("mouseup",function(event){
	sort_event = event;
	if (event.srcElement.className!='')
	window.setTimeout("re_sort()",50);
})


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



<?php }?>




<script>
var reponse = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['add_all'];?>
');
$('#pro').on("change",function (){
            $.ajax( {
                url: "ajx.php",
                data: {pidlist:$('#pro').val()},
                type:"GET",
                dataType:'JSON',
                success: function(_return){
					$('#pro_data').html('<option>請選擇商品</option>');
					for (apro in _return){
					 $('#pro_data').append('<option value="'+apro+'">'+_return[apro]["name"]+'</option>')
					}
					reponse = _return;
                }
            });
});
function todiv(d){ //----按鈕加入加價購商品動作
	if (d!=null)
	var avl = d;
	else
	var avl = $('#pro_data').val();

	if (typeof(objid)=="undefined"){
		objid = 0;
	}else{
		objid ++;
	}
	$('#addlist').append('<div id="adclass_'+objid+'"><div>');
	$('#adclass_'+objid).append('<img id="img_'+objid+'" src="../upload/products/'+reponse[avl]["pic"]+'" width="150"><br>'+reponse[avl]['name']+'<br>');
	$('#adclass_'+objid).append('<input type="hidden" name="pic['+objid+']" value="'+reponse[avl]["pic"]+'">');
	$('#adclass_'+objid).append('<input type="hidden" name="detail['+objid+']" value="'+reponse[avl]["id"]+'">');
	$('#adclass_'+objid).append('<input type="button" id="btn_'+objid+'" value="  刪除商品  " onclick="$(this).parent().remove();"><br><br>');
}
</script>
<?php }} ?>
