-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 01:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `emp_code` varchar(100) DEFAULT NULL,
  `emp_name` varchar(200) DEFAULT NULL,
  `emp_email` varchar(200) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `df` tinyint(4) NOT NULL,
  `post_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `emp_id`, `emp_code`, `emp_name`, `emp_email`, `phone_no`, `dob`, `status`, `df`, `post_dt`) VALUES
(1, 'EMP000000001', '000000001', 'testsdfm', 'asdasdasdasd@ADSAD.COM', '6765756762', '2020-10-08', 0, 0, '2020-10-28 04:13:43'),
(2, 'EMP000000002', '000000002', 'vijay', 'asda@gmail.com', '9993212344', '2020-10-09', 0, 1, '2020-10-28 04:14:17'),
(17, 'EMP000000003', '000000003', 'vijasay new', 'asda@gmail.com', '9993212344', '2020-10-09', 0, 0, '2020-10-28 04:23:34'),
(18, 'EMP000000004', '000000004', 'asdasd', 'vvaa@fgf.com', '9993212344', '2020-10-30', 0, 1, '2020-10-28 04:23:50'),
(19, 'EMP000000005', '000000005', 'new', 'balaj@gmaili.com', '9964531245', '2020-10-29', 0, 1, '2020-10-28 06:16:44'),
(20, 'EMP000000006', '000000006', 'EMPT vijayaass', 'asda@gmail.com', '9993212365', '2020-10-16', 0, 0, '2020-10-28 06:24:52'),
(21, 'EMP000000007', '000000007', 'vickyssas', 'asd@gmail.com', '9945632145', '2020-10-09', 0, 0, '2020-10-29 06:57:05'),
(22, 'EMP000000008', '000000008', 'test', 'asda@gmail.com', '6765756765', '2020-10-16', 0, 0, '2020-10-29 07:02:13'),
(23, 'EMP000000009', '000000009', 'asdad', 'asda@gmail.com', '9993212344', '2020-10-09', 0, 0, '2020-10-29 07:04:28'),
(24, 'EMP000000010', '000000010', 'vijayasdasd', 'werwerwer@gmail.com', '9840279865', '2020-10-16', 0, 0, '2020-10-29 07:05:04'),
(25, 'EMP000000011', '000000011', 'test', 'asda@gmail.com', '2312431234', '2020-10-09', 0, 0, '2020-10-29 07:10:13'),
(26, 'EMP000000012', '000000012', 'vijay servce', 'asda@gmail.com', '9993212344', '2020-10-09', 0, 0, '2020-10-29 07:10:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `emp_code` (`emp_code`), ADD UNIQUE KEY `emp_code_2` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
