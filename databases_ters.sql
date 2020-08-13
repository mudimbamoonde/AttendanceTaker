-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2019 at 12:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ters`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(10) NOT NULL AUTO_INCREMENT,
  `catName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`) VALUES
(3, 'Lesson Development'),
(5, 'Question Techniques'),
(6, 'Skill/knowledge in handling special education needs'),
(7, 'Summary/Conclusion'),
(8, 'Evaluation');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(10) NOT NULL AUTO_INCREMENT,
  `commentText` text,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `commentText`, `userid`) VALUES
(1, 'This is impressive', 4),
(2, 'Keep up with the Good spirit', 4),
(3, 'You can do better', 7),
(4, 'Nice topic presentation', 4),
(5, 'Well done with the good work', 4),
(6, 'Lm', 4),
(7, 'null', 4);

-- --------------------------------------------------------

--
-- Table structure for table `evaluationsheet`
--

DROP TABLE IF EXISTS `evaluationsheet`;
CREATE TABLE IF NOT EXISTS `evaluationsheet` (
  `evaID` int(10) NOT NULL AUTO_INCREMENT,
  `catID` int(10) NOT NULL,
  `Mark` int(20) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `Byuser` varchar(200) NOT NULL,
  `dateReported` datetime DEFAULT NULL,
  PRIMARY KEY (`evaID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluationsheet`
--

INSERT INTO `evaluationsheet` (`evaID`, `catID`, `Mark`, `userid`, `Byuser`, `dateReported`) VALUES
(1, 1, 4, 4, 'pupil', '2019-04-14 00:00:00'),
(2, 2, 3, 4, 'pupil', '2019-04-14 00:00:00'),
(3, 3, 3, 4, 'pupil', '2019-04-14 00:00:00'),
(4, 4, 5, 4, 'pupil', '2019-04-14 00:00:00'),
(5, 5, 4, 4, 'pupil', '2019-04-14 00:00:00'),
(6, 6, 4, 4, 'pupil', '2019-04-14 00:00:00'),
(7, 7, 4, 4, 'pupil', '2019-04-14 00:00:00'),
(8, 8, 5, 4, 'pupil', '2019-04-14 00:00:00'),
(9, 9, 4, 4, 'pupil', '2019-04-14 00:00:00'),
(10, 10, 5, 4, 'pupil', '2019-04-14 00:00:00'),
(11, 1, 5, 7, 'pupil', '2019-05-04 00:00:00'),
(12, 2, 5, 7, 'pupil', '2019-05-04 00:00:00'),
(13, 3, 4, 7, 'pupil', '2019-05-04 00:00:00'),
(14, 4, 5, 7, 'pupil', '2019-05-04 00:00:00'),
(15, 5, 4, 7, 'pupil', '2019-05-04 00:00:00'),
(16, 6, 3, 7, 'pupil', '2019-05-04 00:00:00'),
(17, 7, 4, 7, 'pupil', '2019-05-04 00:00:00'),
(18, 8, 2, 7, 'pupil', '2019-05-04 00:00:00'),
(19, 9, 3, 7, 'pupil', '2019-05-04 00:00:00'),
(20, 10, 4, 7, 'pupil', '2019-05-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hodform`
--

DROP TABLE IF EXISTS `hodform`;
CREATE TABLE IF NOT EXISTS `hodform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(100) NOT NULL,
  `DateTaken` date DEFAULT NULL,
  `TimeTaken` time DEFAULT NULL,
  `Topic` text,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodform`
--

INSERT INTO `hodform` (`id`, `teacherName`, `DateTaken`, `TimeTaken`, `Topic`, `userid`) VALUES
(1, 'Linda Chewe', '2019-04-19', '13:35:31', 'Atom', 4);

-- --------------------------------------------------------

--
-- Table structure for table `learnerssheet`
--

DROP TABLE IF EXISTS `learnerssheet`;
CREATE TABLE IF NOT EXISTS `learnerssheet` (
  `sheetID` int(10) NOT NULL AUTO_INCREMENT,
  `VariableName` varchar(200) DEFAULT NULL,
  `Mark` int(20) DEFAULT NULL,
  PRIMARY KEY (`sheetID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learnerssheet`
--

INSERT INTO `learnerssheet` (`sheetID`, `VariableName`, `Mark`) VALUES
(1, 'Speaks clearly and audibly', 5),
(2, 'Has a good grasp over the subject', 5),
(3, 'Uses eye contact during lessons', 5),
(4, 'Listens carefully to pupils comments/questions', 5),
(5, 'Ties facts to subject themes', 5),
(6, 'Clarifiees material which needs elaboration', 5),
(7, 'Answers questions clearly and concisely', 5),
(8, 'Encourages student questioning', 5),
(9, 'Seems prepared for each lesson', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pupilcat`
--

DROP TABLE IF EXISTS `pupilcat`;
CREATE TABLE IF NOT EXISTS `pupilcat` (
  `catID` int(50) NOT NULL AUTO_INCREMENT,
  `variableName` varchar(200) NOT NULL,
  `Mark` varchar(100) NOT NULL,
  `userid` int(20) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionsheet`
--

DROP TABLE IF EXISTS `questionsheet`;
CREATE TABLE IF NOT EXISTS `questionsheet` (
  `evaID` int(10) NOT NULL AUTO_INCREMENT,
  `catID` int(10) NOT NULL,
  `VariableName` varchar(200) DEFAULT NULL,
  `Mark` int(20) DEFAULT NULL,
  PRIMARY KEY (`evaID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionsheet`
--

INSERT INTO `questionsheet` (`evaID`, `catID`, `VariableName`, `Mark`) VALUES
(2, 2, 'Capturing pupils attention', 5),
(4, 3, 'Sequence of instruction', 5),
(5, 3, 'Knowledge of subject matter', 5),
(6, 3, 'Level and calarity', 5),
(7, 3, 'Pupil\'s participation in the lesson', 5),
(9, 4, 'Use of Teaching Aids', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sysuser`
--

DROP TABLE IF EXISTS `sysuser`;
CREATE TABLE IF NOT EXISTS `sysuser` (
  `sysID` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cellphone` varchar(100) DEFAULT NULL,
  `password` text,
  `position` text NOT NULL,
  PRIMARY KEY (`sysID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysuser`
--

INSERT INTO `sysuser` (`sysID`, `firstName`, `surname`, `username`, `email`, `cellphone`, `password`, `position`) VALUES
(1, 'Mudimba', 'Moonde', 'mudimba', 'mudimbamoonde@gmail.com', '260965840299', '09870ea339eb7eb1a62ac580f2c8ac12', 'master'),
(2, 'Mwila', 'Headson', 'mwilah', 'mwila@ta.zm', '26906994499', '09870ea339eb7eb1a62ac580f2c8ac12', 'master'),
(4, 'Linda', 'Chewe', 'cheweLinda', 'cheweLinda', '2648877597', '09870ea339eb7eb1a62ac580f2c8ac12', 'teacher'),
(5, 'Fisher', 'Mawe', 'mawefisher', 'fisherm@gmail.com', '931223029', '09870ea339eb7eb1a62ac580f2c8ac12', 'standOffice'),
(7, 'Rabbeca', 'Mwale', 'rabbecam', 'rabbecam@gmail.co.zm', '1808273873', '09870ea339eb7eb1a62ac580f2c8ac12', 'teacher'),
(8, 'Chanda', 'Mulenga', 'chandam', 'mudimba@mbs.com', '92804020', '09870ea339eb7eb1a62ac580f2c8ac12', 'learner');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
