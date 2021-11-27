<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BottomAlert extends Component
{

    public $message;
    public $color = 'green';

    protected $listeners = ['changeType', 'customMessage'];

    public function render()
    {
        return view('livewire.bottom-alert');
    }

    public function customMessage($message, $color)
    {
        $this->message = $message;
        $this->color = $color;
    }
    public function changeType($type)
    {
        switch ($type) {
            case 'delete':
                $this->message = 'Deleted Successfully ....';
                $this->color = 'red';
                break;
            case 'add':
                $this->message = 'Added Successfully ....';
                break;
            case 'update':
                $this->message = 'Updated Successfully ....';
                break;
            default:
                $this->message = 'Done';
                break;
        }
    }
}
