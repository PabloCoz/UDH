<div>
    <article class="card" x-data="{open :false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 @click="open = !open" class="cursor-pointer">Descripcion de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="w-full rounded" rows="3"></textarea>

                        @error('description.name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button type="submit" class="block p-2 text-black rounded font-semibold text-sm bg-green-500">Actualizar</button>
                            <button wire:click="destroy" type="button" class="block p-2 text-white rounded font-semibold text-sm bg-red-500 ml-2">Eliminar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name" class="w-full rounded" rows="3" placeholder="Agregue una descripción para la lección"></textarea>

                        @error('name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" type="submit" class="block p-2 text-black rounded font-semibold text-sm bg-yellow-500">Guardar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
