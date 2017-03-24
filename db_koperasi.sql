-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2017 at 01:49 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `j_kelamin` char(10) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Aktif',
  `keterangan` text NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `j_kelamin`, `status`, `keterangan`, `tgl_pendaftaran`, `username`, `password`) VALUES
(46, 'Irfan Hardiyanto', 'jln rancabentang Utara no 421', '089614800388', 'Bandung', '1998-04-20', 'Pria', 'Aktif', 'Ganteng', '2017-02-25', 'aditia1231', '93207db25ad357906be2fd0c3f65f3dc'),
(47, 'Rizky Agung', 'jln rancabentang utara', '089238928392', 'Bandung', '2017-02-13', 'Pria', 'Aktif', 'sadsa', '2017-02-26', 'irfan1231', '93207db25ad357906be2fd0c3f65f3dc'),
(48, 'Fadly Akbar', 'jln cigugur tengah', '089238928392', 'Bandung', '2017-02-26', 'Pria', 'Aktif', 'sadasdsa', '2017-02-26', 'fadly1231', '93207db25ad357906be2fd0c3f65f3dc'),
(49, 'ssa', 'sss', 'ssss', 'wwww', '2017-02-23', 'Pria', 'aktif', 'sdsds', '2017-02-28', 'ass', 'saa'),
(50, 'ssdsds', 'sdsds', 'sdsdsd', 'sdsdsds', '2017-02-01', 'Pria', 'aktif', 'sdsdsds', '2017-02-28', 'aditia', 'fa02962f5fb9474dd13bba1c1908681d'),
(51, 'Fadly spasi', 'jln cibereum', '089614800388', 'Bandung', '2017-03-01', 'Pria', 'Aktif', 'aaaaa', '2017-03-01', 'fadly111', '93207db25ad357906be2fd0c3f65f3dc');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(11) NOT NULL,
  `angsuran_ke` int(2) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_angsuran`),
  KEY `id_pinjaman` (`id_pinjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `angsuran_ke`, `tgl_pembayaran`, `tgl_jatuh_tempo`, `besar_angsuran`, `denda`, `jumlah_bayar`, `keterangan`) VALUES
(19, 12, 1, '2017-03-01', '2017-04-08', 90000, 0, 90000, 'sdsds'),
(20, 14, 1, '2017-03-01', '2017-04-08', 90000, 0, 90000, ''),
(21, 14, 2, '2017-03-01', '2017-05-08', 90000, 0, 90000, ''),
(22, 14, 3, '2017-03-01', '2017-06-08', 90000, 0, 90000, ''),
(23, 14, 4, '2017-03-01', '2017-07-08', 90000, 0, 90000, ''),
(24, 14, 5, '2017-03-01', '2017-08-08', 90000, 0, 90000, ''),
(25, 17, 1, '2017-03-01', '2017-04-08', 22500, 0, 22500, ''),
(26, 17, 2, '2017-03-01', '2017-05-08', 22500, 0, 22500, ''),
(27, 17, 3, '2017-03-01', '2017-06-08', 22500, 0, 22500, ''),
(28, 17, 4, '2017-03-01', '2017-07-08', 22500, 0, 22500, ''),
(29, 17, 5, '2017-03-01', '2017-08-08', 22500, 0, 22500, ''),
(30, 18, 1, '2017-03-01', '2017-04-08', 22500, 0, 22500, ''),
(31, 18, 2, '2017-03-01', '2017-05-08', 22500, 0, 22500, ''),
(32, 18, 3, '2017-03-01', '2017-06-08', 22500, 0, 22500, ''),
(33, 18, 4, '2017-03-01', '2017-07-08', 22500, 0, 22500, ''),
(34, 18, 5, '2017-03-01', '2017-08-08', 22500, 0, 22500, ''),
(35, 20, 1, '2017-03-01', '2017-04-08', 45000, 0, 45000, ''),
(36, 20, 2, '2017-03-01', '2017-05-08', 45000, 0, 45000, ''),
(37, 20, 3, '2017-03-01', '2017-06-08', 45000, 0, 45000, ''),
(38, 20, 4, '2017-03-01', '2017-07-08', 45000, 0, 45000, ''),
(39, 20, 5, '2017-03-01', '2017-08-08', 45000, 0, 45000, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cek_anggota_belum_lunas`
--
CREATE TABLE IF NOT EXISTS `cek_anggota_belum_lunas` (
`belum_lunas` bigint(21)
,`id_anggota` int(11)
,`nama` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `cek_anggota_lunas`
--
CREATE TABLE IF NOT EXISTS `cek_anggota_lunas` (
`lunas` bigint(21)
,`id_anggota` int(11)
,`nama` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

CREATE TABLE IF NOT EXISTS `detail_angsuran` (
  `id_detail_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `id_angsuran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_detail_angsuran`),
  UNIQUE KEY `id_angsuran` (`id_angsuran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE IF NOT EXISTS `jenis_simpanan` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_simpanan` varchar(255) NOT NULL,
  `besar_simpanan` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jenis`, `nama_simpanan`, `besar_simpanan`, `type`, `keterangan`) VALUES
(1, 'Wajib', '50000', 'Bulanan', 'Pembayaran dilakukan setiap bulan'),
(2, 'Pokok', '100000', 'Sekali', 'Bayar sekali waktu pendaftaran sebagai anggota'),
(3, 'Sukarela', '10000', 'Minimal', 'Pembayaran yang dilakukan secara sukarela');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

CREATE TABLE IF NOT EXISTS `kategori_pinjaman` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `jumlah_bulan` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori_pinjaman`
--

INSERT INTO `kategori_pinjaman` (`id_kategori`, `nama_kategori`, `jumlah_bulan`) VALUES
(1, 'Pinjaman 5 Bulan', 5),
(2, 'Pinjaman 10 Bulan', 10),
(3, 'Pinjaman 20 Bulan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `j_kelamin` varchar(10) NOT NULL,
  `keterangan` text,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `alamat`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `j_kelamin`, `keterangan`, `username`, `password`) VALUES
(7, 'aditia', 'sjdksjdskdjk	', '028392382993829', 'Bandung', '2017-02-09', 'pria', 'asdsadsada', 'aditia', '486b6c6b267bc61677367eb6b6458764'),
(8, 'aditia', 'sadjkasjdskjdska', '078237823782', 'bandung', '1998-04-01', 'pria', 'sadasdsdsadsadsa', 'aditia', '486b6c6b267bc61677367eb6b6458764'),
(9, 'nano', 'nano', '089283923', 'bandung', '1998-04-01', 'pria', NULL, 'nano', '1657ec96792937f71c20c9e1bdc2300f'),
(10, 'sdsadsa', 'sadsadsa', 'asdsadsa', 'sadsadsa', '2017-02-14', 'Pria', 'sadsadsa', 'sadsada', 'sadsadsa'),
(11, 'koko', 'koko', '0892323', 'sdsds', '2017-02-27', 'Pria', 'sadsada', 'koko', 'sdsd'),
(12, 'sadasda', 'sadsadas', 'sadsadas', 'sadsa', '2017-02-08', 'Pria', 'sadsadsa', 'sadas', 'sadsad'),
(13, 'asdsadsa', 'asdsadsa', 'sadsadsa', 'sdasdsa', '2017-02-16', 'Pria', 'sdsds', 'sadsadsa', '74d508df62b8e9fdd023260cbb5837ef'),
(14, 'sdsds', 'sdsdsd', 'sdsdsd', 'sdsds', '2017-02-09', 'Pria', 'sdsdsdsd', 'sadsd', '718b6dd54c8d1d3ad19eb99cb12f13e2'),
(15, 'aditia', 'sadsadas', '072938232', 'sdsds', '2017-02-15', 'Pria', 'sdsds', 'adit12', '93207db25ad357906be2fd0c3f65f3dc'),
(16, 'sdsds', 'sdsds', 'sdsds', 'sdsdsd', '2017-02-10', 'Pria', 'sdsds', 'sdas', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'Aditia Pratama', 'asdsadas', '0892322112', 'Bandung', '2017-03-09', 'Pria', 'sadasdas', 'aditiapratama', '93207db25ad357906be2fd0c3f65f3dc');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `besar_pinjaman` double NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_acc_pengajuan` date NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `bunga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pinjaman`),
  KEY `id_anggota` (`id_anggota`),
  KEY `pinjaman_ibfk_2` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_kategori`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan`, `tgl_acc_pengajuan`, `tgl_pinjam`, `tgl_pelunasan`, `status`, `bunga`, `keterangan`) VALUES
(12, 1, 46, 400000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Lunas', 10000, 'asdas'),
(14, 1, 46, 400000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Lunas', 10000, 'asdsad'),
(17, 1, 46, 100000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Lunas', 2500, ''),
(18, 1, 47, 100000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Lunas', 2500, ''),
(19, 1, 48, 100000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Acc', 2500, ''),
(20, 1, 48, 200000, '2017-03-01', '2017-03-01', '2017-03-08', '2017-08-08', 'Lunas', 5000, '');

-- --------------------------------------------------------

--
-- Table structure for table `shu`
--

CREATE TABLE IF NOT EXISTS `shu` (
  `id_shu` int(11) NOT NULL AUTO_INCREMENT,
  `id_angsuran` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `besar_shu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_shu`),
  KEY `id_angsuran` (`id_angsuran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `shu`
--

INSERT INTO `shu` (`id_shu`, `id_angsuran`, `tgl_masuk`, `besar_shu`, `keterangan`) VALUES
(10, 19, '2017-03-01', '10000', ''),
(11, 20, '2017-03-01', '10000', ''),
(12, 21, '2017-03-01', '10000', ''),
(13, 22, '2017-03-01', '10000', ''),
(14, 23, '2017-03-01', '10000', ''),
(15, 24, '2017-03-01', '10000', ''),
(16, 25, '2017-03-01', '2500', ''),
(17, 26, '2017-03-01', '2500', ''),
(18, 27, '2017-03-01', '2500', ''),
(19, 28, '2017-03-01', '2500', ''),
(20, 29, '2017-03-01', '2500', ''),
(21, 30, '2017-03-01', '2500', ''),
(22, 31, '2017-03-01', '2500', ''),
(23, 32, '2017-03-01', '2500', ''),
(24, 33, '2017-03-01', '2500', ''),
(25, 34, '2017-03-01', '2500', ''),
(26, 35, '2017-03-01', '5000', ''),
(27, 36, '2017-03-01', '5000', ''),
(28, 37, '2017-03-01', '5000', ''),
(29, 38, '2017-03-01', '5000', ''),
(30, 39, '2017-03-01', '5000', '');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE IF NOT EXISTS `simpanan` (
  `id_simpan` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `besar_simpanan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_simpan`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpan`, `id_anggota`, `tgl_simpanan`, `id_jenis`, `besar_simpanan`, `keterangan`, `bulan`, `tahun`) VALUES
(14, 46, '2017-02-25', 2, 50000, 'Pembayaran saat mendaftar', 2, 2017),
(15, 46, '2017-02-25', 1, 50000, 'Bayar', 3, 2017),
(16, 47, '2017-02-26', 2, 50000, 'Pembayaran saat mendaftar', 2, 2017),
(17, 47, '2017-02-26', 3, 30000, '', 3, 2017),
(18, 48, '2017-02-26', 2, 50000, 'Pembayaran saat mendaftar', 2, 2017),
(19, 46, '2017-02-26', 1, 50000, 'Bayar bulan ke 3', 5, 2017),
(20, 46, '2017-02-26', 1, 50000, 'bayar', 7, 2017),
(21, 46, '2017-02-26', 1, 50000, 'bayar 2x', 8, 2017),
(22, 48, '2017-02-26', 1, 50000, '', 2, 2017),
(23, 46, '2017-03-01', 1, 50000, 'dss', 9, 2017),
(24, 51, '2017-03-01', 2, 50000, 'Pembayaran saat mendaftar', 3, 2017),
(25, 51, '2017-03-01', 1, 50000, '', 3, 2017),
(26, 51, '2017-03-01', 3, 20000, '', 3, 2017),
(27, 46, '2017-03-01', 1, 0, '', 10, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `super_petugas`
--

CREATE TABLE IF NOT EXISTS `super_petugas` (
  `id_super_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_super_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `super_petugas`
--

INSERT INTO `super_petugas` (`id_super_petugas`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure for view `cek_anggota_belum_lunas`
--
DROP TABLE IF EXISTS `cek_anggota_belum_lunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cek_anggota_belum_lunas` AS select count(if(((`pinjaman`.`status` = 'Acc') or (`pinjaman`.`status` = 'Terima')),1,NULL)) AS `belum_lunas`,`anggota`.`id_anggota` AS `id_anggota`,`anggota`.`nama` AS `nama` from (`anggota` left join `pinjaman` on((`anggota`.`id_anggota` = `pinjaman`.`id_anggota`))) group by `pinjaman`.`id_anggota`;

-- --------------------------------------------------------

--
-- Structure for view `cek_anggota_lunas`
--
DROP TABLE IF EXISTS `cek_anggota_lunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cek_anggota_lunas` AS select count(if((`pinjaman`.`status` = 'Lunas'),1,NULL)) AS `lunas`,`anggota`.`id_anggota` AS `id_anggota`,`anggota`.`nama` AS `nama` from (`anggota` left join `pinjaman` on((`anggota`.`id_anggota` = `pinjaman`.`id_anggota`))) group by `pinjaman`.`id_anggota`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`);

--
-- Constraints for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD CONSTRAINT `detail_angsuran_ibfk_1` FOREIGN KEY (`id_angsuran`) REFERENCES `angsuran` (`id_angsuran`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_pinjaman` (`id_kategori`);

--
-- Constraints for table `shu`
--
ALTER TABLE `shu`
  ADD CONSTRAINT `shu_ibfk_1` FOREIGN KEY (`id_angsuran`) REFERENCES `angsuran` (`id_angsuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `simpanan_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_simpanan` (`id_jenis`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
