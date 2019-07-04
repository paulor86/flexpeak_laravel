<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelatorioRequest;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use PDF;

class RelatoriosController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all()->pluck('nome','id');
        $cursos = Curso::all()->pluck('nome','id');
        $professores = Professor::all()->pluck('nome','id');
        return PDF::loadView('relatorios.index',compact('alunos','cursos','professores'));
    }
}