-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 10:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` varchar(60) NOT NULL,
  `dept_name` varchar(300) DEFAULT NULL,
  `userid` varchar(300) DEFAULT NULL,
  `upassword` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`, `userid`, `upassword`) VALUES
('BCA', 'BCA', 'Admin2', 'abc'),
('MCA', 'MCA', 'Admin1', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_date` varchar(30) DEFAULT NULL,
  `event_desc` varchar(500) DEFAULT NULL,
  `src` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_date`, `event_desc`, `src`) VALUES
(1, '12/04/2020', 'hjfgmhgjhfhjdgsresfydhgdgjtdhjgdhjdjdjdjdtdj', 'https://bcd.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback1`
--

CREATE TABLE `feedback1` (
  `regdno` int(10) NOT NULL,
  `qs1` varchar(10) NOT NULL,
  `qs2` varchar(10) NOT NULL,
  `qs3` varchar(10) NOT NULL,
  `qs4` varchar(10) NOT NULL,
  `qs5` varchar(10) NOT NULL,
  `qs6` varchar(10) NOT NULL,
  `qs7` varchar(10) NOT NULL,
  `qs8` varchar(10) NOT NULL,
  `qs9` varchar(10) NOT NULL,
  `qs10` varchar(10) NOT NULL,
  `txt1` varchar(300) DEFAULT NULL,
  `txt2` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback1`
--

INSERT INTO `feedback1` (`regdno`, `qs1`, `qs2`, `qs3`, `qs4`, `qs5`, `qs6`, `qs7`, `qs8`, `qs9`, `qs10`, `txt1`, `txt2`) VALUES
(54321, 'VERY GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'dfdggvfdxvxfv', 'fxxfvfvxfvxf'),
(123456, 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'GOOD', 'on', 'VERY GOOD', 'bjhjhjhxlksq', 'wswsdwd'),
(1805206036, 'AVERAGE', 'AVERAGE', 'GOOD', 'GOOD', 'AVERAGE', 'BAD', 'BAD', 'BAD', 'BAD', 'BAD', 'vthn f tjg', 'crdyth');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `s_id` varchar(20) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `s_dob` varchar(20) DEFAULT NULL,
  `s_dept` varchar(20) DEFAULT NULL,
  `s_pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`s_id`, `s_name`, `s_dob`, `s_dept`, `s_pass`) VALUES
('1925206010', 'DIBYAJYOTI SAHOO', '1996-06-28', 'MCA', 'Dibya'),
('1805206036', 'SAMBIT', '2010-02-25', 'MCA', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `regdno` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `join_year` int(4) NOT NULL,
  `pass_year` int(4) NOT NULL,
  `dept_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`regdno`, `name`, `dob`, `join_year`, `pass_year`, `dept_id`) VALUES
(1805206002, 'AKANKSHYA ROUT', '1998-02-12', 2018, 2021, 'MCA'),
(1805206006, 'SUBHASHREE ROUT', '1998-10-12', 2018, 2021, 'MCA'),
(1805206011, 'KANHUCHARAN PRADHAN', '1997-10-13', 2018, 2021, 'MCA'),
(1805206013, 'MANOJ DASH', '1997-02-12', 2019, 2021, 'MCA'),
(1805206031, 'SUBHALAXMI PRADHAN', '1996-02-11', 2019, 2021, 'MCA'),
(1805206035, 'TRILOCHAN BEHERA', '1998-02-11', 2018, 2021, 'MCA'),
(1805206036, 'SAMBIT', '2010-02-25', 2018, 2021, 'MCA'),
(1925206007, 'BIJAYA OJHA', '1996-04-13', 2019, 2021, 'MCA'),
(1925206010, 'DIBYAJYOTI SAHOO', '1996-06-28', 2019, 2021, 'MCA'),
(1925206013, 'IPSITA PANDA', '1996-02-11', 2019, 2021, 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `usr_prof`
--

CREATE TABLE `usr_prof` (
  `regdno` decimal(11,0) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phno` varchar(15) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `yoj` year(4) DEFAULT NULL,
  `yop` year(4) DEFAULT NULL,
  `qual` varbinary(10) DEFAULT NULL,
  `cgpa` decimal(4,2) DEFAULT NULL,
  `degn` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `univ` varchar(50) DEFAULT NULL,
  `jobt` varchar(50) DEFAULT NULL,
  `org` varchar(50) DEFAULT NULL,
  `orgl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_prof`
--

INSERT INTO `usr_prof` (`regdno`, `name`, `phno`, `email`, `address`, `yoj`, `yop`, `qual`, `cgpa`, `degn`, `course`, `univ`, `jobt`, `org`, `orgl`) VALUES
('1805206036', 'SAMBIT', '+919583998665', 'sambit@gmail.com', 'CUTTACK', 2018, 2021, 0x4d4341, '8.48', 'J', '', '', 'WEB DEVELOPER', 'VYAPARPAGE', 'NUAPADA'),
('1925206010', 'DIBYAJYOTI SAHOO', '+918908994995', 'dscpun@gmail.com', 'AT-ATHAGARH', 2019, 2021, 0x4d4341, '8.50', 'J', '', '', 'SE', 'TCS', 'CHENNAI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback1`
--
ALTER TABLE `feedback1`
  ADD PRIMARY KEY (`regdno`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`regdno`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `usr_prof`
--
ALTER TABLE `usr_prof`
  ADD PRIMARY KEY (`regdno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
