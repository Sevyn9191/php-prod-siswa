-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 04:39 PM
-- Server version: 10.4.6-MariaDB
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
-- Database: `prod_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `Kd_Biaya` varchar(15) NOT NULL,
  `Nm_Biaya` varchar(255) NOT NULL,
  `Besar_Biaya` decimal(10,0) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`Kd_Biaya`, `Nm_Biaya`, `Besar_Biaya`, `Kd_Karyawan`) VALUES
('HR-0001', 'formulir pendaftaran', '100000', 'KR-0003'),
('HR-0002', 'kesehatan', '50000', 'KR-0003'),
('HR-0003', 'spp', '200000', 'KR-0003'),
('HR-0004', 'uts', '300000', 'KR-0003'),
('HR-0005', 'uas', '400000', 'KR-0003'),
('HR-0006', 'praktikum', '75001', 'KR-0003');

-- --------------------------------------------------------

--
-- Table structure for table `isi`
--

CREATE TABLE `isi` (
  `No_Kwitansi` varchar(15) NOT NULL,
  `Kd_Biaya` varchar(15) NOT NULL,
  `Jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi`
--

INSERT INTO `isi` (`No_Kwitansi`, `Kd_Biaya`, `Jumlah`) VALUES
('KI-0001', 'HR-0001', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK` varchar(15) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `No_HP` varchar(15) NOT NULL,
  `Jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `Kd_Karyawan`, `Nama`, `Alamat`, `No_HP`, `Jabatan`) VALUES
('US-0004', 'KR-0003', 'makaveli', 'Jl. XXX21', '08138395820', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `No_Kwitansi` varchar(15) NOT NULL,
  `Tgl_Kwitansi` date NOT NULL,
  `Nis` varchar(15) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL,
  `No_Daftar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`No_Kwitansi`, `Tgl_Kwitansi`, `Nis`, `Kd_Karyawan`, `No_Daftar`) VALUES
('KI-0001', '2020-07-19', 'SW-0001', 'KR-0003', 'DF-0001');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `No_Daftar` varchar(15) NOT NULL,
  `Tgl_Daftar` date NOT NULL,
  `Nm_CaSis` varchar(255) NOT NULL,
  `As_Sek` varchar(255) NOT NULL,
  `Tmpt_Lahir` varchar(100) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Jen_Kel` varchar(20) NOT NULL,
  `Agama_Sis` varchar(20) NOT NULL,
  `Almt_Sis` text NOT NULL,
  `Nm_Ayah_Sis` varchar(255) NOT NULL,
  `Nm_Ibu_Sis` varchar(255) NOT NULL,
  `Al_Ortu_Sis` text NOT NULL,
  `No_HP_Sis` varchar(15) NOT NULL,
  `Nm_Wali` varchar(255) DEFAULT NULL,
  `Al_Wali` text DEFAULT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`No_Daftar`, `Tgl_Daftar`, `Nm_CaSis`, `As_Sek`, `Tmpt_Lahir`, `Tgl_Lahir`, `Jen_Kel`, `Agama_Sis`, `Almt_Sis`, `Nm_Ayah_Sis`, `Nm_Ibu_Sis`, `Al_Ortu_Sis`, `No_HP_Sis`, `Nm_Wali`, `Al_Wali`, `Kd_Karyawan`, `status`) VALUES
('DF-0001', '2020-06-07', 'makaveli a', 'smp sumpah pemuda', 'Jakarta', '2000-09-09', 'pria', 'yahudi', 'Jl. Ciledug Raya', 'frans', 'sania', 'jl. Ciledug Raya', '0967816612', '', '', 'KR-0003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `Nis` varchar(15) NOT NULL,
  `No_Daftar` varchar(15) NOT NULL,
  `Jurusan` varchar(101) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Nis`, `No_Daftar`, `Jurusan`, `Kd_Karyawan`) VALUES
('SW-0001', 'DF-0001', 'akutansi', 'KR-0003');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NIK` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Password`, `NIK`) VALUES
('makaveli', 'd3197fb64e031c6be6a9e2005a2fbe9a', 'US-0004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`Kd_Biaya`),
  ADD KEY `pk_kar_by` (`Kd_Karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`Kd_Karyawan`),
  ADD KEY `kar_user_cs` (`NIK`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`No_Kwitansi`),
  ADD KEY `kw_nis` (`Nis`),
  ADD KEY `kw_kar_cs` (`Kd_Karyawan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`No_Daftar`),
  ADD KEY `cs_karyawan_pend` (`Kd_Karyawan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Nis`),
  ADD KEY `pk_daf` (`No_Daftar`),
  ADD KEY `pk_kar` (`Kd_Karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biaya`
--
ALTER TABLE `biaya`
  ADD CONSTRAINT `pk_kar_by` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `kar_user_cs` FOREIGN KEY (`NIK`) REFERENCES `user` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD CONSTRAINT `kw_kar_cs` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `cs_karyawan_pend` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `pk_daf` FOREIGN KEY (`No_Daftar`) REFERENCES `pendaftaran` (`No_Daftar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_kar` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
