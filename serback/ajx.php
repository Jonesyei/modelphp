<?php
include_once("../includes/main_back_inc.php");
unset($_SESSION["re_url"]);
$call = $_GET["call"];
foreach($_REQUEST as $k=>$v) $ajx[$k] = $v;


if($call=="row_value")
{
	$pic = Row_Value($conn,$ajx["table"],$ajx["row"],$ajx["where"]);
	$pic = Data_List_Pic($pic["pic"]);
	echo $pic["0"]["0"];
	exit;
}


if($call=="select_products")
{
	if($ajx["row"]=='products_sp')
	{
		if($ajx["class_id"]==8) 	$sql = "select * from ".PREFIX."products WHERE type='products_week'";//每週推薦
		if($ajx["class_id"]==9) 	$sql = "select * from ".PREFIX."products WHERE type='products_hot'";//熱門商品
		if($ajx["class_id"]==10) 	$sql = "select * from ".PREFIX."products WHERE recommend=1";//館長推荐
	}
	else
	{
		$sql = "select * from ".PREFIX."products WHERE ".quotes($ajx["row"])."=".quotes($ajx["class_id"]);
	}
	$tmp = array();
	$tmp = $conn->GetArray($sql);
		
	echo '<option value="">請選擇產品</option>'.Make_sql_list( $tmp,NULL);
	exit;
}


//樹狀分類 分層 篩選
if($call=="category_select")
{
	$sql = "select * from ".PREFIX."category WHERE parent_id=".quotes($ajx["id"])." order by lft,rgt";
	
	echo Make_sql_list( $conn->GetArray($sql),NULL );
	exit;
}





//重寄會員認證信
if($call=="registered_send")
{
	$sql = " select * from ".PREFIX."setting WHERE lang = '".quotes($lang)."'";
	$tmp = $conn->GetArray($sql);
	
	
	$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
	$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
	$web_set["receive_email"] = $tmp["2"]["detail"];
	$web_set["default_email_title"] = $tmp["3"]["detail"];
	$web_set["send_email"] = $tmp["4"]["detail"];
	$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];

	$sql = "Select * from ".PREFIX."member WHERE id=".quotes($ajx["member_id"]);
	$add = $conn->GetRow($sql);
	
	$add["n"] = $ajx["member_id"];
	$add["d"] = explode(" ",$add["create_date"]);
	$add["d"] = md5($add["d"]["1"]);
	
	
	ob_start(); 	//打開快取
	$tpl->assign("post",$add);
	$tpl->assign("web_set",$web_set);
	$tpl->assign("setup",$_SETUP);
	$tpl->display(ROOT_PATH.'templates/MAIL_register.html');
	$cache_string = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
	

	$mailTo = $add["email"];
	$subject = $web_set["default_email_title"]."-註冊認證信";
	$from_mail = $web_set["send_email"];
	
	$message = iconv("utf-8","big5",$cache_string);
	$subject = iconv("utf-8","big5",$subject);
	$headers = 'Content-type: text/html; charset="big5"' . "\r\n";
	$headers .= "From: ".$from_mail . "\r\n"; // 請自行替換寄件地址
	
	mail($mailTo, $subject, $message, $headers);
	
	echo 1;
	
	
	exit;
}




if($_GET["call"] == "login.html")
	$_SESSION["admin_info"] = "";
	
	
if($_GET["call"] == "menu" )
	$_SESSION["admin_info"]["open_menu"] = $_GET["obj_name"];




if($_GET["call"]=="member.html")
{
	if( check_account($_GET["account"]) == false || check_account($_GET["password"]) == false)
	{
		echo "eregi_error";	
		exit;
	}
	
	$sql = "select * from ".PREFIX."member WHERE account='".quotes($_GET["account"])."'";
	$temp = $conn->GetRow($sql);
	if($temp)
		echo 1;
	else
		echo 0;
}



if($_GET["call"]=="admin.html")
{
	if( check_account($_GET["account"]) == false || check_account($_GET["password"]) == false)
	{
		echo "eregi_error";	
		exit;
	}

	$sql = "select * from ".PREFIX."admin WHERE account='".quotes($_GET["account"])."'";
	$temp = $conn->GetRow($sql);
	if($temp)
		echo 1;
	else
		echo 0;
}


if($_GET["call"] == "admin_group" )
{
	$sql = "select * from ".PREFIX."sysmenu WHERE lv='".quotes($_GET["lv"])."'";
	$tmp = $conn->GetRow($sql);
	
	if($tmp["parents"]=="0")
	{
		$sql = "select * from ".PREFIX."sysmenu WHERE parents='".quotes($tmp["lv"])."' and lv!='".quotes($tmp["lv"])."'";
		$tmp = $conn->GetArray($sql);
		foreach($tmp as $k=>$v)
		{
			$lv_str .= $v["lv"].",";
		}
		$lv_str = substr($lv_str,0,-1);
		
		echo $lv_str;
		exit;
	}
}


if ($_GET["logout"]!=NULL){
	unset($_SESSION["admin_info"]);
}



///-----商品內頁截取加價購資訊
if ($_GET["pidlist"]!=NULL && $_GET["pidlist"] != ''){
	$sql = "select * from ".PREFIX."products where class='".$_GET["pidlist"]."'";
	$data = $conn->GetArray($sql);
	foreach ($data as $k=>$v){
		$pp = explode('|__|',$data[$k]["pic"]);
		$data[$k]["pic"] = $pp[0];
	}
	echo json_encode($data);//將陣列資料轉換JSON
}

//--商品目錄選擇最後一層
if ($_GET["pro_class"]){
	$temp = $conn->GetArray("select * from ".PREFIX."category where parent_id='".$_GET["pro_class"]."'");
	if ($temp) {
		echo 'false';
	}
	exit;
}



//--商品尺寸規格圖片及時存檔
if ($_POST["data_img"]){
	//$img = str_replace('data:image/png;base64,', '', $img);
	$img = preg_replace('/^data:image\/(png|jpg);base64,/','',$_POST["data_img"]);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.png';
	$file = $_POST["file_url"].$file_name;
	$success = file_put_contents($file, $data); 
	$_SESSION["upload_temp"][] = $file_name;
	echo $file_name;
}


//--design 參考資料輸出
if ($_GET["c_about"]){
	$temp_str = '';
	$temp_output = $conn->GetRow("select * from ".PREFIX."data_list where type='set_about' and id='".$_GET["c_about"]."'");
	if ($temp_output){
		$temp_output["b_value"] = explode('|__|',$temp_output["b_value"]);
		$temp_output["memo"] = explode('|__|',$temp_output["memo"]);
		foreach ($temp_output["b_value"] as $k=>$v){
			$temp_str .= $v.'<br> 單筆 => ({$data.one.'.$temp_output["memo"][$k].'})<br> 多筆 => ({section name=m loop=$data.list}) ({$data.list[m].'.$temp_output["memo"][$k].'}) ({/section})<br><br>';
		}
	}
	$temp_str .= '選單:<br> 單筆 => &lta href="[主板路徑]&id=({$data.one.id})"&gt({$data.one.'.$temp_output["memo"][0].'})&lt/a&gt<br>';
	$temp_str .= '多筆 =>  ({section name=m loop=$data.list})  &lta href="[主板路徑]&id=({$data.list[m].id})"&gt ({$data.list[m].'.$temp_output["memo"][$k].'}) &lt/a&gt ({/section})</br></br>';
	$temp_str .= '範例:<br> 單筆 => &lta href="XXXX"&gt({$data.one.'.$temp_output["memo"][0].'})&lt/a&gt<br>';
	$temp_str .= '多筆 =>  ({section name=m loop=$data.list})  &lta href="XXXX"&gt ({$data.list[m].'.$temp_output["memo"][$k].'}) &lt/a&gt ({/section})';
	echo $temp_str;
	exit;
}
if ($_GET["page_select"]){
	$temp_tr2 = $conn->GetArray("select * from ".PREFIX."data_list where type='set_about' and status='1' and lang='".$_SESSION["admin_info"]["lang"]."' order by sort");
	foreach ($temp_tr2 as $k=>$v) $temp5[$v["id"]] = $v["name"];
	echo '<select name="page_type[]" onchange="p_memo()">'.Make_list($temp5,'').'</select><span id="page_type_item"></span>';
	exit;
}
?>