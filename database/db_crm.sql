-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 01:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brokers`
--

CREATE TABLE `tbl_brokers` (
  `id` int(11) NOT NULL,
  `broker_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brokers`
--

INSERT INTO `tbl_brokers` (`id`, `broker_name`) VALUES
(1, 'XM'),
(2, 'Exness '),
(3, 'OctaFX');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients_records`
--

CREATE TABLE `tbl_clients_records` (
  `id` int(11) NOT NULL,
  `client_name` varchar(256) NOT NULL,
  `client_email` varchar(256) NOT NULL,
  `client_number` varchar(256) NOT NULL,
  `client_id` int(11) NOT NULL,
  `trading_experience` varchar(256) DEFAULT NULL,
  `ib_experience` varchar(256) DEFAULT NULL,
  `ib_of_broker` varchar(256) DEFAULT NULL,
  `active_clients` varchar(256) DEFAULT NULL,
  `per_lot_rebate` varchar(256) DEFAULT NULL,
  `other_benefits` varchar(256) DEFAULT NULL,
  `services` varchar(256) DEFAULT NULL,
  `marketing` varchar(256) DEFAULT NULL,
  `how_did_you_know_us` varchar(256) DEFAULT NULL,
  `monthly_deposited_clients` varchar(256) DEFAULT NULL,
  `monthly_lots` varchar(256) DEFAULT NULL,
  `what_you_want` varchar(256) DEFAULT NULL,
  `starting_date_time` datetime DEFAULT NULL,
  `follow_up_date_time` datetime DEFAULT NULL,
  `staff_opinion` varchar(256) DEFAULT NULL,
  `willingness_to_join_us` varchar(256) DEFAULT NULL,
  `comments` longtext DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clients_records`
--

INSERT INTO `tbl_clients_records` (`id`, `client_name`, `client_email`, `client_number`, `client_id`, `trading_experience`, `ib_experience`, `ib_of_broker`, `active_clients`, `per_lot_rebate`, `other_benefits`, `services`, `marketing`, `how_did_you_know_us`, `monthly_deposited_clients`, `monthly_lots`, `what_you_want`, `starting_date_time`, `follow_up_date_time`, `staff_opinion`, `willingness_to_join_us`, `comments`, `added_on`, `added_by`) VALUES
(80, 'srg', '', '', 1, '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '2022-12-06 00:00:00', 10),
(81, '', '', '', 11, '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '2022-12-06 00:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `brokers` varchar(56) NOT NULL,
  `services` varchar(56) NOT NULL,
  `created_date` varchar(56) NOT NULL,
  `created_time` varchar(56) NOT NULL,
  `created_by_id` varchar(56) NOT NULL,
  `created_by_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `name`, `email`, `brokers`, `services`, `created_date`, `created_time`, `created_by_id`, `created_by_name`) VALUES
(55, 'shoaib', 'shoaib@gmail.com', '3', 'Tradeable-Bonus , Fast-Withdrawals , Fast-Execuations', '2022-11-30', '02:14:02 PM', '8', ''),
(56, 'muhammad Ali11', 'ali21@gmail.com', '3', 'Tradeable-Bonus , Fast-Withdrawals , Fast-Execuations', '2022-11-30', '02:27:35 PM', '8', ''),
(57, 'a1', 'aa@gmail.com', '3', 'Tradeable-Bonus', '2022-11-30', '02:30:40 PM', '8', ''),
(58, 'Zeeshan', 'zeeshan1@gmail.com', '3', 'Tradeable-Bonus , Fast-Withdrawals , Fast-Execuations', '2022-12-01', '05:25:29 AM', '1', 'Shoaib'),
(59, 'Ali1', 'ali@gmail.com', '1', 'Fast-Withdrawals', '2022-12-01', '05:25:59 AM', '10', 'sufiyan12'),
(60, 'soban', 'soban@gmail.com', '1', 'Fast-Withdrawals', '2022-12-01', '05:29:47 AM', '10', 'sufiyan12'),
(61, 'sara', 'sara@gmail.com', '1', 'Fast-Withdrawals', '2022-12-01', '05:30:16 AM', '10', 'sufiyan12'),
(62, 'sara1', 'sara1@gmail.com', '2', 'Fast-Withdrawals', '2022-12-01', '05:30:45 AM', '10', 'sufiyan12'),
(63, 'sara12', 'sara12@gmail.com', '3', 'Fast-Withdrawals', '2022-12-01', '05:32:37 AM', '10', 'sufiyan12'),
(64, 'iqra', 'iqra@gmail.com', '2', 'Tradeable-Bonus , Fast-Withdrawals', '2022-12-01', '05:42:36 AM', '10', 'sufiyan12'),
(65, 'kainat', 'kainat@gmail.com', '1', 'Fast-Withdrawals', '2022-12-01', '05:43:15 AM', '10', 'sufiyan12'),
(70, 'Hassan', 'Hassan@gmmail.com', '3', 'Tradeable-Bonus , Fast-Withdrawals', '2022-12-01', '06:15:46 AM', '1', 'Shoaib'),
(72, 'da', 'sfg@gmail.com', '1', 'Fast-Withdrawals', '2022-12-01', '07:58:04 AM', '10', 'Malik'),
(73, 'kjiyg', 'df@gmail.com', '3', 'Tradeable-Bonus , Fast-Execuations', '2022-12-05', '09:16:58 AM', '10', ''),
(74, 'a', 'asd@gmail.com', '1', 'Fast-Withdrawals , Fast-Execuations', '2022-12-05', '11:15:12 AM', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(56) NOT NULL,
  `l_name` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `role` varchar(56) NOT NULL,
  `created_date` varchar(56) NOT NULL,
  `created_time` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `f_name`, `l_name`, `email`, `password`, `role`, `created_date`, `created_time`) VALUES
(1, 'Shoaib', 'Khan', 'shoaib1511027@gmail.com', '123', '0', '', ''),
(10, 'sufiyan12', 'Malik', 'sufiyan@gmail.com', '123', '1', '2022-11-30', '01:43:07 PM'),
(11, 'shani', 'shani', 'shani111@gmail.com', '123', '1', '2022-12-01', '06:10:08 AM'),
(12, 'zeeshann', 'zeeshann', 'zeeshann@gmail.com', '123', '1', '2022-12-01', '06:10:36 AM'),
(13, 'Hassan', 'Hassan', 'Hassan@gmail.com', '123', '1', '2022-12-01', '06:16:13 AM'),
(15, 'Hassan 1', 'Hassan ', 'Hassan@gmail.com', '123', '0', '2022-12-05', '10:24:42 AM'),
(16, 'Sufiyan', 'Malik', 'Sufiyan@gmail.com', '123', '0', '2022-12-05', '10:26:28 AM'),
(17, 'sufiyan12', 'aa', 'sufiyan1@gmail.com', '123', '0', '2022-12-05', '11:11:33 AM'),
(18, 'sufiyan22', 'ss', 'sufiyan@1gmail.com', '123', '0', '2022-12-05', '11:12:45 AM'),
(19, 'ali ', 'Ali2 ', 'Ali@gmail.com', '123', '0', '2022-12-05', '11:14:44 AM'),
(20, 'a', 'a', 'a@gmail.com', '123', '0', '2022-12-05', '11:16:02 AM'),
(21, 'a', 'a', 'a1@gmail.com', '123', '0', '2022-12-05', '12:15:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brokers`
--
ALTER TABLE `tbl_brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients_records`
--
ALTER TABLE `tbl_clients_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
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
-- AUTO_INCREMENT for table `tbl_brokers`
--
ALTER TABLE `tbl_brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_clients_records`
--
ALTER TABLE `tbl_clients_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
