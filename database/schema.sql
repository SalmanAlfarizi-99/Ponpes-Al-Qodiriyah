-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2025 pada 17.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `priority` enum('low','normal','high','urgent') NOT NULL DEFAULT 'normal',
  `published_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('daily','midterm','final','practical','tahfidz') NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `max_score` decimal(5,2) NOT NULL DEFAULT 100.00,
  `semester` tinyint(4) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_values`)),
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_values`)),
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `academic_year` varchar(255) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT 30,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `content_settings`
--

CREATE TABLE `content_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `label` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `content_settings`
--

INSERT INTO `content_settings` (`id`, `key`, `section`, `value`, `type`, `label`, `order`, `created_at`, `updated_at`) VALUES
(1, 'brand_name', 'brand', 'Ponpes Al-Qodiriyah', 'text', 'Nama Brand', 1, '2025-12-16 18:51:42', '2025-12-23 19:05:46'),
(2, 'brand_tagline', 'brand', 'Yayasan Dakwah Islam Al-Qodiriyah', 'text', 'Tagline', 2, '2025-12-16 18:51:42', '2025-12-23 19:05:46'),
(3, 'brand_logo_url', 'brand', '/uploads/content/1766552403_log.png', 'image', 'Logo URL (kosong = icon default)', 3, '2025-12-16 18:51:42', '2025-12-23 22:00:03'),
(4, 'contact_phone', 'contact', '+62 813 2137 0002', 'text', 'Nomor Telepon', 1, '2025-12-16 18:51:42', '2025-12-23 19:17:54'),
(5, 'contact_email', 'contact', 'Alqodiriyah3@gmail.com', 'text', 'Email', 2, '2025-12-16 18:51:42', '2025-12-23 19:17:54'),
(6, 'contact_address', 'contact', 'Jl. KH. Abdul Ngalim, Panggangsari, Kecamatan Losari, Kabupaten Cirebon, Jawa Barat 45192', 'text', 'Alamat', 3, '2025-12-16 18:51:42', '2025-12-23 19:17:54'),
(7, 'social_facebook', 'contact', 'https://www.facebook.com/infoalqodiriyah?locale=id_ID', 'text', 'Facebook URL', 4, '2025-12-16 18:51:43', '2025-12-23 19:17:54'),
(8, 'social_instagram', 'contact', 'https://www.instagram.com/ponpes.alqodiriyah/', 'text', 'Instagram URL', 5, '2025-12-16 18:51:43', '2025-12-23 19:17:54'),
(9, 'social_youtube', 'contact', 'https://www.youtube.com/@numusalqodiriyah', 'text', 'YouTube URL', 6, '2025-12-16 18:51:43', '2025-12-23 19:17:54'),
(10, 'social_tiktok', 'contact', 'https://www.tiktok.com/@numus.media.offic?_t=ZS-90NhFpMGvYe&_r=1', 'text', 'TikTok URL', 7, '2025-12-16 18:51:43', '2025-12-23 19:17:54'),
(11, 'hero1_badge', 'hero', 'Selamat Datang di Pondok Pesantren', 'text', 'Slide 1 - Badge', 1, '2025-12-16 18:51:43', '2025-12-16 23:23:09'),
(12, 'hero1_title', 'hero', 'Mencetak Generasi Muda Berilmu & Berakhlak Mulia', 'text', 'Slide 1 - Judul', 2, '2025-12-16 18:51:43', '2025-12-23 19:22:37'),
(13, 'hero1_subtitle', 'hero', 'Memadukan kurikulum pesantren salafiyah dengan pendidikan modern untuk menghasilkan lulusan yang unggul dalam IMTAQ dan IPTEK.', 'textarea', 'Slide 1 - Deskripsi', 3, '2025-12-16 18:51:43', '2025-12-16 18:51:43'),
(14, 'hero2_badge', 'hero', 'Pendidikan Berkualitas', 'text', 'Slide 2 - Badge', 5, '2025-12-16 18:51:43', '2025-12-16 23:23:09'),
(15, 'hero2_title', 'hero', '8 Lembaga Pendidikan & Dakwah Terintegrasi', 'text', 'Slide 2 - Judul', 6, '2025-12-16 18:51:43', '2025-12-23 19:22:38'),
(16, 'hero2_subtitle', 'hero', 'Dari Madrasah Diniyah hingga Perguruan Tinggi, kami menyediakan pendidikan komprehensif yang memadukan ilmu agama dan umum.', 'textarea', 'Slide 2 - Deskripsi', 7, '2025-12-16 18:51:43', '2025-12-23 09:52:39'),
(17, 'hero3_badge', 'hero', 'Program Unggulan', 'text', 'Slide 3 - Badge', 9, '2025-12-16 18:51:43', '2025-12-16 23:23:09'),
(18, 'hero3_title', 'hero', 'Program Dakwah Majelis Nurul Musthofa', 'text', 'Slide 3 - Judul', 10, '2025-12-16 18:51:43', '2025-12-23 19:22:38'),
(19, 'hero3_subtitle', 'hero', 'Majelis Dzikir & Sholawat yang menjadi wadah menyambung silaturahmi dan mengharap syafaat Rasulullah SAW.', 'textarea', 'Slide 3 - Deskripsi', 11, '2025-12-16 18:51:43', '2025-12-23 19:22:38'),
(20, 'stats_santri', 'stats', '100+', 'text', 'Jumlah Santri', 1, '2025-12-16 18:51:43', '2025-12-23 19:55:46'),
(21, 'stats_ustadz', 'stats', '50+', 'text', 'Jumlah Ustadz', 2, '2025-12-16 18:51:43', '2025-12-23 19:55:46'),
(22, 'stats_years', 'stats', '79+', 'text', 'Tahun Berdiri', 3, '2025-12-16 18:51:43', '2025-12-23 19:56:18'),
(23, 'profile_name', 'profile', 'Kyai Mahfudzin Abdul Malik', 'text', 'Nama Ketua Yayasan', 1, '2025-12-16 18:51:43', '2025-12-23 19:40:36'),
(24, 'profile_title', 'profile', 'Pengasuh Pondok Pesantren', 'text', 'Jabatan', 2, '2025-12-16 18:51:43', '2025-12-23 19:40:36'),
(25, 'profile_image', 'profile', '/uploads/content/1766544067_kh.png', 'image', 'Foto Profil URL (kosong = icon default)', 3, '2025-12-16 18:51:43', '2025-12-23 19:41:07'),
(26, 'profile_quote', 'profile', 'Dengan Ilmu Hidup Jadi Mudah, Dengan Agama Hidup Jadi Terarah', 'text', 'Kutipan', 4, '2025-12-16 18:51:43', '2025-12-16 18:51:43'),
(27, 'profile_message1', 'profile', 'Assalamu\'alaikum warahmatullahi wabarakatuh. Segala puji bagi Allah SWT yang telah memberikan kekuatan dan keistiqamahan dalam perjuangan pendidikan dan dakwah Islam.', 'textarea', 'Sambutan Paragraf 1', 5, '2025-12-16 18:51:44', '2025-12-16 18:51:44'),
(28, 'profile_message2', 'profile', 'Pondok Pesantren kami merupakan amanah besar dalam melanjutkan perjuangan para ulama pendahulu. Kami mengajak seluruh elemen masyarakat untuk terus bersinergi dan mendukung perjuangan ini.', 'textarea', 'Sambutan Paragraf 2', 6, '2025-12-16 18:51:44', '2025-12-16 18:51:44'),
(29, 'news1_title', 'news', 'Rutinan Bulanan Majelis Nurul Musthofa', 'text', 'Berita 1 - Judul', 1, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(30, 'news1_desc', 'news', 'Pembacaan Asmaul Husna, Basyairul Khoirot, Pembacaan Maulid, Pengajian', 'textarea', 'Berita 1 - Deskripsi', 2, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(31, 'news1_date', 'news', '22 Des 2025', 'text', 'Berita 1 - Tanggal', 3, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(32, 'news1_image', 'news', '/uploads/content/1766544293_ba1.png', 'image', 'Berita 1 - Gambar URL', 4, '2025-12-16 18:51:44', '2025-12-23 19:44:53'),
(33, 'news2_title', 'news', 'Pengajian Umum Musholla Al-Muawanah', 'text', 'Berita 2 - Judul', 5, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(34, 'news2_desc', 'news', 'Bertema Ngaji bareng 2 tokoh hebat', 'textarea', 'Berita 2 - Deskripsi', 6, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(35, 'news2_date', 'news', '2 Des 2025', 'text', 'Berita 2 - Tanggal', 7, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(36, 'news2_image', 'news', '/uploads/content/1766544318_ba2.png', 'image', 'Berita 2 - Gambar URL', 8, '2025-12-16 18:51:44', '2025-12-23 19:45:18'),
(37, 'news3_title', 'news', 'Peringatan Maulid Nabi Muhammad SAW & Malam Puncak Penutupan Safari Maulid', 'text', 'Berita 3 - Judul', 9, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(38, 'news3_desc', 'news', 'Pesantren mengadakan rangkaian acara peringatan Maulid Nabi', 'textarea', 'Berita 3 - Deskripsi', 10, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(39, 'news3_date', 'news', '4 Okt 2025', 'text', 'Berita 3 - Tanggal', 11, '2025-12-16 18:51:44', '2025-12-23 19:44:15'),
(40, 'news3_image', 'news', '/uploads/content/1766544341_be.png', 'image', 'Berita 3 - Gambar URL', 12, '2025-12-16 18:51:44', '2025-12-23 19:45:41'),
(41, 'footer_about', 'footer', 'Pondok Pesantren Modern adalah lembaga pendidikan Islam terkemuka yang menggabungkan nilai-nilai tradisional dengan pendekatan modern.', 'textarea', 'Tentang (Footer)', 1, '2025-12-16 18:51:44', '2025-12-17 01:05:21'),
(42, 'footer_copyright', 'footer', '© 2025 Pondok Pesantren Digital. All rights reserved.', 'text', 'Copyright', 6, '2025-12-16 18:51:44', '2025-12-23 09:52:41'),
(43, 'hero1_image', 'hero', '/uploads/content/1766543028_s1.jpg', 'image', 'Slide 1 - Gambar Background', 4, '2025-12-16 23:23:09', '2025-12-23 19:23:48'),
(44, 'hero2_image', 'hero', '/uploads/content/1766543050_s2.jpg', 'image', 'Slide 2 - Gambar Background', 8, '2025-12-16 23:23:09', '2025-12-23 19:24:10'),
(45, 'hero3_image', 'hero', '/uploads/content/1766543072_s3.jpg', 'image', 'Slide 3 - Gambar Background', 12, '2025-12-16 23:23:10', '2025-12-23 19:24:32'),
(46, 'footer_address', 'footer', 'Jl. KH. Abdul Ngalim, Panggangsari, Kecamatan Losari, Kabupaten Cirebon, Jawa Barat 45192', 'text', 'Alamat Lengkap', 2, '2025-12-17 01:05:21', '2025-12-23 19:48:01'),
(47, 'footer_map_url', 'footer', 'https://maps.app.goo.gl/eLFMTyidTXTynUNw6', 'text', 'Google Maps URL', 3, '2025-12-17 01:05:23', '2025-12-23 19:48:01'),
(48, 'footer_whatsapp', 'footer', '6281321370002', 'text', 'Nomor WhatsApp (tanpa +)', 4, '2025-12-17 01:05:25', '2025-12-23 19:48:01'),
(49, 'footer_tagline', 'footer', 'Dibuat dengan ❤️ By SafariDev', 'text', 'Tagline Footer', 5, '2025-12-17 01:05:25', '2025-12-23 19:48:01'),
(50, 'lembaga_title', 'lembaga', 'Lembaga Pendidikan & Dakwah di Bawah Naungan Yayasan', 'text', 'Judul Section Lembaga', 1, '2025-12-17 01:44:20', '2025-12-23 19:30:35'),
(51, 'lembaga_subtitle', 'lembaga', 'Berbagai jenjang pendidikan yang memadukan kurikulum nasional dengan pendidikan keislaman', 'textarea', 'Deskripsi Section Lembaga', 2, '2025-12-17 01:44:20', '2025-12-17 01:44:20'),
(52, 'lembaga1_title', 'lembaga', 'Pondok Pesantren', 'text', 'Lembaga 1 - Judul', 3, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(53, 'lembaga1_desc', 'lembaga', 'Pondok Pesantren untuk santri Putra dan Putri dengan pendidikan Islam klasik', 'textarea', 'Lembaga 1 - Deskripsi', 4, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(54, 'lembaga1_icon', 'lembaga', 'fa-mosque', 'text', 'Lembaga 1 - Icon (FontAwesome)', 5, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(55, 'lembaga1_image', 'lembaga', '/uploads/content/1766543476_sdg-removebg-preview.png', 'image', 'Lembaga 1 - Gambar', 6, '2025-12-17 01:44:21', '2025-12-23 19:31:16'),
(56, 'lembaga2_title', 'lembaga', 'Madrasah Ibtidaiyah', 'text', 'Lembaga 2 - Judul', 7, '2025-12-17 01:44:21', '2025-12-23 19:30:35'),
(57, 'lembaga2_desc', 'lembaga', 'Madrasah yang memadukan pendidikan agama dan umum dengan kurikulum terpadu.', 'textarea', 'Lembaga 2 - Deskripsi', 8, '2025-12-17 01:44:21', '2025-12-23 19:30:35'),
(58, 'lembaga2_icon', 'lembaga', 'fa-school', 'text', 'Lembaga 2 - Icon (FontAwesome)', 9, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(59, 'lembaga2_image', 'lembaga', '/uploads/content/1766543574_lm.png', 'image', 'Lembaga 2 - Gambar', 10, '2025-12-17 01:44:21', '2025-12-23 19:32:54'),
(60, 'lembaga3_title', 'lembaga', 'Madrasah Aliyah', 'text', 'Lembaga 3 - Judul', 11, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(61, 'lembaga3_desc', 'lembaga', 'MA dengan program unggulan akademik dan keislaman berkualitas tinggi', 'textarea', 'Lembaga 3 - Deskripsi', 12, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(62, 'lembaga3_icon', 'lembaga', 'fa-university', 'text', 'Lembaga 3 - Icon (FontAwesome)', 13, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(63, 'lembaga3_image', 'lembaga', '/uploads/content/1766543623_sgj.png', 'image', 'Lembaga 3 - Gambar', 14, '2025-12-17 01:44:21', '2025-12-23 19:33:43'),
(68, 'lembaga5_title', 'lembaga', 'Madrasah Diniyah', 'text', 'Lembaga 5 - Judul', 19, '2025-12-17 01:44:21', '2025-12-23 19:30:35'),
(69, 'lembaga5_desc', 'lembaga', 'Pendidikan khazanah kitab salaf dan bahasa Arab untuk mencetak muslim yang lurus dan kompeten.', 'textarea', 'Lembaga 5 - Deskripsi', 20, '2025-12-17 01:44:21', '2025-12-23 19:30:35'),
(70, 'lembaga5_icon', 'lembaga', 'fa-book-quran', 'text', 'Lembaga 5 - Icon (FontAwesome)', 21, '2025-12-17 01:44:21', '2025-12-17 01:44:21'),
(71, 'lembaga5_image', 'lembaga', '/uploads/content/1766543648_lm.png', 'image', 'Lembaga 5 - Gambar', 22, '2025-12-17 01:44:21', '2025-12-23 19:34:08'),
(72, 'lembaga6_title', 'lembaga', 'Balai Latihan Kerja Komunitas', 'text', 'Lembaga 6 - Judul', 23, '2025-12-17 01:44:21', '2025-12-23 19:30:35'),
(73, 'lembaga6_desc', 'lembaga', 'Pelatihan untuk santri dan siswa-siswi sebagai bekal masa depan menghadapi modernisasi.', 'textarea', 'Lembaga 6 - Deskripsi', 24, '2025-12-17 01:44:22', '2025-12-23 19:30:35'),
(74, 'lembaga6_icon', 'lembaga', 'fa-child', 'text', 'Lembaga 6 - Icon (FontAwesome)', 25, '2025-12-17 01:44:22', '2025-12-23 09:52:41'),
(75, 'lembaga6_image', 'lembaga', '/uploads/content/1766543672_blkk-removebg-preview.png', 'image', 'Lembaga 6 - Gambar', 26, '2025-12-17 01:44:22', '2025-12-23 19:34:32'),
(88, 'lembaga8_title', 'lembaga', 'Raudhatul Athfal', 'text', 'Lembaga 8 - Judul', 31, '2025-12-20 17:24:07', '2025-12-23 21:14:12'),
(89, 'lembaga8_desc', 'lembaga', 'Taman bermain islami untuk mewujudkan generasi kreatif serta berakhlak mulia.', 'textarea', 'Lembaga 8 - Deskripsi', 32, '2025-12-20 17:24:07', '2025-12-23 19:30:36'),
(90, 'lembaga8_icon', 'lembaga', 'fa-heartbeat', 'text', 'Lembaga 8 - Icon (FontAwesome)', 33, '2025-12-20 17:24:07', '2025-12-20 17:24:07'),
(91, 'lembaga8_image', 'lembaga', '/uploads/content/1766543722_lm.png', 'image', 'Lembaga 8 - Gambar', 34, '2025-12-20 17:24:07', '2025-12-23 19:35:22'),
(94, 'fasilitas_title', 'fasilitas', 'Lingkungan Nyaman untuk Menuntut Ilmu', 'text', 'Judul Section Fasilitas', 1, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(95, 'fasilitas_subtitle', 'fasilitas', 'Fasilitas lengkap untuk mendukung kegiatan belajar dan beribadah', 'textarea', 'Deskripsi Section Fasilitas', 2, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(96, 'fasilitas1_title', 'fasilitas', 'Asrama', 'text', 'Fasilitas 1 - Judul', 3, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(97, 'fasilitas1_desc', 'fasilitas', 'Asrama nyaman dan kondusif untuk santri putra dan putri', 'textarea', 'Fasilitas 1 - Deskripsi', 4, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(98, 'fasilitas1_icon', 'fasilitas', 'fa-bed', 'text', 'Fasilitas 1 - Icon (FontAwesome)', 5, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(99, 'fasilitas1_image', 'fasilitas', '/uploads/content/1766543875_fs2.png', 'image', 'Fasilitas 1 - Gambar', 6, '2025-12-20 18:24:22', '2025-12-23 19:37:55'),
(100, 'fasilitas2_title', 'fasilitas', 'Masjid', 'text', 'Fasilitas 2 - Judul', 7, '2025-12-20 18:24:22', '2025-12-20 18:24:22'),
(101, 'fasilitas2_desc', 'fasilitas', 'Masjid sebagai pusat ibadah dan kegiatan keislaman', 'textarea', 'Fasilitas 2 - Deskripsi', 8, '2025-12-20 18:24:23', '2025-12-23 19:37:11'),
(102, 'fasilitas2_icon', 'fasilitas', 'fa-mosque', 'text', 'Fasilitas 2 - Icon (FontAwesome)', 9, '2025-12-20 18:24:23', '2025-12-20 18:24:23'),
(103, 'fasilitas2_image', 'fasilitas', '/uploads/content/1766543901_fs1.png', 'image', 'Fasilitas 2 - Gambar', 10, '2025-12-20 18:24:23', '2025-12-23 19:38:21'),
(104, 'fasilitas3_title', 'fasilitas', 'Kelas Belajar', 'text', 'Fasilitas 3 - Judul', 11, '2025-12-20 18:24:23', '2025-12-20 18:24:23'),
(105, 'fasilitas3_desc', 'fasilitas', 'Ruang kelas modern dengan fasilitas pembelajaran lengkap', 'textarea', 'Fasilitas 3 - Deskripsi', 12, '2025-12-20 18:24:23', '2025-12-20 18:24:23'),
(106, 'fasilitas3_icon', 'fasilitas', 'fa-chalkboard', 'text', 'Fasilitas 3 - Icon (FontAwesome)', 13, '2025-12-20 18:24:23', '2025-12-20 18:24:23'),
(107, 'fasilitas3_image', 'fasilitas', '/uploads/content/1766543927_fs4.png', 'image', 'Fasilitas 3 - Gambar', 14, '2025-12-20 18:24:23', '2025-12-23 19:38:47'),
(108, 'fasilitas4_title', 'fasilitas', 'Majelis Ta\'lim', 'text', 'Fasilitas 4 - Judul', 15, '2025-12-20 18:24:23', '2025-12-23 19:37:12'),
(109, 'fasilitas4_desc', 'fasilitas', 'Majelis Ta\'lim sebagai tempat kegiatan rutinan santri.', 'textarea', 'Fasilitas 4 - Deskripsi', 16, '2025-12-20 18:24:23', '2025-12-23 19:37:12'),
(110, 'fasilitas4_icon', 'fasilitas', 'fa-hospital', 'text', 'Fasilitas 4 - Icon (FontAwesome)', 17, '2025-12-20 18:24:23', '2025-12-20 18:24:23'),
(111, 'fasilitas4_image', 'fasilitas', '/uploads/content/1766543950_fs3.png', 'image', 'Fasilitas 4 - Gambar', 18, '2025-12-20 18:24:23', '2025-12-23 19:39:10'),
(116, 'hero4_title', 'hero', 'Kegiatan Rutinan Malam Selasa', 'text', 'Slide 4 - Judul', 0, '2025-12-20 20:23:12', '2025-12-23 19:57:36'),
(117, 'hero4_image', 'hero', '/uploads/content/1766287465_WhatsApp Image 2024-11-15 at 21.22.33 (3).jpeg', 'image', 'Slide 4 - Gambar Background', 0, '2025-12-20 20:24:25', '2025-12-20 20:24:25'),
(118, 'hero4_badge', 'hero', 'Kegiatan Mingguan', 'text', 'Slide 4 - Badge', 0, '2025-12-20 20:25:38', '2025-12-21 08:31:55'),
(120, 'hero4_subtitle', 'hero', 'Lantunan mutiara beriring rebana untuk memuji  & mengharap Syafa`at sang Manusia Paripurna', 'textarea', 'Slide 4 - Deskripsi', 0, '2025-12-20 21:03:16', '2025-12-23 19:58:34'),
(129, 'news3_url', 'news', 'https://www.instagram.com/p/DPS10XDEWLN/', 'text', 'Berita 3 - Link URL', 13, '2025-12-23 09:52:40', '2025-12-23 19:50:08'),
(130, 'news1_url', 'news', 'https://www.instagram.com/p/DSjrzoIkRPB/', 'text', 'Berita 1 - Link URL (sosmed/sumber)', 14, '2025-12-23 09:52:40', '2025-12-23 19:51:39'),
(131, 'news2_url', 'news', 'https://www.instagram.com/p/DRwnQSUETq4/', 'text', 'Berita 2 - Link URL (sosmed/sumber)', 15, '2025-12-23 09:52:40', '2025-12-23 19:51:08'),
(132, 'lembaga4_title', 'lembaga', 'Majelis Dzikir & Sholawat', 'text', 'Lembaga 4 - Judul', 15, '2025-12-23 09:52:40', '2025-12-23 19:30:35'),
(133, 'lembaga4_desc', 'lembaga', 'Pembacaan Maulid rutin setiap minggu dan program khusus latihan rebana, vokal, dan tilawah.', 'textarea', 'Lembaga 4 - Deskripsi', 16, '2025-12-23 09:52:40', '2025-12-23 19:30:35'),
(134, 'lembaga4_icon', 'lembaga', 'fa-tools', 'text', 'Lembaga 4 - Icon (FontAwesome)', 17, '2025-12-23 09:52:40', '2025-12-23 09:52:40'),
(135, 'lembaga4_image', 'lembaga', '/uploads/content/1766543597_nm.jpg', 'image', 'Lembaga 4 - Gambar', 18, '2025-12-23 09:52:41', '2025-12-23 19:33:17'),
(136, 'lembaga7_title', 'lembaga', 'Taman Pendidikan Al-Qur\'an', 'text', 'Lembaga 7 - Judul', 27, '2025-12-23 09:52:41', '2025-12-23 19:30:36'),
(137, 'lembaga7_desc', 'lembaga', 'Mencetak generasi Qur\'ani dan nilai Islam sejak dini.', 'textarea', 'Lembaga 7 - Deskripsi', 28, '2025-12-23 09:52:41', '2025-12-23 19:30:36'),
(138, 'lembaga7_icon', 'lembaga', 'fa-graduation-cap', 'text', 'Lembaga 7 - Icon (FontAwesome)', 29, '2025-12-23 09:52:41', '2025-12-23 09:52:41'),
(139, 'lembaga7_image', 'lembaga', '/uploads/content/1766543693_lm.png', 'image', 'Lembaga 7 - Gambar', 30, '2025-12-23 09:52:41', '2025-12-23 19:34:53');

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
-- Struktur dari tabel `info_pages`
--

CREATE TABLE `info_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-info-circle',
  `category` varchar(255) NOT NULL DEFAULT 'general',
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `info_pages`
--

INSERT INTO `info_pages` (`id`, `title`, `slug`, `content`, `icon`, `category`, `order`, `is_active`, `show_in_menu`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Jadwal Pelajaran', 'jadwal-pelajaran', '\r\n<h2>Jadwal Pelajaran Pondok Pesantren</h2>\r\n\r\n<p>Berikut adalah jadwal pelajaran yang berlaku di pondok pesantren kami. Jadwal ini mencakup pelajaran agama dan umum yang disesuaikan dengan kurikulum nasional dan kurikulum pesantren.</p>\r\n\r\n<h3>Jadwal Harian</h3>\r\n<table>\r\n    <tr>\r\n        <th>Waktu</th>\r\n        <th>Kegiatan</th>\r\n        <th>Keterangan</th>\r\n    </tr>\r\n    <tr>\r\n        <td>04:00 - 05:00</td>\r\n        <td>Sholat Subuh & Mengaji</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n    <tr>\r\n        <td>05:00 - 06:30</td>\r\n        <td>Tahfidz Al-Quran</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n    <tr>\r\n        <td>07:00 - 12:00</td>\r\n        <td>Pelajaran Formal</td>\r\n        <td>Sekolah</td>\r\n    </tr>\r\n    <tr>\r\n        <td>12:00 - 13:00</td>\r\n        <td>Sholat Dzuhur & Istirahat</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n    <tr>\r\n        <td>13:00 - 15:00</td>\r\n        <td>Pelajaran Diniyah</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n    <tr>\r\n        <td>15:00 - 17:00</td>\r\n        <td>Kegiatan Ekstrakurikuler</td>\r\n        <td>Pilihan</td>\r\n    </tr>\r\n    <tr>\r\n        <td>18:00 - 19:30</td>\r\n        <td>Sholat Maghrib & Mengaji</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n    <tr>\r\n        <td>19:30 - 21:00</td>\r\n        <td>Belajar Mandiri</td>\r\n        <td>Wajib</td>\r\n    </tr>\r\n</table>\r\n\r\n<h3>Mata Pelajaran</h3>\r\n<ul>\r\n    <li><strong>Pelajaran Agama:</strong> Al-Quran, Hadits, Fiqih, Aqidah Akhlak, SKI, Bahasa Arab</li>\r\n    <li><strong>Pelajaran Umum:</strong> Matematika, IPA, IPS, Bahasa Indonesia, Bahasa Inggris</li>\r\n    <li><strong>Pelajaran Diniyah:</strong> Nahwu Shorof, Tajwid, Tafsir, Ushul Fiqih</li>\r\n</ul>\r\n', 'fas fa-calendar-alt', 'academic', 1, 1, 1, NULL, '2025-12-16 18:55:47', '2025-12-16 18:55:47'),
(2, 'Kegiatan Pesantren', 'kegiatan-pesantren', '\r\n<h2>Kegiatan Pondok Pesantren</h2>\r\n\r\n<p>Pondok pesantren kami menyelenggarakan berbagai kegiatan untuk membentuk karakter santri yang berakhlak mulia dan berprestasi.</p>\r\n\r\n<h3>Kegiatan Harian</h3>\r\n<ul>\r\n    <li>Sholat berjamaah 5 waktu</li>\r\n    <li>Tahfidz Al-Quran</li>\r\n    <li>Kajian kitab kuning</li>\r\n    <li>Pembelajaran formal</li>\r\n</ul>\r\n\r\n<h3>Kegiatan Mingguan</h3>\r\n<ul>\r\n    <li>Muhadharah (latihan pidato)</li>\r\n    <li>Yasinan bersama</li>\r\n    <li>Olahraga dan kebersihan</li>\r\n    <li>Ekstrakurikuler</li>\r\n</ul>\r\n\r\n<h3>Kegiatan Bulanan</h3>\r\n<ul>\r\n    <li>Evaluasi hafalan</li>\r\n    <li>Pertemuan wali santri</li>\r\n    <li>Bakti sosial</li>\r\n</ul>\r\n\r\n<h3>Kegiatan Tahunan</h3>\r\n<ul>\r\n    <li>Wisuda tahfidz</li>\r\n    <li>Haflah akhirussanah</li>\r\n    <li>Pesantren kilat Ramadhan</li>\r\n    <li>Kunjungan edukatif</li>\r\n    <li>Perlombaan antar santri</li>\r\n</ul>\r\n', 'fas fa-mosque', 'activity', 2, 1, 1, NULL, '2025-12-16 18:55:47', '2025-12-16 18:55:47'),
(3, 'Biaya Pendaftaran', 'biaya-pendaftaran', '\r\n<h2>Informasi Biaya Pendaftaran</h2>\r\n\r\n<p>Berikut adalah rincian biaya pendaftaran dan biaya bulanan untuk santri baru di pondok pesantren kami.</p>\r\n\r\n<h3>Biaya Pendaftaran (Satu Kali)</h3>\r\n<table>\r\n    <tr>\r\n        <th>Komponen</th>\r\n        <th>Biaya</th>\r\n    </tr>\r\n    <tr>\r\n        <td>Formulir Pendaftaran</td>\r\n        <td>Rp 100.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Uang Pangkal</td>\r\n        <td>Rp 3.000.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Seragam (3 stel)</td>\r\n        <td>Rp 750.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Perlengkapan Asrama</td>\r\n        <td>Rp 500.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Buku & Kitab</td>\r\n        <td>Rp 400.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td><strong>Total</strong></td>\r\n        <td><strong>Rp 4.750.000</strong></td>\r\n    </tr>\r\n</table>\r\n\r\n<h3>Biaya Bulanan</h3>\r\n<table>\r\n    <tr>\r\n        <th>Komponen</th>\r\n        <th>Biaya</th>\r\n    </tr>\r\n    <tr>\r\n        <td>SPP Pendidikan</td>\r\n        <td>Rp 800.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Biaya Asrama</td>\r\n        <td>Rp 400.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td>Biaya Makan</td>\r\n        <td>Rp 600.000</td>\r\n    </tr>\r\n    <tr>\r\n        <td><strong>Total Bulanan</strong></td>\r\n        <td><strong>Rp 1.800.000</strong></td>\r\n    </tr>\r\n</table>\r\n\r\n<h3>Catatan</h3>\r\n<ul>\r\n    <li>Tersedia beasiswa untuk santri berprestasi dan kurang mampu</li>\r\n    <li>Pembayaran dapat dicicil maksimal 3 kali</li>\r\n    <li>Biaya dapat berubah sesuai kebijakan yayasan</li>\r\n</ul>\r\n', 'fas fa-money-bill-wave', 'financial', 3, 1, 1, NULL, '2025-12-16 18:55:47', '2025-12-16 18:55:47'),
(4, 'Fasilitas Pesantren', 'fasilitas-pesantren', '\r\n<h2>Fasilitas Pondok Pesantren</h2>\r\n\r\n<p>Kami menyediakan fasilitas lengkap untuk mendukung kegiatan belajar mengajar dan kenyamanan santri.</p>\r\n\r\n<h3>Fasilitas Utama</h3>\r\n<ul>\r\n    <li><strong>Masjid:</strong> Masjid utama dengan kapasitas 500 jamaah</li>\r\n    <li><strong>Asrama Putra:</strong> 20 kamar dengan kapasitas 10 santri per kamar</li>\r\n    <li><strong>Asrama Putri:</strong> 15 kamar dengan kapasitas 10 santri per kamar</li>\r\n    <li><strong>Gedung Sekolah:</strong> 24 ruang kelas ber-AC</li>\r\n    <li><strong>Laboratorium:</strong> Lab IPA, Lab Komputer, Lab Bahasa</li>\r\n</ul>\r\n\r\n<h3>Fasilitas Pendukung</h3>\r\n<ul>\r\n    <li>Perpustakaan dengan 5000+ koleksi buku</li>\r\n    <li>Lapangan olahraga (futsal, basket, voli)</li>\r\n    <li>Aula serbaguna</li>\r\n    <li>Koperasi santri</li>\r\n    <li>Kantin</li>\r\n    <li>Klinik kesehatan</li>\r\n    <li>Wifi area</li>\r\n</ul>\r\n', 'fas fa-building', 'facility', 4, 1, 1, NULL, '2025-12-16 18:55:47', '2025-12-16 18:55:47'),
(5, 'Tentang Pesantren', 'tentang-pesantren', '\r\n<h2>Tentang Pondok Pesantren</h2>\r\n\r\n<p>Pondok Pesantren Digital merupakan lembaga pendidikan Islam yang memadukan kurikulum pesantren tradisional dengan pendidikan modern.</p>\r\n\r\n<h3>Visi</h3>\r\n<p>Menjadi pondok pesantren unggulan yang mencetak generasi Qurani, berilmu, berakhlak mulia, dan berdaya saing global.</p>\r\n\r\n<h3>Misi</h3>\r\n<ul>\r\n    <li>Menyelenggarakan pendidikan Islam yang berkualitas</li>\r\n    <li>Membentuk santri yang hafal Al-Quran</li>\r\n    <li>Mengembangkan kemampuan akademik dan non-akademik</li>\r\n    <li>Menanamkan nilai-nilai akhlakul karimah</li>\r\n    <li>Mempersiapkan santri menghadapi tantangan zaman</li>\r\n</ul>\r\n\r\n<h3>Sejarah Singkat</h3>\r\n<p>Didirikan pada tahun 2010, Pondok Pesantren Digital telah menghasilkan ribuan alumni yang tersebar di berbagai bidang. Pesantren ini menerapkan sistem pendidikan holistik yang mengintegrasikan ilmu agama dan ilmu pengetahuan modern.</p>\r\n\r\n<h3>Akreditasi</h3>\r\n<ul>\r\n    <li>MTs: Akreditasi A</li>\r\n    <li>MA: Akreditasi A</li>\r\n    <li>SMK: Akreditasi A</li>\r\n</ul>\r\n', 'fas fa-info-circle', 'general', 5, 1, 1, NULL, '2025-12-16 18:55:47', '2025-12-16 18:55:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_01_000001_create_roles_table', 1),
(6, '2024_01_01_000002_create_teachers_table', 1),
(7, '2024_01_01_000003_create_classes_table', 1),
(8, '2024_01_01_000004_create_santri_table', 1),
(9, '2024_01_01_000005_create_subjects_table', 1),
(10, '2024_01_01_000006_create_schedules_table', 1),
(11, '2024_01_01_000007_create_attendances_table', 1),
(12, '2024_01_01_000008_create_assessments_table', 1),
(13, '2024_01_01_000009_create_payments_table', 1),
(14, '2024_01_01_000010_create_announcements_table', 1),
(15, '2024_01_01_000011_create_audit_logs_table', 1),
(16, '2024_01_01_000020_create_content_settings_table', 1),
(17, '2024_01_01_000021_create_info_pages_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `month` tinyint(4) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `payment_date` date NOT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `payment_method` enum('cash','transfer','other') NOT NULL DEFAULT 'cash',
  `notes` text DEFAULT NULL,
  `recorded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `frequency` enum('monthly','yearly','once','optional') NOT NULL DEFAULT 'monthly',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `code`, `amount`, `description`, `frequency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SPP Bulanan', 'SPP', 500000.00, 'Sumbangan Pembinaan Pendidikan bulanan', 'monthly', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(2, 'Biaya Pendaftaran', 'DAFTAR', 1500000.00, 'Biaya pendaftaran santri baru', 'once', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(3, 'Biaya Seragam', 'SERAGAM', 750000.00, 'Biaya seragam lengkap', 'once', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(4, 'Biaya Kitab', 'KITAB', 350000.00, 'Biaya kitab dan buku pelajaran', 'yearly', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(5, 'Infaq Pembangunan', 'INFAQ', 0.00, 'Infaq sukarela untuk pembangunan', 'optional', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(6, 'Biaya Makan', 'MAKAN', 300000.00, 'Biaya makan bulanan', 'monthly', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(7, 'Biaya Asrama', 'ASRAMA', 200000.00, 'Biaya asrama bulanan', 'monthly', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'Full system access with all permissions', '[\"*\"]', '2025-12-15 03:53:37', '2025-12-15 03:53:37'),
(2, 'Admin', 'admin', 'Administrative access to most features', '[\"users.view\",\"users.create\",\"users.edit\",\"users.delete\",\"santri.view\",\"santri.create\",\"santri.edit\",\"santri.delete\",\"teachers.view\",\"teachers.create\",\"teachers.edit\",\"teachers.delete\",\"classes.view\",\"classes.create\",\"classes.edit\",\"classes.delete\",\"subjects.view\",\"subjects.create\",\"subjects.edit\",\"subjects.delete\",\"schedules.view\",\"schedules.create\",\"schedules.edit\",\"schedules.delete\",\"attendance.view\",\"attendance.create\",\"attendance.edit\",\"assessments.view\",\"assessments.create\",\"assessments.edit\",\"payments.view\",\"payments.create\",\"payments.edit\",\"payments.delete\",\"announcements.view\",\"announcements.create\",\"announcements.edit\",\"announcements.delete\",\"reports.view\"]', '2025-12-15 03:53:37', '2025-12-15 03:53:37'),
(3, 'Ustadz/Ustadzah', 'teacher', 'Teacher access for classes and assessments', '[\"santri.view\",\"classes.view\",\"schedules.view\",\"attendance.view\",\"attendance.create\",\"assessments.view\",\"assessments.create\",\"assessments.edit\",\"announcements.view\"]', '2025-12-15 03:53:38', '2025-12-15 03:53:38'),
(4, 'Santri', 'student', 'Student access to view own data', '[\"profile.view\",\"profile.edit\",\"schedules.view\",\"assessments.view\",\"payments.view\",\"announcements.view\"]', '2025-12-15 03:53:38', '2025-12-15 03:53:38'),
(5, 'Wali Santri', 'parent', 'Parent/Guardian access to view child data', '[\"profile.view\",\"santri.view\",\"attendance.view\",\"assessments.view\",\"payments.view\",\"announcements.view\"]', '2025-12-15 03:53:38', '2025-12-15 03:53:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_phone` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_address` text DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL,
  `status` enum('active','graduated','dropout','transferred') NOT NULL DEFAULT 'active',
  `photo` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri_attendances`
--

CREATE TABLE `santri_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','sick','permitted','absent') NOT NULL DEFAULT 'present',
  `notes` text DEFAULT NULL,
  `recorded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `day` tinyint(4) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room` varchar(255) DEFAULT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` enum('diniyah','formal','tahfidz','extra') NOT NULL DEFAULT 'diniyah',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `description`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FQH', 'Fiqih', 'Ilmu Fiqih dan Hukum Islam', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(2, 'AQD', 'Aqidah', 'Ilmu Tauhid dan Aqidah', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(3, 'AKH', 'Akhlak', 'Budi Pekerti dan Akhlak Mulia', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(4, 'ARB', 'Bahasa Arab', 'Nahwu, Shorof, dan Praktik', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(5, 'TJW', 'Tajwid', 'Ilmu Tajwid Al-Quran', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(6, 'TFS', 'Tafsir', 'Tafsir Al-Quran', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(7, 'HDS', 'Hadits', 'Ilmu Hadits dan Musthalah', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(8, 'SKI', 'Sejarah Islam', 'Tarikh dan Sirah Nabawiyah', 'diniyah', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(9, 'THF', 'Tahfidz Al-Quran', 'Hafalan Al-Quran', 'tahfidz', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(10, 'MRJ', 'Muraja\'ah', 'Pengulangan Hafalan', 'tahfidz', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(11, 'MTK', 'Matematika', 'Pelajaran Matematika', 'formal', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(12, 'IPA', 'IPA', 'Ilmu Pengetahuan Alam', 'formal', 'active', '2025-12-15 03:53:39', '2025-12-15 03:53:39'),
(13, 'IPS', 'IPS', 'Ilmu Pengetahuan Sosial', 'formal', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(14, 'BIN', 'Bahasa Indonesia', 'Pelajaran Bahasa Indonesia', 'formal', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(15, 'BIG', 'Bahasa Inggris', 'Pelajaran Bahasa Inggris', 'formal', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(16, 'KLG', 'Kaligrafi', 'Seni Khat dan Kaligrafi', 'extra', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40'),
(17, 'PRM', 'Pramuka', 'Kepanduan Pramuka', 'extra', 'active', '2025-12-15 03:53:40', '2025-12-15 03:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_attendances`
--

CREATE TABLE `teacher_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` enum('present','sick','permitted','absent') NOT NULL DEFAULT 'present',
  `notes` text DEFAULT NULL,
  `recorded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `avatar`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super Admin', 'superadmin@ponpes.sch.id', NULL, NULL, NULL, 'active', NULL, '$2y$10$5BtvoUM/m8Y7/qjrXxWaSeqK9qhWkOV6mzrOUjSwJWu6IkY86DWcq', NULL, '2025-12-15 03:53:39', '2025-12-20 17:27:39', NULL),
(2, 2, 'Administrator', 'admin@ponpes.sch.id', NULL, NULL, NULL, 'active', NULL, '$2y$10$cZevrrbddbdaJSF7O4UiTu32qe3MUGoqE5EjwRYZBkG2pMNuV0Ge.', NULL, '2025-12-15 03:53:39', '2025-12-20 17:27:39', NULL),
(3, 3, 'Ustadz Ahmad', 'ustadz@ponpes.sch.id', NULL, NULL, NULL, 'active', NULL, '$2y$10$UbOz2JJzW.RsEuHFcStxWOQukQsIQaFuHnhsfEhlAlOhTpWUCctz2', NULL, '2025-12-15 03:53:39', '2025-12-20 17:27:39', NULL),
(4, 4, 'Muhammad Santri', 'santri@ponpes.sch.id', NULL, NULL, NULL, 'active', NULL, '$2y$10$cgkbFIKLIr80QJaQ7ira/.e5ogq4ptOgSV627LDWBpT4a0GAHCeAS', NULL, '2025-12-15 03:53:39', '2025-12-20 17:27:40', NULL),
(5, 4, 'Salman Alfarizi', 'safari@gmail.com', NULL, NULL, NULL, 'active', NULL, '$2y$10$mBh0RQhbe0waadY6nxrPBersZOsNL1ygH61nvSRbBUQx.MdOA2VQ.', NULL, '2025-12-24 21:35:58', '2025-12-24 21:35:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_author_id_foreign` (`author_id`),
  ADD KEY `announcements_status_published_at_index` (`status`,`published_at`);

--
-- Indeks untuk tabel `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessments_subject_id_foreign` (`subject_id`),
  ADD KEY `assessments_teacher_id_foreign` (`teacher_id`),
  ADD KEY `assessments_santri_id_subject_id_semester_academic_year_index` (`santri_id`,`subject_id`,`semester`,`academic_year`);

--
-- Indeks untuk tabel `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_logs_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `audit_logs_user_id_created_at_index` (`user_id`,`created_at`);

--
-- Indeks untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_teacher_id_foreign` (`teacher_id`);

--
-- Indeks untuk tabel `content_settings`
--
ALTER TABLE `content_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_settings_key_unique` (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `info_pages`
--
ALTER TABLE `info_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `info_pages_slug_unique` (`slug`),
  ADD KEY `info_pages_created_by_foreign` (`created_by`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_receipt_number_unique` (`receipt_number`),
  ADD KEY `payments_payment_type_id_foreign` (`payment_type_id`),
  ADD KEY `payments_recorded_by_foreign` (`recorded_by`),
  ADD KEY `payments_santri_id_payment_type_id_month_year_index` (`santri_id`,`payment_type_id`,`month`,`year`);

--
-- Indeks untuk tabel `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_types_code_unique` (`code`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `santri_nis_unique` (`nis`),
  ADD KEY `santri_user_id_foreign` (`user_id`),
  ADD KEY `santri_class_id_foreign` (`class_id`);

--
-- Indeks untuk tabel `santri_attendances`
--
ALTER TABLE `santri_attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_santri_attendance` (`santri_id`,`date`),
  ADD KEY `santri_attendances_recorded_by_foreign` (`recorded_by`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_class_schedule` (`class_id`,`day`,`start_time`,`academic_year`),
  ADD UNIQUE KEY `unique_teacher_schedule` (`teacher_id`,`day`,`start_time`,`academic_year`),
  ADD KEY `schedules_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_code_unique` (`code`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_nip_unique` (`nip`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_teacher_attendance` (`teacher_id`,`date`),
  ADD KEY `teacher_attendances_recorded_by_foreign` (`recorded_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `content_settings`
--
ALTER TABLE `content_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `info_pages`
--
ALTER TABLE `info_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `santri_attendances`
--
ALTER TABLE `santri_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assessments_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assessments_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `info_pages`
--
ALTER TABLE `info_pages`
  ADD CONSTRAINT `info_pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_recorded_by_foreign` FOREIGN KEY (`recorded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `santri_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `santri_attendances`
--
ALTER TABLE `santri_attendances`
  ADD CONSTRAINT `santri_attendances_recorded_by_foreign` FOREIGN KEY (`recorded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `santri_attendances_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD CONSTRAINT `teacher_attendances_recorded_by_foreign` FOREIGN KEY (`recorded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teacher_attendances_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
