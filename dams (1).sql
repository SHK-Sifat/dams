-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dams`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_remarks` varchar(250) DEFAULT NULL,
  `department_creator` int(11) DEFAULT NULL,
  `department_editor` int(11) DEFAULT NULL,
  `department_slug` varchar(30) DEFAULT NULL,
  `department_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_remarks`, `department_creator`, `department_editor`, `department_slug`, `department_status`, `created_at`, `updated_at`) VALUES
(1, 'Sifat Khan', 'Add Departments Information', 1, NULL, 'D3067178022eb106', 1, '2024-10-22 10:36:18', NULL),
(2, 'Zahid Hasan Milon', 'Add Departments Information Add Departments Information', 1, NULL, 'D30671780379f9ba', 1, '2024-10-22 10:36:39', NULL),
(3, 'Rifat Al Rahim mal', 'Add Departments Information', 1, 1, 'D306717803faee8e', 1, '2024-10-23 11:38:30', '2024-10-23 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `doctor_phone` varchar(100) DEFAULT NULL,
  `doctor_email` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `doctor_specialist` varchar(100) DEFAULT NULL,
  `doctor_degree` varchar(100) DEFAULT NULL,
  `doctor_remarks` varchar(250) DEFAULT NULL,
  `doctor_image` varchar(50) DEFAULT NULL,
  `doctor_creator` int(11) DEFAULT NULL,
  `doctor_editor` int(11) DEFAULT NULL,
  `doctor_slug` varchar(30) DEFAULT NULL,
  `doctor_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `user_id`, `doctor_name`, `doctor_phone`, `doctor_email`, `department_id`, `doctor_specialist`, `doctor_degree`, `doctor_remarks`, `doctor_image`, `doctor_creator`, `doctor_editor`, `doctor_slug`, `doctor_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Zahid Hasan Milon', '593-662-5592', 'milon@gmail.com', NULL, 'liver', 'mbbbs', 'Add Departments Information', NULL, 1, NULL, 'D2671dd4d149676', 1, '2024-10-27 05:51:13', NULL),
(2, NULL, 'Misty Bins', '924-020-2519', 'your.email+fakedata34859@gmail.com', NULL, '271 Crist Falls', 'Fuga et voluptas nesciunt nostrum.', 'Amet ab ex occaecati iste saepe ipsa sequi at.', '21730008584.jpeg', 1, NULL, 'D2671dd608df72a', 1, '2024-10-27 05:56:24', '2024-10-27 05:56:25'),
(3, NULL, 'Triston Bauch-Gutmann', '164-065-2072', 'your.email+fakedata38927@gmail.com', NULL, '80389 Marilie Harbors', 'Tenetur distinctio velit nam quia voluptas ad cumque.', 'Vel labore illum a consectetur veritatis.', '31730008627.jpg', 1, NULL, 'D2671dd63399b07', 1, '2024-10-27 05:57:07', '2024-10-27 05:57:07'),
(4, NULL, 'Jack Rogahn', '101-398-9736', 'your.email+fakedata50382@gmail.com', NULL, '820 Gislason Valleys', 'Laudantium impedit porro magni ipsa dolorem error recusandae.', 'Odio consequatur nesciunt suscipit quam quisquam tenetur error deleniti vel.', '41730008654.webp', 1, NULL, 'D2671dd64e46561', 1, '2024-10-27 05:57:34', '2024-10-27 05:57:34'),
(5, NULL, 'Concepcion Schoen', '504-195-2508', 'your.email+fakedata23366@gmail.com', NULL, '46684 Charlie Trafficway', 'Laboriosam inventore omnis temporibus explicabo praesentium nisi quos ea.', 'Excepturi sunt nesciunt dolores nemo.', '51730097361.jpg', 1, NULL, 'D2671f30d196c75', 1, '2024-10-28 06:36:01', '2024-10-28 06:36:01'),
(6, NULL, 'Alfonzo Durgan', '433-823-3964', 'your.email+fakedata19727@gmail.com', NULL, '526 Wendell River', 'Rerum amet corrupti vero.', 'Quasi recusandae minima autem', '61730098452.webp', 1, 1, 'D2671f33fb312f6', 1, '2024-10-28 06:54:12', '2024-10-28 06:54:12');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_21_180517_create_departments_table', 1),
(6, '2024_10_21_180841_create_doctors_table', 1),
(7, '2024_10_21_181903_create_patients_table', 1),
(8, '2024_10_22_115348_create_roles_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_email` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_remarks` varchar(250) DEFAULT NULL,
  `patient_image` varchar(50) DEFAULT NULL,
  `patient_creator` int(11) DEFAULT NULL,
  `patient_editor` int(11) DEFAULT NULL,
  `patient_slug` varchar(30) DEFAULT NULL,
  `patient_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `user_id`, `patient_name`, `patient_phone`, `patient_email`, `patient_address`, `patient_remarks`, `patient_image`, `patient_creator`, `patient_editor`, `patient_slug`, `patient_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Rowena Gleason', '860-828-3335', 'your.email+fakedata28481@gmail.com', '440 Carroll Pike', 'Ea modi officiis rem iusto quos.', '11730114318.webp', 1, 1, 'P30671f6af16d18b', 1, '2024-10-28 11:18:38', '2024-10-28 11:18:38'),
(2, NULL, 'Randal Leffler', '979-485-5480', 'your.email+fakedata50916@gmail.com', '969 Nikolaus Ville', 'Nam aliquam nobis sunt facere magnam placeat ducimus ipsa.', '21730112259.jpg', 1, NULL, 'P30671f6b037e467', 1, '2024-10-28 10:44:19', '2024-10-28 10:44:19'),
(3, NULL, 'Jerome Sauer', '664-969-2588', 'your.email+fakedata27885@gmail.com', '313 Kirk Mills', 'Voluptate et voluptates magni.', '31730112557.jpg', 1, NULL, 'P30671f6c2d0cd5a', 1, '2024-10-28 10:49:17', '2024-10-28 10:49:17'),
(4, NULL, 'Armando Schultz', '121-410-3649', 'your.email+fakedata90660@gmail.com', '45452 Harvey Meadow', 'Perferendis eligendi in.', '41730114425.jpg', 1, NULL, 'P30671f737908aa3', 1, '2024-10-28 11:20:25', '2024-10-28 11:20:25'),
(5, NULL, 'Maximillian Crooks', '536-459-0325', 'your.email+fakedata20034@gmail.com', '372 Jast Mission', 'Assumenda architecto sunt hic.', '51730114439.jpg', 1, NULL, 'P30671f73870a80e', 1, '2024-10-28 11:20:39', '2024-10-28 11:20:39');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_slug` varchar(30) DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'R2067174578e296b', 1, '2024-10-22 06:26:00', NULL),
(2, 'Admin', 'R2067174578e3185', 1, '2024-10-22 06:26:00', NULL),
(3, 'Doctor', 'R2067174578e3703', 1, '2024-10-22 06:26:00', NULL),
(4, 'Receptionist', 'R2067174578e3d63', 1, '2024-10-22 06:26:00', NULL),
(5, 'Patient', 'R2067174578e442a', 1, '2024-10-22 06:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 5,
  `photo` varchar(50) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `username`, `email_verified_at`, `password`, `role`, `photo`, `slug`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sifat Khan', '01781705044', 'sifat@gmail.com', 'sifat', NULL, '$2y$10$wf4WA/sKvEFPXQshDtMA8ukL1G3lu2n5R8YESUk/j7pM.oOr7ptwS', 1, NULL, 'U2067174578e089a', 0, NULL, '2024-10-22 06:26:00', '2024-11-18 10:48:19'),
(3, 'Rifat Al Rahim', NULL, 'infouylab@gmail.com', 'uhdsfjbsjdisubviuds', NULL, '$2y$10$FYN1dWCWBVwXs18q3Tn99us8DoEtGwF/nq05VvGHZedJSEBlhMkuS', 5, NULL, 'U3067189647e6314', 0, NULL, '2024-10-23 06:23:04', '2024-11-18 10:49:31'),
(4, 'Claude Boyle', '59366255921', 'fakedata63575@gmail.com', 'Benton_Steuber83', NULL, '$2y$10$Cue9x0ewTCnUjUWX89Oxm.70K4mwrogDdm/1qQUvPLAR/NnBRYseK', 5, '41729684683.png', 'U306718967eba57a', 0, NULL, '2024-10-23 11:58:03', '2024-11-18 11:05:29'),
(5, 'Maci Dibbert', NULL, 'email+fakedata96543@gmail.com', 'Dan79', NULL, '$2y$10$5aeNl1yYcmYwgJi6Gnh2P.mwokghwcbemmk8EBqw/AQGaQyz2Iktq', 5, '51729664737.png', 'U30671896e17ac58', 0, NULL, '2024-10-23 06:25:37', '2024-11-18 11:08:01'),
(6, 'Jett Hessel', NULL, 'your.email+fakedata31626@gmail.com', 'Abraham.Jakubowski16', NULL, '$2y$10$No7w20ibfilLwM4csB3p1eYIzVd6X/ciu2ZAIWu/cK7rIVKxT2iMS', 5, '61729669736.png', 'U306718aa6881277', 0, NULL, '2024-10-23 07:48:56', '2024-11-18 11:07:55'),
(7, 'Shithu', '01987762263', 'shithu@gmail.com', 'shithu', NULL, '$2y$10$kpKpvazcLvpWI0cxky4dcOKUzYUO8VwpbdxSpbWa6TFADFn0550U.', 5, '71729749786.png', 'U306719e319e5e64', 0, NULL, '2024-10-27 05:19:14', '2024-11-18 11:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
