-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowandarrowfilms`
--
CREATE DATABASE IF NOT EXISTS `bowandarrowfilms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bowandarrowfilms`;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contractId` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `brideName` varchar(100) NOT NULL,
  `groomName` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `weddingDate` date NOT NULL,
  `bridePrepLoc` varchar(100) NOT NULL,
  `groomPrepLoc` varchar(100) NOT NULL,
  `ceremonyLocation` varchar(100) NOT NULL,
  `receptionLocation` varchar(100) NOT NULL,
  `prenupDate` date DEFAULT NULL,
  `prenupLocation` varchar(100) NOT NULL,
  `totalAmount` double NOT NULL,
  `downPayment` double NOT NULL,
  `remainingBalance` double NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contracts_packages`
--

CREATE TABLE `contracts_packages` (
  `packageId` int(11) NOT NULL,
  `platinum` enum('yes','no') NOT NULL,
  `diamond` enum('yes','no') NOT NULL,
  `preweddingFilm` enum('yes','no') NOT NULL,
  `samedayedit` enum('yes','no') NOT NULL,
  `optionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `createdate`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '2019-04-12 11:26:14'),
(4, 'cookie', 'cookie@gmail.com', 'coox', '2019-04-13 04:31:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contractId`),
  ADD UNIQUE KEY `packageId` (`packageId`),
  ADD KEY `package_index` (`packageId`);

--
-- Indexes for table `contracts_packages`
--
ALTER TABLE `contracts_packages`
  ADD PRIMARY KEY (`packageId`),
  ADD KEY `option_index` (`optionId`);

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
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contractId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts_packages`
--
ALTER TABLE `contracts_packages`
  MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
