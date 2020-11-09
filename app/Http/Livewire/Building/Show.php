<?php

namespace App\Http\Livewire\Building;

use Livewire\Component;

class Show extends Component
{
    public $building;
    public function render()
    {
        return view('livewire.building.show');
    }
}
