-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 08:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tp4pbo2021_petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `stok_pakan`
--

CREATE TABLE `stok_pakan` (
  `id` int(11) NOT NULL,
  `kategori_hewan` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_pakan`
--

INSERT INTO `stok_pakan` (`id`, `kategori_hewan`, `merk`, `berat`, `harga`, `stok`) VALUES
(2, 'Kucing', 'Ori Cat Premium Cat Food', '1 kg', 18750, 5),
(4, 'Ikan', 'Takari', '500 gr', 18000, 8),
(5, 'Kucing', 'Meo  ', '11 kg', 68500, 7),
(7, 'Ikan', 'Takari', '1 kg', 35000, 9),
(8, 'Kucing', 'Ori Cat Premium Cat Food', '20 kg', 345000, 2),
(9, 'Kucing', 'Vitakraft Premium Menu Cockatiels ', '1 kg', 89000, 2),
(10, 'Burung', 'Zupreem Fruitblend', '900 gr', 145000, 7),
(11, 'Kucing', 'Equilibrio Kitten   ', '1.5 kg', 125000, 8),
(12, 'Kucing', 'Royal Canin Urinary Care', '400 gr', 63600, 15),
(13, 'Kucing', 'Equilibrio Adult Cat', '1.5 kg', 115000, 4),
(14, 'Kucing', 'Meo Salmon', '1 kg', 38600, 6),
(17, 'Kucing', 'Takari', '1 kg', 18750, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
