<?php

namespace App\Http\Livewire;

use App\Models\CustomerProfile;
use App\Models\User;
use App\Traits\Firebase;
use Illuminate\Support\Facades\Log;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class CustomerTable extends LivewireDatatable
{
    use Firebase;
    public function builder()
    {
        return User::where('profile_type', CustomerProfile::class)->join('customer_profiles', 'users.profile_id', '=', 'customer_profiles.id');
    }

    public function columns()
    {
        return [

            //NumberColumn::name('id')->alignCenter()->label('id'),

            Column::name('id')->searchable()->alignCenter()->unsortable()->label('الاسم')->view('components.user_name_column'),

            Column::name('email')->searchable()->alignCenter()->unsortable()->label('البريد الإلكتروني'),
            // Column::name('email')->searchable()->alignCenter()->unsortable()->label('رقم الهاتف')->view('components.phone'),

            DateColumn::name('created_at')->alignCenter()->label('تاريخ التسجيل'),

            Column::callback('isBlocked , id', function ($isBlocked, $id) {

                return view('actions.customer-action', ['isBlocked' => $isBlocked, 'id' => $id]);
            })->label('الصلاحيات')
        ];
    }


    public function changeBlock($id, $block)
    {
        $user = User::find($id);
        $user->isBlocked = $block;
        if ($user->save()) {
            $this->emit('customMessage', 'تم العملية بنجاح', 'green');
            $this->emit('setShowAlertModal');
            $userFcm = $user->profile->fire_base_token;
            if (gettype($userFcm) == 'string') {
                $userFcm = explode(',', $userFcm);
            }
            $status = 'قبوله';
            if ($block) {
                $status = 'رفضه';
            }

            $this->sendFcmNotification($userFcm, 'مرحبا ' . $user->name . ' أن طلب العضوية الخاص بكم قد تم ' . $status);
        } else {
            $this->emit('customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emit('setShowAlertModal');
        }
    }



    public function sendFcmNotification(array $tokenList, String $body)
    {

        $extraNotificationData = [
            "body" => $body,
            "title" => 'طلب العضوية',
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
