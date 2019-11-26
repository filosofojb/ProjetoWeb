CREATE DATABASE `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;

 CREATE TABLE `Cacamba` (
  `idCacamba` int(11) NOT NULL AUTO_INCREMENT,
  `SitacaoCacamba` char(1) NOT NULL,
  `CoordernadaX` double NOT NULL,
  `CoordernadaY` double NOT NULL,
  `Destino` int(11) NOT NULL,
  PRIMARY KEY (`idCacamba`),
  KEY `Destino_idx` (`Destino`),
  CONSTRAINT `Destino` FOREIGN KEY (`Destino`) REFERENCES `Pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=cp850;



CREATE TABLE `Pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
