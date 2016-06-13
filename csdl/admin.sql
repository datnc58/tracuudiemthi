-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2016 at 06:45 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE `hocky` (
  `hockyid` int(11) NOT NULL,
  `namhocid` int(11) NOT NULL,
  `namehocky` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`hockyid`, `namhocid`, `namehocky`) VALUES
(1, 1, 'kì I'),
(2, 2, 'kì I'),
(3, 1, 'kì II'),
(4, 2, 'kì II');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `monhocid` int(50) NOT NULL,
  `hockyid` int(11) NOT NULL,
  `namemonhoc` varchar(255) NOT NULL,
  `mamonhoc` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`monhocid`, `hockyid`, `namemonhoc`, `mamonhoc`, `pdf`) VALUES
(77, 1, 'Tin học cơ sở 1', 'INT1003 1', 'uploads/tin hoc co so 1 - int1003 1.pdf'),
(78, 2, 'Cơ sở dữ liệu', 'INT2207 1', 'uploads/co so du lieu - INT2207 1.pdf'),
(79, 1, 'Đồ họa máy tính', 'INT 3403 2', 'uploads/Do hoa may tinh_INT3403 1.pdf'),
(83, 1, 'Kiến trúc máy tính', 'INT2205 2  ', ''),
(84, 2, 'Các Vấn Đề Hiện Đại của CNTT', 'INT3507 1', 'uploads/cacvdhdcntt-int3507 1.pdf'),
(89, 1, 'Phát triển ứng dụng web', 'INT3306 1', ''),
(90, 4, 'Cơ nhiệt', 'PHY1100 3', ''),
(91, 1, 'Kiến trúc máy tính', 'INT2205 2  ', ''),
(93, 2, 'Các Vấn Đề Hiện Đại của CNTT', 'INT3507 2', ''),
(94, 2, 'Các Vấn Đề Hiện Đại của CNTT', 'INT3507 3', ''),
(95, 2, 'Các Vấn Đề Hiện Đại của CNTT', 'INT3507 4', '');

-- --------------------------------------------------------

--
-- Table structure for table `namhoc`
--

CREATE TABLE `namhoc` (
  `namhocid` int(11) NOT NULL,
  `namenamhoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namhoc`
--

INSERT INTO `namhoc` (`namhocid`, `namenamhoc`) VALUES
(1, '2014-2015'),
(2, '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(28, 'admin', 'admin', 'admin'),
(32, 'teacher', '123456', 'teacher'),
(33, 'manager', '123456', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`hockyid`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`monhocid`);

--
-- Indexes for table `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`namhocid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hocky`
--
ALTER TABLE `hocky`
  MODIFY `hockyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `monhocid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `namhocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
