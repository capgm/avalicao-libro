<form method="POST" action="{{ url('/alunos') }}">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
    </select>
    <br>
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" required>
    <br>
    <button type="submit">Incluir</button>
</form>

<form method="POST"  action="{{ url('/alunos') }}" id="meuFormulario">
    @csrf
    @method('PUT')
    <label for="nome">Id Aluno:</label>
    <input type="text" id="idCampo" name="id" value="" required>
    <br>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="" required>
    <br>
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="M" selected>Masculino</option>
        <option value="F">Feminino</option>
    </select>
    <br>
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" value="" required>
    <br>
    <button type="submit">Alterar</button>
</form>

<form method="POST" action="{{ url('/alunos') }}" id="meuFormularioDelete">
    @csrf
    @method('DELETE')
    <label for="nome">Id Aluno:</label>
    <input type="text" id="idCampo" name="id" value="" required>
    <button type="submit">Deletar</button>
</form>

<script>

    document.getElementById('meuFormulario').addEventListener('submit', function(event) {
        var id = document.getElementById('idCampo').value;

        if(id === '' || id === undefined){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/alunos') }}" + '/' + id;
        }

    });

    document.getElementById('meuFormularioDelete').addEventListener('submit', function(event) {
        var id = document.getElementById('idCampo').value;

        if(id === '' || id === undefined){
            alert("Preencha o campo id!");
        }else{
            this.action = "{{ url('/alunos') }}" + '/' + id;
        }

    });

</script>
