-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 10:19 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `address`, `email`, `phone`, `password`) VALUES
(2, 'Samuel', 'ome', 'CT101/G/3111/17', 'dfdf', 'swangai7178@gmail.com', '0708719638', '332532dcfaa1cbf61e2a266bd723612c'),
(3, 'wariungu', 'karwetha', 'kk', '435677h', 'kar@gmail.com', '0700620776', '332532dcfaa1cbf61e2a266bd723612c');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(9, 'penelope', '2021-06-17', '2021-06-27 21:01:17', '2021-06-27 21:01:17', 1),
(10, 'meetin ', '2021-10-20', '2021-06-27 21:14:56', '2021-06-27 21:14:56', 1),
(11, 'results release', '2021-10-15', '2021-06-27 21:16:04', '2021-06-27 21:16:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaveapp`
--

CREATE TABLE `leaveapp` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tsnumber` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`id`, `username`, `tsnumber`, `county`, `name`, `reason`, `start`, `end`) VALUES
(1, 'kisiriri123', '3023', 'Laikipia', 'lucy', 'medical reasons', '2021-07-16', '2021-07-30'),
(3, 'kisiriri123', '30237', 'Laikipia', 'worker', 'family emergency', '2021-07-24', '2021-07-30'),
(5, 'kisiriri123', '3023', 'Laikipia', 'lucy', 'salary', '2021-07-28', '2021-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `boys` int(255) NOT NULL,
  `girls` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `boys`, `girls`) VALUES
(1, 'rumurutiDEB', 581, 453),
(3, 'kisiriri123', 131, 126),
(4, 'kutusmuni', 1000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subadmin`
--

INSERT INTO `subadmin` (`id`, `fname`, `lname`, `username`, `address`, `email`, `phone`, `password`) VALUES
(1, 'lisa', 'simpson', 'Laikipia', '24-20321', 'lisa@gmail.com', '0708556478', '332532dcfaa1cbf61e2a266bd723612c');

-- --------------------------------------------------------

--
-- Table structure for table `tallyteachers`
--

CREATE TABLE `tallyteachers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `male` int(255) NOT NULL,
  `female` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tallyteachers`
--

INSERT INTO `tallyteachers` (`id`, `username`, `male`, `female`) VALUES
(1, 'kisiriri123', 15, 7),
(2, 'rumurutiDEB', 15, 25),
(4, 'kutusmuni', 50, 27);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tsnumber` varchar(255) NOT NULL,
  `resident` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `name`, `tsnumber`, `resident`) VALUES
(1, 'kisiriri123', 'worker', '30237', 'samburu'),
(2, 'kisiriri123', 'lucy', '3023', 'nyeri'),
(3, 'kisiriri123', 'muriuki summers', '37304803', 'rumuruti'),
(4, 'rumurutiDEB', 'Godi', '565656', 'turkana'),
(5, 'kisiriri123', 'simon kinyua', '302065', 'rumuruti'),
(6, 'kisiriri123', 'truman', '5677899', 'samburu'),
(7, 'kisiriri123', 'trevour', '87642', 'samburu');

-- --------------------------------------------------------

--
-- Table structure for table `usermessages`
--

CREATE TABLE `usermessages` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermessages`
--

INSERT INTO `usermessages` (`id`, `username`, `mobile`, `message`) VALUES
(1, 'kisiriri123', '0708719638', 'when is the inspection for laikipia county\r\n'),
(2, 'kisiriri123', '0708719638', 'reulksueurriu'),
(3, 'kisiriri123', '0708719638', 'hello\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE `userregister` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `county` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`id`, `fname`, `lname`, `county`, `username`, `address`, `email`, `phone`, `password`) VALUES
(2, 'rumuruti primary', 'Mrs. mwangi', 'Laikipia', 'rumurutiDEB', '11-20321', 'miriamome@gmail.com', '0700620776', '332532dcfaa1cbf61e2a266bd723612c'),
(3, 'kisiriri primary', 'mr mwangi', 'Laikipia', 'kisiriri123', '100-20321', 'stephenmwangi100@gmail.com', '0725651535', '332532dcfaa1cbf61e2a266bd723612c'),
(4, 'Kutus municipality', 'samuel', 'Kirinyaga', 'kutusmuni', '78', 'kutus@gmail.com', '0708556478', '332532dcfaa1cbf61e2a266bd723612c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tallyteachers`
--
ALTER TABLE `tallyteachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregister`
--
ALTER TABLE `userregister`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tallyteachers`
--
ALTER TABLE `tallyteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userregister`
--
ALTER TABLE `userregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userregister` (`username`);

--
-- Constraints for table `tallyteachers`
--
ALTER TABLE `tallyteachers`
  ADD CONSTRAINT `tallyteachers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `students` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
