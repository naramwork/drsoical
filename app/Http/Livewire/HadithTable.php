<?php

namespace App\Http\Livewire;


use App\Models\Hadith;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class HadithTable extends LivewireDatatable
{
    public $model = Hadith::class;

    protected $listeners = ['refreshComponent' => '$refresh'];



    public function columns()
    {
        return [
            Column::name('content')->searchable()->alignCenter()->label('النص'),

            NumberColumn::name('order')
                ->defaultSort('asc')
                ->searchable()
                ->alignCenter()
                ->label('الترتيب'),

            Column::callback(['id', 'order', 'content'], function ($id, $order, $content) {

                return view('actions.verses-action', ['type' => 'hadith', 'id' => $id, 'order' => $order, 'content' => $content]);
            })->unsortable()
        ];
    }


    public function changeOrder(String $order, String $action)
    {
        if ($action == 'down') {
            $query = '`order` = (select min(`order`) from hadiths where `order` >=' . $order + 1 . ')';
        } elseif ($action == 'up') {
            $query = '`order` = (select max(`order`) from hadiths where `order` <=' . $order - 1 . ')';
        } else {
            $this->showError();
            return;
        }
        $hadith = Hadith::where('order', $order)->first();
        $secondaryHadith = Hadith::whereRaw($query)->first();

        if ($secondaryHadith != null) {

            $hadith->order = $secondaryHadith->order;
            $secondaryHadith->order = $order;
            $secondaryHadith->save();
            $saved = $hadith->save();
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
