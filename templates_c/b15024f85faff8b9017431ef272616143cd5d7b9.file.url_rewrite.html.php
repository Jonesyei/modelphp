<?php /* Smarty version Smarty-3.1.18, created on 2014-07-22 15:35:18
         compiled from "D:\AppServ\www\jaln\serback\templates\url_rewrite.html" */ ?>
<?php /*%%SmartyHeaderCode:2573853ce09f62fe2d0-80878585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b15024f85faff8b9017431ef272616143cd5d7b9' => 
    array (
      0 => 'D:\\AppServ\\www\\jaln\\serback\\templates\\url_rewrite.html',
      1 => 1406014514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2573853ce09f62fe2d0-80878585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ce09f66de918_72959996',
  'variables' => 
  array (
    'admin_info' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce09f66de918_72959996')) {function content_53ce09f66de918_72959996($_smarty_tpl) {?><script src="../includes/js/codemirror.js"></script><!--code編輯器插件-->
<div id="content_bg">

  <div class="title"><span><?php echo $_smarty_tpl->tpl_vars['admin_info']->value['title'];?>
</span>
    <ul>
	    <li class="back"><a  onClick="window.history.back(-1);">返回</a></li>
        <li class="save"><a  onClick="submitpose();">儲存</a></li>
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
    <li><a href="#tabs-2">使用與說明</a></li>
    <li><a href="#tabs-3">正規表達式</a></li>
</ul>

<div id="tabs-1">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">

<!--
	<tr>
	<td width="120" align="right" > 名稱：</td>
	  <td >
	  <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['one']['name'];?>
"/>
	  </td>
	</tr>
-->
   
    <tr>
	<td width="120" align="right">設定參數：</td>
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

</table>
</div>




<div id="tabs-2">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
      <tr>
    
	<td width="120" align="right" > 使用與說明：</td>
	  <td >
	  		<div class="article-content-inner"><p>
<strong>目錄規則</strong><br>
一般我們將.htaccess文件放置在網站的根目錄，控制所在目錄及所有子目錄，而如果放置在子目錄中，會受上級目錄中.htaccess文件影響，是不起任何作用的。</p>
<p>舉幾個例子，以下部分引用維基百科。</p>
<p><strong>自定義錯誤頁面（直接拷貝即可）</strong></p>
<blockquote>
<p>ErrorDocument 404 /error-pages/not-found.html<br>
ErrorDocument 503 /error-pages/service-unavailable.html</p>
</blockquote>
<p>————————————————————————-<br><br>
<strong>IP禁止</strong></p>
<blockquote>
<p>Order allow,deny<br>
Deny from 123.45.67.8<br>
Deny from 123.123.7<br>
Allow from all</p>
</blockquote>
<p>上面能禁止IP地址在123.45.67.8以及IP地址開頭為123.123.7的任何人。例如123.123.74.42 就不能得到訪問。<br>
————————————————————————-<br><br>
<strong>變更默認首頁</strong></p>
<blockquote>
<p>DirectoryIndex homepage.html</p>
</blockquote>
<p>————————————————————————-<br><br>
<strong>去除頁面廣告（不一定適用所有免費空間）</strong></p>
<blockquote>
<p>LayoutIgnoreURI *.php<br>
LayoutIgnoreURI *.cgi<br>
LayoutIgnoreURI *.htm<br>
LayoutIgnoreURI *.html<br>
LayoutIgnoreURI *.txt</p>
</blockquote>
<p>————————————————————————-<br><br>
<strong>頁面跳轉</strong></p>
<blockquote>
<p>Redirect page1.html page2.html</p>
</blockquote>
<p>如果某人訪問 http://www.example.com/page1.html，他將被跳轉到（帶有HTTP狀態代碼302）的http://www.example.com/page2.html<br>
————————————————————————-<br><br>
<strong>服務器內置SSI</strong></p>
<blockquote>
<p>AddType text/html .shtml<br>
AddHandler server-parsed .shtml<br>
Options Indexes FollowSymLinks Includes</p>
</blockquote>
<p>————————————————————————-<br><br>
<strong>防止圖片熱鏈</strong><br>
後面的 .htaccess規則使用了mod rewrite。<br>
<strong>特別域名</strong></p>
<blockquote>
<p>RewriteEngine on<br>
RewriteCond %{HTTP_REFERER} ^http://([^/]+\.)?baddomain1\.com [NC,OR]<br>
RewriteCond %{HTTP_REFERER} ^http://([^/]+\.)?baddomain2\.com [NC,OR]<br>
RewriteCond %{HTTP_REFERER} ^http://([^/]+\.)?baddomain3\.com [NC]<br>
RewriteRule \.(gif|jpg)$ http://www.example.com/hotlink.gif [R,L]</p>
</blockquote>
<p><strong>非特別域名</strong></p>
<blockquote>
<p>RewriteEngine on<br>
RewriteCond %{HTTP_REFERER} !^$<br>
RewriteCond %{HTTP_REFERER} !^http://(www\.)?example.com/.*$ [NC]<br>
RewriteRule \.(gif|jpg)$ http://www.example.com/hotlink.gif [R,L]</p>
</blockquote>
<p>除非 example.com有這個圖片，瀏覽器才能看到hotlink.gif.<br>
注意：Hotlink熱鏈保護使用 .htaccess 依賴客戶端在http GET請求中發送正確的」提交」值。像嘗試使用Windows Media Player發送空白的提交到.htaccess 來保護電影檔案是無效的。</p>
<p>禁止.htaccess文件被查看<br>
在.htaccess文件中加入如下代碼就可以禁止別人訪問你的.htaccess文件：</p>
<blockquote>
<p>&lt;Files .htaccess&gt;<br>
order allow,deny<br>
deny from all<br>
&lt;/Files&gt;</p>
</blockquote>
<p>這個網上的大部分版本都有錯誤，大部分版本丟掉了&lt;Files .htaccess&gt; ，結果導致所有文件都被禁止訪問。如果用了錯誤的規則，所有內容都將無法訪問。</p>
<p>同樣道理，如果要禁止其他文件的訪問，用其他文件名替換就可以了。
</p>
<p>&nbsp;</p></div>
<a href="http://registerboy.pixnet.net/blog/post/26074656-.htaccess%E6%98%AF%E4%BB%80%E9%BA%BC%EF%BC%9F.htaccess%E5%B9%BE%E5%80%8B%E7%B0%A1%E5%96%AE%E6%87%89%E7%94%A8" target="_blank"><font color="red">以上說明內容均來自此網站</font></a>
	  </td>
	</tr>
  </table>
</div>






<div id="tabs-3">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_content">
      <tr>
    
	<td width="120" align="right" > 使用與說明：</td>
	  <td >
正則表達式<br>
<br>
元字符^（和數字6在同一個鍵位上的符號）和$都匹配一個位置，這和\b有點類似。<br>
<ul><li>^  匹配你要用來查找的字符串的開頭</li>
<li>$  匹配結尾。<br>
比如一個網站如果要求你填寫的QQ號必須為5位到12位數字時，可以使用：^\d{5,12}$。</li>
<li>\b代表著單詞的開頭或結尾，也就是單詞的分界處，它只匹配一個位置。</li>
<li>\d是個新的元字符，匹配一位數字(0，或1，或2，或……)。</li>
例：0\d{2}-\d{8} 匹配這樣的字符串：以0開頭，然後是兩個數字，然後是一個連字號“-”，最後是8個數字(也就是中國的電話號碼。當然，這個例子只能匹配區號為3位的情形)。
<li>\s匹配任意的空白符，包括空格，製表符(Tab)，換行符，中文全角空格等。</li>
<li>\w匹配字母或數字或下劃線或漢字</li>
<li>\來取消字符的特殊意義。可使用\.和\*。要查找\本身，也得用\\.</li>
<li>[ ] 匹配沒有預定義元字符的字符集合，在方括號裡列出它們就行了<br>
例： [aeiou]就匹配任何一個英文元音字母，[.?!]匹配標點符號(.或?或!)<br>
[0-9]代表的含意與\d就是完全一致的：一位數字；同理[a-z0-9A-Z_]也完全等同於\w</li>
<li>．匹配除 “\n” 之外的任何單個字符。要匹配包括'\n' 在內的任何字符，請使用象'[.\n]' 的模式。<br>
例子：\(?0\d{2}[) -]?\d{8}。</li>
</ul><br>
<br>
像(010)88886666，或022-22334455，02912345678等。<br>
分析：首先是一個轉義字符\(,它能出現0次或1次(?),<br>
然後是一個0，後面跟著2個數字(\d{2})，<br>
然後是)或-或空格中的一個，它出現1次或不出現(?)，最後是8個數字(\d{8})。<br>
<ul><li>* 重複零次或更多次</li>
<li>+ 重複一次或更多次</li>
<li>? 重複零次或一次</li>
<li>{n} 重複n次</li>
<li>{n,} 重複n次或更多次</li>
<li>{n,m} 重複n到m次</li>
</ul><br>
	  </td>
	</tr>
  </table>
</div>


</div>

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
if (confirm('隨意的變更此頁內容，可能導致網頁癱瘓，您是否確認要繼續此動作?'))
	$('#form').submit();
}
</script>

<?php }} ?>
