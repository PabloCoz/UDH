<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR CURSO</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'teacher.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    @include('teacher.courses.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Crear Curso', ['class' => 'bg-green-500 block text-white font-bold rounded p-3 cursor-pointer hover:bg-green-700']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/form.js')}}"></script>
    </x-slot>
</x-app-layout>