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


### 注意事項
如非網動廣告科技公司(統編28484688) 人員，本模組僅供參考用途，如引用任何代碼進行商業銷售行為，網動廣告科技公司將保留相關法律追訴權力

[N]: <http://www.104portal.com.tw/>