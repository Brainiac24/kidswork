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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `audit` */

/*Table structure for table `business_line` */

DROP TABLE IF EXISTS `business_line`;

CREATE TABLE `business_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `business_line` */

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `currency` */

/*Table structure for table `currency_rates` */

DROP TABLE IF EXISTS `currency_rates`;

CREATE TABLE `currency_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date DEFAULT NULL,
  `id_currency` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `currency_rates` */

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `divisions` */

insert  into `divisions`(`id`,`code`,`id_divisions_categories`,`id_divisions_names`,`desc`,`id_divisions_2`,`id_status`) values (1,'001',1,1,'ЧСК &quot;БОНКИ ЭСХАТА&quot;',1,NULL),(2,'001-001',2,2,'ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ХУЧАНД (САРБОНК)',1,NULL),(3,'001-002',3,3,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ДУШАНБЕ',1,NULL),(4,'001-003',3,4,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.КУРГОНТЕППА-1',1,NULL),(5,'001-004',3,5,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ХУЧАНД',1,NULL),(6,'001-005',3,6,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ИСТАРАВШАН',1,NULL),(7,'001-006',3,7,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ИСФАРА',1,NULL),(8,'001-007',3,8,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ПАНЧАКЕНТ',1,NULL),(9,'001-008',3,9,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.КОНИБОДОМ',1,NULL),(10,'001-009',3,10,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.БУСТОН',1,NULL),(11,'001-010',3,11,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.АШТ',1,NULL),(12,'001-011',3,12,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.МАСТЧОХ',1,NULL),(13,'001-013',3,13,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.Ч.РАСУЛОВ',1,NULL),(14,'001-014',3,14,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.ЁВОН',1,NULL),(15,'001-015',3,15,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ТУРСУНЗОДА',1,NULL),(16,'001-016',3,16,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ВАХДАТ',1,NULL),(17,'001-017',3,17,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ХИСОР',1,NULL),(18,'001-018',3,18,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.КУРГОНТЕППА-2',1,NULL),(19,'001-019',3,19,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.ЧАЙХУН',1,NULL),(20,'001-020',3,20,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.Б.ГАФУРОВ',1,NULL),(21,'001-021',3,21,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.ВОСЕЪ',1,NULL),(22,'001-022',3,22,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.СПИТАМЕН',1,NULL),(23,'001-023',3,23,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.РУДАКИ',1,NULL),(24,'001-024',3,24,'ФИЛИАЛИ ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Н.ШОХМАНСУР',1,NULL),(25,'001-100',3,25,'ЧСК &quot;БОНКИ ЭСХАТА&quot; ДАР Ш.ХУЧАНД (САРБОНК)',1,NULL);

/*Table structure for table `divisions_categories` */

DROP TABLE IF EXISTS `divisions_categories`;

CREATE TABLE `divisions_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `divisions_categories` */

insert  into `divisions_categories`(`id`,`name`) values (1,'Банк'),(2,'Головной'),(3,'Филиал');

/*Table structure for table `divisions_names` */

DROP TABLE IF EXISTS `divisions_names`;

CREATE TABLE `divisions_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `divisions_names` */

insert  into `divisions_names`(`id`,`name`) values (1,'Банк Эсхата'),(2,'001 - Головной офис'),(3,'002 - ш. Душанбе'),(4,'003 - ш. Кургантеппа-1'),(5,'004 - ш. Хучанд'),(6,'005 - ш. Истаравшан'),(7,'006 - ш. Исфара'),(8,'007 - ш. Панчакент'),(9,'008 - ш. Конибодом'),(10,'009 - ш. Бустон'),(11,'010 - н. Ашт'),(12,'011 - н. Мастчох'),(13,'013 - н. Ч. Расулов'),(14,'014 - н. Ёвон'),(15,'015 - ш. Турсунозода'),(16,'016 - ш. Вахдат'),(17,'017 - ш. Хисор'),(18,'018 - ш. Кургантеппа-2'),(19,'019 - н. Чайхун'),(20,'020 - н. Б. Гафуров'),(21,'021 - н. Восеъ'),(22,'022 - н. Спитамен'),(23,'023 - н. Рудаки'),(24,'024 - н. Шохмансур'),(25,'100 - Идораи амалиёти');

/*Table structure for table `fraud` */

DROP TABLE IF EXISTS `fraud`;

CREATE TABLE `fraud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fraud_attr` int(11) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `id_fraud_actions` int(11) DEFAULT NULL,
  `desc` text,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fraud` */

/*Table structure for table `fraud_actions` */

DROP TABLE IF EXISTS `fraud_actions`;

CREATE TABLE `fraud_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fraud_actions` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fraud_attr` */

/*Table structure for table `loss_type` */

DROP TABLE IF EXISTS `loss_type`;

CREATE TABLE `loss_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `loss_type` */

/*Table structure for table `risk_category` */

DROP TABLE IF EXISTS `risk_category`;

CREATE TABLE `risk_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `risk_category` */

/*Table structure for table `risk_factor` */

DROP TABLE IF EXISTS `risk_factor`;

CREATE TABLE `risk_factor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `risk_factor` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `status` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
