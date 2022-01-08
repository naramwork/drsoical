<?php

namespace App\Http\Livewire;

use App\Models\AppInfo;
use LivewireUI\Modal\ModalComponent;

class AboutUS extends ModalComponent
{

    public String $name = '';
    public String $content = '';


    protected $listeners = [
        'addToDataBase' => 'addToDataBase',
    ];

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    public function mount()
    {
        $aboutUs = AppInfo::where('type', 'about_us')->first();
        if ($aboutUs) {
            $this->name = $aboutUs->name;
            $this->content = $aboutUs->content;
        }
    }

    public function render()
    {
        return view('livewire.about-u-s');
    }


    public function addToDataBase()
    {
        $aboutUs = AppInfo::where('type', 'about_us')->first();
        if ($aboutUs) {
            $aboutUs->name = $this->name;
            $aboutUs->content = $this->content;
        } else {
            $aboutUs = new AppInfo();
            $aboutUs->name = $this->name;
            $aboutUs->type = 'about_us';
            $aboutUs->content = $this->content;
        }

        if ($aboutUs->save()) {
            $this->closeModal();
            $this->emitTo('bottom-alert', 'customMessage', 'تمت العملية بنجاح', 'green');
            $this->emitTo('control-page', 'setShowAlertModal');
        } else {
            $this->closeModal();

            $this->emitTo('bottom-alert', 'customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emitTo('control-page', 'setShowAlertModal');
        }
    }
}
