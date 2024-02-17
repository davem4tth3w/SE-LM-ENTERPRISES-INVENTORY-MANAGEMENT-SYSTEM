-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 04:00 PM
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
(29, 18, 'Ej brand', 'active'),
(30, 17, 'brand 1', 'active'),
(31, 17, 'brand 2', 'active');

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
  `inventory_order_created_date` date NOT NULL,
  `vat` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `overall_total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory_order`
--

INSERT INTO `inventory_order` (`inventory_order_id`, `user_id`, `inventory_order_total`, `inventory_order_date`, `inventory_order_name`, `inventory_order_address`, `payment_status`, `inventory_order_status`, `inventory_order_created_date`, `vat`, `discount`, `overall_total`) VALUES
(30, 1, 4400.00, '2024-02-04', 'dave m', 'awdfasfa', 'cash', 'active', '2024-02-04', 0.00, 0.00, 0.00),
(31, 1, 330.00, '2024-02-06', 'dave m', 'none', 'cash', 'active', '2024-02-06', 0.00, 0.00, 0.00),
(32, 1, 330.00, '2024-02-06', 'matthew', 'none', 'cash', 'active', '2024-02-06', 0.00, 0.00, 0.00),
(33, 1, 66.00, '2024-02-06', 'dave', 'Guiwan D ROAD', 'cash', 'active', '2024-02-06', 0.00, 0.00, 0.00),
(34, 1, 66.00, '2024-02-04', 'dave', 'USA ', 'cash', 'active', '2024-02-08', 0.00, 0.00, 0.00),
(35, 1, 66.00, '2024-02-04', 'Walter White ', 'Arizona ', 'cash', 'active', '2024-02-08', 0.00, 0.00, 0.00),
(36, 1, 4400.00, '2024-02-26', 'Freddy Krueger', 'Elm Street, Spring Wood Ohio', 'credit', 'active', '2024-02-08', 0.00, 0.00, 0.00),
(37, 11, 330.00, '2024-02-09', 'Johnny Bravo', 'US', 'cash', 'active', '2024-02-09', 0.00, 0.00, 0.00),
(38, 1, 176.00, '2024-02-09', 'Customer 1', 'zamboanga City, Sta. Maria', 'cash', 'active', '2024-02-09', 0.00, 0.00, 0.00),
(39, 1, 1116.00, '2024-02-09', 'Customer 2', 'Baliwasan, Zamboanga City', 'cash', 'active', '2024-02-09', 0.00, 0.00, 0.00),
(40, 1, 0.00, '2024-02-12', 'dave m', 'none', 'cash', 'active', '2024-02-10', 0.00, 0.00, 0.00),
(41, 1, 66.00, '2024-02-11', 'EJ ', 'Lunzuran, Z.C', 'cash', 'active', '2024-02-10', 0.00, 0.00, 0.00),
(42, 1, 22220.00, '2024-02-10', 'Roland Jay', 'Lustre, Sta. Catalina', 'credit', 'active', '2024-02-10', 0.00, 0.00, 0.00),
(43, 1, 4400.00, '2024-02-14', 'Ezekiel Jude', 'Lunzuran', 'credit', 'active', '2024-02-14', 0.00, 0.00, 0.00),
(44, 1, 4400.00, '2024-02-13', 'EJ ', 'LUNZURAN', 'credit', 'active', '2024-02-14', 0.00, 0.00, 0.00),
(45, 1, 3675.00, '2024-02-14', 'Jude V', 'Lunzuran', 'credit', 'active', '2024-02-14', 0.00, 0.00, 0.00),
(46, 11, 4400.00, '2024-02-15', 'dave', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(47, 1, 330.00, '2024-02-15', 'Customer 1', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(48, 1, 200.00, '2024-02-16', 'Customer 2', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(49, 1, 200.00, '2024-02-17', 'cust 3', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(50, 1, 200.00, '2024-02-16', 'customer 4', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(51, 1, 31.50, '2024-02-16', 'customer 5', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(52, 1, 25.00, '2024-02-16', 'cust 6', 'unknown', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(53, 1, 66.00, '2024-02-15', 'Jhon Doe', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(54, 1, 4280.00, '2024-02-15', 'Customer 1010', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(55, 1, 4280.00, '2024-02-15', 'Customer 1010', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(56, 1, 214.00, '2024-02-16', 'matthew', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(57, 1, 214.00, '2024-02-16', 'matthew', 'none', 'cash', 'active', '2024-02-15', 0.00, 0.00, 0.00),
(58, 1, 133.75, '2024-02-16', 'janitor customer', 'none', 'cash', 'active', '2024-02-16', 0.00, 0.00, 0.00),
(59, 1, 133.75, '2024-02-16', 'janitor customer', 'none', 'cash', 'active', '2024-02-16', 0.00, 0.00, 0.00),
(60, 1, 60.00, '2024-02-17', 'JV', 'RIVER SIDE', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(61, 1, 60.00, '2024-02-17', 'JV', 'RIVER SIDE', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(62, 1, 30.00, '2024-02-17', 'EJ ', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(63, 1, 30.00, '2024-02-17', 'EJ ', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(64, 1, 0.00, '2024-02-13', 'Customer 1', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(65, 1, 0.00, '2024-02-13', 'Customer 1', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(66, 1, 0.00, '2024-02-06', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(67, 1, 0.00, '2024-02-06', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(68, 1, 0.00, '2024-02-12', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(69, 1, 0.00, '2024-02-12', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(70, 1, 0.00, '2024-02-05', 'matthew', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(71, 1, 0.00, '2024-02-05', 'matthew', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(72, 1, 0.00, '2024-02-12', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(73, 1, 0.00, '2024-02-12', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(74, 1, 0.00, '2024-02-19', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(75, 1, 0.00, '2024-02-19', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(76, 1, 330.00, '2024-02-12', 'dave', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(77, 1, 330.00, '2024-02-12', 'dave', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(78, 1, 200.00, '2024-02-12', 'matthew', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(79, 1, 200.00, '2024-02-12', 'matthew', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(80, 1, 0.00, '2024-02-19', 'Customer 1010', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(81, 1, 0.00, '2024-02-19', 'Customer 1010', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(82, 1, 0.00, '2024-02-12', 'cust 6', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(83, 1, 0.00, '2024-02-12', 'cust 6', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(84, 1, 0.00, '2024-02-05', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(85, 1, 0.00, '2024-02-05', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(86, 1, 0.00, '2024-02-21', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(87, 1, 0.00, '2024-02-21', 'Customer 2', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(88, 1, 0.00, '2024-02-13', 'EJ ', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(89, 1, 0.00, '2024-02-13', 'EJ ', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(90, 1, 0.00, '2024-02-13', 'dave', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(91, 1, 0.00, '2024-02-13', 'dave', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(92, 1, 0.00, '2024-02-13', 'dave', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(93, 1, 0.00, '2024-02-13', 'dave', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(94, 1, 0.00, '2024-02-13', 'matthew 2', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(95, 1, 0.00, '2024-02-13', 'matthew 2', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(96, 1, 0.00, '2024-02-17', 'Customer 7', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(97, 1, 0.00, '2024-02-17', 'Customer 7', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(98, 1, 0.00, '2024-02-17', 'matt d', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(99, 1, 0.00, '2024-02-17', 'matt d', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(100, 1, 0.00, '2024-02-17', 'Customer 12', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(101, 1, 0.00, '2024-02-17', 'Customer 12', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(102, 1, 0.00, '2024-02-17', 'Rowan Atkinson', 'UK Birmingham', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(103, 1, 0.00, '2024-02-17', 'Rowan Atkinson', 'UK Birmingham', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(104, 1, 0.00, '2024-02-17', 'unknonwn', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(105, 1, 0.00, '2024-02-17', 'unknonwn', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(106, 1, 0.00, '2024-02-17', 'Customer 1010', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(107, 1, 0.00, '2024-02-17', 'Customer 1010', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(108, 1, 0.00, '2024-02-17', 'Rowan Atkinson', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(109, 1, 0.00, '2024-02-17', 'Rowan Atkinson', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(110, 1, 0.00, '2024-02-17', 'Morty', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(111, 1, 0.00, '2024-02-17', 'Morty', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(112, 1, 0.00, '2024-02-17', 'Rick Sanchez', 'None', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(113, 1, 0.00, '2024-02-17', 'Rick Sanchez', 'None', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(114, 1, 0.00, '2024-02-12', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(115, 1, 0.00, '2024-02-12', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(116, 1, 66.00, '2024-02-17', 'dave mtthw', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(117, 1, 66.00, '2024-02-17', 'dave mtthw', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(118, 1, 4400.00, '2024-02-12', 'davemmm', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(119, 1, 4400.00, '2024-02-12', 'davemmm', 'none', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(120, 1, 66.00, '2024-01-29', 'Customer 12', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(121, 1, 66.00, '2024-01-29', 'Customer 12', 'n', 'cash', 'active', '2024-02-17', 0.10, 0.00, 72.60),
(122, 1, 200.00, '2024-02-12', 'dave I', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(123, 1, 31.50, '2024-02-17', 'dave 2', 'guiwan', 'cash', 'active', '2024-02-17', 0.10, 0.00, 34.65),
(124, 1, 0.00, '2024-02-17', 'dave 3', 'NONE', 'cash', 'active', '2024-02-17', 0.10, 0.00, 0.00),
(125, 1, 0.00, '2024-02-17', 'dave 4', 'none', 'cash', 'active', '2024-02-17', 0.10, 0.00, 0.00),
(126, 1, 0.00, '2024-02-06', 'dave 5', 'n', 'cash', 'active', '2024-02-17', 0.10, 0.00, 0.00),
(127, 1, 0.00, '2024-02-12', 'EJ ', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(128, 1, 0.00, '2024-02-26', 'RJAY', 'NONE', 'cash', 'active', '2024-02-17', 0.10, 0.00, 4840.00),
(129, 1, 0.00, '2024-02-13', 'Xavier', 'Tumaga', 'cash', 'active', '2024-02-17', 0.12, 0.00, 28.00),
(130, 1, 0.00, '2024-02-18', 'Ivan ', 'none', 'cash', 'active', '2024-02-17', 0.12, 0.00, 33.60),
(131, 1, 0.00, '2024-02-19', 'Ivan D', 'n', 'cash', 'active', '2024-02-17', 0.00, 0.00, 0.00),
(132, 1, 0.00, '2024-02-05', 'Customer 2', 'none', 'cash', 'active', '2024-02-17', 0.12, 0.00, 67.20),
(133, 1, 0.00, '2024-02-11', 'matthew D', 'none', 'cash', 'active', '2024-02-17', 0.12, 0.00, 13.44);

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
(103, 45, 40, 1, 3500.00, 5.00),
(104, 46, 31, 1, 4000.00, 10.00),
(105, 47, 41, 1, 300.00, 10.00),
(106, 48, 42, 1, 200.00, 0.00),
(107, 49, 42, 1, 200.00, 0.00),
(108, 50, 42, 1, 200.00, 0.00),
(109, 51, 43, 1, 30.00, 5.00),
(110, 52, 44, 1, 25.00, 0.00),
(111, 53, 27, 1, 60.00, 10.00),
(112, 54, 31, 1, 4000.00, 10.00),
(113, 55, 31, 1, 4000.00, 10.00),
(114, 56, 42, 1, 200.00, 0.00),
(115, 57, 42, 1, 200.00, 0.00),
(116, 58, 44, 5, 25.00, 0.00),
(117, 59, 44, 5, 25.00, 0.00),
(118, 60, 34, 1, 60.00, 10.00),
(119, 61, 34, 1, 60.00, 10.00),
(120, 62, 43, 1, 30.00, 5.00),
(121, 63, 43, 1, 30.00, 5.00),
(122, 70, 42, 1, 200.00, 0.00),
(123, 71, 42, 1, 200.00, 0.00),
(124, 72, 31, 1, 4000.00, 10.00),
(125, 73, 31, 1, 4000.00, 10.00),
(126, 74, 31, 1, 4000.00, 10.00),
(127, 75, 31, 1, 4000.00, 10.00),
(128, 76, 41, 1, 300.00, 10.00),
(129, 77, 41, 1, 300.00, 10.00),
(130, 78, 42, 1, 200.00, 0.00),
(131, 79, 42, 1, 200.00, 0.00),
(132, 80, 31, 1, 4000.00, 10.00),
(133, 81, 31, 1, 4000.00, 10.00),
(134, 82, 33, 1, 100.00, 10.00),
(135, 83, 33, 1, 100.00, 10.00),
(136, 84, 42, 1, 200.00, 0.00),
(137, 85, 42, 1, 200.00, 0.00),
(138, 86, 42, 1, 200.00, 0.00),
(139, 87, 42, 1, 200.00, 0.00),
(140, 88, 42, 1, 200.00, 0.00),
(141, 89, 42, 1, 200.00, 0.00),
(142, 90, 42, 1, 200.00, 0.00),
(143, 91, 42, 1, 200.00, 0.00),
(144, 92, 27, 1, 60.00, 10.00),
(145, 93, 27, 1, 60.00, 10.00),
(146, 94, 44, 1, 25.00, 0.00),
(147, 95, 44, 1, 25.00, 0.00),
(148, 96, 43, 1, 30.00, 5.00),
(149, 97, 43, 1, 30.00, 5.00),
(150, 98, 42, 1, 200.00, 0.00),
(151, 99, 42, 1, 200.00, 0.00),
(152, 100, 41, 1, 300.00, 10.00),
(153, 101, 41, 1, 300.00, 10.00),
(154, 102, 43, 1, 30.00, 5.00),
(155, 103, 43, 1, 30.00, 5.00),
(156, 104, 31, 1, 4000.00, 10.00),
(157, 105, 31, 1, 4000.00, 10.00),
(158, 106, 31, 1, 4000.00, 10.00),
(159, 107, 31, 1, 4000.00, 10.00),
(160, 108, 44, 1, 25.00, 0.00),
(161, 109, 44, 1, 25.00, 0.00),
(162, 110, 42, 1, 200.00, 0.00),
(163, 111, 42, 1, 200.00, 0.00),
(164, 112, 31, 1, 4000.00, 10.00),
(165, 113, 31, 1, 4000.00, 10.00),
(166, 114, 33, 1, 100.00, 10.00),
(167, 115, 33, 1, 100.00, 10.00),
(168, 116, 27, 1, 60.00, 10.00),
(169, 117, 27, 1, 60.00, 10.00),
(170, 118, 31, 1, 4000.00, 10.00),
(171, 119, 31, 1, 4000.00, 10.00),
(172, 120, 27, 1, 60.00, 10.00),
(173, 121, 27, 1, 60.00, 10.00),
(174, 122, 42, 1, 200.00, 0.00),
(175, 123, 43, 1, 30.00, 5.00),
(176, 124, 43, 1, 30.00, 5.00),
(177, 125, 27, 1, 60.00, 10.00),
(178, 126, 44, 1, 25.00, 0.00),
(179, 127, 27, 1, 60.00, 10.00),
(180, 128, 31, 1, 4000.00, 10.00),
(181, 129, 44, 1, 25.00, 0.00),
(182, 130, 48, 1, 30.00, 0.00),
(183, 131, 48, 1, 30.00, 0.00),
(184, 132, 49, 1, 60.00, 0.00),
(185, 133, 50, 1, 12.00, 0.00);

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
(27, 15, 27, 'Ballpen (BLUE)', 'none', 1, 'Box', 60.00, '10.00', 0.00, 1, 'active', '2024-02-06'),
(30, 15, 25, 'Pencil', 'none', 1, 'Box', 60.00, '10.00', 0.00, 1, 'inactive', '2024-02-06'),
(31, 15, 25, 'printer (box)', 'none', 5, 'Box', 4000.00, '10.00', 0.00, 1, 'active', '2024-02-06'),
(33, 16, 26, 'Pencil 4h (Graphite)', 'none basta lapis lang', 5, 'Box', 100.00, '10.00', 0.00, 1, 'active', '2024-02-08'),
(34, 15, 27, 'Ballpen BLACK', 'NONE', 5, 'Box', 60.00, '10.00', 0.00, 1, 'active', '2024-02-08'),
(35, 15, 25, 'EPSON INK', 'none', 1, 'Box', 100.00, '10.00', 0.00, 1, 'active', '2024-02-09'),
(36, 15, 25, 'EPSON INK (BLACK)', 'Printer ink (black)', 5, 'Box', 100.00, '10.00', 0.00, 1, 'active', '2024-02-09'),
(41, 16, 26, 'pencil charcoal', 'none', 5, 'Box', 300.00, '10.00', 0.00, 1, 'inactive', '2024-02-15'),
(42, 17, 30, 'map', 'none', 300, 'Pcs', 200.00, '0.00', 0.00, 1, 'active', '2024-02-15'),
(43, 17, 31, 'rubber gloves', 'none', 300, 'Pcs', 30.00, '5.00', 0.00, 1, 'active', '2024-02-15'),
(44, 17, 30, 'Cleaning towels', 'none', 100, 'Pcs', 25.00, '0.00', 0.00, 1, 'active', '2024-02-15'),
(45, 15, 25, 'Printer INK (small)', 'NONE', 5, 'Box', 1200.00, '5.00', 0.00, 1, 'active', '2024-02-16'),
(48, 17, 31, 'Dish washing liquid (no tax)', 'none', 300, 'Box', 30.00, '0.00', 0.00, 1, 'active', '2024-02-17'),
(49, 17, 31, 'Spray Container bottle (no tax)', 'none', 150, 'Pcs', 60.00, '0.00', 0.00, 1, 'active', '2024-02-17'),
(50, 17, 31, 'rags (no tax)', 'none', 300, 'Pcs', 12.00, '0.00', 0.00, 1, 'active', '2024-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('admin','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'admin123@gmail.com', '$2y$10$.JEm7ciQEsOyQYG6nX.dkeIGFkSh9kUkMVm4Q7hdwDK2yBNgI6IVq', 'Admin', 'admin', 'Active'),
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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inventory_order`
--
ALTER TABLE `inventory_order`
  MODIFY `inventory_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  MODIFY `inventory_order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
