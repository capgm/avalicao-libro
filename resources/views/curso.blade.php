<h1>Cadastro Curso</h1>
<br>
<form method="POST" action="{{ url('/cursos') }}">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo">
    <br>
    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao"></textarea>
    <br>
    <button type="submit" name="action" value="incluir">Incluir</button>
</form>

<!-- Formulário para alterar curso -->
<form method="POST" action="{{ url('/cursos')}}" id="meuFormulario">
    @csrf
    @method('PUT')

    <label for="nome">Id curso:</label>
    <input type="text" id="idCampo" name="id" value="" required>
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="">
    <br>
    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao"></textarea>
    <br>

    <button type="submit" name="action" value="alterar">Alterar</button>
</form>

<form method="POST" action="{{ url('/cursos') }}">
    @csrf
    @method('DELETE')
    <label for="nome">Id curso:</label>
    <input type="text" id="idCampo" name="id" value="" required>

    <button type="submit" name="action" value="deletar">Deletar</button>
</form>
<script>

    document.getElementById('meuFormulario').addEventListener('submit', function(event) {
        var id = document.getElementById('idCampo').value;

        if(id === '' || id === undefined){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/cursos') }}" + '/' + id;
        }

    });

    document.getElementById('meuFormularioDelete').addEventListener('submit', function(event) {
        var id = document.getElementById('idCampo').value;

        if(id === '' || id === undefined){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/cursos') }}" + '/' + id;
        }

    });

</script>
