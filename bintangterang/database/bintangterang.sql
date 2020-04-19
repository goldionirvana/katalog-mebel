-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 03:19 PM
-- Server version: 5.5.62
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintangterang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgllahir` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `email`, `tgllahir`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2 April 2000', '$2y$10$QHSYy9ZkcWGaT4cOT9FUzuh6A68B7n5mHV/ItmhkVLT3V41/beL4W'),
(2, 'orang', 'orang1', 'orang1@gmail.com', '2januari2000', '$2y$10$svPRh2AfSD2I608alS3l7OAPZ0jCL7lx44p6wDL8FuiS6UfSU8K1y');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `deskripsi`, `harga`, `bahan`, `warna`, `ukuran`, `gambar`) VALUES
(1, 'mebelcoba1', 'ini hanya percobaan produknya', '500.000', 'kayu jati', 'biru', '4 x 4 m', '5e9c49513fb48.png'),
(2, 'coba2', 'ini mebel percobaan ke 2', '400.000', 'kulit', 'ungu', '4x4 m', '5e9c4f85e0ee2.png'),
(4, 'Bismillahirrahmanirrahim', 'Bismillahirrahmanirrahim', 'asfal', 'efo', 'efoo', 'ogfnqo', 'gonq'),
(6, 'ini coba benar', 'afon', 'afonon', 'adofn', 'odfgno', 'wodgn', '5e9c3bf300218.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
