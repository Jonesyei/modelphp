<?php
include_once("../includes/main_back_inc.php");
/*
$data["button"]["href"]='1'; //--上傳圖片後連結網址開關
*/
$include = true;//不讓 index.php display的參數


$cpos["pagecount"] = 10; //每頁顯示筆數
$cpos["table"] = PREFIX."language";
$cpos["tablewhere"] = 'id='.$_GET["id"];
$cpos["file_url"] = "../upload/".$_GET["class"]."/";
$cpos["fck_set"] = array('detail');
$cpos["listorderby"] = "sort";
//$cpos["re_img_w"] = '680'; //縮圖處理 寬 值  設定兩項才會執行縮圖處理
//$cpos["re_img_h"] = '440'; //縮圖處理 高 值


$cpos["tablesearch"] = 'name';//搜尋關聯欄位
$cpos["searchstatus"] = 'status';//搜尋狀態參照欄位


$close["add"]	= 0;
$close["del"]	= 0;
$close["edit"]	= 0;
$close["copy"]	= 1;
$close["sort"]  = 0;


include_once("centerpoes.php");

switch ($_GET["class"])
{
	default:
		$data["uploadfilemax"] = 50;//圖檔上傳上限	
	break;
}


//明細
if($_SESSION["admin_info"]["view"]=="detail")
{
	$data["pic_size_title"] = "任意比例";
	
	$data["one"]["pic"] = explode('|__|',$data["one"]["pic"]);
	//計算圖片總數並判斷第一個是否為空值  空值等於 目前有的數量為0
	if (($data["one"]["pic"][0]==NULL||$data["one"]["pic"][0]=='')&&count($data["one"]["pic"])<=1) $data_pic_count = 0; else $data_pic_count = count($data["one"]["pic"]);
	

	//-----語系為ch 使用的switch
	//if ($_SESSION["admin_info"]["lang"]=='ch')
	switch ($_GET["class"]){
		case "EDM":
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				$data["button"]["href"]='1';				
				//$data["button"]["detail"]='1';
				//$data["button"]["fck"]='1';
				$data["uploadfilemax"] = 4-$data_pic_count;//圖檔上傳上限	
		break;
		case "index":
				$data["one"]["name"] = explode('|__|',$data["one"]["name"]);
				$data["one"]["href"] = explode('|__|',$data["one"]["href"]);
				$data["one"]["name"] = pg_change($data["one"]["name"]);
				$data["uploadfilemax"] = 5-$data_pic_count;//圖檔上傳上限	
				$data["order_html"] = '<tr><td align="right">右下方文字內容:</td><td><input type="text" name="name[]" value="'.$data["one"]["name"][0].'" size="70"></td></tr>';
				$data["order_html"] .= '<tr><td align="right">中上方文字內容:</td><td><input type="text" name="name[]" value="'.$data["one"]["name"][1].'" size="70"></td></tr>';
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
				if ($data["one"]["name"]=='檔案規範'){
					$data["button"]["size"]["name"] = 'b_name';
					$data["button"]["size"]["value"] = 'b_value';
					$data["button"]["title"] = "項目內容";
					$data["button"]["width"] = ' style="width:45%;" ';
					///--資料
					$data["one"]["b_name"] = str_replace("'","\\'",$data["one"]["b_name"]);
					$data["one"]["b_value"] = str_replace("'","\\'",$data["one"]["b_value"]);
					$data["one"]["size_name"] = $data["one"]["b_name"];
					$data["one"]["size_value"] = $data["one"]["b_value"];
				}
		break;
		case "product":
				$data["button"]["file"] = 1;
				$data["button"]["size"]["name"] = 'size_name';
				$data["button"]["size"]["value"] = 'size_value';
				$detail = explode('|__|',deQuotes(@$data["one"]["detail"],-1));
				$data["uploadfilemax"] = 1-$data_pic_count;//圖檔上傳上限
				$data["order_html"] = '<tr><td align="right">產品分類:</td><td>'.create_select("class",$aa,$data["one"]["class"],'1',"根目錄").'</td></tr>';
				$data["order_html"] .= '<tr><td align="right">適用場合:</td><td>'.Fck("detail[0]",'90%','450','../fckeditor/',$detail[0]).'</td></tr>';
				$data["order_html"] .= '<tr><td align="right">產品說明:</td><td>'.Fck("detail[1]",'90%','450','../fckeditor/',$detail[1]).'</td></tr>';
		break;
		case "news":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
				$data["order_html"] .= '<tr><td align="right">消息分類:</td><td><select name="new_type">'.Make_list($_SETUP["new_tage"],$data["one"]["new_type"]).'</select></td>';
		break;
		
		case "foor":
				$data["close"]["pic"] = '1';
				$data["button"]["detail"]='1';
				$data["button"]["fck"]='1';
		break;
		case "history_case":
				$data["order_html"] .= '<tr><td align="right">文字內容匯入:</td><td><input type="file" name="file">(匯入前請先將圖片排序好存檔，並請轉存csv檔案使用) <a href="test.csv">範例格式下載</a></td>';
			//---物件陣列
				$data["pic_size_title"] = "820 x 620";
				foreach ($_SETUP["obj"] as $k=>$v){
					if ($data["one"][$k]) $data["one"][$k] = explode('|__|',$data["one"][$k]);
					if ($data["one"][$k]!=NULL&&$data["one"][$k]!='') {
						$data["button"]["other"][] = array('other_name'=>$v,'other_obj'=>$k,'other_data'=>$data["one"][$k]);
					}else{
						$data["button"]["other"][] = array('other_name'=>$v,'other_obj'=>$k);	
					}
					
				}
		break;
		default:
				$data["close"]["pic"]='1';
				$data["order_html"] = '<tr><td align="right">語系代碼:</td><td><input type="text" name="detail" value="'.$data["one"]["detail"].'"></td>';
		break;
	}
	
}
else//列表頁
{

}







$_SESSION["admin_info"]["search"]["status"] = '<option value="">選擇狀態</option>'.Make_list($_SETUP["status"],$_GET["s_status"]);


$data["file_url"] = $cpos["file_url"];
include_once("index.php");//assign 所有資料、共用頁面



$tpl->assign("content",ROOT_PATH.$admin_path."templates/".$page_name.".html");
$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>





