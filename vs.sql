/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.9-MariaDB : Database - lampanohardwaretradings
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lampanohardwaretradings` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `AccountNo` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(16) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `LoginType` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`AccountNo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

insert  into `accounts`(`AccountNo`,`Username`,`Password`,`LoginType`) values (1,'Rolen','5f4dcc3b5aa765d61d8327deb882cf99','admin'),(2,'JMDMktg','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(3,'VEEnt','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(4,'Voschtech','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(5,'DJZTrd','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(6,'Solarfoam','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(7,'HGCECo','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(8,'mtest','5f4dcc3b5aa765d61d8327deb882cf99','supplier');

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
  KEY `FKAccount_admin` (`AccountNo`),
  CONSTRAINT `FKAccount_admin` FOREIGN KEY (`AccountNo`) REFERENCES `accounts` (`AccountNo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`AdminNo`,`Name`,`AuthorityLevel`,`ContactNo`,`Address`,`AccountNo`) values (1,'Rolen','Owner','1234124','Gen. Luis',NULL),(2,'Raemond','Co-owner','13134341','Sta Lucia',NULL),(3,'Melyza','Manager','4224231','Sabungan',NULL),(4,'Patrick','Worker','4356345','Caloocan',NULL),(5,'Marc','Worker','9296940118','Bukaneg St Sta Lucia Novaliches Quezon City',NULL),(6,'Hannah','Manager','549811651','Fairview',NULL),(7,'Ed','watcher','897456321','BukanegGroundz',NULL);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `CategoryNo` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) DEFAULT NULL,
  `CategoryDescription` varchar(50) DEFAULT NULL,
  `FamilyNo` int(3) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`CategoryNo`),
  KEY `FKFamily_category` (`FamilyNo`),
  CONSTRAINT `FKFamily_category` FOREIGN KEY (`FamilyNo`) REFERENCES `family` (`FamilyNo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`CategoryNo`,`Category`,`CategoryDescription`,`FamilyNo`) values (001,'Paints','Pangkulay ng iyong buhay',001),(002,'Brushes and Rollers',NULL,001),(003,'Caulks and Sealants',NULL,001),(004,'Adhesive and Tapes',NULL,001),(005,'Ladders',NULL,001),(006,'Power Tools',NULL,002),(007,'Hand Tools',NULL,002),(008,'Measuring Tools',NULL,002),(009,'Tool Organizers',NULL,002),(010,'Bulbs and Flourescent',NULL,003),(011,'Ligthing Fixtures',NULL,003),(012,'Flashlights and Batteries',NULL,003),(013,'Rechargables',NULL,003),(014,'Power Supply',NULL,003),(015,'Extension Cords, Wires, and Cables',NULL,003),(016,'Wiring Devices',NULL,003),(017,'Audio, Video and Telephone',NULL,003),(018,'Supplies',NULL,003),(019,'Air Purifier',NULL,004),(020,'Faucets',NULL,004),(021,'Fittings',NULL,004),(022,'Shower and Bidets',NULL,004),(023,'Water Filtration',NULL,004),(024,'Water Heaters',NULL,004),(025,'Water Storage and Pumps',NULL,004),(026,'Waterclosets and Accessories',NULL,004),(027,'Sink, Lavatory and Accessories',NULL,004),(028,'Building Materials and Supplies',NULL,005),(029,'Door and Hardware',NULL,005);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `CustomerNo` int(11) NOT NULL AUTO_INCREMENT,
  `Lastname` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `ContactNo` decimal(11,0) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `OrderNo` int(8) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`CustomerNo`),
  KEY `FKOrder_customer` (`OrderNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`CustomerNo`,`Lastname`,`Firstname`,`ContactNo`,`Email`,`Address`,`OrderNo`) values (1,'abwerv','awerc','121','qcdaw','avwdw',00000005),(2,'abwerv','awerc','1213','qcdaw','avwdw',00000006),(3,'asdf','awdwad','9296940118','wadaw','aweda',00000007),(4,'asdfasdf','asdfasdf','9353040116','','adsfgadfa',00000008),(5,'asd','asd','9111111111','','asd',00000009),(6,'Friaz','Mark Anthony','9124455679','test@gmail.com','MyAddress',00000010),(7,'testorder','testorder','123456788','friazmarkanthony@gmail.com','testaddress',00000010),(8,'testorder1','testorder','99999999999','friazmarkanthony@gmail.com','testaddress',00000011),(9,'test','test','99999999999','test@gmail.com','test',NULL),(10,'test','test2','12312321','test','test',NULL),(11,'testadd','add','4434343','test@gmail.com','5awdad',NULL);

/*Table structure for table `family` */

DROP TABLE IF EXISTS `family`;

CREATE TABLE `family` (
  `FamilyNo` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Family` varchar(30) DEFAULT NULL,
  `FamilyDescription` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`FamilyNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `forum_post` */

insert  into `forum_post`(`post_id`,`post_title`,`post_author`,`post_body`,`post_type`,`op_id`,`forum_name`) values (1,'patrick','john','just a little time baby','o',NULL,'patrick'),(2,'asd',NULL,NULL,'o',NULL,NULL),(7,'adf','adsf','asdf','o',0,'adf');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `ItemNo` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Image` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`ItemNo`,`Name`,`Image`,`BoolFields`,`SizeType`,`Removed`,`Owned`,`Level1No`,`Level2No`,`Level3No`,`SupplierNo`,`SRemoved`) values (0031,'Nail',NULL,1,'Length',0,1,12,15,11,4,0);

/*Table structure for table `itemvariant` */

DROP TABLE IF EXISTS `itemvariant`;

CREATE TABLE `itemvariant` (
  `VariantNo` int(11) NOT NULL AUTO_INCREMENT,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  `Size` varchar(75) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Description` varchar(75) DEFAULT NULL,
  `Stocks` int(11) DEFAULT NULL,
  `LowStock` int(11) DEFAULT NULL,
  `Critical` int(11) DEFAULT NULL,
  `DPOCost` double DEFAULT NULL,
  `SRP` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Removed` tinyint(4) DEFAULT NULL,
  `Owned` tinyint(4) DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `SRemoved` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`VariantNo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `itemvariant` */

insert  into `itemvariant`(`VariantNo`,`ItemNo`,`Size`,`Color`,`Description`,`Stocks`,`LowStock`,`Critical`,`DPOCost`,`SRP`,`Price`,`Removed`,`Owned`,`SupplierNo`,`SRemoved`) values (1,0021,'12mm x 12mm x 12mm','','',NULL,NULL,NULL,12,13,NULL,0,1,NULL,0),(2,0021,'12mm x 1mm x 1mm','','',NULL,12,12,1,2,12,0,1,NULL,0),(3,0021,'10mm x 10mm x 10mm','','',NULL,NULL,NULL,10,11,NULL,0,0,NULL,0),(4,0025,'1mm x 13mm x 5mm','','',NULL,NULL,NULL,12,13,NULL,0,0,NULL,0),(5,0026,'','','',NULL,NULL,NULL,12,13,NULL,0,0,4,0),(6,0027,'','','',NULL,NULL,NULL,12,13,NULL,0,0,4,0),(7,0027,'','','',NULL,NULL,NULL,12,13,NULL,0,0,4,0),(8,0029,'500mL','Red','',NULL,NULL,NULL,100,50,NULL,0,0,4,0),(9,0030,'500mL','Blue','',NULL,NULL,NULL,12,13,NULL,0,0,4,0),(12,0031,'2mm','','',128,10,10,10,15,16,0,1,4,0),(13,0031,'1mm','','',NULL,10,10,10,11,15,0,1,4,0),(14,0031,'3mm','','',NULL,NULL,NULL,10,5,NULL,0,0,4,0),(15,0031,'4mm','','',NULL,NULL,NULL,10,5,NULL,0,0,4,0),(16,0031,'5mm','','',NULL,NULL,NULL,10,15,NULL,0,0,4,0),(17,0031,'6mm','','',NULL,NULL,NULL,100,150,NULL,0,0,4,0),(18,0031,'7mm','','',NULL,NULL,NULL,5,10,NULL,0,0,4,0);

/*Table structure for table `level1` */

DROP TABLE IF EXISTS `level1`;

CREATE TABLE `level1` (
  `Level1No` int(11) NOT NULL AUTO_INCREMENT,
  `Name1` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Level1No`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `level1` */

insert  into `level1`(`Level1No`,`Name1`) values (10,'Appliances'),(11,'Automobile'),(12,'Applianceses'),(13,'Applianceses'),(14,'Applianceses'),(15,'Applianceses'),(16,'Applianceses'),(17,'Applianceses');

/*Table structure for table `level2` */

DROP TABLE IF EXISTS `level2`;

CREATE TABLE `level2` (
  `Level2No` int(11) NOT NULL AUTO_INCREMENT,
  `Name2` varchar(50) DEFAULT NULL,
  `Level1No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level2No`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `level2` */

insert  into `level2`(`Level2No`,`Name2`,`Level1No`) values (10,'Cooling',10),(11,'Kitchen Appliances',10),(12,'Utility Equipment ',10),(13,'Car Care',11),(14,'Building Decors',12),(15,'Building Supplies',12),(16,'Ceiling & Wall',12),(17,'Floor',12),(18,'Roofing',12),(19,'Door',13),(20,'Mouldings',13),(21,'Window',13),(22,'Lightings',14),(23,'Electrical Supplies',14),(24,'Electrical Accessories',14),(25,'Chemicals',15),(26,'Equipment/Materials',15),(27,'Paint',15),(28,'Bath & Shower Mixer',16),(29,'Kitchen Sinks',16),(30,'Faucets',16),(31,'Hand Tools',17),(32,'Power Tools',17),(33,'Equipment',17),(35,'test',15);

/*Table structure for table `level3` */

DROP TABLE IF EXISTS `level3`;

CREATE TABLE `level3` (
  `Level3No` int(11) NOT NULL AUTO_INCREMENT,
  `Name3` varchar(50) DEFAULT NULL,
  `Level1No` int(11) DEFAULT NULL,
  `Level2No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level3No`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `level3` */

insert  into `level3`(`Level3No`,`Name3`,`Level1No`,`Level2No`) values (8,'Safety & Security',17,31),(9,'Cement',12,16),(10,'wood',12,16),(11,'Nail',12,15),(12,'Wire',12,15),(13,'Tile Trim',12,16),(14,'Glass',13,19),(15,'Wood',13,19),(16,'Wood',13,20),(17,'Chargeable Light',14,22),(18,'Decorative',14,22),(19,'Tape',14,23),(20,'Gadgets & Equipments',14,23),(21,'Circuit Breaker',14,24),(22,'Pipes & Fittings',14,24),(23,'Adhesives',15,25),(24,'Additive',15,25),(25,'Sealants',15,25),(26,'Solvent Based',15,25),(27,'Thinner',15,25),(28,'Top Coats',15,25),(29,'Water Based',15,25),(30,'Paint Brush',15,26),(31,'Sundries',15,26),(32,'Equipment',15,26),(33,'Automotive Paints',15,27),(34,'Epoxy',15,27),(35,'Latex (Acrylic)',15,27),(36,'Spray Paint',15,27),(37,'Solvent Based',15,27),(38,'Elastomeric',15,27),(39,'Stainless Sink',16,29),(40,'Kitchen Faucets',16,30),(41,'Lavatory Faucets',16,30),(42,'Bidet Faucets',16,30),(43,'Electrical',17,33),(44,'Electrical',17,32),(45,'Sundries',17,33);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `MessageNo` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `ContactNo` decimal(11,0) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Message` text,
  PRIMARY KEY (`MessageNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `orderlist` */

insert  into `orderlist`(`OrderListNo`,`Quantity`,`Total`,`ItemNo`,`OrderNo`,`Temp`,`VariantNo`) values (51,100,1600,0031,00000009,0,12),(55,2,0,0031,00000010,0,13);

/*Table structure for table `requestlist` */

DROP TABLE IF EXISTS `requestlist`;

CREATE TABLE `requestlist` (
  `RequestListNo` int(11) NOT NULL AUTO_INCREMENT,
  `Quantity` int(11) DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Received` int(11) DEFAULT NULL,
  `SupplyRequestNo` int(11) DEFAULT NULL,
  `ItemNo` int(4) unsigned zerofill DEFAULT NULL,
  `VariantNo` int(11) DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`RequestListNo`),
  KEY `FKSupplyRequest_requestlist` (`SupplyRequestNo`),
  KEY `FKItem_requestlist` (`ItemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

/*Data for the table `requestlist` */

insert  into `requestlist`(`RequestListNo`,`Quantity`,`Total`,`Received`,`SupplyRequestNo`,`ItemNo`,`VariantNo`,`Temp`) values (32,10,100,10,24,0031,12,0),(48,1,10,NULL,27,0031,12,0),(63,1,10,NULL,29,0031,12,0),(64,1,10,NULL,30,0031,12,0),(66,1,10,NULL,31,0031,12,0),(81,5,50,NULL,32,0031,12,0),(82,2,20,2,33,0031,12,0),(83,3,30,3,33,0031,13,0),(84,4,40,4,33,0031,14,0),(85,3,30,2,33,0031,16,0),(86,5,500,4,33,0031,17,0),(87,2,10,2,33,0031,18,0),(88,5,50,NULL,34,0031,13,0),(89,3,30,5,35,0031,12,0),(90,4,40,6,35,0031,13,0);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `SalesNo` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  PRIMARY KEY (`SalesNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  KEY `FKAccount_supplier` (`AccountNo`),
  CONSTRAINT `FKAccount_supplier` FOREIGN KEY (`AccountNo`) REFERENCES `accounts` (`AccountNo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`SupplierNo`,`SupplierName`,`ContactNo`,`Address`,`Email`,`AccountNo`) values (4,'J.MD. Steel Bars Marketing',2147483647,'Unknown','JMD@gmail.com',2),(11,'V.E. Enterprises',2147483647,'Unknown','VEE@gmail.com',3),(12,'Voschtech',2147483647,'Unknown','VS@gmail.com',4),(13,'DJZ Trading',2147483647,'Unknown','DJZ@gmail.com',5),(14,'Solarfoam',2147483647,'Unknown','SF@gmail.com',6),(16,'House Gem Construction Element Corporation',2147483647,'Unknown','HGCEC@gmail.com',7),(17,'Test Company',0,'Address','Email@gmail.com',8);

/*Table structure for table `supply` */

DROP TABLE IF EXISTS `supply`;

CREATE TABLE `supply` (
  `SupplyNo` int(11) NOT NULL AUTO_INCREMENT,
  `QuantityReceived` int(11) DEFAULT NULL,
  `PendingQuantity` int(11) DEFAULT NULL,
  `DateReceive` datetime DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `SupplyRequestNo` int(11) DEFAULT NULL,
  `RequestListNo` int(11) DEFAULT NULL,
  `ItemNo` int(11) DEFAULT NULL,
  `Temp` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`SupplyNo`),
  KEY `FKSupplier_supply` (`SupplierNo`),
  KEY `FK_supply` (`RequestListNo`),
  CONSTRAINT `FKSupplier_supply` FOREIGN KEY (`SupplierNo`) REFERENCES `supplier` (`SupplierNo`),
  CONSTRAINT `FK_supply` FOREIGN KEY (`RequestListNo`) REFERENCES `requestlist` (`RequestListNo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `supply` */

insert  into `supply`(`SupplyNo`,`QuantityReceived`,`PendingQuantity`,`DateReceive`,`SupplierNo`,`SupplyRequestNo`,`RequestListNo`,`ItemNo`,`Temp`) values (23,10,0,'2016-10-01 09:35:31',NULL,24,32,NULL,NULL),(24,5,5,'2016-10-01 10:01:53',NULL,24,32,NULL,NULL),(25,10,0,'2016-10-01 10:07:10',NULL,24,32,NULL,NULL),(26,0,1,'2016-10-01 10:40:41',NULL,31,66,NULL,NULL),(27,2,0,'2016-11-09 21:07:56',NULL,33,82,NULL,NULL),(28,3,0,'2016-11-09 21:07:56',NULL,33,83,NULL,NULL),(29,4,0,'2016-11-09 21:07:56',NULL,33,84,NULL,NULL),(30,2,1,'2016-11-09 21:07:56',NULL,33,85,NULL,NULL),(31,4,1,'2016-11-09 21:07:56',NULL,33,86,NULL,NULL),(32,2,0,'2016-11-09 21:07:56',NULL,33,87,NULL,NULL),(33,5,-2,'2016-11-11 22:47:56',NULL,35,89,NULL,NULL),(34,6,-2,'2016-11-11 22:47:56',NULL,35,90,NULL,NULL);

/*Table structure for table `supplyrequest` */

DROP TABLE IF EXISTS `supplyrequest`;

CREATE TABLE `supplyrequest` (
  `SupplyRequestNo` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `isReceived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SupplyRequestNo`),
  KEY `FKSupplier_supplyrequest` (`SupplierNo`),
  CONSTRAINT `FKSupplier_supplyrequest` FOREIGN KEY (`SupplierNo`) REFERENCES `supplier` (`SupplierNo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `supplyrequest` */

insert  into `supplyrequest`(`SupplyRequestNo`,`Date`,`SupplierNo`,`isReceived`) values (24,'2016-10-01 02:17:36',4,1),(25,'2016-10-01 09:45:51',4,0),(26,'2016-10-01 09:52:01',4,0),(27,'2016-10-01 09:52:32',4,0),(28,'2016-10-01 09:53:46',4,0),(29,'2016-10-01 10:30:25',4,0),(30,'2016-10-01 10:30:45',4,0),(31,'2016-10-01 10:34:56',4,1),(32,'2016-11-09 20:38:59',4,0),(33,'2016-11-09 20:53:49',4,1),(34,'2016-11-09 21:05:35',4,0),(35,'2016-11-09 21:25:11',4,1);

/*Table structure for table `tblorder` */

DROP TABLE IF EXISTS `tblorder`;

CREATE TABLE `tblorder` (
  `OrderNo` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `TotalAmount` double DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `SalesNo` int(4) unsigned zerofill DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  `Ship` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`OrderNo`),
  KEY `FKSales_order` (`SalesNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tblorder` */

insert  into `tblorder`(`OrderNo`,`TotalAmount`,`Date`,`Status`,`SalesNo`,`Temp`,`Ship`) values (00000009,1600,'2016-10-01 07:28:16','Ship',NULL,0,1),(00000010,0,'2016-11-09 15:06:13','New',NULL,0,0),(00000011,0,'2016-11-09 15:06:29','New',NULL,0,0);

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
  KEY `FKOrderList_walkin` (`OrderListNo`),
  CONSTRAINT `FKCustomer_walkin` FOREIGN KEY (`CustomerNo`) REFERENCES `customer` (`CustomerNo`),
  CONSTRAINT `FKOrderList_walkin` FOREIGN KEY (`OrderListNo`) REFERENCES `orderlist` (`OrderListNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `walkin` */

/*Table structure for table `vw_getbackorders` */

DROP TABLE IF EXISTS `vw_getbackorders`;

/*!50001 DROP VIEW IF EXISTS `vw_getbackorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_getbackorders` */;

/*!50001 CREATE TABLE  `vw_getbackorders`(
 `RequestListNo` int(11) ,
 `SupplierName` varchar(50) ,
 `ItemDescription` varchar(258) ,
 `Received` int(11) ,
 `PendingQuantity` int(11) 
)*/;

/*Table structure for table `vw_getpurchaseorders` */

DROP TABLE IF EXISTS `vw_getpurchaseorders`;

/*!50001 DROP VIEW IF EXISTS `vw_getpurchaseorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_getpurchaseorders` */;

/*!50001 CREATE TABLE  `vw_getpurchaseorders`(
 `SupplyRequestNo` int(11) ,
 `SupplierName` varchar(50) ,
 `NoOfItems` bigint(21) ,
 `Date` datetime ,
 `Action` varchar(39) 
)*/;

/*Table structure for table `vw_inventory` */

DROP TABLE IF EXISTS `vw_inventory`;

/*!50001 DROP VIEW IF EXISTS `vw_inventory` */;
/*!50001 DROP TABLE IF EXISTS `vw_inventory` */;

/*!50001 CREATE TABLE  `vw_inventory`(
 `ItemNo` varchar(22) ,
 `VariantNo` int(11) ,
 `ItemDescription` varchar(258) ,
 `Category` varchar(156) ,
 `STOCKCOMMIT` decimal(33,0) ,
 `STOCKS` bigint(11) ,
 `COMMIT` decimal(32,0) 
)*/;

/*Table structure for table `vw_items` */

DROP TABLE IF EXISTS `vw_items`;

/*!50001 DROP VIEW IF EXISTS `vw_items` */;
/*!50001 DROP TABLE IF EXISTS `vw_items` */;

/*!50001 CREATE TABLE  `vw_items`(
 `ItemNo` int(4) unsigned zerofill ,
 `Name` varchar(50) ,
 `NoOfItems` bigint(21) ,
 `Name1` varchar(50) ,
 `Name2` varchar(50) ,
 `Name3` varchar(50) ,
 `SupplierName` varchar(50) 
)*/;

/*Table structure for table `vw_lowstocks` */

DROP TABLE IF EXISTS `vw_lowstocks`;

/*!50001 DROP VIEW IF EXISTS `vw_lowstocks` */;
/*!50001 DROP TABLE IF EXISTS `vw_lowstocks` */;

/*!50001 CREATE TABLE  `vw_lowstocks`(
 `ItemNo` varchar(22) ,
 `ItemDescription` varchar(258) ,
 `SupplierName` varchar(50) ,
 `STOCKS` bigint(11) ,
 `LOWSTOCKS` bigint(11) ,
 `CRITICAL` bigint(11) 
)*/;

/*Table structure for table `vw_receivings` */

DROP TABLE IF EXISTS `vw_receivings`;

/*!50001 DROP VIEW IF EXISTS `vw_receivings` */;
/*!50001 DROP TABLE IF EXISTS `vw_receivings` */;

/*!50001 CREATE TABLE  `vw_receivings`(
 `SupplyNo` int(11) ,
 `DateReceive` datetime ,
 `SupplierName` varchar(50) ,
 `ItemDescription` varchar(258) ,
 `QuantityReceived` int(11) ,
 `PendingQuantity` int(11) ,
 `Quantity` int(11) 
)*/;

/*View structure for view vw_getbackorders */

/*!50001 DROP TABLE IF EXISTS `vw_getbackorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_getbackorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getbackorders` AS (select `rl`.`RequestListNo` AS `RequestListNo`,`s`.`SupplierName` AS `SupplierName`,concat(`i`.`Name`,'<br/>',`iv`.`Size`,' ',`iv`.`Color`,' ',`iv`.`Description`,' ') AS `ItemDescription`,`rl`.`Received` AS `Received`,`sup`.`PendingQuantity` AS `PendingQuantity` from (((((`supplyrequest` `sr` join `supply` `sup` on((`sr`.`SupplyRequestNo` = `sup`.`SupplyRequestNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`sup`.`RequestListNo` = `rl`.`RequestListNo`)))) join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on(((`rl`.`VariantNo` = `iv`.`VariantNo`) and (`i`.`ItemNo` = `iv`.`ItemNo`)))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) where (`sup`.`PendingQuantity` > 0)) */;

/*View structure for view vw_getpurchaseorders */

/*!50001 DROP TABLE IF EXISTS `vw_getpurchaseorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpurchaseorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpurchaseorders` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,`s`.`SupplierName` AS `SupplierName`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,`sr`.`Date` AS `Date`,concat('<span><a>View</a> | <a>Print</a></span>') AS `Action` from ((`supplyrequest` `sr` join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`rl`.`Quantity` is not null)))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) group by `rl`.`SupplyRequestNo` order by `sr`.`Date` desc) */;

/*View structure for view vw_inventory */

/*!50001 DROP TABLE IF EXISTS `vw_inventory` */;
/*!50001 DROP VIEW IF EXISTS `vw_inventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`iv`.`VariantNo` AS `VariantNo`,concat(`i`.`Name`,'<br/>',`iv`.`Size`,' ',`iv`.`Color`,' ',`iv`.`Description`,' ') AS `ItemDescription`,concat(`l1`.`Name1`,' > ',`l2`.`Name2`,' > ',`l3`.`Name3`) AS `Category`,(ifnull(`iv`.`Stocks`,0) - sum(ifnull(`ol`.`Quantity`,0))) AS `STOCKCOMMIT`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,sum(ifnull(`ol`.`Quantity`,0)) AS `COMMIT` from ((((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `orderlist` `ol` on((`iv`.`VariantNo` = `ol`.`VariantNo`))) join `tblorder` `o` on((`ol`.`OrderNo` = `o`.`OrderNo`))) where (`iv`.`Owned` = 1) group by `ol`.`OrderNo`,`ol`.`VariantNo`) */;

/*View structure for view vw_items */

/*!50001 DROP TABLE IF EXISTS `vw_items` */;
/*!50001 DROP VIEW IF EXISTS `vw_items` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_items` AS (select `i`.`ItemNo` AS `ItemNo`,`i`.`Name` AS `Name`,count(`iv`.`VariantNo`) AS `NoOfItems`,`l1`.`Name1` AS `Name1`,`l2`.`Name2` AS `Name2`,`l3`.`Name3` AS `Name3`,`s`.`SupplierName` AS `SupplierName` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) where ((`i`.`Owned` = 1) and (`i`.`Removed` = 0) and (`i`.`SRemoved` = 0)) group by `iv`.`ItemNo`) */;

/*View structure for view vw_lowstocks */

/*!50001 DROP TABLE IF EXISTS `vw_lowstocks` */;
/*!50001 DROP VIEW IF EXISTS `vw_lowstocks` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lowstocks` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`Size`,' ',`iv`.`Color`,' ',`iv`.`Description`,' ') AS `ItemDescription`,`s`.`SupplierName` AS `SupplierName`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`iv`.`LowStock`,0) AS `LOWSTOCKS`,ifnull(`iv`.`Critical`,0) AS `CRITICAL` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) where (`iv`.`Owned` = 1)) */;

/*View structure for view vw_receivings */

/*!50001 DROP TABLE IF EXISTS `vw_receivings` */;
/*!50001 DROP VIEW IF EXISTS `vw_receivings` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_receivings` AS (select `sup`.`SupplyNo` AS `SupplyNo`,`sup`.`DateReceive` AS `DateReceive`,`s`.`SupplierName` AS `SupplierName`,concat(`i`.`Name`,'<br/>',`iv`.`Size`,' ',`iv`.`Color`,' ',`iv`.`Description`,' ') AS `ItemDescription`,`sup`.`QuantityReceived` AS `QuantityReceived`,`sup`.`PendingQuantity` AS `PendingQuantity`,`rl`.`Quantity` AS `Quantity` from (((((`supplyrequest` `sr` join `supply` `sup` on((`sr`.`SupplyRequestNo` = `sup`.`SupplyRequestNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`sup`.`RequestListNo` = `rl`.`RequestListNo`)))) join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) where (`sr`.`isReceived` = 1) order by `sup`.`DateReceive` desc) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
