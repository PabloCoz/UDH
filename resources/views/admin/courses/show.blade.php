<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-72 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="h-72 w-full object-cover" src="" alt="">
                @endif
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> NIVEL: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas fa-align-justify"></i> CATEGORIA: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> MATRICULADOS: {{$course->students_count}}</p>
                <p class="mb-2"><i class="fas fa-star"></i> CALIFICACION: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        @if (session('info'))
            <div class="col-span-3" x-data="{open:true}" x-show="open">
                <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <p>{{session('info')}}</p>
                    <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                        <svg @click="open = !open" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                </div>
            </div>
            
        @endif
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas:</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @empty
                            <li class="text-gray-700 text-base"><i class="fas fa-times text-gray-600 mr-2"></i>Este curso no tiene asignado las metas</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold txt-3xl mb-2">Temario:</h1>

                @forelse ($course->modules as $module)
                    <article class="mb-4 shadow"
                       @if ($loop->first)
                            x-data ='{temario : true}'
                        @else
                            x-data ='{temario : false}'
                       @endif >
                        <header @click="temario = !temario" class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600">{{$module->name}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show='temario'>
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($module->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="far fa-play-circle mr-2 text-green-400"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso no tiene secciones asignadas
                        </div>
                    </article>
                @endforelse
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl">Requisitos:</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty
                        <li class="text-gray-700 text-base">Este curso no tiene asignado los requerimientos</li>
                    @endforelse
                </ul>
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion:</h1>

            <div class="text-base text-gray-700">
                {!!$course->description!!}
            </div>
                
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="rounded-full h-12 w-12 object-cover shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof: {{$course->teacher->name.' '.$course->teacher->lastname}}</h1>
                            <a class="text-red-500 text-sm font-bold" href="">{{'@'.Str::slug($course->teacher->name.$course->teacher->lastname, '')}}</a>
                        </div>
                    </div>
                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button class="block rounded p-3 text-white font-bold bg-blue-500 w-full" type="submit">Aprobar curso</button>
                    </form>

                    <a class="block rounded p-3 text-white font-bold bg-red-500 w-full text-center mt-4" href="{{route('admin.courses.observation', $course)}}">Observar Curso</a>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>