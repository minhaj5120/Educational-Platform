-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 12:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education-platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_fees`
--

CREATE TABLE `add_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT 0,
  `paid_amount` int(11) DEFAULT 0,
  `remaining_amount` int(11) DEFAULT 0,
  `payment_types` varchar(255) NOT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not,1:yes',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_fees`
--

INSERT INTO `add_fees` (`id`, `student_id`, `class_id`, `total_amount`, `paid_amount`, `remaining_amount`, `payment_types`, `remark`, `is_paid`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 150, 80, 70, 'cheque', 'Eighty Doller', 1, 3, '2023-11-30 16:34:16', '2023-11-30 16:34:16'),
(3, 5, 3, 70, 20, 50, 'cash', 'Twenty Doller', 1, 3, '2023-11-30 16:39:31', '2023-11-30 16:39:31'),
(4, 5, 3, 50, 30, 20, 'cash', 'Thirty Doller', 1, 3, '2023-11-30 16:39:51', '2023-11-30 16:39:51'),
(5, 20, 3, 150, 100, 50, 'cash', 'Hundred Dollers', 1, 3, '2023-11-30 16:51:03', '2023-11-30 16:51:03'),
(6, 20, 3, 50, 20, 30, 'cash', 'Twenty Dollers', 1, 3, '2023-11-30 16:51:26', '2023-11-30 16:51:26'),
(14, 5, 3, 20, 5, 15, 'cash', 'Five Doller', 0, 5, '2023-12-01 16:07:47', '2023-12-01 16:07:47'),
(15, 5, 3, 20, 5, 15, 'cash', 'Five Doller', 1, 5, '2023-12-01 16:07:47', '2023-12-01 16:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active,1:inactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no,1:yes',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `amount`, `status`, `is_deleted`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'SS1', 100, 0, 0, '3', '2023-11-13 22:15:16', '2023-11-29 18:33:08'),
(3, 'SS2', 150, 0, 0, '7', '2023-11-14 09:55:33', '2023-11-29 18:32:53'),
(4, 'SS3', 160, 0, 0, '3', '2023-11-20 15:58:27', '2023-11-29 18:32:43'),
(5, 'SS4', 180, 0, 0, '3', '2023-11-20 15:58:37', '2023-11-29 18:32:32'),
(6, 'SS5', 200, 0, 0, '3', '2023-11-29 18:31:18', '2023-11-29 18:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no,1:yes',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active,1:inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 7, '3', 0, 0, '2023-11-16 03:08:24', '2023-11-16 03:08:24'),
(4, 3, 8, '3', 0, 0, '2023-11-16 03:08:24', '2023-11-16 03:08:24'),
(5, 2, 7, '3', 0, 0, '2023-11-19 15:57:42', '2023-11-19 15:57:42'),
(6, 3, 9, '3', 0, 0, '2023-11-19 15:58:30', '2023-11-19 15:58:30'),
(7, 3, 11, '3', 0, 0, '2023-11-19 18:23:41', '2023-11-19 18:23:41'),
(8, 3, 10, '3', 0, 0, '2023-11-19 18:23:41', '2023-11-19 18:23:41'),
(9, 4, 11, '3', 0, 0, '2023-11-20 16:06:16', '2023-11-20 16:06:16'),
(10, 4, 10, '3', 0, 0, '2023-11-20 16:06:16', '2023-11-20 16:06:16'),
(11, 5, 9, '3', 0, 0, '2023-11-20 16:06:30', '2023-11-20 16:06:30'),
(12, 5, 11, '3', 0, 0, '2023-11-20 16:06:30', '2023-11-20 16:06:30'),
(13, 5, 10, '3', 0, 0, '2023-11-20 16:06:30', '2023-11-20 16:06:30'),
(14, 5, 7, '3', 0, 0, '2023-11-20 16:06:30', '2023-11-20 16:06:30'),
(15, 2, 13, '3', 0, 0, '2023-11-29 20:13:33', '2023-11-29 20:13:33'),
(16, 2, 11, '3', 0, 0, '2023-11-29 20:13:33', '2023-11-29 20:13:33'),
(17, 2, 14, '3', 0, 0, '2023-11-29 20:13:33', '2023-11-29 20:13:33'),
(18, 6, 13, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(19, 6, 12, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(20, 6, 9, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(21, 6, 15, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(22, 6, 14, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(23, 6, 10, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(24, 6, 7, '3', 0, 0, '2023-11-29 20:13:58', '2023-11-29 20:13:58'),
(25, 3, 19, '3', 0, 0, '2023-12-03 09:53:04', '2023-12-03 09:53:04'),
(26, 3, 16, '3', 0, 0, '2023-12-03 09:53:04', '2023-12-03 09:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no,1:yes',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active,1:inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`id`, `class_id`, `teacher_id`, `created_by`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 14, 3, 0, 0, '2023-11-19 15:35:34', '2023-11-19 15:35:34'),
(12, 3, 12, 3, 0, 0, '2023-11-19 15:56:21', '2023-11-19 15:56:21'),
(13, 3, 4, 3, 0, 0, '2023-11-19 15:56:21', '2023-11-19 15:56:21'),
(14, 4, 14, 3, 0, 0, '2023-11-29 20:15:51', '2023-11-29 20:15:51'),
(15, 4, 12, 3, 0, 0, '2023-11-29 20:15:51', '2023-11-29 20:15:51'),
(16, 4, 4, 3, 0, 0, '2023-11-29 20:15:51', '2023-11-29 20:15:51'),
(17, 2, 27, 3, 0, 0, '2023-11-29 20:18:27', '2023-11-29 20:18:27'),
(18, 2, 15, 3, 0, 0, '2023-11-29 20:18:27', '2023-11-29 20:18:27'),
(19, 5, 28, 3, 0, 0, '2023-11-29 20:18:47', '2023-11-29 20:18:47'),
(20, 5, 27, 3, 0, 0, '2023-11-29 20:18:47', '2023-11-29 20:18:47'),
(21, 5, 12, 3, 0, 0, '2023-11-29 20:18:47', '2023-11-29 20:18:47'),
(22, 6, 28, 3, 0, 0, '2023-11-29 20:18:58', '2023-11-29 20:18:58'),
(23, 6, 15, 3, 0, 0, '2023-11-29 20:18:58', '2023-11-29 20:18:58'),
(24, 6, 14, 3, 0, 0, '2023-11-29 20:18:58', '2023-11-29 20:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE `class_time` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(30) DEFAULT NULL,
  `end_time` varchar(30) DEFAULT NULL,
  `room_number` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(6, 5, 7, 3, '03:00', '04:50', '402', '2023-11-20 18:49:20', '2023-11-20 18:49:20'),
(7, 5, 7, 7, '01:00', '02:50', '602', '2023-11-20 18:49:20', '2023-11-20 18:49:20'),
(10, 5, 11, 1, '08:00', '09:20', '504', '2023-11-20 18:56:04', '2023-11-20 18:56:04'),
(11, 5, 11, 2, '10:00', '11:20', '504', '2023-11-20 18:56:04', '2023-11-20 18:56:04'),
(14, 4, 10, 4, '03:10', '04:35', '705', '2023-11-20 19:19:14', '2023-11-20 19:19:14'),
(15, 4, 10, 6, '01:10', '02:20', '705', '2023-11-20 19:19:14', '2023-11-20 19:19:14'),
(16, 5, 10, 1, '02:30', '03:00', '705', '2023-11-21 13:54:35', '2023-11-21 13:54:35'),
(17, 5, 10, 2, '03:30', '04:50', '504', '2023-11-21 13:54:35', '2023-11-21 13:54:35'),
(18, 3, 11, 4, '09:00', '11:00', '904', '2023-11-22 09:27:07', '2023-11-22 09:27:07'),
(19, 3, 11, 6, '09:00', '11:00', '904', '2023-11-22 09:27:07', '2023-11-22 09:27:07'),
(20, 3, 10, 1, '11:00', '12:30', '503', '2023-11-22 12:27:58', '2023-11-22 12:27:58'),
(21, 3, 10, 3, '11:00', '12:30', '503', '2023-11-22 12:27:58', '2023-11-22 12:27:58'),
(24, 3, 8, 2, '08:00', '09:30', '603', '2023-11-22 12:29:36', '2023-11-22 12:29:36'),
(25, 3, 8, 7, '08:00', '09:30', '603', '2023-11-22 12:29:36', '2023-11-22 12:29:36'),
(28, 2, 7, 1, '03:10', '03:00', '515', '2023-11-23 02:29:16', '2023-11-23 02:29:16'),
(29, 2, 7, 2, '02:00', '03:00', '505', '2023-11-23 02:29:16', '2023-11-23 02:29:16'),
(30, 3, 16, 1, '10:00', '01:00', '904', '2023-12-03 11:39:42', '2023-12-03 11:39:42'),
(31, 3, 19, 4, '02:00', '05:00', '711', '2023-12-03 11:40:17', '2023-12-03 11:40:17'),
(32, 3, 9, 1, '02:00', '03:20', '703', '2023-12-03 11:41:00', '2023-12-03 11:41:00'),
(33, 3, 9, 3, '02:00', '03:20', '703', '2023-12-03 11:41:00', '2023-12-03 11:41:00'),
(34, 3, 7, 2, '05:00', '06:30', '812', '2023-12-03 11:41:36', '2023-12-03 11:41:36'),
(35, 3, 7, 7, '05:00', '06:30', '812', '2023-12-03 11:41:36', '2023-12-03 11:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no,1:yes',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', 'Note 1', 0, 3, '2023-11-23 02:22:32', '2023-11-23 02:22:32'),
(2, 'Test 2', 'Note 2', 0, 3, '2023-11-23 02:38:47', '2023-11-23 02:38:47'),
(3, 'Test 3', 'Note 70', 0, 3, '2023-11-26 16:33:27', '2023-11-27 15:05:13'),
(4, 'test 4', 'note 6', 0, 3, '2023-11-27 14:47:46', '2023-11-27 15:13:54'),
(5, 'test 10', 'note', 1, 3, '2023-11-27 15:07:26', '2023-11-27 15:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(25) DEFAULT NULL,
  `full_marks` varchar(25) DEFAULT NULL,
  `passing_marks` varchar(25) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `passing_marks`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 7, '2023-11-02', '18:36', '20:36', '2', '100', '55', 3, '2023-11-29 12:17:20', '2023-11-29 12:17:20'),
(4, 3, 3, 7, '2023-11-21', '10:00', '11:30', '10', '100', '40', 3, '2023-11-29 12:19:19', '2023-11-29 12:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `stripe_key` varchar(500) DEFAULT NULL,
  `stripe_secret` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `stripe_key`, `stripe_secret`, `created_at`, `updated_at`) VALUES
(1, 'jewhdhewd', 'bdjaehudh', '2023-12-01 17:08:20', '2023-12-01 17:08:20'),
(2, 'jewhdhewd', 'bdjaehudh', '2023-12-01 17:09:19', '2023-12-01 17:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1:present,2:absent,3:late\r\n',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `class_id`, `student_id`, `date`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2023-12-03', 1, 3, '2023-12-02 14:31:41', '2023-12-02 14:31:41'),
(3, 3, 20, '2023-12-03', 3, 3, '2023-12-02 14:32:32', '2023-12-02 16:21:50'),
(4, 3, 23, '2023-12-03', 3, 3, '2023-12-02 14:32:36', '2023-12-02 14:51:46'),
(5, 3, 26, '2023-12-03', 1, 3, '2023-12-02 14:32:40', '2023-12-02 16:23:31'),
(7, 6, 18, '2023-12-03', 1, 3, '2023-12-02 14:52:26', '2023-12-02 14:52:26'),
(8, 6, 21, '2023-12-03', 1, 3, '2023-12-02 14:52:29', '2023-12-02 14:52:29'),
(9, 6, 24, '2023-12-03', 3, 3, '2023-12-02 14:52:32', '2023-12-02 14:52:32'),
(10, 3, 5, '2023-12-04', 3, 3, '2023-12-02 14:52:55', '2023-12-02 14:52:55'),
(11, 3, 20, '2023-12-04', 1, 3, '2023-12-02 14:52:59', '2023-12-02 14:52:59'),
(12, 3, 23, '2023-12-04', 1, 3, '2023-12-02 14:53:02', '2023-12-02 14:53:02'),
(13, 3, 26, '2023-12-04', 2, 3, '2023-12-02 14:53:05', '2023-12-02 14:53:05'),
(14, 6, 18, '2023-12-04', 1, 3, '2023-12-02 15:43:11', '2023-12-02 15:43:11'),
(15, 6, 21, '2023-12-04', 1, 3, '2023-12-02 15:43:15', '2023-12-02 15:43:15'),
(16, 6, 24, '2023-12-04', 1, 3, '2023-12-02 15:43:18', '2023-12-02 15:43:18'),
(17, 5, 13, '2023-12-03', 1, 3, '2023-12-02 15:43:38', '2023-12-02 15:43:38'),
(18, 5, 17, '2023-12-03', 1, 3, '2023-12-02 15:43:42', '2023-12-02 15:43:42'),
(19, 5, 13, '2023-12-04', 1, 3, '2023-12-02 15:43:53', '2023-12-02 15:43:53'),
(20, 5, 17, '2023-12-04', 1, 3, '2023-12-02 15:43:57', '2023-12-02 15:43:57'),
(21, 3, 5, '2023-12-05', 1, 3, '2023-12-03 03:19:17', '2023-12-03 03:19:17'),
(22, 3, 5, '2023-12-06', 1, 3, '2023-12-03 03:19:36', '2023-12-03 03:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active,1:inactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not,1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `status`, `is_deleted`, `created_at`, `updated_at`, `created_by`) VALUES
(7, 'Physics', 'Theory', 0, 0, '2023-11-14 19:00:24', '2023-11-14 19:00:24', '3'),
(9, 'Chemestry', 'Theory', 0, 0, '2023-11-19 15:58:06', '2023-11-19 15:58:06', '3'),
(10, 'Math', 'Theory', 0, 0, '2023-11-19 18:23:02', '2023-11-19 18:23:02', '3'),
(11, 'English', 'Theory', 0, 0, '2023-11-19 18:23:24', '2023-11-19 18:23:24', '3'),
(12, 'Biology', 'Theory', 0, 0, '2023-11-29 20:10:52', '2023-11-29 20:10:52', '3'),
(13, 'Bangla', 'Theory', 0, 0, '2023-11-29 20:11:17', '2023-11-29 20:11:17', '3'),
(14, 'Ict', 'Theory', 0, 0, '2023-11-29 20:11:51', '2023-11-29 20:11:51', '3'),
(15, 'Higher Math', 'Theory', 0, 0, '2023-11-29 20:12:45', '2023-11-29 20:12:45', '3'),
(16, 'Ict(P)', 'practical', 0, 0, '2023-12-03 09:51:22', '2023-12-03 09:51:22', '3'),
(17, 'Physics(P)', 'practical', 0, 0, '2023-12-03 09:51:49', '2023-12-03 09:51:49', '3'),
(18, 'Biology(P)', 'practical', 0, 0, '2023-12-03 09:52:16', '2023-12-03 09:52:16', '3'),
(19, 'Chemestry(P)', 'practical', 0, 0, '2023-12-03 09:52:37', '2023-12-03 09:52:37', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(10) NOT NULL DEFAULT '1' COMMENT '1:Male,2:Female,3:Other',
  `date_of_birth` date DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `category` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1:admin,2:student,3:teacher',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not deleted,1:deleted',
  `status` tinyint(4) DEFAULT 0 COMMENT '0:active, 1:inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `number`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `religion`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `category`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Minhaj Uddin', NULL, 'minhaj5120@gmail.com', '$2y$10$LmVA8hCOCKQ2TBIpe9nBBu/bu32sfHjCZNTvlfUfeOg6UkYzrx3vG', '01728128184', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2023-11-06 04:11:55', '2023-11-06 04:11:55'),
(4, 'Mirza Bushra', NULL, 'bushra5120@gmail.com', '$2y$10$00gbjZyciFooLJXTtVahTOc2KP7SufEgWhPBJWgx1dl1l54cxL1Te', '9999999999', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-07 01:36:27', '2023-11-07 01:36:27'),
(5, 'Alvi ', 'Rahman', 'alvi5120@gmail.com', '$2y$10$QarNQ/sLCiA5KASEdHRINuL26lMYTKk8bktLVT9CLuUFlcl30fLIq', '88888888888', '599', '21201198', 3, '1', '2000-09-22', 'Islam', '2023-11-22', 'k865fdnjsmwzu2tinvqs.png', '0+', '177', '90', 2, 0, 0, '2023-11-08 06:22:44', '2023-11-17 01:24:21'),
(7, 'Fahad', NULL, 'fahad5120@gmail.com', '$2y$10$eb0MnKHd6TJOL0RWNNvQ0e0Z9HRt/ViKYLR1MreDIEwN0.gnSNlsK', '01728128185', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2023-11-13 06:38:34', '2023-11-13 08:18:06'),
(10, 'Fahad uddin', NULL, 'minhajfahad10@gmail.com', '$2y$10$pde6ibprkXS9uS72jXNH.u2UKW28NTyK3p0bk6CTE1k7VKjPUW9M6', '01728128186', NULL, NULL, 2, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2023-11-13 08:46:19', '2023-11-13 08:46:23'),
(12, 'Bushra', NULL, 'bushra22@gmail.com', '$2y$10$SiYMMC4PcC5RC23E5R8hhenSrDFs.1x1AtHREQD.pmxMY6iw2ek7u', '66666666', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 01:06:01', '2023-11-15 01:06:01'),
(13, 'Towfiq ', 'Karim', 'rohan33@gmail.com', '$2y$10$MHvNmU8Q6QuS4VRtcOb41ejdQi8wwP1HHjKx9XdmL636Zu7fMkf8K', '77777777777', '277', '21201190', 5, '1', '2000-11-22', 'Islam', '2023-11-22', 'k865fdnjsmwzu2tinvqs.png', 'O-', '178', '80', 2, 0, 0, '2023-11-15 01:53:39', '2023-11-17 01:24:13'),
(14, 'Tasheen Rahman', NULL, 'tashin22@gmail.com', '$2y$10$3v88hAwn3d3Z/Ns/knIO6uW/iH4zdv6VQ1QvoWJ2OkHAf/9q.cWPO', '2222222222', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 02:30:56', '2023-11-15 02:30:56'),
(15, 'mirza', NULL, 'mirza@gmail.com', '$2y$10$CuPddYKz605DGxXOhrR52eDxOeLlge9QCE6MVAiU612VvMFaVdfS2', '01234567891', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 03:45:56', '2023-11-15 03:45:56'),
(17, 'Minhaj', 'Fahad', 'minhaj5129@gmail.com', '$2y$10$J.flBdYdAf8/gKJOhnviJ.fcLSE8ESi9K5Co0LBZw1UrVYa0t7P1S', '01728128110', '288', '21201515', 5, '1', '2000-02-01', 'Islam', '2023-11-21', 'k865fdnjsmwzu2tinvqs.png', '0+', '5.7', '63', 2, 0, 0, '2023-11-21 08:41:23', '2023-11-21 08:41:23'),
(18, 'Mohammad', 'Rahman', 'mrahman@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01711234567', 'ADM001', 'ROL001', 4, 'Male', '1995-05-15', 'Islam', '2018-01-01', 'k865fdnjsmwzu2tinvqs.png', 'A+', '170 cm', '65 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(19, 'Fatima', 'Akter', 'fakhter@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01987654321', 'ADM002', 'ROL002', 2, 'Female', '1998-09-25', 'Islam', '2019-02-10', 'k865fdnjsmwzu2tinvqs.png', 'B', '160 cm', '50 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(20, 'Abdul', 'Karim', 'akarim@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01611223344', 'ADM003', 'ROL003', 3, 'Male', '1997-03-08', 'Islam', '2020-11-20', 'k865fdnjsmwzu2tinvqs.png', 'O-', '175 cm', '70 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(21, 'Ayesha', 'Khan', 'akhan@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01876543210', 'ADM004', 'ROL004', 6, 'Female', '1996-12-12', 'Islam', '2017-08-05', 'k865fdnjsmwzu2tinvqs.png', 'AB+', '162 cm', '55 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(22, 'Mosharraf', 'Hossain', 'mhossain@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01987654321', 'ADM005', 'ROL005', 2, 'Male', '1999-07-30', 'Islam', '2021-04-15', 'k865fdnjsmwzu2tinvqs.png', 'B+', '168 cm', '68 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(23, 'Nazia', 'Akter', 'nakter@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01711223344', 'ADM006', 'ROL006', 3, 'Female', '1998-02-18', 'Islam', '2019-10-10', 'k865fdnjsmwzu2tinvqs.png', 'A-', '155 cm', '48 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(24, 'Imran', 'Khan', 'ikhan@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01876543210', 'ADM007', 'ROL007', 6, 'Male', '1994-09-01', 'Islam', '2016-03-20', 'k865fdnjsmwzu2tinvqs.png', 'O+', '175 cm', '75 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(25, 'Sara', 'Ahmed', 'sahmed@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01789012345', 'ADM008', 'ROL008', 2, 'Female', '1997-11-05', 'Islam', '2020-02-28', 'k865fdnjsmwzu2tinvqs.png', 'B-', '160 cm', '50 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(26, 'Rahim', 'Ali', 'rali@example.com', '$2y$10$S/4ObRi3a7YX1U6w6EbFwu9R0b7q96x/9DEy4zRmTnN6Lss1DWnt2', '01611223344', 'ADM009', 'ROL009', 3, 'Male', '1996-06-22', 'Islam', '2018-08-15', 'k865fdnjsmwzu2tinvqs.png', 'AB+', '172 cm', '70 kg', 2, 0, 0, '2023-11-21 20:23:22', '2023-11-21 20:23:22'),
(27, 'Sumaiya ', 'Hasan', 'sumaiya5120@gmail.com', '$2y$10$lFrRdknhwTjqxx.KPxzA9uibKTos.4qW9V0XARItj2HSQGR3Gip9y', '854573748739', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-29 14:17:11', '2023-11-29 14:17:11'),
(28, 'Tawsif', 'Islam', 'tawsif11@gmail.com', '$2y$10$ssdjwxBFWTn4Af.gi.D2G.hiJdVKSVih3Fox2yMptHghRBJcJEsPO', '34873256732', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-29 14:18:01', '2023-11-29 14:18:01'),
(29, 'Sadia ', 'Rahman', 'sadia@example.com', '$2y$10$randomhash', '01876543210', '890', '215', 4, '2', '2002-05-15', 'Islam', '2023-11-10', 'k865fdnjsmwzu2tinvqs.png', 'A+', '160', '50', 2, 0, 0, '2023-11-10 03:30:00', '2023-11-10 03:30:00'),
(30, 'Arif ', 'Ahmed', 'arif@example.com', '$2y$10$randomhash', '01798765432', '755', '218', 3, '1', '2003-03-22', 'Hinduism', '2023-11-11', 'k865fdnjsmwzu2tinvqs.png', 'B-', '165', '55', 2, 0, 0, '2023-11-11 04:45:00', '2023-11-11 04:45:00'),
(31, 'Nusrat ', 'Islam', 'nusrat@example.com', '$2y$10$randomhash', '01687654321', '1011', '230', 1, '2', '2001-08-07', 'Christianity', '2023-11-15', 'k865fdnjsmwzu2tinvqs.png', 'O+', '155', '48', 2, 0, 0, '2023-11-15 08:20:00', '2023-11-15 08:20:00'),
(32, 'Farhan ', 'Khan', 'farhan@example.com', '$2y$10$randomhash', '01987654321', '1212', '260', 2, '1', '2002-01-10', 'Islam', '2023-11-18', 'k865fdnjsmwzu2tinvqs.png', 'AB+', '162', '52', 2, 0, 0, '2023-11-18 05:15:00', '2023-11-18 05:15:00'),
(33, 'Mehnaz ', 'Akter', 'mehnaz@example.com', '$2y$10$randomhash', '01876543210', '1213', '300', 4, '2', '2003-07-03', 'Hinduism', '2023-11-20', NULL, 'A-', '158', '49', 2, 0, 0, '2023-11-20 03:45:00', '2023-11-20 03:45:00'),
(34, 'Rahim ', 'Uddin', 'rahim@example.com', '$2y$10$randomhash', '01789012345', '1715', '310', 4, '1', '2001-11-25', 'Islam', '2023-11-22', NULL, 'B+', '170', '58', 2, 0, 0, '2023-11-22 04:30:00', '2023-11-22 04:30:00'),
(35, 'Sabrina ', 'Islam', 'sabrina@example.com', '$2y$10$randomhash', '01676543210', '2121', '320', 5, '2', '2002-09-18', 'Christianity', '2023-11-24', NULL, 'A+', '162', '55', 2, 0, 0, '2023-11-24 05:30:00', '2023-11-24 05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fullcalendar_day` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `fullcalendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, NULL, NULL),
(2, 'Tuesday', 2, NULL, NULL),
(3, 'Wednesday', 3, NULL, NULL),
(4, 'Thursday', 4, NULL, NULL),
(5, 'Friday', 5, NULL, NULL),
(6, 'Saturday', 6, NULL, NULL),
(7, 'Sunday', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_fees`
--
ALTER TABLE `add_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time`
--
ALTER TABLE `class_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_fees`
--
ALTER TABLE `add_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
