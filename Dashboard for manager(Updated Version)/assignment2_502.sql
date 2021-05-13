-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2021 at 10:42 AM
-- Server version: 8.0.24
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2_502`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int NOT NULL,
  `type` varchar(232) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `max_guests` int NOT NULL,
  `total_rooms` int NOT NULL,
  `total_bathrooms` int NOT NULL,
  `address` varchar(232) NOT NULL,
  `published_at` datetime(6) NOT NULL,
  `price_per_night` decimal(40,0) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `house_name` varchar(232) NOT NULL,
  `city` varchar(232) NOT NULL,
  `has_garage` tinyint(1) NOT NULL,
  `has_internet` tinyint(1) NOT NULL,
  `allow_pet` tinyint(1) NOT NULL,
  `allow_smoke` tinyint(1) NOT NULL,
  `owner_id` int NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `available_from` datetime(6) NOT NULL,
  `available_to` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `price` decimal(40,0) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `no_guests` int NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `rejected_reason` varchar(232) DEFAULT NULL,
  `checkout_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `booking_id` int NOT NULL,
  `rating` decimal(40,0) DEFAULT NULL,
  `comment` varchar(232) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(232) NOT NULL,
  `last_name` varchar(232) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(232) NOT NULL,
  `password` varchar(232) NOT NULL,
  `access_level` int NOT NULL,
  `postal_address` varchar(232) NOT NULL,
  `ABN` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `access_level`, `postal_address`, `ABN`) VALUES
(1, 'Barney', 'Customer', '0477112222', 'barney@gmail.com', '123abc123', 1, 'Hobart Tas', NULL),
(2, 'Laurel', 'Customer', '0477111111', 'laurel@gmail.com', '123abc123', 1, 'Hobart Tas', NULL),
(3, 'Leo', 'Host', '04771122333', 'leo@gmail.com', '123abc123', 2, 'Hobart Tas', 23453254),
(4, 'Ed', 'Host', '04771119809', 'ed@gmail.com', '123abc123', 2, 'Hobart Tas', 237834),
(5, 'manager', 'admin', '04771119803', 'manager@gmail.com', '123abc123', 3, 'Hobart Tas', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
