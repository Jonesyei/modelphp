<?php
include_once("../includes/main_back_inc.php");
/*
$data["button"]["href"]='1'; //--上傳圖片後連結網址開關
*/
$include = true;//不讓 index.php display的參數

$cpos["pagecount"] = 10; //每頁顯示筆數
$cpos["table"] = PREFIX."data_list";
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

if ($_FILES)
switch ($_GET["class"]){
	case "history_case": //--CSV匯入
	$excel_array = array('b_name','detail');
	$filename = $_FILES["file"]["tmp_name"];
	//判斷是否有該檔案
	if(file_exists($filename)){
		$file = fopen($filename, "r");
		if($file != NULL){
			//當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
			foreach ($excel_array as $k=>$v) $_POST[$v]=NULL;
				
			while (!feof($file)) {
				$str_array = explode(',',fgets($file));
				foreach ($str_array as $k=>$v){
					if ($v!=NULL)
					$_POST[$excel_array[$k]][]=iconv("BIG5","UTF-8",str_replace('"','',$v));
				}
			}
			fclose($file);
		}
	}
	break;
}


switch ($_GET["class"]){
	case "c_about":
		$cpos["tablelistwhere"] .= " and b_name='".$_GET["tp"]."'";
		if ($_GET["parent_id"]) 
			$cpos["tablelistwhere"] .= " and parent_id='".$_GET["parent_id"]."'"; //--有母類別的話
		else
			$cpos["tablelistwhere"] .= " and parent_id is null"; //--有母類別的話
	break;
	case "c_form":
		$cpos["tablelistwhere"] .= " and b_name='".$_GET["tp"]."'";
	break;
	case "c_EDM":
		$cpos["tablelistwhere"] .= " and b_name='".$_GET["tp"]."'";
		$cpos["tablewhere"] .=  " and b_name='".$_GET["tp"]."'";
	break;
}


include_once("centerpoes.php");

switch ($_GET["class"])
{
	default:
		$data["uploadfilemax"] = 50;//圖檔上傳上限	
	break;
}

//---解魔術引號 以及替換文字函數
function pg_change($value){
	if (is_array($value))
	foreach ($value as $k=>$v){
		$v = str_replace('"',"'",$v);
		$pri[$k] = deQuotes($v,-1);
	}
	return $pri;
}




//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["pic_size_title"] = "任意比例";
	
	$data["one"]["pic"] = explode('|__|',$data["one"]["pic"]);
	//計算圖片總數並判斷第一個是否為空值  空值等於 目前有的數量為0
	$temp_pic_count = 0;
	foreach ($data["one"]["pic"] as $k=>$v){
		if ($v!=NULL && $v!=''){
			$temp_pic_count +=1;
		}
	}
	//$data_pic_count = $temp_pic_count;
	

	//-----語系為ch 使用的switch
	//if ($_SESSION["admin_info"]["lang"]=='ch')
	switch ($_GET["class"]){
		case "EDM":
				$data["button"]["watermark"]["act"] = '1';
				$data["button"]["watermark"]["pic"] = '../images/instagram.png';
				
				$data["one"]["name"] = "首頁EDM";
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				
				$data["one"]["file"] = explode('|__|',$data["one"]["file"]);
				$data["one"]["file_name"] = explode('|__|',$data["one"]["file_name"]);
				$data["button"]["file"]='10';
				
				//$data["button"]["href"]='1';				
				//$data["uploadfilemax"] = 3-$data_pic_count;//圖檔上傳上限
		break;
		case "index":
				$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				$data["one"]["name"] = pg_change($data["one"]["name"]);
				$data["uploadfilemax"] = 5-$data_pic_count;//圖檔上傳上限	
				$data["order_html"] = '<tr><td align="right">右下方文字內容:</td><td><input type="text" name="name[]" value="'.$data["one"]["name"][0].'" size="70"></td></tr>';
				$data["order_html"] .= '<tr><td align="right">中上方文字內容:</td><td><input type="text" name="name[]" value="'.$data["one"]["name"][1].'" size="70"></td></tr>';
		break;
		case "color":
				$data["close"]["pic"] ='1';
				$data["order_html"] .= '<tr><td align="right">顏色:</td><td><input type="text" name="detail" value="'.$data["one"]["detail"].'" maxlength="7"></td></tr>';
		break;
		case "about":
				$data["close"]["pic"] ='1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
		break;
		case "service":
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
		case "qa":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
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
		
		case "about_design":
		case "ac":
		case "foor":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
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
		case "files_main":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
				if ($data["one"]["floor"]=="1") 
					$str_true = "checked";
				else
					$str_false = "checked";
				$data["order_html"] .= '<tr><td align="right">是否為下版內容:</td><td><input type="radio" name="floor" value="1" '.$str_true.'>是<input type="radio" name="floor" value="0" '.$str_false.'>否</td></tr>';
		break;
		
		case "mode_background":
		case "mode_pic":
			$data["uploadfilemax"] = 1-$data_pic_count;//圖檔上傳上限	
			$temp_array = array('big'=>'大','mid'=>'中','sml'=>'小');
			$data["order_html"] .= '<tr><td align="right">底板大小:</td><td><select name="class">'.Make_list($temp_array,$data["one"]["class"]).'</select></td></tr>';
			$temp_array1 = array('0'=>'直向','1'=>'橫向');
			$data["order_html"] .= '<tr><td align="right">呈現方式:</td><td><select name="class2">'.Make_list($temp_array1,$data["one"]["class2"]).'</select></td></tr>';
		break;
		
		case "bannerright":
			$data["uploadfilemax"] = 3-$data_pic_count;//圖檔上傳上限	
			$data["button"]["href"]='1';
			$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
		break;
		case "bannerleft":
			$data["uploadfilemax"] = 4-$data_pic_count;//圖檔上傳上限	
			$data["button"]["href"]='1';
			$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
		break;
		
		case "gpic":
		case "classic":
			$data["uploadfilemax"] = 5-$data_pic_count;//圖檔上傳上限	
			$data["button"]["href"]='1';
			$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
			$data["button"]["name"]='名稱';
			$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
		break;

		case "Customization":
			$data["close"]["pic"] = '1';
			$data["button"]["detail"]='1';
			$data["button"]["fck"]='1';
			//$data["order_html"] .= '<tr><td align="right">說明標題:</td><td><input type="text" name="name" value="'.$data["one"]["name"].'" size="100"></td></tr>';
		break;
		
		case "gp":
			$data["uploadfilemax"] = 1-$data_pic_count;//圖檔上傳上限	
			$data["button"]["detail"]='1';
			$data["button"]["fck"]='1';
			$data["order_html"] = '<tr><td align="right">連結:</td><td><input type="text" name="href" value="'.$data["one"]["href"].'" size="100"></td></tr>';
		break;

		case "work":
			$data["uploadfilemax"] = 9000-$data_pic_count;//圖檔上傳上限	
			$data["button"]["name"]='作品名稱';
			$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
		break;
		
		case "memberdesh":
			$data["close"]["pic"] = '1';
			$data["one"]["memo"] = explode('|__|',$data["one"]["memo"]);
			$data["order_html"] .= '<tr><td align="right">類型別名:</td><td><input type="text" name="new_type" value="'.dequotes($data["one"]["new_type"],-1).'" disabled="disabled"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">折扣率:</td><td><input type="text" name="detail" value="'.dequotes($data["one"]["detail"],-1).'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">到達紅利限制:</td><td><input type="text" name="memo[]" value="'.dequotes($data["one"]["memo"][0],-1).'"> - <input type="text" name="memo[]" value="'.dequotes($data["one"]["memo"][1],-1).'"></td></tr>';
		break;
		
		case "one_product":
			$data["close"]["pic"] = '1';
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$data["order_html"] .= '<tr><td align="right">大底板售價:</td><td><input type="text" name="detail[]" value="'.dequotes($data["one"]["detail"][0],-1).'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">中底板售價:</td><td><input type="text" name="detail[]" value="'.dequotes($data["one"]["detail"][1],-1).'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">小底板售價:</td><td><input type="text" name="detail[]" value="'.dequotes($data["one"]["detail"][2],-1).'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">色豆片售價:</td><td><input type="text" name="detail[]" value="'.dequotes($data["one"]["detail"][3],-1).'"></td></tr>';
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
		
		case "set_pro":
			$data["close"]["pic"] = '1';
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$status_html = array('1'=>'開啟','0'=>'關閉');
			$data["order_html"] .= '<tr><td align="right">別名:</td><td><input type="text" name="b_name" value="'.$data["one"]["b_name"].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">紅利功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][0]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">尺寸庫存功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][1]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">優惠折扣功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][2]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">圖片上傳功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][3]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">商品圖片限制:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][4].'" size="3"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">加價購功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][5]).'</select></td></tr>';
			$temp = $conn->GetArray("select * from ".PREFIX."category where parent_id='0' and lang='".LANG."'");
			foreach ($temp as $k=>$v){
				$temp_array[$v["id"]] = $v["name"];
			}
			$data["order_html"] .= '<tr><td align="right">對應分類模組:</td><td><select name="detail[]">'.Make_list($temp_array,$data["one"]["detail"][6]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">分頁筆數:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][7].'" size="3"></td></tr>';
		break;
		
		case "set_about":
			//---設定區域
			$data["close"]["pic"] = '1';
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$status_html = array('1'=>'開啟','0'=>'關閉');
			$data["order_html"] .= '<tr><td align="right">別名:</td><td><input type="text" name="b_name" value="'.$data["one"]["b_name"].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">圖片上傳功能:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][0]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">商品圖片限制:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][1].'" size="3"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">階層數:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][2].'" size="3"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">分頁筆數:</td><td><input type="text" name="detail[]" value="'.$data["one"]["detail"][3].'" size="3"></td></tr>';
			//--欄位區域
			$data["one"]["b_value"] = explode('|__|',$data["one"]["b_value"]);
			$data["one"]["memo"] = explode('|__|',$data["one"]["memo"]);
			$data["one"]["new_type"] = explode('|__|',$data["one"]["new_type"]);
			$txt_type = array('1'=>'一般文字輸入框','2'=>'多行文字輸入框','3'=>'編輯器物件');
			if (count($data["one"]["b_value"])>0 && $data["one"]["b_value"][0]!='' && $data["one"]["b_value"]!=NULL)
			foreach ($data["one"]["b_value"] as $k=>$v){
				$temp = '<div>欄位名稱:<input type="text" name="b_value[]" value="'.$data["one"]["b_value"][$k].'"><br>
				鍵值(英文 勿重複):<input type="text" name="memo[]" value="'.$data["one"]["memo"][$k].'"><br>
				類別:<select name="new_type[]">'.Make_list($txt_type,$data["one"]["new_type"][$k]).'</select><br>
				<input type="button" value="刪除欄位" onclick="del_memo(this);">
				</div>';
				$temp_memo .= $temp;
			}
			$data["order_html"] .= '<tr><td align="right">自定義欄位:</td><td id="td_meo"><input type="button" value=" 新增輸入欄位 " onclick="create_memo()">'.$temp_memo.'</td></tr>';
			$data["order_html"] .= '<script>function del_memo(obj){$(obj).parent().remove();}</script>';//--刪除JS語法
			$data["order_html"] .= '<script>function create_memo(){$(\'#td_meo\').append(\'<div>欄位名稱:<input type="text" name="b_value[]" value="'.$data["one"]["b_value"][$k].'"><br>				鍵值(英文 勿重複):<input type="text" name="memo[]" value="'.$data["one"]["memo"][$k].'"><br>類別:<select name="new_type[]">'.Make_list($txt_type,$data["one"]["new_type"][$k]).'</select><br>				<input type="button" value="刪除欄位" onclick="del_memo(this);"></div>\')}</script>';//--新增JS
			$data["order_html"] .= '<script>$(document).ready(function (){
									$( "#td_meo" ).sortable( {items: \'div\'} );
									$( "#td_meo" ).disableSelection();})</script></tr>';
		break;
		
		case "c_about":
			$class = $_GET["tp"];
			$check_data = $conn->GetRow("select * from ".PREFIX."data_list where type='set_about' and b_name='".$class."'");
			if ($check_data){
				$check_data["b_value"] = explode('|__|',$check_data["b_value"]);
				$check_data["memo"] = explode('|__|',$check_data["memo"]);
				$check_data["new_type"] = explode('|__|',$check_data["new_type"]);
				$check_data["detail"] = explode('|__|',dequotes($check_data["detail"],-1));
				//---欄位資料
				foreach ($check_data["b_value"] as $k=>$v){
					switch ($check_data["new_type"][$k]){
						case "3":
							$temp_html = Fck($check_data["memo"][$k],'90%','450','../fckeditor/',deQuotes($data["one"][$check_data["memo"][$k]],-1),"../../style/".$style.".css");
						break;
						case "2":
							$temp_html = '<textarea name="'.$check_data["memo"][$k].'" rows="10" cols="50">'.$data["one"][$check_data["memo"][$k]].'</textarea>';
						break;
						case "1":
							$temp_html = '<input type="text" name="'.$check_data["memo"][$k].'" value="'.$data["one"][$check_data["memo"][$k]].'">';
						break;
					}
					$data["order_html"] .= '<tr><td align="right">'.$v.':</td><td>'.$temp_html.'</td></tr>';
				}
				
				//--圖片上傳設定
				if ($check_data["detail"][0]!='1') $data["close"]["pic"] = '1';
				$data["uploadfilemax"] = $check_data["detail"][1]*1-$data_pic_count;//圖檔上傳上限	
			}
			$data["button"]["detail"] = '0';
			$data["order_html"] .='<input type="hidden" name="b_name" value="'.$class.'">';
			
			//--判斷有母類別參數
			if ($_GET["parent_id"]){
				$temp = $conn->GetRow("select * from ".PREFIX."data_list where type='c_about' and b_name='".$class."' and id='".$_GET["parent_id"]."'");
				if ($temp && $temp["depth"]*1<$check_data["detail"][2]*1){
					$data["order_html"] .='<input type="hidden" name="parent_id" value="'.$_GET["parent_id"].'">';
					$data["order_html"] .='<input type="hidden" name="depth" value="'.($temp["depth"]*1+1).'">';
				}else{
					alert('已是目錄底層無法建立項目!!',-1);
					exit;
				}
			}
			
		break;
	
		case "set_form":
			$data["close"]["pic"] = '1';
			$data["order_html"] .= '<tr><td align="right">別名:</td><td><input type="text" name="b_name" value="'.$data["one"]["b_name"].'"></td></tr>';
			if ($data["one"]) {
				$data["order_html"] .= '<tr><td align="right">表單基本裝載語法:</td><td>&lt;form id="form" action="_form_mail.php" method="post"&gt;<br> [表單內容]<br> &lt;/form&gt;<br>({$form.'.$data["one"]["b_name"].'.script})</tr>';
			}else{
				$data["order_html"] .= '<tr><td align="right">:</td><td><input type="text" name="b_name" value="'.$data["one"]["b_name"].'"></td></tr>';
			}
		break;
		
		case "c_form":
			$data["close"]["pic"] = '1';
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$txt_type = array('1'=>'文字方框 (text)','2'=>'密碼欄位 (password)','3'=>'下拉式方塊 (select)','4'=>'文字輸入方塊 (textarea)','5'=>'單選按鈕 (radio)','6'=>'核取方塊 (checkbox)');
			$data["order_html"] .= '<input type="hidden" name="b_name" value="'.$_GET["tp"].'">';
			$data["order_html"] .= '<tr><td align="right">欄位鍵值(唯一值):</td><td><input type="text" name="memo" value="'.$data["one"]["memo"].'">(物件賦予 id 值 以及 name 值)</td></tr>';
			$data["order_html"] .= '<tr><td align="right">作用模式:</td><td><select name="new_type">'.Make_list($txt_type,$data["one"]["new_type"]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">多項目輸入:</td><td><input type="text" name="b_value" size="100" value="'.$data["one"]["b_value"].'"><br>(適用於 下拉式方塊、單選按鈕、核取方塊 使用半型,(逗)號區隔)</td></tr>';
			$data["order_html"] .= '<tr><td align="right">驗證規則:</td><td><textarea name="detail[]" cols="100" rows="20">'.dequotes($data["one"]["detail"][0],-1).'</textarea>(非必要留白即可)</td></tr>';
			$data["order_html"] .= '<tr><td align="right">驗證規則說明:</td><td><textarea name="detail[]" cols="100" rows="20">'.dequotes($data["one"]["detail"][1],-1).'</textarea>(非必要留白即可)</td></tr>';
			$data["order_html"] .= '<tr><td align="right">前端呈現方式:</td><td>範例:({$form.'.$_GET["tp"].'.[欄位鍵值]_output_obj_html})';
			if ($data["one"]["id"]) {
				$data["order_html"] .= '<br>實際:({$form.'.$_GET["tp"].'.'.$data["one"]["memo"].'_output_obj_html})</td></tr>';
			}
		break;
		
		case "set_edm":
			$data["close"]["pic"] = '1';
			$status_html = array('1'=>'開啟','0'=>'關閉');
			$data["one"]["detail"] = explode('|__|',$data["one"]["detail"]);
			$data["order_html"] .= '<tr><td align="right">別名:</td><td><input type="text" name="b_name" value="'.$data["one"]["b_name"].'"></td></tr>';
			$data["order_html"] .= '<tr><td align="right">圖片數量限制:</td><td><input type="text" name="b_value" size="3" value="'.$data["one"]["b_value"].'"><br></td></tr>';
			$data["order_html"] .= '<tr><td align="right">啟用附加連結:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][0]).'</select></td></tr>';
			$data["order_html"] .= '<tr><td align="right">啟用附加文字內容:</td><td><select name="detail[]">'.Make_list($status_html,$data["one"]["detail"][1]).'</select></td></tr>';
			
		break;
		
		case "c_EDM":
			$data["order_html"] .= '<input type="hidden" name="b_name" value="'.$_GET["tp"].'">';
			$check_data = $conn->GetRow("select * from ".PREFIX."data_list where type='set_edm' and b_name='".$_GET["tp"]."' and status=1");
			$data["uploadfilemax"] = $check_data["b_value"]-$data_pic_count;//圖檔上傳上限
			$check_data["detail"] = explode('|__|',$check_data["detail"]);
			
			//是否啟用連結
			if ($check_data["detail"][0]=='1'){
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				$data["button"]["href"]='1';				
			}
			
			//是否啟用 標題
			if ($check_data["detail"][1]=='1'){
				$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
				$data["button"]["name"]='標題';				
			}
		break;
		
		default:

		break;
	}
	
}
else//列表頁
{
	/* 匯入設定
		$data["input_title"] = array('分類','創意商品名稱','產品分類編號','列表圖片','上板內容以及商品內容 兩個資料用|__|分開','啟用狀態'); //-顯示在選單中的標題
		$data["input_row"] = array('type','name','class','title_pic','detail','status'); //-對應資料欄位
		$data["input_sample"] = '<font color="blue">範例檔案下載:</font><a href="test.csv">下載</a>'; //-範例檔案下載
		$data["cpos"] = $cpos;
		$close["insert"] =0;
	*/
	
	//--判斷有母類別參數
	switch ($_GET["class"]){
		case "c_about":
			$class = $_GET["tp"];
			$check_data = $conn->GetRow("select * from ".PREFIX."data_list where type='set_about' and b_name='".$class."'");
			if ($check_data){
				$check_data["b_value"] = explode('|__|',$check_data["b_value"]);
				$check_data["memo"] = explode('|__|',$check_data["memo"]);
				$check_data["new_type"] = explode('|__|',$check_data["new_type"]);
				$check_data["detail"] = explode('|__|',dequotes($check_data["detail"],-1));
				
				if($data["list"])
				foreach ($data["list"] as $k=>$v){
					if ($v["depth"]*1<$check_data["detail"][2]*1-1){
						$data["list"][$k]["name"] .= '<a href="about.php?class='.$_GET["class"].'&tp='.$class.'&parent_id='.$v["id"].'" ><font color="red" > [ 進入目錄 ] </font></a>';
					}
				}
			}
		break;
	}
	
}


//---動態加載
if ($_GET["ajax"]){
	$temp_str = '';
	$_SESSION["admin_info"]["page"] = str_replace('&ajax=1','',$_SESSION["admin_info"]["page"]);
	if ($data["list"])
	foreach ($data["list"] as $k=>$v){
		$temp_str .= '
<tr class="tr_sort" title="可拖曳進行排序" bgcolor="#FFFFFF">
      <td align="right"><input type="checkbox" id="choose_id" value="'.$v["id"].'" name="choose_id"></td>
 
	  
	  <td><a href="'.$_SESSION["admin_info"]["page"].'&id='.$v["id"].'">'.$v["name"].'</a></td>
	  
  
	<td>
		  <input type="text" name="sort_'.$v["id"].'" id="sort_'.$v["id"].'" size="2" value="'.$v["sort"].'" onmouseup="sort_act=2" onmousedown="sort_act=2">  
		  </td>
	
	  
	  <td><input name="status_'.$v["id"].'" type="radio" value="1" checked="checked">開啟<input name="status_'.$v["id"].'" type="radio" value="0">關閉</td>
	  
	  <td>'.$v["create_name"].' 於 '.$v["create_date"].'</td>
	  
	  <td>'.$v["upadate_name"].' 於 '.$v["update_date"].'</td>

</tr>';
	}
	echo $temp_str;
	exit;
}





$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);


$data["file_url"] = $cpos["file_url"];
include_once("index.php");//assign 所有資料、共用頁面

$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





