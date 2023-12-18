-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 04:34 AM
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
(135, 1, 1),
(138, 1, 2),
(139, 59, 2),
(141, 59, 5),
(142, 59, 1),
(143, 59, 3),
(144, 59, 6),
(145, 59, 7),
(146, 61, 2),
(147, 62, 2),
(148, 63, 2),
(149, 64, 2),
(150, 65, 2),
(151, 61, 1),
(156, 66, 1),
(157, 66, 2),
(162, 67, 2),
(163, 68, 2),
(165, 70, 2),
(166, 69, 2),
(167, 95, 2),
(168, 62, 3),
(169, 63, 5),
(170, 64, 6),
(171, 65, 7),
(172, 67, 3),
(173, 68, 5),
(174, 69, 6),
(175, 70, 7),
(176, 71, 2),
(177, 71, 1),
(178, 72, 2),
(179, 72, 3),
(180, 73, 2),
(181, 73, 5),
(182, 74, 2),
(183, 74, 6),
(184, 75, 2),
(185, 75, 7),
(186, 76, 2),
(187, 76, 1),
(188, 77, 2),
(189, 77, 3),
(190, 78, 2),
(191, 78, 5),
(192, 79, 2),
(193, 79, 6),
(194, 80, 2),
(195, 80, 7),
(196, 81, 2),
(197, 81, 1),
(198, 82, 2),
(199, 82, 3),
(200, 83, 2),
(201, 83, 5),
(202, 84, 2),
(203, 84, 6),
(204, 85, 2),
(206, 85, 7),
(207, 86, 1),
(208, 86, 2),
(209, 87, 2),
(210, 87, 3),
(211, 88, 2),
(212, 88, 5),
(213, 89, 2),
(214, 89, 6),
(215, 90, 2),
(216, 90, 7),
(217, 91, 2),
(218, 91, 1),
(219, 92, 2),
(220, 92, 3),
(221, 93, 2),
(222, 93, 5),
(223, 94, 2),
(224, 94, 6),
(225, 95, 7),
(226, 59, 6),
(227, 65, 7);

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
  `ruang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matakuliah`, `matakuliah_nama`, `matakuliah_sks`, `matakuliah_tahunajaran`, `prodi_id`, `ruang_id`) VALUES
(1, 'IOT', 4, 2022, 1, 1);

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
(2, 'USER'),
(3, 'PENGUSUL'),
(5, 'REVIEWER'),
(7, 'PM'),
(8, 'CPO');

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
  `prodi_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `pengguna_status`, `date_created`, `prodi_id`) VALUES
(59, 'Syupyan', 'Syupyan@gmail.com', '$2y$10$P7wbQ76HHjs.eqezZu5xQeRsj/9ulU03YzXND2SVTWB5sMe2U1caO', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-25 23:50:24', 1),
(61, 'kps TI', 'kps.ti@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2022-11-28 01:43:53', 1),
(62, 'pengusul TI', 'pengusul.ti@gmail.com', '$2y$10$F.swISvXS2.5xJyj.zEBXO6BFq52ir/RVwIbEYoLAc5cvFzq2uab.', 'user.png', 1, '2022-11-28 01:44:26', 1),
(63, 'reviewer TI', 'reviewer.ti@gmail.com', '$2y$10$p0JREf0dA89/ihgy2y7lvuYYklnRJWiIchJ7I8AGridUGrjNykvkC', 'user.png', 1, '2022-11-28 01:44:44', 1),
(64, 'pm TI', 'pm.ti@gmail.com', '$2y$10$saIX8K/us8Edaa0VEa.I2OgPlUvKa19HEKHk83I7S7MIEKNQD07Zq', 'user.png', 1, '2022-11-28 01:45:52', 1),
(65, 'cpo TI', 'cpo.ti@gmail.com', '$2y$10$F8PzZqyQcHFAWhUteHGZZeupRKIpLcYsDBtn7Qwu5M5EJEZC8/VaS', 'user.png', 1, '2022-11-28 01:46:12', 1),
(66, 'kps AKT', 'kps.akt@gmail.com', '$2y$10$w.HRiMG44Y022a/fbWNRSuQ4ZyvAZ8k6GksleaukMn3q5DjTpNTNy', 'user.png', 1, '2022-11-28 01:46:36', 7),
(67, 'pengusul AKT', 'pengusul.akt@gmail.com', '$2y$10$3A3EzGZTvnIjXj2eKvaOMeg4NTCy4OXDVgorAW9X2gI0D05pNPoii', 'user.png', 1, '2022-11-28 01:46:59', 7),
(68, 'reviewer AKT', 'reviewer.akt@gmail.com', '$2y$10$80YyxHsazyR0KuNlZAJyKeHWpXnwx2hPbTZiLVNVWGnYhzvfBHImK', 'user.png', 1, '2022-11-28 01:47:18', 7),
(69, 'pm AKT', 'pm.akt@gmail.com', '$2y$10$CaYiAMpCq8By.gtY3Dv9KOvXfQpPgAZ8iPbREYMHTNKPErSg7AjZq', 'user.png', 1, '2022-11-28 01:47:42', 7),
(70, 'cpo AKT', 'cpo.akt@gmail.com', '$2y$10$wfOMykyuHZEcFqaP8LKv3.3IKVZ18aY0ykiNRT0pDyeA6QgtwUgOi', 'user.png', 1, '2022-11-28 01:48:00', 7),
(71, 'kps TRKJ', 'kps.trkj@gmail.com', '$2y$10$Wg5K5y3LQK/6myCk5R9ABOKxIsKfBZtAaU31koDdJkAsSSraBSJ..', 'user.png', 1, '2022-11-28 01:49:16', 7),
(72, 'pengusul TRKJ', 'pengusul.trkj@gmail.com', '$2y$10$C5Md.SJfM8iT9SqEwJp93.PQECUygjKWMy8QhU3h9h0bFse7b/zMa', 'user.png', 1, '2022-11-28 01:49:40', 2),
(73, 'reviewer TRKJ', 'reviewer.trkj@gmail.com', '$2y$10$zzoZkQsIL9hvrPxuRavz1eeeQTxF1gKLRj0084Ko/xqN4TScvyp.C', 'user.png', 1, '2022-11-28 01:51:07', 2),
(74, 'pm TRKJ', 'pm.trkj@gmail.com', '$2y$10$L33YLYece1xkmDJW9RQASOlPqnrUbypYwNW7XNadiBQ2D.VQRVhRC', 'user.png', 1, '2022-11-28 01:52:15', 2),
(75, 'cpo TRKJ', 'cpo.trkj@gmail.com', '$2y$10$fcCXWeHlXXRn9EscBFhJjOlEOdqobcT.AumavoYRF7NIz7T0MqLSa', 'user.png', 1, '2022-11-28 01:52:45', 2),
(76, 'kps TO', 'kps.to@gmail.com', '$2y$10$XvnO8jmLcwiulk8nSR7Nj.ROg0694ufvyiltf4muNDA8iuttoud6G', 'user.png', 1, '2022-11-28 01:53:04', 4),
(77, 'pengusul TO', 'pengusul.to@gmail.com', '$2y$10$A5b8XiX26p0gvK1yf/pQwu.GmCYme4VbW2iNVao2LLk6SeUVTNp4y', 'user.png', 1, '2022-11-28 01:53:47', 4),
(78, 'reviewer TO', 'reviewer.to@gmail.com', '$2y$10$ug0vFViLwcL8VZGQJFzsy.j4jvY7/v05NHE1qGqqGHoOwCUNlS1IK', 'user.png', 1, '2022-11-28 01:54:08', 4),
(79, 'pm TO', 'pm.to@gmail.com', '$2y$10$.AzWUFbKzW1uZeRJN8dvi.GQydHxv70V4fGNVmprpVlZhENC.FSfG', 'user.png', 1, '2022-11-28 01:54:29', 4),
(80, 'cpo TO', 'cpo.to@gmail.com', '$2y$10$lJAcgKwB9PZP9MAGyH8YjOQdaZ9CD6tG.egmg0BcnbARV.lg9Vrgm', 'user.png', 1, '2022-11-28 01:54:49', 4),
(81, 'kps TRKJJ', 'kps.trkjj@gmail.com', '$2y$10$es7BupPgHpN6Jgae2VHQMOMcbxNC67ViLtus/ZrMHmKJpWQt.1kGS', 'user.png', 1, '2022-11-28 01:59:52', 3),
(82, 'pengusul TRKJJ', 'pengusul.trkjj@gmail.com', '$2y$10$Kh0.a9hfxkb9PPMF8OQPGeDoyzEMZm3cbTzS14CCPckYwyNAPxdOG', 'user.png', 1, '2022-11-28 02:00:12', 3),
(83, 'reviewer TRKJJ', 'reviewer.trkjj@gmail.com', '$2y$10$cKCLNZB1ldLC5MIGDBmI0Oup8yME3UORJwaYA4yU6hD/t.nUDpP6q', 'user.png', 1, '2022-11-28 02:00:35', 3),
(84, 'pm TRKJJ', 'pm.trkjj@gmail.com', '$2y$10$Slb951LVsVQcW1s5o8pLyutwqKVyTtsIBKl8kl5HzdIVHUlQRcX8W', 'user.png', 1, '2022-11-28 02:00:53', 3),
(85, 'cpo TRKJJ', 'cpo.trkjj@gmail.com', '$2y$10$BevRTEHAML4wXK0sYMSyjOKnF2lwTsGSF5WZ08ZL0ZTUyRFUGazrG', 'user.png', 1, '2022-11-28 02:01:13', 3),
(86, 'kps AI', 'kps.ai@gmail.com', '$2y$10$cmFLhpXD2tcTQbPvz2T9lOdbCs2KpE7OzgctuiE.5Lt8vgjGtJjdy', 'user.png', 1, '2022-11-28 02:01:33', 5),
(87, 'pengusul AI', 'pengsul.ai@gmail.com', '$2y$10$TkLInT8eG5ENa6mZtvJY/u66cLmzYw.j.cA7n1cANFXVyhw0/Hkza', 'user.png', 1, '2022-11-28 02:01:55', 5),
(88, 'reviewer AI', 'reviewer.ai@gmail.com', '$2y$10$u9QWgYC7SWHS/jtnvLxAwuLeSbmN6vVH3fgkjHdDNw7a9IbDVWXoW', 'user.png', 1, '2022-11-28 02:02:48', 5),
(89, 'pm AI', 'pm.ai@gmail.com', '$2y$10$lhDHo5fJh3vomXMDRD2Tke0ZcIuU6S7lfpZjt7l1EmmOT4mHXjwJ.', 'user.png', 1, '2022-11-28 02:03:18', 5),
(90, 'cpo AI', 'cpo.ai@gmail.com', '$2y$10$cB5KlE7rJ./D7ZRbi/TkmuEuyn4BeLKLYpByiwxeOZHkwcArmoUUu', 'user.png', 1, '2022-11-28 02:03:41', 5),
(91, 'kps TPT', 'kps.tpt@gmail.com', '$2y$10$OuESe94ZCRYEY17SgUNhOu75FRormQiLK6W2A9xXwa5LITCZSRlIC', 'user.png', 1, '2022-11-28 02:04:30', 6),
(92, 'pengusul TPT', 'pengusul.tpt@gmail.com', '$2y$10$50.M9brS1dOeM8aOYIFZbuFuGCeMX7Z5FwJA8/.CZXL/j7yijlLSi', 'user.png', 1, '2022-11-28 02:04:49', 6),
(93, 'reviewer TPT', 'reviewer.tpt@gmail.com', '$2y$10$.rJhopY7C1xCLFtD77dK2OVfIlqgRpS1EvmhaKH6JtMf05BO.1b5u', 'user.png', 1, '2022-11-28 02:05:54', 6),
(94, 'pm TPT', 'pm.tpt@gmail.com', '$2y$10$PCZXLXft43LrVIyOkuDV3.GCswSjQdjJyYtuu13d5Fz0ogYo7/49m', 'user.png', 1, '2022-11-28 02:06:18', 6),
(95, 'cpo TPT', 'cpo.tpt@gmail.com', '$2y$10$GQMY4n0DEvVQGByHB/NSuOCV9Yp8k5Pqqxj.vMXWw5MF2FpjBpUKq', 'user.png', 1, '2022-11-28 02:06:39', 6);

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
(5, 'Ajukan Proyek', 'nav-icon fas fa-clipboard', 'pengusul/ajukan-proyek', 1, 3),
(10, 'Profil Saya', 'nav-icon fas fa-user', 'user', 1, 2),
(11, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 1, 2),
(14, 'Data Usulan', 'nav-icon fas fa-calendar', 'admin/Master_usulan/read_all_message', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-solid fa-folder-tree', 'admin/master-menu', 1, 1),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Data Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Data Ruang', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Data Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'Reviewer', 1, 5),
(34, 'Usulan Diterima', 'nav-icon fas fa-check-to-slot', 'reviewer/proyek-diterima', 1, 5),
(37, 'Kelola Proyek', 'nav-icon fas fa-clipboard-list', 'pm', 1, 7);

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
  `id_prodi` tinyint(11) NOT NULL,
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
  `proyek_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `proyek_nama`, `dibuat_sejak`, `proyek_deskripsi`, `proyek_kompetensi`, `proyek_pemilik`, `status_pesan`, `pengguna_id_pengusul`, `pengguna_id_reviewer`, `pengguna_id_manajer_proyek`, `pengguna_id_cpo`, `proyek_status`, `matakuliah_id`, `proyek_pengajuan`, `proyek_penyelesaian`, `proyek_file`) VALUES
(47, 'IOT Manpro', '2022-11-28 06:03:43', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 61, 0, 0, 'Menunggu Tinjauan Proyek', 1, '28-11-2022', '2022-11-11', '4b7fbed5490626658aa3d7a41cee46e6.pdf'),
(48, 'IOT gw', '2022-11-28 06:48:34', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 59, 59, 65, 'Diterima', 1, '28-11-2022', '2022-11-15', 'f1d28f96288baf946b7960413facc052.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `ruangan_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruang`, `ruangan_nama`) VALUES
(1, 'Ruang1'),
(2, 'Ruang2'),
(3, 'Ruang3'),
(4, 'Ruang4'),
(5, 'Ruang5'),
(6, 'Ruang6'),
(7, 'Ruang7');

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
  MODIFY `id_akses_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
