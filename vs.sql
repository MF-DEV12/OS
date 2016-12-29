/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - lampanohardwaretradings
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lampanohardwaretradings` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lampanohardwaretradings`;

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
 `SubTotal` double ,
 `SupplierName` varchar(50) 
)*/;

/*View structure for view vw_getrequestlistbysupplyrequestno */

/*!50001 DROP TABLE IF EXISTS `vw_getrequestlistbysupplyrequestno` */;
/*!50001 DROP VIEW IF EXISTS `vw_getrequestlistbysupplyrequestno` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_getrequestlistbysupplyrequestno` AS (select concat(`i`.`ItemNo`,'-',`iv`.`VariantNo`) AS `ItemNo`,`rl`.`SupplyRequestNo` AS `SupplyRequestNo`,concat(`i`.`Name`,'<br/>',`iv`.`VariantName`) AS `ItemDescription`,`iv`.`ImageFile` AS `ImageFile`,`iv`.`DPOCost` AS `DPOCost`,`rl`.`Quantity` AS `RequestsQty`,(`iv`.`DPOCost` * `rl`.`Quantity`) AS `SubTotal`,`s`.`SupplierName` AS `SupplierName` from (((`requestlist` `rl` join `item` `i` on((`rl`.`ItemNo` = `i`.`ItemNo`))) join `itemvariant` `iv` on((`rl`.`VariantNo` = `iv`.`VariantNo`))) join `supplier` `s` on((`i`.`SupplierNo` = `s`.`SupplierNo`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
