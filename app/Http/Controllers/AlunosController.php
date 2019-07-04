<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\Curso;

class AlunosController extends Controller
{
    
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index',['alunos'=>$alunos]);
    }

    
    public function create()
    {
        $cursos = Curso::all()->pluck('nome','id');
        return view('alunos.form',['cursos'=>$cursos]);
    }

    
    public function store(AlunoRequest $request)
    {
        Aluno::create($request->all()+['data_criacao'=>date('Y-m-d')]);
        return  redirect()
        ->route('aluno.index')
        ->with('mensagem','Aluno cadastrado com sucesso');
    }

    
    public function show($id)
    {
        $cursos = Curso::all()->pluck('nome','id');
        $aluno = Aluno::findOrFail($id);
        return view('alunos.info',['aluno'=>$aluno,'cursos'=>$cursos]);
    }

    
    public function edit($id)
    {
        $cursos = Curso::all()->pluck('nome','id');
        $aluno = Aluno::findOrFail($id);
        return view('alunos.form',['aluno'=>$aluno,'cursos'=>$cursos]);
    }

    
    public function update(AlunoRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());
        $aluno->save();
        return  redirect()
        ->route('aluno.index')
        ->with('mensagem','Dados atualizado com sucesso');
    }

    
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id)->delete();
        if($aluno){            
            return  redirect()->back()
            ->with('mensagem','Aluno excluido com sucesso');
        }
        return  redirect()->back()->withErrors('error','Falha ao excluir aluno');
    }
}
