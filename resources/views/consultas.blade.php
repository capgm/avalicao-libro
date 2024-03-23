<h1>Painel de Consultas</h1>
<br>
<br>

<form method="GET" action="{{ url('/alunos')  }}">
    <button type="submit">Consultar todos os alunos</button>
</form>

<form method="GET" action="{{ url('/alunos')  }}" id="consultaAlunoByID">
    <label for="nome">Id Aluno:</label>
    <input type="text" id="aluno_id" name="aluno_id" value="" required>
    <button type="submit">Consultar aluno por Id</button>
</form>

<form method="GET" action="{{ url('/alunos/consulta')  }}" id="consultaAlunoByNomeEmail">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="" required>
    <label for="nome">E-mail:</label>
    <input type="text" id="email" name="email" value="" required>
    <button type="submit">Consultar aluno por nome e e-mail</button>
</form>

<form method="GET" action="{{ url('/alunos/relatorio')}}">
    <button type="submit">Consultar total alunos for faixa etaria e curso</button>
</form>

<form method="GET" action="{{ url('/cursos')}}">
    <button type="submit" name="action" value="consultar">Consultar Todos os cursos</button>
</form>

<form method="GET" action="{{ url('/cursos')}}" id="consultaCursoByID">
    <label for="nome">Id Curso:</label>
    <input type="text" id="curso_id" name="curso_id" value="" required>
    <button type="submit" name="action" value="consultar">Consultar curso por Id</button>
</form>

<form method="GET" action="{{ url('/aluno_curso') }}" id="consultaMatricula">
    <label for="nome">Id Curso:</label>
    <input type="text" id="curso_id_matricula" name="curso_id_matricula" value="" required>
    <label for="nome">Id Aluno:</label>
    <input type="text" id="aluno_id_matricula" name="aluno_id_matricula" value="" required>
    <button type="submit" name="action" value="consultar">Consultar matricula por Id</button>
</form>

<script>

    document.getElementById('consultaAlunoByID').addEventListener('submit', function(event) {
        var aluno_id = document.getElementById('aluno_id').value;

        if((aluno_id === '' || aluno_id === undefined)){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/alunos') }}" + '/' + aluno_id;
        }
    });

    document.getElementById('consultaCursoByID').addEventListener('submit', function(event) {
        var curso_id = document.getElementById('curso_id').value;

        if((curso_id === '' || curso_id === undefined)){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/cursos') }}" + '/' + curso_id;
        }
    });

    document.getElementById('consultaAlunoByNomeEmail').addEventListener('submit', function(event) {
        var nome = document.getElementById('nome').value;
        var email = document.getElementById('email').value;
        this.action = "{{ url('/alunos/consulta') }}" + '/' + nome + "/" + email;
    });

    document.getElementById('consultaMatricula').addEventListener('submit', function(event) {
        var aluno_id = document.getElementById('aluno_id_matricula').value;
        var curso_id = document.getElementById('curso_id_matricula').value;
        this.action = "{{ url('/aluno_curso') }}" + '/' + aluno_id + "/" + curso_id;
    });

</script>
