-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. Mei 2015 jam 23:46
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel_opsimid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_mst_class`
--

CREATE TABLE IF NOT EXISTS `hotel_mst_class` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `hotel_mst_class`
--

INSERT INTO `hotel_mst_class` (`class_id`, `class_name`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(3, 'Suite', 'description of class suite', '2015-03-11 11:52:52', NULL, 1, NULL),
(4, 'President', 'description of class President new', '2015-03-11 12:28:51', '2015-03-11 12:30:52', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_mst_hotels`
--

CREATE TABLE IF NOT EXISTS `hotel_mst_hotels` (
  `hotel_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(5) NOT NULL,
  `state_id` int(5) NOT NULL,
  `city_id` int(5) NOT NULL,
  `hotel_code` varchar(10) DEFAULT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `hotel_type` set('Domestic','Internasional') NOT NULL DEFAULT 'Domestic',
  `star` set('1','2','3','4','5') NOT NULL DEFAULT '1',
  `address` varchar(225) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `hotel_mst_hotels`
--

INSERT INTO `hotel_mst_hotels` (`hotel_id`, `country_id`, `state_id`, `city_id`, `hotel_code`, `hotel_name`, `hotel_type`, `star`, `address`, `contact_person`, `telp`, `email`, `fax`, `state`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(4, 101, 7, 111, '000001', 'Hotel Indonesia', 'Domestic', '1', 'Bunderan H.I', 'Pisto', '1251212', 'sdhhd@gaasn', '25532', 1, '2015-01-07 06:05:34', '2015-03-11 18:13:33', 1, 1),
(7, 101, 14, 203, '000003', 'Dewi', 'Domestic', '3', 'Jl. Dewi Sartika', 'izal', '0267407213', 'izalkira@ymail.com', '407213', 1, '2015-02-02 04:58:29', NULL, 1, NULL),
(8, 101, 12, 161, '000004', 'Hotel Cinta Kasih', 'Domestic', '5', 'jalan sekeloa', 'Ibu Kasih', '0217387837', 'cinta@gmail.com', '0215657', 1, NULL, NULL, NULL, NULL),
(9, 101, 12, 163, '000005', 'Hotel Aura Nusantara', 'Domestic', '4', 'jalan sesukanya', 'Bapak Jarwo', '', 'nusantara@gmail.com', '', NULL, '2015-03-11 02:29:57', NULL, 1, NULL),
(10, 101, 12, 164, '000006', 'Hotel Mirasantika', 'Domestic', '1', 'Jalan Wahid', 'Bpk Pendi', '0261939484', 'mirasantika@yahoo.com', '', 1, '2015-03-12 14:46:58', '2015-03-27 10:09:13', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_mst_hotel_rate`
--

CREATE TABLE IF NOT EXISTS `hotel_mst_hotel_rate` (
  `hotel_rate_id` int(10) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `room_id` int(10) DEFAULT NULL,
  `valid_date_from` date DEFAULT NULL,
  `valid_date_to` date DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `market_type` varchar(100) DEFAULT NULL,
  `include_breakfast` set('YES','NO') DEFAULT NULL,
  `nett_room` double DEFAULT NULL,
  `sell_room` double DEFAULT NULL,
  `nett_breakfast` double DEFAULT NULL,
  `sell_breakfast` double DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`hotel_rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `hotel_mst_hotel_rate`
--

INSERT INTO `hotel_mst_hotel_rate` (`hotel_rate_id`, `hotel_id`, `supplier_id`, `class_id`, `room_id`, `valid_date_from`, `valid_date_to`, `currency`, `market_type`, `include_breakfast`, `nett_room`, `sell_room`, `nett_breakfast`, `sell_breakfast`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(6, 4, 1, 3, 2, '2015-01-15', '2015-01-30', 'IDR', 'Indonesia', 'YES', 850, 900, 50, 55, '2015-01-08 06:04:54', '2015-01-08 09:52:31', 1, 1),
(7, 7, 1, 3, 3, '2015-01-30', '2015-03-01', 'IDR', 'Indonesia', 'YES', 150000, 1600000, 60000, 80000, '2015-01-30 03:04:20', '2015-01-30 04:33:21', 1, 1),
(8, 8, 1, 4, 3, '2015-01-30', '2015-02-28', 'IDR', 'Indonesia', 'YES', 1, 1, 50, 60, '2015-01-30 04:30:13', NULL, 1, NULL),
(12, 7, 2, 4, 2, '2015-02-01', '2015-02-28', 'IDR', 'Indonesia', 'YES', 500000, 600000, 15000, 20000, '2015-02-02 04:59:10', '2015-02-02 04:59:26', 1, 1),
(13, 7, NULL, 4, 3, '2015-03-01', '2015-03-31', 'IDR', 'Indonesia', 'YES', 1000, 1100, 90, 100, '2015-03-12 01:04:27', NULL, 1, NULL),
(14, 7, NULL, 4, 3, '2015-03-01', '2015-03-31', 'IDR', 'Indonesia', 'YES', 1000, 1100, 90, 100, '2015-03-12 01:07:01', NULL, 1, NULL),
(15, 8, 2, 4, 3, '2015-03-01', '2015-03-31', 'USD', 'Foreign', 'YES', 1000, 1100, 90, 100, '2015-03-12 01:07:40', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_mst_room`
--

CREATE TABLE IF NOT EXISTS `hotel_mst_room` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) DEFAULT NULL,
  `description` text,
  `state` int(11) NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `hotel_mst_room`
--

INSERT INTO `hotel_mst_room` (`room_id`, `room_name`, `description`, `state`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(2, 'Single', 'Test', 1, '2015-01-06 07:51:30', NULL, 1, NULL),
(3, 'Double', 'Test', 1, '2015-01-30 03:03:22', NULL, 1, NULL),
(4, 'Deluxe', '', 0, '2015-03-27 09:59:49', '2015-03-27 10:05:41', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_airport`
--

CREATE TABLE IF NOT EXISTS `mst_airport` (
  `airport_id` int(10) NOT NULL AUTO_INCREMENT,
  `initial` varchar(20) NOT NULL,
  `airport_name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`airport_id`,`initial`),
  UNIQUE KEY `airport_id` (`airport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `mst_airport`
--

INSERT INTO `mst_airport` (`airport_id`, `initial`, `airport_name`, `city`, `country_id`, `state`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'CGK', 'Jakarta Cengkareng', 'Jakarta', 101, 1, 'Bandara Cengkareng', '2014-08-02 11:04:30', '2014-08-03 10:09:27', 1, 1),
(2, 'DPS', 'Denpasar', 'Denpasar', 101, 1, 'Denpasar DPS', '2014-08-02 11:05:09', '2014-08-03 10:14:49', 1, 1),
(3, 'BPN', 'Balikpapan', 'Balikpapan', 101, 1, '', '2014-08-02 11:05:38', '2014-08-03 10:14:33', 1, 1),
(4, 'HLM', 'Jakarta Halim', 'Jakarta', 101, 1, '', '2014-08-02 11:06:05', '2014-08-03 10:14:22', 1, 1),
(5, 'PDG', 'Padang', 'Padang', 101, 1, '', '2014-08-02 11:09:43', '2014-08-03 10:14:07', 1, 1),
(6, 'SUB', 'Surabaya', 'Surabaya', 101, 1, '', '2014-08-02 11:10:03', '2014-08-03 10:13:54', 1, 1),
(7, 'KNO', 'Medan Kuala Namu', 'Medan', 101, 1, '', '2014-08-02 11:10:30', '2014-08-03 10:13:41', 1, 1),
(8, 'BDO', 'Bandung', 'Bandung', 101, 1, '', '2014-08-02 11:10:51', '2014-08-03 10:13:29', 1, 1),
(9, 'SIN', 'Singapore', 'Singapore', 101, 1, '', '2014-08-02 11:11:31', '2014-08-03 10:13:14', 1, 1),
(10, 'FUK', 'Fukuoka Japan', 'Fukuoka', 114, 1, '', '2014-08-02 11:12:26', '2014-08-03 10:13:04', 1, 1),
(11, 'NGO', 'Nagoya', 'Nagoya', 114, 1, '', '2014-08-02 11:12:41', '2014-08-03 10:12:44', 1, 1),
(12, 'OKA', 'Naha', 'Okinawa', 114, 1, '', '2014-08-02 11:13:13', '2014-08-03 10:12:27', 1, 1),
(13, 'KIX', 'Kansai', 'Osaka', 114, 1, '', '2014-08-02 11:13:34', '2014-08-03 10:12:10', 1, 1),
(14, 'CTS', 'Shan-Citos', 'Saphoro', 114, 1, '', '2014-08-02 11:15:07', '2014-08-03 10:11:59', 1, 1),
(15, 'HND', 'Haneda', 'Tokyo', 114, 1, '', '2014-08-02 11:16:38', '2014-08-03 10:11:49', 1, 1),
(16, 'NRT', 'Narita', 'Tokyo', 114, 1, '', '2014-08-02 11:16:54', '2014-08-03 10:10:32', 1, 1),
(17, 'ADL', 'Adelaide', 'Adelaide', 13, 1, '', '2014-08-02 11:17:09', '2014-08-03 10:10:42', 1, 1),
(18, 'ASP', 'Alice Spring', 'Alice Spring', 13, 1, '', '2014-08-02 11:17:32', '2014-08-03 10:10:53', 1, 1),
(19, 'BNE', 'Brisbane', 'Brisbane', 13, 1, '', '2014-08-02 11:17:51', '2014-08-03 10:11:15', 1, 1),
(20, 'CNS', 'Cairns', 'Cairns', 13, 1, '', '2014-08-02 11:18:05', '2014-08-03 10:11:24', 1, 1),
(21, 'CFS', 'Coffs Harbour', 'Coffs Harbour', 13, 1, '', '2014-08-02 11:18:28', '2014-08-03 10:11:35', 1, 1),
(22, 'DRW', 'Darwin', 'Darwin', 13, 1, '', '2014-08-02 11:18:45', '2014-08-03 10:10:20', 1, 1),
(23, 'OOL', 'Gold Coast', 'Gold Coast', 13, 1, '', '2014-08-02 11:19:04', '2014-08-03 10:10:06', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_city`
--

CREATE TABLE IF NOT EXISTS `mst_city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) DEFAULT NULL,
  `state_id` int(10) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `mst_state` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=503 ;

--
-- Dumping data untuk tabel `mst_city`
--

INSERT INTO `mst_city` (`city_id`, `city_name`, `state_id`, `country_id`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'Kabupaten Aceh Barat', 1, 101, NULL, NULL, NULL, NULL),
(2, 'Kabupaten Aceh Barat Daya', 1, 101, NULL, NULL, NULL, NULL),
(3, 'Kabupaten Aceh Besar', 1, 101, NULL, NULL, NULL, NULL),
(4, 'Kabupaten Aceh Jaya', 1, 101, NULL, NULL, NULL, NULL),
(5, 'Kabupaten Aceh Selatan', 1, 101, NULL, NULL, NULL, NULL),
(6, 'Kabupaten Aceh Singkil', 1, 101, NULL, NULL, NULL, NULL),
(7, 'Kabupaten Aceh Tamiang', 1, 101, NULL, NULL, NULL, NULL),
(8, 'Kabupaten Aceh Tengah', 1, 101, NULL, NULL, NULL, NULL),
(9, 'Kabupaten Aceh Tenggara', 1, 101, NULL, NULL, NULL, NULL),
(10, 'Kabupaten Aceh Timur', 1, 101, NULL, NULL, NULL, NULL),
(11, 'Kabupaten Aceh Utara', 1, 101, NULL, NULL, NULL, NULL),
(12, 'Kabupaten Bener Meriah', 1, 101, NULL, NULL, NULL, NULL),
(13, 'Kabupaten Bireuen', 1, 101, NULL, NULL, NULL, NULL),
(14, 'Kabupaten Gayo Luwes', 1, 101, NULL, NULL, NULL, NULL),
(15, 'Kabupaten Nagan Raya', 1, 101, NULL, NULL, NULL, NULL),
(16, 'Kabupaten Pidie', 1, 101, NULL, NULL, NULL, NULL),
(17, 'Kabupaten Pidie Jaya', 1, 101, NULL, NULL, NULL, NULL),
(18, 'Kabupaten Simeulue', 1, 101, NULL, NULL, NULL, NULL),
(19, 'Kota Banda Aceh', 1, 101, NULL, NULL, NULL, NULL),
(20, 'Kota Langsa', 1, 101, NULL, NULL, NULL, NULL),
(21, 'Kota Lhokseumawe', 1, 101, NULL, NULL, NULL, NULL),
(22, 'Kota Sabang', 1, 101, NULL, NULL, NULL, NULL),
(23, 'Kota Subulussalam', 1, 101, NULL, NULL, NULL, NULL),
(24, 'Kabupaten Asahan', 2, 101, NULL, NULL, NULL, NULL),
(25, 'Kabupaten Batubara', 2, 101, NULL, NULL, NULL, NULL),
(26, 'Kabupaten Dairi', 2, 101, NULL, NULL, NULL, NULL),
(27, 'Kabupaten Deli Serdang', 2, 101, NULL, NULL, NULL, NULL),
(28, 'Kabupaten Humbang Hasundutan', 2, 101, NULL, NULL, NULL, NULL),
(29, 'Kabupaten Karo', 2, 101, NULL, NULL, NULL, NULL),
(30, 'Kabupaten Labuhan Batu', 2, 101, NULL, NULL, NULL, NULL),
(31, 'Kabupaten Labuhanbatu Selatan', 2, 101, NULL, NULL, NULL, NULL),
(32, 'Kabupaten Labuhanbatu Utara', 2, 101, NULL, NULL, NULL, NULL),
(33, 'Kabupaten Langkat', 2, 101, NULL, NULL, NULL, NULL),
(34, 'Kabupaten Mandailing Natal', 2, 101, NULL, NULL, NULL, NULL),
(35, 'Kabupaten Nias', 2, 101, NULL, NULL, NULL, NULL),
(36, 'Kabupaten Nias Barat', 2, 101, NULL, NULL, NULL, NULL),
(37, 'Kabupaten Nias Selatan', 2, 101, NULL, NULL, NULL, NULL),
(38, 'Kabupaten Nias Utara', 2, 101, NULL, NULL, NULL, NULL),
(39, 'Kabupaten Padang Lawas', 2, 101, NULL, NULL, NULL, NULL),
(40, 'Kabupaten Padang Lawas Utara', 2, 101, NULL, NULL, NULL, NULL),
(41, 'Kabupaten Pakpak Barat', 2, 101, NULL, NULL, NULL, NULL),
(42, 'Kabupaten Samosir', 2, 101, NULL, NULL, NULL, NULL),
(43, 'Kabupaten Serdang Bedagai', 2, 101, NULL, NULL, NULL, NULL),
(44, 'Kabupaten Simalungun', 2, 101, NULL, NULL, NULL, NULL),
(45, 'Kabupaten Tapanuli Selatan', 2, 101, NULL, NULL, NULL, NULL),
(46, 'Kabupaten Tapanuli Tengah', 2, 101, NULL, NULL, NULL, NULL),
(47, 'Kabupaten Tapanuli Utara', 2, 101, NULL, NULL, NULL, NULL),
(48, 'Kabupaten Toba Samosir', 2, 101, NULL, NULL, NULL, NULL),
(49, 'Kota Binjai', 2, 101, NULL, NULL, NULL, NULL),
(50, 'Kota Gunung Sitoli', 2, 101, NULL, NULL, NULL, NULL),
(51, 'Kota Medan', 2, 101, NULL, NULL, NULL, NULL),
(52, 'Kota Padangsidempuan', 2, 101, NULL, NULL, NULL, NULL),
(53, 'Kota Pematang Siantar', 2, 101, NULL, NULL, NULL, NULL),
(54, 'Kota Sibolga', 2, 101, NULL, NULL, NULL, NULL),
(55, 'Kota Tanjung Balai', 2, 101, NULL, NULL, NULL, NULL),
(56, 'Kota Tebing Tinggi', 2, 101, NULL, NULL, NULL, NULL),
(57, 'Kabupaten Agam', 3, 101, NULL, NULL, NULL, NULL),
(58, 'Kabupaten Dharmas Raya', 3, 101, NULL, NULL, NULL, NULL),
(59, 'Kabupaten Kepulauan Mentawai', 3, 101, NULL, NULL, NULL, NULL),
(60, 'Kabupaten Lima Puluh Kota', 3, 101, NULL, NULL, NULL, NULL),
(61, 'Kabupaten Padang Pariaman', 3, 101, NULL, NULL, NULL, NULL),
(62, 'Kabupaten Pasaman', 3, 101, NULL, NULL, NULL, NULL),
(63, 'Kabupaten Pasaman Barat', 3, 101, NULL, NULL, NULL, NULL),
(64, 'Kabupaten Pesisir Selatan', 3, 101, NULL, NULL, NULL, NULL),
(65, 'Kabupaten Sijunjung', 3, 101, NULL, NULL, NULL, NULL),
(66, 'Kabupaten Solok', 3, 101, NULL, NULL, NULL, NULL),
(67, 'Kabupaten Solok Selatan', 3, 101, NULL, NULL, NULL, NULL),
(68, 'Kabupaten Tanah Datar', 3, 101, NULL, NULL, NULL, NULL),
(69, 'Kota Bukittinggi', 3, 101, NULL, NULL, NULL, NULL),
(70, 'Kota Padang', 3, 101, NULL, NULL, NULL, NULL),
(71, 'Kota Padang Panjang', 3, 101, NULL, NULL, NULL, NULL),
(72, 'Kota Pariaman', 3, 101, NULL, NULL, NULL, NULL),
(73, 'Kota Payakumbuh', 3, 101, NULL, NULL, NULL, NULL),
(74, 'Kota Sawah Lunto', 3, 101, NULL, NULL, NULL, NULL),
(75, 'Kota Solok', 3, 101, NULL, NULL, NULL, NULL),
(76, 'Kabupaten Bengkalis', 4, 101, NULL, NULL, NULL, NULL),
(77, 'Kabupaten Indragiri Hilir', 4, 101, NULL, NULL, NULL, NULL),
(78, 'Kabupaten Indragiri Hulu', 4, 101, NULL, NULL, NULL, NULL),
(79, 'Kabupaten Kampar', 4, 101, NULL, NULL, NULL, NULL),
(80, 'Kabupaten Kuantan Singingi', 4, 101, NULL, NULL, NULL, NULL),
(81, 'Kabupaten Meranti', 4, 101, NULL, NULL, NULL, NULL),
(82, 'Kabupaten Pelalawan', 4, 101, NULL, NULL, NULL, NULL),
(83, 'Kabupaten Rokan Hilir', 4, 101, NULL, NULL, NULL, NULL),
(84, 'Kabupaten Rokan Hulu', 4, 101, NULL, NULL, NULL, NULL),
(85, 'Kabupaten Siak', 4, 101, NULL, NULL, NULL, NULL),
(86, 'Kota Dumai', 4, 101, NULL, NULL, NULL, NULL),
(87, 'Kota Pekanbaru', 4, 101, NULL, NULL, NULL, NULL),
(88, 'Kabupaten Bintan', 5, 101, NULL, NULL, NULL, NULL),
(89, 'Kabupaten Karimun', 5, 101, NULL, NULL, NULL, NULL),
(90, 'Kabupaten Kepulauan Anambas', 5, 101, NULL, NULL, NULL, NULL),
(91, 'Kabupaten Lingga', 5, 101, NULL, NULL, NULL, NULL),
(92, 'Kabupaten Natuna', 5, 101, NULL, NULL, NULL, NULL),
(93, 'Kota Batam', 5, 101, NULL, NULL, NULL, NULL),
(94, 'Kota Tanjung Pinang', 5, 101, NULL, NULL, NULL, NULL),
(95, 'Kabupaten Bangka', 6, 101, NULL, NULL, NULL, NULL),
(96, 'Kabupaten Bangka Barat', 6, 101, NULL, NULL, NULL, NULL),
(97, 'Kabupaten Bangka Selatan', 6, 101, NULL, NULL, NULL, NULL),
(98, 'Kabupaten Bangka Tengah', 6, 101, NULL, NULL, NULL, NULL),
(99, 'Kabupaten Belitung', 6, 101, NULL, NULL, NULL, NULL),
(100, 'Kabupaten Belitung Timur', 6, 101, NULL, NULL, NULL, NULL),
(101, 'Kota Pangkal Pinang', 6, 101, NULL, NULL, NULL, NULL),
(102, 'Kabupaten Kerinci', 7, 101, NULL, NULL, NULL, NULL),
(103, 'Kabupaten Merangin', 7, 101, NULL, NULL, NULL, NULL),
(104, 'Kabupaten Sarolangun', 7, 101, NULL, NULL, NULL, NULL),
(105, 'Kabupaten Batang Hari', 7, 101, NULL, NULL, NULL, NULL),
(106, 'Kabupaten Muaro Jambi', 7, 101, NULL, NULL, NULL, NULL),
(107, 'Kabupaten Tanjung Jabung Timur', 7, 101, NULL, NULL, NULL, NULL),
(108, 'Kabupaten Tanjung Jabung Barat', 7, 101, NULL, NULL, NULL, NULL),
(109, 'Kabupaten Tebo', 7, 101, NULL, NULL, NULL, NULL),
(110, 'Kabupaten Bungo', 7, 101, NULL, NULL, NULL, NULL),
(111, 'Kota Jambi', 7, 101, NULL, NULL, NULL, NULL),
(112, 'Kota Sungai Penuh', 7, 101, NULL, NULL, NULL, NULL),
(113, 'Kabupaten Bengkulu Selatan', 8, 101, NULL, NULL, NULL, NULL),
(114, 'Kabupaten Bengkulu Tengah', 8, 101, NULL, NULL, NULL, NULL),
(115, 'Kabupaten Bengkulu Utara', 8, 101, NULL, NULL, NULL, NULL),
(116, 'Kabupaten Kaur', 8, 101, NULL, NULL, NULL, NULL),
(117, 'Kabupaten Kepahiang', 8, 101, NULL, NULL, NULL, NULL),
(118, 'Kabupaten Lebong', 8, 101, NULL, NULL, NULL, NULL),
(119, 'Kabupaten Mukomuko', 8, 101, NULL, NULL, NULL, NULL),
(120, 'Kabupaten Rejang Lebong', 8, 101, NULL, NULL, NULL, NULL),
(121, 'Kabupaten Seluma', 8, 101, NULL, NULL, NULL, NULL),
(122, 'Kota Bengkulu', 8, 101, NULL, NULL, NULL, NULL),
(123, 'Kabupaten Banyuasin', 9, 101, NULL, NULL, NULL, NULL),
(124, 'Kabupaten Empat Lawang', 9, 101, NULL, NULL, NULL, NULL),
(125, 'Kabupaten Lahat', 9, 101, NULL, NULL, NULL, NULL),
(126, 'Kabupaten Muara Enim', 9, 101, NULL, NULL, NULL, NULL),
(127, 'Kabupaten Musi Banyu Asin', 9, 101, NULL, NULL, NULL, NULL),
(128, 'Kabupaten Musi Rawas', 9, 101, NULL, NULL, NULL, NULL),
(129, 'Kabupaten Ogan Ilir', 9, 101, NULL, NULL, NULL, NULL),
(130, 'Kabupaten Ogan Komering Ilir', 9, 101, NULL, NULL, NULL, NULL),
(131, 'Kabupaten Ogan Komering Ulu', 9, 101, NULL, NULL, NULL, NULL),
(132, 'Kabupaten Ogan Komering Ulu Se', 9, 101, NULL, NULL, NULL, NULL),
(133, 'Kabupaten Ogan Komering Ulu Ti', 9, 101, NULL, NULL, NULL, NULL),
(134, 'Kota Lubuklinggau', 9, 101, NULL, NULL, NULL, NULL),
(135, 'Kota Pagar Alam', 9, 101, NULL, NULL, NULL, NULL),
(136, 'Kota Palembang', 9, 101, NULL, NULL, NULL, NULL),
(137, 'Kota Prabumulih', 9, 101, NULL, NULL, NULL, NULL),
(138, 'Kabupaten Lampung Barat', 10, 101, NULL, NULL, NULL, NULL),
(139, 'Kabupaten Lampung Selatan', 10, 101, NULL, NULL, NULL, NULL),
(140, 'Kabupaten Lampung Tengah', 10, 101, NULL, NULL, NULL, NULL),
(141, 'Kabupaten Lampung Timur', 10, 101, NULL, NULL, NULL, NULL),
(142, 'Kabupaten Lampung Utara', 10, 101, NULL, NULL, NULL, NULL),
(143, 'Kabupaten Mesuji', 10, 101, NULL, NULL, NULL, NULL),
(144, 'Kabupaten Pesawaran', 10, 101, NULL, NULL, NULL, NULL),
(145, 'Kabupaten Pringsewu', 10, 101, NULL, NULL, NULL, NULL),
(146, 'Kabupaten Tanggamus', 10, 101, NULL, NULL, NULL, NULL),
(147, 'Kabupaten Tulang Bawang', 10, 101, NULL, NULL, NULL, NULL),
(148, 'Kabupaten Tulang Bawang Barat', 10, 101, NULL, NULL, NULL, NULL),
(149, 'Kabupaten Way Kanan', 10, 101, NULL, NULL, NULL, NULL),
(150, 'Kota Bandar Lampung', 10, 101, NULL, NULL, NULL, NULL),
(151, 'Kota Metro', 10, 101, NULL, NULL, NULL, NULL),
(152, 'Kabupaten Lebak', 11, 101, NULL, NULL, NULL, NULL),
(153, 'Kabupaten Pandeglang', 11, 101, NULL, NULL, NULL, NULL),
(154, 'Kabupaten Serang', 11, 101, NULL, NULL, NULL, NULL),
(155, 'Kabupaten Tangerang', 11, 101, NULL, NULL, NULL, NULL),
(156, 'Kota Cilegon', 11, 101, NULL, NULL, NULL, NULL),
(157, 'Kota Serang', 11, 101, NULL, NULL, NULL, NULL),
(158, 'Kota Tangerang', 11, 101, NULL, NULL, NULL, NULL),
(159, 'Kota Tangerang Selatan', 11, 101, NULL, NULL, NULL, NULL),
(160, 'Kabupaten Adm. Kepulauan Serib', 12, 101, NULL, NULL, NULL, NULL),
(161, 'Kota Jakarta Barat', 12, 101, NULL, NULL, NULL, NULL),
(162, 'Kota Jakarta Pusat', 12, 101, NULL, NULL, NULL, NULL),
(163, 'Kota Jakarta Selatan', 12, 101, NULL, NULL, NULL, NULL),
(164, 'Kota Jakarta Timur', 12, 101, NULL, NULL, NULL, NULL),
(165, 'Kota Jakarta Utara', 12, 101, NULL, NULL, NULL, NULL),
(166, 'Kabupaten Bandung', 13, 101, NULL, NULL, NULL, NULL),
(167, 'Kabupaten Bandung Barat', 13, 101, NULL, NULL, NULL, NULL),
(168, 'Kabupaten Bekasi', 13, 101, NULL, NULL, NULL, NULL),
(169, 'Kabupaten Bogor', 13, 101, NULL, NULL, NULL, NULL),
(170, 'Kabupaten Ciamis', 13, 101, NULL, NULL, NULL, NULL),
(171, 'Kabupaten Cianjur', 13, 101, NULL, NULL, NULL, NULL),
(172, 'Kabupaten Cirebon', 13, 101, NULL, NULL, NULL, NULL),
(173, 'Kabupaten Garut', 13, 101, NULL, NULL, NULL, NULL),
(174, 'Kabupaten Indramayu', 13, 101, NULL, NULL, NULL, NULL),
(175, 'Kabupaten Karawang', 13, 101, NULL, NULL, NULL, NULL),
(176, 'Kabupaten Kuningan', 13, 101, NULL, NULL, NULL, NULL),
(177, 'Kabupaten Majalengka', 13, 101, NULL, NULL, NULL, NULL),
(178, 'Kabupaten Purwakarta', 13, 101, NULL, NULL, NULL, NULL),
(179, 'Kabupaten Subang', 13, 101, NULL, NULL, NULL, NULL),
(180, 'Kabupaten Sukabumi', 13, 101, NULL, NULL, NULL, NULL),
(181, 'Kabupaten Sumedang', 13, 101, NULL, NULL, NULL, NULL),
(182, 'Kabupaten Tasikmalaya', 13, 101, NULL, NULL, NULL, NULL),
(183, 'Kota Bandung', 13, 101, NULL, NULL, NULL, NULL),
(184, 'Kota Banjar', 13, 101, NULL, NULL, NULL, NULL),
(185, 'Kota Bekasi', 13, 101, NULL, NULL, NULL, NULL),
(186, 'Kota Bogor', 13, 101, NULL, NULL, NULL, NULL),
(187, 'Kota Cimahi', 13, 101, NULL, NULL, NULL, NULL),
(188, 'Kota Cirebon', 13, 101, NULL, NULL, NULL, NULL),
(189, 'Kota Depok', 13, 101, NULL, NULL, NULL, NULL),
(190, 'Kota Sukabumi', 13, 101, NULL, NULL, NULL, NULL),
(191, 'Kota Tasikmalaya', 13, 101, NULL, NULL, NULL, NULL),
(192, 'Kabupaten Banjarnegara', 14, 101, NULL, NULL, NULL, NULL),
(193, 'Kabupaten Banyumas', 14, 101, NULL, NULL, NULL, NULL),
(194, 'Kabupaten Batang', 14, 101, NULL, NULL, NULL, NULL),
(195, 'Kabupaten Blora', 14, 101, NULL, NULL, NULL, NULL),
(196, 'Kabupaten Boyolali', 14, 101, NULL, NULL, NULL, NULL),
(197, 'Kabupaten Brebes', 14, 101, NULL, NULL, NULL, NULL),
(198, 'Kabupaten Cilacap', 14, 101, NULL, NULL, NULL, NULL),
(199, 'Kabupaten Demak', 14, 101, NULL, NULL, NULL, NULL),
(200, 'Kabupaten Grobogan', 14, 101, NULL, NULL, NULL, NULL),
(201, 'Kabupaten Jepara', 14, 101, NULL, NULL, NULL, NULL),
(202, 'Kabupaten Karanganyar', 14, 101, NULL, NULL, NULL, NULL),
(203, 'Kabupaten Kebumen', 14, 101, NULL, NULL, NULL, NULL),
(204, 'Kabupaten Kendal', 14, 101, NULL, NULL, NULL, NULL),
(205, 'Kabupaten Klaten', 14, 101, NULL, NULL, NULL, NULL),
(206, 'Kabupaten Kota Tegal', 14, 101, NULL, NULL, NULL, NULL),
(207, 'Kabupaten Kudus', 14, 101, NULL, NULL, NULL, NULL),
(208, 'Kabupaten Magelang', 14, 101, NULL, NULL, NULL, NULL),
(209, 'Kabupaten Pati', 14, 101, NULL, NULL, NULL, NULL),
(210, 'Kabupaten Pekalongan', 14, 101, NULL, NULL, NULL, NULL),
(211, 'Kabupaten Pemalang', 14, 101, NULL, NULL, NULL, NULL),
(212, 'Kabupaten Purbalingga', 14, 101, NULL, NULL, NULL, NULL),
(213, 'Kabupaten Purworejo', 14, 101, NULL, NULL, NULL, NULL),
(214, 'Kabupaten Rembang', 14, 101, NULL, NULL, NULL, NULL),
(215, 'Kabupaten Semarang', 14, 101, NULL, NULL, NULL, NULL),
(216, 'Kabupaten Sragen', 14, 101, NULL, NULL, NULL, NULL),
(217, 'Kabupaten Sukoharjo', 14, 101, NULL, NULL, NULL, NULL),
(218, 'Kabupaten Temanggung', 14, 101, NULL, NULL, NULL, NULL),
(219, 'Kabupaten Wonogiri', 14, 101, NULL, NULL, NULL, NULL),
(220, 'Kabupaten Wonosobo', 14, 101, NULL, NULL, NULL, NULL),
(221, 'Kota Magelang', 14, 101, NULL, NULL, NULL, NULL),
(222, 'Kota Pekalongan', 14, 101, NULL, NULL, NULL, NULL),
(223, 'Kota Salatiga', 14, 101, NULL, NULL, NULL, NULL),
(224, 'Kota Semarang', 14, 101, NULL, NULL, NULL, NULL),
(225, 'Kota Surakarta', 14, 101, NULL, NULL, NULL, NULL),
(226, 'Kota Tegal', 14, 101, NULL, NULL, NULL, NULL),
(227, 'Kabupaten Bantul', 15, 101, NULL, NULL, NULL, NULL),
(228, 'Kabupaten Gunung Kidul', 15, 101, NULL, NULL, NULL, NULL),
(229, 'Kabupaten Kulon Progo', 15, 101, NULL, NULL, NULL, NULL),
(230, 'Kabupaten Sleman', 15, 101, NULL, NULL, NULL, NULL),
(231, 'Kota Yogyakarta', 15, 101, NULL, NULL, NULL, NULL),
(232, 'Kabupaten Bangkalan', 16, 101, NULL, NULL, NULL, NULL),
(233, 'Kabupaten Banyuwangi', 16, 101, NULL, NULL, NULL, NULL),
(234, 'Kabupaten Blitar', 16, 101, NULL, NULL, NULL, NULL),
(235, 'Kabupaten Bojonegoro', 16, 101, NULL, NULL, NULL, NULL),
(236, 'Kabupaten Bondowoso', 16, 101, NULL, NULL, NULL, NULL),
(237, 'Kabupaten Gresik', 16, 101, NULL, NULL, NULL, NULL),
(238, 'Kabupaten Jember', 16, 101, NULL, NULL, NULL, NULL),
(239, 'Kabupaten Jombang', 16, 101, NULL, NULL, NULL, NULL),
(240, 'Kabupaten Kediri', 16, 101, NULL, NULL, NULL, NULL),
(241, 'Kabupaten Lamongan', 16, 101, NULL, NULL, NULL, NULL),
(242, 'Kabupaten Lumajang', 16, 101, NULL, NULL, NULL, NULL),
(243, 'Kabupaten Madiun', 16, 101, NULL, NULL, NULL, NULL),
(244, 'Kabupaten Magetan', 16, 101, NULL, NULL, NULL, NULL),
(245, 'Kabupaten Malang', 16, 101, NULL, NULL, NULL, NULL),
(246, 'Kabupaten Mojokerto', 16, 101, NULL, NULL, NULL, NULL),
(247, 'Kabupaten Nganjuk', 16, 101, NULL, NULL, NULL, NULL),
(248, 'Kabupaten Ngawi', 16, 101, NULL, NULL, NULL, NULL),
(249, 'Kabupaten Pacitan', 16, 101, NULL, NULL, NULL, NULL),
(250, 'Kabupaten Pamekasan', 16, 101, NULL, NULL, NULL, NULL),
(251, 'Kabupaten Pasuruan', 16, 101, NULL, NULL, NULL, NULL),
(252, 'Kabupaten Ponorogo', 16, 101, NULL, NULL, NULL, NULL),
(253, 'Kabupaten Probolinggo', 16, 101, NULL, NULL, NULL, NULL),
(254, 'Kabupaten Sampang', 16, 101, NULL, NULL, NULL, NULL),
(255, 'Kabupaten Sidoarjo', 16, 101, NULL, NULL, NULL, NULL),
(256, 'Kabupaten Situbondo', 16, 101, NULL, NULL, NULL, NULL),
(257, 'Kabupaten Sumenep', 16, 101, NULL, NULL, NULL, NULL),
(258, 'Kabupaten Trenggalek', 16, 101, NULL, NULL, NULL, NULL),
(259, 'Kabupaten Tuban', 16, 101, NULL, NULL, NULL, NULL),
(260, 'Kabupaten Tulungagung', 16, 101, NULL, NULL, NULL, NULL),
(261, 'Kota Batu', 16, 101, NULL, NULL, NULL, NULL),
(262, 'Kota Blitar', 16, 101, NULL, NULL, NULL, NULL),
(263, 'Kota Kediri', 16, 101, NULL, NULL, NULL, NULL),
(264, 'Kota Madiun', 16, 101, NULL, NULL, NULL, NULL),
(265, 'Kota Malang', 16, 101, NULL, NULL, NULL, NULL),
(266, 'Kota Mojokerto', 16, 101, NULL, NULL, NULL, NULL),
(267, 'Kota Pasuruan', 16, 101, NULL, NULL, NULL, NULL),
(268, 'Kota Probolinggo', 16, 101, NULL, NULL, NULL, NULL),
(269, 'Kota Surabaya', 16, 101, NULL, NULL, NULL, NULL),
(270, 'Kabupaten Badung', 17, 101, NULL, NULL, NULL, NULL),
(271, 'Kabupaten Bangli', 17, 101, NULL, NULL, NULL, NULL),
(272, 'Kabupaten Buleleng', 17, 101, NULL, NULL, NULL, NULL),
(273, 'Kabupaten Gianyar', 17, 101, NULL, NULL, NULL, NULL),
(274, 'Kabupaten Jembrana', 17, 101, NULL, NULL, NULL, NULL),
(275, 'Kabupaten Karang Asem', 17, 101, NULL, NULL, NULL, NULL),
(276, 'Kabupaten Klungkung', 17, 101, NULL, NULL, NULL, NULL),
(277, 'Kabupaten Tabanan', 17, 101, NULL, NULL, NULL, NULL),
(278, 'Kota Denpasar', 17, 101, NULL, NULL, NULL, NULL),
(279, 'Kabupaten Bima', 18, 101, NULL, NULL, NULL, NULL),
(280, 'Kabupaten Dompu', 18, 101, NULL, NULL, NULL, NULL),
(281, 'Kabupaten Lombok Barat', 18, 101, NULL, NULL, NULL, NULL),
(282, 'Kabupaten Lombok Tengah', 18, 101, NULL, NULL, NULL, NULL),
(283, 'Kabupaten Lombok Timur', 18, 101, NULL, NULL, NULL, NULL),
(284, 'Kabupaten Lombok Utara', 18, 101, NULL, NULL, NULL, NULL),
(285, 'Kabupaten Sumbawa', 18, 101, NULL, NULL, NULL, NULL),
(286, 'Kabupaten Sumbawa Barat', 18, 101, NULL, NULL, NULL, NULL),
(287, 'Kota Bima', 18, 101, NULL, NULL, NULL, NULL),
(288, 'Kota Mataram', 18, 101, NULL, NULL, NULL, NULL),
(289, 'Kabupaten Alor', 19, 101, NULL, NULL, NULL, NULL),
(290, 'Kabupaten Belu', 19, 101, NULL, NULL, NULL, NULL),
(291, 'Kabupaten Ende', 19, 101, NULL, NULL, NULL, NULL),
(292, 'Kabupaten Flores Timur', 19, 101, NULL, NULL, NULL, NULL),
(293, 'Kabupaten Kupang', 19, 101, NULL, NULL, NULL, NULL),
(294, 'Kabupaten Lembata', 19, 101, NULL, NULL, NULL, NULL),
(295, 'Kabupaten Manggarai', 19, 101, NULL, NULL, NULL, NULL),
(296, 'Kabupaten Manggarai Barat', 19, 101, NULL, NULL, NULL, NULL),
(297, 'Kabupaten Manggarai Timur', 19, 101, NULL, NULL, NULL, NULL),
(298, 'Kabupaten Nagekeo', 19, 101, NULL, NULL, NULL, NULL),
(299, 'Kabupaten Ngada', 19, 101, NULL, NULL, NULL, NULL),
(300, 'Kabupaten Rote Ndao', 19, 101, NULL, NULL, NULL, NULL),
(301, 'Kabupaten Sabu Raijua', 19, 101, NULL, NULL, NULL, NULL),
(302, 'Kabupaten Sikka', 19, 101, NULL, NULL, NULL, NULL),
(303, 'Kabupaten Sumba Barat', 19, 101, NULL, NULL, NULL, NULL),
(304, 'Kabupaten Sumba Barat Daya', 19, 101, NULL, NULL, NULL, NULL),
(305, 'Kabupaten Sumba Tengah', 19, 101, NULL, NULL, NULL, NULL),
(306, 'Kabupaten Sumba Timur', 19, 101, NULL, NULL, NULL, NULL),
(307, 'Kabupaten Timor Tengah Selatan', 19, 101, NULL, NULL, NULL, NULL),
(308, 'Kabupaten Timor Tengah Utara', 19, 101, NULL, NULL, NULL, NULL),
(309, 'Kota Kupang', 19, 101, NULL, NULL, NULL, NULL),
(310, 'Kabupaten Bengkayang', 20, 101, NULL, NULL, NULL, NULL),
(311, 'Kabupaten Kapuas Hulu', 20, 101, NULL, NULL, NULL, NULL),
(312, 'Kabupaten Kayong Utara', 20, 101, NULL, NULL, NULL, NULL),
(313, 'Kabupaten Ketapang', 20, 101, NULL, NULL, NULL, NULL),
(314, 'Kabupaten Kubu Raya', 20, 101, NULL, NULL, NULL, NULL),
(315, 'Kabupaten Landak', 20, 101, NULL, NULL, NULL, NULL),
(316, 'Kabupaten Melawi', 20, 101, NULL, NULL, NULL, NULL),
(317, 'Kabupaten Pontianak', 20, 101, NULL, NULL, NULL, NULL),
(318, 'Kabupaten Sambas', 20, 101, NULL, NULL, NULL, NULL),
(319, 'Kabupaten Sanggau', 20, 101, NULL, NULL, NULL, NULL),
(320, 'Kabupaten Sekadau', 20, 101, NULL, NULL, NULL, NULL),
(321, 'Kabupaten Sintang', 20, 101, NULL, NULL, NULL, NULL),
(322, 'Kota Pontianak', 20, 101, NULL, NULL, NULL, NULL),
(323, 'Kota Singkawang', 20, 101, NULL, NULL, NULL, NULL),
(324, 'Kabupaten Barito Selatan', 21, 101, NULL, NULL, NULL, NULL),
(325, 'Kabupaten Barito Timur', 21, 101, NULL, NULL, NULL, NULL),
(326, 'Kabupaten Barito Utara', 21, 101, NULL, NULL, NULL, NULL),
(327, 'Kabupaten Gunung Mas', 21, 101, NULL, NULL, NULL, NULL),
(328, 'Kabupaten Kapuas', 21, 101, NULL, NULL, NULL, NULL),
(329, 'Kabupaten Katingan', 21, 101, NULL, NULL, NULL, NULL),
(330, 'Kabupaten Kotawaringin Barat', 21, 101, NULL, NULL, NULL, NULL),
(331, 'Kabupaten Kotawaringin Timur', 21, 101, NULL, NULL, NULL, NULL),
(332, 'Kabupaten Lamandau', 21, 101, NULL, NULL, NULL, NULL),
(333, 'Kabupaten Murung Raya', 21, 101, NULL, NULL, NULL, NULL),
(334, 'Kabupaten Pulang Pisau', 21, 101, NULL, NULL, NULL, NULL),
(335, 'Kabupaten Seruyan', 21, 101, NULL, NULL, NULL, NULL),
(336, 'Kabupaten Sukamara', 21, 101, NULL, NULL, NULL, NULL),
(337, 'Kota Palangkaraya', 21, 101, NULL, NULL, NULL, NULL),
(338, 'Kabupaten Balangan', 22, 101, NULL, NULL, NULL, NULL),
(339, 'Kabupaten Banjar', 22, 101, NULL, NULL, NULL, NULL),
(340, 'Kabupaten Barito Kuala', 22, 101, NULL, NULL, NULL, NULL),
(341, 'Kabupaten Hulu Sungai Selatan', 22, 101, NULL, NULL, NULL, NULL),
(342, 'Kabupaten Hulu Sungai Tengah', 22, 101, NULL, NULL, NULL, NULL),
(343, 'Kabupaten Hulu Sungai Utara', 22, 101, NULL, NULL, NULL, NULL),
(344, 'Kabupaten Kota Baru', 22, 101, NULL, NULL, NULL, NULL),
(345, 'Kabupaten Tabalong', 22, 101, NULL, NULL, NULL, NULL),
(346, 'Kabupaten Tanah Bumbu', 22, 101, NULL, NULL, NULL, NULL),
(347, 'Kabupaten Tanah Laut', 22, 101, NULL, NULL, NULL, NULL),
(348, 'Kabupaten Tapin', 22, 101, NULL, NULL, NULL, NULL),
(349, 'Kota Banjar Baru', 22, 101, NULL, NULL, NULL, NULL),
(350, 'Kota Banjarmasin', 22, 101, NULL, NULL, NULL, NULL),
(351, 'Kabupaten Berau', 23, 101, NULL, NULL, NULL, NULL),
(352, 'Kabupaten Bulongan', 23, 101, NULL, NULL, NULL, NULL),
(353, 'Kabupaten Kutai Barat', 23, 101, NULL, NULL, NULL, NULL),
(354, 'Kabupaten Kutai Kartanegara', 23, 101, NULL, NULL, NULL, NULL),
(355, 'Kabupaten Kutai Timur', 23, 101, NULL, NULL, NULL, NULL),
(356, 'Kabupaten Malinau', 23, 101, NULL, NULL, NULL, NULL),
(357, 'Kabupaten Nunukan', 23, 101, NULL, NULL, NULL, NULL),
(358, 'Kabupaten Paser', 23, 101, NULL, NULL, NULL, NULL),
(359, 'Kabupaten Penajam Paser Utara', 23, 101, NULL, NULL, NULL, NULL),
(360, 'Kabupaten Tana Tidung', 23, 101, NULL, NULL, NULL, NULL),
(361, 'Kota Balikpapan', 23, 101, NULL, NULL, NULL, NULL),
(362, 'Kota Bontang', 23, 101, NULL, NULL, NULL, NULL),
(363, 'Kota Samarinda', 23, 101, NULL, NULL, NULL, NULL),
(364, 'Kota Tarakan', 23, 101, NULL, NULL, NULL, NULL),
(365, 'Kabupaten Boalemo', 24, 101, NULL, NULL, NULL, NULL),
(366, 'Kabupaten Bone Bolango', 24, 101, NULL, NULL, NULL, NULL),
(367, 'Kabupaten Gorontalo', 24, 101, NULL, NULL, NULL, NULL),
(368, 'Kabupaten Gorontalo Utara', 24, 101, NULL, NULL, NULL, NULL),
(369, 'Kabupaten Pohuwato', 24, 101, NULL, NULL, NULL, NULL),
(370, 'Kota Gorontalo', 24, 101, NULL, NULL, NULL, NULL),
(371, 'Kabupaten Bantaeng', 25, 101, NULL, NULL, NULL, NULL),
(372, 'Kabupaten Barru', 25, 101, NULL, NULL, NULL, NULL),
(373, 'Kabupaten Bone', 25, 101, NULL, NULL, NULL, NULL),
(374, 'Kabupaten Bulukumba', 25, 101, NULL, NULL, NULL, NULL),
(375, 'Kabupaten Enrekang', 25, 101, NULL, NULL, NULL, NULL),
(376, 'Kabupaten Gowa', 25, 101, NULL, NULL, NULL, NULL),
(377, 'Kabupaten Jeneponto', 25, 101, NULL, NULL, NULL, NULL),
(378, 'Kabupaten Luwu', 25, 101, NULL, NULL, NULL, NULL),
(379, 'Kabupaten Luwu Timur', 25, 101, NULL, NULL, NULL, NULL),
(380, 'Kabupaten Luwu Utara', 25, 101, NULL, NULL, NULL, NULL),
(381, 'Kabupaten Maros', 25, 101, NULL, NULL, NULL, NULL),
(382, 'Kabupaten Pangkajene Kepulauan', 25, 101, NULL, NULL, NULL, NULL),
(383, 'Kabupaten Pinrang', 25, 101, NULL, NULL, NULL, NULL),
(384, 'Kabupaten Selayar', 25, 101, NULL, NULL, NULL, NULL),
(385, 'Kabupaten Sidenreng Rappang', 25, 101, NULL, NULL, NULL, NULL),
(386, 'Kabupaten Sinjai', 25, 101, NULL, NULL, NULL, NULL),
(387, 'Kabupaten Soppeng', 25, 101, NULL, NULL, NULL, NULL),
(388, 'Kabupaten Takalar', 25, 101, NULL, NULL, NULL, NULL),
(389, 'Kabupaten Tana Toraja', 25, 101, NULL, NULL, NULL, NULL),
(390, 'Kabupaten Toraja Utara', 25, 101, NULL, NULL, NULL, NULL),
(391, 'Kabupaten Wajo', 25, 101, NULL, NULL, NULL, NULL),
(392, 'Kota Makassar', 25, 101, NULL, NULL, NULL, NULL),
(393, 'Kota Palopo', 25, 101, NULL, NULL, NULL, NULL),
(394, 'Kota Pare-pare', 25, 101, NULL, NULL, NULL, NULL),
(395, 'Kabupaten Bombana', 26, 101, NULL, NULL, NULL, NULL),
(396, 'Kabupaten Buton', 26, 101, NULL, NULL, NULL, NULL),
(397, 'Kabupaten Buton Utara', 26, 101, NULL, NULL, NULL, NULL),
(398, 'Kabupaten Kolaka', 26, 101, NULL, NULL, NULL, NULL),
(399, 'Kabupaten Kolaka Utara', 26, 101, NULL, NULL, NULL, NULL),
(400, 'Kabupaten Konawe', 26, 101, NULL, NULL, NULL, NULL),
(401, 'Kabupaten Konawe Selatan', 26, 101, NULL, NULL, NULL, NULL),
(402, 'Kabupaten Konawe Utara', 26, 101, NULL, NULL, NULL, NULL),
(403, 'Kabupaten Muna', 26, 101, NULL, NULL, NULL, NULL),
(404, 'Kabupaten Wakatobi', 26, 101, NULL, NULL, NULL, NULL),
(405, 'Kota Bau-bau', 26, 101, NULL, NULL, NULL, NULL),
(406, 'Kota Kendari', 26, 101, NULL, NULL, NULL, NULL),
(407, 'Kabupaten Banggai', 27, 101, NULL, NULL, NULL, NULL),
(408, 'Kabupaten Banggai Kepulauan', 27, 101, NULL, NULL, NULL, NULL),
(409, 'Kabupaten Buol', 27, 101, NULL, NULL, NULL, NULL),
(410, 'Kabupaten Donggala', 27, 101, NULL, NULL, NULL, NULL),
(411, 'Kabupaten Morowali', 27, 101, NULL, NULL, NULL, NULL),
(412, 'Kabupaten Parigi Moutong', 27, 101, NULL, NULL, NULL, NULL),
(413, 'Kabupaten Poso', 27, 101, NULL, NULL, NULL, NULL),
(414, 'Kabupaten Sigi', 27, 101, NULL, NULL, NULL, NULL),
(415, 'Kabupaten Tojo Una-Una', 27, 101, NULL, NULL, NULL, NULL),
(416, 'Kabupaten Toli Toli', 27, 101, NULL, NULL, NULL, NULL),
(417, 'Kota Palu', 27, 101, NULL, NULL, NULL, NULL),
(418, 'Kabupaten Bolaang Mangondow', 28, 101, NULL, NULL, NULL, NULL),
(419, 'Kabupaten Bolaang Mangondow Se', 28, 101, NULL, NULL, NULL, NULL),
(420, 'Kabupaten Bolaang Mangondow Ti', 28, 101, NULL, NULL, NULL, NULL),
(421, 'Kabupaten Bolaang Mangondow Ut', 28, 101, NULL, NULL, NULL, NULL),
(422, 'Kabupaten Kepulauan Sangihe', 28, 101, NULL, NULL, NULL, NULL),
(423, 'Kabupaten Kepulauan Siau Tagul', 28, 101, NULL, NULL, NULL, NULL),
(424, 'Kabupaten Kepulauan Talaud', 28, 101, NULL, NULL, NULL, NULL),
(425, 'Kabupaten Minahasa', 28, 101, NULL, NULL, NULL, NULL),
(426, 'Kabupaten Minahasa Selatan', 28, 101, NULL, NULL, NULL, NULL),
(427, 'Kabupaten Minahasa Tenggara', 28, 101, NULL, NULL, NULL, NULL),
(428, 'Kabupaten Minahasa Utara', 28, 101, NULL, NULL, NULL, NULL),
(429, 'Kota Bitung', 28, 101, NULL, NULL, NULL, NULL),
(430, 'Kota Kotamobagu', 28, 101, NULL, NULL, NULL, NULL),
(431, 'Kota Manado', 28, 101, NULL, NULL, NULL, NULL),
(432, 'Kota Tomohon', 28, 101, NULL, NULL, NULL, NULL),
(433, 'Kabupaten Majene', 29, 101, NULL, NULL, NULL, NULL),
(434, 'Kabupaten Mamasa', 29, 101, NULL, NULL, NULL, NULL),
(435, 'Kabupaten Mamuju', 29, 101, NULL, NULL, NULL, NULL),
(436, 'Kabupaten Mamuju Utara', 29, 101, NULL, NULL, NULL, NULL),
(437, 'Kabupaten Polewali Mandar', 29, 101, NULL, NULL, NULL, NULL),
(438, 'Kabupaten Buru', 30, 101, NULL, NULL, NULL, NULL),
(439, 'Kabupaten Buru Selatan', 30, 101, NULL, NULL, NULL, NULL),
(440, 'Kabupaten Kepulauan Aru', 30, 101, NULL, NULL, NULL, NULL),
(441, 'Kabupaten Maluku Barat Daya', 30, 101, NULL, NULL, NULL, NULL),
(442, 'Kabupaten Maluku Tengah', 30, 101, NULL, NULL, NULL, NULL),
(443, 'Kabupaten Maluku Tenggara', 30, 101, NULL, NULL, NULL, NULL),
(444, 'Kabupaten Maluku Tenggara Bara', 30, 101, NULL, NULL, NULL, NULL),
(445, 'Kabupaten Seram Bagian Barat', 30, 101, NULL, NULL, NULL, NULL),
(446, 'Kabupaten Seram Bagian Timur', 30, 101, NULL, NULL, NULL, NULL),
(447, 'Kota Ambon', 30, 101, NULL, NULL, NULL, NULL),
(448, 'Kota Tual', 30, 101, NULL, NULL, NULL, NULL),
(449, 'Kabupaten Halmahera Barat', 31, 101, NULL, NULL, NULL, NULL),
(450, 'Kabupaten Halmahera Selatan', 31, 101, NULL, NULL, NULL, NULL),
(451, 'Kabupaten Halmahera Tengah', 31, 101, NULL, NULL, NULL, NULL),
(452, 'Kabupaten Halmahera Timur', 31, 101, NULL, NULL, NULL, NULL),
(453, 'Kabupaten Halmahera Utara', 31, 101, NULL, NULL, NULL, NULL),
(454, 'Kabupaten Kepulauan Sula', 31, 101, NULL, NULL, NULL, NULL),
(455, 'Kabupaten Pulau Morotai', 31, 101, NULL, NULL, NULL, NULL),
(456, 'Kota Ternate', 31, 101, NULL, NULL, NULL, NULL),
(457, 'Kota Tidore Kepulauan', 31, 101, NULL, NULL, NULL, NULL),
(458, 'Kabupaten Fakfak', 32, 101, NULL, NULL, NULL, NULL),
(459, 'Kabupaten Kaimana', 32, 101, NULL, NULL, NULL, NULL),
(460, 'Kabupaten Manokwari', 32, 101, NULL, NULL, NULL, NULL),
(461, 'Kabupaten Maybrat', 32, 101, NULL, NULL, NULL, NULL),
(462, 'Kabupaten Raja Ampat', 32, 101, NULL, NULL, NULL, NULL),
(463, 'Kabupaten Sorong', 32, 101, NULL, NULL, NULL, NULL),
(464, 'Kabupaten Sorong Selatan', 32, 101, NULL, NULL, NULL, NULL),
(465, 'Kabupaten Tambrauw', 32, 101, NULL, NULL, NULL, NULL),
(466, 'Kabupaten Teluk Bintuni', 32, 101, NULL, NULL, NULL, NULL),
(467, 'Kabupaten Teluk Wondama', 32, 101, NULL, NULL, NULL, NULL),
(468, 'Kota Sorong', 32, 101, NULL, NULL, NULL, NULL),
(469, 'Kabupaten Merauke', 33, 101, NULL, NULL, NULL, NULL),
(470, 'Kabupaten Jayawijaya', 33, 101, NULL, NULL, NULL, NULL),
(471, 'Kabupaten Nabire', 33, 101, NULL, NULL, NULL, NULL),
(472, 'Kabupaten Kepulauan Yapen', 33, 101, NULL, NULL, NULL, NULL),
(473, 'Kabupaten Biak Numfor', 33, 101, NULL, NULL, NULL, NULL),
(474, 'Kabupaten Paniai', 33, 101, NULL, NULL, NULL, NULL),
(475, 'Kabupaten Puncak Jaya', 33, 101, NULL, NULL, NULL, NULL),
(476, 'Kabupaten Mimika', 33, 101, NULL, NULL, NULL, NULL),
(477, 'Kabupaten Boven Digoel', 33, 101, NULL, NULL, NULL, NULL),
(478, 'Kabupaten Mappi', 33, 101, NULL, NULL, NULL, NULL),
(479, 'Kabupaten Asmat', 33, 101, NULL, NULL, NULL, NULL),
(480, 'Kabupaten Yahukimo', 33, 101, NULL, NULL, NULL, NULL),
(481, 'Kabupaten Pegunungan Bintang', 33, 101, NULL, NULL, NULL, NULL),
(482, 'Kabupaten Tolikara', 33, 101, NULL, NULL, NULL, NULL),
(483, 'Kabupaten Sarmi', 33, 101, NULL, NULL, NULL, NULL),
(484, 'Kabupaten Keerom', 33, 101, NULL, NULL, NULL, NULL),
(485, 'Kabupaten Waropen', 33, 101, NULL, NULL, NULL, NULL),
(486, 'Kabupaten Jayapura', 33, 101, NULL, NULL, NULL, NULL),
(487, 'Kabupaten Deiyai', 33, 101, NULL, NULL, NULL, NULL),
(488, 'Kabupaten Dogiyai', 33, 101, NULL, NULL, NULL, NULL),
(489, 'Kabupaten Intan Jaya', 33, 101, NULL, NULL, NULL, NULL),
(490, 'Kabupaten Lanny Jaya', 33, 101, NULL, NULL, NULL, NULL),
(491, 'Kabupaten Mamberamo Raya', 33, 101, NULL, NULL, NULL, NULL),
(492, 'Kabupaten Mamberamo Tengah', 33, 101, NULL, NULL, NULL, NULL),
(493, 'Kabupaten Nduga', 33, 101, NULL, NULL, NULL, NULL),
(494, 'Kabupaten Puncak', 33, 101, NULL, NULL, NULL, NULL),
(495, 'Kabupaten Supiori', 33, 101, NULL, NULL, NULL, NULL),
(496, 'Kabupaten Yalimo', 33, 101, NULL, NULL, NULL, NULL),
(497, 'Kota Jayapura', 33, 101, NULL, NULL, NULL, NULL),
(498, 'Kabupaten Bulungan', 34, 101, NULL, NULL, NULL, NULL),
(499, 'Kabupaten Malinau', 34, 101, NULL, NULL, NULL, NULL),
(500, 'Kabupaten Nunukan', 34, 101, NULL, NULL, NULL, NULL),
(501, 'Kabupaten Tana Tidung', 34, 101, NULL, NULL, NULL, NULL),
(502, 'Kota Tarakan', 34, 101, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_conf`
--

CREATE TABLE IF NOT EXISTS `mst_conf` (
  `id` int(10) NOT NULL,
  `tahun_anggaran` varchar(4) DEFAULT NULL,
  `thn_trans` char(2) DEFAULT NULL,
  `bln_trans` char(2) DEFAULT NULL,
  `trans_no` char(3) DEFAULT NULL,
  `tiket_id` varchar(10) DEFAULT NULL,
  `bh_id` varchar(10) DEFAULT NULL,
  `hot_id` varchar(10) DEFAULT NULL,
  `bd_id` varchar(10) DEFAULT NULL,
  `bt_id` varchar(10) DEFAULT NULL,
  `hotel2_id` varchar(6) DEFAULT NULL,
  `dr_id` varchar(6) DEFAULT NULL,
  `hotel_id` varchar(10) DEFAULT NULL,
  `dokumen_id` varchar(10) DEFAULT NULL,
  `tour_id` varchar(10) DEFAULT NULL,
  `vendorhotel_id` varchar(10) DEFAULT NULL,
  `vendordok_id` varchar(10) DEFAULT NULL,
  `vendortur_id` varchar(10) DEFAULT NULL,
  `vendorother_id` varchar(10) DEFAULT NULL,
  `others_id` varchar(10) DEFAULT NULL,
  `last_vh` varchar(6) DEFAULT NULL,
  `last_vd` varchar(10) DEFAULT NULL,
  `last_vt` varchar(10) DEFAULT NULL,
  `last_vo` varchar(10) DEFAULT NULL,
  `last_bd` varchar(10) DEFAULT NULL,
  `last_bh` varchar(10) DEFAULT NULL,
  `last_trans` varchar(10) DEFAULT NULL,
  `last_tiket` varchar(10) DEFAULT NULL,
  `last_hotel` varchar(10) DEFAULT NULL,
  `last_dokumen` varchar(10) DEFAULT NULL,
  `last_tour` varchar(10) DEFAULT NULL,
  `last_others` varchar(10) DEFAULT NULL,
  `last_dp` varchar(10) DEFAULT NULL,
  `last_dp_hotel` varchar(10) DEFAULT NULL,
  `last_dp_tur` varchar(10) DEFAULT NULL,
  `last_paymentticket` varchar(10) DEFAULT NULL,
  `last_paymenthotel` varchar(10) DEFAULT NULL,
  `last_refundhotel` varchar(10) DEFAULT NULL,
  `last_refundticket` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_conf`
--

INSERT INTO `mst_conf` (`id`, `tahun_anggaran`, `thn_trans`, `bln_trans`, `trans_no`, `tiket_id`, `bh_id`, `hot_id`, `bd_id`, `bt_id`, `hotel2_id`, `dr_id`, `hotel_id`, `dokumen_id`, `tour_id`, `vendorhotel_id`, `vendordok_id`, `vendortur_id`, `vendorother_id`, `others_id`, `last_vh`, `last_vd`, `last_vt`, `last_vo`, `last_bd`, `last_bh`, `last_trans`, `last_tiket`, `last_hotel`, `last_dokumen`, `last_tour`, `last_others`, `last_dp`, `last_dp_hotel`, `last_dp_tur`, `last_paymentticket`, `last_paymenthotel`, `last_refundhotel`, `last_refundticket`) VALUES
(1, '2014', '14', '12', '000', 'TK', 'HB', '000', 'DB', 'TB', '000005', '000001', 'HI', 'DI', 'TI', 'HS', 'DS', 'TS', 'OS', 'OI', '000015', '000001', '000001', '000001', '0011', '0028', '000041', '036', '0033', '0070', '008', '000', '000', '000', '0006', '020', '014', '022', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_country`
--

CREATE TABLE IF NOT EXISTS `mst_country` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_code` char(2) NOT NULL DEFAULT '',
  `country_name` varchar(45) NOT NULL DEFAULT '',
  `currency` char(3) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data untuk tabel `mst_country`
--

INSERT INTO `mst_country` (`country_id`, `country_code`, `country_name`, `currency`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'AD', 'Andorra', 'EUR', NULL, NULL, NULL, NULL),
(2, 'AE', 'United Arab Emirates', 'AED', NULL, NULL, NULL, NULL),
(3, 'AF', 'Afghanistan', 'AFN', NULL, NULL, NULL, NULL),
(4, 'AG', 'Antigua and Barbuda', 'XCD', NULL, NULL, NULL, NULL),
(5, 'AI', 'Anguilla', 'XCD', NULL, NULL, NULL, NULL),
(6, 'AL', 'Albania', 'ALL', NULL, NULL, NULL, NULL),
(7, 'AM', 'Armenia', 'AMD', NULL, NULL, NULL, NULL),
(8, 'AO', 'Angola', 'AOA', NULL, NULL, NULL, NULL),
(9, 'AQ', 'Antarctica', '', NULL, NULL, NULL, NULL),
(10, 'AR', 'Argentina', 'ARS', NULL, NULL, NULL, NULL),
(11, 'AS', 'American Samoa', 'USD', NULL, NULL, NULL, NULL),
(12, 'AT', 'Austria', 'EUR', NULL, NULL, NULL, NULL),
(13, 'AU', 'Australia', 'AUD', NULL, NULL, NULL, NULL),
(14, 'AW', 'Aruba', 'AWG', NULL, NULL, NULL, NULL),
(15, 'AX', 'Åland', 'EUR', NULL, NULL, NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'AZN', NULL, NULL, NULL, NULL),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', NULL, NULL, NULL, NULL),
(18, 'BB', 'Barbados', 'BBD', NULL, NULL, NULL, NULL),
(19, 'BD', 'Bangladesh', 'BDT', NULL, NULL, NULL, NULL),
(20, 'BE', 'Belgium', 'EUR', NULL, NULL, NULL, NULL),
(21, 'BF', 'Burkina Faso', 'XOF', NULL, NULL, NULL, NULL),
(22, 'BG', 'Bulgaria', 'BGN', NULL, NULL, NULL, NULL),
(23, 'BH', 'Bahrain', 'BHD', NULL, NULL, NULL, NULL),
(24, 'BI', 'Burundi', 'BIF', NULL, NULL, NULL, NULL),
(25, 'BJ', 'Benin', 'XOF', NULL, NULL, NULL, NULL),
(26, 'BL', 'Saint Barthélemy', 'EUR', NULL, NULL, NULL, NULL),
(27, 'BM', 'Bermuda', 'BMD', NULL, NULL, NULL, NULL),
(28, 'BN', 'Brunei', 'BND', NULL, NULL, NULL, NULL),
(29, 'BO', 'Bolivia', 'BOB', NULL, NULL, NULL, NULL),
(30, 'BQ', 'Bonaire', 'USD', NULL, NULL, NULL, NULL),
(31, 'BR', 'Brazil', 'BRL', NULL, NULL, NULL, NULL),
(32, 'BS', 'Bahamas', 'BSD', NULL, NULL, NULL, NULL),
(33, 'BT', 'Bhutan', 'BTN', NULL, NULL, NULL, NULL),
(34, 'BV', 'Bouvet Island', 'NOK', NULL, NULL, NULL, NULL),
(35, 'BW', 'Botswana', 'BWP', NULL, NULL, NULL, NULL),
(36, 'BY', 'Belarus', 'BYR', NULL, NULL, NULL, NULL),
(37, 'BZ', 'Belize', 'BZD', NULL, NULL, NULL, NULL),
(38, 'CA', 'Canada', 'CAD', NULL, NULL, NULL, NULL),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', NULL, NULL, NULL, NULL),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', NULL, NULL, NULL, NULL),
(41, 'CF', 'Central African Republic', 'XAF', NULL, NULL, NULL, NULL),
(42, 'CG', 'Republic of the Congo', 'XAF', NULL, NULL, NULL, NULL),
(43, 'CH', 'Switzerland', 'CHF', NULL, NULL, NULL, NULL),
(44, 'CI', 'Ivory Coast', 'XOF', NULL, NULL, NULL, NULL),
(45, 'CK', 'Cook Islands', 'NZD', NULL, NULL, NULL, NULL),
(46, 'CL', 'Chile', 'CLP', NULL, NULL, NULL, NULL),
(47, 'CM', 'Cameroon', 'XAF', NULL, NULL, NULL, NULL),
(48, 'CN', 'China', 'CNY', NULL, NULL, NULL, NULL),
(49, 'CO', 'Colombia', 'COP', NULL, NULL, NULL, NULL),
(50, 'CR', 'Costa Rica', 'CRC', NULL, NULL, NULL, NULL),
(51, 'CU', 'Cuba', 'CUP', NULL, NULL, NULL, NULL),
(52, 'CV', 'Cape Verde', 'CVE', NULL, NULL, NULL, NULL),
(53, 'CW', 'Curacao', 'ANG', NULL, NULL, NULL, NULL),
(54, 'CX', 'Christmas Island', 'AUD', NULL, NULL, NULL, NULL),
(55, 'CY', 'Cyprus', 'EUR', NULL, NULL, NULL, NULL),
(56, 'CZ', 'Czech Republic', 'CZK', NULL, NULL, NULL, NULL),
(57, 'DE', 'Germany', 'EUR', NULL, NULL, NULL, NULL),
(58, 'DJ', 'Djibouti', 'DJF', NULL, NULL, NULL, NULL),
(59, 'DK', 'Denmark', 'DKK', NULL, NULL, NULL, NULL),
(60, 'DM', 'Dominica', 'XCD', NULL, NULL, NULL, NULL),
(61, 'DO', 'Dominican Republic', 'DOP', NULL, NULL, NULL, NULL),
(62, 'DZ', 'Algeria', 'DZD', NULL, NULL, NULL, NULL),
(63, 'EC', 'Ecuador', 'USD', NULL, NULL, NULL, NULL),
(64, 'EE', 'Estonia', 'EUR', NULL, NULL, NULL, NULL),
(65, 'EG', 'Egypt', 'EGP', NULL, NULL, NULL, NULL),
(66, 'EH', 'Western Sahara', 'MAD', NULL, NULL, NULL, NULL),
(67, 'ER', 'Eritrea', 'ERN', NULL, NULL, NULL, NULL),
(68, 'ES', 'Spain', 'EUR', NULL, NULL, NULL, NULL),
(69, 'ET', 'Ethiopia', 'ETB', NULL, NULL, NULL, NULL),
(70, 'FI', 'Finland', 'EUR', NULL, NULL, NULL, NULL),
(71, 'FJ', 'Fiji', 'FJD', NULL, NULL, NULL, NULL),
(72, 'FK', 'Falkland Islands', 'FKP', NULL, NULL, NULL, NULL),
(73, 'FM', 'Micronesia', 'USD', NULL, NULL, NULL, NULL),
(74, 'FO', 'Faroe Islands', 'DKK', NULL, NULL, NULL, NULL),
(75, 'FR', 'France', 'EUR', NULL, NULL, NULL, NULL),
(76, 'GA', 'Gabon', 'XAF', NULL, NULL, NULL, NULL),
(77, 'GB', 'United Kingdom', 'GBP', NULL, NULL, NULL, NULL),
(78, 'GD', 'Grenada', 'XCD', NULL, NULL, NULL, NULL),
(79, 'GE', 'Georgia', 'GEL', NULL, NULL, NULL, NULL),
(80, 'GF', 'French Guiana', 'EUR', NULL, NULL, NULL, NULL),
(81, 'GG', 'Guernsey', 'GBP', NULL, NULL, NULL, NULL),
(82, 'GH', 'Ghana', 'GHS', NULL, NULL, NULL, NULL),
(83, 'GI', 'Gibraltar', 'GIP', NULL, NULL, NULL, NULL),
(84, 'GL', 'Greenland', 'DKK', NULL, NULL, NULL, NULL),
(85, 'GM', 'Gambia', 'GMD', NULL, NULL, NULL, NULL),
(86, 'GN', 'Guinea', 'GNF', NULL, NULL, NULL, NULL),
(87, 'GP', 'Guadeloupe', 'EUR', NULL, NULL, NULL, NULL),
(88, 'GQ', 'Equatorial Guinea', 'XAF', NULL, NULL, NULL, NULL),
(89, 'GR', 'Greece', 'EUR', NULL, NULL, NULL, NULL),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', NULL, NULL, NULL, NULL),
(91, 'GT', 'Guatemala', 'GTQ', NULL, NULL, NULL, NULL),
(92, 'GU', 'Guam', 'USD', NULL, NULL, NULL, NULL),
(93, 'GW', 'Guinea-Bissau', 'XOF', NULL, NULL, NULL, NULL),
(94, 'GY', 'Guyana', 'GYD', NULL, NULL, NULL, NULL),
(95, 'HK', 'Hong Kong', 'HKD', NULL, NULL, NULL, NULL),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', NULL, NULL, NULL, NULL),
(97, 'HN', 'Honduras', 'HNL', NULL, NULL, NULL, NULL),
(98, 'HR', 'Croatia', 'HRK', NULL, NULL, NULL, NULL),
(99, 'HT', 'Haiti', 'HTG', NULL, NULL, NULL, NULL),
(100, 'HU', 'Hungary', 'HUF', NULL, NULL, NULL, NULL),
(101, 'ID', 'Indonesia', 'IDR', NULL, NULL, NULL, NULL),
(102, 'IE', 'Ireland', 'EUR', NULL, NULL, NULL, NULL),
(103, 'IL', 'Israel', 'ILS', NULL, NULL, NULL, NULL),
(104, 'IM', 'Isle of Man', 'GBP', NULL, NULL, NULL, NULL),
(105, 'IN', 'India', 'INR', NULL, NULL, NULL, NULL),
(106, 'IO', 'British Indian Ocean Territory', 'USD', NULL, NULL, NULL, NULL),
(107, 'IQ', 'Iraq', 'IQD', NULL, NULL, NULL, NULL),
(108, 'IR', 'Iran', 'IRR', NULL, NULL, NULL, NULL),
(109, 'IS', 'Iceland', 'ISK', NULL, NULL, NULL, NULL),
(110, 'IT', 'Italy', 'EUR', NULL, NULL, NULL, NULL),
(111, 'JE', 'Jersey', 'GBP', NULL, NULL, NULL, NULL),
(112, 'JM', 'Jamaica', 'JMD', NULL, NULL, NULL, NULL),
(113, 'JO', 'Jordan', 'JOD', NULL, NULL, NULL, NULL),
(114, 'JP', 'Japan', 'JPY', NULL, NULL, NULL, NULL),
(115, 'KE', 'Kenya', 'KES', NULL, NULL, NULL, NULL),
(116, 'KG', 'Kyrgyzstan', 'KGS', NULL, NULL, NULL, NULL),
(117, 'KH', 'Cambodia', 'KHR', NULL, NULL, NULL, NULL),
(118, 'KI', 'Kiribati', 'AUD', NULL, NULL, NULL, NULL),
(119, 'KM', 'Comoros', 'KMF', NULL, NULL, NULL, NULL),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', NULL, NULL, NULL, NULL),
(121, 'KP', 'North Korea', 'KPW', NULL, NULL, NULL, NULL),
(122, 'KR', 'South Korea', 'KRW', NULL, NULL, NULL, NULL),
(123, 'KW', 'Kuwait', 'KWD', NULL, NULL, NULL, NULL),
(124, 'KY', 'Cayman Islands', 'KYD', NULL, NULL, NULL, NULL),
(125, 'KZ', 'Kazakhstan', 'KZT', NULL, NULL, NULL, NULL),
(126, 'LA', 'Laos', 'LAK', NULL, NULL, NULL, NULL),
(127, 'LB', 'Lebanon', 'LBP', NULL, NULL, NULL, NULL),
(128, 'LC', 'Saint Lucia', 'XCD', NULL, NULL, NULL, NULL),
(129, 'LI', 'Liechtenstein', 'CHF', NULL, NULL, NULL, NULL),
(130, 'LK', 'Sri Lanka', 'LKR', NULL, NULL, NULL, NULL),
(131, 'LR', 'Liberia', 'LRD', NULL, NULL, NULL, NULL),
(132, 'LS', 'Lesotho', 'LSL', NULL, NULL, NULL, NULL),
(133, 'LT', 'Lithuania', 'LTL', NULL, NULL, NULL, NULL),
(134, 'LU', 'Luxembourg', 'EUR', NULL, NULL, NULL, NULL),
(135, 'LV', 'Latvia', 'EUR', NULL, NULL, NULL, NULL),
(136, 'LY', 'Libya', 'LYD', NULL, NULL, NULL, NULL),
(137, 'MA', 'Morocco', 'MAD', NULL, NULL, NULL, NULL),
(138, 'MC', 'Monaco', 'EUR', NULL, NULL, NULL, NULL),
(139, 'MD', 'Moldova', 'MDL', NULL, NULL, NULL, NULL),
(140, 'ME', 'Montenegro', 'EUR', NULL, NULL, NULL, NULL),
(141, 'MF', 'Saint Martin', 'EUR', NULL, NULL, NULL, NULL),
(142, 'MG', 'Madagascar', 'MGA', NULL, NULL, NULL, NULL),
(143, 'MH', 'Marshall Islands', 'USD', NULL, NULL, NULL, NULL),
(144, 'MK', 'Macedonia', 'MKD', NULL, NULL, NULL, NULL),
(145, 'ML', 'Mali', 'XOF', NULL, NULL, NULL, NULL),
(146, 'MM', 'Myanmar [Burma]', 'MMK', NULL, NULL, NULL, NULL),
(147, 'MN', 'Mongolia', 'MNT', NULL, NULL, NULL, NULL),
(148, 'MO', 'Macao', 'MOP', NULL, NULL, NULL, NULL),
(149, 'MP', 'Northern Mariana Islands', 'USD', NULL, NULL, NULL, NULL),
(150, 'MQ', 'Martinique', 'EUR', NULL, NULL, NULL, NULL),
(151, 'MR', 'Mauritania', 'MRO', NULL, NULL, NULL, NULL),
(152, 'MS', 'Montserrat', 'XCD', NULL, NULL, NULL, NULL),
(153, 'MT', 'Malta', 'EUR', NULL, NULL, NULL, NULL),
(154, 'MU', 'Mauritius', 'MUR', NULL, NULL, NULL, NULL),
(155, 'MV', 'Maldives', 'MVR', NULL, NULL, NULL, NULL),
(156, 'MW', 'Malawi', 'MWK', NULL, NULL, NULL, NULL),
(157, 'MX', 'Mexico', 'MXN', NULL, NULL, NULL, NULL),
(158, 'MY', 'Malaysia', 'MYR', NULL, NULL, NULL, NULL),
(159, 'MZ', 'Mozambique', 'MZN', NULL, NULL, NULL, NULL),
(160, 'NA', 'Namibia', 'NAD', NULL, NULL, NULL, NULL),
(161, 'NC', 'New Caledonia', 'XPF', NULL, NULL, NULL, NULL),
(162, 'NE', 'Niger', 'XOF', NULL, NULL, NULL, NULL),
(163, 'NF', 'Norfolk Island', 'AUD', NULL, NULL, NULL, NULL),
(164, 'NG', 'Nigeria', 'NGN', NULL, NULL, NULL, NULL),
(165, 'NI', 'Nicaragua', 'NIO', NULL, NULL, NULL, NULL),
(166, 'NL', 'Netherlands', 'EUR', NULL, NULL, NULL, NULL),
(167, 'NO', 'Norway', 'NOK', NULL, NULL, NULL, NULL),
(168, 'NP', 'Nepal', 'NPR', NULL, NULL, NULL, NULL),
(169, 'NR', 'Nauru', 'AUD', NULL, NULL, NULL, NULL),
(170, 'NU', 'Niue', 'NZD', NULL, NULL, NULL, NULL),
(171, 'NZ', 'New Zealand', 'NZD', NULL, NULL, NULL, NULL),
(172, 'OM', 'Oman', 'OMR', NULL, NULL, NULL, NULL),
(173, 'PA', 'Panama', 'PAB', NULL, NULL, NULL, NULL),
(174, 'PE', 'Peru', 'PEN', NULL, NULL, NULL, NULL),
(175, 'PF', 'French Polynesia', 'XPF', NULL, NULL, NULL, NULL),
(176, 'PG', 'Papua New Guinea', 'PGK', NULL, NULL, NULL, NULL),
(177, 'PH', 'Philippines', 'PHP', NULL, NULL, NULL, NULL),
(178, 'PK', 'Pakistan', 'PKR', NULL, NULL, NULL, NULL),
(179, 'PL', 'Poland', 'PLN', NULL, NULL, NULL, NULL),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', NULL, NULL, NULL, NULL),
(181, 'PN', 'Pitcairn Islands', 'NZD', NULL, NULL, NULL, NULL),
(182, 'PR', 'Puerto Rico', 'USD', NULL, NULL, NULL, NULL),
(183, 'PS', 'Palestine', 'ILS', NULL, NULL, NULL, NULL),
(184, 'PT', 'Portugal', 'EUR', NULL, NULL, NULL, NULL),
(185, 'PW', 'Palau', 'USD', NULL, NULL, NULL, NULL),
(186, 'PY', 'Paraguay', 'PYG', NULL, NULL, NULL, NULL),
(187, 'QA', 'Qatar', 'QAR', NULL, NULL, NULL, NULL),
(188, 'RE', 'Réunion', 'EUR', NULL, NULL, NULL, NULL),
(189, 'RO', 'Romania', 'RON', NULL, NULL, NULL, NULL),
(190, 'RS', 'Serbia', 'RSD', NULL, NULL, NULL, NULL),
(191, 'RU', 'Russia', 'RUB', NULL, NULL, NULL, NULL),
(192, 'RW', 'Rwanda', 'RWF', NULL, NULL, NULL, NULL),
(193, 'SA', 'Saudi Arabia', 'SAR', NULL, NULL, NULL, NULL),
(194, 'SB', 'Solomon Islands', 'SBD', NULL, NULL, NULL, NULL),
(195, 'SC', 'Seychelles', 'SCR', NULL, NULL, NULL, NULL),
(196, 'SD', 'Sudan', 'SDG', NULL, NULL, NULL, NULL),
(197, 'SE', 'Sweden', 'SEK', NULL, NULL, NULL, NULL),
(198, 'SG', 'Singapore', 'SGD', NULL, NULL, NULL, NULL),
(199, 'SH', 'Saint Helena', 'SHP', NULL, NULL, NULL, NULL),
(200, 'SI', 'Slovenia', 'EUR', NULL, NULL, NULL, NULL),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', NULL, NULL, NULL, NULL),
(202, 'SK', 'Slovakia', 'EUR', NULL, NULL, NULL, NULL),
(203, 'SL', 'Sierra Leone', 'SLL', NULL, NULL, NULL, NULL),
(204, 'SM', 'San Marino', 'EUR', NULL, NULL, NULL, NULL),
(205, 'SN', 'Senegal', 'XOF', NULL, NULL, NULL, NULL),
(206, 'SO', 'Somalia', 'SOS', NULL, NULL, NULL, NULL),
(207, 'SR', 'Suriname', 'SRD', NULL, NULL, NULL, NULL),
(208, 'SS', 'South Sudan', 'SSP', NULL, NULL, NULL, NULL),
(209, 'ST', 'São Tomé and Príncipe', 'STD', NULL, NULL, NULL, NULL),
(210, 'SV', 'El Salvador', 'USD', NULL, NULL, NULL, NULL),
(211, 'SX', 'Sint Maarten', 'ANG', NULL, NULL, NULL, NULL),
(212, 'SY', 'Syria', 'SYP', NULL, NULL, NULL, NULL),
(213, 'SZ', 'Swaziland', 'SZL', NULL, NULL, NULL, NULL),
(214, 'TC', 'Turks and Caicos Islands', 'USD', NULL, NULL, NULL, NULL),
(215, 'TD', 'Chad', 'XAF', NULL, NULL, NULL, NULL),
(216, 'TF', 'French Southern Territories', 'EUR', NULL, NULL, NULL, NULL),
(217, 'TG', 'Togo', 'XOF', NULL, NULL, NULL, NULL),
(218, 'TH', 'Thailand', 'THB', NULL, NULL, NULL, NULL),
(219, 'TJ', 'Tajikistan', 'TJS', NULL, NULL, NULL, NULL),
(220, 'TK', 'Tokelau', 'NZD', NULL, NULL, NULL, NULL),
(221, 'TL', 'East Timor', 'USD', NULL, NULL, NULL, NULL),
(222, 'TM', 'Turkmenistan', 'TMT', NULL, NULL, NULL, NULL),
(223, 'TN', 'Tunisia', 'TND', NULL, NULL, NULL, NULL),
(224, 'TO', 'Tonga', 'TOP', NULL, NULL, NULL, NULL),
(225, 'TR', 'Turkey', 'TRY', NULL, NULL, NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'TTD', NULL, NULL, NULL, NULL),
(227, 'TV', 'Tuvalu', 'AUD', NULL, NULL, NULL, NULL),
(228, 'TW', 'Taiwan', 'TWD', NULL, NULL, NULL, NULL),
(229, 'TZ', 'Tanzania', 'TZS', NULL, NULL, NULL, NULL),
(230, 'UA', 'Ukraine', 'UAH', NULL, NULL, NULL, NULL),
(231, 'UG', 'Uganda', 'UGX', NULL, NULL, NULL, NULL),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', NULL, NULL, NULL, NULL),
(233, 'US', 'United States', 'USD', NULL, NULL, NULL, NULL),
(234, 'UY', 'Uruguay', 'UYU', NULL, NULL, NULL, NULL),
(235, 'UZ', 'Uzbekistan', 'UZS', NULL, NULL, NULL, NULL),
(236, 'VA', 'Vatican City', 'EUR', NULL, NULL, NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', NULL, NULL, NULL, NULL),
(238, 'VE', 'Venezuela', 'VEF', NULL, NULL, NULL, NULL),
(239, 'VG', 'British Virgin Islands', 'USD', NULL, NULL, NULL, NULL),
(240, 'VI', 'U.S. Virgin Islands', 'USD', NULL, NULL, NULL, NULL),
(241, 'VN', 'Vietnam', 'VND', NULL, NULL, NULL, NULL),
(242, 'VU', 'Vanuatu', 'VUV', NULL, NULL, NULL, NULL),
(243, 'WF', 'Wallis and Futuna', 'XPF', NULL, NULL, NULL, NULL),
(244, 'WS', 'Samoa', 'WST', NULL, NULL, NULL, NULL),
(245, 'XK', 'Kosovo', 'EUR', NULL, NULL, NULL, NULL),
(246, 'YE', 'Yemen', 'YER', NULL, NULL, NULL, NULL),
(247, 'YT', 'Mayotte', 'EUR', NULL, NULL, NULL, NULL),
(248, 'ZA', 'South Africa', 'ZAR', NULL, NULL, NULL, NULL),
(249, 'ZM', 'Zambia', 'ZMK', NULL, NULL, NULL, NULL),
(250, 'ZW', 'Zimbabwe', 'ZWL', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customer`
--

CREATE TABLE IF NOT EXISTS `mst_customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `identity_number` varchar(30) NOT NULL,
  `group_id` int(10) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `full_name` varchar(225) DEFAULT NULL,
  `address_1` varchar(225) DEFAULT NULL,
  `address_2` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `telp1` varchar(30) DEFAULT NULL,
  `telp2` varchar(30) DEFAULT NULL,
  `citizen` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `description` text,
  `type` varchar(20) DEFAULT NULL,
  `pricing_policy` double DEFAULT NULL,
  `setting_id` int(10) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`identity_number`),
  UNIQUE KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `mst_customer`
--

INSERT INTO `mst_customer` (`customer_id`, `identity_number`, `group_id`, `title`, `full_name`, `address_1`, `address_2`, `email`, `telp1`, `telp2`, `citizen`, `date_of_birth`, `place_of_birth`, `state`, `description`, `type`, `pricing_policy`, `setting_id`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, '44665453545343', NULL, 'Sir.', 'David Jones', 'New South Wales', 'Melbourne', 'theallnewvios@gmail.com', '4563534534', '87896867', 'AUS', '2015-04-09', 'Amerika', 1, 'Testing Data', 'individual', 3, NULL, '2014-08-03 11:48:23', '2015-03-27 09:46:03', 1, 1),
(2, '454878576576', NULL, 'Mrs.', 'Selvie Sutanjaya', 'Jl. H. Daimun No. 9i RT.001/09 Sunter Jaya', '', 'blurify@gmail.com', '4563534534', '87896867', 'WNI', '1996-06-14', 'Jakarta', 1, 'Percobaan Data', 'company', 3, 3, '2014-08-03 11:50:36', '2014-08-10 09:08:10', 1, 1),
(3, '90987678676', NULL, 'Mr.', 'Zulfikar Ahmadi Fathurrahman', 'Jl. H. Daimun No. 9i RT.001/09 Sunter Jaya', '', 'izulonthenet@gmail.com', '465657658', '', 'WNI', '2014-08-15', 'Bandung', 0, 'Percobaan Data', 'company', 3, 5, '2014-08-03 11:52:22', '2015-03-27 09:49:43', 1, 1),
(4, '6586785678', NULL, 'Mrs.', 'Yani Nurbayati', 'Medan Merdeka', '', 'Yani Nurbayati', '0775765646545', '', 'WNI', '1943-08-19', 'Medan', 1, 'Percobaan Data', 'company', 3, 3, '2014-08-03 12:01:35', '2014-08-10 09:07:46', 1, 1),
(5, '7457634557', NULL, '', 'PT. Megah Rejeki Utama', 'Haji Samali', '', 'cakra@yahoo.com', '078675675', '', 'WNI', '0000-00-00', '', 1, 'Percobaan', 'company', 3, 3, '2014-08-03 12:02:16', '2014-08-10 09:07:37', 1, 1),
(6, '5465454', NULL, '', 'PT. Perkasa Inti Raya', 'Thamrin', '', 'bigmobile@yahoo.com', '87576565', '', 'AUS', '0000-00-00', '', 1, 'Testing Data', 'individual', 3, 5, '2014-08-03 12:03:31', '2014-09-15 01:54:48', 1, 1),
(7, '345654354343', NULL, 'Madam.', 'Santi Maryanti', 'Jl. Ledeng', '', 'santi@yahoo.com', '78776565', '', 'WNI', '1959-08-14', 'Bandung', 1, 'Ok', 'individual', 3, 3, '2014-08-03 12:07:10', '2014-08-10 09:07:09', 1, 1),
(8, '333423', NULL, '', 'PT. Kencana Oto Rental', 'Jakarta', '', 'kencanaoto@yahoo.com', '7656565', '566456', 'Indonesia', '2014-09-11', 'Jakarta', 1, 'Test', 'company', NULL, 5, '2014-09-15 01:56:37', NULL, 1, NULL),
(9, '1242253', NULL, 'Mr', 'Abdul Gofur', 'Gunung Sahari no 23', '', 'email@domain.com', '02746464', '084635222234', 'Indonesia', '0000-00-00', 'Bogor', 1, '', 'individual', 2, NULL, '2015-03-30 23:43:24', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_state`
--

CREATE TABLE IF NOT EXISTS `mst_state` (
  `state_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL,
  `state_name` varchar(30) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `mst_state`
--

INSERT INTO `mst_state` (`state_id`, `country_id`, `state_name`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 101, 'Nanggroe Aceh Darussalam', NULL, NULL, NULL, NULL),
(2, 101, 'Sumatera Utara', NULL, NULL, NULL, NULL),
(3, 101, 'Sumatera Barat', NULL, NULL, NULL, NULL),
(4, 101, 'Riau', NULL, NULL, NULL, NULL),
(5, 101, 'Kepulauan Riau', NULL, NULL, NULL, NULL),
(6, 101, 'Kepulauan Bangka-Belitung', NULL, NULL, NULL, NULL),
(7, 101, 'Jambi', NULL, NULL, NULL, NULL),
(8, 101, 'Bengkulu', NULL, NULL, NULL, NULL),
(9, 101, 'Sumatera Selatan', NULL, NULL, NULL, NULL),
(10, 101, 'Lampung', NULL, NULL, NULL, NULL),
(11, 101, 'Banten', NULL, NULL, NULL, NULL),
(12, 101, 'DKI Jakarta', NULL, NULL, NULL, NULL),
(13, 101, 'Jawa Barat', NULL, NULL, NULL, NULL),
(14, 101, 'Jawa Tengah', NULL, NULL, NULL, NULL),
(15, 101, 'Daerah Istimewa Yogyakarta  ', NULL, NULL, NULL, NULL),
(16, 101, 'Jawa Timur', NULL, NULL, NULL, NULL),
(17, 101, 'Bali', NULL, NULL, NULL, NULL),
(18, 101, 'Nusa Tenggara Barat', NULL, NULL, NULL, NULL),
(19, 101, 'Nusa Tenggara Timur', NULL, NULL, NULL, NULL),
(20, 101, 'Kalimantan Barat', NULL, NULL, NULL, NULL),
(21, 101, 'Kalimantan Tengah', NULL, NULL, NULL, NULL),
(22, 101, 'Kalimantan Selatan', NULL, NULL, NULL, NULL),
(23, 101, 'Kalimantan Timur', NULL, NULL, NULL, NULL),
(24, 101, 'Gorontalo', NULL, NULL, NULL, NULL),
(25, 101, 'Sulawesi Selatan', NULL, NULL, NULL, NULL),
(26, 101, 'Sulawesi Tenggara', NULL, NULL, NULL, NULL),
(27, 101, 'Sulawesi Tengah', NULL, NULL, NULL, NULL),
(28, 101, 'Sulawesi Utara', NULL, NULL, NULL, NULL),
(29, 101, 'Sulawesi Barat', NULL, NULL, NULL, NULL),
(30, 101, 'Maluku', NULL, NULL, NULL, NULL),
(31, 101, 'Maluku Utara', NULL, NULL, NULL, NULL),
(32, 101, 'Papua Barat', NULL, NULL, NULL, NULL),
(33, 101, 'Papua', NULL, NULL, NULL, NULL),
(34, 101, 'Kalimantan Utara', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_supplier`
--

CREATE TABLE IF NOT EXISTS `mst_supplier` (
  `supplier_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL,
  `state_id` int(10) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `supplier_type_id` int(10) DEFAULT NULL,
  `supplier_module_id` int(10) NOT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `supplier_code` varchar(20) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `zip_code` char(5) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_person` varchar(45) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `mst_supplier`
--

INSERT INTO `mst_supplier` (`supplier_id`, `country_id`, `state_id`, `city_id`, `supplier_type_id`, `supplier_module_id`, `supplier_name`, `supplier_code`, `address1`, `address2`, `zip_code`, `phone_number`, `fax`, `email`, `contact_person`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 101, 12, 162, NULL, 2, 'KAHA', 'HS000009', 'Jalan Gajah Mada', NULL, NULL, 219939334, NULL, NULL, 'Mr. Lee', NULL, '2015-03-11 20:58:00', NULL, 1, NULL),
(2, 101, 12, 163, NULL, 2, 'XXX', 'HS000002', 'Jalan Hayam Wuruk', NULL, NULL, NULL, NULL, NULL, 'Mrs. Siska', NULL, '2015-03-11 20:59:47', NULL, 1, NULL),
(3, 101, 12, 162, 4, 1, 'BERKELANA', 'TS000001', 'Jalan Kapiten', NULL, NULL, NULL, NULL, NULL, 'Hanimoon', NULL, '2015-03-11 23:22:15', NULL, 1, NULL),
(4, 101, 12, 162, NULL, 4, 'JAMIK', 'TC000001', 'Jalan Sersan', NULL, NULL, NULL, NULL, NULL, 'Herman', NULL, '2015-03-11 23:27:35', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_supplier_type`
--

CREATE TABLE IF NOT EXISTS `mst_supplier_type` (
  `supplier_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  `description` text,
  `type` int(1) DEFAULT NULL COMMENT '1=ticket, 2=hotel, 3=dokumen, 4=tour, 5=others',
  `is_direct` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`supplier_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18446744073709551615 ;

--
-- Dumping data untuk tabel `mst_supplier_type`
--

INSERT INTO `mst_supplier_type` (`supplier_type_id`, `type_name`, `description`, `type`, `is_direct`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'LCC (Low Cost Carrier)', 'Kelompok vendor yang memberikan tiket untuk maskapai domestik. Dalam hal ini, vendornya langsung diwakili oleh maskapai ybs. Kelompok ini menggunakan skema deposit untuk setiap pembelian tiket oleh agen. ', NULL, 0, '2014-09-03 18:32:55', NULL, 1, NULL),
(2, 'BSP', 'Kelompok vendor yang memberikan tiket maskapai domestik tetapi dengan konsep kredit (tidak deposit seperti LCC). Contoh vendor jenis ini adalah Garuda.', NULL, 0, '2014-09-03 18:34:06', NULL, 1, NULL),
(3, 'IATA (International Air Transport Aviation)', 'Kelompok vendor yang memberikan tiket maskapai internasional (yg jumlahnya sangat banyak) dengan konsep kredit (tidak deposit seperti LCC). Setiap pembelian tiket internasional melalui vendor jenis ini, skema harganya akan sama karena diambil dari1 sumber (meskipun maskapainya berbagai macam). Hanya agen yang memiliki membership IATA yang dapat issued tiket melalui jalur IATA.', NULL, 0, '2014-09-03 18:34:28', NULL, 1, NULL),
(4, 'Direct Airlines', 'Kelompok vendor sesama agen. Dalam kasus tertentu ketika tidak tersedia tiket lewat jalur2 di atas, maka agen dapat membeli tiket dari agen lainnya yang berada di luar negeri.\r\n\r\nUntuk menampung ini, perlu ditambahkan field tipe vendor pada setiap maskapai yang ada di database. Kode untuk maskapai adalah 2 dijit dan berlaku internasional (standardisasi).', NULL, 1, '2014-09-03 18:34:44', '2014-09-03 18:51:22', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `other_invoice`
--

CREATE TABLE IF NOT EXISTS `other_invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `cut_off_date` date DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `division` set('HRD','SALES') DEFAULT NULL,
  `sub_div` set('A','B','C') DEFAULT NULL,
  PRIMARY KEY (`invoice_id`,`invoice_number`,`transaction_number`,`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `other_invoice`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `other_report`
--

CREATE TABLE IF NOT EXISTS `other_report` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `type` set('A','B','C') DEFAULT NULL,
  `currency` set('IDR','USD') DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `other_report`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `reff_log`
--

CREATE TABLE IF NOT EXISTS `reff_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(100) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `action` varchar(100) DEFAULT NULL,
  `record` text,
  `table_transaction` varchar(100) DEFAULT NULL,
  `event_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`,`user_id`,`position_id`),
  UNIQUE KEY `log_id` (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `reff_log`
--

INSERT INTO `reff_log` (`log_id`, `ip_address`, `user_id`, `position_id`, `action`, `record`, `table_transaction`, `event_date`) VALUES
(1, '::1', 0, 0, 'delete', '', 'hotel_mst_class', '2015-03-11 12:45:41'),
(2, '::1', 0, 0, 'delete', NULL, 'hotel_mst_class', '2015-03-11 12:48:51'),
(3, '::1', 0, 0, 'delete', NULL, 'hotel_mst_class', '2015-03-11 12:52:09'),
(4, '::1', 0, 0, 'delete', 'class_id=4, class_name=President, description=description of class President new, add_date=2015-03-11 12%3A28%3A51, modified_date=2015-03-11 12%3A30%3A52, add_user=1, modified_user=1', 'hotel_mst_class', '2015-03-11 12:53:45'),
(5, '::1', 0, 0, 'delete', 'class_id=2, class_name=President, description=Test, add_date=2015-01-06 07%3A50%3A15, add_user=1', 'hotel_mst_class', '2015-03-11 12:55:13'),
(6, '::1', 0, 0, 'delete', 'hotel_id=6, country_id=101, state_id=13, city_id=169, hotel_code=000002, hotel_name=degds, hotel_type=Domestic, star=1, address=gdsgds, contact_person=131, telp=131, email=21312, fax=1312, state=1, add_date=2015-01-28 07%3A10%3A22, add_user=1', 'hotel_mst_hotels', '2015-03-11 14:21:20'),
(7, '::1', 0, 0, 'update', 'hotel_id=4, hotel_code=000001, hotel_name=Hotel Indonesia, address=Bunderan H.I, country_code=101, state=7, city=111, hotel_type=Domestic, star=1, telp=1251212, fax=25532, email=sdhhd%40gaasn, contact_person=Pisto', 'hotel_mst_hotels', '2015-03-11 18:12:52'),
(8, '::1', 0, 0, 'update', 'hotel_id=4, hotel_code=000001, hotel_name=Hotel Indonesia, address=Bunderan H.I, country_code=101, state=7, city=111, hotel_type=Domestic, star=1, telp=1251212, fax=25532, email=sdhhd%40gaasn, contact_person=Pisto', 'hotel_mst_hotels', '2015-03-11 18:13:33'),
(9, '::1', 0, 0, 'insert', 'hotel_rate_id=, suplier_name=1, hotel_name=7, room_type=3, class_type=4, date_from=2015-03-01, date_to=2015-03-31, market_type=Indonesia, currency=IDR, nett_room=1000, sell_room=1100, nett_breakfast=90, sell_breakfast=100, include_breakfast=YES', 'hotel_mst_hotel_rate', '2015-03-12 01:04:27'),
(10, '::1', 0, 0, 'insert', 'hotel_rate_id=, suplier_name=1, hotel_name=7, room_type=3, class_type=4, date_from=2015-03-01, date_to=2015-03-31, market_type=Indonesia, currency=IDR, nett_room=1000, sell_room=1100, nett_breakfast=90, sell_breakfast=100, include_breakfast=YES', 'hotel_mst_hotel_rate', '2015-03-12 01:07:01'),
(11, '::1', 0, 0, 'insert', 'hotel_rate_id=, supplier_name=2, hotel_name=8, room_type=3, class_type=4, date_from=2015-03-01, date_to=2015-03-31, market_type=Foreign, currency=USD, nett_room=1000, sell_room=1100, nett_breakfast=90, sell_breakfast=100, include_breakfast=YES', 'hotel_mst_hotel_rate', '2015-03-12 01:07:40'),
(12, '::1', 0, 0, 'insert', 'hotel_id=, hotel_code=000006, hotel_name=Hotel Mirasantika, address=Jalan Wahid, country_code=101, state=13, city=179, hotel_type=Domestic, star=3, telp=0261939484, fax=, email=, contact_person=Bpk Pendi', 'hotel_mst_hotels', '2015-03-12 14:46:58'),
(13, '::1', 0, 0, 'update', 'code_id=4, code_name=TI, description=Tour Code Transaction, btnsave=Save', 'setting_mst_code_configuration', '2015-03-21 02:34:59'),
(14, '::1', 0, 0, 'update', 'code_id=4, code_name=TI, description=Tour Code Invoice, btnsave=Save', 'setting_mst_code_configuration', '2015-03-21 02:35:21'),
(15, '::1', 0, 0, 'update', 'code_id=1, code_name=TK, description=Ticketing, btnupdate=Cancel', 'setting_mst_code_configuration', '2015-03-25 17:55:22'),
(16, '::1', 0, 0, 'insert', 'user_id=, username=ds, password=admin, confirm_password=admin, full_name=Dedi Sapar, group_name=User, group_name_id=4, btnsave=Save', 'setting_mst_user', '2015-03-26 16:18:53'),
(17, '::1', 0, 0, 'update', 'user_id=9, username=ds, password=21232f297a57a5a743894a0e4a801fc3, confirm_password=21232f297a57a5a743894a0e4a801fc3, full_name=Dedi Sapar, group_name=Manager, group_name_id=2, btnsave=Save', 'setting_mst_user', '2015-03-26 16:34:23'),
(18, '::1', 0, 0, 'update', 'user_id=9, username=dsa, password=c3284d0f94606de1fd2af172aba15bf3, confirm_password=c3284d0f94606de1fd2af172aba15bf3, full_name=Dedi Sapar, group_name=Manager, group_name_id=, btnsave=Save', 'setting_mst_user', '2015-03-26 16:45:14'),
(19, '::1', 0, 0, 'update', 'user_id=9, username=dsa, password=c3284d0f94606de1fd2af172aba15bf3, confirm_password=c3284d0f94606de1fd2af172aba15bf3, full_name=Dedi Sapar, group_name=Manager, group_name_id=2, btnsave=Save', 'setting_mst_user', '2015-03-26 16:46:31'),
(20, '::1', 0, 0, 'update', 'user_id=9, username=dsa, password=admin, confirm_password=admin, full_name=Dedi Sapar, group_name=Manager, group_name_id=2, btnsave=Save', 'setting_mst_user', '2015-03-26 16:49:31'),
(21, '::1', 0, 0, 'delete', 'user_id=9, username=dsa, password=21232f297a57a5a743894a0e4a801fc3, full_name=Dedi Sapar, level=1, status=0, last_login=2015-03-26 16%3A50%3A04, group_id=2, add_date=2015-03-26 16%3A18%3A53, modified_date=2015-03-26 16%3A59%3A42, add_user=1, modified_user=1', 'setting_mst_user', '2015-03-26 16:59:42'),
(22, '::1', 0, 0, 'update', 'code_id=1, code_name=TK, description=Ticketing aaa, btnsave=Save', 'setting_mst_code_configuration', '2015-03-26 17:03:55'),
(23, '::1', 0, 0, 'update', 'code_id=1, code_name=TK, description=Ticketing , btnsave=Save', 'setting_mst_code_configuration', '2015-03-26 17:04:05'),
(24, '::1', 0, 0, 'update', 'customer_id=1, identity_number=44665453545343, address_1=New South Wales, title=Sir.1, address_2=, full_name=David Jones, telp1=4563534534, date_of_birth=14-08-2014, telp2=87896867, place_of_birth=Amerika, email=theallnewvios%40gmail.com, citizen=AUS, pricing_policy=3, type=company, description=Testing Data, btnsave=Save', 'mst_customer', '2015-03-27 09:44:29'),
(25, '::1', 0, 0, 'update', 'customer_id=1, identity_number=44665453545343, address_1=New South Wales, title=Sir., address_2=Melbourne, full_name=David Jones, telp1=4563534534, date_of_birth=09-04-2015, telp2=87896867, place_of_birth=Amerika, email=theallnewvios%40gmail.com, citizen=AUS, pricing_policy=3, type=company, description=Testing Data, btnsave=Save', 'mst_customer', '2015-03-27 09:45:28'),
(26, '::1', 0, 0, 'update', 'customer_id=1, identity_number=44665453545343, address_1=New South Wales, title=Sir., address_2=Melbourne, full_name=David Jones, telp1=4563534534, date_of_birth=09-04-2015, telp2=87896867, place_of_birth=Amerika, email=theallnewvios%40gmail.com, citizen=AUS, pricing_policy=3, type=individual, description=Testing Data, btnsave=Save', 'mst_customer', '2015-03-27 09:46:03'),
(27, '::1', 0, 0, 'delete', 'customer_id=3, identity_number=90987678676, title=Mr., full_name=Zulfikar Ahmadi Fathurrahman, address_1=Jl. H. Daimun No. 9i RT.001%2F09 Sunter Jaya, address_2=, email=izulonthenet%40gmail.com, telp1=465657658, telp2=, citizen=WNI, date_of_birth=2014-08-15, place_of_birth=Bandung, state=0, description=Percobaan Data, type=company, pricing_policy=3, setting_id=5, add_date=2014-08-03 11%3A52%3A22, modified_date=2015-03-27 09%3A49%3A43, add_user=1, modified_user=1', 'mst_customer', '2015-03-27 09:49:43'),
(28, '::1', 0, 0, 'insert', 'room_id=, room_name=Deluxe, description=', 'hotel_mst_room', '2015-03-27 09:59:49'),
(29, '::1', 0, 0, 'delete', '', 'hotel_mst_room', '2015-03-27 09:59:56'),
(30, '::1', 0, 0, 'delete', 'room_id=4, room_name=Deluxe, description=, state=0, add_date=2015-03-27 09%3A59%3A49, modified_date=2015-03-27 10%3A05%3A41, add_user=1, modified_user=1', 'hotel_mst_room', '2015-03-27 10:05:41'),
(31, '::1', 0, 0, 'update', 'hotel_id=10, hotel_code=000006, hotel_name=Hotel Mirasantika, address=Jalan Wahid, country_code=101, state=12, city=164, hotel_type=Domestic, star=1, telp=0261939484, fax=, email=mirasantika%40yahoo.com, contact_person=Bpk Pendi', 'hotel_mst_hotels', '2015-03-27 10:09:13'),
(32, '::1', 0, 0, 'insert', 'customer_id=, identity_number=1242253, address_1=Gunung Sahari no 23, title=Mr, address_2=, full_name=Abdul Gofur, telp1=02746464, date_of_birth=31-12-1984, telp2=084635222234, place_of_birth=Bogor, email=email%40domain.com, citizen=Indonesia, pricing_policy=2, type=individual, description=, btnsave=Save', 'mst_customer', '2015-03-30 23:43:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_mst_code_configuration`
--

CREATE TABLE IF NOT EXISTS `setting_mst_code_configuration` (
  `code_id` int(10) NOT NULL AUTO_INCREMENT,
  `code_name` char(2) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `setting_mst_code_configuration`
--

INSERT INTO `setting_mst_code_configuration` (`code_id`, `code_name`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'TK', 'Ticketing ', '2015-03-18 14:17:52', '2015-03-26 17:04:05', 1, 1),
(2, 'HI', 'Hotel', '2015-03-18 14:18:20', NULL, 1, NULL),
(3, 'DI', 'Document Code Transaction', '2015-03-18 14:20:15', NULL, 1, NULL),
(4, 'TI', 'Tour Code Invoice', '2015-03-18 14:20:53', '2015-03-21 02:35:21', 1, 1),
(5, 'OI', 'Other Code Invoice', '2015-03-18 14:21:37', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_mst_user`
--

CREATE TABLE IF NOT EXISTS `setting_mst_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `level` int(2) NOT NULL DEFAULT '0',
  `status` int(2) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  `division_id` int(10) DEFAULT '1',
  PRIMARY KEY (`user_id`,`username`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `setting_mst_user`
--

INSERT INTO `setting_mst_user` (`user_id`, `username`, `password`, `full_name`, `level`, `status`, `last_login`, `group_id`, `add_date`, `modified_date`, `add_user`, `modified_user`, `division_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 0, 1, '2015-04-30 10:54:50', 1, NULL, '2014-05-11 15:00:12', NULL, 1, 1),
(3, 'sekda', '21232f297a57a5a743894a0e4a801fc3', 'User Sekretariat Daerah Saja', 1, 1, '2015-03-01 14:15:07', NULL, '2014-05-11 08:43:51', '2014-05-11 09:12:04', 1, 1, 1),
(4, 'aspem', '21232f297a57a5a743894a0e4a801fc3', 'User Asisten Pemerintahan', 1, 1, '2014-05-11 09:00:36', NULL, '2014-05-11 08:44:49', '2014-05-11 09:11:51', 1, 1, 1),
(5, 'walikota', '21232f297a57a5a743894a0e4a801fc3', 'User Tingkat Walikota', 1, 1, '2014-07-25 20:01:06', NULL, '2014-05-11 09:12:31', NULL, 1, NULL, 1),
(6, 'aspp', '21232f297a57a5a743894a0e4a801fc3', 'User Asisten 1', 1, 1, NULL, NULL, '2014-05-11 09:13:00', NULL, 1, NULL, 1),
(7, 'asdum', '21232f297a57a5a743894a0e4a801fc3', 'User Asisten 2', 1, 1, NULL, NULL, '2014-05-11 09:13:17', NULL, 1, NULL, 1),
(8, 'badum', '21232f297a57a5a743894a0e4a801fc3', 'User Bagian Administrasi Umum', 1, 1, NULL, NULL, '2014-05-11 09:13:53', NULL, 1, NULL, 1),
(9, 'dsa', '21232f297a57a5a743894a0e4a801fc3', 'Dedi Sapar', 1, 0, '2015-03-26 16:50:04', 2, '2015-03-26 16:18:53', '2015-03-26 16:59:42', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_deposite`
--

CREATE TABLE IF NOT EXISTS `supplier_deposite` (
  `supplier_deposite_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) DEFAULT '0',
  `deposite` double DEFAULT '0',
  `last_top_up` datetime DEFAULT NULL,
  PRIMARY KEY (`supplier_deposite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `supplier_deposite`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_link` varchar(150) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_position` int(11) NOT NULL,
  `menu_parent_id` int(11) NOT NULL,
  `menu_is_active` set('TRUE','FALSE') NOT NULL DEFAULT 'TRUE',
  `menu_is_report` set('TRUE','FALSE') DEFAULT 'FALSE',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data untuk tabel `sys_menu`
--

INSERT INTO `sys_menu` (`menu_id`, `menu_name`, `menu_link`, `menu_icon`, `menu_position`, `menu_parent_id`, `menu_is_active`, `menu_is_report`) VALUES
(1, 'Dashboard', '/dashboard/main/index', 'fa-dashboard', 1, 0, 'TRUE', 'FALSE'),
(2, 'Ticketing', '#', 'fa-file', 2, 0, 'TRUE', 'FALSE'),
(3, 'Hotel', '#', 'fa-building-o', 3, 0, 'TRUE', 'FALSE'),
(4, 'Document', '#', 'fa-folder-open', 4, 0, 'TRUE', 'FALSE'),
(5, 'Tour', '#', 'fa-suitcase', 5, 0, 'TRUE', 'FALSE'),
(6, 'Other', '#', 'fa-th-list', 6, 0, 'TRUE', 'FALSE'),
(7, 'Setting', '#', 'fa-gear', 7, 0, 'TRUE', 'FALSE'),
(8, 'Configuration', '#', '', 6, 6, 'TRUE', 'FALSE'),
(9, 'Ticket Stock', 'ticketing/ticket_stock/index', '', 0, 2, 'TRUE', 'FALSE'),
(10, 'Invoice', 'ticketing/invoice/index', '', 2, 2, 'TRUE', 'FALSE'),
(11, 'Reports', 'ticketing/reports/index', '', 5, 2, 'TRUE', 'FALSE'),
(12, 'By Customer/Period', 'reports/by_customer_period/index', '', 2, 11, 'TRUE', 'FALSE'),
(13, 'By Airline/Period', 'reports/by_airline_period/index', '', 1, 11, 'TRUE', 'FALSE'),
(14, 'State of Ticket', '#', '', 0, 11, 'TRUE', 'FALSE'),
(15, 'Total Transaction', 'reports/total_transaction/index', '', 0, 11, 'TRUE', 'FALSE'),
(16, 'Refund/Period', '#', '', 0, 11, 'TRUE', 'FALSE'),
(17, 'Supplier', 'supplier/supplier/get_supplier/hotel', '', 3, 18, 'TRUE', 'FALSE'),
(18, 'Configuration', '#', '', 6, 3, 'TRUE', 'FALSE'),
(19, 'Hotels', 'hotel/hotel/index', '', 0, 18, 'TRUE', 'FALSE'),
(20, 'Class', 'hotel/class_hotel/index', '', 0, 18, 'TRUE', 'FALSE'),
(21, 'Room', 'hotel/room/index', '', 0, 18, 'TRUE', 'FALSE'),
(22, 'Hotel Rate', 'hotel/hotel_rate/index', '', 4, 3, 'TRUE', 'FALSE'),
(23, 'Reservation', 'hotel/reservation/index', '', 1, 3, 'TRUE', 'FALSE'),
(24, 'Invoice', 'hotel/invoice/index', '', 2, 3, 'TRUE', 'FALSE'),
(25, 'Report', '#', '', 5, 3, 'TRUE', 'FALSE'),
(26, 'Supplier', 'supplier/supplier/get_supplier/document', '', 5, 57, 'TRUE', 'FALSE'),
(27, 'Document Receipt', 'document/document_receipt/index', '', 3, 4, 'TRUE', 'FALSE'),
(28, 'Create Document', 'document/document/index', '', 4, 4, 'TRUE', 'FALSE'),
(29, 'Reservation', 'document/reservation/index', '', 1, 4, 'TRUE', 'FALSE'),
(30, 'Invoice', 'document/invoice/index', '', 2, 4, 'TRUE', 'TRUE'),
(31, 'Report', 'document/report/index', '', 8, 4, 'TRUE', 'TRUE'),
(32, 'Supplier', 'tour/supplier/index', '', 4, 67, 'TRUE', 'TRUE'),
(33, 'Cost', '/reports/ar_summary/index', '', 0, 67, 'TRUE', 'TRUE'),
(34, 'Main Cost', '/reports/aging_schedule/index', '', 0, 33, 'TRUE', 'TRUE'),
(35, 'Sub Cost', '/reports/ap_statement_summary/index', '', 0, 33, 'TRUE', 'TRUE'),
(36, 'Quotation', 'tour/quotation/index', '', 1, 5, 'TRUE', 'TRUE'),
(37, 'Reservation', 'tour/reservation/index', '', 2, 5, 'TRUE', 'TRUE'),
(38, 'Invoice', 'tour/invoice/index', '', 3, 5, 'TRUE', 'TRUE'),
(39, 'Report', '#', '', 6, 5, 'TRUE', 'TRUE'),
(40, 'Supplier', 'supplier/supplier/get_supplier/other', '', 0, 8, 'TRUE', 'TRUE'),
(41, 'Invoice', 'other/invoice/index', '', 2, 6, 'TRUE', 'FALSE'),
(42, 'Report', 'other/report/index', '', 5, 6, 'TRUE', 'TRUE'),
(43, 'Customer', 'setting/customer/index', '', 0, 7, 'TRUE', 'FALSE'),
(44, 'DP Supplier', 'ticketing/dp_supplier/form', '', 0, 2, 'TRUE', 'FALSE'),
(45, 'Payment', '#', '', 0, 2, 'TRUE', 'FALSE'),
(46, 'Refund', '#', '', 4, 2, 'TRUE', 'FALSE'),
(47, 'Configuration', 'ticketing/configuration/index', '', 6, 2, 'TRUE', 'FALSE'),
(48, 'Supplier', 'supplier/supplier/get_supplier/ticketing', '', 3, 47, 'TRUE', 'FALSE'),
(49, 'Airlines', 'ticketing/airlines/index', '', 0, 47, 'TRUE', 'FALSE'),
(50, 'Payment', '#', '', 0, 19, 'TRUE', 'FALSE'),
(51, 'Refund', '#', '', 0, 19, 'TRUE', 'FALSE'),
(52, 'By Customer Per period', '#', '', 0, 25, 'TRUE', 'FALSE'),
(53, 'By Hotel Per period', '#', '', 0, 25, 'TRUE', 'FALSE'),
(54, 'States of Voucher (Book/Issued) Per period', '#', '', 0, 25, 'TRUE', 'FALSE'),
(55, 'Total Transaction Per period', '#', '', 0, 25, 'TRUE', 'FALSE'),
(56, 'Refund Per period', '#', '', 0, 25, 'TRUE', 'FALSE'),
(57, 'Configuration', '#', '', 9, 4, 'TRUE', 'FALSE'),
(58, 'Hotels', '#', '', 0, 57, 'TRUE', 'FALSE'),
(60, 'Payment', '#', '', 0, 5, 'TRUE', 'FALSE'),
(61, 'Refund', '#', '', 5, 5, 'TRUE', 'FALSE'),
(62, 'By Customer Per period', '#', '', 0, 39, 'TRUE', 'FALSE'),
(63, 'By Tour Per period', '#', '', 0, 39, 'TRUE', 'FALSE'),
(64, 'States of Quotation Per period', '#', '', 0, 39, 'TRUE', 'FALSE'),
(65, 'Total Transaction Per period', '#', '', 0, 39, 'TRUE', 'FALSE'),
(66, 'Refund Per period', '#', '', 0, 39, 'TRUE', 'FALSE'),
(67, 'Configuration', '#', '', 7, 5, 'TRUE', 'FALSE'),
(68, 'Package Tour', '#', '', 0, 67, 'TRUE', 'FALSE'),
(69, 'Sales Order', '#', '', 0, 67, 'TRUE', 'FALSE'),
(70, 'Payment', 'document/payment/index', '', 6, 4, 'TRUE', 'FALSE'),
(71, 'TravelDoc', 'document/traveldoc/index', '', 7, 57, 'TRUE', 'FALSE'),
(72, 'Reservation', 'other/sales_order/index', '', 1, 6, 'TRUE', 'FALSE'),
(73, 'Payment', '#', '', 0, 0, 'TRUE', 'FALSE'),
(74, 'User Account', 'setting/user_account/index', '', 0, 7, 'TRUE', 'FALSE'),
(75, 'Country', '#', '', 0, 7, 'TRUE', 'FALSE'),
(76, 'Reservation', 'ticketing/reservation/index', '', 1, 2, 'TRUE', 'FALSE'),
(77, 'Code Configuration', 'setting/code_configuration/index', '', 0, 7, 'TRUE', 'FALSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_module`
--

CREATE TABLE IF NOT EXISTS `sys_module` (
  `module_id` int(10) NOT NULL AUTO_INCREMENT,
  `code_configuration_id` int(10) DEFAULT NULL,
  `module_name` char(2) DEFAULT NULL,
  `alias_module` varchar(50) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `sys_module`
--

INSERT INTO `sys_module` (`module_id`, `code_configuration_id`, `module_name`, `alias_module`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 1, 'ti', 'ticketing', 'Ticketing Module', '2015-03-18 14:22:21', NULL, 1, NULL),
(2, 2, 'ho', 'hotel', 'Hotel Module', '2015-03-18 14:22:38', NULL, 1, NULL),
(3, 3, 'do', 'document', 'Document Module', '2015-03-18 14:23:27', NULL, 1, NULL),
(4, 4, 'to', 'tour', 'Tour Module', '2015-03-18 14:23:52', NULL, 1, NULL),
(5, 5, 'ot', 'other', 'Other', '2015-03-18 14:24:08', NULL, 1, NULL),
(6, NULL, 'se', NULL, 'Setting Module', '2015-03-18 14:24:33', NULL, 1, NULL),
(7, NULL, 'su', 'supplier', 'Supplier Module', '2015-03-20 01:26:25', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_user_group`
--

CREATE TABLE IF NOT EXISTS `sys_user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sys_user_group`
--

INSERT INTO `sys_user_group` (`user_group_id`, `group_name`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Supervisor'),
(4, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_user_permission`
--

CREATE TABLE IF NOT EXISTS `sys_user_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data untuk tabel `sys_user_permission`
--

INSERT INTO `sys_user_permission` (`permission_id`, `user_group_id`, `user_id`, `menu_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 1, 1, 5),
(6, 1, 1, 6),
(7, 1, 1, 7),
(8, 1, 1, 8),
(9, 0, 0, 9),
(10, 1, 1, 10),
(11, 1, 1, 11),
(12, 1, 1, 12),
(13, 1, 1, 13),
(14, 1, 1, 14),
(15, 1, 1, 15),
(16, 1, 1, 16),
(17, 1, 1, 17),
(18, 1, 1, 18),
(19, 1, 1, 19),
(20, 1, 1, 20),
(21, 1, 1, 21),
(22, 1, 1, 22),
(23, 1, 1, 23),
(24, 1, 1, 24),
(25, 1, 1, 25),
(26, 1, 1, 26),
(27, 1, 1, 27),
(28, 1, 1, 28),
(29, 1, 1, 29),
(30, 1, 1, 63),
(31, 1, 1, 30),
(32, 1, 1, 31),
(33, 1, 1, 32),
(34, 1, 1, 33),
(35, 1, 1, 34),
(36, 1, 1, 35),
(37, 1, 1, 36),
(38, 1, 1, 37),
(39, 1, 1, 38),
(40, 1, 1, 39),
(41, 1, 1, 40),
(42, 1, 1, 41),
(43, 1, 1, 42),
(44, 1, 1, 43),
(45, 1, 1, 44),
(46, 0, 0, 45),
(47, 1, 1, 46),
(48, 1, 1, 47),
(49, 1, 1, 48),
(50, 1, 1, 49),
(51, 1, 1, 50),
(52, 1, 1, 51),
(53, 1, 1, 52),
(54, 1, 1, 53),
(55, 1, 1, 54),
(56, 1, 1, 55),
(57, 1, 1, 56),
(58, 1, 1, 57),
(59, 0, 0, 58),
(76, 1, 1, 76),
(61, 0, 0, 60),
(62, 1, 1, 61),
(63, 1, 1, 62),
(64, 1, 1, 63),
(65, 1, 1, 64),
(66, 1, 1, 65),
(67, 1, 1, 66),
(68, 1, 1, 67),
(69, 1, 1, 68),
(70, 1, 1, 69),
(71, 0, 0, 70),
(72, 1, 1, 71),
(73, 1, 1, 72),
(74, 0, 0, 73),
(75, 1, 1, 74),
(77, 1, 1, 77);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing_invoice`
--

CREATE TABLE IF NOT EXISTS `ticketing_invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(20) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `flight_type` set('Domestic','International') DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `sub_division` varchar(100) DEFAULT NULL COMMENT '1 = print for multiinvoice with, 0 = only single invoice (same price)',
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`,`invoice_number`),
  UNIQUE KEY `id_invoice` (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `ticketing_invoice`
--

INSERT INTO `ticketing_invoice` (`invoice_id`, `invoice_number`, `customer_id`, `invoice_date`, `due_date`, `flight_type`, `division`, `sub_division`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(19, 'TK001412035', 7, '2015-02-11', '2015-02-11', '', '1', '1', '1', '2015-02-11 10:38:37', '2015-02-11 11:45:13', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing_mst_airlines`
--

CREATE TABLE IF NOT EXISTS `ticketing_mst_airlines` (
  `airlines_id` int(10) NOT NULL AUTO_INCREMENT,
  `airlines_name` varchar(100) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `information` text,
  `status` int(1) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `pricing_policy` double DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `deposit_value` double DEFAULT NULL COMMENT 'deprecated',
  `last_topup` date DEFAULT NULL,
  `total_itemcharge` int(3) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`airlines_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `ticketing_mst_airlines`
--

INSERT INTO `ticketing_mst_airlines` (`airlines_id`, `airlines_name`, `address`, `contact_person`, `phone`, `email`, `information`, `status`, `logo`, `currency`, `pricing_policy`, `account_number`, `deposit_value`, `last_topup`, `total_itemcharge`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 'Lion air', 'Lyonlion North Wales', 'Jonah Hex', '576567567', 'jonah@movie.com', 'Lion Air', 1, 'dc97a9fbea8c76599cfe25e3e66bf340.png', 'IDR', 48000, NULL, 10050000, '2014-08-15', 3, '2014-08-02 09:45:00', '2014-08-24 05:00:59', 1, 1),
(2, 'Sriwijaya Air', 'Sriwijaya Road North', 'Sri Wis Balik', '8978686', 'Sri@didikempot.com', 'Sriwijaya Air', 1, '59545c99044acec92a7a5811fc3cfb91.png', 'IDR', 3000, NULL, 9750000, '2014-08-14', 2, '2014-08-02 09:50:44', '2014-08-24 05:00:51', 1, 1),
(3, 'Air Asia', 'Air Saia utara', 'Ahmad Fauxi', '675765675', 'ahmad@yahoo.com', 'Air Asia', 1, 'a7431618c23b6477f3cfaa8a23fc953a.png', 'IDR', 250000, NULL, 17500000, '2014-08-03', 3, '2014-08-02 09:57:41', '2014-08-24 05:00:42', 1, 1),
(4, 'Garuda Indonesia', 'Jl, Batik timur', 'Marni Sumarni', '87768767', 'imar@yahoo.com', 'Garuda Indonesia', 1, '1e505a55920ef8c661e89b8f2f4dda29.png', 'IDR', 48000, NULL, 17000000, '2014-08-03', 9, '2014-08-02 09:58:14', '2014-08-24 05:00:36', 1, 1),
(5, 'Batik air', 'Jl. Baypass Amerika Tengah', 'David Jones', '6675765675', 'david@david.com', 'Batik air', 1, 'fffbf93908100a373efee4770d4bda79.png', 'IDR', 13000, NULL, 1750000, '2014-08-03', 3, '2014-08-02 10:00:05', '2014-08-24 05:00:28', 1, 1),
(6, 'Tiger Air', 'Jl. Tiger is Macan nomor 50 Medan Merdeka', 'Macan Ompong', '76767676', 'macan@tigeriar.com', 'Tiger Air', 1, 'e28f4cbca1011d78bdfc4de8ba920f8c.png', 'IDR', 125000, NULL, 7230000, '2014-08-03', 2, '2014-08-02 10:03:45', '2014-08-24 05:00:21', 1, 1),
(7, 'Citilink', 'Jl. Siryalmunayo Amerika Tengah', 'Sitiling', '565465', 'siti@ling.com', 'Citilink', 1, 'e65bf17273a697d440d1726edfbb8ede.png', 'IDR', 37500, NULL, 3500000, '2014-08-03', 6, '2014-08-02 10:10:19', '2014-08-24 05:00:13', 1, 1),
(8, 'Malindo air', 'Jl, Malindo Mulando Mulendo seratus', 'Jeni', '9767676', 'jen@jun.com', 'Malindo air', 1, '20394e76b5520dc42400a5b769fae3aa.png', 'IDR', 90000, NULL, 2500000, '2014-08-03', 6, '2014-08-02 10:10:37', '2014-08-24 05:00:06', 1, 1),
(9, 'Wings Air', 'Jl. Daan Mogot No. 30 Jakarta Barat', 'Welly Gusmano', '787567567565', 'welly@wingsair.com', 'Wings Air', 1, '3d9b57335fe5947f08d3d93a90863455.png', 'IDR', 15000, NULL, 1500000, '2014-08-03', 8, '2014-08-02 10:12:20', '2014-08-24 04:59:59', 1, 1),
(10, 'Merpati', 'Jl. Merpati Kemerdekaan\r\nJakarta Utara', 'Merpati Saja', '0545424524', 'merpati@yahoo.com', 'Merpati', 1, 'a502a1e37cffc9a8f8be990058fe0a4f.png', 'IDR', 45000, NULL, 10000000, '2014-08-03', 3, '2014-08-02 10:12:31', '2014-08-24 04:59:52', 1, 1),
(11, 'Xpress Air', 'Jl. Apa saja Kemana Saja', 'Reni', '9787687676', 'reni@google.com', 'Xpress Air', 1, 'ea5e4255242b40f4a153bd5d2790d793.png', 'IDR', 45000, NULL, 3600000, '2014-08-02', 4, '2014-08-02 10:12:57', '2014-08-24 12:29:32', 1, 1),
(12, 'Batavia Air', 'Jl. H. Daimun No. 9i RT.001/09 Sunter Jaya', 'Risma', '087687676', 'risma@yahoo.com', 'Batavia Air', 1, '7e8d58d9593fa6b9df2026bd8e3ad240.png', 'IDR', 25000, NULL, 13000000, '2014-08-14', 6, '2014-08-02 10:13:06', '2014-08-24 04:56:28', 1, 1),
(17, 'Air Force One', 'JL. Jalan Sehat 2', 'Me', '021-0000002', 'love@me.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-03-12 10:28:29', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing_mst_vendors`
--

CREATE TABLE IF NOT EXISTS `ticketing_mst_vendors` (
  `vendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) NOT NULL DEFAULT '0',
  `vendor_code` varchar(20) NOT NULL,
  `vendor_name` varchar(100) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `airlines_id` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `information` text,
  `deposit_value` double DEFAULT NULL,
  `last_topup` date DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`,`group_id`,`vendor_code`),
  UNIQUE KEY `id_vendor` (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `ticketing_mst_vendors`
--

INSERT INTO `ticketing_mst_vendors` (`vendor_id`, `group_id`, `vendor_code`, `vendor_name`, `type_id`, `airlines_id`, `status`, `information`, `deposit_value`, `last_topup`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, 0, 'LA01', 'Lion Air 201', 4, 1, 1, 'Percobaan Data', 223000000, '2014-09-13', '2014-09-03 19:33:14', NULL, 1, NULL),
(2, 0, 'IATA', 'IATA International', 3, NULL, 1, 'Percobaan Data', -2000000, NULL, '2014-09-13 05:45:59', NULL, 1, NULL),
(3, 0, 'BSP', 'BSP International', 2, NULL, 1, 'BSP Dasar', -3000000, NULL, '2014-09-13 05:46:25', NULL, 1, NULL),
(4, 0, 'SUP8898', 'Sriwijaya Air', 4, 2, 1, 'Percobaan Data', 150000000, '2014-09-13', '2014-09-13 10:14:59', NULL, 1, NULL),
(5, 0, 'SUP556', 'Air Asia', 4, 3, 1, '', 48600000, '2014-09-13', '2014-09-13 10:15:14', NULL, 1, NULL),
(6, 0, 'SU10', 'Citilink', 4, 7, 1, '', -2000000, NULL, '2014-09-14 05:18:58', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing_report`
--

CREATE TABLE IF NOT EXISTS `ticketing_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `airlines_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  PRIMARY KEY (`report_id`,`customer_id`,`airlines_id`,`state_id`,`transaction_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `ticketing_report`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing_ticket_stock`
--

CREATE TABLE IF NOT EXISTS `ticketing_ticket_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `prefix` char(10) DEFAULT NULL,
  `start` char(5) DEFAULT NULL,
  `until` char(5) DEFAULT NULL,
  `total_ticket` double DEFAULT NULL,
  `stock_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `description` text,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`stock_id`,`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `ticketing_ticket_stock`
--

INSERT INTO `ticketing_ticket_stock` (`stock_id`, `vendor_id`, `group_id`, `prefix`, `start`, `until`, `total_ticket`, `stock_date`, `status`, `description`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(2, 3, 0, 'BSP', '001', '50', 51, '2014-09-13', 1, 'BSP Ticket Insert', '2014-09-13 07:03:10', NULL, 1, NULL),
(3, 2, 0, 'IA', '50', '55', 56, '2014-09-13', 1, '', '2014-09-13 07:45:21', NULL, 1, NULL),
(4, 3, 0, 'SP', '001', '100', 101, '2014-09-14', 1, 'Test', '2014-09-14 05:21:14', NULL, 1, NULL),
(5, 2, 0, 'IATA', '001', '100', 101, '2014-09-14', 1, 'Test', '2014-09-14 16:32:17', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tour_mst_booking`
--

CREATE TABLE IF NOT EXISTS `tour_mst_booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `book_code` varchar(20) NOT NULL,
  `book_date` date DEFAULT NULL,
  `quotation_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `transaction_number` varchar(100) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `sub_division` varchar(100) DEFAULT NULL,
  `cp` varchar(100) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`booking_id`,`book_code`),
  UNIQUE KEY `invoice_id` (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tour_mst_booking`
--

INSERT INTO `tour_mst_booking` (`booking_id`, `book_code`, `book_date`, `quotation_id`, `customer_id`, `transaction_number`, `division`, `sub_division`, `cp`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(5, 'TB14120005', '2015-01-26', 4, 3, '14000014', 'HRD', 'A', 'sdfj', '2015-01-26 07:11:06', NULL, 1, NULL),
(6, 'TB14120006', '2015-02-06', 5, 5, '14000039', 'HRD', 'A', 'izal', '2015-02-06 05:07:10', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tour_mst_quotation`
--

CREATE TABLE IF NOT EXISTS `tour_mst_quotation` (
  `quotation_id` int(10) NOT NULL AUTO_INCREMENT,
  `airlines_id` int(10) DEFAULT NULL,
  `code_tour` varchar(100) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `season` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `pax` int(10) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tour_mst_quotation`
--

INSERT INTO `tour_mst_quotation` (`quotation_id`, `airlines_id`, `code_tour`, `valid_from`, `valid_to`, `season`, `description`, `type`, `pax`, `region`, `currency`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(4, 3, '2DTOHONGKONG', '2015-01-12', '2015-01-31', 'Holiday', '2 DAY TO HONGKONG', 'Package', 15, 'Asia', 'IDR', '2015-01-12 10:30:20', NULL, 1, NULL),
(5, 3, '2DTOBALI', '2015-02-07', '2015-02-28', 'Holiday', '2 hari ke bali', 'Group', 15, 'Asia', 'IDR', '2015-02-06 05:06:33', NULL, 1, NULL),
(6, 3, '121', '2015-02-26', '2015-02-28', 'Holiday', '121', 'Package', 2, 'Asia', 'IDR', '2015-02-26 10:42:02', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_ticketing_dp_supplier`
--

CREATE TABLE IF NOT EXISTS `trans_ticketing_dp_supplier` (
  `dp_supplier_id` int(10) NOT NULL AUTO_INCREMENT,
  `cashier_number` varchar(10) DEFAULT NULL,
  `transaction_number` varchar(10) DEFAULT NULL,
  `transaction_code` set('DC','DS') NOT NULL,
  `date` date NOT NULL,
  `dp_slip_number` varchar(20) NOT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `currency` varchar(5) NOT NULL,
  `amount` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `outstanding` double DEFAULT NULL,
  `add_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(5) DEFAULT NULL,
  `modified_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`dp_supplier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `trans_ticketing_dp_supplier`
--

INSERT INTO `trans_ticketing_dp_supplier` (`dp_supplier_id`, `cashier_number`, `transaction_number`, `transaction_code`, `date`, `dp_slip_number`, `supplier_id`, `currency`, `amount`, `paid`, `outstanding`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(1, '0115030012', '0000000001', 'DC', '2015-03-01', 'DC0115030023', 1, 'IDR', 1200000, 10000, 1000, '2015-03-03 21:31:20', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_ticketing_dp_supplier_detail`
--

CREATE TABLE IF NOT EXISTS `trans_ticketing_dp_supplier_detail` (
  `dp_supplier_detail_id` int(10) NOT NULL AUTO_INCREMENT,
  `dp_supplier_id` int(10) NOT NULL,
  `payment_method` set('cash','cheque','credit') NOT NULL,
  `payment_currency` varchar(50) NOT NULL,
  `payment_amount` double NOT NULL,
  `convert_currency` varchar(50) NOT NULL,
  `convert_amount` double NOT NULL,
  `rate` double NOT NULL,
  `description` text NOT NULL,
  `add_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `add_user` int(10) NOT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`dp_supplier_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `trans_ticketing_dp_supplier_detail`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_ticketing_invoice`
--

CREATE TABLE IF NOT EXISTS `trans_ticketing_invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(20) NOT NULL,
  `transaction_number` varchar(20) DEFAULT NULL,
  `pnr_id` varchar(100) DEFAULT NULL,
  `pnr_code` varchar(100) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `airport_id` int(10) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `transaction_type` set('1','2') NOT NULL DEFAULT '1' COMMENT '1 = Manual, 2 = Automatic',
  `flight_type` set('Domestic','International') NOT NULL DEFAULT 'Domestic',
  `airlines_id` int(10) DEFAULT NULL,
  `booking_code` varchar(20) DEFAULT NULL,
  `route` varchar(225) DEFAULT NULL,
  `total_passenger` int(10) DEFAULT NULL,
  `multi_invoice` set('0','1') DEFAULT NULL COMMENT '1 = print for multiinvoice with, 0 = only single invoice (same price)',
  `base_fare` double DEFAULT NULL COMMENT 'deprecated',
  `commission` double DEFAULT NULL COMMENT 'deprecated',
  `tax` double DEFAULT NULL COMMENT 'deprecated',
  `sell_price` double DEFAULT NULL COMMENT 'deprecated',
  `total_basefare` double DEFAULT NULL,
  `total_commission` double DEFAULT NULL,
  `total_tax` double DEFAULT NULL,
  `total_sell_price` double DEFAULT NULL,
  `ppn` double DEFAULT NULL,
  `currency` char(5) DEFAULT NULL,
  `description` text,
  `status` set('0','1') DEFAULT '0' COMMENT '0 = proces, 1 = selesai/paid',
  `agent_type` varchar(10) DEFAULT NULL,
  `printed` int(1) NOT NULL DEFAULT '0',
  `printed_by` int(10) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `posting_status` int(1) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `add_user` int(10) DEFAULT NULL,
  `modified_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`,`invoice_number`),
  UNIQUE KEY `invoice_id` (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `trans_ticketing_invoice`
--

INSERT INTO `trans_ticketing_invoice` (`invoice_id`, `invoice_number`, `transaction_number`, `pnr_id`, `pnr_code`, `supplier_id`, `customer_id`, `airport_id`, `invoice_date`, `due_date`, `group_id`, `transaction_type`, `flight_type`, `airlines_id`, `booking_code`, `route`, `total_passenger`, `multi_invoice`, `base_fare`, `commission`, `tax`, `sell_price`, `total_basefare`, `total_commission`, `total_tax`, `total_sell_price`, `ppn`, `currency`, `description`, `status`, `agent_type`, `printed`, `printed_by`, `account_number`, `posting_status`, `add_date`, `modified_date`, `add_user`, `modified_user`) VALUES
(15, 'TK001409011', '3325', NULL, NULL, 2, 1, 1, '2014-09-01', '2014-09-02', 0, '1', 'Domestic', 4, '2412', 'jrj', 2, NULL, 1000000, 200000, 100000, 600000, 2000000, 400000, 200000, 1200000, NULL, 'IDR', 'gfdh', '', 'LCC', 0, NULL, NULL, NULL, '2014-09-21 05:37:44', NULL, 1, NULL),
(16, 'TK001409012', '4235', NULL, NULL, 1, 4, 1, '2014-10-01', '2014-10-03', 0, '1', 'Domestic', 1, '21312', 'f', 4, NULL, 11421, 412412, 12412, 214, NULL, NULL, NULL, NULL, NULL, 'AED', '21wecf', '', 'BSP', 0, NULL, NULL, NULL, '2014-10-28 01:31:44', NULL, 1, NULL),
(17, 'TK001409013', '12415', NULL, NULL, 1, 6, 1, '2014-10-01', '2014-10-02', 0, '1', 'Domestic', 1, '211512', 'fdhdh', 2, NULL, 124, 1412, 214154, 21312321, NULL, NULL, NULL, NULL, NULL, 'AED', 'ggwdw', '', 'BSP', 0, NULL, NULL, NULL, '2014-10-28 01:42:12', NULL, 1, NULL),
(18, 'TK001409014', 'wegew', NULL, NULL, 2, 4, 1, '0000-00-00', '0000-00-00', 0, '1', 'Domestic', 1, 'egewgew', 'ewgew', 20, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'AED', 'egew', '', 'LCC', 0, NULL, NULL, NULL, '2014-11-16 09:33:33', NULL, 1, NULL),
(19, 'TK001409015', 'ewtewgt', NULL, NULL, 1, 3, 1, '2014-11-05', '2014-11-21', 0, '1', 'Domestic', 1, 'ewtwewe', 'wefewg', 3, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'AED', 'wegew', '', 'BSP', 0, NULL, NULL, NULL, '2014-11-16 10:32:32', NULL, 1, NULL),
(20, 'TK001409012', NULL, NULL, '656565656', 4, 8, 1, '2014-11-13', '2014-11-21', 0, '1', 'Domestic', 1, '775656565', 'Percobaan Data', 2, NULL, 550000, 200000, 30000, 40000, 1100000, 400000, 60000, 80000, NULL, 'AED', 'Ok', '', 'BSP', 0, NULL, NULL, NULL, '2014-11-23 03:26:41', '2014-11-23 05:38:17', 1, 1),
(21, 'TK001409013', NULL, NULL, '2334345', 1, 6, 18, '2014-11-13', '2014-11-20', 0, '1', 'Domestic', 6, '4366545467456', 'PErcobaan', 2, NULL, 12121212, 100000, 1000000, 1000000, 24242424, 200000, 2000000, 2000000, NULL, 'AED', '', '', 'LCC', 0, NULL, NULL, NULL, '2014-11-23 05:44:55', '2014-11-23 05:45:48', 1, 1),
(22, 'TK001411014', NULL, NULL, NULL, 2, 7, NULL, '2014-12-04', '2014-12-26', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'Percobaan', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:54:27', NULL, 1, NULL),
(23, 'TK001411014', NULL, NULL, NULL, 2, 7, NULL, '2014-12-04', '2014-12-26', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'Percobaan', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:54:44', NULL, 1, NULL),
(24, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:58:26', NULL, 1, NULL),
(25, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:58:52', NULL, 1, NULL),
(26, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:59:04', NULL, 1, NULL),
(27, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:59:18', NULL, 1, NULL),
(28, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 14:59:53', NULL, 1, NULL),
(29, 'TK001411016', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'sfsds', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 15:00:15', NULL, 1, NULL),
(30, 'TK001411022', NULL, NULL, NULL, 2, 6, NULL, '2014-12-04', '2014-12-25', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'Percobaan Lagi Pusing', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 15:07:59', NULL, 1, NULL),
(31, 'TK001411023', '0114030002', NULL, NULL, 1, 4, NULL, '2014-12-04', '2014-12-26', 0, '1', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AED', 'Percobaan', '', 'LCC', 0, NULL, NULL, NULL, '2014-12-04 15:18:16', NULL, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
