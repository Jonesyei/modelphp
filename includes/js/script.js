// JavaScript Document Create By Jones 
/*
	前端畫面優化處理JS
	目前功能
	
	1.驗證碼事件賦予
	2.圖片加載失敗時 使用tsrc屬性置換
	3.帳號欄位自動轉換英數
	4.
*/
/*
if (document.addEventListener){
  document.addEventListener("DOMContentLoaded", function(event) {
	  domready();
	  window.addEventListener('load',windowload);
  });
  
} else {
	document.attachEvent("onreadystatechange", function(event) {
		if(document.readyState=="complete"){
			domready();
			window.attachEvent('onload',windowload);
		}
	});
}
*/

$(document).ready(function (){
	domready();
	$(window).bind('load',function(){
		windowload();
	});
});

//document ready
domready = 	function(){
		//domload();
		if (typeof(VerifyCode)!="undefined") VerifyCode(); //驗證碼賦予 事件
		
		//--base64圖片 onload 錯誤時讀取
		$('img').each(function (idx,obj){
			$(obj).on('error',function (){
				if ($(this).attr('tsrc')!=null && $(this).attr('tsrc')!=''){
					$(this)[0].src = $(this).attr('tsrc');
				}
			});
			$(obj).on('load',function (){
				if ($(this).attr('tsrc')!=null && $(this).attr('tsrc')!=''){
					$(this).removeAttr('tsrc');
				}
			});
		});
}

//window onload
windowload = function (){
	
	//--移除標籤資訊
	$('script').remove();

	//-IE圖片加載失敗時使用
	$('img').each(function (idx,obj){
		if (typeof($(obj)[0].naturalWidth)!=="undefined" && $(obj)[0].naturalWidth===0){
			$(this)[0].src = $(this).attr('tsrc');
		}
	});
	
	//--驗證碼reload
	if ($('img[src*="verifycode"]').length>0){
		var temp_time = new Date();
		var temp_str = $('img[src*="verifycode"]').attr('src').split('?');
		if (temp_str.length>0)
		$('img[src*="verifycode"]').attr('src',temp_str[0]+'?'+temp_time.getTime());
	}

	//--帳號自動轉英數
	if ($('input[name="account"]').length>0){
		$('input[name="account"]').each(function (idx,obj){
			$(obj).bind('keyup',function (){this.value=this.value.replace(/\W/g,'');return false;});
			$(obj).on('keydown',function (){$(obj).keyup();});
		});
	}
	
	//--編輯器圖片 自動最大全屏寬度
	var detail_obj = '*[detail]';
	$(detail_obj).each(function (idx,obj){
		
	})
}