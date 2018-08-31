-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Agu 2018 pada 13.37
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbookstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(4, 'Programmer '),
(5, 'TKJ'),
(9, 'Komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mybooks`
--

CREATE TABLE `tbl_mybooks` (
  `book_id` int(11) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mybooks`
--

INSERT INTO `tbl_mybooks` (`book_id`, `ISBN`, `category_id`, `title`, `author`, `price`, `publisher_id`, `img`, `publish_date`) VALUES
(8, '123456', 4, 'Belajar android untuk pemula 2', 'Kita', 90000, 4, 'weather.png', '2018-08-10'),
(9, '2834327', 5, 'Administrasi Server', 'Bukan saya', 78000, 3, '665091.jpg', '2018-08-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_publishers`
--

CREATE TABLE `tbl_publishers` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_publishers`
--

INSERT INTO `tbl_publishers` (`publisher_id`, `publisher_name`) VALUES
(3, 'REPUBLIKA'),
(4, 'Matahari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_mybooks`
--
ALTER TABLE `tbl_mybooks`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `FK_tbl_mybooks_tbl_categories` (`category_id`),
  ADD KEY `FK_tbl_mybooks_tbl_publishers` (`publisher_id`);

--
-- Indexes for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_mybooks`
--
ALTER TABLE `tbl_mybooks`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_mybooks`
--
ALTER TABLE `tbl_mybooks`
  ADD CONSTRAINT `FK_tbl_mybooks_tbl_categories` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`category_id`),
  ADD CONSTRAINT `FK_tbl_mybooks_tbl_publishers` FOREIGN KEY (`publisher_id`) REFERENCES `tbl_publishers` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
