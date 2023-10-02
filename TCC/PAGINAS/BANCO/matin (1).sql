-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2023 às 15:36
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `matin`
--
CREATE DATABASE IF NOT EXISTS `matin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `matin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `localidade`
--

CREATE TABLE IF NOT EXISTS `localidade` (
  `idCep` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`idCep`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `localidade`
--

INSERT INTO `localidade` (`idCep`, `logradouro`, `bairro`, `cidade`, `uf`) VALUES
(2, 'Rua Paula Freitas', 'Copacabana', 'Rio De Janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsu` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsu` varchar(100) NOT NULL,
  `ativo` enum('0','1') NOT NULL,
  `dataCriacao` date NOT NULL,
  `emailUsu` varchar(200) NOT NULL,
  `TCIR` enum('CPF','CNPJ') NOT NULL,
  `NRCIR` bigint(11) NOT NULL,
  `senhaUsu` varchar(200) NOT NULL,
  `telUsu` varchar(100) NOT NULL,
  `idCep` int(11) NOT NULL,
  `fotosUsu` varchar(300) DEFAULT NULL,
  `premium` enum('0','1') NOT NULL,
  `NR` varchar(200) NOT NULL,
  `comp` varchar(200) NOT NULL,
  PRIMARY KEY (`idUsu`),
  KEY `idCep` (`idCep`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nomeUsu`, `ativo`, `dataCriacao`, `emailUsu`, `TCIR`, `NRCIR`, `senhaUsu`, `telUsu`, `idCep`, `fotosUsu`, `premium`, `NR`, `comp`) VALUES
(2, 'Yuri', '1', '2023-09-26', 'yuri@gmail.com', 'CNPJ', 19283904091, 'yuri123123', '21193850125', 2, NULL, '1', '402', '---');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idCep`) REFERENCES `localidade` (`idCep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
