<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
	if (!$_GET["callback"]) {
		?>
        <script>
		alert('無回調用接口');
		window.history.back(-1);
		</script>
        <?php
		exit;
	}
	
	if (!$_GET["act"]) $_GET["act"] = 'login';

	
?>
<title>FB連線登入</title>
<script type="text/javascript" src="/includes/js/jquery.js"></script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '896918917056810',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script>/*
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '853621274692014',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  */
  
  

var open_status = 0;
window.addEventListener('load',function (){
	open_status=1;
	fblogin();
});

function fblogin() {

	if(FB.getUserID()=="")
	{
		FB.login(function (rs)
		{
			_tt = rs;
			FB.api('/me?fields=id,name,email', function(rs)
			{
				_re = rs;
				if(rs["error"]!=null)
				{
					alert("FB登入失敗");
					return window.history.back(-1);
				}
				/*
				if (typeof(rs["email"])=="undefined"){
					alert ('您的EMAIL 尚未通過FB認證通過\n 請使用FB 已EMAIL認證過的帳戶登入');
					return window.history.back(-1);
				}
				*/
				///登入完成執行區域
				member_dataset(rs);
			});
			
		},{scope:'email'});
	}
	else
	{
		FB.api('/me?fields=id,name,email', function(rs)
		{
			_re = rs;
			if(rs["error"]!=null)
			{
				alert("FB登入失敗");
				return window.history.back(-1);
			}
			/*
			if (typeof(rs["email"])=="undefined"){
				alert ('您的EMAIL 尚未通過FB認證通過\n 請使用FB 已EMAIL認證過的帳戶登入');
				return window.history.back(-1);
			}
			*/
			///登入完成執行區域
			member_dataset(rs);
		});
	}			
}



function member_dataset(data){
	$('[name="account"]').val(data["id"]);
	$('[name="name"]').val(data["name"]);
	$('[name="email"]').val(data["email"]);
	$('#form').submit();
}
document.addEventListener("DOMContentLoaded",function (){
	if (open_status==0){
		window.setTimeout("fblogin()",1000);
	}	
});
</script>
</head>
<body>
<form id="form" action="<?php echo $_GET["callback"]; ?>" method="post">
<input type="hidden" name="account">
<input type="hidden" name="name">
<input type="hidden" name="email">
<input type="hidden" name="netclass" value="fb">
<input type="hidden" name="act" value="<?php echo $_GET["act"]; ?>">
</form>
</body>
</html>
