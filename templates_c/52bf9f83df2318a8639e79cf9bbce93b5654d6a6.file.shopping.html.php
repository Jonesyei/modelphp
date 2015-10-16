<?php /* Smarty version Smarty-3.1.18, created on 2015-10-15 15:30:05
         compiled from "D:\AppServ\www\modelphp\templates\shopping.html" */ ?>
<?php /*%%SmartyHeaderCode:32051561f55fdb51af5-65440302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52bf9f83df2318a8639e79cf9bbce93b5654d6a6' => 
    array (
      0 => 'D:\\AppServ\\www\\modelphp\\templates\\shopping.html',
      1 => 1416885605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32051561f55fdb51af5-65440302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_561f55fdd093c1_90012298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561f55fdd093c1_90012298')) {function content_561f55fdd093c1_90012298($_smarty_tpl) {?><div class="main clearfix">

<div class="col-01">
  <div class="left-work">

  </div>
</div>
   
     <div class="col-02">
      <h2 class="page-title"><img src="images/pages-title-dot.png" width="25" height="25" class="dot">購物車</h2>
      

     <div class="main-box">
     
     <!-- 訂單列表 -->
       <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cart-format">
         <tbody><tr>
	       <th width="5%"><input type="checkbox" id="select_all"></th>
           <th width="120">圖片</th>
           <th>產品名稱                                                      </th>
           <th width="70">數量</th>
           <th width="70">單價 </th>
           <th width="70">小計 </th>
           <th width="50" class="last">&nbsp;</th>
         </tr>
         <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['name'] = 'cl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['car']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total']);
?>
         <tr>
           <td><input type="checkbox" class="del_box" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['shopping_car_list_id'];?>
"></td>
           <td><?php if ($_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['pic'][0]!=null) {?><img src="upload/products/<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['pic'][0];?>
" class="pro-photo"><?php }?></td>
           <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['name'];?>
</a></td>
           <td><input type="text" size="3" onkeyup="this.value=this.value.replace(/\D/g,'');" id="change_<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['shopping_car_list_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['count'];?>
" onblur="change_procount('<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['shopping_car_list_id'];?>
')"></td>
           <td><?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['price2'];?>
</td>
           <td><?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['price2']*$_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['count'];?>
</td>
           <td class="last"><a href="?del=<?php echo $_smarty_tpl->tpl_vars['data']->value['car'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['shopping_car_list_id'];?>
"><img src="images/icon_trash.png" width="22" height="26"></a></td>
         </tr>
         <?php endfor; endif; ?>
       </tbody></table>
       <script>
	   function change_procount($value){
            $.ajax( {
                url: "shopping.php",
                data: {editpro:$value,count:$('#change_'+$value).val(),ajax:1},
                type:"GET",
                dataType:'text',
				async: false,
                success: function(msg){
                    alert(msg);
					window.location.reload();
                }
            });
	   }
	   function class_del(){
		   var temp_str = '';
		   $('input[class="del_box"]').each(function (idx,obj){
				if ($(obj)[0].checked==true){
					if (temp_str!='') temp_str += ',';
					temp_str +=$(obj).val();
				}
			})
		   if (temp_str!='' && confirm('確定要刪除所選取的項目?')){
			   window.location.href='?del='+temp_str;
		   }
	   }
	    $('#select_all').change(function (){all_select();})
	   function all_select(){
		   $('input[class="del_box"]').each(function (idx,obj){
				$(obj)[0].checked=$('#select_all')[0].checked;
			});
	   }
	   </script>
       
       <!-- 小計 -->
       <div class="Subtotal">
          <img src="images/car.png" width="32" height="20" style="vertical-align:middle;"> 運費  : <?php echo $_smarty_tpl->tpl_vars['data']->value['order']['post_fee'];?>
   <span class="price">合計 : $<?php echo $_smarty_tpl->tpl_vars['data']->value['order']['total']+$_smarty_tpl->tpl_vars['data']->value['order']['post_fee'];?>
</span>  <a href="javascript:class_del();">批量刪除<img src="images/icon_trash.png" width="22" height="26"></a>
       </div>
     
     <div style="padding:10px 0 10px 0px; border-bottom:1px #CCC dotted"><a href="javascript:addbox();" class="btn-style03">+ 配件加購</a></div>
     
     <div listbutton="1" style="padding:10px 0 10px 450px; height:50px; clear:both; text-align:">
         <a href="javascript:history.back()" class="btn-style01">回上一步</a> <a href="javascript:pay_on();" class="btn-style02">結  帳</a>
     </div>
     <script>
	 function pay_on(){
		 $('[listbutton]').hide();
		 $('[paytable]').show();
	 }
	 </script>
     
     
     <!--結帳按鈕頁面-->
     <div style="display:none;" paytable="1">
       <h3 class="from-title">
        <img src="images/icon_cart.png" width="20" height="18"> 基本資料 <span class="Comment">*號為必填項目</span>
       </h3>
       
       <div class="cart-forms">
           <ul>
               <li><span class="td-left">* 收件人：</span><span class="td-right"><input id="recive_name" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['name'];?>
"></span></li>
               <li><span class="td-left">* 性別：</span><span class="td-right"><?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['sex_html'];?>
<input id="recive_sex" type="hidden" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['sex'];?>
"></span></li>
               <li><span class="td-left">* 收件地址：</span><span class="td-right"><input id="recive_address" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['address'];?>
"></span></li>
               <li><span class="td-left">* 電話號碼：</span><span class="td-right"><input id="phone" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['phone'];?>
"></span></li>
               <li><span class="td-left">* e-mail：</span><span class="td-right"><input id="recive_email" type="text" class="input-style01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['member_info']['email'];?>
"></span></li>
           </ul>
       </div>
     </div>
     
     <div style="display:none;" paytable="1">
       <h3 class="from-title">
           <img src="images/icon_cart.png" width="20" height="18"> 收件人資料
           <input type="checkbox" name="checkbox" onclick="samedata();" id="checkbox">
           <script>
		   function samedata(){
			   if ($('#checkbox:checked').length>0){
				   $('form input[type="text"]').each(function(idx,obj){
						$(obj).val($('#'+$(obj).attr("name")).val());
					});
				   $('[name="recive_sex"][value="'+$('#recive_sex').val()+'"]')[0].checked = true;
			   }
		   }
		   </script>
          <span class="title-font01">同基本資料 </span><span class="Comment">*號為必填項目</span>
       </h3>
       
       <div class="cart-forms">
       	<form id="form1" action method="post" target="_blank">
           <ul>
               <li><span class="td-left">* 收件人 ：</span><span class="td-right"><input name="recive_name" type="text" class="input-style01" alt="收件人"></span></li>
               <li><span class="td-left">* 性別 ：</span><span class="td-right"><input type="radio" name="recive_sex" value="1" alt="性別">
                 男
                 <input type="radio" name="recive_sex" value="2">
               女</span></li>
               <li><span class="td-left">* 收件地址 ：</span><span class="td-right"><input name="recive_address" type="text" class="input-style01" alt="收件地址"></span></li>
               <li><span class="td-left">* 電話號碼 ：</span><span class="td-right"><input name="phone" type="text" class="input-style01" alt="電話號碼"></span></li>
               <li><span class="td-left">* e-mail ：</span><span class="td-right"><input name="recive_email" type="text" class="input-style01" alt="email"></span></li>
               <li><span class="td-left">* 付款方式 ：</span><span class="td-right">
                 <input type="radio" name="paycardmode" value="3">
                 ATM轉帳
                 <input type="radio" name="paycardmode" value="1" alt="付款方式">
                 線上刷卡
                 <input type="radio" name="paycardmode" value="2">
                 超商代碼付款</span>
               </li>
               <li><span class="td-left">  備註 ：</span><span class="td-right">
                 <textarea name="memo" cols="50" rows="5" class="textarea-style01"></textarea>
               </span></li>
           </ul>
        </form>
       </div>
     </div>
     
     <div paytable="1" style="display:none;padding:10px 0 10px 150px; height:50px; clear:both;"><span style="padding:10px 0 10px 150px; height:50px; clear:both; text-align:">
     <a href="javascript:history.back()" class="btn-style01">回上一步</a></span><a href="javascript:checkform();" class="btn-style02">結  帳</a>
     </div>
     <!--結帳按鈕頁面END-->
     
     
     </div>
     
     
     
     <!-- 加購視窗 -->
     <div class="add-box" style="display:none;">
     	<form id="add_form" method="get">
       <img src="images/btn-close.png" width="16" height="16" class="add-close " onclick="addbox('close')">
       	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['addpro']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
       <h3 class="add-list-title"> <img src="images/icon_cart.png" width="20" height="18"> <?php echo $_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['name'];?>
  </h3>
       <ul class="add-list clearfix">
       		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['product']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
         <li><a href="index.php?class=product&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['product'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id'];?>
" ><img src="upload/products/<?php echo $_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['product'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['pic'][0];?>
" class="prod-img"></a><span class="prod-name">
         <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['product'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['id'];?>
">
         <?php echo $_smarty_tpl->tpl_vars['data']->value['addpro'][$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']]['product'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['name'];?>
</span></li>
         	<?php endfor; endif; ?>
       </ul>
       <?php endfor; endif; ?>
       <div><input type="button" value="確定" onclick="add_form_submit()"><input type="button" value="取消" onclick="addbox('close');"></div>
       </form>
       <script>
	   function add_form_submit(){
		   var temp_qstr='';
		   $('#add_form input[type="checkbox"]:checked').each(function(idx,obj){
				if (temp_qstr!='') temp_qstr +=',';
				temp_qstr += $(obj).val();
			});
		   if ($('#add_form input[type="checkbox"]:checked').length>0 && confirm('您確定要購買這 '+$('#add_form input[type="checkbox"]:checked').length+'商品?')){
			   window.location.href = 'shopping.php?addpro='+temp_qstr;
			}
			addbox('close');
	   }
	   </script>
     </div>
</div>
   
</div>

<script>
var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
var check_array = ['form input']; //--要檢查空值得陣列物件
var erro_msg;
var check_star = 0;
function checkform(){
	erro_msg='';
	for(aa in check_array){
		$(check_array[aa]).each(function(idx,data){
			if ($(data).attr('alt')!=null&&($(data).val()==''||$(data).val()==null)) {
				erro_msg += $(data).attr('alt')+' 欄位不可為空值!!\n';
			}else if ($(data).attr('name')=='recive_email' && !reg.test($(data).val())) {
				erro_msg += $(data).attr('alt') + '格式不正確!!\n';
			}
			if ($(data).attr('alt')!=null&&$(data).attr("type")=='radio'){
				if ($(check_array[aa]+'[name="'+$(data).attr("name")+'"]:checked').length<=0) erro_msg += $(data).attr('alt')+' 必須選擇一項\n';
			}
		 });
	}
	if (erro_msg==''){
		$('#form1').submit();
		window.setTimeout("urlback()",3000);
	}else{
		alert(erro_msg);
	}
	
}
function urlback(){
	window.location.href = '/';
}

function addbox(act){
	switch (act){
		case "close":
			$('.add-box').fadeOut();
		break;
		
		default:
			$('.add-box').fadeIn();
		break;
	}
}
</script><?php }} ?>
