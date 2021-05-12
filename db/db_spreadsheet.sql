-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 05:47 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spreadsheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_export_log`
--

CREATE TABLE `tbl_export_log` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `rows` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_export_log`
--

INSERT INTO `tbl_export_log` (`id`, `file_name`, `rows`, `user`, `date`, `time`) VALUES
(5, 'Launchpad_20180727_nec', 3, 'kyle', '2018-07-27 (Friday)', '03:37:19am'),
(6, 'Launchpad_20180728_equipment', 4, 'maria', '2018-07-28 (Saturday)', '02:17:35am'),
(7, 'Launchpad_20180730_*_', 12, 'kyle', '2018-07-30 (Monday)', '09:39:18pm'),
(8, 'Launchpad_20180802_stores_ny', 4, 'kyle', '2018-08-02 (Thursday)', '04:42:17am'),
(9, 'Launchpad_20190410__ny', 5, 'kyle', '2019-04-10 (Wednesday)', '11:40:46pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_log`
--

CREATE TABLE `tbl_login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `event` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login_log`
--

INSERT INTO `tbl_login_log` (`id`, `username`, `date`, `time`, `event`) VALUES
(1, 'superadmin1', '2018-07-27 (Friday)', '04:08:51am', 'IN'),
(2, 'superadmin1', '2018-07-27 (Friday)', '04:10:15am', 'OUT'),
(3, 'kyle', '2018-07-27 (Friday)', '04:10:24am', 'IN'),
(4, 'kyle', '2018-07-27 (Friday)', '04:12:17am', 'OUT'),
(5, 'superadmin1', '2018-07-27 (Friday)', '04:13:17am', 'IN'),
(6, 'superadmin1', '2018-07-27 (Friday)', '05:43:55am', 'OUT'),
(7, 'maria', '2018-07-27 (Friday)', '05:44:02am', 'IN'),
(8, 'maria', '2018-07-27 (Friday)', '05:44:08am', 'OUT'),
(9, 'kyle', '2018-07-27 (Friday)', '05:44:15am', 'IN'),
(10, 'kyle', '2018-07-27 (Friday)', '05:44:20am', 'OUT'),
(11, 'maria', '2018-07-27 (Friday)', '05:44:28am', 'IN'),
(12, 'maria', '2018-07-27 (Friday)', '05:44:34am', 'OUT'),
(13, 'superadmin1', '2018-07-27 (Friday)', '05:44:41am', 'IN'),
(14, 'superadmin1', '2018-07-27 (Friday)', '05:51:56am', 'OUT'),
(15, 'kyle', '2018-07-27 (Friday)', '05:52:04am', 'IN'),
(16, 'superadmin1', '2018-07-27 (Friday)', '11:21:26pm', 'IN'),
(17, 'superadmin1', '2018-07-27 (Friday)', '11:23:50pm', 'OUT'),
(18, 'kyle', '2018-07-27 (Friday)', '11:53:27pm', 'IN'),
(19, 'kyle', '2018-07-28 (Saturday)', '01:21:20am', 'OUT'),
(20, 'kyle', '2018-07-28 (Saturday)', '01:21:29am', 'IN'),
(21, 'kyle', '2018-07-28 (Saturday)', '01:39:42am', 'OUT'),
(22, 'superadmin1', '2018-07-28 (Saturday)', '01:40:03am', 'IN'),
(23, 'superadmin1', '2018-07-28 (Saturday)', '01:42:28am', 'OUT'),
(24, 'u111', '2018-07-28 (Saturday)', '01:42:53am', 'IN'),
(25, 'u111', '2018-07-28 (Saturday)', '01:43:04am', 'OUT'),
(26, 'superadmin1', '2018-07-28 (Saturday)', '01:43:51am', 'IN'),
(27, 'superadmin1', '2018-07-28 (Saturday)', '01:44:07am', 'OUT'),
(28, 'maria', '2018-07-28 (Saturday)', '01:44:14am', 'IN'),
(29, 'maria', '2018-07-28 (Saturday)', '01:44:55am', 'OUT'),
(30, 'u111', '2018-07-28 (Saturday)', '01:45:04am', 'IN'),
(31, 'u111', '2018-07-28 (Saturday)', '01:51:14am', 'OUT'),
(32, 'superadmin1', '2018-07-28 (Saturday)', '01:51:32am', 'IN'),
(33, 'superadmin1', '2018-07-28 (Saturday)', '02:03:53am', 'OUT'),
(34, 'maria', '2018-07-28 (Saturday)', '02:04:25am', 'IN'),
(35, 'maria', '2018-07-28 (Saturday)', '02:06:31am', 'OUT'),
(36, 'u111', '2018-07-28 (Saturday)', '02:06:37am', 'IN'),
(37, 'u111', '2018-07-28 (Saturday)', '02:12:42am', 'OUT'),
(38, 'maria', '2018-07-28 (Saturday)', '02:12:48am', 'IN'),
(39, 'kyle', '2018-07-28 (Saturday)', '04:22:32am', 'IN'),
(40, 'kyle', '2018-07-28 (Saturday)', '05:42:21am', 'OUT'),
(41, 'kyle', '2018-07-28 (Saturday)', '05:42:56am', 'IN'),
(42, 'kyle', '2018-07-28 (Saturday)', '06:27:21am', 'OUT'),
(43, 'maria', '2018-07-28 (Saturday)', '06:27:29am', 'IN'),
(44, 'maria', '2018-07-28 (Saturday)', '06:27:48am', 'OUT'),
(45, 'u111', '2018-07-28 (Saturday)', '06:28:24am', 'IN'),
(46, 'u111', '2018-07-28 (Saturday)', '06:31:07am', 'OUT'),
(47, 'kyle', '2018-07-28 (Saturday)', '06:31:25am', 'IN'),
(48, 'u111', '2018-07-28 (Saturday)', '06:32:22am', 'IN'),
(49, 'u111', '2018-07-28 (Saturday)', '07:16:54am', 'OUT'),
(50, 'kyle', '2018-07-28 (Saturday)', '07:19:27am', 'IN'),
(51, 'kyle', '2018-07-28 (Saturday)', '07:19:47am', 'OUT'),
(52, 'superadmin1', '2018-07-28 (Saturday)', '07:20:08am', 'IN'),
(53, 'kyle', '2018-07-30 (Monday)', '09:14:43pm', 'IN'),
(54, 'kyle', '2018-07-30 (Monday)', '09:16:13pm', 'OUT'),
(55, 'superadmin1', '2018-07-30 (Monday)', '09:16:38pm', 'IN'),
(56, 'superadmin1', '2018-07-30 (Monday)', '09:31:09pm', 'OUT'),
(57, 'kim', '2018-07-30 (Monday)', '09:31:23pm', 'IN'),
(58, 'kim', '2018-07-30 (Monday)', '09:31:31pm', 'OUT'),
(59, 'kyle', '2018-07-30 (Monday)', '09:31:40pm', 'IN'),
(60, 'kyle', '2018-07-30 (Monday)', '09:32:00pm', 'OUT'),
(61, 'kim', '2018-07-30 (Monday)', '09:32:14pm', 'IN'),
(62, 'kim', '2018-07-30 (Monday)', '09:34:58pm', 'OUT'),
(63, 'kyle', '2018-07-30 (Monday)', '09:35:10pm', 'IN'),
(64, 'kyle', '2018-07-30 (Monday)', '09:36:56pm', 'OUT'),
(65, 'kim', '2018-07-30 (Monday)', '09:37:15pm', 'IN'),
(66, 'kim', '2018-07-30 (Monday)', '09:37:56pm', 'OUT'),
(67, 'kyle', '2018-07-30 (Monday)', '09:38:02pm', 'IN'),
(68, 'kyle', '2018-07-30 (Monday)', '09:41:04pm', 'OUT'),
(69, 'kim', '2018-07-30 (Monday)', '09:41:11pm', 'IN'),
(70, 'kim', '2018-07-30 (Monday)', '09:47:54pm', 'OUT'),
(71, 'kim', '2018-07-30 (Monday)', '09:53:32pm', 'IN'),
(72, 'kim', '2018-07-30 (Monday)', '09:57:21pm', 'OUT'),
(73, 'kyle', '2018-07-30 (Monday)', '09:57:26pm', 'IN'),
(74, 'kyle', '2018-07-30 (Monday)', '10:06:38pm', 'OUT'),
(75, 'kim', '2018-07-30 (Monday)', '10:06:43pm', 'IN'),
(76, 'kim', '2018-07-30 (Monday)', '10:07:11pm', 'OUT'),
(77, 'kyle', '2018-07-30 (Monday)', '10:07:15pm', 'IN'),
(78, 'kyle', '2018-07-30 (Monday)', '10:41:37pm', 'OUT'),
(79, 'superadmin1', '2018-07-30 (Monday)', '10:41:54pm', 'IN'),
(80, 'superadmin1', '2018-07-30 (Monday)', '10:47:52pm', 'OUT'),
(81, 'kyle', '2018-07-30 (Monday)', '11:56:05pm', 'IN'),
(82, 'kyle', '2018-07-30 (Monday)', '11:57:47pm', 'OUT'),
(83, 'kim', '2018-07-30 (Monday)', '11:57:52pm', 'IN'),
(84, 'kim', '2018-07-31 (Tuesday)', '12:02:06am', 'OUT'),
(85, 'kyle', '2018-07-31 (Tuesday)', '12:02:10am', 'IN'),
(86, 'kyle', '2018-07-31 (Tuesday)', '12:08:56am', 'OUT'),
(87, 'superadmin1', '2018-07-31 (Tuesday)', '12:09:03am', 'IN'),
(88, 'superadmin1', '2018-07-31 (Tuesday)', '12:11:41am', 'OUT'),
(89, 'kyle', '2018-07-31 (Tuesday)', '12:11:49am', 'IN'),
(90, 'kyle', '2018-08-01 (Wednesday)', '09:02:56pm', 'IN'),
(91, 'kyle', '2018-08-01 (Wednesday)', '10:12:16pm', 'OUT'),
(92, 'superadmin1', '2018-08-01 (Wednesday)', '10:12:23pm', 'IN'),
(93, 'superadmin1', '2018-08-01 (Wednesday)', '10:17:45pm', 'OUT'),
(94, 'superadmin1', '2018-08-01 (Wednesday)', '10:22:51pm', 'IN'),
(95, 'superadmin1', '2018-08-01 (Wednesday)', '11:07:28pm', 'OUT'),
(96, 'kyle', '2018-08-01 (Wednesday)', '11:07:38pm', 'IN'),
(97, 'kyle', '2018-08-01 (Wednesday)', '11:37:50pm', 'OUT'),
(98, 'kyle', '2018-08-01 (Wednesday)', '11:37:56pm', 'IN'),
(99, 'kyle', '2018-08-01 (Wednesday)', '11:38:03pm', 'OUT'),
(100, 'superadmin1', '2018-08-01 (Wednesday)', '11:38:12pm', 'IN'),
(101, 'superadmin1', '2018-08-02 (Thursday)', '12:13:05am', 'OUT'),
(102, 'kyle', '2018-08-02 (Thursday)', '12:13:10am', 'IN'),
(103, 'kyle', '2018-08-02 (Thursday)', '12:19:04am', 'OUT'),
(104, 'superadmin1', '2018-08-02 (Thursday)', '12:19:12am', 'IN'),
(105, 'superadmin1', '2018-08-02 (Thursday)', '12:20:05am', 'OUT'),
(106, 'kyle', '2018-08-02 (Thursday)', '12:20:08am', 'IN'),
(107, 'kyle', '2018-08-02 (Thursday)', '01:24:58am', 'OUT'),
(108, 'superadmin1', '2018-08-02 (Thursday)', '01:25:07am', 'IN'),
(109, 'superadmin1', '2018-08-02 (Thursday)', '01:35:04am', 'OUT'),
(110, 'kim', '2018-08-02 (Thursday)', '01:35:12am', 'IN'),
(111, 'kim', '2018-08-02 (Thursday)', '01:36:37am', 'OUT'),
(112, 'kyle', '2018-08-02 (Thursday)', '01:36:40am', 'IN'),
(113, 'kyle', '2018-08-02 (Thursday)', '02:03:09am', 'OUT'),
(114, 'kyle', '2018-08-02 (Thursday)', '02:03:19am', 'IN'),
(115, 'kyle', '2018-08-02 (Thursday)', '02:06:12am', 'OUT'),
(116, 'superadmin1', '2018-08-02 (Thursday)', '02:06:20am', 'IN'),
(117, 'superadmin1', '2018-08-02 (Thursday)', '02:06:58am', 'OUT'),
(118, 'kyle', '2018-08-02 (Thursday)', '02:07:03am', 'IN'),
(119, 'kyle', '2018-08-02 (Thursday)', '04:34:14am', 'OUT'),
(120, 'kim', '2018-08-02 (Thursday)', '04:35:42am', 'IN'),
(121, 'kim', '2018-08-02 (Thursday)', '04:37:21am', 'OUT'),
(122, 'kyle', '2018-08-02 (Thursday)', '04:37:29am', 'IN'),
(123, 'kyle', '2018-08-02 (Thursday)', '05:27:38am', 'OUT'),
(124, 'ryan', '2018-08-02 (Thursday)', '05:27:58am', 'IN'),
(125, 'ryan', '2018-08-02 (Thursday)', '05:29:50am', 'OUT'),
(126, 'kyle', '2018-08-02 (Thursday)', '05:30:23am', 'IN'),
(127, 'kyle', '2018-08-02 (Thursday)', '05:44:38am', 'OUT'),
(128, 'kim', '2018-08-02 (Thursday)', '05:44:50am', 'IN'),
(129, 'kim', '2018-08-02 (Thursday)', '05:48:16am', 'OUT'),
(130, 'kyle', '2018-08-02 (Thursday)', '05:48:34am', 'IN'),
(131, 'kyle', '2018-08-02 (Thursday)', '06:00:01am', 'OUT'),
(132, 'ryan', '2018-08-02 (Thursday)', '06:00:07am', 'IN'),
(133, 'ryan', '2018-08-02 (Thursday)', '06:05:54am', 'OUT'),
(134, 'kyle', '2018-08-02 (Thursday)', '06:06:03am', 'IN'),
(135, 'kyle', '2018-08-02 (Thursday)', '06:09:50am', 'OUT'),
(136, 'ryan', '2018-08-02 (Thursday)', '06:09:56am', 'IN'),
(137, 'ryan', '2018-08-02 (Thursday)', '06:10:10am', 'OUT'),
(138, 'kyle', '2018-08-02 (Thursday)', '06:10:13am', 'IN'),
(139, 'kyle', '2018-08-02 (Thursday)', '06:10:22am', 'OUT'),
(140, 'migz', '2018-08-02 (Thursday)', '06:10:28am', 'IN'),
(141, 'migz', '2018-08-02 (Thursday)', '06:12:01am', 'OUT'),
(142, 'kyle', '2018-08-02 (Thursday)', '06:12:04am', 'IN'),
(143, 'kyle', '2018-08-02 (Thursday)', '06:31:33am', 'OUT'),
(144, 'ryan', '2018-08-02 (Thursday)', '06:31:38am', 'IN'),
(145, 'ryan', '2018-08-02 (Thursday)', '06:35:35am', 'OUT'),
(146, 'kyle', '2018-08-02 (Thursday)', '06:35:39am', 'IN'),
(147, 'kyle', '2018-08-02 (Thursday)', '06:37:02am', 'OUT'),
(148, 'kim', '2018-08-02 (Thursday)', '06:37:12am', 'IN'),
(149, 'kim', '2018-08-02 (Thursday)', '06:37:51am', 'OUT'),
(150, 'kyle', '2018-08-02 (Thursday)', '06:37:54am', 'IN'),
(151, 'kyle', '2018-08-03 (Friday)', '05:14:11am', 'IN'),
(152, 'kyle', '2018-10-10 (Wednesday)', '03:53:34am', 'IN'),
(153, 'kyle', '2018-10-11 (Thursday)', '07:00:44am', 'IN'),
(154, 'kyle', '2018-10-11 (Thursday)', '07:01:05am', 'OUT'),
(155, 'kyle', '2019-01-31 (Thursday)', '01:42:43am', 'IN'),
(156, 'kyle', '2019-03-03 (Sunday)', '12:17:33am', 'IN'),
(157, 'kyle', '2019-03-03 (Sunday)', '12:18:41am', 'OUT'),
(158, 'kyle', '2019-03-03 (Sunday)', '12:18:45am', 'IN'),
(159, 'kyle', '2019-03-03 (Sunday)', '09:55:29pm', 'IN'),
(160, 'kyle', '2019-03-03 (Sunday)', '10:21:17pm', 'IN'),
(161, 'kyle', '2019-04-10 (Wednesday)', '03:53:57pm', 'IN'),
(162, 'kyle', '2019-04-10 (Wednesday)', '04:05:30pm', 'OUT'),
(163, 'kyle', '2019-04-10 (Wednesday)', '04:06:12pm', 'IN'),
(164, 'kyle', '2019-04-10 (Wednesday)', '10:50:29pm', 'IN'),
(165, 'kyle', '2019-04-10 (Wednesday)', '11:01:18pm', 'OUT'),
(166, 'kyle', '2019-04-10 (Wednesday)', '11:10:58pm', 'IN'),
(167, 'kyle', '2019-04-10 (Wednesday)', '11:13:21pm', 'OUT'),
(168, 'kyle', '2019-04-10 (Wednesday)', '11:13:31pm', 'IN'),
(169, 'kyle', '2019-04-10 (Wednesday)', '11:14:22pm', 'OUT'),
(170, 'kyle', '2019-04-10 (Wednesday)', '11:18:22pm', 'IN'),
(171, 'kyle', '2019-04-10 (Wednesday)', '11:19:08pm', 'OUT'),
(172, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:19:22pm', 'IN'),
(173, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:22:11pm', 'OUT'),
(174, 'kyle', '2019-04-10 (Wednesday)', '11:22:21pm', 'IN'),
(175, 'kyle', '2019-04-10 (Wednesday)', '11:33:51pm', 'OUT'),
(176, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:33:58pm', 'IN'),
(177, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:34:54pm', 'OUT'),
(178, 'kyle', '2019-04-10 (Wednesday)', '11:35:59pm', 'IN'),
(179, 'kyle', '2019-04-10 (Wednesday)', '11:36:09pm', 'OUT'),
(180, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:36:13pm', 'IN'),
(181, 'kyle_nurville', '2019-04-10 (Wednesday)', '11:37:35pm', 'OUT'),
(182, 'kyle', '2019-04-10 (Wednesday)', '11:37:39pm', 'IN'),
(183, 'kyle', '2019-04-10 (Wednesday)', '11:38:08pm', 'OUT'),
(184, 'ryan', '2019-04-10 (Wednesday)', '11:38:10pm', 'IN'),
(185, 'ryan', '2019-04-10 (Wednesday)', '11:39:09pm', 'OUT'),
(186, 'kyle', '2019-04-10 (Wednesday)', '11:39:12pm', 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main`
--

CREATE TABLE `tbl_main` (
  `id` int(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_county` varchar(255) DEFAULT NULL,
  `address_area` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_state` varchar(255) DEFAULT NULL,
  `address_zip` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `sic_code` varchar(255) DEFAULT NULL,
  `naics_code` varchar(255) DEFAULT NULL,
  `employee_size` varchar(255) DEFAULT NULL,
  `annual_revenue` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone_number2` varchar(255) DEFAULT NULL,
  `extension_number` varchar(255) DEFAULT NULL,
  `direct_line` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `dm_verified` varchar(255) DEFAULT NULL,
  `prof_completed` varchar(255) DEFAULT NULL,
  `mobile_number2` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'Admin',
  `isQualified` int(11) DEFAULT NULL,
  `isEdited` date DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main`
--

INSERT INTO `tbl_main` (`id`, `status`, `phone_number`, `job_title`, `first_name`, `last_name`, `address`, `address_county`, `address_area`, `address_city`, `address_state`, `address_zip`, `company_name`, `industry`, `sic_code`, `naics_code`, `employee_size`, `annual_revenue`, `website`, `phone_number2`, `extension_number`, `direct_line`, `email`, `mobile_number`, `comment`, `dm_verified`, `prof_completed`, `mobile_number2`, `username`, `isQualified`, `isEdited`, `file_name`) VALUES
(1, 'VM', '2012272506', 'Vice President', 'Hugh', 'Peters', NULL, NULL, NULL, 'Englewood cliffs', 'NJ', NULL, 'Unilever', 'Department Stores', NULL, NULL, NULL, NULL, NULL, '2012272506', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', 1, '2019-04-10', 'sampleup1.xlsx'),
(2, 'N', '2012277105', 'Owner', 'Ben Friedman', NULL, NULL, NULL, NULL, 'Englewood', 'NJ', NULL, 'Riviera Produce Corp', 'Groceries, General Line', NULL, NULL, NULL, NULL, NULL, '2012277105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(3, 'NTAVL', '2013371240', 'President', 'Glenn', 'Kucera', NULL, NULL, NULL, 'Oakland', 'NJ', NULL, 'Titan Tool Inc', 'Special Dies, Tools, Jigs, And Fixtures', NULL, NULL, NULL, NULL, NULL, '2013371240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, '2019-04-10', 'sampleup1.xlsx'),
(4, 'NTAVL', '2013689191', 'Chief Executive Officer', 'Jack Forbes', NULL, NULL, NULL, NULL, 'Paramus', 'NJ', NULL, 'Nielsen & Bainbridge Llc', 'Wood Products, Nec', NULL, NULL, NULL, NULL, NULL, '2013689191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(5, 'NTAVL', '2014381300', 'Owner', 'Paul Cardea', NULL, NULL, NULL, NULL, 'Carlstadt', 'NJ', NULL, 'H. Betti Industries, Inc.', 'Commercial Equipment, Nec', NULL, NULL, NULL, NULL, NULL, '2014381300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(6, 'VM', '2014388150', 'President', 'Laurence Gunstein', NULL, NULL, NULL, NULL, 'Lyndhurst', 'NJ', NULL, 'Citizen Watch Company Of America Inc.', 'Jewelry And Precious Stones', NULL, NULL, NULL, NULL, NULL, '2014388150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(7, 'NTAVL', '2014402500', 'Chief Executive Officer', 'Anthony', 'Crupi', NULL, NULL, NULL, 'Elmwood park', 'NJ', NULL, 'AGFA Corporation ', 'Photographic Equipment And Supplies', NULL, NULL, NULL, NULL, NULL, '2014402500', NULL, NULL, NULL, NULL, 'no name notransfer. No Anthony Crupi in here', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(8, 'NTAVL', '2014405000', 'Coo', 'Maxime', 'Angelucci', NULL, NULL, NULL, 'South hackensack', 'NJ', NULL, 'Naturex Inc', 'Flavoring Extracts And Syrups, Nec', NULL, NULL, NULL, NULL, NULL, '2014405000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', 1, '2019-04-10', 'sampleup1.xlsx'),
(9, 'NTAVL', '2014405585', 'President', 'Elliott Ward', NULL, NULL, NULL, NULL, 'South hackensack', 'NJ', NULL, 'Bind-Rite Services Inc', 'Bookbinding And Related Work', NULL, NULL, NULL, NULL, NULL, '2014405585', NULL, NULL, NULL, NULL, 'not available', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(10, 'NTAVL', '2014470200', 'President', 'Michael', 'Rasovic', NULL, NULL, NULL, 'Waldwick', 'NJ', NULL, 'Koellmann Gear Corp', 'Speed Changers, Drives, And Gears', NULL, NULL, NULL, NULL, NULL, '2014470200', NULL, NULL, NULL, NULL, 'wants to be remove on our calling list', NULL, NULL, NULL, 'ryan', NULL, '2019-04-10', 'sampleup1.xlsx'),
(11, 'NTAVL', '2015180033', 'Ceo', 'Yaron Ravkaie', NULL, NULL, NULL, NULL, 'Paramus', 'NJ', NULL, 'Radcom', 'Computer Peripheral Equipment, Nec', NULL, NULL, NULL, NULL, NULL, '2015180033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(12, 'NTAVL', '2015494200', 'Coo', 'David', 'Sarfati', NULL, NULL, NULL, 'Secaucus', 'NJ', NULL, 'Sarkli Repchage Ltd', 'Toilet Preparations', NULL, NULL, NULL, NULL, NULL, '2015494200', NULL, NULL, 'robert@repchage.com', NULL, 'send info to robert@repchage.com, call back next week for Robert', NULL, NULL, NULL, 'ryan', 1, '2019-04-10', 'sampleup1.xlsx'),
(13, 'N', '2015531848', 'President', 'Tristan', 'Vogel', NULL, NULL, NULL, 'North bergen', 'NJ', NULL, 'Metro Web Corp', 'Bookbinding And Related Work', NULL, NULL, NULL, NULL, NULL, '2015531848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, '2019-04-10', 'sampleup1.xlsx'),
(14, 'NTAVL', '2015531850', 'President', 'David Balik', NULL, NULL, NULL, NULL, 'Secaucus', 'NJ', NULL, 'General Glass International Corp', 'Concrete Products, Nec', NULL, NULL, NULL, NULL, NULL, '2015531850', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(15, 'VM', '2015591000', 'President', 'Frank D Chang', NULL, NULL, NULL, NULL, 'Secaucus', 'NJ', NULL, 'Zt Systems', 'Computers, Peripherals, And Software', NULL, NULL, NULL, NULL, NULL, '2015591000', NULL, NULL, NULL, NULL, 'try back for the IT Manager', 'No', 'No', NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(16, 'VM', '2015730600', 'Vice President', 'Harald Henn', NULL, NULL, NULL, NULL, 'Montvale', 'NJ', NULL, 'Mercedes Benz Usa Llc', 'Motor Vehicles And Car Bodies', NULL, NULL, NULL, NULL, NULL, '2015730600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(17, 'VM', '2015739600', 'Vice President', 'Bruce E Zeh', NULL, NULL, NULL, NULL, 'Montvale', 'NJ', NULL, 'Benjamin Moore & Co', 'Paints And Allied Products', NULL, NULL, NULL, NULL, NULL, '2015739600', NULL, NULL, NULL, NULL, 'must enter 4 digit extension number', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(18, 'NTAVL', '2015928800', 'Vice President', 'Debbie Greene', NULL, NULL, NULL, NULL, 'Englewood cliffs', 'NJ', NULL, 'Golick Martins Inc', 'Groceries, General Line', NULL, NULL, NULL, NULL, NULL, '2015928800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(19, 'NTAVL', '2016347400', 'Vice President', 'Anthony Dibisceglie', NULL, NULL, NULL, NULL, 'New milford', 'NJ', NULL, 'Curtis Circulation Co', 'Books, Periodicals, And Newspapers', NULL, NULL, NULL, NULL, NULL, '2016347400', NULL, NULL, NULL, NULL, 'n/a', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(20, 'VM', '2016416500', 'President', 'Andrew Mair', NULL, NULL, NULL, NULL, 'Little ferry', 'NJ', NULL, 'Doka Usa Ltd', 'Brick, Stone, And Related Material', NULL, NULL, NULL, NULL, NULL, '2016416500', NULL, NULL, NULL, NULL, 'vm reached', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(21, 'NTAVL', '2016417900', 'President', 'Bernard', 'Davella', NULL, NULL, NULL, 'Ridgefield pk', 'NJ', NULL, 'The Gallery Collection', 'Miscellaneous Retail Stores, Nec', NULL, NULL, NULL, NULL, NULL, '2016417900', '238', NULL, NULL, NULL, 'call back in an hour', NULL, NULL, NULL, 'ryan', 1, '2019-04-10', 'sampleup1.xlsx'),
(22, 'NTAVL', '2016511000', 'Chief Executive Officer', 'Duke', 'Harbernickel', NULL, NULL, NULL, 'Oakland', 'NJ', NULL, 'Haband Co Inc', 'Family Clothing Stores', NULL, NULL, NULL, NULL, NULL, '2016511000', NULL, NULL, NULL, NULL, 'reached voicemail', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(23, 'NTAVL', '2016593671', 'Owner', 'Lisa Valastro', NULL, NULL, NULL, NULL, 'Hoboken', 'NJ', NULL, 'Carlos City Hall Bake Shop', 'Retail Bakeries', NULL, NULL, NULL, NULL, NULL, '2016593671', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(24, 'NTAVL', '2017674234', 'President', 'Francois Bes De Berc', NULL, NULL, NULL, NULL, 'Northvale', 'NJ', NULL, 'Nassau Lens', 'Ophthalmic Goods', NULL, NULL, NULL, NULL, NULL, '2017674234', NULL, NULL, NULL, NULL, 'keeps on ringing', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(25, 'N', '2017682400', 'Vice President', 'Fred F Campagna', NULL, NULL, NULL, NULL, 'Northvale', 'NJ', NULL, 'Aerco International Inc', 'Fabricated Plate Work (Boiler Shop)', NULL, NULL, NULL, NULL, NULL, '2017682400', NULL, NULL, NULL, NULL, 'no one is answering', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(26, 'NTAVL', '2017848200', 'President', 'Mike Todd', NULL, NULL, NULL, NULL, 'Northvale', 'NJ', NULL, 'Todd Todd Inc', 'Medical And Hospital Equipment', NULL, NULL, NULL, NULL, NULL, '2017848200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(27, 'NTAVL', '2017851414', 'Chief Operating Officer', 'Jeffrey Tseng', NULL, NULL, NULL, NULL, 'Woodland park', 'NJ', NULL, 'Century Bat Works Inc', 'Products Of Purchased Glass', NULL, NULL, NULL, NULL, NULL, '2017851414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(28, 'NTAVL', '2018046200', 'President', 'Rob Bruinsma', NULL, NULL, NULL, NULL, 'Lyndhurst', 'NJ', NULL, 'Argo Turboserve Corporation', 'Industrial Machinery And Equipment', NULL, NULL, NULL, NULL, NULL, '2018046200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(29, 'NTAVL', '2018250300', 'Vice President', 'Wd Turner', NULL, NULL, NULL, NULL, 'Ramsey', 'NJ', NULL, 'Okonite Co', 'Electrical Apparatus And Equipment', NULL, NULL, NULL, NULL, NULL, '2018250300', NULL, NULL, NULL, NULL, 'n/a', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(30, 'NTAVL', '2018371493', 'President', 'Matthew', 'Schwartz', NULL, NULL, NULL, 'Teaneck', 'NJ', NULL, 'Aetrex Worldwide', 'Surgical Appliances And Supplies', NULL, NULL, NULL, NULL, NULL, '2018371493', NULL, NULL, NULL, NULL, 'no answer', NULL, NULL, NULL, 'ryan', NULL, '2019-04-10', 'sampleup1.xlsx'),
(31, 'NTAVL', '2018642000', 'President', 'Elliot', 'Betesh', NULL, NULL, NULL, 'New york', 'NY', NULL, 'Dr Jays Inc', 'Mens And Boys Clothing Stores', NULL, NULL, NULL, NULL, NULL, '2018642000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-REMOVED-', 2, '2018-08-02', 'sampleup1.xlsx'),
(32, 'NTAVL', '2032378421', 'President', 'Len Suzio', NULL, NULL, NULL, NULL, 'Meriden', 'CT', NULL, 'L Suzio Asphalt Co Inc', 'Brick, Stone, And Related Material', NULL, NULL, NULL, NULL, NULL, '2032378421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(33, 'NTAVL', '2033022800', 'Owner', 'Marc Fisher', NULL, NULL, NULL, NULL, 'Greenwich', 'CT', NULL, 'Marc Fisher Llc', 'Shoe Stores', NULL, NULL, NULL, NULL, NULL, '2033022800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(34, 'NTAVL', '2033341212', 'Chief Executive Officer', 'Cynthia Bigelow', NULL, NULL, NULL, NULL, 'Fairfield', 'CT', NULL, 'Bigelow Tea', 'Food Preparations, Nec', NULL, NULL, NULL, NULL, NULL, '2033341212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(35, 'NTAVL', '2033345532', 'Chief Executive Officer', 'Roy Friedman', NULL, NULL, NULL, NULL, 'Bridgeport', 'CT', NULL, 'Standard Oil Of Connecticut', 'Fuel Oil Dealers', NULL, NULL, NULL, NULL, NULL, '2033345532', NULL, NULL, NULL, NULL, 'left contact info', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(36, 'NTAVL', '2033664884', 'Owner', 'Jan D Unger', NULL, NULL, NULL, NULL, 'Bridgeport', 'CT', NULL, 'Unger Coggswell Properties Llc', 'Hand And Edge Tools, Nec', NULL, NULL, NULL, NULL, NULL, '2033664884', NULL, NULL, NULL, NULL, 'vm reached', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(37, 'NTAVL', '2033678675', 'Chief Operating Officer', 'Newman M Marsilius', NULL, NULL, NULL, NULL, 'Bridgeport', 'CT', NULL, 'Pmt Group', 'Machine Tools, Metal Cutting Type', NULL, NULL, NULL, NULL, NULL, '2033678675', NULL, NULL, NULL, NULL, 'n/a', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(38, 'NTAVL', '2034312530', 'Vice President', 'Caroline Macumber', NULL, NULL, NULL, NULL, 'Ridgefield', 'CT', NULL, 'Apelon Inc', 'Medical And Hospital Equipment', NULL, NULL, NULL, NULL, NULL, '2034312530', NULL, NULL, NULL, NULL, 'n/a', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(39, 'N', '2034812356', 'Owner', 'Debbie Smith', NULL, NULL, NULL, NULL, 'Branford', 'CT', NULL, 'Chowder Pot', 'Eating Places - Restaurants', NULL, NULL, NULL, NULL, NULL, '2034812356', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(40, 'N', '2036124923', 'Chief Executive Officer', 'Bill Newbuar Jr', NULL, NULL, NULL, NULL, 'Stratford', 'CT', NULL, 'Hubbell Electric Heater', 'Household Appliances, Nec', NULL, NULL, NULL, NULL, NULL, '2036124923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(41, 'VM', '2037121030', 'Vice President', 'Ron Dunn', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Disanto Technology Inc', 'Surgical And Medical Instruments', NULL, NULL, NULL, NULL, NULL, '2037121030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(42, 'N', '2037302915', 'Vice President', 'Jim Marquis', NULL, NULL, NULL, NULL, 'Danbury', 'CT', NULL, 'Kimchuk Inc', 'Manufacturing Industries, Nec', NULL, NULL, NULL, NULL, NULL, '2037302915', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(43, 'VM', '2037440600', 'Vice President', 'John', 'Cauli', NULL, NULL, NULL, 'Danbury', 'CT', NULL, 'Norbert E Mitchell Co Inc', 'Petroleum Refining', NULL, NULL, NULL, NULL, NULL, '2037440600', NULL, NULL, NULL, NULL, 'try back for Rick//', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(44, 'VM', '2037442090', 'Chief Executive Officer', 'Roy Young', NULL, NULL, NULL, NULL, 'Danbury', 'CT', NULL, 'Fairfield Processing Corp', 'Fiber Cans, Drums, And Similar Products', NULL, NULL, NULL, NULL, NULL, '2037442090', NULL, NULL, NULL, NULL, 'Mike//IT Manager/', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(45, 'VM', '2037567051', 'President', 'Dennis', 'Burke', NULL, NULL, NULL, 'Waterbury', 'CT', NULL, 'American Electro Products Inc', 'Plating And Polishing', NULL, NULL, NULL, NULL, NULL, '2037567051', NULL, NULL, NULL, NULL, 'Tom// IT Manager//', NULL, NULL, NULL, 'ryan', NULL, '2019-04-10', 'sampleup1.xlsx'),
(46, 'NTAVL', '2037614000', 'Vice President', 'Noreen Harned', NULL, NULL, NULL, NULL, 'Wilton', 'CT', NULL, 'Asml Us Inc', 'Platemaking Services', NULL, NULL, NULL, NULL, NULL, '2037614000', NULL, NULL, NULL, NULL, 'call back in an hour', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(47, 'NTAVL', '2037759000', 'It Director', 'Michael', 'Goldberg', NULL, NULL, NULL, 'Brookfield', 'CT', NULL, 'Photronics Inc', 'Semiconductors And Related Devices', NULL, NULL, NULL, NULL, NULL, '2037759000', NULL, NULL, NULL, NULL, 'try back for Michael Coldberg', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(48, 'N', '2037990828', 'Owner', 'Stephanie V Blackwell', NULL, NULL, NULL, NULL, 'Orange', 'CT', NULL, 'Aurora Products', 'Food Preparations, Nec', NULL, NULL, NULL, NULL, NULL, '2037990828', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(49, 'VM', '2037997877', 'Chief Operating Officer', 'Christian Sauska', NULL, NULL, NULL, NULL, 'Orange', 'CT', NULL, 'Lcd Lighting Inc', 'Electric Lamps', NULL, NULL, NULL, NULL, NULL, '2037997877', NULL, NULL, NULL, NULL, 'try back for Jose', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(50, 'NTAVL', '2038372000', 'President', 'John M Panikar', NULL, NULL, NULL, NULL, 'Danbury', 'CT', NULL, 'Praxair Distribution Inc', 'Industrial Machinery And Equipment', NULL, NULL, NULL, NULL, NULL, '2038372000', NULL, NULL, NULL, NULL, 'n/a', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(51, 'NTAVL', '2038470800', 'President', 'Wade Rohrer', NULL, NULL, NULL, NULL, 'Norwalk', 'CT', NULL, 'Eurpac Service Company', 'Durable Goods, Nec', NULL, NULL, NULL, NULL, NULL, '2038470800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(52, 'NTAVL', '2038596800', 'President', 'Larry Sagneri', NULL, NULL, NULL, NULL, 'Hamden', 'CT', NULL, 'Trans Act Technologies Inc', 'Computer Peripheral Equipment, Nec', NULL, NULL, NULL, NULL, NULL, '2038596800', NULL, NULL, NULL, NULL, 'try back', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(53, 'NTAVL', '2038766900', 'Chief Operating Officer', 'John Vavra', NULL, NULL, NULL, NULL, 'Milford', 'CT', NULL, 'Neopost Hasler Inc', 'Office Machines, Nec', NULL, NULL, NULL, NULL, NULL, '2038766900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(54, 'NTAVL', '2038773241', 'Vice President', 'Michael B Murphy', NULL, NULL, NULL, NULL, 'Milford', 'CT', NULL, 'Alinabal Holdings Corp', 'Metal Stampings, Nec', NULL, NULL, NULL, NULL, NULL, '2038773241', NULL, NULL, NULL, NULL, 'not available', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(55, 'NTAVL', '2038781814', 'Chief Executive Officer', 'Meredith Reuben', NULL, NULL, NULL, NULL, 'Milford', 'CT', NULL, 'Eastern Bag And Paper Co Inc', 'Industrial And Personal Service Paper', NULL, NULL, NULL, NULL, NULL, '2038781814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(56, 'NTAVL', '2038791437', 'President', 'Yvon Desaulniers', NULL, NULL, NULL, NULL, 'Wolcott', 'CT', NULL, 'Devon Precision Industries Inc', 'Screw Machine Products', NULL, NULL, NULL, NULL, NULL, '2038791437', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(57, 'NTAVL', '2038814300', 'Information Technology Manager', 'Josh Nichio', NULL, NULL, NULL, NULL, 'Monroe', 'CT', NULL, 'Microboard Processing Inc Excellence Across The Bo', 'Printed Circuit Boards', NULL, NULL, NULL, NULL, NULL, '2038814300', '352', NULL, NULL, NULL, 'try back for josh . x352', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(58, 'NTAVL', '2038821000', 'IT Manager', 'Brie', NULL, NULL, NULL, NULL, 'Milford city', 'CT', NULL, 'Connecticut Stone Supplies Inc', 'Cut Stone And Stone Products', NULL, NULL, NULL, NULL, NULL, '2038821000', NULL, NULL, NULL, 'brie@connecticutstone.com', 'call back for Brie.', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(59, 'NTAVL', '2038882591', 'President', 'John H Degray', NULL, NULL, NULL, NULL, 'Seymour', 'CT', NULL, 'Kerite Co', 'Motors And Generators', NULL, NULL, NULL, NULL, NULL, '2038882591', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(60, 'NTAVL', '2038912100', 'President', 'Rob ', 'Simon', NULL, NULL, NULL, 'Orange', 'CT', NULL, 'Dichello Distributors Inc', 'Beer And Ale', NULL, NULL, NULL, NULL, NULL, '2038912100', NULL, NULL, NULL, NULL, 'try back for Rob Simon', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(61, 'VM', '2039223200', 'Vice President', 'Robert Dandrea', NULL, NULL, NULL, NULL, 'Bridgeport', 'CT', NULL, 'Casco Products Corp', 'Motor Vehicle Parts And Accessories', NULL, NULL, NULL, NULL, NULL, '2039223200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(62, 'VM', '2039251556', 'It Manager', 'Jason Parker', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Pioneer Plastics Corporation', 'Plastics Products, Nec', NULL, NULL, NULL, NULL, NULL, '2039251556', NULL, NULL, NULL, NULL, 'Mike//IT Manager//', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(63, 'NTAVL', '2039258525', 'President', 'Michael Fortin', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Preferred Tool And Die Inc', 'Special Dies, Tools, Jigs, And Fixtures', NULL, NULL, NULL, NULL, NULL, '2039258525', NULL, NULL, NULL, NULL, 'not available', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(64, 'N', '2039259235', 'President', 'Lou Leszczynski Sr', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Anco Engineering Inc', 'Sheet Metalwork', NULL, NULL, NULL, NULL, NULL, '2039259235', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(65, 'NTAVL', '2039290790', 'Owner', 'Sowmi Narayan', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Sai Systems International Inc', 'Electronic Computers', NULL, NULL, NULL, NULL, NULL, '2039290790', NULL, NULL, NULL, NULL, 'reached voicemail', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(66, 'VM', '2039298431', 'It Manager', 'Theresa Pallo', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Oem Controls Inc', 'Relays And Industrial Controls', NULL, NULL, NULL, NULL, NULL, '2039298431', NULL, NULL, NULL, NULL, 'Left voicemail// ', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(67, 'NTAVL', '2039325801', 'Chief Executive Officer', 'David Greenstein', NULL, NULL, NULL, NULL, 'West haven', 'CT', NULL, 'Lakin Tire East', 'Tires And Tubes', NULL, NULL, NULL, NULL, NULL, '2039325801', NULL, '18004882752', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(68, 'NTAVL', '2039346346', 'It Manager', 'David Springer', NULL, NULL, NULL, NULL, 'West haven', 'CT', NULL, 'Gist And Herlin Press', 'Commercial Printing, Lithographic', NULL, NULL, NULL, NULL, NULL, '203-479-7500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(69, 'VM', '2039449494', 'Vice President', 'Terry Brennan', NULL, NULL, NULL, NULL, 'Shelton', 'CT', NULL, 'Spine Wave Inc', 'Surgical And Medical Instruments', NULL, NULL, NULL, NULL, NULL, '2039449494', NULL, NULL, NULL, NULL, 'Mike// IT Director//', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(70, 'NTAVL', '2039496283', 'Vice President', 'Peter Malone', NULL, NULL, NULL, NULL, 'Wallingford', 'CT', NULL, 'Thurston Foods Inc', 'Grocery Stores', NULL, NULL, NULL, NULL, NULL, '2039496283', NULL, NULL, NULL, NULL, 'try back for Chris Sullivan', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(71, 'VM', '2039498400', 'Vice President', 'Billy Mcgill', NULL, NULL, NULL, NULL, 'Wallingford', 'CT', NULL, 'Times Microwave Systems', 'Nonferrous Wiredrawing And Insulating', NULL, NULL, NULL, NULL, NULL, '2039498400', NULL, NULL, NULL, NULL, 'try back for Rick Meranda', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(72, 'NTAVL', '2039668880', 'Ceo', 'Kevin Crawford', NULL, NULL, NULL, NULL, 'New canaan', 'CT', NULL, 'Unimin Corp', 'Hardware Stores', NULL, NULL, NULL, NULL, NULL, '2039668880', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(73, 'N', '2072344444', 'Owner', 'Dave Westscott', NULL, NULL, NULL, NULL, 'Carmel', 'ME', NULL, 'Acadia Auto Group Inc', 'Automobiles And Other Motor Vehicles', NULL, NULL, NULL, NULL, NULL, '2072344444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(74, 'NTAVL', '2072821258', 'Ceo', 'Keith Benoit', NULL, NULL, NULL, NULL, 'Saco', 'ME', NULL, 'Sure Winner Foods Inc', 'Dairy Products, Except Dried Or Canned', NULL, NULL, NULL, NULL, NULL, '2072821258', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(75, 'H', '2072823396', 'Maintenance', 'David Katon', NULL, NULL, NULL, NULL, 'Saco', 'ME', NULL, 'Yale Cordage Inc', 'Cordage And Twine', NULL, NULL, NULL, NULL, NULL, '2072823396', NULL, NULL, 'dkaton@yalecordage.com', 'dkaton@yalecordage.com', 'April 20,2018 2PM EST dkaton@yalecordage.com David Katon Maintenance Manager! Craig - CFO', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(76, 'N', '2072882886', 'Owner', 'Michael Boland', NULL, NULL, NULL, NULL, 'Bar harbor', 'ME', NULL, 'Rupununi', 'Eating Places - Restaurants', NULL, NULL, NULL, NULL, NULL, '2072882886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(77, 'N', '2073512713', 'President', 'Jonathan King', NULL, NULL, NULL, NULL, 'York', 'ME', NULL, 'Stonewall Kitchen Llc', 'Miscellaneous Food Stores', NULL, NULL, NULL, NULL, NULL, '2073512713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(78, 'NTAVL', '2073534151', 'Vice President', 'Neal Poston', NULL, NULL, NULL, NULL, 'Lisbon', 'ME', NULL, 'Dingley Press', 'Commercial Printing, Lithographic', NULL, NULL, NULL, NULL, NULL, '2073534151', NULL, NULL, '1500', '1500', NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(79, 'N', '2074390335', 'Coo', 'Jeremy Gagner', NULL, NULL, NULL, NULL, 'Kittery', 'ME', NULL, 'Weathervane Seafood Company', 'Eating Places - Restaurants', NULL, NULL, NULL, NULL, NULL, '2074390335', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(80, 'NTAVL', '2074391630', 'Owner', 'Scott Cunningham', NULL, NULL, NULL, NULL, 'Kittery', 'ME', '3904', 'Warrens Lobster House', 'Eating Places - Restaurants', NULL, NULL, NULL, NULL, NULL, '2074391630', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(81, 'N', '2075633177', 'President', 'John ', 'Reny', NULL, NULL, NULL, 'Newcastle', 'ME', NULL, 'R H Reny Inc', 'Department Stores', NULL, NULL, NULL, NULL, NULL, '2075633177', NULL, NULL, NULL, NULL, 'Try look for Adam Reny / No answer ', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(82, 'NTAVL', '2075821851', 'Coo', 'Stan Mccurdy', NULL, NULL, NULL, NULL, 'Gardiner', 'ME', NULL, 'Everett J Prescott Inc', 'Plumbing Fixture Fittings And Trim', NULL, NULL, NULL, NULL, NULL, '2075821851', NULL, NULL, NULL, NULL, 'reached voicemail of Daniel', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(83, 'NTAVL', '2075944487', 'Vice President', 'Charlie Page', NULL, NULL, NULL, NULL, 'Rockland', 'ME', NULL, 'Maritime Energy', 'Fuel Oil Dealers', NULL, NULL, NULL, NULL, NULL, '2075944487', NULL, NULL, NULL, NULL, 'Try back for Kelly Richardson!NAnnie GK ', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(84, 'NTAVL', '2076226241', 'Owner', 'Jonathan Tardiff', NULL, NULL, NULL, NULL, 'Augusta', 'ME', NULL, 'Js Mccarthy Printers', 'Commercial Printing, Lithographic', NULL, NULL, NULL, NULL, NULL, '2076226241', NULL, NULL, NULL, NULL, 'try back for Judy Hanson', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(85, 'VM', '2076253231', 'President', 'Normand Sirois', NULL, NULL, NULL, NULL, 'Porter', 'ME', NULL, 'Vulcan Electric Company', 'Printed Circuit Boards', NULL, NULL, NULL, NULL, NULL, '2076253231', NULL, NULL, NULL, NULL, 'try back for Jim', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(86, 'NTAVL', '2077219996', 'Owner', 'Lee Tatenaudem', NULL, NULL, NULL, NULL, 'Brunswick', 'ME', NULL, 'Shaws Supermarket', 'Grocery Stores', NULL, NULL, NULL, NULL, NULL, '2077219996', NULL, NULL, NULL, NULL, 'try back at 18772769673', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(87, 'VM', '2077552000', 'Cio', 'Dale Denham', NULL, NULL, NULL, NULL, 'Lewiston', 'ME', NULL, 'Geiger Inc', 'Miscellaneous Publishing', NULL, NULL, NULL, NULL, NULL, '2077552000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(88, 'VM', '2077732060', 'President', 'Tom Zack', NULL, NULL, NULL, NULL, 'Westbrook', 'ME', NULL, 'Lanco Assembly Systems Inc', 'Special Industry Machinery, Nec', NULL, NULL, NULL, NULL, NULL, '2077732060', NULL, NULL, NULL, NULL, 'reached general voicemail', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(89, 'NTAVL', '2077756900', 'Vice President', 'Staci Enneguess', NULL, NULL, NULL, NULL, 'Portland', 'ME', NULL, 'Power Pay Llc', 'Office Equipment', NULL, NULL, NULL, NULL, NULL, '2077756900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(90, 'VM', '2077845411', 'Vice President', 'Steve Costello', NULL, NULL, NULL, NULL, 'Lewiston', 'ME', NULL, 'Sun Journal', 'Newspapers', NULL, NULL, NULL, NULL, NULL, '2077845411', NULL, NULL, NULL, NULL, 'try back fir Cathy Ross', NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(91, 'NTAVL', '2078425608', 'Chief Executive Officer', 'Nancy Hasselback', NULL, NULL, NULL, NULL, 'Portland', 'ME', NULL, 'National Fisherman', 'Miscellaneous Publishing', NULL, NULL, NULL, NULL, NULL, '2078425608', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ryan', NULL, NULL, 'sampleup1.xlsx'),
(92, 'VM', '2078654761', 'Owner', 'Glenn Lake', NULL, NULL, NULL, NULL, 'Freeport', 'ME', NULL, 'L L Bean Inc', 'Sporting Goods And Bicycle Shops', NULL, NULL, NULL, NULL, NULL, '2078654761', NULL, NULL, NULL, NULL, 'reached voiceamil', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(93, 'NTAVL', '2078788173', 'President', 'Alex Miller', NULL, NULL, NULL, NULL, 'Portland', 'ME', NULL, 'Envirologix', 'Analytical Instruments', NULL, NULL, NULL, NULL, NULL, '2078788173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(94, 'VM', '2079353531', 'President', 'Gary Macfarlane', NULL, NULL, NULL, NULL, 'Fryeburg', 'ME', NULL, 'Har Mac Rebar & Steel Corp', 'Brick, Stone, And Related Material', NULL, NULL, NULL, NULL, NULL, '2079353531', NULL, NULL, NULL, NULL, '8602169500,', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(95, 'N', '2079478200', 'President', 'Kevin Rodgers', NULL, NULL, NULL, NULL, 'Bangor', 'ME', NULL, 'Nautel Maine Inc', 'Radio And T.V. Communications Equipment', NULL, NULL, NULL, NULL, NULL, '2079478200', NULL, NULL, NULL, NULL, '5876 5825', NULL, NULL, NULL, 'Admin', NULL, NULL, 'sampleup1.xlsx'),
(96, 'N', '2122018100', 'Chief Executive Officer', 'John', 'Idol', NULL, NULL, NULL, 'New york', 'NY', NULL, 'Michael Kors Usa Inc', 'Family Clothing Stores', NULL, NULL, NULL, NULL, NULL, '2122018100', NULL, NULL, NULL, NULL, 'no answer ', NULL, NULL, NULL, '-REMOVED-', 2, '2018-08-02', 'sampleup1.xlsx'),
(97, 'H', '2122077000', 'President', 'Charles', 'Colson', NULL, NULL, NULL, 'New york', 'NY', NULL, 'Harpercollins', 'Book Stores', NULL, NULL, NULL, NULL, NULL, '2122077000', NULL, NULL, NULL, NULL, 'Hung UP', NULL, NULL, NULL, '-REMOVED-', 2, '2018-08-02', 'sampleup1.xlsx'),
(98, 'N', '2122233200', 'Vice President', 'James', 'Benfield', NULL, NULL, NULL, 'New york', 'NY', NULL, 'Transammonia Inc', 'Chemicals And Allied Products, Nec', NULL, NULL, NULL, NULL, NULL, '2122233200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-REMOVED-', 2, '2018-08-02', 'sampleup1.xlsx'),
(99, 'NTAVL', '2122266150', 'President', 'Peter', 'Lepore', NULL, NULL, NULL, 'New york', 'NY', NULL, 'Ferrara Bakery & Cafe', 'Bread, Cake, And Related Products', NULL, NULL, NULL, NULL, NULL, '2122266150', NULL, NULL, NULL, NULL, 'No one is available.', NULL, NULL, NULL, '-REMOVED-', 2, '2018-08-02', 'sampleup1.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `username`, `password`, `type`) VALUES
(1, 'Kyle', 'Nurville', 'kyle_nurville', '0574ec194867ca97ce810ac82eb3b31e', 'Superadmin'),
(2, 'Kyle', 'Nurville', 'kyle', '0574ec194867ca97ce810ac82eb3b31e', 'Admin'),
(3, 'Maria', 'Rodriguez', 'maria', '0574ec194867ca97ce810ac82eb3b31e', 'Admin'),
(9, 'Kimberly', 'Jordan', 'kim', 'fb1eaf2bd9f2a7013602be235c305e7a', 'User'),
(10, 'Miguel', 'Juan', 'migz', 'ba7595d6c340dabf7ba672f6dd3542c3', 'User'),
(12, 'Ryan', 'Gonzales', 'ryan', '0574ec194867ca97ce810ac82eb3b31e', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_export_log`
--
ALTER TABLE `tbl_export_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_main`
--
ALTER TABLE `tbl_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_export_log`
--
ALTER TABLE `tbl_export_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_login_log`
--
ALTER TABLE `tbl_login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tbl_main`
--
ALTER TABLE `tbl_main`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3069;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
