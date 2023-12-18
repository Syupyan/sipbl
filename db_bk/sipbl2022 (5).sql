-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2022 pada 08.11
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
-- Database: `sipbl2022`
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
(2, 1, 1),
(14, 3, 3),
(16, 2, 3),
(17, 2, 2),
(23, 1, 3),
(24, 1, 6),
(25, 1, 7),
(26, 1, 8),
(27, 1, 2),
(28, 2, 1),
(30, 3, 2),
(31, 1, 5),
(32, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_jurusan` tinyint(4) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `nama_lain_jurusan` varchar(55) NOT NULL,
  `deskripsi_jurusan` text NOT NULL,
  `img_jurusan` varchar(255) NOT NULL,
  `kategori_jurusan_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_jurusan`, `nama_jurusan`, `nama_lain_jurusan`, `deskripsi_jurusan`, `img_jurusan`, `kategori_jurusan_id`) VALUES
(1, 'Teknologi Informasi', 'TI1', 'Berfokus pada informatika', 'peta_persebaran_rumah_sakit1.png', 1),
(2, 'Akuntansi', 'akt', 'ssss', 'avatar.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_jurusan`
--

CREATE TABLE `tbl_kategori_jurusan` (
  `id_kategori_jurusan` tinyint(4) NOT NULL,
  `nama_kategori_jurusan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_jurusan`
--

INSERT INTO `tbl_kategori_jurusan` (`id_kategori_jurusan`, `nama_kategori_jurusan`) VALUES
(1, 'Teknik Informatika1'),
(2, 'Akuntansi1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `mata_kuliah` varchar(30) NOT NULL,
  `sks` int(15) NOT NULL,
  `ajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_matakuliah`, `mata_kuliah`, `sks`, `ajaran_id`) VALUES
(1, 'Rekayasa Perangkat Lunak', 4, 1);

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
(3, 'USER'),
(5, 'PENGUSUL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `pengumuman_nama` varchar(100) NOT NULL,
  `dibuat_sejak` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengumuman_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `pengumuman_nama`, `dibuat_sejak`, `pengumuman_deskripsi`) VALUES
(1, 'Pembagian Raport Siswa', '2021-02-26 14:26:16', '<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit.</p>\r\n\r\n<p><u><strong><em>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </em></strong></u></p>\r\n\r\n<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n'),
(2, 'Kenaikan Kelas', '2021-02-26 14:27:40', '<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n\r\n<p><em><u>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit v</u></em></p>\r\n\r\n<p>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit </p>\r\n'),
(3, 'Jalan-jalan', '2022-11-04 05:59:30', '<p>assss</p>\r\n'),
(4, 'Ini judul', '2022-11-07 00:06:04', '<p>fff</p>\r\n'),
(5, 'ssseee', '2022-11-11 02:25:29', '<p>sss</p>\r\n'),
(6, 'zzxzxz', '2022-11-11 02:25:54', '<p>ddsdd</p>\r\n'),
(7, 'dddd', '2022-11-11 02:27:33', '<p>dddd</p>\r\n');

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
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` smallint(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `id_pengguna` smallint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `foto_profil`, `id_pengguna`, `is_active`, `date_created`) VALUES
(1, 'Syupyan', 'Syupyan@gmail.com', '$2y$10$ueeLDhDQTdTCsnQY2aO/EOrBz58xwpcphenzSn6YGgpuvxQOM24Di', 'arrows-active.png', 1, 1, '2022-10-28 07:09:57');

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
(2, 'User', 'nav-icon fas fa-users', 'admin/master-user', 1, 1),
(3, 'Jurusan', 'nav-icon fas fa-user-tie', 'admin/master-jurusan', 1, 1),
(4, 'Dashboard Pengusul', 'nav-icon fas fa-tachometer-alt', 'pengusul', 1, 5),
(5, 'Tulis Usulan', 'nav-icon fas fa-info', 'pengusul/write-usulan', 1, 5),
(7, 'Tulis Pengumuman', 'nav-icon fas fa-user-tie', 'pengusul/write-pengumuman', 1, 5),
(8, 'Lengkapi data diri', 'nav-icon fas fa-user-edit', 'user/edit-profile', 1, 3),
(9, 'Ubah Password', 'nav-icon fas fa-lock', 'user/change-password', 1, 3),
(10, 'Profil Saya', 'nav-icon fas fa-user', 'user', 1, 3),
(14, 'Ajukan Usulan', 'nav-icon fas fa-calendar', 'admin/master-usulan', 1, 1),
(15, 'Pengumuman', 'nav-icon fas fa-info', 'admin/master-pengumuman', 1, 1),
(16, 'Menu Sidebar', 'nav-icon fas fa-folder', 'admin/master-menu', 1, 1),
(20, 'Hapus Akun Saya', 'nav-icon fa fa-ban', 'user/delete-my-account', 1, 3),
(23, 'Akses Manager', 'nav-icon fa fa-user-secret', 'admin/access-manager', 1, 1),
(24, 'Menu Manager', 'nav-icon fa fa-folder-open', 'admin/menu-manager', 1, 1),
(25, 'Mata Kuliah', 'w', 'admin/master-matakuliah', 1, 3);

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
-- Struktur dari tabel `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int(11) NOT NULL,
  `proyek_nama` varchar(100) NOT NULL,
  `dibuat_sejak` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proyek_deskripsi` text NOT NULL,
  `proyek_kompetensi` text NOT NULL,
  `proyek_pemilik` varchar(255) NOT NULL,
  `status_pesan` tinyint(1) NOT NULL COMMENT '1=read,0=unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `proyek_nama`, `dibuat_sejak`, `proyek_deskripsi`, `proyek_kompetensi`, `proyek_pemilik`, `status_pesan`) VALUES
(1, 'dddd', '2022-11-07 07:04:22', '<p>ddddd</p>\r\n', 'dddd', 'Administrator', 1),
(5, 'sss', '2022-11-11 03:10:47', '<p>eee</p>\r\n', 'dddd', 'Administrator', 1),
(6, 'ssss', '2022-11-11 03:10:47', '<p>dddddd</p>\r\n', 'dddd', 'Administrator', 1),
(7, 'eeewwe', '2022-11-11 03:10:47', '<p>ddddd</p>\r\n', 'dddd', 'Administrator', 1),
(8, 'dsdsds', '2022-11-11 03:10:47', '<p>dddfdff</p>\r\n', 'fdffe', 'Administrator', 1),
(9, 'sssdsd', '2022-11-11 03:10:47', '<p>dsdsdsdsd</p>\r\n', 'dsdsds', 'Administrator', 1),
(10, 'dddddsdwqdw', '2022-11-11 03:10:47', '<p>dddswsds</p>\r\n', 'dsdsdsdsdsd', 'Administrator', 1),
(11, '222', '2022-11-11 03:10:47', '<p>222</p>\r\n', '22', 'Administrator', 1),
(15, 'ehjwewjejwhej', '2022-11-13 03:25:55', '<p>dcdcdcdc</p>\r\n', 'cccdd', 'Administrator', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kategori_jurusan`
--
ALTER TABLE `tbl_kategori_jurusan`
  ADD PRIMARY KEY (`id_kategori_jurusan`);

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
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

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
  MODIFY `id_access_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_jurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_jurusan`
--
ALTER TABLE `tbl_kategori_jurusan`
  MODIFY `id_kategori_jurusan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna_menu`
--
ALTER TABLE `tbl_pengguna_menu`
  MODIFY `id_pengguna_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
