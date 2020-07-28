-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 07:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `nama_custom` varchar(100) NOT NULL,
  `foto_custom` varchar(100) NOT NULL,
  `deskripsi_custom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id_custom`, `nama_custom`, `foto_custom`, `deskripsi_custom`) VALUES
(1, 'Buttercream', 'buttercream.jpg', 'Rich but not super sweet in which our vanilla buttercream icing lends itself well to the art of piping. Buttercream has a rustic, homemade feeling.'),
(2, 'Fondant', 'fondant.jpg', 'With a smooth, gum texture and slight marshmallow flavor, fondant is highly malleable. This icing creates the perception of depth, and even allows for complex inlay techniques.'),
(3, 'Frosting', 'frosting1.jpg', 'A beautiful coating the outside of cake. It has a buttercream-like texture and a more buttery taste. Very fantastic!');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `id_detail_keranjang` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flavor`
--

CREATE TABLE `flavor` (
  `id_flavor` int(11) NOT NULL,
  `nama_flavor` varchar(100) NOT NULL,
  `harga_flavor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flavor`
--

INSERT INTO `flavor` (`id_flavor`, `nama_flavor`, `harga_flavor`) VALUES
(1, 'Vanilla', 10000),
(2, 'Chocolate', 12000),
(3, 'Marble', 15000),
(4, 'Red Velvet', 20000),
(5, 'Mocha', 12000),
(6, 'Banana Chocolate Cheap', 15000),
(7, 'Strawberries Creamy', 25000),
(8, 'Lemon and Raspberry', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `icing`
--

CREATE TABLE `icing` (
  `id_icing` int(11) NOT NULL,
  `nama_icing` varchar(100) NOT NULL,
  `harga_icing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icing`
--

INSERT INTO `icing` (`id_icing`, `nama_icing`, `harga_icing`) VALUES
(1, 'Vanilla Buttercream', 20000),
(2, 'Chocolate Buttercream', 25000),
(3, 'Marshmallow Fondant', 30000),
(4, 'Bubblegum Fondant', 35000),
(5, 'Vanila Frosting', 22000),
(6, 'Chocolate Frosting', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `foto_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(1, 'Regular Cakes', 'cake4.jpg'),
(2, 'Praline', 'pralin.jpg'),
(3, 'Snack', 'snack2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `nama_news` varchar(100) NOT NULL,
  `foto_news` varchar(100) NOT NULL,
  `deskripsi_news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `nama_news`, `foto_news`, `deskripsi_news`) VALUES
(1, 'New Product', 'b10.jpg', '							lets try \r\n						'),
(2, 'Our New Category', 'b11.jpg', 'Cupcake'),
(3, 'Next New Location', 'b8.jpg', 'Coming Soon'),
(4, 'Doorprize', 'b3.jpg', '																												Wait It \r\n						 \r\n						 \r\n						 \r\n						');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'No Delivery Cost', 0),
(2, 'Perak', 40000),
(3, 'Darmo', 20000),
(4, 'Kusuma Bangsa', 40000),
(5, 'Kenjeran', 35000),
(6, 'Gubeng', 30000),
(7, 'Rungkut', 30000),
(8, 'Sawahan ', 25000),
(10, 'Madura', 40000),
(11, 'Basuki Rahmat', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(0, 'Admin@gmail.com', 'admin', 'Admin', '0000000000', 'xxxxxxxxxxxxx'),
(1, 'Budi@gmail.com', 'budi', 'Budi', '0123456789', 'Jl. A Yani'),
(2, 'Anton@gmail.com', 'anton', 'Anton ', '08174236985', 'Jl. Kutisari 10'),
(3, 'Ani@gmail.com', 'ani', 'Ani Lestari', '08123456789', 'Jl. Permai 1'),
(4, 'Dewi@gmail.com', 'dewi', 'Dewi Sari', '08174236985', 'Jl. Timur 1'),
(7, 'Arif@gmail.com', 'arif', 'Arif', '0258741963', 'Jl. Undaan Wetan '),
(8, 'Ayu@gmail.com', 'ayu', 'Ayu', '0789456123', 'Jl. Manyar 10'),
(12, 'Joko@gmail.com', 'joko', 'Joko', '0147852369', 'Jl. Balai Kota 10 '),
(13, 'Hadi@gmail.com', 'hadi', 'Hadi', '025879456123', 'Jl. Timur 1 Blok A'),
(14, 'Jack@gmail.com', 'jack', 'Jack', '01234974165', 'Jl. Permai 20'),
(15, 'morgango@gmail.com', 'morgan', 'Morgan', '0303030303', 'pondok indah');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `foto_nota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_tujuan`, `status_pembelian`, `foto_nota`) VALUES
(2, 1, 1, '2018-05-29', 115000, '', 0, '', 'Pending', ''),
(3, 1, 2, '2018-05-28', 155000, '', 0, '', 'Pending', ''),
(4, 1, 2, '2018-05-28', 255000, '', 0, '', 'Pending', ''),
(5, 2, 2, '2018-05-28', 165000, 'Perak', 40000, '', 'Pending', ''),
(6, 1, 1, '2018-05-28', 85000, 'Darmo', 20000, 'Test', 'Pending', ''),
(7, 1, 1, '2018-05-28', 95000, 'Tidak Ongkir', 0, '', 'Pending', ''),
(8, 4, 2, '2018-05-28', 335000, 'Perak', 40000, 'Jalan Perak Barat Blok 5 no 7a (kode pos 53421)', 'Pending', ''),
(9, 6, 3, '2018-05-29', 1695000, 'Darmo', 20000, 'Jl. UKP B11', 'Pending', ''),
(10, 1, 2, '2018-05-29', 110000, 'Perak', 40000, 'Jl. perak utara', 'Pending', ''),
(11, 1, 2, '2018-05-29', 160000, 'Perak', 40000, 'Jl. Perak Selatan IV no 5', 'Pending', ''),
(12, 8, 3, '2018-05-29', 155000, 'Darmo', 20000, 'Jl. Darmo Utara 30', 'Pending', ''),
(13, 1, 1, '2018-05-30', 115000, 'Tidak Ongkir', 0, 'Jl. A. Yani 10', 'Pending', ''),
(14, 1, 2, '2018-05-30', 255000, 'Perak', 40000, 'Jl. Perak Timur 10', 'Pending', ''),
(15, 0, 2, '2018-05-31', 155000, 'Perak', 40000, 'Jl. UKP', 'Pending', ''),
(16, 0, 3, '2018-05-31', 70000, 'Darmo', 20000, 'Jl. Darmo 12', 'Pending', ''),
(17, 13, 2, '2018-05-31', 190000, 'Perak', 40000, 'Jl. Perak Utara 10', 'Pending', ''),
(18, 13, 3, '2018-05-31', 260000, 'Darmo', 20000, 'Jl. Permai 1', 'Pending', ''),
(19, 13, 1, '2018-06-01', 65000, 'Tidak Ongkir', 0, 'Jl. Basuki Rahmat 10', 'Pending', ''),
(20, 13, 1, '2018-06-02', 155000, 'Tidak Ongkir', 0, 'JL. Darmo 1', 'Pending', ''),
(21, 13, 2, '2018-06-02', 105000, 'Perak', 40000, 'Jl. Perak 10', 'Pending', ''),
(22, 13, 2, '2018-06-02', 3165000, 'Perak', 40000, 'Jl. Kutisari 10', 'Pending', ''),
(23, 8, 2, '2018-06-05', 135000, 'Perak', 40000, 'Jl. Undaan 10', 'Pending', ''),
(24, 12, 2, '2018-06-07', 80000, 'Perak', 40000, 'Jl. Perak 15', 'Accept', 'b7.jpg'),
(25, 12, 2, '2018-06-20', 640000, 'Perak', 40000, 'Alamat sesuai', 'Accept', 'b6.jpg'),
(26, 12, 2, '2018-06-20', 300000, 'Perak', 40000, 'Jl. Perak 20', 'Accept', 'b11.jpg'),
(27, 12, 2, '2018-06-20', 230000, 'Perak', 40000, 'Jl. Perak 10', 'Accept', 'b9.jpg'),
(28, 1, 2, '2018-06-20', 1100000, 'Perak', 40000, 'Jl. Perak 10', 'Pending', ''),
(29, 13, 1, '2018-06-21', 260000, 'No Delivery Cost', 0, 'Jl. darmo 20', 'Pending', ''),
(30, 13, 1, '2018-06-21', 550000, 'No Delivery Cost', 0, 'Jl. Darmo 1', 'Pending', ''),
(31, 12, 2, '2018-06-21', 365000, 'Perak', 40000, 'Jl. Perak 10', 'Pending', ''),
(32, 1, 2, '2018-06-21', 170000, 'Perak', 40000, 'Jl. Perak 10', 'Pending', ''),
(33, 12, 3, '2018-06-21', 190000, 'Darmo', 30000, 'Jl. Darmo 1', 'Pending', ''),
(34, 1, 2, '2018-07-03', 440000, 'Perak', 40000, 'Jl. Perak VII', 'Pending', ''),
(35, 1, 3, '2018-07-03', 270000, 'Darmo', 20000, 'Jl. Darmo Barat 10', 'Pending', ''),
(36, 8, 3, '2018-07-03', 495000, 'Darmo', 20000, 'Jl. Darmo 20', 'Pending', ''),
(37, 1, 1, '2018-07-03', 520000, 'No Delivery Cost', 0, 'Alamat sesuai', 'Pending', ''),
(38, 1, 3, '2018-07-04', 9520000, 'Darmo', 20000, 'Jl. Ahmad Yani', 'Pending', ''),
(39, 12, 10, '2018-07-05', 1190000, 'Madura', 40000, 'Jl. Madura 10', 'Pending', ''),
(40, 15, 1, '2018-07-05', 750000, 'No Delivery Cost', 0, 'anywhere you want', 'Accept', 'b1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `subberat` varchar(100) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(9, 5, 18, 1, 'Cheese Cake', 60000, '600', '600', 60000),
(10, 0, 1, 1, 'Ferrero', 65000, '500', '500', 65000),
(11, 0, 2, 1, 'Lava Cake', 50000, '500', '500', 50000),
(12, 0, 3, 1, 'Choco Cake', 35000, '450', '450', 35000),
(13, 0, 18, 1, 'Cheese Cake', 60000, '600', '600', 60000),
(14, 0, 2, 1, 'Lava Cake', 50000, '500', '500', 50000),
(15, 0, 1, 1, 'Ferrero', 65000, '500', '500', 65000),
(16, 0, 2, 1, 'Lava Cake', 50000, '500', '500', 50000),
(17, 6, 1, 1, 'Ferrero', 65000, '500', '500', 65000),
(18, 7, 3, 1, 'Choco Cake', 35000, '450', '450', 35000),
(19, 7, 18, 1, 'Cheese Cake', 60000, '600', '600', 60000),
(20, 8, 1, 3, 'Ferrero', 65000, '500', '1500', 195000),
(21, 8, 2, 2, 'Lava Cake', 50000, '500', '1000', 100000),
(22, 9, 1, 5, 'Ferrero', 65000, '550', '2750', 325000),
(23, 9, 2, 3, 'Lava Cake', 50000, '500', '1500', 150000),
(24, 9, 18, 20, 'Cheese Cake', 60000, '600', '12000', 1200000),
(25, 10, 3, 2, 'Choco Cake', 35000, '450', '900', 70000),
(26, 11, 3, 2, 'Choco Cake', 35000, '450', '900', 70000),
(27, 11, 20, 1, 'Icebox Cake', 50000, '450', '450', 50000),
(28, 12, 3, 3, 'Choco Cake', 35000, '450', '1350', 105000),
(29, 12, 19, 1, 'Praline 1', 30000, '300', '300', 30000),
(30, 13, 20, 1, 'Icebox Cake', 50000, '450', '450', 50000),
(31, 13, 1, 1, 'Ferrero', 65000, '550', '550', 65000),
(32, 14, 3, 1, 'Choco Cake', 35000, '450', '450', 35000),
(33, 14, 18, 3, 'Irisch Cake', 60000, '600', '1800', 180000),
(34, 15, 1, 1, 'Ferrero', 65000, '550', '550', 65000),
(35, 15, 2, 1, 'Lava Cake', 50000, '500', '500', 50000),
(36, 16, 20, 1, 'Icebox Cake', 50000, '450', '450', 50000),
(37, 17, 19, 5, 'Praline 1', 30000, '300', '1500', 150000),
(38, 18, 26, 2, 'Ethereal cake', 45000, '450', '900', 90000),
(39, 18, 20, 3, 'Icebox Cake', 50000, '450', '1350', 150000),
(40, 19, 29, 2, 'Macaron', 20000, '100', '200', 40000),
(41, 19, 28, 1, 'Sticky Cake', 25000, '100', '100', 25000),
(42, 20, 25, 1, 'Red Velvet Cake', 35000, '350', '350', 35000),
(43, 20, 19, 2, 'Praline 1', 30000, '300', '600', 60000),
(44, 20, 29, 3, 'Macaron', 20000, '100', '300', 60000),
(45, 21, 1, 1, 'Ferrero', 65000, '550', '550', 65000),
(46, 22, 19, 100, 'Praline 1', 30000, '300', '30000', 3000000),
(47, 22, 28, 5, 'Sticky Cake', 25000, '100', '500', 125000),
(48, 23, 1, 1, 'Ferrero', 65000, '550', '550', 65000),
(49, 23, 27, 1, 'Praline 5', 30000, '300', '300', 30000),
(50, 24, 30, 1, 'Snack 1', 20000, '150', '150', 20000),
(51, 24, 32, 1, 'Praline 3', 20000, '50', '50', 20000),
(52, 25, 32, 30, 'Praline 3', 20000, '0', '0', 600000),
(53, 26, 32, 5, 'Praline 3', 20000, '0', '0', 100000),
(54, 26, 2, 2, 'Lava Cake', 50000, '0', '0', 100000),
(55, 26, 19, 2, 'Praline 1', 30000, '0', '0', 60000),
(56, 27, 2, 2, 'Lava Cake', 50000, '0', '0', 100000),
(57, 27, 27, 3, 'Praline 2', 30000, '0', '0', 90000),
(58, 28, 2, 20, 'Lava Cake', 50000, '0', '0', 1000000),
(59, 28, 27, 2, 'Praline 2', 30000, '0', '0', 60000),
(60, 29, 1, 2, 'Ferrero', 65000, 'Family', '0', 130000),
(61, 29, 19, 3, 'Praline 1', 30000, 'Personal', '0', 90000),
(62, 29, 32, 2, 'Praline 3', 20000, 'Personal', '0', 40000),
(63, 30, 27, 3, 'Praline 2', 30000, 'Personal', '0', 90000),
(64, 30, 2, 3, 'Lava Cake', 50000, 'Family', '0', 150000),
(65, 30, 19, 5, 'Praline 1', 30000, 'Personal', '0', 150000),
(66, 30, 33, 5, 'Lolipop', 10000, 'Personal', '0', 50000),
(67, 30, 35, 2, 'Boston Magic Cake', 55000, 'Family', '0', 110000),
(68, 31, 1, 5, 'Ferrero', 65000, 'Family', '0', 325000),
(69, 32, 1, 2, 'Ferrero', 65000, 'Family', '0', 130000),
(70, 33, 27, 2, 'Praline 2', 30000, 'Personal', 'Personal', 60000),
(71, 33, 32, 5, 'Praline 3', 20000, 'Personal', 'Personal', 100000),
(72, 34, 0, 8, 'Sticky Cake', 25000, 'Family', 'Family', 200000),
(73, 34, 0, 4, 'Lava Cake', 50000, 'Family', 'Family', 200000),
(74, 35, 28, 2, 'Sticky Cake', 25000, 'Family', 'Family', 50000),
(75, 35, 2, 4, 'Lava Cake', 50000, 'Family', 'Family', 200000),
(76, 36, 1, 5, 'Ferrero', 65000, 'Family', 'Family', 325000),
(77, 36, 27, 5, 'Praline 2', 30000, 'Personal', 'Personal', 150000),
(78, 37, 1, 8, 'Ferrero', 65000, 'Family', 'Family', 520000),
(79, 38, 1, 100, 'Ferrero', 65000, 'Family', 'Family', 6500000),
(80, 38, 27, 100, 'Praline 2', 30000, 'Personal', 'Personal', 3000000),
(81, 39, 1, 5, 'Ferrero', 65000, 'Family', 'Family', 325000),
(82, 39, 19, 20, 'Praline 1', 30000, 'Personal', 'Personal', 600000),
(83, 39, 41, 5, 'Custom', 45000, '0', '0', 225000),
(84, 40, 27, 25, 'Praline 2', 30000, 'Personal', 'Personal', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `id_kategori`, `rating`) VALUES
(1, 'Ferrero', 65000, 'Family', 'ferrero.jpg', '																																										full chocolate  baru\r\n						 \r\n						 \r\n						 \r\n						 \r\n						 \r\n						', 1, 4),
(2, 'Lava Cake', 50000, 'Family', 'lavacake.jpg', '																																																	lava cake \r\n						 \r\n						 \r\n						 \r\n						 \r\n						 \r\n						 \r\n						', 1, 4),
(3, 'Choco Cake', 35000, 'Family', 'browniescake.jpg', '														Kaya cokelat \r\n						 \r\n						', 1, 5),
(18, 'Irisch Cake', 60000, 'Family', 'irish.jpg', '																																			Kaya Kejunya mantap\r\n						 \r\n						 \r\n						 \r\n						 \r\n						', 1, 4),
(19, 'Praline 1', 30000, 'Personal', 'praline.jpg', '																																										Praline 1 \r\n						 \r\n						 \r\n						 \r\n						 \r\n						 \r\n						', 2, 5),
(20, 'Icebox Cake', 50000, 'Family', 'icebox.jpg', '							Enak \r\n						', 1, 4),
(25, 'Red Velvet Cake', 35000, 'Family', 'redvelvet.jpg', 'Red Velvet enak', 1, 3),
(26, 'Ethereal cake', 45000, 'Family', 'ethereal.jpg', 'Ethereal enak', 1, 4),
(27, 'Praline 2', 30000, 'Personal', 'praline3.jpg', '																					Praline 5 ', 2, 5),
(28, 'Sticky Cake', 25000, 'Family', 'sticky.jpg', '														Kue yang enak polll \r\n						 \r\n						', 1, 4),
(29, 'Macaron', 20000, 'Personal', 'macarons-senza-zucchero.jpg', 'Rasa warna-warni', 3, 5),
(30, 'Snack 1', 20000, 'Personal', 'snek.jpg', '							Snack Baru \r\n						', 3, 4),
(32, 'Praline 3', 20000, 'Personal', 'banana-tartlets-with-mascarpone-cream-praline-wyza-com-au.jpg', 'Praline baru', 2, 4),
(33, 'Lolipop', 10000, 'Personal', 'f9527d6b27283ee6abe28c1e1bc6f02b.jpg', '														Produk baru  \r\n						 \r\n						', 3, 4),
(34, 'Tiramisu', 50000, 'Family', 'tiramisu-edited-26.jpg', '							New Tiramisu \r\n						', 1, 5),
(35, 'Boston Magic Cake', 55000, 'Family', 'Boston-Magic-Cake.jpg', 'New Boston Cake', 1, 5),
(36, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(37, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(38, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(39, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(40, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(41, 'Custom', 45000, '0', 'custom.png', '0', 0, 0),
(42, 'Custom', 62000, '0', 'custom.png', '0', 0, 0),
(43, 'Custom', 65000, '0', 'custom.png', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `id_shape` int(11) NOT NULL,
  `nama_shape` varchar(100) NOT NULL,
  `harga_shape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`id_shape`, `nama_shape`, `harga_shape`) VALUES
(1, 'Round', 10000),
(2, 'Square', 8000),
(4, 'Rectangle', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `nama_size` varchar(100) NOT NULL,
  `harga_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `nama_size`, `harga_size`) VALUES
(1, '6in 6-8 servings', 5000),
(2, '8in 8-14 servings', 6000),
(3, '10in 14-25 servings', 8000),
(4, '12in 25-40 servings', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indexes for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`id_detail_keranjang`);

--
-- Indexes for table `flavor`
--
ALTER TABLE `flavor`
  ADD PRIMARY KEY (`id_flavor`);

--
-- Indexes for table `icing`
--
ALTER TABLE `icing`
  ADD PRIMARY KEY (`id_icing`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`id_shape`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flavor`
--
ALTER TABLE `flavor`
  MODIFY `id_flavor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `icing`
--
ALTER TABLE `icing`
  MODIFY `id_icing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `id_shape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
