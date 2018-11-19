#
# TABLE STRUCTURE FOR: provas
#

DROP TABLE IF EXISTS `provas`;

CREATE TABLE `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aplicacao` datetime NOT NULL,
  `qtd_questoes` int(11) NOT NULL,
  `tipo_prova` varchar(45) NOT NULL,
  `nota` float NOT NULL,
  `professor` int(10) unsigned NOT NULL,
  `periodo_letivo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_usuario_idx` (`professor`),
  KEY `fk_provas_periodo_letivo1_idx` (`periodo_letivo`),
  CONSTRAINT `fk_provas_periodo_letivo1` FOREIGN KEY (`periodo_letivo`) REFERENCES `periodo_letivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prova_professor_usuario` FOREIGN KEY (`professor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `tipo_prova`, `nota`, `professor`, `periodo_letivo`) VALUES ('2', 'Avaliação Global', '2018-11-14 21:03:40', '2018-11-15 00:00:00', '4', 'Avaliação global', '0', '482', '220');
INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `tipo_prova`, `nota`, `professor`, `periodo_letivo`) VALUES ('3', 'Avaliação Global', '2018-11-16 18:34:34', '2018-11-16 19:00:00', '5', 'Avaliação global', '0', '482', '220');
INSERT INTO `provas` (`id`, `nome`, `criado_em`, `aplicacao`, `qtd_questoes`, `tipo_prova`, `nota`, `professor`, `periodo_letivo`) VALUES ('4', 'Avaliação Global', '2018-11-17 17:08:14', '2018-11-17 17:08:00', '5', 'Semestral', '0', '482', '0');


