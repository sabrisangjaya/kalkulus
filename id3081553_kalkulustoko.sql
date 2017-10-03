-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2017 at 02:53 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3081553_kalkulustoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` text NOT NULL,
  `beli_barang` double UNSIGNED NOT NULL,
  `jual_barang` double UNSIGNED NOT NULL,
  `tglmasuk_barang` datetime NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `beli_barang`, `jual_barang`, `tglmasuk_barang`, `stok_barang`) VALUES
(1, 'MB1000', 'Makanan kucing', 5000, 6000, '2017-09-20 00:00:00', 6),
(2, 'MB1001', 'Makanan bayi', 5000, 6000, '2017-09-20 00:00:00', 6),
(4, 'KL124', 'Cat', 5000, 9000, '0000-00-00 00:00:00', 7),
(6, 'KL123', 'Semen', 4000, 7000, '0000-00-00 00:00:00', 15),
(9, 'MB', '', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'MBB', '', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pertahun`
--

CREATE TABLE `laporan_pertahun` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `laba` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_pertahun`
--

INSERT INTO `laporan_pertahun` (`id`, `tahun`, `laba`) VALUES
(1, 2010, 1000000),
(2, 2011, 1500000),
(3, 2012, 2000000),
(4, 2013, 2200000),
(5, 2014, 2500000),
(6, 2015, 2750000),
(7, 2016, 2950000),
(8, 2017, 3125000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `laporan_pertahun`
--
ALTER TABLE `laporan_pertahun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `laporan_pertahun`
--
ALTER TABLE `laporan_pertahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
