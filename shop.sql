-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 05:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `bid` int(5) NOT NULL,
  `bname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `bname`) VALUES
(14, 'Aarong Dairy'),
(12, 'ACI'),
(17, 'Akij Food and Beverage Ltd.'),
(15, 'Dabur'),
(13, 'Fresh'),
(10, 'ISPAHANI'),
(6, 'Kinder'),
(5, 'Local'),
(1, 'Lux'),
(9, 'Others'),
(7, 'PRAN Foods Ltd.'),
(11, 'Radhuni'),
(16, 'Rupchanda'),
(2, 'Walton'),
(8, 'Zinix');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(5) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cimage`) VALUES
(7, 'Vagetables', '1.jpg'),
(8, 'Fruits', '2.jpg'),
(9, 'Meat', '3.jpg'),
(10, 'Fish', '4.jpg'),
(11, 'Egg', '5.jpg'),
(12, 'Juice', '6.jpg'),
(14, 'Toys', ''),
(16, 'Soups', ''),
(19, 'Stationery', ''),
(21, 'Oil', ''),
(178, 'Chocolate', ''),
(179, 'Rice', ''),
(181, 'Mineral Water', ''),
(182, 'Soft Drinks', ''),
(183, 'Tea & Coffee', ''),
(184, 'Biscuits & Cakes', ''),
(185, 'Milk', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cu_id` int(5) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `fr_uid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `joindate` varchar(15) NOT NULL,
  `salary` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `f_uid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `email`, `contact`, `dob`, `gender`, `joindate`, `salary`, `address`, `f_uid`) VALUES
(2, 'pias@gmail.com', '019565', '0198-04-12', 'male', '2021-04-14', '50000', 'haluaghat', 9),
(3, 'arpon@gmail.com', '0195059923', '2020-12-28', 'male', '2021-04-21', '60000', 'Mymensingh ', 10),
(4, 'jesmin@gmail.com', '019565496', '0198-04-11', 'female', '2021-04-28', '500000', 'Dhaka', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pcategory` varchar(20) NOT NULL,
  `pbrand` varchar(20) NOT NULL,
  `pquantity` varchar(15) NOT NULL,
  `uprice` int(10) NOT NULL,
  `ucost` int(10) NOT NULL,
  `pstock` int(10) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `prate` varchar(5) NOT NULL,
  `pdetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pcategory`, `pbrand`, `pquantity`, `uprice`, `ucost`, `pstock`, `pimage`, `prate`, `pdetails`) VALUES
(1, 'Orange (Malta)', 'Fruits', 'Local', 'Per Kg.', 150, 120, 20, '1_Orange (Malta).jpg', '', 'Best quality fruits.'),
(2, 'Kinder Joy', 'Chocolate', 'Kinder', '20gm', 65, 75, 50, '2_Kinder Joy.jpg', '', 'Nice Chocolate'),
(3, 'Pran Lassi', 'Juice', 'Pran', '200 ml', 20, 16, 40, '3_Pran Lassi.jpg', '', 'Pran Lassi 200 Ml Tetra Pack'),
(4, 'Pran Mango Fruit Drink', 'Juice', 'Pran', '250 ml', 20, 16, 80, '4_Pran Mango Fruit Drink.jpg', '', 'Pran Mango Fruit Drink Tetra 250ml'),
(5, 'Zinix Check Correct Calculator', 'Stationery', 'Zinix', '1 piece', 300, 240, 6, '5_Zinix Check Correct Calculator.jpg', '', 'Zinix Check Correct Calculator 112 CL357'),
(36, 'Broiler Chicken Breast', 'Meat', 'Local', '1 Kg', 430, 380, 10, 'Broiler Chicken Breast_60842e4097836.jpg', '', 'Broiler Chicken Breast Boneless (Kg)* 1 Kg\r\n1 Ratings | 1 Reviews | Write Review\r\nBrand : n/a\r\nper kg (final cost based on weight)'),
(37, 'Premium Miniket Rice ', 'Rice', 'Local', '1 Kg', 66, 55, 50, 'Premium Miniket Rice _60842eb1c14c4.jpg', '', 'Shwapno Premium Miniket Rice (Kg) 1 Kg\r\n16 Ratings | 8 Reviews | Write Review\r\nBrand : Shwapno\r\nper kg'),
(38, 'Teer Soyabean Oil', 'Oil', 'Others', '5Ltr', 660, 600, 60, 'Teer Soyabean Oil_60842ef6ddd86.jpg', '', 'Teer Soyabean Oil 5Ltr\r\n10 Ratings | 4 Reviews | Write Review\r\nBrand : Teer\r\n5 ltr'),
(39, 'Gura Chingri Captured', 'Fish', 'Local', '1 Kg', 450, 400, 10, 'Gura Chingri Captured_60842f5c09b45.jpg', '', 'Gura Chingri Captured (P) 1 Kg\r\nBe the first to write the review | Write Review\r\nBrand : n/a\r\nper kg (final cost based on weight)'),
(40, 'Lemon (Kagzi)', 'Vagetables', 'Local', '1 piece', 8, 6, 200, 'Lemon (Kagzi)_60842fcd22462.jpg', '', 'Lemon (Kagzi) PCS\r\nBe the first to write the review | Write Review\r\nBrand : n/a\r\nper piece'),
(41, 'Sweet Potato (Mishty Aloo)', 'Vagetables', 'Local', '1 Kg', 55, 48, 40, 'Sweet Potato (Mishty Aloo)_60843011689fd.jpg', '', 'Sweet Potato (Mishty Aloo) Kg* 1 Kg\r\nBe the first to write the review | Write Review\r\nBrand : n/a\r\nPer Kg (final cost based on weight)'),
(42, 'Carrot (Gajor)', 'Vagetables', 'Local', '1 Kg', 35, 30, 20, 'Carrot (Gajor)_6084304c888f5.jpg', '', 'Carrot (Gajor) Local* 1 Kg\r\n1 Ratings | 1 Reviews | Write Review\r\nBrand : Other\r\nper kg (final cost based on weight)\r\n\r\n৳35\r\n'),
(43, 'Green Grapes', 'Fruits', 'Local', '1 Kg', 280, 220, 20, 'Green Grapes_608430a881c76.jpg', '', 'Green Grapes (Angur Sobuj) Kg* 1 Kg\r\nBe the first to write the review | Write Review\r\nBrand : Other\r\nper kg'),
(44, 'Pineapple(Ananrosh)', 'Fruits', 'Local', '800gm (Promo)', 60, 48, 20, 'Pineapple(Ananrosh)_608430d5c101b.jpg', '', 'Pineapple(Ananrosh) 800gm (Promo)*\r\nBe the first to write the review | Write Review\r\nBrand : Other\r\nper piece (800 gm approx)\r\n\r\n৳ 60\r\n'),
(45, 'Apple Golden Delicious', 'Fruits', 'Local', '1 Kg', 225, 205, 20, 'Apple Golden Delicious_6084310dc6810.jpg', '', 'Apple Golden Delicious (Green Apple)Kg(E-Com) 1 Kg\r\nBe the first to write the review | Write Review\r\nBrand : Other\r\nper kg (final cost based on weight)'),
(46, 'Nutrilife Apple Fruit', 'Juice', 'Fresh', '1 Ltr.', 250, 210, 50, 'Nutrilife Apple Fruit_608431bfcfe57.jpg', '', 'Nutrilife Apple Fruit Magic 1 Ltr.*\r\nBe the first to write the review | Write Review\r\nBrand : n/a\r\n1 Ltr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT 'unknown',
  `username` varchar(25) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `username`, `pass`, `type`) VALUES
(1, 'fahim', 'fahimfaisal1998@gmail.com', 'fahim123', 'admin'),
(2, 'Shuvo', 'shuvo@gmail.com', '123456', 'customer'),
(4, 'Faisal', 'customer', '123456', 'customer'),
(5, 'Jhon', 'salesperson', '123456', 'salesperson'),
(6, 'Broen', 'admin', '123456', 'admin'),
(7, 'Armstrong', 'manager', '123456', 'manager'),
(8, 'Jhalak Sarker', 'jahala', '123456', 'salesperson'),
(9, 'Pias Sarker', 'pias', '123456', 'salesperson'),
(10, 'Arpan Sarker', 'arpan', '123456', 'salesperson'),
(11, 'Jesmin jesi', 'jesmin', '123456', 'salesperson');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bname` (`bname`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_id`),
  ADD KEY `profile_info_uid` (`fr_uid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `user_f` (`f_uid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `profile_info_uid` FOREIGN KEY (`fr_uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `user_f` FOREIGN KEY (`f_uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
