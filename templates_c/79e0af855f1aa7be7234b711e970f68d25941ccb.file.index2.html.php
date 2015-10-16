<?php /* Smarty version Smarty-3.1.18, created on 2014-07-28 09:20:10
         compiled from "D:\AppServ\www\jaln\templates\index2.html" */ ?>
<?php /*%%SmartyHeaderCode:1055453d5a54adcd8a8-48691248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79e0af855f1aa7be7234b711e970f68d25941ccb' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\templates\\index2.html',
      1 => 1398336161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1055453d5a54adcd8a8-48691248',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53d5a54b2ed383_90767133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d5a54b2ed383_90767133')) {function content_53d5a54b2ed383_90767133($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']==null) {?>
<div class="edm">
  <!-- Then somewhere in the <body> section -->
<div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['edm'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['name'] = 'edm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['EDM']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['edm']['total']);
?>
        <a><img src="upload/EDM/<?php echo $_smarty_tpl->tpl_vars['data']->value['EDM'][$_smarty_tpl->getVariable('smarty')->value['section']['edm']['index']];?>
" alt="" title="" /></a>
    <?php endfor; endif; ?>
    </div>
</div>

<!-- Finally you need to hook up your script using the $(window).load() function -->

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider( {
        effect: 'random' // Specify sets like: 'fold,fade,sliceDown'
	});
});
</script>

<!--<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider( {
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script> -->


</div>
<div class="wrapper">
  <div class="inews">
    <div class="inews-title"><a href="index.php?class=news"><img src="images/inews-title.png" alt="資訊快遞 NEWS" width="720" height="18" border="0"></a></div>
    <div class="inews-list">
      <ul>
      	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
        <li><a href="index.php?class=news&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
"><img src="<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['new_type']==2) {?>images/icon-special.png<?php } else { ?>images/icon-message.png<?php }?>" alt="特價" width="52" height="16" vspace="7" border="0" align="absmiddle">　<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['name'];?>
</a></li>
        <?php endfor; endif; ?>
        <!--<li><a href="news-detail.html"><img src="images/icon-message.png" alt="特價" width="52" height="16" vspace="7" border="0" align="absmiddle">　凸顯數位印刷優勢 : 少量多樣的突破</a></li>-->
      </ul>
    </div>
  </div>
  <div class="upload"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['button'][0]['detail'];?>
"><img src="images/upload.png" alt="UPLOAD 檔案上傳" width="225" height="119"></a></div>
</div>
<script>
$(document).ready(function(){
	  window.setTimeout("edm_bug()",100);
});
function edm_bug(){
	$('.nivo-controlNav').attr('style','position:absolute;right:65px;bottom:5px;z-index:9999;text-align: center;padding:0;margin:0;');
}
</script>


<?php } elseif ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='news') {?>




<div class="wrapper">
<img src="images/title-news.png" alt="最新消息 News" width="1000" height="124" border="0">
  <div class="maincontent">
    <div class="sidebar"><img src="images/sb-news-pic.jpg" width="220" height="550"></div>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['id']==null) {?>
    <div class="main">
      <div class="title">資訊快遞</div>
      <div style="height:20px;"></div>
      <div class="news">
        <div class="news-list">
          <ul>
          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['op'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['op']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['name'] = 'op';
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['op']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['op']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['op']['total']);
?>
            <li><img src="<?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['op']['index']]['new_type']==2) {?>images/icon-special.png<?php } else { ?>images/icon-message.png<?php }?>" alt="特價" width="52" height="16" vspace="7" border="0" align="left"><a href="?class=news&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['op']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['op']['index']]['name'];?>
</a></li>
            <?php endfor; endif; ?>
          </ul>
        </div>
        <div style="clear:both;"></div>
        <div class="page"><?php echo $_smarty_tpl->tpl_vars['data']->value['page_first'];?>
  <?php echo $_smarty_tpl->tpl_vars['data']->value['page1'];?>
  <?php echo $_smarty_tpl->tpl_vars['data']->value['page2'];?>
  <?php echo $_smarty_tpl->tpl_vars['data']->value['page3'];?>
  <?php echo $_smarty_tpl->tpl_vars['data']->value['page_after'];?>
</div>
      </div>
    </div>
    
    <?php } else { ?>
    
    <div class="main">
      <div class="title">資訊快遞</div>
      <div style="height:20px;"></div>
      <div class="news">
        <div class="news-list">
          <ul>
            <li><img src="<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['new_type']==2) {?>images/icon-special.png<?php } else { ?>images/icon-message.png<?php }?>" alt="特價" width="52" height="16" vspace="7" border="0" align="left"><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</a></li>
          </ul>
        </div>
        <div style="clear:both;"></div>
        <div class="news-txt">      
		<?php if ($_smarty_tpl->tpl_vars['data']->value['one']['detail']==null) {?>暫無內容<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'];?>
<?php }?>
      <div align="right" class="back-bn"><a href="javascript:window.history.back(-1);">Back</a></div>
        </div>
      </div>
    </div>
    
    <?php }?>
  </div>
</div>




<?php } else { ?>


<div class="wrapper">
<img src="images/<?php echo $_smarty_tpl->tpl_vars['data']->value['title_img'];?>
" width="1000" height="124" border="0">
  <div class="maincontent">
    
    <div class="sidebar">
      <ul>
      	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']!='product') {?>
       	 <li><a href="index.php?class=<?php echo $_smarty_tpl->tpl_vars['data']->value['pageget']['class'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id']==$_smarty_tpl->tpl_vars['data']->value['pageget']['id']) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['name'];?>
</a>
        <?php } else { ?>	
         <li><a href="javascript:openmenu('#bnid_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
');"><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['name'];?>
</a>
          <ul id="bnid_<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['id'];?>
" style="display:none;">
          	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['name'] = 'menu2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_list']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu2']['total']);
?>
            <li><a href="index.php?class=product&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu2']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['id']==$_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu2']['index']]['id']) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu']['index']]['menu_list'][$_smarty_tpl->getVariable('smarty')->value['section']['menu2']['index']]['name'];?>
</a></li>
            <?php endfor; endif; ?>
          </ul>
        <?php }?>
        </li>
        <?php endfor; endif; ?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='qa') {?>
       	 <li><a href="index.php?class=qa&id=files_main" <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['id']=='files_main') {?> class="active"<?php }?>>檔案規範</a>
        </li>
        <?php }?>
      </ul>
    </div>
    <script>
		function openmenu(bj){
			if ($(bj).css('display')=='block'){
				$(bj).css('display','none');
				$(bj).parent().find('a:eq(0)').css('background','url(images/icon.png) no-repeat 7px 15px');//-- 選到的改變class
			}else{
				$(bj).css('display','block');
				$(bj).parent().find('a:eq(0)').css('background','url(images/icon-active.png) no-repeat 7px 15px');
			}
		}
	</script>
    
    <?php if ($_smarty_tpl->tpl_vars['data']->value['pageget']['pid']==null&&$_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='product') {?><!--判斷為product參數有項目頁-->
    <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</div>
      
      <div class="prodlist">
        <ul>
        	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pro'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['name'] = 'pro';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['product']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total']);
?>
          <li><a href="?class=product&pid=<?php echo $_smarty_tpl->tpl_vars['data']->value['product'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']]['id'];?>
"><img src="upload/product/<?php echo $_smarty_tpl->tpl_vars['data']->value['product'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']]['title_pic'];?>
" width="220"><br>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['product'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']]['name'];?>
</a></li>
            <?php endfor; endif; ?>
        </ul>
      </div>
    <div style="clear:both;"></div>
        <div class="page"><?php if ($_smarty_tpl->tpl_vars['data']->value['page2']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['page_first'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page1'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page2'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page3'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page_after'];?>
<?php }?></div>
        
     <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['pageget']['pid']!=null&&$_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='product') {?>
     
     
     <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['class_name'];?>
</div>
      <div class="proddetail">
        <div class="prod-brief"><img src="upload/product/<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['pic'];?>
" width="330" border="0" align="left" class="imgLarge">
          <div class="prod-name"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</div>
          <div class="prod-brief-desc">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'][0];?>

          </div>
          <div style="clear:both; border-bottom:dotted 1px #999; height:20px; margin-bottom:20px;"></div>
          <div>
           <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'][1];?>

          </div>
          <table width="100%" border="0" cellspacing="1" cellpadding="5" class="download">
            <tbody>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['one']['file']!=null) {?>
            <tr bgcolor="#dddddd">
              <td width="6%" align="center"><img src="images/icon-pdf.png" width="39" height="31"></td>
              <td width="81%"><a href="upload/product/<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file'];?>
</a></td>
              <td width="13%"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['file_size'];?>
</td>
            </tr>
            <?php }?>
          </tbody></table>
        </div>
      </div>

     
     
     
     
     <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='history_case') {?> <!--歷史案件區塊-->
     
     
     <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</div>
      <div class="caselist">
        <ul>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pro'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['name'] = 'pro';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['pro']['pic']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pro']['total']);
?>
        	<?php if ($_smarty_tpl->tpl_vars['data']->value['pro']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']]!=null&&$_smarty_tpl->tpl_vars['data']->value['pro']['status'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']]==1) {?>
          <li><a href="upload/history_case/<?php echo $_smarty_tpl->tpl_vars['data']->value['pro']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']];?>
" rel="lightbox[ASSEMBLING]" title="Lightbox"><img src="upload/history_case/<?php echo $_smarty_tpl->tpl_vars['data']->value['pro']['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']];?>
" width="220"></a><br>
            <span class="case-name"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro']['b_name'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']];?>
</span><br>
<span class="case-desc"><?php echo $_smarty_tpl->tpl_vars['data']->value['pro']['detail'][$_smarty_tpl->getVariable('smarty')->value['section']['pro']['index']];?>
</span></li>
			<?php }?>
		<?php endfor; endif; ?>
        </ul>
      </div>
    <div style="clear:both;"></div>
    
         <div class="page"><?php if ($_smarty_tpl->tpl_vars['data']->value['page2']!=null) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['page_first'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page1'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page2'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page3'];?>
　　<?php echo $_smarty_tpl->tpl_vars['data']->value['page_after'];?>
<?php }?></div>
     
     <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['pageget']['class']=='qa'&&$_smarty_tpl->tpl_vars['data']->value['pageget']['id']=='files_main') {?>
       <div class="main">
      <div class="title">檔案規範</div>
			 <style type="text/css">.wd_font_01{margin:20px 0;}
              .wd_font_02{font:18px/32px "微軟正黑體"; color:#069; background:#efeded url(images/icon2.png) no-repeat left center; padding-left:25px; margin-bottom:10px;}
              .wd_font_03{font:13px/24px Arial; color:#575656; margin-bottom:2em;}
              .wd_font_04{font:15px/30px "微軟正黑體"; color:#c00; padding:20px; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px; background:#efeded; border:solid 1px #dcdcdc; margin-bottom:70px;}
        </style>
        <div class="wd_font_01">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['d'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['d']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['name'] = 'd';
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['files']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['d']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['d']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['d']['total']);
?>
        <div class="wd_font_02" onclick="qalist('div_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['d']['index'];?>
')"><?php echo $_smarty_tpl->tpl_vars['data']->value['files'][$_smarty_tpl->getVariable('smarty')->value['section']['d']['index']]['name'];?>
</div>
        
        <div class="wd_font_03" id="div_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['d']['index'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['files'][$_smarty_tpl->getVariable('smarty')->value['section']['d']['index']]['detail'];?>
</div>
        <?php endfor; endif; ?>
         </div>
        <div class="wd_font_04">本公司對於製作物內容不負任何法律責任，下單前請確認是否有觸法及版權問題。<br>
本公司保留變更上述內容之權利。<br>
如有任何爭議，馬基數位印刷有限公司保留最終決定權。</div>
        <script>
        $('.wd_font_01 .wd_font_02').css('cursor','pointer');
        $('.wd_font_01 .wd_font_03').css('display','none');
        function qalist(obj){
        if ($('#'+obj).css('display')!='none') $('#'+obj).css('display','none'); else $('#'+obj).css('display','block');
        }
        </script>
     <?php } else { ?>
     <div class="main">
      <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
</div>
     <?php echo $_smarty_tpl->tpl_vars['data']->value['one']['detail'];?>

	<?php }?>      
    
    </div>
    <div style="clear:both;"></div>
  </div>
</div>




<?php }?><?php }} ?>
