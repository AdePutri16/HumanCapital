-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 03:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pegawai` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `lokasi_masuk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_keluar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_masuk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_keluar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_pegawai`, `tanggal`, `jam_masuk`, `jam_keluar`, `lokasi_masuk`, `lokasi_keluar`, `foto_masuk`, `foto_keluar`, `created_at`, `updated_at`) VALUES
(1, 12, '2024-12-25', '23:03:00', NULL, '-4.0073656,119.6270772', NULL, NULL, NULL, '2024-12-25 07:03:55', '2024-12-25 07:03:55'),
(3, 7, '2024-12-26', '20:07:00', NULL, '-5.1544064,119.455744', NULL, NULL, NULL, '2024-12-26 04:07:39', '2024-12-26 04:07:39'),
(16, 12, '2024-12-30', '10:23:00', '11:44:00', '-5.1544064,119.455744', '-3.8436864,119.8358528', 'images/pegawai/gAj8RJZPJe.jpeg', 'images/pegawai/cHJCk8OazH.jpeg', '2024-12-29 18:23:21', '2024-12-30 03:44:47'),
(17, 13, '2024-12-30', '11:01:00', NULL, '-5.1544064,119.455744', NULL, 'images/pegawai/Nns1rtElR3.jpeg', NULL, '2024-12-29 19:02:38', '2024-12-29 19:02:38'),
(18, 8, '2024-12-30', '19:54:00', NULL, '-3.8436864,119.8358528', NULL, 'images/pegawai/ooEmkKr3Rw.jpeg', NULL, '2024-12-30 03:54:41', '2024-12-30 03:54:41'),
(19, 15, '2024-12-30', '20:01:00', '12:02:00', '-3.8436864,119.8358528', '-3.8436864,119.8358528', 'images/pegawai/sjt2vPTAt4.jpeg', 'images/pegawai/3ey7U1jzvF.jpeg', '2024-12-30 04:01:58', '2024-12-30 04:02:35'),
(20, 19, '2024-12-30', '22:36:00', '14:37:00', '-5.1544064,119.455744', '-5.1544064,119.455744', 'images/pegawai/Hq8mEBUZ7R.jpeg', 'images/pegawai/Rys0WQYpV6.jpeg', '2024-12-30 06:37:06', '2024-12-30 06:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `databseny`
--

CREATE TABLE `databseny` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_cuti` enum('tahunan','besar','melahirkan','alasan-penting','luar-tanggungan-negara') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_cuti` date NOT NULL,
  `selesai_cuti` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_20_173848_add_role_to_users_table', 1),
(8, '2024_11_22_150244_create_pegawai_table', 2),
(9, '2024_11_29_163819_add_role_to_pegawai_table', 2),
(13, '2024_12_15_151429_create_profiles_table', 5),
(14, '2024_12_15_164032_create_profiles_table', 6),
(19, '2024_12_09_154202_create_pengajuan_cuti_table', 7),
(20, '2024_12_10_071800_create_settings_table', 7),
(21, '2024_12_16_080004_pegawai_table', 7),
(22, '2024_12_16_142731_create_users_table', 8),
(27, '2024_12_20_044037_update_status_enum_in_pengajuan_cuti_table', 12),
(28, '2024_12_20_044403_update_pegawai_id_nullable_in_pengajuan_cuti', 13),
(29, '2024_12_20_130345_create_notifikasis_table', 14),
(30, '2024_12_20_132915_create_notifications_table', 14),
(33, '2024_12_21_154309_create_pengajuan_cuti_table', 15),
(34, '2024_12_21_155438_create_pegawai_table', 16),
(35, '2024_12_21_161113_create_pengajuan_cuti_table', 17),
(36, '2024_12_21_162116_create_pengajuan_cuti_table', 18),
(37, '2024_12_22_021131_create_absensi_table', 19),
(38, '2024_12_22_023516_create_absensi_table', 20),
(39, '2024_12_22_064240_create_absensi_table', 21),
(40, '2024_12_22_074553_create_absensi_table', 22),
(41, '2024_12_22_114716_add_user_id_to_absensi_table', 23),
(42, '2024_12_22_134626_create_users_tabel', 24),
(43, '2024_12_22_135529_create_users_table', 25),
(44, '2024_12_22_135926_update_role_column_in_users_table', 26),
(45, '2024_12_22_140256_create_users_table', 27),
(46, '2024_12_22_140748_create_pegawai_table', 28),
(47, '2024_12_22_141339_create_pengajuan_cuti_table', 29),
(48, '2024_12_22_141912_add_status_to_pengajuan_cuti_table', 30),
(49, '2024_12_22_142242_create_pengajuan_cuti_table', 31),
(50, '2024_12_22_144847_create_pengajuan_cuti_table', 32),
(51, '2024_12_22_145104_create_pengajuan_cuti_table', 33),
(52, '2024_12_22_150856_change_status_enum_in_pengajuan_cuti_table', 34),
(53, '2024_12_22_152351_add_user_id_to_pengajuan_cuti_table', 35),
(54, '2024_12_22_180224_update_pengajuan_cuti_table', 36),
(55, '2024_12_23_135551_create_absensi_table', 37),
(56, '2024_12_24_133856_create_absensi_table', 38),
(57, '2024_12_24_162145_create_preferences_table', 39),
(58, '2024_12_24_164404_add_sisa_cuti_to_pegawai_table', 40),
(59, '2024_12_25_150138_create_absensi_table', 41),
(60, '2024_12_26_154236_create_personal_access_tokens_table', 42);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('c504e770-c047-4707-9775-bc1e3ee559fa', 'App\\Notifications\\PengajuanCutiDivalidasi', 'App\\Models\\Pegawai', 12, '{\"message\":\"Pengajuan cuti Anda telah disetujui\",\"tanggal_pengajuan\":\"20 Dec 2024\",\"status\":\"disetujui\"}', NULL, '2024-12-20 06:24:15', '2024-12-20 06:24:15'),
('cf458a74-c7ae-4047-a1b8-7a8435ad2b06', 'App\\Notifications\\PengajuanCutiDivalidasi', 'App\\Models\\Pegawai', 11, '{\"title\":\"Pengajuan Cuti Divalidasi\",\"message\":\"Pengajuan cuti Anda telah disetujui\",\"cuti_id\":6,\"status\":\"disetujui\"}', NULL, '2024-12-20 05:51:27', '2024-12-20 05:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmpt_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `pendidikan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kawin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','operator') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sisa_cuti` int NOT NULL DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `image_path`, `nama`, `nip`, `tmpt_lahir`, `tgl_lahir`, `tmt`, `pendidikan`, `tahun`, `jenis_kelamin`, `nik`, `jabatan`, `status_kawin`, `no_tlp`, `email`, `role`, `created_at`, `updated_at`, `sisa_cuti`) VALUES
(7, 8, 'images/pegawai/w0Amu1t9HUjAJ9BZrYeQHN7m66ckH1VHQ6YbQoRf.png', 'laskar pelangi', '777273862173665', 'Makassar', '2024-12-03', '2024-12-22', 'smk3', 2023, 'Perempuan', '737283629826388', 'Dosen', 'Menikah', '0897675427656', 'ray@gmail.com', NULL, '2024-12-22 08:56:05', '2024-12-30 03:53:38', 13),
(8, 9, 'images/pegawai/7QkW41yer2akeXv9iM309vsxFm9yexhDo9PHVL2L.jpg', 'Annisya Eka Pratiwi Aprilia', '19023556763442', 'Parepare', '2024-12-09', '2024-12-25', 'S1', 2019, 'Perempuan', '7372146354338357', 'Dosen', 'Menikah', '085678454326', 'nirwana@gmail.com', NULL, '2024-12-22 09:17:46', '2024-12-22 09:17:46', 12),
(10, 11, 'images/pegawai/WIPA2Cu5nZrcUbEHl4xglfPfJOqM7YdSaA5BlB7R.png', 'jojo', '09281371289056', 'Bulukumba', '2024-02-22', '2024-12-26', 'S1', 2023, 'Laki-laki', '7372659823980', 'staf', 'Menikah', '09876887655', 'adhevutry30@gmail.com', NULL, '2024-12-22 23:17:25', '2024-12-30 03:42:51', 13),
(11, 12, 'images/pegawai/80SB5VHfZ45ky3cKPv1N1cwmyULTaUQNnXTwKOLN.png', 'Ahmad Syarif tes', '182684648362522', 'Bulukumba', '2024-07-08', '2024-12-03', 'S1', 2023, 'Laki-laki', '73720198398727', 'staf', 'Menikah', '09876887655', 'adhevutry30@gmail.com', NULL, '2024-12-23 04:08:11', '2024-12-23 04:08:39', 12),
(12, 13, 'images/pegawai/bjhwMH3OhOcOpI3D0FO1yYbQoaPY8ebSARprmjXl.png', 'Salma', '182684648362533', 'Bulukumba', '2024-12-05', '2024-12-21', 'S1', 2023, 'Laki-laki', '73720198398709', 'staf', 'Menikah', '09876887655', 'adhevutry30@gmail.com', NULL, '2024-12-24 08:49:10', '2024-12-29 19:33:11', 165),
(13, 14, 'images/pegawai/thhNM3pOvojs85TtBtSSMu0gAGZyJYkglBfiUo6r.png', 'cici', '7128361782312387', 'parepare', '2024-12-12', '2024-12-20', 'S1', 2023, 'Perempuan', '77829167635253', 'Dosen', 'Menikah', '089987876876', 'adeputribustan@gmail.com', NULL, '2024-12-26 06:03:48', '2024-12-26 06:03:48', 12),
(14, 15, 'images/pegawai/GobpcEfNzSUq5iWNzk0N2jDv2Bav9aGDES7tS0CH.png', 'Wana', '1927189372632826', 'Parepare', '2024-12-03', '2024-12-25', 'SMK', 2023, 'Perempuan', '7319832612367123', 'Dosen', 'Menikah', '09876887655', 'adhevutry30@gmail.com', NULL, '2024-12-26 17:50:07', '2024-12-30 04:03:07', 13),
(15, 18, 'images/pegawai/pRrkffR7Utl9pZqyVfz4NMBDPqosbWQ07aWrJi67.jpg', 'Andi Sri Rahayu Putri', '1927189372632826', 'Parepare', '2024-12-16', '2024-12-25', 'SMK', 2022, 'Laki-laki', '73947564752923', 'Dosen', 'Menikah', '09876887655', 'adhevutry30@gmail.com', NULL, '2024-12-29 12:25:23', '2024-12-29 12:26:12', 12),
(16, 19, 'images/pegawai/OTYN6Yv1jsQTbgzESYoHLZvY5GwvSRuw4sqtJYE5.jpg', 'Nada Istiana putri', '128639437493649', 'parepare', '2024-12-10', '2024-12-25', 'S1', 2024, 'Perempuan', '737282389213713', 'Dosen', 'Menikah', '089725372865', 'nada@gmail.com', NULL, '2024-12-29 18:35:45', '2024-12-30 06:39:35', 14),
(17, 21, 'images/pegawai/dKSmIHYzyOKCab2EwFOxMJYNqL2wDqEUDYGY39lu.jpg', 'iin', '1998263876389', 'parepare', '2024-12-17', '2024-12-20', 'SMK', 2024, 'Laki-laki', '737281321263716', 'Dosen', 'Menikah', '09878787876767', 'adeputribustan@gmail.com', NULL, '2024-12-30 02:22:51', '2024-12-30 02:22:51', 12),
(18, 26, 'images/pegawai/2YuJcFZI7iAjOvE6ZvOBGHUQocHkVSQK2yOTYi8j.jpg', 'Annisya Eka', '198789287163867', 'parepare', '2024-12-05', '2024-12-17', 'SMK', 2024, 'Perempuan', '737281321263716', 'lab', 'Menikah', '08983352792976', 'putri@gmail.com', NULL, '2024-12-30 03:24:39', '2024-12-30 03:38:45', 12),
(19, 35, 'images/pegawai/nefYY3mUpNlaWhPHjeRmlhjkM2WtA7Hwlpwxtkiw.jpg', 'Prabu Adi', '1987892871638387', 'parepare', '2024-12-10', '2024-12-25', 'S1', 2024, 'Laki-laki', '7372813212637088', 'Dosen', 'Menikah', '0897686257992', 'iin@gmail.com', NULL, '2024-12-30 06:20:19', '2024-12-30 07:08:08', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_cuti` enum('tahunan','besar','melahirkan','alasan-penting','luar-tanggungan-negara') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_cuti` date NOT NULL,
  `selesai_cuti` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Menunggu Validasi','Ditolak','Disetujui','pending') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id`, `pegawai_id`, `nama_lengkap`, `jabatan`, `nip`, `jenis_cuti`, `mulai_cuti`, `selesai_cuti`, `alamat`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(9, 8, 'annisya', 'Dosen', '198789287163856', 'luar-tanggungan-negara', '2024-12-25', '2024-12-26', 'jln', '2024-12-22 10:11:40', '2024-12-22 10:11:40', 'Menunggu Validasi', 9),
(10, 8, 'mama', 'lab', '198789287163870', 'luar-tanggungan-negara', '2024-12-24', '2024-12-26', 'jln jambu', '2024-12-22 10:16:12', '2024-12-22 10:16:12', 'Menunggu Validasi', 9),
(11, 8, 'ade', 'Dosen', '1998263876387', 'melahirkan', '2024-12-25', '2024-12-27', 'jambu', '2024-12-22 10:24:50', '2024-12-22 10:24:50', 'Menunggu Validasi', 9),
(12, 8, 'ade', 'lab', '12817328372910', 'luar-tanggungan-negara', '2024-12-25', '2024-12-27', 'jln', '2024-12-22 10:29:34', '2024-12-22 10:29:34', 'Menunggu Validasi', 9),
(13, 8, 'annisya', 'Dosen', '198789287163872', 'luar-tanggungan-negara', '2024-12-24', '2024-12-25', 'jln', '2024-12-22 10:36:47', '2024-12-22 10:36:47', 'Menunggu Validasi', 9),
(14, 8, 'dimas', 'Dosen', '1233721312863', 'alasan-penting', '2024-12-25', '2024-12-26', 'jln sawi', '2024-12-22 21:40:08', '2024-12-22 21:40:08', 'Menunggu Validasi', 9),
(15, 8, 'dimas', 'Dosen', '1233721312890', 'alasan-penting', '2024-12-25', '2024-12-25', 'jln sawi', '2024-12-22 21:46:53', '2024-12-22 21:46:53', 'Menunggu Validasi', 9),
(16, 8, 'saya', 'Kepala Lab', '1977005467363', 'alasan-penting', '2024-12-25', '2024-12-26', 'jln', '2024-12-22 21:49:45', '2024-12-22 21:49:45', 'Menunggu Validasi', 9),
(17, 8, 'saya', 'Kepala Lab', '1977005467273', 'luar-tanggungan-negara', '2024-12-25', '2024-12-26', 'jln jambu', '2024-12-22 22:07:12', '2024-12-22 22:07:12', 'Menunggu Validasi', 9),
(26, 10, 'JOjo', '', '', 'luar-tanggungan-negara', '2024-12-10', '2024-12-24', '', NULL, '2024-12-22 23:20:35', 'Disetujui', 11),
(27, 10, 'jiji', 'Kepala Lab', '92137791273874', 'luar-tanggungan-negara', '2024-12-25', '2024-12-26', 'jln sawi', '2024-12-22 23:22:53', '2024-12-22 23:22:53', 'Menunggu Validasi', 11),
(28, 10, 'siska', 'Kepala Lab', '92137791273843', 'luar-tanggungan-negara', '2024-12-24', '2024-12-26', 'jln sawi', '2024-12-22 23:34:31', '2024-12-22 23:35:02', 'Disetujui', 11),
(29, 10, 'tita', 'Kepala Prodi Ilmu Komputer', '192898217362178', 'luar-tanggungan-negara', '2024-12-27', '2024-12-28', 'jln sawi', '2024-12-22 23:43:20', '2024-12-30 06:23:14', 'Disetujui', 11),
(30, 10, 'syarif', 'Kepala Lab', '12337213128600', 'tahunan', '2024-12-24', '2024-12-26', 'jln', '2024-12-23 03:23:08', '2024-12-23 03:23:08', 'pending', 11),
(31, 10, 'syarif', 'Kepala Lab', '12337213128603', 'alasan-penting', '2024-12-26', '2024-12-27', 'jln sawi', '2024-12-23 03:52:27', '2024-12-23 03:53:12', 'Disetujui', 11),
(32, 10, 'jelita', 'staf', '09281371289003', 'melahirkan', '2024-12-25', '2024-12-27', 'jln sawi', '2024-12-23 03:53:59', '2024-12-23 03:55:24', 'Disetujui', 11),
(33, 10, 'dina', 'Dosen', '87721853261482', 'tahunan', '2024-12-25', '2024-12-27', 'jlnn jensud', '2024-12-23 04:01:25', '2024-12-30 03:42:51', 'Disetujui', 11),
(34, 10, 'dina', 'Dosen', '2388747257653', 'tahunan', '2024-12-24', '2024-12-27', 'jln sawi', '2024-12-23 04:02:20', '2024-12-23 04:02:20', 'pending', 11),
(35, 10, 'dina', 'Dosen', '23887479989273', 'alasan-penting', '2024-12-24', '2024-12-27', 'jln sawi', '2024-12-23 04:04:27', '2024-12-23 04:04:27', 'pending', 11),
(36, 12, 'salma', 'dosen', '198231172893125', 'alasan-penting', '2024-12-19', '2024-12-28', 'jln', '2024-12-24 09:00:11', '2024-12-24 09:01:01', 'Disetujui', 13),
(37, 12, 'adrian', 'dosen', '2878751534152', 'luar-tanggungan-negara', '2024-12-27', '2024-12-31', 'jln', '2024-12-24 09:10:45', '2024-12-24 09:10:45', 'pending', 13),
(38, 12, 'riswan', 'kepala lab', '8326876274648', 'alasan-penting', '2024-12-26', '2024-12-28', 'jln', '2024-12-24 09:15:23', '2024-12-24 09:15:41', 'Disetujui', 13),
(39, 14, 'annisya', 'Dosen', '92389827432293', 'tahunan', '2024-12-30', '2024-12-31', 'jln jensud', '2024-12-27 12:19:46', '2024-12-27 12:19:46', 'pending', 15),
(40, 11, 'Ahmad Syarif tes', 'staf', '182684648362522', 'alasan-penting', '2024-12-30', '2024-12-31', 'jendral sudirman', '2024-12-28 17:24:25', '2024-12-28 17:24:25', 'pending', 12),
(41, 12, 'Salma', 'staf', '182684648362533', 'alasan-penting', '2024-12-31', '2025-05-13', 'jln', '2024-12-29 19:33:11', '2024-12-29 19:33:11', 'pending', 13),
(42, 7, 'laskar pelangi', 'Dosen', '777273862173665', 'alasan-penting', '2024-12-31', '2025-01-02', 'lorong', '2024-12-30 03:53:38', '2024-12-30 03:53:38', 'pending', 8),
(43, 14, 'Wana', 'Dosen', '1927189372632826', 'alasan-penting', '2024-12-31', '2025-01-02', 'lorong pelita', '2024-12-30 04:03:07', '2024-12-30 04:05:00', 'Ditolak', 15),
(44, 16, 'Nada Istiana putri', 'Dosen', '128639437493649', 'alasan-penting', '2024-12-31', '2025-01-02', 'lorong pelita', '2024-12-30 06:38:09', '2024-12-30 06:39:35', 'Disetujui', 19);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `annual_leave` int NOT NULL DEFAULT '12',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `start_time`, `end_time`, `annual_leave`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '17:00:00', 12, '2024-12-24 08:27:31', '2024-12-24 08:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6RxJmltUxzifhHlfW8R7nO4vsB4A2PRkbkLC0YD5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbEUzZEdoekwyTmljR1ZTUVdvdmFIWmlSSEpKUkhjOVBTSXNJblpoYkhWbElqb2lORGR0WlZBNVR6VkxMeXRSVERWNmIyWjJjSEpJTVU0eWNHaDZhak41VW5OWWFXWnhiemhyTjFSdk1UWlNWMHBwYm1aa1VHRmhlVUZaYzBObGFEQndPVUZZWTB0U1lsY3daVEJoVDJweU5teEpNa1ZXZDFFM05IcFFlR3hqYkhKaFJuVlNOM1VyWlU4ck5FdzNTbXhhV1dsaWRFcEJNVmxNYldVeEwzRkRkVVF6UjJaclJIWk5aaXR0Y2pKQlJ6UjFjVzVZZW5SWWVIQnhaa3N3YUZGT1pWSk5UekZhVmxSemNYZ3hkMFZuTWxKNlVtNTNSVzkyTkVVNWFrMDBVRmxZUkhjNGRFcEtXa04wZW1FdllrdFRkRVJNTDFReFoyeE1VbVJGYzI0NFlVd3ZlVUkxVUhsYWJqWktOVlYzUjJaNGVYTnJhVXBJYzIxWFRWWnZNMVp2VVV0TGFrRkxSSEZvTjFaT01YWm5VV2hyVmxkUVowRTlQU0lzSW0xaFl5STZJakF3TlRJeE5EaGlZbVk0TjJVM01tSmlPR0UxWWpZek5UVTRPREE0WWpJNU1qTTJOelJqTUdFd01HTTFOalpoWVRZd09HTTRNVEJoWmpRME9URXhaR01pTENKMFlXY2lPaUlpZlE9PQ==', 1734402735),
('CtVTVL7C4UMAfdBwN0meA27KHqDTLyBsCym8JUeB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjR4YURMOW5JNGJmd1k5Szg5dHdwYmZXNENRN0duMW5IazJsSmw4SSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZF91c2VyIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734416168),
('dcpBmnRFH0t8mMFiRjKYM9wmXhjFFGj3XIpiG6PA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJalowWjFoRVRsVm5PVzl5ZFRSWGRURk1MM1pyYUVFOVBTSXNJblpoYkhWbElqb2liMVJ1YkhCa1JrcFBkV1J6YlZKdkszaEpTSE5pSzJVeGEweFVhM0V3UVVNeVUyZ3JVbVpYV2s4NFV6QjFaemhDV1c1bFEwNWlXRXRUYkhGQ2NVcDNORUo1V0dKaVRHeHZSVTVrVmxkbGNHUlRUalVyT0VkRlF6aElRMmd5WWpaemRpdFFPR2xTVlZseVMyRXdVMFlyZHl0UVNtYzFkRTFKWmtwcldHbzJPREV4VFhCRU1qWllPVlZzUkRob01WcE5TbUkwWWxaamN6ZE1XVkpFV1ZaeVltSjFSRTVGTjJ0cllXYzBQU0lzSW0xaFl5STZJbVl3Wm1VNU9EYzFNak5qWWpNM1ltWmpOMlUxTXpjNE5EYzFOVEpqTlRGak1EUTNaV1pqTURBeFlqa3hNams0WmpNMU0yRmxaVGRrWVRZMU9HTXhZeklpTENKMFlXY2lPaUlpZlE9PQ==', 1734402561),
('DibgTe7o4lDEwIaxWDz8mwoRFM3PuWGRIz1dRD2p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbVJhWTNOak1VNVBhRU40WkdReFpGbGtRbEZLYUVFOVBTSXNJblpoYkhWbElqb2lkalYyTW1Wd1NsUTFaalIzVld4Nk1HeEhjblZzY0RkUFNVbHZNRFJyVEdZMGNHNUdTRVpQYXpVMFFYUjNXQ3N3ZFVZMlJrcENhRGQxTTFKM1lVc3pVMmhDVW5rNE0ycGlUV2wxY0hkT1FubE9ia1JZTUdscFkwZHVWM1pZU21WbVZqTlNRakZSTUdkR1VXbEhOVVZrZW5OV1lqSnVlbUp4WlN0NFJUbGtUemRLV0VzMVdscHFlREpHWTNKbVRYYzVZV0p4V1M4M1FYUnliMDkzZFZwTlRGbDBVRzQzUmxaWVVFaHJQU0lzSW0xaFl5STZJalptTmpZME5EZzBORFU1TlRjNVpqRXpPR1JqWWpZek9EaGtOVGt6T0RRMFpXTXhNVGN6TXpabE1qRTVOalZoT0RWbE5qQmtORGN4WkRJMU16ZGxaVE1pTENKMFlXY2lPaUlpZlE9PQ==', 1734402811),
('F352TA2jHoVpVZzPnpxDPzUIlEhknDCMLXW2ZPCf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJa1JJY0haUVJVbFFaQzl3UzFkek4zSkdRMVpWYlZFOVBTSXNJblpoYkhWbElqb2lTakJVWWxoUFUwOUdUM2RWTDNKalVtNTNaRk5JTldKeGVERldaa295WVdGdlVHVXZXbko0UmpBdksweGphSHAxT1ZNM1dVWkJjVTlVVldaQ01VVkNNak51VFd4Q1dTdEZNbEZXU0ZKa1JVNXpTSE5sTDA1dlIzaFdabmR3TUdaWFdGbEliREl5VUdRdlZHdDNkVVJzZVU1YVIzbzBlVFI0TmpaVVYybEhTWEZDTkdkWFFVUk9PV3BhSzBkQ1VsbzFjSGQ2ZDFwaVFsVk1hR3h1WjBkRGJGSlRjbXBEVXpOUmFscE5kV0Z2WTNNemJsbDBMMWhqVURWUmRHRnNaRXgyUlhGRmVuSTJlV3A0ZDJZekwyOU1XWFF5TlRsM1owdHZha1puWmtFdlRtNWxlbXg0WkVoc1FVVnRLMGREVEdkbU5rNUxaR0pFVG5oQ05XMHZLM0l5WkdOMVYyZG9hSEk1UjJoemJVWTFVRlZ5ZUVwRmVIYzlQU0lzSW0xaFl5STZJbUV5Tm1JME56UTNNemd3WmpGbE1HVTJOelF5WlRoa04yUmhaVFU0WWpGbE9UazVNVFl4TlRjeU5EY3pabVpoTldSak9UTTBabVJsWm1Jek1XRm1NR1FpTENKMFlXY2lPaUlpZlE9PQ==', 1734402796),
('fEkzBgti7G2keEBnoGxwleeG7q5JuLK3XxSBMAKM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJaTlrWjB0SVkxVlNVWEJzUWtsTmNsZENjbHBaVVdjOVBTSXNJblpoYkhWbElqb2lTekJDYldOUlEwMXNZbXBxSzNsbkszUm9XR1ZDV1dwRk1sTTBaRzVxVG0xMWVuSjBNMkkyVUZGMk1VNUxTa2xWYWpZdmQwbzVhRUZ5YUdKMlJqZDVPRTlQVFdSdk1WTlRLMWxxY25Wd2Rrc3ZkalZMYWpCVVVrZGtTalY0YWxGRFdFcEdjV2hEVURaQ1JscGtkVUl4YmxCU2NFSXZVbGxzYTFSR2F5OWhiVk5qYmtadGNrNVlSVU01UWtoVFVVbGxWbWs1WTJkS09GUk5WM0ZRUjNaTGVXOU1hMkY2ZGxkM1ZGbHNhVTFwWkhBMFYwY3pSbFl3Vms0clVTOXBWMDVpTmxkWGVISTVRemhzSzJoU2FrNHZSSEI2U2pWWGFVOVVabGh2TW5SMldtaERWVW8xU2xWU1pWQk5ZWFJoZHlzd2RrZGpSbEU0V2s4MWF6TlhhMmg0U0hOMGFrTmlVV1lyV0U4NU9HRmpTMlZhTWtKeFduYzlQU0lzSW0xaFl5STZJakZpTkdZeVpqUXdZemRqWXpnNU16VTFaV1EyTjJNd1ltWTFPRGs0TXpNME5EY3hNMlU1T0daa1l6QXhaakZqWTJVMVlUSmhaVEptWlRVMU9EQmtORGdpTENKMFlXY2lPaUlpZlE9PQ==', 1734402520),
('HVYe8FaypyejDaC7DmtbQT7GKb66i1L2wUgtnJ3G', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUJuQUJPYjJ4S2pTUGlOOWVnWXgyeE9OU3ZlOWxybG53eElZSE15ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmRfdXNlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734403062),
('nlOywp3W45ebOHQ3l8ygIF2Z4D1QSZM4DiGmtSpC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHltZVpZZm5QWFhEazh2ZmU3MG1acTF6WDNYd0Jnb0szMW5JakxDZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZF91c2VyIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734417350),
('qVK6HgZLf19GQat9AQHuA03mgLTujHt7sFMjxXyC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbkF3UzNwcU1uWllkVU5JVGpOUWJGVjJkMHN2ZG5jOVBTSXNJblpoYkhWbElqb2lUWGs0YTJwek5UWmlWMGxtTjJKMWVEaHZSemgzVlVKaGEzRnRjbWxDYkhaV01rZGxZaTlpV1hSekswRk9iV3QxUTNSemRIbHBVQzlaTkc5cU1VMTVNMVJLTnpsSU5HSlRRU3RsSzBaTlFrWlhXV1l3TlRKdVRIZEpNR053WjNKMmMyc3JiVTlyVkdoblRVczNlbmQxTkZCTE5uQkxOSFExV0dOUFJsQnpZbTFwUkhGWVZpODRNR2RyUVdSUFdrdFpWa0ZVTTNJck9YRlNVMFJMYW5kRFMxRjRaRGRxU0dwMWRUaG5QU0lzSW0xaFl5STZJbU5tTXprNVpETTNPVEV6Wmpoa09UUXpaakF6WmpJeFl6RTRZVFZsTlRoall6bGhPV016TVdZNE9EUTFZV1UyTWpKaE9UZ3hOamxrTldGbU1XUmhOalVpTENKMFlXY2lPaUlpZlE9PQ==', 1734402569),
('r7N9idwAgFJIJ3Cid3ynGYUMLRjjR0du7g1Az76k', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia284d29vWWVLWVNIY1dnajJyVkdESkFRSTFDc2lGY1N4QTlBZVBBciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sYXJhdmVsMTEudGVzdDo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734417190),
('RdvMX5E3J8oCbvX0Z51U5vKB3ilexP7Q0765y3RW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbUV3U0V3MU5VTkJkemhyUkM5VVEyTnNja3hWVUVFOVBTSXNJblpoYkhWbElqb2lXakl4Y2tGQ09VdHJhMVoyYWpJcmJIUlhkRkZvTWs1NWFETTBNWEJ2ZW1wNVVrbHdibVpqWVROaGNqRTFRM2RyY1VGek1FZDRaRkZ5ZFZaS2RsbDJOa2hSYml0SUt6WmFTWFF6WlcxeVNXVTNkMHd5YjJZemRERnlTMUJaVlVkM01rZGtaazlCVG1sMVVUWlpRa3Q2Y0VVMmJtaEpaMU5NV1hVNFJrTndXVE42WkZkS2VXdEJkSFJrV25FMGVXWkpjVzlUVTIxSVRIVlhVR0ZMUkVjMFpXSjVSRVZCUjJWUE0wMXZQU0lzSW0xaFl5STZJamhsWldFeE1HSTVObU5oT0dabFlUVXhNVGc1TW1FeE5XSTFaRGcwTm1JMU1UQmtNek0wT1dVeVlUZGhNR1UyTnpZd1kyTmtPR0ppTVRFMU9HSmhNamNpTENKMFlXY2lPaUlpZlE9PQ==', 1734402554),
('rXD9i7fhIkd98j0655fdsgT7TJZKYA3wlbfgHt1B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'ZXlKcGRpSTZJak5xZDNZMGMxZFdNMmhTUTJaeWJraHdTQ3RJV2tFOVBTSXNJblpoYkhWbElqb2lUamg2VTNST2MwaElORXBIYTFaQlJEWndLMFZ1T0VWNVluUjBOa2wwV0ZodmFGY3dUbTVaV25wd05FRjZNak56YUVWeFprUTBXa2xuV2l0MlJHNVBPVkk0T0RSU1MycHJRVzVyY1dSVE0yeE9jREkyVFhsNVlXSmFTeXROUlVsbU4yZDRhR1ZSV21sNlJGVkNTMjFuZGxkVVJpdEVlVEV4Wnk5TFJWWlJTSGRJTVRaVlZWSkNWaXRFV25Wc1VYWXJNM2sxVkZCbFRUSkZhVlJrY25vMloySk1SSFl2YldZMU1VUnZXVTVZYlU5allXaGtjR2RoU0RWWlIydGlibWRDU205WFJVTmhjWGxNYzJoNFZFVlFPRFJLY0ZnNWJrOVlVek5oTWxabE56VkJOVEExS3pJdk5sTlpNV1JSUkRGWlJUWXZZM2s1Tm5vMFRrOUhaR0ZCTDBkRmFHSkhUSGRRTTBFdmIwcENkamN2ZUhrMk5YYzlQU0lzSW0xaFl5STZJalkwWTJJeU1Ea3hNR1UwWkdNd1pHRmlZVE16TmpSak16QXlaakpoWmpJMk1qWXlOREUwWWpGbU5XTTVNalExWWpNMk1EUTVNRGN6WWpFMVlXUmlaRFlpTENKMFlXY2lPaUlpZlE9PQ==', 1734402726),
('sMIv4hmSKbAooOu83UVI1wT7CumgpzehRccGmSpB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbHBMVXpJeVpGZ3JWbVJwZVZGemJIbEJTRzh5WTBFOVBTSXNJblpoYkhWbElqb2lORVZDYUhkNlNtRnNiMkUyU0c0MVNWVTBhRTF1UzBsRk5saHJaRlV6U1RSVFlUUm1PV1ZpU0M5cVVXOVdVa2RqV0RGMFFUZ3JUelpIYUZGbGExcHZWbnBwV1V3NVJpdHdhbFFyTWpRMlZGZEdlazVzVm13M2IxQm1NRzExVUhCd2FIWktRMnhqWmpaMFZtUkJSa3BrU1ZJMU16WkVUMjV6TURoaGNXbHBkbUZaYjBFM1JVRllhREYyVVhKNVltWkplbVExWkdoR2NVdGtiVTVRY0RZelRtVktjV1pRWnl0cFpuWmpQU0lzSW0xaFl5STZJak5pTW1RMU5qRTBNekUzWXpGbU9HTmlZelpsTnpGbFpHVmxaRFJoTldWbE1qSmxNbUkxTmpFMk1qWTRPR0l4WVdGak9HUmlNemRqTlRrMk9URTRNRE1pTENKMFlXY2lPaUlpZlE9PQ==', 1734402741),
('Y4DVmVjQhIsFJvk2VVacPFyo7iIkptYV3KVVRRoM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbTlqY0ZVemMydGFjRlJNTTBsMlVsZzVWMDEwVFVFOVBTSXNJblpoYkhWbElqb2lkRmhzZFUxQlVWRXdWRWhsUW1kME1qRm5PR2hCWkU1T1kwdDZSMWh2VXpaT1QwdHJWa1pMWmtaamFsZFdkVWxoWXpoRVZsbG1jbWw1UWxwdEsxWmxkMFpLV0haWVpuQXpURXAyZUdSVmRXMHpjMEZUU0VkUWNVSjVhREZLUW1WWmFVcDRlSFJoYW1sdU5WcEpSMmRLUkc4NFZ6Rm1NRVp5ZVZBNVZGQkNTRTlNWlV0bE1tOTNiekJSVnpsdGJVTkNZVVowU0V4RWVsTnBSRzgwYlhjeldubHhkbWcyUmxSTWVqaHpQU0lzSW0xaFl5STZJakZrTldFMU9UWTRZVEUwT0RjNU9EVmxZMlV5WXpreU1UaGpOR1F6Wmpnell6VTJOVEJqT0dJell6QTVZemRoWmpFMk16STVZbVkxTVRNeU5EWXpPR0lpTENKMFlXY2lPaUlpZlE9PQ==', 1734402527);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `annual_leave` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('operator','pegawai','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$12$V./L9F9o7pwJbXmrar15Ju1EUpWEnO1MDlyzfJmtv2bY3Ib90FPx.', 'admin', NULL, NULL),
(2, 'didi', '$2y$12$vcPG3/s/nCa5a6BGXJFpLO9lCUa/emGgQyYNpyCKVssOzESDa6c0C', 'pegawai', '2024-12-22 06:15:03', '2024-12-22 06:15:03'),
(3, 'operator', '$2y$12$fUDrV39XyQ6yfHrenwuwDuFUVCQNskkiClFrZfv1BCOtEBtrCvcwK', 'operator', '2024-12-22 06:38:36', '2024-12-22 06:38:36'),
(4, 'eke', '$2y$12$m8vQtaSm3wUR18fik1CLfuixqt6Uy.8F1bc/uK74JUePQHORhzMgS', 'pegawai', '2024-12-22 07:10:36', '2024-12-22 07:10:36'),
(5, 'coba saya', '$2y$12$ZkDdJGcBn3Y8hYnxvx/adufbQ0.bte5diYQ7.nfHEjIhi7SJqAJQe', 'pegawai', '2024-12-22 07:31:42', '2024-12-22 07:31:42'),
(6, 'titik', '$2y$12$uONb25MlU211EFFLOJJo9OCFYv0rVTfgar2h.mHx9hPB5W.y7gzX6', 'pegawai', '2024-12-22 08:28:18', '2024-12-22 08:28:18'),
(7, 'kasih', '$2y$12$BjnCZCgv3H/2WE2wl7m.tOgUitqhCqtTPKmfd5HV7cFgSCuT3QxPS', 'pegawai', '2024-12-22 08:29:52', '2024-12-22 08:29:52'),
(8, 'laskar', '$2y$12$emmocpwdUBedsordcKJIHeyR7BXyOu4La9UxE.B7RxjxcFnTjJjR6', 'pegawai', '2024-12-22 08:41:45', '2024-12-22 08:41:45'),
(9, 'popi', '$2y$12$fRnCBVpZZ29jMDi12qEGouQx4ffKt39Je7JNgAPlrnAy996QwXB8m', 'pegawai', '2024-12-22 09:15:39', '2024-12-22 09:15:39'),
(10, 'ray', '$2y$12$G3Ne66ZMHb7AizhNMngwXeKmoE81oeeK1PdhKuERRFSm6ABcgvnXa', 'pegawai', '2024-12-22 22:11:46', '2024-12-22 22:11:46'),
(11, 'jojo', '$2y$12$hYdAJRTm80hFBji8gM8q/ORAzNb4LTqTb6AV35L04K2LYtpqxT7IG', 'pegawai', '2024-12-22 23:16:35', '2024-12-29 04:28:48'),
(12, 'syarif', '$2y$12$gVMzqc/l7qZoZOLOGUPFyOFnqBUZDk/vWJpSvvR4cqx0f51sETCEi', 'pegawai', '2024-12-23 04:06:59', '2024-12-23 04:06:59'),
(13, 'salma', '$2y$12$82Fk58QDfKfDAKa3Rx3dGuwnPq3eaT7zorJFQLUqhOmYbKchFg9q.', 'pegawai', '2024-12-24 08:48:36', '2024-12-29 19:03:52'),
(14, 'cici', '$2y$12$8edRZoF8nroKeX3ET8vfUuLwrGJeIy.pL4ivfkBedG6G1KJomBCdW', 'pegawai', '2024-12-26 06:02:31', '2024-12-26 06:02:31'),
(15, 'wana', '$2y$12$8Y17F9TtS5iw3VQvUBdvmOQcGh9FoWa3J33ENmdxuwGjcbPXXgv26', 'pegawai', '2024-12-26 17:48:48', '2024-12-30 04:03:39'),
(17, 'Ade', '$2y$12$MGlNJk6Iw0MRE4AoJxyfZOIfwe8DSjrhqsKXcwy/VKmjWkZA4w.H6', 'pegawai', '2024-12-29 12:16:37', '2024-12-29 12:16:37'),
(18, 'sri', '$2y$12$aiS4R4NnheK.QyKRJSopr.MAHN1t1kP2udvuXfQZD9c4PEZdRqiLu', 'pegawai', '2024-12-29 12:23:12', '2024-12-29 12:23:12'),
(19, 'nada', '$2y$12$6k5.fZTclsmxgpAzR1u9auF.zZfZP3aK0V2z/K.f9u9LBSBbw8mki', 'pegawai', '2024-12-29 18:34:37', '2024-12-30 06:38:47'),
(20, 'Nirwana', '$2y$12$crn3207Ut0SNPRDSQxnIBuKgVokqycsLoHPr1VVDQn97G9JziVt3i', 'pegawai', '2024-12-29 18:53:25', '2024-12-29 18:53:25'),
(21, 'Annisya', '$2y$12$bJI2DU2U1s.xBmExKir6cuku5ZrVG1UifOQdRA/a5kKFQvcq8wbXq', 'pegawai', '2024-12-30 02:13:54', '2024-12-30 02:13:54'),
(22, 'Nanir', '$2y$12$CXKeFjuAbHreAJFdqj07DeR5ImGrxS32ippplATiHijSnEH2R59IC', 'pegawai', '2024-12-30 03:00:34', '2024-12-30 03:00:34'),
(23, 'tess', '$2y$12$No/yhwPonzMjgb3VyKInguXg6JxZylxhuXh3JtrW06iC0xLGqjUlG', 'pegawai', '2024-12-30 03:07:45', '2024-12-30 03:07:45'),
(24, 'coba', '$2y$12$pmnL2r3FeJFDGBOopgzpT.A.6bdaxTAluVLofZ15KrD0lbrH8oJx.', 'pegawai', '2024-12-30 03:14:07', '2024-12-30 03:14:07'),
(25, 'opr', '$2y$12$lhIKIMCKk0ZBUYGVj3OMNuN9DUgGWar7ZtOAKi9lRDBvJjJ7R4TAS', 'operator', '2024-12-30 03:23:39', '2024-12-30 03:23:39'),
(26, 'coba skli', '$2y$12$exDfZzlz8ABjh89MMDvlH.MvB/JESasaT7w6asmQtoZ.Lq34BJ1yW', 'pegawai', '2024-12-30 03:23:58', '2024-12-30 03:23:58'),
(27, 'opera', '$2y$12$Z/HJP867SF2xJJeYluqqa.eVHkeHRu7Yb7GOX0Y53yjuEYpiXgOyW', 'operator', '2024-12-30 03:25:48', '2024-12-30 03:25:48'),
(28, 'Mala', '$2y$12$A4MEMJXh1DeoQ2BlXbnEz.OjdNxcHMCcrDfx0ExToeo9F6yun.H7G', 'pegawai', '2024-12-30 03:26:21', '2024-12-30 03:26:21'),
(29, 'Putri', '$2y$12$Sar17zAjhIxI3H4PKQZyO.JPwSpnIJGW9t6tzubBcBOWIWaXRuwoS', 'pegawai', '2024-12-30 03:28:51', '2024-12-30 03:28:51'),
(30, 'tes', '$2y$12$OHQty6OMw..8GBlL5.0fQOnY4SCjcEiZf8dGn1MlMGZbc0ytJdWxu', 'operator', '2024-12-30 03:30:36', '2024-12-30 03:30:36'),
(31, 'coba test', '$2y$12$JGLV3dCHO9rgTx6HIkIHYu.5xOHqf907KxlESc5Ww8dcYRgtj4xXe', 'pegawai', '2024-12-30 03:31:02', '2024-12-30 03:31:02'),
(32, 'cobatest', '$2y$12$v0tdJerRRzTuhAE/zoE8z.6kJm/Ri7UmriY15e7M8XAS3x0SJiLQ2', 'pegawai', '2024-12-30 03:33:34', '2024-12-30 03:33:34'),
(33, 'umrah', '$2y$12$7tgsvisIUMDVMx6Um8ru5Oz1ctjrujT9YaSY25vaGi9RUgxElvoKq', 'pegawai', '2024-12-30 06:06:55', '2024-12-30 06:06:55'),
(34, 'operator2', '$2y$12$R35FYbyQz6IHwU5kITL1O..7oZvBMGIM1P5bXjZRxp8jNKcqJ.9aK', 'operator', '2024-12-30 06:18:38', '2024-12-30 06:18:38'),
(35, 'prabu', '$2y$12$6Pi/utfR9IDv/VPZQTq/lOgnClihR6y8fxHNzsADCPwJLIYeWJCh6', 'pegawai', '2024-12-30 06:19:29', '2024-12-30 06:19:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_id_pegawai_foreign` (`id_pegawai`);

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
-- Indexes for table `databseny`
--
ALTER TABLE `databseny`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `databseny_nip_unique` (`nip`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_user_id_foreign` (`user_id`);

--
-- Indexes for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_id` (`pegawai_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `databseny`
--
ALTER TABLE `databseny`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD CONSTRAINT `fk_pegawai_id` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pengajuan_cuti_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_cuti_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
