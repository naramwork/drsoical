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
            Column::name('content')->searchable()->alignCenter(),

            Column::name('surah')->alignCenter(),
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

    /**
     * changeOrder function to help sorting verses by its order column  either up or down
     *
     * @param  mixed $order : selected row order
     * @param  mixed $action : up or down
     * @return void
     */
    public function changeOrder(String $order, String $action)
    {
        $verse = Verse::where('order', $order)->first();
        if ($action == 'up') {
            $topVerse = Verse::where('order', $order - 1)->first();
            if ($verse != null && $topVerse != null) {
                $topVerse->order += 1;
                $verse->order -= 1;
                $topVerse->save();
                $verse->save();
            }
        } elseif ($action == 'down') {
            $downVerse = Verse::where('order', $order + 1)->first();
            if ($verse != null && $downVerse != null) {
                $verse->order += 1;
                $downVerse->order -= 1;
                $downVerse->save();
                $verse->save();
            }
        } else {
            dd('error');
        }
    }
}
