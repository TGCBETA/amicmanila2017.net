/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.10-MariaDB : Database - amicmanila2017
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

/*Data for the table `countries` */

insert  into `countries`(`id`,`name`,`code`,`status`,`created_at`,`updated_at`) values (1,'Afghanistan','AF',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(2,'Åland Islands','AX',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(3,'Albania','AL',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(4,'Algeria','DZ',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(5,'American Samoa','AS',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(6,'Andorra','AD',1,'2017-02-02 17:00:41','2017-02-02 17:00:41'),(7,'Angola','AO',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(8,'Anguilla','AI',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(9,'Antarctica','AQ',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(10,'Antigua and Barbuda','AG',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(11,'Argentina','AR',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(12,'Armenia','AM',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(13,'Aruba','AW',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(14,'Australia','AU',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(15,'Austria','AT',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(16,'Azerbaijan','AZ',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(17,'Bahamas','BS',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(18,'Bahrain','BH',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(19,'Bangladesh','BD',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(20,'Barbados','BB',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(21,'Belarus','BY',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(22,'Belgium','BE',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(23,'Belize','BZ',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(24,'Benin','BJ',1,'2017-02-02 17:00:42','2017-02-02 17:00:42'),(25,'Bermuda','BM',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(26,'Bhutan','BT',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(27,'Bolivia','BO',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(28,'Bosnia and Herzegovina','BA',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(29,'Botswana','BW',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(30,'Bouvet Island','BV',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(31,'Brazil','BR',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(32,'British Indian Ocean Territory','IO',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(33,'Brunei Darussalam','BN',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(34,'Bulgaria','BG',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(35,'Burkina Faso','BF',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(36,'Burundi','BI',1,'2017-02-02 17:00:43','2017-02-02 17:00:43'),(37,'Cambodia','KH',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(38,'Cameroon','CM',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(39,'Canada','CA',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(40,'Cape Verde','CV',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(41,'Cayman Islands','KY',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(42,'Central African Republic','CF',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(43,'Chad','TD',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(44,'Chile','CL',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(45,'China','CN',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(46,'Christmas Island','CX',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(47,'Cocos (Keeling) Islands','CC',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(48,'Colombia','CO',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(49,'Comoros','KM',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(50,'Congo','CG',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(51,'Congo, The Democratic Republic of The','CD',1,'2017-02-02 17:00:44','2017-02-02 17:00:44'),(52,'Cook Islands','CK',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(53,'Costa Rica','CR',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(54,'Cote D\'ivoire','CI',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(55,'Croatia','HR',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(56,'Cuba','CU',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(57,'Cyprus','CY',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(58,'Czech Republic','CZ',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(59,'Denmark','DK',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(60,'Djibouti','DJ',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(61,'Dominica','DM',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(62,'Dominican Republic','DO',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(63,'Ecuador','EC',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(64,'Egypt','EG',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(65,'El Salvador','SV',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(66,'Equatorial Guinea','GQ',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(67,'Eritrea','ER',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(68,'Estonia','EE',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(69,'Ethiopia','ET',1,'2017-02-02 17:00:45','2017-02-02 17:00:45'),(70,'Falkland Islands (Malvinas)','FK',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(71,'Faroe Islands','FO',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(72,'Fiji','FJ',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(73,'Finland','FI',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(74,'France','FR',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(75,'French Guiana','GF',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(76,'French Polynesia','PF',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(77,'French Southern Territories','TF',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(78,'Gabon','GA',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(79,'Gambia','GM',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(80,'Georgia','GE',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(81,'Germany','DE',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(82,'Ghana','GH',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(83,'Gibraltar','GI',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(84,'Greece','GR',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(85,'Greenland','GL',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(86,'Grenada','GD',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(87,'Guadeloupe','GP',1,'2017-02-02 17:00:46','2017-02-02 17:00:46'),(88,'Guam','GU',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(89,'Guatemala','GT',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(90,'Guernsey','GG',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(91,'Guinea','GN',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(92,'Guinea-bissau','GW',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(93,'Guyana','GY',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(94,'Haiti','HT',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(95,'Heard Island and Mcdonald Islands','HM',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(96,'Holy See (Vatican City State)','VA',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(97,'Honduras','HN',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(98,'Hong Kong','HK',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(99,'Hungary','HU',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(100,'Iceland','IS',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(101,'India','IN',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(102,'Indonesia','ID',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(103,'Iran, Islamic Republic of','IR',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(104,'Iraq','IQ',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(105,'Ireland','IE',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(106,'Isle of Man','IM',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(107,'Israel','IL',1,'2017-02-02 17:00:47','2017-02-02 17:00:47'),(108,'Italy','IT',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(109,'Jamaica','JM',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(110,'Japan','JP',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(111,'Jersey','JE',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(112,'Jordan','JO',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(113,'Kazakhstan','KZ',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(114,'Kenya','KE',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(115,'Kiribati','KI',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(116,'Korea, Democratic People\'s Republic of','KP',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(117,'Korea, Republic of','KR',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(118,'Kuwait','KW',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(119,'Kyrgyzstan','KG',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(120,'Lao People\'s Democratic Republic','LA',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(121,'Latvia','LV',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(122,'Lebanon','LB',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(123,'Lesotho','LS',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(124,'Liberia','LR',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(125,'Libyan Arab Jamahiriya','LY',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(126,'Liechtenstein','LI',1,'2017-02-02 17:00:48','2017-02-02 17:00:48'),(127,'Lithuania','LT',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(128,'Luxembourg','LU',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(129,'Macao','MO',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(130,'Macedonia, The Former Yugoslav Republic of','MK',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(131,'Madagascar','MG',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(132,'Malawi','MW',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(133,'Malaysia','MY',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(134,'Maldives','MV',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(135,'Mali','ML',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(136,'Malta','MT',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(137,'Marshall Islands','MH',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(138,'Martinique','MQ',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(139,'Mauritania','MR',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(140,'Mauritius','MU',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(141,'Mayotte','YT',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(142,'Mexico','MX',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(143,'Micronesia, Federated States of','FM',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(144,'Moldova, Republic of','MD',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(145,'Monaco','MC',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(146,'Mongolia','MN',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(147,'Montenegro','ME',1,'2017-02-02 17:00:49','2017-02-02 17:00:49'),(148,'Montserrat','MS',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(149,'Morocco','MA',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(150,'Mozambique','MZ',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(151,'Myanmar','MM',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(152,'Namibia','NA',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(153,'Nauru','NR',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(154,'Nepal','NP',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(155,'Netherlands','NL',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(156,'Netherlands Antilles','AN',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(157,'New Caledonia','NC',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(158,'New Zealand','NZ',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(159,'Nicaragua','NI',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(160,'Niger','NE',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(161,'Nigeria','NG',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(162,'Niue','NU',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(163,'Norfolk Island','NF',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(164,'Northern Mariana Islands','MP',1,'2017-02-02 17:00:50','2017-02-02 17:00:50'),(165,'Norway','NO',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(166,'Oman','OM',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(167,'Pakistan','PK',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(168,'Palau','PW',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(169,'Palestinian Territory, Occupied','PS',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(170,'Panama','PA',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(171,'Papua New Guinea','PG',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(172,'Paraguay','PY',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(173,'Peru','PE',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(174,'Philippines','PH',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(175,'Pitcairn','PN',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(176,'Poland','PL',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(177,'Portugal','PT',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(178,'Puerto Rico','PR',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(179,'Qatar','QA',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(180,'Reunion','RE',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(181,'Romania','RO',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(182,'Russian Federation','RU',1,'2017-02-02 17:00:51','2017-02-02 17:00:51'),(183,'Rwanda','RW',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(184,'Saint Helena','SH',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(185,'Saint Kitts and Nevis','KN',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(186,'Saint Lucia','LC',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(187,'Saint Pierre and Miquelon','PM',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(188,'Saint Vincent and The Grenadines','VC',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(189,'Samoa','WS',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(190,'San Marino','SM',1,'2017-02-02 17:00:52','2017-02-02 17:00:52'),(191,'Sao Tome and Principe','ST',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(192,'Saudi Arabia','SA',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(193,'Senegal','SN',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(194,'Serbia','RS',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(195,'Seychelles','SC',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(196,'Sierra Leone','SL',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(197,'Singapore','SG',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(198,'Slovakia','SK',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(199,'Slovenia','SI',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(200,'Solomon Islands','SB',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(201,'Somalia','SO',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(202,'South Africa','ZA',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(203,'South Georgia and The South Sandwich Islands','GS',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(204,'Spain','ES',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(205,'Sri Lanka','LK',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(206,'Sudan','SD',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(207,'Suriname','SR',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(208,'Svalbard and Jan Mayen','SJ',1,'2017-02-02 17:00:53','2017-02-02 17:00:53'),(209,'Swaziland','SZ',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(210,'Sweden','SE',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(211,'Switzerland','CH',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(212,'Syrian Arab Republic','SY',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(213,'Taiwan, Province of China','TW',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(214,'Tajikistan','TJ',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(215,'Tanzania, United Republic of','TZ',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(216,'Thailand','TH',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(217,'Timor-leste','TL',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(218,'Togo','TG',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(219,'Tokelau','TK',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(220,'Tonga','TO',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(221,'Trinidad and Tobago','TT',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(222,'Tunisia','TN',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(223,'Turkey','TR',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(224,'Turkmenistan','TM',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(225,'Turks and Caicos Islands','TC',1,'2017-02-02 17:00:54','2017-02-02 17:00:54'),(226,'Tuvalu','TV',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(227,'Uganda','UG',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(228,'Ukraine','UA',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(229,'United Arab Emirates','AE',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(230,'United Kingdom','GB',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(231,'United States','US',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(232,'United States Minor Outlying Islands','UM',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(233,'Uruguay','UY',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(234,'Uzbekistan','UZ',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(235,'Vanuatu','VU',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(236,'Venezuela','VE',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(237,'Viet Nam','VN',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(238,'Virgin Islands, British','VG',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(239,'Virgin Islands, U.S.','VI',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(240,'Wallis and Futuna','WF',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(241,'Western Sahara','EH',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(242,'Yemen','YE',1,'2017-02-02 17:00:55','2017-02-02 17:00:55'),(243,'Zambia','ZM',1,'2017-02-02 17:00:56','2017-02-02 17:00:56'),(244,'Zimbabwe','ZW',1,'2017-02-02 17:00:56','2017-02-02 17:00:56');

/*Table structure for table `group_registrations` */

DROP TABLE IF EXISTS `group_registrations`;

CREATE TABLE `group_registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `no_of_registrants` int(11) DEFAULT NULL,
  `reg_category` varchar(100) DEFAULT NULL,
  `payment_opt` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `paid` int(2) DEFAULT '0',
  `payment_date` varchar(50) DEFAULT NULL,
  `payment_status` int(2) DEFAULT '0',
  `txn_id` varchar(100) DEFAULT NULL,
  `txn_type` varchar(255) DEFAULT NULL,
  `address_status` varchar(255) DEFAULT NULL,
  `payer_id` varchar(100) DEFAULT NULL,
  `ipn_track_id` varchar(100) DEFAULT NULL,
  `receipt_id` varchar(100) DEFAULT NULL,
  `mc_fee` decimal(10,2) DEFAULT NULL,
  `confirmation_no` varchar(100) DEFAULT NULL,
  `reg_rate` decimal(10,2) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `f_city_tour` int(2) DEFAULT '0',
  `l_city_tour` int(2) DEFAULT '0',
  `l_city_tour_rate` decimal(10,2) DEFAULT '0.00',
  `l_conference_day` int(2) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `group_registrations` */

insert  into `group_registrations`(`id`,`email`,`contact`,`country`,`no_of_registrants`,`reg_category`,`payment_opt`,`status`,`paid`,`payment_date`,`payment_status`,`txn_id`,`txn_type`,`address_status`,`payer_id`,`ipn_track_id`,`receipt_id`,`mc_fee`,`confirmation_no`,`reg_rate`,`total_fee`,`currency`,`f_city_tour`,`l_city_tour`,`l_city_tour_rate`,`l_conference_day`,`created_at`,`updated_at`) values (1,'markfrancis@thegoodchronicle.com','1234567','US',6,'f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-GRP-2017-000001','250.00','1250.00','U',1,0,'0.00',NULL,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(2,'markfrancis@thegoodchronicle.com','1234567','US',2,'f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00','500.00','U',1,0,'0.00',NULL,'2017-02-15 16:49:43','2017-02-15 16:49:43'),(3,'markfrancis@thegoodchronicle.com','1234567','US',2,'f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00','500.00','U',1,0,'0.00',NULL,'2017-02-15 16:51:52','2017-02-15 16:51:52'),(4,'markfrancis@thegoodchronicle.com','1234567','PH',2,'l_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5000.00','22000.00','P',NULL,1,'1000.00',2,'2017-02-15 16:55:10','2017-02-15 16:55:10'),(5,'markfrancis@thegoodchronicle.com','d','AF',5,'f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00','2000.00','U',1,0,'0.00',NULL,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(6,'markfrancis@thegoodchronicle.com','1234567','AF',3,'f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00','750.00','U',1,0,'0.00',NULL,'2017-02-21 11:00:42','2017-02-21 11:00:42');

/*Table structure for table `rates` */

DROP TABLE IF EXISTS `rates`;

CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(255) DEFAULT NULL,
  `desc` text,
  `early_bird_rate` decimal(10,2) DEFAULT '0.00',
  `rate` decimal(10,2) DEFAULT '0.00',
  `walkin_rate` decimal(10,2) DEFAULT '0.00',
  `currency` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `rates` */

insert  into `rates`(`id`,`rate_name`,`desc`,`early_bird_rate`,`rate`,`walkin_rate`,`currency`,`created_at`,`updated_at`) values (1,'f_amic_member','AMIC Member','250.00','350.00','400.00','U',NULL,NULL),(2,'f_non_amic_member','Non-AMIC Member','400.00','500.00','550.00','U',NULL,NULL),(3,'f_student','Foreign Student','250.00','250.00','300.00','U',NULL,NULL),(4,'l_amic_member','AMIC Member','3000.00','3000.00','4000.00','P',NULL,NULL),(5,'l_non_amic_member','Non-AMIC Member','5000.00','5000.00','6000.00','P',NULL,NULL),(6,'l_student','Local Student','800.00','800.00','1000.00','P',NULL,NULL),(7,'l_student_observer','Local Student Observer','500.00','500.00','500.00','P',NULL,NULL),(8,'l_city_tour','Conference Organized City Tour','1000.00','1000.00','1000.00','P',NULL,NULL);

/*Table structure for table `registrations` */

DROP TABLE IF EXISTS `registrations`;

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `reg_category` varchar(100) DEFAULT NULL,
  `payment_opt` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `paid` int(2) DEFAULT '0',
  `payment_date` varchar(50) DEFAULT NULL,
  `payment_status` int(2) DEFAULT '0',
  `txn_id` varchar(100) DEFAULT NULL,
  `txn_type` varchar(255) DEFAULT NULL,
  `address_status` varchar(255) DEFAULT NULL,
  `payer_id` varchar(100) DEFAULT NULL,
  `ipn_track_id` varchar(100) DEFAULT NULL,
  `receipt_id` varchar(100) DEFAULT NULL,
  `mc_fee` decimal(10,2) DEFAULT NULL,
  `confirmation_no` varchar(100) DEFAULT NULL,
  `reg_rate` decimal(10,2) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `f_city_tour` int(2) DEFAULT '0',
  `l_city_tour` int(2) DEFAULT '0',
  `l_city_tour_rate` decimal(10,2) DEFAULT '0.00',
  `l_conference_day` int(2) DEFAULT '0',
  `reg_type` varchar(100) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `registrations` */

insert  into `registrations`(`id`,`firstname`,`lastname`,`organization`,`nationality`,`profession`,`gender`,`phone`,`email`,`address1`,`address2`,`city`,`province`,`country`,`zipcode`,`reg_category`,`payment_opt`,`status`,`paid`,`payment_date`,`payment_status`,`txn_id`,`txn_type`,`address_status`,`payer_id`,`ipn_track_id`,`receipt_id`,`mc_fee`,`confirmation_no`,`reg_rate`,`total_fee`,`currency`,`f_city_tour`,`l_city_tour`,`l_city_tour_rate`,`l_conference_day`,`reg_type`,`group`,`created_at`,`updated_at`) values (1,'Mark Francis','Lomugdang','fsdf','sdfasdf','sdfasdf','male','sdfasdf','markfrancis@thegoodchronicle.com','sdfasdfasasdf',NULL,'sdfasdf','sdfasdf','US','95131','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000001','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(2,'asdfas','fasdfas','dfasd','asdfasf','sdfasdf','male','2354234234','markfrancis@thegoodchronicle.com','asdfasdf',NULL,'asdfas','fasdfasdf','US','95131','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000002','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(3,'asdfasf','asdfasf','asdfasd','fasdfasdf','asdfasdf','male','34234234','markfrancis@thegoodchronicle.com','asdfasfasf',NULL,'asdfas','dfasdfas','US','95131','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000003','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(4,'asfasdf','asdfasdf','asdf','asdfasdf','asdfasdfas','male','1234567','markfrancis@thegoodchronicle.com','asdfasdfas',NULL,'asdfasf','asdfasfasf','US','95131','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000004','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(5,'asdfasdfasf','asdfasdf','asdfasd','fasdfasdf','asdfasdf','male','1234566','markfrancis@thegoodchronicle.com','asfasdf',NULL,'asdfas','fasdfasdfa','US','95131','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000005','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(6,'asdfasfasd','asdfasdfas','asdfasd','fasdfasd','fasdfasdfasf','male','34234234234','markfrancis@thegoodchronicle.com','asdfasdfasdfas',NULL,'asdfasdfasdf','asdfasdfasdfasdf','US','1234','f_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000006','250.00',NULL,'U',1,0,'0.00',NULL,'group',1,'2017-02-15 16:38:52','2017-02-15 16:38:52'),(7,'Mark ','dfasdfsdfasd','sdfasdfasd','sdfasfasdf','sdafasdfasdf','male','123455667','markfrancis@thegoodchronicle.com','asdfasfas',NULL,'asdfasf','asdfasdfasdf','US','1234','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',2,'2017-02-15 16:49:43','2017-02-15 16:49:43'),(8,'asdfasf','asdfas','fasdf','asdfasdf','asdfasdfas','male','1234567','markfrancis@thegoodchronicle.com','asdfasfsfs f',NULL,'asdfasfasdf asdfasd','asdf asdfas fasdf','US','95131','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',2,'2017-02-15 16:49:43','2017-02-15 16:49:43'),(9,'asdfasdfsd','fasdfasdfas','fasd','fasdfasdf','asdfasdfa','male','1234567','markfrancis@thegoodchronicle.com','asdfasdfasdfasdfas',NULL,'asdfasf','asdfasfa','US','12334','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',3,'2017-02-15 16:51:52','2017-02-15 16:51:52'),(10,'sdfasfasdf asf','asdfasdfasdfas','dfasf','asfa','sdfasdfasf','male','234234','markfrancis@thegoodchronicle.com','asdfasfasfas',NULL,'asdfasf','asdfasfas','US','1234','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',3,'2017-02-15 16:51:52','2017-02-15 16:51:52'),(11,'asdfasdfasd','f asdfdf ','asdf asdf','asdf asdf','asdf asdf','male','1234567','markfrancis@thegoodchronicle.com','asdfasdfasdfasdf',NULL,'asdfasdfas','dfasdfasdfasf','PH','1234','l_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5000.00',NULL,'P',NULL,1,'1000.00',2,'group',4,'2017-02-15 16:55:10','2017-02-15 16:55:10'),(12,'sadfasdfsdf','asdfasf','asdfas','dfasd','asdfasfasdf','male','1234567','markfrancis@thegoodchronicle.com','dfasdfasdfasdf',NULL,'asdfasfasf','asfasdfasdf','PH','1234','l_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5000.00',NULL,'P',NULL,1,'1000.00',2,'group',4,'2017-02-15 16:55:10','2017-02-15 16:55:10'),(13,'Mark Francis','Lomugdang','The Good Chronicle','Filipino','Web Programmer','male','1234567','markfrancis@thegoodchronicle.com','Unit 210 Amberland Plaza, Julia Vargas Ave. Ortigas Center',NULL,'Pasig City','NCR','PH','1605','l_amic_member','bank',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AMIC-2017-000007','3000.00','7000.00','P',0,1,'1000.00',2,'single',NULL,'2017-02-16 09:41:00','2017-02-16 09:41:00'),(14,'d','d','d','d','d','female','ad','francis.lomugdang@gmail.com','d',NULL,'d','d','DZ','d','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00','400.00','U',1,0,'0.00',0,'single',NULL,'2017-02-16 09:43:17','2017-02-16 10:48:10'),(15,'l','l','l','l','l','male','888888','markfrancis@thegoodchronicle.com','k',NULL,'k','k','AF','k','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00',NULL,'U',1,0,'0.00',NULL,'group',5,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(16,'k','k','k','k','k','male','l','markfrancis@thegoodchronicle.com','Address 1',NULL,'Pasig City','California','AF','95131','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00',NULL,'U',1,0,'0.00',NULL,'group',5,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(17,'d','k','k','k','k','male','d','markfrancis@thegoodchronicle.com','d',NULL,'d','d','AF','1605','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00',NULL,'U',1,0,'0.00',NULL,'group',5,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(18,'d','d','d','d','d','female','d','markfrancis@thegoodchronicle.com','d',NULL,'d','d','AF','d','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00',NULL,'U',1,0,'0.00',NULL,'group',5,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(19,'k','kk','k','kk','k','male','1234567','markfrancis@thegoodchronicle.com','k',NULL,'k','k','AF','kk','f_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'400.00',NULL,'U',1,0,'0.00',NULL,'group',5,'2017-02-21 10:53:40','2017-02-21 10:53:40'),(20,'j','j','j','j','j','male','1234567','markfrancis@thegoodchronicle.com','1 Main St.',NULL,'San Jose','d','AF','768','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',6,'2017-02-21 11:00:43','2017-02-21 11:00:43'),(21,'k','k','k','k','k','male','987','markfrancis@thegoodchronicle.com','k',NULL,'k','k','AF','876','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',6,'2017-02-21 11:00:43','2017-02-21 11:00:43'),(22,'d','d','d','d','d','male','d','markfrancis@thegoodchronicle.com','d',NULL,'d','d','AF','95131','f_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'250.00',NULL,'U',1,0,'0.00',NULL,'group',6,'2017-02-21 11:00:43','2017-02-21 11:00:43'),(23,'Mark Francis','Lomugdang','The Good Chronicle','Filipino','Web Programmer','male','1234567','markfrancis@thegoodchronicle.com','Unit 210',NULL,'Pasig City','Metro Manila','PH','1605','l_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5000.00','6000.00','P',0,1,'1000.00',0,'single',NULL,'2017-03-20 11:05:20','2017-03-20 11:05:20'),(24,'Mark Francis','Lomugdang','The Good Chronicle','Filipino','Web Programmer','male','1234567','markfrancis@thegoodchronicle.com','Unit 210',NULL,'Pasig City','Metro Manila','PH','1605','l_non_amic_member','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5000.00','6000.00','P',0,1,'1000.00',0,'single',NULL,'2017-03-20 11:07:57','2017-03-20 11:07:57'),(25,'Mark Francis','Lomugdang','The Good Chronicle','Filipino','Web Programmer','male','1234567','markfrancis@thegoodchronicle.com','Unit 210',NULL,'Pasig City','Metro Manila','PH','1605','l_student','creditcard',0,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'800.00','800.00','P',0,0,'0.00',0,'single',NULL,'2017-03-20 11:09:55','2017-03-20 11:09:55');

/* Procedure structure for procedure `usp_generate_confirmation_no` */

/*!50003 DROP PROCEDURE IF EXISTS  `usp_generate_confirmation_no` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_generate_confirmation_no`(
	_ID INT
    )
BEGIN
	DECLARE _SEQ INT;
	DECLARE _CONFIRMATION_NO VARCHAR(20);
	DECLARE _LAST_CONFIRMATION_NO VARCHAR(20);
	
	SELECT confirmation_no INTO _LAST_CONFIRMATION_NO FROM registrations
	WHERE LEFT(right(confirmation_no, 11), 4) = EXTRACT(YEAR FROM NOW()) ORDER BY ID DESC LIMIT 1;
	IF IFNULL(_LAST_CONFIRMATION_NO, '') = '' THEN
		SET _CONFIRMATION_NO = CONCAT('AMIC-', EXTRACT(YEAR FROM NOW()), '-', '000001');
	ELSE
		SET _SEQ = RIGHT(_LAST_CONFIRMATION_NO, 6);
		SET _CONFIRMATION_NO = CONCAT('AMIC-', EXTRACT(YEAR FROM NOW()),'-', RIGHT(CONCAT('000000', _SEQ + 1), 6));
	END IF;
	UPDATE registrations SET confirmation_no = _CONFIRMATION_NO WHERE id = _ID;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `usp_generate_group_confirmation_no` */

/*!50003 DROP PROCEDURE IF EXISTS  `usp_generate_group_confirmation_no` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_generate_group_confirmation_no`(
	_ID INT
    )
BEGIN
	DECLARE _SEQ INT;
	DECLARE _CONFIRMATION_NO VARCHAR(20);
	DECLARE _LAST_CONFIRMATION_NO VARCHAR(20);
	
	SELECT confirmation_no INTO _LAST_CONFIRMATION_NO FROM group_registrations
	WHERE LEFT(right(confirmation_no, 11), 4) = EXTRACT(YEAR FROM NOW()) ORDER BY ID DESC LIMIT 1;
	IF IFNULL(_LAST_CONFIRMATION_NO, '') = '' THEN
		SET _CONFIRMATION_NO = CONCAT('AMIC-GRP-', EXTRACT(YEAR FROM NOW()), '-', '000001');
	ELSE
		SET _SEQ = RIGHT(_LAST_CONFIRMATION_NO, 6);
		SET _CONFIRMATION_NO = CONCAT('AMIC-GRP-', EXTRACT(YEAR FROM NOW()),'-', RIGHT(CONCAT('000000', _SEQ + 1), 6));
	END IF;
	UPDATE group_registrations SET confirmation_no = _CONFIRMATION_NO WHERE id = _ID;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
