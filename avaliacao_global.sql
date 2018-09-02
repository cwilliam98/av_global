-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Set-2018 às 20:24
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.34

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
  `descricao` varchar(45) NOT NULL,
  `correta` tinyint(4) NOT NULL DEFAULT '0',
  `questao` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alternativas_questoes1_idx` (`questao`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `alternativas`
--

TRUNCATE TABLE `alternativas`;
--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `descricao`, `correta`, `questao`) VALUES
(1, '1ª alternativa da questão', 1, 1),
(2, '2ª alternativa da questão', 0, 1),
(3, '3ª alternativa da questão', 0, 1),
(4, '4ª alternativa da questão', 0, 1),
(5, '1ª alternativa da questão', 1, 2),
(6, '2ª alternativa da questão', 0, 2),
(7, '3ª alternativa da questão', 0, 2),
(8, '4ª alternativa da questão', 0, 2),
(9, '1ª alternativa da questão', 1, 3),
(10, '2ª alternativa da questão', 0, 3),
(11, '3ª alternativa da questão', 0, 3),
(12, '4ª alternativa da questão', 0, 3),
(13, '1ª alternativa da questão', 1, 4),
(14, '2ª alternativa da questão', 0, 4),
(15, '3ª alternativa da questão', 0, 4),
(16, '4ª alternativa da questão', 0, 4),
(17, '1ª alternativa da questão', 1, 5),
(18, '2ª alternativa da questão', 0, 5),
(19, '3ª alternativa da questão', 0, 5),
(20, '4ª alternativa da questão', 0, 5),
(21, '1ª alternativa da questão', 1, 6),
(22, '2ª alternativa da questão', 0, 6),
(23, '3ª alternativa da questão', 0, 6),
(24, '4ª alternativa da questão', 0, 6),
(25, '1ª alternativa da questão', 1, 7),
(26, '2ª alternativa da questão', 0, 7),
(27, '3ª alternativa da questão', 0, 7),
(28, '4ª alternativa da questão', 0, 7),
(29, '1ª alternativa da questão', 1, 8),
(30, '2ª alternativa da questão', 0, 8),
(31, '3ª alternativa da questão', 0, 8),
(32, '4ª alternativa da questão', 0, 8),
(33, '1ª alternativa da questão', 1, 9),
(34, '2ª alternativa da questão', 0, 9),
(35, '3ª alternativa da questão', 0, 9),
(36, '4ª alternativa da questão', 0, 9),
(37, '1ª alternativa da questão', 1, 10),
(38, '2ª alternativa da questão', 0, 10),
(39, '3ª alternativa da questão', 0, 10),
(40, '4ª alternativa da questão', 0, 10),
(41, '1ª alternativa da questão', 1, 11),
(42, '2ª alternativa da questão', 0, 11),
(43, '3ª alternativa da questão', 0, 11),
(44, '4ª alternativa da questão', 0, 11),
(45, '1ª alternativa da questão', 1, 12),
(46, '2ª alternativa da questão', 0, 12),
(47, '3ª alternativa da questão', 0, 12),
(48, '4ª alternativa da questão', 0, 12),
(49, '1ª alternativa da questão', 1, 13),
(50, '2ª alternativa da questão', 0, 13),
(51, '3ª alternativa da questão', 0, 13),
(52, '4ª alternativa da questão', 0, 13),
(53, '1ª alternativa da questão', 1, 14),
(54, '2ª alternativa da questão', 0, 14),
(55, '3ª alternativa da questão', 0, 14),
(56, '4ª alternativa da questão', 0, 14),
(57, '1ª alternativa da questão', 1, 15),
(58, '2ª alternativa da questão', 0, 15),
(59, '3ª alternativa da questão', 0, 15),
(60, '4ª alternativa da questão', 0, 15),
(61, '1ª alternativa da questão', 1, 16),
(62, '2ª alternativa da questão', 0, 16),
(63, '3ª alternativa da questão', 0, 16),
(64, '4ª alternativa da questão', 0, 16),
(65, '1ª alternativa da questão', 1, 17),
(66, '2ª alternativa da questão', 0, 17),
(67, '3ª alternativa da questão', 0, 17),
(68, '4ª alternativa da questão', 0, 17),
(69, '1ª alternativa da questão', 1, 18),
(70, '2ª alternativa da questão', 0, 18),
(71, '3ª alternativa da questão', 0, 18),
(72, '4ª alternativa da questão', 0, 18),
(73, '1ª alternativa da questão', 1, 19),
(74, '2ª alternativa da questão', 0, 19),
(75, '3ª alternativa da questão', 0, 19),
(76, '4ª alternativa da questão', 0, 19),
(77, '1ª alternativa da questão', 1, 20),
(78, '2ª alternativa da questão', 0, 20),
(79, '3ª alternativa da questão', 0, 20),
(80, '4ª alternativa da questão', 0, 20),
(81, '1ª alternativa da questão', 1, 21),
(82, '2ª alternativa da questão', 0, 21),
(83, '3ª alternativa da questão', 0, 21),
(84, '4ª alternativa da questão', 0, 21),
(85, '1ª alternativa da questão', 1, 22),
(86, '2ª alternativa da questão', 0, 22),
(87, '3ª alternativa da questão', 0, 22),
(88, '4ª alternativa da questão', 0, 22),
(89, '1ª alternativa da questão', 1, 23),
(90, '2ª alternativa da questão', 0, 23),
(91, '3ª alternativa da questão', 0, 23),
(92, '4ª alternativa da questão', 0, 23),
(93, '1ª alternativa da questão', 1, 24),
(94, '2ª alternativa da questão', 0, 24),
(95, '3ª alternativa da questão', 0, 24),
(96, '4ª alternativa da questão', 0, 24),
(97, '1ª alternativa da questão', 1, 25),
(98, '2ª alternativa da questão', 0, 25),
(99, '3ª alternativa da questão', 0, 25),
(100, '4ª alternativa da questão', 0, 25),
(101, '1ª alternativa da questão', 1, 26),
(102, '2ª alternativa da questão', 0, 26),
(103, '3ª alternativa da questão', 0, 26),
(104, '4ª alternativa da questão', 0, 26),
(105, '1ª alternativa da questão', 1, 27),
(106, '2ª alternativa da questão', 0, 27),
(107, '3ª alternativa da questão', 0, 27),
(108, '4ª alternativa da questão', 0, 27),
(109, '1ª alternativa da questão', 1, 28),
(110, '2ª alternativa da questão', 0, 28),
(111, '3ª alternativa da questão', 0, 28),
(112, '4ª alternativa da questão', 0, 28),
(113, '1ª alternativa da questão', 1, 29),
(114, '2ª alternativa da questão', 0, 29),
(115, '3ª alternativa da questão', 0, 29),
(116, '4ª alternativa da questão', 0, 29),
(117, '1ª alternativa da questão', 1, 30),
(118, '2ª alternativa da questão', 0, 30),
(119, '3ª alternativa da questão', 0, 30),
(120, '4ª alternativa da questão', 0, 30),
(121, '1ª alternativa da questão', 1, 31),
(122, '2ª alternativa da questão', 0, 31),
(123, '3ª alternativa da questão', 0, 31),
(124, '4ª alternativa da questão', 0, 31),
(125, '1ª alternativa da questão', 1, 32),
(126, '2ª alternativa da questão', 0, 32),
(127, '3ª alternativa da questão', 0, 32),
(128, '4ª alternativa da questão', 0, 32),
(129, 'djaksdjksa', 1, 43),
(130, 'djaksdjksa', 1, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_usuario_idx` (`professor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `disciplinas`
--

TRUNCATE TABLE `disciplinas`;
--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nome`, `periodo`, `professor`) VALUES
(1, 'Redes e Servidores', '', 3),
(2, 'Orientação a objetos', '', 3),
(3, 'Estrutura de Dados', '', 3),
(4, 'Banco de Dados', '', 3);

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

--
-- Truncate table before insert `formularios`
--

TRUNCATE TABLE `formularios`;
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

--
-- Truncate table before insert `itens_prova`
--

TRUNCATE TABLE `itens_prova`;
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

--
-- Truncate table before insert `matriculas`
--

TRUNCATE TABLE `matriculas`;
--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`aluno`, `disciplina`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(4, 3),
(4, 4),
(7, 1),
(7, 2);

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
  `reaproveitar` tinyint(4) NOT NULL,
  `tipo_prova` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_usuario_idx` (`professor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `provas`
--

TRUNCATE TABLE `provas`;
--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `reaproveitar`, `tipo_prova`, `nota`, `professor`) VALUES
(1, 'Avaliação Global', '2018-09-02 14:15:20', '2018-09-02 00:00:00', 2, 0, 'Avaliação global', 0, 1);

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
  `peso` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_disciplinas1_idx` (`disciplina`),
  KEY `professor_usuario_idx` (`professor`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `questoes`
--

TRUNCATE TABLE `questoes`;
--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `descricao`, `criado_em`, `disciplina`, `peso`, `professor`, `imagem`) VALUES
(1, 'Primeira questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(2, 'Segunda questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(3, 'Terceira questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(4, 'Quarta questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(5, 'Quinta questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(6, 'Sexta questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(7, 'Sétima questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(8, 'Oitava questão de redes e servidores, a descricão vai aqui.', '2017-11-17 20:32:02', 1, 1, 0, NULL),
(9, 'Primeira questão de Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(10, 'Segunda questão de  Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(11, 'Terceira questão de Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(12, 'Quarta questão de Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(13, 'Quinta questão de  Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(14, 'Sexta questão de    Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(15, 'Sétima questão de   Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(16, 'Oitava questão de   Orientação a objetos, a descricão vai aqui.', '2017-11-17 20:32:02', 2, 1, 0, NULL),
(17, 'Primeira questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(18, 'Segunda questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(19, 'Terceira questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(20, 'Quarta questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(21, 'Quinta questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(22, 'Sexta questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(23, 'Sétima questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(24, 'Oitava questão de Estrutura de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 3, 1, 0, NULL),
(25, 'Primeira questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(26, 'Segunda questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(27, 'Terceira questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(28, 'Quarta questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(29, 'Quinta questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(30, 'Sexta questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(31, 'Sétima questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(32, 'Oitava questão de Banco de Dados, a descricão vai aqui.', '2017-11-17 20:32:02', 4, 1, 0, NULL),
(43, '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://qnimate.com/wp-content/uploads/2014/03/images2.jpg&quot; style=&quot;height:50px; width:100px&quot; /&gt;hdjahjdhad&lt;/p&gt;\r\n', '2018-08-26 15:11:12', 4, 0, 1, NULL),
(44, '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://qnimate.com/wp-content/uploads/2014/03/images2.jpg&quot; style=&quot;height:50px; width:100px&quot; /&gt;hdjahjdhad&lt;/p&gt;\r\n', '2018-08-26 15:11:13', 4, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `item_prova` int(10) UNSIGNED NOT NULL,
  `alternativa` int(11) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_prova`),
  KEY `fk_prova_respondida_itens_prova1_idx` (`item_prova`),
  KEY `fk_prova_respondida_alternativas1_idx` (`alternativa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `respostas`
--

TRUNCATE TABLE `respostas`;
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

--
-- Truncate table before insert `sessoes`
--

TRUNCATE TABLE `sessoes`;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `codigo`, `senha`, `contexto`) VALUES
(1, 'Cristian William Albrecht', '4964', '1234', 'aluno'),
(2, 'Mikael Powzum Amorim', '7878', '1234', 'aluno'),
(3, 'Ederson', '0740', '1234', 'professor'),
(4, 'Mateus', '1234', '1234', 'aluno'),
(7, 'Diana', '3232', '1234', 'aluno');

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
  ADD CONSTRAINT `disciplina_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `prova_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_disciplinas1` FOREIGN KEY (`disciplina`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `questao_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_prova_respondida_alternativas1` FOREIGN KEY (`alternativa`) REFERENCES `alternativas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prova_respondida_itens_prova1` FOREIGN KEY (`item_prova`) REFERENCES `itens_prova` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
