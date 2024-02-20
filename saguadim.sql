-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Fev-2024 às 21:13
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saguadim`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_nome` varchar(50) NOT NULL,
  `cli_email` varchar(100) NOT NULL,
  `cli_telefone` bigint(20) DEFAULT NULL,
  `cli_cpf` varchar(20) DEFAULT NULL,
  `cli_curso` varchar(50) DEFAULT NULL,
  `cli_sala` int(11) DEFAULT NULL,
  `cli_status` char(1) NOT NULL,
  `cli_saldo` float(10,2) DEFAULT NULL,
  `cli_senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_nome`, `cli_email`, `cli_telefone`, `cli_cpf`, `cli_curso`, `cli_sala`, `cli_status`, `cli_saldo`, `cli_senha`) VALUES
(18, 'Murilo Amorim Mattiuzzi', 'murilo@gmail.com', 16982035618, '384.730.858-09', 'ti', 18, 's', NULL, '123'),
(19, 'Palestro Italio', 'palestro@gmail.com', 4002, '1234-1234-00', 'Nutrição', 2, 's', NULL, '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `enc_id` int(11) NOT NULL,
  `enc_emissao` datetime NOT NULL,
  `enc_entrega` datetime NOT NULL,
  `fk_pro_id` int(11) NOT NULL,
  `fk_cli_id` int(11) NOT NULL,
  `fk_ven_id` int(11) NOT NULL,
  `enc_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `for_id` int(11) NOT NULL,
  `for_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`for_id`, `for_nome`) VALUES
(1, 'sagadeira'),
(2, 'tirulipa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `iv_id` int(11) NOT NULL,
  `iv_quantidade` int(11) NOT NULL,
  `iv_total` decimal(10,2) DEFAULT NULL,
  `iv_codigo` varchar(50) NOT NULL,
  `fk_pro_id` int(11) NOT NULL,
  `fk_cli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`iv_id`, `iv_quantidade`, `iv_total`, `iv_codigo`, `fk_pro_id`, `fk_cli_id`) VALUES
(23, 3, '12.00', '', 1, 0),
(24, 3, '12.00', '', 1, 0),
(25, 3, '12.00', '', 1, 0),
(26, 3, '12.00', '', 1, 0),
(27, 3, '12.00', '', 1, 0),
(28, 3, '12.00', '', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `pro_id` int(11) NOT NULL,
  `pro_nome` varchar(100) NOT NULL,
  `pro_descricao` varchar(150) NOT NULL,
  `pro_custo` decimal(10,2) NOT NULL,
  `pro_preco` decimal(10,2) NOT NULL,
  `pro_quantidade` int(11) NOT NULL,
  `pro_validade` date NOT NULL,
  `fk_for_id` int(11) NOT NULL,
  `pro_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`pro_id`, `pro_nome`, `pro_descricao`, `pro_custo`, `pro_preco`, `pro_quantidade`, `pro_validade`, `fk_for_id`, `pro_status`) VALUES
(1, 'Pastel', 'pastel de carne com queijo gostoso huummmm', '3.00', '4.00', 12, '2024-01-18', 1, 's'),
(7, 'Coxinha', 'Coxinha hummm delixia', '5.00', '6.00', 5, '2024-02-11', 1, 's'),
(8, 'Salsicha Empanada', 'salsicha empanada hummmm delixio', '4.00', '5.00', 7, '2024-02-15', 2, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_log`
--

CREATE TABLE `tab_log` (
  `tab_id` int(11) NOT NULL,
  `tab_query` text NOT NULL,
  `tab_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tab_log`
--

INSERT INTO `tab_log` (`tab_id`, `tab_query`, `tab_data`) VALUES
(1, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' OR usu_login = \'Murilo\'', '2024-01-22 14:24:16'),
(2, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'Murilo\',\'12345\',\'s\',\'638655\',\'murilo.mattiuzzi@gmail.com\')', '2024-01-22 14:24:16'),
(3, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-22 14:24:27'),
(4, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-22 14:24:27'),
(5, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-24 13:54:18'),
(6, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-24 13:54:18'),
(7, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-24 14:16:09'),
(8, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-24 14:16:09'),
(9, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-25 14:47:49'),
(10, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-25 14:47:49'),
(11, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-26 13:54:02'),
(12, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-26 13:54:03'),
(13, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' OR usu_login = \'\'', '2024-01-26 14:07:49'),
(14, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'muriloamorimmattiuzzi@gmail.com\' OR cli_nome = \'murilo\'', '2024-01-26 14:08:26'),
(15, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status) \r\n                VALUES(\'murilo\',\'muriloamorimmattiuzzi@gmail.com\',\'123\',\'1233\',\'\', \'18\', \'s\')', '2024-01-26 14:08:26'),
(16, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'muriloamorimmattiuzzi@gmail.com\' OR cli_nome = \'murilo\'', '2024-01-26 14:09:04'),
(17, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.co\' OR cli_nome = \'jorge\'', '2024-01-26 14:13:16'),
(18, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.co\' OR cli_nome = \'jorge\'', '2024-01-26 14:13:46'),
(19, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status) \r\n                VALUES(\'jorge\',\'jorge@gmail.co\',\'123\',\'123\',\'curso da bagunça\',\'sala 0\', \'s\')', '2024-01-26 14:13:46'),
(20, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-29 15:05:28'),
(21, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-29 15:05:28'),
(22, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'pedrinhoplays@gmail.com\' OR usu_login = \'Pedrinho \'', '2024-01-29 15:06:39'),
(23, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'Pedrinho \',\'123\',\'s\',\'845158\',\'pedrinhoplays@gmail.com\')', '2024-01-29 15:06:39'),
(24, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'pedrinhoplays@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-01-29 15:06:53'),
(25, 'SELECT * FROM usuarios WHERE usu_email = \'pedrinhoplays@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-01-29 15:06:53'),
(26, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-29 15:07:10'),
(27, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-29 15:07:10'),
(28, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 13:59:41'),
(29, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 13:59:41'),
(30, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-01-30 14:23:53'),
(31, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:24:04'),
(32, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:24:04'),
(33, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:43:38'),
(34, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:43:38'),
(35, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:45:47'),
(36, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 14:45:47'),
(37, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo.mattiuzzi@gmail.com\' AND cli_senha = \'12345\' AND cli_status = \'s\'', '2024-01-30 14:49:15'),
(38, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo.mattiuzzi@gmail.com\' AND cli_senha = \'12345\' AND cli_status = \'s\'', '2024-01-30 14:50:08'),
(39, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'muriloamorimmattiuzzi@gmail.com\' OR cli_nome = \'\'', '2024-01-30 14:50:26'),
(40, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' OR cli_nome = \'\'', '2024-01-30 14:51:05'),
(41, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status) \r\n                VALUES(\'\',\'murilo@gmail.com\',\'\',\'\',\'\',\'\', \'s\')', '2024-01-30 14:51:05'),
(42, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-30 14:51:54'),
(43, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'asdf@daf\' OR cli_nome = \'\'', '2024-01-30 14:52:32'),
(44, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 15:19:17'),
(45, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-30 15:19:17'),
(46, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'joao@gmail\' OR cli_nome = \'joao\'', '2024-01-30 15:21:10'),
(47, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'joao@gmail\' OR cli_nome = \'joao\'', '2024-01-30 15:21:42'),
(48, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'asdf@daf\' OR usu_login = \'afg\'', '2024-01-30 15:22:58'),
(49, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'afg\',\'123\',\'s\',\'712178\',\'asdf@daf\')', '2024-01-30 15:22:58'),
(50, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'joao@gmail\' OR cli_nome = \'joao\'', '2024-01-30 15:23:57'),
(51, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'joao\',\'joao@gmail\',\'16982035618\',\'384.730.858-09\',\'ti\',\'18\', \'s\', 123)', '2024-01-30 15:23:57'),
(52, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:11:41'),
(53, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:11:56'),
(54, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:12:02'),
(55, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:13:24'),
(56, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:13:55'),
(57, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:14:00'),
(58, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlihos@gmail\' OR cli_nome = \'\'', '2024-01-30 16:14:12'),
(59, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'carlo@asdf\' OR cli_nome = \'carlinhos\'', '2024-01-30 16:18:41'),
(60, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'carlinhos\',\'carlo@asdf\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:18:41'),
(61, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'as@asdf\' OR cli_nome = \'af\'', '2024-01-30 16:18:57'),
(62, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'af\',\'as@asdf\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:18:57'),
(63, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.co\' OR cli_nome = \'Jorginho\'', '2024-01-30 16:38:11'),
(64, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'Jorginho\',\'jorge@gmail.co\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:38:11'),
(65, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.co\' OR cli_nome = \'Jorginho\'', '2024-01-30 16:39:17'),
(66, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorgge@gmail.co\' OR cli_nome = \'Jorginhoao\'', '2024-01-30 16:39:27'),
(67, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'Jorginhoao\',\'jorgge@gmail.co\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:39:27'),
(68, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorgge@gmail.co\' OR cli_nome = \'Jorginhoao\'', '2024-01-30 16:39:42'),
(69, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorgge@gmail.coad\' OR cli_nome = \'Jorginhoaon\'', '2024-01-30 16:39:52'),
(70, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'Jorginhoaon\',\'jorgge@gmail.coad\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:39:52'),
(71, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorgge@gmail.coad\' OR cli_nome = \'Jorginhoaon\'', '2024-01-30 16:40:35'),
(72, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'dasf@f\' OR cli_nome = \'dfs\'', '2024-01-30 16:41:07'),
(73, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'dfs\',\'dasf@f\',\'\',\'\',\'\',\'\', \'s\', 1223)', '2024-01-30 16:41:07'),
(74, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'dasf@ff\' OR cli_nome = \'dfsf\'', '2024-01-30 16:42:19'),
(75, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'dfsf\',\'dasf@ff\',\'\',\'\',\'\',\'\', \'s\', 1223)', '2024-01-30 16:42:19'),
(76, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'asf@a\' OR cli_nome = \'adf\'', '2024-01-30 16:42:51'),
(77, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'adf\',\'asf@a\',\'12\',\'12\',\'ti\',\'18\', \'s\', 123)', '2024-01-30 16:42:51'),
(78, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'asf@aa\' OR cli_nome = \'adfa\'', '2024-01-30 16:44:04'),
(79, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'adfa\',\'asf@aa\',\'12\',\'12\',\'ti\',\'18\', \'s\', 123)', '2024-01-30 16:44:04'),
(80, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'marcos@marcol\' OR cli_nome = \'marcos\'', '2024-01-30 16:44:37'),
(81, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'marcos\',\'marcos@marcol\',\'123\',\'123\',\'f\',\'j\', \'s\', 123)', '2024-01-30 16:44:37'),
(82, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'marcos@marcola\' OR cli_nome = \'marcosa\'', '2024-01-30 16:45:06'),
(83, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'marcosa\',\'marcos@marcola\',\'123\',\'123\',\'f\',\'j\', \'s\', 123)', '2024-01-30 16:45:06'),
(84, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.co\' OR cli_nome = \'joao\'', '2024-01-30 16:45:23'),
(85, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'joao\',\'jorge@gmail.co\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-30 16:45:23'),
(86, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 13:45:30'),
(87, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 13:45:30'),
(88, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'\' OR usu_login = \'\'', '2024-01-31 14:04:37'),
(89, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'\',\'\',\'s\',\'629283\',\'\')', '2024-01-31 14:04:37'),
(90, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'\' OR usu_login = \'\'', '2024-01-31 14:38:54'),
(91, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'\' OR usu_login = \'\'', '2024-01-31 14:39:36'),
(92, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'h@j\' OR usu_login = \'hh\'', '2024-01-31 14:40:13'),
(93, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'hh\',\'ggq\',\'s\',\'164849\',\'h@j\')', '2024-01-31 14:40:13'),
(94, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:52:33'),
(95, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:52:33'),
(96, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:53:14'),
(97, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:53:14'),
(98, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:53:51'),
(99, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:53:51'),
(100, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:54:44'),
(101, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:54:44'),
(102, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:55:20'),
(103, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-01-31 14:55:20'),
(104, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' OR cli_nome = \'MuriloMatt\'', '2024-01-31 14:55:41'),
(105, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'MuriloMatt\',\'murilo@gmail.com\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-01-31 14:55:41'),
(106, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 14:55:52'),
(107, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 14:55:52'),
(108, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 14:56:23'),
(109, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 14:56:23'),
(110, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 16:27:51'),
(111, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 16:27:51'),
(112, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 16:55:25'),
(113, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 16:55:25'),
(114, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 17:00:08'),
(115, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-01-31 17:00:08'),
(116, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-01 14:08:26'),
(117, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-01 14:08:26'),
(118, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 14:09:48'),
(119, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 14:09:48'),
(120, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 14:19:46'),
(121, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 14:19:46'),
(122, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-01 15:01:08'),
(123, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-01 15:01:08'),
(124, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:31:32'),
(125, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:31:32'),
(126, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:41:24'),
(127, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:41:24'),
(128, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:43:06'),
(129, 'SELECT * FROM clientes WHERE cli_email = \'murilo@gmail.com\' AND cli_senha = \'123\' AND cli_status = \'s\'', '2024-02-01 16:43:06'),
(130, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-02 16:33:42'),
(131, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-02 16:33:42'),
(132, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-02 16:34:25'),
(133, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-02 16:34:25'),
(134, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'Leonardomattiuzzi@gmail.com\' OR usu_login = \'carlinhos\'', '2024-02-02 16:57:59'),
(135, 'INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) \r\n                VALUES(\'carlinhos\',\'123\',\'s\',\'455204\',\'Leonardomattiuzzi@gmail.com\')', '2024-02-02 16:57:59'),
(136, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'danilo@gmail.com\' OR cli_nome = \'Danilo\'', '2024-02-05 15:16:25'),
(137, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'Danilo\',\'danilo@gmail.com\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-02-05 15:16:25'),
(138, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'danilo@gmail.com\' OR cli_nome = \'Danilo\'', '2024-02-05 15:17:41'),
(139, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'danilo@gmail.com\' OR cli_nome = \'Danilo\'', '2024-02-05 15:18:07'),
(140, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.com\' OR cli_nome = \'jorge\'', '2024-02-05 15:18:50'),
(141, 'INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) \r\n                VALUES(\'jorge\',\'jorge@gmail.com\',\'\',\'\',\'\',\'\', \'s\', 123)', '2024-02-05 15:18:50'),
(142, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.com\' OR cli_nome = \'jorge\'', '2024-02-05 15:19:17'),
(143, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.com\' OR cli_nome = \'jorge\'', '2024-02-05 15:19:24'),
(144, 'SELECT COUNT(cli_id) FROM clientes WHERE cli_email = \'jorge@gmail.com\' OR cli_nome = \'jorge\'', '2024-02-05 15:19:29'),
(145, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-05 16:15:13'),
(146, 'SELECT * FROM usuarios WHERE usu_email = \'murilo.mattiuzzi@gmail.com\' AND usu_senha = \'12345\' AND usu_status = \'s\'', '2024-02-05 16:15:13'),
(147, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-06 16:57:58'),
(148, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-06 16:57:58'),
(149, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-07 13:54:57'),
(150, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-07 13:54:57'),
(151, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-07 15:09:41'),
(152, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-07 15:09:41'),
(153, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 13:56:44'),
(154, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 13:56:44'),
(155, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 14:15:52'),
(156, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 14:15:52'),
(157, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 14:51:41'),
(158, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 14:51:41'),
(159, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 16:09:35'),
(160, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 16:09:35'),
(161, 'SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 16:10:03'),
(162, 'SELECT * FROM usuarios WHERE usu_email = \'admin@gmail.com\' AND usu_senha = \'123\' AND usu_status = \'s\'', '2024-02-08 16:10:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_login` varchar(20) NOT NULL,
  `usu_senha` varchar(50) NOT NULL,
  `usu_status` char(1) NOT NULL,
  `usu_key` varchar(10) NOT NULL,
  `usu_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_login`, `usu_senha`, `usu_status`, `usu_key`, `usu_email`) VALUES
(1, 'Admin', '123', 's', '638655', 'admin@gmail.com'),
(6, 'Murilo', '123', 's', '455204', 'murilo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `ven_id` int(11) NOT NULL,
  `ven_data` datetime NOT NULL,
  `fk_cli_id` int(11) NOT NULL,
  `ven_total` decimal(10,2) NOT NULL,
  `fk_iv_codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`enc_id`),
  ADD KEY `fk_pro_id_enc` (`fk_pro_id`),
  ADD KEY `fk_cli_id_enc` (`fk_cli_id`),
  ADD KEY `fk_ven_id_enc` (`fk_ven_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`for_id`);

--
-- Índices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`iv_id`),
  ADD KEY `fk_pro_id_iv` (`fk_pro_id`),
  ADD KEY `fk_cli_id_iv` (`fk_cli_id`) USING BTREE;

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_for_id_pro` (`fk_for_id`);

--
-- Índices para tabela `tab_log`
--
ALTER TABLE `tab_log`
  ADD PRIMARY KEY (`tab_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`ven_id`),
  ADD KEY `fk_cli_id_ven` (`fk_cli_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `enc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `iv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tab_log`
--
ALTER TABLE `tab_log`
  MODIFY `tab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `ven_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `fk_cli_id_enc` FOREIGN KEY (`fk_cli_id`) REFERENCES `clientes` (`cli_id`),
  ADD CONSTRAINT `fk_pro_id_enc` FOREIGN KEY (`fk_pro_id`) REFERENCES `produtos` (`pro_id`),
  ADD CONSTRAINT `fk_ven_id_enc` FOREIGN KEY (`fk_ven_id`) REFERENCES `vendas` (`ven_id`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_pro_id_iv` FOREIGN KEY (`fk_pro_id`) REFERENCES `produtos` (`pro_id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_for_id_pro` FOREIGN KEY (`fk_for_id`) REFERENCES `fornecedores` (`for_id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_cli_id_ven` FOREIGN KEY (`fk_cli_id`) REFERENCES `clientes` (`cli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
