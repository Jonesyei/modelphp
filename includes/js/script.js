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

WDJQ(document).ready(function (){
	domready();
	WDJQ(window).bind('load',function(){
		windowload();
	});
});


/*
	後台引導式編輯
	前台加上後台設定的選擇方式
	_isitem => 內容頁面數值參數,後台對象參數值(可不填預設id) , 用以對應後台資料
	_para	=> 額外連結參數 (EX: &s_mode=2&s_status=1)
*/
serback_editor = function (){
	var _menu_data;
            WDJQ.ajax( {
                url: "ajax.php",
                data: {type:"serback_editor"},
                type:"GET",
                dataType:'json',
				async: false,
                success: function(msg){
					_rr = msg;
					_menu_data = msg;
                }
            });
	//--上版描述
	WDJQ('body').prepend('<div style="position: fixed;z-index: 9999;top: 0;text-align: center;width: 100%;font-size: 18px;color: white;background: red;">後台編輯模式<BR><input type="button" value="點此正常瀏覽網站" onclick="window.localStorage.removeItem(\'serback_editor\');"></div>');
	
	if (_menu_data!=null && _menu_data.length>0){
		for (aa in _menu_data){
			WDJQ(_menu_data[aa].selector).each(function (idx,obj){
				WDJQ(obj).prepend('<div style="position:relative;"><span style="position:absolute;z-index:9998;right:0;"><input type="button" '+(WDJQ(obj).attr('_isitem')!=null ? "_isitem=\""+WDJQ(obj).attr('_isitem')+"\"":"")+' '+(WDJQ(obj).attr('_para')!=null ? "_para=\""+WDJQ(obj).attr('_para')+"\"":"")+' value="'+_menu_data[aa].name+'" serback_editor href="serback/'+_menu_data[aa].url+'" style="font-size:30px;"></span></div>');
			})
			.find('input[serback_editor]')
			.on('click',function (){
				if (confirm('您要編輯此資料內容')) {
					//--判斷是否為內容資料
					add_url = WDJQ(this).attr('href');
					if (WDJQ(this).attr('_isitem')!=null){
						//--判斷是否額外參數
						if (WDJQ(this).attr('_isitem').split(',').length>1){
							var items_list = WDJQ(this).attr('_isitem').split(',');
							if (WDJQ(this).attr('href').indexOf('?')>=0) add_url = WDJQ(this).attr('href')+'&'+items_list[1]+'='+Get(items_list[0]);
							if (WDJQ(this).attr('href').indexOf('?')<0) add_url = WDJQ(this).attr('href')+'?'+items_list[1]+'='+Get(items_list[0]);
						}else{
							if (WDJQ(this).attr('href').indexOf('?')>=0) add_url = WDJQ(this).attr('href')+'&id='+Get(WDJQ(this).attr('_isitem'));
							if (WDJQ(this).attr('href').indexOf('?')<0) add_url = WDJQ(this).attr('href')+'?id='+Get(WDJQ(this).attr('_isitem'));
						}
					}
					if (WDJQ(this).attr('_para')!=null && WDJQ(this).attr('_para')!=null) add_url += WDJQ(this).attr('_para');
					window.open(add_url,"serback2","_blank",config='height=500,width=500');
				}
			});
		}
	}
}
/*
	後台引導模式確認狀態
*/
serback_editor_timer = function (){
	if (window.localStorage.getItem('serback_editor')==null) window.location.reload();
}



//document ready
domready = 	function(){
		//domload();
		if (typeof(VerifyCode)!="undefined") VerifyCode(); //驗證碼賦予 事件
		
		//--base64圖片 onload 錯誤時讀取
		WDJQ('img').each(function (idx,obj){
			WDJQ(obj).on('error',function (){
				if (WDJQ(this).attr('tsrc')!=null && WDJQ(this).attr('tsrc')!=''){
					WDJQ(this)[0].src = WDJQ(this).attr('tsrc');
				}
			});
			WDJQ(obj).on('load',function (){
				if (WDJQ(this).attr('tsrc')!=null && WDJQ(this).attr('tsrc')!=''){
					WDJQ(this).removeAttr('tsrc');
				}
			});
		});
}





//window onload
windowload = function (){
	
	//--移除標籤資訊
	WDJQ('script').remove();

	//-IE圖片加載失敗時使用
	WDJQ('img').each(function (idx,obj){
		if (typeof(WDJQ(obj)[0].naturalWidth)!=="undefined" && WDJQ(obj)[0].naturalWidth===0){
			WDJQ(this)[0].src = WDJQ(this).attr('tsrc');
		}
	});
	
	//--驗證碼reload
	if (WDJQ('img[src*="verifycode"]').length>0){
		var temp_time = new Date();
		var temp_str = WDJQ('img[src*="verifycode"]').attr('src').split('?');
		if (temp_str.length>0)
		WDJQ('img[src*="verifycode"]').attr('src',temp_str[0]+'?'+temp_time.getTime());
	}

	//--帳號自動轉英數
	/*
	if (WDJQ('input[name="account"]').length>0){
		WDJQ('input[name="account"]').each(function (idx,obj){
			WDJQ(obj).bind('keyup',function (){this.value=this.value.replace(/\W/g,'');return false;});
			WDJQ(obj).on('keydown',function (){WDJQ(obj).keyup();});
		});
	}
	*/
	
	//--編輯器圖片 自動最大全屏寬度
	var detail_obj = '*[detail]';
	WDJQ(detail_obj).each(function (idx,obj){
		
	})
	
	//--後台引導式編輯
	if (window.localStorage.getItem('serback_editor')!=null){
		serback_editor();
		serback_editor_timer_obj = window.setInterval("serback_editor_timer()",1000);
	}
}