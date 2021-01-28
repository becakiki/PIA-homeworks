-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 05:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `idFilm` int(10) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `scenarista` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `reziser` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `producentskaKuca` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `godina` int(60) NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trajanje` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`idFilm`, `naslov`, `opis`, `scenarista`, `reziser`, `producentskaKuca`, `godina`, `slika`, `trajanje`) VALUES
(1, 'Stigla Vam je posta', 'Dobili ste poštu je američka romantična komedija iz 1998. godine koju je režirala Nora Ephron, a u glavnim ulogama su Tom Hanks i Meg Rian. Inspirisana mađarskom predstavom Parfumerija iz 1937. Mikloša Lasla, zajedno sa njom napisali su Nora i Delia Ephron.', 'Nora Ephron', 'Nora Ephron', '20 Centery Fox', 1998, 'images/posteri/1.jpg', 120),
(13, 'Bilo jednom u Holivudu', 'Bilo jednom u Holivudu (engl. Once Upon a Time in Hollywood) je američki dramedični film iz 2019. godine reditelja i scenariste Kventina Tarantina, dok su producenti filma Dejvid Hejman, Šenon Makintoš i Kventin Tarantino. Naslovne uloge tumače Leonardo Dikaprio kao Rik Dalton i Bred Pit kao Klif But, dok su u ostalim ulogama Margo Robi, Emil Herš, Margaret Kueli, Timoti Olifant, Ostin Batler, Dakota Faning, Brus Dern i Al Pačino. Radnja filma se dešava 1969. godine u Los Anđelesu i prati život glumca Rika Daltona i njegovog kaskadera Klifa Buta, kao i njihovo preživljavanje u promenjivoj filmskoj industriji, uz „razne priče u modernoj bajci koja odaje počast poslednjim trenucima zlatnog doba u Holivudu.”', 'Kvantin Tarantino', 'Kventin Tarantino', 'Columbia Pictures', 2019, 'images/posteri/2.jpg', 161),
(14, 'Dani mrmota', 'Dan mrmota (engl. Groundhog Day) je američka romantična komedija sa elementima fantastike u režiji Harolda Rejmisa. Scenaristi filma su Rejmis i Deni Rubin.  Radnja filma prati arogantnog i egocentričnog meteorologa Fila Konorsa, koji zajedno sa svojom TV ekipom odlazi u gradić Panksatoni odakle treba da izveštava o prazniku pod nazivom Dan mrmota. U danima koji slede Fil shvata da se datum i dalje nije promenio i primoran je da iznova proživljava isti dan u krug, što ga vremenom navodi na to da preispita svoj život i prioritete. Glavne uloge tumače Bil Mari i Endi Makdauel.', 'Harold Rejmis', 'Harold Rejmis', 'Columbia pictures', 1993, 'images/posteri/3.jpg', 101),
(15, 'Forest Gump', 'Forest Gamp (engl. Forrest Gump) je američki film iz 1994. režisera Roberta Zemekisa, snimljen po romanu Vinstona Gruma iz 1985. godine.  Film je imao veliki komercijalni uspeh, iako je producentska kuća Paramaunt tvrdila suprotno, zbog čega Grumu nije plaćen dogovoren iznos honorara. Zbog toga Grum nije dozvolio da se snimi nastavak filma po njegovom romanu Gamp i kompanija.  Film je nominovan za 13 Oskara, a osvojio je šest, među kojima je i Oskar za najboljeg glumca (Tom Henks), najboljeg režisera (Robert Zemekis) i najbolji film. Film se znatno razlikuje od romana.', 'Vinston Grum', 'Robert Zemeckis', 'Paramaunt pictures', 1994, 'images/posteri/4.jpg', 142);

-- --------------------------------------------------------

--
-- Table structure for table `glumci`
--

CREATE TABLE `glumci` (
  `idGlumac` int(10) NOT NULL,
  `idFilm` int(10) NOT NULL,
  `glumac` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glumci`
--

INSERT INTO `glumci` (`idGlumac`, `idFilm`, `glumac`) VALUES
(1, 1, 'Tom Hanks'),
(2, 1, 'Meg Ryan'),
(13, 1, 'Greg Kinnear'),
(14, 1, 'Parker Posey'),
(15, 13, 'Brad Pitt'),
(16, 13, 'Leonardo DiCaprio'),
(17, 13, 'Margot Robbie'),
(18, 13, 'Emile Hirsch'),
(19, 14, 'Bill Murray'),
(20, 14, 'Andie MacDowell'),
(21, 14, 'Chris Elliott'),
(22, 14, 'Stephen Tobolowsky'),
(23, 15, 'Tom Hanks'),
(24, 15, 'Rebecca Williams'),
(25, 15, 'Sally Field'),
(26, 15, 'Michael Conner Humphreys');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `idOcena` int(10) NOT NULL,
  `idFilm` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `ocena` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`idOcena`, `idFilm`, `id`, `ocena`) VALUES
(44, 1, 9, 8),
(45, 15, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(50) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `ime`, `prezime`, `email`, `korisnicko`, `lozinka`) VALUES
(1, 'Kristina', 'Kovacevic', 'kovacevic782@gmail.com', 'kristina', 'kristina123'),
(9, 'Jelena', 'Spasic', 'jelenaspasicbuba@gmail.com', 'jelena', 'jelena');

-- --------------------------------------------------------

--
-- Table structure for table `zanrovi`
--

CREATE TABLE `zanrovi` (
  `idZanr` int(10) NOT NULL,
  `idFilm` int(10) NOT NULL,
  `zanr` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zanrovi`
--

INSERT INTO `zanrovi` (`idZanr`, `idFilm`, `zanr`) VALUES
(1, 1, 'Ljubavni'),
(2, 1, 'Drama'),
(3, 13, 'Komedija'),
(4, 13, 'Dramedija'),
(5, 14, 'Komedija'),
(6, 14, 'Ljubavni'),
(7, 15, 'Drama'),
(8, 15, 'Romansa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`);

--
-- Indexes for table `glumci`
--
ALTER TABLE `glumci`
  ADD PRIMARY KEY (`idGlumac`);

--
-- Indexes for table `ocene`
--
ALTER TABLE `ocene`
  ADD PRIMARY KEY (`idOcena`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanrovi`
--
ALTER TABLE `zanrovi`
  ADD PRIMARY KEY (`idZanr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `idFilm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `glumci`
--
ALTER TABLE `glumci`
  MODIFY `idGlumac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ocene`
--
ALTER TABLE `ocene`
  MODIFY `idOcena` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zanrovi`
--
ALTER TABLE `zanrovi`
  MODIFY `idZanr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
