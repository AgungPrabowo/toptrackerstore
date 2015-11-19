-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2015 at 04:22 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `no` int(5) NOT NULL,
  `username` char(25) NOT NULL,
  `password` char(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `username`, `password`) VALUES
(12, 'w', '0cc175b9c0f1b6a831c399e269772661'),
(19, 'q', 'f1290186a5d0b1ceab27f4e77c0c5d68');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(25) NOT NULL,
  `kategori` char(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'coba'),
(2, 'coba lagi');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(25) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nama` char(25) NOT NULL,
  `email` char(25) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_produk`, `nama`, `email`, `isi_komentar`, `tanggal`) VALUES
(4, 9, 'agung', 'agungprabowo11069@yahoo.c', '', 0),
(5, 9, 'aaa', 'ekolontong99@gmail.com', '', 0),
(6, 9, 'coba', 'toptracker05@yahoo.com', 'coba komentar', 0),
(7, 9, 'aha', 'p@y.com', '0', 0),
(8, 9, 'pa', 'toptracker05@yahoo.com', '0', 0),
(9, 9, 'aaa', 'agungprabowo112@gmail.com', 'coba lgi komentar', 1445251796),
(10, 9, 'ajax', 'ajax@gam.com', 'ajax', 1445253852),
(11, 9, 'lala', 'ajaxlagi@a.com', 'coba ajax', 1445253929),
(12, 9, 'lala1', 'ajaxlagi@a.com', 'coba ajax1', 1445254496),
(13, 9, 'lala1', 'ajaxlagi@a.com', 'coba ajax1', 1445260514),
(14, 9, 'lala1', 'ajaxlagi@a.com', 'coba ajax2', 1445260694),
(15, 9, 'lala1', 'ajaxlagi@a.com', 'coba ajax3', 1445261438),
(16, 0, '0', '0', '0', 1445261796),
(17, 9, 'agung', 'toptracker05@yahoo.com', 'ayax', 1445264030),
(18, 9, 'sdfadf', 'afardefa@dsfs.com', 'edrasdr', 1445264983),
(19, 9, 'popoop', 'alda@yah.com', 'wolo', 1445265013),
(20, 9, 'awak', 'agungprabowo110696@yahoo.', 'wa', 1445267565),
(21, 8, 'komentar', 'toptracker05@yahoo.com', 'ajax', 1445267611),
(22, 8, 'dfad', 'nldfna@y.com', 'nfjandf', 1445267653),
(23, 8, 'coba lagi', 'toptracker05@yahoo.com', 'coba lagi', 1445267689),
(24, 8, 'ad', 'ekolontong99@gmail.com', 'cobadfbkda', 1445267731),
(25, 8, 'coba nama', 'agungprabowo110696@yahoo.', 'aa', 1445268126),
(26, 8, 'ajax', 'agungprabowo110696@yahoo.', 'jquery', 1445269549),
(27, 8, 'nama', 'ekolontong99@gmail.com', 'komentar', 1445269608),
(28, 8, 'semangat', 'agungprabowo112@gmail.com', 'wawa', 1445270557),
(29, 8, 'sdfhuagdfoa8879', 'toptracker05@yahoo.com', 'dfcsdfsda', 1445270722),
(30, 0, '0', '0', '0', 1445288907),
(31, 6, 'agung', 'agungprabowo112@gmail.com', 'coba komentar', 1445289123);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` char(25) NOT NULL,
  `judul` char(25) NOT NULL,
  `harga` char(25) NOT NULL,
  `stok` char(25) NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` int(30) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `judul`, `harga`, `stok`, `isi`, `gambar`, `tanggal`, `aktif`) VALUES
(1, '1', 'coba judul', '50000000', '20', '<p>\n	<em>coba</em> <strong>Artikel</strong> <u>coba</u> <span style="font-size:48px;">artikel</span></p>\n<p>\n	&nbsp;</p>\n', '178501399f5faceb88adb59c4fd33d89.png', 0, 'Y'),
(3, '1', 'pp', '1000000', '50', '<p>\n	wqwqw</p>\n', 'cd5d38216a592fe8f8b3d301b678f627.png', 1443820536, 'Y'),
(4, '1', 'sss', '1380710', '30', '<p>\n	sss</p>\n', '361657ce52cba69d123288bd0ee5c7a3.png', 1443964854, 'Y'),
(5, '1', 'aha', '179313', '20', '<p>\n	aha</p>\n', '9d592a97586f2f8ef3856a7fb25cc0cf.png', 1443965171, 'Y'),
(6, '1', 'asa', '381093', '90', '<p>\n	asa</p>\n', 'e593a00149d745f6d27ba3338a302d5c.png', 1443965949, 'Y'),
(8, '1', 'coba kategori', '31001030', '15', '<p>\n	The first parameter can contain any segments you wish appended to the URL. As with the <dfn>site_url()</dfn> function above, segments can be a string or an array.</p>\n<p>\n	<strong>Note:</strong>&nbsp; If you are building links that are internal to your application do not include the base URL (http://...). This will be added automatically from the information specified in your config file. Include only the URI segments you wish appended to the URL.</p>\n<p>\n	The second segment is the text you would like the link to say. If you leave it blank, the URL will be used.</p>\n<p>\n	The third parameter can contain a list of attributes you would like added to the link. The attributes can be a simple string or an associative array.</p>\n<p>\n	Here are some examples:</p>\n', '7c5d51c801fe6bd372012ce386d15cf0.png', 1444424646, 'Y'),
(9, '1', 'coba harga', '150000000123', '50', '<p>\n	The first parameter can contain any segments you wish appended to the URL. As with the <dfn>site_url()</dfn> function above, segments can a be string or an array.</p>\n<p>\n	<strong>Note:</strong>&nbsp; If you are building links that are internal to your application do not include the base URL (http://...). This will be added automatically from the information specified in your config file. Include only the URI segments you wish appended to the URL.</p>\n<p>\n	The second segment is the text you would like the link to say. If you leave it blank, the URL will be used.</p>\n<p>\n	The third parameter can contain a list of attributes you would like added to the link. The attributes can be a simple string or an associative array.</p>\n<p>\n	Here are some examples:</p>\n', '604624c5abe227f9872b2a7b2139e4d3.png', 1444468081, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
