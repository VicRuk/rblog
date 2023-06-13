-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para rblog
DROP DATABASE IF EXISTS `rblog`;
CREATE DATABASE IF NOT EXISTS `rblog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rblog`;

-- Copiando estrutura para tabela rblog.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blog_bloginfo_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_blogimg_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_usuario_codigo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_codigo`),
  KEY `blog_bloginfo_codigo` (`blog_bloginfo_codigo`),
  KEY `blog_blogimg_codigo` (`blog_blogimg_codigo`),
  KEY `blog_usuario_codigo` (`blog_usuario_codigo`),
  CONSTRAINT `FK_blog_blogimg` FOREIGN KEY (`blog_blogimg_codigo`) REFERENCES `blogimg` (`blogimg_codigo`),
  CONSTRAINT `FK_blog_bloginfo` FOREIGN KEY (`blog_bloginfo_codigo`) REFERENCES `bloginfo` (`bloginfo_codigo`),
  CONSTRAINT `FK_blog_usuario` FOREIGN KEY (`blog_usuario_codigo`) REFERENCES `usuario` (`usuario_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela rblog.blogimg
CREATE TABLE IF NOT EXISTS `blogimg` (
  `blogimg_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blogimg_nome` varchar(250) DEFAULT NULL,
  `blogimg_nomerandom` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`blogimg_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela rblog.bloginfo
CREATE TABLE IF NOT EXISTS `bloginfo` (
  `bloginfo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bloginfo_titulo` varchar(250) NOT NULL,
  `bloginfo_corpo` longtext NOT NULL,
  `bloginfo_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bloginfo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela rblog.img
CREATE TABLE IF NOT EXISTS `img` (
  `nome` varchar(30) NOT NULL,
  `nome_random` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela rblog.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(250) DEFAULT NULL,
  `usuario_email` varchar(250) DEFAULT NULL,
  `usuario_senha` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`usuario_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
