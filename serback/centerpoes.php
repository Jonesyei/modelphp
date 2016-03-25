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
 $_F=__FILE__;$_X='P1dsPy5ZLkwNPUgqTGROYWp7YUxlIExBckVhcQ09DT3miJDngrrnt6jovK/lmajmrITkvY3oqK3lrppM6KGo56S65pa55byPTEwkZmp7anMickVhInZz5qyE5L2N5ZCN56ixOSdfdWQwJ3Y7DT3miJDngrrnsKHmmJPniYjnt6jovK/lmajmrITkvY3oqK3lrppM6KGo56S65pa55byPTEwkZmp7anMickVhInZz5qyE5L2N5ZCN56ixOSdfdWQwX2FqcSAndjsNPeaIkOeCuuaXpeacn+mBuOaTh+WZqOioreWumkxM6KGo56S65pa55byPTEwkZmp7anMickVhInZz5qyE5L2N5ZCN56ixOSdfZmp7YUdJZDBhTid2Ow09LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLeiqquaYjuaWh+S7tkwtLS1MTOWwjuWFpeWPg+aVuOioreWumg09SEjliJfooajpoIHlj4PmlbgNPSRkR3JxcyJHamhhZHJERXsidkx9TDI7TEhI5q+P6aCB6aGv56S6562G5pW4DT0kZEdycXMie2plUGFQSXF7PHdhTmEidkx9TCIxWThpOEx7IEdhfSdlakVFYU4nIjtISOWIl+ihqOmhr+ekuuizh+aWmeeahOaineS7tg09JGRHcnFzIntqZVBhTnI8InZMfUwiaixlLGQiO0xISOaqouimluashOS9jeioreWumg09JGRHcnFzIntqZVBhInZMfUwiTFVqUFA8YWZfVW1JZmFyIjsNPSRkR3JxcyJ7amVQYXlySUUidkx9TCcnO0xISOWKoOWFpeWPg+eFpw09JGRHcnFzIlBJcXtyTmZhTmUgInZMfUwncXtqe0RxJztISOWIl+ihqOmggeaOkuW6j+aWueW8jw09JGRHcnFzImZhUCJ2TH1MJydISOWBh+WIqumZpOaooeW8j0zkuI3pnIDopoHlgYfliKrpmaToq4vlrozmlbTliKrmjonmraTmrrVMfUzlrqPlkYrngrpMcXtqe0RxTOeCuuatpOiuig09JGRHcnFzJ2hOckRHX2UgJ3ZMfUwnaE5yREdMZSBMUVEnO0xISOS+neaTmuashOS9jee+pOe1hOWQiOS9tQ09DT1ISOWFp+WuuemggeWPg+aVuA09JGRHcnFzIntqZVBhPHdhTmEidkx9TCdJZn0nOSRfdDhwcyJJZiJ2O0xISOWFp+WuuemggeaqouimluaineS7tg09JGRHcnFzIntqZVBhTnI8InZMfUwiaixlLGQiO0xISOaqouimluashOS9jeioreWumg09JGRHcnFzIntqZVBhInZMfUwiTFVqUFA8YWZfVW1JZmFyIjsNPSRkR3JxcyJ7amVQYXlySUUidkx9TCcnOw09JGRHcnFzInVkMF9xYXsidkx9TGpOTmogKCfmrITkvY1LJywn5qyE5L2N5LqMJyk7SEjmiJDngrrnt6jovK/lmajmrITkvY3oqK3lrppM5Y+W5Ye657eo6Lyv5Zmo5YWn5a65TOashOS9jeWQjeeosV91ZDANPSRkR3JxcyJ1ZDBfZXJmIGRQanFxInZMfUxqTk5qICgnZmF7aklQJ31XJ2RyRXthRXsnKTtMTEhI5bCHZmF7aklQTOe3qOi8r+WZqOashOS9jemgkOioreW8j+aoo2RQanFxTOWxrOaAp+ioree9rueCumRyRXthRXsNPSRkR3JxcyJVZkNhRWRyZmEidkx9TGpOTmogKCfmrITkvY1LJywn5qyE5L2NMicpO0hIVWZD5Yqg5a+GTOashOS9jUzlpoLlgrPnqbrlgLxM6Ieq5YuV5Yiq6Zmk5LiN6Ly45YWl5Yiw6LOH5paZ5bqrDT0kZEdycXMickVQIGZhe2pJUCJ2TH1MJ0snO0xMSEjlj6rpoa/npLrlhaflrrnpoIENPQ09SEjmkJzlsIvooajllq7lj4PmlbgNPUxM5qyE5L2N6Kit572uTOashOS9jeWQjX1XaGF75YC8DT1MTOmgkOiorXFfKOashOS9jeWQjSnoh6rli5XlsI3mh4nmkJzlsItz5ZCr5Yik5pa35qyE5L2N5b2i5oWLdg09JGRHcnFzInFhak5kdyJ2TH1Mak5OaiAoJ0VqVWEnfVcnMGEgPHJOZicsJ2Zhe2pJUCd9VycwYSA8ck5mJywnZE5hanthX2Zqe2EnfVcnZmp7YU5qRWhhJywncXtqe0RxJ31XJ3FfcXtqe0RxJywnZFBqcXEnfVcncWFqTmR3ZFBqcXEnKTsNPSRkR3JxcydxYWpOZHdfUGF1eyd2TEx9TGpOTmogKCdkUGpxcScsJ0VqVWEnKTtISOmHneWwjeashOS9jeWtl+S4sumZo+WIl3JO5q+U5bCNDT0NPUhI5qqU5qGI5LiK5YKzDT0kZEdycXMidUlQYV9ETlAidkx9TCIiO0hI5LiK5YKz55qE55uu6YyE5L2N572uYQpMOkRHUHJqZkgNPSRkR3JxcyJOYV9JVWhfPCJ2TH1MJ0snO0xISOe4ruWcluiZleeQhkzlr6xM5YC8TEzoqK3lrprlhanpoIXmiY3mnIPln7fooYznuK7lnJbomZXnkIYNPSRkR3JxcyJOYV9JVWhfdyJ2TH1MJ0snO0xISOe4ruWcluiZleeQhkzpq5hM5YC8DT0kZEdycXMidUlQYV9kd2FkMCJ2TH1MIiI7TEhI5qqU5qGI5q+U5bCN5Yqf6IO9TGpOTmogKCJHSWQiLCJ1SVBhIilMck5MInVJUGEsR0lkIjsNPQ09SEjmjpLluo/oqK3lrpoNPSRkR3JxcyJxck57X2RQanFxInZMfUwiZFBqcXEiO0xISC0t5YiX6KGo6aCB5pyJ5aSa5YCL5LiN5ZCM6aGe5YilTOS+neeFp+atpOashOS9jemFjeaOkuW6jw09JGRHcnFzInFyTntfVXJmYSJ2TH1MImpxZCJMSEgtLUxqcWRM5b6A5b6M5aKe5YqgTGZhcWRM54K656ys5LiA5YCLTOmgkOioreeCumpxZA09DT0NPUhILS3ov5Tlm57lj4PmlbgNPSRkR3JxcyJJRXFhTntfZGpQUGVqZDAidkx9TCcnCUhI5paw5aKe5oiQ5Yqf6L+U5ZueDT0kZEdycXMiREdmanthX2RqUFBlamQwInZMfUwnJwlISOS/ruaUueaIkOWKn+i/lOWbng09JGRHcnFzImZhUGF7YV9kalBQZWpkMCJ2TH1MJycJSEjliKrpmaTmiJDlip/ov5Tlm54NPSpIDT1ISOmgkOioreWAvOioreWumg09SXVMKCRfdDhwcyJmanthTmpFaGEidkwmJkxJcV9qTk5qICgkX3Q4cHMiZmp7YU5qRWhhInYpKUwkX3Q4cHMiZmp7YU5qRWhhInZMfUxJVUdQcmZhKCdMLUwnLCRfdDhwcyJmanthTmpFaGEidik7DT1JdUwoIUlxcWF7KCRkR3JxcyJxck57X1VyZmEidilMfHxMJGRHcnFzInFyTntfVXJmYSJ2TH19TCcnKUwkZEdycXMicXJOe19VcmZhInZMfUwnZmFxZCc7DT1JdUwoJGRHcnFzIkdqaGFkckRFeyJ2TH19TEZPMzNMfHxMJGRHcnFzIkdqaGFkckRFeyJ2TH19TCcnKUwkZEdycXMiR2poYWRyREV7InZMfUxLeDsNPUl1TCgkZEdycXMiUElxe3JOZmFOZSAidkwhfUxGTzMzTCYmTCRkR3JxcyJQSXF7ck5mYU5lICJ2TCF9TCcnKUwkZEdycXMiUElxe3JOZmFOZSAidkx9TCdMY2kvOGlMU0pMJzkkZEdycXMiUElxe3JOZmFOZSAidjsNPUl1TCgkZEdycXMicXtqe0RxInZ9fUZPMzNMfHxMJGRHcnFzInF7antEcSJ2fX0nJylMJGRHcnFzInF7antEcSJ2TH1MJF96OHBPLnMicXtqe0RxInY7DT1JdUwoJGRHcnFzInVJUGFfZHdhZDAidkx9fUxGTzMzTClMJGRHcnFzInVJUGFfZHdhZDAidkx9TCJHSWQiOw09SXVMKCFJcV9qTk5qICgkZEdycXMidUlQYV9kd2FkMCJ2KSlMJGRHcnFzInVJUGFfZHdhZDAidkx9TGEKR1ByZmEoJywnLCRkR3JxcyJ1SVBhX2R3YWQwInYpOw09SXVMKCRkR3JxcyJxYWpOZHcidn19Rk8zM0x8fEwkZEdycXMicWFqTmR3InZ9fScnKUwkZEdycXMicWFqTmR3InZMfUxqTk5qICgnRWpVYSd9VycwYSA8ck5mJywnZmF7aklQJ31XJzBhIDxyTmYnLCdkTmFqe2FfZmp7YSd9VydmanthTmpFaGEnLCdxe2p7RHEnfVcncV9xe2p7RHEnLCdkUGpxcSd9VydxYWpOZHdkUGpxcScpO0wNPUhILS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NPQ09SEgtLS3niYjmnKzmr5TlsI3pqZforYkNPSRkR3JxX21hTnFJckVMfUwnSzl4OUsnOw09JGRHcnFfZHdhZDBfbWFOcUlyRUx9TCRkckVFLVd0YXtpcjwoInFhUGFke0xAZGFFe2FOR3JxTGpxTGZqe2oiKTsNPUl1TChVZkMocXdqSyhlanFha1RfYUVkcmZhKCRkR3JxX21hTnFJckUpKSkhfSRkR3JxX2R3YWQwX21hTnFJckVzImZqe2oidilMWA09CWFkd3JMJ+aguOW/g+eJiOacrOmpl+itiemMr+iqpCEhJzkn55uu5YmN5qC45b+D54mI5pys54K6bSc5JGRHcnFfbWFOcUlyRTthCkl7Ow09Yg09DT1ISC0t5pO35Y+W6LOH5paZ6KGo5YWn5a65DT0kZEdycV97amVQYV9OcjxMfUwkZHJFRS1XdGF7Wk5OaiAoImZhcWRMIjkkZEdycXMie2plUGEidik7DT1JdUwoISRkR3JxX3tqZVBhX05yPClMWA09CWRHcnFfZE5hanthX3tqZVBhKCRkR3JxcyJ7amVQYSJ2KTtISC0t5rKS6LOH5paZ6KGo6Ieq5YuV5bu656uLDT0JJGRHcnFfe2plUGFfTnI8TH1MJGRyRUUtV3Rhe1pOTmogKCJmYXFkTCI5JGRHcnFzIntqZVBhInYpOw09Yg09dXJOYWpkd0woJGRHcnFfe2plUGFfTnI8TGpxTCQwfVckbSlYTEhILS3lj5blvpfos4fmlpnooajmrITkvY3os4fmlpnpgLLooYzliKTmlrcNPQkkTnI8X2RyUERVXzBhIHN2TH1MJG1zeHY7JE5yPF9kclBEVV97IEdhc3ZMfUwkbXNLdjsNPWINPQ09SEgtLeiHquWLleWOu+mZpOaykuacieashOS9jeeahOizh+aWmembhg09SEjmqpTmoYjmqqLmuKwNPXVyTmFqZHdMKCRkR3JxcyJ1SVBhX2R3YWQwInZManFMJDB9VyRtKVgNPQlJdUwoIUlFX2pOTmogKCRtLCROcjxfZHJQRFVfMGEgKSlMREVxYXsoJGRHcnFzInVJUGFfZHdhZDAidnMkMHYpOw09Yg09DT1ISOaqlOahiOaqoua4rA09dXJOYWpkd0woJGRHcnFzInFhak5kdyJ2TGpxTCQwfVckbSlYDT0JSXVMKCFJRV9qTk5qICgkMCwkTnI8X2RyUERVXzBhICkpTERFcWF7KCRkR3JxcyJxYWpOZHcidnMkMHYpOw09Yg09DT1ISC0tLS0tLS0tLeW+qeWOn+S/ruaUuQ09SXVMKCRfdDhwcyJOYV9mantqX3thVUcidiF9Rk8zMyYmJF90OHBzIk5hX2Zqe2pfe2FVRyJ2IX0nJyYmJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImZqe2pfe2FVRyJ2IX0nJyYmJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImZqe2pfe2FVRyJ2IX1GTzMzKVgNPQlxPEl7ZHdMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2KVgNPQkJZGpxYUwiLzgzOHA4X3VqUHFhIjoNPQkJZGpxYUwiTy4vWnA4IjoNPQkJCXVyTmFqZHdMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidkxqcUwkMH1XJG0pWA09CQkJCQ09CQkJCUhILeWIqumZpOeVsOWLleW+jOmBjuaZguizh+aWmQ09CQkJCSR7YVVHX2Zqe2pMfUwkZHJFRS1XdGF7aXI8KCJxYVBhZHtMIjlJVUdQcmZhKCcsJywkZEdycXMidUlQYV9kd2FkMCJ2KTkiTHVOclVMIjkkZEdycXMie2plUGEidjkiTDx3YU5hTElmfSciOSRtcyJJZiJ2OSInIkwpOw09CQkJCXVyTmFqZHdMKCRkR3JxcyJ1SVBhX2R3YWQwInZManFMJGp9VyRlKVgNPQkJCQkJdUlQYV9mR0lhKGEKR1ByZmEoJ3xfX3wnLCR7YVVHX2Zqe2pzJGV2KSxhCkdQcmZhKCd8X198JywkbXMkZXYpKTsNPQkJCQliSEhILS1hRWZMdXJOYWpkd0x1SVBhX2R3YWQwDT0JCQkJJGptalBEYUx9TCRkckVFLVdaRHtyOAphZER7YSgkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMie2plUGFfe2FVRyJ2LCRtLCJPLi9acDgiLCJJZn0iOSRtcyJJZiJ2KTsNPQkJCWINPQkJZU5hajA7DT0JCWRqcWFMIjdGejhpcCI6DT0JCQlJdUwoJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImZqe2pfe2FVRyJ2IX0nJ0wmJkwkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMiZmp7al97YVVHInYhfUZPMzMpTFgNPQkJCQkNPQkJCQlISC3liKrpmaTnlbDli5XlvozpgY7mmYLos4fmlpkNPQkJCQkke2FVR19mantqTH1MJGRyRUUtV3Rhe2lyPCgicWFQYWR7TCI5SVVHUHJmYSgnLCcsJGRHcnFzInVJUGFfZHdhZDAidik5Ikx1TnJVTCI5JGRHcnFzIntqZVBhInY5Ikw8d2FOYUxJZn0nIjkkbXMiSWYidjkiJyJMKTsNPQkJCQl1ck5hamR3TCgkZEdycXMidUlQYV9kd2FkMCJ2TGpxTCRqfVckZSlYDT0JCQkJCXVJUGFfZkdJYShhCkdQcmZhKCd8X198Jywke2FVR19mantqcyRldiksak5OaiAoKSk7DT0JCQkJYkhISC0tYUVmTHVyTmFqZHdMdUlQYV9kd2FkMA09CQkJCQ09CQkJCSRqbWpQRGFMfUwkZHJFRS1XOAphZER7YSgiLzgzOHA4TE1pYzZMIjkkZEdycXMie2plUGEidjkiTDFZOGk4TElmTElFTCgiOSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidjkiKSIpOw09CQkJYg09CQllTmFqMDsNPQkJZGpxYUwiLzgzOHA4IjoNPQkJCXVyTmFqZHdMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidkxqcUwkMH1XJG0pWA09CQkJCSRqbWpQRGFMfUwkZHJFRS1XWkR7cjgKYWREe2EoJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzIntqZVBhX3thVUcidiwkbSwiN0Z6OGlwIik7DT0JCQliDT0JCWVOYWowOw09CWINPQlERXFheygkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMiZmp7al97YVVHInYpOw09CURFcWF7KCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJ7amVQYV97YVVHInYpOw09CURFcWF7KCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2KTsNPQlqUGFOeygn5YmN5LiA562G5pu05paw6LOH5paZ5bey6KKr6YKE5Y6fISEnLC1LKTsNPQlhCkl7Ow09Yg09DT0NPQ09DT0NPUhILS0tLS0tVWZD6KGo5Zau6Ieq5YuV5Yiq5ribDT1JdUwoJF8uY3pwKVgNPQl1ck5hamR3TCgkXy5jenBManFMJDBMfVckbSlYDT0JCUl1TCgkZEdycXMiVWZDYUVkcmZhInZMIX1MRk8zM0wmJkxJRV9qTk5qICgkMCwkZEdycXMiVWZDYUVkcmZhInYpKVgNPQkJCUl1TCgkbUx9fUxGTzMzTHx8TCRtTH19TCcnKVgNPQkJCQlERXFheygkXy5jenBzJDB2KTsNPQkJCWJhUHFhWA09CQkJCWFkd3JMJG05J0wnOSQwO2EKSXs7DT0JCQkJJF8uY3pwcyQwdkx9TFVmQygkXy5jenBzJDB2KTsNPQkJCWINPQkJYg09CWINPWINPQ09DT0NPQ09SEgtLS0tLS0tLeWIpOaWt+aYr+WQpueCuuiugOWPluWWruethuizh+aWmUxxe2FHTEsNPUl1KCRfdDhwcyJJZiJ2IX1GTzMzTCYmTCRfdDhwcyJJZiJ2IX0iIikNPVgNPQkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMibUlhPCJ2TH1MImZhe2pJUCI7DT1iDT1hUHFhSEjliJfooajpoIENPVgNPQlJdUwoJGRHcnFzInJFUCBmYXtqSVAidkwhfUwnJ0wmJkwkZEdycXMickVQIGZhe2pJUCJ2TCF9TEZPMzMpTFhMSEgtLeW8t+WItumhr+ekuuWFp+WuuemggQ09CQkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMibUlhPCJ2TH1MImZhe2pJUCI7DT0JYmFQcWFYDT0JCSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJtSWE8InZMfUwiUElxeyI7DT0JYg09Yg09DT0NPQ09SEgtLS0tLS0t5Yik5pa35piv5ZCm5pyJ5pCc5bCL5qKd5Lu2THF7YUdMMg09SCoNPQlkTmFqe2FMZSBMQXJFYXENPQnmraTmkJzlsIvms5Xph53lsI3ku6XkuIvpmaPliJflj4PmlbjlpJZMTCfmrITkvY3lgLwnfVcnaGF75YC8Jw09CeWPpuWkluWIpOaWt+mHneWwjXFfKOashOS9jeWQjeeosSlM55qEaGF75Y+D5pW4DT0qSA09SXVMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJtSWE8InZ9fSJQSXF7IilYDT0JSXVMKCRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2fX1GTzMzfHwkZEdycXMie2plUGFQSXF7PHdhTmEidn19JycpCSRxYWpOZHdMfUxGTzMzO0xhUHFhTCRxYWpOZHdMfUwnTCc7DT0JdXJOYWpkd0woJGRyRUUtV3Rhe1pOTmogKCJmYXFkTCI5JGRHcnFzIntqZVBhInYpTGpxTCQwfVckbSlMWCROcjxfZHJQRFVfMGEgc3ZMfUwkbXN4djskTnI8X2RyUERVX3sgR2Fzdkx9TCRtc0t2O2JISC0t5pO35Y+W6LOH5paZ6KGo5omA5pyJ5qyE5L2NDT0JDT0JSEgtLeashOS9jeioree9rg09CSRxYWpOZHdfak5OaiBMfUwkZEdycXMicWFqTmR3InY7DT0JDT0JdXJOYWpkd0woJF90OHBManFMJDB9VyRtKVhMSEgtLeWPluW+l+WPg+aVuOizh+aWmQ09CQlJdUwocXtOR3JxKCQwLCdfJylMJiZMJG0hfScnTCYmTCRtIX1GTzMzKVgNPQkJCSQwTH1MYQpHUHJmYSgnXycsJDAsMik7DT0JCQlJdUwocXtOe3JQcjxhTigkMHN4dil9fSdxJylYDT0JCQkJREVxYXsoJDBzeHYpOw09CQkJCSQwTH1MSVVHUHJmYSgnXycsJDApOw09CQkJCXVyTmFqZHdMKCROcjxfZHJQRFVfMGEgTGpxTCRFS0x9VyRFMilMWA09CQkJCQlJdUwoJEUyfX0kMClYSEgtLS3liKTmlrfmnInlkKblnKjoqbLos4fmlpnooajkuK3mnInmraTmrITkvY0NPQkJCQkJCUl1TCgkcWFqTmR3fX1GTzMzfHwkcWFqTmR3fX0nJylMJHFhak5kd0x9TCJMPHdhTmFMIjtMYVBxYUwkcWFqTmR3TDl9TCJMakVmTCI7DT0JCQkJCQlJdUwocXtOR3JxKHF7TntyUHI8YU4oJE5yPF9kclBEVV97IEdhcyRFS3YpLCd7YQp7JykhfX11alBxYUx8fExxe05HcnEocXtOe3JQcjxhTigkTnI8X2RyUERVX3sgR2FzJEVLdiksJ21qTmR3ak4nKSF9fXVqUHFhKUxYDT0JCQkJCQkJJHFhak5kd0w5fUwkMDkiTFBJMGFMJyUiOSRtOSIlJyI7DT0JCQkJCQliYVBxYUxJdUwocXtOR3JxKCdmanthe0lVYScscXtOe3JQcjxhTigkTnI8X2RyUERVX3sgR2FzJEVLdikpKVgNPQkJCQkJCQkkcWFqTmR3TDl9TCdMWkYvTCc5JDA5J0xXfVwnJzkkbTknTHh4Onh4Onh4XCdMakVmTCc5JDA5J0xsXCcnOSRtOSdMMj46QzU6QzVcJyc7DT0JCQkJCQliYVBxYVgNPQkJCQkJCQkkcWFqTmR3TDl9TCQwOSJ9JyI5JG05IiciOw09CQkJCQkJYg09CQkJCQliDT0JCQkJYg09CQkJYg09CQkJDT0JCQkNPQkJYmFQcWFMSXVMKCRtIX1GTzMzJiYkbSF9JycpWEhILS0tLUl1TChxe05HcnEoJG0sJ3FfJykpTGFQcWENPQkJCSRxYWpOZHdfUElxe31GTzMzOw09CQkJdXJOYWpkd0woJHFhak5kd19qTk5qIExqcUwkRUt9VyRFMilYDT0JCQkJSXVMKCRFMn19JDApWA09CQkJCQlxPEl7ZHcoJDApWA09CQkJCQkJZGpxYUwiMGEgPHJOZiI6DT0JCQkJCQkJJHFhak5kd19QSXF7c3ZMfUwkRUs5IkxQSTBhTCclIjkkbTkiJSciOw09CQkJCQkJZU5hajA7DT0JCQkJCQlkanFhTCJmanthTmpFaGEiOg09CQkJCQkJCSRmanthTmpFaGFMfUxhCkdQcmZhKCctJywkbSk7DT0JCQkJCQkJJGZqe2FOakVoYXN4dkx9THF7Tl9OYUdQamRhKCc5JywnLScsJGZqe2FOakVoYXN4dik7CSRmanthTmpFaGFzS3ZMfUxxe05fTmFHUGpkYSgnOScsJy0nLCRmanthTmpFaGFzS3YpOw09CQkJCQkJCSRxYWpOZHdfUElxe3N2TH1MJEVLOSdMV31cJyc5JGZqe2FOakVoYXN4djknTHh4Onh4Onh4XCdMakVmTCc5JEVLOSdMbFwnJzkkZmp7YU5qRWhhc0t2OSdMMj46QzU6QzVcJyc7DT0JCQkJCQllTmFqMDsNPQkJCQkJCWZhdWpEUHs6DT0JCQkJCQkJJHFhak5kd19QSXF7c3ZMfUwkRUs5In0nIjkkbTkiJyI7DT0JCQkJCQllTmFqMDsNPQkJCQkJYg09CQkJCWINPQkJCWINPQkJCQ09CQkJSXVMKCRxYWpOZHdfUElxeyF9Rk8zMylMWA09CQkJCUl1TCgkcWFqTmR3fX1GTzMzfHwkcWFqTmR3fX0nJylMJHFhak5kd0x9TCJMPHdhTmFMIjtMYVBxYUwkcWFqTmR3TDl9TCJMakVmTCI7DT0JCQkJJHFhak5kd19FYWpOTH1MJyc7DT0JCQkJdXJOYWpkd0woJHFhak5kd19QSXF7TGpxTCRVS31XJFUyKVgNPQkJCQkJSXVMKCRVS1d4KUwkcWFqTmR3X0Vhak5MOX1MJ0xyTkwnOw09CQkJCQkkcWFqTmR3X0Vhak5MOX1MJygnOSRVMjknKSc7DT0JCQkJYg09CQkJCSRxYWpOZHdMOX1MJygnOSRxYWpOZHdfRWFqTjknKSc7DT0JCQliDT0JCQkNPQkJYkhISC0tLS1JdUwocXtOR3JxKCRtLCdxXycpKUxhRWYNPQliDT0JJGRHcnFzJ3Fhak5kd19yRHtHRHsndkx9TCRxYWpOZHc7DT1iDT0NPQ09DT0NPUgqKkzos4fmlpnluqvnqbrplpPmqqLmuKwqSA09SXVMKCRfLmN6cEwmJkwkSUVJXzxhZXFhe3MiPGFlX3FheyJ2cyJER1ByamZfZHdhZDBfcXtqe0RxInZ9fSdLJylYDT0JJGZlX3tye2pQX2ZJcTBMfUx4Ow09CSRmZV9mSXEwTH1MJGRyRUUtV3Rhe1pOTmogKCJ6WWMxTHBaUzM4THpwWnBPeiIpOw09CUl1TCgkZmVfZklxMCkNPQkJdXJOYWpkd0woJGZlX2ZJcTBManFMJDB9VyRtKVgNPQkJCSRmZV97cntqUF9mSXEwTCt9TCRtcyIvantqX1BhRWh7dyJ2KksrJG1zIjdFZmEKX1BhRWh7dyJ2Kks7DT0JCWINPQlJdUwoJGZlX3tye2pQX2ZJcTAqS1d9KCRJRUlfPGFlcWF7cyI8YWVfcWF7InZzImZlX1VqCl9xSTRhInYpKVgNPQkJJGZlX3VEUFBfZHdhZDBMfUx7TkRhOw09CWINPWINPQ09DT0NPQ09DT1ISEgtLS0tLS0tLS0tLS0t5o6S5bqPDT1JdUwoJF8uY3pwcyJqZHsidkx9fSJqUFAiTCYmTCEkZmVfdURQUF9kd2FkMClMWA09CUhILS1M5om+5bCL5piv5ZCm5pyJXw09CXVyTmFqZHdMKCRfLmN6cExqcUwkMEx9V0wkbSkNPQlYDT0JCUl1TChxe05HcnEoJDAsIl8iKSlYDT0JCQkkMEx9TGEKR1ByZmEoIl8iLCQwKTsNPQkJCSR5MElFTH1MJDA7DT0JCQlJdUwoJGRHcnFzInFyTntfZFBqcXEidn19Rk8zM3x8JGRHcnFzInFyTntfZFBqcXEidn19JycpWExISC0t5Yik5pa35piv5ZCm5pyJ5o6S5bqP5Y+D5pW4DT0JCQkJSXVMKCRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2TH19TCcnTHx8TCRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2TH19TEZPMzMpTFgNPQkJCQkJJDx3YU5hTH1MJ0wxWThpOExJZn0iJzkkeTBJRXNkckRFeygkeTBJRSktS3Y5JyInOw09CQkJCWJhUHFhWA09CQkJCQkkPHdhTmFMfUwnTCc5JGRHcnFzIntqZVBhUElxezx3YU5hInY5J0xaRi9MSWZ9Iic5JHkwSUVzZHJERXsoJHkwSUUpLUt2OSciJzsNPQkJCQliDT0JCQliYVBxYVgNPQkJCQkkPHdhTmFMfUwnTDx3YU5hTElmfSInOSR5MElFc2RyREV7KCR5MElFKS1LdjknIic7DT0JCQliDT0JCQkNPQkJCUhILS3ngrrmjpLluo/nmoToqbENPQkJCURFcWF7KCR5MElFc2RyREV7KCR5MElFKS1Ldik7TCR5MElFTH1MSVVHUHJmYSgnXycsJHkwSUUpOw09CQkJSXVMKHF7TntyUHI8YU4oJDBzeHYpfX0ncXJOeycpWA09CQkJCSR7YVVHX21qUERhTH1MKCgkbSpLKS14OUspO0xISOS9v+eUqOWAjeeyvueiuuWei+WIpUwteDlLTOS+huWPluW+l+eCuuWJjeWAvOmghQ09CQkJCSRqbWpQRGFMfUwkZHJFRS1XOAphZER7YSgiTy4vWnA4TCI5JGRHcnFzIntqZVBhInY5Ikx6OHBMIjkkeTBJRTkiTH1MIjkke2FVR19talBEYTkkPHdhTmEpOw09CQkJYmFQcWFYDT0JCQkJJGptalBEYUx9TCRkckVFLVc4CmFkRHthKCJPLi9acDhMIjkkZEdycXMie2plUGEidjkiTHo4cEwiOSR5MElFOSJMfUwnIjkkbTkiJ0wiOSQ8d2FOYSk7DT0JCQliDT0JCWINPQliDT0JZEdycV9OYXFyTnsoKTtMSEgt6YeN572u5o6S5bqP5Y+D5pW4DT1iDT0NPQ09DT0NPQ09DT0NPUhILS0t5L+u5pS544CB5paw5aKe6LOH5paZTOihqOWWruizh+aWmUzlsI7lhaXpmaPliJflrZjlhaUNPUl1TCgkZFBycWFzImFmSXsidkwhfUwnSydMfHxMJGRQcnFhcyJqZmYidkwhfUwnSycpWA09SXVMKCRfLmN6cEwmJkwkXy5jenBzImpkeyJ2TCF9ImpQUCJMJiZMISRmZV91RFBQX2R3YWQwKUxYDT0JDT0JSEgtLS0tLS3liKTmlrfmmK/lkKbmnInpgJnlgIvos4fmlpnlpL5M5rKS5pyJ5bCx5Ym15bu65LiA5YCLDT0JSXVMKCRkR3JxcyJ1SVBhX0ROUCJ2TCYmTCFJcV9mSU4oJGRHcnFzInVJUGFfRE5QInYpKVgNPQkJVTBmSU4oJGRHcnFzInVJUGFfRE5QInYseF1dXSx7TkRhKTsNPQliDT0JSEgtLS0tLS0tLS3mqpTmoYjkuIrlgrNM55u05o6l5LiA6LW35a+r5YWlR3Jxew09CSRJVWpoYV9qTk5qIEx9TGpOTmogKCdlVUcnLCd5R2gnLCd5R2FoJywnR0VoJywnaEl1Jyk7DT0JJHthVUdfcUk0YUx9THg7DT0JdXJOYWpkd0woJF9NNzM4ekxqcUwkMH1XJG0pWA09CQlJdUwoSXFfak5OaiAoJF9NNzM4enMkMHZzIkVqVWEidikpWExISC0tLeWIpOaWt+eCuumZo+WIl+WQjeeoseebuOWQjOeJqeS7tuS4iuWCsw09CQkJdXJOYWpkd0woJF9NNzM4enMkMHZzIkVqVWEidkxqcUwkRUt9VyRFMilYDT0JCQkJSXVMKCRFMiF9Jyd8fCRFMiF9Rk8zMylYDT0JCQkJJHthVUdfdUlQYV9FalVhTH1MYQpHUHJmYSgnOScsJEUyKTsNPQkJCQkkanV7YU5fRWpVYUx9TCR7YVVHX3VJUGFfRWpVYXNkckRFeygke2FVR191SVBhX0VqVWEpLUt2O0hI5Ymv5qqU5ZCNDT0JCQkJJHthVUdfdUlQYV9FalVhTH1McXtOe3J7SVVhKGZqe2EoJ0otVS1mTFk6STpxJykpOU5qRWYoS3gsNTUpOSc5JzkkanV7YU5fRWpVYTsNPQkJCQlJdUwoSUVfak5OaiAoJGp1e2FOX0VqVWEsJElVamhhX2pOTmogKSYmJGRHcnFzIk5hX0lVaF88InYhfUZPMzMmJiRkR3JxcyJOYV9JVWhfdyJ2IX1GTzMzKVhISOS4iuWCs+eahOaqlOahiOWclueJh+Wwsee4ruWcluiZleeQhg09CQkJCQk3VWpoYWlhcUk0YSgkX003Mzh6cyQwdnMie1VHX0VqVWEidnMkRUt2LEwkZEdycXMidUlQYV9ETlAidjkke2FVR191SVBhX0VqVWEsJGRHcnFzIk5hX0lVaF88InYsJGRHcnFzIk5hX0lVaF93InYpOw09CQkJCWJhUHFhWA09CQkJCQlVcm1hX0RHUHJqZmFmX3VJUGEoJF9NNzM4enMkMHZzIntVR19FalVhInZzJEVLdiwkZEdycXMidUlQYV9ETlAidjkke2FVR191SVBhX0VqVWEpOw09CQkJCWINPQkJCQkke2FVR191SVBhREdQcmpmc3ZMfUwkZEdycXMidUlQYV9ETlAidjkke2FVR191SVBhX0VqVWE7DT0JCQkJJHthVUdfcUk0YUwrfUwkX003Mzh6cyQwdnMicUk0YSJ2cyRFS3Y7DT0JCQkJJF8uY3pwcyQwdnN2TH1MJHthVUdfdUlQYV9FalVhOw09CQkJCWINPQkJCWIJDT0JCWJhUHFhWA09CQkJSXVMKCRfTTczOHpzJDB2cyJFalVhInYhfScnfHwkX003Mzh6cyQwdnMiRWpVYSJ2IX1GTzMzKVgNPQkJCQkke2FVR191SVBhX0VqVWFMfUxhCkdQcmZhKCc5JywkX003Mzh6cyQwdnMiRWpVYSJ2KTsNPQkJCQkkanV7YU5fRWpVYUx9TCR7YVVHX3VJUGFfRWpVYXNkckRFeygke2FVR191SVBhX0VqVWEpLUt2O0hI5Ymv5qqU5ZCNDT0JCQkJJHthVUdfdUlQYV9FalVhTH1McXtOe3J7SVVhKGZqe2EoJ0otVS1mTFk6STpxJykpOU5qRWYoS3gsNTUpOSc5JzkkanV7YU5fRWpVYTsNPQkJCQlJdUwoSUVfak5OaiAoJGp1e2FOX0VqVWEsJElVamhhX2pOTmogKSYmJGRHcnFzIk5hX0lVaF88InYhfUZPMzMmJiRkR3JxcyJOYV9JVWhfdyJ2IX1GTzMzKUxYSEjkuIrlgrPnmoTmqpTmoYjlnJbniYflsLHnuK7lnJbomZXnkIYNPQkJCQkJN1VqaGFpYXFJNGEoJF9NNzM4enMkMHZzIntVR19FalVhInYsTCRkR3JxcyJ1SVBhX0ROUCJ2OSR7YVVHX3VJUGFfRWpVYSwkZEdycXMiTmFfSVVoXzwidiwkZEdycXMiTmFfSVVoX3cidik7DT0JCQkJYmFQcWFYDT0JCQkJCVVybWFfREdQcmpmYWZfdUlQYSgkX003Mzh6cyQwdnMie1VHX0VqVWEidiwkZEdycXMidUlQYV9ETlAidjkke2FVR191SVBhX0VqVWEpOw09CQkJCWINPQkJCQkke2FVR191SVBhREdQcmpmc3ZMfUwkZEdycXMidUlQYV9ETlAidjkke2FVR191SVBhX0VqVWE7DT0JCQkJJHthVUdfcUk0YUwrfUwkX003Mzh6cyQwdnMicUk0YSJ2Ow09CQkJCSRfLmN6cHMkMHZMfUwke2FVR191SVBhX0VqVWE7DT0JCQliDT0JCWINPQliDT0JDT0JSEgtLS0tLeWIpOaWt+mZo+WIl+izh+aWmee1hOWQiOWtl+S4suagvOW8jw09CXVyTmFqZHdMKCRfLmN6cExqcUwkMH1XJG0pWA09CQlJdUwoSXFfak5OaiAoJF8uY3pwcyQwdikpWA09CQkJJF8uY3pwcyQwdkx9TElVR1ByZmEoInxfX3wiLCRfLmN6cHMkMHYpOw09CQliDT0JYg09CQ09CQ09CUhILS0t5Yik5pa35piv5ZCm5pyJ5qyE5L2N6LOH5paZTOaykuacieeahOipseiHquWLleW7uueri+ashOS9jQ09CXVyTmFqZHdMKCRfLmN6cExqcUwkMH1XJG0pWEhI5q+U5bCNR3Jxe+izh+aWmQ09CQkkTnI8X2ZhdUx9TGpOTmogKCdqZHsnLCdxYWpOZHcnLCdxYWpOZHdQSTBhJywnZmp7YU5qRWhhJywnZmp7YV9OakVoJywnVXJmYScsJ2ZhUF9HSWQnKTtISOS+i+WkluS4jeaWsOWinueahOmNteWAvA09CQlJdShMSUVfak5OaiAoJDAsJE5yPF9mYXUpTClMZHJFe0lFRGE7DT0JCUl1TCghSUVfak5OaiAoJDAsJE5yPF9kclBEVV8wYSApKUxYDT0JCQkkZHJFRS1XOAphZER7YSgiWjNwOGlMcFpTMzhMIjlSRHJ7YXEoJGRHcnFzIntqZVBhInYpOSJMWi8vTCI5UkRye2FxKCQwKTkiTHA4UXBMRk8zM0xbYzY2OEZwTCfnqIvlvI/nlJ/miJDmrITkvY0nIik7DT0JCWINPQliDT0NPQlISC3liKTmlrfmmK/lkKbotoXpgY7pmZDliLbnqbrplpPlpKflsI8NPQlJdUwoJElFSV88YWVxYXtzIjxhZV9xYXsidnMiREdQcmpmX1VqCl9xSTRhInYqS2wkSUVJXzxhZXFhe3MiPGFlX3FheyJ2cyJFcjxfdUlQYSJ2KksrJHthVUdfcUk0YSpLTCYmTCR7YVVHX3FJNGFXeClYDT0JCUl1TCgke2FVR191SVBhREdQcmpmTCYmTGRyREV7KCR7YVVHX3VJUGFER1ByamYpV3gpDT0JCXVyTmFqZHdMKCR7YVVHX3VJUGFER1ByamZManFMJDB9VyRtKVgNPQkJCUl1TChMdUlQYV9hCklxe3EoJG0pTCkNPQkJCURFUElFMCgkbSk7DT0JCWINPQkJREVxYXsoJHthVUdfdUlQYURHUHJqZik7DT0JCQ09CQlqUGFOeygkSUVJXzxhZXFhe3MiPGFlX3FheyJ2cyJER1ByamZfdURQUF9VcWgidiwtSyk7DT0JCWEKSXs7DT0JYg09DT0NPQlERXFheygkXy5jenBzImpkeyJ2KTtMSEjnp7vpmaTkuI3lv4XopoHnmoTpmaPliJflhYMNPQlJdUwoJF8uY3pwcyJJZiJ2TH19TEZPMzNMfHxMJF8uY3pwcyJJZiJ2TH19TCIiTHx8TCRfLmN6cHMiSWYidn19IngiKVgNPQkJSEgtLS0tLS0tLS0t5paw5aKe5o6S5bqP54K65pyA5b6M5LiA562GTCjlpoLmnpzmnInmjpLluo/liY3lvozlj4PmlbjlhKrlhYgpDT0JCQlJdUwocXtOe3JQcjxhTigkZEdycXMicXJOe19VcmZhInYpfX0iZmFxZCIpWA09CQkJCSRfLmN6cHMicXJOeyJ2TH1MeDsNPQkJCWJhUHFhWA09CQkJCSRxck57TH1MJGRyRUUtV3Rhe2lyPCgicWFQYWR7TCpMdU5yVUwiOSRkR3JxcyJ7amVQYSJ2OSJMIjkkZEdycXMie2plUGFQSXF7PHdhTmEidjkiTGNpLzhpTFNKTHFyTntMZmFxZExQSVVJe0xLIik7DT0JCQkJSXVMKCRxck57cyJxck57InZMIX1MRk8zMykNPQkJCQkJJF8uY3pwcyJxck57InZMfUwkcXJOe3MicXJOeyJ2KksrSzsNPQkJCQlhUHFhDT0JCQkJCSRfLmN6cHMicXJOeyJ2TH1MSzsJDT0JCQliDT0JCUhILS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ09CQlERXFheygkXy5jenBzIklmInYpO0xISOaWsOWinuS4jemcgOimgeioreWumjcvDT0JCSRfLmN6cHMiUGpFaCJ2TH1MJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzIlBqRWgidjsNPQkJJF8uY3pwcyJkTmFqe2FfZmp7YSJ2TH1MJF8uY3pwcyJER2Zqe2FfZmp7YSJ2TH1MZmp7YSgiSi1VLWZMWTpJOnEiKTsNPQkJJF8uY3pwcyJkTmFqe2FfRWpVYSJ2TH1MJF8uY3pwcyJER2Zqe2FfRWpVYSJ2TH1MJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImpkZHJERXsidjsNPQkJJHthVUdfSWZMfUxaRHtyX0lmKCRkckVFLCRkR3JxcyJ7amVQYSJ2KTsNPQkJJERHZkx9TCRfLmN6cDsNPQkJDT0JCSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidkx9TCR7YVVHX0lmOw09CQkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMie2plUGFfe2FVRyJ2TH1MJGRHcnFzIntqZVBhInY7DT0JCSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2TH1MIjdGejhpcCI7DT0JCQ09CQlISC0t5qqU5qGI5q+U5bCN5Yiq6ZmkDT0JCUl1TChkckRFeygkZEdycXMidUlQYV9kd2FkMCJ2KVd4KVgNPQkJCXVyTmFqZHdMKCRkR3JxcyJ1SVBhX2R3YWQwInZManFMJDB9VyRtKVgNPQkJCQlISC0tTOWwi+aJvuaYr+WQpuWtmOWcqHFhcXFJckVMe2FVR0zkuK1M5a2Y5Zyo5YmH56e76ZmkDT0JCQkJSXVMKGRyREV7KGEKR1ByZmEoJ3xfX3wnLCRER2ZzJG12KSlXeEwmJkwkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInZMJiZMZHJERXsoJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2KVd4KVgNPQkJCQkJdXJOYWpkd0woYQpHUHJmYSgnfF9ffCcsJERHZnMkbXYpTGpxTCRqfVckZSlYDT0JCQkJCQlJdUwoTCEoak5OaiBfcWFqTmR3KCRlLCRfejh6ejdjRnMiREdQcmpmX3thVUcidil9fX11alBxYSlMKVgNPQkJCQkJCQlERXFheyhMJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2c2pOTmogX3Fhak5kdygkZSwkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInYpdkwpO0xISC3ph43pmaPliJfkuK3np7vpmaQNPQkJCQkJCWINPQkJCQkJYg09CQkJCWINPQkJCWJISEgtLWFFZkx1ck5hamR3THVJUGFfZHdhZDANPQkJYg09CQkNPQkJcSBxe2FVX3thVUcoJGRyRUUpOw09CQkNPQkJJGptalBEYUx9TCRkckVFLVdaRHtyOAphZER7YSgkZEdycXMie2plUGEidiwkREdmLCI3Rno4aXAiKTsNPQkJSXVMKCRqbWpQRGEpWA09CQkJZEdycV9OYXFyTnsoKTsNPQkJCUl1TCgkZEdycXMiSUVxYU57X2RqUFBlamQwInYhfUZPMzMpWA09CQkJCWpQYU57KCfmlrDlop7miJDlip8nLCRkR3JxcyJJRXFhTntfZGpQUGVqZDAidik7DT0JCQliYVBxYVgNPQkJCQlISGpQYU57KCfmlrDlop7miJDlip8nLEVyPF9ETlAoJ0lmOic5JHthVUdfSWYse05EYSkpOw09CQkJCWpQYU57KCfmlrDlop7miJDlip8nLEVyPF9ETlAoJ0lmJykpOw09CQkJYg09CQliDT0JYmFQcWFYDT0JCUl1TChxe057clByPGFOKCRfLmN6cHMiSWYidil9fSdQakVoJylMJDx3YU5hTH1MJGRHcnFzIntqZVBhPHdhTmEidjtMYVBxYUwkPHdhTmFMfUwnSWZ9JzkkXy5jenBzIklmInY7TEhILS0t5Yik5pa35piv5ZCm54K65Zau5YC86LOH5paZDT0JCURFcWF7KCRfLmN6cHMiSWYidik7TEhI5paw5aKe5LiN6ZyA6KaB6Kit5a6aNy8NPQkJJHthVUdfSWZMfUwkXy5jenBzIklmInY7DT0JCSRfLmN6cHMiREdmanthX2Zqe2Eidkx9TGZqe2EoIkotVS1mTFk6STpxIik7DT0JCSRfLmN6cHMiREdmanthX0VqVWEidkx9TCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZGRyREV7InY7DT0JCSRER2ZMfUwkXy5jenA7DT0JCQ09CQkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMiZmp7al97YVVHInZMfUwkZHJFRS1XdGF7Wk5OaiAoInFhUGFke0wqTHVOclVMIjkkZEdycXMie2plUGEidjkiTDx3YU5hTCI5JDx3YU5hKTtMSEjoqJjpjITmm7TmlrDliY3nmoTos4fmlpkNPQkJJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzIntqZVBhX3thVUcidkx9TCRkR3JxcyJ7amVQYSJ2Ow09CQkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMiamR7X3thVUcidkx9TCJPLi9acDgiOw09CQkNPQkJSEgtLeaqlOahiOavlOWwjeWIqumZpA09CQlJdUwoZHJERXsoJGRHcnFzInVJUGFfZHdhZDAidilXeClYDT0JCQkke2FVR19mantqTH1MJGRyRUUtV3Rhe2lyPCgicWFQYWR7TCI5SVVHUHJmYSgnLCcsJGRHcnFzInVJUGFfZHdhZDAidik5Ikx1TnJVTCI5JGRHcnFzIntqZVBhInY5J0w8d2FOYUwnOXF7Tl9OYUdQamRhKCc8d2FOYScsJycscXtOe3JQcjxhTigkPHdhTmEpKUwpOw09CQkJdXJOYWpkd0woJGRHcnFzInVJUGFfZHdhZDAidkxqcUwkMH1XJG0pWA09CQkJCXVJUGFfZkdJYShhCkdQcmZhKCd8X198Jywke2FVR19mantqcyRtdiksYQpHUHJmYSgnfF9ffCcsJERHZnMkbXYpKTsNPQkJCQkNPQkJCQlISC0tTOWwi+aJvuaYr+WQpuWtmOWcqHFhcXFJckVMe2FVR0zkuK1M5a2Y5Zyo5YmH56e76ZmkDT0JCQkJSXVMKGRyREV7KGEKR1ByZmEoJ3xfX3wnLCRER2ZzJG12KSlXeEwmJkwkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInZMJiZMZHJERXsoJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2KVd4KVgNPQkJCQkJdXJOYWpkd0woYQpHUHJmYSgnfF9ffCcsJERHZnMkbXYpTGpxTCRqfVckZSlYDT0JCQkJCQlJdUwoTCEoak5OaiBfcWFqTmR3KCRlLCRfejh6ejdjRnMiREdQcmpmX3thVUcidil9fX11alBxYSlMKVgNPQkJCQkJCQlERXFheyhMJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2c2pOTmogX3Fhak5kdygkZSwkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInYpdkwpO0xISC3ph43pmaPliJfkuK3np7vpmaQNPQkJCQkJCWINPQkJCQkJYg09CQkJCWINPQkJCWJISEgtLWFFZkx1ck5hamR3THVJUGFfZHdhZDANPQkJYg09CQkNPQkJDT0JCXEgcXthVV97YVVHKCRkckVFKTsNPQ09CQkkam1qUERhTH1MJGRyRUUtV1pEe3I4CmFkRHthKCRkR3JxcyJ7amVQYSJ2LCRER2YsIk8uL1pwOCIsJDx3YU5hKTsNPQkJSXVMKCRqbWpQRGEpTFgNPQkJSXVMKCRkR3JxcyJER2Zqe2FfZGpQUGVqZDAidiF9Rk8zMylYDT0JCQlqUGFOeygn5L+u5pS55oiQ5YqfJywkZEdycXMiSUVxYU57X2RqUFBlamQwInYpOw09CQliYVBxYVgNPQkJCUhIalBhTnsoJ+S/ruaUueaIkOWKnycsRXI8X0ROUCgnSWY6Jzkke2FVR19JZix7TkRhKSk7DT0JCQlJdShxe057clByPGFOKCRfdDhwcyJJZiJ2KSF9IlBqRWgiKUxqUGFOeygn5L+u5pS55oiQ5YqfJyxFcjxfRE5QKCdJZicpKTtMYVBxYUxqUGFOeygn5L+u5pS55oiQ5YqfJywtSyk7DT0JCWINPQkJYmFQcWFYDT0JCQlHTklFe19OKCRER2YpOw09CQkJYWR3ckwnREdmanthTGFOTnInO2EKSXs7DT0JCWINPQliDT0JSCphZHdyTCdscWROSUd7VzxJRWZyPDlQcmRqe0lyRTl3TmF1fSInOSRfejhpbzhpcycuWS5fejgzTSd2OScibEhxZE5JR3tXVyc7KkgNPWINPWINPQ09SEgtLS0tLS3liKrpmaQtLS0tLS0tDT1JdUwoJF90OHBzImZhUF9JZiJ2TCF9TEZPMzNMJiZMJF90OHBzImZhUF9JZiJ2IX1MJycpWA09CUl1KCRkUHJxYXMiZmFQInZ9fUspDT0JWA09CQlqUGFOeygi5LiN6ZaL5pS+5Yiq6Zmk5Yqf6IO9IiwuamhhX2hhe19ETlAoJ2ZhUF9JZicpKTsNPQkJYQpJezsNPQliDT0NPQlISOW+jOWPsOeVsOWLleiomOaGtg09CSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidkx9TCRkckVFLVd0YXtaTk5qICgicWFQYWR7TCpMdU5yVUwiOSRkR3JxcyJ7amVQYSJ2OSJMPHdhTmFMSWZMSUVMKCI5JF90OHBzImZhUF9JZiJ2OSIpIik7TEhI6KiY6YyE5pu05paw5YmN55qE6LOH5paZDT0JJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzIntqZVBhX3thVUcidkx9TCRkR3JxcyJ7amVQYSJ2Ow09DT0JSXVMKCRkR3JxcyJmYVAidiF9Rk8zMylYDT0JCSRqbWpQRGFMfUwkZHJFRS1XOAphZER7YSgiTy4vWnA4TCI5JGRHcnFzIntqZVBhInY5Ikx6OHBMcXtqe0RxfSI5JGRHcnFzImZhUCJ2OSJMMVk4aThMSWZMSUVMKCI5JF90OHBzImZhUF9JZiJ2OSIpIik7TEhI5YGH5Yiq6ZmkDT0JCSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2TH1MIi84MzhwOF91alBxYSI7DT0JYmFQcWFYDT0JCQ09CQlISC3liKrpmaTnlbDli5XlvozpgY7mmYLos4fmlpkNPQkJJHthVUdfZmp7akx9TCRkckVFLVd0YXtaTk5qICgicWFQYWR7TCI5SVVHUHJmYSgnLCcsJGRHcnFzInVJUGFfZHdhZDAidik5Ikx1TnJVTCI5JGRHcnFzIntqZVBhInY5Ikw8d2FOYUxJZkxJRUwoIjkkX3Q4cHMiZmFQX0lmInY5IikiTCk7DT0JCXVyTmFqZHdMKCRkR3JxcyJ1SVBhX2R3YWQwInZManFMJDB9VyRtKVgNPQkJCUl1TCgke2FVR19mantqKQ09CQkJdXJOYWpkd0woJHthVUdfZmp7akxqcUwkan1XJGUpWA09CQkJCXVJUGFfZkdJYShhCkdQcmZhKCd8X198Jywke2FVR19mantqcyRqdnMkbXYpLGpOTmogKCkpOw09CQkJYg09CQliSEhILS1hRWZMdXJOYWpkd0x1SVBhX2R3YWQwDT0JCQ09CQkkam1qUERhTH1MJGRyRUUtVzgKYWREe2EoIi84MzhwOExNaWM2TCI5JGRHcnFzIntqZVBhInY5IkwxWThpOExJZkxJRUwoIjkkX3Q4cHMiZmFQX0lmInY5IikiKTsNPQkJJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImpke197YVVHInZMfUwiLzgzOHA4IjsNPQliDT0JcSBxe2FVX3thVUcoJGRyRUUpOw09DT0JSXVMKCRqbWpQRGEpTFgNPQkJSXVMKCRkR3JxcyJmYVBhe2FfZGpQUGVqZDAidikNPQkJCWpQYU57KCfliKrpmaTmiJDlip8nLCRkR3JxcyJmYVBhe2FfZGpQUGVqZDAidik7DT0JCWFQcWENPQkJCWpQYU57KCfliKrpmaTmiJDlip8nLEVyPF9ETlAoJ2ZhUF9JZicpKTsNPQliDT1iDT1ISC0tLS0tLS0tLS0tLS0tLS0NPQ09DT1ISC0t5LiK5YKz5qqU5qGI5pqr5a2Y5Yiq6ZmkDT1JdUwoJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2TCYmTCRfejh6ejdjRnMiREdQcmpmX0ROUCJ2KVgNPQlJdUwoJF96OHp6N2NGcyJER1ByamZfe2FVRyJ2TCYmTGRyREV7KCRfejh6ejdjRnMiREdQcmpmX3thVUcidilXeCkNPQl1ck5hamR3TCgkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInZManFMJDB9VyRtKVgNPQkJJG1MfUxhCkdQcmZhKCdIJywkbSk7DT0JCSRtTH1MJG1zZHJERXsoJG0pLUt2Ow09CQlJdUwoTHVJUGFfYQpJcXtxKCRfejh6ejdjRnMiREdQcmpmX0ROUCJ2OSRtKUwpWA09CQkJREVQSUUwKCRfejh6ejdjRnMiREdQcmpmX0ROUCJ2OSRtKTsNPQkJYg09CQlERXFheygkX3o4eno3Y0ZzIkRHUHJqZl97YVVHInYpOw09CWINPWINPSRfejh6ejdjRnMiREdQcmpmX0ROUCJ2TH1MJGRHcnFzInVJUGFfRE5QInY7DT0NPUgqKuizh+aWmeW6q+Wkp+Wwj+WIpOaWt+ioiuaBrypIDT1JdUwoJGZlX3VEUFBfZHdhZDApWA09CWpQYU57KCRJRUlfPGFlcWF7cyI8YWVfcWF7InZzImZlX3VEUFBfVXFoInYsLUspOw09Yg09DT0NPQ09SEgtLS0tLS0tLS0tLemggemdouizh+aWmeaTt+WPlg09SXVMKCRkR3JxcyJ7amVQYU5yPCJ2fX1GTzMzKUwNPQkkZEdycXMie2plUGFOcjwidkx9TCcqJzsNPQ09cTxJe2R3TCgkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMibUlhPCJ2KVgNPWRqcWFMImZhe2pJUCI6SEjllq7nrYYNPQkkcVJQTH1MInFhUGFke0wiOSRkR3JxcyJ7amVQYU5yPCJ2OSJMdU5yVUwiOSRkR3JxcyJ7amVQYSJ2OSdMJzkkZEdycXMie2plUGF5cklFInY5IkwxWThpOEwiOSRkR3JxcyJ7amVQYTx3YU5hInY7DT0JJGZqe2pzInJFYSJ2TH1MJGRyRUUtV3Rhe2lyPCgkcVJQKTsNPQlISEgtLS0tLS0tLS0tLS0tLeWwh+aMh+WumuashOS9jeaIkOeCuue3qOi8r+WZqA09CXVyTmFqZHdMKCROcjxfZHJQRFVfMGEgTGpxTCQwfVckbSlYDT0JCUl1TCghSXFfRURVYU5JZCgkbSkpTFgNPQkJCSRmantqcyJyRWEidnMkbTkiX3VkMCJ2TH1MWzBhZkl7KCRtLGZhVkRye2FxKCRmantqcyJyRWEidnMkbXYsLUspLCdFck5ValAnLCRkR3JxcyJ1ZDBfZXJmIGRQanFxInZzJG12KTsNPQkJCSRmantqcyJyRWEidnMkbTkiX3VkMF9hanEgInZMfUxbMGFmSXsoJG0sZmFWRHJ7YXEoJGZqe2pzInJFYSJ2cyRtdiwtSyksJ2FqcSAnLCRkR3JxcyJ1ZDBfZXJmIGRQanFxInZzJG12KTsNPQkJCSRmantqcyJyRWEidnMkbTkiX2Zqe2FHSWQwYU4idkx9TGZqe2FHSWQwYU4oJG0sJGZqe2pzInJFYSJ2cyRtdik7DT0JCWINPQliDT0JSEgtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NPQkkZmp7anMickVhInZzInF7antEcV93e1VQInZMfUw2ajBhX05qZklyKCRkR3JxcyJxe2p7RHEidiwkZmp7anMickVhInZzInF7antEcSJ2LCdxe2p7RHEnKTtISC0t54uA5oWL6KO95L2c5qiZ57GkDT1lTmFqMDsNPQ09ZGpxYUwiUElxeyI7SEjmuIXllq4NPQlISC0t6Ieq5YuV6KaP5YqD5pCc5bCL5ZCN5a6a576pDT0JSCoNPQkkcVJQTH1MInFhUGFke0wiOSRkR3JxcyJ7amVQYU5yPCJ2OSJMdU5yVUwiOSRkR3JxcyJ7amVQYSJ2OSdMJzkkZEdycXMie2plUGF5cklFInY5J0wnOSRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2OSRkR3JxcyJQSXF7ck5mYU5lICJ2Ow09CSRkR3JxX3thVUdMfUwkZHJFRS1XdGF7Wk5OaiAoJHFSUCk7DT0JSXVMKCRkR3JxX3thVUcpWA09CQl1ck5hamR3TCgkZEdycV97YVVHTGpxTCQwfVckbSlYDT0JCQkkZEdycV97YVVHMnN2TH1MJG1zIkVqVWEidjsNPQkJYg09CQkkZmp7anMiakR7cmRyVUdQYXthInZMfUxJVUdQcmZhKCIsIiwkZEdycV97YVVHMik7DT0JYg09CSpIDT0JDT0JJHFSUEx9TCJxYVBhZHtMIjkkZEdycXMie2plUGFOcjwidjkiTHVOclVMIjkkZEdycXMie2plUGEidjknTCc5JGRHcnFzIntqZVBheXJJRSJ2OSdMJzkkZEdycXMie2plUGFQSXF7PHdhTmEidjkkcWFqTmR3OSRkR3JxcydoTnJER19lICd2OSRkR3JxcyJQSXF7ck5mYU5lICJ2OSJMUElVSXtMIjkoKCRfdDhwcyJHamhhInYtSykqJGRHcnFzIkdqaGFkckRFeyJ2KTkiLCI5JGRHcnFzIkdqaGFkckRFeyJ2Ow09CSRmantqcyJQSXF7InZMfUwkZHJFRS1XdGF7Wk5OaiAoJHFSUCk7DT0JSXVMKCRmantqcyJQSXF7InYpDT0JdXJOYWpkd0woJGZqe2pzIlBJcXsidkxqcUwkMH1XJG0pWA09CQkkZmp7anMiUElxeyJ2cyQwdnMicXtqe0RxX3d7VVAidkx9TDZqMGFfTmpmSXIoJGRHcnFzInF7antEcSJ2LCRtcyJxe2p7RHEidiwncXtqe0RxXyc5JG1zIklmInYpOw09CWINPWVOYWowOw09Yg09JGRhRXthTkdycXFSUEx9TCRxUlA7SEgtLeWwjuWHuuizh+aWmeW6q+iqnuazlUzlgbXpjK/nlKgNPQ09DT0NPUhILS0t6aCB56K86LOH6KiKLS0tLS0tLS0tLS0tLQ09JEdqaGFJRXVycyJxe2pOe19manthInZMfUwoJF90OHBzIkdqaGEidi1LKSokZEdycXMiR2poYWRyREV7InYrSztMSEjlvp7nrKzlub7nrYYNPSRHamhhSUV1cnMiYUVmX2Zqe2Eidkx9TCgoJF90OHBzIkdqaGEidi1LKSokZEdycXMiR2poYWRyREV7InYpKyRkR3JxcyJHamhhZHJERXsidjtISOWIsOesrOW5vuethg09JEdqaGFJRXVycyJFcjxfR2poYSJ2TH1MJF90OHBzIkdqaGEidjsNPQ09CSRxUlBMfUwicWFQYWR7TGRyREV7KCopTGpxTGRkTHVOclVMIjkkZEdycXMie2plUGEidjknTCc5JGRHcnFzIntqZVBheXJJRSJ2OSdMJzkkZEdycXMie2plUGFQSXF7PHdhTmEidjkkcWFqTmR3Ow09CUl1TChxe05HcnEocXtOe3JQcjxhTigkcVJQKSwnaE5yREcnKSlYTEhI5Yik5pa35piv5ZCm54K6576k57WE6LOH5paZ5YGa54K65YiX6KGoDT0JCSRqUFBkckRFe0x9TCRkckVFLVd0YXtaTk5qICgkcVJQKTsNPQkJJEdqaGFJRXVycyJHamhhX2Zqe2FfZHJERXsidkx9TGRyREV7KCRqUFBkckRFeyk7TEhI5YWx5bm+562GDT0JYmFQcWFYDT0JCSRqUFBkckRFe0x9TCRkckVFLVd0YXtpcjwoJHFSUCk7DT0JCSRHamhhSUV1cnMiR2poYV9manthX2RyREV7InZMfUwkalBQZHJERXtzImRkInY7TEhI5YWx5bm+562GDT0JYg09DT1JdUwoJEdqaGFJRXVycyJhRWZfZmp7YSJ2TFd9TCRHamhhSUV1cnMiR2poYV9manthX2RyREV7InYpTCRHamhhSUV1cnMiYUVmX2Zqe2Eidkx9TCRHamhhSUV1cnMiR2poYV9manthX2RyREV7InY7SEjlpoLmnpzpoa/npLrnrYbmlbjlpKfmlrznuL3nrYbmlbhM562J5pa857i9562G5pW4DT0kR2poYUlFdXJzImpQUF9HamhhInZMfUxkYUlQKCRHamhhSUV1cnMiR2poYV9manthX2RyREV7InZIJGRHcnFzIkdqaGFkckRFeyJ2KTtISOWFseWkmuWwkemggQ09DT0JSEgtLS3omZXnkIZPaTPkuK3lj4PmlbgNPQkkR2poYV9ETlBxfWEKR1ByZmEoJ0gnLCRfejhpbzhpcydpOFZPOHpwX09pNyd2KTsNPQkkR2poYV9ETlBxfWEKR1ByZmEoJz8nLCRHamhhX0ROUHFzZHJERXsoJEdqaGFfRE5QcSktS3YpOw09CSRHamhhX0ROUHF9YQpHUHJmYSgnJicsJEdqaGFfRE5QcXNkckRFeygkR2poYV9ETlBxKS1Ldik7DT0JJEdfRE5QTH1MJyc7DT0JdXJOYWpkd0woJEdqaGFfRE5QcUxqcUwkMH1XJG0pWA09CQkkcXtfRE5QTH1hCkdQcmZhKCd9JywkR2poYV9ETlBxcyQwdik7DT0JCUl1TCgkcXtfRE5Qc3h2IX0iR2poYSIpDT0JCUl1TCgkR19ETlB9fScnKUxYJEdfRE5QTH0nPyc5JHF7X0ROUHN4djknfSc5JHF7X0ROUHNLdjtiYVBxYVgkR19ETlBMOX0nJic5JHF7X0ROUHN4djknfSc5JHF7X0ROUHNLdjtiDT0JYg09CUhILS0tLS0tLS0tLS0tLS0NPQ09SXVMKCRfdDhwcyJHamhhInYqS0xXTEspTCRHamhhSUV1cnMiREdfRE5QInZMfUwkR19ETlA5JyZHamhhfSc5KCRfdDhwcyJHamhhInYtSyk7TEhITOS4iuS4gOmggeaMiemIlQ09SXVMKCRHamhhSUV1cnMialBQX0dqaGEidkxXTCRfdDhwcyJHamhhInYpTCRHamhhSUV1cnMiZnI8RV9ETlAidkx9TCRHX0ROUDknJkdqaGF9JzkoJF90OHBzIkdqaGEiditLKTtMSEjkuIvkuIDpoIHmjInpiJUNPQ09JEdqaGFJRXVycyJ5RFVHX0dqaGFfRE5QInZMfUwkR19ETlA7TEhI6aCB56K8QXrkvb/nlKhPaTMNPQ09dXJOTCgkR2poYUlmCn1LOyRHamhhSWYKTGx9TCRHamhhSUV1cnMialBQX0dqaGEidjskR2poYUlmCisrKVgNPQkkR2poYUlFdXJzInlEVUdfR2poYV93e1VQInZMOX1MJ2xyR3tJckVMbWpQRGF9Iic5JEdqaGFJZgo5JyJMJzsNPQlJdUwoJF90OHBzIkdqaGEidn19JEdqaGFJZgopTCRHamhhSUV1cnMieURVR19HamhhX3d7VVAidkw5fUwncWFQYWR7YWYnOw09CSRHamhhSUV1cnMieURVR19HamhhX3d7VVAidkw5fUwnVyc5JEdqaGFJZgo5J2xIckd7SXJFVyc7DT1iDT0NPUhILS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NPSR7R1AtV2pxcUloRSgiR2poYV97amVQYSIsJEdqaGFJRXVyKTtMSEjpoIHnorzlsI7lhaVxVWpOeyANPQ09DT0NPQ09SEgtLS0t6Ieq5YuV6KiY5oa25L+u5pS55oiW5bu656uL6ICF55qE5biz5oi26LOH6KiKDT11REVke0lyRUxxIHF7YVVfe2FVRygkZHJFRSlYDT0JaFByZWpQTCRfejh6ejdjRjsNPQloUHJlalBMJF8uY3pwOw09CWhQcmVqUEwkX3Q4cDsNPQkke2plUGFfalBQTH1MJGRyRUUtV3Rhe1pOTmogKCJxd3I8THtqZVBhcSIpOw09CXVyTmFqZHdMKCR7amVQYV9qUFBManFMJDB9VyRtKUwke2plUGFfUElxe3N2TH1MJG1zeHY7DT0JSXVMKCFJRV9qTk5qICguaThNN1E5J3EgcXthVV97YVVHJywke2plUGFfUElxeykpWExISC0tLS3mspLmnInmraTos4fmlpnooajlsLHlibXlu7rkuIDlgIsNPQkJJGRyRUUtVzgKYWREe2EoIltpOFpwOExwWlMzOExgIjkuaThNN1E5InEgcXthVV97YVVHYEwoTExgSWZgTElFeygyeClMRmNwTEZPMzNMakR7cl9JRWROYVVhRXssTExgamR7YExtak5kd2pOKEt4KUxmYXVqRFB7TEZPMzMsTExgamRkckRFe2BMbWpOZHdqTigyeClMRmNwTEZPMzMsTExgU1pbbl8vWnBaYEwzY0Z0cDhRcEwsTExgLmN6cF8vWnBaYEwzY0Z0cDhRcEwsTExgTTczOF9PaTNgTHthCntMRmNwTEZPMzMsTExgZE5hanthX2Zqe2FgTGZqe2F7SVVhTEZjcExGTzMzLExMLmk3NlppSkxuOEpMTChgSWZgKSlMOEZ0N0Y4fTYgN3paNkxMLzhNWk8zcExbWVppejhwfUR7dUJMWk9wY183RltpODY4RnB9S0w7Iik7DT0JYg09CSRxIHFfZmp7anMiamRkckRFeyJ2TH1MJF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImpkZHJERXsidjsNPQlJdUwoZHJERXsoJF8uY3pwKVd4KVgNPQkJdXJOYWpkd0woJF8uY3pwTGpxTCQwfVckbSlYDT0JCQlJdUwoJHEgcV9mantqcyIuY3pwXy9acFoidiF9JycmJiRxIHFfZmp7anMiLmN6cF8vWnBaInYhfUZPMzMpDT0JCQkJJHEgcV9mantqcyIuY3pwXy9acFoidkw5fUwnfioqKip+JzsNPQkJCQkNPQkJCSRxIHFfZmp7anMiLmN6cF8vWnBaInZMOX1MJDA5J0BNQCc5JG07DT0JCQkNPQkJCUhILeeCuuS/ruaUueaZgg09CQkJSXVMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2fX0iTy4vWnA4IilYDT0JCQkJCUl1TCgkcSBxX2Zqe2pzIlNaW25fL1pwWiJ2IX0nJyYmJHEgcV9mantqcyJTWltuXy9acFoidiF9Rk8zMykNPQkJCQkJCSRxIHFfZmp7anMiU1pbbl8vWnBaInZMOX1MJ34qKioqfic7DT0JCQkJCSRxIHFfZmp7anMiU1pbbl8vWnBaInZMOX1MJDA5J0BNQCc5JF96OHp6N2NGcyJqZlVJRV9JRXVyInZzImZqe2pfe2FVRyJ2c3h2cyQwdjsNPQkJCWINPQkJYg09CWJhUHFhTEl1KCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidilYDT0JCXVyTmFqZHdMKCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJmantqX3thVUcidkxqcUwkMH1XJG0pWA09CQkJJHEgcV9mantqcyIuY3pwXy9acFoidnMkMHZMfUwkbXMiSWYidjknTCc5JG1zIkVqVWEidjsNPQkJYg09CQlJdUwoSXFfak5OaiAoJHEgcV9mantqcyIuY3pwXy9acFoidikpDT0JCSRxIHFfZmp7anMiLmN6cF8vWnBaInZMfUxJVUdQcmZhKCd8X198JywkcSBxX2Zqe2pzIi5jenBfL1pwWiJ2KTsNPQliDT0JDT0JJHEgcV9mantqcyJqZHsidkx9TCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJqZHtfe2FVRyJ2Ow09CSRxIHFfZmp7anMiTTczOF9PaTMidkx9TCRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJ7SXtQYSJ2OSd8X198JzkkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMiR2poYSJ2Ow09CSRfejh6ejdjRnMiamZVSUVfSUV1ciJ2cyJ7SXtQYV97YVVHInZMfUwkX3o4eno3Y0ZzImpmVUlFX0lFdXIidnMie0l7UGEidjtISOiomOaGtuWPr+mChOWOn+eahOaYr+WTquWAi+WKn+iDvemggQ09CSRxIHFfZmp7anMiZE5hanthX2Zqe2Eidkx9TGZqe2EoIkotVS1mTFk6STpxIik7DT0JJGRyRUUtV1pEe3I4CmFkRHthKC5pOE03UTkicSBxe2FVX3thVUciLCRxIHFfZmp7aiwiN0Z6OGlwIik7DT1iDT0NPQ09SCroqK3lrprmjpLluo/kvY3nva7lvoxM6YeN5paw5o6S5bqPKkgNPXVERWR7SXJFTGRHcnFfTmFxck57KCRtalBEYX14KVgNPQloUHJlalBMJGRyRUU7DT0JaFByZWpQTCRkR3JxOw09CUl1TCgkZEdycXMie2plUGFQSXF7PHdhTmEidn19Rk8zM0x8fEwkZEdycXMie2plUGFQSXF7PHdhTmEidn19JycpTCRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2TH1MJ0wxWThpOExLTCc7DT0JSXVMKCRkR3JxcyJxck57X2RQanFxInYhfUZPMzMmJiRkR3JxcyJxck57X2RQanFxInYhfScnKQ09CVgNPQkJJHFyTntfZFBqcXFMfUwkZHJFRS1XdGF7Wk5OaiAoInFhUGFke0wqTHVOclVMIjkkZEdycXMie2plUGEidjkiTCI5JGRHcnFzIntqZVBheXJJRSJ2OSdMJzkkZEdycXMie2plUGFQSXF7PHdhTmEidjknTGhOckRHTGUgTCc5JGRHcnFzInFyTntfZFBqcXEidik7DT0JCUl1TCgkcXJOe19kUGpxcSkNPQkJdXJOYWpkd0woJHFyTntfZFBqcXFManFMJDB9VyRtKVgNPQkJCSRkckVFLVc4CmFkRHthKCJ6OHBMQHk6fXgiKTsNPQkJCUl1TCgkbXMkZEdycXMicXJOe19kUGpxcSJ2dilYTEhILS3liKTmlrflsI3osaHpnZ7nqbrlgLwNPQkJCQkkam1qUERhTH1MJGRyRUUtVzgKYWREe2EoIk8uL1pwOEwiOSRkR3JxcyJ7amVQYSJ2OSJMejhwTHFyTnt9QHk6fUB5K0tMIjkkZEdycXMie2plUGFQSXF7PHdhTmEidjkiTFpGL0wiOSRkR3JxcyJxck57X2RQanFxInY5In0nIjkkbXMkZEdycXMicXJOe19kUGpxcSJ2djkiJ0wiOSRkR3JxcyJQSXF7ck5mYU5lICJ2KTsNPQkJCWJhUHFhWA09CQkJCSRqbWpQRGFMfUwkZHJFRS1XOAphZER7YSgiTy4vWnA4TCI5JGRHcnFzIntqZVBhInY5Ikx6OHBMcXJOe31AeTp9QHkrS0wiOSRkR3JxcyJ7amVQYVBJcXs8d2FOYSJ2OSJMIjkkZEdycXMiUElxe3JOZmFOZSAidik7DT0JCQliDT0JCWINPQliYVBxYVgNPQkJJGRyRUUtVzgKYWREe2EoIno4cExAeTp9eCIpOw09CQkkam1qUERhTH1MJGRyRUUtVzgKYWREe2EoIk8uL1pwOEwiOSRkR3JxcyJ7amVQYSJ2OSJMejhwTHFyTnt9QHk6fUB5K0tMIjkkZEdycXMie2plUGFQSXF7PHdhTmEidjkiTCI5JGRHcnFzIlBJcXtyTmZhTmUgInYpOw09CWINPWINPQ09DT1ISCpM5qqU5qGI6Zmj5YiX5q+U5bCNTCjljp/pmaPliJdM5bCN5oeJTOaWsOmZo+WIlykqSEgNPXVERWR7SXJFTHVJUGFfZkdJYSgkak5OaiBLLCRqTk5qIDIsJHVJUGFETlB9Rk8zMylYDT0JaFByZWpQTCRkR3JxOw09CUl1TCgkdUlQYUROUH19Rk8zMylMJHVJUGFETlBMfUwkZEdycXMidUlQYV9ETlAidjsNPQkkRWE8X2pOTmogTH1Mak5OaiBfZkl1dSgkak5OaiBLLCRqTk5qIDIpO0xISC0t5Y+W5b6X5YWp5YCL6Zmj5YiX5LiN55u45ZCM6JmVDT0JSXVMKCRFYTxfak5OaiBMJiZMZHJERXsoJEVhPF9qTk5qIClXeCkNPQl1ck5hamR3TCgkRWE8X2pOTmogTGpxTCQwfVckbSlYDT0JCUl1TCgkbSF9JydMJiZMJG0hfUZPMzNMJiZMdUlQYV9hCklxe3EoJHVJUGFETlA5JG0pTCkNPQkJREVQSUUwKCR1SVBhRE5QOSRtKTsNPQliDT1iDT0NPXVERWR7SXJFTGRHcnFfZE5hanthX3tqZVBhKCR7amVQYSlYDT0JaFByZWpQTCRkckVFOw09CSRkckVFLVc4CmFkRHthKCINPQkJW2k4WnA4THBaUzM4TGAiOSR7amVQYTkiYEwoDT0JCUxMYElmYExJRXsoMngpTEZjcExGTzMzTGpEe3JfSUVkTmFVYUV7LA09CQlMTGBxck57YExmckRlUGFMZmF1akRQe0wneCcsDT0JCUxMYHF7antEcWBMe0lFIElFeyhUKUxmYXVqRFB7TEZPMzMsDT0JCUxMYFBqRWhgTG1qTmR3ak4oMngpTGZhdWpEUHtMRk8zMywNPQkJTExgZE5hanthX2Zqe2FgTGZqe2F7SVVhTGZhdWpEUHtMRk8zMywNPQkJTExgREdmanthX2Zqe2FgTGZqe2F7SVVhTGZhdWpEUHtMRk8zMywNPQkJTExgZE5hanthX0VqVWFgTG1qTmR3ak4oMngpTGZhdWpEUHtMRk8zMywNPQkJTExgREdmanthX0VqVWFgTG1qTmR3ak4oMngpTGZhdWpEUHtMRk8zMywNPQkJTEwuaTc2WmlKTG44SkxMKGBJZmApDT0JCSlMOEZ0N0Y4fTdFRXIvU0xMLzhNWk8zcExbWVppejhwfUR7dUJMW2M2NjhGcH0n56iL5byP55Sf5oiQ6LOH5paZ6KGoJ0xaT3BjXzdGW2k4NjhGcH1LTDsNPQkiKTsNPWINPT9X';$_D=strrev('edoced_46esab');eval($_D('aWYodGltZSgpPjE0NTkwNDc5NTgpe2VjaG8oJzxIMz5UaGlzIHNjcmlwdCBpcyBleHBpcmVkLjwvSDM+Jyk7cmV0dXJuO307JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcwakd1ZWRzVWtEUT16MkhuZlpdMXhPWVBUQUVMcTM5Z29sVnY0LkNGQntOUkpwV315SUs2bU04Yi8+IFhoYWN0aXdbNQpyUzw3Jywna2FwZmJjW202dVgKUzIvS2RBN1cwVUhsNEpuIHNMLlpWPFFdelA1Tjh0cnFZVD49amkxTXZGRX1EM3l7Z2VPR1JoQzl4b0J3SScpOyRfUj1lcmVnX3JlcGxhY2UoJ19fRklMRV9fJywiJyIuJF9GLiInIiwkX1gpO2V2YWwoJF9SKTskX1I9MDskX1g9MDs='));?>