<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Lesson;
use App\Models\Module;
use App\Models\Platform;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $module, $lesson, $platforms, $name, $url, $platform_id = 1;

    protected $rules = [
        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
    ];
    public function mount(Module $module)
    {
        $this->module = $module;

        $this->lesson = new Lesson();

        $this->platforms = Platform::all();
    }

    public function render()
    {
        return view('livewire.teacher.courses-lesson');
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    public function update()
    {
        if ($this->lesson->platform_id == 2) {
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();

        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->module = Module::find($this->module->id);
    }

    public function cancel()
    {
        $this->lesson = new Lesson();
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        ];

        if ($this->platform_id == 2) {
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate($rules);

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'module_id' => $this->module->id,
        ]);

        $this->reset([
            'name',
            'platform_id',
            'url',
        ]);

        $this->module = Module::find($this->module->id);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $this->module = Module::find($this->module->id);
    }
}
