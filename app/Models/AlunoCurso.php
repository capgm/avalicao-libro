<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{

    use HasFactory;

    protected $table = 'aluno_curso';

    public static function index()
    {
        return self::all();
    }

    public static function show($id)
    {
        return self::find($id);
    }

    protected $fillable = ['aluno_id', 'curso_id'];
    public $timestamps = true;
}
