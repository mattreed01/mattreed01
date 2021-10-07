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
-- Table structure for table `tbgallery`
--

CREATE TABLE `tbgallery` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `caption` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbgallery`
--

INSERT INTO `tbgallery` (`image_id`, `user_id`, `filename`, `caption`) VALUES
(10, 1, 'Screenshot (34).png', 'My VIO202 project!!!'),
(11, 1, 'Screenshot (35).png', 'plagiarism forms'),
(12, 1, 'Screenshot (36).png', 'plagiarism forms'),
(13, 1, 'Screenshot (37).png', 'plagiarism forms'),
(14, 1, 'Screenshot (43).png', 'My font'),
(15, 2, 'african-elephant.jpg', 'My babies'),
(16, 2, 'giraffe.jpg', 'My babies'),
(17, 2, 'panda.jpg', 'My babies'),
(18, 2, 'prairiedog.jpg', 'My babies'),
(19, 2, 'sloth.jpg', 'My babies'),
(20, 1, '106.png', ''),
(21, 3, '1577990689302.jpg', ''),
(22, 3, '1603827652945.jpg', ''),
(23, 5, 'IMG_20200112_130728_758.jpg', ''),
(24, 4, 'L24.png', 'Gotta catch em all'),
(25, 6, '547.png', ''),
(26, 6, 'L03.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
