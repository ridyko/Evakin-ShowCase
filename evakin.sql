-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Bulan Mei 2026 pada 06.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evakin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_bulanan`
--

CREATE TABLE `evaluasi_bulanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pejabat_penilai_id` bigint(20) UNSIGNED NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `capaian_hasil_kerja` decimal(8,2) NOT NULL DEFAULT 0.00,
  `capaian_perilaku_kerja` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('draft','final') NOT NULL DEFAULT 'draft',
  `tanggal_evaluasi` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasi_bulanan`
--

INSERT INTO `evaluasi_bulanan` (`id`, `pegawai_id`, `pejabat_penilai_id`, `bulan`, `tahun`, `capaian_hasil_kerja`, `capaian_perilaku_kerja`, `status`, `tanggal_evaluasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2026, 100.00, 2.00, 'final', '2026-02-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(2, 1, 1, 2, 2026, 100.00, 2.00, 'final', '2026-03-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(3, 1, 1, 3, 2026, 100.00, 2.00, 'final', '2026-04-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(4, 1, 1, 4, 2026, 100.00, 2.00, 'final', '2026-05-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(5, 2, 1, 1, 2026, 100.00, 2.00, 'final', '2026-02-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(6, 2, 1, 2, 2026, 100.00, 2.00, 'final', '2026-03-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(7, 2, 1, 3, 2026, 100.00, 2.00, 'final', '2026-04-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(8, 2, 1, 4, 2026, 100.00, 2.00, 'final', '2026-05-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(9, 3, 1, 1, 2026, 100.00, 2.00, 'final', '2026-02-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(10, 3, 1, 2, 2026, 100.00, 2.00, 'final', '2026-03-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(11, 3, 1, 3, 2026, 100.00, 2.00, 'final', '2026-04-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(12, 3, 1, 4, 2026, 100.00, 2.00, 'final', '2026-05-03', '2026-05-03 02:18:53', '2026-05-03 02:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_hasil_kerja`
--

CREATE TABLE `evaluasi_hasil_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluasi_bulanan_id` bigint(20) UNSIGNED NOT NULL,
  `indikator_kinerja_id` bigint(20) UNSIGNED NOT NULL,
  `target_bulan` int(11) NOT NULL DEFAULT 1,
  `realisasi` decimal(8,2) NOT NULL DEFAULT 0.00,
  `capaian` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasi_hasil_kerja`
--

INSERT INTO `evaluasi_hasil_kerja` (`id`, `evaluasi_bulanan_id`, `indikator_kinerja_id`, `target_bulan`, `realisasi`, `capaian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(2, 1, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(3, 1, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(4, 1, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(5, 1, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(6, 2, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(7, 2, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(8, 2, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(9, 2, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(10, 2, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(11, 3, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(12, 3, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(13, 3, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(14, 3, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(15, 3, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(16, 4, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(17, 4, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(18, 4, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(19, 4, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(20, 4, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(21, 5, 11, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(22, 5, 12, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(23, 5, 13, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(24, 5, 14, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(25, 5, 15, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(26, 6, 11, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(27, 6, 12, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(28, 6, 13, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(29, 6, 14, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(30, 6, 15, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(31, 7, 11, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(32, 7, 12, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(33, 7, 13, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(34, 7, 14, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(35, 7, 15, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(36, 8, 11, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(37, 8, 12, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(38, 8, 13, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(39, 8, 14, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(40, 8, 15, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(41, 9, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(42, 9, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(43, 9, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(44, 9, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(45, 9, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(46, 10, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(47, 10, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(48, 10, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(49, 10, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(50, 10, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(51, 11, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(52, 11, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(53, 11, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(54, 11, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(55, 11, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(56, 12, 1, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(57, 12, 2, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(58, 12, 3, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(59, 12, 4, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(60, 12, 5, 1, 1.00, 100.00, '2026-05-03 02:18:53', '2026-05-03 02:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_perilaku`
--

CREATE TABLE `evaluasi_perilaku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluasi_bulanan_id` bigint(20) UNSIGNED NOT NULL,
  `aspek_perilaku` varchar(255) NOT NULL,
  `pengkategorian` enum('Dibawah Ekspektasi','Sesuai Ekspektasi','Diatas Ekspektasi') NOT NULL DEFAULT 'Sesuai Ekspektasi',
  `nilai` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasi_perilaku`
--

INSERT INTO `evaluasi_perilaku` (`id`, `evaluasi_bulanan_id`, `aspek_perilaku`, `pengkategorian`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(2, 1, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(3, 1, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(4, 1, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(5, 1, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(6, 1, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(7, 1, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(8, 2, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(9, 2, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(10, 2, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(11, 2, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(12, 2, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(13, 2, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(14, 2, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(15, 3, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(16, 3, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(17, 3, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(18, 3, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(19, 3, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(20, 3, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(21, 3, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(22, 4, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(23, 4, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(24, 4, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(25, 4, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(26, 4, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(27, 4, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(28, 4, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(29, 5, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(30, 5, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(31, 5, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(32, 5, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(33, 5, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(34, 5, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(35, 5, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(36, 6, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(37, 6, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(38, 6, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(39, 6, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(40, 6, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(41, 6, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(42, 6, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(43, 7, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(44, 7, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(45, 7, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(46, 7, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(47, 7, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(48, 7, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(49, 7, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(50, 8, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(51, 8, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(52, 8, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(53, 8, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(54, 8, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(55, 8, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(56, 8, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(57, 9, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(58, 9, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(59, 9, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(60, 9, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(61, 9, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(62, 9, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(63, 9, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(64, 10, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(65, 10, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(66, 10, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(67, 10, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(68, 10, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(69, 10, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(70, 10, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(71, 11, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(72, 11, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(73, 11, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(74, 11, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(75, 11, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(76, 11, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(77, 11, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(78, 12, 'Berorientasi Pelayanan', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(79, 12, 'Akuntabel', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(80, 12, 'Kompeten', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(81, 12, 'Harmonis', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(82, 12, 'Loyal', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(83, 12, 'Adaptif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(84, 12, 'Kolaboratif', 'Sesuai Ekspektasi', 2, '2026-05-03 02:18:53', '2026-05-03 02:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_kinerja`
--

CREATE TABLE `indikator_kinerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `target_tahunan` varchar(255) NOT NULL DEFAULT '12 Rekapitulasi',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `indikator_kinerja`
--

INSERT INTO `indikator_kinerja` (`id`, `jabatan_id`, `nomor_urut`, `deskripsi`, `target_tahunan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Jumlah rekapitulasi pelaksanaan tugas administrasi pada satuan pendidikan meliputi urusan kepegawaian, kesiswaan, guru, kurikulum, prasarana dan sarana, aset dan keuangan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(2, 1, 2, 'Jumlah rekapitulasi pengolahan dan pemuktahiran dan penyajian data satuan pendidikan yang disusun secara manual maupun melalui sistem informasi yang berlaku pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(3, 1, 3, 'Jumlah rekapitulasi perbantuan pelaksanaan kegiatan yang diselenggarakan satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(4, 1, 4, 'Jumlah rekapitulasi persuratan meliputi konsep, penomoran, stempel, pendistribusian, penggandaan, legalisasi dan pengarsipan dokumen satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(5, 1, 5, 'Jumlah rekapitulasi pelayanan masyarakat dan peserta didik yang membutuhkan layanan administrasi pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(6, 2, 1, 'Jumlah rekapitulasi penyiapan dan pengelolaan bahan serta alat praktik laboratorium pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(7, 2, 2, 'Jumlah rekapitulasi perawatan dan pemeliharaan alat-alat laboratorium pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(8, 2, 3, 'Jumlah rekapitulasi perbantuan pelaksanaan kegiatan praktikum peserta didik pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(9, 2, 4, 'Jumlah rekapitulasi inventarisasi bahan and alat laboratorium pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(10, 2, 5, 'Jumlah rekapitulasi penerapan keselamatan dan kesehatan kerja (K3) di laboratorium pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(11, 3, 1, 'Jumlah rekapitulasi pengelolaan koleksi bahan pustaka perpustakaan pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(12, 3, 2, 'Jumlah rekapitulasi pelayanan sirkulasi dan referensi perpustakaan pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(13, 3, 3, 'Jumlah rekapitulasi perawatan dan pemeliharaan bahan pustaka perpustakaan pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(14, 3, 4, 'Jumlah rekapitulasi promosi dan pembinaan minat baca peserta didik pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(15, 3, 5, 'Jumlah rekapitulasi inventarisasi dan katalogisasi bahan pustaka perpustakaan pada satuan pendidikan', '12 Rekapitulasi', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `deskripsi`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Operator Layanan Operasional - Tenaga Administrasi', 'Tenaga administrasi pada satuan pendidikan', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(2, 'Operator Layanan Operasional - Tenaga Kependidikan - Laboran', 'Tenaga laboran pada satuan pendidikan', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(3, 'Operator Layanan Operasional - Pustakawan', 'Tenaga pustakawan pada satuan pendidikan', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_jabatan_table', 1),
(5, '2024_01_01_000002_create_pegawai_table', 1),
(6, '2024_01_01_000003_create_pejabat_penilai_table', 1),
(7, '2024_01_01_000004_create_indikator_kinerja_table', 1),
(8, '2024_01_01_000005_create_evaluasi_bulanan_table', 1),
(9, '2024_01_01_000006_create_evaluasi_hasil_kerja_table', 1),
(10, '2024_01_01_000007_create_evaluasi_perilaku_table', 1),
(11, '2024_01_01_000008_add_role_to_users_table', 1),
(12, '2026_05_02_002904_create_settings_table', 1),
(13, '2026_05_02_012637_add_telepon_to_pegawai_table', 1),
(14, '2026_05_02_015036_create_wa_logs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ni_pppk` varchar(255) NOT NULL,
  `pangkat_gol` varchar(255) DEFAULT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `ni_pppk`, `pangkat_gol`, `jabatan_id`, `unit_kerja`, `telepon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Naruto Uzumaki', '199001012024211001', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(2, 'Sasuke Uchiha', '199202022024212002', 'IX', 3, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(3, 'Sakura Haruno', '198503032024211003', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(4, 'Shikamaru Nara', '199504042024212004', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(5, 'Hinata Hyuga', '198805052024211005', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(6, 'Rock Lee', '199306062024212006', 'IX', 2, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(7, 'Neji Hyuga', '199107072024211007', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(8, 'Tenten', '199108082024212008', 'IX', 3, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(9, 'Ino Yamanaka', '199209092024212009', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(10, 'Choji Akimichi', '199010102024211010', 'IX', 1, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(11, 'Kiba Inuzuka', '199311112024211011', 'IX', 2, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(12, 'Shino Aburame', '199412122024211012', 'IX', 3, 'Pemerintah Daerah Konoha', NULL, 1, '2026-05-03 02:18:52', '2026-05-03 02:18:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_penilai`
--

CREATE TABLE `pejabat_penilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `pangkat_gol` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pejabat_penilai`
--

INSERT INTO `pejabat_penilai` (`id`, `nama`, `nip`, `pangkat_gol`, `jabatan`, `unit_kerja`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Drs. Kakashi Hatake, M.Si', '197501012000011001', 'Pembina (IV/A)', 'Kepala Sub Bagian Tata Usaha', 'Pemerintah Daerah Konoha', 1, '2026-05-03 02:18:50', '2026-05-03 02:18:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0daon20aOtkhFudPrgKBxqPB2fGS39S6UjBjMIqf', NULL, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJpNE95OGdDWHdsa1J4dHNqd0k1Qm5SRnBwM09QRWVON1F1aHlvbjF5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvZXZha2luXC9wdWJsaWNcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1777866434),
('Cjpwy8x7HOqaYVnNUIulmyXLoWDVT5nFG0G4w52c', 13, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI3QjYyNEZwaXk3WTRKQWZBWGlWbEFsTW1YeUhCZU5SeHlRMkN0SldsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvZXZha2luXC9wdWJsaWNcL2V2YWx1YXNpP2J1bGFuPSZwZWdhd2FpX2lkPTEmdGFodW49Iiwicm91dGUiOiJldmFsdWFzaS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxM30=', 1777802182),
('sKmWJ2hvqdMeCNWbeFfz78LO8rtncXtjjtgl1BTe', NULL, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJVanlpYVZNcEVZRTZyZFBmSXlHZmlBUWxnOE1Xc2xxV1lJR2hhb2JYIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9ldmFraW5cL3B1YmxpY1wvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn19', 1777804605);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'E-Kinerja Pemerintah Daerah Konoha', '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(2, 'organization_name', 'Pemerintah Daerah Konoha', '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(3, 'organization_slogan', 'Sistem Evaluasi Kinerja Pegawai', '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(4, 'app_logo', 'assets/img/logo_konoha.png', '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(5, 'organization_footer', '© 2024 E-Kinerja Pemerintah Daerah Konoha. All rights reserved.', '2026-05-03 02:18:50', '2026-05-03 02:18:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','penilai','pegawai') NOT NULL DEFAULT 'pegawai',
  `pegawai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pejabat_penilai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `pegawai_id`, `pejabat_penilai_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Naruto Uzumaki', 'naruto@konoha.test', 'pegawai', 1, NULL, NULL, '$2y$12$wNdAbovim/ho7crznv1DruYmY9.dci6Z2XhSlNCJGvjGY1zLLoFAe', NULL, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(2, 'Sasuke Uchiha', 'sasuke@konoha.test', 'pegawai', 2, NULL, NULL, '$2y$12$8gdBJf6PxiCulaIJPFfa7uMai/Un./sAv9ciSjCAk66dntIkeHtkG', NULL, '2026-05-03 02:18:50', '2026-05-03 02:18:50'),
(3, 'Sakura Haruno', 'sakura@konoha.test', 'pegawai', 3, NULL, NULL, '$2y$12$POQFVFYHczM9ajNhzXvcoeHj7X8UCHULsJt2TiiPz5lpMRUYvGBnS', NULL, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(4, 'Shikamaru Nara', 'shikamaru@konoha.test', 'pegawai', 4, NULL, NULL, '$2y$12$0UAbFoRsjevKELOE0AHEA.TT1WCu/h6jnvXQXnw/12nsKgKX7g0Se', NULL, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(5, 'Hinata Hyuga', 'hinata@konoha.test', 'pegawai', 5, NULL, NULL, '$2y$12$ortWwAiKE/Gxev0DIkgQa.GSIxykdYh1hOdsAd/PUkRLA02DztVHm', NULL, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(6, 'Rock Lee', 'lee@konoha.test', 'pegawai', 6, NULL, NULL, '$2y$12$1gCEzaYH7NjwTTlwuIi1d.5D9ytKZO3seY6DcBrp/Ocwh.WFVw2ve', NULL, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(7, 'Neji Hyuga', 'neji@konoha.test', 'pegawai', 7, NULL, NULL, '$2y$12$aIO5cS43QV8EpOEg6eMC4emH59xzZahI/dG4q7YYf.ssFLlF9nbiK', NULL, '2026-05-03 02:18:51', '2026-05-03 02:18:51'),
(8, 'Tenten', 'tenten@konoha.test', 'pegawai', 8, NULL, NULL, '$2y$12$jQk.OhsAETv0TptVAivaFuRqpuD2NTO/ETNMc8ONFiw7QeuSix6bu', NULL, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(9, 'Ino Yamanaka', 'ino@konoha.test', 'pegawai', 9, NULL, NULL, '$2y$12$3vZuEQZfveq9PtFlZUrfAOgitim540mBRzSNfn.P6Zy0vn5IMKuJC', NULL, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(10, 'Choji Akimichi', 'choji@konoha.test', 'pegawai', 10, NULL, NULL, '$2y$12$.mRBp2wkenQrOxCtahR5KOdirxD1E9k8VSBynmerbQJPtrXR8eN1K', NULL, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(11, 'Kiba Inuzuka', 'kiba@konoha.test', 'pegawai', 11, NULL, NULL, '$2y$12$s/NMvRorzA0974NEZwu0s.2Vnz5U0oh9E.hdkBWNjsYoieh4kXsaa', NULL, '2026-05-03 02:18:52', '2026-05-03 02:18:52'),
(12, 'Shino Aburame', 'shino@konoha.test', 'pegawai', 12, NULL, NULL, '$2y$12$6SSOuIaz6cxXdji6DSzqN.roiPv1.rwr8Cd/Y6FgK8xOtnoQT2oaq', NULL, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(13, 'Administrator Konoha', 'admin@konoha.test', 'admin', NULL, NULL, NULL, '$2y$12$ymXo7hYDLK3EIem6eB4d5.z9ZN7T5Ga0jGYtE8v6h64k9ZQtjZqfO', NULL, '2026-05-03 02:18:53', '2026-05-03 02:18:53'),
(14, 'Drs. Kakashi Hatake, M.Si', 'pejabat@konoha.test', 'penilai', NULL, 1, NULL, '$2y$12$MZFOifn6Pf45jyQQO6c9Ke3XlJZMq2K9Cy2oM.wuB5/z8ZAyokPgC', NULL, '2026-05-03 02:18:53', '2026-05-03 02:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wa_logs`
--

CREATE TABLE `wa_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluasi_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_tujuan` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('pending','sent','failed') NOT NULL DEFAULT 'pending',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `evaluasi_bulanan`
--
ALTER TABLE `evaluasi_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `evaluasi_bulanan_pegawai_id_bulan_tahun_unique` (`pegawai_id`,`bulan`,`tahun`),
  ADD KEY `evaluasi_bulanan_pejabat_penilai_id_foreign` (`pejabat_penilai_id`);

--
-- Indeks untuk tabel `evaluasi_hasil_kerja`
--
ALTER TABLE `evaluasi_hasil_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasi_hasil_kerja_evaluasi_bulanan_id_foreign` (`evaluasi_bulanan_id`),
  ADD KEY `evaluasi_hasil_kerja_indikator_kinerja_id_foreign` (`indikator_kinerja_id`);

--
-- Indeks untuk tabel `evaluasi_perilaku`
--
ALTER TABLE `evaluasi_perilaku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasi_perilaku_evaluasi_bulanan_id_foreign` (`evaluasi_bulanan_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `indikator_kinerja`
--
ALTER TABLE `indikator_kinerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikator_kinerja_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_ni_pppk_unique` (`ni_pppk`),
  ADD KEY `pegawai_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `pejabat_penilai`
--
ALTER TABLE `pejabat_penilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pejabat_penilai_nip_unique` (`nip`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `users_pejabat_penilai_id_foreign` (`pejabat_penilai_id`);

--
-- Indeks untuk tabel `wa_logs`
--
ALTER TABLE `wa_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wa_logs_evaluasi_id_foreign` (`evaluasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi_bulanan`
--
ALTER TABLE `evaluasi_bulanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_hasil_kerja`
--
ALTER TABLE `evaluasi_hasil_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_perilaku`
--
ALTER TABLE `evaluasi_perilaku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indikator_kinerja`
--
ALTER TABLE `indikator_kinerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pejabat_penilai`
--
ALTER TABLE `pejabat_penilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wa_logs`
--
ALTER TABLE `wa_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `evaluasi_bulanan`
--
ALTER TABLE `evaluasi_bulanan`
  ADD CONSTRAINT `evaluasi_bulanan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluasi_bulanan_pejabat_penilai_id_foreign` FOREIGN KEY (`pejabat_penilai_id`) REFERENCES `pejabat_penilai` (`id`);

--
-- Ketidakleluasaan untuk tabel `evaluasi_hasil_kerja`
--
ALTER TABLE `evaluasi_hasil_kerja`
  ADD CONSTRAINT `evaluasi_hasil_kerja_evaluasi_bulanan_id_foreign` FOREIGN KEY (`evaluasi_bulanan_id`) REFERENCES `evaluasi_bulanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluasi_hasil_kerja_indikator_kinerja_id_foreign` FOREIGN KEY (`indikator_kinerja_id`) REFERENCES `indikator_kinerja` (`id`);

--
-- Ketidakleluasaan untuk tabel `evaluasi_perilaku`
--
ALTER TABLE `evaluasi_perilaku`
  ADD CONSTRAINT `evaluasi_perilaku_evaluasi_bulanan_id_foreign` FOREIGN KEY (`evaluasi_bulanan_id`) REFERENCES `evaluasi_bulanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indikator_kinerja`
--
ALTER TABLE `indikator_kinerja`
  ADD CONSTRAINT `indikator_kinerja_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_pejabat_penilai_id_foreign` FOREIGN KEY (`pejabat_penilai_id`) REFERENCES `pejabat_penilai` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `wa_logs`
--
ALTER TABLE `wa_logs`
  ADD CONSTRAINT `wa_logs_evaluasi_id_foreign` FOREIGN KEY (`evaluasi_id`) REFERENCES `evaluasi_bulanan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
