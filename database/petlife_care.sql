-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 01:30 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petlife_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `logo_bank` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_pemilik`, `nama_bank`, `no_rekening`, `logo_bank`, `status`) VALUES
(1, 'Muhammad Maulana', 'BNI', '0242013881', 'b1577733294.png', 'aktif'),
(2, 'Bambang', 'BCA', '1423511818', 'b1577734624.png', 'aktif'),
(3, 'Tiodor Sianturi', 'Mandiri', '17300000213531', 'b1577790203.png', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_katalog`, `nama_barang`, `keterangan`, `gambar`, `harga`, `stok`, `status`) VALUES
(1, 2, 'Leather Dog Necklace Pink', 'Pet supply accessory wholesale cow leather dog', 'pd1577430163.png', 100000, 12, 'aktif'),
(2, 2, 'Protective Dog Harness Vest Pink', 'Support customization service protective dog harness vest', 'pd1577474290.png', 150000, 53, 'aktif'),
(3, 2, 'Leather Spiked Dog Collar Pink', 'Wholesale manufacturer leather custom spiked dog collar', 'pd1577474379.png', 300000, 3, 'aktif'),
(4, 2, 'Wool Jacket Dog Pink', 'Woolen jacket fashionable leisure dog accessories pet', 'pd1577474478.png', 950000, 2, 'aktif'),
(5, 1, 'Top Premium Dry Cat Food with Forest Chicken', 'Real Nature Holistic Pet Food, Eco-Friendly,  Size 2kg, 4kg', 'pd1577650457.png', 120000, 25, 'aktif'),
(6, 1, ' Fresh Raw Meat Super High Quality Pet Dog', 'High quality fresh meat dog and cat natural', 'pd1577650648.png', 280000, 1, 'aktif'),
(7, 1, 'Real Nature Holistic Pet Food - Dog', 'Eco-Friendly Pet Food Premium Dry Dog Food-Chicken ', 'pd1577651054.png', 100000, 89, 'aktif'),
(8, 1, ' Real Nature Holistic Pet Food - Cat', 'High Protein Formula Holistic Dry Cat Food ', 'pd1577651170.png', 75000, 105, 'aktif'),
(9, 3, 'Bell Sound', 'Random pick', 'pd1577793183.png', 30000, 10, 'aktif'),
(10, 3, 'Chew Q Rainbow Ball Toys', 'Random pick', 'pd1577793217.png', 25000, 12, 'aktif'),
(11, 3, 'Dog Chew Bone Tooth', 'Dog chew toy for pets bone tooth', 'pd1577936281.png', 100000, 55, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `jenis_katalog` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `jenis_katalog`, `status`) VALUES
(1, 'Pet Food', 'aktif'),
(2, 'Pet Accessories', 'aktif'),
(3, 'Pet Toys', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `order_penitipan`
--

CREATE TABLE `order_penitipan` (
  `id_order_penitipan` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penerima` varchar(45) NOT NULL,
  `tipe_pet` varchar(50) NOT NULL,
  `lama_penitipan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_penitipan` date NOT NULL,
  `tgl_waktu_penitipan` datetime NOT NULL,
  `bukti_transfer` text NOT NULL,
  `status_order_penitipan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_penitipan`
--

INSERT INTO `order_penitipan` (`id_order_penitipan`, `id_user`, `nama_penerima`, `tipe_pet`, `lama_penitipan`, `total`, `id_bank`, `no_telp`, `alamat`, `tgl_penitipan`, `tgl_waktu_penitipan`, `bukti_transfer`, `status_order_penitipan`) VALUES
('2001063173', 9, 'Tyodor', 'Dog', 3, 120000, 1, '081208120812', 'Jl. Bubat', '2020-01-06', '2020-01-06 16:58:35', 'bt1578304883.png', '9'),
('2001066149', 2, 'Bolang', 'Cat', 3, 75000, 3, '081212341234', 'Jl. Kutilang', '2020-01-06', '2020-01-06 16:06:29', 'bt1578302078.png', '2');

-- --------------------------------------------------------

--
-- Table structure for table `order_perawatan`
--

CREATE TABLE `order_perawatan` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `nama_penerima` varchar(45) NOT NULL,
  `total` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_waktu_order` datetime NOT NULL,
  `bukti_transfer` text NOT NULL,
  `status_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_perawatan`
--

INSERT INTO `order_perawatan` (`id_order`, `id_user`, `nama_paket`, `nama_penerima`, `total`, `id_bank`, `no_telp`, `alamat`, `tgl_order`, `tgl_waktu_order`, `bukti_transfer`, `status_order`) VALUES
(2001053660, 1, 'cat_wonderful', 'Muhammad Maulana', 135000, 2, '089679767190', 'Jl. Merpati', '2020-01-05', '2020-01-05 23:36:35', '', '9'),
(2001062521, 1, 'dog_wonderful', 'Muhammad Maulana', 155000, 2, '089679767190', 'Jl. Manabara', '2020-01-06', '2020-01-06 02:48:29', 'bt1578254031.png', '1'),
(2001067171, 2, 'cat_happy', 'Tubagus Fadli', 85000, 2, '081212341234', 'Jl. Kaliki', '2020-01-06', '2020-01-06 12:37:44', 'bt1578289303.png', '2'),
(2001068411, 1, 'cat_happy', 'Muhammad Maulana', 85000, 3, '089679767190', 'Jl. Test', '2020-01-06', '2020-01-06 02:55:45', 'bt1578254226.png', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `tgl_waktu_pemesanan` datetime NOT NULL,
  `bukti_transfer` text NOT NULL,
  `status_pesanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`id_pesanan`, `id_user`, `nama_penerima`, `total`, `id_bank`, `no_telp`, `alamat`, `tgl_pemesanan`, `tgl_waktu_pemesanan`, `bukti_transfer`, `status_pesanan`) VALUES
('1912308906', 2, 'Tubagus Fadli', 495000, 1, '081212341234', 'Jl. Testah', '2019-12-31', '2019-12-31 09:31:39', 'bt1577762249.png', '2'),
('1912311188', 3, 'Faksi Jayawardana', 435000, 2, '081257374556', 'Jl. Kenangan', '2019-12-31', '2019-12-31 11:46:11', 'bt1577767673.png', '2'),
('1912311447', 7, 'deni deni', 395000, 2, '7654345678', 'Jalan cibangkong no 33', '2019-12-31', '2019-12-31 17:50:27', 'bt1577789445.png', '2'),
('2001024277', 8, 'Ruth Poppy', 865000, 2, '089612344321', 'Jl. singaraja', '2020-01-02', '2020-01-02 12:04:55', 'bt1577941548.png', '2'),
('2001054452', 8, 'Ruth Poppy', 2195000, 1, '089612344321', 'Jl. Patimura No. 33', '2020-01-05', '2020-01-05 20:51:07', 'bt1578233223.png', '1'),
('2001055922', 1, 'Muhammad Maulana', 915000, 3, '089679767190', 'Jl. Jakarta No. 31', '2020-01-05', '2020-01-05 22:21:38', 'bt1578238316.png', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang_detail`
--

CREATE TABLE `pesanan_barang_detail` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_barang_detail`
--

INSERT INTO `pesanan_barang_detail` (`id_pesanan`, `id_barang`, `qty`, `subtotal`) VALUES
('1912308906', 7, 2, 200000),
('1912308906', 6, 1, 280000),
('1912311188', 5, 1, 120000),
('1912311188', 1, 3, 300000),
('1912311447', 6, 1, 280000),
('1912311447', 1, 1, 100000),
('2001024277', 11, 1, 100000),
('2001024277', 2, 5, 750000),
('2001054452', 6, 1, 280000),
('2001054452', 4, 2, 1900000),
('2001055922', 3, 3, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `level`, `nama`, `email`, `password`, `alamat`, `no_hp`, `status`) VALUES
(1, 'admin', 'Muhammad Maulana', 'muhammadmaulanaa17@gmail.com', '97c7e6196b771dcc4f3f70059d972601', 'Jl. Test', '089679767190', 'aktif'),
(2, 'customer', 'Tubagus Fadli', 'tebe123@gmail.com', 'ff7cebead77e1573e5a35c9ad27d7a67', 'Jl. Kutilang', '081212341234', 'aktif'),
(3, 'customer', 'Faksi Jayawardana', 'faksigila@gmail.com', '34a765de65728a4b3901c1b646e68f85', 'Jl. Kenangan', '081257374556', 'aktif'),
(4, 'admin', 'Tiodor Sianturi', 'tyodors@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '-', '089683075797', 'aktif'),
(5, 'customer', 'Cust Satu', 'custsatu@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', '-', '089612342346', 'aktif'),
(6, 'customer', 'Cust Dua', 'dua@gmail.com', 'd0bfd0a7ad6fe1b4058373e62cbea380', '-', '088943352342', 'aktif'),
(7, 'customer', 'deni deni', 'deni@gmail.com', '202cb962ac59075b964b07152d234b70', 'Jalan cibangkong no 33', '7654345678', 'aktif'),
(8, 'customer', 'Ruth Poppy', 'rpoppyv@gmail.com', '97c7e6196b771dcc4f3f70059d972601', 'Jl. Patimura No. 33', '089612344321', 'aktif'),
(9, 'customer', 'Tyodor Satu', 'tyodor1@gmail.com', '7d18d4c9ddb6790d732f70211345d1b5', 'Jl. Bubat', '081208120812', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_katalog` (`id_katalog`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `order_penitipan`
--
ALTER TABLE `order_penitipan`
  ADD PRIMARY KEY (`id_order_penitipan`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_perawatan`
--
ALTER TABLE `order_perawatan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `pesanan_barang_detail`
--
ALTER TABLE `pesanan_barang_detail`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_penitipan`
--
ALTER TABLE `order_penitipan`
  ADD CONSTRAINT `order_penitipan_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `order_penitipan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order_perawatan`
--
ALTER TABLE `order_perawatan`
  ADD CONSTRAINT `order_perawatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `order_perawatan_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Constraints for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD CONSTRAINT `pesanan_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_barang_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_barang_detail`
--
ALTER TABLE `pesanan_barang_detail`
  ADD CONSTRAINT `pesanan_barang_detail_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan_barang` (`id_pesanan`),
  ADD CONSTRAINT `pesanan_barang_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
