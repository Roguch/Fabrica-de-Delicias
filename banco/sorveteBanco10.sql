-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10-Ago-2018 às 09:23
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marcos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle`
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
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `nome` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `telefone` int(15) DEFAULT NULL,
  `cnpj` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`nome`, `email`, `telefone`, `cnpj`) VALUES
('silva', 'siva@gmail.com', 34252627, '96372428000134');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorvete`
--

CREATE TABLE `sorvete` (
  `nomeSor` varchar(25) DEFAULT NULL,
  `sabor` varchar(45) DEFAULT NULL,
  `quantidade` bigint(25) DEFAULT NULL,
  `validade` year(4) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `dt_ent_es` year(4) DEFAULT NULL,
  `cnpj_dor` varchar(25) DEFAULT NULL,
  `user_cpf` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sorvete`
--

INSERT INTO `sorvete` (`nomeSor`, `sabor`, `quantidade`, `validade`, `id`, `dt_ent_es`, `cnpj_dor`, `user_cpf`) VALUES
('maracuja', 'maracuja', 5, 2019, 1, 2018, '96372428000134', '10848256948');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tip_user` int(5) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`id_tip_user`, `descricao`) VALUES
(0, 'gerente'),
(1, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `login`, `senha`, `telefone`, `nome`, `cpf`, `tip_user_id`) VALUES
('marcos.eduardor01@gmail.com', 'marcos', '1234', '34662501', 'marcos', '10848256948', 0),
('marcos.eduardor02@gmail.com', 'lucas', 'qwe', '12345678', 'locas', '10848256949', 1),
('marcos.eduardor03@gmail.com', 'nicolas', 'asd', '34662503', 'nicola gattis', '10848256950', 1),
('marcos.eduardor04@gmail.com', 'bianca', 'zxc', '34662504', 'bianca', '10848256951', 1),
('marcos.eduardor05@gmail.com', 'japa', 'rty', '34662505', 'andre', '10848256952', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controle`
--
ALTER TABLE `controle`
  ADD KEY `user_cpf` (`user_cpf`),
  ADD KEY `idSor` (`idSor`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `sorvete`
--
ALTER TABLE `sorvete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_cnpj` (`cnpj_dor`),
  ADD KEY `user_cpf` (`user_cpf`);

--
-- Indexes for table `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tip_user`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `tip_user_id` (`tip_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sorvete`
--
ALTER TABLE `sorvete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_1` FOREIGN KEY (`user_cpf`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`idSor`) REFERENCES `sorvete` (`id`);

--
-- Limitadores para a tabela `sorvete`
--
ALTER TABLE `sorvete`
  ADD CONSTRAINT `sorvete_ibfk_1` FOREIGN KEY (`cnpj_dor`) REFERENCES `fornecedor` (`cnpj`),
  ADD CONSTRAINT `sorvete_ibfk_2` FOREIGN KEY (`user_cpf`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tip_user_id`) REFERENCES `tipo_user` (`id_tip_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
