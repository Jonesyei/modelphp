<?php
include_once("main_inc.php");
$host=$dbHost;
$user=$dbUser;
$password=$dbPass;
$dbname=$dbData;
$sql = "select * from ".PREFIX."setting WHERE lang='".quotes($record["lang"])."' and type='backup'";
$file_url = $conn->GetRow($sql);
$file_url = $file_url["detail"];


mysql_connect($host,$user,$password);

mysql_select_db($dbname);
//--連線編碼
mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET_CLIENT=utf8;");
mysql_query("SET CHARACTER_SET_RESULTS=utf8;");




$mysql= "set charset utf8;\r\n";#for mysql<=5.0

$q1=mysql_query("show tables");

while($t=mysql_fetch_array($q1)){

$table=$t[0];

$q2=mysql_query("show create table `$table`");

$sql=mysql_fetch_array($q2);

$mysql.=$sql['Create Table'].";\r\n\r\n";#DDL



$q3=mysql_query("select * from `$table`");

while($data=mysql_fetch_assoc($q3)){

$keys=array_keys($data);

$keys=array_map('addslashes',$keys);

$keys=join('`,`',$keys);

$keys="`".$keys."`";

$vals=array_values($data);

$vals=array_map('addslashes',$vals);

$vals=join("','",$vals);

$vals="'".$vals."'";



$mysql.="insert into `$table`($keys) values($vals);\r\n";

}

$mysql.="\r\n";

}



$filename=$file_url.date('Y_m_d_h_i_s').".sql"; //文件名為當天的日期

$fp = fopen($filename,'w');

fputs($fp,$mysql);

fclose($fp);








if ($_GET["type"]){
	
	if ( file_exists($_GET["type"]) )
	{
	 
			$templine = '';
			$lines = file($_GET["type"]);
			$ins_on=NULL;
			
			//---先刪除所有資料表
			
			foreach ($conn->GetArray("show tables") as $k=>$v){ //--取得資料表欄位資料進行判斷
				$row_colum[] = $v[0];
			}
			if (count($row_colum)>=1) $conn->Execute("DROP TABLE `".implode('`,`',$row_colum)."`;");
			
			
			foreach ($lines as $line)
			{
				
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				$templine .= $line;
				if (strtolower(substr(trim($line), 0, 6))=='insert') {$ins_on = 1;}
		
				if ((substr(trim($line), -4, 1)!="\\"&&substr(trim($line), -3, 3)=="');"&&$ins_on=='1')||($ins_on==NULL&&substr(trim($line), -1, 1) == ';'))
				{
					//mysql_query($templine) or print($templine);
					$conn->Execute("SET NAMES utf8;");
					$conn->Execute("SET CHARACTER_SET_CLIENT=utf8;");
					$conn->Execute("SET CHARACTER_SET_RESULTS=utf8;");
					if (!$conn->Execute($templine)) echo '失敗語法:<div>'.$templine.'</div>';
					$templine = '';$ins_on=NULL;
				}
			}
			alert('匯入完成，匯入前自動被份檔案為 '.$filename,-1);
	}else{
		alert('無法找到要匯入的檔案!!',-1);
	}
	
}else{
	echo "<script>alert('資料庫備份成功!!');window.history.back(-1);</script>";
}
?>