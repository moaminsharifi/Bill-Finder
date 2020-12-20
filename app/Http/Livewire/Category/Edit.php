<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class Edit extends Component
{
    public $category;
    
    protected $rules  = [
        'name' => 'required|string|max:180',
        'description' => 'required|string|max:1280',
       
        
    ];
    public $name;
    public $description;
   

    public function render()
    {
        return view('livewire.category.edit');
    }
    public function mount($category)
    {
        $this->category = $category;
        $this->setAll();
    }

    public function updateCategoryModel()
    {

        $this->validate();


         $imageName = Str::uuid() . (string)time();
        
        $this->photo->storeAs(Category::$whereToSave, $imageName);

        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            
           
        ];



        
        
        $this->category->update($attributes);
        $this->category->fresh();
        $this->setAll();
        session()->flash('message', $this->category->id);



        # code...
    }
    protected function setAll()
    {
         $this->name = $this->category->name;
         $this->description = $this->category->description;
        
        
    }
     protected function setAllEmpty()
    {
         $this->name = '';
         $this->description = '';
       
         
    }

}
