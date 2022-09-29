-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 03:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `no_antrian`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, '2022-09-25 22:30:42');

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
-- Table structure for table `masukans`
--

CREATE TABLE `masukans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `masukan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masukans`
--

INSERT INTO `masukans` (`id`, `pasien_id`, `masukan`, `created_at`, `updated_at`) VALUES
(3, 12, 'untuk kursi menunggunya mohon ditambahkan lagi', '2022-09-25 22:33:03', '2022-09-25 22:33:03'),
(4, 14, 'untuk sarana kursi tempat menunggu bisa ditambahkahkan', '2022-09-26 03:10:36', '2022-09-26 03:10:36');

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
(5, '2022_01_17_232311_add_role_to_user_table', 2),
(6, '2022_01_18_155048_edit_table_user', 3),
(7, '2022_01_18_163647_create_polikliniks_table', 4),
(8, '2022_01_19_012106_create_posters_table', 5),
(9, '2022_01_19_042808_create_nilais_table', 6),
(10, '2022_01_22_150701_create_nilai_pasiens_table', 7),
(11, '2022_02_08_064045_create_antrians_table', 8),
(12, '2022_09_18_085625_create_masukans_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penilaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `penilaian`, `created_at`, `updated_at`) VALUES
(4, 'Persyaratan', '2022-01-23 06:23:17', '2022-01-23 06:23:17'),
(6, 'Prosedur', '2022-09-25 22:24:44', '2022-09-25 22:24:44'),
(7, 'Waktu Pelayanan', '2022-09-25 22:24:52', '2022-09-25 22:24:52'),
(8, 'Biaya/Tarif', '2022-09-25 22:25:00', '2022-09-25 22:25:00'),
(9, 'Produk Spesifikasi Jenis Pelayanan', '2022-09-25 22:25:10', '2022-09-25 22:25:10'),
(10, 'Kompetensi Pelaksana', '2022-09-25 22:25:24', '2022-09-25 22:25:24'),
(11, 'Perilaku Pelaksana', '2022-09-25 22:25:37', '2022-09-25 22:25:37'),
(12, 'Kualitas Sarana dan Prasana', '2022-09-25 22:25:47', '2022-09-25 22:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pasien`
--

CREATE TABLE `nilai_pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_pasien`
--

INSERT INTO `nilai_pasien` (`id`, `pasien_id`, `nilai_id`, `nilai`, `created_at`, `updated_at`) VALUES
(17, 14, 4, 5, NULL, NULL),
(18, 14, 6, 5, NULL, NULL),
(19, 14, 7, 5, NULL, NULL),
(20, 14, 8, 5, NULL, NULL),
(21, 14, 9, 5, NULL, NULL),
(22, 14, 10, 5, NULL, NULL),
(23, 14, 11, 5, NULL, NULL),
(24, 14, 12, 5, NULL, NULL),
(26, 12, 4, 3, NULL, NULL),
(27, 12, 6, 4, NULL, NULL),
(28, 12, 7, 5, NULL, NULL),
(29, 12, 8, 4, NULL, NULL),
(30, 12, 9, 3, NULL, NULL),
(31, 12, 10, 3, NULL, NULL),
(32, 12, 11, 4, NULL, NULL),
(33, 12, 12, 4, NULL, NULL),
(34, 13, 4, 2, NULL, NULL),
(35, 13, 6, 3, NULL, NULL),
(36, 13, 7, 4, NULL, NULL),
(37, 13, 8, 5, NULL, NULL),
(38, 13, 9, 4, NULL, NULL),
(39, 13, 10, 5, NULL, NULL),
(40, 13, 11, 3, NULL, NULL),
(41, 13, 12, 1, NULL, NULL);

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
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_sip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketersediaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_jadwal_piket` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_piket` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id`, `no_sip`, `poli`, `dokter`, `ketersediaan`, `hari_jadwal_piket`, `jam_piket`, `created_at`, `updated_at`) VALUES
(3, '321301', 'Poli Umum', 'Rizaldi', 'tersedia', 'selasa', '09:00:00', '2022-09-18 00:20:19', '2022-09-25 22:21:45'),
(4, '12345', 'Poli Umum', 'Achmad Iskandar', 'tersedia', 'senin', '10:00:00', '2022-09-25 22:21:07', '2022-09-25 22:21:19'),
(5, '12345', 'Poli Gigi', 'Fahrul Abdullah Hudri', 'tersedia', 'kamis', '11:30:00', '2022-09-25 22:22:32', '2022-09-25 22:22:32'),
(6, '12345', 'Poli Kesehatan Ibu dan Anak', 'Sinta', 'tidak_tersedia', 'rabu', '08:30:00', '2022-09-25 22:23:13', '2022-09-25 22:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id`, `poster`, `created_at`, `updated_at`) VALUES
(2, 'poster.png', '2022-01-18 18:45:14', '2022-01-18 18:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','pasien') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Antrian','Tindakan','Selesai') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `no_induk`, `nama`, `jabatan`, `no_telp`, `poliklinik`, `status`, `jenis_kelamin`, `pendidikan`) VALUES
(1, 'admin', '$2y$10$DSW9TAeXQFLmBlPbSv/2pOuow73ibU741GJQQOhfOdGEzPsccA8NC', NULL, NULL, '2022-01-18 09:19:27', 'admin', '12312', 'admin', 'admin', '123123', NULL, NULL, 'l', 'd1d3'),
(12, 'Fadhel', '$2y$10$DSW9TAeXQFLmBlPbSv/2pOuow73ibU741GJQQOhfOdGEzPsccA8NC', NULL, '2022-09-25 22:27:37', '2022-09-25 22:27:37', 'pasien', '12345', 'Fadhel', 'Pasien', '085759415782', 4, 'Selesai', 'l', 'sd'),
(13, 'Astra', '$2y$10$DSW9TAeXQFLmBlPbSv/2pOuow73ibU741GJQQOhfOdGEzPsccA8NC', NULL, '2022-09-25 22:29:14', '2022-09-25 22:29:14', 'pasien', '12345', 'Astra', 'Pasien', '082121900965', 5, 'Selesai', 'l', 'smp'),
(14, 'difan', '$2y$10$DSW9TAeXQFLmBlPbSv/2pOuow73ibU741GJQQOhfOdGEzPsccA8NC', NULL, '2022-09-26 03:00:16', '2022-09-26 03:02:05', 'pasien', '12345', 'difan', 'Pasien', '085965412563', 3, 'Selesai', 'p', 'sma'),
(15, 'deviratna', '$2y$10$uCRHFLXUECzoLL.752SGZuCmBR3JCtgG8ALZ3YigiPATc6RZWRKWK', NULL, '2022-09-28 07:51:01', '2022-09-28 18:03:07', 'pasien', '1232', 'Devi Ratna Daniati', 'test', '123123', 3, 'Antrian', 'p', 's2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `masukans`
--
ALTER TABLE `masukans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masukans_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_pasien`
--
ALTER TABLE `nilai_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_pasien_pasien_id_foreign` (`pasien_id`),
  ADD KEY `nilai_pasien_nilai_id_foreign` (`nilai_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masukans`
--
ALTER TABLE `masukans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_pasien`
--
ALTER TABLE `nilai_pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `masukans`
--
ALTER TABLE `masukans`
  ADD CONSTRAINT `masukans_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_pasien`
--
ALTER TABLE `nilai_pasien`
  ADD CONSTRAINT `nilai_pasien_nilai_id_foreign` FOREIGN KEY (`nilai_id`) REFERENCES `nilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_pasien_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
