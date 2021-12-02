<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminsControl extends Component
{
    public  $showAlertModel = false;



    protected $listeners = ['setShowAlertModal'];
    public function render()
    {
        return view('livewire.admins-control');
    }

    public function setShowAlertModal()
    {
        $this->showAlertModel = true;
    }
}
