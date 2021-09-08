-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 07:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extra_curricular_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `club` varchar(30) NOT NULL,
  `club_details` text NOT NULL,
  `club_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `department_id`, `club`, `club_details`, `club_status`) VALUES
(2, 1, 'IT Club', 'This is the club under Computer Science Department', 'Active'),
(4, 7, 'English Club', 'English Club', 'Active'),
(5, 5, 'Math Club', 'Math Club', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `complaint_report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `reply_complaint_report_id` int(11) NOT NULL,
  `complaint_date_tim` datetime NOT NULL,
  `complaint_detail` text NOT NULL,
  `complain_doc` varchar(300) NOT NULL,
  `complaint_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(25) NOT NULL,
  `course_description` text NOT NULL,
  `course_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_description`, `course_status`) VALUES
(1, 'BCA', 'Bachelor of Computer Application', 'Active'),
(2, 'BCOM', 'BCOM', 'Active'),
(9, 'Bsc', 'Bsc', 'Active'),
(10, 'BA', 'BA', 'Active'),
(11, 'BBA', 'BBA', 'Active'),
(12, 'BVoc', 'BVoc', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(25) NOT NULL,
  `department_detail` text NOT NULL,
  `department_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`, `department_detail`, `department_status`) VALUES
(1, 'Computer Science Departme', 'Computer Science Department', 'Active'),
(5, 'Mathematics', 'Department of Mathematics', 'Active'),
(7, 'English Department', 'English Department', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dept_course`
--

CREATE TABLE `dept_course` (
  `dept_course_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `dept_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_course`
--

INSERT INTO `dept_course` (`dept_course_id`, `department_id`, `course_id`, `dept_status`) VALUES
(36, 3, 1, 'Active'),
(37, 3, 8, 'Active'),
(42, 0, 2, 'Active'),
(45, 2, 1, 'Active'),
(46, 2, 2, 'Active'),
(47, 2, 2, 'Active'),
(48, 2, 3, 'Active'),
(49, 2, 3, 'Active'),
(50, 2, 8, 'Active'),
(51, 2, 8, 'Active'),
(52, 4, 2, 'Active'),
(55, 1, 1, 'Active'),
(56, 1, 9, 'Active'),
(57, 5, 9, 'Active'),
(61, 7, 1, 'Active'),
(62, 7, 2, 'Active'),
(63, 7, 9, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` bigint(20) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `event_participation_type` varchar(25) NOT NULL COMMENT 'Single, Team',
  `no_of_participants` int(11) NOT NULL,
  `event_title` varchar(300) NOT NULL,
  `event_description` text NOT NULL,
  `event_rules` text NOT NULL,
  `event_banner` varchar(300) NOT NULL,
  `department_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `course_id` text NOT NULL,
  `st_class` text NOT NULL,
  `event_date_time` datetime NOT NULL,
  `event_venue` text NOT NULL,
  `staff_id` int(11) NOT NULL,
  `participation_limit` int(11) NOT NULL,
  `event_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_type_id`, `event_participation_type`, `no_of_participants`, `event_title`, `event_description`, `event_rules`, `event_banner`, `department_id`, `club_id`, `course_id`, `st_class`, `event_date_time`, `event_venue`, `staff_id`, `participation_limit`, `event_status`) VALUES
(29, 2, 'Single', 1, 'All India Dance Competition', 'This is for dance competiton', 'Attend before one hour', '507561290Bigg-Boss.jpg', 1, 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"9\";}', 'a:2:{i:0;s:10:\"First Year\";i:1;s:10:\"Third Year\";}', '2021-09-05 07:00:00', 'Bangalore', 1, 25, 'Active'),
(30, 6, 'Team', 11, 'IPL Competition', 'Premier league', 'Round robbin league', '2127189323Take_in_the_Scenery.jpg', 1, 2, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-05 06:00:00', 'Mangalore', 1, 10, 'Active'),
(32, 2, 'Single', 1, 'abc competition', 'This is for dance competiton', 'Attend before one hour', '507561290Bigg-Boss.jpg', 1, 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"9\";}', 'a:2:{i:0;s:10:\"First Year\";i:1;s:10:\"Third Year\";}', '2021-08-25 07:00:00', 'Bangalore', 1, 25, 'Active'),
(33, 2, 'Single', 1, 'Tech talks', 'This is for dance competiton', 'Attend before one hour', '507561290Bigg-Boss.jpg', 1, 2, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"9\";}', 'a:2:{i:0;s:10:\"First Year\";i:1;s:10:\"Third Year\";}', '2021-08-20 07:00:00', 'Bangalore', 1, 25, 'Active'),
(34, 7, 'Single', 1, 'Baseball event', 'Baseball event in Chinnaswamy ground', 'NO foul play', '113617494015-75-x11-81-beautiful-scenery-5d-diy-diamond-painting-kit-full-original-imaf66kewnc9s69t.jpeg', 1, 2, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-12 04:51:00', 'Hash gate', 11, 25, 'Active'),
(35, 5, 'Team', 3, 'Quiz Competition in IT Fest', 'This event has IT related quiz competition', 'Competition Through online', '678197377home-insurance-getty.jpg', 0, 2, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-10 15:00:00', '3rd floor,<br />\r\ncity light', 11, 3, 'Active'),
(36, 5, 'Team', 3, 'e-Game Competition', 'e-Game competiton', 'Every competitor should bring Smart phones', '18968342427045882-ASOOTCXI-7.jpg', 0, 2, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-15 02:15:00', '5th Floor,<br />\r\nCity Light,<br />\r\nMangalore', 11, 5, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_participation`
--

CREATE TABLE `event_participation` (
  `event_participation_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_participation_type` varchar(25) NOT NULL,
  `team` varchar(25) NOT NULL,
  `apply_dt_tim` datetime NOT NULL,
  `event_participation_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_participation`
--

INSERT INTO `event_participation` (`event_participation_id`, `event_id`, `student_id`, `event_participation_type`, `team`, `apply_dt_tim`, `event_participation_status`) VALUES
(14, 29, 18, 'Single', '0', '2021-08-25 20:16:06', 'Applied'),
(15, 29, 1, 'Single', '0', '2021-08-25 20:18:35', 'Applied'),
(16, 29, 12, 'Single', '0', '2021-08-25 20:18:35', 'Applied'),
(17, 29, 13, 'Single', '0', '2021-08-25 20:18:35', 'Applied'),
(18, 29, 15, 'Single', '0', '2021-08-25 20:18:35', 'Applied'),
(19, 29, 17, 'Single', '0', '2021-08-25 20:18:35', 'Applied'),
(21, 34, 1, 'Single', '0', '2021-09-02 05:07:54', 'Absent'),
(22, 34, 4, 'Single', '0', '2021-09-02 05:08:20', 'Present'),
(23, 34, 12, 'Single', '0', '2021-09-02 05:14:19', 'Present'),
(24, 34, 13, 'Single', '0', '2021-09-02 05:14:46', 'Present'),
(25, 34, 15, 'Single', '0', '2021-09-02 05:15:07', 'Present'),
(26, 34, 16, 'Single', '0', '2021-09-02 05:15:33', 'Present'),
(27, 34, 17, 'Single', '0', '2021-09-02 05:15:54', 'Absent'),
(28, 34, 18, 'Single', '0', '2021-09-02 05:16:21', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `event_result`
--

CREATE TABLE `event_result` (
  `event_result_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `result_detail` text NOT NULL,
  `event_documentry` text NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_result`
--

INSERT INTO `event_result` (`event_result_id`, `event_id`, `result_detail`, `event_documentry`, `staff_id`) VALUES
(6, 34, 'GFor mod event', 'a:4:{i:0;s:30:\"file_example_MP4_1920_18MG.mp4\";i:1;s:28:\"SampleVideo_1280x720_5mb.mp4\";i:2;s:11:\"scenery.jpg\";i:3;s:23:\"Take_in_the_Scenery.jpg\";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_result_status`
--

CREATE TABLE `event_result_status` (
  `result_status_id` int(11) NOT NULL,
  `event_result_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_participation_id` int(11) NOT NULL,
  `winning_position` varchar(25) NOT NULL,
  `point` int(11) NOT NULL,
  `event_participation_type` varchar(25) NOT NULL,
  `team` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_result_status`
--

INSERT INTO `event_result_status` (`result_status_id`, `event_result_id`, `event_id`, `student_id`, `event_participation_id`, `winning_position`, `point`, `event_participation_type`, `team`) VALUES
(83, 6, 34, 1, 21, '', 0, 'Single', '0'),
(84, 6, 34, 4, 22, '0', 1, 'Single', '0'),
(85, 6, 34, 12, 23, '3', 5, 'Single', '0'),
(86, 6, 34, 13, 24, '2', 10, 'Single', '0'),
(87, 6, 34, 15, 25, '1', 25, 'Single', '0'),
(88, 6, 34, 16, 26, '0', 1, 'Single', '0'),
(89, 6, 34, 17, 27, '', 0, 'Single', '0'),
(90, 6, 34, 18, 28, '0', 1, 'Single', '0');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(11) NOT NULL,
  `event_type` varchar(30) NOT NULL,
  `event_type_info` text NOT NULL,
  `event_type_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type`, `event_type_info`, `event_type_status`) VALUES
(2, 'Dance Competition', 'Dance competition with western and traditional', 'Active'),
(3, 'Chess', 'Chess masters', 'Active'),
(4, 'Break Dance', 'Break dance competition', 'Active'),
(5, 'IT Fest', 'organized by CS Dept', 'Active'),
(6, 'Cricket', 'Cricket Sports with 11 members in a team', 'Active'),
(7, 'Baseball', 'Baseball', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `point_settings`
--

CREATE TABLE `point_settings` (
  `point_set_id` int(11) NOT NULL,
  `firstplace_point` int(11) NOT NULL,
  `secondplace_point` int(11) NOT NULL,
  `thirdplace_point` int(11) NOT NULL,
  `participation_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `point_settings`
--

INSERT INTO `point_settings` (`point_set_id`, `firstplace_point`, `secondplace_point`, `thirdplace_point`, `participation_point`) VALUES
(1, 25, 10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(25) NOT NULL,
  `staff_dp` varchar(300) NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `staff_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_dp`, `staff_type`, `department_id`, `login_id`, `password`, `gender`, `dob`, `staff_status`) VALUES
(1, 'Sachin', '1621369585Sachin_tendulkar1.jpg', 'Assistant Professor', 1, 'sachin', 'd94354ac9cf3024f57409bd74eec6b4c', 'Male', '1960-04-12', 'Active'),
(2, 'Mohit', '689938320basmati-rice-1kg-500x500.jpg', 'HOD', 1, '789456123', 'c62d929e7b7e7b6165923a5dfc60cb56', 'Male', '2021-07-12', 'Active'),
(9, 'Keerthan', '10808155531999504256480607.jpg', 'Lab Assistant', 1, 'keerthu', 'c740dd8f6fba4cb05d8a1282367c9577', 'Male', '1987-12-08', 'Active'),
(11, 'Super Admin', '29844347images (2).jfif', 'Admin', 1, 'superadmin', 'c517b462594cf43eca9f3f4b17517c75', 'Male', '1992-07-27', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_rollno` varchar(10) NOT NULL,
  `student_password` varchar(300) NOT NULL,
  `st_class` varchar(20) NOT NULL,
  `student_image` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `language` varchar(25) NOT NULL,
  `elective_paper` varchar(20) NOT NULL,
  `extension_activities` varchar(50) NOT NULL,
  `student_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `course_id`, `student_rollno`, `student_password`, `st_class`, `student_image`, `gender`, `dob`, `language`, `elective_paper`, `extension_activities`, `student_status`) VALUES
(1, 'Rajkiran', 1, '123456', '2df594b9710111099edbdb7edaa43301', '', '1181254765images.jpg', 'Male', '2021-07-14', 'Sanskrit', 'Journalism', 'Cultural', 'Active'),
(4, 'Rupesh Kumar', 2, '201568', 'af78e43891766f29545ac78f4f74859e', 'First Year', '2326773111999504256480607.jpg', 'Male', '2002-05-15', 'Hindi', 'History', 'Sports', 'Active'),
(10, 'Iliyas', 3, '78978911', 'ce816fc208a39d5f79a2aa2f6e285e4b', 'Second Year', '1226100850basmati-rice-1kg-500x500.jpg', 'Male', '2014-07-07', 'Sanskrit', 'Hindi', 'Rovers & Rangers', 'Pending'),
(11, 'Peter king', 3, '1458', 'fe7c33705bed081ec082d575e46eb058', 'First Year', '1877291930arhar-dal-500x500 (1).jpg', 'Male', '2002-07-08', 'Hindi', 'Journalism', 'Rovers & Rangers', 'Pending'),
(12, 'Mahesh', 1, '789456', '9f30ef107518fb8579c51273be77827e', 'First Year', '1847893256toor-dal-250x250.jpeg', 'Male', '2021-12-31', 'Sanskrit', 'Sanskrit', 'NCC', 'Active'),
(13, 'Mahesh prasad', 1, '1234567890', 'a46857f0ecc21f0a06ea434b94d9cf1d', 'First Year', '18618478492322b995-2ce8-4b5c-8485-738785b1616b.jpg', 'Male', '1999-05-04', 'Sanskrit', 'Physics', 'NCC', 'Active'),
(15, 'Mahesh kumar', 1, '789789', '50f45e244c6e9fa89dbf8743d4aca927', 'First Year', '21360444892322b995-2ce8-4b5c-8485-738785b1616b.jpg', 'Male', '2004-12-29', 'Sanskrit', 'Hindi', 'NCC', 'Active'),
(16, 'Alok kumar Bangalore', 2, '7418529633', 'd68ddc83a7beaa15ea5ad5f970633743', 'First Year', '1058773050IMG-20200703-WA0040.jpg', 'Male', '2004-11-30', 'Sanskrit', 'Kannada', 'NCC', 'Active'),
(17, 'spd', 1, '1809801', 'a455e6f20cb048b30988dec30dcffd74', 'First Year', '16516864691690768110basmati-rice-1kg-500x500.jpg', 'Male', '1990-01-11', 'Kannada', 'Economics and Rural ', 'None', 'Active'),
(18, 'Aravinda M V', 1, '18098078', '03b372fd1df39363f1dec0ed19a67e26', 'First Year', '1752835243sundar-pichai-1.jpg', 'Male', '1990-08-05', 'Sanskrit', 'Hindi', 'NSS', 'Active'),
(19, 'Aravinda M V', 1, '123456789', '03cce43f8b49ea165c6effeb3e141e08', 'First Year', '272314989sundar-pichai-1.jpg', 'Male', '1986-05-04', 'Sanskrit', 'Hindi', 'NCC', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `complaint_report`
--
ALTER TABLE `complaint_report`
  ADD PRIMARY KEY (`complaint_report_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `dept_course`
--
ALTER TABLE `dept_course`
  ADD PRIMARY KEY (`dept_course_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_participation`
--
ALTER TABLE `event_participation`
  ADD PRIMARY KEY (`event_participation_id`);

--
-- Indexes for table `event_result`
--
ALTER TABLE `event_result`
  ADD PRIMARY KEY (`event_result_id`);

--
-- Indexes for table `event_result_status`
--
ALTER TABLE `event_result_status`
  ADD PRIMARY KEY (`result_status_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `point_settings`
--
ALTER TABLE `point_settings`
  ADD PRIMARY KEY (`point_set_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_rollno` (`student_rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaint_report`
--
ALTER TABLE `complaint_report`
  MODIFY `complaint_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dept_course`
--
ALTER TABLE `dept_course`
  MODIFY `dept_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `event_participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `event_result`
--
ALTER TABLE `event_result`
  MODIFY `event_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_result_status`
--
ALTER TABLE `event_result_status`
  MODIFY `result_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `point_settings`
--
ALTER TABLE `point_settings`
  MODIFY `point_set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
