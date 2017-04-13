<?php
global $_SETUP;
global $web_set;
$console->load->module('foor');
$act = $console->path[1];
//--引用與設定
$member = new member($console->conn,PREFIX."member");
$member->work();

/*
//相同登入會員使用不同命名空間
$member2 = new member($console->conn,PREFIX."member");
$member2->clone_of($member,'member2');
*/

//--設定認證信功能
$member->check_mail = 1;
//--信箱title設定 (不使用SMTP也要設定)
$member->set_mail($web_set['title'],$web_set["send_email"]);
//smtp設定
$smtp_set = $console->conn->GetRow("select * from ".PREFIX."data_list where type='smtp_mail' and status=1");
if ($smtp_set) {
	$smtp_set["detail"] = explode('|__|',$smtp_set["detail"]);
	$member->smtp_setting($smtp_set["detail"][1],$smtp_set["detail"][3],$smtp_set["detail"][4],$smtp_set["detail"][2]*1,$smtp_set["detail"][0]);
}


//## 購物車
$shopping_car = new order($console->conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");


$no_check = array('login','fotgot','join','open','net_login');
if (!$member->status() && !in_array($act,$no_check)){

	//linkto($console->_j_web_set['main_path']."/member/login");
	exit;
}


//--社群按鈕
$data["twitterurl"] = '//'.$_SERVER['HTTP_HOST'].'/includes/twitter/twitterapi.php?callback='.urlencode('//'.$_SERVER['HTTP_HOST'].'/member/net_login');
$data["yahoourl"] = '//'.$_SERVER['HTTP_HOST'].'/includes/openid/yahooapi.php?callback='.urlencode('//'.$_SERVER['HTTP_HOST'].'/member/net_login');
$data["fburl"] = 'javascript:fblogin();';
$data["googleurl"] = '//'.$_SERVER['HTTP_HOST'].'/includes/googleapi/googleapi.php?callback='.urlencode('//'.$_SERVER['HTTP_HOST'].'/member/net_login');

switch ($act){
	
	
	case "detail":
		$_SESSION["member_info"]["member"] = $member->getinfo();
		
		//--級別
		$temp = $console->conn->GetRow("select * from ".PREFIX."data_list where type='memberdesh' and new_type='".$_SESSION["member_info"]["member"]["type"]."'");
		$_SESSION["member_info"]["member"]["type_html"] = $temp["name"];
		
		if ($_POST){
			unset($_POST["account"]);
			if ($member->update($_POST)){
				alert($console->tags('UPDATE_SURE'),$console->_j_web_set['main_path']."/member/detail"); // 修改成功!!
				exit;
			}else{
				alert($member->erromsg,-1);exit;
			}
		}
	break;
	
	case "cpw":
		if ($_POST)
		//--判斷有新密碼 以及  (舊密碼等於會員中的資料 或者 不需要判別資料)
		if ($_POST["new_password"] && ( md5($_POST["password"])==$member->getinfo('password') || $_GET["nock"] ) ){
			$update["password"] = $_POST["new_password"];
			$update["create_date"] = date("Y-m-d H:i:s");
			if ($member->update($update)){
				alert($console->tags('UPDATE_SURE'),$console->_j_web_set['main_path']."/member/detail");//修改成功!!
				exit;
			}
		}else{
			alert($console->tags('INFO_INSERT_ERRO'),-1);//填入的資訊有誤!!
			exit;
		}
	break;
	
	case "logout":
			$member->logout();
			alert($console->tags('LOGOUT_SURE'),'-1');//已成功登出!!
			exit;
	break;
	

	case "fotgot":
		if ($_GET["auth"]){
			if ($member->recive_check_mail($_GET)){
				print "<meta http-equiv=Content-Type content=text/html; charset=utf-8>";
				echo '<form id="form1" action="member?act=cpw&nock=1" method="post"><input type="hidden" name="password" value="'.base64_decode(urldecode($_GET["auth"])).'"><br>';
				echo $console->tags('PLEASE_ENTER_PASSWORD').':<input type="password" name="new_password" id="password" value=""><br>';
				echo $console->tags('PLEASE_ENTER_PASSWORD_AGAIN').':<input type="password" id="new_password" value=""><br>';
				echo '<input type="button" value=" '.$console->tags('SEND').' " onclick="checkdata()"></form>
				<script>
				function checkdata(){
					if(document.getElementById("password").value=="" || document.getElementById("password").value==null){
						return alert("'.$console->tags('PASSWORD_OLD_REQUIRE').'");
					}
					if (document.getElementById("password").value==document.getElementById("new_password").value){
						document.getElementById("form1").submit();
					}else{
						alert("'.$console->tags('PASSWORD_SECOND_REQUIRE').'");
					}
				}
				</script>
				';
				
			}else{
				alert($console->tags('PASSWORD_CHANGE_VILED_AGAIN'),'/');//資訊來源錯誤!!請重新發送密碼驗證信件!!
			}
			exit;
		}
		
		if ($_POST["account"]){
			$new_pd = $member->fotgot("account",$_POST["account"]);
		}else if ($_POST["email"]){
			$new_pd = $member->fotgot("email",$_POST["email"]);
		}
		if ($new_pd) alert($console->tags('PASWORD_CHANGE_MAIL_FINSH'),$console->_j_web_set['main_path']."/member/detail");//已寄出密碼修改信件!!
	break;
	
	
	
	case "net_login":
		if ($_POST){
			//--判斷資料類別
			switch ($_POST["netclass"]){
				case "twitter":
					$row = 'twitter';
				break;
				case "yahoo":
					$row = 'yahoo';
				break;
				case "fb":
					$row = 'fb';
				break;
				case "google":
					$row = 'google';
				break;
				default:
					alert('接收的資料不符合預期結果!!',$console->_j_web_set['main_path']."/");
					exit;
				break;
			}
			//針對接收到的資料做處理 判斷有否相關社群網站資料 沒有者 新建立資料
			if (!$member->net_login($row,$_POST)){
					alert($console->tags('SYSTEM_ERRO'),-1);//系統發生錯誤!!
			}
			
			linkto($console->_j_web_set['main_path']."/member/detail");
		}
	break;
	
	
	
	case "join":
		if ($member->status()){
			linkto($_SERVER['PHP_SELF'].'?act=detail');
		}
		if ($_POST){
			if (!verifycode_check($_POST["code"])){
				alert($console->tags('VAILD_CODE_ERRO'),-1);exit;
			}
			if (!$_POST["account"]) $_POST["account"] = $_POST["email"];
			$backdata = $member->newjoin($_POST);
			if (is_array($backdata)){
				alert($console->tags('CREATE_ACCOUNT_SURE'),$console->_j_web_set['main_path']."/member/detail");exit;//帳號申請成功
			}else{
				alert($backdata,"-1");exit;
			}
		}
	break;
	
	
	case "order":
		$data["mount"] = $mount = 10;
		$data["orderlist"] = $shopping_car->order_list(NULL,($_GET["page"]*1-1)*$mount,$mount);
		$cousql = $shopping_car->order_list();

		$data["page"] = page_show($cousql,$mount);
		
		if ($data["orderlist"])
		foreach ($data["orderlist"] as $k=>$v){
				$data["orderlist"][$k]["update_date"] = date("Y-m-d",strtotime($v["update_date"]));
				switch ($v["pay_status"]){
					case "1":
						switch ($v["cargo_status"]){
							case "1":
								$data["orderlist"][$k]["status_html"] = '已出貨';
							break;
							default:
								$data["orderlist"][$k]["status_html"] = '出貨中';
							break;
						}
					break;
					default:
						$data["orderlist"][$k]["status_html"] = '<a href="shopping?payorder='.$v["id"].'">待付款</a>';
					break;
				}

		}
		if ($_GET["id"]){
			$order = $shopping_car->order_list(quotes($_GET["id"]));
			$data["order"] = $order[0];
			$data["carlist"] = $shopping_car->car_list(quotes($_GET["id"]),'sort,name');
		}
	break;
	
	case "open":
		if ($member->recive_check_mail($_GET)){
			alert($console->tags('RECIVE_CHECK_ACCOUNT'),$console->_j_web_set['main_path']."/");//會員帳戶認證完成!!
		}else{
			alert($member->erromsg,$console->_j_web_set['main_path']."/");
			exit;
		}
	break;
	
	case "remove":
		if (!$member->remove($_GET["row"],$_GET["data"])){
			alert($member->erromsg,-1);
		}
	break;
	
	default:
		if ($member->status()) linkto($console->_j_web_set['main_path']."/member/detail");
		if ($_POST){
			if ($member->login($_POST["account"],$_POST["password"])){
				/*先清除原有購物車內容*/
				$shopping_car = new order($console->conn,PREFIX."shopping_car",PREFIX."shopping_car_list",PREFIX."products");
				$temp_del = $shopping_car->car_list();
				if ($temp_del){
					$temp_id_str = '';
					foreach ($temp_del as $k=>$v){
						if ($temp_id_str != '') $temp_id_str .= ',';
						$temp_id_str .= $v["shopping_car_list_id"];
					}
					$shopping_car->car_remove($temp_id_str);
				}

				
				if ($_SESSION["login_page"]){ //-判斷有否暫存頁面
					$temp = $_SESSION["login_page"];
					unset($_SESSION["login_page"]);
					linkto($temp);
				}else{
					linkto($console->_j_web_set['main_path']."/member/detail");
				}
			}else{
				alert($console->tags('INFO_INSERT_ERRO'),-1);//請確認資料是否正確
				exit;
			}
		}
	break;
}

$console->module->foor($console->path[0].'_'.$console->path[1]);
$console->module->foor
->set('data',$data)
->set('member_info',@$_SESSION["member_info"])
->set('cookie',@$_COOKIE["cookie"])
->set("setup", $_SETUP)//config設定檔
->set("content",@$content)
->set("web_set",@$web_set)
->set("lang",@$_SESSION["mode_lang"]);
$console->module->foor->work();
?>