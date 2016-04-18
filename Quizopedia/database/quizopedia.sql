-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 10:27 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `asu_id` int(10) NOT NULL,
  `confidence` varchar(50) NOT NULL,
  `courses_completed` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `mother_tongue` varchar(10) NOT NULL,
  `country_of_residence` varchar(20) NOT NULL,
  `other_country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='collects demographic information during registration';

--
-- Dumping data for table `demographics`
--

INSERT INTO `demographics` (`asu_id`, `confidence`, `courses_completed`, `description`, `gender`, `age`, `mother_tongue`, `country_of_residence`, `other_country`) VALUES
(24, 'Very Confident', 4, 'Some work experience in CS', 'male', '26-30', 'English', 'Another', 'Pakistan'),
(25, 'Moderately confident', 4, 'Self learer', 'female', '31-35', 'Another', 'Another', 'India'),
(21, 'Moderately confident', 4, 'Degree in CS', 'male', '18-25', 'English', 'Another', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `pretest` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used for registration and login';

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`, `fname`, `lname`, `gender`, `pretest`) VALUES
('hmaskai@asu.edu', 'harshil', 16, 'Harshil', 'Maskai', 'male', 1),
('anuran@gmail.com', 'anuran', 21, 'Anuran', 'Duttaroy', 'male', 1),
('skardile@asu.edu', 'saurabh', 24, 'Saurabh', 'Kardile', 'male', 1),
('nbari@asu.edu', 'nilam', 25, 'Nilam', 'Bari', 'female', 1),
('sshinde@asu.edu', 'sudesh', 26, 'Sudesh', 'Shinde', 'male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) NOT NULL,
  `question_text` varchar(1000) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `correct_answer` int(1) NOT NULL,
  `tags` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `tags`) VALUES
(1, 'Which inheritance does java not support?', 'multiple', 'multilevel', 'single', 'runtime', 1, 'inheritance'),
(2, 'How is unused memory cleared in java?', 'garbage bins', 'garbage collectors', 'crawlers', 'destructors', 2, 'garbage collection');

-- --------------------------------------------------------

--
-- Table structure for table `student_questions`
--

CREATE TABLE `student_questions` (
  `user_id` int(11) NOT NULL,
  `question_id` int(10) NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_questions`
--

INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES
(24, 2, 1),
(16, 2, 2),
(16, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `student_questions`
--
ALTER TABLE `student_questions`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
