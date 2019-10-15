-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 06:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikiip03`
--

-- --------------------------------------------------------

--
-- Table structure for table `datafamilia`
--

CREATE TABLE `datafamilia` (
  `id_familia` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_hubungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_familia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_familia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_familia` date NOT NULL,
  `jenis_kelamin_familia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datafamilia`
--

INSERT INTO `datafamilia` (`id_familia`, `nik`, `jenis_hubungan`, `nama_familia`, `tempat_lahir_familia`, `tanggal_lahir_familia`, `jenis_kelamin_familia`, `created_at`, `updated_at`) VALUES
(12, '156789', 'Anak', 'Ame D. Silver Moon', 'Bandung', '2019-08-24', 'Laki-laki', '2019-08-18 22:01:40', '2019-08-18 22:01:40'),
(14, '160196', 'Istri', 'Luna D. Silver Moon', 'Bandung Timur', '2019-08-06', 'Perempuan', '2019-08-20 00:12:46', '2019-08-20 10:50:12'),
(18, '160196', 'Anak', 'Ame D. Silver Moon', 'Bandung Timur', '2019-08-06', 'Laki-laki', '2019-08-20 23:43:20', '2019-08-20 23:43:20'),
(19, '160196', 'Anak', 'Hare D. Silver Moon', 'Bandung Barat', '2019-08-14', 'Laki-laki', '2019-08-20 23:43:54', '2019-08-20 23:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `datakaryawan`
--

CREATE TABLE `datakaryawan` (
  `id` bigint(11) NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sidik_jari` int(20) NOT NULL,
  `card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_kerja` date NOT NULL,
  `alamat_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bpjs_ketenagakerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_bpjs_ketenagakerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bpjs_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_bpjs_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_darurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hub_no_telp_darurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_hubungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_resign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_resign` date DEFAULT NULL,
  `foto_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datakaryawan`
--

INSERT INTO `datakaryawan` (`id`, `nik`, `id_sidik_jari`, `card_id`, `nama_karyawan`, `email`, `divisi`, `masa_kerja`, `alamat_ktp`, `alamat_tinggal`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `no_ktp`, `foto_kk`, `foto_ktp`, `no_bpjs_ketenagakerjaan`, `foto_bpjs_ketenagakerjaan`, `no_bpjs_kesehatan`, `foto_bpjs_kesehatan`, `no_npwp`, `no_rekening`, `nama_bank`, `nama_rekening`, `foto_npwp`, `no_telp_darurat`, `hub_no_telp_darurat`, `status_hubungan`, `status_kerja`, `alasan_resign`, `tanggal_resign`, `foto_karyawan`, `created_at`, `updated_at`) VALUES
(29, '00012018', 103, NULL, 'Agus Subarnas', 'agus@kanayavisual.co', 'Direktur Utama', '2018-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-10-14 05:19:15', '2019-10-14 05:19:15'),
(5, '0002009', 0, '', 'Noudie De Jong', 'noudie@ideaimaji.com', 'CEO', '2009-01-01', 'Komp. Alam Melati B4 RT 003/023, Antapani Tengah-Bandung, Jawa Barat', 'Komp. Alam Melati B4 RT 003/023, Antapani Tengah-Bandung, Jawa Barat', 'Jakarta', '1982-02-20', '0811149613', '3273202002820000', NULL, NULL, NULL, NULL, '0', NULL, '67.931.613.3-429.000', '0', NULL, '', NULL, NULL, 'istri (Rian Wulan)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 21:48:42', '2019-09-25 21:47:17'),
(30, '00022018', 102, NULL, 'Aji Pasha Isdiyanto', 'aji@kanayavisual.co', 'Direktur Operasional', '2018-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-10-14 05:22:09', '2019-10-14 05:22:09'),
(32, '00032018', 106, NULL, 'Dimas Romiyanto', 'dimas@kanayavisual.co', 'Senior Editor', '2018-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-10-14 05:26:52', '2019-10-14 05:26:52'),
(33, '00052018', 105, NULL, 'Neng Ani Suryani', 'ani@kanayavisual.co', 'Script Writter', '2018-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-10-14 05:28:01', '2019-10-14 05:28:01'),
(31, '00082018', 104, NULL, 'Frian Indrasmara', 'frian@kanayavisual.co', 'Line Producer', '2018-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-10-14 05:23:02', '2019-10-14 05:23:02'),
(11, '0012018', 79, '', 'Itong Sutisna', 'tidakada@tidakada.com', 'Driver & Office Boy', '2018-01-10', 'Bojong Cijerah RT 004 RW 013 Cangkuang Kulon Dayeuh Kolot Kab Bandung', 'Bojong Cijerah RT 004 RW 013 Cangkuang Kulon Dayeuh Kolot Kab Bandung', 'Bandung', '1976-08-17', '085720441555', '3204121708760003', NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, NULL, 'Liyani (Istri)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 23:33:49', '2019-08-29 03:15:34'),
(20, '0012019', 93, '5467115247', 'Satrio Budyo A', 'satrio@ideaimaji.com', 'Technology Lead', '2019-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '24.851.761.7-013.000', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8650.jpg', '2019-08-27 02:45:52', '2019-09-29 19:11:46'),
(21, '0022019', 96, '', 'Mitta Mukti Lestari', 'mitta@ideaimaji.com', 'HRBP', '2019-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '45.182.800.8-429.999', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8675.jpg', '2019-08-27 02:47:49', '2019-09-29 19:15:25'),
(9, '0032016', 26, '', 'Rantika Mayang Suri', 'rantika@ideaimaji.com', 'Account Executive', '2016-05-02', 'Komp. Cibolerang G.70 RT 004/007 Kel. Margahayu Utara Kec. Babakan Ciparay Bandung', 'Komp. Cibolerang G.70 RT 004/007 Kel. Margahayu Utara Kec. Babakan Ciparay Bandung', 'Bandung', '1994-03-01', '081910002752', '3273034103940004', NULL, NULL, NULL, NULL, '0', NULL, '90.641.980.9-422.000', '0', NULL, '', NULL, '081223800520', 'Yuli (ibu)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 23:05:37', '2019-09-25 22:02:15'),
(12, '0032018', 81, '', 'Adila Fasa', 'adila@ideaimaji.com', 'Socmed Executive', '2018-02-15', 'JL.Raya Cililin N0 19 Cililin Kab Bandung', 'JL.Raya Cililin N0 19 Cililin Kab Bandung', 'Bandung', '1992-06-05', '085284511777', '3217114506920010', NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, '085222485482', 'Yani (Ibu)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:09:18', '2019-08-29 03:20:03'),
(22, '0032019', 98, '', 'Adizta Putri Sekarwangi', 'adista@ideaimaji.com', 'Digital Associate', '2019-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '91.416.598.0-447.000', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:50:00', '2019-09-25 22:03:27'),
(13, '0042018', 94, '', 'Heni Setiawati', 'heni@ideaimaji.com', 'Admin & Finance', '2018-03-15', 'Jl. Cikajang XI No 10 RT 004/021 Antapani tengah Bandung', 'Jl. Cikajang XI No 10 RT 004/021 Antapani tengah Bandung', 'Bandung', '1984-07-07', '083822052600', '3273204707840001', NULL, NULL, NULL, NULL, '0', NULL, '79.254.823.2-429.000', '0', NULL, '', NULL, '081395083307', 'Priaga (Suami)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:10:55', '2019-08-29 03:23:39'),
(26, '0042019', 99, NULL, 'Aldilas Akbar Satria', 'aldilasakbar@gmail.com', 'Videographer / Photographer', '2019-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-09-29 19:37:19', '2019-09-29 19:37:19'),
(14, '0052018', 83, '', 'Winona Octora', 'winona@ideaimaji.com', 'Design Graphic', '2018-05-23', 'Perum GPI Jl. Pyrus 4 No. 18 RT 07 RW 10, Padalarang', 'Jl. Dipatiukur No. 62A, Lebakgede, Coblong, Bandung', 'Sumedang', '1995-04-05', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '90.394.066.6-421.000', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8807.jpg', '2019-08-27 02:12:35', '2019-09-29 19:09:00'),
(23, '0052019', 100, '', 'Yas Budaya', 'yas@ideaimaji.com', 'Head of Creative', '2019-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '25.828.630.1-429.000', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:51:46', '2019-09-25 21:59:47'),
(27, '0062019', 101, NULL, 'Gilang Permana', 'gilangpermana596@gmail.com', 'Digital Media Planner', '2019-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-09-29 19:40:42', '2019-09-29 19:40:42'),
(7, '0072015', 54, '', 'Afis Siswantini', 'afis@ideaimaji.com', 'Socmed Executive', '2015-08-24', 'Jl. Bojongkoneng No.99 RT03/RW13 Sukapada - Cibeunying Kidul', 'Jl. Bojongkoneng No.99 RT03/RW13 Sukapada - Cibeunying Kidul', 'Bandung', '1992-06-12', '082115272226', '3277011602870020', NULL, NULL, NULL, NULL, '0', NULL, '85.405.995.3-423.000', '0', NULL, '', NULL, '85793000763', 'ida (ibu)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 22:42:59', '2019-09-25 22:06:57'),
(10, '0082016', 59, '', 'Eka Satria Perdana', 'eka@ideaimaji.com', 'Content Planner', '2016-08-08', 'Jl. Permata Bumi IV RT 006/003 Cisaranten Kulon Arcamanik', 'Jl. Permata Bumi IV RT 006/003 Cisaranten Kulon Arcamanik', 'Bandung', '1988-01-06', '081221468056', '3204140601880000', NULL, NULL, NULL, NULL, '0', NULL, '54.045.253.9-445.000', '0', NULL, '', NULL, '082129084959', 'Lusi (Istri)', NULL, 'Aktif', NULL, NULL, 'DSC_8758.jpg', '2019-08-26 23:25:50', '2019-09-29 19:12:38'),
(15, '0082018', 87, '', 'Bala Putra Dewa', 'putra@ideaimaji.com', 'Jr. IT Developer', '2018-06-20', 'Jalan Bagusrangin 1 No. 72/50, Bandung, Jawa Barat', 'Jl. Venus No. 10, Margahayu, Bandung', 'Sekayu', '1993-08-08', '082117442171', '3273020808930010', NULL, NULL, NULL, NULL, '0', NULL, '85.313.305.6-423.000', '0', NULL, '', NULL, '082129969752', 'Marlius (Keluarga)', NULL, 'Aktif', NULL, NULL, 'DSC_8774.jpg', '2019-08-27 02:14:47', '2019-09-29 19:10:45'),
(16, '0092018', 86, '', 'Ibnu Alif Prabowo', 'ibnu@ideaimaji.com', 'Graphic Designer', '2018-06-21', 'Jl. Diponegoro No. 31 Selong, Lombok Timur', 'Jl. Neptunus Timur No. 25 D', 'Selong', '1996-08-05', '087890390781', '5203070508960000', NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8717a.jpg', '2019-08-27 02:16:30', '2019-09-29 19:14:20'),
(8, '0102015', 57, '', 'Ikra Amesta Wisnu', 'ikra@ideaimaji.com', 'Digital Analis', '2015-10-01', 'Jl. Pondok Mas Indah IV No.70 RT001/RW001 Leuwigajah - Cimahi Selatan', 'Jl. Pondok Mas Indah IV No.70 RT001/RW001 Leuwigajah - Cimahi Selatan', 'Bandung', '1987-02-16', '08122039160', NULL, NULL, NULL, NULL, NULL, '0', NULL, '25.058.992.6-421.000', '0', NULL, '', NULL, '0818671107', 'Ratri (istri)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 22:44:24', '2019-09-25 22:09:17'),
(6, '0112014', 38, '', 'Tasya Yoesni Caesar', 'tasya@ideaimaji.com', 'Content Producer', '2003-06-19', 'kp. Ciganitri mukti no. 138 RT 001/011 Bojongsoang Bandung', 'kp. Ciganitri mukti no. 138 RT 001/011 Bojongsoang Bandung', 'Jakarta', '1986-03-12', '0896999980', '3204085203860000', NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, '089969979793', 'adit (ex husband)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-26 22:39:43', '2019-08-28 22:00:42'),
(25, '0112018', 88, '', 'Nova Nurdiana', 'nova@ideaimaji.com', 'Tax & Finance Manager', '2018-08-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.475.504.4-424.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8694.jpg', '2019-08-28 21:27:26', '2019-09-29 19:17:07'),
(24, '0142018', 0, '', 'Rizki Fajar Nugraha', 'rizki@ideaimaji.com', 'CMO', '2018-09-01', 'JL Anggrek V No 17 RT 05 RW 05 Larangan - Tangerang', 'Jl. Buah Batu Dalam III No. 9 Kel. Cijagra Kec. Lengkong, Bandung', 'Pomalaa', '1981-03-05', '08111011834', '3273130503810003', NULL, NULL, NULL, NULL, NULL, NULL, '68.296.694.0-416.000', NULL, NULL, NULL, NULL, NULL, 'Mira Dewi Kania (Istri)', NULL, 'Aktif', NULL, NULL, NULL, '2019-08-28 21:23:28', '2019-08-28 21:56:37'),
(17, '0152018', 89, '', 'Atlas Galant Sedhandoyo', 'atlas@ideaimaji.com', 'Account Executive', '2018-08-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:22:08', '2019-09-25 22:12:08'),
(18, '0162018', 91, '', 'Ben Aryandiaz Herawan', 'ben@ideaimaji.com', 'Content Planner', '2018-12-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'tidak punya NPWP', '0', NULL, '', NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-08-27 02:42:45', '2019-09-25 22:12:35'),
(19, '0172018', 92, '', 'Aripan N. M. Ramdan', 'aripan@ideaimaji.com', 'Motion / Editor', '2018-12-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '86.107.121-5-423.000', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, 'DSC_8666.jpg', '2019-08-27 02:44:34', '2019-10-12 21:58:14'),
(28, '0182018', 97, NULL, 'Sri Maryatun', 'sri@gmail.com', 'Housekeeping', '2009-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, '2019-09-29 19:43:00', '2019-10-09 01:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `default`
--

CREATE TABLE `default` (
  `id_default` bigint(20) UNSIGNED NOT NULL,
  `nama_default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default`
--

INSERT INTO `default` (`id_default`, `nama_default`, `nilai_default`, `created_at`, `updated_at`) VALUES
(1, 'password', 'ideaimaji', NULL, '2019-09-29 20:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `default_gaji`
--

CREATE TABLE `default_gaji` (
  `id_default_gaji` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengalaman_bulan` int(255) DEFAULT NULL,
  `gaji_pokok` int(255) DEFAULT NULL,
  `T_profesi` int(11) DEFAULT NULL,
  `T_jabatan` int(255) DEFAULT NULL,
  `T_kinerja` int(255) DEFAULT NULL,
  `T_khusus` int(255) DEFAULT NULL,
  `T_transport` int(255) DEFAULT NULL,
  `basic_gaji_perhitungan_bpjs_kesehatan` int(255) DEFAULT NULL,
  `basic_gaji_perhitungan_bpjs_ketenagakerjaan` int(255) DEFAULT NULL,
  `insentif` int(255) DEFAULT NULL,
  `bonus` int(255) DEFAULT NULL,
  `masa_kerja` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_gaji`
--

INSERT INTO `default_gaji` (`id_default_gaji`, `nik`, `pengalaman_tanggal`, `pengalaman_bulan`, `gaji_pokok`, `T_profesi`, `T_jabatan`, `T_kinerja`, `T_khusus`, `T_transport`, `basic_gaji_perhitungan_bpjs_kesehatan`, `basic_gaji_perhitungan_bpjs_ketenagakerjaan`, `insentif`, `bonus`, `masa_kerja`, `status`, `created_at`, `updated_at`) VALUES
(1, '0002009', '1-Jan', 204, 3200000, 4352000, 12500000, 0, 7000000, 15000, 4100000, 3340000, 0, 0, 12, 'TK/2', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(2, '0142018', '1-Jan', 204, 3200000, 4352000, 10000000, 0, 7000000, 15000, 4100000, 3340000, 0, 0, 12, 'K/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(3, '0052019', '19-Mar', 124, 3200000, 2645333, 2000000, 940000, 0, 0, 4100000, 3340000, 0, 0, 5, 'K/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(4, '0102015', '15-Oct', 39, 3200000, 832000, 1000000, 940000, 500000, 15000, 4100000, 3340000, 0, 0, 12, 'K/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(5, '0062019', '19-Feb', 53, 3200000, 1130667, 0, 940000, -500000, 0, 0, 0, 0, 0, 5, 'K/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(6, '0112014', '14-Jun', 55, 3200000, 1173333, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 12, 'TK/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(7, '0072015', '15-Aug', 41, 3200000, 874667, 1000000, 940000, 0, 15000, 0, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(8, '0052018', '18-May', 8, 3200000, 170667, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(9, '0092018', '18-Jun', 7, 3200000, 149333, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(10, '0172018', '15-Dec', 37, 3200000, 789333, 0, 940000, -500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(11, '0042019', '19-Apr', 3, 3200000, 64000, 0, 940000, 0, 0, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(12, '0082016', '12-Jun', 79, 3200000, 1685333, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'K/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(13, '0162018', '16-Sep', 28, 3200000, 597333, 0, 940000, 0, 15000, 0, 3340000, 0, 0, 12, 'K/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(14, '0012019', '12-Jul', 78, 3200000, 1664000, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 12, 'K/3', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(15, '0082018', '18-Jun', 7, 3200000, 149333, 0, 940000, 500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(16, '0032019', '19-Mar', 0, 3200000, 0, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 10, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(17, '0032018', '18-Feb', 11, 3200000, 234667, 1000000, 940000, -500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(18, '0032016', '14-Nov', 50, 3200000, 1066667, 0, 940000, 500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(19, '0152018', '18-Aug', 5, 3200000, 106667, 0, 940000, 500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(20, '0022019', '9-Nov', 110, 3200000, 2346667, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 11, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(21, '0112018', '8-Jun', 127, 3200000, 2709333, 1000000, 940000, 0, 15000, 4100000, 0, 0, 0, 12, 'TK/0', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(22, '0042018', '12-Feb', 83, 3200000, 1770667, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'K/2', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(23, '0012018', '', 0, 3200000, 150000, 0, 0, 0, 0, 3340000, 3340000, 0, 0, 12, 'K/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(24, '0182018', '', 0, 3200000, 150000, 0, 0, 0, 0, 0, 3340000, 0, 0, 12, 'K/1', '2019-09-16 21:46:03', '2019-09-16 21:46:03'),
(29, '00012018', NULL, NULL, 8500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', '2019-10-14 05:19:15', '2019-10-14 05:19:15'),
(30, '00022018', NULL, NULL, 7500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', '2019-10-14 05:22:09', '2019-10-14 05:22:09'),
(31, '00082018', NULL, NULL, 5500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', '2019-10-14 05:23:02', '2019-10-14 05:23:02'),
(32, '00032018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', '2019-10-14 05:26:52', '2019-10-14 05:26:52'),
(33, '00052018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', '2019-10-14 05:28:01', '2019-10-14 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `default_presensi`
--

CREATE TABLE `default_presensi` (
  `id_default_presensi` bigint(20) UNSIGNED NOT NULL,
  `id_sidik_jari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_rekap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_diluar_tanggungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_penting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispensasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdsd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stsd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_tahunan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa_cuti_tahunan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_cuti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_presensi`
--

INSERT INTO `default_presensi` (`id_default_presensi`, `id_sidik_jari`, `periode_rekap`, `ijin`, `jumlah_absen`, `cuti_diluar_tanggungan`, `cuti_penting`, `dispensasi`, `sdsd`, `stsd`, `cuti_tahunan`, `sisa_cuti_tahunan`, `keterangan`, `keterangan_cuti`, `created_at`, `updated_at`) VALUES
(1, '0', NULL, '', '', '', '', '', '', '', '', '12', '', '', '2019-09-18 20:22:14', '2019-09-18 20:22:14'),
(2, '0', NULL, '', '', '', '', '', '', '', '', '12', '', '', '2019-09-18 20:22:14', '2019-09-18 20:22:14'),
(3, '57', '2019-08-21 2019-09-20', '0', '0', '', '0', '3', '0', '6', '6', '6', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(4, '38', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '5', '6', '6', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(5, '83', '2019-08-21 2019-09-20', '4', '0', '', '2', '0', '0', '6', '6', '2', 'Dapat Cuti 20-5-19', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(6, '86', '2019-08-21 2019-09-20', '4', '0', '', '0', '0', '0', '7', '0', '7', 'Dapat cuti 21-6-19', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(7, '92', '2019-08-21 2019-09-20', '3', '0', '', '0', '1', '1', '2', '0', '0', 'Dapat cuti 3-12-19', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(8, '59', '2019-08-21 2019-09-20', '1', '0', '', '0', '5', '0', '7', '8', '4', '', 'Cuti Bersama 3 hari + jatah STSD habis (1 hari)', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(9, '91', '2019-08-21 2019-09-20', '1', '0', '', '0', '0', '4', '3', '0', '0', 'Dapat cuti 3-12-19', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(10, '93', '2019-08-21 2019-09-20', '6', '0', '', '0', '2', '0', '7', '0', '0', 'Dapat Cuti 15-1-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(11, '87', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '3', '7', '6', '4', 'Dapat Cuti 19-3-19', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(12, '98', '2019-08-21 2019-09-20', '0', '0', '', '2', '0', '2', '2', '0', '0', 'Dapat Cuti 11-3-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(13, '54', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '3', '3', '9', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(14, '81', '2019-08-21 2019-09-20', '1', '0', '', '0', '0', '0', '1', '3', '9', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(15, '26', '2019-08-21 2019-09-20', '2', '0', '', '5', '6', '0', '1', '11', '1', '', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(16, '89', '2019-08-21 2019-09-20', '7', '0', '', '0', '1', '0', '4', '0', '5', 'Dapat Cuti 28-8-19', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(17, '96', '2019-08-21 2019-09-20', '3', '0', '', '0', '0', '0', '2', '0', '0', 'Dapat Cuti 18-2-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(18, '88', '2019-08-21 2019-09-20', '4', '0', '2', '3', '0', '3', '7', '0', '5', 'Dapat Cuti 15-8-19', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(19, '94', '2019-08-21 2019-09-20', '0', '0', '', '5', '6', '5', '1', '5', '5', 'Dapat Cuti 15-3-19', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(20, '79', '2019-08-21 2019-09-20', '0', '0', '', '0', '2', '0', '1', '3', '9', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(21, '97', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '0', '5', '7', '', 'Cuti Bersama 3 hari', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(22, '100', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '0', '0', '0', 'Dapat Cuti 1-8-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(23, '99', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '0', '0', '0', 'Dapat Cuti 1-8-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(24, '101', '2019-08-21 2019-09-20', '0', '0', '', '0', '0', '0', '0', '0', '0', 'Dapat Cuti 12-8-20', '', '2019-09-18 20:22:14', '2019-10-03 00:05:41'),
(29, '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 05:19:15', '2019-10-14 05:19:15'),
(30, '102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 05:22:09', '2019-10-14 05:22:09'),
(31, '104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 05:23:02', '2019-10-14 05:23:02'),
(32, '106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 05:26:52', '2019-10-14 05:26:52'),
(33, '105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-14 05:28:01', '2019-10-14 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(10) UNSIGNED NOT NULL,
  `nama_divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `nik`, `created_at`, `updated_at`) VALUES
(10, 'CMO', '0002009', NULL, NULL),
(11, 'Head of Creative', '0002009', NULL, NULL),
(12, 'Account Manager', '0142018', NULL, NULL),
(13, 'Senior Account Executive', '0142018', NULL, '2019-09-26 01:45:41'),
(14, 'Account Executive', '0032016', NULL, NULL),
(15, 'Content Producer', '0052019', NULL, NULL),
(16, 'Content Writer', '0112014', NULL, NULL),
(17, 'Videographer / Photographer', '0112014', NULL, NULL),
(18, 'Graphic Designer', '0112014', NULL, NULL),
(19, 'Social Media Manager', '0002009', NULL, NULL),
(20, 'Technology Lead', '0002009', NULL, NULL),
(21, 'Digital Media Planner', '0002009', NULL, NULL),
(22, 'Digital Strategist', '0002009', NULL, NULL),
(23, 'Digital Analyst', '0002009', NULL, NULL),
(24, 'Tax & Finance Manager', '0002009', NULL, NULL),
(25, 'HR Manager', '0002009', NULL, NULL),
(26, 'Jr. IT Developer', '0012019', NULL, NULL),
(27, 'Freelancer Social Media', '0032018', NULL, NULL),
(28, 'Digital Associate', '0032019,0102015,0062019', NULL, '2019-09-26 02:25:33'),
(29, 'Admin & Finance', '0112018', NULL, NULL),
(30, 'Admin', '0022019', NULL, NULL),
(32, 'Content Planner', '0112014,0072015', NULL, '2019-09-26 01:59:03'),
(33, 'Housekeeping', '0022019', '2019-09-18 01:11:56', '2019-09-18 01:11:56'),
(34, 'Motion / Editor', '0112014,0072015', '2019-09-26 01:57:23', '2019-09-26 02:00:40'),
(36, 'Direktur Utama', '0002009', '2019-10-14 04:51:00', '2019-10-14 04:51:00'),
(37, 'Direktur Operasional', '00012018', '2019-10-14 04:51:40', '2019-10-14 04:51:40'),
(38, 'Creative Director', '00012018', '2019-10-14 04:52:06', '2019-10-14 04:52:06'),
(39, 'Line Producer', '00012018', '2019-10-14 04:52:19', '2019-10-14 04:52:19'),
(40, 'Senior Editor', '00012018', '2019-10-14 04:52:34', '2019-10-14 04:52:34'),
(41, 'Script Writter', '00012018', '2019-10-14 04:52:51', '2019-10-14 04:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` bigint(20) UNSIGNED NOT NULL,
  `periode_gaji` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengalaman_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengalaman_bulan` int(255) DEFAULT NULL,
  `gaji_pokok` int(255) DEFAULT NULL,
  `T_profesi` int(11) DEFAULT NULL,
  `T_jabatan` int(255) DEFAULT NULL,
  `T_kinerja` int(255) DEFAULT NULL,
  `T_khusus` int(255) DEFAULT NULL,
  `T_transport` int(255) DEFAULT NULL,
  `basic_gaji_perhitungan_bpjs_kesehatan` int(255) DEFAULT NULL,
  `basic_gaji_perhitungan_bpjs_ketenagakerjaan` int(255) DEFAULT NULL,
  `insentif` int(255) DEFAULT NULL,
  `bonus` int(255) DEFAULT NULL,
  `masa_kerja` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potongan` int(255) DEFAULT NULL,
  `keterangan_potongan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `periode_gaji`, `nik`, `pengalaman_tanggal`, `pengalaman_bulan`, `gaji_pokok`, `T_profesi`, `T_jabatan`, `T_kinerja`, `T_khusus`, `T_transport`, `basic_gaji_perhitungan_bpjs_kesehatan`, `basic_gaji_perhitungan_bpjs_ketenagakerjaan`, `insentif`, `bonus`, `masa_kerja`, `status`, `potongan`, `keterangan_potongan`, `created_at`, `updated_at`) VALUES
(1, '2019-08-21 2019-09-20', '00012018', NULL, NULL, 8500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(2, '2019-08-21 2019-09-20', '0002009', '1-Jan', 204, 3200000, 4352000, 12500000, 0, 7000000, 15000, 4100000, 3340000, 0, 0, 12, 'TK/2', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(3, '2019-08-21 2019-09-20', '00022018', NULL, NULL, 7500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(4, '2019-08-21 2019-09-20', '00032018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(5, '2019-08-21 2019-09-20', '00052018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(6, '2019-08-21 2019-09-20', '00082018', NULL, NULL, 5500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(7, '2019-08-21 2019-09-20', '0012018', NULL, NULL, 8500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(8, '2019-08-21 2019-09-20', '0012019', '12-Jul', 78, 3200000, 1664000, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 12, 'K/3', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(9, '2019-08-21 2019-09-20', '0022019', '9-Nov', 110, 3200000, 2346667, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 11, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(10, '2019-08-21 2019-09-20', '0032016', '14-Nov', 50, 3200000, 1066667, 0, 940000, 500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(11, '2019-08-21 2019-09-20', '0032018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(12, '2019-08-21 2019-09-20', '0032019', '19-Mar', 0, 3200000, 0, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 10, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(13, '2019-08-21 2019-09-20', '0042018', '12-Feb', 83, 3200000, 1770667, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'K/2', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(14, '2019-08-21 2019-09-20', '0042019', '19-Apr', 3, 3200000, 64000, 0, 940000, 0, 0, 3340000, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(15, '2019-08-21 2019-09-20', '0052018', NULL, NULL, 3350000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(16, '2019-08-21 2019-09-20', '0052019', '19-Mar', 124, 3200000, 2645333, 2000000, 940000, 0, 0, 4100000, 3340000, 0, 0, 5, 'K/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(17, '2019-08-21 2019-09-20', '0062019', '19-Feb', 53, 3200000, 1130667, 0, 940000, -500000, 0, 0, 0, 0, 0, 5, 'K/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(18, '2019-08-21 2019-09-20', '0072015', '15-Aug', 41, 3200000, 874667, 1000000, 940000, 0, 15000, 0, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(19, '2019-08-21 2019-09-20', '0082016', '12-Jun', 79, 3200000, 1685333, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(20, '2019-08-21 2019-09-20', '0082018', NULL, NULL, 5500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(21, '2019-08-21 2019-09-20', '0092018', '18-Jun', 7, 3200000, 149333, 0, 940000, 0, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(22, '2019-08-21 2019-09-20', '0102015', '15-Oct', 39, 3200000, 832000, 1000000, 940000, 500000, 15000, 4100000, 3340000, 0, 0, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(23, '2019-08-21 2019-09-20', '0112014', '14-Jun', 55, 3200000, 1173333, 1000000, 940000, 0, 15000, 4100000, 3340000, 0, 0, 12, 'TK/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(24, '2019-08-21 2019-09-20', '0112018', '8-Jun', 127, 3200000, 2709333, 1000000, 940000, 0, 15000, 4100000, 0, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(25, '2019-08-21 2019-09-20', '0142018', '1-Jan', 204, 3200000, 4352000, 10000000, 0, 7000000, 15000, 4100000, 3340000, 0, 0, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(26, '2019-08-21 2019-09-20', '0152018', '18-Aug', 5, 3200000, 106667, 0, 940000, 500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(27, '2019-08-21 2019-09-20', '0162018', '16-Sep', 28, 3200000, 597333, 0, 940000, 0, 15000, 0, 3340000, 0, 0, 12, 'K/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(28, '2019-08-21 2019-09-20', '0172018', '15-Dec', 37, 3200000, 789333, 0, 940000, -500000, 15000, 3340000, 3340000, 0, 0, 12, 'TK/0', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50'),
(29, '2019-08-21 2019-09-20', '0182018', '', 0, 3200000, 150000, 0, 0, 0, 0, 0, 3340000, 0, 0, 12, 'K/1', NULL, NULL, '2019-10-14 06:10:50', '2019-10-14 06:10:50');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_08_025802_create_data_karyawan_table', 2),
(4, '2019_08_08_034456_create_data_familia_table', 2),
(5, '2019_08_13_021711_create_riwayat_pendidikan_table', 3),
(6, '2019_08_13_021734_create_riwayat_pekerjaan_table', 3),
(7, '2019_08_22_145919_create_presensi_table', 4),
(8, '2019_08_29_144545_create_presensibulan_table', 5),
(9, '2019_09_13_074806_create_gaji_table', 6),
(10, '2019_09_15_152616_create__p_t_k_p_table', 6),
(11, '2019_09_15_152648_create_pkp_progresif_table', 6),
(12, '2019_09_16_024818_create_default_gaji_table', 7),
(13, '2019_09_16_055221_create_default_gaji_table', 8),
(14, '2019_09_16_060116_create_default_gaji_table', 9),
(15, '2019_09_17_100808_create_default_table', 10),
(16, '2019_09_19_030121_create_default_presensi_table', 11),
(17, '2019_09_23_100534_create_pengaturan_presensi_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kangdanniell@gmail.com', '$2y$10$US/mn77WqVrSs9DzCcaBNOLVnwgUO3Z2h/jtc8nlta49i.X7MveUa', '2019-08-01 23:59:54'),
('nurmasyanti02@gmail.com', '$2y$10$zgKpB9qPC5IyiRw2pwPS9.1DF8zDi3mIz5YJfDMqZrpelbQwJLAJO', '2019-08-04 21:18:33'),
('regrizzlyy@gmail.com', '$2y$10$nMeQiTTFyk8RDzLItVpDO.s2Y/KqDZQD63gcqmlTsHjlAuPyOVe1O', '2019-08-04 21:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_penggajian`
--

CREATE TABLE `pengaturan_penggajian` (
  `id_pengaturan_penggajian` bigint(20) UNSIGNED NOT NULL,
  `biaya_tunjangan_profesi_housekeeping_driver` int(11) NOT NULL,
  `bpjs_kesehatan_perusahaan` double(8,2) NOT NULL,
  `bpjs_kesehatan_karyawan` double(8,2) NOT NULL,
  `bpjs_ketenagakerjaan_JKK` double(8,2) NOT NULL,
  `bpjs_ketenagakerjaan_JKM` double(8,2) NOT NULL,
  `bpjs_ketenagakerjaan_JHT` double(8,2) NOT NULL,
  `default_iuran` double(8,2) NOT NULL,
  `default_biaya_jabatan1` double(8,2) NOT NULL,
  `default_biaya_jabatan2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan_penggajian`
--

INSERT INTO `pengaturan_penggajian` (`id_pengaturan_penggajian`, `biaya_tunjangan_profesi_housekeeping_driver`, `bpjs_kesehatan_perusahaan`, `bpjs_kesehatan_karyawan`, `bpjs_ketenagakerjaan_JKK`, `bpjs_ketenagakerjaan_JKM`, `bpjs_ketenagakerjaan_JHT`, `default_iuran`, `default_biaya_jabatan1`, `default_biaya_jabatan2`, `created_at`, `updated_at`) VALUES
(1, 150000, 4.00, 1.00, 0.24, 0.30, 3.70, 2.00, 5.00, 6000000, NULL, '2019-09-25 03:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_presensi`
--

CREATE TABLE `pengaturan_presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_hrd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clock_in_normal` time NOT NULL,
  `clock_out_normal` time NOT NULL,
  `transport_normal` time NOT NULL,
  `clock_in_ramadhan` time NOT NULL,
  `clock_out_ramadhan` time NOT NULL,
  `transport_ramadhan` time NOT NULL,
  `lupa_clock_in_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan_presensi`
--

INSERT INTO `pengaturan_presensi` (`id`, `email_hrd`, `clock_in_normal`, `clock_out_normal`, `transport_normal`, `clock_in_ramadhan`, `clock_out_ramadhan`, `transport_ramadhan`, `lupa_clock_in_out`, `created_at`, `updated_at`) VALUES
(1, 'mitta@ideaimaji.com', '08:30:00', '17:30:00', '09:00:00', '08:00:00', '16:30:00', '08:30:00', '4.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persetujuanizin`
--

CREATE TABLE `persetujuanizin` (
  `id_persetujuan_izin` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai_izin` date NOT NULL,
  `tanggal_akhir_izin` date NOT NULL,
  `tipe_izin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_izin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_izin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persetujuanizin`
--

INSERT INTO `persetujuanizin` (`id_persetujuan_izin`, `nik`, `tanggal_mulai_izin`, `tanggal_akhir_izin`, `tipe_izin`, `alasan_izin`, `keterangan_izin`, `created_at`, `updated_at`) VALUES
(16, '0082018', '2019-10-10', '2019-10-10', 'STSD', 'Sakit perut', 'Diproses', '2019-10-09 00:49:46', '2019-10-09 00:49:46'),
(17, '0172018', '2019-10-10', '2019-10-10', 'Cuti Penting', 'Nikah', 'Diterima', '2019-10-09 02:15:23', '2019-10-09 02:15:23'),
(18, '0172018', '2019-10-10', '2019-10-10', 'Cuti Penting', 'Nikah', 'Diproses', '2019-10-09 02:15:51', '2019-10-09 02:15:51'),
(19, '0082018', '2019-10-10', '2019-10-10', 'Cuti Penting', 'Bulan madu', 'Diproses', '2019-10-09 02:16:38', '2019-10-09 02:16:38'),
(20, '0172018', '2019-10-10', '2019-10-10', 'Cuti Penting', 'Nikah', 'Diproses', '2019-10-09 02:19:04', '2019-10-09 02:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `pkp_progresif`
--

CREATE TABLE `pkp_progresif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_pajak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pkp_progresif`
--

INSERT INTO `pkp_progresif` (`id`, `min_income`, `max_income`, `tarif_pajak`, `created_at`, `updated_at`) VALUES
(1, '0', '50000000', '5%', NULL, NULL),
(2, '50000001', '250000000', '15%', NULL, NULL),
(3, '250000001', '500000000', '25%', NULL, NULL),
(4, '500000000', '- ∞ -', '30%', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` bigint(20) UNSIGNED NOT NULL,
  `id_sidik_jari` int(20) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `jam_clock_in` time DEFAULT NULL,
  `info_clock_in` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_clock_out` time DEFAULT NULL,
  `info_clock_out` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_presensi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_late_presensi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `early_presensi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_early_presensi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_presensi` int(11) DEFAULT NULL,
  `keterangan_presensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_sidik_jari`, `tanggal_presensi`, `jam_clock_in`, `info_clock_in`, `jam_clock_out`, `info_clock_out`, `late_presensi`, `info_late_presensi`, `early_presensi`, `info_early_presensi`, `transport_presensi`, `keterangan_presensi`, `created_at`, `updated_at`) VALUES
(1, 97, '2019-07-22', '07:00:49', NULL, '18:24:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(2, 92, '2019-07-22', '07:21:53', NULL, '16:40:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-30 20:16:36'),
(3, 89, '2019-07-22', '07:55:36', NULL, '17:39:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(4, 88, '2019-07-22', '08:06:06', NULL, '17:32:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(5, 96, '2019-07-22', '08:11:32', NULL, '17:35:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(6, 83, '2019-07-22', '08:13:08', NULL, '18:07:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(7, 91, '2019-07-22', '08:26:10', NULL, '17:30:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(8, 54, '2019-07-22', '08:28:58', NULL, '17:35:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(9, 86, '2019-07-22', '08:30:35', NULL, '17:43:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(10, 59, '2019-07-22', '08:41:47', NULL, '18:10:17', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(11, 81, '2019-07-22', '08:42:26', NULL, '18:07:25', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(12, 87, '2019-07-22', '08:42:46', NULL, '17:30:02', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(13, 79, '2019-07-22', '08:47:54', NULL, '18:24:11', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(14, 38, '2019-07-22', '08:57:00', NULL, '17:39:14', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(15, 98, '2019-07-22', '09:02:52', NULL, '17:38:42', NULL, '0.32', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(16, 94, '2019-07-22', '09:15:59', NULL, '17:32:43', NULL, '0.45', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(17, 57, '2019-07-22', '09:17:54', NULL, '18:18:01', NULL, '0.47', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(18, 93, '2019-07-22', '11:04:58', NULL, '00:00:00', NULL, '0.00', NULL, '4.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-22 08:54:04'),
(19, 26, '2019-07-22', '11:41:17', 'Meeting Savoy', '17:33:44', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-30 20:38:36'),
(20, 97, '2019-07-23', '06:39:31', NULL, '18:30:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(21, 89, '2019-07-23', '07:53:27', NULL, '17:50:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(22, 92, '2019-07-23', '07:53:33', NULL, '16:29:23', NULL, '0.23', NULL, '0.001', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-30 20:18:05'),
(23, 81, '2019-07-23', '07:59:13', NULL, '17:34:53', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(24, 83, '2019-07-23', '07:59:39', NULL, '17:33:12', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(25, 26, '2019-07-23', '08:21:48', NULL, '17:36:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(26, 86, '2019-07-23', '08:34:26', NULL, '17:32:17', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(27, 54, '2019-07-23', '08:39:18', NULL, '17:34:58', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(28, 79, '2019-07-23', '08:40:12', NULL, '18:20:43', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(29, 88, '2019-07-23', '08:46:29', NULL, '17:36:44', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(30, 59, '2019-07-23', '08:50:51', NULL, '17:32:21', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(31, 98, '2019-07-23', '08:56:54', NULL, '17:35:06', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(32, 87, '2019-07-23', '08:58:31', NULL, '00:00:00', NULL, '0.28', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(33, 38, '2019-07-23', '09:00:14', NULL, '17:35:32', NULL, '0.30', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(34, 94, '2019-07-23', '09:01:51', NULL, '17:37:07', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(35, 96, '2019-07-23', '10:18:54', NULL, '00:00:00', NULL, '1.48', NULL, '4.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(36, 97, '2019-07-24', '06:54:48', NULL, '18:33:22', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(37, 89, '2019-07-24', '07:41:27', NULL, '17:31:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(38, 92, '2019-07-24', '08:01:27', NULL, '16:34:33', NULL, '0.31', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-30 20:18:38'),
(39, 81, '2019-07-24', '08:07:59', NULL, '17:40:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(40, 83, '2019-07-24', '08:08:17', NULL, '17:40:21', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(41, 26, '2019-07-24', '08:16:38', NULL, '17:33:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(42, 94, '2019-07-24', '08:37:08', NULL, '17:37:20', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(43, 88, '2019-07-24', '08:40:26', NULL, '17:36:47', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(44, 86, '2019-07-24', '08:41:51', NULL, '17:40:16', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(45, 96, '2019-07-24', '08:43:00', NULL, '17:37:00', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(46, 93, '2019-07-24', '08:43:18', NULL, '00:00:00', NULL, '0.13', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(47, 54, '2019-07-24', '08:43:27', NULL, '17:41:45', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(48, 98, '2019-07-24', '08:52:18', NULL, '17:35:57', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(49, 38, '2019-07-24', '08:53:48', NULL, '17:40:27', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(50, 59, '2019-07-24', '08:54:12', NULL, '17:38:13', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(51, 57, '2019-07-24', '08:55:42', NULL, '17:49:32', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(52, 79, '2019-07-24', '10:16:22', NULL, '18:34:12', NULL, '1.46', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(53, 87, '2019-07-24', '08:30:00', NULL, '18:00:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-22 20:18:11'),
(54, 97, '2019-07-25', '06:49:46', NULL, '18:32:37', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(55, 92, '2019-07-25', '07:35:42', NULL, '16:39:05', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-30 20:19:16'),
(56, 81, '2019-07-25', '08:00:00', NULL, '10:58:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-23 07:59:20'),
(57, 83, '2019-07-25', '08:01:20', NULL, '18:14:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(58, 88, '2019-07-25', '08:21:07', NULL, '17:31:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(59, 91, '2019-07-25', '08:22:35', NULL, '00:00:00', NULL, '0.00', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(60, 26, '2019-07-25', '08:23:29', NULL, '17:33:10', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(61, 96, '2019-07-25', '08:25:06', NULL, '18:20:41', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(62, 54, '2019-07-25', '08:27:46', NULL, '17:48:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(63, 87, '2019-07-25', '08:38:13', NULL, '19:15:43', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(64, 86, '2019-07-25', '08:43:49', NULL, '19:15:48', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(65, 94, '2019-07-25', '08:45:29', NULL, '17:31:16', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(66, 89, '2019-07-25', '08:51:45', NULL, '17:34:10', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(67, 38, '2019-07-25', '08:53:41', NULL, '17:53:02', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(68, 57, '2019-07-25', '08:54:45', NULL, '17:48:32', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(69, 98, '2019-07-25', '08:57:08', NULL, '17:50:02', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(70, 97, '2019-07-26', '06:53:15', NULL, '18:32:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(71, 92, '2019-07-26', '07:30:14', NULL, '20:10:50', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(72, 89, '2019-07-26', '07:59:55', NULL, '00:00:00', 'antar surat ke travel', '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-22 10:06:11'),
(73, 96, '2019-07-26', '08:19:43', NULL, '17:35:43', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(74, 83, '2019-07-26', '08:22:26', NULL, '17:38:54', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(75, 54, '2019-07-26', '08:30:49', NULL, '17:45:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(76, 91, '2019-07-26', '08:33:03', NULL, '18:22:50', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(77, 88, '2019-07-26', '08:38:15', NULL, '17:35:48', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(78, 86, '2019-07-26', '08:41:29', NULL, '20:10:21', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(79, 94, '2019-07-26', '08:55:00', NULL, '17:35:06', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(80, 98, '2019-07-26', '08:55:05', NULL, '17:44:56', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(81, 57, '2019-07-26', '09:04:07', NULL, '18:02:16', NULL, '0.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(82, 59, '2019-07-26', '09:29:01', NULL, '17:44:10', NULL, '0.59', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(83, 79, '2019-07-26', '09:42:54', NULL, '18:32:19', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(84, 93, '2019-07-26', '09:50:05', NULL, '18:27:47', NULL, '1.20', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(85, 38, '2019-07-26', '09:50:10', NULL, '18:02:40', NULL, '1.20', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(86, 92, '2019-07-29', '06:46:16', NULL, '16:51:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-30 20:20:58'),
(87, 97, '2019-07-29', '07:03:23', NULL, '18:26:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(88, 93, '2019-07-29', '07:36:40', NULL, '18:25:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:16', '2019-09-20 00:39:16'),
(89, 81, '2019-07-29', '08:00:00', NULL, '17:43:05', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(90, 83, '2019-07-29', '08:00:49', NULL, '18:08:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(91, 89, '2019-07-29', '08:24:09', NULL, '17:47:59', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(92, 96, '2019-07-29', '08:25:12', NULL, '15:22:40', 'Antar mertua ke RS', '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-22 08:59:02'),
(93, 79, '2019-07-29', '08:28:08', NULL, '18:03:54', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(94, 26, '2019-07-29', '08:29:55', NULL, '17:59:33', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(95, 91, '2019-07-29', '08:40:38', NULL, '17:35:31', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(96, 88, '2019-07-29', '08:46:41', NULL, '17:51:01', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(97, 86, '2019-07-29', '08:47:44', NULL, '17:51:44', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(98, 87, '2019-07-29', '08:49:11', NULL, '18:25:32', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(99, 98, '2019-07-29', '08:51:57', NULL, '17:44:08', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(100, 38, '2019-07-29', '08:53:11', NULL, '17:59:29', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(101, 59, '2019-07-29', '08:54:48', NULL, '18:02:43', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(102, 57, '2019-07-29', '08:58:26', NULL, '17:48:08', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(103, 54, '2019-07-29', '10:18:39', 'ke dokter gig', '17:44:31', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:34:51'),
(104, 97, '2019-07-30', '06:57:19', NULL, '18:25:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(105, 89, '2019-07-30', '07:38:15', NULL, '17:38:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(106, 93, '2019-07-30', '07:39:39', NULL, '17:53:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(107, 96, '2019-07-30', '07:52:18', NULL, '17:48:24', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(108, 26, '2019-07-30', '08:14:38', NULL, '17:33:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(109, 54, '2019-07-30', '08:25:05', NULL, '17:36:46', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(110, 81, '2019-07-30', '08:25:46', NULL, '17:37:53', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(111, 83, '2019-07-30', '08:26:04', NULL, '17:38:05', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(112, 79, '2019-07-30', '08:29:08', NULL, '18:14:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(113, 91, '2019-07-30', '08:30:44', NULL, '18:17:33', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(114, 88, '2019-07-30', '08:39:44', NULL, '17:47:11', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(115, 86, '2019-07-30', '08:51:16', NULL, '17:53:25', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(116, 38, '2019-07-30', '08:51:36', NULL, '17:46:57', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(117, 57, '2019-07-30', '08:52:58', NULL, '17:47:07', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(118, 94, '2019-07-30', '08:53:32', NULL, '17:48:13', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(119, 98, '2019-07-30', '08:56:56', NULL, '17:37:32', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(120, 59, '2019-07-30', '09:01:44', NULL, '17:38:14', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(121, 87, '2019-07-30', '08:30:00', NULL, '17:53:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-22 20:18:59'),
(122, 97, '2019-07-31', '06:52:54', NULL, '18:30:52', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(123, 92, '2019-07-31', '07:23:55', NULL, '18:29:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(124, 89, '2019-07-31', '07:53:49', NULL, '18:03:22', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(125, 87, '2019-07-31', '08:04:22', NULL, '17:47:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(126, 81, '2019-07-31', '08:19:05', NULL, '17:47:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(127, 83, '2019-07-31', '08:19:25', NULL, '17:46:56', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(128, 96, '2019-07-31', '08:28:05', NULL, '17:47:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(129, 79, '2019-07-31', '08:28:48', NULL, '18:30:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(130, 54, '2019-07-31', '08:31:40', NULL, '17:47:46', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(131, 91, '2019-07-31', '08:39:42', NULL, '17:47:39', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(132, 57, '2019-07-31', '08:40:39', NULL, '18:05:57', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(133, 98, '2019-07-31', '08:55:55', NULL, '17:47:31', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(134, 86, '2019-07-31', '08:56:22', NULL, '18:05:54', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(135, 88, '2019-07-31', '08:58:28', NULL, '17:46:48', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(136, 59, '2019-07-31', '08:59:07', NULL, '17:30:03', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(137, 38, '2019-07-31', '09:01:56', NULL, '17:49:10', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(138, 26, '2019-07-31', '09:07:27', NULL, '00:00:00', NULL, '0.37', NULL, '4.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(139, 94, '2019-07-31', '10:31:41', 'Ke bank', '17:46:42', NULL, '0.00', 'Ke bank', '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:21:22'),
(140, 93, '2019-07-31', '12:04:54', NULL, '18:36:22', NULL, '3.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(141, 97, '2019-08-01', '06:48:16', NULL, '18:30:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(142, 92, '2019-08-01', '07:58:47', NULL, '16:48:31', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-30 20:21:39'),
(143, 93, '2019-08-01', '08:04:50', NULL, '18:40:23', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(144, 79, '2019-08-01', '08:24:28', NULL, '00:00:00', NULL, '0.00', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(145, 91, '2019-08-01', '08:26:18', NULL, '18:27:28', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(146, 54, '2019-08-01', '08:27:22', NULL, '17:32:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(147, 88, '2019-08-01', '08:27:48', NULL, '17:44:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(148, 89, '2019-08-01', '08:28:59', NULL, '17:45:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(149, 83, '2019-08-01', '08:29:05', NULL, '18:07:50', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(150, 81, '2019-08-01', '08:29:15', NULL, '18:08:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(151, 96, '2019-08-01', '08:33:31', NULL, '18:02:46', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(152, 87, '2019-08-01', '08:39:09', NULL, '19:08:26', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(153, 86, '2019-08-01', '08:45:49', NULL, '19:08:17', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(154, 38, '2019-08-01', '08:54:38', NULL, '17:45:55', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(155, 94, '2019-08-01', '08:55:09', NULL, '17:35:37', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(156, 57, '2019-08-01', '08:55:33', NULL, '18:02:25', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(157, 59, '2019-08-01', '11:04:42', NULL, '17:48:27', NULL, '2.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(158, 97, '2019-08-02', '07:01:33', NULL, '18:30:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(159, 91, '2019-08-02', '08:25:40', NULL, '18:29:12', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(160, 96, '2019-08-02', '08:34:56', NULL, '17:36:09', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(161, 54, '2019-08-02', '08:37:00', NULL, '17:55:19', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(162, 99, '2019-08-02', '08:39:31', NULL, '18:32:53', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(163, 88, '2019-08-02', '08:39:47', NULL, '17:45:42', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(164, 100, '2019-08-02', '08:40:58', NULL, '17:43:49', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(165, 26, '2019-08-02', '08:41:06', NULL, '17:36:14', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(166, 79, '2019-08-02', '08:42:19', NULL, '20:33:39', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(167, 81, '2019-08-02', '08:45:06', NULL, '18:17:06', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(168, 89, '2019-08-02', '08:45:18', NULL, '17:52:29', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(169, 38, '2019-08-02', '08:51:30', NULL, '18:18:57', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(170, 87, '2019-08-02', '08:52:17', NULL, '18:29:23', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(171, 86, '2019-08-02', '08:52:36', NULL, '18:31:36', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(172, 57, '2019-08-02', '08:58:19', NULL, '18:33:00', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(173, 94, '2019-08-02', '09:08:13', NULL, '17:35:55', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-30 20:35:24'),
(174, 98, '2019-08-02', '09:19:01', NULL, '18:17:00', NULL, '0.49', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(175, 93, '2019-08-02', '09:39:11', NULL, '18:31:52', NULL, '1.09', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(176, 97, '2019-08-05', '07:00:31', NULL, '18:30:16', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(177, 92, '2019-08-05', '07:52:39', NULL, '00:00:00', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-30 20:22:25'),
(178, 79, '2019-08-05', '07:57:08', NULL, '18:05:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(179, 99, '2019-08-05', '08:08:31', NULL, '17:46:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(180, 96, '2019-08-05', '08:16:39', NULL, '17:45:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(181, 83, '2019-08-05', '08:16:47', NULL, '17:57:48', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(182, 100, '2019-08-05', '08:23:02', NULL, '17:59:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(183, 91, '2019-08-05', '08:24:23', NULL, '17:39:28', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(184, 54, '2019-08-05', '08:28:44', NULL, '17:46:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(185, 26, '2019-08-05', '08:37:20', NULL, '17:32:40', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(186, 89, '2019-08-05', '08:39:00', NULL, '17:34:40', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(187, 81, '2019-08-05', '08:43:28', NULL, '17:59:09', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(188, 57, '2019-08-05', '09:07:15', NULL, '17:57:29', NULL, '0.37', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(189, 59, '2019-08-05', '09:07:38', NULL, '00:00:00', 'Ijin setengajh hari anak sakit', '0.37', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:38:36'),
(190, 38, '2019-08-05', '09:23:07', NULL, '17:36:57', NULL, '0.53', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(191, 93, '2019-08-05', '09:38:46', NULL, '17:59:26', NULL, '1.08', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(192, 88, '2019-08-05', '09:41:13', 'Kirim Document', '00:00:00', NULL, '0.00', NULL, '4.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 10:03:38'),
(193, 98, '2019-08-05', '09:42:19', NULL, '17:59:22', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(194, 94, '2019-08-05', '10:04:10', 'Ke Atm', '17:48:05', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:22:14'),
(195, 97, '2019-08-06', '06:48:49', NULL, '18:32:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(196, 92, '2019-08-06', '07:33:03', NULL, '00:00:00', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-30 20:22:52'),
(197, 89, '2019-08-06', '07:57:33', NULL, '18:43:23', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(198, 86, '2019-08-06', '07:59:19', NULL, '19:03:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(199, 99, '2019-08-06', '08:18:20', NULL, '18:34:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(200, 100, '2019-08-06', '08:21:39', NULL, '17:43:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(201, 81, '2019-08-06', '08:26:44', NULL, '17:31:24', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(202, 54, '2019-08-06', '08:26:50', NULL, '17:35:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(203, 88, '2019-08-06', '08:26:56', NULL, '17:34:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(204, 83, '2019-08-06', '08:27:08', NULL, '17:31:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(205, 26, '2019-08-06', '08:28:25', NULL, '17:35:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(206, 91, '2019-08-06', '08:29:04', NULL, '00:00:00', NULL, '0.00', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(207, 87, '2019-08-06', '08:30:14', NULL, '18:32:40', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(208, 96, '2019-08-06', '08:32:09', NULL, '17:34:24', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(209, 94, '2019-08-06', '08:46:59', NULL, '17:34:28', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(210, 57, '2019-08-06', '08:55:32', NULL, '18:14:58', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(211, 98, '2019-08-06', '09:10:06', NULL, '19:01:17', NULL, '0.40', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(212, 38, '2019-08-06', '09:22:38', NULL, '18:15:14', NULL, '0.52', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(213, 59, '2019-08-06', '09:42:20', NULL, '19:03:28', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(214, 93, '2019-08-06', '09:42:44', NULL, '18:35:27', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(215, 97, '2019-08-07', '06:58:03', NULL, '18:30:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(216, 89, '2019-08-07', '07:43:27', NULL, '18:39:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(217, 26, '2019-08-07', '08:16:20', NULL, '17:46:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(218, 92, '2019-08-07', '08:16:37', 'Kanaya proyek', '17:05:29', NULL, '0.46', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-22 10:23:38'),
(219, 100, '2019-08-07', '08:18:45', NULL, '17:41:48', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(220, 99, '2019-08-07', '08:26:00', NULL, '18:43:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(221, 81, '2019-08-07', '08:28:44', NULL, '17:46:31', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(222, 83, '2019-08-07', '08:29:09', NULL, '17:46:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(223, 54, '2019-08-07', '08:30:23', NULL, '17:44:58', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(224, 91, '2019-08-07', '08:31:51', NULL, '18:37:41', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(225, 86, '2019-08-07', '08:47:26', NULL, '19:06:08', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(226, 57, '2019-08-07', '08:48:25', NULL, '18:34:39', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(227, 87, '2019-08-07', '08:51:44', NULL, '00:00:00', NULL, '0.21', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(228, 94, '2019-08-07', '08:54:00', NULL, '17:39:28', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(229, 59, '2019-08-07', '09:00:58', NULL, '19:03:38', NULL, '0.30', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(230, 98, '2019-08-07', '09:02:49', NULL, '18:43:18', NULL, '0.32', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(231, 88, '2019-08-07', '09:26:39', 'mengerjakan pajak dan koordinasi dgn lilik ttg kedatangan ke iip', '17:46:45', NULL, '0.56', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 20:24:48'),
(232, 93, '2019-08-07', '09:47:59', NULL, '19:02:29', NULL, '1.17', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(233, 97, '2019-08-08', '07:00:10', NULL, '18:30:42', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(234, 89, '2019-08-08', '07:51:16', NULL, '18:08:28', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(235, 92, '2019-08-08', '07:57:30', NULL, '00:00:00', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-30 20:23:27'),
(236, 100, '2019-08-08', '08:11:35', NULL, '17:43:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(237, 91, '2019-08-08', '08:28:17', NULL, '17:49:10', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(238, 87, '2019-08-08', '08:30:56', NULL, '17:45:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(239, 96, '2019-08-08', '08:32:38', NULL, '17:35:34', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(240, 81, '2019-08-08', '08:36:45', NULL, '17:45:35', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(241, 83, '2019-08-08', '08:37:06', NULL, '18:17:50', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(242, 79, '2019-08-08', '08:37:15', NULL, '18:22:35', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(243, 86, '2019-08-08', '08:37:52', NULL, '18:32:35', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(244, 99, '2019-08-08', '08:38:58', NULL, '18:34:05', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(245, 98, '2019-08-08', '08:58:05', NULL, '17:43:27', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(246, 57, '2019-08-08', '09:04:36', NULL, '17:59:09', NULL, '0.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(247, 26, '2019-08-08', '09:24:35', 'Meeting STC', '00:00:00', 'Meeting STC', '0.54', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:06:01'),
(248, 59, '2019-08-08', '09:30:07', NULL, '18:39:09', NULL, '1.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(249, 94, '2019-08-08', '09:36:20', 'Kirim Document', '17:33:00', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:17', '2019-09-22 09:23:15'),
(250, 93, '2019-08-08', '00:00:00', NULL, '18:39:06', NULL, '4.00', NULL, '0.00', NULL, 0, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(251, 97, '2019-08-09', '06:54:16', NULL, '18:30:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(252, 92, '2019-08-09', '07:56:37', NULL, '17:15:07', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-30 20:23:51'),
(253, 88, '2019-08-09', '08:25:13', NULL, '17:50:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(254, 99, '2019-08-09', '08:25:51', NULL, '19:04:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(255, 100, '2019-08-09', '08:25:59', NULL, '17:40:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(256, 79, '2019-08-09', '08:26:40', NULL, '18:24:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(257, 91, '2019-08-09', '08:28:38', NULL, '18:52:05', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:17', '2019-09-20 00:39:17'),
(258, 54, '2019-08-09', '08:34:20', NULL, '17:56:03', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(259, 81, '2019-08-09', '08:34:30', NULL, '17:39:23', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(260, 83, '2019-08-09', '08:35:05', NULL, '18:21:36', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(261, 96, '2019-08-09', '08:35:58', NULL, '18:01:50', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(262, 26, '2019-08-09', '08:46:32', NULL, '17:35:00', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(263, 59, '2019-08-09', '08:48:40', NULL, '17:30:40', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(264, 98, '2019-08-09', '08:52:13', NULL, '17:56:10', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(265, 87, '2019-08-09', '08:52:47', NULL, '17:39:26', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(266, 38, '2019-08-09', '08:56:05', NULL, '17:39:44', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(267, 86, '2019-08-09', '08:59:25', NULL, '19:04:11', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(268, 93, '2019-08-09', '10:48:31', NULL, '00:00:00', NULL, '2.18', NULL, '4.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(269, 97, '2019-08-12', '06:48:56', NULL, '18:30:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(270, 89, '2019-08-12', '07:46:33', NULL, '17:57:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(271, 100, '2019-08-12', '08:11:30', NULL, '18:09:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(272, 91, '2019-08-12', '08:22:20', NULL, '17:35:04', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(273, 96, '2019-08-12', '08:28:53', NULL, '17:35:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(274, 99, '2019-08-12', '08:29:01', NULL, '18:03:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(275, 81, '2019-08-12', '08:35:14', NULL, '17:37:14', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(276, 98, '2019-08-12', '08:36:16', NULL, '18:08:50', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(277, 54, '2019-08-12', '08:37:34', NULL, '17:34:27', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(278, 59, '2019-08-12', '08:39:02', NULL, '18:02:20', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(279, 87, '2019-08-12', '08:45:02', NULL, '18:06:37', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(280, 86, '2019-08-12', '08:45:09', NULL, '18:06:33', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(281, 79, '2019-08-12', '08:50:27', NULL, '18:19:04', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(282, 88, '2019-08-12', '08:55:45', NULL, '17:39:40', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(283, 57, '2019-08-12', '08:57:56', NULL, '18:13:41', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(284, 38, '2019-08-12', '09:00:49', NULL, '18:10:08', NULL, '0.30', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(285, 26, '2019-08-12', '09:03:06', NULL, '18:08:45', NULL, '0.33', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(286, 94, '2019-08-12', '09:04:50', NULL, '17:37:01', NULL, '0.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(287, 97, '2019-08-13', '06:51:52', NULL, '18:24:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(288, 96, '2019-08-13', '07:56:06', NULL, '17:37:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(289, 92, '2019-08-13', '07:57:15', NULL, '18:15:42', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:24:30'),
(290, 91, '2019-08-13', '07:57:57', NULL, '18:01:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(291, 89, '2019-08-13', '08:05:20', NULL, '00:00:00', 'Meeting', '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-22 10:07:12'),
(292, 100, '2019-08-13', '08:18:58', NULL, '17:33:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(293, 26, '2019-08-13', '08:31:08', NULL, '17:31:20', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(294, 54, '2019-08-13', '08:31:35', NULL, '17:40:36', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(295, 83, '2019-08-13', '08:35:26', NULL, '18:13:28', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(296, 88, '2019-08-13', '08:38:48', NULL, '17:39:22', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(297, 79, '2019-08-13', '08:38:54', NULL, '18:24:10', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(298, 99, '2019-08-13', '08:39:46', NULL, '17:43:21', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(299, 81, '2019-08-13', '08:43:43', NULL, '17:40:47', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(300, 59, '2019-08-13', '08:45:39', NULL, '18:21:39', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(301, 94, '2019-08-13', '08:46:54', NULL, '17:37:53', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(302, 98, '2019-08-13', '08:48:54', NULL, '17:40:59', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(303, 86, '2019-08-13', '08:51:04', NULL, '18:22:50', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(304, 38, '2019-08-13', '08:52:47', NULL, '17:40:55', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(305, 57, '2019-08-13', '08:54:06', NULL, '18:09:46', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(306, 97, '2019-08-14', '06:56:13', NULL, '18:31:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(307, 89, '2019-08-14', '07:31:55', NULL, '18:05:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(308, 92, '2019-08-14', '07:52:30', NULL, '17:40:18', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:25:23'),
(309, 100, '2019-08-14', '08:16:27', NULL, '17:44:58', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(310, 26, '2019-08-14', '08:21:55', NULL, '18:10:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(311, 91, '2019-08-14', '08:22:07', NULL, '17:39:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(312, 81, '2019-08-14', '08:30:50', NULL, '18:08:48', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(313, 83, '2019-08-14', '08:31:38', NULL, '18:09:01', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(314, 99, '2019-08-14', '08:33:29', NULL, '18:31:56', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(315, 88, '2019-08-14', '08:35:33', NULL, '17:35:20', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(316, 79, '2019-08-14', '08:41:17', NULL, '18:19:51', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(317, 57, '2019-08-14', '08:43:30', NULL, '18:12:28', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(318, 98, '2019-08-14', '08:48:45', NULL, '18:15:17', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(319, 86, '2019-08-14', '08:48:50', NULL, '18:04:56', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(320, 38, '2019-08-14', '08:55:17', NULL, '18:14:13', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(321, 59, '2019-08-14', '09:03:04', NULL, '18:32:51', NULL, '0.33', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(322, 87, '2019-08-14', '09:03:20', 'Toleransi dinas luar', '18:32:46', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-22 09:42:47'),
(323, 94, '2019-08-14', '09:22:33', 'Ke atm', '17:35:09', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-22 09:24:14'),
(324, 93, '2019-08-14', '10:05:00', NULL, '00:00:00', 'Ijin ke dokter', '1.35', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-22 08:57:34'),
(325, 97, '2019-08-15', '06:19:58', NULL, '18:25:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(326, 89, '2019-08-15', '07:20:56', NULL, '18:25:23', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(327, 92, '2019-08-15', '07:39:06', NULL, '17:35:19', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:25:47'),
(328, 26, '2019-08-15', '08:17:43', NULL, '17:52:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(329, 100, '2019-08-15', '08:24:37', NULL, '18:18:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(330, 54, '2019-08-15', '08:27:20', NULL, '17:38:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(331, 91, '2019-08-15', '08:27:46', NULL, '18:25:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(332, 96, '2019-08-15', '08:28:01', NULL, '17:40:30', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(333, 81, '2019-08-15', '08:28:52', NULL, '18:19:40', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(334, 83, '2019-08-15', '08:28:57', NULL, '18:19:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(335, 99, '2019-08-15', '08:30:49', NULL, '18:25:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(336, 79, '2019-08-15', '08:35:38', NULL, '18:21:59', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(337, 88, '2019-08-15', '08:38:01', NULL, '17:47:37', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(338, 98, '2019-08-15', '08:44:40', NULL, '18:20:39', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(339, 38, '2019-08-15', '08:49:30', NULL, '18:07:03', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(340, 86, '2019-08-15', '08:55:20', NULL, '18:19:46', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(341, 87, '2019-08-15', '08:55:59', NULL, '18:18:40', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(342, 94, '2019-08-15', '08:56:21', NULL, '17:41:44', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(343, 57, '2019-08-15', '09:01:13', NULL, '17:56:51', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(344, 59, '2019-08-15', '09:10:36', NULL, '17:44:00', NULL, '0.40', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(345, 97, '2019-08-16', '06:51:53', NULL, '19:25:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(346, 92, '2019-08-16', '07:34:44', NULL, '19:24:46', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:26:04'),
(347, 96, '2019-08-16', '07:54:33', NULL, '18:29:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18');
INSERT INTO `presensi` (`id_presensi`, `id_sidik_jari`, `tanggal_presensi`, `jam_clock_in`, `info_clock_in`, `jam_clock_out`, `info_clock_out`, `late_presensi`, `info_late_presensi`, `early_presensi`, `info_early_presensi`, `transport_presensi`, `keterangan_presensi`, `created_at`, `updated_at`) VALUES
(348, 89, '2019-08-16', '08:13:19', NULL, '18:27:50', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(349, 26, '2019-08-16', '08:13:36', NULL, '00:00:00', NULL, '0.00', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(350, 79, '2019-08-16', '08:21:20', NULL, '19:33:50', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(351, 100, '2019-08-16', '08:27:09', NULL, '18:07:04', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(352, 99, '2019-08-16', '08:37:22', NULL, '19:30:21', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(353, 88, '2019-08-16', '08:40:32', NULL, '18:06:27', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(354, 81, '2019-08-16', '08:40:58', NULL, '18:37:53', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(355, 83, '2019-08-16', '08:41:02', NULL, '18:38:10', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-23 08:02:18'),
(356, 86, '2019-08-16', '08:47:47', NULL, '19:07:13', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(357, 87, '2019-08-16', '08:54:04', NULL, '00:00:00', NULL, '0.24', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(358, 57, '2019-08-16', '08:57:14', NULL, '18:34:11', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(359, 38, '2019-08-16', '08:58:55', NULL, '18:33:24', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(360, 94, '2019-08-16', '08:59:32', NULL, '00:00:00', NULL, '0.29', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(361, 59, '2019-08-16', '10:33:37', NULL, '18:14:36', NULL, '2.03', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(362, 97, '2019-08-19', '06:43:52', NULL, '18:32:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(363, 89, '2019-08-19', '07:18:56', NULL, '18:29:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(364, 92, '2019-08-19', '07:36:08', NULL, '16:56:16', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:27:00'),
(365, 83, '2019-08-19', '08:17:23', NULL, '17:32:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(366, 54, '2019-08-19', '08:24:09', NULL, '17:50:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(367, 100, '2019-08-19', '08:24:17', NULL, '18:25:43', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(368, 26, '2019-08-19', '08:25:52', NULL, '17:42:28', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(369, 91, '2019-08-19', '08:27:07', NULL, '18:19:57', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(370, 59, '2019-08-19', '08:32:26', NULL, '18:48:18', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(371, 99, '2019-08-19', '08:35:40', NULL, '18:44:01', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(372, 88, '2019-08-19', '08:44:44', NULL, '17:46:44', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(373, 96, '2019-08-19', '08:46:33', NULL, '18:43:52', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(374, 94, '2019-08-19', '08:53:40', NULL, '17:36:55', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(375, 38, '2019-08-19', '08:54:42', NULL, '17:42:34', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(376, 87, '2019-08-19', '08:57:59', NULL, '00:00:00', NULL, '0.27', NULL, '4.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-22 20:23:01'),
(377, 79, '2019-08-19', '08:59:58', NULL, '18:45:26', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(378, 86, '2019-08-19', '09:01:54', NULL, '17:42:08', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(379, 98, '2019-08-19', '09:03:15', NULL, '18:48:21', NULL, '0.33', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(380, 57, '2019-08-19', '09:06:48', NULL, '18:25:59', NULL, '0.36', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(381, 93, '2019-08-19', '10:02:57', NULL, '18:08:01', NULL, '1.32', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(382, 97, '2019-08-20', '06:47:12', NULL, '18:30:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(383, 89, '2019-08-20', '07:51:59', NULL, '18:12:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(384, 92, '2019-08-20', '07:56:52', NULL, '16:33:14', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-30 20:27:25'),
(385, 100, '2019-08-20', '08:03:49', NULL, '18:03:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(386, 96, '2019-08-20', '08:24:33', NULL, '17:35:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(387, 59, '2019-08-20', '08:27:55', NULL, '18:19:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(388, 81, '2019-08-20', '08:31:26', NULL, '18:06:25', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(389, 83, '2019-08-20', '08:32:58', NULL, '17:30:10', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(390, 91, '2019-08-20', '08:33:18', NULL, '18:25:07', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(391, 99, '2019-08-20', '08:35:46', NULL, '18:29:38', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(392, 88, '2019-08-20', '08:44:12', NULL, '17:43:36', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(393, 79, '2019-08-20', '08:53:00', NULL, '13:21:00', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-25 23:32:44'),
(394, 38, '2019-08-20', '08:54:42', NULL, '18:03:35', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(395, 57, '2019-08-20', '08:55:25', NULL, '18:16:07', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(396, 87, '2019-08-20', '08:59:53', NULL, '18:07:55', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(397, 86, '2019-08-20', '09:04:35', NULL, '18:03:40', NULL, '0.34', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(398, 93, '2019-08-20', '09:40:38', NULL, '18:03:46', NULL, '1.10', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-20 00:39:18'),
(399, 54, '2019-08-20', '09:53:26', 'ke dokter gigi', '17:36:42', NULL, '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-09-20 00:39:18', '2019-09-22 09:36:38'),
(400, 79, '2019-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : antar bu wulan ke bandara', '2019-09-20 00:54:13', '2019-09-20 00:54:13'),
(401, 79, '2019-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin', '2019-09-20 00:57:50', '2019-09-20 00:57:50'),
(402, 79, '2019-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : antar bu wulan dan pa Noudie', '2019-09-20 00:58:07', '2019-09-20 00:58:07'),
(403, 93, '2019-07-23', '00:00:00', NULL, '00:00:00', NULL, '4.00', NULL, '4.00', NULL, NULL, NULL, '2019-09-22 08:47:07', '2019-09-22 08:47:07'),
(404, 93, '2019-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 08:49:56', '2019-09-22 08:49:56'),
(405, 93, '2019-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 08:52:12', '2019-09-22 08:52:12'),
(406, 93, '2019-08-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 08:52:34', '2019-09-22 08:52:34'),
(407, 93, '2019-08-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SDSD : asdfg', '2019-09-22 08:53:13', '2019-09-22 08:53:13'),
(408, 93, '2019-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SDSD : asdfg', '2019-09-22 08:53:26', '2019-09-22 08:53:26'),
(409, 96, '2019-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 09:01:15', '2019-09-22 09:01:15'),
(410, 96, '2019-08-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 09:02:03', '2019-09-22 09:02:03'),
(411, 26, '2019-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dispensasi : asdfg', '2019-09-22 09:04:40', '2019-09-22 09:04:40'),
(412, 26, '2019-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 09:05:11', '2019-09-22 09:05:11'),
(413, 26, '2019-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dinas Luar : Jakarta', '2019-09-22 09:06:55', '2019-09-22 09:06:55'),
(415, 81, '2019-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:17:14', '2019-09-22 09:17:14'),
(416, 81, '2019-08-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti Penting : asdfg', '2019-09-22 09:17:48', '2019-09-22 09:17:48'),
(417, 98, '2019-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 09:18:42', '2019-09-22 09:18:42'),
(418, 98, '2019-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:19:21', '2019-09-22 09:19:21'),
(419, 98, '2019-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dinas Luar : Jakarta', '2019-09-22 09:19:53', '2019-09-22 09:19:53'),
(420, 94, '2019-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SDSD : asdfg', '2019-09-22 09:20:41', '2019-09-22 09:20:41'),
(421, 94, '2019-08-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 09:22:38', '2019-09-22 09:22:38'),
(422, 94, '2019-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti Penting : asdfg', '2019-09-22 09:24:38', '2019-09-22 09:24:38'),
(423, 99, '2019-08-01', '08:30:00', NULL, '17:30:00', NULL, '0.00', NULL, '0.00', NULL, 0, NULL, '2019-09-22 09:29:39', '2019-09-22 09:29:39'),
(424, 83, '2019-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:31:05', '2019-09-22 09:31:05'),
(425, 83, '2019-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti : asdfg', '2019-09-22 09:31:51', '2019-09-22 09:31:51'),
(426, 100, '2019-08-01', '08:00:00', NULL, '17:30:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-22 09:33:06', '2019-09-22 20:26:23'),
(427, 54, '2019-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:35:18', '2019-09-22 09:35:18'),
(428, 54, '2019-08-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti Penting : asdfg', '2019-09-22 09:35:47', '2019-09-22 09:35:47'),
(429, 54, '2019-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:36:12', '2019-09-22 09:36:12'),
(430, 59, '2019-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:37:20', '2019-09-22 09:37:20'),
(431, 59, '2019-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dispensasi : asdfg', '2019-09-22 09:37:52', '2019-09-22 09:37:52'),
(432, 87, '2019-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti : asdfg', '2019-09-22 09:39:43', '2019-09-22 09:39:43'),
(433, 87, '2019-08-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dinas Luar : Jakarta', '2019-09-22 09:42:06', '2019-09-22 09:42:06'),
(434, 86, '2019-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 09:43:55', '2019-09-22 09:43:55'),
(435, 57, '2019-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dispensasi : asdfg', '2019-09-22 09:44:55', '2019-09-22 09:44:55'),
(436, 57, '2019-08-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti : asdfg', '2019-09-22 09:45:24', '2019-09-22 10:00:51'),
(437, 38, '2019-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 10:01:55', '2019-09-22 10:01:55'),
(438, 38, '2019-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 10:02:09', '2019-09-22 10:02:09'),
(439, 88, '2019-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cuti Penting : asdfg', '2019-09-22 10:05:00', '2019-09-22 10:05:00'),
(440, 89, '2019-08-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 10:06:41', '2019-09-22 10:06:41'),
(441, 91, '2019-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SDSD : asdfg', '2019-09-22 10:08:03', '2019-09-22 10:08:03'),
(443, 91, '2019-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-09-22 10:08:48', '2019-09-22 10:08:48'),
(446, 92, '2019-07-30', '08:30:00', NULL, '17:30:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-22 10:18:48', '2019-09-22 10:18:48'),
(448, 92, '2019-08-02', '08:30:00', NULL, '17:30:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-09-22 10:21:09', '2019-09-22 10:21:09'),
(449, 92, '2019-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Izin : asdfg', '2019-09-22 10:24:41', '2019-09-22 10:24:41'),
(450, 87, '2019-07-26', '08:40:00', NULL, '18:25:00', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-09-22 10:56:18', '2019-09-22 10:56:53'),
(451, 91, '2019-07-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SDSD : asdfg', '2019-09-22 10:59:22', '2019-09-22 10:59:22'),
(452, 97, '2019-08-21', '06:42:48', NULL, '18:30:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(453, 86, '2019-08-21', '07:43:31', NULL, '18:22:59', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(454, 83, '2019-08-21', '08:04:24', NULL, '18:08:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(455, 92, '2019-08-21', '08:11:01', NULL, '16:33:14', NULL, '0.00', NULL, '0.56', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(456, 100, '2019-08-21', '08:19:33', NULL, '17:52:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(457, 54, '2019-08-21', '08:28:58', NULL, '17:40:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(458, 79, '2019-08-21', '08:36:14', NULL, '18:20:37', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(459, 91, '2019-08-21', '08:36:44', NULL, '18:25:07', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(460, 88, '2019-08-21', '08:46:19', NULL, '17:48:40', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(461, 57, '2019-08-21', '08:55:51', NULL, '18:17:51', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(462, 38, '2019-08-21', '08:56:35', NULL, '18:09:42', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(463, 87, '2019-08-21', '08:59:40', NULL, '18:17:41', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(464, 81, '2019-08-21', '09:14:59', NULL, '17:38:59', NULL, '0.44', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(465, 59, '2019-08-21', '09:16:35', NULL, '18:33:02', NULL, '0.46', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(466, 94, '2019-08-21', '09:23:20', NULL, '17:43:38', NULL, '0.53', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(467, 93, '2019-08-21', '09:46:38', NULL, '18:30:58', NULL, '1.16', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:24', '2019-10-02 23:44:24'),
(468, 26, '2019-08-21', '10:04:29', NULL, '17:50:55', NULL, '1.34', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(469, 98, '2019-08-21', '10:13:04', NULL, '17:58:28', NULL, '1.43', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(470, 96, '2019-08-21', '00:00:00', 'Lupa clock in!', '17:41:51', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(471, 97, '2019-08-22', '06:47:18', NULL, '18:30:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(472, 89, '2019-08-22', '07:22:39', NULL, '18:31:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(473, 92, '2019-08-22', '07:52:30', NULL, '16:30:36', NULL, '0.00', NULL, '0.59', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(474, 26, '2019-08-22', '08:12:50', NULL, '17:52:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(475, 91, '2019-08-22', '08:21:18', NULL, '17:53:57', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(476, 99, '2019-08-22', '08:28:23', NULL, '18:33:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(477, 54, '2019-08-22', '08:31:28', NULL, '17:37:36', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(478, 96, '2019-08-22', '08:31:35', NULL, '17:56:02', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(479, 81, '2019-08-22', '08:32:47', NULL, '18:10:25', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(480, 83, '2019-08-22', '08:33:01', NULL, '18:10:30', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(481, 100, '2019-08-22', '08:33:15', NULL, '18:07:26', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(482, 79, '2019-08-22', '08:37:03', NULL, '18:18:37', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(483, 59, '2019-08-22', '08:39:13', NULL, '18:36:56', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(484, 94, '2019-08-22', '08:45:37', NULL, '17:33:27', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(485, 88, '2019-08-22', '08:48:01', NULL, '18:00:01', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(486, 57, '2019-08-22', '08:49:37', NULL, '18:15:14', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(487, 38, '2019-08-22', '08:50:04', NULL, '18:16:00', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(488, 86, '2019-08-22', '08:50:45', NULL, '18:33:58', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(489, 87, '2019-08-22', '08:57:19', NULL, '18:36:52', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(490, 98, '2019-08-22', '09:02:00', NULL, '18:33:50', NULL, '0.32', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(491, 93, '2019-08-22', '09:26:24', NULL, '18:22:22', NULL, '0.56', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(492, 97, '2019-08-23', '06:28:52', NULL, '18:30:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(493, 92, '2019-08-23', '07:43:48', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(494, 89, '2019-08-23', '08:04:27', NULL, '18:18:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(495, 87, '2019-08-23', '08:17:31', NULL, '18:39:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(496, 100, '2019-08-23', '08:21:02', NULL, '18:38:37', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(497, 91, '2019-08-23', '12:23:54', NULL, '17:50:38', NULL, '3.53', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(498, 54, '2019-08-23', '08:34:02', NULL, '17:43:19', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(499, 99, '2019-08-23', '08:36:10', NULL, '18:38:56', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(500, 81, '2019-08-23', '08:37:14', NULL, '18:11:21', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(501, 83, '2019-08-23', '08:37:26', NULL, '18:11:31', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(502, 88, '2019-08-23', '08:39:34', NULL, '17:39:36', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(503, 79, '2019-08-23', '08:47:06', NULL, '18:21:08', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(504, 86, '2019-08-23', '08:47:40', NULL, '17:43:27', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(505, 96, '2019-08-23', '08:51:10', NULL, '17:42:09', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(506, 94, '2019-08-23', '08:51:37', NULL, '17:42:02', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(507, 57, '2019-08-23', '08:59:06', NULL, '18:15:09', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(508, 98, '2019-08-23', '09:01:59', NULL, '18:38:40', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(509, 38, '2019-08-23', '09:05:21', NULL, '18:13:46', NULL, '0.35', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(510, 59, '2019-08-23', '09:39:40', NULL, '18:34:34', NULL, '1.09', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(511, 93, '2019-08-23', '09:58:32', NULL, '18:38:43', NULL, '1.28', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(512, 97, '2019-08-26', '06:32:26', NULL, '18:30:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(513, 89, '2019-08-26', '06:40:18', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(514, 100, '2019-08-26', '07:17:57', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(515, 87, '2019-08-26', '08:17:07', NULL, '18:19:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(516, 86, '2019-08-26', '08:17:27', NULL, '18:19:51', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(517, 81, '2019-08-26', '08:22:22', NULL, '17:37:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(518, 26, '2019-08-26', '08:22:27', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(519, 99, '2019-08-26', '08:33:13', NULL, '18:19:36', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(520, 96, '2019-08-26', '08:37:01', NULL, '17:33:09', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(521, 79, '2019-08-26', '08:40:19', NULL, '18:14:08', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(522, 88, '2019-08-26', '08:48:45', NULL, '17:38:44', NULL, '0.18', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(523, 98, '2019-08-26', '09:02:18', NULL, '00:00:00', 'Lupa clock out!', '0.32', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(524, 93, '2019-08-26', '09:22:18', NULL, '18:18:51', NULL, '0.52', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(525, 91, '2019-08-26', '09:25:19', NULL, '18:06:04', NULL, '0.55', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(526, 59, '2019-08-26', '09:34:45', NULL, '18:20:00', NULL, '1.04', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(527, 94, '2019-08-26', '09:42:37', NULL, '17:36:48', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(528, 38, '2019-08-26', '09:53:17', NULL, '17:35:55', NULL, '1.23', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(529, 83, '2019-08-26', '11:41:50', NULL, '17:36:57', NULL, '3.11', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(530, 92, '2019-08-26', '00:00:00', 'Lupa clock in!', '18:19:00', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(531, 97, '2019-08-27', '06:41:49', NULL, '18:30:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(532, 88, '2019-08-27', '07:35:01', NULL, '17:38:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(533, 89, '2019-08-27', '07:52:35', NULL, '18:23:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(534, 98, '2019-08-27', '08:03:25', NULL, '18:22:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(535, 92, '2019-08-27', '08:16:24', NULL, '18:07:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(536, 26, '2019-08-27', '08:16:47', NULL, '17:30:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(537, 96, '2019-08-27', '08:19:33', NULL, '17:34:22', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(538, 81, '2019-08-27', '08:20:04', NULL, '18:09:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(539, 91, '2019-08-27', '08:24:32', NULL, '18:22:41', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(540, 100, '2019-08-27', '08:29:07', NULL, '17:36:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(541, 87, '2019-08-27', '08:29:27', NULL, '18:10:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(542, 86, '2019-08-27', '08:29:33', NULL, '18:09:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(543, 54, '2019-08-27', '08:30:49', NULL, '18:07:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(544, 79, '2019-08-27', '08:34:53', NULL, '18:23:00', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(545, 38, '2019-08-27', '08:37:56', NULL, '18:07:18', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(546, 94, '2019-08-27', '08:54:26', NULL, '17:39:29', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(547, 57, '2019-08-27', '08:54:31', NULL, '18:08:52', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(548, 59, '2019-08-27', '09:17:37', NULL, '18:20:31', NULL, '0.47', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(549, 93, '2019-08-27', '09:33:24', NULL, '18:19:45', NULL, '1.03', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(550, 99, '2019-08-27', '10:07:08', NULL, '18:22:49', NULL, '1.37', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(551, 97, '2019-08-28', '06:39:17', NULL, '18:28:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(552, 92, '2019-08-28', '07:43:36', NULL, '18:18:58', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(553, 87, '2019-08-28', '08:13:46', NULL, '18:28:24', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(554, 86, '2019-08-28', '08:14:11', NULL, '18:31:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(555, 88, '2019-08-28', '08:16:45', NULL, '17:45:46', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(556, 79, '2019-08-28', '08:24:28', NULL, '18:26:32', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(557, 91, '2019-08-28', '08:25:10', NULL, '18:28:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(558, 100, '2019-08-28', '08:28:31', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(559, 81, '2019-08-28', '08:28:52', NULL, '17:42:46', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(560, 83, '2019-08-28', '08:29:10', NULL, '17:42:37', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(561, 26, '2019-08-28', '08:35:15', NULL, '17:35:23', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(562, 54, '2019-08-28', '08:42:43', NULL, '17:44:57', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(563, 59, '2019-08-28', '08:49:59', NULL, '17:43:55', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(564, 96, '2019-08-28', '08:51:01', NULL, '17:46:04', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(565, 94, '2019-08-28', '08:54:31', NULL, '17:45:50', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(566, 57, '2019-08-28', '08:57:49', NULL, '18:10:55', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(567, 38, '2019-08-28', '08:58:49', NULL, '18:10:04', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(568, 93, '2019-08-28', '09:44:44', NULL, '00:00:00', 'Lupa clock out!', '1.14', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(569, 97, '2019-08-29', '06:33:18', NULL, '18:30:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(570, 89, '2019-08-29', '07:52:44', NULL, '16:15:19', NULL, '0.00', NULL, '1.14', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(571, 92, '2019-08-29', '07:53:39', NULL, '18:29:54', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(572, 26, '2019-08-29', '08:11:28', NULL, '16:15:00', NULL, '0.00', NULL, '1.15', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(573, 91, '2019-08-29', '08:28:41', NULL, '18:33:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(574, 100, '2019-08-29', '08:29:26', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(575, 83, '2019-08-29', '00:00:00', 'Lupa clock in!', '00:00:00', 'Lupa clock out!', '4.00', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(576, 88, '2019-08-29', '08:30:39', NULL, '17:40:52', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(577, 54, '2019-08-29', '08:32:16', NULL, '17:56:18', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(578, 87, '2019-08-29', '08:32:23', NULL, '18:32:44', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(579, 86, '2019-08-29', '08:32:37', NULL, '18:32:49', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(580, 98, '2019-08-29', '08:34:48', NULL, '18:33:51', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(581, 99, '2019-08-29', '08:34:56', NULL, '18:33:41', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(582, 79, '2019-08-29', '08:39:47', NULL, '18:20:02', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(583, 38, '2019-08-29', '08:44:22', NULL, '17:39:43', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(584, 96, '2019-08-29', '08:54:01', NULL, '17:33:46', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(585, 94, '2019-08-29', '08:54:31', NULL, '17:40:26', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(586, 93, '2019-08-29', '09:57:39', NULL, '17:19:51', NULL, '1.27', NULL, '0.10', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(587, 59, '2019-08-29', '10:05:47', NULL, '18:04:54', NULL, '1.35', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(588, 97, '2019-08-30', '06:35:04', NULL, '17:57:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(589, 92, '2019-08-30', '07:41:57', NULL, '21:25:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(590, 38, '2019-08-30', '08:13:53', NULL, '17:44:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(591, 99, '2019-08-30', '08:14:10', NULL, '18:05:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(592, 87, '2019-08-30', '08:15:10', NULL, '18:01:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(593, 86, '2019-08-30', '08:15:42', NULL, '18:03:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(594, 91, '2019-08-30', '08:28:54', NULL, '17:31:36', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(595, 100, '2019-08-30', '08:32:10', NULL, '00:00:00', 'Lupa clock out!', '0.02', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(596, 98, '2019-08-30', '08:35:19', NULL, '17:57:11', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(597, 79, '2019-08-30', '08:39:42', NULL, '18:34:49', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(598, 59, '2019-08-30', '08:40:03', NULL, '17:33:01', NULL, '0.10', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(599, 54, '2019-08-30', '08:44:37', NULL, '17:35:03', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(600, 96, '2019-08-30', '08:44:41', NULL, '16:29:23', NULL, '0.14', NULL, '1.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(601, 94, '2019-08-30', '08:49:51', NULL, '16:29:28', NULL, '0.19', NULL, '1.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(602, 57, '2019-08-30', '08:51:56', NULL, '18:34:44', NULL, '0.21', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(603, 88, '2019-08-30', '08:53:05', NULL, '17:58:02', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(604, 83, '2019-08-30', '08:57:02', NULL, '18:14:27', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(605, 26, '2019-08-30', '09:11:57', NULL, '17:57:17', NULL, '0.41', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(606, 93, '2019-08-30', '09:48:48', NULL, '18:34:38', NULL, '1.18', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(607, 97, '2019-09-02', '07:02:12', NULL, '18:30:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(608, 89, '2019-09-02', '07:02:17', NULL, '18:04:56', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(609, 96, '2019-09-02', '08:16:39', NULL, '17:34:58', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(610, 91, '2019-09-02', '08:24:55', NULL, '18:09:51', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(611, 99, '2019-09-02', '08:33:57', NULL, '18:31:40', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(612, 100, '2019-09-02', '08:37:03', NULL, '17:56:39', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(613, 94, '2019-09-02', '08:54:32', NULL, '17:38:20', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(614, 79, '2019-09-02', '08:56:59', NULL, '18:30:31', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(615, 38, '2019-09-02', '09:42:56', NULL, '18:37:24', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(616, 88, '2019-09-02', '09:43:50', NULL, '17:38:30', NULL, '1.13', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(617, 97, '2019-09-03', '06:41:49', NULL, '18:30:10', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(618, 89, '2019-09-03', '07:43:30', NULL, '18:20:21', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(619, 92, '2019-09-03', '08:10:50', NULL, '16:56:47', NULL, '0.00', NULL, '0.33', NULL, 1, NULL, '2019-10-02 23:44:25', '2019-10-02 23:44:25'),
(620, 96, '2019-09-03', '08:22:34', NULL, '17:33:43', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(621, 91, '2019-09-03', '08:30:50', NULL, '18:08:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(622, 100, '2019-09-03', '08:31:05', NULL, '17:47:38', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(623, 81, '2019-09-03', '08:34:05', NULL, '17:42:16', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(624, 83, '2019-09-03', '08:34:19', NULL, '17:42:04', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(625, 86, '2019-09-03', '08:36:07', NULL, '17:55:41', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(626, 99, '2019-09-03', '08:37:04', NULL, '18:26:39', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(627, 88, '2019-09-03', '08:46:03', NULL, '17:51:52', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(628, 57, '2019-09-03', '08:47:16', NULL, '18:23:49', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(629, 79, '2019-09-03', '08:47:31', NULL, '18:29:58', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(630, 54, '2019-09-03', '08:53:54', NULL, '17:42:11', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(631, 98, '2019-09-03', '09:04:59', NULL, '00:00:00', 'Lupa clock out!', '0.34', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(632, 94, '2019-09-03', '09:19:10', NULL, '17:33:17', NULL, '0.49', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(633, 38, '2019-09-03', '09:20:28', NULL, '18:20:57', NULL, '0.50', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(634, 87, '2019-09-03', '09:33:04', NULL, '18:28:27', NULL, '1.03', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(635, 93, '2019-09-03', '09:36:15', NULL, '18:27:16', NULL, '1.06', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(636, 26, '2019-09-03', '10:24:03', NULL, '15:01:10', NULL, '1.54', NULL, '2.28', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(637, 101, '2019-09-03', '14:36:37', NULL, '00:00:00', 'Lupa clock out!', '6.06', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(638, 59, '2019-09-03', '00:00:00', 'Lupa clock in!', '18:27:42', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(639, 97, '2019-09-04', '06:35:29', NULL, '18:31:24', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(640, 89, '2019-09-04', '07:33:19', NULL, '18:27:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(641, 101, '2019-09-04', '08:11:43', NULL, '18:46:51', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(642, 86, '2019-09-04', '08:13:58', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(643, 100, '2019-09-04', '08:22:20', NULL, '17:45:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(644, 99, '2019-09-04', '08:22:25', NULL, '18:19:37', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(645, 26, '2019-09-04', '08:22:42', NULL, '17:30:22', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(646, 54, '2019-09-04', '08:28:54', NULL, '17:30:33', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(647, 81, '2019-09-04', '08:30:26', NULL, '17:37:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(648, 83, '2019-09-04', '08:30:35', NULL, '17:37:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(649, 79, '2019-09-04', '08:35:49', NULL, '18:06:44', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-09 20:08:00'),
(650, 91, '2019-09-04', '08:36:55', NULL, '18:30:54', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(651, 88, '2019-09-04', '08:38:59', NULL, '17:53:01', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(652, 57, '2019-09-04', '08:43:18', NULL, '18:31:49', NULL, '0.13', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(653, 87, '2019-09-04', '08:44:36', NULL, '18:29:51', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(654, 94, '2019-09-04', '08:45:53', NULL, '17:44:51', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(655, 93, '2019-09-04', '09:23:10', NULL, '18:46:57', NULL, '0.53', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(656, 38, '2019-09-04', '09:26:20', NULL, '18:47:44', NULL, '0.56', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(657, 59, '2019-09-04', '09:41:11', NULL, '18:29:41', NULL, '1.11', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(658, 92, '2019-09-04', '00:00:00', 'Lupa clock in!', '18:19:30', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(659, 97, '2019-09-05', '06:35:46', NULL, '18:30:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(660, 92, '2019-09-05', '07:49:44', NULL, '16:41:31', NULL, '0.00', NULL, '0.48', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(661, 89, '2019-09-05', '08:03:04', NULL, '18:12:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(662, 101, '2019-09-05', '08:07:27', NULL, '18:18:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(663, 26, '2019-09-05', '08:20:00', NULL, '17:30:23', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(664, 54, '2019-09-05', '08:25:59', NULL, '17:36:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(665, 98, '2019-09-05', '08:26:35', NULL, '18:23:05', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(666, 91, '2019-09-05', '08:29:22', NULL, '17:49:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(667, 100, '2019-09-05', '08:31:30', NULL, '18:23:26', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(668, 81, '2019-09-05', '08:33:51', NULL, '17:37:46', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(669, 83, '2019-09-05', '08:34:13', NULL, '17:37:31', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(670, 88, '2019-09-05', '08:35:24', NULL, '17:37:14', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(671, 96, '2019-09-05', '08:36:46', NULL, '17:32:25', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(672, 99, '2019-09-05', '08:39:47', NULL, '18:23:11', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(673, 86, '2019-09-05', '08:44:52', NULL, '17:32:14', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(674, 59, '2019-09-05', '08:58:05', NULL, '18:08:33', NULL, '0.28', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(675, 38, '2019-09-05', '08:59:36', NULL, '18:11:42', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(676, 57, '2019-09-05', '09:02:51', NULL, '18:12:44', NULL, '0.32', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(677, 97, '2019-09-06', '06:40:20', NULL, '18:30:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(678, 89, '2019-09-06', '07:59:37', NULL, '18:24:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(679, 92, '2019-09-06', '07:59:42', NULL, '16:34:06', NULL, '0.00', NULL, '0.55', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(680, 96, '2019-09-06', '08:05:34', NULL, '17:37:10', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(681, 99, '2019-09-06', '08:06:30', NULL, '18:37:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(682, 26, '2019-09-06', '08:11:09', NULL, '17:36:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(683, 98, '2019-09-06', '10:15:59', NULL, '00:00:00', 'Lupa clock out!', '1.45', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(684, 101, '2019-09-06', '08:21:35', NULL, '18:38:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(685, 91, '2019-09-06', '08:24:56', NULL, '18:12:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(686, 100, '2019-09-06', '08:27:16', NULL, '18:38:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(687, 79, '2019-09-06', '08:29:02', NULL, '18:32:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(688, 54, '2019-09-06', '08:30:04', NULL, '17:57:43', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(689, 81, '2019-09-06', '08:32:51', NULL, '17:57:15', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(690, 83, '2019-09-06', '08:33:24', NULL, '17:36:34', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(691, 57, '2019-09-06', '08:35:37', NULL, '18:37:47', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(692, 88, '2019-09-06', '08:41:34', NULL, '17:36:44', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(693, 38, '2019-09-06', '08:50:00', NULL, '18:25:49', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(694, 94, '2019-09-06', '08:54:05', NULL, '17:36:55', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(695, 93, '2019-09-06', '09:14:33', NULL, '18:37:35', NULL, '0.44', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(696, 59, '2019-09-06', '09:19:15', NULL, '17:34:38', NULL, '0.49', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(697, 93, '2019-09-08', '06:15:10', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(698, 97, '2019-09-09', '07:47:45', NULL, '18:35:26', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26');
INSERT INTO `presensi` (`id_presensi`, `id_sidik_jari`, `tanggal_presensi`, `jam_clock_in`, `info_clock_in`, `jam_clock_out`, `info_clock_out`, `late_presensi`, `info_late_presensi`, `early_presensi`, `info_early_presensi`, `transport_presensi`, `keterangan_presensi`, `created_at`, `updated_at`) VALUES
(699, 99, '2019-09-09', '07:53:02', NULL, '18:39:47', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(700, 89, '2019-09-09', '07:53:09', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(701, 54, '2019-09-09', '08:04:09', NULL, '18:34:46', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(702, 83, '2019-09-09', '08:13:46', NULL, '18:01:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(703, 101, '2019-09-09', '08:23:02', NULL, '18:45:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(704, 91, '2019-09-09', '08:25:23', NULL, '18:35:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(705, 38, '2019-09-09', '08:25:42', NULL, '18:39:40', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(706, 100, '2019-09-09', '08:35:38', NULL, '17:35:59', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(707, 86, '2019-09-09', '08:47:19', NULL, '18:31:34', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(708, 57, '2019-09-09', '08:56:09', NULL, '17:49:17', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(709, 98, '2019-09-09', '09:11:35', NULL, '17:36:02', NULL, '0.41', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(710, 88, '2019-09-09', '09:21:47', NULL, '17:32:25', NULL, '0.51', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(711, 92, '2019-09-09', '09:32:03', NULL, '16:44:18', NULL, '1.02', NULL, '0.45', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(712, 93, '2019-09-09', '10:09:13', NULL, '18:28:57', NULL, '1.39', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(713, 79, '2019-09-09', '10:23:04', NULL, '17:52:19', NULL, '1.53', 'telat', '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-09 20:08:00'),
(714, 94, '2019-09-09', '10:23:29', NULL, '17:32:16', NULL, '1.53', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(715, 96, '2019-09-09', '10:33:26', NULL, '17:32:09', NULL, '2.03', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(716, 59, '2019-09-09', '11:01:03', NULL, '17:31:25', NULL, '2.31', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(717, 97, '2019-09-10', '06:46:21', NULL, '18:32:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(718, 89, '2019-09-10', '08:02:57', NULL, '18:46:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(719, 83, '2019-09-10', '08:05:13', NULL, '17:34:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(720, 101, '2019-09-10', '08:08:00', NULL, '18:46:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(721, 92, '2019-09-10', '08:11:57', NULL, '17:16:08', NULL, '0.00', NULL, '0.13', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(722, 26, '2019-09-10', '08:16:28', NULL, '17:49:56', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(723, 81, '2019-09-10', '08:19:49', NULL, '17:34:48', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(724, 100, '2019-09-10', '08:25:19', NULL, '16:58:54', NULL, '0.00', NULL, '0.31', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(725, 91, '2019-09-10', '08:26:14', NULL, '18:12:16', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(726, 98, '2019-09-10', '08:27:16', NULL, '18:46:52', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(727, 99, '2019-09-10', '08:29:04', NULL, '18:13:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(728, 54, '2019-09-10', '08:30:35', NULL, '17:31:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(729, 38, '2019-09-10', '08:30:39', NULL, '18:28:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(730, 87, '2019-09-10', '08:30:43', NULL, '18:15:09', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(731, 86, '2019-09-10', '08:37:36', NULL, '18:12:10', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(732, 79, '2019-09-10', '08:42:50', NULL, '18:32:36', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(733, 88, '2019-09-10', '08:46:39', NULL, '17:41:11', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(734, 57, '2019-09-10', '09:05:17', NULL, '18:27:34', NULL, '0.35', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(735, 93, '2019-09-10', '09:12:23', NULL, '18:12:04', NULL, '0.42', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(736, 96, '2019-09-10', '09:38:02', NULL, '17:37:09', NULL, '1.08', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(737, 94, '2019-09-10', '09:41:13', NULL, '17:34:59', NULL, '1.11', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(738, 59, '2019-09-10', '09:42:13', NULL, '18:45:56', NULL, '1.12', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(739, 97, '2019-09-11', '06:26:11', NULL, '18:30:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(740, 89, '2019-09-11', '08:00:51', NULL, '17:52:39', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(741, 92, '2019-09-11', '08:11:19', NULL, '16:39:21', NULL, '0.00', NULL, '0.50', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(742, 98, '2019-09-11', '08:22:21', NULL, '18:25:18', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(743, 91, '2019-09-11', '08:25:15', NULL, '18:17:54', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(744, 99, '2019-09-11', '08:25:59', NULL, '18:25:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(745, 81, '2019-09-11', '08:27:07', NULL, '18:04:59', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(746, 54, '2019-09-11', '08:27:22', NULL, '17:38:27', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(747, 101, '2019-09-11', '08:27:29', NULL, '18:25:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(748, 96, '2019-09-11', '08:27:41', NULL, '17:39:39', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(749, 100, '2019-09-11', '08:28:40', NULL, '17:50:39', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(750, 86, '2019-09-11', '08:30:04', NULL, '17:42:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(751, 94, '2019-09-11', '08:44:06', NULL, '17:41:41', NULL, '0.14', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(752, 38, '2019-09-11', '08:45:00', NULL, '18:05:05', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(753, 79, '2019-09-11', '08:46:39', NULL, '16:43:50', NULL, '0.16', NULL, '0.46', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(754, 88, '2019-09-11', '08:47:21', NULL, '17:41:16', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(755, 57, '2019-09-11', '08:59:06', NULL, '18:04:50', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(756, 26, '2019-09-11', '08:59:35', NULL, '18:11:10', NULL, '0.29', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(757, 93, '2019-09-11', '09:13:33', NULL, '17:45:23', NULL, '0.43', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(758, 59, '2019-09-11', '09:53:20', NULL, '17:39:56', NULL, '1.23', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(759, 97, '2019-09-12', '06:34:51', NULL, '18:30:10', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(760, 92, '2019-09-12', '07:40:40', NULL, '18:42:30', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(761, 26, '2019-09-12', '08:17:16', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(762, 54, '2019-09-12', '08:22:45', NULL, '18:11:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(763, 99, '2019-09-12', '08:22:52', NULL, '19:19:57', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(764, 100, '2019-09-12', '08:24:22', NULL, '19:19:42', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(765, 81, '2019-09-12', '08:27:34', NULL, '18:05:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(766, 91, '2019-09-12', '08:28:10', NULL, '18:36:13', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(767, 101, '2019-09-12', '08:30:36', NULL, '17:51:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(768, 96, '2019-09-12', '08:34:12', NULL, '17:36:37', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(769, 98, '2019-09-12', '08:37:11', NULL, '19:19:37', NULL, '0.07', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(770, 38, '2019-09-12', '08:38:48', NULL, '18:03:45', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(771, 57, '2019-09-12', '08:39:11', NULL, '18:04:19', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(772, 86, '2019-09-12', '08:55:00', NULL, '19:20:01', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(773, 59, '2019-09-12', '08:55:23', NULL, '17:39:43', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(774, 94, '2019-09-12', '09:31:14', NULL, '17:36:31', NULL, '1.01', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:26', '2019-10-02 23:44:26'),
(775, 97, '2019-09-13', '06:41:11', NULL, '18:32:22', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(776, 92, '2019-09-13', '07:54:57', NULL, '18:16:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(777, 89, '2019-09-13', '14:48:28', NULL, '00:00:00', 'Lupa clock out!', '6.18', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(778, 91, '2019-09-13', '08:25:58', NULL, '17:43:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(779, 81, '2019-09-13', '08:26:16', NULL, '18:11:40', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(780, 83, '2019-09-13', '08:26:57', NULL, '17:37:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(781, 54, '2019-09-13', '08:29:42', NULL, '17:33:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(782, 57, '2019-09-13', '08:29:46', NULL, '18:39:30', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(783, 87, '2019-09-13', '08:30:37', NULL, '18:19:19', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(784, 26, '2019-09-13', '08:31:32', NULL, '17:35:07', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(785, 99, '2019-09-13', '08:31:40', NULL, '18:38:49', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(786, 100, '2019-09-13', '08:33:42', NULL, '17:46:40', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(787, 88, '2019-09-13', '08:46:42', NULL, '17:45:47', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(788, 94, '2019-09-13', '08:53:08', NULL, '17:35:25', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(789, 86, '2019-09-13', '08:55:08', NULL, '18:30:43', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(790, 96, '2019-09-13', '08:56:58', NULL, '00:00:00', 'Lupa clock out!', '0.26', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(791, 98, '2019-09-13', '08:57:57', NULL, '18:37:15', NULL, '0.27', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(792, 79, '2019-09-13', '09:08:55', NULL, '18:09:40', NULL, '0.38', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(793, 38, '2019-09-13', '09:12:33', NULL, '18:38:36', NULL, '0.42', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(794, 93, '2019-09-13', '00:00:00', 'Lupa clock in!', '18:36:07', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(795, 97, '2019-09-16', '06:36:16', NULL, '18:30:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(796, 92, '2019-09-16', '07:25:24', NULL, '18:33:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(797, 101, '2019-09-16', '08:17:16', NULL, '18:21:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(798, 89, '2019-09-16', '08:21:57', NULL, '17:55:47', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(799, 57, '2019-09-16', '08:23:59', NULL, '18:13:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(800, 91, '2019-09-16', '08:26:51', NULL, '18:18:35', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(801, 26, '2019-09-16', '08:27:04', NULL, '17:44:05', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(802, 54, '2019-09-16', '08:30:50', NULL, '17:44:31', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(803, 100, '2019-09-16', '08:32:14', NULL, '17:45:43', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(804, 98, '2019-09-16', '08:33:46', NULL, '17:59:35', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(805, 99, '2019-09-16', '08:33:57', NULL, '18:33:16', NULL, '0.03', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(806, 79, '2019-09-16', '08:41:12', NULL, '18:21:11', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(807, 88, '2019-09-16', '08:45:22', NULL, '17:38:22', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(808, 96, '2019-09-16', '08:45:43', NULL, '17:41:28', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(809, 94, '2019-09-16', '08:45:47', NULL, '17:38:32', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(810, 81, '2019-09-16', '08:47:02', NULL, '17:41:33', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(811, 83, '2019-09-16', '08:47:17', NULL, '17:44:14', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(812, 38, '2019-09-16', '08:49:06', NULL, '18:13:43', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(813, 86, '2019-09-16', '08:52:18', NULL, '17:45:41', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(814, 87, '2019-09-16', '09:30:42', NULL, '00:00:00', 'Lupa clock out!', '1.00', NULL, '4.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(815, 59, '2019-09-16', '11:07:11', NULL, '17:48:34', NULL, '2.37', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(816, 97, '2019-09-17', '06:34:52', NULL, '18:30:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(817, 79, '2019-09-17', '07:22:51', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(818, 89, '2019-09-17', '07:37:43', NULL, '17:39:33', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(819, 54, '2019-09-17', '08:01:49', NULL, '17:34:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(820, 92, '2019-09-17', '08:08:37', NULL, '15:32:47', NULL, '0.00', NULL, '1.57', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(821, 100, '2019-09-17', '08:15:06', NULL, '17:39:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(822, 57, '2019-09-17', '08:21:40', NULL, '18:21:30', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(823, 91, '2019-09-17', '08:22:14', NULL, '18:25:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(824, 101, '2019-09-17', '08:22:50', NULL, '18:25:28', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(825, 26, '2019-09-17', '08:29:36', NULL, '18:18:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(826, 81, '2019-09-17', '08:32:40', NULL, '17:33:27', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(827, 83, '2019-09-17', '08:32:54', NULL, '17:33:18', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(828, 94, '2019-09-17', '08:32:59', NULL, '17:40:47', NULL, '0.02', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(829, 98, '2019-09-17', '08:35:54', NULL, '18:25:13', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(830, 99, '2019-09-17', '08:36:03', NULL, '18:25:18', NULL, '0.06', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(831, 88, '2019-09-17', '08:39:05', NULL, '18:17:48', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(832, 96, '2019-09-17', '08:45:15', NULL, '17:40:44', NULL, '0.15', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(833, 87, '2019-09-17', '08:47:53', NULL, '18:21:23', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(834, 86, '2019-09-17', '08:53:01', NULL, '17:49:59', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(835, 93, '2019-09-17', '08:56:05', NULL, '18:21:33', NULL, '0.26', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(836, 59, '2019-09-17', '09:01:12', NULL, '17:30:41', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(837, 38, '2019-09-17', '09:45:07', NULL, '18:26:09', NULL, '1.15', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(838, 97, '2019-09-18', '06:37:45', NULL, '18:30:11', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(839, 89, '2019-09-18', '07:40:37', NULL, '17:36:01', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(840, 81, '2019-09-18', '08:15:52', NULL, '17:41:46', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(841, 83, '2019-09-18', '08:16:06', NULL, '17:36:57', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(842, 96, '2019-09-18', '08:17:27', NULL, '17:46:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(843, 100, '2019-09-18', '08:20:41', NULL, '17:35:42', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(844, 57, '2019-09-18', '08:21:18', NULL, '18:27:45', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(845, 101, '2019-09-18', '08:29:54', NULL, '18:30:33', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(846, 54, '2019-09-18', '08:30:17', NULL, '17:35:31', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(847, 26, '2019-09-18', '08:30:55', NULL, '17:40:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(848, 79, '2019-09-18', '08:41:00', NULL, '18:01:14', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(849, 38, '2019-09-18', '08:42:00', NULL, '18:21:23', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(850, 86, '2019-09-18', '08:46:00', NULL, '17:42:00', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(851, 87, '2019-09-18', '08:47:02', NULL, '17:41:28', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(852, 88, '2019-09-18', '08:49:59', NULL, '17:46:14', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(853, 98, '2019-09-18', '08:50:12', NULL, '18:30:28', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(854, 99, '2019-09-18', '08:50:17', NULL, '18:29:53', NULL, '0.20', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(855, 94, '2019-09-18', '08:52:47', NULL, '17:46:20', NULL, '0.22', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(856, 59, '2019-09-18', '08:53:55', NULL, '17:39:28', NULL, '0.23', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(857, 93, '2019-09-18', '10:07:46', NULL, '18:26:57', NULL, '1.37', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(858, 97, '2019-09-19', '06:36:42', NULL, '18:30:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(859, 92, '2019-09-19', '07:22:15', NULL, '17:27:36', NULL, '0.00', NULL, '0.02', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(860, 98, '2019-09-19', '08:20:01', NULL, '18:14:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(861, 99, '2019-09-19', '08:20:10', NULL, '18:18:14', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(863, 26, '2019-09-19', '08:24:32', NULL, '17:30:08', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(864, 91, '2019-09-19', '08:24:49', NULL, '18:19:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(865, 96, '2019-09-19', '08:25:22', NULL, '17:45:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(866, 57, '2019-09-19', '08:25:41', NULL, '18:14:59', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(867, 88, '2019-09-19', '08:26:42', NULL, '17:44:24', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(868, 100, '2019-09-19', '08:27:37', NULL, '17:34:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(869, 54, '2019-09-19', '08:30:22', NULL, '18:13:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(870, 101, '2019-09-19', '08:41:25', NULL, '17:51:43', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(871, 81, '2019-09-19', '08:41:30', NULL, '18:13:41', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(872, 83, '2019-09-19', '08:41:49', NULL, '18:13:25', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(873, 86, '2019-09-19', '08:42:59', NULL, '17:39:48', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(874, 38, '2019-09-19', '08:55:42', NULL, '17:57:11', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(875, 79, '2019-09-19', '08:55:52', NULL, '00:00:00', 'Lupa clock out!', '0.25', NULL, '4.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(876, 59, '2019-09-19', '09:15:28', NULL, '18:03:55', NULL, '0.45', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(877, 94, '2019-09-19', '09:27:28', NULL, '17:44:31', NULL, '0.57', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(878, 89, '2019-09-19', '09:39:49', NULL, '18:12:44', NULL, '1.09', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(879, 97, '2019-09-20', '06:35:06', NULL, '18:30:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(880, 89, '2019-09-20', '06:57:35', NULL, '17:40:00', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(881, 92, '2019-09-20', '07:43:18', NULL, '17:18:19', NULL, '0.00', NULL, '0.11', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(882, 57, '2019-09-20', '08:16:54', NULL, '18:31:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(883, 26, '2019-09-20', '08:17:51', NULL, '17:41:20', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(884, 81, '2019-09-20', '08:21:32', NULL, '17:34:38', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(885, 83, '2019-09-20', '08:21:55', NULL, '17:41:25', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(886, 101, '2019-09-20', '08:24:41', NULL, '18:21:49', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(887, 96, '2019-09-20', '08:26:40', NULL, '19:25:15', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(888, 100, '2019-09-20', '08:28:08', NULL, '19:25:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(889, 54, '2019-09-20', '08:28:30', NULL, '18:44:03', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(890, 91, '2019-09-20', '08:31:45', NULL, '17:38:42', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(891, 88, '2019-09-20', '08:35:23', NULL, '17:40:33', NULL, '0.05', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(892, 98, '2019-09-20', '08:38:43', NULL, '17:31:36', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(893, 99, '2019-09-20', '08:38:52', NULL, '18:22:12', NULL, '0.08', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(894, 79, '2019-09-20', '08:54:59', NULL, '18:31:17', NULL, '0.24', NULL, '0.00', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(895, 59, '2019-09-20', '08:55:39', NULL, '17:28:18', NULL, '0.25', NULL, '0.01', NULL, 1, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(896, 38, '2019-09-20', '09:00:39', NULL, '18:20:24', NULL, '0.30', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(897, 93, '2019-09-20', '09:11:22', NULL, '18:31:12', NULL, '0.41', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(898, 87, '2019-09-20', '00:00:00', 'Lupa clock in!', '17:31:53', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-02 23:44:27', '2019-10-02 23:44:27'),
(900, 93, '2019-09-19', '08:24:01', NULL, '18:17:12', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-09 01:49:31', '2019-10-09 20:08:01'),
(902, 83, '2019-08-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STSD : asdfg', '2019-10-09 20:17:48', '2019-10-09 20:17:48'),
(903, 83, '2019-09-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dinas Luar : Day Out', '2019-10-09 20:20:21', '2019-10-09 20:20:21'),
(904, 105, '2019-09-05', '13:38:19', NULL, '00:00:00', 'Lupa clock out!', '5.08', NULL, '4.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(905, 103, '2019-09-05', '00:00:00', 'Lupa clock in!', '18:11:28', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(906, 104, '2019-09-05', '00:00:00', 'Lupa clock in!', '18:11:33', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(907, 102, '2019-09-05', '00:00:00', 'Lupa clock in!', '18:11:37', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(908, 102, '2019-09-06', '07:59:48', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(909, 104, '2019-09-06', '08:17:12', NULL, '18:30:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(910, 103, '2019-09-06', '09:10:39', NULL, '00:00:00', 'Lupa clock out!', '0.40', NULL, '4.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(911, 105, '2019-09-09', '07:47:51', NULL, '17:33:55', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(912, 104, '2019-09-09', '07:55:07', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(913, 102, '2019-09-09', '08:38:41', NULL, '00:00:00', 'Lupa clock out!', '0.08', NULL, '4.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(914, 103, '2019-09-09', '09:09:53', NULL, '17:48:47', NULL, '0.39', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(915, 105, '2019-09-10', '06:45:53', NULL, '17:39:44', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(916, 102, '2019-09-10', '08:10:21', NULL, '17:16:14', NULL, '0.00', NULL, '0.13', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(917, 104, '2019-09-10', '08:13:49', NULL, '18:28:30', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(918, 103, '2019-09-10', '14:53:22', NULL, '00:00:00', 'Lupa clock out!', '6.23', NULL, '4.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(919, 105, '2019-09-11', '07:22:24', NULL, '18:10:56', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(920, 104, '2019-09-11', '08:31:55', NULL, '18:14:30', NULL, '0.01', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(921, 103, '2019-09-11', '08:49:30', NULL, '15:52:15', NULL, '0.19', NULL, '1.37', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(922, 102, '2019-09-11', '09:01:11', NULL, '18:14:35', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(923, 106, '2019-09-11', '16:57:01', NULL, '18:15:58', NULL, '8.27', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(924, 102, '2019-09-12', '07:32:38', NULL, '18:27:17', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(925, 104, '2019-09-12', '08:22:33', NULL, '18:26:06', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:40', '2019-10-14 05:37:40'),
(926, 106, '2019-09-12', '08:34:52', NULL, '18:26:11', NULL, '0.04', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(927, 105, '2019-09-12', '08:41:37', NULL, '18:26:00', NULL, '0.11', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(928, 103, '2019-09-12', '08:42:07', NULL, '18:02:25', NULL, '0.12', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(929, 104, '2019-09-13', '08:10:23', NULL, '18:39:02', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(930, 105, '2019-09-13', '08:26:29', NULL, '16:29:24', NULL, '0.00', NULL, '1.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(931, 106, '2019-09-13', '08:49:28', NULL, '18:39:14', NULL, '0.19', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(932, 103, '2019-09-13', '08:55:13', NULL, '18:35:59', NULL, '0.25', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(933, 102, '2019-09-13', '09:22:13', NULL, '18:38:40', NULL, '0.52', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(934, 104, '2019-09-16', '08:24:49', NULL, '00:00:00', 'Lupa clock out!', '0.00', NULL, '4.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(935, 103, '2019-09-16', '14:43:34', NULL, '00:00:00', 'Lupa clock out!', '6.13', NULL, '4.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(936, 105, '2019-09-16', '08:58:22', NULL, '00:00:00', 'Lupa clock out!', '0.28', NULL, '4.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(937, 106, '2019-09-16', '09:29:24', NULL, '18:17:39', NULL, '0.59', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(938, 102, '2019-09-16', '10:42:47', NULL, '18:13:37', NULL, '2.12', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(939, 104, '2019-09-17', '08:14:49', NULL, '18:27:07', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(940, 106, '2019-09-17', '08:46:22', NULL, '18:27:02', NULL, '0.16', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(941, 103, '2019-09-17', '09:10:00', NULL, '18:09:31', NULL, '0.40', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(942, 102, '2019-09-17', '00:00:00', 'Lupa clock in!', '18:26:20', NULL, '4.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(943, 102, '2019-09-18', '08:47:19', NULL, '18:26:20', NULL, '0.17', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(944, 105, '2019-09-18', '09:00:47', NULL, '18:26:00', NULL, '0.30', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(945, 106, '2019-09-18', '09:09:16', NULL, '18:25:51', NULL, '0.39', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(946, 104, '2019-09-18', '14:04:05', NULL, '18:19:56', NULL, '5.34', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(947, 103, '2019-09-18', '14:09:13', NULL, '18:15:32', NULL, '5.39', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(948, 105, '2019-09-19', '07:59:29', NULL, '18:04:34', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(949, 104, '2019-09-19', '08:07:19', NULL, '18:00:23', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(950, 102, '2019-09-19', '08:29:08', NULL, '17:55:29', NULL, '0.00', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(951, 103, '2019-09-19', '09:05:13', NULL, '18:00:28', NULL, '0.35', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(952, 106, '2019-09-19', '09:43:56', NULL, '18:00:47', NULL, '1.13', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(953, 104, '2019-09-20', '08:39:05', NULL, '18:20:20', NULL, '0.09', NULL, '0.00', NULL, 1, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(954, 103, '2019-09-20', '09:01:27', NULL, '18:20:17', NULL, '0.31', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(955, 102, '2019-09-20', '09:06:22', NULL, '18:20:04', NULL, '0.36', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(956, 106, '2019-09-20', '09:09:47', NULL, '18:19:59', NULL, '0.39', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41'),
(957, 105, '2019-09-20', '09:19:27', NULL, '18:20:12', NULL, '0.49', NULL, '0.00', NULL, NULL, NULL, '2019-10-14 05:37:41', '2019-10-14 05:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `presensibulan`
--

CREATE TABLE `presensibulan` (
  `id_presensi` bigint(20) UNSIGNED NOT NULL,
  `id_sidik_jari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_presensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_absen` int(11) DEFAULT NULL,
  `ijin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_luar_tanggungan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_penting` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispensasi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdsd` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stsd` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_tahunan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_late_presensi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_early_presensi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_keterlambatan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_presensi` int(11) DEFAULT NULL,
  `tambahan_presensi` int(11) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_perizinan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensibulan`
--

INSERT INTO `presensibulan` (`id_presensi`, `id_sidik_jari`, `periode_presensi`, `jumlah_absen`, `ijin`, `cuti_luar_tanggungan`, `cuti_penting`, `dispensasi`, `sdsd`, `stsd`, `cuti_tahunan`, `total_late_presensi`, `total_early_presensi`, `jumlah_keterlambatan`, `transport_presensi`, `tambahan_presensi`, `keterangan`, `ket_perizinan`, `created_at`, `updated_at`) VALUES
(1, '97', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '0', '0', '0.00', '0.00', '0.00', 22, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-22 20:51:05'),
(2, '92', '2019-07-21 2019-08-20', 0, '1', '0', '0', '0', '0', '0', '0', '5.05', '0.01', '5.06', 21, -2, NULL, '', '2019-09-20 00:39:53', '2019-09-30 20:42:05'),
(3, '89', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '1', '0', '0.45', '0.00', '0.45', 21, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(4, '88', '2019-07-21 2019-08-20', 0, '0', '0', '1', '0', '0', '0', '0', '3.56', '4.00', '7.56', 19, 2, NULL, '', '2019-09-20 00:39:53', '2019-09-23 07:44:21'),
(5, '96', '2019-07-21 2019-08-20', 0, '2', '0', '0', '0', '0', '0', '0', '2.33', '4.00', '6.33', 19, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-22 20:51:05'),
(6, '83', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '1', '1', '0.31', '0.00', '0.31', 20, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(7, '91', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '2', '1', '0', '0.26', '8.00', '8.26', 19, NULL, '25%', '', '2019-09-20 00:39:53', '2019-09-24 01:01:48'),
(8, '54', '2019-07-21 2019-08-20', 0, '0', '0', '1', '0', '0', '2', '0', '0.42', '0.00', '0.42', 17, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(9, '86', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '1', '0', '5.54', '0.00', '5.54', 19, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-24 01:19:50'),
(10, '59', '2019-07-21 2019-08-20', 0, '0', '0', '0', '1', '0', '1', '0', '13.11', '0.00', '13.11', 11, NULL, '25%', '', '2019-09-20 00:39:53', '2019-09-24 01:19:50'),
(11, '81', '2019-07-21 2019-08-20', 0, '0', '0', '1', '0', '0', '1', '0', '1.19', '0.00', '1.19', 20, NULL, NULL, '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(12, '87', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '0', '1', '4.31', '16.00', '20.31', 20, 1, '50%', '', '2019-09-20 00:39:53', '2019-09-24 01:19:50'),
(13, '79', '2019-07-21 2019-08-20', 0, '3', '0', '0', '0', '0', '0', '0', '5.20', '4.00', '9.20', 17, NULL, '25%', '', '2019-09-20 00:39:53', '2019-09-30 20:42:05'),
(14, '38', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '2', '0', '10.06', '0.00', '10.06', 16, NULL, '25%', '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(15, '98', '2019-07-21 2019-08-20', 0, '1', '0', '0', '0', '0', '1', '0', '8.56', '0.00', '8.56', 14, NULL, '25%', '', '2019-09-20 00:39:53', '2019-10-01 00:16:46'),
(16, '94', '2019-07-21 2019-08-20', 0, '1', '0', '1', '0', '1', '0', '0', '5.39', '4.00', '9.39', 11, 5, '25%', '', '2019-09-20 00:39:53', '2019-09-30 20:35:24'),
(17, '57', '2019-07-21 2019-08-20', 0, '0', '0', '0', '1', '0', '0', '1', '9.00', '0.00', '9.00', 14, NULL, '25%', '', '2019-09-20 00:39:53', '2019-09-23 22:35:49'),
(18, '93', '2019-07-21 2019-08-20', 0, '0', '1', '0', '0', '2', '3', '0', '24.28', '16.00', '40.28', 4, NULL, '100% + 1H', '', '2019-09-20 00:39:53', '2019-10-01 02:42:47'),
(19, '26', '2019-07-21 2019-08-20', 0, '1', '0', '0', '1', '0', '0', '0', '2.39', '8.00', '10.39', 16, 1, '25%', '', '2019-09-20 00:39:53', '2019-09-30 20:42:06'),
(20, '99', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '0', '0', '0.46', '0.00', '0.46', 13, NULL, NULL, '', '2019-09-20 00:39:53', '2019-10-01 00:16:46'),
(21, '100', '2019-07-21 2019-08-20', 0, '0', '0', '0', '0', '0', '0', '0', '0.10', '0.00', '0.10', 14, NULL, NULL, '', '2019-09-20 00:39:53', '2019-10-01 00:16:46'),
(22, '97', '2019-08-21 2019-09-20', 0, '0', '0', '0', '0', '0', '0', '0', '0.00', '0.00', '0.00', 23, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(23, '86', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '3.26', '4.00', '7.26', 20, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(24, '83', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '1', '0', '8.29', '4.00', '12.29', 18, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-14 05:38:44'),
(25, '92', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '9.02', '12.09', '21.11', 18, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(26, '100', '2019-08-21 2019-09-20', 0, '0', '0', '0', '0', '0', '0', '0', '0.24', '16.31', '16.55', 23, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(27, '54', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '0.56', '0.00', '0.56', 21, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(28, '79', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '6.00', '8.46', '14.46', 19, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-09 20:08:20'),
(29, '91', '2019-08-21 2019-09-20', 1, '0', '0', '0', '0', '0', '0', '0', '5.01', '0.00', '5.01', 20, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(30, '88', '2019-08-21 2019-09-20', 1, '0', '0', '0', '0', '0', '0', '0', '5.45', '0.00', '5.45', 20, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(31, '57', '2019-08-21 2019-09-20', 3, '0', '0', '0', '0', '0', '0', '0', '5.11', '0.00', '5.11', 18, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(32, '38', '2019-08-21 2019-09-20', 0, '0', '0', '0', '0', '0', '0', '0', '11.06', '0.00', '11.06', 15, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(33, '87', '2019-08-21 2019-09-20', 7, '0', '0', '0', '0', '0', '0', '0', '7.49', '4.00', '11.49', 13, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(34, '81', '2019-08-21 2019-09-20', 4, '0', '0', '0', '0', '0', '0', '0', '1.32', '0.00', '1.32', 18, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(35, '59', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '22.39', '0.01', '22.40', 7, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(36, '94', '2019-08-21 2019-09-20', 1, '0', '0', '0', '0', '0', '0', '0', '12.22', '1.00', '13.22', 14, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(37, '93', '2019-08-21 2019-09-20', 4, '0', '0', '0', '0', '0', '0', '0', '22.05', '8.10', '30.15', 3, NULL, '75%', NULL, '2019-10-02 23:44:43', '2019-10-09 20:08:20'),
(38, '26', '2019-08-21 2019-09-20', 3, '0', '0', '0', '0', '0', '0', '0', '4.44', '11.43', '16.27', 17, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(39, '98', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '7.37', '12.00', '19.37', 13, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(40, '96', '2019-08-21 2019-09-20', 0, '0', '0', '0', '0', '0', '0', '0', '9.45', '5.00', '14.45', 19, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(41, '89', '2019-08-21 2019-09-20', 4, '0', '0', '0', '0', '0', '0', '0', '7.27', '13.14', '20.41', 17, NULL, '50%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(42, '99', '2019-08-21 2019-09-20', 2, '0', '0', '0', '0', '0', '0', '0', '2.47', '0.00', '2.47', 20, NULL, NULL, NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(43, '101', '2019-08-21 2019-09-20', 10, '0', '0', '0', '0', '0', '0', '0', '6.17', '4.00', '10.17', 12, NULL, '25%', NULL, '2019-10-02 23:44:43', '2019-10-02 23:44:43'),
(44, '105', '2019-08-21 2019-09-20', 12, '0', '0', '0', '0', '0', '0', '0', '7.06', '9.00', '16.06', 7, NULL, '50%', NULL, '2019-10-14 05:38:44', '2019-10-14 05:38:44'),
(45, '103', '2019-08-21 2019-09-20', 0, '0', '0', '0', '0', '0', '0', '0', '26.16', '13.37', '39.53', 3, NULL, ' + ', NULL, '2019-10-14 05:38:44', '2019-10-14 05:58:15'),
(46, '104', '2019-08-21 2019-09-20', 10, '0', '0', '0', '0', '0', '0', '0', '9.44', '8.00', '17.44', 10, NULL, '50%', NULL, '2019-10-14 05:38:44', '2019-10-14 05:38:44'),
(47, '102', '2019-08-21 2019-09-20', 10, '0', '0', '0', '0', '0', '0', '0', '12.36', '8.13', '20.49', 6, NULL, '50%', NULL, '2019-10-14 05:38:44', '2019-10-14 05:38:44'),
(48, '106', '2019-08-21 2019-09-20', 14, '0', '0', '0', '0', '0', '0', '0', '12.36', '0.00', '12.36', 3, NULL, '25%', NULL, '2019-10-14 05:38:45', '2019-10-14 05:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `ptkp`
--

CREATE TABLE `ptkp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ptkp`
--

INSERT INTO `ptkp` (`id`, `status`, `tarif_bulan`, `tarif_tahun`, `created_at`, `updated_at`) VALUES
(1, 'TK/0', '4500000', '54000000', NULL, NULL),
(2, 'K/0', '4875000', '58500000', NULL, NULL),
(3, 'K/1', '5250000', '63000000', NULL, NULL),
(4, 'K/2', '5625000', '67500000', NULL, NULL),
(5, 'TK/1', '4875000', '58500000', NULL, NULL),
(6, 'TK/2', '5250000', '63000000', NULL, NULL),
(7, 'TK/3', '5625000', '67500000', NULL, NULL),
(8, 'K/3', '6000000', '72000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatpekerjaan`
--

CREATE TABLE `riwayatpekerjaan` (
  `id_riwayat_pekerjaan` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_industri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk_kerja` date DEFAULT NULL,
  `tanggal_selesai_kerja` date DEFAULT NULL,
  `gaji_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_berhenti` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_verklarin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayatpekerjaan`
--

INSERT INTO `riwayatpekerjaan` (`id_riwayat_pekerjaan`, `nik`, `nama_perusahaan`, `jenis_industri`, `jabatan_akhir`, `tanggal_masuk_kerja`, `tanggal_selesai_kerja`, `gaji_akhir`, `alasan_berhenti`, `foto_verklarin`, `created_at`, `updated_at`) VALUES
(2, '156789', 'Lightrees', 'Digital Marketing', 'CTO', '0000-00-00', NULL, '10.000.000', 'Diajakin CEO', 'verklarin.jpg', NULL, NULL),
(3, '160196', 'Lightrees', 'Digital marketing', 'CEO', NULL, NULL, '12.000.000', 'pengen kerja sama orang', 'verklarin.jpg', '2019-08-20 00:11:13', '2019-10-07 22:42:05'),
(6, '160196', 'Lightrees', 'Digital marketing', 'CEO', '0000-00-00', NULL, '12.000.000', 'pengen kerja sama orang', 'verklarin.jpg', '2019-08-20 23:20:37', '2019-08-20 23:20:37'),
(7, '160196', 'Lightrees', 'Digital marketing', 'CEO', NULL, NULL, '12.000.000', 'pengen kerja sama orang', 'verklarin.jpg', '2019-08-20 23:44:29', '2019-10-07 22:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `riwayatpendidikan`
--

CREATE TABLE `riwayatpendidikan` (
  `id_riwayat_pendidikan` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ijazah_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayatpendidikan`
--

INSERT INTO `riwayatpendidikan` (`id_riwayat_pendidikan`, `nik`, `jenjang_pendidikan`, `nama_sekolah`, `kota_sekolah`, `jurusan_pendidikan`, `periode_pendidikan`, `foto_ijazah_sertifikat`, `created_at`, `updated_at`) VALUES
(1, '160196', 'S1', 'ITERA', 'Lampung', 'T.Informatika', '2017/2018', 'Ijazah.jpg', '2019-08-19 23:48:27', '2019-08-20 11:27:47'),
(2, '156789', 'S1', 'UNILA', 'Lampung', 'T.Infromatika', '2012/2016', 'Ijazah.jpg', NULL, NULL),
(3, '160196', 'S2', 'ITERA', 'Lampung', 'Data Scientis', '2018/2018', 'Ijazah.jpg', NULL, '2019-10-07 22:46:51'),
(20, '160196', 'TK', 'UNILA', 'Lampung', 'Bahasa Inggris', '2016/2018', 'Ijazah.jpg', '2019-10-07 21:41:34', '2019-10-07 21:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_karyawan`, `email`, `role`, `email_verified_at`, `password`, `foto_profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alshiro Grey Black D. Silver Moon', 'regrizzlyy@gmail.com', 'SuperAdmin', NULL, '$2y$10$FmmuI2IucA.NIK6577lKLO0LRWvQudi9D6uoifyEijc7j/dEeXr4G', '1570670024300x300.png', 'kktAr9tpTmQVSohpCvLzjYbpH1mhMNSoYGE2OsT1J9hLCvYsGLMOFGaQOjAF', '2019-07-31 19:52:28', '2019-10-09 18:13:44'),
(5, 'Noudie De Jong', 'noudie@ideaimaji.com', 'SuperAdmin', NULL, '$2y$10$Z3XGaq1B69okJ2R/.1BF.OlfwK7AhH9pdgZasaL8kzCSy4ImnJZ4u', NULL, NULL, '2019-08-26 21:48:42', '2019-09-25 21:47:17'),
(6, 'Tasya Yoesni Caesar', 'tasya@ideaimaji.com', 'Karyawan', NULL, '$2y$10$wUhkriA0bX6DBigPOJG3qe2ny3CxQ8WuWxCILLecBWeyhsu.dNNsS', NULL, NULL, '2019-08-26 22:39:44', '2019-08-26 22:39:44'),
(7, 'Afis Siswantini', 'afis@ideaimaji.com', 'Karyawan', NULL, '$2y$10$606h070v7ULrH3sqbd3DTO7QcCyHZbzX5oqx5jFmZNxUew2KVlAKq', NULL, NULL, '2019-08-26 22:42:59', '2019-09-25 22:06:57'),
(8, 'Ikra Amesta Wisnu', 'ikra@ideaimaji.com', 'Karyawan', NULL, '$2y$10$/fgbdwgHpGSQD7/03INUNutPm9PPeDqkyJie2ybOQdmWQObCnwXie', NULL, NULL, '2019-08-26 22:44:25', '2019-09-25 22:09:17'),
(9, 'Rantika Mayang Suri', 'rantika@ideaimaji.com', 'Karyawan', NULL, '$2y$10$12zUqJKwjCbVzWXrV3T9VuWbkZPRealDAeqturRBBQc.S2t8ht.WG', NULL, NULL, '2019-08-26 23:05:37', '2019-09-25 22:02:15'),
(10, 'Eka Satria Perdana', 'eka@ideaimaji.com', 'Karyawan', NULL, '$2y$10$MGtx5Qw/3idPYjOH/9Ckc.CUzJGxxPfJn4x5gtMI/cDjY3ygHghY2', '1569809555300x300.png', NULL, '2019-08-26 23:25:50', '2019-09-29 19:12:35'),
(11, 'Itong Sutisna', 'tidakada@tidakada.com', 'Karyawan', NULL, '$2y$10$w6aUqWKXf70B1YAf6MgATuCdKrfE/1D9CSk.kuPmR7lM6hZ3XIeuS', NULL, NULL, '2019-08-26 23:33:49', '2019-08-26 23:33:49'),
(12, 'Adila Fasa', 'adila@ideaimaji.com', 'Karyawan', NULL, '$2y$10$DT3TwXwPPKb37.vuHVktS.tLANIpyVxB10/zLJmwtUG6ZgW3MfFhW', NULL, NULL, '2019-08-27 02:09:18', '2019-08-27 02:56:10'),
(13, 'Heni Setiawati', 'yayu@ideaimaji.com', 'Admin', NULL, '$2y$10$ZQMFeQWXE.M911TgDPA/JuMmQO/aVLRv55gOf6frGqVYLDEM7ba1m', NULL, NULL, '2019-08-27 02:10:56', '2019-08-27 02:10:56'),
(14, 'Winona Octora', 'winona@ideaimaji.com', 'Karyawan', NULL, '$2y$10$tElNzAjVKeIm8Mw7yHyaJezbr/sHmXmjKG6tz1ihd.OwLSmK3Hwde', '1569809308300x300.png', NULL, '2019-08-27 02:12:35', '2019-09-29 19:08:28'),
(15, 'Bala Putra Dewa', 'putra@ideaimaji.com', 'Karyawan', NULL, '$2y$10$Ac3w8EUIdkPOEoWIAUssaOz0AZY4AKdhdhQ443upyb5OruZAFNLLq', '1569809439300x300.png', NULL, '2019-08-27 02:14:47', '2019-09-29 19:10:39'),
(16, 'Ibnu Alif Prabowo', 'ibnu@ideaimaji.com', 'Karyawan', NULL, '$2y$10$Rb4JbaV7HkQbth43UZcD7ez2E1owqL950g/So4rM9pEy3OeS57mIC', '1569809657300x300.png', NULL, '2019-08-27 02:16:30', '2019-09-29 19:14:17'),
(17, 'Atlas Galant Sedhandoyo', 'atlas@ideaimaji.com', 'Karyawan', NULL, '$2y$10$ndt96sEHGWzf1FTEkdQ65uM967gj932FPZgJyUu1pxZOhRrkQH0uq', NULL, NULL, '2019-08-27 02:22:08', '2019-09-25 22:12:08'),
(18, 'Ben Aryandiaz Herawan', 'ben@ideaimaji.com', 'Karyawan', NULL, '$2y$10$Yiq1Rc18ScKJNz0C3uEo1eMenxbgWZVM37GMDHAeOfF8Q5brRnpf.', NULL, NULL, '2019-08-27 02:42:45', '2019-09-25 22:12:35'),
(19, 'Aripan Nugraha Muhammad Ramdan', 'aripan@ideaimaji.com', 'Karyawan', NULL, '$2y$10$IBQEKs5NJ9IFD1ASQJBHAOHxy0omgDYT0RF8DiNS4exMkSFfCnUJ6', '1570942691300x300.png', NULL, '2019-08-27 02:44:34', '2019-10-12 21:58:11'),
(20, 'Satrio Budyo A', 'satrio@ideaimaji.com', 'SuperAdmin', NULL, '$2y$10$uHsknQ6ULFx9ilIFDz/unutt/k8J/rcEgrVsrokDub9J9WzdhbwJe', '1569809503300x300.png', NULL, '2019-08-27 02:45:52', '2019-09-29 19:11:43'),
(21, 'Mitta Mukti Lestari', 'mitta@ideaimaji.com', 'Admin', NULL, '$2y$10$AN6TKaSXr7sVgRV4s5q0Y.0WSWyQ0WfZNwelv.JMCgLrdEoj/.TE2', '1569809722300x300.png', NULL, '2019-08-27 02:47:50', '2019-09-29 19:15:22'),
(22, 'Adizta Putri Sekarwangi', 'adista@ideaimaji.com', 'Karyawan', NULL, '$2y$10$NiQ1l2GGrKF5N56ahqW2fedCtWrJgXJp0yrJGZWOMnKpAPeX2NGIy', NULL, NULL, '2019-08-27 02:50:00', '2019-09-25 22:03:27'),
(23, 'Yas Budaya', 'yas@ideaimaji.com', 'Karyawan', NULL, '$2y$10$99rB/dIGGWfgzq3AYZop0OKq1rPZ3wYOwHR5fvLZPzkrx9qYO0i0G', NULL, NULL, '2019-08-27 02:51:46', '2019-09-25 21:59:47'),
(24, 'Rizki Fajar Nugraha', 'rizki@ideaimaji.com', 'Karyawan', NULL, '$2y$10$YBAYJoktE.xHHEMgcNT4au9sIJfhcfNXhS7kS9kXYhwVKJrcJgIjq', NULL, NULL, '2019-08-27 20:46:52', '2019-08-27 20:46:52'),
(25, 'Nova Nurdiana', 'nova@ideaimaji.com', 'Admin', NULL, '$2y$10$5VOU3z7xAGPRo8bnJRSJA.V5e7u2OZWBArgYNaYw4Kxr9Jlq0xMPe', '1569809824300x300.png', NULL, '2019-09-18 01:16:51', '2019-09-29 19:17:04'),
(26, 'Aldilas Akbar Satria', 'aldilasakbar@gmail.com', 'Karyawan', NULL, '$2y$10$CoKKeEs8uMv/fPlKrKYCSOaYoxQ9vNdSMP/7lP7vZshUl/efjKoyW', NULL, NULL, '2019-09-29 19:37:19', '2019-09-29 19:37:19'),
(27, 'Gilang Permana', 'gilangpermana596@gmail.com', 'Karyawan', NULL, '$2y$10$N1pIAaf.Ju07LSV23xcNkO1A76wwrO3ZcIG7kahEC6hzXf5/VdzW.', NULL, NULL, '2019-09-29 19:40:42', '2019-09-29 19:40:42'),
(28, 'Sri Maryatun', 'sri@gmail.com', 'Karyawan', NULL, '$2y$10$ZwMEKX82aY/brSEUcGZ7veUyMYijhfjGyrZLvPpqNX9GbMghvMZ/m', NULL, NULL, '2019-09-29 19:43:00', '2019-10-09 01:29:23'),
(29, 'Agus Subarnas', 'agus@kanayavisual.co', 'Karyawan', NULL, '$2y$10$SG94AlZGdE4HKqYJYHW9uu2l.TJb8vijbjFvPpoiwfUcHIPKzEKlq', NULL, NULL, '2019-10-14 05:19:15', '2019-10-14 05:19:15'),
(30, 'Aji Pasha Isdiyanto', 'aji@kanayavisual.co', 'Karyawan', NULL, '$2y$10$rT/k5DN2ANre2qanq6UcCuv8o8qbF12z4pgemrXkA66dsQikxJw7G', NULL, NULL, '2019-10-14 05:22:09', '2019-10-14 05:22:09'),
(31, 'Frian Indrasmara', 'frian@kanayavisual.co', 'Karyawan', NULL, '$2y$10$QvPg/aoWHVVbkCg.68BwOe3cMVGweR0NjfOkBkAr0KJ4zGrNgMIoi', NULL, NULL, '2019-10-14 05:23:02', '2019-10-14 05:23:02'),
(32, 'Dimas Romiyanto', 'dimas@kanayavisual.co', 'Karyawan', NULL, '$2y$10$n1iXxnKKgM3UFIroUfttBekR/X/EhX/gyYTHDCMKGwIdIWBOm63.K', NULL, NULL, '2019-10-14 05:26:52', '2019-10-14 05:26:52'),
(33, 'Neng Ani Suryani', 'ani@kanayavisual.co', 'Karyawan', NULL, '$2y$10$qKAn5TpIymhaG1Lu2IP8.O9sFFH2.sVfI.71l9OIGwIzQxVrm19hO', NULL, NULL, '2019-10-14 05:28:01', '2019-10-14 05:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datafamilia`
--
ALTER TABLE `datafamilia`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indexes for table `datakaryawan`
--
ALTER TABLE `datakaryawan`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `datakaryawan_email_unique` (`email`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `default`
--
ALTER TABLE `default`
  ADD PRIMARY KEY (`id_default`);

--
-- Indexes for table `default_gaji`
--
ALTER TABLE `default_gaji`
  ADD PRIMARY KEY (`id_default_gaji`);

--
-- Indexes for table `default_presensi`
--
ALTER TABLE `default_presensi`
  ADD PRIMARY KEY (`id_default_presensi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengaturan_penggajian`
--
ALTER TABLE `pengaturan_penggajian`
  ADD PRIMARY KEY (`id_pengaturan_penggajian`);

--
-- Indexes for table `pengaturan_presensi`
--
ALTER TABLE `pengaturan_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persetujuanizin`
--
ALTER TABLE `persetujuanizin`
  ADD PRIMARY KEY (`id_persetujuan_izin`);

--
-- Indexes for table `pkp_progresif`
--
ALTER TABLE `pkp_progresif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `presensibulan`
--
ALTER TABLE `presensibulan`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `ptkp`
--
ALTER TABLE `ptkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatpekerjaan`
--
ALTER TABLE `riwayatpekerjaan`
  ADD PRIMARY KEY (`id_riwayat_pekerjaan`);

--
-- Indexes for table `riwayatpendidikan`
--
ALTER TABLE `riwayatpendidikan`
  ADD PRIMARY KEY (`id_riwayat_pendidikan`);

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
-- AUTO_INCREMENT for table `datafamilia`
--
ALTER TABLE `datafamilia`
  MODIFY `id_familia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `datakaryawan`
--
ALTER TABLE `datakaryawan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `default`
--
ALTER TABLE `default`
  MODIFY `id_default` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `default_gaji`
--
ALTER TABLE `default_gaji`
  MODIFY `id_default_gaji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `default_presensi`
--
ALTER TABLE `default_presensi`
  MODIFY `id_default_presensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengaturan_penggajian`
--
ALTER TABLE `pengaturan_penggajian`
  MODIFY `id_pengaturan_penggajian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaturan_presensi`
--
ALTER TABLE `pengaturan_presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `persetujuanizin`
--
ALTER TABLE `persetujuanizin`
  MODIFY `id_persetujuan_izin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pkp_progresif`
--
ALTER TABLE `pkp_progresif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=958;

--
-- AUTO_INCREMENT for table `presensibulan`
--
ALTER TABLE `presensibulan`
  MODIFY `id_presensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ptkp`
--
ALTER TABLE `ptkp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayatpekerjaan`
--
ALTER TABLE `riwayatpekerjaan`
  MODIFY `id_riwayat_pekerjaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayatpendidikan`
--
ALTER TABLE `riwayatpendidikan`
  MODIFY `id_riwayat_pendidikan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
