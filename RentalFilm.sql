-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2013 at 11:36 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentalfilm`
--
CREATE DATABASE `rentalfilm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentalfilm`;

-- --------------------------------------------------------

--
-- Table structure for table `tbfilm`
--

CREATE TABLE IF NOT EXISTS `tbfilm` (
  `id_film` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_katagori_` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_rak_` varchar(3) NOT NULL,
  `sinopsis` text NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfilm`
--

INSERT INTO `tbfilm` (`id_film`, `judul`, `id_katagori_`, `jumlah`, `stock`, `harga_sewa`, `harga_beli`, `tgl_masuk`, `keterangan`, `id_rak_`, `sinopsis`) VALUES
('1123215375', 'Secret Admirer', 1, 2, 2, 5000, 50000, '2013-11-23', '', 'A12', 'dwi');

-- --------------------------------------------------------

--
-- Table structure for table `tbitempeminjaman`
--

CREATE TABLE IF NOT EXISTS `tbitempeminjaman` (
  `id_item_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` varchar(20) NOT NULL,
  `id_film` varchar(10) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `kembali` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  PRIMARY KEY (`id_item_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbkatagori`
--

CREATE TABLE IF NOT EXISTS `tbkatagori` (
  `id_katagori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katagori` varchar(20) NOT NULL,
  `Keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_katagori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbkatagori`
--

INSERT INTO `tbkatagori` (`id_katagori`, `nama_katagori`, `Keterangan`) VALUES
(1, 'Action', 'aaa'),
(2, 'Asian', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `tbmember`
--

CREATE TABLE IF NOT EXISTS `tbmember` (
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `identitas` varchar(10) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmember`
--

INSERT INTO `tbmember` (`id_member`, `nama_member`, `alamat`, `tgl_lahir`, `identitas`, `no_identitas`, `telepon`, `email`) VALUES
('11241210756', 'kadekjayak', 'JL. Betaka', '1993-03-25', 'KTP', '123123', '08113854799', 'kadekjayak@yahoo.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE IF NOT EXISTS `tbpegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpeminjaman`
--

CREATE TABLE IF NOT EXISTS `tbpeminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `tgl_pinjam` int(11) NOT NULL,
  `id_member` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbrak`
--

CREATE TABLE IF NOT EXISTS `tbrak` (
  `id_rak` varchar(3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbrak`
--

INSERT INTO `tbrak` (`id_rak`, `keterangan`) VALUES
('A12', 'Rak Bawah Deket Pintu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
