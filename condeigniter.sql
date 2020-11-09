-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 07:43 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`) VALUES
(1, 'Samsung', '2020-09-25 13:40:42'),
(2, 'LG', '2020-09-25 13:40:42'),
(3, 'Walton', '2020-09-25 13:41:16'),
(4, 'Sony', '2020-09-25 13:41:16'),
(5, 'RFL', '2020-10-11 17:22:05'),
(6, 'Minister', '2020-10-11 17:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Tv', '2020-09-25 13:32:50'),
(2, 'Ac', '2020-09-25 13:32:50'),
(3, 'Freeze', '2020-09-25 13:34:40'),
(4, 'Iron', '2020-09-25 13:34:40'),
(5, 'Fan', '2020-09-25 13:35:36'),
(6, 'Washing Machine', '2020-09-25 13:35:36'),
(7, 'Oven ', '2020-10-11 17:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`) VALUES
(1, 'Dhaka', '2020-09-25 13:31:31'),
(2, 'Jessore', '2020-09-25 13:31:31'),
(3, 'Khulna', '2020-09-25 13:31:31'),
(4, 'Mirpur', '2020-09-25 13:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `due_balance` float(10,2) DEFAULT NULL,
  `opening_balance` float(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `due_balance`, `opening_balance`, `created_at`) VALUES
(2, 'Shorif', 'shorif@gmail.com', '01799885544', 'Jessore', 2000.00, 2000.00, '2020-09-24 05:00:51'),
(6, 'Faruk', 'faruk@gmail.com', '56545465', 'Bagura', 3000.00, 3000.00, '2020-09-24 13:22:47'),
(7, 'Ratul Islam', 'ratul@gmail.com', '01452368899', 'Bagerhat', 53600.00, 4000.00, '2020-09-24 13:23:06'),
(8, 'Mamun', 'manun@gmail.com', '0000000000', 'Dhaka', 3800.00, 5000.00, '2020-10-11 17:19:43'),
(9, 'Noor', 'noor@gmail.com', '1234344332', 'Phanthopath, Dhaka', 1000.00, 1500.00, '2020-10-18 06:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(10) DEFAULT NULL,
  `receipt_no` varchar(5) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_amount` float(10,2) DEFAULT NULL,
  `due_amount` float(10,2) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `receipt_no`, `customer_id`, `paid_amount`, `due_amount`, `discount`, `created_at`) VALUES
(93, '4583', NULL, 2, 7000.00, 0.00, 0.00, '2020-10-19 05:38:42'),
(94, '1843', NULL, 2, 7000.00, 1000.00, 0.00, '2020-10-19 05:41:20'),
(95, NULL, '52963', 2, 1000.00, NULL, NULL, '2020-10-19 05:42:32'),
(96, '4329', NULL, 6, 22000.00, 1000.00, 0.00, '2020-10-19 06:04:56'),
(97, '9683', NULL, 7, 7000.00, 0.00, 0.00, '2020-10-19 06:06:25'),
(98, '8052', NULL, 7, 0.00, 50000.00, 0.00, '2020-10-19 06:06:57'),
(99, '6518', NULL, 8, 5000.00, 3000.00, 0.00, '2020-10-19 06:07:31'),
(100, '6632', NULL, 9, 57000.00, 1000.00, 0.00, '2020-10-19 06:08:03'),
(101, '638', NULL, 6, 75000.00, 0.00, 400.00, '2020-10-19 06:09:21'),
(102, NULL, '34310', 6, 1000.00, NULL, NULL, '2020-10-19 06:15:33'),
(103, '5965', NULL, 7, 50000.00, 0.00, 0.00, '2020-10-19 09:26:09'),
(104, '3621', NULL, 8, 13000.00, 800.00, 0.00, '2020-10-19 09:26:44'),
(105, NULL, '51252', 7, 400.00, NULL, NULL, '2020-10-19 09:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `sell_price` float(10,2) NOT NULL,
  `supplier_price` float(10,2) NOT NULL,
  `model` varchar(30) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` tinyint(11) NOT NULL,
  `qr_code` varchar(20) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `brand_id`, `image`, `details`, `sell_price`, `supplier_price`, `model`, `supplier_id`, `quantity`, `qr_code`, `create_at`) VALUES
(22, 'Conion Microwave Oven BE', 7, 1, '', '', 7000.00, 6000.00, '309N9', 6, 22, '', '2020-09-30 09:47:30'),
(23, 'Walton Tv', 1, 3, '', '', 8000.00, 6500.00, 'walton-54', 8, 57, '', '2020-10-07 11:33:27'),
(24, 'LG Washing ', 6, 2, '', '', 50000.00, 43000.00, 'arModel', 5, 28, '', '2020-10-07 11:35:38'),
(25, 'Minsiter freeze', 3, 6, '', '', 3400.00, 3300.00, 'waltonModel', 7, 33, 'Kow125@sf', '2020-10-10 08:01:08'),
(26, 'Whirlpool Refrigerator Black ', 3, 3, '', 'Whirlpool Refrigerator IF515 Caviar Black (3S) can', 7000.00, 6000.00, 'IF515 Caviar', 5, 50, '', '2020-10-11 17:29:31'),
(27, 'Philips Iron ', 4, 2, '', '', 2200.00, 2100.00, 'GC 1424', 9, 80, '', '2020-10-11 17:43:37'),
(28, 'Conion Microwave', 5, 5, '', '', 1500.00, 1300.00, 'aicrowave', 9, 30, '', '2020-10-11 17:45:46'),
(29, 'National Fan', 5, 5, NULL, '', 1600.00, 1400.00, 'ntfan-02', 11, 30, '', '2020-10-12 06:33:04'),
(30, 'Simphony', 1, 2, NULL, NULL, 10000.00, 9000.00, 'dfd', 9, 50, NULL, '2020-10-16 13:09:25'),
(31, 'Pen Drive 32 GB', 5, 3, NULL, '', 660.00, 500.00, 'pen48', 9, 70, 'GB87', '2020-10-16 13:12:23'),
(32, 'House Cool AC', 2, 4, NULL, '', 40000.00, 35000.00, 'ar3c', 7, 80, 'AC54E', '2020-10-19 00:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `price` float(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `product_id`, `quantity`, `price`, `order_id`, `create_at`) VALUES
(125, 22, 1, 7000.00, 93, '2020-10-19 05:38:42'),
(126, 23, 1, 8000.00, 94, '2020-10-19 05:41:20'),
(127, 22, 1, 7000.00, 96, '2020-10-19 06:04:56'),
(128, 23, 2, 8000.00, 96, '2020-10-19 06:04:56'),
(129, 26, 1, 7000.00, 97, '2020-10-19 06:06:25'),
(130, 24, 1, 50000.00, 98, '2020-10-19 06:06:57'),
(131, 23, 1, 8000.00, 99, '2020-10-19 06:07:31'),
(132, 24, 1, 50000.00, 100, '2020-10-19 06:08:03'),
(133, 23, 1, 8000.00, 100, '2020-10-19 06:08:03'),
(134, 22, 1, 7000.00, 101, '2020-10-19 06:09:21'),
(135, 23, 1, 8000.00, 101, '2020-10-19 06:09:21'),
(136, 24, 1, 50000.00, 101, '2020-10-19 06:09:21'),
(137, 25, 1, 3400.00, 101, '2020-10-19 06:09:21'),
(138, 26, 1, 7000.00, 101, '2020-10-19 06:09:21'),
(139, 24, 1, 50000.00, 103, '2020-10-19 09:26:09'),
(140, 25, 2, 3400.00, 104, '2020-10-19 09:26:44'),
(141, 26, 1, 7000.00, 104, '2020-10-19 09:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `due_balance` float(10,2) DEFAULT NULL,
  `opening_balance` float(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `brand_id`, `category_id`, `address`, `due_balance`, `opening_balance`, `created_at`) VALUES
(5, 'Mijan', '01717971904', 1, 1, 'Mirpur-1215,Dhaka', NULL, 30000.00, '2020-09-30 09:46:01'),
(6, 'Habib', '01717971904', 5, 3, 'Gulshan-1215,Dhaka', NULL, 10000.00, '2020-10-04 18:52:47'),
(7, 'Sazzad', '01478556633', 6, 6, 'Jessore, Bangladesh\r\n', NULL, 30000.00, '2020-10-11 17:32:15'),
(8, 'Rofiqul', '01717971904', 4, 5, 'House - 32, Road - 15, Dhaka', NULL, 40000.00, '2020-10-11 17:33:07'),
(9, 'Tasfiq', '01236547891', 2, 2, 'Uttara, Dhaka', NULL, 20000.00, '2020-10-11 17:34:10'),
(10, 'Thouhidul', '01717971904', 2, 4, 'Mirpur-1216,Dhaka', NULL, 10000.00, '2020-10-11 17:35:05'),
(11, 'Shimul', '01799885544', 3, 3, 'Chowgacha, Jessore, Khulna, Bangladesh', NULL, 30000.00, '2020-10-11 17:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE `transection` (
  `id` int(11) NOT NULL,
  `receipt_no` int(5) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` float(10,2) NOT NULL,
  `trns_mode` tinyint(1) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `cheque_no` varchar(30) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`id`, `receipt_no`, `order_id`, `amount`, `trns_mode`, `bank_name`, `cheque_no`, `supplier_id`, `customer_id`, `date`, `created_at`) VALUES
(34, 84708, NULL, 100.00, 1, '', '', NULL, 9, '10/18/2020', '2020-10-18 16:30:30'),
(35, 40358, NULL, 2000.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 00:03:49'),
(36, 17331, NULL, 1500.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 00:51:45'),
(37, 58010, NULL, 1500.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 01:03:29'),
(38, 49408, NULL, 1500.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 01:04:20'),
(39, 58671, NULL, 1.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 01:12:50'),
(40, 89631, NULL, 2900.00, 1, '', '', NULL, 9, '10/19/2020', '2020-10-19 01:14:24'),
(41, 52963, NULL, 1000.00, 1, '', '', NULL, 2, '10/19/2020', '2020-10-19 05:42:32'),
(42, 34310, NULL, 1000.00, 1, '', '', NULL, 6, '10/19/2020', '2020-10-19 06:15:33'),
(43, 51252, NULL, 400.00, 1, '', '', NULL, 7, '10/19/2020', '2020-10-19 09:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pic` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` text NOT NULL,
  `verified_email` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `forget_pass` varchar(15) DEFAULT NULL,
  `remember_me` varchar(30) DEFAULT NULL,
  `forget_pass_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pic`, `email`, `phone`, `city_id`, `password`, `gender`, `address`, `verified_email`, `created_at`, `forget_pass`, `remember_me`, `forget_pass_time`) VALUES
(20, 'ASAD', 'jpg', 'admin@gmail.com', '01717971901', 1, 'f925916e2754e5e03f75dd58a5733251', 2, 'Assad!122', '', '2020-09-23 17:52:10', '', '1118', '0000-00-00 00:00:00'),
(21, 'Asad', 'jpg', 'asad@gmail.com', '01717971901', 1, 'c7b9defb4b122d64073c143be8c55d61', 2, 'Assad!122', '', '2020-09-23 17:53:41', 'Mi1NxzDBmnYoOW2', NULL, '2020-09-23 16:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `transection`
--
ALTER TABLE `transection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transection`
--
ALTER TABLE `transection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
