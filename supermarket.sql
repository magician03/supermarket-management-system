-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2017 at 11:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `pids` text NOT NULL,
  `total_amount` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`purchase_id`, `purchase_date`, `pids`, `total_amount`, `profit`, `cid`) VALUES
(1, '2012-11-02', '2,5,11', 6250, 850, 0),
(2, '2012-11-02', '2,5,11,8', 7250, 950, 0),
(3, '2012-11-02', '8,5,1', 46120, 5120, 0),
(4, '2012-11-02', '8,1', 2200, 300, 0),
(5, '2012-11-02', '1', 1200, 200, 0),
(6, '2012-11-02', '1,10,5', 123700, 12700, 0),
(7, '2012-11-02', '1,1', 12000, 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cjoin_date` date NOT NULL,
  `cmoney_spent` int(11) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `cmoney_spent_reset` int(5) NOT NULL,
  `cphone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `manager_id` int(11) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `dept_name` varchar(40) NOT NULL,
  `manager_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`manager_id`, `dept_id`, `dept_name`, `manager_start_date`) VALUES
(2, 1, 'Food', '2012-10-31'),
(3, 2, 'Electronics', '2012-10-31'),
(4, 3, 'Clothes', '2012-10-31'),
(5, 4, 'Household', '2012-10-31'),
(0, 5, 'Furniture', '2012-10-31'),
(4, 6, 'groceries', '2017-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `salary` int(8) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `address` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `dob` date NOT NULL,
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `perks` int(11) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`first_name`, `last_name`, `id`, `dept_id`, `salary`, `phone_number`, `address`, `uid`, `join_date`, `dob`, `end_date`, `perks`, `admin`) VALUES
('Boss', 'owner', 1, 0, 50000, 99999999, 'H.no12, Example Nagar', 78945, '2012-10-31', '1992-10-01', '0000-00-00', 0, 2),
('Pramodh', 'Mazumdar', 2, 2, 50000, 99994444, 'l-502', 11, '2012-10-31', '1992-12-11', '0000-00-00', 0, 1),
('Manal', 'Gandhi', 3, 3, 50000, 88888333, 'l-502', 47, '2012-10-31', '1992-02-08', '0000-00-00', 0, 1),
('Ravi', 'Rohith', 4, 0, 50000, 77776666, 'e-146', 17, '2012-10-31', '1992-12-17', '0000-00-00', 0, 1),
('Shravya', 'Rao', 5, 4, 50000, 6666677, 'l-234', 12, '2012-10-31', '1992-05-09', '0000-00-00', 0, 1),
('Avinash', 'Reddy', 6, 0, 40000, 87989456, 'l-328', 87, '2012-10-31', '1992-07-09', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `admin`) VALUES
('owner', 'password', 1, 2),
('pramodh', 'password', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_from`
--

CREATE TABLE `orders_from` (
  `status` tinyint(2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `department_id` int(5) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cost_price` int(7) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `product_type` int(11) NOT NULL,
  `market_price` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cost_price`, `supplier_id`, `product_name`, `quantity`, `product_type`, `market_price`) VALUES
(1, 12, 1, 'colgate', 1000, 1, 10),
(2, 25, 2, 'apple', 1000, 1, 20),
(3, 60, 3, 'lumia', 1000, 2, 40),
(4, 70, 4, 'nexus', 1000, 2, 60),
(5, 450, 4, 'peter eng', 950, 3, 400),
(6, 75, 3, 'levis', 1000, 3, 70),
(7, 10, 1, 'plates', 1000, 4, 10),
(8, 10, 1, 'surf', 1000, 4, 9),
(9, 100, 2, 'godrej', 1000, 5, 80),
(10, 1000, 2, 'videocon', 900, 5, 900),
(11, 75, 1, 'redbull', 1000, 1, 60),
(12, 5, 1, 'gums', 1000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `discount` int(3) NOT NULL,
  `valid_upto` date NOT NULL,
  `promo_code` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`discount`, `valid_upto`, `promo_code`, `count`) VALUES
(12, '2010-05-04', 1, 0),
(25, '2010-05-04', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sdealer` varchar(20) NOT NULL,
  `semail` varchar(40) NOT NULL,
  `sid` int(11) NOT NULL,
  `saddress` varchar(50) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sphone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sdealer`, `semail`, `sid`, `saddress`, `sname`, `sphone`) VALUES
('Mcd', 'afdasdf', 1, 'sdfsadf', 'raviq', 987975464),
('kfc', 'hfsfgd', 2, 'sdgsdfjg', 'charan', 3455366),
('reliance', 'sgfjsdf', 3, 'sdgsdfg', 'karan', 345345),
('imax', 'sdgsdfgw', 4, 'iueriuw', 'harish', 87977);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `p_name` varchar(40) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`p_name`, `pid`, `quantity`, `price`, `id`) VALUES
('colgate', 1, 2, 24, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cphone` (`cphone`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_from`
--
ALTER TABLE `orders_from`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sphone` (`sphone`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders_from`
--
ALTER TABLE `orders_from`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;