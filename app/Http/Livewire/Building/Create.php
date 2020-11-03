<?php

namespace App\Http\Livewire\Building;

use Livewire\Component;
use App\Models\Building; 
class Create extends Component
{

    protected $rules = [
            'name' => 'required|string|max:180',
            'city' => 'required|string|max:30|in:tehran,qeshem,bandar',
            'address' => 'required|string|max:1280',
            'google_map_url'=>'required|string|max:180'
    ];

    public $name;
    public $city = 'tehran';
    public $address;
    public $google_map_url;

    public function render()
    {
        return view('livewire.building.create');
    }

    public function createBuilding()
    {
        $this->validate();

        $attributes = [
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'google_map_url'=> $this->google_map_url
        ];

        $building = Building::create($attributes);

        session()->flash('message', $building->id);
        $this->restAll();

    }

    protected function restAll()
    {
         $this->name = ' ';
         $this->city = 'tehran';
         $this->address = ' ';
         $this->google_map_url = ' ';
    }
}
