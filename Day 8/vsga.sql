-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 11:32 AM
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
(1, 'Sport '),
(2, 'Kuliner'),
(6, 'Berita'),
(9, 'Technologi'),
(10, 'Ekonomi'),
(11, 'Pemerintahan');

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

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_post`, `email`, `content`) VALUES
(1, 1, 'azkajulda@gmail.com', 'Kopi teman baik selagi TA'),
(2, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(3, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(4, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(5, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(6, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(7, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(8, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(9, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd'),
(10, 2, 'azkajulda@gmail.com', 'asdjkkaldjlasjdlaskdjalsd');

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
(1, '2019-10-09', 'Eskalasi Kopi Garut di Mata Milenial', 'Garut bukan hanya terkenal dengan kuliner dodolnya. Kota yang terkenal dengan julukan \"Swiss Van Java\" ini juga mempunyai kuliner khas yang mendunia. Kopi garut adalah kuliner kekinian yang patut dibanggakan. Pasalnya, cita rasa kopi Garut sudah tercium ke seantero negeri  bahkan mancanegara.\r\n\r\nBagi yang bukan pecinta kopi mungkin sedikit terdengar asing karena kuliner kopi Garut bisa meretas jalan menuju pentas dunia. Fakta ini tidak bisa disangkal karena nyatanya kopi Garut bisa membawa perubahan pada perekonomian petani kopi di Garut. Apalagi kopi semakin digandrungi oleh generasi milenial.\r\n\r\nPerlu kiranya penulis sampaikan beberapa hal terkait kopi Garut. Bagaimana sejarah kopi Garut, karakter lingkungan Garut, keistimewaan kopi Garut, dan torehan prestasi kopi Garut yang berhasil diraih pada beberapa ajang kompetisi.', '../../../assets/uploads/cofee.jpg', '#milenials #Coffee', 2),
(2, '2019-10-08', 'Menemani Malam Yogyakarta dengan Kopi Joss', 'Di persimpangan langkahku terhenti\r\nRamai kaki lima\r\nMenjajakan sajian khas berselera\r\nOrang duduk bersila \r\n\r\nAlunan lagu Yogyakarta dari KLA-Project membuat suasana malam di Yogyakarta menjadi begittu berkesan. Lebih-lebih ketika melihat banyak kaki lima yang menyajikan banyak tawaran kuliner yang bervariasi. \r\n\r\nSejenak aku berhenti, memilih salah satu kaki lima untuk bisa sejenak duduk  dan menikmati keramaian jalan-jalan di Yogyakarta di malam hari. Paduan antara kuliner dan suasana malam yang sangat sulit untuk diungkapkan.', '../../../assets/uploads/cofee2.jpg', '#Coffee', 2),
(13, '2019-10-05', 'Ucok Menang Di piala dunia', 'Hal senada juga diungkapkan Ongen. \"Kalau ada kesempatan menang KO, pasti saya lakukan,\" kata Ongen. Sebelumnya, Daud dan Ongen sudah berlatih selama tiga pekan di Bali. Keduanya berada di bawah asuhan pelatih Pino Bahari. \"Kami ingin petinju Indonesia bisa diperhitungkan kembali di dunia internasional,\" ujarnya. \"Kami mohon doa restu dari seluruh masyarakat Indonesia untuk perjuangan kami nanti,\" pungkas Daud Yordan.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Belum Ada Target KO dari Dua Petinju Indonesia Ini\", https://bola.kompas.com/read/2019/10/22/20390608/belum-ada-target-ko-dari-dua-petinju-indonesia-ini.\r\nPenulis : Josephus Primus\r\nEditor : Josephus Primus', '../../../assets/uploads/ucok.jpeg', '#Sport', 1),
(17, '2019-10-05', 'asdads', 'asdasd', '../../../assets/uploads/ryan - Copy.jpg', '#asdasd', 6),
(18, '2019-10-23', 'mentri Baru Pak Jokowi 1', 'sadaklsjdasjdalsdjalsdjalksjdklasjdlasjdlasjdlasjdlasjdalsjdlasjd', '../../../assets/uploads/ucok.jpeg', '#Goverment', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_statis`
--

CREATE TABLE `tb_statis` (
  `id_statis` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_statis`
--

INSERT INTO `tb_statis` (`id_statis`, `title`, `content`) VALUES
(1, 'About Me', 'Aku adalah anak ke 1 dari 3 bersaudara'),
(3, 'Pengalaman Kerja', 'Intern  In PT BIO Farama');

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
('azkajulda@gmail.com', 'Mohamad Azka J S', 'c9e648b9ba7718f64c4a9c2a8e9fc2b4', '../../../assets/uploads/azkajulda.jpg', '081320341332');

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
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_statis`
--
ALTER TABLE `tb_statis`
  MODIFY `id_statis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
