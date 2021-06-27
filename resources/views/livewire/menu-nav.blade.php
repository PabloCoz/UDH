<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative bg-white px-5 py-6 sm:p-8">
        @foreach ($categories as $category)
            <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">                              
                <div class="ml-2">
                    <p class="text-sm font-medium text-gray-900">
                        {{$category->name}}
                    </p>
                </div>
            </a>
        @endforeach        
        
    </div>
    <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
        <div class="flow-root">
            <a href="{{route('courses.index')}}" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                <span class="ml-3 text-blue-600 underline font-bold">Mas cursos...</span>
            </a>
        </div>
    </div>
</div>
