<div class="card" x-data = "{open : false}">
    <div class="card-body bg-gray-100">
        <header>
            <h1 @click="open = !open" class="cursor-pointer">Recursos:</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1">
                        <button type="submit" class="btn btn-blue text-sm px-2 ml-2">Guardar</button>
                    </div>
                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        Cargando...
                    </div>
                    @error('file')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </form>
            @endif    
        </div>
    </div>
</div>


{{-- <div class="card">
    <div class="card-body bg-gray-100">
        <header>
            <h1>Recursos Descargables</h1>
        </header>

        <div>
            <hr class="my-2">
                <section class="my-3" x-data="{open : false}">
                    <a x-show="!open" @click="open = true" class="flex items-center cursor-pointer">
                        <i class="far fa-plus-square text-xl mr-1 text-red-600"></i>
                    </a>
                    
                    <form wire:submit.prevent="save" x-show="open">
                        <div class="flex items-center">
                            <input wire:model="file" type="file" class="rounded flex-1" multiple>
                            <button type="submit" class="block rounded text-white font-bold p-2 text-sm bg-green-500 mr-2">Añadir</button>
                            <button type="button" class="block rounded text-white font-bold p-2 text-sm bg-red-500" @click="open = false">Cancelar</button>
                        </div>

                        <div class="font-bold mt-1 text-red-500" wire:loading wire:target="files">
                            Cargando...
                        </div>

                        @error('file')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                </section> 
                
                @foreach ($lesson->resources as $item)
                    <div class="flex justify-between items-center mb-3">
                        <p><i wire:click="download" class="fas fa-download text-blue-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p> 
                        <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                    </div> 
                @endforeach
        </div>
    </div>
</div> --}}
