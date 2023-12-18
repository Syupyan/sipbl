-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2022 pada 06.47
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

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
-- Struktur dari tabel `tbl_akses_menu`
--

CREATE TABLE `tbl_akses_menu` (
  `id_access_menu` tinyint(4) NOT NULL,
  `id_pengguna` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_akses_menu`
--

INSERT INTO `tbl_akses_menu` (`id_access_menu`, `id_pengguna`, `menu_id`) VALUES
(1, 59, 1),
(14, 3, 3),
(25, 59, 7),
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
(120, 59, 2),
(121, 59, 6),
(124, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT current_timestamp(),
  `prodi_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nama`, `nim`, `tanggal_lahir`, `prodi_id`, `proyek_id`) VALUES
(4, 'Norfifah1', 2001301123, '2022-11-21', 2, 18),
(5, 'Muhammad Syupyan Arpan', 20011, '2022-11-24', 1, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `mata_kuliah` varchar(30) NOT NULL,
  `sks` int(15) NOT NULL,
  `tahun_ajaran` year(4) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matakuliah`, `mata_kuliah`, `sks`, `tahun_ajaran`, `prodi_id`) VALUES
(11, 'fifah sayang', 1, 2022, 0),
(12, '111', 11, 2022, 0),
(13, 'RPL', 23, 2022, 0),
(14, 'IOT', 12, 2023, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` tinyint(4) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
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
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` smallint(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reviewer` int(11) NOT NULL,
  `pm` int(11) NOT NULL,
  `cpo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `is_active`, `date_created`, `reviewer`, `pm`, `cpo`) VALUES
(1, 'Norfifah', 'Norfifah20@gmail.com', '$2y$10$Or7DO3MocXmLjkky57zpDOwud2SpPyjJuaoIyhvpxEXCkTTcoJrEm', 'mikasa_ackerman_by_fuko_chan_dedxjsf-fullview.jpg', 1, '2022-11-18 05:09:27', 0, 0, 0),
(59, 'Syupyan', 'Syupyan@gmail.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgpuvxQOM24Di', 'WhatsApp_Image_2022-11-16_at_09_12_272.jpeg', 1, '2022-11-18 01:52:33', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna_menu`
--

CREATE TABLE `tbl_pengguna_menu` (
  `id_pengguna_menu` tinyint(4) NOT NULL,
  `pengguna_menu_title` varchar(50) NOT NULL,
  `pengguna_menu_icon` varchar(80) NOT NULL,
  `pengguna_menu_url` varchar(50) NOT NULL,
  `pengguna_menu_is_active` tinyint(1) NOT NULL,
  `menu_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna_menu`
--

INSERT INTO `tbl_pengguna_menu` (`id_pengguna_menu`, `pengguna_menu_title`, `pengguna_menu_icon`, `pengguna_menu_url`, `pengguna_menu_is_active`, `menu_id`) VALUES
(1, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 1),
(2, 'Pengguna', 'nav-icon fas fa-users', 'admin/master-pengguna', 1, 1),
(3, 'Prodi', 'nav-icon fas fa-building', 'admin/master-prodi', 1, 1),
(4, 'Dashboard Pengusul', 'nav-icon fas fa-tachometer-alt', 'pengusul', 1, 3),
(5, 'Tulis Usulan', 'nav-icon fas fa-clipboard', 'pengusul/write-usulan', 1, 3),
(10, 'Profil Saya', 'nav-icon fas fa-user', 'user', 1, 2),
(11, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 1, 2),
(14, 'Data Usulan', 'nav-icon fas fa-calendar', 'admin/Master_usulan/read_all_message', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-clipboard-list-check', 'admin/master-menu', 1, 1),
(24, 'Menu Manager', 'nav-icon fas fa-solid fa-folder-tree', 'admin/menu-manager', 1, 1),
(25, 'Mata Kuliah', 'nav-icon fas fa-books', 'admin/master-matakuliah', 1, 1),
(27, 'Mahasiswa', 'nav-icon fas fa-screen-users', 'admin/master-mahasiswa', 1, 1),
(28, 'Ruangan', 'nav-icon fas fa-person-booth', 'admin/master-ruangan', 1, 1),
(29, 'Usulan Saya', 'nav-icon fas fa-person-dress-simple', 'pengusul/write-usulan', 1, 3),
(30, 'Data Seluruh Usulan', 'nav-icon fas fa-clipboard-list', 'peninjau', 1, 5),
(31, 'Menunggu Reviewer', 'nav-icon fas fa-circle-pause', 'Reviewer', 1, 5),
(32, 'Menunggu Tinjauan Usulan', 'nav-icon fas fa-star-sharp-half-stroke', 'Reviewer', 1, 5),
(33, 'Usulan Ditolak', 'nav-icon fas fa-xmark-to-slot', 'Reviewer', 1, 5),
(34, 'Usulan Diterima', 'nav-icon fas fa-check-to-slot', 'Reviewer', 1, 5),
(35, 'CPO Proyek', 'nav-icon fas fa-image-portrait', 'cpo', 1, 7),
(36, 'Kelola Proyek', 'nav-icon fas fa-regular fa-bars-progress', 'Meneger Proyek', 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna_token`
--

CREATE TABLE `tbl_pengguna_token` (
  `id` mediumint(9) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna_token`
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
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` tinyint(4) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `nama_lain_prodi` varchar(55) NOT NULL,
  `deskripsi_prodi` text NOT NULL,
  `img_prodi` varchar(255) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `nama_lain_prodi`, `deskripsi_prodi`, `img_prodi`, `jurusan`) VALUES
(1, 'Teknologi Informasi1', 'TI', 'Berfokus pada informatika', 'WhatsApp_Image_2022-11-16_at_09_12_27.jpeg', 'Teknik Informatika'),
(2, 'Akuntansi', 'AKT', 'Berfokus pada perhitungan\r\n', 'WhatsApp_Image_2022-11-16_at_09_12_27.jpeg', 'Teknik Otomotif'),
(4, 'yyy', 'yyy', 'yyy', 'batik.jpg', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruang`, `nama_ruangan`) VALUES
(1, 'Gil_bates1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahunajaran`
--

CREATE TABLE `tbl_tahunajaran` (
  `id_ajaran` int(11) NOT NULL,
  `tahun_ajaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tahunajaran`
--

INSERT INTO `tbl_tahunajaran` (`id_ajaran`, `tahun_ajaran`) VALUES
(5, 2022),
(6, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int(11) NOT NULL,
  `proyek_nama` varchar(100) NOT NULL,
  `dibuat_sejak` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proyek_deskripsi` text NOT NULL,
  `proyek_kompetensi` text NOT NULL,
  `proyek_pemilik` varchar(255) NOT NULL,
  `status_pesan` tinyint(1) NOT NULL COMMENT '1=read,0=unread',
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `proyek_nama`, `dibuat_sejak`, `proyek_deskripsi`, `proyek_kompetensi`, `proyek_pemilik`, `status_pesan`, `pengguna_id`) VALUES
(18, 'eee11', '2022-11-23 05:37:04', '<p>ddddfff</p>\r\n', 'dsdw', 'Syupyan1', 1, 59);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  ADD PRIMARY KEY (`id_pengguna_menu`);

--
-- Indeks untuk tabel `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  ADD PRIMARY KEY (`id_ajaran`);

--
-- Indeks untuk tabel `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  MODIFY `id_access_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahunajaran`
--
ALTER TABLE `tbl_tahunajaran`
  MODIFY `id_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
