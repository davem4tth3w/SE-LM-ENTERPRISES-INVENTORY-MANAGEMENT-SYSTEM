-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 07:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lm_ent-bv5`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `category_id`, `brand_name`, `brand_status`) VALUES
(25, 15, 'EPSON', 'active'),
(26, 16, 'monggol', 'active'),
(27, 15, 'HBV', 'active'),
(28, 18, 'sample brand', 'active'),
(29, 18, 'Ej brand', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(15, 'Office Supplies', 'active'),
(16, 'School Suppplies', 'active'),
(17, 'Janitor Supplies', 'active'),
(18, 'Furniture', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order`
--

CREATE TABLE `inventory_order` (
  `inventory_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_order_total` double(10,2) NOT NULL,
  `inventory_order_date` date NOT NULL,
  `inventory_order_name` varchar(255) NOT NULL,
  `inventory_order_address` text NOT NULL,
  `payment_status` enum('cash','credit') NOT NULL,
  `inventory_order_status` varchar(100) NOT NULL,
  `inventory_order_created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory_order`
--

INSERT INTO `inventory_order` (`inventory_order_id`, `user_id`, `inventory_order_total`, `inventory_order_date`, `inventory_order_name`, `inventory_order_address`, `payment_status`, `inventory_order_status`, `inventory_order_created_date`) VALUES
(30, 1, 4400.00, '2024-02-04', 'dave m', 'awdfasfa', 'cash', 'active', '2024-02-04'),
(31, 1, 330.00, '2024-02-06', 'dave m', 'none', 'cash', 'active', '2024-02-06'),
(32, 1, 330.00, '2024-02-06', 'matthew', 'none', 'cash', 'active', '2024-02-06'),
(33, 1, 66.00, '2024-02-06', 'dave', 'Guiwan D ROAD', 'cash', 'active', '2024-02-06'),
(34, 1, 66.00, '2024-02-04', 'dave', 'USA ', 'cash', 'active', '2024-02-08'),
(35, 1, 66.00, '2024-02-04', 'Walter White ', 'Arizona ', 'cash', 'active', '2024-02-08'),
(36, 1, 4400.00, '2024-02-26', 'Freddy Krueger', 'Elm Street, Spring Wood Ohio', 'credit', 'active', '2024-02-08'),
(37, 11, 330.00, '2024-02-09', 'Johnny Bravo', 'US', 'cash', 'active', '2024-02-09'),
(38, 1, 176.00, '2024-02-09', 'Customer 1', 'zamboanga City, Sta. Maria', 'cash', 'active', '2024-02-09'),
(39, 1, 1116.00, '2024-02-09', 'Customer 2', 'Baliwasan, Zamboanga City', 'cash', 'active', '2024-02-09'),
(40, 1, 0.00, '2024-02-12', 'dave m', 'none', 'cash', 'active', '2024-02-10'),
(41, 1, 66.00, '2024-02-11', 'EJ ', 'Lunzuran, Z.C', 'cash', 'active', '2024-02-10'),
(42, 1, 22220.00, '2024-02-10', 'Roland Jay', 'Lustre, Sta. Catalina', 'credit', 'active', '2024-02-10'),
(43, 1, 4400.00, '2024-02-14', 'Ezekiel Jude', 'Lunzuran', 'credit', 'active', '2024-02-14'),
(44, 1, 4400.00, '2024-02-13', 'EJ ', 'LUNZURAN', 'credit', 'active', '2024-02-14'),
(45, 1, 3675.00, '2024-02-14', 'Jude V', 'Lunzuran', 'credit', 'active', '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order_product`
--

CREATE TABLE `inventory_order_product` (
  `inventory_order_product_id` int(11) NOT NULL,
  `inventory_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory_order_product`
--

INSERT INTO `inventory_order_product` (`inventory_order_product_id`, `inventory_order_id`, `product_id`, `quantity`, `price`, `tax`) VALUES
(85, 30, 24, 1, 4000.00, 10.00),
(86, 31, 27, 5, 60.00, 10.00),
(87, 32, 28, 5, 60.00, 10.00),
(88, 33, 29, 1, 60.00, 10.00),
(89, 34, 34, 1, 60.00, 10.00),
(90, 35, 30, 1, 60.00, 10.00),
(91, 36, 31, 1, 4000.00, 10.00),
(92, 37, 34, 5, 60.00, 10.00),
(93, 38, 38, 1, 100.00, 10.00),
(94, 38, 27, 1, 60.00, 10.00),
(95, 39, 39, 5, 200.00, 5.00),
(96, 39, 27, 1, 60.00, 10.00),
(97, 41, 27, 1, 60.00, 10.00),
(98, 42, 36, 1, 100.00, 10.00),
(99, 42, 38, 1, 100.00, 10.00),
(100, 42, 31, 5, 4000.00, 10.00),
(101, 43, 31, 1, 4000.00, 10.00),
(102, 44, 31, 1, 4000.00, 10.00),
(103, 45, 40, 1, 3500.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit` varchar(150) NOT NULL,
  `product_base_price` double(10,2) NOT NULL,
  `product_tax` decimal(4,2) NOT NULL,
  `product_minimum_order` double(10,2) NOT NULL,
  `product_enter_by` int(11) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `product_quantity`, `product_unit`, `product_base_price`, `product_tax`, `product_minimum_order`, `product_enter_by`, `product_status`, `product_date`) VALUES
(27, 15, 27, 'Ballpen (BLUE)', 'none', 1, 'Box', 60.00, '10.00', 0.00, 1, 'inactive', '2024-02-06'),
(30, 15, 25, 'Pencil', 'none', 1, 'Box', 60.00, '10.00', 0.00, 1, 'inactive', '2024-02-06'),
(31, 15, 25, 'printer (box)', 'none', 5, 'Box', 4000.00, '10.00', 0.00, 1, 'inactive', '2024-02-06'),
(33, 16, 26, 'Pencil 4h (Graphite)', 'none basta lapis lang', 5, 'Box', 100.00, '10.00', 0.00, 1, 'inactive', '2024-02-08'),
(34, 15, 27, 'Ballpen BLACK', 'NONE', 5, 'Box', 60.00, '10.00', 0.00, 1, 'active', '2024-02-08'),
(35, 15, 25, 'EPSON INK', 'none', 1, 'Box', 100.00, '10.00', 0.00, 1, 'active', '2024-02-09'),
(36, 15, 25, 'EPSON INK (BLACK)', 'Printer ink (black)', 5, 'Box', 100.00, '10.00', 0.00, 1, 'active', '2024-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'admin123@gmail.com', '$2y$10$6KaAcQKOKooMiTitluwNK.0haOQGwbmtQ4qLs3.hDR.ZbmyXSXN3y', 'Admin', 'master', 'Active'),
(11, 'mattd@gmail.com', '$2y$10$tYnXpSaYJDxlkgVZ5Hr86OnMhAbI2Z0jjjA.tyI4lOBsfScH3gXES', 'matthewD', 'user', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `inventory_order`
--
ALTER TABLE `inventory_order`
  ADD PRIMARY KEY (`inventory_order_id`);

--
-- Indexes for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  ADD PRIMARY KEY (`inventory_order_product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inventory_order`
--
ALTER TABLE `inventory_order`
  MODIFY `inventory_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  MODIFY `inventory_order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
