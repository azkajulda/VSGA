-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 11:24 AM
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
-- Database: `vsga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `name`) VALUES
(1, 'Kuliner'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_post` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int(5) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `id_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `date`, `title`, `content`, `gambar`, `tag`, `id_kategori`) VALUES
(1, '2019-10-10', 'AFF Futsal Championship 2019, Ayo Timnas Jungkalkan Vietnam!', 'Tak seperti Timnas Senior yang loyo di Kualifikasi Piala Dunia 2020 dan para pengurusnya mendapat jatah menjadi voters yang berlimpah, kendati Futsal hanya mendapat jatah 1 voters sesuai statuta PSSI dan layaknya anak tiri di PSSI, namun Timnas Futsal Indonesia dapat membungkam Malaysia. \r\n\r\nDalam laga perdananya pada Senin (21/10) melawan rivalnya Malaysia di fase grup AFF Futsal Championship  2019 di Phu Tho Indoor Stadium, Ho Chi Min City, Vietnam, dengan mengandalkan permainan cepat dan agresif, skuat asuhan Kensuke Takahashi mampu melewati awal momen krusial dengan baik dan menggulung Malaysia 3-2. ', 'uploads/timnas.jpg', '#timnas', 2),
(2, '2019-10-22', 'Old Trafford Masih Angker, Lallana Cetak Gol Setelah 2,5 Tahun', 'Sebelum bentrok, Liverpool lebih difavoritkan mengalahkan Manchester United pada bigmatch pekan ke 9 Liga Inggris, Minggu (20/10/2019).\r\n\r\nIni dikarenakan, pasukan Ole Gunnar Solskjaer itu sedang pincang, penampilan MU sedang melorot tajam di klasemen. Alasan lainnya adalah gelandang Paul Pogba dan kiper David de Gea sedang cedera.\r\n\r\nAkan tetapi, sang manajer Liverpool, Juergen Klopp justru menganggap asumsi-asumsi tersebut dinilai akan membebani.\r\n\r\nApakah sikap tidak mau meremehkan MU itu cuma sekedar lip service saja bagi Klopp, tapi sebenarnya Klopp lega dan tersenyum dalam hati?', 'uploads/OldTrafford.jpg', '#sepakbola', 2),
(3, '2019-10-15', 'Kenali 5 Jenis Kuah Ramen Asal Negeri Sakura. Ada yang Asin, Manis, atau Gurih, Lengkap!', 'Kalau kamu adalah penggemar masakan Jepang, pasti sudah nggak asing lagi dengan ramen. Yup, makanan berkuah ini umumnya berisikan mi, sayuran, potongan daging, dan telur yang disiram dengan kaldu yang gurih. Tapi, tahukah kamu, selain gurih, ramen juga memiliki beberapa jenis kuah dengan rasa yang berbeda?\r\n\r\nBiar pegetahuanmu tentang ramen lebih kaya, Hipwee Tips akan membagikan ulasan mengenai macam-macam jenis kuah ramen. Semoga bisa jadi panduanmu saat berkuliner nanti, ya!', 'uploads/ramen.jpg', '#jepang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_statis`
--

CREATE TABLE `tb_statis` (
  `id_statis` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`email`, `nama`, `password`, `foto`, `tlp`) VALUES
('azkajulda@gmail.com', 'azkajulda', 'b748093902c9bc1ba4c83fc76e7f48ee', 'uploads/azkajulda.jpg', '081320341332');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_statis`
--
ALTER TABLE `tb_statis`
  ADD PRIMARY KEY (`id_statis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_statis`
--
ALTER TABLE `tb_statis`
  MODIFY `id_statis` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
