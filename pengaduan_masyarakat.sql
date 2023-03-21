-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2023 pada 10.57
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(11, 'Lingkungan Hidup'),
(17, 'Kesehatan'),
(18, 'Sosial'),
(19, 'Perhubungan'),
(20, 'Perizinan'),
(21, 'Prasarana Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `name` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `name`, `username`, `password`, `telp`) VALUES
(4, '12345', 'user', 'user', '$2y$10$dNzjDyUAdhYbOu61ftg2ZO9Oi', '12345'),
(5, '0987654321112', 'galang', 'galang', '$2y$10$nUCF7zvCzLyxKE6mKLLODev7V2Dj4V.2qszwpe2evl.ugdj/gXPQq', '1208301239712'),
(6, '098', 'zx', 'zx', '$2y$10$D.ZRMckPnt55JKxVYAZ7fekq1wvV5jGLk0lmsssGdyYIoCl/rXYVS', '123'),
(7, '123123', 'zada', 'ganteng', '$2y$10$LEaN9UfUeGJju2AFf9CmEuSTNHJyScm.fTuB68MghNoLjXYcBieCy', '5445454');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('segera','proses','selesai') NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_kategori`, `id_subkategori`) VALUES
(19, '2023-03-21', '098', 'asdasd', '25639112352.jpg', 'selesai', 11, 0),
(20, '2023-03-21', '', 'asdasdasdasd', '3161955_84399da4-1a4c-44a7-b631-1694e0e218e3_554_5542.jpg', 'segera', 17, 0),
(21, '2023-03-21', '098', 'qwerty', 'antusiasme-pemuda-jadi-prajurit-tni-dinilai-makin-meningkat-afA-thumb.jpg', 'selesai', 18, 0),
(23, '2023-03-21', '', 'xyz', '', 'segera', 19, 0),
(24, '2023-03-21', '098', 'sd', '', 'segera', 21, 0),
(25, '2023-03-21', '098', 'asd', '', 'segera', 20, 0),
(26, '2023-03-21', '098', 'asd', '3161955_84399da4-1a4c-44a7-b631-1694e0e218e3_554_5543.jpg', 'segera', 20, 0),
(27, '2023-03-21', '', 'asd', '3161955_84399da4-1a4c-44a7-b631-1694e0e218e3_554_5545.jpg', 'segera', 11, 0),
(28, '2023-03-21', '098', 'qwerty', '3161955_84399da4-1a4c-44a7-b631-1694e0e218e3_554_5546.jpg', 'proses', 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(2, 'admin1', 'admin1', '$2y$10$iay7nfUvYMSzquzMLrC7h.LNvCColtFy1z/z5pf7muQ6kd7J9rI3q', '123123123', 'admin'),
(3, 'admin2', 'admin2', '$2y$10$BEYxxwZe67ZO9SPWdVDgweNHXUAVGk4SzLJBAYB/8Se1J1kdAgsvG', '09809', 'admin'),
(4, 'levi', 'ackerman', '$2y$10$Ao4w7fUN8j1QdzxImiywWufngQspRX9wiqytVfg7piZiCCJlTkEz6', '56464675', 'petugas'),
(5, 'admin3', 'admin3', '$2y$10$nC46vOt3K0pxHAcIWCQCN.1IOiCVSW7txekfqnORbWsV9MvmRJvs.', '121212', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(16, 11, 'sampah'),
(17, 17, 'asd'),
(18, 18, 'ASD'),
(19, 19, 'qwerty');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(2, 19, '2023-03-21', 'asd', 5),
(3, 28, '2023-03-21', 'sudah di bersihkan', 3),
(4, 21, '2023-03-21', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_2` (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
