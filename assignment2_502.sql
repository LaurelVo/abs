-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 14, 2021 at 12:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `assignment2_502`
--
CREATE DATABASE IF NOT EXISTS `assignment2_502` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `assignment2_502`;

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int(11) NOT NULL,
  `type` varchar(232) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `max_guests` int(11) NOT NULL,
  `total_rooms` int(11) NOT NULL,
  `total_bathrooms` int(11) NOT NULL,
  `address` varchar(232) NOT NULL,
  `published_at` varchar(232) NOT NULL,
  `price_per_night` decimal(40,0) NOT NULL,
  `created_at` varchar(232) NOT NULL,
  `updated_at` varchar(232) DEFAULT NULL,
  `house_name` varchar(232) NOT NULL,
  `city` varchar(232) NOT NULL,
  `has_garage` tinyint(1) NOT NULL,
  `has_internet` tinyint(1) NOT NULL,
  `allow_pet` tinyint(1) NOT NULL,
  `allow_smoke` tinyint(1) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `available_from` varchar(232) NOT NULL,
  `available_to` varchar(232) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `type`, `description`, `max_guests`, `total_rooms`, `total_bathrooms`, `address`, `published_at`, `price_per_night`, `created_at`, `updated_at`, `house_name`, `city`, `has_garage`, `has_internet`, `allow_pet`, `allow_smoke`, `owner_id`, `image_url`, `available_from`, `available_to`) VALUES
(1, 'House', 'Loft Studio in the Central Area', 3, 2, 1, '1/5 West Hobart', '2021-05-12', '150', '2021-05-11', NULL, 'Loft Studio in the Central Area', 'Hobart', 0, 1, 1, 0, 3, 'https://a2.muscache.com/im/pictures/6152848/b04eddeb_original.jpg?aki_policy=x_medium', '2021-05-13', '2021-05-23'),
(2, 'Resort', 'Sky View', 40, 20, 1, '2 Collins St', '2021-05-12', '1399', '2021-05-11', '', 'Sky View', 'Melbourne', 0, 1, 0, 0, 3, 'https://a2.muscache.com/im/pictures/34792065/bae84a3f_original.jpg?aki_policy=x_medium', '2021-05-13', '2021-05-15'),
(3, 'Villa', '180° View, private pool villa', 10, 5, 3, 'Villa land, Launnie', '2021-05-13', '500', '', NULL, '180° View, private pool villa', 'Launceston', 1, 1, 1, 1, 4, 'https://a2.muscache.com/im/pictures/1faf9a4c-f839-44da-bd37-65ddc928379e.jpg?aki_policy=x_medium', '2021-05-20', '2021-05-25'),
(4, 'Apartments', 'Newmarket - Young & Fennelly', 5, 3, 2, '30 Young Street,\r\n\r\nRandwick, NSW 2031', '2021-05-17', '530', '2021-05-17', NULL, 'Newmarket - Young & Fennelly', 'Randwick', 1, 1, 1, 1, 4, 'https://strap.domain.com.au/dream-homes-nsw/DreamHomes4903.jpg', '2021-05-17', '2021-05-20'),
(5, 'House', 'Orme House', 8, 4, 3, '25 Orme Road, Buderim QLD 4556', '2021-05-10', '700', '2021-05-10', NULL, 'Orme House', 'Buderim', 1, 1, 1, 1, 4, 'https://rimh2.domainstatic.com.au/UVR5_h2WLqvaQW6iyO72uBvQrJ4=/fit-in/1920x1080/filters:format(jpeg):quality(80):no_upscale()/http://b.domainstatic.com.au.s3-website-ap-southeast-2.amazonaws.com/2016987480_1_1_210506_051200-w5033-h3353', '2021-05-25', '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(40,0) NOT NULL,
  `start_date` varchar(232) NOT NULL,
  `end_date` varchar(232) NOT NULL,
  `created_at` varchar(232) NOT NULL,
  `no_guests` int(11) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `rejected_reason` varchar(232) DEFAULT NULL,
  `checkout_date` varchar(232) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `price`, `start_date`, `end_date`, `created_at`, `no_guests`, `is_accepted`, `rejected_reason`, `checkout_date`) VALUES
(2, 1, '500', '2021-05-14', '2021-05-14', '2021-05-14', 1, 0, '', ''),
(3, 1, '150', '2021-05-14', '2021-05-17', '2021-05-14', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` varchar(232) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `rating` decimal(40,0) DEFAULT NULL,
  `comment` varchar(232) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(232) NOT NULL,
  `last_name` varchar(232) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(232) NOT NULL,
  `password` varchar(232) NOT NULL,
  `access_level` int(11) NOT NULL,
  `postal_address` varchar(232) NOT NULL,
  `ABN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
