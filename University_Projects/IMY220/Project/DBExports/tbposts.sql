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
-- Table structure for table `tbposts`
--

CREATE TABLE `tbposts` (
  `comment_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbposts`
--

INSERT INTO `tbposts` (`comment_id`, `image_id`, `user_id`, `comments`) VALUES
(1, 19, 1, 'Samuel the sloth?'),
(2, 19, 1, 'Samuel the sloth?'),
(3, 19, 1, 'Samuel the sloth?'),
(4, 19, 1, 'Samuel the sloth?'),
(5, 19, 1, 'Samuel the sloth?'),
(9, 18, 1, 'Nope, its not'),
(10, 15, 1, 'woohooo'),
(11, 10, 1, 'wubba lubba dub dub'),
(12, 17, 1, 'Super Cool Kanye'),
(13, 16, 1, 'This is definitely a zebra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbposts`
--
ALTER TABLE `tbposts`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbposts`
--
ALTER TABLE `tbposts`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
