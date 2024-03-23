<h1>Cadastro Matricula</h1>

<form method="POST" action="{{ url('/aluno_curso') }}">
    @csrf
    <label for="aluno_id">ID do Aluno:</label>
    <input type="text" id="aluno_id" name="aluno_id">
    <br>
    <label for="curso_id">ID do Curso:</label>
    <input type="text" id="curso_id" name="curso_id">
    <br>
    <button type="submit" name="action" value="incluir">Incluir</button>
</form>


<form method="POST" action="{{ url('/aluno_curso') }}" id="meuFormularioDelete">
    @csrf
    @method('DELETE')
    <label for="aluno_id">ID do Aluno:</label>
    <input type="text" id="aluno_id_delete" name="aluno_id_delete" value="">
    <br>
    <label for="curso_id">ID do Curso:</label>
    <input type="text" id="curso_id_delete" name="curso_id_delete" value="">
    <br>

    <button type="submit" name="action" value="alterar">Deletar</button>
</form>
<script>

    document.getElementById('meuFormularioDelete').addEventListener('submit', function(event) {
        var aluno_id = document.getElementById('aluno_id_delete').value;
        var curso_id = document.getElementById('curso_id_delete').value;

        if((aluno_id === '' || aluno_id === undefined) && (curso_id === '' || curso_id === undefined)){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/aluno_curso') }}" + '/' + aluno_id + '/' + curso_id;
        }
    });

</script>
