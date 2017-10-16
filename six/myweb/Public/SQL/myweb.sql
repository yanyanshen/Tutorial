-- 表的结构：ihome_admin --
CREATE TABLE `ihome_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `power` tinyint(4) DEFAULT '0',
  `lastlogintime` varchar(40) DEFAULT NULL,
  `lastcat` varchar(80) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `vip` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `createpeop` varchar(255) DEFAULT NULL,
  `createtime` varchar(255) DEFAULT NULL,
  `logintime` varchar(11) DEFAULT '没有登录信息',
  `loginip` varchar(30) DEFAULT '没有登录IP信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_category --
CREATE TABLE `ihome_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL,
  `pid` smallint(5) unsigned DEFAULT '0',
  `path` varchar(128) DEFAULT NULL,
  `issale` tinyint(4) DEFAULT '0' COMMENT '判断分类是否可用，0默认为可用',
  `flag` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_goods --
CREATE TABLE `ihome_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(60) NOT NULL,
  `color` varchar(60) NOT NULL COMMENT '商品属性',
  `cid` smallint(5) unsigned NOT NULL,
  `marketprice` float(9,2) unsigned NOT NULL,
  `price` float(9,2) unsigned NOT NULL,
  `pic` varchar(60) NOT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `salenum` int(11) DEFAULT NULL,
  `description` mediumtext,
  `createtime` int(11) unsigned DEFAULT NULL,
  `issale` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1上架状态，0下架状态',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_goods_comment --
CREATE TABLE `ihome_goods_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `comtime` varchar(40) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_goods_pic --
CREATE TABLE `ihome_goods_pic` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `picname` varchar(60) NOT NULL COMMENT '商品图片',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_member --
CREATE TABLE `ihome_member` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `lastlogintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_member_inte --
CREATE TABLE `ihome_member_inte` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `mid` tinyint(3) NOT NULL,
  `integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员积分和最后操作',
  `lastact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_news --
CREATE TABLE `ihome_news` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `keyword` varchar(40) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_notice --
CREATE TABLE `ihome_notice` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `keyword` varchar(40) NOT NULL,
  `url` varchar(40) DEFAULT NULL,
  `content` text NOT NULL,
  `fl` varchar(10) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_order --
CREATE TABLE `ihome_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(40) NOT NULL,
  `mid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `orderstatus` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '10  未付款，未发货 \r\n20  已付款，未发货  \r\n30  已付款 ，已发货 \r\n40  已确认，订单完成',
  `sendtime` int(10) DEFAULT NULL,
  `overtime` int(10) DEFAULT NULL,
  `prices` float(9,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_order_goods --
CREATE TABLE `ihome_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `buynum` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的结构：ihome_order_status --
CREATE TABLE `ihome_order_status` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `order_status_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;-- <xjx> --

-- 表的数据：ihome_admin --
INSERT INTO `ihome_admin` VALUES
('21','冯提莫','202cb962ac59075b964b07152d234b70','0',NULL,NULL,'13913913910','0','abcd@qq.com','root','1468661533','1468895318','127.0.0.1'...),
('10000','root','202cb962ac59075b964b07152d234b70','0',NULL,NULL,'1231231231231','1','root@qq.com','root','1468659223','1469156378','127.0.0.1'...),
('10006','超级管理员','e10adc3949ba59abbe56e057f20f883e','0',NULL,NULL,'13612612626','1','email@eamil.com','root','1469108425','没有登录信息','没有登录IP信息'...)...;-- <xjx> --

-- 表的数据：ihome_category --
INSERT INTO `ihome_category` VALUES
('1','卧室家具','0','1','0','1'...),
('2','客厅餐厅家具','0','2','0','1'...),
('3','儿童家具','0','3','0','1'...),
('4','书房家具','0','4','0','1'...),
('5','阳台户外','0','5','0','1'...),
('6','储物家具','0','6','0','1'...),
('7','商业办公','0','7','0','1'...),
('8','床','1','1,8','0','1'...),
('9','床垫','1','1,9','0','1'...),
('10','柜类','1','1,10','0','1'...),
('11','梳妆台凳','1','1,11','0','1'...),
('12','沙发','2','2,12','0','1'...),
('13','电视柜','2','2,13','0','1'...),
('14','餐厅家具','2','2,14','0','1'...),
('15','边桌茶几','2','2,15','0','1'...),
('16','儿童床','3','3,16','0','1'...),
('17','儿童桌椅','3','3,17','0','1'...),
('18','儿童衣柜','3','3,18','0','1'...),
('19','电脑桌','4','4,19','0','1'...),
('20','电脑椅','4','4,20','0','1'...),
('21','书架书柜','4','4,21','0','1'...),
('22','晾衣架','5','5,22','0','1'...),
('23','户外家具','5','5,23','0','1'...),
('24','家用梯','5','5,24','0','1'...),
('25','折叠床','5','5,25','0','1'...),
('26','花架层架','5','5,26','0','1'...),
('27','鞋架','6','6,27','0','1'...),
('28','储物收纳','6','6,28','0','1'...),
('29','墙面搁架','6','6,29','0','1'...),
('30','衣帽架','6','6,30','0','1'...),
('31','办公桌','7','7,31','0','1'...),
('32','会议桌','7','7,32','0','1'...),
('33','办公柜类','7','7,33','0','1'...),
('34','办公沙发','7','7,34','0','1'...),
('35','货架展示架','7','7,35','0','1'...),
('36','衣柜','10','1,10,36','0','1'...),
('37','简易衣柜','10','1,10,37','0','1'...),
('38','床头柜','10','1,10,38','0','1'...),
('39','斗柜','10','1,10,39','0','1'...),
('40','定制衣柜','10','1,10,40','0','1'...),
('41','梳妆台','11','1,11,41','0','1'...),
('42','梳妆凳','11','1,11,42','0','1'...),
('43','穿衣镜','11','1,11,43','0','1'...),
('44','组合套餐','11','1,11,44','0','1'...),
('45','全实木床','8','1,8,45','0','1'...),
('46','板木结合床','8','1,8,46','0','1'...),
('47','皮艺床','8','1,8,47','0','1'...),
('48','布艺床','8','1,8,48','0','1'...),
('49','子母床','8','1,8,49','0','1'...),
('50','弹簧床垫','9','1,9,50','0','1'...),
('51','记忆棉床垫','9','1,9,51','0','1'...)...;-- <xjx> --

-- 表的数据：ihome_goods --
INSERT INTO `ihome_goods` VALUES
('5','好事达书柜书架','橘黄','21','150.00','90.00','578743592c503.jpg','96','90','<h1 style=\"color:#666666;background-color:#ffffff;font-size:16px;font-family:arial, \'microsoft yahei\';\">好事达书柜书架 简易置物架 木质收纳架1609凯文木色</h1>','1468482393','0'...),
('6','9i90i','okl','0','454.00','5415.00','5790ca10c1bef.png','54165',NULL,'','1469106704','1'...)...;-- <xjx> --

-- 表的数据：ihome_goods_pic --
INSERT INTO `ihome_goods_pic` VALUES
('1','1','578730ec36ab8.jpg'...),
('2','1','578730ec37288.jpg'...),
('3','1','578730ec37a58.jpg'...),
('4','2','578731db4b328.jpg'...),
('5','2','578731db4bee0.jpg'...),
('6','2','578731db4c2c8.jpg'...),
('7','3','578742a3da2ed.jpg'...),
('8','3','578742a3daea5.jpg'...),
('9','3','578742a3db675.jpg'...),
('10','4','578742fb323fc.jpg'...),
('11','4','578742fb32fb4.jpg'...),
('12','4','578742fb33b6c.jpg'...),
('13','5','578743592c503.jpg'...),
('14','5','578743592ccd3.jpg'...),
('15','5','578743592d4a3.jpg'...),
('16','6','578f2fc1b9c0a.png'...),
('17','6','5790ca10c1bef.png'...)...;-- <xjx> --

-- 表的数据：ihome_member --
INSERT INTO `ihome_member` VALUES
('1','gaoyong','f66c583bb0f57faf6eacaedc7e30834a',NULL,NULL,'1465214017','1465214017','172.16.11.90'...),
('2','xvjinkui','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,'1465281415','1465281415','172.16.11.214'...),
('3','ceshi','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,'1465370035','1465370035','172.16.11.214'...)...;-- <xjx> --

-- 表的数据：ihome_notice --
INSERT INTO `ihome_notice` VALUES
('32','呵呵呵呵呵呵','呵呵呵呵呵呵','http://www.it.com','呵呵呵呵呵呵呵呵呵呵呵','0','1469100361','root'...),
('33','看看这个网站','12311231313132131313','http://www.it.com','<img src=\"/myweb/Public/kindeditor/attached/image/20160721/20160721192722_82122.jpg\" alt=\"\">','1','1469100443','root'...)...;-- <xjx> --

-- 表的数据：ihome_order --
INSERT INTO `ihome_order` VALUES
('1','2016-06-07df3d75115b06a56d','1','1465285569','20',NULL,NULL,'29307.00'...),
('2','2016-06-07462c983b2732a53f','1','1465287523','10',NULL,NULL,'100492.00'...),
('3','2016-06-08496fec2fdaf2254a','1','1465352042','20',NULL,NULL,'16999.00'...),
('4','2016-06-081ac05b19187b4caf','1','1465352493','20',NULL,NULL,'3088.00'...),
('5','2016-06-087272c2565ddbdff9','1','1465353330','20',NULL,NULL,'999.00'...)...;-- <xjx> --

-- 表的数据：ihome_order_goods --
INSERT INTO `ihome_order_goods` VALUES
('1','1','3','1'...),
('2','1','5','1'...),
('3','1','4','2'...),
('4','1','1','1'...),
('5','2','2','1'...),
('6','2','3','1'...),
('7','2','5','5'...),
('8','2','4','1'...),
('9','2','1','1'...),
('10','3','5','1'...),
('11','4','1','1'...),
('12','5','4','1'...)...;-- <xjx> --

-- 表的数据：ihome_order_status --
INSERT INTO `ihome_order_status` VALUES
('10','未付款'...),
('20','已付款'...),
('30','已发货'...),
('40','已完成'...)...;-- <xjx> --

