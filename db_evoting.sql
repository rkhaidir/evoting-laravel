-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 01:42 AM
-- Server version: 10.6.4-MariaDB-log
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `calons`
--

CREATE TABLE `calons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_calon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calons`
--

INSERT INTO `calons` (`id`, `nama_calon`, `nomor_urut`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Shin Nitta', 1, 'calon-image/K6OoF29beGaZ5ieZwZd6rxQoIxFXSQIneyrrPqhY.jpg', NULL, NULL),
(4, 'Sundar Picay', 2, 'calon-image/qeVcFvyt975eP9FtUanggw51XpBIoaS3fneEjyy6.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_24_134053_create_calons_table', 1),
(6, '2022_02_27_134908_create_pemilihs_table', 1),
(7, '2022_03_07_135756_create_votes_table', 1);

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
-- Table structure for table `pemilihs`
--

CREATE TABLE `pemilihs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pemilih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemilihs`
--

INSERT INTO `pemilihs` (`id`, `nomor_pemilih`, `nama_pemilih`, `password`, `verifikasi`, `status`, `created_at`, `updated_at`) VALUES
(1, '10617', 'Joshuah Quitzon MD', '$2y$10$SPoHZNKNNgTqXrfrxOrRFONtos5/1TWAUQs8oNAdZmCUKgGaoqtra', 1, 1, '2022-03-07 07:23:50', '2022-04-04 19:26:35'),
(2, '44413', 'Kale Zboncak', '$2y$10$nvXVziUzh1.NWqYjQFNehu5QguN05ce7ffw32AAcMjmIMxFXu/md2', 1, 1, '2022-03-07 07:23:50', '2022-04-04 19:29:07'),
(3, '65661', 'Zelda Quitzon', '$2y$10$XdlXt2NfC0RJKGTCMgPl4e.djf02izk6znkv54LEiCF8fafXtuOLO', 1, 1, '2022-03-07 07:23:50', '2022-04-04 19:33:18'),
(4, '21157', 'Pinkie Harris', '$2y$10$sedfzbQrhXjyv5jAR41LB.LNj9HG6iYVtq4MenhM732BMpN4ubfXq', 1, 1, '2022-03-07 07:23:50', '2022-04-06 18:49:56'),
(5, '10668', 'Mrs. Thelma Hegmann PhD', '$2y$10$GGhCF6M2UAbeDyhojzkRlOr8ocpGAsSBxxlKAtxvT6tJN7vaK8SaS', 1, 1, '2022-03-07 07:23:50', '2022-04-11 17:04:33'),
(6, '22915', 'Aurelia Harris PhD', '$2y$10$aluO.XuNeXf47m2.4SDRx.SHyyr7wlzqqpuiQxpH4q9NRqFfUJUiW', 1, 1, '2022-03-07 07:23:50', '2022-04-11 17:28:36'),
(7, '28826', 'Kailee Kuhic', '$2y$10$zdeRBZe.UmL71KQDh6.Jie1tRhGBTbL0tAeyN.e3AjptbL.lSyud6', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(8, '92827', 'Ned Hyatt', '$2y$10$76xsMiwbyCRUBWB.nt1mUezbCyAT7XYc9e5q.q.lpLaftjp7mauTa', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(9, '78646', 'Eugenia Kris', '$2y$10$JVh8Ds6AtHN.Kz57v1eCN.N5MfIB28h.kKbnAYaLbHcBnj5wSaC.S', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(10, '99798', 'Courtney Lockman', '$2y$10$3ck9UqwlyFswQoKtY8/4s.Q7CwrMt65YKhLg56ODCzV4GGyQFuTt6', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(11, '72110', 'Claire Marks', '$2y$10$1Zi0CtW.cGl7lctl0.A1medqnRws1OIcQJfsczP/eb7VAYxuWpVxm', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(12, '14394', 'Mrs. Ethyl Schowalter I', '$2y$10$lT5o.1LTe9LxMueldBs1k.mh8a.B8KTKz1opeGpagIQlLvzkHYG8S', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(13, '21322', 'Prof. Frankie Cruickshank I', '$2y$10$bCB0Du1WiDkk.OsDedH5o.LIWRWdEdxrAmVGja.nPjT/OWSSK67Zq', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(14, '80109', 'Christine Bogisich', '$2y$10$mOqSV12TYGGJinrkR0wNX.u0/6ZSofd/L2dTc03UvyCCntIbbTyZe', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(15, '24273', 'Rhianna Schaefer PhD', '$2y$10$0fST0MdMwSkOBpAXR7ij9eOrITMwFzBwaTuS1WxeniWpJvivZ67Nu', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(16, '54669', 'Haven Larson', '$2y$10$OEDUv7A0ZTUupBZEmouoMOnM70TyttRARgRCKq.ob5tyW.WzQ/wiq', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(17, '40877', 'Giovanni Kulas', '$2y$10$Oa0C5LFNButywxmsbC1OgOEAaIb9wkDYFvIVtNKeN0Ct6nJl/ViAu', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(18, '59703', 'Gage Koss', '$2y$10$Vvxv8sr0ubssO1dQfFPgJujx79fxpCEqz1XKJ6xsinRAnlLg36jEm', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(19, '98692', 'Edgar Bailey', '$2y$10$78GJ/x5d2yJDVhFf6oCiGehHr4D8uNFM71ccsnIB3CA2xH98tbyOy', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(20, '35099', 'Clyde Aufderhar', '$2y$10$ozK16K7ZYWF3tSrrLeRbpO4mJitp5JLkVCuS/ia/cIpDHiWrd1VYG', 0, 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo Pouros II', 'amills', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(2, 'Miss Luna Graham Jr.', 'buckridge.blanca', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '2022-03-07 07:23:50', '2022-03-07 07:23:50'),
(3, 'Sabryna Metz MD', 'cadams', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '2022-03-07 07:23:51', '2022-03-07 07:23:51'),
(4, 'Rakhmat Khaidir', 'rkhaidir', '$2y$10$uqf4Hl5LPPAeD/ZJvt7FP.IoRsz8oowJBrxfNGA7ALNxy1FX/shoG', 1, '2022-03-07 07:23:51', '2022-03-07 07:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calon_id` bigint(20) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `calon_id`, `votes`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2022-04-04 18:55:59', '2022-04-11 17:04:33'),
(2, 4, 3, '2022-04-04 18:56:48', '2022-04-11 17:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calons`
--
ALTER TABLE `calons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calons_nomor_urut_unique` (`nomor_urut`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemilihs`
--
ALTER TABLE `pemilihs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemilihs_nomor_pemilih_unique` (`nomor_pemilih`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calons`
--
ALTER TABLE `calons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemilihs`
--
ALTER TABLE `pemilihs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
