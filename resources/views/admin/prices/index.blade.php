@extends('adminlte::page')

@section('title', 'Price')

@section('content_header')
    <a class="btn btn-info btn-md float-right" href="{{route('admin.prices.create')}}">Añadir precios</a>
    <h1>Precios</h1>    
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
    @elseif(session('destroy'))
        <div class="alert alert-danger" role="alert">
            {{session('destroy')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>VALOR</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td>{{$price->value}}</td>
                            <td width="10px"><a href="{{route('admin.prices.edit', $price)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="POST">
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