-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2017 at 02:42 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activity_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `assess_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `activity_pic` varchar(255) DEFAULT NULL,
  `descr` text NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `over` tinyint(10) DEFAULT NULL,
  `remark` tinyint(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `create_time` int(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `user_id`, `type_id`, `assess_id`, `name`, `title`, `activity_pic`, `descr`, `start_time`, `end_time`, `location`, `over`, `remark`, `status`, `create_time`) VALUES
(1, 1, 1, NULL, '111', '222', '5a25619b98d14.jpg', 'fff', '1512662400', '1514217600', 'ddd', 100, 97, 0, 1510580537),
(10, 1, 1, NULL, '222', '1111', '5a2804fcbeac3.jpg', '111', '1512748800', '1514566740', '111', 111, 110, 0, 1512400983),
(11, 1, 3, NULL, 'jkhriasg', 'jkhi', '5a2eaaa94486a.jpg', 'as-eluhalsyuhjxbc,jkhzldhkl xl uhzuid hilz dfiks', '1516496400', '1516500000', 'jhks', 30, 29, 0, 1513007810),
(12, 4, 3, NULL, 'kjhk', 'mjhjiygh', '5a2eb146ed96b.jpg', 'jhdgkjhzxb hasd uzsd ukhg zskudhg kzuhsd uhz dsh kzjhsd\'b jhzb sdhb zukdhc zhsdb khz dskh zkuh', '1516510800', '1516518000', 'hasdiuh', 100, 100, 0, 1513009494),
(13, 4, 2, NULL, 'uhihe', 'hjdf', '5a2eb55948e65.jpg', 'JHIU IUH IUH IUH IU I IGI IUKYSGIUY GIUYG IYG IUY SIDUYH SEKUYG UY DSKUS ZKDUFYG SKYDFGHKSUDH FS DF', '1521673200', '1521763200', 'UCL', 20, 20, 0, 1513010550),
(14, 4, 3, NULL, 'kuhgiu', 'hjyugh', '5a300b86d623d.JPG', 'hbj', '1550710800', '1550714400', 'jkhb2', 20, 19, 0, 1513098153),
(15, 4, 2, NULL, 'party never forget', 'kjnbk', '5a32bf68bf882.jpg', 'IUHIYUG YG IUYG', '1525528800', '1525546800', 'MOS', 40, 39, 0, 1513275269),
(16, 4, 2, NULL, 'WE WANNA PARTY', 'KJNKJN', '5a32bfac31a8c.jpg', 'iuhiugh h yg uyg iyhiuhgiuygh iyg iuyg uig uhg kuhg kuygh', '1528372800', '1528394400', 'Loop', 60, 60, 0, 1513275349);

-- --------------------------------------------------------

--
-- Table structure for table `assess`
--

CREATE TABLE `assess` (
  `assess_id` int(11) NOT NULL,
  `enter_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(255) NOT NULL,
  `score` int(11) DEFAULT '5',
  `addtime` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assess`
--

INSERT INTO `assess` (`assess_id`, `enter_id`, `user_id`, `activity_id`, `title`, `content`, `score`, `addtime`, `status`) VALUES
(9, 1, 1, 1, '111', '111', 1, '1512751535', 0),
(10, 9, 4, 11, 'we', 'jhbsdjh\'bjuhasdg\'', 3, '1513009566', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enter`
--

CREATE TABLE `enter` (
  `enter_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_address` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enter`
--

INSERT INTO `enter` (`enter_id`, `user_id`, `activity_id`, `type_id`, `create_time`, `username`, `user_phone`, `activity_name`, `activity_address`, `code`, `status`) VALUES
(1, 1, 1, 1, '111', '11', '111', '111', '111', '111', 2),
(9, 4, 11, 3, '1513009543', 'adam', '07923283766', 'jkhriasg', 'jhks', '5a2eb18742e07', 1),
(10, 4, 1, 1, '1513011882', 'adam', '07923283766', '111', 'ddd', '5a2ebaaa6df2f', 1),
(11, 4, 10, 1, '1513089015', 'adam', '07923283766', '222', '111', '5a2fe7f715c11', 1),
(12, 1, 14, 3, '1513098203', 'dake', '00723284651', 'kuhgiu', 'jkhb2', '5a300bdb8014d', 1),
(14, 1, 15, 2, '1513276381', 'dake', '00723284651', 'party never forget', 'MOS', '5a32c3dd55491', 1);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `star` varchar(255) NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sendemail`
--

CREATE TABLE `sendemail` (
  `id` int(11) NOT NULL,
  `enter_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sendemail`
--

INSERT INTO `sendemail` (`id`, `enter_id`, `email`, `content`, `addtime`, `status`) VALUES
(1, 1, '418727165@qq.com', 'hahahh', '1512393052', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `pid`, `path`, `display`) VALUES
(1, 'outdoor activities', 0, '0,', 0),
(2, 'Campus party', 0, '0,', 0),
(3, 'Sports competition', 0, '0,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` int(1) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `performance` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `user_pic` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) NOT NULL,
  `birthday` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `realname`, `password`, `sex`, `user_email`, `user_phone`, `performance`, `university`, `user_address`, `status`, `user_pic`, `login_time`, `birthday`) VALUES
(1, 'dake', 'dake', 'e10adc3949ba59abbe56e057f20f883e', 1, 'DAKE@qq.com', '00723284651', 'Engineering ', 'UCL', 'London, England', 0, 't_5a2ff15c0d829.png', '1510151582', NULL),
(2, 'Tom', 'Tom', 'e10adc3949ba59abbe56e057f20f883e', 1, '123@qq.com', '18130619526', NULL, NULL, NULL, 0, NULL, '1510151582', NULL),
(3, 'Tomsss', 'Toms', 'e10adc3949ba59abbe56e057f20f883e', 1, '1309579432@qq.com', '07425900580', 'Computer major', 'University of London', 'London, England', 0, NULL, '1512402349', '2017-12-31'),
(4, 'adam', 'adam', 'e10adc3949ba59abbe56e057f20f883e', 1, 'adam@ul.com', '07923283766', 'Engieering', 'UCL', 'London', 0, 't_5a2efad222add.jpg', '1513008467', '2017-12-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `assess`
--
ALTER TABLE `assess`
  ADD PRIMARY KEY (`assess_id`);

--
-- Indexes for table `enter`
--
ALTER TABLE `enter`
  ADD PRIMARY KEY (`enter_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendemail`
--
ALTER TABLE `sendemail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `assess`
--
ALTER TABLE `assess`
  MODIFY `assess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `enter`
--
ALTER TABLE `enter`
  MODIFY `enter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sendemail`
--
ALTER TABLE `sendemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
