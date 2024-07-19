-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/07/2024 às 20:54
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `avaliacao`
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
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`idCarrinho`, `idUsu`, `idProduto`) VALUES
(4, 8, 6),
(5, 1, 3),
(6, 8, 2),
(7, 8, 3),
(8, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nome_cat` varchar(45) NOT NULL,
  `img_cat` varchar(300) DEFAULT 'sem_foto.png',
  `desc_cat` varchar(100) DEFAULT NULL,
  `qnt_vis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nome_cat`, `img_cat`, `desc_cat`, `qnt_vis`) VALUES
(1, 'Sementes', 'sementes.png', 'Sementes de qualidade para agricultura, jardinagem e conservação.', 176),
(2, 'Laticínios ', 'laticinios.png', 'Laticinios novos', 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cria`
--

CREATE TABLE `cria` (
  `idCria` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cria`
--

INSERT INTO `cria` (`idCria`, `idUsu`, `idProduto`) VALUES
(1, 1, 2),
(4, 1, 2),
(5, 2, 2),
(6, 8, 7),
(7, 9, 5),
(8, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `favoritos`
--

INSERT INTO `favoritos` (`idFavoritos`, `idProduto`, `idUsu`) VALUES
(4, 3, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `idFoto` int(11) NOT NULL,
  `fotoNome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `local`
--

CREATE TABLE `local` (
  `CEP` int(11) NOT NULL,
  `Logradouro` varchar(45) NOT NULL,
  `Bairro` varchar(45) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `UF` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `local`
--

INSERT INTO `local` (`CEP`, `Logradouro`, `Bairro`, `Cidade`, `UF`) VALUES
(22745040, 'Rua Guanhães', 'Freguesia (Jacarepaguá)', 'Rio de Janeiro', 'RJ'),
(26083160, 'Rua Abirú', 'Rodilândia', 'Nova Iguaçu', 'RJ'),
(26311430, 'Rua Maria Alves', 'Nossa Senhora de Fátima', 'Queimados', 'RJ'),
(26376100, 'Rua Camboatá', 'Cidade Jardim Cabuçu', 'Queimados', 'RJ'),
(27524302, 'Rua das Andorinhas', 'Morada da Felicidade', 'Resende', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `npedido`
--

CREATE TABLE `npedido` (
  `idNPedido` int(11) NOT NULL,
  `situacao` enum('CF','CA','CNR','A') NOT NULL,
  `data_criacao` date NOT NULL,
  `qnt_pedida` int(11) NOT NULL,
  `tipoqnt_ped` enum('kg','unid') NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idUsuComprador` int(11) NOT NULL,
  `idUsuVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `npedido`
--

INSERT INTO `npedido` (`idNPedido`, `situacao`, `data_criacao`, `qnt_pedida`, `tipoqnt_ped`, `idProduto`, `idUsuComprador`, `idUsuVendedor`) VALUES
(1, 'CF', '2024-07-02', 3, 'kg', 3, 1, 2),
(2, 'CA', '2024-07-03', 13, 'unid', 2, 8, 1),
(13, 'CF', '2024-07-01', 12, 'unid', 2, 2, 8),
(14, 'CNR', '2023-09-02', 154, 'unid', 2, 2, 1),
(15, 'A', '2024-07-02', 1565, 'kg', 3, 3, 8),
(16, 'CF', '2024-07-01', 13, 'unid', 3, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `idPergunta` int(11) NOT NULL,
  `desc_perg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pergunta`
--

INSERT INTO `pergunta` (`idPergunta`, `desc_perg`) VALUES
(1, 'Nao gostei do produto!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
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
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome_prod`, `qnt_prod_estoque`, `data_criacao_prod`, `preco_prod`, `fotos_prod`, `qnt_vendas`, `promocao`, `parcela`, `idCategoria`) VALUES
(2, 'Maçã', 3, '2024-04-08', 12.00, 'sem_foto.png', 5, 2, 3, 1),
(3, 'Leite', 5, '2024-04-03', 144.00, 'leite.jpg', 10, NULL, NULL, 1),
(5, 'Leite UHT Integral', 13, '2024-07-01', 13.90, 'Leite-UHT-Integral.png', 13, 19, 2, 2),
(6, 'Leite Condensado', 4, '2024-07-01', 19.20, 'leite_condensado.jpeg', 14, NULL, NULL, 2),
(7, 'Carne Bovina', 41, '2024-07-22', 31.20, 'carne.png', 900, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_has_foto`
--

CREATE TABLE `produto_has_foto` (
  `idProd` int(11) NOT NULL,
  `idFoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `idSeguido` int(11) NOT NULL,
  `qntSeguidor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `seguidores`
--

INSERT INTO `seguidores` (`idSeguido`, `qntSeguidor`) VALUES
(1, NULL),
(2, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nome_usu` varchar(50) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '1',
  `data_criacao` date NOT NULL,
  `email_usu` varchar(100) NOT NULL,
  `senha_usu` varchar(45) NOT NULL,
  `tel_usu` varchar(45) NOT NULL,
  `fotos_usu` varchar(45) NOT NULL DEFAULT 'sem_foto.png',
  `premium` enum('0','1') NOT NULL,
  `NR` varchar(45) NOT NULL,
  `comp` varchar(45) NOT NULL,
  `TCIR` enum('CPF','CNPJ') NOT NULL,
  `NRCIR` varchar(45) NOT NULL,
  `nvl_usu` enum('A','F','C') NOT NULL DEFAULT 'C',
  `Local_CEP` int(11) NOT NULL,
  `tipoLocal` enum('casa','trabalho') NOT NULL,
  `infoAddLocal` varchar(100) NOT NULL,
  `qnt_vendas_usuario` int(11) NOT NULL DEFAULT 0,
  `visto_por_ultimo` datetime DEFAULT NULL,
  `usu_online` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nome_usu`, `ativo`, `data_criacao`, `email_usu`, `senha_usu`, `tel_usu`, `fotos_usu`, `premium`, `NR`, `comp`, `TCIR`, `NRCIR`, `nvl_usu`, `Local_CEP`, `tipoLocal`, `infoAddLocal`, `qnt_vendas_usuario`, `visto_por_ultimo`, `usu_online`) VALUES
(1, 'AdmMatin', '1', '2024-04-02', 'repositoriomatin@gmail.com', 'senhabraba1337#', '2198347-3957', 'matinADM.png', '1', '209', 'apt 201', 'CNPJ', '26535178000120', 'A', 26311430, 'casa', '', 0, NULL, 0),
(2, 'Lucas', '1', '2024-04-01', 'repositorioLucas@gmail.com', '123123', '2198347-3952', 'foto-lucas.png', '1', '12', '123', 'CPF', '30816990026', 'F', 27524302, 'casa', '', 0, '2024-07-11 23:44:44', 0),
(3, 'Osiris', '1', '2024-04-01', 'osirisiuri@gmail.com', 'osiris123', '212798-2165', 'sem_foto.png', '0', '12', '14', 'CPF', '29673467722', 'C', 26376100, 'casa', '', 0, NULL, 0),
(8, 'Yuri Esteves', '1', '2024-07-03', 'yhureei@gmail.com', '123123', '21 58192-3419', 'sem_foto.png', '0', 'S/N', 'apto 12', 'CPF', '12930192039', 'C', 26083160, 'casa', 'Em frente ao Supermercado Atacadão', 10000, '2024-07-11 23:56:13', 0),
(9, 'Erick', '1', '2024-07-04', 'erick@gmail.com', '123123', '2198782-2663', 'sem_foto.png', '1', '13', 'apto 22', 'CPF', '80756463041', 'A', 26083160, 'casa', '', 0, NULL, 0),
(10, 'Teste 04', '1', '2024-07-12', 'testelegalzao@gmail.com', '123123', '14 37418-4317', 'sem_foto.png', '0', 'S/N', 'apto 15', 'CPF', '12437148712', 'C', 22745040, 'casa', 'Perto do Shopping', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_has_pergunta`
--

CREATE TABLE `usuario_has_pergunta` (
  `Usuario_idUsu` int(11) NOT NULL,
  `Pergunta_idPergunta` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `sitPerg` enum('A','R','NR') NOT NULL,
  `dataPerg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario_has_pergunta`
--

INSERT INTO `usuario_has_pergunta` (`Usuario_idUsu`, `Pergunta_idPergunta`, `idProduto`, `id_vendedor`, `sitPerg`, `dataPerg`) VALUES
(3, 1, 2, 2, 'NR', '2024-07-02');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_aval`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `cria`
--
ALTER TABLE `cria`
  ADD PRIMARY KEY (`idCria`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavoritos`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsu`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idFoto`);

--
-- Índices de tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`CEP`);

--
-- Índices de tabela `npedido`
--
ALTER TABLE `npedido`
  ADD PRIMARY KEY (`idNPedido`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idUsu` (`idUsuComprador`),
  ADD KEY `idUsuVendedor` (`idUsuVendedor`);

--
-- Índices de tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices de tabela `produto_has_foto`
--
ALTER TABLE `produto_has_foto`
  ADD KEY `idProd` (`idProd`),
  ADD KEY `idFoto` (`idFoto`);

--
-- Índices de tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`idSeguido`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`,`Local_CEP`),
  ADD KEY `fk_Usuario_Local_idx` (`Local_CEP`);

--
-- Índices de tabela `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD PRIMARY KEY (`Usuario_idUsu`,`Pergunta_idPergunta`),
  ADD KEY `fk_Usuario_has_Pergunta_Pergunta1_idx` (`Pergunta_idPergunta`),
  ADD KEY `fk_Usuario_has_Pergunta_Usuario1_idx` (`Usuario_idUsu`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `idProduto` (`idProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `idCarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cria`
--
ALTER TABLE `cria`
  MODIFY `idCria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavoritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `CEP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27524303;

--
-- AUTO_INCREMENT de tabela `npedido`
--
ALTER TABLE `npedido`
  MODIFY `idNPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `idSeguido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Restrições para tabelas `cria`
--
ALTER TABLE `cria`
  ADD CONSTRAINT `cria_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `cria_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Restrições para tabelas `npedido`
--
ALTER TABLE `npedido`
  ADD CONSTRAINT `npedido_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `npedido_ibfk_2` FOREIGN KEY (`idUsuComprador`) REFERENCES `usuario` (`idUsu`),
  ADD CONSTRAINT `npedido_ibfk_3` FOREIGN KEY (`idUsuVendedor`) REFERENCES `usuario` (`idUsu`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Restrições para tabelas `produto_has_foto`
--
ALTER TABLE `produto_has_foto`
  ADD CONSTRAINT `produto_has_foto_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `produto_has_foto_ibfk_2` FOREIGN KEY (`idFoto`) REFERENCES `fotos` (`idFoto`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Local` FOREIGN KEY (`Local_CEP`) REFERENCES `local` (`CEP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD CONSTRAINT `fk_Usuario_has_Pergunta_Pergunta1` FOREIGN KEY (`Pergunta_idPergunta`) REFERENCES `pergunta` (`idPergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Pergunta_Usuario1` FOREIGN KEY (`Usuario_idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_has_pergunta_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `usuario` (`idUsu`),
  ADD CONSTRAINT `usuario_has_pergunta_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
