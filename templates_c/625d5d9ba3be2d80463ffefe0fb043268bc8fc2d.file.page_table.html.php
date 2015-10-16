<?php /* Smarty version Smarty-3.1.18, created on 2015-01-12 16:29:21
         compiled from "D:\AppServ\www\shenguyu\serback\templates\page_table.html" */ ?>
<?php /*%%SmartyHeaderCode:1340754b385e15fee51-84338001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '625d5d9ba3be2d80463ffefe0fb043268bc8fc2d' => 
    array (
      0 => 'D:\\AppServ\\www\\shenguyu\\serback\\templates\\page_table.html',
      1 => 1402455810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1340754b385e15fee51-84338001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54b385e16287f9_79353949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b385e16287f9_79353949')) {function content_54b385e16287f9_79353949($_smarty_tpl) {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

      <tr><td>

	

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
			<select name='jump_page'  id='jump_page'  style='vertical-align:middle;width:50px;' 
			onchange="jump( '<?php echo $_smarty_tpl->tpl_vars['page_table']->value['jump_page_url'];?>
',this.value)" >
			
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





	  </td>

      </tr>

    </table>
<?php }} ?>
