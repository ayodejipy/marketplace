-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2019 at 12:52 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch.marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `passkey` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `mem_address` varchar(225) NOT NULL,
  `mem_city` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mem_state` varchar(225) NOT NULL,
  `mem_country` varchar(225) NOT NULL,
  `mem_picture` varchar(225) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_cat` varchar(255) NOT NULL,
  `business_exp` varchar(255) NOT NULL,
  `business_mail` varchar(255) NOT NULL,
  `business_phone` varchar(100) NOT NULL,
  `business_city` varchar(255) NOT NULL,
  `business_state` varchar(255) NOT NULL,
  `business_addr` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `u_role` varchar(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `passkey`, `username`, `firstname`, `lastname`, `mem_address`, `mem_city`, `phone`, `gender`, `mem_state`, `mem_country`, `mem_picture`, `business_name`, `business_cat`, `business_exp`, `business_mail`, `business_phone`, `business_city`, `business_state`, `business_addr`, `status`, `u_role`, `created_at`) VALUES
(1, 'badmus@gmail.com', '$2y$10$5eELXKfxnO6XZWvWyvJEFuh./j28mZqMSVwsoLRFbNDAbluORjs5y', 'badmus01', 'Madehinlo', 'Tobiloba', '', '', '08154677201', '', '', '', '', '', '', '', '', '', '', '', '', '', 'client', '2019-08-25 00:23:40.097177'),
(2, '', '$2y$10$A6h5ZuJv3soKVK7s7SSb9erz7oyEYKTGfg01Zaep8QyWT/LguGJwa', 'adolak4you', 'Jegede ', 'Ayodeji A', '24 Adegbite street, Powerline Moniya Ibadan', 'Ibadan', '8154677207', 'male', 'Oyo', 'Nigeria', '', 'Goldenwaves Innovations', 'Automobile repair', 'Ford, Benz, Lexus and all brands of Toyota and Honda', 'help@adolak.com', '08121704207', 'Ibadan', 'Jigawa', 'No 35C Ilupeji Akanti area Moniya', '', 'artisan', '2019-09-29 21:03:55.177948'),
(3, 'stephkuf123@gmail.com', '$2y$10$C7U9yORNeodgcWDJzr5d0uPVcSricgEXFKvR9fDsSkCguHrRtGYk.', 'stephkuf', 'Kuforiji', 'Stephen', 'Block 4, Radi road aerodrome Samonda', 'New York', '09021704227', 'male', 'Oyo', 'Nigeria', '', '', '', '', '', '', '', '', '', '', 'client', '2019-09-29 13:30:07.730329'),
(4, 'oladsteph@gmail.com', '$2y$10$cZtKsihWKIw6N0rnPKdGdufBRnDpzMm8MwYPAnC0sMECBxaDcH5xu', 'simonsez', 'Oladejo', 'Stephen', '', '', '08122704207', '', '', '', '', '', '', '', '', '', '', '', '', '', 'client', '2019-08-25 20:35:43.452229'),
(5, 'kingdave@gmail.com', '$2y$10$e8wOpHt1AaVrDvLRECWcae4X9LPcOs/zkOgb9eGjZuoCbt5Pzn1lC', 'kingdave', 'Adewale', 'David', '', '', '08121704128', '', '', '', '', '', '', '', '', '', '', '', '', '', 'client', '2019-08-25 20:37:18.981627');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'jeggs', '$2y$10$2LMR5f46eiOIpq/viej9C.oJUy9lBDghwSP7KFcfRE8KcpdtKG0YS', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
