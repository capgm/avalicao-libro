<?php
namespace App\Services;

use App\Models\Curso;

class CursoService
{
    public function criarCurso($dados)
    {

        $curso = new Curso();
        $curso->titulo = $dados->input('titulo');
        $curso->descricao = $dados->input('descricao');
        $curso->save();

        return $curso;
    }

    public function getById($id)
    {
        return Curso::findOrFail($id);
    }

    public function atualizarCurso($id, $dados)
    {
        $curso = Curso::findOrFail($id);

        $curso->titulo = $dados->input('titulo');
        $curso->descricao = $dados->input('descricao');

        // Salvar as alterações no banco de dados
        $curso->save();

        // Retornar uma resposta, se necessário
        return response()->json(['message' => 'Curso atualizado com sucesso'], 200);
    }

    public function deletarCurso($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return response()->json(['message' => 'Curso excluído com sucesso'], 200);
    }

    public function listarTodosCursos()
    {
        return Curso::all();
    }
}

