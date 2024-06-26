-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2024 às 14:24
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
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_aval` int(11) NOT NULL,
  `avaliacao` int(1) NOT NULL,
  `desc_aval` varchar(100) NOT NULL,
  `data_aval` date NOT NULL,
  `preco_aval` decimal(5,2) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `deslikes` int(11) NOT NULL DEFAULT 0,
  `idUsu` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idCarrinho`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nome_cat` varchar(45) NOT NULL,
  `img_cat` varchar(300) DEFAULT 'sem_foto.png',
  `desc_cat` varchar(100) DEFAULT NULL,
  `qnt_vis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome_cat`, `img_cat`, `desc_cat`, `qnt_vis`) VALUES
(1, 'Sementes', 'sem_foto.png', 'Sementes de qualidade para agricultura, jardinagem e conservação.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cria`
--

CREATE TABLE `cria` (
  `idCria` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cria`
--

INSERT INTO `cria` (`idCria`, `idUsu`, `idProduto`) VALUES
(1, 1, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`idFavoritos`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `CEP` int(11) NOT NULL,
  `Logradouro` varchar(45) NOT NULL,
  `Bairro` varchar(45) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `UF` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`CEP`, `Logradouro`, `Bairro`, `Cidade`, `UF`) VALUES
(26311430, 'Rua Maria Alves', 'Nossa Senhora de Fátima', 'Queimados', 'RJ'),
(26376100, 'Rua Camboatá', 'Cidade Jardim Cabuçu', 'Queimados', 'RJ'),
(27524302, 'Rua das Andorinhas', 'Morada da Felicidade', 'Resende', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `npedido`
--

CREATE TABLE `npedido` (
  `situacao` enum('0','1') NOT NULL,
  `data_criacao` date NOT NULL,
  `qnt_pedida` int(11) NOT NULL,
  `tipoqnt_ped` enum('kg','unid') NOT NULL,
  `idNPedido` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idUsuComprador` int(11) NOT NULL,
  `idUsuVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `idPergunta` int(11) NOT NULL,
  `desc_perg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome_prod` varchar(100) NOT NULL,
  `qnt_prod_estoque` int(11) NOT NULL,
  `data_criacao_prod` date NOT NULL,
  `preco_prod` decimal(5,2) NOT NULL,
  `fotos_prod` varchar(100) NOT NULL DEFAULT 'sem_foto.png',
  `qnt_vendas` int(11) NOT NULL,
  `promocao` int(11) DEFAULT NULL,
  `parcela` int(11) DEFAULT NULL,
  `idCarrinho` int(11) NOT NULL,
  `idFavoritos` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome_prod`, `qnt_prod_estoque`, `data_criacao_prod`, `preco_prod`, `fotos_prod`, `qnt_vendas`, `promocao`, `parcela`, `idCarrinho`, `idFavoritos`, `idCategoria`) VALUES
(2, 'Maçã', 3, '2024-04-08', '12.00', 'sem_foto.png', 5, 2, 3, 1, 1, 1),
(3, 'Leite', 5, '2024-04-03', '144.00', 'leite.jpg', 10, NULL, NULL, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_pergunta`
--

CREATE TABLE `produto_has_pergunta` (
  `idProduto` int(11) NOT NULL,
  `idPergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `idSeguido` int(11) NOT NULL,
  `qntSeguidor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `seguidores`
--

INSERT INTO `seguidores` (`idSeguido`, `qntSeguidor`) VALUES
(1, NULL),
(2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nome_usu` varchar(50) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '1',
  `data_criacao` date NOT NULL,
  `email_usu` varchar(100) NOT NULL,
  `CPF_usu` varchar(13) NOT NULL,
  `senha_usu` varchar(45) NOT NULL,
  `tel_usu` varchar(45) NOT NULL,
  `fotos_usu` varchar(45) DEFAULT NULL,
  `premium` enum('0','1') NOT NULL,
  `NR` varchar(45) NOT NULL,
  `comp` varchar(45) NOT NULL,
  `TCIR` enum('CPF','CNPJ') NOT NULL,
  `NRCIR` varchar(45) NOT NULL,
  `nvl_usu` enum('A','F','C') NOT NULL DEFAULT 'C',
  `Local_CEP` int(11) NOT NULL,
  `idCarrinho` int(11) NOT NULL,
  `idFavoritos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nome_usu`, `ativo`, `data_criacao`, `email_usu`, `CPF_usu`, `senha_usu`, `tel_usu`, `fotos_usu`, `premium`, `NR`, `comp`, `TCIR`, `NRCIR`, `nvl_usu`, `Local_CEP`, `idCarrinho`, `idFavoritos`) VALUES
(1, 'AdmMatin', '1', '2024-04-02', 'repositoriomatin@gmail.com', '99536218020', 'senhabraba1337#', '2198347-3957', NULL, '1', '209', 'apt 201', 'CNPJ', '26535178000120', 'C', 26311430, 1, 1),
(2, 'Lucas', '1', '2024-04-01', 'repositorioLucas@gmail.com', '30816990026', '123123', '2198347-3952', NULL, '1', '12', '123', 'CPF', '30816990026', 'F', 27524302, 2, 2),
(3, 'Osiris', '1', '2024-04-01', 'osirisiuri@gmail.com', '29673467722', 'osiris123', '212798-2165', NULL, '0', '12', '14', 'CPF', '29673467722', 'C', 26376100, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_has_pergunta`
--

CREATE TABLE `usuario_has_pergunta` (
  `Usuario_idUsu` int(11) NOT NULL,
  `Pergunta_idPergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_aval`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `cria`
--
ALTER TABLE `cria`
  ADD PRIMARY KEY (`idCria`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavoritos`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`CEP`);

--
-- Índices para tabela `npedido`
--
ALTER TABLE `npedido`
  ADD PRIMARY KEY (`idNPedido`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsuComprador`),
  ADD KEY `idUsuVendedor` (`idUsuVendedor`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idCarrinho` (`idCarrinho`),
  ADD KEY `idFavoritos` (`idFavoritos`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `produto_has_pergunta`
--
ALTER TABLE `produto_has_pergunta`
  ADD KEY `produto_has_pergunta_ibfk_1` (`idProduto`),
  ADD KEY `idPergunta` (`idPergunta`);

--
-- Índices para tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`idSeguido`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`,`Local_CEP`),
  ADD KEY `fk_Usuario_Local_idx` (`Local_CEP`),
  ADD KEY `idCarrinho` (`idCarrinho`),
  ADD KEY `idFavoritos` (`idFavoritos`);

--
-- Índices para tabela `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD PRIMARY KEY (`Usuario_idUsu`,`Pergunta_idPergunta`),
  ADD KEY `fk_Usuario_has_Pergunta_Pergunta1_idx` (`Pergunta_idPergunta`),
  ADD KEY `fk_Usuario_has_Pergunta_Usuario1_idx` (`Usuario_idUsu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_aval` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idCarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cria`
--
ALTER TABLE `cria`
  MODIFY `idCria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavoritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `CEP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27524303;

--
-- AUTO_INCREMENT de tabela `npedido`
--
ALTER TABLE `npedido`
  MODIFY `idNPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `idSeguido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Limitadores para a tabela `cria`
--
ALTER TABLE `cria`
  ADD CONSTRAINT `cria_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `cria_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Limitadores para a tabela `npedido`
--
ALTER TABLE `npedido`
  ADD CONSTRAINT `npedido_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `npedido_ibfk_2` FOREIGN KEY (`idUsuComprador`) REFERENCES `usuario` (`idUsu`),
  ADD CONSTRAINT `npedido_ibfk_3` FOREIGN KEY (`idUsuVendedor`) REFERENCES `usuario` (`idUsu`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idCarrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`idFavoritos`) REFERENCES `favoritos` (`idFavoritos`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Limitadores para a tabela `produto_has_pergunta`
--
ALTER TABLE `produto_has_pergunta`
  ADD CONSTRAINT `produto_has_pergunta_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `produto_has_pergunta_ibfk_2` FOREIGN KEY (`idPergunta`) REFERENCES `pergunta` (`idPergunta`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Local` FOREIGN KEY (`Local_CEP`) REFERENCES `local` (`CEP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idCarrinho`) REFERENCES `carrinho` (`idCarrinho`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idFavoritos`) REFERENCES `favoritos` (`idFavoritos`);

--
-- Limitadores para a tabela `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD CONSTRAINT `fk_Usuario_has_Pergunta_Pergunta1` FOREIGN KEY (`Pergunta_idPergunta`) REFERENCES `pergunta` (`idPergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Pergunta_Usuario1` FOREIGN KEY (`Usuario_idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
