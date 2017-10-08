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
CREATE DATABASE IF NOT EXISTS `erp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `erp`;

-- Copiando estrutura para tabela erp.armazens
CREATE TABLE IF NOT EXISTS `armazens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `tipoarmazem` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `setor_categoria_fk` (`id_setor`),
  CONSTRAINT `setor_categoria_fk` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.consumos
CREATE TABLE IF NOT EXISTS `consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_armazem` int(11) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `qtdmin` int(11) DEFAULT NULL,
  `qtdmax` int(11) DEFAULT NULL,
  `acionamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.fornecedores
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
  `status` varchar(20) NOT NULL DEFAULT 'Ativo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `razaosocial` (`razaosocial`),
  UNIQUE KEY `fantasia` (`fantasia`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(4) NOT NULL COMMENT '0 - Produto acabado / 1 - Matéria-prima / 2 - Consumo',
  `id_produto` tinyint(4) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float NOT NULL,
  `tipo_movimentacao` tinyint(4) NOT NULL COMMENT '0 - Compra / 1 - Venda / 2 - Reposicão',
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_armazem` int(11) DEFAULT NULL,
  `tipo` bit(1) DEFAULT NULL COMMENT '0 - Matéria-prima / 1 - Consumo',
  `descricao` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `qtdmin` int(11) DEFAULT NULL,
  `qtdmax` int(11) DEFAULT NULL,
  `acionamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.producoes
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.produtos
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.reposicoes
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.setores
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.usuarios
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela erp.vendas
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
