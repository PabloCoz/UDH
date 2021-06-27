<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded text-gray-700 mr-4 focus:outline-none">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los cursos
            </button>


            <div class="relative mr-4" x-data="{open : false}">
                <button @click="open = !open " @click.away="open = false" class="block h-12 overflow-hidden bg-white shadown rounded focus:outline-none px-4 text-gray-700">
                    <i class="fas fa-tags text-xs ml-2"></i>
                        Categorias
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div x-show="open" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">   
                    @foreach ($categories as $category)
                        <a wire:click="$set('category_id', {{$category->id}})" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            {{$category->name}}
                        </a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

            <div class="relative" x-data="{open : false}">
                <button @click="open = !open " @click.away="open = false" class="block h-12 overflow-hidden bg-white shadown rounded focus:outline-none px-4 text-gray-700">
                    <i class="fas fa-align-justify"></i>
                        Niveles
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div x-show="open" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">   
                    @foreach ($levels as $level)
                        <a wire:click="$set('level_id', {{$level->id}})" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-300 cursor-pointer">
                            {{$level->name}}
                        </a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-18 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
    
</div>