/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.9-MariaDB : Database - lht_prod
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lht_prod` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `AccountNo` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `LoginType` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`AccountNo`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

insert  into `accounts`(`AccountNo`,`LastName`,`FirstName`,`Username`,`Password`,`LoginType`) values (1,NULL,NULL,'Rolen','5f4dcc3b5aa765d61d8327deb882cf99','admin'),(2,NULL,NULL,'JMDMktg','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(3,NULL,NULL,'VEEnt','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(4,NULL,NULL,'Voschtech','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(5,NULL,NULL,'DJZTrd','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(6,NULL,NULL,'Solarfoam','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(7,NULL,NULL,'HGCECo','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(8,NULL,NULL,'mtest','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(9,NULL,NULL,'TestEmail','25d55ad283aa400af464c76d713c07ad','supplier'),(10,NULL,NULL,'testabc','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(11,'test','abc','test@yahoo.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(12,NULL,NULL,NULL,'5f4dcc3b5aa765d61d8327deb882cf99','customer'),(13,NULL,NULL,'test@abc.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(14,NULL,NULL,'friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(15,NULL,NULL,'friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(16,NULL,NULL,'test@abc.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(17,NULL,NULL,'friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(18,NULL,NULL,'friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(19,NULL,NULL,'test@abc.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(20,NULL,NULL,'melyza.sobrino@novaliches.sti.edu','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(21,NULL,NULL,NULL,'5f4dcc3b5aa765d61d8327deb882cf99','customer'),(22,NULL,NULL,NULL,'5f4dcc3b5aa765d61d8327deb882cf99','customer'),(23,NULL,NULL,NULL,'5f4dcc3b5aa765d61d8327deb882cf99','customer'),(24,NULL,NULL,'rolen.lampano@novaliches.sti.edu','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(25,NULL,NULL,'melyza.sobrino03@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(26,NULL,NULL,'JOHNPATRICK.DEJESUS@novaliches.sti.edu','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(27,'Friaz','Mark Anthony','friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(28,'Friaz','Mark Anthony','friazmarkanthony@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(29,'Friaz','Mark Anthony','markanthony.friaz@emerson.com','5f4dcc3b5aa765d61d8327deb882cf99','customer'),(30,'Friaz','Mark Anthony','friazmarkanthony@gmail.com','888de0d4350ab614478c5c86efc6cd18','customer'),(31,'test','deliver','deliver','5f4dcc3b5aa765d61d8327deb882cf99','deliver'),(32,'testlive','test','test@yahoo.com','84f77923b1c32ef5af64c581a5613c4d','customer'),(33,NULL,NULL,NULL,'31cb061706697336e9b3953fa02b013c','customer'),(34,NULL,NULL,NULL,'768c18ff94f72b29bfd791f36979fd93','customer'),(35,'testlive','live','friazmarkanthony@icloud.com','4a6f09d72749c5c8a46e267eb7be3cf6','customer'),(36,'De Jesus','Patrick','patrick.dejesus@gmail.com','223083b4e884eb0e0f6f7ebd1d204720','customer'),(37,NULL,NULL,NULL,'a077c664b4b925e57d62722ba5653fce','customer'),(38,NULL,NULL,NULL,'787326fcbb907e1f77f972e2c500f0d6','customer'),(39,'Lampano','Rolen','asdfghjkl@gmail.com','179536a2e2299874fd9566bef480dbe0','customer'),(40,NULL,NULL,NULL,'4e63fc0a8a352b44b582588a3ae32d74','customer'),(41,NULL,NULL,NULL,'d5e3bc1b8709c1855dfa73b878984c05','customer'),(42,NULL,NULL,'friazmarkanthony2@gmail.com','6a150caab55c8303303b19b02a232277','customer'),(43,'Friaz','Mark Anthony','friazmarkanthony1231@gmail.com','b8b2c18a41cd8664e670c2c099375ccd','customer'),(44,'Friaz','Mark Anthony','friazmarkanthony1231@gmail.com','e482ddf124c232fcd666c7a57d996dfb','customer');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `AdminNo` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `AuthorityLevel` varchar(30) DEFAULT NULL,
  `ContactNo` decimal(11,0) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `AccountNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`AdminNo`),
  KEY `FKAccount_admin` (`AccountNo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`AdminNo`,`Name`,`AuthorityLevel`,`ContactNo`,`Address`,`AccountNo`) values (1,'Rolen','Owner','1234124','Gen. Luis',NULL),(2,'Raemond','Co-owner','13134341','Sta Lucia',NULL),(3,'Melyza','Manager','4224231','Sabungan',NULL),(4,'Patrick','Worker','4356345','Caloocan',NULL),(5,'Marc','Worker','9296940118','Bukaneg St Sta Lucia Novaliches Quezon City',NULL),(6,'Hannah','Manager','549811651','Fairview',NULL),(7,'Ed','watcher','897456321','BukanegGroundz',NULL);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `CustomerNo` int(11) NOT NULL AUTO_INCREMENT,
  `Lastname` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `HomeAddress` text NOT NULL,
  `ShipAddress` text,
  `Landmark` text NOT NULL,
  `access_token` text,
  `code` text,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CustomerNo`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`CustomerNo`,`Lastname`,`Firstname`,`ContactNo`,`Email`,`HomeAddress`,`ShipAddress`,`Landmark`,`access_token`,`code`,`CreatedDate`) values (26,'DeLa Cruz','Juan','9278912149','juandelacruz@gmail.com','120 Manila Philippines','120 Manila Philippines','','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-01-19 15:45:51'),(33,'Sobrino','Melyza','9496551747','melyza.sobrino03@gmail.com','Caloocan','Caloocan','','cDsAQX6p_gX2_yrg_CBpZnS5Biul8I3uof-vQFqZ2wM','eXt49rBrCj74noCadLz8hpq6b6tpE59XF5ex8yukn8dahBkdjAuXaLyBFaeze9FB7LqnhM6e5GsdRrp8UGAAz6F6j9A6Sdp6KyUjRGo8szp9jKHrdxybHgKRKpu4RikRgqdiRaxuGzxqxH6z9ykH5kGnGs6e6grU599brSpeAz5F5arKnUb7eops8AL4Xh6kz87FE5L4yFA5d9Luzx8Kdhjzxrnupq54eF5x6Azt7BLjGh6G4KaCorr8jCqnEyAt','2017-01-31 09:47:41'),(27,'test','test','9278912149','test@abc.com','test, test','test, test','','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-01-20 01:52:19'),(28,'Sobrino','Melyza','9496551747','melyza.sobrino@novaliches.sti.edu','Caloocan ','Caloocan ','','cDsAQX6p_gX2_yrg_CBpZnS5Biul8I3uof-vQFqZ2wM','eXt49rBrCj74noCadLz8hpq6b6tpE59XF5ex8yukn8dahBkdjAuXaLyBFaeze9FB7LqnhM6e5GsdRrp8UGAAz6F6j9A6Sdp6KyUjRGo8szp9jKHrdxybHgKRKpu4RikRgqdiRaxuGzxqxH6z9ykH5kGnGs6e6grU599brSpeAz5F5arKnUb7eops8AL4Xh6kz87FE5L4yFA5d9Luzx8Kdhjzxrnupq54eF5x6Azt7BLjGh6G4KaCorr8jCqnEyAt','2017-01-21 08:50:14'),(29,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-01-24 22:55:33'),(30,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-01-25 00:03:44'),(31,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-01-25 00:04:31'),(32,'Lampano','Rolen','9352442620','rolen.lampano@novaliches.sti.edu','#26 Torres Village nagkaisang nayon Quezon City','#26 Torres Village nagkaisang nayon Quezon City','','md_N5PoZUT47he8J_PkDPV3g8PJRPuhYpgLddjK4cqc','kGsy6yKxszrekgUgAb57Ho9p4nhkdRo5u4RzdrIdbgxLtEbGbACX8BRkt56jakudy8bdCGKpgrFBqeyGIKgzgqu4pMMBsrbKq8HAx7KEh674dBtKXXygHeXMMeCp5crMAyAcMnGC8kXX5Hrg4pXtdq7MyhrKKraHgqME7sqLzBou4yeKbIoepERFda8yqC5djARuojBGBtLKGpECBkgg4tyAzroI7gRjAun9p5ohKAbn5HjoegGUEyypesgjG5ps','2017-01-30 19:28:09'),(34,'Dejesus','Patrick','9353040116','JOHNPATRICK.DEJESUS@novaliches.sti.edu','caloocan','caloocan','','ovqXsyQ4clPOoBLu9nb_hmNJFPaBiCAFyeKVtzcevQw','BMCBqKKXsdzBdLIzgbx9skpyzRIdpLyrI8474jCerG7btA5gnzfM5x4KC4Ge49SKLbz5S8xAeyCKqRAXC5dykAFeB7jKILpGLMhy865rUexx4LCdxLqguqA7b7u7oi58nGqi7oKudpLMruoBxx5CdK6XqUxKGLghKX7ypIKeyMqF5gRdxC7EA4rCEybrMSX7ee5S9xxxaC7BggEfoLGeEta77r9CyxL64ILey8qIrXbBgsoMBqbIyRKdLsBK88bC','2017-01-31 22:51:30'),(38,'dela cruz','Juan','9278912149','delacruzjuan@gmail.com','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-01 22:16:24'),(39,'testlive','test','9278912149','test@yahoo.com','test','test','SM Novaliches, Lungsod Quezon, Kalakhang Maynila, Pilipinas','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-03 13:43:01'),(40,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-03 13:43:03'),(41,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-03 13:43:31'),(43,'De Jesus','Patrick','9432660109','patrick.dejesus@gmail.com','Caloocan City','Caloocan City','STI College Novaliches, Quirino Highway, Novaliches, Quezon City, NCR, Philippines','Xpbg0yCCR9sssP9wRGJ0Gzo0zZWMT3EojdvsdzjG5R0','j9spRMMEtrBXEKFjgdakUpaqzoC74RdzCBqL85HGEoy4UdMrBjhxLGn5FEabqnhX9bqaI9nAo5fgBBo6FqgbjBSqaneaHK89z4Fbj9qGHKybR6f5qgpoUxzxGEu67Tg9yL8Txxzu8ogGbUrGbqKf4g9KeHR69GaFoLnqAH5zbLMSBrBpMF5rAG6fxob47I7Lb8Bh7rGnGFzxra4h9RogGUr4LyxH6gRBMCyRqp7Cdodp7UkKXboFXkMyKt8LyxBs','2017-02-03 22:31:04'),(44,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-07 10:34:06'),(45,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-13 10:13:03'),(46,'','','9278912149',NULL,'',NULL,'','Dgz8RAWgUjJlXis6fESHir_DCgfeFaz3VZnsetx91h0','x9FjXe78skAXGzUjEj87CXMXzBFj6qzeF4xG64CgyoALCLyr85h7KbnMCLenB5fkEdMBf4ojpXtkMyKEueX78bf7b5kdUEGy6kUXkk8BtModXjIzjoz4SB8xGEu67ca9x5jcxxzu8oo6RS4Kdr6IA6kMptryyj6UBk5XaU947Mxfa5yBnuKBjBdt7xdo6fn4nydfpBbGLCbMrxdhrjob9C8oG6rCjyqMpFq7X4XFa5j56CpeX5oUGded4s5MX6oF','2017-02-15 01:33:52'),(47,'Friaz','Mark Anthony','6392789121','friazmarkanthony@gmail.com','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','',NULL,NULL,'2017-02-16 00:51:59'),(48,'Friaz','Mark Anthony','0927891214','friazmarkanthony2@gmail.com','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','',NULL,NULL,'2017-02-16 00:53:52'),(49,'Friaz','Mark Anthony','0927891214','friazmarkanthony1231@gmail.com','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','',NULL,NULL,'2017-02-16 01:01:29'),(50,'Friaz','Mark Anthony','0927891214','friazmarkanthony1231@gmail.com','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan','',NULL,NULL,'2017-02-16 01:03:22');

/*Table structure for table `family` */

DROP TABLE IF EXISTS `family`;

CREATE TABLE `family` (
  `FamilyNo` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Family` varchar(30) DEFAULT NULL,
  `FamilyDescription` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`FamilyNo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `family` */

insert  into `family`(`FamilyNo`,`Family`,`FamilyDescription`) values (001,'Paint and Sundries','avsdasdmnfoangojnaerongoanrgoanrwefvownefonawfnmaw'),(002,'Tools','asrhnawtv'),(003,'Electrical',NULL),(004,'Plumbing',NULL),(005,'Home Hardware',NULL),(006,'Houseware',NULL),(007,'Lawn and Outdoor',NULL),(008,'Automotive',NULL),(009,'Small Appliances',NULL),(010,'Chemicals and Batteries',NULL),(011,'','');

/*Table structure for table `fastmovingitem` */

DROP TABLE IF EXISTS `fastmovingitem`;

CREATE TABLE `fastmovingitem` (
  `FastMovingNo` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`FastMovingNo`),
  KEY `FKItem_fastmovingitem` (`ItemNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fastmovingitem` */

/*Table structure for table `forum` */

DROP TABLE IF EXISTS `forum`;

CREATE TABLE `forum` (
  `forum_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Contact No.` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`forum_id`),
  UNIQUE KEY `Id` (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `forum` */

insert  into `forum`(`forum_id`,`forum_name`,`Email`,`Contact No.`,`description`) values (1,' pat\r\n\r\n',NULL,NULL,NULL),(2,'patrick',NULL,NULL,NULL),(3,'john',NULL,NULL,NULL),(4,'dejesus',NULL,NULL,NULL),(5,'lopez',NULL,NULL,NULL),(6,'decastro',NULL,NULL,NULL),(7,'karen',NULL,NULL,NULL);

/*Table structure for table `forum_post` */

DROP TABLE IF EXISTS `forum_post`;

CREATE TABLE `forum_post` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(50) DEFAULT NULL,
  `post_author` varchar(50) DEFAULT NULL,
  `post_body` varchar(50) DEFAULT NULL,
  `post_type` enum('o','r') DEFAULT 'o',
  `op_id` int(8) DEFAULT NULL,
  `forum_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `forum_post` */

insert  into `forum_post`(`post_id`,`post_title`,`post_author`,`post_body`,`post_type`,`op_id`,`forum_name`) values (1,'patrick','john','just a little time baby','o',NULL,'patrick'),(2,'asd',NULL,NULL,'o',NULL,NULL),(7,'adf','adsf','asdf','o',0,'adf');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `ItemNo` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `UOM` varchar(20) DEFAULT NULL,
  `Image` text,
  `BoolFields` tinyint(1) DEFAULT NULL,
  `SizeType` varchar(20) DEFAULT NULL,
  `Removed` tinyint(1) DEFAULT NULL,
  `Owned` tinyint(1) DEFAULT NULL,
  `Level1No` int(11) DEFAULT NULL,
  `Level2No` int(11) DEFAULT NULL,
  `Level3No` int(11) DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `SRemoved` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ItemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`ItemNo`,`Name`,`UOM`,`Image`,`BoolFields`,`SizeType`,`Removed`,`Owned`,`Level1No`,`Level2No`,`Level3No`,`SupplierNo`,`SRemoved`) values (0056,'test','ea',NULL,NULL,NULL,0,1,26,43,58,11,1),(0057,'test2','ea',NULL,NULL,NULL,0,1,26,43,58,11,1),(0058,'Impact Drill','set',NULL,NULL,NULL,0,1,32,55,0,11,1),(0059,'Boysen','L',NULL,NULL,NULL,0,1,30,49,67,4,0),(0060,'Faucet','Pc',NULL,NULL,NULL,0,1,31,51,0,11,0),(0061,'Acrylic','Pc',NULL,NULL,NULL,0,0,30,49,67,11,0),(0062,'Crown PVC Orange','Pc',NULL,NULL,NULL,0,1,28,45,78,11,0),(0063,'tesas','ea',NULL,NULL,NULL,0,0,26,0,0,11,0),(0064,'test 100','g',NULL,NULL,NULL,0,0,26,0,0,11,0),(0065,'test srp','ea',NULL,NULL,NULL,0,1,26,0,0,11,0);

/*Table structure for table `itemattribute` */

DROP TABLE IF EXISTS `itemattribute`;

CREATE TABLE `itemattribute` (
  `AttributeID` int(11) NOT NULL AUTO_INCREMENT,
  `AttributeName` varchar(50) DEFAULT NULL,
  `IsRequired` tinyint(1) DEFAULT NULL,
  KEY `AttributeID` (`AttributeID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `itemattribute` */

insert  into `itemattribute`(`AttributeID`,`AttributeName`,`IsRequired`) values (1,'Size',1),(2,'Color',1);

/*Table structure for table `itemvariant` */

DROP TABLE IF EXISTS `itemvariant`;

CREATE TABLE `itemvariant` (
  `VariantNo` int(11) NOT NULL AUTO_INCREMENT,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  `VariantName` text,
  `VariantNameJSON` text,
  `Size` varchar(75) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Description` varchar(75) DEFAULT NULL,
  `Stocks` int(11) DEFAULT NULL,
  `LowStock` int(11) DEFAULT NULL,
  `Critical` int(11) DEFAULT NULL,
  `DPOCost` double DEFAULT NULL COMMENT 'Suppliers price for Admin',
  `SRP` double DEFAULT NULL,
  `Price` double DEFAULT NULL COMMENT 'Admin price for Customer',
  `Removed` tinyint(4) DEFAULT NULL,
  `Owned` tinyint(4) DEFAULT '0',
  `SupplierNo` int(11) DEFAULT NULL,
  `SRemoved` tinyint(4) DEFAULT NULL,
  `ImageFile` text,
  PRIMARY KEY (`VariantNo`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `itemvariant` */

insert  into `itemvariant`(`VariantNo`,`ItemNo`,`VariantName`,`VariantNameJSON`,`Size`,`Color`,`Description`,`Stocks`,`LowStock`,`Critical`,`DPOCost`,`SRP`,`Price`,`Removed`,`Owned`,`SupplierNo`,`SRemoved`,`ImageFile`) values (55,0056,'Size = 1<br/>Color = as<br/>','{\"Size\":\"1\",\"Color\":\"as\"}',NULL,NULL,NULL,16,5,2,11.22,212.33,220,NULL,1,11,NULL,'FILE_20161209014042.jpg'),(56,0057,'Size = 1<br/>Color = sa<br/>','{\"Size\":\"1\",\"Color\":\"sa\"}',NULL,NULL,NULL,19,3,1,23.12,51.22,70,NULL,1,11,NULL,'FILE_20161209024446.jpg'),(57,0057,'Size = 1<br/>Color = as<br/>','{\"Size\":\"1\",\"Color\":\"as\"}',NULL,NULL,NULL,0,NULL,NULL,21.23,53.12,NULL,NULL,1,11,NULL,'FILE_20161209024537.jpg'),(58,0058,'Color = Blue<br/>','{\"Color\":\"Blue\"}',NULL,NULL,NULL,49,10,2,2550,2600,2700,NULL,1,11,NULL,'FILE_20161226032904.JPG'),(59,0058,'Color = Red<br/>','{\"Color\":\"Red\"}',NULL,NULL,NULL,50,10,2,2550,2600,2600,NULL,1,11,NULL,'FILE_20161226032944.jpg'),(60,0059,'Size = 2L<br/>Color = Blue<br/>','{\"Size\":\"2L\",\"Color\":\"Blue\"}',NULL,NULL,NULL,20,5,3,120,130,130,NULL,1,4,NULL,'FILE_20170121020716.jpg'),(61,0060,'Class = Lavatory<br/>Type = Stand<br/>With = None<br/>Without = None<br/>','{\"Class\":\"Lavatory\",\"Type\":\"Stand\",\"With\":\"None\",\"Without\":\"None\"}',NULL,NULL,NULL,99,10,5,267.4,382,382,NULL,1,11,NULL,'FILE_20170203090242.jpg'),(62,0060,'Class = Lavatory<br/>Type = Bug<br/>','{\"Class\":\"Lavatory\",\"Type\":\"Bug\"}',NULL,NULL,NULL,3,10,5,366,480,480,NULL,1,11,NULL,'FILE_20170203090840.jpg'),(63,0060,'Class = Lavatory<br/>Type = Lever<br/>','{\"Class\":\"Lavatory\",\"Type\":\"Lever\"}',NULL,NULL,NULL,0,10,5,296.1,423,423,NULL,1,11,NULL,'FILE_20170203090934.jpg'),(64,0060,'Class = Gooseneck<br/>Type = Lever<br/>','{\"Class\":\"Gooseneck\",\"Type\":\"Lever\"}',NULL,NULL,NULL,21,10,5,180.6,258,258,NULL,1,11,NULL,'FILE_20170203091223.jpg'),(65,0060,'Class = Gooseneck<br/>Type = Sink<br/>','{\"Class\":\"Gooseneck\",\"Type\":\"Sink\"}',NULL,NULL,NULL,0,10,5,180.6,258,258,NULL,1,11,NULL,'FILE_20170203091351.jpg'),(66,0060,'Class = Center<br/>Type = w/o Pop-up<br/>','{\"Class\":\"Center\",\"Type\":\"w\\/o Pop-up\"}',NULL,NULL,NULL,0,NULL,NULL,460,658,NULL,NULL,1,11,NULL,'FILE_20170203091546.jpg'),(67,0060,'Class = Center<br/>Type = Cross<br/>','{\"Class\":\"Center\",\"Type\":\"Cross\"}',NULL,NULL,NULL,NULL,NULL,NULL,476,680,NULL,NULL,0,11,NULL,'FILE_20170203091755.png'),(68,0060,'Class = Long<br/>Type = Toggle<br/>','{\"Class\":\"Long\",\"Type\":\"Toggle\"}',NULL,NULL,NULL,0,NULL,NULL,350,500,NULL,NULL,1,11,NULL,'FILE_20170203091951.jpg'),(69,0060,'Class = Sink<br/>Type = w/ Extra Bibb<br/>','{\"Class\":\"Sink\",\"Type\":\"w\\/ Extra Bibb\"}',NULL,NULL,NULL,0,NULL,NULL,266,380,NULL,NULL,1,11,NULL,'FILE_20170203092204.jpg'),(70,0061,'Size = 1L<br/>Color = red<br/>','{\"Size\":\"1L\",\"Color\":\"red\"}',NULL,NULL,NULL,NULL,NULL,NULL,250,300,NULL,NULL,0,11,NULL,'FILE_20170203035554.jpg'),(71,0061,'Color = blue<br/>','{\"Color\":\"blue\"}',NULL,NULL,NULL,NULL,NULL,NULL,120,180,NULL,NULL,0,11,NULL,'FILE_20170203040058.jpg'),(72,0062,'Color = Orange<br/>','{\"Color\":\"Orange\"}',NULL,NULL,NULL,-5,25,10,11.55,16.5,17,NULL,1,11,NULL,'FILE_20170204025928.png'),(73,0062,'Color = Blue<br/>','{\"Color\":\"Blue\"}',NULL,NULL,NULL,30,25,10,17.5,25,25.5,NULL,1,11,NULL,'FILE_20170204030406.jpg'),(74,0063,'Size = te<br/>Color = s<br/>','{\"Size\":\"te\",\"Color\":\"s\"}',NULL,NULL,NULL,NULL,NULL,NULL,0.5,100,50,NULL,0,11,NULL,'FILE_20170213055259.jpg'),(75,0064,'Size = test<br/>Color = test<br/>','{\"Size\":\"test\",\"Color\":\"test\"}',NULL,NULL,NULL,NULL,NULL,NULL,100,12120,1,NULL,0,11,NULL,'FILE_20170215035328.jpg'),(76,0065,'Size = test<br/>Color = test<br/>','{\"Size\":\"test\",\"Color\":\"test\"}',NULL,NULL,NULL,20,20,2,30,1200,360,NULL,1,11,NULL,'FILE_20170215040533.png');

/*Table structure for table `level1` */

DROP TABLE IF EXISTS `level1`;

CREATE TABLE `level1` (
  `Level1No` int(11) NOT NULL AUTO_INCREMENT,
  `Name1` varchar(50) DEFAULT NULL,
  `Description` text,
  `ImageFile` text,
  PRIMARY KEY (`Level1No`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `level1` */

insert  into `level1`(`Level1No`,`Name1`,`Description`,`ImageFile`) values (26,'Building Materials',NULL,'FILE_20170121011209.png'),(28,'Electrical',NULL,'FILE_20170121010838.jpg'),(29,'Hardware',NULL,'FILE_20170121011713.jpg'),(30,'Paints & Sundries',NULL,'FILE_20170121012719.jpg'),(31,'Plumbing',NULL,'FILE_20170121012916.jpg'),(32,'Tools',NULL,'FILE_20170121013043.jpg');

/*Table structure for table `level2` */

DROP TABLE IF EXISTS `level2`;

CREATE TABLE `level2` (
  `Level2No` int(11) NOT NULL AUTO_INCREMENT,
  `Name2` varchar(50) DEFAULT NULL,
  `Description` text,
  `Level1No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level2No`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `level2` */

insert  into `level2`(`Level2No`,`Name2`,`Description`,`Level1No`) values (42,'Roofing',NULL,26),(43,'Building Supplies',NULL,26),(44,'Ligthning',NULL,28),(45,'Electrical supplies',NULL,28),(46,'Door Essentials',NULL,29),(47,'Pipe',NULL,29),(48,'Hardware Accessories',NULL,29),(49,'Chemicals',NULL,30),(50,'Equipment/Materials',NULL,30),(51,'Faucets',NULL,31),(52,'Kitchen Sink',NULL,31),(53,'Shower',NULL,31),(54,'Hand Tools',NULL,32),(55,'Power Tools',NULL,32);

/*Table structure for table `level3` */

DROP TABLE IF EXISTS `level3`;

CREATE TABLE `level3` (
  `Level3No` int(11) NOT NULL AUTO_INCREMENT,
  `Name3` varchar(50) DEFAULT NULL,
  `Description` text,
  `Level1No` int(11) DEFAULT NULL,
  `Level2No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level3No`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `level3` */

insert  into `level3`(`Level3No`,`Name3`,`Description`,`Level1No`,`Level2No`) values (59,'Door knobs',NULL,29,46),(60,'Handle',NULL,29,46),(61,'Locks',NULL,29,46),(62,'Elbow',NULL,29,48),(63,'Clamp',NULL,29,48),(64,'Connector',NULL,29,48),(65,'Hose',NULL,29,48),(66,'Sealants',NULL,30,49),(67,'Thinner',NULL,30,49),(68,'Paint Brush',NULL,30,50),(69,'Sand Paper',NULL,30,50),(70,'Roller',NULL,30,50),(71,'test',NULL,26,42),(72,'test2',NULL,26,42),(73,'Tiles',NULL,26,43),(74,'Wall Plates',NULL,28,45),(75,'Electrical Tape',NULL,28,45),(76,'Enamel',NULL,30,49),(77,'Metallic',NULL,30,49),(78,'Utility Box',NULL,28,45);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `MessageNo` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `ContactNo` decimal(11,0) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Message` text,
  PRIMARY KEY (`MessageNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `message` */

/*Table structure for table `orderlist` */

DROP TABLE IF EXISTS `orderlist`;

CREATE TABLE `orderlist` (
  `OrderListNo` int(11) NOT NULL AUTO_INCREMENT,
  `Quantity` int(11) DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  `OrderNo` int(8) unsigned zerofill DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  `VariantNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderListNo`),
  KEY `FKOrder_orderlist` (`OrderNo`),
  KEY `FKItem_orderlist` (`ItemNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `orderlist` */

/*Table structure for table `requestlist` */

DROP TABLE IF EXISTS `requestlist`;

CREATE TABLE `requestlist` (
  `RequestListNo` int(11) NOT NULL AUTO_INCREMENT,
  `Quantity` int(11) DEFAULT '1',
  `Total` double DEFAULT NULL,
  `Received` int(11) DEFAULT NULL,
  `TempReceived` int(11) DEFAULT NULL,
  `SupplyRequestNo` int(11) unsigned zerofill DEFAULT NULL,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  `VariantNo` int(11) DEFAULT NULL,
  `SupplyQuantity` int(11) DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `createddate` datetime DEFAULT CURRENT_TIMESTAMP,
  `isPending` int(11) DEFAULT '0',
  PRIMARY KEY (`RequestListNo`),
  KEY `FKSupplyRequest_requestlist` (`SupplyRequestNo`),
  KEY `FKItem_requestlist` (`ItemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

/*Data for the table `requestlist` */

insert  into `requestlist`(`RequestListNo`,`Quantity`,`Total`,`Received`,`TempReceived`,`SupplyRequestNo`,`ItemNo`,`VariantNo`,`SupplyQuantity`,`Temp`,`createdby`,`createddate`,`isPending`) values (211,30,76500,30,1,00000000001,0058,58,NULL,0,'Rolen','2017-01-11 17:13:16',0),(212,30,76500,30,5,00000000001,0058,59,NULL,0,'Rolen','2017-01-11 17:13:17',0),(213,10,112.2,10,5,00000000002,0056,55,NULL,0,'Rolen','2017-01-11 18:06:03',0),(214,10,231.20000000000002,NULL,NULL,00000000002,0057,56,NULL,0,'Rolen','2017-01-11 18:06:06',0),(215,10,1200,5,0,00000000028,0059,60,NULL,0,'Rolen','2017-01-21 09:09:37',1),(216,100,26600,NULL,NULL,00000000030,0060,69,NULL,0,'Rolen','2017-02-03 04:29:23',0),(217,100,35000,NULL,NULL,00000000030,0060,68,NULL,0,'Rolen','2017-02-03 04:29:30',0),(218,100,46000,NULL,NULL,00000000030,0060,66,NULL,0,'Rolen','2017-02-03 04:29:36',0),(219,100,18060,NULL,NULL,00000000030,0060,65,NULL,0,'Rolen','2017-02-03 04:29:41',0),(220,100,18060,NULL,NULL,00000000030,0060,64,NULL,0,'Rolen','2017-02-03 04:29:47',0),(221,100,29610.000000000004,NULL,NULL,00000000030,0060,63,NULL,0,'Rolen','2017-02-03 04:29:51',0),(222,100,36600,NULL,NULL,00000000030,0060,62,NULL,0,'Rolen','2017-02-03 04:29:57',0),(223,100,26739.999999999996,NULL,NULL,00000000030,0060,61,NULL,0,'Rolen','2017-02-03 04:30:00',0),(224,30,8021.999999999999,20,0,00000000033,0060,61,NULL,0,'Rolen','2017-02-03 04:41:01',0),(225,50,577.5,50,0,00000000035,0062,72,NULL,0,'Rolen','2017-02-03 22:10:09',0),(226,50,875,25,0,00000000035,0062,73,NULL,0,'Rolen','2017-02-03 22:10:13',1),(228,28,12880,NULL,NULL,00000000037,0060,66,NULL,0,'Rolen','2017-02-09 21:37:42',0),(229,21,3792.6,21,3,00000000038,0060,64,NULL,0,'Rolen','2017-02-09 21:40:40',0),(230,20,350,20,2,00000000039,0062,73,NULL,0,'Rolen','2017-02-09 22:15:11',0),(231,1,NULL,NULL,NULL,00000000040,0059,60,NULL,0,'Rolen','2017-02-12 21:44:11',0),(232,5,1830,3,0,00000000041,0060,62,NULL,0,'Rolen','2017-02-12 21:46:24',1),(233,50,561,NULL,NULL,00000000042,0056,55,NULL,0,'Rolen','2017-02-12 21:55:32',0),(237,20,7200,20,2,00000000043,0065,76,NULL,0,'Rolen','2017-02-15 23:10:24',0);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `SalesNo` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  PRIMARY KEY (`SalesNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`SalesNo`,`Date`,`TotalAmount`) values (0001,'2016-08-26',800);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `SupplierNo` int(11) NOT NULL AUTO_INCREMENT,
  `SupplierName` varchar(50) NOT NULL,
  `ContactNo` int(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `AccountNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`SupplierNo`),
  KEY `FKAccount_supplier` (`AccountNo`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`SupplierNo`,`SupplierName`,`ContactNo`,`Address`,`Email`,`AccountNo`) values (4,'J.MD. Steel Bars Marketing',2147483647,'Unknown','JMD@gmail.com',2),(11,'V.E. Enterprises',2147483647,'Unknown','VEE@gmail.com',3),(12,'Voschtech',2147483647,'Unknown','VS@gmail.com',4),(13,'DJZ Trading',2147483647,'Unknown','DJZ@gmail.com',5),(14,'Solarfoam',2147483647,'Unknown','SF@gmail.com',6),(16,'House Gem Construction Element Corporation',2147483647,'Unknown','HGCEC@gmail.com',7),(17,'Test Company',0,'Address','Email@gmail.com',8),(18,'Test 2',123456789,'Test 2','friazmarkanthony@gmail.com',9),(19,'test',0,'test','test@yahoo.com',10);

/*Table structure for table `supply` */

DROP TABLE IF EXISTS `supply`;

CREATE TABLE `supply` (
  `SupplyNo` int(11) NOT NULL AUTO_INCREMENT,
  `QuantityReceived` int(11) DEFAULT NULL,
  `PendingQuantity` int(11) DEFAULT NULL,
  `DateReceive` datetime DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `SupplyRequestNo` int(11) unsigned zerofill DEFAULT NULL,
  `RequestListNo` int(11) DEFAULT NULL,
  `ItemNo` int(11) DEFAULT NULL,
  `Temp` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`SupplyNo`),
  KEY `FKSupplier_supply` (`SupplierNo`),
  KEY `FK_supply` (`RequestListNo`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `supply` */

insert  into `supply`(`SupplyNo`,`QuantityReceived`,`PendingQuantity`,`DateReceive`,`SupplierNo`,`SupplyRequestNo`,`RequestListNo`,`ItemNo`,`Temp`) values (1,30,0,'2017-01-11 17:21:13',NULL,00000000001,211,NULL,NULL),(2,30,0,'2017-01-11 17:21:13',NULL,00000000001,212,NULL,NULL),(4,10,0,'2017-01-11 18:10:01',NULL,00000000002,213,NULL,NULL),(5,NULL,NULL,'2017-01-11 18:10:01',NULL,00000000002,214,NULL,NULL),(6,5,5,'2017-01-21 22:12:41',NULL,00000000028,215,NULL,NULL),(7,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,216,NULL,NULL),(8,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,217,NULL,NULL),(9,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,218,NULL,NULL),(10,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,219,NULL,NULL),(11,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,220,NULL,NULL),(12,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,221,NULL,NULL),(13,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,222,NULL,NULL),(14,NULL,NULL,'2017-02-03 17:31:47',NULL,00000000030,223,NULL,NULL),(15,NULL,NULL,'2017-02-03 17:59:47',NULL,00000000033,224,NULL,NULL),(16,50,0,'2017-02-04 11:12:28',NULL,00000000035,225,NULL,NULL),(17,25,25,'2017-02-04 11:12:28',NULL,00000000035,226,NULL,NULL),(18,NULL,NULL,'2017-02-10 10:36:38',NULL,00000000037,228,NULL,NULL),(19,21,0,'2017-02-14 23:12:27',NULL,00000000038,229,NULL,NULL),(20,20,0,'2017-02-10 11:15:34',NULL,00000000039,230,NULL,NULL),(21,3,2,'2017-02-13 10:44:14',NULL,00000000041,232,NULL,NULL),(22,20,0,'2017-02-15 23:18:57',NULL,00000000043,237,NULL,NULL);

/*Table structure for table `supplyrequest` */

DROP TABLE IF EXISTS `supplyrequest`;

CREATE TABLE `supplyrequest` (
  `SupplyRequestNo` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `isReceived` tinyint(1) DEFAULT NULL,
  `DeliveredStatus` varchar(10) DEFAULT '0',
  `DeliveredDate` datetime DEFAULT NULL,
  `ReceivedDate` datetime DEFAULT NULL,
  `isPendingItems` int(11) DEFAULT '0',
  `IsDeliverPending` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SupplyRequestNo`,`IsDeliverPending`),
  KEY `FKSupplier_supplyrequest` (`SupplierNo`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `supplyrequest` */

insert  into `supplyrequest`(`SupplyRequestNo`,`Date`,`SupplierNo`,`isReceived`,`DeliveredStatus`,`DeliveredDate`,`ReceivedDate`,`isPendingItems`,`IsDeliverPending`) values (00000000001,'2017-01-11 17:13:27',11,1,'1','2017-01-11 17:13:46','2017-01-11 17:21:13',0,0),(00000000002,'2017-01-11 18:06:20',11,1,'1','2017-01-11 18:09:04','2017-01-11 18:10:01',0,0),(00000000003,'2017-01-21 22:09:04',4,0,'0',NULL,NULL,0,0),(00000000004,'2017-01-21 22:09:11',4,0,'0',NULL,NULL,0,0),(00000000005,'2017-01-21 22:09:18',4,0,'0',NULL,NULL,0,0),(00000000006,'2017-01-21 22:09:30',4,0,'0',NULL,NULL,0,0),(00000000007,'2017-01-21 22:09:31',4,0,'0',NULL,NULL,0,0),(00000000008,'2017-01-21 22:09:31',4,0,'0',NULL,NULL,0,0),(00000000009,'2017-01-21 22:09:31',4,0,'0',NULL,NULL,0,0),(00000000010,'2017-01-21 22:09:32',4,0,'0',NULL,NULL,0,0),(00000000011,'2017-01-21 22:09:32',4,0,'0',NULL,NULL,0,0),(00000000012,'2017-01-21 22:09:32',4,0,'0',NULL,NULL,0,0),(00000000013,'2017-01-21 22:09:32',4,0,'0',NULL,NULL,0,0),(00000000014,'2017-01-21 22:09:32',4,0,'0',NULL,NULL,0,0),(00000000015,'2017-01-21 22:09:33',4,0,'0',NULL,NULL,0,0),(00000000016,'2017-01-21 22:09:33',4,0,'0',NULL,NULL,0,0),(00000000017,'2017-01-21 22:09:34',4,0,'0',NULL,NULL,0,0),(00000000018,'2017-01-21 22:09:34',4,0,'0',NULL,NULL,0,0),(00000000019,'2017-01-21 22:09:34',4,0,'0',NULL,NULL,0,0),(00000000020,'2017-01-21 22:09:35',4,0,'0',NULL,NULL,0,0),(00000000021,'2017-01-21 22:09:35',4,0,'0',NULL,NULL,0,0),(00000000022,'2017-01-21 22:09:40',4,0,'0',NULL,NULL,0,0),(00000000023,'2017-01-21 22:09:40',4,0,'0',NULL,NULL,0,0),(00000000024,'2017-01-21 22:09:41',4,0,'0',NULL,NULL,0,0),(00000000025,'2017-01-21 22:09:47',4,0,'0',NULL,NULL,0,0),(00000000026,'2017-01-21 22:09:47',4,0,'0',NULL,NULL,0,0),(00000000027,'2017-01-21 22:09:47',4,0,'0',NULL,NULL,0,0),(00000000028,'2017-01-21 22:09:48',4,1,'1','2017-01-21 22:11:30','2017-01-21 22:12:41',1,0),(00000000029,'2017-01-21 22:09:48',4,0,'0',NULL,NULL,0,0),(00000000030,'2017-02-03 17:27:40',11,1,'1','2017-02-03 17:30:54','2017-02-03 17:31:47',0,0),(00000000031,'2017-02-03 17:37:56',11,0,'0',NULL,NULL,0,0),(00000000032,'2017-02-03 17:38:02',11,0,'0',NULL,NULL,0,0),(00000000033,'2017-02-03 17:38:10',11,1,'1','2017-02-03 17:57:56','2017-02-03 17:59:47',0,0),(00000000034,'2017-02-04 11:07:58',11,0,'0',NULL,NULL,0,0),(00000000035,'2017-02-04 11:08:10',11,1,'1','2017-02-04 11:10:23','2017-02-04 11:12:28',0,0),(00000000036,'2017-02-10 10:24:54',11,0,'0',NULL,NULL,0,0),(00000000037,'2017-02-10 10:34:16',11,1,'1','2017-02-10 10:36:08','2017-02-10 10:36:38',0,0),(00000000038,'2017-02-10 10:37:12',11,1,'1','2017-02-10 11:37:27','2017-02-14 23:12:27',0,0),(00000000039,'2017-02-10 11:11:42',11,1,'1','2017-02-10 11:13:36','2017-02-10 11:15:34',0,0),(00000000040,'2017-02-13 10:40:34',4,0,'0',NULL,NULL,0,0),(00000000041,'2017-02-13 10:42:51',11,1,'1','2017-02-13 10:43:46','2017-02-13 10:44:14',1,0),(00000000042,'2017-02-13 10:51:58',11,0,'0',NULL,NULL,0,0),(00000000043,'2017-02-15 23:11:56',11,1,'1','2017-02-15 23:18:39','2017-02-15 23:18:57',0,0);

/*Table structure for table `tbl_month` */

DROP TABLE IF EXISTS `tbl_month`;

CREATE TABLE `tbl_month` (
  `NO` int(11) DEFAULT NULL,
  `MONTH` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_month` */

insert  into `tbl_month`(`NO`,`MONTH`) values (1,'Jan'),(2,'Feb'),(3,'Mar'),(4,'Apr'),(5,'May'),(6,'Jun'),(7,'Jul'),(8,'Aug'),(9,'Sept'),(10,'Oct'),(11,'Nov'),(12,'Dec');

/*Table structure for table `tblauditlogs` */

DROP TABLE IF EXISTS `tblauditlogs`;

CREATE TABLE `tblauditlogs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Transaction` varchar(100) DEFAULT NULL,
  `Action` varchar(50) DEFAULT NULL,
  `TransactionDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=644 DEFAULT CHARSET=latin1;

/*Data for the table `tblauditlogs` */

insert  into `tblauditlogs`(`ID`,`Transaction`,`Action`,`TransactionDate`,`ModifiedBy`) values (1,'Update Family','Update','2016-11-25 18:34:29','Rolen'),(2,'Purchase Order','Insert','2016-11-25 18:57:43','Rolen'),(3,'New Family','Insert','2016-11-25 21:32:45','Rolen'),(4,'New Family','Insert','2016-11-25 21:35:24','Rolen'),(5,'New Category','Insert','2016-11-25 21:36:20','Rolen'),(6,'New Category','Insert','2016-11-25 21:41:01','Rolen'),(7,'New Sub-Category','Insert','2016-11-25 21:41:15','Rolen'),(8,'Update Category','Update','2016-11-25 21:49:10','Rolen'),(9,'Update Sub-Category','Update','2016-11-25 21:49:17','Rolen'),(10,'New Sub-Category','Insert','2016-11-25 21:50:05','Rolen'),(11,'Delete Sub-Category','Delete','2016-11-25 21:50:16','Rolen'),(12,'New Category','Insert','2016-11-25 21:50:41','Rolen'),(13,'Delete Category','Delete','2016-11-25 21:50:47','Rolen'),(14,'New Sub-Category','Insert','2016-11-25 22:11:59','Rolen'),(15,'Delete Sub-Category','Delete','2016-11-25 22:12:27','Rolen'),(16,'Delete Sub-Category','Delete','2016-11-25 22:12:33','Rolen'),(17,'Delete Category','Delete','2016-11-25 22:12:35','Rolen'),(18,'Delete Family','Delete','2016-11-25 22:12:39','Rolen'),(19,'Delete Family','Delete','2016-11-25 22:12:41','Rolen'),(20,'Order number: 00000009  set order status to Process','Update','2016-11-26 00:31:10','Rolen'),(21,'Order number: 00000009  set order status to Ship','Update','2016-11-26 00:31:18','Rolen'),(22,'Decrease Stock after Order to shipped','Update','2016-11-26 00:31:18','Rolen'),(23,'0','Insert','2016-11-30 00:10:17','JMDMktg'),(24,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(25,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(26,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(27,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(28,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(29,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(30,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(31,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(32,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(33,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(34,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(35,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(36,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(37,'Purchase Order','Insert','2016-11-30 00:34:21','Rolen'),(38,'New PO Received','Insert','2016-11-30 00:38:12','Rolen'),(39,'Update Stock after PO Received','Update','2016-11-30 00:38:12','Rolen'),(40,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(41,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(42,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(43,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(44,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(45,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(46,'Purchase Order','Insert','2016-11-30 18:58:18','Rolen'),(47,'New PO Received','Insert','2016-11-30 18:59:04','Rolen'),(48,'Update Stock after PO Received','Update','2016-11-30 18:59:04','Rolen'),(49,'Update Family','Update','2016-12-01 15:07:04','Rolen'),(50,'Update Family','Update','2016-12-01 15:07:11','Rolen'),(51,'Update Family','Update','2016-12-01 17:39:02','Rolen'),(52,'0','Insert','2016-12-01 23:50:21','VEEnt'),(53,'0','Insert','2016-12-01 23:50:21','VEEnt'),(54,'0','Insert','2016-12-01 23:54:18','VEEnt'),(55,'0','Insert','2016-12-01 23:54:18','VEEnt'),(56,'Purchase Order','Insert','2016-12-02 00:07:19','Rolen'),(57,'Purchase Order','Insert','2016-12-02 01:51:01','Rolen'),(58,'New UOM','Insert','2016-12-02 14:51:07','JMDMktg'),(59,'New UOM','Insert','2016-12-02 14:53:31','JMDMktg'),(60,'New UOM','Insert','2016-12-02 15:10:18','JMDMktg'),(61,'New UOM','Insert','2016-12-02 15:11:04','JMDMktg'),(62,'New UOM','Insert','2016-12-02 15:17:26','JMDMktg'),(63,'New UOM','Insert','2016-12-02 15:21:43','JMDMktg'),(64,'New UOM','Insert','2016-12-02 15:22:01','JMDMktg'),(65,'New UOM','Insert','2016-12-02 15:28:57','JMDMktg'),(66,'New UOM','Insert','2016-12-02 15:29:06','JMDMktg'),(67,'New UOM','Insert','2016-12-02 15:29:57','JMDMktg'),(68,'New UOM','Insert','2016-12-02 15:30:39','JMDMktg'),(69,'New UOM','Insert','2016-12-02 21:53:47','JMDMktg'),(70,'New UOM','Insert','2016-12-02 22:01:57','JMDMktg'),(71,'New UOM','Insert','2016-12-02 22:03:43','JMDMktg'),(72,'New UOM','Insert','2016-12-02 22:03:54','JMDMktg'),(73,'New UOM','Insert','2016-12-02 22:04:49','JMDMktg'),(74,'New UOM','Insert','2016-12-02 22:06:21','JMDMktg'),(75,'New UOM','Insert','2016-12-02 22:06:28','JMDMktg'),(76,'New UOM','Insert','2016-12-02 22:06:37','JMDMktg'),(77,'0','Insert','2016-12-02 23:21:06','VEEnt'),(78,'0','Insert','2016-12-02 23:21:06','VEEnt'),(79,'0','Insert','2016-12-02 23:22:48','VEEnt'),(80,'0','Insert','2016-12-02 23:22:48','VEEnt'),(81,'Purchase Order','Insert','2016-12-03 10:00:33','Rolen'),(82,'121','Insert','2016-12-03 10:14:17','VEEnt'),(83,'121','Insert','2016-12-03 10:14:17','VEEnt'),(84,'12','Insert','2016-12-03 10:15:48','VEEnt'),(85,'12','Insert','2016-12-03 10:15:48','VEEnt'),(86,'New PO Received','Insert','2016-12-03 12:56:01','Rolen'),(87,'New PO Received','Insert','2016-12-03 13:03:11','Rolen'),(88,'Update Stock after PO Received','Update','2016-12-03 13:03:11','Rolen'),(89,'Purchase Order','Insert','2016-12-05 22:22:18','Rolen'),(90,'New UOM','Insert','2016-12-07 00:02:09','VEEnt'),(91,'0','Insert','2016-12-07 00:17:14','VEEnt'),(92,'0','Insert','2016-12-07 00:17:14','VEEnt'),(93,'0','Insert','2016-12-07 00:17:14','VEEnt'),(94,'New PO Received','Insert','2016-12-08 01:12:07','Rolen'),(95,'Update Stock after PO Received','Update','2016-12-08 01:12:07','Rolen'),(96,'Purchase Order','Insert','2016-12-08 01:15:13','Rolen'),(97,'New PO Received','Insert','2016-12-08 01:16:26','Rolen'),(98,'Update Stock after PO Received','Update','2016-12-08 01:16:26','Rolen'),(99,'New PO Received','Insert','2016-12-08 01:18:25','Rolen'),(100,'Update Stock after PO Received','Update','2016-12-08 01:18:25','Rolen'),(101,'New PO Received','Insert','2016-12-08 01:18:41','Rolen'),(102,'Update Stock after PO Received','Update','2016-12-08 01:18:41','Rolen'),(103,'Purchase Order','Insert','2016-12-08 01:19:43','Rolen'),(104,'Purchase Order','Insert','2016-12-08 01:25:05','Rolen'),(105,'New PO Received','Insert','2016-12-08 01:26:24','Rolen'),(106,'Update Stock after PO Received','Update','2016-12-08 01:26:24','Rolen'),(107,'0','Insert','2016-12-08 01:34:43','VEEnt'),(108,'0','Insert','2016-12-08 01:34:43','VEEnt'),(109,'0','Insert','2016-12-08 01:34:43','VEEnt'),(110,'0','Insert','2016-12-08 01:34:43','VEEnt'),(111,'0','Insert','2016-12-08 01:34:43','VEEnt'),(112,'Purchase Order','Insert','2016-12-08 01:35:29','Rolen'),(113,'New PO Received','Insert','2016-12-08 01:36:38','Rolen'),(114,'Update Stock after PO Received','Update','2016-12-08 01:36:38','Rolen'),(115,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:20:40','Rolen'),(116,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:21:38','Rolen'),(117,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:24:03','Rolen'),(118,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:24:26','Rolen'),(119,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:24:40','Rolen'),(120,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:24:58','Rolen'),(121,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:27:03','Rolen'),(122,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:27:52','Rolen'),(123,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:28:32','Rolen'),(124,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:08','Rolen'),(125,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:18','Rolen'),(126,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:30:27','Rolen'),(127,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:41','Rolen'),(128,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:31:38','Rolen'),(129,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:31:51','Rolen'),(130,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:31:58','Rolen'),(131,'New UOM','Insert','2016-12-08 23:25:19','VEEnt'),(132,'0','Insert','2016-12-09 00:13:36','VEEnt'),(133,'0','Insert','2016-12-09 00:13:37','VEEnt'),(134,'Purchase Order','Insert','2016-12-09 00:15:09','Rolen'),(135,'New PO Received','Insert','2016-12-09 00:18:29','Rolen'),(136,'Update Stock after PO Received','Update','2016-12-09 00:18:29','Rolen'),(137,'Purchase Order','Insert','2016-12-09 00:25:56','Rolen'),(138,'New PO Received','Insert','2016-12-09 00:26:34','Rolen'),(139,'Update Stock after PO Received','Update','2016-12-09 00:26:34','Rolen'),(140,'Purchase Order','Insert','2016-12-09 00:27:20','Rolen'),(141,'New PO Received','Insert','2016-12-09 00:27:52','Rolen'),(142,'Update Stock after PO Received','Update','2016-12-09 00:27:52','Rolen'),(143,'Update Physical Count for Item variant : 45','Update','2016-12-09 00:33:07','Rolen'),(144,'Update Physical Count for Item variant : 45','Update','2016-12-09 00:33:19','Rolen'),(145,'Update Physical Count for Item variant : 46','Update','2016-12-09 00:34:17','Rolen'),(146,'Update Physical Count for Item variant : 43','Update','2016-12-09 00:35:21','Rolen'),(147,'Update Physical Count for Item variant : 43','Update','2016-12-09 00:35:41','Rolen'),(148,'0','Insert','2016-12-09 01:04:54','VEEnt'),(149,'0','Insert','2016-12-09 01:04:54','VEEnt'),(150,'Purchase Order','Insert','2016-12-09 01:05:41','Rolen'),(151,'0','Insert','2016-12-09 01:08:17','VEEnt'),(152,'0','Insert','2016-12-09 01:08:17','VEEnt'),(153,'Purchase Order','Insert','2016-12-09 01:08:53','Rolen'),(154,'New PO Received','Insert','2016-12-09 01:09:40','Rolen'),(155,'Update Stock after PO Received','Update','2016-12-09 01:09:40','Rolen'),(156,'0','Insert','2016-12-09 01:13:22','VEEnt'),(157,'0','Insert','2016-12-09 01:13:23','VEEnt'),(158,'Purchase Order','Insert','2016-12-09 01:14:24','Rolen'),(159,'New PO Received','Insert','2016-12-09 01:15:31','Rolen'),(160,'Update Stock after PO Received','Update','2016-12-09 01:15:31','Rolen'),(161,'0','Insert','2016-12-09 01:20:39','VEEnt'),(162,'0','Insert','2016-12-09 01:20:39','VEEnt'),(163,'Purchase Order','Insert','2016-12-09 01:23:50','Rolen'),(164,'New PO Received','Insert','2016-12-09 01:24:38','Rolen'),(165,'Update Stock after PO Received','Update','2016-12-09 01:24:38','Rolen'),(166,'0','Insert','2016-12-09 01:28:33','VEEnt'),(167,'0','Insert','2016-12-09 01:28:33','VEEnt'),(168,'Purchase Order','Insert','2016-12-09 01:31:33','Rolen'),(169,'New PO Received','Insert','2016-12-09 01:32:12','Rolen'),(170,'Update Stock after PO Received','Update','2016-12-09 01:32:12','Rolen'),(171,'0','Insert','2016-12-09 08:01:15','VEEnt'),(172,'0','Insert','2016-12-09 08:01:15','VEEnt'),(173,'0','Insert','2016-12-09 08:05:43','VEEnt'),(174,'0','Insert','2016-12-09 08:05:43','VEEnt'),(175,'Purchase Order','Insert','2016-12-09 08:07:49','Rolen'),(176,'New PO Received','Insert','2016-12-09 08:08:29','Rolen'),(177,'New PO Received','Insert','2016-12-09 08:08:31','Rolen'),(178,'New PO Received','Insert','2016-12-09 08:08:43','Rolen'),(179,'New PO Received','Insert','2016-12-09 08:09:17','Rolen'),(180,'New PO Received','Insert','2016-12-09 08:09:47','Rolen'),(181,'Update Stock after PO Received','Update','2016-12-09 08:09:47','Rolen'),(182,'Purchase Order','Insert','2016-12-09 08:15:35','Rolen'),(183,'New PO Received','Insert','2016-12-09 08:16:53','Rolen'),(184,'Update Stock after PO Received','Update','2016-12-09 08:16:53','Rolen'),(185,'Purchase Order','Insert','2016-12-09 08:18:53','Rolen'),(186,'New PO Received','Insert','2016-12-09 09:13:05','Rolen'),(187,'Update Stock after PO Received','Update','2016-12-09 09:13:05','Rolen'),(188,'Purchase Order','Insert','2016-12-09 09:13:55','Rolen'),(189,'New PO Received','Insert','2016-12-09 09:14:40','Rolen'),(190,'Update Stock after PO Received','Update','2016-12-09 09:14:40','Rolen'),(191,'Update Family','Update','2016-12-09 09:28:49','Rolen'),(192,'Delete Family','Delete','2016-12-09 09:29:47','Rolen'),(193,'Delete Family','Delete','2016-12-09 09:29:52','Rolen'),(194,'Delete Category','Delete','2016-12-09 09:29:54','Rolen'),(195,'New Family','Insert','2016-12-09 09:31:57','Rolen'),(196,'New Family','Insert','2016-12-09 09:46:53','Rolen'),(197,'New Family','Insert','2016-12-09 09:47:08','Rolen'),(198,'Delete Family','Delete','2016-12-09 09:47:30','Rolen'),(199,'Delete Family','Delete','2016-12-09 09:47:33','Rolen'),(200,'New Family','Insert','2016-12-09 09:47:55','Rolen'),(201,'New Family','Insert','2016-12-09 09:48:43','Rolen'),(202,'New Family','Insert','2016-12-09 09:49:16','Rolen'),(203,'New Family','Insert','2016-12-09 09:52:26','Rolen'),(204,'Delete Family','Delete','2016-12-09 09:52:50','Rolen'),(205,'Delete Family','Delete','2016-12-09 09:52:53','Rolen'),(206,'Delete Family','Delete','2016-12-09 09:52:55','Rolen'),(207,'Delete Family','Delete','2016-12-09 09:52:57','Rolen'),(208,'New Family','Insert','2016-12-09 09:53:02','Rolen'),(209,'New Family','Insert','2016-12-09 09:53:09','Rolen'),(210,'New Family','Insert','2016-12-09 09:53:38','Rolen'),(211,'New Family','Insert','2016-12-09 09:55:54','Rolen'),(212,'Delete Family','Delete','2016-12-09 09:56:38','Rolen'),(213,'Delete Family','Delete','2016-12-09 09:56:40','Rolen'),(214,'Delete Family','Delete','2016-12-09 09:56:42','Rolen'),(215,'Delete Family','Delete','2016-12-09 09:56:45','Rolen'),(216,'Delete Family','Delete','2016-12-09 09:56:48','Rolen'),(217,'New Family','Insert','2016-12-09 09:56:59','Rolen'),(218,'New Family','Insert','2016-12-09 10:00:32','Rolen'),(219,'Delete Family','Delete','2016-12-09 10:00:49','Rolen'),(220,'New Category','Insert','2016-12-09 10:06:21','Rolen'),(221,'New Category','Insert','2016-12-09 10:08:41','Rolen'),(222,'New Category','Insert','2016-12-09 10:10:50','Rolen'),(223,'New Category','Insert','2016-12-09 10:13:31','Rolen'),(224,'New Sub-Category','Insert','2016-12-09 10:17:58','Rolen'),(225,'New Sub-Category','Insert','2016-12-09 10:19:13','Rolen'),(226,'New Sub-Category','Insert','2016-12-09 10:19:20','Rolen'),(227,'New Sub-Category','Insert','2016-12-09 10:19:35','Rolen'),(228,'New Family','Insert','2016-12-09 10:21:31','Rolen'),(229,'New Category','Insert','2016-12-09 10:21:47','Rolen'),(230,'New Category','Insert','2016-12-09 10:22:02','Rolen'),(231,'New Sub-Category','Insert','2016-12-09 10:22:12','Rolen'),(232,'New Sub-Category','Insert','2016-12-09 10:22:23','Rolen'),(233,'New Sub-Category','Insert','2016-12-09 10:22:29','Rolen'),(234,'New Sub-Category','Insert','2016-12-09 10:22:36','Rolen'),(235,'New Sub-Category','Insert','2016-12-09 10:22:43','Rolen'),(236,'New Sub-Category','Insert','2016-12-09 10:22:50','Rolen'),(237,'New Sub-Category','Insert','2016-12-09 10:22:56','Rolen'),(238,'New Sub-Category','Insert','2016-12-09 10:23:02','Rolen'),(239,'New Family','Insert','2016-12-09 10:40:51','Rolen'),(240,'New Family','Insert','2016-12-09 10:41:00','Rolen'),(241,'New Family','Insert','2016-12-09 10:41:10','Rolen'),(242,'New Family','Insert','2016-12-09 10:41:19','Rolen'),(243,'New Category','Insert','2016-12-09 10:41:36','Rolen'),(244,'New Category','Insert','2016-12-09 10:41:45','Rolen'),(245,'New Sub-Category','Insert','2016-12-09 20:40:08','Rolen'),(246,'0','Insert','2016-12-09 20:40:48','VEEnt'),(247,'0','Insert','2016-12-09 20:40:48','VEEnt'),(248,'0','Insert','2016-12-09 21:45:47','VEEnt'),(249,'0','Insert','2016-12-09 21:45:47','VEEnt'),(250,'0','Insert','2016-12-09 21:45:47','VEEnt'),(251,'Purchase Order','Insert','2016-12-09 21:47:16','Rolen'),(252,'New PO Received','Insert','2016-12-09 21:48:20','Rolen'),(253,'Update Stock after PO Received','Update','2016-12-09 21:48:20','Rolen'),(254,'Update Physical Count for Item variant : 56','Update','2016-12-09 22:03:36','Rolen'),(255,'Update Physical Count for Item variant : 55','Update','2016-12-09 22:04:48','Rolen'),(256,'Purchase Order','Insert','2016-12-09 22:05:50','Rolen'),(257,'New PO Received','Insert','2016-12-09 22:08:58','Rolen'),(258,'Update Stock after PO Received','Update','2016-12-09 22:08:58','Rolen'),(259,'New Category','Insert','2016-12-12 22:57:38','Rolen'),(260,'New Category','Insert','2016-12-12 22:57:52','Rolen'),(261,'Delete Family','Delete','2016-12-12 22:58:02','Rolen'),(262,'New Category','Insert','2016-12-12 22:58:16','Rolen'),(263,'New Sub-Category','Insert','2016-12-12 22:58:25','Rolen'),(264,'New Sub-Category','Insert','2016-12-12 22:58:32','Rolen'),(265,'New Sub-Category','Insert','2016-12-12 22:58:37','Rolen'),(266,'New Category','Insert','2016-12-12 22:58:49','Rolen'),(267,'New Category','Insert','2016-12-12 22:59:03','Rolen'),(268,'New Sub-Category','Insert','2016-12-12 22:59:15','Rolen'),(269,'New Sub-Category','Insert','2016-12-12 22:59:22','Rolen'),(270,'New Sub-Category','Insert','2016-12-12 22:59:29','Rolen'),(271,'New Sub-Category','Insert','2016-12-12 22:59:35','Rolen'),(272,'New Family','Insert','2016-12-12 23:00:00','Rolen'),(273,'New Category','Insert','2016-12-12 23:00:11','Rolen'),(274,'New Category','Insert','2016-12-12 23:00:23','Rolen'),(275,'New Family','Insert','2016-12-12 23:00:34','Rolen'),(276,'New Sub-Category','Insert','2016-12-12 23:00:49','Rolen'),(277,'New Sub-Category','Insert','2016-12-12 23:00:55','Rolen'),(278,'New Sub-Category','Insert','2016-12-12 23:01:06','Rolen'),(279,'New Sub-Category','Insert','2016-12-12 23:01:11','Rolen'),(280,'New Sub-Category','Insert','2016-12-12 23:01:17','Rolen'),(281,'New Category','Insert','2016-12-12 23:01:32','Rolen'),(282,'New Category','Insert','2016-12-12 23:01:40','Rolen'),(283,'New Category','Insert','2016-12-12 23:01:49','Rolen'),(284,'New Family','Insert','2016-12-12 23:01:59','Rolen'),(285,'New Category','Insert','2016-12-12 23:02:09','Rolen'),(286,'New Category','Insert','2016-12-12 23:02:17','Rolen'),(287,'Delete Sub-Category','Delete','2016-12-12 23:03:18','Rolen'),(288,'0','Insert','2016-12-26 10:29:58','VEEnt'),(289,'0','Insert','2016-12-26 10:29:58','VEEnt'),(290,'0','Insert','2016-12-26 10:29:58','VEEnt'),(291,'Purchase Order','Insert','2016-12-26 10:30:45','Rolen'),(292,'New PO Received','Insert','2016-12-26 10:31:31','Rolen'),(293,'Update Stock after PO Received','Update','2016-12-26 10:31:31','Rolen'),(294,'New customer','Insert','2016-12-30 12:02:02',NULL),(295,'New Order','Insert','2016-12-30 12:02:02',NULL),(296,'','Insert','2016-12-30 12:02:02',NULL),(297,'New customer','Insert','2016-12-30 12:03:57',NULL),(298,'New Order','Insert','2016-12-30 12:03:57',NULL),(299,'','Insert','2016-12-30 12:03:58',NULL),(300,'New customer','Insert','2016-12-30 12:10:28',NULL),(301,'New Order','Insert','2016-12-30 12:10:28',NULL),(302,'','Insert','2016-12-30 12:10:28',NULL),(303,'','Insert','2016-12-30 12:10:28',NULL),(304,'','Insert','2016-12-30 12:10:28',NULL),(305,'New customer','Insert','2016-12-30 18:21:23',NULL),(306,'New Order','Insert','2016-12-30 18:21:23',NULL),(307,'','Insert','2016-12-30 18:21:23',NULL),(308,'','Insert','2016-12-30 18:21:23',NULL),(309,'New customer','Insert','2016-12-30 19:46:43',NULL),(310,'New Order','Insert','2016-12-30 19:46:43',NULL),(311,'','Insert','2016-12-30 19:46:43',NULL),(312,'','Insert','2016-12-30 19:46:43',NULL),(313,'New customer','Insert','2016-12-30 19:49:39',NULL),(314,'New Order','Insert','2016-12-30 19:49:40',NULL),(315,'','Insert','2016-12-30 19:49:40',NULL),(316,'New customer','Insert','2016-12-30 19:50:57',NULL),(317,'New Order','Insert','2016-12-30 19:50:57',NULL),(318,'','Insert','2016-12-30 19:50:57',NULL),(319,'New customer','Insert','2016-12-30 19:51:56',NULL),(320,'','Insert','2016-12-30 19:51:56',NULL),(321,'New Order','Insert','2016-12-30 19:51:56',NULL),(322,'','Insert','2016-12-30 19:51:56',NULL),(323,'New Order','Insert','2016-12-30 20:23:08','test@yahoo.com'),(324,'','Insert','2016-12-30 20:23:08','test@yahoo.com'),(325,'New Order','Insert','2017-01-02 10:38:32','test@yahoo.com'),(326,'','Insert','2017-01-02 10:38:32','test@yahoo.com'),(327,'New Order','Insert','2017-01-02 12:29:02','test@yahoo.com'),(328,'','Insert','2017-01-02 12:29:02','test@yahoo.com'),(329,'New Order','Insert','2017-01-02 12:31:00','test@yahoo.com'),(330,'','Insert','2017-01-02 12:31:00','test@yahoo.com'),(331,'','Insert','2017-01-02 12:31:00','test@yahoo.com'),(332,'New Order','Insert','2017-01-02 13:29:59','test@yahoo.com'),(333,'','Insert','2017-01-02 13:29:59','test@yahoo.com'),(334,'','Insert','2017-01-02 13:29:59','test@yahoo.com'),(335,'Order number: 00000001  set order status to Process','Update','2017-01-02 13:39:50','Rolen'),(336,'Order number: 00000001  set order status to Ship','Update','2017-01-02 17:35:49','Rolen'),(337,'Decrease Stock after Order to shipped','Update','2017-01-02 17:35:49','Rolen'),(338,'Order number: 00000003  set order status to Process','Update','2017-01-02 17:37:00','Rolen'),(339,'Order number: 00000003  set order status to Ship','Update','2017-01-02 17:37:03','Rolen'),(340,'Decrease Stock after Order to shipped','Update','2017-01-02 17:37:03','Rolen'),(341,'Order number: 00000004  set order status to Process','Update','2017-01-02 17:37:55','Rolen'),(342,'Order number: 00000004  set order status to Ship','Update','2017-01-02 17:37:59','Rolen'),(343,'Decrease Stock after Order to shipped','Update','2017-01-02 17:37:59','Rolen'),(344,'Order number: 00000005  set order status to Process','Update','2017-01-02 17:39:20','Rolen'),(345,'Order number: 00000006  set order status to Process','Update','2017-01-02 17:39:37','Rolen'),(346,'Order number: 00000005  set order status to Ship','Update','2017-01-02 17:40:46','Rolen'),(347,'Decrease Stock after Order to shipped','Update','2017-01-02 17:40:47','Rolen'),(348,'Order number: 00000006  set order status to Ship','Update','2017-01-02 17:41:20','Rolen'),(349,'Decrease Stock after Order to shipped','Update','2017-01-02 17:41:20','Rolen'),(350,'New Order','Insert','2017-01-03 11:35:53','test@yahoo.com'),(351,'','Insert','2017-01-03 11:35:53','test@yahoo.com'),(352,'','Insert','2017-01-03 11:35:54','test@yahoo.com'),(353,'','Insert','2017-01-03 11:35:54','test@yahoo.com'),(354,'Purchase Order','Insert','2017-01-11 15:22:36','Rolen'),(355,'New PO Received','Insert','2017-01-11 15:26:03','Rolen'),(356,'New PO Received','Insert','2017-01-11 15:28:23','Rolen'),(357,'New PO Received','Insert','2017-01-11 15:29:11','Rolen'),(358,'Update Stock after PO Received','Update','2017-01-11 15:29:11','Rolen'),(359,'Purchase Order','Insert','2017-01-11 15:53:21','Rolen'),(360,'New PO Received','Insert','2017-01-11 15:54:19','Rolen'),(361,'Update Stock after PO Received','Update','2017-01-11 15:54:19','Rolen'),(362,'Purchase Order','Insert','2017-01-11 15:55:19','Rolen'),(363,'New PO Received','Insert','2017-01-11 15:59:26','Rolen'),(364,'Update Stock after PO Received','Update','2017-01-11 15:59:27','Rolen'),(365,'Update Pending PO Received','Insert','2017-01-11 16:04:01','Rolen'),(366,'Update Stock after PO Received','Update','2017-01-11 16:04:01','Rolen'),(367,'Purchase Order','Insert','2017-01-11 16:05:42','Rolen'),(368,'Purchase Order','Insert','2017-01-11 16:43:40','Rolen'),(369,'Update Physical Count for Item variant : 55','Update','2017-01-11 17:12:32','Rolen'),(370,'Update Physical Count for Item variant : 58','Update','2017-01-11 17:12:50','Rolen'),(371,'Update Physical Count for Item variant : 59','Update','2017-01-11 17:12:59','Rolen'),(372,'Purchase Order','Insert','2017-01-11 17:13:27','Rolen'),(373,'New PO Received','Insert','2017-01-11 17:14:17','Rolen'),(374,'Update Stock after PO Received','Update','2017-01-11 17:14:17','Rolen'),(375,'Update Physical Count for Item variant : 58','Update','2017-01-11 17:16:58','Rolen'),(376,'Update Physical Count for Item variant : 59','Update','2017-01-11 17:17:03','Rolen'),(377,'Update Pending PO Received','Insert','2017-01-11 17:17:22','Rolen'),(378,'Update Stock after PO Received','Update','2017-01-11 17:17:22','Rolen'),(379,'Update Pending PO Received','Insert','2017-01-11 17:20:23','Rolen'),(380,'Update Stock after PO Received','Update','2017-01-11 17:20:24','Rolen'),(381,'Update Pending PO Received','Insert','2017-01-11 17:21:13','Rolen'),(382,'Update Stock after PO Received','Update','2017-01-11 17:21:13','Rolen'),(383,'Purchase Order','Insert','2017-01-11 18:06:20','Rolen'),(384,'New PO Received','Insert','2017-01-11 18:07:04','Rolen'),(385,'Update Stock after PO Received','Update','2017-01-11 18:07:04','Rolen'),(386,'Update Pending PO Received','Insert','2017-01-11 18:10:01','Rolen'),(387,'Update Stock after PO Received','Update','2017-01-11 18:10:01','Rolen'),(388,'New customer','Insert','2017-01-19 13:01:24',NULL),(389,'','Insert','2017-01-19 13:01:25',NULL),(390,'New Order','Insert','2017-01-19 13:01:25',NULL),(391,'','Insert','2017-01-19 13:01:25',NULL),(392,'New customer','Insert','2017-01-19 13:05:13',NULL),(393,'','Insert','2017-01-19 13:05:14',NULL),(394,'New Order','Insert','2017-01-19 13:05:14',NULL),(395,'','Insert','2017-01-19 13:05:15',NULL),(396,'New customer','Insert','2017-01-19 14:07:54',NULL),(397,'','Insert','2017-01-19 14:07:55',NULL),(398,'New Order','Insert','2017-01-19 14:07:55',NULL),(399,'','Insert','2017-01-19 14:07:56',NULL),(400,'New customer','Insert','2017-01-19 14:10:33',NULL),(401,'','Insert','2017-01-19 14:10:35',NULL),(402,'New Order','Insert','2017-01-19 14:10:35',NULL),(403,'','Insert','2017-01-19 14:10:35',NULL),(404,'','Insert','2017-01-19 14:10:35',NULL),(405,'','Insert','2017-01-19 14:10:35',NULL),(406,'New customer','Insert','2017-01-19 14:13:28',NULL),(407,'','Insert','2017-01-19 14:13:30',NULL),(408,'New Order','Insert','2017-01-19 14:13:30',NULL),(409,'','Insert','2017-01-19 14:13:30',NULL),(410,'New customer','Insert','2017-01-19 14:32:12',NULL),(411,'','Insert','2017-01-19 14:32:14',NULL),(412,'New Order','Insert','2017-01-19 14:32:14',NULL),(413,'','Insert','2017-01-19 14:32:14',NULL),(414,'Order number: 00000011  set order status to Process','Update','2017-01-19 15:28:51','Rolen'),(415,'Order number: 00000013  set order status to Process','Update','2017-01-19 15:30:53','Rolen'),(416,'Order number: 00000013  set order status to Process','Update','2017-01-19 15:31:15','Rolen'),(417,'Order number: 00000012  set order status to Process','Update','2017-01-19 15:32:08','Rolen'),(418,'Order number: 00000010  set order status to Process','Update','2017-01-19 15:33:12','Rolen'),(419,'Order number: 00000007  set order status to Process','Update','2017-01-19 15:34:07','Rolen'),(420,'Order number: 00000013  set order status to Ship','Update','2017-01-19 15:34:23','Rolen'),(421,'Decrease Stock after Order to shipped','Update','2017-01-19 15:34:23','Rolen'),(422,'New customer','Insert','2017-01-19 15:45:51',NULL),(423,'','Insert','2017-01-19 15:45:53',NULL),(424,'New Order','Insert','2017-01-19 15:45:53',NULL),(425,'','Insert','2017-01-19 15:45:53',NULL),(426,'','Insert','2017-01-19 15:45:53',NULL),(427,'','Insert','2017-01-19 15:45:53',NULL),(428,'Order number: 00000001  set order status to Process','Update','2017-01-19 15:46:44','Rolen'),(429,'Order number: 00000001  set order status to Ship','Update','2017-01-19 15:47:05','Rolen'),(430,'Decrease Stock after Order to shipped','Update','2017-01-19 15:47:06','Rolen'),(431,'New customer','Insert','2017-01-20 01:52:19',NULL),(432,'','Insert','2017-01-20 01:52:19',NULL),(433,'New Order','Insert','2017-01-20 01:52:19',NULL),(434,'','Insert','2017-01-20 01:52:20',NULL),(435,'Order number: 00000002  set order status to Process','Update','2017-01-20 01:53:42','Rolen'),(436,'New customer','Insert','2017-01-21 08:50:14',NULL),(437,'','Insert','2017-01-21 08:50:14',NULL),(438,'New Order','Insert','2017-01-21 08:50:14',NULL),(439,'','Insert','2017-01-21 08:50:15',NULL),(440,'Order number: 00000003  set order status to Process','Update','2017-01-21 08:52:19','Rolen'),(441,'Order number: 00000003  set order status to Ship','Update','2017-01-21 08:53:08','Rolen'),(442,'Decrease Stock after Order to shipped','Update','2017-01-21 08:53:08','Rolen'),(443,'0','Insert','2017-01-21 09:08:38','JMDMktg'),(444,'0','Insert','2017-01-21 09:08:38','JMDMktg'),(445,'Purchase Order','Insert','2017-01-21 09:10:00','Rolen'),(446,'Purchase Order','Insert','2017-01-21 09:10:07','Rolen'),(447,'Purchase Order','Insert','2017-01-21 09:10:13','Rolen'),(448,'Purchase Order','Insert','2017-01-21 09:10:25','Rolen'),(449,'Purchase Order','Insert','2017-01-21 09:10:26','Rolen'),(450,'Purchase Order','Insert','2017-01-21 09:10:27','Rolen'),(451,'Purchase Order','Insert','2017-01-21 09:10:27','Rolen'),(452,'Purchase Order','Insert','2017-01-21 09:10:27','Rolen'),(453,'Purchase Order','Insert','2017-01-21 09:10:27','Rolen'),(454,'Purchase Order','Insert','2017-01-21 09:10:28','Rolen'),(455,'Purchase Order','Insert','2017-01-21 09:10:28','Rolen'),(456,'Purchase Order','Insert','2017-01-21 09:10:28','Rolen'),(457,'Purchase Order','Insert','2017-01-21 09:10:28','Rolen'),(458,'Purchase Order','Insert','2017-01-21 09:10:28','Rolen'),(459,'Purchase Order','Insert','2017-01-21 09:10:29','Rolen'),(460,'Purchase Order','Insert','2017-01-21 09:10:30','Rolen'),(461,'Purchase Order','Insert','2017-01-21 09:10:30','Rolen'),(462,'Purchase Order','Insert','2017-01-21 09:10:30','Rolen'),(463,'Purchase Order','Insert','2017-01-21 09:10:30','Rolen'),(464,'Purchase Order','Insert','2017-01-21 09:10:35','Rolen'),(465,'Purchase Order','Insert','2017-01-21 09:10:36','Rolen'),(466,'Purchase Order','Insert','2017-01-21 09:10:37','Rolen'),(467,'Purchase Order','Insert','2017-01-21 09:10:42','Rolen'),(468,'Purchase Order','Insert','2017-01-21 09:10:43','Rolen'),(469,'Purchase Order','Insert','2017-01-21 09:10:43','Rolen'),(470,'Purchase Order','Insert','2017-01-21 09:10:43','Rolen'),(471,'Purchase Order','Insert','2017-01-21 09:10:43','Rolen'),(472,'New PO Received','Insert','2017-01-21 09:13:36','Rolen'),(473,'Update Stock after PO Received','Update','2017-01-21 09:13:36','Rolen'),(474,'Update Pending PO Received','Insert','2017-01-21 09:13:37','Rolen'),(475,'Update Stock after PO Received','Update','2017-01-21 09:13:37','Rolen'),(476,'Update Physical Count for Item variant : 60','Update','2017-01-21 09:15:09','Rolen'),(477,'New customer','Insert','2017-01-24 22:55:33',NULL),(478,'','Insert','2017-01-24 22:55:33',NULL),(479,'New Order','Insert','2017-01-24 22:55:33',NULL),(480,'New customer','Insert','2017-01-25 00:03:44',NULL),(481,'','Insert','2017-01-25 00:03:44',NULL),(482,'New Order','Insert','2017-01-25 00:03:44',NULL),(483,'New customer','Insert','2017-01-25 00:04:31',NULL),(484,'','Insert','2017-01-25 00:04:31',NULL),(485,'New Order','Insert','2017-01-25 00:04:31',NULL),(486,'New customer','Insert','2017-01-30 19:28:09',NULL),(487,'','Insert','2017-01-30 19:28:09',NULL),(488,'New Order','Insert','2017-01-30 19:28:09',NULL),(489,'','Insert','2017-01-30 19:28:10',NULL),(490,'New Sub-Category','Insert','2017-01-31 00:59:36','Rolen'),(491,'New customer','Insert','2017-01-31 09:47:41',NULL),(492,'','Insert','2017-01-31 09:47:42',NULL),(493,'New Order','Insert','2017-01-31 09:47:42',NULL),(494,'','Insert','2017-01-31 09:47:44',NULL),(495,'New Sub-Category','Insert','2017-01-31 22:48:20','Rolen'),(496,'New customer','Insert','2017-01-31 22:51:30',NULL),(497,'','Insert','2017-01-31 22:51:30',NULL),(498,'New Order','Insert','2017-01-31 22:51:30',NULL),(499,'','Insert','2017-01-31 22:51:31',NULL),(500,'','Insert','2017-01-31 22:51:31',NULL),(501,'Order number: 00000009  set order status to Process','Update','2017-01-31 22:52:46','Rolen'),(502,'Order number: 00000009  set order status to Ship','Update','2017-01-31 22:54:49','Rolen'),(503,'Decrease Stock after Order to shipped','Update','2017-01-31 22:54:49','Rolen'),(504,'New customer','Insert','2017-02-01 22:00:26',NULL),(505,'','Insert','2017-02-01 22:00:26',NULL),(506,'New customer','Insert','2017-02-01 22:05:21',NULL),(507,'','Insert','2017-02-01 22:05:21',NULL),(508,'New Order','Insert','2017-02-01 22:05:21',NULL),(509,'','Insert','2017-02-01 22:05:22',NULL),(510,'New customer','Insert','2017-02-01 22:07:57',NULL),(511,'','Insert','2017-02-01 22:07:57',NULL),(512,'New Order','Insert','2017-02-01 22:07:57',NULL),(513,'','Insert','2017-02-01 22:07:58',NULL),(514,'New customer','Insert','2017-02-01 22:16:24',NULL),(515,'','Insert','2017-02-01 22:16:24',NULL),(516,'New Order','Insert','2017-02-01 22:16:24',NULL),(517,'','Insert','2017-02-01 22:16:25',NULL),(518,'New UOM','Insert','2017-02-03 03:54:50','VEEnt'),(519,'New UOM','Insert','2017-02-03 03:54:50','VEEnt'),(520,'0','Insert','2017-02-03 04:26:12','VEEnt'),(521,'0','Insert','2017-02-03 04:26:12','VEEnt'),(522,'0','Insert','2017-02-03 04:26:12','VEEnt'),(523,'0','Insert','2017-02-03 04:26:12','VEEnt'),(524,'0','Insert','2017-02-03 04:26:12','VEEnt'),(525,'0','Insert','2017-02-03 04:26:12','VEEnt'),(526,'0','Insert','2017-02-03 04:26:12','VEEnt'),(527,'0','Insert','2017-02-03 04:26:12','VEEnt'),(528,'0','Insert','2017-02-03 04:26:12','VEEnt'),(529,'0','Insert','2017-02-03 04:26:12','VEEnt'),(530,'Purchase Order','Insert','2017-02-03 04:30:56','Rolen'),(531,'New PO Received','Insert','2017-02-03 04:35:03','Rolen'),(532,'Update Stock after PO Received','Update','2017-02-03 04:35:03','Rolen'),(533,'Purchase Order','Insert','2017-02-03 04:41:12','Rolen'),(534,'Purchase Order','Insert','2017-02-03 04:41:19','Rolen'),(535,'Purchase Order','Insert','2017-02-03 04:41:27','Rolen'),(536,'Update Physical Count for Item variant : 61','Update','2017-02-03 04:48:03','Rolen'),(537,'New PO Received','Insert','2017-02-03 05:03:04','Rolen'),(538,'Update Stock after PO Received','Update','2017-02-03 05:03:04','Rolen'),(539,'New Sub-Category','Insert','2017-02-03 08:54:03','Rolen'),(540,'New Sub-Category','Insert','2017-02-03 09:29:11','Rolen'),(541,'New Sub-Category','Insert','2017-02-03 09:30:15','Rolen'),(542,'New UOM','Insert','2017-02-03 10:37:45','VEEnt'),(543,'New Sub-Category','Insert','2017-02-03 11:09:40','Rolen'),(544,'New Sub-Category','Insert','2017-02-03 11:10:52','Rolen'),(545,'0','Insert','2017-02-03 11:11:11','VEEnt'),(546,'0','Insert','2017-02-03 11:11:11','VEEnt'),(547,'0','Insert','2017-02-03 11:11:11','VEEnt'),(548,'New Category','Insert','2017-02-03 11:12:10','Rolen'),(549,'Delete Category','Delete','2017-02-03 11:12:21','Rolen'),(550,'New customer','Insert','2017-02-03 13:43:01',NULL),(551,'','Insert','2017-02-03 13:43:01',NULL),(552,'New Order','Insert','2017-02-03 13:43:01',NULL),(553,'','Insert','2017-02-03 13:43:02',NULL),(554,'New customer','Insert','2017-02-03 13:43:03',NULL),(555,'','Insert','2017-02-03 13:43:03',NULL),(556,'New Order','Insert','2017-02-03 13:43:03',NULL),(557,'New customer','Insert','2017-02-03 13:43:31',NULL),(558,'','Insert','2017-02-03 13:43:31',NULL),(559,'New Order','Insert','2017-02-03 13:43:31',NULL),(560,'New customer','Insert','2017-02-03 13:46:19',NULL),(561,'','Insert','2017-02-03 13:46:19',NULL),(562,'New Order','Insert','2017-02-03 13:46:20',NULL),(563,'','Insert','2017-02-03 13:46:21',NULL),(564,'Order number: 00000013  set order status to Process','Update','2017-02-03 13:49:30','Rolen'),(565,'Order number: 00000013  set order status to Ship','Update','2017-02-03 13:49:43','Rolen'),(566,'Decrease Stock after Order to shipped','Update','2017-02-03 13:49:43','Rolen'),(567,'New Sub-Category','Insert','2017-02-03 21:59:21','Rolen'),(568,'0','Insert','2017-02-03 22:08:43','VEEnt'),(569,'0','Insert','2017-02-03 22:08:43','VEEnt'),(570,'0','Insert','2017-02-03 22:08:43','VEEnt'),(571,'Purchase Order','Insert','2017-02-03 22:11:16','Rolen'),(572,'Purchase Order','Insert','2017-02-03 22:11:28','Rolen'),(573,'New PO Received','Insert','2017-02-03 22:15:46','Rolen'),(574,'Update Stock after PO Received','Update','2017-02-03 22:15:46','Rolen'),(575,'New customer','Insert','2017-02-03 22:31:04',NULL),(576,'','Insert','2017-02-03 22:31:04',NULL),(577,'New Order','Insert','2017-02-03 22:31:04',NULL),(578,'','Insert','2017-02-03 22:31:06',NULL),(579,'','Insert','2017-02-03 22:31:06',NULL),(580,'Order number: 00000017  set order status to Process','Update','2017-02-03 22:36:00','Rolen'),(581,'Order number: 00000017  set order status to Ship','Update','2017-02-03 22:37:20','Rolen'),(582,'Decrease Stock after Order to shipped','Update','2017-02-03 22:37:20','Rolen'),(583,'','Insert','2017-02-07 10:32:31',NULL),(584,'New Order','Insert','2017-02-07 10:32:32',NULL),(585,'New customer','Insert','2017-02-07 10:34:06',NULL),(586,'','Insert','2017-02-07 10:34:06',NULL),(587,'New Order','Insert','2017-02-07 10:34:06',NULL),(588,'Purchase Order','Insert','2017-02-09 21:28:27','Rolen'),(589,'Purchase Order','Insert','2017-02-09 21:37:49','Rolen'),(590,'New PO Received','Insert','2017-02-09 21:40:10','Rolen'),(591,'Update Stock after PO Received','Update','2017-02-09 21:40:10','Rolen'),(592,'Purchase Order','Insert','2017-02-09 21:40:45','Rolen'),(593,'New PO Received','Insert','2017-02-09 21:42:11','Rolen'),(594,'Update Stock after PO Received','Update','2017-02-09 21:42:11','Rolen'),(595,'Update Pending PO Received','Insert','2017-02-09 22:09:33','Rolen'),(596,'Update Stock after PO Received','Update','2017-02-09 22:09:33','Rolen'),(597,'Purchase Order','Insert','2017-02-09 22:15:15','Rolen'),(598,'New PO Received','Insert','2017-02-09 22:16:41','Rolen'),(599,'Update Stock after PO Received','Update','2017-02-09 22:16:41','Rolen'),(600,'Update Pending PO Received','Insert','2017-02-09 22:19:06','Rolen'),(601,'Update Stock after PO Received','Update','2017-02-09 22:19:06','Rolen'),(602,'Update Pending PO Received','Insert','2017-02-09 22:19:32','Rolen'),(603,'Update Stock after PO Received','Update','2017-02-09 22:19:32','Rolen'),(604,'Update Pending PO Received','Insert','2017-02-09 22:35:50','Rolen'),(605,'Update Stock after PO Received','Update','2017-02-09 22:35:50','Rolen'),(606,'Update Pending PO Received','Insert','2017-02-09 22:39:22','Rolen'),(607,'Update Stock after PO Received','Update','2017-02-09 22:39:22','Rolen'),(608,'Purchase Order','Insert','2017-02-12 21:44:14','Rolen'),(609,'Purchase Order','Insert','2017-02-12 21:46:32','Rolen'),(610,'New PO Received','Insert','2017-02-12 21:47:55','Rolen'),(611,'Update Stock after PO Received','Update','2017-02-12 21:47:55','Rolen'),(612,'Purchase Order','Insert','2017-02-12 21:55:38','Rolen'),(613,'','Insert','2017-02-12 22:11:37',NULL),(614,'New Order','Insert','2017-02-12 22:11:38',NULL),(615,'','Insert','2017-02-12 22:11:38',NULL),(616,'0','Insert','2017-02-13 00:57:26','VEEnt'),(617,'0','Insert','2017-02-13 00:57:26','VEEnt'),(618,'New customer','Insert','2017-02-13 10:13:03',NULL),(619,'','Insert','2017-02-13 10:13:03',NULL),(620,'New Order','Insert','2017-02-13 10:13:03',NULL),(621,'Update Pending PO Received','Insert','2017-02-14 10:16:12','Rolen'),(622,'Update Stock after PO Received','Update','2017-02-14 10:16:12','Rolen'),(623,'New UOM','Insert','2017-02-14 10:19:07','VEEnt'),(624,'New customer','Insert','2017-02-15 01:33:52',NULL),(625,'','Insert','2017-02-15 01:33:52',NULL),(626,'New Order','Insert','2017-02-15 01:33:52',NULL),(627,'0','Insert','2017-02-15 22:54:11','VEEnt'),(628,'0','Insert','2017-02-15 22:54:11','VEEnt'),(629,'0','Insert','2017-02-15 23:07:24','VEEnt'),(630,'0','Insert','2017-02-15 23:07:24','VEEnt'),(631,'Purchase Order','Insert','2017-02-15 23:11:56','Rolen'),(632,'New PO Received','Insert','2017-02-15 23:17:59','Rolen'),(633,'Update Stock after PO Received','Update','2017-02-15 23:17:59','Rolen'),(634,'Update Pending PO Received','Insert','2017-02-15 23:18:57','Rolen'),(635,'Update Stock after PO Received','Update','2017-02-15 23:18:57','Rolen'),(636,'New customer','Insert','2017-02-16 00:51:59',NULL),(637,'New customer','Insert','2017-02-16 00:53:52',NULL),(638,'','Insert','2017-02-16 00:53:52',NULL),(639,'New customer','Insert','2017-02-16 01:01:29',NULL),(640,'','Insert','2017-02-16 01:01:29',NULL),(641,'New customer','Insert','2017-02-16 01:03:22',NULL),(642,'','Insert','2017-02-16 01:03:22',NULL),(643,'New Order','Insert','2017-02-16 01:03:24',NULL);

/*Table structure for table `tblorder` */

DROP TABLE IF EXISTS `tblorder`;

CREATE TABLE `tblorder` (
  `CustomerNo` int(11) DEFAULT NULL,
  `OrderNo` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ShipAddress` text,
  `TotalAmount` double(10,2) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Ship` int(11) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'New',
  `SalesNo` int(4) unsigned zerofill DEFAULT NULL,
  `TransactionDate` datetime DEFAULT NULL,
  `DeliverBy` int(11) NOT NULL,
  PRIMARY KEY (`OrderNo`),
  KEY `FKSales_order` (`SalesNo`),
  KEY `CustomerNo` (`CustomerNo`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tblorder` */

insert  into `tblorder`(`CustomerNo`,`OrderNo`,`ShipAddress`,`TotalAmount`,`Date`,`Ship`,`Status`,`SalesNo`,`TransactionDate`,`DeliverBy`) values (26,00000001,'Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan',2990.00,'2017-01-19 15:45:51',1,'Ship',NULL,'2017-01-19 15:47:05',0),(27,00000002,'test, test',220.00,'2017-01-20 14:51:26',0,'Process',NULL,'2017-01-20 14:52:50',0),(28,00000003,'Caloocan ',70.00,'2017-01-21 21:49:18',1,'Ship',NULL,'2017-01-21 21:52:13',0),(NULL,00000004,NULL,NULL,'2017-01-25 11:54:28',NULL,'New',NULL,NULL,0),(NULL,00000005,NULL,NULL,'2017-01-25 13:02:39',NULL,'New',NULL,NULL,0),(NULL,00000006,NULL,NULL,'2017-01-25 13:03:26',NULL,'New',NULL,NULL,0),(32,00000007,'#26 Torres Village nagkaisang nayon Quezon City',220.00,'2017-01-31 08:25:00',NULL,'New',NULL,NULL,0),(33,00000008,'Caloocan',130.00,'2017-01-31 22:44:30',NULL,'New',NULL,NULL,0),(34,00000009,'caloocan',510.00,'2017-02-01 11:48:19',1,'Ship',NULL,'2017-02-01 11:51:38',0),(35,00000010,'Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan',220.00,'2017-02-02 11:02:07',NULL,'New',NULL,NULL,0),(37,00000011,'Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan',2700.00,'2017-02-02 11:04:43',NULL,'New',NULL,NULL,0),(38,00000012,'Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan',70.00,'2017-02-02 11:13:10',NULL,'New',NULL,NULL,0),(39,00000013,'test',382.00,'2017-02-04 02:39:43',1,'Ship',NULL,'2017-02-04 02:46:25',31),(NULL,00000014,NULL,NULL,'2017-02-04 02:39:45',NULL,'New',NULL,NULL,0),(NULL,00000015,NULL,NULL,'2017-02-04 02:40:13',NULL,'New',NULL,NULL,0),(42,00000016,'test',382.00,'2017-02-04 02:43:01',NULL,'New',NULL,NULL,0),(43,00000017,'Caloocan City',1317.50,'2017-02-04 11:27:45',1,'Ship',NULL,'2017-02-04 11:34:02',31),(NULL,00000018,NULL,NULL,'2017-02-07 23:29:03',NULL,'New',NULL,NULL,0),(NULL,00000019,NULL,NULL,'2017-02-07 23:30:38',NULL,'New',NULL,NULL,0),(NULL,00000020,'QC',NULL,'2017-02-13 11:07:57',NULL,'New',NULL,NULL,0),(NULL,00000021,NULL,NULL,'2017-02-13 23:09:21',NULL,'New',NULL,NULL,0),(NULL,00000022,NULL,NULL,'2017-02-15 14:30:06',NULL,'New',NULL,NULL,0),(49,00000023,'Block 4 Lot 14 Oregon St. Phase 7 Palmera Homes Northwinds San Jose Del Monte Bulacan',NULL,'2017-02-16 01:03:22',NULL,'New',NULL,NULL,0);

/*Table structure for table `tblorderdetails` */

DROP TABLE IF EXISTS `tblorderdetails`;

CREATE TABLE `tblorderdetails` (
  `OrderNo` int(8) unsigned zerofill DEFAULT NULL,
  `ItemVariantNo` varchar(10) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` double(10,2) DEFAULT NULL,
  `SubTotal` double(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tblorderdetails` */

insert  into `tblorderdetails`(`OrderNo`,`ItemVariantNo`,`Quantity`,`Price`,`SubTotal`) values (00000001,'0058-58',1,2700.00,2700.00),(00000001,'0056-55',1,220.00,220.00),(00000001,'0057-56',1,70.00,70.00),(00000002,'0056-55',1,220.00,220.00),(00000003,'0057-56',1,70.00,70.00),(00000007,'0056-55',1,220.00,220.00),(00000008,'0059-60',1,130.00,130.00),(00000009,'0056-55',2,220.00,440.00),(00000009,'0057-56',1,70.00,70.00),(00000010,'0056-55',1,220.00,220.00),(00000011,'0058-58',1,2700.00,2700.00),(00000012,'0057-56',1,70.00,70.00),(00000013,'0060-61',1,382.00,382.00),(00000016,'0060-61',1,382.00,382.00),(00000017,'0062-72',55,17.00,935.00),(00000017,'0062-73',15,25.50,382.50),(NULL,'0060-61',1,382.00,382.00);

/*Table structure for table `tbluom` */

DROP TABLE IF EXISTS `tbluom`;

CREATE TABLE `tbluom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UOMCode` varchar(10) DEFAULT NULL,
  `Description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbluom` */

insert  into `tbluom`(`ID`,`UOMCode`,`Description`) values (1,'ea','each'),(2,'set','set'),(3,'g','grams'),(4,'kg','kilograms'),(5,'mm','Millimeter'),(6,'lbs','pounds'),(7,'L','Liters'),(8,'yd','yard'),(9,'Pc','Pieces'),(10,'Pc','Pieces'),(11,'ml','milliliter'),(12,'m','meter');

/*Table structure for table `walkin` */

DROP TABLE IF EXISTS `walkin`;

CREATE TABLE `walkin` (
  `WalkInNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(30) DEFAULT NULL,
  `CustomerAddress` varchar(50) DEFAULT NULL,
  `CustomerNo` int(11) DEFAULT NULL,
  `OrderListNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`WalkInNo`),
  KEY `FKCustomer_walkin` (`CustomerNo`),
  KEY `FKOrderList_walkin` (`OrderListNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `walkin` */

/*Table structure for table `vw_allorders` */

DROP TABLE IF EXISTS `vw_allorders`;

/*!50001 DROP VIEW IF EXISTS `vw_allorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_allorders` */;

/*!50001 CREATE TABLE  `vw_allorders`(
 `ViewItems` varchar(74) ,
 `CustomerNo` int(11) ,
 `OrderNo` int(8) unsigned zerofill ,
 `NoOfItems` bigint(21) ,
 `CustomerName` varchar(61) ,
 `Address` text ,
 `ShipAddress` text ,
 `Landmark` text ,
 `OrderDate` datetime ,
 `TotalAmount` varchar(46) ,
 `Status` varchar(50) ,
 `DeliverBy` int(11) ,
 `Action` varchar(213) 
)*/;

/*Table structure for table `vw_getbackorders` */

DROP TABLE IF EXISTS `vw_getbackorders`;

/*!50001 DROP VIEW IF EXISTS `vw_getbackorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_getbackorders` */;

/*!50001 CREATE TABLE  `vw_getbackorders`(
 `RequestListNo` int(11) ,
 `SupplierName` varchar(50) ,
 `SupplierNo` int(11) ,
 `ItemDescription` mediumtext ,
 `Received` int(11) ,
 `PendingQuantity` int(11) ,
 `DateReceive` datetime 
)*/;

/*Table structure for table `vw_getcategories` */

DROP TABLE IF EXISTS `vw_getcategories`;

/*!50001 DROP VIEW IF EXISTS `vw_getcategories` */;
/*!50001 DROP TABLE IF EXISTS `vw_getcategories` */;

/*!50001 CREATE TABLE  `vw_getcategories`(
 `Level1No` int(11) ,
 `Family` varchar(50) ,
 `ImageFile` text ,
 `Level2No` int(11) ,
 `Category` varchar(176) ,
 `Level3No` int(11) ,
 `SubCategory` varchar(176) 
)*/;

/*Table structure for table `vw_getlowstockbysupplier` */

DROP TABLE IF EXISTS `vw_getlowstockbysupplier`;

/*!50001 DROP VIEW IF EXISTS `vw_getlowstockbysupplier` */;
/*!50001 DROP TABLE IF EXISTS `vw_getlowstockbysupplier` */;

/*!50001 CREATE TABLE  `vw_getlowstockbysupplier`(
 `ItemNo` varchar(22) ,
 `ItemDescription` mediumtext ,
 `STOCKS` bigint(11) ,
 `LOWSTOCKS` bigint(11) ,
 `CRITICAL` bigint(11) ,
 `SupplierNo` int(11) 
)*/;

/*Table structure for table `vw_getmostcustomer` */

DROP TABLE IF EXISTS `vw_getmostcustomer`;

/*!50001 DROP VIEW IF EXISTS `vw_getmostcustomer` */;
/*!50001 DROP TABLE IF EXISTS `vw_getmostcustomer` */;

/*!50001 CREATE TABLE  `vw_getmostcustomer`(
 `CustomerName` varchar(61) ,
 `Total` bigint(21) ,
 `Percentage` int(1) 
)*/;

/*Table structure for table `vw_getmostordereditems` */

DROP TABLE IF EXISTS `vw_getmostordereditems`;

/*!50001 DROP VIEW IF EXISTS `vw_getmostordereditems` */;
/*!50001 DROP TABLE IF EXISTS `vw_getmostordereditems` */;

/*!50001 CREATE TABLE  `vw_getmostordereditems`(
 `Name` varchar(50) ,
 `Total` decimal(32,0) ,
 `Percentage` int(1) 
)*/;

/*Table structure for table `vw_getorderbysupplier` */

DROP TABLE IF EXISTS `vw_getorderbysupplier`;

/*!50001 DROP VIEW IF EXISTS `vw_getorderbysupplier` */;
/*!50001 DROP TABLE IF EXISTS `vw_getorderbysupplier` */;

/*!50001 CREATE TABLE  `vw_getorderbysupplier`(
 `Action` varchar(134) ,
 `ItemNo` varchar(22) ,
 `Description` mediumtext ,
 `DPOCost` double ,
 `SupplierNo` int(11) 
)*/;

/*Table structure for table `vw_getpendingitemsbysupplyrequestno` */

DROP TABLE IF EXISTS `vw_getpendingitemsbysupplyrequestno`;

/*!50001 DROP VIEW IF EXISTS `vw_getpendingitemsbysupplyrequestno` */;
/*!50001 DROP TABLE IF EXISTS `vw_getpendingitemsbysupplyrequestno` */;

/*!50001 CREATE TABLE  `vw_getpendingitemsbysupplyrequestno`(
 `ItemNo` varchar(22) ,
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `ItemDescription` mediumtext ,
 `ImageFile` text ,
 `DPOCost` varchar(62) ,
 `Price` varchar(62) ,
 `RequestsQty` int(11) ,
 `Received` int(11) ,
 `SubTotal` varchar(46) ,
 `SupplierName` varchar(50) 
)*/;

/*Table structure for table `vw_getposubmit` */

DROP TABLE IF EXISTS `vw_getposubmit`;

/*!50001 DROP VIEW IF EXISTS `vw_getposubmit` */;
/*!50001 DROP TABLE IF EXISTS `vw_getposubmit` */;

/*!50001 CREATE TABLE  `vw_getposubmit`(
 `Remove` varchar(95) ,
 `ItemQty` varchar(114) ,
 `Item` varchar(22) ,
 `ItemDescription` mediumtext ,
 `DPOCost` varchar(62) ,
 `Price` varchar(62) ,
 `Total` varchar(62) ,
 `createdby` varchar(50) ,
 `SupplierNo` int(11) ,
 `RequestListNo` int(11) 
)*/;

/*Table structure for table `vw_getpotoreceive` */

DROP TABLE IF EXISTS `vw_getpotoreceive`;

/*!50001 DROP VIEW IF EXISTS `vw_getpotoreceive` */;
/*!50001 DROP TABLE IF EXISTS `vw_getpotoreceive` */;

/*!50001 CREATE TABLE  `vw_getpotoreceive`(
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `NoOfItems` bigint(21) ,
 `SupplierName` varchar(50) ,
 `Date` datetime ,
 `DeliveredDate` datetime 
)*/;

/*Table structure for table `vw_getpurchaseorders` */

DROP TABLE IF EXISTS `vw_getpurchaseorders`;

/*!50001 DROP VIEW IF EXISTS `vw_getpurchaseorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_getpurchaseorders` */;

/*!50001 CREATE TABLE  `vw_getpurchaseorders`(
 `ViewItems` varchar(74) ,
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `SupplierName` varchar(50) ,
 `NoOfItems` bigint(21) ,
 `TotalDPOCost` varchar(63) ,
 `Date` datetime ,
 `Status` varchar(9) ,
 `Action` varchar(39) 
)*/;

/*Table structure for table `vw_getrequestlistbysupplyrequestno` */

DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno`;

/*!50001 DROP VIEW IF EXISTS `vw_getrequestlistbysupplyrequestno` */;
/*!50001 DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno` */;

/*!50001 CREATE TABLE  `vw_getrequestlistbysupplyrequestno`(
 `ItemNo` varchar(22) ,
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `ItemDescription` mediumtext ,
 `ImageFile` text ,
 `DPOCost` varchar(62) ,
 `Price` varchar(62) ,
 `RequestsQty` int(11) ,
 `SubTotal` varchar(46) ,
 `SupplierName` varchar(50) 
)*/;

/*Table structure for table `vw_getrequeststatustotal` */

DROP TABLE IF EXISTS `vw_getrequeststatustotal`;

/*!50001 DROP VIEW IF EXISTS `vw_getrequeststatustotal` */;
/*!50001 DROP TABLE IF EXISTS `vw_getrequeststatustotal` */;

/*!50001 CREATE TABLE  `vw_getrequeststatustotal`(
 `All` bigint(21) ,
 `New` bigint(21) ,
 `Shipped` bigint(21) ,
 `Cancel` bigint(21) ,
 `Process` bigint(21) ,
 `Incomplete` bigint(21) 
)*/;

/*Table structure for table `vw_getselectedorderdetails` */

DROP TABLE IF EXISTS `vw_getselectedorderdetails`;

/*!50001 DROP VIEW IF EXISTS `vw_getselectedorderdetails` */;
/*!50001 DROP TABLE IF EXISTS `vw_getselectedorderdetails` */;

/*!50001 CREATE TABLE  `vw_getselectedorderdetails`(
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `RequestListNo` int(11) ,
 `VariantNo` int(11) ,
 `ItemNo` varchar(22) ,
 `ItemDescription` mediumtext ,
 `ImageFile` text ,
 `Received` varchar(120) ,
 `Requested` bigint(12) ,
 `DPOCost` double ,
 `RequestsQty` int(11) ,
 `SubTotal` double ,
 `QtyReceived` bigint(11) ,
 `isPending` int(11) ,
 `IsDeliverPending` int(11) 
)*/;

/*Table structure for table `vw_getsupplyitemsbysupplier` */

DROP TABLE IF EXISTS `vw_getsupplyitemsbysupplier`;

/*!50001 DROP VIEW IF EXISTS `vw_getsupplyitemsbysupplier` */;
/*!50001 DROP TABLE IF EXISTS `vw_getsupplyitemsbysupplier` */;

/*!50001 CREATE TABLE  `vw_getsupplyitemsbysupplier`(
 `ItemNo` varchar(22) ,
 `ItemDescription` mediumtext ,
 `Category` varchar(156) ,
 `DPOCost` varchar(62) ,
 `SRP` varchar(62) ,
 `SupplierNo` int(11) 
)*/;

/*Table structure for table `vw_inventory` */

DROP TABLE IF EXISTS `vw_inventory`;

/*!50001 DROP VIEW IF EXISTS `vw_inventory` */;
/*!50001 DROP TABLE IF EXISTS `vw_inventory` */;

/*!50001 CREATE TABLE  `vw_inventory`(
 `ItemNo` varchar(22) ,
 `VariantNo` int(11) ,
 `ItemDescription` mediumtext ,
 `Category` varchar(156) ,
 `STOCKCOMMIT` decimal(33,0) ,
 `STOCKS` bigint(11) ,
 `COMMIT` decimal(32,0) ,
 `Action` mediumtext 
)*/;

/*Table structure for table `vw_items` */

DROP TABLE IF EXISTS `vw_items`;

/*!50001 DROP VIEW IF EXISTS `vw_items` */;
/*!50001 DROP TABLE IF EXISTS `vw_items` */;

/*!50001 CREATE TABLE  `vw_items`(
 `ItemNo` int(4) unsigned zerofill ,
 `Name` varchar(50) ,
 `UOM` varchar(20) ,
 `NoOfItems` bigint(21) ,
 `Name1` varchar(50) ,
 `Name2` varchar(50) ,
 `Name3` varchar(50) ,
 `SupplierNo` int(11) ,
 `SupplierName` varchar(50) ,
 `ViewItems` varchar(68) ,
 `Action` varchar(201) ,
 `Removed` tinyint(1) ,
 `SRemoved` tinyint(4) ,
 `Owned` tinyint(4) ,
 `Level1No` int(11) ,
 `Level2No` int(11) ,
 `Level3No` int(11) 
)*/;

/*Table structure for table `vw_itemsforsale` */

DROP TABLE IF EXISTS `vw_itemsforsale`;

/*!50001 DROP VIEW IF EXISTS `vw_itemsforsale` */;
/*!50001 DROP TABLE IF EXISTS `vw_itemsforsale` */;

/*!50001 CREATE TABLE  `vw_itemsforsale`(
 `ItemNumber` varchar(22) ,
 `Name` varchar(50) ,
 `VariantName` text ,
 `Stocks` int(11) ,
 `Price` double ,
 `UOM` varchar(20) ,
 `ImageFile` text ,
 `Name1` varchar(50) ,
 `Name2` varchar(50) ,
 `Name3` varchar(50) ,
 `Category` varchar(156) ,
 `Level1No` int(11) ,
 `Level2No` int(11) ,
 `Level3No` int(11) ,
 `ItemNo` int(4) unsigned zerofill ,
 `ItemNoV` int(4) unsigned zerofill ,
 `VariantNameJSON` text 
)*/;

/*Table structure for table `vw_itemvariant_limit1` */

DROP TABLE IF EXISTS `vw_itemvariant_limit1`;

/*!50001 DROP VIEW IF EXISTS `vw_itemvariant_limit1` */;
/*!50001 DROP TABLE IF EXISTS `vw_itemvariant_limit1` */;

/*!50001 CREATE TABLE  `vw_itemvariant_limit1`(
 `VariantNo` int(11) ,
 `ItemNo` int(4) unsigned zerofill ,
 `VariantName` text ,
 `VariantNameJSON` text ,
 `Size` varchar(75) ,
 `Color` varchar(50) ,
 `Description` varchar(75) ,
 `Stocks` int(11) ,
 `LowStock` int(11) ,
 `Critical` int(11) ,
 `DPOCost` double ,
 `SRP` double ,
 `Price` double ,
 `Removed` tinyint(4) ,
 `Owned` tinyint(4) ,
 `SupplierNo` int(11) ,
 `SRemoved` tinyint(4) ,
 `ImageFile` text 
)*/;

/*Table structure for table `vw_lowstocks` */

DROP TABLE IF EXISTS `vw_lowstocks`;

/*!50001 DROP VIEW IF EXISTS `vw_lowstocks` */;
/*!50001 DROP TABLE IF EXISTS `vw_lowstocks` */;

/*!50001 CREATE TABLE  `vw_lowstocks`(
 `ItemNo` varchar(22) ,
 `ItemDescription` mediumtext ,
 `SupplierName` varchar(50) ,
 `STOCKS` bigint(11) ,
 `LOWSTOCKS` bigint(11) ,
 `CRITICAL` bigint(11) 
)*/;

/*Table structure for table `vw_orderlistbyorderno` */

DROP TABLE IF EXISTS `vw_orderlistbyorderno`;

/*!50001 DROP VIEW IF EXISTS `vw_orderlistbyorderno` */;
/*!50001 DROP TABLE IF EXISTS `vw_orderlistbyorderno` */;

/*!50001 CREATE TABLE  `vw_orderlistbyorderno`(
 `OrderNo` int(8) unsigned zerofill ,
 `ItemNumber` varchar(22) ,
 `ItemDescription` mediumtext ,
 `Quantity` int(11) ,
 `Price` double ,
 `Total` double ,
 `ImageFile` text ,
 `Name` varchar(50) ,
 `VariantName` text 
)*/;

/*Table structure for table `vw_pendingorders` */

DROP TABLE IF EXISTS `vw_pendingorders`;

/*!50001 DROP VIEW IF EXISTS `vw_pendingorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_pendingorders` */;

/*!50001 CREATE TABLE  `vw_pendingorders`(
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `NoOfItems` bigint(21) ,
 `TotalDPOCost` varchar(63) ,
 `OrderDate` datetime ,
 `DPOCost` double ,
 `Quantity` int(11) ,
 `CustomerName` varchar(25) ,
 `DeliveredStatus` varchar(10) ,
 `DeliveredDate` datetime ,
 `ViewItems` varchar(74) ,
 `SupplierNo` int(11) ,
 `Action` varchar(80) 
)*/;

/*Table structure for table `vw_printsallitems` */

DROP TABLE IF EXISTS `vw_printsallitems`;

/*!50001 DROP VIEW IF EXISTS `vw_printsallitems` */;
/*!50001 DROP TABLE IF EXISTS `vw_printsallitems` */;

/*!50001 CREATE TABLE  `vw_printsallitems`(
 `ItemNo` varchar(22) ,
 `Name` varchar(50) ,
 `VariantName` text ,
 `UOM` varchar(20) ,
 `Stocks` bigint(11) ,
 `FamilyName` varchar(50) ,
 `Category` varchar(50) ,
 `SubCategory` varchar(50) 
)*/;

/*Table structure for table `vw_receivings` */

DROP TABLE IF EXISTS `vw_receivings`;

/*!50001 DROP VIEW IF EXISTS `vw_receivings` */;
/*!50001 DROP TABLE IF EXISTS `vw_receivings` */;

/*!50001 CREATE TABLE  `vw_receivings`(
 `SupplyNo` int(11) ,
 `DateReceive` datetime ,
 `SupplierName` varchar(50) ,
 `ItemDescription` mediumtext ,
 `QuantityReceived` int(11) ,
 `PendingQuantity` int(11) ,
 `Quantity` int(11) 
)*/;

/*Table structure for table `vw_requestlistfromadmin` */

DROP TABLE IF EXISTS `vw_requestlistfromadmin`;

/*!50001 DROP VIEW IF EXISTS `vw_requestlistfromadmin` */;
/*!50001 DROP TABLE IF EXISTS `vw_requestlistfromadmin` */;

/*!50001 CREATE TABLE  `vw_requestlistfromadmin`(
 `SupplyRequestNo` int(11) unsigned zerofill ,
 `NoOfItems` bigint(21) ,
 `TotalDPOCost` varchar(63) ,
 `OrderDate` datetime ,
 `DPOCost` double ,
 `Quantity` int(11) ,
 `CustomerName` varchar(25) ,
 `DeliveredStatus` varchar(10) ,
 `DeliveredDate` datetime ,
 `ViewItems` varchar(74) ,
 `SupplierNo` int(11) ,
 `Action` varchar(69) 
)*/;

/*Table structure for table `vw_sumquantityforinventory` */

DROP TABLE IF EXISTS `vw_sumquantityforinventory`;

/*!50001 DROP VIEW IF EXISTS `vw_sumquantityforinventory` */;
/*!50001 DROP TABLE IF EXISTS `vw_sumquantityforinventory` */;

/*!50001 CREATE TABLE  `vw_sumquantityforinventory`(
 `VariantNo` int(11) ,
 `COMMIT` decimal(32,0) 
)*/;

/*View structure for view vw_allorders */

/*!50001 DROP TABLE IF EXISTS `vw_allorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_allorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_allorders` AS (select 'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`o`.`CustomerNo` AS `CustomerNo`,`o`.`OrderNo` AS `OrderNo`,count(`od`.`OrderNo`) AS `NoOfItems`,concat(`c`.`Firstname`,' ',`c`.`Lastname`) AS `CustomerName`,`c`.`HomeAddress` AS `Address`,`c`.`ShipAddress` AS `ShipAddress`,`c`.`Landmark` AS `Landmark`,`o`.`Date` AS `OrderDate`,format(`o`.`TotalAmount`,2) AS `TotalAmount`,`o`.`Status` AS `Status`,`o`.`DeliverBy` AS `DeliverBy`,(case when (`o`.`Status` = 'New') then concat('<div class="btn-group" align="center"><button class="btn btn-default" onclick="cancelOrder(\'',`o`.`OrderNo`,'\');">Cancel</button><button class="btn btn-action" onclick="processOrder(\'',`o`.`OrderNo`,'\');">Process</button></div>') when (`o`.`Status` = 'Process') then concat('<button class="btn btn-action" onclick="shipOrder(\'',`o`.`OrderNo`,'\');" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#shipOrderModal">Ship</button>') else '' end) AS `Action` from ((`tblorder` `o` join `customer` `c` on((`o`.`CustomerNo` = `c`.`CustomerNo`))) join `tblorderdetails` `od` on((`o`.`OrderNo` = `od`.`OrderNo`))) group by `od`.`OrderNo`) */;

/*View structure for view vw_getbackorders */

/*!50001 DROP TABLE IF EXISTS `vw_getbackorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_getbackorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getbackorders` AS (select `rl`.`RequestListNo` AS `RequestListNo`,`s`.`SupplierName` AS `SupplierName`,`s`.`SupplierNo` AS `SupplierNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`rl`.`Received` AS `Received`,`sup`.`PendingQuantity` AS `PendingQuantity`,`sup`.`DateReceive` AS `DateReceive` from (((((`supplyrequest` `sr` join `supply` `sup` on((`sr`.`SupplyRequestNo` = `sup`.`SupplyRequestNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`sup`.`RequestListNo` = `rl`.`RequestListNo`)))) join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on(((`rl`.`VariantNo` = `iv`.`VariantNo`) and (`i`.`ItemNo` = `iv`.`ItemNo`)))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) where (`sup`.`PendingQuantity` > 0)) */;

/*View structure for view vw_getcategories */

/*!50001 DROP TABLE IF EXISTS `vw_getcategories` */;
/*!50001 DROP VIEW IF EXISTS `vw_getcategories` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getcategories` AS (select `l1`.`Level1No` AS `Level1No`,`l1`.`Name1` AS `Family`,`l1`.`ImageFile` AS `ImageFile`,`l2`.`Level2No` AS `Level2No`,(case when isnull(`l2`.`Name2`) then '<span class="tr-action pull-right"><a>Add</a></span>' else concat('<p class="td-name">',`l2`.`Name2`,'</p><span class="tr-action pull-right"><a class="td-edit">Edit</a> | <a class="td-delete">Delete</a></span>') end) AS `Category`,`l3`.`Level3No` AS `Level3No`,(case when isnull(`l3`.`Name3`) then '<span class="tr-action pull-right"><a>Add</a></span>' else concat('<p class="td-name">',`l3`.`Name3`,'</p><span class="tr-action pull-right"><a class="td-edit">Edit</a> | <a class="td-delete">Delete</a></span>') end) AS `SubCategory` from ((`level1` `l1` left join `level2` `l2` on((`l1`.`Level1No` = `l2`.`Level1No`))) left join `level3` `l3` on(((`l1`.`Level1No` = `l3`.`Level1No`) and (`l2`.`Level2No` = `l3`.`Level2No`)))) order by `l1`.`Name1`,`l2`.`Name2`,`l3`.`Name3`) */;

/*View structure for view vw_getlowstockbysupplier */

/*!50001 DROP TABLE IF EXISTS `vw_getlowstockbysupplier` */;
/*!50001 DROP VIEW IF EXISTS `vw_getlowstockbysupplier` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getlowstockbysupplier` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`iv`.`LowStock`,0) AS `LOWSTOCKS`,ifnull(`iv`.`Critical`,0) AS `CRITICAL`,`iv`.`SupplierNo` AS `SupplierNo` from (`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) where ((`iv`.`Stocks` <= `iv`.`LowStock`) and (`iv`.`Owned` = 1))) */;

/*View structure for view vw_getmostcustomer */

/*!50001 DROP TABLE IF EXISTS `vw_getmostcustomer` */;
/*!50001 DROP VIEW IF EXISTS `vw_getmostcustomer` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getmostcustomer` AS (select concat(`c`.`Firstname`,' ',`c`.`Lastname`) AS `CustomerName`,count(`o`.`CustomerNo`) AS `Total`,0 AS `Percentage` from (`customer` `c` join `tblorder` `o` on((`c`.`CustomerNo` = `o`.`CustomerNo`))) group by `o`.`CustomerNo` limit 5) */;

/*View structure for view vw_getmostordereditems */

/*!50001 DROP TABLE IF EXISTS `vw_getmostordereditems` */;
/*!50001 DROP VIEW IF EXISTS `vw_getmostordereditems` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getmostordereditems` AS (select `i`.`Name` AS `Name`,sum(`ol`.`Quantity`) AS `Total`,0 AS `Percentage` from ((`orderlist` `ol` join `tblorder` `o` on(((`ol`.`OrderNo` = `o`.`OrderNo`) and (`o`.`Status` = 'Ship')))) join `item` `i` on((`ol`.`ItemNo` = `i`.`ItemNo`))) group by `i`.`Name` order by sum(`ol`.`Quantity`) desc limit 5) */;

/*View structure for view vw_getorderbysupplier */

/*!50001 DROP TABLE IF EXISTS `vw_getorderbysupplier` */;
/*!50001 DROP VIEW IF EXISTS `vw_getorderbysupplier` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getorderbysupplier` AS (select concat('<button class="btn btn-success" onclick=\'addtoPo("',`i`.`ItemNo`,'","',`iv`.`VariantNo`,'");\'><span class="glyphicon glyphicon-plus"></span></button>') AS `Action`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `Description`,`iv`.`DPOCost` AS `DPOCost`,`i`.`SupplierNo` AS `SupplierNo` from (`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`)))) */;

/*View structure for view vw_getpendingitemsbysupplyrequestno */

/*!50001 DROP TABLE IF EXISTS `vw_getpendingitemsbysupplyrequestno` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpendingitemsbysupplyrequestno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpendingitemsbysupplyrequestno` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`rl`.`SupplyRequestNo` AS `SupplyRequestNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(`iv`.`Price`,2) AS `Price`,`rl`.`Quantity` AS `RequestsQty`,`rl`.`Received` AS `Received`,format(cast((`iv`.`Price` * `rl`.`Quantity`) as double(10,2)),2) AS `SubTotal`,`s`.`SupplierName` AS `SupplierName` from (((`requestlist` `rl` join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`)))) */;

/*View structure for view vw_getposubmit */

/*!50001 DROP TABLE IF EXISTS `vw_getposubmit` */;
/*!50001 DROP VIEW IF EXISTS `vw_getposubmit` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getposubmit` AS (select concat('<a onclick="removePO(\'',`rl`.`RequestListNo`,'\',this);"><span class="glyphicon glyphicon-remove"></span></a>') AS `Remove`,concat('<input type="text" value="',ifnull(`rl`.`Quantity`,1),'" class="form-control poquantity" onblur="updatePOQty(\'',`rl`.`RequestListNo`,'\',this);"/>') AS `ItemQty`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `Item`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(`iv`.`Price`,2) AS `Price`,format(ifnull(`rl`.`Total`,`iv`.`Price`),2) AS `Total`,`rl`.`createdby` AS `createdby`,`i`.`SupplierNo` AS `SupplierNo`,`rl`.`RequestListNo` AS `RequestListNo` from ((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `requestlist` `rl` on(((`i`.`ItemNo` = `rl`.`ItemNo`) and (`iv`.`VariantNo` = `rl`.`VariantNo`)))) where (`rl`.`Temp` = 1)) */;

/*View structure for view vw_getpotoreceive */

/*!50001 DROP TABLE IF EXISTS `vw_getpotoreceive` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpotoreceive` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpotoreceive` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,`s`.`SupplierName` AS `SupplierName`,`sr`.`Date` AS `Date`,`sr`.`DeliveredDate` AS `DeliveredDate` from ((`supplyrequest` `sr` join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`rl`.`Quantity` is not null)))) where (((`sr`.`isReceived` = 0) and (`sr`.`DeliveredStatus` = 1)) or (`sr`.`IsDeliverPending` <> 0)) group by `rl`.`SupplyRequestNo` order by `sr`.`Date` desc) */;

/*View structure for view vw_getpurchaseorders */

/*!50001 DROP TABLE IF EXISTS `vw_getpurchaseorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpurchaseorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpurchaseorders` AS (select 'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`sr`.`SupplyRequestNo` AS `SupplyRequestNo`,`s`.`SupplierName` AS `SupplierName`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,format(sum((`rl`.`Quantity` * `iv`.`DPOCost`)),2) AS `TotalDPOCost`,`sr`.`Date` AS `Date`,(case when (`sr`.`isReceived` = 1) then 'Received' when (`sr`.`DeliveredStatus` = 1) then 'Delivered' else 'Pending' end) AS `Status`,concat('<span><a>View</a> | <a>Print</a></span>') AS `Action` from (((`supplyrequest` `sr` join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`rl`.`Quantity` is not null)))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) group by `rl`.`SupplyRequestNo` order by `sr`.`Date` desc) */;

/*View structure for view vw_getrequestlistbysupplyrequestno */

/*!50001 DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequestlistbysupplyrequestno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequestlistbysupplyrequestno` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`rl`.`SupplyRequestNo` AS `SupplyRequestNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(`iv`.`Price`,2) AS `Price`,`rl`.`Quantity` AS `RequestsQty`,format(cast((`iv`.`Price` * `rl`.`Quantity`) as double(10,2)),2) AS `SubTotal`,`s`.`SupplierName` AS `SupplierName` from (((`requestlist` `rl` join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`)))) */;

/*View structure for view vw_getrequeststatustotal */

/*!50001 DROP TABLE IF EXISTS `vw_getrequeststatustotal` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequeststatustotal` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequeststatustotal` AS (select count(`o`.`Status`) AS `All`,count(`n`.`Status`) AS `New`,count(`s`.`Status`) AS `Shipped`,count(`c`.`Status`) AS `Cancel`,count(`p`.`Status`) AS `Process`,count(`i`.`Status`) AS `Incomplete` from (((((`tblorder` `o` left join `tblorder` `n` on(((`o`.`OrderNo` = `n`.`OrderNo`) and (`n`.`Status` = 'New')))) left join `tblorder` `s` on(((`o`.`OrderNo` = `s`.`OrderNo`) and (`s`.`Status` = 'Ship')))) left join `tblorder` `c` on(((`o`.`OrderNo` = `c`.`OrderNo`) and (`c`.`Status` = 'Cancel')))) left join `tblorder` `p` on(((`o`.`OrderNo` = `p`.`OrderNo`) and (`p`.`Status` = 'Process')))) left join `tblorder` `i` on(((`o`.`OrderNo` = `i`.`OrderNo`) and (`i`.`Status` = 'Incomplete'))))) */;

/*View structure for view vw_getselectedorderdetails */

/*!50001 DROP TABLE IF EXISTS `vw_getselectedorderdetails` */;
/*!50001 DROP VIEW IF EXISTS `vw_getselectedorderdetails` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getselectedorderdetails` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,`rl`.`RequestListNo` AS `RequestListNo`,`iv`.`VariantNo` AS `VariantNo`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,concat('<input type="text" value="',(case when (`rl`.`isPending` = 1) then (`rl`.`Quantity` - `rl`.`Received`) else ifnull(`rl`.`Quantity`,0) end),'" class="form-control poreceived" onblur="updatePOReceived(\'',`rl`.`RequestListNo`,'\',this);"/>') AS `Received`,(case when (`rl`.`isPending` = 1) then (`rl`.`Quantity` - `rl`.`Received`) else ifnull(`rl`.`Quantity`,0) end) AS `Requested`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `RequestsQty`,(`iv`.`DPOCost` * `rl`.`Quantity`) AS `SubTotal`,ifnull(`rl`.`Received`,0) AS `QtyReceived`,`rl`.`isPending` AS `isPending`,`sr`.`IsDeliverPending` AS `IsDeliverPending` from (((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `requestlist` `rl` on(((`i`.`ItemNo` = `rl`.`ItemNo`) and (`rl`.`VariantNo` = `iv`.`VariantNo`)))) join `supplyrequest` `sr` on((`rl`.`SupplyRequestNo` = `sr`.`SupplyRequestNo`)))) */;

/*View structure for view vw_getsupplyitemsbysupplier */

/*!50001 DROP TABLE IF EXISTS `vw_getsupplyitemsbysupplier` */;
/*!50001 DROP VIEW IF EXISTS `vw_getsupplyitemsbysupplier` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getsupplyitemsbysupplier` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,concat(`l1`.`Name1`,' > ',`l2`.`Name2`,' > ',`l3`.`Name3`) AS `Category`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(`iv`.`SRP`,2) AS `SRP`,`i`.`SupplierNo` AS `SupplierNo` from ((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`)))) */;

/*View structure for view vw_inventory */

/*!50001 DROP TABLE IF EXISTS `vw_inventory` */;
/*!50001 DROP VIEW IF EXISTS `vw_inventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`iv`.`VariantNo` AS `VariantNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,concat(`l1`.`Name1`,ifnull(concat(' > ',`l2`.`Name2`),''),ifnull(concat(' > ',`l3`.`Name3`),'')) AS `Category`,(ifnull(`iv`.`Stocks`,0) - ifnull(`siv`.`COMMIT`,0)) AS `STOCKCOMMIT`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`siv`.`COMMIT`,0) AS `COMMIT`,concat('<button class=\'btn btn-action\' onclick="physicalCount(\'',`iv`.`VariantNo`,'\', \'',concat(`i`.`Name`,'<br/>',`iv`.`VariantName`),'\');"><span class=\'glyphicon glyphicon-plus\'></span> Physical Count</button>') AS `Action` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) left join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) left join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) left join `vw_sumquantityforinventory` `siv` on((`iv`.`VariantNo` = `siv`.`VariantNo`))) where (`iv`.`Owned` = 1)) */;

/*View structure for view vw_items */

/*!50001 DROP TABLE IF EXISTS `vw_items` */;
/*!50001 DROP VIEW IF EXISTS `vw_items` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_items` AS (select `i`.`ItemNo` AS `ItemNo`,`i`.`Name` AS `Name`,`i`.`UOM` AS `UOM`,count(`iv`.`ItemNo`) AS `NoOfItems`,`l1`.`Name1` AS `Name1`,`l2`.`Name2` AS `Name2`,`l3`.`Name3` AS `Name3`,`s`.`SupplierNo` AS `SupplierNo`,`s`.`SupplierName` AS `SupplierName`,'View <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,(case when ((`i`.`Removed` = 1) or (`i`.`SRemoved` = 1)) then concat('<button class="btn btn-action" onclick="removeOrRecoverItem(\'',`i`.`ItemNo`,'\',\'',`i`.`Name`,'\',this,0);"><span class="glyphicon glyphicon-export"></span> Recover</button>') else concat('<button class="btn btn-action" onclick="removeOrRecoverItem(\'',`i`.`ItemNo`,'\',\'',`i`.`Name`,'\',this,1);"><span class="glyphicon glyphicon-trash"></span> Delete</button>') end) AS `Action`,`i`.`Removed` AS `Removed`,`i`.`SRemoved` AS `SRemoved`,`iv`.`Owned` AS `Owned`,`l1`.`Level1No` AS `Level1No`,`l2`.`Level2No` AS `Level2No`,`l3`.`Level3No` AS `Level3No` from (((((`item` `i` left join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) left join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) left join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) group by `iv`.`ItemNo`) */;

/*View structure for view vw_itemsforsale */

/*!50001 DROP TABLE IF EXISTS `vw_itemsforsale` */;
/*!50001 DROP VIEW IF EXISTS `vw_itemsforsale` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_itemsforsale` AS (select concat(`iv`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNumber`,`i`.`Name` AS `Name`,`iv`.`VariantName` AS `VariantName`,`iv`.`Stocks` AS `Stocks`,`iv`.`Price` AS `Price`,`i`.`UOM` AS `UOM`,`iv`.`ImageFile` AS `ImageFile`,`l1`.`Name1` AS `Name1`,`l2`.`Name2` AS `Name2`,`l3`.`Name3` AS `Name3`,concat(`l1`.`Name1`,ifnull(concat(' / ',`l2`.`Name2`),''),ifnull(concat(' / ',`l3`.`Name3`),'')) AS `Category`,`l1`.`Level1No` AS `Level1No`,`l2`.`Level2No` AS `Level2No`,`l3`.`Level3No` AS `Level3No`,`i`.`ItemNo` AS `ItemNo`,`iv`.`ItemNo` AS `ItemNoV`,`iv`.`VariantNameJSON` AS `VariantNameJSON` from ((((`itemvariant` `iv` join `item` `i` on((`iv`.`ItemNo` = `i`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) left join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) left join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) where ((`iv`.`Owned` = 1) and (`i`.`Owned` = 1) and (`iv`.`Price` is not null) and ((`i`.`SRemoved` = 0) or isnull(`i`.`SRemoved`)) and ((`iv`.`Removed` = 0) or isnull(`iv`.`Removed`)))) */;

/*View structure for view vw_itemvariant_limit1 */

/*!50001 DROP TABLE IF EXISTS `vw_itemvariant_limit1` */;
/*!50001 DROP VIEW IF EXISTS `vw_itemvariant_limit1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_itemvariant_limit1` AS (select `itemvariant`.`VariantNo` AS `VariantNo`,`itemvariant`.`ItemNo` AS `ItemNo`,`itemvariant`.`VariantName` AS `VariantName`,`itemvariant`.`VariantNameJSON` AS `VariantNameJSON`,`itemvariant`.`Size` AS `Size`,`itemvariant`.`Color` AS `Color`,`itemvariant`.`Description` AS `Description`,`itemvariant`.`Stocks` AS `Stocks`,`itemvariant`.`LowStock` AS `LowStock`,`itemvariant`.`Critical` AS `Critical`,`itemvariant`.`DPOCost` AS `DPOCost`,`itemvariant`.`SRP` AS `SRP`,`itemvariant`.`Price` AS `Price`,`itemvariant`.`Removed` AS `Removed`,`itemvariant`.`Owned` AS `Owned`,`itemvariant`.`SupplierNo` AS `SupplierNo`,`itemvariant`.`SRemoved` AS `SRemoved`,`itemvariant`.`ImageFile` AS `ImageFile` from `itemvariant` limit 1) */;

/*View structure for view vw_lowstocks */

/*!50001 DROP TABLE IF EXISTS `vw_lowstocks` */;
/*!50001 DROP VIEW IF EXISTS `vw_lowstocks` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lowstocks` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`s`.`SupplierName` AS `SupplierName`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`iv`.`LowStock`,0) AS `LOWSTOCKS`,ifnull(`iv`.`Critical`,0) AS `CRITICAL` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) where (((`iv`.`Owned` = 1) and (`iv`.`Stocks` is not null) and (`iv`.`Stocks` <= `iv`.`Critical`)) or ((`iv`.`Stocks` <= `iv`.`LowStock`) and (`iv`.`Stocks` > `iv`.`Critical`)))) */;

/*View structure for view vw_orderlistbyorderno */

/*!50001 DROP TABLE IF EXISTS `vw_orderlistbyorderno` */;
/*!50001 DROP VIEW IF EXISTS `vw_orderlistbyorderno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlistbyorderno` AS (select `o`.`OrderNo` AS `OrderNo`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNumber`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`o`.`Quantity` AS `Quantity`,`iv`.`Price` AS `Price`,(`o`.`Quantity` * `iv`.`Price`) AS `Total`,`iv`.`ImageFile` AS `ImageFile`,`i`.`Name` AS `Name`,`iv`.`VariantName` AS `VariantName` from ((`tblorderdetails` `o` join `itemvariant` `iv` on((`o`.`ItemVariantNo` = convert(concat(`iv`.`ItemNo`,'-',`iv`.`VariantNo`) using latin1)))) join `item` `i` on((`iv`.`ItemNo` = `i`.`ItemNo`)))) */;

/*View structure for view vw_pendingorders */

/*!50001 DROP TABLE IF EXISTS `vw_pendingorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_pendingorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pendingorders` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,format(sum((`rl`.`Quantity` * `iv`.`DPOCost`)),2) AS `TotalDPOCost`,`sr`.`Date` AS `OrderDate`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `Quantity`,'Lampano Hardware Tradings' AS `CustomerName`,`sr`.`DeliveredStatus` AS `DeliveredStatus`,`sr`.`DeliveredDate` AS `DeliveredDate`,'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`sr`.`SupplierNo` AS `SupplierNo`,(case when (`sr`.`IsDeliverPending` = 1) then 'Delivered' else '<button class="btn btn-action btn-deliverpending">Deliver Pending order</button>' end) AS `Action` from ((`supplyrequest` `sr` join `requestlist` `rl` on((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) where (`sr`.`isPendingItems` = 1) group by `rl`.`SupplyRequestNo`) */;

/*View structure for view vw_printsallitems */

/*!50001 DROP TABLE IF EXISTS `vw_printsallitems` */;
/*!50001 DROP VIEW IF EXISTS `vw_printsallitems` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_printsallitems` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`i`.`Name` AS `Name`,`iv`.`VariantName` AS `VariantName`,`i`.`UOM` AS `UOM`,ifnull(`iv`.`Stocks`,0) AS `Stocks`,`l1`.`Name1` AS `FamilyName`,ifnull(`l2`.`Name2`,'-') AS `Category`,ifnull(`l3`.`Name3`,'-') AS `SubCategory` from ((((`itemvariant` `iv` join `item` `i` on((`iv`.`ItemNo` = `i`.`ItemNo`))) join `level1` `l1` on((`l1`.`Level1No` = `i`.`Level1No`))) left join `level2` `l2` on((`l2`.`Level2No` = `i`.`Level2No`))) left join `level3` `l3` on((`l3`.`Level3No` = `i`.`Level3No`))) where ((`iv`.`Owned` = 1) and ((`iv`.`Removed` = 0) or isnull(`iv`.`Removed`)) and ((`i`.`Removed` = 0) or isnull(`i`.`Removed`)))) */;

/*View structure for view vw_receivings */

/*!50001 DROP TABLE IF EXISTS `vw_receivings` */;
/*!50001 DROP VIEW IF EXISTS `vw_receivings` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_receivings` AS (select `sup`.`SupplyNo` AS `SupplyNo`,`sup`.`DateReceive` AS `DateReceive`,`s`.`SupplierName` AS `SupplierName`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`sup`.`QuantityReceived` AS `QuantityReceived`,`sup`.`PendingQuantity` AS `PendingQuantity`,`rl`.`Quantity` AS `Quantity` from (((((`supplyrequest` `sr` join `supply` `sup` on((`sr`.`SupplyRequestNo` = `sup`.`SupplyRequestNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`sup`.`RequestListNo` = `rl`.`RequestListNo`)))) join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) where (`sr`.`isReceived` = 1) order by `sup`.`DateReceive` desc) */;

/*View structure for view vw_requestlistfromadmin */

/*!50001 DROP TABLE IF EXISTS `vw_requestlistfromadmin` */;
/*!50001 DROP VIEW IF EXISTS `vw_requestlistfromadmin` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_requestlistfromadmin` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,format(sum((`rl`.`Quantity` * `iv`.`DPOCost`)),2) AS `TotalDPOCost`,`sr`.`Date` AS `OrderDate`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `Quantity`,'Lampano Hardware Tradings' AS `CustomerName`,`sr`.`DeliveredStatus` AS `DeliveredStatus`,`sr`.`DeliveredDate` AS `DeliveredDate`,'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`sr`.`SupplierNo` AS `SupplierNo`,(case when (`sr`.`DeliveredStatus` = 1) then 'Delivered' else '<button class="btn btn-action btn-deliver">Approve & Deliver</button>' end) AS `Action` from ((`supplyrequest` `sr` join `requestlist` `rl` on((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) where (`sr`.`isReceived` = 0) group by `rl`.`SupplyRequestNo`) */;

/*View structure for view vw_sumquantityforinventory */

/*!50001 DROP TABLE IF EXISTS `vw_sumquantityforinventory` */;
/*!50001 DROP VIEW IF EXISTS `vw_sumquantityforinventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sumquantityforinventory` AS (select `iv`.`VariantNo` AS `VariantNo`,sum(`ol`.`Quantity`) AS `COMMIT` from (((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `tblorderdetails` `ol` on((convert(concat(`iv`.`ItemNo`,'-',`iv`.`VariantNo`) using latin1) = `ol`.`ItemVariantNo`))) join `tblorder` `o` on((`o`.`OrderNo` = `ol`.`OrderNo`))) where (((`iv`.`Removed` = 0) or isnull(`iv`.`Removed`)) and (`iv`.`Owned` = 1) and ((`o`.`Status` = 'Process') or (`o`.`Status` = 'Ship'))) group by `iv`.`VariantNo`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
