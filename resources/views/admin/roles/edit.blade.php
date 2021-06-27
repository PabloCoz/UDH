@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1>Role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role,['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                @include('admin.roles.partials.form')
        </div>
        <div class="card-footer">
            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            
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