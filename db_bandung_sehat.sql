-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_bandung_sehat
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `forum_bandung_sehat`
--

DROP TABLE IF EXISTS `forum_bandung_sehat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_bandung_sehat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_bandung_sehat`
--

LOCK TABLES `forum_bandung_sehat` WRITE;
/*!40000 ALTER TABLE `forum_bandung_sehat` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_bandung_sehat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_bandung_sehat_foto`
--

DROP TABLE IF EXISTS `forum_bandung_sehat_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_bandung_sehat_foto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `ukuran_file` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_bandung_sehat_foto`
--

LOCK TABLES `forum_bandung_sehat_foto` WRITE;
/*!40000 ALTER TABLE `forum_bandung_sehat_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_bandung_sehat_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_bandung_sehat_realisasi`
--

DROP TABLE IF EXISTS `forum_bandung_sehat_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_bandung_sehat_realisasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_bandung_sehat_realisasi`
--

LOCK TABLES `forum_bandung_sehat_realisasi` WRITE;
/*!40000 ALTER TABLE `forum_bandung_sehat_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_bandung_sehat_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_bandung_sehat_rencana_kerja`
--

DROP TABLE IF EXISTS `forum_bandung_sehat_rencana_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_bandung_sehat_rencana_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `periode` enum('ganjil','genap') NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `ukuran_file` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_forum_bandung_rencana_tahun` (`tahun`),
  KEY `idx_forum_bandung_rencana_periode` (`periode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_bandung_sehat_rencana_kerja`
--

LOCK TABLES `forum_bandung_sehat_rencana_kerja` WRITE;
/*!40000 ALTER TABLE `forum_bandung_sehat_rencana_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_bandung_sehat_rencana_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_bandung_sehat_sk`
--

DROP TABLE IF EXISTS `forum_bandung_sehat_sk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_bandung_sehat_sk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `keterangan_penolakan` text DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_bandung_sehat_sk`
--

LOCK TABLES `forum_bandung_sehat_sk` WRITE;
/*!40000 ALTER TABLE `forum_bandung_sehat_sk` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_bandung_sehat_sk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kecamatan_sehat`
--

DROP TABLE IF EXISTS `forum_kecamatan_sehat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_kecamatan_sehat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) unsigned NOT NULL,
  `nama_forum` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ketua` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_forum_kecamatan` (`kecamatan_id`),
  CONSTRAINT `fk_forum_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_kecamatan_sehat`
--

LOCK TABLES `forum_kecamatan_sehat` WRITE;
/*!40000 ALTER TABLE `forum_kecamatan_sehat` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kecamatan_sehat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kecamatan_sehat_foto`
--

DROP TABLE IF EXISTS `forum_kecamatan_sehat_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_kecamatan_sehat_foto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) unsigned DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_kecamatan_sehat_foto`
--

LOCK TABLES `forum_kecamatan_sehat_foto` WRITE;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kecamatan_sehat_realisasi`
--

DROP TABLE IF EXISTS `forum_kecamatan_sehat_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_kecamatan_sehat_realisasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) unsigned NOT NULL,
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
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_kecamatan_sehat_realisasi`
--

LOCK TABLES `forum_kecamatan_sehat_realisasi` WRITE;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kecamatan_sehat_rencana_kerja`
--

DROP TABLE IF EXISTS `forum_kecamatan_sehat_rencana_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_kecamatan_sehat_rencana_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `periode` enum('ganjil','genap') NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `ukuran_file` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_forum_kecamatan_rencana_tahun` (`tahun`),
  KEY `idx_forum_kecamatan_rencana_periode` (`periode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_kecamatan_sehat_rencana_kerja`
--

LOCK TABLES `forum_kecamatan_sehat_rencana_kerja` WRITE;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_rencana_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kecamatan_sehat_rencana_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kecamatan_sk`
--

DROP TABLE IF EXISTS `forum_kecamatan_sk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_kecamatan_sk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) unsigned NOT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `keterangan_penolakan` text DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_kecamatan_sk`
--

LOCK TABLES `forum_kecamatan_sk` WRITE;
/*!40000 ALTER TABLE `forum_kecamatan_sk` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kecamatan_sk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_before_after`
--

DROP TABLE IF EXISTS `foto_before_after`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_before_after` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `foto_before` varchar(255) DEFAULT NULL,
  `foto_after` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_before_after`
--

LOCK TABLES `foto_before_after` WRITE;
/*!40000 ALTER TABLE `foto_before_after` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto_before_after` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovasi`
--

DROP TABLE IF EXISTS `inovasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inovasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_inovasi` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovasi`
--

LOCK TABLES `inovasi` WRITE;
/*!40000 ALTER TABLE `inovasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `inovasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovasi_kecamatan`
--

DROP TABLE IF EXISTS `inovasi_kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inovasi_kecamatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) unsigned NOT NULL,
  `nama_inovasi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `manfaat` text DEFAULT NULL,
  `link_data_dukung` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_inovasi_kecamatan` (`kecamatan_id`),
  CONSTRAINT `fk_inovasi_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovasi_kecamatan`
--

LOCK TABLES `inovasi_kecamatan` WRITE;
/*!40000 ALTER TABLE `inovasi_kecamatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `inovasi_kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovasi_kelurahan`
--

DROP TABLE IF EXISTS `inovasi_kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inovasi_kelurahan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan_id` int(10) unsigned NOT NULL,
  `nama_inovasi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `manfaat` text DEFAULT NULL,
  `link_data_dukung` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_inovasi_kelurahan` (`kelurahan_id`),
  CONSTRAINT `fk_inovasi_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovasi_kelurahan`
--

LOCK TABLES `inovasi_kelurahan` WRITE;
/*!40000 ALTER TABLE `inovasi_kelurahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `inovasi_kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovasi_perangkat_daerah`
--

DROP TABLE IF EXISTS `inovasi_perangkat_daerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inovasi_perangkat_daerah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_perangkat_daerah` varchar(255) NOT NULL,
  `nama_inovasi` varchar(255) NOT NULL,
  `penjelasan` text NOT NULL,
  `waktu_awal_penerapan` date DEFAULT NULL,
  `waktu_terakhir_pengembangan` date DEFAULT NULL,
  `dampak_inovasi` text DEFAULT NULL,
  `link_data_dukung` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovasi_perangkat_daerah`
--

LOCK TABLES `inovasi_perangkat_daerah` WRITE;
/*!40000 ALTER TABLE `inovasi_perangkat_daerah` DISABLE KEYS */;
/*!40000 ALTER TABLE `inovasi_perangkat_daerah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_kecamatan` (`nama_kecamatan`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (1,'32.73.05','Andir',NULL,NULL),(2,'32.73.10','Astana Anyar',NULL,NULL),(3,'32.73.20','Antapani',NULL,NULL),(4,'32.73.24','Arcamanik',NULL,NULL),(5,'32.73.03','Babakan Ciparay',NULL,NULL),(6,'32.73.21','Bandung Kidul',NULL,NULL),(7,'32.73.15','Bandung Kulon',NULL,NULL),(8,'32.73.09','Bandung Wetan',NULL,NULL),(9,'32.73.12','Batununggal',NULL,NULL),(10,'32.73.04','Bojongloa Kaler',NULL,NULL),(11,'32.73.17','Bojongloa Kidul',NULL,NULL),(12,'32.73.22','Buahbatu',NULL,NULL),(13,'32.73.18','Cibeunying Kaler',NULL,NULL),(14,'32.73.14','Cibeunying Kidul',NULL,NULL),(15,'32.73.25','Cibiru',NULL,NULL),(16,'32.73.06','Cicendo',NULL,NULL),(17,'32.73.08','Cidadap',NULL,NULL),(18,'32.73.29','Cinambo',NULL,NULL),(19,'32.73.02','Coblong',NULL,NULL),(20,'32.73.27','Gedebage',NULL,NULL),(21,'32.73.16','Kiaracondong',NULL,NULL),(22,'32.73.13','Lengkong',NULL,NULL),(23,'32.73.30','Mandalajati',NULL,NULL),(24,'32.73.28','Panyileukan',NULL,NULL),(25,'32.73.23','Rancasari',NULL,NULL),(26,'32.73.11','Regol',NULL,NULL),(27,'32.73.07','Sukajadi',NULL,NULL),(28,'32.73.01','Sukasari',NULL,NULL),(29,'32.73.19','Sumur Bandung',NULL,NULL),(30,'32.73.26','Ujungberung',NULL,NULL);
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelurahan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) unsigned NOT NULL,
  `nama_kelurahan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_kelurahan_kecamatan` (`kecamatan_id`,`nama_kelurahan`),
  CONSTRAINT `fk_kelurahan_kec` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahan`
--

LOCK TABLES `kelurahan` WRITE;
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
INSERT INTO `kelurahan` VALUES (1,1,'Campaka',NULL,NULL),(2,1,'Ciroyom',NULL,NULL),(3,1,'Dunguscariang',NULL,NULL),(4,1,'Garuda',NULL,NULL),(5,1,'Kebonjeruk',NULL,NULL),(6,1,'Maleber',NULL,NULL),(7,2,'Cibadak',NULL,NULL),(8,2,'Karanganyar',NULL,NULL),(9,2,'Karasak',NULL,NULL),(10,2,'Nyengseret',NULL,NULL),(11,2,'Panjunan',NULL,NULL),(12,2,'Pelindunghewan',NULL,NULL),(13,3,'Antapani Kidul',NULL,NULL),(14,3,'Antapani Kulon',NULL,NULL),(15,3,'Antapani Tengah',NULL,NULL),(16,3,'Antapani Wetan',NULL,NULL),(17,4,'Cisaranten Bina Harapan',NULL,NULL),(18,4,'Cisaranten Endah',NULL,NULL),(19,4,'Cisaranten Kulon',NULL,NULL),(20,4,'Sukamiskin',NULL,NULL),(21,5,'Babakan',NULL,NULL),(22,5,'Babakanciparay',NULL,NULL),(23,5,'Cirangrang',NULL,NULL),(24,5,'Margahayu Utara',NULL,NULL),(25,5,'Margasuka',NULL,NULL),(26,5,'Sukahaji',NULL,NULL),(27,6,'Batununggal',NULL,NULL),(28,6,'Kujangsari',NULL,NULL),(29,6,'Mengger',NULL,NULL),(30,6,'Wates',NULL,NULL),(31,7,'Caringin',NULL,NULL),(32,7,'Cibuntu',NULL,NULL),(33,7,'Cigondewah Kaler',NULL,NULL),(34,7,'Cigondewah Kidul',NULL,NULL),(35,7,'Cigondewah Rahayu',NULL,NULL),(36,7,'Cijerah',NULL,NULL),(37,7,'Gempolsari',NULL,NULL),(38,7,'Warungmuncang',NULL,NULL),(39,8,'Cihapit',NULL,NULL),(40,8,'Citarum',NULL,NULL),(41,8,'Tamansari',NULL,NULL),(42,9,'Binong',NULL,NULL),(43,9,'Cibangkong',NULL,NULL),(44,9,'Gumuruh',NULL,NULL),(45,9,'Kacapiring',NULL,NULL),(46,9,'Kebongedang',NULL,NULL),(47,9,'Kebonwaru',NULL,NULL),(48,9,'Maleer',NULL,NULL),(49,9,'Samoja',NULL,NULL),(50,10,'Babakan Asih',NULL,NULL),(51,10,'Babakan Tarogong',NULL,NULL),(52,10,'Jamika',NULL,NULL),(53,10,'Kopo',NULL,NULL),(54,10,'Suka Asih',NULL,NULL),(55,11,'Cibaduyut',NULL,NULL),(56,11,'Cibaduyut Kidul',NULL,NULL),(57,11,'Cibaduyut Wetan',NULL,NULL),(58,11,'Kebon Lega',NULL,NULL),(59,11,'Mekarwangi',NULL,NULL),(60,11,'Situsaeur',NULL,NULL),(61,12,'Cijawura',NULL,NULL),(62,12,'Jatisari',NULL,NULL),(63,12,'Margasari',NULL,NULL),(64,12,'Sekejati',NULL,NULL),(65,13,'Cigadung',NULL,NULL),(66,13,'Cihaurgeulis',NULL,NULL),(67,13,'Neglasari',NULL,NULL),(68,13,'Sukaluyu',NULL,NULL),(69,14,'Cicadas',NULL,NULL),(70,14,'Cikutra',NULL,NULL),(71,14,'Padasuka',NULL,NULL),(72,14,'Pasirlayung',NULL,NULL),(73,14,'Sukamaju',NULL,NULL),(74,14,'Sukapada',NULL,NULL),(75,15,'Cipadung',NULL,NULL),(76,15,'Cisurupan',NULL,NULL),(77,15,'Palasari',NULL,NULL),(78,15,'Pasirbiru',NULL,NULL),(79,16,'Arjuna',NULL,NULL),(80,16,'Husen Sastranegara',NULL,NULL),(81,16,'Pajajaran',NULL,NULL),(82,16,'Pamoyanan',NULL,NULL),(83,16,'Pasirkaliki',NULL,NULL),(84,16,'Sukaraja',NULL,NULL),(85,17,'Ciumbuleuit',NULL,NULL),(86,17,'Hegarmanah',NULL,NULL),(87,17,'Ledeng',NULL,NULL),(88,18,'Babakan Penghulu',NULL,NULL),(89,18,'Cisaranten Wetan',NULL,NULL),(90,18,'Pakemitan',NULL,NULL),(91,18,'Sukamulya',NULL,NULL),(92,19,'Cipaganti',NULL,NULL),(93,19,'Dago',NULL,NULL),(94,19,'Lebakgede',NULL,NULL),(95,19,'Lebaksiliwangi',NULL,NULL),(96,19,'Sadangserang',NULL,NULL),(97,19,'Sekeloa',NULL,NULL),(98,20,'Cimincrang',NULL,NULL),(99,20,'Cisaranten Kidul',NULL,NULL),(100,20,'Rancabolang',NULL,NULL),(101,20,'Rancanumpang',NULL,NULL),(102,21,'Babakansari',NULL,NULL),(103,21,'Babakansurabaya',NULL,NULL),(104,21,'Cicaheum',NULL,NULL),(105,21,'Kebonkangkung',NULL,NULL),(106,21,'Kebunjayanti',NULL,NULL),(107,21,'Sukapura',NULL,NULL),(108,22,'Burangrang',NULL,NULL),(109,22,'Cijagra',NULL,NULL),(110,22,'Cikawao',NULL,NULL),(111,22,'Lingkar Selatan',NULL,NULL),(112,22,'Malabar',NULL,NULL),(113,22,'Paledang',NULL,NULL),(114,22,'Turangga',NULL,NULL),(115,23,'Jatihandap',NULL,NULL),(116,23,'Karangpamulang',NULL,NULL),(117,23,'Pasir Impun',NULL,NULL),(118,23,'Sindangjaya',NULL,NULL),(119,24,'Cipadung Kidul',NULL,NULL),(120,24,'Cipadung Kulon',NULL,NULL),(121,24,'Cipadung Wetan',NULL,NULL),(122,24,'Mekarmulya',NULL,NULL),(123,25,'Cipamokolan',NULL,NULL),(124,25,'Darwati',NULL,NULL),(125,25,'Manjahlega',NULL,NULL),(126,25,'Mekar Jaya',NULL,NULL),(127,26,'Ancol',NULL,NULL),(128,26,'Balonggede',NULL,NULL),(129,26,'Ciateul',NULL,NULL),(130,26,'Cigereleng',NULL,NULL),(131,26,'Ciseureuh',NULL,NULL),(132,26,'Pasirluyu',NULL,NULL),(133,26,'Pungkur',NULL,NULL),(134,27,'Cipedes',NULL,NULL),(135,27,'Pasteur',NULL,NULL),(136,27,'Sukabungah',NULL,NULL),(137,27,'Sukagalih',NULL,NULL),(138,27,'Sukawarna',NULL,NULL),(139,28,'Gegerkalong',NULL,NULL),(140,28,'Isola',NULL,NULL),(141,28,'Sarijadi',NULL,NULL),(142,28,'Sukarasa',NULL,NULL),(143,29,'Babakanciamis',NULL,NULL),(144,29,'Braga',NULL,NULL),(145,29,'Kebonpisang',NULL,NULL),(146,29,'Merdeka',NULL,NULL),(147,30,'Cigending',NULL,NULL),(148,30,'Pasanggrahan',NULL,NULL),(149,30,'Pasirendah',NULL,NULL),(150,30,'Pasirjati',NULL,NULL),(151,30,'Pasirwangi',NULL,NULL);
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026-09-11-000001','App\\Database\\Migrations\\CreateTimPembinaSk','default','App',1789107367,1),(2,'2026-09-11-000002','App\\Database\\Migrations\\CreateTimPembinaRencanaKerja','default','App',1789107711,2),(3,'2026-09-11-000003','App\\Database\\Migrations\\CreateTimPembinaRealisasi','default','App',1789314981,3),(4,'2026-09-11-000004','App\\Database\\Migrations\\CreateTimPembinaFoto','default','App',1789317939,4),(5,'2026-09-13-000005','App\\Database\\Migrations\\CreateForumKecamatanSk','default','App',1789317940,4),(6,'2026-09-14-000006','App\\Database\\Migrations\\CreateForumBandungSehatSk','default','App',1789320116,5),(7,'2026-09-14-000007','App\\Database\\Migrations\\CreateForumBandungSehatRencanaKerja','default','App',1789320596,6),(8,'2026-09-14-000008','App\\Database\\Migrations\\CreateForumBandungSehatRealisasi','default','App',1789320870,7),(9,'2026-09-14-000009','App\\Database\\Migrations\\CreateForumKecamatanSehatRencanaKerja','default','App',1789350608,8),(10,'2026-09-14-000010','App\\Database\\Migrations\\CreateForumKecamatanSehatRealisasi','default','App',1789350901,9),(11,'2026-09-14-000011','App\\Database\\Migrations\\CreateForumKecamatanSehatFoto','default','App',1789351645,10),(12,'2026-09-16-000009','App\\Database\\Migrations\\CreateForumBandungSehatFoto','default','App',1789541726,11),(13,'2026-09-23-000001','App\\Database\\Migrations\\SeragamkanRencanaRealisasiKegiatan','default','App',1790153477,12),(14,'2026-09-24-000011','App\\Database\\Migrations\\SeragamkanForumBandungSehatRencanaKerja','default','App',1790220718,13),(15,'2026-09-24-000001','App\\Database\\Migrations\\PerbaikiKecamatanIdTimPembinaKegiatan','default','App',1790221341,14),(16,'2026-10-17-000001','App\\Database\\Migrations\\TambahStatusVerifikasiSk','default','App',1792265078,15),(17,'2026-10-18-000001','App\\Database\\Migrations\\BuatTabelSelfAssessment','default','App',1793119892,16),(18,'2026-10-27-000001','App\\Database\\Migrations\\TambahUserIdKelembagaan','default','App',1793119898,16),(19,'2026-10-29-000001','App\\Database\\Migrations\\SeragamkanTahunRealisasiPokja','default','App',1793266606,17),(20,'2026-11-04-000001','App\\Database\\Migrations\\TambahKolomKegiatanRencanaKerja','default','App',1793799889,18),(21,'2026-09-25-000001','App\\Database\\Migrations\\TambahFileTimPembinaRencanaKerja','default','App',1794156466,19),(22,'2026-09-25-000002','App\\Database\\Migrations\\TambahPeriodeTimPembinaRencanaKerja','default','App',1794156467,19),(23,'2026-09-25-000003','App\\Database\\Migrations\\AddKecamatanIdToTimPembina','default','App',1794156467,19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokja_kelurahan_sehat`
--

DROP TABLE IF EXISTS `pokja_kelurahan_sehat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokja_kelurahan_sehat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan_id` int(10) unsigned NOT NULL,
  `nama_pokja` varchar(200) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ketua` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pokja_kelurahan` (`kelurahan_id`),
  CONSTRAINT `fk_pokja_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokja_kelurahan_sehat`
--

LOCK TABLES `pokja_kelurahan_sehat` WRITE;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokja_kelurahan_sehat_foto`
--

DROP TABLE IF EXISTS `pokja_kelurahan_sehat_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokja_kelurahan_sehat_foto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan_id` int(10) unsigned NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `ukuran_file` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pokja_foto_kelurahan` (`kelurahan_id`),
  CONSTRAINT `fk_pokja_foto_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokja_kelurahan_sehat_foto`
--

LOCK TABLES `pokja_kelurahan_sehat_foto` WRITE;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokja_kelurahan_sehat_realisasi`
--

DROP TABLE IF EXISTS `pokja_kelurahan_sehat_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokja_kelurahan_sehat_realisasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan_id` int(10) unsigned NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` bigint(20) unsigned DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pokja_realisasi_kelurahan` (`kelurahan_id`),
  CONSTRAINT `fk_pokja_realisasi_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokja_kelurahan_sehat_realisasi`
--

LOCK TABLES `pokja_kelurahan_sehat_realisasi` WRITE;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokja_kelurahan_sehat_rencana_kerja`
--

DROP TABLE IF EXISTS `pokja_kelurahan_sehat_rencana_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokja_kelurahan_sehat_rencana_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `periode` enum('ganjil','genap') NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `ukuran_file` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pokja_rencana_tahun` (`tahun`),
  KEY `idx_pokja_rencana_periode` (`periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokja_kelurahan_sehat_rencana_kerja`
--

LOCK TABLES `pokja_kelurahan_sehat_rencana_kerja` WRITE;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_rencana_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_rencana_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokja_kelurahan_sehat_sk`
--

DROP TABLE IF EXISTS `pokja_kelurahan_sehat_sk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokja_kelurahan_sehat_sk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan_id` int(10) unsigned NOT NULL,
  `no_sk` varchar(100) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `keterangan_penolakan` text DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `ukuran_file` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pokja_sk_kelurahan` (`kelurahan_id`),
  CONSTRAINT `fk_pokja_sk_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokja_kelurahan_sehat_sk`
--

LOCK TABLES `pokja_kelurahan_sehat_sk` WRITE;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_sk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokja_kelurahan_sehat_sk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realisasi_pendanaan`
--

DROP TABLE IF EXISTS `realisasi_pendanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realisasi_pendanaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `tahun_ke` tinyint(3) unsigned NOT NULL,
  `anggaran` decimal(15,2) DEFAULT 0.00,
  `realisasi` decimal(15,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realisasi_pendanaan`
--

LOCK TABLES `realisasi_pendanaan` WRITE;
/*!40000 ALTER TABLE `realisasi_pendanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `realisasi_pendanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rencana_kerja`
--

DROP TABLE IF EXISTS `rencana_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rencana_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `tahun_ke` tinyint(3) unsigned NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `target` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rencana_kerja`
--

LOCK TABLES `rencana_kerja` WRITE;
/*!40000 ALTER TABLE `rencana_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `rencana_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `self_assessment`
--

DROP TABLE IF EXISTS `self_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `self_assessment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `modul` varchar(40) NOT NULL,
  `nilai` decimal(5,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'sementara',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_self_assessment_user_modul` (`user_id`,`modul`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `self_assessment`
--

LOCK TABLES `self_assessment` WRITE;
/*!40000 ALTER TABLE `self_assessment` DISABLE KEYS */;
/*!40000 ALTER TABLE `self_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sk`
--

DROP TABLE IF EXISTS `sk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `file_sk` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sk`
--

LOCK TABLES `sk` WRITE;
/*!40000 ALTER TABLE `sk` DISABLE KEYS */;
/*!40000 ALTER TABLE `sk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_pembina`
--

DROP TABLE IF EXISTS `tim_pembina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_pembina` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_tim_pembina_kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_pembina`
--

LOCK TABLES `tim_pembina` WRITE;
/*!40000 ALTER TABLE `tim_pembina` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_pembina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_pembina_foto`
--

DROP TABLE IF EXISTS `tim_pembina_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_pembina_foto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) unsigned DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_pembina_foto`
--

LOCK TABLES `tim_pembina_foto` WRITE;
/*!40000 ALTER TABLE `tim_pembina_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_pembina_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_pembina_realisasi`
--

DROP TABLE IF EXISTS `tim_pembina_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_pembina_realisasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) unsigned DEFAULT NULL,
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
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  KEY `tahun` (`tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_pembina_realisasi`
--

LOCK TABLES `tim_pembina_realisasi` WRITE;
/*!40000 ALTER TABLE `tim_pembina_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_pembina_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_pembina_rencana_kerja`
--

DROP TABLE IF EXISTS `tim_pembina_rencana_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_pembina_rencana_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `periode` enum('ganjil','genap') NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_kegiatan` date DEFAULT NULL,
  `peserta` text DEFAULT NULL,
  `hasil_pelaksanaan` text DEFAULT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `sumber_pendanaan` varchar(100) DEFAULT NULL,
  `link_drive` text DEFAULT NULL,
  `data_dukung` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `nama_asli` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `ukuran_file` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_tim_pembina_rencana_tahun` (`tahun`),
  KEY `idx_tim_pembina_rencana_periode` (`periode`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_pembina_rencana_kerja`
--

LOCK TABLES `tim_pembina_rencana_kerja` WRITE;
/*!40000 ALTER TABLE `tim_pembina_rencana_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_pembina_rencana_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_pembina_sk`
--

DROP TABLE IF EXISTS `tim_pembina_sk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_pembina_sk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_sk` varchar(255) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kecamatan_id` int(11) unsigned NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `keterangan_penolakan` text DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `ukuran_file` int(11) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_pembina_sk`
--

LOCK TABLES `tim_pembina_sk` WRITE;
/*!40000 ALTER TABLE `tim_pembina_sk` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_pembina_sk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'BAPPERIDA','BAPPERIDA','$2y$10$RHWtJS5./2mBQ/BGxzQ0..l1icRPFN2DuJ4yD9w8aSL2r6HauxVTy','admin',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(2,'TATANAN_1','TATANAN_1','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(3,'TATANAN_2','TATANAN_2','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(4,'TATANAN_3','TATANAN_3','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(5,'TATANAN_4','TATANAN_4','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(6,'TATANAN_5','TATANAN_5','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(7,'TATANAN_6','TATANAN_6','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(8,'TATANAN_7','TATANAN_7','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(9,'TATANAN_8','TATANAN_8','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(10,'TATANAN_9','TATANAN_9','$2y$10$czQxrQ0VdbPeP1o1Eleviuz1N36C.J.XlywFdcc3yZH/4DxVTsMNe','user',1,'2026-10-17 23:07:08','2026-10-17 23:07:08'),(11,'Admin Forum Bandung Sehat','FBS_bdg','$2y$10$/uQtTlXbjIx9Pd/kTS3eO.4vxuqNFQnoGACQHFMvu.YzffQB5H6mO','admin_fbs',1,'2026-10-17 23:22:56','2026-10-17 23:22:56'),(19,'Andir','andir','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:46','2026-10-27 07:14:46'),(20,'Astana Anyar','astana_anyar','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:46','2026-10-27 07:14:46'),(21,'Antapani','antapani','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:46','2026-10-27 07:14:46'),(22,'Arcamanik','arcamanik','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:46','2026-10-27 07:14:46'),(23,'Babakan Ciparay','babakan_ciparay','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(24,'Bandung Kidul','bandung_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(25,'Bandung Kulon','bandung_kulon','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(26,'Bandung Wetan','bandung_wetan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(27,'Batununggal','kec_batununggal','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(28,'Bojongloa Kaler','bojongloa_kaler','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(29,'Bojongloa Kidul','bojongloa_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(30,'Buahbatu','buahbatu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(31,'Cibeunying Kaler','cibeunying_kaler','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(32,'Cibeunying Kidul','cibeunying_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(33,'Cibiru','cibiru','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(34,'Cicendo','cicendo','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(35,'Cidadap','cidadap','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(36,'Cinambo','cinambo','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(37,'Coblong','coblong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(38,'Gedebage','gedebage','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:47','2026-10-27 07:14:47'),(39,'Kiaracondong','kiaracondong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(40,'Lengkong','lengkong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(41,'Mandalajati','mandalajati','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(42,'Panyileukan','panyileukan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(43,'Rancasari','rancasari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(44,'Regol','regol','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(45,'Sukajadi','sukajadi','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(46,'Sukasari','sukasari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(47,'Sumur Bandung','sumur_bandung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(48,'Ujungberung','ujungberung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(49,'Campaka','campaka','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(50,'Ciroyom','ciroyom','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(51,'Dunguscariang','dunguscariang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(52,'Garuda','garuda','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:48','2026-10-27 07:14:48'),(53,'Kebonjeruk','kebonjeruk','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(54,'Maleber','maleber','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(55,'Cibadak','cibadak','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(56,'Karanganyar','karanganyar','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(57,'Karasak','karasak','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(58,'Nyengseret','nyengseret','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(59,'Panjunan','panjunan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(60,'Pelindunghewan','pelindunghewan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(61,'Antapani Kidul','antapani_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(62,'Antapani Kulon','antapani_kulon','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(63,'Antapani Tengah','antapani_tengah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(64,'Antapani Wetan','antapani_wetan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(65,'Cisaranten Bina Harapan','cisaranten_bina_harapan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(66,'Cisaranten Endah','cisaranten_endah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(67,'Cisaranten Kulon','cisaranten_kulon','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(68,'Sukamiskin','sukamiskin','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(69,'Babakan','babakan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:49','2026-10-27 07:14:49'),(70,'Babakanciparay','babakanciparay','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(71,'Cirangrang','cirangrang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(72,'Margahayu Utara','margahayu_utara','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(73,'Margasuka','margasuka','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(74,'Sukahaji','sukahaji','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(75,'Batununggal','batununggal','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(76,'Kujangsari','kujangsari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(77,'Mengger','mengger','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(78,'Wates','wates','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(79,'Caringin','caringin','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(80,'Cibuntu','cibuntu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(81,'Cigondewah Kaler','cigondewah_kaler','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(82,'Cigondewah Kidul','cigondewah_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(83,'Cigondewah Rahayu','cigondewah_rahayu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(84,'Cijerah','cijerah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(85,'Gempolsari','gempolsari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(86,'Warungmuncang','warungmuncang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(87,'Cihapit','cihapit','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(88,'Citarum','citarum','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:50','2026-10-27 07:14:50'),(89,'Tamansari','tamansari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(90,'Binong','binong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(91,'Cibangkong','cibangkong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(92,'Gumuruh','gumuruh','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(93,'Kacapiring','kacapiring','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(94,'Kebongedang','kebongedang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(95,'Kebonwaru','kebonwaru','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(96,'Maleer','maleer','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(97,'Samoja','samoja','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(98,'Babakan Asih','babakan_asih','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(99,'Babakan Tarogong','babakan_tarogong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(100,'Jamika','jamika','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(101,'Kopo','kopo','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(102,'Suka Asih','suka_asih','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(103,'Cibaduyut','cibaduyut','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(104,'Cibaduyut Kidul','cibaduyut_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(105,'Cibaduyut Wetan','cibaduyut_wetan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(106,'Kebon Lega','kebon_lega','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(107,'Mekarwangi','mekarwangi','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:51','2026-10-27 07:14:51'),(108,'Situsaeur','situsaeur','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(109,'Cijawura','cijawura','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(110,'Jatisari','jatisari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(111,'Margasari','margasari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(112,'Sekejati','sekejati','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(113,'Cigadung','cigadung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(114,'Cihaurgeulis','cihaurgeulis','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(115,'Neglasari','neglasari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(116,'Sukaluyu','sukaluyu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(117,'Cicadas','cicadas','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(118,'Cikutra','cikutra','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(119,'Padasuka','padasuka','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(120,'Pasirlayung','pasirlayung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(121,'Sukamaju','sukamaju','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(122,'Sukapada','sukapada','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(123,'Cipadung','cipadung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(124,'Cisurupan','cisurupan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:52','2026-10-27 07:14:52'),(125,'Palasari','palasari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(126,'Pasirbiru','pasirbiru','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(127,'Arjuna','arjuna','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(128,'Husen Sastranegara','husen_sastranegara','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(129,'Pajajaran','pajajaran','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(130,'Pamoyanan','pamoyanan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(131,'Pasirkaliki','pasirkaliki','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(132,'Sukaraja','sukaraja','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(133,'Ciumbuleuit','ciumbuleuit','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(134,'Hegarmanah','hegarmanah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(135,'Ledeng','ledeng','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(136,'Babakan Penghulu','babakan_penghulu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(137,'Cisaranten Wetan','cisaranten_wetan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(138,'Pakemitan','pakemitan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(139,'Sukamulya','sukamulya','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(140,'Cipaganti','cipaganti','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(141,'Dago','dago','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:53','2026-10-27 07:14:53'),(142,'Lebakgede','lebakgede','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(143,'Lebaksiliwangi','lebaksiliwangi','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(144,'Sadangserang','sadangserang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(145,'Sekeloa','sekeloa','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(146,'Cimincrang','cimincrang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(147,'Cisaranten Kidul','cisaranten_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(148,'Rancabolang','rancabolang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(149,'Rancanumpang','rancanumpang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(150,'Babakansari','babakansari','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(151,'Babakansurabaya','babakansurabaya','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(152,'Cicaheum','cicaheum','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:54','2026-10-27 07:14:54'),(153,'Kebonkangkung','kebonkangkung','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(154,'Kebunjayanti','kebunjayanti','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(155,'Sukapura','sukapura','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(156,'Burangrang','burangrang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(157,'Cijagra','cijagra','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(158,'Cikawao','cikawao','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(159,'Lingkar Selatan','lingkar_selatan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(160,'Malabar','malabar','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(161,'Paledang','paledang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(162,'Turangga','turangga','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(163,'Jatihandap','jatihandap','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(164,'Karangpamulang','karangpamulang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(165,'Pasir Impun','pasir_impun','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(166,'Sindangjaya','sindangjaya','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(167,'Cipadung Kidul','cipadung_kidul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(168,'Cipadung Kulon','cipadung_kulon','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(169,'Cipadung Wetan','cipadung_wetan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(170,'Mekarmulya','mekarmulya','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(171,'Cipamokolan','cipamokolan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(172,'Darwati','darwati','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(173,'Manjahlega','manjahlega','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:55','2026-10-27 07:14:55'),(174,'Mekar Jaya','mekar_jaya','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(175,'Ancol','ancol','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(176,'Balonggede','balonggede','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(177,'Ciateul','ciateul','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(178,'Cigereleng','cigereleng','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(179,'Ciseureuh','ciseureuh','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(180,'Pasirluyu','pasirluyu','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(181,'Pungkur','pungkur','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(182,'Cipedes','cipedes','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(183,'Pasteur','pasteur','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(184,'Sukabungah','sukabungah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(185,'Sukagalih','sukagalih','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(186,'Sukawarna','sukawarna','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(187,'Gegerkalong','gegerkalong','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(188,'Isola','isola','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(189,'Sarijadi','sarijadi','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(190,'Sukarasa','sukarasa','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(191,'Babakanciamis','babakanciamis','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(192,'Braga','braga','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:56','2026-10-27 07:14:56'),(193,'Kebonpisang','kebonpisang','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(194,'Merdeka','merdeka','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(195,'Cigending','cigending','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(196,'Pasanggrahan','pasanggrahan','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(197,'Pasirendah','pasirendah','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(198,'Pasirjati','pasirjati','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57'),(199,'Pasirwangi','pasirwangi','$2y$12$l5JOX6LatyQQ9sONzDIuRuCVerHGgUkDwTb31YROk7BgBKR8Vs5fm','user',1,'2026-10-27 07:14:57','2026-10-27 07:14:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-08 23:48:32
