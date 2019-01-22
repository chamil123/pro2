-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2019 at 04:16 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phyramid`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_description`, `cat_status`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRIC ITEMS', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dummey_pv`
--

DROP TABLE IF EXISTS `dummey_pv`;
CREATE TABLE IF NOT EXISTS `dummey_pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummey_pvs`
--

DROP TABLE IF EXISTS `dummey_pvs`;
CREATE TABLE IF NOT EXISTS `dummey_pvs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_product_id` int(11) NOT NULL,
  `pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_contact_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_contact_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_benifit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_benifit_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_benifit_nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `member_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2019_01_05_171325_create_members_table', 1),
(28, '2019_01_05_175908_create_tests_table', 1),
(29, '2019_01_07_125123_create_partners_table', 1),
(30, '2019_01_08_082017_create_products_table', 1),
(31, '2019_01_08_130508_create_categories_table', 1),
(32, '2019_01_16_061631_create_password_resets_table', 1),
(33, '2019_01_16_061631_create_users_table', 1),
(34, '2019_01_17_230557_create_orders_table', 1),
(35, '2019_01_20_105856_create_dummey_pvs_table', 1),
(36, '2019_01_22_103336_create_temp_dummey_pvs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
CREATE TABLE IF NOT EXISTS `orders_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pv_value` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `test` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_product`
--

INSERT INTO `orders_product` (`id`, `orders_id`, `product_id`, `qty`, `total`, `pv_value`, `image`, `test`) VALUES
(1, 1, 2, '1', '1500', 20, '01-500x500.jpg', 'ELECTRIC KETTLE 2'),
(2, 1, 1, '1', '1500', 10, 'kettle.jpg', 'ELECTRIC KETTLE 2');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nic_dummey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `user_nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_user_nic_index` (`user_nic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_pv_value` double NOT NULL,
  `product_status` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_pv_value`, `product_status`, `cat_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRIC KETTLE 2', 'ELECTRIC KETTLE 2', 2500, 30, 1, 1, 'kettle.jpg', '2019-01-22 05:06:44', '2019-01-22 05:06:44'),
(2, 'visil ketle', 'visil ketle', 3500, 20, 1, 1, '01-500x500.jpg', '2019-01-22 05:07:03', '2019-01-22 05:07:03'),
(3, 'BARA IRON 2', 'BARA IRON 2', 1500, 10, 1, 1, '1-Steam-Iron-With-Anti-Drip-1600W-X1550-B5 (1).jpg', '2019-01-22 05:07:23', '2019-01-22 05:07:23'),
(4, 'NIKAL RICE COOKER', 'BARA IRON 2', 6500, 40, 1, 1, 'item_L_7878671_6972648.jpg', '2019-01-22 05:07:45', '2019-01-22 05:07:45'),
(5, 'Blender', 'Blender', 4500, 30, 1, 1, 'images.jpg', '2019-01-22 05:08:10', '2019-01-22 05:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `temp_dummey_pvs`
--

DROP TABLE IF EXISTS `temp_dummey_pvs`;
CREATE TABLE IF NOT EXISTS `temp_dummey_pvs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dummey_id` int(11) NOT NULL,
  `pv_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_dummey_pvs`
--

INSERT INTO `temp_dummey_pvs` (`id`, `dummey_id`, `pv_value`, `created_at`, `updated_at`) VALUES
(34, 1, '10', '2019-01-22 08:37:21', '2019-01-22 08:37:21'),
(92, 1, '9', '2019-01-22 09:32:37', '2019-01-22 09:32:37'),
(91, 1, '77', '2019-01-22 09:32:01', '2019-01-22 09:32:01'),
(90, 1, '10', '2019-01-22 09:31:12', '2019-01-22 09:31:12'),
(89, 1, '8', '2019-01-22 09:31:07', '2019-01-22 09:31:07'),
(88, 1, '5', '2019-01-22 09:31:02', '2019-01-22 09:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_benifit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_benifit_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_nic_unique` (`user_nic`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_nic`, `name`, `user_address`, `user_gender`, `user_dob`, `user_contact_1`, `user_contact_2`, `user_bank_name`, `user_bank_branch`, `user_account_no`, `user_benifit_name`, `user_benifit_address`, `user_pv`, `image`, `email`, `password`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789V', 'Admin', '', '', '', '123456789V', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$QqDAWi2UzWrpym4IjLAQa.FVIZYY3LRx1LSIm6ezEG7S8Qq5MnK3.', '1', 'ag4IBOkBrWgPjiREGeM4KMhJA9egxX6b5emGjx61Jb2IyebTF0Kjg7CPq6n8', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
