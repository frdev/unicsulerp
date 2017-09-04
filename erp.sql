-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2017 às 02:45
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
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `datasolicitacao` date NOT NULL,
  `dataaprovado` date DEFAULT NULL,
  `dataentregue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `id_produto`, `id_fornecedor`, `id_usuario`, `qtd`, `valor`, `status`, `datasolicitacao`, `dataaprovado`, `dataentregue`) VALUES
(1, 2, 2, 1, 50, '900.00', 4, '2017-09-03', '2017-09-04', '2017-09-04'),
(2, 3, 2, 2, 16, '200.00', 4, '2017-09-04', '2017-09-04', '2017-09-04'),
(3, 3, 3, 1, 15, '300', 0, '2017-09-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `razaosocial` varchar(100) NOT NULL,
  `fantasia` varchar(100) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `cnpj`, `razaosocial`, `fantasia`, `responsavel`, `telefone`, `email`, `logradouro`, `numero`, `complemento`, `cidade`, `uf`, `cep`, `status`) VALUES
(2, '12345678912342', 'FELIPE RISTOW DEVELOPER', 'FRDEV', 'FELIPE RISTOW', '11971486451', 'felipertw2@gmail.com', 'Rua Ipanema', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 'Inativo'),
(3, '012481547912345', 'CLINICA PETS MADU', 'MADU PETS', 'MARIA EDUARDA', '11949069047', 'mariaeduardaes@live.com', 'Rua Ipanema', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 'Ativo');

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
  `acionamento` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `tipo`, `status`, `preco`, `qtd`, `acionamento`, `min`, `max`) VALUES
(1, 'teste', '0', 1, 50, 18, 9, 3, 15),
(2, 'teste1', '1', 1, 20, 114, 15, 10, 30),
(3, 'teste2', '2', 1, 30, 14, 15, 12, 30);

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
(1, 'teste', 'teste', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'teste@teste.com', 20, 1, '2017-08-23 07:10:00', NULL),
(2, 'teste4', 'teste4', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'teste4@teste.com', 20, 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `datasolicitacao` date NOT NULL,
  `dataaprovada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_produto`, `qtd`, `status`, `datasolicitacao`, `dataaprovada`) VALUES
(1, 1, 20, 0, '2017-09-04', NULL),
(2, 1, 1, 2, '2017-09-04', '2017-09-04'),
(3, 1, 2, 2, '2017-09-04', '2017-09-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto` (`id_produto`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_fornecedor` (`id_fornecedor`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `razaosocial` (`razaosocial`),
  ADD UNIQUE KEY `fantasia` (`fantasia`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

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
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_vendas` (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id`),
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_produto_vendas` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
