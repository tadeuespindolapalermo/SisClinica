-- MySQL Script generated by MySQL Workbench
-- Dom 27 Mai 2018 17:40:47 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema clinica_tadeu
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clinica_tadeu
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clinica_tadeu` DEFAULT CHARACTER SET utf8 ;
USE `clinica_tadeu` ;

-- -----------------------------------------------------
-- Table `clinica_tadeu`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_tadeu`.`paciente` (
  `id_paciente` INT NOT NULL AUTO_INCREMENT COMMENT 'Id da Tabela paciente',
  `nome_paciente` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Nome do Paciente',
  `cpf_paciente` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'CPF do Paciente - Valor Único\nSerá utilizado máscara\n999.999.999-11',
  `data_nasc_paciente` DATE NOT NULL COMMENT 'Data de Nascimento do Paciente\n99/99/9999',
  `telefone_paciente` VARCHAR(16) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Telefone do Paciente\nSerá utilizado máscara\n(99) 9 9999-9999',
  `endereco_paciente` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Endereço do Paciente',
  `bairro_paciente` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Bairro do Paciente',
  `cidade_paciente` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Cidade do Paciente',
  `uf_paciente` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'UF do Paciente\nApenas 2 Letras\nEx.: DF',
  `peso_paciente` DECIMAL(5,2) NOT NULL COMMENT 'Peso do Paciente\nEx.: 75,5 - 110,75',
  `altura_paciente` DECIMAL(5,2) NOT NULL COMMENT 'Altura do Paciente',
  `imc_paciente` DECIMAL(5,2) NOT NULL COMMENT 'IMC do Paciente\nSerá calculado pela aplicação\nUsuário não entrará com o dado direto',
  PRIMARY KEY (`id_paciente`),
  UNIQUE INDEX `id_paciente_UNIQUE` (`id_paciente` ASC),
  UNIQUE INDEX `cpf_paciente_UNIQUE` (`cpf_paciente` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela de Pacientes';


-- -----------------------------------------------------
-- Table `clinica_tadeu`.`especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_tadeu`.`especialidade` (
  `id_especialidade` INT NOT NULL AUTO_INCREMENT COMMENT 'Id da Tabela especialidade',
  `descricao_especialidade` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Descrição (nome) da Especialidade Médica',
  PRIMARY KEY (`id_especialidade`),
  UNIQUE INDEX `id_especialidade_UNIQUE` (`id_especialidade` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela de Especialidades Médicas\n';


-- -----------------------------------------------------
-- Table `clinica_tadeu`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_tadeu`.`medico` (
  `id_medico` INT NOT NULL AUTO_INCREMENT COMMENT 'Id da Tabela medico',
  `nome_medico` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Nome do Médico',
  `crm_medico` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'CRM do Médico\nMáximo 8 números',
  `data_nasc_medico` DATE NOT NULL COMMENT 'Data de Nascimento do Médico',
  `especialidade_id_especialidade` INT NOT NULL,
  PRIMARY KEY (`id_medico`, `especialidade_id_especialidade`),
  UNIQUE INDEX `id_medico_UNIQUE` (`id_medico` ASC),
  INDEX `fk_medico_especialidade1_idx` (`especialidade_id_especialidade` ASC),
  CONSTRAINT `fk_medico_especialidade1`
    FOREIGN KEY (`especialidade_id_especialidade`)
    REFERENCES `clinica_tadeu`.`especialidade` (`id_especialidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabela de Médicos';


-- -----------------------------------------------------
-- Table `clinica_tadeu`.`consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_tadeu`.`consulta` (
  `id_consulta` INT NOT NULL AUTO_INCREMENT COMMENT 'Id da Tabela consulta',
  `data_consulta` DATE NOT NULL COMMENT 'Data da Consulta',
  `hora_consulta` TIME(0) NOT NULL COMMENT 'Hora da Consulta\nHH:MM',
  `valor_consulta` DECIMAL(6,2) NOT NULL COMMENT 'Valor da Consulta\nEx.: 1250,50 - 850,00\n',
  `observacao_consulta` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT 'Observação Sobre a Consulta\nCampo não obrigatório',
  `paciente_id_paciente` INT NOT NULL,
  `medico_id_medico` INT NOT NULL,
  `medico_especialidade_id_especialidade` INT NOT NULL,
  PRIMARY KEY (`id_consulta`, `paciente_id_paciente`, `medico_id_medico`, `medico_especialidade_id_especialidade`),
  UNIQUE INDEX `id_consulta_UNIQUE` (`id_consulta` ASC),
  INDEX `fk_consulta_paciente_idx` (`paciente_id_paciente` ASC),
  INDEX `fk_consulta_medico1_idx` (`medico_id_medico` ASC, `medico_especialidade_id_especialidade` ASC),
  CONSTRAINT `fk_consulta_paciente`
    FOREIGN KEY (`paciente_id_paciente`)
    REFERENCES `clinica_tadeu`.`paciente` (`id_paciente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_consulta_medico1`
    FOREIGN KEY (`medico_id_medico` , `medico_especialidade_id_especialidade`)
    REFERENCES `clinica_tadeu`.`medico` (`id_medico` , `especialidade_id_especialidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `clinica_tadeu`.`medico_has_especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_tadeu`.`medico_has_especialidade` (
  `especialidade_id_especialidade` INT NOT NULL,
  PRIMARY KEY (`especialidade_id_especialidade`),
  INDEX `fk_medico_has_especialidade_especialidade1_idx` (`especialidade_id_especialidade` ASC),
  CONSTRAINT `fk_medico_has_especialidade_especialidade1`
    FOREIGN KEY (`especialidade_id_especialidade`)
    REFERENCES `clinica_tadeu`.`especialidade` (`id_especialidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Inserção de registros na tabela paciente
-- -----------------------------------------------------
INSERT INTO `paciente` (`nome_paciente`, `cpf_paciente`, `data_nasc_paciente`, `telefone_paciente`, `endereco_paciente`, `bairro_paciente`, `cidade_paciente`, `uf_paciente`, `peso_paciente`, `altura_paciente`, `imc_paciente`)
VALUES
('Tadeu Espindola Palermo', '045.448.379-10', '1985-09-16', '(61) 9 8647-3913', 'Area Especial 21/24 - Lotes 01/03 - Apto. 415 - Ed. Bello Oeste', 'Setor Oeste',  'Gama', 'DF', 80.00, 1.78, 24.70);

INSERT INTO `paciente` (`nome_paciente`, `cpf_paciente`, `data_nasc_paciente`, `telefone_paciente`, `endereco_paciente`, `bairro_paciente`, `cidade_paciente`, `uf_paciente`, `peso_paciente`, `altura_paciente`, `imc_paciente`)
VALUES
('Ana Paula Espindola Palermo', '006.372.921-03', '1984-04-28', '(61) 9 8449-5550', 'Area Especial 21/24 - Lotes 01/03 - Apto. 415 - Ed. Bello Oeste', 'Setor Oeste',  'Gama', 'DF', 65.00, 1.75, 21.20);

-- -----------------------------------------------------
-- Inserção de registros na tabela especialidade
-- -----------------------------------------------------
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Odontologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Pediatria');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Cardiologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Dermatologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Radiologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Cirurgia Plastica');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Hematologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Oncologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Obstetricia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Ginecologia');

-- -----------------------------------------------------
-- Inserção de registros na tabela medico
-- -----------------------------------------------------
INSERT INTO `medico` (`nome_medico`, `crm_medico`, `data_nasc_medico`, `especialidade_id_especialidade`)
VALUES
('Pedro Henrique de Souza', '95624725', '1985-09-16', 5);

INSERT INTO `medico` (`nome_medico`, `crm_medico`, `data_nasc_medico`, `especialidade_id_especialidade`)
VALUES
('Fernando Costa', '15726598', '1986-10-17', 10);

INSERT INTO `medico` (`nome_medico`, `crm_medico`, `data_nasc_medico`, `especialidade_id_especialidade`)
VALUES
('Drauzio Varela', '22685478', '1988-11-18', 3);

-- -----------------------------------------------------
-- Inserção de registros na tabela consulta
-- -----------------------------------------------------
INSERT INTO `consulta` (`data_consulta`, `hora_consulta`, `valor_consulta`, `observacao_consulta`,
`paciente_id_paciente`, `medico_id_medico`, `medico_especialidade_id_especialidade`)
VALUES
('2018-05-31', '19:55:00', 155.00, 'Reagendar consulta!', 1, 2, 10);

INSERT INTO `consulta` (`data_consulta`, `hora_consulta`, `valor_consulta`, `observacao_consulta`,
`paciente_id_paciente`, `medico_id_medico`, `medico_especialidade_id_especialidade`)
VALUES
('2019-01-15', '14:24:55', 67.00, 'Paciente medicado!', 2, 3, 3);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;