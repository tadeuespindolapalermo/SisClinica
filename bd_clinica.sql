-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 13, 2014 as 03:42 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `clinica`
--
CREATE DATABASE `clinica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinica`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `data_consulta` date NOT NULL,
  `hora_consulta` varchar(5) NOT NULL,
  `valor_consulta` decimal(5,2) NOT NULL,
  `observacao_consulta` varchar(200) NOT NULL,
  `medico_id_medico` int(11) NOT NULL,
  `paciente_id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_consulta`,`medico_id_medico`,`paciente_id_paciente`),
  KEY `fk_consulta_medico1_idx` (`medico_id_medico`),
  KEY `fk_consulta_paciente1_idx` (`paciente_id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
  `id_especialidade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_especialidade` varchar(60) NOT NULL,
  PRIMARY KEY (`id_especialidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Odontologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Pediatria');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Cardiologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Dermatologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Radiologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Cirurgia Plástica');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Hematologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Oncologia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Obstetrícia');
INSERT INTO `especialidade` (`descricao_especialidade`) VALUES ('Ginecologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `nome_medico` varchar(40) NOT NULL,
  `data_nasc_medico` date NOT NULL,
  `crm_medico` int(8) NOT NULL,
  `especialidade_id_especialidade` int(11) NOT NULL,
  PRIMARY KEY (`id_medico`,`especialidade_id_especialidade`),
  KEY `fk_medico_especialidade1_idx` (`especialidade_id_especialidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(40) NOT NULL,
  `cpf_paciente` varchar(14) NOT NULL,
  `data_nasc_paciente` date NOT NULL,
  `telefone_paciente` varchar(16) NOT NULL,
  `endereco_paciente` varchar(80) NOT NULL,
  `bairro_paciente` varchar(40) NOT NULL,
  `cidade_paciente` varchar(40) NOT NULL,
  `uf_paciente` varchar(2) NOT NULL,
  `peso_paciente` decimal(5,2) NOT NULL,
  `altura_paciente` decimal(5,2) NOT NULL,
  `imc_paciente` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`nome_paciente`, `cpf_paciente`, `data_nasc_paciente`, `telefone_paciente`, `endereco_paciente`, `bairro_paciente`, `cidade_paciente`, `uf_paciente`, `peso_paciente`, `altura_paciente`, `imc_paciente`) VALUES
('Tadeu Espíndola Palermo', '045.448.379-10', '1985-09-16', '(61) 9 8647-3913', 'Área Especial 21/24 - Lotes 01/03 - Apto. 415 - Ed. Bello Oeste', 'Setor Oeste',  'Gama', 'DF', 80.00, 1.78, 24.70);

INSERT INTO `paciente` (`nome_paciente`, `cpf_paciente`, `data_nasc_paciente`, `telefone_paciente`, `endereco_paciente`, `bairro_paciente`, `cidade_paciente`, `uf_paciente`, `peso_paciente`, `altura_paciente`, `imc_paciente`) VALUES
('Ana Paula Espíndola Palermo', '006.372.921-03', '1984-04-28', '(61) 9 8449-5550', 'Área Especial 21/24 - Lotes 01/03 - Apto. 415 - Ed. Bello Oeste', 'Setor Oeste',  'Gama', 'DF', 65.00, 1.75, 21.20);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_medico1` FOREIGN KEY (`medico_id_medico`) REFERENCES `medico` (`id_medico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_paciente1` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_especialidade1` FOREIGN KEY (`especialidade_id_especialidade`) REFERENCES `especialidade` (`id_especialidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;
