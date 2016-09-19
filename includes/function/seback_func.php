<?php
/*
	後台操作模組
	@2015 create and edit by Jones 新模組延展使用
*/
include_once("sql_func.php");




//--自動磁碟大小函數表示式
function disk_data($data,$depth=0){
	$output['data'] = $data;
	$output['depth'] = $depth;
	
	if ($data*1>1024){
		$depth++;
		$output = disk_data($data/1024,$depth);
	}
	
	return array('data'=>$output['data'],'depth'=>$output['depth']);
}



//無限層分類制作 start
function Make_class($conn,$lv=NULL)
{
	$sql = "select * from ".PREFIX."sysmenu WHERE lang='".$_SESSION["admin_info"]["lang"]."' order by sort"; //抓出所有分類 依lv排序
	$sysmenu = $conn->GetArray($sql);
	
	$sysmenu_child = array_reverse($sysmenu);//反轉分類陣列排序 (子分類有影響)
	
	$sql = "select floor from ".PREFIX."sysmenu"; //計算共有幾層分類
	$floor = $conn->GetArray($sql);
	$tmp=max($floor);
	$max_floor=$tmp["0"]; //階層的值
	$tmp = "";
	
	
	for($i=0;$i<$max_floor;$i++)//依層數來判斷執行次數
	{
		foreach($sysmenu as $k=>$v)//母目錄 最上層 只在$i=0時執行一次 將基層分類排序好
		{	
			if($lv==$v["lv"]) continue;//不列出自己的分類
			
			if($v["floor"]==$i && $v["parents"]=="0") // 以 母分類parents 等於 自己的lv 來判斷是否為基層分類
				$html[] = $v;
		}
		$tmp = $html;//分類陣列暫存


		foreach($sysmenu_child as $k=>$v)
		{
			if($lv==$v["parents"] || $lv==$v["lv"]) continue;//不列出自己和自己之下的子分類
			
			if($v["floor"]==($i+1)) //判斷出下"1"層的分類 並foreach html的陣列 來判斷誰為此母分類的子分類
			foreach($html as $k_2=>$v_2)
			{
				if($v["parents"]==$v_2["lv"])//判斷是否擁有子母關係
				{
					for($x=$k_2;$x<count($html);$x++)//將此索引值之後的值全部往後移一位 再將子分類插進此空格
					{
						$tmp[$x+1] = $html[$x];
					}
					$tmp[$k_2+1] = $v;//將子分類插進上面for所產生的空格
				}
			}
			$html = $tmp; //暫存檔回寫到html
		}
	}
	return $html;
}



//判斷頁面權限
function Auth_check($conn)
{
	$pass = false;

	//先撈出資料庫中目錄之資料
	$sql = " select * from ".PREFIX."sysmenu WHERE lang='".$_SESSION["admin_info"]["lang"]."'";
	$menu = $conn->GetArray($sql);

	//判斷是否有帶著GET值的url 有的另外拉出組成have_get陣列
	if ($menu)
	foreach($menu as $k => $v)
	{
		if(count(explode("?",$v["url"]))>1)
			$have_get[] = $v["url"];
	}
	
	//抓取現在頁面網址檔案 xxx.php 或 xxx.php?get=xxx
	$now_url = explode("/",$_SERVER['REQUEST_URI']);
	$now_url = $now_url[count($now_url)-1];
	
	//判斷是否有 "?" 
	if(count( $temp = explode("?",$now_url) )>1)
	{	
		//判斷 "?" 後是否有值 無值便消除問號 有值另外處理
		if($temp[1]=="")
		{
			foreach($menu as $k => $v)
			if($v["url"] == $temp[0])
				$url = $temp[0];
		}
		else
		{
			//判斷後面所帶的 GET 值 是否為多個
			if( count($get_array = explode("&",$temp[1])) > 1 )
			{
				//現在頁面的 GET 值為複數的話 便與 have_get的 GET 全部比較
				//get_array 現在網址 所帶值
				//have_get 資料庫中網址 所帶值
				if($have_get && $get_array)
				{
					foreach($have_get as $k=>$v)
					{
						$tmp = explode("?",$v);
						$tmp2 = explode("&",$tmp["1"]);
						
						//id=lang 為 明細頁

							$url_set = 0;
							foreach($get_array as $k2=>$v2)
							{

								if ($temp[0]==$tmp[0] && $tmp[0]=='category.php') {
									$unset_array = array('act','s_query','page','id');
									$sett = explode('=',$v2);
									if (in_array($sett[0],$unset_array,0)) continue;
								}
								if (stripos($v2,'id=',0)!==false || stripos($v2,'page=',0)!==false ||  stripos($v2,'s_',0)!==false) continue;
								if($temp[0]==$tmp[0] && in_array($v2,$tmp2)==true)
								{
									$url_set = 1;
								}else{
									$url_set = 0;
								}
							}
							if($url_set==1) $url = $v;
					}
				}

			}
			else
			{
				// 比較這一個 GET 值 是否跟 have_get 值相同
				if($have_get)
				foreach($have_get as $k => $v)
					if($v == $now_url)
						$url = $v;
			}
			
			// 如果上面都沒設定 url 值 代表可能是 id 或其他可能的值 直接設定為 xxx.php 之值
			if($url==NULL)
			{
				$url = $temp[0];
			}
		}	
	}
	else
	{
		//沒有 "?" 值 直接比較 menu 的 url值
		foreach($menu as $k => $v)
			if($v["url"] == $now_url)
				$url = $v["url"];
	}
	
	
	// 只有index.php 不進行判定 將上面設定好的 url 拿來搜尋 menu 得出 lv 值
	if($now_url != "index.php")
	{
		//$sql = "select * from ".PREFIX."sysmenu WHERE url='".$url."'";
		//$temp = $conn->GetRow($sql);
		if ($menu)
		foreach($menu as $k=>$v)
		{

			if($v["url"]===$url)//字串比較 需要 ===
			{
				$lv=$v["lv"];
				$title_name = $v["name"];//頁面title顯示

				//避免 不點選 目錄前往頁面 沒觸發到 Open_menu javascript
				foreach($menu as $k2=>$v2)
				if($v2["lv"]==$v["parents"])
					$_SESSION["admin_info"]["open_menu"] = $v2["id"];
			}
		}
		

		$auth = explode(",",$_SESSION["admin_info"]["auth"]);
		//跟 $_SESSION 的 auth 比較 判斷是否有權限讀取此頁

		foreach($auth as $k => $v)
		{
			
			if($lv == $v||($_SESSION["admin_info"]["control"]=='0'&&Now_file()=='admin_group')) 
			{
				$pass = true;
				$data_name = $conn->GetRow("select * from ".PREFIX."sysmenu WHERE lv='".$lv."'");
				if ($data_name){
					$_SESSION["admin_info"]["title"] = $data_name["name"];//頁面title顯示				
				}else{
					$_SESSION["admin_info"]["title"] = $title_name;//頁面title顯示				
				}
			}
		}

	}
	else
	{
		$pass = true;
	}
	



	
	return $pass;
}




//從mysql select出資料 再組出menu的html 
function Make_menu($conn)
{
	//母目錄
	$sql = " select * from ".PREFIX."sysmenu WHERE lang='".$_SESSION["admin_info"]["lang"]."' and ifview=1 and parents='0' order by sort ";
	$record = $conn->GetArray($sql);

	//子目錄
	$sql = " select * from ".PREFIX."sysmenu WHERE lang='".$_SESSION["admin_info"]["lang"]."' and ifview=1 and parents!='0' order by sort ";
	$record_2 = $conn->GetArray($sql);
	
	$menu_html = 
	'<div id="left_nav">
	<a onclick="Open_menu();" href="index.php"><img src="images/top.jpg"></a>
		<div style="height:20px;text-align:center;"><strong>功能快速檢索 </strong><input id="menu_search" type="text" value="" onkeyup="menu_search();" placeholder="輸入想找尋的功能名稱" x-webkit-speech lang="zh-tw"></div>
	<ul>';
	
	$menu_html = '
	<div class="col-01">

<div class="left-menu-design">
       <h3 class="design">後台個人風格
	   <div style="float:right;margin-right:20px;">
	   <select serback_style>
		<option value="default">傳統</option>
		<option value="org">橘色</option>
		<option value="blue">藍色</option>
		</select>
		</div>
		</h3>
		
     </div>


<div class="left-menu">
<div class="interval"></div>
       <h3 class="set">功能快速檢索</h3>
		<input id="menu_search" type="text" value="" onkeyup="menu_search();" placeholder="輸入想找尋的功能名稱" x-webkit-speech lang="zh-tw" style="margin:0 0 0 30px;" >
     </div>
	 

	<div class="left-menu" id="left_nav">
		<div class="interval"></div>
       <h3 class="architecture">管理功能選單</h3>
       <ul id="menu_1">
	   ';
	
	if ($record)
	foreach($record as $k => $v)
	{
		//判斷 $_SESSION 的 auth 是否有此目錄之權限 沒有的話 便 continue 跳過此目錄
		$auth = explode(",",$_SESSION["admin_info"]["auth"]);
		
		$continue = 0;
		foreach($auth as $k_2 => $v_2)
			if($v["lv"]==$v_2||$_SESSION["admin_info"]["control"]=='0') $continue = 1; //--如果是系統管理者不在此限
			
		if($continue=='0') continue;

		
		$open_html = "Open_menu('".$v["id"]."')";
		
		$menu_html .= 
		'<li>
		<a href="javascript:'.$open_html.'">'.$v["name"].'</a>
		';	
		
		$menu_html .= '<ul class="sub-menu" id="menu'.$v["id"].'">';
		
		
		foreach($record_2 as $k_2 => $v_2)
		{
			//判斷 $_SESSION 的 auth 是否有此目錄之權限 沒有的話 便 continue 跳過此目錄
			$continue = 0;
			foreach($auth as $k_3 => $v_3)
				if($v_2["lv"]==$v_3||$_SESSION["admin_info"]["control"]=='0') $continue = 1; //--如果是系統管理者不在此限
				
			if($continue=='0') continue;
	
			if($v_2["parents"] == $v["lv"] )
			{
				$menu_html .= 
							'<li>
							<a href="'.$v_2["url"].'">
							'.$v_2["name"].'
							</a>
							</li>';
			}
		}
		$menu_html .= '</ul></li>'; 
	}
		
	$menu_html .= 
	'       </ul>
     </div>
	 </div>';
	
	/*
	if($_SESSION["admin_info"]["open_menu"])
	$menu_html .= "<script>Open_menu('".$_SESSION["admin_info"]["open_menu"]."')</script>";
	*/
	
	return $menu_html;
}





//檢查 後臺admin 是否登入   $_POST帳號,$_POST密碼,$_SESSION admin_info 資料
function Check_Admin($conn,$account,$password,$checkcode,$tolang=NULL)
{
	$pass = true;

	if($_SESSION["admin_info"]["account"]) $account = $_SESSION["admin_info"]["account"];
	
	$sql = "select * from ".PREFIX."admin WHERE account = '".quotes(strtolower($account))."'";
	$detail = $conn->GetRow($sql);
	
	if($detail)
	{
		if($detail["status"] == "0")
		{
			alert("帳號已封鎖，請洽詢管理員");
			exit;
		}
		
		if($_SESSION["admin_info"]["account"] == NULL) //--判斷是否沒登入過
		{
			
			if ($_POST){
				$recaptcha_setting = $conn->GetRow("select * from ".PREFIX."setting where type='recaptcha'");
				if ($recaptcha_setting && strlen($checkcode)>10){
					//--recaptcha 驗證
					$recaptcha_setting['detail'] = explode(',',$recaptcha_setting['detail']);
					$recaptcha_data = curl('https://www.google.com/recaptcha/api/siteverify','POST',array('secret'=>$recaptcha_setting['detail'][1],'response'=>$checkcode));
					if ($recaptcha_data['code']!='200') alert('驗證套件連線錯誤!! 請聯繫網站管理員',-1);
					$recaptcha_data['data'] = json_decode($recaptcha_data['data'],true);
					if (!$recaptcha_data['data']['success']){
						alert('驗證錯誤!!',-1);
					}
				}else{
					if (md5($checkcode)!=$_SESSION["serback__validate_code"]){
						alert("驗證碼錯誤!!",-1);
						exit;		
					}
				}
			}
			
			if($detail["password"] != md5($password))
			{
				$pass = false;
				$_SESSION["admin_info"]["account"] = "";
			}
			else
			{
				$sql = "select * from ".PREFIX."admin_group WHERE id=".$detail["group_id"];
				$temp = $conn->GetRow($sql);
				
				//--判斷是否有限制登入語系
				if ($tolang!=NULL && $temp["lang_auth"]){
					$language_data = $conn->GetRow("select * from ".PREFIX."language where id='".$temp["lang_auth"]."'");
					if ($language_data["detail"]!=$tolang){
						alert('您的所屬的帳戶群沒有授權此版本,如有任何疑慮請聯繫管理者!!'.$language_data["detail"].$tolang,-1);
						exit;
					}
				}
				
				$_SESSION["admin_info"]["id"] = $detail["id"];
				$_SESSION["admin_info"]["account"] = $detail["account"];
				$_SESSION["admin_info"]["name"] = $detail["name"];
				$_SESSION["admin_info"]["group_id"] = $detail["group_id"];
				$_SESSION["admin_info"]["login_date"] = date("Y/m/d H:i:s");
				
				$_SESSION["admin_info"]["control"] = $temp["control"];
				$_SESSION["admin_info"]["lang_auth"] = $temp["lang_auth"];				
				
				//--判斷有否語系參數
				if ($tolang!=NULL){
					$_SESSION["admin_info"]["lang"] = $tolang;
					$_SESSION["admin_info"]["auth"] = $temp["auth_".$tolang];
				}else{
					$_SESSION["admin_info"]["lang"] = 'ch';
					$_SESSION["admin_info"]["auth"] = $temp["auth_ch"];
				}
				
				//--判斷是否有設定好EMAIL 否者導向設定頁面
				if ($detail["email"]=='') {
					echo "
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<script>if (confirm('您還未設定後台管理者EMAIL信箱，為避免忘記密碼是否要前往設定，以利收到忘記密碼通知函')) window.location.href='./admin.php?id=lang'</script>";
				}
			}	
		}
		else
		{
			$_SESSION["admin_info"]["group_id"] = $detail["group_id"];
			$sql = "select * from ".PREFIX."admin_group WHERE id=".$detail["group_id"];
			$temp = $conn->GetRow($sql);
			$_SESSION["admin_info"]["control"] = $temp["control"];
			$_SESSION["admin_info"]["auth"] = $temp["auth_".$_SESSION["admin_info"]["lang"]];
			$_SESSION["admin_info"]["lang_auth"] = $temp["lang_auth"];
		}
	}
	else
	{
		$pass = false;
		$_SESSION["admin_info"]["account"] = "";
	}
	return $pass;
}



// $record,一頁呈現筆數  return $page_table 提供換頁table呈現數字及換頁處理
function Page_table($data,$per_page_qty)
{
	//開始的資料筆數
	if($data->_maxRecordCount=="0") 
		$page_table["start_date"] = 0;
	else
		$page_table["start_date"] = $per_page_qty*($data->_currentPage-1) + 1;
		
	//結束的資料筆數
	if($per_page_qty * ($data->_currentPage - 1 ) + $per_page_qty > $data->_maxRecordCount)
		$page_table["end_date"] = $data->_maxRecordCount;
	else
		$page_table["end_date"] = $per_page_qty*($data->_currentPage-1)+$per_page_qty ;
	
	//現在頁面列出的筆數
	$page_table["page_date_count"] = $data->_maxRecordCount ;
	
	//現在頁面的頁數
	if($data->_maxRecordCount=="0") 
		$page_table["now_page"] = 0;
	else
		$page_table["now_page"] = $data->_currentPage;
	
	//全部資料所需呈現的頁數
	$page_table["all_page"] = ceil( $data->_maxRecordCount / $per_page_qty );
	
	//jump_page 用之 html樣式建製
	for($i = 1 ; $i <= $page_table["all_page"] ; $i++)
	{
		@$page_table["jump_page_html"] .= "<option value='".$i."'";
		
		if($i == $page_table["now_page"]) $page_table["jump_page_html"] .= 'selected="selected"';
		
		@$page_table["jump_page_html"] .= ">".$i."</option>";
	}

	//給jump用之url值
	$page_table["jump_page_url"] = Page_get_url('page');
	
	//以下兩行為 上一頁及下一頁呈現	
	if($data->AbsolutePage()==1) {$i=0;}else{$i=1;}
	$page_table["up_url"] = Page_get_url('page') ."?page=".($data->AbsolutePage() - $i) . Post_to_get($_POST);
	if($data->AbsolutePage()>=$page_table["all_page"]) {$i=0;}else{$i=1;}
	$page_table["down_url"] = Page_get_url('page') ."?page=".($data->AbsolutePage() + $i) . Post_to_get($_POST);

	return $page_table;
}



function Page_table_limit($all_count,$page_count,$page,$per_page_qty)
{
	$tmp["now_page"] = $page;
	$tmp["all_page"] = ceil($all_count / $per_page_qty);
	$tmp["start_date"] = ($page-1) * $per_page_qty + 1;
	$tmp["end_date"] = $tmp["start_date"] + $page_count-1;
	
	if( count( explode("?",Page_get_url('page')) )>1 ) {$link = "&";}else{$link = "?";}//先判斷是否有?是否有帶值
	
	if($tmp["now_page"]==1) {$i = 0;}else{$i = 1;}
	$tmp["up_url"] = Page_get_url('page').$link."page=".($page-$i).Post_to_get($_POST);
	
	if($tmp["now_page"]==$tmp["all_page"]) {$i = 0;}else{$i = 1;}
	$tmp["down_url"] = Page_get_url('page').$link."page=".($page+$i).Post_to_get($_POST);
	
	$tmp["page_date_count"] = $all_count;
	
	
	$tmp["jump_page_html"] = "";
	$x = 0;
	//jump_page 用之 html樣式建製
	for($i = $page - 10 ; $i <= $tmp["all_page"] ; $i++)
	{
		if($i<1) continue;
		
		$tmp["jump_page_html"] .= "<option value='".$i."'";
		
		if($i == $tmp["now_page"]) $tmp["jump_page_html"] .= 'selected="selected"';
		
		$tmp["jump_page_html"] .= ">".$i."</option>";

		
		$x++;
		if($x>=20) break;
		
	}
	//給jump用之url值
	$tmp["jump_page_url"] = Page_get_url('page');
	
	
	if($all_count<1)
	{
		$tmp["start_date"] = 0;
		$tmp["now_page"] = 0;
		$tmp["up_url"] = "#";
		$tmp["down_url"] = "#";
	}
	
	
	return $tmp;
}



function Page_table_class($data,$now_page,$per_page_qty)
{
	$tmp["now_page"] = $now_page;
	$tmp["all_page"] = ceil(count($data) / $per_page_qty);
	$tmp["start_date"] = ($now_page-1) * $per_page_qty + 1;
	
	if($tmp["now_page"] < $tmp["all_page"])
		$tmp["end_date"] = $tmp["start_date"] + $per_page_qty - 1;
	else
		$tmp["end_date"] = $tmp["start_date"] + count($data) - $per_page_qty * ($now_page-1)-1;
	
	
	
	if($tmp["now_page"]==1) {$i = 0;}else{$i = 1;}
	$tmp["up_url"] = Page_get_url('page')."&page=".($now_page-$i).Post_to_get($_POST);
	
	if($tmp["now_page"]==$tmp["all_page"]) {$i = 0;}else{$i = 1;}
	$tmp["down_url"] = Page_get_url('page')."&page=".($now_page+$i).Post_to_get($_POST);
	
	$tmp["page_date_count"] = $tmp["end_date"] - $tmp["start_date"] + 1;
	
	//jump_page 用之 html樣式建製
	for($i = 1 ; $i <= $tmp["all_page"] ; $i++)
	{
		$tmp["jump_page_html"] .= "<option value='".$i."'";
		
		if($i == $tmp["now_page"]) $tmp["jump_page_html"] .= 'selected="selected"';
		
		$tmp["jump_page_html"] .= ">".$i."</option>";
	}
	//給jump用之url值
	$tmp["jump_page_url"] = Page_get_url('page');
	
	if(count($data)<1)
	{
		$tmp["start_date"] = 0;
		$tmp["now_page"] = 0;
		$tmp["up_url"] = "#";
		$tmp["down_url"] = "#";
	}
	return $tmp;
}




//echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
//抓取現在網址 HTTP_HOST=>主機ip REQUEST_URI=>資料夾 

//抓取目前頁面網址，並去掉某個get傳遞值 移除重覆的get值//Terry add
// $keword 輸入 clear 清出所有 $_GET 值
function Page_get_url($keyword)
{	
	//清除後面所帶的所有值，初使化網址列
	/* Now_file 可代替
	if($keyword=="clear")
	{	
		$all_url=explode('?',$_SERVER['REQUEST_URI']);
		return $all_url[0].'?';
		exit;
	}
	*/
	
	//要去掉複數$_GET值 keyword 輸入格式為 $_GET1,$_GET2,$_GET3...
	$keyword_temp = $keyword;
	$keyword = explode(",",$keyword_temp);

	//判斷是陣列或是單一值
	$array_len = count($keyword);
	
	$tmp_2 = "";
	
	//將網址列的空白移除
	$tmp = explode("%20",$_SERVER["REQUEST_URI"]);
	foreach($tmp as $k => $v)
		$tmp_2 .= $v;
	
	$all_url=explode('?',$tmp_2);//拆成兩段網址，第二段為get所帶之所有值
	
	if(@$all_url["1"])
	{
		//拆開所有get之值
		$url=explode('&',$all_url[1]);
	}
	
	//將第一段網址組回
	$url_fix=$all_url[0]."?";//即使沒有網頁檔xxx.php,xxx.html也會加入"?"
	
	
	//將Post_to_get涵式 轉成 get 的重複值給unset掉 將重覆的值 以及丟進來的keyword給unset掉
	if(@$url)
	foreach($url as $k => $v)
	{	
		if(count($url) < 2 )//如果只有一個get值 而且又是欲刪除之keyword時執行
		{
			$len = strpos($v,"=");
			
			
			if($array_len > 1)
			{
				foreach($keyword as $k_k => $v_k)
					if(substr($v,0,$len)==$v_k)
						unset($url[$k]);
			}
			else
			{
				if(substr($v,0,$len)==$keyword[0])
					unset($url[$k]);
			}	
		}
		
		
		
		foreach($url as $k_2 => $v_2)
		{
			if($k!=$k_2)//不為自己的所引值時才進行比對 避免自己等於自己的狀況
			{	
				$len = strpos($v,"="); //算出 get值 "=" 之前的變數名稱的長度
				$len_2 = strpos($v_2,"=");	
				
				if($array_len > 1)//keyword為複數值(陣列) 的狀態 unset 複數 get值
				{
					foreach($keyword as $k_k => $v_k)
						if(substr($v,0,$len)==$v_k)
							unset($url[$k]);
				}
				else//keyword 只有一個值 的狀態 unset 單一 get值
				{
					if(substr($v,0,$len) == substr($v_2,0,$len_2) || substr($v,0,$len)==$keyword[0])
						unset($url[$k]);
				}
			}
		}
		
	}

	//重組網址
	if(@$url)
	foreach($url as $k => $v)
		$url_fix.=$v."&";

	//空值直接送回原網址
	if($keyword_temp=="")
	{
		if(count($all_url)>1)
			return $_SERVER['REQUEST_URI'];
		else
			return $_SERVER['REQUEST_URI']."?";
	}
	else
		return substr($url_fix,0,-1);
}


//將post的資料整理成get資料串 //Terry add
function Post_to_get($post)
{	
	/*
	$all_url=explode('?',$_SERVER['REQUEST_URI']);//抓取目前網址值，判斷是否已經有帶值
	if(count($all_url)==1)//判斷以"?"分割之網址的陣列數為多少
		$url_post="?";
	else
	*/   //搭配 Page_get_url 使用此涵式便不用判斷該加 "?" 或是 "&" 統一直接加 "&"
	
	$url_post="&";

	foreach($post as $k=>$v)
		$url_post .= $k."=".$v."&";
		
	return substr($url_post,0,-1);
}


//刪除節點
function del_node($del_id,$root,$db,$table)
{

	
	//尋找要刪除的節點左右值
	$sql="SELECT lft,rgt,sort,parent_id,sys FROM ".$table." WHERE id='".$del_id."'";
	$rs=$db->Execute($sql);
	if(!$rs) Error($db);
	$lft=$rs->fields["lft"];
	$rgt=$rs->fields["rgt"];
	
	if($rs->fields["sys"]==1)
	{
		alert("該資料為系統預設資料，無法刪除，請確認!!",-1);
		exit;
	}
	
	//將刪除底下的sort上移
	$sql="UPDATE  ".$table." SET sort=sort-1 WHERE sort > ".$rs->fields["sort"]." AND parent_id='".$rs->fields["parent_id"]."'";
	$rs = $db->Execute($sql);
	if(!$rs) Error($db);
		
	//刪除該節點下所有子節點
	$sql="DELETE FROM ".$table." WHERE lft >= '".$lft."' AND rgt <='".$rgt."' AND root_id='".$root."' AND sys !=1";
	$rs=$db->Execute($sql);
	if(!$rs) Error($db);
	
	//更新節點值
	$diff = $rgt-$lft+1;
	$sql="UPDATE ".$table." SET lft = lft-$diff  WHERE lft > '".$rgt."' AND root_id='".$root."' ";
	$rs=$db->Execute($sql);
	if(!$rs)Error($db); 		 
	$sql="UPDATE ".$table." SET rgt = rgt-$diff  WHERE rgt > '".$rgt."' AND root_id='".$root."' ";
	$rs=$db->Execute($sql);
	if(!$rs)Error($db); 
	
	
}


//新增節點在目錄底下
function add_node($data,$db,$table)
{
	//尋找新增節點的左邊值(為父節點的右邊)
	$sql="SELECT rgt FROM ".$table." WHERE id='".$data["parent_id"]."'";
	$rs=$db->Execute($sql);
	if(!$rs) Error($db);
	$left=$rs->fields["rgt"];
			
	//將所有相關節點全部向後移
	$sql="UPDATE ".$table." SET rgt = rgt+2 WHERE rgt >= '".$left."' AND root_id='".$data["root_id"]."' ";
	$rs=$db->Execute($sql);
	if(!$rs)Error($db); 
	$sql="UPDATE ".$table." SET lft = lft+2 WHERE lft >= '".$left."' AND root_id='".$data["root_id"]."' ";
	$rs=$db->Execute($sql);
	if(!$rs)Error($db); 
	
	//尋找該層目前最大的排序
	$sql="select MAX(sort) as max_sort FROM ".$table." WHERE parent_id='".$data["parent_id"]."'";
	$rs=$db->Execute($sql);
	if(!$rs)Error($db); 
	$max=$rs->fields["max_sort"];
	
	//新增節點	
	$data["lft"] = $left; 
	$data["rgt"] = $left+1; 
	$data["sort"]= $max+1;	//新增的節點排序在最後	
	
	$rs=$db->AutoExecute($table,$data,'INSERT');

	
	if($rs) return true;
}	

//判斷上傳檔案
function check_upload_file($file,$upload_path,$multi="false")
{
	$file_str="";
	$file_arr=explode(",",$file);
	//組合存在的檔案字串
	if(is_array($file_arr))
	{
		foreach($file_arr as $key => $item)
		{
			if(is_file($upload_path.$item))
			{
				$file_str .= $item.",";	
			}
		}
	}
	
	if($file_str!="") 
	{
		$file_str = substr($file_str,0,-1);
		
		
		$file_arr=explode(",",$file_str);
		
		if($multi=="false")
		{
			//只抓最後一個
			$idx=count($file_arr)-1;
			$file_str = $file_arr[$idx];
		}
		else	//移除重複的
		{	
			for($i=0;$i<count($file_arr);$i++)
			{
				for($j=$i+1;$j<count($file_arr);$j++)
				{
					if($file_arr[$i]==$file_arr[$j])
					{
						unset($file_arr[$j]);	
					}
				}
			}
			
			$file_str="";
			foreach($file_arr as $key => $item)
			{
				if(is_file($upload_path.$item))
				{
					$file_str .= $item.",";	
				}
			}
			$file_str = substr($file_str,0,-1);
		}
	}	
	
	return $file_str;
}

//抓取表單需要寫入資料庫的資料
function getFormData($data,$token="^edit")
{
	$record = array();
	foreach($data as $key => $value)
	{
		//利用正規法來找搜尋欄位
		if(ereg($token,$key))
		{	
			 $field_name=substr($key,strlen($token));	//欄位名  p.s "edit_" :5字
			 //值是陣列的話拆成字串
			 if(is_array($value))
			 {
				 foreach($value as $item)
				 {
					  $record["$field_name"] .=quotes($item).":";
				 }
				 $record["$field_name"] = substr($record["$field_name"],0,-1);
				 
			 }
			 else
			 {
				  $record["$field_name"]=quotes($value);
			 }
		}
	}
	return $record;
}


function cache_html($type,$data=NULL)
{
	global $jpage;
	$tpl = new Smarty();
	$tpl->left_delimiter = '({';
	$tpl->right_delimiter = '})';
	$tpl->template_dir = APP_PATH . "/templates/";
	$tpl->compile_dir = APP_PATH . "/templates_c/";
	$tpl->config_dir = APP_PATH . "/configs/";
	$tpl->cache_dir = APP_PATH . "/cache/";
		

	if($type=="page")
	{
		$record["act"]="page";
		//開頭比數
		$jpage["start_date"] = $start_num=( $data["perpage"]*($data["now_page"]-1) )+1;
		
		//到了盡頭，只顯示共的筆數
		if($data["perpage"]*$data["now_page"] > $data["total"])
		 $jpage["end_date"] = $end_num = $data["total"];
		else 
		 $jpage["end_date"] = $end_num = $data["perpage"]*$data["now_page"];
		
		$total_page=ceil( $data["total"]/$data["perpage"] );
		
		$jpage["page_date_count"] = $data["total"];
		$jpage["now_page"] = $data["now_page"];
		$jpage["all_page"] = $total_page;
		
		$record["total_page"] = $total_page;
		$record["start_page"] = max($data["now_page"]-4,1);
		$record["end_page"]   = min($record["total_page"], $record["start_page"] + 9);
		
		
		//顯示資訊
		$record["info"]="顯示 ".$start_num." - ".$end_num." 筆，共 ".$data["total"]." 筆"; 
		$record["info2"]= $data["now_page"]." / ".$total_page;
		
		if(@$data["ajax"]==1)
		{
			//判斷上一頁下一頁
			if( $data["now_page"]==1  )	$jpage["up_url"]=$record["pre_url"]="ajax_page('".$data["url"]."','".$data["ajax_type"]."',1,'".$data["keyword"]."')";
			else						$jpage["down_url"]=$record["pre_url"]="ajax_page('".$data["url"]."','".$data["ajax_type"]."',".($data["now_page"]-1).",'".$data["keyword"]."')";
	
			if( $data["now_page"]==$total_page  )	$jpage["up_url"]=$record["next_url"]="ajax_page('".$data["url"]."','".$data["ajax_type"]."',".$total_page.",'".$data["keyword"]."')";
			else									$jpage["down_url"]=$record["next_url"]="ajax_page('".$data["url"]."','".$data["ajax_type"]."',".($data["now_page"]+1).",'".$data["keyword"]."')";

			$jpage["jump_page_url"]=$record["url"]=$data["url"];
			
			for($i=1;$i<=$total_page;$i++) $menu[$i]=$i;
			
			$event="onchange=\"ajax_page('".$data["url"]."','".$data["ajax_type"]."'".",this.value,'".$data["keyword"]."' )\"";
	
			//製作下拉選單
			$record["jump_menu"]=create_select("jump_page",$menu,$data["now_page"],"","分頁","style='vertical-align:middle;width:50px;'",$event);				
		}
		else
		{
			//判斷上一頁下一頁
			if( $data["now_page"]==1  )	$jpage["up_url"]=$record["pre_url"]="location='".$data["url"]."&page=1'";
			else						$jpage["down_url"]=$record["pre_url"]="location='".$data["url"]."&page=".($data["now_page"]-1)."'";
	
			if( $data["now_page"]==$total_page  )	$jpage["up_url"]=$record["next_url"]="location='".$data["url"]."&page=".$total_page."'";
			else									$jpage["down_url"]=$record["next_url"]="location='".$data["url"]."&page=".($data["now_page"]+1)."'";	

			$jpage["jump_page_url"]=$record["url"]=$data["url"];
			
			
			//for($i=$record["start_page"];$i<=$record["end_page"];$i++) 
			for($i=1;$i<=$record["total_page"];$i++) 
			{
				$record["page_num"][]=array(
					"url"	=>	($data["now_page"]==$i)?"<span style='color:black'>".$i.".</span>":"<a href=\"Javascript:location='".$data["url"]."&page=".$i."'\">".$i.".</a>",
					"class"	=>	($data["now_page"]==$i)?" class='active' ": ""
				);
				if ($data["now_page"]==$i) $selected = 'selected'; else $selected = '';
				$jpage["jump_page_html"] .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
			}
					
			for($i=1;$i<=$total_page;$i++) $menu[$i]=$i;
			
			$event="onchange=\"jump("."'".$record["url"]."'".",this.value )\"";
			
			//製作下拉選單
			$record["jump_menu"]=create_select("jump_page",$menu,$data["now_page"],"","分頁","style='vertical-align:middle;width:50px;'",$event);
						
		}
					
	}
	else if($type=="left_menu")
	{
		$big_menu=array();
		foreach($data as $key => $item)
		{
			if($item["Levelseq"]==0)
			{
				$big_menu[]=$item;
				//$big_menu[$key]["sub_menu"]=array();
			}
			else
			{
				foreach($big_menu as $key2 => $item2)
				{
					if( $item["Level"]==$item2["Level"])
					{
						$big_menu[$key2]["sub_menu"][]=$item;
						break;
					}
				}			
			}
		}
		

			
		$record["act"]=$type;
		$record["data"]=$big_menu;			
	}
	else 
	{
		$record["act"]=$type;
		$record["data"]=$data;		
	}	
	
	ob_start(); 	//打開快取
	$tpl->assign("record",$record);
	$tpl->display(ROOT_PATH.ADMIN_PATH.'templates/Sample_template.html');
	$data["html"] = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取
	
	$jpage["up_url"] = str_replace("'",'',$jpage["up_url"]);
	$jpage["down_url"] = str_replace("'",'',$jpage["down_url"]);
	$jpage["up_url"] = str_replace("location=",'',$jpage["up_url"]);
	$jpage["down_url"] = str_replace("location=",'',$jpage["down_url"]);
	
	return $data["html"];
}

//判斷狀態(列表json用)
function json_option($option,$value)
{
	$json = new Services_JSON();	//php4.x不支援 (json_encode)，用別人寫的class
	$option["selected"]=$value;	
	return $json->encode($option);	//for php 4.x
	//return json_encode($option);	for php 5.2 
}

//建立上傳檔案欄位
//$name:欄位名稱 $value:現有檔案字串 $floder:上傳到哪個資料夾 $path:相對路徑 $multi:允許多個上傳 $file_type:允許的上傳檔案
function create_upload_file($name,$value="",$floder="",$path='../',$multi="false",$file_type="*.jpg;*.jpeg;*.png;*.gif")
{
	$record["act"]="upload_file_page";
	$record["file_queue"]="fileQueue_".$name;
	$record["name"]=$name;
	$record["value"]=$value;
	$record["path"]=$path;
	$record["floder"]=$floder;
	$record["file_type"]=$file_type;
	$record["multi"]=$multi;
	$record["maxSize"]=(int)MAX_FILE_SIZE*1024;
	$record["url"] = "upload/".$floder."/";
	$record["exist_file"]=array();

	//判斷是否要呈現圖片
	$i=0;
	if($value!="")
	{
	
		$show_file = explode(",",$value);
		foreach($show_file as $item)
		{
			
			//判斷有無圖片
			$file_dir=$path."upload/".$floder."/".$item;
			
			unset($item);
			$item = array();
			
			if(is_file($file_dir)) 
			{
				
				//抓取副檔名
				$item["ext"]=$file_ext[count($file_ext)-1];
				$item["idx"]=$i;
				$item["file"] = $file_dir;
								
				//單筆上傳時呈現
				if($multi=="false")
				{	
					
					$item["class"]="single";
					
					if($file_ext[count($file_ext)-1]=="swf")
					{
						$item["upload_item"]='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="80%" >
                <param name="movie" value="'.$file_dir.'" />
                <param name="quality" value="high" />
                <embed src="'.$file_dir.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="80%" ></embed>
              </object>';
					}
					else
					{
				
						$item["upload_item"]= '<a href="'.$file_dir.'" target="_blank"><img src="'.$file_dir.'" style="max-width: 400px;" boder="0" /></a>';
					}	
	
				}
				else	//多筆上傳呈現
				{
					$item["class"]="multi";
					$item["upload_item"]='<a href="'.$file_dir.'"  target="_blank"><img src="'.$file_dir.'" width="80" border="0" /></a>';			
				}
	
				$record["exist_file"][]=$item;
				$i++;
			}//end is_file
		}//end foreach
	}
	
	$record["current_file_count"]=$i;

	
	if($multi=="false")
		$record["queue_class"]="";
	else
		$record["queue_class"]="fileQueue";
	
	
		
	$tpl = new Smarty();
	$tpl->left_delimiter = '({';
	$tpl->right_delimiter = '})';
	$tpl->template_dir = APP_PATH . "/templates/";
	$tpl->compile_dir = APP_PATH . "/templates_c/";
	$tpl->config_dir = APP_PATH . "/configs/";
	$tpl->cache_dir = APP_PATH . "/cache/";
	
	ob_start(); 	//打開快取
	$tpl->assign("record",$record);
	$tpl->display(ROOT_PATH.ADMIN_PATH.'templates/Sample_template.html');
	$file_html = ob_get_contents(); //接收快取頁面
	ob_end_clean(); //關閉快取

	return $file_html;
	
}

//建立input
function create_input($name,$data,$type="radio",$select_arr=NULL,$br_count=99,$mode=NULL,$event=NULL)
{

	
	$input_str="";
	$disabled="";
	if(empty($data))return false;
	
	if($mode=="lock") $disabled = "disabled='disabled'";


	$checked = "";
	$idx=1;
	foreach ($data as $value => $text)
	{	
		//若為複選
		if(is_array($select_arr))
		{
			foreach ($select_arr as $value2 => $text2)
			{
				if($text2==$value && $text2!=NULL)
				{
					
					$checked="checked='checked'";
					break;
				}
			}
		}
		else	//單選
		{
			if($select_arr==$value && $select_arr!=NULL)
			{
				$checked="checked='checked'";
			}		
		}
		$input_str .= "<input name='".$name."' type='".$type."' value='".$value."' ".$checked." ".$disabled." ".$event."  />".$text;
		if($idx%$br_count==0) $input_str .="<br>";
		$idx++;
		$checked="";
	}
	return $input_str;
}


//重建走訪(有新增、刪除、修改都要使用)  parent:要重建的根id   left:左側值
function rebuild_tree($parent,$left,$db,$table) {   
   // the right value of this node is the left value + 1   
   $right = $left+1;   
  
   //抓取所有子節點
   $sql="SELECT id FROM ".$table." WHERE parent_id ='".$parent."' ORDER BY sort asc,lft asc";	//order by sort,lft asc 最要 有了這個才會依據此排序
   $rs=$db->Execute($sql);
   if(!$rs)Error($db);    
   while ($row = $rs->FetchRow()) {   
       // recursive execution of this function for each   
       // child of this node   
       // $right is the current right value, which is   
       // incremented by the rebuild_tree function   
       $right = rebuild_tree($row['id'],$right,$db,$table);   
   }   
  
   // we've got the left value, and now that we've processed   
   // the children of this node we also know the right value  
   $sql="UPDATE ".$table." SET lft='".$left."', rgt='".$right."' WHERE id='".$parent."'";
   $rs=$db->Execute($sql);
   if(!$rs)Error($db); 
   
   // return the right value of this node + 1   
   return $right+1;   
}   


//排序
function sort_num($db,$table,$id,$val,$val_before,$where_sql=" 1=1 ")
{
	//防呆判斷
	$sql="SELECT MAX(sort) AS max_sort FROM ".$table." WHERE ".$where_sql;
	$rs = $db->Execute($sql);
	if(!$rs)Error($db);
	if($val > $rs->fields["max_sort"] || $val < 1 || $val_before > $rs->fields["max_sort"] || $val_before < 1 )
	{
		if($val > $rs->fields["max_sort"]) $val=$rs->fields["max_sort"];
		if($val <1) $val=1;
		if($val_before > $rs->fields["max_sort"]) $val_before=$rs->fields["max_sort"];
		if($val_before <1) $val_before=1;		
	}		
	//前後一樣不用動作
	if($val_before-$val!=0)
	{
		//更新日期
		$update	= date("Y-m-d H:i:s");
		//往上移
		if($val_before - $val >0 )
			$sql="UPDATE ".$table." SET sort=sort+1 WHERE sort BETWEEN ".$val." AND ".($val_before-1)." AND ".$where_sql;
		else
			$sql="UPDATE ".$table." SET sort=sort-1 WHERE sort BETWEEN ".($val_before+1)." AND ".$val." AND ".$where_sql;
		$rs = $db->Execute($sql);
		if(!$rs)Error($db);
		//最後更新自己的
		$sql="UPDATE ".$table." SET sort='".$val."',update_date='".$update."' where id='".$id."'";
		$rs = $db->Execute($sql);
		if(!$rs)Error($db);
	}

}

//建立img
function create_img($src,$id,$url)
{
	$img_str="<a href='".$url."'><img src='".$src."' name='sort".$id."' id='sort".$id."' style='border:none'></a>";
	return $img_str;
}



//建立select
function create_select($name,$data,$select_val="",$mode=NULL,$default="請選擇",$style=NULL,$event=NULL)
{
	$disabled = "";
	if($mode=="lock") $disabled="disabled='disabled'";
	
	$input_str="<select name='".$name."'  id='".$name."' ".$disabled." ".$style." ".$event." ><option value='' selected='selected' >".$default."</option>";
	if(empty($data))
	{
		$input_str.="</select>";
		return $input_str;
	}
	foreach ($data as $value => $text)
	{	
		$selected="";
		if($select_val=="") $select_val=-1;//防止0 跟 ""視為相同
		if($select_val==$value)
		{
			$selected="selected='selected'";
		}
		$input_str .= "<option value='".$value."' ".$selected." >".$text."</option>";
	}
	$input_str.="</select>";
	return $input_str;
}

//抓取tree資料 ($root:要找的資料的根id $start:從第幾筆資料開始 $count:一次撈幾筆 $where_sql:條件式 $total_data:各個類別同層總數資料 )
// $start $count $where_sql 為選填 視情況運用
function display_tree($root,$db,$table,$start=0,$count=0,$where_sql="",$total_data="")	 
{
	//初始化
	if($count==0)$limit_sql="";
	else $limit_sql="limit $start,$count";  
   //若沒有條件式，則抓傳進來的id為根目錄
   if($where_sql=="") $where_sql=" and  root_id='".$root."' ";
   
   //參數設定
   $data=array();	//回傳資料
   
   //尋找根節點的左、右兩測值 
   $sql="SELECT lft, rgt, depth FROM ".$table." WHERE id='".$root."'";
   $rs=$db->Execute($sql);
   if(!$rs)Error($db);
   $row = $rs->FetchRow();  

  
   //抓取總數   
   $sql="SELECT count(*) as total_count FROM ".$table."  
         WHERE lft BETWEEN ".$row['lft']." AND ".$row['rgt']." AND root_id='".$root."' AND id <> ".$root." ".$where_sql." ORDER BY lft ASC,sort ASC ";
	$all_total = $db->GetRow($sql);
	   
   //開始走訪相關節點  
   $sql="SELECT * FROM ".$table."  
         WHERE lft BETWEEN ".$row['lft']." AND ".$row['rgt']." AND root_id='".$root."' AND id <> ".$root." ".$where_sql." ORDER BY lft ASC,sort ASC ".$limit_sql;
	
   $rs=$db->Execute($sql);
   //if(!$rs)Error($db);
 	
   //開始抓資料
   $i=0;
   if ($rs)
   while ($row = $rs->FetchRow()) {  
   		
       //不抓根資料
       if($row["id"] !=$root)	
	   {
			//啟動總數配對
			if($total_data!="")
			{
				for($j=0;$j<count($total_data);$j++)
				{
					//找到配對將總數丟出
					if($total_data[$j]["parent_id"]==$row["parent_id"])
					{
						$row["total"]=$total_data[$j]["total"];
						break;
					}
				}
			}
			$row["all_total"] = $all_total["total_count"];
			$row["show_text"] = str_repeat( '&nbsp;',($row["depth"]-1)*6 ) . deQuotes($row['name']);	//顯示用title(縮排)
			$row["space"]	  = str_repeat( '&nbsp;',($row["depth"]-1)*6 );								//顯示空白
			
			$data[$i]=$row; //將所有資料紀錄傳出		   
		 				
	   		$i++;
	   } 
   }  
   

   //print_r($data);
	return $data;
} 
//將 資料庫 撈出來資料 之圖片 拆解 重組
function Data_List_Pic($pic)
{
	$tmp = explode("|__|",$pic);//複數圖片時 以　|__| 區隔
	foreach($tmp as $k=>$v)
	{
		$tmp_2 = explode(",",$v);//一張圖片 檔名 寬 高 以 , 區隔
		$new_pic[$k] = $tmp_2;//組成之後 成為 array('0'=>array(檔名,寬,高),'1'=>(後略 之array
		
		$tmp_3 = explode(".",$tmp_2["0"]);//拆出副檔名 判斷檔案格式
		@$new_pic[$k]["file"] = $tmp_3["1"];
	}
	return $new_pic;
}









/* 計算檔案大小 */
function CalcDirectorySize($DirectoryPath) {
 
    // I reccomend using a normalize_path function here
    // to make sure $DirectoryPath contains an ending slash
    // (-> http://www.jonasjohn.de/snippets/php/normalize-path.htm)
 
    // To display a good looking size you can use a readable_filesize
    // function.
    // (-> http://www.jonasjohn.de/snippets/php/readable-filesize.htm)
 
    $Size = 0;
 
    $Dir = opendir($DirectoryPath);
 
    if (!$Dir)
        return -1;
 
    while (($File = readdir($Dir)) !== false) {
 
        // Skip file pointers
        if ($File[0] == '.') continue;
 
        // Go recursive down, or add the file size
        if (is_dir($DirectoryPath . $File))
            $Size += CalcDirectorySize($DirectoryPath . $File . DIRECTORY_SEPARATOR);
        else
            $Size += filesize($DirectoryPath . $File);
    }
 
    closedir($Dir);
 
    return $Size;
}


//- 判斷兩個日期差距值 (日)
function date_between($date1,$date2=NULL)
{
	if ($date2==NULL) $date2 = date("Y-m-d H:i:s");
	
	$tps = abs(strtotime($date1)-strtotime($date2));
	$tps = ($tps/86400);

	return $tps;
}

//--連棟刪除目錄所有項目

function deleteDir($dirPath) {

	if (!is_dir($dirPath)) {
		return unlink($dirPath);
	}else{
		if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
			$dirPath .= '/';
		}
	}
	if (!is_dir($dirPath)) {
		return unlink($dirPath);
	}
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
?>