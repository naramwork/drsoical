<?php

namespace App\Http\Livewire;

use App\Models\AppInfo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AppAd extends ModalComponent
{

    public String $content = '';


    protected $listeners = [
        'addToDataBase' => 'addToDataBase',
    ];

    protected $rules = [
        'content' => 'required',
    ];
    public function render()
    {
        return view('livewire.app-ad');
    }

    public function mount()
    {
        $appAd = AppInfo::where('type', 'app_ad')->first();
        if ($appAd) {
            $this->content = $appAd->content;
        }
    }


    public function addToDataBase()
    {
        $appAd = AppInfo::where('type', 'app_ad')->first();
        if ($appAd) {
            $appAd->name = 'ad';
            $appAd->content = $this->content;
        } else {
            $appAd = new AppInfo();
            $appAd->name = 'ad';
            $appAd->type = 'app_ad';
            $appAd->content = $this->content;
        }

        if ($appAd->save()) {
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
