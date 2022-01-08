<?php

namespace App\Http\Livewire;

use App\Models\Dua;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DuasTabel extends LivewireDatatable
{
    public $model = Dua::class;

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function columns()
    {
        return [
            Column::name('content')->searchable()->alignCenter()->label('النص'),

            NumberColumn::name('order')
                ->defaultSort('asc')
                ->searchable()
                ->view('components.dua-order-name')
                ->alignCenter()
                ->label('الترتيب'),

            Column::callback(['id', 'order', 'content'], function ($id, $order, $content) {

                return view('actions.verses-action', ['type' => 'dua', 'id' => $id, 'order' => $order, 'content' => $content]);
            })->unsortable()
        ];
    }

    public function changeOrder(String $order, String $action)
    {
        if ($action == 'down') {
            $query = '`order` = (select min(`order`) from duas where `order` >=' . $order + 1 . ')';
        } elseif ($action == 'up') {
            $query = '`order` = (select max(`order`) from duas where `order` <=' . $order - 1 . ')';
        } else {
            $this->showError();
            return;
        }
        $dua = Dua::where('order', $order)->first();
        $secondaryDua = Dua::whereRaw($query)->first();

        if ($secondaryDua != null) {

            $dua->order = $secondaryDua->order;
            $secondaryDua->order = $order;
            $secondaryDua->save();
            $saved = $dua->save();
            if ($saved) {
                $this->emit('customMessage', 'تمت إعادة الترتيب بنجاح', 'green');
                $this->emit('setShowAlertModal');
            }
        } else {
            $this->showError();
        }
    }




    public function showError()
    {
        $this->emit('setShowAlertModal');
        $this->emit('customMessage', 'هذه العملية غير متاحة', 'red');
    }

    /**
     * tow functions to customize table style
     *
     * @param  mixed $row
     * @param  mixed $column
     * @return void
     */
    public function cellClasses($row, $column)
    {

        return 'align-middle overflow-hidden text-lg text-right py-4  leading-10';
    }
    public function rowClasses($row, $loop)
    {
        if ($loop->even) {
            return 'bg-gray-50';
        }
    }
}
