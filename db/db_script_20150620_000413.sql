SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `consultOdontEngSoft` ;
CREATE SCHEMA IF NOT EXISTS `consultOdontEngSoft` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `consultOdontEngSoft` ;

-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`secretario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`secretario` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`secretario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` INT UNSIGNED NOT NULL,
  `dataNascimento` DATE NULL,
  `endereco` VARCHAR(45) NULL,
  `contato` INT NOT NULL,
  `matricula` INT UNSIGNED NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `secretariocol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`cirurgiao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`cirurgiao` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`cirurgiao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` INT UNSIGNED NOT NULL,
  `dataNascimento` DATE NULL,
  `endereco` VARCHAR(45) NULL,
  `contato` INT NOT NULL,
  `matricula` INT UNSIGNED NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `secretariocol` VARCHAR(45) NULL,
  `cro` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`cliente` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`cliente` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` INT UNSIGNED NOT NULL,
  `dataNascimento` DATE NULL,
  `endereco` VARCHAR(45) NULL,
  `contato` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`planoTratamentoProcedimentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`planoTratamentoProcedimentos` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`planoTratamentoProcedimentos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cirurgiao` INT UNSIGNED NOT NULL,
  `id_cliente` INT UNSIGNED NOT NULL,
  `qtdAtendimento` INT UNSIGNED NOT NULL,
  INDEX `fk_planoTratamentoProcedimentos_cliente1_idx` (`id_cliente` ASC),
  INDEX `fk_planoTratamentoProcedimentos_cirurgiao1_idx` (`id_cirurgiao` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_planoTratamentoProcedimentos_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `consultOdontEngSoft`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planoTratamentoProcedimentos_cirurgiao1`
    FOREIGN KEY (`id_cirurgiao`)
    REFERENCES `consultOdontEngSoft`.`cirurgiao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`atendimento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`atendimento` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`atendimento` (
  `id` INT UNSIGNED NOT NULL,
  `id_cliente` INT UNSIGNED NOT NULL,
  `id_cirurgiao` INT UNSIGNED NOT NULL,
  `id_secretario` INT UNSIGNED NOT NULL,
  `data_hora` DATETIME NOT NULL,
  `id_planoTratProc` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_atendimento_cliente1_idx` (`id_cliente` ASC),
  INDEX `fk_atendimento_secretario1_idx` (`id_secretario` ASC),
  INDEX `fk_atendimento_cirurgiao1_idx` (`id_cirurgiao` ASC),
  INDEX `fk_atendimento_planoTratamentoProcedimentos1_idx` (`id_planoTratProc` ASC),
  CONSTRAINT `fk_atendimento_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `consultOdontEngSoft`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atendimento_secretario1`
    FOREIGN KEY (`id_secretario`)
    REFERENCES `consultOdontEngSoft`.`secretario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atendimento_cirurgiao1`
    FOREIGN KEY (`id_cirurgiao`)
    REFERENCES `consultOdontEngSoft`.`cirurgiao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atendimento_planoTratamentoProcedimentos1`
    FOREIGN KEY (`id_planoTratProc`)
    REFERENCES `consultOdontEngSoft`.`planoTratamentoProcedimentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`procedimento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`procedimento` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`procedimento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `preco` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`planTratProced_Proced`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`planTratProced_Proced` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`planTratProced_Proced` (
  `planTratProced_Procedcol` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `planoTratamentoProcedimentos_id` INT UNSIGNED NOT NULL,
  `procedimento_id` INT NOT NULL,
  PRIMARY KEY (`planTratProced_Procedcol`),
  INDEX `fk_planTratProced_Proced_planoTratamentoProcedimentos1_idx` (`planoTratamentoProcedimentos_id` ASC),
  INDEX `fk_planTratProced_Proced_procedimento1_idx` (`procedimento_id` ASC),
  CONSTRAINT `fk_planTratProced_Proced_planoTratamentoProcedimentos1`
    FOREIGN KEY (`planoTratamentoProcedimentos_id`)
    REFERENCES `consultOdontEngSoft`.`planoTratamentoProcedimentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planTratProced_Proced_procedimento1`
    FOREIGN KEY (`procedimento_id`)
    REFERENCES `consultOdontEngSoft`.`procedimento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`orçamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`orçamento` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`orçamento` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_planTratOrc` INT UNSIGNED NOT NULL,
  `preço` FLOAT UNSIGNED NOT NULL,
  `pago` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orçamento_planoTratamentoProcedimentos1_idx` (`id_planTratOrc` ASC),
  CONSTRAINT `fk_orçamento_planoTratamentoProcedimentos1`
    FOREIGN KEY (`id_planTratOrc`)
    REFERENCES `consultOdontEngSoft`.`planoTratamentoProcedimentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `consultOdontEngSoft`.`listaDeEspera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `consultOdontEngSoft`.`listaDeEspera` ;

CREATE TABLE IF NOT EXISTS `consultOdontEngSoft`.`listaDeEspera` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` INT UNSIGNED NOT NULL,
  `id_secretario` INT UNSIGNED NOT NULL,
  `data_hora` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_listaDeEspera_cliente1_idx` (`id_cliente` ASC),
  INDEX `fk_listaDeEspera_secretario1_idx` (`id_secretario` ASC),
  CONSTRAINT `fk_listaDeEspera_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `consultOdontEngSoft`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaDeEspera_secretario1`
    FOREIGN KEY (`id_secretario`)
    REFERENCES `consultOdontEngSoft`.`secretario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
