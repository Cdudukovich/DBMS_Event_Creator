-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2018 at 04:34 AM
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
('Georgia Tech', 'thanks'),
('University of Central Florida', 'cdudukovich1'),
('University of Central Florida', 'thanks33'),
('University of Florida', 'cduke'),
('University of Miami', 'tuser');

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
('cduke', 'DB demo', 2),
('thanks', 'Cereal dudes', 2),
('tuser', 'Robotics at UCF ', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table that tracks comments ';

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `event_id`, `comment_text`, `Rating`, `time`, `username`) VALUES
(3, 3, 'Bilbo sucks!', 3, '2018-11-08 08:00:14.000000', 'cdudukovich'),
(3, 5, 'Great project! ', 1, '2018-11-09 08:19:59.203304', 'thanks'),
(5, 1, 'Cool beans dog', 4, '2018-11-12 23:54:31.543002', 'thanks'),
(7, 8, 'Sweet!', 4, '2018-11-13 03:11:45.040657', 'cduke'),
(9, 30, 'Super nice comment.', 3, '2018-11-13 18:32:18.656204', 'thanks'),
(10, 30, 'I really enjoyed this event!', 3, '2018-11-13 18:32:46.680880', 'cduke');

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='events ';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `category`, `type`, `phone`, `email`, `lat`, `log`, `event_datetime`) VALUES
(28, 'Bilbo Baggin Adventure', 'Lets go on an adventure with Gandalf! ', 'Charity', 2, '407-761-5639', 'biblo.baggins@gmail.com', '78.08795000', '-72.15138000', '2018-11-21 00:14:12.023078'),
(30, 'LAN PARTY', 'Super awesome Lan party', 'Tech', 1, '4077777777', 'LAN@lan.com', '28.61127075', '-81.24809409', '2018-12-14 01:29:00.000000'),
(31, 'Guitar Party', 'Come Play guitar with us', 'Religious', 1, '40786177777', 'guitars@yahoo.com', '29.05399032', '-81.51176596', '2019-12-14 01:33:00.000000'),
(32, 'Drum Circl', 'Come bang on some drums', 'Religious', 1, '407-561-7777', 'cjpeanutbutter@yahoo.com', '28.83286593', '-81.45683432', '2017-10-12 11:35:00.000000'),
(33, 'Demo Time', 'Demonstrate your web app', 'Tech', 1, '407-561-7777', 'cjpeanutbutter@yahoo.com', '29.10199832', '-81.67656089', '2017-10-12 11:36:00.000000'),
(34, 'Cereal eating party', 'Come eat cereal and forget about your sadness', 'Charity', 1, '40786177777', 'cjpeanutbutter@yahoo.com', '28.81361544', '-81.56669760', '2017-10-12 11:38:00.000000'),
(35, 'Pity Party', '*Tears*', 'Charity', 2, '407-561-7777', 'mcbeans@afd.com', '29.00595996', '-81.77543784', '2017-07-12 11:39:00.000000'),
(36, 'Build robots', 'BUILD SOME ROBOTS', 'Tech', 3, '40786177777', 'ballsmcballs@balls.com', '29.06359371', '-81.81938315', '2017-09-12 11:49:00.000000'),
(37, 'Demo ', 'Demoing DB', 'Tech', 1, '4077777777', 'dude@gmail.com', '28.92906495', '-81.52275229', '2018-11-16 14:02:00.000000'),
(38, 'stuff', 'bsdfEnter Comment here...', 'Charity', 1, '40775445', 'balls@balls.com', '28.60245801', '-81.20012283', '2017-10-20 03:22:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
CREATE TABLE IF NOT EXISTS `hosts` (
  `id` int(50) NOT NULL COMMENT 'event ID',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of University',
  PRIMARY KEY (`id`,`name`),
  KEY `college_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relationship between event and university';

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `name`) VALUES
(1, ''),
(43, 'Georgia Tech'),
(47, 'Georgia Tech'),
(3, 'University of Central Florida'),
(4, 'University of Central Florida'),
(30, 'University of Central Florida'),
(34, 'University of Central Florida'),
(35, 'University of Central Florida'),
(38, 'University of Central Florida'),
(39, 'University of Central Florida'),
(40, 'University of Central Florida'),
(41, 'University of Central Florida'),
(31, 'University of Florida'),
(33, 'University of Florida'),
(36, 'University of Florida'),
(44, 'University of Florida');

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
('Cereal dudes', 'Eat as much cereal as possible'),
('DB demo', 'Good demo'),
('Robotics at UCF ', 'Build cool stuff ');

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
('Georgia Tech', 'Super awesome school filled with smart people', 'Atlanta, Georgia', 77),
('University of Central Florida', 'The largest school in the country and also a school that specializes it great professors', 'Orlando', 65000),
('University of Florida', 'Great medical program', 'Gainsville', 17),
('University of Miami', 'Hey they are kind of okay?', 'Miami, Florida', 777),
('University of South Florida', 'Always second best school', 'South Florida', 5);

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
('Christian', '12345', 'cdude', '$2y$10$yMeIRNj/zc8cz5iUnxjrqOQxdSzOE1sTfcZ7vv84yn2MjdZXtcfeS', 0, 'dude@gmail.com'),
('christian', 'Dudukovich', 'cdudukovich', '$2y$10$ZOuxtkhRTyh9qI0DUASHzOij0KoCMsbQQU7cGaUU6mBW5O1xIvEk2', 0, 'cjpeanutbutter@yahoo.com'),
('Christian', '12345', 'cdudukovich01', '$2y$10$358li/eJH2PO4RhZ94Ed.evuQNmBq1fmaHYq83M14wPcm3G8wysJq', 0, 'cdudukovich@knights.ucf.edu'),
('ballls', '$_POST[password]', 'cdudukovich1', '$2y$10$MNzUFd1EdVQ2Ko7u4M/jyOSSDu/3BkR14Tm2IBM3YUmsEHx2S5Okq', 0, 'dsiljfgsf'),
('cd', '12345', 'cduke', '$2y$10$SXS9uz6hxk.7I4S/mk8FGOkvZsUOKJwjyGOS5hTSMzCk1QQAdwDm2', 2, 'dfsdf@yahoo.com'),
('Christian', 'Dudukovich', 'dudukovich', '$2y$10$piBhzLJw.ruqp24dE6PutOGv.uwPDWzdEgXop1KT2gg6fVbRNAq9u', 0, 'scldkjfgs'),
('test', '12345', 'test', '$2y$10$PFIQCblSC8KusE2OgeJcU.Qi9NLVDZcqfOxVdmTDCUwgaD5mZBcHq', 0, 'dfsdgsdfg'),
('whoa', 'whoa', 'test123', '$2y$10$Ple7FwpJhs.1uNpLiIKlc.yJbyjtgnJS7Z0UVIkTlNkxvNpa5ZRC.', 0, 'dlksjfgdfg'),
('Tom', '12345', 'thanks', '$2y$10$DxsXlTXZ5ZTmArhSQ3dGG.t2RjG7y2Zict5wlBRSrG37qaVCpCLS6', 0, 'ballsmcballs@balls.com'),
('123', '12345', 'thanks33', '$2y$10$K.LjSSTpaf269ye.LLzq5upoDlSJuv26VNbqtXTH/.LuMZzDdu0gS', 0, '234'),
('test ', '12345', 'tuser', '$2y$10$8D/78tOqW7nAOGCz3HS67ewk3B.1dbok9s9csE42wUwKm4RdPPca.', 0, 'yes@yes.com');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
