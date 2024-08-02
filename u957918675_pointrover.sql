-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2023 at 01:23 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u957918675_pointrover`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_maping`
--

CREATE TABLE `address_maping` (
  `mid` int(11) NOT NULL,
  `driver_trips_id` int(11) NOT NULL,
  `departure_city` varchar(200) NOT NULL,
  `departure_postal` varchar(80) DEFAULT NULL,
  `departure_province` varchar(80) DEFAULT NULL,
  `dropping_city` varchar(200) NOT NULL,
  `dropping_postal` varchar(80) DEFAULT NULL,
  `dropping_province` varchar(80) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `estimate_time` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_maping`
--

INSERT INTO `address_maping` (`mid`, `driver_trips_id`, `departure_city`, `departure_postal`, `departure_province`, `dropping_city`, `dropping_postal`, `dropping_province`, `distance`, `estimate_time`) VALUES
(189, 215, 'Brantford', '', 'ON', 'Tiverton', 'N0G 2T0', 'ON', '196 km', '2 hours 34 mins'),
(187, 213, 'Kitchener', '', 'ON', 'Listowel', '', 'ON', '55.3 km', '47 mins'),
(188, 214, 'Brantford', '', 'ON', 'Waterloo', '', 'ON', '55.0 km', '55 mins'),
(185, 211, 'Brantford', '', 'ON', 'Kitchener', '', 'ON', '52.2 km', '55 mins'),
(186, 212, 'Brantford', '', 'ON', 'Listowel', '', 'ON', '106 km', '1 hour 29 mins'),
(184, 210, 'Brantford', 'N3R 3Y7', 'ON', 'Brantford', 'N3V 1G3', 'ON', '6.3 km', '10 mins'),
(183, 209, 'Brantford', 'N3V 1G3', 'ON', 'Brantford', 'N3R 3Y7', 'ON', '6.3 km', '10 mins'),
(182, 208, 'Brantford', 'N3V 1G3', 'ON', 'Brantford', 'N3R 3Y7', 'ON', '6.3 km', '10 mins'),
(181, 207, 'Brampton', '', 'ON', 'Brantford', '', 'ON', '104 km', '1 hour 5 mins'),
(180, 206, 'Brantford', 'N3T 5L5', 'ON', 'Mississauga', 'L5P', 'ON', '105 km', '1 hour 8 mins'),
(179, 205, '', '', '', 'Brantford', 'N3R 3Y7', 'ON', '-', '-'),
(178, 204, 'Kitchener', '', 'ON', 'Oshawa', '', 'ON', '152 km', '1 hour 39 mins'),
(177, 203, 'Hamilton', 'L0R 1W0', 'ON', 'Brantford', 'N3T 5L5', 'ON', '34.0 km', '35 mins'),
(176, 202, 'Brantford', 'N3T 5L5', 'ON', 'Hamilton', 'L0R 1W0', 'ON', '34.0 km', '35 mins'),
(175, 201, 'Brantford', '', 'ON', 'Tiverton', 'N0G 2T0', 'ON', '196 km', '2 hours 34 mins'),
(174, 200, 'Brantford', '', 'ON', 'Toronto', '', 'ON', '105 km', '1 hour 17 mins'),
(173, 199, 'Brantford', '', 'ON', 'Toronto', '', 'ON', '105 km', '1 hour 17 mins'),
(172, 198, 'Brampton', 'L6P 0V2', 'ON', 'Toronto', 'M5K 1A2', 'ON', '48.1 km', '41 mins'),
(171, 197, 'Toronto', 'M5J 2Z3', 'ON', 'Toronto', 'M5J 0A9', 'ON', '0.4 km', '2 mins'),
(170, 196, 'Toronto', 'M5V 2V4', 'ON', 'Toronto', 'M5B 0C3', 'ON', '4.8 km', '17 mins'),
(169, 195, 'Toronto', 'M9W 3W8', 'ON', 'Toronto', 'M9W 3W8', 'ON', '1 m', '1 min'),
(167, 193, 'Oakville', 'L6L 0B6', 'ON', 'Toronto', 'M5B 0C3', 'ON', '47.6 km', '42 mins'),
(168, 194, 'Toronto', 'M9W 3W8', 'ON', 'Toronto', 'M5B 0C3', 'ON', '29.0 km', '28 mins'),
(164, 190, 'Vancouver', 'V5Y 1M8', 'BC', 'Toronto', 'M9W 3W8', 'ON', '4,354 km', '1 day 15 hours'),
(165, 191, 'Vancouver', 'V5Y 1M8', 'BC', 'Oakville', 'L6H 7G9', 'ON', '4,338 km', '1 day 15 hours'),
(166, 192, 'Oakville', 'L6L 0B6', 'ON', 'Burnaby', 'V3J 0A4', 'BC', '4,305 km', '1 day 15 hours'),
(163, 189, 'Vancouver', 'V5Y 1M8', 'BC', 'Oakville', 'L6L 0B6', 'ON', '4,323 km', '1 day 15 hours'),
(161, 187, 'Mississauga', 'L4T 0A5', 'ON', 'Toronto', 'M5B 0C3', 'ON', '32.5 km', '38 mins'),
(162, 188, 'Toronto', 'M5V 0E9', 'ON', 'Brampton', 'L7A 2L6', 'ON', '50.6 km', '46 mins'),
(160, 186, 'Toronto', 'M9W 3W8', 'ON', 'Mississauga', 'L4T 0A5', 'ON', '12.2 km', '15 mins');

-- --------------------------------------------------------

--
-- Table structure for table `driver_trips`
--

CREATE TABLE `driver_trips` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `alfa_code` varchar(15) NOT NULL,
  `type` int(5) NOT NULL COMMENT '1:driver|2:passenger',
  `departure` varchar(255) NOT NULL,
  `drop_location` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `gender` int(11) DEFAULT 3 COMMENT '1:Male|2:female|3:all',
  `available_seats` int(11) NOT NULL,
  `fare` decimal(10,2) DEFAULT NULL,
  `note` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_trips`
--

INSERT INTO `driver_trips` (`id`, `uid`, `alfa_code`, `type`, `departure`, `drop_location`, `date`, `time`, `gender`, `available_seats`, `fare`, `note`, `time_stamp`) VALUES
(195, 39, 'DRsacGrIO6', 1, '2260 Islington Avenue, Etobicoke, ON, Canada', '2260 Islington Avenue, Etobicoke, ON, Canada', '2023-10-28', '12:00:00', 3, 2, 8.00, '', '2023-10-28 05:22:58'),
(194, 39, 'DRjmNKu8ad', 1, '2260 Islington Avenue, Etobicoke, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '02:00:00', 3, 2, 7.25, '', '2023-10-28 05:22:20'),
(193, 39, 'DRguQEpxiw', 1, '3465 Wyecroft Road, Oakville, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-31', '10:35:00', 3, 2, 11.90, '', '2023-10-28 05:21:59'),
(192, 39, 'DRm7QgeqJX', 1, '3465 Wyecroft Road, Oakville, ON, Canada', '3433 North Road, Burnaby, BC, Canada', '2023-10-28', '12:00:00', 3, 3, 35.00, '', '2023-10-28 05:21:29'),
(191, 39, 'CUGj77YvdE', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '5 Drive-In, Ninth Line, Oakville, ON, Canada', '2023-10-28', '12:00:00', 0, 3, 0.00, '', '2023-10-28 05:20:33'),
(186, 39, 'CU0xXvdxoC', 2, '2260 Islington Avenue, Etobicoke, ON, Canada', '2960 Drew Road, Mississauga, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '', '2023-10-28 05:13:51'),
(187, 39, 'DRJK8Vkth7', 1, '2960 Drew Road, Mississauga, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '12:00:00', 3, 2, 8.13, '', '2023-10-28 05:15:32'),
(188, 39, 'CU3YoquPdk', 2, '300 Front Street West, Toronto, ON, Canada', '28 Ridgemore Crescent, Brampton, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '', '2023-10-28 05:18:06'),
(189, 39, 'CUoKF5XaCk', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '3465 Wyecroft Road, Oakville, ON, Canada', '2023-10-28', '12:00:00', 0, 3, 0.00, '', '2023-10-28 05:19:06'),
(190, 39, 'CU6imjumQO', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '2260 Islington Avenue, Etobicoke, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '2', '2023-10-28 05:20:02'),
(196, 39, 'DRDC12tYMY', 1, '1 Hotel Toronto, Wellington Street West, Toronto, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '02:00:00', 3, 2, 8.00, '', '2023-10-28 05:23:23'),
(197, 40, 'CUSZ6DNyFg', 2, '33 Bay Street, Toronto, ON, Canada', '12 York Street, Toronto, ON, Canada', '2023-10-28', '03:20:00', 0, 3, 0.00, 'I have 2 bags', '2023-10-29 00:18:53'),
(198, 41, 'DRt2WiS7rQ', 1, '34 John Carroll Drive, Brampton, ON, Canada', '66 Wellington Street West, Toronto, ON, Canada', '2023-10-29', '10:00:00', 3, 4, 15.00, 'No smoking, pets', '2023-10-29 00:34:48'),
(199, 42, 'DRkwIDrFrO', 1, 'Brantford, ON, Canada', 'Toronto, ON, Canada', '2023-10-29', '03:00:00', 3, 3, 26.25, 'Text me!', '2023-10-29 16:53:09'),
(200, 42, 'DR1sgezep4', 1, 'Brantford, ON, Canada', 'Toronto, ON, Canada', '2023-10-29', '03:00:00', 3, 3, 26.25, 'Text me!', '2023-10-29 16:53:09'),
(201, 43, 'DRLtgXmOUw', 1, 'Brantford, ON, Canada', 'Tiverton, ON, Canada', '2023-11-01', '05:00:00', 1, 7, 49.00, 'Via Cambridge, Kitchener, Waterloo, Elmira, Listowel', '2023-10-29 17:26:58'),
(202, 44, 'DR2w3QLZwM', 1, 'West Brant, Brantford, ON, Canada', 'Hamilton Airport, Airport Road, Mount Hope, ON, Canada', '2023-10-30', '06:45:00', 3, 3, 13.00, 'Via Ancaster Business park\nFortinos\nAncaster downtown', '2023-10-29 17:31:40'),
(203, 44, 'DRExlZX49m', 1, 'Hamilton Airport, Airport Road, Mount Hope, ON, Canada', 'West Brant, Brantford, ON, Canada', '2023-10-30', '04:30:00', 3, 3, 8.50, 'Via Ancaster\nBrantford downtown', '2023-10-29 17:34:53'),
(204, 45, 'DRbLsMLklz', 1, 'Kitchener, ON, Canada', 'Oshawa, ON, Canada', '2023-10-29', '04:00:00', 3, 3, 38.00, '', '2023-10-29 18:14:59'),
(205, 46, 'CUoad1aPBh', 2, 'Clearence labour center', '109 Sydenham Street, Brantford, ON, Canada', '2023-10-30', '04:30:00', 0, 2, 0.00, '', '2023-10-30 20:29:14'),
(206, 47, 'CULJkhLgZW', 2, '32 Carroll Lane, Brantford, ON, Canada', 'Pearson Airport Terminal 1 Parking, Mississauga, ON, Canada', '2023-11-02', '03:00:00', 0, 2, 0.00, 'Return as well if you can', '2023-10-30 20:31:47'),
(207, 48, 'DRAqtLdIFj', 1, 'Brampton, ON, Canada', 'Brantford, ON, Canada', '2023-11-03', '07:00:00', 3, 4, 26.00, '', '2023-10-30 22:51:07'),
(208, 46, 'CUlCKPWna1', 2, 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '109 Sydenham Street, Brantford, ON, Canada', 'Abdulmalik Ali Khail', '07:15:00', 0, 2, 0.00, '', '2023-11-01 17:22:44'),
(209, 46, 'CUiRt5uxtM', 2, 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '109 Sydenham Street, Brantford, ON, Canada', 'Abdulmalik Ali Khail', '07:15:00', 0, 2, 0.00, '', '2023-11-01 17:22:46'),
(210, 46, 'CUfcqPaJgD', 2, '109 Sydenham Street, Brantford, ON, Canada', 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '2023-11-02', '06:00:00', 0, 3, 0.00, '', '2023-11-01 23:51:18'),
(211, 43, 'DR2c2fiokb', 1, 'Brantford, ON, Canada', 'Kitchener, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 15.00, '', '2023-11-03 13:12:49'),
(212, 43, 'DRufoXeFBk', 1, 'Brantford, ON, Canada', 'Listowel, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 26.50, '', '2023-11-03 13:19:31'),
(213, 43, 'DRtty46kfS', 1, 'Kitchener, ON, Canada', 'Listowel, ON, Canada', '2023-11-08', '06:00:00', 3, 7, 15.00, '', '2023-11-03 13:20:17'),
(214, 43, 'DRWRtxh0W9', 1, 'Brantford, ON, Canada', 'Waterloo, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 15.00, '', '2023-11-03 13:24:53'),
(215, 43, 'DRyRRZaeeP', 1, 'Brantford, ON, Canada', 'Tiverton, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 49.00, '', '2023-11-03 13:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `uid` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'D:1|P:2',
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email_verify` int(11) NOT NULL DEFAULT 0,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`uid`, `type`, `name`, `email`, `phone`, `email_verify`, `time_stamp`) VALUES
(39, 2, 'Navjot singh', 'ns949405@gmail.com', '5555555555', 1, '2023-10-28 05:52:48'),
(40, 2, 'Navjot singh', 'web.dev.nav@gmail.com', '6478974258', 1, '2023-10-29 00:19:15'),
(41, 1, 'Rohit singh', 'urlshotner000@gmail.com', '6476745876', 1, '2023-10-29 00:35:09'),
(42, 1, 'Devanshu Yadav', 'devanshug18@gmail.com', '5483330337', 0, '2023-10-29 16:53:09'),
(43, 1, 'Manish Thakurwani', 'mthakurwani@gmail.com', '6477107686', 1, '2023-10-29 17:27:16'),
(44, 1, 'Kaps', 'kaps.poparide@gmail.com', '2896324230', 1, '2023-10-29 17:31:56'),
(45, 1, 'Mital', 'mitalpkw@gmail.com', '5196164825', 1, '2023-10-29 18:42:22'),
(46, 2, 'Abdulmalik Ali Khail', 'abdulmalik885522@gmail.com', '2269343568', 0, '2023-10-30 20:29:14'),
(47, 2, 'kamel', 'aayatanu20@gmail.com', '9041240383', 1, '2023-10-30 20:32:08'),
(48, 1, 'Fahad', 'fahad24385@gmail.com', '6475002548', 1, '2023-10-30 22:51:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_maping`
--
ALTER TABLE `address_maping`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `driver_trips`
--
ALTER TABLE `driver_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_maping`
--
ALTER TABLE `address_maping`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `driver_trips`
--
ALTER TABLE `driver_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
