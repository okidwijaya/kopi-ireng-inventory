-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 01:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopiwowok`
--

-- --------------------------------------------------------

--
-- Table structure for table `jns_produk`
--

CREATE TABLE `jns_produk` (
  `id` int(11) NOT NULL,
  `kd_jns` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jns_produk`
--

INSERT INTO `jns_produk` (`id`, `kd_jns`, `nama_produk`) VALUES
(3, 'KB-120', 'Biji Kopi'),
(4, 'BK-110', 'Bubuk Kopi'),
(5, 'KL-110', 'Kopi Luwak'),
(6, 'KB-110', 'KOPI BUBUK BANARAN'),
(7, 'KB-1030', 'Kopi Eva');

-- --------------------------------------------------------

--
-- Table structure for table `pemb_bhn`
--

CREATE TABLE `pemb_bhn` (
  `id` int(11) NOT NULL,
  `nm_bhn` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_bhn`
--

INSERT INTO `pemb_bhn` (`id`, `nm_bhn`, `jumlah`, `harga`, `tanggal`, `keterangan`) VALUES
(1, 'gas', 3, 21000, '2019-06-05', ''),
(2, 'biji kopi mentah', 2, 16000, '2019-06-10', ''),
(3, 'plastik', 1, 5000, '2019-06-06', ''),
(4, 'oprasional', 1, 50000, '2019-06-05', ''),
(5, 'penggilingan', 2, 50000, '2019-07-07', 'satu kali penggilingan 25000'),
(8, 'kantong PLastik', 1, 4500, '2019-07-07', 'jumlah perlusin');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_produk` int(11) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `stok` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_jns` varchar(255) NOT NULL,
  `stok` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_jns`, `stok`, `harga`, `tanggal`, `keterangan`) VALUES
(11, 'BK-110', 10000, 200000, '2019-06-07', ''),
(12, 'KB-1030', 400, 30000, '2019-06-05', ''),
(13, 'KB-120', 10, 160000, '2019-06-30', ''),
(14, 'KB-120', 6, 100000, '2019-07-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role_id`, `is_active`, `date_created`) VALUES
(17, 'Ardianto Wibowo', '$2y$10$O5ahkz3Y1ry531bu3vmE6usdQ8dkIe/wSFL3ZYGq9dw0pWw1LXqFa', 'ardiw4357@gmail.com', 1, 1, 1558381506),
(18, 'oki dwijaya', '$2y$10$nZ2Yn7fULaFjofQ2LjcelOBAJb4zJ1eX5cmx8uEJv6ZV0dcDg1oW.', 'okidwijaya@gmail.com', 2, 1, 1559384989);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_role`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Admin'),
(4, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jns_produk`
--
ALTER TABLE `jns_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemb_bhn`
--
ALTER TABLE `pemb_bhn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `nm_produk` (`nm_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jns_produk`
--
ALTER TABLE `jns_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pemb_bhn`
--
ALTER TABLE `pemb_bhn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
