<x-teacher-layout :course="$course">

    
    <h1 class="font-bold text-2xl">INFORMACION GENERAL DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['teacher.courses.update', $course] , 'method' => 'put', 'files' => true]) !!}
        
        @include('teacher.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar información', ['class' => 'bg-blue-500 block text-white font-bold rounded p-3 cursor-pointer']) !!}
        </div>
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/form.js')}}"></script>
    </x-slot>
</x-teacher-layout>