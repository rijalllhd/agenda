-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 02:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kodeAdmin` int(3) NOT NULL,
  `noTelp` varchar(13) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kodeAdmin`, `noTelp`, `password`) VALUES
(1, '08985500689', 'rijal123'),
(2, '0888', '123'),
(3, '000', '000');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kodeGuru` int(3) NOT NULL,
  `inisialGuru` varchar(5) NOT NULL,
  `namaGuru` varchar(60) NOT NULL,
  `kodeMapel` int(3) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fotoGuru` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kodeGuru`, `inisialGuru`, `namaGuru`, `kodeMapel`, `jenisKelamin`, `noTelp`, `password`, `fotoGuru`) VALUES
(19, 'HW', 'Hermi Wahyuningsih,M.Pd.', 1, 'Perempuan', '0890', '125', '63856b26ab08c.jpeg'),
(38, 'EW', 'Enung Wahyuni,S.Ag.,M.Pd.', 3, 'Perempuan', '021', '123', '638569f71bc71.jpeg'),
(42, 'YD', 'Yani Handayani,S.E.,M.Pd.', 4, 'Perempuan', '000', '000', '63856a47ab71e.jpeg'),
(48, 'MN', 'Minarni,S.Pd.', 19, 'Perempuan', '0', '', '63856a54750da.jpeg'),
(61, 'SL', 'Sulaeman, S.Pd.', 5, 'Laki-Laki', '0', '', '63856a616117d.jpeg'),
(71, 'HI', 'Hartanto Iskandar, S.S.', 6, 'Laki-Laki', '0', '', '63856c805d31e.jpeg'),
(72, 'HS', 'Hermansyah, S.Kom.', 7, 'Laki-Laki', '222', '222', '63856a81a0895.jpeg'),
(74, 'YR', 'Yesi Ryani, S.Pd.', 8, 'Perempuan', '0', '', '63856a9001cb2.jpeg'),
(76, 'DT', 'Dian Tiara, S.Kom.', 9, 'Perempuan', '022', '999', '63856a9ff410b.jpeg'),
(77, 'DT', 'Dian Tiara, S.Kom.', 10, 'Perempuan', '0', '', '63856aadc1409.jpeg'),
(88, 'FE', 'Faisal El Saudi,S.Pd.,M.Si.', 11, 'Laki-Laki', '0', '', '63856ab94c7ca.jpeg'),
(90, 'DP', 'Doni Putra Setiawan, S.Kom', 12, 'Laki-Laki', '089629767712', 'doni123', '63856ac7d3732.jpeg'),
(94, 'HH', 'Heri Hermawan, S.Kom', 2, 'Laki-Laki', '111', '111', '63856ad5bfefd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpelajaran`
--

CREATE TABLE `jadwalpelajaran` (
  `kodeJadwal` int(3) NOT NULL,
  `kodeAdmin` int(3) NOT NULL,
  `kodeJam` int(2) NOT NULL,
  `kodeKelas` int(3) NOT NULL,
  `kodeMapel` int(3) NOT NULL,
  `kodeGuru` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jampelajaran`
--

CREATE TABLE `jampelajaran` (
  `kodeJam` int(2) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jampelajaran`
--

INSERT INTO `jampelajaran` (`kodeJam`, `jam`) VALUES
(1, '07:00:00'),
(2, '07:30:03'),
(3, '08:10:24'),
(4, '08:50:24'),
(5, '09:30:11'),
(6, '09:50:02'),
(7, '10:30:02'),
(8, '11:10:53'),
(9, '11:50:53'),
(10, '12:40:00'),
(11, '13:20:53'),
(12, '14:00:53'),
(13, '14:40:00'),
(14, '15:20:00'),
(15, '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kodeKelas` int(3) NOT NULL,
  `namaKelas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kodeKelas`, `namaKelas`) VALUES
(1, 'XI RPL 1'),
(2, 'XI RPL 2'),
(10, 'XI RPL 8'),
(11, 'XI E 2'),
(14, 'x33');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `kodeLogin` int(3) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `password` varchar(60) NOT NULL,
  `kodeAdmin` int(3) NOT NULL,
  `kodeGuru` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kodeMapel` int(3) NOT NULL,
  `inisialMapel` varchar(5) NOT NULL,
  `namaMapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kodeMapel`, `inisialMapel`, `namaMapel`) VALUES
(1, 'MTK', 'Matematika'),
(2, 'PBO', 'Pemrograman Berorientasi Objek'),
(3, 'PAI', 'Pendidikan Agama Islam'),
(4, 'PPKN', 'Pendidikan Pancasila dan Kewarganegaraan'),
(5, 'PJOK', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
(6, 'JEP', 'Jepang'),
(7, 'PPL', 'Perancangan Perangkat Lunak'),
(8, 'IND', 'Bahasa Indonesia'),
(9, 'BD', 'Basis Data'),
(10, 'PKK', 'Produk Kreatif dan Kewirausahaan'),
(11, 'ING', 'Bahasa Inggris'),
(12, 'PWPB', 'Pemrograman WEB dan Pemrograman Bergerak'),
(19, 'BK', 'Bimbingan Konseling');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `kodeRekap` int(3) NOT NULL,
  `kodeKelas` int(3) NOT NULL,
  `kodeGuru` int(3) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `kodeMapel` int(3) NOT NULL,
  `kodeJam` int(3) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `detailMateri` varchar(255) NOT NULL,
  `bukti` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`kodeRekap`, `kodeKelas`, `kodeGuru`, `tanggal`, `kodeMapel`, `kodeJam`, `materi`, `detailMateri`, `bukti`) VALUES
(50, 2, 72, '2022-12-13', 7, 1, 'vhbmhgfhjgfhj', 'uyruyryru', '63982308c73a8.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kodeSiswa` int(3) NOT NULL,
  `namaSiswa` varchar(60) NOT NULL,
  `nis` int(9) NOT NULL,
  `kodeKelas` int(3) NOT NULL,
  `ttl` varchar(60) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  `golDarah` varchar(2) NOT NULL,
  `asalSekolah` varchar(60) NOT NULL,
  `noIjazah` varchar(60) NOT NULL,
  `tb` int(3) NOT NULL,
  `bb` int(3) NOT NULL,
  `namaAyah` varchar(60) NOT NULL,
  `namaIbu` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kodeSiswa`, `namaSiswa`, `nis`, `kodeKelas`, `ttl`, `agama`, `alamat`, `jenisKelamin`, `foto`, `golDarah`, `asalSekolah`, `noIjazah`, `tb`, `bb`, `namaAyah`, `namaIbu`) VALUES
(1, 'ADHITYA AGUS PRASETYO', 212210395, 2, '2022-11-08', 'Islam', 'pardek', 'Laki-Laki', '', 'z', 'smp yyy', '1233123', 170, 47, 'Andi Imam Rosadi', 'Umi Nur Hidayah'),
(2, 'ADITYA', 212210396, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(3, 'AKHFA KAREL ZACKY MAHESA', 212210397, 2, '', '', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(4, 'ARIANTO IMANUEL RESI MILLA BULU', 212210398, 2, '', 'Protestan', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(5, 'CARTIKA DWI RAMADANIA', 212210399, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(6, 'CINDY FADILLA KINANTY', 212210400, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(7, 'DAFFA ABYAN DARMADI', 212210401, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(8, 'FAJAR MAULANA NUGROHO SUTARDI', 212210402, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(9, 'FARISH AUGIE YUKEZA', 212210403, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(10, 'FAUZIA CAMELIA', 212210404, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(11, 'FITRIANA OKTAVIA RAMDANI', 212210405, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(12, 'GIOFANY FAUZIANO', 212210406, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(13, 'IKA NUR AINI', 212210407, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(14, 'JUBAIR KEANU RADITYA', 212210408, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(15, 'LAURA ANASSYAQHILA', 212210409, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(16, 'LESTYANA MULYANA', 212210410, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(17, 'LILIS MARDIANI', 212210411, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(18, 'MAWAR FITRI RAMADHANI', 212210412, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(19, 'MUHAMAD AJI SAPUTRA', 212210413, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(20, 'MUHAMAD FAIZAL FIKRI', 212210414, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(21, 'MUHAMMAD FIKRI RAMADHANI', 212210415, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(22, 'MUHAMMAD SOLEH', 212210416, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(23, 'NABILLA PERMATA SARI', 212210417, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(24, 'NADIA SALMA S.', 212210418, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(25, 'NAFKHA FAUZIAH', 212210419, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(26, 'NAJLA SALSABILA PUTRI PATIARY', 212210420, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(27, 'RICHARDO TANGGU SOLO', 212210421, 2, '', 'Khatolik', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(28, 'RISKA LIA AMALIAH SIAGIAN', 212210422, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(29, 'RIVA', 212210423, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(30, 'RIZAL HADI MUSTHOFANI', 212210424, 2, '', 'Islam', '', 'Laki-Laki', '6386ba1a63f67.jpg', '', '', '', 0, 0, '', ''),
(31, 'SITI NUR AZIZAH JAMIL', 212210425, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(32, 'VALENTIN NEZA PEBRIANA PUTRI', 212210426, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(33, 'WAHYU AMIRULLOH', 212210427, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(34, 'YASKUR FAUZAN AKBAR', 212210428, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(35, 'YUWANDRI ALFARIZI', 212210429, 2, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(36, 'ZASKIA', 212210430, 2, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(37, 'ADINDA DESTRIANA SUPRIADY', 212210359, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(38, 'AHMAD BADAWI AL HARQONI', 212210360, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(39, 'AHMAD FAUZAN', 212210361, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(40, 'AKILA KURNIA FAUZAN', 212210362, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(41, 'ALIFA RAFIDHIA IMTIHANAH', 212210363, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(42, 'APRIL LIA CAHYANI', 212210364, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(43, 'ATIYA RAMADANI', 212210365, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(44, 'BEKTI NAZWA PUTRA NASUTION', 212210366, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(45, 'CINDY AURA LAMBERTINA', 212210367, 1, '', 'Khatolik', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(46, 'DAEVINA KAIELA SIHAB', 212210368, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(47, 'DEA OLIVIA', 212210369, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(48, 'DELA SAGITA', 212210370, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(49, 'FAHRUR ROZZY AL FATIH', 212210371, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(50, 'FAUZAN FIRZATULLAH ALAWI', 212210372, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(51, 'HAFID YAZID NASUTION', 212210373, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(52, 'HAMMAM ALFARIZI YAHYA', 212210374, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(53, 'IMAS SURYANI', 212210375, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(54, 'MAULANA ARIF', 212210376, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(55, 'MUHAMAD AKMAL JANNATAN', 212210377, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(56, 'MUHAMAD IRFAN RAMADHAN', 212210378, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(57, 'MUHAMAD RAFLI ARDANA', 212210379, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(58, 'MUHAMMAD EVANO YUZUAR', 212210380, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(59, 'MUHAMMAD REZA HAFIZZI', 212210381, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(60, 'MUHAMMAD RIDHO PRATAMA NURHUDA', 212210382, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(61, 'NAUFAL MUSYAFFA KHAIRAN', 212210383, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(62, 'NOVIA SABBILA', 212210384, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(63, 'NURMAHARANI MULYA', 212210385, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(64, 'RAYHAN YUDHA RAMADHAN', 212210386, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(65, 'REGI RAMADHANI', 212210387, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(66, 'ROMY EKA SETYADI', 212210388, 1, '', 'Islam', '', 'Laki-Laki', '', '', '', '', 0, 0, '', ''),
(67, 'SITI NUR AISYAH JAMIL', 212210389, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(68, 'SYADITIA KIRANI PAPUTUNGAN', 212210390, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(69, 'SYAKILLA AIRUL NOUVIT', 212210391, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(70, 'ZALFA FITRIYAH ADELIA', 212210392, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(71, 'ZASKIA CAHYANINGTYAS', 212210393, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', ''),
(72, 'ZAVIRA SEPTIADI', 212210394, 1, '', 'Islam', '', 'Perempuan', '', '', '', '', 0, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kodeAdmin`),
  ADD UNIQUE KEY `noTelp` (`noTelp`),
  ADD KEY `noTelp_2` (`noTelp`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kodeGuru`),
  ADD KEY `kodeMapel` (`kodeMapel`);

--
-- Indexes for table `jadwalpelajaran`
--
ALTER TABLE `jadwalpelajaran`
  ADD PRIMARY KEY (`kodeJadwal`),
  ADD KEY `kodeJam` (`kodeJam`),
  ADD KEY `kodeKelas` (`kodeKelas`,`kodeMapel`,`kodeGuru`),
  ADD KEY `kodeAdmin` (`kodeAdmin`),
  ADD KEY `kodeMapel` (`kodeMapel`),
  ADD KEY `kodeGuru` (`kodeGuru`);

--
-- Indexes for table `jampelajaran`
--
ALTER TABLE `jampelajaran`
  ADD PRIMARY KEY (`kodeJam`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kodeKelas`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kodeLogin`),
  ADD KEY `noTelp` (`noTelp`),
  ADD KEY `kodeAdmin` (`kodeAdmin`),
  ADD KEY `kodeGuru` (`kodeGuru`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kodeMapel`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`kodeRekap`),
  ADD UNIQUE KEY `kodeKelas_2` (`kodeKelas`),
  ADD UNIQUE KEY `kodeGuru_2` (`kodeGuru`),
  ADD UNIQUE KEY `kodeMapel_2` (`kodeMapel`),
  ADD UNIQUE KEY `kodeJam_2` (`kodeJam`),
  ADD KEY `kodeKelas` (`kodeKelas`),
  ADD KEY `kodeGuru` (`kodeGuru`),
  ADD KEY `kodeMapel` (`kodeMapel`),
  ADD KEY `kodeJam` (`kodeJam`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kodeSiswa`),
  ADD KEY `namaSiswa` (`namaSiswa`),
  ADD KEY `kelas` (`kodeKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kodeAdmin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `kodeGuru` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `jadwalpelajaran`
--
ALTER TABLE `jadwalpelajaran`
  MODIFY `kodeJadwal` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jampelajaran`
--
ALTER TABLE `jampelajaran`
  MODIFY `kodeJam` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kodeKelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `kodeLogin` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `kodeMapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `kodeRekap` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `kodeSiswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwalpelajaran`
--
ALTER TABLE `jadwalpelajaran`
  ADD CONSTRAINT `jadwalpelajaran_ibfk_2` FOREIGN KEY (`kodeJam`) REFERENCES `jampelajaran` (`kodeJam`),
  ADD CONSTRAINT `jadwalpelajaran_ibfk_6` FOREIGN KEY (`kodeKelas`) REFERENCES `kelas` (`kodeKelas`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`kodeAdmin`) REFERENCES `admin` (`kodeAdmin`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kodeMapel`) REFERENCES `guru` (`kodeMapel`);

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_ibfk_1` FOREIGN KEY (`kodeGuru`) REFERENCES `guru` (`kodeGuru`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kodeKelas`) REFERENCES `kelas` (`kodeKelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
