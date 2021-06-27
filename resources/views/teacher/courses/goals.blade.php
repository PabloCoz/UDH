<x-teacher-layout :course="$course">

    <div>
        @livewire('teacher.courses-goals', ['course' => $course], key('courses-goals'.$courses->id))
    </div>

    <div class="my-8">
        @livewire('teacher.courses-requirements', ['course' => $course], key('courses-requirements'.$courses->id))
    </div>

    <div>
        @livewire('teacher.courses-audiences', ['course' => $course], key('courses-audiences'.$courses->id))
    </div>
</x-teacher-layout>