<?php

namespace App\Http\Livewire;

use App\Models\AdminProfile;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AdminTable extends LivewireDatatable
{

    public $role;
    public function builder()
    {
        return User::where('profile_type', AdminProfile::class)->join('admin_profiles', 'users.profile_id', '=', 'admin_profiles.id');
    }



    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('id'),

            Column::name('name')->searchable()->alignCenter()->unsortable()->label('الاسم'),

            Column::name('email')->searchable()->alignCenter()->unsortable()->label('البريد الإلكتروني'),
            // Column::name('email')->searchable()->alignCenter()->unsortable()->label('رقم الهاتف')->view('components.phone'),

            DateColumn::name('created_at')->alignCenter()->label('تاريخ التسجيل'),

            Column::callback('id', function ($id) {

                return view('actions.admin-action', ['id' => $id]);
            })->label('الصلاحيات')
        ];
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
