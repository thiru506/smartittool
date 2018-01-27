-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 07:41 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchId` int(11) NOT NULL,
  `mr_office` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchId`, `mr_office`) VALUES
(1, '13 Office'),
(2, 'KVH Office');

-- --------------------------------------------------------

--
-- Table structure for table `meetingrooms`
--

CREATE TABLE `meetingrooms` (
  `mrsId` int(11) NOT NULL,
  `mrName` varchar(50) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetingrooms`
--

INSERT INTO `meetingrooms` (`mrsId`, `mrName`, `branchId`) VALUES
(1, 'MR1 - 6S', 1),
(2, 'MR2 - VC/P - 5S', 1),
(3, 'Red Room VC/P/WB - 4S', 1),
(4, 'Yellow Room  WB - 4S', 1),
(5, 'Brown Room  P/A - 4S', 1),
(6, 'Conference Hall VC/WB/P - 4S', 1),
(8, 'Golden Room - P - 6S', 2),
(9, 'Diamond Room - P - 6S', 2),
(10, 'Ruby Room - P - 6S', 2),
(11, 'Platinum Room - P - 6S', 2),
(12, 'Conference Room - VC/WB/P - 30S', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `mId` int(11) NOT NULL,
  `mrId` int(11) NOT NULL,
  `mType` varchar(100) NOT NULL,
  `mPurpose` varchar(100) NOT NULL,
  `mnoattendees` int(11) NOT NULL,
  `mattendeesemails` varchar(250) NOT NULL,
  `mattendeesnames` varchar(250) NOT NULL,
  `9:00` tinyint(4) NOT NULL DEFAULT '0',
  `9:30` tinyint(4) NOT NULL DEFAULT '0',
  `10:00` tinyint(4) NOT NULL DEFAULT '0',
  `10:30` tinyint(4) NOT NULL DEFAULT '0',
  `11:00` tinyint(4) NOT NULL DEFAULT '0',
  `11:30` tinyint(4) NOT NULL DEFAULT '0',
  `12:00` tinyint(4) NOT NULL DEFAULT '0',
  `12:30` tinyint(4) NOT NULL DEFAULT '0',
  `1:00` tinyint(4) NOT NULL DEFAULT '0',
  `1:30` tinyint(4) NOT NULL DEFAULT '0',
  `2:00` tinyint(4) NOT NULL DEFAULT '0',
  `2:30` tinyint(4) NOT NULL DEFAULT '0',
  `3:00` tinyint(4) NOT NULL DEFAULT '0',
  `3:30` tinyint(4) NOT NULL DEFAULT '0',
  `4:00` tinyint(4) NOT NULL DEFAULT '0',
  `4:30` tinyint(4) NOT NULL DEFAULT '0',
  `5:00` tinyint(4) NOT NULL DEFAULT '0',
  `5:30` tinyint(4) NOT NULL DEFAULT '0',
  `6:00` tinyint(4) NOT NULL DEFAULT '0',
  `6:30` tinyint(4) NOT NULL DEFAULT '0',
  `7:00` tinyint(4) NOT NULL DEFAULT '0',
  `mDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mrdate`
--

CREATE TABLE `mrdate` (
  `mrdate_id` int(11) NOT NULL,
  `mr_office` varchar(10) NOT NULL,
  `mrsId` int(10) NOT NULL,
  `mr_date` date NOT NULL,
  `mr_time` varchar(20) NOT NULL,
  `mr_duration` varchar(20) NOT NULL,
  `mr_topic` varchar(100) NOT NULL,
  `mr_purpose` varchar(250) NOT NULL,
  `mr_type` varchar(20) NOT NULL,
  `mr_attendence` int(10) NOT NULL,
  `mr_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchId`);

--
-- Indexes for table `meetingrooms`
--
ALTER TABLE `meetingrooms`
  ADD PRIMARY KEY (`mrsId`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `mrdate`
--
ALTER TABLE `mrdate`
  ADD PRIMARY KEY (`mrdate_id`),
  ADD KEY `mrsId` (`mrsId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meetingrooms`
--
ALTER TABLE `meetingrooms`
  MODIFY `mrsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mrdate`
--
ALTER TABLE `mrdate`
  MODIFY `mrdate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mrdate`
--
ALTER TABLE `mrdate`
  ADD CONSTRAINT `mrdate_ibfk_1` FOREIGN KEY (`mrsId`) REFERENCES `meetingrooms` (`mrsId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
