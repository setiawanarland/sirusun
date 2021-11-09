-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2021 pada 17.35
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
(1, 1, 1, 101, 0),
(2, 1, 1, 102, 0),
(3, 1, 1, 103, 0),
(4, 1, 1, 104, 0),
(5, 2, 1, 201, 0),
(6, 2, 1, 202, 0),
(7, 2, 1, 203, 0),
(8, 2, 1, 204, 0),
(9, 2, 1, 205, 0),
(10, 2, 1, 206, 0),
(11, 2, 1, 207, 0),
(12, 2, 1, 208, 0),
(13, 2, 1, 209, 0),
(14, 2, 1, 210, 0),
(15, 2, 1, 211, 0),
(16, 2, 1, 212, 0),
(17, 2, 1, 213, 0),
(18, 2, 1, 214, 0),
(19, 2, 1, 215, 0),
(20, 2, 1, 216, 0),
(21, 2, 1, 217, 0),
(22, 2, 1, 218, 0),
(23, 2, 1, 219, 0),
(24, 2, 1, 220, 0),
(25, 2, 1, 221, 0),
(26, 2, 1, 222, 0),
(27, 2, 1, 223, 0),
(28, 2, 1, 224, 0),
(29, 3, 1, 301, 0),
(30, 3, 1, 302, 0),
(31, 3, 1, 303, 0),
(32, 3, 1, 304, 0),
(33, 3, 1, 305, 0),
(34, 3, 1, 306, 0),
(35, 3, 1, 307, 0),
(36, 3, 1, 308, 0),
(37, 3, 1, 309, 0),
(38, 3, 1, 310, 0),
(39, 3, 1, 311, 0),
(40, 3, 1, 312, 0),
(41, 3, 1, 313, 0),
(42, 3, 1, 314, 0),
(43, 3, 1, 315, 0),
(44, 3, 1, 316, 0),
(45, 3, 1, 317, 0),
(46, 3, 1, 318, 0),
(47, 3, 1, 319, 0),
(48, 3, 1, 320, 0),
(49, 3, 1, 321, 0),
(50, 3, 1, 323, 0),
(51, 3, 1, 324, 0),
(52, 4, 1, 401, 0),
(53, 4, 1, 402, 0),
(54, 4, 1, 403, 0),
(55, 4, 1, 404, 0),
(56, 4, 1, 405, 0),
(57, 4, 1, 406, 0),
(58, 4, 1, 407, 0),
(59, 4, 1, 408, 0),
(60, 4, 1, 409, 0),
(61, 4, 1, 410, 0),
(62, 4, 1, 411, 0),
(63, 4, 1, 412, 0),
(64, 4, 1, 413, 0),
(65, 4, 1, 414, 0),
(66, 4, 1, 415, 0),
(67, 4, 1, 416, 0),
(68, 4, 1, 417, 0),
(69, 4, 1, 418, 0),
(70, 4, 1, 419, 0),
(71, 4, 1, 420, 0),
(72, 4, 1, 421, 0),
(73, 4, 1, 422, 0),
(74, 4, 1, 423, 0),
(75, 4, 1, 424, 0),
(76, 5, 1, 501, 0),
(77, 5, 1, 502, 0),
(78, 5, 1, 503, 0),
(79, 5, 1, 504, 0),
(80, 5, 1, 505, 0),
(81, 5, 1, 506, 0),
(82, 5, 1, 507, 0),
(83, 5, 1, 508, 0),
(84, 5, 1, 509, 0),
(85, 5, 1, 510, 0),
(86, 5, 1, 511, 0),
(87, 5, 1, 512, 0),
(88, 5, 1, 513, 0),
(89, 5, 1, 514, 0),
(90, 5, 1, 515, 0),
(91, 5, 1, 516, 0),
(92, 5, 1, 517, 0),
(93, 5, 1, 518, 0),
(94, 5, 1, 519, 0),
(95, 5, 1, 520, 0),
(96, 5, 1, 521, 0),
(97, 5, 1, 522, 0),
(98, 5, 1, 523, 0),
(99, 5, 1, 524, 0),
(100, 6, 2, 101, 0),
(101, 6, 2, 102, 0),
(102, 6, 2, 103, 0),
(103, 6, 2, 104, 0),
(104, 7, 1, 201, 0),
(105, 7, 1, 202, 0),
(106, 7, 1, 203, 0),
(107, 7, 1, 204, 0),
(108, 7, 1, 207, 0),
(109, 7, 1, 206, 0),
(110, 7, 1, 207, 0),
(111, 7, 1, 208, 0),
(112, 7, 1, 209, 0),
(113, 7, 1, 210, 0),
(114, 7, 1, 211, 0),
(115, 7, 1, 212, 0),
(116, 7, 1, 213, 0),
(117, 7, 1, 214, 0),
(118, 7, 1, 217, 0),
(119, 7, 1, 216, 0),
(120, 7, 1, 217, 0),
(121, 7, 1, 218, 0),
(122, 7, 1, 219, 0),
(123, 7, 1, 220, 0),
(124, 7, 1, 221, 0),
(125, 7, 1, 222, 0),
(126, 7, 1, 223, 0),
(127, 7, 1, 224, 0),
(128, 8, 1, 301, 0),
(129, 8, 1, 302, 0),
(130, 8, 1, 303, 0),
(131, 8, 1, 304, 0),
(132, 8, 1, 307, 0),
(133, 8, 1, 306, 0),
(134, 8, 1, 307, 0),
(135, 8, 1, 308, 0),
(136, 8, 1, 309, 0),
(137, 8, 1, 310, 0),
(138, 8, 1, 311, 0),
(139, 8, 1, 312, 0),
(140, 8, 1, 313, 0),
(141, 8, 1, 314, 0),
(142, 8, 1, 317, 0),
(143, 8, 1, 316, 0),
(144, 8, 1, 317, 0),
(145, 8, 1, 318, 0),
(146, 8, 1, 319, 0),
(147, 8, 1, 320, 0),
(148, 8, 1, 321, 0),
(149, 8, 1, 322, 0),
(150, 8, 1, 323, 0),
(151, 8, 1, 324, 0),
(152, 9, 1, 401, 0),
(153, 9, 1, 402, 0),
(154, 9, 1, 403, 0),
(155, 9, 1, 404, 0),
(156, 9, 1, 407, 0),
(157, 9, 1, 406, 0),
(158, 9, 1, 407, 0),
(159, 9, 1, 408, 0),
(160, 9, 1, 409, 0),
(161, 9, 1, 410, 0),
(162, 9, 1, 411, 0),
(163, 9, 1, 412, 0),
(164, 9, 1, 413, 0),
(165, 9, 1, 414, 0),
(166, 9, 1, 417, 0),
(167, 9, 1, 416, 0),
(168, 9, 1, 417, 0),
(169, 9, 1, 418, 0),
(170, 9, 1, 419, 0),
(171, 9, 1, 420, 0),
(172, 9, 1, 421, 0),
(173, 9, 1, 422, 0),
(174, 9, 1, 423, 0),
(175, 9, 1, 424, 0),
(176, 10, 1, 501, 0),
(177, 10, 1, 502, 0),
(178, 10, 1, 503, 0),
(179, 10, 1, 504, 0),
(180, 10, 1, 507, 0),
(181, 10, 1, 506, 0),
(182, 10, 1, 507, 0),
(183, 10, 1, 508, 0),
(184, 10, 1, 509, 0),
(185, 10, 1, 510, 0),
(186, 10, 1, 511, 0),
(187, 10, 1, 512, 0),
(188, 10, 1, 513, 0),
(189, 10, 1, 514, 0),
(190, 10, 1, 517, 0),
(191, 10, 1, 516, 0),
(192, 10, 1, 517, 0),
(193, 10, 1, 518, 0),
(194, 10, 1, 519, 0),
(195, 10, 1, 520, 0),
(196, 10, 1, 521, 0),
(197, 10, 1, 522, 0),
(198, 10, 1, 523, 0),
(199, 10, 1, 524, 0);

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
(1, 1, 'Lantai 1', 200000, 1),
(2, 1, 'Lantai 2', 200000, 1),
(3, 1, 'Lantai 3', 175000, 1),
(4, 1, 'Lantai 4', 150000, 1),
(5, 1, 'Lantai 5', 125000, 1),
(6, 2, 'Lantai 1', 300000, 1),
(7, 2, 'Lantai 2', 200000, 1),
(8, 2, 'Lantai 3', 175000, 1),
(9, 2, 'Lantai 4', 150000, 1),
(10, 2, 'Lantai 5', 125000, 1);

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
  `pekerjaan` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Rusun Anggrek', 'Jl. 1', 1, 1636472994),
(2, 'Rusun Mawar', 'Jl. 2', 1, 1636473027);

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
(5, 1, 4),
(6, 1, 2);

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
(1, 1, 'User', 'admin/user', 'far fa-fw-4 fa-users', 0),
(2, 1, 'User Role', 'admin/role', 'fas fa-fw-4 fa-users-cog', 0),
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
(17, 5, 'Pendapatan', 'main/pendapatan', 'far fa-fw-4 fa-plus-circle', 1),
(18, 5, 'Laporan', 'main/laporan', 'far fa-fw-4 fa-file-signature', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rusun`
--
ALTER TABLE `rusun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
