<div class="container py-8">
    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="clearPage" wire:model="search" class="form-input flex-1 shadow-sm" type="text" placeholder="Buscar...">
            <a class="font-bold p-2 rounded bg-red-500 text-white ml-2" href="{{route('teacher.courses.create')}}">Crear Curso</a>
        </div>
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)            
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full" src="{{Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full" src="" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$course->title}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{$course->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <ul class="flex text-sm">
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow': 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow': 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow': 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow': 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow': 'gray'}}-400"></i></li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">{{$course->rating}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break 
                                    @default
                                            
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('teacher.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No hay ningún registro
            </div>
        @endif
    </x-table-responsive>
</div>