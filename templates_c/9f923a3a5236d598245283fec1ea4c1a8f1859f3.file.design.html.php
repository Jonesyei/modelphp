<?php /* Smarty version Smarty-3.1.18, created on 2014-04-30 10:04:11
         compiled from "D:\AppServ\www\margi\serback\templates\design.html" */ ?>
<?php /*%%SmartyHeaderCode:4131536056bb2f2380-64785792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f923a3a5236d598245283fec1ea4c1a8f1859f3' => 
    array (
      0 => 'D:\\AppServ\\www\\margi\\serback\\templates\\design.html',
      1 => 1398823450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4131536056bb2f2380-64785792',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536056bb5425f2_34676780',
  'variables' => 
  array (
    'admin_info' => 0,
    'close' => 0,
    'data' => 0,
    'page_table' => 0,
    'design' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536056bb5425f2_34676780')) {function content_536056bb5425f2_34676780($_smarty_tpl) {?><script src="../includes/js/codemirror.js"></script><!--code編輯器插件-->
<?php if ($_smarty_tpl->tpl_vars['admin_info']->value['view']=='list') {?>
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
  		<td>區塊名稱</td>		
		<?php if ($_smarty_tpl->tpl_vars['close']->value['sort']!=1) {?><td width="10%">排序</td><?php }?>
		<td>狀態</td>
		<td width="15%">建立時間</td>
		<td width="15%">維護時間</td>
		

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
	<li><a href="#tabs-1">設定頁面</a></li>
	<li><a href="#tabs-2">來源參考工具一(<font color="blue">擷取資料來源</font>)</a></li>
    <li><a href="#tabs-3">來源參考工具二(<font color="blue">擷取分類來源</font>)</a></li>
    <!--
    <li><a href="#tabs-3">售價設定</a></li>
    <li><a href="#tabs-4">加購設定</a></li>
    -->
</ul>

<div id="tabs-1">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">

	<tr>
	<td width="120" align="right" > 名稱：</td>
	  <td >
	  <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
"/>
	  </td>
	</tr>

	<?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['type']=='main') {?>
   	<tr>
	<td width="120" align="right" > Head版塊：</td>
	  <td >
	  <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['head_html'];?>

	  </td>
	</tr>
   <?php }?>
   
    <tr>
	<td align="right" >Body版塊：</td>
	  <td >
      <textarea name="detail" id="detail" cols="40"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'];?>
</textarea>
      <link rel="stylesheet" href="../includes/js/codemirror.css">
      <script>
	    var editor = CodeMirror.fromTextArea(document.getElementById('detail'), {
			lineNumbers: true,
			styleActiveLine: true,
			matchBrackets: true
		  });
	  </script>
	   </td>
	</tr>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['type']!='main') {?>
    <tr>
	<td width="120" align="right" > 主板插入標籤：</td>
	  <td >
	  		<<?php ?>%file=<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
%<?php ?>>
	  </td>
	</tr>
    <?php } else { ?>
    <tr>
	<td width="120" align="right" > 主板路徑：</td>
	  <td >
	  		<a href="../index2.php?ban=<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
" target="_blank">index2.php?ban=<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['id'];?>
</a>
	  </td>
	</tr>
    <?php }?>
</table>
</div>




<div id="tabs-2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<tr>
	<td align="right" width="120">選擇資料項目：</td>
	  <td >
      	來源:
		<select id="data_type" onchange="data_type_select(this)">
        </select>
        模組編號:
        <input type="text" id="mode_num" value="1" size="2">
        <div id="data_type_div"></div>
        <br>
        <div>
        <font color="#009900">多筆資料設定</font><br>
        <input type="checkbox" value="1" id="data_pick">是否為循環資料<br>
        <input type="text" value="0" size="4" id="data_count">限制循環數量
        </div>
        <br><br>標籤內容<br>
        <textarea id="n_code" rows="10" cols="40"></textarea><br>
        <input type="button" value=" 產生代碼 " onclick="create_code()"><br><br>
        <div id="code_div">
        </div>
        
	   </td>
	</tr>
</table>
<script>
var data_type = '#data_type';
var data_type_div ='#data_type_div';
var design = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['design']->value;?>
');
var n_code = '#n_code';
var mode_num = '#mode_num';
</script>
<script src="design.js"></script>
</div>


<div id="tabs-3">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content" style="border-bottom:none;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
	<tr>
	<td align="right" width="120">設置：</td>
	  <td >
      	分類模塊編號:
        <input type="text" id="class" value="1" size="2"> 限制層數 <input type="text" id="depth" value="-1">
        <div id="class_div">
        </div>
        <br>
		連結主版網址 [請於主版面設置頁面內擷取該網址](ex:index.php?ban=1)<br>
        <input type="text" id="class_url"><br>
        <input type="checkbox" value="1" id="class_pick">是否為循環資料
        <br><br>標籤內容<br>
        <textarea id="class_n_code" rows="10" cols="40"></textarea><br>
        <input type="button" value=" 產生代碼 " onclick="class_create_code()"><br><br>
        <div id="class_code_div">
        </div>
        
	   </td>
	</tr>
</table>
<script>
var class_obj = '#class';
var class_div = '#class_div';
var class_url = '#class_url';
var class_depth = '#depth';
var class_n_code = '#class_n_code';
</script>
<script src="design2.js"></script>
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
//	if ($('#p2').val()!=$('#p1').val()) return alert('兩次所輸入的密碼不相符!!');
	$('#form').submit();
}
</script>

<?php }?><?php }} ?>
