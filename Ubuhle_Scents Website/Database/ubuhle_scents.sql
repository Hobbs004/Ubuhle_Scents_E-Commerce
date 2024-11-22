-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 08:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ubuhle_scents`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Elegant Blossom', '499.99', 'A floral fragrance with hints of jasmine and rose.', 'Male.jpg'),
(2, 'Mystic Oud', '699.99', 'An exotic blend of oud and sandalwood.', 'women.jpg'),
(3, 'Fresh Citrus', '399.99', 'A refreshing scent with citrus notes.', 'unisex.jpg'),
(4, 'Warm Vanilla', '549.99', 'A warm fragrance with vanilla and caramel.', 'www.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'NTSAKO MABASA', 'ntsako@gmail.com', '$2y$10$SI2XHbiCLQRxSPiNkUQmD.Pc9RQ7608MKnK4Dktf4j/eDhYUheVoC', '2024-11-13 12:24:02'),
(2, 'Nhletelo Nobyane', 'nhletelonobyane@gmail.com', '$2y$10$L69JA05oUeecA9f4MSzt3uOg7nlSvfr7f5/Yp0skumkbupW4cQnlm', '2024-11-19 14:55:32'),
(3, 'rgdfvcx', 'dcthfggb@gmail.com', '$2y$10$kQT0BZN/iwy/1l/4VeQMtO9TIfkzcFam0R5I8uApbsfRr8ekxFuvS', '2024-11-19 15:31:12'),
(4, 'Ubuhle_Scents', 'ubuhlescents@gmail.com', '$2y$10$2Zzr2BtupXjseHwKQ27VlOMlAqhI/Cbl00npQejhTv.lcUEASd./y', '2024-11-19 16:23:17'),
(5, 'Vutela', 'vutela@gmail.com', '$2y$10$VVxBxTQmZ4C1eaWyd64StOaO/s84mnGh8zLC4bwKJdbGcRHKlzksa', '2024-11-19 18:35:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
