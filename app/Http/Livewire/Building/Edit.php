<?php

namespace App\Http\Livewire\Building;

use Livewire\Component;

class Edit extends Component
{
    public $building;

    protected $rules = [
            'name' => 'required|string|max:180',
            'city' => 'required|string|max:30|in:tehran,qeshem,bandar',
            'address' => 'required|string|max:1280',
            'google_map_url'=>'required|string|max:1280'
    ];

    public $name;
    public $city = 'tehran';
    public $address;
    public $google_map_url;
    public function render()
    {
        
        return view('livewire.building.edit');


    }
    public function mount($building)
    {
        $this->building = $building;
        $this->setAll();
    }

    public function updateBuildingModel()
    {

        $this->validate();

        $attributes = [
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'google_map_url'=> $this->google_map_url
        ];

        
        
        $this->building->update($attributes);
        $this->building->fresh();
        $this->setAll();
        session()->flash('message', $this->building->id);



        # code...
    }
    protected function setAll()
    {
         $this->name = $this->building->name;
         $this->city = $this->building->city;
         $this->address = $this->building->address;
         $this->google_map_url = $this->building->google_map_url;
    }
     protected function setAllEmpty()
    {
         $this->name = '';
         $this->city = '';
         $this->address = '';
         $this->google_map_url = '';
    }

}
