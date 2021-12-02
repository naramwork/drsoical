<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomersControl extends Component
{

    public  $showAlertModel = false;
    protected $listeners = ['setShowAlertModal'];

    public function render()
    {
        return view('livewire.customers-control');
    }

    public function setShowAlertModal()
    {
        $this->showAlertModel = true;
    }
}
