-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2017 às 14:47
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `preco` float NOT NULL,
  `qtd` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `permissao`, `status`, `criado`, `modificado`) VALUES
(1, 'teste', 'teste', '81dc9bdb52d04dc20036dbd8313ed055', 'teste@teste.com', 20, 1, '2017-08-23 07:10:00', NULL),
(2, 'teste2', 'teste2', '81dc9bdb52d04dc20036dbd8313ed055', 'teste2@teste.com', 20, 1, '0000-00-00 00:00:00', NULL),
(3, 'teste3', 'teste3', '81dc9bdb52d04dc20036dbd8313ed055', 'teste3@teste.com', 10, 1, '2017-08-23 11:57:06', NULL),
(4, 'teste2', 'teste2', 'ec6a6536ca304edf844d1d248a4f08dc', 'teste2@teste.com', 10, 1, '2017-08-23 12:16:02', NULL),
(5, 'teste2', 'teste2', '2e99bf4e42962410038bc6fa4ce40d97', 'teste2@teste.com', 20, 1, '2017-08-23 12:16:09', NULL),
(6, 'teste2', 'teste2', '81dc9bdb52d04dc20036dbd8313ed055', 'teste2@teste.com', 20, 1, '2017-08-23 12:16:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
