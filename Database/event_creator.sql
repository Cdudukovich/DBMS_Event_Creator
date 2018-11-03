-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2018 at 08:36 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_creator`
--

-- --------------------------------------------------------

--
-- Table structure for table `aff1`
--

DROP TABLE IF EXISTS `aff1`;
CREATE TABLE IF NOT EXISTS `aff1` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of University',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who is affiliated',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Affiliation between student and university';

-- --------------------------------------------------------

--
-- Table structure for table `aff2`
--

DROP TABLE IF EXISTS `aff2`;
CREATE TABLE IF NOT EXISTS `aff2` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who is affiliated',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'RSO name',
  `type` int(2) NOT NULL COMMENT 'Owner or member',
  PRIMARY KEY (`username`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Affiliation between student and RSO ';

-- --------------------------------------------------------

--
-- Table structure for table `at`
--

DROP TABLE IF EXISTS `at`;
CREATE TABLE IF NOT EXISTS `at` (
  `id` int(50) NOT NULL COMMENT 'Event ID',
  `lat` double NOT NULL COMMENT 'Latitude',
  `longi` double NOT NULL COMMENT 'Longitude',
  `date` date NOT NULL COMMENT 'Date',
  `time` timestamp(6) NOT NULL COMMENT 'Time',
  PRIMARY KEY (`id`,`lat`,`longi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relationship between event and location';

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(20) NOT NULL COMMENT 'comment ID',
  `id` int(20) NOT NULL COMMENT 'Event ID',
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Comment Text',
  `Rating` int(1) NOT NULL COMMENT '5 star rating',
  `time` timestamp(6) NOT NULL COMMENT 'Creation time',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who left the comment',
  PRIMARY KEY (`c_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table that tracks comments ';

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

DROP TABLE IF EXISTS `create_event`;
CREATE TABLE IF NOT EXISTS `create_event` (
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'RSO name',
  `id` int(15) NOT NULL COMMENT 'Even ID',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who created ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Creation table';

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(15) NOT NULL COMMENT 'Event ID ',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of Event',
  `description` varchar(240) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description of Event',
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Type',
  `type` int(2) NOT NULL COMMENT 'Privilege ',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Phone number',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Email',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='events ';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `category`, `type`, `phone`, `email`) VALUES
(1, 'Thrift Store Dudes', 'This is an event based on a charity thrift store', 'Charity', 1, '407-267-6149', 'charity@charity.com'),
(2, 'Cool Pups', 'This is an rescue shelter adoption event', 'Charity', 2, '407-267-4149', 'rando@petrescuebyjudy.com'),
(3, 'Bilbo\'s Haunted house', 'This is an event created by bilbo the pibble', 'Outreach', 2, '407-267-3432', 'bilbo@baggins.com');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
CREATE TABLE IF NOT EXISTS `hosts` (
  `id` int(50) NOT NULL COMMENT 'event ID',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of University',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relationship between event and university';

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `general` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'City',
  `lat` double NOT NULL COMMENT 'Latitude',
  `longi` double NOT NULL COMMENT 'Longitude',
  PRIMARY KEY (`lat`,`longi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='location of events';

-- --------------------------------------------------------

--
-- Table structure for table `rso`
--

DROP TABLE IF EXISTS `rso`;
CREATE TABLE IF NOT EXISTS `rso` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of RSO',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of RSO',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Registered Student Organization';

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
CREATE TABLE IF NOT EXISTS `university` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of University',
  `description` varchar(240) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description of University',
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'City, State',
  `student_num` int(50) NOT NULL COMMENT 'Number of attending students',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='university profile ';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'First Name',
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Last Name',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Username',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User Password',
  `level` int(2) NOT NULL COMMENT 'User, Admin, Super admin (1,2,3)',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User Email',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User Table ';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`, `level`, `email`) VALUES
('balls', '12345', '12345566', '$2y$10$gcYPdfIXL8gZ71/DsBorCuqjWtdNtq0F9QxpOv62fyQVenhBIlZaG', 0, 'sadpoksdfgsf'),
('christian', 'Dudukovich', 'cdudukovich', '$2y$10$ZOuxtkhRTyh9qI0DUASHzOij0KoCMsbQQU7cGaUU6mBW5O1xIvEk2', 0, 'cjpeanutbutter@yahoo.com'),
('ballls', '$_POST[password]', 'cdudukovich1', '$2y$10$MNzUFd1EdVQ2Ko7u4M/jyOSSDu/3BkR14Tm2IBM3YUmsEHx2S5Okq', 0, 'dsiljfgsf'),
('Christian', 'Dudukovich', 'dudukovich', '$2y$10$piBhzLJw.ruqp24dE6PutOGv.uwPDWzdEgXop1KT2gg6fVbRNAq9u', 0, 'scldkjfgs'),
('test', '12345', 'test', '$2y$10$PFIQCblSC8KusE2OgeJcU.Qi9NLVDZcqfOxVdmTDCUwgaD5mZBcHq', 0, 'dfsdgsdfg'),
('whoa', 'whoa', 'test123', '$2y$10$Ple7FwpJhs.1uNpLiIKlc.yJbyjtgnJS7Z0UVIkTlNkxvNpa5ZRC.', 0, 'dlksjfgdfg'),
('Tom', '12345', 'thanks', '$2y$10$DxsXlTXZ5ZTmArhSQ3dGG.t2RjG7y2Zict5wlBRSrG37qaVCpCLS6', 0, 'ballsmcballs@balls.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `at`
--
ALTER TABLE `at`
  ADD CONSTRAINT `occured_at` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `create_event`
--
ALTER TABLE `create_event`
  ADD CONSTRAINT `CommentKey` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hosts`
--
ALTER TABLE `hosts`
  ADD CONSTRAINT `host_key` FOREIGN KEY (`id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
