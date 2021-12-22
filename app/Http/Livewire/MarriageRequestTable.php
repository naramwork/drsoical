<?php

namespace App\Http\Livewire;

use App\Models\MarriageRequest;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MarriageRequestTable extends LivewireDatatable
{

    public $model = MarriageRequest::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('ID'),


            Column::name('sender_id')->searchable()->alignCenter()->unsortable()->label('المرسل')->view('components.user_name_column'),


            Column::name('recipient_id')->alignCenter()->unsortable()->label('المرسل له')->view('components.user_name_column'),


            DateColumn::name('created_at')->defaultSort('asc|desc')
                ->alignCenter()
                ->label('تاريخ الإرسال'),

            Column::name('status')->searchable()->alignCenter()->unsortable()->label('الحالة'),

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
