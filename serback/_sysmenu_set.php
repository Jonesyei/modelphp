<?php
include_once("../includes/main_back_inc.php");
$per_page_qty = 30;


$include = true;//不讓 index.php display的參數

//--amdin-----control
if ($_SESSION["admin_info"]["control"]!='0'){
	if ($_GET["id"]) alert('無權限異動選單分類!!',-1);
	$tpl->assign("content",ROOT_PATH.$admin_path."templates/_sysmenu_nocon.html");
}else{
	$tpl->assign("content",ROOT_PATH.$admin_path."templates/_sysmenu.html");
}


//--複製結構樹
if ($_GET["copy"]){
	include_once("_sysmenu_copy.php");
}
//--語系資料
$langehtml = $conn->GetArray("select * from ".PREFIX."language where detail!='".$_SESSION["admin_info"]["lang"]."'");
if ($langehtml)
	foreach ($langehtml as $k=>$v){
		$aa[$v['detail']] = $v["name"];
	}
$tpl->assign("langselect",create_select("class",$aa,'','',"選擇一個語系"));




$table = PREFIX."sysmenu";
$id = quotes($_GET["id"]);
$act = $_POST["act"];
$del_id = quotes($_GET["del_id"]);
$lang_sql = ' and lang ="'.$_SESSION["admin_info"]["lang"].'"';
if ($_POST)
foreach($_POST as $k => $v)
	$record[$k] = quotes($v);
	
	$sql = "select MAX(floor) from ".$table;//取得最大floor值
	$max_floor = $conn->GetRow($sql);
	$max_floor = $max_floor["0"];


	$sql = "select * from ".$table.' where 1=1'.$lang_sql;//撈出所有分類資料
	$all_class = $conn->GetArray($sql);


//批次修改全部
if($act=='all')
	include("update_all.php");



//按鈕修改排序
if(isset($_GET["sort_id"]) && isset($_GET["sort_set"]) )
{	
	$sort_id = $_GET["sort_id"];
	$sort_set = $_GET["sort_set"];
	
	
	
	//將被移動的該資料 放進 移動的sort目標
	$sql = "UPDATE ".$table." SET sort=".quotes($sort_set)." WHERE id=".quotes($sort_id);
	$conn->Execute($sql);

	
	$url = "";
	if(@$_GET)
	foreach($_GET as $k2=>$v2)
	{
		if( in_array($k2, array("sort_id","sort_set") ) ) continue;
		
		if($url=="") 
			$url .= "?".$k2."=".$v2;
		else
			$url .= "&".$k2."=".$v2;
	}
	
	LinkTo($url);
	exit;
}



//新增 更新 刪除 開始
if($act=='submit')
{
	if($id!=0)//修改
	{
		$sql = "select * from ".$table." WHERE lv='".quotes($record["parents"])."'".$lang_sql;//抓出打算移動前往的 母分類資料
		$tmp_parents = $conn->GetRow($sql);
		
		$sql = "select * from ".$table." WHERE id='".quotes($id)."'".$lang_sql;//抓出此筆之舊資料
		$self = $conn->GetRow($sql);

		if($record["parents"]=="0")//判斷是否為根目錄 不是的話便為 打算移動前往 的母分類下一層 = floor+1
			$record["floor"] = 0;
		else
			$record["floor"] = ( $tmp_parents["floor"] + 1 );
		
		//階層floor有變動  需要設定sort
		if($self["floor"]!=$record["floor"])
		{
			//抓取 打算移動前往位置的 階層 的所有筆資料 在同一層,同一母分類下
			$sql = "select * from ".$table." 
			WHERE floor='".quotes($self["floor"])."' 
			and parents='".quotes($self["parents"])."' 
			and sort > '".quotes($self["sort"])."'".$lang_sql;
			$tmp = $conn->GetArray($sql);
			//組合所有資料 id 對它們進行批次修改 sort
			foreach($tmp as $k=>$v)
				$id_str .= $v["id"].",";
			$id_str = substr($id_str,0,-1);
			
			$sql="UPDATE ".$table." SET sort=sort - 1 
				  WHERE id in (".$id_str.")";
			$conn->Execute($sql);
			$tmp = "";
			
			//判斷是否為根目錄
			if($record["parents"]!="0")
			{
				//不是根目錄
				$floor = $tmp_parents["floor"]+1;
				$parents = $tmp_parents["lv"];
				//計算 此floor階層此parents母分類下之 max sort 值
				$sql = "select MAX(sort) from ".$table." WHERE floor='".quotes($floor)."' and parents='".quotes($parents)."'".$lang_sql;
			}
			else
			{
				//是根目錄   計算 根目錄之 max sort 值
				$sql = "select MAX(sort) from ".$table." WHERE parents='0'".$lang_sql;
			}

			$tmp = $conn->GetRow($sql);
			$max_sort = $tmp["0"];
			$record["sort"] = ($max_sort + 1);//此筆資料本身 sort 設定完畢
		}
		
		//其分類下的子分類一起upd start
		$lv = $self["lv"];
		for($i = $self["floor"] ;$i<=$max_floor ; $i++)//一層一層尋找子分類 並upd
		{
			if($i==$self["floor"])//第一層直接執行
			{
				foreach($all_class as $k=>$v)
				{
					if($v["parents"]==$lv)
					{
						$lv_tmp .= $v["lv"].","; 
					}
				}
				$lv = substr($lv_tmp,0,-1);
				
				$child["floor"] = $record["floor"] + 1;
				$where = "lv in (".$lv.")";
				$conn->AutoExecute($table,$child,"UPDATE",$where);
				//echo $lv."<BR>";
			}
			else//第二層以後子分類 不斷loop這個模式尋找
			{
				if($lv)
				{
					$lv = explode(",",$lv);
					foreach($lv as $k=>$v)
					foreach($all_class as $k_2=>$v_2)
					{
						if($v == $v_2["parents"])
						{
							$lv_tmp .= $v_2["lv"].",";
							$lv_search .= $v_2["lv"].",";
						}
					}
					$lv = substr($lv_search,0,-1);// 將lv_search的值代入lv 再下次foreach迴圈再繼續尋找 這些lv的子分類
					$lv_search = "";
					
					$child["floor"] = $record["floor"] + 1 + $i - $self["floor"];
					$where = "lv in (".$lv.")";
					$conn->AutoExecute($table,$child,"UPDATE",$where);	
					//echo $lv."<BR>";
				}
			}
		}
		//其分類下的子分類一起upd end

		$where = "id=".$id;
		$conn->AutoExecute($table,$record,"UPDATE",$where);
		alert("修改完成",Page_get_url(''));
		exit;
	}
	else//新增
	{
		//判斷是否為根目錄 再對所屬之階層內的分類調整sort 全部sort+1
		if($record["parents"]!=0)
		{
			//不是根目錄
			$sql = "select * from ".$table." WHERE lv='".quotes($record["parents"])."'";//抓取所選擇母分類的資料
			$tmp = $conn->GetRow($sql);
	
			$floor = $tmp["floor"]+1;
			$parents = $tmp["lv"];
			$tmp = "";
			
			//upd 所選擇母分類下一層以及parents為此母分類之 所有 分類的 sort +1
			//$sql = "UPDATE ".$table." SET sort=sort + 1 WHERE floor='".quotes($floor)."' and parents='".quotes($parents)."'";
			//$conn->Execute($sql);
			
			$sql = " select MAX(sort) from ".$table." WHERE floor='".quotes($floor)."' and parents='".quotes($parents)."'";
			$tmp = $conn->GetRow($sql);
			$max_sort = ($tmp["0"] + 1);
			
			
			$record["floor"] = $floor;
		}
		else
		{
			//是根目錄
			//upd 根目錄所有 sort + 1
			//$sql = "UPDATE ".$table." SET sort=sort + 1 WHERE parents='0'";
			//$conn->Execute($sql);
			
			$sql = " select MAX(sort) from ".$table." WHERE floor='0' and parents='0'";
			$tmp = $conn->GetRow($sql);
			$max_sort = ($tmp["0"] + 1);
			
			$record["floor"] = "0";
		}
		$record["sort"] = $max_sort; //此筆資料本身 sort 設定完畢 =1
		
		//設定此筆資料本身之lv lv不可重覆 故先計算max lv 再依序往上累加
		$sql = "select MAX(lv) from ".$table;
		$tmp = $conn->GetRow($sql);
		$record["lv"] = ($tmp["0"] + 1);
		$record["lang"] = $_SESSION["admin_info"]["lang"]; //語系
		$conn->AutoExecute($table,$record,"INSERT");
		alert("新增完成",Page_get_url('id'));
		exit;
	}
}



//刪除
if($del_id)
{
	//先跳過此段 判斷要刪除的分類下層是否有子分類
	if($_GET["del"] == "sure")
	{
		$sql = " delete from ".$table." where id in (".quotes($del_id).")"; //刪除資料
		$conn->Execute($sql);
		
		if($_GET["del_list"])
		{
			$sql = " delete from ".$table." where lv in (".quotes($_GET["del_list"]).")"; //刪除子分類資料
			$conn->Execute($sql);
		}
		
		alert("刪除完成",Page_get_url('del_id,del_list,del'));
		exit;
	}

	$id = explode(",",$del_id);
	foreach($id as $id_k=>$id_v)
	{
		$all_lv="";
	
		$sql = "select * from ".$table." WHERE id='".quotes($id_v)."'";//抓出欲刪除之資料
		$self = $conn->GetRow($sql);
		
		//抓出其分類下的子分類 start
		$lv = $self["lv"];
		for($i = $self["floor"] ;$i<=$max_floor ; $i++)//一層一層尋找子分類 並upd
		{
			if($i==$self["floor"])//第一層直接執行
			{
				foreach($all_class as $k=>$v)
				{
					if($v["parents"]==$lv)
					{
						$lv_tmp .= $v["lv"].",";
						
						$del_list .= $v["lv"].",";

						$str = "";
						for($z=1;$z<=$v["floor"];$z++)	
							$str .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						$data[] = $v;
						$data[count($data)-1]["name"] = $str.$v["name"];
						$data[count($data)-1]["ifview"] = $_SETUP["status"][ $v["ifview"] ];
					}
				}
				$lv = substr($lv_tmp,0,-1);
				
				$all_lv .= $lv;
			}
			else//第二層以後子分類 不斷loop這個模式尋找
			{
				if($lv)
				{
					$lv = explode(",",$lv);
					foreach($lv as $k=>$v)
					foreach($all_class as $k_2=>$v_2)
					{
						if($v == $v_2["parents"])
						{
							$lv_tmp .= $v_2["lv"].",";
							$lv_search .= $v_2["lv"].",";
							
							$del_list .= $v_2["lv"].",";
							
							$str = "";
							for($z=1;$z<=$v_2["floor"];$z++)	
								$str .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							$data[] = $v_2;
							$data[count($data)-1]["name"] = $str.$v_2["name"];
							$data[count($data)-1]["ifview"] = $_SETUP["status"][ $v_2["ifview"] ];
						}
					}
					$lv = substr($lv_search,0,-1);// 將lv_search的值代入lv 再下次foreach迴圈再繼續尋找 這些lv的子分類
					$lv_search = "";
					
					$all_lv .= $lv;
				}
			}
		}
		//抓出其分類下的子分類 end
	}
	
	
	$del_list = substr($del_list,0,-1);
	$sql = "select * from ".$table." WHERE lv in (".$del_list.") order by parents,lv,sort";
	$data = "";
	$data = $conn->GetArray($sql);
	
	if($data)
	{
		foreach($data as $k=>$v)
		{
			$data[$k]["ifview"] = $_SETUP["status"][ $v["ifview"] ];
		}
	
		include_once("index.php");//assign 所有資料、共用頁面
	
		$tpl->assign("content",ROOT_PATH.$admin_path."templates/_sysmenu.html");
		$tpl->display(ROOT_PATH.$admin_path."templates/index.html");
		
		echo '<script>if(confirm(\'刪除此分類將會刪除底下所有子分類,確定要繼續嗎?\')==true){location=\'?del=sure&del_list='.$del_list.'&del_id='.$del_id.'\';}else{location=\''.Page_get_url('del_id').'\';}</script>';
		
		exit;
	}
	else
	{
		LinkTo("?del=sure&del_id=".$del_id);
		
		exit;
	}
	
	
	
}
//新增 更新 刪除 結束



//無限層分類制作
$html = Make_class($conn);


$sql = " select * from ".$table." WHERE 1=1 and ";

if($id || $id=='0')
{
	$sql .= " id=".$id;
	$data = $conn->GetRow($sql);
	$data["ifview"] = Make_radio($_SETUP["status"],$data["ifview"],"ifview");	

	$html = Make_class($conn,$data["lv"]);
	if ($html)
	foreach($html as $k => $v)
	{
		$str = "";
		for($i=0;$i<=$v["floor"]*5;$i++)
			$str .= "&nbsp;";
		
		if($id!='0'&&$data["parents"]!=$data["lv"]) //edit by Jones 沒資料比對時 nginx 會產生錯誤
		{
			if($html[$k]["lv"] == $data["parents"])
			{
				$list_html .= '<option value="'.$html[$k]["lv"].'" selected >'.$str.$html[$k]["name"].'</option>';
			}
			else
			{
				$list_html .= '<option value="'.$html[$k]["lv"].'" >'.$str.$html[$k]["name"].'</option>';
			}
		}
		else
		{
			$list_html .= '<option value="'.$html[$k]["lv"].'" >'.$str.$html[$k]["name"].'</option>';
		}
	}
	
	if($data["parents"]=="0")
		$bath = '<option value="0" selected>根目錄</option>';
	else
		$bath = '<option value="0" >根目錄</option>';
		
	$data["parents_list"] = '<select name="parents">'.$bath.$list_html.'</select>';

	if($id!=0)
	{
		$sql = "select * from ".$table." WHERE floor='".quotes($data["floor"])."' and ";
		if($data["floor"]!=0) $sql .= " parents='".quotes($data["parents"])."' and ";
		$sql .= " 1=1 and lang='".$_SESSION["admin_info"]["lang"]."' order by sort";
		$tmp = $conn->GetArray($sql);
		if ($tmp)
		foreach($tmp as $k=>$v)
		{
			foreach($v as $k_2=>$v_2)
				$tmp_2[$k][$k_2] = $v_2;
		}
		$data["floor_list"] = $tmp_2;
	}

	$_SESSION["admin_info"]["view"] = "detail";
}
else
{
	$admin_auth = explode(',',$_SESSION["admin_info"]["auth"]);
if ($html)
	foreach($html as $k => $v)/*Make_class得到之html 並非date*/
	{
		foreach($v as $k_2 => $v_2)
			$data_temp[$k][$k_2] = $v_2;//存入新陣列 給與 smarty section 使用
		
		$str = "";
		
		for($i=1;$i<=$v["floor"];$i++)	
			$str .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
	
		$data_temp[$k]["old_name"] = $v["name"];
		$data_temp[$k]["name"] = $str.$v["name"];
		$data_temp[$k]["ifview_html"] = $_SETUP["status"][$data_temp[$k]["ifview"]];
		$data_temp[$k]["ifview"] = Make_radio($_SETUP["status"],$data_temp[$k]["ifview"],"ifview_".$data_temp[$k]["id"]);

		//---移除沒權限的資料
		if (!in_array($data_temp[$k]["lv"],$admin_auth) && $_SESSION["admin_info"]["control"]!='0'){
			unset($data_temp[$k]);
		}
	}
	
	
	//$data = $data_temp;
	$_SESSION["admin_info"]["view"] = "list";
	
	$temp_i = 0;
	foreach ($data_temp as $k=>$v){
		$data[$temp_i] = $v;
		$temp_i++;
	}
	
}


include_once("index.php");//assign 所有資料、共用頁面


$tpl->display(ROOT_PATH.$admin_path."templates/index.html");

?>




