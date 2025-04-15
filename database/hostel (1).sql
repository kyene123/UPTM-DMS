-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 04:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'code.lpu1@gmail.com', 'Test@1234', '2016-04-04 20:31:45', '2025-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(12, 'CT206', 'Network', 'Bachelor Computer Networking ', '2025-04-09 21:09:21'),
(13, 'CT204', 'Application', 'Bachelor application development', '2025-04-10 02:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `holder`
--

CREATE TABLE `holder` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `plateno` int(11) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `license` longblob NOT NULL,
  `receipt` longblob NOT NULL,
  `hno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holder`
--

INSERT INTO `holder` (`id`, `regNo`, `firstName`, `contactNo`, `type`, `plateno`, `colour`, `license`, `receipt`, `hno`) VALUES
(6, 'AM234', 'aleef adham', '121345', 'kereta kancil', 0, 'hitam', 0x433a5c58414d50505c6874646f63732f696d6167654c2f412e6a7067, 0x433a5c58414d50505c6874646f63732f696d616765522f422e6a7067, 'A-06-1'),
(7, 'AM2344', 'Ali', '232', 'kereta kancil', 0, 'HITAM', 0x433a5c58414d50505c6874646f63732f696d6167654c2f412e6a7067, 0x433a5c58414d50505c6874646f63732f696d616765522f422e6a7067, 'A--07-1'),
(8, 'AN2345', 'ADIL', '232', 'car', 0, 'black', 0x433a5c58414d50505c6874646f63732f696d6167654c2f412e6a7067, 0x433a5c58414d50505c6874646f63732f696d616765522f422e6a7067, 'A--07-2');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `regno` varchar(20) DEFAULT NULL,
  `message` varchar(200) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `regno`, `message`, `emailid`, `contact_no`) VALUES
(7, 'AN2345', 'Kami mohon permisison', 'adil@gmail.com', 232);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `feespm` int(11) NOT NULL,
  `foodstatus` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` varchar(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int(11) NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL,
  `hno` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`, `hno`, `password`) VALUES
(25, 1, 4, 150, 0, '2025-04-11', 9, 'Bachelor application development', 'AM234', 'aleef', '', '', 'male', 121345, 'aleefrosli17@gmail.com', 'ali', 'father', 12312312, 'asdas', 'merlimau', 'Kelantan', 77300, '', '', '', 0, '2025-04-09 21:39:47', '', 'A-06-1', 'Test@123'),
(26, 2, 4, 200, 0, '2025-04-10', 4, 'Bachelor application development', 'AM2344', 'Ali', '', '', 'male', 232, 'ali@gmail.com', 'alias', 'father', 21212, 'dsada', 'merlimau', 'Melaka', 77300, '', '', '', 0, '2025-04-10 02:20:01', '', 'A--07-1', 'ali123'),
(27, 2, 4, 200, 0, '2025-04-10', 5, 'Bachelor application development', 'AN2345', 'ADIL', '', '', 'male', 232, 'adil@gmail.com', 'adik', 'ayah', 21212, 'batu pahat 1', 'batu pahat', 'Johor', 12345, '', '', '', 0, '2025-04-10 02:37:55', '', 'A--07-1', 'adil123'),
(28, 2, 4, 200, 0, '2025-04-16', 4, 'Bachelor Computer Networking ', 'AM23445', 'Amin', '', '', 'male', 121345, 'amin@gmail.com', 'alim', 'father', 12312312, 'sasdasd', 'merlimau', 'Melaka', 77300, '', '', '', 0, '2025-04-15 12:12:43', '', 'A-06-1', 'amin123'),
(29, 2, 4, 200, 0, '2025-04-16', 0, 'Bachelor Computer Networking ', '0', 'ADIL', '', '', '0', 232, '0', 'adsasd', 'assda', 0, 'dsasda', 'merlimau', 'Melaka', 77300, '', '', '', 0, '2025-04-15 12:35:45', '', 'A--07-1', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `hno` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `hno`, `status`, `posting_date`) VALUES
(6, 4, 1, 150, 'A-06-1', 'Occupied', '2025-03-19 16:33:15'),
(7, 4, 2, 200, 'A-06-1', 'Occupied', '2025-03-19 16:40:36'),
(8, 2, 1, 0, 'A--07-1', 'Occupied', '2025-04-10 02:15:38'),
(9, 4, 1, 150, 'A--07-2', 'Occupied', '2025-04-15 12:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(62, 'Wilayah Persekutuan'),
(58, 'Sarawak'),
(57, 'Sabah'),
(60, 'Pulau Pinang'),
(25, 'Melaka'),
(52, 'Pahang'),
(51, 'Negeri Sembilan'),
(48, 'Kelantan'),
(46, 'Perlis'),
(45, 'Perak'),
(42, 'Kedah'),
(41, 'Selangor'),
(47, 'Terengganu '),
(37, 'Johor');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 10, 'test@gmail.com', '', '', '', '2016-06-22 06:16:42'),
(2, 10, 'test@gmail.com', '', '', '', '2016-06-24 11:20:28'),
(4, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-24 11:22:47'),
(5, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-26 15:37:40'),
(6, 20, 'Benjamin@gmail.com', 0x3a3a31, '', '', '2016-06-26 16:40:57'),
(7, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-02-26 20:34:16'),
(8, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-02-27 04:25:04'),
(9, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-02-27 04:29:09'),
(10, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-03-19 16:12:13'),
(11, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-03-19 16:13:57'),
(12, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-03-19 16:44:16'),
(13, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-03-19 16:50:03'),
(14, 10, 'test@gmail.com', 0x3a3a31, '', '', '2025-03-19 16:51:33'),
(15, 21, 'test1@gmail.com', 0x3a3a31, '', '', '2025-03-19 17:02:19'),
(16, 22, 'Test2@gmail.com', 0x3a3a31, '', '', '2025-03-19 17:26:45'),
(17, 22, 'Test2@gmail.com', 0x3a3a31, '', '', '2025-03-19 17:32:05'),
(18, 22, 'Test2@gmail.com', 0x3a3a31, '', '', '2025-03-19 17:46:00'),
(19, 22, 'Test2@gmail.com', 0x3a3a31, '', '', '2025-03-19 17:53:40'),
(20, 23, 'test@gmail.com', 0x3a3a31, '', '', '2025-04-06 17:27:02'),
(21, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-06 17:57:00'),
(22, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-06 18:04:08'),
(23, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-06 18:11:21'),
(24, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-08 20:58:07'),
(25, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-08 21:38:45'),
(26, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-08 21:58:14'),
(27, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 02:59:01'),
(28, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 18:02:54'),
(29, 28, 'test@gmail.com', 0x3a3a31, '', '', '2025-04-09 20:39:56'),
(30, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 20:49:15'),
(31, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 20:52:56'),
(32, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 20:54:15'),
(33, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:11:56'),
(34, 27, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:12:38'),
(35, 29, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:13:12'),
(36, 29, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:14:00'),
(37, 29, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:17:59'),
(38, 30, 'test@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:19:20'),
(39, 29, 'aleefrosli17@gmail.com', 0x3a3a31, '', '', '2025-04-09 21:39:56'),
(40, 32, 'ali@gmail.com', 0x3a3a31, '', '', '2025-04-10 02:21:59'),
(41, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-10 02:39:31'),
(42, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 04:46:10'),
(43, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 04:49:35'),
(44, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 11:09:50'),
(45, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 11:40:51'),
(46, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 12:26:21'),
(47, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 12:27:01'),
(48, 33, 'adil@gmail.com', 0x3a3a31, '', '', '2025-04-15 12:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(29, 'AM234', 'aleef adham', '', '', 'male', 121345, 'aleefrosli17@gmail.com', 'Test@123', '2025-04-09 21:11:38', '', ''),
(30, 'AM2341', 'adam', '', '', 'male', 121345, 'test@gmail.com', 'Test@123', '2025-04-09 21:19:00', '', ''),
(31, 'AM234', 'aleef', '', '', 'male', 121345, 'aleefrosli17@gmail.com', 'Test@123', '2025-04-09 21:39:47', '', ''),
(32, 'AM2344', 'Ali', '', '', 'male', 232, 'ali@gmail.com', 'ali123', '2025-04-10 02:20:01', '', ''),
(33, 'AN2345', 'ADIL', '', '', 'male', 232, 'adil@gmail.com', 'adil', '2025-04-10 02:37:55', '', '15-04-2025 06:06:56'),
(34, 'AM23445', 'Amin', '', '', 'male', 121345, 'amin@gmail.com', 'amin123', '2025-04-15 12:12:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(100) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `contactNo` int(12) NOT NULL,
  `type` varchar(100) NOT NULL,
  `plateno` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `license` longblob NOT NULL,
  `receipt` longblob NOT NULL,
  `hno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `regNo`, `firstName`, `contactNo`, `type`, `plateno`, `colour`, `license`, `receipt`, `hno`) VALUES
(19, 'AN2345', 'ADIL', 232, 'car', 'AZX4883', 'black', 0x433a5c58414d50505c6874646f63732f696d6167654c2f412e6a7067, 0x433a5c58414d50505c6874646f63732f696d616765522f422e6a7067, 'A-06-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holder`
--
ALTER TABLE `holder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `holder`
--
ALTER TABLE `holder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
