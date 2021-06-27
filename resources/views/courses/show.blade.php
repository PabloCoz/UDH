<x-app-layout>
    <section class="bg-gray-900 mb-10">
        <div class="container py-12 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-72 w-full object-cover rounded select-none" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            

            <div class="text-white">
                <h1 class="text-3xl font-bold my-1">{{$course->title}}</h1>
                <h1 class="text-lg mb-6">{{$course->subtitle}}</h1>
                <p><i class="fas fa-users mr-2"></i>{{$course->students_count}} estudiantes</p>
                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow': 'gray'}}-400"></i></li>
                    </ul>
                    <p class="ml-2">({{$course->rating}})</p>
                </div>
                <a href="#">Prof. {{$course->teacher->name.' '.$course->teacher->lastname}}</a>
                <div class="flex items-center mt-6">
                    <i class="fas fa-chart-line"></i><p class="mx-1">{{$course->level->name}}</p>
                    <i class="fas fa-align-justify ml-3"></i><p class="mx-1">{{$course->category->name}}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas:</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold txt-3xl mb-2">Temario:</h1>

                @foreach ($course->modules as $module)
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
                @endforeach
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl">Requisitos:</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
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
                    @can('enrolled', $course)
                        <a href="{{route('courses.status', $course)}}" class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block mt-4">Continuar con el curso</a>
                    @else
                        @if ($course->price->value == 0)
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">GRATIS</p>
                            <form action="{{route('courses.enrolled', $course)}}" method="POST">
                                @csrf
                                <button class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block" type="submit">Llevar curso</button>
                            </form>
                        @else
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{$course->price->value}}</p>
                            <a href="{{route('payment.checkout', $course)}}" class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block">Comprar este curso</a>
                        @endif
                    @endcan
                </div>
            </section>


            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 35)}}</a>
                            </h1>

                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="text-sm text-gray-700 ml-2">{{$similar->teacher->name}}</p>
                            </div>

                            <p class="text-sm">
                                <i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>