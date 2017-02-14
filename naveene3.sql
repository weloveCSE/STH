-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 12:21 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naveene3`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `sno` int(11) NOT NULL,
  `id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`sno`, `id`, `name`, `branch`, `year`) VALUES
(1, 'B121250', 'Naveen Kumar', 'CSE', 'E3'),
(2, 'B121254', 'Sangameshwar', 'CSE', 'E3'),
(3, 'B121353', 'Evaro', 'EEE', 'E2');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `sno` int(11) NOT NULL,
  `id` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`sno`, `id`, `subject`, `marks`) VALUES
(1, 'B121250', 'DBMS', 78),
(2, 'B121250', 'JAVA', 89),
(3, 'B121250', 'C', 98),
(4, 'B121250', 'PYTHON', 78),
(5, 'B121253', 'DBMS', 88),
(6, 'B121253', 'JAVA', 80),
(7, 'B121253', 'C', 78),
(8, 'B121253', 'PYTHON', 70),
(9, 'B121254', 'DBMS', 88),
(10, 'B121254', 'JAVA', 80),
(11, 'B121353', 'C', 78),
(12, 'B121353', 'PYTHON', 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`id`,`subject`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
