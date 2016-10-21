 modelphp
==========
![N](http://www.104portal.com.tw/images/logo.png) 

程式框架模組
@2015 crate by Jones

### Step 1 環境建立
將專案複製到網頁伺服器根目錄下

並執行 http://localhost/(modelphp或者專案名稱)/setup.php

輸入專案名稱、資料庫帳號密碼用以建立新專案模組於本機

### Step 2 設定後台功能

* 於後台系統目錄管理功能 /serback/_sysmenu_set.php 設定後台選單功能
* 於後台帳號群組管理功能 /serback/admin_group.php 設定各管理群組功能權限
* 於後台建立樣板組合並於套用前台畫面功能
* 開始建置各個專案功能

### Step 3 上傳線上環境
上傳線上環境後須調整 /includes/config/conn.php 修改資料庫連線設定，以及後台核心驗證碼

如使用目前預設的後台驗證碼套件請於 https://www.google.com/recaptcha/ 申請一組 reCAPTCHA sites

並於後台 網站設定中>系統管理者設定 修改 reCAPTCHA 驗證套件的兩組key


### 引導式編輯功能
請在樣板中設定好辨識標籤 並於後台-->其他管理-->網站設定 (此路徑可能受個人設定值不同影響) 中設地 jquery selector 物件

2016/10/21 增加即時編輯功能請設定好以下相關參數於資料標籤屬性上必須加入以下內容

*必填 contenteditable="true"

*必填 ajx-table="資料表名稱(ex: data_list 可不加上標頭 如加上PREFIX資料亦可)"

*必填 ajx-key="索引鍵(EX:id)"

*必填 ajx-keydata="索引值(EX:25)"

*必填 ajx-row="寫入的資料欄位名稱 (EX: name 或者 使用字串陣列方式如 detail[1] 第二個項目)"

*選填 ajx-where_sql="其他的寫入資料條件(EX: name like '%關於我們%')"

範例:

&lt;span contenteditable="true" ajx-table="data_list" ajx-key="id" ajx-keydata="({$data.one.id})" ajx-row="memo"&gt;({$data.one.memo})&lt;/span&gt;



### 注意事項
如非網動廣告科技公司(統編28484688) 人員，本模組僅供參考用途，如引用任何代碼進行商業銷售行為，網動廣告科技公司將保留相關法律追訴權力

[N]: <http://www.104portal.com.tw/>