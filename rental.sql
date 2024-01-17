-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rental
CREATE DATABASE IF NOT EXISTS `rental` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `rental`;

-- Dumping structure for table rental.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `jenkel_admin` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table rental.admin: ~4 rows (approximately)
DELETE FROM `admin`;
INSERT INTO `admin` (`id_admin`, `nama_admin`, `jenkel_admin`, `username`, `password`, `level`) VALUES
	(1, 'Desi', 'Perempuan', 'desi', 'desi123', 'SUPER'),
	(2, 'Shara', 'Perempuan', 'shara', 'shara123', 'ADMIN'),
	(4, 'Zahra', 'Perempuan', 'zahra', 'zahra123', 'ADMIN'),
	(5, 'Roy', 'Laki-Laki', 'roy', 'roy123', 'ADMIN');

-- Dumping structure for table rental.mobil
CREATE TABLE IF NOT EXISTS `mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(12) NOT NULL,
  `merk` varchar(90) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `s_mobil` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table rental.mobil: ~6 rows (approximately)
DELETE FROM `mobil`;
INSERT INTO `mobil` (`id_mobil`, `no_polisi`, `merk`, `foto`, `tahun`, `harga`, `s_mobil`) VALUES
	(1, 'BK 1224 XX', 'Toyota Avanza Veloz', 'gambar1.jpg', '2014', 310000, 'AKTIF'),
	(3, 'BK 1111 AB', 'Suzuki Ertiga', 'gambar4.jpg', '2016', 300000, 'AKTIF'),
	(4, 'BK 1010 XY', 'Fortuner', 'gambar3.jpg', '2018', 500000, 'AKTIF'),
	(5, 'BK 1212 DR', 'Tesla Model 3', 'gambar2.jpg', '2021', 450000, 'DIPINJAM'),
	(7, 'R 4139 WS', 'ipsum', 'tesla model 3.jpg', '1234', 1234, 'DIPINJAM'),
	(10, 'R 4139 WS', 'Ertiga', '1682629814422.jpg', '2012', 150000, 'DIPINJAM');

-- Dumping structure for table rental.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table rental.pelanggan: ~2 rows (approximately)
DELETE FROM `pelanggan`;
INSERT INTO `pelanggan` (`id`, `nama`, `ktp`, `alamat`, `username`, `password`) VALUES
	(1, 'Roynaldiii', '3303171205010002', 'Sirandu RT 01 RW 02', 'roy', 'ngeteh789'),
	(2, 'Desi Rahmawan', '3212', 'Ajibarang', 'desi', 'desi123');

-- Dumping structure for table rental.sewa
CREATE TABLE IF NOT EXISTS `sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_sewa` varchar(90) NOT NULL,
  `ktp` varchar(25) NOT NULL,
  `jenkel_sewa` varchar(20) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `tlp_sewa` varchar(12) NOT NULL,
  `tujuan` varchar(90) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama` int(11) NOT NULL,
  `harga_total` double NOT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table rental.sewa: ~2 rows (approximately)
DELETE FROM `sewa`;
INSERT INTO `sewa` (`id_sewa`, `id_mobil`, `id_admin`, `nama_sewa`, `ktp`, `jenkel_sewa`, `alamat`, `tlp_sewa`, `tujuan`, `tgl_sewa`, `tgl_kembali`, `lama`, `harga_total`) VALUES
	(2, 4, 1, 'Louis', '333293762940', 'Laki-laki', 'Jl. Pangeran Diponegoro, Perumahan Saphire No.25', '085374528946', 'Semarang', '2019-09-13', '2019-09-20', 7, 3500000),
	(3, 3, 1, 'shara', '901829473213', 'Perempuan', 'Purbalingga', '0812382923', 'Jakarta', '2023-12-23', '2023-12-27', 4, 120000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
