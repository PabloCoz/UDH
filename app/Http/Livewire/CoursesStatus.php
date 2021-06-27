<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CoursesStatus extends Component
{

    use AuthorizesRequests;
    public $course, $current;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson; 
                break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course); //test-1
    }

    public function render()
    {
        return view('livewire.courses-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;        
    }

    public function getIndexProperty()
    {
        return $this->index = $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        }else{
            return $this->previous = $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        }else{
            return $this->next = $this->course->lessons[$this->index + 1];
        }
    }

    public function completed()
    {
        if ($this->current->completed) {
            $this->current->users()->detach(auth()->user()->id);
        } else {
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    public function getAdvanceProperty()
    {
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        return round($advance, 2);
    }

    
}
