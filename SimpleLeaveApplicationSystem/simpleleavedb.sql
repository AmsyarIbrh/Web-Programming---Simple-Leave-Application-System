-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleleavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` varchar(5) NOT NULL,
  `dName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `dName`) VALUES
('A001', 'Operations'),
('A002', 'Management'),
('A003', 'General'),
('A004', 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leaveID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dID` varchar(255) NOT NULL,
  `leavedate` date NOT NULL,
  `leavereason` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `numDay` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leaveID`, `name`, `email`, `dID`, `leavedate`, `leavereason`, `status`, `numDay`) VALUES
(1, 'AAINAA ATHIRAH BINTI ISHAK', 'aainaa@gmail.com', 'A004', '2021-07-07', '<p>Urgent Leave</p>\r\n', 1, 4),
(2, 'IKMAL KAMIL BIN MOHD KAMIL', 'ikmal@gmail.com', 'A002', '2021-07-04', '<p>To attend my friend&#39;s funeral</p>\r\n', 3, 5),
(6, 'AISYAH ELYANA BINTI ISMAIL', 'aisyah@gmail.com', 'A003', '2023-06-29', 'Medical leave', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateofBirth` varchar(30) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `dID` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(333) NOT NULL,
  `state` varchar(30) NOT NULL,
  `street` varchar(150) NOT NULL,
  `postcode` int(5) NOT NULL,
  `leaveDay` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `dateofBirth`, `telNo`, `dID`, `role`, `email`, `password`, `state`, `street`, `postcode`, `leaveDay`) VALUES
(1, 'AISYAH ELYANA BINTI ISMAIL ', '22/08/1994 ', '0123456789 ', 'A003', 'Staff', 'aisyah@gmail.com  ', 'aisyah1234 ', 'Johor ', 'Unit 213, Jalan Iskandar Height  ', 81310, 25),
(2, 'IKMAL BIN MOHD KAMIL', '12/03/1997', '0138322231', 'A002', 'Manager', 'ikmal@gmail.com', 'ikmal1234', 'Terengganu', 'Unit 175, Jalan Semberong Kanan', 61723, 30),
(3, 'AAINAA ATHIRAH BINTI ISHAK', '19/08/2002', '0198763424', 'A004', 'Staff', 'aainaa@gmail.com', 'aainaa1234', 'Negeri Sembilan', 'No 12, Jalan Seremban Height', 71400, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leaveID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leaveID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
