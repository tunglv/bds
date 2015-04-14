/*
SQLyog Trial v12.01 (64 bit)
MySQL - 5.6.20 : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `library`;

/*Table structure for table `catagory` */

DROP TABLE IF EXISTS `catagory`;

CREATE TABLE `catagory` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id catagory',
  `title` varchar(255) DEFAULT NULL COMMENT 'ten catagory',
  `parent_id` int(11) DEFAULT '0' COMMENT 'id parent catagory',
  `created` int(11) DEFAULT NULL COMMENT 'time created',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `catagory` */

insert  into `catagory`(`id`,`title`,`parent_id`,`created`) values (1,'Đại số tuyến tính',0,1415153278),(2,'Đại số tuyến tính 1',1,1415153753),(3,'Giải tích',0,1415154209),(4,'Giải tích 1',3,1415154224);

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id document',
  `title` varchar(255) NOT NULL COMMENT 'title of document',
  `catagory_id` int(11) NOT NULL COMMENT 'id of catagory',
  `type` enum('doc','xls','ppt','image','video','mp3','link') DEFAULT 'doc' COMMENT 'type of document',
  `author` varchar(255) DEFAULT NULL COMMENT 'name of author',
  `job` varchar(255) DEFAULT NULL COMMENT 'detail of author',
  `created` varchar(255) DEFAULT NULL COMMENT 'time document was created',
  `manager_id` int(11) NOT NULL COMMENT 'nguoi tao tai lieu',
  `link` varchar(255) DEFAULT NULL COMMENT 'link of document',
  `status` enum('enable','disable','pending') DEFAULT 'pending' COMMENT 'status of document',
  `desc` varchar(1000) DEFAULT NULL COMMENT 'desc of document',
  `catagory_parent` int(11) DEFAULT NULL COMMENT 'parent id of catagory''s document',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `document` */

insert  into `document`(`id`,`title`,`catagory_id`,`type`,`author`,`job`,`created`,`manager_id`,`link`,`status`,`desc`,`catagory_parent`) values (1,'Đại số tuyến tính - 2012',2,'image','Tùng Levis','Giáo sư đại học cambrigde','1415158784',28,'320x568.png','enable','Cuốn sách khá hay',1),(2,'Giải tích 1',4,'doc','Tùng Levis','Giáo sư đại học cambrigde','1415161112',28,'test.doc','enable','Em xa anh quá, giải tích cực ấn tượng',3);

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ADMIN','MANAGER','STAFF','DISABLE') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK__email_shop_id` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `manager` */

insert  into `manager`(`id`,`email`,`password`,`status`,`name`,`phone`,`yahoo`,`skype`,`reset_time`) values (4,'manhhaiphp@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','ADMIN','Mạnh Hải','0989030623','','','2013-03-06 17:59:24'),(23,'test@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','STAFF','','','','',NULL),(24,'anhthikhong86@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','MANAGER','Ánh','','','',NULL),(25,'hunght@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','MANAGER','Hùng','','','',NULL),(26,'p2045i@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','MANAGER','Phi','','','',NULL),(28,'tunglv.1990@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','MANAGER','Tùng',NULL,NULL,NULL,NULL),(29,'phuonggs88@gmail.com','$P$BYdbbEdiHV/ByrvhWUPO6FS9RjKK8z0','MANAGER','Phương',NULL,NULL,NULL,NULL),(30,'tunglv_90@yahoo.com.vn','$P$B0kmANx11Qi2A.kuIaG/X8HxUztdVo0','STAFF','','','','',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
