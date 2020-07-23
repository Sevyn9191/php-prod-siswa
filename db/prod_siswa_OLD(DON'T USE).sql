-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 03:07 PM
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
('HR-0001', 'Spp', '150001', 'KR-0001');

-- --------------------------------------------------------

--
-- Table structure for table `isi`
--

CREATE TABLE `isi` (
  `No_Kwitansi` varchar(15) NOT NULL,
  `Kd_Biaya` varchar(15) NOT NULL,
  `Jumlah` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi`
--

INSERT INTO `isi` (`No_Kwitansi`, `Kd_Biaya`, `Jumlah`) VALUES
('KI-0001', 'HR-0001', '150001');

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
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `Kd_Karyawan`, `Nama`, `Alamat`, `No_HP`, `Status`) VALUES
('US-0001', 'KR-0001', 'makaveli', 'Jl. Boulvard Gunawarman', '08569779678', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `No_Kwitansi` varchar(15) NOT NULL,
  `Tgl_Kwitansi` date NOT NULL,
  `Nis` varchar(15) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`No_Kwitansi`, `Tgl_Kwitansi`, `Nis`, `Kd_Karyawan`) VALUES
('KI-0001', '2020-06-20', 'SW-0001', 'KR-0001');

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
  `Agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`No_Daftar`, `Tgl_Daftar`, `Nm_CaSis`, `As_Sek`, `Tmpt_Lahir`, `Tgl_Lahir`, `Jen_Kel`, `Agama`) VALUES
('CS-0002', '2020-06-01', 'Kevin', 'Sma 12 Tangerang', 'Jakarta', '1996-12-01', 'Pria', 'Mayoritas'),
('CS-0003', '2020-05-01', 'stefia', 'MAN 1 JAKARTA', 'JAKARTA', '1998-09-10', 'Perempuan', 'Mayoritas'),
('CS-0004', '2020-05-02', 'Samuel', 'BINUS JAKARTA', 'JAKARTA', '2000-01-01', 'Pria', 'Minoritas'),
('CS-0005', '2020-05-03', 'Dedi Sudedi', 'SMA PUTRA SATRIA', 'Tangerang', '1998-09-09', 'Pria', 'Mayoritas'),
('CS-0006', '2020-05-04', 'Faniya', 'SMA YAPERA', 'Tangerang', '2000-09-10', 'Pria', 'Mayoritas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `Nis` varchar(15) NOT NULL,
  `Nm_Sis` varchar(255) NOT NULL,
  `As_Sek` varchar(255) NOT NULL,
  `Tmpt_Lahir` varchar(100) NOT NULL,
  `Tgl_Lhr_Sis` date NOT NULL,
  `Jen_Kel` varchar(20) NOT NULL,
  `Agama_Sis` varchar(20) NOT NULL,
  `Almt_Sis` text NOT NULL,
  `Nm_Ayah_Sis` varchar(255) NOT NULL,
  `Nm_Ibu_Sis` varchar(255) NOT NULL,
  `Al_Ortu_Sis` text NOT NULL,
  `No_HP_Sis` varchar(15) NOT NULL,
  `Nm_Wali` varchar(255) DEFAULT NULL,
  `Al_Wali` text DEFAULT NULL,
  `No_Daftar` varchar(15) NOT NULL,
  `Kd_Karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Nis`, `Nm_Sis`, `As_Sek`, `Tmpt_Lahir`, `Tgl_Lhr_Sis`, `Jen_Kel`, `Agama_Sis`, `Almt_Sis`, `Nm_Ayah_Sis`, `Nm_Ibu_Sis`, `Al_Ortu_Sis`, `No_HP_Sis`, `Nm_Wali`, `Al_Wali`, `No_Daftar`, `Kd_Karyawan`) VALUES
('SW-0001', 'Kevin', 'Sma 12 Tangerang', 'Jakarta', '1996-12-01', 'Pria', 'Mayoritas', 'Jl. Boulvard Gunawarman', 'kulkus', 'ya kus', 'jl. sinden 3', '0812818213', '', '', 'CS-0002', 'KR-0001');

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
('makaveli', '65493ec997ddc4e71fa60551d510374c', 'US-0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`Kd_Biaya`),
  ADD KEY `by_kar_cs` (`Kd_Karyawan`);

--
-- Indexes for table `isi`
--
ALTER TABLE `isi`
  ADD KEY `isi_kd_kw1_cs` (`Kd_Biaya`),
  ADD KEY `isi_kd_kw2_cs` (`No_Kwitansi`);

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
  ADD KEY `kw_sis_cs` (`Nis`),
  ADD KEY `kw_kar_cs` (`Kd_Karyawan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`No_Daftar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Nis`),
  ADD KEY `dftr_sis_cs` (`No_Daftar`),
  ADD KEY `sis_adm_cs` (`Kd_Karyawan`);

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
  ADD CONSTRAINT `by_kar_cs` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isi`
--
ALTER TABLE `isi`
  ADD CONSTRAINT `isi_kd_kw1_cs` FOREIGN KEY (`Kd_Biaya`) REFERENCES `biaya` (`Kd_Biaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `isi_kd_kw2_cs` FOREIGN KEY (`No_Kwitansi`) REFERENCES `kwitansi` (`No_Kwitansi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `kar_user_cs` FOREIGN KEY (`NIK`) REFERENCES `user` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD CONSTRAINT `kw_kar_cs` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kw_sis_cs` FOREIGN KEY (`Nis`) REFERENCES `siswa` (`Nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `dftr_sis_cs` FOREIGN KEY (`No_Daftar`) REFERENCES `pendaftaran` (`No_Daftar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sis_adm_cs` FOREIGN KEY (`Kd_Karyawan`) REFERENCES `karyawan` (`Kd_Karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
