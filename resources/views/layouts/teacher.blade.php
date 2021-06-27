<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-1 lg:grid-cols-5 gap-6">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del Curso</h1>
        
                    <ul class="text-sm">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.edit', $course) border-green-500 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.edit', $course)}}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('teacher.courses.curriculum', $course) border-green-500 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.curriculum', $course)}}">Módulos y Lecciones</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('teacher.courses.goals', $course) border-green-500 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.goals', $course)}}">Mas datos</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.students', $course) border-green-500 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.students', $course)}}">Alumnos</a>
                        </li>

                        @if ($course->observation)
                            <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.observation', $course) border-green-500 @else border-transparent @endif pl-2">
                                <a href="{{route('teacher.courses.observation', $course)}}">Observaciones</a>
                            </li>
                        @endif
                    </ul>

                    @switch($course->status)
                        @case(1)
                            <form action="{{route('teacher.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="block rounded text-sm font-bold text-white bg-red-500 p-3" type="submit">Solicitar Revisión</button>
                            </form>
                            @break
                        @case(2)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Este curso se encuentra en Revisión
                                </div>
                            </div>
                            @break
                        @case(3)
                        <div class="card text-gray-500">
                            <div class="card-body">
                                Este curso se encuentra publicado
                            </div>
                        </div>
                            @break
                        @default
                            
                    @endswitch
                </aside>
        
                <div class="lg:col-span-4 card">
                    <main class="card-body">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')
        @stack('script')
        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
