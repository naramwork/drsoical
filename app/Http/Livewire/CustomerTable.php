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

    public function builder()
    {
        return User::where('profile_type', CustomerProfile::class)->join('customer_profiles', 'users.profile_id', '=', 'customer_profiles.id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('id'),

            Column::name('name')->searchable()->alignCenter()->unsortable()->label('الاسم'),

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
        } else {
            $this->emit('customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emit('setShowAlertModal');
        }
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
