-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 03:25 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adv_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `f_name`, `l_name`, `email`, `password`, `created_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2017-07-31 13:54:44', '2017-07-31 13:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advance`
--

CREATE TABLE IF NOT EXISTS `tbl_advance` (
  `req_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `ttl_adv_lmt` varchar(255) NOT NULL,
  `reqst_amt` varchar(255) NOT NULL,
  `app_adv_amt` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` enum('0','1') NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_advance`
--

INSERT INTO `tbl_advance` (`req_id`, `staff_id`, `ttl_adv_lmt`, `reqst_amt`, `app_adv_amt`, `created_at`, `deleted_at`) VALUES
(3, 9, '-4444', '3444', '1000', '2017-10-09 12:31:15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branch_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`) VALUES
(1, 'Computer'),
(2, 'Civil'),
(3, 'Mechanical'),
(4, 'Electrical'),
(5, 'Electronics & Telecommunication'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE IF NOT EXISTS `tbl_designation` (
  `designation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(255) NOT NULL,
  `advance_limit` varchar(200) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation_name`, `advance_limit`) VALUES
(1, 'Associate', '10000'),
(2, 'Assistant Professor', '15000'),
(3, 'Technical Assistant', '5000'),
(4, 'Lab Assistant', '2000'),
(5, 'Peaun', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `staff_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `branch_id` bigint(20) NOT NULL,
  `designation_id` bigint(20) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `branch_id`, `designation_id`, `f_name`, `l_name`, `email`, `password`, `file_name`, `created_at`, `deleted_at`) VALUES
(9, 1, 2, 'mahesh', 'patil', 'mahesh@gmail.com', '49bb197bec17b7d20b2df6b1f3c3434a', '', '2017-10-09 12:23:57', '2017-10-09 12:23:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
