<?php

namespace App\Http\Livewire;

use App\Models\Hadith;
use LivewireUI\Modal\ModalComponent;

class EditHadithModal extends ModalComponent
{

    public String $content = '';
    public  $hadith;
    public int $contentId = 0;

    // method listeners
    protected $listeners = [
        'updateHadith',
        'addHadith',
        'deleteHadith'
    ];

    protected $rules = [
        'content' => 'required',
    ];

    public function render()
    {
        return view('livewire.edit-hadith-modal');
    }


    public function mount(Hadith $hadith)
    {

        if ($hadith->exists) {

            $this->hadith = $hadith;
            $this->content = $this->hadith->content;
            $this->contentId = $this->hadith->id;
        }
    }




    public function deleteHadith()
    {
        $deleted = $this->hadith->delete();
        if ($deleted) {
            $this->closeAndUpdate('delete');;
        }
    }

    public function updateHadith()
    {

        if ($this->hadith != null) {
            $this->hadith->content = $this->content;
            $saved = $this->hadith->save();
            if ($saved) {
                $this->closeAndUpdate('update');
            }
        }
    }

    public function addHadith()
    {

        $this->validate();
        $newHadith = new Hadith();
        $newHadith->content = $this->content;
        $newHadith->save();
        $newHadith->order = $newHadith->id;
        $saved = $newHadith->save();
        if ($saved) {
            $this->closeAndUpdate('add');
        }
    }



    public function closeAndUpdate($type)
    {
        $this->closeModal();
        $this->emitTo('hadith-table', 'refreshComponent');
        $this->emitTo('hadith-page', 'showAlert', $type);
    }
}
