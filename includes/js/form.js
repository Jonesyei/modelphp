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
		
		$('#submit').removeAttr("href");
		$('#reset').removeAttr("href");
		$('#submit').css("cursor","pointer");
		$('#reset').css("cursor","pointer")
		
		$('#submit').click(
		   function()
		   {
			   $('form').submit();
		   }
	    );
		
		$('#reset').click(
		   function()
		   {
			   $(this).removeAttr("href");
			   $('form')[0].reset();
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
			word += obj.title+"格式有誤\n";
		}
		break;
	}//switch
	
	return word;
}


//表單送出檢查
function Check_Form(obj)
{
	var word = "";
	
	$(obj).find("input").each(
		function(idex)
		{
			word += Class_Switch( this );//switch判斷
		}		
	)//each
	
	$(obj).find("textarea").each(
		function(idex)
		{
			word += Class_Switch( this );//switch判斷
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
function isEmail(email){
	if (email=="") return true;//空白不判斷
	reEmail=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/
	return reEmail.test(email);
}
