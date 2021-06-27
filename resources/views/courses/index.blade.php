<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/logos/slide1.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl select-none">UNIVERSIDAD DE HUÁNUCO</h1>
                <p class="text-white text-lg mt-2 mb-4 select-none">Aprende con los mejores cursos de programación. C++, PHP, JS, AWS, y mucho mas...!!!</p>

                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('courses-index')

    <section class="mt-20 bg-gray-800 py-10">
        <h1 class="text-white text-3xl text-center font-bold select-none">UNIVERSIDAD DE HUÁNUCO</h1>
    </section>
</x-app-layout>