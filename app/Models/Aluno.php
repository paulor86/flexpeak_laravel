<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aluno extends Model
{
    protected $table = "alunos";
    protected $guarded = [];
    public $timestamps = false;
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function getDataNascimentoAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }
}
