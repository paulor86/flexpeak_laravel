<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $guarded =[];
    public $timestamps = false;

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);    
    }
}
