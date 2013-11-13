-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2013 at 12:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbinventaris`
--
CREATE DATABASE `dbinventaris` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbinventaris`;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `no_inventaris` varchar(10) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  PRIMARY KEY (`no_inventaris`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`no_inventaris`, `id_jenis`, `kondisi`, `tgl_registrasi`) VALUES
('INV111', 'J001', 'Bekas', '2013-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_inventaris`
--

CREATE TABLE IF NOT EXISTS `jenis_inventaris` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_inventaris`
--

INSERT INTO `jenis_inventaris` (`id_jenis`, `nama_jenis`, `keterangan`) VALUES
('J001', 'Meja', 'Pendek'),
('JNS01', 'Kursi', 'Kursi');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `NIP` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama`, `alamat`, `no_telp`) VALUES
('123456', 'Jack', 'JL3', '08113854799'),
('1234567', 'Jack2', 'Jalan', '08113854799');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `no_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `NIP` varchar(10) NOT NULL,
  PRIMARY KEY (`no_pinjam`),
  KEY `NIP` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_detail`
--

CREATE TABLE IF NOT EXISTS `pinjam_detail` (
  `no_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_pinjam` int(11) NOT NULL,
  `no_inventaris` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  PRIMARY KEY (`no_detail`),
  KEY `no_pinjam` (`no_pinjam`),
  KEY `no_inventaris` (`no_inventaris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_inventaris` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam_detail`
--
ALTER TABLE `pinjam_detail`
  ADD CONSTRAINT `pinjam_detail_ibfk_2` FOREIGN KEY (`no_pinjam`) REFERENCES `pinjam` (`no_pinjam`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjam_detail_ibfk_3` FOREIGN KEY (`no_inventaris`) REFERENCES `inventaris` (`no_inventaris`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
