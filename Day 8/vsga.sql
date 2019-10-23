-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 02:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
(1, 'Sport'),
(2, 'Kuliner');

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
(1, '2019-10-09', 'Eskalasi Kopi Garut di Mata Milenial', 'Garut bukan hanya terkenal dengan kuliner dodolnya. Kota yang terkenal dengan julukan \"Swiss Van Java\" ini juga mempunyai kuliner khas yang mendunia. Kopi garut adalah kuliner kekinian yang patut dibanggakan. Pasalnya, cita rasa kopi Garut sudah tercium ke seantero negeri  bahkan mancanegara.\r\n\r\nBagi yang bukan pecinta kopi mungkin sedikit terdengar asing karena kuliner kopi Garut bisa meretas jalan menuju pentas dunia. Fakta ini tidak bisa disangkal karena nyatanya kopi Garut bisa membawa perubahan pada perekonomian petani kopi di Garut. Apalagi kopi semakin digandrungi oleh generasi milenial.\r\n\r\nPerlu kiranya penulis sampaikan beberapa hal terkait kopi Garut. Bagaimana sejarah kopi Garut, karakter lingkungan Garut, keistimewaan kopi Garut, dan torehan prestasi kopi Garut yang berhasil diraih pada beberapa ajang kompetisi.', 'uploads/cofee.jpg', '#milenials #Coffee', 2),
(2, '2019-10-08', 'Menemani Malam Yogyakarta dengan Kopi Joss', 'Di persimpangan langkahku terhenti\r\nRamai kaki lima\r\nMenjajakan sajian khas berselera\r\nOrang duduk bersila \r\n\r\nAlunan lagu Yogyakarta dari KLA-Project membuat suasana malam di Yogyakarta menjadi begittu berkesan. Lebih-lebih ketika melihat banyak kaki lima yang menyajikan banyak tawaran kuliner yang bervariasi. \r\n\r\nSejenak aku berhenti, memilih salah satu kaki lima untuk bisa sejenak duduk  dan menikmati keramaian jalan-jalan di Yogyakarta di malam hari. Paduan antara kuliner dan suasana malam yang sangat sulit untuk diungkapkan.', 'uploads/cofee2.jpg', '#Coffee', 2),
(3, '2019-10-09', 'Juara, Cara Ucok/Melati Meminta Maaf', 'Akhirnya Praveen Jordan/Melati Daeva Oktavianti berhasil meraih gelar juara juga sekaligus pecah telur melawan mimpi buruk mereka selama ini, Wang Yilyu/Huang Dongping dari Tiongkok. Sekali juara langsung di Super 750 pula, Denmark Open!\r\n\r\nSebelum berangkat ke tur Eropa mereka dihadapkan pada persoalan yang cukup pelik, nyaris dijatuhi sanksi karena keluyuran dan kabur dari asrama tanpa sepengetahuan pelatih kepala ganda campuran, Richard Mainaky. Belum selesai masalah itu, Ucok (panggilan akrab Praveen) lagi-lagi berulah mangkir dari latihan dengan alasan mengantarkan ibunya ke Bandara. Pelatih sangat murka dengan kelakuannya.\r\n\r\nUcok sendiri dikenal sebagai pemain yang bengal namun punya smash super dahsyat. Prestasinya juga tidak terlalu menonjol. Capaian terbaiknya adalah menjadi juara All England 2016 bersama Debby Susanto. Mereka digandang-gadang sebagai pengganti dan pelapis peraih emas Olimpiade 2016, Tantowi Ahmad/Liliyana Natsir yang sudah mulai tergerus umur.', 'uploads/ucok.jpeg', '#badminton #olahraga', 1);

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
('azkajulda@gmail.com', 'Mohamad Azka J S', 'c9e648b9ba7718f64c4a9c2a8e9fc2b4', 'uploads/azkajulda.jpg', '081320341332');

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
