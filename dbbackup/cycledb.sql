-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 07:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cycledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cycle_addcart`
--

CREATE TABLE `cycle_addcart` (
  `cartid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `added_date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cycle_addcategory`
--

CREATE TABLE `cycle_addcategory` (
  `category_id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_addcategory`
--

INSERT INTO `cycle_addcategory` (`category_id`, `categoryname`, `added_date`) VALUES
(1, 'mens cycle', '2023-05-02'),
(2, 'womens cycle', '2023-05-02'),
(3, 'kids cycle', '2023-05-02'),
(4, 'sports cycle', '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_addorders`
--

CREATE TABLE `cycle_addorders` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ordercode` bigint(20) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `added_date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cycle_addproducts`
--

CREATE TABLE `cycle_addproducts` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `categorysub_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `oldprice` int(11) NOT NULL,
  `offerprice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pdescriptions` text NOT NULL,
  `added_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_addproducts`
--

INSERT INTO `cycle_addproducts` (`product_id`, `category_id`, `categorysub_id`, `productname`, `pimage`, `oldprice`, `offerprice`, `qty`, `pdescriptions`, `added_date`) VALUES
(1, 0, 0, '', 'upload/product/', 0, 0, 0, '', ''),
(2, 1, 1, 'heri renger cycle', 'upload/product/', 45, 25, 1, 'hi', '2022-04-05'),
(3, 1, 1, 'hero radar', 'upload/product/fancy-chaniya-choli-250x250.png', 45, 25, 1, 'ko', '2022-04-05'),
(4, 3, 2, 'kids', 'upload/product/fancy-chaniya-choli-500x500.png', 45, 25, 1, '45', '2022-04-05'),
(5, 1, 1, 'heri renger cycle', 'upload/products/fancy-chaniya-choli-500x500.png', 45, 45, 1, '45', '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_admin`
--

CREATE TABLE `cycle_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_admin`
--

INSERT INTO `cycle_admin` (`admin_id`, `email`, `password`) VALUES
(1, 'superadmin@gmail.com', 'super321');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_billgenerate`
--

CREATE TABLE `cycle_billgenerate` (
  `billid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `billdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cycle_city`
--

CREATE TABLE `cycle_city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `cityname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cycle_customer`
--

CREATE TABLE `cycle_customer` (
  `customerid` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `added_date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_customer`
--

INSERT INTO `cycle_customer` (`customerid`, `photo`, `name`, `email`, `password`, `mobile`, `address`, `state_id`, `added_date_time`) VALUES
(1, 'uploads/customers/ap22312071681283-0d9c328f69a7c7f15320e8750d6ea447532dff66-s1100-c50.jpg', 'brijesh', 'bkpandey.pandey@gmail.com', 'MTIzNDU2', 999803879, 'hi', 1, '11/05/2023 10:13:05 am');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_state`
--

CREATE TABLE `cycle_state` (
  `state_id` int(11) NOT NULL,
  `statename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_state`
--

INSERT INTO `cycle_state` (`state_id`, `statename`) VALUES
(1, 'gujrat'),
(2, 'Madhya pradesh'),
(3, 'Uttar pradesh'),
(4, 'mahrastra');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_sub`
--

CREATE TABLE `cycle_sub` (
  `categorysub_id` int(11) NOT NULL,
  `sub_catname` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_sub`
--

INSERT INTO `cycle_sub` (`categorysub_id`, `sub_catname`, `added_date`, `category_id`) VALUES
(1, 'Hero mens cycle', '2023-05-06', 1),
(2, 'Hero kids cycle', '2023-05-06', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cycle_addcart`
--
ALTER TABLE `cycle_addcart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `cycle_addcategory`
--
ALTER TABLE `cycle_addcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cycle_addorders`
--
ALTER TABLE `cycle_addorders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `cartid` (`cartid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cycle_addproducts`
--
ALTER TABLE `cycle_addproducts`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `categorysub_id` (`categorysub_id`);

--
-- Indexes for table `cycle_admin`
--
ALTER TABLE `cycle_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cycle_billgenerate`
--
ALTER TABLE `cycle_billgenerate`
  ADD PRIMARY KEY (`billid`),
  ADD KEY `cartid` (`cartid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `cycle_city`
--
ALTER TABLE `cycle_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `cycle_customer`
--
ALTER TABLE `cycle_customer`
  ADD PRIMARY KEY (`customerid`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `cycle_state`
--
ALTER TABLE `cycle_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `cycle_sub`
--
ALTER TABLE `cycle_sub`
  ADD PRIMARY KEY (`categorysub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cycle_addcart`
--
ALTER TABLE `cycle_addcart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cycle_addcategory`
--
ALTER TABLE `cycle_addcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cycle_addorders`
--
ALTER TABLE `cycle_addorders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cycle_addproducts`
--
ALTER TABLE `cycle_addproducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cycle_admin`
--
ALTER TABLE `cycle_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cycle_billgenerate`
--
ALTER TABLE `cycle_billgenerate`
  MODIFY `billid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cycle_city`
--
ALTER TABLE `cycle_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cycle_customer`
--
ALTER TABLE `cycle_customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cycle_state`
--
ALTER TABLE `cycle_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cycle_sub`
--
ALTER TABLE `cycle_sub`
  MODIFY `categorysub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
