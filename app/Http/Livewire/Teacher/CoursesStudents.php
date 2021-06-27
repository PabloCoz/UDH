<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $course, $search;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('dictated', $course);
        
    }
    public function render()
    {
        $students = $this->course->students()
                    ->where('name', 'LIKE', '%' . $this->search . '%' )
                    ->paginate(4);
                    
        return view('livewire.teacher.courses-students', compact('students'))->layout('layouts.teacher', ['course' => $this->course]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
