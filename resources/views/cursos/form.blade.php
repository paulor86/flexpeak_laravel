@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
    <p>Crie e gerencie os cursos da instituição</p>
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
            @if(isset($curso))      
                {!! Form::model($curso, ['route'=>['curso.update',$curso->id], 'method'=>'put'])!!}
            @else
                {!! Form::open(['route'=>'curso.store', 'method'=>'post'])!!}
            @endif
            <div class="form-group col-md-8"> 
                {!!Form::label('nome', 'Nome do Curso:')!!}
                {!!Form::text('nome',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4"> 
                {!!Form::label('professor_id', 'Nome do Professor:')!!}
                {!!Form::select('professor_id',$professores,null, ['class'=>'form-control','placeholder'=>'Selecione o Professor'])!!}
            </div>
            <div class="form-group col-md-12">                
                {!!Form::submit('Salvar',['class'=>'btn btn-danger'])!!}
            </div>

            {!!Form::close()!!}
            </div>
        </div>
    </div>
@stop