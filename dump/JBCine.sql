-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28-Set-2021 às 11:40
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `JBCine`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `genero` varchar(255) NOT NULL,
  `capa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `sinopse`, `genero`, `capa`) VALUES
(1, 'Venom Carnificina', 'O relacionamento entre Eddie e Venom (Tom Hardy) esta evoluindo. Buscando a melhor forma de lidar com a inevitavel simbiose, esse dois lados descobrem como viver juntos e, de alguma forma, se tornarem melhores juntos do que separados.', 'Ação , Aventura , herói', 'https://www.themoviedb.org/t/p/original/kz7xJLowO4x0BpcB1IJb9uIXgrq.jpg'),
(7, '007: Sem Tempo para Morrer (2021)', 'Bond deixou o serviÃ§o ativo e estÃ¡ desfrutando de uma vida tranquila na Jamaica. Sua paz Ã© interrompida quando o seu velho amigo Felix Leiter, da CIA, aparece pedindo sua ajuda. A missÃ£o de resgatar um cientista sequestrado acaba sendo muito mais difÃ­cil do que o esperado, deixando Bond no caminho de um vilÃ£o misterioso e armado com uma nova tecnologia perigosa.', 'Aventura, AÃ§Ã£o, Thriller', 'https://www.themoviedb.org/t/p/original/iED5BlTFVky8lKw8SuG7QX0q6yI.jpg'),
(10, 'CaÃ§a JurÃ¡ssica', 'A aventureira Parker se junta a uma equipe de caÃ§adores de trofÃ©us em um remoto parque selvagem. Seu objetivo: matar dinossauros geneticamente recriados para o esporte usando rifles, flechas e granadas.', 'AÃ§Ã£o, FicÃ§Ã£o cientÃ­fica, Thriller', 'https://www.themoviedb.org/t/p/original/uYwlxf1XLQjZyYQIV3ViqmUg4t6.jpg'),
(11, 'A Abelhinha Maya e O Ovo Dourado', 'Quando Maya, uma abelhinha teimosa, e seu melhor amigo Willi resgatam uma formiga princesa, eles se encontram no meio de uma batalha Ã©pica de insetos que os levarÃ¡ a estranhos mundos e testarÃ¡ sua amizade atÃ© o limite.', 'Aventura, AnimaÃ§Ã£o, FamÃ­lia', 'https://www.themoviedb.org/t/p/original/mko4JI0tOQOoIAYoS2J5sAkWXOn.jpg'),
(12, 'AscensÃ£o do Cisne Negro (2021)', 'Um pequeno exÃ©rcito de criminosos bem treinados liderados por Laszlo Antonov sequestrou o Eurostar nas profundezas do Canal da Mancha.\r\n\r\n', 'AÃ§Ã£o, Thriller', 'https://www.themoviedb.org/t/p/original/yplhrbLKFPJbjnQDUyVztZ1K2Te.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `id_sessao` int(11) NOT NULL,
  `diaDaSemana` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao`
--

INSERT INTO `sessao` (`id_sessao`, `diaDaSemana`, `data`, `hora`) VALUES
(3, 'TerÃ§a', '2021-09-27', '20:00:00'),
(8, 'Segunda', '2021-10-04', '08:20:00'),
(9, 'TerÃ§a', '2021-10-05', '09:20:00'),
(10, 'Quarta', '2021-10-06', '09:20:00'),
(11, 'Quinta', '2021-10-07', '09:20:00'),
(12, 'Sexta', '2021-10-08', '09:21:00'),
(13, 'Segunda', '2021-10-11', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala`
--

CREATE TABLE `tb_sala` (
  `id_sala` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `id_sessao` int(11) NOT NULL,
  `num_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sala`
--

INSERT INTO `tb_sala` (`id_sala`, `id_filme`, `id_sessao`, `num_sala`) VALUES
(1, 1, 10, 20),
(2, 7, 13, 15),
(3, 1, 8, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`id_sessao`);

--
-- Índices para tabela `tb_sala`
--
ALTER TABLE `tb_sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `id_filme` (`id_filme`),
  ADD KEY `id_sessao` (`id_sessao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_sala`
--
ALTER TABLE `tb_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_sala`
--
ALTER TABLE `tb_sala`
  ADD CONSTRAINT `tb_sala_ibfk_1` FOREIGN KEY (`id_filme`) REFERENCES `filmes` (`id`),
  ADD CONSTRAINT `tb_sala_ibfk_2` FOREIGN KEY (`id_sessao`) REFERENCES `sessao` (`id_sessao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
