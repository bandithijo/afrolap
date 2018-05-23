-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 02:54 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dw_tokos_`
--
CREATE SCHEMA IF NOT EXISTS `dw_tokos` DEFAULT CHARACTER SET utf8 ;
USE `dw_tokos` ;

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE IF NOT EXISTS `industri` (
  `idindustri` int(11) NOT NULL,
  `namaindustri` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`idindustri`, `namaindustri`) VALUES
(1, 'Importir'),
(2, 'Pabrik Bahan Kertas'),
(3, 'Pabrik Tekstil');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `idlokasi` int(11) NOT NULL,
  `propinsi` varchar(45) DEFAULT NULL,
  `negara` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `propinsi`, `negara`) VALUES
(1, 'Balikpapan', 'Kalimantan'),
(2, 'Tokyo', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `penjualan` bigint(20) DEFAULT NULL,
  `labapenjualan` bigint(20) DEFAULT NULL,
  `idwaktu` int(11) NOT NULL,
  `idlokasi` int(11) NOT NULL,
  `idindustri` int(11) NOT NULL,
  `idtipepelanggan` int(11) NOT NULL,
  `idproduk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan`, `labapenjualan`, `idwaktu`, `idlokasi`, `idindustri`, `idtipepelanggan`, `idproduk`) VALUES
(9309000000, 7190000000, 1, 1, 2, 2, 'PE 2'),
(2902000000, 2214000000, 1, 1, 3, 1, 'PE 1'),
(1501000000, 12000000000, 2, 1, 1, 2, 'WTP'),
(1002000000, 780000000, 3, 1, 3, 1, 'WDM');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` varchar(11) NOT NULL,
  `namaproduk` varchar(45) DEFAULT NULL,
  `hargabahan` bigint(20) DEFAULT NULL,
  `ongkosproduksi` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `hargabahan`, `ongkosproduksi`) VALUES
('PE 1', 'Pengencer Tipe 1', 500, 10),
('PE 2', 'Pengencer Tipe2', 1000, 10),
('WDM', 'Pewarna Dasar Merah', 1000, 100),
('WTP', 'Pewarna Tambahan Putih', 500, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tipepelanggan`
--

CREATE TABLE IF NOT EXISTS `tipepelanggan` (
  `idtipepelanggan` int(11) NOT NULL,
  `deskripsipelanggan` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipepelanggan`
--

INSERT INTO `tipepelanggan` (`idtipepelanggan`, `deskripsipelanggan`) VALUES
(1, 'Pabrik'),
(2, 'Importir');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `idwaktu` int(11) NOT NULL,
  `bulan` varchar(45) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`idwaktu`, `bulan`, `tahun`) VALUES
(1, '1', '2002'),
(2, '4', '2002'),
(3, '1', '2003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`idindustri`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`idlokasi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idwaktu`,`idlokasi`,`idindustri`,`idtipepelanggan`,`idproduk`), ADD KEY `fk_penjualan_lokasi1_idx` (`idlokasi`), ADD KEY `fk_penjualan_industri1_idx` (`idindustri`), ADD KEY `fk_penjualan_tipepelanggan1_idx` (`idtipepelanggan`), ADD KEY `fk_penjualan_produk1_idx` (`idproduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `tipepelanggan`
--
ALTER TABLE `tipepelanggan`
  ADD PRIMARY KEY (`idtipepelanggan`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`idwaktu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
ADD CONSTRAINT `fk_penjualan_industri1` FOREIGN KEY (`idindustri`) REFERENCES `industri` (`idindustri`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_penjualan_lokasi1` FOREIGN KEY (`idlokasi`) REFERENCES `lokasi` (`idlokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_penjualan_tipepelanggan1` FOREIGN KEY (`idtipepelanggan`) REFERENCES `tipepelanggan` (`idtipepelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_penjualan_waktu` FOREIGN KEY (`idwaktu`) REFERENCES `waktu` (`idwaktu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
