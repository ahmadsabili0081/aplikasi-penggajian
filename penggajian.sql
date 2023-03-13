-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 04:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(125) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tunjangan` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan`, `uang_makan`) VALUES
(2, 'Fullstack Progammer', '17000000', '6000000', '150000'),
(3, 'UX/UX Designer', '15000000', '15000000', '1500000'),
(4, 'Back End Developer', '12000000', '1500000', '150000'),
(5, 'Front End Developer', '12000000', '1500000', '150000'),
(6, 'Staff Marketing', '10000000', '1000000', '150000'),
(8, 'IT Support', '13000000', '1000000', '150000'),
(9, 'HRD ', '15000000', '2000000', '150000'),
(10, 'Graphic Designer', '12000000', '1500000', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(5) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `jabatan` int(10) NOT NULL,
  `jml_hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alfa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `tahun`, `nik`, `nama_pegawai`, `jk`, `jabatan`, `jml_hadir`, `sakit`, `alfa`) VALUES
(3, '2', 2023, '367109281200002', 'Puspita Novalia', 'Perempuan', 6, 12, 32, 2),
(8, '02', 2023, '367109281200034', 'Cristiano Ronaldo', 'Laki-Laki', 3, 1, 1, 1),
(9, '02', 2023, '367109281200034', 'Dimas Aditya Suhandi', 'Laki-Laki', 10, 0, 0, 0),
(10, '02', 2023, '36710928120003', 'Lionel Messi', 'Laki-Laki', 9, 0, 0, 0),
(11, '02', 2023, '36710928120002', 'Mba nana', 'Perempuan', 9, 0, 0, 0),
(17, '03', 2023, '36710928120002', 'bukan nana deh', 'Perempuan', 9, 4, 1, 7),
(18, '03', 2023, '367109281200034', 'Cristiano Ronaldo', 'Laki-Laki', 3, 1, 1, 5),
(19, '03', 2023, '367109281200034', 'Dimas Aditya Suhandi', 'Laki-Laki', 10, 22, 12, 18),
(20, '03', 2023, '36710928120003', 'Lionel Messi', 'Laki-Laki', 9, 2, 2, 6),
(21, '03', 2023, '367109281200002', 'Puspita Novaliaa', 'Perempuan', 6, 4, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `images` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `jk`, `jabatan`, `tgl_masuk`, `status`, `images`, `email`, `password`, `id_role`) VALUES
(13, '3671092812000003', 'Ahmad Sabili Alghifari', 'Laki-Laki', 'Admin', '2023-01-29', '1', 'default.jpg', 'ahmadsabili0081@gmail.com', '$2y$10$BLs1A9B2izwJ6B6nh7FuNOQH/mrkogEbV8uSxSWVrWl/CaSa/d9V.', 1),
(15, '367109281200002', 'Puspita Novaliaa', 'Perempuan', '6', '2022-09-12', 'Karyawan Tetap', 'default2.jpg', 'puspita@gmail.com', '$2y$10$gBuI6riMQFqOS5J0J8eRu.f2HZJ7WsdSky3I4Gkr0FAHJNs2wGouO', 2),
(18, '36710928119992', 'Dimas Aditya Suhandi', 'Perempuan', '3', '2023-01-29', 'Karyawan Tetap', 'Foto_bili.jpeg', 'Dimas@gmail.com', '$2y$10$syk5SCbzayy49LdioQKl.uL90XM4.4dWlGhBHnJ0brWzvH8al4BUu', 2),
(20, '36710928120003', 'Lionel Messi', 'Laki-Laki', '9', '2023-02-05', 'Karyawan Tetap', 'skitch.png', 'messi@gmail.com', '$2y$10$WjP2WWkv0Dp8deuGFcTVKeS4.oFLwMLtqAFs1/deotam7hqqXv3ou', 2),
(21, '367109281200034', 'Cristiano Ronaldo', 'Laki-Laki', '3', '2023-02-12', 'Karyawan Tetap', '012-AHMAD-SABILI-ALGHIFARI1.jpg', 'ronaldo@gmail.com', '$2y$10$GL4MuWuLvNqfltU2J3BLyOTeqZq1FuGcIWqBvvEvv15Z7rhaK6PHi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id_potongan` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id_potongan`, `potongan`, `jml_potongan`) VALUES
(6, 'Alfa', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `admin`, `user`) VALUES
(1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD KEY `id_potongan` (`id_potongan`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
