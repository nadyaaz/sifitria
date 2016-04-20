-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 08:58 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifitria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `IdPermohonan` int(11) NOT NULL,
  `TahapCatatan` int(11) NOT NULL,
  `DeskripsiCatatan` text COLLATE utf8_unicode_ci,
  `NomorIndukPenulis` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hashCatatan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`IdPermohonan`, `TahapCatatan`, `DeskripsiCatatan`, `NomorIndukPenulis`, `hashCatatan`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ruangan dipakai dekan untuk rapat', '1306464114', 'ba922c3094b49865f7d6f4ccd945367f', '2016-04-20 03:27:21', '2016-04-20 03:27:21'),
(4, 1, 'Tidak Ada', '1306464114', 'a70e1d5f60f9406acc0831e3cebce254', '2016-04-20 03:09:56', '2016-04-20 03:09:56'),
(5, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '0fe54d3e05664ac775aa6145493018e5', '2016-04-14 23:49:42', NULL),
(6, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '6f0debc9851b623b89f1f45da988cc3a', '2016-04-14 23:49:42', NULL),
(10, 0, 'Barang saya beli dari toko furnitur seberang kantor', '1306464114', '2a93345479ed3326d1bda78535d8aea5', '2016-04-17 19:34:59', '2016-04-17 19:34:59'),
(12, 0, 'qwe', '1306464114', 'ca2018512d5687b10f3b7d888d737f59', '2016-04-20 00:20:17', '2016-04-20 00:20:17'),
(13, 0, 'Rapat membutuhkan banyak kursi', '1306464114', '4058ef07f0ed7f5a01ac5dce430283e7', '2016-04-20 03:29:09', '2016-04-20 03:29:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`IdPermohonan`,`TahapCatatan`),
  ADD KEY `catatan_nomorindukpenulis_foreign` (`NomorIndukPenulis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_idpermohonan_foreign` FOREIGN KEY (`IdPermohonan`) REFERENCES `permohonan` (`IdPermohonan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_nomorindukpenulis_foreign` FOREIGN KEY (`NomorIndukPenulis`) REFERENCES `users` (`NomorInduk`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
