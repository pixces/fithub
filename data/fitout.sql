# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12)
# Database: fitout
# Generation Time: 2016-06-15 20:28:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attributes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(256) DEFAULT NULL,
  `value` text,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;

INSERT INTO `attributes` (`id`, `key`, `value`, `date_created`, `date_modified`)
VALUES
	(1,'why_us','[{\"title\" : \"Cheaper\", \"value\": 36},{\"title\" : \"Faster\", \"value\" : 76},{\"title\": \"In House Assistance\", \"value\" : 100},{\"title\" : \"Value for Money\", \"value\" : 100},{\"title\" : \"Rejection in Authroity Approvals\", \"value\" : 0},{\"title\" : \"Defect Policy\", \"value\" : 100}]','2016-05-22 14:58:11','2016-05-22 15:20:39'),
	(2,'achievements','[{\"icon\":\"fa-briefcase\",\"title\":\"Years in Business\",\"value\":9},{\"icon\":\"fa-pagelines\",\"title\":\"Branches\",\"value\":7},{\"icon\":\"fa-folder-open\",\"title\":\"Projects\",\"value\":1024},{\"icon\":\"fa-shield\",\"title\":\"Awards\",\"value\":28},{\"icon\":\"fa-users\",\"title\":\"Team Memebers\",\"value\":75},{\"icon\":\"fa-gears\",\"title\":\"Project Management\",\"value\":125}]','2016-05-22 14:58:11','2016-05-22 15:26:09'),
	(3,'clients',NULL,NULL,'2016-05-22 15:26:58');

/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table portfolio_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `portfolio_categories`;

CREATE TABLE `portfolio_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(250) DEFAULT NULL,
  `category_sef` varchar(250) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `portfolio_categories` WRITE;
/*!40000 ALTER TABLE `portfolio_categories` DISABLE KEYS */;

INSERT INTO `portfolio_categories` (`id`, `category_title`, `category_sef`, `date_created`, `date_modified`)
VALUES
	(1,'Commercial','commercial','2016-05-22 15:30:13','2016-05-22 15:30:54'),
	(2,'Residential','residential','2016-05-22 15:30:13','2016-05-22 15:30:55'),
	(3,'Retail','retail','2016-05-22 15:30:13','2016-05-22 15:30:55'),
	(4,'Business Centre','business','2016-05-22 15:30:13','2016-05-22 15:30:56'),
	(5,'Furniture','furniture','2016-05-22 15:30:13','2016-05-22 15:30:56'),
	(6,'Exhibitions','exhibition','2016-05-22 15:30:13','2016-05-22 15:30:56'),
	(7,'Landscaping','landscaping','2016-05-22 15:30:13','2016-05-22 15:30:57');

/*!40000 ALTER TABLE `portfolio_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table portfolios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `portfolios`;

CREATE TABLE `portfolios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(6) NOT NULL DEFAULT 'image' COMMENT 'album | image',
  `title` varchar(250) DEFAULT '',
  `description` text,
  `image_url` varchar(256) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;

INSERT INTO `portfolios` (`id`, `parent_id`, `type`, `title`, `description`, `image_url`, `date_created`, `date_modified`)
VALUES
	(101,0,'album','Commercial',NULL,'commercial.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(102,0,'album','Residential',NULL,'residential.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(103,0,'album','Retail',NULL,'retail.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(104,0,'album','Business Center',NULL,'business_center.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(105,0,'album','Furniture',NULL,'furniture.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(106,0,'album','Exhibitions',NULL,'Exhibitions.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(107,0,'album','Landscaping',NULL,'Landscaping.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(108,101,'album','Al Masha Office Space',NULL,'Al-Masha-office-20150610-WA0009.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(109,103,'album','Osray Retails',NULL,'osray-retail-001.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(110,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20150610-WA0009.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(111,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0071.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(112,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0072.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(113,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0074.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(114,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0075.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(115,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0083.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(116,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0084.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(117,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0086.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(118,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0088.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(119,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0106.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(120,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0110.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(121,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0111.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(122,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0122.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(123,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160204-WA0128.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(124,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160205-WA0005.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(125,108,'image','Al Masha Office Space',NULL,'Al-Masha-office-20160205-WA0006.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(126,109,'image','Osray Retails',NULL,'osray-retail-001.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(127,109,'image','Osray Retails',NULL,'osray-retail-003.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(128,109,'image','Osray Retails',NULL,'osray-retail-0115.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(129,109,'image','Osray Retails',NULL,'osray-retail-117.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(130,109,'image','Osray Retails',NULL,'osray-retail-119.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(131,109,'image','Osray Retails',NULL,'osray-retail-212.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(132,109,'image','Osray Retails',NULL,'osray-retail-215.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(133,109,'image','Osray Retails',NULL,'osray-retail-218.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(134,109,'image','Osray Retails',NULL,'osray-retail-219.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(135,109,'image','Osray Retails',NULL,'osray-retail-241.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(136,109,'image','Osray Retails',NULL,'osray-retail-257.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(137,109,'image','Osray Retails',NULL,'osray-retail-308.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(138,109,'image','Osray Retails',NULL,'osray-retail-315.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(139,109,'image','Osray Retails',NULL,'osray-retail-317.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(140,109,'image','Osray Retails',NULL,'osray-retail-352.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(141,109,'image','Osray Retails',NULL,'osray-retail-412.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(142,109,'image','Osray Retails',NULL,'osray-retail-414.jpg','2016-05-25 02:29:06','2016-05-25 02:29:06'),
	(143,104,'album','Another Album','Another album','3-b990.jpg',NULL,'2016-06-02 02:32:22'),
	(144,102,'album','One more for the road','One more for the road','img-20160205-wa0005.jpg',NULL,'2016-06-02 02:32:50'),
	(145,101,'album','One more for the road','One more for the road','img-20160204-wa0083_-_copy813.jpg','2016-06-01 09:04:26','2016-06-02 02:34:26'),
	(154,144,'image','Common title',NULL,'01-clear-top-tents.jpg','2016-06-02 09:01:25','2016-06-02 14:31:25'),
	(155,144,'image','Common title',NULL,'1442.jpg','2016-06-02 09:01:25','2016-06-02 14:31:25'),
	(156,144,'image','Common title',NULL,'04-620x41370.jpg','2016-06-02 09:01:25','2016-06-02 14:31:25'),
	(157,144,'image','Common title',NULL,'005-700298770.jpg','2016-06-02 09:01:25','2016-06-02 14:31:25'),
	(158,144,'image','New image',NULL,'1326720175_300529477_4-desert-safari-dhs-130-per-person-dhow-cruise-dhs-120-per-person-hurry-community.jpg','2016-06-02 09:02:02','2016-06-02 14:32:02');

/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `title`, `description`, `image_url`, `date_created`, `date_modified`)
VALUES
	(1,'Acoustics','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i1.png','2016-06-01 21:26:03','2016-06-01 21:28:19'),
	(2,'Design','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i2.png','2016-06-01 21:26:03','2016-06-01 21:44:23'),
	(3,'Execution','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i3.png','2016-06-01 21:26:03','2016-06-01 21:44:28'),
	(4,'Customer Care ','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i4.png','2016-06-01 21:26:03','2016-06-01 21:44:33'),
	(5,'Information','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i5.png','2016-06-01 21:26:03','2016-06-01 21:44:39'),
	(6,'Joinery','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i6.png','2016-06-01 21:26:03','2016-06-01 21:44:43'),
	(7,'Furniture Supply ','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i7.png','2016-06-01 21:26:03','2016-06-01 21:50:29'),
	(8,'Project Management','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i8.png','2016-06-01 21:26:03','2016-06-01 21:50:33'),
	(9,'Authority Approval ','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i9.png','2016-06-01 21:26:03','2016-06-01 21:50:37'),
	(10,'Consultants','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i10.png','2016-06-01 21:26:03','2016-06-01 21:50:41'),
	(11,'Interior Landscaping ','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i11.png','2016-06-01 21:26:03','2016-06-01 21:50:46'),
	(12,'Vastu Consultant ','We make best offers to boost your brand name of your business quia conntur magni dolores eos qui ratione voluptatem. ','services/i12.png','2016-06-01 21:26:03','2016-06-01 21:50:50');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `username`, `password`, `date_created`, `date_modified`)
VALUES
	(1,'Zainul Abdeen','pixces@yahoo.com','2072b90bc63f596b8908791f47617a7c','2016-06-02 16:41:39','2016-06-02 16:41:48'),
	(2,'Admin','admin@fitouthub.com','28739f93811e1477962460e381656d09','2016-06-02 16:41:39','2016-06-02 16:42:53');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
