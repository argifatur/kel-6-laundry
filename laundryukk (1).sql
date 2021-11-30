-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2021 pada 12.02
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detailtransaksi`, `id_transaksi`, `id_paket`, `qty`, `keterangan`) VALUES
(1, 1, 1, 3, '-'),
(2, 10, 1, 2, 'oke'),
(3, 23, 1, 2, 'oke'),
(4, 24, 1, 3, 'oke'),
(5, 26, 1, 3, '2sdas'),
(6, 27, 1, 12, 'wq'),
(7, 28, 1, 5, 'oke'),
(8, 29, 1, 121, 'oke'),
(9, 30, 1, 5, 'Oke'),
(10, 31, 1, 324, 'aasd'),
(11, 32, 1, 2, 'ad'),
(12, 34, 1, 2, 'sd'),
(13, 35, 1, 2, '23'),
(14, 36, 1, 22, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'satuanss'),
(4, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES
(2, 'admin123', 'eef', 'Perempuan', 7878);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'express 21', 5400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_nota` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_terima` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `diskon` double NOT NULL,
  `pajak` double NOT NULL,
  `status` enum('Lunas','DP','Belum Lunas','') NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nomor_nota`, `id_member`, `tgl_terima`, `tgl_selesai`, `diskon`, `pajak`, `status`, `total`) VALUES
(31, 1, '25042020001', 2, '2123-02-22 12:03:00', '0000-00-00 00:00:00', 0.05, 0.03, 'Lunas', 1839704),
(36, 1, '25042020032', 2, '2020-04-25 22:22:00', '2020-04-26 22:23:00', 0.05, 0.03, 'Lunas', 124918);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `role` enum('Admin','Kasir','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `no_hp`, `role`) VALUES
(1, 'adminx', 'admin', 'admin', 92, 'Admin'),
(3, 'admin', 'admin', 'admin', 82921082, 'Kasir'),
(8, 'kasir', 'kasir', 'kasir', 3112321, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detailtransaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
