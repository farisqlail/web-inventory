-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 05:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_BARANG` varchar(255) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `STOCK_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_SUPPLIER`, `ID_KATEGORI`, `NAMA_BARANG`, `HARGA_BARANG`, `STOCK_BARANG`) VALUES
(1, 2, 1, 'Buku Tulis', 20000, 897),
(2, 1, 1, 'Boneka Kayu Putih', 56000, 65),
(3, 4, 1, 'Merajut Kayu', 56000, 45),
(4, 1, 5, 'Handsanitizer 500 ml', 20000, 20),
(5, 5, 5, 'Sikat Gigi', 26000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_simpan`
--

CREATE TABLE `biaya_simpan` (
  `ID_SIMPAN` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_SIMPAN` date NOT NULL,
  `NILAI_SIMPAN` int(11) NOT NULL,
  `STATUS_SIMPAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `ID_DETAILPEM` int(11) NOT NULL,
  `ID_PEMBELIAN` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `JUMLAH_DETAILPEM` int(11) NOT NULL,
  `HARGA_DETAILPEM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eoq`
--

CREATE TABLE `eoq` (
  `ID_EOQ` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `PERSEN_SIMPAN` int(11) NOT NULL,
  `BIAYA_SIMPAN` int(11) NOT NULL,
  `TANGGAL_EOQ` date NOT NULL,
  `NILAI_EOQ` int(11) NOT NULL,
  `STATUS_EOQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eoq`
--

INSERT INTO `eoq` (`ID_EOQ`, `ID_BARANG`, `PERSEN_SIMPAN`, `BIAYA_SIMPAN`, `TANGGAL_EOQ`, `NILAI_EOQ`, `STATUS_EOQ`) VALUES
(1, 1, 0, 0, '2022-06-19', 10, 0),
(2, 1, 0, 0, '2022-06-19', 12, 0),
(3, 2, 10, 5600, '2022-06-22', 57, 0),
(4, 1, 10, 2000, '2022-06-22', 77, 1),
(5, 2, 10, 5600, '2022-06-24', 57, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_KAR` int(11) NOT NULL,
  `NAMA_KAR` varchar(255) NOT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ALAMAT_KAR` varchar(255) NOT NULL,
  `TLP_KAR` varchar(20) NOT NULL,
  `TGL_LAHIR_KAR` date NOT NULL,
  `JABATAN` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KAR`, `NAMA_KAR`, `EMAIL`, `PASSWORD`, `ALAMAT_KAR`, `TLP_KAR`, `TGL_LAHIR_KAR`, `JABATAN`) VALUES
(1, 'Erga Ivan Saputra', 'erga@gmail.com', 'erga200920', 'jl kri pulau rani d/24', '0895337870699', '2000-09-20', 0),
(2, 'Fabian Daffa Mahendra', 'daffa@gmail.com', 'daffa123', 'jl. Bratajaya IX no 38', '081123456789', '2000-06-14', 1),
(3, 'Budi Sudarsono', 'budi@gmail.com', 'budi123', 'jl masjid agung selatan D 78', '082245691253', '2000-08-18', 2),
(4, 'Erga Test', 'ergatest@gmail.com', 'erga200920', 'jl masjid agung selatan D 78', '081123456789', '2022-06-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Alat Peraga Edukatif'),
(2, 'Elektronik'),
(3, 'Alat Tulis dan Kerja'),
(4, 'Alat Kebutuhan Pendukung'),
(5, 'Alat Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_hari`
--

CREATE TABLE `kebutuhan_hari` (
  `ID_KEBHAR` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_KEBHAR` date NOT NULL,
  `NILAI_KEBHAR` int(11) NOT NULL,
  `STATUS_KEBHAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `ID_KELUAR` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_KAR` int(11) NOT NULL,
  `TANGGAL_KELUAR` date NOT NULL,
  `JML_KELUAR` int(11) NOT NULL,
  `HARGA_BARANG_KELUAR` int(11) NOT NULL,
  `KET_KELUAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`ID_KELUAR`, `ID_BARANG`, `ID_KAR`, `TANGGAL_KELUAR`, `JML_KELUAR`, `HARGA_BARANG_KELUAR`, `KET_KELUAR`) VALUES
(1, 3, 1, '2022-06-08', 30, 0, 'Pengiriman'),
(2, 1, 1, '2022-06-16', 100, 20000, 'Pengiriman'),
(3, 1, 1, '2022-06-16', 100, 20000, 'Pengiriman'),
(4, 1, 1, '2022-06-16', 3, 20000, 'Display'),
(5, 2, 1, '2022-06-16', 3, 56000, 'Display'),
(6, 4, 1, '2022-06-24', 25, 20000, 'Pengiriman');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `ID_MASUK` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `ID_KAR` int(11) NOT NULL,
  `TANGGAL_MASUK` date NOT NULL,
  `JML_BARANG_MSK` int(11) NOT NULL,
  `HARGA_BARANG_MASUK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`ID_MASUK`, `ID_BARANG`, `ID_SUPPLIER`, `ID_KAR`, `TANGGAL_MASUK`, `JML_BARANG_MSK`, `HARGA_BARANG_MASUK`) VALUES
(1, 2, 4, 1, '2022-06-15', 30, 45000),
(2, 3, 4, 1, '2022-06-15', 16, 600000),
(3, 1, 2, 1, '2022-06-15', 10, 30000),
(4, 2, 1, 1, '2022-06-16', 23, 60000),
(5, 1, 2, 1, '2022-06-16', 1000, 6500),
(6, 1, 2, 1, '2022-06-16', 1000, 6500),
(7, 2, 1, 1, '2022-06-24', 45, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `operasi`
--

CREATE TABLE `operasi` (
  `ID_OPERASI` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_OP` date NOT NULL,
  `LEAD_TIME` decimal(10,2) NOT NULL,
  `BIAYA_PEMESANAN` decimal(10,2) NOT NULL,
  `KEBUTUHAN_BARANG_BL` decimal(10,2) NOT NULL,
  `STATUS_OP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operasi`
--

INSERT INTO `operasi` (`ID_OPERASI`, `ID_BARANG`, `TANGGAL_OP`, `LEAD_TIME`, `BIAYA_PEMESANAN`, `KEBUTUHAN_BARANG_BL`, `STATUS_OP`) VALUES
(1, 1, '2022-06-17', '16.00', '15.00', '160.00', 0),
(3, 1, '2022-06-17', '10.00', '130000.00', '543.00', 1),
(4, 2, '2022-06-20', '12.00', '200000.00', '540.00', 1),
(5, 4, '2022-06-24', '15.00', '0.04', '540.00', 0),
(6, 4, '2022-06-24', '14.00', '56000.00', '450.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `ID_PEMBELIAN` int(11) NOT NULL,
  `TANGGAL_PEMBELIAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rop`
--

CREATE TABLE `rop` (
  `ID_ROP` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_ROP` date NOT NULL,
  `NILAI_ROP` int(11) NOT NULL,
  `STATUS_ROP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rop`
--

INSERT INTO `rop` (`ID_ROP`, `ID_BARANG`, `TANGGAL_ROP`, `NILAI_ROP`, `STATUS_ROP`) VALUES
(1, 1, '2022-06-19', 12, 0),
(2, 1, '2022-06-19', 10, 0),
(3, 2, '2022-06-22', 581, 1),
(4, 1, '2022-06-24', 603, 1);

-- --------------------------------------------------------

--
-- Table structure for table `safety_factor`
--

CREATE TABLE `safety_factor` (
  `ID_SAFETY` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_SAFE` date NOT NULL,
  `NILAI_SAFE` decimal(10,2) NOT NULL,
  `STATUS_SAFE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safety_factor`
--

INSERT INTO `safety_factor` (`ID_SAFETY`, `ID_BARANG`, `TANGGAL_SAFE`, `NILAI_SAFE`, `STATUS_SAFE`) VALUES
(1, 2, '2022-06-16', '13.00', 0),
(3, 2, '2022-06-16', '13.00', 0),
(4, 1, '2022-06-17', '13.00', 0),
(5, 1, '2022-06-17', '10.20', 1),
(6, 3, '2022-06-24', '2.80', 0),
(7, 2, '2022-06-24', '1.20', 1),
(8, 3, '2022-06-24', '1.20', 0),
(9, 3, '2022-06-24', '1.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `safety_stock`
--

CREATE TABLE `safety_stock` (
  `ID_SS` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `TANGGAL_SS` date NOT NULL,
  `NILAI_STANDARD` int(11) NOT NULL,
  `NILAI_SS` int(11) NOT NULL,
  `STATUS_SS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safety_stock`
--

INSERT INTO `safety_stock` (`ID_SS`, `ID_BARANG`, `TANGGAL_SS`, `NILAI_STANDARD`, `NILAI_SS`, `STATUS_SS`) VALUES
(1, 1, '2022-06-19', 0, 20, 0),
(2, 1, '2022-06-19', 0, 12, 0),
(3, 2, '2022-06-20', 0, 41, 0),
(4, 2, '2022-06-22', 540, 149, 0),
(5, 2, '2022-06-22', 540, 149, 0),
(6, 1, '2022-06-23', 543, 150, 1),
(7, 2, '2022-06-24', 540, 149, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_SUPPLIER` varchar(255) NOT NULL,
  `ALAMAT_SUPPLIER` varchar(255) NOT NULL,
  `TLP_SUPPLIER` varchar(20) NOT NULL,
  `KOTA_SUPPLIER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `TLP_SUPPLIER`, `KOTA_SUPPLIER`) VALUES
(1, 'PT. Basuki Mitra Sukses', 'Basuki Ramat Barat 35A No. 657', '0895337870699', 'Surabaya'),
(2, 'CV Keke Saputra', 'Jl. Kri Pulau Rani D/24', '0895337870699', 'Surabaya'),
(4, 'CV Vanbi Saputra', 'Jl. Kri Pulau Rani D/24', '0895337870699', 'surabaya'),
(5, 'PT Bintang Sejahtera', 'Mojokerto Selatan no 18', '0821456947', 'Mojokerto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_BARANG_MEMBAWAHI_SUPPLIER` (`ID_SUPPLIER`),
  ADD KEY `FK_BARANG_MEMPUNYAI_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `biaya_simpan`
--
ALTER TABLE `biaya_simpan`
  ADD PRIMARY KEY (`ID_SIMPAN`),
  ADD KEY `FK_BIAYA_SI_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`ID_DETAILPEM`),
  ADD KEY `FK_DETAIL_P_MEMPUNYAI_PEMBELIA` (`ID_PEMBELIAN`),
  ADD KEY `FK_DETAIL_P_TERDAFTAR_BARANG` (`ID_BARANG`);

--
-- Indexes for table `eoq`
--
ALTER TABLE `eoq`
  ADD PRIMARY KEY (`ID_EOQ`),
  ADD KEY `FK_EOQ_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KAR`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kebutuhan_hari`
--
ALTER TABLE `kebutuhan_hari`
  ADD PRIMARY KEY (`ID_KEBHAR`),
  ADD KEY `FK_KEBUTUHA_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`ID_KELUAR`),
  ADD KEY `FK_KELUAR_BARANG_KE_BARANG` (`ID_BARANG`),
  ADD KEY `FK_KELUAR_MENGELOLA_KARYAWAN` (`ID_KAR`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`ID_MASUK`),
  ADD KEY `FK_MASUK_BARANG_MA_BARANG` (`ID_BARANG`),
  ADD KEY `FK_MASUK_MENGELOLA_KARYAWAN` (`ID_KAR`),
  ADD KEY `FK_MASUK_TERDAFTAR_SUPPLIER` (`ID_SUPPLIER`);

--
-- Indexes for table `operasi`
--
ALTER TABLE `operasi`
  ADD PRIMARY KEY (`ID_OPERASI`),
  ADD KEY `FK_OPERASI_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`ID_PEMBELIAN`);

--
-- Indexes for table `rop`
--
ALTER TABLE `rop`
  ADD PRIMARY KEY (`ID_ROP`),
  ADD KEY `FK_ROP_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `safety_factor`
--
ALTER TABLE `safety_factor`
  ADD PRIMARY KEY (`ID_SAFETY`),
  ADD KEY `FK_SAFETY_F_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `safety_stock`
--
ALTER TABLE `safety_stock`
  ADD PRIMARY KEY (`ID_SS`),
  ADD KEY `FK_SAFETY_S_MEMPUNYAI_BARANG` (`ID_BARANG`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `biaya_simpan`
--
ALTER TABLE `biaya_simpan`
  MODIFY `ID_SIMPAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `ID_DETAILPEM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eoq`
--
ALTER TABLE `eoq`
  MODIFY `ID_EOQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_KAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kebutuhan_hari`
--
ALTER TABLE `kebutuhan_hari`
  MODIFY `ID_KEBHAR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `ID_KELUAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `ID_MASUK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `operasi`
--
ALTER TABLE `operasi`
  MODIFY `ID_OPERASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `ID_PEMBELIAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rop`
--
ALTER TABLE `rop`
  MODIFY `ID_ROP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `safety_factor`
--
ALTER TABLE `safety_factor`
  MODIFY `ID_SAFETY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `safety_stock`
--
ALTER TABLE `safety_stock`
  MODIFY `ID_SS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_BARANG_MEMBAWAHI_SUPPLIER` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`),
  ADD CONSTRAINT `FK_BARANG_MEMPUNYAI_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `biaya_simpan`
--
ALTER TABLE `biaya_simpan`
  ADD CONSTRAINT `FK_BIAYA_SI_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `FK_DETAIL_P_MEMPUNYAI_PEMBELIA` FOREIGN KEY (`ID_PEMBELIAN`) REFERENCES `pembelian` (`ID_PEMBELIAN`),
  ADD CONSTRAINT `FK_DETAIL_P_TERDAFTAR_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `eoq`
--
ALTER TABLE `eoq`
  ADD CONSTRAINT `FK_EOQ_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `kebutuhan_hari`
--
ALTER TABLE `kebutuhan_hari`
  ADD CONSTRAINT `FK_KEBUTUHA_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `FK_KELUAR_BARANG_KE_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_KELUAR_MENGELOLA_KARYAWAN` FOREIGN KEY (`ID_KAR`) REFERENCES `karyawan` (`ID_KAR`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `FK_MASUK_BARANG_MA_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_MASUK_MENGELOLA_KARYAWAN` FOREIGN KEY (`ID_KAR`) REFERENCES `karyawan` (`ID_KAR`),
  ADD CONSTRAINT `FK_MASUK_TERDAFTAR_SUPPLIER` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`);

--
-- Constraints for table `operasi`
--
ALTER TABLE `operasi`
  ADD CONSTRAINT `FK_OPERASI_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `rop`
--
ALTER TABLE `rop`
  ADD CONSTRAINT `FK_ROP_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `safety_factor`
--
ALTER TABLE `safety_factor`
  ADD CONSTRAINT `FK_SAFETY_F_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `safety_stock`
--
ALTER TABLE `safety_stock`
  ADD CONSTRAINT `FK_SAFETY_S_MEMPUNYAI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
