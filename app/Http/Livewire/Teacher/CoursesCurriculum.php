<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;
    public $course, $module, $name;

    protected $rules = [
        'module.name' => 'required',
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->module = new Module();

        $this->authorize('dictated', $course);
    }

    public function render()
    {
        return view('livewire.teacher.courses-curriculum')->layout('layouts.teacher', ['course' => $this->course]);
    }

    public function edit(Module $module)
    {
        $this->module = $module;
    }

    public function update()
    {
        $this->validate();
        $this->module->save();
        $this->module = new Module();

        $this->course = Course::find($this->course->id);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        Module::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Module $module)
    {
        $module->delete();
        $this->course = Course::find($this->course->id);
    }
}
