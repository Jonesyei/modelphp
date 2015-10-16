<?php
/*
	頁碼檔案加載文件前先設置 
	$mount = 15; //--頁碼檔案必要變數 頁面筆數
	$cousql = 'select count(*) from '.$tablesql.$joinsql.$leftjoin.$wheresql.$orderby;//--總數資料 頁碼檔案必要變數
*/
	//筆數
	function page_show($cousql,$mount,$page_button_count=10,$page_row_count=false){
	global $conn;
	global $_GET;
	unset($tc);
	unset($data["row_count"]);
	unset($data["allpage"]);
	$page_button_count = 10;
	if (!$page_row_count){
		if (is_array($cousql)){ //--如果是陣列 表示來源為物件
			$tc[0] = count($cousql);
			if ($tc[0]>1 || ($cousql[0]!=''&&$cousql[0]!=NULL))
			$pageall = ceil($tc[0]/$mount);
			else
			$pageall = 0;
		}else{
			$tc = $conn->GetRow($cousql); $pageall = ceil($tc[0]/$mount);
		}
	}else{
		$tc[0] = $page_row_count;
		$pageall = ceil($page_row_count/$mount);
	}
	$data["row_count"] = $tc[0];
	$data["allpage"] = $pageall;
	$n = $_GET["page"]*1+1; if ($n > $pageall) $n = $pageall;
	$b = $_GET["page"]*1-1; if ($b < 1) $b = 1;
	
	
	
	//-----------重組參數
	$url_and_split = explode('&',$_SERVER['QUERY_STRING']);
	$headurl = '';
	foreach ($url_and_split as $k => $v){
		$dnm = explode('=',$v);
		if ($dnm[0] != "page"){
			if ($headurl == NULL ||$headurl == ''){
				$headurl = $dnm[0]."=".$dnm[1];
			}else{
				$headurl .= "&".$dnm[0]."=".$dnm[1];
			}
		}
	}
	
	$hrefhead =  $_SERVER['PHP_SELF'].'?'.$headurl;


	//---一站通特殊處理
	/*
	$a = split('/',$_SERVER['QUERY_STRING']);
	$a = split('&',$a[count($a)-1]);
	foreach ($a as $k => $v)
	{
		$bc = split('=',$v);
		$c[$bc[0]] = $bc[1];
	}

	$hrefhead .= $c["orther"].'_'.$c["addr1"].'_'.$c["addr2"];
	//---------------

	$data["page"] = '<a r="lock" href="'.$hrefhead.'_1" class="page-btn">第一頁</a><a r="lock" href="'.$hrefhead.'_'.$b.'" class="page-btn">上一頁</a>'; //前一頁 跟 最前一頁
	for($i=0;$i<$pageall;$i++) {$data["page"] .= '<a r="lock" href="'.$hrefhead.'_'.($i+1).'">'.($i+1).'</a>';}
	$data["page"] .= '<a r="lock" href="'.$hrefhead.'_'.$n.'" class="page-btn">下一頁</a><a r="lock" href="'.$hrefhead.'_'.$pageall.'" class="page-btn"> 最後頁</a>'; //後一頁 跟 最後一頁
	//----	*/

	$data["page_first"] = '<a r="lock" href="'.$hrefhead.'" class="page-btn">第一頁</a>';
	
	$data["page1"] = '<a r="lock" href="'.$hrefhead.'&page='.$b.'" class="page-btn">上一頁</a>'; //前一頁 跟 最前一頁
	
	
	//----後一頁
	$data["page3"] .= '<a r="lock" href="'.$hrefhead.'&page='.$n.'" class="page-btn">下一頁</a>'; //後一頁
	
	$data["page_after"] ='<a r="lock" href="'.$hrefhead.'&page='.$pageall.'" class="page-btn">最後頁</a>'; // 最後一頁
	
	$data["page"] = $data["page1"].$data["page2"].$data["page3"];
	
	

	$data["select_page"] = '前往第 <select id="page" onchange="page_change(this.value);">';
	for($i=1;$i<=$pageall;$i++) {
		//目前頁碼小於分割頁碼一半 表示未達跳換顯示
		if (($_GET["page"]*1<=ceil($page_button_count/2) && $i<=$page_button_count) ||
			($i>$_GET["page"]-ceil($page_button_count/2) && $i<=$_GET["page"]+ceil($page_button_count/2)) ||
			($_GET["page"]*1+ceil($page_button_count/2)>=$pageall && $i>=$pageall-$page_button_count) ){
		//if ( ($i>$_GET["page"]-$page_button_count/2 && $i<=$_GET["page"]+$page_button_count/2) || ($i>=$_GET["page"] && $i<=$page_button_count-$_GET["page"])){
			if ($data["page2"]!=NULL) $data["page2"] .= '.';
			
			if ($_GET["page"]*1==$i){ $main_i = '<font color="red">'.$i.'</font>'; }else{ $main_i = $i; }
			
			$data["page2"] .= '<a r="lock" href="'.$hrefhead.'&page='.($i).'">'.($main_i).'</a>';
		}
		if ($_GET["page"]*1==$i){
			$page_checked = ' selected';
		}else{
			$page_checked = '';
		}
		
		$data["select_page"] .='<option value="'.($i).'"'.$page_checked.'>'.($i).'</option>';
	}
	$data["select_page"] .= '</select> 頁';
	$data["select_page"] .='<script>
	function page_change(value){
	var temp_str = window.location.href.split(\'?\');
	var cpl =\'\';
	if (temp_str.length>1){
		var temp_posarray = temp_str[1].split(\'&\');
		for (var aa=0;aa<temp_posarray.length;aa++){
			var check_temp = temp_posarray[aa].split(\'=\');
			if (check_temp[0]!=\'page\'){
				if (cpl!=\'\') cpl += \'&\';
				cpl += temp_posarray[aa];
			}
		}
		if (cpl!=\'\') cpl += \'&\';
		cpl += \'page=\'+value;
	}else{
		cpl += \'page=\'+value;
	}
	cpl = temp_str[0]+\'?\'+cpl;
	window.location.href = cpl;
	}</script>';
	
	

	$data["wd_page"] = '全部共 '.$data["row_count"].' 筆(每頁 '.$mount.' 筆)　　'.$data["page1"].'　'.$data["page2"].'　'.$data["page3"].'　　'.$data["select_page"];
	
	return $data;
	}
?>
