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
?>