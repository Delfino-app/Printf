-- --------------------------------------------------------
-- Anfitrião:                    localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for printf
CREATE DATABASE IF NOT EXISTS `printf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `printf`;

-- Dumping structure for table printf.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(60) NOT NULL,
  `ultimoNome` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` text NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table printf.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `primeiroNome`, `ultimoNome`, `img`, `email`, `senha`, `nivel`) VALUES
	(1, 'Delfino', 'Torres', 'cafdda102c8a0295d725288ada60c0adpng', 'admin@gmail.com', '$2a$07$asxx54ahjppf45sd87a5autHhS1FasOlNoNhJeYr7b4hdRApLhh/u', 0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table printf.anotacoes_aula
CREATE TABLE IF NOT EXISTS `anotacoes_aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `anotacao` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Tabela onde serão armazenadas as notações do User nas Aulas';

-- Dumping data for table printf.anotacoes_aula: ~7 rows (approximately)
/*!40000 ALTER TABLE `anotacoes_aula` DISABLE KEYS */;
INSERT INTO `anotacoes_aula` (`id`, `idUser`, `idAula`, `anotacao`, `data`) VALUES
	(2, 99, 1, 'efefefef', '2019-11-04 12:27:20'),
	(3, 97, 1, 'dwdwdwd', '2019-11-24 16:00:50'),
	(4, 97, 1, 'g5g5gg', '2019-11-24 18:36:19'),
	(5, 4, 1, 'lmmlmlm', '2019-11-24 23:52:28'),
	(6, 4, 1, 'lmmlmlm', '2019-11-24 23:52:28'),
	(7, 4, 1, 'lmmlmlm', '2019-11-24 23:52:37'),
	(8, 4, 1, 'lmmlmlm', '2019-11-24 23:52:37');
/*!40000 ALTER TABLE `anotacoes_aula` ENABLE KEYS */;

-- Dumping structure for table printf.anotacoes_livro_artigo
CREATE TABLE IF NOT EXISTS `anotacoes_livro_artigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `anotacao` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='Tabela onde serão armazenadas as notações do User nas Aulas';

-- Dumping data for table printf.anotacoes_livro_artigo: ~2 rows (approximately)
/*!40000 ALTER TABLE `anotacoes_livro_artigo` DISABLE KEYS */;
INSERT INTO `anotacoes_livro_artigo` (`id`, `idUser`, `idItem`, `categoria`, `anotacao`, `data`) VALUES
	(19, 99, 1, 'livro', 'Terminei a leitura na pÃ¡gina 20.', '2019-11-21 21:26:24');
/*!40000 ALTER TABLE `anotacoes_livro_artigo` ENABLE KEYS */;

-- Dumping structure for table printf.aula
CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resumo` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `exercicio` text,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`id`) REFERENCES `nivel_1` (`AulaId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table printf.aula: ~0 rows (approximately)
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;

-- Dumping structure for table printf.aulas
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `resumo` text NOT NULL,
  `dica` text,
  `tema` varchar(100) NOT NULL,
  `subtema` text,
  `conteudo` text NOT NULL,
  `exercicio` text,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table printf.aulas: ~4 rows (approximately)
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` (`id`, `nivel`, `resumo`, `dica`, `tema`, `subtema`, `conteudo`, `exercicio`, `estado`) VALUES
	(1, 1, 'Esta Ã© a primeira aula do nÃ­vel 1, o principal objetivo desta aula Ã© mostra-lo por meio de um video, por quÃª deve aprender a programar ou seja , por quÃª aprender programaÃ§Ã£o pode ser de grande importÃ¢ncia para si e quais sÃ£o algumas vantagens de saber programar.', '"Todos nesse paÃ­s deviam aprender a programar, pois isto nos ensina a pensar." - Steve Jobs', 'Por quÃª programar?', '<li><a href="#videoConteiner">Video</a></li>', '<div  id="videoConteiner" class="section scrollspy" style="margin-top:-1px">\n	<video  poster="Vista/Imagens/upload/Videos/img3.png"  class="responsive-video" controls id="videoContent" >\n			<source src="Vista/Videos/Repositorio/cortesia/aula1.mp4" type="video/mp4">\n	</video>\n	<p id="tituloVideioPlaying" class="info">\n		Por quÃª programar ?	\n        </p>\n</div>', '', ''),
	(2, 1, 'Nesta aula serÃ£o apresentados conceitos bÃ¡sicos associados Ã  <strong>LÃ³gica de programaÃ§Ã£o</strong>. Esses conceitos, apesar de serem bÃ¡sicos sÃ£o muito importante, por isso durante a aula preste bastante atenÃ§Ã£o.', '"Ouse ir alÃ©m, ouse fazer diferente e o poder lhe serÃ¡ dado" - JosÃ© Roberto', 'IntroduÃ§Ã£o Ã  LÃ³gica de ProgramaÃ§Ã£o', '<li><a href="#logica">LÃ³gica</a></li>\n<li><a href="#sequenciaLogica">SequÃªncia LÃ³gica</a></li>\n<li><a href="#instrucoes">IntruÃ§Ãµes</a></li>\n<li><a href="#algoritmo">Algoritmo</a></li>\n<li><a href="#programas">Programas</a></li>', '<strong>LÃ³gica</strong><br><br>\nA lÃ³gica de programaÃ§Ã£o Ã© necessÃ¡ria para pessoas que desejam trabalhar com\ndesenvolvimento de sistemas e programas, ela permite definir a seqÃ¼Ãªncia lÃ³gica para o\ndesenvolvimento.<br><br>\nEntÃ£o o que Ã© lÃ³gica?<br><br>\n<strong>LÃ³gica de programaÃ§Ã£o Ã© a tÃ©cnica de encadear pensamentos para atingir determinado\nobjetivo.</strong>\n<br><br>\n<strong>SequÃªncia LÃ³gica</strong>\n<br><br>\nEstes pensamentos, podem ser descritos como uma seqÃ¼Ãªncia de instruÃ§Ãµes, que devem ser seguidas para se cumprir uma determinada tarefa.\n<br><br>\n<strong>SeqÃ¼Ãªncia LÃ³gica sÃ£o passos executados atÃ© atingir um objetivo ou soluÃ§Ã£o de umproblema.</strong><br><br>\n<strong>InstruÃ§Ãµes</strong>\n<br><br>\nNa linguagem comum, entende-se por instruÃ§Ãµes â€œum conjunto de regras ou normas\ndefinidas para a realizaÃ§Ã£o ou emprego de algoâ€.\nEm informÃ¡tica, porÃ©m, instruÃ§Ã£o Ã© a informaÃ§Ã£o que indica a um computador uma aÃ§Ã£o\nelementar a executar.\n<br><br>\nConvÃ©m ressaltar que uma ordem isolada nÃ£o permite realizar o processo completo, para isso\nÃ© necessÃ¡rio um conjunto de instruÃ§Ãµes colocadas em ordem seqÃ¼encial lÃ³gica.\nPor exemplo, se quisermos fazer uma omelete de batatas, precisaremos colocar em prÃ¡tica\numa sÃ©rie de instruÃ§Ãµes: descascar as batatas, bater os ovos, fritar as batatas, etc...<br><br>\nÃ‰ evidente que essas instruÃ§Ãµes tem que ser executadas em uma ordem adequada â€“ nÃ£o se pode descascar as batatas depois de fritÃ¡-las.<br>\nDessa maneira, uma instruÃ§Ã£o tomada em separado nÃ£o tem muito sentido; para obtermos o resultado, precisamos colocar em prÃ¡tica o conjunto de todas as instruÃ§Ãµes, na ordem correta.<br><br>\n<strong>InstruÃ§Ãµes sÃ£o um conjunto de regras ou normas definidas para a realizaÃ§Ã£o ou\nemprego de algo. Em informÃ¡tica, Ã© o que indica a um computador uma aÃ§Ã£o elementar\na executar.</strong>\n<br><br>\n<strong>Algoritmo</strong>\n<br><br>\n<strong>Um algoritmo Ã© formalmente uma seqÃ¼Ãªncia finita de passos que levam a execuÃ§Ã£o de uma tarefa.</strong> <br><br>Podemos pensar em algoritmo como uma receita, uma seqÃ¼Ãªncia de instruÃ§Ãµes que dÃ£o cabo de uma meta especÃ­fica. Estas tarefas nÃ£o podem ser redundantes nem subjetivas na sua definiÃ§Ã£o, devem ser claras e precisas.<br><br>\nComo exemplos de algoritmos podemos citar os algoritmos das operaÃ§Ãµes bÃ¡sicas (adiÃ§Ã£o, multiplicaÃ§Ã£o, divisÃ£o e subtraÃ§Ã£o) de nÃºmeros reais decimais. Outros exemplos seriam os manuais de aparelhos eletrÃ´nicos, como um videocassete, que explicam passo-a-passo como, por exemplo, gravar um evento.<br><br>\nAtÃ© mesmo as coisas mais simples, podem ser descritas por seqÃ¼Ãªncias lÃ³gicas. Por exemplo:<br><br>\nâ€œChupar uma balaâ€.\nâ€¢ Pegar a bala\nâ€¢ Retirar o papel\nâ€¢ Chupar a bala\nâ€¢ Jogar o papel no lixo\n<br><br>\n<strong> Programas</strong><br><br>\n\nOs programas de computadores nada mais sÃ£o do que algoritmos escritos numa linguagem de computador (Pascal, C, Cobol, Fortran, Visual Basic entre outras) e que sÃ£o interpretados e executados por uma mÃ¡quina, no caso um computador. Notem que dada esta interpretaÃ§Ã£o rigorosa, um programa Ã© por natureza muito especÃ­fico e rÃ­gido em relaÃ§Ã£o aos algoritmos da vida real.\n<br><br>\n', '', ''),
	(3, 1, 'Nesta aula serÃ£o apresentados conceitos bÃ¡sicos associados Ã  LÃ³gica de programaÃ§Ã£o. Esses conceitos, apesar de serem bÃ¡sicos sÃ£o muito importante, por isso durante a aula preste bastante atenÃ§Ã£o.', 'wdwddwd', 'Aula Teste', 'wdwdwd', 'wdwdwd', '', ''),
	(4, 1, 'Nesta aula serÃ£o apresentados conceitos bÃ¡sicos associados Ã  LÃ³gica de programaÃ§Ã£o. Esses conceitos, apesar de serem bÃ¡sicos sÃ£o muito importante, por isso durante a aula preste bastante atenÃ§Ã£o', 'qsqsq', 's1', 'qsqsqsqqsqsq', 'qsqs', NULL, 'bloqueado');
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;

-- Dumping structure for table printf.chat_sms
CREATE TABLE IF NOT EXISTS `chat_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `sms` text NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Tabela de Troca de sms_Chat';

-- Dumping data for table printf.chat_sms: ~2 rows (approximately)
/*!40000 ALTER TABLE `chat_sms` DISABLE KEYS */;
INSERT INTO `chat_sms` (`id`, `de`, `para`, `sms`, `estado`, `data`) VALUES
	(20, 1, 4, 'Sim, Delfino...Seja bem vindo ao Printf', NULL, '2019-11-24 23:57:56');
/*!40000 ALTER TABLE `chat_sms` ENABLE KEYS */;

-- Dumping structure for table printf.comentarios_video
CREATE TABLE IF NOT EXISTS `comentarios_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVideo` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table printf.comentarios_video: ~0 rows (approximately)
/*!40000 ALTER TABLE `comentarios_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios_video` ENABLE KEYS */;

-- Dumping structure for table printf.comprar_item_loja
CREATE TABLE IF NOT EXISTS `comprar_item_loja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='Compras do Usuario na Loja (Videos, Livros, Artigos e Outro)';

-- Dumping data for table printf.comprar_item_loja: ~2 rows (approximately)
/*!40000 ALTER TABLE `comprar_item_loja` DISABLE KEYS */;
INSERT INTO `comprar_item_loja` (`id`, `idUser`, `idItem`, `categoria`, `data`) VALUES
	(11, 99, 2, 'livros', '2019-11-05 15:18:59'),
	(12, 99, 1, 'videos', '2019-11-05 15:19:20'),
	(13, 99, 5, 'videos', '2019-11-05 15:19:51');
/*!40000 ALTER TABLE `comprar_item_loja` ENABLE KEYS */;

-- Dumping structure for table printf.c_m_artigos
CREATE TABLE IF NOT EXISTS `c_m_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idArtigo` int(11) NOT NULL,
  `dataCompra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idArtigo` (`idArtigo`),
  CONSTRAINT `c_m_artigos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuariosbk` (`id`),
  CONSTRAINT `c_m_artigos_ibfk_2` FOREIGN KEY (`idArtigo`) REFERENCES `m_artigos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de Compra de Artigos';

-- Dumping data for table printf.c_m_artigos: ~0 rows (approximately)
/*!40000 ALTER TABLE `c_m_artigos` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_m_artigos` ENABLE KEYS */;

-- Dumping structure for table printf.c_m_livros
CREATE TABLE IF NOT EXISTS `c_m_livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL,
  `dataCompra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`,`idLivro`),
  KEY `idLivro` (`idLivro`),
  CONSTRAINT `c_m_livros_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuariosbk` (`id`),
  CONSTRAINT `c_m_livros_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `m_livros` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de Compra de Livros';

-- Dumping data for table printf.c_m_livros: ~0 rows (approximately)
/*!40000 ALTER TABLE `c_m_livros` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_m_livros` ENABLE KEYS */;

-- Dumping structure for table printf.c_m_videos
CREATE TABLE IF NOT EXISTS `c_m_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `dataCompra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idVideo` (`idVideo`),
  CONSTRAINT `c_m_videos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuariosbk` (`id`),
  CONSTRAINT `c_m_videos_ibfk_2` FOREIGN KEY (`idVideo`) REFERENCES `m_videos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de compra de Videos';

-- Dumping data for table printf.c_m_videos: ~0 rows (approximately)
/*!40000 ALTER TABLE `c_m_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_m_videos` ENABLE KEYS */;

-- Dumping structure for table printf.desempenho
CREATE TABLE IF NOT EXISTS `desempenho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `classificacaoGeral` int(11) NOT NULL,
  `posicaoRakingo` int(11) NOT NULL,
  `assistenciaAulas` int(11) NOT NULL,
  `participacoesAulas` int(11) NOT NULL,
  `resolucaoTarefas` int(11) NOT NULL,
  `avaliacoesProvas` int(11) NOT NULL,
  `mediaDesempenho` double NOT NULL,
  `pontuacao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table printf.desempenho: ~3 rows (approximately)
/*!40000 ALTER TABLE `desempenho` DISABLE KEYS */;
INSERT INTO `desempenho` (`id`, `idUser`, `classificacaoGeral`, `posicaoRakingo`, `assistenciaAulas`, `participacoesAulas`, `resolucaoTarefas`, `avaliacoesProvas`, `mediaDesempenho`, `pontuacao`) VALUES
	(1, 3, 0, 0, 0, 0, 0, 0, 0, 0),
	(2, 4, 0, 0, 10, 0, 0, 0, 2, 2),
	(4, 9, 0, 0, 0, 0, 0, 0, 0, 0),
	(5, 10, 0, 0, 10, 0, 0, 0, 2, 2);
/*!40000 ALTER TABLE `desempenho` ENABLE KEYS */;

-- Dumping structure for table printf.duvidas_aula
CREATE TABLE IF NOT EXISTS `duvidas_aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `duvida` text NOT NULL,
  `estado` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Tabela onde serão armazenadas as notações do User nas Aulas';

-- Dumping data for table printf.duvidas_aula: ~9 rows (approximately)
/*!40000 ALTER TABLE `duvidas_aula` DISABLE KEYS */;
INSERT INTO `duvidas_aula` (`id`, `idUser`, `idAula`, `duvida`, `estado`, `data`) VALUES
	(1, 99, 1, 'd2wdwdwd', 'pendente', '2019-11-04 12:42:54'),
	(2, 4, 2, '3dd3d3', 'pendente', '2019-11-25 06:31:05'),
	(3, 4, 2, 'wsws', 'pendente', '2019-11-25 07:34:17'),
	(4, 4, 2, 'wsws', 'pendente', '2019-11-25 07:34:25'),
	(5, 4, 2, 'wsws', 'pendente', '2019-11-25 07:34:33'),
	(6, 4, 2, 'csscc', 'pendente', '2019-11-25 07:35:52'),
	(7, 4, 2, 'dedede', 'pendente', '2019-11-25 07:39:19'),
	(8, 4, 2, 'wdwdwd', 'pendente', '2019-11-25 07:39:46'),
	(9, 4, 2, 'qsqsqs', 'pendente', '2019-11-25 07:40:12'),
	(10, 4, 2, 'ssqsq', 'pendente', '2019-11-25 07:40:37'),
	(11, 4, 2, 'dwdwdwd', 'pendente', '2019-11-25 07:41:07');
/*!40000 ALTER TABLE `duvidas_aula` ENABLE KEYS */;

-- Dumping structure for table printf.exercicio
CREATE TABLE IF NOT EXISTS `exercicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `questionario` text NOT NULL,
  `exercicio` text NOT NULL,
  `tentativas` int(11) NOT NULL DEFAULT '0',
  `pontuacao` int(11) NOT NULL,
  `opcaoCerta` varchar(200) NOT NULL DEFAULT '0',
  `opcao1` varchar(200) NOT NULL DEFAULT '',
  `opcao2` varchar(200) NOT NULL DEFAULT '0',
  `opcao3` varchar(200) NOT NULL DEFAULT '0',
  `opcao4` varchar(200) NOT NULL DEFAULT '0',
  `ajuda` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Lista de Exercicios ';

-- Dumping data for table printf.exercicio: ~1 rows (approximately)
/*!40000 ALTER TABLE `exercicio` DISABLE KEYS */;
INSERT INTO `exercicio` (`id`, `nivel`, `idAula`, `questionario`, `exercicio`, `tentativas`, `pontuacao`, `opcaoCerta`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `ajuda`, `data`) VALUES
	(2, 1, 2, '2ed2d', 'O que Ã© LÃ³gica de programaÃ§Ã£o?', 1, 4, 'opcao1', 'TÃ©cnica de encadear pensamentos para atingir um objectivo', 'Conjunto de regras ou normas definidas para realizar algo', 'Passos para executar um programa', 'Algoritmos', '2dd', '2019-11-01 09:50:04');
/*!40000 ALTER TABLE `exercicio` ENABLE KEYS */;

-- Dumping structure for table printf.m_artigos
CREATE TABLE IF NOT EXISTS `m_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artigo` text NOT NULL,
  `tema` varchar(50) NOT NULL,
  `imgartigo` text NOT NULL,
  `fonte` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `preco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table printf.m_artigos: ~4 rows (approximately)
/*!40000 ALTER TABLE `m_artigos` DISABLE KEYS */;
INSERT INTO `m_artigos` (`id`, `artigo`, `tema`, `imgartigo`, `fonte`, `estado`, `preco`) VALUES
	(1, '', 'As 10 melhores frases de Steve Jobs', 'img2.png', 'Lista10.org', 'unlock', 0),
	(2, '', '13 conhecimentos essenciais para um programador', 'img4.jpeg', 'Desconhecida', 'lock', 1),
	(3, '', 'Os quatro tipos de programadores ', 'img3.jpg', 'Desconhecida', 'lock', 3),
	(4, '', '5 motivos para programar em php', 'img1.jpg', 'School of Net', 'lock', 5);
/*!40000 ALTER TABLE `m_artigos` ENABLE KEYS */;

-- Dumping structure for table printf.m_livros
CREATE TABLE IF NOT EXISTS `m_livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livro` text NOT NULL,
  `tema` varchar(50) NOT NULL,
  `imglivro` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `preco` int(11) NOT NULL,
  `fonte` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table printf.m_livros: ~9 rows (approximately)
/*!40000 ALTER TABLE `m_livros` DISABLE KEYS */;
INSERT INTO `m_livros` (`id`, `livro`, `tema`, `imglivro`, `estado`, `preco`, `fonte`) VALUES
	(1, 'livro1', 'Logica de Programacao', 'img1.png', 'unlock', 0, 'Casa do Codigo'),
	(2, 'livro2', 'HTML5 e CSS3', 'img2.png', 'lock', 12, 'Casa do Codigo'),
	(4, '', 'Google Android', 'img4.png', 'lock', 144, 'Casa do Codigo'),
	(5, '', 'Comecando com Linux', 'img5.png', 'lock', 147, 'Casa do Codigo'),
	(6, '', 'Desenvolvimento de Jogos para Android', 'img6.png', 'lock', 151, 'Casa do Codigo'),
	(7, '', 'Desenvolvimento web com PHP e MYSQL', 'img7.png', 'lock', 156, 'Casa do Codigo'),
	(8, '', 'Dominando JavaScript com jQuery', 'img8.png', 'lock', 159, 'Casa do Codigo'),
	(9, '', 'Aplicacoes Java para web com JSF e JPA', 'img9.png', 'lock', 163, 'Casa do Codigo'),
	(10, '', 'Node.js - Apps real-time', 'img10.png', 'lock', 200, 'Casa do Codigo');
/*!40000 ALTER TABLE `m_livros` ENABLE KEYS */;

-- Dumping structure for table printf.m_videos
CREATE TABLE IF NOT EXISTS `m_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` text NOT NULL,
  `tema` varchar(50) NOT NULL,
  `duracao` time NOT NULL,
  `fonte` varchar(50) NOT NULL,
  `imgvideo` text NOT NULL,
  `visualizacoes` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `preco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table printf.m_videos: ~6 rows (approximately)
/*!40000 ALTER TABLE `m_videos` DISABLE KEYS */;
INSERT INTO `m_videos` (`id`, `video`, `tema`, `duracao`, `fonte`, `imgvideo`, `visualizacoes`, `estado`, `preco`) VALUES
	(1, 'video1', '14 Year Old Prodigy Programmer Dreams In Code', '00:08:41', 'THNKR', 'img1.png', 0, 'lock', 7),
	(2, 'video0', 'Todo mundo deveria aprender a programar ', '00:05:43', 'Code.org', 'img3.png', 0, 'unlock', 0),
	(3, '', 'Aprenda a programar desde cedo', '00:13:58', 'Super Geeks', 'img4.png', 0, 'lock', 11),
	(4, '', 'Giovana Delfino - Programadora Brasileira', '00:04:34', 'Alura', 'img5.png', 0, 'lock', 13),
	(5, 'videoW', 'This Woman Created a Programming Language', '00:02:18', 'MIT Technology Review', 'img2.png', 0, 'lock', 5),
	(6, '', 'Inteligencia Artificial', '01:27:46', 'IBM', 'img6.png', 0, 'lock', 1500);
/*!40000 ALTER TABLE `m_videos` ENABLE KEYS */;

-- Dumping structure for table printf.nivel_1
CREATE TABLE IF NOT EXISTS `nivel_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AulaId` int(11) NOT NULL,
  `AulaN` int(11) NOT NULL,
  `Tema` varchar(200) NOT NULL,
  `Exercicios` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Observacao` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AulaId` (`AulaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table printf.nivel_1: ~0 rows (approximately)
/*!40000 ALTER TABLE `nivel_1` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivel_1` ENABLE KEYS */;

-- Dumping structure for table printf.notificacao
CREATE TABLE IF NOT EXISTS `notificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `notificacao` text,
  `link` char(50) NOT NULL DEFAULT '#',
  `estado` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table printf.notificacao: ~16 rows (approximately)
/*!40000 ALTER TABLE `notificacao` DISABLE KEYS */;
INSERT INTO `notificacao` (`id`, `de`, `para`, `titulo`, `notificacao`, `link`, `estado`, `data`) VALUES
	(1, 1, 96, 'A sua mÃ©dia de desempenho aumentou 10%', NULL, 'Desempenho', 'ativo', '2019-11-05 03:34:55'),
	(2, 1, 96, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-05 03:34:55'),
	(3, 1, 99, 'A sua mÃ©dia de desempenho aumentou 10%', NULL, 'Desempenho', 'ativo', '2019-11-05 15:17:31'),
	(4, 1, 99, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-05 15:17:31'),
	(5, 1, 97, 'A sua mÃ©dia de desempenho aumentou 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 15:49:47'),
	(6, 1, 97, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-24 15:49:47'),
	(7, 1, 97, 'A sua mÃ©dia de desempenho aumentou 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 19:03:02'),
	(8, 1, 97, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-24 19:03:02'),
	(9, 1, 97, 'Tens 1 exercicio(s) da aula nÂº 2 para resolveres', NULL, 'Inicio#exercicios', 'ativo', '2019-11-24 19:03:02'),
	(10, 1, 97, 'A sua mÃ©dia de desempenho aumentou 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 19:03:02'),
	(11, 1, 97, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-24 19:03:02'),
	(12, 1, 97, 'A sua mÃ©dia de desempenho aumentou + 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 19:55:14'),
	(13, 1, 97, 'A sua pontuaÃ§Ã£o aumentou + ', NULL, 'Desempenho', 'ativo', '2019-11-24 19:55:14'),
	(14, 1, 97, 'A sua mÃ©dia de desempenho aumentou + 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 19:59:54'),
	(15, 1, 97, 'A sua pontuaÃ§Ã£o aumentou + 4 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-24 19:59:54'),
	(16, 1, 4, 'A sua mÃ©dia de desempenho aumentou + 10%', NULL, 'Desempenho', 'ativo', '2019-11-24 23:53:20'),
	(17, 1, 4, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-24 23:53:20'),
	(18, 1, 10, 'A sua mÃ©dia de desempenho aumentou + 10%', NULL, 'Desempenho', 'ativo', '2019-11-25 16:16:31'),
	(19, 1, 10, 'Recebeu um bÃ´nos de 2 Bitcoins', NULL, 'Desempenho', 'ativo', '2019-11-25 16:16:31');
/*!40000 ALTER TABLE `notificacao` ENABLE KEYS */;

-- Dumping structure for table printf.notificacoes
CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `notificacao` text NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT '',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `de` (`de`,`para`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table printf.notificacoes: 1 rows
/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;
INSERT INTO `notificacoes` (`id`, `de`, `para`, `notificacao`, `estado`, `data`) VALUES
	(1, 1, 1, 'yyy', 'yy', '2019-10-27 12:11:08');
/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;

-- Dumping structure for table printf.resolver_exercicio
CREATE TABLE IF NOT EXISTS `resolver_exercicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `idExercicio` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Lista de exercicios a resolver ou resolvidos';

-- Dumping data for table printf.resolver_exercicio: ~1 rows (approximately)
/*!40000 ALTER TABLE `resolver_exercicio` DISABLE KEYS */;
INSERT INTO `resolver_exercicio` (`id`, `idUser`, `idAula`, `idExercicio`, `estado`, `data`) VALUES
	(1, 97, 2, 2, 'feito', '2019-11-24 19:59:24');
/*!40000 ALTER TABLE `resolver_exercicio` ENABLE KEYS */;

-- Dumping structure for table printf.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `Tema` varchar(20) NOT NULL,
  `Utilizacao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table printf.tema: ~0 rows (approximately)
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;

-- Dumping structure for table printf.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primeiroNome` text NOT NULL,
  `ultimoNome` text,
  `email` text,
  `senha` text,
  `img` varchar(40) DEFAULT NULL,
  `tema` varchar(20) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `aula_atual` int(11) DEFAULT NULL,
  `total_aula` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table printf.usuarios: ~3 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `primeiroNome`, `ultimoNome`, `email`, `senha`, `img`, `tema`, `nivel`, `aula_atual`, `total_aula`) VALUES
	(4, 'Delfino', 'Torres', 'delfinoapp@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', '6a57a7d5d228a52ee27798b4ceac47ccpng', 'blue-grey darken-3', 1, 2, 4),
	(9, 'Torres', 'Torres', 'torres@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'default.jpg', 'blue-gray darken 3', 1, 1, 4),
	(10, 'Filipe', 'Pedro', 'filipe@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'default.jpg', 'blue-grey darken-3', 1, 2, 4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Dumping structure for table printf.usuariosbk
CREATE TABLE IF NOT EXISTS `usuariosbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(50) NOT NULL DEFAULT '',
  `ultimoNome` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `senha` varchar(200) NOT NULL,
  `img` varchar(40) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `nivel` int(11) NOT NULL,
  `aula_atual` int(11) NOT NULL,
  `total_aula` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- Dumping data for table printf.usuariosbk: ~5 rows (approximately)
/*!40000 ALTER TABLE `usuariosbk` DISABLE KEYS */;
INSERT INTO `usuariosbk` (`id`, `primeiroNome`, `ultimoNome`, `email`, `senha`, `img`, `tema`, `nivel`, `aula_atual`, `total_aula`) VALUES
	(95, 'Daniel', 'Mandriz', 'daniel@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'default.jpg', 'blue-grey darken-3', 1, 1, 0),
	(96, 'Delfino', 'Torres', 'delfinoapp@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'cafdda102c8a0295d725288ada60c0adpng', 'blue-grey darken-3', 1, 1, 0),
	(97, 'Filipe', 'Pedro', 'filipe@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', '1aba16b0288d897478112ebbe3a964c4jpg', 'blue-grey darken-3', 1, 3, 0),
	(98, 'Ana', 'Pedro', 'ana@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'default.jpg', 'blue-grey darken-3', 1, 1, 0),
	(99, 'Izidane', 'Henrique', 'izidane@gmail.com', '$2a$07$asxx54ahjppf45sd87a5au5q0elvARS2JhvkLW.gN6PlPDvnF1o62', 'dafe1f9226771934ef6bae6093ea14f4jpeg', 'blue-grey darken-3', 1, 2, 0);
/*!40000 ALTER TABLE `usuariosbk` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
