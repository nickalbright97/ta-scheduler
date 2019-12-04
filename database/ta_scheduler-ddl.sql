/*
 * MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
 * 
 * Host: localhost    Database: ta_scheduler
 * ------------------------------------------------------
 * ta_scheduler.ddl
*/
DROP DATABASE IF EXISTS ta_scheduler;

CREATE DATABASE ta_scheduler;

USE ta_scheduler;

DROP USER IF EXISTS 'ta_scheduler_app' @'localhost';

CREATE USER 'ta_scheduler_app'@'localhost' IDENTIFIED BY '$3kuDoG';

GRANT ALL PRIVILEGES ON ta_scheduler.* TO 'ta_scheduler_app' @'localhost';

/*Table for queue*/
DROP TABLE IF EXISTS `queue`;
CREATE TABLE `queue` (
	`queue` VARCHAR(100)
	);

/*Table structure for table `feedback`*/
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE
	`feedback` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(100) DEFAULT NULL,
	`professor` VARCHAR(100) DEFAULT NULL,
	`text` VARCHAR(100) DEFAULT NULL,
	`datetime` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`) );

/*Table structure for table `person`*/
DROP TABLE IF EXISTS `person`;

CREATE TABLE
	`person` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(100) NOT NULL,
	`name` VARCHAR(100) NOT NULL,
	`role` VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (`id`) );

/*Table strucure for table preference table*/
DROP TABLE IF EXISTS `preferences`;
CREATE TABLE
	`preferences` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
		`person_id` INT(11) NOT NULL,
		`sunday_start` TIME(0),
		`sunday_end` TIME(0),
		`monday_start` TIME(0),
		`monday_end` TIME(0),
		`tuesday_start` TIME(0),
		`tuesday_end` TIME(0),
		`wednesday_start` TIME(0),
		`wednesday_end` TIME(0),
		`thursday_start` TIME(0),
		`thursday_end` TIME(0), 
		`late_shifts` BOOLEAN,
		PRIMARY KEY (`id`),
		KEY `preference_fk` (`person_id`),
		CONSTRAINT `preference_fk` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) 
	);

/*Table structure for table `shift`*/
DROP TABLE IF EXISTS `shift`;
CREATE TABLE
	`shift` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
	`owner` INT(11) NOT NULL,
	`shift_start` DATETIME NOT NULL,
	`shift_end` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	KEY `shift_fk` (`owner`),
	CONSTRAINT `shift_fk` FOREIGN KEY (`owner`) REFERENCES `person` (`id`) );

/*Table structure for table `shift_request`*/
DROP TABLE IF EXISTS `shift_request`;
CREATE TABLE
	`shift_request` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
	`dropper` INT(11) NOT NULL,
	`picker` INT(11),
	`shift_start` DATETIME NOT NULL,
	`shift_end` DATETIME NOT NULL,
	`comments` VARCHAR(100) DEFAULT NULL,
	`approved` BOOLEAN,
	PRIMARY KEY (`id`),
	KEY `dropper_fk` (`dropper`),
	KEY `picker_fk` (`picker`),
	CONSTRAINT `dropper_fk` FOREIGN KEY (`dropper`) REFERENCES `person` (`id`),
	CONSTRAINT `picker_fk` FOREIGN KEY (`picker`) REFERENCES `person` (`id`) );