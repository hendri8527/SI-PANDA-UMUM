-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2021 pada 10.30
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_panda_umum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(141) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id`, `nama_bagian`) VALUES
(1, 'Bagian Pemerintahan dan Otonomi Daerah'),
(2, 'Bagian Hukum'),
(3, 'Bagian Administrasi Kesejahteraan Rakyat'),
(4, 'Bagian Perekonomian'),
(5, 'Bagian Pengadaan Barang/Jasa'),
(6, 'Bagian Umum'),
(7, 'Bagian Organisasi'),
(8, 'Bagian Hubungan Masyarakat'),
(9, 'Asisten Pemerintahan dan Kesejahteraan Rakyat'),
(10, 'Asisten Ekonomi dan Pembangunan'),
(11, 'Sekretaris Daerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ga_master_jenis`
--

CREATE TABLE `tbl_ga_master_jenis` (
  `id_ga_master_jenis` int(11) NOT NULL,
  `nama_ga_master_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ga_master_jenis`
--

INSERT INTO `tbl_ga_master_jenis` (`id_ga_master_jenis`, `nama_ga_master_jenis`) VALUES
(1, 'DUMP TRUCK'),
(2, 'WING BOX'),
(3, 'ENGKEL TRONTON'),
(4, 'CDDL NKR 71 LWB'),
(5, 'CDDL NKR 71'),
(6, 'CDD BOX'),
(7, 'MOBIL PENUMPANG'),
(8, 'MOBIL BARANG/BEBAN'),
(9, 'SEPEDA MTR SOLO'),
(10, 'MINIBUS'),
(11, 'LIGHT TRUCK BOX'),
(12, 'PICK UP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ga_master_type`
--

CREATE TABLE `tbl_ga_master_type` (
  `id_ga_master_type` int(11) NOT NULL,
  `nama_ga_master_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ga_master_type`
--

INSERT INTO `tbl_ga_master_type` (`id_ga_master_type`, `nama_ga_master_type`) VALUES
(1, 'FVM'),
(2, 'FVR'),
(3, 'NKR'),
(4, 'FL'),
(5, 'Dyna 110'),
(6, 'Dyna 130'),
(7, 'SANTA FE 2.2 CRDI A/T'),
(8, '318iA/E46/M43'),
(9, 'CWA 260 M'),
(10, 'NEW AVANZA 1.3E M/T'),
(11, 'NEW AVAN 1.3G M/T'),
(12, 'YARIS 1.5 E MT'),
(13, 'VEGA Z R'),
(14, 'XENIA XI-F600RV-GMDFJJ'),
(15, 'NF11B1D MT'),
(16, 'XENIA MATIC-F601RVGQDFJJ'),
(17, 'NF 100 SL - SUPRA FIT'),
(18, 'DYNA SHORT 3.700'),
(19, 'COLT T 120 SS'),
(20, 'KIJANG INNOVA G A/T'),
(21, 'FORTUNER 2.5 G A/T'),
(22, 'PANTHER GRAND TOURING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ga_stnk`
--

CREATE TABLE `tbl_ga_stnk` (
  `id_ga_stnk` int(11) NOT NULL,
  `nomor_registrasi` varchar(25) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tahun_pembuatan` varchar(10) NOT NULL,
  `isi_silinder` varchar(25) NOT NULL,
  `nomor_rangka` varchar(25) NOT NULL,
  `nomor_mesin` varchar(25) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `bahan_bakar` varchar(25) NOT NULL,
  `warna_tnkb` varchar(25) NOT NULL,
  `tahun_registrasi` varchar(10) NOT NULL,
  `nomor_bpkb` varchar(25) NOT NULL,
  `kode_lokasi` varchar(25) NOT NULL,
  `no_urut_pendaftaran` varchar(25) NOT NULL,
  `berlaku_sampai` varchar(25) NOT NULL,
  `status_perpanjang_pajak` int(2) NOT NULL,
  `ga_master_lising_id` int(11) NOT NULL,
  `status_kendaraan` int(2) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `boxsijalak` varchar(25) NOT NULL,
  `nomor_kontrak` varchar(25) NOT NULL,
  `nomor_lambung` varchar(25) NOT NULL,
  `komersil` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL,
  `gambar_kendaraan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ga_stnk`
--

INSERT INTO `tbl_ga_stnk` (`id_ga_stnk`, `nomor_registrasi`, `nama_pemilik`, `nip`, `unit_kerja`, `alamat`, `merk`, `type`, `jenis`, `model`, `tahun_pembuatan`, `isi_silinder`, `nomor_rangka`, `nomor_mesin`, `warna`, `bahan_bakar`, `warna_tnkb`, `tahun_registrasi`, `nomor_bpkb`, `kode_lokasi`, `no_urut_pendaftaran`, `berlaku_sampai`, `status_perpanjang_pajak`, `ga_master_lising_id`, `status_kendaraan`, `lokasi`, `boxsijalak`, `nomor_kontrak`, `nomor_lambung`, `komersil`, `nominal`, `gambar_kendaraan`) VALUES
(189, 'N 12930 BC', 'Afrizal Setyo Wibisono,S.Kom', '196911021990031004', 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'ssdsd', 'AAA', 6, 12, 'SS', '2021', '12', '12323', '12122', 'HITAM', 'SOLAR', '122323', '2018', '1223', '11', '0', '2021-09-01', 0, 0, 1, '0', '', '0', '0', '0', 100000, 'mobil_dinas1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ga_stnk_perpanjangan_pajak`
--

CREATE TABLE `tbl_ga_stnk_perpanjangan_pajak` (
  `id_ga_stnk_perpanjangan_pajak` int(11) NOT NULL,
  `tanggal_perpanjangan_pajak` date NOT NULL,
  `bulan_pajak` date NOT NULL,
  `ga_stnk_id` int(11) NOT NULL,
  `master_login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ga_stnk_perpanjangan_pajak`
--

INSERT INTO `tbl_ga_stnk_perpanjangan_pajak` (`id_ga_stnk_perpanjangan_pajak`, `tanggal_perpanjangan_pajak`, `bulan_pajak`, `ga_stnk_id`, `master_login_id`) VALUES
(1, '2014-09-03', '2014-11-03', 166, 3),
(2, '2014-09-03', '2014-11-03', 165, 3),
(3, '2014-09-03', '2014-11-03', 163, 3),
(4, '2014-09-03', '2014-11-03', 169, 3),
(5, '2014-11-05', '2015-01-05', 142, 3),
(6, '2018-07-13', '2018-09-13', 186, 0),
(7, '2018-07-13', '2018-09-13', 185, 0),
(8, '2018-07-13', '2018-09-13', 184, 0),
(9, '2021-09-11', '2021-11-11', 186, 0),
(10, '2021-09-11', '2021-11-11', 185, 0),
(11, '2021-09-11', '2021-11-11', 184, 0),
(12, '2021-09-11', '2021-11-11', 187, 0),
(13, '2021-09-23', '2021-11-23', 119, 0),
(14, '2021-09-23', '2021-11-23', 188, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nama`, `nip`, `jabatan`, `no_hp`, `alamat`, `email`) VALUES
(1, 'Afrizal Setyo Wibisono,S.Kom', '199512172020121007', 'Ahli Pertama Pengelola Pengadaan Barang dan Jasa', '085853518636', 'JALAN SEMANGKA NO 17 DERMO MULYOAGUNG, DAU MALANG', 'afrizalwibisono681@gmail.com'),
(2, 'Hendri Kusyansah, S.H', '19951217202012008', 'Ahli Hukum', '085853518636', 'JALAN DURIAN NO 20, SURABAYA', 'hendrikusyansah@gmail.com'),
(3, 'Sudis Arrachman, S.E.', '199512172020121001', 'Ahli Pertama LPSE', '085853518635', 'JALAN SUMENEP, NO 12, KAB SUMENEP', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@bewithdhanu.in', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2017-06-19 09:22:53'),
(2, 'manager@bewithdhanu.in', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Manager', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2017-06-19 09:22:29'),
(3, 'employee@bewithdhanu.in', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Employee', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', 1, '2017-06-19 09:23:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ga_master_jenis`
--
ALTER TABLE `tbl_ga_master_jenis`
  ADD PRIMARY KEY (`id_ga_master_jenis`);

--
-- Indeks untuk tabel `tbl_ga_master_type`
--
ALTER TABLE `tbl_ga_master_type`
  ADD PRIMARY KEY (`id_ga_master_type`);

--
-- Indeks untuk tabel `tbl_ga_stnk`
--
ALTER TABLE `tbl_ga_stnk`
  ADD PRIMARY KEY (`id_ga_stnk`);

--
-- Indeks untuk tabel `tbl_ga_stnk_perpanjangan_pajak`
--
ALTER TABLE `tbl_ga_stnk_perpanjangan_pajak`
  ADD PRIMARY KEY (`id_ga_stnk_perpanjangan_pajak`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_ga_master_jenis`
--
ALTER TABLE `tbl_ga_master_jenis`
  MODIFY `id_ga_master_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_ga_master_type`
--
ALTER TABLE `tbl_ga_master_type`
  MODIFY `id_ga_master_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_ga_stnk`
--
ALTER TABLE `tbl_ga_stnk`
  MODIFY `id_ga_stnk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT untuk tabel `tbl_ga_stnk_perpanjangan_pajak`
--
ALTER TABLE `tbl_ga_stnk_perpanjangan_pajak`
  MODIFY `id_ga_stnk_perpanjangan_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
