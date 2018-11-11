-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2018 at 11:32 PM
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
  PRIMARY KEY (`username`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Affiliation between student and university';

--
-- Dumping data for table `aff1`
--

INSERT INTO `aff1` (`name`, `username`) VALUES
('University of Central Florida', 'cdudukovich1'),
('University of Central Florida', 'thanks33');

-- --------------------------------------------------------

--
-- Table structure for table `aff2`
--

DROP TABLE IF EXISTS `aff2`;
CREATE TABLE IF NOT EXISTS `aff2` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who is affiliated',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'RSO name',
  `type` int(2) NOT NULL COMMENT 'Owner or member',
  PRIMARY KEY (`username`,`name`),
  KEY `rso_aff` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Affiliation between student and RSO ';

--
-- Dumping data for table `aff2`
--

INSERT INTO `aff2` (`username`, `name`, `type`) VALUES
('cdudukovich1', 'FuckThisShitCLub', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'comment ID',
  `event_id` int(5) NOT NULL COMMENT 'Event ID',
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Comment Text',
  `Rating` int(1) NOT NULL COMMENT '5 star rating',
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) COMMENT 'Creation time',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who left the comment',
  PRIMARY KEY (`c_id`,`event_id`),
  KEY `event` (`event_id`),
  KEY `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table that tracks comments ';

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `event_id`, `comment_text`, `Rating`, `time`, `username`) VALUES
(3, 3, 'Bilbo sucks!', 3, '2018-11-08 08:00:14.000000', 'cdudukovich'),
(3, 5, 'FUCK THIS DAMN PROJECT MAN', 1, '2018-11-09 08:19:59.203304', 'thanks'),
(4, 1, 'FUCKK!', 2, '2018-11-08 03:57:50.626831', 'thanks');

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

DROP TABLE IF EXISTS `create_event`;
CREATE TABLE IF NOT EXISTS `create_event` (
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'RSO name',
  `id` int(15) NOT NULL COMMENT 'Even ID',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User who created ',
  PRIMARY KEY (`id`),
  KEY `rso_name` (`name`),
  KEY `user_created` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Creation table';

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of Event',
  `description` varchar(240) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description of Event',
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Type',
  `type` int(2) NOT NULL COMMENT 'Privilege ',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Phone number',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Event Email',
  `lat` decimal(13,8) NOT NULL COMMENT 'Latitude',
  `log` decimal(10,8) NOT NULL COMMENT 'Longitude',
  `event_datetime` datetime(6) DEFAULT NULL COMMENT 'The time the event takes place',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='events ';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `category`, `type`, `phone`, `email`, `lat`, `log`, `event_datetime`) VALUES
(1, 'Thrift Store Dudes', 'This is an event based on a charity thrift store', 'Charity', 1, '407-267-6149', 'charity@charity.com', '0.00000000', '0.00000000', NULL),
(2, 'Cool Pups', 'This is an rescue shelter adoption event', 'Charity', 2, '407-267-4149', 'rando@petrescuebyjudy.com', '0.00000000', '0.00000000', NULL),
(3, 'Bilbo\'s Haunted house', 'This is an event created by bilbo the pibble', 'Outreach', 2, '407-267-3432', 'bilbo@baggins.com', '0.00000000', '0.00000000', NULL),
(4, 'Jim and John\'s rage quit', 'Join jim and John as they give up on DBMS with Kahn Vu', 'charity', 1, '407-761-5399', 'pleasekillme@gmail.com', '0.00000000', '0.00000000', NULL),
(5, 'Computer Repair', 'Free Computer destructio uhh I mean repair', 'charity', 1, '407-761-53434', 'breakshit@gmail.com', '0.00000000', '0.00000000', NULL),
(6, 'Thisisatest', 'SUP BITCHES', 'Religious', 2, '407-561-7777', 'csdf@gdgskf.com', '28.54373564', '-81.74247885', '2018-11-29 03:01:00.000000'),
(7, 'test', 'fsdfasdfEnter Comment here...', 'blank', 1, '407754546', 'bals@gmabl.com', '27.47682287', '-81.48979331', '2018-10-31 16:04:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
CREATE TABLE IF NOT EXISTS `hosts` (
  `id` int(50) NOT NULL COMMENT 'event ID',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of University',
  PRIMARY KEY (`id`),
  KEY `college_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relationship between event and university';

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `name`) VALUES
(3, 'University of Central Florida'),
(4, 'University of Central Florida');

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

--
-- Dumping data for table `rso`
--

INSERT INTO `rso` (`name`, `description`) VALUES
('FuckThisShitCLub', 'Join this club if you are done with this shit ');

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

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`name`, `description`, `location`, `student_num`) VALUES
('University of Central Florida', 'The largest school in the country and also a school that specializes it shitty professors', 'Orlando', 65000);

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
('Shit', '12345', 'sballs', '$2y$10$2FojpeEAjsHxVxC44JIup./h3WmMT3AIoI3dGA8hF5DDnAPlET0eu', 0, '12345@gmaill.com'),
('test', '12345', 'test', '$2y$10$PFIQCblSC8KusE2OgeJcU.Qi9NLVDZcqfOxVdmTDCUwgaD5mZBcHq', 0, 'dfsdgsdfg'),
('whoa', 'whoa', 'test123', '$2y$10$Ple7FwpJhs.1uNpLiIKlc.yJbyjtgnJS7Z0UVIkTlNkxvNpa5ZRC.', 0, 'dlksjfgdfg'),
('Tom', '12345', 'thanks', '$2y$10$DxsXlTXZ5ZTmArhSQ3dGG.t2RjG7y2Zict5wlBRSrG37qaVCpCLS6', 0, 'ballsmcballs@balls.com'),
('123', '12345', 'thanks33', '$2y$10$K.LjSSTpaf269ye.LLzq5upoDlSJuv26VNbqtXTH/.LuMZzDdu0gS', 0, '234'),
('fuck', '12345', 'thankssss', '$2y$10$l1pZRTC/NUDtfSOsQO177uswE1zUkbz85ZhAooO3B9fKjiuPIs0za', 0, '12356@gmail.com ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aff1`
--
ALTER TABLE `aff1`
  ADD CONSTRAINT `college_key` FOREIGN KEY (`name`) REFERENCES `university` (`name`),
  ADD CONSTRAINT `unique_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `aff2`
--
ALTER TABLE `aff2`
  ADD CONSTRAINT `rso_aff` FOREIGN KEY (`name`) REFERENCES `rso` (`name`),
  ADD CONSTRAINT `user_aff` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `create_event`
--
ALTER TABLE `create_event`
  ADD CONSTRAINT `rso_name` FOREIGN KEY (`name`) REFERENCES `rso` (`name`),
  ADD CONSTRAINT `user_created` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `hosts`
--
ALTER TABLE `hosts`
  ADD CONSTRAINT `college_name` FOREIGN KEY (`name`) REFERENCES `university` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
