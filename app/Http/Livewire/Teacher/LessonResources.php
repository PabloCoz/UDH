<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;
    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
    public function render()
    {
        return view('livewire.teacher.lesson-resources');
    }

    public function save()
    {
        /* $this->validate([
            'files.*' =>'required'
        ]);

        
         foreach ($this->files as $file) {
            $url = $file->store('resources');

            $this->lesson->resources()->create([
            'url' => $url,
            ]);
        }
        $this->reset(['files']); */


        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resources');

        $this->lesson->resource()->create([
            'url' => $url
        ]);
        
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download()
    {
        /* foreach ($this->lesson->resources as $key) {
            return response()->download(storage_path('app/public/'. $key->url));
            break;
        } */

        return response()->download(storage_path('app/public/'.$this->lesson->resource->url));
    }

    public function destroy(Lesson $lesson)
    {
        /* foreach ($this->lesson->resources as $key){
            Storage::delete($key->url);
            $key->delete();
        }
        
        $this->lesson = Lesson::find($this->lesson->id); */

        Storage::delete($this->lesson->resource->url);
        $this->lesson->resource->delete();
        $this->lesson = Lesson::find($this->lesson->id);
    }
}
