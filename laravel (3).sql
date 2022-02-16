-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 11:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'bishtp143@gmail.com', '$2y$10$Nj0RFSe1KgIWp8X4kpobEOCZRJux4FQ4eOJVVEFdSA0L0r2AETIuO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '1643671700.png', 1, 1, '2022-01-31 17:58:20', '2022-01-31 17:58:20'),
(2, 'Zara', '1643671729.png', 1, 1, '2022-01-31 17:58:49', '2022-01-31 17:58:49'),
(3, 'Apple', '1643671800.png', 1, 1, '2022-01-31 18:00:00', '2022-01-31 18:00:00'),
(4, 'Gucci', '1643671819.png', 1, 1, '2022-01-31 18:00:19', '2022-01-31 18:00:19'),
(5, 'Polo', '1643671841.png', 1, 1, '2022-01-31 18:00:41', '2022-01-31 18:00:41'),
(6, 'Peter England', '1643671866.png', 1, 1, '2022-01-31 18:01:06', '2022-01-31 18:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('Reg','Non-Reg') NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `qty`, `product_id`, `product_attr_id`, `added_on`) VALUES
(54, 10, 'Reg', 1, 20, 11, '2022-02-08 03:26:10'),
(55, 10, 'Reg', 1, 21, 16, '2022-02-08 04:26:15'),
(56, 10, 'Reg', 1, 18, 1, '2022-02-08 04:26:18'),
(57, 13, 'Reg', 1, 19, 6, '2022-02-09 11:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paarent_category_id` int(11) NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `paarent_category_id`, `category_image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'Women Fashion', 0, '937197846.jpg', 1, 1, '2022-01-22 12:18:54', '2022-01-22 19:35:32'),
(2, 'Men', 'Mens Fashion', 0, '403995643.jpg', 1, 1, '2022-01-22 12:20:39', '2022-01-22 19:35:39'),
(3, 'Kids', 'Kids fashion', 0, '766348947.jpg', 1, 1, '2022-01-22 12:21:26', '2022-01-23 08:51:54'),
(4, 'Shoes', 'Shoes', 0, '898543781.png', 1, 1, '2022-01-22 12:21:46', '2022-01-22 12:21:46'),
(5, 'bags', 'bags', 0, '761881046.jpg', 1, 0, '2022-01-22 12:22:10', '2022-01-23 09:25:13'),
(6, 'electronics', 'all types of electronics', 0, '962022762.jpg', 1, 0, '2022-01-22 12:23:10', '2022-01-23 09:25:09'),
(7, 'Apple', 'Apple Iphone 13Pro Max', 6, '589571365.jpg', 0, 0, '2022-01-22 12:23:58', '2022-01-23 07:01:48'),
(9, 'Women try', 'Women try', 1, '611569871.jpg', 0, 1, '2022-01-29 12:51:16', '2022-01-29 12:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', 1, '2022-01-22 12:40:57', '2022-01-22 12:40:57'),
(2, 'white', 1, '2022-01-22 12:41:06', '2022-01-22 12:41:06'),
(3, 'Gray', 1, '2022-01-22 12:41:13', '2022-01-26 05:53:58'),
(4, 'Brown', 1, '2022-01-22 12:41:30', '2022-01-22 12:41:30'),
(5, 'Red', 1, '2022-01-26 05:42:12', '2022-01-26 05:42:12'),
(6, 'Pink', 1, '2022-01-26 05:42:17', '2022-01-26 05:42:17'),
(7, 'green', 1, '2022-01-26 05:42:39', '2022-01-26 05:42:39'),
(8, 'yellow', 1, '2022-01-26 05:42:50', '2022-01-26 05:42:50'),
(9, 'light_blue', 1, '2022-01-26 05:42:59', '2022-01-26 05:57:28'),
(10, 'blue', 1, '2022-01-26 05:43:05', '2022-01-26 05:43:05'),
(11, 'orange', 1, '2022-01-26 05:43:57', '2022-01-26 05:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Year', 'XYZ2022', '150', 'value', 300, 0, 1, '2022-01-22 12:26:17', '2022-01-22 12:26:17'),
(2, 'prime offer', 'PRO123', '500', 'value', 500, 0, 1, '2022-01-22 12:27:01', '2022-01-22 12:27:01'),
(3, 'anniversery', 'ANN2525', '25', 'per', 500, 0, 1, '2022-01-22 12:27:43', '2022-01-22 12:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verify` int(11) NOT NULL,
  `rand_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_forgot_password` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `is_verify`, `rand_id`, `password`, `mobile`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `is_forgot_password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PAWAN BISHT', 'bishtpushpa143@gmail.com', 1, '', 'eyJpdiI6IitDUGFQSFVZN3ZmanE4cVZ0aXpIV3c9PSIsInZhbHVlIjoiSzRLYStaTnViS1E0dFRVNmszRzRBVGhuV3FTek1oMFlmcEZlUmlFeC92UT0iLCJtYWMiOiI4NDQxMWZjNTEzMjQwNTIxYzcyNWY3ZjBhYTIyYzk4ZGM5ZDU2ZWM0ZjUxNjhlM2RhYzg4NzZkZWY5MTcwODM0IiwidGFnIjoiIn0=', '7302004301', NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', '2022-02-03 06:54:44', '2022-02-03 06:54:44'),
(10, 'Pawan', 'bishtp143@gmail.com', 1, '', 'eyJpdiI6IlpqTk13M2szcmhUbmJySjNhaTVSZ1E9PSIsInZhbHVlIjoiV2hsUVQ1NE1LWXpEVFRZb29HL0NBZz09IiwibWFjIjoiZDc4ZTZjZTE5OWExNWVhNDJmMWYzODZhZmMwNDRlYWZkNWE2Y2M3YTQzMmQ4OTRhYTZiNzI5MjcxMDIzNjk1MCIsInRhZyI6IiJ9', '1111111111', NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', '2022-02-03 00:48:30', '2022-02-03 00:48:30'),
(13, 'PAWAN BISHT', 'bishtp14aasd3@gmail.com', 1, '9733406', 'eyJpdiI6IkFxNVVBWWZaSGtTSUw1OHp3K3RLWVE9PSIsInZhbHVlIjoiTDZjNlJ2U1VEeEZXamRORTFleVBwZz09IiwibWFjIjoiZjNkMzhhM2IzNGYyY2JjMjZiYWIyYjdmNjAwNGZhMWMyMDI5M2FmNmMzMzg2NzcwOGZlZWRlNGY3NGZlOTJkNCIsInRhZyI6IiJ9', '07302004301', NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', '2022-02-09 06:29:24', '2022-02-09 06:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `home__banners`
--

CREATE TABLE `home__banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home__banners`
--

INSERT INTO `home__banners` (`id`, `image`, `btn_text`, `btn_link`, `off`, `banner_name`, `banner_about`, `status`, `created_at`, `updated_at`) VALUES
(2, '420100564.jpg', 'Shop Now', 'https://www.google.com', 'SAVE UP TO 75% OFF', 'DENIM COLLECTION', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 1, '2022-01-24 10:39:10', '2022-01-24 12:03:43'),
(3, '130845311.jpg', 'Shop Now', 'https://www.google.com', NULL, 'WRISTWATCH COLLECTION', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 1, '2022-01-24 10:40:39', '2022-01-24 12:03:27'),
(4, '920350685.jpg', 'Shop Now', 'https://www.google.com', 'SAVE UP TO 50% OFF', 'WOMEN COLLECTION', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 1, '2022-01-24 10:40:52', '2022-01-24 12:04:35'),
(5, '147502968.jpg', 'Shop Now', 'https://www.google.com', 'SAVE UP TO 30% OFF', 'EXCLUSIVE SHOES', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 1, '2022-01-24 10:41:04', '2022-01-24 12:05:22'),
(6, '282061768.jpg', 'Shop Now', 'https://www.google.com', NULL, 'BEST COLLECTION', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 1, '2022-01-24 10:41:17', '2022-01-24 12:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_10_110602_create_admins_table', 1),
(3, '2022_01_11_194749_create_categories_table', 1),
(4, '2022_01_13_163753_create_coupons_table', 1),
(5, '2022_01_13_194800_create_sizes_table', 1),
(6, '2022_01_14_113441_create_colors_table', 1),
(7, '2022_01_17_232039_create_products_table', 1),
(8, '2022_01_19_113429_create_brands_table', 1),
(9, '2022_01_20_122208_create_taxes_table', 1),
(10, '2022_01_21_120014_create_customers_table', 1),
(11, '2022_01_24_112821_create_home__banners_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_type` enum('COD','Gateway') NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `total_amt` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `name`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_status`, `payment_id`, `txn_id`, `total_amt`, `added_on`) VALUES
(1, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, '1c76bbcd54f048df8cc6fa9a2b6393a9', 10000, '2022-02-08 04:01:29'),
(2, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 4095000, '2022-02-08 04:27:02'),
(3, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 4095000, '2022-02-08 04:27:25'),
(4, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 4095000, '2022-02-08 04:28:47'),
(5, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'Success', 'MOJO2208905A32771284', 'f1e337cde8b54080826d012215d95bf8', 199250, '2022-02-08 04:31:39'),
(6, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:17:10'),
(7, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:17:24'),
(8, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', 'PRO123', 500, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:19:35'),
(9, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:19:55'),
(10, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:20:17'),
(11, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:20:41'),
(12, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:21:28'),
(13, 10, 'PAWAN BISHT', 'bishtp143@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 1450, '2022-02-09 11:21:45'),
(14, 13, 'PAWAN BISHT', 'bishtp14aasd3@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 400, '2022-02-09 11:59:24'),
(15, 13, 'PAWAN BISHT', 'bishtp14aasd3@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 400, '2022-02-09 11:59:24'),
(16, 13, 'PAWAN BISHT', 'bishtp14aasd3@gmail.com', 7302004301, 'Higci\r\nHigc', 'Hhg', 'Higci\r\nHigc', '263653', NULL, 0, 1, 'Gateway', 'pending', NULL, NULL, 400, '2022-02-10 12:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `orders_id`, `product_id`, `product_attr_id`, `price`, `qty`) VALUES
(18, 13, 20, 12, 200, 1),
(19, 13, 23, 26, 4500, 1),
(20, 14, 20, 12, 200, 1),
(21, 14, 23, 26, 4500, 1),
(22, 15, 20, 12, 200, 1),
(23, 15, 23, 26, 4500, 1),
(24, 16, 20, 12, 200, 1),
(25, 16, 23, 26, 4500, 1),
(26, 17, 20, 12, 200, 1),
(27, 17, 23, 26, 4500, 1),
(28, 18, 20, 12, 200, 1),
(29, 18, 23, 26, 4500, 1),
(30, 19, 20, 12, 200, 1),
(31, 19, 23, 26, 4500, 1),
(32, 20, 20, 12, 200, 1),
(33, 20, 23, 26, 4500, 1),
(34, 21, 20, 12, 200, 1),
(35, 21, 23, 26, 4500, 1),
(36, 23, 21, 16, 850, 1),
(37, 23, 20, 11, 200, 1),
(38, 24, 21, 16, 850, 1),
(39, 24, 20, 11, 200, 1),
(40, 25, 21, 16, 850, 1),
(41, 25, 20, 11, 200, 1),
(42, 29, 21, 16, 850, 1),
(43, 29, 20, 11, 200, 1),
(44, 30, 21, 16, 850, 1),
(45, 30, 20, 11, 200, 1),
(46, 31, 21, 16, 850, 1),
(47, 31, 20, 11, 200, 1),
(48, 32, 20, 11, 200, 1),
(49, 32, 21, 16, 850, 1),
(50, 33, 20, 11, 200, 1),
(51, 33, 21, 16, 850, 1),
(52, 34, 20, 11, 200, 1),
(53, 35, 21, 16, 850, 1),
(54, 36, 19, 6, 400, 1),
(55, 37, 20, 11, 200, 1),
(56, 38, 20, 11, 200, 1),
(57, 39, 20, 11, 200, 1),
(58, 40, 20, 11, 200, 1),
(59, 41, 20, 11, 200, 1),
(60, 42, 20, 11, 200, 1),
(61, 43, 20, 11, 200, 1),
(62, 44, 20, 11, 200, 1),
(63, 1, 20, 11, 200, 50),
(64, 2, 20, 11, 200, 50),
(65, 2, 21, 16, 850, 100),
(66, 2, 18, 1, 400, 10000),
(67, 3, 20, 11, 200, 50),
(68, 3, 21, 16, 850, 100),
(69, 3, 18, 1, 400, 10000),
(70, 4, 20, 11, 200, 50),
(71, 4, 21, 16, 850, 100),
(72, 4, 18, 1, 400, 10000),
(73, 5, 20, 11, 200, 250),
(74, 5, 21, 16, 850, 105),
(75, 5, 18, 1, 400, 150),
(76, 6, 20, 11, 200, 1),
(77, 6, 21, 16, 850, 1),
(78, 6, 18, 1, 400, 1),
(79, 7, 20, 11, 200, 1),
(80, 7, 21, 16, 850, 1),
(81, 7, 18, 1, 400, 1),
(82, 8, 20, 11, 200, 1),
(83, 8, 21, 16, 850, 1),
(84, 8, 18, 1, 400, 1),
(85, 9, 20, 11, 200, 1),
(86, 9, 21, 16, 850, 1),
(87, 9, 18, 1, 400, 1),
(88, 10, 20, 11, 200, 1),
(89, 10, 21, 16, 850, 1),
(90, 10, 18, 1, 400, 1),
(91, 11, 20, 11, 200, 1),
(92, 11, 21, 16, 850, 1),
(93, 11, 18, 1, 400, 1),
(94, 12, 20, 11, 200, 1),
(95, 12, 21, 16, 850, 1),
(96, 12, 18, 1, 400, 1),
(97, 13, 20, 11, 200, 1),
(98, 13, 21, 16, 850, 1),
(99, 13, 18, 1, 400, 1),
(100, 14, 19, 6, 400, 1),
(101, 15, 19, 6, 400, 1),
(102, 16, 19, 6, 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `orders_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `orders_status`) VALUES
(1, 'delivered'),
(2, 'packing'),
(5, 'on the way');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_promo` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_discounted` int(11) NOT NULL,
  `is_tranding` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `slug`, `brand`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `lead_time`, `tax_id`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(18, 1, 'Women Suite', '1643542980.jpg', 'Women Suite With Dupatta', '2', 'mb', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With DupattaWomen Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With DupattaWomen Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With DupattaWomen Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', 'Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta Women Suite With Dupatta', '2-3 Days', NULL, 0, 1, 0, 1, 1, '2022-01-30 06:13:00', '2022-01-30 06:14:36'),
(19, 1, 'Women Printed Suite', '1643544243.jpg', 'Women Printed Suite', '1', 'X', 'Women Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed Suite', 'Women Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed Suite', 'Women Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed Suite', 'Women Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed Suite', 'Women Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed SuiteWomen Printed Suite', '12 month', '2-3 Days', NULL, 0, 1, 1, 1, 1, '2022-01-30 06:34:03', '2022-01-30 06:34:03'),
(20, 1, 'Women Cotton Top', '1643544867.jpg', 'Women Cotton Top', '3', '4', 'Women Cotton Top Women Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton Top', 'Women Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton Top', 'Women Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton Top', 'Women Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton Top', 'Women Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton TopWomen Cotton Top', '0', 'Same Day Delivery', NULL, 0, 1, 1, 0, 1, '2022-01-30 06:44:27', '2022-01-30 06:44:27'),
(21, 1, 'fork', '1643545356.jpg', 'fork', '2', 'mb', 'fork fork fork', 'fork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork\r\nfork', 'fork forkfork fork fork fork', 'forkforkforkforkforkfork', 'forkforkforkforkforkforkforkforkfork', '0', NULL, NULL, 0, 1, 1, 1, 1, '2022-01-30 06:52:36', '2022-01-30 06:52:36'),
(23, 2, 'Men Partywear', '1643551588.jpg', 'Men\'s Partywear', '1', '1', 'Men\'s Partywear Men\'s Partywear Men\'s Partywear', 'Men\'s Partywear Men\'s Partywear Men\'s Partywear Men\'s Partywear Men\'s Partywear Men\'s Partywear Men\'s Partywear', 'Men\'s Partywear', 'Men\'s Partywear', 'Men\'s Partywear', '0', NULL, NULL, 0, 1, 0, 1, 1, '2022-01-30 08:36:28', '2022-01-30 08:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `products_attr`
--

CREATE TABLE `products_attr` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `attr_image` varchar(255) DEFAULT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_attr`
--

INSERT INTO `products_attr` (`id`, `products_id`, `sku`, `attr_image`, `mrp`, `price`, `qty`, `size_id`, `color_id`) VALUES
(1, 18, '1', '763351898.jpg', 500, 400, 4, 2, 2),
(2, 18, '2', '944591009.jpg', 500, 400, 5, 3, 3),
(3, 18, '3', '425725346.jpg', 500, 400, 5, 4, 4),
(4, 18, '4', '145059199.jpg', 500, 400, 5, 2, 6),
(5, 18, '5', '250435101.jpg', 500, 400, 5, 3, 8),
(6, 19, '6', '914386471.jpg', 500, 400, 4, 2, 11),
(7, 19, '7', '530609415.jpg', 500, 400, 5, 3, 10),
(8, 19, '8', '240410054.jpg', 500, 400, 5, 4, 7),
(9, 19, '9', '262373116.jpg', 500, 400, 5, 3, 8),
(10, 19, '10', '926162801.jpg', 500, 400, 5, 2, 5),
(11, 20, '11', '548912122.jpg', 250, 200, 12, 2, 2),
(12, 20, '12', '637338962.jpg', 250, 200, 12, 3, 3),
(13, 20, '13', '821282123.jpg', 250, 200, 12, 3, 6),
(14, 20, '14', '972879664.jpg', 250, 200, 12, 4, 4),
(15, 20, '15', '193001687.jpg', 250, 200, 12, 2, 5),
(16, 21, '16', '621231660.jpg', 1000, 850, 5, 2, 5),
(17, 21, '17', '829613526.jpg', 1000, 850, 5, 3, 7),
(18, 21, '18', '833882826.jpg', 1000, 850, 5, 4, 8),
(19, 21, '19', '627536932.jpg', 1000, 850, 2, 4, 1),
(20, 21, '20', '494130830.jpg', 1000, 850, 5, 2, 3),
(26, 23, '21', '364139352.jpg', 5000, 4500, 5, 4, 4),
(27, 23, '22', '459688734.jpg', 5000, 4500, 5, 3, 3),
(28, 23, '23', '721631561.jpg', 5000, 4500, 5, 4, 4),
(29, 23, '24', '828230743.jpg', 5000, 4500, 5, 3, 10),
(30, 23, '25', '734856377.jpg', 5000, 4500, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images`) VALUES
(1, 18, '227823315.jpg'),
(2, 18, '523446565.jpg'),
(3, 18, '546287983.jpg'),
(4, 18, '628856789.jpg'),
(5, 19, '427984654.jpg'),
(6, 19, '663563654.jpg'),
(7, 19, '636332635.jpg'),
(8, 19, '745672824.jpg'),
(9, 20, '996751700.jpg'),
(10, 20, '448111514.jpg'),
(11, 20, '241294014.jpg'),
(12, 20, '465920041.jpg'),
(13, 21, '262718454.jpg'),
(14, 21, '260406940.jpg'),
(15, 21, '524495168.jpg'),
(16, 21, '566213838.jpg'),
(21, 23, '834138117.jpg'),
(22, 23, '355606662.jpg'),
(23, 23, '813523008.jpg'),
(24, 23, '473675176.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sm', 1, '2022-01-22 12:40:00', '2022-01-22 12:40:00'),
(2, 'M', 1, '2022-01-22 12:40:18', '2022-01-22 12:40:18'),
(3, 'L', 1, '2022-01-22 12:40:24', '2022-01-22 12:40:24'),
(4, 'XL', 1, '2022-01-22 12:40:30', '2022-01-22 12:40:30'),
(5, 'XXL', 1, '2022-01-22 12:40:36', '2022-01-22 12:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_desc`, `tax_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST', '18%', 1, '2022-01-22 12:39:24', '2022-01-22 12:39:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home__banners`
--
ALTER TABLE `home__banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attr`
--
ALTER TABLE `products_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `home__banners`
--
ALTER TABLE `home__banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products_attr`
--
ALTER TABLE `products_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
