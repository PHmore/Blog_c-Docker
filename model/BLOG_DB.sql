-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database_mysql
-- Tempo de geração: 25/10/2023 às 22:56
-- Versão do servidor: 8.1.0
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `BLOG_DB`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `id_art` int NOT NULL,
  `id_user` int NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Rascunho',
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `artigos`
--

INSERT INTO `artigos` (`id_art`, `id_user`, `titulo`, `texto`, `status`, `data_criado`, `data_atualizacao`) VALUES
(1, 40, 'TodaMatéria', 'Artigos são palavrasfdfque vêm antes dos substantivos e servem para especificar ou generalizar o seu sentido.\r\n\r\nOs artigos podem ser definidos e indefinidos.\r\nArtigo definido\r\n\r\nOs artigos definidos (o, a, os, as) definem ou individualizam, de forma precisa, os substantivos, que podem ser uma pessoa, objeto ou lugar.\r\nArtigo Definido 	Gênero 	Número\r\no 	masculino 	singular\r\na 	feminino 	singular\r\nos 	masculino 	plural\r\nas 	feminino 	plural\r\n\r\nExemplos:\r\n\r\n    O garoto foi jantar na casa dos pais.\r\n    Ganhamos a bicicleta que esperávamos.\r\n    Luísa aproveitou para rever os amigos.\r\n    As meninas foram viajar.\r\n\r\nEm todos os exemplos, podemos notar a precisão de tais pessoas ou objetos pelo emprego correto do artigo definido. Isso porque ele determina de maneira exata o substantivo em questão: o garoto, a bicicleta, os amigos e as meninas.\r\n\r\nAssim, fica claro que o artigo definido indica, de modo particular, o substantivo já conhecido. Note que estes estão presentes no texto ou no pensamento do locutor (emissor, autor) ou do interlocutor (receptor, ouvinte).\r\nArtigo indefinido\r\n\r\nOs artigos indefinidos (um, uma, uns, umas) determinam de maneira vaga, indeterminada ou imprecisa, uma pessoa, objeto ou lugar ao qual não se fez menção anterior no texto.\r\nArtigo Indefinido 	Gênero 	Número\r\num 	masculino 	singular\r\numa 	feminino 	singular\r\nuns 	masculino 	plural\r\numas 	feminino 	plural\r\n\r\nExemplos:\r\n\r\n    Um dia iremos nos encontrar.\r\n    Uma certa tarde, saímos para caminhar.\r\n    Joana convidou para a festa uns amigos estrangeiros.\r\n    Comprei umas camisas para seu aniversário.\r\n\r\nNote que em todos os exemplos acima, não está definindo qual objeto, pessoa ou lugar. Nos dois primeiros exemplos, não está identificado “qual o dia” ou “qual a tarde” em que o evento ocorre.\r\n\r\nDa mesma maneira, Joana não especifica “quais amigos” ela convidará para a festa. Por fim, “umas camisas” corresponde a uma ideia vaga de “quais camisas” são essas.\r\n\r\nCuidado para não confundir o artigo indefinido “um” com o numeral “um”, pois o numeral é uma palavra utilizada para indicar quantidade.\r\nEmprego dos artigos\r\n\r\n1. Os artigos sempre devem concordar com o substantivo em gênero (masculino e feminino) e número (singular e plural). Exemplos:\r\n\r\n    o garoto - os garotos.\r\n    a menina - as meninas.\r\n    um mês - uns meses.\r\n    uma mesa – umas mesas.\r\n\r\n2. Os artigos podem ser combinados com preposições.\r\n\r\n    ao/aos (a + o/os). Exemplo: O texto é dedicado aos pais.\r\n    à/às (a + a/as). Exemplo: Vou à escola todas as manhãs.\r\n    da/das (de + a/as). Exemplo: Ganhamos muitos presentes da Inês.\r\n    do/dos (de + o/os). Exemplo: Os móveis eram dos nossos avós.\r\n    na/nas (em + a/as). Exemplo: O colar está nas coisas da Sônia.\r\n    no/nos (em + o/os). Exemplo: Encontramos o anel no corredor.\r\n    num/nuns (em + um/uns). Exemplo: Hoje estamos num congresso.\r\n    numa/numas (em + uma/umas). Exemplo: Almocei numa lanchonete essa semana.\r\n    dum/duns (de + um/uns). Exemplo: Os cadernos encontrados são dum pesquisador.\r\n    duma/dumas (de + uma/umas). Exemplo: Preciso dumas blusas para sair.\r\n\r\n3. De acordo com sua posição na frase, os artigos podem transformar qualquer tipo de palavra em substantivo, independentemente de sua classe gramatical. Exemplos:\r\n\r\n    O andar de Elisa é muito sensual. (neste caso, o verbo “andar” foi transformado em substantivo).\r\n    O vermelho de seus olhos indicou sua tristeza. (neste caso, o adjetivo “vermelho” foi transformado em substantivo).\r\n\r\n4. Os artigos definidos podem ser empregados com o intuito de indicar um conjunto de seres ou uma espécie inteira. Dessa forma, o artigo é empregado no singular, entretanto, faz referência a uma pluralidade de seres. Exemplos:\r\n\r\n    A alma é imortal. (refere-se ao conjunto de almas).\r\n    A goiaba é muito rica em vitamina C. (faz referência a todas as goiabas).\r\n\r\n5. Na construção das frases a utilização dos artigos indefinidos deve ser moderada, de modo que o excesso de seu uso no texto provoca um “inchaço” ou uma “redundância” desnecessária, tornando-o, deselegante e “pesado”. Exemplos:\r\n\r\n    Ter (uma) boa educação é fundamental.\r\n    São detentores de (um) bom conhecimento.\r\n\r\n6. Para uma adequada coesão textual, antes de pronome de sentido indefinido, utiliza-se as palavras como “tal, certo (a), outro (a)”. Exemplos:\r\n\r\n    Encontrei (uma) certa medalha na cômoda.\r\n    Natália não encontrou (um) outro casaco.\r\n\r\n7. O artigo indefinido é usado como recurso expressivo para reforçar enunciados exclamativos. Exemplos:\r\n\r\n    Foi um presente te encontrar!\r\n    A festa estava uma delícia!\r\n\r\nExercícios de artigo definido e indefinido\r\n\r\n1. (Fuvest) As duas manas Lousadas! Secas, escuras e gárrulas como cigarras, desde longos anos, em Oliveira, eram elas as esquadrinhadoras de todas as vidas, as espalhadoras de todas as maledicências, as tecedeiras de todas as intrigas. E na desditosa cidade, não existia nódoa, pecha, bule rachado, coração dorido, algibeira arrasada, janela entreaberta, poeira a um canto, vulto a uma esquina, bolo encomendado nas Matildes, que seus olhinhos furantes de azeviche sujo não descortinassem e que sua solta língua, entre os dentes ralos, não comentasse com malícia estridente.\r\n\r\n(Eça de Queirós, A ilustre Casa de Ramires)\r\n\r\nNo texto, o emprego de artigos definidos e a omissão de artigos indefinidos têm como efeito, respectivamente:\r\n\r\na) atribuir às personagens traços negativos de caráter; apontar Oliveira como cidade onde tudo acontece.\r\nb) acentuar a exclusividade do comportamento típico das personagens; marcar a generalidade das situações que são objeto de seus comentários.\r\nc) definir a conduta das duas irmãs como criticável; colocá-las como responsáveis pela maioria dos acontecimentos na cidade.\r\nd) particularizar a maneira de ser das manas Lousadas; situá-las numa cidade onde são famosas pela maledicência.\r\ne) associar as ações das duas irmãs; enfatizar seu livre acesso a qualquer ambiente na cidade.\r\n\r\n2. (UFMG) Os termos destacados a seguir classificam-se como artigos definidos, EXCETO em:\r\n\r\na) Os garis do sábado teriam que dar mais duro para compensar a redução da equipe da Comlurb.\r\nb) Todo mundo culpou a Companhia Municipal de Limpeza Urbana do Rio de Janeiro.\r\nc) A partir de fevereiro, as caçambas dobrarão de volume, de 120 litros para 240 litros.\r\nd) A areia das praias do Rio de Janeiro está coalhada de palitinhos, plásticos e cocos.\r\n\r\n3. (ITA) Determine o caso em que o artigo tem valor qualificativo:\r\n\r\na) Estes são os candidatos que lhe falei.\r\nb) Procure-o, ele é o médico! Ninguém o supera.\r\nc) Certeza e exatidão, estas qualidades não as tenho.\r\nd) Os problemas que o afligem não me deixam descuidado.\r\ne) Muito é a procura; pouca é a oferta.\r\n\r\nVeja também:\r\n\r\nExercícios sobre artigos (com respostas explicadas)\r\n\r\nClasses de palavras\r\nEstá estudando para o ENEM?\r\nEste é o conteúdo 3 de 11 para dominar Classe de palavras.\r\nConteúdo Anterior: Substantivos\r\nPróximo Conteúdo: Adjetivos\r\nDaniela Diana\r\nDaniela Diana\r\nLicenciada em Letras pela Universidade Estadual Paulista (Unesp) em 2008 e Bacharelada em Produção Cultural pela Universidade Federal Fluminense (UFF) em 2014. Amante das letras, artes e culturas, desde 2012 trabalha com produção e gestão de conteúdos on-line.\r\nVeja também\r\n\r\n    Numeral\r\n    Exercícios sobre artigos (com respostas explicadas)\r\n    Preposição\r\n    Pronomes\r\n    Conjunção: o que é, tipos e exemplos\r\n    Advérbio\r\n    Adjetivos\r\n    As 10 classes de palavras ou classes gramaticais\r\n\r\nLeitura Recomendada\r\n\r\n    As 10 classes de palavras ou classes gramaticais\r\n    Substantivos\r\n    Pronomes\r\n    Conjunção: o que é, tipos e exemplos\r\n    Adjetivos\r\n    Advérbio\r\n\r\nTópicos Relacionados\r\nLíngua Portuguesa\r\nMorfologia - Língua Portuguesa\r\nEstá estudando para o ENEM?\r\nEste é o conteúdo 3 de 11 para dominar Classe de palavras.\r\nPróximo Conteúdo: Adjetivos\r\n\r\n    Biologia Filosofia Física Geografia História Língua Portuguesa Literatura Matemática Química Inglês Enem Exercícios Todas as Matérias Populares Últimas Matérias \r\n\r\nSiga-nos:\r\nToda Matéria: conteúdos escolares.\r\n© 2011 - 2023 7graus\r\n\r\n    Vencedores Professor do Ano 2022\r\n    Como Citar\r\n    Contato\r\n    Política de Privacidade\r\n    Sobre\r\n    Termos de uso\r\n    RSS Feed\r\n\r\n', 'Publicado', '2023-10-20 23:02:08', '2023-10-22'),
(21, 40, 'a', 'a', 'Rascunho', '2023-10-21 02:19:58', '2023-10-21'),
(22, 40, 'nossa', 'nossa tá funcionando', 'Publicado', '2023-10-21 02:20:07', '2023-10-25'),
(23, 40, 'd', 'd', 'Publicado', '2023-10-21 02:20:19', '2023-10-21'),
(24, 40, 'e', 'e', 'Publicado', '2023-10-21 02:20:22', '2023-10-21'),
(25, 40, 'cd', 'cd', 'Publicado', '2023-10-21 02:20:34', '2023-10-21'),
(26, 40, 'dad', 'sda', 'Publicado', '2023-10-21 02:20:39', '2023-10-21'),
(27, 40, 'asd', 'asd', 'Publicado', '2023-10-21 02:20:44', '2023-10-21'),
(29, 40, 's', 'gfdg', 'Rascunho', '2023-10-21 17:50:15', '2023-10-21'),
(30, 40, 'sfafsa', 'adfs', 'Publicado', '2023-10-21 17:50:21', '2023-10-21'),
(31, 40, 'amo ser dev', 'Na verdade não na vdd sim', 'Publicado', '2023-10-21 18:24:07', '2023-10-22'),
(32, 40, 'Não amo ser dev', 'Amo sim não mais', 'Rascunho', '2023-10-21 18:24:19', '2023-10-22'),
(37, 40, 'asdf', 'adf', 'Rascunho', '2023-10-21 23:55:13', '2023-10-21'),
(38, 40, 'ds', 'sd', 'Rascunho', '2023-10-21 23:55:16', '2023-10-21'),
(39, 40, 'gfda', 'fdsa', 'Rascunho', '2023-10-21 23:55:26', '2023-10-21'),
(40, 40, 'grfa', 'graf', 'Rascunho', '2023-10-21 23:55:35', '2023-10-21'),
(41, 40, 'lop', 'lop', 'Rascunho', '2023-10-21 23:55:50', '2023-10-21'),
(53, 40, 'gdg', 'sgfdg', 'Rascunho', '2023-10-22 05:49:48', '2023-10-22'),
(54, 40, 'Texto inutil f', 'f', 'Rascunho', '2023-10-22 06:06:56', '2023-10-22'),
(55, 12, 'Como', 'Então toma', 'Publicado', '2023-10-22 07:40:45', '2023-10-23'),
(56, 12, 'Segura essa pedrada', 'Olá Patryck vi que você gostou do ultimo artigo gostaria que comentasse esse tbm comenta logo', 'Publicado', '2023-10-23 02:27:29', '2023-10-23'),
(57, 42, 'Murilinho', 'Eai amigo', 'Publicado', '2023-10-23 15:04:57', '2023-10-23'),
(58, 43, 'Eu não sei', 'Todo mundo tá rindo do palhaço, mas a cabeça do palhaço só Deus sabe como tá.', 'Publicado', '2023-10-23 22:49:17', '2023-10-23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_coment` int NOT NULL,
  `id_art` int NOT NULL,
  `id_user` int NOT NULL,
  `comentario` text NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id_coment`, `id_art`, `id_user`, `comentario`, `data_criado`, `data_atualizado`) VALUES
(1, 22, 12, ' muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal muito legal ', '2023-10-22 07:19:23', '2023-10-22 07:19:23'),
(5, 56, 4, 'Eita segurou ?', '2023-10-23 03:09:21', '2023-10-23 03:09:21'),
(7, 22, 4, 'ATENÇÃO existe comentários estourando as barras laterais', '2023-10-23 03:11:00', '2023-10-23 03:11:00'),
(8, 56, 41, 'Olá sou novo na plataforma', '2023-10-23 03:14:48', '2023-10-23 03:14:48'),
(9, 57, 40, 'Eai', '2023-10-23 22:43:57', '2023-10-23 22:43:57'),
(12, 56, 40, 'Blzzz', '2023-10-25 13:14:36', '2023-10-25 13:14:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `senha`, `email`) VALUES
(4, 'vitor', 'senha', '157@gmail.com'),
(12, 'phsilva', '1919', 'ficcao@gmail.com'),
(34, 'fsfsf', 'sdfaf', 'df@gmail'),
(35, 'fsfs', 'julho', 'sdfs@gamil.com'),
(36, 'fsdf', 'sfs', 'asd@gamil.com'),
(37, 'fds', 'sdf', 'sdfsf@gmail.com'),
(38, 'dfgd', 'ff', 'asd@gamil.com'),
(40, 'Patryck', '1919', 'cs573104@gmail.com'),
(41, 'Henryck', '1919', 'asd@gamil.com'),
(42, 'Murilo', '12345678', 'Mrmurilo04@gmail.com'),
(43, 'Krause', 'krausinho', 'felipe.krause@mail.uft.edu.br');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `user_id_fk` (`id_user`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_coment`),
  ADD KEY `usercoment_id_fk` (`id_user`),
  ADD KEY `art_id_fk` (`id_art`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id_art` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_coment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `art_id_fk` FOREIGN KEY (`id_art`) REFERENCES `artigos` (`id_art`),
  ADD CONSTRAINT `usercoment_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
