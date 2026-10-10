-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2026 at 04:04 PM
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
-- Database: `pos_tfa3`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Kyle Paglas', 'KAPaglas@fit.com', '0919991010', '2026-09-17 21:41:32'),
(2, 'Drazen Paglas', 'DOPaglas@fit.com', '09676767667', '2026-09-17 21:41:32'),
(3, 'Miles Paglas', 'MTPaglas@fit.com', '0919232323', '2026-09-17 21:41:32'),
(4, 'Prince Ahmed', 'PCAhmed@fit.com', '09232132100', '2026-09-17 21:41:32'),
(5, 'Paul Pingol', 'PSpingol@fit.com', '0921212121121', '2026-09-17 21:41:32'),
(6, 'Updated Customer', 'test.customer@example.com', '09123456789', '2026-10-10 11:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `role`, `created_at`, `avatar`) VALUES
(1, 'admin01', 'Enzo Gonzales', 'Administrator', '2026-09-17 21:41:32', NULL),
(2, 'cashier01', 'Jennie Kim', 'Cashier', '2026-09-17 21:41:32', NULL),
(3, 'cashier02', 'Lisa Manoban', 'Cashier', '2026-09-17 21:41:32', NULL),
(4, 'manager01', 'Rose Batumbakal', 'Manager', '2026-09-17 21:41:32', NULL),
(5, 'staff01', 'Jisoo Kim', 'Staff', '2026-09-17 21:41:32', '1791639647_e2648bf72e645fba2c46.jpg'),
(6, 'nthn.mgl', 'Nathan Gonzales', 'Manager', '0000-00-00 00:00:00', '1791639393_3bf26fbeb96f7c0c33c2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
