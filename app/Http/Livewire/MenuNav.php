<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MenuNav extends Component
{
    public function render()
    {
        $categories = Category::all()
                        ->take(3);
        return view('livewire.menu-nav', compact('categories'));
    }
}
