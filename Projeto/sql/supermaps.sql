-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 08:53 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapa`
--

CREATE TABLE `mapa` (
  `id` int(11) NOT NULL,
  `largura` int(11) NOT NULL DEFAULT '10',
  `altura` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapa`
--

INSERT INTO `mapa` (`id`, `largura`, `altura`) VALUES
(0, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `prateleira`
--

CREATE TABLE `prateleira` (
  `id` int(11) NOT NULL,
  `andar` int(11) NOT NULL,
  `produtoAndar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prateleira`
--

INSERT INTO `prateleira` (`id`, `andar`, `produtoAndar`) VALUES
(0, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produto_prateleira`
--

CREATE TABLE `produto_prateleira` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_prateleira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `email`, `senha`) VALUES
(1, 'vinicius', 'vinicius@mail.com', 'vinicius'),
(2, 'professor', 'professor@mail.com', 'professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prateleira`
--
ALTER TABLE `prateleira`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_prateleira`
--
ALTER TABLE `produto_prateleira`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_prateleira` (`id_prateleira`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produto_prateleira`
--
ALTER TABLE `produto_prateleira`
  ADD CONSTRAINT `produto_prateleira_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `produto_prateleira_ibfk_2` FOREIGN KEY (`id_prateleira`) REFERENCES `prateleira` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
