<div class="relative bg-yellow-50" x-data="{nav : false}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-5 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="{{route('home')}}">
            <x-jet-application-mark />
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button @click="nav = !nav" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-black hover:bg-gray-100 focus:outline-none">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
            
            <a href="{{route('home')}}" class="text-base text-gray-700 font-bold">
                Inicio
            </a>
            <div class="relative" x-data="{open : false}">
                <button @click="open = !open" type="button" class="text-gray-700 rounded-md inline-flex items-center text-base font-bold focus:outline-none">
                    <span>Cursos</span>
                        <svg class="text-gray-700 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                </button>
                <div class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-sm sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2" x-show="open" @click.away="open = false">
                    @livewire('menu-nav')
                </div>
                
            </div>
    
            <a href="#" class="text-base font-bold text-gray-700">
                Ayuda
            </a>
            <a href="#" class="text-base font-bold text-gray-700">
                Soporte
            </a>
        </nav>
        @auth
        <div class="hidden md:flex justify-end md:flex-1 lg:w-0" x-data="{perfil : false}">
            <div class="mr-14">
                <button @click="perfil = !perfil" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none">
                    <img class="h-9 w-9 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                </button>
            </div>

            <div class="absolute mt-10 w-48 rounded-md shadow-lg py-1 bg-white ring-black focus:outline-none" x-show="perfil" @click.away="perfil = false">
              <!-- Active: "bg-gray-100", Not Active: "" -->
                @can('Leer Cursos')
                    <a href="{{route('teacher.courses.index')}}" class="block px-4 py-2 text-sm text-gray-700">Docentes</a>
                @endcan

                @can('Ver Dashboard')
                    <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700">Administrador</a>
                @endcan
                <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700">Tu Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        Salir
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
        @else
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="{{route('login')}}" class="whitespace-nowrap text-base font-medium text-gray-700 underline hover:text-gray-900">
                    Iniciar Sesión
                </a>
                <a href="{{route('register')}}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-black bg-green-300 hover:bg-green-500 hover:text-white">
                    Regístrate
                </a>
            </div>
        @endauth
      </div>
    </div>

    <div class="block overflow-hidden top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" x-show="nav">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
          <div class="flex items-center justify-between">
            <div>
              <x-jet-application-logo />
            </div>
            <div class="-mr-2">
              <button @click="nav = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-black hover:bg-gray-100 focus:outline-none">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
              </button>
            </div>
          </div>
          <div class="mt-6">
            <nav class="grid gap-y-8">
                <a href="{{route('home')}}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                    <span class="ml-3 text-base font-medium text-gray-900">
                        Inicio
                    </span>
                </a>
  
                <a href="{{route('courses.index')}}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">                
                    <span class="ml-3 text-base font-medium text-gray-900">
                        Cursos
                    </span>
                </a>
  
                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                    <span class="ml-3 text-base font-medium text-gray-900">
                        Ayuda
                    </span>
                </a>
  
                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                    <span class="ml-3 text-base font-medium text-gray-900">
                        Soporte
                    </span>
                </a>
                @can('Leer Cursos')
                    <a href="{{route('teacher.courses.index')}}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <span class="ml-3 text-base font-medium text-gray-900">
                            Docentes
                        </span>
                    </a>
                @endcan

                @can('Ver Dashboard')
                    <a href="{{route('admin.home')}}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <span class="ml-3 text-base font-medium text-gray-900">
                            Administrador
                        </span>
                    </a>
                @endcan
            </nav>
          </div>
        </div>
        <div class="py-1 px-5 space-y-6">
            @auth
            <div>
                <p class="mt-2 text-center text-base font-bold text-gray-700">
                    {{ Auth::user()->name .' '. Auth::user()->lastname }}
                </p>

                <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <a class="w-full my-2 py-1 flex items-center justify-center px-4  border border-transparent rounded-md shadow-sm text-base font-medium text-black bg-green-300 hover:bg-green-500 hover:text-white"
                            href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            Salir
                        </a>
                    </form>
            </div>
            @else
                <div>
                    <a href="{{route('login')}}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-black bg-green-300 hover:bg-green-500 hover:text-white">
                        Login
                    </a>
                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                        ¿No tienes una cuenta?
                        <a href="{{route('register')}}" class="text-gray-700 underline hover:text-gray-800">
                            Regístrate
                        </a>
                    </p>
                </div>
            @endauth
        </div>
      </div>
    </div>
</div>