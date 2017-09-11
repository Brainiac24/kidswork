/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.22-MariaDB : Database - dbr_kir_front
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbr_kir_front` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbr_kir_front`;

/*Table structure for table `audit` */

DROP TABLE IF EXISTS `audit`;

CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisions` int(11) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `assets` double DEFAULT NULL,
  `assets_rate` double DEFAULT NULL,
  `management_1` double DEFAULT NULL,
  `management_2` double DEFAULT NULL,
  `management_3` double DEFAULT NULL,
  `management_rate_1` double DEFAULT NULL,
  `management_rate_2` double DEFAULT NULL,
  `management_rate_3` double DEFAULT NULL,
  `earnings` double DEFAULT NULL,
  `earnings_rate` double DEFAULT NULL,
  `turnover` double DEFAULT NULL,
  `turnover_rate` double DEFAULT NULL,
  `reglaments` double DEFAULT NULL,
  `reglaments_rate` double DEFAULT NULL,
  `projection` double DEFAULT NULL,
  `projection_rate` double DEFAULT NULL,
  `risk` double DEFAULT NULL,
  `risk_rate` double DEFAULT NULL,
  `total_rate` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `audit` */

insert  into `audit`(`id`,`id_divisions`,`date1`,`assets`,`assets_rate`,`management_1`,`management_2`,`management_3`,`management_rate_1`,`management_rate_2`,`management_rate_3`,`earnings`,`earnings_rate`,`turnover`,`turnover_rate`,`reglaments`,`reglaments_rate`,`projection`,`projection_rate`,`risk`,`risk_rate`,`total_rate`) values (1,1,'2017-07-21',1,NULL,1,1,1,NULL,NULL,NULL,2,NULL,2,NULL,3,NULL,3,NULL,3,NULL,NULL),(2,1,'2017-07-21',1,NULL,1,1,1,NULL,NULL,NULL,2,NULL,2,NULL,3,NULL,3,NULL,3,NULL,NULL),(3,1,'2017-07-21',1,NULL,1,1,1,NULL,NULL,NULL,2,NULL,2,NULL,3,NULL,3,NULL,3,NULL,NULL),(4,11,'2017-07-24',10.9,4,52,3.4,33.6,5,4,5,5.81,1,3.68,1,2.8,1,121.08,1,3.4,3,2.25),(5,1,'2017-07-24',10.9,4,0.43,3.4,33.6,2,NULL,NULL,5.81,1,3.68,1,2.8,1,121.08,1,3.4,3,2.11),(6,0,'2017-07-24',1,1,1,1,1,4,1,1,1,3,2,1,1,1,1,5,11,5,2.58),(7,0,'2017-07-24',1,1,1,1,1,4,1,1,1,3,2,1,1,1,1,5,1,1,2.01),(8,1,'2017-07-20',1,1,1,1,1,4,1,1,1,3,2,1,1,1,1,5,1,1,2.01),(9,0,'2017-07-24',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(11,4,'2017-07-25',1,1,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.01),(12,5,'2017-07-15',3,2,3,3,3,5,3,1,3,2,3,1,3,1,3,5,4,3,2.44),(13,9,'2017-07-25',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(14,9,'2017-07-16',5,3,5,5,5,5,5,1,5,1,5,1,5,2,5,5,5,4,2.82),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,12,'2017-07-27',1,1,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.01),(30,0,'2017-08-02',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(31,0,'2017-08-02',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(32,0,'2017-08-02',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(33,0,'2017-08-02',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(34,0,'2017-08-02',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(35,0,'2017-08-02',1,1,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.01),(36,0,'2017-08-04',11,4,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.44),(37,0,'2017-08-15',1,1,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.01),(38,11,'2017-08-15',1,1,1,1,1,4,1,1,1,3,1,1,1,1,1,5,1,1,2.01);

/*Table structure for table `business_line` */

DROP TABLE IF EXISTS `business_line`;

CREATE TABLE `business_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `business_line` */

insert  into `business_line`(`id`,`name`,`desc`) values (1,'123',NULL),(2,'Бизнес линия',NULL);

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `currency` */

insert  into `currency`(`id`,`name`,`desc`) values (1,'TJS',NULL),(2,'RUR',NULL),(3,'USD',NULL),(4,'EUR',NULL),(5,'123',NULL);

/*Table structure for table `currency_rates` */

DROP TABLE IF EXISTS `currency_rates`;

CREATE TABLE `currency_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date DEFAULT NULL,
  `id_currency` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `currency_rates` */

insert  into `currency_rates`(`id`,`date1`,`id_currency`,`rate`) values (1,'2017-08-17',1,2),(2,'2017-08-17',2,1),(3,'2017-08-17',3,1),(4,'2017-08-17',4,1),(5,'2017-08-18',1,123),(6,'2017-08-18',1,12),(7,'2017-08-18',5,123),(8,'2017-08-21',3,2),(9,'2017-08-23',1,1233),(10,'2017-09-04',1,10),(11,'2017-09-04',2,4),(12,'2017-09-04',2,4),(13,'2017-09-04',2,4),(14,'2017-09-04',2,4);

/*Table structure for table `divisions` */

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `id_divisions_categories` int(11) DEFAULT NULL,
  `id_divisions_names` int(11) DEFAULT NULL,
  `desc` text,
  `id_divisions_2` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `divisions` */

insert  into `divisions`(`id`,`code`,`id_divisions_categories`,`id_divisions_names`,`desc`,`id_divisions_2`,`id_status`) values (1,'123',4,3,'123',1,NULL),(2,'123',4,3,'123',1,NULL),(3,'123',1,1,'',1,NULL),(4,'',1,1,'',1,NULL),(5,'123',4,3,'123',1,NULL),(6,'123',5,3,'123',1,NULL),(7,'123',1,1,'123',3,NULL),(8,'',1,2,'12322',4,NULL),(9,'33',2,2,'123',7,NULL),(10,'',1,1,'',0,NULL),(11,'',1,1,'',0,NULL),(13,'',1,1,'',0,NULL),(14,'123',1,1,'123',0,NULL),(15,'',1,1,'',0,NULL),(16,'',1,1,'',0,NULL),(17,'',1,1,'',0,NULL),(18,'',1,1,'',0,NULL),(19,'',2,1,'',7,NULL),(20,'',2,1,'',6,NULL),(21,'',2,1,'',5,NULL),(22,'',2,3,'',4,NULL),(23,'',2,2,'',0,NULL),(24,'',1,1,'',0,NULL),(25,'',2,1,'',0,NULL),(26,'',3,1,'',0,NULL),(27,'',2,1,'',0,NULL),(28,'',2,1,'',0,NULL),(29,'',2,1,'',0,NULL),(30,'',3,1,'',0,NULL),(31,'',2,1,'',0,NULL),(32,'',3,1,'',0,NULL),(33,'',3,4,'',2,NULL),(34,'',3,1,'',2,NULL),(35,'',3,2,'',3,NULL),(36,'123',3,2,'',2,NULL),(37,'',3,1,'',1,NULL),(38,'123',3,4,'',3,NULL),(39,'11',3,1,'',2,NULL),(40,'',3,4,'',4,NULL),(41,'123',3,5,'',36,NULL);

/*Table structure for table `divisions_categories` */

DROP TABLE IF EXISTS `divisions_categories`;

CREATE TABLE `divisions_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `divisions_categories` */

insert  into `divisions_categories`(`id`,`name`) values (1,'Банк'),(2,'Филиал'),(3,'МХБ'),(4,'Филиал'),(5,'123');

/*Table structure for table `divisions_names` */

DROP TABLE IF EXISTS `divisions_names`;

CREATE TABLE `divisions_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `divisions_names` */

insert  into `divisions_names`(`id`,`name`) values (1,'123'),(2,'МХБ Сомон 2'),(3,'Филиали Худжанд'),(4,'ул. Борбад'),(5,'123123');

/*Table structure for table `fraud` */

DROP TABLE IF EXISTS `fraud`;

CREATE TABLE `fraud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fraud_attr` int(11) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `id_fraud_actions` int(11) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `fraud` */

insert  into `fraud`(`id`,`id_fraud_attr`,`date1`,`id_fraud_actions`,`desc`) values (1,1,'2017-08-04',1,'1111'),(2,1,'2017-08-09',2,'321123'),(3,1,'2017-08-09',1,'123123'),(4,1,'2017-08-09',2,'123123'),(5,1,'2017-08-09',3,'1233'),(6,1,'2017-08-10',2,'12333333'),(7,1,'2017-08-11',NULL,'12333'),(8,1,'2017-08-11',2,'2222'),(9,7,'2017-08-11',NULL,'12333'),(10,7,'2017-08-11',27,'222'),(11,10,'2017-08-14',18,'123'),(12,3,'2017-08-14',27,'222'),(13,11,'2017-08-14',3,'16515'),(14,1,'2017-08-15',1,''),(15,1,'2017-08-15',1,''),(16,17,'2017-08-15',24,''),(17,12,'2017-08-15',4,'жядпорукщ'),(18,1,'2017-08-18',1,'12'),(19,23,'2017-08-21',1,'1231'),(20,1,'2017-08-23',1,''),(21,1,'2017-08-23',1,''),(22,1,'2017-09-04',1,''),(23,1,'2017-09-04',1,''),(24,1,'2017-09-04',1,''),(25,1,'2017-09-04',2,''),(26,1,'2017-09-05',2,'');

/*Table structure for table `fraud_actions` */

DROP TABLE IF EXISTS `fraud_actions`;

CREATE TABLE `fraud_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `fraud_actions` */

insert  into `fraud_actions`(`id`,`name`) values (1,'123'),(2,'22'),(3,'123'),(4,'12333333'),(5,'123'),(6,'123'),(7,'2222'),(8,'1111222'),(9,'22'),(10,'22'),(11,'123'),(12,'123'),(13,'123'),(14,'123'),(15,'123'),(16,'123'),(17,'123'),(18,'123'),(19,'123'),(20,'123'),(21,'123'),(22,'23'),(23,'123'),(24,'B23'),(25,'123'),(26,'123'),(27,'6666');

/*Table structure for table `fraud_attr` */

DROP TABLE IF EXISTS `fraud_attr`;

CREATE TABLE `fraud_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date DEFAULT NULL,
  `id_divisions_filial` int(11) DEFAULT NULL,
  `id_divisions_mhb` int(11) DEFAULT NULL,
  `id_business_line` int(11) DEFAULT NULL,
  `id_risk_category` int(11) DEFAULT NULL,
  `id_risk_factor` int(11) DEFAULT NULL,
  `id_loss_type` int(11) DEFAULT NULL,
  `loss_amount_base` double DEFAULT NULL,
  `loss_amount_current` double DEFAULT NULL,
  `loss_amount_restored` double DEFAULT NULL,
  `loss_amount_fact` double DEFAULT NULL,
  `id_currency_rates` int(11) DEFAULT NULL,
  `loss_amount_base_tjs` double DEFAULT NULL,
  `loss_amount_current_tjs` double DEFAULT NULL,
  `loss_amount_restored_tjs` double DEFAULT NULL,
  `loss_amount_fact_tjs` double DEFAULT NULL,
  `responsible_person` text,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `fraud_attr` */

insert  into `fraud_attr`(`id`,`date1`,`id_divisions_filial`,`id_divisions_mhb`,`id_business_line`,`id_risk_category`,`id_risk_factor`,`id_loss_type`,`loss_amount_base`,`loss_amount_current`,`loss_amount_restored`,`loss_amount_fact`,`id_currency_rates`,`loss_amount_base_tjs`,`loss_amount_current_tjs`,`loss_amount_restored_tjs`,`loss_amount_fact_tjs`,`responsible_person`,`desc`) values (1,'2017-08-03',1,1,1,1,1,1,1,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'	1','1'),(2,'2017-08-11',0,0,0,0,0,0,0,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'',''),(3,'2017-08-11',2,2,1,1,1,1,123,NULL,NULL,NULL,3,123,NULL,NULL,NULL,'123','112'),(4,'2017-08-11',0,0,0,0,0,0,0,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'',''),(5,'2017-08-11',0,0,0,0,0,0,0,NULL,NULL,NULL,0,0,NULL,NULL,NULL,'',''),(7,'2017-08-11',2,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(8,'2017-08-11',5,2,1,1,1,1,33,NULL,NULL,NULL,2,23,NULL,NULL,NULL,'33','33'),(9,'2017-08-14',6,3,2,2,2,0,10,NULL,NULL,NULL,1,100,NULL,NULL,NULL,'1000','10000'),(10,'2017-08-14',6,3,2,2,3,3,10,NULL,NULL,NULL,1,100,NULL,NULL,NULL,'1000','10000'),(11,'2017-08-14',1,2,2,2,2,2,123123,NULL,NULL,NULL,2,123123,NULL,NULL,NULL,'1231231231','1111111111111111111111'),(12,'2017-08-15',1,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(13,'2017-08-15',1,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(14,'2017-08-15',1,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(15,'2017-08-15',1,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(16,'2017-08-15',1,1,1,1,1,1,0,NULL,NULL,NULL,1,0,NULL,NULL,NULL,'',''),(17,'2017-08-15',1,1,2,2,2,3,0,NULL,NULL,NULL,2,0,NULL,NULL,NULL,'',''),(18,'2017-08-21',1,1,1,1,1,1,10,10,6,4,8,5,5,3,2,'',''),(19,'2017-08-21',1,1,1,1,1,1,10,10,6,4,8,5,5,3,2,'',''),(20,'2017-08-21',1,1,1,1,1,1,10,10,6,4,8,5,5,3,2,'',''),(21,'2017-08-21',1,1,1,1,1,1,10,10,6,4,8,5,5,3,2,'',''),(22,'2017-08-21',1,1,1,1,1,1,10,10,6,4,8,2,5,3,2,'',''),(23,'2017-08-21',1,1,2,1,1,1,100,100,50,50,8,2,50,25,25,'123123','123123'),(24,'2017-09-04',36,41,2,1,1,1,1010,100,10,90,1,0,0,0,0,'12123','123123'),(25,'2017-09-04',36,1,1,1,1,1,1010,100,10,0,1,0,0,0,0,'12123','123123'),(26,'2017-09-04',36,41,2,2,2,3,100,100,10,90,1,0,0,0,0,'qwe','asd'),(27,'2017-09-04',36,41,2,2,2,3,100,100,10,90,14,4,25,2.5,22.5,'qwe','asd');

/*Table structure for table `loss_type` */

DROP TABLE IF EXISTS `loss_type`;

CREATE TABLE `loss_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `loss_type` */

insert  into `loss_type`(`id`,`name`,`desc`) values (1,'123',NULL),(2,'56',NULL),(3,'Вид потерь',NULL);

/*Table structure for table `risk_category` */

DROP TABLE IF EXISTS `risk_category`;

CREATE TABLE `risk_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `risk_category` */

insert  into `risk_category`(`id`,`name`,`desc`) values (1,'123',NULL),(2,'Вид риска',NULL),(3,'123',NULL);

/*Table structure for table `risk_factor` */

DROP TABLE IF EXISTS `risk_factor`;

CREATE TABLE `risk_factor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `risk_factor` */

insert  into `risk_factor`(`id`,`name`,`desc`) values (1,'123',NULL),(2,'Факторы риска',NULL),(3,'Факторы риска',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
