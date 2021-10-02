-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 12:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
(86, 1, 'IT CLUB', 'this club comes under Computer', 0, 'Active');

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
(1, 2, 0, 6, 0, '2021-09-30 13:18:37', 'Error in displaying result', '1662593132', 'Closed'),
(4, 0, 14, 0, 1, '2021-09-30 14:52:29', 'will be sort down soon', '648634319', 'Processing'),
(5, 0, 14, 0, 1, '2021-09-30 15:07:47', '', '460633998', 'Closed'),
(6, 0, 14, 0, 1, '2021-09-30 15:16:00', '', '1592026786', 'Closed'),
(7, 5, 0, 6, 0, '2021-09-30 15:53:31', 'points are not distributed properly', '1897345846', 'Processing'),
(8, 0, 11, 0, 7, '2021-09-30 15:56:25', 'will contact you soon', '171045819', 'Processing');

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
(1, 1, 'Single', 1, 'Dancing Competition', 'In this event students can participate in dancing competitions where they have to perform their classic dancing skills. ', '*Only Classic dance has to be performed<br />\r\n*Competitors are not allowed to play any other musics than classic<br />\r\n*Music should be submitted before starting the events<br />\r\n*Fire, knife or anything that is harmful is prohibuted', '1389879318Danceposter.jpg', 3, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-13 14:30:00', 'AV Room', 14, 20, 'Active'),
(2, 2, 'Single', 1, 'Coding Competition', 'This competition is about  programming knowledge in C and C++. Students who are interested in programming can participate.', '*Programming languages is used to this competition are C and C++.<br />\r\n*Students are not allowed to bring any books, sheets etc. <br />\r\n*Covid rules should be followed compulsory.', '525519386blue-programming-competition-custom-template-design-01efe9889793f251eab8080aa652010e.jpg', 1, 86, 'a:1:{i:0;s:1:\"0\";}', 'a:2:{i:0;s:11:\"Second Year\";i:1;s:10:\"Third Year\";}', '2021-09-20 15:30:00', 'Computer Lab, 2nd Floor.', 13, 20, 'Active'),
(3, 3, 'Single', 1, 'Music Competition', 'This is a classic music competition . Interested students can participate.', '*Musical instruments are not allowed<br />\r\n*NO BGM<br />\r\n*Maximum 5 min are allowed to each participants', '360915919music.jfif', 3, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-09-30 10:30:00', 'AV Room, ground floor', 14, 20, 'Active'),
(4, 3, 'Team', 6, 'Music Competition', 'Interested students can participate to this group music competition', '*NO background music are allowed<br />\r\n*Students should wear uniform<br />\r\n*Participants must report before the event is going live', '778880590IMG-20210329-WA00001617137912.jpg', 3, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-02 12:30:00', 'AV Room', 14, 20, 'Active'),
(5, 3, 'Team', 6, 'Music Competition', 'Interested participants can join to this group event', '*No Background music is allowed<br />\r\n*Every participants must wear uniform<br />\r\n*Participants must report before the event is going live', '1753069612IMG-20210329-WA00001617137912.jpg', 3, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-02 12:30:00', 'AV Room', 14, 20, 'Inactive'),
(6, 5, 'Single', 1, 'Drawing Competition', 'Students who are interested in drawing and art can participate', '*Participates must bring their drawing tools with them<br />\r\n*Only drawing paper will be provided <br />\r\n*Every participants must wear college ID Card', '841074848cecf6ed2cf25f2a6d0f0ec920225ec58.jpg', 3, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-20 12:45:00', 'Classroom 1.25', 14, 25, 'Active'),
(7, 1, 'Single', 1, 'Transaction alert for your ICICI Bank debit card', 'Dear Customer,<br />\r\n<br />\r\nGreetings from ICICI Bank.<br />\r\n<br />\r\nA purchase of INR 325.00 has been made using your Debit Card linked to ICICI Bank Account XX424 on 02-OCT-21. Info: IIN*Flipkart In.<br />\r\n<br />\r\nThe Available Balance in your account is INR 16,393.63.<br />\r\n<br />\r\nIn case you have not done this transaction, please call on 18002662 or SMS BLOCK 424 to 9215676766  from your registered mobile number. <br />\r\n<br />\r\nNEVER SHARE your Card number, CVV, PIN, OTP, Internet Banking User ID, Password or URN with anyone, even if the caller claims to be a bank employee. Sharing these details can lead to unauthorised access to your account.<br />\r\n<br />\r\nLooking forward to more opportunities to be of service to you.<br />\r\n<br />\r\nSincerely,<br />\r\n<br />\r\nCustomer Service Team<br />\r\nICICI Bank Limited<br />\r\n<br />\r\nThis is a system-generated e-mail. Please do not reply to this e-mail.', 'Kindly wear helmet', '12309883671.jpg', 6, 0, 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-03 11:30:00', '<br />\r\n<br />\r\nElectricity Bill Due<br />\r\nService Provider<br />\r\nMangalore Electricity Supply Company Ltd.', 15, 3, 'Inactive'),
(8, 4, 'Single', 1, 'FIFA World Cup', 'he biggest single sport internat<br />\r\nional sporting event.<br />\r\n FIFA Women\'s World Cup — the most important competition in international football for women. ... Olympic Games Football — mens and women\'s tournament.', 'Kindly wear suits<br />\r\nabcdxyz<br />\r\ntest', '8471810832.jpg', 1, 0, 'a:1:{i:0;s:1:\"0\";}', 'a:1:{i:0;s:1:\"0\";}', '2021-10-05 11:30:00', 'Magnalorea', 11, 5, 'Active');

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
(1, 1, 1, 'Single', '0', '2021-09-11 13:24:30', 'Present'),
(2, 2, 2, 'Single', '0', '2021-09-16 16:57:29', 'Present'),
(3, 2, 1, 'Single', '0', '2021-09-16 17:14:09', 'Present'),
(4, 3, 1, 'Single', '0', '2021-09-17 16:06:39', 'Present'),
(5, 6, 1, 'Single', '0', '2021-09-30 10:06:02', 'Present'),
(6, 6, 5, 'Single', '0', '2021-09-30 10:06:49', 'Present'),
(7, 6, 6, 'Single', '0', '2021-09-30 10:09:52', 'Present'),
(8, 6, 2, 'Single', '0', '2021-09-30 10:10:27', 'Present'),
(10, 8, 1, 'Single', '0', '2021-10-02 12:26:12', 'Applied'),
(11, 8, 2, 'Single', '0', '2021-10-02 12:28:48', 'Applied');

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
(1, 3, '', '', 0),
(2, 2, '', '', 0),
(3, 1, '', '', 14),
(4, 6, 'Event is about music competition', '', 14);

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
(1, 1, 3, 1, 4, '0', 3, 'Single', '0'),
(2, 2, 2, 2, 2, '0', 3, 'Single', '0'),
(3, 2, 2, 1, 3, '0', 3, 'Single', '0'),
(4, 3, 1, 1, 1, '1', 25, 'Single', '0'),
(5, 4, 6, 1, 5, '1', 25, 'Single', '0'),
(6, 4, 6, 5, 6, '3', 10, 'Single', '0'),
(7, 4, 6, 6, 7, '0', 3, 'Single', '0'),
(8, 4, 6, 2, 8, '2', 15, 'Single', '0');

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
(11, 'Super Admin', '29844347images (2).jfif', 'Admin', 1, 'aravinda@technopulse.in', '6d663575733b6d51ef5eb055e625a8ed', 'Male', '1992-07-27', 'Active'),
(13, 'Shailesh', '1727587416', 'HOD', 1, 'shailesh', '0bda4b854d5e737cad7e3c1fb0653ac5', 'Male', '1887-08-12', 'Active'),
(14, 'Pavitra', '1986491062', 'Lecturer', 3, 'bladesaji1234@gmail.com', 'a45792991ad4847f5b5205b25e045b0e', 'Male', '1993-11-09', 'Active'),
(15, 'Raghav', '605641646', 'Lecturer', 6, 'Raghav@sdmcujire.in', '66098a11003c338053a48ea2f052cefb', 'Male', '1995-10-10', 'Active');

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
(1, 'Sajith Thomas', 1, '180937', '9ceaa2dc62b2034f82dc00234d31e2bc', 'Third Year', '19623721420210320_180759.jpg', 'Male', '2000-09-04', 'Kannada', 'Hindi', 'None', 'Active'),
(2, 'mahesh', 1, '180924', '5c7e14ee147b7f20b7dcb53977bced8e', 'Third Year', '553978729DSC_0710.JPG', 'Male', '2000-12-04', 'Kannada', 'Sanskrit', 'None', 'Active'),
(4, 'Kousthub Shetty', 1, '180923', '25d55ad283aa400af464c76d713c07ad', 'Third Year', '1230483184Kousthub.jpeg', 'Male', '2000-06-05', 'Kannada', 'Political Science', 'None', 'Active'),
(5, 'Swathi', 2, '170945', '25d55ad283aa400af464c76d713c07ad', 'Second Year', '55948467320210312_153054.jpg', 'Female', '2001-02-05', 'Hindi', 'Chemistry', 'NCC', 'Active'),
(6, 'Rani', 3, '120145', '25d55ad283aa400af464c76d713c07ad', 'First Year', '1983800920', 'Female', '2002-07-02', 'Sanskrit', 'Physics', 'Sports', 'Active');

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
  MODIFY `complaint_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `event_participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_result`
--
ALTER TABLE `event_result`
  MODIFY `event_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_result_status`
--
ALTER TABLE `event_result_status`
  MODIFY `result_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
