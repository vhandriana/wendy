-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2019 pada 06.44
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zyacbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_konfigurasi`
--

CREATE TABLE `cbt_konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `konfigurasi_kode` varchar(50) NOT NULL,
  `konfigurasi_isi` varchar(50) NOT NULL,
  `konfigurasi_keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cbt_konfigurasi`
--

INSERT INTO `cbt_konfigurasi` (`konfigurasi_id`, `konfigurasi_kode`, `konfigurasi_isi`, `konfigurasi_keterangan`) VALUES
(1, 'link_login_operator', 'ya', 'Menampilkan Link Login Operator'),
(2, 'cbt_nama', 'PT Daese Garmin', 'Nama Penyelenggara ZYACBT'),
(3, 'cbt_keterangan', 'Ujian Online Berbasis Komputer', 'Keterangan Penyelenggara ZYACBT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_modul`
--

CREATE TABLE `cbt_modul` (
  `modul_id` bigint(20) UNSIGNED NOT NULL,
  `modul_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modul_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_modul`
--

INSERT INTO `cbt_modul` (`modul_id`, `modul_nama`, `modul_aktif`) VALUES
(9, 'Soal', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `soal_topik_id` bigint(20) UNSIGNED NOT NULL,
  `soal_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `soal_tipe` smallint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Pilihan ganda, 2=essay, 3=jawaban singkat',
  `soal_kunci` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Kunci untuk soal jawaban singkat',
  `soal_difficulty` smallint(6) NOT NULL DEFAULT 1,
  `soal_aktif` tinyint(1) NOT NULL DEFAULT 0,
  `soal_audio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soal_audio_play` int(11) NOT NULL DEFAULT 0,
  `soal_timer` smallint(10) DEFAULT NULL,
  `soal_inline_answers` tinyint(1) NOT NULL DEFAULT 0,
  `soal_auto_next` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_soal`
--

INSERT INTO `cbt_soal` (`soal_id`, `soal_topik_id`, `soal_detail`, `soal_tipe`, `soal_kunci`, `soal_difficulty`, `soal_aktif`, `soal_audio`, `soal_audio_play`, `soal_timer`, `soal_inline_answers`, `soal_auto_next`) VALUES
(53, 7, 'Apakah kepanjangan dari SMK ?', 1, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(54, 7, '<p>Nama salah satu Mall yang ada di kota genteng adalah ...<br></p>', 1, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(55, 7, '<p>Siapakah nama tokoh berikut ?</p><p><img src=\"[base_url]uploads/topik_7/soekarno.jpg\" style=\"max-width: 600px;\"><br></p>', 1, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(56, 7, '<p>Siapakah vokalis band NOAH ?<br></p>', 1, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(57, 7, '<p>Tanggal berapakah hari raya Idul Fitri ?</p>\r\n', 1, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(61, 7, 'Jelaskan apa yang dimaksud dengan Jomblo ?', 2, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(62, 7, '<p>PT. Tiar Perkasa ingin melebarkan sayap usaha di bidang kuliner.</p><p>Dari pernyataan tersebut, sebutkan siapa kekasih mas Tiar ?</p>', 2, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(63, 7, '<p>Jelaskan kenapa Liverpool FC susah sekali untuk juara Premiere Leage !</p>\r\n', 2, NULL, 1, 1, NULL, 1, NULL, 0, 0),
(64, 7, '<p>Apakah judul lagu berikut ini?</p>', 1, NULL, 1, 1, 'naff_-_akhirnya_ku_menemukanmu.mp3', 1, NULL, 0, 0),
(161, 7, '<p>Jelaskan arti poster dibawah ini ?</p>\r\n\r\n<p><img src=\"[base_url]uploads/topik_7/5a49b252e7aea.jpeg\" style=\"height:283px; width:300px\" /></p>\r\n', 1, NULL, 1, 1, NULL, 0, NULL, 0, 0),
(214, 7, '<p>Berapakah 5x10 ?</p>\r\n', 3, '50', 1, 1, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes`
--

CREATE TABLE `cbt_tes` (
  `tes_id` bigint(20) UNSIGNED NOT NULL,
  `tes_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tes_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `tes_begin_time` datetime DEFAULT NULL,
  `tes_end_time` datetime DEFAULT NULL,
  `tes_duration_time` smallint(10) UNSIGNED NOT NULL DEFAULT 0,
  `tes_ip_range` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '*.*.*.*',
  `tes_results_to_users` tinyint(1) NOT NULL DEFAULT 0,
  `tes_detail_to_users` tinyint(1) NOT NULL DEFAULT 0,
  `tes_score_right` decimal(10,2) DEFAULT 1.00,
  `tes_score_wrong` decimal(10,2) DEFAULT 0.00,
  `tes_score_unanswered` decimal(10,2) DEFAULT 0.00,
  `tes_max_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tes_token` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tes`
--

INSERT INTO `cbt_tes` (`tes_id`, `tes_nama`, `tes_detail`, `tes_begin_time`, `tes_end_time`, `tes_duration_time`, `tes_ip_range`, `tes_results_to_users`, `tes_detail_to_users`, `tes_score_right`, `tes_score_wrong`, `tes_score_unanswered`, `tes_max_score`, `tes_token`) VALUES
(6, 'Tes kepribadian anda', 'Jwab pertanyaan ini dengan benar', '2019-09-10 16:23:00', '2019-09-11 16:23:00', 30, '*.*.*.*', 1, 1, '1.00', '0.00', '0.00', '10.00', 0),
(7, 'Tes Skill', 'Skill Anda', '2019-09-10 16:47:00', '2019-09-11 16:47:00', 30, '*.*.*.*', 1, 1, '1.00', '0.50', '0.00', '10.00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tesgrup`
--

CREATE TABLE `cbt_tesgrup` (
  `tstgrp_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tstgrp_grup_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tesgrup`
--

INSERT INTO `cbt_tesgrup` (`tstgrp_tes_id`, `tstgrp_grup_id`) VALUES
(6, 5),
(7, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_soal`
--

CREATE TABLE `cbt_tes_soal` (
  `tessoal_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_tesuser_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_user_ip` varchar(39) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tessoal_soal_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_jawaban_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tessoal_nilai` decimal(10,2) DEFAULT NULL,
  `tessoal_creation_time` datetime DEFAULT NULL,
  `tessoal_display_time` datetime DEFAULT NULL,
  `tessoal_change_time` datetime DEFAULT NULL,
  `tessoal_reaction_time` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `tessoal_ragu` int(1) NOT NULL DEFAULT 0 COMMENT '1=ragu, 0=tidak ragu',
  `tessoal_order` smallint(6) NOT NULL DEFAULT 1,
  `tessoal_num_answers` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `tessoal_comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tessoal_audio_play` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tes_soal`
--

INSERT INTO `cbt_tes_soal` (`tessoal_id`, `tessoal_tesuser_id`, `tessoal_user_ip`, `tessoal_soal_id`, `tessoal_jawaban_text`, `tessoal_nilai`, `tessoal_creation_time`, `tessoal_display_time`, `tessoal_change_time`, `tessoal_reaction_time`, `tessoal_ragu`, `tessoal_order`, `tessoal_num_answers`, `tessoal_comment`, `tessoal_audio_play`) VALUES
(21, 3, NULL, 57, NULL, '1.00', '2019-09-10 16:39:52', '2019-09-10 16:39:53', '2019-09-10 16:40:00', 0, 0, 1, 0, NULL, 0),
(22, 3, NULL, 63, 'bagus', '1.00', '2019-09-10 16:39:52', '2019-09-10 16:40:06', '2019-09-10 16:40:13', 0, 0, 2, 0, 'Sudah di koreksi admin', 0),
(23, 3, NULL, 54, NULL, '0.00', '2019-09-10 16:39:52', '2019-09-10 16:40:19', '2019-09-10 16:40:23', 0, 0, 3, 0, NULL, 0),
(24, 3, NULL, 53, NULL, '1.00', '2019-09-10 16:39:52', '2019-09-10 16:40:34', '2019-09-10 16:40:38', 0, 0, 4, 0, NULL, 0),
(25, 3, NULL, 55, NULL, '1.00', '2019-09-10 16:39:52', '2019-09-10 16:40:40', '2019-09-10 16:40:44', 0, 0, 5, 0, NULL, 0),
(26, 3, NULL, 61, 'aduh', '1.00', '2019-09-10 16:39:52', '2019-09-10 16:40:45', '2019-09-10 16:40:53', 0, 0, 6, 0, 'Sudah di koreksi admin', 0),
(27, 3, NULL, 56, NULL, '1.00', '2019-09-10 16:39:52', '2019-09-10 16:40:54', '2019-09-10 16:40:59', 0, 0, 7, 0, NULL, 0),
(28, 3, NULL, 62, 'duka atuh', '1.00', '2019-09-10 16:39:52', '2019-09-10 16:41:00', '2019-09-10 16:41:07', 0, 0, 8, 0, 'Sudah di koreksi admin', 0),
(29, 3, NULL, 161, NULL, '0.00', '2019-09-10 16:39:52', '2019-09-10 16:41:08', '2019-09-10 16:41:11', 0, 0, 9, 0, NULL, 0),
(30, 3, NULL, 214, '50', '1.00', '2019-09-10 16:39:52', '2019-09-10 16:41:16', '2019-09-10 16:41:22', 0, 0, 10, 0, NULL, 0),
(31, 4, NULL, 55, NULL, '1.00', '2019-09-10 16:42:57', '2019-09-10 16:42:58', '2019-09-10 16:43:02', 0, 0, 1, 0, NULL, 0),
(32, 4, NULL, 63, 'hmmmm', '0.00', '2019-09-10 16:42:57', '2019-09-10 16:43:11', '2019-09-10 16:43:16', 0, 0, 2, 0, 'Sudah di koreksi admin', 0),
(33, 4, NULL, 54, NULL, '1.00', '2019-09-10 16:42:57', '2019-09-10 16:43:18', '2019-09-10 16:43:20', 0, 0, 3, 0, NULL, 0),
(34, 4, NULL, 56, NULL, '0.00', '2019-09-10 16:42:57', '2019-09-10 16:43:21', '2019-09-10 16:43:23', 0, 0, 4, 0, NULL, 0),
(35, 4, NULL, 161, NULL, '0.00', '2019-09-10 16:42:57', '2019-09-10 16:43:24', '2019-09-10 16:43:26', 0, 0, 5, 0, NULL, 0),
(36, 4, NULL, 57, NULL, '1.00', '2019-09-10 16:42:57', '2019-09-10 16:43:28', '2019-09-10 16:43:30', 0, 0, 6, 0, NULL, 0),
(37, 4, NULL, 64, NULL, '1.00', '2019-09-10 16:42:57', '2019-09-10 16:43:30', '2019-09-10 16:43:32', 0, 0, 7, 0, NULL, 0),
(38, 4, NULL, 214, '50', '1.00', '2019-09-10 16:42:57', '2019-09-10 16:43:33', '2019-09-10 16:43:37', 0, 0, 8, 0, NULL, 0),
(39, 4, NULL, 62, 'ij', '0.00', '2019-09-10 16:42:57', '2019-09-10 16:43:38', '2019-09-10 16:43:40', 0, 0, 9, 0, 'Sudah di koreksi admin', 0),
(40, 4, NULL, 61, 'ukjl', '1.00', '2019-09-10 16:42:57', '2019-09-10 16:43:42', '2019-09-10 16:43:45', 0, 0, 10, 0, 'Sudah di koreksi admin', 0),
(41, 5, NULL, 55, NULL, '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:21', '2019-09-10 16:48:24', 0, 0, 1, 0, NULL, 0),
(42, 5, NULL, 214, '50', '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:25', '2019-09-10 16:48:29', 0, 0, 2, 0, NULL, 0),
(43, 5, NULL, 54, NULL, '0.50', '2019-09-10 16:48:21', '2019-09-10 16:48:33', '2019-09-10 16:48:36', 0, 0, 3, 0, NULL, 0),
(44, 5, NULL, 56, NULL, '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:37', '2019-09-10 16:48:40', 0, 0, 4, 0, NULL, 0),
(45, 5, NULL, 63, 'awe', '0.50', '2019-09-10 16:48:21', '2019-09-10 16:48:41', '2019-09-10 16:48:44', 0, 0, 5, 0, 'Sudah di koreksi admin', 0),
(46, 5, NULL, 61, 'wrw', '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:45', '2019-09-10 16:48:47', 0, 0, 6, 0, 'Sudah di koreksi admin', 0),
(47, 5, NULL, 62, 'wrewe', '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:48', '2019-09-10 16:48:51', 0, 0, 7, 0, 'Sudah di koreksi admin', 0),
(48, 5, NULL, 64, NULL, '0.50', '2019-09-10 16:48:21', '2019-09-10 16:48:52', '2019-09-10 16:48:54', 0, 0, 8, 0, NULL, 0),
(49, 5, NULL, 161, NULL, '1.00', '2019-09-10 16:48:21', '2019-09-10 16:48:55', '2019-09-10 16:48:59', 0, 0, 9, 0, NULL, 0),
(50, 5, NULL, 53, NULL, '0.50', '2019-09-10 16:48:21', '2019-09-10 16:49:00', '2019-09-10 16:49:03', 0, 0, 10, 0, NULL, 0),
(51, 6, NULL, 53, NULL, '1.00', '2019-09-10 16:50:10', '2019-09-10 16:50:10', '2019-09-10 16:50:15', 0, 0, 1, 0, NULL, 0),
(52, 6, NULL, 62, 'rs', '1.00', '2019-09-10 16:50:10', '2019-09-10 16:50:15', '2019-09-10 16:50:18', 0, 0, 2, 0, 'Sudah di koreksi admin', 0),
(53, 6, NULL, 214, '50', '1.00', '2019-09-10 16:50:10', '2019-09-10 16:50:19', '2019-09-10 16:50:22', 0, 0, 3, 0, NULL, 0),
(54, 6, NULL, 61, 'dfg', '0.50', '2019-09-10 16:50:10', '2019-09-10 16:50:24', '2019-09-10 16:50:26', 0, 0, 4, 0, 'Sudah di koreksi admin', 0),
(55, 6, NULL, 161, NULL, '1.00', '2019-09-10 16:50:10', '2019-09-10 16:50:27', '2019-09-10 16:50:30', 0, 0, 5, 0, NULL, 0),
(56, 6, NULL, 56, NULL, '0.50', '2019-09-10 16:50:10', '2019-09-10 16:50:32', '2019-09-10 16:50:33', 0, 0, 6, 0, NULL, 0),
(57, 6, NULL, 63, 'sfdr', '0.50', '2019-09-10 16:50:10', '2019-09-10 16:50:34', '2019-09-10 16:50:36', 0, 0, 7, 0, 'Sudah di koreksi admin', 0),
(58, 6, NULL, 55, NULL, '0.50', '2019-09-10 16:50:10', '2019-09-10 16:50:37', '2019-09-10 16:50:39', 0, 0, 8, 0, NULL, 0),
(59, 6, NULL, 54, NULL, '1.00', '2019-09-10 16:50:10', '2019-09-10 16:50:40', '2019-09-10 16:50:42', 0, 0, 9, 0, NULL, 0),
(60, 6, NULL, 64, NULL, '0.50', '2019-09-10 16:50:10', '2019-09-10 16:50:43', '2019-09-10 16:50:45', 0, 0, 10, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_soal_jawaban`
--

CREATE TABLE `cbt_tes_soal_jawaban` (
  `soaljawaban_tessoal_id` bigint(20) UNSIGNED NOT NULL,
  `soaljawaban_jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `soaljawaban_selected` smallint(6) NOT NULL DEFAULT -1,
  `soaljawaban_order` smallint(6) NOT NULL DEFAULT 1,
  `soaljawaban_position` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tes_soal_jawaban`
--

INSERT INTO `cbt_tes_soal_jawaban` (`soaljawaban_tessoal_id`, `soaljawaban_jawaban_id`, `soaljawaban_selected`, `soaljawaban_order`, `soaljawaban_position`) VALUES
(21, 186, 1, 4, NULL),
(21, 187, 0, 5, NULL),
(21, 188, 0, 3, NULL),
(21, 189, 0, 2, NULL),
(21, 190, 0, 1, NULL),
(23, 201, 0, 3, NULL),
(23, 202, 1, 2, NULL),
(23, 203, 0, 4, NULL),
(23, 204, 0, 1, NULL),
(23, 205, 0, 5, NULL),
(24, 206, 1, 4, NULL),
(24, 207, 0, 1, NULL),
(24, 208, 0, 2, NULL),
(24, 209, 0, 5, NULL),
(24, 210, 0, 3, NULL),
(25, 196, 1, 4, NULL),
(25, 197, 0, 2, NULL),
(25, 198, 0, 3, NULL),
(25, 199, 0, 5, NULL),
(25, 200, 0, 1, NULL),
(27, 191, 1, 3, NULL),
(27, 192, 0, 2, NULL),
(27, 193, 0, 4, NULL),
(27, 194, 0, 5, NULL),
(27, 195, 0, 1, NULL),
(29, 621, 0, 3, NULL),
(29, 622, 1, 2, NULL),
(29, 623, 0, 1, NULL),
(29, 624, 0, 5, NULL),
(29, 625, 0, 4, NULL),
(31, 196, 1, 2, NULL),
(31, 197, 0, 3, NULL),
(31, 198, 0, 4, NULL),
(31, 199, 0, 5, NULL),
(31, 200, 0, 1, NULL),
(33, 201, 1, 4, NULL),
(33, 202, 0, 2, NULL),
(33, 203, 0, 3, NULL),
(33, 204, 0, 1, NULL),
(33, 205, 0, 5, NULL),
(34, 191, 0, 2, NULL),
(34, 192, 0, 3, NULL),
(34, 193, 1, 5, NULL),
(34, 194, 0, 4, NULL),
(34, 195, 0, 1, NULL),
(35, 621, 0, 1, NULL),
(35, 622, 0, 3, NULL),
(35, 623, 1, 2, NULL),
(35, 624, 0, 5, NULL),
(35, 625, 0, 4, NULL),
(36, 186, 1, 4, NULL),
(36, 187, 0, 2, NULL),
(36, 188, 0, 3, NULL),
(36, 189, 0, 5, NULL),
(36, 190, 0, 1, NULL),
(37, 211, 1, 4, NULL),
(37, 212, 0, 5, NULL),
(37, 213, 0, 3, NULL),
(37, 214, 0, 2, NULL),
(37, 215, 0, 1, NULL),
(41, 196, 1, 4, NULL),
(41, 197, 0, 1, NULL),
(41, 198, 0, 3, NULL),
(41, 199, 0, 2, NULL),
(41, 200, 0, 5, NULL),
(43, 201, 0, 3, NULL),
(43, 202, 0, 5, NULL),
(43, 203, 1, 1, NULL),
(43, 204, 0, 4, NULL),
(43, 205, 0, 2, NULL),
(44, 191, 1, 2, NULL),
(44, 192, 0, 3, NULL),
(44, 193, 0, 4, NULL),
(44, 194, 0, 5, NULL),
(44, 195, 0, 1, NULL),
(48, 211, 0, 5, NULL),
(48, 212, 1, 2, NULL),
(48, 213, 0, 4, NULL),
(48, 214, 0, 3, NULL),
(48, 215, 0, 1, NULL),
(49, 621, 1, 5, NULL),
(49, 622, 0, 4, NULL),
(49, 623, 0, 2, NULL),
(49, 624, 0, 3, NULL),
(49, 625, 0, 1, NULL),
(50, 206, 0, 1, NULL),
(50, 207, 1, 4, NULL),
(50, 208, 0, 3, NULL),
(50, 209, 0, 5, NULL),
(50, 210, 0, 2, NULL),
(51, 206, 1, 4, NULL),
(51, 207, 0, 1, NULL),
(51, 208, 0, 3, NULL),
(51, 209, 0, 5, NULL),
(51, 210, 0, 2, NULL),
(55, 621, 1, 5, NULL),
(55, 622, 0, 3, NULL),
(55, 623, 0, 1, NULL),
(55, 624, 0, 2, NULL),
(55, 625, 0, 4, NULL),
(56, 191, 0, 4, NULL),
(56, 192, 0, 3, NULL),
(56, 193, 0, 2, NULL),
(56, 194, 0, 5, NULL),
(56, 195, 1, 1, NULL),
(58, 196, 0, 4, NULL),
(58, 197, 1, 3, NULL),
(58, 198, 0, 5, NULL),
(58, 199, 0, 1, NULL),
(58, 200, 0, 2, NULL),
(59, 201, 1, 1, NULL),
(59, 202, 0, 2, NULL),
(59, 203, 0, 3, NULL),
(59, 204, 0, 4, NULL),
(59, 205, 0, 5, NULL),
(60, 211, 0, 2, NULL),
(60, 212, 0, 4, NULL),
(60, 213, 0, 3, NULL),
(60, 214, 0, 1, NULL),
(60, 215, 1, 5, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_token`
--

CREATE TABLE `cbt_tes_token` (
  `token_id` int(11) NOT NULL,
  `token_isi` varchar(20) NOT NULL,
  `token_user_id` int(11) NOT NULL,
  `token_ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `token_aktif` int(11) NOT NULL DEFAULT 1 COMMENT 'Umur Token dalam menit, 1 = 1 hari penuh'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_topik_set`
--

CREATE TABLE `cbt_tes_topik_set` (
  `tset_id` bigint(20) UNSIGNED NOT NULL,
  `tset_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tset_topik_id` bigint(20) UNSIGNED NOT NULL,
  `tset_tipe` smallint(6) NOT NULL DEFAULT 1,
  `tset_difficulty` smallint(6) NOT NULL DEFAULT 1,
  `tset_jumlah` smallint(6) NOT NULL DEFAULT 1,
  `tset_jawaban` smallint(6) NOT NULL DEFAULT 0,
  `tset_acak_jawaban` int(11) NOT NULL DEFAULT 1,
  `tset_acak_soal` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tes_topik_set`
--

INSERT INTO `cbt_tes_topik_set` (`tset_id`, `tset_tes_id`, `tset_topik_id`, `tset_tipe`, `tset_difficulty`, `tset_jumlah`, `tset_jawaban`, `tset_acak_jawaban`, `tset_acak_soal`) VALUES
(7, 6, 7, 0, 1, 10, 10, 1, 1),
(8, 7, 7, 0, 1, 10, 10, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_user`
--

CREATE TABLE `cbt_tes_user` (
  `tesuser_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_user_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_status` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `tesuser_creation_time` datetime NOT NULL,
  `tesuser_comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tesuser_token` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tes_user`
--

INSERT INTO `cbt_tes_user` (`tesuser_id`, `tesuser_tes_id`, `tesuser_user_id`, `tesuser_status`, `tesuser_creation_time`, `tesuser_comment`, `tesuser_token`) VALUES
(3, 6, 9, 4, '2019-09-10 16:39:52', NULL, NULL),
(4, 6, 3, 4, '2019-09-10 16:42:57', NULL, NULL),
(5, 7, 3, 4, '2019-09-10 16:48:21', NULL, NULL),
(6, 7, 9, 4, '2019-09-10 16:50:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lowongan`
--

CREATE TABLE `detail_lowongan` (
  `id` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lowongan`
--

INSERT INTO `detail_lowongan` (`id`, `id_lowongan`, `id_user`) VALUES
(1, 5, 6),
(2, 7, 7),
(4, 5, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_soal_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL DEFAULT 0,
  `jawaban_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`jawaban_id`, `jawaban_soal_id`, `jawaban_detail`, `jawaban_benar`, `jawaban_aktif`) VALUES
(186, 57, '<p>1 Syawal</p>\r\n', 1, 1),
(187, 57, '<p>1 Agustus</p>', 0, 1),
(188, 57, '<p>1 Januari</p>', 0, 1),
(189, 57, '<p>1 Desember</p>', 0, 1),
(190, 57, '<p>14 Februari</p>', 0, 1),
(191, 56, '<p>Nazril Irham</p>', 1, 1),
(192, 56, '<p>Joko Susilo</p>', 0, 1),
(193, 56, '<p>Wahyu Saputra</p>\r\n', 0, 1),
(194, 56, '<p>Aril Piterpen</p>', 0, 1),
(195, 56, 'Joko Wow', 0, 1),
(196, 55, '<p>Soekarno</p>', 1, 1),
(197, 55, '<p>Soeharto</p>\r\n', 0, 1),
(198, 55, '<p>Susilo Bambang Yudhoyono</p>\r\n', 0, 1),
(199, 55, '<p>BJ. Habibie</p>\r\n', 0, 1),
(200, 55, '<p>Joko Widodo</p>\r\n', 0, 1),
(201, 54, '<p>Sun East Mall</p>', 1, 1),
(202, 54, '<p>Matahari</p>', 0, 1),
(203, 54, '<p>Bulan</p>', 0, 1),
(204, 54, '<p>Tanah Abang</p>', 0, 1),
(205, 54, '<p>Tanah Lempong</p>', 0, 1),
(206, 53, '<p>Sekolah Menengah Kejuruan</p>', 1, 1),
(207, 53, '<p>Sekolah Menengah Kejujuran</p>', 0, 1),
(208, 53, '<p>Sekolah Maju Sendiri</p>', 0, 1),
(209, 53, '<p>Sekolah Mak Ku</p>', 0, 1),
(210, 53, '<p>Sekolah Memilih Kekasih</p>', 0, 1),
(211, 64, 'Akhirnya aku menemukanmu', 1, 1),
(212, 64, 'Akhir dirimu', 0, 1),
(213, 64, 'Susahnya jadi dia', 0, 1),
(214, 64, 'Jones', 0, 1),
(215, 64, 'Josan - Jomblo Pas Pasan', 0, 1),
(621, 161, '<p>Aksi bela Jomblo</p>\r\n', 1, 1),
(622, 161, '<p>Aksi bela cewek</p>\r\n', 0, 1),
(623, 161, '<p>14 Februari</p>\r\n', 0, 1),
(624, 161, '<p>Hari Valentine</p>\r\n', 0, 1),
(625, 161, '<p>Turun ke jalan</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `topik_modul_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `topik_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topik_detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `topik_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `topik_modul_id`, `topik_nama`, `topik_detail`, `topik_aktif`) VALUES
(7, 9, 'Uji Coba', 'Kumpulan Soal untuk Uji Coba ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `lowongan_id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_lowongan` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `pendidikan` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `umur_min` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `umur_max` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tinggi_badan` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`lowongan_id`, `posisi`, `nama_lowongan`, `pendidikan`, `jenis_kelamin`, `umur_min`, `umur_max`, `tinggi_badan`) VALUES
(5, 'SALES', 'Dibutuhkan segera teknisi yang berpengalaman', 'SMK', 'Laki-laki', '18 tahun', '23 tahun', '165 -+'),
(7, 'Security', 'Dibutuhkan segera security berpengalaman', 'SMK', 'Laki-laki', '18 tahun', '23 tahun', '172 cm -+');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `opsi1` varchar(75) NOT NULL,
  `opsi2` varchar(75) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `opsi1`, `opsi2`, `keterangan`, `level`, `ts`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Achmad Lutfi', '', '', '', 'admin', '2015-07-29 18:12:03'),
(4, 'operator', 'fe96dd39756ac41b74283a9292652d366d73931f', 'Operator', '', '', 'Operator', 'operator-soal', '2018-03-30 12:58:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date_create` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `tinggi_bdn` int(11) NOT NULL,
  `berat_bdn` int(11) NOT NULL,
  `status_nkh` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `universitas` varchar(50) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `nilai_ijazah` varchar(50) NOT NULL,
  `berkas_lamaran` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `lama_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user1`
--

INSERT INTO `user1` (`id`, `user2_id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `status`, `date_create`, `gender`, `phone_number`, `tmpt_lahir`, `tgl_lahir`, `umur`, `tinggi_bdn`, `berat_bdn`, `status_nkh`, `alamat`, `universitas`, `jenjang`, `jurusan`, `tahun_lulus`, `nilai_ijazah`, `berkas_lamaran`, `nama_perusahaan`, `posisi`, `lama_kerja`) VALUES
(6, 3, 'AbankWendy', 'abankwendy@gmail.com', 'pas_photo.jpg', '$2y$10$fFsz.V.tp0bD0N7xY.fNh.UWqutDAcHu0rhiTPsBJCXnbYlr1FGnO', 2, 1, 'Aktif', 1560782794, 'Laki-laki', '123456789', 'Bandung', '2019-07-24', 25, 172, 75, 'Married', 'ed', '2', 'SLTA (SMA/MA/SMK/MAK)', 'Teknik Informatika', '2019', '343434', '123.pdf', 'w', 'Technical Support', 72),
(7, 5, 'Dini Rahmi', 'Dini@gmail.com', 'C360_2016-06-30-20-57-04-042.jpg', '$2y$10$j1QcTyZENo3PS50rHIbEPea4XtzXiKhXXWGBlLY6gcc5vGvEQTuTy', 2, 1, 'Aktif', 1561346423, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0),
(23, 9, 'asep supritna', 'asep@daesegarmin.com', 'default.jpg', '$2y$10$Y9uDFclgoXmFeFt2yz.1ruF/AsjEplK.ubqSSsXm/lMp2wW6I24tK', 2, 1, 'Aktif', 1567795383, 'Laki-laki', '082186152683', 'Bandung', '1990-06-12', 23, 172, 75, 'Married', 'Kp. REzEki', 'SMK KARTIKA XIX BANDUNG', 'SLTA (SMA/MA/SMK/MAK)', 'Teknik Komputer dan Jaringan (TKJ)', '2019', '3.5', '17_04_137_bab1.pdf', 'PT bermasalah', 'Leader', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user2`
--

CREATE TABLE `user2` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_lowongan_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_level` smallint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user2`
--

INSERT INTO `user2` (`user_id`, `user_lowongan_id`, `user_name`, `user_password`, `user_regdate`, `user_firstname`, `user_level`) VALUES
(3, 5, 'wendy', 'wendy', '2019-09-05 04:21:40', 'AbankWendy', 1),
(5, 7, 'dini', 'dini', '2019-09-05 08:16:59', 'Dini Rahmi', 1),
(9, 5, 'asep', 'asep12345', '2019-09-10 08:28:38', 'asep supritna', 1);

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
(1, 1, 1),
(3, 2, 2),
(5, 1, 3),
(6, 1, 5),
(7, 2, 5),
(10, 3, 6),
(12, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE `user_akses` (
  `id` int(11) NOT NULL,
  `level` varchar(75) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `add` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true',
  `edit` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`id`, `level`, `kode_menu`, `add`, `edit`) VALUES
(254, 'operator-soal', 'modul-daftar', 1, 1),
(255, 'operator-soal', 'modul-filemanager', 1, 1),
(256, 'operator-soal', 'modul-import', 1, 1),
(257, 'operator-soal', 'modul-soal', 1, 1),
(258, 'operator-soal', 'modul-topik', 1, 1),
(259, 'operator-tes', 'tes-hasil-operator', 1, 1),
(260, 'operator-tes', 'tes-token', 1, 1),
(600, 'admin', 'peserta-daftar', 1, 1),
(601, 'admin', 'tool-backup', 1, 1),
(602, 'admin', 'peserta-group', 1, 1),
(603, 'admin', 'daftar_pelamar', 1, 1),
(604, 'admin', 'register', 1, 1),
(605, 'admin', 'modul-daftar', 1, 1),
(606, 'admin', 'tes-daftar', 1, 1),
(607, 'admin', 'tes-evaluasi', 1, 1),
(608, 'admin', 'tool-exportimport-soal', 1, 1),
(609, 'admin', 'modul-filemanager', 1, 1),
(610, 'admin', 'tes-hasil', 1, 1),
(611, 'admin', 'peserta-import', 1, 1),
(612, 'admin', 'modul-import', 1, 1),
(613, 'admin', 'user_level', 1, 1),
(614, 'admin', 'user_menu', 1, 1),
(615, 'admin', 'user_atur', 1, 1),
(616, 'admin', 'user-zyacbt', 1, 1),
(617, 'admin', 'tes-rekap', 1, 1),
(618, 'admin', 'modul-soal', 1, 1),
(619, 'admin', 'tes-tambah', 1, 1),
(620, 'admin', 'tes-token', 1, 1),
(621, 'admin', 'modul-topik', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `keterangan`) VALUES
(1, 'admin', 'Administrator'),
(7, 'operator-soal', 'Operator Soal'),
(8, 'operator-tes', 'Operator Tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `log` varchar(250) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `tipe` int(11) NOT NULL DEFAULT 1 COMMENT '0=parent, 1=child',
  `parent` varchar(50) DEFAULT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL DEFAULT '#',
  `icon` varchar(75) NOT NULL DEFAULT 'fa fa-circle-o',
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `tipe`, `parent`, `kode_menu`, `nama_menu`, `url`, `icon`, `urutan`) VALUES
(1, 0, '', 'user', 'Pengaturan', '#', 'fa fa-user', 20),
(3, 1, 'user', 'user_atur', 'Pengaturan User', 'manager/useratur', 'fa fa-circle-o', 5),
(4, 1, 'user', 'user_level', 'Pengaturan Level', 'manager/userlevel', 'fa fa-circle-o', 6),
(5, 1, 'user', 'user_menu', 'Pengaturan Menu', 'manager/usermenu', 'fa fa-circle-o', 7),
(6, 0, '', 'modul', 'Kelola Soal', '#', 'fa fa-book', 2),
(7, 1, 'modul', 'modul-daftar', 'Daftar Soal', 'manager/modul_daftar', 'fa fa-circle-o', 5),
(8, 1, 'modul', 'modul-topik', 'Topik', 'manager/modul_topik', 'fa fa-circle-o', 2),
(10, 0, '', 'peserta', 'Data Pelamar', '#', 'fa fa-users', 1),
(11, 1, 'peserta', 'peserta-daftar', 'Akun Ujian Peserta', 'manager/peserta_daftar', 'fa fa-circle-o', 2),
(13, 1, 'peserta', 'peserta-import', 'Import Data Peserta', 'manager/peserta_import', 'fa fa-circle-o', 3),
(14, 0, '', 'tes', 'Data Tes', '#', 'fa fa-tasks', 7),
(15, 1, 'tes', 'tes-tambah', 'Tambah Tes', 'manager/tes_tambah', 'fa fa-circle-o', 1),
(16, 1, 'tes', 'tes-daftar', 'Daftar Tes', 'manager/tes_daftar', 'fa fa-circle-o', 2),
(17, 1, 'tes', 'tes-hasil', 'Hasil Tes', 'manager/tes_hasil', 'fa fa-circle-o', 6),
(18, 1, 'modul', 'modul-soal', 'Soal', 'manager/modul_soal', 'fa fa-circle-o', 3),
(19, 1, 'tes', 'tes-token', 'Token', 'manager/tes_token', 'fa fa-circle-o', 8),
(20, 1, 'modul', 'modul-modul', 'Modul', 'manager/modul', 'fa fa-circle-o', 1),
(22, 1, 'modul', 'modul-filemanager', 'File Manager', 'manager/modul_filemanager', 'fa fa-circle-o', 6),
(24, 1, 'modul', 'modul-import', 'Import Soal', 'manager/modul_import', 'fa fa-circle-o', 4),
(25, 1, 'tes', 'tes-evaluasi', 'Evaluasi Tes', 'manager/tes_evaluasi', 'fa fa-circle-o', 5),
(28, 1, 'tes', 'tes-hasil-operator', 'Hasil Tes Operator', 'manager/tes_hasil_operator', 'fa fa-circle-o', 10),
(30, 0, '', 'tool', 'Tool', '#', 'fa fa-wrench', 5),
(31, 1, 'tool', 'tool-backup', 'Backup Data', 'manager/tool_backup', 'fa fa-database', 1),
(32, 1, 'tes', 'tes-rekap', 'Rekap Hasil Tes', 'manager/tes_rekap_hasil', 'fa fa-circle-o', 7),
(33, 1, 'tool', 'tool-exportimport-soal', 'Export / Import Soal', 'manager/tool_exportimport_soal', 'fa fa-circle-o', 2),
(34, 1, 'user', 'user-zyacbt', 'Pengaturan ZYACBT', 'manager/pengaturan_zyacbt', 'fa fa-circle-o', 1),
(36, 1, 'peserta', 'register', 'Daftar Registrasi', 'manager/register', 'fa fa-circle-o', 1),
(37, 0, '', 'daftar_lowongan', 'Kelola Lowongan', '#', 'fa fa-book', 1),
(39, 1, 'daftar_lowongan', 'peserta-group', 'Daftar Lowongan', 'manager/daftr_lowongan', 'fa fa-circle-o', 1),
(40, 1, 'peserta', 'daftar_pelamar', 'Daftar Pelamar', 'manager/daftar_pelamar', 'fa fa-circle-o', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu1`
--

CREATE TABLE `user_menu1` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu1`
--

INSERT INTO `user_menu1` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'HRD');

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
(1, 'admin'),
(2, 'User'),
(3, 'HRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa fw fa-user-tie', 1),
(23, 6, 'Dashboard', 'hrd', 'fas fa-fw fa-tachometer-alt', 1),
(24, 6, 'Create Jobs', 'hrd/create_job', 'fas fa fw fa-newspaper', 1),
(25, 6, 'Registration List', 'hrd/register_list', 'fas fa fw fa-registered', 1),
(26, 6, 'Prospective Employee Data', 'hrd/employee_data', 'fas fa fw fa-file', 1),
(27, 6, 'Exam Questions', 'hrd/exam', 'fas fa fw fa-pen', 1),
(28, 6, 'Interview', 'hrd/interview', 'fas fa fw fa-handshake', 1),
(29, 6, 'Selection Results', 'hrd/selection_result', 'fas fa fw fa-clipboard-list', 1),
(30, 6, 'Announcement', 'hrd/announcement', 'fas fa fw fa-info-circle', 1),
(32, 2, 'Dashboard', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(33, 2, 'Vacancy', 'user/vacancy', 'fas fa fw fa-newspaper', 1),
(34, 2, 'Exam Questions', 'user/ujian', 'fas fa fw fa-pen', 1),
(35, 2, 'Interview', 'user/interview', 'fas fa fw fa-handshake', 1),
(36, 2, 'Announcement', 'user/announcement', 'fas fa fw fa-info-circle', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cbt_konfigurasi`
--
ALTER TABLE `cbt_konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`),
  ADD UNIQUE KEY `konfigurasi_kode` (`konfigurasi_kode`);

--
-- Indeks untuk tabel `cbt_modul`
--
ALTER TABLE `cbt_modul`
  ADD PRIMARY KEY (`modul_id`),
  ADD UNIQUE KEY `ak_module_name` (`modul_nama`);

--
-- Indeks untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `p_question_subject_id` (`soal_topik_id`);

--
-- Indeks untuk tabel `cbt_tes`
--
ALTER TABLE `cbt_tes`
  ADD PRIMARY KEY (`tes_id`),
  ADD UNIQUE KEY `ak_test_name` (`tes_nama`);

--
-- Indeks untuk tabel `cbt_tesgrup`
--
ALTER TABLE `cbt_tesgrup`
  ADD PRIMARY KEY (`tstgrp_tes_id`,`tstgrp_grup_id`),
  ADD KEY `p_tstgrp_test_id` (`tstgrp_tes_id`),
  ADD KEY `p_tstgrp_group_id` (`tstgrp_grup_id`);

--
-- Indeks untuk tabel `cbt_tes_soal`
--
ALTER TABLE `cbt_tes_soal`
  ADD PRIMARY KEY (`tessoal_id`),
  ADD UNIQUE KEY `ak_testuser_question` (`tessoal_tesuser_id`,`tessoal_soal_id`),
  ADD KEY `p_testlog_question_id` (`tessoal_soal_id`),
  ADD KEY `p_testlog_testuser_id` (`tessoal_tesuser_id`);

--
-- Indeks untuk tabel `cbt_tes_soal_jawaban`
--
ALTER TABLE `cbt_tes_soal_jawaban`
  ADD PRIMARY KEY (`soaljawaban_tessoal_id`,`soaljawaban_jawaban_id`),
  ADD KEY `p_logansw_answer_id` (`soaljawaban_jawaban_id`),
  ADD KEY `p_logansw_testlog_id` (`soaljawaban_tessoal_id`);

--
-- Indeks untuk tabel `cbt_tes_token`
--
ALTER TABLE `cbt_tes_token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `token_user_id` (`token_user_id`);

--
-- Indeks untuk tabel `cbt_tes_topik_set`
--
ALTER TABLE `cbt_tes_topik_set`
  ADD PRIMARY KEY (`tset_id`),
  ADD KEY `p_tsubset_test_id` (`tset_tes_id`),
  ADD KEY `tsubset_subject_id` (`tset_topik_id`);

--
-- Indeks untuk tabel `cbt_tes_user`
--
ALTER TABLE `cbt_tes_user`
  ADD PRIMARY KEY (`tesuser_id`),
  ADD UNIQUE KEY `ak_testuser` (`tesuser_tes_id`,`tesuser_user_id`,`tesuser_status`),
  ADD KEY `p_testuser_user_id` (`tesuser_user_id`),
  ADD KEY `p_testuser_test_id` (`tesuser_tes_id`);

--
-- Indeks untuk tabel `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`),
  ADD KEY `p_answer_question_id` (`jawaban_soal_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `ak_subject_name` (`topik_modul_id`,`topik_nama`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`lowongan_id`),
  ADD UNIQUE KEY `group_name` (`posisi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `level` (`level`);

--
-- Indeks untuk tabel `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `ak_user_name` (`user_name`),
  ADD KEY `user_groups_id` (`user_lowongan_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akses_kode_menu` (`kode_menu`),
  ADD KEY `akses_level` (`level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indeks untuk tabel `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_menu` (`kode_menu`);

--
-- Indeks untuk tabel `user_menu1`
--
ALTER TABLE `user_menu1`
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
-- AUTO_INCREMENT untuk tabel `cbt_konfigurasi`
--
ALTER TABLE `cbt_konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cbt_modul`
--
ALTER TABLE `cbt_modul`
  MODIFY `modul_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT untuk tabel `cbt_tes`
--
ALTER TABLE `cbt_tes`
  MODIFY `tes_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cbt_tes_soal`
--
ALTER TABLE `cbt_tes_soal`
  MODIFY `tessoal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `cbt_tes_token`
--
ALTER TABLE `cbt_tes_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_tes_topik_set`
--
ALTER TABLE `cbt_tes_topik_set`
  MODIFY `tset_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cbt_tes_user`
--
ALTER TABLE `cbt_tes_user`
  MODIFY `tesuser_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawaban_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `lowongan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user2`
--
ALTER TABLE `user2`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user_menu1`
--
ALTER TABLE `user_menu1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD CONSTRAINT `cbt_soal_ibfk_1` FOREIGN KEY (`soal_topik_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tesgrup`
--
ALTER TABLE `cbt_tesgrup`
  ADD CONSTRAINT `cbt_tesgrup_ibfk_1` FOREIGN KEY (`tstgrp_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tesgrup_ibfk_2` FOREIGN KEY (`tstgrp_grup_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_soal`
--
ALTER TABLE `cbt_tes_soal`
  ADD CONSTRAINT `cbt_tes_soal_ibfk_1` FOREIGN KEY (`tessoal_tesuser_id`) REFERENCES `cbt_tes_user` (`tesuser_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_soal_ibfk_2` FOREIGN KEY (`tessoal_soal_id`) REFERENCES `cbt_soal` (`soal_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_soal_jawaban`
--
ALTER TABLE `cbt_tes_soal_jawaban`
  ADD CONSTRAINT `cbt_tes_soal_jawaban_ibfk_1` FOREIGN KEY (`soaljawaban_tessoal_id`) REFERENCES `cbt_tes_soal` (`tessoal_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_soal_jawaban_ibfk_2` FOREIGN KEY (`soaljawaban_jawaban_id`) REFERENCES `jawaban` (`jawaban_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_token`
--
ALTER TABLE `cbt_tes_token`
  ADD CONSTRAINT `cbt_tes_token_ibfk_1` FOREIGN KEY (`token_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_topik_set`
--
ALTER TABLE `cbt_tes_topik_set`
  ADD CONSTRAINT `cbt_tes_topik_set_ibfk_1` FOREIGN KEY (`tset_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_topik_set_ibfk_2` FOREIGN KEY (`tset_topik_id`) REFERENCES `kategori` (`kategori_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_user`
--
ALTER TABLE `cbt_tes_user`
  ADD CONSTRAINT `cbt_tes_user_ibfk_1` FOREIGN KEY (`tesuser_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cbt_tes_user_ibfk_2` FOREIGN KEY (`tesuser_user_id`) REFERENCES `user2` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`jawaban_soal_id`) REFERENCES `cbt_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`topik_modul_id`) REFERENCES `cbt_modul` (`modul_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user2`
--
ALTER TABLE `user2`
  ADD CONSTRAINT `user2_ibfk_1` FOREIGN KEY (`user_lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `user_akses_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_akses_ibfk_3` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
