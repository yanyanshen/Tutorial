/*
Navicat MySQL Data Transfer

Source Server         : 我的数据库
Source Server Version : 50521
Source Host           : localhost:3306
Source Database       : ebook

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-07-29 15:52:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ebook_access`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_access`;
CREATE TABLE `ebook_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`,`node_id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_access
-- ----------------------------
INSERT INTO `ebook_access` VALUES ('4', '17', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '16', '2', null);
INSERT INTO `ebook_access` VALUES ('4', '15', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '14', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '7', '2', null);
INSERT INTO `ebook_access` VALUES ('4', '21', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '19', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '18', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '11', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '10', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '9', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '4', '3', null);
INSERT INTO `ebook_access` VALUES ('5', '17', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '3', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '16', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '15', '3', null);
INSERT INTO `ebook_access` VALUES ('5', '7', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '19', '3', null);
INSERT INTO `ebook_access` VALUES ('5', '11', '3', null);
INSERT INTO `ebook_access` VALUES ('4', '1', '1', null);
INSERT INTO `ebook_access` VALUES ('6', '1', '1', null);
INSERT INTO `ebook_access` VALUES ('6', '7', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '9', '3', null);
INSERT INTO `ebook_access` VALUES ('5', '3', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '1', '1', null);
INSERT INTO `ebook_access` VALUES ('4', '22', '2', null);
INSERT INTO `ebook_access` VALUES ('4', '23', '3', null);
INSERT INTO `ebook_access` VALUES ('5', '22', '2', null);
INSERT INTO `ebook_access` VALUES ('5', '23', '3', null);
INSERT INTO `ebook_access` VALUES ('6', '14', '3', null);
INSERT INTO `ebook_access` VALUES ('6', '15', '3', null);
INSERT INTO `ebook_access` VALUES ('8', '14', '3', null);
INSERT INTO `ebook_access` VALUES ('8', '7', '2', null);
INSERT INTO `ebook_access` VALUES ('8', '1', '1', null);
INSERT INTO `ebook_access` VALUES ('8', '15', '3', null);

-- ----------------------------
-- Table structure for `ebook_category`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_category`;
CREATE TABLE `ebook_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL COMMENT '父id',
  `catename` varchar(30) NOT NULL COMMENT '分类名',
  `is_show` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_category
-- ----------------------------
INSERT INTO `ebook_category` VALUES ('11', '0', '人文社科', '1');
INSERT INTO `ebook_category` VALUES ('12', '11', '国学', '1');
INSERT INTO `ebook_category` VALUES ('13', '11', '哲学', '1');
INSERT INTO `ebook_category` VALUES ('14', '12', '经部', '1');
INSERT INTO `ebook_category` VALUES ('15', '12', '史部', '1');
INSERT INTO `ebook_category` VALUES ('16', '12', '子部', '1');
INSERT INTO `ebook_category` VALUES ('17', '13', '马列主义', '1');
INSERT INTO `ebook_category` VALUES ('18', '13', '世界哲学', '1');
INSERT INTO `ebook_category` VALUES ('19', '13', '哲学理论', '1');
INSERT INTO `ebook_category` VALUES ('20', '0', '文学艺术', '1');
INSERT INTO `ebook_category` VALUES ('21', '20', '小说', '1');
INSERT INTO `ebook_category` VALUES ('22', '20', '传记', '1');
INSERT INTO `ebook_category` VALUES ('23', '21', '武侠', '1');
INSERT INTO `ebook_category` VALUES ('24', '21', '修真', '1');
INSERT INTO `ebook_category` VALUES ('25', '21', '科幻', '1');
INSERT INTO `ebook_category` VALUES ('26', '22', '人物传记', '1');
INSERT INTO `ebook_category` VALUES ('27', '22', '军事家', '1');
INSERT INTO `ebook_category` VALUES ('28', '22', '科学家', '1');
INSERT INTO `ebook_category` VALUES ('29', '0', '经济法律', '1');
INSERT INTO `ebook_category` VALUES ('30', '29', '经济', '1');
INSERT INTO `ebook_category` VALUES ('31', '29', '法律', '1');
INSERT INTO `ebook_category` VALUES ('32', '30', '经济学理论', '1');
INSERT INTO `ebook_category` VALUES ('33', '30', '中国经济', '1');
INSERT INTO `ebook_category` VALUES ('34', '30', '世界经济', '1');
INSERT INTO `ebook_category` VALUES ('35', '31', '法律法规', '1');
INSERT INTO `ebook_category` VALUES ('36', '31', '司法制度', '1');
INSERT INTO `ebook_category` VALUES ('37', '31', '刑事案例', '1');
INSERT INTO `ebook_category` VALUES ('38', '0', '少儿图书', '1');
INSERT INTO `ebook_category` VALUES ('39', '38', '亲子读物', '1');
INSERT INTO `ebook_category` VALUES ('40', '39', '低幼读物', '1');
INSERT INTO `ebook_category` VALUES ('41', '39', '启蒙认知', '1');
INSERT INTO `ebook_category` VALUES ('42', '39', '动漫世界', '1');
INSERT INTO `ebook_category` VALUES ('43', '38', '少儿百科', '1');
INSERT INTO `ebook_category` VALUES ('44', '43', '生活启蒙', '1');
INSERT INTO `ebook_category` VALUES ('45', '43', '传统文化', '1');
INSERT INTO `ebook_category` VALUES ('46', '43', '科普文化', '1');
INSERT INTO `ebook_category` VALUES ('47', '0', '科学技术', '1');
INSERT INTO `ebook_category` VALUES ('48', '47', '科普读物', '1');
INSERT INTO `ebook_category` VALUES ('49', '48', '动物', '1');
INSERT INTO `ebook_category` VALUES ('50', '48', '天文', '1');
INSERT INTO `ebook_category` VALUES ('51', '48', '自然灾害', '1');
INSERT INTO `ebook_category` VALUES ('52', '47', '自然科学', '1');
INSERT INTO `ebook_category` VALUES ('53', '52', '自然科学总论', '1');
INSERT INTO `ebook_category` VALUES ('54', '52', '数学', '1');
INSERT INTO `ebook_category` VALUES ('55', '52', '力学', '1');
INSERT INTO `ebook_category` VALUES ('56', '0', '电脑网络', '1');
INSERT INTO `ebook_category` VALUES ('57', '56', '计算机理论', '1');
INSERT INTO `ebook_category` VALUES ('58', '57', '计算机科学理论与基础知识', '1');
INSERT INTO `ebook_category` VALUES ('59', '57', '计算机组织与体系结构', '1');
INSERT INTO `ebook_category` VALUES ('60', '57', '硬件维护', '1');
INSERT INTO `ebook_category` VALUES ('61', '56', '数据库', '1');
INSERT INTO `ebook_category` VALUES ('62', '61', '数据库理论', '1');
INSERT INTO `ebook_category` VALUES ('63', '61', '数据库设计与管理', '1');
INSERT INTO `ebook_category` VALUES ('64', '61', '其他数据库', '1');
INSERT INTO `ebook_category` VALUES ('65', '0', '教育教材', '1');
INSERT INTO `ebook_category` VALUES ('66', '65', '教育', '1');
INSERT INTO `ebook_category` VALUES ('67', '66', '教育学理论', '1');
INSERT INTO `ebook_category` VALUES ('68', '66', '教育管理', '1');
INSERT INTO `ebook_category` VALUES ('69', '66', '世界教育事业', '1');
INSERT INTO `ebook_category` VALUES ('70', '65', '教材', '1');
INSERT INTO `ebook_category` VALUES ('71', '70', '成人教育教材', '1');
INSERT INTO `ebook_category` VALUES ('72', '70', '高职高专教材', '1');
INSERT INTO `ebook_category` VALUES ('73', '70', '中职中专教材', '1');
INSERT INTO `ebook_category` VALUES ('74', '0', '生活时尚', '1');
INSERT INTO `ebook_category` VALUES ('75', '74', '家居', '1');
INSERT INTO `ebook_category` VALUES ('76', '75', '家居装潢', '1');
INSERT INTO `ebook_category` VALUES ('77', '75', '家庭园艺', '1');
INSERT INTO `ebook_category` VALUES ('78', '75', '宠物', '1');
INSERT INTO `ebook_category` VALUES ('79', '74', '旅游', '1');
INSERT INTO `ebook_category` VALUES ('80', '79', '华夏览胜', '1');
INSERT INTO `ebook_category` VALUES ('81', '79', '异国风情', '1');
INSERT INTO `ebook_category` VALUES ('82', '79', '旅游随笔', '1');
INSERT INTO `ebook_category` VALUES ('83', '0', '男生热搜', '1');
INSERT INTO `ebook_category` VALUES ('84', '83', '灵异', '1');
INSERT INTO `ebook_category` VALUES ('85', '84', '半夜鬼敲门', '1');
INSERT INTO `ebook_category` VALUES ('86', '84', '大秦皇陵', '1');
INSERT INTO `ebook_category` VALUES ('87', '84', '百鬼夜行', '1');
INSERT INTO `ebook_category` VALUES ('88', '83', '玄幻', '1');
INSERT INTO `ebook_category` VALUES ('89', '88', '遮天', '1');
INSERT INTO `ebook_category` VALUES ('90', '88', '长生界', '1');
INSERT INTO `ebook_category` VALUES ('91', '88', '完美世界', '1');
INSERT INTO `ebook_category` VALUES ('92', '88', '大主宰', '1');
INSERT INTO `ebook_category` VALUES ('93', '0', '女生热搜', '1');
INSERT INTO `ebook_category` VALUES ('94', '93', '青春', '1');
INSERT INTO `ebook_category` VALUES ('95', '94', '十五年等待候鸟', '1');
INSERT INTO `ebook_category` VALUES ('96', '94', '夏至未至', '1');
INSERT INTO `ebook_category` VALUES ('97', '94', '悲伤逆流成河', '1');
INSERT INTO `ebook_category` VALUES ('98', '93', '校园', '1');
INSERT INTO `ebook_category` VALUES ('99', '98', '最好的我们', '1');
INSERT INTO `ebook_category` VALUES ('100', '98', '致青春', '1');
INSERT INTO `ebook_category` VALUES ('101', '98', '匆匆那年', '1');
INSERT INTO `ebook_category` VALUES ('102', '84', '盗墓笔记', '1');
INSERT INTO `ebook_category` VALUES ('103', '12', '百家', '0');

-- ----------------------------
-- Table structure for `ebook_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_goods`;
CREATE TABLE `ebook_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(255) NOT NULL,
  `number` int(11) unsigned NOT NULL DEFAULT '150',
  `cid` smallint(10) unsigned DEFAULT '11',
  `marketprice` int(10) unsigned DEFAULT '0',
  `price` int(11) unsigned DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `issale` tinyint(1) unsigned DEFAULT '1',
  `isrecyle` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_goods
-- ----------------------------
INSERT INTO `ebook_goods` VALUES ('98', '《我的第一本地理启蒙书》', '20', '41', '25', '20', '5798115d869b5.jpg', '<h2><span>给孩子妙趣横生的地理启蒙：从身边的东西南北，到脚下这片土地，再到我们圆滚滚的地球。好玩、实用的地理常识，由近及远的探索，让孩子从小会认路、懂旅行，打开眼界，看得更高、更远！</span></h2>', '1', '0');
INSERT INTO `ebook_goods` VALUES ('99', '《十万个为什么》', '30', '40', '30', '25', '579811c678ef7.jpg', '为了满足小学生的求知欲和好奇心，向他们普及基本的科学知识，提高他们的素质，我们组织了一批科普作家和画家，用图文并茂的艺术形式，编写了这一套《21世纪小学生十万个为什么》丛书。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('100', '《八万四千问》', '30', '11', '30', '25', '5798120df28a1.jpg', '宗萨蒋扬钦哲仁波切四年来首部作品“佛法能够解决你们的所有问题”.', '1', '0');
INSERT INTO `ebook_goods` VALUES ('101', '《林清玄散文精选》', '20', '11', '25', '20', '579812cc0e3c8.jpg', '二十万畅销书《林清玄散文精选》同系列作品，专为青少年打造；林清玄爱与智慧的散文精华合集，收录其全新作品；作者亲自作序揭露自己的心灵成长历程，以给年轻人激励与力量。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('102', '《以客户为中心》', '20', '11', '23', '20', '5798134e398ee.jpg', '怎么成长为一家*的高科技企业？怎么管理一家*的高科技企业？怎么不断为客户创造价值使企业长期有效增长？这是摆在中国高科技企业面前的重要课题。本书的出版，将使读者了解华为是怎样一一应对挑战的，将有助于社会各界认同你。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('103', '《字白书》', '20', '74', '30', '25', '57981410e8e27.jpg', '本书作者Jansoon以兴趣为动力，以爱好为灵感，赋予单纯的字体以质感、画面感，甚至每个字体都有故事，不同的人用不同的情感和情绪去观赏这些字，都\r\n可以寻找到属于自己的故事和画面。书中的字体以炫酷效果为主，打破常规又合情合理，让人眼前一亮。随书附赠书中所有案例的素材和源文件，另外，为了让读者\r\n可以直观地感受字体。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('104', '《自在独行》', '20', '20', '25', '20', '579815b541e6f.jpg', '贾平凹执笔40年高水准散文精粹，研磨孤独，收获自在，致每个孤独的行路人。★【我们该怎样呵护内心的孤独与焦虑？】：一个自在独行者的文字，完美展现了个人与世界相处之妙。从孤独、行走、生死、慈悲、玩物、天地、人', '1', '0');
INSERT INTO `ebook_goods` VALUES ('105', '《战天京》', '20', '103', '30', '25', '57981613a88a0.jpg', '作者谭伯牛，目前极具大众知名度和市场号召力的曾国藩研究者。	一部前所未有的晚清人物评著，鲜活再现了以曾国藩、李鸿章、左宗棠为代表的晚清军政名人。	全面增订、精细校订、全新装帧、精装典藏。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('106', '《谁偷走了我的客户》', '20', '30', '22', '20', '5798166b82f29.jpg', '入选哈佛商学院精选书单◎1300位CEO集体推荐◎全球12个语言版本◎前IBM全球服务和客户价值管理咨询总裁哈维•汤普森代表作◎全书用20个经典案例告诉你如何识别并留住高利润、高价值客户，如何减少5%~10%的客户流失率。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('107', '《天才在左，疯子在右》', '20', '21', '30', '25', '579816e03c8e4.jpg', '5年前，一本默默无闻的书一经出版便迅速占据各大图书排行榜首。《天才在左疯子在右》，没有浮夸的修辞，没有繁复的文体，简简单单的对话形式，却在5年间以百万余册的畅销量级，撼动了所有人自以为稳固的世界观。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('108', '《标准日本语》', '20', '72', '23', '20', '57981761554ec.jpg', '《中日交流标准日本语（初级上下）（附光盘）——新版中央人民广播电台教学节目用书》,点击进入：《中日交流标准日本语(初级)  上下》,点击进入：《中日交流标准日本语（中级上、下）》,点击进入：《中日交流标准日本语词汇例', '1', '0');
INSERT INTO `ebook_goods` VALUES ('109', '《美国经典专注力培养大书》', '20', '40', '24', '20', '579817eca5225.jpg', '●每一页都好玩！●总销量逾10亿册 的3-9岁儿童专注力培养著名阅读品牌●精准有效的进阶设计：帮助孩子持续提升专注力！让孩子的专注力在游戏中得到迅速提升：●全美畅销66年，总销量超10亿册美国教育工作者数十年悉心研究', '1', '0');
INSERT INTO `ebook_goods` VALUES ('110', '《青春奇妙物语》', '20', '96', '25', '20', '57981b3dd9852.jpg', '拒绝套路，满满诚意！期待度NO.1奇幻校园小说《青春奇妙物语》第4季，2016年6月重磅回归！微博当红段子手 超人气作家 \r\n两色风景重返“415”「少男时代」，寻找10个臭男人的正确打开方式？！脑洞突破天际，吐槽直接地气，谜之感动的「损」友日常！有梗、有趣、有温度', '1', '0');
INSERT INTO `ebook_goods` VALUES ('111', '《我与世界只差一个你》', '20', '97', '25', '20', '57981bf27198a.jpg', '「一个」app人气冠军，90后实力写作者，继年度畅销书《你是**的自己》后，张皓宸全新力作，带来温暖人心的个人故事集。12个温馨治愈的情感故事，给年轻人爱的正能量和信心。电影版权火热接洽中，不久的将来你将会在大屏幕上再次与这些故事相逢。&nbsp;', '1', '0');
INSERT INTO `ebook_goods` VALUES ('112', '《神探夏洛克》', '20', '95', '25', '20', '57981c678be3c.jpg', '1、**正版授权：本书中文简体版由BBC与Woodlands图书正式授权出版。《神探夏洛克》官方**指南。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('113', '《南烟斋笔录》', '20', '99', '21', '20', '57981d08c12a9.jpg', '南烟斋笔录-子夜歌》+《南烟斋笔录-花间意》套装诚意呈现！体会非一般的中国风情怀！如青花瓷般的水墨画风，韵味十足，古典风雅！夏天岛新锐漫画组合左小翎、壳小杀倾心力作！ &nbsp; &nbsp;&nbsp;', '1', '0');
INSERT INTO `ebook_goods` VALUES ('114', '《我不是完美小孩》', '20', '100', '25', '20', '57981d67555b2.jpg', '*喜欢“完美的秘密大家都知道”那一节。头上的小鸟能告诉郝完美好多有意思的故事，关于世界。小完美的脑袋就是一切生动的发源地，头上的小鸟，可以是一切\r\n可爱的事物。听说有一只大象正在四处找寻愿意听它秘密的人，这听上去真有趣啦！秘密的重点在于诉说，完美的重点在于永远不够完美。\r\n　　关于小完美，每个人都有偏爱的桥段吧。因为她实在是太可爱啦！\r\n　　在地铁里、公车上、公园中、卧室内……在你想要', '1', '0');
INSERT INTO `ebook_goods` VALUES ('115', '《宫崎骏和他的漫画》', '20', '101', '21', '18', '57981dcb88cdd.jpg', '皮三、田晓鹏、苏静、许知远强烈推荐！ \r\n《起风了》上映后宣布息影，从此不再制作长篇动画电影。谁将成为宫崎骏的后继之人？\r\n东映动画、电视动画、二马力、吉卜力……宫崎骏在他的人生轨迹中描绘了什么？\r\n日本多位一线动画评论人深入剖析宫崎骏的思想经历、人际关系、兴趣爱好', '1', '0');
INSERT INTO `ebook_goods` VALUES ('116', '《三国演义》', '20', '25', '21', '20', '5798209e5177a.jpg', '超值推荐：蔡东藩历朝通俗演义（全21册，共11部）读《二十四史》，不如读蔡东藩，一代史家，千秋神笔！陪伴毛泽东一生的枕边书。\r\n超值推荐：唐浩明晚清三部曲（全九册）：曾国藩、杨度、张之洞，文白对照全新修订、典藏烫金版，获姚雪垠长篇历史小说奖。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('117', '《东周列国志》', '25', '25', '20', '18', '57982108e0cd2.jpg', '《东周列国志》是一部描写我国东周历史的章回体长篇历史小说，比较全面地反映了东周五百多年间列国争霸称雄的事迹。全书以古代著名史籍《左传》、《国语》、《战国策》和《史记》作为基本叙写依据，把曲折动人而又纷繁复杂的东周历史很有条理地贯穿起来。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('118', '《镜花缘》', '60', '25', '18', '16', '5798214e5004c.jpg', '李汝珍的《镜花缘》是中国古代白话小说中的著名作品，全书一百回，前半部敷演唐敖、林之洋、多九公游历海外几十个国家的见闻，于各地奇风异俗、神仙妖人和怪异之草木乌兽虫鱼等，作了有趣的描写。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('119', '《聊斋志异》', '50', '25', '25', '20', '57982198d17a3.jpg', '清代小说家蒲松龄代表作，中国古代灵异、志怪小说的集大成者。\r\n★&nbsp;收录小说近500篇，《画皮》《聂小倩》《辛十四娘》等经典篇目都出自于此。\r\n★&nbsp;看来篇篇讲的都是鬼、狐、仙、怪，其实字字都是人、情、世、态。字里行间无不饱含着作者对人生、社会的丰富体验和深刻智慧。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('120', '《儒林外史》', '52', '25', '20', '16', '579821dfe738d.jpg', '《儒林外史》是现实主义的长篇讽刺小说的典范，可与薄伽丘、塞万提斯、巴尔扎克、狄更斯等人的作品相提并论，堪称世界文学名著。\r\n\r\n2.56回本，内容全，写透当时败坏的世俗风气，寄托了作者的理想。&nbsp;', '1', '0');
INSERT INTO `ebook_goods` VALUES ('121', '《老残游记》', '25', '25', '18', '15', '57982287e470d.jpg', '人民教育出版社高二语文课本“明湖居听书”，摘录自《老残游记》王小玉说书一段。\r\n· 胡适为《老残游记》写过长文，称赞刘鹗写人写景的创新，以及成功地表达出“无形象的音乐的妙处”。\r\n· 王国维认为，《老残游记》足以与英国*水平的小说媲美。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('122', '《清凉山上》', '20', '82', '25', '20', '57982666ea391.jpg', '无论去哪里旅行，在短时间内深度感受当地不可复制的文化，往往可遇不可求。然而这本书超越了这种可能：跟随希阿荣博尊者的足迹，五台圣境的风貌和典故在尊者的一路讲述里激扬纷呈，翻开这本书，便是一场身心清凉的旅行。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('123', '《十年徒步中国》', '25', '80', '29', '20', '57982753f0f36.jpg', '本书作者准备十年，徒步行走十年，完成了个人徒步中国之旅，行走81000余公里，相当于绕地球赤道两圈，打破了徒步行走世界记录。在目前国内户外探险和徒步圈中享有盛誉，各大媒体争相采访。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('124', '《最好的时光在路上》', '31', '82', '30', '25', '579827b46eb4b.jpg', '他为什么数度放弃500强企业的工作而成为一名遁世者？\r\n　　他为什么放弃主流旅行杂志采访邀约不断的主编职位，选择做一名自费旅行者？\r\n　　他为什么认为发生在自己身上的一切都是*好的？“如果人生可以重来，我选择不做改变？', '1', '0');
INSERT INTO `ebook_goods` VALUES ('125', '《怀斯曼生存手册》', '20', '81', '20', '15', '5798280d4b536.jpg', '●此版本为《怀斯曼生存手册》**补充版。\r\n　　●全球畅销户外经典，本手册解决所有生存难题！\r\n　　●英国**原版全球畅销书，行销数百万册。\r\n　　●入选1999年中国十大好书，连续24个月荣登全国畅销书排行榜，被列为中国畅销周期*长的书。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('126', '《1000极致旅行体验》', '50', '82', '30', '25', '579828ad8ad7c.jpg', '&nbsp;Lonely Planet旅行指南——一本有态度、有资讯、高水准的旅行读物，《1000极致旅行体验》精心挑选出1000项终身难忘的旅行体验，为你收纳了世界各地的美景、美食和有趣的人文故事，包含简单而又关键的旅行信息，为你的“怦然心动”做出参考。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('128', '《我的插花日记》', '50', '77', '23', '20', '579829d9dc6de.jpg', '&nbsp;“本书作者是一线的花艺设计师，书中偏重实际操作的可行性，从花材的选择到插花的步骤都考虑到读者的实际情况；因此，不需要特殊的花材工具和专门的花艺技巧，只需要一点点巧妙的心思，就能变换着新的花样，扮靓家居每一天！让懂得生活的你轻松简单玩转花花世界。”&nbsp;', '1', '0');
INSERT INTO `ebook_goods` VALUES ('129', '《战争论》', '26', '11', '22', '20', '57982c01d2cd8.jpg', '战争论》出自克劳塞维茨之手。克劳塞维茨是德国军事理论家、军事历史学家、普鲁士将军，西方近现代军事理论的鼻祖。他根据自己的亲身经历和感受，总结以往战争特别是拿破仑战争，在此基础上著就《战争论》一书，被称作“西方兵圣”。 &nbsp;', '1', '0');
INSERT INTO `ebook_goods` VALUES ('130', '《特种作战装备》', '30', '11', '30', '25', '57982c745d42e.jpg', '&nbsp; &nbsp;从特种部队诞生至今，随着各种需要，特种部队不仅活跃于各大战场，也在城市、沿海等恐怖分子出没的地方战斗。目前，对特种部队的定义通常是：接受特别及高\r\n度强度训练的军事单位，专门执行诸如空降、侦察、渗透及反恐等特殊任务的部队。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('131', '《世界名枪》', '25', '85', '22', '20', '57982d4e633c5.jpg', '从冷兵器到热兵器，士兵手中的武器在不断革新，尤其是两次世界大战中，武器的变化更是日新月异。如今，枪械这种近距离作战的武器在战争中运用*多、*广泛，小到手枪，大到重机枪，无一不让人对其爱恨交加。在这些枪械的历史长河中，也不乏一些让人心神向往的“超级明星”', '1', '0');
INSERT INTO `ebook_goods` VALUES ('132', '《现代战机》', '25', '85', '25', '20', '57982d92335ab.jpg', '从飞机首次运用于战争到现在，已经有了上百年的发展历程。时至今日，战斗机、攻击机、轰炸机、运输机、空中加油机、侦察机、预警机、电子作战飞机、反潜巡逻机、教练机、武装直升机和无人机等各种用途的军用飞机严密分工，深深影响着现代战争的形态。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('133', '《心胜》', '54', '87', '24', '20', '57982e78341fe.jpg', '心胜》：《苦难辉煌》作者金一南首部随笔集，是作者20年来心血作品全记录。\r\n在书中，作者震撼推出全新概念——心胜——战胜对手有两次，**次在内心中。这是一本针对当下普遍存在的强势不足、弱势有余，阳刚不足、阴柔有余的风气，赋予每个人每个组织乃至整个民族以力量', '1', '0');
INSERT INTO `ebook_goods` VALUES ('134', '《超限战》', '50', '87', '23', '20', '57982ec2eef5b.jpg', '　中国人自己的军事经典、全球化时代的新战争论、西点军校学员推荐阅读书 \r\n　　【意大利】米尼上将 【法国】米歇尔将军 【中国台湾】刘振志 撰文推荐\r\n　　当代中国的孙子兵法（和平崛起的新战略）\r\n　　一语道破美军致命伤（奢华症、高技术痴）\r\n　　', '1', '0');
INSERT INTO `ebook_goods` VALUES ('136', '《追风筝的人》', '51', '94', '23', '20', '579830e69243d.jpg', '<h2><span>（快乐大本营高圆圆感动推荐，奥巴马送给女儿的新年礼物。为你，千千万万遍！</span></h2>', '1', '0');
INSERT INTO `ebook_goods` VALUES ('137', '《从你的全世界路过》', '42', '94', '29', '25', '57983144e80e1.jpg', '<h2><span>入选央视“2014中国好书”的80后作品！十年华语畅销小说，王家卫陈国富倾力推荐， 1500万次转发，超4亿次阅读，5个故事正在变成电影，每1分钟，都有人在故事里看到自己。张嘉佳，献给你的心动故事！&nbsp;</span></h2>', '1', '0');
INSERT INTO `ebook_goods` VALUES ('138', '《解忧杂货店》', '45', '94', '30', '25', '57983206355b8.jpg', '《解忧杂货店》是日本作家<a href=\"http://baike.baidu.com/view/529955.htm\" target=\"_blank\">东野圭吾</a>写作的奇幻温情小说。2011年于《小说野性时代》连载，于2012年3月由<a href=\"http://baike.baidu.com/view/875221.htm\" target=\"_blank\">角川书店</a>发行单行本。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('139', '《岛上书店》', '45', '94', '35', '30', '5798326b15519.jpg', '<div class=\"para\">《岛上书店》是2015年<a href=\"http://baike.baidu.com/view/15091651.htm\" target=\"_blank\">江苏凤凰文艺出版社</a>出版图书，作者（美）<a href=\"http://baike.baidu.com/view/634198.htm\" target=\"_blank\">加布瑞埃拉·泽文</a>。<sup>[1]</sup><a class=\"sup-anchor\" name=\"ref_[1]_19729105\">&nbsp;</a>\r\n</div><div class=\"para\">这是一本关于<a href=\"http://baike.baidu.com/view/3819897.htm\" target=\"_blank\">全世界</a>所有书的书，写给全世界所有真正爱书的人。<sup>[2]</sup><a class=\"sup-anchor\" name=\"ref_[2]_19729105\">&nbsp;</a></div>', '1', '0');
INSERT INTO `ebook_goods` VALUES ('140', '《摆渡人》', '35', '94', '23', '20', '57984db755363.jpg', '&nbsp;单亲女孩迪伦，15岁的世界一片狼藉：与母亲总是无话可说，在学校里经常受到同学的捉弄，唯一谈得来的好友也因为转学离开了。这一切都让迪伦感到无比痛苦。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;她决定去看望久未谋面的父亲，然而，路上突发交通事故。等她拼命爬出火车残骸之后，却惊恐地发现，自己是唯一的幸存者，而眼前，竟是一片荒原。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('141', '《百年孤独》', '30', '24', '23', '20', '57984f2a82ec1.jpg', '《百年孤独》，是<a href=\"http://baike.baidu.com/view/19755.htm\" target=\"_blank\">哥伦比亚</a>作家<a href=\"http://baike.baidu.com/view/37360.htm\" target=\"_blank\">加西亚·马尔克斯</a>的代表作，也是拉丁美洲<a href=\"http://baike.baidu.com/view/455935.htm\" target=\"_blank\">魔幻现实主义文学</a>的代表作，被誉为“再现拉丁美洲历史社会图景的鸿篇巨著”。作品描写了布恩迪亚家族七代人的传奇故事，以及<a href=\"http://baike.baidu.com/view/10244.htm\" target=\"_blank\">加勒比海</a>沿岸小镇马孔多的百年兴衰，反映了拉丁美洲一个世纪以来风云变幻的历史。作品融入神话传说、民间故事、宗教典故等神秘因素，巧妙地糅合了现实与虚幻，展现出一个瑰丽的想象世界，成为20世纪最重要的经典文学巨著之一。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('145', '《斗罗大陆3》', '45', '11', '44', '45', '57985be7e62cf.jpg', '经典之上,再铸传奇！\r\n《斗罗大陆》系列是唐家三少影响力较大、人气较高的代表作品，被很多人奉为“唐门经典”。\r\n《斗罗大陆第二部 绝世唐门》小说、漫画火爆热售，市场热度居高不下。\r\n此次发售作品《斗罗大陆第三部 龙王传说》是《斗罗大陆》系列的第三部，《神漫》杂志力推。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('146', '《沙海》', '35', '21', '25', '23', '5798608fb5e06.jpg', '　南派三叔的《盗墓笔记》无疑是神作，其中留下的未解谜团令读者魂牵梦萦。《沙海》作为《盗墓笔记》后传，在揭秘终极答案的同时，又加入了更多的矛盾。它的世界观比《盗墓笔记》犹有过之，甚至比之更庞大更壮阔。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('147', '《临界 爵迹》', '62', '24', '25', '22', '5798611e207f6.jpg', '在《幻城》问世十周年之际，郭敬明终于推出了个人创作生涯中的第二部奇幻题材的长篇小说《临界?爵迹》，这部继《悲伤逆流成河》与《小时代》系列之后、无论是在文学造诣还是在销量上都被寄予了极高期望的作品，早在连载的时候就显示出了强大的市场与舆论号召力。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('148', '《龙族》', '54', '24', '29', '24', '579862496947d.jpg', '当当独家首发\r\n\r\n所有人都在追看《龙族》——*经典的热血幻想小说，十年一遇，没有之一！\r\n 征途！穿越*深的地狱，而后直抵天堂！\r\n　　【东京夜雨】【黑石寒樱】【白王骨血】【鱼龙狂舞】\r\n　　被遗忘的历史，被误读的神话，葬礼与重生……皇血圣骸之战，重燃！', '1', '0');
INSERT INTO `ebook_goods` VALUES ('149', '《西游日记》', '54', '24', '30', '25', '579862c46c381.jpg', '《西游日记》——今何在**巨作，强势归来\r\n　\r\n这是一部解读古典神话的幻想巨作。《悟空传》之后，暌违十二年，今何在全新演绎西游，再创一部没有束缚、汪洋肆恣的史诗。作为今何在创作生涯中*为重要的一部作品。', '1', '0');
INSERT INTO `ebook_goods` VALUES ('151', '《九州天空城》', '54', '88', '30', '25', '57986457252eb.jpg', '年度热播剧《九州·天空城》小说，铁甲依然在！\r\n\r\n张若昀×关晓彤×SNH48鞠婧祎×陈若轩×刘畅×张鲁一\r\n领衔主演\r\nTFBOYS献声主题曲\r\n高颜值魔幻世界渐次呈现！\r\n★首部登陆荧幕的九州小说，唐缺创作三年力作！', '1', '0');

-- ----------------------------
-- Table structure for `ebook_member`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_member`;
CREATE TABLE `ebook_member` (
  `userid` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(12) DEFAULT NULL,
  `sex` enum('男','女') DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `idNumber` varchar(18) DEFAULT NULL,
  `userPic` varchar(255) DEFAULT NULL,
  `lastdate` varchar(255) DEFAULT NULL,
  `regdate` varchar(255) DEFAULT NULL,
  `islock` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_member
-- ----------------------------
INSERT INTO `ebook_member` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '张三', '男', '21', '12312341234', '123456@qq.com', '河南省郑州市高新区', '123123123412121234', '5799658bada7e.jpg', null, '1469107432', null);
INSERT INTO `ebook_member` VALUES ('2', 'wb', 'e10adc3949ba59abbe56e057f20f883e', '李四', '女', '20', '12312341235', '123456@qq.com', '河南省郑州市高新区', '46541641415314', '5799a636378ef.jpg', null, '1469149709', null);
INSERT INTO `ebook_member` VALUES ('3', 'ls', 'e10adc3949ba59abbe56e057f20f883e', '王五', '男', '25', '1451516254', '23542424@qq.com', '河南省郑州市高新区', '14254254324653645', '5799bdbb5175b.png', null, '1469172902', null);
INSERT INTO `ebook_member` VALUES ('4', 'zhj', 'e10adc3949ba59abbe56e057f20f883e', '刘六', '女', '23', '2452465256', '45641654165@qq.com', '河南省郑州市高新区', '5641561451451', '579ab8f9d2bf6.jpg', null, '1469173836', null);

-- ----------------------------
-- Table structure for `ebook_node`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_node`;
CREATE TABLE `ebook_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_node
-- ----------------------------
INSERT INTO `ebook_node` VALUES ('1', 'Admin', '后台管理', '1', null, '1', '0', '1');
INSERT INTO `ebook_node` VALUES ('3', 'Rbac', '权限管理', '1', null, '1', '1', '2');
INSERT INTO `ebook_node` VALUES ('4', 'addRole', '添加角色', '1', null, '1', '3', '3');
INSERT INTO `ebook_node` VALUES ('9', 'roleList', '角色列表', '1', null, '2', '3', '3');
INSERT INTO `ebook_node` VALUES ('7', 'Category', '分类管理', '1', null, '2', '1', '2');
INSERT INTO `ebook_node` VALUES ('10', 'addnode', '添加权限', '1', null, '3', '3', '3');
INSERT INTO `ebook_node` VALUES ('11', 'nodeList', '权限列表', '1', null, '4', '3', '3');
INSERT INTO `ebook_node` VALUES ('18', 'adduser', '添加用户', '1', null, '5', '3', '3');
INSERT INTO `ebook_node` VALUES ('19', 'userList', '用户列表', '1', null, '6', '3', '3');
INSERT INTO `ebook_node` VALUES ('14', 'categoryAdd', '添加分类', '1', null, '1', '7', '3');
INSERT INTO `ebook_node` VALUES ('15', 'categoryList', '分类列表', '1', null, '2', '7', '3');
INSERT INTO `ebook_node` VALUES ('25', 'Goods', '商品管理', '1', null, '4', '1', '2');
INSERT INTO `ebook_node` VALUES ('21', 'access', '权限分配', '1', null, '7', '3', '3');
INSERT INTO `ebook_node` VALUES ('22', 'member', '会员管理', '1', null, '3', '1', '2');
INSERT INTO `ebook_node` VALUES ('23', 'member', '会员列表', '1', null, '1', '22', '3');
INSERT INTO `ebook_node` VALUES ('26', 'goodslist', '商品列表', '1', null, '1', '25', '3');
INSERT INTO `ebook_node` VALUES ('27', 'goodsadd', '商品添加', '1', null, '2', '25', '3');

-- ----------------------------
-- Table structure for `ebook_role`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_role`;
CREATE TABLE `ebook_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_role
-- ----------------------------
INSERT INTO `ebook_role` VALUES ('4', '超级管理员', '0', '1', '');
INSERT INTO `ebook_role` VALUES ('5', '普通管理员', '0', '1', '');
INSERT INTO `ebook_role` VALUES ('8', '商品编辑', '0', '1', '商品编辑');

-- ----------------------------
-- Table structure for `ebook_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_role_user`;
CREATE TABLE `ebook_role_user` (
  `role_id` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `user_id` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `group_id` (`role_id`),
  KEY `manager_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_role_user
-- ----------------------------
INSERT INTO `ebook_role_user` VALUES ('4', '3');
INSERT INTO `ebook_role_user` VALUES ('5', '3');
INSERT INTO `ebook_role_user` VALUES ('6', '5');
INSERT INTO `ebook_role_user` VALUES ('8', '6');

-- ----------------------------
-- Table structure for `ebook_shop`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_shop`;
CREATE TABLE `ebook_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(255) NOT NULL,
  `number` int(11) unsigned NOT NULL DEFAULT '1',
  `cid` smallint(10) unsigned DEFAULT '11',
  `marketprice` int(10) unsigned DEFAULT '0',
  `price` int(11) unsigned DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `issale` tinyint(1) unsigned DEFAULT '1',
  `isrecyle` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_shop
-- ----------------------------
INSERT INTO `ebook_shop` VALUES ('167', '《我的第一本地理启蒙书》', '14', '11', '25', '20', '5798115d869b5.jpg', '<h2><span>给孩子妙趣横生的地理启蒙：从身边的东西南北，到脚下这片土地，再到我们圆滚滚的地球。好玩、实用的地理常识，由近及远的探索，让孩子从小会认路、懂旅行，打开眼界，看得更高、更远！</span></h2>', '1', '0');
INSERT INTO `ebook_shop` VALUES ('168', '《以客户为中心》', '1', '11', '23', '20', '5798134e398ee.jpg', '怎么成长为一家*的高科技企业？怎么管理一家*的高科技企业？怎么不断为客户创造价值使企业长期有效增长？这是摆在中国高科技企业面前的重要课题。本书的出版，将使读者了解华为是怎样一一应对挑战的，将有助于社会各界认同你。', '1', '0');
INSERT INTO `ebook_shop` VALUES ('169', '《天才在左，疯子在右》', '1', '11', '30', '25', '579816e03c8e4.jpg', '5年前，一本默默无闻的书一经出版便迅速占据各大图书排行榜首。《天才在左疯子在右》，没有浮夸的修辞，没有繁复的文体，简简单单的对话形式，却在5年间以百万余册的畅销量级，撼动了所有人自以为稳固的世界观。', '1', '0');
INSERT INTO `ebook_shop` VALUES ('170', '《神探夏洛克》', '1', '11', '25', '20', '57981c678be3c.jpg', '1、**正版授权：本书中文简体版由BBC与Woodlands图书正式授权出版。《神探夏洛克》官方**指南。', '1', '0');
INSERT INTO `ebook_shop` VALUES ('171', '《字白书》', '1', '11', '30', '25', '57981410e8e27.jpg', '本书作者Jansoon以兴趣为动力，以爱好为灵感，赋予单纯的字体以质感、画面感，甚至每个字体都有故事，不同的人用不同的情感和情绪去观赏这些字，都\r\n可以寻找到属于自己的故事和画面。书中的字体以炫酷效果为主，打破常规又合情合理，让人眼前一亮。随书附赠书中所有案例的素材和源文件，另外，为了让读者\r\n可以直观地感受字体。', '1', '0');

-- ----------------------------
-- Table structure for `ebook_user`
-- ----------------------------
DROP TABLE IF EXISTS `ebook_user`;
CREATE TABLE `ebook_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `logintime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(30) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ebook_user
-- ----------------------------
INSERT INTO `ebook_user` VALUES ('3', 'Admin', '202cb962ac59075b964b07152d234b70', '1469758252', '127.0.0.1', '1');
INSERT INTO `ebook_user` VALUES ('4', 'zs', '202cb962ac59075b964b07152d234b70', '1469674676', '127.0.0.1', '1');
INSERT INTO `ebook_user` VALUES ('5', 'qwwe', '202cb962ac59075b964b07152d234b70', '1469419053', '172.16.11.252', '1');
