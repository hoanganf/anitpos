# ************************************************************
# Sequel Pro SQL dump
# Version 5438
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: anit_pos
# Generation Time: 2019-04-22 16:09:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `res_id` int(11) NOT NULL DEFAULT '0',
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `name`, `res_id`, `available`)
VALUES
	(1,'A',1,'1'),
	(2,'B',1,'1'),
	(3,'C',1,'1');

/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `available` char(1) NOT NULL DEFAULT '1',
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `available`, `image`)
VALUES
	(1,'Món chiên','1','category_12.jpg'),
	(2,'Lẩu','1','category_2.jpg'),
	(3,'Hải sản','1','category_12.jpg'),
	(4,'Đồng quê','0','category_2.jpg'),
	(5,'Bia','1','category_12.jpg'),
	(6,'Nước giải khát','1','category_2.jpg'),
	(7,'Rượu','1',NULL),
	(8,'Món tráng miệng','1',NULL),
	(9,'Đồ pha chế','1','category_2.jpg');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ingredient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredient`;

CREATE TABLE `ingredient` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT '',
  `image` varchar(100) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `count` double NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;

INSERT INTO `ingredient` (`id`, `res_id`, `category_id`, `unit_id`, `name`, `description`, `image`, `available`, `count`, `price`)
VALUES
	(1,1,1,1,'Cải','',NULL,'1',64,0),
	(2,1,1,1,'Xà Lách','',NULL,'1',64,0),
	(3,1,2,2,'Ghẹ','',NULL,'1',64,0);

/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ingredient_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredient_category`;

CREATE TABLE `ingredient_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `available` char(1) NOT NULL DEFAULT '1',
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient_category` WRITE;
/*!40000 ALTER TABLE `ingredient_category` DISABLE KEYS */;

INSERT INTO `ingredient_category` (`id`, `name`, `available`, `image`, `description`)
VALUES
	(1,'Rau','1',NULL,NULL),
	(2,'Hải sản','1',NULL,NULL),
	(3,'Thịt','1',NULL,NULL),
	(4,'Cá','1',NULL,NULL),
	(5,'Trứng','1',NULL,NULL);

/*!40000 ALTER TABLE `ingredient_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ingredient_unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredient_unit`;

CREATE TABLE `ingredient_unit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient_unit` WRITE;
/*!40000 ALTER TABLE `ingredient_unit` DISABLE KEYS */;

INSERT INTO `ingredient_unit` (`id`, `name`, `available`)
VALUES
	(1,'Bó','1'),
	(2,'Con','1'),
	(3,'Quả','1');

/*!40000 ALTER TABLE `ingredient_unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table number
# ------------------------------------------------------------

DROP TABLE IF EXISTS `number`;

CREATE TABLE `number` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `number` WRITE;
/*!40000 ALTER TABLE `number` DISABLE KEYS */;

INSERT INTO `number` (`id`, `status`)
VALUES
	(1,'1'),
	(2,'1'),
	(3,'1'),
	(7,'1'),
	(5,'1'),
	(8,'0'),
	(9,'0'),
	(10,'0'),
	(11,'0'),
	(12,'0'),
	(13,'0'),
	(14,'0'),
	(15,'0'),
	(16,'0'),
	(17,'0'),
	(4,'1'),
	(6,'1'),
	(18,'0'),
	(19,'0'),
	(20,'0'),
	(21,'0'),
	(22,'0'),
	(23,'0'),
	(24,'0'),
	(25,'0'),
	(26,'0'),
	(27,'0'),
	(28,'0'),
	(29,'0'),
	(30,'0'),
	(31,'0'),
	(32,'0'),
	(33,'0'),
	(34,'0'),
	(35,'0'),
	(36,'0'),
	(37,'0'),
	(38,'0'),
	(39,'0'),
	(40,'0'),
	(41,'0'),
	(42,'0'),
	(43,'0'),
	(44,'0'),
	(45,'0'),
	(46,'0'),
	(47,'0'),
	(48,'0'),
	(49,'0'),
	(50,'0'),
	(51,'0'),
	(52,'0'),
	(53,'0'),
	(54,'0'),
	(55,'0'),
	(56,'0'),
	(57,'0'),
	(58,'0'),
	(59,'0'),
	(60,'0'),
	(61,'0'),
	(62,'0'),
	(63,'0'),
	(64,'0'),
	(65,'0'),
	(66,'0'),
	(67,'0'),
	(68,'0'),
	(69,'0'),
	(70,'0'),
	(71,'0'),
	(72,'0'),
	(73,'0'),
	(74,'0'),
	(75,'0'),
	(76,'0'),
	(77,'0'),
	(78,'0'),
	(79,'0'),
	(80,'0'),
	(81,'0'),
	(82,'0'),
	(83,'0'),
	(84,'0'),
	(85,'0'),
	(86,'0'),
	(87,'0'),
	(88,'0'),
	(89,'0'),
	(90,'0'),
	(91,'0'),
	(92,'0'),
	(93,'0'),
	(94,'0'),
	(95,'0'),
	(96,'0'),
	(97,'0'),
	(98,'0');

/*!40000 ALTER TABLE `number` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `waiter_id` varchar(50) NOT NULL DEFAULT '',
  `chef_id` varchar(50) NOT NULL DEFAULT '',
  `number_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bill_detail_id` int(11) NOT NULL DEFAULT '-1',
  `count` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL DEFAULT '',
  `order_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finish_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(1) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`id`, `waiter_id`, `chef_id`, `number_id`, `table_id`, `product_id`, `bill_detail_id`, `count`, `comments`, `order_time`, `finish_time`, `status`, `price`)
VALUES
	(351,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(350,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(349,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(348,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(347,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(346,'admin','',7,5,6,-1,1,'','2019-04-19 00:39:54','0000-00-00 00:00:00','0',90000),
	(345,'admin','',6,1,30,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',40000),
	(344,'admin','',6,1,25,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',100000),
	(343,'admin','',6,1,25,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',100000),
	(342,'admin','',6,1,25,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',100000),
	(341,'admin','',6,1,25,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',100000),
	(340,'admin','',6,1,6,-1,1,'','2019-04-19 00:39:24','0000-00-00 00:00:00','0',90000),
	(339,'admin','',2,1,6,-1,1,'','2019-01-20 17:43:38','0000-00-00 00:00:00','0',90000),
	(338,'admin','',2,1,6,-1,1,'','2019-01-20 17:43:38','0000-00-00 00:00:00','0',90000),
	(337,'admin','',2,1,6,-1,1,'','2019-01-20 17:43:38','0000-00-00 00:00:00','0',90000),
	(336,'admin','',2,1,6,-1,1,'','2019-01-20 17:43:38','0000-00-00 00:00:00','0',90000),
	(335,'admin','',2,1,6,-1,1,'','2019-01-20 17:43:38','0000-00-00 00:00:00','0',90000),
	(334,'admin','',5,2,30,-1,1,'','2019-01-20 17:42:29','0000-00-00 00:00:00','0',40000),
	(333,'admin','',5,2,25,-1,1,'','2019-01-20 17:42:29','0000-00-00 00:00:00','0',100000),
	(330,'admin','',5,2,6,-1,1,'','2019-01-20 17:42:29','0000-00-00 00:00:00','0',90000),
	(331,'admin','',5,2,25,-1,1,'','2019-01-20 17:42:29','0000-00-00 00:00:00','0',100000),
	(332,'admin','',5,2,25,-1,1,'','2019-01-20 17:42:29','0000-00-00 00:00:00','0',100000),
	(327,'admin','',4,1,6,-1,1,'','2018-08-26 22:44:21','0000-00-00 00:00:00','0',90000),
	(328,'admin','',4,1,6,-1,1,'','2018-08-26 22:44:21','0000-00-00 00:00:00','0',90000),
	(329,'admin','',4,1,6,-1,1,'Ghi chu: Ít cay,Không quá nhừ,Không quá nhừ,Không quá nhừ,Nhiều tiêu,Nhiều tiêu,Nhiều tiêu,Nhiều tiêu','2018-08-26 22:44:21','0000-00-00 00:00:00','0',90000),
	(326,'admin','',3,1,25,-1,1,'','2018-08-26 22:07:09','0000-00-00 00:00:00','0',100000),
	(325,'admin','',3,1,25,-1,1,'','2018-08-26 22:07:09','0000-00-00 00:00:00','0',100000),
	(324,'admin','',3,1,25,-1,1,'','2018-08-26 22:07:09','0000-00-00 00:00:00','0',100000),
	(318,'admin','',1,1,6,-1,1,'','2018-08-26 15:08:00','0000-00-00 00:00:00','0',90000),
	(319,'admin','',1,1,6,-1,1,'','2018-08-26 15:08:00','0000-00-00 00:00:00','0',90000),
	(320,'admin','',2,1,6,-1,1,'','2018-08-26 22:06:52','0000-00-00 00:00:00','0',90000),
	(321,'admin','',2,1,6,-1,1,'','2018-08-26 22:06:52','0000-00-00 00:00:00','0',90000),
	(322,'admin','',2,1,6,-1,1,'','2018-08-26 22:06:52','0000-00-00 00:00:00','0',90000),
	(323,'admin','',3,1,25,-1,1,'','2018-08-26 22:07:09','0000-00-00 00:00:00','0',100000);

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '',
  `default_status` char(1) NOT NULL DEFAULT '1',
  `add_count` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `name`, `category_id`, `unit_id`, `price`, `description`, `available`, `image`, `default_status`, `add_count`)
VALUES
	(1,'Canh khổ qua nhồi thịt',4,1,220000,'Món ăn đặc trưng của người miền Bắc, theo truyền thuyết ăn món này mọi đau khổ sẽ qua','1','','0',1),
	(2,'Canh chua cá lóc',4,1,50000,'Món ăn dân dã có ở khắp mọi vùng miền ở Việt Nam','1','','0',1),
	(3,'Canh riêu cua mồng tơi',4,1,80000,'Cua đồng giã nát lọc lấy nuớc riêu sau đó nấu cùng mồng tơi, thơm ngon và bổ duỡng','1','','0',1),
	(4,'Canh nghêu nấu khế/ thì là',4,9,150000,'Sự kết hợp hoàn hảo giữa vị chua của khế, vị ngọt của nghêu và mùi thơm đăc trưng của rau thì là','1','','0',1),
	(5,'Canh mồng tơi nấu tôm/ thịt băm',4,9,120000,'Thịt heo băm nhuyễn, tôm sú bóc vỏ nấu cùng rau mồng tơi','1','','0',1),
	(6,'Trứng rán thịt băm',1,9,90000,'Thịt heo nạc băm nhuyễn rán cùng với trứng gà, thơm ngon và bổ dưỡng','1','','0',1),
	(7,'Sting',6,9,20000,'Sản phẩm của Pepsi Việt Nam','1','','1',1),
	(8,'Heniken',5,9,25000,'Thương hiệu bia nổi tiếng khắp thế giới','1','','1',1),
	(9,'Cocacola',6,9,30000,'Thương hiệu nước ngọt nổi tiếng thế giới','1','','1',1),
	(10,'Larue',5,9,10000,'Sản phẩm bia chất luợng của nhà máy bia Đà Nẵng','1','','1',1),
	(11,'Vodka',7,9,260000,'Rượu đặc trưng của người Hà Nội','1','','1',1),
	(12,'Canh sườn Lagim',4,9,300000,'Canh sườn Laghim - Sườn heo hầm với bí đỏ, cà rốt và các loại rau khác','0','','0',1),
	(13,'Canh chua tôm',4,9,340000,'Tôm sú tươi bóc vỏ nấu canh chua với thơm cà. Món anh giúp giải nhiệt những ngày nắng nóng','1','','0',1),
	(14,'Canh chua cá kèo',4,9,120000,'Canh chua cá kèo - món ăn đặc trưng dân dã của người Nam bộ, giúp giải nhiệt những ngày nắng nóng','1','','0',1),
	(15,'Khăn lạnh',10,9,5000,'','1','','1',1),
	(16,'Chè sen',8,9,15000,'','1','','0',1),
	(17,'Kem plan',8,9,20000,'','1','','1',1),
	(18,'Trái cây lạnh',8,9,40000,'Cam, xoài, lê, táo, dưa hấu','1','','0',1),
	(19,'Bánh ngọt',8,9,10000,'','1','','1',1),
	(20,'Whisky',7,9,450000,'','1','','1',1),
	(21,'333',5,9,13000,'','1','','1',1),
	(22,'Sài Gòn Export (đỏ)',5,9,12000,'','1','','1',1),
	(23,'Sài Gòn Export (xanh)',5,9,10000,'','1','','1',1),
	(24,'RedBull',6,9,22000,'','1','','1',1),
	(25,'Tôm chiên xù',1,9,100000,'','1','','0',1),
	(26,'Lẩu cá lóc',2,9,120000,'','1','','0',1),
	(27,'Lẩu dê',2,9,200000,'','1','','0',1),
	(28,'Lẩu tươi sống',2,9,90000,'','1','','0',1),
	(29,'Lẩu mắm',2,9,120000,'','1','','0',1),
	(30,'Cơm chiên sốt tương',1,9,40000,'','1','','0',1),
	(31,'Gà chiên chấm tương ớt',1,9,70000,'','1','','0',1),
	(32,'Mực hấp gừng',3,9,130000,'','1','','0',1),
	(33,'Ghẹ luộc',3,9,150000,'','1','','0',1),
	(34,'Khăn giấy',10,9,3000,'','1','','1',1),
	(35,'Chivas',7,9,630000,'','1','','1',1),
	(36,'Heniken (Thùng)',5,9,25000,'Thương hiệu bia nổi tiếng khắp thế giới','1','','1',2);

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_comment`;

CREATE TABLE `product_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `product_comment` WRITE;
/*!40000 ALTER TABLE `product_comment` DISABLE KEYS */;

INSERT INTO `product_comment` (`id`, `product_id`, `name`)
VALUES
	(22,18,'Nhiều tôm'),
	(23,18,'Ít cay'),
	(24,19,'Ít ớt'),
	(25,1,'Không quá nhừ'),
	(26,2,'Cay'),
	(27,4,'Cay'),
	(28,6,'Ít dầu'),
	(29,45,'Cay'),
	(30,45,'Nhiều tiêu'),
	(31,46,'Nhiều thịt'),
	(32,47,'Nhiều nước'),
	(33,49,'Ít dầu'),
	(34,49,'Thêm canh'),
	(35,50,'Gà ta'),
	(36,45,'Ít cay'),
	(37,45,'Cho thêm chanh tươi'),
	(38,50,'Vịt ta'),
	(42,14,'Ít cay'),
	(40,19,'Cho thêm chanh tươi'),
	(43,14,'Nhiều tiêu'),
	(44,14,'Nhiều nước'),
	(45,14,'Gà ta'),
	(46,14,'Nhiều sườn'),
	(49,14,'Nhiều hành'),
	(60,14,'abc'),
	(61,11,'abc'),
	(62,44,'it hanh'),
	(63,44,'it tieu');

/*!40000 ALTER TABLE `product_comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_contruct
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_contruct`;

CREATE TABLE `product_contruct` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `count` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `product_contruct` WRITE;
/*!40000 ALTER TABLE `product_contruct` DISABLE KEYS */;

INSERT INTO `product_contruct` (`id`, `product_id`, `ingredient_id`, `count`)
VALUES
	(1,33,2,0.5),
	(2,33,3,0.5);

/*!40000 ALTER TABLE `product_contruct` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_unit`;

CREATE TABLE `product_unit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_unit` WRITE;
/*!40000 ALTER TABLE `product_unit` DISABLE KEYS */;

INSERT INTO `product_unit` (`id`, `name`, `available`)
VALUES
	(9,'Chai','1'),
	(10,'??a','1'),
	(11,'Tô','1'),
	(12,'Chén','1'),
	(13,'N?i','1'),
	(14,'Ly','1'),
	(15,'Gói','1'),
	(16,'Lon','1');

/*!40000 ALTER TABLE `product_unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stock_check_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_check_detail`;

CREATE TABLE `stock_check_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stock_check_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `count` double NOT NULL DEFAULT '0',
  `real_count` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stock_check_detail` WRITE;
/*!40000 ALTER TABLE `stock_check_detail` DISABLE KEYS */;

INSERT INTO `stock_check_detail` (`id`, `stock_check_id`, `ingredient_id`, `count`, `real_count`)
VALUES
	(1,3,1,43,43),
	(2,3,2,54,54),
	(3,4,1,49,49),
	(4,4,2,45,45),
	(5,5,1,22.5,22.5),
	(6,5,2,49,49),
	(7,6,1,22.5,22),
	(8,6,2,49,48),
	(9,6,3,96.5,96),
	(10,7,1,22.5,22),
	(11,7,2,49,48),
	(12,7,3,96.5,96),
	(13,8,1,49,49),
	(14,8,2,45,45),
	(15,9,1,22.5,22),
	(16,9,2,49,48),
	(17,9,3,96.5,96),
	(18,12,1,22,0),
	(19,12,2,45,0),
	(20,12,3,94,0),
	(21,13,1,22,0),
	(22,13,2,45,0),
	(23,13,3,94,0),
	(24,14,1,100,0),
	(25,14,2,150,0),
	(26,14,3,200,0),
	(27,15,1,100,0),
	(28,15,2,150,0),
	(29,15,3,200,0),
	(30,17,1,100,0),
	(31,17,2,150,0),
	(32,17,3,200,0),
	(33,18,1,22,100),
	(34,18,2,34,150),
	(35,18,3,150,200),
	(36,19,1,100,22),
	(37,19,2,150,50),
	(38,19,3,200,50),
	(39,20,1,50026,50),
	(40,20,2,50054,50),
	(41,20,3,50054,50);

/*!40000 ALTER TABLE `stock_check_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stock_check_report
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_check_report`;

CREATE TABLE `stock_check_report` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL DEFAULT '',
  `check_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stock_check_report` WRITE;
/*!40000 ALTER TABLE `stock_check_report` DISABLE KEYS */;

INSERT INTO `stock_check_report` (`id`, `user_id`, `check_date`)
VALUES
	(3,'admin','2018-06-24 22:09:42'),
	(4,'admin','2018-06-24 22:31:54'),
	(5,'admin','2018-06-24 23:14:34'),
	(6,'admin','2018-06-24 23:17:16'),
	(7,'admin','2018-06-24 23:24:35'),
	(8,'admin','2018-06-24 23:27:07'),
	(9,'admin','2018-06-24 23:28:04'),
	(12,'admin','2018-06-24 23:57:27'),
	(13,'admin','2018-06-24 23:58:29'),
	(14,'admin','2018-06-25 00:10:53'),
	(15,'admin','2018-06-25 00:16:29'),
	(17,'admin','2018-06-25 00:17:52'),
	(18,'admin','2018-06-25 00:18:30'),
	(19,'admin','2018-06-25 00:20:38'),
	(20,'admin','2018-06-26 00:14:34');

/*!40000 ALTER TABLE `stock_check_report` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stock_discard
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_discard`;

CREATE TABLE `stock_discard` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL DEFAULT '',
  `ingredient_id` int(11) NOT NULL,
  `count` double NOT NULL,
  `discard_date` datetime NOT NULL,
  `description` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stock_discard` WRITE;
/*!40000 ALTER TABLE `stock_discard` DISABLE KEYS */;

INSERT INTO `stock_discard` (`id`, `user_id`, `ingredient_id`, `count`, `discard_date`, `description`)
VALUES
	(4,'admin',1,0.5,'2018-06-24 21:31:59','bi hu'),
	(5,'admin',1,5,'2018-06-24 22:28:38','abc'),
	(6,'admin',1,0.5,'2018-06-24 23:02:52','did me'),
	(7,'admin',2,0.5,'2018-06-24 23:02:52','did me'),
	(8,'admin',1,0.5,'2018-06-24 23:03:37','did me'),
	(9,'admin',2,0.5,'2018-06-24 23:03:37','did me'),
	(10,'admin',1,0.5,'2018-06-24 23:04:48','did me'),
	(11,'admin',2,0.5,'2018-06-24 23:04:48','did me'),
	(12,'admin',2,0.5,'2018-06-24 23:06:10','did me'),
	(13,'admin',3,0.5,'2018-06-24 23:06:10','did me'),
	(14,'admin',2,2.5,'2018-06-24 23:12:40','bi thoi'),
	(15,'admin',3,2.5,'2018-06-24 23:12:40','bi thoi'),
	(16,'admin',2,0.5,'2018-06-24 23:13:13','bi thoi'),
	(17,'admin',3,0.5,'2018-06-24 23:13:13','bi thoi'),
	(18,'admin',1,25,'2018-06-24 23:13:38','bi thoi'),
	(19,'admin',2,4,'2018-06-24 23:52:32','bi thoi'),
	(20,'admin',3,4,'2018-06-24 23:52:32','bi thoi'),
	(21,'admin',1,2,'2018-06-24 23:53:39','did me');

/*!40000 ALTER TABLE `stock_discard` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stock_input
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_input`;

CREATE TABLE `stock_input` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `count` double NOT NULL DEFAULT '0',
  `input_date` datetime NOT NULL,
  `description` varchar(100) DEFAULT '',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stock_input` WRITE;
/*!40000 ALTER TABLE `stock_input` DISABLE KEYS */;

INSERT INTO `stock_input` (`id`, `user_id`, `ingredient_id`, `count`, `input_date`, `description`, `price`)
VALUES
	(1,'admin',1,0.5,'2018-06-24 21:36:31','',0),
	(2,'admin',1,4,'2018-06-24 22:29:21','',0),
	(3,'admin',2,4,'2018-06-24 22:29:21','',0),
	(4,'admin',1,50,'2018-06-24 23:58:59','',0),
	(5,'admin',2,0,'2018-06-24 23:58:59','',0),
	(6,'admin',1,50,'2018-06-25 00:03:43','',0),
	(7,'admin',1,50000,'2018-06-25 23:06:11','',88899888),
	(8,'admin',2,50000,'2018-06-25 23:06:11','',7745888),
	(9,'admin',3,50000,'2018-06-25 23:06:11','',9333333),
	(10,'admin',1,4,'2018-06-26 00:14:07','',50000),
	(11,'admin',2,4,'2018-06-26 00:14:07','',50000),
	(12,'admin',3,4,'2018-06-26 00:14:07','',50000),
	(13,'admin',1,4,'2018-06-26 00:14:57','',50000),
	(14,'admin',2,4,'2018-06-26 00:14:57','',50000),
	(15,'admin',3,4,'2018-06-26 00:14:57','',50000),
	(16,'admin',1,10,'2018-06-26 00:24:04','',50000),
	(17,'admin',2,10,'2018-06-26 00:24:04','',50000),
	(18,'admin',3,10,'2018-06-26 00:24:04','',50000);

/*!40000 ALTER TABLE `stock_input` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `table`;

CREATE TABLE `table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;

INSERT INTO `table` (`id`, `area_id`, `name`, `description`, `available`)
VALUES
	(1,1,'A1',NULL,'1'),
	(2,1,'A2',NULL,'1'),
	(3,1,'A3',NULL,'1'),
	(4,2,'B1',NULL,'1'),
	(5,2,'B2',NULL,'1'),
	(6,2,'B3',NULL,'1'),
	(7,3,'C1',NULL,'1');

/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
