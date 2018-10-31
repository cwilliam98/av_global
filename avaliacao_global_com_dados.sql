-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2018 às 00:59
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
(149, 'Tem entre 2 a 4 litros. São retirados 450 mil', 0, 58),
(150, 'Tem entre 4 a 6 litros. São retirados 450 mil', 1, 58),
(151, 'Tem 10 litros. São retirados 2 litros.', 0, 58),
(152, 'Tem 7 litros. São retirados 1,5 litros.', 0, 58),
(153, 'Tem 0,5 litros. São retirados 0,5 litros.', 0, 58),
(154, 'Platão\r\n', 0, 59),
(155, 'Galileu Galilei\r\n', 0, 59),
(156, 'Descartes\r\n', 1, 59),
(157, 'Sócrates\r\n', 0, 59),
(158, 'Francis Bacon', 0, 59),
(159, 'França', 0, 60),
(160, 'Inglaterra', 0, 60),
(161, 'Brasil', 1, 60),
(162, 'Austrália', 0, 60),
(163, 'Itália', 0, 60),
(164, 'Região Norte', 0, 61),
(165, 'Região Sul', 1, 61),
(166, 'Região Nordeste', 0, 61),
(167, 'Gaspar, Nicolau e Natanael', 0, 62),
(168, 'Belchior, Gaspar e Baltazar\r\n', 1, 62),
(169, 'Belchior, Gaspar e Nataniel\r\n', 0, 62),
(170, 'Gabriel, Benjamim e Melchior\r\n', 0, 62),
(171, 'Melchior, Noé e Galileu', 0, 62),
(174, 'II e III, apenas.', 1, 65),
(175, 'I e II, apenas.', 0, 65),
(176, 'III, apenas.', 0, 65),
(177, 'I, apenas.', 0, 65),
(178, 'Sistema de Suporte à Decisão (SSD), Sistema d', 0, 66),
(179, 'Sistema de Gerenciamento da Cadeia de Suprime', 0, 66),
(180, 'Sistema de Informação Gerencial (SIG), Sistem', 0, 66),
(181, 'Sistema de Processamento de Transação (SPT), ', 1, 66),
(182, '3, 4, 2, 6, 1, 5', 1, 67),
(183, '6, 5, 1, 4, 2, 3', 0, 67),
(184, '4, 6, 5, 1, 3, 2', 0, 67),
(185, '5, 3, 1, 6, 2, 4', 0, 67),
(186, 'tste', 1, 71),
(187, 'teste', 1, 72),
(193, 'não teste', 0, 72),
(194, 'b', 0, 72);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas'),
(2, 'Ciências Contábeis ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `situacao` varchar(45) DEFAULT 'ativo',
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nome`, `professor`, `situacao`, `curso`) VALUES
(1, 'Redes e Servidores', 14, 'ativo', 1),
(2, 'Orientação a objetos', 14, 'inativo', 1),
(3, 'Estrutura de Dados', 9, 'inativo', 1),
(4, 'Banco de Dados', 3, 'inativo', 1),
(5, 'Sistemas de Informação', 14, 'ativo', 1),
(6, 'Orientação a objetos', 14, 'inativo', 1),
(7, 'Orientação a objetos', 14, 'ativo', 2),
(8, 'Conhecimentos Gerais', 14, 'ativo', 0),
(9, 'TESTE', 14, 'inativo', 0),
(10, 'TESTE', 14, 'ativo', 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_prova`
--

CREATE TABLE `itens_prova` (
  `id` int(10) UNSIGNED NOT NULL,
  `questao` int(10) UNSIGNED NOT NULL,
  `formulario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11, 4),
(11, 5),
(11, 8),
(12, 1),
(12, 2),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_letivo`
--

CREATE TABLE `periodo_letivo` (
  `id` int(11) NOT NULL,
  `codigo_periodo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `periodo_letivo`
--

INSERT INTO `periodo_letivo` (`id`, `codigo_periodo`) VALUES
(0, 'todos'),
(1, '2018/2');

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
  `tipo_prova` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `periodo_letivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `tipo_prova`, `nota`, `professor`, `periodo_letivo`) VALUES
(1, 'Avaliação Global', '2018-10-18 20:37:09', '2018-10-18 00:00:00', 5, 'teste', 0, 10, 0),
(2, 'Avaliação Global', '2018-10-20 23:30:01', '2018-10-20 00:00:00', 5, 'Semestral', 0, 10, 0),
(3, 'teste', '2018-10-26 20:33:21', '2018-10-26 00:00:00', 12, 'Avaliação global', 0, 10, 1);

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
  `imagem` varchar(200) DEFAULT NULL,
  `situacao` varchar(45) NOT NULL DEFAULT 'ativo',
  `periodo_letivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `descricao`, `criado_em`, `disciplina`, `peso`, `professor`, `imagem`, `situacao`, `periodo_letivo`) VALUES
(58, '<p><strong>Normalmente, quantos litros de sangue uma pessoa tem? Em m&eacute;dia, quantos s&atilde;o retirados numa doa&ccedil;&atilde;o de sangue?</strong></p>\r\n', '2018-10-15 19:38:44', 5, 0, 10, NULL, 'ativo', 1),
(59, '<p><strong>De quem &eacute; a famosa frase &ldquo;Penso, logo existo&rdquo;?</strong></p>\r\n', '2018-10-15 19:40:26', 5, 0, 10, NULL, 'ativo', 0),
(60, '<p><strong>De onde &eacute; a inven&ccedil;&atilde;o do chuveiro el&eacute;trico?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-10-15 19:41:09', 5, 0, 10, NULL, 'ativo', 0),
(61, '<h4><strong>O churrasco &eacute; uma comida t&iacute;pica de qual regi&atilde;o do Brasil?</strong></h4>\r\n\r\n<p><strong><img alt="" src="https://i0.wp.com/www.selecoes.com.br/wp-content/uploads/2017/12/churras.jpg" style="height:225px; width:400px" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-10-15 19:44:29', 5, 0, 10, NULL, 'ativo', 0),
(62, '<p><strong>Quais os nomes dos tr&ecirc;s Reis Magos?</strong></p>\r\n', '2018-10-15 19:48:34', 5, 0, 10, NULL, 'ativo', 0),
(65, '<p><strong>No que se refere a sistema de informa&ccedil;&atilde;o, analise as afirmativas.</strong></p>\r\n\r\n<p><strong>I - Um conjunto de componentes inter-relacionados que coletam ou recuperam, processam, armazenam e distribuem informa&ccedil;&otilde;es destinadas a apoiar a tomada de decis&otilde;es, a coordena&ccedil;&atilde;o e ao controle de uma organiza&ccedil;&atilde;o &eacute; uma dimens&atilde;o do sistema de informa&ccedil;&atilde;o.</strong></p>\r\n\r\n<p><strong>II - Informa&ccedil;&atilde;o refere-se a dados apresentados em uma forma significativa e &uacute;til para seres humanos e dados s&atilde;o sequ&ecirc;ncias de fatos brutos que representam eventos que ocorrem nas organiza&ccedil;&otilde;es ou no ambiente f&iacute;sico, antes de terem sido organizados e arranjados de uma forma que as pessoas possam entend&ecirc;-los e us&aacute;-los.</strong></p>\r\n\r\n<p><strong>III - Ao implantar um sistema de informa&ccedil;&atilde;o na organiza&ccedil;&atilde;o, haver&aacute; interfer&ecirc;ncia em seu subsistema t&eacute;cnico, social e pol&iacute;tico: no t&eacute;cnico, a organiza&ccedil;&atilde;o &eacute; afetada pelas novas t&eacute;cnicas e m&eacute;todos de trabalho; no social, altera-se a forma de relacionamento das pessoas entre si mesmas e das pessoas em rela&ccedil;&atilde;o ao sistema; no pol&iacute;tico, &eacute; modificada a rela&ccedil;&atilde;o de poderes e a informa&ccedil;&atilde;o.</strong></p>\r\n\r\n<p><strong>Est&aacute; correto o que se afirma em</strong></p>\r\n', '2018-10-15 20:03:37', 4, 0, 14, NULL, 'ativo', 0),
(66, '<p><strong>A classifica&ccedil;&atilde;o dos Sistemas de Informa&ccedil;&atilde;o computadorizados apresenta como crit&eacute;rio de categoriza&ccedil;&atilde;o o n&iacute;vel organizacional ao qual eles buscam atender, sendo definidos em tr&ecirc;s categorias essenciais:</strong></p>\r\n', '2018-10-15 20:04:42', 4, 0, 14, NULL, 'ativo', 0),
(67, '<p><strong>Considerando os elementos componentes dos Sistemas de Informa&ccedil;&atilde;o (SI) baseados em computadores, numere a coluna da direita de acordo com a da esquerda.</strong></p>\r\n\r\n<p><strong><img alt="" src="https://www.estudegratis.com.br/images/questoes/e1b0ab7158651a83254665489.gif" style="height:228px; width:400px" /></strong></p>\r\n\r\n<p><strong>Assinale a sequ&ecirc;ncia correta.</strong></p>\r\n', '2018-10-15 20:06:31', 8, 0, 14, NULL, 'ativo', 0),
(71, '<p><strong>teste</strong></p>\r\n', '2018-10-26 22:11:19', 5, 0, 10, NULL, 'ativo', 0),
(72, '<p>teste</p>\r\n', '2018-10-30 19:48:22', 7, 0, 10, NULL, 'ativo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `item_prova` int(10) UNSIGNED NOT NULL,
  `alternativa` int(11) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aluno` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`item_prova`, `alternativa`, `criado_em`, `aluno`) VALUES
(3, 149, '2018-10-20 23:30:21', 11),
(4, 157, '2018-10-20 23:30:14', 11),
(5, 161, '2018-10-20 23:30:16', 11),
(6, 165, '2018-10-20 23:30:22', 11),
(7, 169, '2018-10-20 23:30:24', 11),
(8, 185, '2018-10-20 23:30:28', 11),
(62, 174, '2018-10-15 21:58:14', 11),
(63, 181, '2018-10-15 21:49:34', 11),
(64, 182, '2018-10-15 21:58:11', 11),
(65, 150, '2018-10-15 21:58:10', 11),
(66, 157, '2018-10-15 21:49:40', 11),
(67, 161, '2018-10-15 21:58:05', 11),
(68, 165, '2018-10-15 21:58:09', 11),
(69, 169, '2018-10-15 21:58:06', 11);

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
(19, 11, '2018-10-15 20:10:33', '2018-10-20 23:10:31'),
(20, 11, '2018-10-15 20:13:05', '2018-10-20 23:10:31'),
(21, 11, '2018-10-15 20:14:11', '2018-10-20 23:10:31'),
(22, 11, '2018-10-15 20:14:41', '2018-10-20 23:10:31'),
(23, 11, '2018-10-15 20:15:30', '2018-10-20 23:10:31'),
(24, 11, '2018-10-15 20:15:51', '2018-10-20 23:10:31'),
(25, 11, '2018-10-15 20:26:49', '2018-10-20 23:10:31'),
(26, 11, '2018-10-15 21:11:22', '2018-10-20 23:10:31'),
(27, 11, '2018-10-15 21:49:27', '2018-10-20 23:10:31'),
(28, 11, '2018-10-15 22:08:25', '2018-10-20 23:10:31'),
(29, 11, '2018-10-15 22:09:36', '2018-10-20 23:10:31'),
(30, 11, '2018-10-15 22:19:10', '2018-10-20 23:10:31'),
(31, 11, '2018-10-15 22:20:12', '2018-10-20 23:10:31'),
(32, 11, '2018-10-15 22:21:25', '2018-10-20 23:10:31'),
(33, 12, '2018-10-18 20:52:40', NULL),
(34, 12, '2018-10-18 20:53:39', NULL),
(35, 11, '2018-10-18 20:58:30', '2018-10-20 23:10:31'),
(36, 11, '2018-10-20 23:30:09', '2018-10-20 23:10:31'),
(37, 11, '2018-10-26 20:33:50', NULL);

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
(10, 'joão', '9090', '$2y$10$S6URNNG1tNWRDtSsmVU3YON9LnlVoJtMZlSq4a/DRLwQO2zD82t/6', 'administrador'),
(11, 'Oda', '1234', '$2y$10$Ysfw0Xe3tdfY6QFEFwpGO.l1g9xjlqAQI44K1/JDjUTaqkfsiuWoW', 'aluno'),
(12, 'Cristian William Albrecht', '4964', '$2y$10$UmHgPt6iBbOoszIZffHvY.GBYc4uQz1b/dqzZiVIxTuOrYEQmedi2', 'aluno'),
(14, 'Éderson Slachta', '0740', '$2y$10$Q7Q33oR7ndoJt6r/og.HautWdKcdY.Lc2TKqDC9n5XG1c7ollLee.', 'professor');

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
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_usuario_idx` (`professor`),
  ADD KEY `fk_disciplinas_curso1_idx` (`curso`);

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
-- Indexes for table `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_usuario_idx` (`professor`),
  ADD KEY `fk_provas_periodo_letivo1_idx` (`periodo_letivo`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questoes_disciplinas1_idx` (`disciplina`),
  ADD KEY `professor_usuario_idx` (`professor`),
  ADD KEY `fk_questoes_periodo_letivo1_idx` (`periodo_letivo`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`item_prova`),
  ADD KEY `fk_prova_respondida_itens_prova1_idx` (`item_prova`),
  ADD KEY `fk_prova_respondida_alternativas1_idx` (`alternativa`),
  ADD KEY `fk_respostas_usuarios1_idx` (`aluno`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itens_prova`
--
ALTER TABLE `itens_prova`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `provas`
--
ALTER TABLE `provas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
