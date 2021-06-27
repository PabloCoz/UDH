@extends('adminlte::page')

@section('title', 'Level')

@section('content_header')
    <h1>Actualizar Nivel</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($level, ['route' =>['admin.levels.update', $level], 'method'=> 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del nivel']) !!}
            </div>

            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror

            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
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