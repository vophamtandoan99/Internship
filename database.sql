-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 11:31 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlthongtinsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `id` int(11) NOT NULL,
  `codestudy` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `address` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `date` date NOT NULL,
  `schoolid` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `img` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`id`, `codestudy`, `fullname`, `gender`, `address`, `date`, `schoolid`, `status`, `img`, `phone`) VALUES
(5, 'TTS001', 'VÃµ Pháº¡m Táº¥n Äoan', 1, 'PhÃº YÃªnn', '1999-08-19', 14, 1, '6.jpg', 337338920),
(6, 'TTS002', 'Huá»³nh Thá»‹ HoÃ i NhÆ°', 2, 'ÄÃ  Náºµng', '2000-03-08', 15, 2, '5.jpg', 963258741);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `codeschool` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nameschool` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `codeschool`, `nameschool`, `address`, `phone`, `status`) VALUES
(14, 'UN001', 'TrÆ°á»ng Ä‘áº¡i há»c PhÃº YÃªn', 'PhÃº YÃªn', 123456789, 1),
(15, 'UN002', 'TrÆ°á»ng Ä‘áº¡i há»c Duy TÃ¢n', 'ÄÃ  Náºµng', 987654321, 1),
(16, 'UN003', 'TrÆ°á»ng Ä‘áº¡i há»c Nha Trang', 'KhÃ¡nh HÃ²a', 654321987, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `roleid` int(2) NOT NULL,
  `img` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `roleid`, `img`, `status`) VALUES
(2, 'admin@gmail.com', 'VÃµ Pháº¡m Táº¥n Äoan', '123', 1, '3.png', 1),
(9, 'vophamtandoan@gmail.com', 'Táº¥n Äoan', '123', 2, '2.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schoolid` (`schoolid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`schoolid`) REFERENCES `school` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
