-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 03:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtcfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `publication_year`, `description`, `picture`, `stock`, `created_at`, `updated_at`) VALUES
(2, '13 reasons why?', 'allan alaia', 1998, 'qwdfghjhgjcfxdszgaszxdg', '1735554189.jpeg', 1, '2024-12-30 03:23:09', '2024-12-30 03:23:19'),
(3, 'Practice Tests for the SAT 8th Edition', 'KAPLAN', 2017, 'Practice test for the SAT series 8th', '1735563574.jpeg', 1, '2024-12-30 05:59:34', '2024-12-30 05:59:34'),
(4, 'Thirteen Reasons Why', 'Jay Asher', 2014, NULL, '1735563612.jpeg', 1, '2024-12-30 06:00:12', '2024-12-30 06:00:12'),
(5, 'Insects & Leaders', 'David G', 2008, '*Insects and Leaders* by David G. Barling draws parallels between insect behavior, like ants and bees, and leadership strategies, offering insights on teamwork, collaboration, and collective effort in human organizations.', '1735563691.jpeg', 1, '2024-12-30 06:01:31', '2024-12-30 06:01:31'),
(6, 'It Ends With Us', 'Colleen Hoover', 2016, 'The novel follows Lily Bloom as she navigates an abusive relationship with her partner, Ryle Kincaid, while reflecting on her past with Atlas Corrigan. It explores themes of love, abuse, and strength, focusing on Lily’s journey to break free from the cycle of abuse and find a healthier future.', '1735563720.jpeg', 1, '2024-12-30 06:02:00', '2024-12-30 06:02:00'),
(7, 'Me Before You', 'Jojo Moyes', 2012, 'The novel tells the story of Louisa Clark, who becomes the caregiver for Will Traynor, a wealthy man left paralyzed after an accident. As their relationship deepens, Louisa challenges Will’s decision to end his life through assisted suicide. The book explores themes of love, loss, and the impact of choices on one\'s life.', '1735563749.jpeg', 1, '2024-12-30 06:02:29', '2024-12-30 06:02:29'),
(8, 'Still Me', 'Jojo Moyes', 2018, 'It is the third book in the Me Before You series, following Louisa Clark\'s journey as she moves to New York to start a new chapter in her life. While navigating her career and relationships, Louisa grapples with the challenges of balancing her past with her future. The novel explores themes of self-discovery, love, and personal growth.', '1735563776.jpeg', 1, '2024-12-30 06:02:56', '2024-12-30 06:02:56'),
(9, 'Starry Night', 'Katherine Raey', 2014, 'The novel follows the story of a young woman named Meredith, who works at a small Chicago art gallery. She is tasked with preparing an exhibition featuring the famous painting Starry Night by Vincent van Gogh. As Meredith navigates the world of art and relationships, she discovers new depths about herself and her own desires, finding inspiration and healing along the way.', '1735563803.png', 1, '2024-12-30 06:03:23', '2024-12-30 06:03:23'),
(10, 'So This is Unfortunate', 'Loren Miranda', 2020, 'The novel follows the story of a young woman named Emory, who, after a series of unfortunate events, finds herself in an unexpected and difficult situation. As she navigates challenges in her personal and professional life, Emory learns about resilience, love, and the power of accepting life’s unpredictability. The book combines humor and heartache, exploring the ups and downs of growing up and finding one\'s path.', '1735563839.jpeg', 1, '2024-12-30 06:03:59', '2024-12-30 06:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) DEFAULT NULL,
  `book_id` bigint(20) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `member_id`, `book_id`, `status`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'borrowed', '2024-12-29', '2025-01-06', '2024-12-30 03:22:14', '2024-12-30 03:22:14'),
(2, 3, 1, 'borrowed', '2024-12-29', '2025-01-06', '2024-12-30 03:22:24', '2024-12-30 03:22:24'),
(3, 4, 2, 'returned', '2024-12-30', '2025-01-06', '2024-12-30 03:23:38', '2024-12-30 03:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Michell', '083528138712', NULL, NULL),
(2, 'Michell', '083528138712', NULL, NULL),
(3, 'Michell', '083528138712', NULL, NULL),
(4, 'michan', '083528138712', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_29_172547_create_books_table', 1),
(5, '2024_12_29_172631_create_histories_table', 1),
(6, '2024_12_29_172724_create_members_table', 1),
(7, '2024_12_30_101123_create_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('X7PyEOWVlpxOR0Q8aCGds4ixY6URLhtQCJ31CAdu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0NjeUpkVVAxc0pkVlF0dFU3MHpPWnlsSlV6a1c1R2x1b0dZZHBydyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZW5kaW5nL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735567844);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
