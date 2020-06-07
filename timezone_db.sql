/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 5.7.26 : Database - timezone_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`timezone_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `timezone_db`;

/*Table structure for table `offers` */

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for Offers',
  `name` varchar(100) DEFAULT NULL COMMENT 'Offer name',
  `validity` timestamp NULL DEFAULT NULL COMMENT 'Validity date for offer',
  `is_active` tinyint(1) unsigned DEFAULT '1' COMMENT 'Check if offer is active or not',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date of record creation',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date of record updation',
  `offered_by` varchar(50) DEFAULT 'Plutwo' COMMENT 'Company name',
  PRIMARY KEY (`id`),
  KEY `offered_by_idx` (`offered_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `offers` */

insert  into `offers`(`id`,`name`,`validity`,`is_active`,`created_at`,`updated_at`,`offered_by`) values 
(1,'By 1 Get 1 Free','2020-06-08 15:53:18',1,'2020-06-06 15:53:18','2020-06-06 15:53:35','Plutwo'),
(2,'25% Discount','2020-06-08 15:53:18',1,'2020-06-06 18:34:12','2020-06-06 18:34:18','Plutwo'),
(3,'10% Off Total Bill','2020-06-08 15:53:18',1,'2020-06-06 18:34:42','2020-06-06 18:34:42','Plutwo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
