-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16-Out-2021 às 05:13
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
  `sinopse` longtext NOT NULL,
  `genero` varchar(255) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `is_cartaz` varchar(1) NOT NULL,
  `criadoem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `sinopse`, `genero`, `capa`, `is_cartaz`, `criadoem`) VALUES
(111, 'Venom: Tempo de Carnificina', 'O relacionamento entre Eddie e Venom (Tom Hardy) estÃ¡ evoluindo. Buscando a melhor forma de lidar com a inevitÃ¡vel simbiose, esse dois lados descobrem como viver juntos e, de alguma forma, se tornarem melhores juntos do que separados.\r\n\r\n', 'FicÃ§Ã£o cientÃ­fica, AÃ§Ã£o', 'https://www.themoviedb.org/t/p/original/kz7xJLowO4x0BpcB1IJb9uIXgrq.jpg', 'S', '2021-10-09 01:36:45'),
(113, 'A FamÃ­lia Addams 2: PÃ© na Estrada', 'Os Addams se envolvem em aventuras mais malucas e se envolvem em confrontos hilariantes com todos os tipos de personagens desavisados', 'AnimaÃ§Ã£o, ComÃ©dia, FamÃ­lia', 'https://www.themoviedb.org/t/p/original/ujWOI68vGkfLOgEDmcrjIS6il7B.jpg       ', 'S', '2021-10-12 21:51:24'),
(117, 'Shang-Chi e a Lenda dos Dez AnÃ©is', 'Shang-Chi precisa confrontar o passado que pensou ter deixado para trÃ¡s. Ao mesmo tempo, ele Ã© envolvido em uma teia de mistÃ©rios da organizaÃ§Ã£o conhecida como Dez AnÃ©is.', 'AÃ§Ã£o, Aventura, Fantasia', 'https://www.themoviedb.org/t/p/original/ArrOBeio968bUuUOtEpKa1teIh4.jpg             ', 'S', '2021-10-12 18:40:15'),
(118, 'Mortal Kombat (2021)', 'O lutador de MMA Cole Young deve treinar para liberar seu verdadeiro poder para unir-se aos maiores campeÃµes mundiais contra inimigos da Exoterra em uma batalha decisiva pelo universo.', 'AÃ§Ã£o, Fantasia, Aventura', 'https://www.themoviedb.org/t/p/original/71z7cXagPriquYJWDLIQ5WhElPV.jpg      ', 'N', '2021-10-14 07:26:52'),
(119, 'Matrix', 'Um jovem programador Ã© atormentado por estranhos pesadelos nos quais sempre estÃ¡ conectado por cabos a um imenso sistema de computadores do futuro. Ã€ medida que o sonho se repete, ele comeÃ§a a levantar dÃºvidas sobre a realidade. E quando encontra os misteriosos Morpheus e Trinity, ele descobre que Ã© vÃ­tima do Matrix, um sistema inteligente e artificial que manipula a mente das pessoas e cria a ilusÃ£o de um mundo real enquanto usa os cÃ©rebros e corpos dos indivÃ­duos para produzir energia.', 'AÃ§Ã£o, FicÃ§Ã£o cientÃ­fica', 'https://www.themoviedb.org/t/p/original/etJHvVsM9aefWWrW23r5BXgVK1F.jpg   ', 'N', '2021-10-12 18:39:40'),
(120, 'Maligno (2021)', 'Madison passa a ter sonhos aterrorizantes de pessoas sendo brutalmente assassinadas e acaba descobrindo que, na verdade, sÃ£o visÃµes dos crimes enquanto acontecem. Aos poucos, ela percebe que esses assassinatos estÃ£o conectados a uma entidade do seu passado chamada Gabriel. Para impedir a criatura, Madison precisarÃ¡ investigar de onde ela surgiu e enfrentar seus traumas de infÃ¢ncia.', 'Terror, Thriller, MistÃ©rio', 'https://www.themoviedb.org/t/p/original/oGzaG5vqSJkIiJmxcJ8EKzfFad3.jpg       ', 'S', '2021-10-12 21:51:37'),
(121, 'Blue Bayou ', 'As a Korean-American man raised in the Louisiana bayou works hard to make a life for his family, he must confront the ghosts of his past as he discovers that he could be deported from the only country he has ever called home.', 'Drama', 'https://www.themoviedb.org/t/p/original/kmMmFggZ5TkrIQGIuV15ybc2wMT.jpg    ', 'N', '2021-10-14 07:00:24'),
(122, 'Demon Slayer - Mugen Train: O Filme (2020)', 'Tanjiro Kamado, junto com Inosuke Hashibira, um garoto criado por javalis que usa uma cabeÃ§a de javali, e Zenitsu Agatsuma, um garoto assustado que revela seu verdadeiro poder quando dorme, embarca no Trem Infinito em uma nova missÃ£o com o Hashira de Fogo, Kyojuro Rengoku, para derrotar um demÃ´nio que tem atormentado o povo e matado os caÃ§adores de oni que se opÃµem a ele!', 'AnimaÃ§Ã£o, AÃ§Ã£o, Aventura, Fantasia', 'https://www.themoviedb.org/t/p/original/yaX5hliSF1rwZ9WVNbUchndjFSb.jpg          ', 'N', '2021-10-16 02:11:25'),
(123, 'Ainbo: A Guerreira da AmazÃ´nia (2021)', 'Ainbo nasceu e foi criada na aldeia de CandÃ¡mo, na floresta AmazÃ´nica. Um dia, ele descobre que sua tribo estÃ¡ sendo ameaÃ§ada por outros seres humanos. A garota enfrenta a missÃ£o de reverter essa destruiÃ§Ã£o e extinguir a maldade dos Yakuruna, a escuridÃ£o que habita o coraÃ§Ã£o de gente gananciosa.', 'Aventura, AnimaÃ§Ã£o, FamÃ­lia, Fantasia', 'https://www.themoviedb.org/t/p/original/alN7yKuE5eDWAqvwECfOaIR1kmK.jpg  ', 'S', '2021-10-15 06:02:03'),
(124, 'Old Henry (2021)', 'confiar. Defendendo um cerco, ele revela um talento de pistoleiro que pÃµe em questÃ£o sua verdadeira identidade.', 'Faroeste, Thriller ', 'https://www.themoviedb.org/t/p/original/eE1SL0QoDsvAMqQly56IkRtlN1W.jpg ', 'N', '2021-10-14 07:26:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `num_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`, `num_sala`) VALUES
(1, 1),
(2, 2),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `id_sessao` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `num_sala` int(11) NOT NULL,
  `horario` time NOT NULL,
  `data_sessao` date NOT NULL,
  `qtd_assento_disp` int(11) NOT NULL,
  `valor_ingresso` float NOT NULL,
  `criadoem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao`
--

INSERT INTO `sessao` (`id_sessao`, `id_filme`, `num_sala`, `horario`, `data_sessao`, `qtd_assento_disp`, `valor_ingresso`, `criadoem`) VALUES
(4, 118, 1, '20:01:00', '2021-10-12', 50, 24.6, '2021-10-12 13:47:19'),
(6, 111, 2, '12:30:00', '2021-10-12', 30, 10, '2021-10-12 13:52:20'),
(8, 117, 4, '08:30:00', '2021-10-14', 60, 10, '2021-10-14 06:51:09'),
(10, 121, 3, '07:25:00', '2021-10-14', 20, 14.5, '2021-10-14 04:53:19'),
(16, 113, 1, '05:22:00', '2021-10-03', 50, 5, '2021-10-14 07:21:36'),
(17, 124, 1, '07:24:00', '2021-10-07', 50, 2, '2021-10-14 07:21:56'),
(18, 120, 2, '12:25:00', '2021-10-13', 50, 10, '2021-10-14 07:23:57'),
(20, 124, 2, '02:17:00', '2021-10-26', 60, 10, '2021-10-16 02:15:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_sessao` int(11) NOT NULL,
  `num_assento_vendido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_sessao`, `num_assento_vendido`) VALUES
(2, 6, 15),
(3, 10, 1),
(4, 4, 1),
(5, 8, 5),
(6, 16, 2),
(7, 17, 3),
(8, 18, 2),
(13, 10, 20),
(14, 10, 19),
(15, 6, 30),
(16, 18, 18),
(17, 17, 50),
(18, 6, 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_sala` (`num_sala`);

--
-- Índices para tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`id_sessao`),
  ADD KEY `id_filme` (`id_filme`),
  ADD KEY `num_sala` (`num_sala`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sessao` (`id_sessao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sessao`
--
ALTER TABLE `sessao`
  ADD CONSTRAINT `sessao_ibfk_1` FOREIGN KEY (`id_filme`) REFERENCES `filmes` (`id`),
  ADD CONSTRAINT `sessao_ibfk_2` FOREIGN KEY (`num_sala`) REFERENCES `sala` (`num_sala`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_sessao`) REFERENCES `sessao` (`id_sessao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
