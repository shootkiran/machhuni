<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;

class ListWorkers extends Component
{
    public $work;
    public $lat, $lng;
    public $user;
    public $distance;
    public function mount(Work $work)
    {
        $this->lat = request()->user()->latitude;
        $this->lng = request()->user()->longitude;
        $this->work = $work;
    }
    public function render()
    {
        return view('livewire.list-workers');
    }
    public function update()
    {
    }
}
