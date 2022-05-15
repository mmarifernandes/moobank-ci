-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2022 às 21:55
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(2, 'Ação'),
(3, 'RPG'),
(4, 'Simulação'),
(5, 'Mundo Aberto'),
(6, 'Estratégia'),
(7, 'Esportes'),
(8, 'Puzzle'),
(9, 'Aventura'),
(10, 'FPS'),
(11, 'MOBA'),
(12, 'MMORPG'),
(13, 'Corrida'),
(14, 'Luta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `Nome` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`Nome`, `Cidade`, `Email`) VALUES
('Daniele Fiori', 'Rio Grande', 'aa@aa.com'),
('Alessandro Silva', 'Rio Grande', 'alessandro@silva.com'),
('Marina Fernandes', 'Rio Grande', 'marinafernandess103@gmail.com'),
('Pedro Machado', 'Rio Grande', 'pedro@pedro.com'),
('Roberto Carlos', 'São Paulo', 'roberto@carlos.com'),
('Rodrigo Hilbert', 'Porto Alegre', 'rodrigo1@rodrigo.com'),
('Teste da Silva Junior', 'Pernambuco', 'teste@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes-produtos`
--

CREATE TABLE `clientes-produtos` (
  `idorder` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes-produtos`
--

INSERT INTO `clientes-produtos` (`idorder`, `email`, `idproduto`, `quantidade`) VALUES
(71, 'alessandro@silva.com', 9, 1),
(73, 'alessandro@silva.com', 7, 1),
(74, 'marinafernandess103@gmail.com', 11, 1),
(76, 'alessandro@silva.com', 13, 3),
(77, 'marinafernandess103@gmail.com', 12, 2),
(79, 'rodrigo1@rodrigo.com', 17, 3),
(80, 'rodrigo1@rodrigo.com', 16, 1),
(81, 'aa@aa.com', 15, 1),
(82, 'rodrigo1@rodrigo.com', 18, 2),
(83, 'aa@aa.com', 6, 0),
(84, 'roberto@carlos.com', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `qnt` int(11) NOT NULL,
  `preco` decimal(11,0) NOT NULL,
  `console` varchar(100) DEFAULT NULL,
  `imagem` varchar(535) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `categoria`, `qnt`, `preco`, `console`, `imagem`) VALUES
(6, 'Cadeira Gamer', 'Móveis', NULL, 0, '3500', NULL, 'https://lojagoldentec.vteximg.com.br/arquivos/ids/159893-600-600/cadeira-gamer-goldentec-gt-space-com-iluminac-o-rgb-001-min.jpg?v=637844191841630000'),
(7, 'God Of War', 'Games', '2', 28, '127', 'PS5', 'https://cdn.awsli.com.br/600x450/241/241991/produto/122597331/8d1a298293.jpg'),
(9, 'The Last Of Us', 'Games', '2', 697, '150', 'PS5', 'https://cdn.awsli.com.br/1000x1000/1724/1724432/produto/92891976/the-last-of-us-part-ii-para-ps5-midia-digital-0e8d62fa.jpg'),
(10, 'Camiseta Gamer', 'Roupa', NULL, 60, '45', NULL, 'https://img.elo7.com.br/product/zoom/14CAFDA/camiseta-gamer-decoracao-aniversario.jpg'),
(11, 'The Sims 4', 'Games', '4', 49, '200', 'PC', 'https://cf.shopee.com.br/file/af9fb47f0bd3fd9a69b9afdd5cd1d025'),
(12, 'Caneca Unicórnio', 'Cozinha', NULL, 13, '55', NULL, 'https://a-static.mlcdn.com.br/618x463/caneca-engracada-bom-dia-e-o-caralho-unicornio-indelicado-minha-caneca/minhacaneca/1036c13p/87e5dee664b2eb43e5e8554932a08d0f.jpg'),
(13, 'Boné Cringe', 'Roupa', NULL, 343, '20', NULL, 'https://images-submarino.b2w.io/produtos/2754941106/imagens/bone-gamer/2754941114_1_large.jpg'),
(14, 'Shrek 2', 'Games', '2', 34, '67', 'PS2', 'https://cf.shopee.com.br/file/756b02d2371383374577b9b0ba2264a3'),
(15, 'Nintendo Switch', 'Console', NULL, 104, '1733', NULL, 'https://lojaxavier.com.br/wp-content/uploads/2022/05/4813901560_1.webp'),
(16, 'Funko Pop Batwoman', 'Colecionáveis', NULL, 133, '170', NULL, 'https://cdn.nerdstore.com.br/wp-content/uploads/2020/10/funko-bat-woman-dc-comics-01.jpg'),
(17, 'Copo Acrílico Bob Esponja', 'Cozinha', NULL, 42, '64', NULL, 'https://cdn.nerdstore.com.br/wp-content/uploads/2020/11/copo-acrilico-bob-esponja-01.jpg'),
(18, 'Minecraft', 'Games', '5', 65, '100', 'PS5', 'https://cf.shopee.com.br/file/76450e0bef6aba93624ec907c651ae73'),
(19, 'Super Smash Bros Ultimate', 'Games', '2', 45, '120', 'Nintendo Switch', 'https://a-static.mlcdn.com.br/1500x1500/revista-superposter-super-smash-bros-ultimate-europa/europa/506e08b8b7dc11eaaff54201ac18501e/bcb6c60834abc5addea15cb98a9c2a41.jpg'),
(20, 'The Sims 2', 'Games', '4', 456, '56', 'Nintendo Wii', 'https://cdn.awsli.com.br/300x300/138/138431/produto/81143980c10f9c4440.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Email`);

--
-- Índices para tabela `clientes-produtos`
--
ALTER TABLE `clientes-produtos`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `email` (`email`,`idproduto`),
  ADD KEY `email_2` (`email`,`idproduto`),
  ADD KEY `email_3` (`email`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `clientes-produtos`
--
ALTER TABLE `clientes-produtos`
  MODIFY `idorder` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes-produtos`
--
ALTER TABLE `clientes-produtos`
  ADD CONSTRAINT `1` FOREIGN KEY (`email`) REFERENCES `clientes` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `2` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
