/*
*********************************************************************
Author: Ran Nahmijas - 310322029
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*DB creation*/ 
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sherlockHolmesDB` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sherlockHolmesDB`;


/*Table structure for table `caseTypes` */
DROP TABLE IF EXISTS `caseTypes`;

CREATE TABLE `caseTypes` (
	`caseType_id` INT(3) NOT NULL,
	`caseTypeDescription` VARCHAR(50),
	PRIMARY KEY (`caseType_id`)
);
/*Data for the table `caseTypes` */
INSERT INTO `caseTypes` (`caseType_id`,`caseTypeDescription`)
VALUES(1,'Murder case'),(2,'Robbery case'),(3,'Rape case'),(4,'Extortion case') ;


/*Table structure for table `sampleTypes` */
DROP TABLE IF EXISTS `sampleTypes`;

CREATE TABLE `sampleTypes` (
	`sampleType_id` INT(3) NOT NULL,
	`sampleTypeDescription` VARCHAR(50),
	PRIMARY KEY (`sampleType_id`)
);
/*Data for the table `sampleTypes` */
INSERT INTO `sampleTypes` (`sampleType_id`,`sampleTypeDescription`)
VALUES(1,'Balistic'),(2,'D.N.A'),(3,'Prints'),(4,'Toxicology'),
		(5,'Serology');


/*Table structure for table `credibilityTypes` */
DROP TABLE IF EXISTS `credibilityTypes`;

CREATE TABLE `credibilityTypes` (
	`credibilityType_id` INT(3) NOT NULL,
	`credibilityTypeDesc` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`credibilityType_id`)
);
/*Data for the table `credibilityTypes` */
INSERT INTO `credibilityTypes` (`credibilityType_id`,`credibilityTypeDesc`)
VALUES(1,'credible'),(2,'not reliable');


/*Table structure for table `cities` */
DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
	`city_id` INT(3) NOT NULL AUTO_INCREMENT,
	`cityDescription` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`city_id`)
);
/*Data for the table `cities` */
INSERT INTO `cities` (`city_id`,`cityDescription`)
VALUES(1,'Appledore'),(2,'Bristole'),(3,'Birmingham'),(4,'Blackpool'),(5,'Bolton'),(6,'Coventry'),
	(7,'Cambridge'),(8,'Dartmouth'),(9,'Ipswich'),(10,'London'),(11,'Leicester'),(12,'Liverpool'),
	(13,'Manchester'),(14,'Nottingham'),(15,'Newcastle'),(16,'Norwich'),(17,'Oxford'),(18,'Plymouth'),
	(19,'Southampton'),(20,'Sunderland'),(21,'Swansea'),(22,'West Bromwich'),(23,'Wigan'),(24,'York'),
	(25,'New York'),(26,'Munich'),(27,'Milan'),(28,'Rome'),(29,'Paris'),(30,'Madrid');
	

/*Table structure for table `countries` */
DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
	`country_id` INT(3) NOT NULL AUTO_INCREMENT,
	`countryDescription` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`country_id`)
);
/*Data for the table `countries` */
INSERT INTO `countries` (`country_id`,`countryDescription`)
VALUES(1, 'Antarctica'),(2, 'Argentina'),(3, 'Australia'),(4, 'Austria'),(5, 'Belgium'),(6, 'Brazil'),(7, 'Canada'),
	(8, 'China'),(9, 'Denmark'),(10, 'Easter Island'),(11, 'France'),(12, 'Germany'),(13, 'India'),(14, 'Ireland'),
	(15, 'Israel'),(16, 'Italy'),(17, 'Japan'),(18, 'Netherlands'),(19, 'Russia'),(20, 'Spain'),
	(21, 'Switzerland'),(23, 'United Kingdom'),(24, 'United States');


/*Table structure for table `counties` */
DROP TABLE IF EXISTS `counties`;

CREATE TABLE `counties` (
	`county_id` INT(3) NOT NULL AUTO_INCREMENT,
	`countyDescription` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`county_id`)
);
/*Data for the table `counties` */
INSERT INTO `counties` (`county_id`,`countyDescription`)
VALUES(1, 'London'),(2, 'Cambridgeshire'),(3, 'Cumbria'),(4, 'Derbyshire'),(5, 'Devon'),(6, 'Durham'),(7, 'Essex'),
	(8, 'Gloucestershire'),(9, 'Greater London'),(10, 'Greater Manchester'),(11, 'Hampshire'),(12, 'Lancashire'),(13, 'Leicestershire'),
	(14, 'Lincolnshire'),(15, 'North Yorkshire'),(16, 'Northamptonshire'),(17, 'Northumberland'),(18, 'Nottinghamshire'),
	(19, 'Oxfordshire'),(20, 'Shropshire'),(21, 'Somerset'),(22, 'Sutherland'),(23, 'West Lothian'),(24, 'Dumbartonshire');


/*Table structure for table `hairColorTypes` */
DROP TABLE IF EXISTS `hairColorTypes`;

CREATE TABLE `hairColorTypes` (
	`hairColorType_id` INT(3) NOT NULL AUTO_INCREMENT,
	`hairColorTypeDescription` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`hairColorType_id`)
);
/*Data for the table `hairColorTypes` */
INSERT INTO `hairColorTypes` (`hairColorType_id`,`hairColorTypeDescription`)
VALUES(1, 'Black'),(2, 'Brown'),(3, 'Red'),(4, 'Blonde'),(5, 'Grey'),(6, 'White');


/*Table structure for table `bodyTypes` */
DROP TABLE IF EXISTS `bodyTypes`;

CREATE TABLE `bodyTypes` (
	`bodyType_id` INT(3) NOT NULL AUTO_INCREMENT,
	`bodyTypeDescription` VARCHAR(50),
	PRIMARY KEY (`bodyType_id`)
);
/*Data for the table `bodyTypes` */
INSERT INTO `bodyTypes` (`bodyType_id`,`bodyTypeDescription`)
VALUES(1, 'Skinny'),(2, 'Medium'),(3, 'Fat');


/*Table structure for table `ageRanges` */
DROP TABLE IF EXISTS `ageRanges`;

CREATE TABLE `ageRanges` (
	`ageRange_id` INT(3) NOT NULL AUTO_INCREMENT,
	`ageRangeDescription` VARCHAR(50),
	PRIMARY KEY (`ageRange_id`)
);
/*Data for the table `ageRanges` */
INSERT INTO `ageRanges` (`ageRange_id`,`ageRangeDescription`)
VALUES(1, 'Teenager'),(2, 'Middle aged '),(3, 'Old');


/*Table structure for table `skillsType` */
DROP TABLE IF EXISTS `skillsTypes`;

CREATE TABLE `skillsTypes` (
	`skillsType_id` INT(3) NOT NULL AUTO_INCREMENT,
	`skillsTypeDescription` VARCHAR(50),
	PRIMARY KEY (`skillsType_id`)
);
/*Data for the table `skillsTypes` */
INSERT INTO `skillsTypes` (`skillsType_id`,`skillsTypeDescription`)
VALUES(1, 'arsenic acid'),(2, 'strangling'),(3, 'weapons'),(4, 'knifes');


/*Table structure for table `persons` */
DROP TABLE IF EXISTS `persons`;

CREATE TABLE `persons` (
	`person_id` INT(5) NOT NULL,
	`firstName` VARCHAR(50) NOT NULL,
	`lastName` VARCHAR(50) NOT NULL,
	`height` FLOAT(2,2),	
	`hairColorType_id` INT(3),
	`bodyType_id` INT(3),
	`ageRange_id` INT(3),	
	`addressLine` VARCHAR(50) NOT NULL,
	`city_id` INT(3) NOT NULL,	
	`country_id` INT(3) NOT NULL,
	`county_id` INT(3) NOT NULL,
	`postalCode` INT(5),
	`skillsType_id` INT(3),
	PRIMARY KEY (`person_id`),		
	CONSTRAINT `persons_hairColorTypesfk` FOREIGN KEY (`hairColorType_id`) REFERENCES `hairColorTypes` (`hairColorType_id`),
	CONSTRAINT `persons_bodyTypesfk` FOREIGN KEY (`bodyType_id`) REFERENCES `bodyTypes`(`bodyType_id`),
	CONSTRAINT `persons_ageRangesfk` FOREIGN KEY (`ageRange_id`) REFERENCES `ageRanges` (`ageRange_id`),	
	CONSTRAINT `persons_citiesfk` FOREIGN KEY (`city_id`) REFERENCES `cities`(`city_id`),
	CONSTRAINT `persons_countriesfk` FOREIGN KEY (`country_id`) REFERENCES `countries`(`country_id`),
	CONSTRAINT `persons_countiesfk` FOREIGN KEY (`county_id`) REFERENCES `counties`(`county_id`),
	CONSTRAINT `persons_skillsTypesfk` FOREIGN KEY (`skillsType_id`) REFERENCES `skillsTypes`(`skillsType_id`)	
);
/*Data for the table `persons` */
INSERT INTO `persons` (`person_id`,`firstName`,`lastName`,`height`,`hairColorType_id`,`bodyType_id`,`ageRange_id`,`addressLine`,`city_id`,`country_id`,`county_id`,`postalCode`,`skillsType_id`)
VALUES(320322029,'James',' Moriarty',1.80,5,1,3,'Bleeding Heart Yard, London',10, 23,9,NULL,1),
	(321333001,'Sebastian','Moran',1.70,6,2,2,'Conduit Street, London',10, 23,9,NULL,3),
	(134665002,'Jhon','H. Watson',1.60,4,2,2,'221B Baker St, London',10, 23,9,NULL,NULL),
	(244615003,'Irene','Adler',1.60,1,1,2,'Cannon Street, London',10, 23,9,NULL,NULL),
	(139471004,'Molly','Hooper',1.55,1,3,1,'Thames Stree, London',10, 23,9,NULL,NULL),
	(537471025,'Sebastian','Wilkes',1.68,2,3,3,'Great Tower Street, Liverpool',12, 23,14,NULL,NULL),
	(434472026,'Sally','Donovan',1.72,3,2,3,'Bread Street, Newcastle',17, 23,19,NULL,NULL),
	(194672027,'Godfrey','Norton',1.70,2,3,2,'Zwinglihause, Dartmouth',8, 23,5,NULL,NULL),
	(334572138,'Jabez','Wilson',1.82,3,1,2,'Basinghall Street',19, 23,12,NULL,NULL),
	(234002139,'Hellen','Stoner',1.55,1,3,3,'Throgmorton Street',24, 23,24,NULL,NULL),
	(234472220,'Robert','St. Simon',NULL,6,1,3,'Queen Street, London',10, 23,9,NULL,NULL),
	(634374421,'Arthour','Holder',1.70,6,3,3,'Old Broad Street',11, 23,13,NULL,4),
	(114452232,'Fitzroy','Simpson',1.78,1,1,2,'Giltspur Street, London',10, 23,9,NULL,1),
	(212752633,'Leslie','Perrins',NULL,NULL,NULL,2,'Fleet Street',17, 23,19,NULL,NULL),
	(518351834,'Fredrico','Porlockini',NULL,NULL,NULL,3,'Forza Nerazzurri',27, 16,NULL,NULL,NULL),
	(715752935,'Shinwell','Kross',NULL,NULL,NULL,3,'Franz Josep',26, 12,NULL,NULL,NULL);


/*Table structure for table `cases` */
DROP TABLE IF EXISTS `cases`;

CREATE TABLE `cases` (
	`caseNumber` INT(5) NOT NULL AUTO_INCREMENT,
	`caseType_id` INT(3) NOT NULL,	
	`location` VARCHAR(50) NOT NULL,
	`crimeDate` DATE NOT NULL,
	`numberOfVictims` INT(3),
	`remarks` VARCHAR(250),	
	`statusNumber` INT(3) NOT NULL,
	PRIMARY KEY (`caseNumber`),
	CONSTRAINT `cases_caseTypesfk` FOREIGN KEY (`caseType_id`) REFERENCES `caseTypes` (`caseType_id`),	
	CONSTRAINT `cases_caseStatusfk` FOREIGN KEY (`statusNumber`) REFERENCES `caseStatus` (`statusNumber`)
);
/*Data for the table `cases` */
INSERT INTO `cases` (`caseNumber`,`caseType_id`,`location`,`crimeDate`,`numberOfVictims`,`remarks`,`statusNumber`)
VALUES(111111,1,'London, Big Ben','1880-12-01',1,'',1),
	(111112,1,'Splugen Pass, Italy','1900-04-15',2,'',1),
	(111113,3,'Paris, France','1914-10-02',1,'The body was found with signs of severe abuse',2),
	(111114,2,'Neuhauser Strasse, Munich‎','1889-07-01',1,'',1);


/*Table structure for table `clientCases` */
DROP TABLE IF EXISTS `clientCases`;

CREATE TABLE `clientCases` (
	`caseNumber` INT(5) NOT NULL,
	`person_id` INT(5) NOT NULL,
	PRIMARY KEY (`caseNumber`,`person_id`),	
	CONSTRAINT `clientCases_casesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`),
	CONSTRAINT `clientCases_personsfk` FOREIGN KEY (`person_id`) REFERENCES `persons` (`person_id`)	
);
/*Data for the table `clientCases` */
INSERT INTO `clientCases` (`caseNumber`,`person_id`)
VALUES(111111,194672027),(111111,234472220),(111112,334572138),(111113,234002139),(111114,234472220);


/*Table structure for table `suspectCases` */
DROP TABLE IF EXISTS `suspectCases`;

CREATE TABLE `suspectCases` (
	`caseNumber` INT(5) NOT NULL,
	`person_id` INT(5) NOT NULL,
	`alibiNumber` INT(5) NOT NULL, 
	PRIMARY KEY (`caseNumber`,`person_id`),	
	CONSTRAINT `suspectCases_casesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`),	
	CONSTRAINT `suspectCases_personsfk` FOREIGN KEY (`person_id`) REFERENCES `persons` (`person_id`),
	CONSTRAINT `suspectCases_alibisfk` FOREIGN KEY (`alibiNumber`) REFERENCES `alibis` (`alibiNumber`)
);
/*Data for the table `suspectCases` */
INSERT INTO `suspectCases` (`caseNumber`,`person_id`,`alibiNumber`)
VALUES(111111,634374421,-1),(111112,114452232,2),(111113,320322029,-1),(111113,321333001,-1),(111114,320322029,-1),(111114,321333001,1);


/*Table structure for table `informantCases` */
DROP TABLE IF EXISTS `informantCases`;

CREATE TABLE `informantCases` (
	`caseNumber` INT(5) NOT NULL,
	`person_id` INT(5) NOT NULL,
	`credibilityType_id` INT(3) NOT NULL,
	PRIMARY KEY (`caseNumber`,`person_id`),
	CONSTRAINT `informantCases_casesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`),		
	CONSTRAINT `informantCases_personsfk` FOREIGN KEY (`person_id`) REFERENCES `persons` (`person_id`),
	CONSTRAINT `informantCases_credibilityTypesfk` FOREIGN KEY (`credibilityType_id`) REFERENCES `credibilityTypes` (`credibilityType_id`)
);
/*Data for the table `informantCases` */
INSERT INTO `informantCases` (`caseNumber`,`person_id`,`credibilityType_id`)
VALUES(111111,212752633,1),(111112,321333001,2),(111113,715752935,1),(111113,212752633,1),(111114,244615003,2),(111114,518351834,1);


/*Table structure for table `criminalProfileCases` */
DROP TABLE IF EXISTS `criminalProfileCases`;

CREATE TABLE `criminalProfileCases` (
	`criminalProfileNumber` INT(3) NOT NULL AUTO_INCREMENT,
	`caseNumber` INT(5) NOT NULL,
	`hairColorType_id` INT(3),
	`bodyType_id` INT(3),
	`ageRange_id` INT(3),
	`skillsType_id` INT(3),
	PRIMARY KEY (`criminalProfileNumber`,`caseNumber`),
	CONSTRAINT `criminalProfileCases_casesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`),		
	CONSTRAINT `criminalProfileCases_hairColorTypesfk` FOREIGN KEY (`hairColorType_id`) REFERENCES `hairColorTypes` (`hairColorType_id`),
	CONSTRAINT `criminalProfileCases_bodyTypesfk` FOREIGN KEY (`bodyType_id`) REFERENCES `bodyTypes`(`bodyType_id`),
	CONSTRAINT `criminalProfileCases_ageRangesfk` FOREIGN KEY (`ageRange_id`) REFERENCES `ageRanges`(`ageRange_id`),			
	CONSTRAINT `criminalProfileCases_skillsTypesfk` FOREIGN KEY (`skillsType_id`) REFERENCES `skillsTypes`(`skillsType_id`)
);
/*Data for the table `criminalProfileCases` */
INSERT INTO `criminalProfileCases` (`criminalProfileNumber`,`caseNumber`,`hairColorType_id`,`bodyType_id`,`ageRange_id`,`skillsType_id`)
VALUES(1,111111,6,3,3,3),(2,111112,6,3,3,4),(3,111112,5,1,2,1),(4,111113,5,1,3,1),(4,111114,6,2,2,2);


/*Table structure for table `caseStatus` */
DROP TABLE IF EXISTS `caseStatus`;

CREATE TABLE `caseStatus` (
	`statusNumber` INT(3) NOT NULL AUTO_INCREMENT,
	`statusDescription` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`statusNumber`)
);
/*Data for the table `caseStatus` */
INSERT INTO `caseStatus` (`statusNumber`,`statusDescription`)
VALUES(1,'OPEN'),(2,'CLOSED');


/*Table structure for table `samples` */
DROP TABLE IF EXISTS `samples`;

CREATE TABLE `samples` (
	`sample_id` INT(3) NOT NULL AUTO_INCREMENT,
	`sampleType_id` INT(3) NOT NULL,
	`sampleDetails` VARCHAR(250) NOT NULL,
	PRIMARY KEY (`sample_id`),
	CONSTRAINT `samples_sampleTypesfk` FOREIGN KEY (`sampleType_id`) REFERENCES `sampleTypes` (`sampleType_id`)
);
/*Data for the table `samples` */
INSERT INTO `samples` (`sample_id`,`sampleType_id`,`sampleDetails`)
VALUES(1,1,'bullet casing found'),(2,2,'hair, nails, sperm'),(3,3,'footprints, fingerprints'),
	(4,4,'poison, arsenic acid'),(5,5,'victim blood samples, criminal blood samples');


/*Table structure for table `caseSamples` */
DROP TABLE IF EXISTS `caseSamples`;

CREATE TABLE `caseSamples` (
	`caseNumber` INT(3) NOT NULL,
	`sample_id` INT(3) NOT NULL,
	`remarks` VARCHAR(250),
	PRIMARY KEY (`caseNumber`,`sample_id`),
	CONSTRAINT `caseSamples_caseTypesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`),
	CONSTRAINT `caseSamples_samplesfk` FOREIGN KEY (`sample_id`) REFERENCES `samples` (`sample_id`)
);
/*Data for the table `caseSamples` */
INSERT INTO `caseSamples` (`caseNumber`,`sample_id`,`remarks`)
VALUES(111111,1,'gun bullets'),(111111,2,'suspect nails and hair'),(111111,3,'footprints on the floor'),
	(111112,2,'saliva'),(111112,3,'fingerprints on the body and the window'),(111112,4,'arsenic asid'),
	(111113,3,'footprints on the body and the window'),(111113,2,'hair and sperm found'),
	(111114,2,'saliva, nails'),(111114,3,'footprints floor, fingerprints on victims neck'),(111114,5,'suspected blood');


/*Table structure for table `paymentTypes` */
DROP TABLE IF EXISTS `paymentTypes`;

CREATE TABLE `paymentTypes` (
	`paymentType_id` INT(3) NOT NULL AUTO_INCREMENT,
	`paymentDescription` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`paymentType_id`)
);
/*Data for the table `paymentTypes` */
INSERT INTO `paymentTypes` (`paymentType_id`,`paymentDescription`)
VALUES(1,'Client paymant'),(2,'Reward'),(3,'Fine'),(4,'Current expenses');


/*Table structure for table `payments` */
DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
	`paymentNumber` INT(3) NOT NULL AUTO_INCREMENT,
	`paymentType_id` INT(3) NOT NULL,
	`caseNumber` INT (5) NOT NULL,
	`amount` INT (10),
	`remarks` VARCHAR(250),
	PRIMARY KEY (`paymentNumber`,`paymentType_id`),
	CONSTRAINT `payments_paymentTypesfk` FOREIGN KEY (`paymentType_id`) REFERENCES `paymentTypes` (`paymentType_id`),
	CONSTRAINT `payments_casesfk` FOREIGN KEY (`caseNumber`) REFERENCES `cases` (`caseNumber`)
);
/*Data for the table `payments` */
INSERT INTO `payments` (`paymentNumber`,`paymentType_id`,`caseNumber`,`amount`,`remarks`)
VALUES(1,2,111111,10000,'payment from Godfrey Norton'),(1,4,111111,-1000,'new carriage'),
	(2,1,111112,50000,'payment from Italy Government'),(2,3,111112,-3000,'uncontroled chase'),
	(3,1,111113,500,''),(3,4,111113,-100,'ammunition'),
	(4,2,111114,1500,'easy case'),(4,4,111114,-30,'parking');


/*Table structure for table `alibis` */
DROP TABLE IF EXISTS `alibis`;

CREATE TABLE `alibis` (
	`alibiNumber` INT(5) NOT NULL AUTO_INCREMENT,
	`person_id` INT(5) NOT NULL,
	`fromDate` DATE NOT NULL,
	`toDate` DATE NOT NULL,
	`credibilityType_id` INT(3) NOT NULL,
	`remarks` VARCHAR(250) NOT NULL,
	PRIMARY KEY (`alibiNumber`),
	CONSTRAINT `alibis_personsfk` FOREIGN KEY (`person_id`) REFERENCES `persons` (`person_id`),
	CONSTRAINT `alibis_credibilityTypesfk` FOREIGN KEY (`credibilityType_id`) REFERENCES `credibilityTypes` (`credibilityType_id`)
);
/*Data for the table `alibis` */
INSERT INTO `alibis` (`alibiNumber`,`person_id`,`fromDate`,`toDate`,`credibilityType_id`,`remarks`)
VALUES(-1,0,0,0,0,'No Alibi'),(1,139471004,'1889-06-29','1889-07-01',1,'Alibi Location: Munich'),(2,244615003,'1900-04-10','1900-04-16',2,'Alibi Location: Splugen Pass, Italy');
	



