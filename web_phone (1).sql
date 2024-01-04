-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 09:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_user`, `fullname`, `email`, `username`, `password`, `role`) VALUES
(19, 'ThayHungDepTrai', 'user@gmail.com', 'user1', '$2y$10$wISyv/bHoJVnY99Z7NuJQ.2ZieNhh6p0T6P3T/ZhJAL20rSSgc2n.', 0),
(20, 'thang', 'thang1@gmail.com', 'thang', '$2y$10$2ioB25MWNWB9.Louz7GnquIo9tSdRQiPl4pPP2DkACpmZ/9Axd77O', 0),
(15, 'dsdsd', 'dsds@rmail.com', '123', '$2y$10$WA793yYRWoyHcJY6maz5fuF.1jj4LigTde49ZXtOZ0sFzb/bMFmp6', 0),
(17, 'User', 'asd@gmail.com', 'user', '$2y$10$Ty56v3uZWSsJHZg6tybSeuwCzbXw91mjl4AS3IebTaqGb7D3XUDmu', 0),
(18, 'ADMIN', 'admin@gmail.com', 'admin', '$2y$10$2dWKMMASxy3pguD75EPha.1bs/YVc.fHDF9VH4FiuPOVNJeeyRjqW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `namecategory` varchar(100) NOT NULL,
  `serial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `namecategory`, `serial`) VALUES
(1, 'samsung', 0),
(3, 'oppo', 0),
(4, 'iphone', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `nameproduct` varchar(250) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `priceproduct` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text NOT NULL,
  `summary` tinytext NOT NULL,
  `picture` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `nameproduct`, `productcode`, `priceproduct`, `quantity`, `content`, `summary`, `picture`, `status`, `id_category`) VALUES
(2, 'Samsung Galaxy S23 Ultra 256GB', '', '22890000', 0, 'Kích thước màn hình 6.8 inches RAM 8DB Bộ nhớ 256GB', 'Dòng Samsung cao cấp', '1704355632_slide-s23.png', 1, 1),
(3, 'Samsung Galaxy Z Fold5 12GB 256GB', '', '33990000', 0, 'Kích thước màn hình\r\n6.7 inches\r\nRAM 12GB\r\nBộ nhớ \r\n256GB', 'Dòng Samsung cao cấp', '1704355499_samsung-z-fold-5.png', 1, 1),
(4, 'Samsung Galaxy S22 Ultra (12GB - 256GB)', '', '175500000', 0, 'Kích thước màn hình\r\n6.8 inches\r\nRAM 12GB\r\nBộ nhớ\r\n256GB', 'Dòng Samsung cao cấp', '1704355591_samsung-s22.png', 1, 1),
(5, 'Samsung Galaxy A54 5G 8GB 128GB', '', '8790000', 0, 'Kích thước màn hình\r\n6.6 inches\r\nRAM\r\n8DB\r\nBộ nhớ \r\n256GB', 'Dòng Samsung phổ thông', '1704355749_samsung-galaxy-a54.png', 1, 1),
(6, 'Samsung Galaxy A23 5G', '', '4650000', 0, 'Kích thước màn hình\r\n6.6 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n128GB', '	Dòng Samsung phổ thông', '1704355817_ss-a23.png', 1, 1),
(7, 'iPhone 15 Pro Max 256GB', '', '32990000', 0, 'Kích thước màn hình\r\n6.7 inches\r\nRAM 8GB\r\nBộ nhớ\r\n256GB', 'Dòng Iphone cao cấp', '1704355895_iphone-15px.png', 1, 4),
(8, 'iPhone 13 128GB', '', '21890000', 0, 'Kích thước màn hình\r\n6.1 inches\r\nRAM 8GB\r\nBộ nhớ \r\n256GB', 'Dòng Iphone cao cấp', '1704355969_ip13.png', 1, 4),
(9, 'iPhone 14 Pro Max 128GB', '', '25190000', 0, 'Kích thước màn hình\r\n6.7 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n128GB', 'Dòng Iphone cao cấp', '1704356029_ip14pm.png', 1, 4),
(10, 'iPhone 12 Pro Max 128GB', '', '23490000', 0, 'Kích thước màn hình\r\n6.7 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n128GB', 'Dòng Iphone cao cấp', '1704356100_ip12.png', 1, 4),
(11, 'iPhone 11 64GB', '', '10690000', 0, 'Kích thước màn hình\r\n6.1 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n64GB', 'Dòng Iphone phổ thông', '1704356179_ip11.png', 1, 4),
(12, 'OPPO Find N3 16GB 512GB', '', '44990000', 0, 'Kích thước màn hình\r\n7.82 inches\r\nRAM\r\n16GB\r\nBộ nhớ\r\n512GB', 'Dòng  Oppo cao cấp', '1704356258_find-n3-flip.png', 1, 3),
(13, 'OPPO Reno10 5G 8GB 256GB', '', '9990000', 0, 'Kích thước màn hình\r\n6.7 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n256GB', 'Dòng Oppo phổ thông	', '1704356321_oppo-reno5.png', 1, 3),
(14, ' OPPO Find N2 Flip', '', '16990000', 0, 'ích thước màn hình 6.8 inches RAM 8GB Bộ nhớ 128GB', 'Dòng Oppo cao cấp', '1704356491_oppo-find-n2-flip.png', 1, 3),
(15, 'OPPO A77s', '', '5190000', 0, 'Kích thước màn hình\r\n6.56 inches\r\nRAM\r\n8GB\r\nBộ nhớ\r\n128GB', 'Dòng Oppo phổ thông', '1704356416_oppo-a77s-png.webp', 1, 3),
(16, 'OPPO Reno8 T 4G 256GB', '', '6690000', 0, 'Kích thước màn hình\r\n6.4 inches\r\nRAM\r\n89GB\r\nBộ nhớ\r\n128GB', 'Dòng Oppo phổ thông', '1704356462_oppo-reno-8t-4g.png', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `lk_product_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `lk_product_category` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
