<?php

namespace App\Http\Livewire;

use App\Models\Verse;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class VersesTable extends LivewireDatatable
{
    public $model = Verse::class;

    public function columns()
    {
        return [
            Column::name('content'),
            Column::name('surah'),
            NumberColumn::name('order')->defaultSort('asc'),
            Column::callback(['id', 'content'], function ($id, $content) {
                return view('actions.verses-action', ['id' => $id, 'content' => $content]);
            })->unsortable()
        ];
    }

    //align-middle

    public function cellClasses($row, $column)
    {
        return 'align-middle text-lg text-right py-4 leading-10';
    }


    public function changeOrder()
    {
        ddd('Naram');
    }
}
