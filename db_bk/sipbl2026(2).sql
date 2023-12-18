-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 05:51 PM
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
(243, 59, 3),
(244, 59, 8);

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
(1, 'Udin', 23223, '2022-11-30', 1, 0, 'Perempuan', '123'),
(2, '123', 123, '2022-11-30', 1, 0, 'Laki-laki', ''),
(3, 'naga', 2, '2022-12-08', 1, 55, 'Laki-laki', ''),
(4, 'bambang', 123, '2022-12-14', 1, 55, 'Laki-laki', '123'),
(5, 'akun', 232, '2022-12-20', 1, 55, 'Laki-laki', '123'),
(6, 'marna', 123, '2022-12-12', 1, 55, 'Laki-laki', '123');

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
(1, 'IOT1', 4, 2022, 1, 1, 'semester 1'),
(2, 'RPL', 2, 2022, 1, 2, ''),
(3, 'RPLKU', 22, 2022, 1, 4, '');

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
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `pengguna_status`, `diperbaharui`, `prodi_id`, `nik_nip`, `jk`, `jabatan`, `alamat`) VALUES
(59, 'Syupyan1', 'Syupyan@gmail.com', '$2y$10$KK0OudCNxSILmUfzW6G.3OmayNdjqohfo5plkM9NqfxKVEVTC7MHS', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-25 23:50:24', 1, 2147483647, 'Perempuan', 'Dosen', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss'),
(61, 'kps TI', 'kps.ti@gmail.com', '$2y$10$q.ZSxxhl25dNXlL.GnXlUeKNvaqDcjEI7GJYl63pjkSPv70agvSEm', 'user.png', 1, '2022-11-28 01:43:53', 1, 0, 'Laki-laki', '', ''),
(62, 'pengusul TI', 'pengusul.ti@gmail.com', '$2y$10$F.swISvXS2.5xJyj.zEBXO6BFq52ir/RVwIbEYoLAc5cvFzq2uab.', 'user.png', 1, '2022-11-28 01:44:26', 1, 0, 'Laki-laki', '', ''),
(63, 'reviewer TI', 'reviewer.ti@gmail.com', '$2y$10$p0JREf0dA89/ihgy2y7lvuYYklnRJWiIchJ7I8AGridUGrjNykvkC', 'user.png', 1, '2022-11-28 01:44:44', 1, 0, 'Laki-laki', '', ''),
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
(87, 'pengusul AI', 'pengsul.ai@gmail.com', '$2y$10$TkLInT8eG5ENa6mZtvJY/u66cLmzYw.j.cA7n1cANFXVyhw0/Hkza', 'user.png', 1, '2022-11-28 02:01:55', 5, 0, 'Laki-laki', '', ''),
(88, 'reviewer AI', 'reviewer.ai@gmail.com', '$2y$10$u9QWgYC7SWHS/jtnvLxAwuLeSbmN6vVH3fgkjHdDNw7a9IbDVWXoW', 'user.png', 1, '2022-11-28 02:02:48', 5, 0, 'Laki-laki', '', ''),
(89, 'pm AI', 'pm.ai@gmail.com', '$2y$10$lhDHo5fJh3vomXMDRD2Tke0ZcIuU6S7lfpZjt7l1EmmOT4mHXjwJ.', 'user.png', 1, '2022-11-28 02:03:18', 5, 0, 'Laki-laki', '', ''),
(90, 'cpo AI', 'cpo.ai@gmail.com', '$2y$10$cB5KlE7rJ./D7ZRbi/TkmuEuyn4BeLKLYpByiwxeOZHkwcArmoUUu', 'user.png', 1, '2022-11-28 02:03:41', 5, 0, 'Laki-laki', '', ''),
(91, 'kps TPT', 'kps.tpt@gmail.com', '$2y$10$OuESe94ZCRYEY17SgUNhOu75FRormQiLK6W2A9xXwa5LITCZSRlIC', 'user.png', 1, '2022-11-28 02:04:30', 6, 0, 'Laki-laki', '', ''),
(92, 'pengusul TPT', 'pengusul.tpt@gmail.com', '$2y$10$50.M9brS1dOeM8aOYIFZbuFuGCeMX7Z5FwJA8/.CZXL/j7yijlLSi', 'user.png', 1, '2022-11-28 02:04:49', 6, 0, 'Laki-laki', '', ''),
(93, 'reviewer TPT', 'reviewer.tpt@gmail.com', '$2y$10$.rJhopY7C1xCLFtD77dK2OVfIlqgRpS1EvmhaKH6JtMf05BO.1b5u', 'user.png', 1, '2022-11-28 02:05:54', 6, 0, 'Laki-laki', '', ''),
(94, 'pm TPT', 'pm.tpt@gmail.com', '$2y$10$PCZXLXft43LrVIyOkuDV3.GCswSjQdjJyYtuu13d5Fz0ogYo7/49m', 'user.png', 1, '2022-11-28 02:06:18', 6, 0, 'Laki-laki', '', ''),
(95, 'cpo TPT', 'cpo.tpt@gmail.com', '$2y$10$GQMY4n0DEvVQGByHB/NSuOCV9Yp8k5Pqqxj.vMXWw5MF2FpjBpUKq', 'user.png', 1, '2022-11-28 02:06:39', 6, 0, 'Laki-laki', '', '');

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
(14, 'Data Usulan Proyek', 'nav-icon fas fa-calendar', 'admin/Master_usulan/read_all_message', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-solid fa-folder-tree', 'admin/master-menu', 1, 1),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Data Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Data Ruang', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Data Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'reviewer/proyek-ditolak', 1, 5),
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
(6, 'GNBKjTf+LEZEFmj8DX2jvFSfzZVRA0MPJUP3CUxB6c4=', 'admin@example.com', '1668317970'),
(7, 'Xd67EFlWrrP+/YpeXK7l/cTlt5Jxj5L3Vk7dXXhfaFA=', 'admin@example.com', '1668318085'),
(20, '9rZpa3p9lwIWCsCljbxeaR2qaSEQNcqmhAhH/LY938o=', 'syupyan@gmail.com', '1670081748'),
(21, 'JBsQhLU4u954TpKcHQikSuXr65xYITESxbSBXVXa+yg=', 'syupyan@gmail.com', '1670081905'),
(22, 'HhCj/g8DCa/okHiVyCkr7DufaGShfnGsnIosn7qm8EA=', 'syupyan@gmail.com', '1670082494');

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
(47, 'IOT Manpro', '2022-11-28 06:03:43', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 61, 0, 0, 'Menunggu Tinjauan Proyek', 1, '28-11-2022', '2022-11-11', '4b7fbed5490626658aa3d7a41cee46e6.pdf', ''),
(48, 'IOT gw', '2022-11-28 06:48:34', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 59, 59, 65, 'Diterima', 1, '28-11-2022', '2022-11-15', 'f1d28f96288baf946b7960413facc052.pdf', ''),
(49, '123test', '2022-11-30 05:13:37', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 59, 59, 65, 'Diterima', 1, '30-11-2022', '2022-11-30', '2f3fd97a41c41c1eb87a5856a8f3202d.pdf', ''),
(50, 'jsjjsjsjsjs', '2022-12-01 02:43:48', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 63, 0, 0, 'Menunggu Tinjauan Proyek', 2, '01-12-2022', '2022-12-29', 'c3f6d8695ad7232f606d21c0af91800c.pdf', ''),
(51, 'aqweddss', '2022-12-02 06:28:00', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 59, 59, 59, 'Diterima', 1, '02-12-2022', '2022-12-14', '07968ce45328449aefd7da8670f4b584.pdf', '&lt;p&gt;123&lt;/p&gt;\r\n'),
(52, 'asdffdddddcc', '2022-12-02 06:42:43', '<p>123</p>\r\n', '123', 'Syupyan', 1, 59, 59, 0, 0, 'Menunggu Tinjauan Proyek', 1, '02-12-2022', '2022-12-21', '8e93d31b2c4fcde35463755372543b44.pdf', 'Null'),
(53, 'xbxsgsgs', '2022-12-03 01:48:07', '<p>123</p>\r\n', '123', 'Syupyan1', 1, 59, 59, 0, 0, 'Menunggu Tinjauan Proyek', 1, '03-12-2022', '2022-12-21', '8427f6409d4176942c48a7c675682cfd.pdf', 'Null'),
(54, 'xbzxbzbzb', '2022-12-03 03:21:14', '<p>xbbzbzxbx</p>\r\n', '123', 'Syupyan1', 1, 59, 59, 0, 0, 'Menunggu Tinjauan Proyek', 1, '03-12-2022', '2022-12-08', '0f7c11c5a86040880889998233087409.pdf', 'Null'),
(55, '12332222', '2022-12-03 03:27:52', '<p>123</p>\r\n', '123', 'Syupyan1', 1, 59, 59, 0, 0, 'Menunggu Tinjauan Proyek', 1, '03-12-2022', '2022-12-28', '57aee1b1cf79e546608392d82694988a.pdf', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `ruangan_nama` varchar(30) NOT NULL,
  `nama_gedung` varchar(30) NOT NULL,
  `ruangan_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruang`, `ruangan_nama`, `nama_gedung`, `ruangan_fasilitas`) VALUES
(1, 'Ruangan1', '123', '&lt;p&gt;Fasilitas Ruangan:&lt;/p&gt;\r\n'),
(2, 'Ruang2', '', ''),
(3, 'Ruang3', '', ''),
(4, 'Ruang4', '', ''),
(5, 'Ruang5', '', ''),
(6, 'Ruang6', '', '');

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
  MODIFY `id_akses_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
