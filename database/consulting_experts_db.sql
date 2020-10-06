-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 06:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consulting_experts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_filelist`
--

CREATE TABLE `ci_filelist` (
  `file_id` int(11) NOT NULL,
  `fk_user_id` varchar(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_servicelist`
--

CREATE TABLE `ci_servicelist` (
  `service_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `delete_status` varchar(11) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_userdata`
--

CREATE TABLE `ci_userdata` (
  `userdata_id` int(11) NOT NULL,
  `fk_user_id` varchar(11) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `profile_picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(550) NOT NULL,
  `activity_status` varchar(20) NOT NULL,
  `delete_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_filelist`
--
ALTER TABLE `ci_filelist`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `ci_servicelist`
--
ALTER TABLE `ci_servicelist`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `ci_userdata`
--
ALTER TABLE `ci_userdata`
  ADD PRIMARY KEY (`userdata_id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_filelist`
--
ALTER TABLE `ci_filelist`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_servicelist`
--
ALTER TABLE `ci_servicelist`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_userdata`
--
ALTER TABLE `ci_userdata`
  MODIFY `userdata_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
