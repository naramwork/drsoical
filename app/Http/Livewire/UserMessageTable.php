<?php

namespace App\Http\Livewire;

use App\Models\UserMessage;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserMessageTable extends LivewireDatatable
{
    public $model = UserMessage::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('ID'),


            Column::name('user_id')->searchable()->alignCenter()->unsortable()->label('المرسل')->view('components.user_name_column'),

            Column::name('message')->alignCenter()->unsortable()->label('الرسالة')->view('components.message_column'),

            DateColumn::name('created_at')->defaultSort('asc|desc')
                ->alignCenter()
                ->label('تاريخ الإرسال'),
        ];
    }
}
