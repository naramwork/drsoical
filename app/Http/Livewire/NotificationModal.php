<?php

namespace App\Http\Livewire;

use App\Traits\Firebase;
use LivewireUI\Modal\ModalComponent;

class NotificationModal extends ModalComponent
{
    use Firebase;
    public String $title = '';
    public String $body = '';

    // method listeners
    protected $listeners = [
        'sendNotification' => 'sendNotification',
    ];

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
    ];


    public function render()
    {
        return view('livewire.notification-modal');
    }


    public function sendNotification()
    {

        $this->validate();
        $extraNotificationData = [
            "body" => $this->body,
            "title" => $this->title
        ];

        $fcmNotification = [
            // 'registration_ids' => $tokenList, //multple token array
            'to'        => "/topics/general", //single token

            'notification' => $extraNotificationData
        ];
        $response = $this->firebaseNotification($fcmNotification);
        if (isset($response['message_id'])) {
            $this->closeModal();
            $this->emitTo('bottom-alert', 'customMessage', 'تم العملية بنجاح', 'green');
            $this->emitTo('control-page', 'setShowAlertModal');
        } else {
            $this->closeModal();

            $this->emitTo('bottom-alert', 'customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emitTo('control-page', 'setShowAlertModal');
        }
    }
}
