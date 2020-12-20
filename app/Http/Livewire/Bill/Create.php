<?php

namespace App\Http\Livewire\Bill;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Building;
use Str;
use Livewire\WithFileUploads;
use App\Rules\ItemChecker;

class Create extends Component
{
     
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $photo;
    public $building_id ;
    public $category_id;
    public $items;

    public $buildings;
    public $categories;

    public $itemCount = 0;
    public function render()
    {
        $this->buildings = Building::latest()->get();
        $this->categories = Category::latest()->get();

        $this->building_id = $this->buildings[0]->id;
        $this->category_id = $this->categories[0]->id;
        $this->itemCount = 1;

        return view('livewire.bill.create');
    }

    public function createBill()
    {
          $rules = [
            'name' => 'required|string|max:180',
            'description' => 'required|string|max:180',
            'price' => 'required|integer|max:9223372036854775807',
            'photo' => 'required|mimes:jpeg,bmp,png|file|max:4096',
            'building_id'=>'required|integer|max:9223372036854775807|exists:buildings,id',
            'category_id'=>'required|integer|max:9223372036854775807|exists:categories,id',
            'items.*.name' => 'required|string|min:6|max:150',
            'posts.*.price' => 'required|string|max:500',
            'posts.*.count' => 'required|string|max:500',
            
        ];
        $this->validate($rules);

         $imageName = Str::uuid() . (string)time();
        
        $this->photo->storeAs(Bill::$whereToSaveImage, $imageName);

        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image_url' => $imageName,
            'building_id'=>$this->building_id,
            'category_id'=>$this->category_id,
            'items' =>$this->items,
           
        ];
        $attributes['creator_id'] = request()->user()->id;


        $bill = Bill::create($attributes);

        session()->flash('message', $bill->id);
        $this->restAll();



    }

     protected function restAll()
    {

        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = '';
        $this->building_id = $this->buildings[0]->id;
        $this->category_id = $this->categories[0]->id;
        $this->itemCount = 1;

        $this->items = [];

       
         
    }
}
