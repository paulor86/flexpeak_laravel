@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
<a href="{{route('aluno.create')}}" class="btn btn-danger pull-right"><span class="fa fa-plus"></span> Cadastrar</a>           

    <p>Crie e gerencie os Alunos da instituição</p>
    <br>
    @if(session('mensagem'))
        <div class="alert alert-success">{{session('mensagem')}}</div>
    @endif
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
                <div class="box box-danger">        
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Data de Nascimento</th>
                            <th>Curso</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($alunos))
                        @foreach($alunos as $aluno)
                            <tr>
                                <td>{{$aluno->nome}}</td>
                                <td>{{$aluno->data_nascimento}}</td>                                
                                <td>{{$aluno->curso->nome}}</td>
                                <td>
                                <a href="{{route('aluno.show',$aluno->id)}}" class="btn btn-info" style="display:inline"><span class="fa fa-info-circle"></span></a>
                                <a href="{{route('aluno.edit',$aluno->id)}}" class="btn btn-default" style="display:inline"><span class="fa fa-pencil"></span></a>
                                {!!Form::open(['route'=>['aluno.destroy',$aluno->id],'style'=>'display:inline','method'=>'delete'])!!}
                                <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span></button>
                                {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

