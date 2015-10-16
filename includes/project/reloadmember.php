<?php
		$membersql = "select * from ".PREFIX."member WHERE id=".$_SESSION["member_info"]["loginaccount"]["id"];
		$memberdata = $conn->GetRow($membersql);	
		if($memberdata){
				$_SESSION["member_info"]["loginaccount"] = $memberdata;
		}else{
			alert("发生问题！请重新登入",'login.php');
		}
?>