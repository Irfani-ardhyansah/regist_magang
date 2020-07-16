-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2020 pada 04.33
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_register`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelompoks`
--

CREATE TABLE `data_kelompoks` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelompok_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` int(11) NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sosmed` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_anggota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_minat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keahlian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_kelompoks`
--

INSERT INTO `data_kelompoks` (`id`, `kelompok_id`, `nama`, `nim`, `no_hp`, `sosmed`, `jenis_kelamin`, `email_anggota`, `alamat`, `bidang_minat`, `keahlian`, `status`, `created_at`, `updated_at`) VALUES
(7, 6, 'Ayu Risqi', 123, '089739892738', 'ayu.risqi', 'Perempuan', 'ayurisqi@gmail.com', 'Madiun', 'Web Programing,UI / UX', 'UI/UX', 0, NULL, '2020-07-12 23:10:05'),
(9, 8, 'satu', 1, '01', 'satu.satoe', 'Laki-laki', 'satu@pertama.com', 'Madiun', 'Android Developer,Frontend,Database', 'UI / UX', 0, '2020-06-30 01:49:36', '2020-07-07 00:30:12'),
(10, 8, 'dua', 2, '02', 'due.doea', 'Perempuan', 'doe@dua.com', 'madiun', 'Android Developer,Web Programing,Database', 'Web Programing', 0, '2020-06-30 01:49:36', '2020-07-14 19:28:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kelompoks`
--
ALTER TABLE `data_kelompoks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_kelompoks_nim_unique` (`nim`),
  ADD UNIQUE KEY `data_kelompoks_email_unique` (`email_anggota`),
  ADD KEY `data_kelompoks_kelompok_id_foreign` (`kelompok_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kelompoks`
--
ALTER TABLE `data_kelompoks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kelompoks`
--
ALTER TABLE `data_kelompoks`
  ADD CONSTRAINT `data_kelompoks_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompoks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
