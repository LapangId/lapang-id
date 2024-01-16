-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 04:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_lapangan`
--

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
-- Table structure for table `j_lapangan`
--

CREATE TABLE `j_lapangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `j_lapangan`
--

INSERT INTO `j_lapangan` (`id`, `lapangan_id`, `nama_lapangan`, `created_at`, `updated_at`) VALUES
(79, 52, 'lapangan depan 1', '2024-01-12 04:08:02', '2024-01-12 04:08:02'),
(80, 54, 'lapangan CP1', '2024-01-12 05:43:21', '2024-01-12 06:49:45'),
(81, 54, 'Lapangaan CP 2', '2024-01-12 05:43:37', '2024-01-12 05:43:37'),
(82, 56, 'Lapangan TY1', '2024-01-12 05:46:10', '2024-01-12 05:46:10'),
(83, 56, 'Lapangan TY2', '2024-01-12 05:46:20', '2024-01-12 05:46:20'),
(84, 57, 'Lapangan SAS1', '2024-01-12 05:49:12', '2024-01-12 05:49:12'),
(85, 57, 'Lapangan SAS2', '2024-01-12 05:49:25', '2024-01-12 05:49:25'),
(86, 57, 'Lapangan SAS3', '2024-01-12 05:49:40', '2024-01-12 05:49:40'),
(87, 57, 'Lapangan SAS4', '2024-01-12 05:49:51', '2024-01-12 05:49:51'),
(92, 62, 'Lapangan RJ Belakang 1', '2024-01-12 06:00:01', '2024-01-12 06:00:01'),
(96, 67, 'Lapangan G1', '2024-01-12 06:30:35', '2024-01-12 06:30:35'),
(97, 67, 'Lapangan G2', '2024-01-12 06:30:46', '2024-01-12 06:30:46'),
(140, 76, 'Lapangan M1', '2024-01-12 08:18:52', '2024-01-12 08:18:52'),
(142, 76, 'Lapangan M2', '2024-01-12 08:23:25', '2024-01-12 08:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_lapangan` varchar(255) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_sewa` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `user_id`, `jenis_lapangan`, `nama_lapangan`, `deskripsi`, `harga_sewa`, `lokasi`, `gambar`, `created_at`, `updated_at`) VALUES
(52, 33, 'badminton', 'pacceka', 'paceka oke', '25000', 'bks', '1705057659.png', '2024-01-12 04:07:39', '2024-01-12 04:07:39'),
(54, 35, 'Badminton', 'CIPTA SPORT', 'Cipta Sport Merupakan Lapangan untuk menyewa lapangan badminton dengan mudah', '25000', 'jl. antara', '1705063373.png', '2024-01-12 05:42:53', '2024-01-12 06:41:24'),
(56, 36, 'badminton', 'TRIOTY', 'Lapangan Dalam Kondisi yang bagus, bersih dan penerangan juga cukup baik.', '27000', 'jl. senggoro', '1705063554.jpg', '2024-01-12 05:45:54', '2024-01-12 05:45:54'),
(57, 37, 'badminton', 'SASSas', 'Tersedia 4 Lapangan', '25000', 'jl.Pematang Duku', '1705063725.jpg', '2024-01-12 05:48:45', '2024-01-12 05:48:45'),
(62, 38, 'futsal', 'RAJAWLI', 'Tersedia Dua Lapangan', '130000', 'jl.Soeharto', '1705064378.jpg', '2024-01-12 05:59:38', '2024-01-12 05:59:38'),
(67, 42, 'badminton', 'Garuda Gor', 'Lapangan Badminton terdiri dari 3 lapangan', '25000', 'Jl. Jendral Sudirman', '1705066221.jpg', '2024-01-12 06:30:21', '2024-01-12 06:30:21'),
(71, 41, 'futsal', 'BCNY FUTSAL', 'Terdiri dari 2 Lapangan', '130000', 'Jl. Senayan', '1705070932.jpg', '2024-01-12 07:48:52', '2024-01-12 07:48:52'),
(76, 40, 'futsal', 'Mitra Futsal', 'Mitra Futsal Terdiri dari 2 Lapangan', '130000', 'Jl. Senayan', '1705072703.jpg', '2024-01-12 08:18:23', '2024-01-12 08:18:23');

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
(5, '2023_12_11_123421_users', 2),
(6, '2023_12_26_091936_create_lapangan_table', 2),
(7, '2023_12_26_092444_create_pemesanan_table', 3),
(8, '2023_12_26_094417_create_j_lapangan_table', 3);

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
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `j_lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_p` varchar(255) NOT NULL,
  `hari` varchar(125) DEFAULT NULL,
  `jam_m` int(11) NOT NULL,
  `jam_s` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `lapangan_id`, `j_lapangan_id`, `users_id`, `nama_p`, `hari`, `jam_m`, `jam_s`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(36, 54, 80, 34, 'Ruha', 'sabtu', 15, 17, '2024-01-13', 'Sudah Bayar', '2024-01-12 06:32:43', '2024-01-12 06:32:57'),
(40, 76, 142, 39, 'ulfa', 'sabtu', 14, 16, '2024-01-13', 'Sudah Bayar', '2024-01-12 08:24:39', '2024-01-12 08:24:46');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` bigint(125) DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin01', 'admin01@gmail.com', '$2y$12$cYgM.XlgP4Yu7oXdAz7kB.AmNUl5Jr.0baq4eKOj4c8Pb4oxdq1fe', 0, 'superadmin', '', NULL, NULL),
(23, 'intan suhada', 'intansh@gmail.com', '$2y$12$OxU8Uu9gDjdqjQCQlxqZG.zVHTuhyU6Er9K7x4ZVAM23/jlx52yYm', NULL, 'user', 'aman', '2024-01-10 19:43:34', '2024-01-10 19:43:34'),
(24, 'uda', 'uda@gmail.com', '$2y$12$Gg8rYLY2aSaugJHD.phjouypgZNmK3URlSAU4TwGBKLxKrjJezHVC', NULL, 'admin', 'aman', '2024-01-10 19:44:33', '2024-01-11 09:37:10'),
(28, 'Erisya Herlina', 'erisya@gmail.com', '$2y$12$oGt7zMllX2hMjAsphbjlqOe8BJevuXpBG6X.i49bA9vlgTFRca8Yu', NULL, 'user', 'aman', '2024-01-11 01:17:13', '2024-01-11 01:17:13'),
(29, 'olel', 'olel@gmail.com', '$2y$12$HbWYeCBCx4ITef2vml5HieBceb8BTURLeqPWeLLqtfmHp0Z7Brwae', NULL, 'admin', 'aman', '2024-01-11 01:17:56', '2024-01-11 01:17:56'),
(30, 'edo', 'edo@gmail.com', '$2y$12$y35CkrKXq0xG3feYev8UbeJBHDfFHpNaLxm29R5GowX7gfoXLfWIW', NULL, 'user', 'aman', '2024-01-11 09:33:46', '2024-01-11 09:33:46'),
(31, 'ayulagi', 'ayulagi@gmail.com', '$2y$12$BRLLKEo2iqj3Sw/atvSxUe.LLroIqAmA8nfolFBRaxJpo5TCNUnLG', NULL, 'admin', 'Blokir', '2024-01-11 10:04:10', '2024-01-12 05:38:43'),
(32, 'ayu wandira', 'ayuk@gmail.com', '$2y$12$9cYbArg7sNH8a590l6QC4ui.Jp5n2T.TG3Awq13kxcU2ILREQURkS', NULL, 'admin', 'aman', '2024-01-11 14:25:54', '2024-01-11 14:25:54'),
(33, 'Intan suhada', 'Intann@gmail.com', '$2y$12$uKGAa9cZhrPOeT2grX9g.unlQE80mpdaqyz56PxwXd2LUJXAIgr4W', NULL, 'admin', 'aman', '2024-01-11 21:28:05', '2024-01-11 21:37:01'),
(34, 'Ruhaya hayuni', 'ruhaya@gmail.com', '$2y$12$d/Yp2AMO7HZwkAYZ13ByS.Z9LgZ0Ah5tCUaWdR1HYdx.D4KuSrB1m', NULL, 'user', 'aman', '2024-01-11 21:30:28', '2024-01-11 21:30:28'),
(35, 'Ayu wandira', 'ayuw@gmail.com', '$2y$12$2cSeSebJyIX1e0Rjt9LgJuiFQ.OqphTNoAhfGyJFHJdB.1dJylZOS', NULL, 'admin', 'aman', '2024-01-12 05:40:18', '2024-01-12 05:40:18'),
(36, 'ruhaya', 'aya@gmail.com', '$2y$12$YTBuvs.utXVFgefilWzFB.A6rrsLWNyGdNZ7qRuNIkf.C5qTZJcUW', NULL, 'admin', 'aman', '2024-01-12 05:44:30', '2024-01-12 05:44:30'),
(37, 'Qusyairi', 'kusai@gmail.com', '$2y$12$ntOAlM4X5RI2klof8PotCO6jrDndb8f0chmIxdYR5T1jF509QlwZK', NULL, 'admin', 'aman', '2024-01-12 05:47:34', '2024-01-12 05:47:34'),
(38, 'Rindi', 'Rindi@gmail.com', '$2y$12$O0yN0zTAs4E8AGdYcLJ55eBznrUP8kSPecCHhOIGEH/Wg.IBXiFxi', NULL, 'admin', 'aman', '2024-01-12 05:50:26', '2024-01-12 05:50:26'),
(39, 'ulfa', 'ulfa@gmail.com', '$2y$12$1JiAov0eATb3m2ZCk5Icaud87Nr8KZAW8hTSHF8kJpkxUHgV4H/IW', NULL, 'user', 'aman', '2024-01-12 06:02:55', '2024-01-12 06:02:55'),
(40, 'Sara', 'sara@gmail.com', '$2y$12$4ZJhhya/AkCI463n6JOOd.Wr601F3fXhg7SgIKfgj/O6OI5wLVG56', NULL, 'admin', 'aman', '2024-01-12 06:03:24', '2024-01-12 06:03:24'),
(41, 'Adriansyah', 'ian@gmail.com', '$2y$12$VP2cCGQJKAHNmdaMdzmUxulDj/ddIfjkdGyvbYLAXkb2CVkoz9Dsa', NULL, 'admin', 'aman', '2024-01-12 06:21:35', '2024-01-12 06:21:35'),
(42, 'sohib', 'sohib@gmail.com', '$2y$12$UWrzVKiZE6IIHf2jL51/OeySEL2jYlg4VLZ8Q8axw9.02iTPMMKKO', NULL, 'admin', 'aman', '2024-01-12 06:29:07', '2024-01-12 06:29:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `j_lapangan`
--
ALTER TABLE `j_lapangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapangan_id` (`lapangan_id`) USING BTREE;

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

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
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `j_lapangan_id` (`j_lapangan_id`),
  ADD KEY `lapangan_id` (`lapangan_id`) USING BTREE,
  ADD KEY `users_id` (`users_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `j_lapangan`
--
ALTER TABLE `j_lapangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `j_lapangan`
--
ALTER TABLE `j_lapangan`
  ADD CONSTRAINT `j_lapangan_ibfk_1` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id`);

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`j_lapangan_id`) REFERENCES `j_lapangan` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
