<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use LivewireUI\Modal\ModalComponent;
use Symfony\Component\VarDumper\VarDumper;

class EditModal extends ModalComponent
{
    public String $content = '';
    public String $surah = '';
    public String $part = '';
    public String $range = '';
    public  $verse;
    public int $contentId = 0;

    // method listeners
    protected $listeners = [
        'updateVerse' => 'updateVerse',
        'addVerse' => 'addVerse',
        'deleteVerse' => 'deleteVerse'
    ];

    protected $rules = [
        'content' => 'required',
        'surah' => 'required',
    ];


    public function mount(Verse $verse)
    {

        if ($verse->exists) {
            if ($verse != null) {

                $this->verse = $verse;
                $this->content = $this->verse->content;
                $this->surah = $this->verse->surah;
                $this->range = $this->verse->range;
                $this->part = $this->verse->part;
                $this->contentId = $this->verse->id;
            }
        }
    }
    public function render()
    {
        return view('livewire.edit-modal');
    }


    public function deleteVerse()
    {
        $deleted = $this->verse->delete();
        if ($deleted) {
            $this->emit('openModal', 'done-modal');
            $this->emitTo('verses-table', 'refreshComponent');
        }
    }

    public function updateVerse()
    {

        if ($this->verse != null) {
            $this->verse->content = $this->content;
            $saved = $this->verse->save();
            if ($saved) {

                $this->emitTo('verses-table', 'refreshComponent');
                $this->emitTo('verses-page', 'updateContent');
            }
        }
    }

    public function addVerse()
    {

        $this->validate();
        $newVerse = new Verse();
        $newVerse->content = $this->content;
        $newVerse->surah = $this->surah;
        $newVerse->part = $this->part;
        $newVerse->range = $this->range;
        $newVerse->save();
        $newVerse->order = $newVerse->id;
        $saved = $newVerse->save();
        if ($saved) {
            $this->closeModal();
            $this->emitTo('verses-page', 'addContent');
        }
    }
}
