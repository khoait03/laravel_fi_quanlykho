-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2025 at 04:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_fi_quanlykho`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('quan-ly-kho-hang-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1763299175),
('quan-ly-kho-hang-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1763299175;', 1763299175),
('quan-ly-kho-hang-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:89:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:9:\"view_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:13:\"view_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"create_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"update_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"delete_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"view_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:19:\"view_any_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:17:\"create_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"update_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:17:\"delete_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:21:\"delete_any_post::meta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:8:\"view_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"view_any_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:10:\"create_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:10:\"update_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:10:\"delete_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:14:\"delete_any_tag\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:22:\"widget_BlogStatsWidget\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:24:\"widget_RecentPostsWidget\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:27:\"widget_PostViewsChartWidget\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:25:\"widget_PopularPostsWidget\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:26:\"widget_CategoryStatsWidget\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:13:\"view_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:17:\"view_any_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:15:\"create_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:15:\"update_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:15:\"delete_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:19:\"delete_any_customer\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:19:\"view_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:23:\"view_any_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:21:\"create_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:21:\"update_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:21:\"delete_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:25:\"delete_any_customer::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:12:\"view_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:16:\"view_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:14:\"create_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:14:\"update_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"delete_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:18:\"delete_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:21:\"view_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:25:\"view_any_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:23:\"create_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:23:\"update_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:23:\"delete_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:27:\"delete_any_product::variant\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:13:\"view_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:17:\"view_any_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:15:\"create_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:15:\"update_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:15:\"delete_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:19:\"delete_any_supplier\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:10:\"view_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:14:\"view_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:12:\"create_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:12:\"update_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:12:\"delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:16:\"delete_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:19:\"view_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:23:\"view_any_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:21:\"create_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:21:\"update_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:21:\"delete_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:25:\"delete_any_order::payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:20:\"view_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:24:\"view_any_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:22:\"create_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:22:\"update_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:22:\"delete_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:26:\"delete_any_purchase::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"Khách hàng\";s:1:\"c\";s:3:\"web\";}}}', 1763396676);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên danh mục',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Danh mục cha (nếu có)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `is_active`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Bia', 'Các loại bia trong nước và nhập khẩu', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(2, 'Bia Việt Nam', 'Bia các nhãn hiệu Việt Nam: Sài Gòn, Hà Nội, Tiger...', 1, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(3, 'Bia Nhập Khẩu', 'Bia nhập khẩu: Heineken, Budweiser, Corona...', 1, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(4, 'Bia Craft', 'Bia thủ công, bia thợ', 1, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(5, 'Nước Ngọt', 'Nước giải khát có ga và không ga', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(6, 'Nước có ga', 'Coca-Cola, Pepsi, 7Up, Sprite...', 1, 5, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(7, 'Nước trái cây', 'Nước ép trái cây: Number 1, Twister, C2...', 1, 5, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(8, 'Trà xanh', 'Trà xanh không độ: 0 độ, C2, Fuzetea...', 1, 5, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(9, 'Nước Suối & Khoáng', 'Nước suối, nước khoáng tinh khiết', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(10, 'Nước suối', 'Lavie, Aquafina, Dasani...', 1, 9, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(11, 'Nước khoáng', 'Vĩnh Hảo, Thạch Bích, Vital...', 1, 9, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(12, 'Rượu', 'Các loại rượu mạnh và rượu vang', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(13, 'Rượu Vang', 'Rượu vang đỏ, trắng, hồng', 1, 12, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(14, 'Rượu Mạnh', 'Vodka, Whisky, Cognac...', 1, 12, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(15, 'Rượu Truyền Thống', 'Rượu đế, rượu gạo, rượu nếp...', 1, 12, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(16, 'Nước Tăng Lực', 'Nước tăng lực, nước bổ sung năng lượng', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(17, 'Energy Drink', 'Red Bull, Sting, Number 1...', 1, 16, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(18, 'Nước bổ sung điện giải', 'Revive, Pocari, Aquarius...', 1, 16, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(19, 'Sữa & Đồ Uống Từ Sữa', 'Sữa tươi, sữa chua, sữa đậu nành...', 1, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(20, 'Sữa Tươi', 'Vinamilk, TH True Milk, Dalat Milk...', 1, 19, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(21, 'Sữa Chua Uống', 'Yakult, Vinamilk, Dutch Lady...', 1, 19, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(22, 'Sữa Đậu Nành', 'Fami, Vinasoy, Vfresh...', 1, 19, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(23, 'Sản Phẩm Ngừng Kinh Doanh', 'Các sản phẩm đã ngừng kinh doanh', 0, NULL, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(27, 'Điện tử', NULL, 1, NULL, '2025-11-16 13:15:48', '2025-11-16 13:15:48'),
(29, 'New nè', NULL, 1, NULL, '2025-11-16 13:19:12', '2025-11-16 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã khách hàng',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Facebook',
  `zalo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Zalo',
  `address` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci COMMENT 'Ghi chú',
  `customer_type_id` bigint UNSIGNED DEFAULT NULL,
  `total_purchased` int NOT NULL DEFAULT '0' COMMENT 'Tổng tiền đã mua (VND)',
  `total_debt` int NOT NULL DEFAULT '0' COMMENT 'Tổng công nợ hiện tại (VND)',
  `is_walk_in` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Khách vãng lai',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `phone`, `facebook`, `zalo`, `address`, `notes`, `customer_type_id`, `total_purchased`, `total_debt`, `is_walk_in`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'KH0001', 'Nguyễn Văn An', '0901234567', 'facebook.com/nguyenvanan', '0901234567', '123 Nguyễn Huệ, Quận 1, TP.HCM', 'Khách hàng VIP, mua hàng thường xuyên', 1, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(2, 'KH0002', 'Trần Thị Bình', '0912345678', 'facebook.com/tranthibinh', '0912345678', '456 Lê Lợi, Quận 3, TP.HCM', 'Chủ nhà hàng, đặt hàng định kỳ', 7, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(3, 'KH0003', 'Lê Văn Châu', '0923456789', '', '0923456789', '789 Hai Bà Trưng, Quận 1, TP.HCM', 'Khách hàng thân thiết', 2, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 12:11:15'),
(4, 'KH0004', 'Phạm Thị Dung', '0934567890', 'facebook.com/phamthidung', '0934567890', '321 Trần Hưng Đạo, Quận 5, TP.HCM', 'Chủ siêu thị mini', 8, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(5, 'KH0005', 'Hoàng Văn Em', '0945678901', '', '0945678901', '654 Võ Văn Tần, Quận 3, TP.HCM', '', 4, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(6, 'KH0006', 'Vũ Thị Phương', '0956789012', 'facebook.com/vuthiphuong', '0956789012', '147 Cách Mạng Tháng 8, Quận 10, TP.HCM', 'Đại lý phân phối', 6, 0, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(7, 'KH0007', 'Đỗ Văn Giang', '0967890123', '', '0967890123', '258 Nguyễn Thái Học, Quận 1, TP.HCM', 'Công ty XYZ', 5, 4325000, 0, 0, 1, '2025-11-15 07:15:03', '2025-11-16 10:30:43'),
(8, 'KH0008', 'Lý Thị Hoa', '0978901234', 'facebook.com/lythihoa', '0978901234', '369 Phan Xích Long, Quận Phú Nhuận, TP.HCM', 'Mua lẻ thường xuyên', 3, 575000, 75000, 0, 1, '2025-11-15 07:15:03', '2025-11-16 15:37:55'),
(9, NULL, 'Khách vãng lai', '0000000000', '', '', '', 'Khách hàng mua lẻ không cần thông tin', 4, 0, 0, 1, 1, '2025-11-15 07:15:03', '2025-11-16 10:11:49'),
(10, 'KH0009', 'Ngô Văn Ích', '0989012345', '', '', '741 Quang Trung, Quận Gò Vấp, TP.HCM', 'Khách hàng cũ, tạm ngừng mua hàng', 4, 0, 0, 0, 0, '2025-11-15 07:15:03', '2025-11-16 10:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer_types`
--

CREATE TABLE `customer_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'VIP, Thân thiết, Thường...',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_types`
--

INSERT INTO `customer_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 'Khách hàng VIP - Mua hàng trên 50 triệu/tháng, được hưởng ưu đãi đặc biệt, giảm giá tối đa 15%, hỗ trợ giao hàng miễn phí và chăm sóc khách hàng 24/7.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(2, 'Thân thiết', 'Khách hàng thân thiết - Mua hàng từ 20-50 triệu/tháng, được giảm giá 10%, tích điểm thưởng và ưu tiên xử lý đơn hàng.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(3, 'Thường xuyên', 'Khách hàng thường xuyên - Mua hàng từ 10-20 triệu/tháng, được giảm giá 5% và tích điểm thưởng cơ bản.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(4, 'Thường', 'Khách hàng thường - Khách hàng mua lẻ hoặc mua hàng dưới 10 triệu/tháng, áp dụng giá niêm yết chuẩn.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(5, 'Doanh nghiệp', 'Khách hàng doanh nghiệp - Đặt hàng số lượng lớn, có hợp đồng dài hạn, được hưởng chính sách giá đặc biệt và hỗ trợ công nợ.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(6, 'Đại lý', 'Đại lý phân phối - Đối tác phân phối sản phẩm, được hưởng giá sỉ đặc biệt, chính sách chiết khấu cao và hỗ trợ marketing.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(7, 'Nhà hàng', 'Khách hàng nhà hàng - Chủ nhà hàng, quán ăn đặt hàng thường xuyên, được giá ưu đãi và giao hàng định kỳ.', '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(8, 'Siêu thị', 'Khách hàng siêu thị - Hệ thống siêu thị, cửa hàng tiện lợi, được chính sách giá đặc biệt và hỗ trợ trưng bày sản phẩm.', '2025-11-15 07:15:03', '2025-11-15 07:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `exporter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rows` int NOT NULL DEFAULT '0',
  `processed_rows` int NOT NULL DEFAULT '0',
  `successful_rows` int NOT NULL DEFAULT '0',
  `file_disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `user_id`, `exporter`, `total_rows`, `processed_rows`, `successful_rows`, `file_disk`, `file_name`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Filament\\Exports\\ProductExport', 10, 10, 10, 'local', 'products-selected-2025-11-16-202033', '2025-11-16 13:20:33', '2025-11-16 13:20:33', '2025-11-16 13:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_import_rows`
--

CREATE TABLE `failed_import_rows` (
  `id` bigint UNSIGNED NOT NULL,
  `import_id` bigint UNSIGNED NOT NULL,
  `row` int NOT NULL DEFAULT '0',
  `data` json NOT NULL,
  `validation_error` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rows` int NOT NULL DEFAULT '0',
  `processed_rows` int NOT NULL DEFAULT '0',
  `successful_rows` int NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `user_id`, `file_name`, `file_path`, `importer`, `total_rows`, `processed_rows`, `successful_rows`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'product-import-example.csv', 'F:\\00000_DIVE_CODE\\000_THIETKEWEB\\laravel_fi_quanlykho\\storage\\app/private\\livewire-tmp/96uQH7klYE6NycPjdatfer2taGIupl-metacHJvZHVjdC1pbXBvcnQtZXhhbXBsZS5jc3Y=-.csv', 'App\\Filament\\Imports\\ProductImport', 1, 0, 0, NULL, '2025-11-16 13:14:21', '2025-11-16 13:14:21'),
(2, 1, 'product-import-example.csv', 'F:\\00000_DIVE_CODE\\000_THIETKEWEB\\laravel_fi_quanlykho\\storage\\app/private\\livewire-tmp/FcxQhsN6z7Qqkb5dFzINHcawIrhgQ9-metacHJvZHVjdC1pbXBvcnQtZXhhbXBsZS5jc3Y=-.csv', 'App\\Filament\\Imports\\ProductImport', 1, 1, 1, '2025-11-16 13:15:48', '2025-11-16 13:15:48', '2025-11-16 13:15:48'),
(3, 1, 'product-import-example.csv', 'F:\\00000_DIVE_CODE\\000_THIETKEWEB\\laravel_fi_quanlykho\\storage\\app/private\\livewire-tmp/XdG8bGxymIwWcXNq5oNKqabZy1IGwN-metacHJvZHVjdC1pbXBvcnQtZXhhbXBsZS5jc3Y=-.csv', 'App\\Filament\\Imports\\ProductImport', 1, 0, 0, NULL, '2025-11-16 13:18:39', '2025-11-16 13:18:39'),
(4, 1, 'product-import-example.csv', 'F:\\00000_DIVE_CODE\\000_THIETKEWEB\\laravel_fi_quanlykho\\storage\\app/private\\livewire-tmp/Oo2BRZKoiMIXTTp3e0FJtVQovuYoeM-metacHJvZHVjdC1pbXBvcnQtZXhhbXBsZS5jc3Y=-.csv', 'App\\Filament\\Imports\\ProductImport', 1, 1, 1, '2025-11-16 13:19:12', '2025-11-16 13:19:12', '2025-11-16 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(258, 'default', '{\"uuid\":\"527da8c6-1dfe-4f38-8919-daa4929523f0\",\"displayName\":\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\ExportCsv\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":1763383359,\"data\":{\"commandName\":\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\ExportCsv\",\"command\":\"O:39:\\\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\ExportCsv\\\":8:{s:11:\\\"\\u0000*\\u0000exporter\\\";O:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\":3:{s:9:\\\"\\u0000*\\u0000export\\\";O:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";s:7:\\\"exports\\\";s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:0;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:9:{s:2:\\\"id\\\";i:1;s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194157\\\";s:12:\\\"completed_at\\\";N;s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:41:57\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:41:57\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:9:{s:2:\\\"id\\\";i:1;s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194157\\\";s:12:\\\"completed_at\\\";N;s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:41:57\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:41:57\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000export\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:8:\\\"\\u0000*\\u0000query\\\";s:838:\\\"O:36:\\\"AnourValar\\\\EloquentSerialize\\\\Package\\\":1:{s:42:\\\"\\u0000AnourValar\\\\EloquentSerialize\\\\Package\\u0000data\\\";a:4:{s:5:\\\"model\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:10:\\\"connection\\\";N;s:8:\\\"eloquent\\\";a:3:{s:4:\\\"with\\\";a:0:{}s:14:\\\"removed_scopes\\\";a:0:{}s:5:\\\"casts\\\";a:7:{s:2:\\\"id\\\";s:3:\\\"int\\\";s:14:\\\"purchase_price\\\";s:7:\\\"integer\\\";s:12:\\\"retail_price\\\";s:7:\\\"integer\\\";s:18:\\\"collaborator_price\\\";s:7:\\\"integer\\\";s:14:\\\"stock_quantity\\\";s:7:\\\"integer\\\";s:15:\\\"min_stock_alert\\\";s:7:\\\"integer\\\";s:9:\\\"is_active\\\";s:7:\\\"boolean\\\";}}s:5:\\\"query\\\";a:5:{s:8:\\\"bindings\\\";a:9:{s:6:\\\"select\\\";a:0:{}s:4:\\\"from\\\";a:0:{}s:4:\\\"join\\\";a:0:{}s:5:\\\"where\\\";a:0:{}s:7:\\\"groupBy\\\";a:0:{}s:6:\\\"having\\\";a:0:{}s:5:\\\"order\\\";a:0:{}s:5:\\\"union\\\";a:0:{}s:10:\\\"unionOrder\\\";a:0:{}}s:8:\\\"distinct\\\";b:0;s:4:\\\"from\\\";s:8:\\\"products\\\";s:6:\\\"wheres\\\";a:0:{}s:6:\\\"orders\\\";a:1:{i:0;a:2:{s:6:\\\"column\\\";s:10:\\\"created_at\\\";s:9:\\\"direction\\\";s:4:\\\"desc\\\";}}}}}\\\";s:10:\\\"\\u0000*\\u0000records\\\";a:10:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;}s:7:\\\"\\u0000*\\u0000page\\\";i:1;s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}s:7:\\\"batchId\\\";s:36:\\\"a05ef4e4-8918-4a18-baf6-e9d88081c909\\\";}\"},\"createdAt\":1763296959,\"delay\":null}', 255, NULL, 1763296965, 1763296965),
(259, 'default', '{\"uuid\":\"5915af54-7f68-4c0e-bb5d-bb1975e3ac05\",\"displayName\":\"Illuminate\\\\Bus\\\\ChainedBatch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Bus\\\\ChainedBatch\",\"command\":\"O:27:\\\"Illuminate\\\\Bus\\\\ChainedBatch\\\":15:{s:4:\\\"jobs\\\";O:29:\\\"Illuminate\\\\Support\\\\Collection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:46:\\\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\PrepareCsvExport\\\":7:{s:11:\\\"\\u0000*\\u0000exporter\\\";O:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\":3:{s:9:\\\"\\u0000*\\u0000export\\\";O:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";N;s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:1;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:1:{s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000export\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:8:\\\"\\u0000*\\u0000query\\\";s:838:\\\"O:36:\\\"AnourValar\\\\EloquentSerialize\\\\Package\\\":1:{s:42:\\\"\\u0000AnourValar\\\\EloquentSerialize\\\\Package\\u0000data\\\";a:4:{s:5:\\\"model\\\";s:18:\\\"App\\\\Models\\\\Product\\\";s:10:\\\"connection\\\";N;s:8:\\\"eloquent\\\";a:3:{s:4:\\\"with\\\";a:0:{}s:14:\\\"removed_scopes\\\";a:0:{}s:5:\\\"casts\\\";a:7:{s:2:\\\"id\\\";s:3:\\\"int\\\";s:14:\\\"purchase_price\\\";s:7:\\\"integer\\\";s:12:\\\"retail_price\\\";s:7:\\\"integer\\\";s:18:\\\"collaborator_price\\\";s:7:\\\"integer\\\";s:14:\\\"stock_quantity\\\";s:7:\\\"integer\\\";s:15:\\\"min_stock_alert\\\";s:7:\\\"integer\\\";s:9:\\\"is_active\\\";s:7:\\\"boolean\\\";}}s:5:\\\"query\\\";a:5:{s:8:\\\"bindings\\\";a:9:{s:6:\\\"select\\\";a:0:{}s:4:\\\"from\\\";a:0:{}s:4:\\\"join\\\";a:0:{}s:5:\\\"where\\\";a:0:{}s:7:\\\"groupBy\\\";a:0:{}s:6:\\\"having\\\";a:0:{}s:5:\\\"order\\\";a:0:{}s:5:\\\"union\\\";a:0:{}s:10:\\\"unionOrder\\\";a:0:{}}s:8:\\\"distinct\\\";b:0;s:4:\\\"from\\\";s:8:\\\"products\\\";s:6:\\\"wheres\\\";a:0:{}s:6:\\\"orders\\\";a:1:{i:0;a:2:{s:6:\\\"column\\\";s:10:\\\"created_at\\\";s:9:\\\"direction\\\";s:4:\\\"desc\\\";}}}}}\\\";s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}s:12:\\\"\\u0000*\\u0000chunkSize\\\";i:100;s:10:\\\"\\u0000*\\u0000records\\\";a:10:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;}}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}s:4:\\\"name\\\";s:0:\\\"\\\";s:7:\\\"options\\\";a:1:{s:13:\\\"allowFailures\\\";b:1;}s:7:\\\"batchId\\\";N;s:38:\\\"\\u0000Illuminate\\\\Bus\\\\ChainedBatch\\u0000fakeBatch\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:2:{i:0;s:3478:\\\"O:46:\\\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\ExportCompletion\\\":5:{s:11:\\\"\\u0000*\\u0000exporter\\\";O:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\":3:{s:9:\\\"\\u0000*\\u0000export\\\";O:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";N;s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:1;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:1:{s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000export\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000formats\\\";a:2:{i:0;E:47:\\\"Filament\\\\Actions\\\\Exports\\\\Enums\\\\ExportFormat:Csv\\\";i:1;E:48:\\\"Filament\\\\Actions\\\\Exports\\\\Enums\\\\ExportFormat:Xlsx\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}\\\";i:1;s:3333:\\\"O:44:\\\"Filament\\\\Actions\\\\Exports\\\\Jobs\\\\CreateXlsxFile\\\":4:{s:11:\\\"\\u0000*\\u0000exporter\\\";O:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\":3:{s:9:\\\"\\u0000*\\u0000export\\\";O:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\":33:{s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";N;s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:1;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:8:{s:7:\\\"user_id\\\";i:1;s:8:\\\"exporter\\\";s:34:\\\"App\\\\Filament\\\\Exports\\\\ProductExport\\\";s:10:\\\"total_rows\\\";i:10;s:9:\\\"file_disk\\\";s:5:\\\"local\\\";s:10:\\\"updated_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:10:\\\"created_at\\\";s:19:\\\"2025-11-16 19:43:39\\\";s:2:\\\"id\\\";i:2;s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:1:{s:9:\\\"file_name\\\";s:35:\\\"products-selected-2025-11-16-194339\\\";}s:11:\\\"\\u0000*\\u0000previous\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:4:{s:12:\\\"completed_at\\\";s:9:\\\"timestamp\\\";s:14:\\\"processed_rows\\\";s:7:\\\"integer\\\";s:10:\\\"total_rows\\\";s:7:\\\"integer\\\";s:15:\\\"successful_rows\\\";s:7:\\\"integer\\\";}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:27:\\\"\\u0000*\\u0000relationAutoloadCallback\\\";N;s:26:\\\"\\u0000*\\u0000relationAutoloadContext\\\";N;s:10:\\\"timestamps\\\";b:1;s:13:\\\"usesUniqueIds\\\";b:0;s:9:\\\"\\u0000*\\u0000hidden\\\";a:0:{}s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:11:\\\"\\u0000*\\u0000fillable\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:0:{}}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}s:9:\\\"\\u0000*\\u0000export\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:38:\\\"Filament\\\\Actions\\\\Exports\\\\Models\\\\Export\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"\\u0000*\\u0000columnMap\\\";a:14:{s:4:\\\"code\\\";s:16:\\\"Mã sản phẩm\\\";s:4:\\\"name\\\";s:17:\\\"Tên sản phẩm\\\";s:4:\\\"slug\\\";s:4:\\\"Slug\\\";s:13:\\\"category.name\\\";s:10:\\\"Danh mục\\\";s:12:\\\"variant.name\\\";s:16:\\\"Đơn vị tính\\\";s:12:\\\"variant.code\\\";s:20:\\\"Mã đơn vị tính\\\";s:14:\\\"purchase_price\\\";s:11:\\\"Giá nhập\\\";s:12:\\\"retail_price\\\";s:14:\\\"Giá bán lẻ\\\";s:18:\\\"collaborator_price\\\";s:22:\\\"Giá cộng tác viên\\\";s:14:\\\"stock_quantity\\\";s:23:\\\"Số lượng tồn kho\\\";s:15:\\\"min_stock_alert\\\";s:31:\\\"Cảnh báo tồn tối thiểu\\\";s:9:\\\"is_active\\\";s:10:\\\"Đang bán\\\";s:11:\\\"description\\\";s:8:\\\"Mô tả\\\";s:10:\\\"created_at\\\";s:11:\\\"Ngày tạo\\\";}s:10:\\\"\\u0000*\\u0000options\\\";a:0:{}}\\\";}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"},\"createdAt\":1763297019,\"delay\":null}', 0, NULL, 1763297019, 1763297019);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_batches`
--

INSERT INTO `job_batches` (`id`, `name`, `total_jobs`, `pending_jobs`, `failed_jobs`, `failed_job_ids`, `options`, `cancelled_at`, `created_at`, `finished_at`) VALUES
('a05ef4e4-8918-4a18-baf6-e9d88081c909', '', 2, 1, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:7364:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:1:{s:4:\"next\";O:46:\"Filament\\Actions\\Exports\\Jobs\\ExportCompletion\":7:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:41:57\";s:10:\"created_at\";s:19:\"2025-11-16 19:41:57\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:41:57\";s:10:\"created_at\";s:19:\"2025-11-16 19:41:57\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0formats\";a:2:{i:0;E:47:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Csv\";i:1;E:48:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Xlsx\";}s:10:\"\0*\0options\";a:0:{}s:7:\"chained\";a:1:{i:0;s:3333:\"O:44:\"Filament\\Actions\\Exports\\Jobs\\CreateXlsxFile\":4:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:41:57\";s:10:\"created_at\";s:19:\"2025-11-16 19:41:57\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:41:57\";s:10:\"created_at\";s:19:\"2025-11-16 19:41:57\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-194157\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}\";}s:19:\"chainCatchCallbacks\";a:0:{}}}s:8:\"function\";s:266:\"function (\\Illuminate\\Bus\\Batch $batch) use ($next) {\n                if (! $batch->cancelled()) {\n                    \\Illuminate\\Container\\Container::getInstance()->make(\\Illuminate\\Contracts\\Bus\\Dispatcher::class)->dispatch($next);\n                }\n            }\";s:5:\"scope\";s:27:\"Illuminate\\Bus\\ChainedBatch\";s:4:\"this\";N;s:4:\"self\";s:32:\"00000000000009c40000000000000000\";}\";s:4:\"hash\";s:44:\"r7+/eeMMt9j1ERB3VhNadJoSe09/EcF1SRaOpveAExo=\";}}}}', NULL, 1763296959, NULL),
('a05ef89b-2c78-48f8-8c47-506dfdc82790', '', 2, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:7310:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:1:{s:4:\"next\";O:46:\"Filament\\Actions\\Exports\\Jobs\\ExportCompletion\":7:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:15;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:53:02\";s:10:\"created_at\";s:19:\"2025-11-16 19:53:02\";s:2:\"id\";i:1;s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:15;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:53:02\";s:10:\"created_at\";s:19:\"2025-11-16 19:53:02\";s:2:\"id\";i:1;s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0formats\";a:2:{i:0;E:48:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Xlsx\";i:1;E:47:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Csv\";}s:10:\"\0*\0options\";a:0:{}s:7:\"chained\";a:1:{i:0;s:3306:\"O:44:\"Filament\\Actions\\Exports\\Jobs\\CreateXlsxFile\":4:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:15;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:53:02\";s:10:\"created_at\";s:19:\"2025-11-16 19:53:02\";s:2:\"id\";i:1;s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:15;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:53:02\";s:10:\"created_at\";s:19:\"2025-11-16 19:53:02\";s:2:\"id\";i:1;s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:26:\"products-2025-11-16-195302\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}\";}s:19:\"chainCatchCallbacks\";a:0:{}}}s:8:\"function\";s:266:\"function (\\Illuminate\\Bus\\Batch $batch) use ($next) {\n                if (! $batch->cancelled()) {\n                    \\Illuminate\\Container\\Container::getInstance()->make(\\Illuminate\\Contracts\\Bus\\Dispatcher::class)->dispatch($next);\n                }\n            }\";s:5:\"scope\";s:27:\"Illuminate\\Bus\\ChainedBatch\";s:4:\"this\";N;s:4:\"self\";s:32:\"00000000000008760000000000000000\";}\";s:4:\"hash\";s:44:\"+2khGkGUe8aKDt7DTCWXTXSYs0QZ+PIayJ3zOres5sc=\";}}}}', NULL, 1763297582, 1763297582),
('a05ef92b-10d4-4593-8526-1c9ad1a1a9e8', '', 2, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:6940:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:1:{s:4:\"next\";O:46:\"Filament\\Actions\\Exports\\Jobs\\ExportCompletion\":7:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:5;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:54:37\";s:10:\"created_at\";s:19:\"2025-11-16 19:54:37\";s:2:\"id\";i:2;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:5;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:54:37\";s:10:\"created_at\";s:19:\"2025-11-16 19:54:37\";s:2:\"id\";i:2;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:11:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:2;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:11:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";}s:10:\"\0*\0formats\";a:2:{i:0;E:47:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Csv\";i:1;E:48:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Xlsx\";}s:10:\"\0*\0options\";a:0:{}s:7:\"chained\";a:1:{i:0;s:3121:\"O:44:\"Filament\\Actions\\Exports\\Jobs\\CreateXlsxFile\":4:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:5;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:54:37\";s:10:\"created_at\";s:19:\"2025-11-16 19:54:37\";s:2:\"id\";i:2;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:5;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:54:37\";s:10:\"created_at\";s:19:\"2025-11-16 19:54:37\";s:2:\"id\";i:2;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195437\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:11:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:2;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:11:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";}s:10:\"\0*\0options\";a:0:{}}\";}s:19:\"chainCatchCallbacks\";a:0:{}}}s:8:\"function\";s:266:\"function (\\Illuminate\\Bus\\Batch $batch) use ($next) {\n                if (! $batch->cancelled()) {\n                    \\Illuminate\\Container\\Container::getInstance()->make(\\Illuminate\\Contracts\\Bus\\Dispatcher::class)->dispatch($next);\n                }\n            }\";s:5:\"scope\";s:27:\"Illuminate\\Bus\\ChainedBatch\";s:4:\"this\";N;s:4:\"self\";s:32:\"000000000000127b0000000000000000\";}\";s:4:\"hash\";s:44:\"IJsnPVJTkhdd78rD/t1aUqyvTfoaQeN8Dp2nvBPZmJw=\";}}}}', NULL, 1763297677, 1763297677),
('a05ef97e-b045-4436-9f76-13512e05566e', '', 2, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:7360:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:1:{s:4:\"next\";O:46:\"Filament\\Actions\\Exports\\Jobs\\ExportCompletion\":7:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:2;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:55:31\";s:10:\"created_at\";s:19:\"2025-11-16 19:55:31\";s:2:\"id\";i:3;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:2;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:55:31\";s:10:\"created_at\";s:19:\"2025-11-16 19:55:31\";s:2:\"id\";i:3;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:3;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0formats\";a:2:{i:0;E:47:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Csv\";i:1;E:48:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Xlsx\";}s:10:\"\0*\0options\";a:0:{}s:7:\"chained\";a:1:{i:0;s:3331:\"O:44:\"Filament\\Actions\\Exports\\Jobs\\CreateXlsxFile\":4:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:2;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:55:31\";s:10:\"created_at\";s:19:\"2025-11-16 19:55:31\";s:2:\"id\";i:3;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:2;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 19:55:31\";s:10:\"created_at\";s:19:\"2025-11-16 19:55:31\";s:2:\"id\";i:3;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-195531\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:3;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:14:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:4:\"slug\";s:4:\"Slug\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}\";}s:19:\"chainCatchCallbacks\";a:0:{}}}s:8:\"function\";s:266:\"function (\\Illuminate\\Bus\\Batch $batch) use ($next) {\n                if (! $batch->cancelled()) {\n                    \\Illuminate\\Container\\Container::getInstance()->make(\\Illuminate\\Contracts\\Bus\\Dispatcher::class)->dispatch($next);\n                }\n            }\";s:5:\"scope\";s:27:\"Illuminate\\Bus\\ChainedBatch\";s:4:\"this\";N;s:4:\"self\";s:32:\"000000000000127b0000000000000000\";}\";s:4:\"hash\";s:44:\"xFAP4UcwZWkEAD6zlrDkOGNixRT245O6XTEIIVLbXXU=\";}}}}', NULL, 1763297731, 1763297732),
('a05f00bf-60dc-4423-93c1-5cc6d6055b34', '', 1, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:3841:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:4:{s:9:\"columnMap\";a:12:{s:4:\"code\";s:4:\"code\";s:4:\"name\";s:4:\"name\";s:4:\"slug\";s:4:\"slug\";s:8:\"category\";s:8:\"category\";s:7:\"variant\";s:7:\"variant\";s:14:\"purchase_price\";s:14:\"purchase_price\";s:12:\"retail_price\";s:12:\"retail_price\";s:18:\"collaborator_price\";s:18:\"collaborator_price\";s:14:\"stock_quantity\";s:14:\"stock_quantity\";s:15:\"min_stock_alert\";s:15:\"min_stock_alert\";s:9:\"is_active\";s:9:\"is_active\";s:11:\"description\";s:11:\"description\";}s:6:\"import\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Imports\\Models\\Import\";s:2:\"id\";i:2;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:13:\"jobConnection\";N;s:7:\"options\";a:0:{}}s:8:\"function\";s:2925:\"function () use ($columnMap, $import, $jobConnection, $options) {\n                    $import->touch(\'completed_at\');\n\n                    event(new \\Filament\\Actions\\Imports\\Events\\ImportCompleted($import, $columnMap, $options));\n\n                    if (! $import->user instanceof \\Illuminate\\Contracts\\Auth\\Authenticatable) {\n                        return;\n                    }\n\n                    $failedRowsCount = $import->getFailedRowsCount();\n\n                    \\Filament\\Notifications\\Notification::make()\n                        ->title($import->importer::getCompletedNotificationTitle($import))\n                        ->body($import->importer::getCompletedNotificationBody($import))\n                        ->when(\n                            ! $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->success(),\n                        )\n                        ->when(\n                            $failedRowsCount && ($failedRowsCount < $import->total_rows),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->warning(),\n                        )\n                        ->when(\n                            $failedRowsCount === $import->total_rows,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->danger(),\n                        )\n                        ->when(\n                            $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->actions([\n                                \\Filament\\Notifications\\Actions\\Action::make(\'downloadFailedRowsCsv\')\n                                    ->label(trans_choice(\'filament-actions::import.notifications.completed.actions.download_failed_rows_csv.label\', $failedRowsCount, [\n                                        \'count\' => \\Illuminate\\Support\\Number::format($failedRowsCount),\n                                    ]))\n                                    ->color(\'danger\')\n                                    ->url(route(\'filament.imports.failed-rows.download\', [\'import\' => $import], absolute: false), shouldOpenInNewTab: true)\n                                    ->markAsRead(),\n                            ]),\n                        )\n                        ->when(\n                            ($jobConnection === \'sync\') ||\n                                (blank($jobConnection) && (config(\'queue.default\') === \'sync\')),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification\n                                ->persistent()\n                                ->send(),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->sendToDatabase($import->user, isEventDispatched: true),\n                        );\n                }\";s:5:\"scope\";s:29:\"Filament\\Actions\\ImportAction\";s:4:\"this\";N;s:4:\"self\";s:32:\"0000000000000df20000000000000000\";}\";s:4:\"hash\";s:44:\"HBXupyqOHzQflesrUrXHn0Gtru45DL7VWWKTgp7CsSc=\";}}}}', NULL, 1763298948, 1763298948),
('a05f01f6-11d3-44e5-92d0-d118468b29b5', '', 1, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:3841:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:4:{s:9:\"columnMap\";a:12:{s:4:\"code\";s:4:\"code\";s:4:\"name\";s:4:\"name\";s:4:\"slug\";s:4:\"slug\";s:8:\"category\";s:8:\"category\";s:7:\"variant\";s:7:\"variant\";s:14:\"purchase_price\";s:14:\"purchase_price\";s:12:\"retail_price\";s:12:\"retail_price\";s:18:\"collaborator_price\";s:18:\"collaborator_price\";s:14:\"stock_quantity\";s:14:\"stock_quantity\";s:15:\"min_stock_alert\";s:15:\"min_stock_alert\";s:9:\"is_active\";s:9:\"is_active\";s:11:\"description\";s:11:\"description\";}s:6:\"import\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Imports\\Models\\Import\";s:2:\"id\";i:4;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:13:\"jobConnection\";N;s:7:\"options\";a:0:{}}s:8:\"function\";s:2925:\"function () use ($columnMap, $import, $jobConnection, $options) {\n                    $import->touch(\'completed_at\');\n\n                    event(new \\Filament\\Actions\\Imports\\Events\\ImportCompleted($import, $columnMap, $options));\n\n                    if (! $import->user instanceof \\Illuminate\\Contracts\\Auth\\Authenticatable) {\n                        return;\n                    }\n\n                    $failedRowsCount = $import->getFailedRowsCount();\n\n                    \\Filament\\Notifications\\Notification::make()\n                        ->title($import->importer::getCompletedNotificationTitle($import))\n                        ->body($import->importer::getCompletedNotificationBody($import))\n                        ->when(\n                            ! $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->success(),\n                        )\n                        ->when(\n                            $failedRowsCount && ($failedRowsCount < $import->total_rows),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->warning(),\n                        )\n                        ->when(\n                            $failedRowsCount === $import->total_rows,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->danger(),\n                        )\n                        ->when(\n                            $failedRowsCount,\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->actions([\n                                \\Filament\\Notifications\\Actions\\Action::make(\'downloadFailedRowsCsv\')\n                                    ->label(trans_choice(\'filament-actions::import.notifications.completed.actions.download_failed_rows_csv.label\', $failedRowsCount, [\n                                        \'count\' => \\Illuminate\\Support\\Number::format($failedRowsCount),\n                                    ]))\n                                    ->color(\'danger\')\n                                    ->url(route(\'filament.imports.failed-rows.download\', [\'import\' => $import], absolute: false), shouldOpenInNewTab: true)\n                                    ->markAsRead(),\n                            ]),\n                        )\n                        ->when(\n                            ($jobConnection === \'sync\') ||\n                                (blank($jobConnection) && (config(\'queue.default\') === \'sync\')),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification\n                                ->persistent()\n                                ->send(),\n                            fn (\\Filament\\Notifications\\Notification $notification) => $notification->sendToDatabase($import->user, isEventDispatched: true),\n                        );\n                }\";s:5:\"scope\";s:29:\"Filament\\Actions\\ImportAction\";s:4:\"this\";N;s:4:\"self\";s:32:\"0000000000000df20000000000000000\";}\";s:4:\"hash\";s:44:\"plWDtXRo72xkMO8WVnu7KumKJHjj1QwpWaiGT9DrQmM=\";}}}}', NULL, 1763299152, 1763299152);
INSERT INTO `job_batches` (`id`, `name`, `total_jobs`, `pending_jobs`, `failed_jobs`, `failed_job_ids`, `options`, `cancelled_at`, `created_at`, `finished_at`) VALUES
('a05f0271-efb7-4a63-ab44-e074f5d56a1b', '', 2, 0, 0, '[]', 'a:2:{s:13:\"allowFailures\";b:1;s:7:\"finally\";a:1:{i:0;O:47:\"Laravel\\SerializableClosure\\SerializableClosure\":1:{s:12:\"serializable\";O:46:\"Laravel\\SerializableClosure\\Serializers\\Signed\":2:{s:12:\"serializable\";s:7276:\"O:46:\"Laravel\\SerializableClosure\\Serializers\\Native\":5:{s:3:\"use\";a:1:{s:4:\"next\";O:46:\"Filament\\Actions\\Exports\\Jobs\\ExportCompletion\":7:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 20:20:33\";s:10:\"created_at\";s:19:\"2025-11-16 20:20:33\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 20:20:33\";s:10:\"created_at\";s:19:\"2025-11-16 20:20:33\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:13:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:13:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0formats\";a:2:{i:0;E:47:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Csv\";i:1;E:48:\"Filament\\Actions\\Exports\\Enums\\ExportFormat:Xlsx\";}s:10:\"\0*\0options\";a:0:{}s:7:\"chained\";a:1:{i:0;s:3289:\"O:44:\"Filament\\Actions\\Exports\\Jobs\\CreateXlsxFile\":4:{s:11:\"\0*\0exporter\";O:34:\"App\\Filament\\Exports\\ProductExport\":3:{s:9:\"\0*\0export\";O:38:\"Filament\\Actions\\Exports\\Models\\Export\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:1;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 20:20:33\";s:10:\"created_at\";s:19:\"2025-11-16 20:20:33\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:11:\"\0*\0original\";a:8:{s:7:\"user_id\";i:1;s:8:\"exporter\";s:34:\"App\\Filament\\Exports\\ProductExport\";s:10:\"total_rows\";i:10;s:9:\"file_disk\";s:5:\"local\";s:10:\"updated_at\";s:19:\"2025-11-16 20:20:33\";s:10:\"created_at\";s:19:\"2025-11-16 20:20:33\";s:2:\"id\";i:1;s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:10:\"\0*\0changes\";a:1:{s:9:\"file_name\";s:35:\"products-selected-2025-11-16-202033\";}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"completed_at\";s:9:\"timestamp\";s:14:\"processed_rows\";s:7:\"integer\";s:10:\"total_rows\";s:7:\"integer\";s:15:\"successful_rows\";s:7:\"integer\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}s:12:\"\0*\0columnMap\";a:13:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}s:9:\"\0*\0export\";O:45:\"Illuminate\\Contracts\\Database\\ModelIdentifier\":5:{s:5:\"class\";s:38:\"Filament\\Actions\\Exports\\Models\\Export\";s:2:\"id\";i:1;s:9:\"relations\";a:0:{}s:10:\"connection\";s:5:\"mysql\";s:15:\"collectionClass\";N;}s:12:\"\0*\0columnMap\";a:13:{s:4:\"code\";s:16:\"Mã sản phẩm\";s:4:\"name\";s:17:\"Tên sản phẩm\";s:13:\"category.name\";s:10:\"Danh mục\";s:12:\"variant.name\";s:16:\"Đơn vị tính\";s:12:\"variant.code\";s:20:\"Mã đơn vị tính\";s:14:\"purchase_price\";s:11:\"Giá nhập\";s:12:\"retail_price\";s:14:\"Giá bán lẻ\";s:18:\"collaborator_price\";s:22:\"Giá cộng tác viên\";s:14:\"stock_quantity\";s:23:\"Số lượng tồn kho\";s:15:\"min_stock_alert\";s:31:\"Cảnh báo tồn tối thiểu\";s:9:\"is_active\";s:10:\"Đang bán\";s:11:\"description\";s:8:\"Mô tả\";s:10:\"created_at\";s:11:\"Ngày tạo\";}s:10:\"\0*\0options\";a:0:{}}\";}s:19:\"chainCatchCallbacks\";a:0:{}}}s:8:\"function\";s:266:\"function (\\Illuminate\\Bus\\Batch $batch) use ($next) {\n                if (! $batch->cancelled()) {\n                    \\Illuminate\\Container\\Container::getInstance()->make(\\Illuminate\\Contracts\\Bus\\Dispatcher::class)->dispatch($next);\n                }\n            }\";s:5:\"scope\";s:27:\"Illuminate\\Bus\\ChainedBatch\";s:4:\"this\";N;s:4:\"self\";s:32:\"000000000000127b0000000000000000\";}\";s:4:\"hash\";s:44:\"3w1KgNJjFzO5X6r8qlL1bKDDS7KGdMGsxh6plN0vIJ0=\";}}}}', NULL, 1763299233, 1763299233);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2025_09_03_055718_create_permission_tables', 1),
(17, '000010_create_categories_table', 2),
(18, '000020_create_product_variants_table', 2),
(19, '000030_create_suppliers_table', 2),
(20, '000040_create_customer_types_table', 2),
(21, '000050_create_products_table', 2),
(22, '000060_create_customers_table', 2),
(25, '000070_create_purchase_orders_table', 3),
(26, '000080__create_purchase_order_items_table', 3),
(27, '000090_create_orders_table', 4),
(28, '000100_create_order_items_table', 4),
(29, '000110_create_order_payments_table', 4),
(36, '2025_11_16_194007_create_imports_table', 5),
(37, '2025_11_16_194015_create_exports_table', 5),
(38, '2025_11_16_194118_create_failed_import_rows_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã đơn hàng',
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `order_date` datetime NOT NULL COMMENT 'Ngày bán',
  `total_amount` int NOT NULL DEFAULT '0' COMMENT 'Tổng tiền (VND)',
  `discount_amount` int NOT NULL DEFAULT '0' COMMENT 'Giảm giá (VND)',
  `grand_total` int NOT NULL DEFAULT '0' COMMENT 'Tổng thanh toán (VND)',
  `paid_amount` int NOT NULL DEFAULT '0' COMMENT 'Đã thanh toán (VND)',
  `debt_amount` int NOT NULL DEFAULT '0' COMMENT 'Còn nợ (VND)',
  `deposit_amount` int NOT NULL DEFAULT '0' COMMENT 'Tiền đặt cọc (VND)',
  `payment_status` enum('paid','partial','deposit','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid' COMMENT 'Trạng thái thanh toán',
  `order_status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'Trạng thái đơn hàng',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `order_date`, `total_amount`, `discount_amount`, `grand_total`, `paid_amount`, `debt_amount`, `deposit_amount`, `payment_status`, `order_status`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ORD-20251116-0001', 7, '2025-11-16 16:40:00', 625000, 0, 625000, 625000, 0, 0, 'paid', 'completed', NULL, 1, '2025-11-16 02:16:19', '2025-11-16 10:29:25'),
(2, 'ORD-20251116-0002', 7, '2025-11-16 16:50:00', 3700000, 0, 3700000, 3700000, 0, 0, 'paid', 'completed', NULL, 1, '2025-11-16 09:51:01', '2025-11-16 12:13:04'),
(3, 'ORD-20251116-00003', 8, '2025-11-16 17:23:00', 575000, 0, 575000, 500000, 75000, 0, 'partial', 'pending', NULL, 1, '2025-11-16 10:24:27', '2025-11-16 15:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL COMMENT 'Số lượng',
  `unit_price` int NOT NULL COMMENT 'Đơn giá bán (VND)',
  `total_price` int NOT NULL COMMENT 'Thành tiền (VND)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 35000, 175000, '2025-11-16 02:16:19', '2025-11-16 02:16:19'),
(2, 1, 2, 10, 45000, 450000, '2025-11-16 02:16:19', '2025-11-16 02:16:19'),
(3, 2, 1, 20, 35000, 700000, '2025-11-16 09:51:01', '2025-11-16 09:51:01'),
(4, 2, 3, 20, 150000, 3000000, '2025-11-16 09:51:01', '2025-11-16 09:51:01'),
(5, 3, 1, 10, 35000, 350000, '2025-11-16 10:24:27', '2025-11-16 10:24:27'),
(6, 3, 2, 5, 45000, 225000, '2025-11-16 10:24:27', '2025-11-16 10:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `payment_date` datetime NOT NULL COMMENT 'Ngày thanh toán',
  `amount` int NOT NULL COMMENT 'Số tiền thanh toán (VND)',
  `payment_method` enum('cash','bank_transfer','card','e_wallet','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash' COMMENT 'Phương thức',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `order_id`, `payment_date`, `amount`, `payment_method`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 1, '2025-11-16 16:32:48', 600000, 'cash', 'Thanh toán 600000', 1, '2025-11-16 09:32:58', '2025-11-16 09:32:58'),
(5, 1, '2025-11-16 17:29:13', 25000, 'cash', 'Thanh toán 25000 còn lại', 1, '2025-11-16 10:29:25', '2025-11-16 10:29:25'),
(6, 2, '2025-11-16 17:30:17', 3700000, 'cash', 'Thanh toán 3700000 - 16/11/2025', 1, '2025-11-16 10:30:43', '2025-11-16 10:30:43'),
(8, 3, '2025-11-16 22:37:40', 500000, 'cash', 'Thanh toán trước 500000', 1, '2025-11-16 15:37:55', '2025-11-16 15:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(2, 'view_any_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(3, 'create_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(4, 'update_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(5, 'delete_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(6, 'delete_any_category', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(7, 'view_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(8, 'view_any_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(9, 'create_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(10, 'update_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(11, 'delete_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(12, 'delete_any_post', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(13, 'view_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(14, 'view_any_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(15, 'create_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(16, 'update_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(17, 'delete_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(18, 'delete_any_post::meta', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(19, 'view_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(20, 'view_any_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(21, 'create_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(22, 'update_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(23, 'delete_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(24, 'delete_any_role', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(25, 'view_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(26, 'view_any_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(27, 'create_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(28, 'update_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(29, 'delete_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(30, 'delete_any_tag', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(31, 'widget_BlogStatsWidget', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(32, 'widget_RecentPostsWidget', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(33, 'widget_PostViewsChartWidget', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(34, 'widget_PopularPostsWidget', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(35, 'widget_CategoryStatsWidget', 'web', '2025-09-02 23:19:52', '2025-09-02 23:19:52'),
(36, 'view_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(37, 'view_any_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(38, 'create_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(39, 'update_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(40, 'delete_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(41, 'delete_any_user', 'web', '2025-09-02 23:43:00', '2025-09-02 23:43:00'),
(42, 'view_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(43, 'view_any_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(44, 'create_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(45, 'update_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(46, 'delete_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(47, 'delete_any_customer', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(48, 'view_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(49, 'view_any_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(50, 'create_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(51, 'update_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(52, 'delete_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(53, 'delete_any_customer::type', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(54, 'view_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(55, 'view_any_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(56, 'create_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(57, 'update_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(58, 'delete_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(59, 'delete_any_product', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(60, 'view_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(61, 'view_any_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(62, 'create_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(63, 'update_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(64, 'delete_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(65, 'delete_any_product::variant', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(66, 'view_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(67, 'view_any_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(68, 'create_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(69, 'update_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(70, 'delete_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(71, 'delete_any_supplier', 'web', '2025-11-15 06:55:00', '2025-11-15 06:55:00'),
(72, 'view_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(73, 'view_any_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(74, 'create_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(75, 'update_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(76, 'delete_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(77, 'delete_any_order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(78, 'view_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(79, 'view_any_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(80, 'create_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(81, 'update_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(82, 'delete_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(83, 'delete_any_order::payment', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(84, 'view_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(85, 'view_any_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(86, 'create_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(87, 'update_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(88, 'delete_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18'),
(89, 'delete_any_purchase::order', 'web', '2025-11-16 16:24:18', '2025-11-16 16:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã sản phẩm',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Đường dẫn hình ảnh',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `variant_id` bigint UNSIGNED DEFAULT NULL,
  `purchase_price` int NOT NULL DEFAULT '0' COMMENT 'Giá nhập (VND)',
  `retail_price` int NOT NULL DEFAULT '0' COMMENT 'Giá bán lẻ (VND)',
  `collaborator_price` int NOT NULL DEFAULT '0' COMMENT 'Giá công tác viên (VND)',
  `stock_quantity` int NOT NULL DEFAULT '0' COMMENT 'Số lượng tồn kho',
  `min_stock_alert` int NOT NULL DEFAULT '0' COMMENT 'Cảnh báo tồn kho tối thiểu',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `description`, `image`, `category_id`, `variant_id`, `purchase_price`, `retail_price`, `collaborator_price`, `stock_quantity`, `min_stock_alert`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SP001', 'Sản phẩm  new mẫu', 'san-pham-mau', 'Mô tả sản phẩm', NULL, 27, NULL, 100000, 150000, 130000, 100, 10, 1, '2025-11-15 07:15:03', '2025-11-16 13:15:48'),
(2, 'SP002', 'Xà lách Đà Lạt', 'xa-lach-da-lat', 'Xà lách sạch, giòn ngon', NULL, NULL, NULL, 30000, 45000, 38000, 100, 15, 1, '2025-11-15 07:15:03', '2025-11-16 01:42:09'),
(3, 'SP003', 'Thịt ba chỉ heo', 'thit-ba-chi-heo', 'Thịt ba chỉ heo tươi, thịt sạch VietGAP', NULL, NULL, NULL, 120000, 150000, 135000, 20, 10, 1, '2025-11-15 07:15:03', '2025-11-16 12:13:04'),
(4, 'SP004', 'Thịt bò úc', 'thit-bo-uc', 'Thịt bò nhập khẩu từ Úc, đông lạnh', NULL, NULL, NULL, 280000, 350000, 315000, 20, 5, 1, '2025-11-15 07:15:03', '2025-11-16 12:08:26'),
(5, 'SP005', 'Tôm sú tươi', 'tom-su-tuoi', 'Tôm sú tươi sống, size 20-30 con/kg', NULL, NULL, NULL, 350000, 450000, 400000, 25, 5, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(6, 'SP006', 'Cá hồi Na Uy', 'ca-hoi-na-uy', 'Cá hồi phi lê nhập khẩu Na Uy', NULL, NULL, NULL, 420000, 550000, 485000, 0, 5, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(7, 'SP007', 'Táo Fuji Nhật Bản', 'tao-fuji-nhat-ban', 'Táo Fuji nhập khẩu từ Nhật Bản, ngọt giòn', NULL, NULL, NULL, 85000, 120000, 100000, 100, 20, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(8, 'SP008', 'Cam sành Hà Giang', 'cam-sanh-ha-giang', 'Cam sành tươi từ Hà Giang', NULL, NULL, NULL, 35000, 50000, 42000, 200, 30, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(9, 'SP009', 'Coca Cola 330ml', 'coca-cola-330ml', 'Nước ngọt Coca Cola lon 330ml', NULL, NULL, NULL, 8000, 12000, 10000, 500, 100, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(10, 'SP010', 'Bia Tiger 330ml', 'bia-tiger-330ml', 'Bia Tiger lon 330ml', NULL, NULL, NULL, 12000, 17000, 14500, 300, 50, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(11, 'SP011', 'Gạo ST25', 'gao-st25', 'Gạo ST25 Sóc Trăng, gạo ngon nhất thế giới', NULL, NULL, NULL, 30000, 40000, 35000, 1000, 100, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(12, 'SP012', 'Gạo Jasmine', 'gao-jasmine', 'Gạo thơm Jasmine cao cấp', NULL, NULL, NULL, 22000, 30000, 26000, 800, 100, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(13, 'SP013', 'Sữa tươi Vinamilk 1L', 'sua-tuoi-vinamilk-1l', 'Sữa tươi tiệt trùng Vinamilk hộp 1 lít', NULL, NULL, NULL, 28000, 38000, 33000, 150, 30, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(14, 'SP014', 'Nước mắm Nam Ngư', 'nuoc-mam-nam-ngu', 'Nước mắm Nam Ngư 650ml', NULL, NULL, NULL, 22000, 30000, 26000, 200, 40, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(15, 'SP015', 'Bánh Oreo', 'banh-oreo', 'Bánh quy Oreo vani 137g', NULL, NULL, NULL, 15000, 22000, 18500, 12, 50, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(17, 'SP0016', 'Sản hot phẩm  new mẫu', 'san-ph222am-mau', 'Mô tả sản phẩm', NULL, 29, NULL, 100000, 150000, 130000, 200, 10, 1, '2025-11-16 13:19:12', '2025-11-16 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Chai, hộp, lốc, lon, thùng...',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Chai', 'Đơn vị tính cho chai lẻ (bia, nước ngọt, nước suối...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(2, 'Lon', 'Đơn vị tính cho lon lẻ (bia, nước ngọt, nước tăng lực...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(3, 'Hộp', 'Đơn vị tính cho hộp giấy (sữa, nước trái cây...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(4, 'Lốc 6', 'Lốc 6 chai hoặc 6 lon - đóng gói sẵn', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(5, 'Lốc 4', 'Lốc 4 chai hoặc 4 lon - đóng gói sẵn', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(6, 'Thùng 24', 'Thùng 24 chai/lon - đơn vị bán buôn', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(7, 'Thùng 20', 'Thùng 20 chai/lon - đơn vị bán buôn', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(8, 'Thùng 12', 'Thùng 12 chai - đơn vị bán buôn (chai lớn)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(9, 'Két', 'Két bia hoặc nước ngọt (20-24 chai/lon)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(10, 'Bình', 'Bình lớn (nước suối, nước khoáng 5L, 10L, 20L)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(11, 'Chai lớn', 'Chai lớn 1.5L, 2L (nước ngọt, nước suối...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(12, 'Chai nhỏ', 'Chai nhỏ 330ml, 350ml', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(13, 'Túi', 'Đóng gói dạng túi (sữa, nước trái cây...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(14, 'Gói', 'Đóng gói dạng gói nhỏ (trà, cà phê...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(15, 'Bộ', 'Bộ combo nhiều sản phẩm', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(16, 'Cặp', 'Cặp 2 chai/lon (quà tặng, khuyến mãi)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(17, 'Vỉ', 'Vỉ nhỏ 4-6 hộp (sữa chua uống, nước trái cây...)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(18, 'Chai thủy tinh', 'Chai thủy tinh truyền thống (450ml, 500ml)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(19, 'Chai nhựa', 'Chai nhựa các loại (330ml - 2L)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(20, 'Keg', 'Thùng keg bia tươi (20L, 30L, 50L)', 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(21, 'Hũ', 'Đơn vị tính cũ, không còn sử dụng', 0, '2025-11-15 07:15:03', '2025-11-15 07:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã phiếu nhập',
  `supplier_id` bigint UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL COMMENT 'Ngày nhập',
  `total_amount` int NOT NULL DEFAULT '0' COMMENT 'Tổng tiền hàng (VND)',
  `shipping_fee` int NOT NULL DEFAULT '0' COMMENT 'Phí ship (VND)',
  `other_fees` int NOT NULL DEFAULT '0' COMMENT 'Chi phí khác (VND)',
  `grand_total` int NOT NULL DEFAULT '0' COMMENT 'Tổng cộng (VND)',
  `paid_amount` int NOT NULL DEFAULT '0' COMMENT 'Đã thanh toán (VND)',
  `debt_amount` int NOT NULL DEFAULT '0' COMMENT 'Còn nợ NCC (VND)',
  `payment_status` enum('paid','partial','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid' COMMENT 'Trạng thái thanh toán',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `code`, `supplier_id`, `purchase_date`, `total_amount`, `shipping_fee`, `other_fees`, `grand_total`, `paid_amount`, `debt_amount`, `payment_status`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PN2511160001', 9, '2025-11-16', 725000, 0, 0, 725000, 0, 725000, 'unpaid', NULL, 1, '2025-11-16 01:41:37', '2025-11-16 01:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL COMMENT 'Số lượng',
  `unit_price` int NOT NULL COMMENT 'Đơn giá nhập (VND)',
  `total_price` int NOT NULL COMMENT 'Thành tiền (VND)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `purchase_order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 25000, 125000, '2025-11-16 01:41:37', '2025-11-16 01:41:37'),
(2, 1, 2, 20, 30000, 600000, '2025-11-16 01:41:37', '2025-11-16 01:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-09-02 23:18:33', '2025-09-02 23:18:33'),
(2, 'Khách hàng', 'web', '2025-09-02 23:41:45', '2025-10-13 00:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bprHykxH7WJHru2ZOCcquqhDrXxzUncOdfsCo9Fv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiakJodXdSVU5OQnV1b21FY2JBVldpdGxEaTVmSTRnQkFmeTkyWHVlQSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc2hpZWxkL3JvbGVzLzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRsYzVnLjJ1bkJ0akJ5R0dCelZvTkx1NmpNMC9BMmR3UmNZVE44RHdPc0RWdzZxRnhFQ3N1aSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1763310280);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã NCC',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhà cung cấp',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Người liên hệ',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_debt` int NOT NULL DEFAULT '0' COMMENT 'Tổng công nợ hiện tại (VND)',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `code`, `name`, `phone`, `email`, `address`, `contact_person`, `notes`, `total_debt`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'NCC001', 'Công ty TNHH Thực phẩm An Phát', '0901234567', 'contact@anphat.com.vn', '123 Nguyễn Văn Linh, Quận 7, TP.HCM', 'Nguyễn Văn An', 'Nhà cung cấp thực phẩm hàng đầu tại TP.HCM', 50000000, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(2, 'NCC002', 'Công ty CP Đồ uống Sài Gòn', '0912345678', 'info@saigondrink.vn', '456 Võ Văn Tần, Quận 3, TP.HCM', 'Trần Thị Bình', 'Chuyên cung cấp đồ uống các loại', 0, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(3, 'NCC003', 'Công ty TNHH Rau sạch Đà Lạt', '0923456789', 'dalat@freshvegetable.vn', '789 Hoàng Văn Thụ, Phường 4, Đà Lạt, Lâm Đồng', 'Lê Văn Châu', 'Rau sạch chất lượng cao từ Đà Lạt', 25000000, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(4, 'NCC004', 'Công ty CP Thủy sản Việt Nam', '0934567890', 'sales@seafoodvn.com', '321 Điện Biên Phủ, Quận Bình Thạnh, TP.HCM', 'Phạm Thị Dung', 'Hải sản tươi sống, đông lạnh chất lượng', 75000000, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(5, 'NCC005', 'Công ty TNHH Gia vị Hương Việt', '0945678901', 'huongviet@spices.vn', '654 Lê Hồng Phong, Quận 10, TP.HCM', 'Hoàng Văn Em', 'Gia vị và nguyên liệu nấu ăn', 0, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(6, 'NCC006', 'Công ty CP Sữa và Dairy Việt Nam', '0956789012', 'dairy@milkvn.com', '147 Trường Chinh, Quận Tân Bình, TP.HCM', 'Vũ Thị Phương', 'Sản phẩm từ sữa: sữa tươi, bơ, phô mai', 30000000, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(7, 'NCC007', 'Công ty TNHH Thịt sạch An Toàn', '0967890123', 'safemeat@gmail.com', '258 Phan Đăng Lưu, Quận Phú Nhuận, TP.HCM', 'Đỗ Văn Giang', 'Thịt heo, thịt bò đạt chuẩn VietGAP', 45000000, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(8, 'NCC008', 'Công ty CP Bánh kẹo Kinh Đô', '0978901234', 'kinhdo@sweets.vn', '369 Nguyễn Trãi, Quận 1, TP.HCM', 'Lý Thị Hoa', 'Bánh kẹo, đồ ăn vặt các loại', 0, 1, '2025-11-15 07:15:03', '2025-11-15 07:15:03'),
(9, 'NCC009', 'Công ty TNHH Gạo Trung An', '0989012345', 'trungan@rice.com.vn', '741 Quốc lộ 1A, Huyện Bình Chánh, TP.HCM', 'Ngô Văn Ích', 'Gạo sạch các loại, đặc sản Đồng bằng sông Cửu Long', 725000, 1, '2025-11-15 07:15:03', '2025-11-16 01:41:37'),
(10, 'NCC010', 'Công ty CP Đồ khô Miền Trung', '0990123456', 'mientrung@dryfood.vn', '852 Lý Thường Kiệt, Quận 11, TP.HCM', 'Trương Văn Khanh', 'Mực khô, cá khô, tôm khô', 0, 0, '2025-11-15 07:15:03', '2025-11-15 07:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `avatar_url`, `email`, `password`, `phone`, `remember_token`, `email_verified_at`, `role`, `google_id`, `created_at`, `updated_at`) VALUES
(1, 'Test User', NULL, NULL, 'admin@gmail.com', '$2y$12$lc5g.2unBtjByGGBzVoNLu6jM0/A2dwRcYTN8DwOsDVw6qFxECsui', '0123456789', 'I6b1P060UM', '2025-09-02 23:18:07', 'user', NULL, '2025-09-02 23:18:08', '2025-11-15 07:00:34'),
(2, 'Blogger', NULL, NULL, 'blogger@gmail.com', '$2y$12$9ea0FzpDbFpxBJYDWfCaYO2BiYHey8dMN7XPQ1mezviUhnzQY/kyW', NULL, NULL, NULL, 'user', NULL, '2025-09-02 23:42:17', '2025-11-15 06:53:56');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_is_active_index` (`is_active`),
  ADD KEY `categories_parent_id_index` (`parent_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_code_unique` (`code`),
  ADD KEY `customers_code_index` (`code`),
  ADD KEY `customers_phone_index` (`phone`),
  ADD KEY `customers_customer_type_id_index` (`customer_type_id`),
  ADD KEY `customers_is_walk_in_index` (`is_walk_in`),
  ADD KEY `customers_is_active_index` (`is_active`);

--
-- Indexes for table `customer_types`
--
ALTER TABLE `customer_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_types_name_index` (`name`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exports_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failed_import_rows_import_id_foreign` (`import_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imports_user_id_foreign` (`user_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_created_by_foreign` (`created_by`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payments_order_id_foreign` (`order_id`),
  ADD KEY `order_payments_created_by_foreign` (`created_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_code_index` (`code`),
  ADD KEY `products_slug_index` (`slug`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_variant_id_index` (`variant_id`),
  ADD KEY `products_is_active_index` (`is_active`),
  ADD KEY `products_stock_quantity_index` (`stock_quantity`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_is_active_index` (`is_active`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_orders_code_unique` (`code`),
  ADD KEY `purchase_orders_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_orders_created_by_foreign` (`created_by`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_items_purchase_order_id_foreign` (`purchase_order_id`),
  ADD KEY `purchase_order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_code_unique` (`code`),
  ADD KEY `suppliers_code_index` (`code`),
  ADD KEY `suppliers_is_active_index` (`is_active`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_types`
--
ALTER TABLE `customer_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_customer_type_id_foreign` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `exports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD CONSTRAINT `failed_import_rows_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `order_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD CONSTRAINT `purchase_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `purchase_order_items_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
