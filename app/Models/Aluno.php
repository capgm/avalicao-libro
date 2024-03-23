<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function consulta(){

    }

    public function relatorio(){

    }
}
