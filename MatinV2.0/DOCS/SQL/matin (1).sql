-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jan-2024 às 23:16
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(32) NOT NULL,
  `qnt_prod` int(11) NOT NULL,
  `data_prod` date NOT NULL,
  `preco_prod` decimal(10,2) NOT NULL,
  `fotos_prod` varchar(300) NOT NULL DEFAULT 'sem_foto.png',
  `id_ped` int(11) NOT NULL,
  `qnt_vendas` int(11) NOT NULL,
  `promocao` int(11) DEFAULT NULL,
  `parcela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `nome_prod`, `qnt_prod`, `data_prod`, `preco_prod`, `fotos_prod`, `id_ped`, `qnt_vendas`, `promocao`, `parcela`) VALUES
(1, 'Maçã', 7, '2024-01-13', '13.99', 'maca.jpeg', 13, 18, NULL, NULL),
(3, 'Banana', 12, '2024-01-13', '19.20', 'sem_foto.png', 15, 14, 14, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nomeUsu`, `ativo`, `dataCriacao`, `emailUsu`, `TCIR`, `NRCIR`, `senhaUsu`, `telUsu`, `idCep`, `fotosUsu`, `premium`, `NR`, `comp`, `nvl_usu`) VALUES
(38, 'Yhureei', '1', '2024-01-12', 'yhureei@gmail.com', 'CNPJ', 12424353512, 'yh123', '19203928157', 12345, NULL, '1', '112', 'apt12', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuprod`
--

CREATE TABLE IF NOT EXISTS `usuprod` (
  `idUsuProd` int(11) NOT NULL AUTO_INCREMENT,
  `idUsu` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  PRIMARY KEY (`idUsuProd`),
  KEY `idProd` (`idProd`),
  KEY `idUsu` (`idUsu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuprod`
--

INSERT INTO `usuprod` (`idUsuProd`, `idUsu`, `idProd`) VALUES
(1, 38, 1),
(2, 38, 3);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuprod`
--
ALTER TABLE `usuprod`
  ADD CONSTRAINT `usuprod_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `produtos` (`id_prod`),
  ADD CONSTRAINT `usuprod_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
