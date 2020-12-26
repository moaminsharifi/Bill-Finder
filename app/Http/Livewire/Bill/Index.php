<?php

namespace App\Http\Livewire\Bill;

use Livewire\Component;
use DataTables;
use App\Models\Bill;

class Index extends Component
{
    public $bills = False;
    public function render()
    {

        // $data = ;
        $this->bills = Bill::latest()->get() ;
       

        return view('livewire.bill.index');
    }
}
