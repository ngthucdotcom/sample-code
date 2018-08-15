-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2018 at 04:56 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(5) NOT NULL,
  `parent` char(5) NOT NULL DEFAULT '0',
  `text` varchar(255) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `parent`, `text`, `description`) VALUES
(1, '#', 'Trường Đại học Cần Thơ', 'Trường Đại học vùng trọng điểm Quốc gia'),
(2, '#', 'Đoàn trường Đại học Cần Thơ', 'Đoàn tương đương cấp Quận/Huyện'),
(3, '#', 'Hội Sinh viên trường Đại học Cần Thơ', 'Trực thuộc Hội Sinh viên Thành phố Cần Thơ'),
(4, '2', 'Đoàn khoa CNTT&TT', 'Đoàn cơ sở trực thuộc Đoàn trường Đại học Cần Thơ'),
(5, '3', 'Liên Chi hội Sinh viên Cần Thơ', 'Liên Chi hội theo tỉnh thành trực thuộc Hội sinh viên trường Đại học Cần Thơ'),
(6, '1', 'Trung tâm Học liệu', 'Thư viện học liệu, trung tâm trực thuộc trường Đại học Cần Thơ'),
(7, '4', 'CLB Tin học', 'CLB học thuật trực thuộc Đoàn khoa CNTT&TT'),
(8, '4', 'Đội Thanh niên Tình nguyện', 'Lực lượng sinh viên tình nguyện trực thuộc Đoàn khoa CNTT&TT'),
(9, '#', 'Đảng ủy trường Đại học Cần Thơ', 'Quản lý công tác Đảng viên tại Đảng bộ trường Đại học Cần Thơ'),
(10, '1', 'Khoa CNTT&amp;TT', 'Khoa đào tạo các chuyên ngành về Công nghệ thông tin và truyền thông'),
(11, '#', 'Công đoàn trường Đại học Cần Thơ', 'Tổ chức của công chức viên chức trường Đại học Cần Thơ'),
(12, '9', 'Đảng ủy khoa CNTT&TT', 'Tổ chức Đảng của khoa CNTT&TT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
