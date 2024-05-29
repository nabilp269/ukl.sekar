-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2024 pada 17.09
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
(12, 'Kue Basah', 0.00, 0),
(13, 'Kue Kering', 100.00, 1),
(14, 'Kue Kastengel', 100.00, 2),
(15, 'Kue Nastar         Rp100.000', 100.00, 1),
(16, 'Kue Nastar         Rp100.000', 100.00, 1),
(17, 'Kue Nastar         Rp100.000', 100.00, 1),
(18, 'Kue Nastar         Rp100.000', 100.00, 1),
(19, 'Kue Nastar         Rp100.000', 100.00, 1),
(20, 'Kue Nastar         Rp100.000', 100.00, 1),
(21, 'Kue Palm Chesee    Rp85.000', 100.00, 1),
(22, 'Kue Kastengel      Rp100.000', 100.00, 1),
(23, 'Kue Kastengel      Rp100.000', 100.00, 1),
(24, 'Kue Kastengel      Rp100.000', 100.00, 1),
(25, 'Kue Kastengel      Rp100.000', 100.00, 1),
(26, 'Kue Kastengel      Rp100.000', 100.00, 1),
(27, 'Kue Nastar         Rp100.000', 100.00, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `telepon`, `id_barang`) VALUES
(2, 'opet', 'seruni', '098767865456', 12),
(3, 'isi', 'isi', '1892786567854', 13),
(4, 'dadang', 'suko', '1892786567854', 14),
(5, 'nabil', 'kebonagung', '0987896545654', 15),
(6, 'nabil', 'kebonagung', '0987896545654', 16),
(7, 'nabil', 'kebonagung', '0987896545654', 17),
(8, 'nabil', 'kebonagung', '0987896545654', 18),
(9, 'nabil', 'kebonagung', '0987896545654', 19),
(10, 'nabil', 'kebonagung', '0987896545654', 20),
(11, 'nabil', 'kebonagung', '098767865456', 21),
(12, 'nabil', 'kebonagung', '1892786567854', 22),
(13, 'nabil', 'kebonagung', '1892786567854', 23),
(14, 'nabil', 'kebonagung', '1892786567854', 24),
(15, 'nabil', 'kebonagung', '1892786567854', 25),
(16, 'nabil', 'kebonagung', '0987896545654', 26),
(17, 'tri', 'kebonagung', '089786789543', 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `created_at`) VALUES
(1, 'nabil putra', 'nabilputra33315@gmail.com', '262007', 'admin', '2024-05-18 15:24:07'),
(2, 'jokowi', 'jokowi@gmail.com', 'isi', 'user', '2024-05-18 15:39:48'),
(5, 'putra', 'putra@gmail.com', 'putra', 'user', '2024-05-22 03:41:05'),
(7, 'dreeee', 'dreeee@gmail.com', 'dre', 'user', '2024-05-27 07:40:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
