-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2024 pada 16.16
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
-- Database: `insafilm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(110) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(500) NOT NULL,
  `tanggal_terbit` varchar(500) NOT NULL,
  `jumlah_halaman` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `synopsis` varchar(6000) NOT NULL,
  `gendre` varchar(202) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`isbn`, `photo`, `judul`, `penulis`, `penerbit`, `tanggal_terbit`, `jumlah_halaman`, `kategori`, `synopsis`, `gendre`, `bahasa`, `link`, `created_at`) VALUES
('1', '39813b078c555c3d58f97ff9fde03a04-cover-buku-anak.jpg', 'naruto saepudin', 'aa,qq', 'Gramedia Widiasarana Indonesia', '02/15/2024', '1', 'sains', 'Synopsis', 'petualangan', 'indonesia xz', '39813b078c555c3d58f97ff9fde03a04-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:17:55'),
('1112', 'cb8205e48791a876d07034a5908d2a0b-cover-buku-bagus.jpg', 'naruto saepudin', 'wwmwm', 'Gramedia Widiasarana Indonesia', '02/14/2024', '368', 'sains', 'masii', 'drama, thriller', 'indonesia xz', 'cb8205e48791a876d07034a5908d2a0b-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:35:28'),
('1112ss', '11b52168fb9a6d6e18fa6476e77dd129-cover-buku-anak.jpg', 'naruto saepudin', 'sss,aa,ss', 'Gramedia Widiasarana Indonesia', '02/14/2024', '1112ss', 'novel', 'ss', 'romansa', 'indonesia xz', 'ac5615f05c2b4ad05eeb38278da84fa0-Document (1).pdf', '2024-02-07 13:36:42'),
('12455sjj', 'ecc2411436210c1f5731bc903ab61901-cover-buku-anak.jpg', 'naruto saepudin', 'sjsjs', 'tokyo tv', '11/14/2023', '12455sjj', 'fiksi', 'simple oke', 'fantasi, romansa', 'jepang', 'f8599e4702f9c4a5679368e0e1bfa3a3-kegiatan PPM STMIK JABAR Angkatan XXVI Tahun 2023.pdf', '2024-02-07 10:20:54'),
('3', 'b12e218ce4e38890c85c4a438a27b1f4-cover-buku-anak.jpg', 'naruto saepudin', 'sss,sssc', 'Gramedia Widiasarana Indonesia', '02/15/2024', '368', 'sains', 'sss', 'sains fiksi', 'indonesia xz', 'b12e218ce4e38890c85c4a438a27b1f4-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:19:13'),
('3s', '20c88fd60c7f5e11893ecc5c8a553bd2-cover-buku-anak.jpg', 'naruto saepudin', 'ssss,aa', 'Gramedia Widiasarana Indonesia', '02/15/2024', '368', 'sains', 'sssx', 'romansa', 'indonesia xz', '20c88fd60c7f5e11893ecc5c8a553bd2-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:20:01'),
('4', '11c8fded42ce660de1ca350db8dbf2ba-cover-buku-anak.jpg', 'naruto saepudin', 'aaa,xx', 'Gramedia Widiasarana Indonesia', '02/04/2024', '368', 'novel', 'okww', 'romansa', 'indonesia xz', '11c8fded42ce660de1ca350db8dbf2ba-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:21:35'),
('44', '6914f7d1aa05f40b6b8cbaeb114752dd-cover-buku-anak.jpg', 'naruto saepudin', 'wokkee', 'Gramedia Widiasarana Indonesia', '02/20/2024', '368', 'komik', 'sss', 'fantasi', 'indonesia xz', '6914f7d1aa05f40b6b8cbaeb114752dd-Document (1).pdf', '2024-02-07 13:23:01'),
('44s', '2a06f12424f3437fcae8a86ead6b261b-cover-buku-autobiografi.jpg', 'naruto saepudin', 'xxx,aa', 'Gramedia Widiasarana Indonesia', '02/29/2024', '368', 'sains', 'sas', 'sains fiksi', 'indonesia xz', '2a06f12424f3437fcae8a86ead6b261b-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:32:43'),
('4a', 'f65c2ccc40ee21b9b07f98d2f340709d-cover-buku-bincang-akhlak.jpg', 'naruto saepudin', 'joko ,ningrot', 'Gramedia Widiasarana Indonesia', '02/29/2024', '368', 'lain-lain', 'smsm', 'fantasi, sains fiksi', 'indonesia xz', 'f65c2ccc40ee21b9b07f98d2f340709d-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:33:30'),
('9786020523316', '323097ebfbbd658224a285af36ead439-cover-buku-anak.jpg', 'Haary poter', 'Chris Columbus,J. K. Rowling', 'Gramedia Widiasarana Indonesia', '06/09/2020', '368', 'novel', 'Novel karya J. S Khairen yang berjudul Melangkah bertemakan tentang petualangan di Indonesia. Tidak hanya itu, cerita dalam novel ini juga mengutamakan kisah pahlawan. Berbeda dari karya-karya yang sebelumnya, di novel ini Khairen memberi sedikit imajinasi yang ia tanamkan. Terdapat 36 episode dan 5 babak.', 'fantasi, petualangan, aksi, drama', 'indonesia', '323097ebfbbd658224a285af36ead439-32cfdae6854d4f17fc613a229fd44519-Artificially intelligent chatbots in digital mental health interventions  a review id.pdf', '2024-02-07 10:20:54'),
('9786020523316s', '70b32efe96bcb4c6205660ecaa8412bc-cover-buku-biografi.jpg', 'Haary poter', 'ss', 'Gramedia Widiasarana Indonesia', '06/16/2020', '368', 'fiksi', 'ssmms', 'misteri, petualangan, aksi', 'indonesia', '70b32efe96bcb4c6205660ecaa8412bc-Document (1).pdf', '2024-02-07 10:20:54'),
('aas', 'e44cb9d073070ef9f699a432e60cdc56-cover-buku-bahasa-arab.jpg', 'naruto saepudin', 'jan', 'Gramedia Widiasarana Indonesia', '02/29/2024', '368', 'fiksi', 'cokkk', 'misteri, petualangan', 'indonesia xz', 'e44cb9d073070ef9f699a432e60cdc56-admin,+19529-53454-1-CE.pdf', '2024-02-07 13:34:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(20) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `completed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start_date`, `end_date`, `description`, `completed`) VALUES
(26, 'zxcghj', 'bg-default', '2024-02-01 00:00:00', '2024-02-01 00:00:00', '', 1),
(27, 'chvxx', 'bg-success', '2024-02-14 00:00:00', '2024-02-14 00:00:00', '', 1),
(28, '   mmmm', 'bg-primary', '2024-02-09 00:00:00', '2024-02-09 00:00:00', '', 1),
(29, 'smsmms', 'bg-success', '2024-01-29 00:00:00', '2024-01-29 00:00:00', '', 1),
(30, 'sss', 'bg-info', '2024-02-05 00:00:00', '2024-02-05 00:00:00', '', 1),
(31, 'sssaa', 'bg-success', '2024-02-06 00:00:00', '2024-02-06 00:00:00', '', 1),
(32, 'ssss', 'bg-danger', '2024-01-30 00:00:00', '2024-01-30 00:00:00', '', 1),
(33, 'sssa', 'bg-info', '2024-02-05 00:00:00', '2024-02-05 00:00:00', '', 1),
(34, 'sss', 'bg-info', '2024-02-04 00:00:00', '2024-02-04 00:00:00', '', 1),
(35, '', 'bg-info', '2024-02-22 00:00:00', '2024-02-22 00:00:00', '', 1),
(36, 'xx', 'bg-info', '2024-02-22 00:00:00', '2024-02-22 00:00:00', '', 1),
(37, 'vvv', 'bg-info', '2024-01-30 00:00:00', '2024-01-30 00:00:00', '', 1),
(38, 'asa', 'bg-info', '2024-02-08 00:00:00', '2024-02-08 00:00:00', '', 0),
(39, 'cvb', 'bg-primary', '2024-02-07 00:00:00', '2024-02-07 00:00:00', '', 0),
(40, 'saas', 'bg-info', '2024-02-08 00:00:00', '2024-02-08 00:00:00', '', 0),
(41, 'ssss', 'bg-primary', '2024-02-01 00:00:00', '2024-02-01 00:00:00', '', 0),
(42, 'sss', 'bg-default', '2024-02-07 00:00:00', '2024-02-07 00:00:00', '', 0),
(43, 'msmsm', 'bg-info', '2024-02-06 00:00:00', '2024-02-06 00:00:00', '', 0),
(44, 'ssss', 'bg-default', '2024-02-05 00:00:00', '2024-02-05 00:00:00', '', 0),
(45, 'ssnsnsn', 'bg-danger', '2024-02-06 00:00:00', '2024-02-06 00:00:00', '', 0),
(46, 'sssd', 'bg-info', '2024-02-05 00:00:00', '2024-02-05 00:00:00', '', 0),
(47, 'nnnn', 'bg-success', '2024-02-05 00:00:00', '2024-02-05 00:00:00', '', 0),
(48, 'sssd', 'bg-primary', '2024-02-01 00:00:00', '2024-02-01 00:00:00', '', 0),
(49, 'sss', 'bg-info', '2024-02-13 00:00:00', '2024-02-13 00:00:00', '', 0),
(50, 'ssssa', 'bg-info', '2024-02-06 00:00:00', '2024-02-06 00:00:00', '', 0),
(51, 'mondok', 'bg-info', '2024-02-08 00:00:00', '2024-02-08 00:00:00', '', 0),
(52, 'dimana', 'bg-info', '2024-02-06 00:00:00', '2024-02-06 00:00:00', '', 0),
(53, 'wikkk', 'bg-info', '2024-02-07 00:00:00', '2024-02-07 00:00:00', '', 0),
(54, 'bebas', 'bg-success', '2024-02-13 00:00:00', '2024-02-13 00:00:00', '', 0),
(55, 'buku baru', 'bg-default', '2024-02-23 00:00:00', '2024-02-23 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
(1, 'indrasaepudin', 'insa@gmail.com', '123', '2024-02-07 11:01:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_event`
--

CREATE TABLE `tabel_event` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `color_status` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_event`
--

INSERT INTO `tabel_event` (`id`, `tanggal`, `event_title`, `color_status`, `description`, `created_at`) VALUES
(1, '0000-00-00', 'sss', 'bg-info', '', '2024-02-04 13:30:09'),
(2, '0000-00-00', 'wkwkkwk', 'bg-primary', '', '2024-02-04 13:30:53'),
(3, '2024-02-04', 'ssmsm', 'bg-info', '', '2024-02-04 13:33:05'),
(4, '2024-02-04', 'windroww', 'bg-primary', '', '2024-02-04 13:33:29'),
(5, '2024-02-04', 'sss', 'bg-danger', '', '2024-02-04 13:39:28'),
(6, '2024-02-04', 'ss', 'bg-success', '', '2024-02-04 13:41:58'),
(7, '2024-02-04', 'sasa', 'bg-danger', '', '2024-02-04 13:42:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tanggal`
--

CREATE TABLE `tabel_tanggal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_tanggal`
--

INSERT INTO `tabel_tanggal` (`id`, `tanggal`) VALUES
(14, '2024-02-05'),
(15, '2024-02-05'),
(16, '2024-01-30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_event`
--
ALTER TABLE `tabel_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_tanggal`
--
ALTER TABLE `tabel_tanggal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_event`
--
ALTER TABLE `tabel_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_tanggal`
--
ALTER TABLE `tabel_tanggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
