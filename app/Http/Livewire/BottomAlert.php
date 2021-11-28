<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BottomAlert extends Component
{

    public $message;
    public $color = '';

    protected $listeners = ['changeType', 'customMessage', 'resetMessage'];


    public function resetMessage()
    {
    }

    public function updated($name, $value)
    {
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.bottom-alert');
    }

    public function mount()
    {
        $this->message = '';
    }
    public function customMessage($message, $color)
    {
        $this->reset();
        $this->message = $message;
        $this->color = $color;
    }
    public function changeType($type)
    {
        $this->reset();
        switch ($type) {
            case 'delete':
                $this->message = 'تم الحذف بنجاح';
                $this->color = 'red';
                break;
            case 'add':
                $this->message = 'تمت الإضافة بنجاح';
                $this->color = 'green';
                break;
            case 'update':
                $this->message = 'تم التعديل بنجاح';
                $this->color = 'green';
                break;
            default:
                $this->message = '';
                break;
        }
    }
}
