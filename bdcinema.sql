-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2020 às 04:17
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcinema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCat` int(11) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCat`, `categoria`) VALUES
(1, 'Ação'),
(2, 'Comédia'),
(3, 'Romance'),
(4, 'Aventura'),
(5, 'Animação'),
(6, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfilmes`
--

CREATE TABLE `tbfilmes` (
  `idFilme` int(11) NOT NULL,
  `filme` varchar(100) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `anoLancamento` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfilmes`
--

INSERT INTO `tbfilmes` (`idFilme`, `filme`, `idCategoria`, `anoLancamento`) VALUES
(1, 'Baby Driver: Em Ritmo de Fuga', 1, 2017),
(2, 'Dois Irmãos', 5, 2020),
(3, 'Star Wars: Os Últimos Jedi', 4, 2019),
(4, 'A Cinco Passo de Você', 3, 2019),
(5, 'Norbit', 2, 2007),
(18, 'Hereditário', 6, 2018);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCat`);

--
-- Índices para tabela `tbfilmes`
--
ALTER TABLE `tbfilmes`
  ADD PRIMARY KEY (`idFilme`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbfilmes`
--
ALTER TABLE `tbfilmes`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
