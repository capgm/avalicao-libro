<?php

namespace App\Services;

use App\Models\Matricula;

class MatriculaService
{
    public function criarMatricula($dados)
    {
        return Matricula::create($dados);
    }

    public function obterMatriculaPorId($id)
    {
        return Matricula::findOrFail($id);
    }

    public function atualizarMatricula($id, $dados)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->update($dados);
        return $matricula;
    }

    public function deletarMatricula($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
    }

    public function listarTodasMatriculas()
    {
        return Matricula::all();
    }
}
