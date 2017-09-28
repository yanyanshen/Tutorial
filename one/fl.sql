/*
Navicat MySQL Data Transfer

Source Server         : 172.16.11.90_3306
Source Server Version : 50521
Source Host           : 172.16.11.90:3306
Source Database       : fl

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-07-29 10:04:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `fl_admin`;
CREATE TABLE `fl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `admin_go` smallint(5) unsigned NOT NULL DEFAULT '0',
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `login_lasttime` int(11) DEFAULT NULL,
  `login_lastip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_admin
-- ----------------------------
INSERT INTO `fl_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '1469755173', '172.16.11.106', '1469690340', '127.0.0.1');
INSERT INTO `fl_admin` VALUES ('24', 'ldj', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '1469493370', '172.16.11.106', null, null);
INSERT INTO `fl_admin` VALUES ('25', '456', '250cf8b51c773f3f8dc8b4be867a9a02', '0', '0', null, null, null, null);
INSERT INTO `fl_admin` VALUES ('33', '789', '68053af2923e00204c3ca7c6a3150cf7', '1469082925', '0', null, null, null, null);
INSERT INTO `fl_admin` VALUES ('34', '123123', '4297f44b13955235245b2497399d7a93', '1469082941', '1', null, null, null, null);
INSERT INTO `fl_admin` VALUES ('35', '456456', 'b51e8dbebd4ba8a8f342190a4b9f08d7', '1469082950', '0', null, null, null, null);
INSERT INTO `fl_admin` VALUES ('36', '789456', '71b3b26aaa319e0cdf6fdb8429c112b0', '1469177239', '0', null, null, null, null);

-- ----------------------------
-- Table structure for `fl_advertise`
-- ----------------------------
DROP TABLE IF EXISTS `fl_advertise`;
CREATE TABLE `fl_advertise` (
  `ad_aid` smallint(6) NOT NULL AUTO_INCREMENT,
  `ad_pos_id` smallint(2) NOT NULL,
  `ad_pos_name` varchar(20) NOT NULL,
  `ad_pic` varchar(60) NOT NULL,
  `ad_url` varchar(60) NOT NULL,
  `ad_type` smallint(6) NOT NULL,
  `ad_isshow` smallint(1) NOT NULL DEFAULT '1',
  `ad_createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_aid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_advertise
-- ----------------------------
INSERT INTO `fl_advertise` VALUES ('1', '6', '顶层位置1', '57884f74cbaae.png', '21', '1', '1', '1469581664');
INSERT INTO `fl_advertise` VALUES ('2', '7', '顶层位置2', '57884fbf3cb2d.png', '29', '1', '1', '1469581718');
INSERT INTO `fl_advertise` VALUES ('3', '8', '顶层位置3', '57884fcd3c469.png', '28', '1', '1', '1469581731');
INSERT INTO `fl_advertise` VALUES ('4', '9', '顶层位置4', '57884fd8a54d8.png', '7', '1', '1', '1469581797');
INSERT INTO `fl_advertise` VALUES ('5', '10', '顶层位置5', '57884fe1e9c31.png', '26', '1', '1', '1469581825');
INSERT INTO `fl_advertise` VALUES ('6', '1', '轮播图1', '57885f8591e3e.png', '1', '0', '1', '1469580849');
INSERT INTO `fl_advertise` VALUES ('7', '2', '轮播图2', '57885f9b666fa.png', '9', '0', '1', '1469580870');
INSERT INTO `fl_advertise` VALUES ('8', '3', '轮播图3', '57885fdb13906.png', '23', '0', '1', '1469580903');
INSERT INTO `fl_advertise` VALUES ('9', '4', '轮播图4', '57885fef4a445.png', '33', '0', '1', '1469580918');
INSERT INTO `fl_advertise` VALUES ('10', '5', '轮播图5', '57886002a6c2d.png', '43', '0', '1', '1469580941');
INSERT INTO `fl_advertise` VALUES ('12', '10', '顶层位置5', '5789d6a8d5e11.png', '23', '1', '1', '1469581841');

-- ----------------------------
-- Table structure for `fl_brand`
-- ----------------------------
DROP TABLE IF EXISTS `fl_brand`;
CREATE TABLE `fl_brand` (
  `brand_bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(40) NOT NULL,
  `brand_pic` varchar(60) DEFAULT NULL,
  `brand_createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_bid`,`brand_createtime`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_brand
-- ----------------------------
INSERT INTO `fl_brand` VALUES ('1', '乐事', './Uploads/Brand/57843de90547b.gif', '1468415600');
INSERT INTO `fl_brand` VALUES ('2', '好想你', './Uploads/Brand/57844e9f917ba.gif', '1468415914');
INSERT INTO `fl_brand` VALUES ('3', '良品铺子', './Uploads/Brand/578599cb00ac8.jpg', '1468416362');
INSERT INTO `fl_brand` VALUES ('4', '三只松鼠', './Uploads/Brand/57859b3ad6a03.jpg', '1468416828');
INSERT INTO `fl_brand` VALUES ('5', '百草味', './Uploads/Brand/57859b9216367.jpg', '1468417210');
INSERT INTO `fl_brand` VALUES ('7', '楼兰蜜语', './Uploads/Brand/5785a1300839d.jpg', '1468418086');
INSERT INTO `fl_brand` VALUES ('8', '新农哥', './Uploads/Brand/5785a149036a9.jpg', '1468458800');
INSERT INTO `fl_brand` VALUES ('9', '味正品', './Uploads/Brand/5785a1601cd1c.jpeg', '1468459161');
INSERT INTO `fl_brand` VALUES ('10', '西域美农', './Uploads/Brand/57889ef03d9d8.jpg', '1468571376');
INSERT INTO `fl_brand` VALUES ('11', '如水', './Uploads/Brand/5785a194c3e2a.jpg', '1468460338');
INSERT INTO `fl_brand` VALUES ('12', '秋滋叶', './Uploads/Brand/5785a1a7ae69f.jpg', '1468460863');
INSERT INTO `fl_brand` VALUES ('13', '棒棒娃', './Uploads/Brand/5785a1d64ce63.jpeg', '1468461285');
INSERT INTO `fl_brand` VALUES ('14', '口水娃', './Uploads/Brand/5785a1e16f2c0.jpg', '1468462083');
INSERT INTO `fl_brand` VALUES ('15', '一品玉', './Uploads/Brand/5785a1ed26b4d.jpeg', '1468463256');
INSERT INTO `fl_brand` VALUES ('16', '绝味', './Uploads/Brand/5785a2012e49d.jpg', '1468464274');
INSERT INTO `fl_brand` VALUES ('17', '聚食汇', './Uploads/Brand/5785a237f092b.jpeg', '1468465014');
INSERT INTO `fl_brand` VALUES ('18', '桂格（QUAKER）', './Uploads/Brand/5785a38315fbc.jpeg', '1468465383');
INSERT INTO `fl_brand` VALUES ('19', '麦斯威尔（MAXWELL）', './Uploads/Brand/5785a3c837371.jpg', '1468465809');
INSERT INTO `fl_brand` VALUES ('20', '铭氏（MING\'S）', './Uploads/Brand/5785a40439100.jpeg', '1468466070');
INSERT INTO `fl_brand` VALUES ('21', '吉意欧', './Uploads/Brand/5785a53cbb89b.jpeg', '1468466772');
INSERT INTO `fl_brand` VALUES ('22', '张君雅', './Uploads/Brand/5785a5da91f66.jpg', '1468468002');
INSERT INTO `fl_brand` VALUES ('23', '汤姆农场', '', '1468468316');
INSERT INTO `fl_brand` VALUES ('24', '东园（TONG GARDEN）', '', '1468468651');
INSERT INTO `fl_brand` VALUES ('26', '全聚德', './Uploads/Brand/5785d11ac3dd4.jpg', '1468471666');
INSERT INTO `fl_brand` VALUES ('27', 'KNOPPERS', '', '1468472258');
INSERT INTO `fl_brand` VALUES ('28', '非凡农庄（PEPPERIDGE FARM）', './Uploads/Brand/5786338f38b82.jpg', '1468472623');
INSERT INTO `fl_brand` VALUES ('29', '好丽友', './Uploads/Brand/5786395a6d0a2.jpg', '1468473091');
INSERT INTO `fl_brand` VALUES ('30', '茱蒂丝（Julie\'s）', './Uploads/Brand/57863ed4ca26a.jpg', '1468476775');
INSERT INTO `fl_brand` VALUES ('31', '白色恋人', './Uploads/Brand/5786412077325.jpg', '1468477401');
INSERT INTO `fl_brand` VALUES ('32', '费列罗（FERRERO）', './Uploads/Brand/578646afbce27.jpg', '1468477712');
INSERT INTO `fl_brand` VALUES ('33', '小老板', './Uploads/Brand/5786eefc15ee0.JPG', '1468480831');
INSERT INTO `fl_brand` VALUES ('34', '来伊份', './Uploads/Brand/5786f08609004.jpg', '1468481236');
INSERT INTO `fl_brand` VALUES ('35', '啪啪通（papatonk）', './Uploads/Brand/5786f24456be2.jpg', '1468481468');
INSERT INTO `fl_brand` VALUES ('36', '雀巢', './Uploads/Brand/5786f841b1577.jpg', '1468482239');
INSERT INTO `fl_brand` VALUES ('37', '立顿', './Uploads/Brand/5786f9a910bb5.jpg', '1468482300');
INSERT INTO `fl_brand` VALUES ('38', '香飘飘', './Uploads/Brand/5786ff19ce32d.jpg', '1468482400');
INSERT INTO `fl_brand` VALUES ('39', '永和', './Uploads/Brand/5787002169298.jpg', '1468482768');
INSERT INTO `fl_brand` VALUES ('40', '家乐氏/Kellogg\'s', './Uploads/Brand/5787019423cef.jpg', '1468482985');
INSERT INTO `fl_brand` VALUES ('41', '高乐高', './Uploads/Brand/578705604999e.jpg', '1468483145');
INSERT INTO `fl_brand` VALUES ('42', '蓝钻石/BlueDiamond', './Uploads/Brand/57870870e065f.jpg', '1468483555');
INSERT INTO `fl_brand` VALUES ('43', '洽洽', './Uploads/Brand/578718af7e646.jpg', '1468483864');
INSERT INTO `fl_brand` VALUES ('44', '科尔沁', './Uploads/Brand/57872b72a0d91.jpg', '1468483981');
INSERT INTO `fl_brand` VALUES ('45', '蜀道香', './Uploads/Brand/57872cb070372.jpg', '1468484046');
INSERT INTO `fl_brand` VALUES ('46', '草原今朝', null, '1468484298');
INSERT INTO `fl_brand` VALUES ('47', '邮丹', './Uploads/Brand/57873db4bb684.jpg', '1468484437');
INSERT INTO `fl_brand` VALUES ('48', '莫龙', null, '1468484676');
INSERT INTO `fl_brand` VALUES ('49', '煌上煌', './Uploads/Brand/57889e9f56141.jpg', '1468571306');
INSERT INTO `fl_brand` VALUES ('52', '姚太太', './Uploads/Brand/57988251e8d3a.jpg', '1469612625');
INSERT INTO `fl_brand` VALUES ('53', '盼盼', './Uploads/Brand/5798823eb3bb2.jpeg', '1469612606');

-- ----------------------------
-- Table structure for `fl_class`
-- ----------------------------
DROP TABLE IF EXISTS `fl_class`;
CREATE TABLE `fl_class` (
  `class_cid` int(6) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(40) NOT NULL,
  `class_pid` smallint(6) NOT NULL,
  `class_path` varchar(40) DEFAULT NULL,
  `class_createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`class_cid`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_class
-- ----------------------------
INSERT INTO `fl_class` VALUES ('1', '进口食品', '0', '1', '1468287211');
INSERT INTO `fl_class` VALUES ('2', '饼干', '1', '1,2', '1468287396');
INSERT INTO `fl_class` VALUES ('3', '巧克力', '1', '1,3', '1468287515');
INSERT INTO `fl_class` VALUES ('4', '咖啡', '1', '1,4', '1468287698');
INSERT INTO `fl_class` VALUES ('5', '休闲食品', '0', '5', '1468287872');
INSERT INTO `fl_class` VALUES ('6', '薯片', '5', '5,6', '1468287989');
INSERT INTO `fl_class` VALUES ('7', '肉脯', '5', '5,7', '1468288123');
INSERT INTO `fl_class` VALUES ('8', '地方特产', '0', '8', '1468288364');
INSERT INTO `fl_class` VALUES ('9', '红枣', '8', '8,9', '1468288475');
INSERT INTO `fl_class` VALUES ('10', '核桃', '8', '8,10', '1468288563');
INSERT INTO `fl_class` VALUES ('11', '茶饮冲调', '0', '11', '1468288689');
INSERT INTO `fl_class` VALUES ('12', '咖啡', '11', '11,12', '1468288752');
INSERT INTO `fl_class` VALUES ('14', '坚果蜜饯', '0', '14', '1468288933');
INSERT INTO `fl_class` VALUES ('15', '话梅', '14', '14,15', '1468289172');
INSERT INTO `fl_class` VALUES ('16', '杏仁', '14', '14,16', '1468289351');
INSERT INTO `fl_class` VALUES ('17', '牛奶巧克力', '3', '1,3,17', '1468289674');
INSERT INTO `fl_class` VALUES ('18', '果仁巧克力', '3', '1,3,18', '1468289772');
INSERT INTO `fl_class` VALUES ('19', '黑巧克力', '3', '1,3,19', '1468291813');
INSERT INTO `fl_class` VALUES ('20', '白巧克力', '3', '1,3,20', '1468292052');
INSERT INTO `fl_class` VALUES ('21', '饼干巧克力', '3', '1,3,21', '1468292367');
INSERT INTO `fl_class` VALUES ('22', '夹心巧克力', '3', '1,3,22', '1468292893');
INSERT INTO `fl_class` VALUES ('23', '松露巧克力', '3', '1,3,23', '1468293058');
INSERT INTO `fl_class` VALUES ('24', '酒心巧克力', '3', '1,3,24', '1468293327');
INSERT INTO `fl_class` VALUES ('25', '威化', '2', '1,2,25', '1468293856');
INSERT INTO `fl_class` VALUES ('26', '蛋卷', '2', '1,2,26', '1468293933');
INSERT INTO `fl_class` VALUES ('28', '华夫饼', '2', '1,2,28', '1468294556');
INSERT INTO `fl_class` VALUES ('29', '麻薯', '2', '1,2,29', '1468294923');
INSERT INTO `fl_class` VALUES ('30', '面包干', '2', '1,2,30', '1468295923');
INSERT INTO `fl_class` VALUES ('31', '速溶咖啡', '4', '1,4,31', '1468301827');
INSERT INTO `fl_class` VALUES ('32', '咖啡豆', '4', '1,4,32', '1468301984');
INSERT INTO `fl_class` VALUES ('33', '咖啡伴侣', '4', '1,4,33', '1468302105');
INSERT INTO `fl_class` VALUES ('34', '咖啡周边', '4', '1,4,34', '1468302345');
INSERT INTO `fl_class` VALUES ('35', '奶酪', '1', '1,35', '1468302487');
INSERT INTO `fl_class` VALUES ('36', '原味', '35', '1,35,36', '1468302563');
INSERT INTO `fl_class` VALUES ('37', '咸味', '35', '1,35,37', '1468302871');
INSERT INTO `fl_class` VALUES ('38', '甜味', '35', '1,35,38', '1468304896');
INSERT INTO `fl_class` VALUES ('39', '果味', '35', '1,35,39', '1468305029');
INSERT INTO `fl_class` VALUES ('40', '果冻/布丁', '1', '1,40', '1468305137');
INSERT INTO `fl_class` VALUES ('41', '原味', '40', '1,40,41', '1468305564');
INSERT INTO `fl_class` VALUES ('42', '甜味', '40', '1,40,42', '1468308965');
INSERT INTO `fl_class` VALUES ('43', '果味', '40', '1,40,43', '1468310389');
INSERT INTO `fl_class` VALUES ('44', '混合口味', '40', '1,40,44', '1468310567');
INSERT INTO `fl_class` VALUES ('45', '蜂蜜', '1', '1,45', '1468310882');
INSERT INTO `fl_class` VALUES ('46', '营养奶粉', '1', '1,46', '1468311126');
INSERT INTO `fl_class` VALUES ('47', '冲饮谷物', '1', '1,47', '1468311317');
INSERT INTO `fl_class` VALUES ('48', '其他', '45', '1,45,48', '1468311686');
INSERT INTO `fl_class` VALUES ('49', '其他', '46', '1,46,49', '1468311782');
INSERT INTO `fl_class` VALUES ('50', '纯燕麦', '47', '1,47,50', '1468312038');
INSERT INTO `fl_class` VALUES ('51', '果蔬燕麦', '47', '1,47,51', '1468312199');
INSERT INTO `fl_class` VALUES ('52', '玉米片', '47', '1,47,52', '1468321120');
INSERT INTO `fl_class` VALUES ('53', '燕麦能量棒', '47', '1,47,53', '1468321224');
INSERT INTO `fl_class` VALUES ('54', '燕麦主食', '47', '1,47,54', '1468321386');
INSERT INTO `fl_class` VALUES ('55', '蜂蜜', '11', '11,55', '1468321437');
INSERT INTO `fl_class` VALUES ('56', '冲饮谷物', '11', '11,56', '1468321563');
INSERT INTO `fl_class` VALUES ('57', '成人奶粉', '11', '11,57', '1468321892');
INSERT INTO `fl_class` VALUES ('58', '饮料', '11', '11,58', '1468322387');
INSERT INTO `fl_class` VALUES ('59', '奶茶', '11', '11,59', '1468326189');
INSERT INTO `fl_class` VALUES ('60', '速溶咖啡', '12', '11,12,60', '1468326263');
INSERT INTO `fl_class` VALUES ('61', '咖啡豆', '12', '11,12,61', '1468326354');
INSERT INTO `fl_class` VALUES ('62', '咖啡伴侣', '12', '11,12,62', '1468326518');
INSERT INTO `fl_class` VALUES ('63', '柚子茶', '55', '11,55,63', '1468326725');
INSERT INTO `fl_class` VALUES ('64', '红枣茶', '55', '11,55,64', '1468326934');
INSERT INTO `fl_class` VALUES ('65', '柠檬茶', '55', '11,55,65', '1468327083');
INSERT INTO `fl_class` VALUES ('66', '木瓜茶', '55', '11,55,66', '1468327255');
INSERT INTO `fl_class` VALUES ('67', '芦荟茶', '55', '11,55,67', '1468327363');
INSERT INTO `fl_class` VALUES ('68', '生姜茶', '55', '11,55,68', '1468327442');
INSERT INTO `fl_class` VALUES ('69', '芝麻糊', '56', '11,56,69', '1468327513');
INSERT INTO `fl_class` VALUES ('70', '核桃粉', '56', '11,56,70', '1468327586');
INSERT INTO `fl_class` VALUES ('71', '豆奶粉', '56', '11,56,71', '1468327641');
INSERT INTO `fl_class` VALUES ('72', '杏仁粉', '56', '11,56,72', '1468327726');
INSERT INTO `fl_class` VALUES ('73', '藕粉', '56', '11,56,73', '1468327818');
INSERT INTO `fl_class` VALUES ('74', '木瓜粉', '56', '11,56,74', '1468327921');
INSERT INTO `fl_class` VALUES ('75', '高钙', '57', '11,57,75', '1468328024');
INSERT INTO `fl_class` VALUES ('76', '高锌', '57', '11,57,76', '1468328103');
INSERT INTO `fl_class` VALUES ('77', '高铁', '57', '11,57,77', '1468328173');
INSERT INTO `fl_class` VALUES ('78', '高蛋白', '57', '11,57,78', '1468328245');
INSERT INTO `fl_class` VALUES ('79', '添加维生素', '57', '11,57,79', '1468328296');
INSERT INTO `fl_class` VALUES ('80', '其他', '57', '11,57,80', '1468328353');
INSERT INTO `fl_class` VALUES ('81', '可乐', '58', '11,58,81', '1468328419');
INSERT INTO `fl_class` VALUES ('82', '雪碧', '58', '11,58,82', '1468328485');
INSERT INTO `fl_class` VALUES ('83', '苏打水', '58', '11,58,83', '1468328526');
INSERT INTO `fl_class` VALUES ('84', '盐汽水', '58', '11,58,84', '1468328717');
INSERT INTO `fl_class` VALUES ('85', '果味', '58', '11,58,85', '1468328765');
INSERT INTO `fl_class` VALUES ('86', '开心果', '14', '14,86', '1468328813');
INSERT INTO `fl_class` VALUES ('87', '松子', '14', '14,87', '1468328885');
INSERT INTO `fl_class` VALUES ('88', '腰果', '14', '14,88', '1468328939');
INSERT INTO `fl_class` VALUES ('89', '夏威夷果', '14', '14,89', '1468329013');
INSERT INTO `fl_class` VALUES ('90', '碧根果', '14', '14,90', '1468329086');
INSERT INTO `fl_class` VALUES ('91', '榛子', '14', '14,91', '1468329151');
INSERT INTO `fl_class` VALUES ('92', '山楂', '14', '14,92', '1468329273');
INSERT INTO `fl_class` VALUES ('93', '蔬果干', '14', '14,93', '1468329312');
INSERT INTO `fl_class` VALUES ('94', '酸梅', '14', '14,94', '1468329409');
INSERT INTO `fl_class` VALUES ('95', '情人梅', '14', '14,95', '1468329467');
INSERT INTO `fl_class` VALUES ('96', '虾条/虾片', '5', '5,96', '1468329512');
INSERT INTO `fl_class` VALUES ('97', '锅巴', '5', '5,97', '1468329588');
INSERT INTO `fl_class` VALUES ('98', '爆米花', '5', '5,98', '1468329623');
INSERT INTO `fl_class` VALUES ('99', '米果卷', '5', '5,99', '1468329685');
INSERT INTO `fl_class` VALUES ('100', '雪米饼', '5', '5,100', '1468329734');
INSERT INTO `fl_class` VALUES ('101', '海苔', '5', '5,101', '1468329779');
INSERT INTO `fl_class` VALUES ('102', '烤馍', '5', '5,102', '1468329829');
INSERT INTO `fl_class` VALUES ('103', '小馒头', '5', '5,103', '1468329917');
INSERT INTO `fl_class` VALUES ('104', '原味', '100', '5,100,104', '1468329986');
INSERT INTO `fl_class` VALUES ('105', '香辣味', '100', '5,100,105', '1468330045');
INSERT INTO `fl_class` VALUES ('106', '咸味', '100', '5,100,106', '1468330124');
INSERT INTO `fl_class` VALUES ('107', '甜味', '100', '5,100,107', '1468330172');
INSERT INTO `fl_class` VALUES ('108', '其他', '100', '5,100,108', '1468330253');
INSERT INTO `fl_class` VALUES ('109', '原味', '101', '5,101,109', '1468330489');
INSERT INTO `fl_class` VALUES ('110', '咸味', '101', '5,101,110', '1468330535');
INSERT INTO `fl_class` VALUES ('111', '原味', '102', '5,102,111', '1468330648');
INSERT INTO `fl_class` VALUES ('112', '咸味', '102', '5,102,112', '1468330697');
INSERT INTO `fl_class` VALUES ('113', '香辣味', '102', '5,102,113', '1468330725');
INSERT INTO `fl_class` VALUES ('114', '原味', '103', '5,103,114', '1468330778');
INSERT INTO `fl_class` VALUES ('115', '原味', '6', '5,6,115', '1468330823');
INSERT INTO `fl_class` VALUES ('116', '香辣味', '6', '5,6,116', '1468330886');
INSERT INTO `fl_class` VALUES ('117', '混合口味', '6', '5,6,117', '1468330927');
INSERT INTO `fl_class` VALUES ('118', '烧烤口味', '6', '5,6,118', '1468330986');
INSERT INTO `fl_class` VALUES ('119', '牛肉粒', '7', '5,7,119', '1468331023');
INSERT INTO `fl_class` VALUES ('120', '牛肉干', '7', '5,7,120', '1468331068');
INSERT INTO `fl_class` VALUES ('121', '牛肉丝', '7', '5,7,121', '1468331192');
INSERT INTO `fl_class` VALUES ('122', '牛板筋', '7', '5,7,122', '1468331235');
INSERT INTO `fl_class` VALUES ('123', '猪肉松', '7', '5,7,123', '1468331287');
INSERT INTO `fl_class` VALUES ('124', '猪蹄', '7', '5,7,124', '1468331353');
INSERT INTO `fl_class` VALUES ('125', '肘子', '7', '5,7,125', '1468331445');
INSERT INTO `fl_class` VALUES ('126', '凤爪', '7', '5,7,126', '1468375289');
INSERT INTO `fl_class` VALUES ('127', '鱼干', '7', '5,7,127', '1468375336');
INSERT INTO `fl_class` VALUES ('128', '原味', '96', '5,96,128', '1468375409');
INSERT INTO `fl_class` VALUES ('129', '香辣味', '96', '5,96,129', '1468375458');
INSERT INTO `fl_class` VALUES ('130', '原味', '97', '5,97,130', '1468375529');
INSERT INTO `fl_class` VALUES ('131', '香辣味', '97', '5,97,131', '1468375590');
INSERT INTO `fl_class` VALUES ('132', '麻辣味', '97', '5,97,132', '1468375648');
INSERT INTO `fl_class` VALUES ('133', '烧烤味', '97', '5,97,133', '1468375725');
INSERT INTO `fl_class` VALUES ('134', '原味', '98', '5,98,134', '1468375812');
INSERT INTO `fl_class` VALUES ('135', '奶油味', '98', '5,98,135', '1468375865');
INSERT INTO `fl_class` VALUES ('136', '原味', '99', '5,99,136', '1468375903');
INSERT INTO `fl_class` VALUES ('137', '甜味', '99', '5,99,137', '1468376013');
INSERT INTO `fl_class` VALUES ('138', '海苔味', '98', '5,98,138', '1468376078');
INSERT INTO `fl_class` VALUES ('139', '牛肉干', '8', '8,139', '1468376152');
INSERT INTO `fl_class` VALUES ('142', '酱鸭', '8', '8,142', '1468376198');
INSERT INTO `fl_class` VALUES ('143', '猪肉脯', '8', '8,143', '1468376221');
INSERT INTO `fl_class` VALUES ('144', '鱼干鱼排', '8', '8,144', '1468376364');
INSERT INTO `fl_class` VALUES ('145', '烧鸡/凤爪', '8', '8,145', '1468376482');
INSERT INTO `fl_class` VALUES ('146', '海鲜', '8', '8,146', '1468376529');
INSERT INTO `fl_class` VALUES ('147', '咸蛋/卤蛋', '8', '8,147', '1468376635');
INSERT INTO `fl_class` VALUES ('148', '原味', '10', '8,10,148', '1468376688');
INSERT INTO `fl_class` VALUES ('149', '奶油味', '10', '8,10,149', '1468376709');
INSERT INTO `fl_class` VALUES ('150', '原味', '139', '8,139,150', '1468376753');
INSERT INTO `fl_class` VALUES ('151', '香辣味', '139', '8,139,151', '1468376828');
INSERT INTO `fl_class` VALUES ('152', '麻辣味', '139', '8,139,152', '1468376906');
INSERT INTO `fl_class` VALUES ('153', '五香味', '139', '8,139,153', '1468376984');
INSERT INTO `fl_class` VALUES ('154', '原味', '142', '8,142,154', '1468377023');
INSERT INTO `fl_class` VALUES ('155', '香辣味', '142', '8,142,155', '1468377265');
INSERT INTO `fl_class` VALUES ('156', '麻辣味', '142', '8,142,156', '1468377483');
INSERT INTO `fl_class` VALUES ('157', '原味', '143', '8,143,157', '1468377529');
INSERT INTO `fl_class` VALUES ('158', '香辣味', '143', '8,143,158', '1468377616');
INSERT INTO `fl_class` VALUES ('159', '麻辣味', '143', '8,143,159', '1468377687');
INSERT INTO `fl_class` VALUES ('160', '原味', '144', '8,144,160', '1468377724');
INSERT INTO `fl_class` VALUES ('161', '香辣味', '144', '8,144,161', '1468377783');
INSERT INTO `fl_class` VALUES ('162', '麻辣味', '144', '8,144,162', '1468377829');
INSERT INTO `fl_class` VALUES ('163', '原味', '145', '8,145,163', '1468377906');
INSERT INTO `fl_class` VALUES ('164', '麻辣味', '145', '8,145,164', '1468378016');
INSERT INTO `fl_class` VALUES ('165', '原味', '146', '8,146,165', '1468378083');
INSERT INTO `fl_class` VALUES ('166', '麻辣味', '146', '8,146,166', '1468378149');
INSERT INTO `fl_class` VALUES ('167', '原味', '147', '8,147,167', '1468378236');
INSERT INTO `fl_class` VALUES ('168', '五香味', '147', '8,147,168', '1468378317');
INSERT INTO `fl_class` VALUES ('169', '和田枣', '9', '8,9,169', '1468378483');
INSERT INTO `fl_class` VALUES ('170', '灰枣', '9', '8,9,170', '1468378629');
INSERT INTO `fl_class` VALUES ('171', '其他', '9', '8,9,171', '1468378681');
INSERT INTO `fl_class` VALUES ('172', '巴旦木', '14', '14,172', '1468378722');
INSERT INTO `fl_class` VALUES ('173', '坚果', '1', '1,173', '1468378783');
INSERT INTO `fl_class` VALUES ('174', '扁桃仁', '173', '1,173,174', '1468378819');
INSERT INTO `fl_class` VALUES ('175', '什锦果仁', '173', '1,173,175', '1468378920');
INSERT INTO `fl_class` VALUES ('176', '曲奇', '2', '1,2,176', '1468378023');
INSERT INTO `fl_class` VALUES ('177', '夹心', '2', '1,2,177', '1468379187');
INSERT INTO `fl_class` VALUES ('178', '猪肉脯', '7', '5,7,178', '1468379258');
INSERT INTO `fl_class` VALUES ('179', '袋泡茶', '11', '11,179', '1468379356');
INSERT INTO `fl_class` VALUES ('180', '绿茶', '179', '11,179,180', '1468379418');
INSERT INTO `fl_class` VALUES ('181', '红茶', '179', '11,179,181', '1468379475');
INSERT INTO `fl_class` VALUES ('182', '原味', '59', '11,59,182', '1468379526');
INSERT INTO `fl_class` VALUES ('183', '巧克力味', '59', '11,59,183', '1468379759');
INSERT INTO `fl_class` VALUES ('184', '香芋味', '59', '11,59,184', '1468379812');
INSERT INTO `fl_class` VALUES ('185', '咖啡味', '59', '11,59,185', '1468379869');
INSERT INTO `fl_class` VALUES ('186', '混合口味', '59', '11,59,186', '1468379954');
INSERT INTO `fl_class` VALUES ('187', '麦片', '56', '11,56,187', '1468380179');
INSERT INTO `fl_class` VALUES ('188', '可可粉', '11', '11,188', '1468380919');
INSERT INTO `fl_class` VALUES ('189', '纯可可', '188', '11,188,189', '1468381023');
INSERT INTO `fl_class` VALUES ('190', '牛奶', '188', '11,188,190', '1468381164');
INSERT INTO `fl_class` VALUES ('191', '焦糖', '188', '11,188,191', '1468381273');
INSERT INTO `fl_class` VALUES ('192', '其他口味', '188', '11,188,192', '1468381319');
INSERT INTO `fl_class` VALUES ('193', '巧克力味', '188', '11,188,193', '1468381402');
INSERT INTO `fl_class` VALUES ('194', '扁桃仁', '14', '14,194', '1468381489');
INSERT INTO `fl_class` VALUES ('195', '原味', '194', '14,194,195', '1468381533');
INSERT INTO `fl_class` VALUES ('196', '盐焗', '194', '14,194,196', '1468381569');
INSERT INTO `fl_class` VALUES ('197', '奶油', '194', '14,194,197', '1468381683');
INSERT INTO `fl_class` VALUES ('198', '炭烧', '194', '14,194,198', '1468381762');
INSERT INTO `fl_class` VALUES ('199', '椒盐', '194', '14,194,199', '1468381812');
INSERT INTO `fl_class` VALUES ('200', '芥末', '194', '14,194,200', '1468381863');
INSERT INTO `fl_class` VALUES ('201', '原味', '86', '14,86,201', '1468381917');
INSERT INTO `fl_class` VALUES ('202', '奶油', '86', '14,86,202', '1468382026');
INSERT INTO `fl_class` VALUES ('203', '盐焗', '86', '14,86,203', '1468382183');
INSERT INTO `fl_class` VALUES ('204', '炭烧', '86', '14,86,204', '1468382259');
INSERT INTO `fl_class` VALUES ('205', '其他', '86', '14,86,205', '1468382312');
INSERT INTO `fl_class` VALUES ('206', '原味', '88', '14,88,206', '1468382473');
INSERT INTO `fl_class` VALUES ('207', '原味', '87', '14,87,207', '1468382526');
INSERT INTO `fl_class` VALUES ('208', '原味', '89', '14,89,208', '1468382591');
INSERT INTO `fl_class` VALUES ('209', '原味', '90', '14,90,209', '1468382648');
INSERT INTO `fl_class` VALUES ('210', '原味', '172', '14,172,210', '1468382683');
INSERT INTO `fl_class` VALUES ('211', '盐津', '93', '14,93,211', '1468382798');
INSERT INTO `fl_class` VALUES ('212', '椒盐', '172', '14,172,212', '1468386298');
INSERT INTO `fl_class` VALUES ('213', '奶油味', '89', '14,89,213', '1468386363');
INSERT INTO `fl_class` VALUES ('214', '奶油味', '90', '14,90,214', '1468386432');
INSERT INTO `fl_class` VALUES ('215', '盐焗', '88', '14,88,215', '1468386498');
INSERT INTO `fl_class` VALUES ('216', '五香味', '142', '8,142,216', '1468386547');
INSERT INTO `fl_class` VALUES ('217', '咸香', '147', '8,147,217', '1468386623');
INSERT INTO `fl_class` VALUES ('218', '香辣味', '146', '8,146,218', '1468386725');
INSERT INTO `fl_class` VALUES ('219', '松塔', '2', '1,2,219', null);
INSERT INTO `fl_class` VALUES ('220', '甜味', '6', '5,6,220', null);
INSERT INTO `fl_class` VALUES ('221', '牛排味', '6', '5,6,221', null);
INSERT INTO `fl_class` VALUES ('222', '番茄味', '6', '5,6,222', null);

-- ----------------------------
-- Table structure for `fl_comment`
-- ----------------------------
DROP TABLE IF EXISTS `fl_comment`;
CREATE TABLE `fl_comment` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment_order` varchar(255) NOT NULL,
  `comment_custom_id` int(11) NOT NULL,
  `comment_prod_id` int(11) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_createtime` int(11) NOT NULL,
  `comment_star` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_comment
-- ----------------------------
INSERT INTO `fl_comment` VALUES ('1', '111111', '1', '1', '很好', '1468464274', '5');
INSERT INTO `fl_comment` VALUES ('2', '222222', '2', '1', '很赞', '1468465014', '4');
INSERT INTO `fl_comment` VALUES ('3', '333333', '5', '1', '特别好', '1468465383', '3');
INSERT INTO `fl_comment` VALUES ('4', '444444', '4', '1', '不错', '1468468002', '2');
INSERT INTO `fl_comment` VALUES ('5', '111111', '1', '1', '真的很不错', '1468568192', '5');
INSERT INTO `fl_comment` VALUES ('6', '222222', '2', '1', '很好吃，又便宜', '1468667033', '4');
INSERT INTO `fl_comment` VALUES ('7', '555555', '3', '1', '不好吃', '1468789033', '0');
INSERT INTO `fl_comment` VALUES ('8', '666666', '7', '1', '太难吃了', '1468931543', '0');
INSERT INTO `fl_comment` VALUES ('9', '777777', '6', '1', '挺好吃的', '1468952762', '5');
INSERT INTO `fl_comment` VALUES ('10', '2016072049940', '1', '33', '太咸了', '1469093436', '5');
INSERT INTO `fl_comment` VALUES ('11', '2016072053261', '1', '33', '时代发生地方', '1469167718', '5');
INSERT INTO `fl_comment` VALUES ('12', '2016072084178', '1', '33', '太咸了', '1469168374', '5');
INSERT INTO `fl_comment` VALUES ('13', '2016072084178', '1', '34', '味道还行', '1469168419', '5');
INSERT INTO `fl_comment` VALUES ('14', '2016072030339', '1', '33', '123', '1469168705', '5');
INSERT INTO `fl_comment` VALUES ('15', '2016072030339', '1', '34', '123', '1469168721', '5');
INSERT INTO `fl_comment` VALUES ('16', '2016072063919', '1', '33', '不错', '1469168967', '5');
INSERT INTO `fl_comment` VALUES ('17', '2016072063919', '1', '34', '一般', '1469168967', '5');
INSERT INTO `fl_comment` VALUES ('18', '2016072033065', '1', '1', '味道真好', '1469169040', '5');
INSERT INTO `fl_comment` VALUES ('19', '2016072112961', '1', '11', '真便宜真好吃', '1469169078', '5');
INSERT INTO `fl_comment` VALUES ('20', '2016072613122', '7', '4', 'faskld;j', '1469752759', '3');
INSERT INTO `fl_comment` VALUES ('21', '2016072613122', '7', '43', 'fasdfds', '1469752784', '3');
INSERT INTO `fl_comment` VALUES ('22', '2016072950690', '6', '5', '好', '1469753513', '4');
INSERT INTO `fl_comment` VALUES ('23', '2016072950690', '6', '5', 'good', '1469753560', '4');
INSERT INTO `fl_comment` VALUES ('24', '2016072950690', '6', '44', 'best', '1469753560', '4');
INSERT INTO `fl_comment` VALUES ('25', '2016072950690', '6', '44', 'goos', '1469753579', '4');
INSERT INTO `fl_comment` VALUES ('26', '2016072742155', '1', '4', '12312312', '1469753824', '5');
INSERT INTO `fl_comment` VALUES ('27', '2016072742155', '1', '11', '123123123123', '1469753824', '5');
INSERT INTO `fl_comment` VALUES ('28', '2016072975211', '1', '1', '123123213', '1469754064', '5');
INSERT INTO `fl_comment` VALUES ('29', '2016072920842', '1', '11', '32323', '1469754322', '2');
INSERT INTO `fl_comment` VALUES ('30', '2016072956926', '6', '2', '很好', '1469754606', '5');
INSERT INTO `fl_comment` VALUES ('31', '2016072956926', '6', '11', '不错', '1469754621', '4');
INSERT INTO `fl_comment` VALUES ('32', '2016072956926', '6', '11', '好', '1469754651', '4');
INSERT INTO `fl_comment` VALUES ('33', '2016072956926', '6', '11', '好', '1469754664', '4');
INSERT INTO `fl_comment` VALUES ('34', '2016072956926', '6', '11', '好', '1469754681', '5');
INSERT INTO `fl_comment` VALUES ('35', '2016072972011', '6', '19', '好', '1469754711', '4');
INSERT INTO `fl_comment` VALUES ('36', '2016072956926', '6', '11', '好', '1469754746', '5');
INSERT INTO `fl_comment` VALUES ('37', '2016072956926', '6', '11', '好', '1469754760', '4');
INSERT INTO `fl_comment` VALUES ('38', '2016072956926', '6', '11', '好', '1469754774', '5');
INSERT INTO `fl_comment` VALUES ('39', '2016072912162', '1', '10', '12312321', '1469755033', '5');
INSERT INTO `fl_comment` VALUES ('40', '2016072912162', '1', '36', '12312313', '1469755033', '5');
INSERT INTO `fl_comment` VALUES ('41', '2016072912162', '1', '36', 'zjj1', '1469755045', '5');
INSERT INTO `fl_comment` VALUES ('42', '2016072935274', '1', '1', '12312312', '1469755119', '5');
INSERT INTO `fl_comment` VALUES ('43', '2016072935274', '1', '2', '323123123', '1469755119', '5');
INSERT INTO `fl_comment` VALUES ('44', '2016072956926', '6', '11', '好', '1469754948', '5');
INSERT INTO `fl_comment` VALUES ('45', '2016072956739', '1', '2', '123123', '1469755951', '5');
INSERT INTO `fl_comment` VALUES ('46', '2016072956739', '1', '3', '123123', '1469755951', '5');
INSERT INTO `fl_comment` VALUES ('47', '2016072910086', '1', '10', '123123', '1469756169', '5');
INSERT INTO `fl_comment` VALUES ('48', '2016072910086', '1', '11', '22222', '1469756169', '5');
INSERT INTO `fl_comment` VALUES ('49', '2016072910086', '1', '13', '12312312312312', '1469756180', '5');
INSERT INTO `fl_comment` VALUES ('50', '2016072991993', '1', '10', '23232323', '1469756263', '5');
INSERT INTO `fl_comment` VALUES ('51', '2016072991993', '1', '11', '232323232', '1469756263', '5');
INSERT INTO `fl_comment` VALUES ('52', '2016072928652', '1', '9', '12312321321', '1469756307', '5');
INSERT INTO `fl_comment` VALUES ('53', '2016072928652', '1', '10', '12312312312', '1469756307', '5');
INSERT INTO `fl_comment` VALUES ('54', '2016072928652', '1', '11', '123123123123', '1469756325', '5');
INSERT INTO `fl_comment` VALUES ('55', '2016072991993', '1', '10', '123123213', '1469756454', '5');
INSERT INTO `fl_comment` VALUES ('56', '2016072955114', '1', '9', '123123', '1469756576', '5');
INSERT INTO `fl_comment` VALUES ('57', '2016072955114', '1', '10', '323123123', '1469756576', '5');
INSERT INTO `fl_comment` VALUES ('58', '2016072955114', '1', '9', '123123123', '1469756635', '5');
INSERT INTO `fl_comment` VALUES ('59', '2016072961602', '1', '1', '123123', '1469756679', '5');
INSERT INTO `fl_comment` VALUES ('60', '2016072961602', '1', '2', '123123123', '1469756679', '5');
INSERT INTO `fl_comment` VALUES ('61', '2016072953967', '1', '2', '123123213', '1469757170', '5');
INSERT INTO `fl_comment` VALUES ('62', '2016072953967', '1', '3', '123123123213', '1469757170', '5');
INSERT INTO `fl_comment` VALUES ('63', '2016072953967', '1', '2', '123123', '1469757178', '5');
INSERT INTO `fl_comment` VALUES ('64', '2016072990730', '1', '1', '123123', '1469757259', '5');
INSERT INTO `fl_comment` VALUES ('65', '2016072990730', '1', '2', '321', '1469757259', '5');
INSERT INTO `fl_comment` VALUES ('66', '2016072937472', '1', '1', '123', '1469757339', '5');
INSERT INTO `fl_comment` VALUES ('67', '2016072937472', '1', '2', '32', '1469757339', '5');
INSERT INTO `fl_comment` VALUES ('68', '2016072944691', '1', '29', '123123', '1469757455', '5');
INSERT INTO `fl_comment` VALUES ('69', '2016072944691', '1', '30', '1231231', '1469757455', '5');
INSERT INTO `fl_comment` VALUES ('70', '2016072944691', '1', '31', '123123123', '1469757467', '5');
INSERT INTO `fl_comment` VALUES ('71', '2016072900636', '1', '1', '12312312', '1469757502', '5');
INSERT INTO `fl_comment` VALUES ('72', '2016072900636', '1', '2', '123123', '1469757502', '5');
INSERT INTO `fl_comment` VALUES ('73', '2016072900636', '1', '3', '12312321', '1469757507', '5');
INSERT INTO `fl_comment` VALUES ('74', '2016072949708', '6', '9', 'fasdfasd', '1469757504', '4');
INSERT INTO `fl_comment` VALUES ('75', '2016072949708', '6', '10', '发送到发送到', '1469757515', '2');
INSERT INTO `fl_comment` VALUES ('76', '2016072949708', '6', '11', '发送到发送到', '1469757524', '4');

-- ----------------------------
-- Table structure for `fl_custom`
-- ----------------------------
DROP TABLE IF EXISTS `fl_custom`;
CREATE TABLE `fl_custom` (
  `custom_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom_username` varchar(255) NOT NULL,
  `custom_pwd` varchar(255) NOT NULL,
  `custom_nickname` varchar(6) DEFAULT '丰林欢迎你',
  `custom_sex` enum('女','男') NOT NULL DEFAULT '男',
  `custom_tel` varchar(11) DEFAULT NULL,
  `custom_go` smallint(1) unsigned NOT NULL DEFAULT '0',
  `custom_year` tinyint(4) NOT NULL DEFAULT '20',
  `custom_pic` varchar(255) NOT NULL DEFAULT 'data-tu.gif',
  `custom_email` varchar(255) DEFAULT NULL,
  `custom_time` int(11) NOT NULL,
  PRIMARY KEY (`custom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_custom
-- ----------------------------
INSERT INTO `fl_custom` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', '578f38ddc8d0b.jpg', '123@123.123', '1468889736');
INSERT INTO `fl_custom` VALUES ('2', 'carrie', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123.com', '1468976972');
INSERT INTO `fl_custom` VALUES ('3', 'allen', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123.com', '1468977008');
INSERT INTO `fl_custom` VALUES ('4', 'eddie', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123.123', '1468977036');
INSERT INTO `fl_custom` VALUES ('5', 'jay', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123', '1468977081');
INSERT INTO `fl_custom` VALUES ('6', 'tony', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123.com', '1468977139');
INSERT INTO `fl_custom` VALUES ('7', 'clair', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', '13083691022', '0', '20', 'data-tu.gif', '123@123.com', '1468977180');
INSERT INTO `fl_custom` VALUES ('9', '123123', '4297f44b13955235245b2497399d7a93', '丰林欢迎你', '男', null, '0', '20', 'data-tu.gif', '123@12.com', '1469170957');
INSERT INTO `fl_custom` VALUES ('10', '123123123', '4297f44b13955235245b2497399d7a93', '丰林欢迎你', '男', null, '1', '20', 'data-tu.gif', '123@13.com', '1469171109');
INSERT INTO `fl_custom` VALUES ('11', 'gaoyong', 'f66c583bb0f57faf6eacaedc7e30834a', '丰林欢迎你', '男', null, '0', '20', '57957343ed67a.jpg', 'a@a.com', '1469411847');
INSERT INTO `fl_custom` VALUES ('12', 'list', 'e10adc3949ba59abbe56e057f20f883e', '丰林欢迎你', '男', null, '0', '20', 'data-tu.gif', '123@122.com', '1469609056');

-- ----------------------------
-- Table structure for `fl_order`
-- ----------------------------
DROP TABLE IF EXISTS `fl_order`;
CREATE TABLE `fl_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_feel` varchar(255) NOT NULL,
  `order_custom_id` int(11) DEFAULT NULL,
  `order_custom_name` varchar(255) DEFAULT NULL,
  `order_custom_pic` varchar(255) DEFAULT NULL,
  `order_date` int(11) NOT NULL,
  `order_tot` float(10,2) NOT NULL,
  `order_status` enum('已评论','已付款','未付款') NOT NULL DEFAULT '未付款',
  `order_site` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_order
-- ----------------------------
INSERT INTO `fl_order` VALUES ('1', '2016072944691', '1', 'admin', '578f38ddc8d0b.jpg', '1469757436', '197.80', '已评论', '4');
INSERT INTO `fl_order` VALUES ('2', '2016072900636', '1', 'admin', '578f38ddc8d0b.jpg', '1469757488', '308.90', '已评论', '4');
INSERT INTO `fl_order` VALUES ('3', '2016072949708', '6', 'tony', 'data-tu.gif', '1469757487', '30.70', '已评论', '32');

-- ----------------------------
-- Table structure for `fl_order_prod`
-- ----------------------------
DROP TABLE IF EXISTS `fl_order_prod`;
CREATE TABLE `fl_order_prod` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_feel` varchar(255) DEFAULT NULL,
  `order_prod_id` int(255) DEFAULT NULL,
  `order_price` float DEFAULT NULL,
  `order_pl` enum('未评论','已评论') DEFAULT '未评论',
  `order_num` int(11) DEFAULT NULL,
  `order_prod_send` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_order_prod
-- ----------------------------
INSERT INTO `fl_order_prod` VALUES ('7', '2016072033065', '1', '11.9', '已评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('8', '2016072033065', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('9', '2016072033065', '9', '14.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('10', '2016072033065', '17', '49', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('11', '2016072033065', '28', '38.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('12', '2016072033065', '34', '36.8', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('19', '2016072084178', '33', '33.8', '已评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('20', '2016072084178', '34', '36.8', '已评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('25', '2016072112961', '11', '5.9', '已评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('26', '2016072545255', '4', '89', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('27', '2016072658026', '12', '39.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('28', '2016072697812', '11', '5.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('29', '2016072636156', '12', '39.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('35', '2016072613122', '4', '89', '已评论', '10', '0');
INSERT INTO `fl_order_prod` VALUES ('36', '2016072613122', '43', '69.9', '已评论', '12', '0');
INSERT INTO `fl_order_prod` VALUES ('37', '2016072613122', '44', '6.9', '未评论', '22', '0');
INSERT INTO `fl_order_prod` VALUES ('38', '2016072665678', '11', '5.9', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('39', '2016072665678', '10', '9.9', '未评论', '4', '1');
INSERT INTO `fl_order_prod` VALUES ('40', '2016072630395', '43', '69.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('41', '2016072630395', '44', '6.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('42', '2016072652863', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('43', '2016072652863', '43', '69.9', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('44', '2016072606820', '16', '25.6', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('45', '2016072606820', '4', '89', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('46', '2016072606820', '5', '33', '未评论', '3', '0');
INSERT INTO `fl_order_prod` VALUES ('47', '2016072606820', '18', '10.8', '未评论', '4', '0');
INSERT INTO `fl_order_prod` VALUES ('48', '2016072669190', '9', '14.9', '未评论', '10', '0');
INSERT INTO `fl_order_prod` VALUES ('49', '2016072669190', '3', '238', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('50', '2016072628751', '44', '6.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('51', '2016072628751', '43', '69.9', '未评论', '10', '0');
INSERT INTO `fl_order_prod` VALUES ('52', '2016072633421', '12', '39.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('53', '2016072633421', '36', '18.9', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('54', '2016072633421', '10', '9.9', '未评论', '3', '1');
INSERT INTO `fl_order_prod` VALUES ('55', '2016072622771', '15', '79', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('56', '2016072622771', '16', '25.6', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('57', '2016072622771', '17', '49', '未评论', '3', '0');
INSERT INTO `fl_order_prod` VALUES ('58', '2016072670902', '1', '11.9', '未评论', '3', '1');
INSERT INTO `fl_order_prod` VALUES ('59', '2016072604745', '12', '39.9', '未评论', '4', '0');
INSERT INTO `fl_order_prod` VALUES ('60', '2016072604745', '9', '14.9', '未评论', '3', '0');
INSERT INTO `fl_order_prod` VALUES ('61', '2016072604745', '11', '5.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('62', '2016072634997', '36', '18.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('63', '2016072634997', '9', '14.9', '未评论', '3', '0');
INSERT INTO `fl_order_prod` VALUES ('64', '2016072634997', '10', '9.9', '未评论', '2', '1');
INSERT INTO `fl_order_prod` VALUES ('65', '2016072743453', '3', '238', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('68', '2016072760592', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('69', '2016072760592', '16', '25.6', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('70', '2016072760592', '5', '33', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('71', '2016072729702', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('72', '2016072729702', '16', '25.6', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('73', '2016072729702', '43', '69.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('74', '2016072747942', '12', '39.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('75', '2016072706278', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('76', '2016072706278', '16', '25.6', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('77', '2016072706278', '36', '18.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('78', '2016072769907', '2', '59', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('79', '2016072767961', '9', '14.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('80', '2016072753299', '3', '238', '未评论', '1', '1');
INSERT INTO `fl_order_prod` VALUES ('81', '2016072749547', '9', '14.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('82', '2016072758608', '24', '67.6', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('83', '2016072748462', '4', '89', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('84', '2016072793262', '43', '69.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('85', '2016072742800', '43', '69.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('86', '2016072780325', '11', '5.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('87', '2016072742155', '11', '5.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('88', '2016072742155', '4', '89', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('89', '2016072916988', '44', '6.9', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('90', '2016072927256', '44', '6.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('91', '2016072927256', '5', '33', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('92', '2016072982787', '1', '11.9', '未评论', '5', '0');
INSERT INTO `fl_order_prod` VALUES ('93', '2016072950690', '44', '6.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('94', '2016072950690', '5', '33', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('95', '2016072950690', '9', '14.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('96', '2016072936026', '44', '6.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('97', '2016072936026', '5', '33', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('98', '2016072936026', '43', '69.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('99', '2016072975211', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('100', '2016072920842', '11', '5.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('101', '2016072948991', '2', '59', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('106', '2016072912162', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('107', '2016072912162', '37', '39.9', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('108', '2016072912162', '36', '18.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('109', '2016072935274', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('110', '2016072935274', '3', '238', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('111', '2016072935274', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('112', '2016072953051', '4', '89', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('113', '2016072953051', '2', '59', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('114', '2016072953051', '3', '238', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('115', '2016072956739', '3', '238', '已评论', '3', '0');
INSERT INTO `fl_order_prod` VALUES ('116', '2016072956739', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('117', '2016072956739', '1', '11.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('118', '2016072910086', '11', '5.9', '已评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('119', '2016072910086', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('120', '2016072910086', '13', '8.5', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('121', '2016072991993', '12', '39.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('122', '2016072991993', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('123', '2016072991993', '11', '5.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('124', '2016072928652', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('125', '2016072928652', '9', '14.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('126', '2016072928652', '11', '5.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('127', '2016072955114', '11', '5.9', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('128', '2016072955114', '9', '14.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('129', '2016072955114', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('130', '2016072961602', '3', '238', '未评论', '2', '0');
INSERT INTO `fl_order_prod` VALUES ('131', '2016072961602', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('132', '2016072961602', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('133', '2016072953967', '4', '89', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('134', '2016072953967', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('135', '2016072953967', '3', '238', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('136', '2016072990730', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('137', '2016072990730', '3', '238', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('138', '2016072990730', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('139', '2016072937472', '3', '238', '未评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('140', '2016072937472', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('141', '2016072937472', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('142', '2016072944691', '29', '39.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('143', '2016072944691', '30', '59.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('144', '2016072944691', '31', '98', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('145', '2016072900636', '1', '11.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('146', '2016072900636', '2', '59', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('147', '2016072900636', '3', '238', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('148', '2016072949708', '9', '14.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('149', '2016072949708', '10', '9.9', '已评论', '1', '0');
INSERT INTO `fl_order_prod` VALUES ('150', '2016072949708', '11', '5.9', '已评论', '1', '0');

-- ----------------------------
-- Table structure for `fl_pic`
-- ----------------------------
DROP TABLE IF EXISTS `fl_pic`;
CREATE TABLE `fl_pic` (
  `pic_pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pic_prod_id` int(11) unsigned NOT NULL,
  `pic_name` varchar(60) NOT NULL,
  `pic_size` varchar(20) NOT NULL,
  PRIMARY KEY (`pic_pid`)
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_pic
-- ----------------------------
INSERT INTO `fl_pic` VALUES ('1', '1', '140_57863e704d914.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('2', '1', '350_57863e704d914.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('3', '1', '140_57863e704f084.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('4', '1', '350_57863e704f084.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('5', '1', '140_57863e7050024.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('6', '1', '350_57863e7050024.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('7', '1', '140_57863e70513ad.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('8', '1', '350_578c3d719c996.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('9', '2', '140_57863faa442af.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('10', '2', '350_57863faa442af.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('11', '2', '140_57863faa4524f.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('12', '2', '350_57863faa4524f.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('13', '2', '140_57863faa465d7.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('14', '2', '350_57863faa465d7.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('15', '2', '140_57863faa47578.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('16', '2', '350_57863faa47578.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('17', '3', '140_5786416aa638f.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('18', '3', '350_5786416aa638f.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('19', '3', '140_5786416aa9270.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('20', '3', '350_5786416aa9270.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('21', '3', '140_5786416aab598.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('22', '3', '350_5786416aab598.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('23', '4', '140_5786433ca4caf.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('24', '4', '350_5786433ca4caf.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('25', '4', '140_5786433ca73c0.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('26', '4', '350_5786433ca73c0.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('27', '4', '140_5786433ca8748.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('28', '4', '350_5786433ca8748.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('29', '4', '140_5786433caa2a0.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('30', '4', '350_5786433caa2a0.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('31', '5', '140_578644baafa30.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('32', '5', '350_578644baafa30.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('33', '5', '140_578644bab2910.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('34', '5', '350_578644bab2910.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('35', '5', '140_578644bab4469.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('36', '5', '350_578644bab4469.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('37', '5', '140_578644bab5fc1.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('38', '5', '350_578644bab5fc1.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('39', '6', '140_578645c448d09.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('40', '6', '350_578645c448d09.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('41', '6', '140_578645c44a091.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('42', '6', '350_578645c44a091.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('43', '6', '140_578645c44b802.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('44', '6', '350_578645c44b802.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('45', '6', '140_578645c44cb8a.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('46', '6', '350_578645c44cb8a.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('47', '7', '140_57864826ef651.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('48', '7', '350_57864826ef651.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('49', '7', '140_57864826f09da.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('50', '7', '350_57864826f09da.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('51', '7', '140_57864826f1d62.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('52', '7', '350_57864826f1d62.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('53', '7', '140_57864826f34d2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('54', '7', '350_57864826f34d2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('55', '8', '140_5786e730c9320.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('56', '8', '350_5786e730c9320.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('57', '8', '140_5786e730cba31.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('58', '8', '350_5786e730cba31.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('59', '8', '140_5786e730cd971.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('60', '8', '350_5786e730cd971.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('61', '8', '140_5786e730cf8b2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('62', '8', '350_5786e730cf8b2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('63', '9', '140_5786e899a5064.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('64', '9', '350_5786e899a5064.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('65', '9', '140_5786e899a67d4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('66', '9', '350_5786e899a67d4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('67', '9', '140_5786e899a7f45.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('68', '9', '350_5786e899a7f45.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('69', '9', '140_5786e899a96b5.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('70', '9', '350_5786e899a96b5.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('71', '10', '140_5786ea331d7ef.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('72', '10', '350_5786ea331d7ef.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('73', '10', '140_5786ea33202e8.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('74', '10', '350_5786ea33202e8.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('75', '10', '140_5786ea3321e40.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('76', '10', '350_5786ea3321e40.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('77', '10', '140_5786ea33231c8.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('78', '10', '350_5786ea33231c8.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('79', '11', '140_5786ed322e4c2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('80', '11', '350_5786ed322e4c2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('81', '11', '140_5786ed3230bd2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('82', '11', '350_5786ed3230bd2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('83', '11', '140_5786ed323272b.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('84', '11', '350_5786ed323272b.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('85', '11', '140_5786ed3233e9b.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('86', '11', '350_5786ed3233e9b.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('87', '12', '140_5786ef3fedf73.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('88', '12', '350_5786ef3fedf73.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('89', '12', '140_5786ef3ff0a6c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('90', '12', '350_5786ef3ff0a6c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('91', '13', '140_5786f0e5bd1e3.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('92', '13', '350_5786f0e5bd1e3.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('93', '13', '140_5786f0e5be56c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('94', '13', '350_5786f0e5be56c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('95', '13', '140_5786f0e5bf8f4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('96', '13', '350_5786f0e5bf8f4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('97', '14', '140_5786f403a1b13.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('98', '14', '350_5786f403a1b13.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('99', '14', '140_5786f403a3283.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('100', '14', '350_5786f403a3283.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('101', '14', '140_5786f403a460c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('102', '14', '350_5786f403a460c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('103', '14', '140_5786f403a5994.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('104', '14', '350_5786f403a5994.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('105', '15', '140_5786f898cc555.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('106', '15', '350_5786f898cc555.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('107', '15', '140_5786f898cd8de.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('108', '15', '350_5786f898cd8de.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('109', '15', '140_5786f898ce87e.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('110', '15', '350_5786f898ce87e.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('111', '16', '140_5786fc9303027.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('112', '16', '350_5786fc9303027.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('113', '16', '140_5786fc93043af.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('114', '16', '350_5786fc93043af.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('115', '16', '140_5786fc9305737.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('116', '16', '350_5786fc9305737.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('117', '16', '140_5786fc9306ac0.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('118', '16', '350_5786fc9306ac0.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('119', '17', '140_5786ff7642edd.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('120', '17', '350_5786ff7642edd.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('121', '17', '140_5786ff764464d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('122', '17', '350_5786ff764464d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('123', '17', '140_5786ff7645dbd.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('124', '17', '350_5786ff7645dbd.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('125', '17', '140_5786ff7647cfe.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('126', '17', '350_5786ff7647cfe.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('127', '18', '140_578700e8082c4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('128', '18', '350_578700e8082c4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('129', '18', '140_578700e809e1d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('130', '18', '350_578700e809e1d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('131', '18', '140_578700e80b58d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('132', '18', '350_578700e80b58d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('133', '18', '140_578700e80ccfd.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('134', '18', '350_578700e80ccfd.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('135', '19', '140_57870291818fe.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('136', '19', '350_57870291818fe.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('137', '19', '140_578702918400e.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('138', '19', '350_578702918400e.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('139', '19', '140_5787029185396.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('140', '19', '350_5787029185396.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('141', '19', '140_578702918671f.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('142', '19', '350_578702918671f.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('143', '20', '140_5787039629268.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('144', '20', '350_5787039629268.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('145', '20', '140_578703962a9d8.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('146', '20', '350_578703962a9d8.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('147', '20', '140_578703962c530.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('148', '20', '350_578703962c530.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('149', '20', '140_578703962dca1.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('150', '20', '350_578703962dca1.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('151', '21', '140_57870654789bd.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('152', '21', '350_57870654789bd.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('153', '21', '140_578706547b4b5.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('154', '21', '350_578706547b4b5.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('155', '21', '140_578706547d7de.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('156', '21', '350_578706547d7de.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('157', '22', '140_57870b229a1a2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('158', '22', '350_57870b229a1a2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('159', '22', '140_57870b229b912.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('160', '22', '350_57870b229b912.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('161', '22', '140_57870b229d853.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('162', '22', '350_57870b229d853.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('163', '22', '140_57870b229ebdb.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('164', '22', '350_57870b229ebdb.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('165', '23', '140_57870c5c1a400.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('166', '23', '350_57870c5c1a400.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('167', '23', '140_57870c5c1d2e1.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('168', '23', '350_57870c5c1d2e1.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('169', '23', '140_57870c5c1fdd9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('170', '23', '350_57870c5c1fdd9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('171', '23', '140_57870c5c21162.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('172', '23', '350_57870c5c21162.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('173', '24', '140_57870dab9ad93.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('174', '24', '350_57870dab9ad93.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('175', '24', '140_57870dab9effc.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('176', '24', '350_57870dab9effc.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('177', '24', '140_57870daba076c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('178', '24', '350_57870daba076c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('179', '24', '140_57870daba1af4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('180', '24', '350_57870daba1af4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('181', '25', '140_57871972e749c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('182', '25', '350_57871972e749c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('183', '25', '140_57871972e8ff4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('184', '25', '350_57871972e8ff4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('185', '25', '140_57871972eb705.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('186', '25', '350_57871972eb705.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('187', '25', '140_57871972ede16.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('188', '25', '350_57871972ede16.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('189', '26', '140_57871bc2ded80.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('190', '26', '350_57871bc2ded80.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('191', '26', '140_57871bc2e0108.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('192', '26', '350_57871bc2e0108.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('193', '26', '140_57871bc2e1490.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('194', '26', '350_57871bc2e1490.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('195', '26', '140_57871bc2e2819.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('196', '26', '350_57871bc2e2819.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('197', '27', '140_57871d3005705.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('198', '27', '350_57871d3005705.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('199', '27', '140_57871d3006e76.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('200', '27', '350_57871d3006e76.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('201', '27', '140_57871d30089ce.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('202', '27', '350_57871d30089ce.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('203', '27', '140_57871d300a90e.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('204', '27', '350_57871d300a90e.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('205', '28', '140_57871f034d5e3.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('206', '28', '350_57871f034d5e3.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('207', '28', '140_57871f034f90c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('208', '28', '350_57871f034f90c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('209', '28', '140_57871f0350c94.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('210', '28', '350_57871f0350c94.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('211', '28', '140_57871f0352404.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('212', '28', '350_57871f0352404.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('213', '29', '140_57872d673ba1c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('214', '29', '350_57872d673ba1c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('215', '29', '140_57872d673e8fd.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('216', '29', '350_57872d673e8fd.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('217', '29', '140_57872d6740c25.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('218', '29', '350_57872d6740c25.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('219', '29', '140_57872d6741fae.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('220', '29', '350_57872d6741fae.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('221', '30', '140_57872fda007b3.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('222', '30', '350_57872fda007b3.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('223', '30', '140_57872fda03a7c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('224', '30', '350_57872fda03a7c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('225', '30', '140_57872fda05da4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('226', '30', '350_57872fda05da4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('227', '30', '140_57872fda0712c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('228', '30', '350_57872fda0712c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('229', '31', '140_578731105bc7b.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('230', '31', '350_578731105bc7b.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('231', '31', '140_578731105d3ec.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('232', '31', '350_578731105d3ec.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('233', '31', '140_578731105eb5c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('234', '31', '350_578731105eb5c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('235', '31', '140_578731105fee4.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('236', '31', '350_578731105fee4.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('237', '32', '140_57873d3fdab8f.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('238', '32', '350_57873d3fdab8f.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('239', '32', '140_57873d3fdc2ff.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('240', '32', '350_57873d3fdc2ff.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('241', '32', '140_57873d3fdda6f.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('242', '32', '350_57873d3fdda6f.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('243', '33', '140_57873ed41cd89.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('244', '33', '350_57873ed41cd89.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('245', '33', '140_57873ed41e4f9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('246', '33', '350_57873ed41e4f9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('247', '33', '140_57873ed41f882.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('248', '33', '350_57873ed41f882.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('249', '33', '140_57873ed420ff2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('250', '33', '350_57873ed420ff2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('251', '34', '140_57873fbcab3df.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('252', '34', '350_57873fbcab3df.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('253', '34', '140_57873fbcb4851.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('254', '34', '350_57873fbcb4851.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('255', '34', '140_57873fbcb63a9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('256', '34', '350_57873fbcb63a9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('257', '35', '140_578c474456ea9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('258', '35', '350_578c474456ea9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('259', '35', '140_578c474458231.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('260', '35', '350_578c474458231.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('261', '35', '140_578c474459d89.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('262', '35', '350_578c474459d89.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('263', '35', '140_578c47445b4fa.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('264', '35', '350_578c47445b4fa.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('265', '36', '140_578c495f86dc6.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('266', '36', '350_578c495f86dc6.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('267', '36', '140_578c495f87d66.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('268', '36', '350_578c495f87d66.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('269', '36', '140_578c495f88d07.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('270', '36', '350_578c495f88d07.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('271', '36', '140_578c495f898bf.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('272', '36', '350_578c495f898bf.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('273', '36', '140_5792e2136ad06.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('274', '36', '350_5792e2136ad06.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('275', '36', '140_5792e2136dfce.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('276', '36', '350_5792e2136dfce.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('277', '36', '140_5792e213706df.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('278', '36', '350_5792e213706df.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('279', '36', '140_5792e21371a67.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('280', '36', '350_5792e21371a67.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('281', '37', '140_5792e2de1e69c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('282', '37', '350_5792e2de1e69c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('283', '37', '140_5792e2de21194.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('284', '37', '350_5792e2de21194.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('285', '37', '140_5792e2de24075.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('286', '37', '350_5792e2de24075.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('287', '41', '140_5792e6487cbcb.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('288', '41', '350_5792e6487cbcb.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('289', '41', '140_5792e6487faac.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('290', '41', '350_5792e6487faac.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('291', '41', '140_5792e6488121c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('292', '41', '350_5792e6488121c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('293', '41', '140_5792e6488298d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('294', '41', '350_5792e6488298d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('295', '42', '140_5792e7d9ee7a8.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('296', '42', '350_5792e7d9ee7a8.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('297', '42', '140_5792e7d9f0eb9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('298', '42', '350_5792e7d9f0eb9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('299', '42', '140_5792e7d9f35c9.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('300', '42', '350_5792e7d9f35c9.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('301', '42', '140_5792e7da0226a.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('302', '42', '350_5792e7da0226a.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('303', '43', '140_57945c3445e76.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('304', '43', '350_57945c3445e76.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('305', '43', '140_57945c3449527.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('306', '43', '350_57945c3449527.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('307', '43', '140_57945c344b850.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('308', '43', '350_57945c344b850.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('309', '43', '140_57945c344cbd8.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('310', '43', '350_57945c344cbd8.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('311', '44', '140_57945e2382e62.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('312', '44', '350_57945e2382e62.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('313', '44', '140_57945e23849ba.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('314', '44', '350_57945e23849ba.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('315', '44', '140_57945e23870cb.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('316', '44', '350_57945e23870cb.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('317', '44', '140_57945e238806b.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('318', '44', '350_57945e238806b.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('319', '45', '140_57947c040880c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('320', '45', '350_57947c040880c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('321', '45', '140_57947c040b6ed.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('322', '45', '350_57947c040b6ed.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('323', '45', '140_57947c040da16.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('324', '45', '350_57947c040da16.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('325', '45', '140_57947c041050e.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('326', '45', '350_57947c041050e.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('327', '46', '140_57947d15df585.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('328', '46', '350_57947d15df585.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('329', '46', '140_57947d15e1c95.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('330', '46', '350_57947d15e1c95.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('331', '46', '140_57947d15e43a6.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('332', '46', '350_57947d15e43a6.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('333', '46', '140_57947d15e5b16.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('334', '46', '350_57947d15e5b16.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('335', '47', '140_57947e117dc4b.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('336', '47', '350_57947e117dc4b.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('337', '47', '140_57947e117fb8c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('338', '47', '350_57947e117fb8c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('339', '47', '140_57947e1180f14.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('340', '47', '350_57947e1180f14.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('341', '47', '140_57947e118229c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('342', '47', '350_57947e118229c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('343', '48', '140_57947f1286872.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('344', '48', '350_57947f1286872.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('345', '48', '140_57947f1287812.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('346', '48', '350_57947f1287812.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('347', '48', '140_57947f12887b2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('348', '48', '350_57947f12887b2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('349', '48', '140_57947f1289f23.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('350', '48', '350_57947f1289f23.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('351', '49', '140_57948bbf07554.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('352', '49', '350_57948bbf07554.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('353', '49', '140_57948bbf0ac05.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('354', '49', '350_57948bbf0ac05.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('355', '49', '140_57948bbf0cf2d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('356', '49', '350_57948bbf0cf2d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('357', '49', '140_57948bbf0ee6e.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('358', '49', '350_57948bbf0ee6e.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('359', '50', '140_57948ca8b5f79.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('360', '50', '350_57948ca8b5f79.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('361', '50', '140_57948ca8b8e59.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('362', '50', '350_57948ca8b8e59.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('363', '50', '140_57948ca8ba5ca.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('364', '50', '350_57948ca8ba5ca.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('365', '50', '140_57948ca8bbd3a.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('366', '50', '350_57948ca8bbd3a.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('367', '51', '140_57948ec250c35.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('368', '51', '350_57948ec250c35.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('369', '51', '140_57948ec252f5d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('370', '51', '350_57948ec252f5d.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('371', '51', '140_57948ec2546ce.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('372', '51', '350_57948ec2546ce.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('373', '51', '140_57948ec255a56.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('374', '51', '350_57948ec255a56.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('375', '52', '140_579490636bbda.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('376', '52', '350_579490636bbda.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('377', '52', '140_579490636e6d2.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('378', '52', '350_579490636e6d2.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('379', '52', '140_57949063711cb.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('380', '52', '350_57949063711cb.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('381', '52', '140_579490637487c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('382', '52', '350_579490637487c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('383', '53', '140_579ab772ef0ea.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('384', '53', '350_579ab772ef0ea.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('385', '53', '140_579ab7730143c.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('386', '53', '350_579ab7730143c.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('387', '53', '140_579ab77303764.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('388', '53', '350_579ab77303764.jpg', '350*350');
INSERT INTO `fl_pic` VALUES ('389', '53', '140_579ab7730625d.jpg', '140*140');
INSERT INTO `fl_pic` VALUES ('390', '53', '350_579ab7730625d.jpg', '350*350');

-- ----------------------------
-- Table structure for `fl_prod`
-- ----------------------------
DROP TABLE IF EXISTS `fl_prod`;
CREATE TABLE `fl_prod` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_bid` int(10) unsigned NOT NULL DEFAULT '1',
  `prod_cid` int(10) unsigned NOT NULL,
  `prod_name` varchar(40) NOT NULL,
  `prod_sale_price` float(6,2) NOT NULL,
  `prod_price` float(6,2) NOT NULL,
  `prod_qty` int(10) unsigned NOT NULL,
  `prod_offt` int(10) unsigned NOT NULL DEFAULT '0',
  `prod_go` smallint(1) unsigned NOT NULL DEFAULT '0',
  `prod_pic` varchar(60) DEFAULT NULL,
  `prod_createtime` int(10) unsigned NOT NULL,
  `prod_desc` mediumtext NOT NULL,
  `prod_area` varchar(10) NOT NULL DEFAULT '中国',
  `prod_pack` varchar(10) NOT NULL,
  `prod_weight` mediumint(9) DEFAULT NULL,
  `prod_number` int(11) unsigned NOT NULL,
  `prod_show_big` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_prod
-- ----------------------------
INSERT INTO `fl_prod` VALUES ('1', '29', '176', '好丽友 脆米棋子巧克力饼干 84g/盒 韩国进口', '11.90', '11.90', '500', '20', '0', '57863e704d914.jpg', '1468415600', '好丽友 脆米棋子巧克力饼干 84g/盒 韩国进口', '韩国', '袋装', '84', '435536031', '1');
INSERT INTO `fl_prod` VALUES ('2', '30', '177', '茱蒂丝 乳酪三明治饼干 504g （马来西亚）', '59.00', '59.00', '600', '16', '0', '57863faa442af.jpg', '1468415914', '茱蒂丝 乳酪三明治饼干 504g （马来西亚）', '马来西亚', '袋装', '504', '50543254', '1');
INSERT INTO `fl_prod` VALUES ('3', '31', '177', '白恋人 北海道白色恋人36枚白巧克力夹心饼干精致铁盒装 396g', '238.00', '238.00', '300', '24', '0', '5786416aa638f.jpg', '1468416362', '白恋人 北海道白色恋人36枚白巧克力夹心饼干精致铁盒装 396g', '日本', '袋装', '396', '490796242', '1');
INSERT INTO `fl_prod` VALUES ('4', '1', '25', 'knoppers 牛奶榛子巧克力威化饼干 600g（25g*24包）/盒 德国进', '89.00', '89.00', '500', '0', '0', '5786433ca4caf.jpg', '1468416828', 'knoppers 牛奶榛子巧克力威化饼干 600g（25g*24包）/盒 德国进口', '德国', '盒装', '600', '526254637', '0');
INSERT INTO `fl_prod` VALUES ('5', '24', '175', '东园 泰国进口 东园 什锦果仁 140g 含开心果腰果葡萄干无花果 休闲零食品坚', '33.00', '33.00', '600', '0', '0', '578644baafa30.jpg', '1468417210', '东园 泰国进口 东园 什锦果仁 140g 含开心果腰果葡萄干无花果 休闲零食品坚果', '泰国', '罐装', '140', '87800280', '0');
INSERT INTO `fl_prod` VALUES ('7', '32', '17', 'Ferrero/费列罗 健达奇趣蛋 牛奶巧克力内含玩具 费列罗Kinder Jo', '59.90', '59.90', '800', '0', '1', '57864826ef651.jpg', '1468418086', 'Ferrero/费列罗 健达奇趣蛋 牛奶巧克力内含玩具 费列罗Kinder Joy 9个装 儿童零食', '意大利', '盒装', '180', '79794528', '0');
INSERT INTO `fl_prod` VALUES ('9', '4', '119', '三只松鼠 小贱牛肉粒110g零食特产小吃牛肉干香辣味', '14.90', '14.90', '2000', '0', '0', '5786e899a5064.jpg', '1468459161', '三只松鼠 小贱牛肉粒110g零食特产小吃牛肉干香辣味', '中国', '袋装', '110', '456262092', '1');
INSERT INTO `fl_prod` VALUES ('10', '3', '115', '良品铺子 烘烤薯片（原味）98g /盒 下午茶 休闲零食薯片 口感酥脆香美', '9.90', '9.90', '3000', '0', '0', '5786ea331d7ef.jpg', '1468459571', '良品铺子 烘烤薯片（原味）98g /盒 下午茶 休闲零食薯片 口感酥脆香美', '中国', '袋装', '98', '321098526', '1');
INSERT INTO `fl_prod` VALUES ('11', '5', '135', '百草味 奶油黄金豆130g 奶香爆米花玉米豆 休闲零食', '5.90', '5.90', '1000', '0', '0', '5786ed322e4c2.jpg', '1468460338', '百草味 奶油黄金豆130g 奶香爆米花玉米豆 休闲零食', '中国', '袋装', '130', '20736203', '1');
INSERT INTO `fl_prod` VALUES ('12', '33', '109', '小老板 烤海苔卷 原味 36g/盒 泰国进口 X 3', '39.90', '39.90', '3000', '0', '0', '5786ef3fedf73.jpg', '1468460863', '小老板 烤海苔卷 原味 36g/盒 泰国进口 X 3', '泰国', '袋装', '36', '520742818', '0');
INSERT INTO `fl_prod` VALUES ('13', '34', '126', '来伊份 山椒凤爪130g/袋', '8.50', '8.50', '2500', '0', '0', '5786f0e5bd1e3.jpg', '1468461285', '来伊份 山椒凤爪130g/袋', '中国', '袋装', '130', '533516573', '0');
INSERT INTO `fl_prod` VALUES ('15', '36', '60', '雀巢 醇品速溶咖啡 500g/罐', '79.00', '79.00', '500', '0', '0', '5786f898cc555.jpg', '1468463256', '雀巢 醇品速溶咖啡 500g/罐', '中国', '罐装', '500', '11798133', '1');
INSERT INTO `fl_prod` VALUES ('16', '37', '180', '立顿 绿茶包袋泡茶乐活绿茶三角茶包盒装S20绿茶30g/盒', '25.60', '25.60', '1000', '0', '0', '5786fc9303027.jpg', '1468464274', '立顿 绿茶包袋泡茶乐活绿茶三角茶包盒装S20绿茶30g/盒', '中国', '盒装', '30', '339538715', '1');
INSERT INTO `fl_prod` VALUES ('17', '38', '186', '香飘飘 下午茶暖12杯装7种口味 早餐冲饮咖啡', '49.00', '49.00', '1000', '0', '0', '5786ff7642edd.jpg', '1468465014', '香飘飘 下午茶暖12杯装7种口味 早餐冲饮咖啡', '中国', '盒装', '1000', '490853093', '1');
INSERT INTO `fl_prod` VALUES ('18', '39', '71', '永和豆浆 350g经典原味纯豆浆粉低甜未添加蔗糖早餐豆奶粉速溶冲饮', '10.80', '10.80', '1000', '0', '0', '578700e8082c4.jpg', '1468465383', '永和豆浆 350g经典原味纯豆浆粉低甜未添加蔗糖早餐豆奶粉速溶冲饮', '中国', '袋装', '350', '507451072', '0');
INSERT INTO `fl_prod` VALUES ('19', '40', '187', 'Kellogg\'s家乐氏 谷维滋 310g 泰国进口', '26.80', '26.80', '800', '0', '0', '57870291818fe.jpg', '1468465809', 'Kellogg\'s家乐氏 谷维滋 310g 泰国进口', '泰国', '盒装', '310', '73953307', '0');
INSERT INTO `fl_prod` VALUES ('20', '8', '70', '新农哥 芝麻核桃黑豆粉520g 熟现磨 核桃粉 干吃儿童五谷杂粮粉代餐粉 新品', '69.00', '69.00', '500', '0', '0', '5787039629268.jpg', '1468466070', '新农哥 芝麻核桃黑豆粉520g 熟现磨 核桃粉 干吃儿童五谷杂粮粉代餐粉 新品', '中国', '罐装', '520', '525982085', '0');
INSERT INTO `fl_prod` VALUES ('21', '41', '193', '高乐高 香浓巧克力味可可粉1000g/袋 高乐高巧克力粉儿童早餐冲饮品', '49.90', '49.90', '1500', '0', '0', '57870654789bd.jpg', '1468466772', '高乐高 香浓巧克力味可可粉1000g/袋 高乐高巧克力粉儿童早餐冲饮品', '中国', '袋装', '1000', '272157730', '0');
INSERT INTO `fl_prod` VALUES ('22', '42', '200', 'BlueDiamond 蓝钻石牌 日式芥末味扁桃仁 170g 美国进口', '29.90', '29.90', '1000', '0', '0', '57870b229a1a2.jpg', '1468468002', 'BlueDiamond 蓝钻石牌 日式芥末味扁桃仁 170g 美国进口', '美国', '罐装', '170', '261729446', '1');
INSERT INTO `fl_prod` VALUES ('23', '7', '212', '楼兰蜜语 薄皮椒盐巴旦木215g*2包(原大杏仁) 零食坚果特产', '32.90', '32.90', '1500', '0', '0', '57870c5c1a400.jpg', '1468468316', '楼兰蜜语 薄皮椒盐巴旦木215g*2包(原大杏仁) 零食坚果特产', '中国', '袋装', '430', '55183749', '1');
INSERT INTO `fl_prod` VALUES ('24', '34', '201', '来伊份 本色开心果250gX2袋 休闲坚果零食无漂白', '67.60', '67.60', '3000', '0', '0', '57870dab9ad93.jpg', '1468468651', '来伊份 本色开心果250gX2袋 休闲坚果零食无漂白', '中国', '袋装', '500', '473088674', '1');
INSERT INTO `fl_prod` VALUES ('25', '43', '207', '洽洽 手剥巴西松子120g*2袋 特级进口开口 薄壳易剥 坚果干货 休闲零食', '59.90', '59.90', '5000', '0', '0', '57871972e749c.jpg', '1468471666', '洽洽 手剥巴西松子120g*2袋 特级进口开口 薄壳易剥 坚果干货 休闲零食', '中国', '袋装', '120', '446490762', '0');
INSERT INTO `fl_prod` VALUES ('26', '5', '214', '百草味 碧根果218g*2袋奶油味 坚果特产', '30.90', '30.90', '2500', '0', '0', '57871bc2ded80.jpg', '1468472258', '百草味 碧根果218g*2袋奶油味 坚果特产 休闲零食 干果 炒货 长寿果/美国山核桃', '中国', '袋装', '436', '18860054', '0');
INSERT INTO `fl_prod` VALUES ('27', '3', '213', '良品铺子 夏威夷果280g*2袋奶香味', '33.90', '33.90', '3000', '0', '0', '57871d3005705.jpg', '1468472623', '良品铺子 夏威夷果280g*2袋奶香味 澳洲夏果 坚果干果 特产 休闲零食', '中国', '袋装', '560', '49661996', '0');
INSERT INTO `fl_prod` VALUES ('28', '4', '215', '三只松鼠 盐焗腰果185gx2袋零食坚果干果炒货特产腰果仁', '38.90', '38.90', '2000', '0', '0', '57871f034d5e3.jpg', '1468473091', '三只松鼠 盐焗腰果185gx2袋零食坚果干果炒货特产腰果仁', '中国', '袋装', '370', '73238412', '0');
INSERT INTO `fl_prod` VALUES ('29', '45', '162', '蜀道香 麻辣章鱼足片 88g/袋', '39.90', '39.90', '1000', '0', '0', '57872d673ba1c.jpg', '1468476775', '蜀道香 麻辣章鱼足片 88g/袋', '中国', '袋装', '250', '269420862', '0');
INSERT INTO `fl_prod` VALUES ('30', '44', '150', '科尔沁KERCHIN 手撕风干牛肉干250g', '59.90', '59.90', '1000', '0', '0', '57872fda007b3.jpg', '1468477401', '科尔沁KERCHIN 手撕风干牛肉干250g 内蒙古特产风干牛肉干 休闲零食肉干牛肉丝原味', '中国', '袋装', '250', '443727444', '1');
INSERT INTO `fl_prod` VALUES ('31', '26', '216', '全聚德 烤鸭套装北京烤鸭饼甜面酱套装1300g五香口味 北京特产', '98.00', '98.00', '500', '0', '0', '578731105bc7b.jpg', '1468477712', '全聚德 烤鸭套装北京烤鸭饼甜面酱套装1300g五香口味 北京特产', '中国', '袋装', '1300', '198430125', '0');
INSERT INTO `fl_prod` VALUES ('32', '7', '148', '楼兰蜜语 新疆阿克苏薄皮大核桃500g*2包', '43.90', '43.90', '1500', '0', '0', '57873d3fdab8f.jpg', '1468480831', '楼兰蜜语 新疆阿克苏薄皮大核桃500g*2包 原味坚果干货 生核桃 特产零食', '中国', '袋装', '1000', '351670514', '1');
INSERT INTO `fl_prod` VALUES ('33', '47', '217', '邮丹 高邮咸鸭蛋 咸蛋 65g*16枚真空包装', '33.80', '33.80', '1300', '0', '0', '57873ed41cd89.jpg', '1468481236', '邮丹 高邮咸鸭蛋 咸蛋 65g*16枚真空包装 熟 高邮地方特产 出油 下饭菜 实惠装', '中国', '盒装', '1040', '490314879', '1');
INSERT INTO `fl_prod` VALUES ('34', '2', '169', '好想你 【买一送一】218g核桃夹心枣', '36.80', '36.80', '2000', '0', '0', '57873fbcab3df.jpg', '1468481468', '好想你 【买一送一】枣夹核桃 红枣夹核桃仁218g核桃夹心枣和田枣夹核桃', '中国', '袋装', '218', '538725483', '0');
INSERT INTO `fl_prod` VALUES ('35', '48', '218', '莫龙 香辣蟹钳260g野生蟹钳大蟹脚', '19.90', '19.90', '1500', '0', '1', '578c474456ea9.jpg', '1468811077', '莫龙 香辣蟹钳260g野生蟹钳大蟹脚梭子蟹脚即食蟹宁波海鲜特产螃蟹类制品螃蟹腿', '中国', '罐装', '260', '549359946', '0');
INSERT INTO `fl_prod` VALUES ('36', '29', '117', 'Orion 好丽友 薯愿 三连罐 312g/组（104g*3 薯片）', '18.90', '18.90', '1000', '0', '0', '5792e2136ad06.jpg', '1469243923', 'Orion 好丽友 薯愿 三连罐 312g/组（104g*3 薯片）', '中国', '盒装', '410', '495359', '0');
INSERT INTO `fl_prod` VALUES ('37', '1', '117', '乐事缤纷美味礼盒 零食大礼包 490g', '39.90', '39.90', '3000', '0', '0', '5792e2de1e69c.jpg', '1469244126', '乐事缤纷美味薯片礼盒 零食大礼包 490g', '中国', '盒装', '490', '2729817', '0');
INSERT INTO `fl_prod` VALUES ('41', '14', '115', '【口水娃】新货薯片300g*2袋', '29.90', '29.90', '2000', '0', '0', '5792e6487cbcb.jpg', '1469245000', '【口水娃】新货薯片300g*2袋', '中国', '袋装', '600', '1178131012', '0');
INSERT INTO `fl_prod` VALUES ('42', '29', '118', '【京东超市】Orion 好丽友 好友趣加勒比烤翅味 75g/袋', '5.20', '5.20', '5000', '0', '0', '5792e7d9ee7a8.jpg', '1469245401', '【京东超市】Orion 好丽友 好友趣加勒比烤翅味薯片 75g/袋', '中国', '袋装', '75', '1145405', '0');
INSERT INTO `fl_prod` VALUES ('43', '32', '18', '费列罗巧克力礼盒DIY玫瑰花礼盒装 生日礼物 表白礼物七夕情人节礼物', '69.90', '69.90', '3000', '0', '0', '57945c3445e76.jpg', '1469340724', '费列罗巧克力礼盒DIY玫瑰花礼盒装 生日礼物 表白礼物七夕情人节礼物', '意大利', '盒装', '500', '1322924108', '0');
INSERT INTO `fl_prod` VALUES ('44', '30', '176', '马来西亚进口 TATAWA 迷你熊猫饼干 巧克力香蕉味 120g', '6.90', '6.90', '5000', '0', '0', '57945e2382e62.jpg', '1469341219', '马来西亚进口 TATAWA 迷你熊猫饼干 巧克力香蕉味 120g', '马来西亚', '袋装', '120', '1311502', '0');
INSERT INTO `fl_prod` VALUES ('45', '1', '220', '乐事（Lay’s）薯片 黄瓜味 145g', '10.90', '10.90', '5000', '0', '0', '57947c040880c.jpg', '1469348867', '乐事（Lay’s）薯片 黄瓜味 145g', '中国', '袋装', '145', '2410251', '0');
INSERT INTO `fl_prod` VALUES ('46', '1', '118', '乐事（Lay\'s）大波浪薯片 香脆烤鸡翅味 145g', '11.90', '11.90', '5000', '0', '0', '57947d15df585.jpg', '1469349141', '乐事（Lay\'s）大波浪薯片 香脆烤鸡翅味 145g', '中国', '袋装', '145', '2165573', '0');
INSERT INTO `fl_prod` VALUES ('47', '29', '115', 'orion 好丽友 薯愿 薯片香烤原味 104g 桶装', '8.30', '8.30', '104', '0', '0', '57947e117dc4b.jpg', '1469349393', 'orion 好丽友 薯愿 薯片香烤原味 104g 桶装', '中国', '袋装', '104', '384257', '0');
INSERT INTO `fl_prod` VALUES ('48', '5', '115', '百草味 休闲零食 薯片薯条原味90g/袋', '9.90', '9.90', '3000', '0', '0', '57947f1286872.jpg', '1469349650', '百草味 休闲零食 薯片薯条原味90g/袋', '中国', '袋装', '104', '2117567', '0');
INSERT INTO `fl_prod` VALUES ('49', '53', '116', '盼盼艾比利薯片香辣味/番茄味/原味/烧烤味休闲零食独立小包 60g原味', '3.80', '3.80', '5000', '0', '0', '57948bbf07554.jpg', '1469352894', '盼盼艾比利薯片香辣味/番茄味/原味/烧烤味休闲零食独立小包 60g原味', '中国', '袋装', '60', '1805316042', '0');
INSERT INTO `fl_prod` VALUES ('50', '43', '115', '洽洽 薯片薯脆 喀吱脆 组合装408g/盒（51g*8）', '19.90', '19.90', '6000', '0', '0', '57948ca8b5f79.jpg', '1469353128', '洽洽 薯片薯脆 喀吱脆 组合装408g/盒（51g*8）', '中国', '盒装', '408', '1967493', '0');
INSERT INTO `fl_prod` VALUES ('51', '4', '220', '【三只松鼠_小贱脆薯100gx1袋】休闲零食膨化食品小吃薯片番茄/原味 番茄味', '19.90', '19.90', '5000', '0', '0', '57948ec250c35.jpg', '1469353666', '【三只松鼠_小贱脆薯100gx1袋】休闲零食膨化食品小吃薯片番茄/原味 番茄味', '中国', '袋装', '100', '2147483647', '0');
INSERT INTO `fl_prod` VALUES ('52', '34', '221', '来伊份 脆薯薯牛排味 40g 薯条土豆薯片', '4.80', '4.80', '5000', '0', '0', '579490636bbda.jpg', '1469354083', '来伊份 脆薯薯牛排味 40g 薯条土豆薯片', '中国', '袋装', '40', '2147483647', '0');
INSERT INTO `fl_prod` VALUES ('53', '5', '160', '百草味 海鲜零食特产 风琴鱿鱼片80g/袋 休闲小吃 手撕鱿鱼丝', '16.90', '16.90', '5000', '0', '0', '579ab772ef0ea.jpg', '1469757298', '百草味 海鲜零食特产 风琴鱿鱼片80g/袋 休闲小吃 手撕鱿鱼丝', '中国', '袋装', '80', '1278110', '0');

-- ----------------------------
-- Table structure for `fl_ret`
-- ----------------------------
DROP TABLE IF EXISTS `fl_ret`;
CREATE TABLE `fl_ret` (
  `ret_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ret_feel` varchar(255) DEFAULT NULL,
  `ret_tot` float(10,2) DEFAULT NULL,
  `ret_date` int(11) DEFAULT NULL,
  `ret_prod_id` int(11) DEFAULT NULL,
  `ret_price` float(10,2) DEFAULT NULL,
  `ret_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`ret_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_ret
-- ----------------------------

-- ----------------------------
-- Table structure for `fl_site`
-- ----------------------------
DROP TABLE IF EXISTS `fl_site`;
CREATE TABLE `fl_site` (
  `site_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_custom_id` int(11) DEFAULT NULL,
  `site_area` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_content` varchar(255) DEFAULT NULL,
  `site_tel` varchar(255) DEFAULT NULL,
  `site_zip` int(6) DEFAULT NULL,
  `site_m` enum('site','0') DEFAULT '0',
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fl_site
-- ----------------------------
INSERT INTO `fl_site` VALUES ('4', '1', '山西省 阳泉市 矿区', '爱仕达', '扬成路126号', '13945687534', '140303', 'site');
INSERT INTO `fl_site` VALUES ('6', '7', '河南省 郑州市 高新区', '梁冬九', 'adsfasdf', '15890672587', '410109', 'site');
INSERT INTO `fl_site` VALUES ('9', '5', '广东省 深圳市 福田区', '梁冬九', '123456', '15890672587', '440304', 'site');
INSERT INTO `fl_site` VALUES ('28', '2', '浙江省 舟山市 岱山县', '梁冬九', '岱山路189号', '15890672587', '330921', 'site');
INSERT INTO `fl_site` VALUES ('29', '2', '山西省 晋城市 阳城县', '梁冬九', '扬成路126号', '15890672587', '140522', '0');
INSERT INTO `fl_site` VALUES ('30', '3', '内蒙古 通辽市 库伦旗', '碎卡机', '库仑区123', '13625251566', '150524', 'site');
INSERT INTO `fl_site` VALUES ('31', '4', '吉林省 四平市 梨树县', '点的', '梨树县123', '15815154615', '220322', 'site');
INSERT INTO `fl_site` VALUES ('32', '6', '广东省 茂名市 电白县', '梁冬九', '电白路127号', '15890672587', '440923', 'site');
