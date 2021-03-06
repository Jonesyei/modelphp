<?php
/*
訂單類別庫 (Order)
create by Jones 2017/1/13 version

-----
edit logs
2017/1/13	Jones	訂單返回功能新增

-------
宣告物件
new order($conn,訂單資料表,訂單商品資料表,商品資料表);

運費設定
$shopping_car->post_fee(基本運費,免運費金額,到達金額運費);

折扣設定
$shopping_car->deshprice(折扣 or 折扣率,是否疊加[預設是]) 可重複引用即找最低優惠價格的折扣

紅利設定 多少比 1 例 1:1
$shopping_car->set_point(1);

新增 購物車 一般商品
$shopping_car->addpro(商品編號,數量,是否疊加 預設否, 庫存規格 可不填,金額 可不填(預設NULL、"auto"自動後台資料、任意金額));

新增 購物車 非一般商品(無商品編號)
$shopping_car->addother(項目名稱,項目內容,價格,數量);

修改 購物車 商品數量
$shopping_car->car_change(購物車商品唯一編號,數量值);

刪除 購物車 商品
$shopping_car->car_remove(購物車商品為一編號);

顯示購物車商品清單 亦可填訂單編號取出商品
$shopping_car->car_list(訂單編號 預設null);

顯示目前購物車 資訊
$shopping_car->car();

顯示訂單資訊
$shopping_car->getorder(條件 ex ' where id="1"')

退貨 訂單商品
$shopping_car->back_item(訂單商品唯一編號);

購物車結帳
$shopping_car->paybill(更動的資料陣列);

結帳訂單重新加入購物車 (補回紅利 庫存 商品金額不會因狀態異動)
$shopping_car->pay_to_shoppingcar(訂單編號);

訂單確認信件
$shopping_car->order_mail_send(function paybill返回結果,返回路徑)

訂單付款(繳款)成功通知信 (通常用於金流付款後回傳)
$shopping_car->ispay_mail(訂單編號)

開啟 庫存計算模式 0關閉(預設) 1開啟
$shopping_car->stock_mode=0

訂單列表 (已經過重製資料結果請勿用來做資料操作)
$shopping_car->order_list(訂單唯一編號(or條件式),起始筆數,顯示筆數);

確認付款
$shopping_car->paycheck(訂單編號);

訂單點數發放 (訂單確認付款後 會自動發放)
$shopping_car->point(訂單唯一編號(or訂單資料陣))

訂單點數回收
$shopping_car->back_point(訂單唯一編號(or訂單資料陣列))


自訂訂單編號
$shopping_car->order_auto_set(標頭,總字段數(含標頭),起始值)
*/
class order_center
{
		var $order;			//---目前購物車訂單資料
		var $conn;
		var $table;			//--訂單資料表
		var $cartable;		//--購物車明細資料表
		var $protable;		//--商品資料表
		var $actable;		//--活動折扣資料表
		var $membertable;	//--會員資料表
		
		var $namespace = 'member';	//--會員命名空間
		
		var $table_rows;
		var $deshprice;	//-商品折扣率  0~0.9999
		var $deshtype;		//-折扣型態
		var $deshact;		//-是否折扣疊加
		var $erromsg;		//錯誤訊息
		var $post_fee1 = 0;	//基本運費
		var $no_post_fee = 0;	//免運費金額
		var $post_fee2;		//到達金額運費
		var $point = 0;		//--紅利存放值
		var $point_status = 0;	//紅利比率模式 0 比率  1固定值
		
		var $stock_mode = 0;//庫存模式
		var $stock_time = 86400;	//--庫存扣除後未付款訂單保留秒數
		
		var $not_member_car_time = 86400; //--非會員購物操作延遲秒數 預設一天
		
		var $order_template='';	//預設訂單樣板資料
		
		//*訂單信件設定*/
		var $order_mail_title;	//信件主旨資料
		var $order_mail_msg_top; //訂單信件上版訊息 array('paymode'=>'msg');
		var $order_mail_msg_foot; //訂單信件下版訊息 array('paymode'=>'msg');
		
		var $order_mail_pay_body; //已完成訂單信件內容 array('paymode'=>'msg');
		
		//*任選活動設定*/
		var $active_any_other = 0;//-任選活動是否不包含其他商品同時結帳 0 不使用 1使用
		var $active_group_count; //--訂單可擁有的活動項目數量限制
		var $active_any_array; 	//--任選活動 array(活動名稱,商品編號,數量,價格or折扣)多陣列[]
		
		/*現折活動*/
		var $active_now_desh_array; // array(活動名稱,涵蓋商品編號(X,X),滿額多少,折抵金額,是否疊加(預設是));
		
		function __construct($conn,$table,$table2,$table3,$table4='')
		{
			global $_SESSION;
			global $design;
			$this->conn = $conn;
			$this->table = $table;
			$this->cartable = $table2;
			$this->protable = $table3;
			$this->membertable = PREFIX.'member';
			if ($table4==''){
				$this->actable = PREFIX.'shopping_car_groups';
			}else{
				$this->actable = $table4;	
			}
			
			//--預設樣板資料
			$this->order_template = 'string:'.$design->load('mail_shopping');
			$design->views = '';
			//--檢查資料表
			$this->checktable();
			
			//--取得資料表內所有欄位 比對傳入的資料
			foreach ($conn->GetArray("desc ".$table) as $k=>$v){ //--取得資料表欄位資料進行判斷
				$this->table_rows[] = $v[0];
			}
			
		}
		
		/**
			運行
			設置完參數後 運行此
		*/
		function work(){
			//--非會員時自動帶入暫存購買
			if ($_SESSION["login_info"][$this->namespace]["id"]==NULL || $_SESSION["login_info"][$this->namespace]["id"]=='0'){
				$_SESSION["login_info"][$this->namespace]["id"] = '0';
				
				//-判斷是否存在暫存購物
				if ($_SESSION["temp_order_no"][$this->namespace]){
					$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where status=1 and step='1' and order_no=?"),array($_SESSION["temp_order_no"][$this->namespace]));
				}
				
				if (!$_SESSION['temp_order_no'][$this->namespace] || !$temp){
					$cardata["member_id"] = $_SESSION["login_info"][$this->namespace]["id"];
					$_SESSION["temp_order_no"][$this->namespace] = $cardata["order_no"] = strtoupper(base_convert(date('ymdhis'),10,16));//dechex()
					$cardata["status"] = 1;
					$cardata["namespace"] = $this->namespace;
					$cardata["create_date"] = date("Y-m-d H:i:s");
					$this->conn->AutoExecute($this->table,$cardata,"INSERT");
					$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where status=1 and step='1' and order_no=?"),array($_SESSION["temp_order_no"][$this->namespace]));
				}
			}else{
				
				if (isset($_SESSION["temp_order_no"]) && isset($_SESSION["temp_order_no"][$this->namespace])){
					//--檢查是否有暫存購物資料 有的話則取代
					$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where status=1 and step='1' and order_no=?"),array($_SESSION["temp_order_no"][$this->namespace]));
					$temp_car_list = $this->car_list($temp['id']);
					if (count($temp_car_list)>=1){
						$this->conn->Execute("DELETE from ".$this->table." where member_id='".$_SESSION["login_info"][$this->namespace]["id"]."' and step='1'");
						$this->conn->Execute("UPDATE ".$this->table." SET member_id='".$_SESSION["login_info"][$this->namespace]["id"]."' where id='".$temp["id"]."'");
					}
					unset($_SESSION["temp_order_no"][$this->namespace]);
				}
				
				//--檢查是否有購物車 沒有就創建一個
				$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where status=1 and step='1' and namespace=? and member_id=?"),array($this->namespace,$_SESSION["login_info"][$this->namespace]["id"]));	
				if (!$temp && $_SESSION["login_info"][$this->namespace]["id"]!=NULL){
					$cardata["namespace"] = $this->namespace;
					$cardata["member_id"] = $_SESSION["login_info"][$this->namespace]["id"];
					$cardata["order_no"] = strtoupper(base_convert(date('ymdhis'),10,16));//dechex()
					$cardata["status"] = 1;
					$cardata["create_date"] = date("Y-m-d H:i:s");
					$this->conn->AutoExecute($this->table,$cardata,"INSERT");
					$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where status=1 and step='1' and member_id=?"),array($_SESSION["login_info"][$this->namespace]["id"]));
				}	
			}
			$this->order = $temp;

			//-移除已到期的無會員購物車 連棟購物車以及活動
			$left_join .= " left join `".$this->actable."` as atb on atb.shopping_car_id=".$this->table.".id";
			$left_join .= " left join `".$this->cartable."` as carl on carl.shopping_car_id=".$this->table.".id";
			$sql = "DELETE `".$this->table."`,`atb`,`carl` FROM ".$this->table." ".$left_join." where ".$this->table.".create_date<='". date('Y-m-d H:i:s',strtotime("-".($this->not_member_car_time)." seconds"))."'";
			$sql .= " and ".$this->table.".member_id='0' and step='1'";
			$this->conn->Execute($sql);
			
			
			//--回覆已到期的庫存項目
			$this->reset_stock();
			
			$this->conn->Execute($this->Prepare("UPDATE ".$this->table." set create_date='".date("Y-m-d H:i:s")."' where id=?"),array($this->order["id"]));
		}
		
		function Prepare($sql){
			return $this->conn->Prepare($sql);
		}
		
		//--對應參數標籤
		function tags($value,$para=array()){
			global $console;
			return $console->tags($value,$para);
		}
		
		/* 訂單編號自定義  標頭,長度,開始值,步進值 */
		function order_auto_set($title,$count=10,$mask='1',$add=1){
			global $_SESSION;
			$temp = $this->conn->GetRow("SELECT *,REPLACE(order_no,'".quotes($title)."','') as _order_no FROM `".$this->table."` WHERE order_no like '".quotes($title)."%' order by _order_no desc limit 1");
			if (substr($this->order['order_no'],0,strlen($title))==$title) return;
			
			if (substr($temp['order_no'],0,strlen($title))==$title){
				$num = $temp['_order_no']*1+$add;
			}else{
				$num = $mask*1;
			}
			$ORDER_NO = $title.str_pad($num,$count-strlen($title),"0",STR_PAD_LEFT);
			//--判斷是否已存在單號
			$check_order = $this->conn->GetRow("select * from ".$this->table." where order_no='".$ORDER_NO."'");
			while ($check_order){
				$num++;
				$ORDER_NO = $title.str_pad($num,$count-strlen($title),"0",STR_PAD_LEFT);
				$check_order = $this->conn->GetRow("select * from ".$this->table." where order_no='".$ORDER_NO."'");
			}
			$this->conn->Execute("UPDATE ".$this->table." SET order_no='".$ORDER_NO."' where order_no='".$this->order['order_no']."'");
			
			if ($_SESSION["temp_order_no"][$this->namespace])
			$_SESSION["temp_order_no"][$this->namespace] = $ORDER_NO;
			
			$temp = $this->conn->GetRow("select * from ".$this->table." where status=1 and step='1' and order_no='".$ORDER_NO."'");
			$this->order = $temp;
		}
		
		//--資料表檢查並建立
		function checktable(){
			$temp = $this->conn->GetArray("show tables");
			foreach ($temp as $k=>$v){
				$temp_table[$k] = $v[0];
			}
			if (!in_array($this->table,$temp_table)){
				$sql_str = "CREATE TABLE `".$this->table."` ( `id` int(20) NOT NULL auto_increment,  `namespace` text NOT NULL COMMENT '存放命名空間',  `step` tinyint(1) default '1' COMMENT '購物流程指標',  `order_no` VARCHAR( 30 ) NOT NULL COMMENT '定單序號',  `total` int(20) default '0' COMMENT '總價(不含折價 不含運費)',  `deshpoint` int(11) default NULL COMMENT '扣除紅利點',  `deshpoint_status` int(11) default '0' COMMENT '扣除紅利狀態 0未扣除 1已扣除',  `addpoint` int(11) default NULL COMMENT '新增紅利點',  `addpoint_status` int(11) default '0' COMMENT '點數支付狀態',  `post_fee` int(10) default '0' COMMENT '運費',  `back_total` int(20) default NULL COMMENT '退款總額',  `back_money` int(20) default NULL COMMENT '已退金額',  `back_memo` text COMMENT '退換貨描述',  `back_status` int(20) default '0' COMMENT '退換狀態 0未完成 1已完成',  `paycardmode` tinyint(1) default '0' COMMENT '刷卡方式 1=聯邦 2=國泰世華 3=花旗 4=中信',  `MerchantNumber` varchar(50) default NULL COMMENT '金流串接商店編號',  `Code` varchar(30) default NULL COMMENT '金流串接商店編號對應code',  `Period` tinyint(1) default '0' COMMENT '分期期數',  `member_id` int(20) default NULL,  `type` varchar(100) NOT NULL default 'shopping_car',  `lang` varchar(20) default NULL,  `status` tinyint(1) default NULL,  `pay_status` tinyint(1) default '0' COMMENT '付款狀態',  `paymode_status` varchar(10) default '0' COMMENT '金流狀態 0未付款 1已付款 9失效狀態',  `cargo_status` tinyint(1) default '0' COMMENT '出貨狀態',  `cargo_back_status` int(11) DEFAULT '0' COMMENT '庫存是否補回狀態',  `email` varchar(50) default NULL,  `sex` varchar(50) default NULL,  `company` varchar(50) default NULL,  `country` varchar(50) default NULL,  `zip` varchar(50) default NULL,  `contact_time` varchar(50) default NULL,  `recive_name` varchar(50) default NULL,  `recive_email` varchar(50) default NULL,  `recive_address` varchar(100) default NULL,  `recive_zip` varchar(50) default NULL,  `recive_sex` varchar(50) default NULL,  `recive_takemode` varchar(20) default NULL COMMENT '取貨方式',  `invoice` varchar(10) default NULL COMMENT '發票類型',  `unity_no` varchar(40) default NULL COMMENT '統一編號',  `unity_title` varchar(20) default NULL,  `checksum` varchar(50) default NULL COMMENT '金流md5檢查碼',  `name` varchar(30) default NULL,  `birthday` varchar(30) default NULL,  `phone` varchar(30) default NULL,  `cellphone` varchar(30) default NULL,  `address` text,  `memo` text COMMENT '備註',  `create_date` datetime default NULL,  `update_date` datetime default NULL,  `cargo_date` datetime default NULL COMMENT '出貨時間',  `create_name` varchar(20) default NULL,  `update_name` varchar(20) default NULL,  `ATMcode` text COMMENT 'ATM轉帳後四碼',  `order_img` longtext COMMENT '訂單圖像',  `ismailsend` int(11) NOT NULL default '0' COMMENT '訂單確認信件發送次數',  `buy_name` varchar(100) default NULL COMMENT '購買人姓名',  `buy_sex` varchar(2) default NULL COMMENT '購買人性別',  `buy_email` varchar(100) default NULL COMMENT '購買人信箱',  `buy_phone` varchar(20) default NULL COMMENT '購買人電話',  `buy_cellphone` varchar(20) default NULL COMMENT '購買人手機',  `buy_zipcode` varchar(10) default NULL COMMENT '購買人郵遞區號',  `buy_address` varchar(200) default NULL COMMENT '購買人地址',  `buy_memo` text COMMENT '購買人備註說明',  PRIMARY KEY  (`id`) ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
				 $this->conn->Execute($sql_str);
			}
			if (!in_array($this->cartable,$temp_table)){
				$sql_str = "CREATE TABLE `".$this->cartable."` (  `shopping_car_list_id` int(20) NOT NULL auto_increment,  `shopping_car_id` int(20) NOT NULL,  `count` int(10) NOT NULL default '1',  `id` int(20) NOT NULL,  `type` varchar(100) NOT NULL,  `lang` varchar(20) default NULL,  `size` text,  `name` varchar(50) default NULL,  `detail` text COMMENT '程式自動生成',  `point` int(11) default NULL COMMENT '獲得紅利點數',  `depoint` int(11) default NULL COMMENT '可刪減多少紅利',  `pic` text,  `sort` int(20) default NULL,  `status` tinyint(4) default NULL,  `create_date` datetime default NULL,  `update_date` datetime default NULL,  `create_name` varchar(20) default NULL,  `update_name` varchar(20) default NULL,  `price1` int(10) default '0' COMMENT '原價',  `price2` int(20) default '0' COMMENT '特價',  `stock` int(10) default '0',  `protype` int(20) default NULL COMMENT '商品種類root_id=1',  `probrand` int(20) default NULL COMMENT '商品品牌root_id=2',  `del_pic` varchar(100) default NULL COMMENT '程式自動生成',  `talkabout` text COMMENT '討論評價內容',  `talkstar` int(11) default NULL COMMENT '評價等級',  `talkrequest` text COMMENT '客服回應',  PRIMARY KEY  (`shopping_car_list_id`),  KEY `type` (`type`),  KEY `lang` (`lang`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
				 $this->conn->Execute($sql_str);
			}
		}
		
		function getorder($where=NULL) //--獲取依照條件尋找訂單
		{
			$temp = $this->conn->GetRow("select * from ".$this->table." ".$where);
			return $temp;
		}
		
		//-- 商品折扣率 (折扣,啟用疊算)
		function deshprice($value,$act=true){
			$this->deshact[] = $act;
			if (strpos($value,'%')!=''){
				$this->deshtype[] = '%';
			}else{
				$this->deshtype[] = '';
			}
			$this->deshprice[] = str_replace('%','',$value)*1;
		}
		
		//-- 增加購物車內容 商品 數量 資料是否疊加
		function addpro($value,$count=1,$act=false,$size=NULL,$price=NULL){
			
			
			//假使有尺寸規格資料對應尺寸規格
			if ($size!=NULL){
				$carlist = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and id=? and size=?"),array($this->order["id"],$value,$size));
			}else{
				$carlist = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and id=?"),array($this->order["id"],$value));
			}
			$product = $this->conn->GetRow($this->Prepare("select * from ".$this->protable." where id=? and status=1"),array(quotes($value)));
			if (!$product) {
				$this->erromsg = $this->tags('NO_HAVE_ITEM_INFO');//無此商品訊息!!
				return false;
			}
			
			
			//--判斷是否有自訂金額
			if ($price){
				$price_data["stock_price"] = explode('|__|',$product["stock_price"]);
				$price_data["stock_no"] = explode('|__|',$product["stock_no"]);
				$price_data["stock"] = explode('|__|',$product["stock"]);
				$price_data["size"] = explode('|__|',$product["size"]);
				switch ($price){
					//--自動
					case "auto":
						if (array_search($size,$price_data["stock_no"])!==false){
							$product["price2"] = $price_data["stock_price"][array_search($size,$price_data["stock_no"])];
						}else{
							$this->erromsg = $this->tags('NOT_HAVE_PRICE_SETTING');//未提供尺寸金額設定!!
							return false;
						}	
					break;
					//--字定義
					default:
						$product["price2"] = $price;
					break;
				}
			}
			
			
			//-判斷是否為百分比折扣
			if (count($this->deshprice)>0) {
				foreach ($this->deshprice as $k=>$v) {
					if ($this->deshact[$k]){
						if ($this->deshtype[$k]=='%'){
								$deshprice[] = ($product["price2"]*$this->deshprice[$k]/100);
						}else{
							$deshprice[] = $this->deshprice[$k];
						}
					}else{
						if ($this->deshtype[$k]=='%'){
								$deshprice[] = ($product["price1"]*$this->deshprice[$k]/100);
						}else{
							$deshprice[] = $this->deshprice[$k];
						}
					}
				}
				rsort($deshprice);
				$deshprice = $deshprice[0];
			}
			
			//--判斷是否庫存模式
			if ($this->stock_mode!=0){
				$carlist = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and id=? and size=?"),array($this->order["id"],$value,$size)); //--庫存模式			
				if ($carlist){//--判斷購物車有否 相同 規格資料
					if (!$this->check_stock($carlist["id"],$carlist["size"],$carlist["count"]*1+$count*1)){
						return false;
					}
				}else{
					if (!$this->check_stock($product["id"],$size,$count*1)){
						return false;
					}
				}
			}

			//--購物車有資料 且 為資料重疊時
			if ($carlist && $act==false){
				//--舊資料
				$old_list_data = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and shopping_car_list_id=?"),array($this->order["id"],$carlist["shopping_car_list_id"]));
				
				if ($size!=NULL) $carlist["size"] = $size;
				$carlist["count"] = $carlist["count"]*1+$count*1;
				$carlist["price1"] = $product["price1"];
				$carlist["price2"] = $product["price2"]*1 - $deshprice;
				$carlist["update_date"] = date("Y-m-d H:i:s");
				$status = $this->conn->AutoExecute($this->cartable,$carlist,"UPDATE","shopping_car_list_id=".$carlist["shopping_car_list_id"]);
				if (!$status) {
					$this->erromsg = $this->tags('PRO_CARITEM_UPDATE_FILED');//購物商品更新失敗!!
					return false;
				}
				$this->reload();
				
				//--訂單活動判斷
				if ($this->active_group_check()){
					$status = $this->conn->AutoExecute($this->cartable,$old_list_data,"UPDATE","shopping_car_list_id=".$old_list_data["shopping_car_list_id"]);
					$this->reload();
					return false;
				}
				
			}else{
				$carlist = $product;
				if ($size!=NULL) {
					$carlist["size"] = $size;
				}else{
					//** 無尺寸模組自動以第一個為尺寸項目 (顯示 且 庫存大於正數)
					$st_count = explode('|__|',$carlist['stock']);
					$st_no = explode('|__|',$carlist['stock_no']);
					$st_status = explode('|__|',$carlist['stock_status']);
					$carlist['size'] = NULL;
					foreach ($st_no as $k=>$v){
						if ( ($st_count[$k]!==NULL && $st_count[$k]!=='' && $st_count[$k]>=$count) && ($st_status[$k]===NULL || $st_status[$k]==='' || $st_status[$k]!=='0') ){
							$carlist['size'] = $st_no[$k];
							break;
						}
					}
				}
				$carlist["type"] = 'shopping_car';
				$carlist["shopping_car_id"] = $this->order["id"];
				$carlist["count"] = $count*1;
				$carlist["price1"] = $product["price1"];
				$carlist["price2"] = $product["price2"]*1 - $deshprice;
				$carlist["status"] = '1';
				$carlist["create_date"] = date("Y-m-d H:i:s");
				$carlist["update_date"] = date("Y-m-d H:i:s");
				$status = $this->conn->AutoExecute($this->cartable,$carlist,"INSERT");
				if (!$status) {
					$this->erromsg = $this->tags('PRO_CARITEM_INSERT_FILED');//購物商品新增失敗!!
					return false;
				}
				$this->reload();
				
				//--訂單活動判斷
				if ($this->active_group_check()){
					$status = $this->conn->Execute($this->Prepare("DELETE FROM ".$this->cartable." WHERE shopping_car_id=? order by id desc LIMIT 1"),array($this->order['id']));
					$this->reload();
					return false;
				}
			}
			
			return $this->reload();
		}
		
		//--商品規格重新設定
		function car_change_size($id,$count,$size){	
			$car_pro = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and shopping_car_list_id=?"),array($this->order["id"],$id));
								
			//--判斷是否為0值以下
			if ($count*1<=0){
				$this->erromsg = $this->tags('CARITEM_UPDATE_COUNT_BTZERO',array(0=>'0'));//'更新的數量不可小於0'
				return false;
			}	
			
			//--判斷是否選擇規格
			if(!$size){
				$this->erromsg = $this->tags('PLZ_SELECT_SIZE');//請選擇規格
				return false;	
			}		
			
			if ($car_pro){	
				$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and id=? and size=?"),array($this->order["id"],$car_pro['id'],$size)); 
				
				if ($temp){//--判斷購物車有否 相同 規格資料
					//--判斷是否庫存模式
					if ($this->stock_mode!=0){
						if (!$this->check_stock($temp["id"],$temp["size"],$temp["count"]*1+$count*1)){
							return false;
						}		
					}
					$carlist["count"] = $temp["count"]*1+$count*1;
					$car_list_id = $temp['shopping_car_list_id'];						
				}else{
					//--判斷是否庫存模式
					if ($this->stock_mode!=0){
						if (!$this->check_stock($car_pro["id"],$size,$count)){
							return false;
						}	
					}
					$carlist["size"] = $size;
					$carlist["count"] = $count*1;
					$car_list_id = $car_pro["shopping_car_list_id"];
				}	
					
				$carlist["update_date"] = date("Y-m-d H:i:s");
				$status = $this->conn->AutoExecute($this->cartable,$carlist,"UPDATE","shopping_car_list_id=".$car_list_id);
				if (!$status) {
					$this->erromsg = $this->tags('PRO_CARITEM_UPDATE_FILED');//購物商品更新失敗
					return false;
				}
				
				if($temp){
					$this->erromsg = $this->tags('PRO_CARITEM_UPDATE_SURE');//購物商品更新成功!!
					$this->car_remove($id);
				}else{
					return $this->reload();
				}
			}else{
				$this->erromsg = $this->tags('PRO_CARITEM_NO_HAVE'); // 購物車內無此商品
				return false;
			}
			
		}
		
		//--商品數量重新設定
		function car_change($id,$count){
			$car_pro = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and shopping_car_list_id=?"),array($this->order["id"],$id));
			
			//--判斷是否庫存模式
			if (!$this->check_stock($car_pro["id"],$car_pro["size"],$count)){
				return false;
			}
			
			//--判斷是否為0值以下
			if ($count*1<=0){
				$this->erromsg = $this->tags('CARITEM_UPDATE_COUNT_BTZERO',array(0=>'0')); //更新的數量不可小於0
				return false;
			}
			
			if ($car_pro){
				$carlist["count"] = $count*1;
				$carlist["update_date"] = date("Y-m-d H:i:s");
				$status = $this->conn->AutoExecute($this->cartable,$carlist,"UPDATE","shopping_car_list_id=".$car_pro["shopping_car_list_id"]);
				if (!$status) {
					$this->erromsg = $this->tags('PRO_CARITEM_UPDATE_FILED');//購物商品更新失敗!!
					return false;
				}
				$output = $this->reload();
				
				//--訂單活動判斷
				if ($this->active_group_check()){
					$status = $this->conn->AutoExecute($this->cartable,$car_pro,"UPDATE","shopping_car_list_id=".$car_pro["shopping_car_list_id"]);
					$this->reload();
					return false;
				}
				
				return $output;
			}else{
				$this->erromsg = $this->tags('PRO_CARITEM_NO_HAVE');//購物車內無此商品
				return false;
			}
		}
		
		
		//--訂單重新依照購物車內資料寫入
		function reload(){
			global $_SESSION;
			
			$active_dmoney = 0;
			
			//--活動清單重製
			//--刪除所有資料
			$this->conn->Execute("DELETE FROM ".$this->actable." WHERE shopping_car_id in (".quotes($this->order["id"]).")");
			
			//---活動任選折扣
			if ($this->active_any_array!=NULL){
				$active_dmoney += $this->active_any(); //--倒出最後的產品總額
			}
			
			//--現折
			if ($this->active_now_desh_array!=NULL){
				$active_dmoney -= $this->active_now_desh();
			}

			//---重新寫入訂單目前總額
			$car = $this->conn->GetRow("select * from ".$this->table." where id='".quotes($this->order["id"])."'");
			$carlist = $this->conn->GetArray("select * from ".$this->cartable." where shopping_car_id='".quotes($this->order["id"])."' and status=1");
			$total = 0;
			$post_fee = $this->post_fee1;
			foreach ($carlist as $k=>$v){
				$total += ($v["count"]-$v['decount']) * $v["price2"];
			}

			
			//--加上活動差額
			$total+= $active_dmoney;
			
			//--運費判斷
			if ($this->no_post_fee!=0){
				if ($total>=$this->no_post_fee){
					$post_fee = $this->post_fee2;
				}
			}
			//--紅利
			if ($this->point_status==0){
				$car["addpoint"] = floor($total*$this->point);
			}else{
				$car["addpoint"] = $this->point;
			}
			
			if($_SESSION["companyto"][$this->namespace]){
				$car["company"] = $_SESSION["companyto"][$this->namespace];
			}
			
			$car["post_fee"] = $post_fee;
			$car["total"] = $total;
			$car["update_date"] = date("Y-m-d H:i:s");
			$car["create_date"] = date("Y-m-d H:i:s");
			$carstatus = $this->conn->AutoExecute($this->table,$car,"UPDATE","id='".$this->order["id"]."'");
			if (!$carstatus) {
				$this->erromsg = '訂單更新失敗!! on addpro';
				print_r($car);
				return false;
			}
			$this->order = $this->conn->GetRow("select * from ".$this->table." where id='".quotes($this->order["id"])."'");//-重新讀取訂單資料
			return $carstatus;
		}
		
		///--活動任選折扣
		function active_any(){
			$group_out_money = 0;
			if (count($this->active_any_array)>0){
				//--更新消除數量
				$this->conn->Execute("UPDATE ".$this->cartable." SET decount=0 WHERE shopping_car_id in (".quotes($this->order["id"]).")");
				
				//--用以統計運算過多少活動筆
				$group_count = 0;
				
				//--活動列表
				foreach ($this->active_any_array as $k=>$v){
					
					//--超過限定數量不再計算活動
					if ($this->active_group_count!=NULL && $this->active_group_count<=$group_count) {
						break;
					}
					
					$output_active_money = 0;
					
					$pro_array = explode(',',$v[1]);
					$count = $v[2];
					$decode = $v[3];
					
					//--確認購物車是否有陣列組合商品達到條件
					$sql ="select sum(count-decount) as sum from ".$this->cartable." where shopping_car_id='".quotes($this->order["id"])."' and id in (".implode(',',$pro_array).") and status=1 group by shopping_car_id";
					$carlist = $this->conn->GetRow($sql);
					if ($carlist['sum']*1>=$count && $count>0){ //大於設定
						$active_count = floor($carlist['sum']/$count);
						
						//---超過時只用設定的數量
						if ($this->active_group_count!=NULL && $this->active_group_count<$active_count) {
							$active_count = $this->active_group_count;
						}
						
						$fns = $active_count*$count; //--取得要扣除的數量金額
						$carlist = $this->conn->GetArray("select * from ".$this->cartable." where shopping_car_id='".quotes($this->order["id"])."' and status=1");
						if ($carlist)
							foreach ($carlist as $a=>$b){
								if (!in_array($b['id'],$pro_array)) continue; //--不是屬於活動商品跳過計算過程
								if ($fns<=0) break; //--已扣除完畢跳出
								if ($b['count']*1 >= $fns){
									$udp['decount'] = $fns;
									if (strpos($decode,'%')!='') {
										$output_active_money += $now_active_money = round($fns*$b['price2'])*( (100-str_replace('%','',$decode)*1) /100);
									}else{
										$output_active_money += $now_active_money = $fns*$b['price2'];
										$output_active_money -= $now_active_money -= ceil($fns/$count)*$decode;
									}
									$fns = 0;
								}else{
									$udp['decount'] = $b['count'];
									$fns = $fns-$b['count'];
									if (strpos($decode,'%')!='') {
										$output_active_money += $now_active_money = round($b['count']*$b['price2'])*( (100-str_replace('%','',$decode)*1) /100);
									}else{
										$output_active_money += $now_active_money = $b['count']*$b['price2'];

										$output_active_money -= $now_active_money -= floor($b['count']/$count)*$decode;
									}
								}
								//echo $now_active_money;print_r($pro_array);echo $b['shopping_car_list_id'].'<br>';
								$status = $this->conn->AutoExecute($this->cartable,$udp,"UPDATE"," shopping_car_list_id='".$b["shopping_car_list_id"]."'");
							}
						//---取得表內的編號值
						$temp = $this->conn->GetRow("select * from ".$this->actable." order by id desc limit 1");
						if ($temp){
							$indata['id'] = $temp['id']*1+1;
						}else{
							$indata['id'] = $temp['id'] = 1;
						}
						
						//---寫入活動群組表
						$group_out_money +=$output_active_money;
						$indata['shopping_car_id'] = $this->order['id'];
						$indata['active_name'] = $v[0];
						$indata['price'] = $output_active_money;
						$indata['groupcount'] = $active_count;
						$indata['max_count'] = $count;
						$indata['create_date'] = date('Y-m-d H:i:s');
						$status = $this->conn->AutoExecute($this->actable,$indata,"INSERT");
						
						//--加上統計活動筆數
						$group_count += $active_count;
					}
					//strpos($value,'%')!=''
					
				}//--end 活動列表
			}
			return $group_out_money;
		}
		
		//--活動項目樹確認
		function active_group_check(){
			if ($this->active_group_count!=NULL){
				$check_count = $this->conn->GetRow("select sum(groupcount) as sum,max(groupcount) as count from ".$this->actable." where shopping_car_id='".quotes($this->order['id'])."'");
				$backcount = $check_count['sum']*1;
				if ($check_count['count']*1>0)
				if ($backcount>$this->active_group_count*1 && $this->active_any_other=='1'){
					$this->erromsg = $this->tags('CAR_ACTIVE_FULL_COUNT',array($this->active_group_count));//'已超過訂單活動數量限制'.$this->active_group_count.'，請刪除後再操作'
					return true;
				}else{
					//--判斷是否有多餘的餘數商品於訂單中
					$check_count = $this->conn->GetRow("select sum(count-decount) as sum from ".$this->cartable." where shopping_car_id='".quotes($this->order['id'])."' group by shopping_car_id");
					if ($backcount==$this->active_group_count && $check_count['sum']*1>0 && $this->active_any_other=='1'){
						$this->erromsg = $this->tags('CAR_ACTIVE_FULL_COUNT',array($this->active_group_count));//'已超過訂單活動數量限制'.$this->active_group_count.'，請刪除後再操作'
						return true;
					}else{
						return false;
					}
				}
			}else{
				return false;
			}
		}
		
		//-購物車商品現折活動更新
		function active_now_desh(){
			 if ($this->active_now_desh_array!=NULL){
				 
				 //--統計總折價
				 $sum_desh = 0;
				 
				 //-先取得目前購物車所有商品
				 $car_list =  $this->car_list();
				 
				 //--紀錄最好的一次結果
				$gd_active_money = 0;
				$gd_active_name = '';
				 
				 if ($car_list)
				 	foreach ($car_list as $k=>$v){//--先進行不疊加操作
						//--判斷是否在現折條件之中
						foreach ($this->active_now_desh_array as $a=>$b){
							if ($b[4]===NULL || $b[4]===true) continue;
							$now_desh_pro = explode(',',$b[1]);
							if (array_search($v['id'],$now_desh_pro)!==false){ //--判斷涵蓋在內
								unset($atv_pro_list);
								unset($atv_pro_data);
								$check_money = 0;
								foreach ($car_list as $z=>$y){
									if (in_array($y["id"],$now_desh_pro)){
										$check_money += ($y["count"]*$y["price2"]);
									}
								}

								if (strpos($b[3],'%')!=''){
									$check_money = round($check_money*str_replace('%','',$b[3])/100);
								}else{
									$check_money = floor($check_money/$b[2])*$b[3];
								}

								//-比對歷史最好紀錄
								if ($check_money>$gd_active_money){
									$gd_active_money = $check_money;
									$gd_active_name = $b[0];
								}
							}
						}
					}//---END foreach $car_list
					
				//---判斷疊加的現折活動
				if ($car_list)
						foreach ($this->active_now_desh_array as $a=>$b){ 
							if ($b[4]!==NULL && $b[4]===false) continue;
							
							$now_desh_pro = explode(',',$b[1]);
							if (array_search($v['id'],$now_desh_pro)!==false){ //--判斷涵蓋在內
								unset($atv_pro_list);
								unset($atv_pro_data);
								$check_money = 0;
								foreach ($car_list as $z=>$y){
									if (in_array($y["id"],$now_desh_pro)){
										$check_money += ($y["count"]*$y["price2"]);
									}
								}

								if (strpos($b[3],'%')!=''){
									$check_money = round($check_money*str_replace('%','',$b[3])/100);
								}else{
									$check_money = floor($check_money/$b[2])*$b[3];
								}
								
								//-比對歷史最好紀錄
								$gd_active_money += $check_money;
								if ($gd_active_name!='') $gd_active_name .= ',';
								$gd_active_name .= $b[0];
							}
						}//--end foreach 判斷現折條
					
				 //--寫入購物車商品活動表
				$indata['shopping_car_id'] = $this->order['id'];
				$indata['shopping_car_list_id'] = $v['shopping_car_list_id'];
				$indata['active_name'] = $gd_active_name;
				$indata['price'] = $gd_active_money;
				$indata['groupcount'] = '1';
				$indata['create_date'] = date('Y-m-d H:i:s');
				$status = $this->conn->AutoExecute($this->actable,$indata,"INSERT");
				
				$carlist["now_desh"] = $gd_active_money;
				$status = $this->conn->AutoExecute($this->cartable,$carlist,"UPDATE","shopping_car_list_id='".$v["shopping_car_list_id"]."'");
				
				$sum_desh += $gd_active_money; //--加總單次
				return $sum_desh;
			 }
			 //$active_now_desh_array; // array(活動名稱,涵蓋商品編號(X,X),滿額多少,折抵金額,是否疊加(預設是));
		}
		
		//--活動列表資料
		function active_list($sid=NULL){
			if ($sid==NULL){
				return $this->conn->GetArray($this->Prepare("select * from ".$this->actable." where shopping_car_id=?"),array($this->order['id']));
			}else{
				return $this->conn->GetArray($this->Prepare("select * from ".$this->actable." where shopping_car_id=?"),array($sid));
			}
		}
		
		///---增加其他非套裝商品項目 名稱 內容 總合 數量 疊加狀態
		function addother($name,$detail=NULL,$value,$count=1,$act=true,$sort=false){
			if ($sort!=false) $carlist["sort"] = $sort;
			//---判斷處理狀態是否為疊加
			if ($act){
				$temp = $this->car_list();
				if ($temp)
				foreach ($temp as $k=>$v){
					if ($v["name"]==$name && ($v["id"]=='0'||$v["id"]==NULL)){
						$carlist["count"] = $v["count"]*1+$count*1;
						$carlist["price2"] = $value*1;
						$carlist["update_date"] = date("Y-m-d H:i:s");
						$status = $this->conn->AutoExecute($this->cartable,$carlist,"UPDATE","shopping_car_list_id='".$v["shopping_car_list_id"]."'");
						return $this->reload();
					}
				}
			}
			
			//-判斷是否為百分比折扣
			if (count($this->deshprice)>0) {
				foreach ($this->deshprice as $k=>$v) {
					if ($this->deshtype[$k]=='%'){
						$deshprice[] = ceil($value*$this->deshprice[$k]/100);
					}else{
						$deshprice[] = $this->deshprice[$k];
					}
				}
				rsort($deshprice);
				$deshprice = $deshprice[0];
			}
			
			$carlist["status"] = '1';
			$carlist["type"] = 'shopping_car';
			$carlist["shopping_car_id"] = $this->order["id"];
			$carlist["count"] = $count*1;
			$carlist["price1"] = 0;
			$carlist["price2"] = $value*1 - $deshprice;
			$carlist["name"] = $name;
			$carlist["detail"] = quotes($detail);
			$carlist["create_date"] = date("Y-m-d H:i:s");
			$carlist["update_date"] = date("Y-m-d H:i:s");
			$status = $this->conn->AutoExecute($this->cartable,$carlist,"INSERT");
			if (!$status) {
				$this->erromsg = $this->tags('PRO_CARITEM_INSERT_FILED');//購物商品新增失敗!!
				return false;
			}
			return $this->reload();
		}
		
		
		//--購物車商品 清單
		/*
			購物車 or 訂單
			內容商品清單
		*/
		function car_list($order=NULL,$sort='update_date desc'){
			//--活動訊息
			$left_join = ' left join (select shopping_car_list_id as now_desh_link_id,active_name,price as active_price,groupcount from '.$this->actable.') as ac on ac.now_desh_link_id=shopping_car_list_id';
			
			//---判斷有參數抓取 參數訂單的商品列表
			switch ($order){
				case NULL:
					$data = $this->conn->GetArray("select * from ".$this->cartable." ".$left_join." where shopping_car_id='".quotes($this->order["id"])."' and status=1 order by ".$sort);				
				break;
				
				default:
					$data = $this->conn->GetArray("select * from ".$this->cartable." where shopping_car_id='".quotes($order)."' and status=1 order by ".$sort);		
				break;
			}
			
			if ($data)
			foreach ($data as $k=>$v){
				$pro_data = $this->conn->GetRow("select * from ".$this->protable." where id='".$v["id"]."'");
				if ($pro_data){
					$pro_data["size"] = explode('|__|',$pro_data["size"]);
					$pro_data["stock"] = explode('|__|',$pro_data["stock"]);
					$pro_data["stock_no"] = explode('|__|',$pro_data["stock_no"]);
					$pro_data["stock_status"] = explode('|__|',$pro_data["stock_status"]);
					$pro_data["stock_price"] = explode('|__|',$pro_data["stock_price"]);
					$pro_data["stock_pic"] = explode('|__|',$pro_data["stock_pic"]);
					$pro_data["color"] = explode('|__|',$pro_data["color"]);
				}
				if (array_search($v["size"],$pro_data["stock_no"])!==false){
					$key = array_search($v["size"],$pro_data["stock_no"]);
					$data[$k]["color_html"] = '<span class="color_output_html" style="background:#'.$pro_data["color"][$key].'">　</span>';
					$data[$k]["stock_no"] = $v["size"];
					$data[$k]["size"] = $pro_data["size"][$key];
				}
				$data[$k]["del_url"] = '&del='.$v["shopping_car_list_id"];
			}
			return $data;
			
		}
		
		//--購物車商品 移除
		function car_remove($value=NULL){
			if ($value==NULL){
				$this->conn->Execute("DELETE FROM ".$this->cartable." WHERE shopping_car_id in (".quotes($this->order["id"]).")");
			}else{
				$this->conn->Execute("DELETE FROM ".$this->cartable." WHERE shopping_car_list_id in (".quotes($value).")");
			}
			return $this->reload();
		}
		
		//-顯示目前 購物車資訊
		function car(){
			return $this->order;
		}
		
		//--運費設定
		function post_fee($p1,$np,$p2){
			$this->post_fee1 = $p1;
			$this->no_post_fee = $np;
			$this->post_fee2 = $p2;
		}
		
		//--已完成訂單列表
		function order_list($value=NULL,$star=0,$mount=NULL){
			global $_SESSION;
			
			//--獲取區間資料判斷
			$limitsql='';
			if ($star!=0){
				$limitsql = ' limit '.$star;
			}
			
			if ($mount!=NULL){
				if ($limitsql==''){
					$limitsql = ' limit 0';
				}
				$limitsql .= ','.$mount;
			}
			
			//--判斷有參數抓取 參數訂單
			if ($value!=NULL && is_numeric($value)){
				$temp = $this->conn->GetArray($this->Prepare("select * from ".$this->table." where status!=0 and step='2' and id=? order by create_date desc".$limitsql),array($value));
			}else if ($value!=NULL && trim($value)!=''){
				$temp = $this->conn->GetArray("select * from ".$this->table." where status!=0 and step='2' and ".$value." and member_id='".$_SESSION["login_info"][$this->namespace]["id"]."' order by create_date desc".$limitsql);
			}else{
				$temp = $this->conn->GetArray($this->Prepare("select * from ".$this->table." where status!=0 and step='2' and member_id=? order by create_date desc".$limitsql),array($_SESSION["login_info"][$this->namespace]["id"]));
			}
			return $temp;
		}
		
		///--紅利積點 兌換模式 值1,值2,模式
		function set_point($v1,$v2=1,$act=false){
			//--一般比率模式
			if ($act==false){
				$this->point = $v2/$v1; //--比率
			}else{//--特殊模式
				$this->point = $v1;
				$this->point_status = 1;//--開啟固定值兌換模式
			}
		}
		
		//--舊訂單重新轉換
		function pay_to_shoppingcar($order_no){
			$car_data = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where step!='1' and pay_status=0 and order_no=? and status!='-1'"),array($order_no));
			if ($car_data){
				$car_list = $this->conn->GetArray($this->Prepare("select * from ".$this->cartable." where shopping_car_id=?"),array($car_data["id"]));
				$change_car_list = array();
				if ($car_list){
					foreach ($car_list as $k=>$v){
						unset($v["shopping_car_list_id"]);
						$indata = $v;
						$indata["shopping_car_id"] = $this->order['id'];
						$this->conn->AutoExecute($this->cartable,$indata,"INSERT");
						
						///--回補庫存
						$s_p_list[] = $v["id"];
						$p_stock_search_sid[$v["id"]][] = $v["size"];
						$p_stock_search_count[$v["id"]][] = $v["count"];
					}
					//-逐個商品補回庫存
					$pro_list = $this->conn->GetArray("select * from ".$this->protable." where id in (".implode(',',$s_p_list).")");
					if ($pro_list)
						foreach ($pro_list as $k=>$v){
							$v["stock_no"] = explode('|__|',$v["stock_no"]);
							$v["stock"] = explode('|__|',$v["stock"]);
							if (count($p_stock_search_sid[$v["id"]])>0){
								foreach ($p_stock_search_sid[$v["id"]] as $a=>$b){
									$aid = array_search($b,$v["stock_no"]);
									if ($aid!==false){
										$v["stock"][$aid] += $p_stock_search_count[$v["id"]][$a];
									}
								}
							}
							$v["stock_no"] = implode('|__|',$v["stock_no"]);
							$v["stock"] = implode('|__|',$v["stock"]);
							$avalue = $this->conn->AutoExecute($this->protable,$v,"UPDATE"," id='".$v["id"]."'");
						}
				}
				//--設定已補回庫存數量 隱藏此訂單
				$up_status = $this->conn->Execute($this->Prepare("UPDATE ".$this->table." set order_no=?,cargo_back_status='1',status='-1' where id=?"),array($order_no,$this->order['id'])); //--隱藏原有訂單
				if ($up_status){
					//--返回已使用的紅利
					$member = new member($this->conn,$this->membertable);
					$member->getmember(" where id='".$car_data["member_id"]."'",'login');
					$check_status = $member->point_work($car_data['deshpoint'],' 失效訂單回購物車返還紅利');
					//--更改成未扣除點數支付狀態
					if ($check_status)
						$this->conn->Execute("UPDATE ".$this->table." SET deshpoint_status=0 where id='".$car_data["id"]."'");
					$this->erromsg = $this->tags('OLD_ORDER_ADD_TO_NEWCAR_FINSH'); //'已加入回購物車重新購物!!';
				}else{
					$this->erromsg = $this->tags('SYSTEM_ERRO'); //-系統異動失敗
				}
					
				return $up_status;
			}
			$this->erromsg = $this->tags('NOT_FOUND_ORDER');//無此訂單訊息
			return false;
		}
		
		//--結帳
		function paybill($data=NULL){
			$this->reload();
			
			if ($this->stock_mode!=0){	//--判斷是否需要扣除庫存
				if (!$this->stock()){
					return false;
				}
			}
			if (!$this->car_list()){
				$this->erromsg = $this->tags('CAR_ITEM_IS_NULL_TO_PAY');//購物車無商品無法結帳!!
				return false;
			}
			$unset_array = array('id','step','order_no','total','addpoint','addpoint_status','deshpoint_status','deshpoint','post_fee'); //--禁止寫入的資料
			foreach ($unset_array as $k=>$v){
				unset($data[$v]);
			}
			
			//--點數扣除
			if (class_exists('member') && $this->order['deshpoint']*1>0){
				$member = new member($this->conn,$this->membertable);
				$member->getmember(" where id='".$this->order["member_id"]."'",'login');
				$check_status = $member->point_work(($this->order['deshpoint']*-1),'購物使用紅利折抵');
				if ($check_status)
					$this->conn->Execute($this->Prepare("UPDATE ".$this->table." SET deshpoint_status=1 where id=?"),array($data["id"]));
			}
			
			$cardata = $data;
			$cardata["step"] = '2';
			$cardata["create_date"] = $cardata["update_date"] = date("Y-m-d H:i:s");
			$temp = $this->conn->AutoExecute($this->table,$cardata,"UPDATE","id='".$this->order["id"]."'");
			if ($temp){
				return $this->getorder(" where id='".$this->order["id"]."'");
			}else{
				return $temp;
			}
		}
		
		//--更新訂單資訊
		function update($data=NULL,$id=NULL,$check=true){
			global $_SESSION;
			
			//--正確性驗證
			if ($check) {
				$unset_array = array('id','step','order_no','total','addpoint','deshpoint','post_fee'); //--禁止寫入的資料
				foreach ($unset_array as $k=>$v){
					unset($data[$v]);
				}
			}
			$cardata['RID'] = $_SESSION['RID'];
			$cardata = $data;
			if ($id==NULL){
				$temp = $this->conn->AutoExecute($this->table,$cardata,"UPDATE","id='".$this->order["id"]."'");
			}else{
				$temp = $this->conn->AutoExecute($this->table,$cardata,"UPDATE","id='".$id."'");
			}
				
			if ($temp){
				return $this->getorder(" where id='".quotes($this->order["id"])."'");
			}else{
				return $temp;
			}
		}
		
		//--庫存扣數
		function stock(){
			//先取得購物車現有商品項目
			$s_product = $this->car_list();
			foreach ($s_product as $k=>$v){
				 
				$product = $this->conn->GetRow("select * from ".$this->protable." where id='".$v["id"]."'");
				$product["stock_no"] = explode('|__|',$product["stock_no"]);
				$product["stock"] = explode('|__|',$product["stock"]);
				//--購物車商品規格 不在 現有規格之中
				if (!in_array($v["size"],$product["stock_no"])){
					$this->erromsg = $this->tags('STOCK_IS_NOT_FOUND',array($v["name"],$v["size"]));//'商品 '.$v["name"].'  '.$v["size"].' 規格已不存在!!'
					return false;
				}
				foreach ($product["stock_no"] as $n1=>$n2){
					if ($v["size"]==$n2){	//--判斷規格相同
						if ($product["stock"][$n1]*1>=$v["count"]){//判斷庫存是否足夠
							$product["stock"][$n1] = $product["stock"][$n1]-$v["count"];
						}else{
							$this->erromsg = $this->tags('STOCK_COUNT_IS_LOW',array($v["name"],$v["count"],$v["size"],$product["stock"][$n1]));//'商品 '.$v["name"].' 庫存不足 '.$v["count"].',目前 '.$v["size"].' 剩下庫存 '.$product["stock"][$n1]
							return false;
						}
					}
				}
				$product["stock_no"] = implode('|__|',$product["stock_no"]);
				$product["stock"] = implode('|__|',$product["stock"]);
				$this->conn->AutoExecute($this->protable,$product,"UPDATE","id='".$v["id"]."'");
			}
			return true;
		}
		
		//--回復庫存量
		/*
			庫存因扣除後 超過訂單支付時間回復商品庫存量 (此功能適用於所有用戶群 非只當下用戶)
			使用 restock 欄位判斷已恢復
		*/
		function reset_stock(){
			$left_join = " left join (select shopping_car_list_id,shopping_car_id,id as pid,size,count,restock from ".$this->cartable." where restock=0) as car on car.shopping_car_id=id";
			$left_join .= " inner join (select id as proid,status as pstatus from ".$this->protable." where status=1) as pro on pro.proid=car.pid";
			$list_data = $this->conn->GetArray("select * from ".$this->table." ".$left_join." where step=2 and pay_status!=1 and create_date<='".date("Y-m-d H:i:s",strtotime("-".$this->stock_time." seconds"))."'");
			if ($list_data){
				
				//--帶出獲得的資料集
				foreach ($list_data as $k=>$v){
					if ($v["pid"]!=NULL && $v["pid"]!=''){
						$all_car_list_id[] = $v["shopping_car_list_id"]; //--購物車商品列表清單ID
						$all_pro_id[] = $v["pid"];	//--購物車包含的產品id
					}
				}
				
				//--產品資料擷取
				$pro_data = $this->conn->GetArray("select * from ".$this->protable." where id in (".implode(',',$all_pro_id).")");
				if ($pro_data)
					foreach ($pro_data as $k=>$v){
						$v["stock_no"] = explode('|__|',$v["stock_no"]);
						$v["stock"] = explode('|__|',$v["stock"]);
						$pro_list[$v["id"]] = $v;
					}
					
				//--針對資料操作
				foreach ($list_data as $k=>$v){
					$key_id = array_search($v["size"],$pro_list[$v["pid"]]["stock_no"]);
					$pro_list[$v["pid"]]["stock"][$key_id] += ($v["count"]);
				}
				
				//--產品資料回寫
				foreach ($pro_list as $k=>$v){
					$v["stock_no"] = implode('|__|',$v["stock_no"]);
					$v["stock"] = implode('|__|',$v["stock"]);
					$this->conn->AutoExecute($this->protable,$v,"UPDATE"," id='".$k."'");
				}
				
				//--購物車商品列表資料回寫
				$this->conn->Execute("UPDATE ".$this->cartable." SET restock=1 WHERE shopping_car_list_id in (".implode(',',$all_car_list_id).")");
			}//--end if
				
		}
		
		
		//--庫存判斷 產品編號,規格,目標數量
		function check_stock($pid,$size,$count){
			//--判斷是否庫存模式
			if ($this->stock_mode!=0){
				$product = $this->conn->GetRow($this->Prepare("select * from ".$this->protable." where id=? and status=1"),array($pid));
				//$temp_pro["size"] = explode('|__|',$product["size"]);
				$temp_pro["size"] = explode('|__|',$product["stock_no"]);
				$temp_pro["stock"] = explode('|__|',$product["stock"]);
				
				//-先分解來源size 
				$temp = explode(',',$size);
				$size = $temp[0];
				//--購物車商品規格 不在 現有規格之中
				if (!in_array($size,$temp_pro["size"])){
					$this->erromsg = $this->tags('STOCK_IS_NOT_FOUND',array($product["name"],$size));//'商品 '.$product["name"].'  '.$size.' 規格已不存在!!'
					return false;
				}
				foreach ($temp_pro["size"] as $n1=>$n2){
					if ($size==$n2){	//--判斷規格相同
						if ($temp_pro["stock"][$n1]*1<$count*1){//判斷庫存是否足夠
							//'商品 '.$product["name"].' \n規格:'.implode('/',$temp).'\n庫存不足 '.$count.',目前 '.$size.' 剩下庫存 '.$temp_pro["stock"][$n1]
							$this->erromsg = $this->tags('STOCK_COUNT_IS_LOW2',array($product["name"],implode('/',$temp),$count,$size,$temp_pro["stock"][$n1]));
							return false;
						}
					}
				}
			}
			return true;
		}
		
		//--申請退貨商品 (訂單物品編號)
		function back_item($id){
			//--檢測商品詳細
			$temp_item = $this->conn->GetRow($this->Prepare("select * from ".$this->cartable." where shopping_car_list_id=?"),array($id));
			if (!$temp_item){
				$this->erromsg = $this->tags('PRO_ERRO'); //商品錯誤!!
				return false;
			}
			$temp_order = $this->conn->GetRow("select * from ".$this->table." where id ='".$temp_item["shopping_car_id"]."'");
			if (!$temp_order) {
				$this->erromsg = $this->tags('ORDER_ERRO_TO_BACKITEM');//此商品訂單錯誤無法進行退貨
				return false;
			}else if ($temp_order["step"]=='1'){
				$this->erromsg = $this->tags('ORDER_NOW_IS_SHOPCAR');//購物車環境中無法申請退貨
				return false;
			}else if ($temp_order["pay_status"]!='1'){ //-- 判斷是否已付款
				$this->erromsg = $this->tags('ORDER_STATUS_NOT_SAME');//訂單狀態不符!! 需為已付款才可申請退貨
				return false;
			}
			
			//--如果為成立的訂單轉換成退貨訂單
			if ($temp_order["step"]=='2'){
				$temp_order["step"]='3';
				$this->conn->AutoExecute($this->table,$temp_order,"UPDATE","id='".$temp_order["id"]."'");
			}
			
			//--修改訂單內物品狀態
			$temp_item["status"] = '2';
			$this->conn->AutoExecute($this->cartable,$temp_item,"UPDATE","shopping_car_list_id='".$temp_item["shopping_car_list_id"]."'");
			
			if (!$this->back_reload($temp_order["id"])){
				$this->erromsg = $this->tags('ORDER_BACK_INTOFILE_ERRO');//'退貨訂單寫入失敗!!'
				return false;
			}else{
				return true;
			}
		}
		
		//--退款訂單資料重新記錄
		function back_reload($order_id){
			//-抓取出訂單中需要退貨的商品
			$temp_item = $this->conn->GetArray($this->Prepare("select * from ".$this->cartable." where shopping_car_id=? and status='2'"),array($order_id));
			foreach ($temp_item as $k=>$v){
				$back_total += $v["count"]*$v["price2"];
			}
			$write["back_total"] = $back_total;
			return $this->conn->AutoExecute($this->table,$write,"UPDATE","id='".quotes($order_id)."'");
		}
		
		//--確認付款
		function paycheck($order_no){
			$carlist["pay_status"] = 1; //--付款狀態
			$carlist["paymode_status"] = 1;//--金流付款狀態
			$check_data = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where order_no=?"),array($order_no));
			//--點數發放
			$this->pay_point($check_data);
			//--第一次收到付款完成 則寄通知信 否者 都當作已付款已發送通知
			if ($check_data["pay_status"]!='1')
				$this->ispay_mail($order_no);
			return $this->conn->AutoExecute($this->table,$carlist,"UPDATE","order_no='".$check_data["order_no"]."'");
		}
		
		//--訂單點數發放
		// patten $data 訂單資料
		function pay_point($data,$memo=''){
			if (!is_array($data))
				$data = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where id=?"),array($data));
				
			if ($data && $data["member_id"]!='' && $data["addpoint_status"]!='1' && class_exists('member')){
				$member = new member($this->conn,$this->membertable);
				$member->getmember(" where id='".$data["member_id"]."'",'login');
				$ind['shopping_car_id'] = $data["id"];
				$member->point_work($data["addpoint"],($memo!='' ? $memo:'訂單'.$order_no.'交易成功返回紅利'),$ind);
				$this->conn->Execute("UPDATE ".$this->table." SET addpoint_status=1 where id='".$data["id"]."'");
			}
		}
		
		//--訂單點數回收
		function back_point($data,$memo=''){
			if (!is_array($data))
				$data = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where id=?"),array($data));
				
			if ($data && $data["member_id"]!='' && $data["addpoint_status"]=='1' && class_exists('member')){
				$member = new member($this->conn,$this->membertable);
				$member->getmember(" where id='".$data["member_id"]."'",'login');
				$ind['shopping_car_id'] = $data["id"];
				$member->point_work(($data["addpoint"]*-1),($memo!='' ? $memo:'訂單'.$order_no.'移除紅利'),$ind);
				$this->conn->Execute("UPDATE ".$this->table." SET addpoint_status=0 where id='".$data["id"]."'");
			}
		}
		
		//--訂單成功信件
		function ispay_mail($order_no){
			global $mail; //-smtp
			global $smtp_set; //-smtp資料設定
			global $web_set;
			global $tpl; //-樣板
			global $lang; //-語系
			global $_SETUP;
			
			//網站設定 $web_set
			$sql = $this->Prepare(" select * from ".PREFIX."setting WHERE lang=? order by id");
			$tmp = $this->conn->GetArray($sql,array(quotes($lang)));
			$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
			$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
			$web_set["receive_email"] = $tmp["2"]["detail"];
			$web_set["send_email"] = $tmp["4"]["detail"];
			$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];
			
			
			//--前段網址取得
			$temp = explode('/',substr($_SERVER['PHP_SELF'],1));
			$temp_url = explode('/',$_SERVER['SERVER_PROTOCOL']);
			$temp_url = $temp_url[0].'://'.$_SERVER["HTTP_HOST"].'/';
			if (count($temp)>1) {
				for ($i=0;$i<count($temp)-1;$i++){
					$temp_url .= $temp[$i].'/';
				}
			}
			
			$temp = $this->conn->GetRow($this->Prepare("select * from ".$this->table." where order_no=?"),array($order_no));
			
			
			$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
			$mail->AddAddress($temp["recive_email"]);
			$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
			$mail->Subject = $this->data_mail_insert($temp,$web_set["title"].' [訂單編號] 訂單付款完成通知信件');    // 設定郵件標題        
			$mail->Body = $this->data_mail_insert($temp,($this->order_mail_pay_body[$temp['paycardmode']] ? $this->order_mail_pay_body[$temp['paycardmode']]:"訂單:[訂單編號] 訂單總額:[購物總額] 已付款完成!!"));
			$mail->Send();
			$mail->ClearAddresses();
			$temp_mail = explode(',',$web_set["receive_email"]);
			foreach ($temp_mail as $k=>$v){
				$mail->AddAddress($v);
			}
			$mail->Send();
		}
		
		//--訂購信件 (訂單資料,導回 )
		function order_mail_send($pay_bill,$callback=NULL){
			global $mail; //-smtp
			global $smtp_set; //-smtp資料設定
			global $web_set;
			global $tpl; //-樣板
			global $lang; //-語系
			//網站設定 $web_set
			$sql = $this->Prepare(" select * from ".PREFIX."setting WHERE lang=? order by id");
			$tmp = $this->conn->GetArray($sql,array(quotes($lang)));
			$web_set["title"] = deQuotes($tmp["0"]["detail"],-1);
			$web_set["keyword"] = deQuotes($tmp["1"]["detail"],-1);
			$web_set["receive_email"] = $tmp["2"]["detail"];
			$web_set["send_email"] = $tmp["4"]["detail"];
			$web_set["favorite_url"] = "http://".$_SERVER["HTTP_HOST"];
			
			
			//--前段網址取得
			$temp = explode('/',substr($_SERVER['PHP_SELF'],1));
			$temp_url = explode('/',$_SERVER['SERVER_PROTOCOL']);
			$temp_url = $temp_url[0].'://'.$_SERVER["HTTP_HOST"].'/';
			if (count($temp)>1) {
				for ($i=0;$i<count($temp)-1;$i++){
					$temp_url .= $temp[$i].'/';
				}
			}
			
			//--資料載入
			$data["order"] = $pay_bill;
			$data["pro_title"] = array('購物編號','商品名稱','數量','單價');
			$data["pro"] = $this->car_list($pay_bill["id"]);
			if ($data["pro"])
			foreach ($data["pro"] as $k=>$v){
					$data["pro"][$k]["img_html"] = '<img src="'.$temp_url.'upload/products/'.$v["pic"][0].'" url="'.$temp_url.'upload/products/'.$v["pic"][0].'" width="100" height="75" />';
			}
			
			//--郵件上下版訊息
			if ($this->order_mail_msg_top!=NULL){
				$data["msg"]["top_msg"] = $this->order_mail_msg_top[$pay_bill["paycardmode"]];
				$data["msg"]["top_msg"] = $this->data_mail_insert($pay_bill,$data["msg"]["top_msg"]);
			}
			if ($this->order_mail_msg_foot!=NULL){
				$data["msg"]["foot_msg"] = $this->order_mail_msg_foot[$pay_bill["paycardmode"]];
				$data["msg"]["foot_msg"] = $this->data_mail_insert($pay_bill,$data["msg"]["foot_msg"]);
			}
			if ($this->order_mail_title!=NULL){
				$subject = $this->order_mail_title[$pay_bill["paycardmode"]];
				$subject = $this->data_mail_insert($pay_bill,$subject);
			}else{
				$subject = $web_set["title"].' 訂單確認信件';
			}
			
			ob_start(); 	//打開快取
			$tpl->assign("data",$data);
			$tpl->display($this->order_template);
			$cache_string = ob_get_contents(); //接收快取頁面
			ob_end_clean(); //關閉快取
			
			//--寫入發送次數
			$this->conn->Execute($this->Prepare("UPDATE ".$this->table." SET ismailsend=ismailsend+1 where id=?"),array($pay_bill["id"]));

			//---關閉錯誤訊息
			$mail->SMTPDebug = false;
			$mail->do_debug = 0;
			
			$mail->From = $web_set["send_email"];         // 設定寄件者信箱        
			$mail->AddAddress($pay_bill["recive_email"]);
			$mail->FromName = $web_set["title"];                 // 設定寄件者姓名              
			$mail->Subject = ($pay_bill['ismailsend']*1>0 ? "(補發)":"").$subject;    // 設定郵件標題        
			$mail->Body = $cache_string;
			$mail->Send();
			
			
			//--分開寄送給管理者
			$mail->ClearAddresses();
			$temp_mail = explode(',',$web_set["receive_email"]);
			foreach ($temp_mail as $k=>$v){
				$mail->AddAddress($v);
			}
			if($mail->Send()){
				//已寄送訂單內容至郵件中
				if ($callback) echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."<script>alert('".$this->tags('ORDER_PAYBILL_MAIL_MESG')."!!');window.location.href='".$callback."';</script>";
			}else{
				print_r($smtp_set["detail"]);
				exit;
			}

		}
		
		/*訂單寄信訊息資訊置入*/
		function data_mail_insert($order,$data){
			$mailbody = $data;
			$mailbody = str_replace('[訂單編號]',$order["order_no"],$mailbody);
			$mailbody = str_replace('[出貨狀態]',$_SETUP["shipped"][$order['cargo_status']],$mailbody);
			$mailbody = str_replace('[付款狀態]',$_SETUP["payment_status"][$order["pay_status"]],$mailbody);
			$mailbody = str_replace('[建立時間]',$order["create_date"],$mailbody);
			$mailbody = str_replace('[購物總額]',($order["total"]*1+$order["post_fee"]*1),$mailbody);
			$mailbody = str_replace('[收件人]',$order["recive_name"],$mailbody);
			$mailbody = str_replace('[收件人地址]',$order["recive_address"],$mailbody);
			$mailbody = str_replace('[收件人信箱]',$order["recive_email"],$mailbody);
			$mailbody = str_replace('[收件人電話]',$order["phone"],$mailbody);
			$mailbody = str_replace('[備註訊息]',$order["memo"],$mailbody);
			return $mailbody;
		}
}

?>