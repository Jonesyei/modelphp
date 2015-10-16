<?php
include_once("head.php");
//---驗證碼確認
if ($_GET["vcode"]){
	if(md5($_GET["vcode"])!=$_SESSION["__validate_code"])
	{
		echo '驗證碼錯誤!!';
	}else{
		$temp = $conn->GetRow("select * from ".PREFIX."member where account='".$_GET["account"]."' or email='".$_GET["email"]."'");
		if ($temp){
			echo '帳號或者email資料重複!!';
		}else{
			echo 'ok';
		}
	}
}

if ($_GET["test"]){
	if ($_SESSION["draw_array_total"]){
	$draw_array_total = $_SESSION["draw_array_total"];
	$pick_data = array();
	foreach ($draw_array_total["id_pick"] as $k=>$v){
			foreach ($v as $n =>$n1){
				if (!$pick_data[$n1]) $pick_data[$n1] = $_SETUP["color"][$n1];
				$pick_data[$n1]["count"] += (int) $draw_array_total["count_pick"][$k][$n]*1;

			}
	}
}



//sort($pick_data);
print_r($pick_data);
}

if ($_GET["cha"]){

	foreach ($_SESSION["temp_color_id_list"] as $k=>$v){
			foreach ($v as $n =>$n1){
				//$pick_data = $conn->GetRow("select * from ".PREFIX."products where id=".$n1);
				if (!$pick_data[$n1]) $pick_data[$n1] = $_SETUP["color"][$n1];
				$pick_data[$n1]["count"] += (int) $_SESSION["temp_color_count_list"][$k][$n]*1;
				$pick_data[$n1]["sort_id"] = $n1;
				/*
				$pick_data[$n1] = $_SETUP["color"][$n1];
				$pick_data[$n1]["count"] = $pick_data[$n1]["count"]*1+$_POST["count_pick"][$k][$n]*1;
				$pick_data[$n1]["sort_id"] = $n1;
				*/
			}
	}
	
	//--色彩取代
	foreach ($pick_data as $k=>$v){
		//--判斷來源是否數量小於 7
		if ($v["count"]*1 <=7){
			$temp[0]=9999999;	//目前誤差值
			$temp[1]=-1;		//誤差元素
			foreach ($pick_data as $n1=>$n2){
				//--只比對大於七的色塊
				$v_rgb = hextorgb($v["detail"]);
				$n2_rgb = hextorgb($n2["detail"]);
				if ($n2["count"]*1>7){
					$astemp = abs($v_rgb["R"]-$n2_rgb["R"])+abs($v_rgb["G"]-$n2_rgb["G"])+abs($v_rgb["B"]-$n2_rgb["B"]);
					$astemp += abs((abs($n2_rgb["R"]-$n2_rgb["B"])+abs($n2_rgb["B"]-$n2_rgb["G"])+abs($n2_rgb["G"]-$n2_rgb["R"]))-(abs($v_rgb["R"]-$v_rgb["B"])+abs($v_rgb["B"]-$v_rgb["G"])+abs($v_rgb["G"]-$v_rgb["B"])));
					if ($astemp < $temp[0]){
						$temp[0] = $astemp;
						$temp[1] = $n1;
					}
				}
			}
			if ($temp[1]!=-1) {
				$pick_data[$k]["change"] = $temp[1];
				$pick_data[$temp[1]]["count"] += $v["count"]*1;
			}
		}
	}
	
	foreach ($pick_data as $k=>$v){
		if (!is_null($v["change"])){
			$output[] = array('name'=>$v["name"],'change'=>$pick_data[$v["change"]]["sort_id"],'sort_id'=>$v["sort_id"],'count',$v["count"]);

		}
	}
	//$_SESSION["sss"] = array($_POST["id_pick"],$_POST["count_pick"]);

	print_r($pick_data);
}

if ($_GET["ds"]){
	print_r($_SESSION["draw_array_total"]);
}

if ($_GET["dl"]){
	print_r($_SESSION["temp_color_id_list"]);
	print_r($_SESSION["temp_color_count_list"]);
}

if ($_GET["class"]){
			$dps = $conn->GetRow("select * from ".PREFIX."data_list where id='".$_GET["class"]."'");// 相本

			$data["album"] = explode('|__|',$dps["pic"]);

		echo json_encode($data["album"]);
}


if ($_GET["take"]){
	$file_url = 'upload/'.$array[$_GET["take"]].'/';
		$dps = $conn->GetArray("select * from ".PREFIX."data_list where type='".$array[$_GET["take"]]."' Limit ".$_GET["start"].",".$_GET["count"]);// 相本
		//---高解析度相片處理
		foreach ($dps as $k=>$v){
			$img = ImageResize($file_url.$dps[$k]["file"], $file_url.$dps[$k]["file"],400,300);
		}		
		echo json_encode($dps);
}


if ($_GET["album_img"]!=NULL && $_GET["id"]!=NULL){
	$sql = "select * from ".PREFIX."data_list where followid='".$_GET["fid"]."' and nerk='".$_GET["id"]."'";
	$dps = $conn->GetRow($sql);// 區域相本
	if (!$dps) {
		echo $sql;
	}else{
		if ($dps["pic"]!=NULL&&$dps["pic"]!='') $dps["pic_array"] = explode('|__|',$dps["pic"]);
		echo json_encode($dps);
	}
}



if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
// Get the data
$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];

// Remove the headers (data:,) part.
// A real application should use them according to needs such as to check image type
$filteredData=substr($imageData, strpos($imageData, ",")+1);

// Need to decode before saving since the data we received is already base64 encoded
$unencodedData=base64_decode($filteredData);

//echo "unencodedData".$unencodedData;

// Save file. This example uses a hard coded filename for testing,
// but a real application can specify filename in POST variable
$fp = fopen('upload/'.date('YmdHis').'.png','wb');
fwrite( $fp, $unencodedData);
fclose( $fp );
}


//--儲存切割影像
if ($_POST["data_img"]){
	//$img = str_replace('data:image/png;base64,', '', $img);
	$img = preg_replace('/^data:image\/(png|jpg);base64,/','',$_POST["data_img"]);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = "upload/pickimg/".strtotime(date('Y-m-d H:i:s')).rand(10,99).'.png';
	$success = file_put_contents($file, $data); 
	//$output = ($success) ? '<img src="'. $file .'" alt="Canvas Image" />' : '<p>Unable to save the file.</p>';
	$_SESSION["draw_array"][$_POST["dml"]][] = array("filename"=>$file,"data"=>$_POST["data_list"]);
}
//---重置參數
if ($_POST["data_img_set_null"]){
	unset($_SESSION["draw_array"]);
	$_SESSION["draw_array_total"] = array();
	unset($_SESSION["temp_color_id_list"]);
	unset($_SESSION["temp_color_count_list"]);
	
}
//---記錄統計資料
if ($_POST["total_pick"] && $_POST["total_pick"]["id_pick"]){
	//$_SESSION["draw_array_total"] = $_POST["total_pick"];
	$_SESSION["draw_array_total"]["id_pick"] = json_decode($_POST["total_pick"]["id_pick"],true);
	exit;
	//--因資料過大 存到資料庫中
	$_SESSION["draw_array_total"]["id_pick"] = Auto_id($conn,'temp'); //--給予變數 存放的位置
	unset($temp);
	$temp["data"] = json_encode($_POST["total_pick"]["id_pick"]);
	$temp["Active_date"] = date("Y-m-d H:i:s",mktime()+86400);//作用時間 一天秒數
	$am = $conn->AutoExecute('temp',$temp,"INSERT");
}
if ($_POST["total_pick"] && $_POST["total_pick"]["count_pick"]){
	//$_SESSION["draw_array_total"] = $_POST["total_pick"];
	$_SESSION["draw_array_total"]["count_pick"] = json_decode($_POST["total_pick"]["count_pick"],true);
	exit;
	//--因資料過大 存到資料庫中
	$_SESSION["draw_array_total"]["count_pick"] = Auto_id($conn,'temp'); //--給予變數 存放的位置
	unset($temp);
	$temp["data"] = json_encode($_POST["total_pick"]["count_pick"]);
	$temp["Active_date"] = date("Y-m-d H:i:s",mktime()+86400);//作用時間 一天秒數
	$am = $conn->AutoExecute('temp',$temp,"INSERT");
}


/*---資料快取ajax
須將來源資料先包起來
資料檢核
table+where+now
*/

if (is_array($_POST["get_data"])){
	$check_table = array('member','shopping_car','shopping_car_list','admin','admin_group'); //--限制讀取的資料表
	$db = base64_decode($_POST["get_data"]["table"]);
	$where = base64_decode($_POST["get_data"]["where"]);
	
	//----判斷是否讀取限制資料表
	if (in_array($db,$check_table)){
		echo json_encode('Insufficient permissions'); //--權限不足
		exit;
	}
	
	$sql = "select * from ".PREFIX.$db." where ".$where;
	$am = $conn->GetArray($sql);
	if ($am){
		echo json_encode($am);
	}else{
		echo json_encode('false');
	}
	exit;
}

if($_POST["session_data"]){
	echo json_encode($_SESSION[base64_decode($_POST["session_data"]["name"])]);
	exit;
}


if ($_GET["color_list"]){
	//$product = $conn->GetArray("select * from ".PREFIX."data_list where status=1 and type='color'");
	$temp_array = $_SETUP["color"];
	foreach ($temp_array as $k => $v){
		$product[$k]["id"] = $k;
		$product[$k]["detail"] = $v["detail"];
		$product[$k]["name"] = $v["name"];
	}

	foreach ($product as $k=>$v){
		$v["detail"] = explode('#',$v["detail"]);
		if (count($v["detail"])<=1){
			$v["detail"] = strtoupper($v["detail"][0]);
		}else{
			$v["detail"] = strtoupper($v["detail"][1]);
		}
		
		//--色彩轉換hex 轉 rgb
		if (strlen($v["detail"])>3){
        	list( $r, $g, $b ) = array( $v["detail"][0] . $v["detail"][1], $v["detail"][2] . $v["detail"][3], $v["detail"][4] . $v["detail"][5] );
		}else{
			list( $r, $g, $b ) = array( $v["detail"][0] . $v["detail"][0], $v["detail"][1] . $v["detail"][1], $v["detail"][2] . $v["detail"][2] );
		}
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        $v["R"] = $r;
        $v["G"] = $g;
        $v["B"] = $b;
		$product[$k] = $v;
	}
	echo json_encode($product);
	exit;
}


///---設計頁訂單產生ajax
if ($_GET["sendorder"]){
	if ($_GET["test"]){
		print_r($_SESSION["output_pick"]);
		exit;
	}
	if ($_SESSION["output_pick"]){
		$pick_data = $_SESSION["output_pick"];
	}
	
	//--色彩重新比對
	
	//--售價資料
	$temp_data = $conn->GetRow("select * from ".PREFIX."data_list where type='one_product'");
	$temp_data["detail"] = explode('|__|',$temp_data["detail"]);
	$total = $temp_data["detail"][0]; //--預設都使用大底板的價錢 單價
	$pic_price = $temp_data["detail"][3]*1; //--色豆片一片售價
	
	//--底版商品
	$o_name = '大底板';
	$o_count = count($_SESSION["draw_array_total"]["id_pick"]);
	$o_value = $total;
	
	foreach ($pick_data as $k=>$v){
		if (is_null($v["change"])){
			
			if ($o_name!=NULL && $o_name!='') $o_name .= ',';
			$o_name .= $pick_data[$k]["name"];
			
			if ($o_count!=NULL && $o_count!='') $o_count .= ',';
			$o_count .= ceil($v["count"]/135);
			
			if ($o_value!=NULL && $o_value!='') $o_value .= ',';
			$o_value .= $pic_price;
			/*
			$txt .= $pick_data[$k]["name"].' X '.ceil($v["count"]/40).'片<br>';
			$totalcount += ceil($v["count"]/40);
			*/
		}
	}

	
	//--表單產生區塊
	$form_str .= '<form id="form1" action="shopping.php" target="_blank" method="post">';
	$form_str .= '<input type="hidden" name="name" value="'.$o_name.'">';
	$form_str .= '<input type="hidden" name="count" value="'.$o_count.'">';
	$form_str .= '<input type="hidden" name="value" value="'.$o_value.'">';
	$form_str .= '<input type="hidden" name="addoth" value="1">';
	$form_str .= '</form>';
	echo $form_str;
}

if ($_GET["change_color"]){

	foreach ($_SESSION["temp_color_id_list"] as $k=>$v){
			foreach ($v as $n =>$n1){
				//$pick_data = $conn->GetRow("select * from ".PREFIX."products where id=".$n1);
				if (!$pick_data[$n1]) $pick_data[$n1] = $_SETUP["color"][$n1];
				$pick_data[$n1]["count"] += (int) $_SESSION["temp_color_count_list"][$k][$n]*1;
				$pick_data[$n1]["sort_id"] = $n1;
				/*
				$pick_data[$n1] = $_SETUP["color"][$n1];
				$pick_data[$n1]["count"] = $pick_data[$n1]["count"]*1+$_POST["count_pick"][$k][$n]*1;
				$pick_data[$n1]["sort_id"] = $n1;
				*/
			}
	}
	
	//--色彩取代
	foreach ($pick_data as $k=>$v){
		//--判斷來源是否數量小於 7
		if ($v["count"]*1 <=7){
			$temp[0]=9999999;	//目前誤差值
			$temp[1]=-1;		//誤差元素
			foreach ($pick_data as $n1=>$n2){
				//--只比對大於七的色塊
				$v_rgb = hextorgb($v["detail"]);
				$n2_rgb = hextorgb($n2["detail"]);
				if ($n2["count"]*1>7){
					$astemp = abs($v_rgb["R"]-$n2_rgb["R"])+abs($v_rgb["G"]-$n2_rgb["G"])+abs($v_rgb["B"]-$n2_rgb["B"]);
					$astemp += abs((abs($n2_rgb["R"]-$n2_rgb["B"])+abs($n2_rgb["B"]-$n2_rgb["G"])+abs($n2_rgb["G"]-$n2_rgb["R"]))-(abs($v_rgb["R"]-$v_rgb["B"])+abs($v_rgb["B"]-$v_rgb["G"])+abs($v_rgb["G"]-$v_rgb["B"])));
					if ($astemp < $temp[0]){
						$temp[0] = $astemp;
						$temp[1] = $n1;
					}
				}
			}
			if ($temp[1]!=-1) {
				$pick_data[$k]["change"] = $temp[1];
				$pick_data[$temp[1]]["count"] += $v["count"]*1;
			}
		}
	}
	
	foreach ($pick_data as $k=>$v){
		if (!is_null($v["change"])){
			$output[] = array('name'=>$v["name"],'change'=>$pick_data[$v["change"]]["sort_id"],'sort_id'=>$v["sort_id"],'count',$v["count"]);

		}
	}
	//$_SESSION["sss"] = array($_POST["id_pick"],$_POST["count_pick"]);
	echo json_encode($output);
}



if ($_GET["color_store"]){
	$_SESSION["temp_color_id_list"][$_GET["color_store"]*1-1] = json_decode($_POST["id_pick"],true);
	$_SESSION["temp_color_count_list"][$_GET["color_store"]*1-1] = json_decode($_POST["count_pick"],true);
}


function hextorgb($value){
		$value = explode('#',$value);
		if (count($value)<=1){
			$value = strtoupper($value[0]);
		}else{
			$value = strtoupper($value[1]);
		}
		
		//--色彩轉換hex 轉 rgb
		if (strlen($value)>3){
        	list( $r, $g, $b ) = array( $value[0] . $value[1], $value[2] . $value[3], $value[4] . $value[5] );
		}else{
			list( $r, $g, $b ) = array( $value[0] . $value[0], $value[1] . $value[1], $value[2] . $value[2] );
		}
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        $v["R"] = $r;
        $v["G"] = $g;
        $v["B"] = $b;
		return $v;
}
?>