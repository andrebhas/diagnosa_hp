-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jun 2017 pada 07.41
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnosa_hp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `temp_code` varchar(50) NOT NULL,
  `kode_jenis_kerusakan` varchar(5) NOT NULL,
  `kode_solusi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `nama`, `email`, `temp_code`, `kode_jenis_kerusakan`, `kode_solusi`) VALUES
(5, 'andre', 'wkwkwkwk@s.s', '1497763746', 'R01', 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Akses Administrator'),
(3, 'pakar', 'Pakar Akses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kerusakan`
--

CREATE TABLE `jenis_kerusakan` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `jenis_kerusakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kerusakan`
--

INSERT INTO `jenis_kerusakan` (`id`, `kode`, `jenis_kerusakan`) VALUES
(3, 'R01', 'Kerusakan Kamera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kode` varchar(5) NOT NULL,
  `id_jenis_kerusakan` int(11) NOT NULL,
  `ya` varchar(5) NOT NULL,
  `tidak` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `kode`, `id_jenis_kerusakan`, `ya`, `tidak`) VALUES
(15, 'Apakah Kamera Bisa Menangkap Gambar Dengan Normal / Hasil Memuaskan?', 'T3', 3, 'S4', 'S3'),
(16, 'Apakah Kamera Bisa Menangkap Gambar?', 'T2', 3, 'T3', 'S2'),
(17, 'Apakah Ponsel Bisa Membuka Menu Kamera?', 'T1', 3, 'T2', 'S1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id`, `kode`, `solusi`) VALUES
(10, 'S1', '1. Langkah Pertama Cek Komponen Kamera Bila Rusak Ganti \r\n    Dengan Komponen Yang Baru. \r\n2. Lakukan Pengecekan Dengan  Software\r\n    Terlebih Dahulu Dengan Cara  Flashing  Ulang\r\n    Software Android Versi 6.0 Marsmallow. \r\n3. Lakukan Pengecekan Pada Jalur Konektor, \r\n    Bersihkan Dengan Menggunakan Cairan \r\n    Pembersih Khusus. \r\n4. Cek Jalur Yang Berhubungan Dengan \r\n    Komponen Kamera, Gunakan Skema Diagram, \r\n    Kemungkinan Ada Jalur Yang Putus. \r\n5. Bila Jalur Dalam Kondisi Baik Dan Tegangan \r\n    Kamera Ada, Berarti Kerusakan Ada Pada \r\n    Komponen Kamera, Ganti Dengan Kamera \r\n    Baru.'),
(11, 'S2', '1. Langkah Pertama Cek Komponen Kamera Bila Rusak Ganti \r\n    Dengan Komponen Yang Baru. \r\n2. Lakukan Pengecekan Dengan  Software\r\n    Terlebih Dahulu Dengan Cara  Flashing  Ulang\r\n    Software Android Versi 6.0 Marsmallow. \r\n3. Lakukan Pengecekan Pada Jalur Konektor, \r\n    Bersihkan Dengan Menggunakan Cairan \r\n    Pembersih Khusus. \r\n4. Cek Jalur Yang Berhubungan Dengan \r\n    Komponen Kamera, Gunakan Skema Diagram, \r\n    Kemungkinan Ada Jalur Yang Putus. \r\n5. Bila Jalur Dalam Kondisi Baik Dan Tegangan \r\n    Kamera Ada, Berarti Kerusakan Ada Pada \r\n    Komponen Kamera, Ganti Dengan Kamera \r\n    Baru.'),
(12, 'S3', '1. Langkah Pertama Cek Komponen Kamera Bila Rusak Ganti \r\n    Dengan Komponen Yang Baru. \r\n2. Lakukan Pengecekan Dengan  Software\r\n    Terlebih Dahulu Dengan Cara  Flashing  Ulang\r\n    Software Android Versi 6.0 Marsmallow. \r\n3. Lakukan Pengecekan Pada Jalur Konektor, \r\n    Bersihkan Dengan Menggunakan Cairan \r\n    Pembersih Khusus. \r\n4. Cek Jalur Yang Berhubungan Dengan \r\n    Komponen Kamera, Gunakan Skema Diagram, \r\n    Kemungkinan Ada Jalur Yang Putus. \r\n5. Bila Jalur Dalam Kondisi Baik Dan Tegangan \r\n    Kamera Ada, Berarti Kerusakan Ada Pada \r\n    Komponen Kamera, Ganti Dengan Kamera \r\n    Baru.'),
(13, 'S4', 'Tidak Ada Kerusakan Pada Kamera'),
(14, 'S5', '1. Lakukan Restart Perangkat Ponsel\r\n2. Cara Kedua Yaitu Lepaskan Kartu SIM\r\n3. Lakukan Kalibrasi Layar\r\n4. Upgrade OS Atau Perbaharui OS\r\n5. Bersihkan Layar (Menggunakan Isopropil Alkohol Dan Small Brush)\r\n6. Coba Hard Reset Ponsel\r\n7. Jika Masih Tidak Bisa Langkah Terakhir Ganti Touchscreen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `temp_code` varchar(50) NOT NULL,
  `kode_pertanyaan` varchar(10) NOT NULL,
  `jawaban` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id`, `temp_code`, `kode_pertanyaan`, `jawaban`) VALUES
(19, '1497763746', 'T1', 'ya'),
(20, '1497763746', 'T2', 'ya'),
(21, '1497763746', 'T3', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` varchar(256) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `phone`, `alamat`, `user_img`, `last_login`, `created_on`, `active`, `ip_address`, `salt`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '0823338173177', 'Jln Cempaka No 38 Jember', 'usr_img_1a72594.jpg', 1497763715, 1268889823, 1, '127.0.0.1', NULL),
(14, 'Andre Bhaskoro', 'andre.bhas@gmail.com', 'andre', '$2y$08$y4Xi/Sb0VTmOR0h1Q6bMs.EnOmFANl5WLIR.CRN89Zehh/uNYqxLu', '082333817317', 'Jln Cempaka No 38', 'usr_img_0d98b59.jpg', 1493916240, 1493908024, 1, '::1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(15, 14, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_diagnosa`
--
CREATE TABLE `v_diagnosa` (
`id` int(11)
,`nama` varchar(50)
,`email` varchar(50)
,`temp_code` varchar(50)
,`jenis_kerusakan` text
,`solusi` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_temp`
--
CREATE TABLE `v_temp` (
`id` int(11)
,`temp_code` varchar(50)
,`kode_pertanyaan` varchar(10)
,`pertanyaan` text
,`jawaban` varchar(6)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_diagnosa`
--
DROP TABLE IF EXISTS `v_diagnosa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_diagnosa`  AS  select `diagnosa`.`id` AS `id`,`diagnosa`.`nama` AS `nama`,`diagnosa`.`email` AS `email`,`diagnosa`.`temp_code` AS `temp_code`,`jenis_kerusakan`.`jenis_kerusakan` AS `jenis_kerusakan`,`solusi`.`solusi` AS `solusi` from ((`diagnosa` join `jenis_kerusakan` on((`jenis_kerusakan`.`kode` = `diagnosa`.`kode_jenis_kerusakan`))) join `solusi` on((`solusi`.`kode` = `diagnosa`.`kode_solusi`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_temp`
--
DROP TABLE IF EXISTS `v_temp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_temp`  AS  select `temp`.`id` AS `id`,`temp`.`temp_code` AS `temp_code`,`temp`.`kode_pertanyaan` AS `kode_pertanyaan`,`pertanyaan`.`pertanyaan` AS `pertanyaan`,`temp`.`jawaban` AS `jawaban` from (`temp` join `pertanyaan` on((`pertanyaan`.`kode` = `temp`.`kode_pertanyaan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temp_code` (`temp_code`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kerusakan`
--
ALTER TABLE `jenis_kerusakan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_kerusakan`
--
ALTER TABLE `jenis_kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
