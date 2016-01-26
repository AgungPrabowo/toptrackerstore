-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2016 at 04:27 
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_order` int(10) NOT NULL,
  `kode_sales` char(10) NOT NULL,
  `id_pesanan` char(10) NOT NULL,
  `nm_produk` char(50) NOT NULL,
  `harga` char(25) NOT NULL,
  `qty` char(10) NOT NULL,
  `nama_toko` char(50) NOT NULL,
  `nm_penerima` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` char(10) NOT NULL,
  `status` char(10) NOT NULL,
  `no_telp` char(25) NOT NULL,
  `total` char(50) NOT NULL,
  `tgl_beli` char(30) NOT NULL,
  `resi` char(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_order`, `kode_sales`, `id_pesanan`, `nm_produk`, `harga`, `qty`, `nama_toko`, `nm_penerima`, `alamat`, `kode_pos`, `status`, `no_telp`, `total`, `tgl_beli`, `resi`) VALUES
(1, '4992', '1996', 'Meitrack - MVT800', '31001030', '1', '22', 'Aku', 'jl. bukit barisan', '50245', 'Terkirim', '089640192828', '0', '1443820536', ''),
(2, '4992', '1996', 'Meitrack - MVT800', '1500000', '100', '22', 'Aku', 'jl.bendungan', '50245', 'Terkirim', '089640192828', '150000000', '1443820536', ''),
(3, '4992', '1996', 'Meitrack - MVT800', '1500000', '1', '22', 'Aku', '', '50245', 'Terkirim', '089640192828', '1500000', '1443820536', ''),
(4, '4992', '1995', 'Meitrack - MVT800', '1500000', '1', '20', 'Prabowo', 'jl.bendungan', '50245', 'Terkirim', '809739293937', '1500000', '1443820536', 'srgb137691341'),
(5, '4992', '1995', 'Meitrack - MVT800', '1500000', '1', '20', 'Prabowo', 'jl.bukit barisan', '50245', 'Tertunda', '809739293937', '1500000', '1443820536', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
