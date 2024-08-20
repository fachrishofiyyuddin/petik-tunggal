-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 20, 2024 at 03:08 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petik_tunggal`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nim` varchar(225) NOT NULL,
  `perintah` enum('tanpa-petik-tunggal','addslashes()','mysqli_real_escape_string(variabel_koneksi, variabel_data)','mysqli_prepare()') NOT NULL,
  `cara_kerja` text,
  `tipsecho` enum('-','stripslashes()') NOT NULL,
  `status` enum('-','kurang-baik','rekomendasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `perintah`, `cara_kerja`, `tipsecho`, `status`) VALUES
(40, 'Muhammad Kevin', '239842834', 'tanpa-petik-tunggal', '-', '-', '-'),
(41, 'Muhammad Kevin Mus\'in', '3298423894', 'addslashes()', 'Fungsi ini mengubah karakter-karakter khusus menjadi bentuk yang lebih aman untuk disimpan dalam string, tetapi ini hanya melibatkan penambahan backslash dan tidak benar-benar mempersiapkan string untuk query SQL', 'stripslashes()', 'kurang-baik'),
(42, 'Muhammad Riski Mus\'in', '23983284', 'mysqli_real_escape_string(variabel_koneksi, variabel_data)', 'Fungsi ini melakukan pelarian yang lebih aman daripada addslashes() dengan menggunakan kontek koneksi database untuk menentukan karakter khusus yang perlu dilarikan. Ini menambahkan backslash hanya pada karakter yang relevan untuk MySQL, seperti tanda petik tunggal, tanda petik ganda, backslash, dan NULL.', 'stripslashes()', 'kurang-baik'),
(43, 'Angelina Putri Sabrina Mus\'in', '32984384', 'mysqli_prepare()', 'Dengan prepared statements, query SQL didefinisikan dengan parameter placeholder (?), dan nilai parameter diikat secara terpisah menggunakan mysqli_stmt_bind_param(). Ini memastikan bahwa data dari pengguna diperlakukan dengan aman dan benar, menghindari SQL Injection tanpa perlu melarikan karakter secara manual.', 'stripslashes()', 'rekomendasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
