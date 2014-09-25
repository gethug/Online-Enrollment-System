-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2014 at 01:48 AM
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
-- Table structure for table `tbldiscount`
--

CREATE TABLE IF NOT EXISTS `tbldiscount` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `d_per` double NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('S001', 'New', 1, 'Jess', 'Navaja', 'Hermosa', 'male', 'Sagbayan, Bohol', 'Tagbilaran City', 'Cebu City', '14.11.1994', 'Filipino', 'Roman Catholic', 'Saint Augustine Institute', '2011-2012', 'Pob. Sagbayan, Bohol', '2014-09-25', '2014-09-25'),
('S002', 'New', 1, 'Jesus', 'Navaja', 'Hermosa', 'male', 'Sagbayan, Bohol', 'Tagbilaran City', 'Cebu City', '14.11.1994', 'Filipino', 'Roman Catholic', 'Saint Augustine Institute', '2011-2012', 'Pob. Sagbayan, Bohol', '2014-09-25', '2014-09-25');

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
-- Table structure for table `tblmisc`
--

CREATE TABLE IF NOT EXISTS `tblmisc` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  `m_fee` double NOT NULL,
  `mandatory` int(10) NOT NULL,
  `lvl_id` int(10) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblmisc`
--

INSERT INTO `tblmisc` (`m_id`, `m_name`, `m_fee`, `mandatory`, `lvl_id`, `updated_at`, `created_at`) VALUES
(3, 'Registration Fee', 500, 0, 1, '2014-09-25', '2014-09-25'),
(4, 'Registration Fee', 500, 0, 2, '2014-09-25', '2014-09-25');

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
(4, 'S001', 'Lito', 'Vitorillo', 'Hermosa', 23, 'College Graduate', 'Post man', 'Roman Catholic', 'Filipino', 9279312518, '2014-09-25', '2014-09-25'),
(5, 'S002', 'Lito', 'Vitorillo', 'Hermosa', 23, 'College Graduate', 'Post man', 'Roman Catholic', 'Filipino', 9678975329, '2014-09-25', '2014-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `tblpymentsched`
--

CREATE TABLE IF NOT EXISTS `tblpymentsched` (
  `sy_id` int(10) NOT NULL,
  `1st` varchar(255) NOT NULL,
  `2nd` varchar(255) NOT NULL,
  `3rd` varchar(255) NOT NULL,
  `4th` varchar(255) NOT NULL,
  `5th` varchar(255) NOT NULL,
  `6th` varchar(255) NOT NULL,
  `7th` varchar(255) NOT NULL,
  `8th` varchar(255) NOT NULL,
  `9th` varchar(255) NOT NULL,
  `10th` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `tblstudfee`
--

CREATE TABLE IF NOT EXISTS `tblstudfee` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `en_id` varchar(255) NOT NULL,
  `m_id` int(10) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `bal` double NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblstudfee`
--

INSERT INTO `tblstudfee` (`f_id`, `en_id`, `m_id`, `m_name`, `bal`, `updated_at`, `created_at`) VALUES
(3, 'S001', 3, 'Registration Fee', 500, '2014-09-25', '2014-09-25'),
(4, 'S002', 3, 'Registration Fee', 500, '2014-09-25', '2014-09-25');

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
  `type_id` int(10) NOT NULL,
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

INSERT INTO `tblteacher` (`t_id`, `type_id`, `fname`, `mname`, `lname`, `degree`, `age`, `gender`, `contact`, `email`, `password`, `updated_at`, `created_at`) VALUES
('S001', 1, 'charmy', '', 'pantyliner', 'aw', 23, 'female', 8054215, 'sdfsdf@asd.com', '$2y$10$XyQyy90p87pTfmIaG9TPCeJGodQ5o77uItLb7/V5IIE2gkvOiOLTu', '2014-09-23', '2014-09-23'),
('T001', 2, 'Jay Mar', '', 'Masibay', 'Computer Science', 25, 'male', 92609524, 'hermosagen@yahoo.com', '$2y$10$Sn56pc/LBi2gqLeLJ9yEq.YxlgUPZ4Ja8sb4PggSgp7DRMXoCrRU.', '2014-09-23', '2014-09-23');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE IF NOT EXISTS `tbltype` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbltype`
--

INSERT INTO `tbltype` (`type_id`, `type`, `updated_at`, `created_at`) VALUES
(1, 'Teacher', '2014-09-23', '2014-09-23'),
(2, 'Cashier', '2014-09-23', '2014-09-23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
