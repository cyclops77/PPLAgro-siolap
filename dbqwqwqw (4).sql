-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2019 at 01:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbqwqwqw`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_10_125521_create_outlets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `user_id`, `name`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1095, 9329, 'tania', 'Jalan Anggrek Semboro', '-8.169002075965', '113.69004249572', '2019-10-27 13:12:48', '2019-10-27 06:12:48'),
(1096, 5750, 'name1', 'asdasdasd', '-8.225082205615', '113.57803344726', '2019-10-24 11:15:18', '2019-10-24 11:15:18'),
(1097, 5651, 'mitra001', 'mitra001', '-8.219645508622', '113.55468750000', '2019-10-24 11:18:56', '2019-10-24 11:18:56'),
(1098, 3332, 'Tri Nuryatul', 'Dekat perempatan', '-8.167993177231', '113.60412597656', '2019-10-25 15:08:32', '2019-10-25 15:08:32'),
(1099, 3325, 'izzul', 'lampu merah', '-8.335159209650', '113.41529846191', '2019-10-30 21:45:57', '2019-10-30 21:45:57'),
(1100, 3123, 'Tri Nuryatul', 'Dekat Lampu Merah', '-8.254982704877', '113.69476318359', '2019-11-03 22:23:09', '2019-11-03 22:23:09'),
(1101, 5890, 'Angga', 'fjkjnkhi', '-8.428904092875', '113.91174316406', '2019-11-19 08:20:21', '2019-11-19 08:20:21'),
(1102, 3368, 'Sate Padang', 'sad', '-8.276727101164', '113.95019531250', '2019-11-19 08:43:07', '2019-11-19 08:43:07'),
(1103, 7759, 'name1', 'sadasd', '-8.080984688871', '114.24682617187', '2019-11-22 03:17:39', '2019-11-22 03:17:39'),
(1104, 1503, 'Angga', 'Jalan Karimata', '-8.238673621756', '113.47229003906', '2019-11-27 16:33:17', '2019-11-27 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tania@gmail.com', '$2y$10$6UfHIxSwansN8xdcXuov3.p8I9fa4WV9SHJf8pBv.p1aC4.v/HmJq', '2019-10-26 06:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) NOT NULL,
  `mitra_id` bigint(20) NOT NULL,
  `produk_id` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `bukti_tf` varchar(450) DEFAULT NULL,
  `status_bayar` varchar(200) NOT NULL,
  `status_terkirim` varchar(200) NOT NULL,
  `status_terima` varchar(200) NOT NULL,
  `terakhir` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `mitra_id`, `produk_id`, `jumlah`, `harga_total`, `bukti_tf`, `status_bayar`, `status_terkirim`, `status_terima`, `terakhir`, `created_at`, `updated_at`) VALUES
(113918, 1095, 3657, 25, 125000, 'Screenshot from 2019-10-20 14-10-56.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-10-28 08:52:38', '2019-10-28 01:52:38'),
(117425, 1095, 1405, 10, 300000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-29 16:54:07', '2019-10-29 09:54:07', '2019-10-29 09:54:07'),
(178134, 1095, 3657, 50, 250000, 'Screenshot from 2019-10-07 12-56-40.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-10-26 07:15:56', '2019-10-26 00:15:56'),
(193283, 1095, 3657, 70, 350000, 'Screenshot from 2019-09-29 18-45-38.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-10-28 08:56:07', '2019-10-28 01:56:07'),
(232214, 1095, 2623, 10, 165000, 'Screenshot from 2019-08-06 13-51-36.png', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-11-01 05:34:49', '2019-11-03 13:53:24', '2019-11-03 06:53:24'),
(334070, 1095, 7541, 54, 1134000, 'images_daging_ayam-goreng.jpg', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-11-20 22:32:44', '2019-11-27 06:38:20', '2019-11-26 23:38:20'),
(403470, 1095, 1405, 5, 150000, '2118342_44498d45-ed4b-4201-901e-84833eade2df.jpg', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-30 23:39:53', '2019-11-29 23:40:04', '2019-11-29 16:40:04'),
(412154, 1095, 2266, 13, 260000, 'slip.png', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-11-21 15:11:43', '2019-11-20 15:32:54', '2019-11-20 08:32:54'),
(441443, 1095, 8290, 50, 2500000, 'Bukti-Transfer-Dana-SNP2M_Penelitian_Tanggal-15-10-2018-JAM-06.28.24-2.jpg', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-10-29 16:54:07', '2019-11-27 06:50:12', '2019-11-26 23:50:12'),
(448552, 1095, 2623, 12, 198000, 'a2.jpeg', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-11-01 05:34:26', '2019-11-03 13:53:29', '2019-11-03 06:53:29'),
(462725, 1095, 8206, 12, 60000, 'Screenshot from 2019-08-06 12-00-56.png', 'Sudah Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-01 04:15:18', '2019-10-31 05:44:41', '2019-10-30 22:44:41'),
(467787, 1095, 7541, 20, 420000, 'Screenshot from 2019-08-06 12-00-56.png', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-04 13:52:46', '2019-11-03 13:53:04', '2019-11-03 06:53:04'),
(552077, 1095, 2266, 12, 240000, '60179768_628909754249552_8691422139730146003_n.jpg', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-24 15:27:27', '2019-11-23 15:35:51', '2019-11-23 08:35:51'),
(565839, 1095, 1405, 23, 690000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-28 11:18:43', '2019-11-27 04:18:43', '2019-11-27 04:18:43'),
(567957, 1095, 3657, 10, 50000, 'Screenshot from 2019-10-26 15-43-14.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-11-01 08:23:46', '2019-11-01 01:23:46'),
(592861, 1098, 1405, 50, 1500000, 'Screenshot from 2019-08-13 10-43-22.png', 'Sudah Bayar', 'Sedang Mengirim', 'Belum Terima', NULL, '2019-10-27 14:58:32', '2019-10-27 07:58:32'),
(601587, 1095, 3040, 40, 200000, 'button-in-editor.png', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-02 01:43:44', '2019-11-01 02:27:58', '2019-10-31 19:27:58'),
(609260, 1095, 3040, 15, 75000, 'install-virtual-box-ubuntu-debian-ft.jpg', 'Sudah Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-01 05:36:10', '2019-10-31 08:54:38', '2019-10-31 01:54:38'),
(609505, 1095, 2266, 20, 400000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-21 15:11:29', '2019-11-20 08:11:29', '2019-11-20 08:11:29'),
(657174, 1095, 3040, 5, 25000, 'Screenshot from 2019-10-03 15-41-48.png', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-10-31 13:59:59', '2019-10-30 14:01:47', '2019-10-30 07:01:47'),
(688351, 1095, 1405, 11, 330000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-31 03:48:24', '2019-10-29 20:48:25', '2019-10-29 20:48:25'),
(703559, 1095, 3657, 30, 150000, 'Screenshot from 2019-10-03 15-41-24.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-10-30 03:41:51', '2019-10-29 20:41:51'),
(715128, 1095, 4336, 3, 6000, '1.Beranda.jpg', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-28 07:43:21', '2019-11-27 15:23:35', '2019-11-27 08:23:35'),
(715425, 1095, 2035, 30, 210000, 'AD SPRINT 3 A RANKING MAHASISWA.png', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-29 00:03:07', '2019-11-28 00:03:43', '2019-11-27 17:03:43'),
(735645, 1095, 2623, 30, 495000, 'Screenshot from 2019-08-07 18-43-52.png', 'Sudah Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-10 01:57:54', '2019-11-27 15:22:43', '2019-11-27 08:22:43'),
(759882, 1095, 1405, 2, 60000, 'organisasi.png', 'Sudah Bayar', 'Terkirim', 'Diterima', '2019-11-20 22:41:20', '2019-11-27 08:04:34', '2019-11-27 01:04:34'),
(841796, 1095, 1405, 13, 390000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-30 08:30:20', '2019-11-03 15:08:24', '2019-11-03 08:07:39'),
(874406, 1095, 3040, 70, 350000, 'Screenshot from 2019-10-23 18-35-49.png', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-04 10:48:06', '2019-11-03 10:49:34', '2019-11-03 03:49:34'),
(879065, 1095, 8290, 17, 850000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-30 01:57:54', '2019-10-30 06:05:46', '2019-10-29 09:57:54'),
(893244, 1095, 2623, 18, 297000, 'install-virtual-box-ubuntu-debian-ft.jpg', 'Sudah Bayar', 'Sedang Mengirim', 'Belum Terima', '2019-11-01 06:30:39', '2019-11-20 15:27:03', '2019-11-20 08:27:03'),
(915420, 1095, 3040, 15, 75000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-30 08:30:20', '2019-10-30 06:06:45', '2019-10-29 21:32:20'),
(917751, 1095, 3040, 10, 50000, 'Screenshot from 2019-08-06 13-53-10.png', 'Sudah Bayar', 'Sedang Mengirim', 'Belum Terima', '2019-11-02 01:03:39', '2019-11-20 15:26:55', '2019-11-20 08:26:55'),
(946445, 1100, 4112, 32, 96000, 'Screenshot from 2019-08-06 13-33-44.png', 'Sudah Bayar', 'Sedang Mengirim', 'Belum Terima', '2019-11-05 05:23:38', '2019-11-04 05:24:38', '2019-11-03 22:24:38'),
(974480, 1095, 2035, 3, 21000, 'berita_valid1503549531.jpg', 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-11-28 07:54:25', '2019-11-27 15:23:27', '2019-11-27 08:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_unverifed`
--

CREATE TABLE `pembelian_unverifed` (
  `id` bigint(20) NOT NULL,
  `pembelian_id` bigint(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_unverifed`
--

INSERT INTO `pembelian_unverifed` (`id`, `pembelian_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(301146, 715425, 'Gambar tidak terkait', '2019-11-29 16:40:21', '2019-11-29 16:40:21'),
(326472, 552077, 'Gambar teridentifikasi hasil edit', '2019-11-27 08:19:20', '2019-11-27 08:19:20'),
(431929, 715128, 'Gambar tidak terkait', '2019-11-27 17:02:25', '2019-11-27 17:02:25'),
(459794, 601587, 'Gambar teridentifikasi hasil edit', '2019-10-31 18:44:09', '2019-10-31 18:44:09'),
(653766, 915420, 'Tidak Melakukan Transaksi', '2019-10-31 18:14:00', '2019-10-31 18:14:00'),
(698666, 879065, 'Tidak Melakukan Transaksi', '2019-10-30 00:04:48', '2019-10-30 00:04:48'),
(709317, 874406, 'Gambar teridentifikasi hasil edit', '2019-11-03 03:50:08', '2019-11-03 03:50:08'),
(750073, 688351, 'Tidak Melakukan Transaksi', '2019-11-01 01:25:01', '2019-11-01 01:25:01'),
(750133, 117425, 'Tidak Melakukan Transaksi', '2019-10-29 22:31:35', '2019-10-29 22:31:35'),
(857889, 974480, 'Gambar tidak terkait', '2019-11-27 08:24:29', '2019-11-27 08:24:29'),
(868437, 841796, 'Tidak Melakukan Transaksi', '2019-11-20 08:31:16', '2019-11-20 08:31:16'),
(881939, 467787, 'Gambar teridentifikasi hasil edit', '2019-11-03 06:55:54', '2019-11-03 06:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5713, 'Ahmad Rizky', '2019-10-23 05:45:05', '2019-10-23 05:45:05'),
(2, 9040, 'Maulana Rifky', '2019-10-23 05:46:39', '2019-10-23 05:46:39'),
(3, 9328, 'Basril Fadh', '2019-10-23 05:47:40', '2019-10-23 20:29:15'),
(1035, 14316, 'Angga', '2019-11-19 08:33:08', '2019-11-19 08:33:08'),
(1105, 13583, 'Petani002', '2019-10-27 06:40:31', '2019-10-27 06:40:31'),
(1258, 19953, 'Ahmad Rizky', '2019-11-19 15:17:41', '2019-11-19 15:17:41'),
(1468, 15163, 'Muhammad Rifky', '2019-10-25 20:13:57', '2019-10-25 20:13:57'),
(1578, 10217, 'Bagus Gala', '2019-10-25 20:15:17', '2019-10-25 20:15:17'),
(1894, 12275, 'Aziz', '2019-10-27 07:01:12', '2019-10-27 07:01:12'),
(1973, 16843, 'Sate Padang', '2019-11-19 15:17:53', '2019-11-19 15:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) NOT NULL,
  `petani_id` bigint(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jenis_komoditas` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `isverify` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `petani_id`, `nama_barang`, `jenis_komoditas`, `gambar`, `harga_barang`, `stock`, `isverify`, `created_at`, `updated_at`) VALUES
(1405, 3, 'Tembakau SUper Sekaliii', 'tembakau', 'WhatsApp-Image-2018-08-28-at-17.52.56.jpeg', 30000, 270, 'yes', '2019-11-29 23:39:52', '2019-11-29 16:39:52'),
(1820, 3, 'Kedelai Merah', 'padi', '7x3TRDPVnx.jpg', 40850, 78, 'repeat', '2019-11-20 14:29:16', '2019-11-20 07:29:16'),
(2035, 1105, 'Beras Angsa', 'padi', 'beras.png', 7000, 30, 'yes', '2019-11-29 23:40:21', '2019-11-29 16:40:21'),
(2266, 3, 'Beras Merah Dua Anak', 'padi', 'beras-merah-_140630160934-762.jpg', 20000, 200, 'yes', '2019-11-27 15:19:20', '2019-11-27 08:19:20'),
(2285, 3, 'Beras Ungu Hitam', 'padi', '7x3TRDPVnx.jpg', 2000, 23, 'repeat', '2019-11-20 14:35:16', '2019-11-20 07:35:16'),
(2623, 3, 'Tebu Manis Bat', 'tebu', 'Makna-Kerata-Basa-Tebu-Anteb-ing-Kalbu-Kemantapan-dalam-Hati.jpg', 16500, 430, 'yes', '2019-11-27 07:41:11', '2019-11-27 00:41:11'),
(3040, 3, 'Beras Jati', 'padi', '082527400_1516006585-PILIH_GABAH_TERBAIK-Muhamad_Ridlo.jpeg', 5000, 670, 'yes', '2019-11-03 10:50:08', '2019-11-03 03:50:08'),
(3657, 3, 'Beras Merah Kaum Hawa', 'padi', 'BERAS-merah-gabung-768x1024.jpg', 5000, 200, 'yes', '2019-10-28 08:27:03', '2019-10-28 01:27:03'),
(3955, 3, 'Beras Merah Rambi', 'padi', 'beras-merah-_140630160934-762.jpg', 7000, 100, 'repeat', '2019-11-19 13:42:56', '2019-11-19 06:42:56'),
(4112, 3, 'Tembakau Alami', 'padi', '0009012IMG-20160730-091855780x390.jpg', 3000, 218, 'yes', '2019-11-04 05:23:38', '2019-11-03 22:23:38'),
(4336, 3, 'Beras Dua Anak', 'padi', 'beras.jpg', 2000, 406, 'yes', '2019-11-28 00:02:24', '2019-11-27 17:02:24'),
(4989, 3, 'zzz', 'padi', '1565881182_Contoh-surat-resign-yang-baik.docx', 2000, 300, 'repeat', '2019-11-19 22:21:21', '2019-11-19 15:21:21'),
(6929, 3, 'Beras Mainan', 'padi', 'beras-merah-_140630160934-762.jpg', 2000, 2323, 'no', '2019-11-20 07:44:31', '2019-11-20 07:44:31'),
(7276, 3, 'Nasi Rendang', 'padi', '1571478157_Screenshot from 2019-10-06 10-40-36.png', 2000, 230, 'repeat', '2019-11-29 23:42:48', '2019-11-29 16:42:48'),
(7383, 3, 'Beras Ungu', 'padi', 'beras-merah-_140630160934-762.jpg', 2000, 200, 'yes', '2019-11-20 14:29:21', '2019-11-20 07:29:21'),
(7541, 3, 'Kedelai Untuk Obat', 'kedela', '033599000_1521707402-Konsumsi-Kedelai-Berlebih-Akibatkan-Penis-Kecil-By-Madlen-shutterstock.jpg', 21000, 266, 'yes', '2019-11-19 22:32:44', '2019-11-19 15:32:44'),
(7698, 3, 'Kedelai Untuk Pintar', 'kedela', '08126202118520022019060241.png', 54000, 50, 'yes', '2019-11-20 14:32:07', '2019-11-20 07:32:07'),
(7908, 3, 'Beras Apa', 'padi', '08126202118520022019060241.png', 2000, 230, 'repeat', '2019-11-29 23:41:27', '2019-11-29 16:41:27'),
(8206, 3, 'Tembakau Mantap', 'tembakau', 'berita_valid1503549531.jpg', 5000, 488, 'yes', '2019-10-31 04:15:17', '2019-10-30 21:15:17'),
(8290, 3, 'Beras Kualitas Tersuper', 'padi', 'images.jpeg', 50000, 442, 'yes', '2019-10-30 07:04:48', '2019-10-30 00:04:48'),
(9934, 3, 'Tebu Manis Banget', 'tebu', 'goaceh_hp8kh_31427.jpg', 5000, 275, 'repeat', '2019-11-03 04:41:40', '2019-11-02 21:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `produk_status`
--

CREATE TABLE `produk_status` (
  `id` bigint(20) NOT NULL,
  `produk_id` bigint(20) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_status`
--

INSERT INTO `produk_status` (`id`, `produk_id`, `kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(104648, 1820, 'Foto tidak sesuai', 'Fotonya ngeblur, ganti ya !', '2019-11-20 07:29:16', '2019-11-20 07:29:16'),
(383214, 4989, 'Foto tidak sesuai', 'harap di ganti', '2019-11-19 15:21:21', '2019-11-19 15:21:21'),
(507635, 7908, 'Foto tidak sesuai', 'Ganti ya bro', '2019-11-29 16:41:27', '2019-11-29 16:41:27'),
(595629, 3955, 'Foto tidak sesuai', 'ganti foto ya !', '2019-11-03 03:23:35', '2019-11-03 03:23:35'),
(717991, 7276, 'Foto tidak sesuai', 'harap diganti', '2019-11-19 15:21:33', '2019-11-19 15:21:33'),
(721554, 2285, 'Foto kurang jelas', 'Ganti foto ya !', '2019-11-20 07:35:16', '2019-11-20 07:35:16'),
(879984, 9934, 'Harga tidak sesuai', 'harga pasar yaitu, 6000', '2019-11-03 10:45:42', '2019-11-02 21:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'alfian', 'alfian000000@gmail.com', NULL, '$2y$10$iUy6j8P/gjFTNmNooLeRMOas84tAhIAKzahh7AG5EyNq09fi2/8MK', NULL, '2019-10-23 04:38:34', '2019-10-23 04:38:34'),
(1503, 'mitra', 'Angga', 'angga31@gmail.com', NULL, '$2y$10$9T5zybq7QzcpcOBOZ3jTf.kUZ/X1NhDqMCsKUMVeuaZEATSejF/sa', NULL, '2019-11-27 16:33:17', '2019-11-27 16:33:17'),
(2987, 'petani', 'alfian122', 'alfian00000011@gmail.com', NULL, '$2y$10$pcLMt74b9GfctY1lO/QvQOTAIEBkfKdQNkANEE8VQd/OG6p7dtfrq', NULL, '2019-10-24 11:14:00', '2019-10-24 11:14:00'),
(3123, 'mitra', 'Tri Nuryatul', 'trinl12@gmail.com', NULL, '$2y$10$miKj6UgBwPSr5.jt6v5z6erUG6J8atnsH/z.Gm99quZttI2XufNZi', NULL, '2019-11-03 22:23:09', '2019-11-03 22:23:09'),
(3325, 'mitra', 'izzul', 'arizha@gmail.com', NULL, '$2y$10$QfygA2S.a5BJFK4szmt57OuljdG/fpqfVEd9eD/AnbZdU6K.fM.G.', NULL, '2019-10-30 21:45:57', '2019-10-30 21:45:57'),
(3332, 'mitra', 'Tri Nuryatul', 'trinl@gmail.com', NULL, '$2y$10$xw/YAETsQxjQHTPGCdI34uVxEB85.fQ/qxUstRdtV82xttEfEgAy2', NULL, '2019-10-25 15:08:32', '2019-10-25 15:08:32'),
(3368, 'mitra', 'Sate Padang', 'dfsdfs', NULL, '$2y$10$0vI6zal9/M9emhOSbf.eqeCaF/GHAG3bFli4gaeRDiKhCJFqXJjKO', NULL, '2019-11-19 08:43:07', '2019-11-19 08:43:07'),
(5651, 'mitra', 'mitra001', 'mitra001@mitra001.com', NULL, '$2y$10$ci2RwETDv.KozMF0LH.Buu7kHqH7z3rx2l7D0tHAA5Efb7AmK3nWW', NULL, '2019-10-24 11:18:56', '2019-10-24 11:18:56'),
(5713, 'petani', 'Ahmad Rizky', 'ahr@gmail.com', NULL, '$2y$10$ut69Vp/TsRez7oCLVSNTLesw.TjiUXJYmOMHy.tUSJ/rBCLWQ2vTe', NULL, '2019-10-23 05:45:05', '2019-10-23 05:45:05'),
(5750, 'petani', 'name1', 'name1@gmail.com', NULL, '$2y$10$C0Tp85id9aAkWT56NhS7W.6RztNWXqq57Ke5dTGKnxiVGQol/HnXa', NULL, '2019-10-24 11:15:18', '2019-10-24 11:15:18'),
(5890, 'mitra', 'Angga', 'angga@gmail.com', NULL, '$2y$10$MHWrX7cQT7IjJHlU3uwxvub2SoSxPORgoLw/p7DTWi1i7y5FjiCki', NULL, '2019-11-19 08:20:21', '2019-11-19 08:20:21'),
(7759, 'mitra', 'name1', 'bca@gmail.com', NULL, '$2y$10$dltkyhpVpnoO.wV57XSFiepXBanFCnLkt4GWr6Hvz0JwavesboVLy', NULL, '2019-11-22 03:17:39', '2019-11-22 03:17:39'),
(9040, 'petani', 'Maulana Rifky', 'mr@gmail.com', NULL, '$2y$10$8DdowXv8RXIPwQw3JmkzsOJv.mM00sCanyCHG7H.H/H55RBEO.l/m', NULL, '2019-10-23 05:46:39', '2019-10-23 05:46:39'),
(9328, 'petani', 'Basril Fadh', 'bfa@gmail.com', NULL, '$2y$10$n8FGypOJ955i2bfPhr8WweLAFQ9aEL31q/0QXvMeWXWtyxGFSWztK', NULL, '2019-10-23 05:47:39', '2019-10-23 05:47:39'),
(9329, 'mitra', 'Titania', 'tania@gmail.com', NULL, '$2y$10$y67VMuEB62WskDzl6j5e0e4MA3txpwUJVwwxPuaoF.9OGb83/L6sy', 'qaXZJvzQFDYdfCQPNsm4pbz6Dv1qs3RblwVu7D23yxXDs2VstnYHaOjEKpzP', '2019-10-23 16:28:19', '2019-10-23 16:28:19'),
(9330, 'mitra', 'Ahmad Rizky', 'bila@gmail.com', NULL, '$2y$10$YO5B4eqkPjoWLejk6qkbYei7s0H51igXiSsA/Hq7mOtrZbASlWvla', NULL, '2019-10-24 10:33:05', '2019-10-24 10:33:05'),
(10217, 'petani', 'Bagus Gala', 'bgs@gmail.com', NULL, '$2y$10$HBN8ZdOe.Y1UxETyYydE9.q2ozy/It26EG5.oAREcnq0eee8YPmOe', NULL, '2019-10-25 20:15:17', '2019-10-25 20:15:17'),
(12275, 'petani', 'Aziz', 'Aziz@gmail.com', NULL, '$2y$10$OceN1LsOFJ6Xw7roGz.Tl.WS8rZrhvj/HJYMDJ6vgTu80Br2Eq/sG', NULL, '2019-10-27 07:01:13', '2019-10-27 07:01:13'),
(13583, 'petani', 'Petani002', 'petani002@gmail.com', NULL, '$2y$10$ezIkRyW4AUM3QskMO8AXWeM5jCbe57RN8w/xn/cj.9lB49B8Oe6ty', NULL, '2019-10-27 06:40:32', '2019-10-27 06:40:32'),
(14316, 'petani', 'Angga', 'anggaa@gmail.com', NULL, '$2y$10$2BLDPY.mvu6LMYdo5OM03OlreRyuWYnnVabf0wxi3zftbz0qIYQZK', NULL, '2019-11-19 08:33:08', '2019-11-19 08:33:08'),
(15163, 'mitra', 'Muhammad Rifky', 'mrf@gmail.com', NULL, '$2y$10$/IgH4szApFjfIrBJ50D1xuRYx0gxoYV4q.RyCCGN27wkLnCBes0sm', NULL, '2019-10-25 20:13:57', '2019-10-25 20:13:57'),
(16843, 'petani', 'Sate Padang', 'baca@gmail.com', NULL, '$2y$10$wWlyfOizHonlyKujo3umw.cPLPfkSzGjz5vVstiWEhs5fgqoiZeQO', NULL, '2019-11-19 15:17:54', '2019-11-19 15:17:54'),
(17633, 'mitra', 'Mujib', 'm@gmail.com', NULL, '$2y$10$dndPmD3vSimGdevjuuxHTu00t8OnffHEdb672U/wmf/oyzLzl3fGa', NULL, '2019-10-24 10:52:02', '2019-10-24 10:52:02'),
(19953, 'petani', 'Ahmad Rizky', 'bcaa@gmail.com', NULL, '$2y$10$qMiW64HHqONOUvym4BMf3OGkpjRm6QMOKeN5Ok7fLoNhrBehVjofC', NULL, '2019-11-19 15:17:41', '2019-11-19 15:17:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `mitra_id` (`mitra_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `pembelian_unverifed`
--
ALTER TABLE `pembelian_unverifed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_id` (`pembelian_id`);

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petani_id` (`petani_id`);

--
-- Indexes for table `produk_status`
--
ALTER TABLE `produk_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974481;

--
-- AUTO_INCREMENT for table `pembelian_unverifed`
--
ALTER TABLE `pembelian_unverifed`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=881940;

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1974;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9935;

--
-- AUTO_INCREMENT for table `produk_status`
--
ALTER TABLE `produk_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879985;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19954;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `pembelian_unverifed`
--
ALTER TABLE `pembelian_unverifed`
  ADD CONSTRAINT `pembelian_unverifed_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id_pembelian`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`petani_id`) REFERENCES `petani` (`id`);

--
-- Constraints for table `produk_status`
--
ALTER TABLE `produk_status`
  ADD CONSTRAINT `produk_status_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
