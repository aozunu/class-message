# Host: localhost  (Version: 5.5.53)
# Date: 2019-05-28 08:57:10
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "student"
#
DROP DATABASE IF EXISTS `class`;
CREATE DATABASE `class` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `class`;
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '同学id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '同学名字',
  `phone` varchar(255) DEFAULT NULL COMMENT '同学电话',
  `adris` varchar(255) DEFAULT NULL COMMENT '地址',
  `aihao` varchar(255) DEFAULT NULL COMMENT '爱好',
  `school` varchar(255) DEFAULT '' COMMENT '学校',
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "student"
#

/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
