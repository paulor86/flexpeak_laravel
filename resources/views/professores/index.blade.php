@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')
    <h1>Professores</h1>
@stop

@section('content')
<a href="{{route('professor.create')}}" class="btn btn-danger pull-right"><span class="fa fa-plus"></span> Cadastrar</a>           

    <p>Crie e gerencie os professores da instituição</p>
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
                            <th>Professor</th>
                            <th>Data de Nascimento</th>
                            <th width="100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($professores))
                            @foreach($professores as $professor)
                                <tr>
                                    <td>{{$professor->nome}}</td>
                                    <td>{{$professor->data_nascimento_formatada}}</td>
                                    <td>
                                    <a href="{{route('professor.edit',$professor->id)}}" class="btn btn-default" style="display:inline"><span class="fa fa-pencil"></span></a>
                                    {!!Form::open(['route'=>['professor.destroy',$professor->id],'style'=>'display:inline','method'=>'delete'])!!}
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


