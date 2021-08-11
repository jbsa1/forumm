-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 06:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-grup`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(200) NOT NULL,
  `penulis_komentar` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` varchar(100) NOT NULL,
  `id_post` int(100) NOT NULL,
  `pp_penulis` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `lihat_komentar` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lihat`
--

CREATE TABLE `lihat` (
  `user_lihat` varchar(100) NOT NULL,
  `lihat` int(5) NOT NULL,
  `apa_lihat` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lihat`
--

INSERT INTO `lihat` (`user_lihat`, `lihat`, `apa_lihat`) VALUES
('tegar', 0, 'komentar'),
('tegar', 0, 'like'),
('hiqmal', 0, 'komentar'),
('hiqmal', 0, 'like'),
('Rizki', 0, 'komentar'),
('mario', 0, 'komentar'),
('mario', 0, 'like'),
('Rizki', 0, 'like'),
('jbsa1', 0, 'komentar'),
('jbsa1', 0, 'like'),
('diki', 0, 'komentar'),
('diki', 0, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(200) NOT NULL,
  `judul_post` varchar(200) NOT NULL,
  `isi_post` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `gambar_post` text NOT NULL,
  `suka_post` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `judul_post`, `isi_post`, `penulis_post`, `tanggal_post`, `gambar_post`, `suka_post`) VALUES
(24, 'gambar', 'gambar', 'diki', '18:45 10/06/2021', '20210610_184558about.png', 0),
(22, 'ayoayo', 'jancok', 'diki', '18:44 10/06/2021', '', 0),
(23, '2', 'jancok', 'diki', '18:45 10/06/2021', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suka_post`
--

CREATE TABLE `suka_post` (
  `id_suka` bigint(20) UNSIGNED NOT NULL,
  `user_suka` varchar(100) NOT NULL,
  `id_post` int(200) NOT NULL,
  `post_suka` int(5) NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_suka` varchar(100) NOT NULL,
  `lihat_suka` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_user` varchar(100) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk_user` varchar(50) NOT NULL,
  `tanggal_lahir_user` varchar(2) NOT NULL,
  `bulan_lahir_user` varchar(50) NOT NULL,
  `tahun_lahir_user` varchar(4) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `pp_user` text NOT NULL,
  `tanggal_login_user` varchar(100) NOT NULL,
  `bio_user` text NOT NULL,
  `hp_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `level_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_user`, `pass_user`, `nama_user`, `jk_user`, `tanggal_lahir_user`, `bulan_lahir_user`, `tahun_lahir_user`, `status_user`, `pp_user`, `tanggal_login_user`, `bio_user`, `hp_user`, `alamat_user`, `level_user`) VALUES
('diki', '123123', 'diki', 'Pria', '19', 'Maret', '2000', 'Online', '', '18:44 10/06/2021', '', '', '', 0),
('jbsa1', '123123', 'jaf', 'Pria', '17', 'Februari', '2002', 'Offline', 'user.jpg', '21:13 10/06/2021', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idu` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(128) NOT NULL,
  `bio` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `gplus` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `private` int(11) NOT NULL,
  `salted` varchar(256) NOT NULL,
  `background` varchar(256) NOT NULL,
  `cover` varchar(128) NOT NULL,
  `verified` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT 1,
  `gender` tinyint(4) NOT NULL,
  `online` int(11) NOT NULL,
  `offline` tinyint(4) NOT NULL,
  `notificationl` tinyint(4) NOT NULL,
  `notificationc` tinyint(4) NOT NULL,
  `notificationm` tinyint(4) NOT NULL,
  `notificationd` tinyint(4) NOT NULL,
  `email_comment` tinyint(4) NOT NULL,
  `email_like` int(11) NOT NULL,
  `born` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idu`, `username`, `password`, `email`, `first_name`, `last_name`, `location`, `website`, `bio`, `date`, `facebook`, `twitter`, `gplus`, `image`, `private`, `salted`, `background`, `cover`, `verified`, `privacy`, `gender`, `online`, `offline`, `notificationl`, `notificationc`, `notificationm`, `notificationd`, `email_comment`, `email_like`, `born`) VALUES
(30, 'tegar', '714440abdc2359b0533fd3cbbe29382c', '08971158242', 'Tegar', 'Santosa', 'Metro, Lampung', 'http://http://teziger.blogspot.com', 'Editor', '2016-08-22', 'mtegarsp', 'tegarsantosa_p', '+TegarSantosaP', '1805422046_549028107_132432099.jpg', 0, '', '', '717741620_706237106_530786799.jpg', 1, 1, 1, 1472126837, 0, 1, 1, 1, 1, 1, 1, '2002-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `suka_post`
--
ALTER TABLE `suka_post`
  ADD PRIMARY KEY (`id_suka`),
  ADD UNIQUE KEY `id_suka` (`id_suka`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `suka_post`
--
ALTER TABLE `suka_post`
  MODIFY `id_suka` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
