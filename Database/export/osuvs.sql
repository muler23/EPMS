-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2020 at 07:16 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osuvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo` longtext,
  `requestid` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `fname`, `lname`, `sex`, `age`, `username`, `password`, `role`, `status`, `photo`, `requestid`) VALUES
(21, 'abebe', 'abeebe', 'Male', 20, 'abebe', '81dc9bdb52d04dc20036dbd8313ed055', 'SSD', 1, 'userphoto/7.jpg', ''),
(37, 'mulugeta', 'abebe', 'Male', 24, 'muler', '827ccb0eea8a706c4c34a16891f84e7b', 'Adminstrator', 1, 'userphoto/IMG_20190107_122515.jpg', ''),
(38, 'sefiw', 'chale', 'male', 24, 'sefiw', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, '9.jpg', '2'),
(39, 'asefa', 'alemu', 'male', 23, 'chala', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 1, '10.jpg', '6'),
(40, 'estibel', 'chale', 'male', 23, 'biniyam', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, 'userphoto/3.jpg', '4'),
(41, 'sisay', 'chale', 'male', 23, 'sis', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, 'userphoto/5.jpg', '3'),
(42, 'sefiw', 'chale', 'male', 23, 'asse', '81dc9bdb52d04dc20036dbd8313ed055', 'Candidate', 1, 'userphoto/7.jpg', '8'),
(43, 'estibel', 'chale', 'male', 23, 'est', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, 'userphoto/13.jpg', '1'),
(45, 'fish', 'mule', 'male', 56, 'fish', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 1, '8.jpg', '11'),
(46, 'lakew', 'kebede', 'male', 23, 'lakewwww', 'fcea920f7412b5da7be0cf42b8c93759', 'Voter', 1, 'userphoto/1.jpg', '4'),
(47, 'muluken', 'chale', 'female', 25, 'muluken', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, 'userphoto/5.jpg', '7'),
(48, 'belayneh', 'abebe', 'male', 17, 'belie', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 1, 'userphoto/8.jpg', '23');

-- --------------------------------------------------------

--
-- Table structure for table `apply_date`
--

CREATE TABLE IF NOT EXISTS `apply_date` (
  `ApplyDateID` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  PRIMARY KEY (`ApplyDateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_date`
--

INSERT INTO `apply_date` (`ApplyDateID`, `StartDate`, `EndDate`) VALUES
(1, '2020-12-04 08:40:00', '2020-12-14 08:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attempt`
--


-- --------------------------------------------------------

--
-- Table structure for table `ballotstoretable`
--

CREATE TABLE IF NOT EXISTS `ballotstoretable` (
  `Voters_ID` varchar(50) NOT NULL,
  `Candidate_ID` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ballotstoretable`
--

INSERT INTO `ballotstoretable` (`Voters_ID`, `Candidate_ID`) VALUES
('1', '11'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('43', '42'),
('1', '6'),
('1', '8'),
('4', '6'),
('4', '11'),
('4', '8'),
('23', '6'),
('23', '11');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `VOICE` int(11) NOT NULL,
  `candidate_id` varchar(40) NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`VOICE`, `candidate_id`) VALUES
(3, '11'),
(3, '6'),
(2, '8');

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `Did` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `disciplineType` varchar(200) NOT NULL,
  `sid` varchar(20) NOT NULL,
  PRIMARY KEY (`Did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `discipline`
--


-- --------------------------------------------------------

--
-- Table structure for table `elecetion_date`
--

CREATE TABLE IF NOT EXISTS `elecetion_date` (
  `ElectionDateID` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`ElectionDateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elecetion_date`
--

INSERT INTO `elecetion_date` (`ElectionDateID`, `startdate`, `closedate`) VALUES
(1, '2020-12-04 08:39:00', '2020-12-30 08:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE IF NOT EXISTS `examdate` (
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`closedate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`closedate`) VALUES
('2020-12-22 08:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE IF NOT EXISTS `examresult` (
  `candidate_ID` varchar(20) NOT NULL,
  `TotalQuetions` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `incorrect` int(11) NOT NULL,
  `Total` float NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`candidate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` (`candidate_ID`, `TotalQuetions`, `correct`, `incorrect`, `Total`, `status`) VALUES
('38', 1, 0, 1, 0, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `comment` longtext,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `myfile` longtext,
  `sender` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notice`
--


-- --------------------------------------------------------

--
-- Table structure for table `preguesstable`
--

CREATE TABLE IF NOT EXISTS `preguesstable` (
  `CID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `VOICE` int(11) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preguesstable`
--


-- --------------------------------------------------------

--
-- Table structure for table `preguesstime`
--

CREATE TABLE IF NOT EXISTS `preguesstime` (
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`closedate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preguesstime`
--


-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Content` longtext,
  `userid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `promotion`
--


-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `optiona` varchar(100) NOT NULL,
  `optionb` varchar(100) NOT NULL,
  `optionc` varchar(100) NOT NULL,
  `optiond` varchar(100) NOT NULL,
  `txtansw` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `txtansw`, `userid`) VALUES
(1, '5+5=______', '1', '3', '4', '10', 'D', 21);

-- --------------------------------------------------------

--
-- Table structure for table `requesttable`
--

CREATE TABLE IF NOT EXISTS `requesttable` (
  `Student_ID` varchar(30) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `cgpa` float NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` longtext NOT NULL,
  `requesttype` varchar(20) NOT NULL,
  `votestatus` varchar(20) NOT NULL,
  `photo` longtext NOT NULL,
  `approved` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requesttable`
--

INSERT INTO `requesttable` (`Student_ID`, `fname`, `lname`, `sex`, `age`, `collage`, `department`, `year`, `cgpa`, `username`, `password`, `requesttype`, `votestatus`, `photo`, `approved`, `date`) VALUES
('1', 'estibel', 'chale', 'male', 23, 'informatics', 'is', '3', 3, 'est', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/13.jpg', 'yes', '2020-12-05 05:00:51'),
('11', 'fish', 'mule', 'male', 56, 'engineering', 'elec', '2', 3, 'fish', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 'unvote', '8.jpg', 'yes', '2020-12-06 00:00:00'),
('23', 'belayneh', 'abebe', 'male', 17, 'informatics', 'ist', '2', 3, 'belie', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/8.jpg', 'yes', '2020-12-07 06:37:09'),
('4', 'lakew', 'kebede', 'male', 23, 'informatics', 'is', '3', 2.8, 'lakewwww', 'fcea920f7412b5da7be0cf42b8c93759', 'Voter', 'unvote', 'userphoto/1.jpg', 'yes', '2020-12-06 08:16:55'),
('6', 'asefa', 'alemu', 'male', 23, 'informatics', 'is', '3', 3, 'asse', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 'vote', '10.jpg', 'yes', '2020-12-05 00:00:00'),
('7', 'muluken', 'chale', 'female', 25, 'informatics', 'is', '1', 2.8, 'muluken', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/5.jpg', 'yes', '2020-12-07 06:17:44'),
('8', 'sefiw', 'chale', 'male', 24, 'informatics', 'is', '2', 4, 'sefiw', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', '11', '9.jpg', 'yes', '2020-12-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requesttablepreguess`
--

CREATE TABLE IF NOT EXISTS `requesttablepreguess` (
  `Student_ID` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `requesttype` varchar(20) NOT NULL,
  `votestatus` varchar(20) NOT NULL,
  `photo` longtext NOT NULL,
  `approved` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requesttablepreguess`
--

INSERT INTO `requesttablepreguess` (`Student_ID`, `fname`, `lname`, `sex`, `age`, `collage`, `department`, `year`, `cgpa`, `username`, `password`, `requesttype`, `votestatus`, `photo`, `approved`, `date`) VALUES
('1', 'estibel', 'chale', 'male', 23, 'informatics', 'is', '3', 3, 'á‰¢áŠ’', '81dc9bdb52d04dc20036dbd8313ed055', 'Voter', 'unvote', 'userphoto/6.jpg', 'yes', '2020-12-04 04:44:24'),
('11', 'fish', 'mule', 'male', 56, 'engineering', 'elec', '2', 3, 'fish', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 'unvote', 'userphoto/7.jpg', 'yes', '2020-12-06 00:00:00'),
('2', 'sefiw', 'chale', 'male', 24, 'informatics', 'is', '2', 4, 'áˆ°áŠá‹', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 'unvote', 'userphoto/5.jpg', 'yes', '2020-12-04 00:00:00'),
('23', 'belayneh', 'abebe', 'male', 17, 'informatics', 'ist', '2', 3, 'belie', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/8.jpg', 'yes', '2020-12-07 06:37:09'),
('3', 'sisay', 'chale', 'male', 23, 'informatics', 'is', '4', 3, 'sis', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/5.jpg', 'yes', '2020-12-04 04:50:54'),
('4', 'lakew', 'kebede', 'male', 23, 'informatics', 'is', '3', 2.8, 'lakewwww', 'fcea920f7412b5da7be0cf42b8c93759', 'Voter', 'unvote', 'userphoto/1.jpg', 'yes', '2020-12-06 08:16:55'),
('6', 'asefa', 'chale', 'male', 23, 'informatics', 'is', '3', 3, 'ase', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', 'unvote', 'userphoto/young-female-fighter-wearing-in-special-red-protective-gloves-and-helmet-with-shoes-for-fight-boxing-using-karate-technique-kick-and-punch-two-girl-training-karate-skill-together-at-special-class-PPEE01.jpg', 'yes', '2020-12-04 00:00:00'),
('7', 'muluken', 'chale', 'female', 25, 'informatics', 'is', '1', 2.8, 'muluken', 'e10adc3949ba59abbe56e057f20f883e', 'Voter', 'unvote', 'userphoto/5.jpg', 'yes', '2020-12-07 06:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `ssdnotification`
--

CREATE TABLE IF NOT EXISTS `ssdnotification` (
  `notificationid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `to` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`notificationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ssdnotification`
--

INSERT INTO `ssdnotification` (`notificationid`, `subject`, `message`, `to`, `status`) VALUES
(6, 'Send Student Data', 'When you incorporate security features into your applications design  implementation  and deployment it helps to have a good understanding of how attackers think By thinking like attackers and being aware of their likely tactics  you can be more effective', 'Main-Registrar', 'read'),
(7, 'safsdfsfs', 'xcxbxbxbxbxcbxcbxcbxcbb', 'Main-Registrar', 'read'),
(8, 'tekebel dev', 'faga', 'Main-Registrar', 'read'),
(9, 'gfhh', 'do it', 'Main-Registrar', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `veteriid` varchar(30) NOT NULL,
  `countt` int(40) NOT NULL,
  PRIMARY KEY (`veteriid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`veteriid`, `countt`) VALUES
('1', 3),
('4', 4),
('23', 11);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` varchar(20) NOT NULL DEFAULT '',
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `collage` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `cgpa` varchar(20) DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `gender`, `age`, `collage`, `department`, `year`, `cgpa`, `program`) VALUES
('1', 'estibel', 'chale', 'male', 23, 'informatics', 'is', '3', '3', 'regular'),
('11', 'fish', 'mule', 'male', 56, 'engineering', 'elec', '2', '3', 'regular'),
('2', 'sefiw', 'chale', 'male', 24, 'informatics', 'is', '2', '4', 'regular'),
('23', 'belayneh', 'abebe', 'male', 17, 'informatics', 'ist', '2', '3.00', 'regular'),
('3', 'sisay', 'chale', 'male', 23, 'informatics', 'is', '4', '3', 'regular'),
('4', 'lakew', 'kebede', 'male', 23, 'informatics', 'is', '3', '2.8', 'regular'),
('5', 'anteneh', 'chale', 'male', 23, 'informatics', 'is', '3', '4', 'extentionr'),
('6', 'asefa', 'chale', 'male', 23, 'informatics', 'is', '3', '3', 'regular'),
('7', 'muluken', 'chale', 'female', 25, 'informatics', 'is', '1', '2.8', 'regular');
