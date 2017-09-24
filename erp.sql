-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2017 às 00:58
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
-- Estrutura da tabela `armazens`
--

CREATE TABLE `armazens` (
  `id` varchar(3) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `tipoarmazem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `armazens`
--

INSERT INTO `armazens` (`id`, `descricao`, `tipoarmazem`) VALUES
('MTI', 'Reposição', 'Matérial de insumo'),
('MTP', 'Produção', 'Matéria-prima'),
('PDA', 'Principal', 'Produto Acabado'),
('TST', 'teste', 'Matéria-prima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` varchar(3) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nfcompra` varchar(10) DEFAULT NULL,
  `datasolicitacao` date NOT NULL,
  `dataaprovado` date DEFAULT NULL,
  `dataentregue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `id_produto`, `id_fornecedor`, `id_usuario`, `qtd`, `valor`, `status`, `nfcompra`, `datasolicitacao`, `dataaprovado`, `dataentregue`) VALUES
(1, 2, 2, 1, 50, '900.00', 4, NULL, '2017-09-03', '2017-09-04', '2017-09-04'),
(2, 3, 2, 2, 16, '200.00', 4, NULL, '2017-09-04', '2017-09-04', '2017-09-04'),
(3, 3, 3, 1, 15, '300', 0, NULL, '2017-09-04', NULL, NULL),
(4, 3, 2, 1, 2, '200', 4, NULL, '2017-09-04', '2017-09-04', '2017-09-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `id` varchar(3) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `descricao`, `status`) VALUES
('RHM', 'Recursos Humanos', 1),
('TIF', 'Tecnologia da Informação', 1),
('VND', 'Vendas', 1),
('CMP', 'Compras', 1),
('PRD', 'Produção', 1),
('LOG', 'Logística', 1),
('PCP', 'Planejamento e Produção', 1),
('FIN', 'Financeiro', 1);

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
(2, '12345678912342', 'FELIPE RISTOW DEVELOPER', 'FRDEV', 'FELIPE RISTOW', '11971486451', 'felipertw2@gmail.com', 'Rua Ipanema 2', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 'Inativo'),
(3, '012481547912345', 'CLINICA PETS MADU', 'MADU PETS', 'MARIA EDUARDA', '11949069047', 'mariaeduardaes@live.com', 'Rua Ipanema', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `movimentacao` varchar(20) NOT NULL,
  `qtd` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_produto`, `movimentacao`, `qtd`, `data`) VALUES
(1, 1, 'Venda', 2, '2017-09-04'),
(2, 3, 'Compra', 2, '2017-09-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicao_prateleira`
--

CREATE TABLE `posicao_prateleira` (
  `id` int(11) NOT NULL,
  `id_prateleira` varchar(3) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `posicaox` smallint(6) NOT NULL,
  `posicaoy` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prateleiras`
--

CREATE TABLE `prateleiras` (
  `id` varchar(3) NOT NULL,
  `posicoesx` smallint(6) NOT NULL,
  `posicoesy` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prateleiras`
--

INSERT INTO `prateleiras` (`id`, `posicoesx`, `posicoesy`) VALUES
('A01', 10, 10),
('A02', 5, 5),
('A03', 7, 9),
('A04', 2, 4),
('A05', 5, 8),
('A06', 4, 3),
('A07', 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prateleiras_setor`
--

CREATE TABLE `prateleiras_setor` (
  `id` int(11) NOT NULL,
  `id_setor` varchar(3) NOT NULL,
  `id_prateleira` varchar(3) NOT NULL,
  `id_armazem` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prateleiras_setor`
--

INSERT INTO `prateleiras_setor` (`id`, `id_setor`, `id_prateleira`, `id_armazem`) VALUES
(1, 'INF', 'A01', 'MTI'),
(2, 'INF', 'A02', 'MTI'),
(3, 'INF', 'A03', 'MTI'),
(4, 'HIG', 'A04', 'PDA'),
(5, 'INF', 'A05', 'MTI'),
(6, 'HIG', 'A06', 'MTP'),
(7, 'HIG', 'A07', 'MTP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `producoes`
--

CREATE TABLE `producoes` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `datasolicitacao` date DEFAULT NULL,
  `dataaprovacao` date DEFAULT NULL,
  `dataentrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'teste', '0', 1, 50, 4, 9, 3, 15),
(2, 'teste1', '1', 1, 20, 114, 15, 10, 30),
(3, 'teste2', '2', 1, 30, 16, 15, 12, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reposicoes`
--

CREATE TABLE `reposicoes` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_departamento` varchar(50) NOT NULL,
  `qtd` int(4) NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `datasolicitacao` date DEFAULT NULL,
  `datareposicao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reposicoes`
--

INSERT INTO `reposicoes` (`id`, `id_produto`, `id_departamento`, `qtd`, `status`, `datasolicitacao`, `datareposicao`) VALUES
(1, 1, 'CMP', 0, 1, '2017-09-18', NULL),
(2, 2, 'PRD', 20, NULL, '2017-09-18', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` varchar(3) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `descricao`) VALUES
('HIG', 'Higiene'),
('INF', 'Informática'),
('LPZ', 'Limpeza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores_armazem`
--

CREATE TABLE `setores_armazem` (
  `id` int(11) NOT NULL,
  `id_armazem` varchar(3) DEFAULT NULL,
  `id_setor` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setores_armazem`
--

INSERT INTO `setores_armazem` (`id`, `id_armazem`, `id_setor`) VALUES
(1, 'PDA', 'HIG'),
(2, 'PDA', 'INF'),
(3, 'MTP', 'HIG'),
(4, 'MTI', 'INF'),
(7, 'MTI', 'HIG'),
(15, 'MTP', 'INF'),
(16, 'TST', 'HIG'),
(17, 'TST', 'INF'),
(18, 'TST', 'LPZ'),
(19, 'MTP', 'LPZ');

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
(2, 'teste4', 'teste4', 'fad5efb6998ae9f41bfa0a915874a3d9', 'teste4@teste.com', 10, 1, '0000-00-00 00:00:00', NULL),
(4, 'teste2', 'teste2', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'teste2@teste.com', 20, 1, '2017-09-10 19:11:20', NULL);

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
(3, 1, 2, 2, '2017-09-04', '2017-09-04'),
(4, 1, 2, 2, '2017-09-04', '2017-09-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armazens`
--
ALTER TABLE `armazens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_historico` (`id_produto`);

--
-- Indexes for table `posicao_prateleira`
--
ALTER TABLE `posicao_prateleira`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prateleiras`
--
ALTER TABLE `prateleiras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prateleiras_setor`
--
ALTER TABLE `prateleiras_setor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_prateleira` (`id_prateleira`),
  ADD KEY `fk_id_setor_prat` (`id_setor`),
  ADD KEY `fk_id_armazem_prats` (`id_armazem`);

--
-- Indexes for table `producoes`
--
ALTER TABLE `producoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_producao` (`id_produto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reposicoes`
--
ALTER TABLE `reposicoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_reposicao` (`id_produto`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setores_armazem`
--
ALTER TABLE `setores_armazem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_arm_setores` (`id_armazem`),
  ADD KEY `fk_id_setor_arm` (`id_setor`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prateleiras_setor`
--
ALTER TABLE `prateleiras_setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `producoes`
--
ALTER TABLE `producoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reposicoes`
--
ALTER TABLE `reposicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `setores_armazem`
--
ALTER TABLE `setores_armazem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `fk_produto_historico` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `prateleiras_setor`
--
ALTER TABLE `prateleiras_setor`
  ADD CONSTRAINT `fk_id_armazem_prat` FOREIGN KEY (`id_armazem`) REFERENCES `armazens` (`id`),
  ADD CONSTRAINT `fk_id_prat_setor` FOREIGN KEY (`id_prateleira`) REFERENCES `prateleiras` (`id`),
  ADD CONSTRAINT `fk_id_setor_prat` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id`);

--
-- Limitadores para a tabela `producoes`
--
ALTER TABLE `producoes`
  ADD CONSTRAINT `fk_produto_producao` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `reposicoes`
--
ALTER TABLE `reposicoes`
  ADD CONSTRAINT `fk_produto_reposicao` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `setores_armazem`
--
ALTER TABLE `setores_armazem`
  ADD CONSTRAINT `fk_id_arm_setores` FOREIGN KEY (`id_armazem`) REFERENCES `armazens` (`id`),
  ADD CONSTRAINT `fk_id_setor_arm` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_produto_vendas` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
