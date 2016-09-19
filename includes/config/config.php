<?php
$admin_path = "serback/";

define('ADMIN_PATH',$admin_path);
define('DATE',date("Y-m-d H:i:s"));


if(!isset($_GET["page"]) || !isNumber($_GET["page"])) {$page = $_GET["page"] = 1;}else{$page = $_GET["page"];}
$per_page_qty = 10;

if(@$_REQUEST["id"]) $id = $_REQUEST["id"];

$_SETUP["status"] = array ( '1' => '開啟','0' => '關閉');
$_SETUP["member_status"] = array ( '1' => '開啟','0' => '關閉','2' => '未認證');

$_SETUP["sex"] = array ( '1' => '男','2' => '女');
$_SETUP["member_mode"] = array('normal'=>'一般會員','fb'=>'FB串接帳戶');
$_SETUP["member_type"] = array('member'=>'一般會員','wkmember'=>'白金會員','gkmember'=>'黃金會員');


$_SETUP["lang"] = array('gb'=>'简体中文','ch'=>'繁體中文','en'=>'英文','de'=>'德文');

$_SETUP["keyword"] = array ('name','detail');//搜尋form 之 keyword 欲搜尋之欄位名稱

$_SETUP["page_get_url"] = array('0','page','id','part','order');

$_SETUP["date"] = date("Y-m-d H:i:s");

$_SETUP["year_range"] = array('1980','2020');//年份範圍

//--------------------SMARTY section 值 呈現 設定
for($i=0;$i<100;$i++) $_SETUP["smarty_count"][$i] = $i;

//--------------------上傳圖片,檔案設定
$_SETUP["pic_type"] = array('jpg','gif','jpeg','png');
$_SETUP["file_type"] = array('doc','docx','pdf','xls');


//------------商品分類
$_SETUP["pro_class"] = array('1'=>'健康早餐','2'=>'體重管理','3'=>'運動營養','4'=>'孕婦營養');


//-------------購物車
$_SETUP["shopping_car_status"] = array('1'=>'購物中','2'=>'購物完成','3'=>'付款完成','4'=>'失效定單');
$_SETUP["shipped"] = array('0'=>'未出貨','1'=>'已出貨');
$_SETUP["payment_status"] = array('0'=>'未付款','1'=>'已付款','2'=>'回傳資料有誤','9'=>'失效');


//--------------金流設定
//$_SETUP["paycardmode"] = array('1'=>'線上刷卡','2'=>'超商付款');
$_SETUP["paytype"] = array('1'=>'線上刷卡','2'=>'超商付款','3'=>'ATM轉帳','4'=>'貨到付款','5'=>'WEBATM');



$_SETUP["title_img"] = array(
'history_case'=>'title-case.png',
'qa'=>'title-faq.png',
'product'=>'title-product.png',
'service'=>'title-service.png',
'about'=>'title-about.png'
);


//--------------------左右節點
$_SETUP['icon']=array(
	"up"	=> "images/up_btn.jpg",
	"down"	=> "images/down_btn.jpg",
	"no"	=> "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
);


$_SETUP["obj"] = array('b_name'=>'名稱','detail'=>'說明');
$_SETUP["new_tage"] = array('1'=>'特價','2'=>'快訊');

$_SETUP['dbact'] = array('INSERT'=>'新增','UPDATE'=>'修改','DELETE'=>'刪除','DELETE_false'=>'刪除[f]');

$_SETUP['AddBtn'] 	= "新增";
$_SETUP['EditBtn'] 	= "編輯";
$_SETUP['DelBtn'] 	= "刪除";
$_SETUP['BackBtn'] 	= "返回";
$_SETUP['SaveBtn'] 	= "儲存";

$_SETUP['groupStatus']	= array('0' => '關閉','1' => '開啟');

define('ACCOUNT_ERROR',"帳號格式錯誤。");
define('ACCOUNT_EXIST',"帳號已有人申請，請確認");

define('PWD_ERROR',"密碼格式錯誤。");

define('EDIT_ERROR',"您尚有必填資料未填，請確認。");

define('ADD_MSG',"新增成功。");
define('EDIT_MSG',"修改成功。");
define('DEL_MSG',"刪除成功。");

define('ADD_TITLE',"新增");
define('EDIT_TITLE',"修改");
define('LIST_TITLE',"清單");


define('NO_DATA',"此資料不存在，請確認！");
define('MAX_FILE_SIZE',"2048");


define('FB_appid',"537434216325277");
define('FB_secret',"100b234ffade1f2b7da3c2577ba0e0b8");
define('FB_url',"http://ezpeer.borna.com.tw/");

$array = array('97'=>'live','98'=>'project_live','99'=>'re_new','100'=>'b_ds');

$_SETUP["json"] .= " var SETUP = ".json_encode($_SETUP).";";//json

//--後台設定頁面
$_SETUP["setting_type"] = array('backup','website_status','website_url','delay_time','demo_show','web_css','recaptcha');


?>