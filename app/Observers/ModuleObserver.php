<?php

namespace App\Observers;

use App\Models\Module;
use Illuminate\Support\Facades\Storage;

class ModuleObserver
{
    public function deleting(Module $module)
    {
        foreach ($module->lessons as $lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    }
}
