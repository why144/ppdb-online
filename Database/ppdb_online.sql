-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 04:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_siswa`
--

CREATE TABLE `berkas_siswa` (
  `id_berkas` int(11) NOT NULL,
  `no_pendaftaran` varchar(16) NOT NULL,
  `ktp_ortu` varchar(128) NOT NULL,
  `kk` varchar(128) NOT NULL,
  `akte` varchar(128) NOT NULL,
  `pas_foto` varchar(128) NOT NULL,
  `ijazah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_siswa`
--

INSERT INTO `berkas_siswa` (`id_berkas`, `no_pendaftaran`, `ktp_ortu`, `kk`, `akte`, `pas_foto`, `ijazah`) VALUES
(3, 'PPDB2023730', ' ', ' ', ' ', '23ccd3200a6212199abb41fc599023dd.jpg', ' '),
(4, 'PPDB2023444', 'efed7336b1d2be7af2abb9b4b7decd04.jpg', 'd51d141cd055663e8f6b1c5b43f90173.pdf', 'a242b2676fb50bb3132e804e5b3dbbb0.pdf', 'e5034d722537c9f5657483c1e376c97e.jpg', '0eed80cca60d1fed35a95b530b3623ad.pdf'),
(5, 'PPDB2023977', '68593527295cbd226d5ca5f13a79980a.jpg', '9e498448805ffaaf7fa77d4bde8cab19.pdf', 'f0d498cf3d1c81f52f4daa9e562e9c51.pdf', '96faac6b9e41dc476dabc4fc46f9d3db.jpg', '9d378e4a8139719947b6bf7c34deb795.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `no_pendaftaran` varchar(16) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `nisn` int(12) NOT NULL,
  `sekolah_asal` varchar(64) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `tempat_lahir` varchar(16) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `orang_tua` varchar(32) NOT NULL,
  `hp_ortu` int(32) NOT NULL,
  `jurusan` varchar(32) NOT NULL,
  `tanggal_pendaftaran` int(128) NOT NULL,
  `status_pendaftaran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`no_pendaftaran`, `nama`, `nisn`, `sekolah_asal`, `no_hp`, `email`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `orang_tua`, `hp_ortu`, `jurusan`, `tanggal_pendaftaran`, `status_pendaftaran`) VALUES
('PPDB2023444', 'andi ardianto', 12346543, 'SMP Negeri 21 Kota Tangerang', '087890098786', 'goandi743@gmail.com', 'Jl. Halim Perdana Kusuma no 30 Jurumudi Tangerang', 'Tangerang', '2007-10-16', 'L', 'Eli Jayusman', 2147483647, 'Teknik Bisnis Sepeda Motor', 1691029668, 'Diterima'),
('PPDB2023730', 'Chelsei Ayu', 1234567, 'SMP Negeri 30 Kota Tangerang', '089987765654', 'chelsiayu1238@gmail.com', 'Jl. Husein Sastra negara no 1 jurumdi', 'cirebon', '2007-06-05', 'L', 'Abdul Rohim', 2147483647, 'Teknik Komputer dan Jaringan', 1691029513, 'Menunggu Diverifikasi'),
('PPDB2023977', 'Wahyudi', 15161033, 'SMP N 30 KOTA TANGERANG', '08995847815', 'wahyudi140319@gmail.com', 'Jl. Halim Perdana Kusuma no 2', 'Cirebon', '2007-07-04', 'L', 'Wasneti', 2147483647, 'Teknik Komputer dan Jaringan', 1691110676, 'Menunggu Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_pendaftaran` varchar(16) NOT NULL,
  `tanggal_pembayaran` int(11) NOT NULL,
  `bukti_bayar` varchar(128) NOT NULL,
  `status_pembayaran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_pendaftaran`, `tanggal_pembayaran`, `bukti_bayar`, `status_pembayaran`) VALUES
(4, 'PPDB2023730', 1691030818, '5c4b93d2c105d7d07480fef2a918a38d.pdf', 'Lunas'),
(5, 'PPDB2023444', 1691055641, '97cc67c26105e3cb4e42d00bbabdbb1b.pdf', 'Lunas'),
(6, 'PPDB2023977', 1691110751, '098c03ca4e84faf9ec4bf9a3fb57a80e.pdf', 'Menunggu Verifikasi Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `is_active`, `role_id`) VALUES
(1, 'admin', 'ppdbsmkexcellent1@gmail.com', '$2y$10$R/v4.SCDh0N1LiWdkOMFseqcyrI1.810pTFcMvJzpJjXr7NASdkam', 1, 1),
(2, 'Wahyudi', 'dreamhunterian@gmail.com', '$2y$10$6NfMeujNxSfdGX8iokYsousAd.fgrtcXucLGDY72OuoNSXkQhwKJi', 1, 2),
(9, 'Taufik Hapidin', 'taufikhapidin2@gmail.com', '$2y$10$KAV863SV.EaJGRiHkrWBgOZmSCBKxni7p6aJPo3BLLgb5Qea6eA02', 0, 2),
(13, 'andi ardianto', 'goandi743@gmail.com', '$2y$10$rpTg3wXmNCRBjm8o9R2Hz.Gp9GuBzCiZP5vemQY5CIhOUN8AoGqbu', 1, 2),
(14, 'Chelsei Ayu', 'chelsiayu1238@gmail.com', '$2y$10$sGAEZkukEg2xnLrEYZ4Xo.7uargB08SngpCtudwZngqBVOplbmcVi', 1, 2),
(15, 'Wahyudi', 'wahyudi140319@gmail.com', '$2y$10$SRILMxugwvG5XQgMsEGmcuq6AupcNw0prnhv4Bql20lnRuulyMIBC', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'goandi743@gmail.com', 'no5ajFyRswQ3rTsXt54aI3inzmzPQVbBJavVDu9UykQ=', 1690295666),
(6, 'dreamhunterian@gmail.com', 'GhfA0DB1e+DFL25mLHUo4PST6Tjkljv26naNn16uCro=', 1690296492),
(7, 'dreamhunterian@gmail.com', 'L+T07H/JqrGWhpeC23iac5WNsZ1wJva9msv6NvMgvrs=', 1690298032),
(9, 'goandi743@gmail.com', '6JxotcSAWZ0R72S9xkNukXaWigThFFJqPbETas5GCxc=', 1691028279);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_siswa`
--
ALTER TABLE `berkas_siswa`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_siswa`
--
ALTER TABLE `berkas_siswa`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
