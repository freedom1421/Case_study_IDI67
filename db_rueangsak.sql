-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 09:09 AM
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
-- Database: `db_rueangsak`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL COMMENT 'รหัสแผนก',
  `department_name` varchar(255) NOT NULL COMMENT 'ชื่อแผนก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1001, 'ระบบสารสนเทศ '),
(1002, 'ฝ่ายบุคคล'),
(1226, 'ฝ่ายการจัดการ ');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL COMMENT 'รหัสงาน',
  `project_id` int(11) NOT NULL COMMENT 'รหัสโครงการ',
  `jobName` varchar(255) NOT NULL COMMENT 'ชื่องาน',
  `jobDetail` text NOT NULL COMMENT 'รายละเอียดงาน',
  `moneyPlan` float NOT NULL COMMENT 'วงเงินที่วางแผน',
  `moneyUse` float NOT NULL COMMENT 'วงเงินที่ใช้จริง',
  `status` int(11) NOT NULL COMMENT 'สถานะ {0: รอด าเนินการ, 1: อยู่ระหว่างด าเนินการ, 2: เสร็จ}',
  `score` int(11) NOT NULL COMMENT 'คะแนนงาน เต็ม 5',
  `progress` int(11) NOT NULL COMMENT 'ความคืบหน้า',
  `eventDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วัน/เวลาปรับปรุง',
  `personal_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน (ผู้รับผิดชอบงาน)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `project_id`, `jobName`, `jobDetail`, `moneyPlan`, `moneyUse`, `status`, `score`, `progress`, `eventDate`, `personal_id`) VALUES
(1, 1, 'โครงการศึกษาดูงานต่างจังหวัด', 'เพื่อศึกษาดูงานต่างจังหวัด', 100000, 50000, 1, 3, 35, '2025-04-27 06:31:42', 1),
(2, 2, 'โครงการพัฒนาเว็บไซต์', 'สร้างเว็บไซต์สำหรับบริษัทเพื่อโปรโมทสินค้าและบริการ', 15000, 13000, 1, 4, 67, '2025-04-27 06:32:59', 1),
(3, 3, 'โครงการพัฒนาเว็บไซต์', 'สร้างเว็บไซต์สำหรับบริษัทเพื่อโปรโมทสินค้าและบริการ', 10000, 9000, 1, 5, 100, '2025-04-27 06:35:34', 1),
(4, 1, 'jobtest2', 'test', 10000, 9000, 1, 4, 100, '2025-04-27 12:54:57', 2),
(6, 1, '2312123123213', '', 0, 0, 0, 0, 0, '2025-04-27 13:22:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `department_id` int(11) NOT NULL COMMENT 'รหัสแผนก',
  `username` varchar(28) NOT NULL COMMENT 'ชื่อผู้ใช',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `gender` int(11) NOT NULL COMMENT 'เพศ {1: ชาย, 2: หญิง}',
  `email` varchar(255) NOT NULL COMMENT 'อีเมล',
  `phone` varchar(15) NOT NULL COMMENT 'เบอร์โทรศัทพ์มือถือ',
  `tel` varchar(15) NOT NULL COMMENT 'เบอร์ภายใน',
  `userType` varchar(45) NOT NULL COMMENT 'ประเภทผู้ใช้ {1: หัวหน้า, 2: สมาชิก}',
  `eventDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วัน/เวลาปรับปรุง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`personal_id`, `department_id`, `username`, `password`, `name`, `lastname`, `gender`, `email`, `phone`, `tel`, `userType`, `eventDate`) VALUES
(1, 1001, 'admin', '1234', 'Rueangsak1', 'Panklang', 1, 'rueangsak.pa@rmuti.ac.th', '0808258096', '0800070456', '1', '2025-04-27 13:37:25'),
(2, 1002, 'user', '1234', 'Muthita1', 'Ch', 2, 'muthita.ca@rmuti.ac.th', '0825644555', '0800007456', '2', '2025-04-27 13:37:03'),
(5, 1001, 'username', 'password', 'Admin', 'Test', 1, '', '0800052052', '0800052052', '2', '2025-04-27 09:51:59'),
(7, 1001, 'jame', '1234', 'JAme', '123', 1, '', '0800000000', '0800000000', '1', '2025-04-27 10:03:07'),
(8, 1001, 't1', '1234', 'jame', '1344', 1, '0000000000', '0000000000', '0000000000', '2', '2025-04-27 10:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL COMMENT 'รหัสโครงการ',
  `personal_id` int(11) NOT NULL COMMENT 'หัวหน้าโครงการ',
  `project_name` varchar(255) NOT NULL COMMENT 'ชื่อโครงการ',
  `detail` text NOT NULL COMMENT 'รายละเอียดงาน',
  `startDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วัน/เวลาเริ่มต้นโครงการ',
  `endDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วัน/เวลาสิ้นสุดโครงการ',
  `eventDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วัน/เวลาปรับปรุง',
  `status` int(11) NOT NULL COMMENT 'สถานะ {-1: ยกเลิกโครงการ, 0: ยังไม่ด าเนินการ, 1: อยู่\r\nระหว่างด าเนินการ, 2: เสร็จสิ้นโครงการ}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `personal_id`, `project_name`, `detail`, `startDate`, `endDate`, `eventDate`, `status`) VALUES
(1, 1, 'โครงการศึกษาดูงานต่างจังหวัด', 'เพื่อศึกษาดูงานต่างจังหวัด', '2025-04-17 06:26:02', '2025-04-30 06:26:02', '2025-04-27 06:28:29', 1),
(2, 1, 'โครงการพัฒนาเว็บไซต์', 'สร้างเว็บไซต์สำหรับบริษัทเพื่อโปรโมทสินค้าและบริการ', '2025-04-27 06:26:02', '2025-06-30 06:26:02', '2025-04-27 06:28:29', 1),
(3, 1, 'โครงการพัฒนาเว็บไซต์', 'สร้างเว็บไซต์สำหรับบริษัทเพื่อโปรโมทสินค้าและบริการ', '2025-03-31 17:00:00', '2025-04-04 17:00:00', '2025-04-27 06:29:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `personal_id` (`personal_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแผนก', AUTO_INCREMENT=1229;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสงาน', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโครงการ', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
