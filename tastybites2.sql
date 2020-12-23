-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tastybites2`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `quantity`, `img`) VALUES
(1, 'Ananasų pica', 'Kumpis, konservuoti ananasai.', 2, '216054.jpg'),
(2, 'Meksikos pica', 'Malta mėsa, svogūnai, alyvuogės, kons. paprik', 2, 'pizza-pollo-arrosto.jpg'),
(3, 'Paprastoji', 'Studentams.', 40, 'p1.jpg'),
(4, 'BBQ', 'Su bbq padažu', 5, 'p7.jpg'),
(5, 'Čili', 'Su pipirais', 5, 'p1.jpg'),
(6, 'Šefo', '-', 1, 'p7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `guests` int(11) NOT NULL,
  `RESTAURANTS_id` int(11) NOT NULL,
  `FOOD_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `guests`, `RESTAURANTS_id`, `FOOD_id`) VALUES
(4, '2020-12-10', 2, 2, 1),
(5, '2020-12-31', 3, 2, 1),
(6, '', 3, 1, 3),
(7, '2020-12-09', 2, 1, 3),
(8, '2020-12-18', 2, 1, 4),
(9, '2020-12-19', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `location` varchar(95) NOT NULL,
  `price_range` int(11) NOT NULL,
  `owner` varchar(45) NOT NULL,
  `description` varchar(225) NOT NULL,
  `img` varchar(45) NOT NULL,
  `maxCapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `price_range`, `owner`, `description`, `img`, `maxCapacity`) VALUES
(1, 'Jurgis ir drakonas', 'Pylimo g. 22', 1, '-', 'Laukiame jūsų', './img/1.jpg', 0),
(2, 'Charlie Pizza', 'Upes g. 9', 2, '-', 'Covid19 akcijos', './img/2.jpg', 0),
(3, 'Čili pica', 'Žirmūnų g. 64', 1, '5', 'Skaniausios picos', './img/1.jpg', 0),
(4, 'Brooklyn brothers', 'Lakūnų g. 2', 1, '-', 'Geriausias kainos/kokybės santykis', './img/3.jpg', 0),
(5, 'Dodo pizza', 'Latakų g. 1', 2, 'a', 'Pristatome per 45min', './img/4.jpg', 0),
(6, 'Niamu kebabai', 'location', 3, 'a', 'Turkiški kebabai ', './img/4.jpg', 0),
(8, 'Cancan ', 'Upės g. 9', 1, '-', 'Šeimyninės picos po 8.5e', './img/1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants_has_food`
--

CREATE TABLE `restaurants_has_food` (
  `RESTAURANTS_id` int(11) NOT NULL,
  `FOOD_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants_has_food`
--

INSERT INTO `restaurants_has_food` (`RESTAURANTS_id`, `FOOD_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'root', 'root', 'root', '1'),
(2, 'root@root', 'root@root', 'root', '1'),
(3, 'test', 'test@test.lt', 'test', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_reservations`
--

CREATE TABLE `users_has_reservations` (
  `USERS_id` int(11) NOT NULL,
  `RESERVATIONS_id` int(11) NOT NULL,
  `RESERVATIONS_RESTAURANTS_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_reservations`
--

INSERT INTO `users_has_reservations` (`USERS_id`, `RESERVATIONS_id`, `RESERVATIONS_RESTAURANTS_id`) VALUES
(1, 4, 2),
(1, 5, 2),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants_has_food`
--
ALTER TABLE `restaurants_has_food`
  ADD PRIMARY KEY (`RESTAURANTS_id`,`FOOD_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_has_reservations`
--
ALTER TABLE `users_has_reservations`
  ADD PRIMARY KEY (`USERS_id`,`RESERVATIONS_id`,`RESERVATIONS_RESTAURANTS_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
