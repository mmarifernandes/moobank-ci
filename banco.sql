-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 04:56
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
(5, 'marinisx', '2022-05-31 19:02:34', '2022-05-31 19:15:26'),
(14, 'alefernandesx', '2022-05-31 19:15:31', '2022-05-31 19:16:25'),
(17, 'jojo', '2022-06-01 21:51:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `numero` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`numero`, `tipo`, `username`) VALUES
('13873978576092534', 'Corrente', 'jojo'),
('14096138953816577', 'Poupança', 'marinisx'),
('39541909957394900', 'Corrente', 'daniflor'),
('6618382512150551', 'Poupança', 'daniflor'),
('66243375889231089', 'Poupança', 'alefernandesx'),
('75292671726841374', 'Corrente', 'alefernandesx'),
('81350688486233862', 'Corrente', 'teste'),
('91625886564214020', 'Poupança', 'jojo'),
('94896484934947941', 'Poupança', 'teste'),
('97305880489929626', 'Corrente', 'marinisx');

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
(1, 'Pagamento', '-120.00', '97305880489929626', 'Pix', 'lanche', '2022-05-26 22:57:16'),
(2, 'Pagamento', '-50.00', '97305880489929626', 'Boleto', 'pag boleto', '2022-05-26 23:04:59'),
(3, 'Pagamento', '45.00', '75292671726841374', 'Pix', 'pag', '2022-05-26 23:50:00'),
(4, 'Desconto', '20.45', '97305880489929626', 'Débito', 'venda', '2022-05-27 00:48:16'),
(5, 'Pagamento', '5.99', '97305880489929626', 'Pix', 'pão', '2022-05-27 00:51:52'),
(6, 'Saque', '56.78', '97305880489929626', 'Pix', 'Camiseta', '2022-05-27 00:53:17'),
(7, 'Pagamento', '14.99', '97305880489929626', 'Boleto', 'teste', '2022-05-27 00:56:12'),
(15, 'Depósito', '345.00', '97305880489929626', 'Boleto', 'depósito inicial', '2022-05-30 22:26:22'),
(19, 'Depósito Inicial', '100.00', '81350688486233862', 'Depósito', 'inicial', '2022-05-30 16:05:45'),
(21, 'Pagamento', '17.00', '81350688486233862', 'Boleto', 'teste', '2022-05-31 02:15:53'),
(26, 'Pagamento', '17.00', '75292671726841374', 'Boleto', 'teste', '2022-05-31 02:14:02'),
(28, 'Pagamento', '23.00', '81350688486233862', 'Pix', 'aaaaaa', '2022-05-31 19:30:46'),
(30, 'Pagamento', '23.00', '81350688486233862', 'Débito', 'teste', '2022-05-31 19:32:20'),
(31, 'Pagamento', '-23.00', '81350688486233862', 'Débito', 'ssdfs', '2022-05-31 19:33:11'),
(32, 'Pagamento', '-40.00', '81350688486233862', 'Pix', 'aaaaa', '2022-05-31 19:33:29'),
(33, 'Pagamento', '-52.00', '81350688486233862', 'Boleto', 'aaaaaaaaa', '2022-05-31 19:51:07'),
(34, 'Pagamento', '-2.45', '81350688486233862', 'Pix', 'tet', '2022-05-31 19:57:59'),
(60, 'Pagamento', '-44.00', '81350688486233862', 'Pix', '', '2022-05-31 21:23:47'),
(66, 'Pagamento', '-1.00', '81350688486233862', 'Pix', '', '2022-05-31 21:29:14'),
(67, 'Pagamento', '-0.20', '81350688486233862', 'Pix', '', '2022-05-31 21:29:45'),
(68, 'Pagamento', '-0.10', '81350688486233862', 'Pix', '', '2022-05-31 21:45:30'),
(69, 'Pagamento', '-0.10', '81350688486233862', 'Pix', '', '2022-05-31 22:05:47'),
(70, 'Pagamento', '-0.10', '81350688486233862', 'Pix', '', '2022-05-31 22:20:38'),
(71, 'Depósito Inicial', '1000.00', '13873978576092534', 'Depósito', 'inicial', '2022-06-01 08:18:17'),
(73, 'Pagamento', '-100.00', '13873978576092534', 'Pix', 'tenis', '2022-06-01 08:19:08'),
(80, 'Resgate Poupança', '12.00', '91625886564214020', 'Resgate', '', '2022-06-01 18:36:56'),
(81, 'Resgate Poupança', '-12.00', '13873978576092534', 'Resgate', '', '2022-06-01 18:36:56'),
(84, 'Aplicação', '2.00', '91625886564214020', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:45:47'),
(85, 'Aplicação', '-2.00', '13873978576092534', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:45:47'),
(86, 'Resgate', '-5.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:46:01'),
(87, 'Resgate', '5.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:46:01'),
(88, 'Resgate', '10.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:46:25'),
(89, 'Resgate', '-10.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:46:25'),
(90, 'Resgate', '-20.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:47:37'),
(91, 'Resgate', '20.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:47:37'),
(92, 'Resgate', '-2.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:48:13'),
(93, 'Resgate', '2.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:48:13'),
(94, 'Resgate', '2.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:48:41'),
(95, 'Resgate', '-2.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:48:41'),
(96, 'Resgate', '2.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:49:49'),
(97, 'Resgate', '-2.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:49:49'),
(98, 'Resgate', '-2.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:50:12'),
(99, 'Resgate', '2.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:50:12'),
(100, 'Resgate', '20.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:51:20'),
(101, 'Resgate', '-20.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:51:20'),
(106, 'Aplicação', '2.00', '91625886564214020', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:52:38'),
(107, 'Aplicação', '-2.00', '13873978576092534', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:52:38'),
(108, 'Resgate', '39.00', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:53:09'),
(109, 'Resgate', '-39.00', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 18:53:09'),
(110, 'Aplicação', '450.00', '91625886564214020', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:53:42'),
(111, 'Aplicação', '-450.00', '13873978576092534', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 18:53:42'),
(112, 'Aplicação', '50.50', '91625886564214020', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 21:52:38'),
(113, 'Aplicação', '-50.50', '13873978576092534', 'Aplicação Poupança', 'aplicação poup.', '2022-06-01 21:52:38'),
(114, 'Resgate', '0.50', '13873978576092534', 'Resgate Poupança', 'resgate poup.', '2022-06-01 21:52:51'),
(115, 'Resgate', '-0.50', '91625886564214020', 'Resgate Poupança', 'resgate poup.', '2022-06-01 21:52:51'),
(116, 'Pagamento', '-10.00', '13873978576092534', 'Pix', 'padaria', '2022-06-01 21:54:03');

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
('jojo', 'João da Silva', '202cb962ac59075b964b07152d234b70'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `extrato`
--
ALTER TABLE `extrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

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
