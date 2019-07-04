@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
    <p>Crie e gerencie os alunos da instituição</p>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger col-md-12">      
            @if(isset($aluno))      
                {!! Form::model($aluno, ['route'=>['aluno.show',$aluno->id], 'method'=>'put'])!!}
            @endif
            <div class="form-group col-md-8"> 
                {!!Form::label('nome', 'Nome do Aluno:')!!}
                {!!Form::text('nome',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4"> 
                {!!Form::label('data_nascimento', 'Data de Nascimento:')!!}
                {!!Form::date('data_nascimento',null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group col-md-8"> 
                {!!Form::label('logradouro', 'Logradouro:')!!}
                {!!Form::text('logradouro',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4"> 
                {!!Form::label('numero', 'Número:')!!}
                {!!Form::text('numero',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6"> 
                {!!Form::label('bairro', 'Bairro:')!!}
                {!!Form::text('bairro',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6"> 
                {!!Form::label('cidade', 'Cidade:')!!}
                {!!Form::text('cidade',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6"> 
                {!!Form::label('estado', 'Estado:')!!}
                {!!Form::text('estado',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6"> 
                {!!Form::label('cep', 'CEP:')!!}
                {!!Form::text('cep',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6"> 
                {!!Form::label('curso_id', 'Nome do Curso:')!!}
                {!!Form::select('curso_id',$cursos,null, ['class'=>'form-control','placeholder'=>'Selecione o Curso'])!!}
            </div>            

            {!!Form::close()!!}
            </div>
        </div>
    </div>
@stop