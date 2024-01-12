-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jan-2024 às 22:54
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `localidade`
--

CREATE TABLE IF NOT EXISTS `localidade` (
  `idCep` int(11) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`idCep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idPed` int(11) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `situacao` enum('E','V','D') NOT NULL,
  PRIMARY KEY (`idPed`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProd` varchar(200) NOT NULL,
  `qntProd` int(11) NOT NULL,
  `dataProd` date NOT NULL,
  `precoProd` decimal(10,2) NOT NULL,
  `fotosProd` int(11) DEFAULT NULL,
  `idPed` int(11) NOT NULL,
  `qntVendas` int(11) NOT NULL,
  PRIMARY KEY (`idProd`),
  KEY `idPed` (`idPed`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
  `nvl_usu` enum('A','F','C') DEFAULT 'C',
  PRIMARY KEY (`idUsu`),
  KEY `idCep` (`idCep`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idPed`) REFERENCES `pedido` (`idPed`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idCep`) REFERENCES `localidade` (`idCep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
