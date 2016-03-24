<?php 
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
$_F=__FILE__;$_X='P2xrPyAzIFkNV0MqWXguPWZbPVlhfVk4ekg9bw1XDVfmiJDngrrnt6jovK/lmajmrITkvY3oqK3lrppZ6KGo56S65pa55byPWVkkeWZbZlQiekg9IkRU5qyE5L2N5ZCN56ixMidfOXhHJ0Q7DVfmiJDngrrnsKHmmJPniYjnt6jovK/lmajmrITkvY3oqK3lrppZ6KGo56S65pa55byPWVkkeWZbZlQiekg9IkRU5qyE5L2N5ZCN56ixMidfOXhHXz1mb30nRDsNV+aIkOeCuuaXpeacn+mBuOaTh+WZqOioreWumllZ6KGo56S65pa55byPWVkkeWZbZlQiekg9IkRU5qyE5L2N5ZCN56ixMidfeWZbPXZ1eEc9LidEOw1XLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLeiqquaYjuaWh+S7tlktLS1ZWeWwjuWFpeWPg+aVuOioreWumg1XQ0PliJfooajpoIHlj4PmlbgNVyR4dnpvVCJ2ZmI9eHplSFsiRFloWTE7WUND5q+P6aCB6aGv56S6562G5pW4DVckeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRFloWSJSM05BTllbfXY9aCdhZkhIPS4nIjtDQ+WIl+ihqOmhr+ekuuizh+aWmeeahOaineS7tg1XJHh2em9UIltmYXQ9LnpyIkRZaFkiZixhLHgiO1lDQ+aqouimluashOS9jeioreWumg1XJHh2em9UIltmYXQ9IkRZaFkiWUVmdHRyPXlfRVV1eT16IjsNVyR4dnpvVCJbZmF0PUp6dUgiRFloWScnO1lDQ+WKoOWFpeWPg+eFpw1XJHh2em9UInR1b1t6Lnk9LmF9IkRZaFknb1tmW2VvJztDQ+WIl+ihqOmggeaOkuW6j+aWueW8jw1XJHh2em9UInk9dCJEWWhZJydDQ+WBh+WIqumZpOaooeW8j1nkuI3pnIDopoHlgYfliKrpmaToq4vlrozmlbTliKrmjonmraTmrrVZaFnlrqPlkYrngrpZb1tmW2VvWeeCuuatpOiuig1XJHh2em9UJ2IuemV2X2F9J0RZaFknYi56ZXZZYX1ZQkInO1lDQ+S+neaTmuashOS9jee+pOe1hOWQiOS9tQ1XDVdDQ+WFp+WuuemggeWPg+aVuA1XJHh2em9UIltmYXQ9ckw9Lj0iRFloWSd1eWgnMiRfU05dVCJ1eSJEO1lDQ+WFp+WuuemggeaqouimluaineS7tg1XJHh2em9UIltmYXQ9LnpyIkRZaFkiZixhLHgiO1lDQ+aqouimluashOS9jeioreWumg1XJHh2em9UIltmYXQ9IkRZaFkiWUVmdHRyPXlfRVV1eT16IjsNVyR4dnpvVCJbZmF0PUp6dUgiRFloWScnOw1XJHh2em9UIjl4R19vPVsiRFloWWYuLmZ9KCfmrITkvY1xJywn5qyE5L2N5LqMJyk7Q0PmiJDngrrnt6jovK/lmajmrITkvY3oqK3lrppZ5Y+W5Ye657eo6Lyv5Zmo5YWn5a65WeashOS9jeWQjeeosV85eEcNVyR4dnpvVCJFeUY9SHh6eT0iRFloWWYuLmZ9KCfmrITkvY1xJywn5qyE5L2NMScpO0NDRXlG5Yqg5a+GWeashOS9jVnlpoLlgrPnqbrlgLxZ6Ieq5YuV5Yiq6Zmk5LiN6Ly45YWl5Yiw6LOH5paZ5bqrDVckeHZ6b1Qiekh0fXk9W2Z1dCJEWWhZJ3EnO1lZQ0Plj6rpoa/npLrlhaflrrnpoIENVw1XQ0PmkJzlsIvooajllq7lj4PmlbgNV1lZ5qyE5L2N6Kit572uWeashOS9jeWQjWhsYj1b5YC8DVdZWemgkOiorW9fKOashOS9jeWQjSnoh6rli5XlsI3mh4nmkJzlsItU5ZCr5Yik5pa35qyE5L2N5b2i5oWLRA1XJHh2em9UIm89Zi54TCJEWWhZZi4uZn0oJ0hmRT0naGwnRz19cnoueScsJ3k9W2Z1dCdobCdHPX1yei55JywneC49Zls9X3lmWz0naGwneWZbPS5mSGI9Jywnb1tmW2VvJ2hsJ29fb1tmW2VvJywneHRmb28naGwnbz1mLnhMeHRmb28nKTsNVyR4dnpvVCdvPWYueExfdD05WydEWVloWWYuLmZ9KCd4dGZvbycsJ0hmRT0nKTtDQ+mHneWwjeashOS9jeWtl+S4sumZo+WIl3ou5q+U5bCNDVcNV0ND5qqU5qGI5LiK5YKzDVckeHZ6b1QiOXV0PV9lLnQiRFloWSIiO0ND5LiK5YKz55qE55uu6YyE5L2N572uPS9ZOmV2dHpmeUMNVyR4dnpvVCIuPV91RWJfciJEWWhZJ3EnO1lDQ+e4ruWcluiZleeQhlnlr6xZ5YC8WVnoqK3lrprlhanpoIXmiY3mnIPln7fooYznuK7lnJbomZXnkIYNVyR4dnpvVCIuPV91RWJfTCJEWWhZJ3EnO1lDQ+e4ruWcluiZleeQhlnpq5hZ5YC8DVckeHZ6b1QiOXV0PV94TD14RyJEWWhZIiI7WUND5qqU5qGI5q+U5bCN5Yqf6IO9WWYuLmZ9KCJ2dXgiLCI5dXQ9IilZei5ZIjl1dD0sdnV4IjsNVw1XQ0PmjpLluo/oqK3lrpoNVyR4dnpvVCJvei5bX3h0Zm9vIkRZaFkieHRmb28iO1lDQy0t5YiX6KGo6aCB5pyJ5aSa5YCL5LiN5ZCM6aGe5YilWeS+neeFp+atpOashOS9jemFjeaOkuW6jw1XJHh2em9UIm96LltfRXp5PSJEWWhZImZveCJZQ0MtLVlmb3hZ5b6A5b6M5aKe5YqgWXk9b3hZ54K656ys5LiA5YCLWemgkOioreeCumZveA1XDVcNV0NDLS3ov5Tlm57lj4PmlbgNVyR4dnpvVCJ1SG89LltfeGZ0dGFmeEciRFloWScnCUND5paw5aKe5oiQ5Yqf6L+U5ZueDVckeHZ6b1QiZXZ5Zls9X3hmdHRhZnhHIkRZaFknJwlDQ+S/ruaUueaIkOWKn+i/lOWbng1XJHh2em9UInk9dD1bPV94ZnR0YWZ4RyJEWWhZJycJQ0PliKrpmaTmiJDlip/ov5Tlm54NVypDDVdDQ+mgkOioreWAvOioreWumg1XdTlZKCF1b289WygkeHZ6b1Qib3ouW19Fenk9IkQpWXx8WSR4dnpvVCJvei5bX0V6eT0iRFloaFknJylZJHh2em9UIm96LltfRXp5PSJEWWhZJ3k9b3gnOw1XdTlZKCR4dnpvVCJ2ZmI9eHplSFsiRFloaFlje01NWXx8WSR4dnpvVCJ2ZmI9eHplSFsiRFloaFknJylZJHh2em9UInZmYj14emVIWyJEWWhZcTA7DVd1OVkoJHh2em9UInR1b1t6Lnk9LmF9IkRZIWhZY3tNTVkmJlkkeHZ6b1QidHVvW3oueT0uYX0iRFkhaFknJylZJHh2em9UInR1b1t6Lnk9LmF9IkRZaFknWTVBZE5BWUlqWScyJHh2em9UInR1b1t6Lnk9LmF9IkQ7DVd1OVkoJHh2em9UIm9bZltlbyJEaGhje01NWXx8WSR4dnpvVCJvW2ZbZW8iRGhoJycpWSR4dnpvVCJvW2ZbZW8iRFloWSRfNk5deyBUIm9bZltlbyJEOw1XdTlZKCR4dnpvVCI5dXQ9X3hMPXhHIkRZaGhZY3tNTVkpWSR4dnpvVCI5dXQ9X3hMPXhHIkRZaFkidnV4IjsNV3U5WSghdW9fZi4uZn0oJHh2em9UIjl1dD1feEw9eEciRCkpWSR4dnpvVCI5dXQ9X3hMPXhHIkRZaFk9L3Z0enk9KCcsJywkeHZ6b1QiOXV0PV94TD14RyJEKTsNV3U5WSgkeHZ6b1Qibz1mLnhMIkRoaGN7TU1ZfHxZJHh2em9UIm89Zi54TCJEaGgnJylZJHh2em9UIm89Zi54TCJEWWhZZi4uZn0oJ0hmRT0naGwnRz19cnoueScsJ3k9W2Z1dCdobCdHPX1yei55JywneC49Zls9X3lmWz0naGwneWZbPS5mSGI9Jywnb1tmW2VvJ2hsJ29fb1tmW2VvJywneHRmb28naGwnbz1mLnhMeHRmb28nKTtZDVdDQy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDVcNV0NDLS0t54mI5pys5q+U5bCN6amX6K2JDVckeHZ6b19VPS5vdXpIWWhZJ3EyMDJxJzsNVyR4dnpvX3hMPXhHX1U9Lm91ekhZaFkkeHpISC1sUz1bQXpyKCJvPXQ9eFtZQHg9SFs9LnZ6b1lmb1l5ZltmIik7DVd1OVkoRXlGKG9MZnEoYWZvPUtPXz1IeHp5PSgkeHZ6b19VPS5vdXpIKSkpIWgkeHZ6b194TD14R19VPS5vdXpIVCJ5ZltmIkQpWVgNVwk9eEx6WSfmoLjlv4PniYjmnKzpqZforYnpjK/oqqQhIScyJ+ebruWJjeaguOW/g+eJiOacrOeCulUnMiR4dnpvX1U9Lm91ekg7PS91WzsNVz4NVw1XQ0MtLeaTt+WPluizh+aWmeihqOWFp+WuuQ1XJHh2em9fW2ZhdD1fLnpyWWhZJHh6SEgtbFM9W1ouLmZ9KCJ5PW94WSIyJHh2em9UIltmYXQ9IkQpOw1XdTlZKCEkeHZ6b19bZmF0PV8uenIpWVgNVwl4dnpvX3guPWZbPV9bZmF0PSgkeHZ6b1QiW2ZhdD0iRCk7Q0MtLeaykuizh+aWmeihqOiHquWLleW7uueriw1XCSR4dnpvX1tmYXQ9Xy56clloWSR4ekhILWxTPVtaLi5mfSgieT1veFkiMiR4dnpvVCJbZmF0PSJEKTsNVz4NVzl6Lj1meExZKCR4dnpvX1tmYXQ9Xy56cllmb1kkR2hsJFUpWFlDQy0t5Y+W5b6X6LOH5paZ6KGo5qyE5L2N6LOH5paZ6YCy6KGM5Yik5pa3DVcJJC56cl94enRlRV9HPX1URFloWSRVVDBEOyQuenJfeHp0ZUVfW312PVREWWhZJFVUcUQ7DVc+DVcNV0NDLS3oh6rli5XljrvpmaTmspLmnInmrITkvY3nmoTos4fmlpnpm4YNV0ND5qqU5qGI5qqi5risDVc5ei49ZnhMWSgkeHZ6b1QiOXV0PV94TD14RyJEWWZvWSRHaGwkVSlYDVcJdTlZKCF1SF9mLi5mfSgkVSwkLnpyX3h6dGVFX0c9fSkpWWVIbz1bKCR4dnpvVCI5dXQ9X3hMPXhHIkRUJEdEKTsNVz4NV0ND5qqU5qGI5qqi5risDVc5ei49ZnhMWSgkeHZ6b1Qibz1mLnhMIkRZZm9ZJEdobCRVKVgNVwl1OVkoIXVIX2YuLmZ9KCRHLCQuenJfeHp0ZUVfRz19KSlZZUhvPVsoJHh2em9UIm89Zi54TCJEVCRHRCk7DVc+DVcNV0NDLS0tLS0tLS0t5b6p5Y6f5L+u5pS5DVd1OVkoJF9TTl1UIi49X3lmW2ZfWz1FdiJEIWhje01NJiYkX1NOXVQiLj1feWZbZl9bPUV2IkQhaCcnJiYkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQieWZbZl9bPUV2IkQhaCcnJiYkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQieWZbZl9bPUV2IkQhaGN7TU0pWA1XCW9ydVt4TFkoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4W19bPUV2IkQpWA1XCQl4Zm89WSJkTk1OXU5fOWZ0bz0iOg1XCQl4Zm89WSJ7IGRaXU4iOg1XCQkJOXouPWZ4TFkoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEWWZvWSRHaGwkVSlYDVcJCQkJDVcJCQkJQ0Mt5Yiq6Zmk55Ww5YuV5b6M6YGO5pmC6LOH5paZDVcJCQkJJFs9RXZfeWZbZlloWSR4ekhILWxTPVtBenIoIm89dD14W1kiMnVFdnR6eT0oJywnLCR4dnpvVCI5dXQ9X3hMPXhHIkQpMiJZOS56RVkiMiR4dnpvVCJbZmF0PSJEMiJZckw9Lj1ZdXloJyIyJFVUInV5IkQyIiciWSk7DVcJCQkJOXouPWZ4TFkoJHh2em9UIjl1dD1feEw9eEciRFlmb1kkZmhsJGEpWA1XCQkJCQk5dXQ9X3l2dT0oPS92dHp5PSgnfF9ffCcsJFs9RXZfeWZbZlQkYUQpLD0vdnR6eT0oJ3xfX3wnLCRVVCRhRCkpOw1XCQkJCT5DQ0MtLT1IeVk5ei49ZnhMWTl1dD1feEw9eEcNVwkJCQkkZlVmdGU9WWhZJHh6SEgtbFplW3pOLz14ZVs9KCRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJbZmF0PV9bPUV2IkQsJFUsInsgZFpdTiIsInV5aCIyJFVUInV5IkQpOw1XCQkJPg1XCQlhLj1mRzsNVwkJeGZvPVkiN2M2TkFdIjoNVwkJCXU5WSgkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQieWZbZl9bPUV2IkQhaCcnWSYmWSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJ5ZltmX1s9RXYiRCFoY3tNTSlZWA1XCQkJCQ1XCQkJCUNDLeWIqumZpOeVsOWLleW+jOmBjuaZguizh+aWmQ1XCQkJCSRbPUV2X3lmW2ZZaFkkeHpISC1sUz1bQXpyKCJvPXQ9eFtZIjJ1RXZ0enk9KCcsJywkeHZ6b1QiOXV0PV94TD14RyJEKTIiWTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDIiWXJMPS49WXV5aCciMiRVVCJ1eSJEMiInIlkpOw1XCQkJCTl6Lj1meExZKCR4dnpvVCI5dXQ9X3hMPXhHIkRZZm9ZJGZobCRhKVgNVwkJCQkJOXV0PV95dnU9KD0vdnR6eT0oJ3xfX3wnLCRbPUV2X3lmW2ZUJGFEKSxmLi5mfSgpKTsNVwkJCQk+Q0NDLS09SHlZOXouPWZ4TFk5dXQ9X3hMPXhHDVcJCQkJDVcJCQkJJGZVZnRlPVloWSR4ekhILWxOLz14ZVs9KCJkTk1OXU5ZbkE1Z1kiMiR4dnpvVCJbZmF0PSJEMiJZUjNOQU5ZdXlZdUhZKCIyJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEMiIpIik7DVcJCQk+DVcJCWEuPWZHOw1XCQl4Zm89WSJkTk1OXU4iOg1XCQkJOXouPWZ4TFkoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEWWZvWSRHaGwkVSlYDVcJCQkJJGZVZnRlPVloWSR4ekhILWxaZVt6Ti89eGVbPSgkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiW2ZhdD1fWz1FdiJELCRVLCI3YzZOQV0iKTsNVwkJCT4NVwkJYS49Zkc7DVcJPg1XCWVIbz1bKCRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJ5ZltmX1s9RXYiRCk7DVcJZUhvPVsoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUIltmYXQ9X1s9RXYiRCk7DVcJZUhvPVsoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4W19bPUV2IkQpOw1XCWZ0PS5bKCfliY3kuIDnrYbmm7TmlrDos4fmlpnlt7LooqvpgoTljp8hIScsLXEpOw1XCT0vdVs7DVc+DVcNVw1XDVcNVw1XQ0MtLS0tLS1FeUbooajllq7oh6rli5XliKrmuJsNV3U5WSgkXyA1Nl0pWA1XCTl6Lj1meExZKCRfIDU2XVlmb1kkR1lobCRVKVgNVwkJdTlZKCR4dnpvVCJFeUY9SHh6eT0iRFkhaFlje01NWSYmWXVIX2YuLmZ9KCRHLCR4dnpvVCJFeUY9SHh6eT0iRCkpWA1XCQkJdTlZKCRVWWhoWWN7TU1ZfHxZJFVZaGhZJycpWA1XCQkJCWVIbz1bKCRfIDU2XVQkR0QpOw1XCQkJPj10bz1YDVcJCQkJPXhMelkkVTInWScyJEc7PS91WzsNVwkJCQkkXyA1Nl1UJEdEWWhZRXlGKCRfIDU2XVQkR0QpOw1XCQkJPg1XCQk+DVcJPg1XPg1XDVcNVw1XDVdDQy0tLS0tLS0t5Yik5pa35piv5ZCm54K66K6A5Y+W5Zau562G6LOH5paZWW9bPXZZcQ1XdTkoJF9TTl1UInV5IkQhaGN7TU1ZJiZZJF9TTl1UInV5IkQhaCIiKQ1XWA1XCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJVdT1yIkRZaFkieT1bZnV0IjsNVz4NVz10bz1DQ+WIl+ihqOmggQ1XWA1XCXU5WSgkeHZ6b1Qiekh0fXk9W2Z1dCJEWSFoWScnWSYmWSR4dnpvVCJ6SHR9eT1bZnV0IkRZIWhZY3tNTSlZWFlDQy0t5by35Yi26aGv56S65YWn5a656aCBDVcJCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJVdT1yIkRZaFkieT1bZnV0IjsNVwk+PXRvPVgNVwkJJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUIlV1PXIiRFloWSJ0dW9bIjsNVwk+DVc+DVcNVw1XDVdDQy0tLS0tLS3liKTmlrfmmK/lkKbmnInmkJzlsIvmop3ku7ZZb1s9dlkxDVdDKg1XCXguPWZbPVlhfVk4ekg9bw1XCeatpOaQnOWwi+azlemHneWwjeS7peS4i+mZo+WIl+WPg+aVuOWklllZJ+ashOS9jeWAvCdobCdiPVvlgLwnDVcJ5Y+m5aSW5Yik5pa36Yed5bCNb18o5qyE5L2N5ZCN56ixKVnnmoRiPVvlj4PmlbgNVypDDVd1OVkoJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUIlV1PXIiRGhoInR1b1siKVgNVwl1OVkoJHh2em9UIltmYXQ9dHVvW3JMPS49IkRoaGN7TU18fCR4dnpvVCJbZmF0PXR1b1tyTD0uPSJEaGgnJykJJG89Zi54TFloWWN7TU07WT10bz1ZJG89Zi54TFloWSdZJzsNVwk5ei49ZnhMWSgkeHpISC1sUz1bWi4uZn0oInk9b3hZIjIkeHZ6b1QiW2ZhdD0iRClZZm9ZJEdobCRVKVlYJC56cl94enRlRV9HPX1URFloWSRVVDBEOyQuenJfeHp0ZUVfW312PVREWWhZJFVUcUQ7PkNDLS3mk7flj5bos4fmlpnooajmiYDmnInmrITkvY0NVwkNVwlDQy0t5qyE5L2N6Kit572uDVcJJG89Zi54TF9mLi5mfVloWSR4dnpvVCJvPWYueEwiRDsNVwkNVwk5ei49ZnhMWSgkX1NOXVlmb1kkR2hsJFUpWFlDQy0t5Y+W5b6X5Y+D5pW46LOH5paZDVcJCXU5WShvWy52em8oJEcsJ18nKVkmJlkkVSFoJydZJiZZJFUhaGN7TU0pWA1XCQkJJEdZaFk9L3Z0enk9KCdfJywkRywxKTsNVwkJCXU5WShvWy5benR6cj0uKCRHVDBEKWhoJ28nKVgNVwkJCQllSG89WygkR1QwRCk7DVcJCQkJJEdZaFl1RXZ0enk9KCdfJywkRyk7DVcJCQkJOXouPWZ4TFkoJC56cl94enRlRV9HPX1ZZm9ZJEhxWWhsJEgxKVlYDVcJCQkJCXU5WSgkSDFoaCRHKVhDQy0tLeWIpOaWt+acieWQpuWcqOipsuizh+aWmeihqOS4reacieatpOashOS9jQ1XCQkJCQkJdTlZKCRvPWYueExoaGN7TU18fCRvPWYueExoaCcnKVkkbz1mLnhMWWhZIllyTD0uPVkiO1k9dG89WSRvPWYueExZMmhZIllmSHlZIjsNVwkJCQkJCXU5WShvWy52em8ob1suW3p0enI9LigkLnpyX3h6dGVFX1t9dj1UJEhxRCksJ1s9L1snKSFoaDlmdG89WXx8WW9bLnZ6byhvWy5benR6cj0uKCQuenJfeHp0ZUVfW312PVQkSHFEKSwnVWYueExmLicpIWhoOWZ0bz0pWVgNVwkJCQkJCQkkbz1mLnhMWTJoWSRHMiJZdHVHPVknJSIyJFUyIiUnIjsNVwkJCQkJCT49dG89WXU5WShvWy52em8oJ3lmWz1bdUU9JyxvWy5benR6cj0uKCQuenJfeHp0ZUVfW312PVQkSHFEKSkpWA1XCQkJCQkJCSRvPWYueExZMmhZJ1laY2RZJzIkRzInWWxoXCcnMiRVMidZMDA6MDA6MDBcJ1lmSHlZJzIkRzInWWtcJycyJFUyJ1kxcDpGaTpGaVwnJzsNVwkJCQkJCT49dG89WA1XCQkJCQkJCSRvPWYueExZMmhZJEcyImgnIjIkVTIiJyI7DVcJCQkJCQk+DVcJCQkJCT4NVwkJCQk+DVcJCQk+DVcJCQkNVwkJCQ1XCQk+PXRvPVl1OVkoJFUhaGN7TU0mJiRVIWgnJylYQ0MtLS0tdTlZKG9bLnZ6bygkVSwnb18nKSlZPXRvPQ1XCQkJJG89Zi54TF90dW9baGN7TU07DVcJCQk5ei49ZnhMWSgkbz1mLnhMX2YuLmZ9WWZvWSRIcWhsJEgxKVgNVwkJCQl1OVkoJEgxaGgkRylYDVcJCQkJCW9ydVt4TCgkRylYDVcJCQkJCQl4Zm89WSJHPX1yei55IjoNVwkJCQkJCQkkbz1mLnhMX3R1b1tURFloWSRIcTIiWXR1Rz1ZJyUiMiRVMiIlJyI7DVcJCQkJCQlhLj1mRzsNVwkJCQkJCXhmbz1ZInlmWz0uZkhiPSI6DVcJCQkJCQkJJHlmWz0uZkhiPVloWT0vdnR6eT0oJy0nLCRVKTsNVwkJCQkJCQkkeWZbPS5mSGI9VDBEWWhZb1suXy49dnRmeD0oJzInLCctJywkeWZbPS5mSGI9VDBEKTsJJHlmWz0uZkhiPVRxRFloWW9bLl8uPXZ0Zng9KCcyJywnLScsJHlmWz0uZkhiPVRxRCk7DVcJCQkJCQkJJG89Zi54TF90dW9bVERZaFkkSHEyJ1lsaFwnJzIkeWZbPS5mSGI9VDBEMidZMDA6MDA6MDBcJ1lmSHlZJzIkSHEyJ1lrXCcnMiR5Zls9LmZIYj1UcUQyJ1kxcDpGaTpGaVwnJzsNVwkJCQkJCWEuPWZHOw1XCQkJCQkJeT05ZmV0WzoNVwkJCQkJCQkkbz1mLnhMX3R1b1tURFloWSRIcTIiaCciMiRVMiInIjsNVwkJCQkJCWEuPWZHOw1XCQkJCQk+DVcJCQkJPg1XCQkJPg1XCQkJDVcJCQl1OVkoJG89Zi54TF90dW9bIWhje01NKVlYDVcJCQkJdTlZKCRvPWYueExoaGN7TU18fCRvPWYueExoaCcnKVkkbz1mLnhMWWhZIllyTD0uPVkiO1k9dG89WSRvPWYueExZMmhZIllmSHlZIjsNVwkJCQkkbz1mLnhMX0g9Zi5ZaFknJzsNVwkJCQk5ei49ZnhMWSgkbz1mLnhMX3R1b1tZZm9ZJEVxaGwkRTEpWA1XCQkJCQl1OVkoJEVxbDApWSRvPWYueExfSD1mLlkyaFknWXouWSc7DVcJCQkJCSRvPWYueExfSD1mLlkyaFknKCcyJEUxMicpJzsNVwkJCQk+DVcJCQkJJG89Zi54TFkyaFknKCcyJG89Zi54TF9IPWYuMicpJzsNVwkJCT4NVwkJCQ1XCQk+Q0NDLS0tLXU5WShvWy52em8oJFUsJ29fJykpWT1IeQ1XCT4NVwkkeHZ6b1Qnbz1mLnhMX3plW3ZlWydEWWhZJG89Zi54TDsNVz4NVw1XDVcNVw1XQyoqWeizh+aWmeW6q+epuumWk+aqoua4rCpDDVd1OVkoJF8gNTZdWSYmWSR1SHVfcj1hbz1bVCJyPWFfbz1bIkRUImV2dHpmeV94TD14R19vW2ZbZW8iRGhoJ3EnKVgNVwkkeWFfW3pbZnRfeXVvR1loWTA7DVcJJHlhX3l1b0dZaFkkeHpISC1sUz1bWi4uZn0oIjYzNVJZXVpJTU5ZNl1aXXs2Iik7DVcJdTlZKCR5YV95dW9HKQ1XCQk5ei49ZnhMWSgkeWFfeXVvR1lmb1kkR2hsJFUpWA1XCQkJJHlhX1t6W2Z0X3l1b0dZK2hZJFVUImRmW2ZfdD1IYltMIkQqcSskVVQiN0h5PS9fdD1IYltMIkQqcTsNVwkJPg1XCXU5WSgkeWFfW3pbZnRfeXVvRypxbGgoJHVIdV9yPWFvPVtUInI9YV9vPVsiRFQieWFfRWYvX291Cj0iRCkpWA1XCQkkeWFfOWV0dF94TD14R1loWVsuZT07DVcJPg1XPg1XDVcNVw1XDVcNV0NDQy0tLS0tLS0tLS0tLS3mjpLluo8NV3U5WSgkXyA1Nl1UImZ4WyJEWWhoImZ0dCJZJiZZISR5YV85ZXR0X3hMPXhHKVlYDVcJQ0MtLVnmib7lsIvmmK/lkKbmnIlfDVcJOXouPWZ4TFkoJF8gNTZdWWZvWSRHWWhsWSRVKQ1XCVgNVwkJdTlZKG9bLnZ6bygkRywiXyIpKVgNVwkJCSRHWWhZPS92dHp5PSgiXyIsJEcpOw1XCQkJJEpHdUhZaFkkRzsNVwkJCXU5WSgkeHZ6b1Qib3ouW194dGZvbyJEaGhje01NfHwkeHZ6b1Qib3ouW194dGZvbyJEaGgnJylYWUNDLS3liKTmlrfmmK/lkKbmnInmjpLluo/lj4PmlbgNVwkJCQl1OVkoJHh2em9UIltmYXQ9dHVvW3JMPS49IkRZaGhZJydZfHxZJHh2em9UIltmYXQ9dHVvW3JMPS49IkRZaGhZY3tNTSlZWA1XCQkJCQkkckw9Lj1ZaFknWVIzTkFOWXV5aCInMiRKR3VIVHh6ZUhbKCRKR3VIKS1xRDInIic7DVcJCQkJPj10bz1YDVcJCQkJCSRyTD0uPVloWSdZJzIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDInWVpjZFl1eWgiJzIkSkd1SFR4emVIWygkSkd1SCktcUQyJyInOw1XCQkJCT4NVwkJCT49dG89WA1XCQkJCSRyTD0uPVloWSdZckw9Lj1ZdXloIicyJEpHdUhUeHplSFsoJEpHdUgpLXFEMiciJzsNVwkJCT4NVwkJCQ1XCQkJQ0MtLeeCuuaOkuW6j+eahOipsQ1XCQkJZUhvPVsoJEpHdUhUeHplSFsoJEpHdUgpLXFEKTtZJEpHdUhZaFl1RXZ0enk9KCdfJywkSkd1SCk7DVcJCQl1OVkob1suW3p0enI9LigkR1QwRCloaCdvei5bJylYDVcJCQkJJFs9RXZfVWZ0ZT1ZaFkoKCRVKnEpLTAycSk7WUND5L2/55So5YCN57K+56K65Z6L5YilWS0wMnFZ5L6G5Y+W5b6X54K65YmN5YC86aCFDVcJCQkJJGZVZnRlPVloWSR4ekhILWxOLz14ZVs9KCJ7IGRaXU5ZIjIkeHZ6b1QiW2ZhdD0iRDIiWTZOXVkiMiRKR3VIMiJZaFkiMiRbPUV2X1VmdGU9MiRyTD0uPSk7DVcJCQk+PXRvPVgNVwkJCQkkZlVmdGU9WWhZJHh6SEgtbE4vPXhlWz0oInsgZFpdTlkiMiR4dnpvVCJbZmF0PSJEMiJZNk5dWSIyJEpHdUgyIlloWSciMiRVMiInWSIyJHJMPS49KTsNVwkJCT4NVwkJPg1XCT4NVwl4dnpvXy49b3ouWygpO1lDQy3ph43nva7mjpLluo/lj4PmlbgNVz4NVw1XDVcNVw1XDVcNVw1XQ0MtLS3kv67mlLnjgIHmlrDlop7os4fmlplZ6KGo5Zau6LOH5paZWeWwjuWFpemZo+WIl+WtmOWFpQ1XdTlZKCR4dHpvPVQiPXl1WyJEWSFoWSdxJ1l8fFkkeHR6bz1UImZ5eSJEWSFoWSdxJylYDVd1OVkoJF8gNTZdWSYmWSRfIDU2XVQiZnhbIkRZIWgiZnR0IlkmJlkhJHlhXzlldHRfeEw9eEcpWVgNVwkNVwlDQy0tLS0tLeWIpOaWt+aYr+WQpuaciemAmeWAi+izh+aWmeWkvlnmspLmnInlsLHlibXlu7rkuIDlgIsNVwl1OVkoJHh2em9UIjl1dD1fZS50IkRZJiZZIXVvX3l1LigkeHZ6b1QiOXV0PV9lLnQiRCkpWA1XCQlFR3l1LigkeHZ6b1QiOXV0PV9lLnQiRCwwUFBQLFsuZT0pOw1XCT4NVwlDQy0tLS0tLS0tLeaqlOahiOS4iuWCs1nnm7TmjqXkuIDotbflr6vlhaV2em9bDVcJJHVFZmI9X2YuLmZ9WWhZZi4uZn0oJ2FFdicsJ0p2YicsJ0p2PWInLCd2SGInLCdidTknKTsNVwkkWz1Fdl9vdQo9WWhZMDsNVwk5ei49ZnhMWSgkX243TU42WWZvWSRHaGwkVSlYDVcJCXU5WSh1b19mLi5mfSgkX243TU42VCRHRFQiSGZFPSJEKSlYWUNDLS0t5Yik5pa354K66Zmj5YiX5ZCN56ix55u45ZCM54mp5Lu25LiK5YKzDVcJCQk5ei49ZnhMWSgkX243TU42VCRHRFQiSGZFPSJEWWZvWSRIcWhsJEgxKVgNVwkJCQl1OVkoJEgxIWgnJ3x8JEgxIWhje01NKVgNVwkJCQkkWz1Fdl85dXQ9X0hmRT1ZaFk9L3Z0enk9KCcyJywkSDEpOw1XCQkJCSRmOVs9Ll9IZkU9WWhZJFs9RXZfOXV0PV9IZkU9VHh6ZUhbKCRbPUV2Xzl1dD1fSGZFPSktcUQ7Q0Plia/mqpTlkI0NVwkJCQkkWz1Fdl85dXQ9X0hmRT1ZaFlvWy5belt1RT0oeWZbPSgnai1FLXlZMzp1Om8nKSkyLmZIeShxMCxpaSkyJzInMiRmOVs9Ll9IZkU9Ow1XCQkJCXU5WSh1SF9mLi5mfSgkZjlbPS5fSGZFPSwkdUVmYj1fZi4uZn0pJiYkeHZ6b1QiLj1fdUViX3IiRCFoY3tNTSYmJHh2em9UIi49X3VFYl9MIkQhaGN7TU0pWEND5LiK5YKz55qE5qqU5qGI5ZyW54mH5bCx57iu5ZyW6JmV55CGDVcJCQkJCTdFZmI9QT1vdQo9KCRfbjdNTjZUJEdEVCJbRXZfSGZFPSJEVCRIcUQsWSR4dnpvVCI5dXQ9X2UudCJEMiRbPUV2Xzl1dD1fSGZFPSwkeHZ6b1QiLj1fdUViX3IiRCwkeHZ6b1QiLj1fdUViX0wiRCk7DVcJCQkJPj10bz1YDVcJCQkJCUV6VT1fZXZ0emZ5PXlfOXV0PSgkX243TU42VCRHRFQiW0V2X0hmRT0iRFQkSHFELCR4dnpvVCI5dXQ9X2UudCJEMiRbPUV2Xzl1dD1fSGZFPSk7DVcJCQkJPg1XCQkJCSRbPUV2Xzl1dD1ldnR6ZnlURFloWSR4dnpvVCI5dXQ9X2UudCJEMiRbPUV2Xzl1dD1fSGZFPTsNVwkJCQkkWz1Fdl9vdQo9WStoWSRfbjdNTjZUJEdEVCJvdQo9IkRUJEhxRDsNVwkJCQkkXyA1Nl1UJEdEVERZaFkkWz1Fdl85dXQ9X0hmRT07DVcJCQkJPg1XCQkJPgkNVwkJPj10bz1YDVcJCQl1OVkoJF9uN01ONlQkR0RUIkhmRT0iRCFoJyd8fCRfbjdNTjZUJEdEVCJIZkU9IkQhaGN7TU0pWA1XCQkJCSRbPUV2Xzl1dD1fSGZFPVloWT0vdnR6eT0oJzInLCRfbjdNTjZUJEdEVCJIZkU9IkQpOw1XCQkJCSRmOVs9Ll9IZkU9WWhZJFs9RXZfOXV0PV9IZkU9VHh6ZUhbKCRbPUV2Xzl1dD1fSGZFPSktcUQ7Q0Plia/mqpTlkI0NVwkJCQkkWz1Fdl85dXQ9X0hmRT1ZaFlvWy5belt1RT0oeWZbPSgnai1FLXlZMzp1Om8nKSkyLmZIeShxMCxpaSkyJzInMiRmOVs9Ll9IZkU9Ow1XCQkJCXU5WSh1SF9mLi5mfSgkZjlbPS5fSGZFPSwkdUVmYj1fZi4uZn0pJiYkeHZ6b1QiLj1fdUViX3IiRCFoY3tNTSYmJHh2em9UIi49X3VFYl9MIkQhaGN7TU0pWVhDQ+S4iuWCs+eahOaqlOahiOWclueJh+Wwsee4ruWcluiZleeQhg1XCQkJCQk3RWZiPUE9b3UKPSgkX243TU42VCRHRFQiW0V2X0hmRT0iRCxZJHh2em9UIjl1dD1fZS50IkQyJFs9RXZfOXV0PV9IZkU9LCR4dnpvVCIuPV91RWJfciJELCR4dnpvVCIuPV91RWJfTCJEKTsNVwkJCQk+PXRvPVgNVwkJCQkJRXpVPV9ldnR6Znk9eV85dXQ9KCRfbjdNTjZUJEdEVCJbRXZfSGZFPSJELCR4dnpvVCI5dXQ9X2UudCJEMiRbPUV2Xzl1dD1fSGZFPSk7DVcJCQkJPg1XCQkJCSRbPUV2Xzl1dD1ldnR6ZnlURFloWSR4dnpvVCI5dXQ9X2UudCJEMiRbPUV2Xzl1dD1fSGZFPTsNVwkJCQkkWz1Fdl9vdQo9WStoWSRfbjdNTjZUJEdEVCJvdQo9IkQ7DVcJCQkJJF8gNTZdVCRHRFloWSRbPUV2Xzl1dD1fSGZFPTsNVwkJCT4NVwkJPg1XCT4NVwkNVwlDQy0tLS0t5Yik5pa36Zmj5YiX6LOH5paZ57WE5ZCI5a2X5Liy5qC85byPDVcJOXouPWZ4TFkoJF8gNTZdWWZvWSRHaGwkVSlYDVcJCXU5WSh1b19mLi5mfSgkXyA1Nl1UJEdEKSlYDVcJCQkkXyA1Nl1UJEdEWWhZdUV2dHp5PSgifF9ffCIsJF8gNTZdVCRHRCk7DVcJCT4NVwk+DVcJDVcJDVcJQ0MtLS3liKTmlrfmmK/lkKbmnInmrITkvY3os4fmlplZ5rKS5pyJ55qE6Kmx6Ieq5YuV5bu656uL5qyE5L2NDVcJOXouPWZ4TFkoJF8gNTZdWWZvWSRHaGwkVSlYQ0Pmr5TlsI12em9b6LOH5paZDVcJCSQuenJfeT05WWhZZi4uZn0oJ2Z4WycsJ289Zi54TCcsJ289Zi54THR1Rz0nLCd5Zls9LmZIYj0nLCd5Zls9Xy5mSGInLCdFenk9JywneT10X3Z1eCcpO0ND5L6L5aSW5LiN5paw5aKe55qE6Y215YC8DVcJCXU5KFl1SF9mLi5mfSgkRywkLnpyX3k9OSlZKVl4ekhbdUhlPTsNVwkJdTlZKCF1SF9mLi5mfSgkRywkLnpyX3h6dGVFX0c9fSkpWVgNVwkJCSR4ekhILWxOLz14ZVs9KCJaTV1OQVldWklNTlkiMjRlels9bygkeHZ6b1QiW2ZhdD0iRCkyIllaZGRZIjI0ZXpbPW8oJEcpMiJZXU5CXVlje01NWW01Z2dOY11ZJ+eoi+W8j+eUn+aIkOashOS9jSciKTsNVwkJPg1XCT4NVw1XCUNDLeWIpOaWt+aYr+WQpui2hemBjumZkOWItuepuumWk+Wkp+Wwjw1XCXU5WSgkdUh1X3I9YW89W1Qicj1hX289WyJEVCJldnR6ZnlfRWYvX291Cj0iRCpxayR1SHVfcj1hbz1bVCJyPWFfbz1bIkRUIkh6cl85dXQ9IkQqcSskWz1Fdl9vdQo9KnFZJiZZJFs9RXZfb3UKPWwwKVgNVwkJdTlZKCRbPUV2Xzl1dD1ldnR6ZnlZJiZZeHplSFsoJFs9RXZfOXV0PWV2dHpmeSlsMCkNVwkJOXouPWZ4TFkoJFs9RXZfOXV0PWV2dHpmeVlmb1kkR2hsJFUpWA1XCQkJdTlZKFk5dXQ9Xz0vdW9bbygkVSlZKQ1XCQkJZUh0dUhHKCRVKTsNVwkJPg1XCQllSG89WygkWz1Fdl85dXQ9ZXZ0emZ5KTsNVwkJDVcJCWZ0PS5bKCR1SHVfcj1hbz1bVCJyPWFfbz1bIkRUImV2dHpmeV85ZXR0X0VvYiJELC1xKTsNVwkJPS91WzsNVwk+DVcNVw1XCWVIbz1bKCRfIDU2XVQiZnhbIkQpO1lDQ+enu+mZpOS4jeW/heimgeeahOmZo+WIl+WFgw1XCXU5WSgkXyA1Nl1UInV5IkRZaGhZY3tNTVl8fFkkXyA1Nl1UInV5IkRZaGhZIiJZfHxZJF8gNTZdVCJ1eSJEaGgiMCIpWA1XCQlDQy0tLS0tLS0tLS3mlrDlop7mjpLluo/ngrrmnIDlvozkuIDnrYZZKOWmguaenOacieaOkuW6j+WJjeW+jOWPg+aVuOWEquWFiCkNVwkJCXU5WShvWy5benR6cj0uKCR4dnpvVCJvei5bX0V6eT0iRCloaCJ5PW94IilYDVcJCQkJJF8gNTZdVCJvei5bIkRZaFkwOw1XCQkJPj10bz1YDVcJCQkJJG96LltZaFkkeHpISC1sUz1bQXpyKCJvPXQ9eFtZKlk5LnpFWSIyJHh2em9UIltmYXQ9IkQyIlkiMiR4dnpvVCJbZmF0PXR1b1tyTD0uPSJEMiJZNUFkTkFZSWpZb3ouW1l5PW94WXR1RXVbWXEiKTsNVwkJCQl1OVkoJG96LltUIm96LlsiRFkhaFlje01NKQ1XCQkJCQkkXyA1Nl1UIm96LlsiRFloWSRvei5bVCJvei5bIkQqcStxOw1XCQkJCT10bz0NVwkJCQkJJF8gNTZdVCJvei5bIkRZaFlxOwkNVwkJCT4NVwkJQ0MtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDVcJCWVIbz1bKCRfIDU2XVQidXkiRCk7WUND5paw5aKe5LiN6ZyA6KaB6Kit5a6aN2QNVwkJJF8gNTZdVCJ0ZkhiIkRZaFkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQidGZIYiJEOw1XCQkkXyA1Nl1UInguPWZbPV95Zls9IkRZaFkkXyA1Nl1UImV2eWZbPV95Zls9IkRZaFl5Zls9KCJqLUUteVkzOnU6byIpOw1XCQkkXyA1Nl1UInguPWZbPV9IZkU9IkRZaFkkXyA1Nl1UImV2eWZbPV9IZkU9IkRZaFkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiZnh4emVIWyJEOw1XCQkkWz1Fdl91eVloWVplW3pfdXkoJHh6SEgsJHh2em9UIltmYXQ9IkQpOw1XCQkkZXZ5WWhZJF8gNTZdOw1XCQkNVwkJJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEWWhZJFs9RXZfdXk7DVcJCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJbZmF0PV9bPUV2IkRZaFkkeHZ6b1QiW2ZhdD0iRDsNVwkJJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4W19bPUV2IkRZaFkiN2M2TkFdIjsNVwkJDVcJCUNDLS3mqpTmoYjmr5TlsI3liKrpmaQNVwkJdTlZKHh6ZUhbKCR4dnpvVCI5dXQ9X3hMPXhHIkQpbDApWA1XCQkJOXouPWZ4TFkoJHh2em9UIjl1dD1feEw9eEciRFlmb1kkR2hsJFUpWA1XCQkJCUNDLS1Z5bCL5om+5piv5ZCm5a2Y5Zyobz1vb3V6SFlbPUV2WeS4rVnlrZjlnKjliYfnp7vpmaQNVwkJCQl1OVkoeHplSFsoPS92dHp5PSgnfF9ffCcsJGV2eVQkVUQpKWwwWSYmWSRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRFkmJll4emVIWygkXzZONjY3NWNUImV2dHpmeV9bPUV2IkQpbDApWA1XCQkJCQk5ei49ZnhMWSg9L3Z0enk9KCd8X198JywkZXZ5VCRVRClZZm9ZJGZobCRhKVgNVwkJCQkJCXU5WShZIShmLi5mfV9vPWYueEwoJGEsJF82TjY2NzVjVCJldnR6ZnlfWz1FdiJEKWhoaDlmdG89KVkpWA1XCQkJCQkJCWVIbz1bKFkkXzZONjY3NWNUImV2dHpmeV9bPUV2IkRUZi4uZn1fbz1mLnhMKCRhLCRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRClEWSk7WUNDLemHjemZo+WIl+S4reenu+mZpA1XCQkJCQkJPg1XCQkJCQk+DVcJCQkJPg1XCQkJPkNDQy0tPUh5WTl6Lj1meExZOXV0PV94TD14Rw1XCQk+DVcJCQ1XCQlvfW9bPUVfWz1FdigkeHpISCk7DVcJCQ1XCQkkZlVmdGU9WWhZJHh6SEgtbFplW3pOLz14ZVs9KCR4dnpvVCJbZmF0PSJELCRldnksIjdjNk5BXSIpOw1XCQl1OVkoJGZVZnRlPSlYDVcJCQl4dnpvXy49b3ouWygpOw1XCQkJdTlZKCR4dnpvVCJ1SG89LltfeGZ0dGFmeEciRCFoY3tNTSlYDVcJCQkJZnQ9LlsoJ+aWsOWinuaIkOWKnycsJHh2em9UInVIbz0uW194ZnR0YWZ4RyJEKTsNVwkJCT49dG89WA1XCQkJCUNDZnQ9LlsoJ+aWsOWinuaIkOWKnycsSHpyX2UudCgndXk6JzIkWz1Fdl91eSxbLmU9KSk7DVcJCQkJZnQ9LlsoJ+aWsOWinuaIkOWKnycsSHpyX2UudCgndXknKSk7DVcJCQk+DVcJCT4NVwk+PXRvPVgNVwkJdTlZKG9bLlt6dHpyPS4oJF8gNTZdVCJ1eSJEKWhoJ3RmSGInKVkkckw9Lj1ZaFkkeHZ6b1QiW2ZhdD1yTD0uPSJEO1k9dG89WSRyTD0uPVloWSd1eWgnMiRfIDU2XVQidXkiRDtZQ0MtLS3liKTmlrfmmK/lkKbngrrllq7lgLzos4fmlpkNVwkJZUhvPVsoJF8gNTZdVCJ1eSJEKTtZQ0PmlrDlop7kuI3pnIDopoHoqK3lrpo3ZA1XCQkkWz1Fdl91eVloWSRfIDU2XVQidXkiRDsNVwkJJF8gNTZdVCJldnlmWz1feWZbPSJEWWhZeWZbPSgiai1FLXlZMzp1Om8iKTsNVwkJJF8gNTZdVCJldnlmWz1fSGZFPSJEWWhZJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4eHplSFsiRDsNVwkJJGV2eVloWSRfIDU2XTsNVwkJDVcJCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJ5ZltmX1s9RXYiRFloWSR4ekhILWxTPVtaLi5mfSgibz10PXhbWSpZOS56RVkiMiR4dnpvVCJbZmF0PSJEMiJZckw9Lj1ZIjIkckw9Lj0pO1lDQ+iomOmMhOabtOaWsOWJjeeahOizh+aWmQ1XCQkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiW2ZhdD1fWz1FdiJEWWhZJHh2em9UIltmYXQ9IkQ7DVcJCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJmeFtfWz1FdiJEWWhZInsgZFpdTiI7DVcJCQ1XCQlDQy0t5qqU5qGI5q+U5bCN5Yiq6ZmkDVcJCXU5WSh4emVIWygkeHZ6b1QiOXV0PV94TD14RyJEKWwwKVgNVwkJCSRbPUV2X3lmW2ZZaFkkeHpISC1sUz1bQXpyKCJvPXQ9eFtZIjJ1RXZ0enk9KCcsJywkeHZ6b1QiOXV0PV94TD14RyJEKTIiWTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDInWXJMPS49WScyb1suXy49dnRmeD0oJ3JMPS49JywnJyxvWy5benR6cj0uKCRyTD0uPSkpWSk7DVcJCQk5ei49ZnhMWSgkeHZ6b1QiOXV0PV94TD14RyJEWWZvWSRHaGwkVSlYDVcJCQkJOXV0PV95dnU9KD0vdnR6eT0oJ3xfX3wnLCRbPUV2X3lmW2ZUJFVEKSw9L3Z0enk9KCd8X198JywkZXZ5VCRVRCkpOw1XCQkJCQ1XCQkJCUNDLS1Z5bCL5om+5piv5ZCm5a2Y5Zyobz1vb3V6SFlbPUV2WeS4rVnlrZjlnKjliYfnp7vpmaQNVwkJCQl1OVkoeHplSFsoPS92dHp5PSgnfF9ffCcsJGV2eVQkVUQpKWwwWSYmWSRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRFkmJll4emVIWygkXzZONjY3NWNUImV2dHpmeV9bPUV2IkQpbDApWA1XCQkJCQk5ei49ZnhMWSg9L3Z0enk9KCd8X198JywkZXZ5VCRVRClZZm9ZJGZobCRhKVgNVwkJCQkJCXU5WShZIShmLi5mfV9vPWYueEwoJGEsJF82TjY2NzVjVCJldnR6ZnlfWz1FdiJEKWhoaDlmdG89KVkpWA1XCQkJCQkJCWVIbz1bKFkkXzZONjY3NWNUImV2dHpmeV9bPUV2IkRUZi4uZn1fbz1mLnhMKCRhLCRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRClEWSk7WUNDLemHjemZo+WIl+S4reenu+mZpA1XCQkJCQkJPg1XCQkJCQk+DVcJCQkJPg1XCQkJPkNDQy0tPUh5WTl6Lj1meExZOXV0PV94TD14Rw1XCQk+DVcJCQ1XCQkNVwkJb31vWz1FX1s9RXYoJHh6SEgpOw1XDVcJCSRmVWZ0ZT1ZaFkkeHpISC1sWmVbek4vPXhlWz0oJHh2em9UIltmYXQ9IkQsJGV2eSwieyBkWl1OIiwkckw9Lj0pOw1XCQl1OVkoJGZVZnRlPSlZWA1XCQl1OVkoJHh2em9UImV2eWZbPV94ZnR0YWZ4RyJEIWhje01NKVgNVwkJCWZ0PS5bKCfkv67mlLnmiJDlip8nLCR4dnpvVCJ1SG89LltfeGZ0dGFmeEciRCk7DVcJCT49dG89WA1XCQkJQ0NmdD0uWygn5L+u5pS55oiQ5YqfJyxIenJfZS50KCd1eTonMiRbPUV2X3V5LFsuZT0pKTsNVwkJCXU5KG9bLlt6dHpyPS4oJF9TTl1UInV5IkQpIWgidGZIYiIpWWZ0PS5bKCfkv67mlLnmiJDlip8nLEh6cl9lLnQoJ3V5JykpO1k9dG89WWZ0PS5bKCfkv67mlLnmiJDlip8nLC1xKTsNVwkJPg1XCQk+PXRvPVgNVwkJCXYudUhbXy4oJGV2eSk7DVcJCQk9eEx6WSdldnlmWz1ZPS4ueic7PS91WzsNVwkJPg1XCT4NVwlDKj14THpZJ2tveC51dltscnVIeXpyMnR6eGZbdXpIMkwuPTloIicyJF82TkFRTkFUJyAzIF82Tk1uJ0QyJyJrQ294LnV2W2xsJzsqQw1XPg1XPg1XDVdDQy0tLS0tLeWIqumZpC0tLS0tLS0NV3U5WSgkX1NOXVQieT10X3V5IkRZIWhZY3tNTVkmJlkkX1NOXVQieT10X3V5IkQhaFknJylYDVcJdTkoJHh0em89VCJ5PXQiRGhocSkNVwlYDVcJCWZ0PS5bKCLkuI3plovmlL7liKrpmaTlip/og70iLCBmYj1fYj1bX2UudCgneT10X3V5JykpOw1XCQk9L3VbOw1XCT4NVw1XCUND5b6M5Y+w55Ww5YuV6KiY5oa2DVcJJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEWWhZJHh6SEgtbFM9W1ouLmZ9KCJvPXQ9eFtZKlk5LnpFWSIyJHh2em9UIltmYXQ9IkQyIllyTD0uPVl1eVl1SFkoIjIkX1NOXVQieT10X3V5IkQyIikiKTtZQ0PoqJjpjITmm7TmlrDliY3nmoTos4fmlpkNVwkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiW2ZhdD1fWz1FdiJEWWhZJHh2em9UIltmYXQ9IkQ7DVcNVwl1OVkoJHh2em9UInk9dCJEIWhje01NKVgNVwkJJGZVZnRlPVloWSR4ekhILWxOLz14ZVs9KCJ7IGRaXU5ZIjIkeHZ6b1QiW2ZhdD0iRDIiWTZOXVlvW2ZbZW9oIjIkeHZ6b1QieT10IkQyIllSM05BTll1eVl1SFkoIjIkX1NOXVQieT10X3V5IkQyIikiKTtZQ0PlgYfliKrpmaQNVwkJJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4W19bPUV2IkRZaFkiZE5NTl1OXzlmdG89IjsNVwk+PXRvPVgNVwkJDVcJCUNDLeWIqumZpOeVsOWLleW+jOmBjuaZguizh+aWmQ1XCQkkWz1Fdl95ZltmWWhZJHh6SEgtbFM9W1ouLmZ9KCJvPXQ9eFtZIjJ1RXZ0enk9KCcsJywkeHZ6b1QiOXV0PV94TD14RyJEKTIiWTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDIiWXJMPS49WXV5WXVIWSgiMiRfU05dVCJ5PXRfdXkiRDIiKSJZKTsNVwkJOXouPWZ4TFkoJHh2em9UIjl1dD1feEw9eEciRFlmb1kkR2hsJFUpWA1XCQkJdTlZKCRbPUV2X3lmW2YpDVcJCQk5ei49ZnhMWSgkWz1Fdl95ZltmWWZvWSRmaGwkYSlYDVcJCQkJOXV0PV95dnU9KD0vdnR6eT0oJ3xfX3wnLCRbPUV2X3lmW2ZUJGZEVCRVRCksZi4uZn0oKSk7DVcJCQk+DVcJCT5DQ0MtLT1IeVk5ei49ZnhMWTl1dD1feEw9eEcNVwkJDVcJCSRmVWZ0ZT1ZaFkkeHpISC1sTi89eGVbPSgiZE5NTl1OWW5BNWdZIjIkeHZ6b1QiW2ZhdD0iRDIiWVIzTkFOWXV5WXVIWSgiMiRfU05dVCJ5PXRfdXkiRDIiKSIpOw1XCQkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiZnhbX1s9RXYiRFloWSJkTk1OXU4iOw1XCT4NVwlvfW9bPUVfWz1FdigkeHpISCk7DVcNVwl1OVkoJGZVZnRlPSlZWA1XCQl1OVkoJHh2em9UInk9dD1bPV94ZnR0YWZ4RyJEKQ1XCQkJZnQ9LlsoJ+WIqumZpOaIkOWKnycsJHh2em9UInk9dD1bPV94ZnR0YWZ4RyJEKTsNVwkJPXRvPQ1XCQkJZnQ9LlsoJ+WIqumZpOaIkOWKnycsSHpyX2UudCgneT10X3V5JykpOw1XCT4NVz4NV0NDLS0tLS0tLS0tLS0tLS0tLQ1XDVcNVw1XQ0MtLeS4iuWCs+aqlOahiOaaq+WtmOWIqumZpA1XdTlZKCRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRFkmJlkkXzZONjY3NWNUImV2dHpmeV9lLnQiRClYDVcJdTlZKCRfNk42Njc1Y1QiZXZ0emZ5X1s9RXYiRFkmJll4emVIWygkXzZONjY3NWNUImV2dHpmeV9bPUV2IkQpbDApDVcJOXouPWZ4TFkoJF82TjY2NzVjVCJldnR6ZnlfWz1FdiJEWWZvWSRHaGwkVSlYDVcJCXU5WShZOXV0PV89L3VvW28oJF82TjY2NzVjVCJldnR6ZnlfZS50IkQyJFUpWSkNVwkJZUh0dUhHKCRfNk42Njc1Y1QiZXZ0emZ5X2UudCJEMiRVKTsNVwk+DVcJZUhvPVsoJF82TjY2NzVjVCJldnR6ZnlfWz1FdiJEKTsNVz4NVyRfNk42Njc1Y1QiZXZ0emZ5X2UudCJEWWhZJHh2em9UIjl1dD1fZS50IkQ7DVcNV0MqKuizh+aWmeW6q+Wkp+Wwj+WIpOaWt+ioiuaBrypDDVd1OVkoJHlhXzlldHRfeEw9eEcpWA1XCWZ0PS5bKCR1SHVfcj1hbz1bVCJyPWFfbz1bIkRUInlhXzlldHRfRW9iIkQsLXEpOw1XPg1XDVcNVw1XQ0MtLS0tLS0tLS0tLemggemdouizh+aWmeaTt+WPlg1XdTlZKCR4dnpvVCJbZmF0PS56ciJEaGhje01NKVkNVwkkeHZ6b1QiW2ZhdD0uenIiRFloWScqJzsNVw1Xb3J1W3hMWSgkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiVXU9ciJEKVgNV3hmbz1ZInk9W2Z1dCI6Q0Pllq7nrYYNVwkkbzR0WWhZIm89dD14W1kiMiR4dnpvVCJbZmF0PS56ciJEMiJZOS56RVkiMiR4dnpvVCJbZmF0PSJEMidZJzIkeHZ6b1QiW2ZhdD1KenVIIkQyIllSM05BTlkiMiR4dnpvVCJbZmF0PXJMPS49IkQ7DVcJJHlmW2ZUInpIPSJEWWhZJHh6SEgtbFM9W0F6cigkbzR0KTsNVwlDQ0MtLS0tLS0tLS0tLS0tLeWwh+aMh+WumuashOS9jeaIkOeCuue3qOi8r+WZqA1XCTl6Lj1meExZKCQuenJfeHp0ZUVfRz19WWZvWSRHaGwkVSlYDVcJCXU5WSghdW9fSGVFPS51eCgkVSkpWVgNVwkJCSR5ZltmVCJ6SD0iRFQkVTIiXzl4RyJEWWhZbUc9eXVbKCRVLHk9PGV6Wz1vKCR5ZltmVCJ6SD0iRFQkVUQsLXEpKTsNVwkJCSR5ZltmVCJ6SD0iRFQkVTIiXzl4R189Zm99IkRZaFltRz15dVsoJFUseT08ZXpbPW8oJHlmW2ZUInpIPSJEVCRVRCwtcSksJz1mb30nKTsNVwkJCSR5ZltmVCJ6SD0iRFQkVTIiX3lmWz12dXhHPS4iRFloWXlmWz12dXhHPS4oJFUsJHlmW2ZUInpIPSJEVCRVRCk7DVcJCT4NVwk+DVcJQ0MtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NVwkkeWZbZlQiekg9IkRUIm9bZltlb19MW0V0IkRZaFlnZkc9Xy5meXV6KCR4dnpvVCJvW2ZbZW8iRCwkeWZbZlQiekg9IkRUIm9bZltlbyJELCdvW2ZbZW8nKTtDQy0t54uA5oWL6KO95L2c5qiZ57GkDVdhLj1mRzsNVw1XeGZvPVkidHVvWyI7Q0PmuIXllq4NVwlDQy0t6Ieq5YuV6KaP5YqD5pCc5bCL5ZCN5a6a576pDVcJQyoNVwkkbzR0WWhZIm89dD14W1kiMiR4dnpvVCJbZmF0PS56ciJEMiJZOS56RVkiMiR4dnpvVCJbZmF0PSJEMidZJzIkeHZ6b1QiW2ZhdD1KenVIIkQyJ1knMiR4dnpvVCJbZmF0PXR1b1tyTD0uPSJEMiR4dnpvVCJ0dW9bei55PS5hfSJEOw1XCSR4dnpvX1s9RXZZaFkkeHpISC1sUz1bWi4uZn0oJG80dCk7DVcJdTlZKCR4dnpvX1s9RXYpWA1XCQk5ei49ZnhMWSgkeHZ6b19bPUV2WWZvWSRHaGwkVSlYDVcJCQkkeHZ6b19bPUV2MVREWWhZJFVUIkhmRT0iRDsNVwkJPg1XCQkkeWZbZlQiZmVbenh6RXZ0PVs9IkRZaFl1RXZ0enk9KCIsIiwkeHZ6b19bPUV2MSk7DVcJPg1XCSpDDVcJDVcJJG80dFloWSJvPXQ9eFtZIjIkeHZ6b1QiW2ZhdD0uenIiRDIiWTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDInWScyJHh2em9UIltmYXQ9Snp1SCJEMidZJzIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDIkbz1mLnhMMiR4dnpvVCdiLnpldl9hfSdEMiR4dnpvVCJ0dW9bei55PS5hfSJEMiJZdHVFdVtZIjIoKCRfU05dVCJ2ZmI9IkQtcSkqJHh2em9UInZmYj14emVIWyJEKTIiLCIyJHh2em9UInZmYj14emVIWyJEOw1XCSR5ZltmVCJ0dW9bIkRZaFkkeHpISC1sUz1bWi4uZn0oJG80dCk7DVcJdTlZKCR5ZltmVCJ0dW9bIkQpDVcJOXouPWZ4TFkoJHlmW2ZUInR1b1siRFlmb1kkR2hsJFUpWA1XCQkkeWZbZlQidHVvWyJEVCRHRFQib1tmW2VvX0xbRXQiRFloWWdmRz1fLmZ5dXooJHh2em9UIm9bZltlbyJELCRVVCJvW2ZbZW8iRCwnb1tmW2VvXycyJFVUInV5IkQpOw1XCT4NV2EuPWZHOw1XPg1XJHg9SFs9LnZ6b280dFloWSRvNHQ7Q0MtLeWwjuWHuuizh+aWmeW6q+iqnuazlVnlgbXpjK/nlKgNVw1XDVcNV0NDLS0t6aCB56K86LOH6KiKLS0tLS0tLS0tLS0tLQ1XJHZmYj11SDl6VCJvW2YuW195Zls9IkRZaFkoJF9TTl1UInZmYj0iRC1xKSokeHZ6b1QidmZiPXh6ZUhbIkQrcTtZQ0Plvp7nrKzlub7nrYYNVyR2ZmI9dUg5elQiPUh5X3lmWz0iRFloWSgoJF9TTl1UInZmYj0iRC1xKSokeHZ6b1QidmZiPXh6ZUhbIkQpKyR4dnpvVCJ2ZmI9eHplSFsiRDtDQ+WIsOesrOW5vuethg1XJHZmYj11SDl6VCJIenJfdmZiPSJEWWhZJF9TTl1UInZmYj0iRDsNVw1XCSRvNHRZaFkibz10PXhbWXh6ZUhbKCopWWZvWXh4WTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDInWScyJHh2em9UIltmYXQ9Snp1SCJEMidZJzIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDIkbz1mLnhMOw1XCXU5WShvWy52em8ob1suW3p0enI9LigkbzR0KSwnYi56ZXYnKSlYWUND5Yik5pa35piv5ZCm54K6576k57WE6LOH5paZ5YGa54K65YiX6KGoDVcJCSRmdHR4emVIW1loWSR4ekhILWxTPVtaLi5mfSgkbzR0KTsNVwkJJHZmYj11SDl6VCJ2ZmI9X3lmWz1feHplSFsiRFloWXh6ZUhbKCRmdHR4emVIWyk7WUND5YWx5bm+562GDVcJPj10bz1YDVcJCSRmdHR4emVIW1loWSR4ekhILWxTPVtBenIoJG80dCk7DVcJCSR2ZmI9dUg5elQidmZiPV95Zls9X3h6ZUhbIkRZaFkkZnR0eHplSFtUInh4IkQ7WUND5YWx5bm+562GDVcJPg1XDVd1OVkoJHZmYj11SDl6VCI9SHlfeWZbPSJEWWxoWSR2ZmI9dUg5elQidmZiPV95Zls9X3h6ZUhbIkQpWSR2ZmI9dUg5elQiPUh5X3lmWz0iRFloWSR2ZmI9dUg5elQidmZiPV95Zls9X3h6ZUhbIkQ7Q0PlpoLmnpzpoa/npLrnrYbmlbjlpKfmlrznuL3nrYbmlbhZ562J5pa857i9562G5pW4DVckdmZiPXVIOXpUImZ0dF92ZmI9IkRZaFl4PXV0KCR2ZmI9dUg5elQidmZiPV95Zls9X3h6ZUhbIkRDJHh2em9UInZmYj14emVIWyJEKTtDQ+WFseWkmuWwkemggQ1XDVcJQ0MtLS3omZXnkIZ7QU3kuK3lj4PmlbgNVwkkdmZiPV9lLnRvaD0vdnR6eT0oJ0MnLCRfNk5BUU5BVCdBTjx7TjZdX3tBNydEKTsNVwkkdmZiPV9lLnRvaD0vdnR6eT0oJz8nLCR2ZmI9X2UudG9UeHplSFsoJHZmYj1fZS50byktcUQpOw1XCSR2ZmI9X2UudG9oPS92dHp5PSgnJicsJHZmYj1fZS50b1R4emVIWygkdmZiPV9lLnRvKS1xRCk7DVcJJHZfZS50WWhZJyc7DVcJOXouPWZ4TFkoJHZmYj1fZS50b1lmb1kkR2hsJFUpWA1XCQkkb1tfZS50WWg9L3Z0enk9KCdoJywkdmZiPV9lLnRvVCRHRCk7DVcJCXU5WSgkb1tfZS50VDBEIWgidmZiPSIpDVcJCXU5WSgkdl9lLnRoaCcnKVlYJHZfZS50WWgnPycyJG9bX2UudFQwRDInaCcyJG9bX2UudFRxRDs+PXRvPVgkdl9lLnRZMmgnJicyJG9bX2UudFQwRDInaCcyJG9bX2UudFRxRDs+DVcJPg1XCUNDLS0tLS0tLS0tLS0tLS0NVw1XdTlZKCRfU05dVCJ2ZmI9IkQqcVlsWXEpWSR2ZmI9dUg5elQiZXZfZS50IkRZaFkkdl9lLnQyJyZ2ZmI9aCcyKCRfU05dVCJ2ZmI9IkQtcSk7WUNDWeS4iuS4gOmggeaMiemIlQ1XdTlZKCR2ZmI9dUg5elQiZnR0X3ZmYj0iRFlsWSRfU05dVCJ2ZmI9IkQpWSR2ZmI9dUg5elQieXpySF9lLnQiRFloWSR2X2UudDInJnZmYj1oJzIoJF9TTl1UInZmYj0iRCtxKTtZQ0PkuIvkuIDpoIHmjInpiJUNVw1XJHZmYj11SDl6VCJKZUV2X3ZmYj1fZS50IkRZaFkkdl9lLnQ7WUND6aCB56K8ODbkvb/nlKh7QU0NVw1XOXouWSgkdmZiPXV5L2hxOyR2ZmI9dXkvWWtoWSR2ZmI9dUg5elQiZnR0X3ZmYj0iRDskdmZiPXV5LysrKVgNVwkkdmZiPXVIOXpUIkplRXZfdmZiPV9MW0V0IkRZMmhZJ2t6dlt1ekhZVWZ0ZT1oIicyJHZmYj11eS8yJyJZJzsNVwl1OVkoJF9TTl1UInZmYj0iRGhoJHZmYj11eS8pWSR2ZmI9dUg5elQiSmVFdl92ZmI9X0xbRXQiRFkyaFknbz10PXhbPXknOw1XCSR2ZmI9dUg5elQiSmVFdl92ZmI9X0xbRXQiRFkyaFknbCcyJHZmYj11eS8yJ2tDenZbdXpIbCc7DVc+DVcNV0NDLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NVyRbdnQtbGZvb3ViSCgidmZiPV9bZmF0PSIsJHZmYj11SDl6KTtZQ0PpoIHnorzlsI7lhaVvRWYuW30NVw1XDVcNVw1XQ0MtLS0t6Ieq5YuV6KiY5oa25L+u5pS55oiW5bu656uL6ICF55qE5biz5oi26LOH6KiKDVc5ZUh4W3V6SFlvfW9bPUVfWz1FdigkeHpISClYDVcJYnR6YWZ0WSRfNk42Njc1YzsNVwlidHphZnRZJF8gNTZdOw1XCWJ0emFmdFkkX1NOXTsNVwkkW2ZhdD1fZnR0WWhZJHh6SEgtbFM9W1ouLmZ9KCJvTHpyWVtmYXQ9byIpOw1XCTl6Lj1meExZKCRbZmF0PV9mdHRZZm9ZJEdobCRVKVkkW2ZhdD1fdHVvW1REWWhZJFVUMEQ7DVcJdTlZKCF1SF9mLi5mfSggQU5uN0IyJ299b1s9RV9bPUV2JywkW2ZhdD1fdHVvWykpWFlDQy0tLS3mspLmnInmraTos4fmlpnooajlsLHlibXlu7rkuIDlgIsNVwkJJHh6SEgtbE4vPXhlWz0oIm1BTlpdTlldWklNTllgIjIgQU5uN0IyIm99b1s9RV9bPUV2YFkoWVlgdXlgWXVIWygxMClZYzVdWWN7TU1ZZmVbel91SHguPUU9SFssWVlgZnhbYFlVZi54TGYuKHEwKVl5PTlmZXRbWWN7TU0sWVlgZnh4emVIW2BZVWYueExmLigxMClZYzVdWWN7TU0sWVlgSVptc19kWl1aYFlNNWNTXU5CXVksWVlgIDU2XV9kWl1aYFlNNWNTXU5CXVksWVlgbjdNTl97QU1gWVs9L1tZYzVdWWN7TU0sWVlgeC49Zls9X3lmWz1gWXlmWz1bdUU9WWM1XVlje01NLFlZIEE3Z1pBallzTmpZWShgdXlgKSlZTmNTN2NOaGd9NzZaZ1lZZE5uWntNXVltM1pBNk5daGVbOVZZWntdNV83Y21BTmdOY11ocVk7Iik7DVcJPg1XCSRvfW9feWZbZlQiZnh4emVIWyJEWWhZJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUImZ4eHplSFsiRDsNVwl1OVkoeHplSFsoJF8gNTZdKWwwKVgNVwkJOXouPWZ4TFkoJF8gNTZdWWZvWSRHaGwkVSlYDVcJCQl1OVkoJG99b195ZltmVCIgNTZdX2RaXVoiRCFoJycmJiRvfW9feWZbZlQiIDU2XV9kWl1aIkQhaGN7TU0pDVcJCQkJJG99b195ZltmVCIgNTZdX2RaXVoiRFkyaFknfioqKip+JzsNVwkJCQkNVwkJCSRvfW9feWZbZlQiIDU2XV9kWl1aIkRZMmhZJEcyJ0BuQCcyJFU7DVcJCQkNVwkJCUNDLeeCuuS/ruaUueaZgg1XCQkJdTlZKCRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJmeFtfWz1FdiJEaGgieyBkWl1OIilYDVcJCQkJCXU5WSgkb31vX3lmW2ZUIklabXNfZFpdWiJEIWgnJyYmJG99b195ZltmVCJJWm1zX2RaXVoiRCFoY3tNTSkNVwkJCQkJCSRvfW9feWZbZlQiSVptc19kWl1aIkRZMmhZJ34qKioqfic7DVcJCQkJCSRvfW9feWZbZlQiSVptc19kWl1aIkRZMmhZJEcyJ0BuQCcyJF82TjY2NzVjVCJmeUV1SF91SDl6IkRUInlmW2ZfWz1FdiJEVDBEVCRHRDsNVwkJCT4NVwkJPg1XCT49dG89WXU5KCRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJ5ZltmX1s9RXYiRClYDVcJCTl6Lj1meExZKCRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJ5ZltmX1s9RXYiRFlmb1kkR2hsJFUpWA1XCQkJJG99b195ZltmVCIgNTZdX2RaXVoiRFQkR0RZaFkkVVQidXkiRDInWScyJFVUIkhmRT0iRDsNVwkJPg1XCQl1OVkodW9fZi4uZn0oJG99b195ZltmVCIgNTZdX2RaXVoiRCkpDVcJCSRvfW9feWZbZlQiIDU2XV9kWl1aIkRZaFl1RXZ0enk9KCd8X198Jywkb31vX3lmW2ZUIiA1Nl1fZFpdWiJEKTsNVwk+DVcJDVcJJG99b195ZltmVCJmeFsiRFloWSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJmeFtfWz1FdiJEOw1XCSRvfW9feWZbZlQibjdNTl97QU0iRFloWSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJbdVt0PSJEMid8X198JzIkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQidmZiPSJEOw1XCSRfNk42Njc1Y1QiZnlFdUhfdUg5eiJEVCJbdVt0PV9bPUV2IkRZaFkkXzZONjY3NWNUImZ5RXVIX3VIOXoiRFQiW3VbdD0iRDtDQ+iomOaGtuWPr+mChOWOn+eahOaYr+WTquWAi+WKn+iDvemggQ1XCSRvfW9feWZbZlQieC49Zls9X3lmWz0iRFloWXlmWz0oImotRS15WTM6dTpvIik7DVcJJHh6SEgtbFplW3pOLz14ZVs9KCBBTm43QjIib31vWz1FX1s9RXYiLCRvfW9feWZbZiwiN2M2TkFdIik7DVc+DVcNVw1XQyroqK3lrprmjpLluo/kvY3nva7lvoxZ6YeN5paw5o6S5bqPKkMNVzllSHhbdXpIWXh2em9fLj1vei5bKCRVZnRlPWgwKVgNVwlidHphZnRZJHh6SEg7DVcJYnR6YWZ0WSR4dnpvOw1XCXU5WSgkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRGhoY3tNTVl8fFkkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRGhoJycpWSR4dnpvVCJbZmF0PXR1b1tyTD0uPSJEWWhZJ1lSM05BTllxWSc7DVcJdTlZKCR4dnpvVCJvei5bX3h0Zm9vIkQhaGN7TU0mJiR4dnpvVCJvei5bX3h0Zm9vIkQhaCcnKQ1XCVgNVwkJJG96LltfeHRmb29ZaFkkeHpISC1sUz1bWi4uZn0oIm89dD14W1kqWTkuekVZIjIkeHZ6b1QiW2ZhdD0iRDIiWSIyJHh2em9UIltmYXQ9Snp1SCJEMidZJzIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDInWWIuemV2WWF9WScyJHh2em9UIm96LltfeHRmb28iRCk7DVcJCXU5WSgkb3ouW194dGZvbykNVwkJOXouPWZ4TFkoJG96LltfeHRmb29ZZm9ZJEdobCRVKVgNVwkJCSR4ekhILWxOLz14ZVs9KCI2Tl1ZQEo6aDAiKTsNVwkJCXU5WSgkVVQkeHZ6b1Qib3ouW194dGZvbyJERClYWUNDLS3liKTmlrflsI3osaHpnZ7nqbrlgLwNVwkJCQkkZlVmdGU9WWhZJHh6SEgtbE4vPXhlWz0oInsgZFpdTlkiMiR4dnpvVCJbZmF0PSJEMiJZNk5dWW96LltoQEo6aEBKK3FZIjIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDIiWVpjZFkiMiR4dnpvVCJvei5bX3h0Zm9vIkQyImgnIjIkVVQkeHZ6b1Qib3ouW194dGZvbyJERDIiJ1kiMiR4dnpvVCJ0dW9bei55PS5hfSJEKTsNVwkJCT49dG89WA1XCQkJCSRmVWZ0ZT1ZaFkkeHpISC1sTi89eGVbPSgieyBkWl1OWSIyJHh2em9UIltmYXQ9IkQyIlk2Tl1Zb3ouW2hASjpoQEorcVkiMiR4dnpvVCJbZmF0PXR1b1tyTD0uPSJEMiJZIjIkeHZ6b1QidHVvW3oueT0uYX0iRCk7DVcJCQk+DVcJCT4NVwk+PXRvPVgNVwkJJHh6SEgtbE4vPXhlWz0oIjZOXVlASjpoMCIpOw1XCQkkZlVmdGU9WWhZJHh6SEgtbE4vPXhlWz0oInsgZFpdTlkiMiR4dnpvVCJbZmF0PSJEMiJZNk5dWW96LltoQEo6aEBKK3FZIjIkeHZ6b1QiW2ZhdD10dW9bckw9Lj0iRDIiWSIyJHh2em9UInR1b1t6Lnk9LmF9IkQpOw1XCT4NVz4NVw1XDVdDQypZ5qqU5qGI6Zmj5YiX5q+U5bCNWSjljp/pmaPliJdZ5bCN5oeJWeaWsOmZo+WIlykqQ0MNVzllSHhbdXpIWTl1dD1feXZ1PSgkZi4uZn1xLCRmLi5mfTEsJDl1dD1lLnRoY3tNTSlYDVcJYnR6YWZ0WSR4dnpvOw1XCXU5WSgkOXV0PWUudGhoY3tNTSlZJDl1dD1lLnRZaFkkeHZ6b1QiOXV0PV9lLnQiRDsNVwkkSD1yX2YuLmZ9WWhZZi4uZn1feXU5OSgkZi4uZn1xLCRmLi5mfTEpO1lDQy0t5Y+W5b6X5YWp5YCL6Zmj5YiX5LiN55u45ZCM6JmVDVcJdTlZKCRIPXJfZi4uZn1ZJiZZeHplSFsoJEg9cl9mLi5mfSlsMCkNVwk5ei49ZnhMWSgkSD1yX2YuLmZ9WWZvWSRHaGwkVSlYDVcJCXU5WSgkVSFoJydZJiZZJFUhaGN7TU1ZJiZZOXV0PV89L3VvW28oJDl1dD1lLnQyJFUpWSkNVwkJZUh0dUhHKCQ5dXQ9ZS50MiRVKTsNVwk+DVc+DVcNVzllSHhbdXpIWXh2em9feC49Zls9X1tmYXQ9KCRbZmF0PSlYDVcJYnR6YWZ0WSR4ekhIOw1XCSR4ekhILWxOLz14ZVs9KCINVwkJbUFOWl1OWV1aSU1OWWAiMiRbZmF0PTIiYFkoDVcJCVlZYHV5YFl1SFsoMTApWWM1XVlje01NWWZlW3pfdUh4Lj1FPUhbLA1XCQlZWWBvei5bYFl5emVhdD1ZeT05ZmV0W1knMCcsDVcJCVlZYG9bZltlb2BZW3VIfXVIWyhPKVl5PTlmZXRbWWN7TU0sDVcJCVlZYHRmSGJgWVVmLnhMZi4oMTApWXk9OWZldFtZY3tNTSwNVwkJWVlgeC49Zls9X3lmWz1gWXlmWz1bdUU9WXk9OWZldFtZY3tNTSwNVwkJWVlgZXZ5Zls9X3lmWz1gWXlmWz1bdUU9WXk9OWZldFtZY3tNTSwNVwkJWVlgeC49Zls9X0hmRT1gWVVmLnhMZi4oMTApWXk9OWZldFtZY3tNTSwNVwkJWVlgZXZ5Zls9X0hmRT1gWVVmLnhMZi4oMTApWXk9OWZldFtZY3tNTSwNVwkJWVkgQTdnWkFqWXNOallZKGB1eWApDVcJCSlZTmNTN2NOaDdISHpkSVlZZE5uWntNXVltM1pBNk5daGVbOVZZbTVnZ05jXWgn56iL5byP55Sf5oiQ6LOH5paZ6KGoJ1lae101XzdjbUFOZ05jXWhxWTsNVwkiKTsNVz4NVz9s';$_D=strrev('edoced_46esab');eval($_D('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCdIMmdHdnBRIFI9Zj5kaC48cXthQVhsS1VuTDN1RFRlQkpzazhyU0Uxd0l9Y103NmpDTnlWUG1pWQovRk96V1pNdHhvNGI5WzA1Jywnbi5Na3AzVlBXZWF9RD1yUTFVYlJ7PjZ2RmhIaV1bdVhqSzxKd0dtMlpCeU5USVNZL0VkODdDOSB6eDU0bwpBTGxjc3FnZnQwTycpOyRfUj1lcmVnX3JlcGxhY2UoJ19fRklMRV9fJywiJyIuJF9GLiInIiwkX1gpO2V2YWwoJF9SKTskX1I9MDskX1g9MDs='));?>