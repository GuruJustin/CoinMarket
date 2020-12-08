-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2020 at 03:44 AM
-- Server version: 5.7.29-cll-lve
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
-- Database: `khaytech_bchain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `login_time` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manageuser` int(55) DEFAULT NULL,
  `createuser` int(22) DEFAULT NULL,
  `viewuser` int(44) DEFAULT NULL,
  `blockchain` int(3) DEFAULT NULL,
  `purchase` int(2) DEFAULT NULL,
  `sales` int(2) DEFAULT NULL,
  `withdraw` int(3) DEFAULT NULL,
  `deposit` int(3) DEFAULT NULL,
  `transfer` int(3) DEFAULT NULL,
  `settings` int(2) DEFAULT NULL,
  `message` int(2) DEFAULT NULL,
  `frontend` int(55) DEFAULT NULL,
  `kyc` int(22) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `mobile`, `image`, `status`, `login_time`, `password`, `remember_token`, `manageuser`, `createuser`, `viewuser`, `blockchain`, `purchase`, `sales`, `withdraw`, `deposit`, `transfer`, `settings`, `message`, `frontend`, `kyc`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '08098987878', 'admin_1538903120.jpg', 1, '2018-05-04 14:36:07', '$2y$10$Bh3NKF7E9IF1MbNdHonlY.56Nb38JWFRaPR8SUmii/MDVz.UL.Fje', 'Aqc660lQdbp6JOMhhmhQY2PTiaWs03m7AbVgcGcpm6i6HdoDNnCPMWnqpZLg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2018-03-26 06:08:23', '2020-05-26 04:51:33'),
(13, 'Adekunle Gold', 'dssdfd', '2@2.comds', '08034545332', NULL, 1, NULL, '$2y$10$0DpGY5qLx.KoCsyZFbk7IuhhLe1miUhSjYJ1d7XSK5n5PeXdDp2zK', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2020-05-26 04:50:46', '2020-05-26 04:50:46'),
(14, 'Adekunle Gold', 'sdgddsg', '2@2.comw', '08034545332', NULL, 1, NULL, '$2y$10$Bh3NKF7E9IF1MbNdHonlY.56Nb38JWFRaPR8SUmii/MDVz.UL.Fje', 'sQaRywABDYnLeFEp0bjeMGRHvIOfNxKSUhGgCO9IZcSmuTVOZPM0TZbkL8J6', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 1, NULL, '2020-05-26 04:55:32', '2020-05-26 04:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` text COLLATE utf8mb4_unicode_ci,
  `accname` text COLLATE utf8mb4_unicode_ci,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account`, `accname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FCMB', '1234567890', 'Merkley', 1, '2018-10-18 18:00:00', '2020-04-21 02:41:04'),
(2, 'UBA', '1234567890', 'Barklios', 1, '2018-10-18 18:00:00', '2020-04-20 00:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sym` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `login` int(55) NOT NULL,
  `maintain` int(55) DEFAULT NULL,
  `email_verification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_verification` tinyint(1) NOT NULL DEFAULT '0',
  `email_notification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_notification` tinyint(4) NOT NULL DEFAULT '0',
  `level_one` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_two` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_three` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sending_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `transcharge` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimal` int(2) NOT NULL,
  `cron` tinyint(4) NOT NULL DEFAULT '0',
  `map_api` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` tinyint(4) NOT NULL DEFAULT '0',
  `refcom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `trxcancel` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci,
  `privacy` longtext COLLATE utf8mb4_unicode_ci,
  `policy` longtext COLLATE utf8mb4_unicode_ci,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minbonus` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc` varchar(44) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `goal` text COLLATE utf8mb4_unicode_ci,
  `step1` text COLLATE utf8mb4_unicode_ci,
  `step2` text COLLATE utf8mb4_unicode_ci,
  `step3` text COLLATE utf8mb4_unicode_ci,
  `step4` text COLLATE utf8mb4_unicode_ci,
  `step5` text COLLATE utf8mb4_unicode_ci,
  `htitle` text COLLATE utf8mb4_unicode_ci,
  `hstitle` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `theme` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme2` text COLLATE utf8mb4_unicode_ci,
  `timezone` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dogapi` text COLLATE utf8mb4_unicode_ci,
  `btcapi` text COLLATE utf8mb4_unicode_ci,
  `ltcapi` text COLLATE utf8mb4_unicode_ci,
  `apikey` text COLLATE utf8mb4_unicode_ci,
  `blockallow` int(2) DEFAULT NULL,
  `blockcreate` int(2) DEFAULT NULL,
  `blocksend` int(2) DEFAULT NULL,
  `escrow` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo` int(55) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `sitename`, `phone`, `email`, `address`, `currency`, `currency_sym`, `registration`, `login`, `maintain`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `level_one`, `level_two`, `level_three`, `sending_charge`, `transcharge`, `decimal`, `cron`, `map_api`, `location`, `refcom`, `trxcancel`, `about`, `about_title`, `terms`, `privacy`, `policy`, `rate`, `bonus`, `minbonus`, `ref`, `kyc`, `vision`, `mission`, `goal`, `step1`, `step2`, `step3`, `step4`, `step5`, `htitle`, `hstitle`, `facebook`, `google`, `twitter`, `instagram`, `theme`, `theme2`, `timezone`, `dogapi`, `btcapi`, `ltcapi`, `apikey`, `blockallow`, `blockcreate`, `blocksend`, `escrow`, `demo`, `created_at`, `updated_at`) VALUES
(1, 'Ventura Wallet', '1234567890', 'do-not-reply@url.com', 'Wuse Zone 2, Eragon, Australia', 'NGN', '₦', 1, 1, 0, 1, 1, 1, 0, '3', '2', '1', '40', '12', 2, 0, 'AIzaSyDi-rrw9lb-uKY1vHd9gkzuBpj4-hiBsUA', 0, '0', '30', '<span style=\"color: rgb(128, 128, 163); font-family: Poppins, sans-serif; font-size: 16px; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>', 'Who We Are', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', '387.42', '12', '12', '5', '12', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page.\r\n\r\nOur earlier blog post already explained about form submission without page refresh, but it was done by using  ajax, PHP and jQuery.\r\n\r\nNow you will learn same functionality using ajax, PHP and Javascript through this blog post . Just follow our post or download it to use.', 'You will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique\r\n                                with a great UX which will help you to grow up your business.', 'LogYou will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique\r\n                                with a great UX which will help you to grow up your business.', 'AppYou will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique\r\n                                with a great UX which will help you to grow up your business.', 'RedYou will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique\r\n                                with a great UX which will help you to grow up your business.', 'You will never be disappointed at SpaceMax. SpaceMax has a huge template library for each and every industry. Our every single template has everything that you will need for your business. Every template of SpaceMax is unique\r\n                                with a great UX which will help you to grow up your business.Blue', 'Welcome To Ventura Wallet', 'The Best Cryptocurrency Wallet & Asset Trading Script On The Internet', 'www.facebook.com/url', 'www.googleplus.com/url', 'www.twitter.com/url', 'www.instagram.com/url', 'default.css', 'bg-purple', 'Africa/Lagos', '66b5-3bfd-28bf-0899', '1bd3-abd5-a416-72ec', '3f06-50eb-8911-9145', 'Kay052287', 1, 0, 1, '10', 0, NULL, '2020-06-05 01:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alerts', 1, '2018-06-10 05:01:22', '2018-10-08 00:00:46'),
(2, 'Urgent', 1, '2018-06-10 05:01:49', '2018-10-08 00:00:33'),
(3, 'Sales', 1, '2018-06-10 05:02:01', '2018-10-08 00:00:10'),
(4, 'Purchase', 1, '2018-06-10 05:02:14', '2018-10-07 23:59:56'),
(5, 'Promo', 1, '2018-10-07 23:47:15', '2018-10-07 23:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_details` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coinmarketpays`
--

CREATE TABLE `coinmarketpays` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller` int(11) DEFAULT NULL,
  `coin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketcode` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` longtext COLLATE utf8mb4_unicode_ci,
  `payment_id` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `buyer_reply` int(55) DEFAULT '0',
  `buyer` int(55) DEFAULT NULL,
  `wallet` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtrx` text COLLATE utf8mb4_unicode_ci,
  `paid` int(55) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinmarketpays`
--

INSERT INTO `coinmarketpays` (`id`, `seller`, `coin`, `amount`, `marketcode`, `gateway`, `trx`, `payment_id`, `status`, `buyer_reply`, `buyer`, `wallet`, `image`, `hashtrx`, `paid`, `created_at`, `updated_at`) VALUES
(18, 10, '5', '500', 'NBTA4F', '107', 'HYFSV2', NULL, 0, 0, 10, NULL, NULL, NULL, 0, '2020-06-02 22:31:54', '2020-06-02 22:31:54'),
(19, 10, '5', '50', 'NBTA4F', '107', 'XYV015', NULL, 1, 0, 10, 'GHfssh75tyghFHGGFHKHJLFFSDFASDFZ2fghd', NULL, NULL, 1, '2020-06-02 22:34:37', '2020-06-03 17:28:53'),
(20, 10, '5', '500', 'NBTA4F', '107', 'CX5BGJ', '972694136', 2, 2, 10, '456', NULL, NULL, 0, '2020-06-02 22:58:18', '2020-06-03 02:18:46'),
(21, 10, '5', '50', 'NBTA4F', '100', 'OZKURH', NULL, 2, 0, 10, 'dfdsfdsfdsgdsgdsgdsgdsgdsgdsg', NULL, NULL, 0, '2020-06-03 02:23:25', '2020-06-03 02:47:12'),
(22, 10, '5', '500', 'NBTA4F', '100', 'Z7WPDD', NULL, 2, 2, 10, 'ygsdhgdshfgsdkhfgdksjfgkj djfkgdskjjfkgdskjfgdsjkgfdsgdsg', NULL, NULL, 0, '2020-06-03 02:33:50', '2020-06-03 12:53:02'),
(23, 10, '5', '500', 'O4ITG8', '107', 'J4TPAC', '1696443', 2, 1, 10, 'fdgfdgfdgfdgfdgfgfd', '5ed7a2c398d18.jpg', '929652924', 1, '2020-06-03 11:38:09', '2020-06-03 17:17:40'),
(24, 10, '5', '50', 'DTHJPT', '107', 'EPOUAR', '400461445', 3, 0, 10, 'Dfdfdf', NULL, NULL, 0, '2020-06-04 15:42:19', '2020-06-04 15:47:10'),
(25, 10, '5', '500', 'EUI1WQ', '107', 'WN4DBI', '747255671', 1, 0, 10, 'sfsf', NULL, NULL, 0, '2020-06-05 01:16:10', '2020-06-05 01:18:08'),
(26, 10, '5', '500', 'EUI1WQ', '107', 'PMOND5', '925223421', 1, 0, 10, 'hkghjf', NULL, NULL, 0, '2020-06-05 01:21:06', '2020-06-05 01:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `coinmarkets`
--

CREATE TABLE `coinmarkets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `coin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `buyer` int(55) DEFAULT NULL,
  `views` int(55) DEFAULT NULL,
  `code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(88) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinmarkets`
--

INSERT INTO `coinmarkets` (`id`, `user_id`, `coin`, `amount`, `value`, `sold`, `balance`, `details`, `status`, `buyer`, `views`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 10, '5', '500', '500', '400', '500', 'No scam please', 1, 1, NULL, 'AMZOK2', NULL, '2020-05-21 19:18:07', '2020-05-21 20:34:33'),
(6, 10, '5', '500', '600', '68', '500', 'wwerewtewewt', 1, 2, NULL, '6259PF', NULL, '2020-05-21 19:23:20', '2020-05-21 19:23:20'),
(7, 10, '5', '500', '700', '600', '500', 'wwerewtewewt', 1, 2, NULL, 'EUI1WQ', NULL, '2020-05-21 19:23:40', '2020-05-21 19:23:40'),
(8, 10, '5', '500', '500', '157', '172', 'We dont sell to fake account', 1, 2, NULL, 'DTHJPT', NULL, '2020-05-21 20:29:31', '2020-05-22 01:04:45'),
(9, 10, '3', '400', '500', '56', '400', 'We welcomeall', 1, 2, NULL, 'EHP4D5', NULL, '2020-05-21 20:30:39', '2020-05-21 20:30:39'),
(10, 10, '5', '500', '500', '1000', '-500', 'sgdsgd', 1, 1, NULL, 'O4ITG8', '2020-06-03 16:17:48', '2020-05-31 09:46:45', '2020-06-03 15:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `name`, `symbol`, `currency`, `logo`, `address`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dogecoin', 'dash', 'DOGE', 'doge.png', '2N78h844tD7rYRM6CzUPjtNdR3xHmwjHETb', '0.00258458', 1, '2018-02-14 23:36:57', '2020-06-04 08:29:49'),
(2, 'Litecoin', 'sign-ltc', 'LTC', 'ltc.png', '2N1Ni2uJdUjEhQ32ApPfideuFEV57BH1LfY', '47.5', 1, '2018-02-14 23:36:57', '2020-06-04 08:29:49'),
(3, 'Bitcoin', 'sign-btc', 'BTC', 'btc.png', '2NFxacom1u1oRoRRnfpoeYpuajs2r47t3zb', '9619.34', 1, '2018-02-14 23:36:57', '2020-06-04 08:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `coinwallets`
--

CREATE TABLE `coinwallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `coin_id` int(11) NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pending` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `balance` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(55) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinwallets`
--

INSERT INTO `coinwallets` (`id`, `coin_id`, `name`, `address`, `pending`, `user_id`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(109, 2, 'Litecoin', '2N9aWwFT3Ro5xdySSbFCNyhaqsY11LwpEFK', '0.0', 10, '0.0', 1, '2020-03-01 23:26:30', '2020-03-19 09:44:39'),
(110, 3, 'Bitcoin', '2NFxacom1u1oRoRRnfpoeYpuajs2r47t3zb', '0.0', 10, '0.04257431', 1, '2020-01-29 20:05:06', '2020-05-20 23:01:20'),
(111, 1, 'Dogecoin', '2N8VvFT5FP9wreYWETXXHiqB9KkrcrPopiw', '0.0', 10, '50.0', 1, '2020-01-29 20:05:06', '2020-05-26 05:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `cryptowallets`
--

CREATE TABLE `cryptowallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `coin_id` int(11) NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `balance` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(55) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cryptowallets`
--

INSERT INTO `cryptowallets` (`id`, `coin_id`, `name`, `address`, `user_id`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(125, 1, 'Ethereum', '3J98t1WpEZ73CNmQviecrnyiWrnqRhWNLy', 10, '0.99876759', 1, '2020-04-08 00:05:50', '2020-04-12 14:46:19'),
(127, 3, 'Bitcoin Cash', '3J98T1WPEZ73CNMQVIECRNYIWRNQRHWNLY', 10, '99.80936', 1, '2020-04-08 00:05:50', '2020-04-23 10:20:32'),
(128, 4, 'Litecoin', '0', 10, '1', 1, '2020-04-08 00:05:50', '2020-04-08 00:05:50'),
(129, 5, 'Bitcoin', '3J98t1WpEZ73CNmQviecrnyiWrnqRhWNLy', 10, '1218.40085', 1, '2020-04-08 00:05:50', '2020-04-23 10:56:10'),
(130, 10, 'Dash', '0', 10, '0', 1, '2020-04-08 00:05:50', '2020-04-08 00:05:50'),
(131, 11, 'Perfect Money', '0', 10, '0', 1, '2020-04-08 00:05:50', '2020-04-08 00:05:50'),
(132, 112, 'Doge', '0', 10, '0', 1, '2020-04-08 16:14:42', '2020-04-08 16:14:42'),
(133, 1, 'Ethereum', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(134, 3, 'Bitcoin Cash', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(135, 4, 'Litecoin', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(136, 5, 'Bitcoin', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(137, 10, 'Dash', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(138, 11, 'Perfect Money', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(139, 112, 'Doge', '0', 14, '0', 1, '2020-04-25 14:14:43', '2020-04-25 14:14:43'),
(140, 1, 'Ethereum', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(141, 3, 'Bitcoin Cash', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(142, 4, 'Litecoin', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(143, 5, 'Bitcoin', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(144, 10, 'Dash', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(145, 11, 'Perfect Money', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(146, 112, 'Doge', '0', 15, '0', 1, '2020-04-29 06:47:26', '2020-04-29 06:47:26'),
(147, 1, 'Ethereum', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(148, 3, 'Bitcoin Cash', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(149, 4, 'Litecoin', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(150, 5, 'Bitcoin', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(151, 10, 'Dash', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(152, 11, 'Perfect Money', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(153, 112, 'Doge', '0', 16, '0', 1, '2020-04-29 15:47:19', '2020-04-29 15:47:19'),
(154, 1, 'Ethereum', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(155, 3, 'Bitcoin Cash', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(156, 4, 'Litecoin', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(157, 5, 'Bitcoin', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(158, 10, 'Dash', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(159, 11, 'Perfect Money', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(160, 112, 'Doge', '0', 17, '0', 1, '2020-05-10 19:03:19', '2020-05-10 19:03:19'),
(161, 1, 'Ethereum', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(162, 3, 'Bitcoin Cash', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(163, 4, 'Litecoin', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(164, 5, 'Bitcoin', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(165, 10, 'Dash', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(166, 11, 'Perfect Money', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(167, 112, 'Doge', '0', 18, '0', 1, '2020-05-15 19:22:59', '2020-05-15 19:22:59'),
(168, 1, 'Ethereum', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(169, 3, 'Bitcoin Cash', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(170, 4, 'Litecoin', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(171, 5, 'Bitcoin', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(172, 10, 'Dash', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(173, 11, 'Perfect Money', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48'),
(174, 112, 'Doge', '0', 11, '0', 1, '2020-05-23 19:41:48', '2020-05-23 19:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_id` int(55) DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sell` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `buy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_coin` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `icon`, `api_id`, `price`, `exchange`, `sell`, `buy`, `payment_id`, `image`, `is_coin`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ethereum', 'ETH', 'sign-eth-alt', 1027, '6.86', '4', '400', '435', 'ETH222336322232', 'ethereum_1539867743.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49'),
(3, 'Bitcoin Cash', 'BCH', 'sign-bch-alt', 1839, '256.78', '5', '390', '400', 'BCH987784654341', 'bitcoin-cash_1539867845.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49'),
(4, 'Litecoin', 'LTC', 'sign-ltc-alt', 2, '47.5', '5', '370', '400', 'LTC132132132123', 'litecoin_1539867876.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49'),
(5, 'Bitcoin', 'BTC', 'sign-btc-alt', 1, '9619.34', '7', '400', '430', 'ADA3625241566', 'cardano_1539867915.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49'),
(10, 'Dash Coin', 'DASH', 'sign-dash-alt', 131, '77.56', '7', '400', '400', 'Dash3132332131', 'dash_1539868063.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49'),
(11, 'Perfect Money', 'PM', 'sign-php-alt', NULL, '1', NULL, '390', '420', 'demo.pm@pm.com', 'perfect-money_1540216154.png', 0, 1, NULL, '2018-10-22 07:49:14', '2020-04-28 13:24:33'),
(112, 'Doge Coin', 'DGE', 'sign-bnb-alt', 74, '0.00258458', '8', '380', '400', 'Dash3132332131', 'dash_1539868063.png', 1, 1, NULL, '2018-02-15 00:36:57', '2020-06-04 08:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `currency_id`, `amount`, `charge`, `usd`, `trx`, `status`, `image`, `code`, `created_at`, `updated_at`) VALUES
(1, 10, 103, NULL, '500', '18', '1.33', 'QfVXQTGz77a7C6cV', 0, NULL, NULL, '2020-05-21 22:23:33', '2020-05-21 22:23:33'),
(2, 10, 107, NULL, '500', '0', '1.28', '7Pfa0BqZN7bPdRbW', 1, NULL, NULL, '2020-05-24 09:14:01', '2020-05-24 10:28:41'),
(3, 10, 100, NULL, '500', '0', '1.28', 'CHYX6nrkunmF3AXD', 1, NULL, NULL, '2020-05-24 11:18:52', '2020-05-24 11:21:21'),
(4, 10, 513, NULL, '500', '30', '1.36', 'gLvdOEnWhvd64qCy', 0, NULL, NULL, '2020-05-24 11:28:39', '2020-05-24 11:28:39'),
(5, 10, 103, NULL, '500', '18', '1.33', 'kEFyoKQkADOjNfvN', 0, NULL, NULL, '2020-05-24 11:31:27', '2020-05-24 11:31:27'),
(6, 10, 103, NULL, '400', '15', '1.06', 'fWjmeyvQtBaljvq0', 1, NULL, NULL, '2020-05-24 11:33:31', '2020-05-24 12:49:39'),
(7, 10, 100, NULL, '50', '0', '0.13', 'DYLHxkPGCle1Srs0', 0, NULL, NULL, '2020-05-24 13:18:10', '2020-05-24 13:18:10'),
(8, 10, 100, NULL, '500', '0', '1.28', 'W90T0G', 0, NULL, NULL, '2020-05-24 13:19:31', '2020-05-24 13:19:31'),
(9, 10, 103, NULL, '500', '18', '1.34', '2B038I', 0, NULL, NULL, '2020-06-04 07:03:56', '2020-06-04 07:03:56'),
(10, 10, 513, NULL, '500', '30', '1.37', 'BKTN6U', 0, NULL, NULL, '2020-06-04 07:05:15', '2020-06-04 07:05:15'),
(11, 10, 513, NULL, '500', '30', '1.37', 'DZWXB0', 0, NULL, NULL, '2020-06-04 09:06:14', '2020-06-04 09:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'do-not-reply@ventura.com', '+01234567890', '<br><div class=\"wrapper\" style=\"background-color: #f2f2f2;\"><table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\"><tbody><tr><td style=\"padding: 0; width: 600px;\"><br><div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\"><img style=\"height: auto; width: 100%; border: 0; max-width: 312px;\" src=\"{{asset(\'assets/images/logo/logo.png\')}}\" alt=\"\" width=\"312\" height=\"44\"><br></div></td></tr></tbody></table><br><table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\"><tbody><tr><td class=\"column\" style=\"padding: 0; text-align: left; vertical-align: top; color: #60666d; font-size: 14px; line-height: 21px; font-family: sans-serif; width: 600px;\"><br><div style=\"margin-left: 20px; margin-right: 20px;\"><font size=\"4\">Hi {{name}},<br></font><p><strong>{{message}}</strong></p></div><div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\"><br><p class=\"size-14\" style=\"margin-top: 0; margin-bottom: 0; font-size: 14px; line-height: 21px;\">Thanks,<br> <strong>{{$basic->sitename}} TEAM</strong></p><br></div><br></td></tr></tbody></table><br></div>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=****&sender=Exchangeo&SMSText={{message}}&GSM={{number}}&type=longSMS', '2018-01-09 23:45:09', '2020-06-04 21:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Is registration required on your site?', '<div>No, registration is not required. But if you sign up on our service, you can participate in the cumulative discount program and referral program.</div><div><br></div>', '2018-04-15 02:14:58', '2018-10-08 03:17:43'),
(2, 'How to make an exchange on your site?', '<div>You need to choose the direction of exchange and fill out an application for exchange. Click the Exchange button and follow the instructions that you will see in the confirmation window of the exchange request. If you have any questions in the exchange process, please contact the operator via the online help chat.</div><div><br></div>', '2018-04-15 02:15:11', '2018-10-08 03:19:27'),
(4, 'Do you have an affiliate program?', '<div>Yes. We have a very clear and transparent affiliate program, according to which you can receive 25% of our earnings for exchanging the users you cited. Remuneration payments are from 1 PMUSD. In your office you can track the operations of your referrals online. You can get acquainted with more detailed information after registration in your Personal Account.</div><div><br></div>', '2018-10-04 01:19:53', '2018-10-08 03:20:22'),
(6, 'How do I manage my  account?', 'To make changes to your account information, first go to your account Settings\r\n\r\nSign in to your account.\r\nSelect “Settings”.\r\nFrom “Settings”, select “Profile information”.\r\nTo change your password\r\n\r\nSelect “edit password”.\r\nEnter your current password.\r\nEnter your new password twice.\r\nSelect “change password” to complete and save your changes.\r\nTo change your address\r\n\r\nSelect “edit address”.\r\nEnter your new address.\r\nSelect “change address” to complete and save your changes.\r\nTo change your phone number\r\n\r\nSelect “edit phone number”.\r\nEnter your new phone number.\r\nSelect “change phone number” to complete and save your changes.\r\nTo change your email address\r\n\r\nSelect “edit email address”.\r\nEnter your new emai- address\r\nSelect “change email” to complete and save your changes.', '2018-10-04 01:20:48', '2020-04-20 02:00:35'),
(9, 'Welcome to the system. We hope......', 'Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......', '2020-04-21 02:38:20', '2020-04-21 02:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` int(22) DEFAULT NULL,
  `val1` text COLLATE utf8mb4_unicode_ci,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Website',
  `val4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Industry Type',
  `val5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Channel ID',
  `val6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction URL',
  `val7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction Status URL',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `coin`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `status`, `created_at`, `updated_at`) VALUES
(99, 'Deposit Wallet', 'Deposit Wallet', '1', '55555555', NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, 'wallet', 1, NULL, '2020-04-29 09:19:09'),
(100, 'Flutterwave', 'Flutterwave Rave', '1', '55555555', NULL, NULL, NULL, 0, 'FLWPUBK_TEST-6973a7e9de42fd1e19e8ab8c73c5fdc3-X', NULL, NULL, NULL, NULL, NULL, 'cc-alt-fill', 1, NULL, '2020-04-29 09:19:09'),
(103, 'Stripe', 'Stripe', '10', '50000', '3', '3', '80', 0, 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, NULL, NULL, NULL, 'cc-stripe', 1, NULL, '2018-05-27 18:11:50'),
(107, 'Paystack', 'PayStack', '1', '999999999', NULL, NULL, NULL, 0, 'pk_test_257c929b64cda13f16d17e16b6fdec762aef0559', 'sk_test_ae65fab010dd2e551b8c9801528ed635c047baf2', NULL, NULL, NULL, NULL, 'cc-alt-fill', 1, NULL, '2020-04-29 09:01:47'),
(512, 'CoinGate', 'CoinGate', '10', '1000000', '05', '5', '80', 1, 'Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N', NULL, NULL, NULL, NULL, NULL, 'coin', 0, '2018-07-08 16:00:00', '2018-05-20 23:20:54'),
(513, 'CoinPayment', 'Coin Payment', '10', '1000000', '05', '5', '80', 1, 'a1be7959e59ee24619a6743680aa90fd', 'cd2435dd9cd172a96dfe04f07bb97080b32d9a5eb7e2b56724ee756c55021fcd', '7020ad85d8b76516FEf3FB86C5322EBeBcb64E2E5f6Fd7638E8208EBfc2b83a1', NULL, NULL, NULL, 'coin', 1, NULL, '2020-04-24 03:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `localbanks`
--

CREATE TABLE `localbanks` (
  `id` int(11) NOT NULL,
  `bank` varchar(223) NOT NULL,
  `code` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localbanks`
--

INSERT INTO `localbanks` (`id`, `bank`, `code`) VALUES
(1, 'Access Bank', '044'),
(2, 'Aso Savinhgs and Loan', '401'),
(3, 'Citi Bank', '023'),
(4, 'Covenant Microfinance Bank', '551'),
(5, 'Diamond Bank', '063'),
(6, 'Eco Bank', '050'),
(7, 'Eco Mobile', '307'),
(8, 'Ekondo Microfinance Bank', '562'),
(9, 'Enterprise Bank', '084'),
(10, 'Equitorial Trust Bank', '040'),
(11, 'Fidelity Bank', '070'),
(12, 'Fidelity Mobile', '318'),
(13, 'First Bank', '011'),
(14, 'First City Monument Bank', '214'),
(15, 'First Inland Bank', '085'),
(16, 'Guarantee Trust Bank', '058'),
(17, 'Heritage Bank', '030'),
(18, 'Jaiz Bank', '301'),
(19, 'Keystone Bank', '082'),
(20, 'Main Street Bank', '014'),
(21, 'PAGA', '327'),
(22, 'Skye Bank', '076'),
(23, 'Stanbic IBTC BAnk', '221'),
(24, 'Stanbic Mobile', '304'),
(25, 'Standard Chartered Bank', '068'),
(26, 'Sterline Bank', '232'),
(27, 'Sterline Mobile', '326'),
(28, 'Sun Trust Bank', '100'),
(29, 'Union Bank of Nigeria', '32'),
(30, 'United Bank For Africa', '33'),
(31, 'Unity Bank', '215'),
(32, 'Wema Bank', '35'),
(33, 'Zenith Bank', '57'),
(34, 'Zenith Mobile', '322');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `admin` int(55) NOT NULL DEFAULT '0',
  `view` int(55) NOT NULL DEFAULT '0',
  `code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desk` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` int(55) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `title`, `image`, `details`, `status`, `admin`, `view`, `code`, `desk`, `type`, `sender`, `created_at`, `updated_at`) VALUES
(33, 10, 'Deal Sealed & Accepted ', NULL, 'Your Bitcoin deal with transaction number CX5BGJ on the market place has been approved and accepted by the buyer, Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:09:31', '2020-06-03 02:10:02'),
(34, 10, 'Deal Sealed & Accepted ', NULL, 'Your Bitcoin deal with transaction number CX5BGJ on the market place has been approved and accepted by the buyer, Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:14:29', '2020-06-03 02:14:29'),
(35, 10, 'Deal Disputed ', NULL, 'Your Bitcoin deal with transaction number CX5BGJ on the market place has been disputed by the buyer, Please contact buyer for appropriate closure or create a ticket to request assistance Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:18:46', '2020-06-03 02:32:44'),
(36, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN500 was successful using Rave Payment Gateway. Please wait while the seller send you your coin, Your fund will be refunded if seller does not reply promptly. Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:35:00', '2020-06-03 02:35:14'),
(37, 10, 'Transction Approved ', NULL, 'Your Bitcoin purchase with transaction number Z7WPDD from the market place has been approved by the seller. If you didnt receive any Bitcoin or the seller sent a lower Bitcoin, please open a ticket, Else if all is good, please click the approve button form your transaction log to approve receipt , Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:41:17', '2020-06-03 02:41:17'),
(38, 10, 'Transction Approved ', NULL, 'Your Bitcoin purchase with transaction number OZKURH from the market place has been approved by the seller. If you didnt receive any Bitcoin or the seller sent a lower Bitcoin, please open a ticket, Else if all is good, please click the approve button form your transaction log to approve receipt , Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 02:47:12', '2020-06-04 07:01:57'),
(39, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN500 was successful using Paystack Payment Gateway. Your transaction number is J4TPAC, Please wait while the seller send you your coin, Your fund will be refunded if seller does not reply promptly. Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 11:43:07', '2020-06-03 11:43:19'),
(40, 10, 'Transction Approved ', NULL, 'Your Bitcoin purchase with transaction number J4TPAC from the market place has been approved by the seller. If you didnt receive any Bitcoin or the seller sent a lower Bitcoin, please open a ticket, Else if all is good, please click the approve button form your transaction log to approve receipt , Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 12:14:48', '2020-06-03 12:14:48'),
(41, 10, 'Transction Approved ', NULL, 'Your Bitcoin purchase with transaction number J4TPAC from the market place has been approved by the seller. If you didnt receive any Bitcoin or the seller sent a lower Bitcoin, please open a ticket, Else if all is good, please click the approve button form your transaction log to approve receipt , Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 12:16:51', '2020-06-03 12:17:21'),
(42, 10, 'Deal Sealed & Accepted ', NULL, 'Your Bitcoin deal with transaction number J4TPAC on the market place has been approved and accepted by the buyer, Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 12:41:48', '2020-06-03 12:41:48'),
(43, 10, 'Deal Disputed ', NULL, 'Your Bitcoin deal with transaction number Z7WPDD on the market place has been disputed by the buyer, Please contact buyer for appropriate closure or create a ticket to request assistance Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 12:53:02', '2020-06-03 12:53:02'),
(44, 10, 'Coin Placed on Market Place', NULL, 'Your Bitcoin of amount 500$ with transaction number UBDBUE has been placed on the market place successful. , Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 14:00:56', '2020-06-03 14:00:56'),
(45, 10, 'Deal Rejected By Admin', NULL, 'Your O4ITG8  market deal with transaction number J4TPAC has been rejected by the admin. Please send us a message if you feel this is wrong , Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 17:16:06', '2020-06-03 17:16:06'),
(46, 10, 'Payment Made', NULL, 'Your O4ITG8  market deal with transaction number J4TPAC has been approved by the admin and fund disbursed to your account  We hope you love trading with us, Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 17:17:40', '2020-06-03 17:17:54'),
(47, 10, 'Deal Rejected By Admin', NULL, 'Your NBTA4F  market deal with transaction number XYV015 has been rejected by the admin. Please send us a message if you feel this is wrong , Thank you for choosing Robo Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 17:28:40', '2020-06-03 17:28:40'),
(48, 10, 'Payment Made', NULL, 'Your NBTA4F  market deal with transaction number XYV015 has been approved by the admin and fund disbursed to your account  We hope you love trading with us, Thank you for choosing Robo Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-03 17:28:53', '2020-06-04 06:34:14'),
(49, 10, 'Hello please', NULL, 'Thank you for the response', 1, 0, 0, 'U7AKK5', 'Abuse', '1', 0, '2020-06-04 06:36:17', '2020-06-04 06:36:22'),
(50, 10, 'Hello please', NULL, 'I have not heard anything from you guys', 0, 0, 0, 'U7AKK5', 'Abuse', '1', 0, '2020-06-04 06:36:36', '2020-06-04 06:36:36'),
(51, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN442 was successful using your deposit wallet balnce. Please wait while we verify your purchase. Your wallet will be credited once payment is confirmed by our server, Thank you for choosing Ventura Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-04 08:59:15', '2020-06-04 14:11:35'),
(52, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of USD 200012 was successful using Stripe Payment Gateway. Please wait while we verify your purchase. Your wallet will be credited once payment is confirmed by our server, Thank you for choosing Ventura Wallet', 1, 1, 0, NULL, NULL, NULL, 0, '2020-06-04 14:15:28', '2020-06-04 14:15:44'),
(53, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN50 was successful using Paystack Payment Gateway. Your transaction number is EPOUAR, Please wait while the seller send you your coin, Your fund will be refunded if seller does not reply promptly. Thank you for choosing Ventura Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-04 15:44:42', '2020-06-04 15:44:42'),
(54, 10, 'Transction Rejected ', NULL, 'Your Bitcoin purchase with transaction number EPOUAR from the market place has been rejected by the seller. Please open a ticket if you feel this is wrong , Thank you for choosing Ventura Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-04 15:47:10', '2020-06-04 15:47:10'),
(55, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN500 was successful using Paystack Payment Gateway. Your transaction number is WN4DBI, Please wait while the seller send you your coin, Your fund will be refunded if seller does not reply promptly. Thank you for choosing Ventura Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-05 01:18:08', '2020-06-05 01:18:08'),
(56, 10, 'Coin Purchased', NULL, 'Your cryptocurrency purchase of NGN500 was successful using Paystack Payment Gateway. Your transaction number is PMOND5, Please wait while the seller send you your coin, Your fund will be refunded if seller does not reply promptly. Thank you for choosing Ventura Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-05 01:21:21', '2020-06-05 01:21:21'),
(57, 10, 'Coin Sold on Market Place', NULL, 'You just sold Bitcoin valued at 500$ with transaction number PMOND5 on your store with market code EUI1WQ Please treat as required. , Thank you for choosing Ventura Wallet', 0, 1, 0, NULL, NULL, NULL, 0, '2020-06-05 01:21:21', '2020-06-05 01:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'test@test.com', '9lAQa8cNIVUontOx3HwmPvK6c06YaV', '2020-05-23 07:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` int(11) NOT NULL,
  `withdraw_min` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `withdraw_max` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `icon`, `withdraw_min`, `withdraw_max`, `fix`, `percent`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash Deposit', 0, '10', '2000', '25', '1.10', '3', 1, '2017-07-28 09:10:00', '2018-09-19 13:43:17'),
(2, 'ATM Transfer', 0, '10', '2000', '25', '1.10', '3', 1, '2017-07-28 09:10:00', '2018-09-19 13:43:17'),
(3, 'Mobile Transfer', 0, '10', '20000', '2', '1.8', '1', 1, '2017-08-09 15:06:21', '2018-09-19 13:42:36'),
(4, 'Quick Teller', 0, '10', '20000', '2', '1.8', '1', 1, '2017-08-09 15:06:21', '2018-09-19 13:42:36'),
(5, 'USSD\r\n', 0, '10', '20000', '2', '1.8', '1', 1, '2017-08-09 15:06:21', '2018-09-19 13:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `hit` int(11) NOT NULL DEFAULT '0',
  `notify` int(55) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `image`, `details`, `status`, `hit`, `notify`, `created_at`, `updated_at`) VALUES
(2, 2, 'It is a long established fact that a reader', 'assets/images/post/post_1587481835.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\"></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div></div></div>', 1, 38, 0, '2018-06-12 18:00:00', '2018-10-08 01:04:44'),
(4, 1, 'labore et dolore magna aliqua', 'assets/images/post/post_1587481835.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div>', 1, 7, 0, '2018-06-08 18:00:00', '2018-10-08 01:08:29'),
(6, 3, 'Hashpower transfer for Users', 'assets/images/post/post_1587481835.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div>', 1, 18, 0, '2018-06-10 06:41:15', '2018-10-08 01:03:48'),
(7, 2, 'Hashpower for CryptoNight Users', 'assets/images/post/post_1587303778.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div>', 1, 55, 0, '2018-06-10 06:41:27', '2018-10-08 00:56:55'),
(9, 4, 'There is no one who loves pain itself', 'assets/images/post/post_1587481835.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div>', 1, 15, 0, '2018-06-10 06:42:21', '2018-10-08 00:56:38'),
(10, 2, 'labore et dolore magna aliqua', 'assets/images/post/post_1587481835.jpg', '<p style=\"font-size: 16px; color: rgba(30, 48, 86, 0.8); line-height: 30px; font-family: Poppins, sans-serif;\"><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div class=\"single-blog\" style=\"box-sizing: border-box; margin-bottom: 37px; color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"part-text\" style=\"box-sizing: border-box;\"><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"><div class=\"part-text\"><p style=\"margin-top: 24px; line-height: 1.6; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div><div class=\"single-blog\" style=\"margin-bottom: 37px;\"></div><p style=\"box-sizing: border-box; margin-top: 24px; margin-bottom: 1rem; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163);\">Lorem Ipsum is simply dummy text ofthe anadthe printing of typesetting industry is not fire for dummy texat the dummy text ofthe anadthe printing dummy text ofthe anadthe breath in printing of dummy text ofthe anadthe printing of dummy text ofthe anadthe local market for printing of typesetting industrydummy texat the dummy.</p></div></div>', 1, 53, 0, '2018-06-10 06:48:58', '2018-10-08 00:56:23'),
(11, 1, 'Welcome to the system. We hope......', 'assets/images/post/post_1587303778.jpg', 'ddfgfdfdgfdhfdhfdhfdhfhdhdfhfdhfdhfh', 1, 0, 1, '2020-04-19 11:52:19', '2020-04-19 11:52:19'),
(12, 2, 'Welcome to the system. We hope......', 'assets/images/post/post_1587303778.jpg', 'We are glshdjsd skdjvjdkvb sdmnvbjdsbv sdnkdmnsbvjsdhvjbv dksjbdjsblsdsd gdkjsgshg sdkbgjksdbgds gkjdsbgjd gsdkjgbdsg sdgdsgsg', 1, 0, 1, '2020-04-19 12:42:59', '2020-04-19 12:42:59'),
(13, 2, 'Welcome to the system. We hope......', 'assets/images/post/post_1587481835.jpg', 'Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......Welcome to the system. We hope......', 1, 0, 1, '2020-04-21 14:10:36', '2020-04-21 14:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(55) DEFAULT NULL,
  `code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `details`, `status`, `code`, `created_at`, `updated_at`) VALUES
(1, '10', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 1, '345', '2018-09-12 18:00:00', '2018-10-06 01:33:35'),
(3, '10', 'Testtimony ooThere is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain. There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain', 0, '535', '2018-07-02 08:59:54', '2020-04-23 18:54:50'),
(4, '10', 'Great great', 0, 'EFRXTQ', '2020-05-16 07:50:07', '2020-05-16 07:50:07'),
(5, '10', 'fdhfdjfdjfdjfdjdf', 0, 'APZEMD', '2020-05-28 17:21:15', '2020-05-28 17:21:15'),
(6, '10', '</div>\r\n                </div>\r\n                </div>\r\n                </div>\r\n                </div>', 0, '6RQQCP', '2020-05-28 17:21:44', '2020-05-28 17:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `admin` int(55) NOT NULL DEFAULT '0',
  `view` int(55) NOT NULL DEFAULT '0',
  `code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desk` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `image`, `details`, `status`, `admin`, `view`, `code`, `desk`, `type`, `created_at`, `updated_at`) VALUES
(22, 10, 'I need help', NULL, 'jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf jhkgfghdgfsgdsdfafsasdSdssddaf', 0, 0, 0, 'K1TY8X', 'Complaint', '1', '2020-05-28 08:42:31', '2020-05-28 08:42:31'),
(23, 10, 'Hello please', NULL, 'Thank you for the response', 0, 0, 0, 'U7AKK5', 'Abuse', NULL, '2020-06-04 06:36:17', '2020-06-04 06:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `user_id`, `transaction_id`, `amount`, `send_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'ZK6PRXXIHRP7WEIWZEZX', '400', 'Test1234', 2, '2020-05-09 22:45:14', '2020-05-09 22:45:14'),
(2, 10, 'VRS4KH8LNUF6TXDOUHY5', '20000', 'Bit254', 2, '2020-05-10 19:06:41', '2020-05-10 19:06:41'),
(3, 10, '7CQD32LJGIVASYXCOVXJ', '20000', 'Bit254', 2, '2020-05-10 19:07:51', '2020-05-10 19:07:51'),
(4, 10, 'B9P8TQHXXRDNQST6RRII', '500', 'test12345', 2, '2020-05-24 15:20:52', '2020-05-24 15:20:52'),
(5, 10, 'UYZ8AUNDD7TXEQBEK0QI', '1', 'test12345', 2, '2020-06-05 00:20:45', '2020-06-05 00:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `trxes`
--

CREATE TABLE `trxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `main_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `amountpaid` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositor` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tnum` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+',
  `wallet` text COLLATE utf8mb4_unicode_ci,
  `currency_id` int(11) DEFAULT NULL,
  `rate` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `getamo` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(77) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` text COLLATE utf8mb4_unicode_ci,
  `accountname` text COLLATE utf8mb4_unicode_ci,
  `accountnumber` text COLLATE utf8mb4_unicode_ci,
  `gateway` int(22) DEFAULT NULL,
  `timeout` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxes`
--

INSERT INTO `trxes` (`id`, `user_id`, `amount`, `main_amo`, `amountpaid`, `depositor`, `tnum`, `image`, `charge`, `type`, `wallet`, `currency_id`, `rate`, `price`, `getamo`, `method`, `bank`, `remark`, `trx`, `status`, `bankname`, `accountname`, `accountnumber`, `gateway`, `timeout`, `created_at`, `updated_at`) VALUES
(2, 10, '500', '200012', '500', 'Adexis', '5674764', '5ece779ba9a7e.jpg', '12', '1', '982738972589375892357892365262626', 3, '390', '253.722168217656', '1.9706594954331076', '4', '2', NULL, '0FH79O', '1', NULL, NULL, NULL, NULL, '2020-05-27 14:57:41', '2020-05-27 12:27:41', '2020-05-27 13:22:19'),
(3, 10, '500', '200012', NULL, NULL, NULL, NULL, '12', '1', '982738972589375892357892365262626', 10, '400', '84.9192122465504', '5.887949108010138', NULL, NULL, NULL, 'NHEA59', '1', NULL, NULL, NULL, 107, '2020-05-27 17:03:49', '2020-05-27 14:33:49', '2020-05-27 14:34:59'),
(5, 10, '54653', '2522', NULL, NULL, '76465356', '5ecee25f8667c.jpg', '12', '0', NULL, 4, '400', '47.2300754331777', NULL, NULL, '0', NULL, 'ATMUBE', '1', 'FCMB', '1234567890', '00333493944', NULL, '2020-05-27 22:19:42', '2020-05-27 19:49:42', '2020-05-27 20:57:51'),
(6, 10, '1', '442', NULL, NULL, NULL, NULL, '12', '1', '2N87AX3mY86CBedEb9LoF4csfUa9P7ovX1H', 5, '400', '9619.34', '0.00010395723615133679', NULL, NULL, NULL, 'ZM01XU', '1', NULL, NULL, NULL, 99, '2020-06-04 11:22:11', '2020-06-04 08:52:11', '2020-06-04 08:59:15'),
(8, 10, '500', '200012', NULL, NULL, NULL, NULL, '12', '1', '<?php //get host by name echo gethostname(); echo \"<br>\"; //get OS echo php_uname(); ?>', 10, '400', '77.56', '6.446621970087674', NULL, NULL, NULL, 'JIM2HT', '1', NULL, NULL, NULL, 103, '2020-06-04 16:43:31', '2020-06-04 14:13:31', '2020-06-04 14:15:28'),
(9, 10, '500', '200012', NULL, NULL, NULL, NULL, '12', '1', '982738972589375892357892365262626', 3, '390', '256.78', '1.9471921489212558', NULL, NULL, NULL, 'SM4I6X', '0', NULL, NULL, NULL, 103, '2020-06-05 03:14:43', '2020-06-05 00:44:43', '2020-06-05 01:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_time` datetime DEFAULT NULL,
  `phone_time` datetime DEFAULT NULL,
  `refer` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bonus` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT '0.00',
  `bank` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Set',
  `accountno` text COLLATE utf8mb4_unicode_ci,
  `accountname` text COLLATE utf8mb4_unicode_ci,
  `bankyes` int(1) NOT NULL DEFAULT '0',
  `paypal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Set',
  `btcwallet` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `verified` int(22) DEFAULT NULL,
  `dob` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastseen` varchar(77) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(77) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passchange` varchar(77) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log` int(11) DEFAULT NULL,
  `setpin` int(11) DEFAULT NULL,
  `transpin` text COLLATE utf8mb4_unicode_ci,
  `pinchange` text COLLATE utf8mb4_unicode_ci,
  `gfa` int(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `image`, `password`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `refer`, `level`, `reference`, `balance`, `bonus`, `bank`, `accountno`, `accountname`, `bankyes`, `paypal`, `btcwallet`, `status`, `verified`, `dob`, `gender`, `login_time`, `address`, `city`, `state`, `zip_code`, `country`, `provider`, `provider_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `lastseen`, `time`, `timezone`, `passchange`, `log`, `setpin`, `transpin`, `pinchange`, `gfa`) VALUES
(10, 'Christopher', 'Browniew', 'test1234', 'test@test.com', '+2348031975397', 'assets/images/user/1588123305_.jpg', '$2y$10$KZanIySpt.k6KiaYX9DNW.Mk7o3wAji96lRzJK/.2lKJzn1kQ/7pG', 'MCWAGO', 'OHBF4I', 1, 1, '2020-05-23 23:28:17', '2020-05-14 23:42:45', 0, 2, NULL, '465', '119', 'FCMB', 'Adekunle', '3473473473', 0, 'test@paypal.com', '2N87AX3mY86CBedEb9LoF4csfUa9P7ovX1H', 1, 2, '2019-10-23', 'None', '2020-06-04 22:06:40', 'My Address Is Real', 'Ikeja', 'Lagos', '11234', 'Nigeria', NULL, NULL, '03RawQIc0zt05QuYlaLjBUx1qo1t0YUqDDpVhWyDNSRaGbTIboGB4nXotOiu', NULL, '2020-04-06 21:48:38', '2020-06-05 01:43:44', '2020-06-05 02:43:44', '2020-05-28 14:22:32', 'Africa/Lagos', '2020-05-28 00:26:39', 0, 1, '$2y$10$X.9AeQtyIb15kf76iofQdOFYtgAumLwVoMvHkUu2J2dbAHq.K66lW', '2020-06-05 00:13:47', 1),
(11, 'Chris', 'Brown', 'test12345', 'test@test.comk', '+2348031975397', 'assets/images/user/1588123305_.jpg', '$2y$10$6mWJLg2o4h2KoRncGfaS4urjj8H3XxrpD3xta4uoeIWoNDWrwkTkS', 'MCWAGO', 'OHBF4I', 1, 1, '2020-05-23 23:28:17', '2020-05-23 23:42:45', 10, 2, NULL, '91781.41971649998', '145', 'Carter Bank', 'Bangalee', '26379383838', 0, 'Ikeja', '1bd3-abd5-a416-72ecliuyuitiu', 1, 2, '2020-05-01', 'None', '2020-05-24 12:09:24', 'Ikeja Lagos', 'Lagos', 'Adrar', '11234', 'Algeria', NULL, NULL, 'fGCnVAaY0jWxghlfUV0rGjKHxH8mB9YHTXlUQgijYwA2LRCT1wX0zaofh1Vm', NULL, '2020-04-06 21:48:38', '2020-06-05 00:20:45', '2020-05-24 16:06:31', '2020-05-25 08:37:27', 'Africa/Lagos', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `details`, `created_at`, `updated_at`) VALUES
(1, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-19 10:32:06', '2020-05-19 10:32:06'),
(2, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-20 11:12:50', '2020-05-20 11:12:50'),
(3, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-21 06:55:43', '2020-05-21 06:55:43'),
(4, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-21 16:38:08', '2020-05-21 16:38:08'),
(5, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-23 19:54:01', '2020-05-23 19:54:01'),
(6, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-23 21:28:53', '2020-05-23 21:28:53'),
(7, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-24 00:40:50', '2020-05-24 00:40:50'),
(8, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-24 01:38:12', '2020-05-24 01:38:12'),
(9, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-24 05:20:56', '2020-05-24 05:20:56'),
(10, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-24 11:09:24', '2020-05-24 11:09:24'),
(11, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-26 05:52:04', '2020-05-26 05:52:04'),
(12, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-26 05:58:07', '2020-05-26 05:58:07'),
(13, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-26 06:05:16', '2020-05-26 06:05:16'),
(14, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-26 11:02:50', '2020-05-26 11:02:50'),
(15, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-27 10:16:47', '2020-05-27 10:16:47'),
(16, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-27 18:54:20', '2020-05-27 18:54:20'),
(17, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-28 06:56:30', '2020-05-28 06:56:30'),
(18, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-28 14:28:58', '2020-05-28 14:28:58'),
(19, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-05-31 09:41:04', '2020-05-31 09:41:04'),
(20, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-06-02 22:17:09', '2020-06-02 22:17:09'),
(21, 10, '::1', 'Unknown', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '2020-06-03 11:26:28', '2020-06-03 11:26:28'),
(22, 10, '197.210.226.254', 'Africa, Nigeria , Lagos', 'Mozilla/5.0 (Linux; Android 8.1.0; Infinix X650) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.83 Mobile Safari/537.36', '2020-06-04 05:54:28', '2020-06-04 05:54:28'),
(23, 10, '84.108.103.91', 'Asia, Israel , Nesher', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '2020-06-04 08:32:40', '2020-06-04 08:32:40'),
(24, 10, '197.210.70.235', 'Africa, Nigeria , Lagos', 'Mozilla/5.0 (Linux; Android 8.1.0; Infinix X650) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.83 Mobile Safari/537.36', '2020-06-04 12:59:04', '2020-06-04 12:59:04'),
(25, 10, '197.210.45.94', 'Africa, Nigeria , Lagos', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '2020-06-04 21:06:41', '2020-06-04 21:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(55) DEFAULT NULL,
  `type` varchar(55) DEFAULT NULL,
  `image1` varchar(55) DEFAULT NULL,
  `image2` varchar(55) DEFAULT NULL,
  `number` varchar(55) DEFAULT NULL,
  `date` varchar(55) DEFAULT NULL,
  `status` int(55) DEFAULT NULL,
  `created_at` varchar(55) DEFAULT NULL,
  `updated_at` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `user_id`, `type`, `image1`, `image2`, `number`, `date`, `status`, `created_at`, `updated_at`) VALUES
(9, 10, 'Voters\' Card', '5e9c9999da11c.jpg', '5e9c9999e2545.jpg', '67546534435645352', '10/25/2028', 1, '2020-04-19 18:34:01', '2020-04-19 18:37:39'),
(10, 10, 'on', '5ec9c3023bf96.jpg', '5ec9c30248024.jpg', '5564452354234', '2020-05-23', 0, '2020-05-24 00:42:42', '2020-05-24 00:42:42'),
(11, 10, 'on', '5ec9c4ec59c5b.jpg', '5ec9c4ec6308c.jpg', '67546534435645352', '2020-05-16', 0, '2020-05-24 00:50:52', '2020-05-24 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_logs`
--

CREATE TABLE `withdraw_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_details` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_logs`
--

INSERT INTO `withdraw_logs` (`id`, `user_id`, `method_id`, `transaction_id`, `wallet_id`, `currency_id`, `amount`, `charge`, `net_amount`, `send_details`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 3, 'ILZFBWINISBFY6GQZHFB', NULL, NULL, '50', '2.9', '52.9', 'd', NULL, 1, '2020-05-09 20:01:56', '2020-05-09 20:05:12'),
(3, 10, 3, 'PFDFBPOD0PDPODUOG595', NULL, NULL, '5000', '92', '5092', 'd', NULL, 1, '2020-05-09 22:35:01', '2020-05-09 22:35:15'),
(4, 10, 3, 'M044BPYU42TSTSYZFAH6', NULL, NULL, '400', '9.2', '409.2', NULL, NULL, 0, '2020-05-24 14:44:33', '2020-05-24 14:44:33'),
(5, 10, 1, 'H5I95HZIEZNR2ONQY1JO', NULL, NULL, '500', '30.5', '530.5', NULL, NULL, 1, '2020-05-24 14:49:15', '2020-05-24 14:49:15'),
(6, 10, 2, '5NDFFNDVBZHLRDI6QEOF', NULL, NULL, '50', '25.55', '75.55', NULL, NULL, 1, '2020-05-24 14:49:35', '2020-05-24 14:49:35'),
(7, 10, 3, 'VUMTDLRBWOO5E3RNPRHO', NULL, NULL, '11', '2.2', '13.2', NULL, NULL, 0, '2020-06-05 00:17:30', '2020-06-05 00:17:30'),
(8, 10, 3, 'KDOCJAT48QLQQPHISX35', NULL, NULL, '11', '2.2', '13.2', NULL, NULL, 0, '2020-06-05 00:18:13', '2020-06-05 00:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_min` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `withdraw_max` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `slogan`, `icon`, `symbol`, `withdraw_min`, `withdraw_max`, `fix`, `percent`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bitcoin (BTC)', 'Wallet Address', '<em class=\'icon ni ni-sign-btc-alt\'></em>', 'sign-btc-alt', '10', '2000', '25', '1.10', '3', 1, '2017-07-28 09:10:00', '2018-09-19 13:43:17'),
(2, 'Paypal', 'Paypal Address', '<em class=\'icon ni ni-sign-paypal-alt\'></em>', 'sign-paypal-alt', '10', '2000', '25', '1.10', '3', 1, '2017-07-28 09:10:00', '2018-09-19 13:43:17'),
(3, 'Bank Transfer', 'Account Number', '<em class=\'icon ni ni-building-fill\'></em>', 'building-fill', '10', '20000', '2', '1.8', '1', 1, '2017-08-09 15:06:21', '2018-09-19 13:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinmarketpays`
--
ALTER TABLE `coinmarketpays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinmarkets`
--
ALTER TABLE `coinmarkets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinwallets`
--
ALTER TABLE `coinwallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cryptowallets`
--
ALTER TABLE `cryptowallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localbanks`
--
ALTER TABLE `localbanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxes`
--
ALTER TABLE `trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coinmarketpays`
--
ALTER TABLE `coinmarketpays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `coinmarkets`
--
ALTER TABLE `coinmarkets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coinwallets`
--
ALTER TABLE `coinwallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `cryptowallets`
--
ALTER TABLE `cryptowallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `localbanks`
--
ALTER TABLE `localbanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trxes`
--
ALTER TABLE `trxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
