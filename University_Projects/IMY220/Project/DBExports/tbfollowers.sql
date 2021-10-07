-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 05:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theclouddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbfollowers`
--

CREATE TABLE `tbfollowers` (
  `ID` int(11) NOT NULL,
  `follower_id` varchar(50) NOT NULL,
  `following_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbfollowers`
--

INSERT INTO `tbfollowers` (`ID`, `follower_id`, `following_id`) VALUES
(19, '2', '1'),
(21, '1', '2'),
(22, '3', '1'),
(23, '4', '3'),
(24, '4', '1'),
(25, '4', '2'),
(26, '5', '3'),
(27, '5', '1'),
(28, '5', '2'),
(29, '4', '5'),
(30, '6', '4'),
(31, '6', '5'),
(32, '6', '3'),
(33, '6', '1'),
(34, '6', '2'),
(35, '7', '6'),
(36, '7', '4'),
(37, '7', '5'),
(38, '7', '3'),
(39, '7', '2'),
(40, '7', '1'),
(41, '8', '6'),
(42, '8', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
