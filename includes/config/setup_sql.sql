
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
  `auth` text NOT NULL,
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

INSERT INTO `datasetup_admin_group` VALUES (4, '管理者', '293,298,182,315,354,353,372,373,374,355,375,120,121,122,123,124,125', 1, 1, '2011-07-19 15:17:26', '2014-03-18 16:04:24', 'admin', 'vipadmin', NULL, NULL);
INSERT INTO `datasetup_admin_group` VALUES (7, '系統管理員', '293,298,342,337,338,348,182,315,401,402,403,404,405,387,389,388,390,391,399,392,400,406,120,121,122,123,124,377,378,376,125,396,398', 0, 1, '2014-03-11 15:50:00', '2016-01-19 22:19:34', 'service', 'vipadmin', '492,389,493,293,298,342,497,498,182,315,387,488,491,494,406,489,495,496,120,121,122,123,124,377,378,376,125,396,398,490,499', '425,426,427,428,429,430,418,419,420,421,422,423,424,431,435,433,436,437,432,438,434,439,415,417,416,407,408,412,413,411,409,410,414');
INSERT INTO `datasetup_admin_group` VALUES (8, '客戶管理者', '293,298,342,337,338,348,182,315,401,402,403,404,405,387,389,388,390,391,399,392,400,120,121,122,123,124,377,125,396', 2, 1, '2014-03-11 15:58:32', '2016-01-15 17:03:39', 'service', 'vipadmin', '492,389,493,293,298,342,497,182,315,387,488,491,494,406,489,495,496,120,121,122,123,124,125,396', NULL);

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
  `pic` varchar(100) default NULL,
  `file` varchar(100) default NULL,
  `memo` varchar(100) default NULL,
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
INSERT INTO `datasetup_language` VALUES (3, '英文', 'en', 1, 2, '2014-03-20 11:28:16', '2014-03-20 11:28:16');
INSERT INTO `datasetup_language` VALUES (4, '簡體', 'sc', 1, 3, '2015-07-08 07:23:21', '2015-07-08 07:23:21');

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
INSERT INTO `datasetup_member` VALUES (7, '', 'member', 'ch', 'normal', 'service', 'Jones', '', '1', '', 'b3fa1a10f4631645c605d1004c1afb9b', '', '新中街35號', '', '886933632162', NULL, 0, 1, '2013-12-05 04:13:07', '2014-04-08 11:25:37', '', 'vipadmin', '', NULL, NULL);
INSERT INTO `datasetup_member` VALUES (12, '', 'member', 'ch', 'normal', 'asdfasdf', '333', '', '', '', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'marc@vipcase.net', '基隆市|_|仁愛區|_|200|_|TEST', '2014-03-19', 'SSS', NULL, 90, 1, '2014-03-07 04:53:23', '0000-00-00 00:00:00', '', '', '', NULL, NULL);
INSERT INTO `datasetup_member` VALUES (13, '', 'gkmember', '', 'normal', 'gn0061', '蕭壽銘', 'F122844940', '1', '', '95be9281570d744d884a8aa4f7c72759', 'gn006941842008@yahoo.com.tw', '新中街35號', '2013-12-05', '886933632162', NULL, 0, 1, '2014-06-25 14:48:26', '2014-07-09 18:38:34', '', 'vipadmin', '', NULL, NULL);
INSERT INTO `datasetup_member` VALUES (27, '', 'member', 'ch', 'normal', 'test', '蕭壽銘', NULL, '2', NULL, 'b3fa1a10f4631645c605d1004c1afb9b', 'Jones@vipcase.net', '新中街35號', '2014-07-05', '886933632162', NULL, 0, 1, '2015-01-13 10:23:09', '2014-08-18 11:54:32', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `datasetup_member` VALUES (28, '', 'member', 'ch', 'normal', 'kdjfksdjf', 'dfsdfds', NULL, 'radio', NULL, 'e3064137aaf44f6b2582a406488f6df6', 'dfkasdjf@email.cc', 'address', NULL, '0922222222', '0922222222', 0, 1, '2015-01-19 17:59:26', '2015-01-19 17:59:26', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `datasetup_member` VALUES (29, '', 'member', 'ch', 'normal', 'aalll@vip.cc', '系統管理員', NULL, '1', NULL, 'e3064137aaf44f6b2582a406488f6df6', 'aalll@vip.cc', '新北市瑞芳區吉慶里中央路48巷162號3樓', NULL, '02222224144', NULL, 0, 1, '2015-07-15 09:46:06', '2015-07-15 09:46:06', NULL, NULL, NULL, NULL, NULL);

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
