-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2019 at 06:30 PM
-- Server version: 8.0.15
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `ADMIN_ID` int(11) NOT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`ADMIN_ID`, `PASSWORD`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Bill_History`
--

CREATE TABLE `Bill_History` (
  `Type` varchar(255) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `DATE` date NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Bill_History`
--

INSERT INTO `Bill_History` (`Type`, `STUDENT_ID`, `ROOM_ID`, `AMOUNT`, `DATE`, `DESCRIPTION`) VALUES
('Fine Bill', 14, 2, 1000, '2019-07-11', 'Fine Bill for Absenting 2019-07-18'),
('Fine Bill', 13, 1, 1000, '2019-07-17', 'Fine Bill for Absenting 2019-07-24'),
('Fine Bill', 14, 2, 1000, '2019-07-17', 'Fine Bill for Absenting 2019-07-24'),
('Fine Bill', 17, 5, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 15, 3, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 16, 4, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 17, 5, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 15, 3, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 16, 4, 1000, '2019-07-22', 'Fine Bill for Absenting 2019-07-22'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 15, 3, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 15, 3, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 15, 3, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 15, 3, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 13, 1, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 14, 2, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 16, 4, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 18, 6, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23'),
('Fine Bill', 17, 5, 1000, '2019-07-23', 'Fine Bill for Absenting 2019-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `FEES`
--

CREATE TABLE `FEES` (
  `No` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `Type` text NOT NULL,
  `DUE_DATE` date DEFAULT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `FEES`
--

INSERT INTO `FEES` (`No`, `STUDENT_ID`, `ROOM_ID`, `Type`, `DUE_DATE`, `AMOUNT`, `ADMIN_ID`, `DESCRIPTION`) VALUES
(2, 15, 3, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(3, 17, 5, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(4, 15, 3, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(5, 18, 6, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(6, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(7, 14, 2, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(8, 17, 5, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(9, 18, 6, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(10, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(11, 17, 5, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(12, 13, 1, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(13, 15, 3, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(14, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(15, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(16, 15, 3, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(17, 16, 4, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(18, 18, 6, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(19, 14, 2, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(20, 13, 1, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(21, 16, 4, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(22, 17, 5, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(23, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(24, 14, 2, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(25, 13, 1, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(26, 16, 4, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(27, 18, 6, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(28, 13, 1, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(29, 14, 2, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(30, 16, 4, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(31, 15, 3, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(32, 13, 1, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(33, 18, 6, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(34, 15, 3, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(35, 17, 5, 'Absent', '2019-07-30', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(36, 13, 1, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(37, 14, 2, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(38, 16, 4, 'Late', '2019-07-30', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(39, 13, 1, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(40, 17, 5, 'Absent', '2019-07-25', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(41, 17, 5, 'Absent', '2019-07-25', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(42, 17, 5, 'Absent', '2019-07-25', 1000, NULL, 'Fine Bill for Absenting 2019-07-23'),
(43, 14, 2, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(44, 16, 4, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(45, 18, 6, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(46, 14, 2, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(47, 16, 4, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(48, 18, 6, 'Late', '2019-07-25', 1000, NULL, 'Fine Bill for Late 2019-07-23'),
(49, 17, 5, 'Absent', '2019-07-25', 1000, NULL, 'Fine Bill for Absenting 2019-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `HOSTEL`
--

CREATE TABLE `HOSTEL` (
  `HOSTEL_ID` int(11) NOT NULL,
  `HOSTEL_NAME` varchar(30) DEFAULT NULL,
  `LOCATION` varchar(30) DEFAULT NULL,
  `ROOMS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pending`
--

CREATE TABLE `Pending` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Requested_DATE` date DEFAULT NULL,
  `SetUp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Pending`
--

INSERT INTO `Pending` (`id`, `name`, `email`, `year`, `roll`, `address`, `Requested_DATE`, `SetUp`) VALUES
(21, 'Hein Hein', 'hein@gmail.com', 'Fourth Year', '4CT - 3', 'Pyay Road,Yangon,Flag of Yangon Division.svg	Yangon Region', '2019-07-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ROOM`
--

CREATE TABLE `ROOM` (
  `ROOM_CATEGORY` varchar(30) DEFAULT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `HOSTEL_ID` int(11) DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `STUDENT_ID` int(11) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `ROOM_STATUS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ROOM`
--

INSERT INTO `ROOM` (`ROOM_CATEGORY`, `ROOM_ID`, `HOSTEL_ID`, `ADMIN_ID`, `STUDENT_ID`, `START_DATE`, `ROOM_STATUS`) VALUES
('Good', 1, NULL, NULL, 13, '2019-07-07', 'Available'),
('Good', 2, NULL, NULL, 14, '2019-07-08', 'Available'),
('Good', 3, NULL, NULL, 15, '2019-07-08', 'Available'),
('Good', 4, NULL, NULL, 16, '2019-07-08', 'Available'),
('Good', 5, NULL, NULL, 17, '2019-07-21', 'Available'),
('Good', 6, NULL, NULL, 18, '2019-07-23', 'Available'),
('Good', 7, NULL, NULL, 19, '2019-07-23', 'Available'),
('Good', 8, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 9, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 10, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 11, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 12, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 13, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 14, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 15, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 16, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 17, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 18, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 19, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 20, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 21, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 22, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 23, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 24, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 25, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 26, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 27, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 28, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 29, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 30, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 31, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 32, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 33, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 34, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 35, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 36, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 37, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 38, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 39, NULL, NULL, NULL, NULL, 'FREE'),
('Good', 40, NULL, NULL, NULL, NULL, 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `STUDENT_ID` int(11) NOT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `STUDENT_NAME` varchar(30) DEFAULT NULL,
  `ROLL_NO` varchar(255) DEFAULT NULL,
  `ADDRESS` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `PH_NO` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `MAJOR` varchar(30) DEFAULT NULL,
  `ROOM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `STUDENT`
--

INSERT INTO `STUDENT` (`STUDENT_ID`, `PASSWORD`, `STUDENT_NAME`, `ROLL_NO`, `ADDRESS`, `PH_NO`, `EMAIL`, `MAJOR`, `ROOM_ID`) VALUES
(13, 'mg', 'Mg', '5CN-1', 'Yangon', NULL, 'hi@gmail.com', NULL, 1),
(14, 'test', 'Test', '3', 'yangon ', NULL, 'test@gmail.com', NULL, 2),
(15, 'tom', 'tom', '3CS - 1', 'Yangon', NULL, 'tom@gmail.com', NULL, 3),
(16, 'jerry', 'jerry', '1CST - 1', 'Mandalay ', NULL, 'jerry@gmail.com', NULL, 4),
(17, 'tuntun', 'Tun Tun', '2CST-1', 'Pyay Road,Yangon,Flag of Yangon Division.svg	Yangon Region', NULL, 'tun@gmail.com', NULL, 5),
(18, 'mgmgmg', 'Mg Mg', '1CST-2', 'Mingalar,Mandalay,Mandalay Region', NULL, 'mgmg@gmail.com', '', 6),
(19, 'aungaung', 'Aung Aung', '4CT-2', 'Insein,Yangon,Flag of Yangon Division.svg	Yangon Region', NULL, 'aung@gmail.com', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Student_History`
--

CREATE TABLE `Student_History` (
  `Type` varchar(255) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Student_History`
--

INSERT INTO `Student_History` (`Type`, `STUDENT_ID`, `ROOM_ID`, `DATE`, `DESCRIPTION`) VALUES
('Attendance', 13, 1, '2019-07-23', 'Late'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Late'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Absent'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Absent'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Late'),
('Attendance', 16, 4, '2019-07-23', 'Late'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Late'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Late'),
('Attendance', 14, 2, '2019-07-23', 'Absent'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Late'),
('Attendance', 17, 5, '2019-07-23', 'Late'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Late'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Late'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Late'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Absent'),
('Attendance', 14, 2, '2019-07-23', 'Absent'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Absent'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Late'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Absent'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Late'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Absent'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Absent'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Late'),
('Attendance', 14, 2, '2019-07-23', 'Present'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Present'),
('Attendance', 17, 5, '2019-07-23', 'Present'),
('Attendance', 18, 6, '2019-07-23', 'Present'),
('Attendance', 20, 7, '2019-07-23', 'Present'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Late'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Late'),
('Attendance', 17, 5, '2019-07-23', 'Absent'),
('Attendance', 18, 6, '2019-07-23', 'Late'),
('Attendance', 20, 7, '2019-07-23', 'Absent'),
('Attendance', 13, 1, '2019-07-23', 'Present'),
('Attendance', 14, 2, '2019-07-23', 'Late'),
('Attendance', 15, 3, '2019-07-23', 'Present'),
('Attendance', 16, 4, '2019-07-23', 'Late'),
('Attendance', 17, 5, '2019-07-23', 'Absent'),
('Attendance', 18, 6, '2019-07-23', 'Late'),
('Attendance', 20, 7, '2019-07-23', 'Absent'),
('Started Date', 19, 7, '2019-07-23', 'NOTHING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `FEES`
--
ALTER TABLE `FEES`
  ADD PRIMARY KEY (`No`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`);

--
-- Indexes for table `HOSTEL`
--
ALTER TABLE `HOSTEL`
  ADD PRIMARY KEY (`HOSTEL_ID`);

--
-- Indexes for table `Pending`
--
ALTER TABLE `Pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ROOM`
--
ALTER TABLE `ROOM`
  ADD PRIMARY KEY (`ROOM_ID`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`),
  ADD KEY `HOSTEL_ID` (`HOSTEL_ID`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`STUDENT_ID`),
  ADD KEY `ROOM_ID` (`ROOM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FEES`
--
ALTER TABLE `FEES`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `Pending`
--
ALTER TABLE `Pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `STUDENT`
--
ALTER TABLE `STUDENT`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ROOM_ID`) REFERENCES `room` (`ROOM_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
