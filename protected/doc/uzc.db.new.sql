/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.16-log : Database - uzise
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uzise` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `uzise`;

/*Table structure for table `uzs_comment` */

DROP TABLE IF EXISTS `uzs_comment`;

CREATE TABLE `uzs_comment` (
  `autoid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `upload_id` bigint(20) unsigned NOT NULL COMMENT '上传作品id',
  `status` enum('delete','hide','show') NOT NULL DEFAULT 'hide' COMMENT '状态',
  `comment_username` varchar(30) NOT NULL COMMENT '评论者名称',
  `comment_text` varchar(140) NOT NULL COMMENT '评论本体',
  `ctime` int(10) unsigned NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`autoid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `uzs_upload` */

DROP TABLE IF EXISTS `uzs_upload`;

CREATE TABLE `uzs_upload` (
  `upload_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '上传作品id',
  `status` enum('delete','show','hide') NOT NULL DEFAULT 'hide' COMMENT '状态',
  `org_photo_url` varchar(255) NOT NULL COMMENT '原图片',
  `mini_photo_url` varchar(255) NOT NULL COMMENT '缩略图',
  `title` text NOT NULL COMMENT '宣言',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `username` varchar(30) NOT NULL COMMENT '姓名',
  `email` varchar(100) DEFAULT NULL COMMENT 'email',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `sina_id` varchar(20) DEFAULT NULL COMMENT 'sinaid',
  `sina_nick` varchar(50) DEFAULT NULL COMMENT 'sina昵称',
  `ctime` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `vote_num` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '投票数',
  PRIMARY KEY (`upload_id`),
  KEY `status` (`status`),
  KEY `ctime` (`ctime`),
  KEY `vote_num` (`vote_num`),
  KEY `username` (`username`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Table structure for table `uzs_vote_log` */

DROP TABLE IF EXISTS `uzs_vote_log`;

CREATE TABLE `uzs_vote_log` (
  `vote_log_id` bigint(20) unsigned NOT NULL COMMENT '投票统计id',
  `vote_ip` varchar(20) NOT NULL COMMENT '投票者ip',
  `vote_time` int(10) unsigned NOT NULL COMMENT '投票时间',
  `upload_id` bigint(20) unsigned NOT NULL COMMENT '被投票上传作品id',
  `status` enum('used','new') NOT NULL DEFAULT 'new' COMMENT '状态',
  PRIMARY KEY (`vote_log_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
