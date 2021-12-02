<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Visitor extends Component
{
    public function render()
    {
        return view('livewire.visitor')->layout('layouts.guest');
    }
}
