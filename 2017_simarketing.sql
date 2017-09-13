-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2017 at 01:12 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2017_simarketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `smkt_booking`
--

CREATE TABLE `smkt_booking` (
  `booking_id` int(15) NOT NULL,
  `konsumen_fk_id` int(15) NOT NULL,
  `us_fk_id` int(15) NOT NULL,
  `kavling_fk_id` int(15) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `smkt_kavling`
--

CREATE TABLE `smkt_kavling` (
  `kavling_id` int(15) NOT NULL,
  `block` varchar(25) NOT NULL,
  `no_rumah` varchar(25) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smkt_kavling`
--

INSERT INTO `smkt_kavling` (`kavling_id`, `block`, `no_rumah`, `tipe`, `keterangan`) VALUES
(2, 'd', 'sda', 'asdas', 'dasdasdsadas');

-- --------------------------------------------------------

--
-- Table structure for table `smkt_konsumen`
--

CREATE TABLE `smkt_konsumen` (
  `konsumen_id` int(15) NOT NULL,
  `nama_konsumen` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `smkt_users`
--

CREATE TABLE `smkt_users` (
  `us_id` int(11) NOT NULL,
  `us_uname` varchar(16) NOT NULL,
  `us_pass` varchar(200) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `us_name` varchar(100) NOT NULL,
  `us_active` enum('Y','N') DEFAULT 'Y',
  `us_date_create` datetime DEFAULT NULL,
  `us_level` enum('1','2','3') DEFAULT '3' COMMENT '1=superadmin, 2=superuser, 3=user',
  `us_jabatan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smkt_users`
--

INSERT INTO `smkt_users` (`us_id`, `us_uname`, `us_pass`, `us_email`, `us_name`, `us_active`, `us_date_create`, `us_level`, `us_jabatan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(40, 'ronijr31', 'UKqGxovpFAqywi4ltg3TGCa+o+iOcxyBYeZ3pNqYTCG0zSGSv6iejIB21eadkdFvNs6yfjfA0X0BxtC474oTsA==', 'roni jakarianto01@gmail.com', 'Roni Jakarianto', 'Y', '2017-09-12 14:43:16', '2', '', 'L', '083823505329', 'Jl.d.Kertawigenda'),
(42, 'superadmin', '8wdyoNQL6E38KTMCuh20o/+4aRG0eTMasPmmYoubvpQA9llNPtz2d+Y0s4J3v/SY+/lX3y7X6ZKTnHm/cI1uAQ==', 'ptcikalbuanapersada@gmail.com', 'PT. CIKAL BUANA PERSADA', 'Y', '2017-09-13 00:00:00', '1', 'Administrator', 'L', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smkt_kavling`
--
ALTER TABLE `smkt_kavling`
  ADD PRIMARY KEY (`kavling_id`);

--
-- Indexes for table `smkt_konsumen`
--
ALTER TABLE `smkt_konsumen`
  ADD PRIMARY KEY (`konsumen_id`);

--
-- Indexes for table `smkt_users`
--
ALTER TABLE `smkt_users`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smkt_kavling`
--
ALTER TABLE `smkt_kavling`
  MODIFY `kavling_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `smkt_konsumen`
--
ALTER TABLE `smkt_konsumen`
  MODIFY `konsumen_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `smkt_users`
--
ALTER TABLE `smkt_users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
