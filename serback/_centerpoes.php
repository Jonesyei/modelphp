<?PHP 
/* create by Jones

成為編輯器欄位設定 表示方式  $data["one"][欄位名稱.'_fck'];
成為簡易版編輯器欄位設定 表示方式  $data["one"][欄位名稱.'_fck_easy'];
成為日期選擇器設定  表示方式  $data["one"][欄位名稱.'_datepicker'];
----------------------------------------------------說明文件 ---  導入參數設定
//列表頁參數
$cpos["pagecount"] = 2; //每頁顯示筆數
$cpos["tablelistwhere"] = "WHERE type='banner'";//列表顯示資料的條件
$cpos["tablerow"] = "a,b,c"; //檢視欄位設定
$cpos["table"] = " mallwed_mvideo";
$cpos["tablejoin"] = ''; //加入參照
$cpos["listorderby"] = 'status';//列表頁排序方式
$cpos["del"] = ''//假刪除模式 不需要假刪除請完整刪掉此段 = 宣告為 status 為此變
$cpos['group_by'] = 'group by XX'; //依據欄位群組合併

//內容頁參數
$cpos["tablewhere"] = 'id='.$_GET["id"]; //內容頁檢視條件
$cpos["tablerow"] = "a,b,c"; //檢視欄位設定
$cpos["table"] = " mallwed_mvideo";
$cpos["tablejoin"] = '';
$cpos["fck_set"] = array('欄位1','欄位二');//成為編輯器欄位設定 取出編輯器內容 欄位名稱_fck
$cpos["fck_bodyclass"] = array('detail'=>'content');  //將detail 編輯器欄位預設式樣class 屬性設置為content
$cpos["md5encode"] = array('欄位1','欄位2');//md5加密 欄位 如傳空值 自動刪除不輸入到資料庫
$cpos["onlydetail"] = '1';  //只顯示內容頁

//搜尋表單參數
  欄位設置 欄位名=>get值
  預設s_(欄位名)自動對應搜尋[含判斷欄位形態]
$cpos["search"] = array('name'=>'keyword','detail'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass');
$cpos['search_left']  = array('class','name');//針對欄位字串陣列or比對

//檔案上傳
$cpos["file_url"] = "";//上傳的目錄位置ex :upload/
$cpos["re_img_w"] = '1'; //縮圖處理 寬 值  設定兩項才會執行縮圖處理
$cpos["re_img_h"] = '1'; //縮圖處理 高 值
$cpos["file_check"] = ""; //檔案比對功能 array("pic","file") or "file,pic";

//排序設定
$cpos["sort_class"] = "class"; //--列表頁有多個不同類別 依照此欄位配排序
$cpos["sort_mode"] = "asc" //-- asc 往後增加 desc 為第一個 預設為asc


//--返回參數
$cpos["insert_callback"] = ''	//新增成功返回
$cpos["update_callback"] = ''	//修改成功返回
$cpos["delete_callback"] = ''	//刪除成功返回
*/
//預設值設定

if ($_GET["daterange"] && is_array($_GET["daterange"])) $_GET["daterange"] = implode(' - ',$_GET["daterange"]);
if (!isset($cpos["sort_mode"]) || $cpos["sort_mode"] == '') $cpos["sort_mode"] = 'desc';
if ($cpos["pagecount"] == NULL || $cpos["pagecount"] == '') $cpos["pagecount"] = 10;
if ($cpos["listorderby"] != NULL && $cpos["listorderby"] != '') $cpos["listorderby"] = ' ORDER BY '.$cpos["listorderby"];
if ($cpos["status"]==NULL || $cpos["status"]=='') $cpos["status"] = $_SETUP["status"];
if ($cpos["file_check"] == NULL ) $cpos["file_check"] = "pic";
if (!is_array($cpos["file_check"])) $cpos["file_check"] = explode(',',$cpos["file_check"]);
if ($cpos["search"]==NULL || $cpos["search"]=='') $cpos["search"] = array('name'=>'keyword','detail'=>'keyword','create_date'=>'daterange','status'=>'s_status','class'=>'searchclass'); 
//--------------------------------------------------------------------------


//---版本比對驗證
$cpos_version = '1.0.1';
$cpos_check_version = $conn->GetRow("select @centerpos as data");
if (md5(sha1(base64_encode($cpos_version)).strtolower($_SERVER["HTTP_HOST"]))!=$cpos_check_version["data"]) {
	echo '核心版本驗證錯誤!!'.'目前核心版本為v'.$cpos_version;exit;
}

//--擷取資料表內容
$cpos_table_row = $conn->GetArray("desc ".$cpos["table"]);
if (!$cpos_table_row) {
	cpos_create_table($cpos["table"]);//--沒資料表自動建立
	$cpos_table_row = $conn->GetArray("desc ".$cpos["table"]);
}
foreach ($cpos_table_row as $k=>$v){ //--取得資料表欄位資料進行判斷
	$row_colum_key[] = $v[0];$row_colum_type[] = $v[1];
}

//--自動去除沒有欄位的資料集
//檔案檢測
foreach ($cpos["file_check"] as $k=>$v){
	if (!in_array($v,$row_colum_key)) unset($cpos["file_check"][$k]);
}

//檔案檢測
foreach ($cpos["search"] as $k=>$v){
	if (!in_array($k,$row_colum_key)) unset($cpos["search"][$k]);
}

//---------復原修改
if ($_GET["re_data_temp"]!=NULL&&$_GET["re_data_temp"]!=''&&$_SESSION["admin_info"]["data_temp"]!=''&&$_SESSION["admin_info"]["data_temp"]!=NULL){
	switch ($_SESSION["admin_info"]["act_temp"]){
		case "DELETE_false":
		case "UPDATE":
			foreach ($_SESSION["admin_info"]["data_temp"] as $k=>$v){
				
				//-刪除異動後過時資料
				$temp_data = $conn->GetRow("select ".implode(',',$cpos["file_check"])." from ".$cpos["table"]." where id='".$v["id"]."'" );
				foreach ($cpos["file_check"] as $a=>$b){
					file_dpie(explode('|__|',$temp_data[$b]),explode('|__|',$v[$b]));
				}///--end foreach file_check
				$avalue = $conn->AutoExecute($_SESSION["admin_info"]["table_temp"],$v,"UPDATE","id=".$v["id"]);
			}
		break;
		case "INSERT":
			if ($_SESSION["admin_info"]["data_temp"]!='' && $_SESSION["admin_info"]["data_temp"]!=NULL) {
				
				//-刪除異動後過時資料
				$temp_data = $conn->GetRow("select ".implode(',',$cpos["file_check"])." from ".$cpos["table"]." where id='".$v["id"]."'" );
				foreach ($cpos["file_check"] as $a=>$b){
					file_dpie(explode('|__|',$temp_data[$b]),array());
				}///--end foreach file_check
				
				$avalue = $conn->Execute("DELETE FROM ".$cpos["table"]." WHERE id in (".$_SESSION["admin_info"]["data_temp"].")");
			}
		break;
		case "DELETE":
			foreach ($_SESSION["admin_info"]["data_temp"] as $k=>$v){
				$avalue = $conn->AutoExecute($_SESSION["admin_info"]["table_temp"],$v,"INSERT");
			}
		break;
	}
	unset($_SESSION["admin_info"]["data_temp"]);
	unset($_SESSION["admin_info"]["table_temp"]);
	unset($_SESSION["admin_info"]["act_temp"]);
	alert('前一筆更新資料已被還原!!',-1);
	exit;
}





//------md5表單自動刪減
if ($_POST){
	foreach ($_POST as $k =>$v){
		if ($cpos["md5encode"] != NULL && in_array($k,$cpos["md5encode"])){
			if ($v == NULL || $v == ''){
				unset($_POST[$k]);
			}else{
				echo $v.' '.$k;exit;
				$_POST[$k] = md5($_POST[$k]);
			}
		}
	}
}




//--------判斷是否為讀取單筆資料 step 1
if($_GET["id"]!=NULL && $_GET["id"]!="")
{
	$_SESSION["admin_info"]["view"] = "detail";
}
else//列表頁
{
	if ($cpos["onlydetail"] != '' && $cpos["onlydetail"] != NULL) { //--強制顯示內容頁
		$_SESSION["admin_info"]["view"] = "detail";
	}else{
		$_SESSION["admin_info"]["view"] = "list";
	}
}



//-------判斷是否有搜尋條件 step 2
/*
	create by Jones
	此搜尋法針對以下陣列參數外  '欄位值'=>'get值'
	另外判斷針對s_(欄位名稱) 的get參數
*/
if ($_SESSION["admin_info"]["view"]=="list"){
	if ($cpos["tablelistwhere"]==NULL||$cpos["tablelistwhere"]=='')	$search = NULL; else $search = ' ';
	foreach ($conn->GetArray("desc ".$cpos["table"]) as $k=>$v) {$row_colum_key[] = $v[0];$row_colum_type[] = $v[1];}//--擷取資料表所有欄位
	
	//--欄位設置
	$search_array = $cpos["search"];
	
	foreach ($_GET as $k=>$v){ //--取得參數資料
		if (strpos($k,'_') && $v!='' && $v!=NULL){
			$k = explode('_',$k,2);
			if (strtolower($k[0])=='s'){
				unset($k[0]);
				$k = implode('_',$k);
				foreach ($row_colum_key as $n1 =>$n2) {
					if ($n2==$k){//---判斷有否在該資料表中有此欄位
						if ($search==NULL||$search=='') $search = " where "; else $search .= " and ";
						if (strpos(strtolower($row_colum_type[$n1]),'text')!==false || strpos(strtolower($row_colum_type[$n1]),'varchar')!==false) {
							$search .= $k." like '%".$v."%'";
						}else if (strpos('datetime',strtolower($row_colum_type[$n1]))){
							$search .= ' AND '.$k.' >=\''.$v.' 00:00:00\' and '.$k.' <\''.$v.' 23:59:59\'';
						}else{
							$search .= $k."='".$v."'";
						}
					}
				}
			}
			
			
		}else if ($v!=NULL&&$v!=''){//----if (strpos($v,'s_')) else
			$search_list=NULL;
			foreach ($search_array as $n1=>$n2){
				if ($n2==$k){
					switch($k){
						case "keyword":
							$search_list[] = $n1." like '%".$v."%'";
						break;
						case "daterange":
							$daterange = explode('-',$v);
							$daterange[0] = str_replace('.','-',$daterange[0]);	$daterange[1] = str_replace('.','-',$daterange[1]);
							if (trim($daterange[0])!='' && trim($daterange[1])!='')
							$search_list[] = $n1.' >=\''.$daterange[0].' 00:00:00\' and '.$n1.' <\''.$daterange[1].' 23:59:59\'';
						break;
						default:
							$search_list[] = $n1."='".$v."'";
						break;
					}
				}
			}
			
			if ($search_list!=NULL) {
				if ($search==NULL||$search=='') $search = " where "; else $search .= " and ";
				$search_near = '';
				foreach ($search_list as $m1=>$m2){
					if ($m1>0) $search_near .= ' or ';
					$search_near .= '('.$m2.')';
				}
				$search .= '('.$search_near.')';
			}
			
		}///----if (strpos($v,'s_')) end
	}
	$cpos['search_output'] = $search;
}




/** 資料庫空間檢測*/
if ($_POST && $ini_webset["web_set"]["upload_check_status"]=='1'){
	$db_total_disk = 0;
	$db_disk = $conn->GetArray("SHOW TABLE STATUS");
	if ($db_disk)
		foreach ($db_disk as $k=>$v){
			$db_total_disk += $v["Data_length"]*1+$v["Index_length"]*1;
		}
	if ($db_total_disk*1>=($ini_webset["web_set"]["db_max_size"])){
		$db_full_check = true;
	}
}





///-------------排序
if ($_POST["act"] =="all" && !$db_full_check) {
	//-- 找尋是否有_
	foreach ($_POST as $k => $v)
	{
		if (strpos($k,"_")){
			$k = explode("_",$k);
			$jkin = $k;
			if ($cpos["sort_class"]==NULL||$cpos["sort_class"]==''){ //--判斷是否有排序參數
				if ($cpos["tablelistwhere"] == '' || $cpos["tablelistwhere"] == NULL) {
					$where = ' WHERE id="'.$jkin[count($jkin)-1].'"';
				}else{
					$where = ' '.$cpos["tablelistwhere"].' AND id="'.$jkin[count($jkin)-1].'"';
				}
			}else{
				$where = ' where id="'.$jkin[count($jkin)-1].'"';
			}
			
			//--為排序的話
			unset($jkin[count($jkin)-1]); $jkin = implode('_',$jkin);
			if (strtolower($k[0])=='sort'){
				$temp_value = (($v*1)-0.1); //使用倍精確型別 -0.1 來取得為前值項
				$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET ".$jkin." = ".$temp_value.$where);
			}else{
				$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET ".$jkin." = '".$v."' ".$where);
			}
		}
	}
	cpos_resort(); //-重置排序參數
}







//---修改、新增資料 表單資料 導入陣列存入
if ($close["edit"] != '1' || $close["add"] != '1'){
if ($_POST && $_POST["act"] !="all" && !$db_full_check) {
	
	//------判斷是否有這個資料夾 沒有就創建一個
	if ($cpos["file_url"] && !is_dir($cpos["file_url"])){
		mkdir($cpos["file_url"],0777,true);
	}
	//---------檔案上傳 直接一起寫入post
	$image_array = array('bmp','jpg','jpeg','png','gif');
	$temp_size = 0;
	foreach ($_FILES as $k=>$v){
		if (is_array($_FILES[$k]["name"])){ //---判斷為陣列名稱相同物件上傳
			foreach ($_FILES[$k]["name"] as $n1=>$n2){
				if ($n2!=''||$n2!=NULL){
				$temp_file_name = explode('.',$n2);
				$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
				if (in_array($after_name,$image_array)&&$cpos["re_img_w"]!=NULL&&$cpos["re_img_h"]!=NULL){//上傳的檔案圖片就縮圖處理
					ImageResize($_FILES[$k]["tmp_name"][$n1], $cpos["file_url"].$temp_file_name,$cpos["re_img_w"],$cpos["re_img_h"]);
				}else{
					move_uploaded_file($_FILES[$k]["tmp_name"][$n1],$cpos["file_url"].$temp_file_name);
				}
				$temp_fileupload[] = $cpos["file_url"].$temp_file_name;
				$temp_size += $_FILES[$k]["size"][$n1];
				$_POST[$k][] = $temp_file_name;
				}
			}	
		}else{
			if ($_FILES[$k]["name"]!=''||$_FILES[$k]["name"]!=NULL){
				$temp_file_name = explode('.',$_FILES[$k]["name"]);
				$after_name = $temp_file_name[count($temp_file_name)-1];//副檔名
				$temp_file_name = strtotime(date('Y-m-d H:i:s')).rand(10,99).'.'.$after_name;
				if (in_array($after_name,$image_array)&&$cpos["re_img_w"]!=NULL&&$cpos["re_img_h"]!=NULL) {//上傳的檔案圖片就縮圖處理
					ImageResize($_FILES[$k]["tmp_name"], $cpos["file_url"].$temp_file_name,$cpos["re_img_w"],$cpos["re_img_h"]);
				}else{
					move_uploaded_file($_FILES[$k]["tmp_name"],$cpos["file_url"].$temp_file_name);
				}
				$temp_fileupload[] = $cpos["file_url"].$temp_file_name;
				$temp_size += $_FILES[$k]["size"];
				$_POST[$k] = $temp_file_name;
			}
		}
	}
	
	//-----判斷陣列資料組合字串格式
	foreach ($_POST as $k=>$v){
		if (is_array($_POST[$k])){
			$_POST[$k] = implode("|__|",$_POST[$k]);
		}
	}
	
	
	//---判斷是否有欄位資料 沒有的話自動建立欄位
	foreach ($_POST as $k=>$v){//比對post資料
		$row_def = array('act','search','searchlike','daterange','date_rang','mode','del_pic');//例外不新增的鍵值
		if( in_array($k,$row_def) ) continue;
		if (!in_array($k,$row_colum_key)) {
			$conn->Execute("ALTER TABLE ".quotes($cpos["table"])." ADD ".quotes($k)." TEXT NULL COMMENT '程式生成欄位'");
		}
	}

	//-判斷是否超過限制空間大小
	if ($ini_webset["web_set"]["upload_max_size"]*1<$ini_webset["web_set"]["now_file"]*1+$temp_size*1 && $temp_size>0){
		if ($temp_fileupload && count($temp_fileupload)>0)
		foreach ($temp_fileupload as $k=>$v){
			if ( file_exists($v) )
			unlink($v);
		}
		unset($temp_fileupload);
		
		alert($ini_webset["web_set"]["upload_full_msg"],-1);
		exit;
	}


	unset($_POST["act"]); //移除不必要的陣列元
	if ($_POST["id"] == NULL || $_POST["id"] == "" || $_POST["id"]=="0"){
		//----------新增排序為最後一筆 (如果有排序前後參數優先)
			if (strtolower($cpos["sort_mode"])=="desc"){
				$_POST["sort"] = 0;
			}else{
				$sort = $conn->GetRow("select * from ".$cpos["table"]." ".$cpos["tablelistwhere"]." ORDER BY sort desc limit 1");
				if ($sort["sort"] != NULL)
					$_POST["sort"] = $sort["sort"]*1+1;
				else
					$_POST["sort"] = 1;	
			}
		//-------------------------
		unset($_POST["id"]); //新增不需要設定ID
		$_POST["lang"] = $_SESSION["admin_info"]["lang"];
		$_POST["create_date"] = $_POST["update_date"] = date("Y-m-d H:i:s");
		$_POST["create_name"] = $_POST["update_name"] = $_SESSION["admin_info"]["account"];
		$temp_id = Auto_id($conn,$cpos["table"]);
		$upd = $_POST;
		
		$_SESSION["admin_info"]["data_temp"] = $temp_id;
		$_SESSION["admin_info"]["table_temp"] = $cpos["table"];
		$_SESSION["admin_info"]["act_temp"] = "INSERT";
		
		//--檔案比對刪除
		if (count($cpos["file_check"])>0){
			foreach ($cpos["file_check"] as $k=>$v){
				//-- 尋找是否存在session temp 中 存在則移除
				if (count(explode('|__|',$upd[$v]))>0 && $_SESSION["upload_temp"] && count($_SESSION["upload_temp"])>0){
					foreach (explode('|__|',$upd[$v]) as $a=>$b){
						if ( !(array_search($b,$_SESSION["upload_temp"])===false) ){
							unset( $_SESSION["upload_temp"][array_search($b,$_SESSION["upload_temp"])] ); //-重陣列中移除
						}
					}
				}
			}///--end foreach file_check
		}
		
		system_temp($conn);
		
		$avalue = $conn->AutoExecute($cpos["table"],$upd,"INSERT");
		if ($avalue){
			cpos_resort();
			if ($cpos["insert_callback"]!=NULL){
				alert('新增成功',$cpos["insert_callback"]);
			}else{
				//alert('新增成功',now_url('id:'.$temp_id,true));
				alert('新增成功',now_url('id'));
			}
		}
	}else{
		if (strtolower($_POST["id"])=='lang') $where = $cpos["tablewhere"]; else $where = 'id='.$_POST["id"]; //---判斷是否為單值資料
		unset($_POST["id"]); //新增不需要設定ID
		$temp_id = $_POST["id"];
		$_POST["update_date"] = date("Y-m-d H:i:s");
		$_POST["update_name"] = $_SESSION["admin_info"]["account"];
		$upd = $_POST;
		
		$_SESSION["admin_info"]["data_temp"] = $conn->GetArray("select * from ".$cpos["table"]." where ".$where); //記錄更新前的資料
		$_SESSION["admin_info"]["table_temp"] = $cpos["table"];
		$_SESSION["admin_info"]["act_temp"] = "UPDATE";
		
		//--檔案比對刪除
		if (count($cpos["file_check"])>0){
			$temp_data = $conn->GetRow("select ".implode(',',$cpos["file_check"])." from ".$cpos["table"].' where '.str_replace('where','',strtolower($where)) );
			foreach ($cpos["file_check"] as $k=>$v){
				file_dpie(explode('|__|',$temp_data[$v]),explode('|__|',$upd[$v]));
				
				//-- 尋找是否存在session temp 中 存在則移除
				if (count(explode('|__|',$upd[$v]))>0 && $_SESSION["upload_temp"] && count($_SESSION["upload_temp"])>0){
					foreach (explode('|__|',$upd[$v]) as $a=>$b){
						if ( !(array_search($b,$_SESSION["upload_temp"])===false) ){
							unset( $_SESSION["upload_temp"][array_search($b,$_SESSION["upload_temp"])] ); //-重陣列中移除
						}
					}
				}
			}///--end foreach file_check
		}
		
		
		system_temp($conn);

		$avalue = $conn->AutoExecute($cpos["table"],$upd,"UPDATE",$where);
		if ($avalue) {
		if ($cpos["update_callback"]!=NULL){
			alert('修改成功',$cpos["insert_callback"]);
		}else{
			//alert('修改成功',now_url('id:'.$temp_id,true));
			if(strtolower($_GET["id"])!="lang") alert('修改成功',now_url('id')); else alert('修改成功',-1);
		}
		}else{
			print_r($upd);
			echo 'update erro';exit;
		}
	}
	/*echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'"</script>>';*/
}
}

//------刪除-------
if ($_GET["del_id"] != NULL && $_GET["del_id"]!= ''){
	if($close["del"]==1)
	{
		alert("不開放刪除功能",Page_get_url('del_id'));
		exit;
	}

	//後台異動記憶
	$_SESSION["admin_info"]["data_temp"] = $conn->GetArray("select * from ".$cpos["table"]." where id in (".$_GET["del_id"].")"); //記錄更新前的資料
	$_SESSION["admin_info"]["table_temp"] = $cpos["table"];

	if ($cpos["del"]!=NULL){
		$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET status=".$cpos["del"]." WHERE id in (".$_GET["del_id"].")"); //假刪除
		$_SESSION["admin_info"]["act_temp"] = "DELETE_false";
	}else{
		
		//-刪除異動後過時資料
		$temp_data = $conn->GetArray("select ".implode(',',$cpos["file_check"])." from ".$cpos["table"]." where id in (".$_GET["del_id"].")" );
		foreach ($cpos["file_check"] as $k=>$v){
			if ($temp_data)
			foreach ($temp_data as $a=>$b){
				file_dpie(explode('|__|',$temp_data[$a][$v]),array());
			}
		}///--end foreach file_check
		
		$avalue = $conn->Execute("DELETE FROM ".$cpos["table"]." WHERE id in (".$_GET["del_id"].")");
		$_SESSION["admin_info"]["act_temp"] = "DELETE";
	}
	system_temp($conn);

	if ($avalue) {
		if ($cpos["delete_callback"])
			alert('刪除成功',$cpos["delete_callback"]);
		else
			alert('刪除成功',now_url('del_id'));
	}
}
//----------------


//--上傳檔案暫存刪除
if ($_SESSION["upload_temp"] && $_SESSION["upload_url"]){
	if ($_SESSION["upload_temp"] && count($_SESSION["upload_temp"])>0)
	foreach ($_SESSION["upload_temp"] as $k=>$v){
		$v = explode('/',$v);
		$v = $v[count($v)-1];
		if ( file_exists($_SESSION["upload_url"].$v) ){
			unlink($_SESSION["upload_url"].$v);
		}
		unset($_SESSION["upload_temp"]);
	}
}
$_SESSION["upload_url"] = $cpos["file_url"];

/**資料庫大小判斷訊息*/
if ($db_full_check){
	alert($ini_webset["web_set"]["db_full_msg"],-1);
}



//-----------頁面資料擷取
if ($cpos["tablerow"]==NULL) 
	$cpos["tablerow"] = '*';

switch ($_SESSION["admin_info"]["view"]){
case "detail"://單筆
	$sql = "select ".$cpos["tablerow"]." from ".$cpos["table"].' '.$cpos["tablejoin"]." WHERE ".$cpos["tablewhere"];
	$data["one"] = $conn->GetRow($sql);
	///--------------將指定欄位成為編輯器
	foreach ($row_colum_key as $k=>$v){
		if (!is_numeric($v)) {
			$data["one"][$v."_fck"] = Ckedit($v,deQuotes($data["one"][$v],-1),'normal',$cpos["fck_bodyclass"][$v]);
			$data["one"][$v."_fck_easy"] = Ckedit($v,deQuotes($data["one"][$v],-1),'easy',$cpos["fck_bodyclass"][$v]);
			$data["one"][$v."_datepicker"] = datepicker($v,$data["one"][$v]);
		}
	}
	//---------------------------------
	$data["one"]["status_html"] = Make_radio($cpos["status"],$data["one"]["status"],'status');//--狀態製作標籤
break;

case "list";//清單
	//--自動規劃搜尋名定義
	/*
	$sql = "select ".$cpos["tablerow"]." from ".$cpos["table"].' '.$cpos["tablejoin"].' '.$cpos["tablelistwhere"].$cpos["listorderby"];
	$cpos_temp = $conn->GetArray($sql);
	if ($cpos_temp){
		foreach ($cpos_temp as $k=>$v){
			$cpos_temp2[] = $v["name"];
		}
		$data["autocomplete"] = implode(",",$cpos_temp2);
	}
	*/
	
	$sql = "select ".$cpos["tablerow"]." from ".$cpos["table"].' '.$cpos["tablejoin"].' '.$cpos["tablelistwhere"].$search.$cpos['group_by'].$cpos["listorderby"]." limit ".(($_GET["page"]-1)*$cpos["pagecount"]).",".$cpos["pagecount"];
	$data["list"] = $conn->GetArray($sql);
	if ($data["list"])
	foreach ($data["list"] as $k=>$v){
		$data["list"][$k]["status_html"] = Make_radio($cpos["status"],$v["status"],'status_'.$v["id"]);
	}
break;
}
$centerpossql = $sql;//--導出資料庫語法 偵錯用



//---頁碼資訊-------------
$pageinfo["start_date"] = ($_GET["page"]-1)*$cpos["pagecount"]+1; //從第幾筆
$pageinfo["end_date"] = (($_GET["page"]-1)*$cpos["pagecount"])+$cpos["pagecount"];//到第幾筆
$pageinfo["now_page"] = $_GET["page"];

	$sql = "select count(*) as cc from ".$cpos["table"].' '.$cpos["tablejoin"].' '.$cpos["tablelistwhere"].$search;
	if (strpos(strtolower($sql),'group')){ //判斷是否為群組資料做為列表
		$allcount = $conn->GetArray($sql);
		$pageinfo["page_date_count"] = count($allcount); //共幾筆
	}else{
		$allcount = $conn->GetRow($sql);
		$pageinfo["page_date_count"] = $allcount["cc"]; //共幾筆
	}

if ($pageinfo["end_date"] >= $pageinfo["page_date_count"]) $pageinfo["end_date"] = $pageinfo["page_date_count"];//如果顯示筆數大於總筆數 等於總筆數
$pageinfo["all_page"] = ceil($pageinfo["page_date_count"]/$cpos["pagecount"]);//共多少頁

	//---處理URL中參數
	$page_urls=explode('/',$_SERVER['REQUEST_URI']);
	$page_urls=explode('?',$page_urls[count($page_urls)-1]);
	$page_urls=explode('&',$page_urls[count($page_urls)-1]);
	$p_url = '';
	foreach ($page_urls as $k=>$v){
		$st_url =explode('=',$page_urls[$k]);
		if ($st_url[0]!="page")
		if ($p_url=='') {$p_url ='?'.$st_url[0].'='.$st_url[1];}else{$p_url .='&'.$st_url[0].'='.$st_url[1];}
	}
	//--------------

if ($_GET["page"]*1 > 1) $pageinfo["up_url"] = $p_url.'&page='.($_GET["page"]-1); // 上一頁按鈕
if ($pageinfo["all_page"] > $_GET["page"]) $pageinfo["down_url"] = $p_url.'&page='.($_GET["page"]+1); //下一頁按鈕

$pageinfo["jump_page_url"] = $p_url; //頁碼JS使用URL

for ($pageidx=1;$pageidx <= $pageinfo["all_page"];$pageidx++){
	$pageinfo["jump_page_html"] .= '<option value="'.$pageidx.'" ';
	if ($_GET["page"]==$pageidx) $pageinfo["jump_page_html"] .= 'selected';
	$pageinfo["jump_page_html"] .= '>'.$pageidx.'</option>';
}

//-----------------------
$tpl->assign("page_table",$pageinfo); //頁碼導入smarty




//----自動記憶修改或建立者的帳戶資訊
function system_temp($conn){
	global $_SESSION;
	global $_POST;
	global $_GET;
	$table_all = $conn->GetArray("show tables");
	foreach ($table_all as $k=>$v) $table_list[] = $v[0];
	if (!in_array(PREFIX.'system_temp',$table_list)){ //----沒有此資料表就創建一個
		$conn->Execute("CREATE TABLE `".PREFIX."system_temp` (  `id` int(20) NOT NULL auto_increment,  `act` varchar(10) default NULL,  `account` varchar(20) NOT NULL,  `BACK_DATA` LONGTEXT ,  `POST_DATA` LONGTEXT ,  `FILE_URL` text NOT NULL,  `create_date` datetime NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	}
	$sys_data["account"] = $_SESSION["admin_info"]["account"];
	if (count($_POST)>0){
		foreach ($_POST as $k=>$v){
			if ($sys_data["POST_DATA"]!=''&&$sys_data["POST_DATA"]!=NULL)
				$sys_data["POST_DATA"] .= '~****~';
				
			$sys_data["POST_DATA"] .= $k.'@F@'.$v;
			
			//-為修改時
			if ($_SESSION["admin_info"]["act_temp"]=="UPDATE"){
					if ($sys_data["BACK_DATA"]!=''&&$sys_data["BACK_DATA"]!=NULL)
						$sys_data["BACK_DATA"] .= '~****~';
					$sys_data["BACK_DATA"] .= $k.'@F@'.$_SESSION["admin_info"]["data_temp"][0][$k];
			}
		}
	}else if($_SESSION["admin_info"]["data_temp"]){
		foreach ($_SESSION["admin_info"]["data_temp"] as $k=>$v){
			$sys_data["POST_DATA"][$k] = $v["id"].' '.$v["name"];
		}
		if (is_array($sys_data["POST_DATA"]))
		$sys_data["POST_DATA"] = implode('|__|',$sys_data["POST_DATA"]);
	}
	
	$sys_data["act"] = $_SESSION["admin_info"]["act_temp"];
	$sys_data["FILE_URL"] = $_SESSION["admin_info"]["title"].'|__|'.$_SESSION["admin_info"]["page"];
	$_SESSION["admin_info"]["title_temp"] = $_SESSION["admin_info"]["title"];//記憶可還原的是哪個功能頁
	$sys_data["create_date"] = date("Y-m-d H:i:s");
	$conn->AutoExecute(PREFIX."system_temp",$sys_data,"INSERT");
}


/*設定排序位置後 重新排序*/
function cpos_resort($value=0){
	global $conn;
	global $cpos;
	if ($cpos["tablelistwhere"]==NULL || $cpos["tablelistwhere"]=='') $cpos["tablelistwhere"] = ' WHERE 1 ';
	if ($cpos["sort_class"]!=NULL&&$cpos["sort_class"]!='')
	{
		$sort_class = $conn->GetArray("select * from ".$cpos["table"]." ".$cpos["tablejoin"].' '.$cpos["tablelistwhere"].' group by '.$cpos["sort_class"]);
		if ($sort_class)
		foreach ($sort_class as $k=>$v){
			$conn->Execute("SET @j:=0");
			if ($v[$cpos["sort_class"]]){ //--判斷對象非空值
				$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET sort=@j:=@j+1 ".$cpos["tablelistwhere"]." AND ".$cpos["sort_class"]."='".$v[$cpos["sort_class"]]."' ".$cpos["listorderby"]);
			}else{
				$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET sort=@j:=@j+1 ".$cpos["tablelistwhere"]." ".$cpos["listorderby"]);
			}
		}
	}else{
		$conn->Execute("SET @j:=0");
		$avalue = $conn->Execute("UPDATE ".$cpos["table"]." SET sort=@j:=@j+1 ".$cpos["tablelistwhere"]." ".$cpos["listorderby"]);
	}
}


//* 檔案陣列比對 (原陣列 對應 新陣列)*//
function file_dpie($array1,$array2,$fileurl=NULL){
	global $cpos;
	if ($fileurl==NULL) $fileurl = $cpos["file_url"];
	$new_array = array_diff($array1,$array2); //--取得兩個陣列不相同處
	if ($new_array && count($new_array)>0)
	foreach ($new_array as $k=>$v){
		if ($v!='' && $v!=NULL && file_exists($fileurl.$v) )
		unlink($fileurl.$v);
	}
}

function cpos_create_table($table){
	global $conn;
	$conn->Execute("
		CREATE TABLE `".$table."` (
		  `id` int(20) NOT NULL auto_increment,
		  `sort` double default '0',
		  `status` tinyint(4) default NULL,
		  `lang` varchar(20) default NULL,
		  `create_date` datetime default NULL,
		  `update_date` datetime default NULL,
		  `create_name` varchar(20) default NULL,
		  `update_name` varchar(20) default NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='程式生成資料表' AUTO_INCREMENT=1 ;
	");
}
?>