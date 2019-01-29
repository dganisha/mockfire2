-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jan 2019 pada 18.09
-- Versi server: 5.6.40-log
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `lengkome_mockfire`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_22_155606_CreateTableProject', 1),
(4, '2018_07_23_030247_AddColumnEndpointUser', 1),
(15, '2018_07_31_090450_CreateColumnFieldForSkema', 4),
(16, '2018_07_31_155749_CreateTableOptiongrup', 4),
(17, '2018_07_30_211814_CreateTableTipeOpsiSkema', 5),
(18, '2018_08_06_095238_CreateRoleUser', 6),
(19, '2018_08_06_095509_CreateColumnRoleinUser', 7),
(20, '2018_07_24_042350_CreateTableResource', 8),
(22, '2018_07_24_042747_CreateTableSchema', 9),
(24, '2018_09_05_083111_CreateTableUserProjects', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dhimasganisha@gmail.com', '$2y$10$zS5Ycj2H.iNQUEiIlsxdJ.303DKNulASgch4objXkr17bzuzJcMTK', '2018-08-24 01:52:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name_project` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `endpoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name_project`, `created_at`, `updated_at`, `endpoint`) VALUES
(11, 1, 'mockfire4', '2018-08-06 06:17:19', '2018-08-06 06:17:19', 'j997Hh6NVILRy6U'),
(12, 1, 'mockfire1', '2018-08-09 02:49:39', '2018-08-09 02:49:39', 'aW8w8htaxmbmRmp'),
(13, 6, 'tes', '2018-08-09 03:31:35', '2018-08-09 03:31:35', 'd1qaGP2l85ZpKaP'),
(19, 1, 'bangunindo', '2018-08-23 01:06:38', '2018-08-23 01:06:38', 'c9n2N9MculJrq2K'),
(20, 1, 'halohalo', '2018-08-23 01:07:01', '2018-08-23 01:07:01', 'uON1nhslUxgaHuJ'),
(21, 1, 'dpayer', '2018-08-24 09:58:19', '2018-08-24 09:58:19', 'Ou3zunOppvzITAZ'),
(22, 1, 'TesCoba', '2018-09-03 05:58:00', '2018-09-03 05:58:00', 'BFctPo3hSMyDNAd'),
(25, 1, 'TES', '2018-09-03 06:03:23', '2018-09-03 06:03:23', 'VSv5NOOcfko3VaV'),
(26, 1, 'wi', '2018-09-03 06:04:51', '2018-09-03 06:04:51', 'wA4RTh6SVvryENL'),
(32, 12, 'Giy', '2018-09-07 13:58:56', '2018-09-07 13:58:56', 'fgzYnbRkdcxY8D3'),
(33, 1, 'dpayer', '2018-09-17 04:18:23', '2018-09-17 04:18:23', '9npZf65fqr1qWTX'),
(35, 8, 'Acil', '2018-09-20 09:14:40', '2018-09-20 09:14:40', 'clU7aHH8JES1odA'),
(36, 15, 'apa', '2018-09-22 12:58:52', '2018-09-22 12:58:52', 'LQ5Wdv2Tq5i6DL1'),
(37, 17, 'HelpDesk', '2018-11-10 09:51:50', '2018-11-10 09:51:50', 'tmkGr9il06IWYWB'),
(38, 20, 'bdjd', '2018-11-29 14:24:24', '2018-11-29 14:24:24', '6mbI6MBg4z6odr6'),
(39, 22, 'Gh', '2018-12-22 17:12:15', '2018-12-22 17:12:15', 'kXfDzcsaY3epbuX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `name_resource` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('POST','GET','PUT','DELETE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resources`
--

INSERT INTO `resources` (`id`, `project_id`, `name_resource`, `type`, `created_at`, `updated_at`) VALUES
(1536025851, 11, 'Manusia', NULL, '2018-09-04 01:50:51', '2018-09-04 01:50:51'),
(1536110564, 11, 'users', NULL, '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(1536114205, 11, 'pulsa', NULL, '2018-09-05 02:23:25', '2018-09-05 02:23:25'),
(1538203744, 33, 'Users', NULL, '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(1545498768, 39, 'Jajajaj', NULL, '2018-12-22 17:12:48', '2018-12-22 17:12:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema`
--

CREATE TABLE `skema` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `name_schema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_schema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skema`
--

INSERT INTO `skema` (`id`, `resource_id`, `name_schema`, `type_schema`, `parent_id`, `child_id`, `field`, `created_at`, `updated_at`) VALUES
(285, 1536025851, 'id', 'ObjectID', '', '', 'field1', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(286, 1536025851, 'Name', 'array', '', '', 'field2', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(287, 1536025851, 'FirstName', 'firstNameMale', '286', '', 'field2', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(288, 1536025851, 'LastName', 'lastName', '286', '', 'field2', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(289, 1536025851, 'Address', 'array', '', '', 'field3', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(290, 1536025851, 'Address1', 'streetAddress', '289', '', 'field3', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(291, 1536025851, 'Address2', 'secondaryAddress', '289', '', 'field3', '2018-09-05 01:08:40', '2018-09-05 01:08:40'),
(292, 1536025851, 'Phone', 'phoneNumber', '', '', 'field4', '2018-09-05 01:08:41', '2018-09-05 01:08:41'),
(293, 1536025851, 'Department', 'departmentName', '', '', 'field5', '2018-09-05 01:08:41', '2018-09-05 01:08:41'),
(294, 1536110564, 'id', 'ObjectID', '', '', 'field1', '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(295, 1536110564, 'username', 'firstName', '', '', 'field2', '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(296, 1536110564, 'Name', 'array', '', '', 'field3', '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(297, 1536110564, 'FirstName', 'firstNameMale', '296', '', 'field3', '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(298, 1536110564, 'LastName', 'lastName', '296', '', 'field3', '2018-09-05 01:22:44', '2018-09-05 01:22:44'),
(299, 1536114205, 'id', 'ObjectID', '', '', 'field1', '2018-09-05 02:23:25', '2018-09-05 02:23:25'),
(300, 1536114205, 'content', 'array', '', '', 'field2', '2018-09-05 02:23:25', '2018-09-05 02:23:25'),
(301, 1536114205, 'trxid', 'randomNumber', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(302, 1536114205, 'code', 'postcode', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(303, 1536114205, 'phone', 'phoneNumber', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(304, 1536114205, 'status', 'randomNumber', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(305, 1536114205, 'sn', 'boolean', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(306, 1536114205, 'note', 'words', '300', '', 'field2', '2018-09-05 02:23:26', '2018-09-05 02:23:26'),
(322, 1538203744, 'id', 'ObjectID', '', NULL, 'field1', '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(323, 1538203744, 'name', 'array', '', NULL, 'field2', '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(324, 1538203744, 'FirstName', 'firstName', '323', NULL, 'field2', '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(325, 1538203744, 'LastName', 'lastName', '323', NULL, 'field2', '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(326, 1538203744, 'Address', 'streetAddress', '', NULL, 'field3', '2018-09-29 06:49:04', '2018-09-29 06:49:04'),
(327, 1545498768, 'id', 'ObjectID', '', NULL, 'field1', '2018-12-22 17:12:48', '2018-12-22 17:12:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skemaopsi`
--

CREATE TABLE `skemaopsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `skemaopsigroup_id` int(10) UNSIGNED NOT NULL,
  `name_opsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_opsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skemaopsi`
--

INSERT INTO `skemaopsi` (`id`, `skemaopsigroup_id`, `name_opsi`, `value_opsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'postcode', 'Zip Code', NULL, NULL),
(2, 1, 'city', 'City', NULL, NULL),
(3, 1, 'streetAddress', 'Street Address', NULL, NULL),
(4, 1, 'secondaryAddress', 'Secondary Address', NULL, NULL),
(6, 1, 'country', 'Country', NULL, NULL),
(7, 1, 'state', 'State', NULL, NULL),
(8, 1, 'stateAbbr', 'State abbreviated', NULL, NULL),
(9, 1, 'latitude', 'Latitude', NULL, NULL),
(10, 1, 'longitude', 'Longitude', NULL, NULL),
(11, 2, 'colorName', 'Color', NULL, NULL),
(12, 2, 'departmentName', 'Department', NULL, NULL),
(21, 3, 'monthNameGenitive', 'Month', NULL, NULL),
(23, 4, 'image', 'Image', NULL, NULL),
(25, 5, 'firstNameMale', 'First Name Male', NULL, NULL),
(26, 5, 'firstName', 'First Name', NULL, NULL),
(27, 5, 'lastName', 'Last Name', NULL, NULL),
(28, 5, 'name', 'Full Name', NULL, NULL),
(29, 5, 'jobTitle', 'Job Title', NULL, NULL),
(30, 5, 'firstNameFemale', 'First Name Female', NULL, NULL),
(31, 5, 'title', 'Title', NULL, NULL),
(35, 6, 'phoneNumber', 'Phone Number', NULL, NULL),
(36, 7, 'randomNumber', 'Random Digit', NULL, NULL),
(37, 7, 'uuid', 'UUID', NULL, NULL),
(38, 7, 'boolean', 'Boolean', NULL, NULL),
(39, 7, 'word', 'Word', NULL, NULL),
(40, 7, 'words', 'Words', NULL, NULL),
(41, 7, 'locale', 'Locale', NULL, NULL),
(49, 9, 'object', 'Object', NULL, NULL),
(50, 10, 'array', 'Array', NULL, NULL),
(51, 7, 'nik', 'NIK', NULL, NULL),
(52, 7, 'paragraphs', 'Paragraphs', '2018-08-25 12:17:06', '2018-08-25 12:29:29'),
(53, 1, 'streetName', 'Street Name', '2018-08-25 12:18:13', '2018-08-25 12:18:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skemaopsigroup`
--

CREATE TABLE `skemaopsigroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_grup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skemaopsigroup`
--

INSERT INTO `skemaopsigroup` (`id`, `option_grup`, `created_at`, `updated_at`) VALUES
(1, 'ADDRESS', NULL, NULL),
(2, 'DEPARTMENT', NULL, NULL),
(3, 'DATE', NULL, NULL),
(4, 'IMAGE', NULL, NULL),
(5, 'NAME', NULL, NULL),
(6, 'PHONE', NULL, NULL),
(7, 'NUMBER', NULL, NULL),
(8, 'SYSTEM', NULL, NULL),
(9, 'OBJECT', NULL, NULL),
(10, 'ARRAY', NULL, NULL),
(11, 'INTERNET', '2018-08-25 12:41:19', '2018-08-25 12:48:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userprojects`
--

CREATE TABLE `userprojects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `userprojects`
--

INSERT INTO `userprojects` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(9, 12, 32, '2018-09-07 13:58:56', '2018-09-07 13:58:56'),
(10, 1, 33, '2018-09-17 04:18:24', '2018-09-17 04:18:24'),
(12, 8, 33, '2018-09-20 02:04:32', '2018-09-20 02:04:32'),
(13, 8, 35, '2018-09-20 09:14:40', '2018-09-20 09:14:40'),
(14, 15, 36, '2018-09-22 12:58:52', '2018-09-22 12:58:52'),
(15, 17, 37, '2018-11-10 09:51:50', '2018-11-10 09:51:50'),
(16, 20, 38, '2018-11-29 14:24:24', '2018-11-29 14:24:24'),
(17, 22, 39, '2018-12-22 17:12:15', '2018-12-22 17:12:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Administrator','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dhiemas Ganisha', 'dhimasganisha@gmail.com', '$2y$10$84lFAkDMKYm.Tx/BZaMA8Od.7xTkmfqbYtd/nghnZn3O.0jPXpvBG', 'Administrator', 'sopwLNQrqafsNnXDlJ7tW5p7EWPSvw3u9t2tegR5cRyunjtKtfNNt5yZOHto', '2018-07-29 19:40:45', '2018-07-29 19:40:45'),
(6, 'Akun Demo', 'demo@gmail.com', '$2y$10$SaVxuZ0IuIm0Xza3LQZgtePWqSTtUW4.tu/hFtGfwLfFp7Bv.mjgq', 'User', 'WSK3pAYpT54kyb9cz1nl2Ay8zUmtv8kN8vTdwwr7LgldNsFUABP5MNPeF8AU', '2018-08-01 07:25:07', '2018-08-01 07:25:07'),
(7, 'tes', 'tes@gmail.com', '$2y$10$njaP2FvVyk7jXlO41q8LreRP067nJGfPdZL3Ofgnlp25aDYvaitCq', 'User', NULL, '2018-08-10 14:12:53', '2018-08-10 14:12:53'),
(8, 'Admin Web', 'admin@admin.com', '$2y$10$Mwpn7lVx1Iryx9V7oCXEL.8sifLv9mlPg5FkTkILfqBwb8rivEBku', 'Administrator', 'e3ZRixkv2Lz376kcAVBjgymJK7ogK4igf6OxN5S4P8JAGeVSVzj2TP1y3mAI', '2018-08-25 12:49:38', '2018-08-25 12:49:38'),
(11, 'DhiemasG', 'dhiemasganisha9a@gmail.com', '$2y$10$R4vJ4lgd/r7P2iqaVyU5jO.IZL5YE62B3RxLQawCDtPBEaNbrXuKi', 'User', NULL, '2018-09-07 05:37:10', '2018-09-07 05:37:10'),
(12, 'SultanNoLimit', 'sultannolimit5@gmail.com', '$2y$10$r5dL2xsQCvzEkG5EZY/ZhulIGEXScgsZlcex45ik529Jk/PFbAn9y', 'User', NULL, '2018-09-07 13:58:14', '2018-09-07 13:58:14'),
(14, 'demo', 'ayan@gmail.com', '$2y$10$vr/73kn.UdTf/6cDmps.5Ozrjsk22Vv1SRhMjXx.iIR.7Iw56VedW', 'User', NULL, '2018-09-22 12:57:52', '2018-09-22 12:57:52'),
(15, 'demo123', 'demo123@gmail.com', '$2y$10$zlZ3NV7ArSrCKvBkhMt9Me.YpQI08ZyPeBm1wSO98MPNa518MgYiC', 'User', 'tSQlVbEIrthBPelSzDxIOP05cejnNmkQdKX15WJA6OF79c5hpFgpm0Bo4qBp', '2018-09-22 12:58:27', '2018-09-22 12:58:27'),
(16, 'ekoshow', 'ecometal22@gmail.com', '$2y$10$LC98zBR/QOah4x/Oxnb10OfG1RHUtPHZgDgMavO8eqrxkUzXCm7nS', 'User', 'TGjQzCvXnXA6mpyjlXbsUFA1cJKHb1bi8yrmRJtAaop3lEg0UNfzk0m8Tzte', '2018-11-05 15:52:28', '2018-11-05 15:52:28'),
(17, 'Fadlan', 'fadlanseptian23@gmail.com', '$2y$10$QKeFVZfwytX0qy.iEbvFjuSpMo51IqXiDmtVcOR7Kf4LD/dxc1qOa', 'User', NULL, '2018-11-10 09:51:16', '2018-11-10 09:51:16'),
(18, 'CharlesPep', 'info@askimsik.se', '$2y$10$tzac/wCUWfHQxNhyMzmMReVJAUvmwzHoZk/qQTUVeC4.ewzFNtnUK', 'User', NULL, '2018-11-13 12:57:52', '2018-11-13 12:57:52'),
(19, 'Anisoptera', 'amersonjuniepe0@yahoo.com', '$2y$10$UTMkFsuSz3ouKaryzNpBtu22gKu/szJs7mgwnLRwlYFljErNF9h8q', 'User', NULL, '2018-11-29 00:41:13', '2018-11-29 00:41:13'),
(20, 'bastian', 'gbastianvinoanggara@gmail.com', '$2y$10$zJjpQ6Y7csqyuHFG/BY9I.xzW09qCq1mLzXRvmTsRric186rtTaTa', 'User', NULL, '2018-11-29 14:23:37', '2018-11-29 14:23:37'),
(21, 'Ihsan Mukhlis', 'ihsanmukhlis41@gmail.com', '$2y$10$B.Fu/vexHYdvVlvtxHGcMecc3HyNWnCctrCsp3a8v6PqvOoKpNOqq', 'User', 'VPfDrRRYsDfO5Oh49QFgJmqetGJdy0EuhECt3tGsYYo5Yzm74TPJJtwxYXGw', '2018-12-21 09:06:15', '2018-12-21 09:06:15'),
(22, 'Qndika', 'kunop16@gmail.com', '$2y$10$iDYqov5FZKxGRQl095a98.mDpdjEItglmwbFv4jlRC94DH/vZrrz.', 'User', NULL, '2018-12-22 17:11:54', '2018-12-22 17:11:54');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_project_id_foreign` (`project_id`);

--
-- Indeks untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skema_resource_id_foreign` (`resource_id`);

--
-- Indeks untuk tabel `skemaopsi`
--
ALTER TABLE `skemaopsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skemaopsi_skemaopsigroup_id_foreign` (`skemaopsigroup_id`);

--
-- Indeks untuk tabel `skemaopsigroup`
--
ALTER TABLE `skemaopsigroup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userprojects`
--
ALTER TABLE `userprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userprojects_user_id_foreign` (`user_id`),
  ADD KEY `userprojects_project_id_foreign` (`project_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1545498769;

--
-- AUTO_INCREMENT untuk tabel `skema`
--
ALTER TABLE `skema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT untuk tabel `skemaopsi`
--
ALTER TABLE `skemaopsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `skemaopsigroup`
--
ALTER TABLE `skemaopsigroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `userprojects`
--
ALTER TABLE `userprojects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skema`
--
ALTER TABLE `skema`
  ADD CONSTRAINT `skema_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skemaopsi`
--
ALTER TABLE `skemaopsi`
  ADD CONSTRAINT `skemaopsi_skemaopsigroup_id_foreign` FOREIGN KEY (`skemaopsigroup_id`) REFERENCES `skemaopsigroup` (`id`);

--
-- Ketidakleluasaan untuk tabel `userprojects`
--
ALTER TABLE `userprojects`
  ADD CONSTRAINT `userprojects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `userprojects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;
