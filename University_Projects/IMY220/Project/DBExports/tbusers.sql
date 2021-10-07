-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 05:56 AM
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
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`user_id`, `name`, `surname`, `email`, `username`, `password`, `profile_photo`) VALUES
(1, 'John', 'Doe', 'John@Doe13.com', 'JohnDoe12', '1234', '029.png'),
(2, 'BoBo', 'Dakes', 'BoBo@Dakes.com', 'BoDakes', '1234', 'unknown.png'),
(3, 'Matthew', 'Reed', 'awes@masekin.org', 'MattReed01', '5678', 'IMG_20191117_132720.jpg'),
(4, 'Wesley', 'Snipes', 'wessnipes@oscars.gov', 'Gh05t', '1357', 'unknown.png'),
(5, 'Will', 'Smith', 'BigWillieSmith@belair.com', 'FreshPrince', '4321', 'unknown.png'),
(6, 'carlton', 'banks', 'cbanks@belair.org', 'NastyC', '1357', 'unknown.png'),
(7, 'test', 'one', 'test@one.com', 'test1', '1111', '499.png'),
(8, 'testTwo', 'three', 'TestTwo@Three.gov', '32Test', '2323', '583.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
