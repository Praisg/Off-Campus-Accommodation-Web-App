-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 11:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paypal`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions_paypal`
--

CREATE TABLE `transactions_paypal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_paypal`
--

INSERT INTO `transactions_paypal` (`id`, `user_id`, `payment_id`, `hash`, `complete`) VALUES
(47, 1, 'PAYID-MYU26YQ1CP754694B943863W', '19fd09c302b898f7c193ac64f2c5f783', 0),
(48, 1, 'PAYID-MYU3AGY6RR20754JE058022Y', 'a1f25b73dc17c978135a648841b35f48', 1),
(49, 1, 'PAYID-MYU3CWI4SS31908N1841502N', 'cd248c595ca969375e6569dfd47261f6', 0),
(50, 1, 'PAYID-MYU3DNQ4HG881457M104101U', 'c834aaedce28e99d7110f2392eb68cfb', 0),
(51, 1, 'PAYID-MYU3DNQ1X819942YY970140C', '0b7353a1cc417b791c5ce52d66026737', 0),
(52, 1, 'PAYID-MYU3G6A5KH58469A71003833', '642ceec036096937e438603e272738ff', 0),
(53, 1, 'PAYID-MYU3IAA1R391013TX9253720', '49f27a11610f9e331247cc7a460f506d', 1),
(54, 1, 'PAYID-MYU3JKY4E4932705E464554V', 'c692b5e2fcefaa2e84a74478afac7037', 1),
(55, 1, 'PAYID-MYU3LQI0K8321261L2338531', 'd6a9dbbe970074c7689f4d373dacc4e0', 1),
(56, 1, 'PAYID-MYU3NII3H287701UM476305S', '1b46e82601dd9091e65170d0514d9812', 0),
(57, 1, 'PAYID-MYU3NRA60W96483RA762132B', 'bb79b9b84ee9b57b404b17d99745334d', 0),
(58, 1, 'PAYID-MYU3OOI4CS38593644724435', 'd7dd61530bf1127bd05a1baa8d7e676c', 1),
(59, 1, 'PAYID-MYU3S2Q58V12491HJ950542L', '3a1d0e5bffbb313a3e35ba46ae6f824b', 1),
(60, 1, 'PAYID-MYVAQCQ3V962024PR3887251', '29acb786e601f5b96fe64d0775ea9f43', 1),
(61, 1, 'PAYID-MYVATFY8HA04805PN312092U', '9de43a33c32dd00fa435d03eb0a6f054', 1),
(62, 1, 'PAYID-MYVBFRQ2J171939AM741960M', 'd65f192fc0fb95262a7fbcd7f91eae90', 1),
(63, 1, 'PAYID-MYVCCGI7DU59875W0281162C', '0c032d999aef293befb1a189f70f0d37', 1),
(64, 1, 'PAYID-MYVCJOY57C06559N6188584E', '8e1b48e438658eaeacc00918ec4903b7', 1),
(65, 1, 'PAYID-MYVCL7Q1GK29364WY426082D', 'd2a2149183f447a55c9addcea85f6209', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `has_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `has_paid`) VALUES
(1, 'shola', 'mangoshauns@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions_paypal`
--
ALTER TABLE `transactions_paypal`
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
-- AUTO_INCREMENT for table `transactions_paypal`
--
ALTER TABLE `transactions_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
