-- MySQL Script generated by MySQL Workbench
-- 03/24/17 00:22:54
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`USUARIO_COMUM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`USUARIO_COMUM` (
  `Email` VARCHAR(45) NOT NULL,
  `Pnome` VARCHAR(20) NOT NULL,
  `Unome` VARCHAR(20) NOT NULL,
  `Senha` VARCHAR(100) NOT NULL,
  `DataNascimento` DATE NOT NULL,
  `StilPoints` SMALLINT(3) UNSIGNED NULL,
  `DataEntradaSistema` DATETIME NOT NULL,
  `ImagemPerfil` VARCHAR(100) NULL,
  PRIMARY KEY (`Email`))
ENGINE = InnoDB
COMMENT = '						';


-- -----------------------------------------------------
-- Table `mydb`.`ADMINISTRADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ADMINISTRADOR` (
  `Email` VARCHAR(45) NOT NULL,
  `Pnome` VARCHAR(20) NOT NULL,
  `Unome` VARCHAR(20) NOT NULL,
  `Senha` VARCHAR(100) NOT NULL,
  `DataNascimento` DATE NOT NULL,
  `DataEntradaSistema` DATETIME NOT NULL,
  `Salario` SMALLINT(3) UNSIGNED NOT NULL,
  `Cpf` BIGINT(11) NOT NULL,
  `Root` TINYINT(1) NOT NULL,
  `ImagemPerfil` VARCHAR(100) NULL,
  PRIMARY KEY (`Email`),
  UNIQUE INDEX `Cpf_UNIQUE` (`Cpf` ASC))
ENGINE = InnoDB
COMMENT = '						';


-- -----------------------------------------------------
-- Table `mydb`.`RELATORIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`RELATORIO` (
  `Data` DATETIME NOT NULL,
  `NumComprasEfetuadas` BIGINT(11) UNSIGNED NOT NULL,
  `DespesaBruta` FLOAT(10,2) UNSIGNED NOT NULL,
  `QtdJogosVendidos` INT UNSIGNED NOT NULL,
  `QtdFilmesVendidos` INT UNSIGNED NOT NULL,
  `ReceitaLiquida` FLOAT(10,2) UNSIGNED NOT NULL,
  `QtdNovosUsuarios` INT UNSIGNED NOT NULL,
  `NumComunidadesCriadas` INT UNSIGNED NOT NULL,
  `ValorMedioCompraUsuario` FLOAT(10,2) NOT NULL,
  PRIMARY KEY (`Data`))
ENGINE = InnoDB
COMMENT = '		';


-- -----------------------------------------------------
-- Table `mydb`.`COMUNIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMUNIDADE` (
  `Nome` VARCHAR(45) NOT NULL,
  `ClassificacaoEtaria` TINYINT UNSIGNED NOT NULL,
  `Genero` VARCHAR(45) NOT NULL,
  `Descricao` VARCHAR(500) NOT NULL,
  `DataCriacao` DATETIME NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Nome`),
  INDEX `fk_COMUNIDADE_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  CONSTRAINT `fk_COMUNIDADE_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FORNECEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FORNECEDOR` (
  `Nome` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`JOGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`JOGO` (
  `CodigoJogo` INT UNSIGNED NOT NULL,
  `QtdVendida` INT UNSIGNED NOT NULL,
  `NotaUsuario` TINYINT UNSIGNED NULL,
  `ClassificacaoEtaria` TINYINT UNSIGNED NOT NULL,
  `PrecoCusto` FLOAT(5,2) UNSIGNED NOT NULL,
  `PrecoVenda` FLOAT(5,2) UNSIGNED NOT NULL,
  `Genero` ENUM('Acao', 'Comedia', 'Aventura', 'Romance', 'Drama', 'Terror', 'Suspense', 'Infantil', 'Outro') NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `DataLancamento` DATE NOT NULL,
  `DataEntradaSistema` DATE NOT NULL,
  `IdiomaAudio` VARCHAR(45) NOT NULL,
  `IdiomaLegenda` VARCHAR(45) NOT NULL,
  `Descricao` VARCHAR(500) NOT NULL,
  `QtdJogadores` TINYINT NOT NULL,
  `SistemasOperacionais` SET('Windows', 'Linux', 'MacOS') NOT NULL,
  `RequisitosMinimos` VARCHAR(500) NOT NULL,
  `RequisitosRecomendados` VARCHAR(500) NOT NULL,
  `FORNECEDOR_Nome` VARCHAR(45) NOT NULL,
  `ADMINISTRADOR_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CodigoJogo`),
  INDEX `fk_JOGO_FORNECEDOR1_idx` (`FORNECEDOR_Nome` ASC),
  INDEX `fk_JOGO_ADMINISTRADOR1_idx` (`ADMINISTRADOR_Email` ASC),
  CONSTRAINT `fk_JOGO_FORNECEDOR1`
    FOREIGN KEY (`FORNECEDOR_Nome`)
    REFERENCES `mydb`.`FORNECEDOR` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOGO_ADMINISTRADOR1`
    FOREIGN KEY (`ADMINISTRADOR_Email`)
    REFERENCES `mydb`.`ADMINISTRADOR` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FILME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FILME` (
  `CodigoFilme` INT UNSIGNED NOT NULL,
  `QtdVendida` INT UNSIGNED NOT NULL,
  `ClassificacaoEtaria` TINYINT UNSIGNED NOT NULL,
  `PrecoCusto` FLOAT(5,2) UNSIGNED NOT NULL,
  `PrecoVenda` FLOAT(5,2) UNSIGNED NOT NULL,
  `Genero` ENUM('Acao', 'Comedia', 'Aventura', 'Romance', 'Drama', 'Terror', 'Suspense', 'Infantil', 'Outro') NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `DataLancamento` DATE NOT NULL,
  `DataEntradaSistema` DATE NOT NULL,
  `IdiomaAudio` VARCHAR(45) NOT NULL,
  `IdiomaLegenda` VARCHAR(45) NOT NULL,
  `Sinopse` VARCHAR(500) NOT NULL,
  `Duracao` TINYINT NOT NULL,
  `FORNECEDOR_Nome` VARCHAR(45) NOT NULL,
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  `ADMINISTRADOR_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CodigoFilme`),
  INDEX `fk_FILME_FORNECEDOR1_idx` (`FORNECEDOR_Nome` ASC),
  INDEX `fk_FILME_JOGO1_idx` (`JOGO_CodigoJogo` ASC),
  INDEX `fk_FILME_ADMINISTRADOR1_idx` (`ADMINISTRADOR_Email` ASC),
  CONSTRAINT `fk_FILME_FORNECEDOR1`
    FOREIGN KEY (`FORNECEDOR_Nome`)
    REFERENCES `mydb`.`FORNECEDOR` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FILME_JOGO1`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FILME_ADMINISTRADOR1`
    FOREIGN KEY (`ADMINISTRADOR_Email`)
    REFERENCES `mydb`.`ADMINISTRADOR` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`IMAGENS_FILME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`IMAGENS_FILME` (
  `CaminhoImagem` VARCHAR(100) NOT NULL,
  `FILME_CodigoFilme` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`CaminhoImagem`, `FILME_CodigoFilme`),
  INDEX `fk_IMAGENS_FILME_FILME1_idx` (`FILME_CodigoFilme` ASC),
  CONSTRAINT `fk_IMAGENS_FILME_FILME1`
    FOREIGN KEY (`FILME_CodigoFilme`)
    REFERENCES `mydb`.`FILME` (`CodigoFilme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`IMAGENS_JOGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`IMAGENS_JOGO` (
  `CaminhoImagem` VARCHAR(100) NOT NULL,
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`CaminhoImagem`, `JOGO_CodigoJogo`),
  INDEX `fk_IMAGENS_JOGO_JOGO1_idx` (`JOGO_CodigoJogo` ASC),
  CONSTRAINT `fk_IMAGENS_JOGO_JOGO1`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMENTARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMENTARIO` (
  `ID` INT NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMENTARIO_COMUNIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMENTARIO_COMUNIDADE` (
  `COMENTARIO_ID` INT NOT NULL,
  `COMUNIDADE_Nome` VARCHAR(45) NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  `Comentario` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`COMENTARIO_ID`),
  INDEX `fk_COMUNIDADE_has_USUARIO_COMUM_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_COMUNIDADE_has_USUARIO_COMUM_COMUNIDADE1_idx` (`COMUNIDADE_Nome` ASC),
  INDEX `fk_COMENTARIO_COMUNIDADE_COMENTARIO1_idx` (`COMENTARIO_ID` ASC),
  CONSTRAINT `fk_COMUNIDADE_has_USUARIO_COMUM_COMUNIDADE1`
    FOREIGN KEY (`COMUNIDADE_Nome`)
    REFERENCES `mydb`.`COMUNIDADE` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMUNIDADE_has_USUARIO_COMUM_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMENTARIO_COMUNIDADE_COMENTARIO1`
    FOREIGN KEY (`COMENTARIO_ID`)
    REFERENCES `mydb`.`COMENTARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMENTARIO_FILME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMENTARIO_FILME` (
  `COMENTARIO_ID` INT NOT NULL,
  `FILME_CodigoFilme` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  `Comentario` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`COMENTARIO_ID`),
  INDEX `fk_FILME_has_USUARIO_COMUM_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_FILME_has_USUARIO_COMUM_FILME1_idx` (`FILME_CodigoFilme` ASC),
  INDEX `fk_COMENTARIO_FILME_COMENTARIO1_idx` (`COMENTARIO_ID` ASC),
  CONSTRAINT `fk_FILME_has_USUARIO_COMUM_FILME1`
    FOREIGN KEY (`FILME_CodigoFilme`)
    REFERENCES `mydb`.`FILME` (`CodigoFilme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FILME_has_USUARIO_COMUM_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMENTARIO_FILME_COMENTARIO1`
    FOREIGN KEY (`COMENTARIO_ID`)
    REFERENCES `mydb`.`COMENTARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMENTARIO_JOGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMENTARIO_JOGO` (
  `COMENTARIO_ID` INT NOT NULL,
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  `Comentario` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`COMENTARIO_ID`),
  INDEX `fk_JOGO_has_USUARIO_COMUM_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_JOGO_has_USUARIO_COMUM_JOGO1_idx` (`JOGO_CodigoJogo` ASC),
  INDEX `fk_COMENTARIO_JOGO_COMENTARIO1_idx` (`COMENTARIO_ID` ASC),
  CONSTRAINT `fk_JOGO_has_USUARIO_COMUM_JOGO1`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOGO_has_USUARIO_COMUM_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMENTARIO_JOGO_COMENTARIO1`
    FOREIGN KEY (`COMENTARIO_ID`)
    REFERENCES `mydb`.`COMENTARIO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SEGUE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`SEGUE` (
  `COMUNIDADE_Nome` VARCHAR(45) NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`COMUNIDADE_Nome`, `USUARIO_COMUM_Email`),
  INDEX `fk_COMUNIDADE_has_USUARIO_COMUM_USUARIO_COMUM2_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_COMUNIDADE_has_USUARIO_COMUM_COMUNIDADE2_idx` (`COMUNIDADE_Nome` ASC),
  CONSTRAINT `fk_COMUNIDADE_has_USUARIO_COMUM_COMUNIDADE2`
    FOREIGN KEY (`COMUNIDADE_Nome`)
    REFERENCES `mydb`.`COMUNIDADE` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMUNIDADE_has_USUARIO_COMUM_USUARIO_COMUM2`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMPRA_FILMES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMPRA_FILMES` (
  `FILME_CodigoFilme` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  `Data` DATE NOT NULL,
  PRIMARY KEY (`FILME_CodigoFilme`, `USUARIO_COMUM_Email`),
  INDEX `fk_FILME_has_USUARIO_COMUM_USUARIO_COMUM2_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_FILME_has_USUARIO_COMUM_FILME2_idx` (`FILME_CodigoFilme` ASC),
  CONSTRAINT `fk_FILME_has_USUARIO_COMUM_FILME2`
    FOREIGN KEY (`FILME_CodigoFilme`)
    REFERENCES `mydb`.`FILME` (`CodigoFilme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FILME_has_USUARIO_COMUM_USUARIO_COMUM2`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`COMPRA_JOGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`COMPRA_JOGO` (
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  `Data` DATE NOT NULL,
  PRIMARY KEY (`JOGO_CodigoJogo`, `USUARIO_COMUM_Email`),
  INDEX `fk_JOGO_has_USUARIO_COMUM_USUARIO_COMUM2_idx` (`USUARIO_COMUM_Email` ASC),
  INDEX `fk_JOGO_has_USUARIO_COMUM_JOGO2_idx` (`JOGO_CodigoJogo` ASC),
  CONSTRAINT `fk_JOGO_has_USUARIO_COMUM_JOGO2`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOGO_has_USUARIO_COMUM_USUARIO_COMUM2`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`RELATORIO_TEM_JOGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`RELATORIO_TEM_JOGO` (
  `RELATORIO_Data` DATETIME NOT NULL,
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`RELATORIO_Data`, `JOGO_CodigoJogo`),
  INDEX `fk_RELATORIO_has_JOGO_JOGO1_idx` (`JOGO_CodigoJogo` ASC),
  INDEX `fk_RELATORIO_has_JOGO_RELATORIO1_idx` (`RELATORIO_Data` ASC),
  CONSTRAINT `fk_RELATORIO_has_JOGO_RELATORIO1`
    FOREIGN KEY (`RELATORIO_Data`)
    REFERENCES `mydb`.`RELATORIO` (`Data`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RELATORIO_has_JOGO_JOGO1`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`RELATORIO_TEM_FILME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`RELATORIO_TEM_FILME` (
  `RELATORIO_Data` DATETIME NOT NULL,
  `FILME_CodigoFilme` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`RELATORIO_Data`, `FILME_CodigoFilme`),
  INDEX `fk_RELATORIO_has_FILME_FILME1_idx` (`FILME_CodigoFilme` ASC),
  INDEX `fk_RELATORIO_has_FILME_RELATORIO1_idx` (`RELATORIO_Data` ASC),
  CONSTRAINT `fk_RELATORIO_has_FILME_RELATORIO1`
    FOREIGN KEY (`RELATORIO_Data`)
    REFERENCES `mydb`.`RELATORIO` (`Data`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RELATORIO_has_FILME_FILME1`
    FOREIGN KEY (`FILME_CodigoFilme`)
    REFERENCES `mydb`.`FILME` (`CodigoFilme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`IMAGENS_COMUNIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`IMAGENS_COMUNIDADE` (
  `CaminhoImagem` VARCHAR(100) NOT NULL,
  `COMUNIDADE_Nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CaminhoImagem`, `COMUNIDADE_Nome`),
  INDEX `fk_IMAGENS_COMUNIDADE_COMUNIDADE1_idx` (`COMUNIDADE_Nome` ASC),
  CONSTRAINT `fk_IMAGENS_COMUNIDADE_COMUNIDADE1`
    FOREIGN KEY (`COMUNIDADE_Nome`)
    REFERENCES `mydb`.`COMUNIDADE` (`Nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOTAS_FILME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOTAS_FILME` (
  `Nota` TINYINT UNSIGNED NOT NULL,
  `FILME_CodigoFilme` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`FILME_CodigoFilme`, `USUARIO_COMUM_Email`),
  INDEX `fk_NOTAS_FILME_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  CONSTRAINT `fk_NOTAS_FILME_FILME1`
    FOREIGN KEY (`FILME_CodigoFilme`)
    REFERENCES `mydb`.`FILME` (`CodigoFilme`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_NOTAS_FILME_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOTAS_JOGOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOTAS_JOGOS` (
  `Nota` TINYINT UNSIGNED NOT NULL,
  `JOGO_CodigoJogo` INT UNSIGNED NOT NULL,
  `USUARIO_COMUM_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`JOGO_CodigoJogo`, `USUARIO_COMUM_Email`),
  INDEX `fk_NOTAS_JOGOS_USUARIO_COMUM1_idx` (`USUARIO_COMUM_Email` ASC),
  CONSTRAINT `fk_NOTAS_JOGOS_JOGO1`
    FOREIGN KEY (`JOGO_CodigoJogo`)
    REFERENCES `mydb`.`JOGO` (`CodigoJogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_NOTAS_JOGOS_USUARIO_COMUM1`
    FOREIGN KEY (`USUARIO_COMUM_Email`)
    REFERENCES `mydb`.`USUARIO_COMUM` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;