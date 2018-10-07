-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Out-2018 às 14:54
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `correta` tinyint(4) NOT NULL DEFAULT '0',
  `questao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `descricao`, `correta`, `questao`) VALUES
(1, ' alternativa da questão', 0, 1),
(2, '5ª alternativa da questão', 1, 1),
(3, '5ª alternativa da questão', 1, 1),
(4, '5ª alternativa da questão', 1, 1),
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
(130, 'djaksdjksa', 1, 44),
(131, 'aaaaa', 1, 45),
(132, 'ggg', 1, 46),
(133, 'teste', 1, 47),
(134, 'teste', 1, 48),
(135, 'teste', 1, 49),
(136, 'teste', 1, 50),
(137, 'teste', 1, 51),
(138, 'teste', 1, 52),
(139, 'teste', 1, 53),
(140, 'teste', 1, 54),
(141, 'teste', 1, 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `situacao` varchar(45) DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nome`, `professor`, `situacao`) VALUES
(1, 'Redes e Servidores', 3, 'ativo'),
(2, 'Orientação a objetos', 9, 'ativo'),
(3, 'Estrutura de Dados', 9, 'inativo'),
(4, 'Banco de Dados', 3, 'inativo'),
(5, 'teste', 3, 'ativo'),
(6, 'Orientação a objetos', 9, 'ativo'),
(7, 'Orientação a objetos', 3, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formularios`
--

CREATE TABLE `formularios` (
  `id` int(10) UNSIGNED NOT NULL,
  `aluno` int(10) UNSIGNED NOT NULL,
  `disciplina` int(10) UNSIGNED NOT NULL,
  `prova` int(11) NOT NULL,
  `situacao` enum('em andamento','finalizada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formularios`
--

INSERT INTO `formularios` (`id`, `aluno`, `disciplina`, `prova`, `situacao`) VALUES
(1, 7, 1, 1, 'finalizada'),
(2, 7, 2, 1, 'finalizada'),
(3, 2, 1, 1, 'finalizada'),
(4, 2, 2, 1, 'finalizada'),
(5, 2, 3, 1, 'finalizada'),
(6, 2, 4, 1, 'finalizada'),
(7, 4, 3, 1, 'finalizada'),
(8, 4, 4, 1, 'finalizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_prova`
--

CREATE TABLE `itens_prova` (
  `id` int(10) UNSIGNED NOT NULL,
  `questao` int(10) UNSIGNED NOT NULL,
  `formulario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_prova`
--

INSERT INTO `itens_prova` (`id`, `questao`, `formulario`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 9, 2),
(7, 10, 2),
(8, 11, 2),
(9, 12, 2),
(10, 13, 2),
(11, 1, 3),
(12, 2, 3),
(13, 3, 3),
(14, 4, 3),
(15, 5, 3),
(16, 9, 4),
(17, 10, 4),
(18, 11, 4),
(19, 12, 4),
(20, 13, 4),
(21, 17, 5),
(22, 18, 5),
(23, 19, 5),
(24, 20, 5),
(25, 21, 5),
(26, 25, 6),
(27, 26, 6),
(28, 27, 6),
(29, 28, 6),
(30, 29, 6),
(31, 17, 7),
(32, 18, 7),
(33, 19, 7),
(34, 20, 7),
(35, 21, 7),
(36, 25, 8),
(37, 26, 8),
(38, 27, 8),
(39, 28, 8),
(40, 29, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `aluno` int(10) UNSIGNED NOT NULL,
  `disciplina` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 2),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 3),
(10, 4),
(10, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE `provas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aplicacao` datetime NOT NULL,
  `qtd_questoes` int(11) NOT NULL,
  `reaproveitar` tinyint(4) NOT NULL,
  `tipo_prova` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `reaproveitar`, `tipo_prova`, `nota`, `professor`) VALUES
(1, 'Avaliação Global', '2018-09-22 19:54:18', '2018-09-22 00:00:00', 5, 0, 'Semestral', 0, 1),
(2, 'teste', '2018-09-28 20:16:16', '2018-09-28 00:00:00', 12, 0, 'Avaliação global', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina` int(10) UNSIGNED NOT NULL,
  `peso` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `descricao`, `criado_em`, `disciplina`, `peso`, `professor`, `imagem`) VALUES
(1, '&lt;p&gt;&lt;strong&gt;Primeira quest&amp;atilde;o de redes e servidores, a descric&amp;atilde;o vai aqui. alterada&lt;/strong&gt;&lt;/p&gt;\r\n', '2017-11-17 20:32:02', 5, 1, 10, NULL),
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
(44, '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://qnimate.com/wp-content/uploads/2014/03/images2.jpg&quot; style=&quot;height:50px; width:100px&quot; /&gt;hdjahjdhad&lt;/p&gt;\n', '2018-08-26 15:11:13', 4, 0, 1, NULL),
(45, '<h2 style="font-style:italic"><span style="font-size:22px">Teste???</span></h2>\n', '2018-09-20 21:33:13', 4, 0, 1, NULL),
(46, '<p><img alt="Imagem" src="uploads/onepiece.jpg" style="height:108px; width:192px" />teste</p>\r\n', '2018-09-21 20:11:29', 4, 0, 1, NULL),
(47, '<p><em>teste</em></p>\r\n', '2018-09-21 21:06:53', 4, 0, 1, NULL),
(48, '<p><em>teste</em></p>\r\n', '2018-09-21 21:06:53', 4, 0, 1, NULL),
(49, '<p>teste</p>\r\n', '2018-09-21 21:08:42', 4, 0, 1, NULL),
(50, '<p>teste</p>\r\n', '2018-09-21 21:09:47', 4, 0, 1, NULL),
(51, 'testet', '2018-09-21 21:36:44', 4, 0, 1, NULL),
(52, '<h1><span style="font-family:Comic Sans MS,cursive">teste</span></h1>\r\n', '2018-09-21 21:49:33', 4, 0, 1, NULL),
(53, '<h1><span style="font-family:Comic Sans MS,cursive">teste</span></h1>\r\n', '2018-09-21 21:49:48', 4, 0, 1, NULL),
(54, '&lt;p&gt;teste&lt;/p&gt;\r\n', '2018-09-28 20:39:09', 4, 0, 1, NULL),
(55, '&lt;p&gt;teste&lt;/p&gt;\r\n', '2018-09-28 22:36:38', 4, 0, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `item_prova` int(10) UNSIGNED NOT NULL,
  `alternativa` int(11) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`item_prova`, `alternativa`, `criado_em`) VALUES
(1, 3, '2018-09-22 20:00:28'),
(2, 5, '2018-09-22 20:00:31'),
(3, 12, '2018-09-22 20:00:32'),
(4, 15, '2018-09-22 20:00:35'),
(5, 20, '2018-09-22 20:00:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessoes`
--

CREATE TABLE `sessoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` int(10) UNSIGNED NOT NULL,
  `inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `termino` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `usuario`, `inicio`, `termino`) VALUES
(1, 7, '2018-09-22 19:55:50', '2018-09-22 19:09:43'),
(2, 2, '2018-09-22 19:57:06', '2018-09-22 20:09:56'),
(3, 4, '2018-09-22 19:57:27', '2018-09-22 20:09:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(75) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `contexto` enum('aluno','professor','administrador') DEFAULT 'aluno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `codigo`, `senha`, `contexto`) VALUES
(1, 'Cristian William Albrecht', '4964', '1234', 'administrador'),
(2, 'Mikael Powzum Amorim', '7878', '1234', 'aluno'),
(3, 'Ederson', '0740', '1234', 'professor'),
(4, 'Mateus', '1234', '1234', 'aluno'),
(7, 'Diana', '3232', '1234', 'aluno'),
(9, 'Pedro', '9999', '1234', 'professor'),
(10, 'joão', '9090', '$2y$10$S6URNNG1tNWRDtSsmVU3YON9LnlVoJtMZlSq4a/DRLwQO2zD82t/6', 'administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alternativas_questoes1_idx` (`questao`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_usuario_idx` (`professor`);

--
-- Indexes for table `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provas_matriculas1_idx` (`aluno`,`disciplina`),
  ADD KEY `fk_provas_provas1_idx` (`prova`);

--
-- Indexes for table `itens_prova`
--
ALTER TABLE `itens_prova`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_itens_prova_questoes1_idx` (`questao`),
  ADD KEY `fk_itens_prova_formularios1_idx` (`formulario`);

--
-- Indexes for table `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`aluno`,`disciplina`),
  ADD KEY `fk_alunos_has_disciplinas_disciplinas1_idx` (`disciplina`);

--
-- Indexes for table `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_usuario_idx` (`professor`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_disciplinas1_idx` (`disciplina`),
  ADD KEY `professor_usuario_idx` (`professor`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`item_prova`),
  ADD KEY `fk_prova_respondida_itens_prova1_idx` (`item_prova`),
  ADD KEY `fk_prova_respondida_alternativas1_idx` (`alternativa`);

--
-- Indexes for table `sessoes`
--
ALTER TABLE `sessoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_idx` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `itens_prova`
--
ALTER TABLE `itens_prova`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `provas`
--
ALTER TABLE `provas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
