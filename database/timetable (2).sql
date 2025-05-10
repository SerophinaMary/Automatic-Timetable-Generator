-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 12:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `eid` (`eid`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `password`, `eid`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(6, 'jhjkhjkj', 'manu@gmail.com', 'jhkkkj', 'gfghghhjj'),
(7, 'Rehan', 'rehan@gmail.com', 'hlo', 'hey');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`),
  FULLTEXT KEY `course_name` (`department_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(13, 'B.tech'),
(14, 'M.Tech'),
(15, 'BCA'),
(16, 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(20) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`sem_id`),
  KEY `course_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester_name`, `department_id`) VALUES
(1, '1st', 13),
(2, '2nd', 13),
(3, '3rd', 13),
(4, '4th', 13),
(6, '2nd', 14),
(7, '1st', 15),
(8, '2nd', 15),
(9, '3rd', 15),
(10, '4th', 15),
(11, '1st', 16),
(12, '2nd', 16);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `eid` (`eid`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `name`, `eid`, `password`, `mob`, `address`, `department_id`, `sem_id`, `dob`, `pic`, `gender`, `status`, `date`) VALUES
(1, 'Manu', 'manu@gmail.com', 'manu', 9891142743, 'Punjab', 13, 1, '1995-07-22', '20141011_164534-1.jpg', 'f', 'ON', '2016-05-22'),
(2, 'Neeru', 'neeru@gmail.com', 'neeru', 9876541234, 'Noida', 13, 2, '1994-12-29', '20151118_105435.jpg', 'f', 'ON', '2016-05-22'),
(3, 'Nandni', 'nandni@gmail.com', 'nandni', 7696303090, 'Punjab', 13, 3, '1995-07-11', 'DSC_0015_1.JPG', 'f', 'OFF', '2016-05-22'),
(4, 'Japleen', 'japleen@gmail.com', 'japleen', 3265897896, 'Noida', 13, 4, '1999-12-06', '20151118_105529.jpg', 'f', 'OFF', '2016-05-22'),
(5, 'Ria', 'ria@gmail.com', 'ria', 9874563214, 'jalandhar', 14, 6, '1997-12-02', '20151118_000454.jpg', 'f', 'OFF', '2016-05-22'),
(6, 'Neha', 'neha@gmail.com', 'neha', 7894561234, 'Ludhiana', 15, 7, '1994-12-05', 'DSC_0033.JPG', 'f', 'OFF', '2016-05-22'),
(7, 'Parul', 'parul@gmail.com', 'parul', 9874563131, 'Gurgaon', 15, 8, '1993-12-01', 'DSC_0042.JPG', 'f', 'ON', '2016-05-22'),
(9, 'Rakesh', 'rakesh@gmail.com', 'rakesh', 9874566544, 'Shimla', 15, 9, '0091-12-02', 'DSC_0048.JPG', 'm', 'OFF', '2016-05-22'),
(10, 'Myra', 'myra@gmail.com', 'myra', 9874123654, 'Punjab', 15, 10, '1995-11-23', 'DSC_0061.JPG', 'f', 'OFF', '2016-05-22'),
(11, 'Dazy', 'dazy@gmail.com', 'dazy', 7894563214, 'Banglore', 16, 11, '1994-02-14', 'IMG_20160117_140446.jpg', 'f', 'OFF', '2016-05-22'),
(12, 'Aman', 'aman@gmail.com', 'aman', 7894563258, 'Mansa', 16, 12, '1993-05-23', 'IMG_20160214_104030-1.jpg', 'f', 'ON', '2016-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(20) DEFAULT NULL,
  `sem_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `course_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `sem_id`, `department_id`) VALUES
(1, 'PHP', 1, 13),
(2, 'Core PHP', 2, 13),
(3, 'Advance PHP', 3, 13),
(4, 'Cake PHP', 4, 13),
(5, 'Codeginter', 6, 14),
(6, 'Java', 7, 15),
(7, 'Advance Java', 8, 15),
(8, 'Core Java', 9, 15),
(9, 'OOPS', 10, 15),
(10, 'Wordpress', 11, 16),
(11, 'Joomla', 12, 16),
(12, 'Mgento', 1, 13),
(13, 'Data Structure', 1, 13),
(14, 'Discrete', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `eid` (`eid`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `eid`, `password`, `mob`, `address`, `department_id`, `sem_id`, `status`, `date`) VALUES
(16, 'Kamal', 'kamal@gmail.com', 'kamal', 9873214569, 'Gurgoan', 13, 1, 'ON', '2016-05-22'),
(17, 'Manu', 'manu@gmail.com', 'manu', 9874563215, 'Noida', 13, 2, 'ON', '2016-05-22'),
(18, 'Rahul', 'rahul@gmail.com', 'rahul', 6547893214, 'Gurgoan', 13, 3, 'OFF', '2016-05-22'),
(19, 'Ravi', 'ravi@yahoo.com', 'ravi', 9874123654, 'Shimla', 13, 4, 'ON', '2016-05-22'),
(20, 'Ali', 'ali@gmail.com', 'ali', 7456981236, 'Madras', 14, 6, 'OFF', '2016-05-22'),
(21, 'Sanjay', 'sanjay@gmail.com', 'sanjay', 9874123658, 'Mohali', 15, 7, 'OFF', '2016-05-22'),
(22, 'Himanshu', 'himanshu@yahoo.com', 'himanshu', 6547893214, 'Noida', 15, 8, 'ON', '2016-05-22'),
(23, 'Deepak', 'deepak@gmail.com', 'deepak', 3214569878, 'Manali', 15, 9, 'ON', '2016-05-22'),
(24, 'Jassi', 'jassi@gmail.com', 'jassi', 9876532145, 'Punjab', 15, 10, 'ON', '2016-05-22'),
(25, 'Shavir', 'shavir@gmail.com', 'shavir', 6541239874, 'Phagwara', 16, 11, 'OFF', '2016-05-22'),
(26, 'Sandeep', 'sandeep@yahoo.com', 'sandeep', 9856231478, 'Noida', 16, 12, 'OFF', '2016-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `timeschedule`
--

CREATE TABLE IF NOT EXISTS `timeschedule` (
  `timeschedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(20) DEFAULT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `subject_name` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `date` varchar(40) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`timeschedule_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `timeschedule`
--

INSERT INTO `timeschedule` (`timeschedule_id`, `department_name`, `semester_name`, `subject_name`, `time`, `date`, `teacher_id`) VALUES
(1, '13', '1', '1', '01:00', '2016-12-01', 16),
(2, '13', '2', '2', '02:00', '2016-12-01', 17),
(3, '13', '3', '3', '03:00', '2016-12-01', 18),
(4, '13', '4', '4', '04:00', '2016-12-01', 19),
(5, '14', '6', '6', '02:00', '2016-12-01', 16),
(6, '15', '7', '7', '03:00', '2016-12-02', 16),
(7, '15', '8', '8', '03:00', '2016-12-02', 17),
(8, '16', '11', '11', '10:00', '2016-12-01', 16),
(9, '13', '1', '12', '09:00', '2016-12-02', 16),
(10, '13', '1', '13', '02:00', '2016-11-02', 16),
(11, '13', '1', '14', '04:00', '2016-11-03', 16);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD CONSTRAINT `timeschedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
