-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 06:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_manager`
--
CREATE DATABASE IF NOT EXISTS `system_manager` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `system_manager`;

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `booking_id` int(11) NOT NULL,
  `stay_period` varchar(256) NOT NULL,
  `payment` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`booking_id`, `stay_period`, `payment`, `contact`) VALUES
(1, '5/May/2021 to 7/May/2021', 'Credit Card/Confirmed', 'Mr John Smith\r\nPhone:+61 409587123'),
(2, '6/May/2021 to 12/May/2021', 'Cash/Not Yet Confirmed', 'Mrs Anna Scoot\r\nEmail:anna432@gmail.com'),
(3, '10/May/2021 to 14/May/2021', 'Bank Transfer/Not Yet Confirmed', 'Mr Adam Sheran\r\nPhone:+86 15803657841');

-- --------------------------------------------------------

--
-- Table structure for table `house_list`
--

CREATE TABLE `house_list` (
  `house_id` int(11) NOT NULL,
  `owner` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_list`
--

INSERT INTO `house_list` (`house_id`, `owner`, `location`, `status`) VALUES
(1, 'Mr Mike Lee', 'Sydney', 'Free for Booking'),
(2, 'Ms Maggie Cowen', 'Hobart', 'Occupied'),
(3, 'Mrs Nina Nelson', 'Gold Coast', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `review_list`
--

CREATE TABLE `review_list` (
  `review_id` int(11) NOT NULL,
  `reviewer` varchar(256) NOT NULL,
  `review` varchar(256) NOT NULL,
  `rating` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_list`
--

INSERT INTO `review_list` (`review_id`, `reviewer`, `review`, `rating`) VALUES
(1, 'Dolly Charles', 'On 2/May/2021,\r\nThe rooms were clean, very comfortable, and the staff was amazing. They went over and beyond to help make our stay enjoyable', '5/5'),
(2, 'Ellice Plummer', 'On 3/May/2021,\r\nThe condition of the rooms were very bad. Bed sheets, linens were dirty. Horrible experience', '2/5'),
(3, 'Harlee Mcmanus', 'On 4/May/2021,\r\nThe staff at this property are all great! However, some improvement still needed.', '4/5');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `access` varchar(256) NOT NULL,
  `info` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`user_id`, `name`, `access`, `info`) VALUES
(1, 'Mr Samuel Wong', 'General Manager\r\nAccess level:3 (Unlimited)', 'Phone: +61 411589666\r\nEmail: bigwong@gmail.com'),
(2, 'Mrs Maggie Cowen', 'Host\r\nAccess Level: 2 (Dashboard for Host)', 'Phone: +61 406058932\r\nEmail: maggie91@gmail.com'),
(3, 'Mr James Horgen', 'Customer\r\nAccess Level: 1(General Pages)', 'Phone: +61 489236712\r\nEmail: JH1983@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `house_list`
--
ALTER TABLE `house_list`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `review_list`
--
ALTER TABLE `review_list`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house_list`
--
ALTER TABLE `house_list`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_list`
--
ALTER TABLE `review_list`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
