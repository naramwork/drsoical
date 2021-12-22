<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Traits\Firebase;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MessageTable extends LivewireDatatable
{

    use Firebase;
    public $model = Message::class;


    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('ID'),


            Column::name('sender_id')->searchable()->alignCenter()->unsortable()->label('المرسل')->view('components.user_name_column'),

            Column::name('message')->alignCenter()->unsortable()->label('الرسالة')->view('components.message_column'),

            Column::name('recipient_id')->alignCenter()->unsortable()->label('المرسل له')->view('components.user_name_column'),


            DateColumn::name('created_at')->defaultSort('asc|desc')
                ->alignCenter()
                ->label('تاريخ الإرسال'),

            Column::name('status')->searchable()->alignCenter()->label('الحالة'),

            Column::callback(['id', 'status'], function ($id, $status) {

                return view('actions.message-action', ['id' => $id, 'status' => $status]);
            })->unsortable()
        ];
    }

    public function changeStatus($id, $status)
    {


        $message = Message::find($id);
        $senderFcm = $message->sender->profile->fire_base_token;
        if (gettype($senderFcm) == 'string') {
            $senderFcm = explode(',', $senderFcm);
        }
        $recipientFcm = $message->recipient->profile->fire_base_token;
        if (gettype($recipientFcm) == 'string') {
            $recipientFcm = explode(',', $recipientFcm);
        }

        if ($status) {
            $message->status = 'تمت الموافقة';

            //send notifications to the sender and recipient 
            $this->sendFcmNotification($senderFcm, 'لقد تمت الموافقة على رسالتك');
            $this->sendFcmNotification($recipientFcm, 'لديك رسالة جديدة');
        } else {
            $message->status = 'مرفوض';

            //send notifications to the sender to tell him that his message get rejected 
            $this->sendFcmNotification($senderFcm, 'تم رفض الرسالة');
        }

        //show alert to the admin 
        if ($message->save()) {
            $this->emit('customMessage', 'تم العملية بنجاح', 'green');
            $this->emit('setShowAlertModal');
        } else {
            $this->emit('customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emit('setShowAlertModal');
        }
    }


    public function sendFcmNotification(array $tokenList, String $body)
    {

        $extraNotificationData = [
            "body" => $body,
            "title" => "رسائل"
        ];

        $fcmNotification = [
            'registration_ids' => $tokenList, //multple token array
            // 'to'        => "/topics/messaging", //single token

            'notification' => $extraNotificationData
        ];

        return $this->firebaseNotification($fcmNotification);
    }




    public function cellClasses($row, $column)
    {

        return 'align-middle overflow-hidden text-lg text-center py-4  leading-10 ';
    }

    public function rowClasses($row, $loop)
    {
        if ($loop->even) {
            return 'bg-gray-50';
        }
    }
}
