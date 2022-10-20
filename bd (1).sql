-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 02:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `number` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `number`, `status`) VALUES
(1, 'Ambani', 'mumbai', 22222222, 1),
(7, 'ram', 'ranchi', 22222222, 1),
(8, 'dalmai', 'japan', 123456789, 1),
(9, 'Adani', 'new york', 475896, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `amt` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `amt`, `status`) VALUES
(2, 'helicopter', 36.36, 0),
(7, 'bulldozer', 12, 0),
(9, 'apple', 1235.2, 1),
(12, 'car', 111, 1),
(14, 'blackberry', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p1`
--

CREATE TABLE `p1` (
  `id` int(20) NOT NULL,
  `rno` int(20) NOT NULL,
  `rdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p1`
--

INSERT INTO `p1` (`id`, `rno`, `rdate`, `name`, `amt`) VALUES
(33, 221, '2022-10-19', 'Ambani', 1235.2),
(35, 1, '2022-10-05', 'ram', 1235.2),
(63, 6, '2022-10-19', 'Ambani', 60.36),
(64, 8, '2022-10-19', 'ram', 222),
(65, 10, '2022-10-19', 'ram', 2542.4),
(69, 45, '2022-10-19', 'Ambani', 12692.4);

-- --------------------------------------------------------

--
-- Table structure for table `p2`
--

CREATE TABLE `p2` (
  `id` int(10) NOT NULL,
  `pid` int(20) NOT NULL,
  `item` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `qun` int(10) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p2`
--

INSERT INTO `p2` (`id`, `pid`, `item`, `price`, `qun`, `amt`) VALUES
(154, 45, 'blackberry', 10000, 1, 10000),
(155, 45, 'apple', 1235.2, 2, 2470.4),
(156, 45, 'car', 111, 2, 222);

-- --------------------------------------------------------

--
-- Table structure for table `s1`
--

CREATE TABLE `s1` (
  `id` int(30) NOT NULL,
  `rno` int(50) NOT NULL,
  `rdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `amt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s1`
--

INSERT INTO `s1` (`id`, `rno`, `rdate`, `name`, `amt`) VALUES
(1, 1, '2022-10-08', 'ram', 2579),
(3, 3, '2022-10-19', 'ram', 2482),
(5, 9, '2022-10-19', 'Ambani', 234),
(6, 45, '2022-10-19', 'Ambani', 2692);

-- --------------------------------------------------------

--
-- Table structure for table `s2`
--

CREATE TABLE `s2` (
  `id` int(30) NOT NULL,
  `sid` int(30) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `qun` int(50) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s2`
--

INSERT INTO `s2` (`id`, `sid`, `item`, `price`, `qun`, `amt`) VALUES
(1, 1, 'helicopter', 36.36, 2, 72.72),
(2, 1, 'apple', 1235.2, 2, 2470.4),
(3, 1, 'bat', 36, 1, 36),
(4, 2, 'helicopter', 36.36, 1, 36.36),
(6, 3, 'bulldozer', 12, 1, 12),
(7, 3, 'apple', 1235.2, 2, 2470.4),
(9, 9, 'car', 111, 2, 222),
(10, 45, 'car', 111, 2, 222),
(11, 45, 'apple', 1235.2, 2, 2470.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`number`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item` (`item`),
  ADD UNIQUE KEY `item_2` (`item`);

--
-- Indexes for table `p1`
--
ALTER TABLE `p1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rno` (`rno`);

--
-- Indexes for table `p2`
--
ALTER TABLE `p2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Indexes for table `s1`
--
ALTER TABLE `s1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s2`
--
ALTER TABLE `s2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `p1`
--
ALTER TABLE `p1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `p2`
--
ALTER TABLE `p2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `s1`
--
ALTER TABLE `s1`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s2`
--
ALTER TABLE `s2`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
