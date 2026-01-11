-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 17, 2025 at 03:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_instruktur`
--

CREATE TABLE `absensi_instruktur` (
  `id_absensi_instruktur` int NOT NULL,
  `id_instruktur` int NOT NULL,
  `id_materi` char(10) NOT NULL,
  `status_absensi_instruktur` enum('Hadir','Terlambat','Alpha') NOT NULL,
  `jumlah_absensi` int NOT NULL,
  `absensi_mulai` datetime DEFAULT NULL,
  `absensi_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absensi_instruktur`
--

INSERT INTO `absensi_instruktur` (`id_absensi_instruktur`, `id_instruktur`, `id_materi`, `status_absensi_instruktur`, `jumlah_absensi`, `absensi_mulai`, `absensi_selesai`) VALUES
(3, 2, 'JP101', 'Hadir', 1, '2025-04-10 07:00:00', '2025-04-10 11:00:00'),
(5, 1, 'JP-102', 'Hadir', 1, '2025-04-11 08:00:00', '2025-04-11 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_peserta`
--

CREATE TABLE `absensi_peserta` (
  `id_absensi` int NOT NULL,
  `id_peserta` int NOT NULL,
  `id_materi` char(10) NOT NULL,
  `status_absensi` enum('Hadir','Terlambat','Alpha') NOT NULL,
  `jumlah_absensi` int NOT NULL,
  `absensi_mulai` datetime DEFAULT NULL,
  `absensi_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absensi_peserta`
--

INSERT INTO `absensi_peserta` (`id_absensi`, `id_peserta`, `id_materi`, `status_absensi`, `jumlah_absensi`, `absensi_mulai`, `absensi_selesai`) VALUES
(1, 1, 'JP101', 'Hadir', 1, '2025-06-16 07:45:00', '2025-06-16 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `materi_lpk`
--

CREATE TABLE `materi_lpk` (
  `id_materi` char(10) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `akses_kelas` enum('Online','Tatap Muka','Hybrid') NOT NULL,
  `id_instruktur` int NOT NULL,
  `id_peserta` int NOT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `tipe_file` enum('PDF','Excel','PowerPoint','Word','Image','Video') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materi_lpk`
--

INSERT INTO `materi_lpk` (`id_materi`, `nama_materi`, `akses_kelas`, `id_instruktur`, `id_peserta`, `file_upload`, `tipe_file`) VALUES
('JP-102', 'Belajar tokutei ginou', 'Hybrid', 1, 11, 'files/1750070418_1 template.mp4', 'Video'),
('JP101', 'Bahasa Jepang Dasar', 'Tatap Muka', 2, 1, 'files/1749917999_DATA LPK NOBORI (2).pdf', 'PDF');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `id` char(15) NOT NULL,
  `id_peserta` int NOT NULL,
  `hafalan` int NOT NULL,
  `membaca` int NOT NULL,
  `mendengar` int NOT NULL,
  `total_nilai` int NOT NULL,
  `kategori` enum('Baik','Cukup','Kurang') NOT NULL,
  `tanggal_validasi_nilai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_ujian`
--

INSERT INTO `nilai_ujian` (`id`, `id_peserta`, `hafalan`, `membaca`, `mendengar`, `total_nilai`, `kategori`, `tanggal_validasi_nilai`) VALUES
('JP-BHS-001-U', 1, 30, 60, 20, 110, 'Cukup', '2025-04-09'),
('JP-BHS-002-U', 11, 60, 58, 54, 172, 'Baik', '2025-04-04'),
('JP-BHS-003-U', 1, 50, 60, 60, 170, 'Baik', '2025-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` char(10) NOT NULL,
  `id_peserta` int NOT NULL,
  `id_program` int NOT NULL,
  `biaya` decimal(10,2) NOT NULL DEFAULT '6700000.00',
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT 'Belum Lunas',
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_dibayar` decimal(10,2) NOT NULL DEFAULT '6700000.00',
  `sisa_pembayaran` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_peserta`, `id_program`, `biaya`, `status_pembayaran`, `tanggal_pembayaran`, `jumlah_dibayar`, `sisa_pembayaran`) VALUES
('PYN-001', 1, 8, '1500000.00', 'Belum Lunas', '2025-04-17', '100000.00', '1400000.00'),
('PYN-002', 11, 9, '2500000.00', 'Lunas', '2025-01-16', '2500000.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `program_pelatihan`
--

CREATE TABLE `program_pelatihan` (
  `id` int NOT NULL,
  `jenis_program` enum('Half Day','Intensif','Weekend','Online') NOT NULL,
  `deskripsi` text NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `biaya` varchar(20) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `program_pelatihan`
--

INSERT INTO `program_pelatihan` (`id`, `jenis_program`, `deskripsi`, `durasi`, `jadwal`, `biaya`, `lokasi`) VALUES
(6, 'Half Day', 'Kelas yang diadakan lima (5) sesi dalam satu minggu, berdurasi empat (4) jam setiap sesinya, setiap hari senin-jumat selama kurun waktu empat (4) bulan.', '4 bulan', 'Senin - Jumat, 4 jam setiap sesi', '6700000', 'LPK NOBORI'),
(7, 'Intensif', 'Kelas yang diadakan lima (5) sesi dalam satu minggu, berdurasi delapan (8) jam setiap sesinya, setiap hari senin-jumat selama kurun waktu empat (4) bulan.', '4 bulan', 'Senin - Jumat, 8 jam setiap sesi', '6700000', 'LPK NOBORI'),
(8, 'Weekend', 'Kelas yang diadakan setiap hari minggu, berdurasi delapan (8) jam, selama kurun waktu enam (6) bulan.', '6 bulan', 'Setiap Minggu, 8 jam', '1500000', 'LPK NOBORI'),
(9, 'Online', 'Kelas yang diadakan via zoom, untuk target N5 20x sesi, untuk target N4 45x sesi berdurasi 60-90 menit setiap sesinya.', 'Bervariasi (20x sesi untuk N5, 45x sesi untuk N4)', 'Via Zoom, 60-90 menit per sesi', '2500000', 'Online'),
(10, 'Online', 'Kelas yang diadakan via zoom, untuk target N4, 45x sesi berdurasi 60-90 menit setiap sesinya.', 'Bervariasi (45x sesi)', 'Via Zoom, 60-90 menit per sesi', '4500000', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruktur_lpk`
--

CREATE TABLE `tbl_instruktur_lpk` (
  `id_instruktur` int NOT NULL,
  `nama_instruktur` varchar(35) NOT NULL,
  `telepon` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kualifikasi` enum('N1','N2','N3','N4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_instruktur_lpk`
--

INSERT INTO `tbl_instruktur_lpk` (`id_instruktur`, `nama_instruktur`, `telepon`, `alamat`, `kualifikasi`) VALUES
(1, 'Rafly Fadly', '0813478426834', 'Bogor', 'N3'),
(2, 'Yuki San', '08762526727', 'Tokyo', 'N1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran_peserta`
--

CREATE TABLE `tbl_pendaftaran_peserta` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email_aktif` varchar(255) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_domisili` text NOT NULL,
  `nama_ayah_kandung` varchar(255) NOT NULL,
  `nama_ibu_kandung` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `pilihan_kelas` text NOT NULL,
  `mengetahui_lpk_dari` enum('Instagram','TikTok','Facebook','Kerabat/Teman','Walk in','Yang lain') NOT NULL,
  `sumber_lain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pendaftaran_peserta`
--

INSERT INTO `tbl_pendaftaran_peserta` (`id`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `email_aktif`, `alamat_ktp`, `alamat_domisili`, `nama_ayah_kandung`, `nama_ibu_kandung`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pilihan_kelas`, `mengetahui_lpk_dari`, `sumber_lain`) VALUES
(1, 'Zara putri', '2003-04-12', 'Perempuan', '081234567891', 'zaraputri@gmail.com', 'Jl. Merdeka No.7, Jakarta', 'Jl. Kemerdekaan No.3, Jakarta', 'Andi Putra', 'Siti Mariam', 'Pilot', 'Dosen', 'Kelas reguler pagi Senin - Jumat (08.00 - 12.00)', 'Instagram', ''),
(2, 'Raka Mahendra', '2002-06-22', 'Laki-laki', '089876543210', 'rakamahendra@gmail.com', 'Jl. Taman No.15, Bandung', 'Jl. Pemuda No.8, Bandung', 'Budi Mahendra', 'Dewi Mahendra', 'Wiraswasta', 'Guru Bahasa Inggris', 'Kelas Intensif Fullday Senin - Jumat (08.00 - 17.00)', 'TikTok', NULL),
(3, 'Alya Pramesti', '2001-11-01', 'Perempuan', '082134567890', 'alyapramesti@gmail.com', 'Jl. Jendral Sudirman No.10, Surabaya', 'Jl. Raya No.4, Surabaya', 'Anton Pramesti', 'Siti Pramesti', 'Artis', 'Ibu Rumah Tangga', 'Kelas Weekend Minggu (08.00 - 17.00)', 'Facebook', NULL),
(4, 'Gian Ferdiansyah', '2004-03-18', 'Laki-laki', '085712345678', 'gianferdiansyah@gmail.com', 'Jl. Raya Barat No.2, Yogyakarta', 'Jl. Timur No.9, Yogyakarta', 'Eko Ferdiansyah', 'Ratna Ferdiansyah', 'Programmer', 'Pegawai Negeri', 'Kelas Weekend Sabtu - Minggu (4 jam pertemuan)', 'Walk in', NULL),
(5, 'Mira Safira', '2000-09-10', 'Perempuan', '087654321234', 'mirasafira@gmail.com', 'Jl. Alam Indah No.11, Bali', 'Jl. Pahlawan No.7, Bali', 'Yanto Safira', 'Tuti Safira', 'Manager', 'Wirausaha', 'Kelas Online', 'Kerabat/Teman', NULL),
(9, 'fia', '2001-05-08', 'Perempuan', '08136482927', 'fia@gmail.com', 'Bekasi', 'Bekasi', 'Fadil', 'Zulaiha', 'Direktur', 'Guru Ngaji', 'Kelas Intensif Fullday Senin - Jumat (08.00 - 17.00)', 'Walk in', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta_lpk`
--

CREATE TABLE `tbl_peserta_lpk` (
  `id_peserta` int NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `telepon` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `program` enum('Intensif','Half Day','Weekend','Online') NOT NULL,
  `id_instruktur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_peserta_lpk`
--

INSERT INTO `tbl_peserta_lpk` (`id_peserta`, `nama_peserta`, `telepon`, `alamat`, `program`, `id_instruktur`) VALUES
(1, 'Linda Nuraini ', '0895389726799', 'Bekasi', 'Weekend', 1),
(11, 'Hafiz', '085628283894', 'Bandung', 'Online', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('Administrator') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Rafli Ghozali Al Faina', 'administrator', '123', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_instruktur`
--
ALTER TABLE `absensi_instruktur`
  ADD PRIMARY KEY (`id_absensi_instruktur`),
  ADD KEY `id_instruktur` (`id_instruktur`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `absensi_peserta`
--
ALTER TABLE `absensi_peserta`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `materi_lpk`
--
ALTER TABLE `materi_lpk`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_instruktur` (`id_instruktur`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_peserta` (`id_peserta`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peserta` (`id_peserta`),
  ADD KEY `fk_program` (`id_program`);

--
-- Indexes for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instruktur_lpk`
--
ALTER TABLE `tbl_instruktur_lpk`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `tbl_pendaftaran_peserta`
--
ALTER TABLE `tbl_pendaftaran_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peserta_lpk`
--
ALTER TABLE `tbl_peserta_lpk`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `fk_instruktur` (`id_instruktur`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_instruktur`
--
ALTER TABLE `absensi_instruktur`
  MODIFY `id_absensi_instruktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `absensi_peserta`
--
ALTER TABLE `absensi_peserta`
  MODIFY `id_absensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_instruktur_lpk`
--
ALTER TABLE `tbl_instruktur_lpk`
  MODIFY `id_instruktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran_peserta`
--
ALTER TABLE `tbl_pendaftaran_peserta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_peserta_lpk`
--
ALTER TABLE `tbl_peserta_lpk`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_instruktur`
--
ALTER TABLE `absensi_instruktur`
  ADD CONSTRAINT `absensi_instruktur_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `tbl_instruktur_lpk` (`id_instruktur`),
  ADD CONSTRAINT `absensi_instruktur_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `materi_lpk` (`id_materi`);

--
-- Constraints for table `absensi_peserta`
--
ALTER TABLE `absensi_peserta`
  ADD CONSTRAINT `absensi_peserta_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tbl_peserta_lpk` (`id_peserta`),
  ADD CONSTRAINT `absensi_peserta_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `materi_lpk` (`id_materi`);

--
-- Constraints for table `materi_lpk`
--
ALTER TABLE `materi_lpk`
  ADD CONSTRAINT `materi_lpk_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `tbl_instruktur_lpk` (`id_instruktur`),
  ADD CONSTRAINT `materi_lpk_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `tbl_peserta_lpk` (`id_peserta`);

--
-- Constraints for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD CONSTRAINT `fk_id_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `tbl_peserta_lpk` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `tbl_peserta_lpk` (`id_peserta`),
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`id_program`) REFERENCES `program_pelatihan` (`id`);

--
-- Constraints for table `tbl_peserta_lpk`
--
ALTER TABLE `tbl_peserta_lpk`
  ADD CONSTRAINT `fk_instruktur` FOREIGN KEY (`id_instruktur`) REFERENCES `tbl_instruktur_lpk` (`id_instruktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
