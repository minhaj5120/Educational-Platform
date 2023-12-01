-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 03:14 PM
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
-- Database: `educational-platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active,1:inactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no,1:yes',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`, `is_deleted`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Class2', 0, 0, '3', '2023-11-13 22:15:16', '2023-11-13 22:15:16'),
(3, 'Class3', 0, 0, '7', '2023-11-14 09:55:33', '2023-11-14 10:29:20');

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
(1, 3, 7, '3', 0, 0, '2023-11-14 21:09:40', '2023-11-14 21:09:40'),
(2, 3, 8, '3', 0, 0, '2023-11-14 21:09:40', '2023-11-14 21:09:40'),
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
(14, 5, 7, '3', 0, 0, '2023-11-20 16:06:30', '2023-11-20 16:06:30');

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
(14, 2, 4, 3, 0, 0, '2023-11-29 14:58:44', '2023-11-29 14:58:44');

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
(22, 3, 9, 1, '02:00', '03:20', '703', '2023-11-22 12:28:50', '2023-11-22 12:28:50'),
(23, 3, 9, 3, '20:00', '03:20', '703', '2023-11-22 12:28:51', '2023-11-22 12:28:51'),
(26, 3, 8, 1, '12:30', '13:50', '701', '2023-11-29 14:56:22', '2023-11-29 14:56:22'),
(27, 3, 8, 3, '12:30', '13:50', '701', '2023-11-29 14:56:22', '2023-11-29 14:56:22'),
(30, 2, 7, 2, '11:00', '12:30', '201', '2023-11-29 15:04:12', '2023-11-29 15:04:12'),
(31, 2, 7, 4, '08:00', '10:50', '202', '2023-11-29 15:04:12', '2023-11-29 15:04:12'),
(32, 2, 7, 7, '11:00', '12:30', '201', '2023-11-29 15:04:12', '2023-11-29 15:04:12');

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
(8, 'Physics', 'practical', 0, 0, '2023-11-14 19:00:40', '2023-11-14 19:00:40', '3'),
(12, 'Math', 'Theory', 0, 0, '2023-11-29 21:55:03', '2023-11-29 21:55:03', '3'),
(13, 'Chemistry', 'Theory', 0, 0, '2023-11-29 21:55:33', '2023-11-29 21:55:33', '3'),
(14, 'Bangla', 'Theory', 0, 0, '2023-11-29 21:55:54', '2023-11-29 21:55:54', '3'),
(15, 'ICT', 'Practical', 0, 0, '2023-11-29 21:56:42', '2023-11-29 21:56:42', '3');

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
(3, 'Minhaj Uddin', NULL, 'minhaj5120@gmail.com', '$2y$10$OtbFsZFw3EIY2JT4dn0Wp.uDCzqGSPPKtSezmtqXyCUezePoB/EPK', '01728128184', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2023-11-06 10:11:55', '2023-11-22 14:03:01'),
(4, 'Mirza Bushra', NULL, 'bushra5120@gmail.com', '$2y$10$J0VyZfHN5MhM56Fx9M.jpeQMDhovhfSgtH8z3Xquyw0MOSF7J3x3i', '9999999999', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-07 07:36:27', '2023-11-22 20:41:13'),
(5, 'Alvi Rahman', NULL, 'alvi5120@gmail.com', '$2y$10$QarNQ/sLCiA5KASEdHRINuL26lMYTKk8bktLVT9CLuUFlcl30fLIq', '88888888888', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2023-11-08 12:22:44', '2023-11-17 07:24:21'),
(7, 'Fahad', NULL, 'fahad5120@gmail.com', '$2y$10$eb0MnKHd6TJOL0RWNNvQ0e0Z9HRt/ViKYLR1MreDIEwN0.gnSNlsK', '01728128185', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2023-11-13 12:38:34', '2023-11-13 14:18:06'),
(10, 'Fahad uddin', NULL, 'minhajfahad10@gmail.com', '$2y$10$pde6ibprkXS9uS72jXNH.u2UKW28NTyK3p0bk6CTE1k7VKjPUW9M6', '01728128186', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2023-11-13 14:46:19', '2023-11-13 14:46:23'),
(12, 'Bushra', NULL, 'bushra22@gmail.com', '$2y$10$SiYMMC4PcC5RC23E5R8hhenSrDFs.1x1AtHREQD.pmxMY6iw2ek7u', '66666666', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 07:06:01', '2023-11-15 07:06:01'),
(13, 'Towfiq Karim', NULL, 'rohan33@gmail.com', '$2y$10$MHvNmU8Q6QuS4VRtcOb41ejdQi8wwP1HHjKx9XdmL636Zu7fMkf8K', '77777777777', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2023-11-15 07:53:39', '2023-11-17 07:24:13'),
(14, 'Tasheen Rahman', NULL, 'tashin22@gmail.com', '$2y$10$3v88hAwn3d3Z/Ns/knIO6uW/iH4zdv6VQ1QvoWJ2OkHAf/9q.cWPO', '2222222222', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 08:30:56', '2023-11-15 08:30:56'),
(15, 'mirza', NULL, 'mirza@gmail.com', '$2y$10$04E6a/.1UGulbyWlJm4RbeYsfE/jOVRiCevBKY3aqvb1.jtQimgFG', '01234567891', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-15 09:45:56', '2023-11-22 14:09:34'),
(16, 'abc', NULL, 'abcde123@gmail.com', '$2y$10$1ryQpLbREBS08iAbz2UnK.dUd2aXtqGY.7ARBtYPXvLM7tKfnhJWG', '11223344556', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2023-11-17 12:50:24', '2023-11-17 12:50:24'),
(17, 'Tawsif', 'Islam', 'tawsif5120@gmail.com', '$2y$10$leUUGouiA1rqCKCKyeSoLeghIKvMFqXcgarQjEWT3z0VxATu5xVKC', '11111111111', '111', '111', 2, '1', '2007-02-05', 'Islam', '2023-11-23', '20231122064636zdjvyazdhbyra1ez0bivuxrnijktrx.PNG', 'B+ve', '5\'5\'\'', '68', 2, 0, 0, '2023-11-22 12:46:36', '2023-11-22 12:46:36'),
(27, 'Sumaiya', 'Prokrity', 'sumaiya5120@gmail.com', '$2y$10$NQcOOmjLQaS3IoqVbF/YjuMhpqte9uJu8aglhk1.ckekmttwC6p5m', '22222222222', '11', '13', 2, '2', '2007-12-02', 'Islam', '2023-11-30', '20231129094845zlzyjwtifaxqigmdljywcsrvckb0hy.PNG', 'A+ve', '5\'5\'\'', '60', 2, 0, 0, '2023-11-29 15:48:45', '2023-11-29 15:48:45'),
(28, 'Saiyara', 'Iffat', 'saiyara5120@gmail.com', '$2y$10$k1c/oGIP8FcaBCBKi6J9YuS1Wle.N.fYEmH1SidbMFR/01aT0sx16', '33333333333', '12', '16', 3, '2', '2007-12-02', 'Islam', '2023-11-30', '20231129095027g0g45wmc5wz74vplkvn31ubcrqhifa.PNG', 'O+ve', '5\'2\'\'', '50', 2, 0, 0, '2023-11-29 15:50:27', '2023-11-29 15:50:27'),
(29, 'Yasir', 'Islam', 'yasir5120@gmail.com', '$2y$10$Ho.4rfUZJr7zXs3eSb2lRuSfIrKkTWzyiIBm34092AeVIDfSncb0e', '44444444444', '13', '18', 3, '1', '2007-07-02', 'Islam', '2023-11-30', '20231129101015cz51mfmpqqhvrdkvpuaaxzlognicoh.PNG', 'B+ve', '5\'5\'\'', '65', 2, 0, 0, '2023-11-29 16:10:15', '2023-11-29 16:10:15'),
(30, 'Neha', 'Islam', 'neha5120@gmail.com', '$2y$10$lR2oXxn5OwGhbhV1M3rJPeGzuNTMxz2Kxpd8bRknPe3tvf3nRYgVW', '43444444444', '14', '19', 2, '2', '2007-12-02', 'Islam', '2023-11-30', '20231129101155lvfh7os0fi86f7herhafhvyptc8pjw.PNG', 'AB+ve', '5\'2\'\'', '55', 2, 0, 0, '2023-11-29 16:11:55', '2023-11-29 16:11:55'),
(31, 'Fatema', 'Kanon', 'fatema5120@gmail.com', '$2y$10$QwQ0J0m2nbF3YR6F23ODcuTjjPo2D0/Ezvqu8UOs3.c6mm1xhppx.', '55555555555', '16', '20', 3, '2', '2007-12-02', 'Islam', '2023-11-30', '20231129101306tj158q22q854ohr3tb1raekrhgnq7y.PNG', 'AB+ve', '5\'2\'\'', '55', 2, 0, 0, '2023-11-29 16:13:06', '2023-11-29 16:13:06'),
(32, 'Tahiya', 'Haidar', 'tahiya5120@gmail.com', '$2y$10$s.B/1t/YAuwPNGWloHznduAldrzJGKWlyRkRHocdFEQkPZZC1HoUK', '66666666666', '19', '21', 3, '2', '2007-12-02', 'Islam', '2023-11-30', '20231129101438lxfhfzvcaaigpj7ggspq5fxfc9zlux.PNG', 'A+ve', '5\'', '50', 2, 0, 0, '2023-11-29 16:14:38', '2023-11-29 16:14:38'),
(33, 'Prokrity', NULL, 'prokrity5120@gmail.com', '$2y$10$a9tYRWbuM7EnjpaElEF4tu24ABWJZiVwW4hxQES5R/75my20w9R6G', '12323232323', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-29 16:16:35', '2023-11-29 16:16:35'),
(35, 'Saiyara', NULL, 'saiyara512@gmail.com', '$2y$10$p/ojuAGx779U5UP7yC6/EupTJC4Bo8vfcQDmCt/YBxqQS1pFwjShu', '32132323232', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2023-11-29 16:18:25', '2023-11-29 16:18:25'),
(36, 'Anika', 'Islam', 'anika5120@gmail.com', '$2y$10$FVfr1yuwk8IxNuDb38vIp.YnViavUzVHUEEAum8KNmNdp6iEzYBJq', '77777777777', '22', '22', 3, '2', '2007-12-02', 'Islam', '2023-11-30', '202311291020030g6ujmw3m4h1mpjikci1yx9ay7r1my.PNG', 'O+ve', '5\'2\'\'', '60', 2, 0, 0, '2023-11-29 16:20:03', '2023-11-29 16:20:03');

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
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
