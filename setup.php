<?php
//--ip 判斷
$def_token_code = array(
'localhost'=>'5a474f3854154daec579fb224d1fb780',
'localhost:81'=>'057ec2a50d5f463ebe12f9d5cbe5c1d5',
'localhost:82'=>'a9374d8345b4402e8f12485cd944c88c',
'127.0.0.1'=>'3c185924affc1b0d0992c8bd3663abd0',
'127.0.0.1:81'=>'f81f5ad1dcbf0eb44be92f632b16c2ac',
'127.0.0.1:82'=>'86d9335887bfad9a13faa672dcb61d65',
);
$auth_token_ip = array('127.0.0.1'/*,'1.34.252.157','59.127.169.144'*/);
if (!empty($_SERVER['HTTP_CLIENT_IP']))
	$ip=$_SERVER['HTTP_CLIENT_IP'];
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
else
	$ip=$_SERVER['REMOTE_ADDR'];
if (!in_array($ip,$auth_token_ip)) {
		print "<meta http-equiv=Content-Type content=text/html; charset=utf-8>網站建構中.... 如有任何問題請聯繫網動廣告科技工程人員處理!!";
		exit;
}
	
$myfile = fopen("includes/config/conn_setup.php", "r") or die("Unable to open file!");
$settingstr = fread($myfile,filesize("includes/config/conn_setup.php"));
fclose($myfile);

//---目錄檔案讀取
$dbfileurl = 'upload/database_backup/';
if(is_dir($dbfileurl)){//檢查是否是目錄
 if($dh=opendir($dbfileurl)){//打開目錄
  while(($file=readdir($dh))!==false){
   //$file = 檔名+副檔名
   //第一個跟第二個檔名是 .. 及 . 
   if($file!='..' && $file!='.'){
       $file=iconv("BIG5", "UTF-8",$file); //必要,否則中文會亂碼
       $data["file"][]=$file;
   }
  }
 }
}
clearstatcache();//清除檔案狀態快取



if ($_POST) {
	
	//--寫入設定黨
	$settingstr = str_replace('%localhost%',$_POST["dbip"],$settingstr);
	$settingstr = str_replace('%database%',$_POST["dbname"],$settingstr);
	$settingstr = str_replace('%dname%_',$_POST["dbname"].'_',$settingstr);
	$settingstr = str_replace('%root%',$_POST["dbid"],$settingstr);
	$settingstr = str_replace('%passwrod%',$_POST["dbpw"],$settingstr);
	$settingstr = str_replace('%auth%',$_POST["auth"],$settingstr);
	$file = fopen("includes/config/conn.php","w");
	fwrite($file,$settingstr);
	fclose($file);
	
	/*htaccess 設定檔讀取*/
	$myfile = fopen("includes/config/setup.htaccess", "r") or die("Unable to open file setup.htaccess !!");
	$settingstr = fread($myfile,filesize("includes/config/setup.htaccess"));
	fclose($myfile);
	/*htaccess 設定檔寫入*/
	$settingstr = str_replace('%setup%',$_POST["dbname"],$settingstr);
	$file = fopen(".htaccess","w");
	fwrite($file,$settingstr);
	fclose($file);
	
	include_once("includes/main_inc.php");
	
	//--首頁開發訊息自動接收更新
	$aa = curl('http://www.104portal.com.tw/centerpoes.txt');
	if ($aa["code"]=='200'){
		safefilerewrite(ROOT_PATH.$admin_path."centerpoes.php",$aa["data"]);
	}
}




if ($_POST["dbname"]){
	$link = mysql_connect($dbHost,$dbUser,$dbPass) or die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script>alert("資料庫連線失敗，請確認是否已設定正確的主機資訊!!");window.history.back(-1);</script>');
	$check_mq = mysql_select_db($_POST["dbname"], $link);
	if ($check_mq){
		//alert('資料庫已存在!!,將您引導到後台進行登入','serback/');
		mysql_query("drop database `".$_POST["dbname"]."`"); //刪除資料庫
		//exit;
	}
	mysql_query("create database ".$_POST["dbname"]);
}




if ($_POST["dbname"]){




	//連線到資料庫	
	if ($_POST["dbselect"]!=NULL && $_POST["dbselect"]!=''){
		$dfile = $dbfileurl.$_POST["dbselect"];
	}else{
		$dfile = 'includes/config/setup_sql.sql';
	}
	$conn = ADONewConnection('mysql');
	$conn->debug=false;
	$conn->PConnect($dbHost,$dbUser,$dbPass,$dbData);
	if ($conn && file_exists($dfile) )
	{
	 
			$templine = '';
			$lines = file($dfile);
			$ins_on=NULL;
			
			foreach ($lines as $line)
			{
				
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				$templine .= $line;
				if (strtolower(substr(trim($line), 0, 6))=='insert') {$ins_on = 1;}
		
				if ((substr(trim($line), -4, 1)!="\\"&&substr(trim($line), -2, 2)==");"&&$ins_on=='1')||($ins_on==NULL&&substr(trim($line), -1, 1) == ';'))
				{
					$templine = str_replace('datasetup_',$_POST["dbname"].'_',$templine);

					//mysql_query($templine) or print($templine);
					$conn->Execute("SET NAMES utf8;");
					$conn->Execute("SET CHARACTER_SET_CLIENT=utf8;");
					$conn->Execute("SET CHARACTER_SET_RESULTS=utf8;");
					if (!$conn->Execute($templine)) echo '失敗語法:<div>'.$templine.'</div>';
					
					$templine = '';$ins_on=NULL;
					
				}
			}
			alert('已安裝完成!!','serback/');
	}else{
		alert('安裝失敗!!',-1);
	}
	
}


//--專案預設目錄
$myurl = explode('/',substr($_SERVER['SCRIPT_NAME'],1,strlen($_SERVER['SCRIPT_NAME'])-1));
if (count($myurl)<=1){
	$model_name = '';
}else{
	$model_name = $myurl[0];
}

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安裝</title>
<style>
.form-box { border:1px #E4E4E4 solid; width:500px; margin:0 auto; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
font-family:"微軟正黑體"; font-size:15px; line-height:1.5em; color:#555555; padding:20px;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,f4f4f4+100 */
background: rgb(255,255,255); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmNGY0ZjQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(244,244,244,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(244,244,244,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(244,244,244,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(244,244,244,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(244,244,244,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(244,244,244,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f4f4f4',GradientType=0 ); /* IE6-8 */
}
.input-style01 { padding:2px 10px; font-family:"微軟正黑體";  -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }

.btn-input { background:#fff;  border:1px #999 solid;  color:#333; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
font-family:"微軟正黑體"; font-size:15px; line-height:1.5em; padding:2px 10px; text-align:center;}
</style>
</head>
<body>
<div class="form-box">
<h1>工程師專案安裝介面</h1>
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td>專案名稱<br>(前綴)</td>
      <td><input type="text" name="dbname" placeholder="專案目錄名稱" class="input-style01" value="<?php echo $model_name;?>"> 此亦為資料庫名稱</td>
    </tr>
    <tr>
      <td>資料庫主機</td>
      <td><input type="text" name="dbip" value="localhost" placeholder="DBserver所在位置" class="input-style01"> 預設本機為localhost (127.0.0.1)</td>
    </tr>
    <tr>
      <td>資料庫帳號</td>
      <td> <input type="text" name="dbid" value="root" placeholder="用以連線DBserver帳號" class="input-style01"> 本機安裝預設為root</td>
    </tr>
    <tr>
      <td>資料庫密碼</td>
      <td><input type="text" name="dbpw" placeholder="用以連線DBserver密碼" class="input-style01"></td>
    </tr>
    <tr>
      <td>環境授權碼</td>
      <td><input type="text" name="auth" value="<?=$def_token_code[$_SERVER['HTTP_HOST']] ?>" placeholder="請設定授權代碼 (如不清楚請詢問Jones)" class="input-style01" style="width:250px;"></td>
    </tr>
    <tr>
      <td>安裝檔選擇</td>
      <td>
      <select name="dbselect" class="input-style01">
      <option value="">全新的安裝環境</option>
      <?php if ($data["file"])
	  		foreach ($data["file"] as $k=>$v){?>
      <option value="<?php echo $v;?>"><?php echo $v;?></option>
      <?php }?>
      </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="安裝" class="btn-input"></td>
    </tr>
  </tbody>
</table>
</form>
</div>
</body>
</html>