<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\Professor;

class CursosController extends Controller
{
    
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index',['cursos'=>$cursos]);
    }

    
    public function create()
    {
        $professores = Professor::all()->pluck('nome','id');
        return view('cursos.form',['professores'=>$professores]);
    }

    
    public function store(CursoRequest $request)
    {
        Curso::create($request->all()+['data_criacao'=>date('Y-m-d')]);
        return  redirect()
        ->route('curso.index')
        ->with('mensagem','Curso cadastrado com sucesso');   
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $professores = Professor::all()->pluck('nome','id');
        $curso = Curso::findOrFail($id);
        return view('cursos.form',['curso'=>$curso,'professores'=>$professores]);
    }

    
    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        $curso->save();
        return  redirect()
        ->route('curso.index')
        ->with('mensagem','Dados atualizado com sucesso');
    }

    
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id)->delete();
        if($curso){            
            return  redirect()->back()
            ->with('mensagem','Curso excluido com sucesso');
        }
        return  redirect()->back()->withErrors('error','Falha ao excluir curso');
    }
}
