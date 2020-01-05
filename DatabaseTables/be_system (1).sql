-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 05:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'Head Office', 3, '2019-12-30 08:01:04', '2019-12-30 08:33:14'),
(2, 'Rabaa Branch', 5, '2019-12-31 06:13:08', '2019-12-31 06:13:08'),
(3, 'October Branch', 10, '2019-12-31 06:24:30', '2019-12-31 06:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Hassan Taha', 10, '2019-12-31 09:25:40', '2019-12-31 09:25:40'),
(3, 'Mahmoud Hegazy', 12, '2019-12-31 09:29:30', '2019-12-31 09:29:30'),
(4, 'noho@mailinator.com', NULL, '2019-12-31 13:17:14', '2019-12-31 13:17:14'),
(5, 'huvevicexu@mailinator.net', NULL, '2019-12-31 13:20:23', '2019-12-31 13:20:23'),
(6, 'Mohamed Samy', 17, '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(7, 'Sayed', 19, '2020-01-02 13:38:37', '2020-01-02 13:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `deployment_info`
--

CREATE TABLE `deployment_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deployment_info`
--

INSERT INTO `deployment_info` (`id`, `project_id`, `domain`, `cpanel_url`, `cpanel_username`, `cpanel_password`, `dashboard_url`, `dashboard_username`, `dashboard_password`, `created_at`, `updated_at`) VALUES
(2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:38:37', '2020-01-05 14:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `path`, `created_at`, `updated_at`) VALUES
(7, 'dashboardImages\\projects\\1577791449logo-1.png', '2019-12-31 09:24:09', '2019-12-31 09:24:09'),
(8, 'dashboardImages\\projects\\1577791501logo-1.png', '2019-12-31 09:25:01', '2019-12-31 09:25:01'),
(9, 'dashboardImages\\projects\\1577791501logo-1.png', '2019-12-31 09:25:01', '2019-12-31 09:25:01'),
(10, 'dashboardImages\\projects\\1577791540logo-1.png', '2019-12-31 09:25:40', '2019-12-31 09:25:40'),
(11, 'dashboardImages\\projects\\1577791540logo-1.png', '2019-12-31 09:25:40', '2019-12-31 09:25:40'),
(12, 'dashboardImages\\projects\\1577791770logo-1.png', '2019-12-31 09:29:30', '2019-12-31 09:29:30'),
(13, 'dashboardImages\\projects\\1577791770logo-1.png', '2019-12-31 09:29:30', '2019-12-31 09:29:30'),
(14, 'dashboardImages\\projects\\1577791770logo-1.png', '2019-12-31 09:29:30', '2019-12-31 09:29:30'),
(15, 'dashboardImages\\projects\\1577805434logo-1.png', '2019-12-31 13:17:14', '2019-12-31 13:17:14'),
(16, 'dashboardImages\\projects\\1577805623logo-1.png', '2019-12-31 13:20:23', '2019-12-31 13:20:23'),
(17, 'dashboardImages\\projects\\1577978927logo-1.png', '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(18, 'dashboardImages\\projects\\1577978927logo-1.png', '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(19, 'dashboardImages\\projects\\1577979517logo-1.png', '2020-01-02 13:38:37', '2020-01-02 13:38:37'),
(20, 'dashboardImages\\projects\\1577979517logo-1.png', '2020-01-02 13:38:37', '2020-01-02 13:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL,
  `is_leader` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_id`, `username`, `position_id`, `branch_id`, `team_id`, `is_leader`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Mr. Bassam', 1, 1, NULL, 1, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(4, NULL, 'Wael Abdelsalam', 3, 1, 7, 1, '2019-12-30 11:23:27', '2019-12-30 12:04:18'),
(5, NULL, 'Ahmed Fathi', 2, 1, 6, 1, '2019-12-30 11:57:07', '2019-12-30 11:57:07'),
(6, NULL, 'Mohamed Morsy', 4, 1, 10, 1, '2019-12-31 06:07:53', '2019-12-31 06:34:38'),
(7, NULL, 'Hussein Hosny', 3, 1, 7, 1, '2019-12-31 06:08:40', '2019-12-31 06:08:40'),
(8, NULL, 'Ahmed Hayder', 6, 2, 8, 1, '2019-12-31 06:18:35', '2019-12-31 06:34:01'),
(10, NULL, 'Mohamed Badr', 18, NULL, NULL, 1, '2019-12-31 06:23:58', '2019-12-31 06:23:58'),
(11, 1, 'Mohamed Kidwany', 6, 2, 9, 1, '2019-12-31 06:25:40', '2019-12-31 06:25:40'),
(12, 2, 'Ameer Morsy', 5, 2, 12, 1, '2019-12-31 11:19:36', '2019-12-31 11:20:44'),
(13, NULL, 'Mahmoud Gad', 10, 2, 6, NULL, '2020-01-02 13:18:03', '2020-01-02 13:18:03'),
(14, NULL, 'Mostafa Ibrahim', 6, 2, 8, NULL, '2020-01-02 13:18:30', '2020-01-02 13:18:30'),
(15, NULL, 'Mohamed Seif', 6, 2, 8, NULL, '2020-01-02 13:18:50', '2020-01-02 13:18:50'),
(16, NULL, 'Amr Abo Al Naga', 7, 2, 12, NULL, '2020-01-02 13:19:20', '2020-01-02 13:19:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_26_102230_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_position` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `title`, `parent_position`, `created_at`, `updated_at`) VALUES
(1, 'CEO', NULL, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(2, 'CTO', 1, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(3, 'Sales Manager', 1, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(4, 'Sales Team Leader', 3, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(5, 'Mobile Technical Team Leader', 2, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(6, 'Front End Team Leader', 2, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(7, 'Android Developer', 5, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(8, 'IOS Developer', 5, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(9, 'Back End Team Leader', 2, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(10, 'Back End Developer', 2, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(11, 'Database Developer', 9, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(12, 'Sales Man', 4, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(13, 'Marketing Manager', 1, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(14, 'Graphic Designer', 6, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(15, 'SEO Specialist', 13, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(16, 'Social Media Specialist', 13, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(17, 'Branch Manager', 1, '2019-12-30 22:00:00', '2019-12-30 22:00:00'),
(18, 'Human Resource Manager', NULL, '2019-12-30 22:00:00', '2019-12-30 22:00:00'),
(19, 'Front End Developer', 6, '2019-12-30 22:00:00', '2019-12-30 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `client_id` int(10) UNSIGNED NOT NULL,
  `contract_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `sales_man_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `domain`, `client_id`, `contract_id`, `content_id`, `sales_man_id`, `status_id`, `project_type`, `created_at`, `updated_at`) VALUES
(5, 'Conzil Mobile Application', NULL, NULL, 6, 18, NULL, 6, 1, 'Web & Mobile', '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(6, 'Shuttle Travel', NULL, NULL, 7, 20, NULL, 7, 12, 'Web', '2020-01-02 13:38:37', '2020-01-05 14:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `project_timeline`
--

CREATE TABLE `project_timeline` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `designer` int(10) UNSIGNED DEFAULT NULL,
  `developer` int(10) UNSIGNED DEFAULT NULL,
  `design_start` timestamp NULL DEFAULT NULL,
  `design_finish` timestamp NULL DEFAULT NULL,
  `design_approved` timestamp NULL DEFAULT NULL,
  `development_start` timestamp NULL DEFAULT NULL,
  `development_finish` timestamp NULL DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tested` int(1) DEFAULT NULL,
  `data_filled` int(1) DEFAULT NULL,
  `deployed` int(1) DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_timeline`
--

INSERT INTO `project_timeline` (`id`, `project_id`, `designer`, `developer`, `design_start`, `design_finish`, `design_approved`, `development_start`, `development_finish`, `notes`, `tested`, `data_filled`, `deployed`, `approved`, `created_at`, `updated_at`) VALUES
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 13:28:47', '2020-01-02 13:28:47'),
(5, 6, 15, 13, '2020-01-01 22:00:00', '2020-01-07 22:00:00', '2020-01-04 22:00:00', '2020-01-09 22:00:00', '2020-01-16 22:00:00', NULL, 1, 1, 1, 1, '2020-01-02 13:38:37', '2020-01-05 14:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Not Started', NULL, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(2, 'In Progress', NULL, '2019-12-29 22:00:00', '2019-12-29 22:00:00'),
(3, 'Design Started', NULL, NULL, NULL),
(4, 'Design Finished', NULL, NULL, NULL),
(5, 'Development Started', NULL, NULL, NULL),
(6, 'Development Finished', NULL, NULL, NULL),
(7, 'Approved From Sales', NULL, NULL, NULL),
(8, 'Approved From Client', NULL, NULL, NULL),
(9, 'Filling Data', NULL, '2019-12-31 22:00:00', '2019-12-31 22:00:00'),
(10, 'Waiting Approve From Client', NULL, '2019-12-31 22:00:00', '2019-12-31 22:00:00'),
(11, 'Ready To Fill Data', NULL, NULL, NULL),
(12, 'Completed', NULL, '2020-01-01 22:00:00', '2020-01-01 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `description`, `leader_id`, `created_at`, `updated_at`) VALUES
(1, 'Be Group', NULL, 3, '2019-12-30 09:08:24', '2019-12-30 10:41:19'),
(6, 'Development Team', NULL, 5, '2019-12-30 10:50:32', '2019-12-30 12:22:26'),
(7, 'Sales Team', NULL, NULL, '2019-12-30 11:00:35', '2019-12-30 11:00:35'),
(8, 'Front End Team', NULL, NULL, '2019-12-30 11:01:03', '2019-12-30 11:01:03'),
(9, 'Back End Team', NULL, NULL, '2019-12-30 11:01:16', '2019-12-30 11:01:16'),
(10, 'Sales Team (Morsy)', NULL, 6, '2019-12-31 06:25:06', '2019-12-31 06:25:06'),
(11, 'Sales Team (Hussein Hosny)', NULL, 7, '2019-12-31 06:35:52', '2019-12-31 06:35:52'),
(12, 'Mobile Team', NULL, 12, '2019-12-31 11:19:59', '2019-12-31 11:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Kidwany', 'kidwany60@gmail.com', NULL, '$2y$10$X78F7NfXE8Y88LIDF2RZ/eBHdoRYto4.TBgJSsrH6e/UW8AqUnUpi', NULL, '2019-12-29 10:54:08', '2019-12-29 10:54:08'),
(2, 'Ameer Morsy', 'ameer@gmail.com', NULL, '$2y$10$TYuHF29/jP8lKM9UWQXNW.5GYo2FS4g4WZ9o6EdtuOmnQD6H6jyV6', NULL, '2019-12-31 11:14:46', '2019-12-31 11:14:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manger_member_id` (`manager_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_logo_image` (`logo`);

--
-- Indexes for table `deployment_info`
--
ALTER TABLE `deployment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deployment_project_id` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_user_id` (`user_id`),
  ADD KEY `member_position_id` (`position_id`),
  ADD KEY `member_branch_id` (`branch_id`),
  ADD KEY `member_team_id` (`team_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_position_id` (`parent_position`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_client_id` (`client_id`),
  ADD KEY `project_contract_id` (`contract_id`),
  ADD KEY `project_content_id` (`content_id`),
  ADD KEY `project_status_id` (`status_id`),
  ADD KEY `project_sales_man_id` (`sales_man_id`);

--
-- Indexes for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_designer` (`designer`),
  ADD KEY `project_developer` (`developer`),
  ADD KEY `parent_project_id` (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_leader_id` (`leader_id`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deployment_info`
--
ALTER TABLE `deployment_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_timeline`
--
ALTER TABLE `project_timeline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `manger_member_id` FOREIGN KEY (`manager_id`) REFERENCES `member` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_logo_image` FOREIGN KEY (`logo`) REFERENCES `file` (`id`);

--
-- Constraints for table `deployment_info`
--
ALTER TABLE `deployment_info`
  ADD CONSTRAINT `deployment_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `member_position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `member_team_id` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `member_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `parent_position_id` FOREIGN KEY (`parent_position`) REFERENCES `position` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `project_content_id` FOREIGN KEY (`content_id`) REFERENCES `file` (`id`),
  ADD CONSTRAINT `project_contract_id` FOREIGN KEY (`contract_id`) REFERENCES `file` (`id`),
  ADD CONSTRAINT `project_sales_man_id` FOREIGN KEY (`sales_man_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `project_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD CONSTRAINT `parent_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_designer` FOREIGN KEY (`designer`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `project_developer` FOREIGN KEY (`developer`) REFERENCES `member` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_leader_id` FOREIGN KEY (`leader_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
