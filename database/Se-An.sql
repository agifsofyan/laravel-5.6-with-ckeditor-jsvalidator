-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2018 at 11:40 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Se-An`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Balanitis', 'balanitis', '2018-07-04 23:33:37', '2018-07-04 23:33:37'),
(2, 'Ejakulasi Dini', 'ejakulasi-dini', '2018-07-04 23:34:02', '2018-07-04 23:34:02'),
(3, 'Epididimitis', 'epididimitis', '2018-07-04 23:34:18', '2018-07-04 23:34:18'),
(4, 'Impotensi', 'impotensi', '2018-07-04 23:34:37', '2018-07-04 23:34:37'),
(5, 'Infeksi Kandung Kemih', 'infeksi-kandung-kemih', '2018-07-04 23:35:00', '2018-07-04 23:35:00'),
(6, 'Kulup Panjang', 'kulup-panjang', '2018-07-04 23:35:18', '2018-07-04 23:35:18'),
(7, 'Orkitis', 'orkitis', '2018-07-04 23:35:38', '2018-07-04 23:35:38'),
(8, 'Phimosis', 'phimosis', '2018-07-04 23:35:52', '2018-07-04 23:35:52'),
(9, 'Prostat', 'prostat', '2018-07-04 23:36:05', '2018-07-04 23:36:05'),
(10, 'Urethritis', 'urethritis', '2018-07-04 23:36:19', '2018-07-04 23:36:19'),
(11, 'Bau Ketiak', 'bau-ketiak', '2018-07-04 23:36:38', '2018-07-04 23:36:38'),
(12, 'Gatal Selangkangan', 'gatal-selangkangan', '2018-07-04 23:36:56', '2018-07-04 23:36:56'),
(13, 'kita ajah', 'balanitis-keberapa', '2018-07-21 23:21:14', '2018-07-22 00:52:05'),
(14, 'contoh', 'xample', '2018-07-22 00:53:43', '2018-07-22 00:53:43'),
(15, 'contoh', 'xample-kedua-kali', '2018-07-22 00:55:02', '2018-07-22 00:56:19'),
(16, 'baru', 'baru', '2018-07-23 00:36:03', '2018-07-23 00:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_ID` bigint(20) NOT NULL,
  `comment_author` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(106, '2014_10_12_000000_create_users_table', 1),
(107, '2014_10_12_100000_create_password_resets_table', 1),
(108, '2018_07_03_034157_create_pages_table', 1),
(109, '2018_07_03_034252_create_categories_table', 1),
(110, '2018_07_03_034459_create_posts_table', 1),
(111, '2018_07_03_075122_create_comments_table', 1),
(112, '2018_07_18_080230_create_reservations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('drafted','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'drafted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about', '<p>About Page</p>', 'published', '2018-07-04 23:31:32', '2018-07-04 23:32:57'),
(2, 'Contact Us', 'contact', '<p>Contact Us Page</p>', 'drafted', '2018-07-04 23:32:45', '2018-07-04 23:32:45'),
(3, 'Registration', 'registration', '<p>This is page of Registration</p>', 'published', '2018-07-17 01:04:52', '2018-07-18 00:30:26'),
(4, 'Consultation', 'consultation', '<h1>This is page of Consultation</h1>', 'published', '2018-07-18 00:27:54', '2018-07-18 00:27:54'),
(5, 'Our Information', 'our-information', '<p>This is Page Of&nbsp;Our Information</p>', 'drafted', '2018-07-18 00:31:28', '2018-07-18 00:31:28'),
(6, 'as', 'as', '<p>aa</p>', 'drafted', '2018-07-21 21:54:01', '2018-07-21 21:55:05'),
(7, 'tika', 'tika', '<p>sas</p>', 'drafted', '2018-07-21 23:50:08', '2018-07-21 23:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_ID` bigint(20) NOT NULL,
  `category_ID` int(10) UNSIGNED NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_thumbnail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_ID`, `category_ID`, `post_content`, `post_title`, `post_slug`, `post_type`, `post_thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repudiandae recusandae aperiam, consequatur eveniet labore nam dolores architecto quasi veritatis quod, doloremque vero delectus maxime voluptatum reiciendis possimus? Nihil, iste!</p>', 'Gejala Balanitis', 'gejala-balanitis', 'post', NULL, '2018-07-04 23:39:12', '2018-07-04 23:39:12'),
(2, 1, 1, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repudiandae recusandae aperiam, consequatur eveniet labore nam dolores architecto quasi veritatis quod, doloremque vero delectus maxime voluptatum reiciendis possimus? Nihil, iste!</p>', 'Penyebab Balanitis', 'penyebab-balanitis', 'post', NULL, '2018-07-04 23:39:34', '2018-07-04 23:39:34'),
(4, 1, 7, '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad et eos alias quod enim dolorum cumque quas! Hic eveniet, qui mollitia deleniti magni quis? Possimus quisquam ad consequatur mollitia eveniet!</p>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad et eos alias quod enim dolorum cumque quas! Hic eveniet, qui mollitia deleniti magni quis? Possimus quisquam ad consequatur mollitia eveniet!</p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://127.0.0.1:8000/photos/1/jam-dinding.jpg" style="width: 300px; height: 169px;" /></p>', 'Penyebab Orkitis', 'penyebab-orkitis', 'post', '1531364524.jpg', '2018-07-04 23:40:24', '2018-07-11 20:02:04'),
(5, 1, 1, '<h1 style="text-align: center;"><strong><span style="font-size:16px;">HEADING</span></strong></h1>\r\n\r\n<p><strong><span style="font-size:16px;">Image :&nbsp;</span></strong></p>\r\n\r\n<figure class="easyimage easyimage-full"><img alt="" src="blob:http://127.0.0.1:8000/8320778f-1788-4ea2-9e7f-50a1c9d17e91" width="1131" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'contoh post ke 3', 'post-3', 'post', NULL, '2018-07-07 00:06:31', '2018-07-07 00:06:31'),
(46, 1, 8, '<p>gh</p>', 'gh', 'gh', 'post', NULL, '2018-07-19 02:32:02', '2018-07-19 02:32:02'),
(47, 1, 6, '<p>nnn</p>', 'nn', 'nn', 'post', '1532079667.jpg', '2018-07-20 01:53:46', '2018-07-20 02:41:07'),
(48, 1, 8, '<p>hhj</p>', 'hhj', 'hhj', 'post', '1532079706.jpg', '2018-07-20 02:41:46', '2018-07-20 02:41:46'),
(49, 1, 6, '<p>xz</p>', 'xz', 'xz', 'post', '1532079789.jpg', '2018-07-20 02:43:09', '2018-07-20 02:43:09'),
(50, 1, 2, '<p>yy</p>', 'yy', 'yy', 'post', '1532079868.png', '2018-07-20 02:44:28', '2018-07-20 02:44:28'),
(51, 1, 12, '<p>jj</p>', 'jj', 'j-l', 'post', '1532080197.contoh.jpg', '2018-07-20 02:49:57', '2018-07-21 20:55:33'),
(52, 1, 10, '<p>ll</p>', 'll', 'll', 'post', 'update.call.png', '2018-07-20 02:51:15', '2018-07-20 02:52:03'),
(54, 1, 12, '<p>sasassasdsd</p>', 'sas', 'asas', 'post', NULL, '2018-07-20 23:57:39', '2018-07-20 23:57:39'),
(56, 1, 9, '<p>luka</p>', 'luka', 'luka', 'post', NULL, '2018-07-21 23:52:35', '2018-07-21 23:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(13) NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `age`, `address`, `phone`, `complaint`, `created_at`, `updated_at`) VALUES
(1, 'Diana', 77, 'buatrsa', 890278145634, '', '2018-07-18 02:18:01', '2018-07-18 02:18:01'),
(2, 'bukan', 66, 'kina', 876876876876, '', '2018-07-18 02:19:34', '2018-07-18 02:19:34'),
(3, 'niola', 65, 'kanoi', 876123876345, '', '2018-07-18 02:20:18', '2018-07-18 02:20:18'),
(4, 'dino', 23, 'lupanki', 123456789123, '', '2018-07-18 02:25:32', '2018-07-18 02:25:32'),
(5, 'jiao', 37, 'alamat', 765567765567, 'keluhan anda', '2018-07-18 02:56:49', '2018-07-18 02:56:49'),
(6, 'Dilan', 23, 'Kedoya', 21543678432, 'Kenapa Aku seperti ini', '2018-07-18 19:26:51', '2018-07-18 19:26:51'),
(7, 'Lidia', 32, 'Ketapang', 87867567423, 'Kenapa ini terjadi', '2018-07-18 19:35:10', '2018-07-18 19:35:10'),
(8, 'Lidia', 32, 'Ketapang', 87867567423, 'Kenapa ini terjadi', '2018-07-18 19:36:57', '2018-07-18 19:36:57'),
(9, 'Lina', 22, 'Senayan', 456654456654, 'Senayan City oooy', '2018-07-18 19:37:38', '2018-07-18 19:37:38'),
(10, 'Koala', 54, 'Dermaga Biru', 987654321345, 'Dermaga Kota biru', '2018-07-18 19:38:48', '2018-07-18 19:38:48'),
(11, 'Tino', 11, 'Karanggede', 123456789, 'Semarang', '2018-07-18 19:41:33', '2018-07-18 19:41:33'),
(12, 'as', 2, 'scsd', 12134, 'sddd', '2018-07-18 19:43:13', '2018-07-18 19:43:13'),
(13, 'asd', 32, 'sasds', 3232, 'dssdffdf', '2018-07-18 19:44:20', '2018-07-18 19:44:20'),
(14, 'fg', 44, 'fggf', 4545, 'fgfgfg', '2018-07-18 19:45:08', '2018-07-18 19:45:08'),
(15, 'indie', 12, 'lingkar jati', 123456, 'Keluhan Anda', '2018-07-18 20:27:47', '2018-07-18 20:27:47'),
(16, 'sasasa', 16, 'xqsqsqs', 189, 'xsxsx', '2018-07-19 20:46:18', '2018-07-19 20:46:18'),
(17, 'sasa', 21, 'sas', 12345678901, 'asxasxx', '2018-07-19 21:07:49', '2018-07-19 21:07:49'),
(18, 'asas', 2, 'sdxsd', 1234444566778, ',kj,', '2018-07-20 21:00:46', '2018-07-20 21:00:46'),
(19, 'asa', 12, 'asxa scs', 123313311313, 'xsxsx', '2018-07-20 23:14:34', '2018-07-20 23:14:34'),
(20, 'sasas', 21, 'sasa', 2121212122121, 'asas', '2018-07-21 01:00:38', '2018-07-21 01:00:38'),
(21, 'sas', 12, 'a', 1221212122122, 'sasas', '2018-07-21 01:19:45', '2018-07-21 01:19:45'),
(22, 'sa', 21, 'sdad', 23412122312, 'sdsd', '2018-07-22 01:00:57', '2018-07-22 01:00:57'),
(23, 'klkllkkllk', 21, 'klkllkk', 1233123213232, 'xssaxccc', '2018-07-22 01:02:01', '2018-07-22 01:02:01'),
(24, 'sa', 2, 'dssd', 24476545352, 'dsccsdcc', '2018-07-22 01:04:00', '2018-07-22 01:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@xxx.com', '$2y$10$God9WBhl7oyvJuoZYJr1CupztlzX2zKpZ5HnkxcTynJvGy99oEOOO', 'j1NMStGzL6mnwMoqgTcJ3mTqcH7LjZmwzeZfeVdniDNE0qoaHZuQVpzAkSaa', '2018-07-04 23:30:37', '2018-07-04 23:30:37'),
(2, 'admin2', 'admin2@xxx.com', '$2y$10$fCgTv9PxT7faf.suNZLWi.YXKRWoIDXMqlgFRT4v7sxzkKrGlhqEy', 'VFpdt6U2jF0puZQ280DIJzFPfGSvkSLXQsjmnlximxDCbLXO8FnkP4WK5yaE', '2018-07-19 00:11:18', '2018-07-19 00:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_ID`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
