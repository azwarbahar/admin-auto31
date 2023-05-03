-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2023 pada 11.41
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
(5, 'Bindix Gigi Starter	', '230000', 'Unit', 'image_1682254020.jpg', 'Tersedia', '2023-04-23 12:47:00', '2023-04-23 12:49:01'),
(6, 'Lamu Sen', '55000', 'Unit', 'image_1682254055.jpg', 'Tersedia', '2023-04-23 12:47:35', '2023-04-23 12:47:35'),
(7, 'Kampas Kopling', '500000', 'Unit', 'image_1682254088.jpg', 'Tersedia', '2023-04-23 12:48:08', '2023-04-23 12:48:08'),
(8, 'Ritax Pompa Bensin', '150000', 'Unit', 'image_1682254119.jpg', 'Tersedia', '2023-04-23 12:48:39', '2023-04-23 12:48:39');

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
(1, 'Muhammad Azwar Bahar', '081234567890', 'azwarbahar07@gmail.com', '$2y$10$vojoEZeGqj8kiJWKJhleFuVl.9BHkJYsT1..j3YLsLWkFD/VT2fbG', 'Toyota', 'Avanza', '2016', 'DD 1234 XX', 'photo_default.png', 'image_1681895466.jpg', 'Jalan Mamoa Baru No 1 Makassar', 'Active', '2023-04-14 17:18:03', '2023-04-19 09:23:36'),
(3, 'Acca', '0812366554478', 'acca@gmail.com', '$2y$10$jexcCzrjmkVgDGKUAduk0.O.ogcP0XMnBwtIhd4LSjOukH4DDO.XW', 'Honda', 'Brio', '2020', 'DD 1 XX', NULL, 'photo_default.png', 'Jalan Anu No10', 'Active', '2023-04-21 08:06:05', '2023-04-24 12:00:22'),
(4, 'Musran', '085123456879', 'musran@gmail.com', '$2y$10$DhnLySwwnabP1C4uk8qSd.VsfSId4Zq.los60AnXNHWdiqINB9oTy', 'Honda', 'Brio', '2019', 'DP 1234 XX', NULL, 'photo_default.png', NULL, 'Active', '2023-05-03 09:01:17', '2023-05-03 09:03:40');

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
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_bayar` varchar(255) DEFAULT NULL,
  `status_service` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`id`, `pelanggan_id`, `nama`, `merek_kendaraan`, `model_kendaraan`, `tahun_kendaraan`, `nomor_kendaraan`, `kontak`, `alamat`, `latitude`, `longitude`, `masalah`, `jenis`, `teknisi_id`, `biaya`, `bukti_pembayaran`, `status_bayar`, `status_service`, `created_at`, `updated_at`) VALUES
(1, '1', 'Muhammad Azwar Bahar', 'Toyota', 'Avanza', '2014', 'DD 1234 XB', '081234567890', 'Jalan A.P Petta Rani no 100 Makassar', '-5.1818573', '119.431598', 'Mati tiba-tiba, kempes', 'Service Luar', '1', '400000', 'photo_default.png', 'Lunas', 'Done', '2023-04-14 19:11:44', '2023-04-16 09:02:09'),
(2, NULL, 'Acca', 'Honda', 'Jezz', '2012', 'DD 3333 XS', '081234567890', 'Jalan Sultan Alauddin No 400', '456789', '456789', 'Mati tiba-tiba, kempes', 'Service Dalam', NULL, NULL, NULL, 'Belum', 'New', '2023-04-14 19:16:06', '2023-04-14 19:16:06'),
(3, NULL, 'Hilda', 'Honda', 'Brio', '2015', 'DD 3232 XC', '081234567890', 'Jalan Ratulangi No 212', NULL, NULL, 'Habis Bensin', 'Service Dalam', NULL, '200000', NULL, 'Lunas', 'Done', '2023-04-14 20:08:12', '2023-04-16 09:00:53'),
(6, '1', 'Muhammad Azwar Bahar', 'Toyota', 'Avanza', '2016', 'DD 1234 XX', '081234567890', 'Jalan Traktor IV, Mangasa, Kota Makassar', '-5.1818573', '119.431598', 'Qwerty', 'Service Luar', '1', '120000', 'image_1681977001.jpg', 'Lunas', 'Done', '2023-04-19 19:13:12', '2023-04-20 07:50:01'),
(7, NULL, 'ghj', 'Audi', 'jkjk', '2525', 'ghjdd', '6789', 'fghjk', NULL, NULL, 'vhjnkl', 'Service Dalam', NULL, '200000', NULL, 'Lunas', 'Done', '2023-04-19 19:31:11', '2023-04-19 20:18:30'),
(8, '1', 'Muhammad Azwar Bahar', 'Toyota', 'Avanza', '2016', 'DD 1234 XX', '081234567890', ', Bua Kana, Kota Makassar', '-5.1559553', '119.4373295', 'Mesin tidak mau menyala', 'Service Luar', '1', '250000', 'image_1682338049.jpg', 'Lunas', 'Done', '2023-04-24 11:48:07', '2023-04-24 12:07:29'),
(9, '3', 'Acca', 'Honda', 'Brio', '2020', 'DD 1 XX', '0812366554478', ', Bua Kana, Kota Makassar', '-5.1560446', '119.436985', 'Radiator Bocor. AC Mati', 'Service Luar', NULL, NULL, NULL, 'Belum', 'New', '2023-04-24 12:01:06', '2023-04-24 12:01:06'),
(10, '4', 'Musran', 'Honda', 'Brio', '2019', 'DP 1234 XX', '085123456879', 'Jalan A. P. Pettarani, Masale, Kota Makassar', '-5.1560967', '119.4371648', 'Mato mendadak', 'Service Luar', '1', '100000', 'image_1683104928.jpg', 'Lunas', 'Done', '2023-05-03 09:04:36', '2023-05-03 09:08:48'),
(11, NULL, 'qwet', 'Toyota', 'Avanza', '2015', 'DD 5656 HJ', '081456789', 'Jalan Ap Pettarani', NULL, NULL, 'Ganti oli KEmpes', 'Service Dalam', NULL, '500000', NULL, 'Lunas', 'Done', '2023-05-03 09:17:08', '2023-05-03 09:17:44');

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
(1, 'Dany Pomanto', '081234567890', 'qwerty123', '$2y$10$1367bowtXmf50T9yd8brZ.OXxU5AwwZesEDmyQPD1BI14O4ztwNSG', 'Teknisi', 'image_1682250725.jpg', 'Active', '2023-04-14 04:12:33', '2023-04-23 11:52:35');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
