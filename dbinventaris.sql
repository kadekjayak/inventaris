-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2013 at 06:27 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventaris`
--
CREATE DATABASE `inventaris` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventaris`;

-- --------------------------------------------------------

--
-- Table structure for table `akses_user`
--

CREATE TABLE IF NOT EXISTS `akses_user` (
  `user` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `group` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `r` char(1) COLLATE latin1_general_ci NOT NULL,
  `w` char(1) COLLATE latin1_general_ci NOT NULL,
  `x` char(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`,`group`),
  KEY `akses_usergroup` (`group`),
  KEY `akses_useruser` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `akses_user`
--

INSERT INTO `akses_user` (`user`, `group`, `r`, `w`, `x`) VALUES
('tomx', 'admin', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `no_barang` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `merk` varchar(35) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no_barang`),
  KEY `barangnomor_barang` (`no_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_barang`, `nama_barang`, `merk`) VALUES
('brg001', 'Meja (3 Susun  2 Laci)', 'Olimpyc'),
('brg002', 'Kursi Plastik', 'Olimpyc'),
('brg003', 'Kursi Plastik', 'Olimpyc'),
('brg004', 'Al-Quran', 'Percetakan MUI');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`group`),
  KEY `groupgroup` (`group`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group`) VALUES
('Dapur'),
('Gudang'),
('Laboratorium'),
('Mushalla'),
('Ruang Administrasi'),
('Ruang Asisten Mahasiswa'),
('Ruang BSO Mahasiswa'),
('Ruang Diskusi'),
('Ruang Dosen'),
('Ruang Kuliah'),
('Ruang Pertemuan'),
('Ruang Pimpinan'),
('Ruang Skills Lab'),
('Ruang Unit Fakultas'),
('Toilet');

-- --------------------------------------------------------

--
-- Table structure for table `prasarana_listrik`
--

CREATE TABLE IF NOT EXISTS `prasarana_listrik` (
  `id_listrik` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jenis_lampu` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `watt_lampu` smallint(50) NOT NULL,
  PRIMARY KEY (`id_listrik`),
  KEY `prasarana_listrikkode_sarana` (`id_listrik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `prasarana_listrik`
--

INSERT INTO `prasarana_listrik` (`id_listrik`, `jenis_lampu`, `watt_lampu`) VALUES
('lst001', 'Osram Bohlam Putih', 90),
('lst002', 'Lampu Philips', 45);

-- --------------------------------------------------------

--
-- Table structure for table `prasarana_telpon`
--

CREATE TABLE IF NOT EXISTS `prasarana_telpon` (
  `id_telp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jenis` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `merk` varchar(35) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_telp`),
  KEY `id_telp` (`id_telp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `prasarana_telpon`
--

INSERT INTO `prasarana_telpon` (`id_telp`, `jenis`, `merk`) VALUES
('tlp001', 'Telepon Rumah', 'Intersat'),
('tlp002', 'Telepon Rumah Modern', 'Vsat'),
('tlp003', 'Telepon Gengam Rumah', 'Telkom'),
('tlp004', 'Telepon Flexi2', 'Telepon Flexi2'),
('tlp005', 'Telpon Mini Flexi', 'Telkom Flexi');

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE IF NOT EXISTS `sarana` (
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_gedung` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `no_lantai` smallint(6) NOT NULL,
  `jenis` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `luas_ruangan` smallint(6) NOT NULL,
  `tinggi_ruangan` smallint(6) NOT NULL,
  `jumlah_pintu` smallint(6) NOT NULL,
  `jumlah_jendela` smallint(6) NOT NULL,
  PRIMARY KEY (`kode_sarana`),
  KEY `saranagroup` (`jenis`),
  KEY `saranakode_sarana` (`kode_sarana`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`kode_sarana`, `nama_gedung`, `no_lantai`, `jenis`, `luas_ruangan`, `tinggi_ruangan`, `jumlah_pintu`, `jumlah_jendela`) VALUES
('srn001', 'ICT', 2, 'Lab Komputer', 30, 5, 3, 6),
('srn002', 'Musholla Al-Alkbar', 1, 'Musholla', 10, 30, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sarana_barang`
--

CREATE TABLE IF NOT EXISTS `sarana_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `no_barang` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jumlah_baik` smallint(6) NOT NULL,
  `jumlah_rusak` smallint(6) NOT NULL,
  `dana_pengadaan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sarana_barangkode_sarana` (`kode_sarana`),
  KEY `sarana_barangnomor_barang` (`no_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sarana_barang`
--

INSERT INTO `sarana_barang` (`id`, `kode_sarana`, `no_barang`, `jumlah_baik`, `jumlah_rusak`, `dana_pengadaan`) VALUES
(3, 'srn002', 'brg004', 20, 0, 1250000),
(2, 'srn002', 'brg002', 15, 0, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `sarana_internet`
--

CREATE TABLE IF NOT EXISTS `sarana_internet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `titik_koneksi` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `kondisi` set('Rusak','Baik') COLLATE latin1_general_ci NOT NULL DEFAULT 'Baik',
  PRIMARY KEY (`id`),
  KEY `prasarana_internetkode_sarana` (`kode_sarana`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sarana_internet`
--

INSERT INTO `sarana_internet` (`id`, `kode_sarana`, `titik_koneksi`, `kondisi`) VALUES
(8, 'srn002', 'Utara Masjid', 'Baik'),
(9, 'srn002', 'Timur Masjid', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_listrik`
--

CREATE TABLE IF NOT EXISTS `sarana_listrik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `id_listrik` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kondisi` set('Baik','Rusak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Baik',
  PRIMARY KEY (`id`),
  KEY `sarana_barangkode_sarana` (`kode_sarana`),
  KEY `sarana_barangnomor_barang` (`id_listrik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sarana_listrik`
--

INSERT INTO `sarana_listrik` (`id`, `kode_sarana`, `id_listrik`, `kondisi`) VALUES
(14, 'srn002', 'lst001', 'Baik'),
(11, 'srn002', 'lst002', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_pdam`
--

CREATE TABLE IF NOT EXISTS `sarana_pdam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `titik_kran` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `kondisi_saluran` set('Rusak','Baik') COLLATE latin1_general_ci NOT NULL DEFAULT 'Baik',
  PRIMARY KEY (`id`),
  KEY `prasarana_pdamkode_sarana` (`kode_sarana`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sarana_pdam`
--

INSERT INTO `sarana_pdam` (`id`, `kode_sarana`, `titik_kran`, `kondisi_saluran`) VALUES
(1, 'srn002', 'Kamar Mandi', 'Baik'),
(2, 'srn002', 'Area Wudlu-I (Timur)', 'Baik'),
(3, 'srn002', 'Kamar Mandi Depan', 'Rusak'),
(4, 'srn002', 'Cuci Muka', 'Baik'),
(5, 'srn002', 'Area Wudhu-II (Barat)', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_telpon`
--

CREATE TABLE IF NOT EXISTS `sarana_telpon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sarana` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `id_telp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kondisi` set('Rusak','Baik') COLLATE latin1_general_ci NOT NULL DEFAULT 'Baik',
  `terhubung_internet` set('Tidak','Ya') COLLATE latin1_general_ci NOT NULL DEFAULT 'Tidak',
  PRIMARY KEY (`id`),
  KEY `sarana_barangkode_sarana` (`kode_sarana`),
  KEY `sarana_barangnomor_barang` (`id_telp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sarana_telpon`
--

INSERT INTO `sarana_telpon` (`id`, `kode_sarana`, `id_telp`, `kondisi`, `terhubung_internet`) VALUES
(3, 'srn002', 'tlp005', 'Rusak', 'Ya'),
(2, 'srn002', 'tlp003', 'Baik', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `pass`, `nama`, `alamat`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Hanani Fadilah', 'Banjarmasin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
