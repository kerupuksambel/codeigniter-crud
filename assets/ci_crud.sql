-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2019 pada 11.43
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(5) NOT NULL,
  `data_name` varchar(128) NOT NULL,
  `data_value` text NOT NULL,
  `permission` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `data_name`, `data_value`, `permission`) VALUES
(9, 'This is a dummy content', 'This should be interesting. We finished our first sensor sweep of the neutral zone. This is not about revenge. Your shields were failing, sir. We know you\'re dealing in stolen ore. But I wanna talk about the assassination attempt on Lieutenant Worf. When has justice ever been as simple as a rule book? Yes, absolutely, I do indeed concur, wholeheartedly! You did exactly what you had to do. You considered all your options, you tried every alternative and then you made the hard choice. We could cause a diplomatic crisis. Take the ship into the Neutral Zone Some days you get the bear, and some days the bear gets you. Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody.', 0),
(13, 'Text 1', 'Worf, It\'s better than music. It\'s jazz. I\'ll be sure to note that in my log. When has justice ever been as simple as a rule book? We finished our first sensor sweep of the neutral zone. Smooth as an android\'s bottom, eh, Data? Yes, absolutely, I do indeed concur, wholeheartedly! What? We\'re not at all alike! Computer, lights up! I\'m afraid I still don\'t understand, sir. ', 1),
(14, 'Text 2', 'Then maybe you should consider this: if anything happens to them, Starfleet is going to want a full investigation. You\'re going to be an interesting companion, Mr. Data. We have a saboteur aboard. We know you\'re dealing in stolen ore. But I wanna talk about the assassination attempt on Lieutenant Worf.', 0),
(15, 'Text 3', 'Damage report! Flair is what marks the difference between artistry and mere competence. The look in your eyes, I recognize it. You used to have it for me. I am your worst nightmare! I\'d like to think that I haven\'t changed those things, sir. We could cause a diplomatic crisis. ', 0),
(16, 'Text 4', 'Take the ship into the Neutral Zone Well, I\'ll say this for him - he\'s sure of himself. Your head is not an artifact! How long can two people talk about nothing? Wouldn\'t that bring about chaos? About four years. I got tired of hearing how young I looked.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `pwd`, `permission`) VALUES
(3, 'admin', '123456', 1),
(4, 'admin2', 'qwerty', 1),
(6, 'a', 'a', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
