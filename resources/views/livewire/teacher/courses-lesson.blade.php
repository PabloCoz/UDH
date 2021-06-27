<div>
    @foreach ($module->lessons as $item)
        <article class="card mt-4" x-data="{open : false}">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input wire:model="lesson.name" type="text" class="rounded w-full">
                        </div>

                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select class="w-full rounded" wire:model="lesson.platform_id">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL: </label>
                            <input wire:model="lesson.url" type="text" class="rounded w-full">
                        </div>

                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type=" submit" class="block rounded p-2 text-black font-bold text-sm bg-yellow-400">Actualizar</button>
                            <button type="button" class="block rounded p-2 text-white font-bold text-sm bg-red-500 ml-1" wire:click="cancel">Cancelar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 @click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-red-500 mr-1"></i>Lección: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">

                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="my-2 flex">
                            <button class="block rounded p-2 font-bold text-sm text-white bg-blue-500 mr-1" wire:click="edit({{$item}})">Editar</button>
                            <button class="block rounded p-2 font-bold text-sm text-white bg-red-500" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>

                        <div class="mb-4">
                            @livewire('teacher.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                        </div>

                        <div>
                            @livewire('teacher.lesson-resources', ['lesson' => $item], key('lesson-resources'.$item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div class="mt-4" x-data="{open : false}">
        <a x-show="!open" @click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-xl mr-1 text-red-600"></i>
            <h3 class="text-base font-semibold">Agregar Lecciones</h3>
        </a>

        <article class="card mt-2" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>

                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="name" type="text" class="rounded w-full">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma: </label>
                        <select class="w-full rounded" wire:model="platform_id">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('platform_id')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL: </label>
                        <input wire:model="url" type="text" class="rounded w-full">
                    </div>

                    @error('url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="block p-2 rounded text-white font-bold bg-red-500" @click="open = false">Cancelar</button>
                    <button class="block p-2 rounded text-white font-bold bg-green-500 ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
