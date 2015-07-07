-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 06/07/2015 às 22:59
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `consultOdontEngSoft`
--
CREATE DATABASE IF NOT EXISTS `consultOdontEngSoft` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `consultOdontEngSoft`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `contato` int(11) NOT NULL,
  `matricula` int(10) unsigned NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `cpf`, `dataNascimento`, `endereco`, `contato`, `matricula`, `senha`) VALUES
(1, 'Samir', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 2012019134, '123456'),
(2, 'Elydillse', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 2013050907, '123456'),
(3, 'Allane', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 2013054245, '123456'),
(4, 'José Paulo', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 2013014240, '123456'),
(6, 'Maria Auxiliadora', 90817239, '1991-09-20', 'rua ral', 97126321, 11223344, '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

DROP TABLE IF EXISTS `atendimento`;
CREATE TABLE IF NOT EXISTS `atendimento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned NOT NULL,
  `id_cirurgiao` int(10) unsigned NOT NULL,
  `id_secretario` int(10) unsigned NOT NULL,
  `data_hora` datetime NOT NULL,
  `id_planoTratProc` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_atendimento_cliente1_idx` (`id_cliente`),
  KEY `fk_atendimento_secretario1_idx` (`id_secretario`),
  KEY `fk_atendimento_cirurgiao1_idx` (`id_cirurgiao`),
  KEY `fk_atendimento_planoTratamentoProcedimentos1_idx` (`id_planoTratProc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cirurgiao`
--

DROP TABLE IF EXISTS `cirurgiao`;
CREATE TABLE IF NOT EXISTS `cirurgiao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `contato` int(11) NOT NULL,
  `matricula` int(10) unsigned NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `cirurgiao`
--

INSERT INTO `cirurgiao` (`id`, `nome`, `cpf`, `dataNascimento`, `endereco`, `contato`, `matricula`, `senha`, `cro`) VALUES
(1, 'cirurgiao', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 123456, '123456', 987654);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `contato` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `dataNascimento`, `endereco`, `contato`) VALUES
(1, 'Cliente 1', 2401435, '2000-12-13', 'enderco exemplo', 988777766),
(2, 'Cliente 2', 2401435, '2000-12-13', 'enderco exemplo', 988777766),
(3, 'Cliente 3', 2401435, '2000-12-13', 'enderco exemplo', 988777766),
(4, 'Cliente 4', 2401435, '2000-12-13', 'enderco exemplo', 988777766);

-- --------------------------------------------------------

--
-- Estrutura para tabela `listaDeEspera`
--

DROP TABLE IF EXISTS `listaDeEspera`;
CREATE TABLE IF NOT EXISTS `listaDeEspera` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned NOT NULL,
  `id_secretario` int(10) unsigned NOT NULL,
  `data_hora` datetime NOT NULL,
  `atendido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_listaDeEspera_cliente1_idx` (`id_cliente`),
  KEY `fk_listaDeEspera_secretario1_idx` (`id_secretario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento`
--

DROP TABLE IF EXISTS `orcamento`;
CREATE TABLE IF NOT EXISTS `orcamento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_planTratProc` int(10) unsigned NOT NULL,
  `preco` float unsigned NOT NULL,
  `pago` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_planTratProc_UNIQUE` (`id_planTratProc`),
  KEY `fk_orçamento_planoTratamentoProcedimentos1_idx` (`id_planTratProc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `planoTratamentoProcedimentos`
--

DROP TABLE IF EXISTS `planoTratamentoProcedimentos`;
CREATE TABLE IF NOT EXISTS `planoTratamentoProcedimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cirurgiao` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `qtdAtendimento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planoTratamentoProcedimentos_cliente1_idx` (`id_cliente`),
  KEY `fk_planoTratamentoProcedimentos_cirurgiao1_idx` (`id_cirurgiao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `planTratProced_Proced`
--

DROP TABLE IF EXISTS `planTratProced_Proced`;
CREATE TABLE IF NOT EXISTS `planTratProced_Proced` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `planoTratamentoProcedimentos_id` int(10) unsigned NOT NULL,
  `procedimento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_planTratProced_Proced_planoTratamentoProcedimentos1_idx` (`planoTratamentoProcedimentos_id`),
  KEY `fk_planTratProced_Proced_procedimento1_idx` (`procedimento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

DROP TABLE IF EXISTS `procedimento`;
CREATE TABLE IF NOT EXISTS `procedimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `nome`, `descricao`, `preco`) VALUES
(1, 'nome 1', 'descricao 1', 12),
(2, 'nome 1', 'descricao 1', 12),
(3, 'nome 1', 'descricao 1', 12),
(4, 'nome 1', 'descricao 1', 12),
(5, 'nome teste', 'sdadaskd', 123.56);

-- --------------------------------------------------------

--
-- Estrutura para tabela `secretario`
--

DROP TABLE IF EXISTS `secretario`;
CREATE TABLE IF NOT EXISTS `secretario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `contato` int(11) NOT NULL,
  `matricula` int(10) unsigned NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `secretario`
--

INSERT INTO `secretario` (`id`, `nome`, `cpf`, `dataNascimento`, `endereco`, `contato`, `matricula`, `senha`) VALUES
(1, 'nome 1', 2401435, '2000-12-13', 'enderco exemplo', 988777766, 123456789, '123456');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_atendimento_cirurgiao1` FOREIGN KEY (`id_cirurgiao`) REFERENCES `cirurgiao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_planoTratamentoProcedimentos1` FOREIGN KEY (`id_planoTratProc`) REFERENCES `planoTratamentoProcedimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_secretario1` FOREIGN KEY (`id_secretario`) REFERENCES `secretario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `listaDeEspera`
--
ALTER TABLE `listaDeEspera`
  ADD CONSTRAINT `fk_listaDeEspera_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_listaDeEspera_secretario1` FOREIGN KEY (`id_secretario`) REFERENCES `secretario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `fk_orçamento_planoTratamentoProcedimentos1` FOREIGN KEY (`id_planTratProc`) REFERENCES `planoTratamentoProcedimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `planoTratamentoProcedimentos`
--
ALTER TABLE `planoTratamentoProcedimentos`
  ADD CONSTRAINT `fk_planoTratamentoProcedimentos_cirurgiao1` FOREIGN KEY (`id_cirurgiao`) REFERENCES `cirurgiao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planoTratamentoProcedimentos_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `planTratProced_Proced`
--
ALTER TABLE `planTratProced_Proced`
  ADD CONSTRAINT `fk_planTratProced_Proced_planoTratamentoProcedimentos1` FOREIGN KEY (`planoTratamentoProcedimentos_id`) REFERENCES `planoTratamentoProcedimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planTratProced_Proced_procedimento1` FOREIGN KEY (`procedimento_id`) REFERENCES `procedimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
