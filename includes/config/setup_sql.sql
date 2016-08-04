
CREATE TABLE `datasetup_admin` (
  `id` int(20) NOT NULL auto_increment,
  `account` varchar(20) NOT NULL,
  `group_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) default NULL COMMENT '忘記密碼信箱',
  `status` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_name` varchar(20) NOT NULL,
  `update_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- 列出以下資料庫的數據： `datasetup_admin`
-- 

INSERT INTO `datasetup_admin` VALUES (13, 'admin', 4, 'General_Manager', 'a16ccd12a67fabd004546e80201624b0', '', 1, '2011-07-19 15:03:57', '2014-03-11 15:59:18', 'admin', 'service');
INSERT INTO `datasetup_admin` VALUES (14, 'service', 8, 'vipcase', '7fef6171469e80d32c0559f88b377245', '', 1, '2013-04-30 18:17:48', '2014-03-11 15:59:18', 'admin', 'service');
INSERT INTO `datasetup_admin` VALUES (16, 'vipadmin', 7, 'sys_administrator', '95be9281570d744d884a8aa4f7c72759', 'jones@vipcase.net', 1, '2014-03-11 15:53:39', '2014-08-18 16:51:46', 'service', 'vipadmin');

-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_admin_group`
-- 

CREATE TABLE `datasetup_admin_group` (
  `id` int(20) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `lang_auth` varchar(20) default NULL COMMENT '授權語系',
  `auth` text,
  `control` int(11) default NULL,
  `status` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_name` varchar(20) NOT NULL,
  `update_name` varchar(20) NOT NULL,
  `auth_ch` text COMMENT '程式生成欄位',
  `auth_en` text COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9;

-- 
-- 列出以下資料庫的數據： `datasetup_admin_group`
-- 

INSERT INTO `datasetup_admin_group` VALUES (4, '管理者', '', '293,298,182,315,354,353,372,373,374,355,375,120,121,122,123,124,125', 1, 1, '2011-07-19 15:17:26', '2014-03-18 16:04:24', 'admin', 'vipadmin', NULL, NULL);
INSERT INTO `datasetup_admin_group` VALUES (7, '系統管理員', '', '293,298,342,337,338,348,182,315,401,402,403,404,405,387,389,388,390,391,399,392,400,406,120,121,122,123,124,377,378,376,125,396,398', 0, 1, '2014-03-11 15:50:00', '2016-06-03 10:14:14', 'service', 'vipadmin', '293,298,342,498,491,492,493,182,315,387,389,406,488,489,120,121,122,123,124,377,378,376,125,396,398,490,499,500,501,502,503', '425,426,427,428,429,430,418,419,420,421,422,423,424,431,435,433,436,437,432,438,434,439,415,417,416,407,408,412,413,411,409,410,414');
INSERT INTO `datasetup_admin_group` VALUES (8, '客戶管理者', '', '293,298,342,337,338,348,182,315,401,402,403,404,405,387,389,388,390,391,399,392,400,120,121,122,123,124,377,125,396', 2, 1, '2014-03-11 15:58:32', '2016-01-15 17:03:39', 'service', 'vipadmin', '492,389,493,293,298,342,497,182,315,387,488,491,494,406,489,495,496,120,121,122,123,124,125,396', NULL);

-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_category`
-- 

CREATE TABLE `datasetup_category` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `root_id` mediumint(8) unsigned NOT NULL default '0',
  `parent_id` mediumint(8) NOT NULL default '0',
  `lft` int(10) NOT NULL default '0',
  `rgt` int(10) NOT NULL default '0',
  `name` varchar(200) NOT NULL,
  `detail` text,
  `sort` smallint(5) unsigned NOT NULL default '0',
  `pic` text,
  `file` text,
  `memo` text,
  `status` tinyint(1) NOT NULL default '1',
  `mode` varchar(20) default NULL,
  `depth` tinyint(2) NOT NULL default '0',
  `sys` tinyint(1) NOT NULL default '0',
  `lang` varchar(5) default NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `update_name` varchar(15) NOT NULL,
  `create_name` varchar(15) NOT NULL,
  `max_count` text COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`),
  KEY `status` (`status`),
  KEY `sys` (`sys`),
  KEY `parent_id` (`parent_id`),
  KEY `root_id` (`root_id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 
-- 列出以下資料庫的數據： `datasetup_category`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_language`
-- 

CREATE TABLE `datasetup_language` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `detail` varchar(20) default NULL,
  `status` int(2) NOT NULL default '1',
  `sort` int(3) default NULL,
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

-- 
-- 列出以下資料庫的數據： `datasetup_language`
-- 

INSERT INTO `datasetup_language` VALUES (1, '中文', 'ch', 1, 1, '2014-03-20 10:42:15', '2014-03-20 11:37:34');

-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_member`
-- 

CREATE TABLE `datasetup_member` (
  `id` int(20) NOT NULL auto_increment,
  `namespace` text NOT NULL COMMENT '所屬命名空間',
  `type` varchar(20) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `mode` varchar(10) NOT NULL default 'normal' COMMENT 'FB會員=>''fb''一般會員=>''normal''',
  `account` varchar(50) NOT NULL,
  `name` varchar(50) default NULL,
  `id_num` varchar(10) default NULL COMMENT '身份證字號',
  `sex` varchar(20) default NULL,
  `pic` text,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) default NULL,
  `address` varchar(100) default NULL,
  `birthday` varchar(50) default NULL,
  `phone` varchar(50) default NULL,
  `cellphone` varchar(20) default NULL,
  `point` int(10) default '0',
  `status` tinyint(1) default '0',
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `create_name` varchar(30) default NULL,
  `update_name` varchar(30) default NULL,
  `followlist` text COMMENT '追蹤名單',
  `fb` varchar(200) default NULL,
  `file` text COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- 
-- 列出以下資料庫的數據： `datasetup_member`
-- 

INSERT INTO `datasetup_member` VALUES (1, '', 'vip', 'ch', 'normal', 'gn006', 'Jones', 'F122844940', '1', '', 'b3fa1a10f4631645c605d1004c1afb9b', 'Jones2@vipcase.net', '新北市瑞芳區吉慶里中央路48巷162號3樓', '2013-12-05', '0922222222', '0922222222', 930, 1, '2015-01-19 18:04:41', '2015-07-24 16:38:33', '', 'vipadmin', '', NULL, '143627687014.png');

-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_setting`
-- 

CREATE TABLE `datasetup_setting` (
  `id` int(20) NOT NULL auto_increment,
  `lang` varchar(20) NOT NULL default 'ch',
  `type` varchar(20) default NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=一般 2=優化關鍵字',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_name` varchar(20) NOT NULL,
  `update_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- 
-- 列出以下資料庫的數據： `datasetup_setting`
-- 

INSERT INTO `datasetup_setting` VALUES (1, 'ch', '', '網站名稱', '網站名稱', 1, '0000-00-00 00:00:00', '2015-07-23 15:55:33', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (2, 'ch', '', '優化關鍵字', '<meta name=\\"keywords\\" content=\\"關鍵字\\">\r\n<meta name=\\"description\\" content=\\"關鍵字內文\\">\r\n<meta name=\\"RATING\\" content=\\"general\\">\r\n<meta name=\\"REVISIT-AFTER\\" content=\\"1 Days\\">\r\n<meta name=\\"ROBOTS\\" content=\\"all\\">\r\n<meta name=\\"googlebot\\" content=\\"index,follow\\">', 2, '0000-00-00 00:00:00', '2015-07-23 15:55:33', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (3, 'ch', '', '收件者 E-Mail', 'Jones@vipcase.net', 1, '0000-00-00 00:00:00', '2015-07-23 15:55:33', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (4, 'ch', '', '寄件者 標題', 'XXX 系統郵件', 1, '0000-00-00 00:00:00', '2015-07-23 15:55:33', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (5, 'ch', '', '寄件者 E-Mail', 'Jones@vipcase.net', 1, '0000-00-00 00:00:00', '2015-07-23 15:55:33', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (16, 'ch', 'post_fee', '運費', '200', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (17, 'ch', '', '紅利折抵上限(每個商品)', '50', 0, '0000-00-00 00:00:00', '2014-01-22 18:38:58', '', 'service');
INSERT INTO `datasetup_setting` VALUES (18, 'ch', '', '加入會員贈送紅利點數', '100', 3, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (19, 'ch', '', 'GOOGLE地圖', '<iframe width=\\"425\\" height=\\"350\\" frameborder=\\"0\\" scrolling=\\"no\\" marginheight=\\"0\\" marginwidth=\\"0\\" src=\\"https://maps.google.com.tw/maps?hl=zh-TW&ie=UTF8&ll=23.48575,119.49965&spn=9.854536,16.21582&t=m&z=7&brcurrent=3,0x346ef3065c07572f:0xe711f004bf9c5469,1&output=embed\\"></iframe><br /><small><a href=\\"https://maps.google.com.tw/maps?hl=zh-TW&ie=UTF8&ll=23.48575,119.49965&spn=9.854536,16.21582&t=m&z=7&brcurrent=3,0x346ef3065c07572f:0xe711f004bf9c5469,1&source=embed\\" style=\\"color:#0000FF;text-align:left\\">顯示詳細地圖</a></small>', 2, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (20, 'ch', '', '首頁跑馬燈文字', '2013/8/27 隆重開幕 KASK安全帽特價中', 1, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (21, 'ch', '', '首頁跑馬燈連結', 'tw.yahoo.com', 1, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (22, 'ch', '', 'YouTube 視頻連結', 'https://www.youtube.com/watch?v=44yXE5dC6I0', 1, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (25, 'ch', '', '全站統一折扣率', '0', 1, '0000-00-00 00:00:00', '2014-01-13 10:56:13', '', 'admin');
INSERT INTO `datasetup_setting` VALUES (46, 'ch', 'website_url', '網域導向頁面', 'index.php?class=demo', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (44, 'ch', 'backup', '資料庫備份路徑', '../upload/database_backup/', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (42, 'ch', 'button', '檔案上傳按鈕連結', 'index.php?class=qa&id=99', 1, '0000-00-00 00:00:00', '2014-06-25 11:18:29', '', 'service');
INSERT INTO `datasetup_setting` VALUES (43, 'ch', 'google_map', 'google map嵌入式語法', '<iframe width="230" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.tw/maps?hl=zh-TW&amp;q=%E9%AB%98%E9%9B%84%E5%B8%82%E5%B7%A6%E7%87%9F%E5%8D%80%E7%AB%8B%E6%96%87%E8%B7%AF+77+%E8%99%9F&amp;ie=UTF8&amp;hq=&amp;hnear=813%E9%AB%98%E9%9B%84%E5%B8%82%E5%B7%A6%E7%87%9F%E5%8D%80%E7%AB%8B%E6%96%87%E8%B7%AF77%E8%99%9F&amp;t=m&amp;brcurrent=3,0x346e05a2921bd1c9:0xcee6f0be1e1a3c09,0,0x346e43517a7a741b:0x4826a24a54732a37&amp;ll=22.664314,120.304413&amp;spn=0.049106,0.019655&amp;z=14&amp;iwloc=A&amp;output=embed" style="border:solid 1px #fff;"></iframe><br><small><a href="https://maps.google.com.tw/maps?hl=zh-TW&amp;q=%E9%AB%98%E9%9B%84%E5%B8%82%E5%B7%A6%E7%87%9F%E5%8D%80%E7%AB%8B%E6%96%87%E8%B7%AF+77+%E8%99%9F&amp;ie=UTF8&amp;hq=&amp;hnear=813%E9%AB%98%E9%9B%84%E5%B8%82%E5%B7%A6%E7%87%9F%E5%8D%80%E7%AB%8B%E6%96%87%E8%B7%AF77%E8%99%9F&amp;t=m&amp;brcurrent=3,0x346e05a2921bd1c9:0xcee6f0be1e1a3c09,0,0x346e43517a7a741b:0x4826a24a54732a37&amp;ll=22.664314,120.304413&amp;spn=0.049106,0.019655&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#474d44;text-align:left; font:11px/24px Arial;">顯示詳細地圖</a></small>', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_setting` VALUES (47, 'ch', 'delay_time', '管理登入閒置時間(秒)', '3600', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (48, 'ch', 'design', '商品資料最大組數', '5', 3, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (49, 'ch', 'design', '簡介資訊最大組數', '5', 3, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (50, 'ch', 'design', '最新消息最大組數', '5', 3, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (51, 'ch', 'design', '分類最大組數', '2', 3, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (52, 'ch', 'no_post_fee', '免運費金額', '1600', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (53, 'ch', 'post_fee2', '達到金額運費', '0', 1, '0000-00-00 00:00:00', '2015-01-20 18:27:52', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (45, 'ch', 'demo_show', '頁面建構中自訂義', '<span style=\\"font-size:36px;\\"><b>網站建構中</b></span>', 3, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');
INSERT INTO `datasetup_setting` VALUES (54, 'ch', 'web_css', '編輯器前台式樣檔應用路徑', 'css/main.css', 1, '0000-00-00 00:00:00', '2015-07-23 15:49:36', '', 'vipadmin');

-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_shopping_car`
-- 

CREATE TABLE `datasetup_shopping_car` (
  `id` int(20) NOT NULL auto_increment,
  `namespace` text NOT NULL COMMENT '存放命名空間',
  `step` tinyint(1) default '1' COMMENT '購物流程指標',
  `order_no` VARCHAR( 30 ) NOT NULL COMMENT '定單序號',
  `total` int(20) default '0' COMMENT '總價(不含折價 不含運費)',
  `deshpoint` int(11) default NULL COMMENT '扣除紅利點',
  `addpoint` int(11) default NULL COMMENT '新增紅利點',
  `post_fee` int(10) default '0' COMMENT '運費',
  `back_total` int(20) default NULL COMMENT '退款總額',
  `back_money` int(20) default NULL COMMENT '已退金額',
  `paycardmode` tinyint(1) default '0' COMMENT '刷卡方式 1=聯邦 2=國泰世華 3=花旗 4=中信',
  `MerchantNumber` varchar(50) default NULL COMMENT '金流串接商店編號',
  `Code` varchar(30) default NULL COMMENT '金流串接商店編號對應code',
  `Period` tinyint(1) default '0' COMMENT '分期期數',
  `member_id` int(20) default NULL,
  `type` varchar(100) NOT NULL default 'shopping_car',
  `lang` varchar(20) default NULL,
  `status` tinyint(1) default NULL,
  `pay_status` tinyint(1) default '0' COMMENT '付款狀態',
  `paymode_status` varchar(10) default '0' COMMENT '金流狀態 0未付款 1已付款 9失效狀態',
  `cargo_status` tinyint(1) default '0' COMMENT '出貨狀態',
  `email` varchar(50) default NULL,
  `sex` varchar(50) default NULL,
  `company` varchar(50) default NULL,
  `country` varchar(50) default NULL,
  `zip` varchar(50) default NULL,
  `contact_time` varchar(50) default NULL,
  `recive_name` varchar(50) default NULL,
  `recive_email` varchar(50) default NULL,
  `recive_address` varchar(100) default NULL,
  `recive_zip` varchar(50) default NULL,
  `recive_sex` varchar(50) default NULL,
  `recive_takemode` varchar(20) default NULL COMMENT '取貨方式',
  `invoice` varchar(10) default NULL COMMENT '發票類型',
  `unity_no` varchar(40) default NULL COMMENT '統一編號',
  `unity_title` varchar(20) default NULL,
  `checksum` varchar(50) default NULL COMMENT '金流md5檢查碼',
  `name` varchar(30) default NULL,
  `birthday` varchar(30) default NULL,
  `phone` varchar(30) default NULL,
  `cellphone` varchar(30) default NULL,
  `address` text,
  `memo` text COMMENT '備註',
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `cargo_date` datetime default NULL COMMENT '出貨時間',
  `create_name` varchar(20) default NULL,
  `update_name` varchar(20) default NULL,
  `ATMcode` text COMMENT 'ATM轉帳後四碼',
  `order_img` longtext COMMENT '訂單圖像',
  `ismailsend` int(11) NOT NULL default '0' COMMENT '訂單確認信件發送次數',
  `buy_name` varchar(100) default NULL COMMENT '購買人姓名',
  `buy_sex` varchar(2) default NULL COMMENT '購買人性別',
  `buy_email` varchar(100) default NULL COMMENT '購買人信箱',
  `buy_phone` varchar(20) default NULL COMMENT '購買人電話',
  `buy_cellphone` varchar(20) default NULL COMMENT '購買人手機',
  `buy_zipcode` varchar(10) default NULL COMMENT '購買人郵遞區號',
  `buy_address` varchar(200) default NULL COMMENT '購買人地址',
  `buy_memo` text COMMENT '購買人備註說明',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `datasetup_shopping_car`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_shopping_car_list`
-- 

CREATE TABLE `datasetup_shopping_car_list` (
  `shopping_car_list_id` int(20) NOT NULL auto_increment,
  `shopping_car_id` int(20) NOT NULL,
  `count` int(10) NOT NULL default '1',
  `id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `lang` varchar(20) default NULL,
  `size` text,
  `name` varchar(50) default NULL,
  `detail` text COMMENT '程式自動生成',
  `point` int(11) default NULL COMMENT '獲得紅利點數',
  `depoint` int(11) default NULL COMMENT '可刪減多少紅利',
  `pic` text,
  `sort` int(20) default NULL,
  `status` tinyint(4) default NULL,
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `create_name` varchar(20) default NULL,
  `update_name` varchar(20) default NULL,
  `price1` int(10) default '0' COMMENT '原價',
  `price2` int(20) default '0' COMMENT '特價',
  `stock` int(10) default '0',
  `protype` int(20) default NULL COMMENT '商品種類root_id=1',
  `probrand` int(20) default NULL COMMENT '商品品牌root_id=2',
  `restock` int(11) NOT NULL default '0' COMMENT '是否已恢復庫存',
  PRIMARY KEY  (`shopping_car_list_id`),
  KEY `type` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `datasetup_shopping_car_list`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `datasetup_sysmenu`
-- 

CREATE TABLE `datasetup_sysmenu` (
  `id` int(20) NOT NULL auto_increment,
  `lv` int(20) NOT NULL COMMENT '類似ID 判斷開關 辨識身份',
  `lang` varchar(10) NOT NULL default 'ch' COMMENT '語系',
  `floor` int(20) NOT NULL COMMENT '此分類階層',
  `sort` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL default '0',
  `selector` text COMMENT 'jQueryselector',
  `ifview` tinyint(1) NOT NULL,
  `parents` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_name` varchar(20) NOT NULL,
  `update_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=530 ;

-- 
-- 列出以下資料庫的數據： `datasetup_sysmenu`
-- 

INSERT INTO `datasetup_sysmenu` VALUES (84, 123, 'ch', 0, 6, '其他管理', '', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (83, 122, 'ch', 1, 2, '後台帳號群組清單', 'admin_group.php', '', 1, '120', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (81, 120, 'ch', 0, 5, '後台帳號管理', '', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (82, 121, 'ch', 1, 1, '後台帳號清單', 'admin.php', '', 1, '120', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (85, 124, 'ch', 1, 1, '使用者管理', 'self.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (86, 125, 'ch', 1, 5, '網站設定', 'setting.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (155, 182, 'ch', 0, 4, '首頁管理', 'about.php', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (320, 293, 'ch', 0, 2, '商品管理', '', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (325, 298, 'ch', 1, 1, '商品分類', 'category.php?mode=1', '', 1, '293', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (357, 315, 'ch', 1, 1, '首頁EDM', 'about.php?class=EDM&id=lang', '', 1, '182', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (382, 337, 'ch', 0, 3, '會員管理', '', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (383, 338, 'ch', 1, 1, '會員清單', 'member.php', '', 1, '337', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (388, 342, 'ch', 1, 2, '商品項目', 'products2.php', '', 1, '293', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (394, 348, 'ch', 1, 2, '訂單管理', 'preferential.php', '', 1, '337', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (444, 396, 'ch', 1, 6, 'smtp郵件伺服器', 'about.php?class=smtp_mail&id=lang', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (529, 478, 'ch', 1, 3, '會員分類', 'about.php?class=memberdesh', '', 1, '337', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (435, 387, 'ch', 0, 4, '頁面管理', '', '', 1, '0', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (424, 376, 'ch', 1, 4, '語系管理', 'language.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (425, 377, 'ch', 1, 2, '系統目錄管理', '_sysmenu_set.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (426, 378, 'ch', 1, 3, '後台操作記錄', 'system_temp.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (528, 477, 'ch', 1, 4, '通用色彩管理', 'about.php?class=allcolor', '', 1, '473', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (437, 389, 'ch', 1, 0, '品牌故事', 'about.php?class=about&id=lang', '', 1, '387', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (524, 473, 'ch', 0, 1, '特製化管理', '', '', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (525, 474, 'ch', 1, 1, '帽片色彩管理', 'about.php?class=pickcolor', '', 1, '473', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (526, 475, 'ch', 1, 2, '模組圖庫', 'about.php?class=pic_mode', '', 1, '473', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (527, 476, 'ch', 1, 3, '字形管理', 'about.php?class=font', '', 1, '473', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (446, 398, 'ch', 1, 7, '主機網域跳轉設定', 'url_rewrite.php', '', 1, '123', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (457, 406, 'ch', 1, 8, '聯絡我們', 'about.php?class=contact&id=lang', '', 1, '387', '0000-00-00 00:00:00', '2015-07-16 10:44:02', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (539, 488, 'ch', 1, 15, '訂單信件訊息', 'about.php?class=paymail', '', 1, '387', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (540, 489, 'ch', 1, 16, '出貨信件訊息', 'about.php?class=cargomail', '', 1, '387', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (541, 490, 'ch', 1, 8, '商品分類主要目錄', 'catemode.php', '', 1, '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (542, 491, 'ch', 0, 3, '活動管理', '', '', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (543, 492, 'ch', 1, 1, '任選商品活動', 'about.php?class=shop_active_any', '', 1, '491', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (544, 493, 'ch', 1, 2, '現金折抵', 'about.php?class=active_desh', '', 1, '491', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `datasetup_sysmenu` VALUES (552, 498, 'ch', 1, 4, '表單資料', 'form.php?class=form', '', 1, '293', '0000-00-00 00:00:00', '2016-01-19 23:07:36', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (553, 499, 'ch', 1, 9, '表單項目設定', 'form_set.php?class=form_set', '', 1, '123', '0000-00-00 00:00:00', '2016-01-19 23:07:36', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (554, 500, 'ch', 1, 10, '主機檔案目錄管理', 'dir_manage.php', '', 1, '123', '0000-00-00 00:00:00', '2016-06-03 10:11:51', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (555, 501, 'ch', 0, 6, '樣板管理', '', '', 1, '0', '0000-00-00 00:00:00', '2016-06-03 10:11:51', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (556, 502, 'ch', 1, 1, '主版面管理', 'design.php?type=main', '', 1, '501', '0000-00-00 00:00:00', '2016-06-03 10:11:51', '', 'vipadmin');
INSERT INTO `datasetup_sysmenu` VALUES (557, 503, 'ch', 1, 2, '子板塊管理', 'design.php?type=ban', NULL, 1, '501', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

CREATE TABLE `datasetup_data_list` (
  `id` int(20) NOT NULL auto_increment,
  `type` varchar(100) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `name` text COMMENT '程式自動生成',
  `detail` text COMMENT '程式自動生成',
  `pic` text,
  `file` text,
  `sort` double default '0',
  `status` tinyint(4) default NULL,
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `create_name` varchar(20) default NULL,
  `update_name` varchar(20) default NULL,
  `href` text COMMENT '程式自動生成',
  `followid` text COMMENT '程式生成欄位',
  `class` text COMMENT '程式生成欄位',
  `size_name` text COMMENT '程式生成欄位',
  `size_value` text COMMENT '程式生成欄位',
  `b_name` text COMMENT '程式生成欄位',
  `new_type` text COMMENT '程式生成欄位',
  `b_value` text COMMENT '程式生成欄位',
  `title_pic` text COMMENT '程式生成欄位',
  `class2` text COMMENT '程式生成欄位',
  `memo` text COMMENT '程式生成欄位',
  `bname` text COMMENT '程式生成欄位',
  `key1` text COMMENT '程式生成欄位',
  `key2` text COMMENT '程式生成欄位',
  `key3` text COMMENT '程式生成欄位',
  `key4` text COMMENT '程式生成欄位',
  `parent_id` text COMMENT '程式生成欄位',
  `depth` text COMMENT '程式生成欄位',
  `post_date` text COMMENT '程式生成欄位',
  `member_id` text COMMENT '程式生成欄位',
  `small_pic` longtext COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE `datasetup_products` (
  `id` int(20) NOT NULL auto_increment,
  `type` varchar(100) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `name` varchar(50) default NULL,
  `detail` text COMMENT '程式自動生成',
  `pic` text,
  `sort` int(20) default NULL,
  `status` tinyint(4) default NULL,
  `point` varchar(10) default NULL COMMENT '獲得紅利',
  `depoint` int(11) default '0' COMMENT '紅利折扣',
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `create_name` varchar(20) default NULL,
  `update_name` varchar(20) default NULL,
  `price1` int(10) NOT NULL default '0' COMMENT '原價',
  `price2` int(20) NOT NULL default '0' COMMENT '特價',
  `price_desh` double default NULL COMMENT '折扣',
  `stock` text,
  `protype` int(20) NOT NULL COMMENT '商品種類root_id=1',
  `probrand` int(20) NOT NULL COMMENT '商品品牌root_id=2',
  `del_pic` varchar(100) default NULL COMMENT '程式自動生成',
  `protype_other` text,
  `probrand_other` text,
  `cook` varchar(10) default NULL COMMENT '是否啟用線上食譜',
  `add_pro` text COMMENT ' 加價購商品',
  `add_price` text COMMENT '加價購商品價錢',
  `add_count` text COMMENT '加價購商品數量',
  `add_pic` text COMMENT '加價購圖片',
  `class` varchar(100) default NULL COMMENT '程式自動生成',
  `memo_1` varchar(100) default NULL COMMENT '程式自動生成',
  `href` varchar(100) default NULL COMMENT '程式自動生成',
  `prolist` varchar(100) default NULL COMMENT '程式自動生成',
  `size` text COMMENT '程式生成欄位',
  `memo` text COMMENT '程式生成欄位',
  `color` text COMMENT '程式生成欄位',
  `stock_no` text COMMENT '程式生成欄位',
  `small_pic` longtext COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;


CREATE TABLE `datasetup_shopping_car_groups` (
  `id` int(11) NOT NULL auto_increment,
  `shopping_car_id` int(11) NOT NULL,
  `shopping_car_list_id` int(11) default NULL,
  `active_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `groupcount` int(11) NOT NULL default '0' COMMENT '活動組合數量',
  `create_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `datasetup_design` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(50) default NULL,
  `lang` varchar(20) default 'ch',
  `parent_id` int(11) default NULL,
  `b_name` varchar(100) default NULL,
  `name` varchar(50) default NULL,
  `detail` text,
  `temp_file` text COMMENT '樣板檔案',
  `status` int(11) default '1',
  `sort` int(11) default NULL,
  `create_name` varchar(50) default NULL,
  `update_name` varchar(50) default NULL,
  `create_date` datetime default NULL,
  `update_date` datetime default NULL,
  `member_id` text COMMENT '程式生成欄位',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
INSERT INTO `datasetup_design` VALUES (1, 'main', 'ch', NULL, 'index', '首頁', '<%file=top%>\r\n<video width=\\"689\\" height=\\"384\\" autoplay=\\"autoplay\\" controls=\\"\\" oncontextmenu=\\"return false;\\" poster=\\"upload/vipcase/02ed8a6e4ea5ce637c78656f62505289.jpg\\">\r\n        <source src=\\"fileauth.php?file=upload/test.mp4\\" type=\\"video/mp4\\">\r\n        Your browser does not support the video tag.\r\n      </video>\r\n<!--  EDM -->\r\n<style>\r\n.div_edm{\r\n	height:405px;\r\n	width:1000px;\r\n	position:relative;\r\n}\r\n</style>\r\n<div class=\\"edm\\">\r\n    <div class=\\"div_edm\\" idx=\\"1\\">\r\n   <img src=\\"images/edm/edm-bg.png\\" bg=\\"1\\" left=\\"10\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"1\\"/>\r\n   <!--<img src=\\"images/edm/edm01-05.png\\" width=\\"300\\" height=\\"350\\" left=\\"450\\" top=\\"30\\" mode=\\"fadin\\" zindex=\\"10\\"/>-->\r\n   <img src=\\"images/edm/edm01-02.png\\" width=\\"1000\\" height=\\"1166\\" left=\\"-50\\" top=\\"-30\\" mode=\\"amz\\" zindex=\\"10\\" style=\\"opacity:0;\\" effect=\\"width:300px;height:350px;left:340;top:30;opacity:1;\\"/>\r\n   <!--<img src=\\"images/edm/edm01-03.png\\" left=\\"320\\" top=\\"90\\" mode=\\"fadin\\" zindex=\\"9\\"/>-->\r\n   <img src=\\"images/edm/edm01-05.png\\" left=\\"670\\" top=\\"80\\" width=\\"200\\" mode=\\"amz\\" zindex=\\"9\\" style=\\"opacity:0;\\" effect=\\"left:600;opacity:1;\\"/>\r\n   <img src=\\"images/edm/edm01-04.png\\" width=\\"200\\" left=\\"130\\" top=\\"100\\" mode=\\"amz\\" zindex=\\"7\\"  style=\\"opacity:0;\\" effect=\\"left:200;opacity:1;\\"/>\r\n   <img src=\\"images/edm/edm01-03.png\\" left=\\"60\\" top=\\"140\\" width=\\"100\\" mode=\\"amz\\" zindex=\\"6\\" style=\\"opacity:0;\\" effect=\\"left:130;opacity:1;\\"/>\r\n   <img src=\\"images/edm/edm01-01.png\\" width=\\"250\\" left=\\"770\\" top=\\"90\\" mode=\\"amz\\" zindex=\\"7\\"  style=\\"opacity:0;\\" effect=\\"left:700;opacity:1;\\"/>\r\n     </div>\r\n  <div class=\\"div_edm\\" idx=\\"2\\">\r\n	<img src=\\"images/edm/edm-bg.png\\" bg=\\"1\\" left=\\"10\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"1\\"/>\r\n    <img src=\\"images/edm/edm02-01.png\\" left=\\"250\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"10\\"/>\r\n    <img src=\\"images/edm/edm02-02.png\\" delay=\\"0\\" left=\\"480\\" top=\\"150\\" mode=\\"fadin\\" zindex=\\"9\\"/>\r\n    <img src=\\"images/edm/edm02-03.png\\" left=\\"280\\" top=\\"330\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm02-04.png\\" left=\\"650\\" top=\\"20\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm02-05.png\\" delay=\\"0\\" width=\\"10\\" height=\\"10\\" left=\\"684\\" top=\\"130\\" mode=\\"amz\\" zindex=\\"7\\" effect=\\"width:264px; height:212px; opacity:1;\\" style=\\"opacity:0;\\"/>\r\n    <img src=\\"images/edm/edm02-06.png\\" left=\\"660\\" top=\\"330\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n </div>\r\n <div class=\\"div_edm\\" idx=\\"3\\">\r\n	<img src=\\"images/edm/edm-bg.png\\" delay=\\"0\\" bg=\\"1\\" left=\\"10\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"1\\"/>\r\n    <img src=\\"images/edm/edm03-01.png\\" delay=\\"0\\" left=\\"250\\" top=\\"20\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm03-02.png\\" delay=\\"0\\" width=\\"10\\" left=\\"283\\" top=\\"164\\" mode=\\"amz\\" zindex=\\"7\\" effect=\\"width:280px; opacity:1;\\" style=\\"opacity:0;\\"/>\r\n    <img src=\\"images/edm/edm03-03.png\\" delay=\\"0\\" left=\\"600\\" top=\\"200\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm03-04.png\\" left=\\"900\\" top=\\"20\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n </div>\r\n  <div class=\\"div_edm\\" idx=\\"4\\">\r\n	<img src=\\"images/edm/edm-bg.png\\" delay=\\"0\\" bg=\\"1\\" left=\\"10\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"1\\"/>\r\n    <img src=\\"images/edm/edm04-01.png\\" delay=\\"0\\" left=\\"190\\" top=\\"100\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n	<img src=\\"images/edm/edm04-02.png\\" delay=\\"0\\" left=\\"360\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm04-03.png\\" delay=\\"0\\" left=\\"500\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm04-04.png\\" delay=\\"0\\" left=\\"640\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm04-05.png\\" left=\\"800\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n </div>\r\n  <div class=\\"div_edm\\" idx=\\"5\\">\r\n	<img src=\\"images/edm/edm-bg.png\\" bg=\\"1\\" left=\\"10\\" top=\\"0\\" mode=\\"fadin\\" zindex=\\"1\\"/>\r\n    <img src=\\"images/edm/edm05-01.png\\" delay=\\"0\\" left=\\"190\\" top=\\"40\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-04.png\\" delay=\\"0\\" left=\\"230\\" top=\\"200\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-07.png\\" left=\\"290\\" top=\\"210\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-05.png\\" delay=\\"0\\" left=\\"350\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n  	<img src=\\"images/edm/edm05-02.png\\" delay=\\"0\\" left=\\"390\\" top=\\"40\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n	<img src=\\"images/edm/edm05-04.png\\" delay=\\"0\\" left=\\"440\\" top=\\"200\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-08.png\\" left=\\"500\\" top=\\"210\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-05.png\\" delay=\\"0\\" left=\\"550\\" top=\\"120\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-03.png\\" delay=\\"0\\" left=\\"600\\" top=\\"40\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-06.png\\" delay=\\"0\\" left=\\"650\\" top=\\"200\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n    <img src=\\"images/edm/edm05-09.png\\" left=\\"760\\" top=\\"40\\" mode=\\"fadin\\" zindex=\\"7\\"/>\r\n </div>\r\n</div>\r\n<script>\r\nvar edm_idx_obj = \\''div.div_edm\\'';	//--場景物件\r\nvar edm_show_time = 1000;			//物件出現間隔\r\nvar edm_delay_time = 2000;			//轉場延遲\r\nvar temp_edm_idx=1;\r\nvar temp_edm_obj=-1;\r\n$(edm_idx_obj+\\'':not([idx=\\"\\''+temp_edm_idx+\\''\\"])\\'').hide();\r\n$(edm_idx_obj).find(\\''img:not([bg=\\"1\\"])\\'').hide();\r\n$(edm_idx_obj).find(\\''img\\'').css(\\''position\\'',\\''absolute\\'');\r\ndcoo = window.setInterval(\\"edm_idx_change()\\",edm_show_time);\r\nfunction edm_idx_change(){\r\n	$(edm_idx_obj+\\'':not([idx=\\"\\''+temp_edm_idx+\\''\\"])\\'').hide();\r\n	switch (temp_edm_obj){\r\n		default:\r\n			if ($(edm_idx_obj+\\''[idx=\\"\\''+temp_edm_idx+\\''\\"]\\'').find(\\''img\\'').length<=temp_edm_obj){\r\n				temp_edm_obj = -1;\r\n				temp_edm_idx++;\r\n				window.clearInterval(dcoo);\r\n				window.setTimeout(\\"re_edm()\\",edm_delay_time-edm_show_time);\r\n				return;\r\n			}else{\r\n				temp_edm_obj++;\r\n			}\r\n		break;\r\n	}\r\n	$(edm_idx_obj+\\''[idx=\\"\\''+temp_edm_idx+\\''\\"]\\'').show();\r\n	\r\n	now_edm_obj = $(edm_idx_obj+\\''[idx=\\"\\''+temp_edm_idx+\\''\\"]\\'').find(\\''img\\'').eq(temp_edm_obj); //-目標物件\r\n	if ($(now_edm_obj).attr(\\"bg\\")!=null){\r\n		return edm_idx_change();\r\n	}\r\n	switch ($(now_edm_obj).attr(\\"mode\\")){\r\n		case \\"fadin\\":\r\n			if ($(now_edm_obj).attr(\\''left\\'')!=null) $(now_edm_obj).css(\\''left\\'',$(now_edm_obj).attr(\\''left\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''top\\'')!=null) $(now_edm_obj).css(\\''top\\'',$(now_edm_obj).attr(\\''top\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''zindex\\'')!=null) $(now_edm_obj).css(\\''z-index\\'',$(now_edm_obj).attr(\\''zindex\\''));\r\n			$(now_edm_obj).fadeIn();\r\n		break;\r\n		case \\"amz\\":\r\n			temp_edm_amz = new Object();\r\n			$(now_edm_obj).show();\r\n			if ($(now_edm_obj).attr(\\''width\\'')!=null) $(now_edm_obj).css(\\''width\\'',$(now_edm_obj).attr(\\''width\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''height\\'')!=null) $(now_edm_obj).css(\\''height\\'',$(now_edm_obj).attr(\\''height\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''left\\'')!=null) $(now_edm_obj).css(\\''left\\'',$(now_edm_obj).attr(\\''left\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''top\\'')!=null) $(now_edm_obj).css(\\''top\\'',$(now_edm_obj).attr(\\''top\\'')+\\''px\\'');\r\n			if ($(now_edm_obj).attr(\\''zindex\\'')!=null) $(now_edm_obj).css(\\''z-index\\'',$(now_edm_obj).attr(\\''zindex\\''));\r\n			for (aa in $(now_edm_obj).attr(\\''effect\\'').split(\\'';\\'')){\r\n				for (bb in $(now_edm_obj).attr(\\''effect\\'').split(\\'';\\'')[aa].split(\\'':\\'')){\r\n					if ($(now_edm_obj).attr(\\''effect\\'').split(\\'';\\'')[aa].split(\\'':\\'')[0].trim()!=\\''\\'')\r\n					temp_edm_amz[$(now_edm_obj).attr(\\''effect\\'').split(\\'';\\'')[aa].split(\\'':\\'')[0].trim()] = $(now_edm_obj).attr(\\''effect\\'').split(\\'';\\'')[aa].split(\\'':\\'')[bb];\r\n				}\r\n			}\r\n			if (temp_edm_amz[\\"opacity\\"]!=null) $(now_edm_obj).css(\\''opacity\\'',0);\r\n			$(now_edm_obj).animate( temp_edm_amz,\\"slow\\" );\r\n		break;\r\n	}\r\n	//--判斷是否無延遲\r\n	if ($(now_edm_obj).attr(\\"delay\\")!=null){\r\n		window.clearInterval(dcoo);\r\n		window.setTimeout(\\"edm_delay();\\",$(now_edm_obj).attr(\\"delay\\")*1);\r\n		return;\r\n	}\r\n}\r\nfunction re_edm(){\r\n	if ($(edm_idx_obj+\\''[idx=\\"\\''+temp_edm_idx+\\''\\"]\\'').html()==null){//--找不到主物件回到第一層\r\n		$(edm_idx_obj).find(\\''img:not([bg=\\"1\\"])\\'').hide();\r\n		temp_edm_idx = 1;\r\n	}\r\n		dcoo = window.setInterval(\\"edm_idx_change()\\",edm_show_time);\r\n}\r\nfunction edm_delay(){\r\n	edm_idx_change();\r\n	window.clearInterval(dcoo);\r\n	dcoo = window.setInterval(\\"edm_idx_change()\\",edm_show_time);\r\n}\r\n</script>\r\n\r\n<!--  優惠活動 、超值回饋 -->\r\n<div class=\\"index-main\\">\r\n  <div class=\\"index-event\\">\r\n     <ul>\r\n     	({section name=lb loop=$data.left_banner.pic})\r\n       <li><a href=\\"({$data.left_banner.href[lb]})\\"><img src=\\"upload/bannerleft/({$data.left_banner.pic[lb]})\\" width=\\"344\\" height=\\"160\\" /></a></li>\r\n       	({/section})\r\n     </ul>\r\n  </div>\r\n  \r\n  <div class=\\"index-feedback\\">\r\n    <h3><img src=\\"images/index-feedback.png\\" width=\\"288\\" height=\\"38\\" /></h3>\r\n     <ul>\r\n     ({section name=rb loop=$data.right_banner.pic})\r\n       <li><a href=\\"({$data.right_banner.href[rb]})\\"><img src=\\"upload/bannerright/({$data.right_banner.pic[rb]})\\" width=\\"289\\" height=\\"89\\" /></a></li>\r\n     ({/section})\r\n     </ul>\r\n  </div>\r\n  \r\n</div>\r\n\r\n\r\n<!--  拼點子特色、經典圖款、拼個好點子 -->\r\n<div class=\\"index-main\\">\r\n\r\n<div class=\\"index-pro-list01\\"><!-- 拼點子特色 -->\r\n  <h3 class=\\"title\\"><img src=\\"images/index-title01.png\\" width=\\"1000\\" height=\\"38\\" /></h3>\r\n  <ul class=\\"clearfix\\">\r\n  		({section name=gp loop=$data.gp})\r\n      <li> <a href=\\"({$data.gp[gp].href})\\"><img src=\\"upload/gp/({$data.gp[gp].pic})\\" width=\\"140\\" height=\\"140\\" class=\\"pro-photo\\" /></a>\r\n        <h3><img src=\\"images/index-dot-pro.png\\" width=\\"12\\" height=\\"12\\" /> ({$data.gp[gp].name})</h3>\r\n        <p>({$data.gp[gp].detail})</p>\r\n      </li>\r\n      	({/section})\r\n  </ul>\r\n  <!--<a href=\\"pro-list.html\\"><img src=\\"images/btn-more.png\\" width=\\"88\\" height=\\"17\\" class=\\"btn-more\\" /></a>-->\r\n</div>\r\n\r\n\r\n\r\n<div class=\\"index-pro-list02\\"><!-- 經典圖款 -->\r\n  <h3 class=\\"title\\"><img src=\\"images/index-title02.png\\" width=\\"1000\\" height=\\"38\\" /></h3>\r\n  <ul class=\\"clearfix\\">\r\n  		({section name=cl loop=$data.classic.pic})\r\n      <li> <a href=\\"({$data.classic.href[cl]})\\"><img src=\\"upload/classic/({$data.classic.pic[cl]})\\" width=\\"140\\" height=\\"140\\" class=\\"pro-photo\\" /></a>\r\n        <h3><img src=\\"images/index-dot-pro.png\\" width=\\"12\\" height=\\"12\\" /> ({$data.classic.name[cl]})</h3>\r\n      </li>\r\n      	({/section})\r\n  </ul>\r\n  <!--<a href=\\"pro-list.html\\"><img src=\\"images/btn-more.png\\" width=\\"88\\" height=\\"17\\" class=\\"btn-more\\" /></a>-->\r\n</div>\r\n\r\n\r\n<div class=\\"index-pro-list02\\"><!-- 拼個好點子 -->\r\n  <h3 class=\\"title\\"><img src=\\"images/index-title03.png\\" width=\\"1000\\" height=\\"38\\" /></h3>\r\n  <ul class=\\"clearfix\\">\r\n  	({section name=gpc loop=$data.gpic.pic})\r\n    <li> <a href=\\"({$data.gpic.href[gpc]})\\"><img src=\\"upload/gpic/({$data.gpic.pic[gpc]})\\" width=\\"140\\" height=\\"140\\" class=\\"pro-photo\\" /></a>\r\n      <h3><img src=\\"images/index-dot-pro.png\\" width=\\"12\\" height=\\"12\\" /> ({$data.gpic.name[gpc]})</h3>\r\n    </li>\r\n    ({/section})\r\n  </ul>\r\n  <!--<a href=\\"pro-list.html\\"><img src=\\"images/btn-more.png\\" width=\\"88\\" height=\\"17\\" class=\\"btn-more\\" /></a>-->\r\n</div>\r\n\r\n\r\n</div>', NULL, 1, 9, 'vipadmin', 'vipadmin', '2016-06-03 10:45:44', '2016-06-03 11:28:14', '');
INSERT INTO `datasetup_design` VALUES (2, 'ban', 'ch', NULL, 'top', '上板', '<!DOCTYPE html PUBLIC \\"-//W3C//DTD XHTML 1.0 Transitional//EN\\" \\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\\">\r\n<html xmlns=\\"http://www.w3.org/1999/xhtml\\">\r\n<head>\r\n<meta http-equiv=\\"Content-Type\\" content=\\"text/html; charset=utf-8\\" />\r\n\r\n<title>({$web_set.title})</title>\r\n({$web_set.keyword})\r\n<script type=\\"text/javascript\\" src=\\"includes/js/jquery.js\\"></script>\r\n<script type=\\"text/javascript\\" src=\\"includes/js/func_js.js\\"></script>\r\n<script type=\\"text/javascript\\" src=\\"includes/js/script.js\\"></script>\r\n\r\n<link href=\\"style/style.css\\" rel=\\"stylesheet\\" type=\\"text/css\\" />\r\n</head>\r\n<body>\r\n<div class=\\"header\\">\r\n\r\n<a href=\\"index.php\\"><img src=\\"images/logo.png\\" width=\\"258\\" height=\\"76\\" class=\\"logo\\" /></a>\r\n<div class=\\"top-tool\\">\r\n	搜尋<input type=\\"text\\" id=\\"seach_word\\" value=\\"({$data.pageget.seach_word})\\"  placeholder=\\"請輸入產品關鍵字詞\\"><input type=\\"button\\" value=\\"搜索\\" onclick=\\"search_pro();\\">\r\n  ({$data.login_html})\r\n  <a href=\\"shopping.php?list=1\\">購 物 車</a>\r\n  <select name=\\"select\\" id=\\"langobj\\" onchange=\\"change_lang()\\">\r\n        <option>--Language--</option>\r\n        <option value=\\"ch\\">繁體中文</option>\r\n        <option value=\\"cn\\">簡体中文</option>\r\n        <option value=\\"jp\\">日本語</option>\r\n        <option value=\\"en\\">English</option>\r\n  </select>\r\n  <script>\r\n  function change_lang(){\r\n	  switch (document.getElementById(\\''langobj\\'').value){\r\n		  case \\"ch\\":\r\n		  		window.location.href = \\''/\\'';\r\n		  break;\r\n		  case \\"cn\\":\r\n		  		window.location.href = \\''lang/simplified.html\\'';\r\n		  break;\r\n		  case \\"jp\\":\r\n		  		window.location.href = \\''lang/jp.html\\'';\r\n		  break;\r\n		  case \\"en\\":\r\n		  		window.location.href = \\''lang/en.html\\'';\r\n		  break;\r\n	  }\r\n  }\r\n  </script>\r\n  <script>\r\n  function search_pro(){\r\n	  window.location.href= \\''index.php?class=product&seach_word=\\'' + $(\\''#seach_word\\'').val();\r\n  }\r\n  </script>\r\n</div>\r\n	<div class=\\"menu\\">\r\n    <ul>\r\n      <li><a href=\\"index.php?class=news\\" class=\\"menu01\\"></a></li>\r\n      <li><a href=\\"index.php?class=ac\\" class=\\"menu02\\"></a></li>\r\n      <li><a href=\\"index.php?class=product\\" class=\\"menu03\\"></a></li>\r\n      <li><a href=\\"index.php?class=Customization\\" class=\\"menu04\\"></a></li>\r\n      <li><a href=\\"index.php?class=work\\" class=\\"menu05\\"></a></li>\r\n      <li><a href=\\"index.php?class=contact\\" class=\\"menu06\\"></a></li>\r\n    </ul>\r\n  </div>\r\n</div>', NULL, 1, 1, 'vipadmin', 'vipadmin', '2016-06-03 11:27:55', '2016-06-03 11:27:55', '');
INSERT INTO `datasetup_design` VALUES (3, 'main', 'ch', NULL, 'news', '最新消息', '<%file=top%>\r\n<div class=\\"main clearfix\\">\r\n\r\n<div class=\\"col-01\\">\r\n  <div class=\\"left-news\\">\r\n  </div>\r\n</div>\r\n   \r\n     <div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">最新消息</h2>\r\n  ({if $data.pageget.id==null})\r\n  <div class=\\"main-box\\">\r\n        <div class=\\"news-lis\\">\r\n            <ul>\r\n            	({section name=n loop=$data.list})\r\n                <li><a href=\\"index.php?class=({$data.pageget.class})&id=({$data.list[n].id})\\">({$data.list[n].name})</a></li>\r\n                ({/section})\r\n            </ul>\r\n        </div>\r\n        <div class=\\"page\\">全部共 ({$data.row_count}) 筆 (每頁 ({$data.mount}) 筆)　　({$data.page1})　　　({$data.page3})　　前往第\r\n          <form name=\\"form\\" id=\\"form\\" style=\\"display:inline-block;\\">\r\n            <select name=\\"jumpMenu\\" id=\\"jumpMenu\\" onchange=\\"MM_jumpMenu(\\''parent\\'',this,0)\\">\r\n              ({$data.page_option})\r\n            </select>\r\n          </form>\r\n          頁</div>\r\n  </div>\r\n  ({else})\r\n  <div class=\\"main-box\\">\r\n        <h3 class=\\"news-title\\">({$data.one.name})</h3>\r\n        <div class=\\"news-content\\">\r\n			({$data.one.detail})\r\n        </div>\r\n        <div class=\\"back\\"><a href=\\"javascript:window.history.back()\\"><img src=\\"images/btn_back.png\\" width=\\"78\\" height=\\"29\\"></a></div>\r\n  </div>\r\n  ({/if})\r\n  \r\n</div>\r\n   \r\n</div>', NULL, 1, 8, 'vipadmin', 'vipadmin', '2016-06-03 11:31:58', '2016-06-03 11:31:58', '');
INSERT INTO `datasetup_design` VALUES (4, 'main', 'ch', NULL, 'member_join', '加入會員', '<%file=top%>\r\n<div class=\\"col-01\\">\r\n\r\n  <div class=\\"mem-col\\">\r\n\r\n  </div>\r\n</div>\r\n<script type=\\"text/javascript\\" src=\\"includes/js/datepick/jquery.datepick.js\\"></script>\r\n<script type=\\"text/javascript\\" src=\\"includes/js/datepick/jquery.datepick-zh-TW.js\\"></script>\r\n<link href=\\"includes/js/datepick/jquery.datepick.css\\" rel=\\"stylesheet\\" type=\\"text/css\\">\r\n<script>\r\n$(document).ready(function (){\r\n		$(\\''[name=\\"birthday\\"]\\'').datepick( { \r\n			dateFormat: \\''yyyy-mm-dd\\'',\r\n			showTrigger: \\''<img src=\\"images/icon_date.png\\" width=\\"22\\" height=\\"22\\">\\''\r\n		}); \r\n});\r\nreset_code = function (){\r\n	$(\\''[src=\\"verifycode.php\\"]\\'')[0].src = $(\\''[src=\\"verifycode.php\\"]\\'').attr(\\"src\\");\r\n}\r\n</script>\r\n<div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">會員註冊</h2>\r\n\r\n     <div class=\\"main-box\\">\r\n\r\n     <div>\r\n       <h3 class=\\"from-title\\">\r\n        <img src=\\"images/icon_arrow.png\\" width=\\"16\\" height=\\"15\\"> 基本資料 <span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       \r\n       <div class=\\"cart-forms\\">\r\n       <form id=\\"login_from\\" action method=\\"post\\">\r\n           <ul>\r\n               <li><span class=\\"td-left\\">* 會員帳號 : </span><span class=\\"td-right\\"><input name=\\"account\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"會員帳號\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 會員密碼 :</span><span class=\\"td-right\\"><input name=\\"password\\" type=\\"password\\" class=\\"input-style01\\" alt=\\"會員密碼\\"> 需8位數以上</span></li>\r\n               <li><span class=\\"td-left\\">* 確認密碼 :</span><span class=\\"td-right\\"><input id=\\"password\\" type=\\"password\\" class=\\"input-style01\\" alt=\\"確認密碼\\"> 需8位數以上</span></li>\r\n               <li><span class=\\"td-left\\">* 您的姓名 :</span><span class=\\"td-right\\"><input name=\\"name\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"您的姓名\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 聯絡地址 :</span><span class=\\"td-right\\"><input name=\\"address\\" type=\\"text\\" class=\\"input-style01\\" size=\\"50\\" alt=\\"聯絡地址\\"></span></li>\r\n               <li><span class=\\"td-left\\">* E-mail :</span><span class=\\"td-right\\"><input name=\\"email\\" type=\\"text\\" class=\\"input-style01\\" size=\\"50\\" alt=\\"E-mail\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 電話號碼 :</span><span class=\\"td-right\\"><input name=\\"phone\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"電話號碼\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 性別：</span><span class=\\"td-right\\"><input name=\\"sex\\" type=\\"radio\\" id=\\"radio\\" value=\\"radio\\" checked=\\"1\\">\r\n                 男\r\n                 <input type=\\"radio\\" name=\\"sex\\" id=\\"radio2\\" value=\\"2\\">\r\n               女</span></li>\r\n               \r\n               <li><span class=\\"td-left\\">出生日期 : </span><span class=\\"td-right\\"><input name=\\"birthday\\" type=\\"text\\" class=\\"input-style01\\" size=\\"10\\"> \r\n                 </span></li>\r\n                 \r\n                <li><span class=\\"td-left\\">驗 證 碼 : </span><span class=\\"td-right\\"><input name=\\"code\\" type=\\"text\\" class=\\"input-style01\\" size=\\"10\\" alt=\\"驗證碼\\"> \r\n                 <img src=\\"verifycode.php\\" width=\\"52\\" height=\\"22\\"> <a href=\\"javascript:reset_code();\\" class=\\"reset\\">刷新驗證碼</a> (請輸入圖片中的數字或字母)</span></li>\r\n            </ul>\r\n       </form>\r\n       </div>\r\n     </div>\r\n\r\n       <!-- 收件人資料 -->\r\n       <div style=\\"padding:10px 0 10px 150px; height:50px; clear:both;\\"><span style=\\"padding:10px 0 10px 150px; height:50px; clear:both; text-align:\\">\r\n        <a href=\\"javascript:join_checkform();\\" class=\\"btn-style01\\">資料送出</a></span><a href=\\"javascript:window.length.reload();\\" class=\\"btn-style02\\">重新填寫</a>\r\n       </div>\r\n\r\n     </div>\r\n</div>\r\n<script>\r\nvar reg = /^\\\\w+((-\\\\w+)|(\\\\.\\\\w+))*\\\\@[A-Za-z0-9]+((\\\\.|-)[A-Za-z0-9]+)*\\\\.[A-Za-z0-9]+$/;\r\nvar check_array = [\\''form#login_from input.input-style01\\'']; //--要檢查空值得陣列物件\r\nvar erro_msg;\r\nvar check_star = 0;\r\nfunction join_checkform(){\r\n	erro_msg=\\''\\'';\r\n	for(aa in check_array){\r\n		$(check_array[aa]).each(function(idx,data){\r\n			$(data).parent().find(\\''[vail=\\"vail\\"]\\'').remove();//--先移除後方的*字號\r\n			if ($(data).attr(\\''alt\\'')!=null&&($(data).val()==\\''\\''||$(data).val()==null)) {\r\n				if (check_star) $(data).parent().append(\\''<font vail=\\"vail\\" color=\\"red\\">*</font>\\'');\r\n				erro_msg += $(data).attr(\\''alt\\'')+\\'' 欄位不可為空值!!\\\\n\\'';\r\n			}else if ($(data).attr(\\''name\\'')==\\''email\\'' && !reg.test($(data).val())) {\r\n				if (check_star) $(data).parent().append(\\''<font vail=\\"vail\\" color=\\"red\\">*格式錯誤</font>\\'');\r\n				erro_msg += $(data).attr(\\''alt\\'') + \\''格式不正確!!\\\\n\\'';\r\n			}\r\n		 });\r\n	}\r\n	\r\n	$.ajax( {\r\n		url: \\"ajax.php\\",\r\n		data: {vcode:$(\\''[name=\\"code\\"]\\'').val(),account:$(\\''[name=\\"account\\"]\\'').val(),email:$(\\''[name=\\"email\\"]\\'').val()},\r\n		type:\\"GET\\",\r\n		dataType:\\''text\\'',\r\n		async: false,\r\n		success: function(msg){\r\n			_re =msg;\r\n			if (msg!=\\''ok\\'') erro_msg +=msg;\r\n		},\r\n		 error:function(xhr, ajaxOptions, thrownError){ \r\n		 }\r\n	});\r\n	\r\n	if ($(\\''[name=\\"password\\"]\\'').val().length<8) erro_msg +=\\''密碼長度必須大於8\\\\n\\'';\r\n	if ($(\\''[name=\\"password\\"]\\'').val()!=$(\\''#password\\'').val()) erro_msg +=\\''兩次密碼必須相符\\'';\r\n	if (erro_msg==\\''\\'')\r\n		$(\\''form\\'').submit();\r\n	else\r\n		alert(erro_msg);\r\n	\r\n}\r\n</script>', NULL, 1, 7, 'vipadmin', 'vipadmin', '2016-06-03 11:35:02', '2016-06-03 11:36:06', '');
INSERT INTO `datasetup_design` VALUES (5, 'main', 'ch', NULL, 'member_detail', '會員資料修改', '<%file=top%>\r\n<div class=\\"col-01\\">\r\n\r\n  <div class=\\"left-menu\\">\r\n\r\n    <ul>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=detail\\">會員資料</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=cpw\\">修改密碼</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=order\\">歷史訂單</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"javascript:if (confirm(\\''是否登出會員?\\'')) window.location.href=\\''member.php?act=logout\\'';\\">會員登出</a></span></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n\r\n<script type=\\"text/javascript\\" src=\\"includes/js/datepick/jquery.datepick.js\\"></script>\r\n<script type=\\"text/javascript\\" src=\\"includes/js/datepick/jquery.datepick-zh-TW.js\\"></script>\r\n<link href=\\"includes/js/datepick/jquery.datepick.css\\" rel=\\"stylesheet\\" type=\\"text/css\\">\r\n<script>\r\n$(document).ready(function (){\r\n		$(\\''[name=\\"birthday\\"]\\'').datepick( { \r\n			dateFormat: \\''yyyy-mm-dd\\'',\r\n			showTrigger: \\''<img src=\\"images/icon_date.png\\" width=\\"22\\" height=\\"22\\">\\''\r\n		}); \r\n});\r\n</script>   \r\n<div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">會員資料維護</h2>\r\n     <div class=\\"main-box\\">\r\n     <div>\r\n       <h3 class=\\"from-title\\">\r\n        <img src=\\"images/icon_arrow.png\\" width=\\"16\\" height=\\"15\\"> 基本資料 <span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       <div class=\\"cart-forms\\">\r\n       		<form action method=\\"post\\">\r\n           <ul>\r\n               <li><span class=\\"td-left\\">* 會員帳號 : </span><span class=\\"td-right\\"><input type=\\"text\\" class=\\"input-style01\\" value=\\"({$member_info.member.account})\\"></span></li>\r\n               \r\n               <li><span class=\\"td-left\\">* 您的姓名 : </span><span class=\\"td-right\\"><input name=\\"name\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$member_info.member.name})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* EMAIL : </span><span class=\\"td-right\\"><input name=\\"email\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$member_info.member.email})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 聯絡地址 : </span><span class=\\"td-right\\"><input name=\\"address\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$member_info.member.address})\\"></span></li>\r\n				<li><span class=\\"td-left\\"> 會員級別 : </span><span class=\\"td-right\\">({$member_info.member.type_html})</span></li>\r\n               <li><span class=\\"td-left\\">* 電話號碼 : </span><span class=\\"td-right\\"><input name=\\"phone\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$member_info.member.phone})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 性別：</span><span class=\\"td-right\\">\r\n               <input name=\\"radio\\" type=\\"radio\\" id=\\"radio\\" value=\\"radio\\" ({if $member_info.member.sex==\\''1\\''})checked=\\"checked\\"({/if})>\r\n                 男\r\n                 <input type=\\"radio\\" name=\\"radio\\" id=\\"radio2\\" value=\\"radio\\" ({if $member_info.member.sex!=\\''1\\''})checked=\\"checked\\"({/if})>\r\n               女</span></li>\r\n               <li><span class=\\"td-left\\">出生日期 : </span><span class=\\"td-right\\"><input type=\\"text\\" name=\\"birthday\\" class=\\"input-style01\\" value=\\"({$member_info.member.birthday})\\" size=\\"20\\"> 				<li><span class=\\"td-left\\"> 紅利點數 : </span><span class=\\"td-right\\">已經累積 ({$member_info.member.point}) 點數</span></li>\r\n                 </span></li>\r\n            </ul>\r\n            </form>\r\n       </div>\r\n     </div>\r\n\r\n       <div style=\\"padding:10px 0 10px 150px; height:50px; clear:both;\\"><span style=\\"padding:10px 0 10px 150px; height:50px; clear:both; text-align:\\">\r\n        <a href=\\"javascript:document.forms.item(0).submit();\\" class=\\"btn-style01\\">資料送出</a></span><a href=\\"javascript:window.location.reload();\\" class=\\"btn-style02\\">重新填寫</a>\r\n       </div>\r\n    \r\n     </div>\r\n</div>', NULL, 1, 6, 'vipadmin', 'vipadmin', '2016-06-03 11:37:29', '2016-06-03 11:37:29', '');
INSERT INTO `datasetup_design` VALUES (6, 'main', 'ch', NULL, 'member_login', '會員登入', '<%file=top%>\r\n<div class=\\"main clearfix\\">\r\n\r\n<div class=\\"col-01\\">\r\n  <div class=\\"mem-col\\">\r\n    \r\n  </div>\r\n</div>\r\n   \r\n     <div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">會員登入</h2>\r\n      \r\n\r\n     <div class=\\"main-box\\">\r\n     <div class=\\"login-box\\">\r\n       <h3 class=\\"login-title\\"><img src=\\"images/login-title.png\\" width=\\"49\\" height=\\"13\\"></h3>\r\n       <div class=\\"cart-forms\\">\r\n       	<form action method=\\"post\\">\r\n         <ul>\r\n            <li><span class=\\"td-login-left\\">* 會員帳號 : </span><span class=\\"td-login-right\\"><input name=\\"account\\" type=\\"text\\" class=\\"input-style01\\"></span></li>\r\n            <li><span class=\\"td-login-left\\">* 會員密碼 : </span><span class=\\"td-login-right\\"><input name=\\"password\\" type=\\"password\\" class=\\"input-style01\\"></span></li>\r\n          </ul>\r\n          <div class=\\"logn-btn\\"> <a href=\\"javascript:document.forms.item(0).submit();\\"><img src=\\"images/btn_login.png\\" width=\\"127\\" height=\\"46\\" class=\\"login\\"></a>\r\n             <a href=\\"member.php?act=fotgot\\" class=\\"forget\\"><img src=\\"images/icon-forget.png\\" width=\\"21\\" height=\\"21\\"> 忘記密碼</a> <a href=\\"member.php?act=join\\" class=\\"regist\\"><img src=\\"images/icon-add.png\\" width=\\"21\\" height=\\"21\\"> 加入會員\r\n          </a></div>\r\n         </form>   \r\n       </div>\r\n       \r\n     </div>\r\n       \r\n       \r\n     </div>\r\n</div>\r\n   \r\n</div>\r\n<script>\r\n$(\\''form\\'').on(\\"keyup\\",function(){\r\n	if (event.keyCode==13){\r\n		$(\\''form\\'').submit();\r\n	}\r\n})\r\n</script>', NULL, 1, 5, 'vipadmin', 'vipadmin', '2016-06-03 11:40:59', '2016-06-03 11:41:15', '');
INSERT INTO `datasetup_design` VALUES (7, 'main', 'ch', NULL, 'member_order', '會員歷史訂單', '<%file=top%>\r\n  \r\n  \r\n<div class=\\"col-01\\">\r\n\r\n  <div class=\\"left-menu\\">\r\n\r\n    <ul>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=detail\\">會員資料</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=cpw\\">修改密碼</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=order\\">歷史訂單</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"javascript:if (confirm(\\''是否登出會員?\\'')) window.location.href=\\''member.php?act=logout\\'';\\">會員登出</a></span></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n  \r\n<div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">歷史訂單</h2>\r\n          \r\n     <!-- 訂單列表 -->\r\n     ({if $data.pageget.id==null})\r\n     <div class=\\"main-box\\">\r\n     <table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" class=\\"cart-format\\">\r\n       <tbody><tr>\r\n         <th width=\\"200\\">訂單編號</th>\r\n         <th>訂單日期</th>\r\n         <th width=\\"200\\">訂單狀態</th>\r\n        </tr>\r\n        ({section name=ors loop=$data.orderlist})\r\n       <tr>\r\n         <td><a href=\\"?act=order&id=({$data.orderlist[ors].id})&page=({$data.pageget.page})\\"><img src=\\"images/icon_order.png\\" width=\\"16\\" height=\\"16\\"> ({$data.orderlist[ors].order_no})</a></td>\r\n         <td>({$data.orderlist[ors].update_date})</td>\r\n         <td><span class=\\"status01\\">({$data.orderlist[ors].status_html})</span></td>\r\n        </tr>\r\n        ({/section})\r\n     </tbody></table>\r\n     <!-- 收件人資料 -->\r\n       <div class=\\"page\\">全部共 ({$data.row_count}) 筆 (每頁 ({$data.mount}) 筆)　　\r\n       ({$data.page1}) ({$data.page3})　　前往第\r\n         <form name=\\"form\\" id=\\"form\\" style=\\"display:inline-block;\\">\r\n           <select name=\\"jumpMenu\\" id=\\"jumpMenu\\" onchange=\\"MM_jumpMenu(\\''parent\\'',this,0)\\">\r\n			({$data.page_option})\r\n           </select>\r\n         </form>\r\n         頁</div>\r\n     </div>\r\n     \r\n     \r\n     ({else})\r\n     <!-- 點擊列表編號後出現 訂單明細 -->\r\n     \r\n     <div class=\\"main-box\\">\r\n       <div class=\\"order-numb\\"><img src=\\"images/icon_order.png\\" width=\\"16\\" height=\\"16\\"> 訂單編號 : ({$data.order.order_no})</div>\r\n       <table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" class=\\"cart-format\\">\r\n         <tbody><tr>\r\n           <th width=\\"120\\">&nbsp;</th>\r\n           <th>產品名稱 </th>\r\n           <th width=\\"70\\">數量</th>\r\n           <th width=\\"70\\">單價 </th>\r\n           <th width=\\"70\\">小計 </th>\r\n         </tr>\r\n         ({section name=cr loop=$data.carlist})\r\n         <tr>\r\n           <td>({if $data.carlist[cr].pic.0!=\\''\\''&&$data.carlist[cr].pic.0!=null})<img src=\\"upload/products/({$data.carlist[cr].pic.0})\\" class=\\"pro-photo\\">({/if})</td>\r\n           <td><a href=\\"index.php?class=product&id=({$data.carlist[cr].id})\\">({$data.carlist[cr].name})</a></td>\r\n           <td>({$data.carlist[cr].count})</td>\r\n           <td>({$data.carlist[cr].price2})</td>\r\n           <td>({$data.carlist[cr].price2*$data.carlist[cr].count})</td>\r\n         </tr>\r\n         ({/section})\r\n       </tbody></table>\r\n       <!-- 小計 -->\r\n       <div class=\\"Subtotal\\"> <img src=\\"images/car.png\\" width=\\"32\\" height=\\"20\\" style=\\"vertical-align:middle;\\"> 運費  : ({$data.order.post_fee}) <span class=\\"price\\">合計 : $({$data.order.total+$data.order.post_fee}) </span> </div>\r\n       <div class=\\"back\\"><a href=\\"javascript:window.history.back(-1);\\"><img src=\\"images/btn_back.png\\" width=\\"78\\" height=\\"29\\"></a></div>\r\n     </div>\r\n     ({/if})\r\n</div>', NULL, 1, 4, 'vipadmin', 'vipadmin', '2016-06-03 11:43:00', '2016-06-03 11:43:00', '');
INSERT INTO `datasetup_design` VALUES (8, 'main', 'ch', NULL, 'member_cpw', '會員修改密碼', '<%file=top%>\r\n<div class=\\"col-01\\">\r\n\r\n  <div class=\\"left-menu\\">\r\n\r\n    <ul>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=detail\\">會員資料</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=cpw\\">修改密碼</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"member.php?act=order\\">歷史訂單</a></span></li>\r\n      <li><span class=\\"nav-catal\\"><a href=\\"javascript:if (confirm(\\''是否登出會員?\\'')) window.location.href=\\''member.php?act=logout\\'';\\">會員登出</a></span></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n  \r\n  \r\n  <div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">修改密碼</h2>\r\n     <div class=\\"main-box\\">\r\n     <div>\r\n       <h3 class=\\"from-title\\">\r\n        <img src=\\"images/icon_arrow.png\\" width=\\"16\\" height=\\"15\\"> 修改密碼<span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       \r\n       <div class=\\"cart-forms\\">\r\n       		<form action method=\\"post\\">\r\n           <ul>\r\n               <li><span class=\\"td-left\\">* 原來密碼 : </span><span class=\\"td-right\\">\r\n                 <input name=\\"password\\" type=\\"password\\" class=\\"input-style01\\"></span></li>\r\n               \r\n               <li><span class=\\"td-left\\">* 新的密碼 : </span><span class=\\"td-right\\">\r\n                 <input name=\\"new_password\\" type=\\"password\\" class=\\"input-style01\\"> 需8位數以上</span></li>\r\n               <li><span class=\\"td-left\\">* 確認密碼 : </span><span class=\\"td-right\\">\r\n                 <input id=\\"new_password\\" type=\\"password\\" class=\\"input-style01\\"> 需8位數以上</span></li>\r\n           </ul>\r\n           </form>\r\n       </div>\r\n     </div>\r\n       <div style=\\"padding:10px 0 10px 150px; height:50px; clear:both;\\"><span style=\\"padding:10px 0 10px 150px; height:50px; clear:both; text-align:\\">\r\n        <a href=\\"javascript:checkform();\\" class=\\"btn-style01\\">資料送出</a></span><a href=\\"javascript:window.location.reload();\\" class=\\"btn-style02\\">重新填寫</a>\r\n       </div>\r\n     </div>\r\n</div>\r\n         \r\n<script>\r\nfunction checkform(){\r\n	if ($(\\''[name=\\"password\\"]\\'').length>0)\r\n	if ($(\\''[name=\\"password\\"]\\'').val()==\\''\\'' || $(\\''[name=\\"password\\"]\\'').val()==null){\r\n		return alert(\\''需填入原始密碼\\'');\r\n	}\r\n	if ($(\\''[name=\\"new_password\\"]\\'').val()!=$(\\''#new_password\\'').val()){\r\n		return alert(\\''兩次密碼需相符!!\\'');\r\n	}\r\n	return $(\\''form\\'').submit();\r\n}\r\n</script>', NULL, 1, 3, 'vipadmin', 'vipadmin', '2016-06-03 11:44:20', '2016-06-03 11:44:20', '');
INSERT INTO `datasetup_design` VALUES (9, 'main', 'ch', NULL, 'member_fotgot', '會員忘記密碼', '<%file=top%>\r\n\r\n<div class=\\"col-01\\">\r\n\r\n  <div class=\\"mem-col\\">\r\n\r\n  </div>\r\n</div>\r\n\r\n<div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">忘記密碼</h2>\r\n     <div class=\\"main-box\\">\r\n\r\n     <div>\r\n       <h3 class=\\"from-title\\">\r\n        <img src=\\"images/icon_arrow.png\\" width=\\"16\\" height=\\"15\\"> 請輸入資訊 - <span class=\\"td-right\\">我們將把密碼寄到您的信箱</span><span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       \r\n       <div class=\\"cart-forms\\">\r\n       	<form action method=\\"post\\">\r\n           <ul>\r\n           		<!--\r\n               <li><span class=\\"td-left\\">* 會員帳號 :</span><span class=\\"td-right\\"><input name=\\"account\\" type=\\"text\\" class=\\"input-style01\\">\r\n               </span></li>\r\n               -->\r\n               <li><span class=\\"td-left\\">* 會員email :</span><span class=\\"td-right\\"><input name=\\"email\\" type=\\"text\\" class=\\"input-style01\\"></span></li>\r\n            </ul>\r\n         </form>\r\n       </div>\r\n     </div>\r\n\r\n       <div style=\\"padding:10px 0 10px 150px; height:50px; clear:both;\\"><span style=\\"padding:10px 0 10px 150px; height:50px; clear:both; text-align:\\">\r\n        <a href=\\"javascript:history.back()\\" class=\\"btn-style01\\">回上一頁</a></span><a href=\\"javascript:checkform();\\" class=\\"btn-style02\\">確認送出</a>\r\n       </div>\r\n      \r\n     </div>\r\n</div>', NULL, 1, 2, 'vipadmin', 'vipadmin', '2016-06-03 11:45:36', '2016-06-03 11:45:36', '');
INSERT INTO `datasetup_design` VALUES (10, 'main', 'ch', NULL, 'shopping', '購物車', '<%file=top%>\r\n  \r\n<div class=\\"main clearfix\\">\r\n\r\n<div class=\\"col-01\\">\r\n  <div class=\\"left-work\\">\r\n\r\n  </div>\r\n</div>\r\n   \r\n     <div class=\\"col-02\\">\r\n      <h2 class=\\"page-title\\"><img src=\\"images/pages-title-dot.png\\" width=\\"25\\" height=\\"25\\" class=\\"dot\\">購物車</h2>\r\n      \r\n\r\n     <div class=\\"main-box\\">\r\n     \r\n     <!-- 訂單列表 -->\r\n       <table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" class=\\"cart-format\\">\r\n         <tbody><tr>\r\n	       <th width=\\"5%\\"><input type=\\"checkbox\\" id=\\"select_all\\"></th>\r\n           <th width=\\"120\\">圖片</th>\r\n           <th>產品名稱                                                      </th>\r\n           <th width=\\"70\\">數量</th>\r\n           <th width=\\"70\\">單價 </th>\r\n           <th width=\\"70\\">小計 </th>\r\n           <th width=\\"50\\" class=\\"last\\">&nbsp;</th>\r\n         </tr>\r\n         ({section name=cl loop=$data.car})\r\n         <tr>\r\n           <td><input type=\\"checkbox\\" class=\\"del_box\\" value=\\"({$data.car[cl].shopping_car_list_id})\\"></td>\r\n           <td>({if $data.car[cl].pic.0!=null})<img src=\\"upload/products/({$data.car[cl].pic.0})\\" class=\\"pro-photo\\">({/if})</td>\r\n           <td><a href=\\"#\\">({$data.car[cl].name})</a></td>\r\n           <td><input type=\\"text\\" size=\\"3\\" onkeyup=\\"this.value=this.value.replace(/\\\\D/g,\\''\\'');\\" id=\\"change_({$data.car[cl].shopping_car_list_id})\\" value=\\"({$data.car[cl].count})\\" onblur=\\"change_procount(\\''({$data.car[cl].shopping_car_list_id})\\'')\\"></td>\r\n           <td>({$data.car[cl].price2})</td>\r\n           <td>({$data.car[cl].price2*$data.car[cl].count})</td>\r\n           <td class=\\"last\\"><a href=\\"?del=({$data.car[cl].shopping_car_list_id})\\"><img src=\\"images/icon_trash.png\\" width=\\"22\\" height=\\"26\\"></a></td>\r\n         </tr>\r\n         ({/section})\r\n       </tbody></table>\r\n       <script>\r\n	   function change_procount($value){\r\n            $.ajax( {\r\n                url: \\"shopping.php\\",\r\n                data: {editpro:$value,count:$(\\''#change_\\''+$value).val(),ajax:1},\r\n                type:\\"GET\\",\r\n                dataType:\\''text\\'',\r\n				async: false,\r\n                success: function(msg){\r\n                    alert(msg);\r\n					window.location.reload();\r\n                }\r\n            });\r\n	   }\r\n	   function class_del(){\r\n		   var temp_str = \\''\\'';\r\n		   $(\\''input[class=\\"del_box\\"]\\'').each(function (idx,obj){\r\n				if ($(obj)[0].checked==true){\r\n					if (temp_str!=\\''\\'') temp_str += \\'',\\'';\r\n					temp_str +=$(obj).val();\r\n				}\r\n			})\r\n		   if (temp_str!=\\''\\'' && confirm(\\''確定要刪除所選取的項目?\\'')){\r\n			   window.location.href=\\''?del=\\''+temp_str;\r\n		   }\r\n	   }\r\n	    $(\\''#select_all\\'').change(function (){all_select();})\r\n	   function all_select(){\r\n		   $(\\''input[class=\\"del_box\\"]\\'').each(function (idx,obj){\r\n				$(obj)[0].checked=$(\\''#select_all\\'')[0].checked;\r\n			});\r\n	   }\r\n	   </script>\r\n       \r\n       <!-- 小計 -->\r\n       <div class=\\"Subtotal\\">\r\n          <img src=\\"images/car.png\\" width=\\"32\\" height=\\"20\\" style=\\"vertical-align:middle;\\"> 運費  : ({$data.order.post_fee})   <span class=\\"price\\">合計 : $({$data.order.total+$data.order.post_fee})</span>  <a href=\\"javascript:class_del();\\">批量刪除<img src=\\"images/icon_trash.png\\" width=\\"22\\" height=\\"26\\"></a>\r\n       </div>\r\n     \r\n     <div style=\\"padding:10px 0 10px 0px; border-bottom:1px #CCC dotted\\"><a href=\\"javascript:addbox();\\" class=\\"btn-style03\\">+ 配件加購</a></div>\r\n     \r\n     <div listbutton=\\"1\\" style=\\"padding:10px 0 10px 450px; height:50px; clear:both; text-align:\\">\r\n         <a href=\\"javascript:history.back()\\" class=\\"btn-style01\\">回上一步</a> <a href=\\"javascript:pay_on();\\" class=\\"btn-style02\\">結  帳</a>\r\n     </div>\r\n     <script>\r\n	 function pay_on(){\r\n		 $(\\''[listbutton]\\'').hide();\r\n		 $(\\''[paytable]\\'').show();\r\n	 }\r\n	 </script>\r\n     \r\n     \r\n     <!--結帳按鈕頁面-->\r\n     <div style=\\"display:none;\\" paytable=\\"1\\">\r\n       <h3 class=\\"from-title\\">\r\n        <img src=\\"images/icon_cart.png\\" width=\\"20\\" height=\\"18\\"> 基本資料 <span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       \r\n       <div class=\\"cart-forms\\">\r\n           <ul>\r\n               <li><span class=\\"td-left\\">* 收件人：</span><span class=\\"td-right\\"><input id=\\"recive_name\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$data.member_info.name})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 性別：</span><span class=\\"td-right\\">({$data.member_info.sex_html})<input id=\\"recive_sex\\" type=\\"hidden\\" class=\\"input-style01\\" value=\\"({$data.member_info.sex})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 收件地址：</span><span class=\\"td-right\\"><input id=\\"recive_address\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$data.member_info.address})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 電話號碼：</span><span class=\\"td-right\\"><input id=\\"phone\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$data.member_info.phone})\\"></span></li>\r\n               <li><span class=\\"td-left\\">* e-mail：</span><span class=\\"td-right\\"><input id=\\"recive_email\\" type=\\"text\\" class=\\"input-style01\\" value=\\"({$data.member_info.email})\\"></span></li>\r\n           </ul>\r\n       </div>\r\n     </div>\r\n     \r\n     <div style=\\"display:none;\\" paytable=\\"1\\">\r\n       <h3 class=\\"from-title\\">\r\n           <img src=\\"images/icon_cart.png\\" width=\\"20\\" height=\\"18\\"> 收件人資料\r\n           <input type=\\"checkbox\\" name=\\"checkbox\\" onclick=\\"samedata();\\" id=\\"checkbox\\">\r\n           <script>\r\n		   function samedata(){\r\n			   if ($(\\''#checkbox:checked\\'').length>0){\r\n				   $(\\''form input[type=\\"text\\"]\\'').each(function(idx,obj){\r\n						$(obj).val($(\\''#\\''+$(obj).attr(\\"name\\")).val());\r\n					});\r\n				   $(\\''[name=\\"recive_sex\\"][value=\\"\\''+$(\\''#recive_sex\\'').val()+\\''\\"]\\'')[0].checked = true;\r\n			   }\r\n		   }\r\n		   </script>\r\n          <span class=\\"title-font01\\">同基本資料 </span><span class=\\"Comment\\">*號為必填項目</span>\r\n       </h3>\r\n       \r\n       <div class=\\"cart-forms\\">\r\n       	<form id=\\"form1\\" action=\\"?submit=1\\" method=\\"post\\" target=\\"_blank\\">\r\n           <ul>\r\n               <li><span class=\\"td-left\\">* 收件人 ：</span><span class=\\"td-right\\"><input name=\\"recive_name\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"收件人\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 性別 ：</span><span class=\\"td-right\\"><input type=\\"radio\\" name=\\"recive_sex\\" value=\\"1\\" alt=\\"性別\\">\r\n                 男\r\n                 <input type=\\"radio\\" name=\\"recive_sex\\" value=\\"2\\">\r\n               女</span></li>\r\n               <li><span class=\\"td-left\\">* 收件地址 ：</span><span class=\\"td-right\\"><input name=\\"recive_address\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"收件地址\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 電話號碼 ：</span><span class=\\"td-right\\"><input name=\\"phone\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"電話號碼\\"></span></li>\r\n               <li><span class=\\"td-left\\">* e-mail ：</span><span class=\\"td-right\\"><input name=\\"recive_email\\" type=\\"text\\" class=\\"input-style01\\" alt=\\"email\\"></span></li>\r\n               <li><span class=\\"td-left\\">* 付款方式 ：</span><span class=\\"td-right\\">\r\n                 <input type=\\"radio\\" name=\\"paycardmode\\" value=\\"3\\">\r\n                 ATM轉帳\r\n                 <input type=\\"radio\\" name=\\"paycardmode\\" value=\\"1\\" alt=\\"付款方式\\">\r\n                 線上刷卡\r\n                 <input type=\\"radio\\" name=\\"paycardmode\\" value=\\"2\\">\r\n                 超商代碼付款</span>\r\n               </li>\r\n               <li><span class=\\"td-left\\">  備註 ：</span><span class=\\"td-right\\">\r\n                 <textarea name=\\"memo\\" cols=\\"50\\" rows=\\"5\\" class=\\"textarea-style01\\"></textarea>\r\n               </span></li>\r\n           </ul>\r\n           \r\n        </form>\r\n       </div>\r\n     </div>\r\n     \r\n     <div paytable=\\"1\\" style=\\"display:none;padding:10px 0 10px 150px; height:50px; clear:both;\\"><span style=\\"padding:10px 0 10px 150px; height:50px; clear:both; text-align:\\">\r\n     <a href=\\"javascript:history.back()\\" class=\\"btn-style01\\">回上一步</a></span><a href=\\"javascript:checkform();\\" class=\\"btn-style02\\">結  帳</a>\r\n     </div>\r\n     <!--結帳按鈕頁面END-->\r\n     \r\n     \r\n     </div>\r\n     \r\n     \r\n     \r\n     <!-- 加購視窗 -->\r\n     <div class=\\"add-box\\" style=\\"display:none;\\">\r\n     	<form id=\\"add_form\\" method=\\"get\\">\r\n       <img src=\\"images/btn-close.png\\" width=\\"16\\" height=\\"16\\" class=\\"add-close \\" onclick=\\"addbox(\\''close\\'')\\">\r\n       	({section name=m loop=$data.addpro})\r\n       <h3 class=\\"add-list-title\\"> <img src=\\"images/icon_cart.png\\" width=\\"20\\" height=\\"18\\"> ({$data.addpro[m].name})  </h3>\r\n       <ul class=\\"add-list clearfix\\">\r\n       		({section name=n loop=$data.addpro[m].product})\r\n         <li><a href=\\"index.php?class=product&id=({$data.addpro[m].product[n].id})\\" ><img src=\\"upload/products/({$data.addpro[m].product[n].pic.0})\\" class=\\"prod-img\\"></a><span class=\\"prod-name\\">\r\n         <input type=\\"checkbox\\" value=\\"({$data.addpro[m].product[n].id})\\">\r\n         ({$data.addpro[m].product[n].name})</span></li>\r\n         	({/section})\r\n       </ul>\r\n       ({/section})\r\n       <div><input type=\\"button\\" value=\\"確定\\" onclick=\\"add_form_submit()\\"><input type=\\"button\\" value=\\"取消\\" onclick=\\"addbox(\\''close\\'');\\"></div>\r\n       </form>\r\n       <script>\r\n	   function add_form_submit(){\r\n		   var temp_qstr=\\''\\'';\r\n		   $(\\''#add_form input[type=\\"checkbox\\"]:checked\\'').each(function(idx,obj){\r\n				if (temp_qstr!=\\''\\'') temp_qstr +=\\'',\\'';\r\n				temp_qstr += $(obj).val();\r\n			});\r\n		   if ($(\\''#add_form input[type=\\"checkbox\\"]:checked\\'').length>0 && confirm(\\''您確定要購買這 \\''+$(\\''#add_form input[type=\\"checkbox\\"]:checked\\'').length+\\''商品?\\'')){\r\n			   window.location.href = \\''shopping.php?addpro=\\''+temp_qstr;\r\n			}\r\n			addbox(\\''close\\'');\r\n	   }\r\n	   </script>\r\n     </div>\r\n</div>\r\n   \r\n</div>\r\n\r\n<script>\r\nvar reg = /^\\\\w+((-\\\\w+)|(\\\\.\\\\w+))*\\\\@[A-Za-z0-9]+((\\\\.|-)[A-Za-z0-9]+)*\\\\.[A-Za-z0-9]+$/;\r\nvar check_array = [\\''form input\\'']; //--要檢查空值得陣列物件\r\nvar erro_msg;\r\nvar check_star = 0;\r\nfunction checkform(){\r\n	erro_msg=\\''\\'';\r\n	for(aa in check_array){\r\n		$(check_array[aa]).each(function(idx,data){\r\n			if ($(data).attr(\\''alt\\'')!=null&&($(data).val()==\\''\\''||$(data).val()==null)) {\r\n				erro_msg += $(data).attr(\\''alt\\'')+\\'' 欄位不可為空值!!\\\\n\\'';\r\n			}else if ($(data).attr(\\''name\\'')==\\''recive_email\\'' && !reg.test($(data).val())) {\r\n				erro_msg += $(data).attr(\\''alt\\'') + \\''格式不正確!!\\\\n\\'';\r\n			}\r\n			if ($(data).attr(\\''alt\\'')!=null&&$(data).attr(\\"type\\")==\\''radio\\''){\r\n				if ($(check_array[aa]+\\''[name=\\"\\''+$(data).attr(\\"name\\")+\\''\\"]:checked\\'').length<=0) erro_msg += $(data).attr(\\''alt\\'')+\\'' 必須選擇一項\\\\n\\'';\r\n			}\r\n		 });\r\n	}\r\n	if (erro_msg==\\''\\''){\r\n		$(\\''#form1\\'').submit();\r\n		window.setTimeout(\\"urlback()\\",3000);\r\n	}else{\r\n		alert(erro_msg);\r\n	}\r\n	\r\n}\r\nfunction urlback(){\r\n	window.location.href = \\''/\\'';\r\n}\r\n\r\nfunction addbox(act){\r\n	switch (act){\r\n		case \\"close\\":\r\n			$(\\''.add-box\\'').fadeOut();\r\n		break;\r\n		\r\n		default:\r\n			$(\\''.add-box\\'').fadeIn();\r\n		break;\r\n	}\r\n}\r\n</script>', NULL, 1, 1, 'vipadmin', 'vipadmin', '2016-06-03 11:51:01', '2016-06-03 11:51:01', '');
