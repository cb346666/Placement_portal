-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2024 at 04:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35759338_user_authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`) VALUES
(3, 'admin@gmail.com', 'admin123'),
(5, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`, `created_on`) VALUES
(1, 'admin', 'hii', '2024-02-29 10:16:03'),
(2, 'student', 'hello sir', '2024-02-29 10:16:32'),
(3, 'student', 'kya hua?', '2024-02-29 10:16:45'),
(4, 'student', 'hello', '2024-02-29 10:17:11'),
(5, 'student', 'hiii', '2024-02-29 10:17:59'),
(6, 'student', 'hello', '2024-02-29 10:18:08'),
(7, 'admin', 'hii\r\n', '2024-02-29 10:18:41'),
(8, 'admin', 'hiii\r\n', '2024-02-29 10:18:45'),
(9, 'admin', 'hii\r\n', '2024-02-29 10:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `job_news`
--

CREATE TABLE `job_news` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_upload` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_news`
--

INSERT INTO `job_news` (`id`, `company_name`, `job_title`, `description`, `file_upload`, `created_at`) VALUES
(1, 'Infotech Solution', 'Web And Software Developer ', 'Job Location: Ahmedabad, Gujarat. No. of Vacancies: 10 + Shift Timing: US/Night Shifts (5 Days per week working) Qualifying Criteria to Apply: Graduation completed in 2023 or earlier batches with Computer Science/IT background viz. B.Tech/M.Tech/B.E/M.E (CSE, IT); BSc./MSc.(IT); BCA/MCA; Diploma/PGD/MBA (IT), etc. Applicants should be flexible to Work from Office as per US/Night Shift timing. We need Candidates with excellent communication skills(Fluent English). Basic conceptual knowledge in Technical/IT skills viz. SQL(MySQL/MS SQL) + Networking & OS + JAVA/Core JAVA + Apache Tomcat(negligible) + jQuery(negligible).', 'Guide.pdf', '2024-02-13 09:09:11'),
(13, 'Sofiya Solutions', 'Android Developer', 'Job Location: Ahmedabad, Gujarat. No. of Vacancies: 10 + Shift Timing: US/Night Shifts (5 Days per week working) Qualifying Criteria to Apply: Graduation completed in 2023 or earlier batches with Computer\r\n', 'Bhanupratap CV.pdf', '2024-02-28 10:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `modified_on`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2024-02-29 10:15:56'),
(2, 'student', 'student@gmail.com', 'student', '2024-02-29 10:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(2, 'Lecture of Python', 'Python', '2024-02-29 23:36:00', '2024-02-28 12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_super_admins`
--

CREATE TABLE `staff_super_admins` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('staff','super_admin') NOT NULL,
  `profile_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_super_admins`
--

INSERT INTO `staff_super_admins` (`user_id`, `username`, `email`, `password`, `role`, `profile_name`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', 'admin123', 'staff', 'Placement Team'),
(2, 'admin', 'admin@gmail.com', 'admin', 'super_admin', 'HOD'),
(9, 'Thakurji', 'cb346666@gmail.com', '1234', 'super_admin', 'Thakurji');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `email`, `password`, `profile_name`) VALUES
(1, 'student', 'student@gmail.com', 'student', 'Brijesh Chauhan'),
(3, 'admin', 'fvdc', '$2y$10$9H4K.wJ/CvIQbaT/JiQS.Oilzg/jnIPkp4nbC4TevrsYVOmeaK3TG', 'xyz'),
(4, 'fwecd', 'efwdsc', '$2y$10$OoRsUrZrVJM7Ptvs3aVvf.26hpZcjJ4gd3z1ug5DKKgK0e0E2uEOq', 'fwe');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`) VALUES
(6, 'John', 'Bates', 'email@email.com', 'uploads/1662232332user.jpg', '$2y$10$PUh/h0Exbs1GY/6o5CsbauwyImZPwVJ6AH0aLTDOlJzncIJVWi386', 'Male', '2022-09-03 21:12:12'),
(7, 'Mary', 'Bates', 'mary@email.com', 'uploads/1662232388alicia-keys.jpg', '$2y$10$Q7c1b7rYlQ2nc9Jw.RWDAeL69f7zMy5y9UYx4wNUj7OSS64yT0KBm', 'Female', '2022-09-03 21:13:08'),
(9, 'Jane', 'Doe', 'jane@email.com', 'uploads/1662233918pexels-photo-3756774.jpeg', '$2y$10$DhrdIIPD7hgJDvJAjNeFieLQU2M05yEPES2lJbJhARUU./ATsRzwW', 'Female', '2022-09-03 21:38:38'),
(10, 'Thakur', 'Ji', 'xyz@gmail.com', 'uploads/17094047313211424.jpg', '$2y$10$SBjUqTwm15r1urE0V23REevh9DJUO44tVaoivjd42F1u.i4GVhqb.', 'Male', '2024-03-02 19:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'xyz@gmail.com', 'xyz123'),
(5, 'admin@gmail.com', 'admin123'),
(6, 'Monish', '12345678'),
(7, 'chauhan gaurav ', '@gaurav19');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `email`, `uid`, `department`, `course`, `semester`, `phone`, `cv`, `created_at`) VALUES
(1, 'cb34666666@gmail.com', 'frdxvsd', 'scxscvx', 'fscxsx', 'fcs', 'cdsxsd', 'Guide For Ubuntu Installation.pdf', '2024-02-13 08:01:27'),
(2, 'cb34666666@gmail.com', 'dhwayhsvdfwabgs', 'dbnqwahsz', 'djwhashb', '5', '95625885496hdus', 'PROJECT MENU monish.pdf', '2024-02-16 14:33:26'),
(3, 'cb34666666@gmail.com', 'U42000003985', 'Engineering', 'BSC IT', '6', '9999999999', 'Project Definitions Of BSC IT - 6.pdf', '2024-02-24 04:54:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_news`
--
ALTER TABLE `job_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_super_admins`
--
ALTER TABLE `staff_super_admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_news`
--
ALTER TABLE `job_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_super_admins`
--
ALTER TABLE `staff_super_admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `staff_super_admins` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
