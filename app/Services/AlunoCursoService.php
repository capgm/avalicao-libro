<?php

namespace App\Services;

use App\Models\AlunoCurso;

class AlunoCursoService
{

    public function index()
    {
        return AlunoCurso::all();
    }

    public function store($aluno_id, $curso_id)
    {
    }

    public function find($aluno_id, $curso_id)
    {
        return  AlunoCurso::where('aluno_id', '=', $aluno_id)
            ->where('curso_id', '=', $curso_id)
            ->get();
    }

    public function getAll()
    {
        return AlunoCurso::all();
    }

    public function getById($id)
    {
        return AlunoCurso::find($id);
    }

    public function create($data)
    {
        $alunoCurso = new AlunoCurso();
        $alunoCurso->curso_id  = $data->input('curso_id');
        $alunoCurso->aluno_id = $data->input('aluno_id');
        $alunoCurso->save();

        return $alunoCurso;
    }

    public function update($id, $data)
    {
        $alunoCurso = AlunoCurso::find($id);
        if (!$alunoCurso) {
            return false;
        }

        $alunoCurso->fill($data);
        return $alunoCurso->save();
    }

    public function delete($aluno_id, $curso_id)
    {

        try {
            // Encontre o registro que você deseja deletar
            $registro = AlunoCurso::where('aluno_id',  $aluno_id)
                ->where('curso_id',$curso_id)
                ->first();

            if ($registro) {
                // Deleta o registro encontrado
                $registro->delete();
                return response()->json(['mensagem' => 'Registro deletado com sucesso!'], 200);
            } else {
                return response()->json(['error' => 'Registro não encontrado'], 404);
            }
        } catch (\Exception $e) {

            return response()->json(['error' => $e, 'trace' => $e, 'aluno' => $aluno_id, 'curso' => $curso_id, 'aluno_curso' => $registro, 'mensagem_erro' => $e->getMessage()], 404);
        }
    }
}
