-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2018 às 01:10
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avaliacao_global`
--
CREATE DATABASE IF NOT EXISTS `avaliacao_global` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `avaliacao_global`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

DROP TABLE IF EXISTS `alternativas`;
CREATE TABLE IF NOT EXISTS `alternativas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `correta` tinyint(4) NOT NULL DEFAULT '0',
  `questao` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alternativas_questoes1_idx` (`questao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `situacao` varchar(45) DEFAULT 'ativo',
  `curso` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_usuario_idx` (`professor`),
  KEY `fk_disciplinas_curso1_idx` (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=10300 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formularios`
--

DROP TABLE IF EXISTS `formularios`;
CREATE TABLE IF NOT EXISTS `formularios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aluno` int(10) UNSIGNED NOT NULL,
  `disciplina` int(10) UNSIGNED NOT NULL,
  `prova` int(11) NOT NULL,
  `situacao` enum('em andamento','finalizada') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provas_matriculas1_idx` (`aluno`,`disciplina`),
  KEY `fk_provas_provas1_idx` (`prova`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_prova`
--

DROP TABLE IF EXISTS `itens_prova`;
CREATE TABLE IF NOT EXISTS `itens_prova` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `questao` int(10) UNSIGNED NOT NULL,
  `formulario` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_itens_prova_questoes1_idx` (`questao`),
  KEY `fk_itens_prova_formularios1_idx` (`formulario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `aluno` int(10) UNSIGNED NOT NULL,
  `disciplina` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`aluno`,`disciplina`),
  KEY `fk_alunos_has_disciplinas_disciplinas1_idx` (`disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_letivo`
--

DROP TABLE IF EXISTS `periodo_letivo`;
CREATE TABLE IF NOT EXISTS `periodo_letivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_periodo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

DROP TABLE IF EXISTS `provas`;
CREATE TABLE IF NOT EXISTS `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aplicacao` datetime NOT NULL,
  `qtd_questoes` int(11) NOT NULL,
  `tipo_prova` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `periodo_letivo` int(11) NOT NULL,
  `situacao` enum('ativo','inativo') DEFAULT 'ativo',
  PRIMARY KEY (`id`),
  KEY `professor_usuario_idx` (`professor`),
  KEY `fk_provas_periodo_letivo1_idx` (`periodo_letivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

DROP TABLE IF EXISTS `questoes`;
CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina` int(10) UNSIGNED NOT NULL,
  `peso` text,
  `professor` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `situacao` varchar(45) NOT NULL DEFAULT 'ativo',
  `periodo_letivo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_disciplinas1_idx` (`disciplina`),
  KEY `professor_usuario_idx` (`professor`),
  KEY `fk_questoes_periodo_letivo1_idx` (`periodo_letivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `item_prova` int(10) UNSIGNED NOT NULL,
  `alternativa` int(11) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aluno` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`item_prova`,`aluno`),
  KEY `fk_prova_respondida_itens_prova1_idx` (`item_prova`),
  KEY `fk_prova_respondida_alternativas1_idx` (`alternativa`),
  KEY `fk_respostas_usuarios1_idx` (`aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
CREATE TABLE IF NOT EXISTS `sessoes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` int(10) UNSIGNED NOT NULL,
  `inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `termino` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_idx` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `contexto` enum('aluno','professor','administrador') DEFAULT 'aluno',
  `situacao` enum('ativo','inativo') DEFAULT 'ativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6087 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `fk_alternativas_questoes1` FOREIGN KEY (`questao`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplina_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplinas_curso1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `formularios`
--
ALTER TABLE `formularios`
  ADD CONSTRAINT `fk_provas_matriculas1` FOREIGN KEY (`aluno`,`disciplina`) REFERENCES `matriculas` (`aluno`, `disciplina`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_provas_provas1` FOREIGN KEY (`prova`) REFERENCES `provas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_prova`
--
ALTER TABLE `itens_prova`
  ADD CONSTRAINT `fk_itens_prova_formularios1` FOREIGN KEY (`formulario`) REFERENCES `formularios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_prova_questoes1` FOREIGN KEY (`questao`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_alunos_has_disciplinas_disciplinas1` FOREIGN KEY (`disciplina`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_aluno_usuario` FOREIGN KEY (`aluno`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `provas`
--
ALTER TABLE `provas`
  ADD CONSTRAINT `fk_provas_periodo_letivo1` FOREIGN KEY (`periodo_letivo`) REFERENCES `periodo_letivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prova_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_disciplinas1` FOREIGN KEY (`disciplina`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_questoes_periodo_letivo1` FOREIGN KEY (`periodo_letivo`) REFERENCES `periodo_letivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questao_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_prova_respondida_alternativas1` FOREIGN KEY (`alternativa`) REFERENCES `alternativas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prova_respondida_itens_prova1` FOREIGN KEY (`item_prova`) REFERENCES `itens_prova` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respostas_usuarios1` FOREIGN KEY (`aluno`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
