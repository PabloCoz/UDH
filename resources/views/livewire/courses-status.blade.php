<div class="mt-6">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="font-bold text-3xl mt-2">{{$current->name}}</h1>

            @if ($current->descriptions)
                <div class="text-gray-600">
                    {{$current->descriptions->name}}
                </div>
            @endif

            <div wire:click="completed" class="flex items-center mt-4 cursor-pointer">
                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-green-600"></i>
                    <p class="text-sm ml-2">Marca como terminado</p>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    <p class="text-sm ml-2">Marca como terminado</p>
                @endif
                
            </div>

            <div class="card mt-2 ">
                <div class="card-body flex items-center font-bold">
                    @if($this->previous)
                        <i wire:click="changeLesson({{$this->previous}})" class="fas fa-angle-double-left mr-1 cursor-pointer"></i>
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema Anterior</a>
                    @endif

                    @if($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente tema</a>
                        <i wire:click="changeLesson({{$this->next}})" class="fas fa-angle-double-right ml-1 cursor-pointer"></i>
                    @endif
                </div>
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full mr-4" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name.' '.$course->teacher->lastname}}</p>
                        <a class="text-red-500 font-bold text-sm" href="">{{'@'.Str::slug($course->teacher->name.$course->teacher->lastname, '')}}</a>
                    </div>
                </div>

                <p class="text-sm mt-6">{{$this->advance. '%'}} completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                        <div style="width:{{$this->advance. '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500 transition-all duration-1000"></div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->modules as $module)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2">{{$module->name}}</a>
                                <ul>
                                    @foreach ($module->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-green-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                                
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-red-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                   <span class="inline-block w-4 h-4  bg-red-500 rounded-full mr-2 mt-1"></span> 
                                                @endif
                                                
                                            @endif
                                            
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>