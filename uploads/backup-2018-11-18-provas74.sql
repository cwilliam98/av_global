#
# TABLE STRUCTURE FOR: provas
#

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

