<?php

namespace App\Services;

use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class AlunoService
{
    public function criarAluno($dados)
    {
        $aluno = new Aluno();
        $aluno->nome = $dados->input('nome');
        $aluno->email = $dados->input('email');
        $aluno->sexo = $dados->input('sexo');
        $aluno->data_nascimento = $dados->input('data_nascimento');
        $aluno->save();

        return $aluno;
    }

    public function getById($id)
    {
        return Aluno::findOrFail($id);
    }

    public function atualizarAluno($dados, $id)
    {
        $aluno = Aluno::findOrFail($id);

        // Atualizar os atributos do aluno com os dados da requisição
        $aluno->nome = $dados->input('nome');
        $aluno->email = $dados->input('email');
        $aluno->sexo = $dados->input('sexo');
        $aluno->data_nascimento = $dados->input('data_nascimento');
        // Atualizar outros campos, se necessário

        // Salvar as alterações no banco de dados
        $aluno->save();

        // Retornar uma resposta, se necessário
        return response()->json(['message' => 'Aluno atualizado com sucesso'], 200);
    }

    public function deletarAluno($id)
    {
        Aluno::findOrFail($id)->delete();

        return response()->json(['message' => 'Aluno excluído com sucesso'], 200);
    }

    public function listarTodosAlunos()
    {
        return Aluno::all();
    }

    public function consultaNomeEmail($nome, $email)
    {

        $nomeDecodificado = urldecode($nome);
        $emailDecodificado = urldecode($email);

        return  Aluno::where('nome', '=', $nomeDecodificado)
            ->where('email', '=', $emailDecodificado)
            ->get();
    }

    public function relatorio()
    {

        try {
            return  DB::table('alunos AS a')
                ->select(
                    'c.titulo AS curso',
                    'a.sexo',
                    DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) < 15 THEN 1 ELSE 0 END) AS menor_que_15_anos'),
                    DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 15 AND 18 THEN 1 ELSE 0 END) AS entre_15_e_18_anos'),
                    DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 19 AND 24 THEN 1 ELSE 0 END) AS entre_19_e_24_anos'),
                    DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) BETWEEN 25 AND 30 THEN 1 ELSE 0 END) AS entre_25_e_30_anos'),
                    DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, a.data_nascimento, CURDATE()) > 30 THEN 1 ELSE 0 END) AS maior_que_30_anos')
                )
                ->join('aluno_curso AS ac', 'a.id', '=', 'ac.aluno_id')
                ->join('cursos AS c', 'ac.curso_id', '=', 'c.id')
                ->groupBy('c.titulo', 'a.sexo');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
