/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50521
Source Host           : localhost:3306
Source Database       : six

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-12-06 12:49:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sk_active`
-- ----------------------------
DROP TABLE IF EXISTS `sk_active`;
CREATE TABLE `sk_active` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(8) NOT NULL,
  `activenum` int(5) NOT NULL,
  `activeprice` float(6,2) NOT NULL,
  `startime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `saleprice` float(6,2) NOT NULL,
  `jointime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_active
-- ----------------------------
INSERT INTO `sk_active` VALUES ('5', '131', '10', '20.00', '16:00', '18:00', '200.00', '1478594595');
INSERT INTO `sk_active` VALUES ('17', '140', '98', '2399.00', '12:00', '14:00', '2500.00', '1478673706');
INSERT INTO `sk_active` VALUES ('19', '137', '94', '152.00', '12:00', '14:00', '169.00', '1478673745');
INSERT INTO `sk_active` VALUES ('20', '129', '100', '750.00', '12:00', '14:00', '800.00', '1478673761');
INSERT INTO `sk_active` VALUES ('21', '128', '2', '300.00', '16:00', '18:00', '500.00', '1478673973');
INSERT INTO `sk_active` VALUES ('22', '126', '2000', '190.00', '16:00', '18:00', '200.00', '1478673990');
INSERT INTO `sk_active` VALUES ('23', '127', '100', '70.00', '16:00', '18:00', '80.00', '1478674007');
INSERT INTO `sk_active` VALUES ('24', '125', '1000', '85.00', '16:00', '18:00', '100.00', '1478674036');
INSERT INTO `sk_active` VALUES ('25', '94', '111', '55.00', '08:00', '10:00', '60.00', '1478683318');
INSERT INTO `sk_active` VALUES ('26', '93', '10011', '950.00', '08:00', '10:00', '1000.00', '1478683335');
INSERT INTO `sk_active` VALUES ('27', '141', '990', '1899.00', '08:00', '10:00', '2000.00', '1478683354');
INSERT INTO `sk_active` VALUES ('28', '140', '98', '2300.00', '08:00', '10:00', '2500.00', '1478683814');
INSERT INTO `sk_active` VALUES ('29', '139', '999', '135.00', '08:00', '10:00', '150.00', '1478683828');
INSERT INTO `sk_active` VALUES ('30', '204', '11', '880.00', '16:00', '18:00', '900.00', '1478848826');
INSERT INTO `sk_active` VALUES ('31', '290', '1', '1.00', '08:00', '10:00', '1.00', '1479113277');
INSERT INTO `sk_active` VALUES ('32', '221', '111', '11.00', '08:00', '10:00', '111.00', '1479347885');
INSERT INTO `sk_active` VALUES ('33', '222', '10', '2200.00', '12:00', '14:00', '2500.00', '1479352141');
INSERT INTO `sk_active` VALUES ('34', '223', '100', '150.00', '08:00', '10:00', '180.00', '1479354654');
INSERT INTO `sk_active` VALUES ('35', '278', '200', '2000.00', '08:00', '10:00', '4596.00', '1479876808');
INSERT INTO `sk_active` VALUES ('36', '272', '20', '4699.00', '12:00', '14:00', '5960.00', '1479876825');
INSERT INTO `sk_active` VALUES ('37', '268', '100', '2000.00', '16:00', '18:00', '2099.00', '1479876841');
INSERT INTO `sk_active` VALUES ('38', '276', '60', '2000.00', '08:00', '10:00', '2999.00', '1480067640');
INSERT INTO `sk_active` VALUES ('39', '279', '100', '2200.00', '08:00', '10:00', '2500.00', '1480067694');
INSERT INTO `sk_active` VALUES ('40', '258', '53', '100.00', '16:00', '18:00', '199.00', '1480233097');
INSERT INTO `sk_active` VALUES ('41', '302', '8', '260.00', '08:00', '10:00', '300.00', '1480489105');
INSERT INTO `sk_active` VALUES ('42', '300', '22', '50.00', '12:00', '14:00', '60.00', '1480489180');
INSERT INTO `sk_active` VALUES ('43', '255', '99', '220.00', '12:00', '14:00', '259.00', '1480489207');
INSERT INTO `sk_active` VALUES ('44', '244', '200', '260.00', '16:00', '18:00', '299.00', '1480489239');
INSERT INTO `sk_active` VALUES ('45', '235', '99', '170.00', '16:00', '18:00', '189.00', '1480489285');
INSERT INTO `sk_active` VALUES ('46', '296', '100', '380.00', '16:00', '18:00', '400.00', '1480489323');
INSERT INTO `sk_active` VALUES ('47', '297', '12', '360.00', '12:00', '14:00', '400.00', '1480497031');
INSERT INTO `sk_active` VALUES ('48', '290', '100', '1.00', '12:00', '14:00', '1.00', '1480590098');
INSERT INTO `sk_active` VALUES ('49', '285', '99', '450.00', '16:00', '18:00', '500.00', '1480670056');

-- ----------------------------
-- Table structure for `sk_add`
-- ----------------------------
DROP TABLE IF EXISTS `sk_add`;
CREATE TABLE `sk_add` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `code` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_add
-- ----------------------------
INSERT INTO `sk_add` VALUES ('1', 'zs', '北京', '100010');
INSERT INTO `sk_add` VALUES ('2', 'lz', '上海', '100020');
INSERT INTO `sk_add` VALUES ('3', 'jack', '广州', '100000');
INSERT INTO `sk_add` VALUES ('4', 'roes', '江苏', '100001');
INSERT INTO `sk_add` VALUES ('5', 'john', '南京', '100002');
INSERT INTO `sk_add` VALUES ('6', 'ln', '杭州', '100003');
INSERT INTO `sk_add` VALUES ('7', 'rba', '浙江', '100004');
INSERT INTO `sk_add` VALUES ('8', '123456', '郑州', '450000');

-- ----------------------------
-- Table structure for `sk_address`
-- ----------------------------
DROP TABLE IF EXISTS `sk_address`;
CREATE TABLE `sk_address` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `uid` int(6) NOT NULL,
  `address` varchar(300) NOT NULL,
  `detailaddress` varchar(300) NOT NULL,
  `code` int(6) DEFAULT NULL,
  `setdefault` int(2) NOT NULL DEFAULT '0' COMMENT '0->未选中    1->设置为默认',
  `email` varchar(100) DEFAULT NULL,
  `sex` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_address
-- ----------------------------
INSERT INTO `sk_address` VALUES ('1', '王璐璐', '15636598612', '', '31', '河南郑州郑州市', '金水区', '475511', '1', '', '1');
INSERT INTO `sk_address` VALUES ('10', '李旭冉', '13148201513', null, '31', '河南省郑州市金水区', '云和数据', '475500', '0', null, null);
INSERT INTO `sk_address` VALUES ('12', '史永', '18864996587', null, '33', '河南省郑州市金水区', '云和数据', '475500', '0', null, null);
INSERT INTO `sk_address` VALUES ('13', '1', '13148201513', '', '36', '安徽巢湖含山县', '1', '1', '0', '', null);
INSERT INTO `sk_address` VALUES ('23', '刘俊鹏', '15516478968', '', '29', '湖南湘潭湘潭县', '滨河路32号', '0', '1', '', '1');
INSERT INTO `sk_address` VALUES ('25', '史永', '15516896965', null, '29', '广东省湛江市廉江市', '不知道a', null, '0', null, null);
INSERT INTO `sk_address` VALUES ('26', '111', '15516712675', null, '78', '111', '11', '111', '0', null, null);
INSERT INTO `sk_address` VALUES ('27', '丁远', '15538195260', null, '88', '河南省郑州市', '高新区电子商务产业园', '450001', '0', null, null);
INSERT INTO `sk_address` VALUES ('28', '李旭冉', '15864866654', null, '89', '河南省郑州市高新区', '科学大道云和数据', '475500', '1', null, null);
INSERT INTO `sk_address` VALUES ('29', '刘俊鹏', '13564964568', null, '89', '河南省开封市', '河南大学', '475511', '0', null, null);
INSERT INTO `sk_address` VALUES ('30', '11', '13148201513', null, '33', '北京市北京市西城区', '111', null, '0', null, null);
INSERT INTO `sk_address` VALUES ('31', '11', '13148201513', null, '33', '北京市北京市西城区', '111', null, '1', null, null);
INSERT INTO `sk_address` VALUES ('32', 'lixuran', '15516723876', null, '29', '广东省云浮市郁南县', '32号', null, '0', null, null);
INSERT INTO `sk_address` VALUES ('36', '李旭冉1', '15516566583', '', '91', '江苏淮安淮安市', '科学大道', '475500', '1', '', null);

-- ----------------------------
-- Table structure for `sk_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sk_admin`;
CREATE TABLE `sk_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(15) DEFAULT NULL,
  `loginnums` int(10) unsigned DEFAULT '1' COMMENT '数据库登录次数比实际登录次数多1',
  `regdate` int(10) unsigned DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_admin
-- ----------------------------
INSERT INTO `sk_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1480672692', '192.168.4.55', '326', '1478482991');
INSERT INTO `sk_admin` VALUES ('47', 'lixuran', 'd41d8cd98f00b204e9800998ecf8427e', null, null, '0', '1478783046');
INSERT INTO `sk_admin` VALUES ('48', 'shiyong', 'd41d8cd98f00b204e9800998ecf8427e', '1478783318', '127.0.0.1', '1', '1478783308');
INSERT INTO `sk_admin` VALUES ('51', 'a1111', 'e0754b3d0bd14501c88a993b2235c331', null, null, '1', '1480335926');
INSERT INTO `sk_admin` VALUES ('52', 'aaaa', 'd41d8cd98f00b204e9800998ecf8427e', null, null, '1', '1480336567');
INSERT INTO `sk_admin` VALUES ('55', 'ceshiaaa', 'd41d8cd98f00b204e9800998ecf8427e', '1480499257', '172.16.17.100', '2', '1480499246');
INSERT INTO `sk_admin` VALUES ('56', 'test', 'e358efa489f58062f10dd7316b65649e', '1480670908', '192.168.4.55', '2', '1480670889');
INSERT INTO `sk_admin` VALUES ('57', 'ceshi1', '9464c3798239e316379036767f0ff7d1', '1480672679', '192.168.4.55', '2', '1480672666');

-- ----------------------------
-- Table structure for `sk_advertising`
-- ----------------------------
DROP TABLE IF EXISTS `sk_advertising`;
CREATE TABLE `sk_advertising` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `createtime` int(100) unsigned NOT NULL,
  `details` varchar(1000) NOT NULL COMMENT '商品描述',
  `sale` int(100) unsigned DEFAULT NULL COMMENT '广告位售价',
  `status` enum('禁用','可用') DEFAULT '禁用' COMMENT '1为禁用，0为可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_advertising
-- ----------------------------
INSERT INTO `sk_advertising` VALUES ('30', '新年广告', '首页', '58252008b4d19.jpg', 'https://www.tmall.com', '1478828040', '                        过年了，买年货啦！！！                    ', '40000', '可用');
INSERT INTO `sk_advertising` VALUES ('31', '年货节广告', '频道页', '58251ffd2d28c.jpg', 'www.yunhe.com', '1479104071', '                        年货年货。                    ', '16000000', '可用');
INSERT INTO `sk_advertising` VALUES ('32', '马云又赚钱了', '首页', '58251fe518123.jpg', 'https://www.taobao.com', '1479103625', '                                                双11剁手节来了。                                        ', '100000', '禁用');
INSERT INTO `sk_advertising` VALUES ('34', '衣服广告', '首页', '582913adc2eb5.jpg', 'www.baidu.com', '1480589630', '                                                                                                                                                                        衣服banner                                                                                                                                            ', '20000000', '禁用');
INSERT INTO `sk_advertising` VALUES ('35', '鞋子广告', '首页', '582913fbc4279.jpg', 'https://www.shop.com', '1480671095', '                                                                                                                                                                        鞋子                                                                                                                                            ', '18100000', '禁用');
INSERT INTO `sk_advertising` VALUES ('36', '包', '3F', '58291455467fe.jpg', 'www.taobao.com', '1479103632', '                        包                    ', '400', '可用');
INSERT INTO `sk_advertising` VALUES ('37', '包', '3F', '5829148a8214b.jpg', 'www.taobao.com', '1479727636', '                                                包                                        ', '400', '可用');
INSERT INTO `sk_advertising` VALUES ('38', '包', '3F', '582914bb6f7a2.jpg', 'www.taobao.com', '1479103651', '                        包                    ', '400', '可用');
INSERT INTO `sk_advertising` VALUES ('39', '包', '3F', '582914edd05f4.jpg', 'www.taobao.com', '1479103662', '                        包                    ', '400', '可用');
INSERT INTO `sk_advertising` VALUES ('40', '衣服', '1F', '58291528a5268.jpg', 'www.jd.com', '1479104159', '                                                                        衣服                                                            ', '500', '可用');
INSERT INTO `sk_advertising` VALUES ('41', '衣服', '1F', '58291556deecc.jpg', 'www.jd.com', '1479103696', '                        衣服                    ', '500', '可用');
INSERT INTO `sk_advertising` VALUES ('42', '衣服', '1F', '582915880132c.jpg', 'www.jd.com', '1479094324', '                        衣服                    ', '50', '可用');
INSERT INTO `sk_advertising` VALUES ('43', '鞋', '2F', '582915e665e1c.jpg', 'www.tianmao.com', '1479103709', '                        鞋                    ', '600', '可用');
INSERT INTO `sk_advertising` VALUES ('44', '鞋', '2F', '582916185a20d.jpg', 'www.tianmao.com', '1479103722', '                        鞋                    ', '400', '可用');
INSERT INTO `sk_advertising` VALUES ('45', '鞋', '2F', '5829164467705.jpg', 'www.tianmao.com', '1479103737', '                        鞋                    ', '600', '可用');
INSERT INTO `sk_advertising` VALUES ('46', '珠宝', '4F', '5829167c41667.jpg', 'www.xxx.com', '1479094368', '                        珠宝                    ', '10', '可用');
INSERT INTO `sk_advertising` VALUES ('47', '珠宝', '4F', '582916a97be4b.jpg', 'www.xxx.com', '1479103745', '                        珠宝&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;                    ', '100', '可用');
INSERT INTO `sk_advertising` VALUES ('48', '珠宝', '4F', '582916d54033a.jpg', 'www.xxx.com', '1479103757', '                        珠宝                    ', '100', '可用');
INSERT INTO `sk_advertising` VALUES ('51', '护肤广告', '首页', '582953984aadd.jpg', 'https://www.shop.com', '1479103589', '                                                                                                                        女性护肤                                                                                                    ', '2000000', '可用');
INSERT INTO `sk_advertising` VALUES ('52', '皮包广告', '首页', '5829559591c17.jpg', 'https://www.shop.com', '1479116370', '                        包                    ', '1800000', '可用');
INSERT INTO `sk_advertising` VALUES ('54', 'aa', '2F', '583e49c14f1bc.png', 'www.ok.com', '1480477121', 'aa', '123', '禁用');
INSERT INTO `sk_advertising` VALUES ('59', 'test', '1F', '58413fd296b5d.jpg', 'www.shop.com', '1480671186', 'teast', '44444', '可用');

-- ----------------------------
-- Table structure for `sk_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `sk_auth_group`;
CREATE TABLE `sk_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `rules` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_auth_group
-- ----------------------------
INSERT INTO `sk_auth_group` VALUES ('14', '超级管理员', '1', '13,23,24,25,26,14,30,31,32,33,15,34,35,16,38,39,17,40,41,42,18,43,19,44,20,45,46,21,47,48,49,50,51,22,52,53');
INSERT INTO `sk_auth_group` VALUES ('15', '系统管理员', '1', '9,11,10,12');
INSERT INTO `sk_auth_group` VALUES ('16', '分类管理员', '1', '15,34,35');
INSERT INTO `sk_auth_group` VALUES ('17', '权限管理员', '1', '14,30,31,32,33');
INSERT INTO `sk_auth_group` VALUES ('18', '品牌管理员', '1', '16,38,39');
INSERT INTO `sk_auth_group` VALUES ('19', '活动管理员', '1', '18,43');
INSERT INTO `sk_auth_group` VALUES ('20', '会员管理员', '1', '20,45,46');

-- ----------------------------
-- Table structure for `sk_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `sk_auth_group_access`;
CREATE TABLE `sk_auth_group_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_auth_group_access
-- ----------------------------
INSERT INTO `sk_auth_group_access` VALUES ('1', '1', '11');
INSERT INTO `sk_auth_group_access` VALUES ('2', '47', '11');
INSERT INTO `sk_auth_group_access` VALUES ('3', '48', '11');
INSERT INTO `sk_auth_group_access` VALUES ('4', '1', '12');
INSERT INTO `sk_auth_group_access` VALUES ('5', '47', '12');
INSERT INTO `sk_auth_group_access` VALUES ('6', '48', '12');
INSERT INTO `sk_auth_group_access` VALUES ('7', '1', '14');
INSERT INTO `sk_auth_group_access` VALUES ('17', '51', '1');
INSERT INTO `sk_auth_group_access` VALUES ('19', '51', '15');
INSERT INTO `sk_auth_group_access` VALUES ('31', '52', '18');
INSERT INTO `sk_auth_group_access` VALUES ('32', '1', '15');
INSERT INTO `sk_auth_group_access` VALUES ('34', '48', '15');
INSERT INTO `sk_auth_group_access` VALUES ('38', '52', '14');
INSERT INTO `sk_auth_group_access` VALUES ('40', '53', '18');
INSERT INTO `sk_auth_group_access` VALUES ('41', '54', '18');
INSERT INTO `sk_auth_group_access` VALUES ('42', '55', '17');
INSERT INTO `sk_auth_group_access` VALUES ('43', '56', '18');
INSERT INTO `sk_auth_group_access` VALUES ('44', '57', '16');

-- ----------------------------
-- Table structure for `sk_auth_nev`
-- ----------------------------
DROP TABLE IF EXISTS `sk_auth_nev`;
CREATE TABLE `sk_auth_nev` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_auth_nev
-- ----------------------------
INSERT INTO `sk_auth_nev` VALUES ('14', '管理员管理', 'Admin/Role', '0', '14', '100');
INSERT INTO `sk_auth_nev` VALUES ('15', '权限管理', 'Admin/Rule', '0', '15', '200');
INSERT INTO `sk_auth_nev` VALUES ('16', '分类管理', 'Admin/Category', '0', '16', '300');
INSERT INTO `sk_auth_nev` VALUES ('17', '品牌管理', 'Admin/Brand', '0', '17', '400');
INSERT INTO `sk_auth_nev` VALUES ('18', '商品管理', 'Admin/Goods', '0', '18', '500');
INSERT INTO `sk_auth_nev` VALUES ('19', '活动管理', 'Admin/Active', '0', '19', '600');
INSERT INTO `sk_auth_nev` VALUES ('20', '评价管理', 'Admin/pingjia', '0', '20', '700');
INSERT INTO `sk_auth_nev` VALUES ('21', '会员管理', 'Admin/Member', '0', '21', '800');
INSERT INTO `sk_auth_nev` VALUES ('22', '订单管理', 'Admin/Order', '0', '22', '900');
INSERT INTO `sk_auth_nev` VALUES ('23', '广告管理', 'Admin/Advertising', '0', '23', '1000');
INSERT INTO `sk_auth_nev` VALUES ('24', '管理员列表', 'Admin/Role/roleList', '14', '14,24', '101');
INSERT INTO `sk_auth_nev` VALUES ('25', '添加管理员', 'Admin/Role/add_role', '14', '14,25', '102');
INSERT INTO `sk_auth_nev` VALUES ('29', '菜单列表', 'Admin/Nev/nevList', '14', '14,29', '103');
INSERT INTO `sk_auth_nev` VALUES ('30', '添加菜单', 'Admin/Nev/addNev', '14', '14,30', '104');
INSERT INTO `sk_auth_nev` VALUES ('31', '权限列表', 'Admin/Rule/ruleList', '15', '15,31', '201');
INSERT INTO `sk_auth_nev` VALUES ('32', '添加权限', 'Admin/Rule/addRule', '15', '15,32', '202');
INSERT INTO `sk_auth_nev` VALUES ('33', '分类列表', 'Admin/Category/cateList', '16', '16,33', '301');
INSERT INTO `sk_auth_nev` VALUES ('34', '添加分类', 'Admin/Category/add', '16', '16,34', '302');
INSERT INTO `sk_auth_nev` VALUES ('38', '品牌列表', 'Admin/Brand/show', '17', '17,38', '403');
INSERT INTO `sk_auth_nev` VALUES ('39', '添加品牌', 'Admin/Brand/add', '17', '17,39', '402');
INSERT INTO `sk_auth_nev` VALUES ('40', '商品列表', 'Admin/Goods/goodsList', '18', '18,40', '501');
INSERT INTO `sk_auth_nev` VALUES ('41', '添加商品', 'Admin/Goods/add_goods', '18', '18,41', '502');
INSERT INTO `sk_auth_nev` VALUES ('42', '商品回收站', 'Admin/Goods/goodsList', '18', '18,42', '503');
INSERT INTO `sk_auth_nev` VALUES ('43', '活动商品', 'Admin/Active/ActiveList', '19', '19,43', '601');
INSERT INTO `sk_auth_nev` VALUES ('44', '评价列表', 'Admin/pingjia/pingjiaList', '20', '20,44', '701');
INSERT INTO `sk_auth_nev` VALUES ('45', '会员列表', 'Admin/Member/member', '21', '21,45', '801');
INSERT INTO `sk_auth_nev` VALUES ('46', '添加会员', 'Admin/Member/add', '21', '21,46', '802');
INSERT INTO `sk_auth_nev` VALUES ('47', '全部订单', 'Admin/Order/orderList/status/0', '22', '22,47', '901');
INSERT INTO `sk_auth_nev` VALUES ('48', '未付款订单', 'Admin/Order/orderList/status/1', '22', '22,48', '902');
INSERT INTO `sk_auth_nev` VALUES ('49', '等待发货订单', 'Admin/Order/orderList/status/2', '22', '22,49', '903');
INSERT INTO `sk_auth_nev` VALUES ('50', '已发货订单', 'Admin/Order/orderList/status/3', '22', '22,50', '904');
INSERT INTO `sk_auth_nev` VALUES ('51', '已完成订单', 'Admin/Order/orderList/status/4', '22', '22,51', '905');
INSERT INTO `sk_auth_nev` VALUES ('52', '广告列表', 'Admin/Advertising/advertising', '23', '23,52', '1001');
INSERT INTO `sk_auth_nev` VALUES ('53', '添加广告', 'Admin/Advertising/add', '23', '23,53', '1002');
INSERT INTO `sk_auth_nev` VALUES ('54', '管理组列表', 'Admin/Group/groupList', '15', '15,54', '203');
INSERT INTO `sk_auth_nev` VALUES ('55', '添加管理组', 'Admin/Group/groupList', '15', '15,55', '204');

-- ----------------------------
-- Table structure for `sk_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `sk_auth_rule`;
CREATE TABLE `sk_auth_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_auth_rule
-- ----------------------------
INSERT INTO `sk_auth_rule` VALUES ('13', 'Admin/Role', '管理员管理', '1', '1', null, '0', '13');
INSERT INTO `sk_auth_rule` VALUES ('14', 'Admin/Rule', '权限管理', '1', '1', null, '0', '14');
INSERT INTO `sk_auth_rule` VALUES ('15', 'Admin/Category', '分类管理', '1', '1', null, '0', '15');
INSERT INTO `sk_auth_rule` VALUES ('16', 'Admin/Brand', '品牌管理', '1', '1', null, '0', '16');
INSERT INTO `sk_auth_rule` VALUES ('17', 'Admin/Goods', '商品管理', '1', '1', null, '0', '17');
INSERT INTO `sk_auth_rule` VALUES ('18', 'Admin/Active', '活动管理', '1', '1', null, '0', '18');
INSERT INTO `sk_auth_rule` VALUES ('19', 'Admin/pingjia', '评价管理', '1', '1', null, '0', '19');
INSERT INTO `sk_auth_rule` VALUES ('20', 'Admin/Member', '会员管理', '1', '1', null, '0', '20');
INSERT INTO `sk_auth_rule` VALUES ('21', 'Admin/Order', '订单管理', '1', '1', null, '0', '21');
INSERT INTO `sk_auth_rule` VALUES ('22', 'Admin/Advertising', '广告管理', '1', '1', null, '0', '22');
INSERT INTO `sk_auth_rule` VALUES ('23', 'Admin/Role/roleList', '管理员列表', '1', '1', null, '13', '13,23');
INSERT INTO `sk_auth_rule` VALUES ('24', 'Admin/Role/add_role', '添加管理员', '1', '1', null, '13', '13,24');
INSERT INTO `sk_auth_rule` VALUES ('25', 'Admin/Nev/nevList', '菜单列表', '1', '1', null, '13', '13,25');
INSERT INTO `sk_auth_rule` VALUES ('26', 'Admin/Nev/addNev', '添加菜单', '1', '1', null, '13', '13,26');
INSERT INTO `sk_auth_rule` VALUES ('30', 'Admin/Rule/ruleList', '权限列表', '1', '1', null, '14', '14,30');
INSERT INTO `sk_auth_rule` VALUES ('31', 'Admin/Rule/addRule', '添加权限', '1', '1', null, '14', '14,31');
INSERT INTO `sk_auth_rule` VALUES ('32', 'Admin/Group/groupList', '管理组列表', '1', '1', null, '14', '14,32');
INSERT INTO `sk_auth_rule` VALUES ('33', 'Admin/Group/groupList', '添加管理组', '1', '1', null, '14', '14,33');
INSERT INTO `sk_auth_rule` VALUES ('34', 'Admin/Category/cateList', '分类列表', '1', '1', null, '15', '15,34');
INSERT INTO `sk_auth_rule` VALUES ('35', 'Admin/Category/add', '添加分类', '1', '1', null, '15', '15,35');
INSERT INTO `sk_auth_rule` VALUES ('38', 'Admin/Brand/show', '品牌列表', '1', '1', null, '16', '16,38');
INSERT INTO `sk_auth_rule` VALUES ('39', 'Admin/Brand/add', '添加品牌', '1', '1', null, '16', '16,39');
INSERT INTO `sk_auth_rule` VALUES ('40', 'Admin/Goods/goodsList', '商品列表', '1', '1', null, '17', '17,40');
INSERT INTO `sk_auth_rule` VALUES ('41', 'Admin/Goods/add_goods', '添加商品', '1', '1', null, '17', '17,41');
INSERT INTO `sk_auth_rule` VALUES ('42', 'Admin/Goods/goodsList', '商品回收站', '1', '1', null, '17', '17,42');
INSERT INTO `sk_auth_rule` VALUES ('43', 'Admin/Active/ActiveList', '活动商品', '1', '1', null, '18', '18,43');
INSERT INTO `sk_auth_rule` VALUES ('44', 'Admin/pingjia/pingjiaList', '评价列表', '1', '1', null, '19', '19,44');
INSERT INTO `sk_auth_rule` VALUES ('45', 'Admin/Member/member', '会员列表', '1', '1', null, '20', '20,45');
INSERT INTO `sk_auth_rule` VALUES ('46', 'Admin/Member/add', '添加会员', '1', '1', null, '20', '20,46');
INSERT INTO `sk_auth_rule` VALUES ('47', 'Admin/Order/orderList/status/0', '全部订单', '1', '1', null, '21', '21,47');
INSERT INTO `sk_auth_rule` VALUES ('48', 'Admin/Order/orderList/status/1', '未付款订单', '1', '1', null, '21', '21,48');
INSERT INTO `sk_auth_rule` VALUES ('49', 'Admin/Order/orderList/status/2', '等待发货订单', '1', '1', null, '21', '21,49');
INSERT INTO `sk_auth_rule` VALUES ('50', 'Admin/Order/orderList/status/3', '已发货订单', '1', '1', null, '21', '21,50');
INSERT INTO `sk_auth_rule` VALUES ('51', 'Admin/Order/orderList/status/4', '已完成订单', '1', '1', null, '21', '21,51');
INSERT INTO `sk_auth_rule` VALUES ('52', 'Admin/Advertising/advertising', '广告列表', '1', '1', null, '22', '22,52');
INSERT INTO `sk_auth_rule` VALUES ('53', 'Admin/Advertising/add', '添加广告', '1', '1', null, '22', '22,53');
INSERT INTO `sk_auth_rule` VALUES ('54', 'Admin/Role/delete', '管理员删除', '1', '1', null, '13', '13,54');
INSERT INTO `sk_auth_rule` VALUES ('55', 'add', 'aa', '1', '1', null, '23', '13,23,55');

-- ----------------------------
-- Table structure for `sk_brands`
-- ----------------------------
DROP TABLE IF EXISTS `sk_brands`;
CREATE TABLE `sk_brands` (
  `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `bname` varchar(30) NOT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '1为男装，2为女装，3为国内，4为国外',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '品牌添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_brands
-- ----------------------------
INSERT INTO `sk_brands` VALUES ('8', 'VANS', '58231edb89664.jpg', 'www.b.com', '正品国际大牌VANS，你这得拥有！', '1', '1478003678');
INSERT INTO `sk_brands` VALUES ('25', 'CROCS', '58231f0a8bc3d.jpg', 'www.c.com', '正品国际大牌CROCS，你这得拥有！', '1', '1478003724');
INSERT INTO `sk_brands` VALUES ('26', 'SPALDING', '58231f23e346f.jpg', 'www.d.com', '你这得拥有!', '2', '1478003767');
INSERT INTO `sk_brands` VALUES ('27', 'UMBRO', '5823cc3af3e1b.jpg', 'www.e.com', '正品国际大牌UMBRO，你这得拥有！', '4', '1478003809');
INSERT INTO `sk_brands` VALUES ('28', 'YDNEX', '58231f2fde8fc.jpg', 'WWW.F.COM', '正品国际大牌YDNEX，你这得拥有！', '1', '1478003862');
INSERT INTO `sk_brands` VALUES ('29', 'SATR', '583d1ad884bb1.jpg', 'www.g.com', '正品国际大牌PUMA，你这得拥有！', '1', '1478003920');
INSERT INTO `sk_brands` VALUES ('30', '李宁', '58231f4916b7d.jpg', 'www.sohu.com', '正品国际大牌PUMA，你这得拥有！', '1', '1478003972');
INSERT INTO `sk_brands` VALUES ('32', 'adidas', '581c741326d4b.png', 'www.i.com', '正品国际大牌PUMA，你这得拥有！', '1', '1478004035');
INSERT INTO `sk_brands` VALUES ('33', 'OZARK', '581c74583f7a3.png', 'www.Ii.com', '正品国际大牌，你这得拥有！', '2', '1478004071');
INSERT INTO `sk_brands` VALUES ('34', 'ZOKE', '581c7467189f4.png', 'WWW.L.COM', '正品国际大牌，你这得拥有！', '2', '1478004129');
INSERT INTO `sk_brands` VALUES ('35', 'EXR', '581c747a2a777.jpg', 'www.cc.com', '正品国际大牌P，你这得拥有！', '2', '1478004158');
INSERT INTO `sk_brands` VALUES ('36', 'AWED', '582412b3e013c.jpg', 'www.cd.com', '正品国际大牌PUMA，你这得拥有！', '2', '1478004184');
INSERT INTO `sk_brands` VALUES ('37', 'ASDFD', '583d1b82f2001.jpg', 'www.cf.com', '正品国际大牌PUMA，你这得拥有！', '2', '1478004207');
INSERT INTO `sk_brands` VALUES ('38', 'ASD', '581c74b686214.png', 'www.cf.com', '正品国际大牌PUMA，你这得拥有！', '2', '1478004219');
INSERT INTO `sk_brands` VALUES ('39', 'ASDFF', '583d263bc0c4b.jpg', 'www.cf.com', '正品国际大牌PUMA，你这得拥有！', '2', '1478004232');
INSERT INTO `sk_brands` VALUES ('40', 'DFDFG', '583d25829ae69.gif', 'www.cG.com', '正品国际大牌PUMA，你这得拥有！', '2', '1478004273');
INSERT INTO `sk_brands` VALUES ('42', 'adidas', '58231f8daa679.jpg', 'www.cdd.com', '正品国际大牌，你这得拥有！', '1', '1478004325');
INSERT INTO `sk_brands` VALUES ('43', 'JUST DOIL', '582417401b718.jpg', 'www.cdd.com', '正品国际大牌，你这得拥有！', '2', '1478004343');
INSERT INTO `sk_brands` VALUES ('44', 'SFG', '581c751b49c4f.png', 'www.cdd.com', '正品国际大牌，你这得拥有！', '1', '1478004358');
INSERT INTO `sk_brands` VALUES ('45', 'SFG', '584144153b352.png', 'www.cdd.com', '正品国外大牌，你这得拥有！', '1', '1478004419');
INSERT INTO `sk_brands` VALUES ('46', 'SFGdd', '583d1c9022d0d.jpg', 'www.ccdd.com', '正品国外大牌，你这得拥有！', '3', '1478004440');
INSERT INTO `sk_brands` VALUES ('47', 'SFGdd', '5823cade9db7e.jpg', 'www.ccdd.com', '正品国外大牌，你这得拥有！', '3', '1478004715');
INSERT INTO `sk_brands` VALUES ('48', 'erke', '58231fba0b999.jpg', 'www.dd.com', '正品国外大牌，你这得拥有！', '3', '1478004732');
INSERT INTO `sk_brands` VALUES ('49', 'STARR', '581c757224686.png', 'www.Vd.com', '正品国外大牌，你这得拥有！', '3', '1478004757');
INSERT INTO `sk_brands` VALUES ('50', 'VANS', '581c75825d07f.png', 'www.blb.con', '正品国际大牌PUMA，你这得拥有！', '4', '1478004793');
INSERT INTO `sk_brands` VALUES ('51', '花戴斯', '583d1c19d840a.jpg', 'www.blkb.con', '正品国际大牌PUMA，你这得拥有！', '3', '1478004833');
INSERT INTO `sk_brands` VALUES ('52', '浦克', '581c759cc6617.png', 'www.rb.con', '正品国际大牌PUMA，你这得拥有！', '3', '1478004862');
INSERT INTO `sk_brands` VALUES ('53', 'LJS', '583d1d5913442.jpg', 'www.rgb.con', '正品国际大牌PUMA，你这得拥有！', '4', '1478004882');
INSERT INTO `sk_brands` VALUES ('54', 'LDG', '5823c904310ad.jpg', 'www.rgLb.con', '正品国际大牌PUMA，你这得拥有！', '4', '1478004899');
INSERT INTO `sk_brands` VALUES ('55', 'minu', '5823cbaf5475f.jpg', 'www.rgffLb.con', '正品国际大牌PUMA，你这得拥有！', '4', '1478004915');
INSERT INTO `sk_brands` VALUES ('56', 'LINING', '581c75cf79f0a.png', 'www.rliLb.con', '正品国际大牌PUMA，你这得拥有！', '4', '1478004943');
INSERT INTO `sk_brands` VALUES ('57', '雅鹿', '583d1db009281.jpg', 'www.yalu.con', '正品国际大牌，你这得拥有！', '4', '1478005315');
INSERT INTO `sk_brands` VALUES ('58', 'EDWIN', '581c75e6f1e59.png', 'www.ed.con', '正品国际大牌，你这得拥有！', '3', '1478005343');
INSERT INTO `sk_brands` VALUES ('59', '尚秀', '5823ca2dac94e.jpg', 'www.ed.con', '正品国际大牌，你这得拥有！', '4', '1478005364');
INSERT INTO `sk_brands` VALUES ('60', '雅戈尔', '581c75fae9a17.jpg', 'www.ed.con', '正品国际大牌，你这得拥有！', '4', '1478005404');
INSERT INTO `sk_brands` VALUES ('61', '波司登', '583d1ea665f5d.jpg', 'www.ed.con', '正品国际大牌，你这得拥有！', '3', '1478005423');
INSERT INTO `sk_brands` VALUES ('62', '阿迪达斯', '5823ca8316682.jpg', 'www.ad.con', '正品国际大牌，你这得拥有！', '3', '1478005471');
INSERT INTO `sk_brands` VALUES ('63', '劲霸', '5823cbd05d391.jpg', 'www.jinba.con', '正品国际大牌，你这得拥有！', '4', '1478005499');
INSERT INTO `sk_brands` VALUES ('64', 'sellys', '5823caa4de190.jpg', 'www.sy.con', '正品国际大牌，你这得拥有！', '3', '1478005528');
INSERT INTO `sk_brands` VALUES ('68', 'GNZA', '583d27f98f06b.jpg', 'www.w.com', '正品大牌', '3', '1480402937');
INSERT INTO `sk_brands` VALUES ('69', 'OZARK', '583d3ab186d5c.jpg', 'www.oo.com', '正品，值得拥有', '3', '1480407729');
INSERT INTO `sk_brands` VALUES ('70', 'HERMES', '583d3cd96b656.jpg', 'WWW.WW.COM', '国际品牌，你值得拥有！', '4', '1480408031');
INSERT INTO `sk_brands` VALUES ('71', 'END', '583d3dc7b9625.jpg', 'www.en.com', '你值得拥有！', '4', '1480408519');
INSERT INTO `sk_brands` VALUES ('72', 'AILEND', '583d404cd3de5.jpg', 'www.cc.com', '正品大牌，值得拥有', '1', '1480409029');
INSERT INTO `sk_brands` VALUES ('73', 'HUAJIN', '583d40b8987fd.jpg', 'www.hj.com', '正品大牌，你值得拥有！', '3', '1480409272');
INSERT INTO `sk_brands` VALUES ('74', '22', '583d5c8c29f37.jpg', '22', '22', '1', '1480416396');

-- ----------------------------
-- Table structure for `sk_cart`
-- ----------------------------
DROP TABLE IF EXISTS `sk_cart`;
CREATE TABLE `sk_cart` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `gid` int(5) NOT NULL,
  `buynum` int(5) NOT NULL,
  `addtime` varchar(20) NOT NULL COMMENT '加入购物车的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_cart
-- ----------------------------
INSERT INTO `sk_cart` VALUES ('6', '64', '268', '1', '1479991102');
INSERT INTO `sk_cart` VALUES ('174', '88', '240', '2', '1480326457');
INSERT INTO `sk_cart` VALUES ('175', '88', '226', '2', '1480326464');
INSERT INTO `sk_cart` VALUES ('182', '89', '255', '1', '1480339403');
INSERT INTO `sk_cart` VALUES ('362', '33', '286', '2', '1480496121');
INSERT INTO `sk_cart` VALUES ('387', '92', '287', '1', '1480591744');
INSERT INTO `sk_cart` VALUES ('388', '92', '286', '1', '1480591745');
INSERT INTO `sk_cart` VALUES ('389', '92', '285', '1', '1480591746');
INSERT INTO `sk_cart` VALUES ('390', '92', '241', '1', '1480591747');
INSERT INTO `sk_cart` VALUES ('391', '33', '236', '1', '1480593228');

-- ----------------------------
-- Table structure for `sk_category`
-- ----------------------------
DROP TABLE IF EXISTS `sk_category`;
CREATE TABLE `sk_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(200) NOT NULL,
  `pid` int(10) NOT NULL,
  `path` varchar(50) DEFAULT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_category
-- ----------------------------
INSERT INTO `sk_category` VALUES ('1', '男装', '0', '1', '1');
INSERT INTO `sk_category` VALUES ('2', '女装', '0', '2', '1');
INSERT INTO `sk_category` VALUES ('3', '男鞋', '0', '3', '1');
INSERT INTO `sk_category` VALUES ('4', '女鞋', '0', '4', '1');
INSERT INTO `sk_category` VALUES ('5', '箱包', '0', '5', '0');
INSERT INTO `sk_category` VALUES ('6', '配饰', '0', '6', '1');
INSERT INTO `sk_category` VALUES ('7', '外套', '1', '1,7', '0');
INSERT INTO `sk_category` VALUES ('8', '衬衣', '1', '1,8', '1');
INSERT INTO `sk_category` VALUES ('9', 'POLO衫', '1', '1,9', '0');
INSERT INTO `sk_category` VALUES ('10', '针织衫', '1', '1,10', '1');
INSERT INTO `sk_category` VALUES ('11', '裤子', '1', '1,11', '1');
INSERT INTO `sk_category` VALUES ('12', '外套', '2', '2,12', '1');
INSERT INTO `sk_category` VALUES ('13', '绒衫', '2', '2,13', '1');
INSERT INTO `sk_category` VALUES ('14', '针织衫', '2', '2,14', '1');
INSERT INTO `sk_category` VALUES ('15', '裤子', '2', '2,15', '1');
INSERT INTO `sk_category` VALUES ('16', '裙子', '2', '2,16', '1');
INSERT INTO `sk_category` VALUES ('17', '运动鞋', '3', '3,17', '1');
INSERT INTO `sk_category` VALUES ('18', '休闲鞋', '3', '3,18', '1');
INSERT INTO `sk_category` VALUES ('19', '皮鞋', '3', '3,19', '1');
INSERT INTO `sk_category` VALUES ('21', '布鞋', '3', '3,21', '0');
INSERT INTO `sk_category` VALUES ('22', '单鞋', '4', '4,22', '1');
INSERT INTO `sk_category` VALUES ('23', '休闲鞋', '4', '4,23', '1');
INSERT INTO `sk_category` VALUES ('24', '运动鞋', '4', '4,24', '0');
INSERT INTO `sk_category` VALUES ('25', '凉鞋', '4', '4,25', '1');
INSERT INTO `sk_category` VALUES ('26', '靴子', '4', '4,26', '1');
INSERT INTO `sk_category` VALUES ('27', '单肩包', '5', '5,27', '1');
INSERT INTO `sk_category` VALUES ('28', '手提包', '5', '5,28', '1');
INSERT INTO `sk_category` VALUES ('29', '斜挎包', '5', '5,29', '1');
INSERT INTO `sk_category` VALUES ('30', '双肩包', '5', '5,30', '1');
INSERT INTO `sk_category` VALUES ('31', '钱包/卡包', '5', '5,31', '1');
INSERT INTO `sk_category` VALUES ('32', '佛珠精品', '6', '6,32', '1');
INSERT INTO `sk_category` VALUES ('33', '翡翠饰品', '6', '6,33', '1');
INSERT INTO `sk_category` VALUES ('34', '珍珠饰品', '6', '6,34', '1');
INSERT INTO `sk_category` VALUES ('35', '水晶饰品', '6', '6,35', '0');
INSERT INTO `sk_category` VALUES ('36', '纯银饰品', '6', '6,36', '1');
INSERT INTO `sk_category` VALUES ('37', '羽绒服', '7', '1,7,37', '1');
INSERT INTO `sk_category` VALUES ('38', '风衣', '7', '1,7,38', '1');
INSERT INTO `sk_category` VALUES ('39', '西服', '7', '1,7,39', '1');
INSERT INTO `sk_category` VALUES ('40', '夹克', '7', '1,7,40', '1');
INSERT INTO `sk_category` VALUES ('41', '大衣', '7', '1,7,41', '1');
INSERT INTO `sk_category` VALUES ('42', '皮草外套', '12', '2,12,42', '1');
INSERT INTO `sk_category` VALUES ('43', '马甲', '12', '2,12,43', '1');
INSERT INTO `sk_category` VALUES ('44', '沉香佛珠', '32', '6,32,44', '1');
INSERT INTO `sk_category` VALUES ('45', '菩提佛珠', '32', '6,32,45', '1');
INSERT INTO `sk_category` VALUES ('46', '翡翠吊坠', '33', '6,33,46', '0');
INSERT INTO `sk_category` VALUES ('47', '翡翠手镯', '33', '6,33,47', '1');
INSERT INTO `sk_category` VALUES ('48', '珍珠项链', '34', '6,34,48', '0');
INSERT INTO `sk_category` VALUES ('49', '珍珠手链', '35', '6,35,49', '1');
INSERT INTO `sk_category` VALUES ('50', '羽绒服', '12', '2,12,50', '1');
INSERT INTO `sk_category` VALUES ('51', '大衣', '12', '2,12,51', '1');
INSERT INTO `sk_category` VALUES ('52', '夹克', '12', '2,12,52', '1');
INSERT INTO `sk_category` VALUES ('53', '毛呢大衣', '12', '2,12,53', '1');
INSERT INTO `sk_category` VALUES ('54', '长袖绒衫', '13', '2,13,54', '1');
INSERT INTO `sk_category` VALUES ('55', '长袖针织衫', '14', '2,14,55', '1');
INSERT INTO `sk_category` VALUES ('56', '短袖针织衫', '14', '2,14,56', '1');
INSERT INTO `sk_category` VALUES ('57', '毛衣裙', '14', '2,14,57', '1');
INSERT INTO `sk_category` VALUES ('58', '毛衣', '14', '2,14,58', '0');
INSERT INTO `sk_category` VALUES ('59', '休闲裤', '15', '2,15,59', '1');
INSERT INTO `sk_category` VALUES ('60', '运动裤', '15', '2,15,60', '1');
INSERT INTO `sk_category` VALUES ('61', '连衣裙', '16', '2,16,61', '1');
INSERT INTO `sk_category` VALUES ('62', '半身裙', '16', '2,16,62', '1');
INSERT INTO `sk_category` VALUES ('63', '长袖衬衣', '8', '1,8,63', '1');
INSERT INTO `sk_category` VALUES ('64', '短袖衬衣', '8', '1,8,64', '1');
INSERT INTO `sk_category` VALUES ('65', '长袖POLO衫', '9', '1,9,65', '1');
INSERT INTO `sk_category` VALUES ('66', '短袖POLO衫', '9', '1,9,66', '1');
INSERT INTO `sk_category` VALUES ('67', '针织开衫', '10', '1,10,67', '1');
INSERT INTO `sk_category` VALUES ('68', '西裤', '11', '1,11,68', '1');
INSERT INTO `sk_category` VALUES ('69', '牛仔裤', '11', '1,11,69', '1');
INSERT INTO `sk_category` VALUES ('70', '篮球鞋', '17', '3,17,70', '1');
INSERT INTO `sk_category` VALUES ('71', '网球鞋', '17', '3,17,71', '1');
INSERT INTO `sk_category` VALUES ('72', '跑步鞋', '17', '3,17,72', '1');
INSERT INTO `sk_category` VALUES ('73', '男士休闲鞋', '18', '3,18,73', '1');
INSERT INTO `sk_category` VALUES ('74', '花公子休闲鞋', '18', '3,18,74', '0');
INSERT INTO `sk_category` VALUES ('75', '红蜻蜓皮鞋', '19', '3,19,75', '1');
INSERT INTO `sk_category` VALUES ('76', '奥康皮鞋', '19', '3,19,76', '1');
INSERT INTO `sk_category` VALUES ('77', '男士凉拖', '20', '3,20,77', '1');
INSERT INTO `sk_category` VALUES ('78', '男士棉拖', '20', '3,20,78', '1');
INSERT INTO `sk_category` VALUES ('79', '帆布鞋', '21', '3,21,79', '0');
INSERT INTO `sk_category` VALUES ('80', '软底布鞋', '21', '3,21,80', '0');
INSERT INTO `sk_category` VALUES ('81', '休闲单鞋', '22', '4,22,81', '1');
INSERT INTO `sk_category` VALUES ('82', '运动鞋', '22', '4,22,82', '1');
INSERT INTO `sk_category` VALUES ('83', '软底休闲鞋', '23', '4,23,83', '1');
INSERT INTO `sk_category` VALUES ('84', '篮球鞋', '24', '4,24,84', '0');
INSERT INTO `sk_category` VALUES ('85', '跑步鞋', '24', '4,24,85', '1');
INSERT INTO `sk_category` VALUES ('86', '凉拖', '25', '4,25,86', '1');
INSERT INTO `sk_category` VALUES ('87', '单肩公文包', '27', '5,27,87', '1');
INSERT INTO `sk_category` VALUES ('88', '休闲单肩包', '27', '5,27,88', '1');
INSERT INTO `sk_category` VALUES ('89', '电脑包', '28', '5,28,89', '1');
INSERT INTO `sk_category` VALUES ('90', '休闲斜挎包', '29', '5,29,90', '1');
INSERT INTO `sk_category` VALUES ('91', '双肩旅行包', '30', '5,30,91', '1');
INSERT INTO `sk_category` VALUES ('92', '长款钱包', '31', '5,31,92', '1');
INSERT INTO `sk_category` VALUES ('93', '手镯', '36', '6,36,93', '1');
INSERT INTO `sk_category` VALUES ('94', '项链', '36', '6,36,94', '1');
INSERT INTO `sk_category` VALUES ('95', '棉靴', '26', '4,26,95', '0');
INSERT INTO `sk_category` VALUES ('96', '休闲靴', '26', '4,26,96', '0');
INSERT INTO `sk_category` VALUES ('97', '鳄鱼牌斜跨包aa', '29', '5,29,97', '0');
INSERT INTO `sk_category` VALUES ('98', '休闲手提包', '28', '5,28,98', '1');

-- ----------------------------
-- Table structure for `sk_collect`
-- ----------------------------
DROP TABLE IF EXISTS `sk_collect`;
CREATE TABLE `sk_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `gid` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `coltime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_collect
-- ----------------------------
INSERT INTO `sk_collect` VALUES ('1', '29', '240', '0', '1480221128');
INSERT INTO `sk_collect` VALUES ('2', '29', '239', '0', '1480147912');
INSERT INTO `sk_collect` VALUES ('3', '29', '238', '0', '1480147912');
INSERT INTO `sk_collect` VALUES ('4', '29', '231', '0', '1480480878');
INSERT INTO `sk_collect` VALUES ('5', '29', '234', '0', '1480147914');
INSERT INTO `sk_collect` VALUES ('6', '29', '235', '0', '1480147915');
INSERT INTO `sk_collect` VALUES ('7', '29', '241', '0', '1480147917');
INSERT INTO `sk_collect` VALUES ('8', '29', '236', '0', '1480147918');
INSERT INTO `sk_collect` VALUES ('9', '81', '231', '0', '1480151485');
INSERT INTO `sk_collect` VALUES ('10', '29', '254', '0', '1480154016');
INSERT INTO `sk_collect` VALUES ('11', '33', '235', '1', '1480482036');
INSERT INTO `sk_collect` VALUES ('12', '29', '274', '1', '1480331677');
INSERT INTO `sk_collect` VALUES ('13', '29', '272', '0', '1480216380');
INSERT INTO `sk_collect` VALUES ('14', '33', '252', '0', '1480218130');
INSERT INTO `sk_collect` VALUES ('15', '33', '251', '0', '1480218167');
INSERT INTO `sk_collect` VALUES ('16', '33', '250', '0', '1480218168');
INSERT INTO `sk_collect` VALUES ('17', '33', '253', '0', '1480218170');
INSERT INTO `sk_collect` VALUES ('18', '33', '249', '0', '1480218173');
INSERT INTO `sk_collect` VALUES ('19', '33', '248', '0', '1480218174');
INSERT INTO `sk_collect` VALUES ('20', '33', '247', '0', '1480218174');
INSERT INTO `sk_collect` VALUES ('21', '33', '246', '0', '1480218175');
INSERT INTO `sk_collect` VALUES ('22', '29', '259', '0', '1480222147');
INSERT INTO `sk_collect` VALUES ('23', '33', '241', '0', '1480225513');
INSERT INTO `sk_collect` VALUES ('24', '29', '252', '0', '1480225427');
INSERT INTO `sk_collect` VALUES ('25', '29', '253', '1', '1480225428');
INSERT INTO `sk_collect` VALUES ('26', '29', '251', '0', '1480225429');
INSERT INTO `sk_collect` VALUES ('27', '29', '247', '0', '1480225392');
INSERT INTO `sk_collect` VALUES ('28', '29', '248', '1', '1480225434');
INSERT INTO `sk_collect` VALUES ('29', '29', '250', '0', '1480225429');
INSERT INTO `sk_collect` VALUES ('30', '29', '246', '1', '1480225431');
INSERT INTO `sk_collect` VALUES ('31', '29', '244', '0', '1480225439');
INSERT INTO `sk_collect` VALUES ('32', '29', '245', '1', '1480225440');
INSERT INTO `sk_collect` VALUES ('33', '33', '240', '0', '1480228467');
INSERT INTO `sk_collect` VALUES ('34', '33', '239', '0', '1480228471');
INSERT INTO `sk_collect` VALUES ('35', '33', '238', '0', '1480228476');
INSERT INTO `sk_collect` VALUES ('36', '88', '240', '0', '1480326528');
INSERT INTO `sk_collect` VALUES ('37', '31', '253', '1', '1480336956');
INSERT INTO `sk_collect` VALUES ('38', '89', '230', '0', '1480338611');
INSERT INTO `sk_collect` VALUES ('39', '89', '240', '0', '1480339838');
INSERT INTO `sk_collect` VALUES ('40', '33', '227', '0', '1480413038');
INSERT INTO `sk_collect` VALUES ('41', '29', '233', '1', '1480418221');
INSERT INTO `sk_collect` VALUES ('42', '31', '248', '1', '1480418674');
INSERT INTO `sk_collect` VALUES ('43', '31', '243', '1', '1480467836');
INSERT INTO `sk_collect` VALUES ('44', '33', '281', '1', '1480480239');
INSERT INTO `sk_collect` VALUES ('45', '33', '228', '0', '1480485390');
INSERT INTO `sk_collect` VALUES ('46', '33', '282', '1', '1480480238');
INSERT INTO `sk_collect` VALUES ('47', '33', '280', '1', '1480480239');
INSERT INTO `sk_collect` VALUES ('48', '33', '226', '1', '1480480269');
INSERT INTO `sk_collect` VALUES ('49', '33', '234', '0', '1480482037');
INSERT INTO `sk_collect` VALUES ('50', '33', '231', '0', '1480482038');
INSERT INTO `sk_collect` VALUES ('51', '29', '228', '0', '1480495227');
INSERT INTO `sk_collect` VALUES ('52', '91', '228', '0', '1480496841');
INSERT INTO `sk_collect` VALUES ('53', '91', '227', '0', '1480496841');
INSERT INTO `sk_collect` VALUES ('54', '91', '231', '0', '1480496848');
INSERT INTO `sk_collect` VALUES ('55', '91', '230', '0', '1480496849');
INSERT INTO `sk_collect` VALUES ('56', '31', '228', '0', '1480499087');
INSERT INTO `sk_collect` VALUES ('57', '31', '241', '0', '1480499178');
INSERT INTO `sk_collect` VALUES ('58', '91', '287', '0', '1480590637');
INSERT INTO `sk_collect` VALUES ('59', '91', '238', '0', '1480590639');
INSERT INTO `sk_collect` VALUES ('60', '91', '236', '0', '1480590640');
INSERT INTO `sk_collect` VALUES ('61', '91', '240', '0', '1480590642');
INSERT INTO `sk_collect` VALUES ('62', '91', '226', '0', '1480670670');

-- ----------------------------
-- Table structure for `sk_goods`
-- ----------------------------
DROP TABLE IF EXISTS `sk_goods`;
CREATE TABLE `sk_goods` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(200) NOT NULL,
  `markprice` float(10,2) unsigned DEFAULT NULL,
  `saleprice` float(10,2) unsigned DEFAULT NULL,
  `cid` int(4) unsigned DEFAULT NULL,
  `goodsintro` text,
  `goodsdetail` text,
  `image` varchar(200) DEFAULT NULL,
  `smallimage` varchar(200) DEFAULT NULL,
  `goodspro` varchar(200) DEFAULT NULL,
  `hot_sale` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '1代表热卖,0代表普通',
  `is_active` int(1) DEFAULT '0' COMMENT '0-不参加活动   1表示参加活动',
  `tj` int(1) NOT NULL DEFAULT '0' COMMENT '1代表推荐商品,0代表普通商品',
  `is_show` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '1代表出售,0代表暂不出售',
  `goodsnum` int(4) unsigned DEFAULT '999',
  `salenum` int(4) unsigned DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `bid` int(10) unsigned DEFAULT NULL,
  `isrecycle` enum('1','0') DEFAULT NULL COMMENT '1表示被删除，0表示未被删除',
  `savepath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_goods
-- ----------------------------
INSERT INTO `sk_goods` VALUES ('226', '冬装男士羽绒服外套', '2300.00', '2200.00', '37', '冬装男士棉衣冬季外套男加厚棉服短款青年冬天棉袄学生男装衣服潮', '&lt;span&gt;冬装男士棉衣冬季外套男加厚棉服短款青年冬天棉袄学生男装衣服潮&lt;/span&gt;', '58329355d6e34.jpg,58329355db86d.jpg,58329355dc425.jpg', null, '冬装男士棉衣冬季外套男加厚棉服短款青年冬天棉袄学生男装衣服潮', '0', '0', '0', '1', '299', '1', '1479709526', null, null, '26', null, null);
INSERT INTO `sk_goods` VALUES ('227', '大衣男外套风衣男装', '1099.00', '999.00', '38', '冬季新款男士毛呢大衣男外套韩版修身青年英伦中长款呢子风衣男装1', '冬季新款男士毛呢大衣男外套韩版修身青年英伦中长款呢子风衣男装1', '583293cd1f400.jpg,583293cd203a0.jpg,583293cd21ef9.jpg,583293cd22e99.jpg', null, '冬季新款男士毛呢大衣男外套韩版修身青年英伦中长款呢子风衣男装1', '0', '0', '0', '1', '199', '1', '1479709645', null, null, '27', null, null);
INSERT INTO `sk_goods` VALUES ('228', '男装毛呢大衣风衣', '899.00', '809.00', '38', '冬季新款男士尼子中长款风衣韩版呢子外套青年妮子潮男装毛呢大衣', '冬季新款男士尼子中长款风衣韩版呢子外套青年妮子潮男装毛呢大衣', '5832941a4fef8.jpg,5832941a50e98.jpg,5832941a51e38.jpg', null, '冬季新款男士尼子中长款风衣韩版呢子外套青年妮子潮男装毛呢大衣', '0', '0', '0', '1', '196', '400', '1479709722', null, null, '26', null, null);
INSERT INTO `sk_goods` VALUES ('229', '男装外套羽绒服', '519.00', '500.00', '38', '冬装青年羽绒服男装中长款学生连帽韩版加厚修身时尚大码外套潮男1', '冬装青年羽绒服男装中长款学生连帽韩版加厚修身时尚大码外套潮男1', '5832946f4a494.jpg,5832946f4ac64.jpg,5832946f4b434.jpg', null, '冬装青年羽绒服男装中长款学生连帽韩版加厚修身时尚大码外套潮男1', '0', '0', '0', '1', '99', '1', '1479709807', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('230', '韩版男装西服外套', '2500.00', '2400.00', '39', '2016秋冬休闲西装韩版修身英伦格子小西服男单西青少年男装外套潮', '2016秋冬休闲西装韩版修身英伦格子小西服男单西青少年男装外套潮', '583294dc6571d.jpg,583294dc67275.jpg,583294dc685fe.jpg', null, '2016秋冬休闲西装韩版修身英伦格子小西服男单西青少年男装外套潮', '0', '0', '0', '1', '98', '300', '1479709917', null, null, '26', null, null);
INSERT INTO `sk_goods` VALUES ('231', '男士西服外套商务正装', '2899.00', '2800.00', '39', '男士西服外套单件上衣商务正装职业装修身单西新郎伴郎结婚工作服', '男士西服外套单件上衣商务正装职业装修身单西新郎伴郎结婚工作服', '58329529199c7.jpg,583295291a197.jpg,583295291ad50.jpg,583295291b908.jpg', null, '男士西服外套单件上衣商务正装职业装修身单西新郎伴郎结婚工作服', '0', '0', '0', '1', '197', '200', '1479709993', null, null, '26', null, null);
INSERT INTO `sk_goods` VALUES ('232', '长袖衬衣男士立领衬衫', '299.00', '260.00', '0', '秋季牛津纺长袖白衬衣男士加肥加大码韩版修身立领衬衫男装胖子潮', '秋季牛津纺长袖白衬衣男士加肥加大码韩版修身立领衬衫男装胖子潮', '5832959273f32.jpg,58329592752ba.jpg', null, '秋季牛津纺长袖白衬衣男士加肥加大码韩版修身立领衬衫男装胖子潮', '0', '0', '0', '1', '125', '0', '1479710098', null, null, '28', null, null);
INSERT INTO `sk_goods` VALUES ('233', '男装马夹马甲男士', '399.00', '320.00', '40', '爆款 加厚大码棉马甲男士秋冬款韩版修身青少年情侣马夹学生男装2', '爆款 加厚大码棉马甲男士秋冬款韩版修身青少年情侣马夹学生男装2', '583295ecea282.jpg,583295eceb222.jpg,583295ecec1c2.jpg,583295ececd7a.jpg', null, '爆款 加厚大码棉马甲男士秋冬款韩版修身青少年情侣马夹学生男装2', '0', '0', '0', '1', '348', '100', '1479710189', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('234', '长袖衬衫衬衣男装', '199.00', '150.00', '63', '秋季男士加绒保暖长袖衬衫韩版修身商务纯色加厚正装休闲衬衣男装1', '秋季男士加绒保暖长袖衬衫韩版修身商务纯色加厚正装休闲衬衣男装1', '583296938f38c.jpg,583296939032c.jpg,58329693916b5.jpg', null, '秋季男士加绒保暖长袖衬衫韩版修身商务纯色加厚正装休闲衬衣男装1', '0', '0', '0', '1', '100', '0', '1479710356', null, null, '29', null, null);
INSERT INTO `sk_goods` VALUES ('235', '男士长袖衬衫', '199.00', '189.00', '63', '秋季新款男士长袖衬衫韩版修身印花衬衫男商务加绒青年加厚衬衣潮3', '秋季新款男士长袖衬衫韩版修身印花衬衫男商务加绒青年加厚衬衣潮3', '583296e20278a.jpg,583296e20372a.jpg,583296e2046ca.jpg', null, '秋季新款男士长袖衬衫韩版修身印花衬衫男商务加绒青年加厚衬衣潮3', '0', '1', '0', '1', '99', '1', '1479710434', null, null, '33', null, null);
INSERT INTO `sk_goods` VALUES ('236', '男装T恤商务休闲短袖', '99.00', '90.00', '64', '韩国男装T恤修身商务休闲短袖寸衫代购 2016夏季男士衬衫大码衬衣3', '韩国男装T恤修身商务休闲短袖寸衫代购 2016夏季男士衬衫大码衬衣3', '5832971ab86a7.jpg,5832971aba9d0.jpg,5832971abc528.jpg', null, '韩国男装T恤修身商务休闲短袖寸衫代购 2016夏季男士衬衫大码衬衣3', '0', '0', '0', '1', '49', '1', '1479710491', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('237', '男装男士白色短袖衬衣', '288.00', '199.00', '64', '2016夏季男士白色短袖衬衫韩版修身短袖衬衣商务休闲职业寸衫男装4', '2016夏季男士白色短袖衬衫韩版修身短袖衬衣商务休闲职业寸衫男装4', '5832976b274c6.jpg,5832976b28466.jpg,5832976b297ef.jpg,5832976b2ab77.jpg', null, '2016夏季男士白色短袖衬衫韩版修身短袖衬衣商务休闲职业寸衫男装4', '0', '0', '0', '1', '199', '1', '1479710571', null, null, '24', null, null);
INSERT INTO `sk_goods` VALUES ('238', '男装秋冬新西裤西装裤', '199.00', '99.00', '68', 'Firs杉杉2016男装秋冬新西裤修身免烫商务正装休闲西服裤西装裤1', 'Firs杉杉2016男装秋冬新西裤修身免烫商务正装休闲西服裤西装裤1', '583297d7d33a0.jpg,583297d7d3f58.jpg,583297d7d4ef8.jpg', null, 'Firs杉杉2016男装秋冬新西裤修身免烫商务正装休闲西服裤西装裤1', '0', '0', '0', '1', '99', '0', '1479710680', null, null, '34', null, null);
INSERT INTO `sk_goods` VALUES ('239', ' 冬装新品男装牛仔裤', '299.00', '199.00', '69', 'GXG男装男裤 冬装新品裤子男牛仔裤青年修身直筒长裤男#648050051', 'GXG男装男裤 冬装新品裤子男牛仔裤青年修身直筒长裤男#648050051', '583298445646d.jpg,5832984456c3d.jpg,5832984457fc5.jpg', null, 'GXG男装男裤 冬装新品裤子男牛仔裤青年修身直筒长裤男#648050051', '0', '0', '0', '1', '120', '600', '1479710788', null, null, '35', null, null);
INSERT INTO `sk_goods` VALUES ('240', '休闲裤子男装', '599.00', '499.00', '69', '男士秋冬季休闲裤男装韩版修身纯棉小脚裤青少年时尚长裤子男款潮', '男士秋冬季休闲裤男装韩版修身纯棉小脚裤青少年时尚长裤子男款潮', '583298ad1228b.jpg,583298ad1322b.jpg,583298ad13de3.jpg', null, '男士秋冬季休闲裤男装韩版修身纯棉小脚裤青少年时尚长裤子男款潮', '0', '0', '0', '1', '398', '2', '1479710893', null, null, '35', null, null);
INSERT INTO `sk_goods` VALUES ('241', '男装外套卫衣', '299.00', '199.00', '67', '冬季加绒加厚刺绣连帽卫衣男士加肥加大码外套韩版青年帽衫潮男装', '冬季加绒加厚刺绣连帽卫衣男士加肥加大码外套韩版青年帽衫潮男装', '583298f9d39d3.jpg,583298f9d458b.jpg,583298f9d552b.jpg', null, '                        冬季加绒加厚刺绣连帽卫衣男士加肥加大码外套韩版青年帽衫潮男装                    ', '0', '0', '0', '0', '99', '1', '1479710970', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('242', '女装兔毛皮草外套', '2299.00', '1999.00', '42', '2016新款狐狸毛领整皮獭兔毛皮草外套 女中长款海宁皮草反季清仓4', '2016新款狐狸毛领整皮獭兔毛皮草外套 女中长款海宁皮草反季清仓4', '583299c35e8e1.jpg,583299c35f499.jpg,583299c36043a.jpg,583299c360ff2.jpg', null, '2016新款狐狸毛领整皮獭兔毛皮草外套 女中长款海宁皮草反季清仓4', '1', '0', '1', '1', '100', '0', '1479711172', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('243', '水貂皮女装外套', '5299.00', '4999.00', '42', '2016秋冬新款水貂皮草海宁貂皮裘皮大衣小母貂短款外套女整貂特价1', '2016秋冬新款水貂皮草海宁貂皮裘皮大衣小母貂短款外套女整貂特价1', '58329a2e77bb7.jpg,58329a2e78b57.jpg,58329a2e79ee0.jpg', null, '2016秋冬新款水貂皮草海宁貂皮裘皮大衣小母貂短款外套女整貂特价1', '0', '0', '0', '1', '210', '0', '1479711279', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('244', '女装外套短款外套马甲', '599.00', '299.00', '43', '小V家 外套冬天女装韩版短款棉衣2016新款学生宽松背心马甲棉服潮4', '小V家 外套冬天女装韩版短款棉衣2016新款学生宽松背心马甲棉服潮4', '58329a84331ae.jpg,58329a8434536.jpg,58329a84358bf.jpg,58329a843702f.jpg', null, '小V家 外套冬天女装韩版短款棉衣2016新款学生宽松背心马甲棉服潮4', '0', '1', '0', '1', '200', '0', '1479711365', null, null, '36', null, null);
INSERT INTO `sk_goods` VALUES ('245', '背心无袖短款马甲', '620.00', '480.00', '43', '女装羽绒棉马甲外套秋冬季棉衣加厚韩版修身背心无袖棉服短款马夹3', '女装羽绒棉马甲外套秋冬季棉衣加厚韩版修身背心无袖棉服短款马夹3', '58329ad36f4b3.jpg,58329ad37006b.jpg,58329ad37083b.jpg', null, '女装羽绒棉马甲外套秋冬季棉衣加厚韩版修身背心无袖棉服短款马夹3', '0', '0', '0', '1', '100', '0', '1479711444', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('246', '冬季女装羊毛呢子外套大衣', '899.00', '599.00', '51', '2016韩版毛呢外套女士韩范秋冬天中长款羊毛呢子廓形过膝尼子大衣1', '2016韩版毛呢外套女士韩范秋冬天中长款羊毛呢子廓形过膝尼子大衣1', '58329b2d38e22.jpg,58329b2d395f2.jpg,58329b2d3a592.jpg', null, '2016韩版毛呢外套女士韩范秋冬天中长款羊毛呢子廓形过膝尼子大衣1', '0', '0', '0', '1', '200', '0', '1479711533', null, null, '39', null, null);
INSERT INTO `sk_goods` VALUES ('247', '秋冬新款长袖毛呢外套女', '899.00', '699.00', '53', '韩版2016秋冬新款宽松大码中长款过膝呢子大衣系带长袖毛呢外套女1', '韩版2016秋冬新款宽松大码中长款过膝呢子大衣系带长袖毛呢外套女1', '58329b856747e.jpg,58329b8568806.jpg', null, '韩版2016秋冬新款宽松大码中长款过膝呢子大衣系带长袖毛呢外套女1', '0', '0', '0', '1', '200', '0', '1479711621', null, null, '39', null, null);
INSERT INTO `sk_goods` VALUES ('248', '长袖针织衫', '1099.00', '999.00', '55', '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '58329c0b4dce8.jpg,58329c0b4ec88.jpg,58329c0b4f459.jpg', null, '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '0', '0', '0', '1', '100', '0', '1479711755', null, null, '34', null, null);
INSERT INTO `sk_goods` VALUES ('249', '毛衣纯色针织衫', '899.00', '699.00', '55', '韩版秋冬短款高领羊绒衫女大码套头长袖宽松毛衣纯色针织衫学院风2', '韩版秋冬短款高领羊绒衫女大码套头长袖宽松毛衣纯色针织衫学院风2', '58329c6c0a8dd.jpg,58329c6c0b495.jpg,58329c6c0c435.jpg', null, '韩版秋冬短款高领羊绒衫女大码套头长袖宽松毛衣纯色针织衫学院风2', '0', '0', '0', '1', '199', '900', '1479711852', null, null, '36', null, null);
INSERT INTO `sk_goods` VALUES ('250', '毛呢短裙女半身裙', '299.00', '199.00', '57', '半身裙秋冬季毛呢短裙女高腰一步冬裙大码包臀不规则显瘦a字裙子3', '半身裙秋冬季毛呢短裙女高腰一步冬裙大码包臀不规则显瘦a字裙子3', '58329ce2bfa7c.jpg,58329ce2c0e04.jpg,58329ce2c15d5.jpg', null, '半身裙秋冬季毛呢短裙女高腰一步冬裙大码包臀不规则显瘦a字裙子3', '0', '0', '0', '1', '99', '0', '1479711971', null, null, '35', null, null);
INSERT INTO `sk_goods` VALUES ('251', '牛仔裤女弹力小脚铅笔裤', '299.00', '189.00', '59', '韩国代购2016秋季高腰紧身九分牛仔裤女弹力显瘦长分小脚铅笔裤潮3', '韩国代购2016秋季高腰紧身九分牛仔裤女弹力显瘦长分小脚铅笔裤潮3', '58329d2a2948f.jpg,58329d2a2b7b8.jpg,58329d2a2d310.jpg', null, '韩国代购2016秋季高腰紧身九分牛仔裤女弹力显瘦长分小脚铅笔裤潮3', '0', '0', '0', '1', '99', '0', '1479712042', null, null, '34', null, null);
INSERT INTO `sk_goods` VALUES ('252', '长袖修身针织毛衣连衣裙', '899.00', '799.00', '56', '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '58329d85e2677.jpg,58329d85e3618.jpg,58329d85e3de8.jpg', null, '2016秋冬新款中长款内搭长袖修身针织连衣裙打底衫圆领套头毛衣女1', '0', '0', '0', '1', '499', '1', '1479712134', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('253', '长袖针织连衣裙', '869.00', '769.00', '61', '2016秋季韩版新款V领长袖针织连衣裙中长款修身显瘦收腰打底裙女3', '2016秋季韩版新款V领长袖针织连衣裙中长款修身显瘦收腰打底裙女3', '58329dcfc894a.jpg,58329dcfc9502.jpg,58329dcfca4a2.jpg', null, '2016秋季韩版新款V领长袖针织连衣裙中长款修身显瘦收腰打底裙女3', '0', '0', '0', '1', '27', '800', '1479712208', null, null, '37', null, null);
INSERT INTO `sk_goods` VALUES ('254', '乔丹篮球鞋运动鞋男鞋', '2299.00', '1899.00', '70', '乔丹篮球鞋男正品2016秋冬季新款减震防滑耐磨运动鞋男鞋高帮战靴', '乔丹篮球鞋男正品2016秋冬季新款减震防滑耐磨运动鞋男鞋高帮战靴', '58329e51c0243.jpg,58329e51c0a14.jpg,58329e51c15cc.jpg', null, '乔丹篮球鞋男正品2016秋冬季新款减震防滑耐磨运动鞋男鞋高帮战靴', '0', '0', '0', '1', '106', '0', '1479712338', null, null, '47', null, null);
INSERT INTO `sk_goods` VALUES ('255', '休闲鞋单鞋内增高女鞋', '299.00', '259.00', '82', '2016秋冬新款魔术贴隐形内增高女鞋运动高帮鞋厚底松糕休闲鞋单鞋1', '2016秋冬新款魔术贴隐形内增高女鞋运动高帮鞋厚底松糕休闲鞋单鞋1', '58329e9eaf264.jpg,58329e9eafe1c.jpg,58329e9eb0204.jpg', null, '2016秋冬新款魔术贴隐形内增高女鞋运动高帮鞋厚底松糕休闲鞋单鞋1', '0', '1', '0', '1', '99', '100', '1479712415', null, null, '39', null, null);
INSERT INTO `sk_goods` VALUES ('256', '女靴靴子中靴', '6800.00', '5299.00', '95', '大趾王冬款保暖绒里真皮粗跟靴子女中筒靴高跟圆头磨砂皮女靴中靴', '大趾王冬款保暖绒里真皮粗跟靴子女中筒靴高跟圆头磨砂皮女靴中靴', '58329f11e5bca.jpg,58329f11e6b6a.jpg,58329f11e7722.jpg', null, '大趾王冬款保暖绒里真皮粗跟靴子女中筒靴高跟圆头磨砂皮女靴中靴', '1', '0', '1', '1', '65', '0', '1479712530', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('257', '女鞋休闲鞋运动鞋', '569.00', '399.00', '85', '隐形内增高女鞋运动风高帮鞋魔术贴休闲鞋女2016秋冬韩版单鞋潮1', '隐形内增高女鞋运动风高帮鞋魔术贴休闲鞋女2016秋冬韩版单鞋潮1', '58329f5cdbcc1.jpg,58329f5cdc0aa.jpg,58329f5cdc87a.jpg', null, '隐形内增高女鞋运动风高帮鞋魔术贴休闲鞋女2016秋冬韩版单鞋潮1', '0', '0', '0', '1', '326', '0', '1479712605', null, null, '64', null, null);
INSERT INTO `sk_goods` VALUES ('258', '小白鞋运动休闲鞋', '589.00', '199.00', '81', '小白鞋女秋款低帮系带韩版皮面运动休闲厚底板鞋女学生鞋平底增高1', '小白鞋女秋款低帮系带韩版皮面运动休闲厚底板鞋女学生鞋平底增高1', '58329fa026da0.jpg,58329fa028511.jpg,58329fa02a069.jpg,58329fa02ac21.jpg', null, '小白鞋女秋款低帮系带韩版皮面运动休闲厚底板鞋女学生鞋平底增高1', '0', '1', '0', '1', '53', '0', '1479712672', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('259', '运动鞋女鞋跑步鞋', '689.00', '199.00', '83', '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '58329fe93164a.jpg,58329fe93452b.jpg,58329fe9358b3.jpg', null, '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '1', '0', '1', '1', '30', '0', '1479712745', null, null, '53', null, null);
INSERT INTO `sk_goods` VALUES ('260', '运动鞋女鞋跑步鞋', '689.00', '199.00', '84', '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '58329fea90622.jpg,58329fea915c2.jpg,58329fea9294a.jpg', null, '朵艾微2016秋冬新款百搭运动鞋女鞋秋鞋休闲鞋韩版加绒跑步鞋学生2', '1', '0', '1', '1', '30', '0', '1479712747', null, null, '53', null, null);
INSERT INTO `sk_goods` VALUES ('261', '公文包男商务单肩斜挎包', '799.00', '499.00', '98', '真皮男包手提包横款公文包男商务牛皮简约男士休闲单肩斜挎包', '真皮男包手提包横款公文包男商务牛皮简约男士休闲单肩斜挎包', '5832a0ae0dcfe.jpg,5832a0ae0fc3e.jpg,5832a0ae113af.jpg,5832a0ae12b1f.jpg', null, '真皮男包手提包横款公文包男商务牛皮简约男士休闲单肩斜挎包', '0', '0', '0', '1', '100', '0', '1479712942', null, null, '49', null, null);
INSERT INTO `sk_goods` VALUES ('262', '男士包包斜挎包', '1800.00', '1299.00', '97', '精品男包单肩包皮包 男士包包斜挎包 简约商务休闲男款背包小挂包', '精品男包单肩包皮包 男士包包斜挎包 简约商务休闲男款背包小挂包', '5832a0ed40be5.jpg,5832a0ed413b5.jpg,5832a0ed41b85.jpg', null, '精品男包单肩包皮包 男士包包斜挎包 简约商务休闲男款背包小挂包', '0', '0', '0', '1', '62', '500', '1479713005', null, null, '39', null, null);
INSERT INTO `sk_goods` VALUES ('263', '公文包男单肩斜挎包', '1050.00', '899.00', '87', '男包商务男士手提包横款公文包男单肩斜挎包休闲男士包包电脑皮包', '男包商务男士手提包横款公文包男单肩斜挎包休闲男士包包电脑皮包', '5832a132b2c02.jpg,5832a132b3ba3.jpg,5832a132b4f2b.jpg,5832a132b669b.jpg', null, '男包商务男士手提包横款公文包男单肩斜挎包休闲男士包包电脑皮包', '0', '0', '0', '1', '200', '0', '1479713075', null, null, '37', null, null);
INSERT INTO `sk_goods` VALUES ('264', '斜跨背包单肩包男包', '420.00', '299.00', '90', '手包胸包男士韩版潮斜挎包休闲胸前斜跨背包包腰包皮包单肩包男包', '手包胸包男士韩版潮斜挎包休闲胸前斜跨背包包腰包皮包单肩包男包', '5832a172517e8.jpg,5832a17252788.jpg,5832a17253341.jpg,5832a172542e1.jpg', null, '手包胸包男士韩版潮斜挎包休闲胸前斜跨背包包腰包皮包单肩包男包', '0', '0', '0', '1', '100', '0', '1479713139', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('265', '双肩包休闲电脑旅行包', '789.00', '599.00', '89', '米森双肩包男士背包大高中学生书包商务休闲电脑旅行包韩版潮正品', '米森双肩包男士背包大高中学生书包商务休闲电脑旅行包韩版潮正品', '5832a1b2b5454.jpg,5832a1b2b63f4.jpg,5832a1b2b777d.jpg,5832a1b2b8b05.jpg', null, '米森双肩包男士背包大高中学生书包商务休闲电脑旅行包韩版潮正品', '1', '0', '1', '1', '319', '700', '1479713203', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('266', '长款钱包皮夹钱夹包', '869.00', '299.00', '92', '千秋雪箱包男士长款钱包薄大容量拉链商务休闲青年皮夹钱夹包邮', '千秋雪箱包男士长款钱包薄大容量拉链商务休闲青年皮夹钱夹包邮', '5832a1f3140f4.jpg,5832a1f3148c4.jpg,5832a1f31547c.jpg,5832a1f316805.jpg', null, '千秋雪箱包男士长款钱包薄大容量拉链商务休闲青年皮夹钱夹包邮', '0', '0', '0', '1', '300', '0', '1479713267', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('267', '旅行箱行李箱', '966.00', '799.00', '91', '17寸拉杆箱万向轮登机箱密码箱子16寸行李箱小箱子旅行箱包男女', '17寸拉杆箱万向轮登机箱密码箱子16寸行李箱小箱子旅行箱包男女', '5832a2538ff74.jpg,5832a253916e4.jpg,5832a25392e55.jpg,5832a253949ad.jpg', null, '17寸拉杆箱万向轮登机箱密码箱子16寸行李箱小箱子旅行箱包男女', '0', '0', '0', '1', '200', '1000', '1479713364', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('268', '单肩包潮流品牌女包', '3010.00', '2099.00', '88', '2016秋冬新款箱包女士进口真皮女包牛皮包时尚单肩包潮流品牌女包', '2016秋冬新款箱包女士进口真皮女包牛皮包时尚单肩包潮流品牌女包', '5832a2a09c843.jpg,5832a2a09d3fb.jpg,5832a2a09dfb3.jpg', null, '2016秋冬新款箱包女士进口真皮女包牛皮包时尚单肩包潮流品牌女包', '1', '1', '1', '1', '100', '0', '1479713441', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('270', '手链沉香手串佛珠', '22000.00', '19999.00', '44', '加里曼丹沉香手串多圈108佛珠足金转运珠黄金手链男女中国风礼物2', '加里曼丹沉香手串多圈108佛珠足金转运珠黄金手链男女中国风礼物2', '5832b3f8c0e25.jpg,5832b3f8c21ad.jpg,5832b3f8c3536.jpg,5832b3f8c44d6.jpg', null, '加里曼丹沉香手串多圈108佛珠足金转运珠黄金手链男女中国风礼物2', '1', '0', '1', '1', '80', '0', '1479717881', null, null, '43', null, null);
INSERT INTO `sk_goods` VALUES ('271', '菩提子手链手串', '9999.00', '8999.00', '45', '今古楼天工素串星月菩提子108颗散珠正月高密佛珠手链手串限量款1', '&lt;span&gt;今古楼天工素串星月菩提子108颗散珠正月高密佛珠手链手串限量款1&lt;/span&gt;', '5832b4452a186.jpg,5832b4453c682.jpg', null, '今古楼天工素串星月菩提子108颗散珠正月高密佛珠手链手串限量款1', '0', '0', '0', '1', '60', '0', '1479717957', null, null, '39', null, null);
INSERT INTO `sk_goods` VALUES ('272', '翡翠吊坠吊坠项链', '8860.00', '5960.00', '46', '玉礼冰糯种翡翠貔貅吊坠男女款霸王玉貔貅玉吊坠项链天然A货', '玉礼冰糯种翡翠貔貅吊坠男女款霸王玉貔貅玉吊坠项链天然A货', '5832b49e1f216.jpg,5832b49e2059e.jpg,5832b49e21156.jpg', null, '玉礼冰糯种翡翠貔貅吊坠男女款霸王玉貔貅玉吊坠项链天然A货', '0', '1', '0', '1', '20', '0', '1479718046', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('273', '翡翠吊坠翡翠项坠', '10899.00', '8999.00', '0', '印象眸 金镶翡翠心形吊坠男女情侣款爱心挂件翡翠项坠1', '印象眸 金镶翡翠心形吊坠男女情侣款爱心挂件翡翠项坠1', '5832b4d0aa43a.jpg,5832b4d0aaff2.jpg,5832b4d0abbab.jpg', null, '印象眸 金镶翡翠心形吊坠男女情侣款爱心挂件翡翠项坠1', '0', '0', '0', '1', '20', '0', '1479718097', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('274', '翡翠手镯玉镯玉手镯', '7860.00', '5690.00', '47', '七彩云南缅甸翡翠手镯 A货 玉镯玉手镯圆镯贵妃镯 系列 证书 女款1', '七彩云南缅甸翡翠手镯 A货 玉镯玉手镯圆镯贵妃镯 系列 证书 女款1', '5832b5277b617.jpg,5832b5277b9ff.jpg,5832b5277c1d0.jpg', null, '七彩云南缅甸翡翠手镯 A货 玉镯玉手镯圆镯贵妃镯 系列 证书 女款1', '0', '0', '0', '1', '60', '0', '1479718183', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('275', '珍珠锁骨链女项链', '643.00', '599.00', '48', '奥诗雅925银日韩个性创意锆石气质甜美双层珍珠锁骨链女项链简约', '奥诗雅925银日韩个性创意锆石气质甜美双层珍珠锁骨链女项链简约', '5832b58604185.jpg,5832b58604955.jpg,5832b58607836.jpg', null, '奥诗雅925银日韩个性创意锆石气质甜美双层珍珠锁骨链女项链简约', '0', '0', '0', '1', '302', '0', '1479718278', null, null, '44', null, null);
INSERT INTO `sk_goods` VALUES ('276', '天然海水珍珠手链女', '5966.00', '2999.00', '49', '高端定制日本AKOYA天然海水珍珠18K金多层缠绕手链女1', '高端定制日本AKOYA天然海水珍珠18K金多层缠绕手链女1', '5832b5d209101.jpg,5832b5d20a0a2.jpg,5832b5d20b042.jpg', null, '高端定制日本AKOYA天然海水珍珠18K金多层缠绕手链女1', '0', '1', '0', '1', '60', '0', '1479718354', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('277', ' 冰种玉镯子女款玉石玉器', '7899.00', '6599.00', '93', '天然特价A级飘花玉手镯 冰种玉镯子翡翠色女款玉石玉器正品带证书1', '天然特价A级飘花玉手镯 冰种玉镯子翡翠色女款玉石玉器正品带证书1', '5832b67335cb4.jpg,5832b67336c55.jpg,5832b67337fdd.jpg', null, '天然特价A级飘花玉手镯 冰种玉镯子翡翠色女款玉石玉器正品带证书1', '0', '0', '0', '1', '525', '1', '1479718515', null, null, '0', null, null);
INSERT INTO `sk_goods` VALUES ('278', '珍珠吊坠项链锁骨链银饰', '5600.00', '4596.00', '94', '                        欧洛莲925银正圆珍珠吊坠项链锁骨链简约时尚银饰品1                    ', '                        欧洛莲925银正圆珍珠吊坠项链锁骨链简约时尚银饰品1                    ', '5832b6bae26d2.jpg,5832b6bae3a5a.jpg,5832b6bae51ca.jpg', null, '                        欧洛莲925银正圆珍珠吊坠项链锁骨链简约时尚银饰品1                    ', '0', '1', '1', '1', '200', '0', '1479718587', null, null, '42', null, null);
INSERT INTO `sk_goods` VALUES ('279', '乔丹男鞋篮球鞋', '3099.00', '2500.00', '72', '乔丹 AIR JORDAN 6 AJ6 乔6 白黑银红男子篮球鞋 304401-123-003', '乔丹 AIR JORDAN 6 AJ6 乔6 白黑银红男子篮球鞋 304401-123-003', '5837e6370b070.jpg,5837e6370faa9.jpg,5837e63710661.gif', null, '乔丹 AIR JORDAN 6 AJ6 乔6 白黑银红男子篮球鞋 304401-123-003', '0', '1', '0', '1', '95', '5', '1480058423', null, null, '37', null, null);
INSERT INTO `sk_goods` VALUES ('280', '斜挎包', '200.00', '300.00', '97', '斜挎包', '&lt;span&gt;单价：￥200 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20&lt;/span&gt;', '583d39837fbb5.jpg,583d39838170d.jpg,583d398382e7d.jpg,583d398384dbe.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '100', '0', '1480407428', null, null, '33', null, null);
INSERT INTO `sk_goods` VALUES ('281', '单肩公文包', '180.00', '200.00', '87', '单肩公文包', '单价：￥500 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583d3c9971969.jpg,583d3c9972521.jpg,583d3c99734c2.jpg', null, '商品编号：10678355754&amp;nbsp;商品产地：中国大陆 &amp;nbsp;货号：BK&lt;br /&gt;', '1', '0', '1', '1', '100', '0', '1480408218', null, null, '70', null, null);
INSERT INTO `sk_goods` VALUES ('282', '休闲斜挎包', '260.00', '300.00', '90', '休闲斜挎包', '&lt;br /&gt;\r\n单价：￥500 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20&lt;br /&gt;', '583d3e33e04bb.jpg,583d3e33e1843.jpg,583d3e33e2fb3.jpg,583d3e33e433c.jpg', null, '商品产地：中国大陆 &amp;nbsp;&lt;span&gt;货号：BK&lt;/span&gt;&lt;br /&gt;', '1', '0', '1', '1', '100', '0', '1480408628', null, null, '71', null, null);
INSERT INTO `sk_goods` VALUES ('283', '奥诗雅珍珠锁骨链女项链   ', '800.00', '1000.00', '48', '奥诗雅珍珠锁骨链女项链                    ', '                        单价：￥500 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20                    ', '583d40205dda8.jpg,583d40205f131.jpg,583d4020608a1.jpg', null, '                        商品编号：10678355754                    ', '1', '0', '1', '1', '10', '0', '1480409121', null, null, '72', null, null);
INSERT INTO `sk_goods` VALUES ('284', '玉冰糯吊坠项链 ', '1000.00', '1200.00', '46', '玉冰糯吊坠项链             ', '                        单价：￥500 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20                    ', '583d412fe71ad.jpg,583d412fe8535.jpg,583d412fe94d6.jpg,583d412fea85e.jpg', null, '                        商品产地：中国大陆 &nbsp;&nbsp;货号：BK<br />                    ', '1', '0', '1', '1', '1000', '0', '1480409392', null, null, '73', null, null);
INSERT INTO `sk_goods` VALUES ('285', '冬季新款男士尼子中长款风衣', '400.00', '500.00', '41', '                        冬季新款男士尼子中长款风衣韩版呢子外套青年妮子潮男装毛呢大衣                    ', '                        <br />\r\n单价：￥400 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20<br />                    ', '583e46b04c43b.jpg,583e46b04d3db.jpg,583e46b04dbac.jpg,583e46b0529cc.jpg', null, '                        商品产地：中国大陆                    ', '1', '1', '1', '1', '99', '1', '1480476337', null, null, '63', null, null);
INSERT INTO `sk_goods` VALUES ('286', '秋季男士加绒保暖长袖衬衫', '100.00', '200.00', '65', '                        秋季男士加绒保暖长袖衬衫韩版修身商务纯色加厚正装休闲衬衣男装                    ', '                        单价：￥100 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20                    ', '583e4722ccd29.jpg,583e4722ce881.jpg,583e4722cfc09.jpg', null, '                        商品编号：10678355754 &nbsp;商品产地：中国大陆                    ', '1', '0', '1', '1', '1000', '0', '1480476451', null, null, '8', null, null);
INSERT INTO `sk_goods` VALUES ('287', '2016夏季男士白色短袖衬衫', '200.00', '300.00', '66', '                        2016夏季男士白色短袖衬衫韩版修身短袖衬衣商务休闲职业寸衫男装                    ', '                        <br />\r\n单价：￥200 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20<br />                    ', '583e47d5c09f6.jpg,583e47d5c254f.jpg,583e47d5c38d7.jpg,583e47d5c9e68.jpg', null, '                        <br />\r\n商品编号：10678355754<br />                    ', '1', '0', '1', '1', '0', '1', '1480476630', null, null, '27', null, null);
INSERT INTO `sk_goods` VALUES ('288', '冬季女款羽绒服', '500.00', '600.00', '50', '冬季女款羽绒服', '单价：￥500 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4874784d1.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '100', '0', '1480476788', null, null, '28', null, null);
INSERT INTO `sk_goods` VALUES ('289', '女装夹克', '260.00', '300.00', '52', '女装夹克', '单价：￥260 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e48cf56376.jpg,583e48cf57316.jpg,583e48cf59a26.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '100', '0', '1480476880', null, null, '33', null, null);
INSERT INTO `sk_goods` VALUES ('290', '韩版套头色针织衫学院风', '500.00', '1.00', '54', '                        韩版秋冬短款高领羊绒衫女大码套头长袖宽松毛衣纯色针织衫学院风                    ', '                        <br />\r\n单价：￥500 &nbsp; &nbsp;品牌：未填写 &nbsp; 评价：已有50条评论 &nbsp;更新：2016-10-20<br />                    ', '583e492c83ecf.jpg,583e492c85257.jpg,583e492c865e0.jpg', null, '                        商品编号：10678355754                    ', '1', '1', '1', '1', '99', '1', '1480476973', null, null, '34', null, null);
INSERT INTO `sk_goods` VALUES ('291', '女装针织衫毛衣', '200.00', '300.00', '58', '女装针织衫毛衣', '单价：￥500 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e49c2a78b6.jpg,583e49c2a940f.jpg,583e49c2a9fc7.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '200', '0', '1480477123', null, null, '47', null, null);
INSERT INTO `sk_goods` VALUES ('292', '女装运动裤', '150.00', '200.00', '60', '女装运动裤', '单价：￥500 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-2', '583e4a51a7c3b.jpg,583e4a51af16c.jpg,583e4a51afd24.jpg,583e4a51b010c.jpg', null, '商品编号：10678355754&lt;br /&gt;', '1', '0', '1', '1', '96', '4', '1480477266', null, null, '59', null, null);
INSERT INTO `sk_goods` VALUES ('293', '女士休闲半身裙', '200.00', '300.00', '62', '女士休闲半身裙', '单价：￥200 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4ab8bfc0d.jpg,583e4ab8c2aed.jpg,583e4ab8c80de.jpg,583e4ab8c9466.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '55', '1', '1480477369', null, null, '28', null, null);
INSERT INTO `sk_goods` VALUES ('294', '男士休闲鞋', '150.00', '200.00', '73', '男士休闲鞋', '单价：￥150 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4b1cde290.jpg,583e4b1cdf230.jpg,583e4b1ce01d0.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '12', '0', '1480477469', null, null, '36', null, null);
INSERT INTO `sk_goods` VALUES ('295', '男士花公子休闲鞋', '260.00', '300.00', '74', '男士花公子休闲鞋', '单价：￥260 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4b76da5ec.jpg,583e4b76db58c.jpg,583e4b770730b.png', null, '商品编号：10678355754', '0', '0', '0', '1', '25', '0', '1480477559', null, null, '38', null, null);
INSERT INTO `sk_goods` VALUES ('296', '时尚简约男士皮鞋', '300.00', '400.00', '75', '时尚简约男士皮鞋', '单价：￥300 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4be310984.jpg,583e4be311d0d.jpg,583e4be3176e6.jpg', null, '商品编号：10678355754', '1', '1', '1', '1', '100', '0', '1480477667', null, null, '55', null, null);
INSERT INTO `sk_goods` VALUES ('297', '时尚简约奥康皮鞋', '300.00', '400.00', '76', '时尚简约奥康皮鞋', '单价：￥300 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4c304bb39.jpg,583e4c304e631.jpg', null, '商品编号：10678355754', '1', '1', '1', '1', '12', '0', '1480477744', null, null, '40', null, null);
INSERT INTO `sk_goods` VALUES ('298', '男士帆布鞋', '150.00', '200.00', '79', '男士帆布鞋', '&lt;br /&gt;\r\n单价：￥200 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20&lt;br /&gt;', '583e4c8e75110.jpg,583e4c8e75cc8.jpg,583e4c8e76c69.jpg', null, '商品编号：10678355754&amp;nbsp;店铺： 猫人男装专营店&lt;br /&gt;', '1', '0', '1', '1', '566', '0', '1480477839', null, null, '43', null, null);
INSERT INTO `sk_goods` VALUES ('299', '男士市场软底布鞋', '100.00', '200.00', '80', '男士市场软底布鞋', '单价：￥200 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4cdbb1db9.jpg,583e4cdbb3141.jpg,583e4cdbb44ca.jpg', null, '商品编号：10678355754', '1', '0', '1', '1', '22', '0', '1480477916', null, null, '46', null, null);
INSERT INTO `sk_goods` VALUES ('300', '女士简约时尚凉拖', '50.00', '60.00', '86', '女士简约时尚凉拖', '单价：￥50 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4d5839250.jpg,583e4d583b191.jpg,583e4d583c519.jpg', null, '商品编号：10678355754', '1', '1', '1', '1', '22', '0', '1480478040', null, null, '54', null, null);
INSERT INTO `sk_goods` VALUES ('301', '女款时尚休闲靴', '200.00', '300.00', '96', '女式休闲靴', '单价：￥200 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20', '583e4dccd3c92.jpg,583e4dccd4c33.jpg,583e4dccd5bd3.jpg,583e4dccd6f5b.jpg', null, '&lt;br /&gt;\r\n商品编号：10678355754&lt;br /&gt;', '1', '0', '1', '1', '100', '0', '1480478157', null, null, '58', null, null);
INSERT INTO `sk_goods` VALUES ('302', '男士运动网球鞋', '260.00', '300.00', '71', '男士运动网球鞋', '&lt;br /&gt;\r\n单价：￥260 &amp;nbsp; &amp;nbsp;品牌：未填写 &amp;nbsp; 评价：已有50条评论 &amp;nbsp;更新：2016-10-20&lt;br /&gt;', '583e4e4470de1.jpg,583e4e4472551.jpg', null, '&lt;br /&gt;\r\n商品编号：10678355754&lt;br /&gt;', '1', '1', '1', '1', '7', '1', '1480478276', null, null, '28', null, null);

-- ----------------------------
-- Table structure for `sk_goods_pic`
-- ----------------------------
DROP TABLE IF EXISTS `sk_goods_pic`;
CREATE TABLE `sk_goods_pic` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `picname` varchar(100) DEFAULT NULL,
  `gid` tinyint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_goods_pic
-- ----------------------------
INSERT INTO `sk_goods_pic` VALUES ('1', '5821ca358aedc.png', '150');
INSERT INTO `sk_goods_pic` VALUES ('2', '5821cce4b4c04.png', '150');
INSERT INTO `sk_goods_pic` VALUES ('3', '5821cd31bb712.jpg', '150');
INSERT INTO `sk_goods_pic` VALUES ('4', '5821cd31ee786.png', '150');
INSERT INTO `sk_goods_pic` VALUES ('5', '58242ff0a2173.jpg', '205');
INSERT INTO `sk_goods_pic` VALUES ('6', '58243045a2ca1.png', '209');
INSERT INTO `sk_goods_pic` VALUES ('7', '58243e1c39b79.png', '242');
INSERT INTO `sk_goods_pic` VALUES ('8', '58243e4374dbd.jpg', '249');
INSERT INTO `sk_goods_pic` VALUES ('9', '58243e6832f72.png', '254');

-- ----------------------------
-- Table structure for `sk_history`
-- ----------------------------
DROP TABLE IF EXISTS `sk_history`;
CREATE TABLE `sk_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_history
-- ----------------------------
INSERT INTO `sk_history` VALUES ('129', '272', '29', '1480233113');
INSERT INTO `sk_history` VALUES ('177', '245', '29', '1480312823');
INSERT INTO `sk_history` VALUES ('178', '37', '29', '1480233639');
INSERT INTO `sk_history` VALUES ('179', '268', '29', '1480233658');
INSERT INTO `sk_history` VALUES ('183', '239', '29', '1480234365');
INSERT INTO `sk_history` VALUES ('186', '233', '29', '1480418317');
INSERT INTO `sk_history` VALUES ('187', '271', '29', '1480239411');
INSERT INTO `sk_history` VALUES ('189', '255', '29', '1480313949');
INSERT INTO `sk_history` VALUES ('191', '226', '88', '1480326417');
INSERT INTO `sk_history` VALUES ('192', '237', '29', '1480326317');
INSERT INTO `sk_history` VALUES ('194', '279', '31', '1480391434');
INSERT INTO `sk_history` VALUES ('195', '274', '29', '1480331710');
INSERT INTO `sk_history` VALUES ('196', '246', '29', '1480331646');
INSERT INTO `sk_history` VALUES ('202', '279', '29', '1480407835');
INSERT INTO `sk_history` VALUES ('203', '255', '89', '1480339435');
INSERT INTO `sk_history` VALUES ('204', '254', '31', '1480336782');
INSERT INTO `sk_history` VALUES ('205', '253', '31', '1480336945');
INSERT INTO `sk_history` VALUES ('206', '237', '89', '1480403860');
INSERT INTO `sk_history` VALUES ('207', '279', '89', '1480397306');
INSERT INTO `sk_history` VALUES ('208', '274', '89', '1480338812');
INSERT INTO `sk_history` VALUES ('209', '258', '89', '1480339437');
INSERT INTO `sk_history` VALUES ('210', '240', '89', '1480339830');
INSERT INTO `sk_history` VALUES ('211', '265', '89', '1480404953');
INSERT INTO `sk_history` VALUES ('212', '229', '89', '1480390611');
INSERT INTO `sk_history` VALUES ('213', '252', '31', '1480391179');
INSERT INTO `sk_history` VALUES ('214', '240', '31', '1480391625');
INSERT INTO `sk_history` VALUES ('215', '272', '89', '1480397310');
INSERT INTO `sk_history` VALUES ('216', '262', '29', '1480403757');
INSERT INTO `sk_history` VALUES ('217', '277', '29', '1480403776');
INSERT INTO `sk_history` VALUES ('286', '248', '31', '1480418671');
INSERT INTO `sk_history` VALUES ('287', '283', '31', '1480419237');
INSERT INTO `sk_history` VALUES ('289', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('290', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('291', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('292', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('293', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('294', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('295', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('296', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('297', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('298', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('299', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('300', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('301', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('302', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('303', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('304', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('305', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('306', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('307', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('308', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('309', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('310', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('311', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('312', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('313', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('314', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('315', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('316', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('317', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('318', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('319', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('320', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('321', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('322', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('323', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('324', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('325', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('326', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('327', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('328', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('329', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('330', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('331', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('332', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('333', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('334', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('335', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('336', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('337', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('338', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('339', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('340', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('341', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('342', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('343', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('344', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('345', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('346', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('347', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('348', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('349', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('350', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('351', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('352', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('353', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('354', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('355', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('356', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('357', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('358', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('359', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('360', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('361', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('362', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('363', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('364', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('365', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('366', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('367', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('368', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('369', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('370', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('371', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('372', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('373', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('374', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('375', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('376', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('377', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('378', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('379', '250', '31', '1480424404');
INSERT INTO `sk_history` VALUES ('380', '245', '31', '1480424394');
INSERT INTO `sk_history` VALUES ('381', '243', '31', '1480467898');
INSERT INTO `sk_history` VALUES ('409', '231', '29', '1480480875');
INSERT INTO `sk_history` VALUES ('410', '299', '29', '1480484161');
INSERT INTO `sk_history` VALUES ('411', '283', '29', '1480484516');
INSERT INTO `sk_history` VALUES ('413', '292', '29', '1480485777');
INSERT INTO `sk_history` VALUES ('415', '258', '29', '1480593325');
INSERT INTO `sk_history` VALUES ('416', '272', '29', '1480488899');
INSERT INTO `sk_history` VALUES ('417', '296', '29', '1480489335');
INSERT INTO `sk_history` VALUES ('418', '300', '29', '1480489352');
INSERT INTO `sk_history` VALUES ('419', '82', '29', '1480489371');
INSERT INTO `sk_history` VALUES ('420', '43', '29', '1480489375');
INSERT INTO `sk_history` VALUES ('421', '72', '29', '1480489385');
INSERT INTO `sk_history` VALUES ('422', '39', '29', '1480489388');
INSERT INTO `sk_history` VALUES ('423', '37', '29', '1480489392');
INSERT INTO `sk_history` VALUES ('424', '279', '29', '1480489468');
INSERT INTO `sk_history` VALUES ('425', '290', '91', '1480657524');
INSERT INTO `sk_history` VALUES ('426', '293', '91', '1480489649');
INSERT INTO `sk_history` VALUES ('427', '290', '29', '1480494569');
INSERT INTO `sk_history` VALUES ('428', '296', '29', '1480494579');
INSERT INTO `sk_history` VALUES ('429', '302', '29', '1480494636');
INSERT INTO `sk_history` VALUES ('433', '279', '91', '1480670119');
INSERT INTO `sk_history` VALUES ('434', '292', '31', '1480672563');
INSERT INTO `sk_history` VALUES ('435', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('436', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('437', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('438', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('439', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('440', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('441', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('442', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('443', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('444', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('445', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('446', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('447', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('448', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('449', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('450', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('451', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('452', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('453', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('454', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('455', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('456', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('457', '235', '31', '1480499100');
INSERT INTO `sk_history` VALUES ('458', '268', '31', '1480499122');
INSERT INTO `sk_history` VALUES ('459', '287', '33', '1480589798');
INSERT INTO `sk_history` VALUES ('460', '240', '33', '1480589805');
INSERT INTO `sk_history` VALUES ('463', '285', '33', '1480670075');
INSERT INTO `sk_history` VALUES ('464', '255', '91', '1480591026');
INSERT INTO `sk_history` VALUES ('465', '276', '91', '1480591043');
INSERT INTO `sk_history` VALUES ('466', '302', '91', '1480591467');
INSERT INTO `sk_history` VALUES ('468', '293', '29', '1480593206');
INSERT INTO `sk_history` VALUES ('469', '297', '91', '1480657529');
INSERT INTO `sk_history` VALUES ('470', '235', '91', '1480657534');
INSERT INTO `sk_history` VALUES ('472', '39', '91', '1480657582');
INSERT INTO `sk_history` VALUES ('475', '302', '33', '1480669889');
INSERT INTO `sk_history` VALUES ('476', '258', '33', '1480669899');
INSERT INTO `sk_history` VALUES ('477', '292', '31', '1480672563');

-- ----------------------------
-- Table structure for `sk_mobileusers`
-- ----------------------------
DROP TABLE IF EXISTS `sk_mobileusers`;
CREATE TABLE `sk_mobileusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_mobileusers
-- ----------------------------

-- ----------------------------
-- Table structure for `sk_order`
-- ----------------------------
DROP TABLE IF EXISTS `sk_order`;
CREATE TABLE `sk_order` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(100) NOT NULL,
  `uid` int(5) NOT NULL,
  `prices` float(10,0) NOT NULL,
  `createtime` varchar(200) NOT NULL,
  `orderstatus` int(5) NOT NULL DEFAULT '1',
  `aid` varchar(20) DEFAULT NULL,
  `deliver` varchar(100) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `tx` int(2) DEFAULT '0' COMMENT '0代表已读，1代表新提醒',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_order
-- ----------------------------
INSERT INTO `sk_order` VALUES ('1', 'c5d9a22f98f039df02f770ddf1265dc7', '29', '5197', '1479877552', '4', '9', '申通快递', '', '0');
INSERT INTO `sk_order` VALUES ('2', '8252296009976ddb85c52f927dd7eef2', '29', '899', '1479877659', '3', '25', '申通快递', '', '0');
INSERT INTO `sk_order` VALUES ('5', 'd97af39229c7088b02c7e998bd16a261', '29', '11675', '1479983546', '3', '23', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('7', 'f65b19ecd38963bb88e04561e326bb61', '29', '399', '1479985504', '3', '23', null, null, '0');
INSERT INTO `sk_order` VALUES ('8', 'fa360adbdba1cae77091f95b5b6c3998', '29', '899', '1479987689', '4', '9', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('13', '21527d9d1018bc25aa992b2cffbed94a', '33', '499', '1480231922', '3', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('14', '124e158a79c8c6d386155324e5c917ed', '33', '199', '1480231985', '3', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('15', 'a59fce75b189c348b869c335ec06d1e0', '33', '2800', '1480232000', '3', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('16', '8daeb69178fe52578be954e7475ab858', '33', '90', '1480232019', '4', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('17', '7e4c175fc936118da2cf1e87f25d2cfc', '33', '4208', '1480232050', '4', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('18', 'e1d98806f05645e7959526904e9885f5', '29', '5960', '1480232353', '4', '23', null, null, '0');
INSERT INTO `sk_order` VALUES ('20', '411cbbbf9fac889c092c8b3d52955bad', '29', '199', '1480234268', '4', '25', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('21', '4d782cc2ac429ad86281c9abdcd4b79c', '29', '320', '1480239399', '4', '25', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('22', '944e08f8bf6801e9ff4f2cc11da10d00', '29', '8999', '1480239421', '8', '9', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('23', '61f63ba873af42ec5db8e09ee71e17ea', '33', '199', '1480312443', '4', '12', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('24', 'a387084fa0122b643b66fef843ff22e9', '29', '259', '1480314563', '4', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('25', '0c465f36e0bf1692305f7c494e9d734f', '33', '90', '1480315762', '8', '12', null, null, '0');
INSERT INTO `sk_order` VALUES ('26', '0bc89fad76948047524109379b4a1044', '29', '2097', '1480316236', '4', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('27', '0d7016ecb88917a7c1fac7e71592babc', '29', '15696', '1480316283', '4', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('28', '83136328f935da81db88040144814609', '88', '2200', '1480326278', '4', '27', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('29', '39fdfd83c40dbb743a4de0f17c1f66ee', '29', '199', '1480327480', '8', '25', '韵达快递', '白色', '0');
INSERT INTO `sk_order` VALUES ('30', 'd8a2d3ecbb337e8eb37494354d220d56', '31', '2500', '1480328308', '4', '1', '申通快递', '', '0');
INSERT INTO `sk_order` VALUES ('32', '90d4e098119acda74b993ceebccd9ad1', '33', '199', '1480333116', '8', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('33', 'dcf0b206e80457d799df5e12cc55335f', '29', '2500', '1480335208', '4', '23', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('34', '55430229c12a721bb27a454d5db7f870', '33', '18979', '1480335667', '8', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('35', 'f2c6419994d018720b65eaa6a21d0b91', '89', '259', '1480336467', '4', '28', '韵达快递', '要黑色的', '0');
INSERT INTO `sk_order` VALUES ('36', 'c5b039aa73cbf986000575d4897c581f', '31', '1538', '1480336803', '3', '1', '申通快递', '', '0');
INSERT INTO `sk_order` VALUES ('37', '2e54d2c6977869b9e261cc758540d15f', '89', '500', '1480390940', '3', '28', '韵达快递', '黑色', '0');
INSERT INTO `sk_order` VALUES ('38', 'e485f9a27d49fe41ce4dd5e56c35c4d1', '31', '799', '1480391242', '3', '1', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('39', '0368281dd94fab66c79bb5fe9cdc3d4b', '31', '2500', '1480391329', '3', '1', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('40', 'b9fda2dadeadb7099e2e47c6be03e46b', '31', '499', '1480391644', '3', '1', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('41', '30aef464cd11d2cfc101cf2012f3ab76', '29', '1299', '1480403765', '3', '23', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('42', '5855f06377451161b973d792f697f2b7', '29', '6599', '1480403800', '4', '25', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('43', '21d7d61d4835926d24be3f5a1d934ce9', '89', '199', '1480403865', '4', '29', '中通快递', '', '0');
INSERT INTO `sk_order` VALUES ('44', '776c79f83cf2a4db1fffee9dc5b13c9d', '89', '599', '1480404206', '4', '28', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('46', '5cbe56f4e4a3d439796405dc7c5a8b44', '29', '2500', '1470407837', '8', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('47', '780186bc26ad0cb295a733c87697eb01', '29', '599', '1480416148', '2', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('48', '860226dd4f76f3951d20575916e939d1', '29', '299', '1480417561', '2', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('49', '131d1455a10f807164827560f54364b4', '29', '597', '1480417834', '2', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('51', '85b1e22506f51e447394092e24dcf4e3', '33', '700', '1480479312', '2', '31', null, null, '0');
INSERT INTO `sk_order` VALUES ('52', '591415364b64c216f43225efd8a6206b', '29', '799', '1480480158', '3', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('53', 'e53065f534329fc57516c9fbef968068', '33', '3395', '1480480410', '2', '31', null, null, '0');
INSERT INTO `sk_order` VALUES ('54', '7bd31dd15d29898b72a3313496e5cbfd', '29', '11598', '1480480626', '3', '25', null, null, '0');
INSERT INTO `sk_order` VALUES ('55', '4c9b2b4d80472666bd9ef5fddf88cb35', '29', '200', '1480484210', '8', '25', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('56', '1f05e9341db8fc3f7fdc697c41721606', '29', '1000', '1480484685', '8', '23', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('57', 'bd58681e53674bd4f2cc539761c34691', '33', '189', '1480485075', '2', '31', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('58', '30cd755c079847b4c3da604b676011c8', '33', '300', '1480485177', '2', '31', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('59', 'bb0969a67b2a4b840119e31b842a7739', '33', '300', '1480485516', '2', '31', '余额支付', '', '0');
INSERT INTO `sk_order` VALUES ('60', '2ef8bd93c9936b29658b3645702c616c', '29', '200', '1480485807', '3', '25', '韵达快递', '黑色', '0');
INSERT INTO `sk_order` VALUES ('61', '0e8ad7346bd4c6f193a4252b363ab551', '29', '2500', '1480489483', '8', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('65', '6be9e8f7e6ce98d885e3f546f81c0e97', '31', '400', '1480498910', '4', '1', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('66', '81e680fcaca9a86973b7c69decadf8b6', '31', '5896', '1480499182', '8', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('67', '89ce141b01550989714563d3c68b4402', '33', '500', '1480591477', '2', '31', null, null, '0');
INSERT INTO `sk_order` VALUES ('68', 'd82e73aa23cbe9ab92e2549162741a50', '91', '300', '1480591662', '2', '36', '韵达快递', '红色', '0');
INSERT INTO `sk_order` VALUES ('69', '277ed7b79525434e82e3d0d9e3ca9aa1', '91', '500', '1480592640', '4', '36', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('70', 'b3addf07fe7aceb94a86eadbe289c876', '29', '199', '1480593362', '1', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('71', '8486f5b105a03e0f004a965dc8171ee5', '91', '199', '1480593882', '2', '36', null, null, '0');
INSERT INTO `sk_order` VALUES ('72', 'bd1bea3037346dcd27c240cbd9327bfd', '91', '200', '1480657470', '1', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('73', '29a0890ad0ad939d4388e24d7e9cc9ba', '33', '450', '1480670082', '1', null, null, null, '0');
INSERT INTO `sk_order` VALUES ('75', '29cb89c5c3989271b115912522c980b3', '91', '1398', '1480670612', '2', '', null, null, '0');
INSERT INTO `sk_order` VALUES ('76', '3b69fcaf4030770337de7a4c86532625', '31', '200', '1480672425', '4', '1', '韵达快递', '', '0');
INSERT INTO `sk_order` VALUES ('77', '29954902901160a5756a892893dfd458', '31', '200', '1480672569', '1', null, null, null, '0');

-- ----------------------------
-- Table structure for `sk_ordergoods`
-- ----------------------------
DROP TABLE IF EXISTS `sk_ordergoods`;
CREATE TABLE `sk_ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) NOT NULL,
  `gid` int(5) NOT NULL,
  `goodsname` varchar(50) NOT NULL,
  `price` float(5,1) NOT NULL,
  `buynum` int(5) NOT NULL,
  `ispj` int(1) NOT NULL DEFAULT '0' COMMENT '0表示未评价，1表示已评价',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_ordergoods
-- ----------------------------
INSERT INTO `sk_ordergoods` VALUES ('1', '1', '230', '韩版男装西服外套', '2500.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('2', '1', '228', '男装毛呢大衣风衣', '2697.0', '3', '1');
INSERT INTO `sk_ordergoods` VALUES ('3', '2', '253', '长袖针织连衣裙', '899.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('6', '5', '268', '单肩包潮流品牌女包', '4198.0', '2', '0');
INSERT INTO `sk_ordergoods` VALUES ('7', '5', '266', '长款钱包皮夹钱夹包', '4485.0', '15', '0');
INSERT INTO `sk_ordergoods` VALUES ('8', '5', '264', '斜跨背包单肩包男包', '2093.0', '7', '0');
INSERT INTO `sk_ordergoods` VALUES ('9', '5', '263', '公文包男单肩斜挎包', '899.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('11', '7', '233', '男装马夹马甲男士', '399.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('12', '8', '249', '毛衣纯色针织衫', '899.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('18', '13', '240', '休闲裤子男装', '499.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('19', '14', '239', ' 冬装新品男装牛仔裤', '199.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('20', '15', '231', '男士西服外套商务正装', '2800.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('21', '16', '236', '男装T恤商务休闲短袖', '90.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('22', '17', '230', '韩版男装西服外套', '2400.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('23', '17', '228', '男装毛呢大衣风衣', '809.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('24', '17', '227', '大衣男外套风衣男装', '999.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('25', '18', '272', '翡翠吊坠吊坠项链', '5960.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('27', '20', '239', ' 冬装新品男装牛仔裤', '199.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('28', '21', '233', '男装马夹马甲男士', '320.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('29', '22', '271', '菩提子手链手串', '8999.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('30', '23', '241', '男装外套卫衣', '199.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('31', '24', '255', '休闲鞋单鞋内增高女鞋', '259.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('32', '25', '236', '男装T恤商务休闲短袖', '90.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('33', '26', '247', '秋冬新款长袖毛呢外套女', '699.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('34', '27', '243', '水貂皮女装外套', '4999.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('35', '27', '247', '秋冬新款长袖毛呢外套女', '699.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('36', '28', '226', '冬装男士羽绒服外套', '2200.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('37', '29', '237', '男装男士白色短袖衬衣', '199.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('38', '30', '279', '乔丹男鞋篮球鞋', '2500.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('40', '32', '258', '小白鞋运动休闲鞋', '199.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('41', '33', '279', '乔丹男鞋篮球鞋', '2500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('42', '34', '242', '女装兔毛皮草外套', '7996.0', '4', '0');
INSERT INTO `sk_ordergoods` VALUES ('43', '34', '259', '运动鞋女鞋跑步鞋', '995.0', '5', '0');
INSERT INTO `sk_ordergoods` VALUES ('44', '34', '230', '韩版男装西服外套', '4800.0', '2', '0');
INSERT INTO `sk_ordergoods` VALUES ('45', '34', '257', '女鞋休闲鞋运动鞋', '798.0', '2', '0');
INSERT INTO `sk_ordergoods` VALUES ('46', '34', '227', '大衣男外套风衣男装', '2997.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('47', '34', '241', '男装外套卫衣', '796.0', '4', '0');
INSERT INTO `sk_ordergoods` VALUES ('48', '34', '239', ' 冬装新品男装牛仔裤', '597.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('49', '35', '255', '休闲鞋单鞋内增高女鞋', '259.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('50', '36', '253', '长袖针织连衣裙', '1538.0', '2', '0');
INSERT INTO `sk_ordergoods` VALUES ('51', '37', '229', '男装外套羽绒服', '500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('52', '38', '252', '长袖修身针织毛衣连衣裙', '799.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('53', '39', '279', '乔丹男鞋篮球鞋', '2500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('54', '40', '240', '休闲裤子男装', '499.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('55', '41', '262', '男士包包斜挎包', '1299.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('56', '42', '277', ' 冰种玉镯子女款玉石玉器', '6599.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('57', '43', '237', '男装男士白色短袖衬衣', '199.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('58', '44', '265', '双肩包休闲电脑旅行包', '599.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('59', '45', '233', '男装马夹马甲男士', '320.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('60', '46', '279', '乔丹男鞋篮球鞋', '2500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('61', '47', '246', '冬季女装羊毛呢子外套大衣', '599.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('62', '48', '244', '女装外套短款外套马甲', '299.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('63', '49', '260', '运动鞋女鞋跑步鞋', '199.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('65', '51', '286', '秋季男士加绒保暖长袖衬衫', '200.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('66', '51', '285', '冬季新款男士尼子中长款风衣', '500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('67', '52', '252', '长袖修身针织毛衣连衣裙', '799.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('68', '53', '287', '2016夏季男士白色短袖衬衫', '300.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('69', '53', '240', '休闲裤子男装', '499.0', '5', '0');
INSERT INTO `sk_ordergoods` VALUES ('70', '54', '277', ' 冰种玉镯子女款玉石玉器', '6599.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('71', '54', '243', '水貂皮女装外套', '4999.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('72', '55', '299', '男士市场软底布鞋', '200.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('73', '56', '283', '奥诗雅珍珠锁骨链女项链   ', '1000.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('74', '57', '235', '男士长袖衬衫', '189.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('75', '58', '293', '女士休闲半身裙', '300.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('76', '59', '287', '2016夏季男士白色短袖衬衫', '300.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('77', '60', '292', '女装运动裤', '200.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('78', '61', '279', '乔丹男鞋篮球鞋', '2500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('82', '65', '292', '女装运动裤', '400.0', '2', '1');
INSERT INTO `sk_ordergoods` VALUES ('83', '66', '241', '男装外套卫衣', '597.0', '3', '0');
INSERT INTO `sk_ordergoods` VALUES ('84', '66', '256', '女靴靴子中靴', '5299.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('85', '67', '285', '冬季新款男士尼子中长款风衣', '500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('86', '68', '302', '男士运动网球鞋', '300.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('87', '69', '285', '冬季新款男士尼子中长款风衣', '500.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('88', '70', '258', '小白鞋运动休闲鞋', '199.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('89', '71', '241', '男装外套卫衣', '199.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('90', '72', '286', '秋季男士加绒保暖长袖衬衫', '200.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('91', '73', '285', '冬季新款男士尼子中长款风衣', '450.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('93', '75', '287', '2016夏季男士白色短袖衬衫', '300.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('94', '75', '238', '男装秋冬新西裤西装裤', '99.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('95', '75', '227', '大衣男外套风衣男装', '999.0', '1', '0');
INSERT INTO `sk_ordergoods` VALUES ('96', '76', '292', '女装运动裤', '200.0', '1', '1');
INSERT INTO `sk_ordergoods` VALUES ('97', '77', '292', '女装运动裤', '200.0', '1', '0');

-- ----------------------------
-- Table structure for `sk_orderstatus`
-- ----------------------------
DROP TABLE IF EXISTS `sk_orderstatus`;
CREATE TABLE `sk_orderstatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statusname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_orderstatus
-- ----------------------------
INSERT INTO `sk_orderstatus` VALUES ('1', '待付款');
INSERT INTO `sk_orderstatus` VALUES ('2', '待发货');
INSERT INTO `sk_orderstatus` VALUES ('3', '待收货');
INSERT INTO `sk_orderstatus` VALUES ('4', '订单完成');
INSERT INTO `sk_orderstatus` VALUES ('5', '已评价');
INSERT INTO `sk_orderstatus` VALUES ('6', '退款中');
INSERT INTO `sk_orderstatus` VALUES ('7', '退款完成');
INSERT INTO `sk_orderstatus` VALUES ('8', '订单已取消');

-- ----------------------------
-- Table structure for `sk_pingjia`
-- ----------------------------
DROP TABLE IF EXISTS `sk_pingjia`;
CREATE TABLE `sk_pingjia` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(4) NOT NULL,
  `goodsname` varchar(100) DEFAULT NULL,
  `oid` int(10) NOT NULL,
  `uid` int(5) NOT NULL,
  `pingjia` text NOT NULL,
  `pjtime` int(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1差评,2中评，3,4,5好评   ',
  `return` varchar(300) DEFAULT NULL,
  `aid` int(5) unsigned DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_pingjia
-- ----------------------------
INSERT INTO `sk_pingjia` VALUES ('1', '228', '男装毛呢大衣风衣', '1', '29', '很好看质量不错啊', '2016', '0', '谢谢亲的评价', null, null);
INSERT INTO `sk_pingjia` VALUES ('2', '230', '韩版男装西服外套', '17', '33', '很帅气的衣服', '2016', '0', 'sduosaih', null, null);
INSERT INTO `sk_pingjia` VALUES ('3', '272', '翡翠吊坠吊坠项链', '18', '29', '很好看，发货也很快', '1480233569', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('4', '239', ' 冬装新品男装牛仔裤', '20', '29', '很修身', '1480234360', '1', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('5', '228', '男装毛呢大衣风衣', '17', '33', '很帅气，时尚的衣服', '1480234443', '4', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('6', '241', '男装外套卫衣', '23', '33', '很好好', '1480312540', '4', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('7', '226', '冬装男士羽绒服外套', '28', '88', '123456', '1480326409', '4', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('8', '279', '乔丹男鞋篮球鞋', '30', '31', 'aaaaaaaaaaaaaaa', '2016', '0', '111111111111', null, null);
INSERT INTO `sk_pingjia` VALUES ('9', '255', '休闲鞋单鞋内增高女鞋', '35', '89', '鞋子很好看', '1480338886', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('10', '237', '男装男士白色短袖衬衣', '43', '89', '质量还不错把', '1480405013', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('11', '233', '男装马夹马甲男士', '50', '29', '很好', '1480418159', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('12', '279', '乔丹男鞋篮球鞋', '63', '91', 'idslajfkbji', '1480496820', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('13', '292', '女装运动裤', '65', '31', 'saaaaaaaaaaaaaaaaaaa', '2016', '0', 'tttttttttttttttttttt', null, null);
INSERT INTO `sk_pingjia` VALUES ('14', '290', '韩版套头色针织衫学院风', '62', '91', '很好很好好啊哈好好', '1480592465', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('15', '279', '乔丹男鞋篮球鞋', '74', '91', 'henhaokan', '1480670500', '5', null, null, null);
INSERT INTO `sk_pingjia` VALUES ('16', '292', '女装运动裤', '76', '31', 'sfsfsf', '2016', '0', 'dgffffffffffffffffffffffffffffffff', null, null);

-- ----------------------------
-- Table structure for `sk_userful`
-- ----------------------------
DROP TABLE IF EXISTS `sk_userful`;
CREATE TABLE `sk_userful` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_userful
-- ----------------------------
INSERT INTO `sk_userful` VALUES ('1', '31', '2', '1');
INSERT INTO `sk_userful` VALUES ('2', '29', '1', '1');
INSERT INTO `sk_userful` VALUES ('3', '31', '9', '1');
INSERT INTO `sk_userful` VALUES ('4', '33', '11', '1');
INSERT INTO `sk_userful` VALUES ('5', '29', '15', '1');
INSERT INTO `sk_userful` VALUES ('6', '33', '21', '1');
INSERT INTO `sk_userful` VALUES ('7', '33', '17', '1');
INSERT INTO `sk_userful` VALUES ('8', '88', '7', '1');
INSERT INTO `sk_userful` VALUES ('9', '89', '9', '1');
INSERT INTO `sk_userful` VALUES ('10', '29', '11', '1');

-- ----------------------------
-- Table structure for `sk_users`
-- ----------------------------
DROP TABLE IF EXISTS `sk_users`;
CREATE TABLE `sk_users` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `regip` char(40) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` char(15) NOT NULL,
  `lastdate` int(10) DEFAULT NULL,
  `regdate` int(10) DEFAULT NULL,
  `lastip` char(40) DEFAULT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `loginnum` int(10) unsigned DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` mediumint(3) unsigned NOT NULL DEFAULT '0',
  `qq` int(5) DEFAULT NULL,
  `sex` enum('男','女') DEFAULT NULL,
  `paypwd` varchar(50) DEFAULT NULL COMMENT '支付密码',
  `money` float(8,2) DEFAULT '0.00' COMMENT '用户余额',
  `jifen` varchar(10) DEFAULT '0',
  `passwordtime` varchar(255) DEFAULT NULL,
  `passwordtoken` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sk_users
-- ----------------------------
INSERT INTO `sk_users` VALUES ('29', '127.0.0.1', 'lixuran', 'ea0766f47eba74953da8ebde1ec881c0', '18339468888', '1480671221', '1478070582', '192.168.4.55', null, '1518', null, '', '0', null, '男', '73882ab1fa529d7273da0db6b49cc4f3', '500.00', '9765.3', null, null, '583e9a93ad15c.png');
INSERT INTO `sk_users` VALUES ('31', '127.0.0.1', 'wanglulu', 'dea60a9479618557ff4ef0c54ce96f18', '13271667017', '1480672412', '1478085339', '192.168.4.55', null, '196', null, '2@qq.com', '0', null, '男', 'c33367701511b4f6020ec61ded352059', '987943.00', '1731.5', null, null, '583c04ef1d2e6.jpg');
INSERT INTO `sk_users` VALUES ('32', '127.0.0.1', 'admina', '123456', '13148201617', '1478135122', '1478135122', null, null, '3', null, '1233456@qq.com', '0', null, '男', null, '5000.00', null, null, null, null);
INSERT INTO `sk_users` VALUES ('33', '127.0.0.1', 'shiyong', 'e50c5ffde355b05f705fe851b806203f', '15986496684', '1480669445', '1478240227', '192.168.4.55', null, '253', null, '1@qq.com', '0', null, '男', 'c33367701511b4f6020ec61ded352059', '-100.00', '3154.5', null, null, '58401ad248248.gif');
INSERT INTO `sk_users` VALUES ('36', '127.0.0.1', '王璐璐123', '123456', '15516712365', '1478265212', '1478265059', '127.0.0.1', null, '7', null, null, '0', null, '男', '670b14728ad9902aecba32e22fa4f6bd', '562881.00', '218', null, null, null);
INSERT INTO `sk_users` VALUES ('64', '127.0.0.1', 'admin5', '25d55ad283aa400af464c76d713c07ad', '15637138806', '1480497959', '1478487177', '172.16.17.100', 'evea', '388', null, '2528160214@qq.com', '1', '10001', '男', null, '0.00', '0', '1479172575', 'f35f538dc42451ebd0d6cbda5d3dc9a0', null);
INSERT INTO `sk_users` VALUES ('91', '172.16.17.220', 'lixuran1', 'e998fcb04902898ccceed1d60f205bd3', '18339466666', '1480670114', '1480489607', '192.168.4.55', 'SyN0RUmtk', '10', null, null, '0', null, null, '670b14728ad9902aecba32e22fa4f6bd', '6602.00', '1059.7', null, null, null);
INSERT INTO `sk_users` VALUES ('92', null, 'hahaha', '101a6ec9f938885df0a44f20458d2eb4', '15516712675', '1480591624', '1480591614', '172.16.17.219', 'XqxaDAmR', '2', null, null, '0', null, null, null, '0.00', '0', null, null, null);
INSERT INTO `sk_users` VALUES ('93', '192.168.4.55', 'admin12', 'e10adc3949ba59abbe56e057f20f883e', '15637138812', '1480671615', '1480671615', null, 'qdx7azik2', '1', null, null, '0', null, null, null, '0.00', '0', null, null, null);
