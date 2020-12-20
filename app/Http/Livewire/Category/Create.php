<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:180',
        'description' => 'required|string|max:1280',
        'photo' => 'required|mimes:jpeg,bmp,png|file|max:4096',
        
    ];
    public $name;
    public $description;
    public $photo;


    public function render()
    {
        return view('livewire.category.create');
    }

    public function createCategory()
    {
        $this->validate();


        

        $imageName = Str::uuid() . (string)time();
        
        $this->photo->storeAs(Category::$whereToSave, $imageName);

        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $imageName,
           
        ];

        $category = Category::create($attributes);

        session()->flash('message', $category->id);
        $this->restAll();


    }

    protected function restAll()
    {
         $this->name = ' ';
         $this->description = ' ';
         $this->photo = ' ';
         
    }
}
