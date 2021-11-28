<?php

namespace App\Http\Livewire;

use App\Models\Dua;
use LivewireUI\Modal\ModalComponent;

class EditDuaModal extends ModalComponent
{

    public String $content = '';
    public  $dua;
    public int $contentId = 0;

    // method listeners
    protected $listeners = [
        'updateDua',
        'addDua',
        'deleteDua'
    ];

    protected $rules = [
        'content' => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-dua-modal');
    }

    public function mount(Dua $dua)
    {

        if ($dua->exists) {

            $this->dua = $dua;
            $this->content = $this->dua->content;
            $this->contentId = $this->dua->id;
        }
    }




    public function deleteDua()
    {
        $deleted = $this->dua->delete();
        if ($deleted) {
            $this->closeAndUpdate('delete');;
        }
    }

    public function updateDua()
    {

        if ($this->dua != null) {
            $this->dua->content = $this->content;
            $saved = $this->dua->save();
            if ($saved) {
                $this->closeAndUpdate('update');
            }
        }
    }

    public function addDua()
    {

        $this->validate();
        $newDua = new Dua();
        $newDua->content = $this->content;
        $newDua->save();
        $newDua->order = $newDua->id;
        $saved = $newDua->save();
        if ($saved) {
            $this->closeAndUpdate('add');
        }
    }


    public function closeAndUpdate($type)
    {
        $this->closeModal();
        $this->emitTo('duas-tabel', 'refreshComponent');
        $this->emitTo('duas-page', 'showAlert', $type);
    }
}
