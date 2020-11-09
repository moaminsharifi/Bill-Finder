<?php

namespace App\Http\Livewire\Building;
use App\Models\Building;

use Livewire\Component;

class Index extends Component
{
   
    public $smt = 10;

    public function render()
    {
        $buildings = Building::all();
        
        return view('livewire.building.index' , ['buildings' =>$buildings]);
    }
}
