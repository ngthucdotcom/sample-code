-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 05:53 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `id` int(5) NOT NULL,
  `answer` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `question` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_exams`
--

CREATE TABLE IF NOT EXISTS `quiz_exams` (
  `id` int(5) NOT NULL,
  `exam` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `teacher` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_exam_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_exam_questions` (
  `examcode` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `examid` int(5) NOT NULL,
  `questionid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int(5) NOT NULL,
  `question` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `answer` int(5) DEFAULT NULL,
  `level` char(10) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE IF NOT EXISTS `quiz_results` (
  `id` int(5) NOT NULL,
  `examcode` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `teacher` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `student` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `right` int(5) NOT NULL,
  `wrong` int(5) NOT NULL,
  `point` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_users`
--

CREATE TABLE IF NOT EXISTS `quiz_users` (
  `username` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` char(10) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answerquestion` (`question`);

--
-- Indexes for table `quiz_exams`
--
ALTER TABLE `quiz_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_examteacher` (`teacher`);

--
-- Indexes for table `quiz_exam_questions`
--
ALTER TABLE `quiz_exam_questions`
  ADD PRIMARY KEY (`examcode`),
  ADD KEY `fk_examcode` (`examid`),
  ADD KEY `fk_examquestion` (`questionid`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questionanswer` (`answer`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resultexamcode` (`examcode`),
  ADD KEY `fk_resultteacher` (`teacher`),
  ADD KEY `fk_resultstudent` (`student`);

--
-- Indexes for table `quiz_users`
--
ALTER TABLE `quiz_users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_exams`
--
ALTER TABLE `quiz_exams`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `fk_answerquestion` FOREIGN KEY (`question`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_exams`
--
ALTER TABLE `quiz_exams`
  ADD CONSTRAINT `fk_examteacher` FOREIGN KEY (`teacher`) REFERENCES `quiz_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_exam_questions`
--
ALTER TABLE `quiz_exam_questions`
  ADD CONSTRAINT `fk_examcode` FOREIGN KEY (`examid`) REFERENCES `quiz_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_examquestion` FOREIGN KEY (`questionid`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `fk_questionanswer` FOREIGN KEY (`answer`) REFERENCES `quiz_answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `fk_resultexamcode` FOREIGN KEY (`examcode`) REFERENCES `quiz_exam_questions` (`examcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resultstudent` FOREIGN KEY (`student`) REFERENCES `quiz_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resultteacher` FOREIGN KEY (`teacher`) REFERENCES `quiz_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
