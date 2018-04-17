-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 01:20 PM
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
-- Table structure for table `sample_table_1`
--

CREATE TABLE IF NOT EXISTS `sample_table_1` (
  `id` int(11) NOT NULL,
  `sample_field` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sample_table_1`
--

INSERT INTO `sample_table_1` (`id`, `sample_field`) VALUES
(1, 'Sample Data 1'),
(2, 'Sample Data 2'),
(3, 'Sample Data 3'),
(4, 'Sample Data 4'),
(5, 'Sample Data 5'),
(6, 'Sample Data 6'),
(7, 'Sample Data 7'),
(8, 'Sample Data 8'),
(9, 'Sample Data 9'),
(10, 'Sample Data 10'),
(11, 'Sample Data 11'),
(12, 'Sample Data 12'),
(13, 'Sample Data 13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_table_1`
--
ALTER TABLE `sample_table_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_table_1`
--
ALTER TABLE `sample_table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
