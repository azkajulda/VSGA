-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 11:38 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE `t_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`id`, `judul`, `deskripsi`) VALUES
(1, 'Banjir', 'Keadaan warga sangat memprihatinkan'),
(2, 'Seorang Mahasiswa Tewas Karena Putus Cinta', 'Mahasiswa Berinitial S bunuh diri karena dicampakan pacarnya di depan umum');

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`id`, `nim`, `nama`, `kelas`, `jk`, `fakultas`, `foto`) VALUES
(1, '1202164201', 'Asep Sutanda as', 'SI-40-03', 'Laki-laki', 'Fakultas Rekayasa Industri', 'uploads/Foto_Formal_Sudharmono - Copy - Copy.jpg'),
(2, '1202164202', 'Mohamad Azka Julda Suparman', 'SI-40-03', 'Laki-laki', 'Fakultas Rekayasa Industri', 'uploads/DSC1196.jpg'),
(3, '1202164203', 'Hanoka kosaki', 'SI-40-02', 'Perempuan', 'Fakultas Ilmu Terapan', 'uploads/Kemeja-Formal-Wanita-Untuk-Acara-Resmi-dan-Kerja-300x300 - Copy.png'),
(4, '1202164204', 'Dade Stepen', 'SI-40-02', 'Laki-laki', 'Fakultas Ekonomi Bisnis', 'uploads/387399-1983245.jpg'),
(28, '1202164205', 'Azuka Shimada', 'SI-40-01', 'Laki-laki', 'Fakultas Rekayasa Industri', 'uploads/Formal-Pant-Suits-for-Women-Business-Suits-Formal-Office-Suits-Work-Black-Blazer-Ladies-Office-Uniform - Copy.webp'),
(49, '120212837', 'Mohamad Faiz S', 'Ada Aja', 'Laki-laki', 'Fakultas Rekayasa Industri', 'uploads/Foto_Formal_Sudharmono - Copy - Copy.jpg'),
(51, '1202163231', 'Kuru Rin', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(52, '1202163231', 'Chino Khufahu', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(53, '1202163232', 'Nozomi', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(54, '1202163233', 'Chiotoge', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(55, '1202163231', 'Kuru Rin', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(56, '1202163231', 'Chino Khufahu', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(57, '1202163232', 'Nozomi', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', ''),
(58, '1202163233', 'Chiotoge', 'INT', 'Perempuan', 'Fakultas Rekayasa Industri', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
