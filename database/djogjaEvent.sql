-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2019 at 02:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djogjaEvent`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_author` bigint(20) UNSIGNED NOT NULL,
  `event_post` datetime NOT NULL DEFAULT current_timestamp(),
  `event_tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_datetime` datetime NOT NULL,
  `event_participant` int(11) NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_register` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 === tidak',
  `event_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 === post, 0 === delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_author`, `event_post`, `event_tittle`, `event_desc`, `event_location`, `event_datetime`, `event_participant`, `event_image`, `event_register`, `event_status`) VALUES
(1, 2, '2019-11-23 14:14:18', '1', '3', '', '2019-12-31 12:59:00', 3, NULL, 0, 1),
(2, 2, '2019-11-23 14:14:32', '2', 'vhg', '', '2019-12-31 12:59:00', 1, NULL, 0, 1),
(3, 2, '2019-11-23 14:14:57', '3', 'hb', '', '2019-12-31 12:59:00', 5, NULL, 0, 1),
(4, 2, '2019-11-23 14:15:15', '4', 'gh', '', '2019-12-31 12:44:00', 6, NULL, 0, 1),
(5, 2, '2019-11-23 14:15:29', '5', 'g', '', '2019-12-31 12:59:00', 56, NULL, 0, 1),
(6, 2, '2019-11-23 14:15:40', '6', 'bjn', '', '2019-12-31 01:00:00', 67, NULL, 0, 1),
(7, 2, '2019-11-23 14:16:29', '6', 'bjn', '', '2019-12-31 01:00:00', 67, NULL, 0, 1),
(8, 2, '2019-11-23 14:17:37', '6', 'bjn', '', '2019-12-31 01:00:00', 67, NULL, 0, 1),
(9, 2, '2019-11-23 21:00:50', '10', 'jsbjh', '', '2019-12-31 21:59:00', 90, NULL, 0, 1),
(10, 2, '2019-11-23 21:02:18', '11', 'hjb', 'bhj', '2019-11-30 12:59:00', 90, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `joinEvent`
--

CREATE TABLE `joinEvent` (
  `join_id` bigint(20) UNSIGNED NOT NULL,
  `join_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_time` datetime NOT NULL DEFAULT current_timestamp(),
  `join_event` bigint(20) UNSIGNED NOT NULL,
  `join_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `joinEvent`
--

INSERT INTO `joinEvent` (`join_id`, `join_keterangan`, `join_time`, `join_event`, `join_user`) VALUES
(1, 'svavshj', '2019-11-25 21:30:28', 1, 2),
(2, 'sbask', '2019-11-25 21:37:26', 1, 2),
(3, 'sabksn', '2019-11-25 21:38:57', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_register` date NOT NULL DEFAULT current_timestamp(),
  `user_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_displayname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_pass`, `user_register`, `user_profile`, `user_displayname`) VALUES
(1, 'anwar156', 'azizanwar@mail.ugm.ac.id', '$2y$10$njdD5N39ntK8CY1I1tZ4ieWZfhrMvVk2pdwh.FjjTHIOvJeLqj4ki', '2019-11-19', NULL, 'azis anwar'),
(2, 'test1', 'test1@test1.test1', '$2y$10$aXKYta86y/cvmE3g7ag3zusp2FuczuhcN6r.mGJjbo2ChAqrox2GC', '2019-11-20', NULL, 'test1'),
(3, 'test2', '', '$2y$10$k2pM9LML6NWZ2YZAcgm78eNfg1T/myyeNKPGRXmNIbsq0.reMVEG2', '2019-11-22', NULL, 'test2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user-make-event` (`event_author`);

--
-- Indexes for table `joinEvent`
--
ALTER TABLE `joinEvent`
  ADD PRIMARY KEY (`join_id`),
  ADD KEY `user_join` (`join_user`),
  ADD KEY `event_join` (`join_event`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `joinEvent`
--
ALTER TABLE `joinEvent`
  MODIFY `join_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `user-make-event` FOREIGN KEY (`event_author`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `joinEvent`
--
ALTER TABLE `joinEvent`
  ADD CONSTRAINT `event_join` FOREIGN KEY (`join_event`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `user_join` FOREIGN KEY (`join_user`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
