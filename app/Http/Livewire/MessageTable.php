<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MessageTable extends LivewireDatatable
{
    public $model = Message::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->alignCenter()->label('ID'),


            Column::name('sender.name')->searchable()->alignCenter()->unsortable()->label('المرسل')->view('components.user_name_column'),

            Column::name('message')->alignCenter()->unsortable()->label('الرسالة')->view('components.message_column'),

            Column::name('recipient.name')->searchable()->alignCenter()->unsortable()->label('المرسل له')->view('components.user_name_column'),


            DateColumn::name('created_at')->defaultSort('asc')
                ->alignCenter()
                ->label('تاريخ الإرسال'),

            Column::name('status')->searchable()->alignCenter()->unsortable()->label('الحالة'),

            Column::callback(['id', 'status'], function ($id, $status) {

                return view('actions.message-action', ['id' => $id, 'status' => $status]);
            })->unsortable()
        ];
    }

    public function changeStatus($id, $status)
    {


        $message = Message::find($id);
        if ($status) {
            $message->status = 'تمت الموافقة';
        } else {
            $message->status = 'مرفوض';
        }
        if ($message->save()) {
            $this->emit('customMessage', 'تم العملية بنجاح', 'green');
            $this->emit('setShowAlertModal');
        } else {
            $this->emit('customMessage', 'حدث خطأ ما الرجاء المحاولة لاحقا', 'red');
            $this->emit('setShowAlertModal');
        }
    }
}
