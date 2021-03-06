@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Editar Categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($category,['route' =>['admin.categories.update', $category], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de la categoria']) !!}
                </div>

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop