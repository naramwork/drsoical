<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessagePage extends Component
{
    public  $showAlertModel = false;

    protected $listeners = ['showAlert', 'setShowAlertModal'];

    public function render()
    {
        return view('livewire.message-page');
    }

    /**
     * showAlert show bottom alert with custom message
     *
     * @param  mixed $type
     * @return void
     */
    public function showAlert($type)
    {


        $this->emit('changeType', $type);
        $this->emitSelf('setShowAlertModal');
    }
    public function setShowAlertModal()
    {
        $this->showAlertModel = true;
    }
}
