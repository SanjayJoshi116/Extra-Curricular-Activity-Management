-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 05:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
  `coordinator` int(30) NOT NULL,
  `club_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `department_id`, `club`, `club_details`, `coordinator`, `club_status`) VALUES
(86, 1, 'IT CLUB', 'this club comes under Computer', 13, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `complaint_report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `event_id` int(40) NOT NULL,
  `reply_complaint_report_id` int(11) NOT NULL,
  `complaint_date_tim` datetime NOT NULL,
  `complaint_detail` text NOT NULL,
  `complain_doc` varchar(300) NOT NULL,
  `complaint_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_report`
--

INSERT INTO `complaint_report` (`complaint_report_id`, `student_id`, `staff_id`, `event_id`, `reply_complaint_report_id`, `complaint_date_tim`, `complaint_detail`, `complain_doc`, `complaint_status`) VALUES
(12, 2, 0, 16, 0, '2021-10-05 08:06:31', 'Result is not announcing', '396263481', 'Processing'),
(13, 0, 16, 0, 12, '2021-10-05 08:07:42', 'should check', '934598121', 'Processing'),
(14, 4, 0, 16, 0, '2021-10-05 08:09:03', 'sdvsxzcvds', '277794705', 'New');

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
(1, 'BCA', 'Graduation of Bachelor of Computer Application ', 'Active'),
(2, 'BCOM', 'Graduation of Bachelor of Commerce', 'Active'),
(3, 'BA', 'Graduation of Bachelor of Administration', 'Active'),
(4, 'Bsc', 'Graduation of Bachelor of Science', 'Active');

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
(1, 'Computer Science', 'This is the department of computer science', 'Active'),
(2, 'Commerce', 'This is the department of commerce', 'Active'),
(3, 'English', 'This is the department of English', 'Active'),
(4, 'Kannada', 'This is the department of kannada', 'Active'),
(5, 'Hindi', 'This is the department of hindi', 'Active'),
(6, 'Physical Education', 'This is a physical education department. Students are trained for games and athletics.', 'Active');

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
(4, 1, 1, 'Active'),
(5, 1, 2, 'Active'),
(6, 1, 4, 'Active'),
(7, 2, 2, 'Active'),
(14, 3, 1, 'Active'),
(15, 3, 2, 'Active'),
(16, 3, 3, 'Active'),
(17, 3, 4, 'Active'),
(18, 5, 1, 'Active'),
(19, 5, 2, 'Active'),
(20, 5, 3, 'Active'),
(21, 5, 4, 'Active'),
(22, 4, 1, 'Active'),
(23, 4, 2, 'Active'),
(24, 4, 3, 'Active'),
(25, 4, 4, 'Active'),
(26, 6, 1, 'Active'),
(27, 6, 2, 'Active'),
(28, 6, 3, 'Active'),
(29, 6, 4, 'Active');

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
(14, 5, 'Single', 1, 'drawing competition 2021', 'This is a drawing competion.', '*drawing paper will be given by the college.', '1191531029cecf6ed2cf25f2a6d0f0ec920225ec58.jpg', 2, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-12 11:00:00', 'classroom - 1:10', 16, 20, 'Active');

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
(23, 14, 2, 'Single', '0', '2021-10-04 19:11:36', 'Present'),
(24, 14, 8, 'Single', '0', '2021-10-04 19:12:05', 'Present'),
(25, 14, 10, 'Single', '0', '2021-10-04 19:19:00', 'Present'),
(26, 14, 9, 'Single', '0', '2021-10-04 19:19:35', 'Absent'),
(27, 14, 4, 'Single', '0', '2021-10-04 19:20:07', 'Present'),
(28, 15, 8, 'Team', 'Team Leader', '2021-11-04 11:43:48', 'Entered'),
(29, 15, 2, 'Team', '28', '2021-11-04 11:43:48', 'Entered'),
(30, 15, 4, 'Team', 'Team Leader', '2021-11-04 11:46:13', 'Entered'),
(31, 15, 0, 'Team', '30', '2021-11-04 11:46:13', 'Entered'),
(32, 16, 2, 'Team', 'Team Leader', '2021-11-04 12:05:10', 'Entered'),
(33, 16, 4, 'Team', '32', '2021-11-04 12:05:10', 'Entered'),
(36, 16, 8, 'Team', 'Team Leader', '2021-10-05 07:34:37', 'Entered'),
(37, 16, 7, 'Team', '36', '2021-10-05 07:34:37', 'Entered');

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
(6, 14, 'This is a good event.', 'a:1:{i:0;s:19:\"20210312_153054.jpg\";}', 16);

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
(13, 6, 14, 2, 23, '2', 15, 'Single', '0'),
(14, 6, 14, 8, 24, '1', 25, 'Single', '0'),
(15, 6, 14, 10, 25, '3', 10, 'Single', '0'),
(16, 6, 14, 9, 26, '', 0, 'Single', '0'),
(17, 6, 14, 4, 27, '0', 3, 'Single', '0');

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
(1, 'Dance', 'Students can participate in dance ', 'Active'),
(2, 'Programming', 'Students can participate in programming who has programming knowledge', 'Active'),
(3, 'Music', 'This is the event which involves in western and classsic musics', 'Active'),
(4, 'football', 'this category comes under sports and games', 'Active'),
(5, 'Art', 'This event is about drawing ,painting and sketching.', 'Active');

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
(1, 25, 15, 10, 3);

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
  `login_id` varchar(40) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `staff_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_dp`, `staff_type`, `department_id`, `login_id`, `password`, `gender`, `dob`, `staff_status`) VALUES
(11, 'Super Admin', '29844347images (2).jfif', 'Admin', 1, 'project111213@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '1992-07-27', 'Active'),
(14, 'Pavitra', '1986491062', 'Lecturer', 3, 'bladesaji1234@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '1993-11-09', 'Active'),
(15, 'Raghav', '605641646', 'Lecturer', 6, 'Raghav@sdmcujire.in', '25d55ad283aa400af464c76d713c07ad', 'Male', '1995-10-10', 'Active'),
(16, 'yash', '10596866789795cc3c78cce2e3aa33480863dab519.jpg', 'Assistant Professor', 2, 'staff180924@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '1990-11-12', 'Active'),
(17, 'rashmika', '13739429784.jpg', 'Lecturer', 4, 'rashmika123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '1990-11-11', 'Active');

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
(2, 'Mahesh', 1, '180924', '25d55ad283aa400af464c76d713c07ad', 'Third Year', '553978729DSC_0710.JPG', 'Male', '2000-12-04', 'Kannada', 'Sanskrit', 'None', 'Active'),
(4, 'Kousthub Shetty', 1, '180923', '25d55ad283aa400af464c76d713c07ad', 'Third Year', '1230483184Kousthub.jpeg', 'Male', '2000-06-05', 'Kannada', 'Political Science', 'None', 'Active'),
(7, 'jish', 1, '180921', '25d55ad283aa400af464c76d713c07ad', 'Third Year', '1969130035mobile_58408-_eafe9010-74fe-11e7-a55a-ab3ca1304be3.jpg', 'Male', '2001-04-15', 'Hindi', 'English', 'None', 'Active'),
(8, 'Sajith Thomas', 1, '180937', '25d55ad283aa400af464c76d713c07ad', 'Third Year', '50591634820210320_180759.jpg', 'Male', '2000-08-05', 'Kannada', 'Physics', 'None', 'Active'),
(9, 'ramesh', 2, '12345', '25d55ad283aa400af464c76d713c07ad', 'Second Year', '868656150', 'Male', '2000-11-11', 'Sanskrit', 'Chemistry', 'None', 'Active'),
(10, 'suresh', 3, '1234', '25d55ad283aa400af464c76d713c07ad', 'First Year', '1953043850actor-chace-crawford-arrives-at-the-2008-world-music-awards-at-the-D4H915.jpg', 'Male', '2000-12-11', 'Hindi', 'Home Science', 'Cultural', 'Active');

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
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `complaint_report`
--
ALTER TABLE `complaint_report`
  MODIFY `complaint_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dept_course`
--
ALTER TABLE `dept_course`
  MODIFY `dept_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `event_participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `event_result`
--
ALTER TABLE `event_result`
  MODIFY `event_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_result_status`
--
ALTER TABLE `event_result_status`
  MODIFY `result_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `point_settings`
--
ALTER TABLE `point_settings`
  MODIFY `point_set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
