CREATE DATABASE  IF NOT EXISTS `centro_academico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `centro_academico`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: centro_academico
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb8u1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('514366e3c68b0b63b477de98f87e0c25','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',1453413954,'a:5:{s:4:\"nome\";s:13:\"Ronieri Sales\";s:10:\"usuario_id\";s:1:\"6\";s:6:\"grupos\";s:1:\"1\";s:5:\"email\";s:22:\"ronieri.sales@live.com\";s:14:\"funcionalidade\";a:2:{i:0;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"1\";s:4:\"nome\";s:8:\"Usuário\";s:3:\"url\";s:8:\"usuarios\";s:5:\"icone\";s:10:\"fa fa-user\";}i:1;O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:9:\"Conteúdo\";s:3:\"url\";s:8:\"conteudo\";s:5:\"icone\";s:15:\"fa fa-file-text\";}}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

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
  KEY `fk_noticias_tipo_noticias1` (`tipo_conteudo_tp_con_id`),
  KEY `fk_noticias_usuarios1` (`usuarios_usu_id`),
  CONSTRAINT `fk_tipo_conteudo` FOREIGN KEY (`tipo_conteudo_tp_con_id`) REFERENCES `tipo_conteudo` (`tp_con_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudo`
--

LOCK TABLES `conteudo` WRITE;
/*!40000 ALTER TABLE `conteudo` DISABLE KEYS */;
INSERT INTO `conteudo` VALUES (1,2,6,'Lorem ipsum','<h3><a title=\"Lorem ipsum\" href=\"teste.com\">Lorem ipsum</a> dolor sit amet, nemore nominavi hendrerit ea usu, nonumy prompta accommodare at has. Facer placerat at mea, te vis explicari consequat cotidieque. Tempor hendrerit elaboraret nec in. Case possit utamur nam no, ut pro suas partem nusquam. Posse reprimique at pro, pro causae fuisset repudiare ne.</h3>\n<p><span style=\"color: #000080;\">Mea eu quas reprehendunt, per eros scaevola explicari an, qui ut dicam atomorum. Ius ut elit ponderum, in quo dicta fastidii salutandi. Quo oratio soleat ullamcorper ut, nominavi evertitur at per. Cu vidit melius comprehensam est, eam ad munere soluta. Cetero neglegentur eam ad, ex iriure scripta indoctum qui, an quot omnesque eum. Nec in facilis facilisi, id est iriure detraxit hendrerit.</span></p>\n<ol>\n<li>No periculis inciderint vis. Ad vocibus fierent qui, ridens postea vel te. Eu pro omnes discere scribentur, vis ancillae pertinax erroribus in. Vide malorum te ius. Convenire consequat eu pro. His id quidam euismod invenire.</li>\n<li>Omnium feugiat ex vim, quo ne velit quaeque veritus. Cu liber vocibus consetetur cum, at his eros solum consequuntur. Ludus legendos ad cum, est nusquam scripserit et. In rebum equidem partiendo mea, dicta aliquam vim at. Ea duo utroque admodum aliquando. Usu eu mazim decore, ex purto docendi usu.</li>\n<li>Eu tollit repudiare usu. Usu decore aliquid laoreet ne, iudico urbanitas no vix, partem denique necessitatibus sed cu. Pri natum senserit ex, an vix justo fierent. Summo eligendi ea nec, dicit inermis cu pro. Intellegat scribentur no duo, no eum posse constituto. Ipsum civibus forensibus ex mei, facilis voluptua interesset his et. Id duo euismod dolorum.</li>\n</ol>','img/Conteudo/teste.png','2015-12-28','2016-01-08 00:28:04',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(2,1,6,'TintMCE','<p style=\"text-align: center; font-size: 15px;\"><img title=\"TinyMCE Logo\" src=\"//www.tinymce.com/images/glyph-tinymce@2x.png\" alt=\"TinyMCE Logo\" width=\"110\" height=\"97\" /></p>\n<h1 style=\"text-align: center;\">Welcome to the TinyMCE editor demo!</h1>\n<p>Please try out the features provided in this full featured example.</p>\n<p>Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering &ndash; the demo is to show the integration.</p>\n<h2>Got questions or need help?</h2>\n<ul>\n<li>Our <a href=\"//www.tinymce.com/docs/\">documentation</a> is a great resource for learning how to configure TinyMCE.</li>\n<li>Have a specific question? Visit the <a href=\"http://community.tinymce.com/forum/\">Community Forum</a>.</li>\n<li>We also offer enterprise grade support as part of <a href=\"http://tinymce.com/pricing\">TinyMCE Enterprise</a>.</li>\n</ul>\n<p>If you think you have found a bug please create an issue on the <a href=\"https://github.com/tinymce/tinymce/issues\">GitHub repo</a> to report it to the developers.</p>\n<h2>Finally ...</h2>\n<p>Don\'t forget to check out our other product <a href=\"http://www.plupload.com\" target=\"_blank\">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>\n<p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br />All the best from the TinyMCE team.</p>','img/Conteudo/fundo.jpg','2015-12-28','2016-01-08 00:27:20',1,'tinymce','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(6,2,7,'Bacon ipsum','<p>Bacon ipsum dolor amet cow porchetta et mollit ut. Aute mollit meatloaf salami, reprehenderit doner sed shankle culpa aliqua. Shank leberkas laboris fatback sirloin. Enim deserunt cupim velit doner ullamco aute kielbasa pork incididunt tail reprehenderit in salami irure.</p>\n<p>Excepteur beef ribs ipsum, tempor ground round exercitation ham hock sunt. Venison ex tempor beef ribs in dolore kevin strip steak laboris irure sint ad minim beef do. Fugiat laboris ex, veniam et tail consectetur voluptate sed qui turkey duis. Capicola mollit meatball, landjaeger est quis ut alcatra doner duis non proident pancetta jowl. Cow incididunt alcatra reprehenderit id officia in jerky voluptate. Pariatur ut mollit, cillum magna shank ham hock et dolore voluptate beef. Biltong commodo bresaola pork est, frankfurter filet mignon ground round dolor shoulder esse.</p>\n<p>Nostrud anim aliqua porchetta deserunt short loin tri-tip dolore, shoulder sunt sirloin ipsum cupidatat tail. Ut aliquip laboris, beef ribs pork belly sirloin anim shank dolore cupidatat do. Brisket bacon do in ground round irure t-bone pig drumstick pork loin. Qui venison nisi aliquip occaecat. Reprehenderit salami picanha, beef exercitation proident voluptate short ribs deserunt consequat.</p>\n<p>Turkey t-bone aliquip nisi doner do hamburger eu ground round andouille prosciutto aliqua bresaola. Voluptate aliquip beef ribs, turducken alcatra short ribs elit ground round. Tongue aute cupim pork belly. Meatball pastrami aliquip laborum laboris cillum. Enim incididunt velit, nostrud pig aute pork loin chicken reprehenderit biltong spare ribs dolore sed.</p>\n<p>Lorem chuck ex in in fugiat pig leberkas occaecat consectetur. Incididunt kielbasa ea tongue, rump anim sunt alcatra in pork loin ribeye. Short loin turducken enim shankle, aliquip minim shank ham hock t-bone ut dolore. Sausage nostrud chuck est hamburger bacon pork belly beef ribs strip steak. Beef exercitation dolore frankfurter tail mollit commodo alcatra sunt flank. Beef ribs turducken veniam ullamco ball tip, drumstick spare ribs excepteur cupidatat id ut officia tongue.</p>','img/Conteudo/fundo1.jpg','2015-12-29','2016-01-05 11:43:56',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(8,2,6,'PHP code','<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://upload.wikimedia.org/wikipedia/commons/c/c1/PHP_Logo.png\" alt=\"PHP\" width=\"722\" height=\"350\" /></p>\n<pre class=\"language-php\"><code>public function update_question() {\n        $comment = $this-&gt;input-&gt;post(\'comment\');\n        $answer = $this-&gt;input-&gt;post(\'answer\');\n\n        echo var_dump(is_dir(base_url().\'uploads/\'));\n\n        /*\n         * Uploading image\n         */\n        $config[\'upload_path\'] = base_url().\'/uploads/\';\n        $config[\'allowed_types\'] = \'gif|jpg|png\';\n        $config[\'max_width\'] = 0;\n        $config[\'max_height\'] = 0;\n        $config[\'max_size\'] = 0;\n        $config[\'encrypt_name\'] = TRUE;\n\n        $this-&gt;load-&gt;library(\'upload\', $config);\n        if ( ! $this-&gt;upload-&gt;do_upload())\n        {\n                $error = array(\'error\' =&gt; $this-&gt;upload-&gt;display_errors());\n                print_r($error);\n        }\n        else\n        {\n                $arr_image = array(\'upload_data\' =&gt; $this-&gt;upload-&gt;data());\n                print_r($arr_image);\n        }\n\n        $questionid = $this-&gt;input-&gt;post(\'questionid\');\n        $question_data = array(\n            \'comment\'   =&gt; $comment,\n            \'answer\'    =&gt; $answer\n        );\n        $this-&gt;load-&gt;model(\'adminmodel\', \'admin\');\n        $question_data = $this-&gt;admin-&gt;update_question_data($questionid, $question_data);\n        //redirect(\'admin/questions\', \'location\');\n}</code></pre>','img/Conteudo/php.png','2015-12-30','2016-01-05 12:01:17',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(9,2,7,'Brisket pancetta alcatra','<p>Brisket pancetta alcatra, jerky t-bone frankfurter tail. Capicola chuck short ribs pork belly, swine tongue boudin. Shoulder prosciutto salami frankfurter tri-tip tenderloin. Jerky short ribs flank, t-bone filet mignon picanha ball tip landjaeger capicola alcatra shank leberkas turkey strip steak hamburger. Spare ribs alcatra ground round boudin turducken doner, kevin short ribs. Bresaola ham hock alcatra leberkas corned beef.</p>\n<p>Bacon ipsum dolor amet leberkas flank jowl, shank turkey landjaeger ham kielbasa sirloin bresaola. T-bone kevin beef shankle, kielbasa pancetta jerky tail flank pastrami short loin strip steak frankfurter ham. Pastrami swine ribeye, bresaola doner strip steak flank kevin picanha porchetta tail short ribs pork belly leberkas. Kevin pastrami pork chop flank.</p>\n<p>Salami chuck sausage venison, landjaeger kielbasa ham brisket pork loin ham hock. Biltong strip steak frankfurter, capicola bresaola shankle tri-tip ball tip beef ribs pork loin turkey cow t-bone salami. Shankle bacon filet mignon kielbasa. Frankfurter salami tail pig jerky. Leberkas biltong ham, frankfurter alcatra short ribs sirloin strip steak swine chicken rump tail. Drumstick turducken cupim shankle fatback, chicken flank turkey filet mignon pancetta brisket.</p>\n<p>Short loin boudin porchetta spare ribs meatball beef ribs hamburger capicola kielbasa landjaeger ham hock strip steak. Turducken salami sirloin tri-tip, beef ribs shank porchetta alcatra strip steak andouille beef. Ham cupim pancetta ribeye tri-tip leberkas. Turducken tail tongue filet mignon. Chicken leberkas ball tip turkey. Brisket picanha tri-tip, drumstick spare ribs ground round capicola salami. Pork chop ribeye filet mignon meatloaf turkey, landjaeger chicken tongue boudin.</p>\n<p>Cow kielbasa filet mignon swine pork chop bresaola landjaeger andouille fatback short ribs ribeye. Leberkas ball tip kielbasa flank, pancetta frankfurter fatback. Tongue brisket picanha pork chop, pork beef ribs beef turducken cow meatball. Swine flank jowl pastrami ribeye beef ribs corned beef sausage frankfurter short ribs. Jerky kielbasa chicken tail shankle pork loin. Short loin tri-tip chuck ball tip filet mignon bacon pork chop shankle andouille.</p>\n<p>Cow turducken picanha tongue, meatloaf chicken short loin pork loin shank flank prosciutto swine filet mignon. Rump porchetta prosciutto tongue kevin salami. Chicken kevin tail, pork cow prosciutto rump shank turducken bresaola meatball brisket doner jerky short loin. Venison kevin shoulder rump porchetta shankle capicola spare ribs pastrami sirloin cupim sausage.</p>\n<p>Fatback turkey hamburger doner venison filet mignon, shoulder ham hock drumstick tail pastrami jowl strip steak. Pork loin leberkas tongue t-bone. Ball tip chuck filet mignon, prosciutto pancetta porchetta pork loin shank chicken alcatra bresaola tail jowl drumstick short ribs. Cupim ball tip rump, flank capicola chicken bresaola venison sirloin pork fatback.</p>\n<p>Andouille turkey cow short loin, ribeye sausage filet mignon bresaola bacon ham hock brisket. Venison short ribs prosciutto corned beef chuck. Meatball kevin chuck tri-tip, kielbasa turducken andouille brisket rump prosciutto. Salami rump porchetta, picanha filet mignon hamburger fatback doner beef ribs. Flank bresaola ground round swine, alcatra ball tip pig beef ribs capicola ham corned beef bacon biltong. Jowl sausage prosciutto corned beef pork belly bacon.</p>\n<p>Leberkas bresaola filet mignon pig. Leberkas pork chop beef kevin shank chicken. Beef capicola shoulder swine doner biltong drumstick jowl rump ham. Hamburger turkey meatloaf salami drumstick ham tenderloin fatback biltong sausage. Ribeye salami landjaeger shoulder flank alcatra shank doner cow cupim pancetta brisket strip steak tail.</p>\n<p>Sirloin meatloaf beef ribs turkey ham hock. Spare ribs pork chop capicola, beef cupim ham hock ribeye rump kevin jerky venison short ribs filet mignon sausage fatback. Leberkas corned beef flank kielbasa meatball, chicken ground round pork chop beef ribs hamburger venison. Shank bacon frankfurter doner kevin sausage turducken landjaeger salami. Pork loin tri-tip ball tip, shoulder capicola turkey ham boudin chuck ribeye ham hock meatball pig. Meatloaf turkey andouille jerky. Pig pancetta ham, frankfurter filet mignon hamburger pork short ribs cow corned beef.</p>\n<p>Beef chicken bresaola boudin. Shank pastrami short loin pork loin, alcatra hamburger brisket tongue. Cow shank rump kielbasa ground round venison meatloaf fatback beef. Kevin meatball prosciutto filet mignon corned beef pork loin shankle bacon pork beef ribs leberkas jerky. Filet mignon flank venison alcatra tail landjaeger ground round salami meatball sirloin prosciutto cow ribeye corned beef ball tip.</p>\n<p>Pork belly prosciutto turkey alcatra meatball kielbasa tri-tip spare ribs biltong shoulder rump beef ribs tail picanha bresaola. Cow shoulder biltong ground round boudin pork loin. Shank ground round cow boudin pork swine, alcatra meatloaf hamburger ham hock capicola cupim venison meatball. Tail flank turducken tri-tip.</p>\n<p>Porchetta biltong jowl, bacon tri-tip pork loin shoulder. Tri-tip alcatra jowl venison. Corned beef pork tenderloin, ham hock t-bone biltong cow venison doner. Shank frankfurter porchetta, cupim tail alcatra tenderloin picanha ribeye hamburger beef ribs.</p>\n<p>Shoulder pork belly landjaeger spare ribs venison strip steak shankle cupim leberkas rump kielbasa pancetta beef ribs meatloaf. Jerky tail ball tip flank beef shoulder bresaola fatback hamburger. Tenderloin t-bone rump frankfurter pork pastrami. Pastrami pig venison beef ribs. Capicola ham pork chop sausage. Alcatra strip steak pork belly beef ribs t-bone pork, shoulder prosciutto. Pork belly pastrami porchetta meatloaf kielbasa tail prosciutto ball tip short ribs shankle tenderloin.</p>\n<p>Kielbasa cupim tail spare ribs beef, flank short ribs pig jerky chicken ham pastrami ribeye shankle landjaeger. Ball tip leberkas pork chop sirloin prosciutto. Fatback kielbasa short ribs biltong beef ribs. Bresaola jowl brisket turkey ground round ball tip. Ham hock capicola andouille sirloin meatloaf flank biltong corned beef. Andouille short loin shoulder spare ribs brisket, tail bacon meatloaf bresaola shank leberkas doner.</p>\n<p>Shoulder pork chop shankle, frankfurter pork bacon leberkas shank cupim andouille beef picanha spare ribs. Doner ham hock alcatra, pancetta pork belly ham rump ground round shank pork chop jerky beef salami. Flank cow frankfurter corned beef pork loin. Corned beef leberkas doner kevin.</p>\n<p>Kevin swine ham hock, shoulder pork t-bone andouille filet mignon jowl chuck pig fatback spare ribs tri-tip bresaola. T-bone pork loin corned beef, ham hock rump capicola tongue drumstick. Tongue beef ribs beef pork loin porchetta turkey t-bone leberkas tail salami cow strip steak swine tri-tip. Pancetta pig strip steak, shankle swine meatloaf salami venison. Jowl leberkas rump capicola.</p>\n<p>Pork loin pancetta porchetta sirloin, spare ribs filet mignon strip steak meatball leberkas. Fatback turkey ground round short loin, beef kevin bresaola spare ribs flank rump. Pork loin sirloin meatloaf bacon beef ribs pig filet mignon bresaola salami prosciutto. Kevin strip steak bacon short ribs tongue, ground round filet mignon meatloaf.</p>\n<p>Chicken swine spare ribs, shankle sausage boudin leberkas tri-tip jerky ham salami. Drumstick flank doner, ribeye turducken ball tip tenderloin. Pastrami boudin shank jowl bacon turkey strip steak spare ribs, t-bone turducken prosciutto fatback shankle. Biltong pancetta turkey chicken ham t-bone.</p>\n<p>Corned beef hamburger kevin short ribs. Ball tip leberkas chuck tail, beef ribs rump fatback jowl short loin meatloaf tongue shankle. Biltong kevin drumstick leberkas pork belly cupim. Frankfurter brisket picanha, tenderloin shank tongue pig porchetta flank short loin kielbasa rump.</p>\n<p>That\'s all, folks!</p>','img/Conteudo/openlogo-751.png','2015-12-30','2016-01-06 13:02:22',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(13,1,6,'Short loin ribeye kielbasa ground round','<p>Bacon ipsum dolor amet bresaola pork belly alcatra kevin brisket sausage strip steak shankle corned beef t-bone boudin tri-tip salami. Pastrami salami hamburger pig strip steak sausage sirloin. Ribeye jowl shoulder filet mignon, pig swine boudin pork turkey rump andouille venison ham hock. Picanha rump sirloin prosciutto, meatloaf pork kevin. Boudin porchetta pork loin ham alcatra.</p>\n<p>Short loin ribeye kielbasa ground round, tail pastrami capicola tri-tip ball tip jowl alcatra jerky venison. Jowl short ribs filet mignon shankle. Porchetta beef ribs ham ham hock cupim spare ribs. Flank cupim capicola chicken tail cow beef porchetta tenderloin bresaola boudin swine beef ribs. Pancetta venison chicken picanha, sausage chuck short ribs capicola tri-tip shank shoulder spare ribs drumstick prosciutto.</p>\n<p>Cow porchetta short ribs biltong meatloaf beef landjaeger prosciutto turducken strip steak flank ham hock tenderloin brisket. Kielbasa ball tip boudin spare ribs. Ribeye short ribs ground round cupim alcatra, kielbasa hamburger sirloin strip steak ball tip chuck capicola pork belly porchetta pastrami. Swine ribeye pancetta pork loin turkey. Boudin picanha filet mignon, alcatra pork loin pork belly salami turducken kevin jerky cow shankle sirloin chicken. Tri-tip landjaeger boudin turkey hamburger pork chop.</p>\n<p>Chuck pig pork chop fatback strip steak. Ground round boudin drumstick meatball bresaola, picanha tongue t-bone landjaeger chicken. Drumstick prosciutto swine flank, shankle ground round tenderloin. Ribeye doner tongue hamburger chuck beef rump sausage pork loin biltong brisket shank pork belly.</p>\n<p>Bacon cupim meatball frankfurter meatloaf ham spare ribs flank kevin beef cow pork chop ham hock kielbasa sirloin. Bacon tenderloin prosciutto pork brisket boudin leberkas drumstick strip steak short loin. Drumstick kevin venison pork loin, ham hock turkey pastrami tri-tip short ribs. Cupim andouille meatloaf landjaeger ham hock ground round rump spare ribs sausage pork loin swine filet mignon chuck. Pork belly ground round t-bone ham capicola pig chicken meatball. Pork cupim doner capicola tenderloin porchetta.</p>\n<p>Shankle pork chop ham hock, flank picanha tenderloin spare ribs leberkas alcatra frankfurter kielbasa jowl doner ball tip. Turkey picanha bresaola pastrami. Frankfurter beef ham hock tenderloin tongue corned beef picanha meatball meatloaf shank sausage t-bone. Beef ribs pork chop meatball, cow rump short ribs andouille shank ham landjaeger jerky boudin. Filet mignon shoulder beef, drumstick tail frankfurter beef ribs pig short ribs ham flank bresaola ribeye strip steak meatball. Alcatra brisket pastrami beef ribs beef leberkas porchetta prosciutto pork belly chicken pork sausage cow ground round kevin.</p>\n<p>Pork belly kielbasa capicola turducken pig t-bone ribeye picanha alcatra turkey strip steak flank filet mignon. Chuck rump pork chop tenderloin. Alcatra bresaola tenderloin chuck, andouille meatloaf jerky cow. T-bone sausage frankfurter, spare ribs meatloaf swine chicken short ribs turkey pork pastrami capicola tail bresaola. Pork belly flank chuck, ball tip picanha biltong ham rump turducken andouille spare ribs jowl porchetta capicola pastrami.</p>\n<p>Alcatra shoulder kielbasa, chuck rump bacon salami. Kevin beef landjaeger beef ribs brisket spare ribs venison filet mignon bacon pig leberkas boudin cupim turducken. Pork chop pig boudin porchetta landjaeger, cupim short ribs jerky turducken ham sirloin filet mignon shankle. Pork pastrami beef ribs tri-tip landjaeger. Frankfurter cupim shankle, porchetta leberkas prosciutto doner biltong pork chop brisket drumstick. Picanha doner rump venison pork loin. Tongue capicola short loin leberkas porchetta, pork loin jowl ground round rump biltong ham hock ribeye.</p>\n<p>Ball tip pork tenderloin doner sirloin chicken. Rump beef ribs pastrami cow, bresaola leberkas jerky capicola beef prosciutto porchetta sausage. Ribeye frankfurter filet mignon tongue cupim turducken, short ribs pork chop prosciutto sirloin meatball. Chuck swine sirloin jowl pig biltong pork salami.</p>\n<p>Porchetta rump shankle tri-tip ground round kielbasa. Doner tenderloin pork belly porchetta meatball. Alcatra brisket ball tip beef ribs kevin porchetta pig strip steak hamburger pork belly tail capicola. Capicola pork belly turkey, turducken t-bone pork meatloaf. Rump shankle short ribs chicken, short loin pork salami cow sausage frankfurter meatball pancetta turkey biltong chuck.</p>','img/Conteudo/php2.png','2016-01-01','2016-01-10 19:42:37',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(14,2,7,'Leberkas ground round sirloin biltong flank','<p>Leberkas ground round sirloin biltong flank. Meatloaf ham salami shoulder shank. Pancetta short loin beef ribs kevin cow. Landjaeger porchetta boudin, hamburger sirloin kielbasa bresaola turducken turkey tongue meatloaf pork sausage. Ham filet mignon pork, frankfurter turducken porchetta pork belly corned beef kevin sirloin tongue tail.</p>\n<p>Leberkas ball tip porchetta kielbasa beef beef ribs. Picanha corned beef ball tip, cow meatball sausage meatloaf. Porchetta ribeye tail corned beef. Drumstick shoulder ribeye biltong. Shoulder drumstick shank pork chop.</p>\n<p>Prosciutto shankle flank filet mignon. Biltong short ribs ham hock, ground round pancetta sausage meatball picanha beef ribs pig pork chop corned beef tongue pork loin. Brisket strip steak alcatra salami t-bone ball tip pork chop kevin. Jowl turducken capicola pork belly chuck shankle drumstick t-bone brisket porchetta pork chop ham hock spare ribs. Ham fatback sausage pastrami.</p>\n<p>T-bone cupim corned beef kielbasa, jerky beef ribs pancetta. Turkey pig frankfurter salami tail shoulder brisket jowl sausage pancetta boudin porchetta hamburger pork loin. Short loin sausage shoulder bresaola ground round beef turkey, filet mignon frankfurter fatback bacon. Turducken tongue jowl ham hock. Capicola beef fatback doner boudin. Ball tip biltong short ribs andouille turducken turkey. Alcatra turducken ham, picanha shank chicken pork belly swine cow.</p>','img/Conteudo/teste4.png','2016-01-06','2016-01-06 13:09:58',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(24,1,6,'teste','<p>teste</p>','img/Conteudo/testeRele2.png','2016-01-12','2016-01-12 14:55:57',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(25,1,6,'GINTEC','<p align=\"justify\">Lorem ipsum dolor sit amet, ut elit sapien, <strong>praesent</strong> magnis mi consectetuer, justo egestas nec, platea vivamus do diam vestibulum rhoncus. Donec ante erat, ipsum dapibus eros gravida, lobortis morbi in leo lobortis. Nulla dui sed duis ac accumsan, posuere nunc lacus arcu aliquam sit in, nibh placerat elit libero, id mauris sit, arcu vel vel habitasse arcu ultrices. Sollicitudin suspendisse sit morbi eget convallis nam, mollis nec sit id rerum sed vestibulum. Et sed vehicula nulla conubia consequat bibendum, interdum rutrum mi erat interdum nec, at consectetuer. Laoreet wisi, phasellus pharetra enim porttitor torquent leo vel. Taciti mollis pellentesque quis perferendis in. Eu vivamus quam blandit tellus, nonummy sociosqu, massa nec imperdiet sapien orci lacinia ut, congue ullamcorper venenatis mi sed id.</p>','img/conteudo/gintec/debian_gnu_linux_1366x768_8248.jpg','2016-01-21','2016-01-21 17:43:57',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(26,1,6,'123','<p align=\"justify\">Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, platea vivamus do diam vestibulum rhoncus. Donec ante erat, ipsum dapibus eros gravida, lobortis morbi in leo lobortis. Nulla dui sed duis ac accumsan, posuere nunc lacus arcu aliquam sit in, nibh placerat elit libero, id mauris sit, arcu vel vel habitasse arcu ultrices. Sollicitudin suspendisse sit morbi eget convallis nam, mollis nec sit id rerum sed vestibulum. Et sed vehicula nulla conubia consequat bibendum, interdum rutrum mi erat interdum nec, at consectetuer. Laoreet wisi, phasellus pharetra enim porttitor torquent leo vel. Taciti mollis pellentesque quis perferendis in. Eu vivamus quam blandit tellus, nonummy sociosqu, massa nec imperdiet sapien orci lacinia ut, congue ullamcorper venenatis mi sed id.</p>','img/conteudo/123/navi_by_laureril.jpg','2016-01-21','2016-01-21 18:15:41',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(27,2,6,'teteteteteet','<p align=\"justify\">Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, platea vivamus do diam vestibulum rhoncus. Donec ante erat, ipsum dapibus eros gravida, lobortis morbi in leo lobortis. Nulla dui sed duis ac accumsan, posuere nunc lacus arcu aliquam sit in, nibh placerat elit libero, id mauris sit, arcu vel vel habitasse arcu ultrices. Sollicitudin suspendisse sit morbi eget convallis nam, mollis nec sit id rerum sed vestibulum. Et sed vehicula nulla conubia consequat bibendum, interdum rutrum mi erat interdum nec, at consectetuer. Laoreet wisi, phasellus pharetra enim porttitor torquent leo vel. Taciti mollis pellentesque quis perferendis in. Eu vivamus quam blandit tellus, nonummy sociosqu, massa nec imperdiet sapien orci lacinia ut, congue ullamcorper venenatis mi sed id.</p>','img/conteudo/teteteteteet/zelda_wallpaper_by_nightbloodsteel-d4rnt4n.jpg','2016-01-21','2016-01-21 18:16:05',0,'','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(29,2,6,'Semana de informática','<p>Cras non dictum adipiscing risus, magna morbi, nulla donec consequat, aenean quis vivamus metus vitae. Nonummy molestie eget integer blandit non vestibulum, fames sodales cursus et odio libero, faucibus ut varius imperdiet cum vel, ac proin, imperdiet turpis tempor libero. Venenatis sed in sed alias sem. Nam nulla turpis libero, convallis ante aliquet erat duis est curae, facilisis vel dui pellentesque, voluptates lectus turpis maiores. Wisi mi eget aliquet ipsum nam, fusce vivamus lorem ante vel, aenean vel. Egestas egestas vehicula, nullam integer in id proin vel, posuere tincidunt repellendus non euismod, urna sed erat morbi viverra phasellus eligendi. Purus leo aliquam nullam in. Enim nunc, molestie arcu mattis. Faucibus praesentium netus lacus. Lorem enim arcu turpis, cursus lacus ut eget mauris in suscipit, velit molestie sed, dui ullamcorper sit ut, vestibulum arcu rutrum.</p>','img/conteudo/semana-de-informtica/tuEpFWh.jpg','2016-01-21','2016-01-21 19:34:10',1,'sem_info','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(33,1,6,'Navi','<p>Etiam ante, sollicitudin velit, elit turpis, libero non id amet. Est eget aliquet vitae purus. Aliquam odio, nam ac, a magna congue et non fermentum, sociis morbi in lectus ut. Dapibus ultricies laoreet integer, mi nullam quisque ipsum orci taciti ultrices, vestibulum dolor vestibulum adipiscing commodo per, nec justo. Auctor ac et suscipit metus adipiscing. Justo in mi. Ligula curae velit luctus, blandit nibh sed nulla euismod, nec placerat consectetuer dis, litora metus pede nullam mauris.</p>','img/conteudo/navi/navi_by_laureril.jpg','2016-01-21','2016-01-21 19:54:38',1,'navi','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat'),(34,1,6,'Título','<p>Etiam ante, sollicitudin velit, elit turpis, libero non id amet. Est eget aliquet vitae purus. Aliquam odio, nam ac, a magna congue et non fermentum, sociis morbi in lectus ut. Dapibus ultricies laoreet integer, mi nullam quisque ipsum orci taciti ultrices, vestibulum dolor vestibulum adipiscing commodo per, nec justo. Auctor ac et suscipit metus adipiscing. Justo in mi. Ligula curae velit luctus, blandit nibh sed nulla euismod, nec placerat consectetuer dis, litora metus pede nullam mauris.</p>','img/conteudo/ttulo/q78WfpO.jpg','2016-01-21','2016-01-21 21:17:33',1,'titulo','Lorem ipsum dolor sit amet, ut elit sapien, praesent magnis mi consectetuer, justo egestas nec, plat');
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
INSERT INTO `conteudo_sub_area` VALUES (2,1),(13,1),(24,1),(25,1),(29,1),(2,2),(24,2),(26,2),(1,3),(2,3),(13,3),(24,3),(25,3),(29,3),(1,5),(2,5),(24,5),(26,5),(2,7),(13,7),(24,7),(25,7),(29,7),(13,8),(24,8),(25,8),(29,8),(24,9),(26,9),(24,10),(26,10),(24,11),(26,11),(24,12),(26,12),(24,13),(26,13),(24,14),(26,14),(24,15),(26,15),(24,16),(26,16),(24,17),(26,17),(24,18),(26,18),(24,19),(26,19),(24,20),(33,20),(34,20),(24,21),(33,21),(34,21),(24,22),(33,22),(34,22),(24,23),(33,23),(34,23),(24,24),(33,24),(34,24),(24,25),(33,25),(34,25),(24,26),(27,26),(24,27),(27,27),(24,28),(27,28),(24,29),(27,29);
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
  PRIMARY KEY (`fin_id`),
  KEY `fk_contas_usuarios1` (`usuarios_usu_id`),
  CONSTRAINT `fk_contas_usuarios1` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financas`
--

LOCK TABLES `financas` WRITE;
/*!40000 ALTER TABLE `financas` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade`
--

LOCK TABLES `funcionalidade` WRITE;
/*!40000 ALTER TABLE `funcionalidade` DISABLE KEYS */;
INSERT INTO `funcionalidade` VALUES (1,'Usuário','usuarios','fa fa-user'),(2,'Conteúdo','conteudo','fa fa-file-text'),(3,'Calendário','clendario','fa fa-calendar');
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
INSERT INTO `gru_func` VALUES (1,1),(1,2);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orientadores`
--

LOCK TABLES `orientadores` WRITE;
/*!40000 ALTER TABLE `orientadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `orientadores` ENABLE KEYS */;
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
  `rep_descricao` varchar(100) DEFAULT NULL,
  `rep_autor` varchar(100) NOT NULL,
  `rep_autor_email` varchar(100) NOT NULL,
  `rep_monografia` varchar(100) DEFAULT NULL,
  `rep_video` varchar(100) DEFAULT NULL,
  `rep_codigo_fonte` varchar(100) DEFAULT NULL,
  `rep_data` date DEFAULT NULL,
  PRIMARY KEY (`rep_id`),
  KEY `fk_repositorios_usuarios1` (`usuarios_usu_id`),
  KEY `fk_repositorios_orientadores1` (`orientadores_ori_id`),
  CONSTRAINT `fk_repositorios_orientadores1` FOREIGN KEY (`orientadores_ori_id`) REFERENCES `orientadores` (`ori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_repositorios_usuarios1` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repositorios`
--

LOCK TABLES `repositorios` WRITE;
/*!40000 ALTER TABLE `repositorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `repositorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reposotorio_areas`
--

DROP TABLE IF EXISTS `reposotorio_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reposotorio_areas` (
  `repositorios_rep_id` int(11) NOT NULL,
  `areas_conhecimento_are_id` int(11) NOT NULL,
  PRIMARY KEY (`repositorios_rep_id`,`areas_conhecimento_are_id`),
  KEY `fk_reposotorio_areas_areas_conhecimento1` (`areas_conhecimento_are_id`),
  CONSTRAINT `fk_reposotorio_areas_areas_conhecimento1` FOREIGN KEY (`areas_conhecimento_are_id`) REFERENCES `areas_conhecimento` (`are_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reposotorio_areas_repositorios1` FOREIGN KEY (`repositorios_rep_id`) REFERENCES `repositorios` (`rep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reposotorio_areas`
--

LOCK TABLES `reposotorio_areas` WRITE;
/*!40000 ALTER TABLE `reposotorio_areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reposotorio_areas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_conteudo`
--

LOCK TABLES `tipo_conteudo` WRITE;
/*!40000 ALTER TABLE `tipo_conteudo` DISABLE KEYS */;
INSERT INTO `tipo_conteudo` VALUES (1,'Notícia'),(2,'Evento');
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
  `usu_data_nascimento` date DEFAULT NULL,
  `usu_sexo` tinyint(4) DEFAULT NULL,
  `usu_data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usu_id`),
  KEY `fk_usuarios_grupos1` (`grupos_gru_id`),
  CONSTRAINT `fk_usuarios_grupos1` FOREIGN KEY (`grupos_gru_id`) REFERENCES `grupos` (`gru_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'Icaro Brito de Carvalho Messias','','12131003777','icaro@example.com','443e41d6c89eddc57b47e7f1630b43cf',1,'1991-06-14',1,'2015-11-20 09:43:20'),(3,2,'Maria','(32)9988-7456','12121212','maria@example.com','263bce650e68ab4e23f28263760b9fa5',0,'2000-10-10',1,'2015-11-20 10:35:52'),(5,3,'Joao','(35)9888-7456','369852147','joao@example.com','dccd96c256bc7dd39bae41a405f25e43',1,'0000-00-00',0,'2015-11-20 11:22:03'),(6,1,'Ronieri Sales','(35)9913-3757','12131001608','ronieri.sales@live.com','6e20c82a4468f2a432980715761f399d',1,'0000-00-00',0,'2015-11-19 15:10:33'),(7,1,'Teste','09876543212','12131001609','teste@teste.com','698dc19d489c4e4db73e28a713eab07b',1,'0000-00-00',0,'2015-11-29 15:59:45');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-21 20:14:31
