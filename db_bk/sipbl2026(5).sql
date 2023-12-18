-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 07:14 AM
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
-- Database: `sipbl2026`
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
(236, 59, 7),
(237, 61, 1),
(238, 65, 8),
(239, 64, 7),
(240, 63, 5),
(241, 62, 3),
(242, 59, 5),
(255, 59, 8),
(264, 101, 3),
(265, 101, 5),
(266, 101, 1),
(267, 59, 3),
(268, 101, 7),
(269, 101, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alat_bahan`
--

CREATE TABLE `tbl_alat_bahan` (
  `id_ab` int(11) NOT NULL,
  `rpp_id` int(11) NOT NULL,
  `ab_nama` varchar(100) NOT NULL,
  `ab_unit` varchar(25) NOT NULL,
  `ab_harga` int(50) NOT NULL,
  `ab_jumlah` int(20) NOT NULL,
  `ab_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alat_bahan`
--

INSERT INTO `tbl_alat_bahan` (`id_ab`, `rpp_id`, `ab_nama`, `ab_unit`, `ab_harga`, `ab_jumlah`, `ab_total`) VALUES
(18, 9, 'hp', 'berbeda', 100000, 2, 200000),
(21, 10, 'hahaha', 'heheh', 1000000000, 2, 2000000000),
(26, 13, 'Baju', 'kain', 100000, 10, 1000000),
(27, 14, 'hhh', '88', 9000000, 5, 45000000);

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
  `proyek_id` int(11) NOT NULL,
  `mahasiswa_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `mahasiswa_alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `mahasiswa_nama`, `mahasiswa_nim`, `mahasiswa_tanggallahir`, `prodi_id`, `proyek_id`, `mahasiswa_jk`, `mahasiswa_alamat`) VALUES
(1, 'Udin', 23223, '2022-11-30', 1, 11, 'Perempuan', '123'),
(2, '123', 123, '2022-11-30', 1, 5, 'Laki-laki', 'aaaa'),
(3, 'naga', 2, '2022-12-08', 1, 4, 'Laki-laki', ''),
(4, 'bambang', 123, '2022-12-14', 1, 1, 'Laki-laki', '123'),
(5, 'akun', 232, '2022-12-20', 1, 1, 'Laki-laki', '123'),
(6, 'marna', 123, '2022-12-12', 1, 8, 'Laki-laki', '123'),
(7, 'herri', 123, '2022-12-13', 1, 6, 'Laki-laki', '123'),
(8, '123123', 123, '2022-12-07', 1, 1, 'Laki-laki', '123'),
(9, 'whwwhwhwh', 1223322, '2022-12-06', 1, 0, 'Laki-laki', '123'),
(10, 'hsgsgsgsgs', 33432, '2022-12-14', 1, 7, 'Laki-laki', '132'),
(11, 'dghdhdhdhdshd', 333222, '2022-12-13', 1, 1, 'Laki-laki', '123'),
(12, 'hfhhdhhsshhs', 34433332, '2022-12-15', 1, 6, 'Laki-laki', '123'),
(13, 'dhdhdhsjsjdjddh', 1233222, '2022-12-06', 1, 9, 'Laki-laki', '132'),
(14, 'dhdhshshshcg', 12322, '2022-12-06', 1, 6, 'Laki-laki', '123123'),
(15, 'norfifah', 2001301123, '2022-12-26', 1, 10, 'Perempuan', 'batakan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `matakuliah_nama` varchar(30) NOT NULL,
  `matakuliah_sks` int(15) NOT NULL,
  `matakuliah_tahunajaran` year(4) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `matakuliah_semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matakuliah`, `matakuliah_nama`, `matakuliah_sks`, `matakuliah_tahunajaran`, `prodi_id`, `ruang_id`, `matakuliah_semester`) VALUES
(1, 'IOT', 4, 2022, 1, 1, 'semester 1'),
(2, 'RPL', 2, 2022, 1, 1, 'semester 2'),
(5, 'PBO', 3, 2022, 1, 2, 'semester 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu`) VALUES
(1, 'ADMIN'),
(3, 'PENGUSUL'),
(5, 'REVIEWER'),
(7, 'PM'),
(8, 'CPO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitoring`
--

CREATE TABLE `tbl_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `rpp_id` int(11) NOT NULL,
  `monitoring_bobot` varchar(10) NOT NULL,
  `monitoring_tahapan_pengerjaan` varchar(50) NOT NULL,
  `monitoring_tanggal_pelaksanaan` varchar(10) NOT NULL,
  `monitoring_tanggal_penyelesaian` varchar(10) NOT NULL,
  `monitoring_komentar` varchar(100) NOT NULL,
  `monitoring_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_monitoring`
--

INSERT INTO `tbl_monitoring` (`id_monitoring`, `rpp_id`, `monitoring_bobot`, `monitoring_tahapan_pengerjaan`, `monitoring_tanggal_pelaksanaan`, `monitoring_tanggal_penyelesaian`, `monitoring_komentar`, `monitoring_status`) VALUES
(25, 12, '100', 'baru', '2022-12-26', '2022-12-19', 'mantap', 'Selesai'),
(26, 13, '100', 'hai', '2022-12-26', '2022-12-27', '', 'Selesai'),
(27, 14, '2', '333', '2022-12-26', '2022-12-26', '', 'Belum ada');

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
  `diperbaharui` timestamp NOT NULL DEFAULT current_timestamp(),
  `prodi_id` int(5) NOT NULL,
  `nik_nip` int(20) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','Belum Diisi') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `pengguna_status`, `diperbaharui`, `prodi_id`, `nik_nip`, `jk`, `jabatan`, `alamat`) VALUES
(59, 'Syupyan1', 'Syupyan@gmail.com', '$2y$10$KK0OudCNxSILmUfzW6G.3OmayNdjqohfo5plkM9NqfxKVEVTC7MHS', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-25 23:50:24', 1, 2147483647, 'Laki-laki', 'Dosen', 'Jln. Sukma Jaya1'),
(61, 'kps TI', 'kps.ti@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2022-11-28 01:43:53', 1, 0, 'Laki-laki', '', ''),
(62, 'pengusul TI', 'pengusul.ti@gmail.com', '$2y$10$F.swISvXS2.5xJyj.zEBXO6BFq52ir/RVwIbEYoLAc5cvFzq2uab.', 'WhatsApp_Image_2022-11-16_at_09_12_275.jpeg', 1, '2022-11-28 01:44:26', 1, 200130123, 'Perempuan', '', 'batakan'),
(63, 'reviewer TI', 'reviewer.ti@gmail.com', '$2y$10$p0JREf0dA89/ihgy2y7lvuYYklnRJWiIchJ7I8AGridUGrjNykvkC', 'WhatsApp_Image_2022-11-16_at_09_12_274.jpeg', 1, '2022-11-28 01:44:44', 1, 200130123, 'Laki-laki', '', 'batakan'),
(64, 'pm TI', 'pm.ti@gmail.com', '$2y$10$saIX8K/us8Edaa0VEa.I2OgPlUvKa19HEKHk83I7S7MIEKNQD07Zq', 'user.png', 1, '2022-11-28 01:45:52', 1, 0, 'Laki-laki', '', ''),
(65, 'cpo TI', 'cpo.ti@gmail.com', '$2y$10$F8PzZqyQcHFAWhUteHGZZeupRKIpLcYsDBtn7Qwu5M5EJEZC8/VaS', 'user.png', 1, '2022-11-28 01:46:12', 1, 0, 'Laki-laki', '', ''),
(66, 'kps AKT', 'kps.akt@gmail.com', '$2y$10$w.HRiMG44Y022a/fbWNRSuQ4ZyvAZ8k6GksleaukMn3q5DjTpNTNy', 'user.png', 1, '2022-11-28 01:46:36', 7, 0, 'Laki-laki', '', ''),
(67, 'pengusul AKT', 'pengusul.akt@gmail.com', '$2y$10$3A3EzGZTvnIjXj2eKvaOMeg4NTCy4OXDVgorAW9X2gI0D05pNPoii', 'user.png', 1, '2022-11-28 01:46:59', 7, 0, 'Laki-laki', '', ''),
(68, 'reviewer AKT', 'reviewer.akt@gmail.com', '$2y$10$80YyxHsazyR0KuNlZAJyKeHWpXnwx2hPbTZiLVNVWGnYhzvfBHImK', 'user.png', 1, '2022-11-28 01:47:18', 7, 0, 'Laki-laki', '', ''),
(69, 'pm AKT', 'pm.akt@gmail.com', '$2y$10$CaYiAMpCq8By.gtY3Dv9KOvXfQpPgAZ8iPbREYMHTNKPErSg7AjZq', 'user.png', 1, '2022-11-28 01:47:42', 7, 0, 'Laki-laki', '', ''),
(70, 'cpo AKT', 'cpo.akt@gmail.com', '$2y$10$wfOMykyuHZEcFqaP8LKv3.3IKVZ18aY0ykiNRT0pDyeA6QgtwUgOi', 'user.png', 1, '2022-11-28 01:48:00', 7, 0, 'Laki-laki', '', ''),
(71, 'kps TRKJ', 'kps.trkj@gmail.com', '$2y$10$Wg5K5y3LQK/6myCk5R9ABOKxIsKfBZtAaU31koDdJkAsSSraBSJ..', 'user.png', 1, '2022-11-28 01:49:16', 7, 0, 'Laki-laki', '', ''),
(72, 'pengusul TRKJ', 'pengusul.trkj@gmail.com', '$2y$10$C5Md.SJfM8iT9SqEwJp93.PQECUygjKWMy8QhU3h9h0bFse7b/zMa', 'user.png', 1, '2022-11-28 01:49:40', 2, 0, 'Laki-laki', '', ''),
(73, 'reviewer TRKJ', 'reviewer.trkj@gmail.com', '$2y$10$zzoZkQsIL9hvrPxuRavz1eeeQTxF1gKLRj0084Ko/xqN4TScvyp.C', 'user.png', 1, '2022-11-28 01:51:07', 2, 0, 'Laki-laki', '', ''),
(74, 'pm TRKJ', 'pm.trkj@gmail.com', '$2y$10$L33YLYece1xkmDJW9RQASOlPqnrUbypYwNW7XNadiBQ2D.VQRVhRC', 'user.png', 1, '2022-11-28 01:52:15', 2, 0, 'Laki-laki', '', ''),
(75, 'cpo TRKJ', 'cpo.trkj@gmail.com', '$2y$10$fcCXWeHlXXRn9EscBFhJjOlEOdqobcT.AumavoYRF7NIz7T0MqLSa', 'user.png', 1, '2022-11-28 01:52:45', 2, 0, 'Laki-laki', '', ''),
(76, 'kps TO', 'kps.to@gmail.com', '$2y$10$XvnO8jmLcwiulk8nSR7Nj.ROg0694ufvyiltf4muNDA8iuttoud6G', 'user.png', 1, '2022-11-28 01:53:04', 4, 0, 'Laki-laki', '', ''),
(77, 'pengusul TO', 'pengusul.to@gmail.com', '$2y$10$A5b8XiX26p0gvK1yf/pQwu.GmCYme4VbW2iNVao2LLk6SeUVTNp4y', 'user.png', 1, '2022-11-28 01:53:47', 4, 0, 'Laki-laki', '', ''),
(78, 'reviewer TO', 'reviewer.to@gmail.com', '$2y$10$ug0vFViLwcL8VZGQJFzsy.j4jvY7/v05NHE1qGqqGHoOwCUNlS1IK', 'user.png', 1, '2022-11-28 01:54:08', 4, 0, 'Laki-laki', '', ''),
(79, 'pm TO', 'pm.to@gmail.com', '$2y$10$.AzWUFbKzW1uZeRJN8dvi.GQydHxv70V4fGNVmprpVlZhENC.FSfG', 'user.png', 1, '2022-11-28 01:54:29', 4, 0, 'Laki-laki', '', ''),
(80, 'cpo TO', 'cpo.to@gmail.com', '$2y$10$lJAcgKwB9PZP9MAGyH8YjOQdaZ9CD6tG.egmg0BcnbARV.lg9Vrgm', 'user.png', 1, '2022-11-28 01:54:49', 4, 0, 'Laki-laki', '', ''),
(81, 'kps TRKJJ', 'kps.trkjj@gmail.com', '$2y$10$es7BupPgHpN6Jgae2VHQMOMcbxNC67ViLtus/ZrMHmKJpWQt.1kGS', 'user.png', 1, '2022-11-28 01:59:52', 3, 0, 'Laki-laki', '', ''),
(82, 'pengusul TRKJJ', 'pengusul.trkjj@gmail.com', '$2y$10$Kh0.a9hfxkb9PPMF8OQPGeDoyzEMZm3cbTzS14CCPckYwyNAPxdOG', 'user.png', 1, '2022-11-28 02:00:12', 3, 0, 'Laki-laki', '', ''),
(83, 'reviewer TRKJJ', 'reviewer.trkjj@gmail.com', '$2y$10$cKCLNZB1ldLC5MIGDBmI0Oup8yME3UORJwaYA4yU6hD/t.nUDpP6q', 'user.png', 1, '2022-11-28 02:00:35', 3, 0, 'Laki-laki', '', ''),
(84, 'pm TRKJJ', 'pm.trkjj@gmail.com', '$2y$10$Slb951LVsVQcW1s5o8pLyutwqKVyTtsIBKl8kl5HzdIVHUlQRcX8W', 'user.png', 1, '2022-11-28 02:00:53', 3, 0, 'Laki-laki', '', ''),
(85, 'cpo TRKJJ', 'cpo.trkjj@gmail.com', '$2y$10$BevRTEHAML4wXK0sYMSyjOKnF2lwTsGSF5WZ08ZL0ZTUyRFUGazrG', 'user.png', 1, '2022-11-28 02:01:13', 3, 0, 'Laki-laki', '', ''),
(86, 'kps AI', 'kps.ai@gmail.com', '$2y$10$cmFLhpXD2tcTQbPvz2T9lOdbCs2KpE7OzgctuiE.5Lt8vgjGtJjdy', 'user.png', 1, '2022-11-28 02:01:33', 5, 0, 'Laki-laki', '', ''),
(87, 'pengusul AI', 'pengusul.ai@gmail.com', '$2y$10$TkLInT8eG5ENa6mZtvJY/u66cLmzYw.j.cA7n1cANFXVyhw0/Hkza', 'user.png', 1, '2022-11-28 02:01:55', 5, 0, 'Laki-laki', '', ''),
(88, 'reviewer AI', 'reviewer.ai@gmail.com', '$2y$10$u9QWgYC7SWHS/jtnvLxAwuLeSbmN6vVH3fgkjHdDNw7a9IbDVWXoW', 'user.png', 1, '2022-11-28 02:02:48', 5, 0, 'Laki-laki', '', ''),
(89, 'pm AI', 'pm.ai@gmail.com', '$2y$10$lhDHo5fJh3vomXMDRD2Tke0ZcIuU6S7lfpZjt7l1EmmOT4mHXjwJ.', 'user.png', 1, '2022-11-28 02:03:18', 5, 0, 'Laki-laki', '', ''),
(90, 'cpo AI', 'cpo.ai@gmail.com', '$2y$10$cB5KlE7rJ./D7ZRbi/TkmuEuyn4BeLKLYpByiwxeOZHkwcArmoUUu', 'user.png', 1, '2022-11-28 02:03:41', 5, 0, 'Laki-laki', '', ''),
(91, 'kps TPT', 'kps.tpt@gmail.com', '$2y$10$OuESe94ZCRYEY17SgUNhOu75FRormQiLK6W2A9xXwa5LITCZSRlIC', 'user.png', 1, '2022-11-28 02:04:30', 6, 0, 'Laki-laki', '', ''),
(92, 'pengusul TPT', 'pengusul.tpt@gmail.com', '$2y$10$50.M9brS1dOeM8aOYIFZbuFuGCeMX7Z5FwJA8/.CZXL/j7yijlLSi', 'user.png', 1, '2022-11-28 02:04:49', 6, 0, 'Laki-laki', '', ''),
(93, 'reviewer TPT', 'reviewer.tpt@gmail.com', '$2y$10$.rJhopY7C1xCLFtD77dK2OVfIlqgRpS1EvmhaKH6JtMf05BO.1b5u', 'user.png', 1, '2022-11-28 02:05:54', 6, 0, 'Laki-laki', '', ''),
(94, 'pm TPT', 'pm.tpt@gmail.com', '$2y$10$PCZXLXft43LrVIyOkuDV3.GCswSjQdjJyYtuu13d5Fz0ogYo7/49m', 'user.png', 1, '2022-11-28 02:06:18', 6, 0, 'Laki-laki', '', ''),
(95, 'cpo TPT', 'cpo.tpt@gmail.com', '$2y$10$GQMY4n0DEvVQGByHB/NSuOCV9Yp8k5Pqqxj.vMXWw5MF2FpjBpUKq', 'user.png', 1, '2022-11-28 02:06:39', 6, 0, 'Laki-laki', '', ''),
(101, 'norfifah', 'norfifah20@gmail.com', '$2y$10$Abuy4GV9xctzdjuJ9uRAzOyOCJcTNGXN3O7pq91V9faZC2uZcODLy', 'WhatsApp_Image_2022-11-16_at_09_12_273.jpeg', 1, '2022-12-26 03:59:59', 1, 200130123, 'Perempuan', 'Dosen', 'Batakan');

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
(1, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 0, 1),
(2, 'Pengguna', 'nav-icon fas fa-users', 'admin/master-pengguna', 1, 1),
(3, 'Prodi', 'nav-icon fas fa-building', 'admin/master-prodi', 1, 1),
(5, 'Ajukan Proyek', 'nav-icon fas fa-clipboard', 'pengusul/ajukan-proyek', 1, 3),
(14, 'Data Usulan Proyek', 'nav-icon fas fa-calendar', 'admin/Master_usulan/read_all_message', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-solid fa-folder-tree', 'admin/master-menu', 1, 1),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Data Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Data Ruang', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Data Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'reviewer/proyek-ditolak', 1, 5),
(34, 'Usulan Diterima', 'nav-icon fas fa-check-to-slot', 'reviewer/proyek-diterima', 1, 5),
(37, 'Kelola Proyek', 'nav-icon fas fa-clipboard-list', 'pm', 1, 7),
(38, 'Data Proyek CPO', 'nav-icon fas fa-clipboard-list', 'cpo', 1, 8);

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
(71, 'Oa4uvOBnPotomB8L7smK4Mc4KodRdA+Vz9M93ZqniSI=', 'syupyan@gmail.com', '1671753683'),
(72, 'cvZpay8Jmas/k+lVgyFFfs1IDTEuYGcPfeX3M/vXPeM=', 'syupyan@gmail.com', '1671784149');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi_nama` varchar(50) NOT NULL,
  `prodi_alias` varchar(20) NOT NULL,
  `prodi_deskripsi` text NOT NULL,
  `prodi_gambar` varchar(100) NOT NULL,
  `jurusan` enum('Komputer dan Bisnis','Teknologi Rekayasa Industri','Teknologi Industri Pertanian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `prodi_nama`, `prodi_alias`, `prodi_deskripsi`, `prodi_gambar`, `jurusan`) VALUES
(1, 'Teknologi Informasi', 'TI', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Komputer dan Bisnis'),
(2, 'Teknologi Rekayasa Komputer Jaringan', 'TRKJ', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Komputer dan Bisnis'),
(3, 'Teknologi Rekayasa Kontruksi Jalan dan Jembatan', 'TRKJJ', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Teknologi Rekayasa Industri'),
(4, 'Teknologi Otomotif', 'TO', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Teknologi Rekayasa Industri'),
(5, 'Agroindustri', 'AI', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Teknologi Industri Pertanian'),
(6, 'Teknologi Pakan Ternak', 'TPT', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Teknologi Industri Pertanian'),
(7, 'Akuntansi', 'AKT', '123', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview1.jpg', 'Komputer dan Bisnis');

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
  `pengguna_id_pengusul` int(11) NOT NULL,
  `pengguna_id_reviewer` int(11) NOT NULL,
  `pengguna_id_manajer_proyek` int(11) NOT NULL,
  `pengguna_id_cpo` int(11) NOT NULL,
  `proyek_status` varchar(50) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `proyek_pengajuan` varchar(50) NOT NULL,
  `proyek_penyelesaian` date NOT NULL,
  `proyek_file` varchar(100) NOT NULL,
  `proyek_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `proyek_nama`, `dibuat_sejak`, `proyek_deskripsi`, `proyek_kompetensi`, `proyek_pemilik`, `status_pesan`, `pengguna_id_pengusul`, `pengguna_id_reviewer`, `pengguna_id_manajer_proyek`, `pengguna_id_cpo`, `proyek_status`, `matakuliah_id`, `proyek_pengajuan`, `proyek_penyelesaian`, `proyek_file`, `proyek_komentar`) VALUES
(5, 'Ini percobaa', '2022-12-25 09:23:50', '<p>123</p>\r\n', '123', 'Syupyan1', 1, 59, 59, 59, 59, 'Diterima oleh Reviewer', 1, '25-12-2022', '2022-12-25', '34f0e0b7750e6ddd560c523ce0c8ea89.pdf', 'bagus'),
(6, 'percobaan2', '2022-12-26 01:15:57', '<p>123</p>\r\n', '123', 'Syupyan1', 1, 59, 59, 59, 59, 'Diterima oleh Reviewer', 1, '26-12-2022', '2022-12-26', '8db39aa805f382ccbadedddc1c058289.pdf', 'hehehe boi'),
(7, 'fifah', '2022-12-26 03:44:27', '<p>membuat sistem informasi pbl politala</p>\r\n', 'menguasai web ', 'Syupyan1', 1, 59, 59, 59, 59, 'Diterima oleh Reviewer', 1, '26-12-2022', '2022-12-26', 'a0abda5a1003a6e93776a3111ab7d379.pdf', 'keren banget '),
(8, '11111', '2022-12-26 03:47:11', '<p>1111111111111111111</p>\r\n', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'Syupyan1', 1, 59, 63, 59, 59, 'Diterima oleh Reviewer', 2, '26-12-2022', '2022-12-26', 'fe57ecfe81badf76f6995ab6db752fde.pdf', 'hhhhhh'),
(9, 'lagi', '2022-12-26 05:06:52', '<p>lagi</p>\r\n', 'lagi', 'Syupyan1', 1, 59, 59, 0, 0, 'Ditolak oleh Reviewer', 2, '26-12-2022', '2022-12-26', '76189b157d218e7184d32764bda54cf6.pdf', 'hehe boi'),
(10, 'Sistem Informasi PBL(Problem Based Learning) Politala', '2022-12-26 05:48:10', '<p>Mempelajari Pemecahan Masalah</p>\r\n', 'Sistem Berbasis Web', 'pengusul TI', 1, 62, 63, 0, 0, 'Diterima oleh Reviewer', 2, '26-12-2022', '2022-12-26', '028ac250968f643a8c199834e336b36c.pdf', 'keren'),
(11, '77777', '2022-12-26 06:06:15', '<p>333333</p>\r\n', 'eeeeeee', 'Syupyan1', 1, 59, 59, 0, 0, 'Diterima oleh Reviewer', 1, '26-12-2022', '2022-12-26', '2cfeb0c9bfa517c66bae74076ec9bffb.pdf', 'eeeee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quality_control`
--

CREATE TABLE `tbl_quality_control` (
  `id_qc` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `qc_kesesuaian_rencana` varchar(100) NOT NULL,
  `qc_catatan` varchar(25) NOT NULL,
  `qc_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quality_control`
--

INSERT INTO `tbl_quality_control` (`id_qc`, `proyek_id`, `qc_kesesuaian_rencana`, `qc_catatan`, `qc_status`) VALUES
(1, 2, 'Realiasasi Waktu Pengerjaan Proyek', 'hehehe', 'Sesuai'),
(2, 2, 'Kesesuaian dengan spesifikasi dalam rencana pelaksanaan PBL', 'mahaha', 'Sesuai'),
(3, 2, 'Jumlah Produk', 'y', 'Sesuai'),
(4, 2, 'Keberfungsian / Kelaikan penggunaan', 'y', 'Sesuai'),
(5, 5, 'Realiasasi Waktu Pengerjaan Proyek', 'weh', 'Sesuai'),
(6, 5, 'Kesesuaian dengan spesifikasi dalam rencana pelaksanaan PBL', 'weh', 'Sesuai'),
(7, 5, 'Jumlah Produk', 'weh', 'Sesuai'),
(8, 5, 'Keberfungsian / Kelaikan penggunaan', 'weh', 'Sesuai'),
(9, 6, 'Realiasasi Waktu Pengerjaan Proyek', 'hore', 'Sesuai'),
(10, 6, 'Kesesuaian dengan spesifikasi dalam rencana pelaksanaan PBL', 'hore', 'Sesuai'),
(11, 6, 'Jumlah Produk', 'hore', 'Sesuai'),
(12, 6, 'Keberfungsian / Kelaikan penggunaan', 'hore', 'Sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rpp`
--

CREATE TABLE `tbl_rpp` (
  `id_rpp` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `rpp_sponsor` varchar(50) NOT NULL,
  `rpp_biaya_proyek` int(20) NOT NULL,
  `rpp_klien` varchar(50) NOT NULL,
  `rpp_komentar` varchar(50) NOT NULL,
  `rpp_status` varchar(50) NOT NULL,
  `rpp_waktu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rpp`
--

INSERT INTO `tbl_rpp` (`id_rpp`, `proyek_id`, `rpp_sponsor`, `rpp_biaya_proyek`, `rpp_klien`, `rpp_komentar`, `rpp_status`, `rpp_waktu`) VALUES
(8, 222, 'hehe', 1000000, 'hehehe', 'belum ada', 'belum ada', '23-12-2022'),
(9, 2, 'udin sedunia', 10, 'udin sedunia', 'belum ada13', 'Diterima', '23-12-2022'),
(10, 12, 'udin sedunia', 1000000, 'hehe', 'belum ada', 'belum ada', '25-12-2022'),
(12, 5, 'kamu', 10000000, 'kamu', 'keren', 'Diterima', '25-12-2022'),
(13, 6, 'PT Telkom', 10000000, 'Indra', 'Oke keren bre', 'Diterima', '26-12-2022'),
(14, 7, '11', 2222, '1111', 'Belum ada', 'Belum ada', '26-12-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `nama_gedung` varchar(30) NOT NULL,
  `ruangan_nama` varchar(30) NOT NULL,
  `ruangan_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruang`, `nama_gedung`, `ruangan_nama`, `ruangan_fasilitas`) VALUES
(1, 'TI', 'Ruang1', '<p>Fasilitas Ruangan:</p>\r\n\r\n<p>1.Aku</p>\r\n'),
(2, 'TI', 'Ruang2', '<p>Fasilitas Ruangan:</p>\r\n\r\n<p>1. aku</p>\r\n\r\n<p>2. dia</p>\r\n'),
(3, 'TI', 'Ruang3', ''),
(4, 'TI', 'Ruang4', ''),
(5, 'TI', 'Ruang5', ''),
(6, 'TI', 'Ruang6', ''),
(8, 'TI', 'Ruang7', '&lt;p&gt;Fasilitas Ruangan:&lt;/p&gt;\r\n\r\n&lt;p&gt;1. aku&lt;/p&gt;\r\n\r\n&lt;p&gt;2. dia&lt;/p&gt;\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id_akses_menu`);

--
-- Indexes for table `tbl_alat_bahan`
--
ALTER TABLE `tbl_alat_bahan`
  ADD PRIMARY KEY (`id_ab`);

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
-- Indexes for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

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
-- Indexes for table `tbl_quality_control`
--
ALTER TABLE `tbl_quality_control`
  ADD PRIMARY KEY (`id_qc`);

--
-- Indexes for table `tbl_rpp`
--
ALTER TABLE `tbl_rpp`
  ADD PRIMARY KEY (`id_rpp`);

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
  MODIFY `id_akses_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `tbl_alat_bahan`
--
ALTER TABLE `tbl_alat_bahan`
  MODIFY `id_ab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_quality_control`
--
ALTER TABLE `tbl_quality_control`
  MODIFY `id_qc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_rpp`
--
ALTER TABLE `tbl_rpp`
  MODIFY `id_rpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
