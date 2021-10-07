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
-- Indexes for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbposts`
--
ALTER TABLE `tbposts`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbposts`
--
ALTER TABLE `tbposts`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
