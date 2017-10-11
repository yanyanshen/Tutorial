/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50521
Source Host           : localhost:3306
Source Database       : one

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-12-06 12:47:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ybc_adcategory`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_adcategory`;
CREATE TABLE `ybc_adcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adcatename` varchar(40) NOT NULL,
  `aid` smallint(5) NOT NULL,
  `path` varchar(20) DEFAULT NULL,
  `active` smallint(2) DEFAULT '1' COMMENT '1代表展示，0代表下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_adcategory
-- ----------------------------
INSERT INTO `ybc_adcategory` VALUES ('1', '主页广告', '0', '1', '1');
INSERT INTO `ybc_adcategory` VALUES ('2', '文章广告', '0', '2', '1');
INSERT INTO `ybc_adcategory` VALUES ('3', '其他广告', '0', '3', '1');
INSERT INTO `ybc_adcategory` VALUES ('4', '主页导航广告', '1', '1,4', '1');
INSERT INTO `ybc_adcategory` VALUES ('5', '主页茶叶广告', '1', '1,5', '1');
INSERT INTO `ybc_adcategory` VALUES ('6', '主页茶具广告', '1', '1,6', '1');
INSERT INTO `ybc_adcategory` VALUES ('7', '文章茶具广告', '2', '2,7', '1');
INSERT INTO `ybc_adcategory` VALUES ('8', '文章茶叶广告', '2', '2,8', '1');
INSERT INTO `ybc_adcategory` VALUES ('9', '合作商广告', '3', '3,9', '1');
INSERT INTO `ybc_adcategory` VALUES ('12', '碧螺春', '5', '1,5,12', '1');
INSERT INTO `ybc_adcategory` VALUES ('13', '龙井', '5', '1,5,13', '1');
INSERT INTO `ybc_adcategory` VALUES ('16', '龙井', '8', '2,8,16', '1');
INSERT INTO `ybc_adcategory` VALUES ('17', '信阳毛尖', '8', '2,8,17', '1');
INSERT INTO `ybc_adcategory` VALUES ('34', '绿茶', '9', '3,9,34', '1');
INSERT INTO `ybc_adcategory` VALUES ('37', '主页其他广告', '1', '1,37', '1');
INSERT INTO `ybc_adcategory` VALUES ('38', '商品详情页广告', '3', '3,38', '1');
INSERT INTO `ybc_adcategory` VALUES ('39', '乌龙茶', '5', '1,5,39', '1');
INSERT INTO `ybc_adcategory` VALUES ('40', '大红袍', '9', '3,9,40', '1');
INSERT INTO `ybc_adcategory` VALUES ('41', '绿茶', '5', '1,5,41', '1');
INSERT INTO `ybc_adcategory` VALUES ('42', '主页网站推荐', '1', '1,42', '1');
INSERT INTO `ybc_adcategory` VALUES ('43', '文章左侧广告', '2', '2,43', '1');
INSERT INTO `ybc_adcategory` VALUES ('44', '开场广告', '0', '44', '1');
INSERT INTO `ybc_adcategory` VALUES ('45', '团购页面广告', '3', '3,45', '1');
INSERT INTO `ybc_adcategory` VALUES ('46', '主页推荐茶叶', '1', '1,46', '1');
INSERT INTO `ybc_adcategory` VALUES ('47', '积分商城广告', '3', '3,47', '1');

-- ----------------------------
-- Table structure for `ybc_adgood`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_adgood`;
CREATE TABLE `ybc_adgood` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adpic` varchar(60) DEFAULT NULL COMMENT '广告大图图片',
  `gid` smallint(5) NOT NULL COMMENT '商品表ID',
  `active` smallint(1) DEFAULT '1' COMMENT '1代表上架，0代表下架',
  `aid` smallint(5) NOT NULL COMMENT '广告分类ID',
  `addtime` int(11) DEFAULT NULL COMMENT '添加的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_adgood
-- ----------------------------
INSERT INTO `ybc_adgood` VALUES ('8', '581c8b9704909.jpg', '80', '1', '39', '1478265751');
INSERT INTO `ybc_adgood` VALUES ('9', '581d2d99e8a5f.jpg', '81', '1', '39', '1478307226');
INSERT INTO `ybc_adgood` VALUES ('10', '581d2e15d2075.jpg', '82', '1', '39', '1478307350');
INSERT INTO `ybc_adgood` VALUES ('12', '581d2eb8674de.jpg', '84', '1', '41', '1478307512');
INSERT INTO `ybc_adgood` VALUES ('13', '581d2f374a57b.jpg', '85', '1', '41', '1478307639');
INSERT INTO `ybc_adgood` VALUES ('14', '581d304f5b780.jpg', '86', '1', '6', '1478307919');
INSERT INTO `ybc_adgood` VALUES ('15', '581d30cd06ad7.jpg', '87', '1', '6', '1478308045');
INSERT INTO `ybc_adgood` VALUES ('16', '581d3a3d106cb.jpg', '88', '1', '4', '1478310461');
INSERT INTO `ybc_adgood` VALUES ('17', '581d3a969f06b.png', '89', '1', '4', '1478310550');
INSERT INTO `ybc_adgood` VALUES ('18', '581d3d9a05411.jpg', '90', '1', '42', '1478311322');
INSERT INTO `ybc_adgood` VALUES ('19', '581d3de08a87d.jpg', '91', '1', '42', '1478311392');
INSERT INTO `ybc_adgood` VALUES ('20', '581d4ad69d04f.jpg', '92', '1', '43', '1478314710');
INSERT INTO `ybc_adgood` VALUES ('21', '581d4b1078f64.jpg', '93', '1', '43', '1480552538');
INSERT INTO `ybc_adgood` VALUES ('22', '581d4b5527284.jpg', '94', '1', '43', '1478314837');
INSERT INTO `ybc_adgood` VALUES ('23', '581d4daed7874.jpg', '95', '1', '43', '1478315438');
INSERT INTO `ybc_adgood` VALUES ('24', '581d4f2de8199.jpg', '96', '1', '7', '1478315822');
INSERT INTO `ybc_adgood` VALUES ('25', '581d4f9c37b20.jpg', '97', '1', '7', '1478315932');
INSERT INTO `ybc_adgood` VALUES ('26', '581d52b5d3896.jpg', '98', '1', '8', '1478316725');
INSERT INTO `ybc_adgood` VALUES ('27', '581d69afc639a.jpg', '99', '1', '44', '1478322607');
INSERT INTO `ybc_adgood` VALUES ('28', '581d71e31d5c4.jpg', '101', '1', '38', '1478324707');
INSERT INTO `ybc_adgood` VALUES ('29', '581d721d81690.jpg', '102', '1', '38', '1479883749');
INSERT INTO `ybc_adgood` VALUES ('30', '581d75719aef8.jpg', '103', '1', '38', '1478325617');
INSERT INTO `ybc_adgood` VALUES ('31', '5820345ba5138.jpg', '124', '1', '45', '1478505563');
INSERT INTO `ybc_adgood` VALUES ('32', '58203520e4860.jpg', '125', '1', '45', '1478505761');
INSERT INTO `ybc_adgood` VALUES ('33', '5820357883014.jpg', '126', '1', '45', '1478505848');
INSERT INTO `ybc_adgood` VALUES ('34', '5820585ce2588.jpg', '127', '1', '4', '1478514781');
INSERT INTO `ybc_adgood` VALUES ('35', '582058b611ab8.jpg', '128', '1', '4', '1478514870');
INSERT INTO `ybc_adgood` VALUES ('36', '582058f7ef46b.jpg', '129', '1', '4', '1478514936');
INSERT INTO `ybc_adgood` VALUES ('37', null, '130', '1', '46', '1478517707');
INSERT INTO `ybc_adgood` VALUES ('38', null, '131', '1', '46', '1478517767');
INSERT INTO `ybc_adgood` VALUES ('40', null, '133', '1', '46', '1478517857');
INSERT INTO `ybc_adgood` VALUES ('41', null, '134', '1', '46', '1478568716');
INSERT INTO `ybc_adgood` VALUES ('42', null, '135', '1', '46', '1478568823');
INSERT INTO `ybc_adgood` VALUES ('43', null, '136', '1', '46', '1478570917');
INSERT INTO `ybc_adgood` VALUES ('44', '582291c7efb97.jpg', '137', '1', '8', '1478660552');
INSERT INTO `ybc_adgood` VALUES ('45', '5822920edfb9c.jpg', '138', '1', '8', '1478660623');
INSERT INTO `ybc_adgood` VALUES ('46', '582292b218691.jpg', '139', '1', '8', '1478660786');
INSERT INTO `ybc_adgood` VALUES ('47', '5822933cb7eb8.jpg', '140', '1', '7', '1478660924');
INSERT INTO `ybc_adgood` VALUES ('48', '582293a2b9837.jpg', '141', '1', '7', '1478682833');
INSERT INTO `ybc_adgood` VALUES ('49', '58295e2872530.jpg', '146', '1', '42', '1479106089');
INSERT INTO `ybc_adgood` VALUES ('50', '58295e5da426c.jpg', '147', '1', '42', '1479106141');
INSERT INTO `ybc_adgood` VALUES ('51', '5829a7acc6e48.jpg', '148', '1', '47', '1479124909');
INSERT INTO `ybc_adgood` VALUES ('52', '5829a92449c3c.jpg', '149', '1', '47', '1479125284');
INSERT INTO `ybc_adgood` VALUES ('53', '5829a96a6f1f1.jpg', '150', '1', '47', '1479125354');
INSERT INTO `ybc_adgood` VALUES ('54', '5829a99b1dc50.jpg', '151', '1', '47', '1479125403');
INSERT INTO `ybc_adgood` VALUES ('55', '5840e12be6473.jpg', '158', '1', '42', '1480646956');

-- ----------------------------
-- Table structure for `ybc_adgoods_pic`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_adgoods_pic`;
CREATE TABLE `ybc_adgoods_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告商品图片的ID',
  `gid` smallint(5) unsigned DEFAULT NULL COMMENT '广告商品ID',
  `picname` varchar(60) DEFAULT NULL COMMENT '商品图片名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_adgoods_pic
-- ----------------------------
INSERT INTO `ybc_adgoods_pic` VALUES ('9', '5', '581061da1198d.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('10', '5', '581061da12545.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('11', '5', '581061da138ce.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('12', '6', '5810685425ad0.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('13', '6', '58106854262a0.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('14', '6', '5810685426e58.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('15', '7', '58116df43f539.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('16', '7', '58116df4400f2.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('17', '7', '58116df440caa.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('18', '8', '58116e9f40861.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('19', '8', '58116e9f42f72.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('20', '8', '58116e9f45e52.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('21', '9', '58116fba14076.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('22', '9', '58116fba153ff.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('23', '9', '58116fba16f57.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('24', '10', '58119c9091a0f.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('25', '10', '58119c90925c7.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('26', '10', '58119c9093567.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('27', '11', '58119ceb1a450.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('28', '11', '58119ceb1b008.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('29', '11', '58119ceb1bfa8.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('30', '12', '58119f8ff1bc1.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('31', '12', '58119f8ff3332.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('32', '12', '58119f9000c4a.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('33', '13', '5811eeda012e7.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('34', '13', '5811eeda01e9f.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('35', '13', '5811eeda064f0.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('36', '14', '5811ef3aafa0b.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('37', '14', '5811ef3ab0d94.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('38', '14', '5811ef3ab388c.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('39', '15', '5812c0cd5990d.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('40', '15', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('41', '15', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('42', '16', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('43', '16', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('44', '16', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('45', '17', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('46', '17', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('47', '17', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('48', '18', '5812c3e0bfaf3.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('49', '18', '5812c3e0c06ab.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('50', '18', '5812c3e0c0e7b.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('51', '19', '5812c4463f642.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('52', '19', '5812c446409ca.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('53', '19', '5812c44641582.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('54', '20', '5812cbda2a174.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('55', '20', '5812cbda2a944.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('56', '20', '5812cbda2b4fc.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('57', '21', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('58', '21', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('59', '21', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('60', '22', '5812cc7a1f6cc.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('61', '22', '5812cc7a2066c.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('62', '22', '5812cc7a21224.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('63', '23', '5812e9f018bd8.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('64', '23', '5812e9f019b78.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('65', '23', null);
INSERT INTO `ybc_adgoods_pic` VALUES ('66', '24', '5812f07c1e28e.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('67', '24', '5812f07c1ee46.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('68', '24', '5812f07c1f9fe.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('69', '25', '581308b62da95.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('70', '25', '581308b62e64d.jpg');
INSERT INTO `ybc_adgoods_pic` VALUES ('71', '25', '581308b62f5ee.jpg');

-- ----------------------------
-- Table structure for `ybc_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_admin`;
CREATE TABLE `ybc_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(5) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL DEFAULT '1' COMMENT '0代表男性，1代表女性',
  `mobile` varchar(11) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `lasttime` varchar(10) DEFAULT NULL,
  `lastip` varchar(15) DEFAULT NULL,
  `mail` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '可以为空',
  `avatar` varchar(50) DEFAULT NULL,
  `power` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '0代表普通权限，1代表顶级权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_admin
-- ----------------------------
INSERT INTO `ybc_admin` VALUES ('17', 'raobenjun', 'd41d8cd98f00b204e9800998ecf8427e', '1', null, null, '1479450394', '1', '1479019966', null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('18', '123456', 'd41d8cd98f00b204e9800998ecf8427e', '1', null, null, '1479450909', '1', '1479449549', null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('20', 'rose', 'd41d8cd98f00b204e9800998ecf8427e', '1', null, null, '1479450351', '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('21', 'jack', 'd41d8cd98f00b204e9800998ecf8427e', '1', null, null, '1479450373', '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('22', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', '1480646635', null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('23', 'goods123', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', '1480056501', null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('24', 'Wilder', 'd41d8cd98f00b204e9800998ecf8427e', '1', null, null, '1479450416', '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('25', 'Faker', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', '1480056354', null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('26', '小明', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('27', '小红', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('28', '小王', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('29', '小李', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, null, '1', null, null, null, null, '0');
INSERT INTO `ybc_admin` VALUES ('30', 'jack2', 'a3f0bec59cebeb60553ec80bbfd5dfdf', '1', null, null, null, '1', null, null, null, null, '0');

-- ----------------------------
-- Table structure for `ybc_admin_nav`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_admin_nav`;
CREATE TABLE `ybc_admin_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navname` varchar(30) NOT NULL,
  `navurl` varchar(120) DEFAULT NULL,
  `pid` tinyint(3) DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  `priority` smallint(5) unsigned DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_admin_nav
-- ----------------------------
INSERT INTO `ybc_admin_nav` VALUES ('1', '品牌管理', 'Admin/Nav/Brand', '0', '1', '200');
INSERT INTO `ybc_admin_nav` VALUES ('2', '分类管理', 'Admin/Nav/Category', '0', '2', '300');
INSERT INTO `ybc_admin_nav` VALUES ('3', '商品管理', 'Admin/Nav/Goods', '0', '3', '400');
INSERT INTO `ybc_admin_nav` VALUES ('5', '订单管理', 'Admin/Nav/Order', '0', '5', '600');
INSERT INTO `ybc_admin_nav` VALUES ('6', '品牌分类', 'Admin/Brand/index', '1', '1,6', '210');
INSERT INTO `ybc_admin_nav` VALUES ('7', '添加品牌', 'Admin/Brand/add', '1', '1,7', '220');
INSERT INTO `ybc_admin_nav` VALUES ('8', '分类列表', 'Admin/Category/index', '2', '2,8', '310');
INSERT INTO `ybc_admin_nav` VALUES ('9', '添加分类', 'Admin/Category/add', '2', '2,9', '320');
INSERT INTO `ybc_admin_nav` VALUES ('10', '商品列表', 'Admin/Goods/index', '3', '3,10', '410');
INSERT INTO `ybc_admin_nav` VALUES ('11', '添加商品', 'Admin/Goods/add', '3', '3,11', '420');
INSERT INTO `ybc_admin_nav` VALUES ('12', '会员管理', 'Admin/Nav/index', '0', '12', '500');
INSERT INTO `ybc_admin_nav` VALUES ('15', '评价管理', 'Admin/Nav/Comment', '0', '15', '700');
INSERT INTO `ybc_admin_nav` VALUES ('16', '文章管理', 'Admin/Nav/Article', '0', '16', '800');
INSERT INTO `ybc_admin_nav` VALUES ('17', '广告管理', 'Admin/Nav/Adcategory', '0', '17', '900');
INSERT INTO `ybc_admin_nav` VALUES ('18', '团购管理', 'Admin/Nav/Group', '0', '18', '1000');
INSERT INTO `ybc_admin_nav` VALUES ('19', '积分商城', 'Admin/Nav/Integral', '0', '19', '1100');
INSERT INTO `ybc_admin_nav` VALUES ('20', '售后管理', 'Admin/Nav/Services', '0', '20', '1200');
INSERT INTO `ybc_admin_nav` VALUES ('21', '会员列表', 'Admin/Member/index', '12', '12,21', '510');
INSERT INTO `ybc_admin_nav` VALUES ('22', '订单列表', 'Admin/Order/index', '5', '5,22', '610');
INSERT INTO `ybc_admin_nav` VALUES ('23', '评价列表', 'Admin/Comment/commentList', '15', '15,23', '710');
INSERT INTO `ybc_admin_nav` VALUES ('24', '文章列表', 'Admin/Article/index', '16', '16,24', '810');
INSERT INTO `ybc_admin_nav` VALUES ('25', '发布文章', 'Admin/Article/add', '16', '16,25', '820');
INSERT INTO `ybc_admin_nav` VALUES ('26', '广告分类列表', 'Admin/Adcategory/index', '17', '17,26', '910');
INSERT INTO `ybc_admin_nav` VALUES ('27', '添加广告分类', 'Admin/Adcategory/addCategory', '17', '17,27', '920');
INSERT INTO `ybc_admin_nav` VALUES ('28', '广告商品列表', 'Admin/Adgood/index', '17', '17,28', '930');
INSERT INTO `ybc_admin_nav` VALUES ('29', '添加广告商品', 'Admin/Adgood/add', '17', '17,29', '940');
INSERT INTO `ybc_admin_nav` VALUES ('30', '团购列表', 'Admin/Group/index', '18', '18,30', '1010');
INSERT INTO `ybc_admin_nav` VALUES ('31', '发布团购', 'Admin/Group/add', '18', '18,31', '1020');
INSERT INTO `ybc_admin_nav` VALUES ('32', '发送邮件', 'Admin/Group/send_email', '18', '18,32', '1030');
INSERT INTO `ybc_admin_nav` VALUES ('34', '商品列表', 'Admin/Integral/index', '19', '19,34', '1110');
INSERT INTO `ybc_admin_nav` VALUES ('35', '添加商品', 'Admin/Integral/add', '19', '19,35', '1120');
INSERT INTO `ybc_admin_nav` VALUES ('36', '订单列表', 'Admin/IntegralOrder/integralOrder', '19', '19,36', '1130');
INSERT INTO `ybc_admin_nav` VALUES ('38', '申请列表', 'Admin/Services/index', '20', '20,38', '1210');

-- ----------------------------
-- Table structure for `ybc_article`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_article`;
CREATE TABLE `ybc_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL COMMENT '文章标题',
  `author` char(50) NOT NULL COMMENT '文章作者',
  `descript` varchar(255) NOT NULL COMMENT '文章描述',
  `content` text NOT NULL COMMENT '文章内容',
  `dateline` int(11) NOT NULL COMMENT '文章发布日期',
  `teapic` varchar(50) NOT NULL COMMENT '茶叶图片',
  `teatag` varchar(20) NOT NULL COMMENT '文章标签',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_article
-- ----------------------------
INSERT INTO `ybc_article` VALUES ('52', '黑茶的功效与作用', '黄小仙', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477391540', '580f34b476f81.jpg', '黑茶');
INSERT INTO `ybc_article` VALUES ('55', '大红袍的作用与功效', '符肖亚', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477391697', '580f355177666.jpg', '大红袍');
INSERT INTO `ybc_article` VALUES ('56', '信阳毛尖的功效与作用', '兰陵笑笑生', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; 据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392328', '580f37c8d1d09.jpg', '信阳毛尖');
INSERT INTO `ybc_article` VALUES ('57', '红茶的作用与功效', '樱桃小丸子', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392448', '580f3840a596e.jpg', '红茶');
INSERT INTO `ybc_article` VALUES ('58', '龙井的功效与作用', '西门庆', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392617', '580f38e9087ee.jpg', '龙井');
INSERT INTO `ybc_article` VALUES ('59', '咖啡的作用与功效', '李逍遥', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392699', '580f393bc1f62.jpg', '咖啡');
INSERT INTO `ybc_article` VALUES ('60', '学PHP前途怎么样', '云和数据', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392864', '580f39e046821.jpg', '红茶');
INSERT INTO `ybc_article` VALUES ('61', 'PHP好找工作吗', '云和高老师', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477392954', '580f3a3a9b440.jpg', '雀舌');
INSERT INTO `ybc_article` VALUES ('62', 'PHP工资怎么样', '云和大神', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\r\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477393076', '580f3ab4ccd2e.jpg', '雀舌');
INSERT INTO `ybc_article` VALUES ('63', '雀舌的功效与作用', '买买买买买提', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477393165', '580f3b0cdea72.jpg', '雀舌');
INSERT INTO `ybc_article` VALUES ('64', '西湖龙井好喝吗？', '猴子派来的逗比', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477393268', '580f3b7431067.jpg', '西湖龙井');
INSERT INTO `ybc_article` VALUES ('67', '铁观音的功效与作用', 'Ezreal', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1477894526', '5816e17e08c8f.jpg', '铁观音');
INSERT INTO `ybc_article` VALUES ('68', '信阳毛尖好不好喝？', '尼古拉斯·盖伦', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1478156969', '581adc5987e66.png', '红茶');
INSERT INTO `ybc_article` VALUES ('69', '这是一个悲伤的故事123', '布拉德·皮蛋', '茶叶的功效与作用有很多。例如，当人们工作疲劳、昏昏欲睡、精神萎靡、思维闭塞的时候。饮\n一杯茶可使人精神焕发、头脑清晰、思路宽广；当人们饱食油腻食物之后，饮一杯浓茶能减轻油腻感。除此之外，茶还能缓解感冒。咳嗽等不适症状，另外还有名目、降火、固齿、利尿等诸多作用。', '&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          1、兴奋作用:茶叶的咖啡碱能兴奋中枢神经系统,帮助人们振奋精神、增进思维、消除疲劳、提&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;高工作效率。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          2、利尿作用:茶叶中的咖啡碱和茶碱具有利尿作用,用于治疗水肿、水滞瘤。利用红茶糖水的解&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;毒、利尿作用能治疗急性黄疸型肝炎。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          3、强心解痉作用:咖啡碱具有强心、解痉、松弛平滑肌的功效,能解除支气管金銮，促进血液循&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;环,是治疗支气管哮喘、止咳化痰、心肌梗塞的良好辅助药物。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          4、抑制动脉硬化作用:茶叶中的茶多酚和维生素C都有活血化瘀防止动脉硬化的作用。所以经常&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;饮茶的人当中,高血压和冠心病的发病率较低。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          5、抗菌、抑菌作用:茶中的茶多酚和鞣酸作用于细菌,能凝固细菌的蛋白质,将细菌杀死。可用于&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;治疗肠道疾病，如霍乱、伤寒、痢疾、肠炎等。皮肤生疮、溃烂流脓，外伤破了皮,用浓茶冲洗&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;患处,有消炎杀菌作用。口腔发炎、溃烂、咽喉肿痛,用茶叶来治疗,也有一定疗效。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          6、减肥作用:茶中的咖啡碱、肌醇、叶酸、泛酸和芳香类物质等多种化合物,能调节脂肪代谢,特&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;别是乌龙茶对蛋白质和脂肪有很好的分解作用。茶多酚和维生素C能降低胆固醇和血脂,所以饮茶&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能减肥。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          7、防龋齿作用:茶中含有氟,氟离子与牙齿的钙质有很大的亲和力,能变成一种较为难溶于酸的“&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;氟磷灰石”,就象给牙齿加上一个保护层,提高了牙齿防酸抗龋能力。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          8、抑制癌细胞作用:据报道,茶叶中的黄酮类物质有不同程度的体外抗癌作用,作用较强的有牡荆&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;碱、桑色素和儿茶素。&lt;/span&gt;&lt;br /&gt;\n&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;          据介绍，可食性天然花果中含有各种植物精华和生物活性物质，每一种花果或花草都具有不同的&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;营养、保健和药用功效。紫玫瑰花： 调理内分泌失调、消除腰酸背痛，调气血、消疲劳，对伤&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;口愈合有效。红粉玫瑰花： 强肝、养胃、养颜美容、调经活血、行血气、安神、润肠通便。据&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;介绍，清晨空腹用红粉玫瑰加减脂茶冲泡，一个月可以瘦2~4公斤。薰衣草： 对缓和咳嗽及失眠&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有效，也可逐渐改善头痛症。薄荷： 餐宴后饮薄荷茶，可以使口气清新、帮助消化，对于提神&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;醒脑也极具功效。洋甘菊： 洋甘菊茶可有效改善失眠症状，对于神经痛及月经痛、肠胃炎也都&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;有明显效果。菊花茶： 疏散风热、平肝明目、清热解毒的作用。现代医学研究证实，菊花具有&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;降血压、扩张冠状动脉和抑菌的作用，长期饮用能增加人体钙质、调节心肌功能、降低胆固醇，&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;主要适合中老年人和预防流行性结膜炎时饮用。同时，菊花茶也具有一定的松弛神经、舒缓头痛&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;的功效。金银花茶： 清热解毒、疏散风热的作用。金银花为清热解毒之良药，既能清里热，又&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;能散表热，临床上主要用于治疗各种痈肿疮毒、热毒血痢及温热病等。金银花药性偏寒，不适合&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;长期饮用，仅适合在炎热的夏季暂时饮用以防治痢疾。特别需要提醒的是，虚寒体质及月经期内&lt;/span&gt;&lt;span style=&quot;font-family:\'Microsoft YaHei\';font-size:16px;&quot;&gt;不能饮用，否则，可能出现不良反应。&lt;/span&gt;', '1478846237', '5825671d4357c.jpg', '绿茶');

-- ----------------------------
-- Table structure for `ybc_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_auth_group`;
CREATE TABLE `ybc_auth_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(160) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_auth_group
-- ----------------------------
INSERT INTO `ybc_auth_group` VALUES ('1', '超级管理组', '1', '1,9,10,11,12,13,14,15,16,2,6,7,3,4,8,17,18,19,20,21,22,23,29,31,39,40,32,41,33,42,34,44,45,35,46,47,48,49,36,50,51,52,37,53,54,55,38,56');
INSERT INTO `ybc_auth_group` VALUES ('2', '品牌管理组', '1', '2,6,7');
INSERT INTO `ybc_auth_group` VALUES ('3', '分类管理员', '1', '3,4,8');
INSERT INTO `ybc_auth_group` VALUES ('4', '商品管理组', '1', '31,39,40,37,53,54,55');
INSERT INTO `ybc_auth_group` VALUES ('5', '会员管理组', '1', '23,29');
INSERT INTO `ybc_auth_group` VALUES ('6', '订单管理组', '1', '32,41,55');
INSERT INTO `ybc_auth_group` VALUES ('7', '评价管理组', '1', '33,42');
INSERT INTO `ybc_auth_group` VALUES ('8', '文章管理组', '1', '34,44,45');
INSERT INTO `ybc_auth_group` VALUES ('9', '广告管理组', '1', '35,46,47,48,49');
INSERT INTO `ybc_auth_group` VALUES ('10', '团购管理组', '1', '36,50,51,52');
INSERT INTO `ybc_auth_group` VALUES ('11', '积分管理组', '1', '37,53,54,55');
INSERT INTO `ybc_auth_group` VALUES ('15', '售后管理组', '1', '');
INSERT INTO `ybc_auth_group` VALUES ('16', '售后管理组', '1', '');

-- ----------------------------
-- Table structure for `ybc_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_auth_group_access`;
CREATE TABLE `ybc_auth_group_access` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL COMMENT '用户ID',
  `group_id` mediumint(8) NOT NULL COMMENT '用户组ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_auth_group_access
-- ----------------------------
INSERT INTO `ybc_auth_group_access` VALUES ('11', '22', '1');
INSERT INTO `ybc_auth_group_access` VALUES ('18', '23', '4');
INSERT INTO `ybc_auth_group_access` VALUES ('51', '20', '2');
INSERT INTO `ybc_auth_group_access` VALUES ('52', '20', '4');
INSERT INTO `ybc_auth_group_access` VALUES ('53', '21', '6');
INSERT INTO `ybc_auth_group_access` VALUES ('54', '21', '7');
INSERT INTO `ybc_auth_group_access` VALUES ('55', '21', '9');
INSERT INTO `ybc_auth_group_access` VALUES ('56', '17', '1');
INSERT INTO `ybc_auth_group_access` VALUES ('57', '24', '7');
INSERT INTO `ybc_auth_group_access` VALUES ('58', '18', '1');
INSERT INTO `ybc_auth_group_access` VALUES ('59', '26', '3');
INSERT INTO `ybc_auth_group_access` VALUES ('60', '27', '2');
INSERT INTO `ybc_auth_group_access` VALUES ('61', '28', '1');
INSERT INTO `ybc_auth_group_access` VALUES ('62', '29', '5');
INSERT INTO `ybc_auth_group_access` VALUES ('63', '30', '1');
INSERT INTO `ybc_auth_group_access` VALUES ('64', '30', '2');

-- ----------------------------
-- Table structure for `ybc_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_auth_rule`;
CREATE TABLE `ybc_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则名字',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1代表为可用  0代表为禁用',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，空就代表存在就验证，不为空代表按照条件验证',
  `pid` mediumint(8) NOT NULL DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_auth_rule
-- ----------------------------
INSERT INTO `ybc_auth_rule` VALUES ('1', 'Admin/Nav/system', '系统管理', '1', '1', '', '0', '1');
INSERT INTO `ybc_auth_rule` VALUES ('2', 'Admin/Nav/Brand', '品牌管理', '1', '1', '', '0', '2');
INSERT INTO `ybc_auth_rule` VALUES ('3', 'Admin/Nav/Category', '分类管理', '1', '1', '', '0', '3');
INSERT INTO `ybc_auth_rule` VALUES ('4', 'Admin/Category/index', '分类列表', '1', '1', '', '3', '3,4');
INSERT INTO `ybc_auth_rule` VALUES ('6', 'Admin/Brand/index', '品牌列表', '1', '1', '', '2', '2,6');
INSERT INTO `ybc_auth_rule` VALUES ('7', 'Admin/Brand/add', '添加品牌', '1', '1', '', '2', '2,7');
INSERT INTO `ybc_auth_rule` VALUES ('8', 'Admin/Category/cate', '添加分类', '1', '1', '', '3', '3,8');
INSERT INTO `ybc_auth_rule` VALUES ('9', 'Admin/Index/main', '后台首页', '1', '1', '', '1', '1,9');
INSERT INTO `ybc_auth_rule` VALUES ('17', 'Admin/Auth/manage', '权限管理', '1', '1', '', '0', '17');
INSERT INTO `ybc_auth_rule` VALUES ('18', 'Admin/AuthGroup/index', '管理组列表', '1', '1', '', '17', '17,18');
INSERT INTO `ybc_auth_rule` VALUES ('19', 'Admin/AuthGroup/add', '添加管理组', '1', '1', '', '17', '17,19');
INSERT INTO `ybc_auth_rule` VALUES ('20', 'Admin/Admin/index', '管理员列表', '1', '1', '', '17', '17,20');
INSERT INTO `ybc_auth_rule` VALUES ('21', 'Admin/Admin/add', '添加管理员', '1', '1', '', '17', '17,21');
INSERT INTO `ybc_auth_rule` VALUES ('22', 'Admin/AuthRule/index', '权限列表', '1', '1', '', '17', '17,22');
INSERT INTO `ybc_auth_rule` VALUES ('23', 'Admin/Nav/Member', '会员管理', '1', '1', '', '0', '23');
INSERT INTO `ybc_auth_rule` VALUES ('29', 'Admin/Member/index', '会员列表', '1', '1', '', '23', '23,29');
INSERT INTO `ybc_auth_rule` VALUES ('31', 'Admin/Nav/Goods', '商品管理', '1', '1', '', '0', '31');
INSERT INTO `ybc_auth_rule` VALUES ('32', 'Admin/Nav/Order', '订单管理', '1', '1', '', '0', '32');
INSERT INTO `ybc_auth_rule` VALUES ('33', 'Admin/Nav/Comment', '评价管理', '1', '1', '', '0', '33');
INSERT INTO `ybc_auth_rule` VALUES ('34', 'Admin/Nav/Article', '文章管理', '1', '1', '', '0', '34');
INSERT INTO `ybc_auth_rule` VALUES ('35', 'Admin/Nav/Adcategory', '广告管理', '1', '1', '', '0', '35');
INSERT INTO `ybc_auth_rule` VALUES ('36', 'Admin/Nav/Group', '团购管理', '1', '1', '', '0', '36');
INSERT INTO `ybc_auth_rule` VALUES ('37', 'Admin/Nav/Integral', '积分商城', '1', '1', '', '0', '37');
INSERT INTO `ybc_auth_rule` VALUES ('38', 'Admin/Nav/Services', '售后管理', '1', '1', '', '0', '38');
INSERT INTO `ybc_auth_rule` VALUES ('39', 'Admin/Goods/index', '商品列表', '1', '1', '', '31', '31,39');
INSERT INTO `ybc_auth_rule` VALUES ('40', 'Admin/Goods/add', '添加商品', '1', '1', '', '31', '31,40');
INSERT INTO `ybc_auth_rule` VALUES ('41', 'Admin/Order/index', '订单列表', '1', '1', '', '32', '32,41');
INSERT INTO `ybc_auth_rule` VALUES ('42', 'Admin/Comment/commentList', '评价列表', '1', '1', '', '33', '33,42');
INSERT INTO `ybc_auth_rule` VALUES ('44', 'Admin/Article/index', '文章列表', '1', '1', '', '34', '34,44');
INSERT INTO `ybc_auth_rule` VALUES ('45', 'Admin/Article/add', '发布文章', '1', '1', '', '34', '34,45');
INSERT INTO `ybc_auth_rule` VALUES ('46', 'Admin/Adcategory/index', '广告分类列表', '1', '1', '', '35', '35,46');
INSERT INTO `ybc_auth_rule` VALUES ('47', 'Admin/Adcategory/addCategory', '添加广告分类', '1', '1', '', '35', '35,47');
INSERT INTO `ybc_auth_rule` VALUES ('48', 'Admin/Adgood/index', '广告商品列表', '1', '1', '', '35', '35,48');
INSERT INTO `ybc_auth_rule` VALUES ('49', 'Admin/Adgood/add', '添加广告商品', '1', '1', '', '35', '35,49');
INSERT INTO `ybc_auth_rule` VALUES ('50', 'Admin/Group/index', '团购列表', '1', '1', '', '36', '36,50');
INSERT INTO `ybc_auth_rule` VALUES ('51', 'Admin/Group/add', '发布团购', '1', '1', '', '36', '36,51');
INSERT INTO `ybc_auth_rule` VALUES ('52', 'Admin/Group/send_email', '发送邮件', '1', '1', '', '36', '36,52');
INSERT INTO `ybc_auth_rule` VALUES ('53', 'Admin/Integral/index', '商品列表', '1', '1', '', '37', '37,53');
INSERT INTO `ybc_auth_rule` VALUES ('54', 'Admin/integral/add', '添加商品', '1', '1', '', '37', '37,54');
INSERT INTO `ybc_auth_rule` VALUES ('55', 'Admin/IntegralOrder/IntegralOrder', '订单列表', '1', '1', '', '37', '37,55');
INSERT INTO `ybc_auth_rule` VALUES ('56', 'Admin/Services/index', '申请列表', '1', '1', '', '38', '38,56');
INSERT INTO `ybc_auth_rule` VALUES ('57', 'Admin/AdminNav/index', '菜单列表', '1', '1', '', '1', '1,57');
INSERT INTO `ybc_auth_rule` VALUES ('58', 'Admin/AdminNav/add', '添加菜单', '1', '1', '', '1', '1,58');
INSERT INTO `ybc_auth_rule` VALUES ('59', 'Admin/Index/send_message', '发送站内信', '1', '1', '', '1', '1,59');
INSERT INTO `ybc_auth_rule` VALUES ('60', 'Admin/AuthRule/add', '添加权限', '1', '1', '', '17', '17,60');
INSERT INTO `ybc_auth_rule` VALUES ('61', 'Admin/AdminNav/index/add', '添加子菜单', '1', '1', '', '57', '1,57,61');
INSERT INTO `ybc_auth_rule` VALUES ('62', 'Admin/AdminNav/index/edit', '编辑', '1', '1', '', '57', '1,57,62');
INSERT INTO `ybc_auth_rule` VALUES ('63', 'Admin/AdminNav/index/del', '删除', '1', '1', '', '57', '1,57,63');
INSERT INTO `ybc_auth_rule` VALUES ('64', 'Admin/AdminNav/add/add', '确认添加', '1', '1', '', '58', '1,58,64');
INSERT INTO `ybc_auth_rule` VALUES ('65', 'Admin/Index/send_message/send_message', '马上发送', '1', '1', '', '59', '1,59,65');
INSERT INTO `ybc_auth_rule` VALUES ('66', 'Admin/AuthGroup/index/addMember', '添加组员', '1', '1', '', '18', '17,18,66');
INSERT INTO `ybc_auth_rule` VALUES ('67', 'Admin/AuthGroup/index/allocateRule', '分配权限', '1', '1', '', '18', '17,18,67');
INSERT INTO `ybc_auth_rule` VALUES ('68', 'Admin/AuthGroup/index/edit', '编辑', '1', '1', '', '18', '17,18,68');
INSERT INTO `ybc_auth_rule` VALUES ('69', 'Admin/AuthGroup/index/del', '删除', '1', '1', '', '18', '17,18,69');
INSERT INTO `ybc_auth_rule` VALUES ('70', 'Admin/AuthGroup/add/add', '确认添加', '1', '1', '', '19', '17,19,70');
INSERT INTO `ybc_auth_rule` VALUES ('71', 'Admin/Admin/index/stopuse', '禁用', '1', '1', '', '20', '17,20,71');
INSERT INTO `ybc_auth_rule` VALUES ('72', 'Admin/Admin/index/startuse', '启用', '1', '1', '', '20', '17,20,72');
INSERT INTO `ybc_auth_rule` VALUES ('73', 'Admin/Admin/index/edit', '编辑', '1', '1', '', '20', '17,20,73');
INSERT INTO `ybc_auth_rule` VALUES ('74', 'Admin/Admin/add/add', '确认添加', '1', '1', '', '21', '17,21,74');
INSERT INTO `ybc_auth_rule` VALUES ('75', 'Admin/AuthRule/index/add', '添加子权限', '1', '1', '', '22', '17,22,75');
INSERT INTO `ybc_auth_rule` VALUES ('76', 'Admin/AuthRule/index/edit', '编辑', '1', '1', '', '22', '17,22,76');
INSERT INTO `ybc_auth_rule` VALUES ('77', 'Admin/AuthRule/index/del', '删除', '1', '1', '', '22', '17,22,77');
INSERT INTO `ybc_auth_rule` VALUES ('78', 'Admin/AuthRule/add/add', '确认添加', '1', '1', '', '60', '17,60,78');
INSERT INTO `ybc_auth_rule` VALUES ('79', 'Admin/Brand/index/edit', '展示与下架', '1', '1', '', '6', '2,6,79');
INSERT INTO `ybc_auth_rule` VALUES ('81', 'Admin/Brand/index/delete', '删除', '1', '1', '', '6', '2,6,81');
INSERT INTO `ybc_auth_rule` VALUES ('82', 'Admin/Brand/add/add', '马上添加', '1', '1', '', '7', '2,7,82');
INSERT INTO `ybc_auth_rule` VALUES ('83', 'Admin/Member/index/stopuse', '停用', '1', '1', '', '29', '23,29,83');
INSERT INTO `ybc_auth_rule` VALUES ('84', 'Admin/Member/index/startuse', '启用', '1', '1', '', '29', '23,29,84');
INSERT INTO `ybc_auth_rule` VALUES ('85', 'Admin/Member/index/index', '查询', '1', '1', '', '29', '23,29,85');
INSERT INTO `ybc_auth_rule` VALUES ('86', 'Admin/Member/index/export', '导出会员表', '1', '1', '', '29', '23,29,86');
INSERT INTO `ybc_auth_rule` VALUES ('87', 'Admin/Member/index/deluse', '删除', '1', '1', '', '29', '23,29,87');
INSERT INTO `ybc_auth_rule` VALUES ('88', 'Admin/Member/index/userdetail', '查看', '1', '1', '', '29', '23,29,88');
INSERT INTO `ybc_auth_rule` VALUES ('89', 'Admin/Member/index/message', '发送通知', '1', '1', '', '29', '23,29,89');
INSERT INTO `ybc_auth_rule` VALUES ('90', 'Admin/Category/index/index', '查询', '1', '1', '', '4', '3,4,90');
INSERT INTO `ybc_auth_rule` VALUES ('91', 'Admin/Category/index/excel', '导出分类列表', '1', '1', '', '4', '3,4,91');
INSERT INTO `ybc_auth_rule` VALUES ('92', 'Admin/Category/cate/add', '马上添加', '1', '1', '', '8', '3,8,92');
INSERT INTO `ybc_auth_rule` VALUES ('93', 'Admin/Category/index/edit', '展示与下架', '1', '1', '', '4', '3,4,93');
INSERT INTO `ybc_auth_rule` VALUES ('95', 'Admin/Category/index/editcate', '编辑', '1', '1', '', '4', '3,4,95');
INSERT INTO `ybc_auth_rule` VALUES ('96', 'Admin/Category/index/delete', '删除', '1', '1', '', '4', '3,4,96');
INSERT INTO `ybc_auth_rule` VALUES ('97', 'Admin/Goods/index/index', '查询', '1', '1', '', '39', '31,39,97');
INSERT INTO `ybc_auth_rule` VALUES ('98', 'Admin/Goods/index/excel', '导出商品列表', '1', '1', '', '39', '31,39,98');
INSERT INTO `ybc_auth_rule` VALUES ('101', 'Admin/Goods/index/show', '展示与下架', '1', '1', '', '39', '31,39,101');
INSERT INTO `ybc_auth_rule` VALUES ('102', 'Admin/Goods/edit/editgoods', '编辑', '1', '1', '', '39', '31,39,102');
INSERT INTO `ybc_auth_rule` VALUES ('103', 'Admin/Goods/index/delete', '删除', '1', '1', '', '39', '31,39,103');
INSERT INTO `ybc_auth_rule` VALUES ('104', 'Admin/Group/publish/publish', '发布团购', '1', '1', '', '39', '31,39,104');
INSERT INTO `ybc_auth_rule` VALUES ('105', 'Admin/Goods/add/addgoods', '马上添加', '1', '1', '', '40', '31,40,105');
INSERT INTO `ybc_auth_rule` VALUES ('106', 'Admin/Order/index/index', '查询', '1', '1', '', '41', '32,41,106');
INSERT INTO `ybc_auth_rule` VALUES ('107', 'Admin/Order/index/export', '导出当前订单列表', '1', '1', '', '41', '32,41,107');
INSERT INTO `ybc_auth_rule` VALUES ('108', 'Admin/Order/detail/detail', '查看', '1', '1', '', '41', '32,41,108');
INSERT INTO `ybc_auth_rule` VALUES ('109', 'Admin/Comment/commentList/commentList', '查询', '1', '1', '', '42', '33,42,109');
INSERT INTO `ybc_auth_rule` VALUES ('110', 'Admin/Comment/commentDetail/editComment', '回复', '1', '1', '', '42', '33,42,110');
INSERT INTO `ybc_auth_rule` VALUES ('111', 'Admin/Comment/commentDetail/commentDetail', '详情', '1', '1', '', '42', '33,42,111');
INSERT INTO `ybc_auth_rule` VALUES ('112', 'Admin/Comment/commentList/delComment', '删除', '1', '1', '', '42', '33,42,112');
INSERT INTO `ybc_auth_rule` VALUES ('113', 'Admin/Article/index/index', '查询', '1', '1', '', '44', '34,44,113');
INSERT INTO `ybc_auth_rule` VALUES ('114', 'Admin/Article/index/export', '导出文章表', '1', '1', '', '44', '34,44,114');
INSERT INTO `ybc_auth_rule` VALUES ('115', 'Admin/Article/modify/modify', '修改', '1', '1', '', '44', '34,44,115');
INSERT INTO `ybc_auth_rule` VALUES ('116', 'Admin/Article/index/del', '删除', '1', '1', '', '44', '34,44,116');
INSERT INTO `ybc_auth_rule` VALUES ('117', 'Admin/Article/modify/mod', '马上修改', '1', '1', '', '115', '34,44,115,117');
INSERT INTO `ybc_auth_rule` VALUES ('118', 'Admin/Article/add/addArticle', '马上发布', '1', '1', '', '45', '34,45,118');
INSERT INTO `ybc_auth_rule` VALUES ('119', 'Admin/Adcategory/index/index', '查询', '1', '1', '', '46', '35,46,119');
INSERT INTO `ybc_auth_rule` VALUES ('120', 'Admin/Adcategory/index/putAway', '展示与下架', '1', '1', '', '46', '35,46,120');
INSERT INTO `ybc_auth_rule` VALUES ('121', 'Admin/Adcategory/index/del', '删除', '1', '1', '', '46', '35,46,121');
INSERT INTO `ybc_auth_rule` VALUES ('122', 'Admin/Adcategory/addCategory/addAdCate', '确认添加', '1', '1', '', '47', '35,47,122');
INSERT INTO `ybc_auth_rule` VALUES ('123', 'Admin/Adgood/index/index', '查询', '1', '1', '', '48', '35,48,123');
INSERT INTO `ybc_auth_rule` VALUES ('124', 'Admin/Adgood/index/export', '导出广告商品表', '1', '1', '', '48', '35,48,124');
INSERT INTO `ybc_auth_rule` VALUES ('125', 'Admin/Adgood/index/edit', '编辑', '1', '1', '', '48', '35,48,125');
INSERT INTO `ybc_auth_rule` VALUES ('126', 'Admin/Adgood/index/edit/editGood', '确认修改', '1', '1', '', '125', '35,48,125,126');
INSERT INTO `ybc_auth_rule` VALUES ('127', 'Admin/Adgood/add/add', '马上发布', '1', '1', '', '49', '35,49,127');
INSERT INTO `ybc_auth_rule` VALUES ('128', 'Admin/Group/index/index', '查询', '1', '1', '', '50', '36,50,128');
INSERT INTO `ybc_auth_rule` VALUES ('129', 'Admin/Group/index/export', '导出团购表', '1', '1', '', '50', '36,50,129');
INSERT INTO `ybc_auth_rule` VALUES ('130', 'Admin/Group/index/put', '上架与下架', '1', '1', '', '50', '36,50,130');
INSERT INTO `ybc_auth_rule` VALUES ('131', 'Admin/Group/index/del', '删除', '1', '1', '', '50', '36,50,131');
INSERT INTO `ybc_auth_rule` VALUES ('132', 'Admin/Group/edit/edit', '编辑', '1', '1', '', '50', '36,50,132');
INSERT INTO `ybc_auth_rule` VALUES ('133', 'Admin/Group/add/add', '马上发布', '1', '1', '', '51', '36,51,133');
INSERT INTO `ybc_auth_rule` VALUES ('134', 'Admin/Group/send_email/send_mail', '马上发送', '1', '1', '', '52', '36,52,134');

-- ----------------------------
-- Table structure for `ybc_brand`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_brand`;
CREATE TABLE `ybc_brand` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `brandname` varchar(50) NOT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1代表展示，0代表下架',
  `addtime` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_brand
-- ----------------------------
INSERT INTO `ybc_brand` VALUES ('48', '微六/WeiLiu', '5810561b69ccd.jpg', '1', '1477465627');
INSERT INTO `ybc_brand` VALUES ('49', '八马/BaMa', '5810562f0117c.jpg', '1', '1477465646');
INSERT INTO `ybc_brand` VALUES ('50', '御茶/YuCha', '58105647e0575.jpg', '1', '1477465671');
INSERT INTO `ybc_brand` VALUES ('51', '尚陶茶具/ChangTao', '58105663ecf0a.jpg', '1', '1477465699');
INSERT INTO `ybc_brand` VALUES ('52', '塔山/TaShan', '581056d5da05e.jpg', '1', '1477465813');
INSERT INTO `ybc_brand` VALUES ('53', '君山茶叶/JunShan', '58105738a6ab0.jpg', '1', '1477465912');
INSERT INTO `ybc_brand` VALUES ('54', '龙门堂/LongMen', '5810577213083.jpg', '0', '1477465970');
INSERT INTO `ybc_brand` VALUES ('55', 'gfhgf', '5840db87e90ff.jpg', '1', '1480645511');

-- ----------------------------
-- Table structure for `ybc_cart`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_cart`;
CREATE TABLE `ybc_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL COMMENT '用户id',
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `buynum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `addtime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_cart
-- ----------------------------
INSERT INTO `ybc_cart` VALUES ('15', '1', '37', '4', '1477567710');
INSERT INTO `ybc_cart` VALUES ('17', '1', '51', '1', '1477570826');
INSERT INTO `ybc_cart` VALUES ('18', '1', '48', '1', '1477570875');
INSERT INTO `ybc_cart` VALUES ('24', '9', '30', '2', '1477989524');
INSERT INTO `ybc_cart` VALUES ('36', '3', '46', '1', '1478002099');
INSERT INTO `ybc_cart` VALUES ('144', '33', '144', '1', '1480645783');
INSERT INTO `ybc_cart` VALUES ('238', '12', '30', '1', '1479458169');
INSERT INTO `ybc_cart` VALUES ('239', '2', '131', '2', '1479461278');
INSERT INTO `ybc_cart` VALUES ('240', '2', '146', '1', '1479461464');
INSERT INTO `ybc_cart` VALUES ('241', '2', '65', '1', '1479461470');
INSERT INTO `ybc_cart` VALUES ('247', '8', '37', '1', '1480589467');

-- ----------------------------
-- Table structure for `ybc_category`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_category`;
CREATE TABLE `ybc_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL,
  `pid` int(10) NOT NULL COMMENT '子商品id',
  `path` varchar(50) DEFAULT NULL,
  `active` tinyint(10) NOT NULL DEFAULT '1' COMMENT '1代表展示，0代表下架',
  `addtime` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_category
-- ----------------------------
INSERT INTO `ybc_category` VALUES ('26', '乌龙茶', '0', '26', '1', '1477466016');
INSERT INTO `ybc_category` VALUES ('27', '绿茶', '0', '27', '1', '1477466024');
INSERT INTO `ybc_category` VALUES ('28', '红茶', '0', '28', '1', '1477466032');
INSERT INTO `ybc_category` VALUES ('29', '黑茶', '0', '29', '1', '1477466038');
INSERT INTO `ybc_category` VALUES ('30', '黄茶', '0', '30', '1', '1477466045');
INSERT INTO `ybc_category` VALUES ('31', '安溪铁观音', '26', '26,31', '1', '1477466062');
INSERT INTO `ybc_category` VALUES ('32', '武夷大红袍', '26', '26,32', '1', '1477466073');
INSERT INTO `ybc_category` VALUES ('33', '台湾高山茶', '26', '26,33', '1', '1477466084');
INSERT INTO `ybc_category` VALUES ('34', '龙井', '27', '27,34', '1', '1477466097');
INSERT INTO `ybc_category` VALUES ('35', '碧螺春', '27', '27,35', '1', '1477466104');
INSERT INTO `ybc_category` VALUES ('36', '黄山毛峰', '27', '27,36', '1', '1477466118');
INSERT INTO `ybc_category` VALUES ('37', '金骏眉', '28', '28,37', '1', '1477466137');
INSERT INTO `ybc_category` VALUES ('38', '正山小种', '28', '28,38', '1', '1477466151');
INSERT INTO `ybc_category` VALUES ('39', '祁门红茶', '28', '28,39', '1', '1477466160');
INSERT INTO `ybc_category` VALUES ('40', '普洱茶', '29', '29,40', '1', '1477466172');
INSERT INTO `ybc_category` VALUES ('41', '安化黑茶', '29', '29,41', '1', '1477466179');
INSERT INTO `ybc_category` VALUES ('42', '君山银针', '30', '30,42', '1', '1477466211');
INSERT INTO `ybc_category` VALUES ('43', '霍山黄牙', '30', '30,43', '1', '1477466223');
INSERT INTO `ybc_category` VALUES ('44', '茶具', '0', '44', '1', '1477475278');
INSERT INTO `ybc_category` VALUES ('45', '陶瓷茶具', '44', '44,45', '1', '1477475298');
INSERT INTO `ybc_category` VALUES ('46', '紫砂茶具', '44', '44,46', '1', '1477475306');
INSERT INTO `ybc_category` VALUES ('48', '玻璃茶具', '32', '26,32,48', '1', '1477475436');
INSERT INTO `ybc_category` VALUES ('49', 'ghchch', '0', '49', '1', '1480645583');

-- ----------------------------
-- Table structure for `ybc_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_comment`;
CREATE TABLE `ybc_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(10) unsigned NOT NULL,
  `mid` int(10) unsigned NOT NULL COMMENT '用户id',
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `text` varchar(420) NOT NULL DEFAULT '好评！' COMMENT '评论内容',
  `addtime` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL COMMENT '1代表好评，2代表中评，3代表差评',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_comment
-- ----------------------------
INSERT INTO `ybc_comment` VALUES ('3', '27', '6', '39', '很好！', '1478503531', '1');
INSERT INTO `ybc_comment` VALUES ('4', '2', '6', '29', '一般吧', '1478662240', '2');
INSERT INTO `ybc_comment` VALUES ('7', '54', '8', '49', '棒棒棒', '1477890290', '1');
INSERT INTO `ybc_comment` VALUES ('8', '5', '6', '46', '很不错吖', '1479021029', '1');
INSERT INTO `ybc_comment` VALUES ('9', '1', '8', '29', '包装不行啊', '1478509654', '3');
INSERT INTO `ybc_comment` VALUES ('10', '12', '6', '65', 'sdasdasdasd', '1478510442', '1');
INSERT INTO `ybc_comment` VALUES ('11', '47', '12', '100', '1111', '1478517891', '1');
INSERT INTO `ybc_comment` VALUES ('12', '48', '12', '100', '41515', '1480065505', '1');
INSERT INTO `ybc_comment` VALUES ('13', '52', '6', '75', '实物跟图片不一样', '1479720804', '1');
INSERT INTO `ybc_comment` VALUES ('14', '49', '6', '31', '第二次买了，还不错', '1478522239', '1');
INSERT INTO `ybc_comment` VALUES ('15', '50', '6', '31', '很好吖', '1478522299', '1');
INSERT INTO `ybc_comment` VALUES ('16', '66', '2', '31', '6666666666666666666666666666', '1478609104', '1');
INSERT INTO `ybc_comment` VALUES ('17', '58', '2', '29', '不错不错，经常来买，老板人很好，做评价这一块的人也很666666666', '1478609684', '1');
INSERT INTO `ybc_comment` VALUES ('18', '83', '12', '29', '55555555555555', '1478689114', '2');
INSERT INTO `ybc_comment` VALUES ('19', '65', '6', '39', '很不错！', '1478690833', '1');
INSERT INTO `ybc_comment` VALUES ('20', '64', '6', '42', '挺不错的~', '1478691617', '1');
INSERT INTO `ybc_comment` VALUES ('21', '62', '6', '106', '可以可以', '1478692352', '1');
INSERT INTO `ybc_comment` VALUES ('22', '16', '6', '31', '不错不错', '1478694351', '1');
INSERT INTO `ybc_comment` VALUES ('23', '20', '6', '32', '很好', '1478694591', '1');
INSERT INTO `ybc_comment` VALUES ('24', '59', '6', '29', '很好', '1478694697', '1');
INSERT INTO `ybc_comment` VALUES ('25', '63', '6', '105', '好好好', '1478695818', '1');
INSERT INTO `ybc_comment` VALUES ('26', '60', '6', '65', '很好', '1478696008', '1');
INSERT INTO `ybc_comment` VALUES ('27', '61', '6', '68', '很好', '1478696052', '1');
INSERT INTO `ybc_comment` VALUES ('32', '28', '2', '30', '热忽而', '1478697093', '1');
INSERT INTO `ybc_comment` VALUES ('33', '17', '2', '32', '包装好看', '1479087457', '1');
INSERT INTO `ybc_comment` VALUES ('34', '109', '8', '77', '外观很漂亮，做工也很好，杯子摸起来很舒服，卖家态度很好，发货很及时，下次还来！', '1479106477', '1');
INSERT INTO `ybc_comment` VALUES ('35', '115', '2', '75', '有点假', '1479450368', '3');
INSERT INTO `ybc_comment` VALUES ('36', '118', '6', '145', 'aqaaa  dasdsa ', '1479720594', '1');
INSERT INTO `ybc_comment` VALUES ('37', '134', '23', '145', '当发送多个号房间爱上', '1479882631', '1');
INSERT INTO `ybc_comment` VALUES ('38', '135', '23', '144', '东西很好', '1479882943', '1');
INSERT INTO `ybc_comment` VALUES ('39', '110', '8', '38', 'good', '1480057837', '1');
INSERT INTO `ybc_comment` VALUES ('40', '151', '29', '70', '哎呦，不错哦', '1480580007', '1');
INSERT INTO `ybc_comment` VALUES ('41', '105', '6', '38', 'dsss', '1480646170', '1');
INSERT INTO `ybc_comment` VALUES ('42', '122', '6', '70', 'shaga ', '1480646129', '1');

-- ----------------------------
-- Table structure for `ybc_comment_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_comment_admin`;
CREATE TABLE `ybc_comment_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '管理员id',
  `cid` int(10) unsigned NOT NULL COMMENT '用户评论的id',
  `text` varchar(210) NOT NULL COMMENT '回复内容',
  `addtime` int(10) unsigned NOT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_comment_admin
-- ----------------------------
INSERT INTO `ybc_comment_admin` VALUES ('1', '2', '1', '欢迎下次购买！', '1478083531');
INSERT INTO `ybc_comment_admin` VALUES ('2', '5', '3', '谢谢您的评价！', '1478189652');
INSERT INTO `ybc_comment_admin` VALUES ('5', '4', '7', '么么哒~', '1478691029');
INSERT INTO `ybc_comment_admin` VALUES ('38', '3', '8', '感谢您的评价！', '1478245433');
INSERT INTO `ybc_comment_admin` VALUES ('39', '3', '2', '感谢！', '1478245526');
INSERT INTO `ybc_comment_admin` VALUES ('40', '4', '9', '我们会进行改善的，亲~', '1478510748');
INSERT INTO `ybc_comment_admin` VALUES ('41', '4', '11', '1514545', '1478517966');
INSERT INTO `ybc_comment_admin` VALUES ('42', '15', '27', '么么哒', '1478748159');
INSERT INTO `ybc_comment_admin` VALUES ('43', '18', '34', '感谢您的认可！', '1479172635');
INSERT INTO `ybc_comment_admin` VALUES ('44', '22', '36', '666', '1480503757');
INSERT INTO `ybc_comment_admin` VALUES ('46', '22', '37', '111', '1480503796');
INSERT INTO `ybc_comment_admin` VALUES ('47', '22', '12', '感谢亲', '1480591795');
INSERT INTO `ybc_comment_admin` VALUES ('48', '22', '41', 'aaa', '1480646246');

-- ----------------------------
-- Table structure for `ybc_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods`;
CREATE TABLE `ybc_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(60) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `price` float(20,2) unsigned NOT NULL COMMENT '商城价格',
  `oldprice` float(20,2) unsigned DEFAULT NULL COMMENT '原价',
  `detail` varchar(10000) DEFAULT NULL COMMENT '商品详情',
  `weight` int(10) unsigned DEFAULT NULL COMMENT '商品重量',
  `changetime` int(20) unsigned DEFAULT NULL COMMENT '商品修改时间',
  `addtime` int(20) unsigned NOT NULL COMMENT '商品上架时间',
  `cid` tinyint(10) unsigned NOT NULL COMMENT '关联分类id',
  `salenum` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  `num` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '展示/下架',
  `bid` varchar(20) NOT NULL COMMENT '关联品牌分类表',
  `group` tinyint(1) unsigned DEFAULT '0' COMMENT '0代表不是团购商品，1代表是团购商品',
  `ad` tinyint(1) unsigned DEFAULT '0' COMMENT '0代表为不是广告商品，1代表是广告商品',
  `commentnum` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '商品评论人数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods
-- ----------------------------
INSERT INTO `ybc_goods` VALUES ('29', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '400.00', '500.00', '&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081110_64321.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081118_44681.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081147_96176.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081207_54673.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081220_96874.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081227_21027.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081237_43563.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081242_62923.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081250_56829.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081255_94229.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081300_18195.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081306_70998.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081318_87623.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081323_58974.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081329_51011.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081334_31085.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081340_17695.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026081345_24949.jpg&quot; alt=&quot;&quot; /&gt;', '250', '1534567980', '1477469646', '31', '23', '77', '1', '48', '1', '0', '6');
INSERT INTO `ybc_goods` VALUES ('30', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '400.00', '460.00', '&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085842_12362.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085850_36996.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085858_65706.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085905_26817.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085912_95275.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085918_57727.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085923_36032.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085928_60468.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085935_78873.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085940_52970.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085945_18135.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085950_27850.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026085958_39091.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090003_19912.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090008_65453.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090016_83649.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090021_96868.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090026_90741.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/Public/Admin/js/kindeditor/attached/image/20161026/20161026090032_96423.jpg&quot; alt=&quot;&quot; /&gt;', '150', '1345679800', '1477472441', '31', '1', '99', '1', '48', '1', '0', '1');
INSERT INTO `ybc_goods` VALUES ('32', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109c1f4fb91.jpg', '300.00', '450.00', '2222', '250', null, '1477483555', '32', '0', '100', '1', '49', '1', '0', '2');
INSERT INTO `ybc_goods` VALUES ('35', '安溪铁观音 2016秋茶 乌龙茶 清香型 正炒 特级 老茶师精制 250g', '58109db24e06b.jpg', '888.00', '968.00', '', '250', null, '1477483958', '31', '0', '100', '1', '50', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('37', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g', '5810a16a422c3.jpg', '508.00', '608.00', '', '100', null, '1477484909', '34', '1', '99', '1', '53', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('38', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '111.00', '295.00', '', '100', null, '1477485513', '34', '36', '64', '1', '53', '1', '0', '2');
INSERT INTO `ybc_goods` VALUES ('39', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '380.00', '899.00', '', '100', null, '1479884426', '34', '12', '88', '1', '53', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('40', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴 ', '5810a4e8027b2.jpg', '120.00', '130.00', '', '150', null, '1477485803', '35', '0', '100', '1', '53', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('41', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 300g 雨前俏峰礼盒', '5810a598f147d.jpg', '100.00', '1450.00', '', '150', null, '1477485980', '35', '1', '99', '1', '53', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('42', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '208.00', '218.00', '', '200', null, '1477486041', '36', '9', '91', '1', '52', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('44', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴 MF1100-50g', '5810a66773807.jpg', '53.00', '118.00', '', '100', null, '1479884407', '36', '5', '95', '1', '52', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('46', '德化德鸿窑 陶瓷茶具 功夫茶丁花瓷', '5811da843e334.jpg', '330.00', '370.00', '', '80', null, '1477565063', '45', '0', '100', '1', '54', '1', '0', '1');
INSERT INTO `ybc_goods` VALUES ('47', '台湾建窑 紫砂茶具 套组 鱼跃龙门 300ml 3件套', '5811dc904fc5c.jpg', '1000.00', '1500.00', '', '200', null, '1477565587', '46', '0', '1000', '1', '54', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('48', '宜兴紫砂壶 原矿紫泥 集思刻花壶285ml卢小伟精制', '5811dd931dace.jpg', '368.00', '880.00', '', '200', null, '1479884493', '46', '0', '100', '1', '54', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('49', '成艺陶瓷茶具 和为贵7入 手绘青花瓷        红茶茶具 礼盒 ', '5811e189eb7f4.jpg', '88.00', '83.00', '', '100', null, '1477566861', '48', '2', '98', '1', '54', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('50', '金灶玻璃茶具 专利弹压式茶道杯 TP160 飘逸杯 500ml', '5811e1f998d3e.jpg', '40.00', '49.00', '', '50', null, '1477566973', '48', '0', '100', '1', '50', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('58', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入', '581c7f568ee1e.jpg', '260.00', '390.00', '', '150', '1478262614', '1477997090', '45', '0', '100', '1', '51', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('59', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制', '581872b8aabd8.jpg', '419.00', '718.00', '', '160', '1478262029', '1477997241', '46', '0', '200', '1', '54', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('63', '宝泽台湾高山茶 2015春茶 乌龙茶 宝泽叁号-四季春 150g', '581c8134aa73b.jpg', '249.00', '380.00', '111', '150', null, '1478263093', '33', '1', '99', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('65', '宝泽台湾高山茶 2016春茶 乌龙茶 阿里山高山乌龙 150g', '581c818c29ca6.jpg', '249.00', '350.00', '', '150', null, '1478263181', '32', '4', '96', '1', '49', '0', '0', '2');
INSERT INTO `ybc_goods` VALUES ('68', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '880.00', '1128.00', '', '150', null, '1478263446', '31', '26', '74', '1', '50', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('70', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '1100.00', '1410.00', '', '150', null, '1478263632', '32', '12', '88', '1', '50', '0', '0', '2');
INSERT INTO `ybc_goods` VALUES ('71', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g1', '581c83dc93f6c.jpg', '258.00', '600.00', '', '200', null, '1478263773', '34', '1', '149', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('72', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g2', '581c849de6bde.jpg', '560.00', '900.00', '', '150', null, '1478263966', '35', '4', '96', '1', '48', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('73', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g3', '581c850e7746b.jpg', '345.00', '565.00', '', '120', null, '1478264079', '36', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('74', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g4', '581c85eae3944.jpg', '568.00', '988.00', '', '150', null, '1478264299', '34', '100', '0', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('75', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '581c8a0353c5a.jpg', '350.00', '560.00', '', '150', '1478265347', '1478264583', '45', '13', '986', '1', '54', '0', '0', '2');
INSERT INTO `ybc_goods` VALUES ('76', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入1', '581c8748abeaa.jpg', '76.00', '985.00', '', '150', null, '1478264649', '45', '0', '100', '1', '54', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('77', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入2', '581c8789c3495.jpg', '300.00', '510.00', '', '150', null, '1478264714', '46', '4', '96', '1', '54', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('78', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入3', '581c87c5f0cdf.jpg', '540.00', '1150.00', '', '150', null, '1478264774', '46', '1', '99', '1', '54', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('79', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入4', '581c88109800c.jpg', '150.00', '510.00', '', '100', null, '1478264849', '48', '0', '100', '1', '54', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('80', '【有机茶】醉品朴茶 东方美人 乌龙茶 2016春茶 特级 66g 单罐', '581c8b97054c1.jpg', '120000.00', '160000.00', '', '66', null, '1478265751', '33', '0', '10', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('81', '武夷岩茶 2016春茶 乌龙茶 黄观音 轻火 一级 380g 茶者静也 米色礼盒', '581d2d99ed0b0.jpg', '1500.00', '1800.00', '', '380', null, '1478307225', '32', '0', '200', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('82', '安溪铁观音 2016秋茶 乌龙茶 清香型 消正 二级 知音 130g', '581d2e15d2845.jpg', '1200.00', '1800.00', '', '130', null, '1478307349', '33', '0', '220', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('84', '醉品朴茶 安溪铁观音 2017秋茶 乌龙茶 清香型 正炒 一级 醇朴 220g', '581d2eb86ec67.jpg', '1400.00', '1900.00', '', '220', null, '1478307512', '35', '0', '100', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('85', '金骏眉 2017春茶 红茶 一级 250g 禅茶礼盒 米色', '581d2f374b134.jpg', '3600.00', '5200.00', '', '250', null, '1478307639', '36', '0', '522', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('86', '德化德鸿窑陶瓷茶具 福龙旺家9号壶10入 礼盒 功夫茶具', '581d304f5c338.jpg', '1600.00', '1888.00', '', '10', null, '1478307919', '46', '0', '300', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('87', '德化德鸿窑陶瓷茶具 福龙旺家11号壶10入 礼盒 功夫茶具', '581d30cd072a7.jpg', '1222.00', '1666.00', '', '10', null, '1478308045', '48', '0', '200', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('88', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 300g 松木荷香图礼盒', '581d3a3d10e9c.jpg', '1222222.00', '1666666.00', '', '300', null, '1478310461', '35', '0', '200', '1', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('89', '朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '581d3a969fc23.jpg', '14000.00', '16200.00', '', '200', null, '1478310550', '39', '0', '200', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('90', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 500g 雨前俏峰礼盒', '581d3d9a057f9.jpg', '1700.00', '2600.00', '', '500', null, '1478311322', '31', '0', '200', '1', '52', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('91', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 900g 松木荷香图礼盒', '581d3de08b81e.jpg', '2100.00', '4811.00', '', '900', null, '1478311392', '37', '0', '1200', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('92', '【老茶】老同志普洱茶 2007年 生茶 701批7008 布朗早春 359g/饼', '581d4ad69e3d8.jpg', '1600.00', '1500.00', '', '379', null, '1478314710', '40', '0', '200', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('93', '【老茶99】老同志普洱茶 2007年 生茶 701批728 布朗早春 359g/饼', '581d4b1079b1d.jpg', '165.00', '260.00', '', '120', null, '1480552538', '31', '0', '120', '0', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('94', '【老茶】老同志普洱茶 2017年 生茶 701批7008 布朗早春 359g/饼', '581d4b5527e3c.jpg', '1212.00', '1500.00', '', '359', null, '1478314837', '42', '0', '120', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('95', '同仁堂养生茶 牛蒡 170g', '581d4daed842c.jpg', '1200.00', '1600.00', '', '170', null, '1478315438', '38', '0', '100', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('96', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 122入', '581d4f2de8d51.jpg', '200000.00', '500000.00', '', '122', '1478323620', '1478315821', '46', '0', '60', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('97', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 56入', '581d4f9c382f1.jpg', '155.00', '899.00', '', '12', '1478323612', '1478315932', '45', '0', '45', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('98', '龙井 2016明前茶 绿茶 浓香型 一级 NLJ0888-L240g 怀古礼盒', '581d52b5d444e.jpg', '1620.00', '7800.00', '', '122', null, '1478316725', '27', '0', '50', '1', '48', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('99', '龙井 2016明前茶 绿茶 浓香型 一级 NLJ08998-L240g 怀古礼盒', '581d69afc733a.jpg', '4666.00', '7888.00', '', '240', null, '1478322607', '40', '0', '50', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('100', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '150.00', '190.00', '', '150', null, '1478323753', '33', '6', '144', '1', '48', '0', '0', '2');
INSERT INTO `ybc_goods` VALUES ('101', '醉品朴茶金骏眉 2019春茶 红茶 特级 本朴JM1580-250g', '581d71e31e17d.jpg', '8600.00', '17000.00', '', '2000', null, '1478324707', '41', '0', '10', '1', '48', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('102', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴AK1580-250g', '581d721d82248.jpg', '1255.00', '5899.00', '', '1222', null, '1479883749', '42', '0', '103', '1', '53', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('103', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴551580-250g', '581d75719bab0.jpg', '15555.00', '18888.00', '', '121', null, '1478325617', '40', '0', '1212', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('104', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g', '581d9421bebb4.jpg', '342.00', '810.00', '', '156', null, '1478333474', '37', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('105', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g1', '581d944a0774a.jpg', '360.00', '650.00', '', '200', null, '1478333514', '37', '1', '99', '1', '53', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('106', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g3', '581d946d0e896.jpg', '360.00', '650.00', '', '100', null, '1478333549', '37', '2', '98', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('107', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g4', '581d949573ee5.jpg', '600.00', '1500.00', '', '200', null, '1478333590', '37', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('108', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g', '581d94e597795.jpg', '360.00', '500.00', '', '200', null, '1479884181', '39', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('109', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g1', '581d9509af6a6.jpg', '460.00', '560.00', '', '100', null, '1478333706', '39', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('110', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g2', '581d9529085f5.jpg', '300.00', '600.00', '', '450', null, '1478333737', '39', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('111', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g6', '581d955d4eaec.jpg', '200.00', '1560.00', '', '100', null, '1478333789', '39', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('112', '醉品朴茶 正山小种 2016春茶 红茶 特级 本朴 XZ1390-250g', '581d9598ddd94.jpg', '500.00', '600.00', '', '100', null, '1478333849', '38', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('113', '醉品朴茶 正山小种 2016春茶 红茶 特级 本朴 XZ1390-250g1', '581d95c0bc784.jpg', '450.00', '650.00', '', '150', null, '1478333889', '38', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('114', '醉品朴茶 正山小种 2016春茶 红茶 特级 本朴 XZ1390-250g6', '581d95e19dec5.jpg', '450.00', '500.00', '', '150', null, '1478333922', '38', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('115', '【老茶】云南江城普洱茶 2007年 生茶 江城乔木大树茶 400g/饼', '581d96203f182.jpg', '349.00', '349.00', '', '100', null, '1478333984', '40', '1', '99', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('116', '【老茶】云南江城普洱茶 2007年 生茶 江城乔木大树茶 400g/饼1', '581d964f97a57.jpg', '250.00', '560.00', '', '211', null, '1478334032', '40', '0', '100', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('117', '【老茶】云南江城普洱茶 2007年 生茶 江城乔木大树茶 400g/饼5', '581d967a52e82.jpg', '450.00', '560.00', '', '210', null, '1478334074', '40', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('120', '【老茶】云南江城普洱茶 2007年 生茶 江城乔木大树茶 400g/饼6', '581d96a85bd9b.jpg', '400.00', '500.00', '', '100', null, '1478334120', '40', '1', '99', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('121', '君山牌君山银针 2015明前茶 黄茶 特级 80g', '581d97024eb3c.jpg', '380.00', '500.00', '', '100', null, '1478334210', '42', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('122', '君山牌君山银针 2015明前茶 黄茶 特级 80g1', '581d9722b2081.jpg', '460.00', '500.00', '', '300', null, '1478334243', '42', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('123', '君山牌君山银针 2015明前茶 黄茶 特级 80g3', '581d9741a6034.jpg', '100.00', '300.00', '', '100', null, '1478334274', '42', '0', '500', '1', '50', '1', '0', '0');
INSERT INTO `ybc_goods` VALUES ('124', '君山牌君山银针 2015明前茶 黄茶 特级 80g', '5820345ba8e28.jpg', '3600.00', '7800.00', '', '80', null, '1478505563', '42', '0', '10', '1', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('125', '君山牌君山银针 2015明前茶 黄茶 特级 88g', '58203520e5418.jpg', '45555.00', '88888.00', '', '120', null, '1478505760', '42', '0', '100', '1', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('126', '君山牌君山银针 2015明前茶 黄茶 特级 78g', '582035788439c.jpg', '41545.00', '44555.00', '', '78', null, '1478505848', '43', '0', '121', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('127', '醉品朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-100g', '5820585ce3140.jpg', '210.00', '1522.00', '', '300', null, '1478514780', '33', '0', '20', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('128', '醉品朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴H4399-100g', '582058b61787a.jpg', '712.00', '4500.00', '', '100', null, '1478514870', '34', '2', '18', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('129', '醉品朴茶 太平猴魁 2017雨前茶 绿茶 特级 雅朴HK4399-100g', '582058f7f040b.jpg', '120.00', '450.00', '', '300', null, '1478514935', '43', '1', '19', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('130', '醉品朴茶 太平猴魁 雨前茶 绿茶 特级 雅朴HK4399-100g', '582063cb13f8d.jpg', '1200.00', '4555.00', '', '2000', null, '1478517707', '31', '0', '111', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('131', '太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-100g', '58206407c7e9c.jpg', '1211.00', '1213.00', '', '310', '1478570475', '1478517767', '34', '0', '322', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('133', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-100g', '58206461d9452.jpg', '31.00', '123.00', '', '123', null, '1478517857', '39', '0', '21', '1', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('134', '哎呦不错哦 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-1220g', '58212b0c21c79.jpg', '455.00', '788.00', '', '212', '1478570355', '1478568716', '41', '0', '155', '1', '49', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('135', '给你推荐 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-220g', '58212b76ec247.jpg', '121.00', '4555.00', '', '200', null, '1478568822', '43', '0', '102', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('136', '真的很好 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK43889-100g', '582133a55abcd.jpg', '152.00', '458.00', '', '500', null, '1478570917', '33', '0', '45', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('137', '相当不错的茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK45399-100g', '582291c7f074f.jpg', '255.00', '455.00', '', '230', null, '1478660551', '27', '0', '700', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('138', '很好的茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK43789-100g', '5822920ee036c.jpg', '452.00', '812.00', '', '300', null, '1478660622', '28', '0', '100', '0', '54', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('139', '好茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴Hg4399-100g', '582292b219249.jpg', '1245.00', '4512.00', '', '600', null, '1478660786', '35', '0', '1245', '1', '48', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('140', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK4399-2440g', '5822933cb8688.jpg', '2000.00', '8000.00', '', '10', null, '1478660924', '48', '0', '122', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('141', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴HK47899-100g', '582293a2ba007.jpg', '4555.00', '7888.00', '', '20', null, '1478682833', '48', '0', '422', '1', '51', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('142', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561174f115.jpg', '899.00', '999.00', '', '99', null, '1478844696', '33', '7', '548', '1', '48', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('143', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制9', '5825614bc47ec.jpg', '888.00', '888.00', '', '88', null, '1478844748', '45', '2', '86', '1', '51', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('144', '广州恒福陶瓷茶具 功夫茶具 上善若       水  小茶组  定窑   4入', '58256190dc26f.jpg', '144.00', '144.00', '', '222', '1479113601', '1478844817', '33', '1', '221', '1', '48', '0', '0', '1');
INSERT INTO `ybc_goods` VALUES ('145', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561badcb92.jpg', '55.00', '5355.00', '', '555', '1480564005', '1478844859', '48', '2', '553', '1', '49', '0', '0', '2');
INSERT INTO `ybc_goods` VALUES ('146', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g', '58295e2872d00.jpg', '150.00', '780.00', '', '230', '1479109142', '1479106088', '39', '0', '200', '1', '48', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('147', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM25580-250g', '58295e5da4a3c.jpg', '110.00', '450.00', '', '100', '1479109131', '1479106141', '32', '0', '300', '1', '52', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('148', '茶趣', '5829a7accc439.jpg', '350.00', '500.00', '', '50', null, '1479124908', '27', '0', '5000', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('149', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴', '5829a9244b795.jpg', '230.00', '300.00', '', '300', null, '1479125284', '27', '0', '3000', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('150', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴', '5829a96a71131.jpg', '350.00', '420.00', '', '300', null, '1479125354', '27', '0', '600', '1', '53', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('151', '朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴', '5829a99b1fb91.jpg', '460.00', '500.00', '', '200', null, '1479125403', '27', '0', '5000', '1', '50', '0', '1', '0');
INSERT INTO `ybc_goods` VALUES ('152', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制', '5836c6f75f4e2.jpg', '2599.00', '1525.00', '', '252', null, '1479984888', '33', '0', '2525', '1', '49', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('153', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制', '5836c73c4a4b8.jpg', '100.00', '1010.00', '', '100', null, '1479984957', '45', '0', '1200', '1', '51', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('154', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入', '5836c784c272a.jpg', '1100.00', '1200.00', '', '100', null, '1479985029', '34', '0', '100', '1', '50', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('155', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入', '583c1dbe1889c.jpg', '56.00', '232.00', '', '456', '1480563836', '1480334782', '45', '0', '2626', '1', '48', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('156', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入', '583eab0804664.jpg', '252.00', '254.00', '', '252', null, '1480502025', '45', '0', '2542', '1', '48', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('157', '反对方答复', '5840dc425f521.jpg', '545.00', '454.00', 'gdg', '545', null, '1480645698', '26', '0', '54', '1', '48', '0', '0', '0');
INSERT INTO `ybc_goods` VALUES ('158', '这是测试', '5840e12be7fcc.jpg', '111.00', '111.00', '', '111', null, '1480646955', '31', '0', '111', '1', '48', '0', '1', '0');

-- ----------------------------
-- Table structure for `ybc_goods_collect`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods_collect`;
CREATE TABLE `ybc_goods_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL COMMENT '用户id',
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods_collect
-- ----------------------------
INSERT INTO `ybc_goods_collect` VALUES ('11', '1', '30', '1477968760');
INSERT INTO `ybc_goods_collect` VALUES ('22', '2', '29', '1478001175');
INSERT INTO `ybc_goods_collect` VALUES ('24', '2', '38', '1478001211');
INSERT INTO `ybc_goods_collect` VALUES ('25', '2', '46', '1478003998');
INSERT INTO `ybc_goods_collect` VALUES ('47', '12', '82', '1478325644');
INSERT INTO `ybc_goods_collect` VALUES ('49', '12', '31', '1478331107');
INSERT INTO `ybc_goods_collect` VALUES ('51', '12', '88', '1478337006');
INSERT INTO `ybc_goods_collect` VALUES ('52', '12', '33', '1478337024');
INSERT INTO `ybc_goods_collect` VALUES ('59', '12', '30', '1478339411');
INSERT INTO `ybc_goods_collect` VALUES ('80', '12', '106', '1478481787');
INSERT INTO `ybc_goods_collect` VALUES ('83', '12', '34', '1478484718');
INSERT INTO `ybc_goods_collect` VALUES ('89', '2', '33', '1478501638');
INSERT INTO `ybc_goods_collect` VALUES ('90', '12', '107', '1478510161');
INSERT INTO `ybc_goods_collect` VALUES ('101', '6', '70', '1478653368');
INSERT INTO `ybc_goods_collect` VALUES ('103', '6', '75', '1478653378');
INSERT INTO `ybc_goods_collect` VALUES ('104', '6', '77', '1478653395');
INSERT INTO `ybc_goods_collect` VALUES ('105', '6', '76', '1478653399');
INSERT INTO `ybc_goods_collect` VALUES ('106', '6', '59', '1478653410');
INSERT INTO `ybc_goods_collect` VALUES ('110', '6', '29', '1478685097');
INSERT INTO `ybc_goods_collect` VALUES ('113', '6', '106', '1478692768');
INSERT INTO `ybc_goods_collect` VALUES ('172', '17', '78', '1478827445');
INSERT INTO `ybc_goods_collect` VALUES ('173', '17', '79', '1478827450');
INSERT INTO `ybc_goods_collect` VALUES ('193', '12', '51', '1478836394');
INSERT INTO `ybc_goods_collect` VALUES ('211', '8', '78', '1478843852');
INSERT INTO `ybc_goods_collect` VALUES ('218', '6', '42', '1478845404');
INSERT INTO `ybc_goods_collect` VALUES ('221', '6', '74', '1478845422');
INSERT INTO `ybc_goods_collect` VALUES ('237', '6', '73', '1478845967');
INSERT INTO `ybc_goods_collect` VALUES ('254', '23', '122', '1478848847');
INSERT INTO `ybc_goods_collect` VALUES ('255', '23', '122', '1478848849');
INSERT INTO `ybc_goods_collect` VALUES ('256', '23', '122', '1478848852');
INSERT INTO `ybc_goods_collect` VALUES ('257', '23', '123', '1478848857');
INSERT INTO `ybc_goods_collect` VALUES ('258', '23', '123', '1478848859');
INSERT INTO `ybc_goods_collect` VALUES ('260', '12', '48', '1478848944');
INSERT INTO `ybc_goods_collect` VALUES ('261', '12', '38', '1478848960');
INSERT INTO `ybc_goods_collect` VALUES ('268', '12', '102', '1478851194');
INSERT INTO `ybc_goods_collect` VALUES ('270', '12', '79', '1479186901');
INSERT INTO `ybc_goods_collect` VALUES ('271', '12', '78', '1479186903');
INSERT INTO `ybc_goods_collect` VALUES ('272', '12', '47', '1479186906');
INSERT INTO `ybc_goods_collect` VALUES ('273', '12', '47', '1479186908');
INSERT INTO `ybc_goods_collect` VALUES ('307', '12', '37', '1479283226');
INSERT INTO `ybc_goods_collect` VALUES ('309', '12', '32', '1479283232');
INSERT INTO `ybc_goods_collect` VALUES ('310', '12', '29', '1479283234');
INSERT INTO `ybc_goods_collect` VALUES ('311', '12', '58', '1479283236');
INSERT INTO `ybc_goods_collect` VALUES ('314', '12', '29', '1479283243');
INSERT INTO `ybc_goods_collect` VALUES ('315', '12', '29', '1479283245');
INSERT INTO `ybc_goods_collect` VALUES ('316', '12', '58', '1479283247');
INSERT INTO `ybc_goods_collect` VALUES ('319', '12', '63', '1479363881');
INSERT INTO `ybc_goods_collect` VALUES ('330', '8', '96', '1479457236');
INSERT INTO `ybc_goods_collect` VALUES ('331', '2', '131', '1479461288');
INSERT INTO `ybc_goods_collect` VALUES ('338', '8', '37', '1480503929');
INSERT INTO `ybc_goods_collect` VALUES ('341', '8', '49', '1480589443');
INSERT INTO `ybc_goods_collect` VALUES ('346', '6', '72', '1480646091');

-- ----------------------------
-- Table structure for `ybc_goods_detail`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods_detail`;
CREATE TABLE `ybc_goods_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `pid` int(20) unsigned DEFAULT NULL COMMENT '生产许可证编号',
  `sid` int(20) unsigned DEFAULT NULL COMMENT '产品标准号',
  `netweight` varchar(20) DEFAULT '暂无' COMMENT '净含量',
  `pack` varchar(20) DEFAULT '普通包装' COMMENT '包装',
  `pricerange` varchar(20) NOT NULL COMMENT '价格范围',
  `date` varchar(20) NOT NULL COMMENT '生产日期',
  `udate` varchar(20) NOT NULL COMMENT '有效期',
  `level` varchar(20) DEFAULT '三级' COMMENT '级别',
  `place` varchar(30) NOT NULL COMMENT '产地',
  `craft` varchar(30) DEFAULT '暂无' COMMENT '食品工艺',
  `pic` varchar(20) DEFAULT NULL COMMENT '商品详情图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `ybc_goods_integral`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods_integral`;
CREATE TABLE `ybc_goods_integral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(60) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `price` float(20,2) unsigned NOT NULL COMMENT '商城价格',
  `detail` varchar(10000) DEFAULT NULL COMMENT '商品详情',
  `addtime` int(20) unsigned DEFAULT NULL COMMENT '商品修改时间',
  `salenum` int(50) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '展示/下架',
  `points` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods_integral
-- ----------------------------
INSERT INTO `ybc_goods_integral` VALUES ('4', '晨茗精致小茶盘竹制茶海茶台功夫茶具托盘储水茶托茶座茶道特价', '581ab55b5c1e6.jpg', '1033.00', '', '1480645200', '0', '0', '1000');
INSERT INTO `ybc_goods_integral` VALUES ('6', '精致金丝竹不锈钢普洱茶刀，茶针茶具 配件梅鹿竹普洱茶具', '581c6dec62a04.jpg', '23.00', '', '1478259207', '0', '1', '230');
INSERT INTO `ybc_goods_integral` VALUES ('7', '精致佛像小和尚茶宠紫砂汽车饰品小如来哥窑汝窑紫砂茶宠摆件', '581c6e1c394d4.jpg', '10.00', '', '1478258204', '0', '1', '100');
INSERT INTO `ybc_goods_integral` VALUES ('8', '藏壶天下宜兴原矿紫泥紫砂茶宠精致形象卡通茶玩全手工摆件机器猫', '581ada9c0ed71.jpg', '99.00', '', '1478154908', '0', '1', '900');
INSERT INTO `ybc_goods_integral` VALUES ('9', '欢天喜地茶宠猪精致萌猪紫砂福气迷你招财猪热卖茶玩茶趣摆件', '581adb2dc3d49.jpg', '30.00', '', '1478155053', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('10', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581add03497af.jpg', '60.00', '', '1478155523', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('11', '宜兴紫砂功夫茶杯单杯品茗杯个主人杯斗笠茶盏定制刻字小茶碗茶具', '581adfcb80978.jpg', '30.00', '', '1478156236', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('12', '喷水尿童小和尚紫砂小孩童子撒尿娃娃茶宠摆件哥窑茶玩茶具配件', '581ae03561998.jpg', '20.00', '', '1478259023', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('13', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd18a7ca81.jpg', '60.00', '', '1478480266', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('14', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd1a88e2a9.jpg', '60.00', '', '1478480296', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('15', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd1a88e2a9.jpg', '60.00', '', '1478480332', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('16', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd1e67db27.jpg', '60.00', '', '1478480358', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('17', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd201ab7ca.jpg', '60.00', '', '1478480385', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('18', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd21f743d1.jpg', '50.00', '', '1478480415', '0', '1', '500');
INSERT INTO `ybc_goods_integral` VALUES ('19', '茶具配件功夫小和尚精品摆件彩砂陶紫砂茶宠茶道茶玩', '581fd23d041a3.jpg', '60.00', '', '1478480445', '0', '1', '600');
INSERT INTO `ybc_goods_integral` VALUES ('20', '精致佛像小和尚茶宠紫砂汽车饰品小如来哥窑汝窑紫砂茶宠摆件', '581fd320988b5.jpg', '10.00', '', '1478480673', '0', '1', '100');
INSERT INTO `ybc_goods_integral` VALUES ('21', '藏壶天下宜兴原矿紫泥紫砂茶宠精致形象卡通茶玩全手工摆件机器猫', '581fd346533f3.jpg', '90.00', '', '1478480710', '0', '1', '900');
INSERT INTO `ybc_goods_integral` VALUES ('22', '正古天然竹艺茶漏茶道六君子茶叶过滤器精致功夫茶具泡茶神器配件', '581fd379bbf80.jpg', '50.00', '', '1478480762', '0', '1', '500');
INSERT INTO `ybc_goods_integral` VALUES ('23', '正古天然竹艺茶漏茶道六君子茶叶过滤器精致功夫茶具泡茶神器配件', '581fd3959be32.jpg', '50.00', '', '1478480790', '0', '1', '500');
INSERT INTO `ybc_goods_integral` VALUES ('24', '正古天然竹艺茶漏茶道六君子茶叶过滤器精致功夫茶具泡茶神器配件', '581fd3c17a51f.jpg', '50.00', '', '1478480833', '0', '1', '500');
INSERT INTO `ybc_goods_integral` VALUES ('25', '喷水尿童小和尚紫砂小孩童子撒尿娃娃茶宠摆件哥窑茶玩茶具配件', '581fd3febaa6f.jpg', '20.00', '', '1478480895', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('26', '喷水尿童小和尚紫砂小孩童子撒尿娃娃茶宠摆件哥窑茶玩茶具配件', '581fd42968ba7.jpg', '20.00', '', '1478480937', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('27', '晨茗精致小茶盘竹制茶海茶台功夫茶具托盘储水茶托茶座茶道特价', '581fd4685d668.jpg', '20.00', '', '1478481000', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('28', '晨茗精致小茶盘竹制茶海茶台功夫茶具托盘储水茶托茶座茶道特价', '581fd49d6cca3.jpg', '20.00', '', '1478481053', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('29', '宜兴紫砂功夫茶杯单杯品茗杯个主人杯斗笠茶盏定制刻字小茶碗茶具', '581fd4d185717.jpg', '30.00', '', '1478481106', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('30', '精致金丝竹不锈钢普洱茶刀，茶针茶具 配件梅鹿竹普洱茶具', '581fd54a2e42b.jpg', '23.00', '', '1478481226', '0', '1', '230');
INSERT INTO `ybc_goods_integral` VALUES ('31', '精致金丝竹不锈钢普洱茶刀，茶针茶具 配件梅鹿竹普洱茶具', '581fd566a3d88.jpg', '20.00', '', '1478481254', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('32', '精致金丝竹不锈钢普洱茶刀，茶针茶具 配件梅鹿竹普洱茶具', '581fd581486bb.jpg', '20.00', '', '1478481281', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('33', '精致金丝竹不锈钢普洱茶刀，茶针茶具 配件梅鹿竹普洱茶具', '581fd5c33e1c8.jpg', '20.00', '', '1478481347', '0', '1', '200');
INSERT INTO `ybc_goods_integral` VALUES ('34', '欢天喜地茶宠猪精致萌猪紫砂福气迷你招财猪热卖茶玩茶趣摆件', '581fd5ed1c072.png', '30.00', '', '1478481389', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('35', '欢天喜地茶宠猪精致萌猪紫砂福气迷你招财猪热卖茶玩茶趣摆件', '581fd62f07b54.jpg', '30.00', '', '1478481455', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('36', '欢天喜地茶宠猪精致萌猪紫砂福气迷你招财猪热卖茶玩茶趣摆件', '581fd6410cd7b.jpg', '30.00', '', '1478481473', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('37', '欢天喜地茶宠猪精致萌猪紫砂福气迷你招财猪热卖茶玩茶趣摆件', '581fd6526cc9e.jpg', '30.00', '', '1478481490', '0', '1', '300');
INSERT INTO `ybc_goods_integral` VALUES ('38', '茶贴纸 窗户贴纸', '581fd6815b60a.jpg', '5.00', '', '1478481537', '0', '1', '50');

-- ----------------------------
-- Table structure for `ybc_goods_pic`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods_pic`;
CREATE TABLE `ybc_goods_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `picname` varchar(80) DEFAULT NULL COMMENT '图片名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=554 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods_pic
-- ----------------------------
INSERT INTO `ybc_goods_pic` VALUES ('1', '7', '580d842665a1c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('2', '7', '580d8426669bc.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('3', '8', '580d91313c066.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('4', '8', '580d91313d7d6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('5', '9', '580f237b7fbad.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('6', '9', '580f237b81705.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('7', '10', '580f24ff7eaac.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('8', '11', '580f2a696d21e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('9', '12', '580f2af9aa13b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('10', '13', '580f2ba363789.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('11', '14', '580f2beec7ef1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('12', '15', '580f358b2564a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('13', '15', '580f358b27972.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('14', '16', '580f363445c9e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('15', '27', '58102168055c5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('16', '27', '5810216806565.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('17', '28', '58104459514bf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('18', '28', '581044595245f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('19', '28', '58104459533ff.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('20', '28', '5810445953fb8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('21', '29', '581065cb28c84.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('22', '29', '581065cb2a3f4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('23', '29', '581065cb2bb64.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('24', '29', '581065cb2ceed.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('25', '29', '581065cb2e275.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('26', '29', '581065cb2f9e5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('27', '30', '581070b5790fe.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('28', '30', '581070b57b03f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('29', '30', '581070b57c3c7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('30', '30', '581070b57d74f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('31', '30', '581070b57ead8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('32', '30', '581070b580248.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('33', '31', '58109ab2194e7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('34', '31', '58109ab21ac58.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('35', '31', '58109ab21bfe0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('36', '31', '58109ab21db38.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('37', '31', '58109ab21f2a9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('38', '31', '58109ab220249.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('39', '32', '58109c1f4fb91.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('40', '32', '58109c1f51301.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('41', '32', '58109c1f52e5a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('42', '32', '58109c1f5844b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('43', '32', '58109c1f59fa3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('44', '32', '58109c1f5bafc.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('45', '33', '58109cea1584e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('46', '33', '58109cea16fbf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('47', '33', '58109cea1872f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('48', '33', '58109cea1d550.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('49', '33', '58109cea1ecc0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('50', '33', '58109cea20431.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('51', '34', '58109d2e5863f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('52', '34', '58109d2e599c8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('53', '34', '58109d2e5b138.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('54', '34', '58109d2e5fb71.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('55', '34', '58109d2e60ef9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('56', '34', '58109d2e6266a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('57', '35', '58109db24e06b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('58', '35', '58109db250393.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('59', '35', '58109db25171c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('60', '35', '58109db25b35e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('61', '35', '58109db25cace.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('62', '35', '58109db25de57.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('63', '36', '58109e0676821.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('64', '36', '58109e0678761.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('65', '36', '58109e067a2ba.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('66', '36', '58109e0681403.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('67', '36', '58109e0682b74.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('68', '36', '58109e06842e4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('69', '37', '5810a16a422c3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('70', '37', '5810a16a4364c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('71', '37', '5810a16a445ec.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('72', '37', '5810a16a49bdd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('73', '37', '5810a16a4b736.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('74', '37', '5810a16a4cabe.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('75', '38', '5810a3c63c725.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('76', '38', '5810a3c63de95.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('78', '38', '5810a3c63f21d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('79', '38', '5810a3c64480f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('80', '38', '5810a3c6457af.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('81', '38', '5810a3c646b37.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('82', '39', '5810a45b9f366.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('83', '39', '5810a45ba0ebf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('84', '39', '5810a45ba2a17.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('85', '39', '5810a45bab6b9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('86', '39', '5810a45baca41.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('87', '39', '5810a45bae1b2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('88', '40', '5810a4e8027b2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('89', '40', '5810a4e803f23.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('90', '40', '5810a4e80a4b4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('91', '40', '5810a4e80bc24.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('92', '40', '5810a4e80cfad.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('93', '40', '5810a4e80e335.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('94', '41', '5810a598f147d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('95', '41', '5810a598f2bed.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('96', '41', '5810a59904b57.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('97', '41', '5810a599062c7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('98', '41', '5810a5990764f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('99', '41', '5810a59908dc0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('100', '42', '5810a5d5588f2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('101', '42', '5810a5d55a062.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('102', '42', '5810a5d55b3eb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('103', '42', '5810a5d5611ac.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('104', '42', '5810a5d562534.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('105', '42', '5810a5d56408d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('112', '44', '5810a66773807.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('113', '44', '5810a66774f77.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('114', '44', '5810a66775f18.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('115', '44', '5810a6677bcd9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('116', '44', '5810a6677cc79.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('117', '44', '5810a6677e002.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('118', '46', '5811da843f6bd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('119', '46', '5811da8445c4e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('120', '46', '5811da8446fd7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('121', '46', '5811da844835f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('122', '46', '5811da84492ff.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('123', '47', '5811dc9050fe4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('124', '47', '5811dc9056da5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('125', '47', '5811dc905812e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('126', '47', '5811dc90594b6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('127', '47', '5811dc905a83e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('128', '48', '5811dd931ee56.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('129', '48', '5811dd932405f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('130', '48', '5811dd93253e8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('131', '48', '5811dd9326388.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('132', '48', '5811dd9327710.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('133', '49', '5811e189ecb7c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('134', '49', '5811e189f34f5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('135', '49', '5811e18a00a26.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('136', '49', '5811e18a01dae.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('137', '49', '5811e18a02d4e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('138', '50', '5811e1f99a0c7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('139', '50', '5811e1f9a44d9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('140', '50', '5811e1f9a5861.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('141', '50', '5811e1f9a6fd2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('142', '50', '5811e1f9a835a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('143', '51', '5811e26c2ccef.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('144', '51', '5811e26c34220.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('145', '51', '5811e26c355a9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('146', '51', '5811e26c36931.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('147', '51', '5811e26c378d1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('157', '58', '58187222b1ec7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('158', '58', '58187223a349c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('159', '58', '581872248c5a0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('160', '58', '58187225727c3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('161', '58', '581872264f95c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('162', '58', '581872274325b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('163', '59', '581872b978b3e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('164', '59', '581872ba6fed5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('165', '59', '581872bb597a9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('166', '59', '581872bc38c6a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('167', '59', '581872bd28300.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('168', '59', '581872be0e13b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('169', '60', '58193850002c4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('170', '63', '581c813647d77.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('171', '63', '581c813794082.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('172', '63', '581c8139408f0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('173', '63', '581c813a9aaa7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('174', '63', '581c813beb01b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('175', '63', '581c813d4252e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('176', '65', '581c818d9a1da.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('177', '65', '581c818ef1898.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('178', '65', '581c81904fef4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('179', '65', '581c81919355d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('180', '65', '581c819302d2e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('181', '65', '581c819463c46.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('182', '68', '581c82977be49.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('183', '68', '581c82990f842.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('184', '68', '581c829a19c8e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('185', '68', '581c829b5bb86.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('186', '68', '581c829cc91d9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('187', '68', '581c829dd8c16.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('188', '70', '581c8350de6de.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('189', '70', '581c83528b71d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('190', '70', '581c8353de789.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('191', '70', '581c835550e3a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('192', '70', '581c83568c7a2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('193', '70', '581c8357bd526.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('194', '71', '581c83de914e6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('195', '71', '581c83e01e94d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('196', '71', '581c83e16bbf8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('197', '71', '581c83e2d0991.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('198', '71', '581c83e438078.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('199', '71', '581c83e56574c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('200', '72', '581c849f73c5e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('201', '72', '581c84a0e6c8a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('202', '72', '581c84a22b8b8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('203', '72', '581c84a36a100.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('204', '72', '581c84a4df06d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('205', '72', '581c84a5ea841.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('206', '73', '581c851003162.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('207', '73', '581c851143cd3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('208', '73', '581c85125b411.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('209', '73', '581c8513a483c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('210', '73', '581c8514d2eb0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('211', '73', '581c851619a1f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('212', '74', '581c85ec35095.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('213', '74', '581c85ed6b40b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('214', '74', '581c85ee81f92.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('215', '74', '581c85efacf55.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('216', '74', '581c85f17551a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('217', '74', '581c85f2d2d82.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('218', '75', '581c870821905.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('219', '75', '581c87094dc50.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('220', '75', '581c870a7594b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('221', '75', '581c870bb0312.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('222', '75', '581c870cceb9a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('223', '75', '581c870de998a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('224', '76', '581c8749de787.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('225', '76', '581c874b24355.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('226', '76', '581c874c3be7c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('227', '76', '581c874dc1f5d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('228', '76', '581c874ec0826.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('229', '76', '581c874fbb26e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('230', '77', '581c878b9857d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('231', '77', '581c878cd7d65.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('232', '77', '581c878e5ffc4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('233', '77', '581c878fc12c4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('234', '77', '581c8790e590d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('235', '77', '581c8791e16de.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('236', '78', '581c87c75a6ef.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('237', '78', '581c87c872dce.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('238', '78', '581c87c9d1da5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('239', '78', '581c87cb580c3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('240', '78', '581c87ccc4f46.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('241', '78', '581c87cdc7a77.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('242', '79', '581c881208395.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('243', '79', '581c8813b41f7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('244', '79', '581c881559d04.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('245', '79', '581c8816ac1b8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('246', '79', '581c8817f07c1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('247', '79', '581c88194abb5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('248', '80', '581c8b979ab82.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('249', '80', '581c8b97dbe8a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('250', '80', '581c8b981954d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('251', '81', '581d2d9ac5f15.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('252', '81', '581d2d9b9c734.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('253', '81', '581d2d9c25ce2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('254', '82', '581d2e1693fa5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('255', '82', '581d2e175f412.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('256', '82', '581d2e181876a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('257', '84', '581d2eb906186.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('258', '84', '581d2eb9b8158.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('259', '84', '581d2eba25d97.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('260', '85', '581d2f385c3a3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('261', '85', '581d2f396dd20.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('262', '85', '581d2f3a75673.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('263', '86', '581d304fa4789.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('264', '86', '581d304fcd003.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('265', '86', '581d305006846.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('266', '87', '581d30cd5933b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('267', '87', '581d30cd94881.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('268', '87', '581d30cdc26eb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('269', '88', '581d3a3d5a73b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('270', '88', '581d3a3d84725.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('271', '88', '581d3a3db0e1f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('272', '89', '581d3a96e0a78.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('273', '89', '581d3a97129a1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('274', '89', '581d3a973bdd2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('275', '90', '581d3d9ab1b89.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('276', '90', '581d3d9ad80da.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('277', '90', '581d3d9b153b6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('278', '91', '581d3de0d524e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('279', '91', '581d3de11928b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('280', '91', '581d3de141335.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('281', '92', '581d4ad706e0d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('282', '92', '581d4ad735060.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('283', '92', '581d4ad76bf55.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('284', '93', '581d4b10caff8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('285', '93', '581d4b11034b2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('286', '93', '581d4b113037d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('287', '94', '581d4b55652c2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('288', '94', '581d4b55898d3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('289', '94', '581d4b55b5fcd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('290', '95', '581d4daf2a6fd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('291', '95', '581d4daf5335f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('292', '95', '581d4daf834f2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('293', '96', '581d4f2e71a63.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('294', '96', '581d4f2f61cb1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('295', '96', '581d4f2f83bb1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('296', '97', '581d4f9c882b2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('297', '97', '581d4f9ca8a42.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('298', '97', '581d4f9ccef93.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('299', '98', '581d52b64fda7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('300', '98', '581d52b776eea.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('301', '98', '581d52b7ea6ad.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('302', '99', '581d69b022e65.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('303', '99', '581d69b0566a9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('304', '99', '581d69b0850cc.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('305', '100', '581d6e2978abb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('306', '100', '581d6e2a6bfd2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('307', '100', '581d6e2b44b1a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('308', '100', '581d6e2c23bf3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('309', '100', '581d6e2d01174.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('310', '100', '581d6e2dc61fa.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('311', '101', '581d71e366ff5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('312', '101', '581d71e39468f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('313', '101', '581d71e3cdc95.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('314', '102', '581d721dd8ea1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('315', '102', '581d721e126e3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('316', '102', '58200eb4c38d2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('317', '103', '581d7571e71ca.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('318', '103', '581d75722294d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('319', '103', '581d75724c937.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('320', '104', '581d9422a133e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('321', '104', '581d942386d91.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('322', '104', '581d942473d16.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('323', '104', '581d94256240b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('324', '104', '581d94264015c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('325', '104', '581d94271b3b5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('326', '105', '581d944accfa0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('327', '105', '581d944bb02e3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('328', '105', '581d944c8671a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('329', '105', '581d944d5ac11.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('330', '105', '581d944e2f4f0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('331', '105', '581d944ef1e66.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('332', '106', '581d946dd8b25.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('333', '106', '581d946ec00d1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('334', '106', '581d946fa5353.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('335', '106', '581d94708348d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('336', '106', '581d947160df6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('337', '106', '581d947241640.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('338', '107', '581d9496435bb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('339', '107', '581d94972da47.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('340', '107', '581d9497f1f15.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('341', '107', '581d9498c9abd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('342', '107', '581d949994b42.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('343', '107', '581d949a6f9b2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('344', '108', '581d94e661492.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('345', '108', '581d94e7495f6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('346', '108', '581d94e8263a7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('347', '108', '581d94e90d182.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('348', '108', '581d94e9e9cf6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('349', '108', '581d94eabd634.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('350', '109', '581d950a75522.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('351', '109', '581d950b59804.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('352', '109', '581d950c42908.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('353', '109', '581d950d2d94d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('354', '109', '581d950e09375.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('355', '109', '581d950ecff54.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('356', '110', '581d9529d4bad.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('357', '110', '581d952ac462b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('358', '110', '581d952ba719d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('359', '110', '581d952c86e2f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('360', '110', '581d952d71e73.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('361', '110', '581d952e45b9a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('362', '111', '581d955e1b2e1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('363', '111', '581d955f15941.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('364', '111', '581d955fe55aa.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('365', '111', '581d9560d446f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('366', '111', '581d9561b1220.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('367', '111', '581d95627fd3e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('368', '112', '581d9599a72c1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('369', '112', '581d959a88e93.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('370', '112', '581d959b5b449.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('371', '112', '581d959c3bc93.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('372', '112', '581d959d06160.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('373', '112', '581d959dd55f8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('374', '113', '581d95c18a302.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('375', '113', '581d95c265172.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('376', '113', '581d95c3334c0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('377', '113', '581d95c40856f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('378', '113', '581d95c4d185e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('379', '113', '581d95c59eff3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('380', '114', '581d95e266c21.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('381', '114', '581d95e344d5a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('382', '114', '581d95e41ec2a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('383', '114', '581d95e4ef44b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('384', '114', '581d95e5c931b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('385', '114', '581d95e698609.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('386', '115', '581d962115d89.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('387', '115', '581d9621e7d1a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('388', '115', '581d9622c6a0c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('389', '115', '581d9623a957e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('390', '115', '581d9624818f6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('391', '115', '581d96254c1ab.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('392', '116', '581d965071d0f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('393', '116', '581d96515b5e3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('394', '116', '581d96523be2d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('395', '116', '581d9653116ac.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('396', '116', '581d9653d4022.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('397', '116', '581d96549e4ee.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('398', '117', '581d967b25051.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('399', '117', '581d967c0d1b4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('400', '117', '581d967cda324.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('401', '117', '581d967db3a24.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('402', '117', '581d967e98ca7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('403', '117', '581d967f64114.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('404', '120', '581d96a923f3f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('405', '120', '581d96aa09992.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('406', '120', '581d96aad5b62.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('407', '120', '581d96abb2143.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('408', '120', '581d96ac8db6c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('409', '120', '581d96ad55540.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('410', '121', '581d97032c88d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('411', '121', '581d970400d84.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('412', '121', '581d9704c7192.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('413', '121', '581d97059d1e2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('414', '121', '581d9706647ce.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('415', '121', '581d97072ec9a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('416', '122', '581d972381f27.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('417', '122', '581d97247b9cf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('418', '122', '581d97256a4ac.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('419', '122', '581d97264e3a7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('420', '122', '581d97272383e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('421', '122', '581d9727f30bf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('422', '123', '581d9742737c9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('423', '123', '581d97436da41.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('424', '123', '581d9744651c0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('425', '123', '581d974538ee7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('426', '123', '581d974623f2b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('427', '123', '581d974703005.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('428', '124', '5820345c027b6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('429', '124', '5820345c39a93.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('430', '124', '5820345c6c337.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('431', '125', '582035213dbb0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('432', '125', '5820352176215.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('433', '125', '58203521a3c98.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('434', '126', '58203578cfab2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('435', '126', '5820357915647.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('436', '126', '582035794ec4d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('437', '127', '5820585d495f2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('438', '127', '5820585d7be96.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('439', '127', '5820585dd2d4a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('440', '128', '582058b6748d7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('441', '128', '582058b6adedd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('442', '128', '582058b6e26c1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('443', '129', '582058f8547f0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('444', '129', '582058f88f566.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('445', '129', '582058f8c5c8a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('446', '130', '582063cb5b8ec.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('447', '130', '582063cb91c28.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('448', '130', '582063cbc6bdd.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('449', '131', '582064082fea6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('450', '131', '582064087f440.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('451', '131', '58206408b671d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('452', '133', '582064622fd73.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('453', '133', '582064626ce12.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('454', '133', '58206462abdf1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('455', '134', '58212b0c8d8c7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('456', '134', '58212b0ccc4be.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('457', '134', '58212b0d258d8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('458', '135', '58212b774ac53.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('459', '135', '58212b77730e4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('460', '135', '58212b77a70f8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('461', '136', '582133a5a37ee.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('462', '136', '582133a5d29e1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('463', '136', '582133a613b3e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('464', '137', '582291c85f586.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('465', '137', '582291c886a77.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('466', '137', '582291c8b0e49.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('467', '138', '5822920f2f118.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('468', '138', '5822920f5a48a.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('469', '138', '5822920f857fc.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('470', '139', '582292b25db37.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('471', '139', '582292b294644.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('472', '139', '582292b2bc305.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('473', '140', '5822933d10a37.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('474', '140', '5822933d3f072.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('475', '140', '5822933d69ffc.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('476', '141', '582293a31b829.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('477', '141', '582293a34b5d4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('478', '141', '582293a374dee.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('479', '142', '582561190cee0.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('480', '142', '58256119ee48d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('481', '142', '5825611b72c53.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('482', '142', '5825611cada02.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('483', '142', '5825611ddeb6e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('484', '142', '5825611f479c5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('485', '143', '5825614ced487.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('486', '143', '5825614e274d3.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('487', '143', '5825614f6f18d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('488', '143', '582561508a364.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('489', '143', '58256151b5af8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('490', '143', '58256152db0e2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('491', '144', '582561924dd68.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('492', '144', '5825619399c8b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('493', '144', '58256194ab609.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('494', '144', '58256195d4a73.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('495', '144', '58256196ec982.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('496', '144', '5825619804eb6.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('497', '145', '582561bc3ec87.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('498', '145', '582561bd4d33c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('499', '145', '582561be91d2d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('500', '145', '582561bfa5dbb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('501', '145', '582561c0b7b21.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('502', '145', '582561c1d4080.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('503', '146', '58295e295f89c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('504', '146', '58295e29a7135.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('505', '146', '58295e2a30acb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('506', '147', '58295e5e2ca01.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('507', '147', '58295e5e94e12.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('508', '147', '58295e5f1dfd7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('509', '148', '5829a7ae1a0f2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('510', '149', '5829a924dc41f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('511', '150', '5829a96b075ea.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('512', '151', '5829a99bbc786.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('513', '152', '582d547798148.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('515', '152', '5836c6f9d9e61.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('516', '152', '5836c6fbb6863.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('517', '152', '5836c6fd0f4e7.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('518', '152', '5836c6fe1cbfb.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('519', '152', '5836c6ffd78a8.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('520', '152', '5836c701e443d.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('521', '153', '5836c73d9d525.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('522', '153', '5836c73f14ddf.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('523', '153', '5836c740b605e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('524', '153', '5836c7421b41c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('525', '153', '5836c74334a9b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('526', '153', '5836c7447ea7e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('527', '154', '5836c78681495.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('528', '154', '5836c78798bd4.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('529', '154', '5836c7893526f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('530', '154', '5836c78a63113.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('531', '154', '5836c78b64ca5.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('532', '154', '5836c78c9db13.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('533', '155', '583c1dbf57ae1.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('534', '155', '583c1dc08c15f.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('535', '155', '583c1dc1dc53c.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('536', '155', '583c1dc31488e.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('537', '155', '583c1dc462365.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('538', '155', '583c1dc57dd5b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('539', '156', '583eab0a31443.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('540', '156', '583eab0bdb5ce.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('541', '156', '583eab0d636a2.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('542', '156', '583eab0f14f9b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('543', '156', '583eab10547db.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('544', '156', '583eab1244318.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('545', '157', '583fbc6d64702.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('546', '157', '583fbc6e85e6b.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('547', '157', '583fbc6f60123.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('548', '157', '5840dc42dd023.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('549', '157', '5840dc4316866.png');
INSERT INTO `ybc_goods_pic` VALUES ('550', '157', '5840dc43a1b17.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('551', '157', '5840dc43ce5f9.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('552', '158', '5840e12c3c9ad.jpg');
INSERT INTO `ybc_goods_pic` VALUES ('553', '158', '5840e12c7add4.jpg');

-- ----------------------------
-- Table structure for `ybc_goods_pic_integral`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_goods_pic_integral`;
CREATE TABLE `ybc_goods_pic_integral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `picname` varchar(80) DEFAULT NULL COMMENT '图片名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_goods_pic_integral
-- ----------------------------
INSERT INTO `ybc_goods_pic_integral` VALUES ('171', '2', '581aaf321d140.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('172', '3', '581ab4a948c95.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('173', '4', '581ab55bdcc9c.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('174', '5', '581ab62117d5b.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('175', '5', '581ab6218dc2f.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('176', '5', '581ab62219cd5.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('177', '5', '581ab622899ff.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('178', '6', '581c7207b5aaa.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('179', '6', '581ab7599b657.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('180', '6', '581ab75a0d4ff.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('181', '6', '581ab75a6a175.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('182', '7', '581ad976a2994.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('183', '7', '581ad9772b389.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('184', '7', '581ad977ad998.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('185', '7', '581ad97838e86.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('186', '8', '581ada9c88eae.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('187', '8', '581ada9cecc6d.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('188', '8', '581ada9d4c619.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('189', '9', '581adb2e0c3d7.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('190', '9', '581adb2e54440.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('191', '9', '581adb2e897dd.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('192', '9', '581adb2ebbc98.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('193', '10', '581add03c11db.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('194', '10', '581add041c91e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('195', '10', '581add0468037.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('196', '10', '581add04cf4a8.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('197', '10', '581add053f7f7.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('198', '10', '581add05966ab.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('199', '10', '581add061b608.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('200', '10', '581add06c7fe8.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('201', '11', '581adfcc49ea4.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('202', '11', '581adfccf0ac3.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('203', '11', '581adfcda2cd2.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('204', '11', '581adfce5720a.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('205', '12', '581c714f31b1e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('206', '12', '581c714f35d87.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('207', '12', '581c714f3a3d8.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('208', '13', '581fd18b2504e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('209', '13', '581fd18b895dd.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('210', '13', '581fd18be4ae2.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('211', '13', '581fd18c55602.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('212', '14', '581fd1a90cc74.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('213', '14', '581fd1a9740e4.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('214', '14', '581fd1a9bec45.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('215', '15', '581fd1cd197d2.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('216', '15', '581fd1cd69925.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('217', '15', '581fd1cdea3db.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('218', '15', '581fd1ce414cc.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('219', '16', '581fd1e6d5594.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('220', '16', '581fd1e73011e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('221', '16', '581fd1e77eee9.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('222', '17', '581fd2022b135.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('223', '17', '581fd20283b42.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('224', '17', '581fd2033befa.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('225', '18', '581fd21fe8f1d.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('226', '18', '581fd2204a421.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('227', '19', '581fd23d7757e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('228', '19', '581fd23dca5b1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('229', '19', '581fd23e36698.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('230', '20', '581fd3214397b.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('231', '20', '581fd321c5ba1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('232', '20', '581fd322b65bf.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('233', '21', '581fd346cd147.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('234', '21', '581fd3472bb52.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('235', '22', '581fd37a81a14.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('236', '22', '581fd37b0f612.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('237', '22', '581fd37b9c033.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('238', '22', '581fd37c27cf1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('239', '23', '581fd39640d4e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('240', '23', '581fd396bba43.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('241', '23', '581fd39747ed1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('242', '23', '581fd397c2fae.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('243', '24', '581fd3c2105ef.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('244', '24', '581fd3c287463.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('245', '25', '581fd3ff98ba8.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('246', '25', '581fd400522e9.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('247', '25', '581fd400f1dbe.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('248', '26', '581fd42a35b6c.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('249', '26', '581fd42ad65e2.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('250', '27', '581fd468ca4b1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('251', '27', '581fd469215a3.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('252', '28', '581fd49e2e4ce.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('253', '28', '581fd49e9593e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('254', '29', '581fd4d242cd9.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('255', '29', '581fd4d2e3f1e.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('256', '29', '581fd4d39ab66.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('257', '30', '581fd54a9c9e5.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('258', '30', '581fd54b0c94d.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('259', '30', '581fd54b6a94b.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('260', '31', '581fd567265d4.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('261', '31', '581fd5678806b.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('262', '31', '581fd567e4ce1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('263', '32', '581fd581c89a1.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('264', '32', '581fd5823a849.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('265', '32', '581fd58296137.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('266', '33', '581fd5c3b09eb.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('267', '33', '581fd5c41ab91.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('268', '33', '581fd5c474156.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('269', '34', '581fd5ed55a60.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('270', '34', '581fd5ed91776.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('271', '34', '581fd5ee00b25.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('272', '35', '581fd62f5a7a0.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('273', '35', '581fd62fbbe4f.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('274', '35', '581fd6304bd76.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('275', '36', '581fd6415134b.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('276', '36', '581fd64181caf.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('277', '36', '581fd6420ecf5.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('278', '37', '581fd652afee6.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('279', '37', '581fd652e8163.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('280', '37', '581fd653507b0.png');
INSERT INTO `ybc_goods_pic_integral` VALUES ('281', '38', '581fd682018ae.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('282', '38', '581fd68285a15.jpg');
INSERT INTO `ybc_goods_pic_integral` VALUES ('283', '38', '581fd682d112f.jpg');

-- ----------------------------
-- Table structure for `ybc_group`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_group`;
CREATE TABLE `ybc_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` smallint(6) NOT NULL COMMENT '关联双拼ID',
  `startime` int(10) unsigned NOT NULL COMMENT '开始时间',
  `active` smallint(1) unsigned DEFAULT '1' COMMENT '1代表还在团购时间  0代表已经结束',
  `endtime` int(10) unsigned NOT NULL COMMENT '结束时间',
  `price` float NOT NULL COMMENT '商品价格',
  `important` smallint(1) DEFAULT '0' COMMENT '0代表是不重要推荐，1代表是重要推荐',
  `addtime` int(11) NOT NULL,
  `groupnum` int(11) unsigned DEFAULT '0' COMMENT '要求团购达到的人数',
  `applynum` int(11) DEFAULT '0' COMMENT '已报名的人数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_group
-- ----------------------------
INSERT INTO `ybc_group` VALUES ('4', '50', '1478102400', '1', '1478275200', '37', '0', '1478075741', '0', '100');
INSERT INTO `ybc_group` VALUES ('5', '41', '1478275200', '1', '1480176000', '600', '0', '1478075742', '90', '10');
INSERT INTO `ybc_group` VALUES ('6', '58', '1478620800', '1', '1479571200', '240', '0', '1478075743', '97', '3');
INSERT INTO `ybc_group` VALUES ('7', '29', '1478188800', '1', '1478880000', '400', '0', '1478075744', '93', '7');
INSERT INTO `ybc_group` VALUES ('8', '30', '1478188800', '1', '1480435200', '400', '0', '1478075745', '93', '7');
INSERT INTO `ybc_group` VALUES ('9', '32', '1479398400', '1', '1481126400', '300', '0', '1478075746', '99', '1');
INSERT INTO `ybc_group` VALUES ('10', '35', '1478793600', '1', '1481126400', '888', '0', '1478075747', '98', '2');
INSERT INTO `ybc_group` VALUES ('12', '37', '1478102400', '1', '1481126400', '508', '0', '1478075749', '0', '100');
INSERT INTO `ybc_group` VALUES ('13', '40', '1478102400', '1', '1481126400', '120', '0', '1478075750', '93', '7');
INSERT INTO `ybc_group` VALUES ('14', '41', '1478880000', '1', '1481126400', '100', '0', '1478075751', '97', '3');
INSERT INTO `ybc_group` VALUES ('16', '47', '1478188800', '1', '1481126400', '1000', '1', '1478075891', '91', '9');
INSERT INTO `ybc_group` VALUES ('17', '50', '1478016000', '1', '1481126400', '42', '0', '1478084243', '0', '100');
INSERT INTO `ybc_group` VALUES ('18', '79', '1480089600', '1', '1481126400', '150', '0', '1478741333', '60', '0');
INSERT INTO `ybc_group` VALUES ('19', '78', '1479916800', '1', '1481126400', '540', '0', '1478741357', '39', '1');
INSERT INTO `ybc_group` VALUES ('20', '123', '1481817600', '1', '1482940800', '100', '0', '1479346899', '27', '3');
INSERT INTO `ybc_group` VALUES ('21', '142', '1482249600', '0', '1483027200', '899', '0', '1480575137', '31', '1');
INSERT INTO `ybc_group` VALUES ('22', '38', '1480608000', '1', '1481558400', '111', '0', '1480647232', '11', '1');

-- ----------------------------
-- Table structure for `ybc_groupnum`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_groupnum`;
CREATE TABLE `ybc_groupnum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` smallint(5) NOT NULL,
  `mid` smallint(5) NOT NULL,
  `action` smallint(1) unsigned DEFAULT '0' COMMENT '1代表发邮件提醒，0代表不发邮件提醒',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_groupnum
-- ----------------------------
INSERT INTO `ybc_groupnum` VALUES ('2', '13', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('12', '8', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('13', '5', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('14', '7', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('15', '6', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('16', '16', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('17', '16', '8', '1');
INSERT INTO `ybc_groupnum` VALUES ('18', '7', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('19', '6', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('20', '13', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('21', '16', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('22', '8', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('23', '5', '11', '0');
INSERT INTO `ybc_groupnum` VALUES ('24', '13', '15', '0');
INSERT INTO `ybc_groupnum` VALUES ('25', '5', '15', '0');
INSERT INTO `ybc_groupnum` VALUES ('26', '6', '15', '0');
INSERT INTO `ybc_groupnum` VALUES ('27', '7', '15', '1');
INSERT INTO `ybc_groupnum` VALUES ('28', '5', '16', '1');
INSERT INTO `ybc_groupnum` VALUES ('29', '13', '16', '1');
INSERT INTO `ybc_groupnum` VALUES ('30', '5', '17', '0');
INSERT INTO `ybc_groupnum` VALUES ('31', '7', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('32', '5', '18', '0');
INSERT INTO `ybc_groupnum` VALUES ('33', '16', '2', '1');
INSERT INTO `ybc_groupnum` VALUES ('34', '5', '19', '0');
INSERT INTO `ybc_groupnum` VALUES ('35', '7', '19', '1');
INSERT INTO `ybc_groupnum` VALUES ('36', '8', '2', '1');
INSERT INTO `ybc_groupnum` VALUES ('37', '5', '2', '1');
INSERT INTO `ybc_groupnum` VALUES ('38', '7', '2', '1');
INSERT INTO `ybc_groupnum` VALUES ('39', '13', '2', '1');
INSERT INTO `ybc_groupnum` VALUES ('40', '7', '16', '1');
INSERT INTO `ybc_groupnum` VALUES ('41', '8', '16', '1');
INSERT INTO `ybc_groupnum` VALUES ('42', '16', '16', '1');
INSERT INTO `ybc_groupnum` VALUES ('43', '5', '13', '1');
INSERT INTO `ybc_groupnum` VALUES ('44', '8', '13', '1');
INSERT INTO `ybc_groupnum` VALUES ('45', '16', '12', '0');
INSERT INTO `ybc_groupnum` VALUES ('46', '8', '12', '0');
INSERT INTO `ybc_groupnum` VALUES ('47', '16', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('48', '8', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('49', '10', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('50', '14', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('51', '10', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('52', '13', '17', '1');
INSERT INTO `ybc_groupnum` VALUES ('53', '14', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('54', '14', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('55', '13', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('56', '16', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('57', '5', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('58', '16', '19', '1');
INSERT INTO `ybc_groupnum` VALUES ('59', '9', '19', '1');
INSERT INTO `ybc_groupnum` VALUES ('60', '20', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('61', '19', '6', '1');
INSERT INTO `ybc_groupnum` VALUES ('62', '20', '11', '1');
INSERT INTO `ybc_groupnum` VALUES ('63', '20', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('64', '21', '22', '1');
INSERT INTO `ybc_groupnum` VALUES ('65', '22', '6', '1');

-- ----------------------------
-- Table structure for `ybc_history`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_history`;
CREATE TABLE `ybc_history` (
  `id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `oid` int(20) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `price` float(20,2) unsigned NOT NULL,
  `buynum` int(10) unsigned NOT NULL,
  `buytime` int(10) unsigned NOT NULL,
  `goodsname` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `sfpj` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否评价，0未评价，1已评价',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未确认收货，1已确认收货',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_history
-- ----------------------------
INSERT INTO `ybc_history` VALUES ('1', '8', '2', '29', '180.00', '3', '1477469646', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-260g', '581065cb28c84.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('2', '6', '1', '29', '180.00', '5', '1477972355', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '581065cb28c84.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('3', '6', '1', '30', '198.00', '4', '1475952355', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('4', '6', '1', '31', '272.00', '1', '1477972355', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('5', '6', '1', '46', '98.00', '5', '1477972355', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '5811d9a099429.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('6', '6', '29', '41', '100.00', '1', '1478248381', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 300g 雨前俏峰礼盒', '5810a598f147d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('7', '6', '30', '32', '300.00', '1', '1478249751', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109c1f4fb91.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('8', '6', '30', '36', '200.00', '1', '1478249751', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('9', '6', '30', '30', '400.00', '1', '1478249751', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('10', '6', '32', '35', '888.00', '1', '1478306775', '安溪铁观音 2016秋茶 乌龙茶 清香型 正炒 特级 老茶师精制 250g', '58109db24e06b.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('11', '6', '32', '31', '272.00', '1', '1478306775', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('12', '6', '32', '65', '249.00', '1', '1478306775', '宝泽台湾高山茶 2016春茶 乌龙茶 阿里山高山乌龙 150g', '581c818c29ca6.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('13', '6', '32', '29', '400.00', '1', '1478306775', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('14', '6', '32', '30', '400.00', '4', '1478306775', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('15', '6', '38', '30', '400.00', '1', '1478311144', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('16', '6', '40', '31', '272.00', '1', '1478311687', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('17', '2', '41', '32', '300.00', '1', '1478321459', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109c1f4fb91.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('18', '2', '41', '30', '400.00', '5', '1478321459', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('19', '2', '41', '41', '100.00', '1', '1478321459', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 300g 雨前俏峰礼盒', '5810a598f147d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('20', '6', '43', '32', '300.00', '1', '1478327681', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109c1f4fb91.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('21', '6', '44', '41', '100.00', '1', '1478336118', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 300g 雨前俏峰礼盒', '5810a598f147d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('22', '12', '45', '68', '880.00', '1', '1478336338', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('23', '12', '45', '39', '380.00', '2', '1478336338', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('24', '12', '45', '34', '480.00', '5', '1478336338', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109d2e5863f.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('25', '12', '45', '33', '911.00', '1', '1478336338', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109cea1584e.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('26', '6', '47', '43', '273.00', '1', '1478339387', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a618188cb.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('27', '6', '47', '39', '380.00', '1', '1478339387', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('28', '2', '50', '30', '400.00', '1', '1478484475', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('29', '6', '51', '32', '300.00', '6', '1478487045', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109c1f4fb91.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('30', '6', '51', '110', '300.00', '1', '1478487045', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g2', '581d9529085f5.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('31', '6', '51', '109', '460.00', '1', '1478487045', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g1', '581d9509af6a6.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('32', '6', '51', '108', '360.00', '1', '1478487045', '醉品朴茶 祁门红茶 2016春茶 红茶 红毛峰 一级 醇朴 QH1088-250g', '581d94e597795.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('33', '6', '51', '107', '600.00', '1', '1478487045', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g4', '581d949573ee5.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('34', '6', '51', '106', '360.00', '1', '1478487045', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g3', '581d946d0e896.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('35', '6', '51', '105', '360.00', '3', '1478487045', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g1', '581d944a0774a.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('36', '6', '51', '104', '342.00', '1', '1478487045', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g', '581d9421bebb4.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('37', '6', '51', '100', '150.00', '1', '1478487045', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('38', '6', '51', '70', '1100.00', '1', '1478487045', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('39', '6', '52', '75', '350.00', '1', '1478503431', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '581c8a0353c5a.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('40', '6', '53', '31', '272.00', '1', '1478503547', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('41', '6', '57', '31', '272.00', '1', '1478504949', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('42', '6', '58', '29', '400.00', '1', '1478505252', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('43', '6', '59', '30', '400.00', '1', '1478505276', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g', '581070b5790fe.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('44', '2', '61', '29', '400.00', '1', '1478510681', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('45', '2', '61', '43', '273.00', '1', '1478510681', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a618188cb.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('46', '2', '61', '34', '480.00', '1', '1478510681', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109d2e5863f.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('47', '12', '64', '100', '150.00', '1', '1478517871', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '1', '0');
INSERT INTO `ybc_history` VALUES ('48', '12', '65', '100', '150.00', '1', '1478518044', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '1', '0');
INSERT INTO `ybc_history` VALUES ('49', '6', '66', '31', '272.00', '1', '1478520091', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('50', '6', '67', '31', '272.00', '1', '1478520757', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('51', '12', '68', '33', '911.00', '1', '1478521345', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109cea1584e.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('52', '6', '69', '75', '350.00', '1', '1478521795', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '581c8a0353c5a.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('53', '8', '70', '49', '88.00', '1', '1478522768', '成艺陶瓷茶具 和为贵7入 手绘青花瓷        红茶茶具 礼盒 ', '5811e189eb7f4.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('54', '8', '71', '49', '88.00', '1', '1478522867', '成艺陶瓷茶具 和为贵7入 手绘青花瓷        红茶茶具 礼盒 ', '5811e189eb7f4.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('55', '6', '72', '70', '1100.00', '1', '1478567785', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('56', '6', '72', '70', '1100.00', '1', '1478567801', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('57', '6', '72', '70', '1100.00', '1', '1478567806', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('58', '2', '73', '29', '400.00', '1', '1478568659', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('59', '6', '75', '29', '400.00', '1', '1478605687', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('60', '6', '75', '65', '249.00', '1', '1478605687', '宝泽台湾高山茶 2016春茶 乌龙茶 阿里山高山乌龙 150g', '581c818c29ca6.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('61', '6', '75', '68', '880.00', '1', '1478605687', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('62', '6', '76', '106', '360.00', '1', '1478605930', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g3', '581d946d0e896.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('63', '6', '76', '105', '360.00', '1', '1478605930', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g1', '581d944a0774a.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('64', '6', '77', '42', '208.00', '1', '1478606011', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('65', '6', '77', '39', '380.00', '1', '1478606011', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('66', '2', '78', '31', '272.00', '1', '1478607528', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('67', '2', '80', '29', '400.00', '10', '1478611563', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('73', '6', '83', '34', '480.00', '1', '1478655835', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109d2e5863f.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('74', '6', '83', '33', '911.00', '1', '1478655835', '武夷岩茶 2016春茶 大红袍 中火 一级 ZHP0860-L250g 精选茗茶单罐', '58109cea1584e.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('75', '6', '84', '68', '880.00', '1', '1478656874', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('76', '13', '86', '31', '272.00', '1', '1478657492', '12醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('77', '13', '90', '38', '120.00', '4', '1478674217', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('78', '13', '91', '74', '568.00', '1', '1478674320', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g4', '581c85eae3944.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('79', '6', '94', '78', '680.00', '1', '1478683351', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入3', '581c87c5f0cdf.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('80', '6', '94', '31', '272.00', '2', '1478683351', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('81', '6', '94', '68', '880.00', '2', '1478683351', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('82', '6', '94', '29', '400.00', '3', '1478683351', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('83', '12', '95', '29', '400.00', '1', '1478689042', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('84', '6', '96', '31', '272.00', '2', '1478692035', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('85', '6', '96', '29', '400.00', '2', '1478692035', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('86', '6', '99', '106', '360.00', '1', '1478692848', '醉品朴茶金骏眉 2016春茶 红茶 特级 本朴JM1580-250g3', '581d946d0e896.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('87', '2', '100', '68', '880.00', '1', '1478696984', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('88', '6', '101', '68', '880.00', '2', '1478739721', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('89', '6', '102', '68', '880.00', '1', '1478739979', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('90', '6', '103', '68', '880.00', '1', '1478745388', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('91', '6', '104', '68', '880.00', '1', '1478745771', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('92', '6', '104', '100', '150.00', '1', '1478745771', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('93', '6', '97', '68', '880.00', '1', '1478745836', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('94', '6', '105', '31', '272.00', '2', '1478746406', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('95', '6', '105', '29', '400.00', '2', '1478746406', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('96', '6', '92', '129', '120.00', '1', '1478746441', '醉品朴茶 太平猴魁 2017雨前茶 绿茶 特级 雅朴HK4399-100g', '582058f7f040b.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('97', '8', '106', '77', '300.00', '2', '1478749196', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入2', '581c8789c3495.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('98', '6', '107', '42', '208.00', '3', '1478768245', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('99', '6', '107', '39', '380.00', '2', '1478768245', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('100', '6', '107', '38', '120.00', '9', '1478768245', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('101', '6', '107', '31', '272.00', '1', '1478768245', '醉品朴茶 武夷岩茶 2016春茶 乌龙茶 正岩水仙 中火 特级 本朴 ZHP1360-250g', '58109ab2194e7.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('102', '6', '108', '38', '120.00', '7', '1478847142', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('103', '6', '108', '72', '560.00', '3', '1478847142', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g2', '581c849de6bde.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('104', '6', '108', '42', '208.00', '1', '1478847142', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('105', '6', '108', '38', '120.00', '7', '1478847142', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('106', '2', '109', '38', '120.00', '1', '1479085968', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('107', '2', '109', '39', '380.00', '3', '1479085968', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('108', '2', '110', '39', '380.00', '1', '1479087317', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('109', '8', '111', '77', '300.00', '2', '1479094456', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入2', '581c8789c3495.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('110', '8', '112', '38', '120.00', '1', '1479094735', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('111', '6', '121', '74', '568.00', '99', '1479344936', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g4', '581c85eae3944.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('112', '23', '124', '44', '53.00', '3', '1479363788', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴 MF1100-50g', '5810a66773807.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('113', '23', '124', '42', '208.00', '1', '1479363788', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('114', '23', '124', '38', '120.00', '2', '1479363788', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('115', '2', '126', '75', '350.00', '10', '1479450264', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '581c8a0353c5a.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('116', '2', '126', '37', '508.00', '1', '1479450264', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g', '5810a16a422c3.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('117', '2', '126', '43', '273.00', '1', '1479450264', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a618188cb.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('118', '6', '156', '145', '55.00', '1', '1479719120', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561badcb92.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('119', '6', '156', '128', '712.00', '2', '1479719120', '醉品朴茶 太平猴魁 2016雨前茶 绿茶 特级 雅朴H4399-100g', '582058b61787a.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('120', '6', '156', '143', '888.00', '1', '1479719120', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制9', '5825614bc47ec.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('121', '6', '156', '100', '150.00', '1', '1479719120', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('122', '6', '156', '70', '1100.00', '1', '1479719120', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('123', '6', '156', '68', '880.00', '1', '1479719120', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('124', '6', '156', '65', '249.00', '1', '1479719120', '宝泽台湾高山茶 2016春茶 乌龙茶 阿里山高山乌龙 150g', '581c818c29ca6.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('125', '23', '133', '72', '560.00', '1', '1479798098', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g2', '581c849de6bde.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('126', '23', '133', '41', '100.00', '1', '1479798098', '谢裕大黄山毛峰 2016雨前茶 绿茶 特三级 300g 雨前俏峰礼盒', '5810a598f147d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('127', '23', '160', '38', '120.00', '1', '1479798545', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('128', '23', '160', '70', '1100.00', '1', '1479798545', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('129', '23', '160', '68', '880.00', '1', '1479798545', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('130', '23', '161', '71', '258.00', '1', '1479799110', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 雅朴 QLJ3000-100g1', '581c83dc93f6c.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('131', '23', '161', '44', '53.00', '1', '1479799110', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴 MF1100-50g', '5810a66773807.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('132', '23', '161', '42', '208.00', '1', '1479799110', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('133', '23', '161', '39', '380.00', '2', '1479799110', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('134', '23', '162', '145', '55.00', '1', '1479801026', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561badcb92.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('135', '23', '162', '144', '144.00', '1', '1479801026', '广州恒福陶瓷茶具 功夫茶具 上善若       水  小茶组  定窑   4入', '58256190dc26f.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('136', '23', '162', '142', '999.00', '1', '1479801026', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561174f115.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('137', '23', '162', '100', '150.00', '1', '1479801026', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('138', '23', '162', '70', '1100.00', '1', '1479801026', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('139', '23', '162', '68', '880.00', '1', '1479801026', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('140', '23', '162', '65', '249.00', '1', '1479801026', '宝泽台湾高山茶 2016春茶 乌龙茶 阿里山高山乌龙 150g', '581c818c29ca6.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('141', '23', '162', '63', '249.00', '1', '1479801026', '宝泽台湾高山茶 2015春茶 乌龙茶 宝泽叁号-四季春 150g', '581c8134aa73b.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('142', '26', '164', '142', '999.00', '2', '1480055733', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561174f115.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('143', '26', '165', '142', '999.00', '4', '1480056127', '德化德鸿窑 陶瓷茶具 功夫茶具 丁香花将军壶方罐 9入9', '582561174f115.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('144', '27', '166', '29', '400.00', '2', '1480056295', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g', '58109e0676821.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('145', '30', '167', '143', '888.00', '1', '1480058985', '宜兴紫砂壶 原矿紫泥 集思刻花壶 250ml 卢小伟精制9', '5825614bc47ec.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('146', '30', '167', '100', '150.00', '1', '1480058985', '醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 拖酸 一级 醇朴 NGY0840-250g1', '581d6e288615d.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('147', '30', '167', '70', '1100.00', '1', '1480058985', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('148', '6', '169', '68', '880.00', '1', '1480568628', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('149', '29', '168', '68', '880.00', '1', '1480576090', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山三朵梅比赛茶A0030 300gX2罐', '581c8295d921d.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('150', '8', '170', '38', '120.00', '2', '1480576607', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('151', '29', '171', '70', '1100.00', '5', '1480579380', '唐明皇台湾高山茶 2016春茶 乌龙茶 阿里山五朵梅比赛茶A0030 300gX2罐', '581c834f01b31.jpg', '1', '1');
INSERT INTO `ybc_history` VALUES ('152', '8', '172', '75', '350.00', '1', '1480589316', '陶瓷茶具 功夫茶具 知音杯 随身杯 3入', '581c8a0353c5a.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('153', '8', '172', '38', '120.00', '1', '1480589316', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('154', '23', '173', '42', '208.00', '1', '1480640270', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('155', '23', '173', '39', '380.00', '2', '1480640270', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('156', '23', '173', '38', '120.00', '1', '1480640270', '醉品朴茶龙井 2016明前茶 绿茶 清香型 特级 素朴 100g', '5810a3c63c725.jpg', '0', '0');
INSERT INTO `ybc_history` VALUES ('157', '23', '174', '44', '53.00', '1', '1480643378', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴 MF1100-50g', '5810a66773807.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('158', '23', '174', '42', '208.00', '1', '1480643378', '谢裕大黄山毛峰 2016雨后茶 绿茶 一级 300g 早春翠峰礼盒', '5810a5d5588f2.jpg', '0', '1');
INSERT INTO `ybc_history` VALUES ('159', '23', '174', '39', '380.00', '1', '1480643378', '醉品朴茶龙井 2016明前茶 绿茶 浓香型 特级 200g 松木荷香图礼盒', '5810a45b9f366.jpg', '0', '1');

-- ----------------------------
-- Table structure for `ybc_member`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_member`;
CREATE TABLE `ybc_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `qq` int(10) unsigned DEFAULT NULL,
  `lasttime` int(20) unsigned DEFAULT NULL,
  `lastip` varchar(15) DEFAULT NULL,
  `points` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户当前积分',
  `totalpoints` int(30) unsigned NOT NULL DEFAULT '0' COMMENT '历史总积分',
  `avatar` varchar(1000) DEFAULT NULL COMMENT '头像',
  `active` tinyint(2) unsigned DEFAULT '1' COMMENT '用户状态(1激活、0禁用)',
  `sex` tinyint(2) unsigned DEFAULT '1' COMMENT '1代表男  0代表女',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_member
-- ----------------------------
INSERT INTO `ybc_member` VALUES ('6', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '15845678945', '835279908@qq.com', '835279908', '1480646708', '127.0.0.1', '181324', '181984', '581bdd589240d.jpg', '1', '2');
INSERT INTO `ybc_member` VALUES ('8', 'moon', '07ca4806f4f656f934fa3c043e1a05d9', '15038107334', '872233743@qq.com', '872233743', '1480640691', '127.0.0.1', '1036', '1016', '5823eac72e303.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('9', '123', '827ccb0eea8a706c4c34a16891f84e7b', '13007637174', null, null, '1477986938', '127.0.0.1', '0', '0', '', '1', '1');
INSERT INTO `ybc_member` VALUES ('10', 'ybc_9554', 'e10adc3949ba59abbe56e057f20f883e', '15617999554', null, null, '1477903009', '127.0.0.1', '0', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('11', '123456', 'e10adc3949ba59abbe56e057f20f883e', '13071025016', '132@163.com', null, '1480574771', '127.0.0.1', '50', '0', '582431f7ca949.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('12', 'www', '827ccb0eea8a706c4c34a16891f84e7b', '', '', null, '1480065474', '127.0.0.1', '11021', '1311', '582431f7ca949.jpg', '1', '2');
INSERT INTO `ybc_member` VALUES ('13', 'Katherine', 'e10adc3949ba59abbe56e057f20f883e', '13071025016', '835279908@qq.com', '835279908', '1480644970', '127.0.0.1', '348', '2808', '58246f61d09fc.jpg', '1', '2');
INSERT INTO `ybc_member` VALUES ('14', 'ybc_9553', 'e10adc3949ba59abbe56e057f20f883e', '15617999553', null, null, '1478746189', '127.0.0.1', '0', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('15', '19920128', '3f0c94d9fee8f8d214870a0475723e19', '15517221644', '123@165.com', null, '1479297490', '127.0.0.1', '10', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('16', '787878', '5379884c5ec4e06879f7400fd40be0d9', '13223232323', '123546@123.com', null, '1480569771', '127.0.0.1', '20', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('17', '121212', '93279e3308bdbbeed946fc965017f67a', '13011111111', '13007637174@163.com', null, '1479434444', '127.0.0.1', '50', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('18', '232323', '2467d3744600858cc9026d5ac6005305', '13223232321', '123@123.com', null, '1478778020', '127.0.0.1', '0', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('19', '151515', '858915f1d2d425959fd4da867ba6b599', '15515551555', '123@123.com', null, '1479461789', '127.0.0.1', '20', '0', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('20', 'james', 'e10adc3949ba59abbe56e057f20f883e', '', null, null, '1478831941', null, '8400', '10000', '58246f61d09fc.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('21', 'aaaaa', 'e10adc3949ba59abbe56e057f20f883e', '13071025569', '', null, '1479125956', '127.0.0.1', '0', '0', '5829b08ca7a0f.jpeg', '1', '1');
INSERT INTO `ybc_member` VALUES ('22', '马云爸爸', 'e10adc3949ba59abbe56e057f20f883e', '13011223344', '', null, '1480574974', '127.0.0.1', '50', '0', '582bf6c9a2d00.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('23', 'Shoa', 'e10adc3949ba59abbe56e057f20f883e', '15839422106', '979199855@qq.com', '979199855', '1480640589', '172.16.17.223', '9123', '9113', '583d4e5d3173a.jpg', '1', '1');
INSERT INTO `ybc_member` VALUES ('24', 'asd1232', 'e10adc3949ba59abbe56e057f20f883e', '13071025855', null, null, '1480401085', '127.0.0.1', '0', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('25', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '13148201513', null, null, '1479725756', '172.16.17.219', '10', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('26', 'matthew', 'e10adc3949ba59abbe56e057f20f883e', '13071025535', '', '0', '1480640113', '127.0.0.1', '4094', '5994', '5837d74d4d222.JPG', '1', '1');
INSERT INTO `ybc_member` VALUES ('27', 'jone', 'e10adc3949ba59abbe56e057f20f883e', '13071025017', null, null, '1480057214', '127.0.0.1', '700', '800', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('28', 'jamess', 'e10adc3949ba59abbe56e057f20f883e', '13071025547', null, null, '1480056687', '127.0.0.1', '0', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('30', 'ybc_5359', 'e10adc3949ba59abbe56e057f20f883e', '13140645359', null, null, '1480058050', '172.16.17.178', '10', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('31', 'ggggggg', 'e10adc3949ba59abbe56e057f20f883e', '13071025533', null, null, '1480058459', '127.0.0.1', '0', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('32', 'asd123', 'e10adc3949ba59abbe56e057f20f883e', '13071025530', null, null, '1480644464', '192.168.4.55', '0', '0', null, '1', '1');
INSERT INTO `ybc_member` VALUES ('33', 'ybc_5537', 'e10adc3949ba59abbe56e057f20f883e', '13071025537', '', '0', '1480645324', '192.168.4.55', '0', '0', '5840dad899706.jpg', '1', '2');

-- ----------------------------
-- Table structure for `ybc_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_member_address`;
CREATE TABLE `ybc_member_address` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '收件人姓名',
  `phone` bigint(30) NOT NULL COMMENT '收件人电话',
  `address` varchar(100) NOT NULL COMMENT '收件人地址',
  `def` enum('0','2','1') NOT NULL DEFAULT '0' COMMENT '1为默认收货地址，0为非默认,2为绑定（与某个订单绑定，不可修改，不可在管理收货地址里查看）',
  `postcode` varchar(6) NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `town` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_member_address
-- ----------------------------
INSERT INTO `ybc_member_address` VALUES ('3', '2', '李四', '13333333333', '郑州市高新区电子商务产业园3号楼一楼云和数据', '0', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('4', '2', '李四他妹', '14444444444', '郑州市高新区电子商务产业园3号楼一楼云和数据', '1', '123456', 'eqe', 'eqweq', 'eqeqw');
INSERT INTO `ybc_member_address` VALUES ('5', '6', '大大阿达', '15679846512', '上海市虹口区按时大大撒', '2', '132456', 'eqe', 'ewqeq', 'ewqe');
INSERT INTO `ybc_member_address` VALUES ('39', '9', '王大锤', '13007637174', '莲花乡池水沟子', '0', '411522', '河南省', '信阳市', '光山县');
INSERT INTO `ybc_member_address` VALUES ('41', '9', '尼古拉斯·王二麻子', '13007637174', '12345', '1', '123456', '上海市', '上海市', '卢湾区');
INSERT INTO `ybc_member_address` VALUES ('42', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('43', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('44', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('45', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('46', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('47', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('48', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('49', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('50', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('51', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('52', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('53', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('54', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('55', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('56', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('57', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('58', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('59', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('60', '6', 'llllll', '15478946512', '不知道在哪', '2', '456798', '上海市', '上海市', '杨浦区');
INSERT INTO `ybc_member_address` VALUES ('61', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('62', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123456', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('63', '6', 'llllll', '15478946512', '不知道在哪', '2', '456798', '上海市', '上海市', '杨浦区');
INSERT INTO `ybc_member_address` VALUES ('66', '6', '张三他弟', '13222222222', '郑州市高新区', '0', '123452', '广东省', '深圳市', '罗湖区');
INSERT INTO `ybc_member_address` VALUES ('68', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('69', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('71', '12', '454', '15638512345', '11111', '2', '000000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('72', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('75', '2', '小毛驴', '13203720827', '黄河科技学院', '0', '250250', '河南省', '郑州市', '二七区');
INSERT INTO `ybc_member_address` VALUES ('76', '2', '小毛驴', '13203720827', '黄河科技学院', '2', '250250', '河南省', '郑州市', '二七区');
INSERT INTO `ybc_member_address` VALUES ('82', '6', '12345', '18779845645', '你猜我在哪', '0', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('83', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('84', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('85', '12', '454', '15638512345', '11111', '2', '000000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('86', '12', '454', '15638512345', '11111', '2', '000000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('87', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('88', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('89', '12', '454', '15638512345', '11111', '2', '000000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('90', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('91', '8', 'moon', '15038107334', '云和数据一楼', '1', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('92', '8', 'moon', '18336138944', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('93', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('94', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('95', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('96', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('97', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('98', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('99', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('102', '6', '12345', '18779845645', '你猜我在哪', '2', '467898', '吉林省', '延边州', '汪清县');
INSERT INTO `ybc_member_address` VALUES ('104', '13', 'd d ', '13071025537', 'dfaf f f', '2', '450000', '天津市', '天津市', '河西区');
INSERT INTO `ybc_member_address` VALUES ('109', '13', '发得分', '13071025537', '第七位分割', '2', '450000', '山西省', '长治市', '潞城市');
INSERT INTO `ybc_member_address` VALUES ('110', '13', 'sdfsaf ', '13071025537', 'asfaf gf', '2', '450000', '上海市', '上海市', '闸北区');
INSERT INTO `ybc_member_address` VALUES ('112', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('113', '12', '454', '15638512345', '11111', '2', '000000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('114', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('115', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('116', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('117', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('118', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('119', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('120', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('121', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('122', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('123', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('124', '8', 'moon', '18336138944', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('125', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('127', '13', 'sadsad d', '13071025537', 'sadasdasff', '2', '450000', '天津市', '天津市', '河西区');
INSERT INTO `ybc_member_address` VALUES ('129', '13', 'adasdsad', '13071025537', 'dasdasafd', '2', '450000', '辽宁省', '阜新市', '太平区');
INSERT INTO `ybc_member_address` VALUES ('132', '13', 'dsdasdddd', '13071025555', 'dasdasdasd', '2', '123456', '黑龙江省', '大庆市', '肇州县');
INSERT INTO `ybc_member_address` VALUES ('133', '13', '111111111111111', '13071025537', 'asdasdaada', '0', '111111', '辽宁省', '本溪市', '小市镇');
INSERT INTO `ybc_member_address` VALUES ('134', '13', '111111111111111', '13071025537', 'asdasdaada', '2', '111111', '辽宁省', '本溪市', '小市镇');
INSERT INTO `ybc_member_address` VALUES ('135', '20', 'dswdasd', '13071025537', 'dasdasdasdd', '0', '450000', '安徽省', '马鞍山市', '当涂县');
INSERT INTO `ybc_member_address` VALUES ('136', '20', 'qqqqqqq', '13071025537', 'qqqqqqqqqqqqqq', '0', '450000', '重庆市', '重庆市', '江北区');
INSERT INTO `ybc_member_address` VALUES ('137', '6', '隔壁老王', '13000000000', '12345', '2', '471500', '天津市', '天津市', '和平区');
INSERT INTO `ybc_member_address` VALUES ('138', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('139', '2', '李5656', '13334554545', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', '', '', '');
INSERT INTO `ybc_member_address` VALUES ('140', '8', 'moon', '18336138944', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('141', '8', 'moon', '18336138944', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('142', '6', '按多少大', '15839422106', '我在太空等你', '0', '123462', '广东省', '深圳市', '盐田区');
INSERT INTO `ybc_member_address` VALUES ('144', '6', '张三他弟', '13222222222', '郑州市高新区', '2', '123451', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('146', '23', '符肖亚', '15556478546', '阿萨werwr', '0', '456789', '海南省', '海南省', '儋州市');
INSERT INTO `ybc_member_address` VALUES ('147', '23', 'Shoa', '15839422106', '一般人我不告诉他', '2', '450000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('148', '23', 'Shoa', '15839422106', '一般人我不告诉他', '2', '450000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('149', '23', 'Shoa', '15839422106', '一般人我不告诉他', '2', '450000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('150', '23', 'Shoa', '15839422106', '一般人我不告诉他', '2', '450000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('151', '23', 'Shoa', '15839422106', '一般人我不告诉他', '2', '450000', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('152', '2', 'katherine', '13071025537', '发放购房节', '0', '450000', '河南省', '郑州市', '高新技术产业开发区');
INSERT INTO `ybc_member_address` VALUES ('153', '2', 'matthew', '13071025537', '法大使馆 豆腐干', '0', '450000', '广东省', '深圳市', '南山区');
INSERT INTO `ybc_member_address` VALUES ('154', '2', '李四他妹', '14444444444', '郑州市高新区电子商务产业园3号楼一楼云和数据', '2', '123456', 'eqe', 'eqweq', 'eqeqw');
INSERT INTO `ybc_member_address` VALUES ('156', '23', 'dsadas ', '15555555555', 'dadadada', '0', '444444', '广东省', '深圳市', '南山区');
INSERT INTO `ybc_member_address` VALUES ('158', '23', '444444', '13555555555', 'dsadadasdasdas', '0', '465798', '广东省', '深圳市', '南山区');
INSERT INTO `ybc_member_address` VALUES ('160', '12', '742', '15638591100', '每次发生吃饭', '1', '411570', '北京市', '北京市', '东城区');
INSERT INTO `ybc_member_address` VALUES ('161', '6', 'shoa', '15878945678', '45656', '0', '456798', '河北省', '承德市', '承德县');
INSERT INTO `ybc_member_address` VALUES ('162', '6', 'shoa', '15878945678', '45656', '2', '456798', '河北省', '承德市', '承德县');
INSERT INTO `ybc_member_address` VALUES ('163', '6', '1234567', '15777887985', '打算打算手动', '0', '456456', '内蒙古', '呼伦贝尔市', '阿荣旗');
INSERT INTO `ybc_member_address` VALUES ('164', '6', '12345', '13513513545', '你猜我在那', '1', '456789', '贵州省', '贵阳市', '修文县 ');
INSERT INTO `ybc_member_address` VALUES ('165', '23', 'fuxioaya', '15815815815', '777777777', '2', '158158', '北京市', '北京市', '宣武区');
INSERT INTO `ybc_member_address` VALUES ('166', '23', 'fuxioaya', '15815815815', '777777777', '2', '158158', '北京市', '北京市', '宣武区');
INSERT INTO `ybc_member_address` VALUES ('167', '23', 'fuxioaya', '15815815815', '777777777', '2', '158158', '北京市', '北京市', '宣武区');
INSERT INTO `ybc_member_address` VALUES ('168', '23', 'fuxioaya', '15815815815', '777777777', '2', '158158', '北京市', '北京市', '宣武区');
INSERT INTO `ybc_member_address` VALUES ('170', '26', 'adaqd ', '13071025537', 'dasffagsdgg', '2', '450000', '山西省', '大同市', '龙泉镇');
INSERT INTO `ybc_member_address` VALUES ('171', '26', 'adasfdsaff', '13071025537', 'asfasfasffg', '0', '450000', '山西省', '长治市', '长治县');
INSERT INTO `ybc_member_address` VALUES ('172', '26', 'jghjhjkhgkhgk', '13071025017', 'ghjfg mgh', '0', '450000', '黑龙江省', '大庆市', '肇州县');
INSERT INTO `ybc_member_address` VALUES ('173', '26', 'adasfdsaff', '13071025537', 'asfasfasffg', '2', '450000', '山西省', '长治市', '长治县');
INSERT INTO `ybc_member_address` VALUES ('174', '27', 'aaaaaaa', '13071025017', 'asdfafgf', '0', '450000', '辽宁省', '鞍山市', '海城市');
INSERT INTO `ybc_member_address` VALUES ('175', '27', 'aaaaaaa', '13071025017', 'asdfafgf', '2', '450000', '辽宁省', '鞍山市', '海城市');
INSERT INTO `ybc_member_address` VALUES ('176', '27', 'qqqqqqqqqqqqqq', '13071025017', 'asfdasfag', '0', '450000', '重庆市', '重庆市', '北碚区');
INSERT INTO `ybc_member_address` VALUES ('177', '30', '杨晶', '13140645359', '哈哈哈哈哈哈', '0', '122265', '吉林省', '吉林市', '丰满区');
INSERT INTO `ybc_member_address` VALUES ('178', '30', '杨晶', '13140645359', '哈哈哈哈哈哈', '2', '122265', '吉林省', '吉林市', '丰满区');
INSERT INTO `ybc_member_address` VALUES ('179', '6', '12345', '13513513545', '你猜我在那', '2', '456789', '贵州省', '贵阳市', '修文县 ');
INSERT INTO `ybc_member_address` VALUES ('181', '29', '倒萨放松', '13071025537', '的萨芬是的萨芬', '2', '450000', '山西省', '阳泉市', '平定县');
INSERT INTO `ybc_member_address` VALUES ('182', '8', 'moon', '15038107334', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('183', '29', '倒萨放松', '13071025537', '的萨芬是的萨芬', '2', '450000', '山西省', '阳泉市', '平定县');
INSERT INTO `ybc_member_address` VALUES ('185', '29', '郭凯程', '13071025537', '撒旦撒是否萨芬', '0', '450000', '浙江省', '衢州市', '天马镇');
INSERT INTO `ybc_member_address` VALUES ('186', '8', 'moon', '15038107334', '云和数据一楼', '2', '466300', '河南省', '郑州市', '中原区');
INSERT INTO `ybc_member_address` VALUES ('187', '23', '符肖亚', '15556478546', '阿萨德ss', '2', '456789', '广东省', '深圳市', '南山区');
INSERT INTO `ybc_member_address` VALUES ('188', '23', 'ffff', '13513513535', 'qweeqweqw', '0', '234555', '重庆市', '重庆市', '九龙坡区');
INSERT INTO `ybc_member_address` VALUES ('189', '23', 'fuxioaya', '15815815815', '777777777', '2', '158158', '北京市', '北京市', '宣武区');
INSERT INTO `ybc_member_address` VALUES ('190', '23', 'eeqe', '13513513535', '31qweqweq', '0', '123445', '广西壮族自治区', '柳州市', '鹿寨县 ');
INSERT INTO `ybc_member_address` VALUES ('191', '23', 'eqweqw', '13513513535', 'eqweqw', '0', '234132', '河北省', '唐山市', '滦南县');
INSERT INTO `ybc_member_address` VALUES ('192', '13', 'fdgafsgdfg', '13071025537', 'dsadsadg', '0', '444444', '重庆市', '重庆市', '九龙坡区');

-- ----------------------------
-- Table structure for `ybc_member_message`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_member_message`;
CREATE TABLE `ybc_member_message` (
  `id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` smallint(1) unsigned DEFAULT '0' COMMENT '0代表未读，1代表已读',
  `from` varchar(20) DEFAULT '系统',
  `time` int(11) DEFAULT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_member_message
-- ----------------------------
INSERT INTO `ybc_member_message` VALUES ('1', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('2', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('3', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('4', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('5', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('6', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('7', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('8', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('9', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('10', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('11', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('12', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('13', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('14', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('15', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('16', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('17', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('18', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('19', '3', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('20', '4', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('21', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('22', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('23', '2', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('24', '3', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('25', '4', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('26', '3', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('27', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('28', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('29', '1', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('30', '3', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('31', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('32', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('33', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('34', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('35', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('36', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('37', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('38', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('39', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('40', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('41', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('42', '4', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('43', '1', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('44', '1', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('45', '2', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('46', '14', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('47', '18', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('48', '23', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('49', '24', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('50', '25', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('51', '26', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('52', '27', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('53', '28', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('54', '4', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('55', '3', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('56', '3', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('57', '4', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('58', '7', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('59', '8', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('60', '7', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('61', '8', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('63', '6', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴', '&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴开抢啦！&lt;/span&gt;', '1', '团购提醒', '1479385765');
INSERT INTO `ybc_member_message` VALUES ('64', '16', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴', '&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴开抢啦！&lt;/span&gt;', '0', '团购提醒', '1479385765');
INSERT INTO `ybc_member_message` VALUES ('65', '2', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴', '&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴开抢啦！&lt;/span&gt;', '0', '团购提醒', '1479385765');
INSERT INTO `ybc_member_message` VALUES ('66', '17', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴', '&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴开抢啦！&lt;/span&gt;', '0', '团购提醒', '1479385765');
INSERT INTO `ybc_member_message` VALUES ('67', '22', '醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴', '&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴开抢啦！&lt;/span&gt;', '0', '团购提醒', '1479385765');
INSERT INTO `ybc_member_message` VALUES ('68', '6', '开团啦！', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开团啦！\r\n&lt;/p&gt;', '1', '团购提醒', '1479458126');
INSERT INTO `ybc_member_message` VALUES ('69', '2', '开团啦！', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开团啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458126');
INSERT INTO `ybc_member_message` VALUES ('70', '16', '开团啦！', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开团啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458126');
INSERT INTO `ybc_member_message` VALUES ('71', '13', '开团啦！', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开团啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458126');
INSERT INTO `ybc_member_message` VALUES ('72', '17', '开团啦！', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;&quot;&gt;醉品朴茶 安溪铁观音 2016秋茶 乌龙茶 清香型 消酸 二级 素朴NGY0456-500g&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开团啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458126');
INSERT INTO `ybc_member_message` VALUES ('73', '6', '开枪啦', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;background-color:#E5EBEE;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开抢啦！\r\n&lt;/p&gt;', '1', '团购提醒', '1479458578');
INSERT INTO `ybc_member_message` VALUES ('74', '16', '开枪啦', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;background-color:#E5EBEE;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开抢啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458578');
INSERT INTO `ybc_member_message` VALUES ('75', '2', '开枪啦', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;background-color:#E5EBEE;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开抢啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458578');
INSERT INTO `ybc_member_message` VALUES ('76', '17', '开枪啦', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;background-color:#E5EBEE;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开抢啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458578');
INSERT INTO `ybc_member_message` VALUES ('77', '22', '开枪啦', '&lt;p&gt;\r\n	你报名参加的\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:微软雅黑;line-height:35px;background-color:#E5EBEE;&quot;&gt;醉品朴茶黄山毛峰 2016明前茶 绿茶 特级 本朴&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	开抢啦！\r\n&lt;/p&gt;', '0', '团购提醒', '1479458578');
INSERT INTO `ybc_member_message` VALUES ('78', '2', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460426');
INSERT INTO `ybc_member_message` VALUES ('79', '6', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('80', '8', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('81', '9', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('82', '10', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('83', '11', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('84', '12', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('85', '13', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('86', '14', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('87', '15', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('88', '16', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('89', '17', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('90', '18', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('91', '19', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('92', '20', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('93', '21', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('94', '22', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '1', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('95', '23', '通知', '&lt;span style=&quot;color:#4C33E5;&quot;&gt;由于最近工作劳累，本网站放假10天。在此期间，网站不开放。谢谢你的理解。&lt;/span&gt;', '0', '系统', '1479460427');
INSERT INTO `ybc_member_message` VALUES ('96', '2', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('97', '6', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '1', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('98', '8', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '1', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('99', '9', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('100', '10', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('101', '11', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '1', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('102', '12', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '1', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('103', '13', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('104', '14', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('105', '15', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('106', '16', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('107', '17', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('108', '18', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('109', '19', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '1', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('110', '20', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('111', '21', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('112', '22', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('113', '23', '惊喜！！！！', '&lt;p&gt;\r\n	走过的路过的千万不要错过啊，这个千载难逢的机会呗你遇到了，不要紧张，不要慌张，也不要怀疑，这个消息绝对让你震惊！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	因为我们要关门了！\r\n&lt;/p&gt;', '0', '系统', '1479461083');
INSERT INTO `ybc_member_message` VALUES ('114', '2', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('115', '6', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('116', '8', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('117', '9', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('118', '10', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('119', '11', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('120', '12', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('121', '13', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('122', '14', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('123', '15', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('124', '16', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461741');
INSERT INTO `ybc_member_message` VALUES ('125', '17', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('126', '18', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('127', '19', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('128', '20', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('129', '21', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '0', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('130', '22', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('131', '23', '夭寿啦！', '&lt;p&gt;\r\n	下面插播一条新闻：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	本市前日发生了一起骇人听闻的事件：一名不愿透漏姓名的符肖亚先生说：最近网上一个叫一杯茶的网站在做活动，买一袋茶叶。送一个越南新娘，据记者暗访，确有其事，该网站已经帮助很多单身狗脱离了狗群，包括本台的记者。。。。\r\n&lt;/p&gt;', '1', '系统', '1479461742');
INSERT INTO `ybc_member_message` VALUES ('132', '2', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('133', '6', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('134', '8', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('135', '9', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('136', '10', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('137', '11', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('138', '12', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('139', '13', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('140', '14', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('141', '15', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('142', '16', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('143', '17', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('144', '18', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('145', '19', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('146', '20', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('147', '21', '415445', '6464654654646', '0', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('148', '22', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('149', '23', '415445', '6464654654646', '1', '系统', '1479467865');
INSERT INTO `ybc_member_message` VALUES ('150', '11', '封号通知', '&lt;p&gt;\r\n	尊敬的玩家：\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp; 由于你的不规范的操作，现在讲你的号封禁，特此通知！\r\n&lt;/p&gt;', '1', '系统', '1479469071');
INSERT INTO `ybc_member_message` VALUES ('151', '2', '约不', '约不约小妞？', '1', '系统', '1479469900');
INSERT INTO `ybc_member_message` VALUES ('152', '2', '你好 ', '我准备封你的号', '1', '系统', '1479530189');
INSERT INTO `ybc_member_message` VALUES ('153', '4', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('154', '4', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('155', '5', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('156', '6', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('157', '7', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('158', '8', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('159', '9', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('160', '10', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('161', '31', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('162', '33', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('163', '34', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('164', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('165', '1', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('166', '2', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('167', '3', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('168', '14', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('169', '18', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('170', '23', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('171', '24', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('172', '25', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('173', '26', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('174', '27', '您的满意的我们的追求!', '亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！', '1', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('175', '2', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('176', '6', '123', '12222', '1', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('177', '8', '123', '12222', '1', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('178', '9', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('179', '10', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('180', '11', '123', '12222', '1', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('181', '12', '123', '12222', '1', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('182', '13', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('183', '14', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('184', '15', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('185', '16', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('186', '17', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('187', '18', '123', '12222', '0', '系统', '1479722746');
INSERT INTO `ybc_member_message` VALUES ('188', '19', '123', '12222', '0', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('189', '20', '123', '12222', '0', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('190', '21', '123', '12222', '0', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('191', '22', '123', '12222', '1', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('192', '23', '123', '12222', '1', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('193', '24', '123', '12222', '0', '系统', '1479722747');
INSERT INTO `ybc_member_message` VALUES ('194', '52', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', null);
INSERT INTO `ybc_member_message` VALUES ('195', '160', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1479798562');
INSERT INTO `ybc_member_message` VALUES ('196', '160', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1479798622');
INSERT INTO `ybc_member_message` VALUES ('197', '23', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '1', '系统', '1479799137');
INSERT INTO `ybc_member_message` VALUES ('198', '6', 'nihao ', 'nihaoa', '1', '系统', '1479885136');
INSERT INTO `ybc_member_message` VALUES ('199', '2', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('200', '6', 'hello ', 'hello world', '1', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('201', '8', 'hello ', 'hello world', '1', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('202', '9', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('203', '10', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('204', '11', 'hello ', 'hello world', '1', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('205', '12', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('206', '13', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('207', '14', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('208', '15', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('209', '16', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('210', '17', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('211', '18', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('212', '19', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('213', '20', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('214', '21', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('215', '22', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('216', '23', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('217', '24', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('218', '25', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('219', '26', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('220', '27', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('221', '28', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('222', '29', 'hello ', 'hello world', '1', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('223', '30', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('224', '31', 'hello ', 'hello world', '0', '系统', '1480574189');
INSERT INTO `ybc_member_message` VALUES ('225', '11', 'nihao ', 'hello world', '1', '系统', '1480574224');
INSERT INTO `ybc_member_message` VALUES ('226', '6', '开团啦', '开团啦', '1', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('227', '8', '开团啦', '开团啦', '1', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('228', '2', '开团啦', '开团啦', '0', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('229', '16', '开团啦', '开团啦', '0', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('230', '17', '开团啦', '开团啦', '0', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('231', '22', '开团啦', '开团啦', '0', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('232', '19', '开团啦', '开团啦', '0', '团购提醒', '1480574294');
INSERT INTO `ybc_member_message` VALUES ('233', '6', '123', '1111', '1', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('234', '8', '123', '1111', '1', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('235', '2', '123', '1111', '0', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('236', '16', '123', '1111', '0', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('237', '17', '123', '1111', '0', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('238', '22', '123', '1111', '0', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('239', '19', '123', '1111', '0', '团购提醒', '1480574329');
INSERT INTO `ybc_member_message` VALUES ('240', '17', '123', '123', '0', '团购提醒', '1480574669');
INSERT INTO `ybc_member_message` VALUES ('241', '6', '123', '123', '1', '团购提醒', '1480574669');
INSERT INTO `ybc_member_message` VALUES ('242', '22', '123', '123', '0', '团购提醒', '1480574669');
INSERT INTO `ybc_member_message` VALUES ('243', '6', '11111', '11111111', '1', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('244', '8', '11111', '11111111', '1', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('245', '2', '11111', '11111111', '0', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('246', '16', '11111', '11111111', '0', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('247', '17', '11111', '11111111', '0', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('248', '22', '11111', '11111111', '0', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('249', '19', '11111', '11111111', '0', '团购提醒', '1480574728');
INSERT INTO `ybc_member_message` VALUES ('250', '2', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('251', '6', '45', '444444', '1', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('252', '8', '45', '444444', '1', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('253', '9', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('254', '10', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('255', '11', '45', '444444', '1', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('256', '12', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('257', '13', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('258', '14', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('259', '15', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('260', '16', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('261', '17', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('262', '18', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('263', '19', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('264', '20', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('265', '21', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('266', '22', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('267', '23', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('268', '24', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('269', '25', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('270', '26', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('271', '27', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('272', '28', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('273', '29', '45', '444444', '1', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('274', '30', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('275', '31', '45', '444444', '0', '系统', '1480574830');
INSERT INTO `ybc_member_message` VALUES ('276', '6', '123', '123', '1', '团购提醒', '1480574940');
INSERT INTO `ybc_member_message` VALUES ('277', '17', '123', '123', '0', '团购提醒', '1480574940');
INSERT INTO `ybc_member_message` VALUES ('278', '6', '20', '这是20号团购提醒', '1', '团购提醒', '1480575018');
INSERT INTO `ybc_member_message` VALUES ('279', '11', '20', '这是20号团购提醒', '0', '团购提醒', '1480575018');
INSERT INTO `ybc_member_message` VALUES ('280', '22', '20', '这是20号团购提醒', '1', '团购提醒', '1480575018');
INSERT INTO `ybc_member_message` VALUES ('281', '22', '4555', '111111', '1', '团购提醒', '1480575173');
INSERT INTO `ybc_member_message` VALUES ('282', '6', '这是20号团购商品的提醒', 'hello world', '1', '团购提醒', '1480576188');
INSERT INTO `ybc_member_message` VALUES ('283', '11', '这是20号团购商品的提醒', 'hello world', '0', '团购提醒', '1480576188');
INSERT INTO `ybc_member_message` VALUES ('284', '22', '这是20号团购商品的提醒', 'hello world', '0', '团购提醒', '1480576188');
INSERT INTO `ybc_member_message` VALUES ('285', '6', 'hi', 'hi 小姐', '1', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('286', '8', 'hi', 'hi 小姐', '1', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('287', '9', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('288', '10', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('289', '11', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('290', '12', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('291', '13', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('292', '14', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('293', '15', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('294', '16', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('295', '17', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('296', '18', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('297', '19', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('298', '20', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('299', '21', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('300', '22', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('301', '23', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('302', '24', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('303', '25', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('304', '26', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('305', '27', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('306', '28', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('307', '29', 'hi', 'hi 小姐', '1', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('308', '30', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('309', '31', 'hi', 'hi 小姐', '0', '系统', '1480576292');
INSERT INTO `ybc_member_message` VALUES ('310', '6', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1480643469');
INSERT INTO `ybc_member_message` VALUES ('311', '6', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1480643469');
INSERT INTO `ybc_member_message` VALUES ('312', '12', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1480643469');
INSERT INTO `ybc_member_message` VALUES ('313', '12', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1480643469');
INSERT INTO `ybc_member_message` VALUES ('314', '23', '收货提醒!', '亲，您的宝贝已经向您飞奔而去，请注意查收哦！', '0', '系统', '1480643469');
INSERT INTO `ybc_member_message` VALUES ('315', '6', '亲,看中了就买了吧!', '亲，您订单里的宝贝马上就要失效了，赶紧付款哦！', '0', '系统', '1480643505');
INSERT INTO `ybc_member_message` VALUES ('316', '6', '11111', '11111', '1', '团购提醒', '1480647048');
INSERT INTO `ybc_member_message` VALUES ('317', '6', '111111', '111111', '1', '系统', '1480647093');

-- ----------------------------
-- Table structure for `ybc_message`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_message`;
CREATE TABLE `ybc_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) NOT NULL,
  `content` text NOT NULL,
  `active` smallint(1) DEFAULT '0' COMMENT '0代表为处理，1代表已经处理',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_message
-- ----------------------------
INSERT INTO `ybc_message` VALUES ('1', '2', '你好啊', '0');

-- ----------------------------
-- Table structure for `ybc_order`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_order`;
CREATE TABLE `ybc_order` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) NOT NULL COMMENT '用户id，与ybc_member表的主键id关联',
  `ordersyn` varchar(60) NOT NULL,
  `orderprice` float(10,2) DEFAULT NULL,
  `orderstatus` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1代付款2代发货3待确认收货4订单完成0失效订单',
  `addtime` int(10) unsigned DEFAULT NULL,
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货人信息，',
  `paymethod` tinyint(3) unsigned DEFAULT '1' COMMENT '支付方式（1货到付款，2支付宝，3微信付款）',
  `postage` int(10) NOT NULL DEFAULT '0' COMMENT '邮费',
  `message` varchar(150) DEFAULT NULL,
  `points` int(10) DEFAULT NULL,
  `contime` int(10) unsigned DEFAULT NULL COMMENT '确认收货的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_order
-- ----------------------------
INSERT INTO `ybc_order` VALUES ('1', '6', '20161102', '3033.00', '4', '1478083531', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('2', '2', '20161102', '330.00', '4', '1478083731', '2', '1', '0', null, '330', null);
INSERT INTO `ybc_order` VALUES ('3', '6', 'FDSGDFGDF', '666.00', '4', '1478083531', '0', '1', '0', null, '666', '1479264824');
INSERT INTO `ybc_order` VALUES ('4', '6', 'EWSDASFDAS', '666.00', '1', '1478083531', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('5', '6', 'SAFSDFDSFA', '666.00', '1', '1478083531', '24', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('6', '6', 'EDSADFS', '888.00', '1', '1478083531', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('7', '6', '8173124613c391e2589763f7dc9ed7a5', '3533.00', '1', '1478227367', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('8', '6', '0d52ec460bea812c56e69b6821132ba3', '3533.00', '1', '1478227404', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('9', '6', 'ec5f16136dabb35d54e7acd01ccf8f94', '3533.00', '1', '1478227482', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('10', '6', 'b82580502371bdedb66b85b14b7eda14', '3533.00', '1', '1478227709', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('11', '6', '2033c217635efea7d155f14c2d144aa0', '3533.00', '0', '1478227963', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('12', '6', 'c8d30565463cc45aef0c6badf842cb29', '3533.00', '0', '1478227998', '22', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('14', '6', 'ec930d5671c51adac4d07d808265f7f2', '3180.00', '4', '1478228082', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('15', '6', 'c682fab249f9a3dd71e2dd7348043c8b', '3533.00', '0', '1478228178', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('16', '6', '80a6cf94a4d608c167a474c547e2ef5d', '3533.00', '0', '1478228229', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('17', '6', 'b2728bd2c01e2fd09455a022620df85b', '53.00', '5', '1478228326', '2', '1', '10', null, null, null);
INSERT INTO `ybc_order` VALUES ('18', '6', '2626440f1b9a4f78672b60e1c821f943', '3533.00', '4', '1478231865', '58', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('20', '6', 'ecc60143ce4ad5387710c03041a9870c', '4349.00', '0', '1478243374', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('23', '6', 'faa8b45db15621a8070b9172354e482e', '4349.00', '4', '1478243596', '54', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('24', '6', 'e220225f53b0f7808e4b320afb5da6f5', '4349.00', '4', '1478243769', '55', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('25', '6', 'a10239a0b6901a46c077e995160d236a', '4349.00', '4', '1478243893', '56', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('26', '6', '3c9622e07ac88264611c5b2c213ef546', '392.00', '4', '1478244081', '57', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('27', '6', '9bb2d666988dcf9163bdbd9b33a6e73c', '899.00', '4', '1478246352', '59', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('28', '6', 'd2fc72c7dcb8d44143b90d6a90ce9788', '120.00', '4', '1478246728', '60', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('29', '6', '591320937f17f10620fdc6c954d7b6b2', '100.00', '4', '1478248374', '61', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('30', '6', 'b82e65559715bda5da1d3843ee177b6e', '900.00', '4', '1478249748', '62', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('31', '6', '40defcf5fe7d310c69e18269fd85a687', '400.00', '1', '1478252187', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('32', '6', 'd7ff04802d5bf9aa28c2df66daf50f30', '3409.00', '4', '1478306745', '63', '1', '0', null, '3409', '1478659678');
INSERT INTO `ybc_order` VALUES ('33', '6', '2369a7269805e10896ecab3907fa5bad', '800.00', '1', '1478308662', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('34', '6', 'd0b0a639b98e1eebebecdf67e7353185', '544.00', '1', '1478309482', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('35', '6', 'fec14da93ac4130f7d430ad63f3f0e61', '544.00', '1', '1478310988', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('36', '6', 'ae7f90790705e1382886206464a4d54b', '880.00', '1', '1478311018', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('37', '6', '31309e9ba0af4b82c7006b4d06fc0edf', '880.00', '1', '1478311054', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('38', '6', '6bd6df5baafe4127d8cb2b75eb07be12', '400.00', '4', '1478311139', '64', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('39', '6', '0881c5598abb9e0d354e968199286eab', '272.00', '1', '1478311482', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('40', '6', '3fa2ec54084920a678feb1df18727e43', '272.00', '4', '1478311553', '66', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('41', '2', '2205a80c03f497fae5de14eedfb2ca16', '2400.00', '4', '1478321427', '128', '1', '0', null, '2400', null);
INSERT INTO `ybc_order` VALUES ('43', '6', '7f778ad7d372ced7ef99573597900d7b', '300.00', '4', '1478327679', '68', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('44', '6', '42d13a16d3c73ab656054fd35102ab5b', '100.00', '4', '1478336114', '69', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('45', '12', 'befd08a365d8791bcf74e9726ba1cdaa', '4951.00', '4', '1478336257', '71', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('46', '8', '4eb8b1b842253c71d9aea0fe97f3e558', '3824.00', '0', '1478337405', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('47', '6', '9e1b5d84eb425a70f2f1c42d4f97e3b5', '653.00', '4', '1478339384', '72', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('49', '12', 'a16b26dcc509df58117bf94f7c9dbba7', '1728.00', '1', '1478483114', '70', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('50', '2', '282f6832e2c7fd423c2415a3f5f6d96e', '400.00', '5', '1478484459', '76', '1', '0', null, '400', null);
INSERT INTO `ybc_order` VALUES ('51', '6', 'd9c3f1618bc3d68c17add85271874eaa', '6552.00', '3', '1478487040', '77', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('52', '6', 'b626150ca82aac6392b9ace26ff31049', '350.00', '3', '1478503373', '78', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('53', '6', 'f11499d2788b1c2285b704f9d09b75ff', '272.00', '4', '1478503487', '79', '1', '0', null, '272', '1479719894');
INSERT INTO `ybc_order` VALUES ('54', '6', '4b7bb50698fb0a5c281fe7c8c8b7805d', '44000.00', '4', '1478503607', '80', '1', '0', null, '44000', '1479121895');
INSERT INTO `ybc_order` VALUES ('57', '6', 'c07fc194d2ed6e2f1147faf017e715a6', '272.00', '4', '1478504914', '81', '1', '0', null, '272', '1479265257');
INSERT INTO `ybc_order` VALUES ('58', '6', '4c18f09aaf55be735ea2000aa188d989', '400.00', '4', '1478505186', '82', '2', '0', '', '400', '1479263927');
INSERT INTO `ybc_order` VALUES ('59', '6', 'da2c6ead3acb1c17d817071307689bd1', '400.00', '4', '1478505270', '83', '3', '0', 'dadasfdsdfsdfdsfsfas', '400', '1479121901');
INSERT INTO `ybc_order` VALUES ('60', '6', '6023bb00e6e9a6461c453680a9599fe7', '1600.00', '0', '1478505353', '24', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('61', '2', 'fc97093ea7f21d8aee2d043391a2aec1', '1153.00', '4', '1478510677', '84', '1', '0', null, '1153', null);
INSERT INTO `ybc_order` VALUES ('62', '12', 'aa64c96b8aef504e16999665b7802770', '2319.00', '0', '1478516728', '70', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('63', '12', 'e8aeb7fa5385b5af37fc2f6d58d7e8cc', '400.00', '0', '1478516909', '70', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('64', '12', '1181777e7cff560a6c469ffe040db507', '150.00', '3', '1478517868', '85', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('65', '12', 'e7c11602619949925cb2a23213f6a99d', '150.00', '3', '1478518041', '86', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('66', '6', 'e6a88bde2fde994c7749ae975cbe425a', '272.00', '4', '1478520087', '87', '1', '0', '', '272', '1479121898');
INSERT INTO `ybc_order` VALUES ('67', '6', 'e74b8317e0e4bfceb17ab142f5728c2d', '272.00', '4', '1478520750', '88', '1', '0', '', '272', '1479121629');
INSERT INTO `ybc_order` VALUES ('68', '12', 'e492d58034382bc7832a38d521d23982', '911.00', '4', '1478521340', '89', '1', '0', '', '911', '1479345527');
INSERT INTO `ybc_order` VALUES ('69', '6', '97e69e6cfc70de28258e75ebc5653f58', '350.00', '4', '1478521792', '90', '1', '0', '', '350', '1479121590');
INSERT INTO `ybc_order` VALUES ('70', '8', '52e0c18ea66ee080527aa104adefcd6a', '88.00', '4', '1478522763', '0', '1', '0', '', '88', '1480576831');
INSERT INTO `ybc_order` VALUES ('71', '8', 'c5081b7b50497a0f8e974b8ed7fd834e', '88.00', '5', '1478522804', '92', '1', '0', '', '88', '1480576808');
INSERT INTO `ybc_order` VALUES ('72', '6', '46016c4fb456cc9ba15df62c63fdf3fa', '1100.00', '4', '1478567741', '93', '1', '0', '', '1100', '1479121573');
INSERT INTO `ybc_order` VALUES ('73', '2', '655dc26a5f825e2172ffa377330e185d', '400.00', '4', '1478568654', '94', '1', '0', '', '400', null);
INSERT INTO `ybc_order` VALUES ('74', '6', '9fd926a85b72ddd482b91587c84e43b0', '880.00', '1', '1478577083', '24', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('75', '6', '82bcfd1dccad42c7a0a841747000411c', '1529.00', '5', '1478605683', '95', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('76', '6', '48fcb91eb1446126d2fb185d59d9ed79', '720.00', '5', '1478605928', '96', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('77', '6', '5cf2247a64e00e4109de930c5f3cd7d0', '588.00', '5', '1478606009', '97', '1', '0', '', '588', null);
INSERT INTO `ybc_order` VALUES ('78', '2', '4eae5d7174784b4a93e8391f7ca9ae9f', '272.00', '4', '1478607525', '98', '1', '0', '', '272', null);
INSERT INTO `ybc_order` VALUES ('79', '6', '89c0ad1698c10007e473e5d666fd5cff', '54128.00', '1', '1478609005', '2', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('80', '2', 'c907a147d5f1191b3bca245381d02bb3', '4000.00', '4', '1478611560', '99', '1', '0', '', '4000', null);
INSERT INTO `ybc_order` VALUES ('81', '13', 'aa593e4b1450b908ea0bef93401e69a6', '1760.00', '4', '1478654628', '100', '1', '0', '', '1760', null);
INSERT INTO `ybc_order` VALUES ('83', '6', '7956b52b580bac57bf0d77045533ec56', '1391.00', '4', '1478655825', '102', '1', '0', '', '1391', '1479121563');
INSERT INTO `ybc_order` VALUES ('84', '6', '1aa04926999fbccd6c1e2a799548af6d', '880.00', '4', '1478656355', '0', '1', '0', '', '880', '1479121516');
INSERT INTO `ybc_order` VALUES ('85', '6', 'f345d201732424eb209a1f97cdf11460', '880.00', '1', '1478657176', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('87', '6', '2b7f1d240fbdd145892532f576e3ac22', '850.00', '1', '1478657658', '107', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('88', '6', 'eeec5bbd2c96455f756925a45a99669e', '400.00', '0', '1478659244', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('89', '6', '5b3bde44fa91c74ad4f910ae475097f0', '5280.00', '1', '1478663730', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('90', '13', 'f2ec6375d9deac273035989ce711cdb5', '480.00', '4', '1478674161', '109', '1', '0', '', '480', '1478674292');
INSERT INTO `ybc_order` VALUES ('91', '13', '09f433b1e137aa9656f6d3bdfcb53d70', '568.00', '5', '1478674312', '110', '1', '0', '', '568', '1478674338');
INSERT INTO `ybc_order` VALUES ('92', '6', '649d17c8478de5b3a99e70acc15b6f0b', '120.00', '4', '1478675435', '123', '3', '0', '', '120', '1479121493');
INSERT INTO `ybc_order` VALUES ('93', '6', 'f80c2253039c1dda129f3671bb53fc7c', '4344.00', '0', '1478680378', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('94', '6', '692dd96b4c7e7985cbc30f998dcce8fe', '4184.00', '4', '1478683280', '112', '1', '0', '', '4184', '1479121292');
INSERT INTO `ybc_order` VALUES ('95', '12', 'c2df1adc85da026a2f474ddcd58b9f23', '400.00', '4', '1478689032', '113', '1', '0', '', '400', '1478689101');
INSERT INTO `ybc_order` VALUES ('96', '6', 'c179cf022901eab911d9fc60b221e413', '1344.00', '4', '1478692002', '114', '1', '0', '', '1344', '1479121290');
INSERT INTO `ybc_order` VALUES ('97', '6', '3dbc9366c6f82958346cc1f550f7b8b4', '880.00', '4', '1478692182', '121', '3', '0', '撒大大说', '880', '1479121197');
INSERT INTO `ybc_order` VALUES ('98', '6', '8d4432cc81fba91ba961b6b45707ca94', '400.00', '0', '1478692460', '111', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('99', '6', 'bcc3ee1e79cb765f42b1ed4502cddb61', '360.00', '4', '1478692837', '111', '1', '0', '', '360', '1479123216');
INSERT INTO `ybc_order` VALUES ('100', '2', '30bfcc14a4f72a789e0f3a1c749f62de', '880.00', '4', '1478696976', '116', '1', '0', '', '880', '1478697018');
INSERT INTO `ybc_order` VALUES ('101', '6', 'fc0fa2ee1b2cca3e826cce6699558d24', '1760.00', '4', '1478739717', '117', '1', '0', '', '1760', '1479123208');
INSERT INTO `ybc_order` VALUES ('102', '6', '9492daba75a81aee23072c4f9a0a60d2', '880.00', '4', '1478739860', '118', '1', '0', '', '880', '1479123284');
INSERT INTO `ybc_order` VALUES ('103', '6', '933921aed807eda20bb73d5af7ceef58', '880.00', '4', '1478740211', '119', '1', '0', '', '880', '1479263338');
INSERT INTO `ybc_order` VALUES ('104', '6', '0482b438eedd2a3704efe9113bd40421', '1030.00', '4', '1478745477', '120', '3', '0', '按时打算的', '1030', '1479200074');
INSERT INTO `ybc_order` VALUES ('105', '6', 'f66ef9662cbc4d3c7c2128514df7fa32', '1344.00', '4', '1478746046', '122', '1', '0', '', '1344', '1479200070');
INSERT INTO `ybc_order` VALUES ('106', '8', '0c2a05f7d253360b3cd94bc102a7446f', '600.00', '3', '1478749178', '124', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('107', '6', 'd86bc34796f5fe7678b110f0ef7626e5', '2736.00', '4', '1478768237', '125', '1', '0', '', '2736', '1479200065');
INSERT INTO `ybc_order` VALUES ('108', '6', 'a440a904a53a835b81f2afd694ee4259', '3208.00', '4', '1478847117', '137', '2', '0', '1111111111111111111111111111111111111111111111112', '3208', '1479123943');
INSERT INTO `ybc_order` VALUES ('109', '2', 'cf736ccd80f1c2b159089ff7a83bc072', '1260.00', '4', '1479085944', '138', '1', '0', '', '1260', '1479461822');
INSERT INTO `ybc_order` VALUES ('110', '2', 'd8c1ba3810bdb3bbc34c8787ef57ccdd', '380.00', '4', '1479086773', '139', '1', '0', '', '380', '1479461586');
INSERT INTO `ybc_order` VALUES ('111', '8', '5ef72cfbce33f2dfc9e2c57e29a69412', '600.00', '5', '1479094451', '140', '1', '0', '', '600', '1479106116');
INSERT INTO `ybc_order` VALUES ('112', '8', '845397524852759e7c5755ea2c54beff', '120.00', '5', '1479094733', '141', '1', '0', '', '120', '1479106106');
INSERT INTO `ybc_order` VALUES ('113', '8', 'c2b557bdb144d6a56d9359af3f3076e7', '400.00', '0', '1479103221', '91', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('114', '8', '46587d5c29db4eb73bb0ba8da1ed9cbf', '120.00', '1', '1479103473', '91', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('115', '8', '45fe336a4ba2b7797212b3453ded4a2b', '1000.00', '1', '1479103889', '91', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('116', '8', '60995edf61ba767a9d71e0e15cdbeb06', '120.00', '1', '1479104121', '91', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('117', '8', '8bd14f4acd77724c6704acd6c26f9dcc', '400.00', '0', '1479104225', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('118', '8', '0cd1925c23f710bf985f625a604ae22e', '1320.00', '0', '1479105156', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('119', '8', '0ce23b3997cbca06e14905da1b1570a2', '55.00', '0', '1479105716', '0', '1', '10', null, null, null);
INSERT INTO `ybc_order` VALUES ('120', '8', '85fc73d2b05f6323c500d4a182f62078', '120.00', '1', '1479105754', '91', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('121', '6', 'a3b448052dffc157a55b5201181793e8', '56232.00', '2', '1479344866', '144', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('124', '23', 'e890c047fbdf4a66ba93c253c5eaa842', '607.00', '4', '1479363785', '151', '1', '0', '', '607', '1479363855');
INSERT INTO `ybc_order` VALUES ('125', '23', 'fc8aacd7807b177a5c60d90ea8ee3bdb', '4800.00', '0', '1479449705', '145', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('126', '2', 'd30d283f3c8cef5f1ad08e755950c3c3', '4281.00', '4', '1479450256', '154', '1', '0', '', '4281', '1479450297');
INSERT INTO `ybc_order` VALUES ('131', '23', '1caa3accaa176f9d6b6406fddad68bbd', '1878.00', '1', '1479454780', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('132', '23', 'dd5618e6297860ca99b24721c4daa09b', '1878.00', '1', '1479454821', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('133', '23', '39bad3fea0707984ddf75818f218963f', '660.00', '4', '1479454845', '165', '3', '0', 'dasdad', '660', '1480643904');
INSERT INTO `ybc_order` VALUES ('135', '23', '5cfc6eeff22b1a391f1b8f58dc874b7c', '649.00', '0', '1479457640', '146', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('138', '12', '87ec6a567b6bd90b1f167bbd8f7193b8', '1509.00', '1', '1479457968', '70', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('155', '8', '8b0c96efe043586e300e753425c309b3', '400000.00', '1', '1479459008', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('156', '6', '4760d5e130fa0b677165321470699044', '4746.00', '4', '1479719064', '162', '1', '0', '', '4746', '1479719209');
INSERT INTO `ybc_order` VALUES ('158', '6', 'abba0a3e009fbb38c4b309202ee0e8f8', '1206.00', '1', '1479719826', '142', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('159', '6', 'f753d77c82e6b76d209fadbad4b6a4fe', '2020.00', '1', '1479720746', '0', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('160', '23', 'ba3d66e5b33201622f980492a925f4eb', '2100.00', '4', '1479798526', '166', '1', '0', '亲，快点发货哦', '2100', '1479799204');
INSERT INTO `ybc_order` VALUES ('161', '23', '720f56af43939f2eb18d8ca91ec3fa6d', '1279.00', '4', '1479799084', '167', '1', '0', '亲、要礼品哦', '1279', '1479882985');
INSERT INTO `ybc_order` VALUES ('162', '23', 'ae4951f36321a8ba59ffbac2c91c1074', '3826.00', '4', '1479801015', '168', '1', '0', '', '3826', '1479801064');
INSERT INTO `ybc_order` VALUES ('163', '23', '47b459e54178338ba4d4f2ef389b7edf', '1800.00', '1', '1479872658', '155', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('164', '26', '2d3aeb8b3775f22c3eef9f638aea80e3', '1998.00', '4', '1480055688', '170', '1', '0', '', '1998', '1480055772');
INSERT INTO `ybc_order` VALUES ('165', '26', '3e3a157000b798eabab0573a8bc7c553', '3996.00', '4', '1480056123', '173', '1', '0', '', '3996', '1480056140');
INSERT INTO `ybc_order` VALUES ('166', '27', 'c8eba944935152dc31470e011ac8c8e2', '800.00', '4', '1480056266', '175', '1', '0', '', '800', '1480056333');
INSERT INTO `ybc_order` VALUES ('167', '30', '48cbd9bf9eabce54a34784e1c03a0eae', '2138.00', '2', '1480058894', '178', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('168', '29', 'c8370b8d51e460a41140a6027534fd6a', '880.00', '4', '1480514132', '181', '1', '0', '', '880', '1480576226');
INSERT INTO `ybc_order` VALUES ('169', '6', 'a6c5bbb5abac65d82d96358963f4ac40', '880.00', '2', '1480568617', '179', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('170', '8', '859b75f1376083d7b6d2f1088ac2fb18', '240.00', '2', '1480576597', '182', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('171', '29', '924f97eef42fe22568d0c5b385af0b5d', '5500.00', '5', '1480579377', '183', '1', '0', '', '5500', '1480579418');
INSERT INTO `ybc_order` VALUES ('172', '8', '6f16466150b3ed5e9ec1264319d8a4e2', '470.00', '2', '1480589313', '186', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('173', '23', '74781825dd7f445abff1cf9bfd0e0e12', '1088.00', '3', '1480640195', '187', '1', '0', '', null, null);
INSERT INTO `ybc_order` VALUES ('174', '23', 'c14879a965c81a15d8d036e1fb663a6d', '641.00', '4', '1480643310', '189', '2', '0', '', '641', '1480643569');
INSERT INTO `ybc_order` VALUES ('175', '23', '6bf5062617447bb719dba276b776df91', '832.00', '1', '1480643874', '145', '1', '0', null, null, null);
INSERT INTO `ybc_order` VALUES ('176', '6', '279bd7cea8b28a8ea8a0d5479c5fc76a', '120.00', '1', '1480646044', '164', '1', '0', null, null, null);

-- ----------------------------
-- Table structure for `ybc_orderintegral`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_orderintegral`;
CREATE TABLE `ybc_orderintegral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) NOT NULL COMMENT '用户id，与ybc_member表的主键id关联',
  `ordersyn` varchar(60) NOT NULL,
  `orderpoints` int(10) DEFAULT NULL,
  `orderstatus` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1待发货2待确认收货3订单完成0失效订单',
  `addtime` int(10) unsigned DEFAULT NULL,
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货人信息，',
  `postage` int(10) NOT NULL DEFAULT '0' COMMENT '邮费',
  `contime` int(10) unsigned DEFAULT NULL COMMENT '确认收货的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_orderintegral
-- ----------------------------
INSERT INTO `ybc_orderintegral` VALUES ('1', '2', '20161107095941', '100', '5', '1458483981', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('2', '2', '20161107104214', '230', '5', '1478486534', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('3', '2', '20161107165431', '500', '5', '1478508871', '3', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('12', '2', '20161107201752', '900', '5', '1478521072', '2', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('13', '2', '20161107210709', '200', '5', '1478524029', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('14', '2', '20161108114029', '1000', '5', '1478576429', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('25', '2', '20161108201204', '1000', '5', '1478607124', '67', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('26', '12', '20161108204647', '300', '3', '1478609207', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('27', '2', '20161108211708', '200', '3', '1478611028', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('28', '2', '20161108211736', '500', '3', '1478611056', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('29', '13', '20161109092709', '900', '5', '1478654829', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('30', '13', '20161109101242', '230', '3', '1478657562', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('31', '13', '20161109103112', '200', '3', '1478658672', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('32', '13', '20161109103940', '200', '3', '1478659180', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('33', '13', '20161109104210', '200', '3', '1478659330', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('35', '13', '20161109110939', '200', '3', '1478660979', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('36', '6', '20161109144430', '600', '3', '1478673870', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('37', '6', '20161109191438', '200', '3', '1478690078', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('38', '2', '20161110155143', '1000', '3', '1478764303', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('39', '2', '20161110194018', '1000', '3', '1478778018', '67', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('40', '13', '20161110201222', '100', '3', '1478779942', '127', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('41', '13', '20161110203246', '100', '3', '1478781166', '129', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('42', '13', '20161110203428', '100', '1', '1478781268', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('43', '13', '20161110203623', '100', '1', '1478781383', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('44', '13', '20161110205508', '100', '5', '1478782508', '132', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('45', '13', '20161110210705', '200', '5', '1478783225', '133', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('46', '2', '20161110212451', '300', '3', '1478784291', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('47', '20', '20161111103932', '200', '2', '1478831972', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('48', '20', '20161111104344', '200', '2', '1478832224', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('49', '20', '20161111104452', '200', '2', '1478832292', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('50', '20', '20161111104601', '200', '2', '1478832361', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('51', '20', '20161111104646', '200', '2', '1478832406', '0', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('52', '20', '20161111104727', '200', '2', '1478832447', '135', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('53', '20', '20161111105248', '100', '2', '1478832768', '135', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('54', '20', '20161111110920', '300', '2', '1478833760', '136', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('55', '2', '20161114093356', '200', '3', '1479087236', '67', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('56', '2', '20161114204218', '200', '3', '1479127338', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('57', '2', '20161117105828', null, '3', '1479351508', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('58', '2', '20161117110507', '200', '2', '1479351907', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('59', '2', '20161117111924', '200', '2', '1479352764', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('60', '2', '20161117113912', '600', '2', '1479353952', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('61', '2', '20161117114056', '200', '2', '1479354056', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('62', '2', '20161117143331', '300', '2', '1479364411', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('63', '2', '20161117143754', '200', '2', '1479364674', '153', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('64', '2', '20161117143813', '200', '2', '1479364693', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('65', '2', '20161117143857', '200', '1', '1479364737', '1', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('66', '2', '20161117144100', '200', '2', '1479364860', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('67', '2', '20161117144246', '200', '1', '1479364966', '67', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('68', '2', '20161117145735', '200', '2', '1479365855', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('69', '2', '20161121175040', '230', '2', '1479721840', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('70', '2', '20161121175639', '900', '2', '1479722199', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('71', '2', '20161121184628', '900', '1', '1479725188', '75', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('72', '2', '20161121184940', '100', '2', '1479725380', '4', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('73', '26', '20161125143654', '900', '2', '1480055814', '171', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('74', '26', '20161125143722', '900', '2', '1480055842', '171', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('75', '26', '20161125144039', '100', '2', '1480056039', '172', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('76', '26', '20161125144230', '200', '1', '1480056150', '170', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('77', '27', '20161125144542', '100', '2', '1480056342', '176', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('78', '29', '20161201151107', '100', '5', '1480576267', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('79', '29', '20161201160353', '200', '2', '1480579433', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('80', '29', '20161201160404', '300', '2', '1480579444', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('81', '29', '20161201160626', '300', '2', '1480579586', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('82', '29', '20161201160640', '500', '2', '1480579600', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('83', '29', '20161201160706', '100', '2', '1480579626', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('84', '29', '20161201160809', '900', '2', '1480579689', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('85', '29', '20161201160829', '300', '2', '1480579709', '185', '0', null);
INSERT INTO `ybc_orderintegral` VALUES ('86', '13', '20161202101717', '230', '2', '1480645037', '192', '0', null);

-- ----------------------------
-- Table structure for `ybc_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_order_goods`;
CREATE TABLE `ybc_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `buynum` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_order_goods
-- ----------------------------
INSERT INTO `ybc_order_goods` VALUES ('1', '1', '46', '1');
INSERT INTO `ybc_order_goods` VALUES ('2', '1', '44', '3');
INSERT INTO `ybc_order_goods` VALUES ('3', '1', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('4', '1', '30', '3');
INSERT INTO `ybc_order_goods` VALUES ('5', '1', '29', '2');
INSERT INTO `ybc_order_goods` VALUES ('6', '2', '46', '1');
INSERT INTO `ybc_order_goods` VALUES ('7', '11', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('8', '11', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('9', '11', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('10', '11', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('11', '12', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('12', '12', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('13', '12', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('14', '12', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('15', '14', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('16', '14', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('17', '15', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('18', '15', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('19', '15', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('20', '15', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('21', '16', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('22', '16', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('23', '16', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('24', '16', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('25', '17', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('26', '18', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('27', '18', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('28', '18', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('29', '18', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('30', '19', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('31', '19', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('32', '19', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('33', '19', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('34', '19', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('35', '20', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('36', '20', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('37', '20', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('38', '20', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('39', '20', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('40', '21', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('41', '21', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('42', '21', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('43', '21', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('44', '21', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('45', '22', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('46', '22', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('47', '22', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('48', '22', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('49', '22', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('50', '23', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('51', '23', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('52', '23', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('53', '23', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('54', '23', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('55', '24', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('56', '24', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('57', '24', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('58', '24', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('59', '24', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('60', '25', '31', '3');
INSERT INTO `ybc_order_goods` VALUES ('61', '25', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('62', '25', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('63', '25', '29', '7');
INSERT INTO `ybc_order_goods` VALUES ('64', '25', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('65', '26', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('66', '26', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('67', '27', '59', '1');
INSERT INTO `ybc_order_goods` VALUES ('68', '27', '34', '1');
INSERT INTO `ybc_order_goods` VALUES ('69', '28', '40', '1');
INSERT INTO `ybc_order_goods` VALUES ('70', '29', '41', '1');
INSERT INTO `ybc_order_goods` VALUES ('71', '30', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('72', '30', '36', '1');
INSERT INTO `ybc_order_goods` VALUES ('73', '30', '30', '1');
INSERT INTO `ybc_order_goods` VALUES ('74', '31', '30', '1');
INSERT INTO `ybc_order_goods` VALUES ('75', '32', '35', '1');
INSERT INTO `ybc_order_goods` VALUES ('76', '32', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('77', '32', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('78', '32', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('79', '32', '30', '4');
INSERT INTO `ybc_order_goods` VALUES ('80', '33', '30', '2');
INSERT INTO `ybc_order_goods` VALUES ('81', '34', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('82', '35', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('83', '36', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('84', '37', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('85', '38', '30', '1');
INSERT INTO `ybc_order_goods` VALUES ('86', '39', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('87', '40', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('88', '41', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('89', '41', '30', '5');
INSERT INTO `ybc_order_goods` VALUES ('90', '41', '41', '1');
INSERT INTO `ybc_order_goods` VALUES ('91', '42', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('92', '42', '30', '5');
INSERT INTO `ybc_order_goods` VALUES ('93', '42', '41', '1');
INSERT INTO `ybc_order_goods` VALUES ('94', '43', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('95', '44', '41', '1');
INSERT INTO `ybc_order_goods` VALUES ('96', '45', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('97', '45', '39', '2');
INSERT INTO `ybc_order_goods` VALUES ('98', '45', '34', '5');
INSERT INTO `ybc_order_goods` VALUES ('99', '45', '33', '1');
INSERT INTO `ybc_order_goods` VALUES ('100', '46', '49', '2');
INSERT INTO `ybc_order_goods` VALUES ('101', '46', '39', '2');
INSERT INTO `ybc_order_goods` VALUES ('102', '46', '35', '1');
INSERT INTO `ybc_order_goods` VALUES ('103', '46', '30', '2');
INSERT INTO `ybc_order_goods` VALUES ('104', '46', '29', '3');
INSERT INTO `ybc_order_goods` VALUES ('105', '47', '43', '1');
INSERT INTO `ybc_order_goods` VALUES ('106', '47', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('107', '48', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('108', '49', '105', '3');
INSERT INTO `ybc_order_goods` VALUES ('109', '49', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('110', '49', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('111', '49', '63', '1');
INSERT INTO `ybc_order_goods` VALUES ('112', '50', '30', '1');
INSERT INTO `ybc_order_goods` VALUES ('113', '51', '32', '6');
INSERT INTO `ybc_order_goods` VALUES ('114', '51', '110', '1');
INSERT INTO `ybc_order_goods` VALUES ('115', '51', '109', '1');
INSERT INTO `ybc_order_goods` VALUES ('116', '51', '108', '1');
INSERT INTO `ybc_order_goods` VALUES ('117', '51', '107', '1');
INSERT INTO `ybc_order_goods` VALUES ('118', '51', '106', '1');
INSERT INTO `ybc_order_goods` VALUES ('119', '51', '105', '3');
INSERT INTO `ybc_order_goods` VALUES ('120', '51', '104', '1');
INSERT INTO `ybc_order_goods` VALUES ('121', '51', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('122', '51', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('123', '52', '75', '1');
INSERT INTO `ybc_order_goods` VALUES ('124', '53', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('125', '54', '29', '110');
INSERT INTO `ybc_order_goods` VALUES ('126', '55', '29', '112');
INSERT INTO `ybc_order_goods` VALUES ('127', '56', '31', '100');
INSERT INTO `ybc_order_goods` VALUES ('128', '57', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('129', '58', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('130', '59', '30', '1');
INSERT INTO `ybc_order_goods` VALUES ('131', '60', '29', '4');
INSERT INTO `ybc_order_goods` VALUES ('132', '61', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('133', '61', '43', '1');
INSERT INTO `ybc_order_goods` VALUES ('134', '61', '34', '1');
INSERT INTO `ybc_order_goods` VALUES ('135', '62', '29', '3');
INSERT INTO `ybc_order_goods` VALUES ('136', '62', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('137', '62', '33', '1');
INSERT INTO `ybc_order_goods` VALUES ('138', '63', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('139', '64', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('140', '65', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('141', '66', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('142', '67', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('143', '68', '33', '1');
INSERT INTO `ybc_order_goods` VALUES ('144', '69', '75', '1');
INSERT INTO `ybc_order_goods` VALUES ('145', '70', '49', '1');
INSERT INTO `ybc_order_goods` VALUES ('146', '71', '49', '1');
INSERT INTO `ybc_order_goods` VALUES ('147', '72', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('148', '73', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('149', '74', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('150', '75', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('151', '75', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('152', '75', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('153', '76', '106', '1');
INSERT INTO `ybc_order_goods` VALUES ('154', '76', '105', '1');
INSERT INTO `ybc_order_goods` VALUES ('155', '77', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('156', '77', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('157', '78', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('158', '79', '31', '199');
INSERT INTO `ybc_order_goods` VALUES ('159', '80', '29', '10');
INSERT INTO `ybc_order_goods` VALUES ('160', '81', '68', '2');
INSERT INTO `ybc_order_goods` VALUES ('161', '82', '68', '2');
INSERT INTO `ybc_order_goods` VALUES ('162', '83', '34', '1');
INSERT INTO `ybc_order_goods` VALUES ('163', '83', '33', '1');
INSERT INTO `ybc_order_goods` VALUES ('164', '84', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('165', '85', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('166', '86', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('167', '87', '120', '1');
INSERT INTO `ybc_order_goods` VALUES ('168', '87', '117', '1');
INSERT INTO `ybc_order_goods` VALUES ('169', '88', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('170', '89', '70', '2');
INSERT INTO `ybc_order_goods` VALUES ('171', '89', '63', '1');
INSERT INTO `ybc_order_goods` VALUES ('172', '89', '34', '4');
INSERT INTO `ybc_order_goods` VALUES ('173', '89', '33', '1');
INSERT INTO `ybc_order_goods` VALUES ('174', '90', '38', '4');
INSERT INTO `ybc_order_goods` VALUES ('175', '91', '74', '1');
INSERT INTO `ybc_order_goods` VALUES ('176', '92', '129', '1');
INSERT INTO `ybc_order_goods` VALUES ('177', '93', '68', '3');
INSERT INTO `ybc_order_goods` VALUES ('178', '93', '38', '3');
INSERT INTO `ybc_order_goods` VALUES ('179', '93', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('180', '93', '29', '2');
INSERT INTO `ybc_order_goods` VALUES ('181', '94', '78', '1');
INSERT INTO `ybc_order_goods` VALUES ('182', '94', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('183', '94', '68', '2');
INSERT INTO `ybc_order_goods` VALUES ('184', '94', '29', '3');
INSERT INTO `ybc_order_goods` VALUES ('185', '95', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('186', '96', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('187', '96', '29', '2');
INSERT INTO `ybc_order_goods` VALUES ('188', '97', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('189', '98', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('190', '99', '106', '1');
INSERT INTO `ybc_order_goods` VALUES ('191', '100', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('192', '101', '68', '2');
INSERT INTO `ybc_order_goods` VALUES ('193', '102', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('194', '103', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('195', '104', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('196', '104', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('197', '105', '31', '2');
INSERT INTO `ybc_order_goods` VALUES ('198', '105', '29', '2');
INSERT INTO `ybc_order_goods` VALUES ('199', '106', '77', '2');
INSERT INTO `ybc_order_goods` VALUES ('200', '107', '42', '3');
INSERT INTO `ybc_order_goods` VALUES ('201', '107', '39', '2');
INSERT INTO `ybc_order_goods` VALUES ('202', '107', '38', '9');
INSERT INTO `ybc_order_goods` VALUES ('203', '107', '31', '1');
INSERT INTO `ybc_order_goods` VALUES ('204', '108', '38', '7');
INSERT INTO `ybc_order_goods` VALUES ('205', '108', '72', '3');
INSERT INTO `ybc_order_goods` VALUES ('206', '108', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('207', '108', '38', '7');
INSERT INTO `ybc_order_goods` VALUES ('208', '109', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('209', '109', '39', '3');
INSERT INTO `ybc_order_goods` VALUES ('210', '110', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('211', '111', '77', '2');
INSERT INTO `ybc_order_goods` VALUES ('212', '112', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('213', '113', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('214', '114', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('215', '115', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('216', '115', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('217', '116', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('218', '117', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('219', '118', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('220', '118', '29', '3');
INSERT INTO `ybc_order_goods` VALUES ('221', '119', '145', '1');
INSERT INTO `ybc_order_goods` VALUES ('222', '120', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('223', '121', '74', '99');
INSERT INTO `ybc_order_goods` VALUES ('224', '122', '115', '1');
INSERT INTO `ybc_order_goods` VALUES ('225', '122', '120', '1');
INSERT INTO `ybc_order_goods` VALUES ('226', '122', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('227', '122', '74', '1');
INSERT INTO `ybc_order_goods` VALUES ('228', '122', '73', '2');
INSERT INTO `ybc_order_goods` VALUES ('229', '122', '72', '2');
INSERT INTO `ybc_order_goods` VALUES ('230', '122', '44', '2');
INSERT INTO `ybc_order_goods` VALUES ('231', '122', '42', '2');
INSERT INTO `ybc_order_goods` VALUES ('232', '122', '38', '2');
INSERT INTO `ybc_order_goods` VALUES ('233', '123', '74', '1');
INSERT INTO `ybc_order_goods` VALUES ('234', '123', '73', '1');
INSERT INTO `ybc_order_goods` VALUES ('235', '123', '72', '1');
INSERT INTO `ybc_order_goods` VALUES ('236', '123', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('237', '123', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('238', '123', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('239', '124', '44', '3');
INSERT INTO `ybc_order_goods` VALUES ('240', '124', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('241', '124', '38', '2');
INSERT INTO `ybc_order_goods` VALUES ('242', '125', '29', '12');
INSERT INTO `ybc_order_goods` VALUES ('243', '126', '75', '10');
INSERT INTO `ybc_order_goods` VALUES ('244', '126', '37', '1');
INSERT INTO `ybc_order_goods` VALUES ('245', '126', '43', '1');
INSERT INTO `ybc_order_goods` VALUES ('246', '131', '38', '2');
INSERT INTO `ybc_order_goods` VALUES ('247', '131', '43', '6');
INSERT INTO `ybc_order_goods` VALUES ('248', '132', '38', '2');
INSERT INTO `ybc_order_goods` VALUES ('249', '132', '43', '6');
INSERT INTO `ybc_order_goods` VALUES ('250', '133', '72', '1');
INSERT INTO `ybc_order_goods` VALUES ('251', '133', '41', '1');
INSERT INTO `ybc_order_goods` VALUES ('252', '135', '29', '1');
INSERT INTO `ybc_order_goods` VALUES ('253', '135', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('254', '138', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('255', '138', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('256', '138', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('257', '155', '96', '2');
INSERT INTO `ybc_order_goods` VALUES ('258', '156', '145', '1');
INSERT INTO `ybc_order_goods` VALUES ('259', '156', '128', '2');
INSERT INTO `ybc_order_goods` VALUES ('260', '156', '143', '1');
INSERT INTO `ybc_order_goods` VALUES ('261', '156', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('262', '156', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('263', '156', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('264', '156', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('265', '158', '74', '1');
INSERT INTO `ybc_order_goods` VALUES ('266', '158', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('267', '158', '71', '1');
INSERT INTO `ybc_order_goods` VALUES ('268', '159', '58', '1');
INSERT INTO `ybc_order_goods` VALUES ('269', '159', '68', '2');
INSERT INTO `ybc_order_goods` VALUES ('270', '160', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('271', '160', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('272', '160', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('273', '161', '71', '1');
INSERT INTO `ybc_order_goods` VALUES ('274', '161', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('275', '161', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('276', '161', '39', '2');
INSERT INTO `ybc_order_goods` VALUES ('277', '162', '145', '1');
INSERT INTO `ybc_order_goods` VALUES ('278', '162', '144', '1');
INSERT INTO `ybc_order_goods` VALUES ('279', '162', '142', '1');
INSERT INTO `ybc_order_goods` VALUES ('280', '162', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('281', '162', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('282', '162', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('283', '162', '65', '1');
INSERT INTO `ybc_order_goods` VALUES ('284', '162', '63', '1');
INSERT INTO `ybc_order_goods` VALUES ('285', '163', '32', '1');
INSERT INTO `ybc_order_goods` VALUES ('286', '163', '81', '1');
INSERT INTO `ybc_order_goods` VALUES ('287', '164', '142', '2');
INSERT INTO `ybc_order_goods` VALUES ('288', '165', '142', '4');
INSERT INTO `ybc_order_goods` VALUES ('289', '166', '29', '2');
INSERT INTO `ybc_order_goods` VALUES ('290', '167', '143', '1');
INSERT INTO `ybc_order_goods` VALUES ('291', '167', '100', '1');
INSERT INTO `ybc_order_goods` VALUES ('292', '167', '70', '1');
INSERT INTO `ybc_order_goods` VALUES ('293', '168', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('294', '169', '68', '1');
INSERT INTO `ybc_order_goods` VALUES ('295', '170', '38', '2');
INSERT INTO `ybc_order_goods` VALUES ('296', '171', '70', '5');
INSERT INTO `ybc_order_goods` VALUES ('297', '172', '75', '1');
INSERT INTO `ybc_order_goods` VALUES ('298', '172', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('299', '173', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('300', '173', '39', '2');
INSERT INTO `ybc_order_goods` VALUES ('301', '173', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('302', '174', '44', '1');
INSERT INTO `ybc_order_goods` VALUES ('303', '174', '42', '1');
INSERT INTO `ybc_order_goods` VALUES ('304', '174', '39', '1');
INSERT INTO `ybc_order_goods` VALUES ('305', '175', '128', '1');
INSERT INTO `ybc_order_goods` VALUES ('306', '175', '38', '1');
INSERT INTO `ybc_order_goods` VALUES ('307', '176', '38', '1');

-- ----------------------------
-- Table structure for `ybc_order_goods_integral`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_order_goods_integral`;
CREATE TABLE `ybc_order_goods_integral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `buynum` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_order_goods_integral
-- ----------------------------
INSERT INTO `ybc_order_goods_integral` VALUES ('1', '1', '4', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('2', '2', '6', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('3', '3', '5', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('4', '4', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('12', '12', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('13', '13', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('14', '14', '4', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('25', '25', '4', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('26', '26', '34', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('27', '27', '33', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('28', '28', '5', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('29', '29', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('30', '30', '6', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('31', '31', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('32', '32', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('33', '33', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('35', '35', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('36', '36', '10', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('37', '37', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('38', '38', '4', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('39', '39', '4', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('40', '40', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('41', '41', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('42', '42', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('43', '43', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('44', '44', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('45', '45', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('46', '46', '9', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('47', '47', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('48', '48', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('49', '49', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('50', '50', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('51', '51', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('52', '52', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('53', '53', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('54', '54', '9', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('55', '55', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('56', '56', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('57', '57', '0', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('58', '58', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('59', '59', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('60', '60', '15', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('61', '61', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('62', '62', '11', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('63', '63', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('64', '64', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('65', '65', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('66', '66', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('67', '67', '3', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('68', '68', '2', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('69', '69', '6', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('70', '70', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('71', '71', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('72', '72', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('73', '73', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('74', '74', '8', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('75', '75', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('76', '76', '12', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('77', '77', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('78', '78', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('79', '79', '12', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('80', '80', '11', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('81', '81', '9', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('82', '82', '5', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('83', '83', '7', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('84', '84', '21', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('85', '85', '9', '1');
INSERT INTO `ybc_order_goods_integral` VALUES ('86', '86', '6', '1');

-- ----------------------------
-- Table structure for `ybc_order_status`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_order_status`;
CREATE TABLE `ybc_order_status` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `next` varchar(10) DEFAULT NULL,
  `mnext` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_order_status
-- ----------------------------
INSERT INTO `ybc_order_status` VALUES ('1', '待付款', '提醒付款', '去付款');
INSERT INTO `ybc_order_status` VALUES ('2', '待发货', '发货', '提醒发货');
INSERT INTO `ybc_order_status` VALUES ('3', '待收货', '提醒收货', '确认收货');
INSERT INTO `ybc_order_status` VALUES ('4', '待评价', '提醒评价', '去评价');
INSERT INTO `ybc_order_status` VALUES ('5', '交易完成', null, '返回');
INSERT INTO `ybc_order_status` VALUES ('6', '订单失效', '删除', '删除');

-- ----------------------------
-- Table structure for `ybc_order_status_integral`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_order_status_integral`;
CREATE TABLE `ybc_order_status_integral` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `next` varchar(10) NOT NULL,
  `mnext` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_order_status_integral
-- ----------------------------
INSERT INTO `ybc_order_status_integral` VALUES ('1', '待支付', '', '去支付');
INSERT INTO `ybc_order_status_integral` VALUES ('2', '待发货', '发货', '');
INSERT INTO `ybc_order_status_integral` VALUES ('3', '待收货', '', '确认收货');
INSERT INTO `ybc_order_status_integral` VALUES ('4', '确认收货', '', '');
INSERT INTO `ybc_order_status_integral` VALUES ('5', '交易完成', '', '');

-- ----------------------------
-- Table structure for `ybc_services`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_services`;
CREATE TABLE `ybc_services` (
  `id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(30) NOT NULL,
  `hid` int(30) NOT NULL,
  `type` tinyint(2) NOT NULL COMMENT '1为退货，2为换货',
  `money` float(10,2) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `reason` varchar(100) NOT NULL COMMENT '原因',
  `pic1` varchar(50) DEFAULT NULL,
  `pic2` varchar(50) DEFAULT NULL,
  `pic3` varchar(50) DEFAULT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '1（已申请），2（未通过），3（通过），4（顾客取消申请）',
  `aid` int(30) DEFAULT NULL COMMENT '处理的管理员id',
  `applytime` int(10) unsigned NOT NULL,
  `cltime` int(10) unsigned DEFAULT NULL COMMENT '处理时间',
  `remarks` varchar(300) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_services
-- ----------------------------
INSERT INTO `ybc_services` VALUES ('25', '6', '5', '1', null, 'eqeqweqweewewqweq', 'eqwewqrew', '5819c6b28bf46.jpg', '5819c6b2a6144.jpg', '5819c6b2c12e3.jpg', '2', null, '1234567891', '1478173687', 'qwrewrwe');
INSERT INTO `ybc_services` VALUES ('31', '6', '2', '2', null, '', '', null, null, null, '2', null, '1478135745', '1478173703', null);
INSERT INTO `ybc_services` VALUES ('32', '12', '22', '2', null, 's4224242435434', 's42542452424354343', null, null, null, '2', null, '1478336494', '1478336567', null);
INSERT INTO `ybc_services` VALUES ('33', '12', '23', '2', null, '222222222222222222222', '412222222222222222222', null, null, null, '2', null, '1478337956', '1478683779', '123');
INSERT INTO `ybc_services` VALUES ('34', '6', '7', '2', null, 'asdasdsssssss', 'dasdsad', null, null, null, '3', null, '1478339197', '1479374668', null);
INSERT INTO `ybc_services` VALUES ('35', '6', '8', '2', null, 'dsadsssssssss', 'dadasdsads', null, null, null, '3', null, '1478339237', '1480643698', 'dasdasd');
INSERT INTO `ybc_services` VALUES ('36', '6', '9', '2', null, 'ssssssssssssssssss', 'sssssssss', null, null, null, '4', null, '1478339273', null, 'sds a');
INSERT INTO `ybc_services` VALUES ('37', '6', '6', '2', null, 'ssssssssssssss', 'sssssssss', '581daaea17202.jpg', '581daaea40a1c.jpg', '581daaea5b7d2.jpg', '1', null, '1478339305', null, null);
INSERT INTO `ybc_services` VALUES ('38', '6', '27', '1', null, 'sadasdadadsa', 'sdadsa', null, null, null, '1', null, '1478339584', null, null);
INSERT INTO `ybc_services` VALUES ('39', '6', '26', '2', null, 'sassssssssss', 'dasdad', '581dac18edeca.jpg', '581dac1912ee8.jpg', '581dac192e086.jpg', '4', null, '1478339608', null, null);
INSERT INTO `ybc_services` VALUES ('40', '23', '112', '1', null, '1234567890', '123456', '582d4d3466277.jpg', '582d4d348567e.jpg', '582d4d34a0435.jpg', '4', null, '1479363892', null, null);
INSERT INTO `ybc_services` VALUES ('41', '23', '112', '1', null, '按时大大大大厦大大大大是大大', '的飒飒大师的', '582e74f1f05e4.jpg', '582e74f1f119c.jpg', '582e74f1f1d54.jpg', '4', null, '1479439602', null, null);
INSERT INTO `ybc_services` VALUES ('42', '6', '124', '1', null, '不想要了了不想要了了不想要了了不想要了了不想要了了不想要了了不想要了了不想要了了不想要了了', '不想要了了', '5832ba74a662c.png', '5832ba74d7b48.png', '5832ba74f212e.png', '2', null, '1479719540', '1479719642', '打算打发鬼地方');
INSERT INTO `ybc_services` VALUES ('43', '23', '127', '2', null, '包装有破损包装有破损包装有破损包装有破损包装有破损包装有破损包装有破损包装有破损包装有破损包装有破损', '包装有破损', '5833f24477f17.jpg', '5833f24562b74.jpg', '5833f245cbb3c.jpg', '1', null, '1479799363', null, null);
INSERT INTO `ybc_services` VALUES ('44', '23', '128', '1', null, '不好喝不好喝不好喝不好喝不好喝不好喝不好喝不好喝不好喝不好喝', '不好喝不好喝', '5833f3c31392a.jpg', '5833f3c3c7c24.jpg', '5833f3c46fa21.jpg', '1', null, '1479799746', null, null);
INSERT INTO `ybc_services` VALUES ('45', '23', '129', '1', null, '的撒打算打算的撒打算的撒的', '大师大师大师', null, null, null, '1', null, '1479800109', null, null);
INSERT INTO `ybc_services` VALUES ('46', '23', '113', '2', null, '规范非共和国符合法规 个梵蒂冈', '大打发第三方沙发', '5833f5c6113e2.jpg', '5833f5c6ae7a7.jpg', '5833f5c6cd7c6.jpg', '1', null, '1479800260', null, null);
INSERT INTO `ybc_services` VALUES ('47', '23', '114', '2', null, '萨达是第三方萨达是第三方萨达是第三方', '萨达是第三方', '5833f651e1fb9.jpg', '5833f6523810b.jpg', '5833f6526e05f.jpg', '1', null, '1479800401', null, null);
INSERT INTO `ybc_services` VALUES ('48', '23', '141', '2', null, '对对对对对对对对对对对对', '对对对对对对', '5833fa2a96222.jpg', null, null, '1', null, '1479801386', null, null);
INSERT INTO `ybc_services` VALUES ('49', '23', '140', '2', null, 'asgfksadhfkjasf asgfksadhfkjasf ', 'asgfksadhfkjasf ', '5833fbd6b86ea.jpg', '5833fbd6de46b.jpg', '5833fbd708a7b.jpg', '1', null, '1479801814', null, null);
INSERT INTO `ybc_services` VALUES ('50', '23', '139', '1', null, 'dadasdasdadasdasdadasdas', 'dadasdas', '5833fc96ab3e5.jpg', '5833fc96ca01c.jpg', null, '4', null, '1479802006', null, null);
INSERT INTO `ybc_services` VALUES ('51', '23', '138', '2', null, '气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温气温', '气温气温气温', '58355e98a2373.jpg', '58355e9eaccc5.jpg', null, '1', null, '1479892632', null, null);
INSERT INTO `ybc_services` VALUES ('52', '23', '159', '2', null, 'ewqwqweqweqw', 'eqweqweqw', '5840d444ba33b.png', null, null, '1', null, '1480643652', null, null);

-- ----------------------------
-- Table structure for `ybc_sign`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_sign`;
CREATE TABLE `ybc_sign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL COMMENT '用户ID',
  `lasttime` int(11) DEFAULT NULL,
  `thistime` int(11) DEFAULT NULL,
  `mouth` smallint(3) DEFAULT NULL COMMENT '本月连续签到的次数',
  `total` smallint(5) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL COMMENT '签到的每天',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_sign
-- ----------------------------
INSERT INTO `ybc_sign` VALUES ('1', '6', '20161201', '20161202', '2', '38', '01,02,');
INSERT INTO `ybc_sign` VALUES ('3', '17', '20161117', '20161118', '6', '4', '15,16,17,18,');
INSERT INTO `ybc_sign` VALUES ('4', '16', '20161116', '20161201', '1', '2', '01,');
INSERT INTO `ybc_sign` VALUES ('5', '19', '20161116', '20161118', '1', '2', '16,18,');
INSERT INTO `ybc_sign` VALUES ('6', '22', '20161125', '20161201', '1', '5', '01,');
INSERT INTO `ybc_sign` VALUES ('7', '2', '20161117', '20161118', '3', '3', '16,17,18,');
INSERT INTO `ybc_sign` VALUES ('8', '11', '20161119', '20161201', '1', '5', '01,');
INSERT INTO `ybc_sign` VALUES ('9', '15', '20161116', '20161116', '1', '1', '16,');
INSERT INTO `ybc_sign` VALUES ('10', '23', '20161117', '20161117', '1', '1', '17,');
INSERT INTO `ybc_sign` VALUES ('11', '12', '20161118', '20161118', '1', '1', '18,');
INSERT INTO `ybc_sign` VALUES ('12', '25', '20161121', '20161121', '1', '1', '21,');
INSERT INTO `ybc_sign` VALUES ('13', '8', '20161125', '20161201', '1', '2', '01,');
INSERT INTO `ybc_sign` VALUES ('14', '30', '20161125', '20161125', '1', '1', '25,');
INSERT INTO `ybc_sign` VALUES ('15', '29', '20161129', '20161201', '1', '2', '01,');

-- ----------------------------
-- Table structure for `ybc_signreward`
-- ----------------------------
DROP TABLE IF EXISTS `ybc_signreward`;
CREATE TABLE `ybc_signreward` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) NOT NULL,
  `signtime` int(11) NOT NULL,
  `reward` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ybc_signreward
-- ----------------------------
INSERT INTO `ybc_signreward` VALUES ('6', '6', '1479268745', '10');
INSERT INTO `ybc_signreward` VALUES ('9', '16', '1479268755', '10');
INSERT INTO `ybc_signreward` VALUES ('10', '19', '1479268760', '10');
INSERT INTO `ybc_signreward` VALUES ('11', '17', '1479270690', '10');
INSERT INTO `ybc_signreward` VALUES ('12', '22', '1479276143', '10');
INSERT INTO `ybc_signreward` VALUES ('13', '2', '1479281332', '10');
INSERT INTO `ybc_signreward` VALUES ('14', '11', '1479297306', '10');
INSERT INTO `ybc_signreward` VALUES ('15', '15', '1479297499', '10');
INSERT INTO `ybc_signreward` VALUES ('16', '6', '1479343797', '10');
INSERT INTO `ybc_signreward` VALUES ('17', '6', '1479081600', '10');
INSERT INTO `ybc_signreward` VALUES ('18', '6', '1479168000', '10');
INSERT INTO `ybc_signreward` VALUES ('19', '2', '1479344321', '10');
INSERT INTO `ybc_signreward` VALUES ('20', '11', '1479348041', '10');
INSERT INTO `ybc_signreward` VALUES ('21', '17', '1479348069', '10');
INSERT INTO `ybc_signreward` VALUES ('22', '23', '1479368229', '10');
INSERT INTO `ybc_signreward` VALUES ('23', '6', '1479431081', '10');
INSERT INTO `ybc_signreward` VALUES ('24', '12', '1479434720', '10');
INSERT INTO `ybc_signreward` VALUES ('25', '17', '1479434455', '10');
INSERT INTO `ybc_signreward` VALUES ('26', '2', '1479435749', '10');
INSERT INTO `ybc_signreward` VALUES ('27', '19', '1479461355', '10');
INSERT INTO `ybc_signreward` VALUES ('28', '11', '1479469242', '10');
INSERT INTO `ybc_signreward` VALUES ('29', '22', '1479516207', '10');
INSERT INTO `ybc_signreward` VALUES ('30', '11', '1479516262', '10');
INSERT INTO `ybc_signreward` VALUES ('31', '6', '1479516297', '10');
INSERT INTO `ybc_signreward` VALUES ('32', '6', '1479688648', '10');
INSERT INTO `ybc_signreward` VALUES ('33', '22', '1479722672', '10');
INSERT INTO `ybc_signreward` VALUES ('34', '25', '1479725771', '10');
INSERT INTO `ybc_signreward` VALUES ('35', '6', '1479774211', '10');
INSERT INTO `ybc_signreward` VALUES ('36', '6', '1479883161', '10');
INSERT INTO `ybc_signreward` VALUES ('37', '6', '1479968006', '10');
INSERT INTO `ybc_signreward` VALUES ('38', '6', '1480034829', '10');
INSERT INTO `ybc_signreward` VALUES ('39', '22', '1480056533', '10');
INSERT INTO `ybc_signreward` VALUES ('40', '8', '1480057112', '10');
INSERT INTO `ybc_signreward` VALUES ('41', '30', '1480058098', '10');
INSERT INTO `ybc_signreward` VALUES ('42', '6', '1480293913', '10');
INSERT INTO `ybc_signreward` VALUES ('43', '6', '1480389614', '10');
INSERT INTO `ybc_signreward` VALUES ('44', '29', '1480400637', '10');
INSERT INTO `ybc_signreward` VALUES ('47', '16', '1480569782', '10');
INSERT INTO `ybc_signreward` VALUES ('48', '6', '1480570117', '10');
INSERT INTO `ybc_signreward` VALUES ('49', '22', '1480570790', '10');
INSERT INTO `ybc_signreward` VALUES ('50', '11', '1480570117', '10');
INSERT INTO `ybc_signreward` VALUES ('51', '29', '1480576020', '10');
INSERT INTO `ybc_signreward` VALUES ('52', '8', '1480576759', '10');
INSERT INTO `ybc_signreward` VALUES ('53', '6', '1480646796', '10');
