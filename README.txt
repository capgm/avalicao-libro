Tela Principal

A tela principal do aplicativo apresenta 4 links principais:

Formulário para Aluno: Este link o leva a um formulário onde você pode adicionar novos alunos ao sistema.

Formulário para Curso: Aqui, você pode adicionar novos cursos ao sistema.

Formulário para Matrícula: Este link o direciona a um formulário onde você pode realizar matrículas de alunos em cursos.

Todas as Consultas: Nesta seção, você terá acesso a consultas para visualizar informações sobre alunos, cursos e matrículas.

Como utilizar - Seguem as rotas para execução pelo postman

Rotas Disponíveis
Alunos
GET|HEAD /alunos/{id}

Controlador: AlunoController@index
Descrição: Retorna informações de um aluno específico com o ID fornecido.
POST /alunos

Controlador: AlunoController@store
Descrição: Cria um novo registro de aluno com base nos dados fornecidos.
GET|HEAD /alunos

Controlador: AlunoController@show
Descrição: Retorna todos os alunos cadastrados.
GET|HEAD /alunos/consulta/{nome}/{email}

Controlador: AlunoController@consulta
Descrição: Realiza uma consulta por nome e email do aluno.
GET|HEAD /alunos/relatorio

Controlador: AlunoController@relatorio
Descrição: Gera um relatório de alunos.
PUT /alunos/{id}

Controlador: AlunoController@update
Descrição: Atualiza as informações de um aluno existente com o ID fornecido.
DELETE /alunos/{id}

Controlador: AlunoController@destroy
Descrição: Deleta um aluno existente com o ID fornecido.
Cursos
POST /cursos

Controlador: CursoController@store
Descrição: Cria um novo registro de curso com base nos dados fornecidos.
GET|HEAD /cursos/{id}

Controlador: CursoController@index
Descrição: Retorna informações de um curso específico com o ID fornecido.
GET|HEAD /cursos

Controlador: CursoController@show
Descrição: Retorna todos os cursos cadastrados.
PUT /cursos/{id}

Controlador: CursoController@update
Descrição: Atualiza as informações de um curso existente com o ID fornecido.
DELETE /cursos/{id}

Controlador: CursoController@destroy
Descrição: Deleta um curso existente com o ID fornecido.
Aluno_Curso
GET|HEAD /aluno_curso/{aluno_id}/{curso_id}

Controlador: AlunoCursoController@index
Descrição: Retorna informações sobre a relação entre um aluno e um curso específico.
POST /aluno_curso

Controlador: AlunoCursoController@store
Descrição: Cria uma nova relação entre um aluno e um curso com base nos dados fornecidos.
PUT /aluno_curso/{aluno_id}/{curso_id}

Controlador: AlunoCursoController@update
Descrição: Atualiza a relação entre um aluno e um curso existente.
DELETE /aluno_curso/{aluno_id}/{curso_id}

Controlador: AlunoCursoController@destroy
Descrição: Deleta a relação entre um aluno e um curso existente.
Outros
GET|HEAD /formulario-aluno

Descrição: Rota para acessar um formulário de cadastro de aluno.
GET|HEAD /formulario-curso

Descrição: Rota para acessar um formulário de cadastro de curso.
GET|HEAD /matricula

Descrição: Rota para acessar uma página de matrícula de aluno em curso.
GET|HEAD /

Descrição: Página inicial da aplicação.
Ferramentas do Ignition (Ignição Laravel)
POST _ignition/execute-solution

Descrição: Endpoint para executar solução de problemas.
GET|HEAD _ignition/health-check

Descrição: Endpoint para verificar a saúde da aplicação.
POST _ignition/update-config

Descrição: Endpoint para atualizar a configuração do Ignition.
Observações
As rotas /alunos, /cursos e /aluno_curso estão relacionadas aos recursos de aluno, curso e relação aluno-curso, respectivamente.
Para cada rota, é fornecido o método HTTP e o controlador associado.
O README deve ser atualizado conforme novas rotas ou alterações na aplicação.


--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `sexo` enum('M','F','O') DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alunos_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;


--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;



--
-- Estrutura para tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Índices de tabela `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD KEY `aluno_curso_aluno_id_foreign` (`aluno_id`),
  ADD KEY `aluno_curso_curso_id_foreign` (`curso_id`);

--
-- Restrições para tabelas `aluno_curso`
--
ALTER TABLE `aluno_curso`
  ADD CONSTRAINT `aluno_curso_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aluno_curso_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;
COMMIT;


-- Consulta Relatorio


select c.titulo AS curso, a.sexo, SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) < 15 THEN 1 ELSE 0 END) AS menor_que_15_anos, SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 15 AND 18 THEN 1 ELSE 0 END) AS entre_15_e_18_anos, SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 19 AND 24 THEN 1 ELSE 0 END) AS entre_19_e_24_anos, SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 25 AND 30 THEN 1 ELSE 0 END) AS entre_25_e_30_anos, SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) > 30 THEN 1 ELSE 0 END) AS maior_que_30_anos FROM alunos as a inner join aluno_curso AS ac ON a.id = ac.aluno_id inner join cursos AS c ON ac.curso_id = c.id GROUP BY c.titulo, a.sexo;
