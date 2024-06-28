-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 01:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welovenovel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(25, 1, 3, '2024-05-07 05:12:25', '2024-05-07 05:12:25'),
(26, 1, 3, '2024-05-07 05:16:50', '2024-05-07 05:16:50'),
(27, 1, 3, '2024-05-07 05:17:23', '2024-05-07 05:17:23'),
(28, 1, 9, '2024-05-07 05:23:14', '2024-05-07 05:23:14'),
(29, 1, 9, '2024-05-07 05:25:47', '2024-05-07 05:25:47'),
(30, 1, 3, '2024-05-13 02:32:39', '2024-05-13 02:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(10, 'Men', '2024-05-01 03:16:43', '2024-05-01 06:41:33'),
(11, 'Women', '2024-05-01 05:45:51', '2024-05-01 06:44:17'),
(12, 'Hentai', '2024-05-01 06:30:10', '2024-05-01 06:30:10'),
(13, 'Hentai', '2024-05-01 06:33:24', '2024-05-01 06:33:24'),
(14, 'Loli', '2024-05-01 06:35:36', '2024-05-01 06:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_30_172803_create_categories_table', 2),
(5, '2024_05_01_175659_create_products_table', 3),
(6, '2024_05_06_110356_create_carts_table', 4),
(8, '2024_05_07_100659_create_orders_table', 5),
(9, '2024_05_08_034353_create_product_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `UserId` bigint UNSIGNED NOT NULL,
  `OrderDate` timestamp NOT NULL,
  `ShippingAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalAmount` decimal(8,2) NOT NULL,
  `PaymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShippingMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `DeliveryStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `UserId`, `OrderDate`, `ShippingAddress`, `TotalAmount`, `PaymentMethod`, `ShippingMethod`, `OrderStatus`, `DeliveryStatus`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-05-09 21:23:06', 'hà nam', '2098.00', 'Payment on Delivery', 'on', 'pending', 'pending', '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(2, 1, '2024-05-09 21:26:09', 'hà nam', '2098.00', 'Payment by Card', 'on', 'pending', 'pending', '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(3, 1, '2024-05-09 23:09:49', 'lam', '1998.00', 'Payment on Delivery', 'on', 'pending', 'pending', '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(4, 1, '2024-05-10 06:19:15', 'lam', '2098.00', 'Payment by Card', 'on', 'pending', 'pending', '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(5, 1, '2024-05-10 06:23:11', 'lam', '2098.00', 'Payment on Delivery', 'Fast delivery', 'pending', 'pending', '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(6, 1, '2024-05-10 12:56:45', 'lam', '432.00', 'Payment by Card', 'Standard delivery', 'pending', 'pending', '2024-05-10 12:56:45', '2024-05-10 12:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 'novel', 'tes', '1714590055.jpg', '110', 'Hentai', '8', '2024-05-01 12:00:55', '2024-05-04 01:32:02'),
(4, 'novel', 'sdddddddddddddddddddddddddddddddddddddddddddddddddddddddd\r\nsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddđ', '1714733900.jpg', '110', 'Women', '10', '2024-05-02 09:40:50', '2024-05-03 03:58:20'),
(9, 'test', 'sdsd', '1714809949.jpg', '1', 'Hentai', '1', '2024-05-04 01:05:49', '2024-05-04 01:05:49'),
(11, 'nonll', 'sdssds', '1714839694.jpg', '123', 'Women', '12', '2024-05-04 09:21:34', '2024-05-04 09:21:34'),
(12, 'ollll', 'hskdhsdhslkdh', '1715311644.jpg', '123', 'Hentai', '12', '2024-05-09 20:27:24', '2024-05-09 20:27:24'),
(13, 'novel', 'sddsd', '1715311680.jpg', '1222', 'Select Option', '12', '2024-05-09 20:28:00', '2024-05-09 20:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(2, 11, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(3, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(4, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(5, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(6, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(7, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(8, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(9, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(10, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(11, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(12, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(13, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(14, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(15, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(16, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(17, 3, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(18, 9, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(19, 9, 1, '2024-05-09 21:23:06', '2024-05-09 21:23:06'),
(20, 11, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(21, 11, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(22, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(23, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(24, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(25, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(26, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(27, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(28, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(29, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(30, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(31, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(32, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(33, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(34, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(35, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(36, 3, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(37, 9, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(38, 9, 2, '2024-05-09 21:26:09', '2024-05-09 21:26:09'),
(39, 11, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(40, 11, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(41, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(42, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(43, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(44, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(45, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(46, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(47, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(48, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(49, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(50, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(51, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(52, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(53, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(54, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(55, 3, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(56, 9, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(57, 9, 3, '2024-05-09 23:09:49', '2024-05-09 23:09:49'),
(58, 11, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(59, 11, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(60, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(61, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(62, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(63, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(64, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(65, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(66, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(67, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(68, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(69, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(70, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(71, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(72, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(73, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(74, 3, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(75, 9, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(76, 9, 4, '2024-05-10 06:19:15', '2024-05-10 06:19:15'),
(77, 11, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(78, 11, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(79, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(80, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(81, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(82, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(83, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(84, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(85, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(86, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(87, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(88, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(89, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(90, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(91, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(92, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(93, 3, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(94, 9, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(95, 9, 5, '2024-05-10 06:23:11', '2024-05-10 06:23:11'),
(96, 3, 6, '2024-05-10 12:56:45', '2024-05-10 12:56:45'),
(97, 3, 6, '2024-05-10 12:56:45', '2024-05-10 12:56:45'),
(98, 3, 6, '2024-05-10 12:56:45', '2024-05-10 12:56:45'),
(99, 9, 6, '2024-05-10 12:56:45', '2024-05-10 12:56:45'),
(100, 9, 6, '2024-05-10 12:56:45', '2024-05-10 12:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1jTeA6SFbgJjd4Q04pWx4utSLSxbgScoXtGN8LpZ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN1FkUmh2Um0wWTJEaHBoOURNZ3RTMk84OHlFUmt0OWVMR2dTSmNtRSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3ZpZXdfb3JkZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1715583318),
('JrhZn8iHAB0ZCPHx9ORhfcpYKMdtL38aaDqjuA1X', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHoweDB3SFFMSUtuaHNQOUxxWk01RjZZUVZpMDh4c3pHTzFVUW1ucyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717753173),
('N2VeF4GvhQQeE1a188YzyA8UB7ssqZkLZAuV0EAI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ3JYeElrbWpJSWVIUmxLRzdZbFJBOWFXTVlvMU00NnBmQTBGWk93TyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMzoiaHR0cDovL3dlbG92ZW5vdmVsLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1717753257);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', 'user', '1212121', 'dfdfsdf', NULL, '$2y$12$KZ4eUSxWCwTYjpfrtDUrJeU5CBtTQqRywgqcpreskk7mq9EF5bVVu', NULL, '2024-04-29 05:12:00', '2024-04-29 05:12:00'),
(2, 'admin', 'admin@gmail.com', 'admin', '0975821009', 'Hà Nam', NULL, '$2y$12$olL37L3mZkWLx7HFpRZST.2cJ0AiJvFGMDXNmNSmxTOU9EPWybWpG', NULL, '2024-04-29 05:12:42', '2024-04-29 05:12:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`UserId`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_orders_product_id_foreign` (`product_id`),
  ADD KEY `product_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
