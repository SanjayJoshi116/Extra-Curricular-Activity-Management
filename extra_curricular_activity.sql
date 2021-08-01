-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 01:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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
  `complaint_date_tim` datetime NOT NULL,
  `complaint_detail` text NOT NULL,
  `complain_doc` varchar(300) NOT NULL,
  `complaint_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_report`
--

INSERT INTO `complaint_report` (`complaint_report_id`, `student_id`, `staff_id`, `reply_complaint_report_id`, `complaint_date_tim`, `complaint_detail`, `complain_doc`, `complaint_status`) VALUES
(1, 16, 2, 0, '2021-07-31 14:30:14', '2342\r\n', '34', ''),
(2, 0, 0, 0, '2021-07-31 14:30:14', 'sadfsf', 'toor-dal-250x250.jpeg', ''),
(3, 0, 1, 0, '2021-07-31 14:30:14', 'hELLO', 'arhar-dal-500x500 (1).jpg', ''),
(4, 0, 1, 0, '2021-07-31 14:30:14', 'test', 'arhar-dal-500x500.jpg', ''),
(5, 0, 1, 0, '2021-07-31 14:30:14', 'test', 'arhar-dal-500x500.jpg', ''),
(6, 0, 1, 0, '2021-07-31 14:30:14', 'test', '1792047249', ''),
(7, 0, 1, 0, '2021-07-31 14:30:14', 'test test', '961952892Online grocery store Detailed design.docx', '');

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
(3, 'BSc', '', 'Active'),
(7, 'MCA Course', 'Master in Computer Application', 'Inactive'),
(8, 'Bzc', 'Bzc course', 'Active');

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
(2, 'Kannada', '', 'Active'),
(3, 'Commerce', 'Commerce department', 'Active');

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
(30, 1, 1, 'Active'),
(31, 1, 2, 'Active'),
(32, 1, 3, 'Active'),
(36, 3, 1, 'Active'),
(37, 3, 8, 'Active'),
(38, 2, 3, 'Active');

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
(1, 0, 'test', 'test desc', 'abcd', 'asdfj', 0, 0, 'test', '0000-00-00 00:00:00', 'Bangalore', 0, '0'),
(2, 0, 'International Dance Competition', 'Come and Participate for International Dance competition', 'Kindly bring all the materials', '', 0, 0, 'First Year', '0000-00-00 00:00:00', 'Bangalore', 0, '0'),
(3, 2, 'International Dance Competition', 'Come and Participate for International Dance competition', 'Kindly bring all the materials', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Bangalore', 1, ''),
(4, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(5, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(6, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(7, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(8, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(9, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(10, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(11, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(12, 3, 'State Level Chess Competiton', 'Come and Make your entry for State Level Chess Competiton', 'Kindly pay Rs. 500 entry fees', '', 1, 0, 'First Year', '0000-00-00 00:00:00', 'Test', 1, 'Active'),
(13, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '', 1, 2, 'Second Year', '0000-00-00 00:00:00', 'Bangalore', 1, 'Active'),
(14, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '1910729414Database Schema Diagram.png', 1, 2, 'Second Year', '0000-00-00 00:00:00', 'Bangalore', 1, 'Active'),
(15, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '1817510492Database Schema Diagram.png', 1, 2, 'Second Year', '0000-00-00 00:00:00', 'Bangalore', 1, 'Active'),
(16, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '1028989555Database Schema Diagram.png', 1, 2, 'Second Year', '0000-00-00 00:00:00', 'Bangalore', 1, 'Active'),
(17, 2, 'State Level Competition', 'State Level Competition for Talents', 'Kindly attend one hour before', '1717883508Database Schema Diagram.png', 1, 2, 'Second Year', '0000-00-00 00:00:00', 'Bangalore', 1, 'Active'),
(18, 2, 'State Level Competition', 'Competition can arise between entities such as organisms, individuals, economic and social groups, etc. ... Competition is a major tenet of market economies and business, often associated with business competition as companies are in competition with at least one other firm over the same group of customers.', 'Event rules are stored in the Event Rule [em_match_rule] table. Configure and customize event rules to manage events and alert generation. Event rules do not change the event records in the Event table. Changes to event data are stored in the ServiceNow instance memory.', '1821207475Database Schema Diagram.png', 1, 2, 'Second Year', '2021-07-20 12:07:00', 'Bangalore', 2, 'Active'),
(19, 2, 'abcd', 'test record', 'test reules', '1587422358basmati-rice-1kg-500x500.jpg', 0, 1, 'Second Year', '2021-07-23 10:15:00', 'Bangalore', 1, 'Active'),
(20, 3, 'Unichess', 'unichess competition', 'This is quick chess', '2001974180arhar-dal-500x500 (1).jpg', 1, 1, 'First Year', '2021-07-30 16:16:00', 'test', 1, 'Active');

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

--
-- Dumping data for table `event_participation`
--

INSERT INTO `event_participation` (`event_participation_id`, `event_id`, `student_id`, `apply_dt_tim`) VALUES
(2, 18, 34, '2021-07-22 05:50:29'),
(3, 18, 34, '2021-07-22 05:50:29'),
(4, 18, 34, '2021-07-22 05:50:29'),
(5, 18, 34, '2021-07-22 05:50:29');

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

--
-- Dumping data for table `event_result_status`
--

INSERT INTO `event_result_status` (`result_status_id`, `event_result_id`, `event_id`, `student_id`, `event_participation_id`, `winning_position`, `point`) VALUES
(1, 12, 34, 45, 12, 'test', 3);

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
(3, 'Chess', 'Chess masters', 20, 10, 5, 3, 'Active'),
(4, 'Break Dance', 'Break dance competition', 25, 15, 10, 5, 'Active');

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
  `dob` date DEFAULT NULL,
  `staff_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_dp`, `staff_type`, `department_id`, `login_id`, `password`, `gender`, `dob`, `staff_status`) VALUES
(1, 'Mr. Admin', 'admin.jpg', 'Admin', 0, 'admin', 'd94354ac9cf3024f57409bd74eec6b4c', '', NULL, 'Active'),
(2, 'Mohit', '689938320basmati-rice-1kg-500x500.jpg', 'HOD', 1, '789456123', 'c62d929e7b7e7b6165923a5dfc60cb56', 'Male', '2021-07-12', ''),
(3, 'Mahesh kumar', '1211209911arhar-dal-500x500.jpg', 'Assistant Professor', 2, '741852963', 'c62d929e7b7e7b6165923a5dfc60cb56', '', NULL, 'Active');

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
(1, 'Rajkiran', 1, '123456', '2df594b9710111099edbdb7edaa43301', 'First Semester', 'no image', 'Male', '2021-07-14', 'abc', 'test', 'xyz', 'Active'),
(4, 'Rupesh Kuamr', 1, '774411', '2df594b9710111099edbdb7edaa43301', 'First Semester', 'no image', '', '2021-07-14', '', '', '', 'Active'),
(10, 'Iliyas', 3, '78978911', 'c62d929e7b7e7b6165923a5dfc60cb56', 'Second Year', '1226100850basmati-rice-1kg-500x500.jpg', 'Male', '2014-07-07', 'Sanskrit', 'Hindi', 'Rovers & Rangers', 'Pending'),
(11, 'Peter king', 3, '1458', 'c62d929e7b7e7b6165923a5dfc60cb56', 'First Year', '1877291930arhar-dal-500x500 (1).jpg', 'Male', '2002-07-08', 'Hindi', 'Journalism', 'Rovers & Rangers', 'Pending'),
(12, 'Mahesh', 1, '789456', '9f30ef107518fb8579c51273be77827e', 'First Year', '1847893256toor-dal-250x250.jpeg', 'Male', '2021-12-31', 'Sanskrit', 'Sanskrit', 'NCC', 'Active'),
(13, 'Mahesh prasad', 1, '1234567890', 'c62d929e7b7e7b6165923a5dfc60cb56', 'First Year', '18618478492322b995-2ce8-4b5c-8485-738785b1616b.jpg', 'Male', '1999-05-04', 'Sanskrit', 'Physics', 'NCC', 'Suspended'),
(15, 'Mahesh kumar', 1, '789789', 'c62d929e7b7e7b6165923a5dfc60cb56', 'First Year', '21360444892322b995-2ce8-4b5c-8485-738785b1616b.jpg', 'Male', '2004-12-29', 'Sanskrit', 'Hindi', 'NCC', 'Active'),
(16, 'Alok kumar Bangalore', 2, '7418529633', 'b78d35416d192189aee5ef82ce37db24', 'First Year', '1058773050IMG-20200703-WA0040.jpg', 'Male', '2004-11-30', 'Sanskrit', 'Kannada', 'NCC', 'Active');

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
  MODIFY `complaint_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dept_course`
--
ALTER TABLE `dept_course`
  MODIFY `dept_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `event_participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_result`
--
ALTER TABLE `event_result`
  MODIFY `event_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_result_status`
--
ALTER TABLE `event_result_status`
  MODIFY `result_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
