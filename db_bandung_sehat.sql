-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2026 pada 17.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bandung_sehat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_bandung_sehat`
--

CREATE TABLE `forum_bandung_sehat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_bandung_sehat_foto`
--

CREATE TABLE `forum_bandung_sehat_foto` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `ukuran_file` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_bandung_sehat_realisasi`
--

CREATE TABLE `forum_bandung_sehat_realisasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) NOT NULL DEFAULT 0.00,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_bandung_sehat_rencana_kerja`
--

CREATE TABLE `forum_bandung_sehat_rencana_kerja` (
  `id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `data_rencana` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_bandung_sehat_sk`
--

CREATE TABLE `forum_bandung_sehat_sk` (
  `id` int(11) UNSIGNED NOT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `forum_bandung_sehat_sk`
--

INSERT INTO `forum_bandung_sehat_sk` (`id`, `no_sk`, `periode`, `keterangan`, `nama_file`, `nama_asli`, `file_path`, `ukuran_file`, `created_at`, `updated_at`) VALUES
(1, '123/kep/BS/2026', '2030-2035', 'Surat', '1790149237_804ccdfdd97a8f78eb3e.pdf', 'Surat pernyataan ijin KP.pdf', 'uploads/forum_bandung_sehat_sk/1790149237_804ccdfdd97a8f78eb3e.pdf', 612078, '2026-09-23 07:40:37', '2026-09-23 07:40:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kecamatan_sehat`
--

CREATE TABLE `forum_kecamatan_sehat` (
  `id` int(10) UNSIGNED NOT NULL,
  `kecamatan_id` int(10) UNSIGNED NOT NULL,
  `nama_forum` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ketua` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kecamatan_sehat_foto`
--

CREATE TABLE `forum_kecamatan_sehat_foto` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kecamatan_sehat_realisasi`
--

CREATE TABLE `forum_kecamatan_sehat_realisasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) NOT NULL DEFAULT 0.00,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `forum_kecamatan_sehat_realisasi`
--

INSERT INTO `forum_kecamatan_sehat_realisasi` (`id`, `kecamatan_id`, `tahun`, `nama_kegiatan`, `waktu_kegiatan`, `peserta`, `hasil_pelaksanaan`, `anggaran`, `sumber_pendanaan`, `link_drive`, `data_dukung`, `created_at`, `updated_at`) VALUES
(1, 1, '2030', 'Rapar RAT', '2026-09-22', '25 Peserta', 'RAT', 500000.00, 'APBD Kota', 'https://drive.google.com/drive/u/0/folders/19X4hU-8QVmnwm1ZsAJnreRnlT3B7GTmN', 'surat undangan', '2026-09-21 16:11:07', '2026-09-21 16:11:07'),
(2, 18, '2050', 'Rapar Pari Purna', '2026-09-30', '200 Peserta', 'Rapat', 100000000.00, 'DAK', 'https://drive.google.com/drive/u/0/folders/19X4hU-8QVmnwm1ZsAJnreRnlT3B7GTmN', 'Foto', '2026-09-21 16:37:48', '2026-09-21 16:37:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kecamatan_sehat_rencana_kerja`
--

CREATE TABLE `forum_kecamatan_sehat_rencana_kerja` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` bigint(20) UNSIGNED DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `data_rencana` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `forum_kecamatan_sehat_rencana_kerja`
--

INSERT INTO `forum_kecamatan_sehat_rencana_kerja` (`id`, `kecamatan_id`, `tahun`, `nama_kegiatan`, `waktu_kegiatan`, `peserta`, `hasil_pelaksanaan`, `anggaran`, `sumber_pendanaan`, `link_drive`, `data_dukung`, `data_rencana`, `created_at`, `updated_at`) VALUES
(1, 17, '2050', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kerja nyata', '2026-09-21 14:33:06', '2026-09-21 14:33:06'),
(2, 3, '2030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kerja', '2026-09-21 14:33:57', '2026-09-21 14:33:57'),
(3, 1, '2030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rapat', '2026-09-21 16:08:04', '2026-09-21 16:08:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_kecamatan_sk`
--

CREATE TABLE `forum_kecamatan_sk` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_before_after`
--

CREATE TABLE `foto_before_after` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `foto_before` varchar(255) DEFAULT NULL,
  `foto_after` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inovasi`
--

CREATE TABLE `inovasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_inovasi` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kode`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, '32.73.05', 'Andir', NULL, NULL),
(2, '32.73.10', 'Astana Anyar', NULL, NULL),
(3, '32.73.20', 'Antapani', NULL, NULL),
(4, '32.73.24', 'Arcamanik', NULL, NULL),
(5, '32.73.03', 'Babakan Ciparay', NULL, NULL),
(6, '32.73.21', 'Bandung Kidul', NULL, NULL),
(7, '32.73.15', 'Bandung Kulon', NULL, NULL),
(8, '32.73.09', 'Bandung Wetan', NULL, NULL),
(9, '32.73.12', 'Batununggal', NULL, NULL),
(10, '32.73.04', 'Bojongloa Kaler', NULL, NULL),
(11, '32.73.17', 'Bojongloa Kidul', NULL, NULL),
(12, '32.73.22', 'Buahbatu', NULL, NULL),
(13, '32.73.18', 'Cibeunying Kaler', NULL, NULL),
(14, '32.73.14', 'Cibeunying Kidul', NULL, NULL),
(15, '32.73.25', 'Cibiru', NULL, NULL),
(16, '32.73.06', 'Cicendo', NULL, NULL),
(17, '32.73.08', 'Cidadap', NULL, NULL),
(18, '32.73.29', 'Cinambo', NULL, NULL),
(19, '32.73.02', 'Coblong', NULL, NULL),
(20, '32.73.27', 'Gedebage', NULL, NULL),
(21, '32.73.16', 'Kiaracondong', NULL, NULL),
(22, '32.73.13', 'Lengkong', NULL, NULL),
(23, '32.73.30', 'Mandalajati', NULL, NULL),
(24, '32.73.28', 'Panyileukan', NULL, NULL),
(25, '32.73.23', 'Rancasari', NULL, NULL),
(26, '32.73.11', 'Regol', NULL, NULL),
(27, '32.73.07', 'Sukajadi', NULL, NULL),
(28, '32.73.01', 'Sukasari', NULL, NULL),
(29, '32.73.19', 'Sumur Bandung', NULL, NULL),
(30, '32.73.26', 'Ujungberung', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kecamatan_id` int(10) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kecamatan_id`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Campaka', NULL, NULL),
(2, 1, 'Ciroyom', NULL, NULL),
(3, 1, 'Dunguscariang', NULL, NULL),
(4, 1, 'Garuda', NULL, NULL),
(5, 1, 'Kebonjeruk', NULL, NULL),
(6, 1, 'Maleber', NULL, NULL),
(7, 2, 'Cibadak', NULL, NULL),
(8, 2, 'Karanganyar', NULL, NULL),
(9, 2, 'Karasak', NULL, NULL),
(10, 2, 'Nyengseret', NULL, NULL),
(11, 2, 'Panjunan', NULL, NULL),
(12, 2, 'Pelindunghewan', NULL, NULL),
(13, 3, 'Antapani Kidul', NULL, NULL),
(14, 3, 'Antapani Kulon', NULL, NULL),
(15, 3, 'Antapani Tengah', NULL, NULL),
(16, 3, 'Antapani Wetan', NULL, NULL),
(17, 4, 'Cisaranten Bina Harapan', NULL, NULL),
(18, 4, 'Cisaranten Endah', NULL, NULL),
(19, 4, 'Cisaranten Kulon', NULL, NULL),
(20, 4, 'Sukamiskin', NULL, NULL),
(21, 5, 'Babakan', NULL, NULL),
(22, 5, 'Babakanciparay', NULL, NULL),
(23, 5, 'Cirangrang', NULL, NULL),
(24, 5, 'Margahayu Utara', NULL, NULL),
(25, 5, 'Margasuka', NULL, NULL),
(26, 5, 'Sukahaji', NULL, NULL),
(27, 6, 'Batununggal', NULL, NULL),
(28, 6, 'Kujangsari', NULL, NULL),
(29, 6, 'Mengger', NULL, NULL),
(30, 6, 'Wates', NULL, NULL),
(31, 7, 'Caringin', NULL, NULL),
(32, 7, 'Cibuntu', NULL, NULL),
(33, 7, 'Cigondewah Kaler', NULL, NULL),
(34, 7, 'Cigondewah Kidul', NULL, NULL),
(35, 7, 'Cigondewah Rahayu', NULL, NULL),
(36, 7, 'Cijerah', NULL, NULL),
(37, 7, 'Gempolsari', NULL, NULL),
(38, 7, 'Warungmuncang', NULL, NULL),
(39, 8, 'Cihapit', NULL, NULL),
(40, 8, 'Citarum', NULL, NULL),
(41, 8, 'Tamansari', NULL, NULL),
(42, 9, 'Binong', NULL, NULL),
(43, 9, 'Cibangkong', NULL, NULL),
(44, 9, 'Gumuruh', NULL, NULL),
(45, 9, 'Kacapiring', NULL, NULL),
(46, 9, 'Kebongedang', NULL, NULL),
(47, 9, 'Kebonwaru', NULL, NULL),
(48, 9, 'Maleer', NULL, NULL),
(49, 9, 'Samoja', NULL, NULL),
(50, 10, 'Babakan Asih', NULL, NULL),
(51, 10, 'Babakan Tarogong', NULL, NULL),
(52, 10, 'Jamika', NULL, NULL),
(53, 10, 'Kopo', NULL, NULL),
(54, 10, 'Suka Asih', NULL, NULL),
(55, 11, 'Cibaduyut', NULL, NULL),
(56, 11, 'Cibaduyut Kidul', NULL, NULL),
(57, 11, 'Cibaduyut Wetan', NULL, NULL),
(58, 11, 'Kebon Lega', NULL, NULL),
(59, 11, 'Mekarwangi', NULL, NULL),
(60, 11, 'Situsaeur', NULL, NULL),
(61, 12, 'Cijawura', NULL, NULL),
(62, 12, 'Jatisari', NULL, NULL),
(63, 12, 'Margasari', NULL, NULL),
(64, 12, 'Sekejati', NULL, NULL),
(65, 13, 'Cigadung', NULL, NULL),
(66, 13, 'Cihaurgeulis', NULL, NULL),
(67, 13, 'Neglasari', NULL, NULL),
(68, 13, 'Sukaluyu', NULL, NULL),
(69, 14, 'Cicadas', NULL, NULL),
(70, 14, 'Cikutra', NULL, NULL),
(71, 14, 'Padasuka', NULL, NULL),
(72, 14, 'Pasirlayung', NULL, NULL),
(73, 14, 'Sukamaju', NULL, NULL),
(74, 14, 'Sukapada', NULL, NULL),
(75, 15, 'Cipadung', NULL, NULL),
(76, 15, 'Cisurupan', NULL, NULL),
(77, 15, 'Palasari', NULL, NULL),
(78, 15, 'Pasirbiru', NULL, NULL),
(79, 16, 'Arjuna', NULL, NULL),
(80, 16, 'Husen Sastranegara', NULL, NULL),
(81, 16, 'Pajajaran', NULL, NULL),
(82, 16, 'Pamoyanan', NULL, NULL),
(83, 16, 'Pasirkaliki', NULL, NULL),
(84, 16, 'Sukaraja', NULL, NULL),
(85, 17, 'Ciumbuleuit', NULL, NULL),
(86, 17, 'Hegarmanah', NULL, NULL),
(87, 17, 'Ledeng', NULL, NULL),
(88, 18, 'Babakan Penghulu', NULL, NULL),
(89, 18, 'Cisaranten Wetan', NULL, NULL),
(90, 18, 'Pakemitan', NULL, NULL),
(91, 18, 'Sukamulya', NULL, NULL),
(92, 19, 'Cipaganti', NULL, NULL),
(93, 19, 'Dago', NULL, NULL),
(94, 19, 'Lebakgede', NULL, NULL),
(95, 19, 'Lebaksiliwangi', NULL, NULL),
(96, 19, 'Sadangserang', NULL, NULL),
(97, 19, 'Sekeloa', NULL, NULL),
(98, 20, 'Cimincrang', NULL, NULL),
(99, 20, 'Cisaranten Kidul', NULL, NULL),
(100, 20, 'Rancabolang', NULL, NULL),
(101, 20, 'Rancanumpang', NULL, NULL),
(102, 21, 'Babakansari', NULL, NULL),
(103, 21, 'Babakansurabaya', NULL, NULL),
(104, 21, 'Cicaheum', NULL, NULL),
(105, 21, 'Kebonkangkung', NULL, NULL),
(106, 21, 'Kebunjayanti', NULL, NULL),
(107, 21, 'Sukapura', NULL, NULL),
(108, 22, 'Burangrang', NULL, NULL),
(109, 22, 'Cijagra', NULL, NULL),
(110, 22, 'Cikawao', NULL, NULL),
(111, 22, 'Lingkar Selatan', NULL, NULL),
(112, 22, 'Malabar', NULL, NULL),
(113, 22, 'Paledang', NULL, NULL),
(114, 22, 'Turangga', NULL, NULL),
(115, 23, 'Jatihandap', NULL, NULL),
(116, 23, 'Karangpamulang', NULL, NULL),
(117, 23, 'Pasir Impun', NULL, NULL),
(118, 23, 'Sindangjaya', NULL, NULL),
(119, 24, 'Cipadung Kidul', NULL, NULL),
(120, 24, 'Cipadung Kulon', NULL, NULL),
(121, 24, 'Cipadung Wetan', NULL, NULL),
(122, 24, 'Mekarmulya', NULL, NULL),
(123, 25, 'Cipamokolan', NULL, NULL),
(124, 25, 'Darwati', NULL, NULL),
(125, 25, 'Manjahlega', NULL, NULL),
(126, 25, 'Mekar Jaya', NULL, NULL),
(127, 26, 'Ancol', NULL, NULL),
(128, 26, 'Balonggede', NULL, NULL),
(129, 26, 'Ciateul', NULL, NULL),
(130, 26, 'Cigereleng', NULL, NULL),
(131, 26, 'Ciseureuh', NULL, NULL),
(132, 26, 'Pasirluyu', NULL, NULL),
(133, 26, 'Pungkur', NULL, NULL),
(134, 27, 'Cipedes', NULL, NULL),
(135, 27, 'Pasteur', NULL, NULL),
(136, 27, 'Sukabungah', NULL, NULL),
(137, 27, 'Sukagalih', NULL, NULL),
(138, 27, 'Sukawarna', NULL, NULL),
(139, 28, 'Gegerkalong', NULL, NULL),
(140, 28, 'Isola', NULL, NULL),
(141, 28, 'Sarijadi', NULL, NULL),
(142, 28, 'Sukarasa', NULL, NULL),
(143, 29, 'Babakanciamis', NULL, NULL),
(144, 29, 'Braga', NULL, NULL),
(145, 29, 'Kebonpisang', NULL, NULL),
(146, 29, 'Merdeka', NULL, NULL),
(147, 30, 'Cigending', NULL, NULL),
(148, 30, 'Pasanggrahan', NULL, NULL),
(149, 30, 'Pasirendah', NULL, NULL),
(150, 30, 'Pasirjati', NULL, NULL),
(151, 30, 'Pasirwangi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-09-11-000001', 'App\\Database\\Migrations\\CreateTimPembinaSk', 'default', 'App', 1789107367, 1),
(2, '2026-09-11-000002', 'App\\Database\\Migrations\\CreateTimPembinaRencanaKerja', 'default', 'App', 1789107711, 2),
(3, '2026-09-11-000003', 'App\\Database\\Migrations\\CreateTimPembinaRealisasi', 'default', 'App', 1789314981, 3),
(4, '2026-09-11-000004', 'App\\Database\\Migrations\\CreateTimPembinaFoto', 'default', 'App', 1789317939, 4),
(5, '2026-09-13-000005', 'App\\Database\\Migrations\\CreateForumKecamatanSk', 'default', 'App', 1789317940, 4),
(6, '2026-09-14-000006', 'App\\Database\\Migrations\\CreateForumBandungSehatSk', 'default', 'App', 1789320116, 5),
(7, '2026-09-14-000007', 'App\\Database\\Migrations\\CreateForumBandungSehatRencanaKerja', 'default', 'App', 1789320596, 6),
(8, '2026-09-14-000008', 'App\\Database\\Migrations\\CreateForumBandungSehatRealisasi', 'default', 'App', 1789320870, 7),
(9, '2026-09-14-000009', 'App\\Database\\Migrations\\CreateForumKecamatanSehatRencanaKerja', 'default', 'App', 1789350608, 8),
(10, '2026-09-14-000010', 'App\\Database\\Migrations\\CreateForumKecamatanSehatRealisasi', 'default', 'App', 1789350901, 9),
(11, '2026-09-14-000011', 'App\\Database\\Migrations\\CreateForumKecamatanSehatFoto', 'default', 'App', 1789351645, 10),
(12, '2026-09-16-000009', 'App\\Database\\Migrations\\CreateForumBandungSehatFoto', 'default', 'App', 1789541726, 11),
(13, '2026-09-23-000001', 'App\\Database\\Migrations\\SeragamkanRencanaRealisasiKegiatan', 'default', 'App', 1790153477, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokja_kelurahan_sehat`
--

CREATE TABLE `pokja_kelurahan_sehat` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelurahan_id` int(10) UNSIGNED NOT NULL,
  `nama_pokja` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ketua` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokja_kelurahan_sehat_realisasi`
--

CREATE TABLE `pokja_kelurahan_sehat_realisasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelurahan_id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` bigint(20) UNSIGNED DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokja_kelurahan_sehat_rencana_kerja`
--

CREATE TABLE `pokja_kelurahan_sehat_rencana_kerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelurahan_id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` bigint(20) UNSIGNED DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokja_kelurahan_sehat_sk`
--

CREATE TABLE `pokja_kelurahan_sehat_sk` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelurahan_id` int(10) UNSIGNED NOT NULL,
  `no_sk` varchar(100) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `ukuran_file` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi_pendanaan`
--

CREATE TABLE `realisasi_pendanaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `tahun_ke` tinyint(3) UNSIGNED NOT NULL,
  `anggaran` decimal(15,2) DEFAULT 0.00,
  `realisasi` decimal(15,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_kerja`
--

CREATE TABLE `rencana_kerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `tahun_ke` tinyint(3) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `target` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk`
--

CREATE TABLE `sk` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `file_sk` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pembina`
--

CREATE TABLE `tim_pembina` (
  `id` int(10) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pembina_foto`
--

CREATE TABLE `tim_pembina_foto` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pembina_realisasi`
--

CREATE TABLE `tim_pembina_realisasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) NOT NULL DEFAULT 0.00,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pembina_rencana_kerja`
--

CREATE TABLE `tim_pembina_rencana_kerja` (
  `id` int(11) UNSIGNED NOT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` bigint(20) UNSIGNED DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `data_rencana` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pembina_sk`
--

CREATE TABLE `tim_pembina_sk` (
  `id` int(11) UNSIGNED NOT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kecamatan_id` int(11) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tim_pembina_sk`
--

INSERT INTO `tim_pembina_sk` (`id`, `no_sk`, `periode`, `keterangan`, `kecamatan_id`, `nama_file`, `nama_asli`, `file_path`, `ukuran_file`, `created_at`, `updated_at`) VALUES
(1, '123/kep/BS/2026', '2025-2030', 'surat', 0, '1790148860_2cfce74834fd72980c94.pdf', 'Notulensi Monev penyusunan Dokumen Perencanaan Pembangunan Perangkat daerah Bidang Pemerintahan.pdf', 'uploads/tim_pembina_sk/1790148860_2cfce74834fd72980c94.pdf', 310165, '2026-09-23 07:19:00', '2026-09-23 07:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 'Administrator', 'admin', '$2y$12$ot.O7arlaCjS0JF1KojdbOouWoGdbJLqPqSBVYeT1M.u.Ceq3s.0C', 'admin', 1, '2026-09-08 10:33:09', '2026-09-08 10:33:09'),
(15, 'Andir', 'andir', '$2y$12$rDB.NbYDVaYZb6RgIhnhyeZNrGRYlcSSQmfJJxhgHmfZ6LAEnmLf6', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(16, 'Antapani', 'antapani', '$2y$12$K9dXqXPIwCQLvJvIWKOc3OuBW/dLqF9DP/QHXxqtuWKH2PZ0xJQ/q', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(17, 'Arcamanik', 'arcamanik', '$2y$12$8Kv/Qn3meE4BVj/bGZgugeb/f3e4Bs8XaS7Wf5JiKSlyELR5AgXvy', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(18, 'Astanaanyar', 'astanaanyar', '$2y$12$e4lCthCRNIsxr.eJ.dx1deASJCJ1dhP0uNT1i.AkDDsUlNr9BteaW', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(19, 'Babakan Ciparay', 'babakan_ciparay', '$2y$12$a6TbKsbcMvuBUfQ/iYE14.Olv8/KV1toLo5emSKHM/IHaXfYKsZfG', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(20, 'Bandung Kidul', 'bandung_kidul', '$2y$12$QQ/MROTLXOW7LUMaV4a/Ju4Ln.6Aql.W1UtHh8D3KUdfEkN18st6K', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(21, 'Bandung Kulon', 'bandung_kulon', '$2y$12$HyTO7ggP7saP60N8lQFB0OvFDiWiWfk8oqC1NzzPhi9UZmIDNvebW', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(22, 'Bandung Wetan', 'bandung_wetan', '$2y$12$aYh.1SEdI4wgtdG0Uk2HIu1Igsri9jDYvfw4CXkXynXegQKEWdrwe', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(23, 'Batununggal', 'batununggal', '$2y$12$rn3jiLauvBbNVun2Dt70RO2MXRJHzhO4o2tRIrCE3iAGXTidwiaLa', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(24, 'Bojongloa Kaler', 'bojongloa_kaler', '$2y$12$TzRuBTazHQ9Z.PtZdnLOmeEQTHTs/qDO/p75VE5vi3k5eGh.Rdhve', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(25, 'Bojongloa Kidul', 'bojongloa_kidul', '$2y$12$xzsI0n/1HonnUgQrviPDt.LE85UQOeo6I2IMXJCm1qxTfijZXhp3.', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(26, 'Buahbatu', 'buahbatu', '$2y$12$4JuTAyls9RrJW/YjERlVtuTbYTN9LmJCebYkqqp9pyqKyVI23VtVK', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(27, 'Cibeunying Kaler', 'cibeunying_kaler', '$2y$12$KQf4mcGscfzJHMYehKREj.TSDaxTT4Ul1jlVS.fmOzbmJkRACw/8q', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(28, 'Cibeunying Kidul', 'cibeunying_kidul', '$2y$12$KIz1L4oc215HPfCS.ybmSugjZeRBdcHbJLezR5jNyD8EcACLZuAre', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(29, 'Cibiru', 'cibiru', '$2y$12$hFNu8Ggn/Ot2S7OAsmFFceF4xWk6CiZ3SRmoQGa5x56gITwcxGm2e', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(30, 'Cicendo', 'cicendo', '$2y$12$VsZYcwnxmVUQK80AHL0qfu.46cPkuogxZh/vFMhp//T6VCD2x/t6O', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(31, 'Cidadap', 'cidadap', '$2y$12$JXtIGF5tjYtomSh2NtQdCuDABt6Tjol6wWXlXBqnodtiAdnlrdI7C', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(32, 'Cinambo', 'cinambo', '$2y$12$gjPkTUbKmLlHcnCzOGHFpuZQV1sBP0nDwJAlnC3S1WI1q7WDHgNhW', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(33, 'Coblong', 'coblong', '$2y$12$BaI6tUSvMIpgfe.kcn5tjuS8C1Dk7U9QBgvjLq8d3Bx..tWG/HUQi', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(34, 'Gedebage', 'gedebage', '$2y$12$5RrAz9qsDDIMEjEq/6FjAOOahkvHgYzINW.ZOlHjk1yS5NlHI73zi', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(35, 'Kiaracondong', 'kiaracondong', '$2y$12$wdEtT3cTRcyhWd.9Rh.hnuMBYQaZZrc6NTAiIoT2IMeX.xY90FxhS', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(36, 'Lengkong', 'lengkong', '$2y$12$dXv6FWtiKTZIWkk.d42AdOOGQ.J8wSLNdWOJqjUQrIkV1aTmhzzoy', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(37, 'Mandalajati', 'mandalajati', '$2y$12$DnHsR15bM5IsUPUO7Qx34OzTffXknEmHqKhIrcrSLqPWWwbGOuwQy', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(38, 'Panyileukan', 'panyileukan', '$2y$12$5JXMeP/ILOl8RLQ8ENXTeebESIEhHq0f..b/4EpkbmGxGM0Ilih22', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(39, 'Rancasari', 'rancasari', '$2y$12$r64KSAc2qBfnc3jjKKeP7Ot5MWSD13MIQ5AvKpit/50lO1wtBZeUe', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(40, 'Regol', 'regol', '$2y$12$LTVTxyMx/WxBjOMvOawXe.hoK3/5hUeIlM28RXwTo39xHN8B9K4/K', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(41, 'Sukajadi', 'sukajadi', '$2y$12$i7JHeCEqUOpCtYcFS8UUze9bO/HpVzty6Ot4Wq2l8IKj8fMzSHkY6', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(42, 'Sukasari', 'sukasari', '$2y$12$9Fc6aOBGJSz.hj6tX1NP.evrq5INqCOXtQU5/jPuAn0O9idRnGoNC', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(43, 'Sumur Bandung', 'sumur_bandung', '$2y$12$EI55WEDfJ8Y0FUfxQoSAG.zkFQPMutuwWTl/SDIZ/GF9DIOaH2X4G', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40'),
(44, 'Ujungberung', 'ujungberung', '$2y$12$sVlR39OjBdslPUuc1fqj1OaxLMba8nc7N7br2SsCIsB6lSENbjJUK', 'user', 1, '2026-09-08 11:04:40', '2026-09-08 11:04:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `forum_bandung_sehat`
--
ALTER TABLE `forum_bandung_sehat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_bandung_sehat_foto`
--
ALTER TABLE `forum_bandung_sehat_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_bandung_sehat_realisasi`
--
ALTER TABLE `forum_bandung_sehat_realisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_bandung_sehat_rencana_kerja`
--
ALTER TABLE `forum_bandung_sehat_rencana_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_bandung_sehat_sk`
--
ALTER TABLE `forum_bandung_sehat_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_kecamatan_sehat`
--
ALTER TABLE `forum_kecamatan_sehat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_forum_kecamatan` (`kecamatan_id`);

--
-- Indeks untuk tabel `forum_kecamatan_sehat_foto`
--
ALTER TABLE `forum_kecamatan_sehat_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `forum_kecamatan_sehat_realisasi`
--
ALTER TABLE `forum_kecamatan_sehat_realisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `forum_kecamatan_sehat_rencana_kerja`
--
ALTER TABLE `forum_kecamatan_sehat_rencana_kerja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatan_id_tahun` (`kecamatan_id`,`tahun`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `forum_kecamatan_sk`
--
ALTER TABLE `forum_kecamatan_sk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `foto_before_after`
--
ALTER TABLE `foto_before_after`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inovasi`
--
ALTER TABLE `inovasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kecamatan` (`nama_kecamatan`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_kelurahan_kecamatan` (`kecamatan_id`,`nama_kelurahan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pokja_kelurahan_sehat`
--
ALTER TABLE `pokja_kelurahan_sehat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pokja_kelurahan` (`kelurahan_id`);

--
-- Indeks untuk tabel `pokja_kelurahan_sehat_realisasi`
--
ALTER TABLE `pokja_kelurahan_sehat_realisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pokja_realisasi_kelurahan` (`kelurahan_id`);

--
-- Indeks untuk tabel `pokja_kelurahan_sehat_rencana_kerja`
--
ALTER TABLE `pokja_kelurahan_sehat_rencana_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_rencana_kerja_kelurahan` (`kelurahan_id`);

--
-- Indeks untuk tabel `pokja_kelurahan_sehat_sk`
--
ALTER TABLE `pokja_kelurahan_sehat_sk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pokja_sk_kelurahan` (`kelurahan_id`);

--
-- Indeks untuk tabel `realisasi_pendanaan`
--
ALTER TABLE `realisasi_pendanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tim_pembina`
--
ALTER TABLE `tim_pembina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tim_pembina_kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `tim_pembina_foto`
--
ALTER TABLE `tim_pembina_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tim_pembina_realisasi`
--
ALTER TABLE `tim_pembina_realisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `tahun` (`tahun`);

--
-- Indeks untuk tabel `tim_pembina_rencana_kerja`
--
ALTER TABLE `tim_pembina_rencana_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `tahun` (`tahun`);

--
-- Indeks untuk tabel `tim_pembina_sk`
--
ALTER TABLE `tim_pembina_sk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `forum_bandung_sehat`
--
ALTER TABLE `forum_bandung_sehat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `forum_bandung_sehat_foto`
--
ALTER TABLE `forum_bandung_sehat_foto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum_bandung_sehat_realisasi`
--
ALTER TABLE `forum_bandung_sehat_realisasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `forum_bandung_sehat_rencana_kerja`
--
ALTER TABLE `forum_bandung_sehat_rencana_kerja`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum_bandung_sehat_sk`
--
ALTER TABLE `forum_bandung_sehat_sk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `forum_kecamatan_sehat`
--
ALTER TABLE `forum_kecamatan_sehat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `forum_kecamatan_sehat_foto`
--
ALTER TABLE `forum_kecamatan_sehat_foto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `forum_kecamatan_sehat_realisasi`
--
ALTER TABLE `forum_kecamatan_sehat_realisasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `forum_kecamatan_sehat_rencana_kerja`
--
ALTER TABLE `forum_kecamatan_sehat_rencana_kerja`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `forum_kecamatan_sk`
--
ALTER TABLE `forum_kecamatan_sk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto_before_after`
--
ALTER TABLE `foto_before_after`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inovasi`
--
ALTER TABLE `inovasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pokja_kelurahan_sehat`
--
ALTER TABLE `pokja_kelurahan_sehat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pokja_kelurahan_sehat_realisasi`
--
ALTER TABLE `pokja_kelurahan_sehat_realisasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pokja_kelurahan_sehat_rencana_kerja`
--
ALTER TABLE `pokja_kelurahan_sehat_rencana_kerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pokja_kelurahan_sehat_sk`
--
ALTER TABLE `pokja_kelurahan_sehat_sk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `realisasi_pendanaan`
--
ALTER TABLE `realisasi_pendanaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sk`
--
ALTER TABLE `sk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tim_pembina`
--
ALTER TABLE `tim_pembina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tim_pembina_foto`
--
ALTER TABLE `tim_pembina_foto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tim_pembina_realisasi`
--
ALTER TABLE `tim_pembina_realisasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tim_pembina_rencana_kerja`
--
ALTER TABLE `tim_pembina_rencana_kerja`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tim_pembina_sk`
--
ALTER TABLE `tim_pembina_sk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `forum_kecamatan_sehat`
--
ALTER TABLE `forum_kecamatan_sehat`
  ADD CONSTRAINT `fk_forum_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `fk_kelurahan_kec` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pokja_kelurahan_sehat`
--
ALTER TABLE `pokja_kelurahan_sehat`
  ADD CONSTRAINT `fk_pokja_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pokja_kelurahan_sehat_realisasi`
--
ALTER TABLE `pokja_kelurahan_sehat_realisasi`
  ADD CONSTRAINT `fk_pokja_realisasi_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pokja_kelurahan_sehat_rencana_kerja`
--
ALTER TABLE `pokja_kelurahan_sehat_rencana_kerja`
  ADD CONSTRAINT `fk_rencana_kerja_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pokja_kelurahan_sehat_sk`
--
ALTER TABLE `pokja_kelurahan_sehat_sk`
  ADD CONSTRAINT `fk_pokja_sk_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
