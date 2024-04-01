<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Services\CursoService;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    protected $cursoService;

    public function __construct(CursoService $cursoService)
    {
        $this->cursoService = $cursoService;
    }

    public function index($id)
    {
        try {
            $curso = $this->cursoService->getById($id);

            // Retornar o aluno como JSON
            return response()->json($curso, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Curso não encontrado'], 404);
        }
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {

        $curso = $this->cursoService->criarCurso($request);

        return $curso;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $curso = $this->cursoService->listarTodosCursos();

            // Retornar o aluno como JSON
            return response()->json($curso, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Curso não encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $aluno = $this->cursoService->atualizarCurso($id, $request);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Curso não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $aluno = $this->cursoService->deletarCurso($id);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Curso não encontrado'], 404);
        }
    }
}
