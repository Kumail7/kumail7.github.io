-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 12:35 AM
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
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `rollno` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `class` int(4) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `assessment1` int(4) DEFAULT NULL,
  `midterm` int(4) DEFAULT NULL,
  `assessment2` int(4) DEFAULT NULL,
  `final` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`rollno`, `sname`, `class`, `subject`, `assessment1`, `midterm`, `assessment2`, `final`) VALUES
(1, 'Student1', 1, 'English', 0, 0, 0, 0),
(1, 'Student1', 1, 'Urdu', 0, 0, 0, 0),
(1, 'Student1', 1, 'Islamiyat', 0, 0, 0, 0),
(1, 'Student1', 1, 'Science', 0, 0, 0, 0),
(1, 'Student1', 1, 'Maths', 0, 0, 0, 0),
(1, 'Student1', 1, 'Computer', 0, 0, 0, 0),
(1, 'Student1', 1, 'SST', 0, 0, 0, 0),

(2, 'Student2', 1, 'English', 0, 0, 0, 0),
(2, 'Student2', 1, 'Urdu', 0, 0, 0, 0),
(2, 'Student2', 1, 'Islamiyat', 0, 0, 0, 0),
(2, 'Student2', 1, 'Science', 0, 0, 0, 0),
(2, 'Student2', 1, 'Maths', 0, 0, 0, 0),
(2, 'Student2', 1, 'Computer', 0, 0, 0, 0),
(2, 'Student2', 1, 'SST', 0, 0, 0, 0),
(3, 'Student3', 2, 'English', 0, 0, 0, 0),
(3, 'Student3', 2, 'Urdu', 0, 0, 0, 0),
(3, 'Student3', 2, 'Islamiyat', 0, 0, 0, 0),
(3, 'Student3', 2, 'Science', 0, 0, 0, 0),
(3, 'Student3', 2, 'Maths', 0, 0, 0, 0),
(3, 'Student3', 2, 'Computer', 0, 0, 0, 0),
(3, 'Student3', 2, 'SST', 0, 0, 0, 0),
(4, 'Student4', 2, 'Student4li', 0, 0, 0, 0),
(4, 'Student4', 2, 'Urdu', 0, 0, 0, 0),
(4, 'Student4', 2, 'Islamiyat', 0, 0, 0, 0),
(4, 'Student4', 2, 'Science', 0, 0, 0, 0),
(4, 'Student4', 2, 'Maths', 0, 0, 0, 0),
(4, 'Student4', 2, 'Computer', 0, 0, 0, 0),
(4, 'Student4', 2, 'SST', 0, 0, 0, 0),
(5, 'Student5', 3, 'English', 0, 0, 0, 0),
(5, 'Student5', 3, 'Urdu', 0, 0, 0, 0),
(5, 'Student5', 3, 'Islamiyat', 0, 0, 0, 0),
(5, 'Student5', 3, 'Science', 0, 0, 0, 0),
(5, 'Student5', 3, 'Maths', 0, 0, 0, 0),
(5, 'Student5', 3, 'Computer', 0, 0, 0, 0),
(5, 'Student5', 3, 'SST', 0, 0, 0, 0),
(6, 'Student6', 3, 'English', 0, 0, 0, 0),
(6, 'Student6', 3, 'Urdu', 0, 0, 0, 0),
(6, 'Student6', 3, 'Islamiyat', 0, 0, 0, 0),
(6, 'Student6', 3, 'Science', 0, 0, 0, 0),
(6, 'Student6', 3, 'Maths', 0, 0, 0, 0),
(6, 'Student6', 3, 'Computer', 0, 0, 0, 0),
(6, 'Student6', 3, 'SST', 0, 0, 0, 0),
(7, 'Student7', 4, 'English', 0, 0, 0, 0),
(7, 'Student7', 4, 'Urdu', 0, 0, 0, 0),
(7, 'Student7', 4, 'Islamiyat', 0, 0, 0, 0),
(7, 'Student7', 4, 'Science', 0, 0, 0, 0),
(7, 'Student7', 4, 'Maths', 0, 0, 0, 0),
(7, 'Student7', 4, 'Computer', 0, 0, 0, 0),
(7, 'Student7', 4, 'SST', 0, 0, 0, 0),
(8, 'Student8', 4, 'English', 0, 0, 0, 0),
(8, 'Student8', 4, 'Urdu', 0, 0, 0, 0),
(8, 'Student8', 4, 'Islamiyat', 0, 0, 0, 0),
(8, 'Student8', 4, 'Science', 0, 0, 0, 0),
(8, 'Student8', 4, 'Maths', 0, 0, 0, 0),
(8, 'Student8', 4, 'Computer', 0, 0, 0, 0),
(8, 'Student8', 4, 'SST', 0, 0, 0, 0),
(9, 'Student9', 5, 'English', 0, 0, 0, 0),
(9, 'Student9', 5, 'Urdu', 0, 0, 0, 0),
(9, 'Student9', 5, 'Islamiyat', 0, 0, 0, 0),
(9, 'Student9', 5, 'Science', 0, 0, 0, 0),
(9, 'Student9', 5, 'Maths', 0, 0, 0, 0),
(9, 'Student9', 5, 'Computer', 0, 0, 0, 0),
(9, 'Student9', 5, 'SST', 0, 0, 0, 0),
(10, 'Student10', 5, 'English', 0, 0, 0, 0),
(10, 'Student10', 5, 'Urdu', 0, 0, 0, 0),
(10, 'Student10', 5, 'Islamiyat', 0, 0, 0, 0),
(10, 'Student10', 5, 'Science', 0, 0, 0, 0),
(10, 'Student10', 5, 'Maths', 0, 0, 0, 0),
(10, 'Student10', 5, 'Computer', 0, 0, 0, 0),
(10, 'Student10', 5, 'SST', 0, 0, 0, 0),
(11, 'Student11', 6, 'English', 0, 0, 0, 0),
(11, 'Student11', 6, 'Urdu', 0, 0, 0, 0),
(11, 'Student11', 6, 'Islamiyat', 0, 0, 0, 0),
(11, 'Student11', 6, 'Science', 0, 0, 0, 0),
(11, 'Student11', 6, 'Maths', 0, 0, 0, 0),
(11, 'Student11', 6, 'Computer', 0, 0, 0, 0),
(11, 'Student11', 6, 'SST', 0, 0, 0, 0),
(12, 'Student12', 6, 'English', 0, 0, 0, 0),
(12, 'Student12', 6, 'Urdu', 0, 0, 0, 0),
(12, 'Student12', 6, 'Islamiyat', 0, 0, 0, 0),
(12, 'Student12', 6, 'Science', 0, 0, 0, 0),
(12, 'Student12', 6, 'Maths', 0, 0, 0, 0),
(12, 'Student12', 6, 'Computer', 0, 0, 0, 0),
(12, 'Student12', 6, 'SST', 0, 0, 0, 0),
(13, 'Student13', 7, 'English', 0, 0, 0, 0),
(13, 'Student13', 7, 'Urdu', 0, 0, 0, 0),
(13, 'Student13', 7, 'Islamiyat', 0, 0, 0, 0),
(13, 'Student13', 7, 'Science', 0, 0, 0, 0),
(13, 'Student13', 7, 'Maths', 0, 0, 0, 0),
(13, 'Student13', 7, 'Computer', 0, 0, 0, 0),
(13, 'Student13', 7, 'SST', 0, 0, 0, 0),
(14, 'Student14', 7, 'English', 0, 0, 0, 0),
(14, 'Student14', 7, 'Urdu', 0, 0, 0, 0),
(14, 'Student14', 7, 'Islamiyat', 0, 0, 0, 0),
(14, 'Student14', 7, 'Science', 0, 0, 0, 0),
(14, 'Student14', 7, 'Maths', 0, 0, 0, 0),
(14, 'Student14', 7, 'Computer', 0, 0, 0, 0),
(14, 'Student14', 7, 'SST', 0, 0, 0, 0),
(15, 'Student15', 8, 'English', 0, 0, 0, 0),
(15, 'Student15', 8, 'Urdu', 0, 0, 0, 0),
(15, 'Student15', 8, 'Physics', 0, 0, 0, 0),
(15, 'Student15', 8, 'Chemistry', 0, 0, 0, 0),
(15, 'Student15', 8, 'Maths', 0, 0, 0, 0),
(15, 'Student15', 8, 'Computer', 0, 0, 0, 0),
(15, 'Student15', 8, 'Pakistan S', 0, 0, 0, 0),
(15, 'Student15', 8, 'Islamiyat', 0, 0, 0, 0),
(16, 'Student16', 8, 'English', 0, 0, 0, 0),
(16, 'Student16', 8, 'Urdu', 0, 0, 0, 0),
(16, 'Student16', 8, 'Physics', 0, 0, 0, 0),
(16, 'Student16', 8, 'Chemistry', 0, 0, 0, 0),
(16, 'Student16', 8, 'Maths', 0, 0, 0, 0),
(16, 'Student16', 8, 'Computer', 0, 0, 0, 0),
(16, 'Student16', 8, 'Pakistan S', 0, 0, 0, 0),
(16, 'Student16', 8, 'Islamiyat', 0, 0, 0, 0),
(17, 'Student17', 9, 'English', 0, 0, 0, 0),
(17, 'Student17', 9, 'Urdu', 0, 0, 0, 0),
(17, 'Student17', 9, 'Physics', 0, 0, 0, 0),
(17, 'Student17', 9, 'Chemistry', 0, 0, 0, 0),
(17, 'Student17', 9, 'Maths', 0, 0, 0, 0),
(17, 'Student17', 9, 'Computer', 0, 0, 0, 0),
(17, 'Student17', 9, 'Pakistan S', 0, 0, 0, 0),
(17, 'Student17', 9, 'Islamiyat', 0, 0, 0, 0),
(18, 'Student18', 9, 'English', 0, 0, 0, 0),
(18, 'Student18', 9, 'Urdu', 0, 0, 0, 0),
(18, 'Student18', 9, 'Physics', 0, 0, 0, 0),
(18, 'Student18', 9, 'Chemistry', 0, 0, 0, 0),
(18, 'Student18', 9, 'Maths', 0, 0, 0, 0),
(18, 'Student18', 9, 'Computer', 0, 0, 0, 0),
(18, 'Student18', 9, 'Pakistan S', 0, 0, 0, 0),
(18, 'Student18', 9, 'Islamiyat', 0, 0, 0, 0),
(19, 'Student', 10, 'English', 0, 0, 0, 0),
(19, 'Student', 10, 'Urdu', 0, 0, 0, 0),
(19, 'Student', 10, 'Physics', 0, 0, 0, 0),
(19, 'Student', 10, 'Chemistry', 0, 0, 0, 0),
(19, 'Student', 10, 'Maths', 0, 0, 0, 0),
(19, 'Student', 10, 'Computer', 0, 0, 0, 0),
(19, 'Student', 10, 'Pakistan S', 0, 0, 0, 0),
(19, 'Student', 10, 'Islamiyat', 0, 0, 0, 0),
(20, 'Student', 10, 'English', 0, 0, 0, 0),
(20, 'Student', 10, 'Urdu', 0, 0, 0, 0),
(20, 'Student', 10, 'Physics', 0, 0, 0, 0),
(20, 'Student', 10, 'Chemistry', 0, 0, 0, 0),
(20, 'Student', 10, 'Maths', 0, 0, 0, 0),
(20, 'Student', 10, 'Computer', 0, 0, 0, 0),
(20, 'Student', 10, 'Pakistan S', 0, 0, 0, 0),
(20, 'Student', 10, 'Islamiyat', 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
