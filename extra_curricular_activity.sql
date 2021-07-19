-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 11:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `complaint_report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `reply_complaint_report_id` int(11) NOT NULL,
  `complaint_detail` text NOT NULL,
  `complain_doc` varchar(300) NOT NULL
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
(1, 'BCA', '', 'Active'),
(2, 'BCOM', '', 'Active'),
(3, 'Bsc', '', 'Active');

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
(1, 'Tech', '', 'Active'),
(2, 'Kannada', '', 'Active');

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

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` bigint(20) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `event_title` varchar(300) NOT NULL,
  `event_description` text NOT NULL,
  `event_rules` text NOT NULL,
  `event_banner` varchar(300) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `st_class` varchar(20) NOT NULL,
  `event_date_time` datetime NOT NULL,
  `event_venue` text NOT NULL,
  `staff_id` int(11) NOT NULL,
  `event_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_type_id`, `event_title`, `event_description`, `event_rules`, `event_banner`, `department_id`, `course_id`, `st_class`, `event_date_time`, `event_venue`, `staff_id`, `event_status`) VALUES
(18, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '1821207475Database Schema Diagram.png', 1, 2, 'Second Year', '2021-08-06 12:07:00', 'Bangalore', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_participation`
--

CREATE TABLE `event_participation` (
  `event_participation_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `apply_dt_tim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 0, 'This is test event Result', 'This is test event Document', 0);

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
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(11) NOT NULL,
  `event_type` varchar(30) NOT NULL,
  `event_type_info` text NOT NULL,
  `firstplace_point` int(11) NOT NULL,
  `secondplace_point` int(11) NOT NULL,
  `thirdplace_point` int(11) NOT NULL,
  `others_point` int(11) NOT NULL,
  `event_type_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type`, `event_type_info`, `firstplace_point`, `secondplace_point`, `thirdplace_point`, `others_point`, `event_type_status`) VALUES
(2, 'Dance Competition', 'Dance competition with western and traditional', 10, 5, 3, 1, 'Active'),
(3, 'Chess', 'Chess masters', 20, 10, 5, 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `staff_type` varchar(30) NOT NULL,
  `department_id` int(11) NOT NULL,
  `staff_dp` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `staff_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `login_id`, `gender`, `dob`, `staff_type`, `department_id`, `staff_dp`, `password`, `staff_status`) VALUES
(2, 'Shailesh', 'admin', 'Male', '1966-01-23', 'Assistant Professor', 1, '652619501', '123456789', 'Active'),
(3, 'Satheeshchandra P D', 'spd', 'Male', '1990-12-08', 'Assistant Professor', 0, 'no image', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_rollno` varchar(10) NOT NULL,
  `st_class` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `language` varchar(25) NOT NULL,
  `elective_paper` varchar(20) NOT NULL,
  `extension_activities` varchar(50) NOT NULL,
  `student_image` varchar(300) NOT NULL,
  `student_password` varchar(300) NOT NULL,
  `student_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_rollno`, `st_class`, `course_id`, `gender`, `dob`, `language`, `elective_paper`, `extension_activities`, `student_image`, `student_password`, `student_status`) VALUES
(12, 'Sanjay Joshi', '180980', '1', 5, 'Male', '2000-08-29', 'Sanskrit', 'Sanskrit', 'NCC', '1028989555Database Schema Diagram.png', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Active'),
(13, 'Mahesh Gowda', '180924', 'Third Year', 1, 'Male', '2000-04-14', 'Kannada', 'Kannada', 'NCC', '11094230581028989555Database Schema Diagram.png', 'maheshgowda', '');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

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
-- AUTO_INCREMENT for table `complaint_report`
--
ALTER TABLE `complaint_report`
  MODIFY `complaint_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dept_course`
--
ALTER TABLE `dept_course`
  MODIFY `dept_course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `event_participation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_result`
--
ALTER TABLE `event_result`
  MODIFY `event_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_result_status`
--
ALTER TABLE `event_result_status`
  MODIFY `result_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
