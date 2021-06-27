<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $courses = Course::where('user_id', auth()->user()->id)
                    ->where('title', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate(10);
        return view('livewire.teacher.courses-index', compact('courses'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
