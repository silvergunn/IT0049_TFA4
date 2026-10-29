-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2026 at 03:13 PM
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
-- Database: `pos_tfa4`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-10-29-134246', 'App\\Database\\Migrations\\AddPasswordToUsers', 'default', 'App', 1793281428, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`, `avatar`) VALUES
(1, 'admin01', '$2y$10$WPh1uKFFAC43Qp7jQBEiXe25ZF8hxjEcnw1aQ0UcE9VChGAL7ivue', 'Enzo Gonzales', 'Administrator', '2026-09-17 21:41:32', NULL),
(2, 'cashier01', '$2y$10$yhzxBdcFH68R95gSu5r9Qe/sxNcWaj3VPabo/ZE3iMPeyjx4JIT.S', 'Jennie Kim', 'Cashier', '2026-09-17 21:41:32', NULL),
(3, 'cashier02', '$2y$10$fOsXrPuKc8bxXUYtrEcs/uaNMhdAQ3WtvRrX2QxO2QCZAVjV6Yrh.', 'Lisa Manoban', 'Cashier', '2026-09-17 21:41:32', NULL),
(4, 'manager01', '$2y$10$ad4MZUt/yaXDj2n5kOmF9eMRAktKQTGz.631sWPGTtX6MqNsHs4QW', 'Rose Batumbakal', 'Manager', '2026-09-17 21:41:32', NULL),
(5, 'staff01', '$2y$10$lAjNSBHv5ugB.2X3HAiRp.zpB37DM5x5on6/EmeRSSivG5U9Gdt6y', 'Jisoo Kim', 'Staff', '2026-09-17 21:41:32', '1791639647_e2648bf72e645fba2c46.jpg'),
(6, 'nthn.mgl', '$2y$10$YVHW5AsX3yYZjm8p5mkGBeYCbm8W1jAh4tJpDHI6zXxwDDV6xblpm', 'Nathan Gonzales', 'Manager', '0000-00-00 00:00:00', '1791639393_3bf26fbeb96f7c0c33c2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
