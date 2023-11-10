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


-- Copiando estrutura do banco de dados para yup
CREATE DATABASE IF NOT EXISTS `yup` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `yup`;

-- Copiando estrutura para tabela yup.cookie
CREATE TABLE IF NOT EXISTS `cookie` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT '0',
  `descricao` varchar(1000) DEFAULT '0',
  `preco` float DEFAULT '0',
  `imagem` varchar(50) DEFAULT '0',
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela yup.cookie: ~1 rows (aproximadamente)
DELETE FROM `cookie`;
/*!40000 ALTER TABLE `cookie` DISABLE KEYS */;
INSERT INTO `cookie` (`cod`, `nome`, `descricao`, `preco`, `imagem`) VALUES
	(1, 'Tradicional', 'Básico', 1500, 'cookieT');
/*!40000 ALTER TABLE `cookie` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
