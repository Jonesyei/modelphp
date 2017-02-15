
$(document).ready(
	function()
	{
		//--針對chrome 56版修正 input type=password 非https 不安全性提示
		$('form').each(function(idx,obj){
			if ($(obj).find('input:password').length>0)
				$(obj).attr('autocomplete','off');
		});
		$('input:password').each(function(idx,obj){
			$(obj).val('');
			$(obj)[0].type='text';
			$(obj).bind('focus',function(){
				$(obj).removeAttr('style')[0].type='password';
			}).bind('blur',function(event){
				if ($(event.target).val()!="")
					$(event.target).css('color','transparent')[0].type='text';
				else
					$(event.target)[0].type = 'text';
			})
		});
	}
);

/*行動裝置事件賦予*/
var mouseEventTypes = {
touchstart : "mousedown",
touchmove : "mousemove",
touchend : "mouseup"
};
$(window).load(function (){
	for (originalType in mouseEventTypes) {
	document.addEventListener(originalType, function(originalEvent) {
	event = document.createEvent("MouseEvents");
	touch = originalEvent.changedTouches[0];
	event.initMouseEvent(mouseEventTypes[originalEvent.type], true, true,
	window, 0, touch.screenX, touch.screenY, touch.clientX,
	touch.clientY, touch.ctrlKey, touch.altKey, touch.shiftKey,
	touch.metaKey, 0, null);
	originalEvent.target.dispatchEvent(event);
	});
	}
});



function lock_view(){
	$('body')[0].onmousewheel = function (){ return false;}
	$('body')[0].onmousedown = function (){return false;}
	$('body')[0].onmouseup = function (){ return false;}
	$('body')[0].onmousemove = function (){ return false;}

	$('body')[0].ontouchmove = function (){ return false;}
}

function unlock_view(){
	$('body')[0].onmousewheel = function (){ return ;}
	$('body')[0].onmousedown = function (){return ;}
	$('body')[0].onmouseup = function (){ return ;}
	$('body')[0].onmousemove = function (){ return ;}

	$('body')[0].ontouchmove = function (){ return ;}
}


//search_value GET 值
function Get(sv)
{
	var value = [];
	var get = window.location.href.toString().split(window.location.host)[1].replace(/\+/g,'%20');
	get = get.split("?")[1];
	if(get==null) return value;
	
	get = get.split("&");
	
	for(idx in get)
	{
		if(sv==get[idx].split("=")[0]) value[value.length] = get[idx].split("=")[1];
	}
	if (value.length>1)
		return value;
	else if (value.length==1)
		return value[0];
	else
		return "";
}


UPLAppend = function(url)
{
	var pic = url.split("/")[url.split("/").length-1];
	var PicLi = '<li><img><input type="hidden" name="pic[]" ><BR /><a class="DelUploadPic">刪除圖片</a></li>';
	
	$('.UploadPicList').append( PicLi );
	
	$('.UploadPicList img:last').attr( {"src":url,"height":"120"} );
	$('.UploadPicList input:last').attr( {"value":pic} );
	$('.UploadPicList a:last').css( {"cursor":"pointer"} );
	
}



//判斷處理動作(後台用)
function checkAction(tID,tAction)
{
	
	var tFlag	= true;
	var del_str="";
	
	$("#id").attr("value","");
	
	if(tID == '')
	{
		$("input[name='choose_id']").each(function() {
        	 if($(this).attr("checked"))
			 {
			 	$("#id").attr("value",$(this).val());
				del_str = del_str + $(this).val()+",";
				tFlag	= false;
				if(tAction != "D") return false;
				
			 }
     	}); 
		$("#del_id").attr("value",del_str.substr(0,del_str.length-1)); 
	}
	else
	{			
		$("#id").attr("value",tID);	
		tFlag	= false;
	}
	
	if(tAction == 'U')
	{
			
		//用post送
		$("#act").attr("value","detail");
		
		//用get送
		if(tFlag) 
		{
			alert("請先勾選一筆資料!");
			return false;
		}
		else
		{
			location="?act=detail&id="+$("#id").val()+"&mode="+$("#mode").val()+"&s_query="+$("#s_query").val()+"&page="+$("#page").val();
			return true;
		}
	}
	else	//刪除指令
	{

		if(tFlag) 
		{
			alert("請先勾選一筆資料!");
			return false;
			
		}
		else
		{
			if(confirm('確定刪除？'))
			{
				$("#act").attr("value","del");
				$("#form").submit();
			}
			else
			{
				return false;
			}			

		}
	}
	
}

//跳頁
function jump(event,url,page)
{	
	if(event.keyCode == 13)
		location=url+"&page="+page;
}

//ajax改變狀態
function ajax_change_status(name,option,table,field,id,type)
{
	var obj="#"+name;
	 $(obj).editable(
		"ajax_edit.php?table="+table+"&field="+field+"&id="+id+"&type="+type, 
	{ 
		 id		: 'element_id',
		 type   : 'select',
		 data   : option,
		 indicator : '<img src="images/ajax-loader.gif">儲存中...'
	
	 });	
}



//數字左側補0
function paddingLeft(str,lenght){
	if(str.length >= lenght)
	return str;
	else
	return paddingLeft("0" +str,lenght);
}
//數字右側補0
function paddingRight(str,lenght){
	if(str.length >= lenght)
	return str;
	else
	return paddingRight(str+"0",lenght);
}



//驗證mail
function isEmail(email){
	if (email=="") return false;
	reEmail=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/
	return reEmail.test(email);
}

//驗證電話
function isTel(tel){
	if (tel=="") return false;
	reTel=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/
	return reTel.test(tel);
}

//驗證用
function Check_submit()
{
	var sumbit=false;
	
	$(document).ready(function() {
	
		var validator=$('#form').validate({  
			event: "keyup",
			debug:  false,   
			rules:{
				account:{required:true}
				,name:{required:true}
				,price:{required:true}
				,'class':{required:true}
				,post_date:{required:true}
				,password:{minlength: 8,maxlength: 16}
				,point:{required:true}
				,'email':{required:true,email:true}
				,'phone':{required:true,number:true}
			},
			messages:{
				account:{required:"* 不可空白"}
				,name:{required:"* 不可空白"}
				,price:{required:"* 不可空白"}
				,'class':{required:"* 不可空白"}
				,post_date:{required:"* 不可空白"}
				,password:{minlength:"密碼不可少8位",maxlength:"密碼不可超過16位"}
				,point:{required:"* 不可空白"}
				,'email':{required:"* 不可空白",email:"* email格式不符"}
				,'phone':{required:"* 不可空白",number:"* 格式不符(請輸入數字)"}
			},        
			submitHandler:function(form){	//送出前的自訂處理
				if(sumbit==false)
				{
					form.submit();
					sumbit=true;
				}
			}
		});	
	});
}




//身份證驗證
function CheckID( id ) {
  tab = "ABCDEFGHJKLMNPQRSTUVXYWZIO"                     
  A1 = new Array (1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3 );
  A2 = new Array (0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5 );
  Mx = new Array (9,8,7,6,5,4,3,2,1,1);

  if ( id.length != 10 ) return false;
  i = tab.indexOf( id.charAt(0) );
  if ( i == -1 ) return false;
  sum = A1[i] + A2[i]*9;

  for ( i=1; i<10; i++ ) {
    v = parseInt( id.charAt(i) );
    if ( isNaN(v) ) return false;
    sum = sum + v * Mx[i];
  }
  if ( sum % 10 != 0 ) return false;
  return true;
}



<!--Open_menu-->
function Open_menu(obj_name)
{	
	$.ajax( {
		//傳遞目標頁面檔案
		url: "ajx.php",
		type: 'GET',
		data: {
			//傳遞 變數名稱:值
			obj_name : obj_name,
			call : 'menu'
		},
        error:function (xhr, ajaxOptions, thrownError){
           		//alert(xhr.status);
                //alert(thrownError);
        },
		success: function(response) {
			//回傳物件名稱
		}
	} );
	
	$('.sub-menu#menu'+obj_name).toggle();
}
function menu_search(){
	if ($('#menu_search').val()!=null&&$('#menu_search').val()!="")
	$('#left_nav>ul').children("li").each(function(idx,obj){
			$('#menu_search').val($('#menu_search').val().toUpperCase());
			$(obj).find("ul:contains('"+$('#menu_search').val()+"')").fadeIn();
			$(obj).find("ul:not(:contains('"+$('#menu_search').val()+"'))").fadeOut();
	});
}



//datepicker
function Datepick(obj,range,format) {
	
	if(format==null) 
		format = 'yy,mm,dd';
	else
		format = format.replace('yyyy','yy');
		
	if(range=='range')
	{
		var temp_next_obj = $(obj).clone();
		var obj = $(obj);
		$( obj ).attr('name',$(obj).attr('name')+'[]').after(temp_next_obj);
		$( temp_next_obj ).attr('name',$(temp_next_obj).attr('name')+'[]').before('-');
		$( obj ).attr('size','12').datepicker({
		  changeMonth: true,
		  dateFormat: format,
		  numberOfMonths: 1,
		  buttonImage: "../includes/js/datepick/calendar-blue.gif",
		  buttonImageOnly: true,
		  onClose: function( selectedDate ) {
			$( temp_next_obj ).val(selectedDate).datepicker( "option", "minDate", selectedDate );
		  }
		});
		$( temp_next_obj ).attr('size','12').datepicker({
		  changeMonth: true,
		  dateFormat: format,
		  numberOfMonths: 1,
		  buttonImage: "../includes/js/datepick/calendar-blue.gif",
		  buttonImageOnly: true,
		  onClose: function( selectedDate ) {
			$( obj ).datepicker( "option", "maxDate", selectedDate );
		  }
		});
		
	}
	else
	{
		$( obj ).datepicker({
		  showOn: "button",
		  dateFormat: format,
		  buttonImage: "../includes/js/datepick/calendar-blue.gif",
		  buttonImageOnly: true,
		  buttonText: "Select date"
		});	
	}
};




//排序
Sort_set = function (sort_id,sort_set)
{
	if( isNaN(sort_set)==true || sort_set=="" || sort_set==null )
	{
		alert('請輸入數字');
		return 0;
	}
	
	var link_url = "?";
	if( $( location.href.split("?") ).size() > 1 ) link_url = "&";
	
	location = location.href + link_url + "sort_id="+sort_id+"&sort_set="+sort_set;
}


////不以ajax處理 改以data_list.php sort_id sort_set 處理
/*
//列表排序   要變換sort資料的id,變換sort的列表的table,當時的頁面,ajax連絡的php檔位置,特殊模式,特殊模式之值
Sort_set = function (id,table,url,php,type,type_value,post){
	//後面增加的type,type_value 為多組資料共用一個table所用 用來分組排序 type為分類方式 type_value為分類方式之判斷值
	//分類方式可以 type1,type2,...模式輸入陣列 type_valu 則輸入相對應的值  多重條件分類排序

	if(isNaN($('#sort_'+id).val())==true || $('#sort_'+id).val()=="")
	{
		alert('請輸入數字');
		return 0;
	}
	
	location = '';
	
	
	$.ajax({
		//傳遞目標頁面檔案
		url: php,
		type: 'GET',
		data: {
			//傳遞 變數名稱:值
			'sort' : $('#sort_'+id).val(),
			id : id	,
			table : table,
			type : type,
			type_value : type_value
		},
		error: function(xhr) {
			alert('Ajax request 發生錯誤');
		},
		success: function(response) {
			//回傳物件名稱
			//if(url.split("?")[1]) url = url+"&";
			
			if(post!=null)
				location = url+post;
			else
				location = url;
				
			//$('#sort_'+id).fadeIn();
		}
	});
};
*/


//tr 交叉顯示顏色
function page_initial(obj)
{
	$(document).ready(function(){
		//判斷基偶數行
		$("."+obj).each(function (idx,data){
		  $(data).find("tr:odd").attr("bgcolor","#FFFFFF");  
		  $(data).find("tr:even").attr("bgcolor","#EEEEEE");
		})
	} );		
}



//全選checkbox之涵式
function CheckAll(name,list)
{ 	
	var ckAll = $('#'+name);
	var ck = this.form.elements[list]; 	
	if(!ck.length)
	{
		ck.checked = ckAll[0].checked;	
	}
	else
	{
		for (var i=0;i<ck.length;i++) 
			ck[i].checked = ckAll[0].checked;
	}

	return 0;
	
	//以下為舊方法
	
	var ck = this.form.elements['choose_id']; 

	var ckAll = document.form.allbox; 
	
	if (!ck) { //當沒有checkbox時 
		ckAll.checked = false; 
	}
	else if (!ck.length) { //當只有一個checkbox時 
		ck.checked = ckAll.checked; 
	}
	else { //當有兩個以上的checkbox時 
		for (var i=0;i<ck.length;i++) 
			ck[i].checked = ckAll.checked; 
	} 
}



//編輯checkbox勾取目標之涵式
function Edit(edit_url)
{
	var ck = this.form.elements["choose_id"];
	if(!ck) {alert("沒有資料可以編輯");return;}
	
	edit_url = location.toString();

	if( $(edit_url.split("?")).size()==1 ) edit_url += "?";
	edit_url += "&id=";
	
	
	
	//當只有一個checkbox時
	if (!ck.length) 
	{ 
		if(ck.checked== true)
		{
			location=edit_url+ck.value;
		}
		else
		{
			alert("請勾選要編輯的資料");
			return;
		}
	}
	else 
	{ //當有兩個以上的checkbox時 
		var id="";
		for(var i=0;i<ck.length;i++)
		{
			if(ck[i].checked==true) 
			{
				if(id!="") {alert("請勿勾選複數資料");return;}
				id = ck[i].value;
			}
		}
		if(id=="") {alert("請勾選要編輯的資料");return;}
		
		location=edit_url+id;
		return;
	} 		
}

//刪除checkbox勾取目標之涵式
function Del(del_url)
{
	//document.getElementByTag("choose_id");
	var ck = document.form.elements["choose_id"]; 
	var id_str="";
	
	del_url = location.toString();

	if( $(del_url.split("?")).size()==1 ) del_url += "?";
	del_url += "&del_id=";
	
	
	if(!ck) {alert("沒有資料可以刪除");return;}
	
	
		if(!ck.length) 
		{
		    if(ck.checked== true)
			{
				if(confirm("確定要刪除嗎?")) location=del_url+ck.value;
			}
			else
			{
				alert("請勾選要刪除的資料");
				return;
			}
		}
		else
		{
			for (var i=0;i<ck.length;i++) 
			{
				if(ck[i].checked== true){//抓值
					id_str += ck[i].value+",";
					ck[i].checked = false;
				}
			}
			if(id_str=="") {alert("請勾選要刪除的資料");return;}
			
			id_str = id_str.substring(0,id_str.length-1);//去掉最後一個 ","
			
			if(confirm("確定要刪除嗎?")) location=del_url+id_str;
		}

}

function sortable(obj,obj2){
	if(obj2!=null)
	$(obj).sortable( {items: obj2} );
	else
	$(obj).sortable();
	
    $(obj).disableSelection();
}


/*前端dataurl 縮圖*/
function resizeImage(img, width, height) {

    var canvas = document.createElement("canvas");
	
	if (img.naturalWidth>img.naturalHeight){
		var pr = width/img.naturalWidth;
		canvas.width = width;
		canvas.height = Math.ceil(img.naturalHeight*pr);
		canvas.getContext("2d").drawImage(img, 0, 0, width, Math.ceil(img.naturalHeight*pr));
	}else{
		var pr = height/img.naturalHeight;
		canvas.width = Math.ceil(img.naturalWidth*pr);
		canvas.height = height;
		canvas.getContext("2d").drawImage(img, 0, 0, Math.ceil(img.naturalWidth*pr), height);
	}	
	
	return canvas.toDataURL();
}





//---聯絡我們地圖編輯器
/*
	create by Jones
*/
J_map = function(selector,context) {
	
	J_map_ini = new Object();
	var old_selector = $(selector);
	var selector = $(selector).parent().prepend('<div class="jmap"></div>').find('div.jmap');
	
	//--基本設定
	J_map_ini.defwidth = '';
	J_map_ini.defhidth = '';
	J_map_ini.address_keyup = function (){}
	J_map_ini.type_array = {p:'地形圖',h:'衛星圖'}
	//--工具箱建置
	J_map_ini.create = function (selector){
		$(selector).append('<div data-row="address">地址或座標:<input type="text" placeholder="輸入地址或經緯度" value=""></div>')
				   .find('div[data-row="address"]>input').on('keyup',function(){return J_map_ini.address_keyup;});
   	    $(selector).append('<div data-row="size">寬度:<input type="text" placeholder="寬度" class="width" value="'+J_map_ini.defwidth+'" maxlength=4 size=4> X 高度:<input type="text" placeholder="高度" class="height" value="'+J_map_ini.defhidth+'" maxlength=4 size=4></div>');
		$(selector).append('<div data-row="zoom">比例大小:<input type="text" placeholder="1~18(16最佳)" value="16" maxlength=2 size=2></div>')
				   .find('div[data-row="zoom"]>input').on('keyup',function(){return this.value=this.value.replace(/\D/g,'')*1;});
		$(selector).append('<div data-row="type">地圖模式:<select></select></div>');
		for (aa in J_map_ini.type_array)
			$(selector).find('div[data-row="type"]>select').append('<option value='+aa+'>'+J_map_ini.type_array[aa]+'</option>');
		
		$(selector).append('<div data-row="button"><input type="button" value="確認"></div>')
					.find('div[data-row="button"]>input').on('click',function(){
						selector = $(event.target).parent().parent();
						if ($(selector).find('div[data-row="address"]>input').val().trim().length<1) return alert('請填寫位置資訊!!');
						$(old_selector).val('<iframe width="'+$(selector).find('div[data-row="size"]>input.width').val()+'" height="'+$(selector).find('div[data-row="size"]>input.height').val()+'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q='+encodeURI($(selector).find('div[data-row="address"]>input').val())+'&z='+$(selector).find('div[data-row="zoom"]>input').val()+'&output=embed&t='+$(selector).find('div[data-row="type"]>select').val()+'></iframe>');
						$(selector).find('iframe').remove();
						$(selector).append($(old_selector).val());
					});
					
		if ($(old_selector).val().trim().length>0){
			$(selector).append($(old_selector).val());
		}
	}
	J_map_ini.create(selector);
	return J_map_ini;
}





