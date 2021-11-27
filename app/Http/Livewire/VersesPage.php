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
    protected $listeners = ['updateContent', 'addContent', 'showAlert'];

    public function mount()
    {
        $this->contentInfo = ContentInfo::where('name', 'verse')->first();
        if ($this->contentInfo != null) {
            $this->startFrom = $this->contentInfo->start;
        }
    }
    public function render()
    {
        return view('livewire.pages.verses-page');
    }

    public function change()
    {

        $this->contentInfo->start = $this->startFrom;
        $saved = $this->contentInfo->save();
        if ($saved) {
            $this->emit('changeType', 'update');
            $this->showAlertModel = true;
        }
    }

    public function showAlert()
    {
        $this->showAlertModel = true;
    }

    public function addContent()
    {
        $this->emit('changeType', 'add');
        $this->showAlertModel = true;
    }

    public function updateContent()
    {
        $this->emit('changeType', 'update');
        $this->showAlertModel = true;
    }
}
