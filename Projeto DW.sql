CREATE TABLE `Cacamba` (
  `idCacamba` int(11) NOT NULL AUTO_INCREMENT,
  `SitacaoCacamba` char(1) NOT NULL,
  `Destino` int(11) NOT NULL,
  PRIMARY KEY (`idCacamba`),
  KEY `Destino_idx` (`Destino`),
  CONSTRAINT `Destino` FOREIGN KEY (`Destino`) REFERENCES `Pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=cp850;

INSERT INTO `mydb`.`Cacamba`
(`idCacamba`,
`SitacaoCacamba`,
`Destino`)
VALUES
(<{idCacamba: }>,
<{SitacaoCacamba: }>,
<{Destino: }>);

UPDATE `mydb`.`Cacamba`
SET
`idCacamba` = <{idCacamba: }>,
`SitacaoCacamba` = <{SitacaoCacamba: }>,
`Destino` = <{Destino: }>
WHERE `idCacamba` = <{expr}>;

DELETE FROM `mydb`.`Cacamba`
WHERE <{where_expression}>;
-- -----------------------------------------------------------------------------
CREATE TABLE `Pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `mydb`.`Pessoa`
(`idPessoa`,
`Nome`,
`Email`,
`Celular`,
`senha`)
VALUES
(<{idPessoa: }>,
<{Nome: }>,
<{Email: }>,
<{Celular: }>,
<{senha: }>);


UPDATE `mydb`.`Pessoa`
SET
`idPessoa` = <{idPessoa: }>,
`Nome` = <{Nome: }>,
`Email` = <{Email: }>,
`Celular` = <{Celular: }>,
`senha` = <{senha: }>
WHERE `idPessoa` = <{expr}>;

DELETE FROM `mydb`.`Cacamba`
WHERE <{where_expression}>;





