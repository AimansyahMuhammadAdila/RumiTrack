-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2026 at 02:51 AM
-- Server version: 9.4.0
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumitrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan_rekomendasi`
--

CREATE TABLE `catatan_rekomendasi` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `kesimpulan` enum('Baik','Cukup Baik','Obesitas','Kekurangan Nutrisi','Inbreeding','Lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Baik',
  `analisis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rekomendasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan_rekomendasi`
--

INSERT INTO `catatan_rekomendasi` (`id`, `user_id`, `bulan`, `tahun`, `kesimpulan`, `analisis`, `rekomendasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2026, 'Baik', 'Kondisi peternakan Januari sangat baik. 8 ternak aktif, tingkat kesehatan 87.5%. Pertumbuhan sapi rata-rata 15 kg/bulan. Penjualan ternak Rp 21.5 juta.', 'Pertahankan program pakan. Lakukan vaksinasi rutin. Siapkan breeding program indukan Mawar. Tingkatkan stok konsentrat menjelang musim kering.', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 2, 2026, 'Cukup Baik', 'Februari ada 1 ternak sakit (Melati - gangguan pencernaan). Pertumbuhan lain stabil. Pemasukan susu kambing mulai berjalan. Biaya pengobatan meningkat.', 'Fokuskan perawatan Melati. Lanjutkan vaksinasi PPR kambing/domba. Tambahkan ampas tahu sebagai protein murah. Evaluasi kualitas jerami padi.', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 3, 2026, 'Baik', 'Maret menunjukkan pemulihan. Penjualan 1 sapi besar Rp 22 juta. Pedet Gagah tumbuh sangat baik (+20 kg/bulan). 5 peranakan baru sejak awal tahun.', 'Optimalkan pakan pedet Gagah. Siapkan kandang tambahan untuk peranakan. Laporkan kondisi Melati ke drh. Rencanakan penjualan kambing cukup umur.', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `dosis_pakan`
--

CREATE TABLE `dosis_pakan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ternak_id` int UNSIGNED NOT NULL,
  `pakan_id` int UNSIGNED NOT NULL,
  `jumlah` decimal(10,2) NOT NULL COMMENT 'Jumlah pakan per pemberian',
  `frekuensi` int NOT NULL DEFAULT '2' COMMENT 'Berapa kali per hari',
  `waktu_pemberian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Contoh: Pagi, Siang, Sore',
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosis_pakan`
--

INSERT INTO `dosis_pakan` (`id`, `user_id`, `ternak_id`, `pakan_id`, `jumlah`, `frekuensi`, `waktu_pemberian`, `tanggal_mulai`, `tanggal_selesai`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 15.00, 2, 'Pagi, Sore', '2026-01-01', NULL, 'Rumput gajah segar', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 1, 3, 3.00, 2, 'Pagi, Sore', '2026-01-01', NULL, 'Konsentrat penggemukan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 2, 1, 12.00, 2, 'Pagi, Sore', '2026-01-01', NULL, 'Pakan harian indukan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 4, 1, 5.00, 3, 'Pagi, Siang, Sore', '2026-02-01', NULL, 'Hijauan kambing', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 4, 4, 1.00, 1, 'Pagi', '2026-02-01', NULL, 'Campuran dedak padi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 3, 1, 14.00, 2, 'Pagi, Sore', '2026-01-15', NULL, 'Pakan utama', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 6, 2, 3.00, 2, 'Pagi, Sore', '2026-02-15', NULL, 'Jerami untuk domba', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `kandang`
--

CREATE TABLE `kandang` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `nama_kandang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_ruminan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Sapi, Kambing, Domba, Kerbau, dll',
  `kode_kandang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_perolehan` date DEFAULT NULL,
  `tujuan` enum('Produksi Daging','Bibit/Reproduksi','Produksi Kulit/Produk Samping','Pemanfaatan Kotoran') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Produksi Daging',
  `kapasitas` int NOT NULL DEFAULT '0',
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandang`
--

INSERT INTO `kandang` (`id`, `user_id`, `nama_kandang`, `jenis_ruminan`, `kode_kandang`, `tanggal_perolehan`, `tujuan`, `kapasitas`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kandang Sapi A', 'Sapi', 'KD-001', '2025-01-15', 'Produksi Daging', 20, 'Kandang utama sapi potong', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 'Kandang Sapi B', 'Sapi', 'KD-002', '2025-03-10', 'Bibit/Reproduksi', 15, 'Kandang sapi indukan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 'Kandang Kambing', 'Kambing', 'KD-003', '2025-06-01', 'Produksi Daging', 30, 'Kandang kambing etawa', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 'Kandang Domba', 'Domba', 'KD-004', '2025-08-20', 'Produksi Daging', 25, 'Kandang domba garut', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ternak_id` int UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` enum('Sehat','Sakit','Dalam Perawatan','Sembuh') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sehat',
  `gejala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `diagnosa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penanganan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `obat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `biaya` decimal(12,2) NOT NULL DEFAULT '0.00',
  `dokter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`id`, `user_id`, `ternak_id`, `tanggal`, `kondisi`, `gejala`, `diagnosa`, `penanganan`, `obat`, `biaya`, `dokter`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-01-10', 'Sehat', NULL, 'Sehat', 'Pemeriksaan rutin bulanan', NULL, 0.00, 'drh. Budi Santoso', 'Kondisi prima', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 2, '2026-01-10', 'Sehat', NULL, 'Sehat', 'Pemeriksaan rutin', NULL, 0.00, 'drh. Budi Santoso', 'Indukan sehat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 7, '2026-02-20', 'Sakit', 'Nafsu makan menurun, lesu, diare', 'Gangguan pencernaan', 'Pemberian obat anti diare dan vitamin', 'Entrostop Vet, Vit B', 150000.00, 'drh. Budi Santoso', 'Perlu monitoring lanjutan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 7, '2026-03-01', 'Dalam Perawatan', 'Masih lesu', 'Gangguan pencernaan', 'Lanjutan pengobatan, tambah probiotik', 'Probiotik, Vit B', 100000.00, 'drh. Budi Santoso', 'Kondisi membaik', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 4, '2026-02-05', 'Sehat', NULL, 'Sehat', 'Pemeriksaan rutin kambing', NULL, 0.00, 'drh. Siti Aminah', 'Kambing sehat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 5, '2026-01-20', 'Sakit', 'Kaki pincang', 'Radang sendi', 'Pemberian anti radang', 'Dexamethasone', 75000.00, 'drh. Siti Aminah', 'Sembuh 1 minggu', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 5, '2026-01-28', 'Sembuh', NULL, 'Radang sendi sembuh', 'Pemeriksaan kontrol', NULL, 0.00, 'drh. Siti Aminah', 'Berjalan normal', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pemasukan',
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL DEFAULT '0.00',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `user_id`, `tanggal`, `jenis`, `kategori`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-01-05', 'Pemasukan', 'Penjualan Ternak', 18000000.00, 'Penjualan 1 ekor sapi potong', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, '2026-01-20', 'Pemasukan', 'Penjualan Ternak', 3500000.00, 'Penjualan 2 ekor kambing', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, '2026-02-15', 'Pemasukan', 'Penjualan Susu', 2400000.00, 'Penjualan susu kambing 80 liter', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, '2026-02-28', 'Pemasukan', 'Penjualan Kotoran', 500000.00, 'Penjualan pupuk kandang', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, '2026-03-01', 'Pemasukan', 'Penjualan Ternak', 22000000.00, 'Penjualan 1 ekor sapi besar', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, '2026-01-02', 'Pengeluaran', 'Pakan', 2500000.00, 'Pembelian rumput gajah dan konsentrat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, '2026-01-10', 'Pengeluaran', 'Kesehatan', 500000.00, 'Biaya pemeriksaan rutin drh. Budi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(8, 1, '2026-01-25', 'Pengeluaran', 'Operasional', 750000.00, 'Gaji penjaga kandang', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(9, 1, '2026-02-02', 'Pengeluaran', 'Pakan', 3000000.00, 'Stok pakan bulanan Februari', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(10, 1, '2026-02-20', 'Pengeluaran', 'Kesehatan', 250000.00, 'Biaya pengobatan Melati', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(11, 1, '2026-02-25', 'Pengeluaran', 'Operasional', 750000.00, 'Gaji penjaga kandang Februari', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(12, 1, '2026-03-02', 'Pengeluaran', 'Pakan', 2800000.00, 'Stok pakan Maret', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-02-14-110000', 'App\\Database\\Migrations\\CreateTernak', 'default', 'App', 1771040850, 1),
(2, '2026-02-14-110001', 'App\\Database\\Migrations\\CreatePakan', 'default', 'App', 1771040850, 1),
(3, '2026-02-14-110002', 'App\\Database\\Migrations\\CreateDosisPakan', 'default', 'App', 1771040850, 1),
(4, '2026-02-14-110003', 'App\\Database\\Migrations\\CreatePertumbuhan', 'default', 'App', 1771040850, 1),
(5, '2026-02-14-110004', 'App\\Database\\Migrations\\CreateKesehatan', 'default', 'App', 1771040850, 1),
(6, '2026-03-07-060000', 'App\\Database\\Migrations\\CreateKandang', 'default', 'App', 1772866929, 2),
(7, '2026-03-07-060005', 'App\\Database\\Migrations\\CreatePeranakan', 'default', 'App', 1772866929, 2),
(8, '2026-03-07-060010', 'App\\Database\\Migrations\\CreateKeuangan', 'default', 'App', 1772866929, 2),
(9, '2026-03-07-060015', 'App\\Database\\Migrations\\CreatePengeluaranPakan', 'default', 'App', 1772866929, 2),
(10, '2026-03-07-060020', 'App\\Database\\Migrations\\CreateVaksin', 'default', 'App', 1772866929, 2),
(11, '2026-03-07-060025', 'App\\Database\\Migrations\\CreatePengobatan', 'default', 'App', 1772866929, 2),
(12, '2026-03-07-060030', 'App\\Database\\Migrations\\CreateCatatanRekomendasi', 'default', 'App', 1772866929, 2),
(13, '2026-03-08-020000', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1772937893, 3),
(14, '2026-03-08-040000', 'App\\Database\\Migrations\\AddUserIdToAllTables', 'default', 'App', 1772943297, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pakan`
--

CREATE TABLE `pakan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `nama_pakan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Hijauan, Konsentrat, Vitamin, dll',
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'kg',
  `harga_per_satuan` decimal(12,2) NOT NULL DEFAULT '0.00',
  `stok` decimal(10,2) NOT NULL DEFAULT '0.00',
  `protein` decimal(5,2) DEFAULT NULL COMMENT 'Persentase protein',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakan`
--

INSERT INTO `pakan` (`id`, `user_id`, `nama_pakan`, `jenis`, `satuan`, `harga_per_satuan`, `stok`, `protein`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rumput Gajah', 'Hijauan', 'kg', 1500.00, 500.00, 8.50, 'Hijauan utama untuk ruminansia', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 'Jerami Padi', 'Hijauan', 'kg', 800.00, 300.00, 4.50, 'Pakan serat tinggi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 'Konsentrat Sapi', 'Konsentrat', 'kg', 5000.00, 200.00, 18.00, 'Konsentrat protein tinggi untuk sapi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 'Dedak Padi', 'Konsentrat', 'kg', 3000.00, 150.00, 12.00, 'Bahan campuran konsentrat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 'Mineral Block', 'Vitamin', 'pcs', 25000.00, 20.00, NULL, 'Suplemen mineral jilat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 'Ampas Tahu', 'Konsentrat', 'kg', 2000.00, 100.00, 23.00, 'Sumber protein nabati murah', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_pakan`
--

CREATE TABLE `pengeluaran_pakan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `pakan_id` int UNSIGNED NOT NULL,
  `jumlah` decimal(10,2) NOT NULL DEFAULT '0.00',
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'kg',
  `tanggal` date NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran_pakan`
--

INSERT INTO `pengeluaran_pakan` (`id`, `user_id`, `pakan_id`, `jumlah`, `satuan`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50.00, 'kg', '2026-01-05', 'Pemberian mingguan sapi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 3, 10.00, 'kg', '2026-01-05', 'Konsentrat harian', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 1, 50.00, 'kg', '2026-01-12', 'Pemberian mingguan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 2, 20.00, 'kg', '2026-01-15', 'Jerami untuk domba', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 4, 15.00, 'kg', '2026-02-01', 'Dedak padi campuran', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 1, 60.00, 'kg', '2026-02-01', 'Rumput gajah mingguan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 6, 25.00, 'kg', '2026-02-10', 'Ampas tahu protein tinggi', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(8, 1, 5, 3.00, 'pcs', '2026-02-15', 'Mineral block untuk kandang', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ternak_id` int UNSIGNED NOT NULL,
  `jenis_pengobatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dosis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengobatan`
--

INSERT INTO `pengobatan` (`id`, `user_id`, `ternak_id`, `jenis_pengobatan`, `dosis`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Obat anti diare', '10 ml 2x/hari', '2026-02-20', 'Diare akut, 5 hari', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 7, 'Vitamin B Complex', '5 ml injeksi', '2026-02-20', 'Penambah nafsu makan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 7, 'Probiotik', '15 ml oral', '2026-03-01', 'Lanjutan pemulihan pencernaan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 5, 'Dexamethasone', '3 ml injeksi', '2026-01-20', 'Anti radang sendi kaki depan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 5, 'Vitamin ADE', '2 ml injeksi', '2026-01-20', 'Suplemen pemulihan', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `peranakan`
--

CREATE TABLE `peranakan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `kandang_id` int UNSIGNED NOT NULL,
  `kode_ternak` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_ruminan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Jantan','Betina') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Jantan',
  `tanggal_perolehan` date DEFAULT NULL,
  `umur_bulan` int NOT NULL DEFAULT '0' COMMENT 'Umur dalam bulan',
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peranakan`
--

INSERT INTO `peranakan` (`id`, `user_id`, `kandang_id`, `kode_ternak`, `jenis_ruminan`, `jenis_kelamin`, `tanggal_perolehan`, `umur_bulan`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PNK-001', 'Sapi', 'Jantan', '2026-01-20', 2, 'Anak dari Mawar (SPB-002)', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 1, 'PNK-002', 'Sapi', 'Betina', '2026-02-10', 1, 'Anak dari Melati (SPB-004)', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 3, 'PNK-003', 'Kambing', 'Betina', '2026-01-05', 3, 'Anak kambing etawa betina', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 3, 'PNK-004', 'Kambing', 'Jantan', '2026-01-05', 3, 'Anak kambing etawa jantan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 4, 'PNK-005', 'Domba', 'Jantan', '2026-02-28', 1, 'Anak domba garut', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `pertumbuhan`
--

CREATE TABLE `pertumbuhan` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ternak_id` int UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `berat` decimal(10,2) NOT NULL COMMENT 'Berat dalam kg',
  `tinggi` decimal(10,2) DEFAULT NULL COMMENT 'Tinggi dalam cm',
  `lingkar_dada` decimal(10,2) DEFAULT NULL COMMENT 'Lingkar dada dalam cm',
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertumbuhan`
--

INSERT INTO `pertumbuhan` (`id`, `user_id`, `ternak_id`, `tanggal`, `berat`, `tinggi`, `lingkar_dada`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-01-01', 355.00, 135.00, 180.00, 'Pengukuran awal tahun', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 1, '2026-02-01', 370.00, 136.00, 182.00, 'Pertumbuhan bagus', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 1, '2026-03-01', 388.00, 137.00, 185.00, 'Naik 18 kg', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 2, '2026-01-01', 285.00, 128.00, 165.00, 'Pengukuran bulanan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 2, '2026-02-01', 290.00, 128.50, 166.00, 'Stabil', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 4, '2026-01-15', 48.00, 65.00, 70.00, 'Kambing sehat', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 4, '2026-02-15', 52.00, 66.50, 72.00, 'Pertumbuhan normal', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(8, 1, 6, '2026-02-01', 42.00, 60.00, 65.00, 'Domba garut', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(9, 1, 8, '2026-02-01', 160.00, 105.00, 130.00, 'Pedet berkembang baik', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(10, 1, 8, '2026-03-01', 180.00, 110.00, 138.00, 'Naik 20 kg dalam sebulan', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `ternak`
--

CREATE TABLE `ternak` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `kode_ternak` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Sapi, Kambing, Ayam, Domba, dll',
  `ras` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('Jantan','Betina') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Jantan',
  `tanggal_lahir` date DEFAULT NULL,
  `berat_awal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'dalam kg',
  `status` enum('Aktif','Sakit','Terjual','Mati') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Aktif',
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ternak`
--

INSERT INTO `ternak` (`id`, `user_id`, `kode_ternak`, `nama`, `jenis`, `ras`, `jenis_kelamin`, `tanggal_lahir`, `berat_awal`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'SPJ-001', 'Banteng', 'Sapi', 'Limousin', 'Jantan', '2024-02-10', 350.00, 'Aktif', 'Sapi jantan unggulan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 'SPB-002', 'Mawar', 'Sapi', 'Simmental', 'Betina', '2023-08-15', 280.00, 'Aktif', 'Indukan produktif', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 'SPJ-003', 'Kebo', 'Sapi', 'Brahman Cross', 'Jantan', '2024-05-20', 320.00, 'Aktif', 'Sapi potong', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 'KMB-001', 'Putih', 'Kambing', 'Etawa', 'Betina', '2024-01-05', 45.00, 'Aktif', 'Kambing etawa betina', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 'KMJ-002', 'Hitam', 'Kambing', 'Etawa', 'Jantan', '2023-11-12', 55.00, 'Aktif', 'Pejantan kambing etawa', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 'DMB-001', 'Si Garut', 'Domba', 'Garut', 'Jantan', '2024-03-18', 40.00, 'Aktif', 'Domba garut jantan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 'SPB-004', 'Melati', 'Sapi', 'Limousin', 'Betina', '2024-07-01', 260.00, 'Sakit', 'Sedang dalam perawatan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(8, 1, 'SPJ-005', 'Gagah', 'Sapi', 'Simmental', 'Jantan', '2025-01-10', 150.00, 'Aktif', 'Pedet baru', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@smart-ternak.com', 'admin', '$2y$12$ZD7cOPag6L.Jc9t9rgJg7OCRe6aJFvM3vbkFWZpk2BeMeWwrc/vSC', '2026-03-08 02:47:11', '2026-03-08 02:47:11'),
(2, 'aiman', 'aiman@gmail.com', 'aimang', '$2y$12$PkV7zXoQERBLicWWjjtHpeVNuczmpQKlrPEPV3ixjJFEdfe6DOeTC', '2026-03-08 02:51:00', '2026-03-08 02:51:00'),
(3, 'super admin', 'superadmin@gmail.com', 'superadmin', '$2y$12$u30EFQ8l9pX74sf8.bLrWeX0POh5b5RKNVLi6zaUwjfRPaeI3Hak2', '2026-03-08 04:22:00', '2026-03-08 04:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ternak_id` int UNSIGNED NOT NULL,
  `jenis_vaksin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dosis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id`, `user_id`, `ternak_id`, `jenis_vaksin`, `dosis`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Vaksin SE', '2 ml', '2026-01-15', 'Vaksin SE rutin tahunan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(2, 1, 2, 'Vaksin SE', '2 ml', '2026-01-15', 'Vaksin SE rutin', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(3, 1, 3, 'Vaksin SE', '2 ml', '2026-01-15', 'Vaksin SE rutin', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(4, 1, 1, 'Vaksin Antraks', '1 ml', '2026-02-10', 'Vaksin antraks tahunan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(5, 1, 4, 'Vaksin PPR', '1 ml', '2026-02-05', 'Vaksin PPR untuk kambing', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(6, 1, 5, 'Vaksin PPR', '1 ml', '2026-02-05', 'Vaksin PPR kambing jantan', '2026-03-08 04:15:05', '2026-03-08 04:15:05'),
(7, 1, 6, 'Vaksin PPR', '1 ml', '2026-02-20', 'Vaksin PPR untuk domba', '2026-03-08 04:15:05', '2026-03-08 04:15:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_rekomendasi`
--
ALTER TABLE `catatan_rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosis_pakan`
--
ALTER TABLE `dosis_pakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosis_pakan_ternak_id_foreign` (`ternak_id`),
  ADD KEY `dosis_pakan_pakan_id_foreign` (`pakan_id`);

--
-- Indexes for table `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kandang` (`kode_kandang`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kesehatan_ternak_id_foreign` (`ternak_id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakan`
--
ALTER TABLE `pakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran_pakan`
--
ALTER TABLE `pengeluaran_pakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluaran_pakan_pakan_id_foreign` (`pakan_id`);

--
-- Indexes for table `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengobatan_ternak_id_foreign` (`ternak_id`);

--
-- Indexes for table `peranakan`
--
ALTER TABLE `peranakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peranakan_kandang_id_foreign` (`kandang_id`);

--
-- Indexes for table `pertumbuhan`
--
ALTER TABLE `pertumbuhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertumbuhan_ternak_id_foreign` (`ternak_id`);

--
-- Indexes for table `ternak`
--
ALTER TABLE `ternak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_ternak` (`kode_ternak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaksin_ternak_id_foreign` (`ternak_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_rekomendasi`
--
ALTER TABLE `catatan_rekomendasi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosis_pakan`
--
ALTER TABLE `dosis_pakan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pakan`
--
ALTER TABLE `pakan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran_pakan`
--
ALTER TABLE `pengeluaran_pakan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peranakan`
--
ALTER TABLE `peranakan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pertumbuhan`
--
ALTER TABLE `pertumbuhan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ternak`
--
ALTER TABLE `ternak`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosis_pakan`
--
ALTER TABLE `dosis_pakan`
  ADD CONSTRAINT `dosis_pakan_pakan_id_foreign` FOREIGN KEY (`pakan_id`) REFERENCES `pakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosis_pakan_ternak_id_foreign` FOREIGN KEY (`ternak_id`) REFERENCES `ternak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD CONSTRAINT `kesehatan_ternak_id_foreign` FOREIGN KEY (`ternak_id`) REFERENCES `ternak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran_pakan`
--
ALTER TABLE `pengeluaran_pakan`
  ADD CONSTRAINT `pengeluaran_pakan_pakan_id_foreign` FOREIGN KEY (`pakan_id`) REFERENCES `pakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD CONSTRAINT `pengobatan_ternak_id_foreign` FOREIGN KEY (`ternak_id`) REFERENCES `ternak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peranakan`
--
ALTER TABLE `peranakan`
  ADD CONSTRAINT `peranakan_kandang_id_foreign` FOREIGN KEY (`kandang_id`) REFERENCES `kandang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertumbuhan`
--
ALTER TABLE `pertumbuhan`
  ADD CONSTRAINT `pertumbuhan_ternak_id_foreign` FOREIGN KEY (`ternak_id`) REFERENCES `ternak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD CONSTRAINT `vaksin_ternak_id_foreign` FOREIGN KEY (`ternak_id`) REFERENCES `ternak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
