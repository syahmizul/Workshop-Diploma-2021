-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 03:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending Approval',
  `roomtype` varchar(255) NOT NULL,
  `check_in_date` datetime NOT NULL,
  `check_out_date` datetime NOT NULL,
  `quantity` int(255) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `status`, `roomtype`, `check_in_date`, `check_out_date`, `quantity`, `total`) VALUES
(1, 1, 'Pending Approval', 'standard', '2021-06-21 00:00:00', '2021-06-24 00:00:00', 301, 180);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nameoncard` varchar(255) NOT NULL,
  `cc_number` varchar(255) NOT NULL,
  `exp_month` varchar(255) NOT NULL,
  `exp_year` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `fullname`, `email`, `nameoncard`, `cc_number`, `exp_month`, `exp_year`, `cvv`, `address`, `city`, `state`, `zip`, `total`) VALUES
(1, 1, 'Syahmi Zul', 'syahmizul@syahmi.com', 'Muhammad Syahmi Bin Zulkalnain', '1111-2222-3333-4444', 'September', '2018', '352', '', 'New York', 'NY', '10001', 180);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roomtype` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `price` int(11) NOT NULL,
  `slots` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `roomtype`, `image_url`, `features`, `price`, `slots`) VALUES
(1, 'Standard Room', 'standard', 'assets/img/room1.jpg', '{\r\n  \"0\": \"Air conditioned.\",\r\n  \"1\": \"Well equipped with ASTRO and high speed internet connection.,\",\r\n  \"2\": \"Free breakfast.\",\r\n  \"3\": \"Queen bed.\",\r\n  \"4\": \"Private pool.\",\r\n  \"5\": \"Sea view.\"\r\n}', 180, 300),
(2, 'Standard+ Room', 'standardplus', 'assets/img/room2.jpg', '{\r\n  \"0\": \"Air conditioned + Heater.\",\r\n  \"1\": \"Well equipped with ASTRO , Netflix and high speed internet connection.\",\r\n  \"2\": \"Free breakfast + Delivery to Room.\",\r\n  \"3\": \"Queen bed + King Bed.\",\r\n  \"4\": \"Private pool + Balcony.\",\r\n  \"5\": \"Ocean view + Sky View.\"\r\n}', 180, 255),
(3, 'Super Room', 'super', 'assets/img/room3.jpg', '{\r\n  \"0\": \"Air conditioned + Heater.\",\r\n  \"1\": \"Well equipped with ASTRO , Netflix and high speed internet connection.\",\r\n  \"2\": \"Free breakfast + Delivery to Room.\",\r\n  \"3\": \"Queen bed + King Bed.\",\r\n  \"4\": \"Private pool + Balcony.\",\r\n  \"5\": \"Ocean view + Sky View.\"\r\n}', 180, 255),
(4, 'Superior Room', 'superior', 'assets/img/room4.jpg', '{\r\n  \"0\": \"Air conditioned + Heater + Fan .\",\r\n  \"1\": \"Well equipped with ASTRO , Netflix and high speed internet connection.\",\r\n  \"2\": \"Free breakfast + Lunch + Dinner + Delivery to Room.\",\r\n  \"3\": \"Queen bed + King Bed .\",\r\n  \"4\": \"Private pool + Balcony.\",\r\n  \"5\": \"Ocean view + Sky View + 360 view.\"\r\n}', 250, 255);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `firstname`, `lastname`, `username`, `password`, `address`) VALUES
(1, 1, 'Admin', 'User', 'admin', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
