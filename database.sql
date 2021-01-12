-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2021 pada 16.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project website`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `Password`) VALUES
(1, 'admin', 'admin', '*01A6717B58FF5C7EAFFF6CB7C96F7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(5) NOT NULL,
  `alamat_costumer` text NOT NULL,
  `telp_costumer` varchar(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `alamat_costumer`, `telp_costumer`, `username`, `email`, `password`) VALUES
(0, '-', '-', 'admin', 'admin@admin.com', '$2y$10$YHZHWmmMZcf52vWQ1XzIEe2rK3ytMWalWfIgkrO1ulddO.miyFMJm'),
(1, 'tarutung', '06313123', 'calvin', 'calvin@gmail.com', '$2y$10$YRjKr7MactkJ1DTtFuHTNOiKcYJW/8XyXEJlhj4EvI0ajVktYyz36'),
(4, 'mail', '00011', 'mail', 'mail@gmail.com', '$2y$10$FedXzoaA1nzdzihxA3XBnezZxrUCiEJuhQ.MMqPv4fahdAZY6iZNi'),
(9, 'aaad', '121', 'a', 'a@gmail.com', '$2y$10$HnHU/RfYNh58QJqddDdAJ.68J0FkRfI9kfsFUsKBR112QuHDkNfz.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(5) NOT NULL,
  `nama_motor` varchar(40) NOT NULL,
  `stok_motor` int(5) NOT NULL,
  `harga_motor` decimal(30,0) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_motor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`id_motor`, `nama_motor`, `stok_motor`, `harga_motor`, `id_kategori`, `deskripsi`, `gambar_motor`) VALUES
(37, 'vario', 2, '17000000', 1, 'Tahun : 2017\r\nkondisi : baik\r\nsurat  : lengkap\r\n', 'd.png'),
(38, 'kawasaki w-175', 1, '25000000', 2, 'Tahun : 2018\r\nKondisi : baru\r\n\r\nharga bisa nego', 'a.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(5) NOT NULL,
  `tgl_penjualan` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `id_motor` int(25) NOT NULL,
  `id_costumer` int(10) NOT NULL,
  `tgl_pemesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pemesanan`, `id_motor`, `id_costumer`, `tgl_pemesanan`) VALUES
(3, 37, 1, '2021-01-11 15:38:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_motor` (`id_motor`),
  ADD KEY `id_costumer` (`id_costumer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`id_costumer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
