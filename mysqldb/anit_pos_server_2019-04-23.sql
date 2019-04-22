# ************************************************************
# Sequel Pro SQL dump
# Version 5438
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Database: anit_pos_server
# Generation Time: 2019-04-22 16:09:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table access_not_used
# ------------------------------------------------------------

DROP TABLE IF EXISTS `access_not_used`;

CREATE TABLE `access_not_used` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT '',
  `waiter` char(1) NOT NULL DEFAULT '0',
  `kitchen` char(1) NOT NULL DEFAULT '0',
  `cashier` char(1) NOT NULL DEFAULT '0',
  `leader` char(1) NOT NULL DEFAULT '0',
  `server` char(1) NOT NULL DEFAULT '0',
  `manager` char(1) NOT NULL DEFAULT '0',
  `super_manager` char(1) NOT NULL DEFAULT '0',
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `access_not_used` WRITE;
/*!40000 ALTER TABLE `access_not_used` DISABLE KEYS */;

INSERT INTO `access_not_used` (`id`, `name`, `description`, `waiter`, `kitchen`, `cashier`, `leader`, `server`, `manager`, `super_manager`, `available`)
VALUES
	(1,'Admin','Quản lý toàn bộ','1','1','1','1','1','1','0','1'),
	(2,'Thu ngân','Thu ngân, quản lý trên server','0','0','1','0','0','0','0','1'),
	(3,'Bồi bàn','Phục vụ bàn, tiếp thu yêu cầu khách hàng','1','0','0','0','0','0','0','1'),
	(4,'Quản lý khu vực','Quản lý chung từng khu vực','1','1','1','1','0','0','0','1'),
	(5,'Nhà bếp','Nhận yêu cầu và thực hiện món ăn','0','1','0','0','0','0','0','1');

/*!40000 ALTER TABLE `access_not_used` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `res_id` int(11) NOT NULL DEFAULT '0',
  `available` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `name`, `res_id`, `available`, `creator`, `created_date`)
VALUES
	(1,'A',1,'1','','2019-04-22 01:18:09'),
	(2,'B',1,'1','','2019-04-22 01:18:09'),
	(3,'C',1,'1','','2019-04-22 01:18:09');

/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bill
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL,
  `cashier` varchar(100) NOT NULL DEFAULT '',
  `guest_id` int(11) DEFAULT '0',
  `total` int(255) NOT NULL DEFAULT '0',
  `create_date` date NOT NULL,
  `is_paid` char(1) NOT NULL DEFAULT '0',
  `paid_date` date DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ID` (`id`),
  KEY `guest_id` (`guest_id`),
  KEY `user_id` (`cashier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table bill_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill_detail`;

CREATE TABLE `bill_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `waiter` varchar(100) NOT NULL DEFAULT '',
  `chef_id` varchar(100) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `comments` varchar(500) DEFAULT '',
  `order_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `available` char(1) NOT NULL DEFAULT '1',
  `image` varchar(100) DEFAULT NULL,
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `available`, `image`, `creator`, `created_date`)
VALUES
	(1,'Món chiên','1','category_12.jpg','','2019-04-22 01:14:09'),
	(2,'Lẩu','1','category_2.jpg','','2019-04-22 01:14:09'),
	(3,'Hải sản','1','category_12.jpg','','2019-04-22 01:14:09'),
	(4,'Đồng quê','0','category_2.jpg','','2019-04-22 01:14:09'),
	(5,'Bia','1','category_12.jpg','','2019-04-22 01:14:09'),
	(6,'Nước giải khát','1','category_2.jpg','','2019-04-22 01:14:09'),
	(7,'Rượu','1',NULL,'','2019-04-22 01:14:09'),
	(8,'Món tráng miệng','1',NULL,'','2019-04-22 01:14:09'),
	(9,'Đồ pha chế','1','category_2.jpg','','2019-04-22 01:14:09'),
	(10,'Khác','0','category_2.jpg','','2019-04-22 01:14:09'),
	(11,'Hải sản','1','category_2.jpg','','2019-04-22 01:14:09'),
	(12,'Hải sản','1','category_12.jpg','','2019-04-22 01:14:09'),
	(13,'Đồ pha chế','0','','','2019-04-22 01:14:09'),
	(14,'Hải sản 1','1','category_14.jpg','','2019-04-22 01:14:09'),
	(15,'Hải sản','0','','','2019-04-22 01:14:09'),
	(16,'Hải sản','1','','','2019-04-22 01:14:09'),
	(17,'Hải sản','1','','','2019-04-22 01:14:09'),
	(18,'Hải sản','1','','','2019-04-22 01:14:09'),
	(19,'Đồng quê','1','','','2019-04-22 01:14:09');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table guest
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guest`;

CREATE TABLE `guest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` char(1) NOT NULL,
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `vip` char(1) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ingredient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredient`;

CREATE TABLE `ingredient` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT '',
  `image` varchar(100) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;

INSERT INTO `ingredient` (`id`, `category_id`, `unit_id`, `name`, `description`, `image`, `available`, `price`, `creator`, `created_date`)
VALUES
	(1,1,1,'Cải','',NULL,'1',50000,'','2019-04-22 01:12:58'),
	(2,1,1,'Xà Lách','',NULL,'1',50000,'','2019-04-22 01:12:58'),
	(3,2,2,'Ghẹ','',NULL,'1',50000,'','2019-04-22 01:12:58');

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
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient_category` WRITE;
/*!40000 ALTER TABLE `ingredient_category` DISABLE KEYS */;

INSERT INTO `ingredient_category` (`id`, `name`, `available`, `image`, `description`, `creator`, `created_date`)
VALUES
	(1,'Rau','1',NULL,NULL,'','2019-04-22 01:12:32'),
	(2,'Hải sản','1',NULL,NULL,'','2019-04-22 01:12:32'),
	(3,'Thịt','1',NULL,NULL,'','2019-04-22 01:12:32'),
	(4,'Cá','1',NULL,NULL,'','2019-04-22 01:12:32'),
	(5,'Trứng','1',NULL,NULL,'','2019-04-22 01:12:32');

/*!40000 ALTER TABLE `ingredient_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ingredient_unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredient_unit`;

CREATE TABLE `ingredient_unit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ingredient_unit` WRITE;
/*!40000 ALTER TABLE `ingredient_unit` DISABLE KEYS */;

INSERT INTO `ingredient_unit` (`id`, `name`, `available`, `creator`, `created_date`)
VALUES
	(1,'Bó','1','','2019-04-22 01:11:36'),
	(2,'Con','1','','2019-04-22 01:11:36'),
	(3,'Quả','1','','2019-04-22 01:11:36');

/*!40000 ALTER TABLE `ingredient_unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table page
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page` (
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(20) NOT NULL DEFAULT '',
  `role` char(1) NOT NULL DEFAULT '',
  `permission` char(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;

INSERT INTO `permission` (`id`, `page_name`, `role`, `permission`)
VALUES
	(1,'order','A','READ');

/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
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
  `add_count` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `name`, `category_id`, `unit_id`, `price`, `description`, `available`, `image`, `default_status`, `add_count`, `creator`, `created_date`)
VALUES
	(1,'Canh khổ qua nhồi thịt',1,12,220000,'Món ăn đặc trưng của người miền Bắc, theo truyền thuyết ăn món này mọi đau khổ sẽ qua','1','product_1.jpg','1','1','','0000-00-00 00:00:00'),
	(2,'Canh chua cá lóc',1,12,50000,'Món ăn dân dã có ở khắp mọi vùng miền ở Việt Nam','1','product_2.jpg','0','1','','0000-00-00 00:00:00'),
	(3,'Canh riêu cua mồng tơi',1,12,80000,'Cua đồng giã nát lọc lấy nuớc riêu sau đó nấu cùng mồng tơi, thơm ngon và bổ duỡng','1','product_3.jpg','0','1','','0000-00-00 00:00:00'),
	(4,'Canh nghêu nấu khế/ thì là',4,9,150000,'Sự kết hợp hoàn hảo giữa vị chua của khế, vị ngọt của nghêu và mùi thơm đăc trưng của rau thì là','1','product_4.jpg','0','1','','0000-00-00 00:00:00'),
	(5,'Canh mồng tơi nấu tôm/ thịt băm',4,9,120000,'Thịt heo băm nhuyễn, tôm sú bóc vỏ nấu cùng rau mồng tơi','1','product_5.jpg','0','1','','0000-00-00 00:00:00'),
	(6,'Trứng rán thịt băm',1,9,90000,'Thịt heo nạc băm nhuyễn rán cùng với trứng gà, thơm ngon và bổ dưỡng','1','product_6.jpg','0','1','','0000-00-00 00:00:00'),
	(7,'Sting',6,9,20000,'Sản phẩm của Pepsi Việt Nam','1','product_7.jpg','1','1','','0000-00-00 00:00:00'),
	(8,'Heniken',5,9,25000,'Thương hiệu bia nổi tiếng khắp thế giới','1','product_8.jpg','1','1','','0000-00-00 00:00:00'),
	(9,'Cocacola',6,9,30000,'Thương hiệu nước ngọt nổi tiếng thế giới','1','product_9.jpg','1','1','','0000-00-00 00:00:00'),
	(10,'Larue',5,9,10000,'Sản phẩm bia chất luợng của nhà máy bia Đà Nẵng','1','product_10.jpg','1','1','','0000-00-00 00:00:00'),
	(11,'Vodka',7,9,263000,'Rượu đặc trưng của người Hà Nội','0','product_11.jpg','0','1','','0000-00-00 00:00:00'),
	(12,'Canh sườn Lagim',4,9,300000,'Canh sườn Laghim - Sườn heo hầm với bí đỏ, cà rốt và các loại rau khác','0','product_12.jpg','1','1','','0000-00-00 00:00:00'),
	(13,'Canh chua tôm',4,9,340000,'Tôm sú tươi bóc vỏ nấu canh chua với thơm cà. Món anh giúp giải nhiệt những ngày nắng nóng','1','product_13.jpg','1','1','','0000-00-00 00:00:00'),
	(14,'Canh chua cá kèo',4,9,120000,'Canh chua cá kèo - món ăn đặc trưng dân dã của người Nam bộ, giúp giải nhiệt những ngày nắng nóng','1','product_14.jpg','1','1','','0000-00-00 00:00:00'),
	(15,'Khăn lạnh',10,9,5000,'','1','product_15.jpg','0','1','','0000-00-00 00:00:00'),
	(16,'Chè sen',8,9,15000,'','1','product_16.jpg','1','1','','0000-00-00 00:00:00'),
	(17,'Kem plan',8,9,20000,'','1','product_17.jpg','0','1','','0000-00-00 00:00:00'),
	(18,'Trái cây lạnh',8,9,40000,'Cam, xoài, lê, táo, dưa hấu','1','product_18.jpg','0','1','','0000-00-00 00:00:00'),
	(19,'Bánh ngọt',8,9,10000,'','1','product_19.jpg','1','1','','0000-00-00 00:00:00'),
	(20,'Whisky',7,9,450000,'','1','product_20.jpg','1','1','','0000-00-00 00:00:00'),
	(21,'333',5,9,13000,'','1','product_21.jpg','1','1','','0000-00-00 00:00:00'),
	(22,'Sài Gòn Export (đỏ)',5,9,12000,'','1','product_22.jpg','1','1','','0000-00-00 00:00:00'),
	(23,'Sài Gòn Export (xanh)',5,9,10000,'','1','product_23.jpg','1','1','','0000-00-00 00:00:00'),
	(24,'RedBull',6,9,22000,'','1','product_24.jpg','1','1','','0000-00-00 00:00:00'),
	(25,'Tôm chiên xù',1,9,100000,'','1','product_25.jpg','0','1','','0000-00-00 00:00:00'),
	(26,'Lẩu cá lóc',2,9,120000,'','1','product_26.jpg','0','1','','0000-00-00 00:00:00'),
	(27,'Lẩu dê',2,9,200000,'','1','product_27.jpg','0','1','','0000-00-00 00:00:00'),
	(28,'Lẩu tươi sống',2,9,90000,'','1','product_28.jpg','0','1','','0000-00-00 00:00:00'),
	(29,'Lẩu mắm',2,9,120000,'','1','product_29.jpg','0','1','','0000-00-00 00:00:00'),
	(30,'Cơm chiên sốt tương',1,9,40000,'','1','product_30.jpg','0','1','','0000-00-00 00:00:00'),
	(31,'Gà chiên chấm tương ớt',1,9,70000,'','1','product_31.jpg','0','1','','0000-00-00 00:00:00'),
	(32,'Mực hấp gừng2222',3,9,130000,'csafas fas fbasvfas','1','product_32.jpg','0','1','','0000-00-00 00:00:00'),
	(33,'Ghẹ luộc',3,9,150000,'','1','product_33.jpg','0','1','','0000-00-00 00:00:00'),
	(34,'Khăn giấy',10,9,3000,'','1','product_34.jpg','0','1','','0000-00-00 00:00:00'),
	(35,'Chivas',7,9,630000,'','1','product_35.jpg','1','1','','0000-00-00 00:00:00'),
	(36,'Heniken (Thùng)',5,9,25000,'Thương hiệu bia nổi tiếng khắp thế giới','1','product_36.jpg','1','2','','0000-00-00 00:00:00'),
	(170,'Vodka',7,9,262000,'Rượu đặc trưng của người Hà Nội','0','product_170.jpg','0','1','','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_comment`;

CREATE TABLE `product_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `product_comment` WRITE;
/*!40000 ALTER TABLE `product_comment` DISABLE KEYS */;

INSERT INTO `product_comment` (`id`, `name`, `creator`, `created_date`)
VALUES
	(1,'Nhiều tiêu','','2019-04-22 01:13:33'),
	(2,'Nhiều thịt','','2019-04-22 01:13:33'),
	(3,'Nhiều nước','','2019-04-22 01:13:33'),
	(4,'Ít dầu','','2019-04-22 01:13:33'),
	(5,'Thêm canh','','2019-04-22 01:13:33');

/*!40000 ALTER TABLE `product_comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_contruct
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_contruct`;

CREATE TABLE `product_contruct` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `count` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table product_unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_unit`;

CREATE TABLE `product_unit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_unit` WRITE;
/*!40000 ALTER TABLE `product_unit` DISABLE KEYS */;

INSERT INTO `product_unit` (`id`, `name`, `available`, `creator`, `created_date`)
VALUES
	(9,'Chai','1','','2019-04-22 01:09:58'),
	(10,'??a','1','','2019-04-22 01:09:58'),
	(11,'Tô','1','','2019-04-22 01:09:58'),
	(12,'Chén','1','','2019-04-22 01:09:58'),
	(13,'N?i','1','','2019-04-22 01:09:58'),
	(14,'Ly','1','','2019-04-22 01:09:58'),
	(15,'Gói','1','','2019-04-22 01:09:58'),
	(16,'Lon','1','','2019-04-22 01:09:58');

/*!40000 ALTER TABLE `product_unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table res_ingredient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `res_ingredient`;

CREATE TABLE `res_ingredient` (
  `res_id` int(11) unsigned NOT NULL DEFAULT '1',
  `ingredient_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `res_ingredient` WRITE;
/*!40000 ALTER TABLE `res_ingredient` DISABLE KEYS */;

INSERT INTO `res_ingredient` (`res_id`, `ingredient_id`)
VALUES
	(1,2),
	(1,3),
	(1,1);

/*!40000 ALTER TABLE `res_ingredient` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table res_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `res_product`;

CREATE TABLE `res_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `res_product` WRITE;
/*!40000 ALTER TABLE `res_product` DISABLE KEYS */;

INSERT INTO `res_product` (`id`, `res_id`, `product_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,1,6),
	(7,1,7),
	(8,1,8),
	(9,1,9),
	(10,1,10),
	(11,1,11),
	(12,1,12),
	(13,1,13),
	(14,1,14),
	(15,1,15),
	(16,1,16),
	(17,1,17),
	(18,1,18),
	(19,1,19),
	(20,1,20),
	(21,1,21),
	(22,1,22),
	(23,1,23),
	(24,1,24),
	(25,1,25),
	(26,1,26),
	(27,1,27),
	(28,1,28),
	(29,1,29),
	(30,1,30),
	(31,1,31),
	(32,1,32),
	(33,1,33),
	(34,1,34),
	(35,1,35),
	(36,1,36);

/*!40000 ALTER TABLE `res_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table restaurant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `jweb_port` varchar(11) NOT NULL DEFAULT '',
  `area_ver` int(11) NOT NULL,
  `table_ver` int(11) NOT NULL,
  `category_ver` int(11) NOT NULL,
  `product_ver` int(11) NOT NULL,
  `product_unit_ver` int(11) NOT NULL,
  `product_comment_ver` int(11) NOT NULL,
  `product_construct_ver` int(11) NOT NULL,
  `sale_ver` int(11) NOT NULL,
  `sale_apply_ver` int(11) NOT NULL,
  `ingredient_category_ver` int(11) NOT NULL,
  `ingredient_ver` int(11) NOT NULL,
  `ingredient_unit_ver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;

INSERT INTO `restaurant` (`id`, `name`, `address`, `phone`, `jweb_port`, `area_ver`, `table_ver`, `category_ver`, `product_ver`, `product_unit_ver`, `product_comment_ver`, `product_construct_ver`, `sale_ver`, `sale_apply_ver`, `ingredient_category_ver`, `ingredient_ver`, `ingredient_unit_ver`)
VALUES
	(1,'Nhà hàng Sông Hàn','24 B?ch ??ng - ?à N?ng','0511-1234567','8787',0,0,1,2,0,1,0,0,0,0,3,0);

/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table salary
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salary`;

CREATE TABLE `salary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `type` char(1) NOT NULL DEFAULT '0' COMMENT '0: theo gio, 1: theo ngay, 2: theo thang ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sale
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `is_pair` char(1) NOT NULL DEFAULT '0' COMMENT '0 is not pair, 1 is pair',
  `is_auto_activate` char(1) NOT NULL DEFAULT '0' COMMENT '0 is no, 1 is auto active',
  `limit` int(1) NOT NULL DEFAULT '0' COMMENT '-1 is no limit',
  `used_count` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `value` int(11) NOT NULL DEFAULT '0',
  `apply_type` char(1) NOT NULL DEFAULT '0' COMMENT '0 is -%, 1 is -',
  `available` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;

INSERT INTO `sale` (`id`, `is_pair`, `is_auto_activate`, `limit`, `used_count`, `description`, `value`, `apply_type`, `available`)
VALUES
	(1,'0','1',0,0,'Mừng khai trương',30,'0','1'),
	(2,'0','1',0,0,'Mừng quốc khánh',20,'0','1'),
	(3,'0','1',0,0,'Mừng 30/4, 1/5',100000,'1','1'),
	(4,'0','0',0,0,'Code (20%)',0,'0','1'),
	(5,'1','0',0,0,'Code (30%)',0,'0','1'),
	(6,'0','0',0,0,'Code (Giam 50000)',0,'0','1');

/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_apply
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_apply`;

CREATE TABLE `sale_apply` (
  `res_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `monday` char(1) NOT NULL DEFAULT '0',
  `tuesday` char(1) NOT NULL DEFAULT '0',
  `wednesday` char(1) NOT NULL DEFAULT '0',
  `thursday` char(1) NOT NULL DEFAULT '0',
  `friday` char(1) NOT NULL DEFAULT '0',
  `saturday` char(1) NOT NULL DEFAULT '0',
  `sunday` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sale_apply` WRITE;
/*!40000 ALTER TABLE `sale_apply` DISABLE KEYS */;

INSERT INTO `sale_apply` (`res_id`, `sale_id`, `product_id`, `date_from`, `date_to`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`)
VALUES
	(1,1,1,'2018-06-01 00:00:00','2018-06-30 00:00:00','1','1','1','1','1','1','1'),
	(1,3,2,'2018-06-01 00:00:00','2018-06-30 00:00:00','1','1','1','1','1','1','1'),
	(1,2,2,'2018-06-01 00:00:00','2018-06-30 00:00:00','1','1','1','1','1','1','1');

/*!40000 ALTER TABLE `sale_apply` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_code
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_code`;

CREATE TABLE `sale_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `sale_id` int(11) NOT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `used_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sale_code` WRITE;
/*!40000 ALTER TABLE `sale_code` DISABLE KEYS */;

INSERT INTO `sale_code` (`id`, `code`, `sale_id`, `available`, `used_date`)
VALUES
	(1,'XX123XXX',4,'1','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `sale_code` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT '0' COMMENT '0: begin, 1:end, 2: Break in, 3: break end',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `table`;

CREATE TABLE `table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL DEFAULT '1',
  `area_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `available` char(1) NOT NULL DEFAULT '1',
  `creator` varchar(50) NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;

INSERT INTO `table` (`id`, `res_id`, `area_id`, `name`, `description`, `available`, `creator`, `created_date`)
VALUES
	(1,1,1,'COM HOP',NULL,'1','admin','0000-00-00 00:00:00'),
	(2,1,1,'A2',NULL,'1','admin','0000-00-00 00:00:00'),
	(3,1,1,'A3',NULL,'1','admin','0000-00-00 00:00:00'),
	(4,1,2,'B1',NULL,'1','admin','0000-00-00 00:00:00'),
	(5,1,2,'B2',NULL,'1','admin','0000-00-00 00:00:00'),
	(6,1,2,'B3',NULL,'1','admin','0000-00-00 00:00:00'),
	(7,1,3,'C1',NULL,'1','admin','0000-00-00 00:00:00'),
	(8,1,1,'A1',NULL,'1','admin','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `role` char(4) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `available` char(1) NOT NULL DEFAULT '0',
  `salary_id` int(11) NOT NULL,
  `joined_date` date NOT NULL,
  `left_date` date DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `access_id` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`username`, `role`, `password`, `name`, `available`, `salary_id`, `joined_date`, `left_date`)
VALUES
	('admin','A','1234','hoang','1',1,'2019-04-12',NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
