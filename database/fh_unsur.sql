-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 12:31 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fh_unsur`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(5) unsigned zerofill NOT NULL,
  `from` char(20) DEFAULT NULL,
  `room` char(20) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `sent` datetime DEFAULT CURRENT_TIMESTAMP,
  `tahun_ajaran` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `room`, `pesan`, `sent`, `tahun_ajaran`) VALUES
(00003, '430633009', '7420116043', 'hei', '2017-09-09 13:23:30', 20171),
(00004, '7420116043', '7420116043', 'Hai...', '2017-09-09 14:12:16', 20171),
(00005, '430633009', '7420116043', 'Helloo...', '2017-09-09 14:31:46', 20171),
(00006, '7420116043', '7420116043', 'sdsvs', '2017-09-09 15:04:31', 20171),
(00007, '7420116043', '7420116043', 'bjbibivdxcfgvbhn', '2017-09-09 15:09:41', 20171),
(00035, 'Akademik', '7420116043', 'Test...', '2017-09-09 20:14:37', 20171),
(00036, '7420116044', '7420116044', 'sudah?', '2017-09-09 20:19:22', 20171),
(00037, '7420116044', '7420116044', 'sudah belum?', '2017-09-11 11:41:58', 20171),
(00038, '430633009', '7420116044', 'okey', '2017-09-19 14:19:19', 20171),
(00039, '430633009', '7420116043', 'sudah divalidasi', '2017-09-19 14:39:44', 20171),
(00040, NULL, '7420116043', 'sudah divalidasi', '2017-09-24 22:59:32', 20171),
(00041, '7420116042', '7420116042', 'sudah bisa disetujui?', '2017-10-09 18:01:00', 20171),
(00042, '430633009', '7420116042', 'okay', '2017-10-09 18:02:46', 20171);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nidn` char(10) NOT NULL,
  `nik` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar_depan` char(20) NOT NULL,
  `gelar_belakang` char(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` char(20) NOT NULL,
  `jabatan_fungsional` varchar(25) NOT NULL,
  `golongan` char(10) NOT NULL,
  `jabatan_struktural` varchar(50) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nik`, `nama`, `gelar_depan`, `gelar_belakang`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `jabatan_fungsional`, `golongan`, `jabatan_struktural`, `no_hp`, `email`, `image`) VALUES
('0002085602', '0002085602', 'Ahmad Hunaeni Zulkarnaen', 'Dr.', 'S.H., M.H.', 'L', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0009016901', '0009016901', 'Anita Kamilah', 'Dr.', 'S.H., M.H.', 'P', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0028036202', '0028036202', 'Henny Nuraeny', 'Dr. Hj.', 'S.H., M.H.', 'P', '0000-00-00', '', 'Lektor', 'III/d', '---', '', '', ''),
('0402036302', '0402036302', 'Kuswandi', 'Dr.', 'S.H., M.H.', 'L', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0402077104', '0402077104', 'Saptaning Ruju Paminto', '', 'S.P., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0403066001', '0403066001', 'Cecep Wiharma', 'H.', 'S.H., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0405078101', '0405078101', 'Hesti Dwi Astuti', '', 'S.H., M.H.', 'P', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0407105901', '0407105901', 'Dwidja Priyatno', 'Prof. Dr. H.', 'S.H., M.H., S.pN.', 'L', '0000-00-00', '', 'Guru Besar', 'IV/e', '---', '', '', ''),
('0408028101', '0408028101', 'M. Budi Mulyadi', '', 'S.H., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0408067502', '0408067502', 'Cucu Solihah', 'Dr.', 'S.Ag., M.H.', 'L', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0408069606', '0408069606', 'Yudi Junadi', 'Dr.', 'S.H., M.H.', 'L', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0408096002', '0408096002', 'Mumuh M. Rozi', '', 'S.H., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0418067801', '0418067801', 'Tanti Kirana Utami', '', 'S.H., M.H.', 'P', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0420078103', '0420078103', 'Anggy Shofia Wardany', '', 'S.H., M.H.', 'P', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0420087801', '0420087801', 'Mia Amalia', 'Hj.', 'S.H., M.H.', 'P', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0422018303', '0422018303', 'Vina Nurviyani', '', 'S.S., M.Pd.', 'P', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0422106102', '0422106102', 'Trini Handayani', 'Dr. dr. Hj.', 'S.H., M.H.', 'P', '0000-00-00', '', 'Lektor', 'III/c', '---', '', '', ''),
('0425076805', '0425076805', 'Asep Hasanudin', '', 'S.H., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0426098003', '0426098003', 'Hilman Nur', '', 'S.H., M.H.', 'L', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('0427057902', '0427057902', 'Yuyun Yulianah', '', 'S.H., M.H.', 'P', '0000-00-00', '', 'Asisten Ahli', 'III/b', '---', '', '', ''),
('430633009', '430633009', 'Dedi Mulyadi', 'Dr.', 'S.H., M.H.', 'L', '0000-00-00', 'Cianjur', 'Lektor', '', '', '08112233445', 'email@gmail.com', 'img_430633009_1505376238.png');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(2) NOT NULL,
  `jabatan_fungsional` varchar(25) DEFAULT NULL,
  `pangkat` varchar(25) DEFAULT NULL,
  `golongan` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_fungsional`
--

CREATE TABLE IF NOT EXISTS `jabatan_fungsional` (
  `id` int(1) NOT NULL,
  `jabatan_fungsional` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_fungsional`
--

INSERT INTO `jabatan_fungsional` (`id`, `jabatan_fungsional`) VALUES
(1, 'Asisten Ahli'),
(4, 'Guru Besar'),
(2, 'Lektor'),
(3, 'Lektor Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(5) unsigned zerofill NOT NULL,
  `id_matkul` int(2) NOT NULL,
  `kode_matkul` char(7) DEFAULT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `sks` int(1) DEFAULT NULL,
  `nidn` char(10) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  `hari` char(10) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time NOT NULL,
  `ruangan` char(10) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `status` char(5) NOT NULL DEFAULT 'R',
  `tahun_ajaran` int(5) DEFAULT NULL,
  `log` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `nidn`, `nama_dosen`, `kelas`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`, `semester`, `status`, `tahun_ajaran`, `log`) VALUES
(00008, 1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, '0407105901', 'Prof. Dr. H. Dwidja Priyatno, S.H., M.H., S.pN.			', 'A', 'Selasa', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-01 14:59:39'),
(00009, 26, 'HKI-010', 'Hukum Administrasi Negara', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'A', 'Selasa', '10:30:00', '13:00:00', 'Aula', 3, 'R', 20171, '2017-10-01 15:31:15'),
(00011, 19, 'HKI-009', 'Hukum Tata Negara', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'A', 'Jum''at', '13:00:00', '15:30:00', 'Aula', 3, 'R', 20171, '2017-10-02 04:57:27'),
(00012, 10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, '0402077104', 'Saptaning Ruju Paminto, S.P., M.H.					', 'A', 'Senin', '10:00:00', '10:50:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:18:31'),
(00013, 10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, '0402077104', 'Saptaning Ruju Paminto, S.P., M.H.					', 'B', 'Senin', '10:00:00', '10:50:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:38:07'),
(00014, 10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, '0402077104', 'Saptaning Ruju Paminto, S.P., M.H.					', 'C', 'Senin', '10:00:00', '10:50:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:38:07'),
(00015, 10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, '0402077104', 'Saptaning Ruju Paminto, S.P., M.H.					', 'D', 'Senin', '10:00:00', '10:50:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:38:07'),
(00016, 10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, '0402077104', 'Saptaning Ruju Paminto, S.P., M.H.					', 'E', 'Senin', '10:00:00', '10:50:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:38:07'),
(00017, 3, 'HKL-004', 'Logika Hukum', 2, '0425076805', 'Asep Hasanudin, S.H., M.H.					', 'A', 'Senin', '13:30:00', '15:10:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:40:09'),
(00018, 3, 'HKL-004', 'Logika Hukum', 2, '0425076805', 'Asep Hasanudin, S.H., M.H.					', 'B', 'Senin', '13:30:00', '15:10:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:40:09'),
(00019, 3, 'HKL-004', 'Logika Hukum', 2, '0425076805', 'Asep Hasanudin, S.H., M.H.					', 'C', 'Senin', '13:30:00', '15:10:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:40:09'),
(00020, 3, 'HKL-004', 'Logika Hukum', 2, '0425076805', 'Asep Hasanudin, S.H., M.H.					', 'D', 'Senin', '13:30:00', '15:10:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:40:09'),
(00021, 3, 'HKL-004', 'Logika Hukum', 2, '0425076805', 'Asep Hasanudin, S.H., M.H.					', 'E', 'Senin', '13:30:00', '15:10:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:40:09'),
(00022, 1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, '0407105901', 'Prof. Dr. H. Dwidja Priyatno, S.H., M.H., S.pN.			', 'B', 'Selasa', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:41:47'),
(00023, 1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, '0407105901', 'Prof. Dr. H. Dwidja Priyatno, S.H., M.H., S.pN.			', 'C', 'Selasa', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:41:47'),
(00024, 1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, '0407105901', 'Prof. Dr. H. Dwidja Priyatno, S.H., M.H., S.pN.			', 'D', 'Selasa', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:41:47'),
(00025, 1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, '0407105901', 'Prof. Dr. H. Dwidja Priyatno, S.H., M.H., S.pN.			', 'E', 'Selasa', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:41:47'),
(00026, 6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, '0427057902', 'Yuyun Yulianah, S.H., M.H.					', 'A', 'Selasa', '13:00:00', '14:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:43:09'),
(00027, 6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, '0427057902', 'Yuyun Yulianah, S.H., M.H.					', 'B', 'Selasa', '13:00:00', '14:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:43:09'),
(00028, 6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, '0427057902', 'Yuyun Yulianah, S.H., M.H.					', 'C', 'Selasa', '13:00:00', '14:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:43:09'),
(00029, 6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, '0427057902', 'Yuyun Yulianah, S.H., M.H.					', 'D', 'Selasa', '13:00:00', '14:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:43:09'),
(00030, 6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, '0427057902', 'Yuyun Yulianah, S.H., M.H.					', 'E', 'Selasa', '13:00:00', '14:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:43:09'),
(00031, 2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'A', 'Rabu', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:44:26'),
(00032, 2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'B', 'Rabu', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:44:26'),
(00033, 2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'C', 'Rabu', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:44:26'),
(00034, 2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'D', 'Rabu', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:44:26'),
(00035, 2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, '430633009', 'Dr. Dedi Mulyadi, S.H., M.H.					', 'E', 'Rabu', '08:00:00', '10:30:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:44:26'),
(00036, 4, 'HKL-050', 'Sosiologi', 2, '0420087801', 'Hj. Mia Amalia, S.H., M.H.					', 'A', 'Rabu', '11:00:00', '12:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:45:19'),
(00037, 4, 'HKL-050', 'Sosiologi', 2, '0420087801', 'Hj. Mia Amalia, S.H., M.H.					', 'B', 'Rabu', '11:00:00', '12:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:45:19'),
(00038, 4, 'HKL-050', 'Sosiologi', 2, '0420087801', 'Hj. Mia Amalia, S.H., M.H.					', 'C', 'Rabu', '11:00:00', '12:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:45:19'),
(00039, 4, 'HKL-050', 'Sosiologi', 2, '0420087801', 'Hj. Mia Amalia, S.H., M.H.					', 'D', 'Rabu', '11:00:00', '12:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:45:19'),
(00040, 4, 'HKL-050', 'Sosiologi', 2, '0420087801', 'Hj. Mia Amalia, S.H., M.H.					', 'E', 'Rabu', '11:00:00', '12:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:45:19'),
(00041, 8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, '0402036302', 'Dr. Kuswandi, S.H., M.H.					', 'A', 'Kamis', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:46:11'),
(00042, 8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, '0402036302', 'Dr. Kuswandi, S.H., M.H.					', 'B', 'Kamis', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:46:11'),
(00043, 8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, '0402036302', 'Dr. Kuswandi, S.H., M.H.					', 'C', 'Kamis', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:46:11'),
(00044, 8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, '0402036302', 'Dr. Kuswandi, S.H., M.H.					', 'D', 'Kamis', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:46:11'),
(00045, 8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, '0402036302', 'Dr. Kuswandi, S.H., M.H.					', 'E', 'Kamis', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:46:11'),
(00046, 7, 'HKI-001', 'Pendidikan Pancasila', 2, '0426098003', 'Hilman Nur, S.H., M.H.					', 'A', 'Kamis', '11:40:00', '13:20:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:47:30'),
(00047, 7, 'HKI-001', 'Pendidikan Pancasila', 2, '0426098003', 'Hilman Nur, S.H., M.H.					', 'B', 'Kamis', '11:40:00', '13:20:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:47:30'),
(00048, 7, 'HKI-001', 'Pendidikan Pancasila', 2, '0426098003', 'Hilman Nur, S.H., M.H.					', 'C', 'Kamis', '11:40:00', '13:20:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:47:30'),
(00049, 7, 'HKI-001', 'Pendidikan Pancasila', 2, '0426098003', 'Hilman Nur, S.H., M.H.					', 'D', 'Kamis', '11:40:00', '13:20:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:47:30'),
(00050, 7, 'HKI-001', 'Pendidikan Pancasila', 2, '0426098003', 'Hilman Nur, S.H., M.H.					', 'E', 'Kamis', '11:40:00', '13:20:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:47:30'),
(00051, 5, 'HKL-002', 'Bahasa Inggris Hukum', 2, '0422018303', 'Vina Nurviyani, S.S., M.Pd.					', 'A', 'Jum''at', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:07'),
(00052, 5, 'HKL-002', 'Bahasa Inggris Hukum', 2, '0422018303', 'Vina Nurviyani, S.S., M.Pd.					', 'B', 'Jum''at', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:07'),
(00053, 5, 'HKL-002', 'Bahasa Inggris Hukum', 2, '0422018303', 'Vina Nurviyani, S.S., M.Pd.					', 'C', 'Jum''at', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:07'),
(00054, 5, 'HKL-002', 'Bahasa Inggris Hukum', 2, '0422018303', 'Vina Nurviyani, S.S., M.Pd.					', 'D', 'Jum''at', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:07'),
(00055, 5, 'HKL-002', 'Bahasa Inggris Hukum', 2, '0422018303', 'Vina Nurviyani, S.S., M.Pd.					', 'E', 'Jum''at', '08:00:00', '09:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:07'),
(00056, 9, 'HKI-002', 'Pendidikan Agama', 2, '0408067502', 'Dr. Cucu Solihah, S.Ag., M.H.					', 'A', 'Jum''at', '10:00:00', '11:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:52'),
(00057, 9, 'HKI-002', 'Pendidikan Agama', 2, '0408067502', 'Dr. Cucu Solihah, S.Ag., M.H.					', 'B', 'Jum''at', '10:00:00', '11:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:52'),
(00058, 9, 'HKI-002', 'Pendidikan Agama', 2, '0408067502', 'Dr. Cucu Solihah, S.Ag., M.H.					', 'C', 'Jum''at', '10:00:00', '11:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:52'),
(00059, 9, 'HKI-002', 'Pendidikan Agama', 2, '0408067502', 'Dr. Cucu Solihah, S.Ag., M.H.					', 'D', 'Jum''at', '10:00:00', '11:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:52'),
(00060, 9, 'HKI-002', 'Pendidikan Agama', 2, '0408067502', 'Dr. Cucu Solihah, S.Ag., M.H.					', 'E', 'Jum''at', '10:00:00', '11:40:00', 'Aula', 1, 'R', 20171, '2017-10-10 07:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `id` int(5) unsigned zerofill NOT NULL,
  `npm` char(15) DEFAULT NULL,
  `id_matkul` int(2) NOT NULL,
  `kode_matkul` char(7) DEFAULT NULL,
  `kelas` char(1) NOT NULL,
  `tahun_ajaran` int(5) DEFAULT NULL,
  `keterangan` int(1) NOT NULL DEFAULT '0',
  `log` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `npm`, `id_matkul`, `kode_matkul`, `kelas`, `tahun_ajaran`, `keterangan`, `log`) VALUES
(00084, '7420116044', 54, 'HKL-007', 'A', 20171, 0, NULL),
(00085, '7420116044', 55, 'HKL-017', 'A', 20171, 0, NULL),
(00086, '7420116044', 68, 'HKL-032', 'A', 20171, 0, NULL),
(00087, '7420116044', 69, 'HKL-033', 'A', 20171, 0, NULL),
(00088, '7420116044', 70, 'HKL-040', 'A', 20171, 0, NULL),
(00089, '7420116044', 71, 'HKL-058', 'A', 20171, 0, NULL),
(00090, '7420116044', 72, 'HKL-036', 'A', 20171, 0, NULL),
(00091, '7420116044', 73, 'HKL-026', 'A', 20171, 0, NULL),
(00092, '7420116044', 74, 'HKI-026', 'A', 20171, 0, NULL),
(00093, '7420116044', 75, 'HKI-028', 'A', 20171, 0, NULL),
(00110, '7420116041', 19, 'HKI-009', 'A', 20171, 0, NULL),
(00111, '7420116041', 20, 'HKI-011', 'A', 20171, 0, NULL),
(00112, '7420116041', 21, 'HKL-006', 'A', 20171, 0, NULL),
(00113, '7420116041', 22, 'HKL-005', 'A', 20171, 0, NULL),
(00114, '7420116041', 23, 'HKL-011', 'A', 20171, 0, NULL),
(00115, '7420116041', 24, 'HKI-015', 'A', 20171, 0, NULL),
(00116, '7420116041', 25, 'HKL-060', 'A', 20171, 0, NULL),
(00129, '7420116042', 2, 'HKI-005', 'C', 20171, 0, NULL),
(00130, '7420116042', 3, 'HKL-004', 'C', 20171, 0, NULL),
(00131, '7420116042', 4, 'HKL-050', 'C', 20171, 0, NULL),
(00132, '7420116042', 5, 'HKL-002', 'C', 20171, 0, NULL),
(00133, '7420116042', 6, 'HKL-001', 'C', 20171, 0, NULL),
(00134, '7420116042', 7, 'HKI-001', 'C', 20171, 0, NULL),
(00135, '7420116042', 8, 'HKI-003', 'C', 20171, 0, NULL),
(00136, '7420116042', 9, 'HKI-002', 'C', 20171, 0, NULL),
(00138, '7420116042', 1, 'HKI-004', 'C', 20171, 0, NULL),
(00139, '7420116042', 10, 'HKL-058', 'C', 20171, 0, NULL),
(00140, '7420116041', 26, 'HKI-010', 'A', 20171, 0, NULL),
(00151, '7420116043', 19, 'HKI-009', 'A', 20171, 0, NULL),
(00152, '7420116043', 20, 'HKI-011', 'A', 20171, 0, NULL),
(00153, '7420116043', 21, 'HKL-006', 'A', 20171, 0, NULL),
(00154, '7420116043', 22, 'HKL-005', 'A', 20171, 0, NULL),
(00155, '7420116043', 23, 'HKL-011', 'A', 20171, 0, NULL),
(00156, '7420116043', 24, 'HKI-015', 'A', 20171, 0, NULL),
(00157, '7420116043', 25, 'HKL-060', 'A', 20171, 0, NULL),
(00158, '7420116043', 26, 'HKI-010', 'A', 20171, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `last_login` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `device` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`, `status`, `last_login`, `device`) VALUES
('0002085602', '501b585d65e1455dfac6c8c78e993214', 2, 1, NULL, NULL),
('0009016901', 'ebf93c19a9f993b303f069f3ec60087c', 2, 1, NULL, NULL),
('0028036202', 'cfa68214b91c1641e5b35e20fe477f89', 2, 1, NULL, NULL),
('0402036302', '58547214df47d7226af8e68bf28733b2', 2, 1, '2017-10-12 07:17:04', 'Mac OS X, Chrome 61.0.3163.100'),
('0402077104', '123376d5c952cee428e3112f9c52467a', 2, 1, NULL, NULL),
('0403066001', '52be52b67531edb3886dae788ee0c640', 2, 1, NULL, NULL),
('0405078101', '36fa8cfb22d65769e42c6ee7f58c1b53', 2, 1, NULL, NULL),
('0407105901', '763ee4bd8b0f001d7fdd2decea062df0', 2, 1, '2017-10-01 05:14:32', 'Mac OS X, Chrome 61.0.3163.100'),
('0408028101', 'cc08f77af162ac2f7b6729e55bfb0eab', 2, 1, NULL, NULL),
('0408067502', '3d2a626dd7da7990063e7293aceee804', 2, 1, NULL, NULL),
('0408069606', '06db9f320bf5fd94eefcdf339bcbd9e5', 2, 1, NULL, NULL),
('0408096002', '6d7d5afc9b6d363cf5f20f27ffc49171', 2, 1, NULL, NULL),
('0418067801', 'ac76362ce5f995b1ea9d33fd6ae323df', 2, 1, NULL, NULL),
('0420078103', 'd003199edba7f7367314e4f33518dcb5', 2, 1, NULL, NULL),
('0420087801', '2b28598fd43ff4679d0666f5c7b197e7', 2, 1, NULL, NULL),
('0422018303', '9425281b0e14465ffb6eb4d12ca192ce', 2, 1, NULL, NULL),
('0422106102', 'adddc698a85070b0ba69d38a01beb8d8', 2, 1, NULL, NULL),
('0425076805', 'd27e22dff80cd71452822667d39c968b', 2, 1, NULL, NULL),
('0426098003', '61e7825267dc06d0c0450cf7287c0519', 2, 1, NULL, NULL),
('0427057902', '6a9684a5d77380630d081776cf5f3146', 2, 1, NULL, NULL),
('430633009', '202cb962ac59075b964b07152d234b70', 2, 1, '2017-11-01 10:01:38', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116041', '74a31f35923e28e6fe61e8e85144fb8e', 1, 1, '2017-11-01 06:34:23', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116042', '5848536e19caff3170e6bf45c94e84b8', 1, 1, '2017-10-12 02:37:16', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116043', '202cb962ac59075b964b07152d234b70', 1, 1, '2017-11-01 09:56:24', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116044', '202cb962ac59075b964b07152d234b70', 1, 1, '2017-11-01 05:35:40', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116045', '202cb962ac59075b964b07152d234b70', 1, 1, '2017-11-01 05:35:01', 'Mac OS X, Chrome 61.0.3163.100'),
('7420116046', '7f06bd37c5c2e0c5e230ca1c6876d5a1', 1, 1, NULL, NULL),
('akademik', '202cb962ac59075b964b07152d234b70', 4, 1, '2017-10-12 08:11:48', 'Mac OS X, Chrome 61.0.3163.100'),
('banana', '202cb962ac59075b964b07152d234b70', 0, 1, '2017-10-18 06:37:45', 'Mac OS X, Chrome 61.0.3163.100'),
('keuangan', '202cb962ac59075b964b07152d234b70', 3, 1, '2017-10-13 03:41:57', 'Mac OS X, Chrome 61.0.3163.100');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `npm` char(15) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `angkatan` year(4) NOT NULL,
  `kuliah` char(2) NOT NULL,
  `kelas` char(1) NOT NULL,
  `program_kekhususan` varchar(25) DEFAULT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` char(15) NOT NULL,
  `email` char(50) NOT NULL,
  `status_tempat_tinggal` varchar(25) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `nidn` char(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `angkatan`, `kuliah`, `kelas`, `program_kekhususan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_tlp`, `email`, `status_tempat_tinggal`, `image`, `nidn`, `status`) VALUES
('7420116041', 'Ujang', 2016, 'R', 'A', NULL, 'L', '', '0000-00-00', '', '', '', NULL, '', '430633009', 1),
('7420116042', 'Kemod', 2016, 'R', 'C', NULL, 'o', '', '0000-00-00', '', '', '', NULL, '', '430633009', 1),
('7420116043', 'Mahasiswa 2', 2016, 'R', 'A', '', 'P', '', '0000-00-00', '', '', '', 'Rumah Orang Tua', '', '430633009', 1),
('7420116044', 'Mahasiswa 1', 2014, 'R', 'A', 'Hukum Tata Negara', 'L', 'Cianjur', '1994-04-04', '', '', 'email@email.com', 'Kontrakan', '', '430633009', 1),
('7420116045', 'Muhamad Taufik Akbar', 2014, 'R', 'B', 'Hukum Pidana', 'L', 'Cianjur', '1992-08-23', 'JL. Pasir Gede Raya, Belakang RSUD Cianjur, Kecamatan Bojongherang, Cianjur 43216                                                                                                                                                                                    ', '0811234567', 'mhs@gmail.com', 'Kontrakan', 'img_7420116045_1503651117.jpg', NULL, 1),
('7420116046', 'Esih', 2016, 'R', 'C', NULL, 'o', '', '0000-00-00', '', '', '', NULL, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_keuangan`
--

CREATE TABLE IF NOT EXISTS `master_keuangan` (
  `id` int(5) unsigned zerofill NOT NULL,
  `jenis_keuangan` varchar(255) NOT NULL,
  `rincian` varchar(255) NOT NULL,
  `besaran` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_keuangan`
--

INSERT INTO `master_keuangan` (`id`, `jenis_keuangan`, `rincian`, `besaran`) VALUES
(00001, 'Pindahan', 'Dari kampus lain', 4300000),
(00002, 'Pindahan', 'Reguler A ke B/B ke A', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(2) NOT NULL,
  `kode_matkul` char(7) DEFAULT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `sks` int(1) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `periode` char(6) DEFAULT NULL,
  `program_kekhususan` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matkul`, `nama_matkul`, `sks`, `semester`, `periode`, `program_kekhususan`) VALUES
(1, 'HKI-004', 'Pengantar Ilmu Hukum', 3, 1, 'ganjil', NULL),
(2, 'HKI-005', 'Pengantar Hukum Indonesia', 3, 1, 'ganjil', NULL),
(3, 'HKL-004', 'Logika Hukum', 2, 1, 'ganjil', NULL),
(4, 'HKL-050', 'Sosiologi', 2, 1, 'ganjil', NULL),
(5, 'HKL-002', 'Bahasa Inggris Hukum', 2, 1, 'ganjil', NULL),
(6, 'HKL-001', 'Bahasa Indonesia Hukum', 2, 1, 'ganjil', NULL),
(7, 'HKI-001', 'Pendidikan Pancasila', 2, 1, 'ganjil', NULL),
(8, 'HKI-003', 'Pendidikan Kewarganegaraan', 2, 1, 'ganjil', NULL),
(9, 'HKI-002', 'Pendidikan Agama', 2, 1, 'ganjil', NULL),
(10, 'HKL-058', 'Pendidikan Teknologi Informatika', 1, 1, 'ganjil', NULL),
(11, 'HKI-006', 'Ilmu Negara', 3, 2, 'genap', NULL),
(12, 'HKI-018', 'Hukum Adat', 2, 2, 'genap', NULL),
(13, 'HKI-017', 'Hukum Islam', 2, 2, 'genap', NULL),
(14, 'HKL-010', 'Antropologi Hukum', 2, 2, 'genap', NULL),
(15, 'HKI-016', 'Hukum Lingkungan', 2, 2, 'genap', NULL),
(16, 'HKI-019', 'Hukum Agraria', 2, 2, 'genap', NULL),
(17, 'HKI-008', 'Hukum Pidana', 3, 2, 'genap', NULL),
(18, 'HKI-007', 'Hukum Perdata', 3, 2, 'genap', NULL),
(19, 'HKI-009', 'Hukum Tata Negara', 3, 3, 'ganjil', NULL),
(20, 'HKI-011', 'Hukum Internasional', 3, 3, 'ganjil', NULL),
(21, 'HKL-006', 'Hukum Pidana Lanjutan', 2, 3, 'ganjil', NULL),
(22, 'HKL-005', 'Hukum Perikatan', 2, 3, 'ganjil', NULL),
(23, 'HKL-011', 'Hukum Adat dalam Perkembangan', 2, 3, 'ganjil', NULL),
(24, 'HKI-015', 'Hukum Dagang', 3, 3, 'ganjil', NULL),
(25, 'HKL-060', 'Teori Perundang-undangan', 2, 3, 'ganjil', NULL),
(26, 'HKI-010', 'Hukum Administrasi Negara', 3, 3, 'ganjil', NULL),
(27, 'HKI-013', 'Hukum Acara Pidana', 3, 4, 'genap', NULL),
(28, 'HKI-012', 'Hukum Acara Perdata', 3, 4, 'genap', NULL),
(29, 'HKL-008', 'Hukum Tata Ruang', 2, 4, 'genap', NULL),
(30, 'HKL-025', 'Hukum Perizinan', 2, 4, 'genap', NULL),
(31, 'HKL-009', 'Sosiologi Hukum', 2, 4, 'genap', NULL),
(32, 'HKL-016', 'Hukum Keluarga & Waris', 2, 4, 'genap', NULL),
(33, 'HKL-014', 'Hukum Acara Peratun', 2, 4, 'genap', NULL),
(34, 'HKL-031', 'Hukum Jaminan', 2, 4, 'genap', NULL),
(35, 'HKL-012', 'Otonomi Daerah & Desentralisasi', 2, 5, 'ganjil', NULL),
(36, 'HKL-015', 'Kriminologi', 2, 5, 'ganjil', NULL),
(37, 'HKL-020', 'Hukum Acara Peradilan Agama', 2, 5, 'ganjil', NULL),
(38, 'HKL-013', 'Hukum Pajak', 2, 5, 'ganjil', NULL),
(39, 'HKL-021', 'Hukum Kontrak', 2, 5, 'ganjil', NULL),
(40, 'HKL-024', 'Delik-delik Khusus', 2, 5, 'ganjil', NULL),
(41, 'HKL-014', 'Hukum Ketenagakerjaan', 2, 5, 'ganjil', NULL),
(42, 'HKL-055', 'Hukum Kesehatan', 2, 5, 'ganjil', NULL),
(43, 'HKI-022', 'Metode Penelitian Hukum', 3, 5, 'ganjil', NULL),
(44, 'HKL-059', 'Hukum Mahkamah Konstitusi', 2, 5, 'ganjil', NULL),
(45, 'HKL-057', 'Pendidikan Anti Korupsi', 2, 6, 'genap', NULL),
(46, 'HKL-027', 'Viktimologi', 2, 6, 'genap', NULL),
(47, 'HKL-054', 'Legal Drafting', 2, 6, 'genap', NULL),
(48, 'HKI-020', 'Pendidikan dan Latihan Kemahiran Hukum Pidana', 2, 6, 'genap', NULL),
(49, 'HKI-027', 'Pendidikan dan Latihan Kemahiran Hukum Perdata', 2, 6, 'genap', NULL),
(50, 'HKL-022', 'Hukum Hak Milik Intelektual', 2, 6, 'genap', NULL),
(51, 'HKL-018', 'Hukum Arbitrase dan ADR', 2, 6, 'genap', NULL),
(52, 'HKL-019', 'Hukum Perlindungan & Penegakan Lingkungan', 2, 6, 'genap', NULL),
(53, 'HKL-025', 'Hukum Hak Asasi Manusia', 2, 6, 'genap', NULL),
(54, 'HKL-007', 'Politik Hukum', 2, 7, 'ganjil', 0),
(55, 'HKL-017', 'Hukum Perjanjian Internasional', 2, 7, 'ganjil', 0),
(56, 'HKL-063', 'Hukum Bisnis dan Kewirausahaan', 2, 7, 'ganjil', 1),
(57, 'HKL-040', 'Perbandingan Hukum Perdata', 2, 7, 'ganjil', 1),
(58, 'HKL-062', 'Hukum Asuransi', 2, 7, 'ganjil', 1),
(59, 'HKL-042', 'Hukum Perdata Internasional', 2, 7, 'ganjil', 1),
(60, 'HKL-051', 'Hukum Perbankan', 2, 7, 'ganjil', 1),
(61, 'HKL-043', 'Hukum Perlindungan', 2, 7, 'ganjil', 1),
(62, 'HKL-045', 'Hukum Pidana Dalam Yurisprudensi', 2, 7, 'ganjil', 2),
(63, 'HKL-046', 'Perbandingan Hukum Pidana', 2, 7, 'ganjil', 2),
(64, 'HKL-048', 'Hukum Pidana Internasional', 2, 7, 'ganjil', 2),
(65, 'HKL-049', 'Hukum Kedokteran Kehakiman', 2, 7, 'ganjil', 2),
(66, 'HKL-061', 'Politik Hukum Pidana', 2, 7, 'ganjil', 2),
(67, 'HKL-053', 'Sistem Peradilan Pidana', 2, 7, 'ganjil', 2),
(68, 'HKL-032', 'Hukum Lembaga Negara', 2, 7, 'ganjil', 3),
(69, 'HKL-033', 'Kapita Selekta HAN', 2, 7, 'ganjil', 3),
(70, 'HKL-040', 'Perbandingan Hukum HTN', 2, 7, 'ganjil', 3),
(71, 'HKL-058', 'Politik Hukum Pemerintahan Daerah', 2, 7, 'ganjil', 3),
(72, 'HKL-036', 'Hukum Kepegawaian', 2, 7, 'ganjil', 3),
(73, 'HKL-026', 'Hukum Konstitusi', 2, 7, 'ganjil', 3),
(74, 'HKI-026', 'Kuliah Kerja Nyata (KKN)', 3, 7, 'ganjil', NULL),
(75, 'HKI-028', 'Magang', 2, 7, 'ganjil', NULL),
(76, 'HKI-021', 'Penulisan Hukum/Skripsi', 4, 8, 'genap', NULL),
(77, 'HKI-023', 'Filsafat Hukum', 2, 8, 'genap', NULL),
(78, 'HKI-024', 'Etika Profesi', 2, 8, 'genap', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhs_ortu`
--

CREATE TABLE IF NOT EXISTS `mhs_ortu` (
  `npm` char(15) NOT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_tlp` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs_ortu`
--

INSERT INTO `mhs_ortu` (`npm`, `nama_ayah`, `nama_ibu`, `alamat`, `no_tlp`) VALUES
('7420116045', 'Nama Ayah1', 'Nama Ibu1', 'JL. Pasir Gede Raya, Belakang RSUD Cianjur, Kecamatan Bojongherang, Cianjur 43211', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `mhs_pembayaran`
--

CREATE TABLE IF NOT EXISTS `mhs_pembayaran` (
  `id` int(5) unsigned zerofill NOT NULL,
  `npm` char(15) DEFAULT NULL,
  `tahun_ajaran` int(5) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `jumlah` int(10) DEFAULT NULL,
  `tgl_pembayaran` timestamp NULL DEFAULT NULL,
  `tgl_validasi` timestamp NULL DEFAULT NULL,
  `no_bukti_pembayaran` int(50) NOT NULL,
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs_pembayaran`
--

INSERT INTO `mhs_pembayaran` (`id`, `npm`, `tahun_ajaran`, `image`, `status`, `jumlah`, `tgl_pembayaran`, `tgl_validasi`, `no_bukti_pembayaran`, `keterangan`) VALUES
(00004, '7420116045', 20171, NULL, 1, 500000, '2017-08-18 07:30:00', '2017-08-21 05:11:19', 0, 0),
(00007, '7420116045', 20171, NULL, 1, 1000000, NULL, NULL, 0, 1),
(00010, '7420116045', 20171, NULL, 1, 500000, '2017-08-19 06:00:00', '2017-08-21 15:11:17', 0, 1),
(00011, '7420116044', 20171, NULL, 1, 500000, '2017-09-01 06:00:00', '2017-09-04 12:30:05', 0, 0),
(00012, '7420116043', 20171, NULL, 1, 500000, '2017-09-01 03:00:00', '2017-09-07 07:29:44', 0, 0),
(00013, '7420116041', 20171, NULL, 1, 500000, '2017-10-02 05:20:00', '2017-10-02 05:20:38', 0, 0),
(00014, '7420116042', 20171, NULL, 1, 500000, '2017-10-02 07:40:00', '2017-10-02 07:28:17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mhs_perwalian`
--

CREATE TABLE IF NOT EXISTS `mhs_perwalian` (
  `id` int(5) unsigned zerofill NOT NULL,
  `npm` char(15) DEFAULT NULL,
  `nidn` char(10) DEFAULT NULL,
  `tahun_ajaran` int(5) DEFAULT NULL,
  `tgl_perwalian` datetime DEFAULT NULL,
  `v_dosen` int(1) DEFAULT '0',
  `tgl_v_dosen` datetime DEFAULT NULL,
  `v_baa` int(1) DEFAULT '0',
  `tgl_v_baa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(5) unsigned zerofill NOT NULL,
  `npm` char(15) NOT NULL,
  `id_matkul` int(2) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL,
  `nidn` char(10) NOT NULL,
  `semester_mhs` char(2) NOT NULL,
  `nilai` int(1) NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `npm`, `id_matkul`, `tahun_ajaran`, `nidn`, `semester_mhs`, `nilai`, `log`) VALUES
(00002, '7420116041', 26, 20171, '430633009', '3', 4, '2017-11-01 10:19:36'),
(00003, '7420116043', 26, 20171, '430633009', '3', 3, '2017-11-01 10:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `program_kekhususan`
--

CREATE TABLE IF NOT EXISTS `program_kekhususan` (
  `id` int(1) NOT NULL,
  `program_kekhususan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_kekhususan`
--

INSERT INTO `program_kekhususan` (`id`, `program_kekhususan`) VALUES
(4, ''),
(1, 'Hukum Keperdataan'),
(2, 'Hukum Pidana'),
(3, 'Hukum Tata Negara');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `id_registrasi` int(5) unsigned zerofill NOT NULL,
  `nim` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role` int(1) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `keterangan`) VALUES
(0, 'Admin'),
(1, 'Mahasiswa'),
(2, 'Dosen'),
(3, 'Bagian Keuangan'),
(4, 'Bagian Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `username` varchar(50) NOT NULL,
  `nik` char(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `nik`, `nama`, `jenis_kelamin`, `jabatan`, `image`) VALUES
('akademik', '1234567890', 'Bagian Akademik', 'L', NULL, NULL),
('banana', 'admin', 'admin', 'L', NULL, NULL),
('keuangan', '1234567890', 'bag.keuangan', 'L', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stt_penilaian`
--

CREATE TABLE IF NOT EXISTS `stt_penilaian` (
  `id_jadwal` int(5) unsigned zerofill NOT NULL,
  `nidn` char(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stt_penilaian`
--

INSERT INTO `stt_penilaian` (`id_jadwal`, `nidn`, `status`) VALUES
(00009, '430633009', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stt_perwalian`
--

CREATE TABLE IF NOT EXISTS `stt_perwalian` (
  `id` int(5) unsigned zerofill NOT NULL,
  `npm` char(15) NOT NULL,
  `nidn` char(10) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL,
  `tgl_perwalian` datetime NOT NULL,
  `v_dosen` int(1) NOT NULL DEFAULT '0',
  `tgl_v_dosen` datetime NOT NULL,
  `v_baa` int(1) NOT NULL DEFAULT '0',
  `tgl_v_baa` datetime NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stt_perwalian`
--

INSERT INTO `stt_perwalian` (`id`, `npm`, `nidn`, `tahun_ajaran`, `tgl_perwalian`, `v_dosen`, `tgl_v_dosen`, `v_baa`, `tgl_v_baa`, `sks`) VALUES
(00010, '7420116044', '430633009', 20171, '2017-09-09 21:17:16', 1, '2017-09-19 14:32:18', 1, '2017-09-24 23:09:18', 21),
(00012, '7420116041', '430633009', 20171, '2017-10-02 12:22:42', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(00013, '7420116042', '430633009', 20171, '2017-10-09 14:30:42', 1, '2017-10-09 18:13:35', 0, '0000-00-00 00:00:00', 0),
(00014, '7420116043', '430633009', 20171, '2017-11-01 16:56:44', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stt_tempat_tinggal`
--

CREATE TABLE IF NOT EXISTS `stt_tempat_tinggal` (
  `id` int(1) NOT NULL,
  `status_tempat_tinggal` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stt_tempat_tinggal`
--

INSERT INTO `stt_tempat_tinggal` (`id`, `status_tempat_tinggal`) VALUES
(4, 'Asrama'),
(2, 'Kontrakan'),
(1, 'Rumah Orang Tua'),
(3, 'Rumah Sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(2) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`) VALUES
(1, 20171);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mhs_jadwal`
--
CREATE TABLE IF NOT EXISTS `v_mhs_jadwal` (
`npm` char(15)
,`nama` varchar(50)
,`id_matkul` int(2)
,`kode_matkul` char(7)
,`kelas` char(1)
,`tahun_ajaran` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mhs_pembayaran`
--
CREATE TABLE IF NOT EXISTS `v_mhs_pembayaran` (
`id` int(5) unsigned zerofill
,`npm` char(15)
,`nama` varchar(50)
,`angkatan` year(4)
,`tahun_ajaran` int(5)
,`jumlah` int(10)
,`tgl_pembayaran` timestamp
,`tgl_validasi` timestamp
,`no_bukti_pembayaran` int(50)
,`keterangan` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mhs_perkuliahan`
--
CREATE TABLE IF NOT EXISTS `v_mhs_perkuliahan` (
`id_krs` int(5) unsigned zerofill
,`npm` char(15)
,`nama` varchar(50)
,`angkatan` year(4)
,`id_matkul` int(2)
,`kode_matkul` char(7)
,`nama_matkul` varchar(50)
,`kelas` char(1)
,`id_jadwal` int(5) unsigned zerofill
,`hari` char(10)
,`jam_mulai` time
,`jam_selesai` time
,`ruangan` char(10)
,`nidn` char(10)
,`nama_dosen` varchar(50)
,`tahun_ajaran` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mhs_perwalian`
--
CREATE TABLE IF NOT EXISTS `v_mhs_perwalian` (
`id` int(5) unsigned zerofill
,`npm` char(15)
,`nama` varchar(50)
,`id_matkul` int(2)
,`kode_matkul` char(7)
,`nama_matkul` varchar(50)
,`kelas` char(1)
,`sks` int(1)
,`semester` int(1)
,`tahun_ajaran` int(5)
,`keterangan` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mhs_stt_perwalian`
--
CREATE TABLE IF NOT EXISTS `v_mhs_stt_perwalian` (
`npm` char(15)
,`nama` varchar(50)
,`angkatan` year(4)
,`nidn` char(10)
,`v_dosen` int(1)
,`v_baa` int(1)
,`tahun_ajaran` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai`
--
CREATE TABLE IF NOT EXISTS `v_nilai` (
`npm` char(15)
,`nama_mhs` varchar(50)
,`id_matkul` int(2)
,`kode_matkul` char(7)
,`nama_matkul` varchar(50)
,`sks` int(1)
,`kelas` char(1)
,`tahun_ajaran` int(5)
,`nidn` char(10)
,`nama_dosen` varchar(50)
,`gelar_depan` char(20)
,`gelar_belakang` char(50)
,`semester_mhs` char(2)
,`nilai` int(1)
,`log` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `v_mhs_jadwal`
--
DROP TABLE IF EXISTS `v_mhs_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_jadwal` AS select `krs`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama`,`krs`.`id_matkul` AS `id_matkul`,`krs`.`kode_matkul` AS `kode_matkul`,`krs`.`kelas` AS `kelas`,`krs`.`tahun_ajaran` AS `tahun_ajaran` from (`krs` join `mahasiswa` on((`krs`.`npm` = `mahasiswa`.`npm`)));

-- --------------------------------------------------------

--
-- Structure for view `v_mhs_pembayaran`
--
DROP TABLE IF EXISTS `v_mhs_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_pembayaran` AS select `mhs_pembayaran`.`id` AS `id`,`mahasiswa`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama`,`mahasiswa`.`angkatan` AS `angkatan`,`mhs_pembayaran`.`tahun_ajaran` AS `tahun_ajaran`,`mhs_pembayaran`.`jumlah` AS `jumlah`,`mhs_pembayaran`.`tgl_pembayaran` AS `tgl_pembayaran`,`mhs_pembayaran`.`tgl_validasi` AS `tgl_validasi`,`mhs_pembayaran`.`no_bukti_pembayaran` AS `no_bukti_pembayaran`,`mhs_pembayaran`.`keterangan` AS `keterangan` from (`mahasiswa` join `mhs_pembayaran` on((`mahasiswa`.`npm` = `mhs_pembayaran`.`npm`)));

-- --------------------------------------------------------

--
-- Structure for view `v_mhs_perkuliahan`
--
DROP TABLE IF EXISTS `v_mhs_perkuliahan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_perkuliahan` AS select `krs`.`id` AS `id_krs`,`krs`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama`,`mahasiswa`.`angkatan` AS `angkatan`,`krs`.`id_matkul` AS `id_matkul`,`krs`.`kode_matkul` AS `kode_matkul`,`jadwal`.`nama_matkul` AS `nama_matkul`,`krs`.`kelas` AS `kelas`,`jadwal`.`id_jadwal` AS `id_jadwal`,`jadwal`.`hari` AS `hari`,`jadwal`.`jam_mulai` AS `jam_mulai`,`jadwal`.`jam_selesai` AS `jam_selesai`,`jadwal`.`ruangan` AS `ruangan`,`jadwal`.`nidn` AS `nidn`,`jadwal`.`nama_dosen` AS `nama_dosen`,`jadwal`.`tahun_ajaran` AS `tahun_ajaran` from ((`krs` left join `jadwal` on(((`jadwal`.`id_matkul` = `krs`.`id_matkul`) and (`jadwal`.`kelas` = `krs`.`kelas`)))) join `mahasiswa` on((`krs`.`npm` = `mahasiswa`.`npm`)));

-- --------------------------------------------------------

--
-- Structure for view `v_mhs_perwalian`
--
DROP TABLE IF EXISTS `v_mhs_perwalian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_perwalian` AS select `krs`.`id` AS `id`,`krs`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama`,`krs`.`id_matkul` AS `id_matkul`,`krs`.`kode_matkul` AS `kode_matkul`,`matakuliah`.`nama_matkul` AS `nama_matkul`,`krs`.`kelas` AS `kelas`,`matakuliah`.`sks` AS `sks`,`matakuliah`.`semester` AS `semester`,`krs`.`tahun_ajaran` AS `tahun_ajaran`,`krs`.`keterangan` AS `keterangan` from ((`krs` join `matakuliah` on((`matakuliah`.`id` = `krs`.`id_matkul`))) join `mahasiswa` on((`krs`.`npm` = `mahasiswa`.`npm`)));

-- --------------------------------------------------------

--
-- Structure for view `v_mhs_stt_perwalian`
--
DROP TABLE IF EXISTS `v_mhs_stt_perwalian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mhs_stt_perwalian` AS select `stt_perwalian`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama`,`mahasiswa`.`angkatan` AS `angkatan`,`stt_perwalian`.`nidn` AS `nidn`,`stt_perwalian`.`v_dosen` AS `v_dosen`,`stt_perwalian`.`v_baa` AS `v_baa`,`stt_perwalian`.`tahun_ajaran` AS `tahun_ajaran` from (`stt_perwalian` join `mahasiswa` on((`stt_perwalian`.`npm` = `mahasiswa`.`npm`)));

-- --------------------------------------------------------

--
-- Structure for view `v_nilai`
--
DROP TABLE IF EXISTS `v_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai` AS select `nilai`.`npm` AS `npm`,`mahasiswa`.`nama` AS `nama_mhs`,`nilai`.`id_matkul` AS `id_matkul`,`matakuliah`.`kode_matkul` AS `kode_matkul`,`matakuliah`.`nama_matkul` AS `nama_matkul`,`matakuliah`.`sks` AS `sks`,`mahasiswa`.`kelas` AS `kelas`,`nilai`.`tahun_ajaran` AS `tahun_ajaran`,`nilai`.`nidn` AS `nidn`,`dosen`.`nama` AS `nama_dosen`,`dosen`.`gelar_depan` AS `gelar_depan`,`dosen`.`gelar_belakang` AS `gelar_belakang`,`nilai`.`semester_mhs` AS `semester_mhs`,`nilai`.`nilai` AS `nilai`,`nilai`.`log` AS `log` from (((`nilai` join `mahasiswa` on((`nilai`.`npm` = `mahasiswa`.`npm`))) join `matakuliah` on((`nilai`.`id_matkul` = `matakuliah`.`id`))) join `dosen` on((`nilai`.`nidn` = `dosen`.`nidn`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `jabatan_fungsional` (`jabatan_fungsional`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_fungsional` (`jabatan_fungsional`);

--
-- Indexes for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_fungsional` (`jabatan_fungsional`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_jadwal` (`kode_matkul`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `npm_2` (`npm`),
  ADD KEY `id_jadwal_2` (`kode_matkul`),
  ADD KEY `tahun_ajaran_2` (`tahun_ajaran`),
  ADD KEY `npm_3` (`npm`),
  ADD KEY `id_jadwal_3` (`kode_matkul`),
  ADD KEY `tahun_ajaran_3` (`tahun_ajaran`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `program_kekhususan` (`program_kekhususan`),
  ADD KEY `status_tempat_tinggal` (`status_tempat_tinggal`);

--
-- Indexes for table `master_keuangan`
--
ALTER TABLE `master_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`) USING BTREE;

--
-- Indexes for table `mhs_ortu`
--
ALTER TABLE `mhs_ortu`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `mhs_pembayaran`
--
ALTER TABLE `mhs_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `mhs_perwalian`
--
ALTER TABLE `mhs_perwalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `program_kekhususan`
--
ALTER TABLE `program_kekhususan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_kekhususan` (`program_kekhususan`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `stt_penilaian`
--
ALTER TABLE `stt_penilaian`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `stt_perwalian`
--
ALTER TABLE `stt_perwalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stt_tempat_tinggal`
--
ALTER TABLE `stt_tempat_tinggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_tempat_tinggal` (`status_tempat_tinggal`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `master_keuangan`
--
ALTER TABLE `master_keuangan`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `mhs_pembayaran`
--
ALTER TABLE `mhs_pembayaran`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mhs_perwalian`
--
ALTER TABLE `mhs_perwalian`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stt_perwalian`
--
ALTER TABLE `stt_perwalian`
  MODIFY `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`jabatan_fungsional`) REFERENCES `jabatan_fungsional` (`jabatan_fungsional`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `golongan`
--
ALTER TABLE `golongan`
  ADD CONSTRAINT `golongan_ibfk_1` FOREIGN KEY (`jabatan_fungsional`) REFERENCES `jabatan_fungsional` (`jabatan_fungsional`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_6` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`),
  ADD CONSTRAINT `jadwal_ibfk_7` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`program_kekhususan`) REFERENCES `program_kekhususan` (`program_kekhususan`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`status_tempat_tinggal`) REFERENCES `stt_tempat_tinggal` (`status_tempat_tinggal`);

--
-- Constraints for table `mhs_ortu`
--
ALTER TABLE `mhs_ortu`
  ADD CONSTRAINT `mhs_ortu_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mhs_pembayaran`
--
ALTER TABLE `mhs_pembayaran`
  ADD CONSTRAINT `mhs_pembayaran_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_pembayaran_ibfk_2` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mhs_perwalian`
--
ALTER TABLE `mhs_perwalian`
  ADD CONSTRAINT `mhs_perwalian_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_perwalian_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_perwalian_ibfk_3` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`npm`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stt_penilaian`
--
ALTER TABLE `stt_penilaian`
  ADD CONSTRAINT `stt_penilaian_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stt_penilaian_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
