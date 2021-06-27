@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Observacion para el curso: <strong>{{$course->title}}<strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' =>[ 'admin.courses.rejet', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del Curso') !!}
                    {!! Form::textarea('body', null)!!}

                    @error('body')
                        <strong class="text-danger">{{$mesaage}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop