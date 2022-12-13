-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 08:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
11111111111111111

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT 0,
  `brand_status` int(11) NOT NULL DEFAULT 0,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`, `companyid`) VALUES
(1, 'test', 2, 1, 5437265),
(2, 'HHCS', 1, 1, 5437265);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` int(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `buyer_address` int(100) NOT NULL,
  `productname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `buyer_name`, `buyer_address`, `productname`) VALUES
(2, 'mark', 2328, 'ventilators'),
(4, 'John', 2057, 'oscilators'),
(5, 'james', 55, 'Generator'),
(6, 'daniel', 4532, 'Infusion pumps'),
(7, 'BB maak', 5242, 'LASIK '),
(8, 'jacob', 5423, 'Medical lasers'),
(9, 'suleiman', 5568, 'Consult 120 Urine Analyzer'),
(10, 'prijate', 6465, 'Urine Reagent Strips 10 Parameter'),
(11, 'Violet', 5241, 'Consult Liquid Urine Control'),
(12, 'Green', 73, 'Plastic urine containers, sterile or unsterile'),
(13, 'Purple', 845, 'Conical centrifuge tube, 15 ml'),
(14, 'brown', 532, 'Microscope slides and 1 coverslip'),
(15, 'PINK', 65, 'Clinical Centrifuge'),
(16, 'purples', 543, 'gaga'),
(17, 'NITE', 436, 'Cent'),
(18, 'ronny', 6, 'Yoga ma'),
(19, 'Don', 641, 'Slide strainers'),
(20, 'Esther', 7434, 'Differential counters'),
(21, 'Nate', 72373, 'Electrolyte analyzers');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`, `companyid`) VALUES
(1, 'test1', 1, 2, 5437265),
(2, 'test1', 1, 1, 5437265),
(3, 'Hospital machines', 1, 1, 5437265);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`, `address`) VALUES
(1, '2020-05-01', 'rrr', '12345', '366.00', '65.88', '431.88', '0', '431.88', '122', '309.88', 2, 1, 1, '65.88', 2, 1, 5437265),
(61, '2022-11-11', 'lg', '33245', '6344.00', '1141.92', '7485.92', '252', '7233.92', '2525', '4708.92', 2, 1, 1, '1141.92', 1, 1, 5437265),
(62, '2022-11-25', 'jane', '563453', '11200.00', '2016.00', '13216.00', '2542', '10674.00', '432', '10242.00', 1, 1, 1, '2016.00', 1, 1, 5437265),
(63, '2022-11-09', 'jgfj', '43212', '3785.00', '681.30', '4466.30', '20', '4446.30', '101', '4345.30', 2, 1, 1, '681.30', 1, 1, 5437265),
(64, '2022-11-26', 'kira', '5424', '242.00', '43.56', '285.56', '24', '261.56', '4124', '-3862.44', 1, 1, 1, '43.56', 1, 1, 5437265),
(65, '2022-11-09', 'job', '543', '4958.00', '892.44', '5850.44', '24', '5826.44', '5432', '394.44', 2, 1, 1, '892.44', 1, 1, 5437265),
(66, '2022-11-17', 'jhfj', '5345', '600.00', '108.00', '708.00', '24', '684.00', '424', '260.00', 1, 1, 1, '108.00', 1, 1, 5437265),
(67, '2022-11-24', 'jane', '534', '25.00', '4.50', '29.50', '0', '29.50', '0', '29.50', 2, 3, 1, '4.50', 1, 1, 5437265);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`, `companyid`) VALUES
(13, 1, 1, '1', '122', '122.00', 2, 0),
(14, 1, 1, '1', '122', '122.00', 2, 0),
(15, 1, 1, '1', '122', '122.00', 2, 0),
(16, 2, 1, '1', '122', '122.00', 1, 0),
(17, 2, 1, '1', '122', '122.00', 1, 0),
(18, 2, 1, '1', '122', '122.00', 1, 0),
(19, 3, 1, '1', '', '', 1, 0),
(20, 4, 1, '1', '', '', 1, 0),
(21, 5, 1, '5', '', '0.00', 1, 0),
(22, 6, 1, '5', '', '0.00', 1, 0),
(23, 7, 1, '2', '', '0.00', 1, 0),
(24, 8, 1, '1', '122', '122.00', 1, 0),
(25, 9, 1, '8', '122', '976.00', 1, 0),
(26, 10, 1, '30', '122', '3660.00', 1, 0),
(27, 11, 1, '20', '122', '2440.00', 1, 0),
(28, 12, 1, '453', '122', '55266.00', 1, 0),
(29, 13, 1, '453', '122', '55266.00', 1, 0),
(30, 14, 1, '453', '122', '55266.00', 1, 0),
(31, 15, 1, '453', '122', '55266.00', 1, 0),
(32, 16, 1, '453', '122', '55266.00', 1, 0),
(33, 17, 1, '453', '122', '55266.00', 1, 0),
(34, 18, 1, '453', '122', '55266.00', 1, 0),
(35, 19, 1, '65461', '122', '7986242.00', 1, 0),
(36, 20, 1, '142', '122', '17324.00', 1, 0),
(37, 21, 1, '142', '122', '17324.00', 1, 0),
(38, 22, 1, '142', '122', '17324.00', 1, 0),
(39, 23, 1, '142', '122', '17324.00', 1, 0),
(40, 24, 1, '142', '122', '17324.00', 1, 0),
(41, 25, 1, '142', '122', '17324.00', 1, 0),
(42, 26, 1, '142', '122', '17324.00', 1, 0),
(43, 27, 2, '1', '320', '320.00', 1, 0),
(44, 28, 2, '1', '320', '320.00', 1, 0),
(45, 29, 2, '1', '320', '320.00', 1, 0),
(46, 30, 2, '1', '320', '320.00', 1, 0),
(47, 31, 2, '1', '320', '320.00', 1, 0),
(48, 32, 2, '1', '320', '320.00', 1, 0),
(49, 33, 2, '1', '320', '320.00', 1, 0),
(50, 34, 2, '1', '320', '320.00', 1, 0),
(51, 35, 2, '1', '320', '320.00', 1, 0),
(52, 36, 2, '1', '320', '320.00', 1, 0),
(53, 37, 1, '1', '122', '122.00', 1, 0),
(54, 38, 1, '1', '122', '122.00', 1, 0),
(55, 39, 1, '1', '122', '122.00', 1, 0),
(56, 40, 1, '1', '122', '122.00', 1, 0),
(57, 41, 1, '1', '122', '122.00', 1, 0),
(58, 42, 1, '1', '122', '122.00', 1, 0),
(59, 43, 1, '1', '122', '122.00', 1, 0),
(60, 44, 1, '1', '122', '122.00', 1, 0),
(61, 45, 1, '1', '122', '122.00', 1, 0),
(62, 46, 1, '1', '122', '122.00', 1, 0),
(63, 47, 1, '1', '122', '122.00', 1, 0),
(64, 48, 1, '1', '122', '122.00', 1, 0),
(65, 49, 1, '1', '122', '122.00', 1, 0),
(66, 50, 1, '1', '122', '122.00', 1, 0),
(67, 51, 1, '1', '122', '122.00', 1, 0),
(68, 52, 1, '1', '122', '122.00', 1, 0),
(69, 53, 1, '1', '122', '122.00', 1, 0),
(70, 54, 1, '1', '122', '122.00', 1, 0),
(71, 55, 1, '1', '122', '122.00', 1, 0),
(72, 56, 1, '1', '122', '122.00', 1, 0),
(73, 57, 1, '1', '122', '122.00', 1, 0),
(74, 58, 1, '1', '122', '122.00', 1, 0),
(75, 59, 1, '1', '122', '122.00', 1, 0),
(76, 60, 1, '52', '122', '6344.00', 1, 0),
(77, 61, 1, '52', '122', '6344.00', 1, 0),
(78, 62, 2, '35', '320', '11200.00', 1, 0),
(79, 63, 18, '1', '242', '242.00', 1, 0),
(80, 63, 15, '1', '3543', '3543.00', 1, 0),
(81, 64, 20, '1', '242', '242.00', 1, 0),
(82, 65, 6, '1', '2452', '2452.00', 1, 0),
(83, 65, 6, '1', '2452', '2452.00', 1, 0),
(84, 65, 17, '1', '54', '54.00', 1, 0),
(85, 66, 11, '24', '25', '600.00', 1, 0),
(86, 67, 11, '1', '25', '25.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`, `companyid`) VALUES
(1, 'test', '../assests/images/stock/16494709285ec3834885aef.jpg', 1, 2, '77', '122', 1, 1, 5437265),
(2, 'Ventilators', '../assests/images/stock/1197853275637ca72b3f534.jpg', 2, 3, '15', '320', 1, 1, 5437265),
(3, 'Cardiopulmonary bypass device', '../assests/images/stock/645109529637d06a1d8869.jpg', 2, 3, '500', '1000', 1, 1, 5437265),
(4, 'Dialysis machine', '../assests/images/stock/2146868497637d06c4a5a2f.PNG', 2, 3, '525', '5425', 1, 1, 5437265),
(5, 'Infusion pumps', '../assests/images/stock/423489205637d06e10d6d5.PNG', 2, 3, '25', '522742', 1, 1, 5437265),
(6, 'LASIK surgical machine', '../assests/images/stock/1821450330637d06fb305d2.jpg', 2, 3, '523', '2452', 1, 1, 5437265),
(7, 'Medical lasers', '../assests/images/stock/666573390637d0712736f5.PNG', 2, 2, '0110', '010', 1, 1, 5437265),
(8, 'Consult 120 Urine Analyzer', '../assests/images/stock/1993732651637d0737bb703.PNG', 2, 2, '65325', '522', 2, 1, 5437265),
(9, 'Urine Reagent Strips 10 Parameter', '../assests/images/stock/1010910236637d07577bfbd.jpg', 2, 3, '528', '525', 1, 1, 5437265),
(10, 'Consult Liquid Urine Control', '../assests/images/stock/103609926637d077d169b1.jpg', 2, 3, '565', '525', 1, 1, 5437265),
(11, 'Plastic urine containers, sterile or unsterile', '../assests/images/stock/26673131637d07949854f.jpg', 2, 3, '510', '25', 1, 1, 5437265),
(12, 'Conical centrifuge tube, 15 ml', '../assests/images/stock/1460722874637d07b9a9abc.jpg', 2, 3, '856', '272', 1, 1, 5437265),
(13, 'Microscope slides and 1 coverslip', '../assests/images/stock/1225456683637d07cef1239.jpg', 2, 3, '5325', '2542', 1, 1, 5437265),
(14, 'Clinical Centrifuge', '../assests/images/stock/2093517130637d07e63ef3c.jpg', 2, 2, '852', '27', 1, 1, 5437265),
(15, 'Flow cytometers', '../assests/images/stock/544922278637d08018dbf1.jpg', 2, 2, '534', '3543', 1, 1, 5437265),
(16, 'Blood gas analyzers', '../assests/images/stock/2122664233637d081513608.jpg', 2, 2, '835', '35', 1, 1, 5437265),
(17, 'Electrolyte analyzers', '../assests/images/stock/1473824670637d083804243.jpg', 2, 3, '241', '54', 1, 1, 5437265),
(18, 'Differential counters', '../assests/images/stock/892866412637d0850bcd7e.jpg', 2, 3, '5323', '242', 1, 1, 5437265),
(19, 'Coagulation analyzers', '../assests/images/stock/296848999637d0866b6ead.jpg', 2, 3, '24', '2542', 1, 1, 5437265),
(20, 'Slide strainers', '../assests/images/stock/1274950678637d087b56854.jpg', 2, 3, '523', '242', 1, 1, 5437265),
(21, 'Magnetic resonance imaging (MRI)', '../assests/images/stock/522669475637d08908a466.jpg', 2, 2, '32423', '242', 1, 1, 5437265);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `companyid`) VALUES
(1, 'b@gmail.com', '214', 'b@gmail.com', 5437265),
(2, 'admin', '1234', 'brianmwe425@gmail.com', 5437265),
(3, 'Mike', '1234', 'm@gmail.com', 5437265),
(4, 'hdhd', '1234', 'hfdhd@gmail.com', 5437265),
(5, 'fafaf', '1234', 'faf@gmail.com', 5437265),
(6, 'hioh', '1234', 'jn@gmail.com', 5437265);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`),
  ADD KEY `product_id` (`productname`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
