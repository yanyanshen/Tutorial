# Host: 172.16.17.100  (Version: 5.5.21)
# Date: 2016-10-28 18:06:40
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "mj_ad"
#

DROP TABLE IF EXISTS `mj_ad`;
CREATE TABLE `mj_ad` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` smallint(6) NOT NULL COMMENT '0代表顶部，1代表左侧，2代表中部，3代表底部',
  `ad_name` varchar(255) DEFAULT NULL,
  `start_date` int(11) DEFAULT '0',
  `end_date` int(11) DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1表示激活,0表示未激活',
  `clicknum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "mj_ad"
#

INSERT INTO `mj_ad` VALUES (7,1,'1',1477120141,0,0,NULL),(8,1,'2',1477120149,0,0,NULL),(13,0,NULL,1477126469,0,0,NULL),(14,0,NULL,1477127138,0,0,NULL);

#
# Structure for table "mj_addresses"
#

DROP TABLE IF EXISTS `mj_addresses`;
CREATE TABLE `mj_addresses` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '1' COMMENT '默认地址',
  `telephone` varchar(13) DEFAULT NULL COMMENT '固定电话',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `isdefaule` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '1为默认地址',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "mj_addresses"
#

INSERT INTO `mj_addresses` VALUES (1,1,'李四','郑州中原区',NULL,'15093113454',NULL,0),(2,1,'李四四','郑州金水区',NULL,'15093113455',NULL,1),(3,1,'说说','郑州金水区',NULL,'1111111111',NULL,0),(4,2,'吖吖','郑州中原区',NULL,'2222222222',NULL,0),(5,2,'天天','郑州中原区',NULL,'3333333333',NULL,0),(6,3,'偶偶','郑州港区',NULL,'5555555555',NULL,0);

#
# Structure for table "mj_admin_user"
#

DROP TABLE IF EXISTS `mj_admin_user`;
CREATE TABLE `mj_admin_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `mj_salt` varchar(10) DEFAULT NULL,
  `add_time` int(11) DEFAULT '0',
  `last_time` int(11) DEFAULT '0',
  `action_list` text COMMENT '管理员权限',
  `login_ip` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='后台管理员';

#
# Data for table "mj_admin_user"
#

INSERT INTO `mj_admin_user` VALUES (1,'sc','sc@qq.com','561234ec6ff3ff4e514a12fd939b1d06',NULL,1477309925,0,NULL,'127.0.0.1'),(9,'1231','nihao@qq.com','561234ec6ff3ff4e514a12fd939b1d06',NULL,1477374448,0,NULL,'127.0.0.1'),(10,'nihao','4554@qq.com','561234ec6ff3ff4e514a12fd939b1d06',NULL,1477374468,0,NULL,'127.0.0.1');

#
# Structure for table "mj_article"
#

DROP TABLE IF EXISTS `mj_article`;
CREATE TABLE `mj_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` smallint(6) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT '网络' COMMENT '文章作者/来源',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `article_img` varchar(255) DEFAULT '0',
  `update_time` int(255) DEFAULT '0',
  `toptime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) DEFAULT '0' COMMENT '置顶为1，否则为0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "mj_article"
#

INSERT INTO `mj_article` VALUES (15,1,'请问','我去我去','我是',1477635871,'5812ef1f642df.jpg',0,'2016-10-28 14:24:41',0);

#
# Structure for table "mj_article_category"
#

DROP TABLE IF EXISTS `mj_article_category`;
CREATE TABLE `mj_article_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `article_num` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "mj_article_category"
#

INSERT INTO `mj_article_category` VALUES (1,'企业动态',0),(2,'行业动态',0),(3,'酒庄介绍',0),(4,'葡萄酒知识',0),(5,'产品推荐',0),(6,'美酒公告',0);

#
# Structure for table "mj_attr_name"
#

DROP TABLE IF EXISTS `mj_attr_name`;
CREATE TABLE `mj_attr_name` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(255) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

#
# Data for table "mj_attr_name"
#

INSERT INTO `mj_attr_name` VALUES (1,'红葡萄酒',4),(2,'白葡萄酒',4),(3,'桃红葡萄酒',4),(4,'起泡葡萄酒',4),(5,'加强葡萄酒',4),(6,'甜葡萄酒',4),(7,'1855梅多克列级庄园',5),(8,'圣爱美侬列级庄园',5),(9,'苏玳巴萨克列级庄园',5),(10,'格拉夫列级庄园',5),(11,'勃艮第AOC',5),(12,'波美侯AOC',5),(13,'法国',6),(14,'澳大利亚',6),(15,'德国',6),(16,'意大利',6),(17,'西班牙',6),(18,'美国',6),(19,'智利',6),(20,'阿根廷',6),(21,'加拿大',6),(22,'南非',6),(23,'奥地利',6),(24,'葡萄牙',6),(25,'新西兰',6),(26,'匈牙利',6),(27,'中国',6),(28,'波尔多',7),(29,'勃艮第',7),(30,'香槟',7),(31,'罗讷河谷',7),(32,'皮埃蒙特',7),(33,'托斯卡纳',7),(34,'威尼托',7),(35,'莫舍尔',7),(36,'莱茵黑森',7),(37,'南澳',7),(38,'赤霞珠',8),(39,'美乐',8),(40,'西拉',8),(41,'佳美娜',8),(42,'桑娇维塞',8),(43,'霞多丽',8),(44,'仙粉黛',8),(45,'长相思',8),(46,'雷司令',8),(47,'酱香',9),(48,'浓香',9),(49,'清香',9),(50,'安徽',10),(51,'北京',10),(52,'贵州',10),(53,'江苏',10),(54,'山西',10),(55,'四川',10),(56,'1~99元',11),(57,'100~299元',11),(58,'300~599元',11),(59,'600~999元',11),(60,'1000元以上',11),(61,'威士忌',12),(62,'白兰地',12),(63,'伏特加',12),(64,'预调酒',12),(65,'朗姆酒',12),(66,'龙舌兰',12),(67,'力娇酒/利口酒',12),(68,'金酒',12),(69,'德国',13),(70,'比利时',13),(71,'荷兰',13),(72,'美国',13),(73,'墨西哥',13),(74,'丹麦',13),(75,'黄啤酒',14),(76,'白啤酒',14),(77,'黑啤酒',14),(78,'酒杯',15),(79,'醒酒器',15),(80,'酒刀',15),(81,'酒塞',15),(82,'酒柜',15),(83,'酒袋',15),(84,'酒壶',15),(85,'皮盒',15),(86,'汇源100%',16),(87,'果汁礼盒',16),(88,'果粒王',16),(89,'橙汁',16),(90,'苹果汁',16),(91,'葡萄汁',16);

#
# Structure for table "mj_attribute"
#

DROP TABLE IF EXISTS `mj_attribute`;
CREATE TABLE `mj_attribute` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attr_id` smallint(60) NOT NULL,
  `attr_values` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

#
# Data for table "mj_attribute"
#

INSERT INTO `mj_attribute` VALUES (9,1,4,'1,2,3,4,5,6,89'),(11,1,5,'1,2,3,4,5,6,89'),(12,1,6,'1,2,3,4,5,6,89'),(13,1,7,'1,2,3,4,5,6,89'),(14,1,8,'1,2,3,4,5,6,89'),(16,2,9,'47,48,49'),(17,2,10,'50,51,52,53,54,55'),(18,2,11,'56,57,58,59,60'),(19,3,12,'61,62,63,64,65,66,67,68,88'),(21,4,13,'69,70,71,72,73,74'),(22,4,14,'75,76,77'),(24,5,15,'78,79,80,81,82,83,84,85'),(27,6,16,'86,87,88,89,90,91');

#
# Structure for table "mj_cart"
#

DROP TABLE IF EXISTS `mj_cart`;
CREATE TABLE `mj_cart` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `buynum` smallint(5) unsigned NOT NULL,
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "mj_cart"
#


#
# Structure for table "mj_cateattr"
#

DROP TABLE IF EXISTS `mj_cateattr`;
CREATE TABLE `mj_cateattr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(255) NOT NULL,
  `addtime` int(32) NOT NULL,
  `pid` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Data for table "mj_cateattr"
#

INSERT INTO `mj_cateattr` VALUES (4,'葡萄酒类型',1477561172,1),(5,'等级',1477561218,1),(6,'国家',1477561263,1),(7,'产地',1477561326,1),(8,'葡萄品种',1477561840,1),(9,'香型',1477561873,2),(10,'产地',1477561882,2),(11,'价格',1477561889,2),(12,'种类',1477561925,3),(13,'国家',1477561946,4),(14,'种类',1477561954,4),(15,'种类',1477561980,5),(16,'果汁',1477561987,6);

#
# Structure for table "mj_code_back"
#

DROP TABLE IF EXISTS `mj_code_back`;
CREATE TABLE `mj_code_back` (
  `id` mediumint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `add_time` int(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_code_back"
#


#
# Structure for table "mj_comment"
#

DROP TABLE IF EXISTS `mj_comment`;
CREATE TABLE `mj_comment` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `order_sn` varchar(60) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `grade` varchar(100) NOT NULL COMMENT '1代表好评，2代表中评，3代表差评',
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_comment"
#


#
# Structure for table "mj_fastsale_goods"
#

DROP TABLE IF EXISTS `mj_fastsale_goods`;
CREATE TABLE `mj_fastsale_goods` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) NOT NULL,
  `shop_price` double(10,0) unsigned NOT NULL DEFAULT '0',
  `promote_price` double(10,0) unsigned NOT NULL DEFAULT '0',
  `goods_num` smallint(6) NOT NULL DEFAULT '0',
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_fastsale_goods"
#


#
# Structure for table "mj_goods"
#

DROP TABLE IF EXISTS `mj_goods`;
CREATE TABLE `mj_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) NOT NULL,
  `goods_sn` varchar(60) DEFAULT '',
  `goodsname` varchar(120) NOT NULL,
  `click_count` int(10) DEFAULT NULL,
  `brand_id` smallint(5) NOT NULL,
  `goods_num` smallint(5) NOT NULL,
  `goods_weight` smallint(5) DEFAULT NULL,
  `market_price` double(10,0) DEFAULT NULL,
  `shop_price` double(10,0) NOT NULL,
  `goods_brief` varchar(255) DEFAULT NULL,
  `goods_img` varchar(255) DEFAULT NULL,
  `goods_content` varchar(255) DEFAULT NULL,
  `add_time` int(11) NOT NULL,
  `is_promote` smallint(1) NOT NULL DEFAULT '0',
  `last_update` int(11) DEFAULT NULL,
  `sale_num` smallint(5) DEFAULT NULL,
  `promote_price` double(10,0) DEFAULT '0',
  `goods_active` varchar(30) DEFAULT NULL,
  `is_sale` smallint(1) unsigned NOT NULL DEFAULT '1',
  `img_savepath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods"
#

INSERT INTO `mj_goods` VALUES (20,1,'','拉菲传奇梅多克干红葡萄酒2011',NULL,71,100,NULL,NULL,228,'拉菲传奇梅多克干红葡萄酒2011','580dc5fb5bfb0.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024082726_39948.jpg\" alt=\"\" /><img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024082735_34568.jpg\" alt=\"\" />',1477297659,0,NULL,1,0,NULL,1,'./Goods/2016-10-24/'),(21,2,'','52度五粮液 浓香型白酒500ml/瓶',NULL,15,12,NULL,NULL,728,'52度五粮液 浓香型白酒500ml/瓶','580dc6e7b11e5.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024083130_99181.jpg\" alt=\"\" />',1477297895,0,NULL,2,0,NULL,1,'./Goods/2016-10-24/'),(24,2,'','53度茅台飞天 酱香型白酒500ml',NULL,14,12,NULL,NULL,999,'53度茅台飞天 酱香型白酒500ml','580dd7c8bbbd6.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024094334_19044.jpg\" alt=\"\" />',1477302216,0,NULL,3,0,NULL,1,'./Goods/2016-10-24/'),(25,2,'','53度蓝瓷汾酒 清香型白酒475毫升/瓶',NULL,18,31,NULL,NULL,99,'53度蓝瓷汾酒 清香型白酒475毫升/瓶','580dd970cc107.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024095038_10225.jpg\" alt=\"\" />',1477302640,0,NULL,4,0,NULL,1,'./Goods/2016-10-24/'),(27,3,'','轩尼诗 VSOP干邑白兰地（庆祝250周年纪念版） 700ml',NULL,31,45,NULL,NULL,425,'轩尼诗 VSOP干邑白兰地（庆祝250周年纪念版） 700ml','580ddb7d69e11.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024095914_67897.jpg\" alt=\"\" />',1477303165,0,NULL,6,0,NULL,1,'./Goods/2016-10-24/'),(28,3,'','马爹利鼎盛干邑白兰地 700ml',NULL,88,43,NULL,NULL,368,'马爹利鼎盛干邑白兰地 700ml','580ddd3b83910.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024100649_21033.jpg\" alt=\"\" />',1477303611,0,NULL,7,0,NULL,1,'./Goods/2016-10-24/'),(29,1,'','维洛特骑士珍藏红葡萄酒',NULL,89,12,NULL,NULL,328,'维洛特骑士珍藏红葡萄酒','580df043a0b18.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024112800_53154.jpg\" alt=\"\" />',1477308483,0,NULL,8,0,NULL,1,'./Goods/2016-10-24/'),(30,1,'','V骑士盾牌红葡萄酒2014（维洛特骑士）',NULL,7,67,NULL,NULL,258,'V骑士盾牌红葡萄酒2014（维洛特骑士）','580df120bc761.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161024/20161024113142_22724.jpg\" alt=\"\" />',1477308704,0,NULL,9,0,NULL,1,'./Goods/2016-10-24/'),(31,1,'','卡沃利正牌干红葡萄酒 2008',NULL,9,12,NULL,NULL,800,'卡沃利正牌干红葡萄酒 2008','580f245b8e3c7.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161025/20161025092233_26391.jpg\" alt=\"\" />',1477387355,0,NULL,NULL,0,NULL,1,'./Goods/2016-10-25/'),(37,3,'','杰克丹尼 田纳西州威士忌 700ml',NULL,27,34,NULL,NULL,129,'杰克丹尼 田纳西州威士忌 700ml','58108c49803bb.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161026/20161026105815_52635.jpg\" alt=\"\" />',1477479497,0,NULL,NULL,0,NULL,1,'./Goods/2016-10-26/'),(39,4,'','智美蓝帽啤酒 比利时原装进口 330ml/瓶*6',NULL,49,43,NULL,NULL,139,'智美蓝帽啤酒 比利时原装进口 330ml/瓶*6','58108e8a1395b.jpg','<img src=\"/Public/Admin/plugin/kindeditor/attached/image/20161026/20161026110751_33255.jpg\" alt=\"\" />',1477480073,0,NULL,NULL,0,NULL,1,'./Goods/2016-10-26/');

#
# Structure for table "mj_goods_active"
#

DROP TABLE IF EXISTS `mj_goods_active`;
CREATE TABLE `mj_goods_active` (
  `active_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `active_name` varchar(60) NOT NULL,
  `goods_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`active_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_active"
#

INSERT INTO `mj_goods_active` VALUES (1,'中外名酒',''),(2,'旷世经典',''),(3,'经典外酒',NULL);

#
# Structure for table "mj_goods_attr"
#

DROP TABLE IF EXISTS `mj_goods_attr`;
CREATE TABLE `mj_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attr_value` text NOT NULL,
  PRIMARY KEY (`goods_attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_attr"
#

INSERT INTO `mj_goods_attr` VALUES (1,20,9,'红葡萄酒'),(2,20,10,'拉菲'),(3,20,11,'1855梅多克列级庄园'),(4,20,12,'法国'),(5,20,13,'波尔多'),(6,20,14,'赤霞珠'),(7,21,15,'五粮液'),(8,21,16,'浓香'),(9,21,17,'四川'),(10,21,18,'600~999元'),(11,24,15,'茅台'),(12,24,16,'酱香'),(13,24,17,'安徽'),(14,24,18,'1~99元'),(15,25,15,'汾酒'),(16,25,16,'清香'),(17,25,17,'山西'),(18,25,18,'1~99元'),(19,26,19,'威士忌'),(20,26,20,'芝华士'),(21,27,19,'威士忌'),(22,27,20,'轩尼诗'),(23,28,19,'白兰地'),(24,28,20,'百龄坛'),(25,29,9,'红葡萄酒'),(26,29,10,'V骑士'),(27,29,11,'勃艮第AOC'),(28,29,12,'法国'),(29,29,13,'波尔多'),(30,29,14,'美乐'),(31,30,9,'红葡萄酒'),(32,30,10,'V骑士'),(33,30,11,'圣爱美侬列级庄园'),(34,30,12,'法国'),(35,30,13,'波尔多'),(36,30,14,'赤霞珠'),(37,31,9,'红葡萄酒'),(38,31,10,'卡沃利'),(39,31,11,'圣爱美侬列级庄园'),(40,31,12,'意大利'),(41,31,13,'托斯卡纳'),(42,31,14,'美乐'),(43,32,9,'红葡萄酒'),(44,32,10,'鬼脸'),(45,32,11,'圣爱美侬列级庄园'),(46,32,12,'智利'),(47,32,13,'威尼托'),(48,32,14,'佳美娜'),(49,33,19,'威士忌'),(50,33,20,'杰克丹尼'),(51,34,19,'威士忌'),(52,34,20,'杰克丹尼'),(53,35,19,'威士忌'),(54,35,20,'杰克丹尼'),(55,36,21,'比利时'),(56,36,22,'黑啤酒'),(57,36,23,'智美'),(58,37,19,'威士忌'),(59,37,20,'杰克丹尼'),(60,38,15,'茅台'),(61,38,16,'酱香'),(62,38,17,'安徽'),(63,38,18,'1~99元'),(64,39,21,'比利时'),(65,39,22,'黑啤酒'),(66,39,23,'智美');

#
# Structure for table "mj_goods_brands"
#

DROP TABLE IF EXISTS `mj_goods_brands`;
CREATE TABLE `mj_goods_brands` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(60) NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `brand_logo` varchar(255) DEFAULT NULL,
  `pid` smallint(5) unsigned NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `brand_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_brands"
#

INSERT INTO `mj_goods_brands` VALUES (1,'奔富酒园',1,'5811865831c29.jpg',1,NULL,'葡萄酒','好葡萄酒,奔富庄园'),(2,'卡乐丝',1,NULL,1,NULL,'葡萄酒',NULL),(3,'鬼脸',1,NULL,1,NULL,'葡萄酒',NULL),(4,'石柱',1,NULL,1,NULL,'葡萄酒',NULL),(5,'火玫瑰',1,NULL,1,NULL,'葡萄酒',NULL),(6,'泽巴赫酒庄',1,NULL,1,NULL,'葡萄酒',NULL),(7,'V骑士',1,NULL,1,NULL,'葡萄酒',NULL),(8,'坎托雷',1,NULL,1,NULL,'葡萄酒',NULL),(9,'卡沃利',1,NULL,1,NULL,'葡萄酒',NULL),(14,'茅台',1,'581186a4d4d4e.jpg',2,1477099235,'白酒','中国名酒之一，历史悠久，是中国人民最喜爱的酒品之一。'),(15,'五粮液',1,'581186e31f1e4.jpg',2,1477099249,'白酒','中国名酒'),(16,'剑南春',1,NULL,2,1477099259,'白酒',NULL),(17,'洋河',1,NULL,2,1477099269,'白酒',NULL),(18,'汾酒',1,NULL,2,1477099302,'白酒',NULL),(19,'古井贡',1,NULL,2,1477099314,'白酒',NULL),(20,'红星',1,NULL,2,1477099327,'白酒',NULL),(21,'泸州老窖',1,NULL,2,1477099337,'白酒',NULL),(22,'郎酒',1,NULL,2,1477099367,'白酒',NULL),(23,'牛栏山',1,NULL,2,1477099372,'白酒',NULL),(24,'水井坊',1,NULL,2,1477099394,'白酒',NULL),(25,'芝华士',1,NULL,3,1477099432,'烈酒',NULL),(26,'尊尼获加',1,NULL,3,1477099447,'烈酒',NULL),(27,'杰克丹尼',1,NULL,3,1477099464,'烈酒',NULL),(28,'百龄坛',1,NULL,3,1477099493,'烈酒',NULL),(29,'格兰菲迪',1,NULL,3,1477099503,'烈酒',NULL),(30,'麦卡伦',1,NULL,3,1477099517,'烈酒',NULL),(31,'轩尼诗',1,NULL,3,1477099528,'烈酒',NULL),(32,'摩根船长',1,NULL,3,1477099542,'烈酒',NULL),(33,'哈瓦纳俱乐部',1,NULL,3,1477099550,'烈酒',NULL),(34,'人头马',1,NULL,3,1477099572,'烈酒',NULL),(35,'绝对伏特加',1,NULL,3,1477099585,'烈酒',NULL),(36,'斯米诺',1,NULL,3,1477099595,'烈酒',NULL),(37,'苏连红',1,NULL,3,1477099612,'烈酒',NULL),(38,'百加得',1,NULL,3,1477099623,'烈酒',NULL),(39,'奥美加',1,NULL,3,1477099631,'烈酒',NULL),(40,'豪帅',1,NULL,3,1477099656,'烈酒',NULL),(41,'雷博士',1,NULL,3,1477099666,'烈酒',NULL),(42,'百利',1,NULL,3,1477099680,'烈酒',NULL),(43,'甘露',1,NULL,3,1477099689,'烈酒',NULL),(44,'君度',1,NULL,3,1477099723,'烈酒',NULL),(45,'哥顿',1,NULL,3,1477099737,'烈酒',NULL),(46,'必富达',1,NULL,3,1477099752,'烈酒',NULL),(47,'施格兰',1,NULL,3,1477099763,'烈酒',NULL),(48,'马天尼',1,NULL,3,1477099774,'烈酒',NULL),(49,'智美',1,NULL,4,1477099801,'啤酒',NULL),(50,'粉象',1,NULL,4,1477099812,'啤酒',NULL),(51,'福佳',1,NULL,4,1477099827,'啤酒',NULL),(52,'虎牌',1,NULL,4,1477099836,'啤酒',NULL),(53,'雪夫',1,NULL,4,1477099855,'啤酒',NULL),(54,'奥丁格',1,NULL,4,1477099864,'啤酒',NULL),(55,'百威',1,NULL,4,1477099874,'啤酒',NULL),(56,'喜力',1,NULL,4,1477099890,'啤酒',NULL),(57,'林德曼',1,NULL,4,1477099905,'啤酒',NULL),(58,'艾丁格',1,NULL,4,1477099921,'啤酒',NULL),(59,'德拉克',1,NULL,4,1477099928,'啤酒',NULL),(60,'黑森马蹄',1,NULL,4,1477099946,'啤酒',NULL),(61,'嘉士伯',1,NULL,4,1477099954,'啤酒',NULL),(62,'教士',1,NULL,4,1477099973,'啤酒',NULL),(63,'罗斯福',1,NULL,4,1477099983,'啤酒',NULL),(64,'斯图加特',1,NULL,4,1477099996,'啤酒',NULL),(65,'格鲁特',1,NULL,4,1477100005,'啤酒',NULL),(66,'石岛',1,NULL,5,1477100040,'酒具周边',NULL),(67,'巴卡拉',1,NULL,5,1477100051,'酒具周边',NULL),(68,'拉吉奥',1,NULL,5,1477100063,'酒具周边',NULL),(69,'富信',1,NULL,5,1477100071,'酒具周边',NULL),(70,'新潮',1,NULL,5,1477100079,'酒具周边',NULL),(71,'拉菲',1,NULL,1,1477122650,'葡萄酒',NULL),(72,'潘诺',1,'58118711abad7.png',3,1477533288,'烈酒','香甜诱人 独特芳香植物提取'),(73,'雀巢',1,NULL,6,1477544030,'饮料冲调','雀巢咖啡'),(74,'特仑苏',1,NULL,6,1477544113,'饮料冲调','特仑苏牛奶'),(75,'纯甄',1,NULL,6,1477544160,'饮料冲调','纯牛奶'),(76,'甜小嗨',1,NULL,6,1477544189,'饮料冲调',''),(77,'未来星',1,NULL,6,1477544207,'饮料冲调',''),(78,'真果粒',1,NULL,6,1477544220,'饮料冲调',''),(79,'纯牛奶',1,NULL,6,1477544231,'饮料冲调',''),(88,'马爹利',1,NULL,3,1477637283,'烈酒',''),(89,'维洛特',1,NULL,1,1477637428,'葡萄酒','');

#
# Structure for table "mj_goods_category"
#

DROP TABLE IF EXISTS `mj_goods_category`;
CREATE TABLE `mj_goods_category` (
  `cat_id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(60) NOT NULL,
  `pid` smallint(5) NOT NULL,
  `cate_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_category"
#

INSERT INTO `mj_goods_category` VALUES (1,'葡萄酒',0,'葡萄酒'),(2,'白酒',0,'白酒'),(3,'烈酒',0,'烈酒'),(4,'啤酒',0,'啤酒'),(5,'酒具周边',0,'酒具周边'),(6,'饮料冲调',0,'饮料冲调');

#
# Structure for table "mj_goods_collect"
#

DROP TABLE IF EXISTS `mj_goods_collect`;
CREATE TABLE `mj_goods_collect` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) NOT NULL DEFAULT '0',
  `goods_price` smallint(5) NOT NULL DEFAULT '0',
  `goods_number` smallint(5) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  `collect_status` varchar(30) DEFAULT NULL COMMENT '0代表未收藏；1代表已收藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_collect"
#


#
# Structure for table "mj_goods_gallery"
#

DROP TABLE IF EXISTS `mj_goods_gallery`;
CREATE TABLE `mj_goods_gallery` (
  `img_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `img_one` varchar(60) DEFAULT NULL,
  `img_two` varchar(60) DEFAULT NULL,
  `img_three` varchar(60) DEFAULT NULL,
  `goods_id` smallint(5) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_gallery"
#


#
# Structure for table "mj_goods_img"
#

DROP TABLE IF EXISTS `mj_goods_img`;
CREATE TABLE `mj_goods_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `goods_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

#
# Data for table "mj_goods_img"
#

INSERT INTO `mj_goods_img` VALUES (19,20,'580dc5fb5bfb0.jpg'),(20,20,'580dc5fb5d338.jpg'),(21,20,'580dc5fb5def0.jpg'),(22,21,'580dc6e7b11e5.jpg'),(23,21,'580dc6e7b2d3e.jpg'),(24,21,'580dc6e7b44ae.jpg'),(25,24,'580dd7c8bbbd6.jpg'),(26,24,'580dd7c8bcf5e.jpg'),(27,24,'580dd7c8be6ce.jpg'),(28,25,'580dd970cc107.jpg'),(29,25,'580dd970cd877.jpg'),(30,25,'580dd970cf7b8.jpg'),(34,27,'580ddb7d69e11.jpg'),(35,27,'580ddb7d6adb1.jpg'),(36,27,'580ddb7d6bd51.jpg'),(37,28,'580ddd3b83910.jpg'),(38,28,'580ddd3b848b0.jpg'),(39,28,'580ddd3b85850.jpg'),(40,29,'580df043a0b18.jpg'),(41,29,'580df043a4d81.jpg'),(42,29,'580df043a68d9.jpg'),(43,30,'580df120bc761.jpg'),(44,30,'580df120bdaea.jpg'),(45,30,'580df120c0db2.jpg'),(46,31,'580f245b8e3c7.jpg'),(47,31,'580f245b92248.jpg'),(48,31,'580f245b93da0.jpg'),(63,37,'58108c49803bb.jpg'),(64,37,'58108c49826e3.jpg'),(65,37,'58108c498423c.jpg'),(69,39,'58108e8a1395b.jpg'),(70,39,'58108e8a14514.jpg'),(71,39,'58108e8a150cc.jpg');

#
# Structure for table "mj_guang"
#

DROP TABLE IF EXISTS `mj_guang`;
CREATE TABLE `mj_guang` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` smallint(6) NOT NULL COMMENT '0代表顶部，1代表左侧，2代表中部，3代表底部',
  `picname` varchar(255) DEFAULT NULL,
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1表示激活,0表示未激活',
  `clicknum` int(11) DEFAULT NULL,
  `toptime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '置顶时间',
  `flag` int(11) DEFAULT '0' COMMENT '1代表置顶，0相反',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

#
# Data for table "mj_guang"
#

INSERT INTO `mj_guang` VALUES (44,0,'2016-10-28/58131d872c12a.jpg',0,0,0,NULL,'2016-10-28 17:42:41',0),(45,0,'2016-10-28/58131da09cbf4.jpg',0,0,0,NULL,'2016-10-28 17:43:06',0),(46,0,'2016-10-28/58131da68f1c5.jpg',0,0,0,NULL,'2016-10-28 17:43:12',0),(47,0,'2016-10-28/58131e525e08c.jpg',0,0,0,NULL,'2016-10-28 17:46:04',0),(48,0,'2016-10-28/58131eb414389.jpg',0,0,0,NULL,'2016-10-28 17:47:42',0),(49,0,'2016-10-28/58131ec65a51a.jpg',0,0,0,NULL,'2016-10-28 17:48:00',0),(50,0,NULL,0,0,0,NULL,NULL,0),(51,0,NULL,0,0,0,NULL,NULL,0),(57,0,'2016-10-28/581323a617bc9.jpg',1477649313,0,0,NULL,'2016-10-28 18:08:48',0);

#
# Structure for table "mj_member"
#

DROP TABLE IF EXISTS `mj_member`;
CREATE TABLE `mj_member` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(33) NOT NULL DEFAULT '',
  `truename` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(15) NOT NULL,
  `code_id` smallint(6) DEFAULT NULL,
  `member_img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `money` float(11,2) DEFAULT '0.00',
  `frozen_money` float(11,2) DEFAULT '0.00' COMMENT '冻结资金',
  `level_id` smallint(6) DEFAULT NULL,
  `add_time` varchar(32) DEFAULT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "mj_member"
#

INSERT INTO `mj_member` VALUES (1,'李四2','edd239c3465c7608a38f0e237672fbdb',NULL,'455232www4@qq.com','15093113888',1,'111.png',1,2757.00,972870.00,2,'1477538625','127.0.0.1'),(2,'admin','561234ec6ff3ff4e514a12fd939b1d06',NULL,'121123@qq.com','13288888888',NULL,NULL,NULL,22.00,0.00,2,NULL,NULL),(3,'wangqiang','561234ec6ff3ff4e514a12fd939b1d06',NULL,'121123@qq.com','13288888888',NULL,NULL,0,0.00,0.00,3,NULL,NULL),(4,'nihao','561234ec6ff3ff4e514a12fd939b1d06',NULL,'1231213123@qq.com','13288888888',NULL,NULL,0,0.00,0.00,4,'1477464982','127.0.0.1');

#
# Structure for table "mj_member_level"
#

DROP TABLE IF EXISTS `mj_member_level`;
CREATE TABLE `mj_member_level` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(16) NOT NULL,
  `level_logo` varchar(30) DEFAULT NULL,
  `member_id` mediumint(9) DEFAULT NULL,
  `discount` float DEFAULT NULL COMMENT '折扣',
  `special` tinyint(1) DEFAULT '0' COMMENT '特殊会员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "mj_member_level"
#

INSERT INTO `mj_member_level` VALUES (1,'白金会员','2016-10-26/58101dd8ebcc3.jpg',NULL,95,0),(2,'黄金会员','2016-10-26/58101e0a88e18.jpg',NULL,88,0),(3,'钻石会员','2016-10-26/58101e2fa76db.jpg',NULL,77,0),(4,'至尊会员','2016-10-26/58101e55bd336.gif',NULL,50,1);

#
# Structure for table "mj_member_list"
#

DROP TABLE IF EXISTS `mj_member_list`;
CREATE TABLE `mj_member_list` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` mediumint(10) NOT NULL,
  `sid` tinyint(50) NOT NULL DEFAULT '0',
  `mycid` varchar(20) DEFAULT NULL,
  `mybid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_member_list"
#


#
# Structure for table "mj_money_log"
#

DROP TABLE IF EXISTS `mj_money_log`;
CREATE TABLE `mj_money_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(30) DEFAULT NULL COMMENT '项目',
  `change_time` varchar(11) DEFAULT NULL,
  `money` varchar(20) DEFAULT NULL COMMENT '可用资金',
  `frozen_money` varchar(20) DEFAULT NULL COMMENT '冻结资金',
  `reason` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL COMMENT '会员id',
  `change_user` varchar(27) DEFAULT NULL,
  `money_before` float(11,2) DEFAULT '0.00' COMMENT '可用余额改变钱',
  `money_after` float(11,2) DEFAULT '0.00' COMMENT '可用余额改变后',
  `frozen_money_before` float(11,2) DEFAULT '0.00' COMMENT '冻结资金改变前',
  `frozen_money_after` float(11,2) NOT NULL DEFAULT '0.00' COMMENT '冻结资金改变后',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='资金流动记录';

#
# Data for table "mj_money_log"
#

INSERT INTO `mj_money_log` VALUES (3,'后台资金管理','1477569390','+12','+32','账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因账户变动原因',1,'sc',-121609.00,-121597.00,848484.00,848516.00),(4,'后台资金管理','1477569831','+22','+','123',2,'sc',0.00,22.00,0.00,0.00),(5,'后台资金管理','1477569965','+20','+','121',5,'sc',0.00,20.00,0.00,0.00),(6,'后台资金管理','1477636106','+123123','+','213123',1,'sc',-121597.00,1526.00,848516.00,848516.00),(7,'后台资金管理','1477636110','+','+1231','123',1,'sc',1526.00,1526.00,848516.00,849747.00),(8,'后台资金管理','1477636127','+1231','+','12312',1,'sc',1526.00,2757.00,849747.00,849747.00),(9,'后台资金管理','1477636131','+','+123123','123123',1,'sc',2757.00,2757.00,849747.00,972870.00);

#
# Structure for table "mj_order_goods"
#

DROP TABLE IF EXISTS `mj_order_goods`;
CREATE TABLE `mj_order_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL,
  `goods_number` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "mj_order_goods"
#

INSERT INTO `mj_order_goods` VALUES (1,7,24,1),(2,7,25,3),(3,9,26,6),(4,6,27,3),(5,6,28,1),(6,3,27,5),(7,3,24,1);

#
# Structure for table "mj_order_status"
#

DROP TABLE IF EXISTS `mj_order_status`;
CREATE TABLE `mj_order_status` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL DEFAULT '',
  `user_opt` varchar(30) DEFAULT NULL,
  `admin_opt` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "mj_order_status"
#

INSERT INTO `mj_order_status` VALUES (1,'待发货','付款','未付款'),(2,'已付款',NULL,'发货'),(3,'已发货','确认收货',NULL),(4,'订单完成',NULL,NULL),(5,'订单已取消','订单已取消','订单已取消');

#
# Structure for table "mj_orders"
#

DROP TABLE IF EXISTS `mj_orders`;
CREATE TABLE `mj_orders` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `order_sn` varchar(60) NOT NULL COMMENT '商品订单号',
  `order_goods_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `add_time` int(10) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `addresses_id` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "mj_orders"
#

INSERT INTO `mj_orders` VALUES (3,2,'222222',0,300.00,20151010,1,2,'请送至传达室'),(6,3,'5555',0,660.00,20121212,1,3,'请务必交给本人'),(7,2,'525232485',0,20000.00,20161112,3,1,'···············'),(8,1,'7777',0,888.00,20131214,2,5,'易碎物品，轻拿轻放'),(9,3,'78634263',0,50000.00,20121212,3,4,'请务必交给本人'),(10,1,'758519536',0,50000.00,20161012,2,1,'客户是国家栋梁，请优先配送'),(11,4,'14785236',0,444556.00,20161014,2,2,'~~~~~~~~~~'),(12,5,'7412563',0,50000.00,20160908,2,4,'客户是国家栋梁，请优先配送');

#
# Structure for table "mj_shop_config"
#

DROP TABLE IF EXISTS `mj_shop_config`;
CREATE TABLE `mj_shop_config` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL COMMENT '自定义名称',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='商城设置';

#
# Data for table "mj_shop_config"
#

INSERT INTO `mj_shop_config` VALUES (1,'site_name','美酒网'),(2,'keywords','美酒,葡萄酒'),(3,'description','美酒网美酒网美酒网美酒网'),(4,'icp','豫ICP备14017271号'),(5,'company_name','尚潮网'),(6,'site_email','2295186202@qq.com'),(7,'site_phone','13288888888'),(8,'rewrite_on','0'),(9,'rewrite_type','pathinfo'),(10,'statistics','http://ta.qq.com'),(11,'hotsearch','123213'),(12,'qqid','123213'),(13,'qqkey','113'),(14,'wbid','123'),(15,'wbkey','213'),(16,'tbid','123'),(17,'tbkey','213'),(18,'tbpid','123'),(19,'water_on','1'),(20,'water_type','1'),(21,'water_pos','1'),(22,'water_size','0'),(23,'water_str','23232'),(24,'upimg',''),(25,'water_img',''),(26,'phone_on','0'),(27,'phone_reg','1'),(28,'sms_ymdian_order_new','0'),(29,'sms_koudai_order_new','0'),(30,'sms_shop_order_new','0'),(31,'sms_kucun_order_new','0'),(32,'sms_type','alidayu'),(33,'phone_user','12312'),(34,'sms_qianming','12321'),(35,'phone_pwd','123123'),(36,'phone_num','123123'),(37,'invite_money','23'),(38,'invite_gold','213'),(39,'invite_grade','123'),(40,'order_unpay','0'),(41,'moneypay','1'),(42,'alipay','0'),(43,'wxpay','0'),(44,'tenpay','1'),(45,'express_fee','123'),(46,'express_fee_add','23'),(47,'kf_phone','213'),(48,'kf_qq','123'),(49,'kf_ww','123'),(50,'smtphost','smtp.mxhichina.com2'),(51,'smtpport','253'),(52,'smtpemail','2295186202@qq.com'),(53,'smtpuser','65546'),(54,'smtppwd','5465'),(55,'order_first_discount','23'),(56,'order_first_money','123'),(57,'gold_checkin','213'),(58,'gold_checkin_max','123'),(59,'grade_checkin','23'),(60,'grade_checkin_max','13123');

#
# Structure for table "mj_user"
#

DROP TABLE IF EXISTS `mj_user`;
CREATE TABLE `mj_user` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `truename` varchar(10) NOT NULL,
  `sex` varchar(5) NOT NULL COMMENT '1是男   0是女',
  `email` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birthday` varchar(15) NOT NULL,
  `marry` varchar(20) NOT NULL DEFAULT '' COMMENT '-1为保密  0为未婚  1为已婚',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "mj_user"
#

