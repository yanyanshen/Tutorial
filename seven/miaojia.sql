/*
Navicat MySQL Data Transfer

Source Server         : miaojia
Source Server Version : 50150
Source Host           : 172.16.11.214:3306
Source Database       : miaojia

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2016-07-29 10:44:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mj_address`
-- ----------------------------
DROP TABLE IF EXISTS `mj_address`;
CREATE TABLE `mj_address` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `uid` int(4) NOT NULL,
  `address` varchar(300) NOT NULL,
  `code` int(6) DEFAULT NULL,
  `default` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_address
-- ----------------------------
INSERT INTO `mj_address` VALUES ('1', 'lishuang', '13245678956', '10', '河南省郑州市中原区', '450000', '0');
INSERT INTO `mj_address` VALUES ('2', '蒲公英', '18203680663', '9', '北京市北京市东城区135号', '462400', '0');
INSERT INTO `mj_address` VALUES ('3', '111', '18537303624', '17', '北京市北京市东城区111', '464141', '0');
INSERT INTO `mj_address` VALUES ('4', '张小亮', '15237851510', '15', '北京市北京市西城区云和数据', '473000', '0');

-- ----------------------------
-- Table structure for `mj_admin`
-- ----------------------------
DROP TABLE IF EXISTS `mj_admin`;
CREATE TABLE `mj_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `logintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(15) DEFAULT NULL,
  `level` int(2) NOT NULL DEFAULT '1' COMMENT '1：超级管理员    0：普通管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_admin
-- ----------------------------
INSERT INTO `mj_admin` VALUES ('5', 'ctt1026', 'c73bef4145f5608d6abcd8fc80ec1a4f', '1469757673', '172.16.11.192', '1');
INSERT INTO `mj_admin` VALUES ('6', 'zxl4639', 'e10adc3949ba59abbe56e057f20f883e', '1469759117', '127.0.0.1', '1');
INSERT INTO `mj_admin` VALUES ('8', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1469669651', '127.0.0.1', '1');
INSERT INTO `mj_admin` VALUES ('9', 'lishuang', 'e10adc3949ba59abbe56e057f20f883e', '1469757787', '172.16.11.177', '1');

-- ----------------------------
-- Table structure for `mj_cart`
-- ----------------------------
DROP TABLE IF EXISTS `mj_cart`;
CREATE TABLE `mj_cart` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `gid` int(4) NOT NULL,
  `goodsargs` varchar(30) NOT NULL,
  `buynum` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_cart
-- ----------------------------
INSERT INTO `mj_cart` VALUES ('14', '17', '5', '芹菜猪肉', '1');

-- ----------------------------
-- Table structure for `mj_category`
-- ----------------------------
DROP TABLE IF EXISTS `mj_category`;
CREATE TABLE `mj_category` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) NOT NULL COMMENT '分类名称',
  `pid` int(4) NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `path` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_category
-- ----------------------------
INSERT INTO `mj_category` VALUES ('1', '生鲜', '0', '1', '1');
INSERT INTO `mj_category` VALUES ('2', '食品调料', '0', '2', '1');
INSERT INTO `mj_category` VALUES ('3', '酒类', '0', '3', '1');
INSERT INTO `mj_category` VALUES ('4', '地方特产', '0', '4', '1');
INSERT INTO `mj_category` VALUES ('5', '全球购美食', '0', '5', '1');
INSERT INTO `mj_category` VALUES ('6', '水果蔬菜', '1', '1,6', '1');
INSERT INTO `mj_category` VALUES ('7', '海鲜水产', '1', '1,7', '1');
INSERT INTO `mj_category` VALUES ('8', '猪肉羊肉', '1', '1,8', '1');
INSERT INTO `mj_category` VALUES ('9', '禽类蛋品', '1', '1,9', '1');
INSERT INTO `mj_category` VALUES ('10', '冷冻食品', '2', '2,10', '1');
INSERT INTO `mj_category` VALUES ('11', '进口食品', '2', '2,11', '1');
INSERT INTO `mj_category` VALUES ('12', '休闲食品', '2', '2,12', '1');
INSERT INTO `mj_category` VALUES ('13', '粮油调味', '2', '2,13', '1');
INSERT INTO `mj_category` VALUES ('14', '精品白酒', '3', '3,14', '1');
INSERT INTO `mj_category` VALUES ('15', '精品红酒', '3', '3,15', '1');
INSERT INTO `mj_category` VALUES ('16', '进口洋酒', '3', '3,16', '1');
INSERT INTO `mj_category` VALUES ('17', '纯正啤酒', '3', '3,17', '1');
INSERT INTO `mj_category` VALUES ('18', '特产零食', '4', '4,18', '1');
INSERT INTO `mj_category` VALUES ('19', '茗茶冲调', '4', '4,19', '1');
INSERT INTO `mj_category` VALUES ('20', '滋补保健', '4', '4,20', '1');
INSERT INTO `mj_category` VALUES ('21', '参茸礼品', '4', '4,21', '1');
INSERT INTO `mj_category` VALUES ('22', '进口牛奶', '5', '5,22', '1');
INSERT INTO `mj_category` VALUES ('23', '进口美味', '5', '5,23', '1');
INSERT INTO `mj_category` VALUES ('24', '苹果', '6', '1,6,24', '1');
INSERT INTO `mj_category` VALUES ('25', '进口冲调', '5', '5,25', '1');
INSERT INTO `mj_category` VALUES ('26', '进口休食', '5', '5,26', '1');
INSERT INTO `mj_category` VALUES ('27', '奇异果', '6', '1,6,27', '1');
INSERT INTO `mj_category` VALUES ('28', '芒果', '6', '1,6,28', '1');
INSERT INTO `mj_category` VALUES ('29', '大樱桃', '6', '1,6,29', '1');
INSERT INTO `mj_category` VALUES ('30', '茄果瓜类', '6', '1,6,30', '1');
INSERT INTO `mj_category` VALUES ('31', '叶菜类', '6', '1,6,31', '1');
INSERT INTO `mj_category` VALUES ('32', '虾类', '7', '1,7,32', '1');
INSERT INTO `mj_category` VALUES ('33', '根茎类', '6', '1,6,33', '1');
INSERT INTO `mj_category` VALUES ('34', '饮料饮品', '0', '34', '1');
INSERT INTO `mj_category` VALUES ('35', '蟹类', '7', '1,7,35', '1');
INSERT INTO `mj_category` VALUES ('36', '鱼类', '7', '1,7,36', '1');
INSERT INTO `mj_category` VALUES ('37', '贝类', '7', '1,7,37', '1');
INSERT INTO `mj_category` VALUES ('38', '碳酸饮料', '34', '34,38', '1');
INSERT INTO `mj_category` VALUES ('39', '海参', '7', '1,7,39', '1');
INSERT INTO `mj_category` VALUES ('40', '功能饮料', '34', '34,40', '1');
INSERT INTO `mj_category` VALUES ('41', '三文鱼', '7', '1,7,41', '1');
INSERT INTO `mj_category` VALUES ('42', '香浓咖啡', '34', '34,42', '1');
INSERT INTO `mj_category` VALUES ('43', '北极甜虾', '7', '1,7,43', '1');
INSERT INTO `mj_category` VALUES ('44', '冷调冲饮', '34', '34,44', '1');
INSERT INTO `mj_category` VALUES ('45', '牛肉', '8', '1,8,45', '1');
INSERT INTO `mj_category` VALUES ('46', '羊肉', '8', '1,8,46', '1');
INSERT INTO `mj_category` VALUES ('47', '猪肉', '8', '1,8,47', '1');
INSERT INTO `mj_category` VALUES ('48', '茅台', '14', '3,14,48', '1');
INSERT INTO `mj_category` VALUES ('49', '牛排', '8', '1,8,49', '1');
INSERT INTO `mj_category` VALUES ('50', '五粮液', '14', '3,14,50', '1');
INSERT INTO `mj_category` VALUES ('51', '洋河', '14', '3,14,51', '1');
INSERT INTO `mj_category` VALUES ('52', '牛腩', '8', '1,8,52', '1');
INSERT INTO `mj_category` VALUES ('53', '中国', '15', '3,15,53', '1');
INSERT INTO `mj_category` VALUES ('54', '牛腱', '8', '1,8,54', '1');
INSERT INTO `mj_category` VALUES ('55', '法国', '15', '3,15,55', '1');
INSERT INTO `mj_category` VALUES ('56', '水饺', '10', '2,10,56', '1');
INSERT INTO `mj_category` VALUES ('57', '澳大利亚', '15', '3,15,57', '1');
INSERT INTO `mj_category` VALUES ('58', '汤圆', '10', '2,10,58', '1');
INSERT INTO `mj_category` VALUES ('59', '白兰地', '16', '3,16,59', '1');
INSERT INTO `mj_category` VALUES ('60', '鸡肉', '9', '1,9,60', '1');
INSERT INTO `mj_category` VALUES ('61', '威士忌', '16', '3,16,61', '1');
INSERT INTO `mj_category` VALUES ('62', '面点', '10', '2,10,62', '1');
INSERT INTO `mj_category` VALUES ('63', '伏特加', '16', '3,16,63', '1');
INSERT INTO `mj_category` VALUES ('64', '鸡翅', '9', '1,9,64', '1');
INSERT INTO `mj_category` VALUES ('65', '鸡蛋', '9', '1,9,65', '1');
INSERT INTO `mj_category` VALUES ('66', '进口啤酒', '17', '3,17,66', '1');
INSERT INTO `mj_category` VALUES ('67', '火锅丸串', '10', '2,10,67', '1');
INSERT INTO `mj_category` VALUES ('68', '国产啤酒', '17', '3,17,68', '1');
INSERT INTO `mj_category` VALUES ('69', '咸鸭蛋', '9', '1,9,69', '1');
INSERT INTO `mj_category` VALUES ('70', '速冻半成品', '10', '2,10,70', '1');
INSERT INTO `mj_category` VALUES ('71', '黑啤', '17', '3,17,71', '1');
INSERT INTO `mj_category` VALUES ('72', '松花蛋', '9', '1,9,72', '1');
INSERT INTO `mj_category` VALUES ('73', '奶酪/黄油', '10', '2,10,73', '1');
INSERT INTO `mj_category` VALUES ('74', '牛奶', '11', '2,11,74', '1');
INSERT INTO `mj_category` VALUES ('75', '饼干蛋糕', '11', '2,11,75', '1');
INSERT INTO `mj_category` VALUES ('76', '糖果/巧克力', '11', '2,11,76', '1');
INSERT INTO `mj_category` VALUES ('77', '休闲零食', '11', '2,11,77', '1');
INSERT INTO `mj_category` VALUES ('78', '坚果炒货', '18', '4,18,78', '1');
INSERT INTO `mj_category` VALUES ('79', '冲调饮品', '11', '2,11,79', '1');
INSERT INTO `mj_category` VALUES ('80', '无糖食品', '18', '4,18,80', '1');
INSERT INTO `mj_category` VALUES ('81', '烘焙糕点', '18', '4,18,81', '1');
INSERT INTO `mj_category` VALUES ('82', '坚果', '12', '2,12,82', '1');
INSERT INTO `mj_category` VALUES ('83', '肉干肉铺', '12', '2,12,83', '1');
INSERT INTO `mj_category` VALUES ('84', '果干蜜饯', '18', '4,18,84', '1');
INSERT INTO `mj_category` VALUES ('85', '蜜饯果干', '12', '2,12,85', '1');
INSERT INTO `mj_category` VALUES ('86', '米面杂粮', '13', '2,13,86', '1');
INSERT INTO `mj_category` VALUES ('87', '食用油', '13', '2,13,87', '1');
INSERT INTO `mj_category` VALUES ('88', '调味品', '13', '2,13,88', '1');
INSERT INTO `mj_category` VALUES ('89', '南北干货', '13', '2,13,89', '1');
INSERT INTO `mj_category` VALUES ('90', '方便食品', '13', '2,13,90', '1');
INSERT INTO `mj_category` VALUES ('91', '有机食品', '13', '2,13,91', '1');
INSERT INTO `mj_category` VALUES ('92', '地方茶叶', '19', '4,19,92', '1');
INSERT INTO `mj_category` VALUES ('93', '冲调冲饮', '19', '4,19,93', '1');
INSERT INTO `mj_category` VALUES ('94', '养生茶', '19', '4,19,94', '1');
INSERT INTO `mj_category` VALUES ('95', '谷物代餐粉', '19', '4,19,95', '1');
INSERT INTO `mj_category` VALUES ('96', '阿胶', '20', '4,20,96', '1');
INSERT INTO `mj_category` VALUES ('97', '枸杞', '20', '4,20,97', '1');
INSERT INTO `mj_category` VALUES ('98', '蜂蜜', '20', '4,20,98', '1');
INSERT INTO `mj_category` VALUES ('99', '全脂', '22', '5,22,99', '1');
INSERT INTO `mj_category` VALUES ('100', '低脂', '22', '5,22,100', '1');
INSERT INTO `mj_category` VALUES ('101', '冬虫夏草', '20', '4,20,101', '1');
INSERT INTO `mj_category` VALUES ('102', '脱脂', '22', '5,22,102', '1');
INSERT INTO `mj_category` VALUES ('103', '德国牛奶', '22', '5,22,103', '1');
INSERT INTO `mj_category` VALUES ('104', '香蕉牛奶', '22', '5,22,104', '1');
INSERT INTO `mj_category` VALUES ('105', '酸奶', '22', '5,22,105', '1');
INSERT INTO `mj_category` VALUES ('106', '开心果', '23', '5,23,106', '1');
INSERT INTO `mj_category` VALUES ('107', '芒果干', '23', '5,23,107', '1');
INSERT INTO `mj_category` VALUES ('108', '松茸', '21', '4,21,108', '1');
INSERT INTO `mj_category` VALUES ('109', '曲奇饼干', '23', '5,23,109', '1');
INSERT INTO `mj_category` VALUES ('110', '人参', '21', '4,21,110', '1');
INSERT INTO `mj_category` VALUES ('111', '保健礼盒', '21', '4,21,111', '1');
INSERT INTO `mj_category` VALUES ('112', '黑巧克力', '23', '5,23,112', '1');
INSERT INTO `mj_category` VALUES ('113', '棉花糖', '23', '5,23,113', '1');
INSERT INTO `mj_category` VALUES ('114', '披萨', '23', '5,23,114', '1');
INSERT INTO `mj_category` VALUES ('115', '淡干海参', '21', '4,21,115', '1');
INSERT INTO `mj_category` VALUES ('116', '柚子茶', '25', '5,25,116', '1');
INSERT INTO `mj_category` VALUES ('117', '白咖啡', '25', '5,25,117', '1');
INSERT INTO `mj_category` VALUES ('118', '咖啡豆', '25', '5,25,118', '1');
INSERT INTO `mj_category` VALUES ('119', '花果茶', '25', '5,25,119', '1');
INSERT INTO `mj_category` VALUES ('120', '养生粉', '25', '5,25,120', '1');
INSERT INTO `mj_category` VALUES ('121', '什锦坚果', '26', '5,26,121', '1');
INSERT INTO `mj_category` VALUES ('123', '榴莲干', '26', '5,26,123', '1');
INSERT INTO `mj_category` VALUES ('124', '西式糕点', '26', '5,26,124', '1');
INSERT INTO `mj_category` VALUES ('125', '薯片', '26', '5,26,125', '1');
INSERT INTO `mj_category` VALUES ('126', '海苔', '12', '2,12,126', '1');
INSERT INTO `mj_category` VALUES ('127', '可乐', '38', '34,38,127', '1');
INSERT INTO `mj_category` VALUES ('128', '雪碧/七喜', '38', '34,38,128', '1');
INSERT INTO `mj_category` VALUES ('129', '果味', '38', '34,38,129', '1');
INSERT INTO `mj_category` VALUES ('130', '苏打水', '38', '34,38,130', '1');
INSERT INTO `mj_category` VALUES ('131', '运动饮料', '40', '34,40,131', '1');
INSERT INTO `mj_category` VALUES ('132', '能量饮料', '40', '34,40,132', '1');
INSERT INTO `mj_category` VALUES ('133', '营养素软饮', '40', '34,40,133', '1');
INSERT INTO `mj_category` VALUES ('134', '健康饮料', '40', '34,40,134', '1');
INSERT INTO `mj_category` VALUES ('135', '速溶咖啡', '42', '34,42,135', '1');
INSERT INTO `mj_category` VALUES ('136', '咖啡粉', '42', '34,42,136', '1');
INSERT INTO `mj_category` VALUES ('137', '咖啡伴侣', '42', '34,42,137', '1');
INSERT INTO `mj_category` VALUES ('138', '咖啡礼盒', '42', '34,42,138', '1');
INSERT INTO `mj_category` VALUES ('139', '燕麦谷物', '44', '34,44,139', '1');
INSERT INTO `mj_category` VALUES ('140', '果茶冲饮', '44', '34,44,140', '1');
INSERT INTO `mj_category` VALUES ('141', '芝麻糊', '44', '34,44,141', '1');
INSERT INTO `mj_category` VALUES ('142', '奶茶冲饮', '44', '34,44,142', '1');
INSERT INTO `mj_category` VALUES ('143', '剑南春', '14', '3,14,143', '1');
INSERT INTO `mj_category` VALUES ('144', '荷兰', '15', '3,15,144', '1');
INSERT INTO `mj_category` VALUES ('145', '马天尼', '16', '3,16,145', '1');
INSERT INTO `mj_category` VALUES ('146', '无酿/果啤', '17', '3,17,146', '1');

-- ----------------------------
-- Table structure for `mj_goods`
-- ----------------------------
DROP TABLE IF EXISTS `mj_goods`;
CREATE TABLE `mj_goods` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(200) NOT NULL,
  `busiprice` float(10,2) DEFAULT NULL,
  `siteprice` float(10,2) NOT NULL,
  `cid` int(4) DEFAULT NULL,
  `goodsintro` text,
  `goodsargs` text,
  `goodsdetail` text,
  `image` varchar(200) DEFAULT NULL,
  `goodspro` varchar(200) DEFAULT NULL COMMENT '商品属性',
  `weight` varchar(50) DEFAULT NULL,
  `hot` int(1) NOT NULL DEFAULT '0',
  `tj` int(1) NOT NULL DEFAULT '0',
  `issale` int(1) NOT NULL DEFAULT '1',
  `goodsnum` int(4) DEFAULT '999',
  `salenum` int(4) DEFAULT '0',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_goods
-- ----------------------------
INSERT INTO `mj_goods` VALUES ('1', '珍享 新西兰皇后红玫瑰苹果 6个 单果约220g 自营水果', '68.00', '59.00', '24', '入口硬脆，汁水充沛，玫瑰回味，深红靓丽，紧脆香郁，酸甜可口，红如玫瑰。', '6个装河南产,6个装山东产', '&lt;p&gt;&lt;span style=&quot;font-size:24px&quot;&gt;&amp;nbsp; &amp;nbsp; 入口硬脆，汁水充沛，玫瑰回味，深红靓丽，紧脆香郁，酸甜可口，红如玫瑰。&lt;/span&gt;&lt;/p&gt;\r\n', '578c507408f12.jpg,578c50740a29a.jpg,578c50740ae52.jpg', '&lt;p&gt;产品名称：珍享 新西兰皇后红玫瑰苹果 6个 单果约220g 自营水果&lt;/p&gt;\r\n\r\n&lt;p&gt;原产地：新西兰&lt;/p&gt;\r\n\r\n&lt;p&gt;保质期：10天&lt;/p&gt;\r\n\r\n&lt;p&gt;储存方式：0-4度冷藏&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;am', '220g*6', '1', '1', '1', '5000', '0', '1468812835');
INSERT INTO `mj_goods` VALUES ('2', '华圣 高原红富士苹果 6枚 1.2KG 自营水果', '28.90', '26.90', '24', '75MM大小的果子是自然状态下生长的样子，味道更原始纯正，在出口欧洲的苹果中，75MM的果子也广受欢迎！', '75mm果径,80mm果径', '&lt;p&gt;75MM大小的果子是自然状态下生长的样子，味道更原始纯正，在出口欧洲的苹果中，75MM的果子也广受欢迎！&lt;/p&gt;\r\n', '578c53fba1966.jpg,578c53fba2cef.jpg,578c53fba3c8f.jpg', '&lt;p&gt;商品名称：华圣3A 75-80果&lt;/p&gt;\r\n\r\n&lt;p&gt;商品产地：陕西延安&lt;/p&gt;\r\n\r\n&lt;p&gt;分类：红富士&lt;/p&gt;\r\n\r\n&lt;p&gt;国产/进口：国产&lt;/p&gt;\r\n\r\n&lt;p&gt;重量：1kg-2kg&lt;/p&gt;\r\n', '200g*6', '1', '1', '1', '5200', '0', '1468814332');
INSERT INTO `mj_goods` VALUES ('3', '湾仔码头 速冻水饺 多菜多益荠菜嫩笋口味 720g', '33.90', '30.00', '56', '湾仔码头 速冻水饺 多菜多益荠菜嫩笋口味 720g', '三鲜', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：湾仔码头水饺 多菜多益荠菜嫩笋猪肉 速冻水饺 720g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1546284&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：0.86kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：中国上海&lt;/li&gt;\r\n	&lt;li&gt;净含量：500-1000g&lt;/li&gt;\r\n	&lt;li&gt;口味：素馅&lt;/li&gt;\r\n	&lt;li&gt;适用人群：成人，儿童&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578c54ed440b4.jpg,578c54ed45054.jpg,578c54ed45ff4.jpg,578c54ed46bad.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：湾仔码头水饺 多菜多益荠菜嫩笋猪肉 速冻水饺 720g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1546284&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：0.86kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：中国上海&lt;/li&gt;\r\n	&lt;li&gt;净含量：500-1000g&lt;', '500g', '1', '1', '1', '9999', '0', '1468814573');
INSERT INTO `mj_goods` VALUES ('4', '佳沛zespri 新西兰进口金奇异果猕猴桃 16粒装 36#果 自营水果', '109.00', '99.00', '27', '奇异果营养价值高，含有丰富的维生素和膳食纤维，也含有其他水果很少见的营养成分，老幼皆宜。', '16粒家庭装', '', '578c55ec51857.jpg,578c55ec527f7.jpg,578c55ec533b0.jpg', '&lt;p&gt;品名：佳沛金奇异果&lt;/p&gt;\r\n\r\n&lt;p&gt;产地：新西兰&lt;/p&gt;\r\n\r\n&lt;p&gt;单果重：90-100g&lt;/p&gt;\r\n\r\n&lt;p&gt;口感：口感新鲜，香甜多汁&lt;/p&gt;\r\n\r\n&lt;p&gt;特点：甜度高，营养高&lt;/p&gt;\r\n\r\n&lt;p&gt;储存方式：建议冷藏&lt;/p&gt;\r\n', '1.88kg', '1', '1', '1', '5000', '0', '1468814828');
INSERT INTO `mj_goods` VALUES ('5', '湾仔码头 速冻小云吞 三鲜口味 600g', '29.80', '25.00', '56', '湾仔码头 速冻小云吞 三鲜口味 600g', '芹菜猪肉', '&lt;ul&gt;&lt;li&gt;商品名称：湾仔码头云吞 三鲜口味 600g&lt;/li&gt;&lt;li&gt;商品编号：1345177&lt;/li&gt;&lt;li&gt;商品毛重：0.704kg&lt;/li&gt;&lt;li&gt;商品产地：中国上海&lt;/li&gt;&lt;li&gt;净含量：500-1000g&lt;/li&gt;&lt;li&gt;口味：荤馅&lt;/li&gt;&lt;li&gt;适用人群：成人&lt;/li&gt;&lt;/ul&gt;', '578c55f7b5ddc.jpg,578c55f7b6d7d.jpg,578c55f7b7d1d.jpg,578c55f7b88d5.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：湾仔码头云吞 三鲜口味 600g&lt;/li&gt;&lt;li&gt;商品编号：1345177&lt;/li&gt;&lt;li&gt;商品毛重：0.704kg&lt;/li&gt;&lt;li&gt;商品产地：中国上海&lt;/li&gt;&lt;li&gt;净含量：500-1000g&lt;/li&gt;&lt;li&gt;口味：荤馅&lt', '1000g', '1', '1', '1', '9999', '0', '1468814840');
INSERT INTO `mj_goods` VALUES ('6', '思念 小小玉珍珠黑芝麻汤圆 300g/盒X5', '59.00', '55.00', '58', '思念 小小玉珍珠黑芝麻汤圆', '甜香', '&lt;ul&gt;&lt;li&gt;商品名称：思念 小小玉珍珠黑芝麻汤圆 300g/盒X5&lt;/li&gt;&lt;li&gt;商品编号：10039646869&lt;/li&gt;&lt;li&gt;商品毛重：1.2kg&lt;/li&gt;&lt;li&gt;净含量：1000g以上&lt;/li&gt;&lt;li&gt;口味：甜香&lt;/li&gt;&lt;li&gt;馅料搭配：经典系列&lt;/li&gt;&lt;/ul&gt;', '578c56ead33d5.jpg,578c56ead70c5.jpg,578c56ead8065.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：思念 小小玉珍珠黑芝麻汤圆 300g/盒X5&lt;/li&gt;&lt;li&gt;商品编号：10039646869&lt;/li&gt;&lt;li&gt;商品毛重：1.2kg&lt;/li&gt;&lt;li&gt;净含量：1000g以上&lt;/li&gt;&lt;li&gt;口味：甜香&lt;/li&gt;&lt;li&gt;馅料搭配：经', '1000g', '1', '1', '1', '9999', '0', '1468815083');
INSERT INTO `mj_goods` VALUES ('7', '茅台飞天酒', '999.00', '899.00', '48', '茅台飞天酒53度，色清透明，入口绵柔，清冽甘爽。', '浓香型', '&lt;p&gt;飞天茅台53°，产地贵州省仁怀市。&lt;/p&gt;', '578c5726d86df.jpg', '&lt;p&gt;茅台飞天53°500ml&lt;/p&gt;', '500ml', '0', '0', '1', '500', '0', '1468815143');
INSERT INTO `mj_goods` VALUES ('8', '狗不理 健康素包 12个 420g', '22.90', '20.00', '62', '狗不理 健康素包', '猪肉', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：狗不理420g 健康全素馅&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2210598&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：450.00g&lt;/li&gt;\r\n	&lt;li&gt;商品产地：中国天津市&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：国产&lt;/li&gt;\r\n	&lt;li&gt;口味：中式&lt;/li&gt;\r\n	&lt;li&gt;净含量：300-500g&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578c57beb12cb.jpg,578c57beb4fbb.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：狗不理420g 健康全素馅&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2210598&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：450.00g&lt;/li&gt;\r\n	&lt;li&gt;商品产地：中国天津市&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：国产&lt;/li&gt;\r\n&lt;/ul&', '500g', '1', '1', '1', '9999', '0', '1468815295');
INSERT INTO `mj_goods` VALUES ('9', '汕头农特产馆 幸乐 潮汕牛肉丸牛筋丸鲜猪肉丸 每包250g 共750g 三拼组合 火锅丸子', '78.00', '75.00', '67', '汕头农特产馆 幸乐', '其他', '&lt;ul&gt;&lt;li&gt;商品名称：汕头农特产馆 幸乐 潮汕牛肉丸牛筋丸鲜猪肉丸 每包250g 共750g 三拼组合 火锅丸子&lt;/li&gt;&lt;li&gt;商品编号：10416742251&lt;/li&gt;&lt;li&gt;商品毛重：0.75kg&lt;/li&gt;&lt;li&gt;净含量：300-1000g&lt;/li&gt;&lt;li&gt;口味：其它　&lt;/li&gt;&lt;/ul&gt;', '578c6ff18b2ee.jpg,578c6ff18bea6.jpg,578c6ff18d22e.jpg,578c6ff18d9fe.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：汕头农特产馆 幸乐 潮汕牛肉丸牛筋丸鲜猪肉丸 每包250g 共750g 三拼组合 火锅丸子&lt;/li&gt;&lt;li&gt;商品编号：10416742251&lt;/li&gt;&lt;li&gt;商品毛重：0.75kg&lt;/li&gt;&lt;li&gt;净含量：300-1000g&lt;/li&gt;&lt;li&gt;口味：其它　', '500g', '0', '0', '1', '9999', '0', '1468821490');
INSERT INTO `mj_goods` VALUES ('10', '7式 葡式蛋挞皮 烘焙原料 50个装 1100g/盒', '29.90', '25.90', '70', '葡式蛋挞皮 ', '香甜', '&lt;ul&gt;&lt;li&gt;商品名称：7式葡式蛋挞皮&lt;/li&gt;&lt;li&gt;商品编号：2214021&lt;/li&gt;&lt;li&gt;商品毛重：1.12kg&lt;/li&gt;&lt;li&gt;商品产地：山东省临沂市&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;净含量：1000g以上&lt;/li&gt;&lt;li&gt;分类：其它&lt;/li&gt;&lt;li&gt;包装：简装&lt;/li&gt;&lt;li&gt;烹饪方式：再加工&lt;/li&gt;&lt;/ul&gt;', '578c70d581b5c.jpg,578c70d582afd.jpg,578c70d583a9d.jpg,578c70d584655.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：7式葡式蛋挞皮&lt;/li&gt;&lt;li&gt;商品编号：2214021&lt;/li&gt;&lt;li&gt;商品毛重：1.12kg&lt;/li&gt;&lt;li&gt;商品产地：山东省临沂市&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;净含量：1000g以上&lt;/li&gt', '1.12kg', '0', '0', '1', '9999', '0', '1468821718');
INSERT INTO `mj_goods` VALUES ('11', '多美鲜（SUKI）奶酪芝士', '35.90', '35.00', '73', '多美鲜（SUKI）奶酪芝士 金文必芝士 125g', '香甜', '&lt;ul&gt;&lt;li&gt;商品名称：多美鲜奶酪芝士&lt;/li&gt;&lt;li&gt;商品编号：1883302&lt;/li&gt;&lt;li&gt;商品毛重：160.00g&lt;/li&gt;&lt;li&gt;商品产地：德国&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&gt;特性：不限&lt;/li&gt;&lt;li&gt;脂肪含量：全脂&lt;/li&gt;&lt;li&gt;产品产地：德国&lt;/li&gt;&lt;li&gt;类别：其他&lt;/li&gt;&lt;li&gt;分类：黄油/奶酪&lt;/li&gt;&lt;li&gt;适用人群：通用&lt;/li&gt;&lt;/ul&gt;', '578c71a3142b5.jpg,578c71a315255.jpg,578c71a315e0d.jpg,578c71a3169c5.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：多美鲜奶酪芝士&lt;/li&gt;&lt;li&gt;商品编号：1883302&lt;/li&gt;&lt;li&gt;商品毛重：160.00g&lt;/li&gt;&lt;li&gt;商品产地：德国&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&gt;特性：不限&lt;/li&gt;&lt;li&g', '160.00g', '0', '0', '1', '9999', '0', '1468821923');
INSERT INTO `mj_goods` VALUES ('12', '德国 进口牛奶 欧德堡（Oldenburger）', '65.00', '60.00', '74', '德国品质 欧盟标准 百万好评 全脂进口牛奶首选欧德堡！', '全脂', '&lt;ul&gt;&lt;li&gt;商品名称：欧德堡牛奶&lt;/li&gt;&lt;li&gt;商品编号：1385736&lt;/li&gt;&lt;li&gt;商品毛重：5.29kg&lt;/li&gt;&lt;li&gt;商品产地：德国&lt;/li&gt;&lt;li&gt;特性：全脂&lt;/li&gt;&lt;li&gt;产品产地：德国&lt;/li&gt;&lt;li&gt;类别：纯牛奶&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&gt;包装单位：箱装&lt;/li&gt;&lt;/ul&gt;', '578c72a0a55fa.jpg,578c72a0a659b.jpg,578c72a0a7153.jpg,578c72a0a80f3.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：欧德堡牛奶&lt;/li&gt;&lt;li&gt;商品编号：1385736&lt;/li&gt;&lt;li&gt;商品毛重：5.29kg&lt;/li&gt;&lt;li&gt;商品产地：德国&lt;/li&gt;&lt;li&gt;特性：全脂&lt;/li&gt;&lt;li&gt;产品产地：德国&lt;/li&gt;&lt;li&gt;类别', '5.29kg', '0', '0', '1', '9999', '0', '1468822177');
INSERT INTO `mj_goods` VALUES ('13', '英国进口柯克兰&amp;沃尔克斯 Kirkland &amp; Walkers', '119.00', '110.00', '75', '英国进口柯克兰&amp;沃尔克斯 Kirkland &amp; Walkers 苏格兰皇家奶油酥饼2.1kg节日礼盒装', '奶油味', '&lt;ul&gt;&lt;li&gt;商品名称：柯克兰苏格兰皇家奶油酥饼2.1kg节日礼盒装&lt;/li&gt;&lt;li&gt;商品编号：2310703&lt;/li&gt;&lt;li&gt;商品毛重：2.92kg&lt;/li&gt;&lt;li&gt;商品产地：英国&lt;/li&gt;&lt;li&gt;加工工艺：其它&lt;/li&gt;&lt;li&gt;包装单位：盒装&lt;/li&gt;&lt;li&gt;口味：奶油味&lt;/li&gt;&lt;li&gt;产品产地：英国&lt;/li&gt;&lt;li&gt;蛋糕糕点分类：西式糕点&lt;/li&gt;&lt;li&gt;饼干分类：酥性饼干&lt;/li&gt;&lt;li&gt;包装：礼盒装&lt;/li&gt;&lt;li&gt;分类：饼干&lt;/li&gt;&lt;li&gt;适用场景：节日，休闲娱乐，送礼，聚会&lt;/li&gt;&lt;/ul&gt;', '578c73807cb47.jpg,578c73807e2b7.jpg,578c73807f63f.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：柯克兰苏格兰皇家奶油酥饼2.1kg节日礼盒装&lt;/li&gt;&lt;li&gt;商品编号：2310703&lt;/li&gt;&lt;li&gt;商品毛重：2.92kg&lt;/li&gt;&lt;li&gt;商品产地：英国&lt;/li&gt;&lt;li&gt;加工工艺：其它&lt;/li&gt;&lt;li&gt;包装单位：盒装&lt;', '2.92kg', '0', '0', '1', '9999', '0', '1468822401');
INSERT INTO `mj_goods` VALUES ('14', '费列罗巧克力', '99.00', '95.00', '76', '费列罗巧克力', '香甜', '&lt;ul&gt;&lt;li&gt;商品名称：费列罗巧克力礼盒顺丰配送&lt;/li&gt;&lt;li&gt;商品编号：10120597276&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-44726.html&quot; href=&quot;http://mall.jd.com/index-44726.html&quot; target=&quot;_blank&quot;&gt;牛牛食品专营店&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：500.00g&lt;/li&gt;&lt;li&gt;货号：100544&lt;/li&gt;&lt;li&gt;包装：礼盒装&lt;/li&gt;&lt;li&gt;糖果分类：其它&lt;/li&gt;&lt;li&gt;巧克力分类：果仁巧克力&lt;/li&gt;&lt;li&gt;形状：其它&lt;/li&gt;&lt;li&gt;可可脂含量：40%以下&lt;/li&gt;&lt;li&gt;是否量贩：否&lt;/li&gt;&lt;li&gt;分类：巧克力&lt;/li&gt;&lt;li&gt;包装单位：盒装&lt;/li&gt;&lt;/ul&gt;', '578c746b8a508.jpg,578c746b8b891.jpg,578c746b8d001.jpg,578c746b8e389.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：费列罗巧克力礼盒顺丰配送&lt;/li&gt;&lt;li&gt;商品编号：10120597276&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-44726.html&quot; href=&quot;http://', '1.12kg', '0', '0', '1', '9999', '0', '1468822636');
INSERT INTO `mj_goods` VALUES ('15', '  美国进口优鲜沛Ocean Spray蔓越莓干', '69.00', '65.00', '77', '美国进口优鲜沛Ocean Spray蔓越莓干1360g(新老包装随机发货)', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：优鲜沛蔓越莓干&lt;/li&gt;\r\n	&lt;li&gt;商品编号：586885&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.39kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：美国&lt;/li&gt;\r\n	&lt;li&gt;是否含糖：含糖&lt;/li&gt;\r\n	&lt;li&gt;口味：原味&lt;/li&gt;\r\n	&lt;li&gt;产品产地：美国&lt;/li&gt;\r\n	&lt;li&gt;话梅类：话梅，乌梅，西梅，蔓越莓干&lt;/li&gt;\r\n	&lt;li&gt;薯/芋头类：芋头条&lt;/li&gt;\r\n	&lt;li&gt;分类：蔬果干类，话梅类，薯/芋头类&lt;/li&gt;\r\n	&lt;li&gt;包装单位：袋装&lt;/li&gt;\r\n	&lt;li&gt;蔬果干类：葡萄干，芒果干&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578c77a02a95b.jpg,578c77a02bce3.jpg,578c77a02d454.jpg,578c77a02efac.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：优鲜沛蔓越莓干&lt;/li&gt;\r\n	&lt;li&gt;商品编号：586885&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.39kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：美国&lt;/li&gt;\r\n	&lt;li&gt;是否含糖：含糖&lt;/li&gt;\r\n	&lt;li&gt;口味：原味&amp', '1.39kg', '0', '0', '1', '999', '0', '1468823456');
INSERT INTO `mj_goods` VALUES ('16', '】法国进口 达能正品 依云（evian）', '189.00', '185.00', '79', '法国进口 达能正品 依云（evian）天然矿泉水 330ml*24瓶', '无味', '&lt;ul&gt;&lt;li&gt;商品名称：依云330ml*24&lt;/li&gt;&lt;li&gt;商品编号：1384057&lt;/li&gt;&lt;li&gt;商品毛重：8.97kg&lt;/li&gt;&lt;li&gt;商品产地：法国&lt;/li&gt;&lt;li&gt;单件容量：400ml以下&lt;/li&gt;&lt;li&gt;包装件数：13-24&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;使用场景：生活用水，母婴水，出行&lt;/li&gt;&lt;li&gt;分类：矿泉水&lt;/li&gt;&lt;li&gt;进口/国产：进口&lt;/li&gt;&lt;li&gt;包装单位：箱装&lt;/li&gt;&lt;/ul&gt;', '578c787cadede.jpg,578c787caea97.jpg,578c787caf64f.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：依云330ml*24&lt;/li&gt;&lt;li&gt;商品编号：1384057&lt;/li&gt;&lt;li&gt;商品毛重：8.97kg&lt;/li&gt;&lt;li&gt;商品产地：法国&lt;/li&gt;&lt;li&gt;单件容量：400ml以下&lt;/li&gt;&lt;li&gt;包装件数：13-24&lt;/li&', '8.97kg', '0', '0', '1', '9999', '0', '1468823677');
INSERT INTO `mj_goods` VALUES ('17', '三只松鼠 零食坚果炒货山核桃长寿果干果', '33.90', '30.00', '82', '【三只松鼠_碧根果210gx2袋】零食坚果炒货山核桃长寿果干果奶油味', '奶油味', '&lt;ul&gt;&lt;li&gt;商品名称：【三只松鼠_碧根果210gx2袋】零食坚果炒货山核桃长寿果干果奶油味&lt;/li&gt;&lt;li&gt;商品编号：1014341394&lt;/li&gt;&lt;li&gt;商品毛重：420.00g&lt;/li&gt;&lt;li&gt;口味：奶油味&lt;/li&gt;&lt;li&gt;价位：30-59&lt;/li&gt;&lt;li&gt;特性：带皮&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;分类：长寿果/碧根果&lt;/li&gt;&lt;li&gt;包装：其它　&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;/ul&gt;', '578c79a6e0a69.jpg,578c79a6e1df1.jpg,578c79a6e3179.jpg,578c79a6e4502.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：【三只松鼠_碧根果210gx2袋】零食坚果炒货山核桃长寿果干果奶油味&lt;/li&gt;&lt;li&gt;商品编号：1014341394&lt;/li&gt;&lt;li&gt;商品毛重：420.00g&lt;/li&gt;&lt;li&gt;口味：奶油味&lt;/li&gt;&lt;li&gt;价位：30-59&lt;/li&gt;&lt;l', '1.12kg', '0', '0', '1', '9999', '0', '1468823975');
INSERT INTO `mj_goods` VALUES ('18', '内蒙古科尔沁 休闲零食 风干牛肉干', '99.00', '95.00', '83', '内蒙古科尔沁 休闲零食 风干牛肉干原味400g', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：科尔沁风干牛肉&lt;/li&gt;&lt;li&gt;商品编号：1029250&lt;/li&gt;&lt;li&gt;商品毛重：440.00g&lt;/li&gt;&lt;li&gt;商品产地：内蒙古通辽市&lt;/li&gt;&lt;li&gt;牛肉分类：牛肉条/牛肉干&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;加工工艺：其它&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;li&gt;口味：原味&lt;/li&gt;&lt;li&gt;省份：内蒙古自治区&lt;/li&gt;&lt;li&gt;分类：牛肉类&lt;/li&gt;&lt;li&gt;包装：真空装&lt;/li&gt;&lt;li&gt;价位：90-119&lt;/li&gt;&lt;/ul&gt;', '578c7a7096830.jpg,578c7a70977d0.jpg,578c7a7098388.jpg,578c7a7098770.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：科尔沁风干牛肉&lt;/li&gt;&lt;li&gt;商品编号：1029250&lt;/li&gt;&lt;li&gt;商品毛重：440.00g&lt;/li&gt;&lt;li&gt;商品产地：内蒙古通辽市&lt;/li&gt;&lt;li&gt;牛肉分类：牛肉条/牛肉干&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&', '400g', '0', '0', '1', '9999', '0', '1468824177');
INSERT INTO `mj_goods` VALUES ('19', '楼兰蜜语_红枣夹核桃', '39.90', '35.00', '85', '【买一送一】【楼兰蜜语_红枣夹核桃270g】大枣夹核桃仁夹心枣零食坚果栆包核桃', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：【买一送一】【楼兰蜜语_红枣夹核桃270g】大枣夹核桃仁夹心枣零食坚果栆包核桃&lt;/li&gt;&lt;li&gt;商品编号：10150123196&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://llmy61.jd.com/&quot; href=&quot;http://llmy61.jd.com/&quot; target=&quot;_blank&quot;&gt;楼兰蜜语旗舰店&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：270.00g&lt;/li&gt;&lt;li&gt;货号：01-HZJHT-270&lt;/li&gt;&lt;li&gt;等级：其它&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;加工工艺：果干类&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;li&gt;山楂类：其它　&lt;/li&gt;&lt;li&gt;分类：枣&lt;/li&gt;&lt;li&gt;产品产地：中国大陆&lt;/li&gt;&lt;li&gt;枣类：其它&lt;/li&gt;&lt;li&gt;薯/芋头类：其它&lt;/li&gt;&lt;li&gt;话梅类：其它&lt;/li&gt;&lt;li&gt;包装：其它&lt;/li&gt;&lt;li&gt;蔬果干类：其它&lt;/li&gt;&lt;/ul&gt;', '578c7b3d1102b.jpg,578c7b3d123b4.jpg,578c7b3d12f6c.jpg,578c7b3d142f4.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：【买一送一】【楼兰蜜语_红枣夹核桃270g】大枣夹核桃仁夹心枣零食坚果栆包核桃&lt;/li&gt;&lt;li&gt;商品编号：10150123196&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://llmy61.jd.com/&quot; href=', '1.12kg', '0', '0', '1', '9999', '0', '1468824381');
INSERT INTO `mj_goods` VALUES ('20', '海苔即食 儿童海苔寿司专用 紫菜卷零食', '50.80', '48.00', '126', '【波力海苔-原味126g罐】海苔即食 儿童海苔寿司专用 紫菜卷零食', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：【波力海苔-原味126g罐】海苔即食 儿童海苔寿司专用 紫菜卷零食&lt;/li&gt;&lt;li&gt;商品编号：10320832801&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-205488.html&quot; href=&quot;http://mall.jd.com/index-205488.html&quot; target=&quot;_blank&quot;&gt;波力食品旗舰店&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：130.00g&lt;/li&gt;&lt;li&gt;资质认证：其它&lt;/li&gt;&lt;li&gt;果冻形态：其它&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;特性：无添加&lt;/li&gt;&lt;li&gt;包装单位：罐装&lt;/li&gt;&lt;li&gt;是否含糖：含糖&lt;/li&gt;&lt;li&gt;果冻布丁分类：其它&lt;/li&gt;&lt;li&gt;口味：原味&lt;/li&gt;&lt;li&gt;膨化食品：其它&lt;/li&gt;&lt;li&gt;价位：30-59&lt;/li&gt;&lt;li&gt;包装：其它&lt;/li&gt;&lt;li&gt;分类：海苔&lt;/li&gt;&lt;li&gt;豆类制品：其它&lt;/li&gt;&lt;/ul&gt;', '578c7c8342b65.jpg,578c7c8343b05.jpg,578c7c8344e8d.jpg,578c7c8345e2e.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：【波力海苔-原味126g罐】海苔即食 儿童海苔寿司专用 紫菜卷零食&lt;/li&gt;&lt;li&gt;商品编号：10320832801&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-205488.html&qu', '500g', '0', '0', '1', '9999', '0', '1468824707');
INSERT INTO `mj_goods` VALUES ('21', '十月稻田 长粒香大米 ', '39.00', '35.00', '86', '十月稻田 2015新米 长粒香大米 东北大米5kg', '无味', '&lt;ul&gt;&lt;li&gt;商品名称：十月稻田大米&lt;/li&gt;&lt;li&gt;商品编号：958912&lt;/li&gt;&lt;li&gt;商品毛重：5.06kg&lt;/li&gt;&lt;li&gt;商品产地：黑龙江省哈尔滨市&lt;/li&gt;&lt;li&gt;重量：2.6-5kg&lt;/li&gt;&lt;li&gt;大米分类：长粒香&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;分类：大米&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;/ul&gt;', '578c7d6c3e32e.jpg,578c7d6c3eee6.jpg,578c7d6c3fa9e.jpg,578c7d6c40a3e.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：十月稻田大米&lt;/li&gt;&lt;li&gt;商品编号：958912&lt;/li&gt;&lt;li&gt;商品毛重：5.06kg&lt;/li&gt;&lt;li&gt;商品产地：黑龙江省哈尔滨市&lt;/li&gt;&lt;li&gt;重量：2.6-5kg&lt;/li&gt;&lt;li&gt;大米分类：长粒香&lt;/li&gt;', '5.06kg', '0', '0', '1', '999', '0', '1468824940');
INSERT INTO `mj_goods` VALUES ('22', '鲁花 5S 压榨一级 花生油', '105.00', '100.00', '87', '鲁花 5S 压榨一级 花生油 4L', '无味', '&lt;ul&gt;&lt;li&gt;商品名称：鲁花食用油&lt;/li&gt;&lt;li&gt;商品编号：964416&lt;/li&gt;&lt;li&gt;商品毛重：3.77kg&lt;/li&gt;&lt;li&gt;商品产地：山东、河北、广东等地&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;等级：一级&lt;/li&gt;&lt;li&gt;容量：3.1-5升&lt;/li&gt;&lt;li&gt;资质认证：非转基因&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;加工工艺：压榨&lt;/li&gt;&lt;li&gt;分类：花生油&lt;/li&gt;&lt;/ul&gt;', '578c7e6005614.jpg,578c7e60061cc.jpg,578c7e6006d84.jpg,578c7e6007d24.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：鲁花食用油&lt;/li&gt;&lt;li&gt;商品编号：964416&lt;/li&gt;&lt;li&gt;商品毛重：3.77kg&lt;/li&gt;&lt;li&gt;商品产地：山东、河北、广东等地&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;等级：一级&lt;/li&gt;&lt;l', '3.77kg', '0', '0', '1', '500', '0', '1468825184');
INSERT INTO `mj_goods` VALUES ('23', '海天 味极鲜 酱油', '17.90', '15.00', '88', '海天 味极鲜 酱油 1.28L', '其他', '&lt;ul&gt;&lt;li&gt;商品名称：海天酱油&lt;/li&gt;&lt;li&gt;商品编号：743696&lt;/li&gt;&lt;li&gt;商品毛重：1.61kg&lt;/li&gt;&lt;li&gt;商品产地：广东佛山&lt;/li&gt;&lt;li&gt;产品产地：中国大陆&lt;/li&gt;&lt;li&gt;分类：调味汁，调味料&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;酱油分类：生抽&lt;/li&gt;&lt;li&gt;调味汁分类：酱油&lt;/li&gt;&lt;li&gt;包装单位：瓶装&lt;/li&gt;&lt;/ul&gt;', '578c7f4e598df.jpg,578c7f4e5a87f.jpg,578c7f4e5b437.jpg,578c7f4e5bfef.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：海天酱油&lt;/li&gt;&lt;li&gt;商品编号：743696&lt;/li&gt;&lt;li&gt;商品毛重：1.61kg&lt;/li&gt;&lt;li&gt;商品产地：广东佛山&lt;/li&gt;&lt;li&gt;产品产地：中国大陆&lt;/li&gt;&lt;li&gt;分类：调味汁，调味料&lt;/li&gt;&lt;l', '1.61kg', '0', '0', '1', '890', '0', '1468825423');
INSERT INTO `mj_goods` VALUES ('24', '盛耳 桂圆肉 ', '49.00', '45.00', '89', '盛耳 桂圆肉 460g', '其他', '&lt;ul&gt;&lt;li&gt;商品名称：盛耳干货&lt;/li&gt;&lt;li&gt;商品编号：1947858&lt;/li&gt;&lt;li&gt;商品毛重：500.00g&lt;/li&gt;&lt;li&gt;商品产地：福建省&lt;/li&gt;&lt;li&gt;果实类：桂圆&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;国产产地：福建&lt;/li&gt;&lt;li&gt;分类：果实类&lt;/li&gt;&lt;li&gt;重量：400-800g&lt;/li&gt;&lt;li&gt;包装单位：其它&lt;/li&gt;&lt;/ul&gt;', '578c806763cd8.jpg,578c8067679c8.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：盛耳干货&lt;/li&gt;&lt;li&gt;商品编号：1947858&lt;/li&gt;&lt;li&gt;商品毛重：500.00g&lt;/li&gt;&lt;li&gt;商品产地：福建省&lt;/li&gt;&lt;li&gt;果实类：桂圆&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;', '500g', '0', '0', '1', '500', '0', '1468825703');
INSERT INTO `mj_goods` VALUES ('25', '银鹭 八宝粥 速食粥 桂圆八宝粥', '42.00', '40.00', '90', '银鹭 八宝粥 速食粥 桂圆八宝粥 360g*12罐 整箱装', '其他', '&lt;ul&gt;&lt;li&gt;商品名称：银鹭桂圆八宝粥360g*12罐 整箱&lt;/li&gt;&lt;li&gt;商品编号：1152821&lt;/li&gt;&lt;li&gt;商品毛重：5.342kg&lt;/li&gt;&lt;li&gt;商品产地：福建 厦门&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;li&gt;产品产地：中国大陆&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;分类：速食汤/粥&lt;/li&gt;&lt;li&gt;包装单位：箱装&lt;/li&gt;&lt;/ul&gt;', '578c81374b259.jpg,578c81374c1f9.jpg,578c81374cdb1.jpg,578c81374d969.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：银鹭桂圆八宝粥360g*12罐 整箱&lt;/li&gt;&lt;li&gt;商品编号：1152821&lt;/li&gt;&lt;li&gt;商品毛重：5.342kg&lt;/li&gt;&lt;li&gt;商品产地：福建 厦门&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;li&gt;产品产地：中国大陆&lt;', '50342kg', '0', '0', '1', '860', '0', '1468825911');
INSERT INTO `mj_goods` VALUES ('26', '天地粮人 有机 薏仁米', '69.00', '65.00', '91', '天地粮人 有机 薏仁米 1250g（量贩装 杂粮）', '其他', '&lt;ul&gt;&lt;li&gt;商品名称：天地粮人薏仁米&lt;/li&gt;&lt;li&gt;商品编号：883218&lt;/li&gt;&lt;li&gt;商品毛重：1.255kg&lt;/li&gt;&lt;li&gt;商品产地：辽宁朝阳&lt;/li&gt;&lt;li&gt;杂粮分类：薏米仁&lt;/li&gt;&lt;li&gt;重量：1.1-2.5kg&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;分类：杂粮&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;/ul&gt;', '578c820339e84.jpg,578c82033b20d.jpg,578c82033c97d.jpg,578c82033dd05.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：天地粮人薏仁米&lt;/li&gt;&lt;li&gt;商品编号：883218&lt;/li&gt;&lt;li&gt;商品毛重：1.255kg&lt;/li&gt;&lt;li&gt;商品产地：辽宁朝阳&lt;/li&gt;&lt;li&gt;杂粮分类：薏米仁&lt;/li&gt;&lt;li&gt;重量：1.1-2.5kg&lt;/li&gt;', '1.255kg', '0', '0', '1', '600', '0', '1468826115');
INSERT INTO `mj_goods` VALUES ('27', '大派山 贵妃红芒果新鲜水果大青芒 2.5kg', '69.00', '59.00', '28', '果壳小且薄！肉厚多汁！', '贵妃红', '&lt;p&gt;果壳小且薄！肉厚多汁！&lt;br&gt;&lt;/p&gt;', '578c83814fe73.jpg', '&lt;p&gt;商品名称：大派山 贵妃红芒果新鲜水果大青芒 2.5kg&lt;/p&gt;&lt;p&gt;货号：青芒&lt;/p&gt;&lt;p&gt;原产地：越南&lt;/p&gt;&lt;p&gt;商品编号：10140012483&lt;/p&gt;', '2.5kg', '0', '0', '1', '0', '0', '1468826497');
INSERT INTO `mj_goods` VALUES ('28', '珍享 美国进口车厘子/樱桃 500g 果径约26-28mm 自营水果', '39.90', '29.90', '29', '咬下一口，果肉深红丰盈，果汁丰沛迸溅，齿颊尽留阳光香甜，满满的幸福快要溢出！', '26-28mm', '&lt;p&gt;咬下一口，果肉深红丰盈，果汁丰沛迸溅，齿颊尽留阳光香甜，满满的幸福快要溢出！&lt;br&gt;&lt;/p&gt;', '578c8633e74fd.jpg,578c8633e849d.jpg,578c8633e9056.jpg', '&lt;p&gt;商品名称：珍享 美国进口车厘子/樱桃 500g 果径约26-28mm 自营水果&lt;/p&gt;&lt;p&gt;原产地：美国&lt;/p&gt;&lt;p&gt;商品编号：2918413&lt;/p&gt;', '500g', '0', '0', '1', '0', '0', '1468827188');
INSERT INTO `mj_goods` VALUES ('29', '小汤山 糯玉米 500g 自营蔬菜', '18.00', '15.00', '30', '品质鲜蔬，自然生长，健康安心，新鲜到家', '糯玉米', '&lt;p&gt;品质鲜蔬，自然生长，健康安心，新鲜到家&lt;/p&gt;\r\n', '578c8b5827174.jpg,578c8b5827d2c.jpg,578c8b58288e4.jpg', '&lt;p&gt;商品名称：小汤山 糯玉米 500g 自营蔬菜&lt;/p&gt;\r\n\r\n&lt;p&gt;商品编号：3118992&lt;/p&gt;\r\n\r\n&lt;p&gt;分类：玉米&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '500g', '0', '0', '1', '200', '0', '1468827857');
INSERT INTO `mj_goods` VALUES ('30', '五粮液68度500ml', '718.00', '699.00', '50', '五粮液是中国名酒之一，五粮液酒的故乡是享有&quot;名酒之乡&quot;美称的四川省宜宾市.', '酱香型', '&lt;p&gt;五粮液，中国精品白酒，酱香浓郁。&lt;/p&gt;', '578c8d9d11e13.jpg,578c8d9d162d3.jpg,578c8d9d16e8b.jpg', '&lt;p&gt;68度500ml&lt;/p&gt;', '500ml', '0', '0', '1', '500', '0', '1468829085');
INSERT INTO `mj_goods` VALUES ('31', '禧美 进口冷冻厄瓜多尔白虾 1.8kg 90-100只 盒装 自营海鲜水产', '148.00', '128.00', '32', '漂洋过海，只为遇见更美的你！', '白虾', '&lt;p&gt;&lt;span style=&quot;font-size:24px&quot;&gt;漂洋过海，只为遇见更美的你！&lt;/span&gt;&lt;/p&gt;\r\n', '578c8da8a25a8.jpg,578c8da8a3160.jpg,578c8da8a4100.jpg', '&lt;p&gt;商品名称：禧美 进口冷冻厄瓜多尔白虾 1.8kg 90-100只 盒装 自营海鲜水产&lt;/p&gt;\r\n\r\n&lt;p&gt;商品编号：2239281&lt;/p&gt;\r\n\r\n&lt;p&gt;贮藏条件：冷冻&lt;/p&gt;\r\n', '1.8kg', '0', '0', '1', '0', '0', '1468829097');
INSERT INTO `mj_goods` VALUES ('32', '海买 熟冻智利帝王蟹 1kg 箱装 自营海鲜水产', '288.00', '266.00', '35', '舌尖上的帝王蟹，来自大自然的馈赠！', '帝王蟹', '&lt;p&gt;舌尖上的帝王蟹，来自大自然的馈赠！&lt;/p&gt;\r\n', '578c8e9f7b601.jpg', '&lt;p&gt;商品名称：海买帝王蟹&lt;/p&gt;\r\n\r\n&lt;p&gt;产品形态：实物&lt;/p&gt;\r\n\r\n&lt;p&gt;原产地：智利&lt;/p&gt;\r\n\r\n&lt;p&gt;商品编号：2711273&lt;/p&gt;\r\n', '1kg', '0', '0', '1', '0', '0', '1468829343');
INSERT INTO `mj_goods` VALUES ('33', '剑南春 52度 浓香型白酒 500ml ', '369.00', '300.00', '143', '剑南春 52度 浓香型白酒 500ml 酒香浓郁，酒体晶莹透亮', '浓香', '&lt;p&gt;剑南春 52度 浓香型白酒 500ml 酒香浓郁，酒体晶莹透亮&lt;br&gt;&lt;/p&gt;', '578c8f9c30d8d.jpg,578c8f9c31945.jpg,578c8f9c324fd.jpg', '&lt;p&gt;500ml&lt;/p&gt;', '500ml', '0', '0', '1', '1200', '0', '1468829596');
INSERT INTO `mj_goods` VALUES ('34', '洋河蓝色经典天之蓝 46度 480ml', '299.00', '259.00', '51', '洋河蓝色经典天之蓝 46度 480ml\r\n酒体丰满，绵绵不绝', '绵柔', '&lt;p&gt;洋河蓝色经典天之蓝 46度 480ml&lt;br&gt;酒体丰满，绵绵不绝。&lt;br&gt;&lt;/p&gt;', '578c90b1ef957.jpg,578c90b1f3647.jpg', '&lt;p&gt;46度480ml&lt;/p&gt;', '480ml', '0', '0', '1', '199', '0', '1468829874');
INSERT INTO `mj_goods` VALUES ('35', '鲜元素 冷冻阿拉斯加太平洋真鳕鱼 500g 4-6片 袋装 自营海鲜水产', '63.00', '60.00', '36', '唤醒鲜元素，原料进口，深海捕捞，阿拉斯加鳕鱼', '真鳕切身', '&lt;p&gt;唤醒鲜元素，原料进口，深海捕捞，阿拉斯加鳕鱼&lt;br&gt;&lt;/p&gt;', '578c916997b18.jpg,578c916999a58.jpg,578c91699b5b1.jpg', '&lt;p&gt;商品名称：鲜元素阿拉斯加鳕鱼&lt;/p&gt;&lt;p&gt;贮存条件：冷冻&lt;/p&gt;&lt;p&gt;海水/淡水：海水&lt;/p&gt;&lt;p&gt;原产地：美国&lt;/p&gt;&lt;p&gt;商品编号：1519709&lt;/p&gt;', '500g', '0', '0', '1', '0', '0', '1468830058');
INSERT INTO `mj_goods` VALUES ('36', '洋河蓝色经典海之蓝 42度 480ml', '129.00', '99.00', '51', '洋河蓝色经典海之蓝 42度 480ml', '浓香', '&lt;p&gt;洋河蓝色经典海之蓝 42度 480ml&lt;br&gt;&lt;/p&gt;', '578c929c699f2.jpg,578c929c6d6e2.jpg', '&lt;p&gt;42度 480ml&lt;/p&gt;', '480ml', '0', '0', '1', '500', '0', '1468830364');
INSERT INTO `mj_goods` VALUES ('37', '獐子岛 冷冻虾夷扇贝柱 250g 21-35只 自营海鲜水产', '80.00', '78.00', '37', '贝肉鲜美，北纬39度海域，獐子岛虾夷贝柱', '虾夷贝柱', '&lt;p&gt;贝肉鲜美，北纬39度海域，獐子岛虾夷贝柱&lt;/p&gt;\r\n', '578c94977ce06.jpg,578c94977dda7.jpg,578c94977e95f.jpg', '&lt;p&gt;商品名称：獐子岛 冷冻虾夷扇贝柱&lt;/p&gt;\r\n\r\n&lt;p&gt;贮存条件：冷冻&lt;/p&gt;\r\n\r\n&lt;p&gt;商品编号：1329246&lt;/p&gt;\r\n', '250g', '0', '0', '1', '0', '0', '1468830543');
INSERT INTO `mj_goods` VALUES ('38', '洋河梦之蓝M1 45度 500ml白酒', '318.00', '299.00', '51', '洋河梦之蓝M1 45度 500ml白酒', '绵柔浓香', '&lt;h1&gt;洋河梦之蓝M1 45度 500ml白酒&lt;/h1&gt;', '578c9411ebbd0.jpg,578c9411ec788.jpg,578c9411ed728.jpg', '&lt;p&gt;45度500ml&lt;/p&gt;', '500ml', '0', '0', '1', '399', '0', '1468830738');
INSERT INTO `mj_goods` VALUES ('39', '长城（GreatWall ) 红酒 华夏葡园九二珍藏级干红葡萄酒 750ml （木盒装）', '178.00', '139.00', '53', '长城（GreatWall ) 红酒 华夏葡园九二珍藏级干红葡萄酒 750ml （木盒装）', '普泰酒', '&lt;h1&gt;长城（GreatWall ) 红酒 华夏葡园九二珍藏级干红葡萄酒 750ml （木盒装）&lt;/h1&gt;', '578c9547930d7.jpg,578c954793c90.jpg,578c954794460.jpg', '&lt;p&gt;750ml&lt;/p&gt;', '750ml', '0', '0', '1', '99', '0', '1468831048');
INSERT INTO `mj_goods` VALUES ('40', '白洋河 冰纯浓缩 甜红葡萄酒680ml单瓶', '39.00', '29.00', '53', '白洋河 冰纯浓缩 甜红葡萄酒680ml单瓶', '葡萄酒', '&lt;h1&gt;白洋河 冰纯浓缩 甜红葡萄酒680ml单瓶&lt;/h1&gt;', '578c969553447.png,578c9695547d0.jpg,578c969555f40.png', '&lt;p&gt;680ml*1&lt;/p&gt;', '680ml', '0', '0', '1', '399', '0', '1468831381');
INSERT INTO `mj_goods` VALUES ('41', '皇纯 威海淡干海参 50g 5-8只 简装 自营海鲜水产', '278.00', '268.00', '39', '宫家岛深水海域野生海刺参', '5-8只简装', '&lt;p&gt;宫家岛深水海域野生海刺参&lt;br&gt;&lt;/p&gt;', '578c97206bc82.jpg,578c97206d00a.jpg,578c97206e77b.jpg', '&lt;p&gt;商品名称;皇纯淡干海参&lt;/p&gt;&lt;p&gt;原产地：中国大陆&lt;/p&gt;&lt;p&gt;贮存条件：常温&lt;br&gt;&lt;/p&gt;&lt;p&gt;商品编号：2060520&lt;/p&gt;', '50g', '0', '0', '1', '0', '0', '1468831520');
INSERT INTO `mj_goods` VALUES ('42', '法国进口红酒 拉菲传奇梅多克干红葡萄酒 750ml（ASC）', '199.00', '159.00', '55', '法国进口红酒 拉菲传奇梅多克干红葡萄酒 750ml（ASC）', '葡萄', '&lt;h1&gt;法国进口红酒 拉菲传奇梅多克干红葡萄酒 750ml（ASC）&lt;/h1&gt;', '578c974d6e589.jpg,578c974d7240a.jpg,578c974d72fc2.jpg', '&lt;p&gt;750ml*1&lt;/p&gt;', '750ml', '0', '0', '1', '199', '0', '1468831565');
INSERT INTO `mj_goods` VALUES ('43', '法国原酒进口红酒 爱斯尼卡巴斯干红葡萄酒整箱装750ml*6瓶', '269.00', '229.00', '55', '法国原酒进口红酒 爱斯尼卡巴斯干红葡萄酒整箱装750ml*6瓶', '葡萄', '&lt;h1&gt;法国原酒进口红酒 爱斯尼卡巴斯干红葡萄酒整箱装750ml*6瓶&lt;/h1&gt;', '578c982c9c487.jpg,578c982c9dbf8.jpg', '&lt;p&gt;750ml*6&lt;/p&gt;', '750ml', '0', '0', '1', '99', '0', '1468831788');
INSERT INTO `mj_goods` VALUES ('44', '澳大利亚进口红酒 杰卡斯（Jacob’s Creek）经典系列梅洛干红葡萄酒 750ml', '105.00', '79.00', '57', '澳大利亚进口红酒 杰卡斯（Jacob’s Creek）经典系列梅洛干红葡萄酒 750ml', '葡萄', '&lt;h1&gt;澳大利亚进口红酒 杰卡斯（Jacob’s Creek）经典系列梅洛干红葡萄酒 750ml&lt;/h1&gt;', '578c9907b665f.jpg,578c9907b7217.jpg,578c9907b7dcf.jpg', '&lt;p&gt;750ml*1&lt;/p&gt;', '750ml', '0', '0', '1', '399', '0', '1468832008');
INSERT INTO `mj_goods` VALUES ('45', '澳大利亚进口红酒 奔富酒园Penfolds Max’s奔富麦克斯经典干红葡萄酒 750ml', '399.00', '329.00', '57', '澳大利亚进口红酒 奔富酒园Penfolds Max’s奔富麦克斯经典干红葡萄酒 750ml', '葡萄', '&lt;h1&gt;澳大利亚进口红酒 奔富酒园Penfolds Max’s奔富麦克斯经典干红葡萄酒 750ml&lt;/h1&gt;', '578c99aba3cc1.jpg,578c99aba4491.jpg,578c99aba5049.jpg', '&lt;p&gt;750*1&lt;/p&gt;', '750ml', '0', '0', '1', '599', '0', '1468832172');
INSERT INTO `mj_goods` VALUES ('46', '海买 进口加拿大冰冻北极甜虾 盒装 90-120只/kg 1.8kg 自营海鲜水产', '148.00', '126.00', '43', '冰冷海水中生长3-4年，生长缓慢，个体紧凑，肉质紧密，鲜美有营养，新鲜度高，特有的鲜咸口味，入口后回味无穷', '90-120只', '&lt;p&gt;冰冷海水中生长3-4年，生长缓慢，个体紧凑，肉质紧密，鲜美有营养，新鲜度高，特有的鲜咸口味，入口后回味无穷&lt;/p&gt;\r\n', '578c9bd5bd158.jpg,578c9bd5be4e0.jpg,578c9bd5bf868.jpg', '', '1.8kg', '0', '0', '1', '0', '0', '1468832404');
INSERT INTO `mj_goods` VALUES ('47', '马爹利（Martell）洋酒 名士（名仕）干邑白兰地 700ml', '510.00', '469.00', '59', '马爹利（Martell）洋酒 名士（名仕）干邑白兰地 700ml', '名士', '&lt;h1&gt;马爹利（Martell）洋酒 名士（名仕）干邑白兰地 700ml&lt;/h1&gt;', '578c9aa43ba1c.jpg,578c9aa43c9bc.jpg,578c9aa43d574.jpg', '&lt;p&gt;700ml&lt;/p&gt;', '700ml', '0', '0', '1', '199', '0', '1468832420');
INSERT INTO `mj_goods` VALUES ('48', '洋酒XO 法国派斯顿贵族豪门XO白兰地礼盒700ml 法国烈酒', '219.00', '199.00', '59', '洋酒XO 法国派斯顿贵族豪门XO白兰地礼盒700ml 法国烈酒', ' xo', '&lt;h1&gt;洋酒XO 法国派斯顿贵族豪门XO白兰地礼盒700ml 法国烈酒&lt;/h1&gt;', '578c9b5884cd5.jpg,578c9b588605d.jpg,578c9b58877ce.jpg', '&lt;p&gt;700ml&lt;/p&gt;', '700ml', '0', '0', '1', '200', '0', '1468832601');
INSERT INTO `mj_goods` VALUES ('49', '芝华士（Chivas）洋酒 12年苏格兰威士忌 700ml', '239.00', '219.00', '61', '芝华士（Chivas）洋酒 12年苏格兰威士忌 700ml', '洋酒', '&lt;h1&gt;芝华士（Chivas）洋酒 12年苏格兰威士忌 700ml&lt;/h1&gt;', '578c9c2a0168e.jpg,578c9c2a03d9e.jpg', '&lt;p&gt;700ml*1&lt;/p&gt;', '700ml', '0', '0', '1', '500', '0', '1468832810');
INSERT INTO `mj_goods` VALUES ('50', '尊誉 （Regal Pride）洋酒 苏格兰 威士忌 700ml', '118.00', '99.00', '61', '尊誉 （Regal Pride）洋酒 苏格兰 威士忌 700ml', 'xo', '&lt;h1&gt;尊誉 （Regal Pride）洋酒 苏格兰 威士忌 700ml&lt;/h1&gt;', '578c9ce0f08e4.jpg', '&lt;p&gt;700ml*1&lt;/p&gt;', '700ml', '0', '0', '1', '500', '0', '1468832993');
INSERT INTO `mj_goods` VALUES ('51', '绝对伏特加（Absolut Vodka）洋酒 原味伏特加酒700ml', '115.00', '98.00', '63', '绝对伏特加（Absolut Vodka）洋酒 原味伏特加酒700ml', '伏特加', '&lt;h1&gt;绝对伏特加（Absolut Vodka）洋酒 原味伏特加酒700ml&lt;/h1&gt;', '578c9ee1a8257.jpg,578c9ee1a91f7.jpg,578c9ee1a99c7.jpg', '&lt;p&gt;700ml*1&lt;/p&gt;', '700ml', '0', '0', '1', '600', '0', '1468833506');
INSERT INTO `mj_goods` VALUES ('52', '洋酒烈酒 原瓶进口伏特加 沙皇伏特加 俄罗斯 沙皇伏特加金700ml', '258.00', '199.00', '63', '洋酒烈酒 原瓶进口伏特加 沙皇伏特加 俄罗斯 沙皇伏特加金700ml', '伏特加', '&lt;h1&gt;洋酒烈酒 原瓶进口伏特加 沙皇伏特加 俄罗斯 沙皇伏特加金700ml&lt;/h1&gt;', '578c9f8f74b05.jpg,578c9f8f75e8e.jpg', '&lt;p&gt;700ml*1&lt;/p&gt;', '700ml', '0', '0', '1', '700', '0', '1468833679');
INSERT INTO `mj_goods` VALUES ('53', '德国 Kaisersimon凯（恺）撒西蒙小麦白啤酒500ml*24听', '138.00', '109.00', '66', '德国 Kaisersimon凯（恺）撒西蒙小麦白啤酒500ml*24听', '啤酒', '&lt;h1&gt;德国 Kaisersimon凯（恺）撒西蒙小麦白啤酒500ml*24听&lt;/h1&gt;', '578ca261cd5f8.jpg', '&lt;p&gt;500ml*24&lt;/p&gt;', '550ml*24', '0', '0', '1', '500', '0', '1468834402');
INSERT INTO `mj_goods` VALUES ('54', '德国进口 哈尔博（Harboe） 白熊小麦啤酒500ml*24', '168.00', '138.00', '66', '德国进口 哈尔博（Harboe） 白熊小麦啤酒500ml*24（新老包装随机发货）', '啤酒', '&lt;h1&gt;德国进口 哈尔博（Harboe） 白熊小麦啤酒500ml*24（新老包装随机发货）&lt;/h1&gt;\r\n', '578ca8259c51f.jpg,578ca8259d0d7.jpg,578ca8259dc8f.jpg', '&lt;p&gt;500ml*24&lt;/p&gt;\r\n', '500ml*24', '0', '0', '1', '500', '0', '1468834574');
INSERT INTO `mj_goods` VALUES ('55', '恒都 有机切片仔骨 带骨原切牛小排(不含料包)500g', '100.00', '88.00', '49', '有机切片仔骨，恒都牛肉改变你的食界观', '牛仔骨', '', '578cb28aea36a.jpg,578cb28aee05a.jpg', '', '500g', '0', '0', '1', '0', '0', '1468837993');
INSERT INTO `mj_goods` VALUES ('56', '光阳（goosun）松花皮蛋10枚(600g', '25.50', '21.80', '72', '好的鸡蛋源自美的生态，“五个统一”安全养殖基地', '松花蛋', '', '578cb25b32b26.jpg', '', '600g', '0', '0', '1', '0', '0', '1468838540');
INSERT INTO `mj_goods` VALUES ('57', '德国进口 Kaiserdom 黑啤酒 500ml*24听 整箱装', '268.00', '228.00', '71', '德国进口 Kaiserdom 黑啤酒 500ml*24听 整箱装', '啤酒', '&lt;h1&gt;德国进口 Kaiserdom 黑啤酒 500ml*24听 整箱装&lt;/h1&gt;', '578cb2cc5695c.jpg', '&lt;p&gt;500ml*24&lt;/p&gt;', '500ml*24', '0', '0', '1', '1000', '0', '1468838604');
INSERT INTO `mj_goods` VALUES ('58', '德国凯撒黑啤酒950ml', '19.90', '16.90', '71', '德国凯撒黑啤酒950ml', '啤酒', '&lt;h1&gt;德国凯撒黑啤酒950ml&lt;/h1&gt;', '578cb3c08be95.jpg,578cb3c08fb85.jpg', '&lt;p&gt;950ml*1&lt;/p&gt;', '950ml', '0', '0', '1', '1000', '0', '1468838848');
INSERT INTO `mj_goods` VALUES ('59', '冰纯嘉士伯啤酒600ml（12瓶装）', '99.00', '79.00', '68', '冰纯嘉士伯啤酒600ml（12瓶装）', '啤酒', '&lt;h1&gt;冰纯嘉士伯啤酒600ml（12瓶装）&lt;/h1&gt;\r\n', '578cb56e304c2.jpg,578cb56e341b2.jpg', '&lt;p&gt;12*600ml&lt;/p&gt;\r\n', '600ml*12', '0', '0', '1', '999', '0', '1468839247');
INSERT INTO `mj_goods` VALUES ('60', '青岛啤酒经典500ml(12瓶套装）', '68.00', '49.00', '68', '青岛啤酒经典500ml(12瓶套装）', '啤酒', '&lt;p&gt;青岛啤酒经典500ml(12瓶套装）&lt;br&gt;&lt;/p&gt;', '578cb60ad4224.jpg,578cb60ad7f14.jpg', '&lt;p&gt;500ml*12&lt;/p&gt;', '500ml*12', '0', '0', '1', '1100', '0', '1468839435');
INSERT INTO `mj_goods` VALUES ('61', '花芊果新疆核桃特产坚果干果新货孕妇阿克苏185薄纸皮大核桃原味', '38.80', '35.80', '78', '花芊果新疆核桃特产坚果干果新货孕妇阿克苏185薄纸皮大核桃原味', '核桃', '&lt;h1&gt;花芊果新疆核桃特产坚果干果新货孕妇阿克苏185薄纸皮大核桃原味&lt;/h1&gt;', '578cbaf5df373.jpg,578cbaf5e3063.jpg', '&lt;p&gt;500k&lt;/p&gt;', '38.8', '0', '0', '1', '1000', '0', '1468840694');
INSERT INTO `mj_goods` VALUES ('62', '澳洲进口 德运Devondale全脂纯牛奶', '69.90', '65.00', '99', '澳洲进口 德运Devondale全脂纯牛奶 1L*10盒 整箱装', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：德运10盒/箱&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2122249&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：10.9kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：澳大利亚&lt;/li&gt;\r\n	&lt;li&gt;脂肪含量：全脂&lt;/li&gt;\r\n	&lt;li&gt;特性：全脂&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;口味：原味&lt;/li&gt;\r\n	&lt;li&gt;每箱规格：7-12&lt;/li&gt;\r\n	&lt;li&gt;包装单位：箱装&lt;/li&gt;\r\n	&lt;li&gt;是否含糖：无糖&lt;/li&gt;\r\n	&lt;li&gt;单件容量：1000ml以上&lt;/li&gt;\r\n	&lt;li&gt;产品产地：澳大利亚&lt;/li&gt;\r\n	&lt;li&gt;分类：纯牛奶&lt;/li&gt;\r\n	&lt;li&gt;类别：纯牛奶&lt;/li&gt;\r\n	&lt;li&gt;是否量贩：否&lt;/li&gt;\r\n	&lt;li&gt;适用人群：通用&lt;/li&gt;\r\n	&lt;li&gt;适用场景：日常&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cbf5680af5.jpg,578cbf5682265.jpg,578cbf56839d5.jpg,578cbf5684d5e.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：德运10盒/箱&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2122249&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：10.9kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：澳大利亚&lt;/li&gt;\r\n	&lt;li&gt;脂肪含量：全脂&lt;/li&gt;\r\n	&lt;li&gt;特性：全脂&', '10.9kg', '0', '0', '1', '9999', '0', '1468840898');
INSERT INTO `mj_goods` VALUES ('63', '【口口福-薄壳巴旦木200gx2袋】坚果干果特产手剥巴达木', '29.90', '24.90', '78', '【口口福-薄壳巴旦木200gx2袋】坚果干果特产手剥巴达木', '巴旦木', '&lt;h1&gt;【口口福-薄壳巴旦木200gx2袋】坚果干果特产手剥巴达木&lt;/h1&gt;', '578cbbe439560.jpg,578cbbe43a8e8.jpg,578cbbe43c058.jpg', '&lt;p&gt;200g*2&lt;/p&gt;', '200g*2', '0', '0', '1', '2000', '0', '1468840932');
INSERT INTO `mj_goods` VALUES ('64', '一品巷子 坚果炒货零食 巴西松子 400g/袋', '129.00', '109.00', '78', '一品巷子 坚果炒货零食 巴西松子 400g/袋', '松子', '&lt;h1&gt;一品巷子 坚果炒货零食 巴西松子 400g/袋&lt;/h1&gt;', '578cbeabebb08.jpg,578cbeabec6c1.jpg,578cbeabeda49.jpg', '&lt;p&gt;400g&lt;/p&gt;', '400g', '0', '0', '1', '2000', '0', '1468841644');
INSERT INTO `mj_goods` VALUES ('65', '中国特产·河源馆 特产板栗 坚果炒货零食 好吃甜糯甘栗仁150g/包 10包装/箱', '65.00', '50.00', '78', '中国特产·河源馆 特产板栗 坚果炒货零食 好吃甜糯甘栗仁150g/包 10包装/箱', '150g/包', '&lt;h1&gt;中国特产&amp;middot;河源馆 特产板栗 坚果炒货零食 好吃甜糯甘栗仁150g/包 10包装/箱&lt;/h1&gt;\r\n', '578cbf9a4a979.jpg,578cbf9a4b919.jpg,578cbf9a4c8b9.jpg', '&lt;p&gt;150g*10&lt;/p&gt;\r\n', '150', '0', '0', '1', '1500', '0', '1468841837');
INSERT INTO `mj_goods` VALUES ('66', '奶香碧根果 干果 坚果炒货 零食 休闲食品 奶香味 400g/罐', '59.00', '49.00', '78', '奶香碧根果 干果 坚果炒货 零食 休闲食品 奶香味 400g/罐', '400g', '&lt;h1&gt;奶香碧根果 干果 坚果炒货 零食 休闲食品 奶香味 400g/罐&lt;/h1&gt;', '578cc0a6153ea.jpg,578cc0a616772.jpg,578cc0a6182ca.jpg', '&lt;p&gt;400g&lt;/p&gt;', '400g', '0', '0', '1', '500', '0', '1468842150');
INSERT INTO `mj_goods` VALUES ('67', '正业食品 开心果 坚果炒货休闲零食干果450g/罐 原味 450g/罐', '58.80', '49.90', '78', '正业食品 开心果 坚果炒货休闲零食干果450g/罐 原味 450g/罐', '450g', '&lt;h1&gt;正业食品 开心果 坚果炒货休闲零食干果450g/罐 原味 450g/罐&lt;/h1&gt;', '578cc14f7232f.jpg,578cc14f732d0.jpg,578cc14f74270.jpg', '&lt;p&gt;450g&lt;/p&gt;', '450g', '0', '0', '1', '500', '0', '1468842319');
INSERT INTO `mj_goods` VALUES ('68', '维牧 德国进口 低脂纯牛奶', '29.00', '25.00', '100', '维牧 德国进口10月份到期 低脂纯牛奶200ml*12盒 礼盒装 进口牛奶', '原味', '&lt;p&gt;净含量(ml)：2400&lt;/p&gt;&lt;p&gt;品牌：&lt;a data-cke-saved-href=&quot;http://www.yhd.com/brand/984668/8644&quot; href=&quot;http://www.yhd.com/brand/984668/8644&quot;&gt;维牧&lt;/a&gt;&lt;/p&gt;&lt;p&gt;单件净含量：200ml&lt;/p&gt;&lt;p&gt;脂肪含量：低脂&lt;/p&gt;&lt;p&gt;含钙量：普通&lt;/p&gt;&lt;p&gt;蛋白质含量：＜3.0%&lt;/p&gt;&lt;p&gt;口味：原味&lt;/p&gt;&lt;p&gt;种类：纯牛奶&lt;/p&gt;&lt;p&gt;产地：德国&lt;/p&gt;&lt;p&gt;包装：箱装&lt;/p&gt;&lt;p&gt;生产厂商：维牧乳制品&lt;/p&gt;&lt;p&gt;保质期(天)：360天&lt;/p&gt;', '578cc15d0170b.jpg,578cc15d02e7b.jpg,578cc15d04204.jpg', '&lt;p&gt;净含量(ml)：2400&lt;/p&gt;&lt;p&gt;品牌：&lt;a data-cke-saved-href=&quot;http://www.yhd.com/brand/984668/8644&quot; href=&quot;http://www.yhd.com/brand/984668/8644&quot;&gt;维牧&lt;/a&gt;&lt;/p&gt;&lt', '10.9kg', '0', '0', '1', '9999', '0', '1468842333');
INSERT INTO `mj_goods` VALUES ('69', '甘蒂牧场 MUH甘蒂牧场 牧牌 脱脂', '168.00', '165.00', '102', '甘蒂牧场 【德国原装进口】MUH甘蒂牧场 牧牌 低脂 部分脱脂纯牛奶1L*12 整箱', '原味', '&lt;p&gt;净含量(ml)：12000&lt;/p&gt;&lt;p&gt;品牌：&lt;a data-cke-saved-href=&quot;http://www.yhd.com/brand/941339/8644&quot; href=&quot;http://www.yhd.com/brand/941339/8644&quot;&gt;甘蒂牧场&lt;/a&gt;&lt;/p&gt;&lt;p&gt;单件净含量：1000ml&lt;/p&gt;&lt;p&gt;脂肪含量：低脂&lt;/p&gt;&lt;p&gt;含钙量：普通&lt;/p&gt;&lt;p&gt;蛋白质含量：≥3.3%&lt;/p&gt;&lt;p&gt;口味：原味&lt;/p&gt;&lt;p&gt;种类：纯牛奶&lt;/p&gt;&lt;p&gt;产地：德国&lt;/p&gt;&lt;p&gt;包装：箱装&lt;/p&gt;&lt;p&gt;生产厂商：Arla Foods Deutschland GmbH&lt;/p&gt;&lt;p&gt;保质期(天)：360&lt;/p&gt;', '578cc26b84ea5.jpg,578cc26b86616.jpg,578cc26b8799e.jpg,578cc26b88d26.jpg', '&lt;p&gt;净含量(ml)：12000&lt;/p&gt;&lt;p&gt;品牌：&lt;a data-cke-saved-href=&quot;http://www.yhd.com/brand/941339/8644&quot; href=&quot;http://www.yhd.com/brand/941339/8644&quot;&gt;甘蒂牧场&lt;/a&gt;&lt;/p&gt;', '10.9kg', '0', '0', '1', '9999', '0', '1468842604');
INSERT INTO `mj_goods` VALUES ('70', '岳王 茶叶 绿茶 霍山黄芽袋装250g', '64.00', '48.00', '92', '岳王 茶叶 绿茶 霍山黄芽袋装250g', '250g', '&lt;h1&gt;岳王 茶叶 绿茶 霍山黄芽袋装250g&lt;/h1&gt;', '578cc2baad979.jpg', '&lt;p&gt;250g&lt;/p&gt;', '250g', '0', '0', '1', '500', '0', '1468842682');
INSERT INTO `mj_goods` VALUES ('71', '德国进口牛奶 欧德堡Oldenburger全脂成人奶粉', '41.90', '40.00', '103', '德国进口牛奶 欧德堡Oldenburger全脂成人奶粉 900g', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：欧德堡900g/罐&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2168662&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.08kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：荷兰&lt;/li&gt;\r\n	&lt;li&gt;脂肪含量：全脂&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;特性：全脂&lt;/li&gt;\r\n	&lt;li&gt;包装单位：罐装&lt;/li&gt;\r\n	&lt;li&gt;口味：原味&lt;/li&gt;\r\n	&lt;li&gt;单件容量：601-1000ml&lt;/li&gt;\r\n	&lt;li&gt;产品产地：荷兰&lt;/li&gt;\r\n	&lt;li&gt;是否量贩：否&lt;/li&gt;\r\n	&lt;li&gt;类别：奶粉&lt;/li&gt;\r\n	&lt;li&gt;分类：奶粉&lt;/li&gt;\r\n	&lt;li&gt;适用人群：成人&lt;/li&gt;\r\n	&lt;li&gt;适用场景：日常&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cc33ab4a2f.jpg,578cc33ab59cf.jpg,578cc33ab696f.jpg,578cc33ab7910.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：欧德堡900g/罐&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2168662&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.08kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：荷兰&lt;/li&gt;\r\n	&lt;li&gt;脂肪含量：全脂&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：', '10.9kg', '0', '0', '1', '9999', '0', '1468842811');
INSERT INTO `mj_goods` VALUES ('72', '天方 茶叶 慢点系列 红糖姜茶12g*15袋盒装180g', '20.00', '15.00', '94', '天方 茶叶 慢点系列 红糖姜茶12g*15袋盒装180g', '12g', '&lt;h1&gt;天方 茶叶 慢点系列 红糖姜茶12g*15袋盒装180g&lt;/h1&gt;', '578cc34976300.jpg', '&lt;p&gt;12g*15&lt;/p&gt;', '12g*15', '0', '0', '1', '1000', '0', '1468842825');
INSERT INTO `mj_goods` VALUES ('73', '新希望韩国风味香蕉牛奶', '39.90', '35.00', '104', '新希望韩国风味香蕉牛奶 全脂早餐奶全脂牛奶200ml*12*1箱装', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：新希望韩国风味香蕉牛奶 全脂早餐奶全脂牛奶200ml*12*1箱装&lt;/li&gt;&lt;li&gt;商品编号：10274375725&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://newhope.jd.com/&quot; href=&quot;http://newhope.jd.com/&quot; target=&quot;_blank&quot;&gt;新希望旗舰店&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：2.9kg&lt;/li&gt;&lt;li&gt;脂肪含量：全脂&lt;/li&gt;&lt;li&gt;国产/进口：国产&lt;/li&gt;&lt;li&gt;每箱规格：7-12&lt;/li&gt;&lt;li&gt;包装单位：箱装&lt;/li&gt;&lt;li&gt;是否含糖：含糖&lt;/li&gt;&lt;li&gt;单件容量：200mL以下&lt;/li&gt;&lt;li&gt;分类：风味奶&lt;/li&gt;&lt;li&gt;是否量贩：否&lt;/li&gt;&lt;li&gt;适用人群：通用&lt;/li&gt;&lt;li&gt;适用场景：日常&lt;/li&gt;&lt;/ul&gt;', '578cc401c3123.jpg,578cc401c44ac.jpg,578cc401c5834.jpg,578cc401c67d4.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：新希望韩国风味香蕉牛奶 全脂早餐奶全脂牛奶200ml*12*1箱装&lt;/li&gt;&lt;li&gt;商品编号：10274375725&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://newhope.jd.com/&quot; href=&quot', '10.9kg', '0', '0', '1', '9999', '0', '1468843010');
INSERT INTO `mj_goods` VALUES ('74', '溧阳馆 伍员山茶叶 天目湖白茶 125g茶叶', '288.00', '268.00', '92', '溧阳馆 伍员山茶叶 天目湖白茶 125g茶叶', '125g', '&lt;h1&gt;溧阳馆 伍员山茶叶 天目湖白茶 125g茶叶&lt;/h1&gt;', '578cc419d5b98.jpg,578cc419d6750.jpg,578cc419d76f0.jpg', '&lt;p&gt;125g&lt;/p&gt;', '125g', '0', '0', '1', '500', '0', '1468843034');
INSERT INTO `mj_goods` VALUES ('75', '恩施高山土蜂富硒蜂蜜 500g土蜂蜜', '166.00', '129.00', '93', '恩施高山土蜂富硒蜂蜜 500g土蜂蜜', '500g', '&lt;h1&gt;恩施高山土蜂富硒蜂蜜 500g土蜂蜜&lt;/h1&gt;', '578cc4e3bd6d9.jpg,578cc4e3be679.jpg,578cc4e3bf231.jpg', '&lt;p&gt;500g&lt;/p&gt;', '500g', '0', '0', '1', '200', '0', '1468843236');
INSERT INTO `mj_goods` VALUES ('76', '波兰进口牛奶 Laciate高温灭菌酸奶 ', '64.90', '60.00', '105', '波兰进口牛奶 Laciate高温灭菌半脱脂牛奶 ', '酸味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：优特12盒/箱&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2146479&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：12.96kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：波兰&lt;/li&gt;\r\n	&lt;li&gt;类别：纯牛奶&lt;/li&gt;\r\n	&lt;li&gt;特性：低脂&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cc578575eb.jpg,578cc57858d5b.jpg,578cc5785a4cc.jpg,578cc5785b46c.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：优特12盒/箱&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2146479&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：12.96kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：波兰&lt;/li&gt;\r\n	&lt;li&gt;类别：纯牛奶&lt;/li&gt;\r\n	&lt;li&gt;特性：低脂&lt', '10.9kg', '0', '0', '1', '9999', '0', '1468843385');
INSERT INTO `mj_goods` VALUES ('77', '玫瑰花酱 蜂蜜玫瑰酱 果酱鲜花与蜂蜜228g', '49.00', '39.00', '94', '玫瑰花酱 蜂蜜玫瑰酱 果酱鲜花与蜂蜜228g', '228g', '&lt;h1&gt;玫瑰花酱 蜂蜜玫瑰酱 果酱鲜花与蜂蜜228g&lt;/h1&gt;', '578cc59d0127b.jpg,578cc59d02dd4.jpg,578cc59d04544.jpg', '&lt;p&gt;228g&lt;/p&gt;', '228g', '0', '0', '1', '600', '0', '1468843421');
INSERT INTO `mj_goods` VALUES ('78', '岗钦 酥油茶320g 咸甜两种口味 西藏特产 冲饮奶茶 咸味', '59.00', '49.00', '95', '岗钦 酥油茶320g 咸甜两种口味 西藏特产 冲饮奶茶 咸味', '320g', '&lt;h1&gt;岗钦 酥油茶320g 咸甜两种口味 西藏特产 冲饮奶茶 咸味&lt;/h1&gt;', '578cc67528541.jpg,578cc675298c9.jpg,578cc6752a86a.jpg', '&lt;p&gt;320g&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '320g', '0', '0', '1', '550', '0', '1468843637');
INSERT INTO `mj_goods` VALUES ('79', '柯克兰Kirkland Signature开心果休闲零食坚果炒货', '163.00', '160.00', '106', '柯克兰Kirkland Signature开心果休闲零食坚果炒货 原味1.36kg 含税', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：柯克兰Kirkland Signature开心果休闲零食坚果炒货 原味1.36kg 含税&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1954197206&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.36kg&lt;/li&gt;\r\n	&lt;li&gt;货号：KS0067&lt;/li&gt;\r\n	&lt;li&gt;口味：原味&lt;/li&gt;\r\n	&lt;li&gt;价位：120以上&lt;/li&gt;\r\n	&lt;li&gt;特性：带皮&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;分类：开心果&lt;/li&gt;\r\n	&lt;li&gt;包装：其它　&lt;/li&gt;\r\n	&lt;li&gt;包装单位：袋装&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cc6b1391d9.jpg,578cc6b13a179.jpg,578cc6b13b119.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：柯克兰Kirkland Signature开心果休闲零食坚果炒货 原味1.36kg 含税&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1954197206&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.36kg&lt;/li&gt;\r\n	&lt;li&gt;货号：KS0067&lt;/li&gt;\r\n	&lt;li&', '10.9kg', '0', '0', '1', '9999', '0', '1468843697');
INSERT INTO `mj_goods` VALUES ('80', '百事可乐 碳酸饮料 把乐带回家 330ml*24听 整箱', '49.90', '39.10', '127', '百事是全球卓越的饮料品牌，以独特的口味，深受消费者的喜爱', '百事可乐', '&lt;p&gt;百事是全球卓越的饮料品牌，以独特的口味，深受消费者的喜爱&lt;br&gt;&lt;/p&gt;', '578cc770a528c.jpg,578cc770a622c.jpg,578cc770a6de4.jpg', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '330ml*24', '0', '0', '1', '0', '0', '1468843889');
INSERT INTO `mj_goods` VALUES ('81', '德国进口思贝格SEEBERGER休闲零食坚果', '37.80', '35.00', '107', '德国进口思贝格SEEBERGER休闲零食坚果', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：德国进口思贝格SEEBERGER休闲零食坚果 芒果干100g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1959205065&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：200.00g&lt;/li&gt;\r\n	&lt;li&gt;牛肉分类：其它&lt;/li&gt;\r\n	&lt;li&gt;鸭肉分类：其它&lt;/li&gt;\r\n	&lt;li&gt;果冻形态：其它&lt;/li&gt;\r\n	&lt;li&gt;鸡肉分类：其它　&lt;/li&gt;\r\n	&lt;li&gt;加工工艺：其它&lt;/li&gt;\r\n	&lt;li&gt;包装单位：袋装&lt;/li&gt;\r\n	&lt;li&gt;是否含糖：无糖&lt;/li&gt;\r\n	&lt;li&gt;果冻布丁分类：其它&lt;/li&gt;\r\n	&lt;li&gt;鱼类制品：其它&lt;/li&gt;\r\n	&lt;li&gt;膨化食品：其它&lt;/li&gt;\r\n	&lt;li&gt;蔬果干类：其它&lt;/li&gt;\r\n	&lt;li&gt;话梅类：其它&lt;/li&gt;\r\n	&lt;li&gt;猪肉分类：其它&lt;/li&gt;\r\n	&lt;li&gt;豆类制品：其它&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cc7aa5295b.jpg,578cc7aa538fb.jpg,578cc7aa54c84.jpg,578cc7aa55c24.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：德国进口思贝格SEEBERGER休闲零食坚果 芒果干100g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1959205065&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：200.00g&lt;/li&gt;\r\n	&lt;li&gt;牛肉分类：其它&lt;/li&gt;\r\n	&lt;li&gt;鸭肉分类：其它&lt;/', '10.9kg', '0', '0', '1', '9999', '0', '1468843947');
INSERT INTO `mj_goods` VALUES ('82', '福牌阿胶糕 福胶玫瑰红枣即食固元糕阿胶糕块山东东阿镇阿胶糕 玫瑰红枣一盒装500g', '318.00', '299.00', '96', '福牌阿胶糕 福胶玫瑰红枣即食固元糕阿胶糕块山东东阿镇阿胶糕 玫瑰红枣一盒装500g', '500g', '&lt;h1&gt;福牌阿胶糕 福胶玫瑰红枣即食固元糕阿胶糕块山东东阿镇阿胶糕 玫瑰红枣一盒装500g&lt;/h1&gt;', '578cc8025f33e.jpg,578cc80261a4e.jpg,578cc8026415e.jpg', '&lt;p&gt;500g&lt;/p&gt;', '500g', '0', '0', '1', '100', '0', '1468844034');
INSERT INTO `mj_goods` VALUES ('83', '丹麦进口 Kjeldsens 蓝罐 曲奇', '109.00', '105.00', '109', '丹麦进口 Kjeldsens 蓝罐 曲奇 礼盒 908g 盒装（新老包装随机发货）', '奶油味', '&lt;ul&gt;&lt;li&gt;商品名称：丹麦蓝罐曲奇&lt;/li&gt;&lt;li&gt;商品编号：319873&lt;/li&gt;&lt;li&gt;商品毛重：1.57kg&lt;/li&gt;&lt;li&gt;商品产地：丹麦&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;li&gt;包装：礼盒装&lt;/li&gt;&lt;/ul&gt;', '578cc8703d254.jpg,578cc8703f964.jpg,578cc870410d5.jpg,578cc8704245d.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：丹麦蓝罐曲奇&lt;/li&gt;&lt;li&gt;商品编号：319873&lt;/li&gt;&lt;li&gt;商品毛重：1.57kg&lt;/li&gt;&lt;li&gt;商品产地：丹麦&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;li&gt;包装：礼盒装&lt;/li&gt;&lt;/ul&gt;', '10.9kg', '0', '0', '1', '9999', '0', '1468844144');
INSERT INTO `mj_goods` VALUES ('84', '燕之坊 禅食 阿胶 核桃 固元膏罐装750g', '228.00', '199.00', '96', '燕之坊 禅食 阿胶 核桃 固元膏罐装750g', '750g', '&lt;h1&gt;燕之坊 禅食 阿胶 核桃 固元膏罐装750g&lt;/h1&gt;', '578cc8bf1dfc7.jpg,578cc8bf20abf.jpg,578cc8bf21677.jpg', '&lt;p&gt;750g&lt;/p&gt;', '750g', '0', '0', '1', '100', '0', '1468844223');
INSERT INTO `mj_goods` VALUES ('85', 'Amber Lyn 无糖dark巧克力 ', '399.00', '380.00', '112', 'Amber Lyn 无糖dark巧克力 454g 黑色', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：Amber Lyn 无糖dark巧克力 454g 黑色&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1955684363&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;\r\n	&lt;li&gt;货号：1021362&lt;/li&gt;\r\n	&lt;li&gt;是否添加蔗糖：否&lt;/li&gt;\r\n	&lt;li&gt;形状：其他&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;包装单位：其它&lt;/li&gt;\r\n	&lt;li&gt;巧克力分类：其它&lt;/li&gt;\r\n	&lt;li&gt;可可脂含量：40%-70%&lt;/li&gt;\r\n	&lt;li&gt;糖果分类：其它&lt;/li&gt;\r\n	&lt;li&gt;包装：其它&lt;/li&gt;\r\n	&lt;li&gt;分类：巧克力&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cc9384b67b.jpg,578cc9384c233.jpg,578cc9384d1d3.jpg,578cc9384e173.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：Amber Lyn 无糖dark巧克力 454g 黑色&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1955684363&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;\r\n	&lt;li&gt;货号：1021362&lt;/li&gt;\r\n	&lt;li&gt;是否添加蔗糖：否&lt;/l', '1.12kg', '0', '0', '1', '9999', '0', '1468844345');
INSERT INTO `mj_goods` VALUES ('86', '西藏特产 七芝堂 野生黑枸杞礼盒装 50g', '138.00', '108.00', '97', '西藏特产 七芝堂 野生黑枸杞礼盒装 50g', '50g', '&lt;h1&gt;西藏特产 七芝堂 野生黑枸杞礼盒装 50g&lt;/h1&gt;', '578cc96a290b2.jpg,578cc96a29c6b.jpg,578cc96a2ac0b.jpg', '&lt;p&gt;50g&lt;/p&gt;', '50g', '0', '0', '1', '200', '0', '1468844394');
INSERT INTO `mj_goods` VALUES ('87', '雪碧碳酸饮料330ml*24听 整箱', '48.90', '45.90', '128', '雪碧，透心凉，心飞扬！击败炎热，爽翻夏日！', '雪碧', '&lt;p&gt;雪碧，透心凉，心飞扬！击败炎热，爽翻夏日！&lt;br&gt;&lt;/p&gt;', '578cc98cf3b88.jpg', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '330ml*24', '0', '0', '1', '0', '0', '1468844429');
INSERT INTO `mj_goods` VALUES ('88', '马来西亚进口 喜薇麦乐', '15.80', '15.00', '113', '马来西亚进口 喜薇麦乐 棉花糖(香草味)100g', '香草味', '&lt;ul&gt;&lt;li&gt;商品名称：喜薇麦乐马来西亚进口&lt;/li&gt;&lt;li&gt;商品编号：1279365&lt;/li&gt;&lt;li&gt;商品毛重：110.00g&lt;/li&gt;&lt;/ul&gt;', '578cc9eb1b544.jpg,578cc9eb1c8cd.jpg,578cc9eb1d485.jpg,578cc9eb1e425.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：喜薇麦乐马来西亚进口&lt;/li&gt;&lt;li&gt;商品编号：1279365&lt;/li&gt;&lt;li&gt;商品毛重：110.00g&lt;/li&gt;&lt;/ul&gt;', '100g', '0', '0', '1', '9999', '0', '1468844523');
INSERT INTO `mj_goods` VALUES ('89', '宁夏特产中宁头茬枸杞独立小包装礼盒特优级 铁礼盒装 500g', '128.00', '108.00', '97', '宁夏特产中宁头茬枸杞独立小包装礼盒特优级 铁礼盒装 500g', '500g', '&lt;h1&gt;宁夏特产中宁头茬枸杞独立小包装礼盒特优级 铁礼盒装 500g&lt;/h1&gt;', '578cc9ff4fcff.jpg,578cc9ff50c9f.jpg,578cc9ff51c40.jpg', '&lt;p&gt;500g&lt;/p&gt;', '500g', '0', '0', '1', '100', '0', '1468844543');
INSERT INTO `mj_goods` VALUES ('90', 'Dr.Oetker德国欧特家博士10寸意式 进口融情意馆马苏里拉比萨披萨匹萨', '35.80', '33.00', '114', 'Dr.Oetker德国欧特家博士10寸意式 进口融情意馆马苏里拉比萨披萨匹萨', '其他', '&lt;p&gt;Dr.Oetker德国欧特家博士10寸意式 进口融情意馆马苏里拉比萨披萨匹萨&amp;nbsp;&amp;nbsp;&lt;br&gt;&lt;/p&gt;', '578ccaa272fd1.jpg,578ccaa274b29.jpg,578ccaa275eb2.jpg', '&lt;p&gt;Dr.Oetker德国欧特家博士10寸意式 进口融情意馆马苏里拉比萨披萨匹萨&amp;nbsp;&amp;nbsp;&lt;br&gt;&lt;/p&gt;', '1.12kg', '0', '0', '1', '9999', '0', '1468844706');
INSERT INTO `mj_goods` VALUES ('91', '西藏特产 七芝堂冬虫夏草 西藏那曲野生虫草礼品 冬虫夏草 80根/约20克送礼盒', '3099.00', '2799.00', '101', '西藏特产 七芝堂冬虫夏草 西藏那曲野生虫草礼品 冬虫夏草 80根/约20克送礼盒', '20g', '&lt;h1&gt;西藏特产 七芝堂冬虫夏草 西藏那曲野生虫草礼品 冬虫夏草 80根/约20克送礼盒&lt;/h1&gt;', '578ccae661a34.jpg', '&lt;p&gt;20g&lt;/p&gt;', '20g', '0', '0', '1', '100', '0', '1468844774');
INSERT INTO `mj_goods` VALUES ('92', ' 新西兰进口Airborne儿童蜂蜜', '119.00', '115.00', '116', '全球购 新西兰进口Airborne儿童蜂蜜 500g', '香甜', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：全球购 新西兰进口Airborne儿童蜂蜜 500g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1954172502&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：350.00g&lt;/li&gt;\r\n	&lt;li&gt;货号：A0178&lt;/li&gt;\r\n	&lt;li&gt;蜜炼茶分类：柚子茶&lt;/li&gt;\r\n	&lt;li&gt;重量：251-500g&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;蜂蜜采收季节：秋季&lt;/li&gt;\r\n	&lt;li&gt;蜂蜜分类：其它&lt;/li&gt;\r\n	&lt;li&gt;产品产地：新西兰&lt;/li&gt;\r\n	&lt;li&gt;是否有机：有机&lt;/li&gt;\r\n	&lt;li&gt;分类：蜂蜜&lt;/li&gt;\r\n	&lt;li&gt;包装单位：瓶装&lt;/li&gt;\r\n	&lt;li&gt;包装：独立包装&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578ccb59ca337.jpg,578ccb59cb2d7.jpg,578ccb59cc660.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：全球购 新西兰进口Airborne儿童蜂蜜 500g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1954172502&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：350.00g&lt;/li&gt;\r\n	&lt;li&gt;货号：A0178&lt;/li&gt;\r\n	&lt;li&gt;蜜炼茶分类：柚子茶&lt;/l', '10.9kg', '0', '0', '1', '9999', '0', '1468844890');
INSERT INTO `mj_goods` VALUES ('93', '鸿豪 干货 礼盒装 蛹虫草 虫草花250克一盒', '268.00', '238.00', '101', '鸿豪 干货 礼盒装 蛹虫草 虫草花250克一盒', '250g', '&lt;h1&gt;鸿豪 干货 礼盒装 蛹虫草 虫草花250克一盒&lt;/h1&gt;', '578ccbb741910.jpg,578ccbb742c98.jpg,578ccbb744020.jpg', '&lt;p&gt;250g&lt;/p&gt;', '250g', '0', '0', '1', '50', '0', '1468844983');
INSERT INTO `mj_goods` VALUES ('94', '马来西亚进口咖啡 沙巴哇Sabava 白咖啡 ', '89.90', '85.00', '117', '马来西亚进口咖啡 沙巴哇Sabava 白咖啡 综合1kg （25g*40包）', '原味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：马来西亚进口 沙巴哇白咖啡&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1945822&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：马来西亚&lt;/li&gt;\r\n	&lt;li&gt;货号：1951809312&lt;/li&gt;\r\n	&lt;li&gt;咖啡分类：速溶咖啡&lt;/li&gt;\r\n	&lt;li&gt;分类：咖啡&lt;/li&gt;\r\n	&lt;li&gt;产品产地：马来西亚&lt;/li&gt;\r\n	&lt;li&gt;包装单位：袋装&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578ccc173015b.jpg,578ccc173286c.jpg,578ccc17347ac.jpg,578ccc1735b34.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：马来西亚进口 沙巴哇白咖啡&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1945822&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;\r\n	&lt;li&gt;商品产地：马来西亚&lt;/li&gt;\r\n	&lt;li&gt;货号：1951809312&lt;/li&gt;\r\n	&lt;l', '500g', '0', '0', '1', '9999', '0', '1468845080');
INSERT INTO `mj_goods` VALUES ('95', '意大利进口LAVAZZA乐维萨拉瓦萨特醇香浓意式浓缩咖啡豆 Cream Aroma ', '125.00', '115.00', '118', '意大利进口LAVAZZA乐维萨拉瓦萨特醇香浓意式浓缩咖啡豆 Cream Aroma 1kg', '醇香', '&lt;ul&gt;&lt;li&gt;商品名称：意大利进口LAVAZZA乐维萨拉瓦萨特醇香浓意式浓缩咖啡豆 Cream Aroma 1kg&lt;/li&gt;&lt;li&gt;商品编号：1016618775&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://carana.jd.com/&quot; href=&quot;http://carana.jd.com/&quot; target=&quot;_blank&quot;&gt;可瑞纳咖啡&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;&lt;li&gt;货号：lavazza-03&lt;/li&gt;&lt;li&gt;重量：251-500g&lt;/li&gt;&lt;li&gt;咖啡口味：其它&lt;/li&gt;&lt;li&gt;包装单位：袋装&lt;/li&gt;&lt;li&gt;是否含糖：含糖&lt;/li&gt;&lt;li&gt;咖啡分类：咖啡豆&lt;/li&gt;&lt;li&gt;产品产地：意大利&lt;/li&gt;&lt;li&gt;包装：其它&lt;/li&gt;&lt;li&gt;是否含咖啡因：含咖啡因&lt;/li&gt;&lt;li&gt;分类：咖啡&lt;/li&gt;&lt;li&gt;奶茶口味：其它&lt;/li&gt;&lt;/ul&gt;', '578ccd52e7971.jpg,578ccd52ea081.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：意大利进口LAVAZZA乐维萨拉瓦萨特醇香浓意式浓缩咖啡豆 Cream Aroma 1kg&lt;/li&gt;&lt;li&gt;商品编号：1016618775&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://carana.jd.com/&quot; ', '500g', '0', '0', '1', '9999', '0', '1468845395');
INSERT INTO `mj_goods` VALUES ('96', '爆款组合 超划算 德国进口新水果天堂果茶', '75.00', '70.00', '119', '【爱乐活】爆款组合 超划算 德国进口新水果天堂果茶+洛神甜橙花果茶 花茶 果粒茶', '混合味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：【爱乐活】爆款组合 超划算 德国进口新水果天堂果茶+洛神甜橙花果茶 花茶 果粒茶&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1508453007&lt;/li&gt;\r\n	&lt;li&gt;店铺：&amp;nbsp;&lt;a href=&quot;http://ailehuo.jd.com/&quot; target=&quot;_blank&quot;&gt;爱乐活官方旗舰店&lt;/a&gt;&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：0.65kg&lt;/li&gt;\r\n	&lt;li&gt;进口产地：德国&lt;/li&gt;\r\n	&lt;li&gt;口味：混合味&lt;/li&gt;\r\n	&lt;li&gt;是否含糖：无糖&lt;/li&gt;\r\n	&lt;li&gt;国产/进口：进口&lt;/li&gt;\r\n	&lt;li&gt;包装：独立包装&lt;/li&gt;\r\n	&lt;li&gt;分类：进口花果茶&lt;/li&gt;\r\n	&lt;li&gt;包装单位：罐装&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cce2c0d583.jpg,578cce2c0e90b.jpg,578cce2c0f4c3.jpg,578cce2c1084b.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：【爱乐活】爆款组合 超划算 德国进口新水果天堂果茶+洛神甜橙花果茶 花茶 果粒茶&lt;/li&gt;\r\n	&lt;li&gt;商品编号：1508453007&lt;/li&gt;\r\n	&lt;li&gt;店铺：&amp;nbsp;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '1.12kg', '0', '0', '1', '9999', '0', '1468845510');
INSERT INTO `mj_goods` VALUES ('97', '春雨芳山野珍品礼盒装 送礼山珍猴头鹿茸秋木耳花菇姬菇丑娘叶包邮', '258.00', '238.00', '111', '春雨芳山野珍品礼盒装 送礼山珍猴头鹿茸秋木耳花菇姬菇丑娘叶包邮', '1000g', '&lt;h1&gt;&lt;span style=&quot;font-size:28px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:26px;&quot;&gt;春雨芳山野珍品礼盒装 送礼山珍猴头鹿茸秋木耳花菇姬菇丑娘叶包邮&lt;/span&gt;&lt;/h1&gt;', '578cce0ace699.jpg', '&lt;p&gt;1000g&lt;/p&gt;', '1000g', '0', '0', '1', '500', '0', '1468845579');
INSERT INTO `mj_goods` VALUES ('98', '维他 柠檬茶250ml*24盒 整箱', '50.90', '45.90', '129', '要来就来真的！真茶+真柠檬', '1件', '&lt;p&gt;要来就来真的！真茶+真柠檬&lt;br&gt;&lt;/p&gt;', '578ccea18bf5f.jpg,578ccea18d2e7.jpg,578ccea18e287.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：维他柠檬茶&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;功能饮料：其它&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&qu', '250ml*24', '0', '0', '1', '0', '0', '1468845730');
INSERT INTO `mj_goods` VALUES ('99', '春雨芳高端绿色手提袋礼盒 山珍4样 椴木花菇黑木耳猴头鹿茸 免邮费', '398.00', '368.00', '111', '春雨芳高端绿色手提袋礼盒 山珍4样 椴木花菇黑木耳猴头鹿茸 免邮费', '1.5kg', '&lt;h1&gt;春雨芳高端绿色手提袋礼盒 山珍4样 椴木花菇黑木耳猴头鹿茸 免邮费&lt;/h1&gt;', '578ccecdddf63.jpg,578ccecddeb1b.jpg,578ccecddfabb.jpg', '&lt;p&gt;1.5k&lt;/p&gt;', '1.5kg', '0', '0', '1', '200', '0', '1468845774');
INSERT INTO `mj_goods` VALUES ('100', '卡布瑞克 法国原装进口纯羊奶粉 ', '456.00', '450.00', '120', '卡布瑞克 法国原装进口纯羊奶粉 中老年补钙养生羊奶粉  2罐装400g/罐', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：卡布瑞克 法国原装进口纯羊奶粉 中老年补钙养生羊奶粉 2罐装400g/罐&lt;/li&gt;&lt;li&gt;商品编号：1151139509&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://organok.jd.com/&quot; href=&quot;http://organok.jd.com/&quot; target=&quot;_blank&quot;&gt;欧盖诺克食品专营店&lt;/a&gt;&lt;/li&gt;&lt;li&gt;商品毛重：1.0kg&lt;/li&gt;&lt;li&gt;货号：TCLG2&lt;/li&gt;&lt;li&gt;奶源产地：法国&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&gt;脂肪含量：全脂&lt;/li&gt;&lt;li&gt;是否含糖：是&lt;/li&gt;&lt;li&gt;净含量：400-800g&lt;/li&gt;&lt;li&gt;分类：羊奶粉&lt;/li&gt;&lt;li&gt;适用人群：中老年&lt;/li&gt;&lt;li&gt;包装单位：桶装&lt;/li&gt;&lt;/ul&gt;', '578ccef35b9cf.jpg,578ccef35c587.jpg,578ccef35d527.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：卡布瑞克 法国原装进口纯羊奶粉 中老年补钙养生羊奶粉 2罐装400g/罐&lt;/li&gt;&lt;li&gt;商品编号：1151139509&lt;/li&gt;&lt;li&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://organok.jd.com/&quot; href=&qu', '1.12kg', '0', '0', '1', '9999', '0', '1468845811');
INSERT INTO `mj_goods` VALUES ('101', '柴达木野生黑枸杞礼盒120G 精选大果黑枸杞 青海特产花青素之王黑枸杞子', '295.00', '268.00', '111', '柴达木野生黑枸杞礼盒120G 精选大果黑枸杞 青海特产花青素之王黑枸杞子', '120g', '&lt;h1&gt;柴达木野生黑枸杞礼盒120G 精选大果黑枸杞 青海特产花青素之王黑枸杞子&lt;/h1&gt;', '578ccfa3f3992.jpg,578ccfa400ada.jpg,578ccfa401692.jpg', '&lt;p&gt;120g&lt;/p&gt;', '120g', '0', '0', '1', '100', '0', '1468845988');
INSERT INTO `mj_goods` VALUES ('102', '奥地利进口 田园(Landgarten)有机 苹果蔓越莓什锦谷物坚果', '9.90', '9.00', '121', '奥地利进口 田园(Landgarten)有机 苹果蔓越莓什锦谷物坚果50g\r\n进口', '咸味', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：田园50g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2288964&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：60.00g&lt;/li&gt;\r\n	&lt;li&gt;商品产地：奥地利&lt;/li&gt;\r\n	&lt;li&gt;包装：其它&lt;/li&gt;\r\n	&lt;li&gt;口味：咸味&lt;/li&gt;\r\n	&lt;li&gt;产品产地：其它&lt;/li&gt;\r\n	&lt;li&gt;包装单位：袋装&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '578cd009af4df.jpg,578cd009b047f.jpg,578cd009b1807.jpg,578cd009b2f78.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;商品名称：田园50g&lt;/li&gt;\r\n	&lt;li&gt;商品编号：2288964&lt;/li&gt;\r\n	&lt;li&gt;商品毛重：60.00g&lt;/li&gt;\r\n	&lt;li&gt;商品产地：奥地利&lt;/li&gt;\r\n	&lt;li&gt;包装：其它&lt;/li&gt;\r\n	&lt;li&gt;口味：咸味&lt;/l', '60.00g', '0', '0', '1', '9999', '0', '1468846090');
INSERT INTO `mj_goods` VALUES ('103', '泰国进口Durian Monthong榴的华金枕头榴莲干', '39.90', '35.00', '123', '泰国进口Durian Monthong榴的华金枕头榴莲干100g', '香甜', '&lt;ul&gt;&lt;li&gt;商品名称：榴的华榴莲干&lt;/li&gt;&lt;li&gt;商品编号：908402&lt;/li&gt;&lt;li&gt;商品毛重：150.00g&lt;/li&gt;&lt;/ul&gt;', '578cd0c19e207.jpg,578cd0c19f58f.jpg,578cd0c1a0917.jpg,578cd0c1a1ca0.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：榴的华榴莲干&lt;/li&gt;&lt;li&gt;商品编号：908402&lt;/li&gt;&lt;li&gt;商品毛重：150.00g&lt;/li&gt;&lt;/ul&gt;', '500g', '0', '0', '1', '9999', '0', '1468846274');
INSERT INTO `mj_goods` VALUES ('104', '     旅顺馆 速发淡干海参干货刺参 10只简装 即食海参极参', '368.00', '328.00', '115', '旅顺馆 速发淡干海参干货刺参 10只简装 即食海参极参', '10只', '&lt;h1&gt;旅顺馆 速发淡干海参干货刺参 10只简装 即食海参极参&lt;/h1&gt;\r\n', '578cd14ace3f1.jpg,578cd14acf77a.jpg,578cd14ad0b02.jpg', '&lt;p&gt;10只&lt;/p&gt;\r\n', '10只', '0', '0', '1', '200', '0', '1468846336');
INSERT INTO `mj_goods` VALUES ('105', '芝士工厂(The Cheesecake Factory) 冷冻蛋糕 生日蛋糕 巧克力慕斯芝士(7寸) 8片', '89.00', '85.00', '124', '芝士工厂(The Cheesecake Factory) 冷冻蛋糕 生日蛋糕 巧克力慕斯芝士(7寸) 8片 1020g\r\n', '奶油味', '&lt;ul&gt;&lt;li&gt;商品名称：巧克力慕斯芝士&lt;/li&gt;&lt;li&gt;商品编号：2526243&lt;/li&gt;&lt;li&gt;商品毛重：1.17kg&lt;/li&gt;&lt;li&gt;商品产地：美国&lt;/li&gt;&lt;li&gt;资质认证：其它&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&gt;加工工艺：烘烤类&lt;/li&gt;&lt;li&gt;适用场景：节日，休闲娱乐，送礼，聚会&lt;/li&gt;&lt;li&gt;包装单位：盒装&lt;/li&gt;&lt;li&gt;是否含糖：含糖&lt;/li&gt;&lt;li&gt;口味：巧克力味，芝士味&lt;/li&gt;&lt;li&gt;存储条件：低温冷藏&lt;/li&gt;&lt;li&gt;分类：冷冻蛋糕，蛋糕糕点&lt;/li&gt;&lt;li&gt;饼干分类：其它&lt;/li&gt;&lt;li&gt;价位：200以上&lt;/li&gt;&lt;li&gt;包装：独立包装&lt;/li&gt;&lt;li&gt;蛋糕糕点分类：西式糕点&lt;/li&gt;&lt;/ul&gt;', '578cd17b5cfbd.jpg,578cd17b5e345.jpg,578cd17b5fab5.jpg,578cd17b60a56.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：巧克力慕斯芝士&lt;/li&gt;&lt;li&gt;商品编号：2526243&lt;/li&gt;&lt;li&gt;商品毛重：1.17kg&lt;/li&gt;&lt;li&gt;商品产地：美国&lt;/li&gt;&lt;li&gt;资质认证：其它&lt;/li&gt;&lt;li&gt;国产/进口：进口&lt;/li&gt;&lt;li&', '1020g', '0', '0', '1', '9999', '0', '1468846460');
INSERT INTO `mj_goods` VALUES ('106', '韩国进口 九日 蜂蜜黄油薯片', '11.80', '10.00', '125', '韩国进口 九日 蜂蜜黄油薯片 60g', '原味', '&lt;ul&gt;&lt;li&gt;商品名称：九日蜂蜜黄油薯片 60g&lt;/li&gt;&lt;li&gt;商品编号：1852875&lt;/li&gt;&lt;li&gt;商品毛重：80.00g&lt;/li&gt;&lt;li&gt;商品产地：韩国&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;/ul&gt;', '578cd22ec546d.jpg,578cd22ec640d.jpg,578cd22ec6fc5.jpg,578cd22ec7f66.jpg', '&lt;ul&gt;&lt;li&gt;商品名称：九日蜂蜜黄油薯片 60g&lt;/li&gt;&lt;li&gt;商品编号：1852875&lt;/li&gt;&lt;li&gt;商品毛重：80.00g&lt;/li&gt;&lt;li&gt;商品产地：韩国&lt;/li&gt;&lt;li&gt;口味：其它&lt;/li&gt;&lt;/ul&gt;', '80.00g', '0', '0', '1', '9999', '0', '1468846639');
INSERT INTO `mj_goods` VALUES ('107', '脉动（Mizone） 维生素饮料 青柠味 600ml *15瓶 整箱', '48.00', '40.00', '131', '状态回神，炫出高能！', '青柠口味', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '578cd23c50241.jpg,578cd23c511e2.jpg,578cd23c51d9a.jpg', '&lt;p&gt;商品名称：脉动（Mizone） 维生素饮料 青柠味&lt;/p&gt;&lt;p&gt;功能饮料：运动饮料&lt;/p&gt;&lt;p&gt;是否含糖：含糖&lt;/p&gt;&lt;p&gt;包装：独立包装，家庭装&lt;/p&gt;&lt;p&gt;商品编号：1044735&lt;/p&gt;', '600ml*15', '0', '0', '1', '0', '0', '1468846652');
INSERT INTO `mj_goods` VALUES ('108', '关东一品堂 集安边条参 生晒参250g 无硫磺 吉林特产 吉林集安人参 ', '340.00', '300.00', '110', '关东一品堂 集安边条参 生晒参250g 无硫磺 吉林特产 吉林集安人参 ', '250g', '&lt;h1&gt;关东一品堂 集安边条参 生晒参250g 无硫磺 吉林特产 吉林集安人参&lt;/h1&gt;', '578cd2643acce.jpg,578cd2643c056.jpg,578cd2643d7c7.jpg', '&lt;p&gt;250g&lt;/p&gt;', '250g', '0', '0', '1', '100', '0', '1468846692');
INSERT INTO `mj_goods` VALUES ('109', '紫鑫 长白山人参 人参蜜片 参香蜜甜 礼盒盒装 100g 东北特产', '198.00', '168.00', '111', '紫鑫 长白山人参 人参蜜片 参香蜜甜 礼盒盒装 100g 东北特产', '100g', '&lt;h1&gt;紫鑫 长白山人参 人参蜜片 参香蜜甜 礼盒盒装 100g 东北特产&lt;/h1&gt;', '578cd359013b3.jpg,578cd35901f6b.jpg,578cd35902f0c.jpg', '&lt;p&gt;100g&lt;/p&gt;', '100g', '0', '0', '1', '100', '0', '1468846937');
INSERT INTO `mj_goods` VALUES ('110', '五合昆域（kunland） 有机羊肉 新疆巴什拜羊 羊前腿 1000g', '119.00', '109.00', '46', '五合昆域放羊羔羊肉生长在新疆和布克赛尔草原，终年放养，我们只选用7个月左右的羔羊肉，新疆原汁原味的羔羊肉，有机认证，无膻味。', '有机羊前腿', '&lt;p&gt;五合昆域放羊羔羊肉生长在新疆和布克赛尔草原，终年放养，我们只选用7个月左右的羔羊肉，新疆原汁原味的羔羊肉，有机认证，无膻味。&lt;br&gt;&lt;/p&gt;', '578d7e8040560.jpg,578d7e80447c9.jpg,578d7e8045381.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:20px;&quot;&gt;商品名称：五合昆域巴什拜羊前腿&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:20px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt', '1000g', '0', '0', '1', '0', '0', '1468890752');
INSERT INTO `mj_goods` VALUES ('111', '精气神 长白山散养山黑猪通脊 400g', '58.00', '48.00', '47', '精气神山黑猪通脊，吃过的都说好！', '黑猪通脊', '&lt;p&gt;精气神山黑猪通脊，吃过的都说好！&lt;/p&gt;\r\n', '578d808751dca.jpg,578d808756fd3.jpg,578d80875835b.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：精气神山黑猪通脊&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '400g', '0', '0', '1', '0', '0', '1468891271');
INSERT INTO `mj_goods` VALUES ('112', '恒都 有机切片牛柳 菲力原切牛排(不含料包)500g', '129.00', '119.00', '45', '恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。', '菲力', '&lt;p&gt;恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。&lt;br&gt;&lt;/p&gt;', '578d83ae09406.jpg,578d83ae0a3a6.jpg,578d83ae0b347.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：恒都有机切片牛柳&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 22px; line-height: 35.2px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;/p&gt;&l', '500g', '0', '0', '1', '0', '0', '1468892078');
INSERT INTO `mj_goods` VALUES ('113', '恒都 整肉原切 牛腩 1kg', '129.00', '119.00', '52', '恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。', '牛腩', '&lt;p&gt;恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。&lt;br&gt;&lt;/p&gt;', '578d8520d7957.jpg,578d8520d88f7.jpg,578d8520d94af.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：恒都牛腩&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;span ', '1kg', '0', '0', '1', '0', '0', '1468892449');
INSERT INTO `mj_goods` VALUES ('114', '恒都 整肉原切 牛腱子 1kg', '129.00', '119.00', '54', '恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。', '牛腱', '&lt;p&gt;恒都有机肉牛，采用天然、无药残、无激素、无抗生素，按照国家有机农业生产要求和相应的标准生产加工程序，并通过独立有机食品认证机构认证的牛肉。&lt;br&gt;&lt;/p&gt;', '578d8675f34b5.jpg,578d8676005fe.jpg,578d867601986.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：恒都牛腱子&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;span', '1kg', '0', '0', '1', '0', '0', '1468892790');
INSERT INTO `mj_goods` VALUES ('115', '正大食品（CP） 单冻鸡翅中 1kg/袋', '78.00', '68.00', '64', '美味鲜，情更浓，嫩滑多汁的鸡翅，美好的时光就要一起分享！', '1kg', '&lt;p&gt;美味鲜，情更浓，嫩滑多汁的鸡翅，美好的时光就要一起分享！&lt;/p&gt;\r\n', '578d889c68056.jpg,578d889c6ab4e.jpg,578d889c6b706.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：正大食品 单冻鸡翅中&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;贮存条件：-18度条件下冷冻保存&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&g', '1kg', '0', '0', '1', '0', '0', '1468893340');
INSERT INTO `mj_goods` VALUES ('116', '鲜果鲜享 乌骨鸡乌鸡 1只 0.8kg-1kg', '68.00', '58.00', '60', '新鲜乌鸡，营养价值极高！', '乌鸡', '&lt;p&gt;新鲜乌鸡，营养价值极高！&lt;br&gt;&lt;/p&gt;', '578d8d0772304.jpg,578d8d0772ebc.jpg,578d8d0773e5c.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：鲜果鲜享乌骨鸡&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;sp', '0.8kg-1kg', '0', '0', '1', '0', '0', '1468894471');
INSERT INTO `mj_goods` VALUES ('117', '晋龙 鲜鸡蛋 初产蛋 30枚', '59.00', '49.00', '65', '民以食为天，食以安为先', '鲜鸡蛋', '&lt;p&gt;民以食为天，食以安为先&lt;br&gt;&lt;/p&gt;', '578d91057b012.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：晋龙初产蛋&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;货号：4002&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;span', '2.8kg', '0', '0', '1', '0', '0', '1468895493');
INSERT INTO `mj_goods` VALUES ('118', '高邮神邮牌咸鸭蛋（熟65g*20只）真空礼盒包装1300g/盒', '57.80', '47.80', '69', '高邮咸鸭蛋，一枚蛋一碗粥，回忆儿时的味道！', '单黄', '&lt;p&gt;高邮咸鸭蛋，一枚蛋一碗粥，回忆儿时的味道！&lt;/p&gt;\r\n', '578d92d081e25.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：高邮牌咸鸭蛋&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;食用方式：开袋即食&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span ', '65g*20只', '0', '0', '1', '0', '0', '1468895567');
INSERT INTO `mj_goods` VALUES ('119', '百年栗园 密云水库土鸡 鸡肉 1kg', '78.00', '68.00', '60', '百年栗园，密云水库土鸡，生长100天左右，肉质细嫩，皮下脂肪少，可以煲汤、红烧、白斩，汤鲜味美。', '1kg', '&lt;p&gt;百年栗园，密云水库土鸡，生长100天左右，肉质细嫩，皮下脂肪少，可以煲汤、红烧、白斩，汤鲜味美。&lt;br&gt;&lt;/p&gt;', '578d94ba58882.jpg,578d94ba5943a.jpg,578d94ba59c0a.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：百年栗园密云水库土鸡&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;贮存条件：冷冻&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt', '1kg', '0', '0', '1', '0', '0', '1468896442');
INSERT INTO `mj_goods` VALUES ('120', '健力宝运动饮料橙蜜味330ml*24罐 整箱', '60.00', '48.00', '129', '健力宝运动饮料橙蜜味330ml*24罐 整箱', '330ml*24', '&lt;h1&gt;健力宝运动饮料橙蜜味330ml*24罐 整箱&lt;/h1&gt;\r\n', '578edb115db3e.jpg,578edb115e6f6.jpg,578edb115f697.jpg', '&lt;p&gt;330ml*24&lt;/p&gt;\r\n', '330ml*24', '0', '0', '1', '100', '0', '1468899072');
INSERT INTO `mj_goods` VALUES ('121', '怡泉（Schweppes）怡泉+C 330mlX24听/箱 整箱', '72.90', '68.00', '129', '怡泉（Schweppes）怡泉+C 330mlX24听/箱 整箱', '330ml*24', '&lt;h1&gt;怡泉（Schweppes）怡泉+C 330mlX24听/箱 整箱&lt;/h1&gt;\r\n', '578edb4093399.jpg,578edb4093f51.jpg,578edb4094b09.jpg', '&lt;h1&gt;怡泉（Schweppes）怡泉+C 330mlX24听/箱 整箱&lt;/h1&gt;\r\n', '330ml*24', '0', '0', '1', '500', '0', '1468899248');
INSERT INTO `mj_goods` VALUES ('122', 'Watsons屈臣氏苏打水330mlx24瓶/箱 饮用水 饮料', '96.00', '89.00', '130', 'Watsons屈臣氏苏打水330mlx24瓶/箱 饮用水 饮料', '330ml*24', '&lt;h1&gt;Watsons屈臣氏苏打水330mlx24瓶/箱 饮用水 饮料&lt;/h1&gt;\r\n', '578edba8488c9.jpg,578edba84c5b9.jpg', '&lt;h1&gt;Watsons屈臣氏苏打水330mlx24瓶/箱 饮用水 饮料&lt;/h1&gt;\r\n', '330ml*24', '0', '0', '1', '1000', '0', '1468899488');
INSERT INTO `mj_goods` VALUES ('123', '农夫尖叫 运动饮料(多肽)饮料550ml*15瓶 整箱', '59.00', '49.00', '131', '农夫尖叫 运动饮料(多肽)饮料550ml*15瓶 整箱', '550ml*15', '&lt;h1&gt;农夫尖叫 运动饮料(多肽)饮料550ml*15瓶 整箱&lt;/h1&gt;\r\n', '578edbd1d5247.jpg,578edbd1d5e00.jpg,578edbd1d69b8.jpg', '&lt;h1&gt;农夫尖叫 运动饮料(多肽)饮料550ml*15瓶 整箱&lt;/h1&gt;\r\n', '550ml*15', '0', '0', '1', '500', '0', '1468900262');
INSERT INTO `mj_goods` VALUES ('124', '达能随悦海盐奇异果口味维生素饮料480ml*15 整箱', '55.50', '48.00', '133', '达能随悦海盐奇异果口味维生素饮料480ml*15 整箱', '480ml*15', '&lt;h1&gt;达能随悦海盐奇异果口味维生素饮料480ml*15 整箱&lt;/h1&gt;\r\n', '578edbf74827a.jpg,578edbf7499ea.jpg,578edbf74a5a2.jpg', '&lt;h1&gt;达能随悦海盐奇异果口味维生素饮料480ml*15 整箱&lt;/h1&gt;\r\n', '480ml*15', '0', '0', '1', '200', '0', '1468900428');
INSERT INTO `mj_goods` VALUES ('125', '冠品园 酵素液 综合水果复合纤维原液主要由青梅乌梅桑葚蓝莓发酵', '89.00', '69.00', '134', '冠品园 酵素液 综合水果复合纤维原液主要由青梅乌梅桑葚蓝莓发酵', '150ml', '&lt;h1&gt;冠品园 酵素液 综合水果复合纤维原液主要由青梅乌梅桑葚蓝莓发酵&lt;/h1&gt;\r\n', '578edc1d4362b.jpg,578edc1d47aeb.jpg,578edc1d48a8b.jpg', '&lt;h1&gt;冠品园 酵素液 综合水果复合纤维原液主要由青梅乌梅桑葚蓝莓发酵&lt;/h1&gt;\r\n', '150ml', '0', '0', '1', '100', '0', '1468900586');
INSERT INTO `mj_goods` VALUES ('126', '锦秋森林 蓝莓无糖果汁饮料 300ml*10瓶 整箱', '62.90', '56.80', '134', '锦秋森林 蓝莓无糖果汁饮料 300ml*10瓶 整箱', '300ml', '&lt;h1&gt;锦秋森林 蓝莓无糖果汁饮料 300ml*10瓶 整箱&lt;/h1&gt;\r\n', '578edc40325d0.jpg,578edc4033188.jpg,578edc4034128.jpg', '&lt;h1&gt;锦秋森林 蓝莓无糖果汁饮料 300ml*10瓶 整箱&lt;/h1&gt;\r\n', '300ml*10', '0', '0', '1', '500', '0', '1468908432');
INSERT INTO `mj_goods` VALUES ('127', '四川仁寿特产 福仁缘 枇杷原浆饮料 果蔬汁 枇杷果汁 245ml*6听 整箱装', '53.90', '48.90', '134', '四川仁寿特产 福仁缘 枇杷原浆饮料 果蔬汁 枇杷果汁 245ml*6听 整箱装', '245ml', '&lt;h1&gt;四川仁寿特产 福仁缘 枇杷原浆饮料 果蔬汁 枇杷果汁 245ml*6听 整箱装&lt;/h1&gt;\r\n', '578edc8328be8.jpg,578edc83293b8.jpg,578edc8329f70.jpg', '&lt;h1&gt;四川仁寿特产 福仁缘 枇杷原浆饮料 果蔬汁 枇杷果汁 245ml*6听 整箱装&lt;/h1&gt;\r\n', '245ml*6', '0', '0', '1', '600', '0', '1468908734');
INSERT INTO `mj_goods` VALUES ('128', '雀巢（Nestle）咖啡1+2特浓30条390g', '39.90', '35.90', '135', '雀巢（Nestle）咖啡1+2特浓30条390g', '390g', '&lt;h1&gt;雀巢（Nestle）咖啡1+2特浓30条390g&lt;/h1&gt;\r\n', '578edcaa64823.jpg,578edcaa657c3.jpg,578edcaa66764.jpg', '&lt;h1&gt;雀巢（Nestle）咖啡1+2特浓30条390g&lt;/h1&gt;\r\n', '390g', '0', '0', '1', '10000', '0', '1468909095');
INSERT INTO `mj_goods` VALUES ('129', '麦斯威尔特浓速溶咖啡30条（390克/盒）', '39.80', '36.80', '135', '麦斯威尔特浓速溶咖啡30条（390克/盒）', '390g', '&lt;h1&gt;麦斯威尔特浓速溶咖啡30条（390克/盒）&lt;/h1&gt;\r\n', '578edcf7723b4.jpg,578edcf772b84.jpg,578edcf77373c.jpg', '&lt;h1&gt;麦斯威尔特浓速溶咖啡30条（390克/盒）&lt;/h1&gt;\r\n', '390g', '0', '0', '1', '680', '0', '1468909460');
INSERT INTO `mj_goods` VALUES ('131', 'Mings铭氏咖啡 黑袋 意大利特浓咖啡豆454g', '29.90', '25.90', '135', 'Mings铭氏咖啡 黑袋 意大利特浓咖啡豆454g', '454g', '&lt;h1&gt;Mings铭氏咖啡 黑袋 意大利特浓咖啡豆454g&lt;/h1&gt;\r\n', '578edd269cb56.jpg,578edd269d326.jpg,578edd269dede.jpg', '&lt;h1&gt;Mings铭氏咖啡 黑袋 意大利特浓咖啡豆454g&lt;/h1&gt;\r\n', '454g', '0', '0', '1', '800', '0', '1468909869');
INSERT INTO `mj_goods` VALUES ('132', 'Nestle雀巢咖啡伴侣奶油球 原味盒装 奶球奶粒10ml*20粒', '0.00', '25.90', '137', 'Nestle雀巢咖啡伴侣奶油球 原味盒装 奶球奶粒10ml*20粒', '10ml', '&lt;p&gt;Nestle雀巢咖啡伴侣奶油球 原味盒装 奶球奶粒10ml*20粒&lt;/p&gt;\r\n', '578edd50ba36f.jpg,578edd50bb30f.jpg,578edd50bbec7.jpg', '&lt;p&gt;Nestle雀巢咖啡伴侣奶油球 原味盒装 奶球奶粒10ml*20粒&lt;/p&gt;\r\n', '10ml*20', '0', '0', '1', '200', '0', '1468910162');
INSERT INTO `mj_goods` VALUES ('133', 'Nestle雀巢咖啡伴侣（植脂末）400g', '34.90', '29.90', '137', 'Nestle雀巢咖啡伴侣（植脂末）400g', '400g', '&lt;h1&gt;Nestle雀巢咖啡伴侣（植脂末）400g&lt;/h1&gt;\r\n', '578edd7485b66.jpg', '&lt;h1&gt;Nestle雀巢咖啡伴侣（植脂末）400g&lt;/h1&gt;\r\n', '400g', '0', '0', '1', '630', '0', '1468910381');
INSERT INTO `mj_goods` VALUES ('134', '摩卡咖啡大礼盒（160g摩卡曼特宁咖啡1瓶+360g摩卡上选奶精1瓶）', '119.00', '109.00', '138', '摩卡咖啡大礼盒（160g摩卡曼特宁咖啡1瓶+360g摩卡上选奶精1瓶）', '160g+360g', '&lt;h1&gt;摩卡咖啡大礼盒（160g摩卡曼特宁咖啡1瓶+360g摩卡上选奶精1瓶）&lt;/h1&gt;\r\n', '578edcdf84032.jpg,578edcdf84fd2.jpg,578edcdf8635a.jpg', '&lt;h1&gt;摩卡咖啡大礼盒（160g摩卡曼特宁咖啡1瓶+360g摩卡上选奶精1瓶）&lt;/h1&gt;\r\n', '160g+360g', '0', '0', '1', '99', '0', '1468910656');
INSERT INTO `mj_goods` VALUES ('135', '西麦 完美早餐组合装 即食纯燕麦1500g早餐奶香燕麦700g', '69.90', '58.80', '139', '西麦 完美早餐组合装 即食纯燕麦1500g早餐奶香燕麦700g', '1500g', '&lt;h1&gt;西麦 完美早餐组合装 即食纯燕麦1500g早餐奶香燕麦700g&lt;/h1&gt;\r\n', '578edcc382cd3.jpg,578edcc3869c3.jpg', '&lt;h1&gt;西麦 完美早餐组合装 即食纯燕麦1500g早餐奶香燕麦700g&lt;/h1&gt;\r\n', '1500g', '0', '0', '1', '600', '0', '1468910851');
INSERT INTO `mj_goods` VALUES ('137', '家乐氏（Kellogg’s ）谷兰诺拉草莓什锦水果谷物麦片490g（35g*14）', '69.90', '65.90', '139', '家乐氏（Kellogg’s ）谷兰诺拉草莓什锦水果谷物麦片490g（35g*14）', '490g', '&lt;h1&gt;家乐氏（Kellogg&amp;rsquo;s ）谷兰诺拉草莓什锦水果谷物麦片490g（35g*14）&lt;/h1&gt;\r\n', '578edb884efe5.jpg,578edb8852cd5.jpg', '&lt;h1&gt;家乐氏（Kellogg&amp;rsquo;s ）谷兰诺拉草莓什锦水果谷物麦片490g（35g*14）&lt;/h1&gt;\r\n', '490g', '0', '0', '1', '608', '0', '1468911260');
INSERT INTO `mj_goods` VALUES ('139', '雀巢(Nestle) 果维C+橙味1kg 橙C 冲饮果汁粉', '28.80', '24.80', '140', '雀巢(Nestle) 果维C+橙味1kg 橙C 冲饮果汁粉', '1000g', '&lt;h1&gt;雀巢(Nestle) 果维C+橙味1kg 橙C 冲饮果汁粉&lt;/h1&gt;\r\n', '578edb55728c4.jpg,578edb557347d.jpg,578edb5574035.jpg', '&lt;h1&gt;雀巢(Nestle) 果维C+橙味1kg 橙C 冲饮果汁粉&lt;/h1&gt;\r\n', '1000g', '0', '0', '1', '750', '0', '1468911404');
INSERT INTO `mj_goods` VALUES ('140', '南方核桃黑芝麻糊600g', '29.80', '25.80', '141', '南方核桃黑芝麻糊600g', '600g', '&lt;h1&gt;南方核桃黑芝麻糊600g&lt;/h1&gt;\r\n', '578edaed90b23.jpg', '&lt;h1&gt;南方核桃黑芝麻糊600g&lt;/h1&gt;\r\n', '600g', '0', '0', '1', '450', '0', '1468911613');
INSERT INTO `mj_goods` VALUES ('141', '南农（nannong）红豆薏仁枸杞粉罐装550g', '69.00', '59.00', '139', '南农（nannong）红豆薏仁枸杞粉罐装550g', '550g', '&lt;h1&gt;南农（nannng）红豆薏仁枸杞粉罐装550g&lt;/h1&gt;\r\n', '578edaa887262.jpg,578edaa8885eb.jpg,578edaa88958b.jpg', '&lt;h1&gt;南农（nannong）红豆薏仁枸杞粉罐装550g&lt;/h1&gt;\r\n', '550g', '0', '0', '1', '300', '0', '1468911820');
INSERT INTO `mj_goods` VALUES ('142', '一楠红枣枸杞姜奶茶 袋装速溶奶茶粉 姜母红枣饮料冲饮品200g', '58.00', '49.00', '142', '一楠红枣枸杞姜奶茶 袋装速溶奶茶粉 姜母红枣饮料冲饮品200g', '200g', '&lt;h1&gt;一楠红枣枸杞姜奶茶 袋装速溶奶茶粉 姜母红枣饮料冲饮品200g&lt;/h1&gt;\r\n', '578eda634a4b4.jpg,578eda634b06c.jpg,578eda634c00c.jpg', '&lt;h1&gt;一楠红枣枸杞姜奶茶 袋装速溶奶茶粉 姜母红枣饮料冲饮品200g&lt;/h1&gt;\r\n', '200g', '0', '0', '1', '450', '0', '1468912050');
INSERT INTO `mj_goods` VALUES ('146', '马天尼（Martini） 洋酒 阿斯蒂 意大利进口起泡酒750ml', '89.00', '85.00', '145', '马天尼（Martini） 洋酒 阿斯蒂 意大利进口起泡酒750ml', '原味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：马天尼葡萄酒&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1061466&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品毛重：1.54kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品产地：意大利&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '578edaffeb1d9.jpg,578edaffebd91.jpg,578edaffed119.jpg,578edaffee4a1.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：马天尼葡萄酒&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1061466&lt;/span&gt;&lt;/li&gt;&lt;li&', '1.54kg', '0', '0', '1', '9999', '0', '1468979968');
INSERT INTO `mj_goods` VALUES ('147', '荷兰 Vacu Vin 进口葡萄酒冰霜袋香槟冰袋套装酒瓶袋冰酒袋酒具 黑色', '335.00', '320.00', '144', '荷兰 Vacu Vin 进口葡萄酒冰霜袋香槟冰袋套装酒瓶袋冰酒袋酒具 黑色', '原味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：荷兰 Vacu Vin 进口葡萄酒冰霜袋香槟冰袋套装酒瓶袋冰酒袋酒具 黑色&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：10226628967&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-79389.html&quot; href=&quot;http://mall.jd.com/index-79389.html&quot; target=&quot;_blank&quot;&gt;apous旗舰店&lt;/a&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：1.0kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;货号：3887360&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;材质：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;产品数量：1个&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：进口&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '578edc0882d83.jpg,578edc088393b.jpg,578edc088410b.jpg,578edc0884cc3.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：荷兰 Vacu Vin 进口葡萄酒冰霜袋香槟冰袋套装酒瓶袋冰酒袋酒具 黑色&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1022662', '1.0kg', '0', '0', '1', '9999', '0', '1468980233');
INSERT INTO `mj_goods` VALUES ('148', '比利时进口 林德曼 Lindemans樱桃精酿啤酒 礼盒装 250ml*6瓶', '139.00', '135.00', '146', '1809年，林德曼一家开办了一家专门酿造拉比克啤酒的酒厂，在坚持古老又传统的拉比克啤酒酿造方式的同时，又以创新的方式酿造出了多种果味啤酒以及贵兹啤酒，受到了消费者的一致喜爱，一直发展到今天，他们仍在坚持酿造着自己的贵兹啤酒。', '香甜', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：Lindemans进口啤酒&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：2848338&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：3.1kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品产地：比利时&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;容量：1-3L&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：进口&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装：礼盒装，组合装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：无醇/果啤&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：箱装，瓶装&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '578edd209abae.jpg,578edd209bf37.jpg,578edd209d2bf.jpg,578edd209ea2f.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：Lindemans进口啤酒&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：2848338&lt;/span&gt;&lt;/li&gt;', '3.1kg', '0', '0', '1', '9999', '0', '1468980513');
INSERT INTO `mj_goods` VALUES ('149', '英国原装进口 欧倍（Alpen）瑞士风味燕麦干果早餐（原味）全谷物高纤维营养早餐麦片 375g', '45.50', '40.40', '139', '英国家喻户晓的早餐品牌，瑞士燕麦制造', '麦干果早餐（原味）', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;维多麦食品公司是英国经典的谷物和谷物棒制造商之一。品牌自1932年起一直在英国生产健康美味的谷类食品。如今已经成为获得英国皇室认证的，值得信赖并且受推崇的谷物早餐品牌。&lt;/span&gt;&lt;/p&gt;\r\n', '578ef87c4e616.jpg,578ef87c4f1cf.jpg,578ef87c53ff0.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：欧倍（Alpen）瑞士风味燕麦干果早餐（原味）&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：冲饮谷物&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt', '375g', '0', '0', '1', '0', '0', '1468986012');
INSERT INTO `mj_goods` VALUES ('150', '香飘飘奶茶旗舰店杯装奶茶冲饮奶茶 美味升级 量贩礼盒装', '60.00', '56.00', '142', '小饿小困，喝点香飘飘', '香飘飘', '&lt;p&gt;&lt;span style=&quot;font-size:24px&quot;&gt;镇店之选美味升级礼盒，只要三眼就爱不释手，一款集万千宠爱于一身的礼盒&lt;/span&gt;&lt;/p&gt;\r\n', '578efa5fcbbef.jpg,578efa5fdec9f.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：香飘飘奶茶旗舰店杯装奶茶冲饮奶茶&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:22px&quot;&gt;是否含糖：含糖&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&', '500g-1000g', '0', '0', '1', '0', '0', '1468986467');
INSERT INTO `mj_goods` VALUES ('151', '中科鲜 新鲜南瓜 小金瓜 1个 约1000g 蔬菜配送', '9.00', '6.00', '30', '中科鲜 新鲜南瓜 小金瓜 1个 约1000g 蔬菜配送', '1000g', '&lt;h1&gt;中科鲜 新鲜南瓜 小金瓜 1个 约1000g 蔬菜配送 &amp;nbsp;新鲜有保障&lt;/h1&gt;\r\n', '578ef783cc9fe.jpg,578ef784075c0.jpg,578ef7845a911.jpg', '&lt;h1&gt;中科鲜 新鲜南瓜 小金瓜 1个 约1000g 蔬菜配送&lt;/h1&gt;\r\n', '1000g', '0', '0', '0', '50', '0', '1468987269');
INSERT INTO `mj_goods` VALUES ('152', '德国 进口牛奶 欧德堡（Oldenburger）超高温处理全脂纯牛奶', '59.00', '55.00', '74', '德国 进口牛奶 欧德堡（Oldenburger）超高温处理全脂纯牛奶礼盒装1L*6', '原味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：欧德堡牛奶&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1820736&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：6.64kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品产地：德国&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;特性：全脂&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;产品产地：德国&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;类别：纯牛奶&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：进口&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：箱装&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '5790656513726.jpg,57906565177fe.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：欧德堡牛奶&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1820736&lt;/span&gt;&lt;/li&gt;&lt;li&g', '6.64kg', '0', '0', '1', '9999', '0', '1469080933');
INSERT INTO `mj_goods` VALUES ('153', '百草味 休闲零食 精制猪肉脯200g/袋 靖江肉干肉铺 零食特产小吃', '19.90', '15.90', '83', '百草味 休闲零食 精制猪肉脯200g/袋 靖江肉干肉铺 零食特产小吃', '百草味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：百草味猪肉脯&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1150542&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：230.00g&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品产地：浙江&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;价位：10-29&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装：袋装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;猪肉分类：猪肉脯&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：猪肉类&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '579066a75f971.jpg,579066a760912.jpg,579066a761c9a.jpg,579066a763022.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：百草味猪肉脯&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1150542&lt;/span&gt;&lt;/li&gt;&lt;li&', '230.00g', '0', '0', '1', '9999', '0', '1469081256');
INSERT INTO `mj_goods` VALUES ('154', '良品铺子芒果干风味果干芒果水果干零食芒果片休闲食品', '27.90', '25.90', '83', '良品铺子芒果干风味果干芒果水果干零食芒果片休闲食品108g*3袋', '香甜', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：良品铺子芒果干风味果干芒果水果干零食芒果片休闲食品108g*3袋&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1113944941&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://517lppz.jd.com/&quot; href=&quot;http://517lppz.jd.com/&quot; target=&quot;_blank&quot;&gt;良品铺子官方旗舰店&lt;/a&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：324.00g&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;货号：ZH11103012&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;等级：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：国产&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;加工工艺：果干类&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;山楂类：其它　&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：蔬果干类&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;产品产地：中国大陆&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;枣类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;薯/芋头类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;话梅类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;蔬果干类：其它&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '5790678eac1be.jpg,5790678eacd76.jpg,5790678eadd17.jpg,5790678eae8cf.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：良品铺子芒果干风味果干芒果水果干零食芒果片休闲食品108g*3袋&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：1113944941&l', '324.00g', '0', '0', '1', '9999', '0', '1469081487');
INSERT INTO `mj_goods` VALUES ('155', '马来西亚旧街场经典原味怡保白咖啡3合1oldtown600g内含15包', '42.00', '40.00', '117', '马来西亚旧街场经典原味怡保白咖啡3合1oldtown600g内含15包', '原味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：马来西亚旧街场经典原味怡保白咖啡3合1oldtown600g内含15包&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1102316044&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://yijiansp.jd.com/&quot; href=&quot;http://yijiansp.jd.com/&quot; target=&quot;_blank&quot;&gt;易简食品专营店&lt;/a&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：0.6kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;货号：jjc_ysbz&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;茶饮分类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;麦片分类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;果汁成分含量：100%以下&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;咖啡分类：速溶咖啡&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;蜂蜜分类：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;产品产地：马来西亚&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;饮用水分类：饮用水&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：咖啡&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：袋装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;容量：251mL-500mL&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '579068880fea7.jpg,5790688810a5f.jpg,5790688811de8.jpg,5790688816c09.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：马来西亚旧街场经典原味怡保白咖啡3合1oldtown600g内含15包&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：110231604', '0.6kg', '0', '0', '1', '9999', '0', '1469081736');
INSERT INTO `mj_goods` VALUES ('156', '大润谷丹麦风味曲奇饼干320g 蓝色罐铁盒精美装 零食糕点 食品早餐 美食礼盒 休闲食品', '22.00', '20.00', '124', '大润谷丹麦风味曲奇饼干320g 蓝色罐铁盒精美装 零食糕点 食品早餐 美食礼盒 休闲食品', '原味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：大润谷丹麦风味曲奇饼干320g 蓝色罐铁盒精美装 零食糕点 食品早餐 美食礼盒 休闲食品&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1031323482&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://rungu.jd.com/&quot; href=&quot;http://rungu.jd.com/&quot; target=&quot;_blank&quot;&gt;润谷食品专营店&lt;/a&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：0.575kg&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;货号：206080320&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;资质认证：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：进口&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;加工工艺：烘烤类&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：罐装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;是否含糖：含糖&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;口味：原味&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;存储条件：常温&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：饼干&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;饼干分类：曲奇饼干&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;价位：0-29&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装：独立包装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;蛋糕糕点分类：西式糕点&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '579069b100181.jpg,579069b105db2.jpg,579069b107522.jpg,579069b10d53b.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：大润谷丹麦风味曲奇饼干320g 蓝色罐铁盒精美装 零食糕点 食品早餐 美食礼盒 休闲食品&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品编号：', '0.575kg', '0', '0', '1', '9999', '0', '1469082033');
INSERT INTO `mj_goods` VALUES ('157', '意大利进口Balocco百乐可曲奇饼干巧克力千层酥威化饼干蛋糕休闲零食传统糕点 焦糖 脆皮酥', '18.00', '15.00', '124', '意大利进口Balocco百乐可曲奇饼干巧克力千层酥威化饼干蛋糕休闲零食传统糕点 焦糖 脆皮酥 200g', '奶油味', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品名称：意大利进口Balocco百乐可曲奇饼干巧克力千层酥威化饼干蛋糕休闲零食传统糕点 焦糖 脆皮酥 200g&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品编号：1713128064&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;店铺：&amp;nbsp;&lt;a data-cke-saved-href=&quot;http://mall.jd.com/index-148464.html&quot; href=&quot;http://mall.jd.com/index-148464.html&quot; target=&quot;_blank&quot;&gt;益腾达食品专营店&lt;/a&gt;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;商品毛重：350.00g&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;资质认证：其它&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;国产/进口：进口&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;加工工艺：烘烤类&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;适用场景：休闲娱乐&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装单位：袋装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;是否含糖：含糖&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;口味：奶油味&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;存储条件：常温&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;分类：饼干&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;饼干分类：曲奇饼干&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;价位：60-89&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;包装：组合装&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px&quot;&gt;蛋糕糕点分类：西式糕点&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '57906a8556b62.jpg,57906a8557eea.jpg,57906a8558e8b.jpg,57906a857b943.jpg', '&lt;ul&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&gt;商品名称：意大利进口Balocco百乐可曲奇饼干巧克力千层酥威化饼干蛋糕休闲零食传统糕点 焦糖 脆皮酥 200g&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=&quot;font-size:22px;&quot;&g', '350.00g', '0', '0', '1', '9999', '0', '1469082246');

-- ----------------------------
-- Table structure for `mj_goodssc`
-- ----------------------------
DROP TABLE IF EXISTS `mj_goodssc`;
CREATE TABLE `mj_goodssc` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_goodssc
-- ----------------------------
INSERT INTO `mj_goodssc` VALUES ('1', '67', '9');
INSERT INTO `mj_goodssc` VALUES ('2', '5', '10');
INSERT INTO `mj_goodssc` VALUES ('3', '27', '10');

-- ----------------------------
-- Table structure for `mj_order`
-- ----------------------------
DROP TABLE IF EXISTS `mj_order`;
CREATE TABLE `mj_order` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(50) NOT NULL,
  `uid` int(5) NOT NULL,
  `createtime` int(10) NOT NULL,
  `orderstatus` int(3) NOT NULL,
  `sendtime` int(10) DEFAULT NULL,
  `overtime` int(10) DEFAULT NULL,
  `prices` float(10,2) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `logisticsname` varchar(50) DEFAULT NULL,
  `logisticsinfo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_order
-- ----------------------------
INSERT INTO `mj_order` VALUES ('1', '5799816c026c294', '10', '1469677932', '5', '1469677971', null, '29.90', '河南省郑州市中原区  手机号:13245678956 收货人:lishuang', '顺丰', '46356596565');
INSERT INTO `mj_order` VALUES ('2', '5799a27269d1444', '9', '1469686386', '5', '1469686464', null, '527.70', '北京市北京市东城区135号  手机号:18203680663 收货人:蒲公英', '顺丰快递', '5465642251313131361');
INSERT INTO `mj_order` VALUES ('3', '5799a5587de7c71', '9', '1469687128', '5', '1469687184', null, '114.00', '北京市北京市东城区135号  手机号:18203680663 收货人:蒲公英', '韵达快递', '45645668943668301');
INSERT INTO `mj_order` VALUES ('4', '5799b7243131e91', '10', '1469691684', '5', '1469691715', null, '25.00', '河南省郑州市中原区  手机号:13245678956 收货人:lishuang', '中通快递', '1452684232651220');
INSERT INTO `mj_order` VALUES ('5', '5799b908abed634', '10', '1469692168', '5', '1469692195', null, '185.00', '河南省郑州市中原区  手机号:13245678956 收货人:lishuang', '韵达', '146265123564');
INSERT INTO `mj_order` VALUES ('6', '5799f98c1237245', '17', '1469708684', '1', null, null, '55.00', '北京市北京市东城区111  手机号:18537303624 收货人:111', null, null);
INSERT INTO `mj_order` VALUES ('7', '579aaa664fe4e19', '9', '1469753958', '1', null, null, '325.90', '北京市北京市东城区135号  手机号:18203680663 收货人:蒲公英', null, null);
INSERT INTO `mj_order` VALUES ('8', '579aab9fcf72770', '15', '1469754271', '3', '1469759785', null, '29.90', '北京市北京市西城区云和数据  手机号:15237851510 收货人:张小亮', '圆通', '100');
INSERT INTO `mj_order` VALUES ('9', '579ac09f7471c12', '15', '1469759647', '4', '1469759742', null, '59.00', '北京市北京市西城区云和数据  手机号:15237851510 收货人:张小亮', '圆通', '100');

-- ----------------------------
-- Table structure for `mj_ordergoods`
-- ----------------------------
DROP TABLE IF EXISTS `mj_ordergoods`;
CREATE TABLE `mj_ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(5) NOT NULL,
  `gid` int(4) NOT NULL,
  `goodsargs` varchar(20) NOT NULL,
  `buynum` int(5) NOT NULL,
  `isPj` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_ordergoods
-- ----------------------------
INSERT INTO `mj_ordergoods` VALUES ('1', '1', '28', '26-28mm', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('2', '2', '114', '牛腱', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('3', '2', '67', '450g', '3', '1');
INSERT INTO `mj_ordergoods` VALUES ('4', '2', '34', '绵柔', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('5', '3', '29', '糯玉米', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('6', '3', '4', '16粒家庭装', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('7', '4', '5', '芹菜猪肉', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('8', '5', '16', '无味', '1', '1');
INSERT INTO `mj_ordergoods` VALUES ('9', '6', '5', '芹菜猪肉', '1', '0');
INSERT INTO `mj_ordergoods` VALUES ('10', '6', '3', '三鲜', '1', '0');
INSERT INTO `mj_ordergoods` VALUES ('11', '7', '38', '绵柔浓香', '1', '0');
INSERT INTO `mj_ordergoods` VALUES ('12', '7', '2', '75mm果径', '1', '0');
INSERT INTO `mj_ordergoods` VALUES ('13', '8', '28', '26-28mm', '1', '0');
INSERT INTO `mj_ordergoods` VALUES ('14', '9', '1', '6个装河南产', '1', '0');

-- ----------------------------
-- Table structure for `mj_orderstatus`
-- ----------------------------
DROP TABLE IF EXISTS `mj_orderstatus`;
CREATE TABLE `mj_orderstatus` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `statusname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_orderstatus
-- ----------------------------
INSERT INTO `mj_orderstatus` VALUES ('1', '未付款');
INSERT INTO `mj_orderstatus` VALUES ('2', '等待发货');
INSERT INTO `mj_orderstatus` VALUES ('3', '等待确认收货');
INSERT INTO `mj_orderstatus` VALUES ('4', '订单完成');
INSERT INTO `mj_orderstatus` VALUES ('5', '订单完成已评价');
INSERT INTO `mj_orderstatus` VALUES ('6', '退款中');
INSERT INTO `mj_orderstatus` VALUES ('7', '退款完成');

-- ----------------------------
-- Table structure for `mj_pingjia`
-- ----------------------------
DROP TABLE IF EXISTS `mj_pingjia`;
CREATE TABLE `mj_pingjia` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(4) NOT NULL,
  `goodsargs` varchar(100) DEFAULT NULL,
  `orderid` int(10) NOT NULL,
  `uid` int(4) NOT NULL,
  `pjintro` text,
  `pjtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_pingjia
-- ----------------------------
INSERT INTO `mj_pingjia` VALUES ('1', '28', '26-28mm', '1', '10', '美国进口车厘子，值得购买', '1469678011');
INSERT INTO `mj_pingjia` VALUES ('2', '114', '牛腱', '2', '9', '肉不错，很新鲜！！！', '1469686558');
INSERT INTO `mj_pingjia` VALUES ('3', '67', '450g', '2', '9', '开心果有点潮，快递很慢，差评！！', '1469686691');
INSERT INTO `mj_pingjia` VALUES ('4', '34', '绵柔', '2', '9', '真的很醇香，真的很好喝，下次一定再购！！！', '1469686624');
INSERT INTO `mj_pingjia` VALUES ('5', '29', '糯玉米', '3', '9', '玉米哪家最好吃？还是中国小汤山！', '1469688183');
INSERT INTO `mj_pingjia` VALUES ('6', '4', '16粒家庭装', '3', '9', '佳沛猕猴桃，自然健康营养高！！！', '1469688485');
INSERT INTO `mj_pingjia` VALUES ('7', '5', '芹菜猪肉', '4', '10', '湾仔码头的小云吞，味道鲜美，口感很好。', '1469691780');
INSERT INTO `mj_pingjia` VALUES ('8', '16', '无味', '5', '10', '依云高端矿泉水，水中贵族', '1469692242');

-- ----------------------------
-- Table structure for `mj_user`
-- ----------------------------
DROP TABLE IF EXISTS `mj_user`;
CREATE TABLE `mj_user` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `birthday` int(10) unsigned DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `money` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `regtime` int(10) NOT NULL,
  `level` int(4) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mj_user
-- ----------------------------
INSERT INTO `mj_user` VALUES ('9', 'admin', 'c73bef4145f5608d6abcd8fc80ec1a4f', '女', '1451577600', '北京市北京市东城区', '18203680663', '943250981@qq.com', '579aab6312653.jpg', '小蔡', '672', '358.30', '1469677016', '1', '1');
INSERT INTO `mj_user` VALUES ('10', 'lishuang', 'e10adc3949ba59abbe56e057f20f883e', '女', '1070812800', '河南省郑州市中原区', '13245678956', '123@126.com', '5799811436e85.jpg', null, '250', '9760.10', '1469677048', '1', '1');
INSERT INTO `mj_user` VALUES ('14', 'xvjinkui', 'e10adc3949ba59abbe56e057f20f883e', '男', null, null, '18608942888', 'xvjinkui@163.com', null, null, '0', '0.00', '1469689233', '1', '1');
INSERT INTO `mj_user` VALUES ('15', 'zxl4639', 'e10adc3949ba59abbe56e057f20f883e', '男', '1330790400', '北京市北京市东城区', '15237851510', '1512520308@qq.com', null, null, '89', '99999912.00', '1469754226', '1', '1');
