-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2014 at 09:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbenrollment`
--
CREATE DATABASE IF NOT EXISTS `dbenrollment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbenrollment`;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`a_id`, `Fname`, `Mname`, `Lname`, `user`, `password`, `updated_at`, `created_at`) VALUES
(1, 'Jess', 'Navaja', 'Hermosa', 'admin', '$2y$10$K4PbochHHeXhqocKsdnV9e2MBfJalYsgrZVAcGTRlDPfTt8H07kDW', '2014-08-20', '2014-08-20'),
(2, 'fsff', 'asd', 'sadas', 'decz', '$2y$10$bd6LDXBrzFSBxvdfGWj5YeJC4ZgohFhYQ0wOYAZWWia6N9XhCV6fS', '2014-08-20', '2014-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `tblcashier`
--

CREATE TABLE IF NOT EXISTS `tblcashier` (
  `c_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcashier`
--

INSERT INTO `tblcashier` (`c_id`, `fname`, `mname`, `lname`, `degree`, `age`, `gender`, `contact`, `email`, `password`, `updated_at`, `created_at`) VALUES
('C001', 'Jess', 'Navaja', 'Hermosa', 'Information Technology', 19, 'male', 92609523, 'devz_1011@yahoo.com', '$2y$10$r8S4/DFLgeRj5Qe0KHHVw.rLIRW4ewnqvYX4ARRCLrwnSMQZYChKW', '2014-08-29', '2014-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrolee`
--

CREATE TABLE IF NOT EXISTS `tblenrolee` (
  `en_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lvl_id` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `h_addres` varchar(255) NOT NULL,
  `c_addres` varchar(255) NOT NULL,
  `b_place` varchar(255) NOT NULL,
  `b_date` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `prev_school` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `mail_add` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`en_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenrolee`
--

INSERT INTO `tblenrolee` (`en_id`, `type`, `lvl_id`, `fname`, `mname`, `lname`, `gender`, `h_addres`, `c_addres`, `b_place`, `b_date`, `nationality`, `religion`, `prev_school`, `schoolyear`, `mail_add`, `updated_at`, `created_at`) VALUES
('001', 'Old', 2, 'jess', '', 'hermosa', 'male', 'Sagbayan, Bohol', 'Tagbilaran City', 'Cebu City', '14.11.1994', 'Filipino', 'Roman Catholic', 'Saint Augustine Institute', '2011-2012', 'Pob. Sagbayan, Bohol', '2014-09-21', '2014-09-21'),
('43565876', 'New', 1, 'jyggbhj', 'fcfvy', 'fuyvhjgj', 'male', 'Talibon, Bohol', 'Tagbilaran', 'Bohol', '10.05.2014', 'Filipino', 'Roman Catholic', 'ANS', '2008-2009', 'TAgbilaran', '2014-09-21', '2014-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE IF NOT EXISTS `tbllevel` (
  `lvl_id` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`lvl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`lvl_id`, `level`, `updated_at`, `created_at`) VALUES
(1, 'Grade 2', '2014-08-05', '2014-08-05'),
(2, 'Grade 3', '2014-09-03', '2014-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblparent`
--

CREATE TABLE IF NOT EXISTS `tblparent` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `en_id` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `heda` varchar(255) NOT NULL,
  `occp` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `cell_no` bigint(12) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblparent`
--

INSERT INTO `tblparent` (`p_id`, `en_id`, `f_name`, `m_name`, `l_name`, `age`, `heda`, `occp`, `religion`, `nationality`, `cell_no`, `updated_at`, `created_at`) VALUES
(4, '43565876', 'Celsa', 'evardo', 'Lasutan', 21, 'High School', 'sewer', 'roman catholic', 'filipino', 9489956294, '2014-09-21', '2014-09-21'),
(5, '001', 'Lito', 'Vitorillo', 'Hermosa', 52, 'College Graduate', 'Post man', 'Roman Catholic', 'Filipino', 9092609523, '2014-09-21', '2014-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tblrooms`
--

CREATE TABLE IF NOT EXISTS `tblrooms` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblrooms`
--

INSERT INTO `tblrooms` (`r_id`, `room`, `updated_at`, `created_at`) VALUES
(1, 'Rm 301', '2014-08-20', '2014-08-20'),
(2, 'Rm 302', '2014-09-15', '2014-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblsched`
--

CREATE TABLE IF NOT EXISTS `tblsched` (
  `sched_id` int(10) NOT NULL AUTO_INCREMENT,
  `sec_id` int(10) NOT NULL,
  `lvl_id` int(10) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `t_id` varchar(255) NOT NULL,
  `r_id` int(10) NOT NULL,
  `sy_id` int(10) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tblsched`
--

INSERT INTO `tblsched` (`sched_id`, `sec_id`, `lvl_id`, `s_id`, `start`, `end`, `day`, `t_id`, `r_id`, `sy_id`, `updated_at`, `created_at`) VALUES
(32, 1, 1, 'S001', '3:00 PM', '4:00 PM', 'M,T,W,TH,F,S,', 'T001', 1, 4, '2014-09-03', '2014-09-03'),
(42, 1, 1, 'S001', '11:30 AM', '12:30 PM', 'M,T,W,TH,F,S,', 'T001', 1, 4, '2014-09-15', '2014-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE IF NOT EXISTS `tblschoolyear` (
  `sy_id` int(10) NOT NULL AUTO_INCREMENT,
  `start` int(10) NOT NULL,
  `end` int(10) NOT NULL,
  `Active` int(10) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`sy_id`, `start`, `end`, `Active`, `updated_at`, `created_at`) VALUES
(1, 2005, 2006, 0, '2014-09-02', '2014-09-02'),
(3, 2007, 2008, 0, '2014-09-03', '2014-09-02'),
(4, 2008, 2009, 1, '2014-09-03', '2014-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tblsections`
--

CREATE TABLE IF NOT EXISTS `tblsections` (
  `sec_id` int(10) NOT NULL AUTO_INCREMENT,
  `lvl_id` int(10) NOT NULL,
  `section` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblsections`
--

INSERT INTO `tblsections` (`sec_id`, `lvl_id`, `section`, `updated_at`, `created_at`) VALUES
(1, 1, 'Marco', '2014-08-20', '2014-08-20'),
(2, 1, 'Taray', '2014-08-20', '2014-08-20'),
(3, 1, 'daf', '2014-09-01', '2014-09-01'),
(4, 2, 'Pancito', '2014-09-03', '2014-09-03'),
(5, 2, 'Lasutan', '2014-09-03', '2014-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE IF NOT EXISTS `tblsubject` (
  `s_id` varchar(255) NOT NULL,
  `lvl_id` int(10) NOT NULL,
  `subj_code` varchar(255) NOT NULL,
  `subj_name` varchar(255) NOT NULL,
  `unit` int(10) NOT NULL,
  `prerequisite` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`s_id`, `lvl_id`, `subj_code`, `subj_name`, `unit`, `prerequisite`, `cost`, `updated_at`, `created_at`) VALUES
('786767', 2, '87868', 'asds', 3, 'none', 99, '2014-08-20', '2014-08-20'),
('S001', 1, 'PHILGOV', 'Philippine Government', 3, 'none', 5000, '2014-08-20', '2014-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE IF NOT EXISTS `tblteacher` (
  `t_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`t_id`, `fname`, `mname`, `lname`, `degree`, `age`, `gender`, `contact`, `email`, `password`, `updated_at`, `created_at`) VALUES
('asweqwe', 'maricar', 'e', 'budiongan', 'BSIT', 18, 'female', 333, 'sdsd@yahoo.com', '$2y$10$6Ow1NBNIbeKlhf/9MU7DwOcVNr5s.1GGhdvjEpiveOGCts6RTJnWO', '2014-08-20', '2014-08-20'),
('T001', 'Marco', '', 'Budiongan', 'Information Technology', 18, 'male', 92609523, 'hermosagen@yahoo.com', '$2y$10$RPPQ784MH7URlM8PweMeD.hGlCPYi9adZuiF/FJkTCJem2nEtB9.a', '2014-08-20', '2014-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbltuition`
--

CREATE TABLE IF NOT EXISTS `tbltuition` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `lvl_id` int(10) NOT NULL,
  `tuition` double NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`tu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltuition`
--

INSERT INTO `tbltuition` (`tu_id`, `lvl_id`, `tuition`, `updated_at`, `created_at`) VALUES
(1, 1, 5000, '2014-08-22', '2014-08-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
