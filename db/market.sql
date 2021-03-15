-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 02:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(5) NOT NULL,
  `p_title` varchar(128) DEFAULT NULL,
  `p_details` varchar(1024) DEFAULT NULL,
  `p_price` float DEFAULT NULL,
  `p_image` varchar(256) NOT NULL,
  `p_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_title`, `p_details`, `p_price`, `p_image`, `p_time`) VALUES
(2, 'Relax chair', 'Used , but new condition', 100, 'relaxchair.jpg', '2021-03-05 23:41:53.000000'),
(3, 'Reading table', 'used, but good condition', 50, 'table.jpg', '2021-03-06 00:50:28.902000'),
(4, 'Reading table', 'used, but good condition', 50, 'table.jpg', '2021-03-06 00:55:27.780000'),
(5, 'Study table', 'used, but good condition', 150, 'studytable.jpg', '2021-03-06 00:58:22.603000'),
(16, 'Table Lamp', 'used, but very good  condition', 10, 'lamp.jpg', '2021-03-06 01:49:29.214000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `created_at`, `updated_at`) VALUES
(8, 'imran', 'imran@mail.com', '12345', 0, '2021-02-24 21:40:23', '2021-02-24 21:40:23'),
(9, 'alex', 'alex@mail.com', '12345', 0, '2021-02-24 21:43:38', '2021-02-24 21:43:38'),
(10, 'sali', 'sali@mail.com', '12345', 0, '2021-02-24 21:44:21', '2021-02-24 21:44:21'),
(11, 'fredrik', 'fredrik@mail.com', '12345', 0, '2021-02-24 21:58:16', '2021-02-24 21:58:16'),
(12, 'Yiping', 'Yiping@mail.com', '12345', 0, '2021-02-25 23:55:02', '2021-02-25 23:55:02'),
(14, 'alam', 'alam@mail.com', '12345', 1, '2021-02-26 00:00:31', '2021-02-26 00:00:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
