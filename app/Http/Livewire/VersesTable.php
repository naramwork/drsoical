<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class VersesTable extends LivewireDatatable
{
    public $model = Verse::class;

    protected $listeners = ['update' => 'update', 'refreshComponent' => '$refresh'];

    public function columns()
    {
        return [
            Column::name('content')->searchable()->alignCenter()->unsortable()->label('النص'),
            Column::name('surah')->alignCenter()->unsortable()->label('السورة'),
            Column::name('range')->alignCenter()->unsortable(),
            Column::name('part')->alignCenter()->unsortable(),
            NumberColumn::name('order')
                ->defaultSort('asc')
                ->searchable()
                ->alignCenter(),

            Column::callback(['id', 'order', 'content'], function ($id, $order, $content) {

                return view('actions.verses-action', ['id' => $id, 'order' => $order, 'content' => $content]);
            })->unsortable()
        ];
    }

    public function cellClasses($row, $column)
    {

        return 'align-middle text-lg text-right py-4 leading-10';
    }

    public function rowClasses($row, $loop)
    {
        if ($loop->even) {
            return 'bg-gray-50';
        }
    }

    /**
     * changeOrder function to help sorting verses by its order column  either up or down
     *
     * @param  mixed $order : selected row order
     * @param  mixed $action : up or down
     * @return void
     */
    public function changeOrder(String $order, String $action)
    {
        if ($action == 'down') {
            $orderBy = 'ASC';
            $secondaryOrder = $order + 1;
        } elseif ($action == 'up') {
            $orderBy = 'DESC';
            $secondaryOrder = $order - 1;
        } else {
            $this->showError();
            return;
        }
        $verses = Verse::whereIn('order', [$order, $secondaryOrder])->orderBy('order', $orderBy)->get();


        if (count($verses) == 2) {

            $verse = $verses[0];
            $SecondaryVerse = $verses[1];
            $verse->order = $secondaryOrder;
            $SecondaryVerse->order = $order;
            $SecondaryVerse->save();
            $verse->save();
        } else {
            $this->showError();
        }
    }


    public function showError()
    {
        $this->emit('showAlert');
        $this->emit('customMessage', 'هذه العملية غير متاحة', 'red');
    }
}
