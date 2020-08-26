-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 12:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentattendance`
--

CREATE TABLE `studentattendance` (
  `rollno` int(4) NOT NULL,
  `tId` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` int(2) NOT NULL,
  `presents` int(2) NOT NULL,
  `absents` int(2) NOT NULL,
  `leaves` int(3) NOT NULL,
  `total` int(2) NOT NULL,
  `attendance` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentattendance`
--

INSERT INTO `studentattendance` (`rollno`, `tId`, `name`, `class`, `presents`, `absents`, `leaves`, `total`, `attendance`) VALUES
(1, 1, 'Student1', 1, 0, 0, 0, 0, 0.00),
(2, 1, 'Student2', 1, 0, 0, 0, 0, 0.00),
(3, 2, 'Student3', 2, 0, 0, 0, 0, 0.00),
(4, 2, 'Student4', 2, 0, 0, 0, 0, 0.00),
(5, 2, 'Student5', 2, 0, 0, 0, 0, 0.00),
(6, 3, 'Student6', 3, 0, 0, 0, 0, 0.00),
(7, 4, 'Student7', 4, 0, 0, 0, 0, 0.00),
(8, 4, 'Student8', 4, 0, 0, 0, 0, 0.00),
(9, 5, 'Student9', 5, 0, 0, 0, 0, 0.00),
(10, 5, 'Student10', 5, 0, 0, 0, 0, 0.00),
(11, 6, 'Student11', 6, 0, 0, 0, 0, 0.00),
(12, 6, 'Student12', 6, 0, 0, 0, 0, 0.00),
(13, 7, 'Student13', 7, 0, 0, 0, 0, 0.00),
(14, 7, 'Student14', 7, 0, 0, 0, 0, 0.00),
(15, 8, 'Student15', 8, 0, 0, 0, 0, 0.00),
(16, 8, 'Student16', 8, 0, 0, 0, 0, 0.00),
(17, 9, 'Student17', 9, 0, 0, 0, 0, 0.00),
(18, 9, 'Student18', 9, 0, 0, 0, 0, 0.00),
(19, 10, 'Student19', 10, 0, 0, 0, 0, 0.00),
(20, 10, 'Student20', 10, 0, 0, 0, 0, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD UNIQUE KEY `rollno` (`rollno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
