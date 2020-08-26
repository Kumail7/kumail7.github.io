-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 12:56 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `role`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(4) NOT NULL,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `announcement` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `time`, `announcement`) VALUES
(3, '2020-05-16 18:22:06.576787', 'First Announcement'),
(4, '2020-05-18 18:04:10.267364', 'Banno');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class` int(4) NOT NULL,
  `teacherId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class`, `teacherId`) VALUES
(1, 76),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

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

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectId` int(5) NOT NULL,
  `subjectname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectId`, `subjectname`) VALUES
(171, 'English'),
(172, 'Urdu'),
(173, 'Islamiyat'),
(174, 'Science'),
(175, 'Maths'),
(176, 'Computer'),
(177, 'SST'),
(101, 'English'),
(102, 'Urdu'),
(103, 'Physics'),
(104, 'Chemistry'),
(105, 'Maths'),
(106, 'Computer'),
(107, 'PST'),
(108, 'Islamiyat');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `subjectId` int(10) NOT NULL,
  `subjectname` varchar(20) NOT NULL,
  `classteacher` int(3) DEFAULT NULL,
  `salary` int(10) NOT NULL,
  `basesalary` int(10) NOT NULL,
  `phonenumber` int(11) UNSIGNED ZEROFILL NOT NULL,
  `salarystatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `username`, `password`, `subjectId`, `subjectname`, `classteacher`, `salary`, `basesalary`, `phonenumber`, `salarystatus`) VALUES
(1, 'Teacher1', 'teacher1', 'teacher1', 171, 'English', 1, 30000, 30000, 00000000123, 0),
(2, 'Teacher2', 'teacher2', 'teacher2', 172, 'Urdu', 2, 60000, 30000, 00000000336, 0),
(3, 'Teacher3', 'teacher3', 'teacher3', 173, 'Islamiyat', 3, 60000, 30000, 00000000336, 0),
(4, 'Teacher4', 'teacher4', 'teacher4', 174, 'Science', 4, 60000, 30000, 00000000336, 0),
(5, 'Teacher5', 'teacher5', 'teacher5', 175, 'Maths', 5, 60000, 30000, 00000000336, 0),
(6, 'Teacher6', 'teacher6', 'teacher6', 176, 'Computer', 6, 60000, 30000, 00000000336, 0),
(7, 'Teacher7', 'teacher7', 'teacher7', 177, 'SST', 7, 60000, 30000, 00000000336, 0),
(8, 'Teacher8', 'teacher8', 'teacher8', 101, 'English', 8, 60000, 30000, 00000000336, 0),
(9, 'Teacher9', 'teacher9', 'teacher9', 102, 'Urdu', NULL, 60000, 30000, 00000000336, 0),
(10, 'Teacher10', 'teacher10', 'teacher10', 103, 'Islamiyat', NULL, 60000, 30000, 00000000336, 0),
(11, 'Teacher11', 'teacher11', 'teacher11', 104, 'Physics', 10, 60000, 30000, 00000000336, 0),
(12, 'Teacher12', 'teacher12', 'teacher12', 105, 'Chemistry', NULL, 60000, 30000, 00000000336, 0),
(13, 'Teacher13', 'teacher13', 'teacher13', 106, 'Maths', 9, 60000, 30000, 00000000336, 0),
(14, 'Teacher14', 'teacher14', 'teacher14', 107, 'Computer', NULL, 60000, 30000, 00000000336, 0),
(15, 'Teacher15', 'teacher15', 'teacher15', 108, 'Pakistan Studies', NULL, 60000, 30000, 00000000336, 0),
(33, '1', '1', '123', 1, '1', NULL, 1, 1, 00000000001, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacherattendance`
--

CREATE TABLE `teacherattendance` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `presents` int(3) NOT NULL,
  `absents` int(3) NOT NULL,
  `leaves` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `attendance` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherattendance`
--

INSERT INTO `teacherattendance` (`id`, `name`, `presents`, `absents`, `leaves`, `total`, `attendance`) VALUES
(1, 'Teacher1', 0, 0, 0, 0, 0.00),
(2, 'Teacher2', 0, 0, 0, 0, 0.00),
(3, 'Teacher3', 0, 0, 0, 0, 0.00),
(4, 'Teacher4', 0, 0, 0, 0, 0.00),
(5, 'Teacher5', 0, 0, 0, 0, 0.00),
(6, 'Teacher6', 0, 0, 0, 0, 0.00),
(7, 'Teacher7', 0, 0, 0, 0, 0.00),
(8, 'Teacher8', 0, 0, 0, 0, 0.00),
(9, 'Teacher9', 0, 0, 0, 0, 0.00),
(10, 'Teacher10', 0, 0, 0, 0, 0.00),
(11, 'Teacher11', 0, 0, 0, 0, 0.00),
(12, 'Teacher12', 0, 0, 0, 0, 0.00),
(13, 'Teacher13', 0, 0, 0, 0, 0.00),
(14, 'Teacher14', 0, 0, 0, 0, 0.00),
(15, 'Teacher15', 0, 0, 0, 0, 0.00),
(33, '1', 0, 0, 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `routeId` int(4) NOT NULL,
  `driver` varchar(20) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `route` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`routeId`, `driver`, `phonenumber`, `route`) VALUES
(1, 'Driver1', 123456789, 'DHA'),
(2, 'Driver2', 90078601, 'PECHS'),
(3, 'Driver3', 90078601, 'Gulshan-e-Iqbal'),
(4, 'Driver4', 90078601, 'Gulistan-e-Jauhar'),
(5, 'Driver5', 90078601, 'North Nazimabad'),
(6, 'Driver6', 90078601, 'FB-Area'),
(7, 'Driver7', 90078601, 'Malir'),
(8, 'Driver8', 90078601, 'Super Highway'),
(9, 'Driver9', 90078601, 'Shahrah-e-Faisal'),
(10, 'Driver10', 90078601, 'Gulbreg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `studentattendance`
--
ALTER TABLE `studentattendance`
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`routeId`),
  ADD UNIQUE KEY `routeId` (`routeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `routeId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
