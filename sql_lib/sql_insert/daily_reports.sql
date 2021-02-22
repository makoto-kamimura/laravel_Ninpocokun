-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-02-22 03:47:43
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `laravel`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `daily_reports`
--

CREATE TABLE `daily_reports` (
  `no` int(11) NOT NULL,
  `post_user_cd` smallint(6) NOT NULL,
  `auth_user_cd` smallint(6) NOT NULL,
  `sagyou` varchar(360) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shintyoku` varchar(360) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zansagyou` varchar(360) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hikitsugi` varchar(360) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(360) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `daily_reports`
--

INSERT INTO `daily_reports` (`no`, `post_user_cd`, `auth_user_cd`, `sagyou`, `shintyoku`, `zansagyou`, `hikitsugi`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 'ABCD建設の○○さんと新規案件についてミーティングを行いました。', 'もう何度か打ち合わせを重ねる必要がありそうです。', 'もう何度かのミーティング。', '次回のミーティングは△月□日です。', '頑張るのじゃ。', 1, '2021-02-20 02:37:56', '2021-02-21 02:43:35'),
(2, 18, 1, 'ABCD建設の○○さんとミーティングを行いました。', '次のミーティングにて予算が確定しそうです。', 'ミーティング。', '次回のミーティングは□月△日です。', '予算についての詳細が欲しいのじゃ。', -1, '2021-02-21 02:40:29', '2021-02-22 02:44:07'),
(3, 18, 1, 'ABCD建設の○○さんとミーティングを行いました。', '予算確定、プロジェクトとして始動します。', 'メンバー調整、スケジュール確保', '次回のミーティングは△□月△□日です。', NULL, 0, '2021-02-22 02:42:48', '2021-02-22 02:42:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`no`),
  ADD KEY `INDEX_NAME` (`no`,`post_user_cd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
