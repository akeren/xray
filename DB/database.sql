-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.42-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema digitization
--

CREATE DATABASE IF NOT EXISTS digitization;
USE digitization;

--
-- Definition of table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE `formats` (
  `formatid` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `number` varchar(45) NOT NULL,
  `picture` varchar(45) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`formatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formats`
--

/*!40000 ALTER TABLE `formats` DISABLE KEYS */;
INSERT INTO `formats` (`formatid`,`description`,`number`,`picture`,`status`) VALUES 
 ('2h','Stitch - X','2','twoup.PNG',1),
 ('2v','Stitch - Y','2','twodown.PNG',1),
 ('3h','Stitch - X','3','threeup.PNG',1),
 ('3v','Stitch - Y','3','threedown.PNG',1),
 ('4h','Stitch - X','4','fourup.PNG',1),
 ('4s','Stitch - Square','4','foursquare.PNG',1),
 ('4v','Stitch - Y','4','fourdown.PNG',1);
/*!40000 ALTER TABLE `formats` ENABLE KEYS */;


--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `userid` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`userid`,`password`,`role`,`status`) VALUES 
 ('XDS/0001','XDS/0001','Radiographer',1),
 ('XDS/0002','XDS/0002','Radiotherapist',1),
 ('XDS/0003','XDS/0003','Radiographer',1),
 ('XDS/0004','XDS/0004','Radiotherapist',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


--
-- Definition of table `radiographs`
--

DROP TABLE IF EXISTS `radiographs`;
CREATE TABLE `radiographs` (
  `radid` varchar(45) NOT NULL,
  `radiographer` varchar(45) NOT NULL,
  `radiologist` varchar(45) NOT NULL,
  `patient` varchar(45) NOT NULL,
  `radiograph` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `interpretation` text,
  `prescription` text,
  `message` text,
  `date` varchar(45) DEFAULT NULL,
  `seen` tinyint(4) DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`radid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiographs`
--

/*!40000 ALTER TABLE `radiographs` DISABLE KEYS */;
INSERT INTO `radiographs` (`radid`,`radiographer`,`radiologist`,`patient`,`radiograph`,`description`,`interpretation`,`prescription`,`message`,`date`,`seen`,`status`) VALUES 
 ('Akaha Sule5','XDS/0001','XDS/0002','Akaha Sule','files/rad5.jpg','Chest x-ray Scanned in 3 part','there is a broken rib on the left','surgical operation is required',NULL,'2015-6-19',0,0),
 ('Dorathy Igwebuike5','XDS/0001','XDS/0004','Dorathy Igwebuike','files/rad5.jpg','Scanned chest radiograph in 4 parts',NULL,NULL,'The chest x-ray should be taken again','2015-6-19',0,2),
 ('Eze Magnus4','XDS/0003','XDS/0004','Eze Magnus','files/rad4.jpg','Scanned chest x-ray in 2 parts','Spinal cord problem','The patient requires spinal cord operation',NULL,'2015-6-17',0,0),
 ('Kulugh S.T1','XDS/0001','XDS/0004','Kulugh S.T','files/rad1.jpg','Chest X-ray','There is a rib fracture on the left side','Calcium carbonate with Panadol extra for three weeks  ',NULL,'2015-6-17',0,0),
 ('Zenda Doom2','XDS/0001','XDS/0002','Zenda Doom','files/rad2.jpg','Chest Radiograph',NULL,'','Pls Dr., kindly give me the correct interpretation for this radiograph.','2015-6-17',0,2);
/*!40000 ALTER TABLE `radiographs` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` varchar(45) NOT NULL,
  `salutation` varchar(45) DEFAULT NULL,
  `sname` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `mname` varchar(45) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userid`,`salutation`,`sname`,`fname`,`mname`,`sex`,`status`) VALUES 
 ('XDS/0001','Mr.','Tsavwua','Aondofa','Samuel','M',1),
 ('XDS/0002','Dr.','Okpachu','Aladi','Blessing','F',1),
 ('XDS/0003','Miss.','Jackque','Jacquline','Doom','F',1),
 ('XDS/0004','Dr.','HULUGH','James','Terna','M',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
