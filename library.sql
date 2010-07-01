/*
SQLyog Community v8.3 
MySQL - 5.0.77-community-nt : Database - video_library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`video_library` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `video_library`;

/*Table structure for table `movies` */

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `file_name` varchar(255) default NULL,
  `user_name` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

/*Data for the table `movies` */

insert  into `movies`(`id`,`title`,`file_name`,`user_name`) values (22,'TTT ','media/SpanishSpice550-1.jpg','prasya'),(29,'DADADA ','media/comedysongs.txt','prasya'),(101,'qwd ','media/1.jpg','user'),(106,'123123123 ','media/1.jpg','prasya'),(107,'123123123 ','media/1.jpg','prasya'),(108,'123123123 ','media/1.jpg','prasya'),(109,'wed ','media/1.jpg','prasya'),(118,' ','media/','prasya'),(119,' ','media/','prasya'),(120,' ','media/','prasya'),(121,' ','media/','prasya');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `user_id` int(255) NOT NULL auto_increment,
  `paydate` int(255) NOT NULL,
  `payamount` int(255) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payments` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) default NULL,
  `user_email` varchar(40) default NULL,
  `password` char(32) default NULL,
  `regdate` int(255) default NULL,
  `account` varchar(40) default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`user_name`,`user_email`,`password`,`regdate`,`account`) values (1,'user','user@com.ua','202cb962ac59075b964b07152d234b70',1274351455,'Free'),(129,'prasya','prasya@fcoin.com.ua ','250cf8b51c773f3f8dc8b4be867a9a02',1274351455,'Payment'),(139,'admin','admin@gmail.com ','12345',1274439470,'Free');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
