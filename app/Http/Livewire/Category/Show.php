<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class Show extends Component
{
    public $category;

    public function render()
    {
        
        return view('livewire.category.show');
    }
}
