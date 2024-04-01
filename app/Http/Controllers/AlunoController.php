<?php

namespace App\Http\Controllers;

use App\Services\AlunoService;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    protected $alunoService;

    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }

    public function index(string $id)
    {

        try {
            $aluno = $this->alunoService->getById($id);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }
    }

    public function consulta(string $nome, string $email)
    {

        try {
            $aluno = $this->alunoService->consultaNomeEmail($nome, $email);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return  response()->json(['error' => 'Erro na consulta'], 404);
        }


    }

    public function relatorio()
    {

        try {

            $relatorio = $this->alunoService->relatorio();
            // Retornar o aluno como JSON
            return response()->json($relatorio, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro no relatório'], 404);
        }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        return  $this->alunoService->criarAluno($request);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        return  $this->alunoService->listarTodosAlunos();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $aluno = $this->alunoService->atualizarAluno($request, $id);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $aluno = $this->alunoService->deletarAluno($id);

            // Retornar o aluno como JSON
            return response()->json($aluno, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }
    }
}
