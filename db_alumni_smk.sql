-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 11:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'AKL'),
(2, 'OTKP'),
(3, 'BDP'),
(4, 'TKJ'),
(5, 'RPL'),
(6, 'MM'),
(7, 'APL'),
(8, 'UPW'),
(9, 'PSPR'),
(10, 'PSPT');

-- --------------------------------------------------------

--
-- Table structure for table `t_kegiatan`
--

CREATE TABLE `t_kegiatan` (
  `id_kegiatan` int(1) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kegiatan`
--

INSERT INTO `t_kegiatan` (`id_kegiatan`, `nama`) VALUES
(1, 'Bekerja'),
(2, 'Kuliah'),
(3, 'Wirausaha'),
(4, 'Option');

-- --------------------------------------------------------

--
-- Table structure for table `t_kegiatan_bekerja`
--

CREATE TABLE `t_kegiatan_bekerja` (
  `id_jenis_kerja` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sektor` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_kegiatan_kuliah`
--

CREATE TABLE `t_kegiatan_kuliah` (
  `id_jenis_kuliah` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perguruan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kegiatan_kuliah`
--

INSERT INTO `t_kegiatan_kuliah` (`id_jenis_kuliah`, `nama_perguruan`, `fakultas`, `jurusan`) VALUES
('03710901f9d12f609ce37724a57987fc', 'Politeknik Gorontalo', 'Teknik Informatika', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `t_kegiatan_option`
--

CREATE TABLE `t_kegiatan_option` (
  `id_jenis_option` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_kegiatan_wirausaha`
--

CREATE TABLE `t_kegiatan_wirausaha` (
  `id_jenis_wirausaha` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_operator`
--

CREATE TABLE `t_operator` (
  `kd` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_operator`
--

INSERT INTO `t_operator` (`kd`, `nama`) VALUES
('37832cda757792aef82ce5e21f542006', 'operator1');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_kegiatan` int(1) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`nis`, `nama`, `alamat`, `no_hp`, `j_kelamin`, `tahun_angkatan`, `id_jurusan`, `id_kegiatan`, `foto`) VALUES
('24888', 'Novi', NULL, '081234567890', 'P', 2018, 1, NULL, NULL),
('24889', 'Tasya', NULL, '081234567890', 'P', 2018, 2, NULL, NULL),
('24890', 'Aura', NULL, '081234567890', 'P', 2018, 3, NULL, NULL),
('24891', 'Tirsa', NULL, '081234567890', 'P', 2019, 4, NULL, NULL),
('24892', 'Mercy', NULL, '081234567890', 'P', 2019, 6, NULL, NULL),
('24893', 'Tiara', NULL, '081234567890', 'P', 2019, 7, NULL, NULL),
('24894', 'Anisa', NULL, '081234567890', 'P', 2019, 8, NULL, NULL),
('24895', 'Fauzia', NULL, '081234567890', 'P', 2019, 9, NULL, NULL),
('24896', 'Ester', NULL, '081234567890', 'P', 2019, 5, NULL, NULL),
('24897', 'Anita', NULL, '081234567890', 'P', 2019, 10, NULL, NULL),
('24898', 'Rizqy Arham Fahmid', 'Jl Durian No. 54 RT1', '0823887223928', 'L', 2019, 5, 2, '24898618dfc9bbb3dd.png'),
('29888', 'Alim', NULL, '081234567890', 'P', 2017, 1, NULL, NULL),
('29889', 'Rijal', NULL, '081234567890', 'P', 2017, 2, NULL, NULL),
('29890', 'Sayful', NULL, '081234567890', 'P', 2017, 3, NULL, NULL),
('29891', 'Erwin', NULL, '081234567890', 'P', 2017, 4, NULL, NULL),
('29892', 'Frangku', NULL, '081234567890', 'P', 2017, 6, NULL, NULL),
('29893', 'Salim', NULL, '081234567890', 'P', 2018, 7, NULL, NULL),
('29894', 'Abidin', NULL, '081234567890', 'P', 2018, 8, NULL, NULL),
('29895', 'Ismael', NULL, '081234567890', 'P', 2018, 9, NULL, NULL),
('29896', 'Fbker', NULL, '081234567890', 'P', 2018, 5, NULL, NULL),
('29897', 'Zainudin', NULL, '081234567890', 'P', 2018, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_temp`
--

CREATE TABLE `t_temp` (
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_kegiatan` int(1) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_temp`
--

INSERT INTO `t_temp` (`nis`, `nama`, `alamat`, `no_hp`, `j_kelamin`, `tahun_angkatan`, `id_jurusan`, `id_kegiatan`, `foto`) VALUES
('24888', 'Novi', '', '81234567890', 'P', 2018, 1, NULL, NULL),
('24889', 'Tasya', '', '81234567890', 'P', 2018, 2, NULL, NULL),
('24890', 'Aura', '', '81234567890', 'P', 2018, 3, NULL, NULL),
('24891', 'Tirsa', '', '81234567890', 'P', 2019, 4, NULL, NULL),
('24892', 'Mercy', '', '81234567890', 'P', 2019, 6, NULL, NULL),
('24893', 'Tiara', '', '81234567890', 'P', 2019, 7, NULL, NULL),
('24894', 'Anisa', '', '81234567890', 'P', 2019, 8, NULL, NULL),
('24895', 'Fauzia', '', '81234567890', 'P', 2019, 9, NULL, NULL),
('24896', 'Ester', '', '81234567890', 'P', 2019, 5, NULL, NULL),
('24897', 'Anita', '', '81234567890', 'P', 2019, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katasandi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd`, `katasandi`, `id_role`) VALUES
('03710901f9d12f609ce37724a57987fc', '24898', 2),
('21232f297a57a5a743894a0e4a801fc3', 'root', 1),
('37832cda757792aef82ce5e21f542006', 'adminA1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(1) NOT NULL,
  `id_menu` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(3) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `nama`, `icon`, `is_activated`) VALUES
(1, 'dashboard', 'fas fa-fw fa-chart-pie', '1'),
(2, 'tables', 'fas fa-fw fa-file-invoice', '1'),
(3, 'data siswa', 'fas fa-fw fa-user-graduate', '0'),
(4, 'profile', 'fas fa-fw fa-user-graduate', '1'),
(5, 'kegiatan', 'fas fa-fw fa-briefcase', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(1) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama`) VALUES
(1, 'Operator'),
(2, 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `t_kegiatan`
--
ALTER TABLE `t_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `t_kegiatan_bekerja`
--
ALTER TABLE `t_kegiatan_bekerja`
  ADD PRIMARY KEY (`id_jenis_kerja`);

--
-- Indexes for table `t_kegiatan_kuliah`
--
ALTER TABLE `t_kegiatan_kuliah`
  ADD PRIMARY KEY (`id_jenis_kuliah`);

--
-- Indexes for table `t_kegiatan_option`
--
ALTER TABLE `t_kegiatan_option`
  ADD PRIMARY KEY (`id_jenis_option`);

--
-- Indexes for table `t_kegiatan_wirausaha`
--
ALTER TABLE `t_kegiatan_wirausaha`
  ADD PRIMARY KEY (`id_jenis_wirausaha`);

--
-- Indexes for table `t_operator`
--
ALTER TABLE `t_operator`
  ADD PRIMARY KEY (`kd`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `t_temp`
--
ALTER TABLE `t_temp`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_kegiatan`
--
ALTER TABLE `t_kegiatan`
  MODIFY `id_kegiatan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD CONSTRAINT `t_siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `t_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `t_siswa_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `t_kegiatan` (`id_kegiatan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
