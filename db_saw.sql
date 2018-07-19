-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2018 pada 04.44
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--
CREATE DATABASE IF NOT EXISTS `db_saw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_saw`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `NIP` int(20) NOT NULL,
  `jabatan` text NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `NIP`, `jabatan`, `password`, `type`) VALUES
(1, 'ismetasani', 567, 'staff', '15m37454ni', 'ka_instalasi'),
(5, 'ka_instalasi', 123, 'Kepala Instalasi', 'testpassword', 'ka_instalasi'),
(6, 'nurulcholis', 2333, 'Staff', 'admin', 'admin'),
(7, 'slamet', 3333, 'Koordinator', 'slamet', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_analisa`
--

CREATE TABLE `tb_analisa` (
  `kd_analisa` int(11) NOT NULL,
  `kode_kerusakan` varchar(10) NOT NULL,
  `nilai` double NOT NULL,
  `rangking` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id` int(5) NOT NULL,
  `kode_kerusakan` varchar(10) NOT NULL,
  `nilai` double NOT NULL,
  `kode_periode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_histori`
--

INSERT INTO `tb_histori` (`id`, `kode_kerusakan`, `nilai`, `kode_periode`) VALUES
(197, 'A01', 0.61, ''),
(198, 'A02', 0.74, ''),
(199, 'A03', 0.82, ''),
(200, 'A04', 0.41166666666667, ''),
(201, 'A05', 0.57833333333333, ''),
(202, 'A06', 0.57833333333333, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indikator`
--

CREATE TABLE `tb_indikator` (
  `kode_indikator` int(5) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_indikator` varchar(25) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_indikator`
--

INSERT INTO `tb_indikator` (`kode_indikator`, `kode_kriteria`, `nama_indikator`, `nilai`) VALUES
(555, 'C01', 'Banyak', 1),
(556, 'C01', 'Sedikit', 0.5),
(557, 'C01', 'Tidak ada', 0.1),
(558, 'C02', 'Mudah', 1),
(559, 'C02', 'Sedang', 0.5),
(560, 'C02', 'Sulit', 0.1),
(561, 'C03', 'HRD', 1),
(562, 'C03', 'Ruang Khusus', 0.9),
(563, 'C03', 'Ruang VIP', 0.7),
(564, 'C03', 'Ruang Rawat Inap 1', 0.5),
(565, 'C03', 'Ruang Rawat Inap 2', 0.4),
(566, 'C03', 'Ruang Rawat Inap 3', 0.2),
(567, 'C03', 'Ruang Umum', 0.1),
(568, 'C04', '5 menit - 30 menit', 1),
(569, 'C04', '31 menit - 60 menit', 0.9),
(570, 'C04', '61 menit - 120 menit', 0.8),
(571, 'C04', '121 menit - 180 menit', 0.7),
(572, 'C04', '181 menit - 240 menit', 0.6),
(573, 'C04', '241 menit - 300 menit', 0.5),
(574, 'C04', '301 menit - 360 menit', 0.4),
(575, 'C04', '361 menit - 420 menit', 0.1),
(576, '', '421 menit - 480 menit', 0.2),
(577, '', 'Lebih dari 480', 0.2),
(581, '', 'ddk', 0.4),
(582, '', 'jijiok', 0.8),
(586, '', 'huyki', 0.6),
(587, '', 'okokokokkobb', 0.4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerusakan`
--

CREATE TABLE `tb_kerusakan` (
  `kode_kerusakan` varchar(5) NOT NULL,
  `nama_kerusakan` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `kode_periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kerusakan`
--

INSERT INTO `tb_kerusakan` (`kode_kerusakan`, `nama_kerusakan`, `ruangan`, `kode_periode`) VALUES
('A01', 'Mengecek line listrik', 'Ruang Umum', 'P001'),
('A02', 'Service AC', 'Ruang Rawat Inap 1', 'P001'),
('A03', 'Perawatan Genset', 'Ruang Khusus', 'P001'),
('A04', 'Mengganti Lampu', 'Ruang Rawat Inap 3', 'P001'),
('A05', 'Memperbaiki Finger Print', 'Ruang Umum', 'P001'),
('A08', 'kerusakan-1', 'R1', 'P002'),
('A09', 'TV Rusa', 'VIP Mawar', 'P003'),
('A10', 'Genset Error', 'Genset', 'P003'),
('A11', 'Dispenser Rusak', 'Dapur', 'P003'),
('A12', 'Hp mati', 'IPSRS', 'P003'),
('A13', 'qqqqq', 'uuuuuuhhhhhhh', 'P005'),
('A14', 'kolo', 'VIP Mawar', 'P004'),
('A15', 'loli', 'teratai', 'P004'),
('A16', 'iujug', 'kenangan', 'P004'),
('A17', 'lpoj', 'gudang', 'P004'),
('A18', 'rtr', 'seroja', 'P004'),
('A19', 'ing', 'ug', 'P005'),
('A20', 'klok', 'fhj', 'P005'),
('A21', 'kn', 'ht', 'P006'),
('A22', 'lo', 'wa', 'P006'),
('A23', 'pokhu', 'fgjkl', 'P006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  `atribut` varchar(16) DEFAULT NULL,
  `bobot` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
('C04', 'Waktu Pengerjaan', 'cost', 0.3),
('C03', 'Jenis Ruangan', 'benefit', 0.3),
('C02', 'Kategori Kerusakan', 'cost', 0.2),
('C01', 'Ketersedian Spearpart', 'benefit', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `kode_penilaian` int(5) NOT NULL,
  `kode_kerusakan` varchar(10) DEFAULT NULL,
  `kode_kriteria` varchar(10) DEFAULT NULL,
  `kode_indikator` int(5) DEFAULT NULL,
  `kode_periode` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`kode_penilaian`, `kode_kerusakan`, `kode_kriteria`, `kode_indikator`, `kode_periode`) VALUES
(166, 'A01', 'C04', 568, 'P001'),
(167, 'A01', 'C03', 562, 'P001'),
(168, 'A01', 'C02', 558, 'P001'),
(169, 'A01', 'C01', 555, 'P001'),
(170, 'A02', 'C04', 575, 'P001'),
(171, 'A02', 'C03', 562, 'P001'),
(172, 'A02', 'C02', 559, 'P001'),
(173, 'A02', 'C01', 556, 'P001'),
(174, 'A03', 'C04', 575, 'P001'),
(175, 'A03', 'C03', 562, 'P001'),
(176, 'A03', 'C02', 558, 'P001'),
(177, 'A03', 'C01', 555, 'P001'),
(178, 'A04', 'C04', 574, 'P001'),
(179, 'A04', 'C03', 566, 'P001'),
(180, 'A04', 'C02', 558, 'P001'),
(181, 'A04', 'C01', 556, 'P001'),
(182, 'A05', 'C04', 574, 'P001'),
(183, 'A05', 'C03', 565, 'P001'),
(184, 'A05', 'C02', 560, 'P001'),
(185, 'A05', 'C01', 557, 'P001'),
(186, 'A06', 'C04', 574, 'P001'),
(187, 'A06', 'C03', 565, 'P001'),
(188, 'A06', 'C02', 558, 'P001'),
(189, 'A06', 'C01', 555, 'P001'),
(190, 'A07', 'C04', 575, 'P001'),
(191, 'A07', 'C03', 562, 'P001'),
(192, 'A07', 'C02', 559, 'P001'),
(193, 'A07', 'C01', 556, 'P001'),
(194, 'A09', 'C04', 575, 'P001'),
(195, 'A09', 'C03', 566, 'P001'),
(196, 'A09', 'C02', 558, 'P001'),
(197, 'A09', 'C01', 556, 'P001'),
(198, 'A10', 'C04', 575, 'P001'),
(199, 'A10', 'C03', 564, 'P001'),
(200, 'A10', 'C02', 558, 'P001'),
(201, 'A10', 'C01', 557, 'P001'),
(202, 'A01', '', 0, ''),
(203, 'A02', '', 0, ''),
(204, 'A03', '', 0, ''),
(205, 'A04', '', 0, ''),
(206, 'A05', '', 0, ''),
(207, 'A06', '', 0, ''),
(208, 'A07', '', 0, ''),
(209, 'A08', '', 0, ''),
(210, 'A01', 'C05', 0, ''),
(211, 'A02', 'C05', 0, ''),
(212, 'A03', 'C05', 0, ''),
(213, 'A04', 'C05', 0, ''),
(214, 'A05', 'C05', 0, ''),
(215, 'A06', 'C05', 0, ''),
(216, 'A07', 'C05', 0, ''),
(217, 'A08', 'C05', 0, ''),
(218, 'A09', 'C01', 0, 'P002'),
(219, 'A09', 'C02', 0, 'P002'),
(220, 'A09', 'C03', 0, 'P002'),
(221, 'A09', 'C04', 0, 'P002'),
(222, 'A10', 'C01', 0, 'P002'),
(223, 'A10', 'C02', 0, 'P002'),
(224, 'A10', 'C03', 0, 'P002'),
(225, 'A10', 'C04', 0, 'P002'),
(226, 'A09', 'C01', 0, 'P002'),
(227, 'A09', 'C02', 0, 'P002'),
(228, 'A09', 'C03', 0, 'P002'),
(229, 'A09', 'C04', 0, 'P002'),
(230, 'A09', 'C01', 0, 'P002'),
(231, 'A09', 'C02', 0, 'P002'),
(232, 'A09', 'C03', 0, 'P002'),
(233, 'A09', 'C04', 0, 'P002'),
(234, 'A09', 'C01', 0, 'P002'),
(235, 'A09', 'C02', 0, 'P002'),
(236, 'A09', 'C03', 0, 'P002'),
(237, 'A09', 'C04', 0, 'P002'),
(238, 'A01', '', 0, ''),
(239, 'A02', '', 0, ''),
(240, 'A03', '', 0, ''),
(241, 'A04', '', 0, ''),
(242, 'A05', '', 0, ''),
(243, 'A06', '', 0, ''),
(244, 'A07', '', 0, ''),
(245, 'A08', '', 0, ''),
(246, 'A01', 'C05', 0, ''),
(247, 'A02', 'C05', 0, ''),
(248, 'A03', 'C05', 0, ''),
(249, 'A04', 'C05', 0, ''),
(250, 'A05', 'C05', 0, ''),
(251, 'A06', 'C05', 0, ''),
(252, 'A07', 'C05', 0, ''),
(253, 'A08', 'C05', 0, ''),
(254, 'A09', 'C01', 556, 'P003'),
(255, 'A09', 'C02', 559, 'P003'),
(256, 'A09', 'C03', 563, 'P003'),
(257, 'A09', 'C04', 568, 'P003'),
(258, 'A10', 'C01', 556, 'P003'),
(259, 'A10', 'C02', 558, 'P003'),
(260, 'A10', 'C03', 562, 'P003'),
(261, 'A10', 'C04', 569, 'P003'),
(262, 'A11', 'C01', 555, 'P003'),
(263, 'A11', 'C02', 560, 'P003'),
(264, 'A11', 'C03', 564, 'P003'),
(265, 'A11', 'C04', 575, 'P003'),
(266, 'A08', 'C04', 568, 'P002'),
(267, 'A08', 'C03', 562, 'P002'),
(268, 'A08', 'C02', 559, 'P002'),
(269, 'A08', 'C01', 556, 'P002'),
(270, 'A12', 'C01', 557, 'P003'),
(271, 'A12', 'C02', 559, 'P003'),
(272, 'A12', 'C03', 564, 'P003'),
(273, 'A12', 'C04', 570, 'P003'),
(274, 'A13', 'C01', 0, 'P001'),
(275, 'A13', 'C02', 0, 'P001'),
(276, 'A13', 'C03', 0, 'P001'),
(277, 'A13', 'C04', 0, 'P001'),
(278, 'A14', 'C01', 0, 'P005'),
(279, 'A14', 'C02', 0, 'P005'),
(280, 'A14', 'C03', 0, 'P005'),
(281, 'A14', 'C04', 0, 'P005'),
(282, 'A15', 'C01', 0, 'P005'),
(283, 'A15', 'C02', 0, 'P005'),
(284, 'A15', 'C03', 0, 'P005'),
(285, 'A15', 'C04', 0, 'P005'),
(286, 'A13', 'C01', 555, 'P005'),
(287, 'A13', 'C02', 559, 'P005'),
(288, 'A13', 'C03', 564, 'P005'),
(289, 'A13', 'C04', 571, 'P005'),
(290, 'A13', 'C01', 555, 'P005'),
(291, 'A13', 'C02', 559, 'P005'),
(292, 'A13', 'C03', 564, 'P005'),
(293, 'A13', 'C04', 571, 'P005'),
(294, 'A01', 'C05', 0, ''),
(295, 'A02', 'C05', 0, ''),
(296, 'A03', 'C05', 0, ''),
(297, 'A04', 'C05', 0, ''),
(298, 'A05', 'C05', 0, ''),
(299, 'A08', 'C05', 0, ''),
(300, 'A09', 'C05', 0, ''),
(301, 'A10', 'C05', 0, ''),
(302, 'A11', 'C05', 0, ''),
(303, 'A12', 'C05', 0, ''),
(304, 'A13', 'C05', 0, ''),
(305, 'A01', 'C06', 0, ''),
(306, 'A02', 'C06', 0, ''),
(307, 'A03', 'C06', 0, ''),
(308, 'A04', 'C06', 0, ''),
(309, 'A05', 'C06', 0, ''),
(310, 'A08', 'C06', 0, ''),
(311, 'A09', 'C06', 0, ''),
(312, 'A10', 'C06', 0, ''),
(313, 'A11', 'C06', 0, ''),
(314, 'A12', 'C06', 0, ''),
(315, 'A13', 'C06', 0, ''),
(316, 'A14', 'C01', 0, 'P004'),
(317, 'A14', 'C02', 0, 'P004'),
(318, 'A14', 'C03', 0, 'P004'),
(319, 'A14', 'C04', 0, 'P004'),
(320, 'A15', 'C01', 0, 'P004'),
(321, 'A15', 'C02', 0, 'P004'),
(322, 'A15', 'C03', 0, 'P004'),
(323, 'A15', 'C04', 0, 'P004'),
(324, 'A16', 'C01', 0, 'P004'),
(325, 'A16', 'C02', 0, 'P004'),
(326, 'A16', 'C03', 0, 'P004'),
(327, 'A16', 'C04', 0, 'P004'),
(328, 'A17', 'C01', 0, 'P004'),
(329, 'A17', 'C02', 0, 'P004'),
(330, 'A17', 'C03', 0, 'P004'),
(331, 'A17', 'C04', 0, 'P004'),
(332, 'A18', 'C01', 0, 'P004'),
(333, 'A18', 'C02', 0, 'P004'),
(334, 'A18', 'C03', 0, 'P004'),
(335, 'A18', 'C04', 0, 'P004'),
(336, NULL, NULL, NULL, '0'),
(337, 'A19', 'C01', 556, 'P005'),
(338, 'A19', 'C02', 558, 'P005'),
(339, 'A19', 'C03', 565, 'P005'),
(340, 'A19', 'C04', 573, 'P005'),
(341, 'A20', 'C01', 557, 'P005'),
(342, 'A20', 'C02', 560, 'P005'),
(343, 'A20', 'C03', 562, 'P005'),
(344, 'A20', 'C04', 573, 'P005'),
(345, 'A21', 'C01', 556, 'P006'),
(346, 'A21', 'C02', 560, 'P006'),
(347, 'A21', 'C03', 564, 'P006'),
(348, 'A21', 'C04', 572, 'P006'),
(349, 'A22', 'C01', 556, 'P006'),
(350, 'A22', 'C02', 558, 'P006'),
(351, 'A22', 'C03', 566, 'P006'),
(352, 'A22', 'C04', 572, 'P006'),
(353, 'A23', 'C01', 557, 'P006'),
(354, 'A23', 'C02', 559, 'P006'),
(355, 'A23', 'C03', 565, 'P006'),
(356, 'A23', 'C04', 574, 'P006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE `tb_periode` (
  `kode_periode` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`kode_periode`, `tanggal`) VALUES
('P001', '2018-06-24'),
('P003', '2018-05-03'),
('P004', '2018-06-26'),
('P005', '2018-06-30'),
('P006', '2018-06-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa`
--
ALTER TABLE `tb_analisa`
  ADD PRIMARY KEY (`kd_analisa`);

--
-- Indexes for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kerusakan` (`kode_kerusakan`),
  ADD KEY `kode_periode` (`kode_periode`);

--
-- Indexes for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  ADD PRIMARY KEY (`kode_indikator`);

--
-- Indexes for table `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  ADD PRIMARY KEY (`kode_kerusakan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`kode_penilaian`),
  ADD KEY `kode_pelamar` (`kode_kerusakan`),
  ADD KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `kode_indikator` (`kode_indikator`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`kode_periode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_analisa`
--
ALTER TABLE `tb_analisa`
  MODIFY `kd_analisa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  MODIFY `kode_indikator` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;
--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `kode_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
