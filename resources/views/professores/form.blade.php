@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')
    <h1>Professores</h1>
@stop

@section('content')
    <p>Crie e gerencie os professores da instituição</p>
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
            @if(isset($professor))      
                {!! Form::model($professor, ['route'=>['professor.update',$professor->id], 'method'=>'put'])!!}
            @else
                {!! Form::open(['route'=>'professor.store', 'method'=>'post'])!!}
            @endif
            <div class="form-group col-md-8"> 
                {!!Form::label('nome', 'Nome do Professor:')!!}
                {!!Form::text('nome',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4"> 
                {!!Form::label('data_nascimento', 'Data de Nascimento:')!!}
                {!!Form::date('data_nascimento',null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group col-md-12">                
                {!!Form::submit('Salvar',['class'=>'btn btn-danger'])!!}
            </div>

            {!!Form::close()!!}
            </div>
        </div>
    </div>
@stop


