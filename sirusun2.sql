-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 07.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirusun2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cron_test`
--

CREATE TABLE `cron_test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cron_test`
--

INSERT INTO `cron_test` (`id`, `date`) VALUES
(1, '2021-11-04'),
(2, '2021-11-05'),
(3, '2021-11-08'),
(4, '2021-11-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `lantai_id` int(11) NOT NULL,
  `rusun_id` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `lantai_id`, `rusun_id`, `no_kamar`, `status`) VALUES
(1, 2, 1, 101, 1),
(3, 3, 3, 101, 1),
(9, 2, 1, 102, 1),
(10, 2, 1, 103, 1),
(11, 2, 1, 104, 1),
(12, 3, 3, 102, 1),
(13, 8, 3, 201, 0),
(14, 3, 3, 103, 0),
(15, 4, 1, 201, 0),
(16, 2, 1, 105, 0),
(17, 10, 4, 101, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lantai`
--

CREATE TABLE `lantai` (
  `id` int(11) NOT NULL,
  `rusun_id` int(11) NOT NULL,
  `nama_lantai` varchar(100) NOT NULL,
  `harga_lantai` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lantai`
--

INSERT INTO `lantai` (`id`, `rusun_id`, `nama_lantai`, `harga_lantai`, `is_active`) VALUES
(2, 1, 'Lantai 1', 200000, 1),
(3, 3, 'Lantai 1', 300000, 1),
(4, 1, 'Lantai 2', 300000, 1),
(5, 1, 'Lantai 3', 400000, 1),
(6, 1, 'Lantai 4', 500000, 1),
(7, 1, 'Lantai 5', 600000, 1),
(8, 3, 'Lantai 2', 300000, 1),
(9, 3, 'Lantai 3', 500000, 1),
(10, 4, 'Lantai 1', 200000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `tagihan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `tagihan_id`, `jumlah`, `bulan`, `tahun`) VALUES
(1, 5, 200000, 10, 2021),
(2, 1, 200000, 11, 2021),
(3, 3, 300000, 11, 2021),
(4, 2, 200000, 11, 2021),
(5, 4, 300000, 11, 2021),
(6, 6, 200000, 11, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `nama_penghuni` varchar(128) NOT NULL,
  `nik_penghuni` varchar(20) NOT NULL,
  `no_kk_penghuni` varchar(20) NOT NULL,
  `ktp_penghuni` varchar(128) NOT NULL,
  `kk_penghuni` varchar(128) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id`, `kamar_id`, `nama_penghuni`, `nik_penghuni`, `no_kk_penghuni`, `ktp_penghuni`, `kk_penghuni`, `tgl_masuk`, `status`) VALUES
(1, 1, 'Penghuni 1', '1234567890123456', '1234567890123456', '11-21_ktp_Penghuni_1.jpg', '11-21_kk_Penghuni_1.jpg', '2021-11-04', 1),
(2, 9, 'Penghuni 2', '1234567890123455', '1234567890123455', '11-21_ktp_Penghuni_2.jpg', '11-21_kk_Penghuni_2.jpg', '2021-11-04', 1),
(3, 3, 'Penghuni 3', '1234567890123454', '1234567890123454', '11-21_ktp_Penghuni_3.jpg', '11-21_kk_Penghuni_3.jpg', '2021-11-04', 1),
(4, 12, 'Penghuni 4', '1234567890123453', '1234567890123453', '11-21_ktp_Penghuni_4.jpg', '11-21_kk_Penghuni_4.jpg', '2021-11-04', 1),
(5, 17, 'Penghuni 5', '1234567890123452', '1234567890123452', '11-21_ktp_Penghuni_5.jpg', '11-21_kk_Penghuni_5.jpg', '2021-11-04', 1),
(6, 10, 'Penghuni 6', '1234567890123451', '1234567890123451', '11-21_ktp_Penghuni_6.jpg', '11-21_kk_Penghuni_6.jpg', '2021-11-04', 1),
(7, 11, 'Penghuni 7', '1234567890123450', '1234567890123450', '11-21_ktp_Penghuni_7.jpg', '11-21_kk_Penghuni_7.jpg', '2021-11-04', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rusun`
--

CREATE TABLE `rusun` (
  `id` int(11) NOT NULL,
  `nama_rusun` varchar(128) NOT NULL,
  `alamat_rusun` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rusun`
--

INSERT INTO `rusun` (`id`, `nama_rusun`, `alamat_rusun`, `is_active`, `date_create`) VALUES
(1, 'Rusun Anggrek Mawar', 'Jl. Lanto Dg. Pasewang', 1, 1633664751),
(3, 'Rusun Melati', 'Jl. Pahlawan', 1, 1633691462),
(4, 'Rusun ASN', 'Jl. Lanto Dg. Pasewang', 1, 1635411673);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `penghuni_id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tgl_tenggat` date NOT NULL,
  `is_bayar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `penghuni_id`, `bulan`, `tahun`, `tgl_tenggat`, `is_bayar`) VALUES
(1, 1, 11, 2021, '2021-11-30', 1),
(2, 2, 11, 2021, '2021-11-30', 1),
(3, 3, 11, 2021, '2021-11-30', 1),
(4, 4, 11, 2021, '2021-11-30', 1),
(5, 5, 11, 2021, '2021-11-30', 1),
(6, 6, 11, 2021, '2021-11-30', 1),
(7, 7, 10, 2021, '2021-10-31', 0),
(8, 7, 11, 2021, '2021-11-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(1, 'arlandsetiawan', '$2y$10$u3fCxcX.GVrpvpQUQWl3LuuB6L/RoXS5LB0B842lygsD0QKEyw7tS', 1, 1, 1633110239),
(2, 'setiawanarland', '$2y$10$ykPHJ5Gg7T6XBsiBmS.bBu//FUzNEh3owcFiKcOt2dRAsj5Kom0UK', 2, 1, 1633411456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(9, 1, 6),
(14, 2, 2),
(16, 1, 1),
(17, 1, 9),
(20, 1, 3),
(21, 2, 3),
(22, 2, 4),
(23, 1, 5),
(24, 1, 4),
(25, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_rusun`
--

CREATE TABLE `user_access_rusun` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rusun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_rusun`
--

INSERT INTO `user_access_rusun` (`id`, `user_id`, `rusun_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(4, 2, 3),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(5, 'Main'),
(6, 'CronTest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `sub_menu`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'User', 'admin/user', 'far fa-fw-4 fa-users', 1),
(2, 1, 'User Role', 'admin/role', 'fas fa-fw-4 fa-users-cog', 1),
(3, 1, 'Menu', 'admin/menu', 'far fa-fw-3 fa-bars', 1),
(4, 1, 'Submenu', 'admin/submenu', 'far fa-fw-4 fa-ellipsis-h', 1),
(6, 1, 'Rusun', 'admin/rusun', 'far fa-fw-3 fa-building', 1),
(8, 1, 'Lantai', 'admin/lantai', 'fas fa-fw-4 fa-layer-group', 1),
(9, 1, 'Kamar', 'admin/kamar', 'fas fa-fw-4 fa-door-open', 1),
(11, 3, 'Daftar Kamar', 'kamar/list', 'far fa-fw-4 fa-hotel', 1),
(12, 4, 'Daftar Penghuni', 'penghuni/list', 'fas fa-fw-4 fa-restroom', 0),
(13, 5, 'Dashboard', 'main/dashboard', 'far fa-fw-4 fa-home', 1),
(14, 5, 'Daftar Kamar', 'main/kamar', 'far fa-fw-4 fa-hotel', 1),
(15, 5, 'Daftar Penghuni', 'main/penghuni', 'far fa-fw-4 fa-restroom', 1),
(16, 5, 'Tagihan', 'main/tagihan', 'far fa-fw-4 fa-wallet', 1),
(17, 5, 'Pendapatan', 'main/pendapatan', 'far fa-fw-4 fa-plus-circle', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cron_test`
--
ALTER TABLE `cron_test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rusun`
--
ALTER TABLE `rusun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_rusun`
--
ALTER TABLE `user_access_rusun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cron_test`
--
ALTER TABLE `cron_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rusun`
--
ALTER TABLE `rusun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_access_rusun`
--
ALTER TABLE `user_access_rusun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
