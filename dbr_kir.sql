/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.22-MariaDB : Database - dbr_kir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbr_kir` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbr_kir`;

/*Table structure for table `audit` */

DROP TABLE IF EXISTS `audit`;

CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisions` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
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

/*Table structure for table `divisions` */

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name_address` text,
  `desc_address` text,
  `distance` double DEFAULT NULL,
  `id_inside_filial` int(11) DEFAULT NULL,
  `id_feed` int(11) DEFAULT NULL,
  `id_storage` int(11) DEFAULT NULL,
  `id_divisions` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=375 DEFAULT CHARSET=utf8;

/*Data for the table `divisions` */

insert  into `divisions`(`id`,`date_start`,`date_end`,`code`,`id_category`,`name_address`,`desc_address`,`distance`,`id_inside_filial`,`id_feed`,`id_storage`,`id_divisions`,`id_status`) values (1,'1993-01-01',NULL,'001',1,'ЧСК \"БОНКИ ЭСХАТА\"','ш. Хучанд, куч. Гагарин 135',0,1,1,1,1,2),(2,'1993-01-01',NULL,'001-001',1,'ЧСК \"БОНКИ ЭСХАТА\" ДАР Ш.ХУЧАНД (САРБОНК)','Сарбонк',0,1,1,1,1,2),(3,'1993-01-01',NULL,'001-002',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Душанбе','',0,1,1,1,1,2),(4,'1993-01-01',NULL,'001-003',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Қӯрғонтеппа-1','',0,1,1,1,1,2),(5,'1993-01-01',NULL,'001-004',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Хуҷанд','',0,1,1,1,1,2),(6,'1993-01-01',NULL,'001-005',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Истаравшан','',0,1,1,1,1,2),(7,'1993-01-01',NULL,'001-006',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Исфара','',0,1,1,1,1,2),(8,'1993-01-01',NULL,'001-007',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Панчакент','',0,1,1,1,1,2),(9,'1993-01-01',NULL,'001-008',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Конибодом','',0,1,1,1,1,2),(10,'1993-01-01',NULL,'001-009',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Бустон','Чкаловск',0,1,1,1,1,2),(11,'1993-01-01',NULL,'001-010',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Ашт','',0,1,1,1,1,2),(12,'1993-01-01',NULL,'001-011',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Мастчоҳ','',0,1,1,1,1,2),(13,'1993-01-01',NULL,'001-013',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Ҷ. Расулов','',0,1,1,1,1,2),(14,'1993-01-01',NULL,'001-014',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Ёвон','',0,1,1,1,1,2),(15,'1993-01-01',NULL,'001-015',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Турсунозода','',0,1,1,1,1,2),(16,'1993-01-01',NULL,'001-016',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Ваҳдат','',0,1,1,1,1,2),(17,'1993-01-01',NULL,'001-017',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Ҳисор','',0,1,1,1,1,2),(18,'1993-01-01',NULL,'001-018',2,'Филиали ҶСК \"Бонки Эсхата\" дар ш. Қӯрғонтеппа-2','',0,1,1,1,1,2),(19,'1993-01-01',NULL,'001-019',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Ҷайхун','Қумсангир',0,1,1,1,1,2),(20,'1993-01-01',NULL,'001-020',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Б. Ғафуров','',0,1,1,1,1,2),(21,'1993-01-01',NULL,'001-021',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Восеъ','',0,1,1,1,1,2),(22,'1993-01-01',NULL,'001-022',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Спитамен','',0,1,1,1,1,2),(23,'1993-01-01',NULL,'001-023',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Рӯдакӣ','',0,1,1,1,1,2),(24,'1993-01-01',NULL,'001-024',2,'Филиали ҶСК \"Бонки Эсхата\" дар н. Шоҳмансур','',0,1,1,1,1,2),(25,'1993-01-01',NULL,'001-100',2,'Идораи Амалиётии ҶСК \"Бонки Эсхата\" дар ш. Хуҷанд','',0,1,1,1,1,2),(26,'1993-01-01',NULL,'002101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Душанбе','',0,2,2,1,3,2),(27,'1993-01-01',NULL,'003101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Қӯрғонтеппа-1','',0,2,2,1,4,2),(28,'1993-01-01',NULL,'004101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Хуҷанд','',0,2,2,1,5,2),(29,'1993-01-01',NULL,'005101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Истаравшан','',0,2,2,1,6,2),(30,'1993-01-01',NULL,'006101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Исфара','',0,2,2,1,7,2),(31,'1993-01-01',NULL,'007101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Панчакент','',0,2,2,1,8,2),(32,'1993-01-01',NULL,'008101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Конибодом','',0,2,2,1,9,2),(33,'1993-01-01',NULL,'009101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Бустон','',0,2,2,1,10,2),(34,'1993-01-01',NULL,'010101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Ашт','',0,2,2,1,11,2),(35,'1993-01-01',NULL,'011101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Мастчоҳ','',0,2,2,1,12,2),(36,'1993-01-01',NULL,'013101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Ҷ. Расулов','',0,2,2,1,13,2),(37,'1993-01-01',NULL,'014101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Ёвон','',0,2,2,1,14,2),(38,'1993-01-01',NULL,'015101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Турсунзода','',0,2,2,1,15,2),(39,'1993-01-01',NULL,'016101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Ваҳдат','',0,2,2,1,16,2),(40,'1993-01-01',NULL,'017101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Ҳисор','',0,2,2,1,17,2),(41,'1993-01-01',NULL,'018101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Қӯрғонтеппа-2','',0,2,2,1,18,2),(42,'1993-01-01',NULL,'019101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар ш. Ҷайхун','',0,2,2,1,19,2),(43,'1993-01-01',NULL,'020101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Б. Ғафуров','',0,2,2,1,20,2),(44,'1993-01-01',NULL,'021101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Восеъ','',0,2,2,1,21,2),(45,'1993-01-01',NULL,'022101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Спитамен','',0,2,2,1,22,2),(46,'1993-01-01',NULL,'023101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Рӯдакӣ','',0,2,2,1,23,2),(47,'1993-01-01',NULL,'024101',3,'Хазинаи филиали ҶСК \"Бонки Эсхата\" дар н. Шоҳмансур','',0,2,2,1,24,2),(48,'1993-01-01',NULL,'100101',3,'Хазинаи Идораи Амалиётии ҶСК \"Бонки Эсхата\" дар ш. Хуҷанд','',0,2,2,1,25,2),(49,'2015-07-23',NULL,'002201',4,'НИП ш.Душанбе куч.Н.Карабоева-16 (филиал)','',0,2,2,1,3,2),(50,'2007-02-27',NULL,'002203',4,'МХБ Панчшер ш.Душанбе куч. Н. Каробоева 77 (5км)','',5,1,1,1,3,2),(51,'2012-01-09',NULL,'002204',4,'МХБ \"Саодат\" ш. Душанбе, куч. Шамси-23 (7км)','',7,1,1,1,3,2),(52,'2013-02-11',NULL,'002205',4,'МХБ \"Султони Кабир\" ш.Душанбе куч.Дарвоз-36 (1.3 км)','',1.3,1,1,1,3,2),(53,'2010-02-08',NULL,'002206',4,'МХБ Бозори \"Корвон\" ш.Душанбе, куч. Крупская б/н (6км)','',6,1,1,1,3,2),(54,'2016-07-28',NULL,'002207',4,'МХБ в ш. Душанбе, улица Борбад 179 (9 км)','',9,1,1,1,3,2),(55,'2012-03-07',NULL,'002208',4,'МХБ ш. Душанбе, махаллаи Испечак, куч. М.Хамадони 18 (9км)','',9,1,1,1,3,2),(56,'2013-08-03',NULL,'002209',4,'МХБ ш. Душанбе, куч. Дж. Расулов - 3 рынок \"Фаровон\" (8км)','',8,1,1,1,3,2),(57,'2016-10-03',NULL,'002210',4,'МХБ ш. Душанбе, куч. Зарафшон - 5  (8,4 км)','',8.4,1,1,1,3,2),(58,'2011-05-25',NULL,'002211',4,'МХБ ш. Душанбе, куч. Н.Каробоева - 89/1 (5км)','',5,1,1,1,3,2),(59,'2011-04-06',NULL,'002212',4,'МХБ р-н Рудаки, дж. Россия, к. Куштеппа 3-153 (5км)','',5,1,1,1,3,2),(60,'2012-05-14',NULL,'002213',4,'МХБ р-н Рудаки, дж. Сарикишти (8км)','',8,1,1,1,3,2),(61,'2006-12-12',NULL,'002214',4,'МХБ н.Рудаки, д.Чимтеппа (бывший Борбад 165) (8 км)','',8,1,1,1,3,2),(62,'2014-06-09',NULL,'002215',4,'МХБ р-н Сино, куч. Ч.Расулов - 61/2 (4 км)','',4,1,1,1,3,2),(63,'2016-10-03',NULL,'002216',4,'МХБ р-н Сино, куч. Чоми 3/1 (7,5 км)','',7.5,1,1,1,3,2),(64,'2014-02-04',NULL,'002217',4,'МХБ р-н Фирдавси, куч. Н.Каробоев - 86/1 (4км)','',4,1,1,1,3,2),(65,'2017-05-15',NULL,'002218',4,'МХБ ш. Душанбе, куч. С.Шерози - 19 (1км)','',1,1,1,1,3,2),(66,'2014-07-21',NULL,'003201',4,'НИП ш.Кургантюбе куч. Вахдат 9 (филиал)','',0,2,2,1,4,2),(67,'2015-01-06',NULL,'003202',4,'МХБ \"Хочи Шариф\" (2) куч. Айни б/н (3.5км)','',3.5,1,1,1,4,2),(68,'2015-01-06',NULL,'003203',4,'МХБ ш.Сарбанд, куч.Борбад 35/1 (17км)','',17,1,1,1,4,2),(69,'2014-07-08',NULL,'003204',4,'МХБ  н.  Бохтар, дж.Заргар, д. Заргар (15км)','',15,1,1,1,4,2),(70,'2014-05-05',NULL,'003205',4,'МХБ ш.Кургантюбе,  куч. Вахдат - 31 (1км)','',1,1,1,1,4,2),(71,'2014-09-24',NULL,'003206',4,'МХБ ш.Кургантюбе, бозори \"Хочи Шариф\" (3) (3км)','',3,1,1,1,4,2),(72,'2014-09-16',NULL,'003207',4,'МХБ ш.Кургантюбе, бозори \"Хочи Шариф\" (1) (3км)','',3,1,1,1,4,2),(73,'2014-09-01',NULL,'003208',4,'МХБ ш.Кургантюбе, куч. Логинова - 18  (2,5км)','',2.5,1,1,1,4,2),(74,'2015-01-06',NULL,'003209',4,'МХБ ш.Кургантюбе, куч. Мирзокодиров - 36 (3,5км)','',3.5,1,1,1,4,2),(75,'2012-11-21',NULL,'003210',4,'МХБ ш.Кургантюбе, куч. Норинова - 16 (2км)','',2,1,1,1,4,2),(76,'2009-09-12',NULL,'003211',4,'МХБ ш.Кургантюбе, куч. Норинова - 38  (3,2км)','',3.2,1,1,1,4,2),(77,'2011-03-18',NULL,'003212',4,'МХБ ш.Кургантюбе, куч. Ф.Саидов 1 (1,5км)','',1.5,1,1,1,4,2),(78,'2013-03-24',NULL,'003213',4,'МХБ н. А.Чоми, куч. Крупская (40км)','',40,1,1,2,4,2),(79,'2014-03-13',NULL,'003214',4,'МХБ н. А.Чоми, куч. Сомониён-33 (37км)','',37,1,1,2,4,2),(80,'2011-03-18',NULL,'003215',4,'МХБ н. А.Чоми, куч.Сомониен б/н ТЦ \"Бахор\" (38км)','',38,1,1,2,4,2),(81,'2007-04-24',NULL,'003216',4,'МХБ н. А.Чоми, куч.Сомониён - 14 (39км)','',39,1,1,2,4,2),(82,'2015-01-06',NULL,'003217',4,'МХБ н. А.Чоми, куч.Сомониён МС-5 (37км)','',37,1,1,2,4,2),(83,'2014-11-25',NULL,'003218',4,'МХБ н. А.Чоми,куч.Сомониён - 20 (38км)','',38,1,1,2,4,2),(84,'2014-07-08',NULL,'003219',4,'МХБ н. Бохтар, дж. Бохтариён, куч.К.Хучанди-1 (8км)','',8,1,1,1,4,2),(85,'2014-12-30',NULL,'003220',4,'МХБ н. Бохтар, куч. И.Сино - б/р ТЦ \"Садбарг\" (10км)','',10,1,1,1,4,2),(86,'2015-01-06',NULL,'003221',4,'МХБ н. Вахш куч. Сомони - 62 (19.5 км)\r\n','',21,1,1,2,4,2),(87,'2007-04-18',NULL,'003222',4,'МХБ н. Вахш, куч. Каримов - 13 (19км)','',19,1,1,2,4,2),(88,'2014-12-30',NULL,'003223',4,'МХБ н. Вахш, улица Ленина  48 (19,7км)','',19.7,1,1,2,4,2),(89,'2015-01-06',NULL,'003224',4,'МХБ н. Дангара, куч. Тагаев - 26/2 (79км)','',79,1,1,2,4,2),(90,'2014-11-25',NULL,'003225',4,'МХБ н. Дангара, куч.Маркази б/н (76км)','',76,1,1,2,4,2),(91,'2014-03-11',NULL,'003226',4,'МХБ н. Дангара, куч.У.Хайём - 1а  (75км)','',75,1,1,2,4,2),(92,'2014-10-15',NULL,'003227',4,'МХБ н. Кубодиён, куч. Ленин - 35 (81км)','',81,1,1,2,4,2),(93,'2008-06-06',NULL,'003228',4,'МХБ н. Кубодиён, куч. Ленина 48 (83км)','',83,1,1,2,4,2),(94,'2012-06-25',NULL,'003229',4,'МХБ н. Кубодиён, куч. Ленина б/н (82км)','',82,1,1,2,4,2),(95,'2015-01-06',NULL,'003230',4,'МХБ н. Кубодиён, куч. С.Айни б/н (80км)','',80,1,1,2,4,2),(96,'2012-06-25',NULL,'003231',4,'МХБ н. Хуросон, пос. Уяли куч. Айни 62 (21км)','',21,1,1,1,4,2),(97,'2015-01-06',NULL,'003232',4,'МХБ н. Хуросон, куч. Сомониён - б/н (43км)','',43,1,1,2,4,2),(98,'2014-04-09',NULL,'003233',4,'МХБ н. Ч.Руми, дж. Гулистон (50 км)','',50,1,1,2,4,2),(99,'2011-03-18',NULL,'003234',4,'МХБ н. Ч.Руми, куч. Айни - 14 (35км)','',35,1,1,2,4,2),(100,'2014-06-05',NULL,'003235',4,'МХБ н. Ч.Руми, куч. И.Сино - 12 (36км)','',36,1,1,2,4,2),(101,'2015-01-06',NULL,'003236',4,'МХБ н. Ч.Руми, куч. И.Сино 19 (36км)','',36,1,1,2,4,2),(102,'2014-06-05',NULL,'003237',4,'МХБ н. Ч.Руми, куч. И.Сино 21 (36км)','',36,1,1,2,4,2),(103,'2014-07-08',NULL,'003238',4,'МХБ н. Ч.Руми, куч.Ибни Сино - 20 (37км)','',37,1,1,2,4,2),(104,'2014-08-13',NULL,'003239',4,'МХБ н. Чиликул, ш.Гараути, куч. Молодёжная (49км)','',49,1,1,2,4,2),(105,'2015-01-06',NULL,'003240',4,'МХБ н. Чиликул, дж/д Нури Вахш, д. Чангалпарвар (44км)','',44,1,1,2,4,2),(106,'2014-10-15',NULL,'003241',4,'МХБ н. Чиликул, куч. А.Каримов   ТЦ  \"Фарход\" (48км)','',48,1,1,2,4,2),(107,'2012-06-25',NULL,'003242',4,'МХБ н. Чиликул, куч. Ленина, ТЦ Авесто  (47км)','',47,1,1,2,4,2),(108,'2015-05-04',NULL,'003243',4,'МХБ ш.Кургантюбе, куч.Гафурова 17 (3,5 км)','',3.5,1,1,1,4,2),(109,'2014-07-08',NULL,'003244',4,'МХБ н. Бохтар, улица Ибни Сино - 55 (11км)','',11,1,1,1,4,2),(110,'2014-08-13',NULL,'003245',4,'МХБ н. Вахш, куч. И.Сомони - 43 (18,5км)','',18.5,1,1,2,4,2),(111,'2015-04-27',NULL,'003246',4,'МХБ н. Кубодиён, бозори \"Маркази\" (1) (82км)','',82,1,1,2,4,2),(112,'2015-01-06',NULL,'003247',4,'МХБ н. Шаартуз, куч. И.Сомони б/н  (99км)','',99,1,1,2,4,2),(113,'2014-08-01',NULL,'003248',4,'МХБ н. Шаартуз, куч. И.Сомони б/н (95км)','',95,1,1,2,4,2),(114,'2014-08-01',NULL,'003249',4,'МХБ н. Шаартуз, куч. И.Сомони, бозори \"Ином\" (97км)','',97,1,1,2,4,2),(115,'2014-11-25',NULL,'003250',4,'МХБ н. Шаартуз, куч. Ленина  - 28 (98км)','',98,1,1,2,4,2),(116,'2014-10-15',NULL,'003251',4,'МХБ н. Шаартуз, куч.Ленина б/н  (96км)','',96,1,1,2,4,2),(117,'2015-07-23',NULL,'004201',4,'НИП ш. Хуҷанд, х. И.Сомони - 40 (филиал)','',0,2,2,1,5,2),(118,'2015-07-03',NULL,'004202',4,'МХБ ш. Хуҷанд, куч. И.Сомони - 10 (1.2км)','',1.2,1,1,1,5,2),(119,'2015-07-03',NULL,'004203',4,'МХБ ш. Хуҷанд, куч. И.Сомони - 56 (0,5км)','',0.5,1,1,1,5,2),(120,'2015-07-03',NULL,'004204',4,'МХБ ш. Хуҷанд, куч. И.Сомони - 72 (0.52км)','',0.52,1,1,1,5,2),(121,'2015-07-03',NULL,'004205',4,'МХБ ш. Хуҷанд, куч. И.Сомони - 81 (1км)','',1,1,1,1,5,2),(122,'2016-03-31',NULL,'004206',4,'МХБ ш. Хуҷанд, куч. И.Сомони - 10 (вечерняя касса) (1,2км)','',1.2,1,1,1,5,2),(123,'2015-07-03',NULL,'004207',4,'МХБ н. Б.Ғафуров, куч. Ёва - 54а (5,5км)','',5.5,1,1,1,5,2),(124,'2002-02-04',NULL,'005201',4,'МХБ ш. Истаравшан, куч. Ленина 12б (филиал)','',0,2,2,1,6,2),(125,'2011-09-14',NULL,'005202',4,'МХБ ш. Истаравшан \"Гули Сурх\" (1,3км)','',1.3,1,1,1,6,2),(126,'2016-11-17',NULL,'005203',4,'МХБ ш. Истаравшан Торговый центр \"Файз\" (1,2 км)','',1.2,1,1,1,6,2),(127,'2014-07-15',NULL,'005204',4,'МХБ ш. Истаравшан, \"Бозори маркази\" (1,3км)','',1.3,1,1,1,6,2),(128,'2013-05-21',NULL,'005205',4,'МХБ ш. Истаравшан, куч. А. Умаров - 12  (1,5км)','',1.5,1,1,1,6,2),(129,'2011-09-14',NULL,'005206',4,'МХБ ш. Истаравшан, куч. А. Умаров № 5 \"Уструшан\" (1.5км)','',1.5,1,1,1,6,2),(130,'2014-09-15',NULL,'005207',4,'МХБ ш. Истаравшан, куч. Гули Сурх - 2  (1,2км)','',1.2,1,1,1,6,2),(131,'2008-03-01',NULL,'005208',4,'МХБ ш. Истаравшан, куч. Дилшод б/н  (1,2км)','',1.2,1,1,1,6,2),(132,'2006-03-01',NULL,'005209',4,'МХБ ш. Истаравшан, куч. Ленина - 112  (1км)','',1,1,1,1,6,2),(133,'2015-01-05',NULL,'005210',4,'МХБ ш. Истаравшан, куч. Ленина - 130 (0,8км)','',0.8,1,1,1,6,2),(134,'2014-11-28',NULL,'005211',4,'МХБ ш. Истаравшан, куч. Холик Рачабов - б/р  (1,5км)','',1.5,1,1,1,6,2),(135,'2015-02-20',NULL,'005212',4,'МХБ н. Айни село Зарафшон - 1  (Сарвода) (130км)','',130,1,1,2,6,2),(136,'2014-09-15',NULL,'005213',4,'МХБ н. Айни, куч.Рудаки - 25  (100км)','',100,1,1,2,6,2),(137,'2014-11-25',NULL,'005214',4,'МХБ н. Гончи, куч. И.Сомони - 12/1 (12км) ','',12,1,1,1,6,2),(138,'2012-03-27',NULL,'005215',4,'МХБ н. Деваштич, И.Сомони - Калининобод (28км)','',28,1,1,1,6,2),(139,'2014-04-10',NULL,'005216',4,'МХБ н. Деваштич, куч. Б.Саломов - 11А (12км) ','',12,1,1,1,6,2),(140,'2011-09-14',NULL,'005217',4,'МХБ н. Деваштич, куч. Б.Саломов-11 (12км)','',12,1,1,1,6,2),(141,'2014-09-15',NULL,'005218',4,'МХБ н. Шахристан, куч.Истаравшан б/н (30км)','',30,1,1,2,6,2),(142,'2009-08-20',NULL,'006201',4,'НИП ш. Исфара, куч. Маркази - 29/1 (филиал)','',0,2,2,1,7,2),(143,'2014-06-09',NULL,'006202',4,'МХБ \"Аврангзеб\" ш. Исфара, куч. А.Чоми-15 (1,2км)','',1.2,1,1,1,7,2),(144,'2014-07-08',NULL,'006203',4,'МХБ \"Чоркух\" ш. Исфара, дж.Чоркух, куч.Точикистон 2  (20 км)','',20,1,1,1,7,2),(145,'2013-03-20',NULL,'006204',4,'МХБ ш. Исфара, дж. Ворух, куч.Рудаки б/р  (46км)','',46,1,1,1,7,2),(146,'2011-04-26',NULL,'006205',4,'МХБ ш. Исфара, дж. Кулькенд куч. Ленина - 254 (10км)','',10,1,1,1,7,2),(147,'2010-03-29',NULL,'006206',4,'МХБ ш. Исфара, дж. Сурх-1, куч. Б.Гафурова - 42  (15км)','',15,1,1,1,7,2),(148,'2011-12-01',NULL,'006207',4,'МХБ ш. Исфара, дж. Сурх-2, куч. Азимов-72  (18км)','',18,1,1,1,7,2),(149,'2011-04-28',NULL,'006208',4,'МХБ ш. Исфара, дж. Чильгази куч. Ленина б/н  (12км)','',12,1,1,1,7,2),(150,'2007-11-27',NULL,'006209',4,'МХБ ш. Исфара, дж.Ворух куч. Ленина - 82 (45км)','',45,1,1,1,7,2),(151,'2014-06-09',NULL,'006210',4,'МХБ ш. Исфара, дж.Кулканд, куч.Ленина - 197 (12км)','',12,1,1,1,7,2),(152,'2014-07-08',NULL,'006211',4,'МХБ ш. Исфара, к. Навобод, магазин \"Шамс\" (3,6км)','',3.6,1,1,1,7,2),(153,'2007-11-27',NULL,'006212',4,'МХБ ш. Исфара, куч. 8-Март б/р (1,2км)','',1.2,1,1,1,7,2),(154,'2008-05-12',NULL,'006213',4,'МХБ ш. Исфара, куч. А.Джоми - 17  (1,5км)','',1.5,1,1,1,7,2),(155,'2012-01-04',NULL,'006214',4,'МХБ ш. Исфара, куч. А.Джоми - 30  (1,2км)','',1.2,1,1,1,7,2),(156,'2012-06-01',NULL,'006215',4,'МХБ ш. Исфара, куч. Бобо Махкамов - 18/4 (1,5км)','',1.5,1,1,1,7,2),(157,'2014-07-08',NULL,'006216',4,'МХБ ш. Исфара, куч. Маркази - 17 (0,8км)','',0.8,1,1,1,7,2),(158,'2007-08-07',NULL,'006217',4,'МХБ ш. Исфара, куч. Маркази - 21  (0,6км)','',0.6,1,1,1,7,2),(159,'2006-08-31',NULL,'006218',4,'МХБ ш. Исфара,ч. Нефтеобод, куч. Совети - 52 (12,8км)','',12.8,1,1,1,7,2),(160,'2000-01-01',NULL,'007201',4,'ПДП ш. Пенджикент, куч. Рудаки - 97 (филиал)','',0,2,2,1,8,2),(161,'2014-06-10',NULL,'007202',4,'МХБ \"Гусар\" ш.Панчакент, дж.Л.Шерали, куч. Рудаки 75 (28км)','',28,1,1,1,8,2),(162,'2013-06-03',NULL,'007203',4,'МХБ \"Дарвозаи Бухор\" ш. Панчакент, хиёбони Рудаки - 185 (1км)','',1,1,1,1,8,2),(163,'2007-05-03',NULL,'007204',4,'МХБ ш. Пенджикент, дж.Ёри, куч. Айни - 24 (25км)','',25,1,1,1,8,2),(164,'2010-03-19',NULL,'007205',4,'МХБ ш. Пенджикент, дж.Л.Шерали, куч. Навобод (32км)','',32,1,1,1,8,2),(165,'2009-01-01',NULL,'007206',4,'МХБ ш. Пенджикент, дж.Саразм, куч.Чимкурган б/н (12км)','',12,1,1,1,8,2),(166,'2014-07-01',NULL,'007207',4,'МХБ ш. Пенджикент, просп. Рудаки-175 (2км)','',2,1,1,1,8,2),(167,'2010-01-18',NULL,'007208',4,'МХБ ш. Пенджикент, с/с Могиён  Бозори \"Колхози\" (55км) ','',55,1,1,1,8,2),(168,'2009-01-01',NULL,'007209',4,'МХБ ш. Пенджикент, куч. Советобод б/н  (43км)','',43,1,1,1,8,2),(169,'2013-08-21',NULL,'007210',4,'МХБ ш. Пенджикент, хиёбони Рудаки - 111  (1,5км)','',1.5,1,1,1,8,2),(170,'2014-07-07',NULL,'007211',4,'МХБ ш. Пенджикент, ч/д Сучина  (12км)','',12,1,1,1,8,2),(171,'2006-01-16',NULL,'008201',4,'НИП ш. Конибодом, куч. Ленина - 348  (филиал)','',0,2,2,1,9,2),(172,'2014-11-25',NULL,'008202',4,'МХБ Ниёзбек в ш. Конибодом, дж.Шарипова  куч.Ленина - 46 (21км)','',21,1,1,1,9,2),(173,'2014-02-27',NULL,'008203',4,'МХБ ш. Конибодом, дж. Ортиков. к. Каробоев 27  (6км)','',6,1,1,1,9,2),(174,'2014-02-27',NULL,'008204',4,'МХБ ш. Конибодом, дж. Пулодон, куч. Бустон - 3  (5км)','',5,1,1,1,9,2),(175,'2013-07-18',NULL,'008205',4,'МХБ ш. Конибодом, дж. Хамробоева п. Хамирчу - б/р (8км)','',8,1,1,1,9,2),(176,'2014-07-08',NULL,'008206',4,'МХБ ш.Конибодом, дж.Хамробоева, куч.Хамробоева 150 - Кучкак (12км)','',12,1,1,1,9,2),(177,'2015-01-05',NULL,'008207',4,'МХБ ш. Конибодом, дж.Артиков, куч.Пахтаобод - 63а (6км)','',6,1,1,1,9,2),(178,'2007-06-04',NULL,'008208',4,'МХБ ш. Конибодом, дж.Лохути, куч. А. Кодирова - 47 (31км)','',31,1,1,1,9,2),(179,'2006-05-05',NULL,'008209',4,'МХБ ш. Конибодом, дж.Лохути, куч. А.Содиков б/р (36км)','',36,1,1,1,9,2),(180,'2007-12-24',NULL,'008210',4,'МХБ ш. Конибодом, дж.Махрам, куч. Мирзоалиева - 1 (26км)','',26,1,1,1,9,2),(181,'2014-12-01',NULL,'008211',4,'МХБ ш. Конибодом, дж.Патар, куч.Ленина - б/р (10 км)','',10,1,1,1,9,2),(182,'2007-10-01',NULL,'008212',4,'МХБ ш. Конибодом, дж.Пулодон, куч. Раватская - б/р (14км)','',14,1,1,1,9,2),(183,'2013-11-19',NULL,'008213',4,'МХБ ш. Конибодом, куч. Ленина - б/р  (2км)','',2,1,1,1,9,2),(184,'2015-01-14',NULL,'008214',4,'МХБ ш. Конибодом, куч.Ленина - 125 (1,2км)','',1.2,1,1,1,9,2),(185,'2012-04-02',NULL,'008215',4,'МХБ ш. Конибодом. куч.Манонова - 65а (2км)','',2,1,1,1,9,2),(186,'2001-04-02',NULL,'009201',4,'НИП ш. Бустон, куч. Говорова - 8 (филиал)','',0,2,2,1,10,2),(187,'2010-04-06',NULL,'009202',4,'МХБ \"Гулистон\"  ш. Гулистон, куч. Мухина-1 (13км)','',13,1,1,1,10,2),(188,'2014-08-14',NULL,'009203',4,'МХБ \"Исфисор\" р-н Б.Гафуров, куч.Б.Гафуров - 126 (10км)','',10,1,1,1,10,2),(189,'2008-04-07',NULL,'009204',4,'МХБ \"Сомон\" куч.Ленина - 44 (4км)','',4,1,1,1,10,2),(190,'2013-07-01',NULL,'009205',4,'МХБ \"Сомон-2\" трасса Худжанд-Гафуров, ТЦ \"Саховат\" (4,5км)','',4.5,1,1,1,10,2),(191,'2014-09-08',NULL,'009206',4,'МХБ ш. Бустон, куч. Рудаки - 20 (0,5км)','',0.5,1,1,1,10,2),(192,'2014-03-18',NULL,'009207',4,'МХБ ш. Бустон, куч.Ленина - 2  (2,5км)','',2.5,1,1,1,10,2),(193,'2014-09-30',NULL,'009208',4,'МХБ ш. Гулистон, куч.Истиклол №54 (12км)','',12,1,1,1,10,2),(194,'2014-07-25',NULL,'010201',4,'НИП н. Ашт, куч. И. Сомони - 38 (филиал)','',0,2,2,1,11,2),(195,'2007-09-17',NULL,'010202',4,'МХБ \"Дусти\" н. Ашт, пос. Дусти (38,5км)','',38.5,1,1,1,11,2),(196,'2014-07-21',NULL,'010203',4,'МХБ \"Мархамат\" н. Ашт (20км)','',20,1,1,1,11,2),(197,'2010-04-01',NULL,'010204',4,'МХБ н. Ашт к. Бободархон (9км)','',9,1,1,1,11,2),(198,'2014-10-24',NULL,'010205',4,'МХБ н. Ашт, дж. Джарбулок (43,5км)','',43.5,1,1,1,11,2),(199,'2012-01-20',NULL,'010206',4,'МХБ н. Ашт, дж. Кирккудук  (33км)','',33,1,1,1,11,2),(200,'2007-09-24',NULL,'010207',4,'МХБ н.Ашт, ч. Понгоз (17,5)','',17.5,1,1,1,11,2),(201,'2014-10-24',NULL,'010208',4,'МХБ н. Ашт, дж. Пунук  (71,5км)','',71.5,1,1,1,11,2),(202,'2014-07-08',NULL,'010209',4,'МХБ н. Ашт, дж. Шодоба, пос.Гулшан, куч.И.Сомони-22/а (13,5км)','',13.5,1,1,1,11,2),(203,'2015-01-09',NULL,'010210',4,'МХБ н. Ашт, дж.Ошоба, село Аппон (28км)','',28,1,1,1,11,2),(204,'2013-03-04',NULL,'010211',4,'МХБ н. Ашт, к. Ашт  (41км)','',41,1,1,1,11,2),(205,'2009-05-22',NULL,'010212',4,'МХБ н.Ашт, д. Булок (11,4 км)','',11.4,1,1,1,11,2),(206,'2014-07-25',NULL,'010213',4,'МХБ н. Ашт, куч. Ленин - 140/1 (1км)','',1,1,1,1,11,2),(207,'2014-07-21',NULL,'010214',4,'МХБ н. Ашт. дж. Мехробод, пос.Камишкургон 2 (16 км)','',16,1,1,1,11,2),(208,'2014-11-03',NULL,'011201',4,'ПДП н. Матча, куч. И.Сомони - 23 (филиал)','',0,2,2,1,12,2),(209,'2015-01-01',NULL,'011202',4,'МХБ \"Оббурдон\" н.Мастчох, дж. Оббурдон. рынок \"Вахдат\" (12км)','',12,1,1,1,12,2),(210,'2009-04-22',NULL,'011203',4,'МХБ н. Матча, дж. Навбахор, куч.Ч.Эргашев - 19 (8км)','',8,1,1,1,12,2),(211,'2014-02-21',NULL,'011204',4,'МХБ н. Матча, дж. Оббурдон, Ю.Вафо (13км)','',13,1,1,1,12,2),(212,'2014-06-17',NULL,'011205',4,'МХБ н. Матча, дж. Обшорон, куч. С.Шарипов - 11  (12км)','',12,1,1,1,12,2),(213,'2009-06-05',NULL,'011206',4,'МХБ н. Матча, пос. Палдорак (5км)','',5,1,1,1,12,2),(214,'2009-06-05',NULL,'011207',4,'МХБ н. Матча, пос. Сомониён (19км)','',19,1,1,1,12,2),(215,'2014-06-17',NULL,'011208',4,'МХБ н. Матча, с/с Амиров Комсомол Площадка (31км)','',31,1,1,1,12,2),(216,'2009-01-01',NULL,'013201',4,'НИП н. Ч.Расулов, куч. Нурматова - 1 (филиал)','',0,2,2,1,13,2),(217,'2015-02-20',NULL,'013202',4,'МХБ  н. Дж.Расулов, дж.Янгихаёт, к.Мехргон, куч.Эгамбердиева (6км)','',6,1,1,1,13,2),(218,'2013-11-28',NULL,'013203',4,'МХБ \"Гулакандоз\" н. Ч.Расулов (5км)','',5,1,1,1,13,2),(219,'2007-05-02',NULL,'013204',4,'МХБ н. Гулакандоз, куч. Ленина 35 (3км)','',3,1,1,1,13,2),(220,'2013-06-17',NULL,'013205',4,'МХБ н. Гулакандоз, куч.Д.Самадов б/н (4км)','',4,1,1,1,13,2),(221,'2014-05-22',NULL,'013206',4,'МХБ н. Ч.Расулов, дж.Гулхона, куч.Мирмухсимов - б/н (4км)','',4,1,1,1,13,2),(222,'2014-05-22',NULL,'013207',4,'МХБ н. Ч.Расулов, дж.Дехмой, куч.К.Турабоев - б/н (9км)','',9,1,1,1,13,2),(223,'2014-07-04',NULL,'013208',4,'МХБ н. Дж.Расулов, дж.Сомониён, куч.Ленина - б/н (5км)','',5,1,1,1,13,2),(224,'2014-06-18',NULL,'013209',4,'МХБ н. Пролетар, Централный Рынок  (0.5rм)','',0.5,1,1,1,13,2),(225,'2009-04-01',NULL,'013210',4,'МХБ н. Пролетар, куч. А. Рудаки - 10/4  (0.5км)','',0.5,1,1,1,13,2),(226,'2006-11-14',NULL,'014201',4,'НИП ш. Ёвон, куч. Т.Хушвакт - 2а  (филиал)','',0,2,2,1,14,2),(227,'2014-07-15',NULL,'014202',4,'МХБ \"Норак\" ш. Норак, куч. Рудаки - 7а  (48км)','',48,1,1,2,14,2),(228,'2014-03-03',NULL,'014203',4,'МХБ ш. Норак, куч. Рудаки - 22 (47км)','',47,1,1,2,14,2),(229,'2009-05-06',NULL,'014204',4,'МХБ ш. Норак, куч. Рудаки - б/р (48км) (х)','',48,1,1,2,14,2),(230,'2012-04-20',NULL,'014205',4,'МХБ ш. Ёвон куч.М.Турсунзода - 20 (1,5км)','',1.5,1,1,1,14,2),(231,'2012-12-06',NULL,'014206',4,'МХБ ш. Ёвон, дж. Ситораи - Сурх, д.Пахтакор  (26км)','',26,1,1,1,14,2),(232,'2014-07-15',NULL,'014207',4,'МХБ ш. Ёвон, дж. Хаёти Нав, село А.Навои (32км)','',32,1,1,1,14,2),(233,'2010-09-15',NULL,'014208',4,'МХБ ш. Ёвон, пос. Дахана (6км)','',6,1,1,1,14,2),(234,'2014-12-09',NULL,'014209',4,'МХБ ш. Ёвон, пос. Навкорам  (5км)','',5,1,1,1,14,2),(235,'2014-12-09',NULL,'014210',4,'МХБ ш. Ёвон, пос. Парчасой  (10км)','',10,1,1,1,14,2),(236,'2014-03-03',NULL,'014211',4,'МХБ ш. Ёвон, село Куймот - б/н  (12км)','',12,1,1,1,14,2),(237,'2014-12-09',NULL,'014212',4,'МХБ ш. Ёвон, куч. А.Чоми - 145 (3км)','',3,1,1,1,14,2),(238,'2014-03-03',NULL,'014213',4,'МХБ ш. Ёвон, куч. А.Чоми - б/н (3км)','',3,1,1,1,14,2),(239,'2013-05-28',NULL,'014214',4,'МХБ ш. Ёвон, куч. Базарная - 2 (1,5км)','',1.5,1,1,1,14,2),(240,'2007-04-30',NULL,'014215',4,'МХБ ш. Ёвон, куч. Базарная б/н   (2,5км)','',2.5,1,1,1,14,2),(241,'2014-07-15',NULL,'014216',4,'МХБ ш. Ёвон, куч. Камсамол б/р (2,5км)','',2.5,1,1,1,14,2),(242,'2014-07-15',NULL,'014217',4,'МХБ ш. Ёвон, куч. Ленина - 36а   (2,5км)','',2.5,1,1,1,14,2),(243,'2007-06-14',NULL,'014218',4,'МХБ ш. Ёвон, куч. Уртакайнар - 1 (25км)','',25,1,1,1,14,2),(244,'2014-07-29',NULL,'015201',4,'НИП ш. Турсунзода, куч. И.Сомони - 55  (филиал)','',0,2,2,1,15,2),(245,'2014-11-03',NULL,'015202',4,'МХБ  \"Шахринав\"  дж.Сабо, дехаи Навобод  (14км)','',14,1,1,1,15,2),(246,'2014-11-03',NULL,'015203',4,'МХБ \"Саховат\" ш. Турсунзода, куч. Б.Гафурова б/н (1,5км)','',1.5,1,1,1,15,2),(247,'2014-10-20',NULL,'015204',4,'МХБ \"Точиева\" ш.Турсунзода, куч. Таджиева - 1 (1км)','',1,1,1,1,15,2),(248,'2014-10-30',NULL,'015205',4,'МХБ Шахринав, куч. И.Сомони - 8   (13км)','',13,1,1,1,15,2),(249,'2014-01-15',NULL,'015206',4,'МХБ Шахринав, куч. Сомони - 3  (15км)','',15,1,1,1,15,2),(250,'2014-11-03',NULL,'015207',4,'МХБ Шахринав, куч.Вокзалная - 7  (18км)','',18,1,1,1,15,2),(251,'2014-08-12',NULL,'015208',4,'МХБ ш. Турсузода, пос. Пахтаобод куч. Ленина - 73 (12км)','',12,1,1,1,15,2),(252,'2014-11-03',NULL,'015209',4,'МХБ ш. Турсунзаде, куч. Таджиева б/н (1,3км)','',1.3,1,1,1,15,2),(253,'2014-08-12',NULL,'015210',4,'МХБ ш. Турсунзаде, куч. Чапаева б/н  (1км)','',1,1,1,1,15,2),(254,'2015-01-06',NULL,'015211',4,'МХБ ш. Турсунзода, куч. М.Турсунзода - б/н (0,8км)','',0.8,1,1,1,15,2),(255,'2014-01-09',NULL,'015212',4,'МХБ ш. Турсунзода, куч. Сомони - 30  (0,5км)','',0.5,1,1,1,15,2),(256,'2016-02-22',NULL,'015213',4,'МХБ ш. Турсунзода, куч. Таджиева - 35 (1км)','',1,1,1,1,15,2),(257,'2014-11-03',NULL,'015214',4,'МХБ ш. Турсунзода, куч.Таджиева  - 1  (1км)','',1,1,1,1,15,2),(258,'2014-06-30',NULL,'016201',4,'НИП ш. Вахдат, куч.Тугдона - 6  (филиал)','',0,2,2,1,16,2),(259,'2014-06-30',NULL,'016202',4,'МХБ \"Хайр\" ш. Вахдат, куч.Н.Розик - 1 (6км)','',6,1,1,1,16,2),(260,'2014-06-30',NULL,'016203',4,'МХБ ш. Вахдат, дж.Гулистон   (20км)','',20,1,1,1,16,2),(261,'2014-06-30',NULL,'016204',4,'МХБ ш. Вахдат, дж.Карим Исмоил (9км)','',9,1,1,1,16,2),(262,'2014-09-30',NULL,'016205',4,'МХБ ш. Вахдат, д. Личак  (20км)','',20,1,1,1,16,2),(263,'2014-06-30',NULL,'016206',4,'МХБ ш. Вахдат, куч. Тугдона - 36  (0,7км)','',0.7,1,1,1,16,2),(264,'2015-05-04',NULL,'016207',4,'МХБ ш. Вахдат, куч.Борбад - б/н  (0,5км)','',0.5,1,1,1,16,2),(265,'2015-03-11',NULL,'016208',4,'МХБ ш. Вахдат, куч.Носир Хасан (4км)','',4,1,1,1,16,2),(266,'2014-06-30',NULL,'016209',4,'МХБ ш. Вахдат, куч.Улугбек - 1   (4км)','',4,1,1,1,16,2),(267,'2016-12-29',NULL,'016210',4,'МХБ ш. Вахдат, куч.Фирдавси \"Мухайё\" (1км)','',1,1,1,1,16,2),(268,'2016-02-08',NULL,'016211',4,'МХБ ш. Вахдат, куч.Фирдавси - б/н (0,7км)','',0.7,1,1,1,16,2),(269,'2016-10-06',NULL,'016212',4,'МХБ ш. Вахдат. куч. Фирдавси 43 (0,8км)','',0.8,1,1,1,16,2),(270,'2014-03-12',NULL,'016213',4,'МХБ ш. Файзабад, куч.И.Сомони - 30 (30км)','',30,1,1,2,16,2),(271,'2014-06-30',NULL,'016214',4,'МХБ ш. Файзабад, куч.Сомони - 1 (37км)','',37,1,1,2,16,2),(272,'2014-11-05',NULL,'016215',4,'МХБ дж. Гулистон, дехаи Джангалобод (12км)','',12,1,1,1,16,2),(273,'2014-07-17',NULL,'016216',4,'МХБ р-н Нуробод, д. Дарбанд, куч. И.Сомони - б/н (130км)','',130,1,1,2,16,2),(274,'2016-04-15',NULL,'016217',4,'МХБ р-н Рашт, д. Гарм, куч. И.Сомони 61 (192км)','',192,1,1,2,16,2),(275,'2014-07-17',NULL,'016218',4,'МХБ р-н Точикобод. куч.И.Сомони - 10 (110км)','',110,1,1,2,16,2),(276,'2016-12-19',NULL,'016219',4,'МХБ р. Файзабад, дж. Мехробод (15км)','',15,1,1,1,16,2),(277,'2016-07-05',NULL,'016220',4,'МХБ ш. Вахдат, к. Фирдавси б/р - 1 (0,8км)','',0.8,1,1,1,16,2),(278,'2016-12-02',NULL,'016221',4,'МХБ, ш. Рогун, куч. Сохтмончиён б/н (90км)','',90,1,1,2,16,2),(279,'2015-07-23',NULL,'017201',4,'НИП ш. Хисор, куч. И.Сомони - 2  (филиал)','',0,2,2,1,17,2),(280,'2014-07-18',NULL,'017202',4,'МХБ \"Само\" в Хисорском н.е, куч. 60-летие Хисора (0,7км)','',0.7,1,1,1,17,2),(281,'2014-07-18',NULL,'017203',4,'МХБ ш. Хисор, дж. Шарора куч. Дусти - 2а  (12км)','',12,1,1,2,17,2),(282,'2014-09-01',NULL,'017204',4,'МХБ ш. Хисор, дж.Сарикишти, дехаи Лаби Тол (18км)','',18,1,1,2,17,2),(283,'2012-07-05',NULL,'017205',4,'МХБ ш. Хисор, пос. Айни (12км)','',12,1,1,2,17,2),(284,'2011-07-05',NULL,'017206',4,'МХБ ш. Хисор, куч. А.Юсуфи -11/б  (1км)','',1,1,1,2,17,2),(285,'2012-07-17',NULL,'017207',4,'МХБ ш. Хисор, куч. Юсуфи -1 (1км)','',1,1,1,1,17,2),(286,'2008-03-20',NULL,'017208',4,'МХБ ш. Хисор, куч.Турсунзода - 20 (0.6км)','',0.6,1,1,1,17,2),(287,'2014-10-30',NULL,'017209',4,'МХБ ш. Хисор, ч. Хисор (6км)','',6,1,1,1,17,2),(288,'2014-05-14',NULL,'017210',4,'МХБ ш. Хисор, ч/д Мирзо Ризо, пос. Гулистон (12км)','',12,1,1,1,17,2),(289,'2015-05-14',NULL,'017211',4,'МХБ н. Рудаки ч/д Чортеппа, д. Чуйбодом (23км)','',23,1,1,1,17,2),(290,'2016-12-07',NULL,'018201',4,'НИП кучаи Норинов-1а (филиал)','',0,2,2,1,18,2),(291,'2014-08-04',NULL,'019201',4,'НИП н. Чайхун, куч.Беруни - 26 (филиал)','',0,2,2,1,19,2),(292,'2014-06-05',NULL,'019202',4,'МХБ н. Дусти, куч. Беруни - 9 (0,2км)','',0.2,1,1,1,19,2),(293,'2014-07-23',NULL,'019203',4,'МХБ н. Панч, куч. 50 сол Куш.Сархади  - 48 (50км)   ','',50,1,1,2,19,2),(294,'2011-03-28',NULL,'019204',4,'МХБ н. Панч, куч. Рудаки - 62 (50км)','',50,1,1,1,19,2),(295,'2014-10-02',NULL,'019205',4,'МХБ н. Панч, куч.Рудаки - 56  (53км)','',53,1,1,1,19,2),(296,'2014-04-29',NULL,'019206',4,'МХБ н. Панч, куч.Рудаки 26 (50 км)','',50,1,1,1,19,2),(297,'2012-06-25',NULL,'019207',4,'МХБ н. Ч.Балхи дж. Калинин базар \"Баракат\" (25км)','',25,1,1,1,19,2),(298,'2014-07-02',NULL,'019208',4,'МХБ н. Чайхун, Дусти, куч.Вахдат  (0,1км)','',0.1,1,1,1,19,2),(299,'2014-07-01',NULL,'019209',4,'МХБ н. Чайхун, дж. Дусти д. Зарнисор (6км)','',6,1,1,1,19,2),(300,'2014-07-01',NULL,'019210',4,'МХБ н. Чайхун, д. Чуйбор (5км)','',5,1,1,1,19,2),(301,'2014-06-05',NULL,'019211',4,'МХБ н. Чайхун, ч/д Истиклол, д. Телман (12,5км)','',12.5,1,1,1,19,2),(302,'2014-03-20',NULL,'019212',4,'МХБ н. Яккадин, д. Яккадин (46км)','',46,1,1,1,19,2),(303,'2014-06-20',NULL,'019213',4,'МХБ н.. Панч, куч.50-солагии Кушунхои Сархади 30 (0,2км)','',0.2,1,1,2,19,2),(304,'2014-06-30',NULL,'020201',4,'ПДП ш.Гафуров, куч.Ленина - 3  (филиал)','',0,2,2,1,20,2),(305,'2014-06-30',NULL,'020202',4,'МХБ ш.Гафуров, куч.Ленина - 5  (0,2км)','',0.2,1,1,1,20,2),(306,'2014-02-21',NULL,'020203',4,'МХБ ш.Гафуров,куч.1-мая 13 (5км)','',5,1,1,1,20,2),(307,'2006-06-13',NULL,'020204',4,'МХБ дж. Хистеварз, куч. Кенджаева - 5  (11км)','',11,1,1,1,20,2),(308,'2011-10-05',NULL,'020205',4,'МХБ дж. Хистеварз, куч. Д.Зокиров б/н напротив ТЦ \"Ситора\" (12км)','',12,1,1,1,20,2),(309,'2013-10-12',NULL,'020206',4,'МХБ дж.Зарзамин, куч.Р.Юлдашева - 44 (7км)','',7,1,1,1,20,2),(310,'2006-08-17',NULL,'020207',4,'МХБ дж.Овчи-Калача, куч. Т.Искандаров - 106 (17км)','',17,1,1,1,20,2),(311,'2015-05-08',NULL,'021201',4,'НИП н. Восеъ, куч. И.Рахимов - 6  (филиал)','',0,2,2,1,21,2),(312,'2017-05-10',NULL,'021202',4,'МХБ ш. Кулоб, куч Борбад 44 (1км)','',1,1,1,1,21,2),(313,'2014-07-01',NULL,'021203',4,'ЦБО ш. Куляб ч/д Дахана (41км)','',41,1,1,1,21,1),(314,'2014-07-09',NULL,'021204',4,'МХБ ш. Кулоб, куч. И.Сомони - 2 (20км)','',20,1,1,1,21,2),(315,'2014-06-10',NULL,'021205',4,'МХБ ш. Кулоб, куч. И.Сомони - б/р (19км)','',19,1,1,1,21,2),(316,'2015-02-09',NULL,'021206',4,'МХБ ш. Кулоб, куч. Сомони (Бозори Саховат) (20км) ','',20,1,1,1,21,2),(317,'2014-07-09',NULL,'021207',4,'МХБ ш. Кулоб, куч. Сомони - 15  (20км)','',20,1,1,1,21,2),(318,'2015-02-12',NULL,'021208',4,'МХБ ш. Кулоб, куч. Х. Назаров - 19а  (20км)','',20,1,1,1,21,2),(319,'2014-06-18',NULL,'021209',4,'МХБ н. Восеъ, дж. М.Махмадалиев, д. Селбур (20км)','',20,1,1,1,21,2),(320,'2014-11-03',NULL,'021210',4,'МХБ н. Восеъ, куч. И.Рахимов - 6\"а\" (10м)','',10,1,1,1,21,2),(321,'2014-07-09',NULL,'021211',4,'МХБ н. Восеъ, куч. Комсомол - 28  (0,2км)','',0.2,1,1,1,21,2),(322,'2014-07-08',NULL,'021212',4,'МХБ н. Восеъ, куч. Комсомол - 28а (0,2км)','',0.2,1,1,1,21,2),(323,'2014-07-08',NULL,'021213',4,'МХБ н. Фархор, куч. И. Сомони б/р 2  (46км)','',46,1,1,1,21,2),(324,'2014-06-12',NULL,'021214',4,'МХБ н. Фархор, куч. Сомони б/н (45,5км)','',45.5,1,1,1,21,2),(325,'2014-07-01',NULL,'021215',4,'МХБ н. Фархор, куч. Х. Шерози - б/р (48км)','',48,1,1,1,21,2),(326,'2014-06-05',NULL,'021216',4,'МХБ н. Хамадони, куч. И.Сомони - б/р  (32,5км)','',32.5,1,1,2,21,2),(327,'2014-06-16',NULL,'021217',4,'МХБ н. Хамадони, куч. Н. Хисрав б/р (35км)','',35,1,1,2,21,2),(328,'2014-07-09',NULL,'021218',4,'МХБ н. Хамадони, куч. С.Курбонов - 2  (33км)','',33,1,1,2,21,2),(329,'2014-06-30',NULL,'021219',4,'МХБ н. Хамадони, куч. Саъди б/н (35км)','',35,1,1,2,21,2),(330,'2015-01-01',NULL,'022201',4,'НИП н. Спитамен, куч.Сомониён - 54а  (филиал)','',0,2,2,1,22,2),(331,'2015-04-20',NULL,'022202',4,'МХБ г.Нау, куч.Спитамен-7а  (1км)','',1,1,1,1,22,2),(332,'2014-06-11',NULL,'022203',4,'МХБ н. Зафаробод, куч. Рудаки - б/н (60км)','',60,1,1,2,22,2),(333,'2014-11-03',NULL,'022204',4,'МХБ н. Зафаробод, куч. Уратеппа - б/н (60км)','',60,1,1,2,22,2),(334,'2014-10-30',NULL,'022205',4,'МХБ н. Спитамен, дж.Октеппа, куч.Ленин-44 (12км)','',12,1,1,1,22,2),(335,'2011-04-13',NULL,'022206',4,'МХБ н. Спитамен, к. Куркат,куч.Уришев - 48 (14км)','',14,1,1,1,22,2),(336,'2014-06-11',NULL,'022207',4,'МХБ н. Спитамен, село Нау, мах.Дусти, куч.Хамза - 78а (3км)','',3,1,1,1,22,2),(337,'2014-08-27',NULL,'022208',4,'МХБ н. Спитамен, село Нау, куч.Э.Юсуфи - 1 (1,5км)','',1.5,1,1,1,22,2),(338,'2014-10-22',NULL,'023201',4,'НИП н. Рудаки, куч. Сомони - б/н  (филиал)','',0,2,2,1,23,2),(339,'2014-06-30',NULL,'023202',4,'МХБ н. Рудаки, Сомониён, куч. Бехруз - б/р (1км)','',1,1,1,1,23,2),(340,'2014-06-30',NULL,'023203',4,'МХБ н. Рудаки, дж. Лохур (9,5км)','',9.5,1,1,1,23,2),(341,'2014-05-01',NULL,'023204',4,'МХБ н. Рудаки, дж.Зайнабобод  (12км)','',12,1,1,1,23,2),(342,'2014-06-30',NULL,'023205',4,'МХБ н. Рудаки, махаллаи Турсунзода (6,6км)','',6.6,1,1,1,23,2),(343,'2014-11-07',NULL,'023206',4,'МХБ н. Рудаки, куч. Маърифат б/н  (0,2км)','',0.2,1,1,1,23,2),(344,'2014-06-30',NULL,'023207',4,'МХБ н. Рудаки, куч. Сомони - 61 (0,1км)','',0.1,1,1,1,23,2),(345,'2014-11-27',NULL,'024201',4,'НИП ш.Душанбе, куч. Адхамов - 11  (филиал)','',0,2,2,1,24,2),(346,'2016-12-16',NULL,'024202',4,'МХБ ш. Душанбе, куч.Рудаки 156 (15,4км)','',15.4,1,1,1,24,2),(347,'2014-11-21',NULL,'024203',4,'МХБ ш. Душанбе, куч. Матросова - 2 (17,8км)','',17.8,1,1,1,24,2),(348,'2014-11-21',NULL,'024204',4,'МХБ ш.Душанбе куч. Бехзод  - 34  (1,3км)','',1.3,1,1,1,24,2),(349,'2014-11-21',NULL,'024205',4,'МХБ ш.Душанбе куч. Бухоро  - 43  (2,5км)','',2.5,1,1,1,24,2),(350,'2014-11-21',NULL,'024206',4,'МХБ ш.Душанбе куч. М. Мастонгулов 20 (19,1км)','',19.1,1,1,1,24,2),(351,'2014-11-21',NULL,'024207',4,'МХБ ш.Душанбе куч. Н. Мухаммад - 5/1  (1,9км)','',1.9,1,1,1,24,2),(352,'2014-11-21',NULL,'024208',4,'МХБ ш.Душанбе куч. Рудаки  - 106/49  (5,3 км) (рузона)','',5.3,1,1,1,24,2),(353,'2016-05-03',NULL,'024209',4,'МХБ ш.Душанбе куч. Рудаки  - 106/49  (5,3 км) (шабона)','',5.3,1,1,1,24,2),(354,'2014-11-21',NULL,'024210',4,'МХБ ш.Душанбе куч.Айни - 289/2  (11,9км)','',11.9,1,1,1,24,2),(355,'2014-11-21',NULL,'024211',4,'МХБ ш.Душанбе куч.Айни - 78/2  (7,3км)','',7.3,1,1,1,24,2),(356,'2014-11-21',NULL,'024212',4,'МХБ ш.Душанбе куч.Рудаки - 3а  (9,3км)','',9.3,1,1,1,24,2),(357,'2014-11-21',NULL,'024213',4,'МХБ ш.Душанбе, н. Рудаки, дж. Гулистон  (9,9км)','',9.9,1,1,1,24,2),(358,'2014-11-21',NULL,'024214',4,'МХБ ш.Душанбе, куч. Айни - 118  (8,4км)','',8.4,1,1,1,24,2),(359,'2014-11-21',NULL,'024215',4,'МХБ ш.Душанбе, куч. Лохути 7/4 (3,6км)','',3.6,1,1,1,24,2),(360,'2014-11-21',NULL,'024216',4,'МХБ ш.Душанбе, куч. Рудаки 137 (4,4км)','',4.4,1,1,1,24,2),(361,'2015-02-09',NULL,'024217',4,'МХБ ш.Душанбе, куч. Шевченко 44 (5,4 км)','',5.4,1,1,1,24,2),(362,'2014-11-21',NULL,'024218',4,'МХБ ш.Душанбе, куч.Айни -  269  (12,5км)','',12.5,1,1,1,24,2),(363,'2014-11-21',NULL,'024219',4,'МХБ ш.Душанбе, куч.Каххорова  - 111  (14,5км)','',14.5,1,1,1,24,2),(364,'2014-11-21',NULL,'024220',4,'МХБ ш.Душанбе, куч.Сохили - 1а  (13,2км)','',13.2,1,1,1,24,2),(365,'2016-04-06',NULL,'100201',4,'ПДП ш.Худжанд, куч.Гагарина-135','',0,2,2,1,25,1),(366,'2008-06-30',NULL,'100202',4,'МХБ  \"Бофанда\" х. И.Сомони - 201 (1,4км)','',1.4,1,1,1,25,2),(367,'2014-07-16',NULL,'100203',4,'МХБ  \"Озода\" куч. Шарк - 5 (0,7км)','',0.7,1,1,1,25,2),(368,'2013-03-05',NULL,'100204',4,'МХБ \"Бахори Ачам\" куч. Р. Хочиев  б/н (4,3км)','',4.3,1,1,1,25,2),(369,'2016-03-01',NULL,'100205',4,'МХБ ш. Худжанд, ул. К.Худжанди 164 (4км)','',4,1,1,1,25,2),(370,'2014-06-30',NULL,'100206',4,'МХБ ш. Худжанд, куч. Шарк 86а  Головной  (0,1км)','',0.1,1,1,1,25,2),(371,'2014-07-16',NULL,'100207',4,'МХБ ш.Истиклол, 1-мкр  б/н - ЧП  (39км)','',39,1,1,1,25,2),(372,'2010-10-01',NULL,'100208',4,'МХБ ш.Кайраккум пос.Адрасман куч.Горкий-9 - ЧП (40км)','',40,1,1,1,25,2),(373,'2010-10-01',NULL,'100209',4,'МХБ дж. Исмоил, куч. Хамзаалиева-35 (24км)','',24,1,1,1,25,2),(374,'2013-04-05',NULL,'100210',4,'МХБ куч. 30-лет Победа 25/1а (31 мкр) (3,7км)','',3.7,1,1,1,25,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;