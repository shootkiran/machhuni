<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditUserLocation extends Component
{
    public $user;
    public $latitude;
    public $longitude;
    public function mount($user)
    {
        $this->user = $user;
        $this->latitude = $user->latitude;
        $this->longitude = $user->longitude;
        $this->position = $this->latitude . "," . $this->longitude; 
    }
    public function updateUserLocation()
    {
        $this->user->update([
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude
        ]);
        return \redirect()->route('admin.user.index');
    }
    public function render()
    {
        return view('livewire.edit-user-location');
    }
}
