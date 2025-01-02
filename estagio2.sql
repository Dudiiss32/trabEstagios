-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12/12/2024 às 22:21
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `cep`, `isVisible`) VALUES
(1, 'Cidade Nova', '12345678', 1),
(2, 'São Cristóvão', '23456789', 1),
(3, 'Jardim Alegre', '34567890', 0),
(4, 'Vila Esperança', '45678901', 1),
(5, 'Bela Vista', '56789012', 1),
(6, 'Santa Maria', '67890123', 0),
(7, 'Campo Verde', '78901234', 1),
(8, 'Lago Azul', '89012345', 1),
(9, 'Monte Alto', '90123456', 1),
(10, 'Flor da Serra', '01234567', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idOrientador` int DEFAULT NULL,
  `emailOrientador` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `idOrientador`, `emailOrientador`, `isVisible`) VALUES
(6, 'Informática para Internet', 1, 'orientador1@instituto.com', 1),
(7, 'Meio Ambiente', 2, 'orientador2@instituto.com', 1),
(8, 'Viticultura e Enologia', 3, 'orientador3@instituto.com', 1),
(9, 'Administração', 4, 'orientador4@instituto.com', 1),
(10, 'Agropecuária', 5, 'orientador5@instituto.com', 1),
(21, 'Informática para Internet', 11, 'orientador1@instituto.com', 1),
(22, 'Meio Ambiente', 12, 'orientador2@instituto.com', 1),
(23, 'Viticultura e Enologia', 13, 'orientador3@instituto.com', 1),
(24, 'Administração', 14, 'orientador4@instituto.com', 1),
(25, 'Agropecuária', 15, 'orientador5@instituto.com', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cnpj` int NOT NULL,
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `funcaoRepresentante` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cpfRepresentante` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rgRepresentante` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numConvenio` int DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `endereco`, `telefone`, `email`, `cnpj`, `representante`, `funcaoRepresentante`, `cpfRepresentante`, `rgRepresentante`, `numConvenio`, `isVisible`) VALUES
(1, 'Tech Solutions', 'Rua das Flores, 123', 987654321, 'contato@techsolutions.com', 123456789, 'João Silva', 'Diretor', '12345678901', '1234567', 1, 1),
(2, 'Green Farms', 'Av. Central, 456', 219876543, 'info@greenfarms.com', 987654321, 'Maria Oliveira', 'Gerente', '23456789012', '2345678', 2, 1),
(3, 'Innovative Tech', 'Praça da Liberdade, 789', 319876543, 'suporte@innovativetech.com', 876543210, 'Carlos Pereira', 'CTO', '34567890123', '3456789', 3, 1),
(4, 'Eco Energia', 'Rua Verde, 1011', 419876543, 'eco@ecoenergia.com', 765432109, 'Ana Costa', 'CEO', '45678901234', '4567890', 4, 1),
(5, 'Global Trade', 'Av. Internacional, 1213', 519876543, 'contact@globaltrade.com', 654321098, 'Pedro Lima', 'Supervisor', '56789012345', '5678901', 5, 1),
(6, 'Agro Vida', 'Estrada Rural, 1415', 619876543, 'contato@agrovida.com', 543210987, 'Sofia Mendes', 'Diretora', '67890123456', '6789012', 6, 1),
(7, 'TechnoWare', 'Rua Digital, 1617', 719876543, 'sales@technoware.com', 432109876, 'Lucas Rocha', 'Engenheiro', '78901234567', '7890123', 7, 1),
(8, 'Safe Health', 'Rua da Saúde, 1819', 819876543, 'help@safehealth.com', 321098765, 'Fernanda Alves', 'Médica', '89012345678', '8901234', 8, 1),
(9, 'Future Vision', 'Av. do Futuro, 2021', 919876543, 'vision@futurevision.com', 210987654, 'Roberto Santana', 'Consultor', '90123456789', '9012345', 9, 1),
(10, 'Bright Ideas', 'Rua da Inovação, 2223', 101987654, 'info@brightideas.com', 109876543, 'Mariana Duarte', 'Analista', '12345098765', '1234509', 10, 1),
(11, 'Empresa Teste', 'Rua Osvaldo Aranha', 999999999, 'empresa@gmail.com', 30, 'Representante', 'Função', '02323023000', '32123132', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estagio`
--

CREATE TABLE `estagio` (
  `id` int NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargaHoraria` int NOT NULL,
  `idEstudante` int NOT NULL,
  `idEmpresa` int NOT NULL,
  `nomeSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargoSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefoneSupervisor` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idCidade` int NOT NULL,
  `idCoorientador` int DEFAULT NULL,
  `idOrientador` int NOT NULL,
  `tipoProcesso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `planoAtividades` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `relatorioFinal` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `autoavaliacaoEmpresa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `autoavaliacao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `termoCompromisso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1',
  `dataInicio` date DEFAULT '2024-01-01',
  `dataFinal` date DEFAULT '2024-12-31'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estagio`
--

INSERT INTO `estagio` (`id`, `area`, `cargaHoraria`, `idEstudante`, `idEmpresa`, `nomeSupervisor`, `cargoSupervisor`, `telefoneSupervisor`, `emailSupervisor`, `representante`, `idCidade`, `idCoorientador`, `idOrientador`, `tipoProcesso`, `status`, `planoAtividades`, `relatorioFinal`, `autoavaliacaoEmpresa`, `autoavaliacao`, `termoCompromisso`, `isVisible`, `dataInicio`, `dataFinal`) VALUES
(11, 'Informática', 200, 78, 11, 'Ricardo Silva', 'Diretor', '996212835', 'ricardo@gmail.com', 'Representante', 3, NULL, 12, 'Digital', 'Inicial', '675aad45f3abe.pdf', '', '675abb6e2f94e.pdf', '', NULL, 1, '2024-01-01', '2024-06-04'),
(12, 'Agropecuária', 300, 79, 9, 'Laura Monteiro  ', 'Gerente de Produção ', '998378845', 'monteiro@gmail.com', 'Representante', 5, 14, 15, 'Digital', 'Inicial', '', '', '', '', '', 1, '2024-01-01', '2024-12-31'),
(13, 'Informática', 200, 84, 11, 'Supervisor', 'Desenvolvedor', '996178835', 'supervisor@gmail.com', 'Representante', 3, NULL, 14, 'Digital', 'Inicial', '', '', '', '', '', 1, '2024-01-01', '2024-12-31'),
(14, 'Informática', 0, 74, 1, 'BaccuS Sustainability', 'aaaa', '54996178835', 'sistemabaccus@gmail.com', 'Representante', 2, NULL, 9, 'Digital', 'Inicial', '', '', '', '', '', 1, '2002-02-02', '2024-02-20'),
(15, 'Informática', 200, 74, 1, 'Teste', 'Gerente de Produção ', '999999999', 'supervisor@gmail.com', 'Representante', 10, NULL, 9, 'Digital', 'Inicial', '', '', '', '', '', 1, '2024-02-10', '2024-04-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estudante`
--

CREATE TABLE `estudante` (
  `id` int NOT NULL,
  `matricula` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `rg` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idCurso` int NOT NULL,
  `idCidade` int NOT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estudante`
--

INSERT INTO `estudante` (`id`, `matricula`, `nome`, `cpf`, `rg`, `endereco`, `telefone`, `email`, `idCurso`, `idCidade`, `isVisible`) VALUES
(74, 20230001, 'Ana Clara Silva', '12345678901', 'MG1234567', 'Rua A, 123, Centro', 987654321, 'ana.clara@email.com', 21, 1, 1),
(75, 20230002, 'Bruno Henrique Santos', '98765432109', 'SP7654321', 'Rua B, 456, Bairro Alto', 987654321, 'bruno.henrique@email.com', 22, 2, 1),
(76, 20230003, 'Carla Mendes Oliveira', '56789012345', 'RJ5678901', 'Av. Central, 789, Cidade Nova', 912345678, 'carla.oliveira@email.com', 23, 3, 1),
(77, 20230004, 'Daniel Costa Ferreira', '43210987654', 'ES4321098', 'Rua das Flores, 12, Jardim', 912345678, 'daniel.costa@email.com', 24, 4, 1),
(78, 20230005, 'Elisa Ramos Pereira', '89012345678', 'RS8901234', 'Rua Verde, 345, Vista Alegre', 987654321, 'elisa.pereira@email.com', 25, 5, 1),
(79, 20230006, 'Felipe Souza Andrade', '21098765432', 'PR2109876', 'Av. Azul, 678, Centro', 987654321, 'felipe.andrade@email.com', 21, 6, 1),
(80, 20230007, 'Gabriela Tavares Lima', '34567890123', 'SC3456789', 'Rua Amarela, 901, Jardim América', 976543210, 'gabriela.lima@email.com', 22, 7, 1),
(81, 20230008, 'Henrique Matos Silva', '65432109876', 'BA6543210', 'Rua Laranja, 234, São José', 976543210, 'henrique.silva@email.com', 23, 8, 1),
(82, 20230009, 'Isabela Martins Rocha', '87654321098', 'PE8765432', 'Rua Roxa, 567, Nova Esperança', 965432109, 'isabela.rocha@email.com', 24, 9, 1),
(83, 20230010, 'João Pedro Carvalho', '09876543210', 'CE0987654', 'Av. Lilás, 890, Cidade Jardim', 965432109, 'joao.carvalho@email.com', 25, 10, 1),
(84, 202310045, 'Mateus', '02222222222', '2222222222', 'mateusmmcalderam@gmail.com', 990000000, 'mateusmmcalderam@gmail.com', 21, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `siape` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `siape`, `email`, `isVisible`) VALUES
(9, 'Maria Silva', '1234567', 'maria.silva@universidade.com', 1),
(10, 'João Oliveira', '2345678', 'joao.oliveira@universidade.com', 1),
(11, 'Ana Costa', '3456789', 'ana.costa@universidade.com', 1),
(12, 'Carlos Pereira', '4567890', 'carlos.pereira@universidade.com', 1),
(13, 'Fernanda Lima', '5678901', 'fernanda.lima@universidade.com', 1),
(14, 'Ricardo Souza', '6789012', 'ricardo.souza@universidade.com', 1),
(15, 'Juliana Mendes', '7890123', 'juliana.mendes@universidade.com', 1),
(16, 'Pedro Alves', '8901234', 'pedro.alves@universidade.com', 1),
(17, 'Sofia Rocha', '9012345', 'sofia.rocha@universidade.com', 1),
(18, 'Lucas Santos', '0123456', 'lucas.santos@universidade.com', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` int NOT NULL DEFAULT '1',
  `idProfessor` int DEFAULT NULL,
  `idEstudante` int DEFAULT NULL,
  `idEmpresa` int DEFAULT NULL,
  `token_recuperacao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expiracao` datetime DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `nivel`, `idProfessor`, `idEstudante`, `idEmpresa`, `token_recuperacao`, `token_expiracao`, `isVisible`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, NULL, NULL, NULL, 1),
(30, 'mateusmmcalderam@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 84, NULL, NULL, NULL, 1),
(31, 'empresa@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', 2, NULL, NULL, 11, NULL, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrientador` (`idOrientador`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `representante` (`representante`);

--
-- Índices de tabela `estagio`
--
ALTER TABLE `estagio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstudante` (`idEstudante`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idCidade` (`idCidade`),
  ADD KEY `idCoorientador` (`idCoorientador`),
  ADD KEY `idOrientador` (`idOrientador`);

--
-- Índices de tabela `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCurso` (`idCurso`),
  ADD KEY `idCidade` (`idCidade`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_professor` (`idProfessor`),
  ADD KEY `fk_usuario_estudante` (`idEstudante`),
  ADD KEY `fk_usuario_empresa` (`idEmpresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `estagio`
--
ALTER TABLE `estagio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idOrientador`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `estagio`
--
ALTER TABLE `estagio`
  ADD CONSTRAINT `estagio_ibfk_1` FOREIGN KEY (`idEstudante`) REFERENCES `estudante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_3` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_5` FOREIGN KEY (`idCoorientador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_6` FOREIGN KEY (`idOrientador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `estudante`
--
ALTER TABLE `estudante`
  ADD CONSTRAINT `estudante_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `estudante_ibfk_2` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario_estudante` FOREIGN KEY (`idEstudante`) REFERENCES `estudante` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario_professor` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
