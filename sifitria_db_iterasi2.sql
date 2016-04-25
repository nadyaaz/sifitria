-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 09:02 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int(11) NOT NULL,
  `NamaBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `JenisBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SpesifikasiBarang` text COLLATE utf8_unicode_ci NOT NULL,
  `TanggalBeli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Penanggungjawab` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KategoriBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KondisiBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KeteranganBarang` text COLLATE utf8_unicode_ci,
  `NomorBarcode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WaktuRegistrasi` timestamp NULL DEFAULT NULL,
  `KerusakanBarang` text COLLATE utf8_unicode_ci,
  `IdPermohonan` int(11) DEFAULT NULL,
  `hashBarang` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `JenisBarang`, `SpesifikasiBarang`, `TanggalBeli`, `Penanggungjawab`, `KategoriBarang`, `KondisiBarang`, `KeteranganBarang`, `NomorBarcode`, `WaktuRegistrasi`, `KerusakanBarang`, `IdPermohonan`, `hashBarang`, `created_at`, `updated_at`) VALUES
(1, 'Projector 1101', 'Projector', 'Projector untuk ruang kelas 1101', '2016-04-25 06:57:48', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Elektronik', 'Rusak', NULL, NULL, NULL, 'Tidak Bisa Menyala', 18, '61342a80a85e4fc5cd03b43da2e65912', '2016-04-14 23:45:59', '2016-04-14 23:45:59'),
(2, 'Projector 1102', 'Projector', 'Projector untuk ruang kelas 1102', '2016-04-25 06:59:16', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Elektronik', 'Baru', NULL, NULL, NULL, NULL, NULL, '39f98d27c67cd73eabe2aaf2af99af64', '2016-04-14 23:45:59', '2016-04-14 23:45:59'),
(3, 'Meja 1101', 'Meja', 'Meja Pengajar untuk ruang kelas 1101', '2016-04-17 09:02:41', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Furnitur', 'Baru', NULL, NULL, NULL, NULL, NULL, '27a14c38b040c79511cf6ab47fdd8c83', '2016-04-14 23:48:25', '2016-04-14 23:48:25'),
(4, 'Meja 1102', 'Meja', 'Meja Pengajar untuk ruang kelas 1102', '2016-04-17 09:02:44', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Furnitur', 'Baru', NULL, NULL, NULL, NULL, NULL, 'e2c8e486582dbcd99cd619b23f9a6792', '2016-04-14 23:48:25', '2016-04-14 23:48:25'),
(5, 'Asus A46CB', 'Laptop', 'Intel Core i7 6th Gen', '2016-04-17 09:02:12', 'Jundi Ahmad Alwan', 'Elektronik', 'Baru', 'Barang di beli di mangga dua. Sesuai dengan permintaan saudara Bima.', '5', '2016-04-17 01:37:05', 'Tidak ada', NULL, '06f794a412cf277effbc3d55ed5e816e', '2016-04-17 08:37:05', '2016-04-17 08:37:05'),
(6, 'Asus ROG', 'Laptop', 'Intel Core i7 6th Gen', '2016-04-25 07:00:01', 'Jundi Ahmad Alwan', 'Elektronik', 'Rusak', 'Barang dibeli dari online shop LAZADA', '6', '2016-04-17 01:37:05', 'Laptop terkena virus', 19, 'a7887bf42b278196d3dcb59e634edb8f', '2016-04-17 08:37:05', '2016-04-17 08:37:05'),
(7, 'LG LED TV', 'TV', '24" LED', '2016-04-22 17:00:00', 'Bima Satria', 'Elektronik', 'Baru', 'Barang dibeli dari Tokopedia namun masih baru', '7', '2016-04-17 02:05:32', 'Tidak ada', NULL, '04830e61fef96e2473d8ebfc7d5dcac4', '2016-04-17 09:05:32', '2016-04-17 09:05:32'),
(8, 'Nokia Lumia 950', 'Smartphone', '5,2" Display\r\nWindows 10 Mobile', '2016-04-22 17:00:00', 'Jundi Ahmad Alwan', 'Elektronik', 'Baru', 'Barang dititipkan ke mas Bima', '8', '2016-04-17 03:58:21', 'Tidak ada', NULL, 'ed629d30b31c0d73a486f5c7e210cd74', '2016-04-17 10:58:21', '2016-04-17 10:58:21'),
(9, 'Nokia Lumia 950XL', 'Smartphone', '5,7" Display\r\nWindows 10 Mobile', '2016-04-22 17:00:00', 'Jundi Ahmad Alwan', 'Elektronik', 'Baru', 'Barang dititipkan ke mas Bima', '9', '2016-04-17 03:58:21', 'Tidak ada', NULL, 'de2d5ba0a1bf56121875081b757ba8bc', '2016-04-17 10:58:21', '2016-04-17 10:58:21');

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
(5, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '0fe54d3e05664ac775aa6145493018e5', '2016-04-14 23:49:42', NULL),
(6, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '6f0debc9851b623b89f1f45da988cc3a', '2016-04-14 23:49:42', NULL),
(10, 0, 'Barang saya beli dari toko furnitur seberang kantor', '1306464114', '2a93345479ed3326d1bda78535d8aea5', '2016-04-17 19:34:59', '2016-04-17 19:34:59'),
(12, 0, 'Meja untuk ruangan ibu X', '1306382594', 'c7e1d99d813e09c84ee1af67c70fd6e9', '2016-04-20 05:13:29', '2016-04-20 05:13:29'),
(13, 0, 'no', '1306382594', '7be1c32d394014eab9ebbebd6d9c1e44', '2016-04-20 05:15:33', '2016-04-20 05:15:33'),
(14, 0, 'Ini untuk meja ruang Ibu X, Y, dan Z', '1306382594', '84172cac45b4a52dae05af91653906cf', '2016-04-20 07:24:31', '2016-04-20 07:24:31'),
(15, 0, '1', '1306382594', '31eafe6aef2b787403706ac316f6ce24', '2016-04-20 14:43:13', '2016-04-20 14:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `IdGedung` int(11) NOT NULL,
  `Nama` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`IdGedung`, `Nama`, `deleted`, `hash`, `created_at`, `updated_at`) VALUES
(1, 'Gedung G', 0, '137b1cc2182c930f856263d18ae50260', '2016-04-14 01:33:42', '2016-04-14 01:33:42'),
(2, 'Gedung M', 0, 'e0d002a42641132ce53bb30c1e04ff80', '2016-04-14 01:33:43', '2016-04-14 01:33:43'),
(3, 'Gedung Kegiatan Mahasiswa', 0, '870cbd0fe8145c5ca9e3abe81f0446bf', '2016-04-16 03:07:40', '2016-04-16 03:07:40'),
(4, 'Gedung Seminar', 1, 'fbc944b32432f5e0f68c9713fa902b07', '2016-04-16 07:46:20', '2016-04-16 07:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `IdGedung` int(11) NOT NULL,
  `IdRuangan` int(11) NOT NULL,
  `IdJadwal` int(11) NOT NULL,
  `WaktuMulai` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `WaktuSelesai` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `KeperluanPeminjaman` text COLLATE utf8_unicode_ci NOT NULL,
  `hashJadwal` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`IdGedung`, `IdRuangan`, `IdJadwal`, `WaktuMulai`, `WaktuSelesai`, `KeperluanPeminjaman`, `hashJadwal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-04-18 06:00:00', '2016-04-18 08:00:00', 'Dies Natalis Fakultas Ilmu Administrasi', '698d51a19d8a121ce581499d7b701668', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 2, '2016-04-18 12:30:00', '2016-04-18 14:30:00', 'Grand Launching BEM FIA 2016', '7f6ffaa6bb0b408017b62254211691b5', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 3, '2016-04-20 12:30:00', '2016-04-20 14:30:00', 'Grand Launching DPM FIA 2016', '73278a4a86960eeb576a8fd4c9ec6997', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 4, '2016-04-23 02:00:00', '2016-04-23 10:00:00', 'Training Kependidikan Dosen FIA 2016', '5fd0b37cd7dbbb00f97ba6ce92bf5add', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 1, '2016-04-18 02:00:00', '2016-04-18 03:00:00', 'Rapat Internal Divisi Fasilitas & Infrastruktur', '4c56ff4ce4aaf9573aa5dff913df997a', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 2, '2016-04-18 03:00:00', '2016-04-18 05:00:00', 'Rapat Internal Divisi Pengadaan', 'a0a080f42e6f13b3a2df133f073095dd', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 3, '2016-04-23 03:00:00', '2016-04-23 05:00:00', 'Rapat Perdana BEM FIA 2016', '202cb962ac59075b964b07152d234b70', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 4, '2016-04-23 06:00:00', '2016-04-23 09:00:00', 'Rapat Perdana DPM FIA 2016', 'c8ffe9a587b126f152ed3d89a146b445', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 1, '2016-04-18 02:00:00', '2016-04-18 05:00:00', 'Rapat Internal Staf Sekretariat', '1afa34a7f984eeabdbb0a7d494132ee5', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 2, '2016-04-18 12:00:00', '2016-04-18 14:00:00', 'Rapat BPH BEM FIA', '65ded5353c5ee48d0b7d48c591b8f430', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 3, '2016-04-15 12:00:00', '2016-04-15 14:00:00', 'Rapat BPH BEM FIA', '9fc3d7152ba9336a670e36d0ed79bc43', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 4, 1, '2016-04-19 07:30:00', '2016-04-19 09:00:00', 'Kelas Administrasi Bisnis', '0f28b5d49b3020afeecd95b4009adf4c', '2016-04-19 00:44:53', '2016-04-19 00:44:53'),
(1, 5, 2, '2016-04-20 02:00:00', '2016-04-20 02:50:00', 'Kelas Dasar-Dasar Perpajakan', '37a749d808e46495a8da1e5352d03cae', '2016-04-19 00:56:35', '2016-04-19 00:56:35'),
(2, 5, 1, '2016-04-30 01:00:00', '2016-04-30 02:00:00', '1', '251', '2016-04-20 14:43:13', '2016-04-20 14:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat_barang`
--

CREATE TABLE `kandidat_barang` (
  `IdKandidatBarang` int(11) NOT NULL,
  `NamaBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `JenisBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KategoriBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KeteranganBarang` text COLLATE utf8_unicode_ci NOT NULL,
  `KondisiBarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Penanggungjawab` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TanggalBeli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SpesifikasiBarang` text COLLATE utf8_unicode_ci NOT NULL,
  `IdPermohonan` int(11) NOT NULL,
  `hashKandidat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kandidat_barang`
--

INSERT INTO `kandidat_barang` (`IdKandidatBarang`, `NamaBarang`, `JenisBarang`, `KategoriBarang`, `KeteranganBarang`, `KondisiBarang`, `Penanggungjawab`, `TanggalBeli`, `SpesifikasiBarang`, `IdPermohonan`, `hashKandidat`, `created_at`, `updated_at`) VALUES
(1, 'Laptop BEM', 'Elektronik', 'Laptop', 'Laptop ini dipakai untuk kepeluan kesekretariatan BEM FIA. ', 'Baru', 'Ketua BEM (Mahasiswa 1 - 1300000001)', '2016-04-14 09:43:11', 'Laptop ASUS A46CB', 7, '', '2016-04-14 09:39:56', '2016-04-14 09:39:56'),
(2, 'Papan Tulis Ruang BEM', 'Furnitur', 'Papan Tulis', 'Papan Tulis ini digunakan untuk keperluan rapat BEM.', 'Baru', 'Ketua BEM (Mahasiswa 1 - 1300000001)', '2016-04-11 17:00:00', 'Papan Tulis beli di Gramedia Margonda Depok', 8, '', '2016-04-14 09:39:56', '2016-04-14 09:39:56'),
(3, 'Meja', 'Furnitur', 'Meja', 'Meja ini digunakan untuk membantu kegiatan kesekretariatan BEM FIA', 'Baru', 'Sekretaris BEM (Mahasiswa 2 - 1300000002)', '2016-04-11 17:00:00', 'Meja beli di Gramedia Margonda Depok', 9, '', '2016-04-14 09:39:56', '2016-04-14 09:39:56'),
(4, 'Sofa Panjang', 'Kursi Sofa', 'Furnitur', '-', 'Baru', 'Jundi Ahmad Alwan', '2016-04-28 17:00:00', 'sofa 2 meter', 10, '1b53f59623c8d1efc7951f754f4f8148', '2016-04-17 19:34:59', '2016-04-18 16:18:06'),
(5, 'Sofa Personal', 'Kursi Sofa', 'Furnitur', 'tidak ada', 'Baru', 'Jundi Ahmad Alwan', '2016-04-23 17:00:00', 'sofa untuk 1 orang', 10, 'efe8f853816c42fa2f7f6e014dcee2b6', '2016-04-17 19:34:59', '2016-04-17 19:34:59'),
(6, 'Meja Ruangan Ibu X', 'Meja', 'Furnitur', 'Meja untuk Ruangan Ibu X', 'Baru', 'Bima', '2016-04-25 17:00:00', 'Meja merek Olympus', 12, '93ae8a8ae8e052f6f838ccda77009a28', '2016-04-20 05:13:29', '2016-04-20 05:13:29'),
(7, 'Meja Ruangan Ibu X', 'Meja', 'Furnitur', '-', 'Baru', 'Bima', '2016-04-25 17:00:00', 'Meja merek Olympus', 13, '2c08d12e5740aa6c70366a33b21d9410', '2016-04-20 05:15:33', '2016-04-20 05:16:49'),
(8, 'Meja', 'Meja', 'Furnitur', '-', 'Baru', 'Bima', '2016-04-25 17:00:00', '-', 14, '12faed26b2b3e27d1a7518958c957635', '2016-04-20 07:24:30', '2016-04-20 07:24:30'),
(9, 'Meja', 'Meja', 'Furnitur', '-', 'Baru', 'Bima', '2016-04-25 17:00:00', '-', 14, '09652cab8eca77636b7de59e9658382b', '2016-04-20 07:24:30', '2016-04-20 07:24:30'),
(10, 'Komputer Perpustakaan 1', 'Komputer', 'Elektronik', 'Komputer untuk aplikasi Lontar di perpustakaan', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 16, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(11, 'Komputer Perpustakaan 2', 'Komputer', 'Elektronik', 'Komputer untuk aplikasi Lontar di perpustakaan', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 16, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(12, 'Komputer Perpustakaan 3', 'Komputer', 'Elektronik', 'Komputer untuk aplikasi Lontar di perpustakaan', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 16, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(13, 'Komputer Perpustakaan 4', 'Komputer', 'Elektronik', 'Komputer untuk aplikasi Lontar di perpustakaan', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 16, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(14, 'Stop Kontak 1', 'Stop Kontak', 'Elektronik', 'Stop Kontak untuk kantin FIA', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 17, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(15, 'Stop Kontak 2', 'Stop Kontak', 'Elektronik', 'Stop Kontak untuk kantin FIA', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 17, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20'),
(16, 'Stop Kontak 3', 'Stop Kontak', 'Elektronik', 'Stop Kontak untuk kantin FIA', 'Baru', 'Nadya Azizah (Staf Fasilitas & Infrastruktur)', '2016-04-14 17:00:00', 'Merek: ASUS\r\nRAM: 4GB', 17, '', '2016-04-25 06:34:56', '2016-04-25 06:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_13_105011_create_gedung_table', 1),
('2016_04_13_110657_create_ruangan_table', 1),
('2016_04_13_110750_create_jadwal_table', 1),
('2016_04_13_111631_create_permohonan_table', 1),
('2016_04_13_111742_create_catatan_table', 1),
('2016_04_13_112053_create_kandidat_barang_table', 1),
('2016_04_13_112134_create_barang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `IdPermohonan` int(11) NOT NULL,
  `NomorSurat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubjekPermohonan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IdPemohon` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `JenisPermohonan` int(11) NOT NULL,
  `IdGedung` int(11) DEFAULT NULL,
  `IdRuangan` int(11) DEFAULT NULL,
  `IdJadwal` int(11) DEFAULT NULL,
  `LinkAnggaran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LinkSuratDisposisi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TahapPermohonan` int(11) NOT NULL DEFAULT '1',
  `StatusPermohonan` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `hashPermohonan` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`IdPermohonan`, `NomorSurat`, `SubjekPermohonan`, `IdPemohon`, `JenisPermohonan`, `IdGedung`, `IdRuangan`, `IdJadwal`, `LinkAnggaran`, `LinkSuratDisposisi`, `TahapPermohonan`, `StatusPermohonan`, `created_at`, `updated_at`, `deleted`, `hashPermohonan`) VALUES
(1, 'SIFITRIA/2016/04/01', 'Peminjaman Auditorium', '1306000001', 1, 1, 1, 2, NULL, NULL, 1, 2, '2016-04-14 09:17:08', '2016-04-14 09:17:08', 0, '15b57022e3bf4eb116898ed92e99eedf'),
(2, 'SIFITRIA/2016/04/02', 'Peminjaman Auditorium', '1306000003', 1, 1, 1, 3, NULL, NULL, 1, 0, '2016-04-14 09:19:39', '2016-04-14 09:19:39', 0, 'ce100643cb931c8e539441845f2c8583'),
(3, 'SIFITRIA/2016/04/03', 'Peminjaman Ruang Rapat Besar', '1306000001', 1, 1, 2, 3, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'e5d02116a04736161a1784cb7652bc0d'),
(4, 'SIFITRIA/2016/04/04', 'Peminjaman Ruang Rapat Besar', '1306000003', 1, 1, 2, 4, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '924c3ee94936465b8d47c54f966247db'),
(5, 'SIFITRIA/2016/04/05', 'Peminjaman Ruang Rapat Kecil', '1306000002', 1, 1, 3, 2, NULL, NULL, 1, 1, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '2c03ffd83b0b3598d848da53f66ef6c2'),
(6, 'SIFITRIA/2016/04/06', 'Peminjaman Ruang Rapat Kecil', '1306000004', 1, 1, 3, 3, NULL, NULL, 1, 1, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '6f2c6b21ff83bd85f384cd13d5084244'),
(7, 'SIFITRIA/2016/04/07', 'Registrasi Laptop Baru Sekre', '1306405276', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'fbfd05d712aebe8f52c37433d01c9b55'),
(8, 'SIFITRIA/2016/04/08', 'Registrasi Barang Papan Tulis untuk Ruang BEM', '1306000002', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'c30088da2f6f5ccd55be75d606d5b0a5'),
(9, 'SIFITRIA/2016/04/09', 'Registrasi Barang Meja untuk Ruang BEM', '1306000002', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'c2329d40c55abfd91dfc76cf92b5beaf'),
(10, NULL, 'Permohonan Registrasi Furnitur', '1306464114', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-17 19:34:59', '2016-04-17 19:34:59', 0, 'af4feb5c8877bc9bf17badf06bf6d3f5'),
(11, NULL, 'Permohonan Registrasi Barang (Meja untuk Ruang Dosen)', '1306382594', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-20 05:11:16', '2016-04-20 05:11:16', 1, '043c43c4d21f86689d77a76ad7ac22e8'),
(12, NULL, 'Permohonan Registrasi Barang (Meja untuk Ruang Dosen)', '1306382594', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-20 05:13:29', '2016-04-20 05:13:29', 1, '59991659ac4b693df621545ca66ce8f3'),
(13, NULL, 'Permohonan Registrasi Barang (Meja untuk Ruang Dosen)', '1306382594', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-20 05:15:33', '2016-04-20 05:15:33', 1, '1fd1481fab65980aa550a31cacb52801'),
(14, NULL, 'Permohonan Registrasi Barang (Meja untuk Ruang Dosen)', '1306382594', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-20 07:24:30', '2016-04-20 07:24:30', 1, '4b4aeb34cb26abda1ca476fcc078d6b6'),
(15, NULL, '1', '1306382594', 1, 2, 5, 1, NULL, NULL, 1, 0, '2016-04-20 14:43:13', '2016-04-20 14:43:13', 0, 'a8f15eda80c50adb0e71943adc8015cf'),
(16, NULL, 'Permohonan Pengadaan Komputer Perpustakaan', '1306464114', 3, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-25 06:34:05', '2016-04-25 06:34:05', 0, ''),
(17, NULL, 'Permohonan Pengadaan Stop Kontak Kantin', '1306464114', 3, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-25 06:34:05', '2016-04-25 06:34:05', 0, ''),
(18, NULL, 'Permohonan Perbaikan Projector Kelas 1101', '1306464114', 4, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-25 06:34:05', '2016-04-25 06:34:05', 0, ''),
(19, NULL, 'Permohonan Perbaikan Laptop ASUS ROG', '1306464114', 4, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-25 06:34:05', '2016-04-25 06:34:05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `IdGed` int(11) NOT NULL,
  `IdRuangan` int(11) NOT NULL,
  `NomorRuangan` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `KapasitasRuangan` int(11) NOT NULL,
  `JenisRuangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `hashRuang` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`IdGed`, `IdRuangan`, `NomorRuangan`, `KapasitasRuangan`, `JenisRuangan`, `deleted`, `hashRuang`, `created_at`, `updated_at`) VALUES
(1, 1, '1301', 250, 'Auditorium', 0, '20d06d00edc5429e065344602981a1e2', '2016-04-14 01:33:55', '2016-04-14 01:33:55'),
(1, 2, '1201', 20, 'RuangRapatBesar', 0, 'cb2d8dd7b31e4b23aaeec0e6281652c4', '2016-04-14 01:33:55', '2016-04-14 01:33:55'),
(1, 3, '1202', 10, 'RuangRapatKecil', 0, '5a50b95d1debe2ea9d3429aa0d147e18', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 4, '1101', 50, 'Kelas', 0, 'f2765184f53d17c793d7f6aa8269b791', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 5, '1102', 50, 'Kelas', 0, '9088a4e2b81183475a66520168599998', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 6, '1103', 50, 'Kelas', 0, 'ceceb5e882409eba738697c743a32bbd', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 7, '1104', 50, 'Kelas', 0, '1a444d8b6fb0232f7b23ce1656b64b37', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 8, '1105', 50, 'Kelas', 0, '5df789195051cc95d3547c611af0fbdc', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 1, '2201', 50, 'Kelas', 0, '54d7b5f781d09eef3b562eb0186b3706', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 2, '2202', 50, 'Kelas', 0, '97e40869fb381308e41aca217be0fd35', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 3, '2203', 50, 'Kelas', 0, '27d483dc94870b96229f267fe407fb77', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 4, '2204', 50, 'Kelas', 0, 'f177fc886ec1672e026eddb11c90c362', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 5, '2205', 50, 'Kelas', 0, '7f035697650a0b1c8a6d0cd810cacc3e', '2016-04-14 01:33:59', '2016-04-14 01:33:59'),
(3, 1, '3101', 20, 'RuangRapatKecil', 0, '949ad7e4ee41c8b2fdac3cade9f5e77e', '2016-04-16 11:28:10', '2016-04-16 11:28:10'),
(3, 2, '3102', 50, 'RuangRapatKecil', 0, '1d4412c5c4c85e05225dad3b95d5ea24', '2016-04-16 11:35:24', '2016-04-16 11:35:24'),
(3, 3, '3103', 300, 'Auditorium', 1, '1c129b852d9c34311f9b7ec1e9607fdd', '2016-04-16 12:04:47', '2016-04-16 12:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NomorInduk` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NoHp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NomorIndukPengelola` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NomorInduk`, `Nama`, `Username`, `Role`, `Email`, `NoHp`, `NomorIndukPengelola`, `remember_token`, `created_at`, `updated_at`) VALUES
('1306000001', 'Mahasiswa 1', 'mahasiswa.1', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306000002', 'Mahasiswa 2', 'mahasiswa.2', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306000003', 'Mahasiswa 3', 'mahasiswa.3', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:31', '2016-04-14 01:33:31'),
('1306000004', 'Mahasiswa 4', 'mahasiswa.4', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:31', '2016-04-14 01:33:31'),
('1306000005', 'Mahasiswa 5', 'mahasiswa.5', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:31', '2016-04-14 01:33:31'),
('1306382594', 'Bima Satria Surya Wardhana', 'bima.satria', 'Mahasiswa', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306404632', 'Nadya Azizah', 'nadya.azizah', 'Staf Fasilitas & Infrastruktur', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306405276', 'Zahra Zuluthfa', 'zahra.zuluthfa', 'Staf PPAA', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306464114', 'Jundi Ahmad Alwan', 'jundi.ahmad', 'Staf', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
('1306464240', 'Sitti Nadindra', 'sitti.nadindra', 'Manajer Fasilitas & Infrastruktur', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `barang_idpermohonan_foreign` (`IdPermohonan`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`IdPermohonan`,`TahapCatatan`),
  ADD KEY `catatan_nomorindukpenulis_foreign` (`NomorIndukPenulis`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`IdGedung`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`IdGedung`,`IdRuangan`,`IdJadwal`);

--
-- Indexes for table `kandidat_barang`
--
ALTER TABLE `kandidat_barang`
  ADD PRIMARY KEY (`IdKandidatBarang`),
  ADD KEY `kandidat_barang_idpermohonan_foreign` (`IdPermohonan`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`IdPermohonan`),
  ADD KEY `permohonan_idpemohon_foreign` (`IdPemohon`),
  ADD KEY `permohonan_idgedung_idruangan_idjadwal_foreign` (`IdGedung`,`IdRuangan`,`IdJadwal`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`IdGed`,`IdRuangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NomorInduk`),
  ADD UNIQUE KEY `users_username_unique` (`Username`),
  ADD KEY `users_nomorindukpengelola_foreign` (`NomorIndukPengelola`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_idpermohonan_foreign` FOREIGN KEY (`IdPermohonan`) REFERENCES `permohonan` (`IdPermohonan`) ON UPDATE CASCADE;

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_idpermohonan_foreign` FOREIGN KEY (`IdPermohonan`) REFERENCES `permohonan` (`IdPermohonan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_nomorindukpenulis_foreign` FOREIGN KEY (`NomorIndukPenulis`) REFERENCES `users` (`NomorInduk`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_idgedung_idruangan_foreign` FOREIGN KEY (`IdGedung`,`IdRuangan`) REFERENCES `ruangan` (`IdGed`, `IdRuangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kandidat_barang`
--
ALTER TABLE `kandidat_barang`
  ADD CONSTRAINT `kandidat_barang_idpermohonan_foreign` FOREIGN KEY (`IdPermohonan`) REFERENCES `permohonan` (`IdPermohonan`) ON UPDATE CASCADE;

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_idgedung_idruangan_idjadwal_foreign` FOREIGN KEY (`IdGedung`,`IdRuangan`,`IdJadwal`) REFERENCES `jadwal` (`IdGedung`, `IdRuangan`, `IdJadwal`),
  ADD CONSTRAINT `permohonan_idpemohon_foreign` FOREIGN KEY (`IdPemohon`) REFERENCES `users` (`NomorInduk`) ON UPDATE CASCADE;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_idgedung_foreign` FOREIGN KEY (`IdGed`) REFERENCES `gedung` (`IdGedung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nomorindukpengelola_foreign` FOREIGN KEY (`NomorIndukPengelola`) REFERENCES `users` (`NomorInduk`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
