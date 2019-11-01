-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2019 at 08:29 AM
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
(1098, 3332, 'Tri Nuryatul', 'Dekat perempatan', '-8.167993177231', '113.60412597656', '2019-10-25 15:08:32', '2019-10-25 15:08:32');

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
(441443, 1095, 8290, 50, 2500000, 'Bukti-Transfer-Dana-SNP2M_Penelitian_Tanggal-15-10-2018-JAM-06.28.24-2.jpg', 'Sudah Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-29 16:54:07', '2019-10-30 03:57:41', '2019-10-29 20:57:41'),
(567957, 1095, 3657, 10, 50000, 'Screenshot from 2019-10-26 15-43-14.png', 'Sudah Bayar', 'Belum Terkirim', 'Belum Terima', NULL, '2019-10-28 08:27:03', '2019-10-28 01:27:03'),
(592861, 1098, 1405, 50, 1500000, 'Screenshot from 2019-08-13 10-43-22.png', 'Sudah Bayar', 'Sedang Mengirim', 'Belum Terima', NULL, '2019-10-27 14:58:32', '2019-10-27 07:58:32'),
(688351, 1095, 1405, 11, 330000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-31 03:48:24', '2019-10-29 20:48:25', '2019-10-29 20:48:25'),
(703559, 1095, 3657, 30, 150000, 'Screenshot from 2019-10-03 15-41-24.png', 'Sudah Bayar', 'Terkirim', 'Diterima', NULL, '2019-10-30 03:41:51', '2019-10-29 20:41:51'),
(879065, 1095, 8290, 17, 850000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-30 01:57:54', '2019-10-30 06:05:46', '2019-10-29 09:57:54'),
(915420, 1095, 3040, 15, 75000, NULL, 'Belum Bayar', 'Belum Terkirim', 'Belum Terima', '2019-10-30 08:30:20', '2019-10-30 06:06:45', '2019-10-29 21:32:20');

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
(698666, 879065, 'Tidak Melakukan Transaksi', '2019-10-30 00:04:48', '2019-10-30 00:04:48'),
(750133, 117425, 'Tidak Melakukan Transaksi', '2019-10-29 22:31:35', '2019-10-29 22:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id`, `user_id`, `name`, `creator_id`, `created_at`, `updated_at`) VALUES
(1, 5713, 'Ahmad Rizky', NULL, '2019-10-23 05:45:05', '2019-10-23 05:45:05'),
(2, 9040, 'Maulana Rifky', NULL, '2019-10-23 05:46:39', '2019-10-23 05:46:39'),
(3, 9328, 'Basril Fadh', NULL, '2019-10-23 05:47:40', '2019-10-23 20:29:15'),
(1105, 13583, 'Petani002', NULL, '2019-10-27 06:40:31', '2019-10-27 06:40:31'),
(1468, 15163, 'Muhammad Rifky', NULL, '2019-10-25 20:13:57', '2019-10-25 20:13:57'),
(1578, 10217, 'Bagus Gala', NULL, '2019-10-25 20:15:17', '2019-10-25 20:15:17'),
(1894, 12275, 'Aziz', NULL, '2019-10-27 07:01:12', '2019-10-27 07:01:12');

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
(1405, 3, 'Tembakau SUper Sekaliii', 'tembakau', 'WhatsApp-Image-2018-08-28-at-17.52.56.jpeg', 30000, 289, 'yes', '2019-10-30 05:31:35', '2019-10-29 22:31:35'),
(2035, 1105, 'Beras Angsa', 'padi', 'beras.png', 7000, 30, 'no', '2019-10-27 23:52:32', '2019-10-27 23:52:32'),
(2623, 3, 'Tebu Manis Bat', 'tebu', 'Makna-Kerata-Basa-Tebu-Anteb-ing-Kalbu-Kemantapan-dalam-Hati.jpg', 16500, 500, 'yes', '2019-10-30 06:03:52', '2019-10-29 23:03:52'),
(3040, 3, 'Beras Jati', 'padi', '082527400_1516006585-PILIH_GABAH_TERBAIK-Muhamad_Ridlo.jpeg', 5000, 685, 'yes', '2019-10-30 04:32:20', '2019-10-29 21:32:20'),
(3657, 3, 'Beras Merah Kaum Hawa', 'padi', 'BERAS-merah-gabung-768x1024.jpg', 5000, 200, 'yes', '2019-10-28 08:27:03', '2019-10-28 01:27:03'),
(4336, 3, 'Beras Dua Anak', 'padi', 'beras.jpg', 2000, 400, 'yes', '2019-10-26 02:58:16', '2019-10-25 19:58:16'),
(7541, 3, 'Kedelai Untuk Obat', 'kedela', '033599000_1521707402-Konsumsi-Kedelai-Berlebih-Akibatkan-Penis-Kecil-By-Madlen-shutterstock.jpg', 21000, 320, 'no', '2019-10-28 01:40:52', '2019-10-28 01:40:52'),
(8206, 3, 'Tembakau Mantap', 'tembakau', 'berita_valid1503549531.jpg', 5000, 500, 'yes', '2019-10-30 06:03:56', '2019-10-29 23:03:56'),
(8290, 3, 'Beras Kualitas Tersuper', 'padi', 'images.jpeg', 50000, 442, 'yes', '2019-10-30 07:04:48', '2019-10-30 00:04:48'),
(9934, 3, 'Tebu Manis Banget', 'tebu', 'goaceh_hp8kh_31427.jpg', 5000, 275, 'no', '2019-10-24 00:33:23', '2019-10-23 17:29:43');

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
(2987, 'petani', 'alfian122', 'alfian00000011@gmail.com', NULL, '$2y$10$pcLMt74b9GfctY1lO/QvQOTAIEBkfKdQNkANEE8VQd/OG6p7dtfrq', NULL, '2019-10-24 11:14:00', '2019-10-24 11:14:00'),
(3332, 'mitra', 'Tri Nuryatul', 'trinl@gmail.com', NULL, '$2y$10$xw/YAETsQxjQHTPGCdI34uVxEB85.fQ/qxUstRdtV82xttEfEgAy2', NULL, '2019-10-25 15:08:32', '2019-10-25 15:08:32'),
(5651, 'mitra', 'mitra001', 'mitra001@mitra001.com', NULL, '$2y$10$ci2RwETDv.KozMF0LH.Buu7kHqH7z3rx2l7D0tHAA5Efb7AmK3nWW', NULL, '2019-10-24 11:18:56', '2019-10-24 11:18:56'),
(5713, 'petani', 'Ahmad Rizky', 'ahr@gmail.com', NULL, '$2y$10$ut69Vp/TsRez7oCLVSNTLesw.TjiUXJYmOMHy.tUSJ/rBCLWQ2vTe', NULL, '2019-10-23 05:45:05', '2019-10-23 05:45:05'),
(5750, 'petani', 'name1', 'name1@gmail.com', NULL, '$2y$10$C0Tp85id9aAkWT56NhS7W.6RztNWXqq57Ke5dTGKnxiVGQol/HnXa', NULL, '2019-10-24 11:15:18', '2019-10-24 11:15:18'),
(9040, 'petani', 'Maulana Rifky', 'mr@gmail.com', NULL, '$2y$10$8DdowXv8RXIPwQw3JmkzsOJv.mM00sCanyCHG7H.H/H55RBEO.l/m', NULL, '2019-10-23 05:46:39', '2019-10-23 05:46:39'),
(9328, 'petani', 'Basril Fadh', 'bfa@gmail.com', NULL, '$2y$10$n8FGypOJ955i2bfPhr8WweLAFQ9aEL31q/0QXvMeWXWtyxGFSWztK', NULL, '2019-10-23 05:47:39', '2019-10-23 05:47:39'),
(9329, 'mitra', 'Titania', 'tania@gmail.com', NULL, '$2y$10$y67VMuEB62WskDzl6j5e0e4MA3txpwUJVwwxPuaoF.9OGb83/L6sy', 'ApwdvR9iN4W3Yq9MipfddpS7MRskWiYws7zeihDBzRoBAkANvWLg9Vm29kMZ', '2019-10-23 16:28:19', '2019-10-23 16:28:19'),
(9330, 'mitra', 'Ahmad Rizky', 'bila@gmail.com', NULL, '$2y$10$YO5B4eqkPjoWLejk6qkbYei7s0H51igXiSsA/Hq7mOtrZbASlWvla', NULL, '2019-10-24 10:33:05', '2019-10-24 10:33:05'),
(10217, 'petani', 'Bagus Gala', 'bgs@gmail.com', NULL, '$2y$10$HBN8ZdOe.Y1UxETyYydE9.q2ozy/It26EG5.oAREcnq0eee8YPmOe', NULL, '2019-10-25 20:15:17', '2019-10-25 20:15:17'),
(12275, 'petani', 'Aziz', 'Aziz@gmail.com', NULL, '$2y$10$OceN1LsOFJ6Xw7roGz.Tl.WS8rZrhvj/HJYMDJ6vgTu80Br2Eq/sG', NULL, '2019-10-27 07:01:13', '2019-10-27 07:01:13'),
(13583, 'petani', 'Petani002', 'petani002@gmail.com', NULL, '$2y$10$ezIkRyW4AUM3QskMO8AXWeM5jCbe57RN8w/xn/cj.9lB49B8Oe6ty', NULL, '2019-10-27 06:40:32', '2019-10-27 06:40:32'),
(15163, 'mitra', 'Muhammad Rifky', 'mrf@gmail.com', NULL, '$2y$10$/IgH4szApFjfIrBJ50D1xuRYx0gxoYV4q.RyCCGN27wkLnCBes0sm', NULL, '2019-10-25 20:13:57', '2019-10-25 20:13:57'),
(17633, 'mitra', 'Mujib', 'm@gmail.com', NULL, '$2y$10$dndPmD3vSimGdevjuuxHTu00t8OnffHEdb672U/wmf/oyzLzl3fGa', NULL, '2019-10-24 10:52:02', '2019-10-24 10:52:02');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1099;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915421;

--
-- AUTO_INCREMENT for table `pembelian_unverifed`
--
ALTER TABLE `pembelian_unverifed`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750134;

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1895;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9935;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17634;

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
-- Constraints for table `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `outlets_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
