-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 10:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
(0, 9, 9);

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
(3, 0, 0),
(4, 50, 50),
(5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`) VALUES
(1, 'arroz', 10),
(2, 'feijao', 20),
(5, 'carne', 20),
(6, 'tomate', 20),
(7, 'alface', 20),
(8, 'macarra', 20);

-- --------------------------------------------------------

--
-- Table structure for table `produto_prateleira`
--

CREATE TABLE `produto_prateleira` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_prateleira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto_prateleira`
--

INSERT INTO `produto_prateleira` (`id`, `id_produto`, `id_prateleira`) VALUES
(3, 1, 3),
(14, 8, 3),
(15, 2, 3),
(16, 5, 3),
(17, 6, 3),
(18, 7, 3),
(19, 1, 5),
(20, 2, 5),
(21, 5, 5),
(22, 6, 5),
(23, 7, 5);

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
(1, 'vinicius', 'viniciuso970@gmail.com', 'vinicius'),
(2, 'eduggiani', 'eduggiani@hotmail.com', '1234567'),
(3, 'joao', 'oi@oi.com', '123');

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
-- AUTO_INCREMENT for table `prateleira`
--
ALTER TABLE `prateleira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produto_prateleira`
--
ALTER TABLE `produto_prateleira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
