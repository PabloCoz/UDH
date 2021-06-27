<x-teacher-layout :course="$course">
    <h1 class="text-2xl font-bold">OBSERVACIONES DEL CURSOS</h1>
        <hr class="mt-2 mb-6">

    <div class="text-gray-500">
        {!!$course->observation->body!!}
    </div>
</x-teacher-layout>