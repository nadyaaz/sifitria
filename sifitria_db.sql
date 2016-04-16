-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 02:22 AM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `JenisBarang`, `SpesifikasiBarang`, `TanggalBeli`, `Penanggungjawab`, `KategoriBarang`, `KondisiBarang`, `KeteranganBarang`, `NomorBarcode`, `WaktuRegistrasi`, `KerusakanBarang`, `IdPermohonan`, `created_at`, `updated_at`) VALUES
(1, 'Projector 1101', 'Projector', 'Projector untuk ruang kelas 1101', '2016-04-14 23:46:41', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Elektronik', 'Baik', NULL, NULL, NULL, NULL, NULL, '2016-04-14 23:45:59', '2016-04-14 23:45:59'),
(2, 'Projector 1102', 'Projector', 'Projector untuk ruang kelas 1102', '2016-03-31 17:00:00', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Elektronik', 'Baik', NULL, NULL, NULL, NULL, NULL, '2016-04-14 23:45:59', '2016-04-14 23:45:59'),
(3, 'Meja 1101', 'Meja', 'Meja Pengajar untuk ruang kelas 1101', '2016-03-31 17:00:00', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Furnitur', 'Baik', NULL, NULL, NULL, NULL, NULL, '2016-04-14 23:48:25', '2016-04-14 23:48:25'),
(4, 'Meja 1102', 'Meja', 'Meja Pengajar untuk ruang kelas 1102', '2016-03-31 17:00:00', 'Sitti Nadindra (Manajer Fasilitas & Infrastruktur)', 'Furnitur', 'Baik', NULL, NULL, NULL, NULL, NULL, '2016-04-14 23:48:25', '2016-04-14 23:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `IdPermohonan` int(11) NOT NULL,
  `TahapCatatan` int(11) NOT NULL,
  `DeskripsiCatatan` text COLLATE utf8_unicode_ci,
  `NomorIndukPenulis` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`IdPermohonan`, `TahapCatatan`, `DeskripsiCatatan`, `NomorIndukPenulis`, `created_at`, `updated_at`) VALUES
(5, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '2016-04-14 23:49:42', NULL),
(6, 1, 'Peminjaman Ruangan harus diajukan minimal satu minggu sebelum acara.', '1306382594', '2016-04-14 23:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `IdGedung` int(11) NOT NULL,
  `Nama` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`IdGedung`, `Nama`, `created_at`, `updated_at`) VALUES
(1, 'Gedung G', '2016-04-14 01:33:42', '2016-04-14 01:33:42'),
(2, 'Gedung M', '2016-04-14 01:33:43', '2016-04-14 01:33:43');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`IdGedung`, `IdRuangan`, `IdJadwal`, `WaktuMulai`, `WaktuSelesai`, `KeperluanPeminjaman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-04-18 06:00:00', '2016-04-18 08:00:00', 'Dies Natalis Fakultas Ilmu Administrasi', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 2, '2016-04-18 12:30:00', '2016-04-18 14:30:00', 'Grand Launching BEM FIA 2016', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 3, '2016-04-20 12:30:00', '2016-04-20 14:30:00', 'Grand Launching DPM FIA 2016', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 1, 4, '2016-04-23 02:00:00', '2016-04-20 10:00:00', 'Training Kependidikan Dosen FIA 2016', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 1, '2016-04-18 02:00:00', '2016-04-18 03:00:00', 'Rapat Internal Divisi Fasilitas & Infrastruktur', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 2, '2016-04-18 03:00:00', '2016-04-18 05:00:00', 'Rapat Internal Divisi Pengadaan', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 3, '2016-04-23 03:00:00', '2016-04-23 05:00:00', 'Rapat Perdana BEM FIA 2016', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 2, 4, '2016-04-23 06:00:00', '2016-04-23 09:00:00', 'Rapat Perdana DPM FIA 2016', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 1, '2016-04-18 02:00:00', '2016-04-18 05:00:00', 'Rapat Internal Staf Sekretariat', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 2, '2016-04-18 12:00:00', '2016-04-18 14:00:00', 'Rapat BPH BEM FIA', '2016-04-14 01:47:28', '2016-04-14 01:47:28'),
(1, 3, 3, '2016-04-15 12:00:00', '2016-04-15 14:00:00', 'Rapat BPH BEM FIA', '2016-04-14 01:47:28', '2016-04-14 01:47:28');

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
  `TanggalBeli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SpesifikasiBarang` text COLLATE utf8_unicode_ci NOT NULL,
  `IdPermohonan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kandidat_barang`
--

INSERT INTO `kandidat_barang` (`IdKandidatBarang`, `NamaBarang`, `JenisBarang`, `KategoriBarang`, `KeteranganBarang`, `KondisiBarang`, `Penanggungjawab`, `TanggalBeli`, `SpesifikasiBarang`, `IdPermohonan`, `created_at`, `updated_at`) VALUES
(1, 'Laptop BEM', 'Elektronik', 'Laptop', 'Laptop ini dipakai untuk kepeluan kesekretariatan BEM FIA. ', 'Baru', 'Ketua BEM (Mahasiswa 1 - 1300000001)', '2016-04-14 09:43:11', 'Laptop ASUS A46CB', 7, '2016-04-14 09:39:56', '2016-04-14 09:39:56'),
(2, 'Papan Tulis Ruang BEM', 'Furnitur', 'Papan Tulis', 'Papan Tulis ini digunakan untuk keperluan rapat BEM.', 'Baru', 'Ketua BEM (Mahasiswa 1 - 1300000001)', '2016-04-11 17:00:00', 'Papan Tulis beli di Gramedia Margonda Depok', 8, '2016-04-14 09:39:56', '2016-04-14 09:39:56'),
(3, 'Meja', 'Furnitur', 'Meja', 'Meja ini digunakan untuk membantu kegiatan kesekretariatan BEM FIA', 'Baru', 'Sekretaris BEM (Mahasiswa 2 - 1300000002)', '2016-04-11 17:00:00', 'Meja beli di Gramedia Margonda Depok', 9, '2016-04-14 09:39:56', '2016-04-14 09:39:56');

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
  `TahapPermohonan` int(11) NOT NULL,
  `StatusPermohonan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `Hash` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`IdPermohonan`, `NomorSurat`, `SubjekPermohonan`, `IdPemohon`, `JenisPermohonan`, `IdGedung`, `IdRuangan`, `IdJadwal`, `LinkAnggaran`, `LinkSuratDisposisi`, `TahapPermohonan`, `StatusPermohonan`, `created_at`, `updated_at`, `deleted`, `Hash`) VALUES
(1, 'SIFITRIA/2016/04/01', 'Peminjaman Auditorium', '1306000001', 1, 1, 1, 2, NULL, NULL, 1, 2, '2016-04-14 09:17:08', '2016-04-14 09:17:08', 0, '15b57022e3bf4eb116898ed92e99eedf'),
(2, 'SIFITRIA/2016/04/02', 'Peminjaman Auditorium', '1306000003', 1, 1, 1, 3, NULL, NULL, 1, 0, '2016-04-14 09:19:39', '2016-04-14 09:19:39', 0, 'ce100643cb931c8e539441845f2c8583'),
(3, 'SIFITRIA/2016/04/03', 'Peminjaman Ruang Rapat Besar', '1306000001', 1, 1, 2, 3, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'e5d02116a04736161a1784cb7652bc0d'),
(4, 'SIFITRIA/2016/04/04', 'Peminjaman Ruang Rapat Besar', '1306000003', 1, 1, 2, 4, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '924c3ee94936465b8d47c54f966247db'),
(5, 'SIFITRIA/2016/04/05', 'Peminjaman Ruang Rapat Kecil', '1306000002', 1, 1, 3, 2, NULL, NULL, 1, 1, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '2c03ffd83b0b3598d848da53f66ef6c2'),
(6, 'SIFITRIA/2016/04/06', 'Peminjaman Ruang Rapat Kecil', '1306000004', 1, 1, 3, 3, NULL, NULL, 1, 1, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, '6f2c6b21ff83bd85f384cd13d5084244'),
(7, 'SIFITRIA/2016/04/07', 'Registrasi Laptop Baru Sekre', '1306405276', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'fbfd05d712aebe8f52c37433d01c9b55'),
(8, 'SIFITRIA/2016/04/08', 'Registrasi Barang Papan Tulis untuk Ruang BEM', '1306000002', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'c30088da2f6f5ccd55be75d606d5b0a5'),
(9, 'SIFITRIA/2016/04/09', 'Registrasi Barang Meja untuk Ruang BEM', '1306000002', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2016-04-14 09:21:22', '2016-04-14 09:21:22', 0, 'c2329d40c55abfd91dfc76cf92b5beaf');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `IdGedung` int(11) NOT NULL,
  `IdRuangan` int(11) NOT NULL,
  `NomorRuangan` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `KapasitasRuangan` int(11) NOT NULL,
  `JenisRuangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`IdGedung`, `IdRuangan`, `NomorRuangan`, `KapasitasRuangan`, `JenisRuangan`, `created_at`, `updated_at`) VALUES
(1, 1, '1301', 250, 'Auditorium', '2016-04-14 01:33:55', '2016-04-14 01:33:55'),
(1, 2, '1201', 20, 'RuangRapatBesar', '2016-04-14 01:33:55', '2016-04-14 01:33:55'),
(1, 3, '1202', 10, 'RuangRapatKecil', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 4, '1101', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 5, '1102', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 6, '1103', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 7, '1104', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(1, 8, '1105', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 1, '2201', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 2, '2202', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 3, '2203', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 4, '2204', 50, 'Kelas', '2016-04-14 01:33:56', '2016-04-14 01:33:56'),
(2, 5, '2205', 50, 'Kelas', '2016-04-14 01:33:59', '2016-04-14 01:33:59');

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
('1306382594', 'Bima Satria Surya Wardhana', 'bima.satria', 'Staf Sekretariat', '', '', NULL, NULL, '2016-04-14 01:33:30', '2016-04-14 01:33:30'),
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
  ADD PRIMARY KEY (`IdGedung`,`IdRuangan`);

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
  ADD CONSTRAINT `jadwal_idgedung_idruangan_foreign` FOREIGN KEY (`IdGedung`,`IdRuangan`) REFERENCES `ruangan` (`IdGedung`, `IdRuangan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ruangan_idgedung_foreign` FOREIGN KEY (`IdGedung`) REFERENCES `gedung` (`IdGedung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nomorindukpengelola_foreign` FOREIGN KEY (`NomorIndukPengelola`) REFERENCES `users` (`NomorInduk`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
