-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jun 2020 pada 17.10
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu', 'Sepatu merk all star', 'Pakaian wanita', 300000, 8, 'sepatu.jpg'),
(2, 'Laptop Asus', 'Laptop Asus for Designer', 'Elektronik', 25700000, 1, 'laptop.jpg'),
(3, 'SmartTV', 'SmartTV Toshiba 2020', 'Elektronik', 10000000, 8, 'tv.jpg'),
(4, 'Handphone', 'Smartphone Oppo 2020', 'Elektronik', 4000000, 9, 'handphone.jpg'),
(13, 'Atasan Wanita', 'gaun terbaru wanita atasan', 'Pakaian Wanita', 75000, 15, 'pakaianwanita.png'),
(14, 'Joging 2765', 'alat olahraga dengan kualitas bagus dan kuat', 'Peralatan Olahraga', 5000000, 5, 'olahraga1.jpg'),
(15, 'Baju anak', 'baju anak nyaman dipakai', 'Pakaian Anak-anak', 15000, 14, 'pakaiananak2.jpg'),
(16, 'sprint', 'alat canggih untuk lari', 'Elektronik', 35000000, 1, 'olahraga2.png'),
(17, 'run elektronik', 'alat canggih untuk lari', 'Elektronik', 15000000, 5, 'olahraga11.jpg'),
(18, 'sprint-e', 'sprint elektronik', 'Elektronik', 30000000, 2, 'olahraga3.jpg'),
(19, 'Celana bagus', 'kain sangat lentur dan berkualitas', 'Pakaian Laki-laki', 250000, 24, 'pakaianpria21.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_brg_keluar` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'kiki yuniar kristiawan', 'Medokan Sawah Timur', '2020-05-31 08:44:21', '2020-06-01 08:44:21'),
(2, 'kiki', 'jakarta', '2020-05-31 08:47:23', '2020-06-01 08:47:23'),
(3, '', '', '2020-05-31 14:12:16', '2020-06-01 14:12:16'),
(4, 'kiki yuniar kristiawan2', 'medokan', '2020-06-05 22:08:53', '2020-06-06 22:08:53'),
(5, 'kiki yuniar kristiawan', 'medokan', '2020-06-09 18:08:06', '2020-06-10 18:08:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `id_kategori` varchar(120) NOT NULL,
  `nama_kategori` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `id_kategori`, `nama_kategori`) VALUES
(5, 'KTG-2020061646 ', 'Elektronik'),
(7, 'KTG-2020061606 ', 'Pakaian Perempuan'),
(8, 'KTG-2020061649 ', 'Pakaian Laki-laki'),
(9, 'KTG-2020061659 ', 'Pakaian Anak-anak'),
(10, 'KTG-2020061615 ', 'Peralatan Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Sepatu', 1, 300000, ''),
(2, 1, 2, 'Laptop Asus', 1, 25700000, ''),
(3, 1, 3, 'SmartTV', 1, 10000000, ''),
(4, 1, 4, 'Handphone', 1, 4000000, ''),
(5, 2, 4, 'Handphone', 1, 4000000, ''),
(6, 3, 1, 'Sepatu', 1, 300000, ''),
(7, 4, 16, 'sprint', 1, 35000000, ''),
(8, 4, 4, 'Handphone', 1, 4000000, ''),
(9, 5, 1, 'Sepatu', 1, 300000, ''),
(10, 5, 15, 'Baju anak', 1, 15000, ''),
(11, 5, 19, 'Celana bagus', 1, 250000, ''),
(12, 5, 18, 'sprint-e', 1, 30000000, ''),
(13, 5, 2, 'Laptop Asus', 2, 25700000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'Admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'kiki yuniar kristiawan', 'kikiyuniark', '123', 2),
(4, 'kiki yuniar kristiawan', 'kolu', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_brg_keluar`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
