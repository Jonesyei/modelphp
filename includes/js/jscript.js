/*
	瀏覽器判斷 new obj()
*/
function browser(){
  var sAgent = navigator.userAgent.toLowerCase();
  this.isIE = (sAgent.indexOf("msie")!=-1); //IE6.0-7
  this.isFF = (sAgent.indexOf("firefox")!=-1);//firefox
  this.isSa = (sAgent.indexOf("safari")!=-1);//safari
  this.isOp = (sAgent.indexOf("opera")!=-1);//opera
  this.isNN = (sAgent.indexOf("netscape")!=-1);//netscape
  this.isMa = this.isIE;//marthon
  this.isOther = (!this.isIE && !this.isFF && !this.isSa && !this.isOp && !this.isNN && !this.isSa);//unknown Browser
}





/*
	表單檢查
	ex: checkform(['form input','form textarea','form select']);
*/
function checkform(check_array,form_obj){
	erro_msg='';
	for(aa in check_array){
		$(check_array[aa]).each(function(idx,data){
										 
			if ($(data).attr('require')!=null&&($(data).val()==''||$(data).val()==null)) {
				erro_msg += $(data).attr('name')+' 欄位不可為空值!!\n';
			}
			
			//多選擇
			if ($(data).attr('require')!=null&&$(data).attr("type")=='radio'){
				if ($(check_array[aa]+'[name="'+$(data).attr("name")+'"]:checked').length<=0) erro_msg += $(data).attr('name')+' 必須選擇一項\n';
			}
			
			//email 驗證
			if ($(data).attr('email')!=null && !reg.test($(data).val())) {
				erro_msg += $(data).attr('name') + '格式不正確!!\n';
			}

			//最大數值驗證
			if ($(data).attr('max')!=null && $(data).val().length > $(data).attr('max')*1) {
				erro_msg += $(data).attr('name') + '必須少於'+$(data).attr('max')+'個字數!!\n';
			}

			//最小數值驗證
			if ($(data).attr('min')!=null && $(data).val().length < $(data).attr('min')*1) {
				erro_msg += $(data).attr('name') + '必須大於'+$(data).attr('min')+'個字數!!\n';
			}
			
			//只限定數字
			if ($(data).attr('isnum')!=null && isNaN($(data).val()) ) {
				alert('test')
				erro_msg += $(data).attr('name') + '必須為數值格式!!\n';
			}
			
			//正規劃格式判斷
			if ($(data).attr('regexp')!=null){
				var temp_check_str = $(data).attr('regexp');
				var regcheck = new RegExp(temp_check_str);
				if (!regcheck.test($(data).val())) erro_msg += $(data).attr('regexp-msg') + '\n';
			}
			
		 });
	}
	if (erro_msg=='')
		$(form_obj).submit();
	else
		alert(erro_msg);
	
}



/*AJAX傳送*/
function ajx(filename,sendmode,backdata,data,reback,async){
	//資料格式設定
	if (typeof(backdata)!='undefined' && backdata!=null){
		this.dataformat = backdata;
	}else{
		this.dataformat = 'text';
	}
	
	//傳送模式
	if (typeof(sendmode)!='undefined' && sendmode!=null){
		this.sendmode = sendmode;
	}else{
		this.sendmode = 'GET';
	}
	
	//回應狀況
	if (typeof(async)!='undefined' && async!=null){
		this.async = true;
	}else{
		this.async = false;
	}
	
	//目的檔案
	if (typeof(filename)!='undefined' && filename!=null){
		this.filename = filename;
	}else{
		this.filename = 'ajax.php';
	}
	
	this.data = data;
	
	this.reback = reback;
	
	 $.ajax( {
			url: this.filename,
			data: this.data,
			type: this.sendmode,
			dataType: this.dataformat,
			async: this.async,
			success: reback
	});
	 
}



//數字左側補0
function paddingLeft(str,lenght){
	str = str + "";//轉成字串
	if(str.length >= lenght)
	return str;
	else
	return paddingLeft("0" +str,lenght);
}
//數字右側補0
function paddingRight(str,lenght){
	str = str + "";//轉成字串
	if(str.length >= lenght)
	return str;
	else
	return paddingRight(str+"0",lenght);
}
