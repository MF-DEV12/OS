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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

insert  into `accounts`(`AccountNo`,`Username`,`Password`,`LoginType`) values (1,'Rolen','5f4dcc3b5aa765d61d8327deb882cf99','admin'),(2,'JMDMktg','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(3,'VEEnt','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(4,'Voschtech','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(5,'DJZTrd','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(6,'Solarfoam','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(7,'HGCECo','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(8,'mtest','5f4dcc3b5aa765d61d8327deb882cf99','supplier'),(9,'TestEmail','25d55ad283aa400af464c76d713c07ad','supplier'),(10,'testabc','5f4dcc3b5aa765d61d8327deb882cf99','supplier');

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
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CustomerNo`),
  KEY `FKOrder_customer` (`OrderNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`CustomerNo`,`Lastname`,`Firstname`,`ContactNo`,`Email`,`Address`,`OrderNo`,`CreatedDate`) values (1,'abwerv','awerc','121','qcdaw','avwdw',00000005,'2016-12-03 08:30:26'),(2,'abwerv','awerc','1213','qcdaw','avwdw',00000006,'2016-12-03 08:30:26'),(3,'asdf','awdwad','9296940118','wadaw','aweda',00000007,'2016-12-03 08:30:26'),(4,'asdfasdf','asdfasdf','9353040116','','adsfgadfa',00000008,'2016-12-03 08:30:26'),(5,'asd','asd','9111111111','','asd',00000009,'2016-12-03 08:30:26'),(6,'test','test','9124455679','test@gmail.com','MyAddress',00000010,'2016-12-03 08:30:26'),(8,'testorder1','testorder','99999999999','abc@gmail.com','testaddress',00000011,'2016-12-03 08:30:26'),(9,'test','test','99999999999','test@gmail.com','test',NULL,'2016-12-03 08:30:26'),(10,'test','test2','12312321','test','test',NULL,'2016-12-03 08:30:26'),(11,'testadd','add','4434343','test@gmail.com','5awdad',NULL,'2016-12-03 08:30:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`ItemNo`,`Name`,`UOM`,`Image`,`BoolFields`,`SizeType`,`Removed`,`Owned`,`Level1No`,`Level2No`,`Level3No`,`SupplierNo`,`SRemoved`) values (0047,'Skil 6610 Impact Drill','ea',NULL,NULL,NULL,0,1,10,33,45,11,0);

/*Table structure for table `itemattribute` */

DROP TABLE IF EXISTS `itemattribute`;

CREATE TABLE `itemattribute` (
  `AttributeID` int(11) NOT NULL AUTO_INCREMENT,
  `AttributeName` varchar(50) DEFAULT NULL,
  `IsRequired` tinyint(1) DEFAULT NULL,
  KEY `AttributeID` (`AttributeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `Owned` tinyint(4) DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `SRemoved` tinyint(4) DEFAULT NULL,
  `ImageFile` text,
  PRIMARY KEY (`VariantNo`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `itemvariant` */

insert  into `itemvariant`(`VariantNo`,`ItemNo`,`VariantName`,`VariantNameJSON`,`Size`,`Color`,`Description`,`Stocks`,`LowStock`,`Critical`,`DPOCost`,`SRP`,`Price`,`Removed`,`Owned`,`SupplierNo`,`SRemoved`,`ImageFile`) values (43,0047,'Size = 10mm<br/>Color = Yellow<br/>','{\"Size\":\"10mm\",\"Color\":\"Yellow\"}',NULL,NULL,NULL,10,10,5,800,999.99,1200,NULL,1,11,NULL,'FILE_20161207063301.jpg'),(44,0047,'Size = 10mm<br/>Color = Red<br/>','{\"Size\":\"10mm\",\"Color\":\"Red\"}',NULL,NULL,NULL,NULL,10,5,800,999.99,1200,NULL,0,11,NULL,'FILE_20161207063336.jpg'),(45,0047,'Size = 12mm<br/>Color = Yellow<br/>','{\"Size\":\"12mm\",\"Color\":\"Yellow\"}',NULL,NULL,NULL,NULL,10,5,900,1100,1300,NULL,0,11,NULL,'FILE_20161207063400.jpg'),(46,0047,'Size = 12mm<br/>Color = Red<br/>','{\"Size\":\"12mm\",\"Color\":\"Red\"}',NULL,NULL,NULL,5,10,5,900,1100,1300,NULL,1,11,NULL,'FILE_20161207063419.jpg');

/*Table structure for table `level1` */

DROP TABLE IF EXISTS `level1`;

CREATE TABLE `level1` (
  `Level1No` int(11) NOT NULL AUTO_INCREMENT,
  `Name1` varchar(50) DEFAULT NULL,
  `Description` text,
  `ImageFile` text,
  PRIMARY KEY (`Level1No`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `level1` */

insert  into `level1`(`Level1No`,`Name1`,`Description`,`ImageFile`) values (10,'Appliances',NULL,'FILE_20161203011632.png'),(11,'Automobile',NULL,'FILE_20161201114419.JPG');

/*Table structure for table `level2` */

DROP TABLE IF EXISTS `level2`;

CREATE TABLE `level2` (
  `Level2No` int(11) NOT NULL AUTO_INCREMENT,
  `Name2` varchar(50) DEFAULT NULL,
  `Description` text,
  `Level1No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level2No`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `level2` */

insert  into `level2`(`Level2No`,`Name2`,`Description`,`Level1No`) values (10,'Cooling',NULL,10),(11,'Kitchen Appliances',NULL,10),(12,'Utility Equipment ',NULL,10),(13,'Car Care',NULL,11),(14,'Building Decors',NULL,10),(15,'Building Supplies',NULL,10),(16,'Ceiling & Wall',NULL,10),(17,'Floor',NULL,10),(18,'Roofing',NULL,10),(19,'Door',NULL,10),(20,'Mouldings',NULL,10),(21,'Window',NULL,10),(22,'Lightings',NULL,10),(23,'Electrical Supplies',NULL,10),(24,'Electrical Accessories',NULL,10),(25,'Chemicals',NULL,10),(26,'Equipment/Materials',NULL,10),(27,'Paint',NULL,10),(28,'Bath & Shower Mixer',NULL,10),(29,'Kitchen Sinks',NULL,10),(30,'Faucets',NULL,10),(31,'Hand Tools',NULL,10),(32,'Power Tools',NULL,10),(33,'Equipment',NULL,10),(35,'test',NULL,10);

/*Table structure for table `level3` */

DROP TABLE IF EXISTS `level3`;

CREATE TABLE `level3` (
  `Level3No` int(11) NOT NULL AUTO_INCREMENT,
  `Name3` varchar(50) DEFAULT NULL,
  `Description` text,
  `Level1No` int(11) DEFAULT NULL,
  `Level2No` int(11) DEFAULT NULL,
  PRIMARY KEY (`Level3No`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `level3` */

insert  into `level3`(`Level3No`,`Name3`,`Description`,`Level1No`,`Level2No`) values (8,'Safety & Security',NULL,10,31),(9,'Cement',NULL,10,16),(11,'Nail',NULL,10,15),(12,'Wire',NULL,10,15),(13,'Tile Trim',NULL,10,16),(14,'Glass',NULL,10,19),(15,'Wood',NULL,10,19),(16,'Wood',NULL,10,20),(17,'Chargeable Light',NULL,10,22),(18,'Decorative',NULL,10,22),(19,'Tape',NULL,10,23),(20,'Gadgets & Equipments',NULL,10,23),(21,'Circuit Breaker',NULL,10,24),(22,'Pipes & Fittings',NULL,10,24),(23,'Adhesives',NULL,10,25),(24,'Additive',NULL,10,25),(25,'Sealants',NULL,10,25),(26,'Solvent Based',NULL,10,25),(27,'Thinner',NULL,10,25),(28,'Top Coats',NULL,10,25),(29,'Water Based',NULL,10,25),(30,'Paint Brush',NULL,10,26),(31,'Sundries',NULL,10,26),(32,'Equipment',NULL,10,26),(33,'Automotive Paints',NULL,10,27),(34,'Epoxy',NULL,10,27),(35,'Latex (Acrylic)',NULL,10,27),(36,'Spray Paint',NULL,10,27),(37,'Solvent Based',NULL,10,27),(38,'Elastomeric',NULL,10,27),(39,'Stainless Sink',NULL,10,29),(40,'Kitchen Faucets',NULL,10,30),(41,'Lavatory Faucets',NULL,10,30),(42,'Bidet Faucets',NULL,10,30),(43,'Electrical',NULL,10,33),(44,'Electrical',NULL,10,32),(45,'Sundries',NULL,10,33);

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `orderlist` */

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
  `SupplyQuantity` int(11) DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `createddate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`RequestListNo`),
  KEY `FKSupplyRequest_requestlist` (`SupplyRequestNo`),
  KEY `FKItem_requestlist` (`ItemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

/*Data for the table `requestlist` */

insert  into `requestlist`(`RequestListNo`,`Quantity`,`Total`,`Received`,`SupplyRequestNo`,`ItemNo`,`VariantNo`,`SupplyQuantity`,`Temp`,`createdby`,`createddate`) values (178,5,4000,4,54,0047,43,NULL,0,'Rolen','2016-12-08 01:35:12'),(180,5,4500,5,54,0047,46,NULL,0,'Rolen','2016-12-08 01:35:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
  `SupplyRequestNo` int(11) DEFAULT NULL,
  `RequestListNo` int(11) DEFAULT NULL,
  `ItemNo` int(11) DEFAULT NULL,
  `Temp` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`SupplyNo`),
  KEY `FKSupplier_supply` (`SupplierNo`),
  KEY `FK_supply` (`RequestListNo`),
  CONSTRAINT `FKSupplier_supply` FOREIGN KEY (`SupplierNo`) REFERENCES `supplier` (`SupplierNo`),
  CONSTRAINT `FK_supply` FOREIGN KEY (`RequestListNo`) REFERENCES `requestlist` (`RequestListNo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `supply` */

insert  into `supply`(`SupplyNo`,`QuantityReceived`,`PendingQuantity`,`DateReceive`,`SupplierNo`,`SupplyRequestNo`,`RequestListNo`,`ItemNo`,`Temp`) values (13,4,1,'2016-12-08 01:36:38',NULL,54,178,NULL,NULL),(14,5,0,'2016-12-08 01:36:38',NULL,54,180,NULL,NULL);

/*Table structure for table `supplyrequest` */

DROP TABLE IF EXISTS `supplyrequest`;

CREATE TABLE `supplyrequest` (
  `SupplyRequestNo` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `SupplierNo` int(11) DEFAULT NULL,
  `isReceived` tinyint(1) DEFAULT NULL,
  `DeliveredStatus` varchar(10) DEFAULT '0',
  `DeliveredDate` datetime DEFAULT NULL,
  `ReceivedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`SupplyRequestNo`),
  KEY `FKSupplier_supplyrequest` (`SupplierNo`),
  CONSTRAINT `FKSupplier_supplyrequest` FOREIGN KEY (`SupplierNo`) REFERENCES `supplier` (`SupplierNo`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `supplyrequest` */

insert  into `supplyrequest`(`SupplyRequestNo`,`Date`,`SupplierNo`,`isReceived`,`DeliveredStatus`,`DeliveredDate`,`ReceivedDate`) values (54,'2016-12-08 01:35:29',11,1,'1','2016-12-08 01:35:54','2016-12-08 01:36:38');

/*Table structure for table `tbl_month` */

DROP TABLE IF EXISTS `tbl_month`;

CREATE TABLE `tbl_month` (
  `NO` int(11) DEFAULT NULL,
  `MONTH` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

/*Data for the table `tblauditlogs` */

insert  into `tblauditlogs`(`ID`,`Transaction`,`Action`,`TransactionDate`,`ModifiedBy`) values (1,'Update Family','Update','2016-11-25 18:34:29','Rolen'),(2,'Purchase Order','Insert','2016-11-25 18:57:43','Rolen'),(3,'New Family','Insert','2016-11-25 21:32:45','Rolen'),(4,'New Family','Insert','2016-11-25 21:35:24','Rolen'),(5,'New Category','Insert','2016-11-25 21:36:20','Rolen'),(6,'New Category','Insert','2016-11-25 21:41:01','Rolen'),(7,'New Sub-Category','Insert','2016-11-25 21:41:15','Rolen'),(8,'Update Category','Update','2016-11-25 21:49:10','Rolen'),(9,'Update Sub-Category','Update','2016-11-25 21:49:17','Rolen'),(10,'New Sub-Category','Insert','2016-11-25 21:50:05','Rolen'),(11,'Delete Sub-Category','Delete','2016-11-25 21:50:16','Rolen'),(12,'New Category','Insert','2016-11-25 21:50:41','Rolen'),(13,'Delete Category','Delete','2016-11-25 21:50:47','Rolen'),(14,'New Sub-Category','Insert','2016-11-25 22:11:59','Rolen'),(15,'Delete Sub-Category','Delete','2016-11-25 22:12:27','Rolen'),(16,'Delete Sub-Category','Delete','2016-11-25 22:12:33','Rolen'),(17,'Delete Category','Delete','2016-11-25 22:12:35','Rolen'),(18,'Delete Family','Delete','2016-11-25 22:12:39','Rolen'),(19,'Delete Family','Delete','2016-11-25 22:12:41','Rolen'),(20,'Order number: 00000009  set order status to Process','Update','2016-11-26 00:31:10','Rolen'),(21,'Order number: 00000009  set order status to Ship','Update','2016-11-26 00:31:18','Rolen'),(22,'Decrease Stock after Order to shipped','Update','2016-11-26 00:31:18','Rolen'),(23,'0','Insert','2016-11-30 00:10:17','JMDMktg'),(24,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(25,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(26,'0','Insert','2016-11-30 00:13:32','JMDMktg'),(27,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(28,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(29,'0','Insert','2016-11-30 00:26:56','JMDMktg'),(30,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(31,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(32,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(33,'0','Insert','2016-11-30 00:31:05','JMDMktg'),(34,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(35,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(36,'0','Insert','2016-11-30 00:31:06','JMDMktg'),(37,'Purchase Order','Insert','2016-11-30 00:34:21','Rolen'),(38,'New PO Received','Insert','2016-11-30 00:38:12','Rolen'),(39,'Update Stock after PO Received','Update','2016-11-30 00:38:12','Rolen'),(40,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(41,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(42,'0','Insert','2016-11-30 14:52:27','JMDMktg'),(43,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(44,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(45,'0','Insert','2016-11-30 17:26:49','JMDMktg'),(46,'Purchase Order','Insert','2016-11-30 18:58:18','Rolen'),(47,'New PO Received','Insert','2016-11-30 18:59:04','Rolen'),(48,'Update Stock after PO Received','Update','2016-11-30 18:59:04','Rolen'),(49,'Update Family','Update','2016-12-01 15:07:04','Rolen'),(50,'Update Family','Update','2016-12-01 15:07:11','Rolen'),(51,'Update Family','Update','2016-12-01 17:39:02','Rolen'),(52,'0','Insert','2016-12-01 23:50:21','VEEnt'),(53,'0','Insert','2016-12-01 23:50:21','VEEnt'),(54,'0','Insert','2016-12-01 23:54:18','VEEnt'),(55,'0','Insert','2016-12-01 23:54:18','VEEnt'),(56,'Purchase Order','Insert','2016-12-02 00:07:19','Rolen'),(57,'Purchase Order','Insert','2016-12-02 01:51:01','Rolen'),(58,'New UOM','Insert','2016-12-02 14:51:07','JMDMktg'),(59,'New UOM','Insert','2016-12-02 14:53:31','JMDMktg'),(60,'New UOM','Insert','2016-12-02 15:10:18','JMDMktg'),(61,'New UOM','Insert','2016-12-02 15:11:04','JMDMktg'),(62,'New UOM','Insert','2016-12-02 15:17:26','JMDMktg'),(63,'New UOM','Insert','2016-12-02 15:21:43','JMDMktg'),(64,'New UOM','Insert','2016-12-02 15:22:01','JMDMktg'),(65,'New UOM','Insert','2016-12-02 15:28:57','JMDMktg'),(66,'New UOM','Insert','2016-12-02 15:29:06','JMDMktg'),(67,'New UOM','Insert','2016-12-02 15:29:57','JMDMktg'),(68,'New UOM','Insert','2016-12-02 15:30:39','JMDMktg'),(69,'New UOM','Insert','2016-12-02 21:53:47','JMDMktg'),(70,'New UOM','Insert','2016-12-02 22:01:57','JMDMktg'),(71,'New UOM','Insert','2016-12-02 22:03:43','JMDMktg'),(72,'New UOM','Insert','2016-12-02 22:03:54','JMDMktg'),(73,'New UOM','Insert','2016-12-02 22:04:49','JMDMktg'),(74,'New UOM','Insert','2016-12-02 22:06:21','JMDMktg'),(75,'New UOM','Insert','2016-12-02 22:06:28','JMDMktg'),(76,'New UOM','Insert','2016-12-02 22:06:37','JMDMktg'),(77,'0','Insert','2016-12-02 23:21:06','VEEnt'),(78,'0','Insert','2016-12-02 23:21:06','VEEnt'),(79,'0','Insert','2016-12-02 23:22:48','VEEnt'),(80,'0','Insert','2016-12-02 23:22:48','VEEnt'),(81,'Purchase Order','Insert','2016-12-03 10:00:33','Rolen'),(82,'121','Insert','2016-12-03 10:14:17','VEEnt'),(83,'121','Insert','2016-12-03 10:14:17','VEEnt'),(84,'12','Insert','2016-12-03 10:15:48','VEEnt'),(85,'12','Insert','2016-12-03 10:15:48','VEEnt'),(86,'New PO Received','Insert','2016-12-03 12:56:01','Rolen'),(87,'New PO Received','Insert','2016-12-03 13:03:11','Rolen'),(88,'Update Stock after PO Received','Update','2016-12-03 13:03:11','Rolen'),(89,'Purchase Order','Insert','2016-12-05 22:22:18','Rolen'),(90,'New UOM','Insert','2016-12-07 00:02:09','VEEnt'),(91,'0','Insert','2016-12-07 00:17:14','VEEnt'),(92,'0','Insert','2016-12-07 00:17:14','VEEnt'),(93,'0','Insert','2016-12-07 00:17:14','VEEnt'),(94,'New PO Received','Insert','2016-12-08 01:12:07','Rolen'),(95,'Update Stock after PO Received','Update','2016-12-08 01:12:07','Rolen'),(96,'Purchase Order','Insert','2016-12-08 01:15:13','Rolen'),(97,'New PO Received','Insert','2016-12-08 01:16:26','Rolen'),(98,'Update Stock after PO Received','Update','2016-12-08 01:16:26','Rolen'),(99,'New PO Received','Insert','2016-12-08 01:18:25','Rolen'),(100,'Update Stock after PO Received','Update','2016-12-08 01:18:25','Rolen'),(101,'New PO Received','Insert','2016-12-08 01:18:41','Rolen'),(102,'Update Stock after PO Received','Update','2016-12-08 01:18:41','Rolen'),(103,'Purchase Order','Insert','2016-12-08 01:19:43','Rolen'),(104,'Purchase Order','Insert','2016-12-08 01:25:05','Rolen'),(105,'New PO Received','Insert','2016-12-08 01:26:24','Rolen'),(106,'Update Stock after PO Received','Update','2016-12-08 01:26:24','Rolen'),(107,'0','Insert','2016-12-08 01:34:43','VEEnt'),(108,'0','Insert','2016-12-08 01:34:43','VEEnt'),(109,'0','Insert','2016-12-08 01:34:43','VEEnt'),(110,'0','Insert','2016-12-08 01:34:43','VEEnt'),(111,'0','Insert','2016-12-08 01:34:43','VEEnt'),(112,'Purchase Order','Insert','2016-12-08 01:35:29','Rolen'),(113,'New PO Received','Insert','2016-12-08 01:36:38','Rolen'),(114,'Update Stock after PO Received','Update','2016-12-08 01:36:38','Rolen'),(115,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:20:40','Rolen'),(116,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:21:38','Rolen'),(117,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:24:03','Rolen'),(118,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:24:26','Rolen'),(119,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:24:40','Rolen'),(120,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:24:58','Rolen'),(121,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:27:03','Rolen'),(122,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:27:52','Rolen'),(123,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:28:32','Rolen'),(124,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:08','Rolen'),(125,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:18','Rolen'),(126,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:30:27','Rolen'),(127,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:30:41','Rolen'),(128,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:31:38','Rolen'),(129,'Update Physical Count for Item variant : 43','Update','2016-12-08 02:31:51','Rolen'),(130,'Update Physical Count for Item variant : 46','Update','2016-12-08 02:31:58','Rolen');

/*Table structure for table `tblorder` */

DROP TABLE IF EXISTS `tblorder`;

CREATE TABLE `tblorder` (
  `CustomerNo` int(11) DEFAULT NULL,
  `OrderNo` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `TotalAmount` double DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `SalesNo` int(4) unsigned zerofill DEFAULT NULL,
  `Temp` tinyint(1) DEFAULT NULL,
  `Ship` tinyint(1) DEFAULT NULL,
  `TransactionDate` datetime DEFAULT NULL,
  PRIMARY KEY (`OrderNo`),
  KEY `FKSales_order` (`SalesNo`),
  KEY `CustomerNo` (`CustomerNo`),
  CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`CustomerNo`) REFERENCES `customer` (`CustomerNo`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tblorder` */

/*Table structure for table `tbluom` */

DROP TABLE IF EXISTS `tbluom`;

CREATE TABLE `tbluom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UOMCode` varchar(10) DEFAULT NULL,
  `Description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbluom` */

insert  into `tbluom`(`ID`,`UOMCode`,`Description`) values (1,'ea','each'),(2,'set','set'),(3,'g','grams'),(4,'kg','kilograms'),(5,'mm','Millimeter'),(6,'lbs','pounds'),(7,'L','Liters');

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

/*Table structure for table `vw_allorders` */

DROP TABLE IF EXISTS `vw_allorders`;

/*!50001 DROP VIEW IF EXISTS `vw_allorders` */;
/*!50001 DROP TABLE IF EXISTS `vw_allorders` */;

/*!50001 CREATE TABLE  `vw_allorders`(
 `ViewItems` varchar(74) ,
 `OrderNo` int(8) unsigned zerofill ,
 `CustomerName` varchar(61) ,
 `Address` varchar(50) ,
 `OrderDate` datetime ,
 `TotalAmount` varchar(62) ,
 `Status` varchar(20) ,
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
 `SupplyRequestNo` int(11) ,
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
 `SupplyRequestNo` int(11) ,
 `SupplierName` varchar(50) ,
 `NoOfItems` bigint(21) ,
 `TotalDPOCost` varchar(63) ,
 `Date` datetime ,
 `Action` varchar(39) 
)*/;

/*Table structure for table `vw_getrequestfromcustomer` */

DROP TABLE IF EXISTS `vw_getrequestfromcustomer`;

/*!50001 DROP VIEW IF EXISTS `vw_getrequestfromcustomer` */;
/*!50001 DROP TABLE IF EXISTS `vw_getrequestfromcustomer` */;

/*!50001 CREATE TABLE  `vw_getrequestfromcustomer`(
 `OrderNo` int(8) unsigned zerofill ,
 `Date` datetime ,
 `Customer` varchar(61) ,
 `Address` varchar(50) ,
 `TotalAmount` double ,
 `Status` varchar(20) 
)*/;

/*Table structure for table `vw_getrequestlistbysupplyrequestno` */

DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno`;

/*!50001 DROP VIEW IF EXISTS `vw_getrequestlistbysupplyrequestno` */;
/*!50001 DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno` */;

/*!50001 CREATE TABLE  `vw_getrequestlistbysupplyrequestno`(
 `ItemNo` varchar(22) ,
 `SupplyRequestNo` int(11) ,
 `ItemDescription` mediumtext ,
 `ImageFile` text ,
 `DPOCost` double ,
 `RequestsQty` int(11) ,
 `SubTotal` double 
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
 `SupplyRequestNo` int(11) ,
 `RequestListNo` int(11) ,
 `VariantNo` int(11) ,
 `ItemNo` varchar(22) ,
 `ItemDescription` mediumtext ,
 `ImageFile` text ,
 `Received` varchar(119) ,
 `Requested` int(11) ,
 `DPOCost` double ,
 `RequestsQty` int(11) ,
 `SubTotal` double ,
 `QtyReceived` bigint(11) 
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
 `Owned` tinyint(4) 
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
 `Total` double 
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
 `SupplyRequestNo` int(11) ,
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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_allorders` AS (select 'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`o`.`OrderNo` AS `OrderNo`,concat(`c`.`Firstname`,' ',`c`.`Lastname`) AS `CustomerName`,`c`.`Address` AS `Address`,`o`.`Date` AS `OrderDate`,format(`o`.`TotalAmount`,2) AS `TotalAmount`,`o`.`Status` AS `Status`,(case when (`o`.`Status` = 'New') then concat('<div class="btn-group" align="center"><button class="btn btn-default" onclick="cancelOrder(\'',`o`.`OrderNo`,'\');">Cancel</button><button class="btn btn-action" onclick="processOrder(\'',`o`.`OrderNo`,'\');">Process</button></div>') when (`o`.`Status` = 'Process') then concat('<button class="btn btn-action" onclick="shipOrder(\'',`o`.`OrderNo`,'\');">Ship</button>') else '' end) AS `Action` from (`tblorder` `o` join `customer` `c` on((`o`.`CustomerNo` = `c`.`CustomerNo`)))) */;

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

/*View structure for view vw_getposubmit */

/*!50001 DROP TABLE IF EXISTS `vw_getposubmit` */;
/*!50001 DROP VIEW IF EXISTS `vw_getposubmit` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getposubmit` AS (select concat('<a onclick="removePO(\'',`rl`.`RequestListNo`,'\',this);"><span class="glyphicon glyphicon-remove"></span></a>') AS `Remove`,concat('<input type="text" value="',ifnull(`rl`.`Quantity`,1),'" class="form-control poquantity" onblur="updatePOQty(\'',`rl`.`RequestListNo`,'\',this);"/>') AS `ItemQty`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `Item`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(ifnull(`rl`.`Total`,`iv`.`DPOCost`),2) AS `Total`,`rl`.`createdby` AS `createdby`,`i`.`SupplierNo` AS `SupplierNo`,`rl`.`RequestListNo` AS `RequestListNo` from ((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `requestlist` `rl` on(((`i`.`ItemNo` = `rl`.`ItemNo`) and (`iv`.`VariantNo` = `rl`.`VariantNo`)))) where (`rl`.`Temp` = 1)) */;

/*View structure for view vw_getpotoreceive */

/*!50001 DROP TABLE IF EXISTS `vw_getpotoreceive` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpotoreceive` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpotoreceive` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,`s`.`SupplierName` AS `SupplierName`,`sr`.`Date` AS `Date`,`sr`.`DeliveredDate` AS `DeliveredDate` from ((`supplyrequest` `sr` join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`rl`.`Quantity` is not null)))) where ((`sr`.`isReceived` = 0) and (`sr`.`DeliveredStatus` = 1)) group by `rl`.`SupplyRequestNo` order by `sr`.`Date` desc) */;

/*View structure for view vw_getpurchaseorders */

/*!50001 DROP TABLE IF EXISTS `vw_getpurchaseorders` */;
/*!50001 DROP VIEW IF EXISTS `vw_getpurchaseorders` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getpurchaseorders` AS (select 'View items <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,`sr`.`SupplyRequestNo` AS `SupplyRequestNo`,`s`.`SupplierName` AS `SupplierName`,count(`rl`.`SupplyRequestNo`) AS `NoOfItems`,format(sum((`rl`.`Quantity` * `iv`.`DPOCost`)),2) AS `TotalDPOCost`,`sr`.`Date` AS `Date`,concat('<span><a>View</a> | <a>Print</a></span>') AS `Action` from (((`supplyrequest` `sr` join `requestlist` `rl` on(((`sr`.`SupplyRequestNo` = `rl`.`SupplyRequestNo`) and (`rl`.`Quantity` is not null)))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`sr`.`SupplierNo` = `s`.`SupplierNo`))) group by `rl`.`SupplyRequestNo` order by `sr`.`Date` desc) */;

/*View structure for view vw_getrequestfromcustomer */

/*!50001 DROP TABLE IF EXISTS `vw_getrequestfromcustomer` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequestfromcustomer` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequestfromcustomer` AS (select `o`.`OrderNo` AS `OrderNo`,`o`.`Date` AS `Date`,concat(`c`.`Firstname`,' ',`c`.`Lastname`) AS `Customer`,`c`.`Address` AS `Address`,`o`.`TotalAmount` AS `TotalAmount`,`o`.`Status` AS `Status` from (`tblorder` `o` join `customer` `c` on((`o`.`OrderNo` = `c`.`OrderNo`))) where (`o`.`Status` = 'New')) */;

/*View structure for view vw_getrequestlistbysupplyrequestno */

/*!50001 DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequestlistbysupplyrequestno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequestlistbysupplyrequestno` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`rl`.`SupplyRequestNo` AS `SupplyRequestNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `RequestsQty`,(`iv`.`DPOCost` * `rl`.`Quantity`) AS `SubTotal` from ((`requestlist` `rl` join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`)))) */;

/*View structure for view vw_getrequeststatustotal */

/*!50001 DROP TABLE IF EXISTS `vw_getrequeststatustotal` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequeststatustotal` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequeststatustotal` AS (select count(`o`.`Status`) AS `All`,count(`n`.`Status`) AS `New`,count(`s`.`Status`) AS `Shipped`,count(`c`.`Status`) AS `Cancel`,count(`p`.`Status`) AS `Process`,count(`i`.`Status`) AS `Incomplete` from (((((`tblorder` `o` left join `tblorder` `n` on(((`o`.`OrderNo` = `n`.`OrderNo`) and (`n`.`Status` = 'New')))) left join `tblorder` `s` on(((`o`.`OrderNo` = `s`.`OrderNo`) and (`s`.`Status` = 'Ship')))) left join `tblorder` `c` on(((`o`.`OrderNo` = `c`.`OrderNo`) and (`c`.`Status` = 'Cancel')))) left join `tblorder` `p` on(((`o`.`OrderNo` = `p`.`OrderNo`) and (`p`.`Status` = 'Process')))) left join `tblorder` `i` on(((`o`.`OrderNo` = `i`.`OrderNo`) and (`i`.`Status` = 'Incomplete'))))) */;

/*View structure for view vw_getselectedorderdetails */

/*!50001 DROP TABLE IF EXISTS `vw_getselectedorderdetails` */;
/*!50001 DROP VIEW IF EXISTS `vw_getselectedorderdetails` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getselectedorderdetails` AS (select `sr`.`SupplyRequestNo` AS `SupplyRequestNo`,`rl`.`RequestListNo` AS `RequestListNo`,`iv`.`VariantNo` AS `VariantNo`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,concat('<input type="text" value="',ifnull(`rl`.`Received`,0),'" class="form-control poreceived" onblur="updatePOReceived(\'',`rl`.`RequestListNo`,'\',this);"/>') AS `Received`,`rl`.`Quantity` AS `Requested`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `RequestsQty`,(`iv`.`DPOCost` * `rl`.`Quantity`) AS `SubTotal`,ifnull(`rl`.`Received`,0) AS `QtyReceived` from (((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `requestlist` `rl` on(((`i`.`ItemNo` = `rl`.`ItemNo`) and (`rl`.`VariantNo` = `iv`.`VariantNo`)))) join `supplyrequest` `sr` on((`rl`.`SupplyRequestNo` = `sr`.`SupplyRequestNo`)))) */;

/*View structure for view vw_getsupplyitemsbysupplier */

/*!50001 DROP TABLE IF EXISTS `vw_getsupplyitemsbysupplier` */;
/*!50001 DROP VIEW IF EXISTS `vw_getsupplyitemsbysupplier` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getsupplyitemsbysupplier` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,concat(`l1`.`Name1`,' > ',`l2`.`Name2`,' > ',`l3`.`Name3`) AS `Category`,format(`iv`.`DPOCost`,2) AS `DPOCost`,format(`iv`.`SRP`,2) AS `SRP`,`i`.`SupplierNo` AS `SupplierNo` from ((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`)))) */;

/*View structure for view vw_inventory */

/*!50001 DROP TABLE IF EXISTS `vw_inventory` */;
/*!50001 DROP VIEW IF EXISTS `vw_inventory` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`iv`.`VariantNo` AS `VariantNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,concat(`l1`.`Name1`,' > ',`l2`.`Name2`,' > ',`l3`.`Name3`) AS `Category`,(ifnull(`iv`.`Stocks`,0) - ifnull(`siv`.`COMMIT`,0)) AS `STOCKCOMMIT`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`siv`.`COMMIT`,0) AS `COMMIT`,concat('<button class=\'btn btn-action\' onclick="physicalCount(\'',`iv`.`VariantNo`,'\' , \'',concat(`i`.`Name`,'<br/>',`iv`.`VariantName`),'\');"><span class=\'glyphicon glyphicon-plus\'></span> Physical Count</button>') AS `Action` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) left join `vw_sumquantityforinventory` `siv` on((`iv`.`VariantNo` = `siv`.`VariantNo`))) where (`iv`.`Owned` = 1)) */;

/*View structure for view vw_items */

/*!50001 DROP TABLE IF EXISTS `vw_items` */;
/*!50001 DROP VIEW IF EXISTS `vw_items` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_items` AS (select `i`.`ItemNo` AS `ItemNo`,`i`.`Name` AS `Name`,`i`.`UOM` AS `UOM`,count(`iv`.`ItemNo`) AS `NoOfItems`,`l1`.`Name1` AS `Name1`,`l2`.`Name2` AS `Name2`,`l3`.`Name3` AS `Name3`,`s`.`SupplierNo` AS `SupplierNo`,`s`.`SupplierName` AS `SupplierName`,'View <span class="glyphicon glyphicon-menu-right pull-right"></span>' AS `ViewItems`,(case when ((`i`.`Removed` = 1) or (`i`.`SRemoved` <> 0)) then concat('<button class="btn btn-action" onclick="removeOrRecoverItem(\'',`i`.`ItemNo`,'\',\'',`i`.`Name`,'\',this,0);"><span class="glyphicon glyphicon-export"></span> Recover</button>') else concat('<button class="btn btn-action" onclick="removeOrRecoverItem(\'',`i`.`ItemNo`,'\',\'',`i`.`Name`,'\',this,1);"><span class="glyphicon glyphicon-trash"></span> Delete</button>') end) AS `Action`,`i`.`Removed` AS `Removed`,`i`.`SRemoved` AS `SRemoved`,`iv`.`Owned` AS `Owned` from (((((`item` `i` left join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) where (`i`.`Owned` = 1) group by `iv`.`ItemNo`) */;

/*View structure for view vw_lowstocks */

/*!50001 DROP TABLE IF EXISTS `vw_lowstocks` */;
/*!50001 DROP VIEW IF EXISTS `vw_lowstocks` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lowstocks` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`s`.`SupplierName` AS `SupplierName`,ifnull(`iv`.`Stocks`,0) AS `STOCKS`,ifnull(`iv`.`LowStock`,0) AS `LOWSTOCKS`,ifnull(`iv`.`Critical`,0) AS `CRITICAL` from (((((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `level1` `l1` on((`i`.`Level1No` = `l1`.`Level1No`))) join `level2` `l2` on((`i`.`Level2No` = `l2`.`Level2No`))) join `level3` `l3` on((`i`.`Level3No` = `l3`.`Level3No`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`))) where (((`iv`.`Owned` = 1) and (`iv`.`Stocks` is not null) and (`iv`.`Stocks` <= `iv`.`Critical`)) or ((`iv`.`Stocks` <= `iv`.`LowStock`) and (`iv`.`Stocks` > `iv`.`Critical`)))) */;

/*View structure for view vw_orderlistbyorderno */

/*!50001 DROP TABLE IF EXISTS `vw_orderlistbyorderno` */;
/*!50001 DROP VIEW IF EXISTS `vw_orderlistbyorderno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlistbyorderno` AS (select `o`.`OrderNo` AS `OrderNo`,concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNumber`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`o`.`Quantity` AS `Quantity`,`iv`.`Price` AS `Price`,(`o`.`Quantity` * `iv`.`Price`) AS `Total` from ((`orderlist` `o` join `item` `i` on((`o`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`o`.`VariantNo` = `iv`.`VariantNo`)))) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sumquantityforinventory` AS (select `iv`.`VariantNo` AS `VariantNo`,sum(`ol`.`Quantity`) AS `COMMIT` from (((`item` `i` join `itemvariant` `iv` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `tblorder` `o` on((`i`.`ItemNo` = `iv`.`ItemNo`))) join `orderlist` `ol` on(((`iv`.`VariantNo` = `ol`.`VariantNo`) and (`ol`.`OrderNo` = `o`.`OrderNo`)))) where ((`iv`.`Removed` = 0) and (`iv`.`Owned` = 1) and (`o`.`Status` = 'Process')) group by `iv`.`VariantNo`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
