<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{

    protected $table = 'aluno_curso';
    protected $primaryKey = ['aluno_id', 'curso_id']; // Define uma chave primária composta
    public $incrementing = false; // Indica que a chave primária não é autoincrementável

    public static function deleteRecord($aluno_id, $curso_id)
    {
        // Utilize a cláusula where para encontrar e excluir o registro diretamente
        $deleted = self::where('aluno_id', $aluno_id)
            ->where('curso_id', $curso_id)
            ->delete();

        return $deleted; // Retorna true se um registro foi excluído, false caso contrário
    }
}
