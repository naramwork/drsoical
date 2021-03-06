<?php

namespace App\Http\Livewire;

use App\Models\ContentInfo;
use Livewire\Component;

class VersesPage extends Component
{

    public String $startFrom = '';
    public  $showAlertModel = false;
    public $type = 'add';
    public $count = 0;

    public ContentInfo $contentInfo;
    protected $listeners = ['showAlert', 'setShowAlertModal'];

    public function render()
    {
        return view('livewire.pages.verses-page');
    }


    /**
     * mount init startFrom input from contentInfo table
     *
     * @return void
     */
    public function mount()
    {
        $this->contentInfo = ContentInfo::where('name', 'verse')->first();
        if ($this->contentInfo != null) {
            $this->startFrom = $this->contentInfo->start;
        }
    }

    /**
     * change start from 
     *
     * @return void
     */
    public function changeStartFrom()
    {

        $this->contentInfo->start = $this->startFrom;
        $saved = $this->contentInfo->save();
        if ($saved) {
            $this->showAlert('update');
        }
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
