-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/08/2018 às 15:06
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marcos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `controle`
--

CREATE TABLE `controle` (
  `user_cpf` varchar(25) DEFAULT NULL,
  `idSor` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `quantidade` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `nome` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefone` int(15) DEFAULT NULL,
  `cnpj` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `fornecedor`
--

INSERT INTO `fornecedor` (`nome`, `email`, `telefone`, `cnpj`) VALUES
('nicholas.ltda', 'marcos.eduardor11@gmail.com', 34662502, '50245438000108'),
('heitor.sa', 'marcos.eduardor12@gmail.com', 34662503, '97684980000120');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sorvete`
--

CREATE TABLE `sorvete` (
  `nomeSor` varchar(25) DEFAULT NULL,
  `sabor` varchar(100) DEFAULT NULL,
  `quantidade` bigint(25) DEFAULT NULL,
  `validade` year(4) DEFAULT NULL,
  `preco` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `dt_ent_es` year(4) DEFAULT NULL,
  `for_cnpj` varchar(25) DEFAULT NULL,
  `user_cpf` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tip_user` int(5) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_user`
--

INSERT INTO `tipo_user` (`id_tip_user`, `descricao`) VALUES
(0, 'gerente'),
(1, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(80) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `nome` varchar(15) DEFAULT NULL,
  `cpf` varchar(25) NOT NULL,
  `tip_user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`email`, `login`, `senha`, `telefone`, `nome`, `cpf`, `tip_user_id`) VALUES
('marcos.eduardor01@gmail.com', 'marcos', '1234', '34662501', 'marcos', '10848256948', 0),
('marcos.eduardor02@gmail.com', 'lucas', 'qwe', '12345678', 'locas', '10848256949', 1),
('marcos.eduardor03@gmail.com', 'nicolas', 'asd', '34662503', 'nicola gattis', '10848256950', 1),
('marcos.eduardor04@gmail.com', 'bianca', 'zxc', '34662504', 'bianca', '10848256951', 1),
('marcos.eduardor05@gmail.com', 'japa', 'rty', '34662505', 'andre', '10848256952', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `controle`
--
ALTER TABLE `controle`
  ADD KEY `user_cpf` (`user_cpf`),
  ADD KEY `idSor` (`idSor`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices de tabela `sorvete`
--
ALTER TABLE `sorvete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_cnpj` (`for_cnpj`),
  ADD KEY `user_cpf` (`user_cpf`);

--
-- Índices de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tip_user`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `tip_user_id` (`tip_user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `sorvete`
--
ALTER TABLE `sorvete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_1` FOREIGN KEY (`user_cpf`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`idSor`) REFERENCES `sorvete` (`id`);

--
-- Restrições para tabelas `sorvete`
--
ALTER TABLE `sorvete`
  ADD CONSTRAINT `sorvete_ibfk_1` FOREIGN KEY (`for_cnpj`) REFERENCES `fornecedor` (`cnpj`),
  ADD CONSTRAINT `sorvete_ibfk_2` FOREIGN KEY (`user_cpf`) REFERENCES `usuario` (`cpf`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tip_user_id`) REFERENCES `tipo_user` (`id_tip_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
