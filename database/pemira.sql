-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2018 at 04:07 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemira`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_kahim`
--

CREATE TABLE `calon_kahim` (
  `id` tinyint(4) NOT NULL,
  `no_calon` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(1000) NOT NULL,
  `id_prodi` varchar(4) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calon_presma`
--

CREATE TABLE `calon_presma` (
  `id` tinyint(4) NOT NULL,
  `no_calon` tinyint(4) NOT NULL,
  `nama_pres` varchar(100) NOT NULL,
  `nama_wapres` varchar(100) NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(1000) NOT NULL,
  `id_prodi_pres` varchar(5) NOT NULL,
  `id_prodi_wapres` varchar(5) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'petugas', 'Petugas TPS'),
(3, 'pemilih', 'Pemilih');

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_kelas`
--

CREATE TABLE `jumlah_kelas` (
  `id_prodi` varchar(5) NOT NULL,
  `smt` tinyint(4) NOT NULL,
  `jumlah` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`) VALUES
('ak', 'D3 Akuntansi'),
('dkv', 'Desain Komunikasi Visual'),
('fm', 'D3 Farmasi'),
('ind', 'Industri'),
('kb', 'D3 Kebidanan'),
('kom', 'D3 Teknik Komputer'),
('te', 'D3 Teknik Elektro'),
('ti', 'D4 Teknik Informatika'),
('tkj', 'Teknik Komputer Jaringan'),
('tm', 'D3 Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `suara_kahim`
--

CREATE TABLE `suara_kahim` (
  `id_user` varchar(8) NOT NULL,
  `id_calon` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suara_presma`
--

CREATE TABLE `suara_presma` (
  `id_user` varchar(8) NOT NULL,
  `id_calon` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `smt` tinyint(4) DEFAULT NULL,
  `prodi` varchar(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `lock_by` varchar(50) NOT NULL,
  `unlock_by` varchar(50) NOT NULL,
  `status_kahim` tinyint(1) DEFAULT '0',
  `status_presma` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `smt`, `prodi`, `kelas`, `lock_by`, `unlock_by`, `status_kahim`, `status_presma`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$FnHv3d./rBwOEk3qd6YEUujZrpBkeZ2EcgRPVblLvP9k603xuL3Mi', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1537467132, 1, 'Admin', 'Pemira', 'ADMIN', '0', NULL, '', '', '', '', 0, 0),
(2, '112.215.240.237', 'petugas1', '$2y$08$lz63gXbCZz0p1kYPx24WUeVMH.cPkRNpwG39PoNsc.64HrJGZ9sJy', NULL, NULL, NULL, NULL, NULL, NULL, 1514006446, 1537455304, 1, 'TPS', '1', NULL, NULL, NULL, '', '', '', '', 0, 0),
(3, '112.215.240.237', 'petugas2', '$2y$08$sIXP7V/mQgNp0jj7qgGIduv8JXQ3FxoEMnBVFQYEzMCInTh5E1wiK', NULL, NULL, NULL, NULL, NULL, NULL, 1514006545, 1514068845, 0, 'TPS', '2', NULL, NULL, NULL, '', '', '', '', 0, 0),
(4, '112.215.240.237', 'petugas3', '$2y$08$/IIkPPds71D.VCfjWlfevOqm9/GlznQ5BiVcLO9s8KJvyln5rCWAK', NULL, NULL, NULL, NULL, NULL, NULL, 1514006612, NULL, 0, 'TPS', '3', NULL, NULL, NULL, '', '', '', '', 0, 0),
(5, '112.215.240.237', 'petugas4', '$2y$08$Hm/ajTMo5TYW6m5F.K5cS.zznh45NMN9ki/WPfx4MqS0x3ehGnj1O', NULL, NULL, NULL, NULL, NULL, NULL, 1514006628, 1514100420, 0, 'Petugas', '4', NULL, NULL, NULL, '', '', '', '', 0, 0),
(6, '112.215.240.237', 'petugas5', '$2y$08$2/IxsCVcZXtL6pTMHuQg2etL/Od2B4AgamAbicVQnGmXIr1J4/lx2', NULL, NULL, NULL, NULL, NULL, NULL, 1514006671, 1514116863, 0, 'Petugas', '5', NULL, NULL, NULL, '', '', '', '', 0, 0),
(7, '112.215.240.237', 'petugas6', '$2y$08$Sg6EZMQIu1KWd/Bfc7uLGudb5HetY0/C8Aw15dHGWW5jyiqYR686K', NULL, NULL, NULL, NULL, NULL, NULL, 1514006690, 1514043724, 0, 'Petugas', '6', NULL, NULL, NULL, '', '', '', '', 0, 0),
(8, '112.215.240.237', 'petugas7', '$2y$08$NBIu1.yoFzQXEKhxT.chgu3ava5NER06.CXf9STMh3lpKhCpdGWYi', NULL, NULL, NULL, NULL, NULL, NULL, 1514006709, 1514100031, 0, 'Petugas', '7', NULL, NULL, NULL, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(1100, 2, 2),
(1101, 3, 2),
(1102, 4, 2),
(1103, 5, 2),
(1104, 6, 2),
(1105, 7, 2),
(1106, 8, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_kahim`
--
ALTER TABLE `calon_kahim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_presma`
--
ALTER TABLE `calon_presma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_kahim`
--
ALTER TABLE `calon_kahim`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `calon_presma`
--
ALTER TABLE `calon_presma`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17083476;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3512;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
