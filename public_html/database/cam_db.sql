-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 02:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera_collection`
--

CREATE TABLE `camera_collection` (
  `camera_id` int(15) NOT NULL,
  `make` varchar(255) NOT NULL,
  `serial_no` int(15) NOT NULL,
  `ch` int(15) NOT NULL,
  `mega_pixel` int(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `depot` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `warranty` int(10) NOT NULL,
  `ex_date` date NOT NULL,
  `insert_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camera_collection`
--

INSERT INTO `camera_collection` (`camera_id`, `make`, `serial_no`, `ch`, `mega_pixel`, `purchase_date`, `depot`, `category`, `location`, `warranty`, `ex_date`, `insert_date_time`, `status`) VALUES
(1, 'dahua', 15548, 4, 15, '2024-04-09', '1', '1', 'mehsana', 1, '2025-04-09', '2024-04-24 14:19:24', 1),
(14, 'workshop camera ', 123489, 4, 15, '2024-04-10', '1', '2', 'workshop mehsana', 1, '2025-04-10', '2024-04-24 15:30:59', 1),
(15, 'old bus station  camera', 146, 3, 15, '2024-04-17', '1', '3', 'mehsana', 1, '2025-04-17', '2024-04-24 20:25:24', 1),
(16, 'dahua patan', 6548, 4, 15, '2024-04-10', '2', '5', 'control room', 1, '2025-04-10', '2024-04-25 12:22:53', 1),
(17, 'dahua ', 164, 3, 15, '2024-04-11', '1', '7', 'platform 1 ', 1, '2025-04-11', '2024-04-25 12:47:07', 1),
(18, 'dahua ', 165, 3, 15, '2024-04-11', '1', '7', 'platform 1 ', 1, '2025-04-11', '2024-04-25 12:47:13', 1),
(19, 'dahua ', 166, 3, 15, '2024-04-11', '1', '7', 'platform 3', 1, '2025-04-11', '2024-04-25 12:47:19', 1),
(20, 'gunja ', 15687, 6, 15, '2024-04-24', '3', '9', 'cctv room', 1, '2025-04-24', '2024-04-25 14:02:43', 1),
(21, 'gunja ', 15688, 6, 15, '2024-04-24', '3', '9', 'cctv room', 1, '2025-04-24', '2024-04-25 14:02:49', 1),
(22, 'gunja ', 156810, 6, 15, '2024-04-24', '3', '9', 'cctv room', 1, '2025-04-24', '2024-04-25 14:02:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `camera_status`
--

CREATE TABLE `camera_status` (
  `status_id` int(255) NOT NULL,
  `device_category` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `depot` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `serial_no` int(255) NOT NULL,
  `megapixel` int(155) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `ins_date` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `submit_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camera_status`
--

INSERT INTO `camera_status` (`status_id`, `device_category`, `city`, `depot`, `location`, `make`, `serial_no`, `megapixel`, `purchase_date`, `expiry_date`, `ins_date`, `status`, `remark`, `submit_time`) VALUES
(20, 'dvr', 'mehsana', 'workshop', 'Not needed!', 'dvr workhop', 15678, 0, '2005-09-25', '2006-09-25', '2024-04-25 12:33:21', 1, '', '2024-04-25'),
(21, 'hdd', 'mehsana', 'workshop', 'Not needed!', 'hdd workshop', 233, 0, '2004-02-22', '2005-02-22', '2024-04-25 12:33:21', 0, 'off', '2024-04-25'),
(22, 'nvr', 'mehsana', 'workshop', 'Not needed!', 'workshop', 1648, 0, '2024-04-25', '2025-04-25', '2024-04-25 12:33:21', 1, '', '2024-04-25'),
(23, 'camera', 'mehsana', 'bus station', 'platform 1', 'dahua', 164, 15, '2024-04-11', '2025-04-11', '2024-04-25 12:47:07', 1, '', '2024-04-25'),
(24, 'camera', 'mehsana', 'bus station', 'platform 1', 'dahua', 165, 15, '2024-04-11', '2025-04-11', '2024-04-25 12:47:13', 0, 'off', '2024-04-25'),
(25, 'camera', 'mehsana', 'bus station', 'platform 3', 'dahua', 166, 15, '2024-04-11', '2025-04-11', '2024-04-25 12:47:19', 0, 'off', '2024-04-25'),
(26, 'camera', 'patan', 'workshop', 'control room', 'dahua patan', 6548, 15, '2024-04-10', '2025-04-10', '2024-04-25 12:22:53', 1, '', '2024-04-25'),
(27, 'dvr', 'patan', 'workshop', 'Not needed!', 'patan', 1568, 0, '2024-04-17', '2025-04-17', '2024-04-25 12:22:08', 1, '', '2024-04-25'),
(28, 'nvr', 'patan', 'workshop', 'Not needed!', 'patan', 1546, 0, '2024-04-25', '2025-04-25', '2024-04-25 12:22:08', 1, '', '2024-04-25'),
(29, 'hdd', 'patan', 'workshop', 'Not needed!', 'patan', 5668, 0, '2024-04-15', '2025-04-15', '2024-04-25 12:22:08', 0, 'off', '2024-04-25'),
(30, 'camera', 'gunja', 'workshop', 'cctv room', 'gunja', 15688, 15, '2024-04-24', '2025-04-24', '2024-04-25 14:02:49', 0, 'off', '2024-04-25'),
(31, 'camera', 'gunja', 'workshop', 'cctv room', 'gunja', 156810, 15, '2024-04-24', '2025-04-24', '2024-04-25 14:02:54', 0, 'off', '2024-04-25'),
(32, 'camera', 'gunja', 'workshop', 'cctv room', 'gunja', 15687, 15, '2024-04-24', '2025-04-24', '2024-04-25 14:02:43', 0, 'off', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `pid` int(111) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`pid`, `category_name`, `status`) VALUES
(1, 'mehsana', '1'),
(2, 'patan', '1'),
(3, 'gunja', '1');

-- --------------------------------------------------------

--
-- Table structure for table `child_category`
--

CREATE TABLE `child_category` (
  `cid` int(15) NOT NULL,
  `parent_id` varchar(155) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_category`
--

INSERT INTO `child_category` (`cid`, `parent_id`, `child_name`, `status`) VALUES
(5, '2', 'workshop', '1'),
(6, '1', 'workshop', '1'),
(7, '1', 'bus station', '1'),
(8, '1', 'old bus station', '1'),
(9, '3', 'workshop', '1');

-- --------------------------------------------------------

--
-- Table structure for table `device_collection`
--

CREATE TABLE `device_collection` (
  `device_id` int(11) NOT NULL,
  `device_category` varchar(155) NOT NULL,
  `depot` varchar(155) NOT NULL,
  `category` varchar(155) NOT NULL,
  `make` varchar(255) NOT NULL,
  `serial_no` int(155) NOT NULL,
  `ch` int(15) NOT NULL,
  `purchase_date` date NOT NULL,
  `warrenty` int(155) NOT NULL,
  `expiery_date` date NOT NULL,
  `ins_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device_collection`
--

INSERT INTO `device_collection` (`device_id`, `device_category`, `depot`, `category`, `make`, `serial_no`, `ch`, `purchase_date`, `warrenty`, `expiery_date`, `ins_date`, `status`) VALUES
(1, 'nvr', '1', '1', 'dahua', 123, 16, '2024-04-01', 1, '2025-04-01', '2024-04-24 14:32:33', 1),
(2, 'dvr', '1', '1', 'dahua', 1234, 16, '2024-04-01', 1, '2025-04-01', '2024-04-24 14:32:33', 1),
(3, 'hdd', '1', '1', 'sigat', 123456, 0, '2024-04-01', 1, '2025-04-01', '2024-04-24 14:32:33', 1),
(4, 'nvr', '1', '2', 'workshop', 1234, 4, '2024-04-03', 1, '2025-04-03', '2024-04-24 15:30:23', 1),
(5, 'dvr', '1', '2', 'workshop', 1686, 4, '2024-04-12', 1, '2025-04-12', '2024-04-24 15:30:23', 1),
(6, 'hdd', '1', '2', 'workshop', 1567, 0, '2024-04-17', 1, '2025-04-17', '2024-04-24 15:30:23', 1),
(7, 'nvr', '1', '3', 'old bus station ', 159, 4, '2024-04-24', 1, '2025-04-24', '2024-04-24 20:24:42', 1),
(8, 'dvr', '1', '3', 'old bus stasion ', 164, 4, '2024-04-19', 1, '2025-04-19', '2024-04-24 20:24:42', 1),
(9, 'hdd', '1', '3', 'old bus station', 165, 0, '2024-04-24', 1, '2025-04-24', '2024-04-24 20:24:42', 1),
(10, 'nvr', '2', '5', 'patan', 1546, 16, '2024-04-25', 1, '2025-04-25', '2024-04-25 12:22:08', 1),
(11, 'dvr', '2', '5', 'patan ', 1568, 16, '2024-04-17', 1, '2025-04-17', '2024-04-25 12:22:08', 1),
(12, 'hdd', '2', '5', 'patan', 5668, 0, '2024-04-15', 1, '2025-04-15', '2024-04-25 12:22:08', 1),
(13, 'nvr', '1', '6', 'workshop', 1648, 4, '2024-04-25', 1, '2025-04-25', '2024-04-25 12:33:21', 1),
(14, 'dvr', '1', '6', 'dvr workhop', 15678, 4, '2005-09-25', 1, '2006-09-25', '2024-04-25 12:33:21', 1),
(15, 'hdd', '1', '6', 'hdd workshop', 233, 0, '2004-02-22', 1, '2005-02-22', '2024-04-25 12:33:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'mihir', 'user@gmail.com', '$2y$08$uaxI4ihWi6d/P.5CVNQaQ.UPZdJBlFsSFEVU6TQOoynA/6VmVSvPe', 'other', '2024-04-24', '2024-04-25 12:04:15', ''),
(2, 'Mihir Yogi', 'admin@gmail.com', '$2y$08$vtQDMvDOKGFwJD9mvFZWtOjUaRnciD.SgQNrG3gFJLGt1uGl1K2qy', 'Admin', '2024-04-24', '2024-04-24 04:04:50', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera_collection`
--
ALTER TABLE `camera_collection`
  ADD PRIMARY KEY (`camera_id`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `camera_status`
--
ALTER TABLE `camera_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `child_category`
--
ALTER TABLE `child_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `device_collection`
--
ALTER TABLE `device_collection`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera_collection`
--
ALTER TABLE `camera_collection`
  MODIFY `camera_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `camera_status`
--
ALTER TABLE `camera_status`
  MODIFY `status_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `pid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `child_category`
--
ALTER TABLE `child_category`
  MODIFY `cid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `device_collection`
--
ALTER TABLE `device_collection`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
