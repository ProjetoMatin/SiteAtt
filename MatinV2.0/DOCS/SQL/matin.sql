-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Fev-2024 às 23:20
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nome_cat` varchar(30) NOT NULL,
  `img_cat` varchar(300) NOT NULL DEFAULT 'sem_foto.png',
  `desc_cat` varchar(100) NOT NULL,
  `qntVis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nome_cat`, `img_cat`, `desc_cat`, `qntVis`) VALUES
(1, 'Sementes', 'semente.jpeg', 'Aqui você pode encontrar produtos como sementes de girassol e sementes de abóbora.', 1),
(2, 'Frutas e Vegetais', 'maca.jpeg', 'Aqui você pode encontrar frutas frescas, frutas secas, vegetais frescos, vegetais congelados', 7),
(3, 'Laticínios ', 'leite.jpg', 'Aqui você pode encontrar Leite ou queijos.', 12),
(4, 'Produtos Naturais', 'carne.png', 'Aqui você pode encontrar produtos como carne, peixes', 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `id_cat_prod` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id_cat_prod`, `id_cat`, `id_prod`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(32) NOT NULL,
  `qnt_prod` int(11) NOT NULL,
  `data_prod` date NOT NULL,
  `preco_prod` decimal(10,2) NOT NULL,
  `fotos_prod` varchar(300) NOT NULL DEFAULT 'sem_foto.png',
  `id_ped` int(11) NOT NULL,
  `qnt_vendas` int(11) NOT NULL,
  `promocao` int(11) DEFAULT NULL,
  `parcela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `nome_prod`, `qnt_prod`, `data_prod`, `preco_prod`, `fotos_prod`, `id_ped`, `qnt_vendas`, `promocao`, `parcela`) VALUES
(1, 'Maçã', 7, '2024-01-13', '13.99', 'maca.jpeg', 13, 18, 12, NULL),
(3, 'Banana', 12, '2024-01-13', '50.00', 'sem_foto.png', 15, 14, 14, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nomeUsu` varchar(100) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '1',
  `dataCriacao` date NOT NULL,
  `emailUsu` varchar(200) NOT NULL,
  `TCIR` enum('CPF','CNPJ') NOT NULL,
  `NRCIR` varchar(30) NOT NULL,
  `senhaUsu` varchar(200) NOT NULL,
  `telUsu` varchar(100) NOT NULL,
  `idCep` int(11) NOT NULL,
  `fotosUsu` varchar(300) DEFAULT NULL,
  `premium` enum('0','1') NOT NULL,
  `NR` varchar(200) NOT NULL,
  `comp` varchar(200) DEFAULT NULL,
  `nvl_usu` enum('A','F','C') DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nomeUsu`, `ativo`, `dataCriacao`, `emailUsu`, `TCIR`, `NRCIR`, `senhaUsu`, `telUsu`, `idCep`, `fotosUsu`, `premium`, `NR`, `comp`, `nvl_usu`) VALUES
(38, 'Yhureei', '1', '2024-01-12', 'yhureei@gmail.com', 'CNPJ', '12424353512', 'yh123', '19203928157', 12345, NULL, '1', '112', 'apt12', 'A'),
(49, 'testebrabo', '1', '2024-01-15', 'testebrabo@gmail.com', 'CNPJ', '12.312.312/3123-12', 'senhalegal123', '(12) 32132-3211', 12122, NULL, '0', '98', 'apt 12', 'C'),
(50, 'Yuri Esteves', '1', '2024-02-24', 'yuri@gmail.ocm', 'CNPJ', '12.312.831/8231-19', '12312312312', '(12) 31231-2312', 12312, NULL, '0', '1231', '1212', 'C'),
(52, 'teste', '1', '2024-02-24', 'teste5@gmail.com', 'CNPJ', '12.312.321/3123-12', '123123123', '(12) 31231-2312', 21610, NULL, '0', '12', '21', 'C'),
(53, 'teste41', '1', '2024-02-24', 'teste41@gmail.com', 'CNPJ', '12.319.231/9231-23', '21391123', '(12) 03021-3902', 21610, NULL, '0', '12', '434', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuprod`
--

CREATE TABLE `usuprod` (
  `idUsuProd` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuprod`
--

INSERT INTO `usuprod` (`idUsuProd`, `idUsu`, `idProd`) VALUES
(1, 38, 1),
(2, 38, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Índices para tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD PRIMARY KEY (`id_cat_prod`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD KEY `idCep` (`idCep`);

--
-- Índices para tabela `usuprod`
--
ALTER TABLE `usuprod`
  ADD PRIMARY KEY (`idUsuProd`),
  ADD KEY `idProd` (`idProd`),
  ADD KEY `idUsu` (`idUsu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  MODIFY `id_cat_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `usuprod`
--
ALTER TABLE `usuprod`
  MODIFY `idUsuProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD CONSTRAINT `categoria_produto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `categoria_produto_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`);

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
