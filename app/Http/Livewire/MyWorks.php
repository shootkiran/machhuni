<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MyWorks extends Component
{
    public function render()
    {
        $this->user= request()->user();
        $this->works = request()->user()->works;
        return view('livewire.my-works');
    }
}
