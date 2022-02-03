-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2022 at 11:37 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arigatou_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_arigatou_table`
--

CREATE TABLE `gs_arigatou_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `toname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_arigatou_table`
--

INSERT INTO `gs_arigatou_table` (`id`, `name`, `toname`, `comment`, `indate`) VALUES
(2, '佐藤一郎', '田中一子', '先日は、会議室モニタの繋ぎ方が分からず困っていた所、すぐに駆け付けて対応して下さり、ありがとうございました！', '2022-01-20 21:24:56'),
(3, '田中二郎', '高橋次子', '散らかりがちな文房具スペースをいつも整理整頓して下さってありがとうございます。', '2022-01-20 21:33:33'),
(4, '山田三郎', '小林三子', 'Zoomの使い方が分からず困っている時に、丁寧に教えて下さってありがとうございました。', '2022-01-20 21:38:31'),
(5, 'モンキー・D・ルフィ', '赤髪のシャンクス', '長きに亘り、アンティークな麦わら帽子をご貸与頂きまして有難う御座いました。', '2022-01-23 12:31:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_arigatou_table`
--
ALTER TABLE `gs_arigatou_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_arigatou_table`
--
ALTER TABLE `gs_arigatou_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
