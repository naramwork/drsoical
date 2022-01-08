<?php

namespace App\Http\Livewire;

use App\Models\AppInfo;
use LivewireUI\Modal\ModalComponent;

class CallUs extends ModalComponent
{
    public String $address = '';
    public String $email = '';
    public String $phone = '';
    public String $facebook = '';
    public String $twitter = '';
    public String $youtube = '';
    public String $instagram = '';


    protected $listeners = [
        'addToDataBase' => 'addToDataBase',
    ];

    public function mount()
    {
        $addressInfo = AppInfo::where('type', 'call_us')->where('name', 'address')->first();
        if ($addressInfo) {
            $this->address = $addressInfo->content;
        }

        $emailInfo = AppInfo::where('type', 'call_us')->where('name', 'email')->first();
        if ($emailInfo) {
            $this->email = $emailInfo->content;
        }

        $phoneInfo = AppInfo::where('type', 'call_us')->where('name', 'phone')->first();
        if ($phoneInfo) {
            $this->phone = $phoneInfo->content;
        }

        $facebookInfo = AppInfo::where('type', 'call_us')->where('name', 'facebook')->first();
        if ($facebookInfo) {
            $this->facebook = $facebookInfo->content;
        }

        $twitterInfo = AppInfo::where('type', 'call_us')->where('name', 'twitter')->first();
        if ($twitterInfo) {
            $this->twitter = $twitterInfo->content;
        }

        $youtubeInfo = AppInfo::where('type', 'call_us')->where('name', 'youtube')->first();
        if ($youtubeInfo) {
            $this->youtube = $youtubeInfo->content;
        }

        $instagramInfo = AppInfo::where('type', 'call_us')->where('name', 'instagram')->first();
        if ($instagramInfo) {
            $this->instagram = $instagramInfo->content;
        }
    }
    public function render()
    {
        return view('livewire.call-us');
    }

    public function addToDataBase($props)
    {



        $addressInfo = AppInfo::where('type', 'call_us')->where('name', $props)->first();

        if ($addressInfo) {
            $addressInfo->content = $this->{$props};
        } else {
            $addressInfo = new AppInfo();
            $addressInfo->name = $props;
            $addressInfo->type = 'call_us';
            $addressInfo->content = $this->{$props};
        }

        if ($addressInfo->save()) {
            $this->{$props} = 'تم الحفظ';
        } else {
            $this->{$props} = 'حدث خطأ ما الرجاء المحاولة لاحقا';
        }

        // $emailInfo = AppInfo::where('type', 'call_us')->where('name', 'email')->first();
        // $instagramInfo = AppInfo::where('type', 'call_us')->where('name', 'instagram')->first();
        // $youtubeInfo = AppInfo::where('type', 'call_us')->where('name', 'youtube')->first();
        // $twitterInfo = AppInfo::where('type', 'call_us')->where('name', 'twitter')->first();
        // $facebookInfo = AppInfo::where('type', 'call_us')->where('name', 'facebook')->first();
        // $phoneInfo = AppInfo::where('type', 'call_us')->where('name', 'phone')->first();
    }
}
