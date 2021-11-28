<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use LivewireUI\Modal\ModalComponent;

class EditVerseModal extends ModalComponent
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

    public function render()
    {
        return view('livewire.edit-verse-modal');
    }
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



    public function deleteVerse()
    {

        $deleted = $this->verse->delete();
        if ($deleted) {
            $this->closeAndUpdate('delete');
        }
    }

    public function updateVerse()
    {

        if ($this->verse != null) {
            $this->verse->content = $this->content;
            $saved = $this->verse->save();
            if ($saved) {
                $this->closeAndUpdate('update');
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
            $this->closeAndUpdate('add');
        }
    }

    public function closeAndUpdate($type)
    {
        $this->closeModal();
        $this->emitTo('verses-table', 'refreshVerseComponent');
        $this->emitTo('verses-page', 'showAlert', $type);
    }
}
