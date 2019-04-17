-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 10:43 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `menu_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `menu_id`) VALUES
(32, 'Cakes1', 30),
(31, 'Cakes', 30),
(30, 'Flower', 30),
(27, 'ggg', 25),
(25, '23232311', 26),
(24, 'fff', 23),
(23, 'qq', 24),
(20, 'eee1230', 26),
(19, 'ttt1', 25),
(22, 'ggg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `pincode`, `mobile`, `email`, `password`, `created_at`) VALUES
(1, 'sunil agrawal1', 'rayam', '394355', '9909', 'sunil@gmail.com', '123', '2019-03-17'),
(2, 'Sunil Agrawal', 'Rayam', '394355', '9909413561', 'sunil@gmail.com1', 'admin', '2019-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `deliverable_pincode`
--

CREATE TABLE `deliverable_pincode` (
  `pincode_id` int(11) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverable_pincode`
--

INSERT INTO `deliverable_pincode` (`pincode_id`, `pincode`) VALUES
(1, 394355),
(3, 394601),
(4, 394160),
(6, 394356);

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `title`, `description`, `price`, `gst`, `featured`, `image`) VALUES
(63, 'Title1', 'dd', 120, 3, 1, 'upload/banner-02.jpg'),
(64, 'Title2', 'ddd', 12, 2, 0, 'upload/1-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gift_category`
--

CREATE TABLE `gift_category` (
  `gift_category_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_category`
--

INSERT INTO `gift_category` (`gift_category_id`, `gift_id`, `menu_id`, `category_id`, `sub_category_id`) VALUES
(26, 57, 26, 22, 13),
(25, 57, 26, 20, 12),
(24, 57, 26, 25, 15),
(23, 57, 26, 25, 16);

-- --------------------------------------------------------

--
-- Table structure for table `gift_gallery`
--

CREATE TABLE `gift_gallery` (
  `gift_gallery_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_gallery`
--

INSERT INTO `gift_gallery` (`gift_gallery_id`, `gift_id`, `image`) VALUES
(104, 57, 'upload/gallery/WIN_20180829_19_07_54_Pro1.jpg'),
(103, 57, 'upload/gallery/WIN_20180829_19_06_46_Pro1.jpg'),
(102, 57, 'upload/gallery/WIN_20180829_22_06_16_Pro.jpg'),
(101, 26, 'upload/gallery/WIN_20180829_19_26_10_Pro.jpg'),
(100, 26, 'upload/gallery/WIN_20180829_19_26_09_Pro.jpg'),
(99, 26, 'upload/gallery/WIN_20180829_19_24_26_Pro.jpg'),
(98, 26, 'upload/gallery/WIN_20180829_19_07_58_Pro.jpg'),
(97, 26, 'upload/gallery/WIN_20180829_19_07_54_Pro.jpg'),
(96, 26, 'upload/gallery/WIN_20180829_19_06_46_Pro.jpg'),
(105, 12, 'upload/gallery/WIN_20180829_19_07_58_Pro1.jpg'),
(106, 12, 'upload/gallery/WIN_20180829_19_07_59_Pro.jpg'),
(107, 12, 'upload/gallery/WIN_20180829_19_08_50_Pro.jpg'),
(108, 12, 'upload/gallery/WIN_20180829_19_08_57_Pro.jpg'),
(109, 12, 'upload/gallery/WIN_20180829_19_08_58_Pro_(2).jpg'),
(110, 12, 'upload/gallery/WIN_20180829_19_08_58_Pro_(3).jpg'),
(111, 12, 'upload/gallery/WIN_20180829_19_08_58_Pro.jpg'),
(112, 12, 'upload/gallery/WIN_20180829_19_08_59_Pro.jpg'),
(113, 12, 'upload/gallery/WIN_20180829_19_10_25_Pro_(2).jpg'),
(114, 12, 'upload/gallery/WIN_20180829_19_10_25_Pro.jpg'),
(115, 12, 'upload/gallery/WIN_20180829_19_11_12_Pro.jpg'),
(116, 12, 'upload/gallery/WIN_20180829_19_11_22_Pro.jpg'),
(117, 12, 'upload/gallery/WIN_20180829_19_07_54_Pro2.jpg'),
(118, 12, 'upload/gallery/WIN_20180829_19_07_58_Pro2.jpg'),
(119, 12, 'upload/gallery/WIN_20180829_19_07_59_Pro1.jpg'),
(120, 13, 'upload/gallery/WIN_20180829_22_06_44_Pro_(3).jpg'),
(121, 13, 'upload/gallery/WIN_20180829_22_06_44_Pro_(4).jpg'),
(122, 13, 'upload/gallery/WIN_20180829_22_06_44_Pro.jpg'),
(123, 13, 'upload/gallery/WIN_20180830_19_30_25_Pro.jpg'),
(124, 13, 'upload/gallery/WIN_20180830_19_30_27_Pro.jpg'),
(125, 13, 'upload/gallery/WIN_20180830_19_31_05_Pro.jpg'),
(126, 13, 'upload/gallery/WIN_20180830_19_31_46_Pro.jpg'),
(127, 13, 'upload/gallery/WIN_20180830_19_31_47_Pro_(2).jpg'),
(128, 13, 'upload/gallery/WIN_20180830_19_31_47_Pro.jpg'),
(129, 13, 'upload/gallery/WIN_20180830_19_31_48_Pro.jpg'),
(130, 13, 'upload/gallery/WIN_20180830_20_05_22_Pro.jpg'),
(131, 13, 'upload/gallery/WIN_20180830_20_05_23_Pro.jpg'),
(132, 13, 'upload/gallery/WIN_20180830_20_05_24_Pro_(2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(2) NOT NULL,
  `menu_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(31, 'Birthdate1'),
(30, 'Birthdate'),
(26, 'menu4'),
(25, 'menu3'),
(24, 'menu2'),
(23, 'menu1');

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `order_id` varchar(30) NOT NULL,
  `billing_name` varchar(100) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_email` varchar(100) NOT NULL,
  `billing_mobile` varchar(10) NOT NULL,
  `billing_pincode` varchar(6) NOT NULL,
  `shipping_name` varchar(100) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_mobile` varchar(10) NOT NULL,
  `shipping_pincode` varchar(6) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gross_amount` float NOT NULL,
  `total_shipping_charge` float NOT NULL,
  `total_gst_amount` float NOT NULL,
  `net_amount` float NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `delivered` tinyint(4) NOT NULL DEFAULT '0',
  `mid` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `transaction_amount` varchar(10) NOT NULL,
  `payment_mode` varchar(10) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_status` varchar(20) DEFAULT NULL,
  `response_code` varchar(10) DEFAULT NULL,
  `response_message` text,
  `gateway_name` varchar(50) DEFAULT NULL,
  `bank_transaction_id` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_`
--

INSERT INTO `order_` (`order_id`, `billing_name`, `billing_address`, `billing_email`, `billing_mobile`, `billing_pincode`, `shipping_name`, `shipping_address`, `shipping_email`, `shipping_mobile`, `shipping_pincode`, `customer_id`, `gross_amount`, `total_shipping_charge`, `total_gst_amount`, `net_amount`, `order_date`, `order_status`, `delivered`, `mid`, `transaction_id`, `transaction_amount`, `payment_mode`, `currency`, `transaction_date`, `transaction_status`, `response_code`, `response_message`, `gateway_name`, `bank_transaction_id`, `bank_name`) VALUES
('1555242984', 'Sunil Agrawal', 'Rayam', 'sunil@gmail.com1', '9909413561', '394355', 'Sunil Agrawal', 'Rayam', 'sunil@gmail.com1', '9909413561', '394355', 2, 120, 12, 3.6, 135.6, '2019-04-14 11:56:24', 'confirmed', 1, 'gCGPpL92655720186375', '20190414111212800110168199500414416', '135.60', 'DC', 'INR', '2019-04-14 17:26:24', 'TXN_SUCCESS', '01', 'Txn Success', 'HDFC', '4036217121962950', 'JPMORGAN CHASE BANK'),
('1553502661', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 1, 1065, 109, 4.62, 1178.62, '2019-03-25 08:31:01', 'confirmed', 0, 'gCGPpL92655720186375', '20190325111212800110168220300358656', '1178.62', 'DC', 'INR', '2019-03-25 14:01:12', 'TXN_SUCCESS', '01', 'Txn Success', 'HDFC', '4036217121962950', 'BOB');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_name` varchar(100) NOT NULL,
  `gift_price` float NOT NULL,
  `gift_quantity` int(11) NOT NULL,
  `shipping_charge` float NOT NULL,
  `gst_rate` float NOT NULL,
  `gst_amount` float NOT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `gift_id`, `gift_name`, `gift_price`, `gift_quantity`, `shipping_charge`, `gst_rate`, `gst_amount`, `amount`) VALUES
(1, '1553502661', 57, 'Gift2', 33, 2, 64, 7, 4.62, 134.62),
(2, '1553502661', 61, 'gg', 555, 1, 45, 0, 0, 600),
(3, '1553502661', 60, 'hh', 444, 1, 0, 0, 0, 444),
(4, '1555242984', 63, 'Title1', 120, 1, 12, 3, 3.6, 135.6);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_old`
--

CREATE TABLE `order_detail_old` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_name` varchar(100) NOT NULL,
  `gift_price` float NOT NULL,
  `gift_quantity` int(11) NOT NULL,
  `shipping_charge` float NOT NULL,
  `gst_rate` float NOT NULL,
  `gst_amount` float NOT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail_old`
--

INSERT INTO `order_detail_old` (`order_detail_id`, `order_id`, `gift_id`, `gift_name`, `gift_price`, `gift_quantity`, `shipping_charge`, `gst_rate`, `gst_amount`, `amount`) VALUES
(54, '1552912551', 61, 'gg', 555, 1, 45, 0, 0, 600),
(53, '1552912551', 57, 'Gift2', 33, 1, 32, 7, 2.31, 67.31),
(52, '1552912413', 59, 'ggg', 333, 1, 0, 0, 0, 333),
(51, '1552912413', 60, 'hh', 444, 2, 0, 0, 0, 888),
(50, '1552912413', 61, 'gg', 555, 1, 45, 0, 0, 600),
(49, '1552912413', 57, 'Gift2', 33, 1, 32, 7, 2.31, 67.31),
(55, '1552912551', 60, 'hh', 444, 2, 0, 0, 0, 888),
(56, '1552912551', 59, 'ggg', 333, 1, 0, 0, 0, 333),
(57, '1552912560', 57, 'Gift2', 33, 1, 32, 7, 2.31, 67.31),
(58, '1552912560', 61, 'gg', 555, 1, 45, 0, 0, 600),
(59, '1552912560', 60, 'hh', 444, 2, 0, 0, 0, 888),
(60, '1552912560', 59, 'ggg', 333, 1, 0, 0, 0, 333);

-- --------------------------------------------------------

--
-- Table structure for table `order_old`
--

CREATE TABLE `order_old` (
  `order_id` varchar(20) NOT NULL,
  `billing_name` varchar(100) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_email` varchar(100) NOT NULL,
  `billing_mobile` varchar(10) NOT NULL,
  `billing_pincode` varchar(6) NOT NULL,
  `shipping_name` varchar(100) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_mobile` varchar(10) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_pincode` varchar(6) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gross_amount` float NOT NULL,
  `total_shipping_charge` float NOT NULL,
  `total_gst_amount` float NOT NULL,
  `net_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 - confirmed, 2 - cancelled',
  `delivered` tinyint(1) NOT NULL COMMENT '0 - no, 1 - yes',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_old`
--

INSERT INTO `order_old` (`order_id`, `billing_name`, `billing_address`, `billing_email`, `billing_mobile`, `billing_pincode`, `shipping_name`, `shipping_address`, `shipping_mobile`, `shipping_email`, `shipping_pincode`, `customer_id`, `gross_amount`, `total_shipping_charge`, `total_gst_amount`, `net_amount`, `status`, `delivered`, `order_date`) VALUES
('1552912413', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 'sunil agrawal', 'rayam', '9909', 'sunil@gmail.com', '394355', 1, 1809, 77, 2.31, 1888.31, 1, 0, '2019-03-18 07:03:33'),
('1552912372', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 'sunil agrawal', 'rayam', '9909', 'sunil@gmail.com', '394355', 1, 1809, 77, 2.31, 1888.31, 1, 0, '2019-03-18 07:02:52'),
('1552912551', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 'sunil agrawal', 'rayam', '9909', 'sunil@gmail.com', '394355', 1, 1809, 77, 2.31, 1888.31, 1, 0, '2019-03-18 07:05:51'),
('1552912560', 'sunil agrawal', 'rayam', 'sunil@gmail.com', '9909', '394355', 'sunil agrawal', 'rayam', '9909', 'sunil@gmail.com', '394355', 1, 1809, 77, 2.31, 1888.31, 1, 0, '2019-03-18 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `order_status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_id`, `description`, `order_status_date`) VALUES
(1, '1553502661', 'hh', '2019-03-25 05:43:36'),
(2, '1553502661', 'hh', '2019-03-25 05:43:36'),
(3, '1553502661', 'kkk', '2019-03-25 05:44:23'),
(4, '1553502661', 'ii', '2019-03-25 05:45:05'),
(5, '1555242984', 'k', '2019-04-14 06:30:40'),
(6, '1555242984', 'kk', '2019-04-14 06:30:45'),
(7, '1555242984', 'l', '2019-04-14 06:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_old`
--

CREATE TABLE `order_status_old` (
  `order_status_id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `order_status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `shipping_charge_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `gift_id` double NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`shipping_charge_id`, `pincode`, `gift_id`, `rate`) VALUES
(1, 394350, 2, 40),
(2, 394601, 2, 23),
(5, 394355, 57, 32),
(4, 394601, 57, 21),
(6, 394160, 57, 21),
(7, 394355, 61, 45),
(9, 394355, 63, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`, `menu_id`) VALUES
(17, 'qqq11', 25, 26),
(16, 'qqq', 25, 26),
(15, 'eee', 25, 26),
(13, '44411', 22, 26),
(12, 'uuu', 20, 26),
(18, 'Birthday flower', 30, 30),
(19, 'Premium FLower', 30, 30),
(20, 'test3', 31, 30),
(21, 'test1', 31, 30),
(22, 'test', 32, 30),
(24, 'test2', 31, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deliverable_pincode`
--
ALTER TABLE `deliverable_pincode`
  ADD PRIMARY KEY (`pincode_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `gift_category`
--
ALTER TABLE `gift_category`
  ADD PRIMARY KEY (`gift_category_id`);

--
-- Indexes for table `gift_gallery`
--
ALTER TABLE `gift_gallery`
  ADD PRIMARY KEY (`gift_gallery_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `order_detail_old`
--
ALTER TABLE `order_detail_old`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `order_old`
--
ALTER TABLE `order_old`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `order_status_old`
--
ALTER TABLE `order_status_old`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`shipping_charge_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deliverable_pincode`
--
ALTER TABLE `deliverable_pincode`
  MODIFY `pincode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `gift_category`
--
ALTER TABLE `gift_category`
  MODIFY `gift_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `gift_gallery`
--
ALTER TABLE `gift_gallery`
  MODIFY `gift_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_detail_old`
--
ALTER TABLE `order_detail_old`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_status_old`
--
ALTER TABLE `order_status_old`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `shipping_charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
