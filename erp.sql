-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.26-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para erp
DROP DATABASE IF EXISTS `erp`;
CREATE DATABASE IF NOT EXISTS `erp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `erp`;

-- Copiando estrutura para tabela erp.armazens
DROP TABLE IF EXISTS `armazens`;
CREATE TABLE IF NOT EXISTS `armazens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `tipoarmazem` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.armazens: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `armazens` DISABLE KEYS */;
INSERT INTO `armazens` (`id`, `descricao`, `tipoarmazem`) VALUES
	(1, 'Reposição Interna', 2),
	(2, 'Produtos à Venda', 0),
	(3, 'Material para Produção', 1);
/*!40000 ALTER TABLE `armazens` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `setor_categoria_fk` (`id_setor`),
  CONSTRAINT `setor_categoria_fk` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.categorias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `id_setor`, `descricao`) VALUES
	(1, 1, 'Monitor'),
	(2, 1, 'Armazenamento'),
	(3, 3, 'Nobreak'),
	(4, 1, 'Periféricos'),
	(5, 1, 'Hardware');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.compras
DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_produto` tinyint(4) NOT NULL COMMENT '1- Matéria-Prima / 2- Consumo',
  `qtd` int(11) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1- Aguardando Orçamento / 2- Aguardando Aprovação / 3- Aprovado, aguardando entrega / 4- Recebido',
  `nfcompra` varchar(10) DEFAULT NULL,
  `datasolicitacao` date NOT NULL,
  `dataaprovado` date DEFAULT NULL,
  `dataentregue` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto` (`id_produto`),
  KEY `fk_usuario` (`id_usuario`),
  KEY `fk_fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `materias` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.compras: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id`, `id_produto`, `id_fornecedor`, `id_usuario`, `tipo_produto`, `qtd`, `valor`, `status`, `nfcompra`, `datasolicitacao`, `dataaprovado`, `dataentregue`) VALUES
	(2, 4, 2, NULL, 0, 2, '2', 4, '2', '2017-10-08', '2017-10-08', '2017-10-08'),
	(3, 1, NULL, NULL, 0, 1, NULL, 0, NULL, '2017-10-08', NULL, NULL),
	(4, 4, 2, NULL, 0, 3, '300', 4, '3', '2017-10-08', '2017-10-08', '2017-10-08'),
	(5, 1, 3, NULL, 0, 2, '35', 4, '23', '2017-10-08', '2017-10-08', '2017-10-08'),
	(6, 4, 2, NULL, 0, 2, '30', 4, '25', '2017-10-08', '2017-10-08', '2017-10-08'),
	(7, 1, 3, NULL, 0, 1, '20', 4, '38', '2017-10-08', '2017-10-08', '2017-10-08'),
	(8, 1, 3, NULL, 0, 1, '2', 4, '37', '2017-10-08', '2017-10-08', '2017-10-08'),
	(9, 1, 3, NULL, 0, 1, '1', 4, '343', '2017-10-08', '2017-10-08', '2017-10-08'),
	(10, 1, 3, NULL, 0, 2, '1', 4, '4343', '2017-10-08', '2017-10-08', '2017-10-08'),
	(11, 1, 3, NULL, 0, 2, '32', 4, '10', '2017-10-08', '2017-10-08', '2017-10-08'),
	(12, 1, 2, NULL, 0, 3, '232', 4, '231', '2017-10-21', '2017-10-21', '2017-10-21'),
	(13, 1, 2, NULL, 1, 2, '321', 4, '12', '2017-10-21', '2017-10-21', '2017-10-21'),
	(14, 4, NULL, NULL, 0, 3, NULL, 0, NULL, '2017-11-03', NULL, NULL),
	(15, 4, 2, NULL, 0, 3, '259', 4, '135', '2017-11-03', '2017-11-03', '2017-11-03'),
	(16, 4, NULL, NULL, 0, 2, NULL, 1, NULL, '2017-11-03', NULL, NULL);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.departamentos
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.departamentos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`id`, `descricao`) VALUES
	(1, 'COMPRAS'),
	(2, 'VENDAS'),
	(3, 'PRODUCAO'),
	(4, 'ESTOQUE');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.fornecedores
DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `razaosocial` (`razaosocial`),
  UNIQUE KEY `fantasia` (`fantasia`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.fornecedores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`id`, `cnpj`, `razaosocial`, `fantasia`, `responsavel`, `telefone`, `email`, `logradouro`, `numero`, `complemento`, `cidade`, `uf`, `cep`, `status`) VALUES
	(2, '12345678912342', 'FELIPE RISTOW DEVELOPER', 'FRDEV', 'FELIPE RISTOW', '11971486451', 'felipertw2@gmail.com', 'Rua Ipanema 2', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 0),
	(3, '012481547912345', 'CLINICA PETS MADU', 'MADU PETS', 'MARIA EDUARDA', '11949069047', 'mariaeduardaes@live.com', 'Rua Ipanema', '686', 'APTO 112B', 'São Paulo', 'SP', '03164200', 1);
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.historico
DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(4) NOT NULL COMMENT '0 - Produto acabado / 1 - Matéria-prima / 2 - Consumo',
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_produto` tinyint(4) NOT NULL,
  `id_solicitacao` tinyint(4) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float NOT NULL,
  `tipo_movimentacao` tinyint(4) NOT NULL COMMENT '0 - Compra / 1 - Venda / 2 - Reposicão / 3 - Produção',
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.historico: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id`, `tipo`, `id_fornecedor`, `id_produto`, `id_solicitacao`, `qtd`, `valor`, `tipo_movimentacao`, `data`) VALUES
	(1, 0, NULL, 2, 4, 1, 200, 1, '2017-10-08'),
	(2, 2, 3, 4, 0, 2, 30, 0, '2017-10-08'),
	(3, 2, NULL, 4, 0, 1, 15, 2, '2017-10-08'),
	(5, 1, NULL, 1, 0, 1, 30, 2, '2017-10-08'),
	(6, 1, NULL, 1, 0, 1, 30, 2, '2017-10-08'),
	(7, 1, NULL, 1, 0, 2, 60, 2, '2017-10-08'),
	(8, 0, NULL, 2, 5, 3, 600, 1, '2017-10-21'),
	(9, 1, 3, 1, 12, 3, 90, 0, '2017-10-21'),
	(10, 1, 3, 1, 13, 2, 60, 0, '2017-10-21'),
	(11, 2, NULL, 4, 5, 1, 15, 2, '2017-10-21'),
	(12, 0, NULL, 2, 6, 20, 4000, 1, '2017-10-30'),
	(13, 0, NULL, 2, 7, 2, 400, 1, '2017-10-31'),
	(14, 0, 3, 4, 15, 3, 259, 0, '2017-11-03');
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.materias
DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_armazem` int(11) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL COMMENT '0 - Matéria-prima / 1 - Consumo',
  `descricao` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `qtdmin` int(11) DEFAULT NULL,
  `qtdmax` int(11) DEFAULT NULL,
  `acionamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materia_armazem` (`id_armazem`),
  CONSTRAINT `materia_armazem` FOREIGN KEY (`id_armazem`) REFERENCES `armazens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.materias: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`id`, `id_armazem`, `tipo`, `descricao`, `valor`, `qtd`, `qtdmin`, `qtdmax`, `acionamento`) VALUES
	(1, 3, 0, 'TESTE', NULL, 50, 34, 50, 30),
	(4, 1, 1, 'Papel Higiênico', 15, 12, 7, 15, 5);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.producoes
DROP TABLE IF EXISTS `producoes`;
CREATE TABLE IF NOT EXISTS `producoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1' COMMENT '0- Cancelado / 1- Aguardando Aprovação / 2- Aprovado, em produção / 3- Entregue',
  `lote` int(11) DEFAULT NULL,
  `datasolicitacao` date DEFAULT NULL,
  `dataaprovacao` date DEFAULT NULL,
  `dataentrega` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_producao` (`id_produto`),
  CONSTRAINT `fk_produto_producao` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.producoes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `producoes` DISABLE KEYS */;
INSERT INTO `producoes` (`id`, `id_produto`, `qtd`, `status`, `lote`, `datasolicitacao`, `dataaprovacao`, `dataentrega`) VALUES
	(1, 2, 3, 3, 255, '2017-10-08', '2017-10-08', '2017-10-08'),
	(2, 2, 2, 3, 252, '2017-10-21', '2017-10-21', '2017-10-21');
/*!40000 ALTER TABLE `producoes` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.produtos
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_armazem` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` float NOT NULL,
  `qtd` int(11) NOT NULL,
  `qtdmin` int(11) NOT NULL,
  `qtdmax` int(11) NOT NULL,
  `acionamento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_armazem_fk` (`id_armazem`),
  KEY `produto_categoria_fk` (`id_categoria`),
  CONSTRAINT `produto_armazem_fk` FOREIGN KEY (`id_armazem`) REFERENCES `armazens` (`id`),
  CONSTRAINT `produto_categoria_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.produtos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `id_armazem`, `id_categoria`, `descricao`, `valor`, `qtd`, `qtdmin`, `qtdmax`, `acionamento`) VALUES
	(2, 2, 2, 'teste332131', 200, -21, 15, 40, 10);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.reposicoes
DROP TABLE IF EXISTS `reposicoes`;
CREATE TABLE IF NOT EXISTS `reposicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `qtd` int(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - Aguardando Reposição / 2 - Reposição realizada',
  `datasolicitacao` date DEFAULT NULL,
  `datareposicao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_reposicao` (`id_produto`),
  KEY `fk_departamento_deposicao` (`id_departamento`),
  CONSTRAINT `fk_departamento_deposicao` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`),
  CONSTRAINT `fk_produto_reposicao` FOREIGN KEY (`id_produto`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.reposicoes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `reposicoes` DISABLE KEYS */;
INSERT INTO `reposicoes` (`id`, `id_produto`, `id_departamento`, `qtd`, `status`, `datasolicitacao`, `datareposicao`) VALUES
	(1, 4, 3, 3, 2, '2017-10-08', '2017-10-08'),
	(2, 4, 2, 2, 0, '2017-10-08', NULL),
	(3, 4, 4, 1, 2, '2017-10-08', '2017-10-08'),
	(4, 4, 2, 1, 2, '2017-10-08', '2017-10-08'),
	(5, 4, 3, 1, 2, '2017-10-21', '2017-10-21');
/*!40000 ALTER TABLE `reposicoes` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.setores
DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.setores: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `setores` DISABLE KEYS */;
INSERT INTO `setores` (`id`, `descricao`) VALUES
	(1, 'Informática'),
	(2, 'Eletrodoméstico'),
	(3, 'Elétrica'),
	(4, 'Utensílio doméstico');
/*!40000 ALTER TABLE `setores` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_departamento_fk` (`id_departamento`),
  CONSTRAINT `usuario_departamento_fk` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_departamento`, `nome`, `usuario`, `senha`, `email`, `permissao`, `status`, `criado`, `modificado`) VALUES
	(2, 4, 'Felipe Ristow', 'feliperistow', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'felipertw2@gmail.com', 10, 1, '2017-10-07 17:38:16', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.vendas
DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `nfvenda` int(11) DEFAULT NULL,
  `datasolicitacao` date NOT NULL,
  `dataaprovada` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_vendas` (`id_produto`),
  CONSTRAINT `fk_produto_vendas` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.vendas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` (`id`, `id_produto`, `qtd`, `status`, `nfvenda`, `datasolicitacao`, `dataaprovada`) VALUES
	(1, 2, 2, 2, NULL, '2017-10-08', '2017-10-08'),
	(2, 2, 3, 2, 23, '2017-10-08', '2017-10-08'),
	(3, 2, 1, 2, 27, '2017-10-08', '2017-10-08'),
	(4, 2, 1, 2, 25, '2017-10-08', '2017-10-08'),
	(5, 2, 3, 2, 213, '2017-10-21', '2017-10-21'),
	(6, 2, 20, 2, 2343, '2017-10-30', '2017-10-30'),
	(7, 2, 2, 2, 30, '2017-10-31', '2017-10-31'),
	(8, 2, 1, 1, NULL, '2017-10-31', NULL);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
