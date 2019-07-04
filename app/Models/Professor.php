<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Professor extends Model
{
    protected $table = "professores";
    protected $guarded = [];
    public $timestamps = false;

    public function curso()
    {
        return $this->hasOne(Curso::class);
    }

    public function getDataNascimentoFormatadaAttribute()
    {
        return Carbon::createFromFormat('Y-m-d',$this->data_nascimento)->format('d/m/Y');
    }

}
