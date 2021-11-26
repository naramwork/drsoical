<?php

namespace App\Http\Livewire;

use App\Models\Dua;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DuasTabel extends LivewireDatatable
{
    public $model = Dua::class;

    public function columns()
    {
        return [
            Column::name('content'),
            NumberColumn::name('order')->defaultSort('asc'),
            Column::callback(['id', 'content'], function ($id, $content) {
                return view('actions.verses-action', ['id' => $id, 'content' => $content]);
            })->unsortable()
        ];
    }
}
