-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 03:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbl2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_menu`
--

CREATE TABLE `tbl_akses_menu` (
  `id_akses_menu` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akses_menu`
--

INSERT INTO `tbl_akses_menu` (`id_akses_menu`, `id_pengguna`, `menu_id`) VALUES
(1, 59, 1),
(14, 3, 3),
(26, 59, 8),
(30, 3, 2),
(32, 3, 5),
(93, 1, 3),
(95, 1, 5),
(97, 1, 6),
(99, 2, 6),
(100, 2, 7),
(104, 2, 2),
(112, 2, 5),
(113, 2, 3),
(115, 1, 7),
(118, 59, 5),
(119, 59, 3),
(121, 59, 6),
(135, 1, 1),
(136, 59, 2),
(137, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `mahasiswa_nama` varchar(50) NOT NULL,
  `mahasiswa_nim` int(20) NOT NULL,
  `mahasiswa_tanggallahir` date NOT NULL DEFAULT current_timestamp(),
  `prodi_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `mahasiswa_nama`, `mahasiswa_nim`, `mahasiswa_tanggallahir`, `prodi_id`, `proyek_id`) VALUES
(6, 'Bambang', 200130111, '2022-11-16', 1, 34),
(7, 'Muhammad Syupyan Arpan', 2001301157, '2022-11-10', 5, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `matakuliah_nama` varchar(30) NOT NULL,
  `matakuliah_sks` int(15) NOT NULL,
  `matakuliah_tahunajaran` year(4) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matakuliah`, `matakuliah_nama`, `matakuliah_sks`, `matakuliah_tahunajaran`, `prodi_id`) VALUES
(15, 'IOT', 5, 2022, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` tinyint(4) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'PENGUSUL'),
(5, 'PENINJAU'),
(6, 'MANAJER PROYEK'),
(7, 'KEPALA PROYEK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengusul` int(11) NOT NULL,
  `peninjau` int(11) NOT NULL,
  `cpo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `pengguna_status`, `date_created`, `pengusul`, `peninjau`, `cpo`) VALUES
(1, 'Norfifah1', 'Norfifah20@gmail.com', '$2y$10$gaiKkAlcgYE5gaoWP.y/POJgCKT.ABSWNTcW1CCoDBj31aOCoNz/6', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview.jpg', 1, '2022-11-25 23:59:30', 1, 0, 0),
(59, 'Syupyan1', 'Syupyan@gmail.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgp', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-25 23:50:24', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna_menu`
--

CREATE TABLE `tbl_pengguna_menu` (
  `id_pengguna_menu` int(11) NOT NULL,
  `pengguna_menu_title` varchar(50) NOT NULL,
  `pengguna_menu_icon` varchar(80) NOT NULL,
  `pengguna_menu_url` varchar(50) NOT NULL,
  `pengguna_menu_status` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna_menu`
--

INSERT INTO `tbl_pengguna_menu` (`id_pengguna_menu`, `pengguna_menu_title`, `pengguna_menu_icon`, `pengguna_menu_url`, `pengguna_menu_status`, `menu_id`) VALUES
(1, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 1),
(2, 'Pengguna', 'nav-icon fas fa-users', 'admin/master-pengguna', 1, 1),
(3, 'Prodi', 'nav-icon fas fa-building', 'admin/master-prodi', 1, 1),
(4, 'Dashboard Pengusul', 'nav-icon fas fa-tachometer-alt', 'pengusul', 1, 3),
(5, 'Tulis Usulan', 'nav-icon fas fa-clipboard', 'pengusul/write-usulan', 1, 3),
(10, 'Profil Saya', 'nav-icon fas fa-user', 'user', 1, 2),
(11, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 1, 2),
(14, 'Data Usulan', 'nav-icon fas fa-calendar', 'admin/Master_usulan/read_all_message', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-solid fa-folder-tree', 'admin/master-menu', 1, 1),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Data Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Data Ruang', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul/write-usulan', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'peninjau', 1, 5),
(31, 'Menunggu Reviewer', 'nav-icon fas fa-circle-pause', 'Reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'Reviewer', 1, 5),
(34, 'Usulan Diterima', 'nav-icon fas fa-check-to-slot', 'Reviewer', 1, 5),
(35, 'CPO Proyek', 'nav-icon fas fa-image-portrait', 'cpo', 1, 7),
(36, 'Kelola Proyek', 'nav-icon fas fa-regular fa-bars-progress', 'Meneger Proyek', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna_token`
--

CREATE TABLE `tbl_pengguna_token` (
  `id` mediumint(9) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna_token`
--

INSERT INTO `tbl_pengguna_token` (`id`, `token`, `email`, `date_created`) VALUES
(1, '+r+KrYDjuPbo0TcLbtjXugcWIThU/MPeKPMTJlAZzyI=', 'syupyan@gmail.com', '2022-11-13 13:31:23'),
(2, 'JzjR5BHSFW02ETu32vVswmH2s/L8rSAzuwYG3Iz0tlg=', 'syupyan@gmail.com', '1668317727'),
(3, 'IE+GPbIIAQLLfjEqLGODEfUD5eT+ZxQ/quYIyRBu8rQ=', 'syupyan@gmail.com', '1668317861'),
(4, 'mTa57/dCwPe/bK7SIj1rjjILDH9TQsATuqsZEhSC59k=', 'syupyan@gmail.com', '1668317935'),
(5, 'OOV5DqdQRMhqDslV+5KXs464gLrLoY6k9K+5Xyq+7Rk=', 'syupyan@gmail.com', '1668317948'),
(6, 'GNBKjTf+LEZEFmj8DX2jvFSfzZVRA0MPJUP3CUxB6c4=', 'admin@example.com', '1668317970'),
(7, 'Xd67EFlWrrP+/YpeXK7l/cTlt5Jxj5L3Vk7dXXhfaFA=', 'admin@example.com', '1668318085'),
(8, '//1do4Cu/C+5eu9w39m/3HiuujYVYfE7M7HjCut+PVE=', 'syupyan@gmail.com', '1668318133'),
(9, 'kL4hkrLR3pPag8n1VTA/HpDCJkFfvFfvm0ZfibXeH9Q=', 'syupyan@gmail.com', '1668318712'),
(10, 'gaJVpifNkoGmg4fH+37aUuLKoGeOke0KnOXmmfbW2r4=', 'syupyan@gmail.com', '1668318731');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` tinyint(4) NOT NULL,
  `prodi_nama` varchar(50) NOT NULL,
  `prodi_alias` varchar(20) NOT NULL,
  `prodi_deskripsi` text NOT NULL,
  `prodi_gambar` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `prodi_nama`, `prodi_alias`, `prodi_deskripsi`, `prodi_gambar`, `jurusan`) VALUES
(5, 'Teknologi Informasi1', 'TI', 'Berjuang', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview.jpg', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int(11) NOT NULL,
  `proyek_nama` varchar(100) NOT NULL,
  `dibuat_sejak` timestamp NOT NULL DEFAULT current_timestamp(),
  `proyek_deskripsi` text NOT NULL,
  `proyek_kompetensi` text NOT NULL,
  `proyek_pemilik` varchar(255) NOT NULL,
  `status_pesan` int(11) NOT NULL COMMENT '1=read,0=unread',
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `proyek_nama`, `dibuat_sejak`, `proyek_deskripsi`, `proyek_kompetensi`, `proyek_pemilik`, `status_pesan`, `pengguna_id`) VALUES
(32, 'jsjsjjjwwueyyew', '2022-11-25 23:58:15', '<p>msajsjasdquwueuda</p>\r\n', 'ajjskasiwqiiw', 'Syupyan1', 1, 59),
(33, 'shhshhahha', '2022-11-25 23:59:49', '<p>shsysqyywywywys</p>\r\n', 'hshshshshsha', 'Norfifah', 1, 1),
(34, 'fffff', '2022-11-26 01:42:43', '<p>asaswqw</p>\r\n', 'sssss', 'Syupyan1', 1, 59),
(35, 'shshshhahs', '2022-11-26 01:47:33', '<p>hshahshashhs</p>\r\n', 'hsahshahsh', 'Norfifah1', 1, 59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `ruangan_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id_akses_menu`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  ADD PRIMARY KEY (`id_pengguna_menu`);

--
-- Indexes for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  MODIFY `id_akses_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
