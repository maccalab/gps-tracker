-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 12:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gps-tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `red` int(11) NOT NULL,
  `green` int(11) NOT NULL,
  `blue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `red`, `green`, `blue`) VALUES
(1, 16, 16, 17),
(2, 255, 16, 17),
(3, 255, 16, 17),
(4, 0, 0, 255),
(5, 0, 0, 255),
(6, 0, 0, 255),
(7, 0, 0, 255),
(8, 0, 0, 255),
(9, 0, 0, 255),
(10, 16, 16, 17),
(11, 123, 12, 17);

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE `knowledge` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `r` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knowledge`
--

INSERT INTO `knowledge` (`id`, `name`, `r`, `g`, `b`) VALUES
(1, 'Red', 29, 46, 44),
(2, 'Green', 36, 46, 46),
(3, 'Blue', 21, 17, 20),
(4, 'Black', 21, 20, 22),
(5, 'Yellow', 32, 40, 40),
(6, 'White', 17, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `id` int(11) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `jumlah_satelite` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`id`, `warna`, `jumlah_satelite`, `latitude`, `longitude`) VALUES
(1, 'UNKNOWN', 2, '-0.8360786292095773', '119.88949212973405'),
(2, 'UNKNOWN', 2, 'sad', '119.8951245692717sdsad'),
(3, 'UNKNOWN', 5, 'sdsd', 'asd'),
(4, 'UNKNOWN', 5, 'asda', '119.88238942409257asdasd'),
(5, 'UNKNOWN', 5, '321', '1'),
(6, 'UNKNOWN', 5, '321', '1'),
(7, 'UNKNOWN', 5, '321', '1'),
(8, 'UNKNOWN', 321, '321', '1'),
(9, 'UNKNOWN', 321, '321', '1'),
(10, 'UNKNOWN', 321, '123', '1'),
(11, 'UNKNOWN', 321, '123', '1'),
(12, 'UNKNOWN', 321, '123', '556'),
(13, 'BLUE', 122, '123', '556'),
(14, 'UNKNOWN', 122, '321', '556');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
