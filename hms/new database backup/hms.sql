-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_appointments`
--

CREATE TABLE `book_appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_awards`
--

CREATE TABLE `doctor_awards` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `award_year` varchar(255) DEFAULT NULL,
  `award_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_awards`
--

INSERT INTO `doctor_awards` (`id`, `doctor_id`, `award_year`, `award_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 11, '2024-05-05', 'Best Doctor of the Hospital', '2024-05-06 04:14:50', '2024-05-06 04:14:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_educations`
--

CREATE TABLE `doctor_educations` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_educations`
--

INSERT INTO `doctor_educations` (`id`, `doctor_id`, `degree`, `collage`, `year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 11, 'MBBS', 'Hamdard University', '2024-04-05', '2024-05-06 04:14:50', '2024-05-06 04:14:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_experiences`
--

CREATE TABLE `doctor_experiences` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_experiences`
--

INSERT INTO `doctor_experiences` (`id`, `doctor_id`, `hospital_name`, `from`, `to`, `designation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 11, 'Jinnah Hospital', '2022-01-19', '2024-05-05', 'Senior Doctor', '2024-05-06 04:14:50', '2024-05-06 04:14:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Urology', 'Specialities/6hSo8Gj4l4SloCPIBwC9fW4KPT5gc8FebTQyUaJ7.png', 'active', '2024-05-03 04:58:44', '2024-05-03 06:48:41', NULL),
(3, 'Dentist', 'Specialities/PLDDg8D80DBJi5Tl4q4vxKqlFQkDg1ncktvCmEHV.png', 'active', '2024-05-03 07:25:30', '2024-05-03 07:25:30', NULL),
(4, 'Neurology', 'Specialities/lzRF3jPjTPTvTwxCIISDpv9MRmhdOIlzOXH8Ku0T.png', 'active', '2024-05-03 07:25:48', '2024-05-03 07:25:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `speciality_id`, `appointment_id`, `name`, `email`, `address`, `bio`, `age`, `phone`, `fees`, `role`, `image`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Admin', 'adminhms@yopmail.com', 'Nazimabad Karachi', 'I am Admin of HMS.\r\nHi!', 23, '+1 (549) 582-9188', NULL, 'admin', 'Users/dfOTN3e07QrbbiXo12t2IofxctQELWn5nTEzjipX.jpg', 'active', NULL, '$2y$10$4NkIozSaQiC86KKYaqs0JO3ijkIRW0NtgTVH53I0W16Q/1zFwmQea', NULL, '2024-05-03 02:53:00', '2024-05-03 23:10:33'),
(11, 3, NULL, ' Ahmed', 'ahmed@yopmail.com', 'Excepturi laboriosam', 'Hi,\r\nI am doctor ahmed shah and i am experienced Dentist.', 37, '+1 (539) 921-7752', '$500', 'doctor', 'Users/Sv5MtUJMfnOCgeIXL2R3AFrCE8kfbLR0jjrJRkP3.jpg', 'active', NULL, '$2y$10$uQt.hOaEtgbFcNoex1BCdOac05VCOCNJwKFXe1.ZLBlqxRC.nsDwa', NULL, '2024-05-03 07:26:20', '2024-05-06 04:14:50'),
(12, NULL, NULL, 'Farhan Ali Shah', 'Farhan.ali200@gmail.com', NULL, NULL, NULL, NULL, NULL, 'patient', 'Users/dpq3t0tC8rSs9NbXb6hUHDINmslpnPDv1VRn5TNM.png', 'active', NULL, '$2y$10$/E0qwl2xgzBTojo3KL/Jnu9RcAGV6t30oJIOPgzCRH3yiwXtqG0qK', NULL, '2024-05-03 07:31:30', '2024-05-03 07:44:55'),
(13, NULL, NULL, 'Shahid', 'Shahid@yopmail.com', NULL, NULL, NULL, NULL, NULL, 'patient', 'Users/0TgUHOw7sqw50C2Xk7a0ApVAR2dVVycz1BFIT5VF.png', 'active', NULL, '$2y$10$/438DeMsHplHOiicz.wNSuQACqFxonkEMYIM6Lnie1PX21Tq2yxmm', NULL, '2024-05-03 07:32:23', '2024-05-03 07:32:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_appointments`
--
ALTER TABLE `book_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_awards`
--
ALTER TABLE `doctor_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_educations`
--
ALTER TABLE `doctor_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_experiences`
--
ALTER TABLE `doctor_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `book_appointments`
--
ALTER TABLE `book_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor_awards`
--
ALTER TABLE `doctor_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_educations`
--
ALTER TABLE `doctor_educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_experiences`
--
ALTER TABLE `doctor_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
