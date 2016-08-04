<?php
include_once("../includes/main_back_inc.php");
/*
$data["button"]["href"]='1'; //--上傳圖片後連結網址開關
*/
$include = true;//不讓 index.php display的參數

$cpos["pagecount"] = 10; //每頁顯示筆數
$cpos["table"] = PREFIX."test";
$cpos["tablelistwhere"] = "WHERE type='".$_GET["class"].$_GET["design"]."' and lang='".$_SESSION["admin_info"]["lang"]."'";//列表顯示資料的條件
$cpos["file_url"] = "../upload/".$_GET["class"].$_GET["design"]."/";
$cpos["fck_set"] = array('detail');
$cpos["listorderby"] = "sort";
//$cpos["re_img_w"] = '680'; //縮圖處理 寬 值  設定兩項才會執行縮圖處理
//$cpos["re_img_h"] = '440'; //縮圖處理 高 值


$cpos["tablesearch"] = 'name';//搜尋關聯欄位
$cpos["searchstatus"] = 'status';//搜尋狀態參照欄位

$cpos["file_check"] = array('pic','file');

$close["insert"] =0;
$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 0;



if (strtolower($_GET["id"])=='lang') {
	$cpos["tablewhere"] = 'type="'.$_GET["class"].$_GET["design"].'" and lang="'.$_SESSION["admin_info"]["lang"].'"';
}else{
	$cpos["tablewhere"] = 'id="'.$_GET["id"].'" and lang="'.$_SESSION["admin_info"]["lang"].'"'; //內容頁檢視條件	
}


if ($_POST)
if (($_POST["pic"][0]==''||$_POST["pic"][0]==NULL) && count($_POST["pic"])<=1) {
	$_POST["pic"]='';
}elseif (($_POST["pic"][0]==''||$_POST["pic"][0]==NULL) && count($_POST["pic"])>1){
	unset($_POST["pic"][0]);
}



//--運行前處理

switch ($_GET["class"]){
	default:
	break;
}


include_once("centerpoes.php");



//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["pic_size_title"] = "任意比例";
	$data["uploadfilemax"] = 50;//圖檔上傳上限
	
	$data["one"]["pic"] = explode('|__|',$data["one"]["pic"]);
	
	//-----語系為ch 使用的switch
	//if ($_SESSION["admin_info"]["lang"]=='ch')
	switch ($_GET["class"]){
		case "EDM":
				$data["one"]["name"] = "首頁EDM";
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				
				//--檔案上傳
				$data["one"]["file"] = explode('|__|',$data["one"]["file"]);			//-檔案名稱(實體檔案)
				$data["one"]["file_name"] = explode('|__|',$data["one"]["file_name"]);	//-檔案名稱(顯示用途)
				$data["button"]["file"] = '10';											//-設定檔案上限(一旦設定後則開啟檔案上傳功能)
				
				//--關閉圖片功能
				$data["close"]["pic"] ='1';
				
				//--圖片功能資料設定
				$data["pic_size_title"] = "任意比例";										//比例說明
				$data["uploadfilemax"] = 50;											//圖檔上傳上限
				
				//--圖片功能相關參數
				$data["button"]["href"]='1';											//啟用圖片附加連結功能
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);			//(必須把資料轉為陣列)
				$data["button"]["name"]='名稱';											//啟用圖片附加命名功能
				$data["one"]["name"] = explode('|__|',$data["one"]["name"]);			//(必須把資料轉為陣列)
				//--圖片相關功能 自由命名多欄位
				// array('other_name'=>'設立物件顯示名稱','other_obj'=>'設立物件命名欄位EX:name','other_data'=>array('陣列資料內容'));
				$data["button"]["other"][] = array('other_name'=>$v,'other_obj'=>$k,'other_data'=>$data["one"][$k]);
				
				//--預設內容欄位功能 (預設為不開)
				$data["button"]["detail"]='1';											//設立後開啟detail欄位內容
				$data["button"]["fck"]='1';												//detail 內容欄位轉換為編輯器內容
				
				//--自由命名
				$data["order_html"] .= '<tr><td align="right">欄位資料:</td><td><select name="class">'.Make_list($temp_array,$data["one"]["class"]).'</select></td></tr>';
		break;

		
		case "about":
				$data["close"]["pic"] ='1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
		break;

		case "we_product":
				$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
				$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
				$data["uploadfilemax"] = 4-$data_pic_count;//圖檔上傳上限	
				$data["button"]["name"] = '名稱';
				$data["button"]["change_detail"] = '子項說明';
		break;

		case "product":
				$data["button"]["file"] = 1;
				//$data["button"]["size"]["name"] = 'size_name';
				//$data["button"]["size"]["value"] = 'size_value';
				$data["pic_size_title"] = '330*330';
				$detail = explode('|__|',deQuotes(@$data["one"]["detail"],-1));
				$data["uploadfilemax"] = 1-$data_pic_count;//圖檔上傳上限
				if ($data["one"]["title_pic"]!=NULL||$data["one"]["title_pic"]!=""){
					$data["order_html"] .= '<tr><td align="right">列表圖片<br>建議220*165大小:</td><td><img id="title_pic" src="'.$cpos["file_url"].$data["one"]["title_pic"].'"> <a href="javascript:$(\'#title_pic\').parent().append(\'<input type=file name=title_pic>\');$(\'#title_pic\').parent().find(\'img,a\').remove();">[刪除圖片]</a></td></tr>';
				}else{
					$data["order_html"] .= '<tr><td align="right">列表圖片<br>建議220*165大小:</td><td><input type="file" name="title_pic"></td></tr>';
				}
				$data["order_html"] .= '<tr><td align="right">產品分類:</td><td>'.create_select("class",$aa,$data["one"]["class"],$product_class,"根目錄").'</td></tr>';
				$data["order_html"] .= '<tr><td align="right">上版說明:</td><td>'.Fck("detail[0]",'90%','450','../fckeditor/',$detail[0]).'</td></tr>';
				$data["order_html"] .= '<tr><td align="right">產品說明:</td><td>'.Fck("detail[1]",'90%','450','../fckeditor/',$detail[1]).'</td></tr>';

		break;
		
		case "news":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
				//$data["order_html"] .= '<tr><td align="right">消息分類:</td><td><select name="new_type">'.Make_list($_SETUP["new_tage"],$data["one"]["new_type"]).'</select></td></tr>';
		break;
		
		case "history_case":
				$data["order_html"] .= '<tr><td align="right">文字內容匯入:</td><td><input type="file" name="file">(匯入前請先將圖片排序好存檔，並請轉存csv檔案使用) <a href="test.csv">範例格式下載</a></td></tr>';
			//---物件陣列
				$data["pic_size_title"] = "220 x (不限制 但請盡量保持方型大小)";
				foreach ($_SETUP["obj"] as $k=>$v){
					if ($data["one"][$k]) $data["one"][$k] = explode('|__|',$data["one"][$k]);
					if ($data["one"][$k]!=NULL&&$data["one"][$k]!='') {
						$data["button"]["other"][] = array('other_name'=>$v,'other_obj'=>$k,'other_data'=>$data["one"][$k]);
					}else{
						$data["button"]["other"][] = array('other_name'=>$v,'other_obj'=>$k);	
					}
					
				}
		break;
		
		case "mode_background":
		case "mode_pic":
			$data["uploadfilemax"] = 1-$data_pic_count;//圖檔上傳上限	
			$temp_array = array('big'=>'大','mid'=>'中','sml'=>'小');
			$data["order_html"] .= '<tr><td align="right">底板大小:</td><td><select name="class">'.Make_list($temp_array,$data["one"]["class"]).'</select></td></tr>';
			$temp_array1 = array('0'=>'直向','1'=>'橫向');
			$data["order_html"] .= '<tr><td align="right">呈現方式:</td><td><select name="class2">'.Make_list($temp_array1,$data["one"]["class2"]).'</select></td></tr>';
		break;
		
		
		case "gpic":
		case "classic":
			$data["uploadfilemax"] = 5-$data_pic_count;//圖檔上傳上限	
			$data["button"]["href"]='1';
			$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
			$data["button"]["name"]='名稱';
			$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
		break;
		
		case "memberdesh":
			$data["close"]["pic"] = '1';
			$data["one"]["memo"] = explode('|__|',$data["one"]["memo"]);
			$data["order_html"] .= '<tr><td align="right">類型別名:</td><td><input type="text" name="new_type" value="'.dequotes($data["one"]["new_type"],-1).'" disabled="disabled"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">折扣率:</td><td><input type="text" name="detail" value="'.dequotes($data["one"]["detail"],-1).'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">到達紅利限制:</td><td><input type="text" name="memo[]" value="'.dequotes($data["one"]["memo"][0],-1).'"> - <input type="text" name="memo[]" value="'.dequotes($data["one"]["memo"][1],-1).'"></td></tr>';
		break;
		
		case "contact":
			$data["close"]["pic"] = '1';
			$data["button"]["detail"]='1';
			$data["order_html"] .= '<tr><td align="right">GOOGLE地圖:</td><td><textarea name="memo" rows="10" cols="50">'.dequotes($data["one"]["memo"],-1).'</textarea></td></tr>';
		break;
		
		case "smtp_mail":
			$data["close"]["pic"] = '1';
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$SMTPSecure = array('ssl'=>'ssl','tls'=>'tls');
			$data["order_html"] .= '<tr><td align="right">連線方式:</td><td><select name="detail[]">'.Make_list($SMTPSecure,$data["one"]["detail"][0]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">連線主機:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][1].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">port:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][2].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">帳號:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][3].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">密碼:</td><td><input type="password" name="detail[]" value="'.$data["one"]["detail"][4].'"></td></tr>';
		break;
		
		/*訂單信件*/
		case "paymail":
			$data["close"]["pic"] = '1';
			if ($_GET["id"]!='0'&&$_GET["id"]!='lang')
			$data["order_html"] .= '<tr><td align="right">對應付款方式:</td><td><select name="new_type" disabled>'.Make_list($_SETUP["paytype"],$data["one"]["new_type"]).'</select></td></tr>';
			else
			$data["order_html"] .= '<tr><td align="right">對應付款方式:</td><td><select name="new_type">'.Make_list($_SETUP["paytype"],$data["one"]["new_type"]).'</select></td></tr>';
			
			$data["order_html"] .= '<tr><td align="right">信件參數:</td><td>'.
			'訂單編號:<input type="text" value="[訂單編號]" tg1><a href="javascript:;" onclick="$(\'input[tg1]\')[0].select();">選擇</a><br>'.
			'<s>出貨狀態:<input type="text" value="[出貨狀態]" tg2 disabled="disabled"><a href="javascript:;" onclick="$(\'input[tg2]\')[0].select();">選擇</a></s><br>'.
			'付款狀態:<input type="text" value="[付款狀態]" tg3><a href="javascript:;" onclick="$(\'input[tg3]\')[0].select();">選擇</a><br>'.
			'建立時間:<input type="text" value="[建立時間]" tg4><a href="javascript:;" onclick="$(\'input[tg4]\')[0].select();">選擇</a><br>'.
			'出貨時間:<input type="text" value="[出貨時間]" tg5><a href="javascript:;" onclick="$(\'input[tg5]\')[0].select();">選擇</a><br>'.
			'購物總額:<input type="text" value="[購物總額]" tg6><a href="javascript:;" onclick="$(\'input[tg6]\')[0].select();">選擇</a> (含運費)<br>'.
			'收件人:<input type="text" value="[收件人]" tg7><a href="javascript:;" onclick="$(\'input[tg7]\')[0].select();">選擇</a><br>'.
			'收件人地址:<input type="text" value="[收件人地址]" tg8><a href="javascript:;" onclick="$(\'input[tg8]\')[0].select();">選擇</a><br>'.
			'收件人信箱:<input type="text" value="[收件人信箱]" tg9><a href="javascript:;" onclick="$(\'input[tg9]\')[0].select();">選擇</a><br>'.
			'收件人電話:<input type="text" value="[收件人電話]" tg10><a href="javascript:;" onclick="$(\'input[tg10]\')[0].select();">選擇</a><br>'.
			'備註訊息:<input type="text" value="[備註訊息]" tg11><a href="javascript:;" onclick="$(\'input[tg11]\')[0].select();">選擇</a><br>'.
			'------------我是分隔線------------<br>'.
			'<font color="red">請使用上方標籤內容複製取代您文中的資料來源!!</font>'
			.'</td></tr>';
			
			$data["order_html"] .= '<tr><td align="right">信件上版:</td><td>'.Fck("detail",'90%','450','../fckeditor/',$data["one"]["detail"]).'</td></tr>';
			$data["order_html"] .= '<tr><td align="right">信件下版:</td><td>'.Fck("memo",'90%','450','../fckeditor/',$data["one"]["memo"]).'</td></tr>';
		break;
		
		/*取貨信件*/
		case "cargomail":
			$data["close"]["pic"] = '1';
			if ($_GET["id"]!='0'&&$_GET["id"]!='lang')
			$data["order_html"] .= '<tr><td align="right">對應付款方式:</td><td><select name="new_type" disabled>'.Make_list($_SETUP["paytype"],$data["one"]["new_type"]).'</select></td></tr>';
			else
			$data["order_html"] .= '<tr><td align="right">對應付款方式:</td><td><select name="new_type">'.Make_list($_SETUP["paytype"],$data["one"]["new_type"]).'</select></td></tr>';
			
			$data["order_html"] .= '<tr><td align="right">信件參數:</td><td>'.
			'訂單編號:<input type="text" value="[訂單編號]" tg1><a href="javascript:;" onclick="$(\'input[tg1]\')[0].select();">選擇</a><br>'.
			'出貨狀態:<input type="text" value="[出貨狀態]" tg2><a href="javascript:;" onclick="$(\'input[tg2]\')[0].select();">選擇</a><br>'.
			'付款狀態:<input type="text" value="[付款狀態]" tg3><a href="javascript:;" onclick="$(\'input[tg3]\')[0].select();">選擇</a><br>'.
			'建立時間:<input type="text" value="[建立時間]" tg4><a href="javascript:;" onclick="$(\'input[tg4]\')[0].select();">選擇</a><br>'.
			'出貨時間:<input type="text" value="[出貨時間]" tg5><a href="javascript:;" onclick="$(\'input[tg5]\')[0].select();">選擇</a><br>'.
			'購物總額:<input type="text" value="[購物總額]" tg6><a href="javascript:;" onclick="$(\'input[tg6]\')[0].select();">選擇</a> (含運費)<br>'.
			'收件人:<input type="text" value="[收件人]" tg7><a href="javascript:;" onclick="$(\'input[tg7]\')[0].select();">選擇</a><br>'.
			'收件人地址:<input type="text" value="[收件人地址]" tg8><a href="javascript:;" onclick="$(\'input[tg8]\')[0].select();">選擇</a><br>'.
			'收件人信箱:<input type="text" value="[收件人信箱]" tg9><a href="javascript:;" onclick="$(\'input[tg9]\')[0].select();">選擇</a><br>'.
			'收件人電話:<input type="text" value="[收件人電話]" tg10><a href="javascript:;" onclick="$(\'input[tg10]\')[0].select();">選擇</a><br>'.
			'備註訊息:<input type="text" value="[備註訊息]" tg11><a href="javascript:;" onclick="$(\'input[tg11]\')[0].select();">選擇</a><br>'.
			'------------我是分隔線------------<br>'.
			'<font color="red">請使用上方標籤內容複製取代您文中的資料來源!!</font>'
			.'</td></tr>';
			$data["order_html"] .= '<tr><td align="right">信件內容:</td><td>'.Fck("detail",'90%','450','../fckeditor/',$data["one"]["detail"]).'</td></tr>';
		break;
		
		/*任選活動組*/
		case "shop_active_any":
			$tree_data_pro=display_tree('1',$conn,PREFIX.'category');	//-品牌資料
			if ($tree_data_pro)
			foreach ($tree_data_pro as $k=>$v){
				$pro_array[$v['id']] = $v['show_text'];
			}
			
			//--第一個分類的商品
			$cat_pro = $conn->GetRow('select * from '.PREFIX."products where class like '%".$v["id"]."%'");
			if ($cat_pro)
			foreach ($cat_pro as $k=>$v){
				$cat_pro[$v["id"]] = $v['name'];
			}
			
			//--所有產品
			$allpro = $conn->GetArray("select * from ".PREFIX."products where id in (".str_replace('|__|',',',$data['one']['detail']).")");
			if ($allpro)
			foreach ($allpro as $k=>$v){
				$pic = explode('|__|',$v["pic"]);
				$data["one"]["add_all"][$v['id']] = $v;
				$data["one"]["add_all"][$v['id']]["pic"] = $pic[0];
				$op[$v['id']] = array('id'=>$v['id'],'name'=>$v['name'],'pic'=>$pic[0]);
			}

			$data["one"]["add_all"] = json_encode($op);
			
			$data["close"]["pic"] = '1';
			$data["order_html"] .= '<tr><td align="right">活動產品:</td><td><select id="pro">'.Make_list($pro_array,'').'</select><select id="pro_data">
			<option value="">請選擇商品</option>'.Make_list($cat_pro,'').'</select><input type="button" value="加入商品列表" onclick="todiv()"><br><div id="addlist"></div></td></tr>
			<script>
			$(document).ready(function (){
				for (aa in reponse) {
					todiv(reponse[aa].id);
				}
			});
			</script>
			';
			$data["order_html"] .= '<tr><td align="right">活動商品數量:</td><td><input type="text" name="memo" value="'.$data["one"]["memo"].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">活動商品折扣:</td><td><input type="text" name="memo_1" value="'.$data["one"]["memo_1"].'"> (請輸入百分比折扣或者組合多少錢) EX:8折=20%,兩件399=399</td></tr>';
			$data["order_html"] .= '<tr><td align="right">活動描述:</td><td>'.Fck("memo_2",'90%','450','../fckeditor/',$data["one"]["memo_2"]).'</td></tr>';
		break;
		
		/*現金折抵*/
		case "active_desh":
				$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
				$data["order_html"] .= '<tr><td align="right">活動時間:</td><td>
							<input type="text" name="active_on_date" value="'.$data["one"]["active_on_date"].'"> - <input type="text" name="active_off_date" value="'.$data["one"]["active_off_date"].'">
							</td></tr><script>'."Datepick('[name=\"active_on_date\"]',\"\",\"yyyy-mm-dd\");Datepick('[name=\"active_off_date\"]',\"\",\"yyyy-mm-dd\");</script>";
				$data["order_html"] .= '<tr><td align="right">現折:</td><td>
							滿<input type="text" name="detail[]" value="'.$data["one"]["detail"][0].'">元<br>
							折抵<input type="text" name="detail[]" value="'.$data["one"]["detail"][1].'">元
							</td></tr>';
				$data["close"]["pic"] = '1';
				$data["button"]["pick_product"]='1';
				$tree_data_type=display_tree('1',$conn,PREFIX.'category');	//-分類資料
				
				//---取出分類資料----
				if ($tree_data_type)
				foreach($tree_data_type as $item){
						$aa[$item['id']] = $item['show_text'];
				}
				$data["one"]["prolist"]=create_select("prolist",$aa,NULL,'1',"根目錄");//--加價購選單
				
				//----商品資料
				if ($data["one"]["add_pic"]!=NULL&&$data["one"]["add_pic"]!='') $add_pic = explode('|__|',$data["one"]["add_pic"]);
				if ($data["one"]["add_pro"]!=NULL&&$data["one"]["add_pro"]!='')	$add_pro = explode('|__|',$data["one"]["add_pro"]);
				if (is_array($add_pro))
				foreach ($add_pro as $k=>$v){
					$data["one"]["add_all"][$k]["pic"] = $add_pic[$k];
					$data["one"]["add_all"][$k]["id"] = $add_pro[$k];
					$temp = $conn->GetRow("SELECT * FROM ".PREFIX."products WHERE id='".$add_pro[$k]."'");
					$data["one"]["add_all"][$k]["name"] = $temp['name'];
				}
				$data["one"]["add_all"] = json_encode($data["one"]["add_all"]);
		break;
		
		
		
		default:

		break;
	}
	
}
else//列表頁
{
	
	//--判斷有母類別參數
	switch ($_GET["class"]){
		default:

		break;
	}
	
}




$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);


$data["file_url"] = $cpos["file_url"];
include_once("index.php");//assign 所有資料、共用頁面

$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





