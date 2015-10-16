var pass = "";

$(document).ready( 
	function()
	{
		//表單送出檢查
		$('form').submit(
			function()
			{
				return Check_Form(this);
			}
		);
		
		//驗證碼點擊重整
		$('img').each(
			function()
			{
				if( this.src.substr( this.src.length-3 ,3)=='php' )//抓副檔名php 驗證碼圖片
				{
					$(this).click( function() { Ref_pic(this); } );
				}
			}
		)
		
		$('#submit').click(
		   function()
		   {
			   $('form').submit();
		   }
	    );
		
	}
)




//物件class選擇
function Class_Switch(obj)
{
	var word = "";
	if( $(obj).attr("class")==null )
	{
		return word;	
	}
	
	var class_a = $(obj).attr("class").split("_");	
	
	//多種判斷class 中間加 "_" 區隔
	for(var i=0;i< class_a.length ; i++)
	switch( class_a[i] )
	{
		case "required"://姓名判斷 不可空值
		if(obj.value=="")
		{
			word += obj.title+"為必填\n";
		}
		break;
		
		case "email"://email判斷 不可空值 格式不可錯誤
		if( isEmail(obj.value)!=true )
		{
			word += obj.title+"格式有誤(只允許正常MAIL)\n";
		}
		break;
		
		case "account"://account判斷 不可空值 格式不可錯誤
		if( isAccount(obj.value)==true )
		{
			word += obj.title+"格式有誤(只允許半形英文數字)\n";
		}
		break;
		
		case "number"://account判斷 不可空值 格式不可錯誤
		if( isNumber(obj.value)==true )
		{
			word += obj.title+"格式有誤(只允許半形數字)\n";
		}
		break;
		
		case "password"://account判斷 不可空值 格式不可錯誤
		if(obj.value!="")
		if(obj.value.length<8)
		{
			word += obj.title+"長度不足(必須8位數以上)\n";
		}
		break;
		
	}//switch
	
	return word;
}


//表單送出檢查
function Check_Form(obj)
{
	var word = "";	
	var pass_tmp = "";
	$(obj).find("input").each(
		function(idex)
		{
			word += Class_Switch( this );//switch判斷
		}		
	)//each
	
	
	$(obj).find("input:password").each(
		function(idex)
		{
			if(pass_tmp=="")
				pass_tmp = this.value;
			else
				if(pass_tmp!=this.value) word += "密碼確認錯誤\n";
		}		
	)//each
	
	
	
	if(word!="")
	{
		alert(word);	
		return false;
	}
	else
	{
		return true;
	}
}


//更換驗證碼圖片
function Ref_pic(obj)
{
	var d = new Date();
	$(obj).attr("src", $(obj).attr("src").split("?")[0] + "?"+d.getTime() );
	return true;
}



//驗證mail
function isEmail(email)
{
	if (email=="") return true;//空白不判斷
	reEmail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/
	return reEmail.test(email);
}

//驗證帳號
function isAccount(account)
{
	//英數大小寫 不可有特殊符號
	if(account=="") return false;
	reAccount = /[^a-zA-Z0-9]+/
	return reAccount.test(account);
}

//驗證純數字欄位
function isNumber(number)
{
	//英數大小寫 最少6 最多12 不可有特殊符號
	if(number=="") return false;
	reNumber = /[^0-9]+/
	return reNumber.test(number);
}




