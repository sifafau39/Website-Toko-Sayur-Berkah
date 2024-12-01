-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 06:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosayurberkah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_pesan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `telepon`, `pesan`, `tanggal_pesan`) VALUES
(5, 'Sifa Fauzia', 'sfafau20@gmail.com', '085896453272', 'Kenapa pesanan saya belum sampai?', '2022-08-17 13:50:24'),
(7, 'Sifa', 'sifa@gmail.com', '087701805740', 'Pengiriman berapa lama?', '2022-08-17 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`) VALUES
(31, 'Sifa Fauzia', 'sifafauzia308@gmail.com', 'b6538a079ec8ad22f738', '087701805740', 'Jakarta Timur', '2022-08-16 06:11:37'),
(34, 'Fauzia', 'fauzia@gmail.com', '93d62adf154940f87157', '085896453272', 'Depok', '2022-08-18 19:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_transaksi` varchar(10) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `jumlah_pembayaran` varchar(10) DEFAULT NULL,
  `rekening_pembayaran` varchar(20) DEFAULT NULL,
  `rekening_pelanggan` varchar(50) DEFAULT NULL,
  `id_rekening` int(5) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` varchar(200) DEFAULT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_pembayaran`, `jumlah_pembayaran`, `rekening_pembayaran`, `rekening_pelanggan`, `id_rekening`, `nama_bank`, `bukti_pembayaran`, `tanggal_pembayaran`) VALUES
(35, 31, 'Sifa Fauzia', 'sifafauzia308@gmail.com', '087701805740', 'Jakarta Timur', '17082022MSQPBYI', '2022-08-19 20:48:56', '29000', 'Sudah Bayar', '29', '210033477', 'Fauzia', 14, 'BANK BNI', '916358_11.png', '2022-08-17 10:13:13'),
(38, 34, 'Fauzia', 'fauzia@gmail.com', '085896453272', 'Depok', '190820220XTABBK', '2022-08-19 20:56:47', '182000', 'Sudah Bayar', '182', '085896453272', 'Fauzia', 14, 'DANA', NULL, '2022-08-19 15:53:18'),
(39, 34, 'Fauzia', 'fauzia@gmail.com', '085896453272', 'Depok', '1908202248QBAES', '2022-08-18 17:00:00', '77000', 'Belum Bayar', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-19 15:58:17'),
(40, 31, 'Sifa Fauzia', 'sifafauzia308@gmail.com', '087701805740', 'Jakarta Timur', '230820220UBKRSE', '2022-08-22 17:00:00', '40000', 'Belum Bayar', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-22 22:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `kode_produk` varchar(10) DEFAULT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `foto_produk` varchar(200) DEFAULT NULL,
  `harga_produk` varchar(10) NOT NULL,
  `keterangan_harga` varchar(10) NOT NULL,
  `stok_produk` varchar(10) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `kode_produk`, `nama_produk`, `foto_produk`, `harga_produk`, `keterangan_harga`, `stok_produk`, `slug_produk`, `keterangan_produk`) VALUES
(1, 1, 'worteltel', 'Wortel', 'produk11.jpg', '20000', '/ kg', '10 Kg', 'wortel-worteltel', 'Manfaat wortel untuk kesehatan tubuh ada banyak, mulai dari menjaga kesehatan mata, mencegah kanker, serta memperkuat kekebalan tubuh. Seluruh manfaat sehat tersebut bisa didapat dari kandungan beragam nutrisi di dalamnya.'),
(2, 1, 'cabmer', 'Cabai Merah', 'produk2.jpg', '15000', '/ 150 gr', '7 Kg', 'cabai-merah-cabmer', 'Cabai mengandung beragam senyawa yang berperan sebagai antioksidan, seperti capsaicin, karotenoid, violaxanthin, dan lutein. Selain itu, cabai juga mengandung beberapa vitamin dan mineral, seperti vitamin A, vitamin B6, vitamin C, dan kalium. Namun, hindari mengonsumsi cabai secara berlebihan, karena dapat menyebabkan gangguan pencernaan. '),
(3, 1, 'brokolili', 'Brokoli', 'produk3.jpg', '30000', '/ kg', '12 Kg', 'brokoli-brokolili', 'Brokoli merupakan sayuran yang memiliki segudang manfaat untuk kesehatan. Sayuran berwarna hijau ini memiliki banyak kandungan vitamin C, kalsium, vitamin K, folat, potassium, mangan, vitamin B6 dan selenium.'),
(12, 1, 'baput', 'Bawang Putih', 'produk52.jpg', '33000', '/ kg', '12 Kg', 'bawang-putih-baput', 'Bawang putih tidak hanya memiliki aroma kuat dan rasa yang tajam, manfaat bawang putih juga baik kesehatan untuk tubuh. Adapun manfaatnya antara lain mencegah flu, menjaga keseimbangan kolesterol dalam darah, meningkatkan aktivitas dan performa fisik, serta manfaat-manfaat lainnya.'),
(13, 1, 'paprikaka', 'Paprika', 'produk62.jpg', '87000', '/ 3 pcs', '4 Kg', 'paprika-paprikaka', 'Paprika termasuk dalam sayuran. Sama seperti sayuran lainnya, paprika juga baik untuk kesehatan. Beberapa manfaat yang dapat dirasakan, yaitu meningkatkan kesehatan mata, mencegah anemia, hingga mempertahankan berat badan sehat. Baik paprika hijau, kuning, oranye, hingga merah, memiliki manfaat yang sama.'),
(14, 1, 'bamer', 'Bawang Merah', 'produk72.jpg', '44000', '/ kg', '9 Kg', 'bawang-merah-bamer', 'Bawang merah mengandung berbagai senyawa yang mampu memberikan manfaat kesehatan untuk pria. Senyawa antioksidan flavonoid, seperti fisetin dan quercetin lah yang berperan besar dalam melawan berbagai penyakit yang rentan menyerang pria.'),
(15, 1, 'tomato', 'Tomat', 'produk82.jpg', '22000', '/ kg', '12 Kg', 'tomat-tomato', 'Tomat adalah buah tinggi kadar air dengan rasa manis asam menyegarkan. Selain enak, vitamin yang terkandung dalam tomat juga penting untuk tubuh. Beberapa di antaranya adalah vitamin C, K1, dan B9 atau dikenal juga dengan nama asam folat.'),
(16, 1, 'polonglong', 'Kacang Polong', 'produk91.jpg', '20000', '/ kg', '6 Kg', 'kacang-polong-polonglong', 'Kacang polong merupakan biji dari tanaman polong. Kacang polong merupakan buah yang mengandung biji. Biji dari buah polong yang berbentuk bola-bola hijau ini yang biasanya diolah menjadi aneka masakan.'),
(19, 1, 'kolngu', 'Kol Ungu', 'produk101.jpg', '45000', '/ kg', '5 Kg', 'kol-ungu-kolngu', 'Kol ungu memiliki rasa yang mirip dengan kol hijau, tetapi sedikit lebih pahit. Dibandingkan kol hijau, kol ungu diklaim memiliki lebih banyak manfaat untuk kesehatan karena kaya akan nutrisi seperti vitamin A, vitamin B, vitamin C, vitamin E, kalium, kalsium, fosfor, natrium, zat besi, serta mengandung antosianin.');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `tanggal`) VALUES
(10, 'DANA', '087701805740', 'Sifa Fauzia', '2022-08-17 22:29:31'),
(11, 'OVO', '087701805740', 'Sifa Fauzia', '2022-08-17 22:29:46'),
(12, 'Gopay', '087701805740', 'Sifa Fauzia', '2022-08-17 22:30:01'),
(13, 'BANK BCA', '344537878', 'Sifa Fauzia', '2022-08-17 22:30:29'),
(14, 'BANK BRI', '20112974', 'Sifa Fauzia', '2022-08-17 22:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(5) NOT NULL,
  `nama_web` varchar(30) NOT NULL,
  `tagline` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_web`, `tagline`, `email`, `website`, `telepon`, `alamat`, `logo`, `icon`) VALUES
(1, 'Toko Sayur Berkah', 'Belanja Sayur Segar Kualitas Terbaik Dengan Mudah', 'tokosayurberkah@gmail.com', 'http://tokosayurberkah.epizy.com/', '087701805740', 'Jl. Swadaya Rawa Badung - Jakarta Timur', 'apple-touch-icon18.png', 'apple-touch-icon19.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total_harga` varchar(10) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
(47, 31, '17082022MSQPBYI', 15, '29000', '1', '29000', '2022-08-16 17:00:00'),
(54, 34, '190820220XTABBK', 19, '45000', '1', '45000', '2022-08-18 17:00:00'),
(55, 34, '190820220XTABBK', 13, '87000', '1', '87000', '2022-08-18 17:00:00'),
(56, 34, '190820220XTABBK', 2, '15000', '2', '30000', '2022-08-18 17:00:00'),
(57, 34, '190820220XTABBK', 1, '20000', '1', '20000', '2022-08-18 17:00:00'),
(58, 34, '1908202248QBAES', 12, '33000', '1', '33000', '2022-08-18 17:00:00'),
(59, 34, '1908202248QBAES', 14, '44000', '1', '44000', '2022-08-18 17:00:00'),
(60, 31, '230820220UBKRSE', 1, '20000', '2', '40000', '2022-08-22 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role`, `tanggal`) VALUES
(1, 'tokosayurberkah', 'tokosayurberkah@gmail.com', 'tokosayurberkah', 'berkah', 'Admin', '2022-08-17 22:28:22'),
(5, 'admin', 'admin@gmail.com', 'admin1', 'c6707ee3b5b4b3fa0eca', 'admin', '2022-08-17 22:31:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `kode_pembayaran` (`kode_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`) USING BTREE,
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
