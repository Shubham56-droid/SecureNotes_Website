-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 07:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `noteitem`
--

CREATE TABLE `noteitem` (
  `sno` int(10) NOT NULL,
  `notetopic` varchar(100) NOT NULL,
  `notedesc` varchar(1000) NOT NULL,
  `notedate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noteitem`
--

INSERT INTO `noteitem` (`sno`, `notetopic`, `notedesc`, `notedate`) VALUES
(30, 'this is first note', 'one', '2022-06-10 10:41:37'),
(31, 'thsi is second note', 'two', '2022-06-10 10:41:49'),
(32, 'this is third note', 'three', '2022-06-10 10:42:19'),
(33, 'this is fourth note', 'four', '2022-06-10 10:42:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noteitem`
--
ALTER TABLE `noteitem`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noteitem`
--
ALTER TABLE `noteitem`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
