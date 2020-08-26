-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 12:32 AM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `rollno` int(4) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `fathersname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` int(11) UNSIGNED ZEROFILL NOT NULL,
  `class` int(2) NOT NULL,
  `fees` int(5) NOT NULL,
  `basefee` int(5) NOT NULL,
  `feestatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `sname`, `fathersname`, `username`, `password`, `phone`, `class`, `fees`, `basefee`, `feestatus`) VALUES
(1, 'Student1', 'Father1', 'student1', 'student1', 00000000336, 1, 30000, 30000, 0),
(2, 'Student2', 'Father2', 'student2', 'student2', 00000000336, 1, 30000, 30000, 0),
(3, 'Student3', 'Father3', 'student3', 'student3', 00000000336, 2, 30000, 30000, 0),
(4, 'Student4', 'Father4', 'student4', 'student4', 00000000336, 2, 30000, 30000, 0),
(5, 'Student5', 'Father5', 'student5', 'student5', 00000000336, 3, 30000, 30000, 0),
(6, 'Student6', 'Father6', 'student6', 'student6', 00000000336, 3, 30000, 30000, 0),
(7, 'Student7', 'Father7', 'student7', 'student7', 00000000336, 4, 30000, 30000, 0),
(8, 'Student8', 'Father8', 'student8', 'student8', 00000000336, 4, 30000, 30000, 0),
(9, 'Student9', 'Father9', 'student9', 'student9', 00000000336, 5, 30000, 30000, 0),
(10, 'Student10', 'Father10', 'student10', 'student10', 00000000336, 5, 30000, 30000, 0),
(11, 'Student11', 'Father11', 'student11', 'student11', 00000000336, 6, 30000, 30000, 0),
(12, 'Student12', 'Father12', 'student12', 'student12', 00000000336, 6, 30000, 30000, 0),
(13, 'Student13', 'Father13', 'student13', 'student13', 00000000336, 7, 30000, 30000, 0),
(14, 'Student14', 'Father14', 'student14', 'student14', 00000000336, 7, 30000, 30000, 0),
(15, 'Student15', 'Father15', 'student15', 'student15', 00000000336, 8, 30000, 30000, 0),
(16, 'Student16', 'Father16', 'student16', 'student16', 00000000336, 8, 30000, 30000, 0),
(17, 'Student17', 'Father17', 'student17', 'student17', 00000000336, 9, 30000, 30000, 0),
(18, 'Student18', 'Father18', 'student18', 'student18', 00000000336, 9, 30000, 30000, 0),
(19, 'Student19', 'Father19', 'student19', 'student19', 00000000336, 10, 30000, 30000, 0),
(20, 'Student20', 'Father20', 'student20', 'student20', 00000000336, 10, 30000, 30000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `rollno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
