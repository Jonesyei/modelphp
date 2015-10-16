<?php /* Smarty version Smarty-3.1.18, created on 2014-05-15 18:12:18
         compiled from "D:\AppServ\www\jaln\serback\templates\Sample_template.html" */ ?>
<?php /*%%SmartyHeaderCode:31697537493027e4ec8-15225188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c55aa1acb82ed563cef37b4d790a3eb0450b843' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\Sample_template.html',
      1 => 1340248870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31697537493027e4ec8-15225188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'record' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53749302dccca3_68605821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53749302dccca3_68605821')) {function content_53749302dccca3_68605821($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['record']->value['act']=="page") {?>
<div class="pagination quotes">
	<ul>
	
	<li style="float:left;"><?php echo $_smarty_tpl->tpl_vars['record']->value['info'];?>
</li>
	
	<?php if ($_smarty_tpl->tpl_vars['record']->value['now_page']!=1) {?>
	<li><a href="Javascript:location='<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
&page=1'">第一頁</a></li>
	<li><a href="Javascript:<?php echo $_smarty_tpl->tpl_vars['record']->value['pre_url'];?>
">上一頁</a></li>	
	<?php } else { ?>
	<li class="disabled">第一頁</li>
	<li class="disabled">上一頁</li>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['name'] = 'idx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['record']->value['page_num']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total']);
?>
	<?php echo $_smarty_tpl->tpl_vars['record']->value['page_num'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['url'];?>

	<?php endfor; endif; ?>  

	<?php if ($_smarty_tpl->tpl_vars['record']->value['now_page']!=$_smarty_tpl->tpl_vars['record']->value['total_page']) {?>
	<li><a href="Javascript:<?php echo $_smarty_tpl->tpl_vars['record']->value['next_url'];?>
">下一頁</a></li>
	<li><a href="Javascript:location='<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['record']->value['total_page'];?>
'">最後一頁</a></li>	

	<?php } else { ?>
	<li class="disabled">下一頁</li>
	<li class="disabled">最後一頁</li>		
	<?php }?>
	<li><input type="text" size="2"  onkeydown="jump(event,'<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
',this.value);" /></li>
	
	<li style="float:right;"><?php echo $_smarty_tpl->tpl_vars['record']->value['info2'];?>
</li>
	</ul>
	
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="left_menu") {?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['name'] = 'idx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['record']->value['data']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total']);
?>
<li class="global_nav"><a class="menu" href="Javascript:toggle_menu('submenu<?php echo $_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['Level'];?>
')"><?php echo $_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['name'];?>
</a></li>

<ul class="sub" style="display: none; text-align: left;" id="submenu<?php echo $_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['Level'];?>
">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['name'] = 'idx2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['sub_menu']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx2']['total']);
?>
<li><a class="menu" href="<?php echo $_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['sub_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['idx2']['index']]['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['record']->value['data'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['sub_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['idx2']['index']]['name'];?>
</a></li>
<?php endfor; endif; ?>
</ul>
<?php endfor; endif; ?>
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="upload_file_page") {?>
<div id="<?php echo $_smarty_tpl->tpl_vars['record']->value['file_queue'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['record']->value['queue_class'];?>
" ></div> 
<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
" />
<p>
<input type="button" name="upload_btn" id="upload_btn" value="上傳" onclick="$('#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
').uploadifyUpload();" style="width:50px;" class="selfbtn" />
&nbsp;&nbsp;&nbsp;
<input type="button" name="cancel_btn" id="cancel_btn" value="取消" onclick="$('#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
').uploadifyClearQueue();"  style="width:50px;" class="selfbtn"/>
<input type="hidden" name="edit_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
" id="edit_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
" />
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count" id="<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['current_file_count'];?>
" />
</p>
<div id="file_gelley_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
">

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['name'] = 'idx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['record']->value['exist_file']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total']);
?>
<div id="<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['record']->value['exist_file'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['idx'];?>
" class="upload_file_div">
	<div class="<?php echo $_smarty_tpl->tpl_vars['record']->value['exist_file'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['class'];?>
">
	<?php echo $_smarty_tpl->tpl_vars['record']->value['exist_file'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['upload_item'];?>

	</div>
	<a href="Javascript:del_file('<?php echo $_smarty_tpl->tpl_vars['record']->value['exist_file'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['file'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['record']->value['exist_file'][$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['idx'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
')" \>刪除</a>	
</div>
<?php endfor; endif; ?>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$("#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
").uploadify( {
		"uploader"       : "<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/uploadify/uploadify.swf",
		"script"         : "<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/uploadify/uploadify.php",
		"cancelImg"      : "images/cancel.png",
		"folder"         : "<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
",
		"buttonImg"		 : "<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/uploadify/browse.jpg",
		"queueID"        : "<?php echo $_smarty_tpl->tpl_vars['record']->value['file_queue'];?>
",
		"fileDesc"       : "<?php echo $_smarty_tpl->tpl_vars['record']->value['file_type'];?>
",
		"fileExt"        : "<?php echo $_smarty_tpl->tpl_vars['record']->value['file_type'];?>
",	
		"auto"           : false,
		"multi"          : <?php echo $_smarty_tpl->tpl_vars['record']->value['multi'];?>
,
		"queueSizeLimit" : 99, 
		"sizeLimit" 	 : <?php echo $_smarty_tpl->tpl_vars['record']->value['maxSize'];?>
,
		"onSelectOnce"   : function(e,data){
								
								if("<?php echo $_smarty_tpl->tpl_vars['record']->value['multi'];?>
"=="false")
								{
									if($("#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count").val()>=1)
									{
										alert("您上傳的檔案數量已達上限，請確認。");
										$('#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
').uploadifyClearQueue();
									}
								}
								else
								{
									if($("#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count").val()>=99)
									{
										alert("您上傳的檔案數量已達上限，請確認。");
										$('#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
').uploadifyClearQueue();
									}								
								}
						   },		
		"onComplete"     : function(e,queueId,fileObj,response,data){
						   
						   		if(response=="error")
								{
									alert("上傳失敗，檔案超過限制(<?php echo $_smarty_tpl->tpl_vars['record']->value['maxSize'];?>
KB)，請確認。");
								}
								else if(response!="")
								{
									var file_name=response;
									var img_div="<div id=\"file_div"+queueId+"\" class=\"upload_file_div\">"; 
									
									//單筆上傳時呈現
									if("<?php echo $_smarty_tpl->tpl_vars['record']->value['multi'];?>
"=="false")
									{
										var file_ext=file_name.split(".")[1];
										img_div+="<div class=\"single\">";
										if(file_ext=="mp4" || file_ext=="flv")
										{
											img_div+="<object id=\"player\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" name=\"player\" width=\"253\" height=\"240\" wmode=\"opaque\"><param name=\"wmode\" value=\"opaque\" /><param name=\"movie\" value=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/jwplayer/player.swf\" /> <param name=\"allowfullscreen\" value=\"true\" /> <param name=\"allowscriptaccess\" value=\"always\" /><param name=\"flashvars\" value=\"file=<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"+file_name+"\" /><embed type=\"application/x-shockwave-flash\" id=\"player2\" name=\"player2\" src=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/jwplayer/player.swf\" width=\"253\" height=\"240\" allowscriptaccess=\"always\" allowfullscreen=\"true\" flashvars=\"file=<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"+file_name+"\" /></object>";
										}
										else if(file_ext=="wmv")
										{
												img_div +="<div name=\"player"+queueId+"\" id=\"player"+queueId+"\"></div>";
												img_div +="<script>";
												img_div +="var cnt = document.getElementById(\"player"+queueId+"\");";
												img_div +="var src = \"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
includes/js/jwplayer/wmvplayer.xaml\";";
												img_div +="var cfg = {file:\"<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"+file_name+"\",height:\"240\",width:\"253\"};";
												img_div +="var ply = new jeroenwijering.Player(cnt,src,cfg);";
												img_div +="<\/script>";
										
										}
										else if(file_ext=="jpg" || file_ext=="jpeg" || file_ext=="png" || file_ext=="gif")
										{
											img_div+="<a href=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"\" target=\"_blank\"><img src=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"\" style=\"max-width: 400px;\" border=\"0\"  ></a>";												
											
										}
										else
										{
											img_div+="<a href=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"\" target=\"_blank\">下載檔案</a>";										
										}
										//end 檔案格式判斷

										img_div+="<br><a href=\"Javascript:del_file('<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"','file_div"+queueId+"','<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
')\">刪除</a></div>";										
										
									}//end 單筆上傳
									else	//多筆上傳呈現
									{
										img_div+="<div class=\"multi\">";
											img_div+="<a href=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"\" target=\"_blank\"><img src=\"<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"\"  width=\"80\" border=\"0\"  ></a></div>";

											img_div+="<br><a href=\"Javascript:del_file('<?php echo $_smarty_tpl->tpl_vars['record']->value['path'];?>
upload/<?php echo $_smarty_tpl->tpl_vars['record']->value['floder'];?>
/"+file_name+"','file_div"+queueId+"','<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
')\">刪除</a></div>";										
											
									}
									
									
									$("#file_gelley_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
").append(img_div);
									$("#"+queueId).hide().fadeIn();
									$("#edit_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
").attr("value",$("#edit_<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
").val()+","+file_name+",");
									
									
									$("#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count").attr("value",parseInt($("#<?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
_count").val())+1);
									
									
								}//end response不為空
						   
						   }//end onComplete function

	} );//end  uploadify
});//end document ready


</script>	
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="customer_list") {?>
      <tr id="daily_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
">
		<td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['tel'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['name'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['visiter'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo nl2br($_smarty_tpl->tpl_vars['record']->value['data']['detail']);?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['upload_file'];?>
</td>
	    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">
		<input name="edit_btn" type="button" class="wd_01" id="edit_btn" value="修改" onclick="fill_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
);" />
        <input name="del_btn" type="button" class="wd_01" id="del_btn" value="刪除" onclick="edit_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
','del',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
)" /> 
        </td>
	  </tr>
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="customer_event_list") {?>
      <tr id="daily_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
">
		<td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['name'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['price'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['reason'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['detail'];?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['upload_file'];?>
</td>
	    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">
		<input name="edit_btn" type="button" class="wd_01" id="edit_btn" value="修改" onclick="fill_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
);" />
        <input name="del_btn" type="button" class="wd_01" id="del_btn" value="刪除" onclick="edit_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
','del',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
)" /> 
        </td>
	  </tr>	
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="customer_problem_list") {?>
      <tr id="daily_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
_<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
">
		<td bgcolor="#FFFFFF"><?php echo nl2br($_smarty_tpl->tpl_vars['record']->value['data']['detail']);?>
</td>
		<td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['upload_file'];?>
</td>
	    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">
		<input name="edit_btn" type="button" class="wd_01" id="edit_btn" value="修改" onclick="fill_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
);" />
        <input name="del_btn" type="button" class="wd_01" id="del_btn" value="刪除" onclick="edit_data('<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['customer_type'];?>
','del',<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['id'];?>
)" /> 
        </td>
	  </tr>	  	    
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="create_mail_page") {?>

	<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="white">
		<tr>
			<td colspan="2" class="deta_list_02">發送E-Mail <span style="float:right; cursor:pointer;" onclick="Cancel_BlockUI();">&nbsp;&nbsp;X&nbsp;&nbsp;</span></td>
		</tr>
		<tr>
		  <td width="21%" class="deta_list_01">發送給</td>
	      <td width="79%" class="deta_list_01" align="left" style="word-break:break-all"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['email'];?>
</td>
	  </tr>
		<tr>
		  <td class="deta_list_01">內容</td>
		  <td class="deta_list_01" align="left"><label>
		    <textarea name="mail_content" cols="40" rows="5" id="mail_content"></textarea>
		  </label></td>
	  </tr>
		<tr>
		  <td class="deta_list_01">&nbsp;</td>
		  <td class="deta_list_01" align="left"><label>
		    <input type="button" name="send_mail_btn" id="send_mail_btn" value="發送" onclick="sending();" />
		    <input name="mail_to" type="hidden" id="mail_to" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['email'];?>
" />
		  </label></td>
	  </tr>
	</table>
<script>
function sending()
{
	if($("#mail_content").val()=="")
	{
		alert("請輸入內容");
		return;
	}
	else
	{
			$("#mail_content").attr("disabled","disabled");
			$("#send_mail_btn").attr("disabled","disabled").attr("value","發送中...請勿重新整理頁面");
			$.getJSON("ajax_get_data.php", {act:"send_mail" , email:"<?php echo $_smarty_tpl->tpl_vars['record']->value['data']['email'];?>
", content:$("#mail_content").val()}, 
				function(json){
					if(json.isPass==1)
					{
						alert("發送完成");
						Cancel_BlockUI();
					}				
					else
					{
						alert(json.msg);
					}
				}
			);		
	}
}
</script>
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value['act']=="create_export_page") {?>
<style>
.each{
	width:110px;
	float:left;
	text-align:left;
}
</style>
<form action="" method="post" enctype="multipart/form-data" name="edit_form" id="edit_form" > 
<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="white">
		<tr>
			<td colspan="2" class="deta_list_02">匯出報表<span style="float:right; cursor:pointer;" onclick="Cancel_BlockUI();">&nbsp;&nbsp;X&nbsp;&nbsp;</span></td>
		</tr>
		<tr>
		  <td width="21%" class="deta_list_01">時間</td>
	      <td width="79%" class="deta_list_01" align="left" style="word-break:break-all"><?php echo $_smarty_tpl->tpl_vars['record']->value['data']['date_menu'];?>
</td>
	  </tr>
		<tr>
		  <td class="deta_list_01">匯出欄位</td>
		  <td class="deta_list_01" align="left">
		  <?php if ($_smarty_tpl->tpl_vars['record']->value['data']['type']=="member") {?>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="帳號" /> 帳號</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="密碼" /> 密碼</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="姓名" /> 姓名</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="性別" /> 性別</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="出生日期" /> 出生日期</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="子女人數" /> 子女人數</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收入" /> 收入</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="偏好商品" /> 偏好商品</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="地址" /> 地址</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="手機" /> 手機</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="電話(日)" /> 電話(日)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="電話(夜)" /> 電話(夜)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="累積紅利" /> 累積紅利</div> 
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="消費筆數" /> 消費筆數</div> 
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="消費金額" /> 消費金額</div> 
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="退貨筆數" /> 退貨筆數</div> 
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="狀態" /> 狀態</div> 
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="備註" /> 備註</div> 
		  <?php } else { ?>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="訂單編號" /> 訂單編號</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="訂單日期" /> 訂單日期</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="會員姓名" /> 會員姓名</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="帳號" /> 帳號</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="訂單狀態" /> 訂單狀態</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="付款方式" /> 付款方式</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="運送方式" /> 運送方式</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="發票樣式" /> 發票樣式</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="金額" /> 金額</div>

		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件姓名" /> 寄件姓名</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件手機" /> 寄件手機</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件電話(日)" /> 寄件電話(日)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件電話(夜)" /> 寄件電話(夜)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件地址" /> 寄件地址</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="寄件E-Mail" /> 寄件E-Mail</div>
		  
		  		  
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收件姓名" /> 收件姓名</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收件手機" /> 收件手機</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收件電話(日)" /> 收件電話(日)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收件電話(夜)" /> 收件電話(夜)</div>
		  <div class="each"><input type="checkbox" name="field[]" id="field[]" value="收件地址" /> 收件地址</div>
		  		  
		  <?php }?>
		  </td>
	  </tr>
		<tr>
		  <td class="deta_list_01">&nbsp;</td>
		  <td class="deta_list_01" align="left">
		    <input type="submit" name="export_btn" id="export_btn" value="匯出" />
			 <input name="act" type="hidden" id="act" value="export_xls">
		    
		  </td>
	  </tr>
	</table>
</form>
<?php }?><?php }} ?>
