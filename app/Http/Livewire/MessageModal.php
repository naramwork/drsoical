<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class MessageModal extends ModalComponent
{


    public String $message;
    //public Message $message;

    public function mount(String $message)
    {
        $this->message = $message;
    }



    public function render()
    {
        return view('livewire.message-modal');
    }
}
