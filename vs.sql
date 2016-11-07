/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - ovs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ovs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ovs`;

/*Table structure for table `tblcandidates` */

DROP TABLE IF EXISTS `tblcandidates`;

CREATE TABLE `tblcandidates` (
  `id` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `gradelevel` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcandidates` */

/*Table structure for table `tblcategory` */

DROP TABLE IF EXISTS `tblcategory`;

CREATE TABLE `tblcategory` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catdescription` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdby` varchar(50) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`catdescription`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblcategory` */

insert  into `tblcategory`(`catid`,`catdescription`,`createddate`,`createdby`,`modifieddate`,`modifiedby`,`status`) values (2,'President','2016-08-02 10:35:00',NULL,NULL,NULL,1),(3,'Vice President','2016-08-02 11:21:55',NULL,NULL,NULL,1);

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(10) NOT NULL,
  `pword` varchar(500) NOT NULL,
  `loggeddate` datetime DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`uname`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

/*Table structure for table `tblvotetransaction` */

DROP TABLE IF EXISTS `tblvotetransaction`;

CREATE TABLE `tblvotetransaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidatesid` int(11) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `createdby` varchar(10) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblvotetransaction` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
