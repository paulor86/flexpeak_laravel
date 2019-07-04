<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;

class ProfessoresController extends Controller
{
    
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index',['professores'=>$professores]);
    }

    
    public function create()
    {
        return view('professores.form');
    }

    
    public function store(ProfessorRequest $request)
    {
        Professor::create($request->all()+['data_criacao'=>date('Y-m-d')]);
        return  redirect()
        ->route('professor.index')
        ->with('mensagem','Professor cadastrado com sucesso');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.form',['professor'=>$professor]);
    }

    
    public function update(ProfessorRequest $request, $id)
    {
        
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());
        $professor->save();
        return  redirect()
        ->route('professor.index')
        ->with('mensagem','Dados atualizado com sucesso');
    }

    
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id)->delete();
        if($professor){
            return  redirect()->back()
            ->with('mensagem','Professor excluido com sucesso');
        }
        return  redirect()->back()->withErrors('error','Falha ao excluir professor');
    }
}
