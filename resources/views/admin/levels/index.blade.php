@extends('adminlte::page')

@section('title', 'Level')

@section('content_header')
    <a href="{{route('admin.levels.create')}}" class="btn btn-warning btn-md float-right">Crear Nivel</a>
    <h1>Niveles</h1>
@stop

@section('content')

    @if (session('create'))
        <div class="alert alert-primary" role="alert">
            {{session('create')}}
        </div>
    @elseif(session('update'))
        <div class="alert alert-success" role="alert">
            {{session('update')}}
        </div>
    @elseif(session('delete'))
    <div class="alert alert-danger" role="alert">
        {{session('delete')}}
    </div>
    @endif

    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="10px"><a href="{{route('admin.levels.edit', $level)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop