-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2024 pada 04.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team1_itdim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` int(11) NOT NULL,
  `idpengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `keterangan`, `satuan`, `idpengguna`) VALUES
(1, 'HP', 'Barang Elektronik', 3000000, 1),
(2, 'TV', 'Barang Elektronik', 8000000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakakses`
--

CREATE TABLE `hakakses` (
  `idakses` int(11) NOT NULL,
  `namaakses` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hakakses`
--

INSERT INTO `hakakses` (`idakses`, `namaakses`, `keterangan`) VALUES
(1, 'Budi', 'Admin01'),
(2, 'Sari', 'Admin02'),
(3, 'Riri', 'Finance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(255) NOT NULL,
  `alamatpelanggan` text NOT NULL,
  `notelppelanggan` varchar(255) NOT NULL,
  `emailpelanggan` varchar(255) NOT NULL,
  `idpenjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `alamatpelanggan`, `notelppelanggan`, `emailpelanggan`, `idpenjualan`) VALUES
(1, 'Sasi', 'Bandung', '0862-1987-0987', 'sasi@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `jumlahpembelian` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `jumlahpembelian`, `hargabeli`, `idbarang`) VALUES
(1, 10, 50000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `namapengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(255) NOT NULL,
  `nohp` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `idakses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `password`, `namadepan`, `namabelakang`, `nohp`, `alamat`, `idakses`) VALUES
(1, 'Admin01', '12345', 'Admin', '01', 2147483647, 'Jakarta', 1),
(2, 'Admin02', '12345', 'Admin', '02', 2147483647, 'Jakarta', 2),
(3, 'Finance', '12345', 'Finance', '', 2147483647, 'Jakarta', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `idpenjualan` int(11) NOT NULL,
  `jumlahpenjualan` int(11) NOT NULL,
  `hargajual` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`idpenjualan`, `jumlahpenjualan`, `hargajual`, `idbarang`) VALUES
(1, 5, 15000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `namasupplier` varchar(255) NOT NULL,
  `alamatsupplier` text NOT NULL,
  `notelpsupplier` varchar(255) NOT NULL,
  `emailsupplier` varchar(255) NOT NULL,
  `idbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `namasupplier`, `alamatsupplier`, `notelpsupplier`, `emailsupplier`, `idbarang`) VALUES
(1, 'CV Intan', 'Tangerang', '0411-0879', 'intan@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indeks untuk tabel `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`idakses`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`),
  ADD KEY `idpenjualan` (`idpenjualan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD KEY `idakses` (`idakses`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`idpenjualan`) REFERENCES `penjualan` (`idpenjualan`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idakses`) REFERENCES `hakakses` (`idakses`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`);

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
