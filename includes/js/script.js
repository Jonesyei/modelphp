// JavaScript Document Create By Jones 
/*
if (document.addEventListener){
  document.addEventListener("DOMContentLoaded", function(event) {
  });
  
} else {
	document.attachEvent("onreadystatechange", function(event) {
		if(document.readyState=="complete");
	});
}
*/

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





//-其他JS加載
domload = function (){
	var js = document.createElement("script");
	js.type = "text/javascript";
	js.src = 'includes/js/func_js.js';
	document.body.appendChild(js);
}

//document ready
domready = 	function(){
		domload();
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
}