-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2022 às 15:49
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
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dataLogin` datetime NOT NULL,
  `dataLogout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `username`, `dataLogin`, `dataLogout`) VALUES
(5, 'marinisx', '2022-05-26 18:40:41', '2022-05-26 18:40:37'),
(14, 'alefernandesx', '2022-05-26 16:51:06', '2022-05-26 16:52:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `numero` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`numero`, `tipo`, `username`, `valor`) VALUES
('14096138953816577', 'Poupança', 'marinisx', '0'),
('39541909957394900', 'Corrente', 'daniflor', '1256'),
('6618382512150551', 'Poupança', 'daniflor', '0'),
('66243375889231089', 'Poupança', 'alefernandesx', '100'),
('75292671726841374', 'Corrente', 'alefernandesx', '3456'),
('97305880489929626', 'Corrente', 'marinisx', '345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `extrato`
--

CREATE TABLE `extrato` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `tipopagamento` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `extrato`
--

INSERT INTO `extrato` (`id`, `tipo`, `valor`, `conta`, `tipopagamento`, `descricao`, `data`) VALUES
(1, 'Pagamento', '120.00', '97305880489929626', 'Pix', 'lanche', '2022-05-26 22:57:16'),
(2, 'Pagamento', '50.00', '97305880489929626', 'Boleto', 'pag boleto', '2022-05-26 23:04:59'),
(3, 'Pagamento', '45.00', '75292671726841374', 'Pix', 'pag', '2022-05-26 23:50:00'),
(4, 'Desconto', '20.45', '97305880489929626', 'Débito', 'venda', '2022-05-27 00:48:16'),
(5, 'Pagamento', '5.99', '97305880489929626', 'Pix', 'pão', '2022-05-27 00:51:52'),
(6, 'Saque', '56.78', '97305880489929626', 'Pix', 'Camiseta', '2022-05-27 00:53:17'),
(7, 'Pagamento', '14.99', '97305880489929626', 'Boleto', 'teste', '2022-05-27 00:56:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`username`, `nome`, `senha`) VALUES
('alefernandesx', 'Alessandro Fernandes', '202cb962ac59075b964b07152d234b70'),
('marinisx', 'Marina Fernandes', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `conta_ibfk_1` (`username`);

--
-- Índices para tabela `extrato`
--
ALTER TABLE `extrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extrato_ibfk_1` (`conta`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `extrato`
--
ALTER TABLE `extrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `extrato`
--
ALTER TABLE `extrato`
  ADD CONSTRAINT `extrato_ibfk_1` FOREIGN KEY (`conta`) REFERENCES `conta` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
