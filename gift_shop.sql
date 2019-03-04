-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 06:22 PM
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
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `image`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'upload/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Chines11'),
(11, 'South Indian'),
(12, 'Pav Bhaji'),
(13, 'Punjabi'),
(14, 'Rice'),
(15, 'Roti'),
(16, 'kathiyavadi'),
(17, 'Soup '),
(18, 'lll'),
(19, 'ggg'),
(20, 'rrr'),
(21, 'llll');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `mobile`, `email`, `address`, `created_at`) VALUES
(7, 'Krupal Patel', '+917575889059', 'krupal@gmail.com', 'Gamtalav', '2018-03-28'),
(6, 'Sunil Agrawal', '+919909413561', 'sun.agr86@gmail.com', 'Rayam', '2018-03-28'),
(8, 'Himay Parekh', '+918758555014', 'himay1044@gmail.com', 'Bardoli', '2018-03-29'),
(9, 'Krunal Bhatt', '+919426393061', 'krunal@gmail.com', 'TTTT', '2018-04-02'),
(10, 'Tanvi Chaudhari', '+918758348796', 'tanvi@gmail.com', 'Areth', '2018-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_at`
--

CREATE TABLE `delivered_at` (
  `Id` int(11) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `gift_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `title`, `description`, `price`, `featured`, `image`, `category_id`, `sub_category_id`, `gift_type_id`) VALUES
(12, 'aaa', 'sjdhl', 78, 0, '', 0, 0, 0),
(13, 'kkk', 'iiiii', 23, 0, 'img/50.jpg', 0, 0, 0),
(14, 'kkk', 'hhh', 455, 0, 'img/50.jpg', 0, 0, 0),
(15, 'oioi', 'oioioio', 54, 0, 'img/1.jpg', 0, 0, 0),
(16, 'Fried Rice', 'ddd', 60, 1, 'img/Lighthouse.jpg', 0, 0, 0),
(17, 'Machau soup', 'dd', 50, 1, 'img/Tulips.jpg', 0, 0, 0),
(18, 'Pizza', 'ddd', 34, 1, 'img/2.jpg', 0, 0, 0),
(19, 'Pizza', 'ddd', 34, 1, 'img/21.jpg', 0, 0, 0),
(20, 'Chise burger', 'sss', 444, 1, 'img/4.jpg', 0, 0, 0),
(21, 'ooo', 'oo', 76, 1, 'img/13.jpg', 0, 0, 0),
(22, 'ooo', 'oo', 76, 1, 'img/13.jpg', 0, 0, 0),
(23, 'ooo', 'oo', 76, 0, 'img/16.jpg', 0, 0, 0),
(24, 'ooo', 'oo', 76, 0, 'img/17.jpg', 0, 0, 0),
(26, 'hh', 'hhh', 23, 1, 'upload/image3.jpeg', 0, 0, 0),
(27, '120', 'ggg', 3445, 1, 'upload/image4.jpeg', 0, 0, 0),
(28, 'hh', 'hhh', 12, 1, 'upload/image5.jpeg', 0, 0, 0),
(29, 'nice', 'nice...', 12, 1, 'upload/poc_ui1.png', 0, 0, 0),
(30, 'kk', 'iii', 120, 1, 'upload/image6.jpeg', 0, 0, 0),
(31, 'g', 'g', 34, 1, 'upload/image7.jpeg', 0, 0, 0),
(32, 'er', 'er', 70, 1, 'upload/image8.jpeg', 0, 0, 0),
(33, 'jj', 'ggg', 12, 1, 'upload/image9.jpeg', 0, 0, 0),
(34, 'g', 'g', 23, 1, 'upload/image10.jpeg', 0, 0, 0),
(36, 'kk', 'kkk', 66, 1, 'upload/image12.jpeg', 0, 0, 0),
(37, 'hhh', 'ggg444', 33, 1, 'upload/image13.jpeg', 0, 0, 0),
(38, 'ggg', 'ddd', 34, 1, 'upload/image14.jpeg', 0, 0, 0),
(39, 'ggg', 'fff', 23, 1, 'upload/image15.jpeg', 0, 0, 0),
(40, 'ddd', 'ff', 222, 1, 'upload/image16.jpeg', 0, 0, 0),
(41, 'gg', 'ddd', 44, 1, 'upload/image17.jpeg', 0, 0, 0),
(42, 'ggg', 'fff', 33, 1, 'upload/image18.jpeg', 0, 0, 0),
(43, 'hhh', 'fff', 555, 1, 'upload/image19.jpeg', 0, 0, 0),
(44, 'kkk', 'yyy', 56, 1, 'upload/image20.jpeg', 0, 0, 0),
(45, 'kk', 'kk', 888, 1, 'upload/image21.jpeg', 0, 0, 0),
(46, 'kk', 'kk', 44, 1, 'upload/image22.jpeg', 0, 0, 0),
(47, 'ggg', 'fff', 44, 1, 'upload/image23.jpeg', 0, 0, 0),
(48, 'gg', 'gg', 66, 0, 'upload/image26.jpeg', 0, 0, 0),
(49, 'ggg', 'ddd', 23, 0, 'upload/image27.jpeg', 0, 0, 0),
(50, 'gggd', 'sdfdfdsf', 120, 0, '', 0, 0, 0),
(51, 'gggd778', 'sdfdfdsf', 120, 0, '', 0, 0, 0),
(52, 'gggd12', 'sdfdfdsf', 120, 0, '', 0, 0, 0),
(53, 'hihi', 'fff', 123, 1, 'upload/WIN_20180829_19_06_46_Pro.jpg', 0, 0, 0),
(54, 'hh', 'hhh', 222, 1, 'upload/image2.jpeg', 2, 2, 1);

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
(104, 12, 'upload/gallery/WIN_20180829_19_07_54_Pro1.jpg'),
(103, 12, 'upload/gallery/WIN_20180829_19_06_46_Pro1.jpg'),
(102, 26, 'upload/gallery/WIN_20180829_22_06_16_Pro.jpg'),
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
(119, 12, 'upload/gallery/WIN_20180829_19_07_59_Pro1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gift_type`
--

CREATE TABLE `gift_type` (
  `gift_type_id` int(11) NOT NULL,
  `gift_type_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_type`
--

INSERT INTO `gift_type` (`gift_type_id`, `gift_type_name`, `category_id`, `sub_category_id`) VALUES
(1, 'ooo1118882366', 0, 2),
(2, 'test1', 0, 2),
(3, 'hhh', 2, 2),
(4, 'yyy', 2, 2),
(5, 'uuuu', 2, 2),
(10, 'yu', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(3) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(2, 'Manchurian1', 2),
(3, 'nudals', 2),
(4, 'Dosa', 11),
(10, 'dry manchuian', 2),
(9, 'fried rice', 2),
(11, 'Chees Dosa', 11),
(12, 'chess angara', 13),
(13, 'paner tufani', 13),
(14, 'Idli', 11),
(15, 'Soup', 2),
(16, 'ioio', 11),
(17, 'rtrt', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered_at`
--
ALTER TABLE `delivered_at`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `gift_gallery`
--
ALTER TABLE `gift_gallery`
  ADD PRIMARY KEY (`gift_gallery_id`);

--
-- Indexes for table `gift_type`
--
ALTER TABLE `gift_type`
  ADD PRIMARY KEY (`gift_type_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `delivered_at`
--
ALTER TABLE `delivered_at`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `gift_gallery`
--
ALTER TABLE `gift_gallery`
  MODIFY `gift_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `gift_type`
--
ALTER TABLE `gift_type`
  MODIFY `gift_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
