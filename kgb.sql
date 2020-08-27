-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 06:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kgb`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `file_kgb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_kgb`
--

CREATE TABLE `arsip_kgb` (
  `id_arsip` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file_kgb` varchar(255) NOT NULL,
  `tgl_arsip` date NOT NULL,
  `kgb_tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsip_kgb`
--

INSERT INTO `arsip_kgb` (`id_arsip`, `nip`, `nama`, `file_kgb`, `tgl_arsip`, `kgb_tahun`) VALUES
(106, '198107142010011001', 'DIMAS RAYUSAL', 'KGB_2019_198107142010011001(1).pdf', '2020-03-14', '2019'),
(107, '198107142010011001', 'DIMAS RAYUSAL', 'KGB_2019_198107142010011001_1584204454.pdf', '2020-03-14', '2018'),
(109, '01239801231', 'Tito Shadam ', 'KGB_2019_009712932123_1590400427.pdf', '2020-04-11', '2020'),
(112, '201237034', 'Fikih Amar, S. Pd I, Phd.', 'KGB_2020_201237034.pdf', '2020-05-15', '2020'),
(113, '01239801231', 'Tito Shadam ', 'KGB_2020_01239801231_2_1589853769.pdf', '2020-05-19', '2019'),
(114, '01239801231', 'Tito Shadam ', 'KGB_2020_198107142010011001_2_1589853785.pdf', '2020-05-19', '2016'),
(115, '198107142010011001', 'DIMAS RAYUSAL', 'KGB_2020_198107142010011001_3.pdf', '2020-05-19', '2020'),
(117, '3123', 'Bara', ' KGB_2020_3123_2_1589939985.pdf', '2020-05-20', '2020'),
(118, '097128371111283', 'M Bara Aksayeth, S. Pd', ' 13.1.03.03.0089_1597172730.pdf', '2020-08-11', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pokok`
--

CREATE TABLE `gaji_pokok` (
  `id_gaji` int(11) NOT NULL,
  `mkg` int(50) NOT NULL,
  `id_golongan` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `id_peraturan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_pokok`
--

INSERT INTO `gaji_pokok` (`id_gaji`, `mkg`, `id_golongan`, `gaji`, `id_peraturan`) VALUES
(13, 0, 'III.a', '2579400', 1),
(22, 1, 'II.a', '2054100', 1),
(24, 2, 'III.a', '2579400', 1),
(25, 2, 'III.b', '2773200', 1),
(26, 2, 'III.c', '2802300', 1),
(27, 2, 'III.d', '2920800', 1),
(28, 2, 'IV.a', '3140200', 1),
(29, 2, 'IV.b', '3273100', 1),
(30, 2, 'IV.c', '3307300', 1),
(31, 2, 'IV.e', '3555800', 1),
(35, 3, 'II.a', '2118800', 1),
(36, 3, 'II.b', '2208400', 1),
(37, 3, 'II.c', '2301800', 1),
(38, 3, 'II.d', '2399200', 1),
(39, 4, 'I.a', '1660700', 1),
(40, 4, 'III.a', '2744500', 1),
(41, 4, 'III.b', '2860500', 1),
(42, 4, 'III.c', '2981500', 1),
(43, 4, 'III.d', '3107700', 1),
(44, 4, 'IV.a', '3239100', 1),
(45, 4, 'IV.b', '3376100', 1),
(46, 4, 'IV.c', '3518900', 1),
(47, 4, 'IV.d', '3667800', 1),
(48, 4, 'IV.e', '3667800', 1),
(52, 5, 'II.a', '2185500', 1),
(53, 5, 'II.b', '2277900', 1),
(54, 5, 'II.c', '2374300', 1),
(55, 5, 'II.d', '2474700', 1),
(56, 6, 'I.a', '1713000', 1),
(57, 6, 'III.a', '2830900', 1),
(58, 6, 'III.b', '2950600', 1),
(59, 6, 'III.c', '3075500', 1),
(60, 6, 'III.d', '3205500', 1),
(61, 6, 'IV.a', '3341100', 1),
(62, 6, 'IV.b', '3482500', 1),
(63, 6, 'IV.c', '3629800', 1),
(64, 6, 'IV.d', '3783300', 1),
(65, 6, 'IV.e', '3943300', 1),
(66, 7, 'I.b', '1813600', 1),
(67, 7, 'I.c', '1832600', 1),
(68, 7, 'I.d', '1970200', 1),
(69, 7, 'II.a', '2254300', 1),
(70, 7, 'II.b', '2349700', 1),
(71, 7, 'II.c', '2449100', 1),
(72, 7, 'II.d', '2552700', 1),
(73, 8, 'I.a', '1766900', 1),
(74, 8, 'III.a', '2920100', 1),
(75, 8, 'III.b', '3043600', 1),
(76, 8, 'III.c', '3172300', 1),
(77, 8, 'III.d', '3306500', 1),
(78, 8, 'IV.a', '3446400', 1),
(79, 8, 'IV.b', '3592100', 1),
(80, 8, 'IV.c', '3744100', 1),
(81, 8, 'IV.d', '3902500', 1),
(82, 8, 'IV.e', '4067500', 1),
(83, 2, 'IV.d', '3555800', 1),
(92, 10, 'III.a', '3012000', 1),
(93, 10, 'III.b', '3139400', 1),
(95, 10, 'III.c', '3272200', 1),
(96, 10, 'III.d', '3410600', 1),
(97, 10, 'IV.a', '3554900', 1),
(98, 10, 'IV.b', '3705300', 1),
(99, 10, 'IV.c', '3862000', 1),
(100, 10, 'IV.e', '4195700', 1),
(101, 10, 'IV.d', '4195700', 1),
(118, 0, 'I.a', '1560800', 1),
(119, 2, 'I.a', '1610000', 1),
(120, 3, 'I.b', '1704500', 1),
(121, 3, 'I.c', '1776600', 1),
(122, 3, 'I.d', '1851800', 1),
(123, 5, 'I.b', '1758200', 1),
(124, 5, 'I.c', '1832600', 1),
(125, 5, 'I.d', '1910100', 1),
(126, 10, 'I.a', '1822600', 1),
(139, 0, 'III.b', '2668500', 1),
(140, 0, 'III.c', '2802300', 1),
(152, 11, 'I.b', '1929600', 1),
(153, 12, 'I.a', '1880000', 1),
(154, 14, 'I.a', '1939200', 1),
(155, 11, 'I.c', '2011200', 1),
(156, 16, 'I.a', '2000300', 1),
(157, 18, 'I.a', '2060300', 1),
(158, 20, 'I.a', '2128300', 1),
(159, 22, 'I.a', '2195300', 1),
(160, 24, 'I.a', '2264400', 1),
(161, 26, 'I.a', '2335800', 1),
(162, 13, 'I.b', '1990400', 1),
(163, 15, 'I.b', '2053100', 1),
(164, 11, 'I.d', '2096300', 1),
(165, 17, 'I.b', '2117700', 1),
(166, 19, 'I.b', '2184400', 1),
(167, 21, 'I.b', '2253200', 1),
(168, 23, 'I.b', '2324200', 1),
(169, 25, 'I.b', '2397400', 1),
(170, 27, 'I.b', '2472900', 1),
(171, 13, 'I.c', '2074600', 1),
(172, 15, 'I.c', '2139900', 1),
(173, 17, 'I.c', '2207300', 1),
(174, 19, 'I.c', '2276800', 1),
(175, 21, 'I.c', '2348500', 1),
(176, 23, 'I.c', '2422500', 1),
(177, 25, 'I.c', '2498800', 1),
(178, 27, 'I.c', '2577500', 1),
(179, 13, 'I.d', '2162300', 1),
(180, 15, 'I.d', '2230400', 1),
(181, 17, 'I.d', '2300700', 1),
(182, 19, 'I.d', '2373100', 1),
(183, 21, 'I.d', '2447900', 1),
(184, 23, 'I.d', '2525000', 1),
(185, 25, 'I.d', '2604500', 1),
(186, 27, 'I.d', '2686500', 1),
(187, 0, 'II.a', '2022200', 1),
(188, 9, 'II.a', '2325300', 1),
(189, 11, 'II.a', '2398600', 1),
(190, 13, 'II.a', '2474100', 1),
(191, 15, 'II.a', '2552000', 1),
(192, 13, 'II.b', '2578800', 1),
(193, 13, 'II.d', '2801500', 1),
(194, 17, 'II.a', '2632400', 1),
(195, 19, 'II.a', '2715300', 1),
(196, 21, 'II.b', '2919300', 1),
(197, 21, 'II.a', '2800800', 1),
(198, 23, 'II.b', '3011300', 1),
(199, 25, 'II.b', '3106100', 1),
(200, 27, 'II.b', '3203900', 1),
(201, 23, 'II.a', '2889100', 1),
(202, 25, 'II.a', '2980000', 1),
(203, 27, 'II.a', '3073900', 1),
(204, 29, 'II.a', '3170700', 1),
(205, 31, 'II.a', '3270600', 1),
(206, 33, 'II.a', '3373600', 1),
(207, 9, 'II.b', '2423700', 1),
(208, 11, 'II.b', '2500000', 1),
(209, 15, 'II.b', '2660000', 1),
(210, 17, 'II.b', '2743800', 1),
(211, 19, 'II.b', '2830200', 1),
(212, 29, 'II.b', '3304800', 1),
(213, 31, 'II.b', '3408900', 1),
(214, 33, 'II.b', '3516300', 1),
(215, 9, 'II.c', '2526200', 1),
(216, 11, 'II.c', '2605800', 1),
(217, 13, 'II.c', '2687800', 1),
(218, 15, 'II.c', '2772500', 1),
(219, 17, 'II.c', '2859800', 1),
(220, 19, 'II.c', '2949900', 1),
(221, 21, 'II.c', '3042800', 1),
(222, 23, 'II.c', '3138600', 1),
(223, 25, 'II.c', '3237500', 1),
(224, 27, 'II.c', '3339400', 1),
(225, 29, 'II.c', '3444600', 1),
(226, 31, 'II.c', '3553100', 1),
(227, 33, 'II.c', '3665000', 1),
(229, 9, 'II.d', '2633100', 1),
(230, 9, 'I.b', '1870700', 1),
(231, 9, 'I.c', '1949800', 1),
(232, 9, 'I.d', '2032300', 1),
(233, 11, 'II.d', '2716000', 1),
(235, 15, 'II.d', '2889800', 1),
(236, 17, 'II.d', '2980800', 1),
(237, 19, 'II.d', '3074700', 1),
(238, 21, 'II.d', '3171500', 1),
(239, 23, 'II.d', '3271400', 1),
(240, 25, 'II.d', '3374400', 1),
(241, 27, 'II.d', '3480700', 1),
(242, 29, 'II.d', '3590300', 1),
(243, 31, 'II.d', '3703400', 1),
(245, 33, 'II.d', '3820000', 1),
(246, 12, 'III.a', '3106900', 1),
(247, 12, 'III.b', '3238300', 1),
(248, 12, 'III.c', '3375300', 1),
(249, 12, 'III.d', '2518100', 1),
(250, 14, 'III.a', '3204700', 1),
(251, 14, 'III.b', '3340400', 1),
(252, 14, 'III.c', '3481600', 1),
(253, 14, 'III.d', '3481600', 1),
(254, 16, 'III.a', '3305700', 1),
(255, 16, 'III.b', '3445500', 1),
(256, 16, 'III.c', '3591200', 1),
(257, 16, 'III.d', '3743100', 1),
(258, 18, 'III.a', '3409800', 1),
(259, 18, 'III.b', '3554000', 1),
(260, 18, 'III.c', '3704300', 1),
(261, 18, 'III.d', '3982600', 1),
(262, 0, 'III.d', '2920800', 1),
(263, 20, 'III.a', '3517200', 1),
(264, 20, 'III.b', '3665900', 1),
(265, 20, 'III.c', '3821000', 1),
(266, 20, 'III.d', '3982600', 1),
(267, 22, 'III.a', '3627900', 1),
(268, 22, 'III.b', '3781400', 1),
(269, 22, 'III.c', '3941400', 1),
(270, 22, 'III.d', '4108100', 1),
(271, 24, 'III.a', '3742200', 1),
(272, 24, 'III.b', '3900500', 1),
(273, 24, 'III.c', '4065500', 1),
(274, 24, 'III.d', '4237500', 1),
(275, 26, 'III.a', '3860100', 1),
(276, 26, 'III.b', '4023300', 1),
(277, 26, 'III.c', '4193500', 1),
(278, 26, 'III.d', '4370900', 1),
(279, 28, 'III.a', '3981600', 1),
(280, 28, 'III.b', '4150100', 1),
(281, 28, 'III.c', '4325600', 1),
(282, 28, 'III.d', '4508600', 1),
(283, 30, 'III.a', '4107000', 1),
(284, 30, 'III.b', '4280800', 1),
(285, 30, 'III.c', '4461800', 1),
(286, 30, 'III.d', '4650600', 1),
(287, 32, 'III.a', '4236400', 1),
(288, 32, 'III.b', '4415600', 1),
(289, 32, 'III.c', '4602400', 1),
(290, 32, 'III.d', '4797000', 1),
(291, 12, 'IV.a', '3666900', 1),
(292, 12, 'IV.b', '3822000', 1),
(293, 12, 'IV.c', '4109100', 1),
(294, 12, 'IV.d', '4152200', 1),
(295, 12, 'IV.e', '4327800', 1),
(296, 14, 'IV.a', '3782400', 1),
(297, 14, 'IV.b', '3942400', 1),
(298, 14, 'IV.c', '4109100', 1),
(299, 14, 'IV.d', '4282900', 1),
(300, 14, 'IV.e', '4464100', 1),
(301, 16, 'IV.a', '3901500', 1),
(302, 16, 'IV.b', '4066500', 1),
(303, 16, 'IV.c', '4238500', 1),
(304, 16, 'IV.d', '4417800', 1),
(305, 16, 'IV.e', '4604700', 1),
(306, 18, 'IV.a', '4024400', 1),
(307, 18, 'IV.b', '4194600', 1),
(308, 18, 'IV.c', '4372000', 1),
(309, 18, 'IV.d', '4557000', 1),
(310, 18, 'IV.e', '4749700', 1),
(311, 20, 'IV.a', '4151100', 1),
(312, 20, 'IV.b', '4326700', 1),
(313, 20, 'IV.c', '4509700', 1),
(314, 20, 'IV.d', '4700500', 1),
(315, 20, 'IV.e', '4899300', 1),
(316, 22, 'IV.a', '4281800', 1),
(317, 22, 'IV.b', '4463000', 1),
(318, 22, 'IV.c', '4651800', 1),
(319, 22, 'IV.d', '4848500', 1),
(320, 22, 'IV.e', '5053600', 1),
(321, 24, 'IV.a', '4416700', 1),
(322, 24, 'IV.b', '4603500', 1),
(323, 24, 'IV.c', '4798300', 1),
(324, 24, 'IV.d', '5001200', 1),
(325, 24, 'IV.e', '5212800', 1),
(326, 26, 'IV.a', '4555800', 1),
(327, 26, 'IV.b', '4748500', 1),
(328, 26, 'IV.c', '4949400', 1),
(329, 26, 'IV.d', '5158700', 1),
(330, 26, 'IV.e', '5377000', 1),
(331, 28, 'IV.a', '4699300', 1),
(332, 28, 'IV.b', '4898100', 1),
(333, 28, 'IV.c', '5015300', 1),
(334, 28, 'IV.d', '5321200', 1),
(335, 28, 'IV.e', '5546300', 1),
(336, 30, 'IV.a', '4847300', 1),
(337, 30, 'IV.b', '5052300', 1),
(338, 30, 'IV.c', '5266100', 1),
(339, 30, 'IV.d', '5488800', 1),
(340, 30, 'IV.e', '5721000', 1),
(341, 32, 'IV.a', '5000000', 1),
(342, 32, 'IV.b', '5211500', 1),
(343, 32, 'IV.c', '5431900', 1),
(344, 32, 'IV.d', '5661700', 1),
(345, 32, 'IV.e', '5901200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(15) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
('I.a', 'Juru Muda'),
('I.b', 'Juru Muda Tingkat I'),
('I.c', 'Juru'),
('I.d', 'Juru Tingkat I'),
('II.a', 'Pengatur Muda'),
('II.b', 'Pengatur Muda Tingkat 1'),
('II.c', 'Pengatur'),
('II.d', 'Pengatur Tingkat I'),
('III.a', 'Penata Muda'),
('III.b', 'Penata Muda Tingkat I'),
('III.c', 'Penata'),
('III.d', 'Penata Tingkat I'),
('IV.a', 'Pembina'),
('IV.b', 'Pembina Tingkat I'),
('IV.c', 'Pembina Utama Muda'),
('IV.d', 'Pembina Utama Madya'),
('IV.e', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `no_instansi` varchar(255) NOT NULL,
  `kd_pos` varchar(255) NOT NULL,
  `pemerintah` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `nip_kepala_instansi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_status` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `sektor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `no_instansi`, `kd_pos`, `pemerintah`, `nama_instansi`, `nip_kepala_instansi`, `alamat`, `kecamatan`, `status`, `nama_status`, `provinsi`, `telepon`, `fax`, `email`, `website`, `sektor`) VALUES
(1, '', '16914', 'Pemerintah Kabupaten Bogor', 'Dinas Pemadam Kebakaran', '201237034', 'Jl. Tegar beriman - Cibinong', 'Cibinong', 'Kabupaten', 'Bogor', 'Jawa Barat', '(021)87929445', '(021)83719100 ', 'dpk.kabbogor@gmail.com', 'damkar.bogorkab.go.id', 'Sektor Cibinong (021) 8753547,  Sektor Ciawi (0251) 8291505; \r\nSektor Leuwiliang (0251) 8642333, Sektor Parung (0251) 8412487, Sektor Ciomas (0251) 7587113, Sektor Cileungsi (021) 80470113\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kgb_terakhir`
--

CREATE TABLE `kgb_terakhir` (
  `id_kgb` int(11) NOT NULL,
  `no_kgb` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `id_golongan_terakhir` varchar(255) NOT NULL,
  `tgl_kgb_terakhir` date NOT NULL,
  `tgl_surat_terakhir` date NOT NULL,
  `percepatan_kgb` int(10) NOT NULL,
  `periode_kgb` int(10) NOT NULL,
  `penundaan_kgb` int(10) NOT NULL,
  `mkg_tahun_kgb` int(40) NOT NULL,
  `mkg_bulan_kgb` int(12) NOT NULL,
  `gapok_terakhir` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL,
  `sk_kgb_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgb_terakhir`
--

INSERT INTO `kgb_terakhir` (`id_kgb`, `no_kgb`, `nip`, `id_golongan_terakhir`, `tgl_kgb_terakhir`, `tgl_surat_terakhir`, `percepatan_kgb`, `periode_kgb`, `penundaan_kgb`, `mkg_tahun_kgb`, `mkg_bulan_kgb`, `gapok_terakhir`, `pp`, `sk_kgb_terakhir`) VALUES
(1, '', '198107142010011001', 'III.d', '2020-03-15', '2020-05-19', 0, 2, 2, 14, 0, '3481600', 'PP.No. 15 Tahun 2019', 'KGB_2020_198107142010011001_3.pdf'),
(3, '', '01239801231', 'I.b', '2020-05-06', '2020-05-25', 0, 2, 0, 6, 0, '', '', 'KGB_2019_009712932123_1590400427.pdf'),
(4, '11/DPK/2', '201237034', 'II.d', '2018-03-17', '2018-05-17', 0, 2, 0, 10, 2, '4748500', 'PP.No. 15 Tahun 2019', 'KGB_2020_201237034.pdf'),
(5, '', '3123', 'II.a', '2020-03-13', '2020-05-20', 0, 2, 0, 4, 2, '', '', 'KGB_2020_3123_2_1589939985.pdf'),
(6, '22', '232', 'II.b', '2020-03-16', '2020-03-03', 0, 2, 0, 2, 1, '232', 'asd', 'KGB_2020_198107142010011001_1589758794.pdf'),
(7, '', '097128371111283', 'II.a', '2020-01-30', '2020-08-11', 0, 2, 0, 15, 0, '2552000', 'PP.No. 15 Tahun 2019', '13.1.03.03.0089_1597172730.pdf'),
(8, '11/DPK/Sekda', '009712932123', 'II.d', '2018-09-13', '2018-05-02', 0, 2, 0, 11, 0, '2590200', 'PP No 15 Tahun 2015', 'KGB_2020_01239801231_1589855188.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat_terakhir`
--

CREATE TABLE `pangkat_terakhir` (
  `id_naik_pangkat` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `tgl_pangkat_terakhir` date NOT NULL,
  `percepatan_kenaikan` int(10) NOT NULL,
  `periode_kenaikan` int(10) NOT NULL,
  `penundaan_kenaikan` int(10) NOT NULL,
  `mkg_tahun` int(255) NOT NULL,
  `mkg_bulan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat_terakhir`
--

INSERT INTO `pangkat_terakhir` (`id_naik_pangkat`, `nip`, `tgl_pangkat_terakhir`, `percepatan_kenaikan`, `periode_kenaikan`, `penundaan_kenaikan`, `mkg_tahun`, `mkg_bulan`) VALUES
(27, '198107142010011001', '2020-04-14', 0, 4, 0, 2, 8),
(28, '01239801231', '2020-03-17', 0, 4, 1, 0, 0),
(29, '201237034', '2016-03-15', 0, 4, 0, 10, 9),
(30, '3123', '2020-03-03', 0, 4, 0, 24, 2),
(31, '232', '2020-03-17', 0, 4, 0, 24, 2),
(32, '097128371111283', '2020-02-09', 0, 4, 0, 14, 0),
(33, '009712932123', '2017-05-02', 0, 4, 0, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_golongan` varchar(255) NOT NULL,
  `kd_instansi` int(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `keterangan_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `id_golongan`, `kd_instansi`, `pendidikan`, `keterangan_pendidikan`) VALUES
('009712932123', 'Suherman', 'I.d', 1, 'SMA/SMK', 'SMA IPA'),
('01239801231', 'Tito Shadam ', 'I.b', 1, 'SMA/SMK', 'SMK '),
('097128371111283', 'M Bara Aksayeth, S. Pd', 'II.a', 1, 'D2', 'S1 Pendidikan Guru'),
('198107142010011001', 'DIMAS RAYUSAL', 'III.d', 1, 'S1', 'Ilmu Sosial'),
('201237034', 'Fikih Amar, S. Pd I, Phd.', 'II.d', 1, 'S3', 'Doctoral Ilmu Pemerintahan Oxford'),
('232', '3413', 'II.b', 1, 'D3', 'D2 Pendidikan'),
('3123', 'Bara', 'II.a', 1, 'D3', 'D2 Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(11) NOT NULL,
  `nama_pp` varchar(255) NOT NULL,
  `peruntukan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` (`id_peraturan`, `nama_pp`, `peruntukan`, `keterangan`) VALUES
(1, 'PP.No. 15 Tahun 2019', 'kgb', 'Peraturan Pemerintah Rebuplik Indonesia Nomor 15 tahun 2019 tentang perubahan Kelima belas atas Peraturan Pemerintah  Nomor 34 Tahun 1977 tentang Peraturan  Gaji  Pegawai  Negeri  Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `images`) VALUES
(1, 'Fikih Amar', 'admin', 'fikihamar05@gmail.com', '0192023a7bbd73250516f069df18b500', 'IMG_20191223_141310_513_1596305309.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_kgb`
--
ALTER TABLE `arsip_kgb`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `gaji_pokok`
--
ALTER TABLE `gaji_pokok`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kgb_terakhir`
--
ALTER TABLE `kgb_terakhir`
  ADD PRIMARY KEY (`id_kgb`);

--
-- Indexes for table `pangkat_terakhir`
--
ALTER TABLE `pangkat_terakhir`
  ADD PRIMARY KEY (`id_naik_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_kgb`
--
ALTER TABLE `arsip_kgb`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `gaji_pokok`
--
ALTER TABLE `gaji_pokok`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kgb_terakhir`
--
ALTER TABLE `kgb_terakhir`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pangkat_terakhir`
--
ALTER TABLE `pangkat_terakhir`
  MODIFY `id_naik_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
