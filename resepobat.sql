-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Okt 2017 pada 19.10
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resepobat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `resep_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id`, `resep_id`, `obat_id`, `harga`, `dosis`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '2121', '30000', '10000', '2017-10-17 08:51:35', '2017-10-17 09:57:09'),
(3, '1', '2', '2111', '1', '2412421', '2017-10-17 08:59:29', '2017-10-17 08:59:29'),
(4, '2', '2', '30000', '215125', '12521521', '2017-10-17 08:59:39', '2017-10-17 08:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kodedkt` int(10) UNSIGNED NOT NULL,
  `namadkt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatdkt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepondkt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`kodedkt`, `namadkt`, `spesialis`, `alamatdkt`, `telepondkt`, `poliklinik_id`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'Jurit Bajirr', 'Dokter Gigi', 'Cibiru', '08451111', '1', '12000', '2017-10-16 08:22:33', '2017-10-18 07:59:26'),
(4, 'Endang Koswara', 'Kandungan', 'Cibiru', '08416510', '2', '12000', '2017-10-18 07:59:10', '2017-10-18 07:59:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_13_230832_create_resepdokter_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kodeobat` int(10) UNSIGNED NOT NULL,
  `namaobat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisobat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaobat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahobat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kodeobat`, `namaobat`, `jenisobat`, `kategori`, `hargaobat`, `jumlahobat`, `created_at`, `updated_at`) VALUES
(1, 'Paramex', 'Obat Pusing', 'Paracetamol', '2000', '6', '2017-10-16 08:18:39', '2017-10-18 04:52:52'),
(2, 'OBH Combi', 'Sirup', 'Obat Batuk', '20000', '1', '2017-10-17 08:58:17', '2017-10-17 08:58:17'),
(3, 'Promagh', 'Sirup', 'Obat Batuk', '2000', '1', '2017-10-18 04:51:18', '2017-10-18 04:51:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `kodepsn` int(10) UNSIGNED NOT NULL,
  `namapsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatpsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genderpsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umurpsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teleponpsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`kodepsn`, `namapsn`, `alamatpsn`, `genderpsn`, `umurpsn`, `teleponpsn`, `created_at`, `updated_at`) VALUES
(1, 'Ateng Sunandar', 'Garut', 'Laki-Laki', '21', '08484448', '2017-10-16 08:17:02', '2017-10-18 05:11:58'),
(2, 'Mang Surya', 'Bandung', 'Perempuan', '21', '021591258', '2017-10-17 08:34:29', '2017-10-18 05:11:50'),
(4, 'Violy Len', 'Cilengkrang', 'Laki-Laki', '21', '0818494684', '2017-10-18 05:06:35', '2017-10-18 05:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `nomorbyr` int(10) UNSIGNED NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalbyr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahbyr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`nomorbyr`, `pasien_id`, `tanggalbyr`, `jumlahbyr`, `created_at`, `updated_at`) VALUES
(2, '4', '19 Februari 2017', '200000', '2017-10-18 05:23:10', '2017-10-18 05:23:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nomorpendf` int(10) UNSIGNED NOT NULL,
  `tanggalpendf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`nomorpendf`, `tanggalpendf`, `dokter_id`, `pasien_id`, `poliklinik_id`, `biaya`, `ket`, `created_at`, `updated_at`) VALUES
(2, '12 Agustus 2017', '1', '2', '2', '10000', 'Lunas', '2017-10-18 05:43:16', '2017-10-18 07:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `kodeplk` int(10) UNSIGNED NOT NULL,
  `namaplk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`kodeplk`, `namaplk`, `created_at`, `updated_at`) VALUES
(1, 'Al-Islam', '2017-10-16 08:19:26', '2017-10-18 06:39:12'),
(2, 'Farmasi', '2017-10-16 08:25:38', '2017-10-16 08:25:38'),
(3, 'Selamat', '2017-10-18 06:38:12', '2017-10-18 06:38:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `nomorresep` int(10) UNSIGNED NOT NULL,
  `tanggalresep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalharga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`nomorresep`, `tanggalresep`, `dokter_id`, `pasien_id`, `poliklinik_id`, `totalharga`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(2, '22 September', '1', '2', '1', '10000', '200000', '20000', '2017-10-17 08:58:42', '2017-10-17 08:58:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Dandy', 'dandyforze@gmail.com', '$2y$10$crN5QWwzPZK61bJctlxjy.yTVPzt6XbIl/9WkSLIAkgGkWZK0d3MO', 'admin', 'q8fOWFeUsIAOEMAGLX7g7fpk16sr8NNXSF3tcULr9vA9widCAjIZBFdWQrRr', '2017-10-18 09:30:16', '2017-10-18 09:30:16'),
(2, 'Moriarty', 'conico@gmail.com', '$2y$10$lDoIea6q7A/dfT0v.q.4AOvMOXtMoaC0.P6U.nE2YSXAdXy8hBmsa', 'dokter', 'fDK0sibZBXcgcLxMIzGfWSuJPifmFjyf6FIjUe62rFerXpCWGhtlLFbyY16U', '2017-10-18 09:32:19', '2017-10-18 09:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kodedkt`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kodeobat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kodepsn`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`nomorbyr`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nomorpendf`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`kodeplk`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`nomorresep`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `kodedkt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kodeobat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kodepsn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `nomorbyr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `nomorpendf` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `kodeplk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `nomorresep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
