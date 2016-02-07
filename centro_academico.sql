CREATE DATABASE  IF NOT EXISTS `centro_academico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `centro_academico`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: centro_academico
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas_conhecimento`
--

DROP TABLE IF EXISTS `areas_conhecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas_conhecimento` (
  `are_id` int(11) NOT NULL AUTO_INCREMENT,
  `are_nome` varchar(100) DEFAULT NULL,
  `are_numero` int(20) DEFAULT NULL,
  PRIMARY KEY (`are_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas_conhecimento`
--

LOCK TABLES `areas_conhecimento` WRITE;
/*!40000 ALTER TABLE `areas_conhecimento` DISABLE KEYS */;
INSERT INTO `areas_conhecimento` VALUES (1,'Ciência da Computação',10300007),(2,'Ciências Biológicas',20000006),(3,'Matemática',10100008),(4,'Agronomia',50100009);
/*!40000 ALTER TABLE `areas_conhecimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('6585f822b1abbcab30c662c27205ff24','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',1454862877,'a:6:{s:9:\"user_data\";s:0:\"\";s:4:\"nome\";s:13:\"Ronieri Sales\";s:10:\"usuario_id\";s:1:\"6\";s:6:\"grupos\";s:1:\"1\";s:5:\"email\";s:22:\"ronieri.sales@live.com\";s:14:\"funcionalidade\";a:7:{i:0;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"1\";s:4:\"nome\";s:8:\"Usuário\";s:3:\"url\";s:8:\"usuarios\";s:5:\"icone\";s:10:\"fa fa-user\";}i:1;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:9:\"Conteúdo\";s:3:\"url\";s:8:\"conteudo\";s:5:\"icone\";s:15:\"fa fa-file-text\";}i:2;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"3\";s:4:\"nome\";s:11:\"Calendário\";s:3:\"url\";s:10:\"calendario\";s:5:\"icone\";s:14:\"fa fa-calendar\";}i:3;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"4\";s:4:\"nome\";s:9:\"Finanças\";s:3:\"url\";s:8:\"financas\";s:5:\"icone\";s:16:\"fa fa-university\";}i:4;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"5\";s:4:\"nome\";s:10:\"Categorias\";s:3:\"url\";s:10:\"categorias\";s:5:\"icone\";s:10:\"fa fa-list\";}i:5;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"6\";s:4:\"nome\";s:12:\"Repositório\";s:3:\"url\";s:12:\"repositorios\";s:5:\"icone\";s:14:\"fa fa-database\";}i:6;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"7\";s:4:\"nome\";s:12:\"Orientadores\";s:3:\"url\";s:12:\"orientadores\";s:5:\"icone\";s:20:\"fa fa-graduation-cap\";}}}'),('73f68bda22659486cdb23dcb707b9736','192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36',1454869914,'a:6:{s:9:\"user_data\";s:0:\"\";s:4:\"nome\";s:4:\"Fabi\";s:10:\"usuario_id\";s:1:\"3\";s:6:\"grupos\";s:1:\"1\";s:5:\"email\";s:16:\"fabi@example.com\";s:14:\"funcionalidade\";a:7:{i:0;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"1\";s:4:\"nome\";s:8:\"Usuário\";s:3:\"url\";s:8:\"usuarios\";s:5:\"icone\";s:10:\"fa fa-user\";}i:1;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:9:\"Conteúdo\";s:3:\"url\";s:8:\"conteudo\";s:5:\"icone\";s:15:\"fa fa-file-text\";}i:2;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"3\";s:4:\"nome\";s:11:\"Calendário\";s:3:\"url\";s:10:\"calendario\";s:5:\"icone\";s:14:\"fa fa-calendar\";}i:3;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"4\";s:4:\"nome\";s:9:\"Finanças\";s:3:\"url\";s:8:\"financas\";s:5:\"icone\";s:16:\"fa fa-university\";}i:4;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"5\";s:4:\"nome\";s:10:\"Categorias\";s:3:\"url\";s:10:\"categorias\";s:5:\"icone\";s:10:\"fa fa-list\";}i:5;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"6\";s:4:\"nome\";s:12:\"Repositório\";s:3:\"url\";s:12:\"repositorios\";s:5:\"icone\";s:14:\"fa fa-database\";}i:6;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"7\";s:4:\"nome\";s:12:\"Orientadores\";s:3:\"url\";s:12:\"orientadores\";s:5:\"icone\";s:20:\"fa fa-graduation-cap\";}}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger access_control after insert 
on ci_sessions
for each row
begin
	insert into log_sessions set
    ip_address=new.ip_address,
    user_agent=new.user_agent,
    user_data=new.user_data,
    log_date=now();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conteudo` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_conteudo_tp_con_id` int(11) NOT NULL,
  `usuarios_usu_id` int(11) NOT NULL,
  `con_titulo` varchar(255) NOT NULL,
  `con_descricao` text NOT NULL,
  `con_imagem` varchar(255) DEFAULT NULL,
  `con_data` date DEFAULT NULL,
  `con_data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `con_destaque` tinyint(4) DEFAULT '0',
  `con_link` varchar(45) NOT NULL,
  `con_subtitulo` varchar(100) NOT NULL,
  PRIMARY KEY (`con_id`),
  UNIQUE KEY `con_link_UNIQUE` (`con_link`),
  KEY `fk_noticias_tipo_noticias1` (`tipo_conteudo_tp_con_id`),
  KEY `fk_noticias_usuarios1` (`usuarios_usu_id`),
  CONSTRAINT `fk_tipo_conteudo` FOREIGN KEY (`tipo_conteudo_tp_con_id`) REFERENCES `tipo_conteudo` (`tp_con_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudo`
--

LOCK TABLES `conteudo` WRITE;
/*!40000 ALTER TABLE `conteudo` DISABLE KEYS */;
INSERT INTO `conteudo` VALUES (55,2,6,'Gintec 2016','<p class=\"Standard\">Centro Acad&ecirc;mico Alan Turing confirma parceria com a Coordena&ccedil;&atilde;o do Curso T&eacute;cnico em Inform&aacute;tica e Ci&ecirc;ncia da Computa&ccedil;&atilde;o para Gintec 2016.</p>\n<p class=\"Standard\">Aguardem novidades!</p>','img/conteudo/gintec-2016/10928961_823615287691857_1027959933340785435_o.jpg','2016-01-29','2016-02-06 16:08:54',1,'gintec_2016','Novidades Gintec'),(56,2,8,'Campeonato de Futebol','<p class=Standard>Centro Acad&ecirc;mico Alan Turing confirma parceria com a Coordena&ccedil;&atilde;o do Curso T&eacute;cnico em Inform&aacute;tica e Ci&ecirc;ncia da Computa&ccedil;&atilde;o para um campeonato de Futsal unisex.</p>','img/conteudo/campeonato-de-futebol/10336787_657047711015283_493429970193959423_n.jpg','2016-01-29','2016-01-29 12:15:10',1,'campeonato_de_futebol','Atividades Recriativas'),(57,1,6,'Rifas Carnaval','<p>O Centro Acad&ecirc;mico Alan Turing est&aacute; organizando uma rifa do Coringa do Carnaval 2016 Bloco Vermes . A rifa est&aacute; sendo vendida no valor de R$2,00 (Dois Reais), todo o dinheiro arrecadado ser&aacute; revertido em benef&iacute;cios para os estudantes do Curso de Ci&ecirc;ncia da Computa&ccedil;&atilde;o.</p>\n<p>Para adquirir a sua rifa procure um dos participantes do CA e demais estudantes vendedores.</p>','img/conteudo/rifas-carnaval/12370800_1001165256593084_517168623569067795_o.jpg','2016-01-29','2016-02-06 16:06:25',1,'rifas_carnaval0','Bloco Vermes  parceria com CA'),(59,2,6,'Politécnica Junior','<p>Diretores da empresa Junior POJU anunciam que as atividades &nbsp;e iniciaram no m&ecirc;s de mar&ccedil;o no dia 15/03/2016.</p>','img/conteudo/politcnica-junior/12241626_1220451754648207_2108081038886626827_n.jpg','2016-01-29','2016-02-06 16:04:44',0,'politcnica_junior0','POJU anuncia mês de inalburação'),(60,1,6,'Confraternização em Alfenas','<p>Alunos do curso de Ci&ecirc;ncia da Computa&ccedil;&atilde;o marcam presen&ccedil;a em estreia &nbsp;mundial do filme <strong><em>Star Wars</em></strong>.</p>','img/conteudo/confraternizao/12341303_10154117620884316_83856881155074089_n.jpg','2016-01-29','2016-01-29 16:12:52',0,'confraternizao_em_alfenas','Star Wars : estreia mundial'),(61,1,8,'Encontro de Grandes Mentes','<p>A Professora Aracele Fassbinder &nbsp;durante evento nos EUA realiza encontro junto a empreendedora&nbsp;Bel Pesce.</p>','img/conteudo/encontro-de-grandes-mentes/12509329_10208761686943584_27806021968507915_n.jpg','2016-01-29','2016-01-29 12:47:56',0,'encontro_de_grandes_mentes','Bel Pesce'),(62,2,1,'Mostra de Software','<p>A mostra de Software &nbsp; organizada &nbsp;pelas Professoras&nbsp;<strong>Sandra Helena Miranda&nbsp;</strong>e&nbsp;<strong>Aline Marques del Valle .</strong></p>\n<p>De acordo com as palavras de um dos participantes <em>O evento e uma oportunidade unica para que sejam avaliados &nbsp;como em uma empresa.</em></p>','img/conteudo/mostra-de-software/12469534_1637100896555201_5879680404289368741_o.jpg','2016-01-29','2016-01-29 13:09:32',0,'mostra_de_software0','Mostra de Software'),(63,2,8,'Doação de Sangue','<p>IFSULDEMINAS campus Muzambinho juntamente com o CA Alan Turing &nbsp;est&atilde;o organizando uma campanha interna de doa&ccedil;&atilde;o de sangue</p>','img/conteudo/doao-de-sangue/sangue.jpg','2016-01-29','2016-01-29 13:06:08',1,'doao_de_sangue','Doe você também'),(64,1,8,'Recepção dos Calouros','<p><span style=color: #ff00ff;><em><strong>Centro Acad&ecirc;mico Alan Turing &nbsp; realiza a recep&ccedil;&atilde;o dos calouros &nbsp;durante o p&eacute;riodo de matricula.</strong></em></span></p>','img/conteudo/recepo-dos-calouros/matricula2.jpg','2016-01-29','2016-01-29 13:12:36',0,'recepo_dos_calouros','Novos Alunos Sejam Bem Vindos'),(68,1,10,'Visita ao NTI','<p>O 6&ordm; per&iacute;odo do curso de Ci&ecirc;ncia da Computa&ccedil;&atilde;o realizou na &uacute;ltima &nbsp;quinta feira dia 28/01/2016 uma visita t&eacute;cnica ao Nucleo de T&eacute;cnilogia da Informa&ccedil;&atilde;o (NTI) &nbsp;do campus Muzambinho afim de conhecer a instraestrutura de Rede.</p>','img/conteudo/visita-ao-nti/nti.jpg','2016-01-29','2016-01-29 13:44:53',0,'visita_ao_nti','Matéria de redes com atividade prática'),(70,2,8,'SISU','<h1 style=text-align: center;><span style=color: #ff0000;><strong>Matricule-se j&aacute;</strong></span></h1>','img/conteudo/sisu/12439008_1085925794785376_1987727939773835066_n.png','2016-01-29','2016-01-29 13:50:03',0,'sisu','Fique Atento ');
/*!40000 ALTER TABLE `conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conteudo_sub_area`
--

DROP TABLE IF EXISTS `conteudo_sub_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conteudo_sub_area` (
  `conteudo_id` int(11) NOT NULL,
  `sub_area_id` int(11) NOT NULL,
  PRIMARY KEY (`conteudo_id`,`sub_area_id`),
  KEY `fk_sub_area_idx` (`sub_area_id`),
  CONSTRAINT `fk_conteudo` FOREIGN KEY (`conteudo_id`) REFERENCES `conteudo` (`con_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sub_area` FOREIGN KEY (`sub_area_id`) REFERENCES `sub_areas_conhecimento` (`sub_area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudo_sub_area`
--

LOCK TABLES `conteudo_sub_area` WRITE;
/*!40000 ALTER TABLE `conteudo_sub_area` DISABLE KEYS */;
INSERT INTO `conteudo_sub_area` VALUES (55,1),(56,1),(57,1),(59,1),(61,1),(62,1),(68,1),(70,1),(57,2),(59,2),(56,3),(57,3),(59,3),(61,3),(62,3),(68,3),(70,3),(57,5),(59,5),(55,7),(56,7),(57,7),(59,7),(61,7),(62,7),(68,7),(70,7),(55,8),(56,8),(57,8),(59,8),(61,8),(62,8),(68,8),(70,8),(57,9),(59,9),(57,10),(59,10),(57,11),(59,11),(57,12),(59,12),(57,13),(59,13),(57,14),(59,14),(57,15),(59,15),(57,16),(59,16),(57,17),(59,17),(57,18),(59,18),(57,19),(59,19),(57,20),(57,21),(57,22),(57,23),(57,24),(57,25),(59,26),(59,27),(59,28),(59,29);
/*!40000 ALTER TABLE `conteudo_sub_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financas`
--

DROP TABLE IF EXISTS `financas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financas` (
  `fin_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_usu_id` int(11) NOT NULL,
  `fin_descricao` varchar(255) NOT NULL,
  `fin_valor` double NOT NULL,
  `fin_tipo` varchar(45) NOT NULL,
  `fin_data` date NOT NULL,
  `fin_data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fin_imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fin_id`),
  KEY `fk_contas_usuarios1` (`usuarios_usu_id`),
  CONSTRAINT `fk_contas_usuarios1` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financas`
--

LOCK TABLES `financas` WRITE;
/*!40000 ALTER TABLE `financas` DISABLE KEYS */;
INSERT INTO `financas` VALUES (3,1,'Pagamento Coringa',600,'Pagamento','2016-01-14','2016-01-29 14:41:27','img/financas/Captura_de_tela_de_2015-06-29_13'),(4,6,'Teste',50,'teste','2016-01-01','2016-01-29 16:16:54','img/financas/zelda_wallpaper_by_nightbloodste');
/*!40000 ALTER TABLE `financas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionalidade`
--

DROP TABLE IF EXISTS `funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `icone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade`
--

LOCK TABLES `funcionalidade` WRITE;
/*!40000 ALTER TABLE `funcionalidade` DISABLE KEYS */;
INSERT INTO `funcionalidade` VALUES (1,'Usuário','usuarios','fa fa-user'),(2,'Conteúdo','conteudo','fa fa-file-text'),(3,'Calendário','calendario','fa fa-calendar'),(4,'Finanças','financas','fa fa-university'),(5,'Categorias','categorias','fa fa-list'),(6,'Repositório','repositorios','fa fa-database'),(7,'Orientadores','orientadores','fa fa-graduation-cap');
/*!40000 ALTER TABLE `funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gru_func`
--

DROP TABLE IF EXISTS `gru_func`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gru_func` (
  `grupos_gru_id` int(11) NOT NULL,
  `funcionalidade_id` int(11) NOT NULL,
  PRIMARY KEY (`grupos_gru_id`,`funcionalidade_id`),
  KEY `fk_gru_func_funcionalidade1` (`funcionalidade_id`),
  CONSTRAINT `fk_gru_func_funcionalidade1` FOREIGN KEY (`funcionalidade_id`) REFERENCES `funcionalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gru_func_grupos1` FOREIGN KEY (`grupos_gru_id`) REFERENCES `grupos` (`gru_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gru_func`
--

LOCK TABLES `gru_func` WRITE;
/*!40000 ALTER TABLE `gru_func` DISABLE KEYS */;
INSERT INTO `gru_func` VALUES (1,1),(1,2),(1,3),(2,3),(3,3),(1,4),(2,4),(3,4),(1,5),(1,6),(1,7);
/*!40000 ALTER TABLE `gru_func` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `gru_id` int(11) NOT NULL AUTO_INCREMENT,
  `gru_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`gru_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'Administradores'),(2,'Alunos'),(3,'TI');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links_uteis`
--

DROP TABLE IF EXISTS `links_uteis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links_uteis` (
  `lin_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_usu_id` int(11) NOT NULL,
  `lin_nome` varchar(100) NOT NULL,
  `lin_link` varchar(100) NOT NULL,
  `lin_descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`lin_id`),
  KEY `fk_links_uteis_usuarios1` (`usuarios_usu_id`),
  CONSTRAINT `fk_links_uteis_usuarios1` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links_uteis`
--

LOCK TABLES `links_uteis` WRITE;
/*!40000 ALTER TABLE `links_uteis` DISABLE KEYS */;
/*!40000 ALTER TABLE `links_uteis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_sessions`
--

DROP TABLE IF EXISTS `log_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(16) DEFAULT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `user_data` text NOT NULL,
  `log_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1269 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_sessions`
--

LOCK TABLES `log_sessions` WRITE;
/*!40000 ALTER TABLE `log_sessions` DISABLE KEYS */;
INSERT INTO `log_sessions` VALUES (1,'::3a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','13/02/2015','2016-02-01 13:08:59'),(2,'::a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','foda-se foda-se foda-se','2016-02-02 12:25:26'),(3,'::a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','foda-se foda-se foda-se','2016-02-02 12:56:00'),(4,'::a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','foda-se foda-se foda-se','2016-02-03 12:56:00'),(5,'::a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','foda-se foda-se foda-se','2016-02-04 12:56:00'),(6,'::a','Boo/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','foda-se foda-se foda-se','2016-02-04 12:56:00'),(7,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-03 16:35:07'),(8,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-03 16:38:21'),(9,'192.168.1.130','Mozilla/5.0 (Windows NT 5.1; rv:43.0) Gecko/20100101 Firefox/43.0','','2016-02-04 01:19:58'),(10,'127.0.0.1','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0;)','','2016-02-05 23:06:31'),(11,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:06:31'),(12,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:06:31'),(13,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:06:32'),(14,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:06:32'),(1245,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:08:38'),(1246,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:08:38'),(1247,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:08:38'),(1248,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:08:38'),(1249,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','','2016-02-05 23:08:39'),(1250,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-05 23:11:22'),(1251,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-05 23:32:47'),(1252,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-06 00:24:20'),(1253,'192.168.1.188','Mozilla/5.0 (Linux; Android 5.0; ASUS_T00J Build/LRX21V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobi','','2016-02-06 00:48:04'),(1254,'192.168.1.188','Mozilla/5.0 (Linux; Android 5.0; ASUS_T00J Build/LRX21V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobi','','2016-02-06 00:52:17'),(1255,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-06 01:10:59'),(1256,'192.168.1.188','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Safari/537.36','','2016-02-06 02:03:35'),(1257,'192.168.1.188','Mozilla/5.0 (Linux; Android 5.0; ASUS_T00J Build/LRX21V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobi','','2016-02-06 02:05:20'),(1258,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-06 12:05:03'),(1259,'192.168.1.188','Mozilla/5.0 (Linux; Android 5.0; ASUS_T00J Build/LRX21V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobi','','2016-02-06 13:38:06'),(1260,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-06 23:17:33'),(1261,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 03:21:43'),(1262,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 03:40:55'),(1263,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 03:44:59'),(1264,'::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36','','2016-02-07 16:02:18'),(1265,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 16:17:30'),(1266,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 16:24:09'),(1267,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 16:53:29'),(1268,'192.168.1.151','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36','','2016-02-07 16:54:07');
/*!40000 ALTER TABLE `log_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orientadores`
--

DROP TABLE IF EXISTS `orientadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orientadores` (
  `ori_id` int(11) NOT NULL AUTO_INCREMENT,
  `ori_nome` varchar(100) NOT NULL,
  `ori_email` varchar(100) NOT NULL,
  `ori_tipo` tinyint(2) NOT NULL,
  PRIMARY KEY (`ori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orientadores`
--

LOCK TABLES `orientadores` WRITE;
/*!40000 ALTER TABLE `orientadores` DISABLE KEYS */;
INSERT INTO `orientadores` VALUES (1,'Aline Del Valle','alinevalle@example.com',0),(6,'Adolfo Carvalho','adolfo@example.com',0);
/*!40000 ALTER TABLE `orientadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repositorio_areas`
--

DROP TABLE IF EXISTS `repositorio_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repositorio_areas` (
  `repositorios_rep_id` int(11) NOT NULL,
  `areas_conhecimento_are_id` int(11) NOT NULL,
  PRIMARY KEY (`repositorios_rep_id`,`areas_conhecimento_are_id`),
  KEY `fk_reposotorio_areas_areas_conhecimento1` (`areas_conhecimento_are_id`),
  CONSTRAINT `fk_reposotorio_areas_areas_conhecimento1` FOREIGN KEY (`areas_conhecimento_are_id`) REFERENCES `sub_areas_conhecimento` (`sub_area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reposotorio_areas_repositorios1` FOREIGN KEY (`repositorios_rep_id`) REFERENCES `repositorios` (`rep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repositorio_areas`
--

LOCK TABLES `repositorio_areas` WRITE;
/*!40000 ALTER TABLE `repositorio_areas` DISABLE KEYS */;
INSERT INTO `repositorio_areas` VALUES (2,1),(4,1),(5,1),(1,3),(2,3),(4,3),(5,3),(1,7),(2,7),(4,7),(5,7),(1,8),(2,8),(4,8),(5,8),(6,9),(5,26),(5,27),(5,28),(5,29);
/*!40000 ALTER TABLE `repositorio_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repositorios`
--

DROP TABLE IF EXISTS `repositorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repositorios` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_usu_id` int(11) NOT NULL,
  `orientadores_ori_id` int(11) NOT NULL,
  `rep_nome` varchar(100) NOT NULL,
  `rep_descricao` text,
  `rep_autor` varchar(100) NOT NULL,
  `rep_autor_email` varchar(100) NOT NULL,
  `rep_monografia` varchar(100) DEFAULT NULL,
  `rep_video` varchar(100) DEFAULT NULL,
  `rep_codigo_fonte` varchar(100) DEFAULT NULL,
  `rep_data` date DEFAULT NULL,
  `rep_link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rep_id`),
  UNIQUE KEY `rep_link_UNIQUE` (`rep_link`),
  KEY `fk_repositorios_usuarios1` (`usuarios_usu_id`),
  KEY `fk_repositorios_orientadores1` (`orientadores_ori_id`),
  CONSTRAINT `fk_repositorios_orientadores1` FOREIGN KEY (`orientadores_ori_id`) REFERENCES `orientadores` (`ori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_repositorios_usuarios1` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repositorios`
--

LOCK TABLES `repositorios` WRITE;
/*!40000 ALTER TABLE `repositorios` DISABLE KEYS */;
INSERT INTO `repositorios` VALUES (1,1,1,'Cluster de alta disponibilidade','Cluster de alta disponibilidade','Danilo Fugi','danilo@example.com','img/repositorio/cluster-de-alta-disponibilidade/monografia/TabeladeAreasdoConhecimento.pdf','img/repositorio/cluster-de-alta-disponibilidade/video/10972191_753454494762261_412510623_n.mp4','img/repositorio/cluster-de-alta-disponibilidade/codigo/bootstrap-switch-master.zip','0000-00-00','cluster_de_alta_disponibilidade0'),(2,6,1,'Servidor Debian','DHCP, DNS, Proxy, Firewall e relatórios.','Ronieri','ronieri@example.com','img/repositorio/servidor-debian/monografia/Folha_de_Ponto.pdf',NULL,NULL,'0000-00-00','servidor_debian'),(4,6,1,'TCC X','teste descrição','Aracele','aracele@gmail.com','img/repositorio/tcc-x/monografia/A_Revolução_dos_Bichos.pdf',NULL,NULL,'0000-00-00','tcc_x'),(5,9,6,'Futebol de robôs','Curabitur varius lectus odio, eleifend dapibus mi ultrices non. Integer lacinia eros in fermentum aliquam. Nunc fermentum a magna ac faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam feugiat aliquam nulla, eu accumsan augue convallis sit amet. In laoreet feugiat nisl. Donec vitae libero ultricies, elementum nunc maximus, commodo orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut nec turpis condimentum, cursus massa ut, vulputate risus.\n\nVivamus ut ultricies dolor. Sed sit amet est vel nulla aliquet luctus a a tellus. Sed tempus volutpat cursus. Nunc facilisis nisi nec pretium bibendum. Vestibulum viverra gravida orci eu pretium. Duis vel urna ut turpis eleifend varius. Donec blandit mauris id tellus bibendum rutrum. Proin cursus augue nec quam porta, ut faucibus ex ultrices. Vivamus laoreet convallis lorem ut iaculis. Maecenas a mi justo. Amém!','Leonardo','leo@ifsuldeminas.edu.br','img/repositorio/futebol-de-robs/monografia/Folha_de_Ponto.pdf',NULL,NULL,'0000-00-00','futebol_de_robs0'),(6,6,1,'Lorem ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor risus ac nisl placerat, et rhoncus massa tristique. Curabitur accumsan lorem at gravida lacinia. Fusce sit amet nisi ligula. Sed consectetur nunc quis diam cursus, ut gravida nisi dignissim. Maecenas pretium elementum finibus. Mauris iaculis lectus eget tempor dapibus. Morbi suscipit nulla quis condimentum malesuada. Morbi elementum justo vitae est lacinia porttitor. Curabitur ut placerat ligula. In dapibus gravida bibendum. Aliquam condimentum leo in tristique ornare.\n\nDonec maximus risus et suscipit egestas. Donec congue velit et sapien facilisis tincidunt. Morbi eu orci magna. In pellentesque semper interdum. Donec commodo lorem fringilla massa ultrices, non dignissim ex imperdiet. Suspendisse lacinia tortor vitae nulla aliquet, sed tempus urna rhoncus. Integer eu augue a mi vestibulum lobortis in a augue. In vel lacus vel eros dictum malesuada commodo vitae massa. Curabitur viverra enim quis odio pellentesque tempus.\n\nSed lacinia tincidunt metus. Nulla facilisi. In fringilla erat sed ante sollicitudin, ac dictum urna fermentum. Sed consectetur sed diam et feugiat. Maecenas nec sem sed dolor aliquet tincidunt eu ac dolor. Vivamus ut mattis elit. Nullam mollis vulputate tempus. Aenean at congue arcu, vel laoreet tellus. Ut mollis feugiat odio eget tincidunt. Curabitur id lectus vel purus accumsan rhoncus quis et risus. Proin id orci vel diam dapibus dapibus quis nec sapien. Vivamus ante urna, suscipit ac quam at, elementum vehicula ex. Proin iaculis ultricies erat sit amet volutpat. Nam aliquet id odio sed rhoncus. Pellentesque tincidunt massa justo, a lacinia lorem finibus sed.','ronieri','ronieri@example.com','img/repositorio/teste/monografia/Artigo_GESEP.pdf','img/repositorio/teste/video/10972191_753454494762261_412510623_n.mp4','img/repositorio/teste/codigo/bootstrap-switch-master.zip','0000-00-00','teste');
/*!40000 ALTER TABLE `repositorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_areas_conhecimento`
--

DROP TABLE IF EXISTS `sub_areas_conhecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_areas_conhecimento` (
  `sub_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `areas_conhecimento_are_id` int(11) NOT NULL,
  `sub_area_titulo` varchar(100) NOT NULL,
  `sub_area_numero` int(20) DEFAULT NULL,
  PRIMARY KEY (`sub_area_id`),
  KEY `fk_sub_areas_conhecimento_idx` (`areas_conhecimento_are_id`),
  CONSTRAINT `sub_areas_conhecimento` FOREIGN KEY (`areas_conhecimento_are_id`) REFERENCES `areas_conhecimento` (`are_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_areas_conhecimento`
--

LOCK TABLES `sub_areas_conhecimento` WRITE;
/*!40000 ALTER TABLE `sub_areas_conhecimento` DISABLE KEYS */;
INSERT INTO `sub_areas_conhecimento` VALUES (1,1,'Matemática da Computação',10302000),(2,2,'Ecologia',20500009),(3,1,'Teoria da Computação',10301003),(5,2,'Genética',20200005),(7,1,'Metodologia e Técnicas da Computação',10300006),(8,1,'Sistemas de Computação',10304002),(9,2,'Biologia Geral',20100000),(10,2,'Botânica',20300000),(11,2,'Zoologia',20400004),(12,2,'Morfologia',20600003),(13,2,'Fisiologia',20700008),(14,2,'Bioquímica',20800002),(15,2,'Biofísica',20900007),(16,2,'Farmacologia',21000000),(17,2,'Imunologia',21100004),(18,2,'Microbiologia',21200009),(19,2,'Parasitologia',21300003),(20,4,'Ciência do Solo',50101005),(21,4,'Fitossanidade',50102001),(22,4,'Fitotecnia',50103008),(23,4,'Floricultura, Parques e Jardins',50104004),(24,4,'Agrometeorologia',50105000),(25,4,'Extensão Rural',50106007),(26,3,'Álgebra',10101004),(27,3,'Análise',10102000),(28,3,'Geometria e Topologia',10103007),(29,3,'Matemática Aplicada',10104003);
/*!40000 ALTER TABLE `sub_areas_conhecimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_conteudo`
--

DROP TABLE IF EXISTS `tipo_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_conteudo` (
  `tp_con_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_con_titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`tp_con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_conteudo`
--

LOCK TABLES `tipo_conteudo` WRITE;
/*!40000 ALTER TABLE `tipo_conteudo` DISABLE KEYS */;
INSERT INTO `tipo_conteudo` VALUES (1,'Notícias'),(2,'Eventos');
/*!40000 ALTER TABLE `tipo_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_gru_id` int(11) NOT NULL,
  `usu_nome` varchar(100) DEFAULT NULL,
  `usu_telefone` varchar(45) DEFAULT NULL,
  `usu_matricula` varchar(12) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `usu_senha` varchar(255) DEFAULT NULL,
  `usu_status` tinyint(4) DEFAULT NULL,
  `usu_data_nascimento` varchar(10) DEFAULT NULL,
  `usu_sexo` tinyint(4) DEFAULT NULL,
  `usu_data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usu_id`),
  KEY `fk_usuarios_grupos1` (`grupos_gru_id`),
  CONSTRAINT `fk_usuarios_grupos1` FOREIGN KEY (`grupos_gru_id`) REFERENCES `grupos` (`gru_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'Icaro Brito de Carvalho Messias','','12131003777','icaro@example.com','443e41d6c89eddc57b47e7f1630b43cf',1,'14/06/1991',1,'2015-11-20 09:43:20'),(3,1,'Fabi','','12121212','fabi@example.com','4667585b9b808bb425b95fbd7d535da0',1,'29/11/1994',1,'2015-11-20 10:35:52'),(5,3,'Joao','(35)9888-7456','369852147','joao@example.com','dccd96c256bc7dd39bae41a405f25e43',1,'10/10/1989',0,'2015-11-20 11:22:03'),(6,1,'Ronieri Sales','(35)9913-3757','12131001608','ronieri.sales@live.com','6e20c82a4468f2a432980715761f399d',1,'28/02/1990',0,'2015-11-19 15:10:33'),(8,1,'Erlon Junior','','24242424','erlon@hotmail.com','*F90B6576111DD063A65BC2CA6BADED74C2E4FAEE',1,'24/09/1994',0,'2016-01-29 12:07:10'),(9,1,'Luís Ovídio Viana Podestá','','12122000525','luis-ovidio@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,'12/12/1990',0,'2016-01-29 13:39:54'),(10,1,'Lucas Trindade','','12112000369','lucasdatrindade@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,'12/12/1990',0,'2016-01-29 13:40:55'),(11,2,'Aluno','3535711234','123123123','aluno@example.com','f5bb0c8de146c67b44babbf4e6584cc0',1,'12/12/1990',0,'2016-01-29 14:30:13');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'centro_academico'
--
/*!50003 DROP PROCEDURE IF EXISTS `controle_acesso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `controle_acesso`(
out data_dia date,
out numero_acessos int)
begin
select date(log_date) as data_dia, 
count(*) as numero_acessos
from log_sessions
group by ip_address, date(log_date);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-07 16:35:06
