<x-app-layout>

    <section class="relative container mt-32">
        <div class="">
            <div class="card">
                <div>
                    <img class="h-96 w-full object-cover" src="{{asset('img/logos/slide1.jpg')}}" alt="">
                </div>
                <div>
                    <img class="h-96 w-full object-cover" src="{{asset('img/logos/slide2.jpg')}}" alt="">
                </div>
                <div>
                    <img class="h-96 w-full object-cover" src="{{asset('img/logos/slide3.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </section>

    <section class="container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 my-16">
            <div class="col-span-1 card">
                <article class="card-body">
                    <figure class="items-center">
                        <img src="{{asset('img/fotos/foto1.jpg')}}" class="h-28 w-28 object-cover rounded-full mx-auto" alt="">
                    </figure>
                    <p class="mt-4 text-sm text-gray-500 text-justify font-semibold">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio magnam vel inventore error maiores amet. 
                        Atque, nihil praesentium id voluptatum voluptates laborum
                    </p>
                </article>
            </div>

            <div class="col-span-1 card">
                <article class="card-body">
                    <figure class="items-center">
                        <img src="{{asset('img/fotos/foto1.jpg')}}" class="h-28 w-28 object-cover rounded-full mx-auto" alt="">
                    </figure>
                    <p class="mt-4 text-sm text-gray-500 text-justify font-semibold">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio magnam vel inventore error maiores amet. 
                        Atque, nihil praesentium id voluptatum voluptates laborum
                    </p>
                </article>
            </div>

            <div class="col-span-1 card">
                <article class="card-body">
                    <figure class="items-center">
                        <img src="{{asset('img/fotos/foto1.jpg')}}" class="h-28 w-28 object-cover rounded-full mx-auto" alt="">
                    </figure>
                    <p class="mt-4 text-sm text-gray-500 text-justify font-semibold">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio magnam vel inventore error maiores amet. 
                        Atque, nihil praesentium id voluptatum voluptates laborum
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-green-500 py-12 text-center text-white">
        <h1 class="mx-auto text-4xl font-bold">
            UNIVERSIDAD DE HUÁNUCO
        </h1>
        <h3 class="text-2xl font-medium mt-4">¿No sabes que curso llevar?</h3>
        <p class="mb-6">Dirígete a nuestro catalogo de cursos</p>
        <a href="{{route('courses.index')}}" class="bg-red-500 p-3 rounded font-semibold hover:bg-red-700">Catálogo de Cursos</a>
    </section>
    
    <section class="mt-20">
        <h1 class="text-center text-gray-600 text-3xl">ULTIMOS CURSOS</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>

    <section class="mt-20 bg-gray-800 py-10">
        <h1 class="text-white text-3xl text-center font-bold select-none">UNIVERSIDAD DE HUÁNUCO</h1>
    </section>
</x-app-layout>

<script>
        new Glider(document.querySelector('.card'), {
            slidesToShow: 1,
            dots: '.dots',
            draggable: false,
            
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
                }
            });
</script>
