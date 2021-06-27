@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @elseif(session('update'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('update')}}</strong>
        </div>
    @elseif(session('delete'))
        <div class="alert alert-danger" role="alert">
            <strong>{{session('delete')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-warning" href="{{route('admin.roles.create')}}"><b>Crear Rol</b></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{route('admin.roles.edit', $role)}}" class="">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>    
                    @empty
                        <td colspan="4">No hay registros</td>
                    @endforelse
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