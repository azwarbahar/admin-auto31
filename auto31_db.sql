-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2023 pada 18.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto31_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `jabatan`, `email`, `password`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Administrator', 'admin@gmail.com', '$2y$10$FSGqIlBPsZ/RGBqJ251JxuDRh7fohLl3R8SLBDQ4qlyrl01ASUSra', 'image_1681443163.jpg', 'Active', '2023-01-24 10:56:08', '2023-01-24 10:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama`, `harga`, `satuan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(3, 'klasik', '20000', 'Pcs', 'image_1681407938.jpg', 'Tersedia', '2023-04-13 17:45:38', '2023-04-13 17:45:38'),
(4, 'Abcde', '15000', 'Box', 'image_1681407971.png', 'Tidak Tersedia', '2023-04-13 17:46:11', '2023-04-13 17:46:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `merek_kendaraan` varchar(255) DEFAULT NULL,
  `model_kendaraan` varchar(255) DEFAULT NULL,
  `tahun_kendaraan` varchar(255) DEFAULT NULL,
  `nomor_kendaraan` varchar(255) DEFAULT NULL,
  `foto_kendaraan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama`, `kontak`, `email`, `password`, `merek_kendaraan`, `model_kendaraan`, `tahun_kendaraan`, `nomor_kendaraan`, `foto_kendaraan`, `foto`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Azwar Bahar', '081234567890', 'azwarbahar07@gmail.com', '123456789', 'Toyota', 'Avanza', '2014', 'DD 1234 XB', 'photo_default.png', 'photo_default.png', 'Jalan Mamoa Baru No 1 Makassar', 'Active', '2023-04-14 17:18:03', '2023-04-14 17:18:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_service`
--

CREATE TABLE `tb_service` (
  `id` int(11) NOT NULL,
  `pelanggan_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `merek_kendaraan` varchar(255) DEFAULT NULL,
  `model_kendaraan` varchar(255) DEFAULT NULL,
  `tahun_kendaraan` varchar(255) DEFAULT NULL,
  `nomor_kendaraan` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `teknisi_id` varchar(255) DEFAULT NULL,
  `biaya` varchar(255) DEFAULT NULL,
  `status_bayar` varchar(255) DEFAULT NULL,
  `status_service` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`id`, `pelanggan_id`, `nama`, `merek_kendaraan`, `model_kendaraan`, `tahun_kendaraan`, `nomor_kendaraan`, `kontak`, `alamat`, `latitude`, `longitude`, `masalah`, `jenis`, `teknisi_id`, `biaya`, `status_bayar`, `status_service`, `created_at`, `updated_at`) VALUES
(1, '1', 'Muhammad Azwar Bahar', 'Toyota', 'Avanza', '2014', 'DD 1234 XB', '081234567890', 'Jalan A.P Petta Rani no 100 Makassar', '456789', '456789', 'Mati tiba-tiba, kempes', 'Service Luar', '1', '400000', 'Lunas', 'Done', '2023-04-14 19:11:44', '2023-04-16 09:02:09'),
(2, '', 'Acca', 'Honda', 'Jezz', '2012', 'DD 3333 XS', '081234567890', 'Jalan Sultan Alauddin No 400', '456789', '456789', 'Mati tiba-tiba, kempes', 'Service Dalam', '1', NULL, 'Belum', 'New', '2023-04-14 19:16:06', '2023-04-14 19:16:06'),
(3, NULL, 'Hilda', 'Honda', 'Brio', '2015', 'DD 3232 XC', '081234567890', 'Jalan Ratulangi No 212', NULL, NULL, 'Habis Bensin', 'Service Dalam', NULL, '200000', 'Lunas', 'Done', '2023-04-14 20:08:12', '2023-04-16 09:00:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_teknisi`
--

CREATE TABLE `tb_teknisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_teknisi`
--

INSERT INTO `tb_teknisi` (`id`, `nama`, `kontak`, `username`, `password`, `jabatan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qwert', '1234', 'qwerty123', '$2y$10$WiSBx68w4trSodhweN0Aje9ZCxJox2m10oQSyI4iytgfPG6mcud0y', 'Teknisi', 'image_1681445553.jpeg', 'Active', '2023-04-14 04:12:33', '2023-04-14 04:12:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
