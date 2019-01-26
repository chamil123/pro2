-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2019 at 07:16 AM
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
-- Table structure for table `dummeys`
--

DROP TABLE IF EXISTS `dummeys`;
CREATE TABLE IF NOT EXISTS `dummeys` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dummey_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dummeys`
--

INSERT INTO `dummeys` (`id`, `dummey_name`, `placement_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '123456789V_PL1_A', 1, 1, NULL, NULL),
(2, '123456789V_PL1_B', 1, 1, NULL, NULL),
(3, '123456789V_PL1_C', 1, 1, NULL, NULL),
(4, '892073428V_PL1_A', 1, 2, '2019-01-25 17:44:46', '2019-01-25 17:44:46'),
(5, '892073428V_PL1_B', 1, 2, '2019-01-25 17:44:46', '2019-01-25 17:44:46'),
(6, '892073428V_PL1_C', 1, 2, '2019-01-25 17:44:46', '2019-01-25 17:44:46'),
(7, '902073428V_PL1_A', 1, 3, '2019-01-25 17:45:32', '2019-01-25 17:45:32'),
(8, '902073428V_PL1_B', 1, 3, '2019-01-25 17:45:32', '2019-01-25 17:45:32'),
(9, '902073428V_PL1_C', 1, 3, '2019-01-25 17:45:32', '2019-01-25 17:45:32'),
(10, '753072428V_PL1_A', 1, 4, '2019-01-25 17:48:55', '2019-01-25 17:48:55'),
(11, '753072428V_PL1_B', 1, 4, '2019-01-25 17:48:55', '2019-01-25 17:48:55'),
(12, '753072428V_PL1_C', 1, 4, '2019-01-25 17:48:55', '2019-01-25 17:48:55'),
(13, '963073428V_PL1_A', 1, 5, '2019-01-26 01:33:46', '2019-01-26 01:33:46'),
(14, '963073428V_PL1_B', 1, 5, '2019-01-26 01:33:46', '2019-01-26 01:33:46'),
(15, '963073428V_PL1_C', 1, 5, '2019-01-26 01:33:46', '2019-01-26 01:33:46');

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
  `dummey_id` int(11) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=653 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(642, '2019_01_05_171325_create_members_table', 1),
(643, '2019_01_05_175908_create_tests_table', 1),
(644, '2019_01_07_125123_create_partners_table', 1),
(645, '2019_01_08_082017_create_products_table', 1),
(646, '2019_01_08_130508_create_categories_table', 1),
(647, '2019_01_16_061631_create_password_resets_table', 1),
(648, '2019_01_16_061631_create_users_table', 1),
(649, '2019_01_17_230557_create_orders_table', 1),
(650, '2019_01_20_105856_create_dummey_pvs_table', 1),
(651, '2019_01_22_103336_create_temp_dummey_pvs_table', 1),
(652, '2019_01_22_194854_create_dummeys_table', 1);

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
(1, 1, 1, '1', '1500', 20, 'kettle.jpg', 'ELECTRIC KETTLE 2'),
(2, 1, 3, '1', '2500', 25, '01-500x500.jpg', 'ELECTRIC KETTLE 2');

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
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `nic_dummey`, `side`, `member_id`, `partner_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Left', 1, 2, 1, '2019-01-25 17:44:46', '2019-01-25 17:44:46'),
(2, '1', 'Right', 1, 3, 1, '2019-01-25 17:45:32', '2019-01-25 17:45:32'),
(3, '4', 'Left', 1, 4, 1, '2019-01-25 17:48:55', '2019-01-25 17:48:55'),
(4, '5', 'Left', 2, 5, 1, '2019-01-26 01:33:46', '2019-01-26 01:33:46');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_pv_value`, `product_status`, `cat_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRIC KETTLE 2', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1500, 20, 1, 1, 'kettle.jpg', NULL, NULL),
(2, 'BARA IRON 2', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1200, 15, 1, 1, 'download.jpg', NULL, NULL),
(3, 'visil ketle', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2500, 25, 1, 1, '01-500x500.jpg', NULL, NULL),
(4, 'NIKAL RICE COOKER', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5500, 35, 1, 1, 'item_L_7878671_6972648.jpg', NULL, NULL),
(5, 'Blender', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3500, 25, 1, 1, 'images.jpg', NULL, NULL),
(6, 'ELECTRIC OVEN', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 15000, 45, 1, 1, 'ip118635_00.jpg', NULL, NULL),
(7, 'FRIGE 02 2D', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 65000, 55, 1, 1, 'LG-GS-X6011NS-Refrigerator-300x300.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_dummey_pvs`
--

DROP TABLE IF EXISTS `temp_dummey_pvs`;
CREATE TABLE IF NOT EXISTS `temp_dummey_pvs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dummey_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pv_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_nic`, `name`, `user_address`, `user_gender`, `user_dob`, `user_contact_1`, `user_contact_2`, `user_bank_name`, `user_bank_branch`, `user_account_no`, `user_benifit_name`, `user_benifit_address`, `user_pv`, `image`, `email`, `password`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789V', 'Admin', '', '', '', '123456789V', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$dJoCAq0VOQEHq3FijGNL8ehouMYE3ql5Mc//RcWxJJD7X5QMbcPEW', '1', 'HKYgZkopKTCjiiUNFsNSYi5AEzll0UBMJMIOPGlAmYmZVMoYcmSgjqyeP3Yo', NULL, NULL),
(2, '892073428V', 'Imal', '', '', '', '0716589660', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$ax97CeZqrQPJiZwMxzKi6u6/lIOy1b9TTnxabebo/RQMDkTKjxCuK', '1', 'U9qjg733F4wNxqDCx1gchaNQFi28l71DO1AAlZhyppXB6bedmAyAmTrPzShR', '2019-01-25 17:44:46', '2019-01-25 17:44:46'),
(3, '902073428V', 'Nimal', '', '', '', '0716589220', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$Bix6jLYg9zGSxfo8qi1BMOO6E0hVmPI9fNJmJwFQva/aqeXLjVu4K', '1', NULL, '2019-01-25 17:45:32', '2019-01-25 17:45:32'),
(4, '753072428V', 'Sajith', '', '', '', '0716895660', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$M5X45ppxI9bTiu.9xrj1oOas78Ehbm3/YJ1IsoODcn2eu59FXeUPm', '1', NULL, '2019-01-25 17:48:55', '2019-01-25 17:48:55'),
(5, '963073428V', 'hasitha', '', '', '', '0717865660', '', '', '', '', '', '', '', 'default_image.png', '', '$2y$10$BQxiEqSSuTHVzG5gUMytkOW/SxjxRkU.cnk2k1yQlVMxLYfci6RqG', '1', NULL, '2019-01-26 01:33:46', '2019-01-26 01:33:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
