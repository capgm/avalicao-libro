<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AlunoCursoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;


// Rotas de controle
Route::get('/', function () {
    return view('home');
});

Route::get('/formulario-aluno', function () {
    return view('aluno');
});

Route::get('/formulario-curso', function () {
    return view('curso');
});

Route::get('/matricula', function () {
    return view('matricula');
});

Route::get('/consultas', function () {
    return view('consultas');
});

//Aluno
Route::get('/alunos/{id}', [AlunoController::class, 'index']);
Route::post('/alunos', [AlunoController::class, 'store']);
Route::get('/alunos', [AlunoController::class, 'show']);
Route::put('/alunos/{id}', [AlunoController::class, 'update']);
Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);
Route::get('/alunos/consulta/{nome}/{email}', [AlunoController::class, 'consulta']);
Route::get('/relatorio', [AlunoController::class, 'relatorio']);

// Curso
Route::get('/cursos/{id}', [CursoController::class, 'index']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::get('/cursos', [CursoController::class, 'show']);
Route::put('/cursos/{id}', [CursoController::class, 'update']);
Route::delete('/cursos/{id}', [CursoController::class, 'destroy']);

// Aluno Curso
Route::get('/aluno_curso', [AlunoCursoController::class, 'show']);
Route::get('/aluno_curso/{aluno_id}/{curso_id}', [AlunoCursoController::class, 'index']);
Route::post('/aluno_curso', [AlunoCursoController::class, 'store']);
Route::get('/aluno_curso', [AlunoCursoController::class, 'show']);
Route::put('/aluno_curso/{aluno_id}/{curso_id}', [AlunoCursoController::class, 'update']);
Route::delete('/aluno_curso/{aluno_id}/{curso_id}', [AlunoCursoController::class, 'destroy']);

