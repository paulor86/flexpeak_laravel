@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
<a href="{{route('curso.create')}}" class="btn btn-danger pull-right"><span class="fa fa-plus"></span> Cadastrar</a>           

    <p>Crie e gerencie os cursos da instituição</p>
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
                            <th width="100">Id Curso</th>
                            <th>Curso</th>
                            <th>Professor</th>
                            <th width="100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($cursos))
                            @foreach($cursos as $curso)
                                <tr>
                                    <td>{{$curso->id}}</td>
                                    <td>{{$curso->nome}}</td>                                    
                                    <td>{{$curso->professor->nome}}</td>
                                    <td>
                                    <a href="{{route('curso.edit',$curso->id)}}" class="btn btn-default" style="display:inline"><span class="fa fa-pencil"></span></a>
                                    {!!Form::open(['route'=>['curso.destroy',$curso->id],'style'=>'display:inline','method'=>'delete'])!!}
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

