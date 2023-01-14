-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2023 pada 00.59
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animelist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `animelist`
--

CREATE TABLE `animelist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL,
  `episode` varchar(100) DEFAULT NULL,
  `studio` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `animelist`
--

INSERT INTO `animelist` (`id`, `name`, `rating`, `episode`, `studio`, `image`) VALUES
(7, 'Bleach Thousand Year Blood War (2022)', '9.14', '13 Episodes', 'Pierrot Studio', '63c16facb5779.jpeg'),
(8, 'Attack On Titan Season 3 Part 2 (2019)', '9.06', '10 Episodes', 'Wit Studio', '63c16fcab2fc1.jpg'),
(9, 'Death Note (2006)', '8.62', '37 Episodes', 'Madhouse Studio', '63c1701b0c8cd.jpg'),
(10, 'Mob Psycho 100 Season 2 (2019)', '8.81', '13 Episodes', 'Bones Studio', '63c16fe674d21.jpg'),
(12, 'Dragon Ball Z (1989)', '8.16', '291 Episodes', 'Toei Animation', '63c1705487f02.jpg'),
(13, 'Naruto Shippuden (2007)', '8.25', '500 Episodes', 'Pierrot Studio', '63c17047ddd54.jpg'),
(14, 'Chainsaw Man (2022)', '8.71', '12 Episodes', 'MAPPA Studio', '63c16ff491ca0.png'),
(15, 'Ousama Ranking (2021)', '8.57', '23 Episodes', 'Wit Studio', '63c1702ac876a.jpg'),
(16, 'One Piece (1999)', '8.68', '1043 Episodes (On Going)', 'Toei Animation', '63c17006755c3.jpg'),
(17, 'Gintama Season 4 (2015)', '9.07', '51 Episodes', 'Bandai Namco Pictures', '63c16fbe14a52.jpg'),
(18, 'Monster (2004)', '8.85', '74 Episodes', 'Madhouse Studio', '63c16fd849593.jpg'),
(19, 'Fullmetal Alchemist Brotherhood (2009)', '9.11', '64 Episodes', 'Bones Studio', '63c16fb4e481b.jpg'),
(20, 'One Punch Man (2015)', '8.50', '12 Episodes', 'Madhouse Studio', '63c170366c389.jpg'),
(21, 'Captain Tsubasa (1983)', '7.33', '128 Episodes', 'Tsuchida Productions', '63c1706b052d7.jpg'),
(23, 'Jujutsu Kaisen (2020)', '8.66', '24 Episodes', 'MAPPA Studio', '63c16dd0a9f28.jpg'),
(24, 'Blue Lock (2022)', '8.27', '24 Episodes (On Going)', '8bit Studio', '63c16dedc6676.jpg'),
(25, 'Slam Dunk (1993)', '8.54', '101 Episodes', 'Toei Animation', '63c16e0360a7d.jpg'),
(26, 'Hunter x Hunter (2011)', '9.04', '148 Episodes', 'Madhouse Studio', '63c16f37a4b7e.jpg'),
(27, 'Yu-Gi-Oh Duel Monsters (2000)', '7.47', '248 Episodes', 'Gallop Studio', '63c16dbddb317.jpg'),
(28, 'Naruto (2002)', '7.98', '220 Episodes', 'Pierrot Studio', '63c17353d0418.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$Js/9fYSqQacfb1ApiRJXt.3vESNmJ3DPMeUD8axaT1ru6Hdi7EpAC'),
(3, 'arief', '$2y$10$UEoJ70lrio4B60qJOO5fZe0FC060lOfCG0t72.XuPMUcV7w0mF66.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `animelist`
--
ALTER TABLE `animelist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `animelist`
--
ALTER TABLE `animelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
