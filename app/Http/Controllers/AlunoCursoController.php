<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlunoCursoService;

class AlunoCursoController extends Controller
{

    protected $alunoCursoService;

    public function __construct(AlunoCursoService $alunoCursoService)
    {
        $this->alunoCursoService = $alunoCursoService;
    }

    public function index($aluno_id, $curso_id)
    {
        try {
            $alunoCurso = $this->alunoCursoService->find($aluno_id, $curso_id);

            // Retornar o aluno como JSON
            return response()->json($alunoCurso, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Curso não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {

        $alunoCurso = $this->alunoCursoService->create($request);
        return response()->json($alunoCurso, 200);
    }


    public function show()
    {
        try {

            return $this->alunoCursoService->getAll();

        } catch (\Exception $e) {
            return  response()->json(['error' => 'Erro ao recuperar AlunoCurso'], 500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $aluno_id, string $curso_id)
    {
        try {
            $aluno = $this->alunoCursoService->update($aluno_id, $curso_id, $request);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Matrícula não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $aluno_id, int $curso_id)
    {
        try {
            $aluno = $this->alunoCursoService->delete($aluno_id, $curso_id,);

            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Matrícula não encontrado'], 404);
        }
    }
}
