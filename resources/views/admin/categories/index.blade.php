@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <a class="btn btn-secondary btn-md float-right" href="{{route('admin.categories.create')}}">Nueva Categoria</a>
    <h1>Categorias</h1>
@stop

@section('content')

    @if (session('update'))
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px"><a href="{{route('admin.categories.edit', $category)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger px-2" type="submit">Eliminar</button>
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