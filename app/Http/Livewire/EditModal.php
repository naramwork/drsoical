<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use LivewireUI\Modal\ModalComponent;

class EditModal extends ModalComponent
{
    public $content;
    public $verse;
    protected $listeners = ['updateContent' => 'updateContent'];



    public function mount(Verse $verse)
    {
        $this->verse = $verse;

        $this->content = $this->verse->content;
    }
    public function render()
    {
        return view('livewire.edit-modal');
    }

    public function updateContent()
    {

        if ($this->verse != null) {
            $this->verse->content = $this->content;
            $this->verse->save();
        }
        $this->closeModal();
        $this->emitTo('verses-table', 'refreshComponent');
    }
}
