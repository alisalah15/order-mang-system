-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 09:58 AM
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
-- Database: `product_mang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'ali', 'ali', 'ali@admin.com', 'aliali'),
(2, 'ali', 'admin1', 'admin@gmail.com', '123'),
(3, 'ali', 'admin', 'admin@admin.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE `categ` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categ`
--

INSERT INTO `categ` (`id`, `user_id`, `name`, `created_at`) VALUES
(3, 7, 'Crep', '2023-04-12 16:14:01'),
(12, 8, 'Fteer rr', '2023-04-13 22:11:09'),
(13, 6, 'كريب', '2023-04-13 22:15:04'),
(14, 6, 'فطير', '2023-04-14 11:18:05'),
(15, 13, 'Crep', '2023-04-20 11:27:16'),
(16, 13, 'Pizza', '2023-04-20 11:27:41'),
(17, 10, 'Sand', '2023-04-20 12:19:06'),
(18, 8, 'Fter', '2023-04-20 13:26:51'),
(19, 16, 'فطير مشلتت', '2023-04-21 20:14:33'),
(21, 19, 'كحك', '2023-04-22 20:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `seller_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cust_msg` varchar(250) NOT NULL,
  `seller_msg` int(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `seller_id`, `product_id`, `quantity`, `price`, `status`, `cust_msg`, `seller_msg`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 45, 2, '0.00', 'accepted', '', 0, '2023-04-20 13:00:13', '2023-04-20 13:49:35'),
(2, 6, 10, 44, 6, '0.00', 'accepted', '', 0, '2023-04-20 13:03:00', '2023-04-20 13:49:58'),
(3, 6, 10, 44, 3, '0.00', 'accepted', '', 0, '2023-04-20 13:05:54', '2023-04-20 13:50:23'),
(4, 6, 10, 44, 3, '30.00', 'rejected', '', 0, '2023-04-20 13:06:21', '2023-04-20 13:54:16'),
(5, 6, 10, 45, 2, '60.00', 'rejected', '', 0, '2023-04-20 13:08:11', '2023-04-20 14:05:27'),
(6, 6, 10, 45, 1, '30.00', 'rejected', '', 0, '2023-04-20 13:25:40', '2023-04-20 14:11:17'),
(7, 6, 8, 46, 6, '120.00', 'rejected', '', 0, '2023-04-20 13:28:28', '2023-04-20 14:29:27'),
(8, 6, 8, 46, 4, '80.00', 'rejected', '', 0, '2023-04-20 14:18:13', '2023-04-20 14:37:51'),
(9, 6, 8, 46, 4, '80.00', 'rejected', '', 0, '2023-04-20 14:18:26', '2023-04-20 14:39:22'),
(10, 6, 8, 46, 10, '200.00', 'rejected', '', 0, '2023-04-20 14:39:47', '2023-04-20 14:44:03'),
(11, 6, 8, 46, 1, '20.00', 'accepted', '', 0, '2023-04-20 15:03:27', '2023-04-21 17:05:32'),
(12, 6, 8, 46, 5, '100.00', 'canceled', '', 0, '2023-04-20 15:03:48', '2023-04-20 15:18:26'),
(13, 11, 8, 46, 6, '120.00', 'accepted', '', 0, '2023-04-20 15:22:29', '2023-04-21 17:05:33'),
(14, 6, 10, 46, 1, '103.00', 'Pending', 'ff', 0, '2023-04-20 17:23:03', '2023-04-20 17:23:03'),
(15, 6, 16, 47, 5, '50.00', 'accepted', 'aaaa', 0, '2023-04-21 20:17:28', '2023-04-21 20:18:46'),
(16, 18, 19, 48, 25, '250.00', 'accepted', 'يسشيسشيسشي', 0, '2023-04-22 20:54:36', '2023-04-22 20:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categ_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `IMG` varchar(500) NOT NULL,
  `quantity` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `categ_id`, `name`, `price`, `IMG`, `quantity`, `created_at`) VALUES
(44, 10, 17, 'Burger Beef', 103, '64412ec56a6c30.75393768.jpg', 2, '2023-04-20 12:23:33'),
(46, 10, 17, 'Burger aa a', 103, '64413de4d3bbf4.90480782.jpg', 10, '2023-04-20 13:28:04'),
(47, 16, 19, 'فطير مشلتت وسط', 10, '6442eed7c117e5.92316594.jpg', 15, '2023-04-21 20:15:19'),
(48, 19, 21, 'كحك با العجوة', 10, '644448ca5faf66.18260658.jpg', 25, '2023-04-22 20:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'accepted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `email`, `password`, `city`, `type`, `status`, `created_at`) VALUES
(6, 'Toqa', 'Salah', 'dsadsadsad', 'salah1@gmail.com', '$2y$10$dELP45mpTCKOnpr.NF2HW.d/9VRPyf4YY4FGBrH.0Zvmt7w7I5zM.', 'Doki', 'Customer', 'blocked', '2023-04-12 15:01:37'),
(7, 'Ali', 'Salah', '', 'salah2@gmail.com', '$2y$10$jE3Fb1VnKhqFwi22hK8DcOXqc962Z5WPLAiBc/YvxudcQMB3VjDVi', 'Doki', '', 'accepted', '2023-04-12 16:13:50'),
(8, 'Salah', 'Ali', '', 'salah3@gmail.com', '$2y$10$oePa3waY.oy232jezWdXw.LjWZBKRIgs0HEdx/GKMQFXgbYF9q6uq', '6 October', 'Seller', 'blocked', '2023-04-13 22:10:41'),
(9, 'Mohamed', 'Alaa', '', 'alaa@gmail.com', '$2y$10$FIW16huSqU3piY8OpreP8.W3bjEed..e.wKH6epT2/dgvxlRE4szq', '6 October', '', 'accepted', '2023-04-14 09:20:35'),
(10, 'Toqa', 'Salah', 'toqa', 'saldsadaah1@gmail.com', '$2y$10$XEQ52vepLfUT0ldYt68f5et6AVPfo1uMqqamNeozPKnndha7xM2rm', '6 October', 'Seller', 'blocked', '2023-04-15 17:40:01'),
(11, 'Ali', 'Salah', '', 'alisalah@gmail.com', '$2y$10$vHsc3zsOS6ATSdZMKC0UwO9NY0ZMEnmZWCm479CoxmLlkRhELaHKe', 'Sheikh Zayed', 'Customer', 'blocked', '2023-04-19 22:32:27'),
(12, 'Ali', 'Salah', 'fdsf', 'salfdsfah1@gmail.com', '$2y$10$f9qXIjd14NFveUaS2jxCjeW7l3i.LhS8pvwiL2Qz5.RmGRcW3Yt3u', 'Sheikh Zayed', 'Customer', 'accepted', '2023-04-19 22:34:02'),
(13, 'Ali', 'Salah', 'fdsfds', 'fdsfds@gmail.com', '$2y$10$MbAFQ7q9EAyoeRVKV.GlROj4uiCFvbIU510xww2nDUgHTW.3g6oie', 'Doki', 'Seller', 'blocked', '2023-04-19 22:34:19'),
(14, 'Ali', 'Salah', 'das32423', 'alisaalafdsfh15@gmail.com', '$2y$10$xlvxThH1sbHgk6aPKPg4te1uVT.qRIgErqvYy7IO5Jb1sGyVZM5Qa', 'Nasr City', 'Seller', 'accepted', '2023-04-21 17:47:13'),
(15, 'Ali', 'Salah', 'fsdf5435', 'salfdsfdsah1@gmail.com', '$2y$10$9/Vm46.7bo0KERdktBix2euYoVvWDsqtLR8OHkBYFZ/nYuIT/aS3G', 'Sheikh Zayed', 'Seller', 'rejected', '2023-04-21 17:47:38'),
(16, 'Ali', 'Salah', 'fsd42342', 'fsdfsdf@gmail.com', '$2y$10$AXAGA7Vq8F31v7wL.5nc4e2CXGT2vLkUGsTSeuJpVJ8lPlG8MbTbC', '6 October', 'Seller', 'accepted', '2023-04-21 20:10:56'),
(17, 'Ali', 'Salah', 'dasd2432423', 'fdsfsdfsdf@gmail.com', '$2y$10$6Ssp6sG.4UmKtafJwOrjjOjH1XmQuxforI/ztftrOqdgkYg6lUTte', 'Nasr City', 'Customer', 'accepted', '2023-04-21 20:11:30'),
(18, 'Ali', 'Salah', 'aliali', 'aalili@gmail.com', '$2y$10$BB.jiwswIckke6wzGiIKL.LMrEsZc9wiIhNkZH7O0IMAXvabhCfjO', '6 October', 'Customer', 'accepted', '2023-04-22 20:47:05'),
(19, 'Ali', 'Salah', 'alialialai', 'alisaaldasdsaah15@gmail.com', '$2y$10$Ld4yQo9chGpNUH.rYnYLN.LwwayNC57sanxbQeekeJA0NR4.Bqxta', 'Sheikh Zayed', 'Seller', 'blocked', '2023-04-22 20:48:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categ_id` (`categ_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categ`
--
ALTER TABLE `categ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categ`
--
ALTER TABLE `categ`
  ADD CONSTRAINT `categ_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `categ` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
