-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luonlinecoursereg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-31 16:21:18', '0000-00-00 00:00:00'),
(2, 'tazin', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `created` int(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`created`, `amount`) VALUES
(2023, 500),
(2023, 750),
(2023, 800),
(2023, 650),
(2023, 900),
(2023, 750),
(2023, 100);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCategory` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `Coursefee` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `SeatLimit` int(11) DEFAULT 0,
  `course_image` varchar(255) DEFAULT NULL,
  `small_description` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCategory`, `courseName`, `Coursefee`, `creationDate`, `updationDate`, `SeatLimit`, `course_image`, `small_description`, `description`) VALUES
(3, 'CSE-1315', 'Data Structures', '3', '2023-08-08 04:58:27', NULL, 0, NULL, NULL, NULL),
(4, 'CSE-1111', 'Introduction to computer', '2', '2023-08-08 04:59:00', NULL, 0, NULL, NULL, NULL),
(5, 'PHY-2211', 'General Physics', '3', '2023-08-08 04:59:52', NULL, 0, NULL, NULL, NULL),
(6, 'EEE-2317', 'Digital Electronics', '3', '2023-08-08 05:00:35', NULL, 0, NULL, NULL, NULL),
(7, 'MAT-2213', 'Probability & Statistics', '3', '2023-08-08 05:01:09', NULL, 0, NULL, NULL, NULL),
(23, 'web', 'php', '10k', '2023-12-06 17:33:16', NULL, 123, 'Screenshot (506).png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `level`, `course`, `enrollDate`) VALUES
(1, '10806121', '822894', 2, 1, '2022-02-11 00:59:33'),
(2, '10806121', '822894', 1, 2, '2022-02-11 01:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(1, 'IT', '2022-02-10 17:23:04'),
(2, 'HR', '2022-02-10 17:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(1, '1', '2022-02-11 00:59:02'),
(2, '2', '2022-02-11 00:59:02'),
(3, '3', '2022-02-11 00:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newstitle` varchar(255) DEFAULT NULL,
  `newsDescription` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newstitle`, `newsDescription`, `postingDate`) VALUES
(2, 'Test News', 'This is for testing. This is for testing.This is for testing.This is for testing.This is for testing.This is for testing.This is for testing.This is for testing.This is for testing.This is for testing.', '2022-02-10 17:36:50'),
(3, 'New Course Started C#', 'This is sample text for testing.', '2022-02-11 00:54:38'),
(4, 'Intro to Design System', 'Instructor:ahmed musa. Duration:1h 23m. 11 Lesson', '2023-08-02 18:01:03'),
(5, '50% discount on UI/UX design ', '50% discount on UI/UX design by samanta parvin. 12 Lesson', '2023-08-02 18:02:34'),
(6, 'John started prototyping', 'The prototyping Model is also a very good choice to demonstrate the technical feasibility of the product.\r\nFor more software engineering models, we can refer to Classical Waterfall Model, Spiral Model, and Iterative Waterfall Model.', '2023-08-02 18:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `total` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `created_date` varchar(12) NOT NULL,
  `modified_date` varchar(12) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT '0=Failed, 1=Success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `image`, `price`, `status`) VALUES
(1, 'Product One', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'http://placehold.it/700x400', 10.00, 1),
(2, 'Product Two', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'http://placehold.it/700x400', 20.00, 1),
(3, 'Product Three', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'http://placehold.it/700x400', 30.00, 1),
(4, 'Product Four', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'http://placehold.it/700x400', 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(1, '1', '2022-02-10 17:22:49', NULL),
(2, '2', '2022-02-10 17:22:55', NULL),
(3, '3', '2022-02-11 00:51:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(1, '2022', '2022-02-10 17:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` int(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `creationdate`, `updationDate`, `email`, `phonenumber`, `dob`, `verify_token`, `verify_status`) VALUES
(1, 'ive-classes.png', 'ro116290', 'sneha', NULL, '2023-10-09 06:09:06', NULL, 'taz4@gmail.com', 1779678730, 2023, '5a0fa24c795ee55413cd995d2ff39ae8', 0),
(101415, 'ltp-2.png', '8f3ba5fd2beac46774ceba7798b4e2c4', 'RahatMiah', '583185', '2023-08-07 15:42:58', '07-08-2023 09:53:01 PM', 'rahatmiah66@gmail.com', NULL, NULL, NULL, 0),
(101416, NULL, 'ro116290', 'asdf', NULL, '2023-10-16 06:14:02', NULL, 'qwer5@gmail.com', 1779678720, 2023, '0681578491c112baca9a025b5fbc733f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `c_pass` varchar(20) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 15:43:45', NULL, 1),
(25, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 15:51:53', '07-08-2023 09:24:20 PM', 1),
(26, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:01:06', '07-08-2023 09:41:16 PM', 1),
(27, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:16:19', '07-08-2023 09:47:37 PM', 1),
(28, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:17:49', '07-08-2023 09:53:33 PM', 1),
(29, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:23:54', NULL, 1),
(30, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:27:58', NULL, 1),
(31, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 16:37:25', '07-08-2023 10:10:00 PM', 1),
(32, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-07 18:27:08', '07-08-2023 11:59:14 PM', 1),
(33, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 04:53:20', '08-08-2023 10:26:28 AM', 1),
(34, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 05:35:39', '08-08-2023 11:07:22 AM', 1),
(35, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 05:38:45', '08-08-2023 11:13:46 AM', 1),
(36, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 07:27:23', NULL, 1),
(37, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 07:56:58', '08-08-2023 01:27:04 PM', 1),
(38, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 07:58:32', '08-08-2023 01:29:23 PM', 1),
(39, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 07:59:32', '08-08-2023 01:35:33 PM', 1),
(40, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 08:05:45', '08-08-2023 01:35:51 PM', 1),
(41, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 11:05:17', '08-08-2023 04:35:32 PM', 1),
(42, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 14:17:29', '08-08-2023 07:49:02 PM', 1),
(43, 'rahatmiah66@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 14:27:36', NULL, 1),
(44, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-08 16:27:32', '08-08-2023 09:58:16 PM', 1),
(45, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-08-09 01:16:13', '09-08-2023 06:46:29 AM', 1),
(46, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-05 04:52:38', NULL, 1),
(47, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-07 05:42:00', '07-10-2023 11:20:13 AM', 1),
(48, '2012020079', 0x3a3a3100000000000000000000000000, '2023-10-07 16:02:17', NULL, 1),
(49, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-07 16:49:48', NULL, 1),
(50, 'tazinchy10@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-07 17:01:00', NULL, 1),
(51, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-09 14:53:11', '09-10-2023 08:24:58 PM', 1),
(52, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-09 14:56:35', '09-10-2023 08:31:46 PM', 1),
(53, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-09 15:11:18', NULL, 1),
(54, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-13 14:26:54', '13-10-2023 10:01:33 PM', 1),
(55, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-14 14:32:45', '14-10-2023 08:08:42 PM', 1),
(56, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-14 14:39:48', NULL, 1),
(57, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-21 04:49:17', NULL, 1),
(58, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-10-21 04:52:48', NULL, 1),
(59, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 16:05:40', NULL, 1),
(60, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 16:37:55', '20-11-2023 10:16:08 PM', 1),
(61, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-02 16:04:47', NULL, 1),
(62, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-05 05:19:21', NULL, 1),
(63, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 05:13:34', NULL, 1),
(64, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 15:18:26', '06-12-2023 09:19:41 PM', 1),
(65, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 15:52:29', NULL, 1),
(66, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-07 04:35:50', NULL, 1),
(67, 'taz4@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-08 01:16:42', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentRegno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101417;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
