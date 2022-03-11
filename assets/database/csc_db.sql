-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 07:53 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataentry_tbl`
--

CREATE TABLE `dataentry_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `doc_no` varchar(255) NOT NULL,
  `doc_entry` varchar(255) NOT NULL,
  `doc_type` varchar(255) NOT NULL,
  `subject` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `encoded_by` varchar(255) NOT NULL,
  `remarks` longtext NOT NULL,
  `print` varchar(255) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `division_tbl`
--

CREATE TABLE `division_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `div_tag` varchar(255) NOT NULL,
  `div_name` varchar(255) NOT NULL,
  `div_role` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division_tbl`
--

INSERT INTO `division_tbl` (`id`, `div_tag`, `div_name`, `div_role`, `reg_date`, `reg_update`, `updated_by`) VALUES
(1, 'PALD', '(PALD) Public Assistance and Liaison Division', '1', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(2, 'ESD', '(ESD) Examination Services Division', '2', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(3, 'MSD', '(MSD) Management Services Division', '3', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(4, 'HRD', '(HRD) Human Resource Division', '4', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(5, 'PSED', '(PSED) Policies and System Evaluation Division', '5', '2019-07-28 04:23:16', '2019-08-07 09:06:21', ''),
(6, 'LSD', '(LSD) Legal Services Division', '6', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(7, 'ORD', '(ORD) Office of Regional Director', '7', '2019-07-28 04:23:16', '2019-07-28 04:23:16', '1'),
(8, 'ADMIN', 'Administrator', '0', '2019-07-28 14:05:22', '2019-07-28 14:06:12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `docentry_tbl`
--

CREATE TABLE `docentry_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_entry` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reg_udpate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docentry_tbl`
--

INSERT INTO `docentry_tbl` (`id`, `doc_entry`, `reg_date`, `reg_udpate`, `update_by`) VALUES
(1, 'PERSONAL DELIVERY', '2019-08-13 09:41:33', '0000-00-00 00:00:00', '1'),
(2, 'COURIER', '2019-08-13 09:41:33', '0000-00-00 00:00:00', '1'),
(3, 'EMAIL', '2019-08-13 09:41:33', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctype_tbl`
--

CREATE TABLE `doctype_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_type` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctype_tbl`
--

INSERT INTO `doctype_tbl` (`id`, `doc_type`, `reg_date`, `reg_update`, `updated_by`) VALUES
(1, 'OTHER TYPE', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(2, 'REQUEST', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(3, 'APPEAL', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(4, 'MEMO', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(5, 'DOCUMENT', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(6, 'SUBMISSION', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(7, 'COMPLIANCE', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1'),
(8, 'PERSONAL', '2019-08-25 03:00:23', '2019-08-25 03:00:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE `position_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `red_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`id`, `position`, `reg_date`, `red_update`, `updated_by`) VALUES
(1, 'Director IV', '2019-07-28 03:33:54', '2019-07-28 03:33:54', '1'),
(2, 'Director III', '2019-07-28 03:33:54', '2019-07-28 03:33:54', '1'),
(3, 'Director II', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(4, 'Division Chief', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(5, 'Acting Division Chief', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(6, 'Supervising HRS', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(7, 'Attorney VI', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(8, 'Attorney V', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(9, 'Attorney IV', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(10, 'Attorney III', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(11, 'Attorney II', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(12, 'Attorney I', '2019-07-28 03:36:28', '2019-07-28 03:36:28', '1'),
(13, 'Accountant', '2019-07-28 03:39:31', '2019-07-28 03:39:31', '1'),
(14, 'HRS I', '2019-07-28 03:39:31', '2019-07-28 03:39:31', '1'),
(15, 'HRS II', '2019-07-28 03:39:31', '2019-07-28 03:39:31', '1'),
(16, 'Cashier', '2019-07-28 03:39:31', '2019-07-28 03:39:31', '1'),
(17, 'Clerk', '2019-07-28 03:39:31', '2019-07-28 03:39:31', '1'),
(18, 'Job Order', '2019-07-28 03:39:31', '2019-07-28 03:39:31', ''),
(19, 'Computer Technician', '2019-07-28 03:48:15', '2019-07-28 03:48:15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `spels_tbl`
--

CREATE TABLE `spels_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middleinitial` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `extraname` varchar(255) NOT NULL,
  `coe_issued` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sq_tbl`
--

CREATE TABLE `sq_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `udpated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sq_tbl`
--

INSERT INTO `sq_tbl` (`id`, `question`, `reg_date`, `reg_update`, `udpated_by`) VALUES
(1, 'What is the name of your favorite pet?', '2019-07-26 08:41:55', '2019-07-26 08:41:55', '1'),
(2, 'On what school or university did you graduated from college?', '2019-07-26 08:42:24', '2019-07-26 08:42:56', '1'),
(3, 'What is your favorite meal for lunch?', '2019-07-26 08:42:24', '2019-07-26 08:42:24', '1'),
(4, 'What is your favorite movie of all time?', '2019-07-26 08:42:39', '2019-07-26 08:42:39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_tbl`
--

CREATE TABLE `system_tbl` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `sidebar_logo` varchar(255) NOT NULL,
  `mission` longtext NOT NULL,
  `vision` longtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_tbl`
--

INSERT INTO `system_tbl` (`id`, `icon`, `banner`, `sidebar_logo`, `mission`, `vision`, `contact`, `address`, `region`, `title`, `footer`, `header`, `email`, `fb`, `developer`) VALUES
(1, '190721041724.png', '190721041740.png', '190721041753.png', '<b>CORE PURPOSE</b><br>\nGawing Lingkod Bayani ang Bawat Kawani<br>\n(To make every civil servant a servant hero)', '<b>2030 AGENCY VISION</b><br>\nCSC shall be globally recognized as a center of excellence for strategic HR and OD\n<br><br>\n<b> CORE VALUES</b><br>\nLove of God and Country, Excellence, Integrity', '(02) 925 6561', '139 Panay Ave, Diliman, Quezon City, 1103 Metro Manila', '4', 'CSCRO4 - EDTS', '© Copyrighted @ 2018. Civil Service Commission - Regional Office 4', 'Electronic Data Tracking System', 'cscro4.gov.ph', 'https://web.facebook.com/cscregion4/?ref=br_rs', 'Information Technology Group (ITG) - CSCRO4IT');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `acc_status` varchar(255) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `image`, `fn`, `mi`, `ln`, `gender`, `contact`, `position`, `division`, `username`, `password`, `role`, `acc_status`, `security_code`, `security_question`, `security_answer`, `reg_date`, `reg_update`, `update_by`) VALUES
(1, '190805122812.png', 'Admin', 'A', 'Administrator', 'male', '09179710714', 'System Administrator', 'ADMIN', 'admin', '$2y$10$eZeL/vfW6NoAnAgNB7WIz..7nGOwvdXIQUP0lvjzpZlVNdrXRJkwG', '0', '0', '123456', 'What is your favorite movie of all time?', '$2y$10$5GLMuRQ7TlhnL3GWYdV4dOMPkN0HYAwXUSWdyJWt610PtGCTY5JPq', '2019-06-18 23:55:29', '2019-08-05 10:28:12', '1'),
(31, 'male.png', 'Sajer', 'A', 'Broncano', 'male', '09179710713', 'Job Order', 'PALD', 'Pald', '$2y$10$ZNV8/aoVwRCbqcewtPtNcewbruIVT8nFnZOFhtr0bekliVxQe4E6i', '1', '0', 'PALD607286', '', '', '2019-08-13 10:12:13', '2019-08-29 05:09:45', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataentry_tbl`
--
ALTER TABLE `dataentry_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_tbl`
--
ALTER TABLE `division_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docentry_tbl`
--
ALTER TABLE `docentry_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctype_tbl`
--
ALTER TABLE `doctype_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spels_tbl`
--
ALTER TABLE `spels_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sq_tbl`
--
ALTER TABLE `sq_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_tbl`
--
ALTER TABLE `system_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataentry_tbl`
--
ALTER TABLE `dataentry_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `division_tbl`
--
ALTER TABLE `division_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `docentry_tbl`
--
ALTER TABLE `docentry_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctype_tbl`
--
ALTER TABLE `doctype_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spels_tbl`
--
ALTER TABLE `spels_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sq_tbl`
--
ALTER TABLE `sq_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_tbl`
--
ALTER TABLE `system_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
