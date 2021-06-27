@extends('adminlte::page')

@section('title', 'Price')

@section('content_header')
    <h1>Editar Precios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($price,['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::text('value', null, ['class' => 'form-control']) !!}

                    @error('value')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-dark']) !!}
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