-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 03:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv_trandinhhungthinh`
--
CREATE DATABASE IF NOT EXISTS `qlsv_trandinhhungthinh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `qlsv_trandinhhungthinh`;

-- --------------------------------------------------------

--
-- Table structure for table `table_students`
--

CREATE TABLE `table_students` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(2) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `level_id` int(4) NOT NULL,
  `group_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students`
--

INSERT INTO `table_students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level_id`, `group_id`) VALUES
(2, 'Trần Đình Hoàng', '2000-02-22', 1, 'Nam đàn', 0, 3),
(3, 'Trần Đình Hưng Thịnh', '2005-01-22', 1, 'Kim Liên', 2, 5),
(4, 'Nguyễn Nam Khánh', '2005-06-25', 1, 'Hà Nội', 0, 5),
(5, 'Dương Gió Tai', '2005-09-15', 0, 'Hà Nội', 3, 5),
(6, 'Trần Minh Long', '2005-01-19', 1, 'hà nam', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
