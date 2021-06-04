-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2020 at 08:52 PM
-- Server version: 5.7.32-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nongdxye_demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES
(26, 23, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340102, 1607340102),
(27, 23, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340102, 1607340102),
(28, 25, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340183, 1607340183),
(29, 25, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340183, 1607340183),
(30, 26, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340194, 1607340194),
(31, 26, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340194, 1607340194),
(34, 28, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340216, 1607340216),
(35, 28, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340216, 1607340216),
(36, 29, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340234, 1607340234),
(37, 29, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340234, 1607340234),
(40, 31, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340264, 1607340264),
(41, 31, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340264, 1607340264),
(42, 32, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340280, 1607340280),
(43, 32, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340280, 1607340280),
(44, 33, 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 1607340288, 1607340288),
(45, 33, 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 1607340288, 1607340288);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `position`, `created_time`, `last_updated`) VALUES
(4, 0, 'Level 1', 'home2.php', 0, 1555232698, 1555232698),
(5, 4, 'Level 2', 'product.php', 1, 1555232976, 1555232976),
(6, 5, 'Level 3', 'product.php', 0, 1555232976, 1555232976),
(7, 6, 'Level 4', 'home.php', 0, 1555232976, 1555232976),
(8, 4, 'Level 2.2', 'product.php', 2, 1555232976, 1555232976),
(9, 8, 'Level 3.2', 'product.php', 1, 1555427808, 1555427808),
(10, 7, 'Level 5', 'home.php', 0, 1555427808, 1555427808),
(20, 17, 'Level 7', '#', 1, 1555542591, 1555542591),
(21, 16, 'Level 2.2.2', 'home2.php', 1, 1555232698, 1555232698),
(17, 10, 'Level 6', '#', 1, 1555542591, 1555542591),
(16, 0, 'Level 1.2', 'home2.php', 1, 1555232698, 1555232698);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES
(29, 'Andn', '0654654615', 'Ha Noi', 'Ghi chu', 8290000, 1587872426, 1587872426),
(30, 'Gìày Thể Thao Nike', '12313', '3123313', '12313', 1080000, 1607338817, 1607338817),
(31, 'Gìày Thể Thao Nike', '12313', '123', '123', 900000, 1607345116, 1607345116);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES
(23, 31, 23, 1, 300000, 1607345116, 1607345116),
(24, 31, 25, 2, 300000, 1607345116, 1607345116);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `content` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `content`, `created_time`, `last_updated`) VALUES
(23, 'shose 9', 'uploads/07-12-2020/127061255_3052783518155732_7933064807345995693_n(1).jpg', 300000, '<p>Shose post basic</p>\r\n', 1607340102, 1607341271),
(25, 'shose 8', 'uploads/07-12-2020/130187720_3078350108932406_6822030997609811961_n.jpg', 300000, '<p>Shose post nữ đen</p>\r\n', 1607340183, 1607341257),
(26, 'shose 7', 'uploads/07-12-2020/122743308_2970239613076790_5210999013071598023_o.jpg', 250000, '<p>Shose đen basic style</p>\r\n', 1607340194, 1607341246),
(28, 'shose 6', 'uploads/07-12-2020/120706218_2904746379626114_2597834351969622523_o.jpg', 250000, '<p>Shose đen basic s&iacute;ch</p>\r\n', 1607340216, 1607341236),
(29, 'shose 5', 'uploads/07-12-2020/113003773_2724245827676171_6705156748532116331_o(1).png', 250000, '<p>Shose n&acirc;u basic</p>\r\n', 1607340234, 1607341223),
(31, 'shose 4', 'uploads/07-12-2020/120200133_2893737887393630_2566763553046748764_o(1).jpg', 250000, '<p>Shose đen basic b&oacute;ng</p>\r\n', 1607340264, 1607341211),
(32, 'shose 3', 'uploads/07-12-2020/124452280_3019060458194705_2364110829846060618_o.jpg', 250000, '<p>Shose đen basic</p>\r\n', 1607340280, 1607341202),
(33, 'shose 2', 'uploads/07-12-2020/129980283_3076242205809863_3424462575230690638_o(1).jpg', 250000, '<p>Shose đen nữ basic</p>\r\n', 1607340288, 1607341194);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `birthday`, `created_time`, `last_updated`) VALUES
(1, 'admin', 'Andn', '25d55ad283aa400af464c76d713c07ad', 123, 123, 1553185530);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
