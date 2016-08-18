-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u490995680_lms
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `pswrd` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `sq` varchar(100) NOT NULL,
  `asq` varchar(100) NOT NULL,
  `block` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('a1','a2','9052440146','What is the name of your best friend?','dhanu','no');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `DOB` date DEFAULT NULL,
  `BILL` varchar(50) DEFAULT NULL,
  `ACC` bigint(20) NOT NULL AUTO_INCREMENT,
  `CAL` varchar(50) NOT NULL,
  `TITL` varchar(250) NOT NULL,
  `AUT` varchar(50) NOT NULL,
  `POP` varchar(50) NOT NULL,
  `NOP` varchar(50) NOT NULL,
  `YOP` varchar(50) NOT NULL,
  `SUB` varchar(50) NOT NULL,
  `EDTN` varchar(50) NOT NULL,
  `VOL` varchar(50) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `PAG` varchar(50) NOT NULL,
  `PRC` varchar(50) NOT NULL,
  `RMRK` varchar(50) NOT NULL,
  `SRC` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`ACC`)
) ENGINE=MyISAM AUTO_INCREMENT=1154 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('2008-05-29','II223034',1152,'004.22 Dan 5','Fundementals of Computer Organization and Design','Dandamudi','New Delhi','Spring','2008','CSE','IV','2','8181280244','19.21  c/32','499','5','JBD, VIZAG','0'),('2008-05-29','II223034',1151,'004.22 Dan 4','Fundementals of Computer Organization and Design','Dandamudi','New Delhi','Spring','2008','CSE','IV','2','8181280244','19.21  c/31','499','4','JBD, VIZAG','0'),('2008-05-29','II223034',1150,'004.22 Dan 3','Fundementals of Computer Organization and Design','Dandamudi','New Delhi','Spring','2008','CSE','IV','2','8181280244','19.21  c/30','499','3','JBD, VIZAG','0'),('2008-05-29','II223034',1149,'004.22 Dan 2','Fundementals of Computer Organization and Design','Dandamudi','New Delhi','Spring','2008','CSE','IV','2','8181280244','19.21  c/29','499','R2','JBD, VIZAG','0'),('2008-05-29','II223034',1148,'004.22 Dan 1','Fundementals of Computer Organization and Design','Dandamudi','New Delhi','Spring','2008','CSE','IV','2','8181280244','19.21  c/28','499','R1','JBD, VIZAG','0'),('2008-05-29','II223034',1070,'006.35 hag 23','Data base systems','Connolly','New Delhi','Pearson','2008','CSE','IV','2','8131720257','19.21  c/27','599','5','JBD, VIZAG','0'),('2008-05-29','II223034    ',1069,'006.35 hag 22','Data base systems','Connolly','New Delhi','Pearson','2008','CSE','IV','2','8131720257','19.21  c/26','599','4','JBD, VIZAG','0'),('2008-05-29','II223034',1068,'006.35 hag 21','Data base systems','Connolly','New Delhi','Pearson','2008','CSE','IV','2','8131720257','19.21  c/25','599','3','JBD, VIZAG','0'),('2008-05-29','II223034',1067,'006.35 hag 20','Data base systems','Connolly','New Delhi','Pearson','2008','CSE','IV','2','8131720257','19.21  c/24','599','R2','JBD, VIZAG','0'),('2008-05-29','II223034',1066,'006.35 hag 19','Data base systems','Connolly','New Delhi','Pearson','2008','CSE','IV','2','8131720257','19.21  c/23','599','R1','JBD, VIZAG','0'),('2008-05-29','II223034',1065,'006.35 hag 18','An introduction to data base systems','Date','New Delhi','Pearson','2008','CSE','VIII','2','8177585568','19.21  c/22','410','10','JBD, VIZAG','0'),('2008-05-29','II223034',1064,'006.35 hag 17','An introduction to data base systems','Date','New Delhi','Pearson','2008','CSE','VIII','2','8177585568','19.21  c/21','410','9','JBD, VIZAG','0'),('2008-05-29','II223034',1063,'006.35 hag 16','An introduction to data base systems','Date','New Delhi','Pearson','2008','CSE','VIII','2','8177585568','19.21  c/20','410','8','JBD, VIZAG','0'),('2008-05-29','II223034',1062,'006.35 hag 15','An introduction to data base systems','Date','New Delhi','Pearson','2008','CSE','VIII','2','8177585568','19.21  c/19','410','7','JBD, VIZAG','0'),('2008-05-29','II223034',1061,'006.35 hag 14','An introduction to data base systems','Date','New Delhi','Pearson','2008','CSE','VIII','2','8177585568','19.21  c/18','410','6','JBD, VIZAG','0'),('2008-05-29','II223034',1060,'006.35 hag 13','Data base management system','Ramakrishna','New Delhi','Mc/graw','2008','CSE','III','2','007123151X','19.21  c/17','370.15 ','10','JBD, VIZAG','0'),('2008-05-29','II223034',1059,'006.35 hag 12','Data base management system','Ramakrishna','New Delhi','Mc/graw','2008','CSE','III','2','007123151X','19.21  c/16','370.15 ','9','JBD, VIZAG','0'),('2008-05-29','II223034',1058,'006.35 hag 11','Data base management system','Ramakrishna','New Delhi','Mc/graw','2008','CSE','III','2','007123151X','19.21  c/15','370.15 ','8','JBD, VIZAG','0'),('2008-05-29','II223034',1057,'006.35 hag 10','Data base management system','Ramakrishna','New Delhi','Mc/graw','2008','CSE','III','2','007123151X','19.21  c/14','370.15 ','7','JBD, VIZAG','0'),('2008-05-29','II223034',1056,'006.35 hag 9','Data base management system','Ramakrishna','New Delhi','Mc/graw','2008','CSE','III','2','007123151X','19.21  c/13','370.15 ','6','JBD, VIZAG','0'),('2008-05-29','II223111',870,'006.35 hag 8','Guide to operating Systems','Palmer','New Delhi','Thomson','2008','CSE','V','2','8131502120','19.21  c/12','433','R2','JBD, VIZAG','0'),('2008-05-29','II223111',869,'006.35 hag 7','Guide to operating Systems','Palmer','New Delhi','Thomson','2008','CSE','V','2','8131502120','19.21  c/11','433','R1','JBD, VIZAG','0'),('2008-05-29','II223111',844,'006.35 hag 6','Neural Networks for pattern recognisation','Bishop','New Delhi','Oxford','2008','CSE','V','2','0195668001','19.21  c/10','325','3','JBD, VIZAG','0'),('2008-05-29','II223111',843,'006.35 hag 5','Neural Networks for pattern recognisation','Bishop','New Delhi','Oxford','2008','CSE','V','2','0195668000','19.21  c/9','325','R2','JBD, VIZAG','0'),('2008-05-29','II223111',842,'006.35 hag 4','Neural Networks for pattern recognisation','Bishop','New Delhi','Oxford','2008','CSE','V','2','0195667999','19.21  c/8','325','R1','JBD, VIZAG','0'),('2008-05-29','II223109',706,'006.35 hag 3','Neural Network Design','Hagan','New Delhi','Cengage','2008','CSE','V','2','813150395X','19.21  c/7','433','3','JBD, VIZAG','0'),('2008-05-29','II223109',705,'006.35 hag 2','Neural Network Design','Hagan','New Delhi','Cengage','2008','CSE','V','2','813150395X','19.21  c/6','433','R2','JBD, VIZAG','0'),('2008-05-29','II223109',704,'006.35 hag 1','Neural Network Design','Hagan','New Delhi','Cengage','2008','CSE','V','2','813150395X','19.21  c/5','433','R1','JBD, VIZAG','0'),('2008-05-29','II223109',675,'005.43 sta 3','Operation Systems internals and Design Principales','William Stallings','New Delhi','Pearson','2008','CSE','V','2','8131703045','820','310','3','JBD, VIZAG','0'),('2008-05-29','II223109',674,'005.43 sta 2','Operation Systems internals and Design Principales','William Stallings','New Delhi','Pearson','2008','CSE','V','2','8131703045','819','310','R2','JBD, VIZAG','0'),('2008-05-29','II223109',673,'005.43 sta 1','Operation Systems internals and Design Principales','William Stallings','New Delhi','Pearson','2008','CSE','V','2','8131703045','818','310','R1','JBD, VIZAG','0'),('2008-05-29','II223109',665,'005.43 cro 8','Operating Systrems and Design/oriental approach','Charles Crowley','New Delhi','TMH','2008','CSE','II','2','0074635516','I.14','425','8','JBD, VIZAG','0'),('2008-05-29','II223109',664,'005.43 cro 7','Operating Systrems and Design/oriental approach','Charles Crowley','New Delhi','TMH','2008','CSE','II','2','0074635515','I.13','425','7','JBD, VIZAG','0'),('2008-05-29','II223109',663,'005.43 cro 6','Operating Systrems and Design/oriental approach','Charles Crowley','New Delhi','TMH','2008','CSE','II','2','0074635514','I.12','425','6','JBD, VIZAG','0'),('2008-05-29','II223109',585,'004.65 fu 3','Neural networks in computer intelligence','Limin Fu','New Delhi','TMH','2008','CSE','II','2','0070532828','462','275','3','JBD, VIZAG','0'),('2008-05-29','II223109 ',584,'004.65 fu 2','Neural networks in computer intelligence','Limin Fu','New Delhi','TMH','2008','CSE','II','2','0070532827','461','275','R2','JBD, VIZAG','0'),('2008-05-29','II223109 ',583,'004.65 fu 1','Neural networks in computer intelligence','Limin Fu','New Delhi','TMH','2008','CSE','II','2','0070532826','460','275','R1','JBD, VIZAG','0'),('2008-05-29','II223106 ',530,'004.36 tan 3','Distrubuted system Principales & Paradigms','Andrew S.Tanenbaum','New Delhi','Pearson','2008','CSE','II','2','8131718298','595','350','3','JBD, VIZAG','0'),('2008-05-29','II223106 ',529,'004.36 tan 2','Distrubuted system Principales & Paradigms','Andrew S.Tanenbaum','New Delhi','Pearson','2008','CSE','II','2','8131718298','594','350','R2','JBD, VIZAG','0'),('2008-05-29','II223106',528,'004.36 tan 1','Distrubuted system Principales & Paradigms','Andrew S.Tanenbaum','New Delhi','Pearson','2008','CSE','II','2','8131718298','593','350','R1','JBD, VIZAG','0'),('2008-05-29','II223106',498,'005.74 tam 3','Principals of distubuted data base systems','M. Tamer Ozsu','New Delhi','Pearson','2008','CSE','II','2','8177581775','592','365','3','JBD, VIZAG','0'),('2008-05-29','II223106',497,'005.74 tam 2','Principals of distubuted data base systems','M. Tamer Ozsu','New Delhi','Pearson','2008','CSE','II','2','8177581775','591','365','R2','JBD, VIZAG','0'),('2008-05-29','II223106',496,'005.74 tam 1','Principals of distubuted data base systems','M. Tamer Ozsu','New Delhi','Pearson','2008','CSE','II','2','8177581775','590','365','R1','JBD, VIZAG','0'),('2008-05-29','II223103',310,'004.22 man 10','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','529','210','10','JBD, VIZAG','0'),('2008-05-29','II223103',309,'004.22 man 9','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','528','210','9','JBD, VIZAG','0'),('2008-05-29','II223103',308,'004.22 man 8','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','527','210','8','JBD, VIZAG','0'),('2008-05-29','II223103',307,'004.22 man 7','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','526','210','7','JBD, VIZAG','0'),('2008-05-29','II223103',306,'004.22 man 6','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','525','210','6','JBD, VIZAG','0'),('2008-05-29','II223103',305,'004.22 man 5','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','524','210','5','JBD, VIZAG','0'),('2008-05-29','II223103',304,'004.22 man 4','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','523','210','4','JBD, VIZAG','0'),('2008-05-29','II223103 ',303,'004.22 man 3','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','522','210','3','JBD, VIZAG','0'),('2008-05-29','II223103',302,'004.22 man 2','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','521','210','R2','JBD, VIZAG','0'),('2008-05-29','II223103 ',301,'004.22 man 1','Computer Systems Architecture','Maris Mano','New Delhi','Pearson','2008','CSE','III','8','8131700704','520','210','R1','JBD, VIZAG','0'),('2008-05-29','II223103 ',286,'004.22 sta 5','Computer organization and  architecture Design for Performance','William Stallings','Newdelhi','Pearson','2008','CSE','III','8','8177589938','782','335','5','JBD, VIZAG','0'),('2008-05-29','II223103 ',285,'004.22 sta 4','Computer organization and  architecture Design for Performance','William Stallings','Newdelhi','Pearson','2008','CSE','III','8','8177589938','781','335','4','JBD, VIZAG','0'),('2008-05-29','II223103 ',284,'004.22 sta 3','Computer organization and  architecture Design for Performance','William Stallings','Newdelhi','Pearson','2008','CSE','VII','8','8177589938','780','335','3','JBD, VIZAG','0'),('2008-05-29','II223103/ ',283,'004.22 sta 2','Computer organization and  architecture Design for Performance','William Stallings','Newdelhi','Pearson','2008','CSE','VII','8','8177589938','779','335','R2','JBD, VIZAG','0'),('2008-05-29','II223103 ',282,'004.22 sta 1','Computer organization and  architecture Design for Performance','William Stallings','Newdelhi','Pearson','2008','CSE','VII','8','8177589938','778','335','R1','JBD, VIZAG','0'),('2008-05-26','11223023',207,'005.74 dat 5','An introduction to Data base systems ','Date','New Delhi','pearson','2008','CSE','VIII','8','8177585568','935','410','5','JBD, VIZAG','0'),('2008-05-26','11223023',206,'005.74 dat 4','An introduction to Data base systems ','Date','New Delhi','pearson','2008','CSE','VIII','8','8177585568','934','410','4','JBD, VIZAG','0'),('2008-05-26','11223023',205,'005.74 dat 3','An introduction to Data base systems ','Date','New Delhi','pearson','2008','CSE','VIII','8','8177585568','933','410','3','JBD, VIZAG','0'),('2008-05-26','11223023',204,'005.74 dat 2','An introduction to Data base systems ','Date','New Delhi','pearson','2008','CSE','VIII','8','8177585568','932','410','R2','JBD, VIZAG','0'),('2008-05-26','11223023',203,'005.74 dat 1','An introduction to Data base systems ','Date','New Delhi','pearson','2008','CSE','VIII','8','8177585568','931','410','R1','JBD, VIZAG','0');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `ID` varchar(50) NOT NULL,
  `T1` varchar(50) DEFAULT '0',
  `T2` varchar(50) DEFAULT '0',
  `T3` varchar(50) DEFAULT '0',
  `RT` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES ('12mt1a0503','0','0','0','0'),('1111111111','0','0','0','0'),('12mt1a0501','0','0','0','0'),('12MT1A0504','0','0','0','0'),('9440114523','0','0','0','0'),('New1234567','0','0','0','0');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

--
-- Table structure for table `fines`
--

DROP TABLE IF EXISTS `fines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fines` (
  `tid` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `itid` varchar(50) NOT NULL,
  `acc` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  `new` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `asst` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fines`
--

/*!40000 ALTER TABLE `fines` DISABLE KEYS */;
INSERT INTO `fines` VALUES ('LF1459971190541','12MT1A0503','LI1459925357501','1150','100','NO','2016-04-06','sadafsa','1'),('LF1459971190542','12MT1A0503','LI1459925357512','1168','100','NO','2016-04-06','sadafsa','1'),('LF1459971190540','12MT1A0504','LI1459925357547','1163','100','NO','2016-04-06','sadafsa','1');
/*!40000 ALTER TABLE `fines` ENABLE KEYS */;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issues` (
  `tid` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `acc` varchar(50) NOT NULL,
  `doi` date NOT NULL,
  `IA` varchar(50) NOT NULL,
  `dor` date NOT NULL,
  `RA` varchar(50) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES ('LI1459925357512','12MT1A0503','RT','1150','2016-04-06','dhanu','2016-04-06','raj'),('LI1459925357547','12MT1A0504','T1','1163','2016-04-06','mohan','2016-04-06','dhanu'),('LI1459925357501','12MT1A0503','T2','1168','2016-04-06','raj','2016-04-06','mohan');
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswrd` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('1111111111','ghgh@hjhj.ghd','as','student','on'),('12mt1a0501','ashaarumugam@hotmail.com','asha','student','on'),('12MT1A0503','bewithdhanu@gmail.com','a1','student','on'),('dhanu12345','dsghj@jhjjk.sdf','a1','staff','on'),('1238492121','js@gmail.com','js','staff','on'),('12MT1A0504','killisantu504@gmail.com','san','student','on'),('9440114523','bhaskar@gmail.com','srikakulam','student','on'),('1234567890','sreshtajoshi@gmail.com','sreshta','staff','on'),('1234567895','sreshtajoshi@gmail.com','joshi','staff','on'),('New1234567','bharat@gmail.com','qwertyu','student','off');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

--
-- Table structure for table `scards`
--

DROP TABLE IF EXISTS `scards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scards` (
  `ID` varchar(50) NOT NULL,
  `T1` varchar(50) DEFAULT '0',
  `T2` varchar(50) DEFAULT '0',
  `T3` varchar(50) DEFAULT '0',
  `T4` varchar(50) DEFAULT '0',
  `T5` varchar(50) DEFAULT '0',
  `T6` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scards`
--

/*!40000 ALTER TABLE `scards` DISABLE KEYS */;
INSERT INTO `scards` VALUES ('dhanu12345','0','0','0','0','0','0'),('1238492121','0','0','0','0','0','0'),('1234567890','0','0','0','0','0','0'),('1234567895','0','0','0','0','0','0');
/*!40000 ALTER TABLE `scards` ENABLE KEYS */;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desg` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES ('dhanu12345','jhdsjfshksgh','Teaching Faculty','dsghj@jhjjk.sdf','gfjfhjgfj','98987897888','2016-01-11','../images/12MT1A0503.jpg'),('1238492121','Joshi S','Teaching Faculty','js@gmail.com','sklm','9999999999','2016-02-09','../images/icon.png'),('1234567890','S.Sreshta Joshi','Teaching Faculty','sreshtajoshi@gmail.com','srikakulam','8790231885','2015-07-31','images/ASUS - WIN_20160412_151630.JPG'),('1234567895','S.Sreshta Joshi','Teaching Faculty','sreshtajoshi@gmail.com','srikakulam','8790231885','2015-07-31','images/ASUS - WIN_20160412_151643.JPG');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('1111111111','ghgh@hjhj.ghd','hjfgh','hhjhhk','Male','2016-04-08','B.Tech','CSE','2016-04-08','jhjkhj','hjhjhjkhjkhkjh','../images/WIN_20160216_12_57_37_Pro.jpg'),('12mt1a0501','ashaarumugam@hotmail.com','A.asha','Arumugam','Female','1995-09-27','B.Tech','CSE','2012-10-01','rotary nagar-3,tekkali,srikakulam(dist)','8186830305','../images/WIN_20160411_11_11_05_Pro.jpg'),('12MT1A0503','bewithdhanu@gmail.com','Parvateesam Kanakala','Rajarao','Male','1995-04-10','B.Tech','CSE','2012-08-10','Jarajapu Street,Arasada Village,Vangara Mandal','9052440146','../images/12MT1A0503.jpg'),('12MT1A0504','killisantu504@gmail.com','K.SANTOSHAMMA','ramanna','Female','1995-07-08','B.Tech','CSE','2016-09-20','ayyappa nagar,\r\nkommadhi,\r\nvisakhapatnam','9491624854','images/ASUS - WIN_20160412_122655.JPG'),('9440114523','bhaskar@gmail.com','bhasksra','ramalingam','Male','0000-00-00','M.Tech','CSE','0000-00-00','laver mandal srikakulam','8985623451','images/WIN_20160412_13_32_07_Pro.jpg'),('New1234567','bharat@gmail.com','L Bharat','Appa Rao','Male','1996-07-16','B.Tech','CIVIL','2016-04-12','ARASADA','995457585','images/1458643893384-1929519030.jpg');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-09 19:20:15
