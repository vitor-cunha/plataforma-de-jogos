-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2022 às 16:49
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `megagames`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `idjogos` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(400) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `capa` varchar(500) NOT NULL,
  `tipo_jogo` varchar(10) NOT NULL,
  `data_registro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`idjogos`, `nome`, `descricao`, `categoria`, `capa`, `tipo_jogo`, `data_registro`) VALUES
(1, 'Stray', 'Stray é um jogo eletrônico de aventura desenvolvido pela BlueTwelve Studio e publicado pela Annapurna Interactive.', 'Aventura', 'Stray-PC-Buy-Cheap-Play-Cheap-Cover-Art.jpg', 'Pago', '2022-10-09'),
(2, 'Pumpkin Jack', 'Pumpkin Jack é um jogo de plataforma 3D medonho e horripilante em que você encarna Jack, o Mítico Lorde Abóbora! Entre de cabeça em uma aventura épica por cenários sobrenaturais e ajude o Mal a aniquilar o Bem! Entre de cabeça em uma aventura épica e ajude o Mal a aniquilar o Bem!', 'Aventura', '9677.jpg', 'Pago', '2022-10-09'),
(3, 'Batman Arkham', 'Batman: Arkham é uma série de videojogos de ação-aventura baseados no popular herói da DC Comics, Batman, produzidos pela Rocksteady Studios e Warner Bros.', 'Ação', 'Batman_arkham_city_logo.jpg', 'Pago', '2022-10-09'),
(4, 'FIFA 23', 'FIFA 23 é um jogo de Futebol desenvolvido pela EA Sports', 'Futebol', 'HrC1Prgq2P70WXZn1X36P9vu.jfif', 'Gratuito', '2022-10-09'),
(6, 'Elden Ring', 'elden ring', 'Aventura', 'Elden_Ring_capa.jpg', 'Pago', '2022-10-11'),
(7, 'Marvel\'s Spider-Man', 'spider-man', 'Aventura', 'big-poster-gamer-homem-aranha-ps4-lo02-tamanho-90x60-cm-homem-aranha-ps4.jpg', 'Pago', '2022-10-11'),
(8, 'Lego Batman: The Videogame', 'Lego Batman: The Videogame', 'Lego', 'aRGihKFChi00Of5xoxwts32SKdrSpCKo5uE0cw3Rkm8_350x200_2x-0.jpeg', 'Gratuito', '2022-10-11'),
(10, 'FNAF: Security Breach', 'FNAF: Security Breach é um jogo eletrônico de survival horror e de primeira pessoa desenvolvido pela Steel Wool Studios e publicado pela ScottGames', 'Terror', 'FNAF_Security_Breach_poster.png', 'Pago', '2022-10-14'),
(15, 'Lego Star Wars: The Skywalker Saga', 'Lego Star Wars: The Skywalker Saga é um jogo eletrônico de ação-aventura, sendo o sexto título da série temática Lego Star Wars, e a sequência de The Force Awakens, de 2016, desenvolvido pela Traveller\'s Tales e publicado pela Warner Bros. Interactive Entertainment.', 'Lego', 'EGS_LEGOStarWarsTheSkywalkerSaga_TTGames_S2_1200x1600-fba27b1ae598e355c3ad42d04d9025ba.jfif', 'Pago', '2022-10-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_principal`
--

CREATE TABLE `pagina_principal` (
  `idprincipal` int(11) NOT NULL,
  `banner` varchar(500) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `mais_detalhes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagina_principal`
--

INSERT INTO `pagina_principal` (`idprincipal`, `banner`, `titulo`, `mais_detalhes`) VALUES
(1, '479eaa8e93a42b42d12992f086cfa14f.jpg', 'Batman Arkham', 'game.php?id=3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `tipo_conta` varchar(10) NOT NULL DEFAULT 'NORMAL',
  `data_conta` date NOT NULL DEFAULT current_timestamp(),
  `situacao` varchar(10) NOT NULL DEFAULT 'REGULAR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `email`, `senha`, `icon`, `tipo_conta`, `data_conta`, `situacao`) VALUES
(1, 'Vitor Cunha', 'vitor@gmail.com', '123456', '264x264-000000-80-0-0.jpg', 'ADM', '2022-10-08', 'REGULAR');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`idjogos`);

--
-- Índices para tabela `pagina_principal`
--
ALTER TABLE `pagina_principal`
  ADD PRIMARY KEY (`idprincipal`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `idjogos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pagina_principal`
--
ALTER TABLE `pagina_principal`
  MODIFY `idprincipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
