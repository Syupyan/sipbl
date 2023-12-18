-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 09:16 AM
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
(237, 2, 1),
(238, 65, 8),
(239, 64, 7),
(240, 63, 5),
(241, 62, 3),
(242, 59, 5),
(264, 101, 3),
(265, 101, 5),
(266, 101, 1),
(267, 59, 3),
(268, 101, 7),
(269, 101, 8),
(270, 59, 8),
(271, 3, 1),
(272, 7, 1),
(273, 8, 1),
(274, 4, 1),
(275, 5, 1),
(276, 6, 1),
(277, 1, 9),
(280, 9, 10),
(282, 102, 5);

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
(1, 'Mahasiswa TI 1', 230130001, '2023-01-06', 1, 1, 'Laki-laki', '123'),
(2, 'Mahasiswa TI 2', 230130002, '2023-01-06', 1, 0, 'Laki-laki', '123'),
(3, 'Mahasiswa Ti 3', 230130002, '2023-01-12', 1, 0, 'Laki-laki', '123'),
(4, 'Mahasiswa Ti 4', 230130004, '2023-01-11', 1, 0, 'Laki-laki', '123'),
(5, 'Mahasiswa Ti 5', 230130002, '2023-01-13', 1, 0, 'Laki-laki', '123'),
(6, 'Mahasiswa Ti 6', 230130002, '2023-01-11', 1, 0, 'Laki-laki', '123'),
(7, 'Mahasiswa Ti 7', 230130007, '2023-01-11', 1, 0, 'Laki-laki', '123'),
(8, 'Mahasiswa Ti 8', 230130008, '2023-01-05', 1, 0, 'Laki-laki', '123'),
(9, 'Mahasiswa Ti 9', 230130009, '2023-01-05', 1, 0, 'Laki-laki', '123'),
(10, 'Mahasiswa Ti 10', 230130010, '2023-01-11', 1, 0, 'Laki-laki', '123'),
(11, 'Mahasiswa Ti 11', 230130011, '2023-01-05', 1, 0, 'Laki-laki', '123'),
(12, 'Mahasiswa Ti 12', 230130012, '2023-01-04', 1, 0, 'Laki-laki', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `matakuliah_nama` varchar(30) NOT NULL,
  `matakuliah_sks` int(15) NOT NULL,
  `matakuliah_tahunajaran` year(4) NOT NULL,
  `matakuliah_semester` varchar(25) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'CPO'),
(9, 'DIREKTUR'),
(10, 'SADMIN');

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
(1, 'Direktur', 'direktur@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2023-01-12 13:12:19', 0, 123, 'Laki-laki', 'Direktur', '123'),
(2, 'kps TI', 'kps.ti@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2022-11-28 01:43:53', 1, 2001301123, 'Laki-laki', '', 'batakan'),
(3, 'kps AKT', 'kps.akt@gmail.com', '$2y$10$w.HRiMG44Y022a/fbWNRSuQ4ZyvAZ8k6GksleaukMn3q5DjTpNTNy', 'user.png', 1, '2022-11-28 01:46:36', 7, 0, 'Laki-laki', '', ''),
(4, 'kps TRKJ', 'kps.trkj@gmail.com', '$2y$10$Wg5K5y3LQK/6myCk5R9ABOKxIsKfBZtAaU31koDdJkAsSSraBSJ..', 'user.png', 1, '2022-11-28 01:49:16', 2, 0, 'Laki-laki', '', ''),
(5, 'kps TO', 'kps.to@gmail.com', '$2y$10$XvnO8jmLcwiulk8nSR7Nj.ROg0694ufvyiltf4muNDA8iuttoud6G', 'user.png', 1, '2022-11-28 01:53:04', 4, 0, 'Laki-laki', '', ''),
(6, 'kps TRKJJ', 'kps.trkjj@gmail.com', '$2y$10$es7BupPgHpN6Jgae2VHQMOMcbxNC67ViLtus/ZrMHmKJpWQt.1kGS', 'user.png', 1, '2022-11-28 01:59:52', 3, 0, 'Laki-laki', '', ''),
(7, 'kps AI', 'kps.ai@gmail.com', '$2y$10$cmFLhpXD2tcTQbPvz2T9lOdbCs2KpE7OzgctuiE.5Lt8vgjGtJjdy', 'user.png', 1, '2022-11-28 02:01:33', 5, 0, 'Laki-laki', '', ''),
(8, 'kps TPT', 'kps.tpt@gmail.com', '$2y$10$OuESe94ZCRYEY17SgUNhOu75FRormQiLK6W2A9xXwa5LITCZSRlIC', 'user.png', 1, '2022-11-28 02:04:30', 6, 0, 'Laki-laki', '', ''),
(9, 'Super Admin', 'superadmin@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2023-01-12 03:57:26', 0, 123333, 'Laki-laki', 'Pemilik', '123'),
(59, 'Syupyan1', 'Syupyan@gmail.com', '$2y$10$KK0OudCNxSILmUfzW6G.3OmayNdjqohfo5plkM9NqfxKVEVTC7MHS', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-25 23:50:24', 1, 2147483647, 'Laki-laki', 'Dosen', 'Jln. Sukma Jaya1'),
(63, 'reviewer TI', 'reviewer.ti@gmail.com', '$2y$10$p0JREf0dA89/ihgy2y7lvuYYklnRJWiIchJ7I8AGridUGrjNykvkC', 'WhatsApp_Image_2022-11-16_at_09_12_274.jpeg', 1, '2022-11-28 01:44:44', 1, 200130123, 'Laki-laki', '', 'batakan'),
(64, 'pm TI', 'pm.ti@gmail.com', '$2y$10$saIX8K/us8Edaa0VEa.I2OgPlUvKa19HEKHk83I7S7MIEKNQD07Zq', 'user.png', 1, '2022-11-28 01:45:52', 1, 0, 'Laki-laki', '', ''),
(65, 'cpo TI', 'cpo.ti@gmail.com', '$2y$10$F8PzZqyQcHFAWhUteHGZZeupRKIpLcYsDBtn7Qwu5M5EJEZC8/VaS', 'user.png', 1, '2022-11-28 01:46:12', 1, 0, 'Laki-laki', '', ''),
(67, 'pengusul AKT', 'pengusul.akt@gmail.com', '$2y$10$3A3EzGZTvnIjXj2eKvaOMeg4NTCy4OXDVgorAW9X2gI0D05pNPoii', 'user.png', 1, '2022-11-28 01:46:59', 7, 0, 'Laki-laki', '', ''),
(68, 'reviewer AKT', 'reviewer.akt@gmail.com', '$2y$10$80YyxHsazyR0KuNlZAJyKeHWpXnwx2hPbTZiLVNVWGnYhzvfBHImK', 'user.png', 1, '2022-11-28 01:47:18', 7, 0, 'Laki-laki', '', ''),
(69, 'pm AKT', 'pm.akt@gmail.com', '$2y$10$CaYiAMpCq8By.gtY3Dv9KOvXfQpPgAZ8iPbREYMHTNKPErSg7AjZq', 'user.png', 1, '2022-11-28 01:47:42', 7, 0, 'Laki-laki', '', ''),
(70, 'cpo AKT', 'cpo.akt@gmail.com', '$2y$10$wfOMykyuHZEcFqaP8LKv3.3IKVZ18aY0ykiNRT0pDyeA6QgtwUgOi', 'user.png', 1, '2022-11-28 01:48:00', 7, 0, 'Laki-laki', '', ''),
(72, 'pengusul TRKJ', 'pengusul.trkj@gmail.com', '$2y$10$C5Md.SJfM8iT9SqEwJp93.PQECUygjKWMy8QhU3h9h0bFse7b/zMa', 'user.png', 1, '2022-11-28 01:49:40', 2, 0, 'Laki-laki', '', ''),
(73, 'reviewer TRKJ', 'reviewer.trkj@gmail.com', '$2y$10$zzoZkQsIL9hvrPxuRavz1eeeQTxF1gKLRj0084Ko/xqN4TScvyp.C', 'user.png', 1, '2022-11-28 01:51:07', 2, 0, 'Laki-laki', '', ''),
(74, 'pm TRKJ', 'pm.trkj@gmail.com', '$2y$10$L33YLYece1xkmDJW9RQASOlPqnrUbypYwNW7XNadiBQ2D.VQRVhRC', 'user.png', 1, '2022-11-28 01:52:15', 2, 0, 'Laki-laki', '', ''),
(75, 'cpo TRKJ', 'cpo.trkj@gmail.com', '$2y$10$fcCXWeHlXXRn9EscBFhJjOlEOdqobcT.AumavoYRF7NIz7T0MqLSa', 'user.png', 1, '2022-11-28 01:52:45', 2, 0, 'Laki-laki', '', ''),
(77, 'pengusul TO', 'pengusul.to@gmail.com', '$2y$10$A5b8XiX26p0gvK1yf/pQwu.GmCYme4VbW2iNVao2LLk6SeUVTNp4y', 'user.png', 1, '2022-11-28 01:53:47', 4, 0, 'Laki-laki', '', ''),
(78, 'reviewer TO', 'reviewer.to@gmail.com', '$2y$10$ug0vFViLwcL8VZGQJFzsy.j4jvY7/v05NHE1qGqqGHoOwCUNlS1IK', 'user.png', 1, '2022-11-28 01:54:08', 4, 0, 'Laki-laki', '', ''),
(79, 'pm TO', 'pm.to@gmail.com', '$2y$10$.AzWUFbKzW1uZeRJN8dvi.GQydHxv70V4fGNVmprpVlZhENC.FSfG', 'user.png', 1, '2022-11-28 01:54:29', 4, 0, 'Laki-laki', '', ''),
(80, 'cpo TO', 'cpo.to@gmail.com', '$2y$10$lJAcgKwB9PZP9MAGyH8YjOQdaZ9CD6tG.egmg0BcnbARV.lg9Vrgm', 'user.png', 1, '2022-11-28 01:54:49', 4, 0, 'Laki-laki', '', ''),
(82, 'pengusul TRKJJ', 'pengusul.trkjj@gmail.com', '$2y$10$Kh0.a9hfxkb9PPMF8OQPGeDoyzEMZm3cbTzS14CCPckYwyNAPxdOG', 'user.png', 1, '2022-11-28 02:00:12', 3, 0, 'Laki-laki', '', ''),
(83, 'reviewer TRKJJ', 'reviewer.trkjj@gmail.com', '$2y$10$cKCLNZB1ldLC5MIGDBmI0Oup8yME3UORJwaYA4yU6hD/t.nUDpP6q', 'user.png', 1, '2022-11-28 02:00:35', 3, 0, 'Laki-laki', '', ''),
(84, 'pm TRKJJ', 'pm.trkjj@gmail.com', '$2y$10$Slb951LVsVQcW1s5o8pLyutwqKVyTtsIBKl8kl5HzdIVHUlQRcX8W', 'user.png', 1, '2022-11-28 02:00:53', 3, 0, 'Laki-laki', '', ''),
(85, 'cpo TRKJJ', 'cpo.trkjj@gmail.com', '$2y$10$BevRTEHAML4wXK0sYMSyjOKnF2lwTsGSF5WZ08ZL0ZTUyRFUGazrG', 'user.png', 1, '2022-11-28 02:01:13', 3, 0, 'Laki-laki', '', ''),
(87, 'pengusul AI', 'pengusul.ai@gmail.com', '$2y$10$TkLInT8eG5ENa6mZtvJY/u66cLmzYw.j.cA7n1cANFXVyhw0/Hkza', 'user.png', 1, '2022-11-28 02:01:55', 5, 0, 'Laki-laki', '', ''),
(88, 'reviewer AI', 'reviewer.ai@gmail.com', '$2y$10$u9QWgYC7SWHS/jtnvLxAwuLeSbmN6vVH3fgkjHdDNw7a9IbDVWXoW', 'user.png', 1, '2022-11-28 02:02:48', 5, 0, 'Laki-laki', '', ''),
(89, 'pm AI', 'pm.ai@gmail.com', '$2y$10$lhDHo5fJh3vomXMDRD2Tke0ZcIuU6S7lfpZjt7l1EmmOT4mHXjwJ.', 'user.png', 1, '2022-11-28 02:03:18', 5, 0, 'Laki-laki', '', ''),
(90, 'cpo AI', 'cpo.ai@gmail.com', '$2y$10$cB5KlE7rJ./D7ZRbi/TkmuEuyn4BeLKLYpByiwxeOZHkwcArmoUUu', 'user.png', 1, '2022-11-28 02:03:41', 5, 0, 'Laki-laki', '', ''),
(92, 'pengusul TPT', 'pengusul.tpt@gmail.com', '$2y$10$50.M9brS1dOeM8aOYIFZbuFuGCeMX7Z5FwJA8/.CZXL/j7yijlLSi', 'user.png', 1, '2022-11-28 02:04:49', 6, 0, 'Laki-laki', '', ''),
(93, 'reviewer TPT', 'reviewer.tpt@gmail.com', '$2y$10$.rJhopY7C1xCLFtD77dK2OVfIlqgRpS1EvmhaKH6JtMf05BO.1b5u', 'user.png', 1, '2022-11-28 02:05:54', 6, 0, 'Laki-laki', '', ''),
(94, 'pm TPT', 'pm.tpt@gmail.com', '$2y$10$PCZXLXft43LrVIyOkuDV3.GCswSjQdjJyYtuu13d5Fz0ogYo7/49m', 'user.png', 1, '2022-11-28 02:06:18', 6, 0, 'Laki-laki', '', ''),
(95, 'cpo TPT', 'cpo.tpt@gmail.com', '$2y$10$GQMY4n0DEvVQGByHB/NSuOCV9Yp8k5Pqqxj.vMXWw5MF2FpjBpUKq', 'user.png', 1, '2022-11-28 02:06:39', 6, 0, 'Laki-laki', '', ''),
(102, 'pengusul TI', 'pengusul.ti@gmail.com', '$2y$10$yzETfBbbG/XTjXRLWUfQfOGsqqOokip88l6QZMv9.j/IUwyVRiNIm', 'user.png', 1, '2023-01-16 03:49:51', 1, 0, 'Belum Diisi', 'Dosen', 'Belum Diisi');

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
(2, 'Pengguna', 'nav-icon fas fa-users', 'admin/master-pengguna', 1, 1),
(3, 'Prodi', 'nav-icon fas fa-building', 'admin/master-prodi', 1, 1),
(5, 'Ajukan Proyek', 'nav-icon fas fa-clipboard', 'pengusul/ajukan-proyek', 1, 3),
(14, 'Data Usulan Proyek', 'nav-icon fas fa-calendar', 'admin/master-usulan', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-solid fa-folder-tree', 'sadmin/master-menu', 1, 10),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Data Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Data Ruang', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Data Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'reviewer/proyek-ditolak', 1, 5),
(34, 'Usulan Diterima', 'nav-icon fas fa-check-to-slot', 'reviewer/proyek-diterima', 1, 5),
(37, 'Data Proyek PM', 'nav-icon fas fa-clipboard-list', 'pm', 1, 7),
(38, 'Data Proyek CPO', 'nav-icon fas fa-clipboard-list', 'cpo', 1, 8),
(39, 'Data Proyek', 'nav-icon fas fa-clipboard-list', 'direktur', 1, 9);

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
(111, 'Dr5px/JhRF7wPXUz2JGHPPSuqsh8XSvfHnSK78uAThU=', 'syupyan@gmail.com', '1672812874'),
(112, 'CopxoWibvXLJHeL2GOJKMbiSsRTtuyxpn7h1lOQIC3s=', 'syupyan@gmail.com', '1672812938'),
(113, 'i8BF5L3S2f19XmU9hy6St3avsY2/oqu9GZgOpvbpXIg=', 'syupyan@gmail.com', '1672813032'),
(114, 'Zu50bClvLwiVtljp5m4edAIvUm9N1VT0P815Q/ZrnHY=', 'syupyan@gmail.com', '1672813076'),
(115, 'WNzIOpOvNu7sBAK9QC2f1nZrZ2Xu/a56HM0OoMPgPOY=', 'syupyan@gmail.com', '1672813111'),
(116, 'jAL/B52kMJ/3MNZnhKRQRe4zAT6lcQz3xuokIvpObUc=', 'syupyan@gmail.com', '1672813153'),
(117, 'qObfAqy2jhPTZ7OV2UCmkNvJQ1pgJ5pqwbVs6Wfgd0w=', 'syupyan@gmail.com', '1672813206'),
(118, 'ej1W4EjxdgzdjBxlOewIg4YCpwMh6MAKbbUIOZkGd2E=', 'syupyan@gmail.com', '1672813255'),
(119, 'Zp+z4oF9a7/ge/s1XQItdXjYRTt6hmpfTnrOBdyIihc=', 'syupyan@gmail.com', '1672813362'),
(120, 'FXlH0wLeT1M1PJJ8PZvdLWVGmkxBM9I/hKQJRuoExDo=', 'syupyan@gmail.com', '1672813987'),
(121, 'sb3E+ZJ1RTzTGfcXHy5Z6y+U447IePG3p/qaZHid7g0=', 'syupyan@gmail.com', '1672878270'),
(122, 'fF1rM+gRe1M+EWHCu1lDWcuUS8i4yHjw7oCb2yI0hCE=', 'syupyan@gmail.com', '1672878698'),
(123, 'fbF++EmIYrZBGpdXmV5d5GSXwKqYqc/MJeWpoeICvMw=', 'syupyan@gmail.com', '1672964729'),
(124, 'XThKU0YLlX5j9aR6qADHjVWKeB88DlVxd+kGPdlvU5o=', 'syupyan@gmail.com', '1673175772');

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
(1, 'Teknologi Informasi', 'TI', '123', 'pexels-anastasia-prideina-140186131.jpg', 'Komputer dan Bisnis'),
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
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id_akses_menu`),
  ADD KEY `r_id_pengguna` (`id_pengguna`),
  ADD KEY `r_menu` (`menu_id`);

--
-- Indexes for table `tbl_alat_bahan`
--
ALTER TABLE `tbl_alat_bahan`
  ADD PRIMARY KEY (`id_ab`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `r_prodi` (`prodi_id`),
  ADD KEY `tbl_mahasiswa_ibfk_1` (`proyek_id`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`),
  ADD KEY `r_matakulaih_prodi` (`prodi_id`),
  ADD KEY `r_matakulaih_ruang` (`ruang_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `r_rpp` (`rpp_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `t_prodi` (`prodi_id`);

--
-- Indexes for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  ADD PRIMARY KEY (`id_pengguna_menu`),
  ADD KEY `r_id_menu` (`menu_id`);

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
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `pengguna_id_cpo` (`pengguna_id_cpo`),
  ADD KEY `pengguna_id_manajer_proyek` (`pengguna_id_manajer_proyek`),
  ADD KEY `r_reviewer` (`pengguna_id_reviewer`),
  ADD KEY `r_matakuliah` (`matakuliah_id`),
  ADD KEY `r_pengusul` (`pengguna_id_pengusul`);

--
-- Indexes for table `tbl_quality_control`
--
ALTER TABLE `tbl_quality_control`
  ADD PRIMARY KEY (`id_qc`);

--
-- Indexes for table `tbl_rpp`
--
ALTER TABLE `tbl_rpp`
  ADD PRIMARY KEY (`id_rpp`),
  ADD KEY `r_proyek` (`proyek_id`);

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
  MODIFY `id_akses_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `tbl_alat_bahan`
--
ALTER TABLE `tbl_alat_bahan`
  MODIFY `id_ab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quality_control`
--
ALTER TABLE `tbl_quality_control`
  MODIFY `id_qc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rpp`
--
ALTER TABLE `tbl_rpp`
  MODIFY `id_rpp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD CONSTRAINT `r_matakulaih_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `tbl_prodi` (`id_prodi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_matakulaih_ruang` FOREIGN KEY (`ruang_id`) REFERENCES `tbl_ruangan` (`id_ruang`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  ADD CONSTRAINT `r_id_menu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`id_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
