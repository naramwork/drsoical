<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContentPage extends Component
{

    public $pageType = '';

    public function render()
    {
        return view('livewire.pages.content-page', [
            // key is required to force a refresh of the container component
            'key' => random_int(-999, 999),
        ]);
    }



    public function getDataTableType($type)
    {

        $this->pageType = $type;
    }
}
